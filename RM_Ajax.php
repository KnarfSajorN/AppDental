<?php
include("funciones/conn3.php");
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);


function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

function DatosIngresarMysqli($valor)
{
    include "funciones/conn3.php";
    foreach ($valor as $key => $value) {
        if (is_array($value)) {
            $Arreglo[$key] = DatosIngresarMysqli($value);
        } else {
            $Arreglo[$key] = mysqli_real_escape_string($conn3, $value);
        }
    }
    return $Arreglo;
}

function auditorMaster($idUsuario, $tipo, $accion, $query)
{
    include "funciones/conn3.php";

    date_default_timezone_set('America/Bogota');

    $ip = $_SERVER['REMOTE_ADDR'];

    $fecha = date("Y-m-d H:i:s");

    mysqli_query($conn3, "INSERT INTO auditor (idUsuario, ip, fecha, tipo, accion, query) VALUES ('$idUsuario', '$ip', '$fecha', '$tipo', '$accion', '$query');");
}

if (isset($_POST["medicamento_id"]) and $_POST["Tipo"] == "Llenar Modulo Medicamentos") {

    $medicamento_id = $_POST["medicamento_id"];

    $QueryMedicamentos = mysqli_query($conn3, "SELECT * FROM RM_Medicamentos WHERE id = '{$medicamento_id}' LIMIT 1");
    $nrowSelect = mysqli_num_rows($QueryMedicamentos);
    while ($RowMedicamentos = mysqli_fetch_array($QueryMedicamentos)) {
        $Arreglo["Presentacion"] = $RowMedicamentos['Presentacion'];
        $Arreglo["Via_Administracion"] = $RowMedicamentos['Via_Administracion'];
        $Arreglo["Composicion"] = $RowMedicamentos['Composicion'];
        $Arreglo["Dosis"] = $RowMedicamentos['Dosis'];
        $Arreglo["Indicaciones"] = $RowMedicamentos['Indicaciones'];
        $Arreglo["Indicaciones_Generales"] = $RowMedicamentos['Indicaciones_Generales'];
    }

    echo json_encode($Arreglo, JSON_UNESCAPED_UNICODE);
} elseif ($_POST["Tipo"] == "Guardar Medicamento") {
    $_POST = DatosIngresarMysqli($_POST);

    $medicamento_id = $_POST["medicamento_id"];
    $Cantidad = $_POST["Cantidad"];
    $Presentacion = $_POST["Presentacion"];
    $Via_Administracion = $_POST["Via_Administracion"];
    $Composicion = $_POST["Composicion"];
    $Dosis = $_POST["Dosis"];
    $Indicaciones = $_POST["Indicaciones"];
    $Indicaciones_Generales = $_POST["Indicaciones_Generales"];

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $receta_id = $_POST["receta_id"];
    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];
    if ($medicamento_id == 0) {
        $Nombre_Medicamento = $_POST['medicamento_id2'];
        $Laboratorio = '';
        $Lote = '';
        $Fecha_Vencimiento = '';
    } else {
        $Nombre_Medicamento = funcionMaster($medicamento_id, 'id', 'Nombre', 'RM_Medicamentos');
        $Lote = funcionMaster($medicamento_id, 'id', 'Lote', 'RM_Medicamentos');
        $Laboratorio = funcionMaster($medicamento_id, 'id', 'Laboratorio', 'RM_Medicamentos');
        $Fecha_Vencimiento = funcionMaster($medicamento_id, 'id', 'Fecha_Vencimiento', 'RM_Medicamentos');
    }





    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'RM_Recetario'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            $Campos .= "`{$key}` text DEFAULT '',";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `RM_Recetario` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `cliente_id` int(11) NOT NULL,
        `Fecha_Registro` date DEFAULT current_timestamp(),
        `Nombre_Medicamento`  text NULL DEFAULT '',
        `medicamento_id` int(11) NULL DEFAULT '0',
        `Cantidad` int(11) NULL DEFAULT '0',
        `Presentacion` text NULL DEFAULT '',
        `Via_Administracion` text DEFAULT '',
        `Dosis` text NULL DEFAULT '',
        `Composicion` text NULL DEFAULT '',
        `Lote` text NULL DEFAULT '',
        `Laboratorio` text NULL DEFAULT '',
        `Fecha_Vencimiento` text NULL DEFAULT '',
        `Indicaciones` text NULL DEFAULT '',
        `Indicaciones_Generales` text NULL DEFAULT '',
        `receta_id` int(11) NULL DEFAULT '0',
        `Creacion_Dinamica` text NULL DEFAULT '',
        `Estado` varchar(100) DEFAULT 'Abierto'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `RM_Recetario` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `RM_Recetario` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    if ($receta_id == "") {
        //$QuerNumReceta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
        $QuerNumReceta = mysqli_query($conn3, "SELECT max(receta_id) as Maximo_Receta FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
        $nrowl = mysqli_num_rows($QuerNumReceta);
        while ($RowNumReceta = mysqli_fetch_array($QuerNumReceta)) {
            //$receta_id = $RowNumReceta['receta_id'];
            $receta_id = $RowNumReceta['Maximo_Receta'];
        }

        if ($nrowl == '0') {
            $receta_id_ingresar = 1;
        } else {
            $receta_id_ingresar = ($receta_id + 1);
        }
    } else {
        $receta_id_ingresar = $receta_id;
    }
    $sucursal = $_POST['sucursal'];
    if ($sucursal == "") {
        $sucursal = "0";
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from RM_Recetario WHERE Field = 'sucursal';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `RM_Recetario` ADD `sucursal` TEXT NULL DEFAULT '0' ");
    }

    $query = "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id,sucursal) 
    VALUES ($usuario_id,$cliente_id,$Nombre_Medicamento ,$medicamento_id,$Cantidad, $Presentacion  ,$Via_Administracion, $Composicion, $Dosis,$Indicaciones,$Indicaciones_Generales, $Lote, $Laboratorio, $Fecha_Vencimiento, $receta_id_ingresar,$sucursal)";
    $enlace_actual = str_replace('.php', '', $Ruta);

    auditorMaster($idusuario, '1', $enlace_actual, $query);

    mysqli_query($conn3, "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id,sucursal) 
                    VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$medicamento_id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id_ingresar','$sucursal');");

    echo "<br><label style='font-size: 30px;'>Medicamentos Generados </label>
            <table class='table'>
                <thead class='table-light'>
                    <tr> 
                        <th>#</th>
                        <th>Medicamento</th>
                        <th>Cantidad</th>
                        <th>Presentación</th>
                        <th>Vía de Administración</th>
                        <th>Composición</th>
                        <th>Dosis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>";


    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id_ingresar' and activo='1'");
    $nrowl = mysqli_num_rows($QueryRecetario);
    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
        $cont++;

        $id = $RowRecetario['id'];
        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
        $Cantidad = $RowRecetario['Cantidad'];
        $Presentacion = $RowRecetario['Presentacion'];
        $Via_Administracion = $RowRecetario['Via_Administracion'];
        $Composicion = $RowRecetario['Composicion'];
        $Dosis = $RowRecetario['Dosis'];

        echo "<tr> 
                <td>{$cont}</td>
                <td>{$Nombre_Medicamento}</td>
                <td>{$Cantidad}</td>
                <td>{$Presentacion}</td>
                <td>{$Via_Administracion}</td>
                <td>{$Composicion}</td>
                <td>{$Dosis}</td>
                <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
                <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
            </tr>";
    }

    echo "</tbody></table>
            <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id_ingresar}'>";
} elseif ($_POST["Tipo"] == "Eliminar Medicamento") {

    $medicamento_receta_id = $_POST["medicamento_receta_id"];

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $receta_id = $_POST["receta_id"];
    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];

    $query = "UPDATE RM_Recetario set activo = 0 where id = $medicamento_receta_id";
    $enlace_actual = str_replace('.php', '', $Ruta);

    auditorMaster($idusuario, '1', $enlace_actual, $query);
    //Eliminar
    //mysqli_query($conn3, "DELETE from RM_Recetario where  id = $medicamento_receta_id;");

    mysqli_query($conn3, "UPDATE RM_Recetario set activo = 0 where id = $medicamento_receta_id;");

    echo "<br><label style='font-size: 30px;'>Medicamentos Generados </label>
            <table class='table'>
                <thead class='table-light'>
                    <tr> 
                        <th>#</th>
                        <th>Medicamento</th>
                        <th>Cantidad</th>
                        <th>Presentación</th>
                        <th>Vía de Administración</th>
                        <th>Composición</th>
                        <th>Dosis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>";

    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id' and activo='1'");
    $nrowl = mysqli_num_rows($QueryRecetario);
    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
        $cont++;

        $id = $RowRecetario['id'];
        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
        $Cantidad = $RowRecetario['Cantidad'];
        $Presentacion = $RowRecetario['Presentacion'];
        $Via_Administracion = $RowRecetario['Via_Administracion'];
        $Composicion = $RowRecetario['Composicion'];
        $Dosis = $RowRecetario['Dosis'];

        $receta_id_recetario = $RowRecetario['receta_id'];

        echo "<tr> 
                <td>{$cont}</td>
                <td>{$Nombre_Medicamento}</td>
                <td>{$Cantidad}</td>
                <td>{$Presentacion}</td>
                <td>{$Via_Administracion}</td>
                <td>{$Composicion}</td>
                <td>{$Dosis}</td>
                <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
                <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
            </tr>";
    }

    if ($receta_id_recetario != "") {
        echo "</tbody></table>
            <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id_recetario}'>";
    } else {
        echo "</tbody></table>";
    }
} elseif ($_POST["Tipo"] == "Editar Medicamento") {

    $medicamento_receta_id = $_POST["medicamento_receta_id"];

    $QueryMedicamentos = mysqli_query($conn3, "SELECT * FROM RM_Recetario WHERE id = '{$medicamento_receta_id}' LIMIT 1");
    while ($RowMedicamentos = mysqli_fetch_array($QueryMedicamentos)) {
        $Arreglo["Presentacion"] = $RowMedicamentos['Presentacion'];
        $Arreglo["Via_Administracion"] = $RowMedicamentos['Via_Administracion'];
        $Arreglo["Composicion"] = $RowMedicamentos['Composicion'];
        $Arreglo["Dosis"] = $RowMedicamentos['Dosis'];
        $Arreglo["Indicaciones"] = $RowMedicamentos['Indicaciones'];
        $Arreglo["Indicaciones_Generales"] = $RowMedicamentos['Indicaciones_Generales'];

        $Arreglo["medicamento_id"] = $RowMedicamentos['medicamento_id'];
    }

    echo json_encode($Arreglo, JSON_UNESCAPED_UNICODE);
} elseif ($_POST["Tipo"] == "Actualizar Medicamento") {

    $_POST = DatosIngresarMysqli($_POST);

    $medicamento_id = $_POST["medicamento_id"];
    $Cantidad = $_POST["Cantidad"];
    $Presentacion = $_POST["Presentacion"];
    $Via_Administracion = $_POST["Via_Administracion"];
    $Composicion = $_POST["Composicion"];
    $Dosis = $_POST["Dosis"];
    $Indicaciones = $_POST["Indicaciones"];
    $Indicaciones_Generales = $_POST["Indicaciones_Generales"];

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $receta_id = $_POST["receta_id"];
    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];

    $medicamento_recetario_id = $_POST["medicamento_recetario_id"];

    $Nombre_Medicamento = funcionMaster($medicamento_id, 'id', 'Nombre', 'RM_Medicamentos');

    $Lote = funcionMaster($medicamento_id, 'id', 'Lote', 'RM_Medicamentos');
    $Laboratorio = funcionMaster($medicamento_id, 'id', 'Laboratorio', 'RM_Medicamentos');
    $Fecha_Vencimiento = funcionMaster($medicamento_id, 'id', 'Fecha_Vencimiento', 'RM_Medicamentos');

    $query = "UPDATE RM_Recetario
                SET Nombre_Medicamento = $Nombre_Medicamento, medicamento_id = $medicamento_id, Cantidad = $Cantidad, Lote = $Lote, Laboratorio = $Laboratorio, Fecha_Vencimiento = $Fecha_Vencimiento,
                Presentacion = $Presentacion, Via_Administracion = $Via_Administracion, Composicion = $Composicion, Dosis = $Dosis, Indicaciones = $Indicaciones, Indicaciones_Generales = $Indicaciones_Generales
                WHERE id = $medicamento_recetario_id";
    $enlace_actual = str_replace('.php', '', $Ruta);

    auditorMaster($idusuario, '1', $enlace_actual, $query);

    //Actualizar
    mysqli_query($conn3, "UPDATE RM_Recetario
                SET Nombre_Medicamento = '$Nombre_Medicamento', medicamento_id = '$medicamento_id', Cantidad = '$Cantidad', Lote = '$Lote', Laboratorio = '$Laboratorio', Fecha_Vencimiento = '$Fecha_Vencimiento',
                Presentacion = '$Presentacion', Via_Administracion = '$Via_Administracion', Composicion = '$Composicion', Dosis = '$Dosis', Indicaciones = '$Indicaciones', Indicaciones_Generales = '$Indicaciones_Generales'
                WHERE id = '$medicamento_recetario_id' ");

    echo "<br><label style='font-size: 30px;'>Medicamentos Generados </label>
            <table class='table'>
                <thead class='table-light'>
                    <tr> 
                        <th>#</th>
                        <th>Medicamento</th>
                        <th>Cantidad</th>
                        <th>Presentación</th>
                        <th>Vía de Administración</th>
                        <th>Composición</th>
                        <th>Dosis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>";


    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id' and activo='1'");
    $nrowl = mysqli_num_rows($QueryRecetario);
    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
        $cont++;

        $id = $RowRecetario['id'];
        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
        $Cantidad = $RowRecetario['Cantidad'];
        $Presentacion = $RowRecetario['Presentacion'];
        $Via_Administracion = $RowRecetario['Via_Administracion'];
        $Composicion = $RowRecetario['Composicion'];
        $Dosis = $RowRecetario['Dosis'];

        echo "<tr> 
                <td>{$cont}</td>
                <td>{$Nombre_Medicamento}</td>
                <td>{$Cantidad}</td>
                <td>{$Presentacion}</td>
                <td>{$Via_Administracion}</td>
                <td>{$Composicion}</td>
                <td>{$Dosis}</td>
                <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
                <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
            </tr>";
    }

    echo "</tbody></table>
            <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id}'>";
} elseif ($_POST["Tipo"] == "Guardar Varios Medicamentos") {

    $varios_medicamento_id = $_POST["varios_medicamento_id"];
    $receta_id = $_POST["receta_id"];
    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];

    if ($receta_id == "") {
        //$QuerNumReceta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
        $QuerNumReceta = mysqli_query($conn3, "SELECT max(receta_id) as Maximo_Receta FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
        $nrowl = mysqli_num_rows($QuerNumReceta);
        while ($RowNumReceta = mysqli_fetch_array($QuerNumReceta)) {
            //$receta_id = $RowNumReceta['receta_id'];
            $receta_id = $RowNumReceta['Maximo_Receta'];
        }

        if ($nrowl == '0') {
            $receta_id_ingresar = 1;
        } else {
            $receta_id_ingresar = ($receta_id + 1);
        }
    } else {
        $receta_id_ingresar = $receta_id;
    }

    foreach ($varios_medicamento_id as $key => $value) {

        $QueryMedicamentos = mysqli_query($conn3, "SELECT * FROM RM_Medicamentos WHERE id = '{$value}' LIMIT 1");
        $nrowSelect = mysqli_num_rows($QueryMedicamentos);
        while ($RowMedicamentos = mysqli_fetch_array($QueryMedicamentos)) {
            $id = $RowMedicamentos['id'];

            $Presentacion = $RowMedicamentos['Presentacion'];
            $Via_Administracion = $RowMedicamentos['Via_Administracion'];
            $Composicion = $RowMedicamentos['Composicion'];
            $Dosis = $RowMedicamentos['Dosis'];
            $Indicaciones = $RowMedicamentos['Indicaciones'];
            $Indicaciones_Generales = $RowMedicamentos['Indicaciones_Generales'];
            $Cantidad = "1";

            $Nombre_Medicamento = $RowMedicamentos['Nombre'];

            $Lote = $RowMedicamentos['Lote'];
            $Laboratorio = $RowMedicamentos['Laboratorio'];
            $Fecha_Vencimiento = $RowMedicamentos['Fecha_Vencimiento'];
        }

        $query = "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
        VALUES ($usuario_id,$cliente_id,$Nombre_Medicamento ,$id,$Cantidad, $Presentacion,$Via_Administracion, $Composicion, $Dosis,$Indicaciones,$Indicaciones_Generales,$Lote,$Laboratorio, $Fecha_Vencimiento, $receta_id_ingresar)";
        $enlace_actual = str_replace('.php', '', $Ruta);

        auditorMaster($idusuario, '1', $enlace_actual, $query);

        //Insertar Multiple
        mysqli_query($conn3, "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
                    VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id_ingresar');");
    }

    echo "<br><label style='font-size: 30px;'>Medicamentos Generados</label>
            <table class='table'>
                <thead class='table-light'>
                    <tr> 
                        <th>#</th>
                        <th>Medicamento</th>
                        <th>Cantidad</th>
                        <th>Presentación</th>
                        <th>Vía de Administración</th>
                        <th>Composición</th>
                        <th>Dosis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>";


    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id_ingresar' and activo='1'");
    $nrowl = mysqli_num_rows($QueryRecetario);
    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
        $cont++;

        $id = $RowRecetario['id'];
        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
        $Cantidad = $RowRecetario['Cantidad'];
        $Presentacion = $RowRecetario['Presentacion'];
        $Via_Administracion = $RowRecetario['Via_Administracion'];
        $Composicion = $RowRecetario['Composicion'];
        $Dosis = $RowRecetario['Dosis'];

        echo "<tr> 
                <td>{$cont}</td>
                <td>{$Nombre_Medicamento}</td>
                <td>{$Cantidad}</td>
                <td>{$Presentacion}</td>
                <td>{$Via_Administracion}</td>
                <td>{$Composicion}</td>
                <td>{$Dosis}</td>
                <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
                <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
            </tr>";
    }

    echo "</tbody></table>
            <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id}'>";
} elseif ($_POST["Tipo"] == "Cerrar Receta") {

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $receta_id = $_POST["receta_id"];
    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];

    $query = "UPDATE RM_Recetario SET Estado = Cerrado WHERE receta_id = $receta_id AND cliente_id = $cliente_id AND usuario_id =$usuario_id";
    $enlace_actual = str_replace('.php', '', $Ruta);

    auditorMaster($idusuario, '1', $enlace_actual, $query);

    //Actualizar
    mysqli_query($conn3, "UPDATE RM_Recetario SET Estado = 'Cerrado' WHERE receta_id = '$receta_id' AND cliente_id = '$cliente_id' AND usuario_id ='$usuario_id' AND activo='1' ");
} elseif ($_POST["Tipo"] == "Guardar Paquete") {
    $paquete_id = $_POST["paquete_id"];
    $receta_id = $_POST["receta_id"];
    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $idusuario = $_POST['usuario_id'];
    $Ruta = $_POST['Ruta'];

    if ($receta_id == "") {

        //$QuerNumReceta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
        $QuerNumReceta = mysqli_query($conn3, "SELECT max(receta_id) as Maximo_Receta FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
        if ($QuerNumReceta) {
            while ($RowNumReceta = mysqli_fetch_array($QuerNumReceta)) {
                echo "dentro del while";
                //$receta_id = $RowNumReceta['receta_id'];
                $receta_id = $RowNumReceta['Maximo_Receta'];
            }
        }


        if ($nrowl == '0') {
            $receta_id_ingresar = 1;
        } else {
            $receta_id_ingresar = ($receta_id + 1);
        }
    } else {
        $receta_id_ingresar = $receta_id;
    }
    $queryPaquete = mysqli_query($conn3, "SELECT * FROM RM_Paquetes_Medicamentos WHERE paquete_id = '{$paquete_id}'");



    if ($queryPaquete) {
        while ($RowPaquete = mysqli_fetch_array($queryPaquete)) {
            $inventario_id = $RowPaquete['inventario_id'];
            $Presentacion = $RowPaquete['Presentacion'];
            $Via_Administracion = $RowPaquete['Via_Administracion'];
            $Composicion = $RowPaquete['Composicion'];
            $Dosis = $RowPaquete['Dosis'];
            $Indicaciones = $RowPaquete['Indicaciones'];
            $Indicaciones_Generales = $RowPaquete['Indicaciones_Generales'];
            $Cantidad = $RowPaquete['Cantidad'];
            $Nombre_Medicamento = $RowPaquete['Nombre'];
            $query = "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
                VALUES ($usuario_id,$cliente_id,$Nombre_Medicamento ,$inventario_id,$Cantidad, $Presentacion,$Via_Administracion, $Composicion, $Dosis,$Indicaciones,$Indicaciones_Generales,$Lote,$Laboratorio, $Fecha_Vencimiento, $receta_id_ingresar)";
            $enlace_actual = str_replace('.php', '', $Ruta);

            auditorMaster($idusuario, '1', $enlace_actual, $query);
            $query1 = "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
        VALUES ($usuario_id, $cliente_id, '$Nombre_Medicamento', $inventario_id, $Cantidad, '$Presentacion', '$Via_Administracion', '$Composicion', '$Dosis', '$Indicaciones', '$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', $receta_id_ingresar)";

            mysqli_query($conn3, $query1);
        }
    }




    //   $queryPaquete = mysqli_query($conn3, "SELECT * FROM RM_Paquetes_Medicamentos WHERE paquete_id = '{$paquete_id}'");

    //   $nrowSelect = mysqli_num_rows($queryPaquete);

    //     while ($RowPaquete = mysqli_fetch_array($queryPaquete)) {
    //         $inventario_id = $RowPaquete['inventario_id'];
    //         $Presentacion = $RowPaquete['Presentacion'];
    //         $Via_Administracion = $RowPaquete['Via_Administracion'];
    //         $Composicion = $RowPaquete['Composicion'];
    //         $Dosis = $RowPaquete['Dosis'];
    //         $Indicaciones = $RowPaquete['Indicaciones'];
    //         $Indicaciones_Generales = $RowPaquete['Indicaciones_Generales'];
    //         $Cantidad = $RowPaquete['Cantidad'];
    //         $Nombre_Medicamento = $RowPaquete['Nombre'];

    //      $query = "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
    //             VALUES ($usuario_id,$cliente_id,$Nombre_Medicamento ,$inventario_id,$Cantidad, $Presentacion,$Via_Administracion, $Composicion, $Dosis,$Indicaciones,$Indicaciones_Generales,$Lote,$Laboratorio, $Fecha_Vencimiento, $receta_id_ingresar)";
    //         $enlace_actual = str_replace('.php', '', $Ruta);

    //         auditorMaster($idusuario, '1', $enlace_actual, $query);

    //             //Insertar Multiple
    //             mysqli_query($conn3, "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
    //                         VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$inventario_id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id_ingresar');");

    //       //  echo "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
    //       //  VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id_ingresar');";


    // }






    echo "<br><label style='font-size: 30px;'>Medicamentos Generados</label>
            <table class='table'>
                <thead class='table-light'>
                    <tr> 
                        <th>#</th>
                        <th>Medicamento</th>
                        <th>Cantidad</th>
                        <th>Presentación</th>
                        <th>Vía de Administración</th>
                        <th>Composición</th>
                        <th>Dosis</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
            <tbody>";


    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id_ingresar' and activo='1'");
    $nrowl = mysqli_num_rows($QueryRecetario);
    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
        $cont++;

        $id = $RowRecetario['id'];
        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
        $Cantidad = $RowRecetario['Cantidad'];
        $Presentacion = $RowRecetario['Presentacion'];
        $Via_Administracion = $RowRecetario['Via_Administracion'];
        $Composicion = $RowRecetario['Composicion'];
        $Dosis = $RowRecetario['Dosis'];

        echo "<tr> 
                <td>{$cont}</td>
                <td>{$Nombre_Medicamento}</td>
                <td>{$Cantidad}</td>
                <td>{$Presentacion}</td>
                <td>{$Via_Administracion}</td>
                <td>{$Composicion}</td>
                <td>{$Dosis}</td>
                <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
                <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
            </tr>";
    }

    echo "</tbody></table>
            <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id_ingresar}'>";
}


