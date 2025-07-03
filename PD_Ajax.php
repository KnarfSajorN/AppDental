<?php
include("funciones/conn3.php");
date_default_timezone_set('America/Bogota');

//esto es para evitar que cuando se ejecute esta funcion no genere error con el funcionMaster del include funciones/funciones.php
if ($_POST["Tipo_Consulta"] != "Enviar Firmar Cliente") {
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
}



function ActualizarDetallesPodologia($id_detalle)
{




    include 'funciones/conn3.php';
    $id = $id_detalle;

    $QueryPodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$id' limit 1");
    $RowDetallePodologia = mysqli_fetch_array($QueryPodologia);
    $Numero_Dedo = $RowDetallePodologia["Numero_Dedo"];
    $Numero_D = substr($Numero_Dedo, 1);

    $cliente_id = $RowDetallePodologia["cliente_id"];
    $usuario_id = $RowDetallePodologia["usuario_id"];

    //consultar el campo d$Numero_diente y r$Numero_diente de la tabla PD_PodologiaMaster
    $queryPodologiaDetalle = mysqli_query($conn3, "SELECT * FROM PD_PodologiaMaster WHERE cliente_id = '$cliente_id' AND usuario_id='$usuario_id' limit 1");
    while ($RowPodologiaDetalle = mysqli_fetch_array($queryPodologiaDetalle)) {
        $idPodologia = $RowPodologiaDetalle["id"];
        $ArregloD = $RowPodologiaDetalle["D$Numero_D"];
        $ArregloR = $RowPodologiaDetalle["I$Numero_D"];
    }

    //convertir string a array $ArregloR json_decode y $ArregloD json_decode
    $ArregloR_Array = json_decode($ArregloR, true);
    $ArregloD_Array = json_decode($ArregloD, true);
    //foreach del ArregloR y preguntar si existe el id en el ArregloR

    $contadorAcciones = 0;
    //Aqui se establece si hay un procedimiento que sea en toda la pieza y los actualiza para posteriormente ir preguntando cara por cara si existe registro para este diente en esa cara e irlo actualizando para que quede pintado correctamente las caras
    $QueryDetallePodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE  Numero_Dedo = '$Numero_Dedo' AND Superficie = 'Toda' AND cliente_id = '$cliente_id' AND usuario_id='$usuario_id' AND Activo = 1 ORDER BY id DESC limit 1");
    $rowDetallePodologia = mysqli_num_rows($QueryDetallePodologia);
    if ($rowDetallePodologia > 0) {

        //echo "Toda la pieza<br>";
        $RowDetallePodologia = mysqli_fetch_array($QueryDetallePodologia);

        $id_detalle = $RowDetallePodologia["id"];
        $Procedimiento_detalle = $RowDetallePodologia["Procedimiento"];

        $ArregloPosiciones = array("Arriba", "Izquierda", "Abajo", "Derecha");
        foreach ($ArregloPosiciones as $key_Posiciones => $value_Posiciones) {
            $ArregloR_Array[$key_Posiciones] = $id_detalle;
            $ArregloD_Array[$key_Posiciones] = $Procedimiento_detalle;
        }

        $id_TodaLaPieza = $RowDetallePodologia["id"];
        $contadorAcciones++;
    }

    if ($contadorAcciones == 0) {
        // poner todos los campos en blanco de este arreglo $ArregloR_Array y $ArregloD_Array
        $ArregloR_Array = ["0", "0", "0", "0"];
        $ArregloD_Array = ["0", "0", "0", "0"];
    }

    //Aqui se busca si existe el procedimiento en la tabla PD_PodologiaDetalle por cada cara y que sea el ultimo procedimiento activo   
    $ArregloPosiciones = array("Arriba", "Izquierda", "Abajo", "Derecha");
    foreach ($ArregloPosiciones as $key_Posiciones => $value_Posiciones) {

        $QueryDetallePodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE  Numero_Dedo = '$Numero_Dedo' AND Superficie  = '$value_Posiciones' AND cliente_id = '$cliente_id' AND usuario_id='$usuario_id' AND Activo = 1 AND id>'$id_TodaLaPieza' ORDER BY id DESC limit 1");
        $rowDetallePodo = mysqli_num_rows($QueryDetallePodologia);
        if ($rowDetallePodo > 0) {

            //echo "Detalle <br>";
            $RowDetallePodologia = mysqli_fetch_array($QueryDetallePodologia);

            $id_detalle = $RowDetallePodologia["id"];
            $Procedimiento_detalle = $RowDetallePodologia["Procedimiento"];

            $ArregloR_Array[$key_Posiciones] = $id_detalle;
            $ArregloD_Array[$key_Posiciones] = $Procedimiento_detalle;
        }
    }





    $queryOdontogramaDetalle = mysqli_query($conn3, "UPDATE PD_PodologiaMaster SET D$Numero_D = '" . json_encode($ArregloD_Array) . "' WHERE id = '$idPodologia' limit 1");
    //echo"UPDATE PD_PodologiaMaster SET D$Numero_D = '" . json_encode($ArregloD_Array) . "' WHERE id = '$idPodologia' limit 1";
    $Afectadas[1] = mysqli_affected_rows($conn3);
    //echo de la consulta
    $queryOdontogramaMaster = mysqli_query($conn3, "UPDATE PD_PodologiaMaster SET I$Numero_D = '" . json_encode($ArregloR_Array) . "' WHERE id = '$idPodologia' limit 1");
    //echo "UPDATE PD_PodologiaMaster SET I$Numero_D = '" . json_encode($ArregloR_Array) . "' WHERE id = '$idPodologia' limit 1";
    $Afectadas[2] = mysqli_affected_rows($conn3);

    return $Afectadas;
}



