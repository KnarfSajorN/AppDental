<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
#Inicio
if (isset($_POST['Guardar_Informacion_Pagina'])) {

    $Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = 'Grafica_OMS';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        $queryList = mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `Grafica_OMS`  TEXT NULL DEFAULT '1' COMMENT '*Creado desde modulo de Visualizacion Grafica [GC_Visualizacion]*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = 'Grafica_CDC';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        $queryList = mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `Grafica_CDC`  TEXT NULL DEFAULT '1' COMMENT '*Creado desde modulo de Visualizacion Grafica [GC_Visualizacion]*';");
    }

    $Campo1 = mysqli_query($conn3, "show COLUMNS from usuarios WHERE Field = 'Grafica_SD';");
    $nrowCampo1 = mysqli_num_rows($Campo1);
    if ($nrowCampo1 == "0") {
        $queryList = mysqli_query($conn3, "ALTER TABLE `usuarios` ADD `Grafica_SD`  TEXT NULL DEFAULT '1' COMMENT '*Creado desde modulo de Visualizacion Grafica [GC_Visualizacion]*';");
    }

    $Grafica_OMS = $_POST['Arreglo']['Grafica_OMS'];
    if($Grafica_OMS==""){
        $Grafica_OMS = "0";
    }
    $Grafica_CDC = $_POST['Arreglo']['Grafica_CDC'];
    if($Grafica_CDC==""){
        $Grafica_CDC = "0";
    }
    $Grafica_SD = $_POST['Arreglo']['Grafica_SD'];
    if($Grafica_SD==""){
        $Grafica_SD = "0";
    }

    $usuario_id = $_POST['usuario_id'];

    $queryList = mysqli_query($conn3, "UPDATE usuarios SET Grafica_OMS='$Grafica_OMS',Grafica_CDC='$Grafica_CDC',Grafica_SD='$Grafica_SD' WHERE ID='$usuario_id'");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?error=Hubo Un Error Al Guardar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?msg=Se Guardo La Selección Correctamente'</script>";
    }
}

///////////////////////////////////////////////////////////////////////////

    $id = $_SESSION['ID'];
    $queryList = mysqli_query($conn3, "SELECT Grafica_OMS,Grafica_CDC,Grafica_SD FROM  usuarios where id=$id limit 1");
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
            //console.log(Arreglo);
            for (index in Arreglo) {
                if (document.getElementsByName("Arreglo[" + index + "]")[0] != undefined) {

                    if(document.getElementsByName("Arreglo[" + index + "]")[0].tagName == "INPUT" && document.getElementsByName("Arreglo[" + index + "]")[0].type == "checkbox"){
                        console.log(Arreglo[index]);
                        if(Arreglo[index]=="1" || Arreglo[index]=="Si"){
                            document.getElementsByName("Arreglo[" + index + "]")[0].checked = true;
                        }else{
                            document.getElementsByName("Arreglo[" + index + "]")[0].checked = false;
                        }
                    }

                }
            }
        };
    </script>
<?php

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<link rel="stylesheet" href="css/CamposCheckBoxRadio.css">
<script src="plugins/LottieK/lottie.min.js"></script>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Visualizacion de Graficas </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <h4 class="Titulo_Pagina">Visualizacion de Graficas</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="col-md-3" align="center">
                                <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_pz4xjiod.json" mode="bounce" background="transparent" speed="0.5" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                            </div>

                            <div class="col-md-6" align="left">

                                <div class="col-md-12" style="text-align: -webkit-left;">
                                    <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[Grafica_OMS]" value="1" /> OMS 
                                    </label>
                                </div>

                                <div class="col-md-12" style="text-align: -webkit-left;">
                                    <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[Grafica_CDC]" value="1" /> CDC 
                                    </label>
                                </div>

                                <div class="col-md-12" style="text-align: -webkit-left;">
                                    <label style="padding-bottom: 10px;margin-bottom: 0px;">
                                    <input type="checkbox" class="option-input checkbox" name="Arreglo[Grafica_SD]" value="1" /> Síndrome de Down 
                                    </label>
                                </div>

                                <input type="hidden" name="usuario_id" value="<?php echo $usuario_id; ?>">

                                <div class="col-sm-12">
                                    <br>
                                    <center><button type="submit" class="btn btn-block btn-primary btn-sm" name="Guardar_Informacion_Pagina">
                                            <h2> <strong> G u a r d a r </strong> </h2>
                                        </button></center>
                                </div>
                            </div>
                            <div class="col-md-3" align="center">
                                <lottie-player src="https://assets6.lottiefiles.com/packages/lf20_pz4xjiod.json" mode="bounce" background="transparent" speed="0.5" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                            </div>
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