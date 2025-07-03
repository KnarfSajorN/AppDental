<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "LB_MedicosAsociados";
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
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo El Medico Correctamente'</script>";
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
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Actualizo El Medico Correctamente'</script>";
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
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
if ($_GET['Facturar'] <> "") {

    $id = $_GET['Facturar'];
    $Comision = $_GET['Comision'];
    $tabla = mysqli_query($conn3, "SHOW TABLES LIKE 'LB_MedicosAsociados_Pagos'");
    $nrowtabla = mysqli_num_rows($tabla);
    if ($nrowtabla == 0) {
        $query = "CREATE TABLE `LB_MedicosAsociados_Pagos` (
            `id` int(11) NOT NULL,
            `usuario_id` int(11) NOT NULL,
            `Fecha_Registro` date DEFAULT current_timestamp(),
            `Monto_Pagado` text NULL DEFAULT '',
            `idOperacion_Asociados` text NULL DEFAULT '',
            `medico_asociado_id` INT(11) NULL DEFAULT '0',
            `Creacion_Dinamica` text DEFAULT '',
            `Activo` varchar(5) DEFAULT '1'
            ) ENGINE=MyISAM DEFAULT CHARSET=latin1;";

        $creaciontabla = mysqli_query($conn3, $query);
        if (!$creaciontabla) {
            echo "<script language='Javascript'> alert('error en la creacion de la tabla');</script>";
        } else {
            mysqli_query($conn3, "ALTER TABLE `LB_MedicosAsociados_Pagos` ADD PRIMARY KEY (`id`);");
            mysqli_query($conn3, "ALTER TABLE `LB_MedicosAsociados_Pagos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;");
        }
    }
    ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
    $Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'ComisionPagada';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `ComisionPagada` text DEFAULT 'No' NULL COMMENT '*Creado desde modulo de Laboratorio[MediicosAsociados]*';");
    }
    ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////

    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv WHERE  medico_asociado_id='$id' AND ComisionPagada='No' ");
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $ids .= $rowMotorizado["idOperacion"] . ",";
    }
    $ids = trim($ids, ',');
    $usuario_id = $_SESSION['ID'];

    $queryList = mysqli_query($conn3, "INSERT INTO LB_MedicosAsociados_Pagos (usuario_id,Monto_Pagado,medico_asociado_id,idOperacion_Asociados) VALUES ('$usuario_id','$Comision','$id','$ids');");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Facturar Las Comisiones'</script>";
    } else {
        $queryList = mysqli_query($conn3, "UPDATE sOperacionInv SET ComisionPagada='Si' WHERE medico_asociado_id='{$id}'");
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Facturaron Las Comisiones Correctamente'</script>";
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
        window.onload = function() {
            var Arreglo = <?php echo $datos_json ?>;
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {
                    document.getElementsByName("Arreglo[" + index + "]")[0].value = Arreglo[index];
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
?>

<!-- Se Cambia de Paquetes a Categoria -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Medicos Asociados al Laboratorio </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro de Medicos Asociados al Laboratorio</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST" class='row   '>
                            <div class="form-group col-md-6">
                                <label>Nombre</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Nombre]" placeholder="Nombre del Medico" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Email</label>
                                <input type="text" class="form-control input-lg" name="Arreglo[Email]" placeholder="Email del Medico" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>

                            <div class="form-group col-md-6">
                                <label>Teléfono</label>
                                <input type="number" class="form-control input-lg" name="Arreglo[Telefono]" placeholder="Telefono del Medico" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>
                            
                            <div class="form-group col-md-6">
                                <label>Valor Comisión *Si Aplica*</label>
                                <input type="number" class="form-control input-lg" name="Arreglo[Valor_Comision]" placeholder="Valor de la Comision" value="" maxlength="10" step="0.01" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                            </div>


                            <div class="form-group col-md-12">
                                <div class="panel-group">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a data-toggle="collapse" href="#collapse1">Datos para Acceso de Plataforma del Laboratorio</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                            <div class="panel-body row">
                                                <div class="form-group col-md-6">
                                                    <label>Usuario</label>
                                                    <input type="text" class="form-control input-lg" name="Arreglo[Usuario_Web]" id="Usuario_Web" placeholder="Usuario" value="" maxlength="120" onchange="VerificarUsuarioPlataforma(this.value)">
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label>Clave</label>
                                                    <input type="text" class="form-control input-lg" name="Arreglo[Clave_Web]" placeholder="Clave" value="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                </div>

                                                <div class="col-md-6" id="custom-target"></div>
                                            </div>

                                            <div class="panel-footer">Plataforma Laboratorio</div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($_GET['Editar'] <> "") : ?>
                                <div class="col-sm-12">
                                    <input type="hidden" name="arreglo_id" id="arreglo_id" value="<?php echo $_GET['Editar'] ?>">
                                    <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="Actualizar_Informacion_Pagina">
                                            <h2> <strong> A c t u a l i z a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php else : ?>
                                <input type="hidden" name="arreglo_id" id="arreglo_id" value="0">
                                <div class="col-sm-12">
                                    <center><button type="submit" class="btn btn-block btn-outline-info  rounded-pill shadow" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            <?php endif; ?>

                        </form>


                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Medicos Asociados al Laboratorio </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre del Medico</th>
                                                    <th scope="col">Email</th>
                                                    <th scope="col">Teléfono</th>
                                                    <th scope="col">Porcentaje Comisión</th>
                                                    <th scope="col">Total Comisión</th>
                                                    <th scope="col">Credenciales</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM  {$Nombre_Tabla} WHERE Activo='1' ");
                                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                    //$contador++;
                                                    $id = $rowMotorizado['id'];
                                                    $Nombre = $rowMotorizado['Nombre'];
                                                    $Email = $rowMotorizado['Email'];
                                                    $Telefono = $rowMotorizado['Telefono'];
                                                    $Valor_Comision = $rowMotorizado['Valor_Comision'];

                                                    $Usuario_Plataforma = $rowMotorizado['Usuario_Web'];
                                                    $Clave_Plataforma = $rowMotorizado['Clave_Web'];

                                                    $queryList1 = mysqli_query($conn3, "SELECT SUM(totalNeto) as Total FROM `sOperacionInv` WHERE medico_asociado_id='$id' AND ComisionPagada='No' ");
                                                    while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
                                                        $Total = $rowMotorizado1["Total"];
                                                    }

                                                    $TotalComision = ($Total * ($Valor_Comision / 100));

                                                    $Credenciales = "Usuario: " . $Usuario_Plataforma . "<br>Clave: " . $Clave_Plataforma;
                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);
                                                    $ruta = str_replace('.php', '', $ruta);
                                                    echo "<tr width='2%'><th scope='row'>{$id}</th>
                                                    <td width='20%' align='center'>{$Nombre}</td>
                                                    <td width='20%' align='center'>{$Email}</td>
                                                    <td width='10%' align='center'>{$Telefono}</td>
                                                    <td width='10%' align='center'>{$Valor_Comision}</td>
                                                    <td width='10%' align='center'>{$TotalComision}</td>
                                                    <td width='20%' align='center'>{$Credenciales}</td>";

                                                    echo "<td width='20%' align='center'><font color='#04CC05'> <a href='{$ruta}?Editar={$id}' class='btn btn-block btn-outline-info  rounded-pill shadow' style=''><i class='fa fa-pencil' title='Editar'> Editar</i></a></font><br>
                                                        <font> <a href='{$ruta}?Eliminar={$id}' class='btn btn-block btn-outline-danger  rounded-pill shadow' style='margin-top:5px;margin-bottom:5px'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>";

                                                    if ($TotalComision != "0") {
                                                        echo "<font> <a href='{$ruta}?Facturar={$id}&Comision={$TotalComision}' class='btn btn-block btn-outline-success  rounded-pill shadow' style='margin-top:5px;margin-bottom:5px'> <i class='fa fa-check' title='Facturar'> Facturar Comision </i></a></font><br> ";
                                                    }

                                                    echo "<font> <a href='LB_MedicosAsociados_HistorialPagos.php?id={$id}' class='btn btn-block btn-outline-warning  rounded-pill shadow' style='margin-top:5px;margin-bottom:5px'> <i class='fa fa-book' title='historial'> Historial Comision </i></a></font>";
                                                    echo "</td></tr>";
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
<style>
    #custom-target {
        position: relative;
        height: 100px;
    }

    .position-absolute {
        position: absolute;
    }
</style>
<script>
    function VerificarUsuarioPlataforma(valor) {
        $.ajax({
            type: "POST",
            url: "LB_Ajax.php",
            data: {
                Tipo: "Verficiar Usuario Plataforma",
                Valor: valor,
                Medico: document.getElementById("arreglo_id").value
            },
            success: function(response) {

                if (response != "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        target: '#custom-target',
                        customClass: {
                            container: 'position-absolute'
                        },
                        showConfirmButton: false,
                        timer: 3000,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })

                    Toast.fire({
                        icon: 'error',
                        title: response
                    })

                    $("#Usuario_Web").val("");
                }

            }
        });
    }
</script>