// elseif ($_POST["Tipo"] == "Guardar Paquete") {

//     $paquete_id = $_POST["paquete_id"];
//     $receta_id = $_POST["receta_id"];
//     $usuario_id = $_POST["usuario_id"];
//     $cliente_id = $_POST["cliente_id"];
//     $idusuario = $_POST['usuario_id'];
//     $Ruta = $_POST['Ruta'];

//     if ($receta_id == "") {
//         //$QuerNumReceta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
//         $QuerNumReceta = mysqli_query($conn3, "SELECT max(receta_id) as Maximo_Receta FROM  RM_Recetario where cliente_id = $cliente_id order by id ASC");
//         $nrowl = mysqli_num_rows($QuerNumReceta);
//         while ($RowNumReceta = mysqli_fetch_array($QuerNumReceta)) {
//             //$receta_id = $RowNumReceta['receta_id'];
//             $receta_id = $RowNumReceta['Maximo_Receta'];
//         }

//         if ($nrowl == '0') {
//             $receta_id_ingresar = 1;
//         } else {
//             $receta_id_ingresar = ($receta_id + 1);
//         }
//     } else {
//         $receta_id_ingresar = $receta_id;
//     }

//     $queryPaquete = mysqli_query($conn3, "SELECT * FROM RM_Paquetes_Medicamentos WHERE paquete_id = '{$paquete_id}'");
//     // echo "SELECT * FROM RM_Paquetes_Medicamentos WHERE paquete_id = '{$paquete_id}'";
//  echo $nrowSelect = mysqli_num_rows($queryPaquete);
//  if($nrowSelect >){
//     while ($RowPaquete = mysqli_fetch_array($queryPaquete)) {
//         $inventario_id = $RowPaquete['inventario_id'];
//         $Presentacion = $RowPaquete['Presentacion'];
//             $Via_Administracion = $RowPaquete['Via_Administracion'];
//             $Composicion = $RowPaquete['Composicion'];
//             $Dosis = $RowPaquete['Dosis'];
//             $Indicaciones = $RowPaquete['Indicaciones'];
//             $Indicaciones_Generales = $RowPaquete['Indicaciones_Generales'];
//             $Cantidad = $RowPaquete['Cantidad'];
//             $Nombre_Medicamento = $RowPaquete['Nombre'];
//     //     $QueryMedicamentos = mysqli_query($conn3, "SELECT * FROM RM_Medicamentos WHERE id = '{$inventario_id}' LIMIT 1");
//     //    // echo "SELECT * FROM RM_Medicamentos WHERE id = '{$inventario_id}' LIMIT 1";
//     //     $nrowSelect = mysqli_num_rows($QueryMedicamentos);
//     //     while ($RowMedicamentos = mysqli_fetch_array($QueryMedicamentos)) {
//     //         $id = $RowMedicamentos['id'];

