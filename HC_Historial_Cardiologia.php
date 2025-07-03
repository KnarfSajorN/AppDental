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
        Paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Historial Cardiología</a></li>
      </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen"/>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="card-body">
          <div class="box">
          <?php echo datosPacientes($clienteId);?>
            <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="HC_Historia_Cardiologia?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?php echo encrypt($clienteId);?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar Exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Cardiología</a></li>
                        <!--<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                    
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Cardiologia where cliente_id = '$clienteId' AND usuario_id='$usuarioId' order by id DESC ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($rowMotorizado=mysqli_fetch_array($queryList))
                                    {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];
                                        $fecha = $rowMotorizado['fecha'];


                                        $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
                                        $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
                                        $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
                                        $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
                                        $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
                                        $Checks_Revision = $rowMotorizado['Checks_Revision'];
                                        $SignosVitales = $rowMotorizado['SignosVitales'];
                                        $Paraclinicos = $rowMotorizado['Paraclinicos'];
                                        $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                        $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                        $ExamenFisico = $rowMotorizado['ExamenFisico'];
                                        $OrganoSentidos = $rowMotorizado['OrganoSentidos'];
                                        $SintomasGenerales = $rowMotorizado['SintomasGenerales'];
                                        $DiagnosticoAcupuntura = $rowMotorizado['DiagnosticoAcupuntura'];
                                        $DiagnosticoConsulta = $rowMotorizado['DiagnosticoConsulta'];
                                        $Impresion = $rowMotorizado['Impresion'];
                                        $PlanManejo = $rowMotorizado['PlanManejo'];
                                        $Incapacidades = $rowMotorizado['Incapacidades'];
                                        $Insumos = $rowMotorizado['Insumos'];
                                        $RecetaId = $rowMotorizado['RecetaId'];
                                        $CIE_10_1 = $rowMotorizado["CIE10_1"];
                                        $CIE_10_2 = $rowMotorizado["CIE10_2"];
                                        $CIE_10_3 = $rowMotorizado["CIE10_3"];
                                        $CIE_10_4 = $rowMotorizado["CIE10_4"];

                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaOtorrino<?php echo $id?>" aria-expanded="false" aria-controls="HistoriaOtorrino<?php echo $id?>">
                                        Fecha <?php echo $fecha?>

                                        <button onclick="window.location.href='HC_Finalizado_Historias?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="HistoriaOtorrino<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                        <hr align="center" size="10" width="100%" color="#000000">
                    
                                        <div align="right" >
                                        Fecha <?php echo $fecha?>
                                        </div>


                                       <!-- Edwin =)  -->
                                                    <?php if ($InformacionAcudiente) : ?>
                                                        <p><b>Información del Acudiente</b></p>
                                                        <?= nl2br($InformacionAcudiente) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($EnfermedadActual) : ?>
                                                        <p><b>Hea</b></p>
                                                        <?= nl2br($EnfermedadActual) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($Checks_Antecedentes) : ?>
                                                        <p><b>Antecedentes</b></p>
                                                        <?= nl2br($Checks_Antecedentes) ?><br>
                                                    <?php endif; ?>

                                                    <!-- <?php if ($AntecentesGinecobstetricos) : ?>
                                                        <p><b>Antecedentes Ginecobstetricos</b></p>
                                                        <?= $AntecentesGinecobstetricos ?><br>
                                                    <?php endif; ?> -->

                                                    <?php if ($AntecedentesFamiliares) : ?>
                                                        <p><b>Antecedentes Familiares</b></p>
                                                        <?= nl2br($AntecedentesFamiliares) ?><br>
                                                    <?php endif; ?>

                                                    <!-- <?php if ($Checks_Revision) : ?>
                                                        <p><b>Revision por Sistemas</b></p>
                                                        <?= $Checks_Revision ?><br>
                                                    <?php endif; ?> -->

                                                    <?php if ($SignosVitales) : ?>
                                                        <p><b>Signos Vitales y Medidas Antropométricas</b></p>
                                                        <?= nl2br($SignosVitales) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($Paraclinicos) : ?>
                                                        <p><b>Laboratorios</b></p>
                                                        <?= nl2br($Paraclinicos) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($Imagenologia_Examen || $Laboratorio_Examenes) : ?>
                                                        <p><b>Exámenes</b></p>
                                                    <?php endif; ?>

                                                    <?php if ($Imagenologia_Examen) : ?>
                                                        <p><b>Radiología</b></p>
                                                        <?php
                                                        $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                                        foreach ($Examen_Paciente as $value) : ?>
                                                            <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') ?><br>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>

                                                    <?php if ($Laboratorio_Examenes) : ?>
                                                        <p><b>Laboratorios</b></p>
                                                        <?php
                                                        $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                                        foreach ($Laboratorio_Paciente as $value) :
                                                        ?>
                                                            <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') ?><br>
                                                        <?php endforeach; ?>

                                                        <?php ?>
                                                    <?php endif; ?>


                                                    <?php if ($ExamenFisico) : ?>
                                                        <p><b>Examen Físico</b></p>
                                                        <?= nl2br($ExamenFisico) ?><br>
                                                    <?php endif; ?>

                                                    <!-- <?php if ($OrganoSentidos) : ?>
                                                        <p><b>Organos de los Sentidos</b></p>
                                                        <?= $OrganoSentidos ?><br>
                                                    <?php endif; ?> -->

                                                    <!-- <?php if ($SintomasGenerales) : ?>
                                                        <p><b>Sintomas Generales</b></p>
                                                        <?= $SintomasGenerales ?><br>
                                                    <?php endif; ?> -->

                                                    <!-- <?php if ($DiagnosticoAcupuntura) : ?>
                                                        <p><b>Diagnóstico de Acupuntura</b></p>
                                                        <?= $DiagnosticoAcupuntura ?><br>
                                                    <?php endif; ?> -->

                                                    <?php if ($DiagnosticoConsulta) : ?>
                                                        <p><b>Diagnóstico</b></p>
                                                        <?= nl2br($DiagnosticoConsulta) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($Impresion) : ?>
                                                        <p><b>Dx</b></p>
                                                        <?= nl2br($Impresion) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($PlanManejo) : ?>
                                                        <p><b>Conducta a Seguir</b></p>
                                                        <?= nl2br($PlanManejo) ?><br>
                                                    <?php endif; ?>

                                                    <?php if ($Incapacidades) : ?>
                                                        <p><b>Incapacidades</b></p>
                                                        <?= nl2br($Incapacidades) ?><br>
                                                    <?php endif; ?>

                                                    <!-- <?php if ($Insumos) : ?>
                                                        <p><b>Insumos</b></p>
                                                        <?= $Insumos ?><br>
                                                    <?php endif; ?> -->

                                                    <!-- CIE10  -->
                                                    <?php if (strlen($CIE_10_1) > "1") : ?>
                                                        <div class="col-12" style="padding-bottom: 10px;">
                                                            <b>Diagnóstico principal: <?= $CIE_10_1 ?> - <?= funcionMaster($CIE_10_1, 'codigo', 'descripcion', 'cie10') ?></b>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (strlen($CIE_10_2) > "1") : ?>
                                                        <div class="col-12" style="padding-bottom: 10px;">
                                                            <b>Diagnóstico relacionado N° 1: <?= $CIE_10_2 ?> - <?= funcionMaster($CIE_10_2, 'codigo', 'descripcion', 'cie10') ?></b>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (strlen($CIE_10_3) > "1") : ?>
                                                        <div class="col-12" style="padding-bottom: 10px;">
                                                            <b>Diagnóstico relacionado N° 2: <?= $CIE_10_3 ?> - <?= funcionMaster($CIE_10_3, 'codigo', 'descripcion', 'cie10') ?></b>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php if (strlen($CIE_10_4) > "1") : ?>
                                                        <div class="col-12" style="padding-bottom: 10px;">
                                                            <b>Diagnóstico relacionado N° 3: <?= $CIE_10_4 ?> - <?= funcionMaster($CIE_10_4, 'codigo', 'descripcion', 'cie10') ?></b>
                                                        </div>
                                                    <?php endif; ?>

                                                    <?php
                                                    // echo 'Informacion del Acudiente<br>'.$InformacionAcudiente.'<br>';
                                                    // echo 'Enfermedad Actual<br>'.$EnfermedadActual.'<br>';
                                                    // echo 'Antecedentes <br>'.$Checks_Antecedentes.'<br>';
                                                    // echo 'Antecedentes Ginecobstetricos<br>'.$AntecentesGinecobstetricos.'<br>';
                                                    // echo 'Antecedentes Familiares<br>'.$AntecedentesFamiliares.'<br>';
                                                    // echo 'Revision por Sistemas<br>'.$Checks_Revision.'<br>';
                                                    // echo 'Signos vitales y medidas antropométricas<br>'.$SignosVitales.'<br>';
                                                    // echo 'Paraclínicos<br>'.$Paraclinicos.'<br>';
                                                    // echo 'Examenes<br>';
                                                    // $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                                    // foreach ($Examen_Paciente as $value) {
                                                    //   echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                                                    // }
                                                    // echo 'Laboratorios<br>';
                                                    // $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                                    // foreach ($Laboratorio_Paciente as $value) {
                                                    //   echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                                                    // }
                                                    // echo 'Examen Físico<br>' . $ExamenFisico . '<br>';
                                                    // echo 'Organos de los Sentidos<br>' . $OrganoSentidos . '<br>';
                                                    // echo 'Sintomas Generales<br>' . $SintomasGenerales . '<br>';
                                                    // echo 'Diagnostico de Acupuntura<br>' . $DiagnosticoAcupuntura . '<br>';
                                                    // echo 'Diagnóstico<br>' . $DiagnosticoConsulta . '<br>';
                                                    // echo 'Impresion<br>' . $Impresion . '<br>';
                                                    // echo 'Plan de manejo<br>' . $PlanManejo . '<br>';
                                                    // echo 'Incapacidades<br>' . $Incapacidades . '<br>';
                                                    // echo 'Insumos<br>' . $Insumos . '<br>';

                                                    // if (strlen($CIE_10_1) > "1") {
                                                    //   echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico principal </b> :' . $CIE_10_1 . ' - ' . funcionMaster($CIE_10_1, 'codigo', 'descripcion', 'cie10') . '</div>';
                                                    // }

                                                    // if (strlen($CIE_10_2) > "1") {
                                                    //   echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico relacionado N° 1 </b> :' . $CIE_10_2 . ' - ' . funcionMaster($CIE_10_2, 'codigo', 'descripcion', 'cie10') . '</div>';
                                                    // }

                                                    // if (strlen($CIE_10_3) > "1") {
                                                    //   echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico relacionado N° 2 </b> :' . $CIE_10_3 . ' - ' . funcionMaster($CIE_10_3, 'codigo', 'descripcion', 'cie10') . '</div>';
                                                    // }

                                                    // if (strlen($CIE_10_4) > "1") {
                                                    //   echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico relacionado N° 3 </b> :' . $CIE_10_4 . ' - ' . funcionMaster($CIE_10_4, 'codigo', 'descripcion', 'cie10') . '</div>';
                                                    // }
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
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            

                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

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