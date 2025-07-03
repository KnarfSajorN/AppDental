<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "LB_Categoria";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Arreglo = $_POST["Arreglo"];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE '{$Nombre_Tabla}'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        foreach ($Arreglo as $key => $value) {
            $Campos .= "`{$key}` text DEFAULT '',";
        }
        $Campos = trim($Campos, ',');

        $query = "CREATE TABLE `{$Nombre_Tabla}` (
        `id` int(11) NOT NULL,
        `usuario_id` int(11) NOT NULL,
        `Fecha_Registro` date DEFAULT current_timestamp(),
        {$Campos},
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    } else {
        if ($nrowtabla == 1) {

            $Campo1 = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = 'Creacion_Dinamica';");
            $nrowCampo1 = mysqli_num_rows($Campo1);
            if ($nrowCampo1 == "1") {
                foreach ($Arreglo as $key => $value) {
                    $Campo = mysqli_query($conn3, "show COLUMNS from {$Nombre_Tabla} WHERE Field = '{$key}';");
                    $nrowCampo = mysqli_num_rows($Campo);
                    if ($nrowCampo == 0) {
                        mysqli_query($conn3, "ALTER TABLE `{$Nombre_Tabla}` ADD `{$key}` TEXT NULL DEFAULT '';");
                    }
                }
            } else {
                echo "<script language='Javascript'> alert('Tabla No fue creada Dinamicamente');</script>";
                // si bota este mensaje es por que la tabla no esta creado el campo *Creacion_Dinamica* sirve para que no se use este modulo en tablas ya preexistentes
            }
        }
    }

    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $Valores .= "'{$value}',";
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];
    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id', {$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {

        $categoria_id = mysqli_insert_id($conn3);
        $Examenes = $_POST['Examenes'];

        $Contador_Ok = 0;
        $Contador_Error = 0;
        if ($Examenes != "") {
            foreach ($Examenes as $key => $value) {

                $queryList1 = mysqli_query($conn3, "SELECT * FROM LB_Examen WHERE id='{$value}'AND Activo='1' ");
                // echo "Este es el query <br>";
                // echo "SELECT * FROM LB_Examen WHERE id='{$value}'AND Activo='1' ";
                // echo "<br><br>";
                // var_dump($queryList1);
                // echo "<br><br>";
                if ($queryList1) {
                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1, MYSQLI_ASSOC)) {
                        $Nombre_Campo = "";
                        $Valor_Campo = "";
                        foreach ($rowMotorizado1 as $key1 => $value1) {
                            if ($key1 != "id" and $key1 != "usuario_id" and $key1 != "Fecha_Registro" and $key1 != "categoria_id") {
                                $Nombre_Campo .= "{$key1},";
                                $Valor_Campo .= "'{$value1}',";
                            }
                        }
                        $Nombre_Campo = trim($Nombre_Campo, ',');
                        $Valor_Campo = trim($Valor_Campo, ',');
                        $queryList2 = mysqli_query($conn3, "INSERT INTO LB_Examen (usuario_id,categoria_id,{$Nombre_Campo}) VALUES ('$usuario_id', '$categoria_id',{$Valor_Campo});");
                        //echo "INSERT INTO LB_Examen (usuario_id,categoria_id,{$Nombre_Campo}) VALUES ('$usuario_id', '$categoria_id',{$Valor_Campo});";
                        if ($queryList2 != true) {
                            $Contador_Error++;
                        } else {
                            $Contador_Ok++;
                        }
                    }
                }
                
            }
        }

        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Registro la Categoria y Se Cargaron $Contador_Ok Examenes Correctamente, $Contador_Error Con Error'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {
    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);

    $categoria_id = $arreglo_id;
    $Examenes = $_POST['Examenes'];
    $usuario_id = $_POST['usuario_id'];

    $QueryExamenesExistentes = mysqli_query($conn3, "SELECT * FROM LB_Examen WHERE categoria_id='{$categoria_id}'AND Activo='1' ");
    while ($RowExamenesExistentes = mysqli_fetch_array($QueryExamenesExistentes, MYSQLI_ASSOC)) {
        $Examenes_Guardados[$RowExamenesExistentes['id']] = $RowExamenesExistentes['id'];
    }

    $Contador_Ok = "0";
    $Contador_Error = "0";
    $ContadorEliminacion = "0";
    if ($Examenes != "") {
        foreach ($Examenes as $key => $value) {
            $Examenes_Editar[$value] = $value;

            $QueryExamenesExistentes = mysqli_query($conn3, "SELECT * FROM LB_Examen WHERE categoria_id='{$categoria_id}'AND id='{$value}'AND Activo='1' ");
            $nrowtabla = mysqli_num_rows($QueryExamenesExistentes);

            if ($nrowtabla == 0) {
                $queryList1 = mysqli_query($conn3, "SELECT * FROM LB_Examen WHERE id='{$value}'AND Activo='1' ");
                while ($rowMotorizado1 = mysqli_fetch_array($queryList1, MYSQLI_ASSOC)) {
                    $Nombre_Campo = "";
                    $Valor_Campo = "";
                    foreach ($rowMotorizado1 as $key1 => $value1) {
                        if ($key1 != "id" and $key1 != "usuario_id" and $key1 != "Fecha_Registro" and $key1 != "categoria_id") {
                            $Nombre_Campo .= "{$key1},";
                            $Valor_Campo .= "'{$value1}',";
                        }
                    }
                    $Nombre_Campo = trim($Nombre_Campo, ',');
                    $Valor_Campo = trim($Valor_Campo, ',');
                    $queryList2 = mysqli_query($conn3, "INSERT INTO LB_Examen (usuario_id,categoria_id,{$Nombre_Campo}) VALUES ('$usuario_id', '$categoria_id',{$Valor_Campo});");
                    //echo "INSERT INTO LB_Examen (usuario_id,categoria_id,{$Nombre_Campo}) VALUES ('$usuario_id', '$categoria_id',{$Valor_Campo});";
                    if ($queryList2 != true) {
                        $Contador_Error++;
                    } else {
                        $Contador_Ok++;
                    }
                }
            }
        }

        $Examenes_Finales = $Examenes_Guardados;

        foreach ($Examenes_Guardados as $key => $value) {
            if ($value == $Examenes_Editar[$value]) {
                unset($Examenes_Finales[$value]);
            }
        }

        foreach ($Examenes_Finales as $key => $value) {
            $queryList = mysqli_query($conn3, "UPDATE LB_Examen SET Activo='0' WHERE id ='{$value}' limit 1");
            $ContadorEliminacion++;
        }

        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo la Categoria y Se Crearon $Contador_Ok Examenes Correctamente, Se Eliminaron $ContadorEliminacion Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        $queryList = mysqli_query($conn3, "UPDATE LB_Examen SET Activo='0' WHERE categoria_id ='{$id}'");
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
            $id = $rowMotorizado['id'];
            $queryList1 = mysqli_query($conn3, "SELECT * FROM  LB_Examen WHERE categoria_id='{$id}' AND Activo='1' ");
            while ($rowExamen = mysqli_fetch_array($queryList1)) {
                $Examenes .= $rowExamen["id"] . ",";
            }
        }
        $datos["Examenes"] = "$Examenes";
    }
    $datos_json = json_encode($datos);
}
#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<!-- Se Cambia de Paquetes a Categoria -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Categorías </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro de Categorías</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class="row">
                            <div class="form-group col-md-6">
                                <label>Nombre de la Categoría</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre de la Categoria" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Tipo Recipiente</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Tipo_Recipiente]" placeholder="Tipo de Recipiente" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Precio</label>
                                <input type="number" step="0.01" class="form-control input-lg" name="Arreglo[Precio]" placeholder="$$" value="0" maxlength="11" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Examenes</label>
                                <select name="Examenes[]" id="Examenes" class="form-control select2" style="width: 100%;" onchange="Examenes()" multiple>


                                </select>
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Categorías </h2>
                                        <table id="example1" class="table table-bordered table-striped" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col" width='5%'>#</th>
                                                    <th scope="col" width='20%'>Nombre de la Categoría</th>
                                                    <th scope="col" width='10%'>Tipo de Recipiente</th>
                                                    <th scope="col" width='20%'>Exámenes</th>
                                                    <th scope="col" width='10%'>Valor</th>
                                                    <th scope="col" width='20%'>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Tipo_Recipiente = $rowMotorizado['Tipo_Recipiente'];
                                                    $Precio = $rowMotorizado['Precio'];

                                                    $Examenes = "";
                                                    $queryList1 = mysqli_query($conn3, "SELECT * FROM  LB_Examen WHERE categoria_id='{$id}' AND Activo='1' ");
                                                    while ($rowExamen = mysqli_fetch_array($queryList1)) {
                                                        $examen_id = $rowExamen["id"];
                                                        $Examenes .= "<li>" . $rowExamen["Nombre"] . "</li>";
                                                    }

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    $ruta = str_replace('.php', '', $ruta);
                                                    echo "<tr ><th scope='row' width='5%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='10%' align='center'>{$Tipo_Recipiente}</td>
                                                    <td width='20%' style='width:auto;' align='left'>{$Examenes}</td>
                                                    <td width='10%' align='left'>{$Precio}</td>";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style=''><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' style='margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
                                                    <font> <a href='LB_CrearExamenes?Categoria={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' style=''> <i class='fa fa-plus' title='Agregar'> Ver Exámenes </i></a></font>
                                                    </td></tr>";
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>