//     //         $Presentacion = $RowMedicamentos['Presentacion'];
//     //         $Via_Administracion = $RowMedicamentos['Via_Administracion'];
//     //         $Composicion = $RowMedicamentos['Composicion'];
//     //         $Dosis = $RowMedicamentos['Dosis'];
//     //         $Indicaciones = $RowMedicamentos['Indicaciones'];
//     //         $Indicaciones_Generales = $RowMedicamentos['Indicaciones_Generales'];
//     //         $Cantidad = "1";

//     //         $Nombre_Medicamento = $RowMedicamentos['Nombre'];

//     //         $Lote = $RowMedicamentos['Lote'];
//     //         $Laboratorio = $RowMedicamentos['Laboratorio'];
//     //         $Fecha_Vencimiento = $RowMedicamentos['Fecha_Vencimiento'];
       
    
//      }
//      }

//      $query = "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
//             VALUES ($usuario_id,$cliente_id,$Nombre_Medicamento ,$inventario_id,$Cantidad, $Presentacion,$Via_Administracion, $Composicion, $Dosis,$Indicaciones,$Indicaciones_Generales,$Lote,$Laboratorio, $Fecha_Vencimiento, $receta_id_ingresar)";
//         $enlace_actual = str_replace('.php', '', $Ruta);
    
