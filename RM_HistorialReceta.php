<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1>
            Paciente
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Historial Recetas</a></li>
        </ol>
    </section> -->

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); ?>
                    <div align="center">
                        <a class="btn btn-block btn-outline-info rounded-pill shadow"
                            href="RM_ModuloReceta.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i
                                class="fa fa-heartbeat"></i> Nueva Receta </a>
                    </div>
                    <br>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="box-body">
        <div>
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active">
                            <a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" style='color: black;'>
                                <i class='fas fa-book-medical' style='font-size:26px; color:black;'> </i> Recetas </a>
                        </li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="active" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  RM_Recetario where cliente_id = '$clienteId' AND (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') GROUP BY receta_id");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];
                                        $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                                        $receta_id = $rowMotorizado['receta_id'];

                                        ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading"
                                                style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#Receta<?php echo $id ?>"
                                                        aria-expanded="false" aria-controls="Receta<?php echo $id ?>">
                                                        Receta #
                                                        <?php echo $receta_id . ' / <b style="color: #444444;">' . $Fecha_Registro . '</b>'; ?>


                                                        <button
                                                            onclick="window.location.href='ImprimirReceta?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>'"
                                                            style="border: hidden;background-color: initial;font-size: 20px;"><i
                                                                class="iconify" data-icon="gridicons:print"></i></button>
                                                        <button
                                                            onclick="window.location.href='RecetaEnviar?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>'"
                                                            style="border: hidden;background-color: initial;font-size: 20px;"><i
                                                                class="iconify" data-icon="bi:send"></i></button>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Receta<?php echo $id ?>" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading"
                                                style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php

                                                    $QueryRecetario = mysqli_query($conn3, "SELECT * FROM RM_Recetario where receta_id = '$receta_id' AND cliente_id = '$cliente_id'");
                                                    while ($RowRecetario = mysqli_fetch_array($QueryRecetario)) {

                                                        $id = $RowRecetario['id'];
                                                        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                                                        $Cantidad = $RowRecetario['Cantidad'];
                                                        $Presentacion = $RowRecetario['Presentacion'];
                                                        $Via_Administracion = $RowRecetario['Via_Administracion'];
                                                        $Composicion = $RowRecetario['Composicion'];
                                                        $Dosis = $RowRecetario['Dosis'];

                                                        $Indicaciones = $RowRecetario['Indicaciones'];
                                                        $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                                                        echo "<div class='col-xs-12'>Nombre: {$Nombre_Medicamento} </div>";
                                                        echo "<div class='col-xs-12'>Presentación: {$Presentacion} </div>";
                                                        echo "<div class='col-xs-12'>Via de Administración: {$Via_Administracion} </div>";
                                                        echo "<div class='col-xs-12'>Composición: {$Composicion} </div>";
                                                        echo "<div class='col-xs-12'>Cantidad: {$Cantidad} </div>";
                                                        echo "<div class='col-xs-12'>Dosis: {$Dosis}</div><div class='col-xs-12'><br></div>";
                                                    }

                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--final accordion-->  
                        </div>
                        <!-- cierre seccion 1-->
                    </div>
                </div>
            </div>
        </div>
    </div>

















</div>
</section>
</div>


<?php
include 'footer.php';

?>