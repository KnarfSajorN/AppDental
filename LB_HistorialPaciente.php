<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Paciente Historial Orden
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Paciente Historial Orden</a></li>
        </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); ?>
                    <div align="center">
                        <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" href="LB_GenerarOrdenLaboratorio?clienteId=<?=$clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Orden </a>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Órdenes de Laboratorio</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE idCliente='$clienteId' AND idEmpresa='$usuarioId' AND Facturado_Desde='Laboratorio'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $Examenes = "";
                                        $id = $rowMotorizado['idOperacion'];
                                        $fecha = $rowMotorizado['fechaOperacion'];

                                        $queryExamen = mysqli_query($conn3, "SELECT * FROM  LB_ExamenCargado WHERE idOperacion='$id' AND Activo = '1' ");
                                        while ($rowExamen = mysqli_fetch_array($queryExamen)) {
                                            $CaracteristicasExamen = $rowExamen["CaracteristicaExamen"];
                                            if ($CaracteristicasExamen == 'No') {
                                                $Examenes .= mysqli_real_escape_string($conn3, $rowExamen["Nombre"]) . "<br>";
                                            }
                                        }

                                        $Estado_Orden = $rowMotorizado['Estado_Orden'];
                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                                                        Orden # <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                                                        <?php if ($Estado_Orden == "Cerrado") : ?>
                                                            <button onclick="window.location.href='LB_ResultadoOrden?idOperacion=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;color: #09b737;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                                        <?php else : ?>
                                                            <button onclick="window.location.href='LB_EditarOrden.php?idOperacion=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-pencil"></i></button>
                                                        <?php endif; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo $Examenes;
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