//         auditorMaster($idusuario, '1', $enlace_actual, $query);
    
//             //Insertar Multiple
//             mysqli_query($conn3, "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
//                         VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$inventario_id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id_ingresar');");
        
//       //  echo "INSERT INTO RM_Recetario (usuario_id, cliente_id, Nombre_Medicamento, medicamento_id, Cantidad, Presentacion, Via_Administracion, Composicion, Dosis, Indicaciones, Indicaciones_Generales, Lote, Laboratorio, Fecha_Vencimiento, receta_id) 
//       //  VALUES ('$usuario_id','$cliente_id','$Nombre_Medicamento' ,'$id','$Cantidad', '$Presentacion'  ,'$Via_Administracion', '$Composicion', '$Dosis','$Indicaciones','$Indicaciones_Generales', '$Lote', '$Laboratorio', '$Fecha_Vencimiento', '$receta_id_ingresar');";
    
      

        
    

   

//     echo "<br><label style='font-size: 30px;'>Medicamentos Generados</label>
//             <table class='table'>
//                 <thead class='table-light'>
//                     <tr> 
//                         <th>#</th>
//                         <th>Medicamento</th>
//                         <th>Cantidad</th>
//                         <th>Presentación</th>
//                         <th>Vía de Administración</th>
//                         <th>Composición</th>
//                         <th>Dosis</th>
//                         <th>Acciones</th>
//                     </tr>
//                 </thead>
//             <tbody>";