<script type="text/javascript">
    function Examenes() {
        $.ajax({
            type: "POST",
            url: "LB_Ajax.php",
            data: {
                Tipo: "Examenes"
            },
            success: function(response) {
                $('#Examenes').html(response);
                <?php if (isset($_GET['Editar'])) : ?>
                    var Arreglo = <?php echo $datos_json ?>;
                    console.log(Arreglo);
                    for (index in Arreglo) {
                        if (index == "Examenes") {
                            var Examenes = Arreglo[index].split(',');
                            for (index in Examenes) {
                                $("#Examenes > option[value='" + Examenes[index] + "']").attr("selected", true);
                            }
                            $('#Examenes').select2();
                        }
                    }

                <?php endif; ?>
            }
        });
    }

    <?php if (!isset($_GET['Editar'])) : ?>
        window.onload = function() {
            Examenes();
        }
    <?php endif; ?>

    <?php if (isset($_GET['Editar'])) : ?>
        window.onload = function() {
            Examenes();
            var Arreglo = <?php echo $datos_json ?>;
            //console.log(Arreglo);
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                }
            }
        }
    <?php endif; ?>
</script>

<style>
    tbody>tr>td:nth-child(4) {
        overflow-y: scroll;
        height: 200px;
        display: block;
        width: 100%;
    }
</style>