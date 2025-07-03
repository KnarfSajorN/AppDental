<?php
include 'header.php';
include 'menu.php';

$_POST = DatosIngresarMysqli($_POST);
$Nombre_Tabla = "Global_Select";
$TipoSelect = $_GET["Tipo"];
///////////////////////////////////////////////////////////////////////////
if ($_GET['Eliminar'] <> "") {
    $NombreEliminar = $_GET['Eliminar'];

    $QuerySelect = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla} WHERE Nombre = '{$TipoSelect}' LIMIT 1");
    $nrowSelect = mysqli_num_rows($QuerySelect);
    while ($RowSelect = mysqli_fetch_array($QuerySelect)) {
        $Opciones = $RowSelect['Opciones'];
    }

    $Listado = json_decode($Opciones, true);
    foreach ($Listado as $key => $value) {
        if ($value == $NombreEliminar) {
            unset($Listado[$key]);
        }
    }
    $Listado1 = json_encode($Listado, JSON_UNESCAPED_UNICODE);

    $queryList = mysqli_query($conn3, "UPDATE {$Nombre_Tabla} SET Opciones='{$Listado1}' WHERE Nombre = '{$TipoSelect}' limit 1");

    $ruta = htmlentities($_SERVER['PHP_SELF']);
    if ($queryList != true) {
        echo "<script language='Javascript'> window.location='{$ruta}?Tipo={$TipoSelect}&error=Hubo Un Error Al Eliminar Los Datos'</script>";
    } else {
        echo "<script language='Javascript'> window.location='{$ruta}?Tipo={$TipoSelect}&msg=Se Eliminaron Los Datos Correctamente'</script>";
    }
}
///////////////////////////////////////////////////////////////////////////

#Cierre
if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];
?>

<script src="plugins/LottieK/lottie.min.js"></script>
<style>
    /* Botón primary */
    .css-button-sharp--green1 {
        min-width: 130px;
        height: 40px;
        color: #fff;
        padding: 5px 10px;
        font-weight: bold;
        cursor: pointer;
        transition: all 0.3s ease;
        position: relative;
        display: inline-block;
        outline: none;
        border: 2px solid #ef4259;
        background: #ef4259;
        border-radius: 30px;
    }

    .css-button-sharp--green1:hover {
        background: #fff;
        color: #ef4259
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro de Paquetes </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Historial de Opciones de <?php echo $TipoSelect; ?></h4>
                <div class="box">
                    <div class="box-body">

                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body row">
                                    <!-- <div class="col-md-3" align="center">
                                        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_ecvbfngq.json" mode="bounce" background="transparent" speed="0.5" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                                    </div> -->
                                    <div class="col-md-12" align="center">
                                        <h2 style="text-align: center;font-weight: bold;"> Historial </h2>
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre</th>
                                                    <th scope="col">Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                $queryList = mysqli_query($conn3, "SELECT * FROM {$Nombre_Tabla}  WHERE Nombre LIKE  '%{$TipoSelect}%' LIMIT 1") or die("Error: " . mysqli_error($conn3));
                                                while ($RowSelect = mysqli_fetch_array($queryList)) {

                                                    $Opciones = $RowSelect['Opciones'];
                                                    $Listado = json_decode($Opciones, true);

                                                    foreach ($Listado as $key => $value) {
                                                        $contador++;

                                                        // echo "<br>" . $key . " = " . $value;

                                                        $ruta = htmlentities($_SERVER['PHP_SELF']);

                                                        echo "<tr width='2%'><th scope='row'>{$contador}</th>
                                                    <td width='80%' align='center'>{$value}</td>";

                                                        echo "<td width='20%' align='center'>
                                                    <font> <a href='{$ruta}?Eliminar={$value}&Tipo={$TipoSelect}' class='css-button-sharp--green1'> <i class='fa fa-close' title='Eliminar'> Eliminar</i></a></font><br>    
                                                    </td></tr>";
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- <div class="col-md-3" align="center">
                                        <lottie-player src="https://assets5.lottiefiles.com/packages/lf20_ecvbfngq.json" mode="bounce" background="transparent" speed="0.5" style="width: 300px; height: 300px;" loop autoplay></lottie-player>
                                    </div> -->
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