//     $QueryRecetario = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where usuario_id = '$usuario_id'  and cliente_id ='$cliente_id' and receta_id= '$receta_id_ingresar' and activo='1'");
//     $nrowl = mysqli_num_rows($QueryRecetario);
//     while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {
//         $cont++;

//         $id = $RowRecetario['id'];
//         $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
//         $Cantidad = $RowRecetario['Cantidad'];
//         $Presentacion = $RowRecetario['Presentacion'];
//         $Via_Administracion = $RowRecetario['Via_Administracion'];
//         $Composicion = $RowRecetario['Composicion'];
//         $Dosis = $RowRecetario['Dosis'];

//         echo "<tr> 
//                 <td>{$cont}</td>
//                 <td>{$Nombre_Medicamento}</td>
//                 <td>{$Cantidad}</td>
//                 <td>{$Presentacion}</td>
//                 <td>{$Via_Administracion}</td>
//                 <td>{$Composicion}</td>
//                 <td>{$Dosis}</td>
//                 <td><a onclick='EditarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-pencil' style='color: #3c8dbc;font-size: 20px;'></i>   </strong>  </font> </a> 
//                 <a onclick='EliminarMedicamento($id);'> <font size='5'> <strong>  <i class='fa fa-trash' style='color: #ff0000a1;font-size: 20px;'></i>   </strong>  </font> </a></td>
//             </tr>";
//     }

//     echo "</tbody></table>
//             <input type='hidden' id='receta_id' name='receta_id' value='{$receta_id}'>";
// }