<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "usuarios";
#Inicio


///////////////////////////////////////////////////////////////////////////

if (isset($_POST['Actualizar_Informacion_Pagina'])) {

    $ArregloCamposAdicionales=["soportedocumentos_nit","soportedocumentos_username","soportedocumentos_password","soportedocumentos_prefijo","soportedocumentos_numeroinicio","soportedocumentos_emisor"];

    foreach ($ArregloCamposAdicionales as $key => $value) {
        $Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = '$value';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `$value` TEXT NULL ");
        }
    }

    $arreglo_id = $_POST['arreglo_id'];
    foreach ($_POST["Arreglo"] as $key => $value) {
        $Campos .= "{$key} = '{$value}',";
    }
    $Campos = trim($Campos, ',');

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET {$Campos} WHERE id = '{$arreglo_id}' limit 1;");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $ruta = str_replace('.php', '', $ruta);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='config'</script>";
    } else {
        echo "<script language='Javascript'> window.location='config'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////
$EditarUsuario = $_SESSION['ID'];

if (isset($EditarUsuario)) {
    $id = $EditarUsuario;
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

        if (index == "soportedocumentos_numeroinicio") {
            if (Arreglo[index] != "") {
                document.getElementById("soportedocumentos_numeroinicio").readOnly = true;
            }
        }
    }
    TipoPersonaProveedor();
    TipoIdentificacionProveedor();
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

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro Datos Usuario Soporte Documentos </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro Datos Usuario Soporte Documentos </h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">



                            <div class="col-md-12">


                                <div class="card-body row">

                                    <div class="form-group col-md-12">
                                        <div align="left"><label>Nit</label></div>
                                        <input type="text" class="form-control input-lg" id="soportedocumentos_nit"
                                            name="Arreglo[soportedocumentos_nit]" placeholder="nit" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div align="left"><label>Username</label></div>
                                        <input type="text" class="form-control input-lg" id="soportedocumentos_username"
                                            name="Arreglo[soportedocumentos_username]" placeholder="Username" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div align="left"><label>Password</label></div>
                                        <input type="text" class="form-control input-lg" id="soportedocumentos_password"
                                            name="Arreglo[soportedocumentos_password]" placeholder="Password" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div align="left"><label>Prefijo</label></div>
                                        <input type="text" class="form-control input-lg" id="soportedocumentos_prefijo"
                                            name="Arreglo[soportedocumentos_prefijo]" placeholder="Prefijo" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div align="left"><label>Número de Inicio</label></div>
                                        <input type="number" class="form-control input-lg"
                                            id="soportedocumentos_numeroinicio"
                                            name="Arreglo[soportedocumentos_numeroinicio]"
                                            placeholder="Numero de Inicio" required>
                                    </div>

                                    <div class="form-group col-md-12">
                                        <div align="left"><label>Emisor</label></div>
                                        <input type="number" class="form-control input-lg" id="soportedocumentos_emisor"
                                            name="Arreglo[soportedocumentos_emisor]" placeholder="Emisor" required>
                                    </div>




                                </div>


                            </div>

                            <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                            <?php if ($EditarUsuario <> "") : ?>
                            <div class="col-sm-12">
                                <input type="hidden" name="arreglo_id" value="<?php echo $EditarUsuario ?>">
                                <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow"
                                        name="Actualizar_Informacion_Pagina">
                                        <h2> <strong> A c t u a l i z a r </strong> </h2>
                                    </button></center>
                            </div>
                            <?php endif; ?>

                        </form>



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