<?php
include 'header.php';
include 'menu.php';

$idHospitalizacion = $_GET['idH'];



if(isset($_GET['idC']) && $_GET['idC'] <> ""){
    $clienteId =  $_GET['idC'];
}else{
    $clienteId = funcionMaster($idHospitalizacion, "idHospitalizacion", "cliente_id", "hoIngresoHospitalizacion");
}

$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); ?>
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
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" style='color: black;' > <i class='fas fa-book-medical' style='font-size:26px; color:black;'> </i> Historial de hospitalizacion<i class="fas fa-acquisitions-incorporated"></i> </a></li>
                        <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Prehospitalizacion  </a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1" >

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    if(isset($idHospitalizacion) && $idHospitalizacion != ""){
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  hoIngresoHospitalizacion where idHospitalizacion = '$idHospitalizacion'");
                                    }else{
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  hoIngresoHospitalizacion where cliente_id = '$clienteId'");
                                    }
                                                                        
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $idHospitalizacion = $rowMotorizado['idHospitalizacion'];
                                        $fechaIngreso= $rowMotorizado['fechaIngreso'];
                                        $horaIngreso	= $rowMotorizado['horaIngreso'];
                                        $fechaSalida	= $rowMotorizado['fechaSalida'];
                                        $horaSalida	= $rowMotorizado['horaSalida'];
                                        $motivoHospitalizacion	= $rowMotorizado['motivoHospitalizacion'];
                                        $diagnosticoHospitalizacion		= $rowMotorizado['diagnosticoHospitalizacion'];
                                        $diagnosticoCIE_10= $rowMotorizado['diagnosticoCIE_10'];
                                        $tratamiento	= $rowMotorizado['tratamiento'];
                                        $procedimientos	= $rowMotorizado['procedimientos'];
                                        $pisoSelect= $rowMotorizado['pisoSelect'];
                                        $habitacionSelect	= $rowMotorizado['habitacionSelect'];
                                        $camillaSelect	= $rowMotorizado['camillaSelect'];
                                        $hospitalizacionActiva= $rowMotorizado['hospitalizacionActiva'];
                                        $cliente_id= $rowMotorizado['cliente_id'];
                                        $usuarioId= $rowMotorizado['usuarioId'];
                                    
                                        if($hospitalizacionActiva == 1){
                                            $estadoHospitalizacion = "ACTIVA";
                                        }else{
                                            $estadoHospitalizacion = "CERRADA";
                                        }

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id ?>" aria-expanded="false" aria-controls="Receta<?php echo $id ?>">
                                                        Hospitalizacion # <?php echo $idHospitalizacion . ' / <b style="color: #444444;">' . $fechaIngreso . " - " .$fechaSalida.'/</b> <b>'. $estadoHospitalizacion .'</b>'; ?>

                                                        
                                                    <button onclick="window.location.href='HO_imprimirHospitalizacion.php?idHP=<?php echo encrypt($idHospitalizacion); ?>&cliente_id=<?php echo $cliente_id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="Receta<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                            <div class="col-md-12">
                                            <?php
                                            // INICIO ==> AQUI SE ENLISTA EL CONTENIDO INICIAL DE LA HOSPITALIZACION


                                            if($pisoSelect <> "" || $habitacionSelect <> ""  || $camillaSelect <> "" ){
                                                echo '<h4 align="center"><b>Datos de Hospitalizacion:</b></h4><br>
                                                <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">Piso</th>
                                                                <th scope="col">Habitacion</th>
                                                                <th scope="col">Camilla</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>'.$pisoSelect.'</td>
                                                                <td>'.$habitacionSelect.'</td>
                                                                <td>'. funcionMaster($camillaSelect,'idCamilla', 'descripcion', 'ho_camilla').'</td>
                                                            </tr>
                                                        </tbody>
                                                </table>';
                                            }
                                            if($motivoHospitalizacion <> ""){
                                                echo "<h6><b>Motivo de hospitalizacion:</b></h6><br>" . nl2br($motivoHospitalizacion);
                                            }

                                            if($diagnosticoHospitalizacion <> ""){
                                                echo "<h6><b>Diagnostico:</b></h6><br>" . nl2br($diagnosticoHospitalizacion);
                                            }

                                            if($diagnosticoCIE_10 <> ""){
                                                echo "<h6><b>Diagnostico CIE-10:</b></h6><br>" . nl2br($diagnosticoCIE_10);
                                            }

                                            if($tratamiento <> ""){
                                                echo "<h6><b>Tratamiento a seguir:</b></h6><br>" . nl2br($tratamiento);
                                            }

                                            if($procedimientos <> ""){
                                                echo "<h6><b>Procedimientos a seguir:</b></h6><br>" . nl2br($procedimientos);
                                            }
                                            // INICIO ==> AQUI SE ENLISTAN TODOS LOS PROCEDIMIENTOS ASOCIADOS CON ESTA HOSPITALIZACION


                                            $queryProcHospitalizacion = mysqli_query($conn3, "SELECT * FROM  procedimientosHospitalizacion where idHospitalizacion = '$idHospitalizacion'");
                                            echo "<h4 align='center'><b>Acciones/Procedimientos de Hospitalizacion:</b></h4>";
                                            foreach($queryProcHospitalizacion as $tablaProcedimientos){
                                                echo "<h5><b>Procedimiento:</b>" . nl2br($tablaProcedimientos['nombreProcedimiento']) . " || <b>Fecha/Hora:</b>" . $tablaProcedimientos['Fecha'] . " - " . $tablaProcedimientos['Hora'] . "</h5><br>";
                                                echo $tablaProcedimientos['detalle'];
                                                echo "<br><br>";
                                            }
                                            // FIN ==>  AQUI SE ENLISTAN TODOS LOS PROCEDIMIENTOS ASOCIADOS CON ESTA HOSPITALIZACION
                                            
                                            // FIN ==> AQUI SE ENLISTA EL CONTENIDO INICIAL DE LA HOSPITALIZACION
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



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade in show" id="Section2" >

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  ingresoPrehospitalizacion where cliente_id = $clienteId");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {


                                        $idPreH = $rowMotorizado['idPreH'];
                                        $fechaRegistro = $rowMotorizado['fechaRegistro'];
                                        $horaRegistro = $rowMotorizado['horaRegistro'];
                                        $motivoPrehospitalizacion = $rowMotorizado['motivoPrehospitalizacion'];
                                        $atenciones = $rowMotorizado['atenciones'];
                                        $usuario_id = $rowMotorizado['usuario_id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];
                                        $antecedentesRelevantes = $rowMotorizado['antecedentesRelevantes'];
                                        $medicamentosActuales = $rowMotorizado['medicamentosActuales'];
                                        $procedimientosPrevios = $rowMotorizado['procedimientosPrevios'];
                                        $examenesRecientes = $rowMotorizado['examenesRecientes'];
                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#preHospitalizacion<?php echo $id ?>" aria-expanded="false" aria-controls="Receta<?php echo $id ?>">
                                                        Registro de Prehospitalizacion # <?php echo $idPreH . ' / <b style="color: #444444;">' . $fechaRegistro.'</b>'; ?>

                                                        
                                                    <button onclick="window.location.href='imprimirPrehospitalizacion.php?idPre=<?php echo encrypt($idPreH); ?>&cliente_id=<?php echo $cliente_id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                                </a>
                                                </h4>
                                            </div>
                                            <div id="preHospitalizacion<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                            <div class="col-md-12">
                                            <?php
                                            // INICIO ==> AQUI SE ENLISTA EL CONTENIDO INICIAL DE LA PREHOSPITALIZACION


                                            if($motivoPrehospitalizacion <> ""){
                                                echo "<h6><b>Motivo de prehospitalizacion:</b></h6><br>" . nl2br($motivoPrehospitalizacion);
                                            }
                
                                            if($otrasAtenciones <> ""){
                                                echo "<h6><b>Atenciones Brindadas:</b></h6><br>" . nl2br($otrasAtenciones);
                                            }
                
                                            if($antecedentesRelevantes <> ""){
                                                echo "<h6><b>Antecedentes relevantes:</b></h6><br>" . nl2br($antecedentesRelevantes);
                                            }
                
                                            if($medicamentosActuales <> ""){
                                                echo "<h6><b>Medicamentos Actuales:</b></h6><br>" . nl2br($medicamentosActuales);
                                            }
                
                                            if($procedimientosPrevios <> ""){
                                                echo "<h6><b>Procedimientos recientes:</b></h6><br>" . nl2br($procedimientosPrevios);
                                            }
                
                                            if($examenesRecientes <> ""){
                                                echo '<h6><b>Examenes Recientes:</b></h6><br>'. nl2br($examenesRecientes);
                                            }
                                            
                                            // FIN ==> AQUI SE ENLISTA EL CONTENIDO INICIAL DE LA PREHOSPITALIZACION
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
                        <!-- cierre seccion 2-->




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