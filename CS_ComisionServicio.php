<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "CS_ComisionServicio";

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

    $producto_id_verificar = $_POST["Arreglo"]["producto_id"];
    $usuario_comision_verificar = $_POST["Arreglo"]["usuario_comision"];

    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where producto_id=$producto_id_verificar AND usuario_comision=$usuario_comision_verificar AND Activo = 1 ");
    $nrowverificacion = mysqli_num_rows($queryList);

    if ($nrowverificacion > 0) {
        echo "<script language='Javascript'> alert('Producto/Servicio ya ha sido registrado para el usuario seleccionado');</script>";
        echo "<script language='Javascript'> window.location='{$ruta}?error=Producto/Servicio ya ha sido registrado para el usuario seleccionado'</script>";
        exit();
    }
    $Campos = "";
    $Valores = "";
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= $key . ',';
        $ValoresArray = array();
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                $ValoresArray[] = $value1;
            }
            $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
            $Valores .= "'{$ListaFinal}',";
        } else {
            $Valores .= "'{$value}',";
        }
    }
    $Campos = trim($Campos, ',');
    $Valores = trim($Valores, ',');

    $usuario_id = $_POST['usuario_id'];
    $calendario = $_POST['calendario'];


    $queryList = mysqli_query($conn3, "INSERT INTO {$Nombre_Tabla} (usuario_id,{$Campos}) VALUES ('$usuario_id',{$Valores});");

    ///////////////////////////////////////////////////CARGAR IMAGEN////////////////////////////////////////////////////////////////

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardaron Los Datos Correctamente'</script>";

    }
}

if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $arreglo_id = $_POST['arreglo_id'];

    $producto_id_verificar = $_POST["Arreglo"]["producto_id"];
    $usuario_comision_verificar = $_POST["Arreglo"]["usuario_comision"];

    $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} where producto_id=$producto_id_verificar AND usuario_comision=$usuario_comision_verificar AND Activo = 1 AND id!='$arreglo_id' ");
    $nrowverificacion = mysqli_num_rows($queryList);

    if ($nrowverificacion > 0) {
        echo "<script language='Javascript'> alert('Producto/Servicio ya ha sido registrado para el usuario seleccionado');</script>";
        echo "<script language='Javascript'> window.location='{$ruta}?error=Producto/Servicio ya ha sido registrado para el usuario seleccionado'</script>";
        exit();
    }

    foreach ($_POST["Arreglo"] as $key => $value) {

        $ValoresArray = array();
        if (is_array($value)) {
            foreach ($value as $key1 => $value1) {
                $ValoresArray[] = $value1;
            }
            $ListaFinal = json_encode($ValoresArray, JSON_UNESCAPED_UNICODE);
            $Campos .= "{$key} = '{$ListaFinal}',";
        } else {
            $Campos .= "{$key} = '{$value}',";
        }
    }

    $Campos = trim($Campos, ',');

    $usuario_id = $_POST['usuario_id'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Editar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizaron Los Datos Correctamente'</script>";
    }
}

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
            //console.log(Arreglo);
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

                    if ((document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" || document
                        .getElementsByName("Arreglo[" + index + "]")[0].tagName == "TEXTAREA") && document
                            .getElementsByName("Arreglo[" + index + "]")[0].type != "checkbox") {
                        document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
                    } else {

                        var name = document.getElementsByName("Arreglo[" + index + "]")[0].name;
                        var classe = document.getElementsByName("Arreglo[" + index + "]")[0].className;
                        //console.log(Arreglo[index]+" // "+index+ " @@ "+ name);
                        if (classe.indexOf("select2") > -1) {
                            $("select[name='" + name + "'] > option[value='" + Arreglo[index] + "']").attr("selected",
                                true);
                            $("select[name='" + name + "']").select2();
                            //console.log("entroo "+Arreglo[index]+" // "+index+ " @@ "+ name);
                        } else {
                            $("select[name='" + name + "']").val(Arreglo[index]);
                            //console.log("No entro"+Arreglo[index]+" // "+index+ " @@ "+ name);
                        }

                    }

                }
            }
        };
    </script>
    <?php
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $id = $_GET['Eliminar'];
    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Activo='0' WHERE id ='{$id}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];

