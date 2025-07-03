<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "OD_Procedimiento";
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {


    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'OD_Iconos_SVG'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {

        $query = "CREATE TABLE `OD_Iconos_SVG` (
        `id` int(11) NOT NULL,
        `SVG` text DEFAULT '',
        `Creacion_Dinamica` text DEFAULT '',
        `Activo` varchar(5) DEFAULT '1'
        ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `OD_Iconos_SVG` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `OD_Iconos_SVG` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }

    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

    $Arreglo = $_POST["Arreglo"];
    if (!isset($Arreglo["Icono"])) {
        $Arreglo["Icono"] = "";
    }
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
    $Examenes = $_POST['Examenes'];

    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo Los Datos Correctamente'</script>";
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
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Actualizar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo Los Datos Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar El Dato'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Elimino El Dato Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if (isset($_GET['Editar'])) {
    $id = $_GET['Editar'];
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where id=$id limit 1");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        foreach ($rowMotorizado as $key => $value) {
            $datos["$key"] = "$value";
        }
    }
    $datos_json = json_encode($datos);
    ?>
    <script>
        window.onload = function () {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

                    if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document.getElementsByName("Arreglo[" + index + "]")[0].type != "radio") {
                        document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];

                        if (index == "Color") {
                            CambioColor(Arreglo[index]);
                        }
                    } else {
                        if (index == "Icono") {
                            //$('[name="Arreglo[Icono]"][value="'+Arreglo[index]+'"]').prop("checked", true);
                            //let procesado;
                            //procesado = Arreglo[index].split(" ").join("");
                            //console.log($('[name="Arreglo[Icono]"][value="'+Arreglo[index]+'"]'));
                            //console.log(procesado);
                            document.getElementById("Icono_" + Arreglo[index]).checked = true;
                            //console.log(document.getElementById("Icono_"+procesado));
                        }
                        if (index == "inventario_id") {
                            $("#inventario_id").val(Arreglo[index]).trigger('change');


                        }

                    }
                }
            }
        };
    </script>
    <?php
}
#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];

// Para subir un icono debe cumplir estos dos requisitos 
// agregar width="2em" height="2em" o actualizarlo a esos valores 
// agregar o actualizar el campo fill a -> fill="currentColor"
// fill="currentColor" width="2em" height="2em"

?>

<style>
    .icon_svg>svg {
        width: 20px;
        height: 20px;
        zoom: 1.5;
    }
</style>
<style>
    a.Titulo_Pagina {
        display: inline-block;
        width: 480px;
        /* Establecer un ancho fijo */
        padding: 15px 0;
        /* Ajuste de altura automática, solo modifica el padding vertical */
        background-color: #3c8dbc75;
        color: #007BFF;
        text-decoration: none;
        border-radius: 5px;
        text-align: center;
        box-sizing: border-box;
        /* Asegura que el padding no afecte el ancho */
    }

    a.Titulo_Pagina:hover {
        background-color: #0056b3;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Procedimientos del Odontograma </a></li>
            <li><a href="OD_SubirSVG.php"> Agregar Iconos </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <a href="OD_Procedimientos.php" class="Titulo_Pagina">
                    <h4> Procedimientos del Odontograma </h4>
                </a>
                <a href="OD_SubirSVG.php" class="Titulo_Pagina">
                    <h4> Agregar Iconos </h4>
                </a>
                <div class="box">
                    <div class="box-body">
                        <a href="OD_SubirSVG">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Icono </strong></h4>
                            </button>
                        </a>
                        <hr>
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="form-group col-md-12">
                                <label>Nombre</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]"
                                    placeholder="Nombre" value="" maxlength="120"
                                    oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"
                                    required>
                            </div>


                            <div class="form-group col-md-12">
                                <label>Color</label>
                                <input type="color" name="Arreglo[Color]" class="form-control input-lg" required
                                    onChange="CambioColor(this.value)">
                            </div>


                            <div class="form-group col-md-12">
                                <label>Icono</label>
                                <div class="row col-md-12" style="height:300px;overflow-y: scroll;">
                                    <?php

                                    /*
                                    $fp = fopen("OD_Iconos.txt", "r");
                                    while(!feof($fp)) {
                                    $linea = fgets($fp);
                                    //echo "<option value='$linea'>$linea <i class='fa fa-search'></i></option>";
                                    $linea = str_replace("\r\n", "", $linea);
                                    $linea = str_replace("\n", "", $linea);
                                    $linea = str_replace("\r", "", $linea);
                                    $linea_id = str_replace(" ", "", $linea);
                                    echo "<div class='col-md-1'>
                                        <input type='radio' id='Icono_$linea_id' name='Arreglo[Icono]' value='$linea'>
                                        <i class='$linea' for='Icono_$linea'></i>
                                    </div>";
                                    }
                                    fclose($fp);
                                    */

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Iconos_SVG WHERE Activo='1' order by ID ASC ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_svg = $rowMotorizado["id"];
                                        $SVG = $rowMotorizado["SVG"];
                                        echo "<div class='col-md-1 icon_svg' style='text-align: -webkit-center;padding-top: 20px;'>
                                            <input type='radio' id='Icono_$id_svg' name='Arreglo[Icono]' value='$id_svg' required>
                                            $SVG
                                            </div>";

                                    }
                                    ?>
                                </div>
                            </div>
                            <br>

                            <div id="div_servicio" class="form-group col-md-12">
                                <label>Adjuntar Servicio/Inventario</label>
                                <select name="Arreglo[inventario_id]" id="inventario_id" class="form-control select2"
                                    style="width: 100%;">
                                    <option value=''>Seleccione</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios where (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}')");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {


                                        $tipo = $rowMotorizado['tipo'];
                                        $queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') and id = $tipo LIMIT 1");
                                        while ($rowinv = mysqli_fetch_array($queryinv)) {
                                            $TipoInventario = $rowinv['tipo'];
                                        }

                                        if ($TipoInventario == "1" or $TipoInventario == "2" or $TipoInventario == "3") {
                                            echo "<option value='$rowMotorizado[ID]'> $rowMotorizado[descripcion] </option>";
                                        }

                                    }
                                    ?>


                                </select>
                                <label style="color:blue;">*Solo Aparecerán Los Productos Simples,Compuestos y
                                    Servicios*</label>
                            </div>
                            <br>
                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> ""): ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-12">
                                    <center><button type="submit"
                                            class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"
                                            name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Estados </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Icono</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND Activo='1' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Color = $rowMotorizado['Color'];
                                                    $Icono = funcionMaster($rowMotorizado['Icono'], 'id', 'SVG', 'OD_Iconos_SVG');

                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    echo "<tr><th scope='row' width='2%'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'><label style='width:30px;color:{$Color}'>$Icono</label></td>";

                                                    echo "<td width='20%' align='center'>";

                                                    if ($id != "17" and $id != "18") {
                                                        echo "<font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' ><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow' > <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>";
                                                    }
                                                    echo "
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

<script>

    function CambioColor(este) {
        var color = este;
        $(".icon_svg > SVG").css("color", color);
        //console.log($(".icon_svg > SVG"));
    }

</script>