if ($_POST["Tipo_Consulta"] == "Agregar Dato Podologia") {

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'PD_PodologiaMaster'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `PD_PodologiaMaster` (
            `id` int(11) NOT NULL,
            `Fecha` date DEFAULT NULL,
            `Hora` time NOT NULL,
            `cliente_id` int(11) DEFAULT NULL,
            `usuario_id` int(11) DEFAULT NULL,
            `D1` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D2` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D3` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D4` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D5` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D6` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D7` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D8` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D9` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `D10` TEXT NULL DEFAULT  '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
   
            `I1` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I2` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I3` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I4` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I5` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I6` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I7` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I8` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I9` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]',
            `I10` TEXT NULL DEFAULT '[\"0\",\"0\",\"0\",\"0\"]' COMMENT '[Arriba,Izquierda,Abajo,Derecha]'
          ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `PD_PodologiaMaster` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `PD_PodologiaMaster` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }






    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'PD_PodologiaDetalle'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `PD_PodologiaDetalle` (
            `id` int(11) NOT NULL,
            `Fecha` date DEFAULT NULL,
            `Hora` time NOT NULL,
            `cliente_id` int(11) DEFAULT NULL,
            `usuario_id` int(11) DEFAULT NULL,
            `Numero_Dedo` text NOT NULL,
            `Detalle` text NULL DEFAULT '',
            `Procedimiento` text NULL DEFAULT '',
            `Superficie` text NULL DEFAULT '',
            `Activo` varchar(5) DEFAULT '1'
          ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `PD_PodologiaDetalle` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `PD_PodologiaDetalle` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'PD_FirmaDetalle'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `PD_FirmaDetalle` (
            `id` int(11) NOT NULL,
            `Fecha` date DEFAULT NULL,
            `Hora` time NOT NULL,
            `usuario_id` int(11) DEFAULT NULL COMMENT 'usuario que envia el mensaje ya sea whatsapp/correo',
            `cliente_id` int(11) DEFAULT NULL,
            `Firma` LONGTEXT NULL DEFAULT '',
            `Firma_Nombre` LONGTEXT NULL DEFAULT '',
            `Firma_Documento` LONGTEXT NULL DEFAULT '',
            `detalle_id` text NULL DEFAULT '',
            `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `PD_FirmaDetalle` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `PD_FirmaDetalle` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    
}


if ($_POST["Tipo_Consulta"] == "Agregar Dato Podologia") {

    $Fecha = date("Y-m-d");
    $Hora = date("H:i:s");

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];

    //$QueryPodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaMaster WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' ");
    $QueryPodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaMaster WHERE cliente_id = '{$cliente_id}'");
    $NumRowPodologia = mysqli_num_rows($QueryPodologia);

    if ($NumRowPodologia == 0) {
        mysqli_query($conn3, "INSERT INTO PD_PodologiaMaster(usuario_id, cliente_id, Fecha, Hora ) 
                                                            VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora');");
    }

    $Numero_Dedo = $_POST["dedo_id"];
    $Numero_D = substr($Numero_Dedo, 1);
    $Detalle = $_POST["Dedo_Detalle"];
    $Procedimiento = $_POST["Dedo_Procedimiento"];
    $Superficie = $_POST["Dedo_Superficie"];


    //Insertar
    mysqli_query($conn3, "INSERT INTO PD_PodologiaDetalle (usuario_id, cliente_id,     Fecha, Hora,      Numero_Dedo, Detalle,   Procedimiento, Superficie ) 
                                                            VALUES ('$usuario_id','$cliente_id','$Fecha' ,'$Hora','$Numero_Dedo','$Detalle','$Procedimiento','$Superficie');");

    $Detalle_id = mysqli_insert_id($conn3);

    //$QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaMaster WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' LIMIT 1");
    $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaMaster WHERE cliente_id = '{$cliente_id}' LIMIT 1");
    while ($RowPodologiaMaster = mysqli_fetch_array($QueryPodologiaMaster)) {
        $ArregloD = $RowPodologiaMaster["D$Numero_D"];
        $ArregloI = $RowPodologiaMaster["I$Numero_D"];
    }

    $ArregloDedos = json_decode($ArregloD);
    foreach ($ArregloDedos as $key => $value) {
        $ArregloDedosAGuardar[$key] = $value;
    }

    $ArregloIdentificacionDedos = json_decode($ArregloI);
    foreach ($ArregloIdentificacionDedos as $key => $value) {
        $ArregloIdentificacionDedosAGuardar[$key] = $value;
    }

    switch ($Superficie) {
        case 'Arriba':
            $ArregloDedosAGuardar[0] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[0] = (string)$Detalle_id;
            break;
        case 'Izquierda':
            $ArregloDedosAGuardar[1] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[1] = (string)$Detalle_id;
            break;
        case 'Abajo':
            $ArregloDedosAGuardar[2] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[2] = (string)$Detalle_id;
            break;
        case 'Derecha':
            $ArregloDedosAGuardar[3] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[3] = (string)$Detalle_id;
            break;
        case 'Toda':
            $ArregloDedosAGuardar[0] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[0] = (string)$Detalle_id;

            $ArregloDedosAGuardar[1] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[1] = (string)$Detalle_id;

            $ArregloDedosAGuardar[2] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[2] = (string)$Detalle_id;

            $ArregloDedosAGuardar[3] = $Procedimiento;
            $ArregloIdentificacionDedosAGuardar[3] = (string)$Detalle_id;
            break;
    }

    $DDedos = json_encode($ArregloDedosAGuardar);
    $IDedos =  json_encode($ArregloIdentificacionDedosAGuardar);

    //$queryList = mysqli_query($conn3, "UPDATE PD_PodologiaMaster SET D{$Numero_D}='$DDedos', I{$Numero_D}='$IDedos' WHERE cliente_id = '{$cliente_id}' AND usuario_id = '$usuario_id' limit 1;");
    $queryList = mysqli_query($conn3, "UPDATE PD_PodologiaMaster SET D{$Numero_D}='$DDedos', I{$Numero_D}='$IDedos' WHERE cliente_id = '{$cliente_id}' limit 1;");

    echo date('h:i:s') . "<br>";
    //sleep for 0.5 seconds
    sleep(0.5);
    //start again
    echo date('h:i:s');

    echo $DDedos . " | " . $IDedos;
}




if ($_POST["Tipo_Consulta"] == "Cargar Imagen Dedo") {
    //$usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $dedo_id = $_POST["dedo_id"];

    //$QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Numero_Dedo='$dedo_id' AND Activo = 1 ORDER BY id DESC LIMIT 1 ");
    $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE cliente_id = '$cliente_id' AND Numero_Dedo='$dedo_id' AND Activo = 1 ORDER BY id DESC LIMIT 1 ");
    while ($RowPodologiaMaster = mysqli_fetch_array($QueryPodologiaMaster)) {
        $Procedimiento = $RowPodologiaMaster["Procedimiento"];
    }
    //echo $Procedimiento;
    $SVG = funcionMaster(funcionMaster($Procedimiento, 'id', 'Icono', 'PD_Procedimiento'), 'id', 'SVG', 'PD_Iconos_SVG');
    $Color = funcionMaster($Procedimiento, 'id', 'Color', 'PD_Procedimiento');
    $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);

    echo $SVG . "|" . funcionMaster($Procedimiento, 'id', 'Nombre', 'PD_Procedimiento');
}



if ($_POST["Tipo_Consulta"] == "Cargar Historial Dedo") {
    //$usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];
    $dedo_id = $_POST["dedo_id"];
    $tipousuario = $_POST["usuario_id"];

    echo "<table class='table table-bordered table-striped' style='text-align-last: center;'>
                <thead>
                    <tr>
                        <td>Icono</td>
                        <td>Usuario</td>
                        <td>Fecha</td>
                        <td>Detalles</td>
                        <td>Firma/Estado</td>
                        <td><i class='fas fa-sliders-h'></i></td>
                    </tr>
                </thead>
            <tbody>";
    //$QueryPodologiaDetalle = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE cliente_id = '$cliente_id' AND usuario_id = '$usuario_id' AND Numero_Dedo='$dedo_id' AND Activo = 1 ORDER BY id DESC");
    $QueryPodologiaDetalle = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE cliente_id = '$cliente_id' AND Numero_Dedo='$dedo_id' AND Activo = 1 ORDER BY id DESC");
    while ($RowPodologiaDetalle = mysqli_fetch_array($QueryPodologiaDetalle)) {

        $id_detalle = $RowPodologiaDetalle["id"];
        $Nombre_Procedimiento = funcionMaster($RowPodologiaDetalle["Procedimiento"], 'id', 'Nombre', 'PD_Procedimiento');

        $Estado_Procedimiento = $RowPodologiaDetalle["Estado_Procedimiento"];
        $Estado_Procedimiento_Detalle = $RowPodologiaDetalle["Estado_Procedimiento_Detalle"];

        $Estado = 0;

        $SVG = funcionMaster(funcionMaster($RowPodologiaDetalle["Procedimiento"], 'id', 'Icono', 'PD_Procedimiento'), 'id', 'SVG', 'PD_Iconos_SVG');
        $Color = funcionMaster($RowPodologiaDetalle["Procedimiento"], 'id', 'Color', 'PD_Procedimiento');
        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
        // Me trae el tipo del susuario que inicia session
        $tipousuario = funcionMaster($tipousuario, 'ID', 'TIPO', 'usuarios');

        $EstadoFirma = funcionMaster($RowPodologiaDetalle["id"], 'detalle_id', 'id', 'PD_FirmaDetalle');
        $BotonAdicional = "";
        $BotonesAcciones = "";
        if ($EstadoFirma != "" or $Estado == 1) {
            $EstadoFirma = "<label style='color:green;'>Firmado</label>";
            $BotonAdicional = "<a href='#' onclick='VerFirmaCliente(" . $RowPodologiaDetalle["id"] . ")' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width:100%;font-size: 13px;'><i class='fa fa-book'></i> Ver Firma </a> <hr style='margin:7px;'>";
            if ($tipousuario == 99 or $tipousuario == 0) {
                $BotonesAcciones = "<a href='#' onclick='EliminarDetalleDedo(" . $RowPodologiaDetalle["id"] . ")' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width:100%;font-size: 13px;'><i class='fa fa-trash-o'></i> Eliminar Procedimiento </a>";
            }
        } else {
            $EstadoFirma = "<label style='color:red;'>Sin Firma</label>";
            $BotonAdicional = "<a href='#' onclick='EnviarAFirmarCliente(" . $RowPodologiaDetalle["id"] . ")' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width:100%;font-size: 13px;'><i class='fa fa-pencil'></i> Enviar Firma </a> <hr style='margin:7px;'>";
            
            if ($tipousuario == 99 or $tipousuario == 0) {
                $BotonesAcciones .= "<a href='#' onclick='EliminarDetalleDedo(" . $RowPodologiaDetalle["id"] . ")' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='width:100%;font-size: 13px;'><i class='fa fa-trash-o'></i> Eliminar Procedimiento </a>";
            }
            $BotonesAcciones .= "<a href='#' onclick='EditarDetalleOdontograma_Dedo(" . $RowPodologiaDetalle["id"] . ")' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width:100%;padding-left: 15px;padding-right: 15px;margin-top: 10px;font-size: 13px;'><i class='fa fa-pencil'></i> Editar Procedimiento </a>";
        }

        $BotonAdicional .= "<a href='#' onclick='EditarEstadoProcedimiento(" . $RowPodologiaDetalle["id"] . ")' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style='width:100%;font-size: 13px;'><i class='fa fa-pencil'></i> Estado Procedimiento </a> <hr style='margin:7px;'>";



        echo "<tr>
                    <td style='text-align: -webkit-center;' width='15%'>
                        <div style='width:40px'>
                        " . $SVG . " 
                        </div>
                        Superficie:<br>" . $RowPodologiaDetalle["Superficie"] . " <hr style='margin-top: 5px;margin-bottom: 5px;'> <b>$Nombre_Procedimiento</b> <hr style='margin-top: 5px;margin-bottom: 5px;'>  " . $Cie10Texto . "
                    </td>
                    <td width='10%' style='text-align: -webkit-center;'>
                    " . funcionMaster($RowPodologiaDetalle["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios') . "
                    </td>
                    <td width='10%' style='text-align: -webkit-center;'>
                        " . $RowPodologiaDetalle["Fecha"] . "<br>" . $RowPodologiaDetalle["Hora"] . "
                    </td>
                    
                    <td width='20%'>
                    " . $RowPodologiaDetalle["Detalle"] . "
                    </td>
    
                    <td width='25%'>
                        <u>Firma</u> : " . $EstadoFirma . " <hr> <u>Estado</u> : " . $Estado_Procedimiento . " <br> " . $Estado_Procedimiento_Detalle . "
                    </td>
                    
                    <td width='15%' style='text-align: center;'>
                        {$BotonAdicional}
                        {$BotonesAcciones}
                    </td>
                </tr>";
    }

    echo "</tbody></table>";
}


if ($_POST["Tipo_Consulta"] == "Eliminar Detalle Dedo") {
    $id = $_POST["Detalle_id"];
    //hacer un update al campo Activo=0
    $QueryPodologia = mysqli_query($conn3, "UPDATE PD_PodologiaDetalle SET Activo = 0 WHERE id = '$id' limit 1");
    //numero de columnas afectadas por el update
    $AfectadasUp = mysqli_affected_rows($conn3);

    $Afectadas = ActualizarDetallesPodologia($id);
    $Afectadas[0] = $AfectadasUp;
    //print_r($Afectadas);

    if ($Afectadas[0] > 0) {

        $QueryPodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$id' limit 1");
        $RowPodologia = mysqli_fetch_array($QueryPodologia);

        $Arreglo["Estado"] = true;
        $Arreglo["Numero_Dedo"] = $RowPodologia["Numero_Dedo"];
    }

    echo json_encode($Arreglo);
}

if ($_POST["Tipo_Consulta"] == "Buscar Informacion Detalle Dedo") {

    $id = $_POST["Detalle_id"];

    //consultar el campo Numero_Diente y Nombre_Cara y cliente_id de la tabla OD_OdontogramaMasterDetalle
    $QueryPodologia = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$id' limit 1");
    $RowPodologia = mysqli_fetch_array($QueryPodologia);

    $Arreglo['id_detalle'] = $RowPodologia["id"];
    $Arreglo['Detalle'] = $RowPodologia["Detalle"];
    $Arreglo['Procedimiento'] = $RowPodologia["Procedimiento"];
    $Arreglo['Superficie'] = $RowPodologia["Superficie"];
    $Arreglo['Numero_Dedo'] = $RowPodologia["Numero_Dedo"];

    echo json_encode($Arreglo, true);
}


if ($_POST["Tipo_Consulta"] == "Guardar Edicion Informacion Detalle Dedo") {

    $id_detalle = $_POST["Resultados"]["id_detalle"];

    $Detalle = $_POST["Resultados"]["detalle"];
    $Procedimiento = $_POST["Resultados"]["procedimiento"];
    $Superficie = $_POST["Resultados"]["superficie"];

    $Fecha = date("Y-m-d");
    $Hora = date("H:i:s");

    $queryPodologiaMaster = mysqli_query($conn3, "UPDATE PD_PodologiaDetalle SET Detalle = '{$Detalle}',Procedimiento = '{$Procedimiento}',Superficie = '{$Superficie}' WHERE id = '$id_detalle' limit 1") or die(mysqli_error($conn3));
    //echo "UPDATE PD_PodologiaDetalle SET Detalle = '{$Detalle}',Procedimiento = '{$Procedimiento}',Superficie = '{$Superficie}' WHERE id = '$id_detalle' limit 1";
    $AfectadasUp = mysqli_affected_rows($conn3);

    if ($AfectadasUp > 0) {
        $querypodologiaMaster = mysqli_query($conn3, "UPDATE PD_PodologiaDetalle SET Fecha='{$Fecha}', Hora='{$Hora}' WHERE id = '$id_detalle' limit 1");
        $Afectadas = ActualizarDetallesPodologia($id_detalle);
        $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$id_detalle' limit 1");
        $RowPodologia = mysqli_fetch_array($QueryPodologiaMaster);

        $Arreglo["NumeroDedo"] = $RowPodologia["Numero_Dedo"];
        $Arreglo["Estado"] = "Actualizado";
        $Arreglo["Test"] = $AfectadasPresupuesto;
    } else {
        $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$id_detalle' limit 1");
        $RowPodologia = mysqli_fetch_array($QueryPodologiaMaster);

        $Arreglo["NumeroDedo"] = $RowPodologia["Numero_Dedo"];
        $Arreglo["Estado"] = "Sin Cambios";
    }

    echo json_encode($Arreglo);
}

if ($_POST["Tipo_Consulta"] == "Actualizar Estado Procedimiento") {

    $_POST = DatosIngresarMysqli($_POST);

    $Estado_Procedimiento = $_POST["Resultados"]["Estado_Modal_Procedimiento"];
    $Detalle_Procedimiento = $_POST["Resultados"]["Detalle_Modal_Procedimiento"];
    $detalle_podologia_id = $_POST["Resultados"]["detalle_podologia_id"];

    $Campo1 = mysqli_query($conn3, "show COLUMNS from PD_PodologiaDetalle WHERE Field = 'Estado_Procedimiento';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `PD_PodologiaDetalle` ADD `Estado_Procedimiento` TEXT NULL DEFAULT 'Registrado' COMMENT 'Estado de Podologia*Creado desde modulo de PD_Ajax*'");
    }
    $Campo1 = mysqli_query($conn3, "show COLUMNS from PD_PodologiaDetalle WHERE Field = 'Estado_Procedimiento_Detalle';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `PD_PodologiaDetalle` ADD `Estado_Procedimiento_Detalle` TEXT NULL DEFAULT '' COMMENT 'Detalle del estado de Podologia *Creado desde modulo de PD_Ajax*'");
    }

    $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$detalle_podologia_id' limit 1");
    $RowPodologiaMaster = mysqli_fetch_array($QueryPodologiaMaster);
    $Numero_Dedo = $RowPodologiaMaster["Numero_Dedo"];

    $queryPodologia = mysqli_query($conn3, "UPDATE PD_PodologiaDetalle SET Estado_Procedimiento='{$Estado_Procedimiento}', Estado_Procedimiento_Detalle='{$Detalle_Procedimiento}' WHERE id = '$detalle_podologia_id' limit 1");
    $AfectadasUp = mysqli_affected_rows($conn3);
    if ($AfectadasUp > 0) {
        $Arreglo["Estado"] = "Actualizado";
    } else {
        $Arreglo["Estado"] = "Sin Cambios";
    }
    $Arreglo["NumeroDiente"] = $Numero_Dedo;

    echo json_encode($Arreglo);
}











if ($_POST["Tipo_Consulta"] == "Enviar Firmar Cliente") {

    include 'funciones/funciones.php';

    function Encriptar($valor)
    {
        $Sc = base64_decode("Medical");
        $Texto = (openssl_encrypt($valor, "AES-256-CBC", $Sc));
        return base64_encode($Texto);
    }

    function Desencriptar($valor)
    {
        $Sc = base64_decode("Medical");
        $Texto = openssl_decrypt(($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }

    $Whatsapp = $_POST["Resultados"]["whatsapp_enviar"];
    $Correo = $_POST["Resultados"]["correo_enviar"];
    $cliente_id = $_POST["Resultados"]["cliente_id"];
    $detalle_podologia_id = $_POST["Resultados"]["detalle_podologia_id"];

    $QueryPodologiaMaster = mysqli_query($conn3, "SELECT * FROM PD_PodologiaDetalle WHERE id = '$detalle_podologia_id' limit 1");
    $RowPodologiaMaster = mysqli_fetch_array($QueryPodologiaMaster);

    $usuario_id = $RowPodologiaMaster["usuario_id"];

    $Procedimiento = funcionMaster($RowPodologiaMaster["Procedimiento"], 'id', 'Nombre', 'PD_Procedimiento');

    //$tabla_encriptado = Encriptar("PD_FirmaDetalle"); //nombre de la tabla
    $detalle_id_encriptado = Encriptar($detalle_podologia_id); // nombre del id de la tabla (llave primaria)
    $usuario_encriptado = Encriptar($usuario_id);


    $CodigoUnico = strtotime("now");

    $mensajeW = " Sr(a) *" . trim(funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente'), " ") . "* Se le ha registrado un procedimiento {$Procedimiento} por el Doctor " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", para firmar el detalle utilizar el siguiente link, Link: {$Base}PD_ModuloFirma?id={$detalle_id_encriptado}&ui={$usuario_encriptado}";
    $action = 0;

    //echo $mensajeW;
    Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $idCliente, $usuario_id, $Whatsapp, $action);
    /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
    include 'PlantillaCorreo/funcionesPlantillas.php';

    $usuario_id = $usuario_id;



    $titulo = "Dentalsoft - Detalle Podologia  #" . $CodigoUnico;
    $subtitulo = "Detalle Procedimiento/Estado - " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $texto = $mensajeW . ' o puede darle click al boton que dice Documento, Muchas gracias por su tiempo';
    $url = ["{$Base}PD_ModuloFirma.php?id={$detalle_id_encriptado}&ui={$usuario_encriptado}"];
    $botonurl = ["Firmar"];

    $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
    ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
    $para = "{$Correo}"; //Correo

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'To: ' . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '_' . $CodigoUnico . ' <noreply@dentalsoftplus.com>' . "\r\n";
    //$cabeceras .= 'From: ' . $titulo . ' <noreply2@3medicalsoftcolombia.com>' . "\r\n";
    //$cabeceras .= 'Cc: noreply3@2medicalsoftcolombia.com' . "\r\n";
    //$cabeceras .= 'Bcc: noreply4@1medicalsoftcolombia.com' . "\r\n";
    mail($para, $titulo, $mensaje, $cabeceras);

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'PD_FirmaDetalle'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `PD_FirmaDetalle` (
            `id` int(11) NOT NULL,
            `Fecha` date DEFAULT NULL,
            `Hora` time NOT NULL,
            `usuario_id` int(11) DEFAULT NULL COMMENT 'usuario que envia el mensaje ya sea whatsapp/correo',
            `cliente_id` int(11) DEFAULT NULL,
            `Firma` LONGTEXT NULL DEFAULT '',
            `Firma_Nombre` LONGTEXT NULL DEFAULT '',
            `Firma_Documento` LONGTEXT NULL DEFAULT '',
            `detalle_id` text NULL DEFAULT '',
            `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `PD_FirmaDetalle` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `PD_FirmaDetalle` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    $Arreglo["Estado"] = "Mensaje Enviado";

    echo json_encode($Arreglo);
}

if ($_POST["Tipo_Consulta"] == "Buscar Firma") {

    $Detalle_id = $_POST["Detalle_id"];

    $queryList = mysqli_query($conn3, "SELECT * FROM PD_FirmaDetalle where detalle_id = '$Detalle_id' ORDER BY id DESC LIMIT 1 ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $Arreglo["Firma"] = $rowMotorizado['Firma'];
        $Arreglo["Fecha"]  = $rowMotorizado['Fecha'];
        $Arreglo["Hora"]  = $rowMotorizado['Hora'];
        $Arreglo["Firma_Nombre"]  = $rowMotorizado['Firma_Nombre'];
        $Arreglo["Firma_Documento"]  = $rowMotorizado['Firma_Documento'];
    }

    echo json_encode($Arreglo);
}









if ($_POST["Tipo_Consulta"] == "Guardar Lesion") {

    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'PD_Lesion'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `PD_Lesion` (
            `id` int(11) NOT NULL,
            `Fecha` date DEFAULT NULL,
            `Hora` time NOT NULL,
            `usuario_id` int(11) DEFAULT NULL,
            `cliente_id` int(11) DEFAULT NULL,
            `Imagen` LONGTEXT NULL DEFAULT '',
            `Observacion` LONGTEXT NULL DEFAULT '',
            `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `PD_Lesion` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `PD_Lesion` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    $Fecha = date("Y-m-d");
    $Hora = date("H:i:s");

    $usuario_id = $_POST["usuario_id"];
    $cliente_id = $_POST["cliente_id"];

    $Observacion = $_POST["Observaciones_Lesion"];
    $Imagen = mysqli_real_escape_string($conn3, $_POST["Rayado"]); //$_POST["Rayado"];

    $QueryLesion = "INSERT INTO PD_Lesion (Fecha, Hora, usuario_id, cliente_id, Imagen, Observacion) VALUES ('$Fecha', '$Hora', '$usuario_id', '$cliente_id', '$Imagen', '$Observacion')";
    //echo $QueryLesion;
    $QueryRespuesta = mysqli_query($conn3, $QueryLesion) or die(mysqli_error($conn3));

    if (!$QueryRespuesta) {
        $Arreglo["Respuesta"] = "error";
    } else {
        $Arreglo["Respuesta"] = "ok";
    }

    echo json_encode($Arreglo);
}