?>
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Comision Producto a Usuario
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes facturación </a></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">


            <div class="box">

                <!-- /.box-header -->
                <div class="box-body">


                    <div class="col-xs-12">



                        <form action='<?php echo htmlentities($_SERVER["PHP_SELF"]); ?>' method="POST" class="row"
                            enctype="multipart/form-data">

                            <div class="form-group col-md-6">
                                <label>Producto/Servicio</label>
                                <select name="Arreglo[producto_id]" class="form-control select2" style="width: 100%;">
                                    <option value="" selected="selected">Seleccione ...</option>
                                    <?php
                                    $sucursal_actual = $_SESSION['sucursal'];
                                    $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios ");
                                    while ($RowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $RowMotorizado['ID'];
                                        $Nombre = $RowMotorizado['descripcion'];

                                        echo "<option value='$id'> $Nombre </option>";
                                    }
                                    ?>
                                </select>
                            </div>



                            <div class="form-group col-md-6">
                                <label>Usuario</label>
                                <select name="Arreglo[usuario_comision]" class="form-control select2"
                                    style="width: 100%;">
                                    <option value="0" disabled selected>Seleccione</option>
                                    <!--<option value="<?= $_SESSION['ID'] ?>"><?= $_SESSION['NOMBRE_USUARIO'] ?></option>-->
                                    <?php
                                    usuariosEspecialistasSelect();
                                    ?>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label>% Comisión</label>
                                <input type="number" class="form-control input-lg" name="Arreglo[Porcentaje_Comision]"
                                    placeholder="Porcentaje Comision" value="" min="0" step="0.01" pattern="![e]"
                                    oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Valor Comisión [Numerico]</label>
                                <input type="number" class="form-control input-lg" name="Arreglo[Valor_Comision]"
                                    placeholder="Valor Comision" value="" min="0" step="0.01" pattern="![e]"
                                    oninput="if (!this.checkValidity()) this.value = this.value.slice(0, -1)">
                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> ""): ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm"
                                            name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else: ?>
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm"
                                            name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="box">
                        <div class="box-body">
                            <div class="col-md-12">
                                <h2 style="text-align: center;font-weight: bold;"> Comisiones </h2>
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre</th>
                                            <th scope="col">Usuario</th>
                                            <th scope="col">Porcentaje Comisión</th>
                                            <th scope="col">Valor Comisión</th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php

                                        $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' ");
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            //$contador++;
                                            $ExamenesComas = "";
                                            $id = $rowMotorizado['id'];
                                            $producto_id = $rowMotorizado['producto_id'];
                                            $producto = funcionMaster($producto_id, 'ID', 'descripcion', 'sinvetrios');

                                            $usuario_comision = $rowMotorizado['usuario_comision'];
                                            $usuario = funcionMaster($usuario_comision, 'ID', 'NOMBRE_USUARIO', 'usuarios');

                                            $Porcentaje_Comision = $rowMotorizado['Porcentaje_Comision'];
                                            $Valor_Comision = $rowMotorizado['Valor_Comision'];

                                            $ruta = htmlentities($_SERVER['PHP_SELF']);
                                            echo "<tr width='2%'><th scope='row'>{$id}</th>
                                                    <td width='20%' align='center'>{$producto}</td>
                                                    <td width='20%' align='center'>{$usuario}</td>
                                                    <td width='20%' align='center'>{$Porcentaje_Comision}</td>
                                                    <td width='20%' align='center'>{$Valor_Comision}</td>";

                                            echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-primary' style='width: 200px;'><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                    <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-primary' style='width: 200px;background-color:#ef4259;margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>
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
    </section>
    <!-- /.content -->
</div>

<?php
include 'footer.php';
?>