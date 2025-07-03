<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
?>
<style>
.nav > li {
    margin-bottom: 20px;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Clinico Gineco-Obstetrico</a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="GO_Historia_Clinica_Ginecobstetrica?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?php echo encrypt($clienteId); ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar Exámenes </a>
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
    <div class="">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias Gineco-Obstetricas</a></li>
            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Laboratorio/Imagenologia Gineco-Obstetricas</a></li>
            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades Gineco-Obstetricas</a></li>
            <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas Gineco-Obstetricas</a></li>
            <li role="presentation"><a href="#Section14" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Ecografías Gineco-Obstetricas</a></li>

          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->



            <!-- =============== INICIO DIV DE LABORATORIO ========================== -->
            <div class="tab-pane" id="Examenes_Laboratorios">
     
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
            Laboratorios
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM   Ordenlaboratorio where  cliente_id = $clienteId order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $datos       =$rowMotorizado['datos'];
                  $lab      =$rowMotorizado['laboratorio'];

                  $hematologia_final=str_replace('|','<br>',$rowMotorizado['hematologia_final']);
                  $drogasabuso_final=str_replace('|','<br>',$rowMotorizado['drogasabuso_final']);
                  $serologia_final=str_replace('|','<br>',$rowMotorizado['serologia_final']);
                  $autoinmunidad_final=str_replace('|','<br>',$rowMotorizado['autoinmunidad_final']);
                  $coproanalisis_final=str_replace('|','<br>',$rowMotorizado['coproanalisis_final']);
                  $coagulacion_final=str_replace('|','<br>',$rowMotorizado['coagulacion_final']);
                  $enzimas_final=str_replace('|','<br>',$rowMotorizado['enzimas_final']);
                  $biologiamolecular_final=str_replace('|','<br>',$rowMotorizado['biologiamolecular_final']);
                  $electro_final=str_replace('|','<br>',$rowMotorizado['electro_final']);
                  $anticuerpos_final=str_replace('|','<br>',$rowMotorizado['anticuerpos_final']);
                  $bacteriologia_final=str_replace('|','<br>',$rowMotorizado['bacteriologia_final']);
                  $quimica_final=str_replace('|','<br>',$rowMotorizado['quimica_final']);
                  $marcadores_final=str_replace('|','<br>',$rowMotorizado['marcadores_final']);
                  $drogas_final=str_replace('|','<br>',$rowMotorizado['drogas_final']);
                  $pruebashor_final=str_replace('|','<br>',$rowMotorizado['pruebashor_final']);
                  $inmuno_final=str_replace('|','<br>',$rowMotorizado['inmuno_final']);
                  $orina_final=str_replace('|','<br>',$rowMotorizado['orina_final']);
                  $patologia_final=str_replace('|','<br>',$rowMotorizado['patologia_final']);
                  $otrosexa_final=str_replace('|','<br>',$rowMotorizado['otrosexa_final']);
                  $otros_laboratorios=str_replace('|','<br>',$rowMotorizado['otros_laboratorios']);
                  
                  

                     ?>
 


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#procesado<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirOrdenLabOste.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Test" target="_blank"><i class="fa fa-print"></i> </a>
                      <a href="enviarLaboratorio.php?historiaClinica1=<?php echo $ID?>" title="Enviar laboratorio" target="_blank"><i class="fa fa-send-o"></i> </a>
                      
                    </h4>
                  </div>
                  <div id="procesado<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
               <p>
        <?php  if ( $hematologia_final<> '') { echo '<b>HEMATOLOGÍA</b> <br>'.$hematologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $drogasabuso_final<> '') { echo '<b>DROGAS DE ABUSO</b> <br>'.$drogasabuso_final;} ?> 
      </p>
      <p>
        <?php  if ( $serologia_final<> '') { echo '<b>SEROLOGÍA</b> <br>'.$serologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $autoinmunidad_final<> '') { echo '<b>AUTOINMUNIDAD</b> <br>'.$autoinmunidad_final;} ?> 
      </p>
      <p>
        <?php  if ( $coproanalisis_final<> '') { echo '<b>COPROANÁLISIS</b> <br>'.$coproanalisis_final;} ?> 
      </p>
      <p>
        <?php  if ( $coagulacion_final<> '') { echo '<b>COAGULACIÓN</b> <br>'.$coagulacion_final;} ?> 
      </p>
      <p>
        <?php  if ( $enzimas_final<> '') { echo '<b>ENZIMAS</b> <br>'.$enzimas_final;} ?> 
      </p>
      <p>
        <?php  if ( $biologiamolecular_final<> '') { echo '<b>BIOLOGÍA MOLECULAR</b> <br>'.$biologiamolecular_final;} ?> 
      </p>
      <p>
        <?php  if ( $electro_final<> '') { echo '<b>ELECTROLITOS</b> <br>'.$electro_final;} ?> 
      </p>
      <p>
        <?php  if ( $anticuerpos_final<> '') { echo '<b>ANTICUERPOS VIRALES E INMUNODIAGNOSTICO</b> <br>'.$anticuerpos_final;} ?> 
      </p>

      <p>
        <?php  if ( $bacteriologia_final<> '') { echo '<b>BACTERIOLOGIA</b> <br>'.$bacteriologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $quimica_final<> '') { echo '<b>QUIMICA SANGUINEA</b> <br>'.$quimica_final;} ?> 
      </p>
      <p>
        <?php  if ( $marcadores_final<> '') { echo '<b>MARCADORES ONCOLÓGICOS</b> <br>'.$marcadores_final;} ?> 
      </p>
      <p>
        <?php  if ( $drogas_final<> '') { echo '<b>DROGAS TERAPÉUTICAS</b> <br>'.$drogas_final;} ?> 
      </p>
      <p>
        <?php  if ( $pruebashor_final<> '') { echo '<b>PRUEBAS HORMONALES</b> <br>'.$pruebashor_final;} ?> 
      </p>

      <p>
        <?php  if ( $inmuno_final<> '') { echo '<b>INMUNO DIAGNÓSTICO</b> <br>'.$inmuno_final;} ?> 
      </p>
      <p>
        <?php  if ( $orina_final<> '') { echo '<b>ORINA</b> <br>'.$orina_final;} ?> 
      </p>
      <p>
        <?php  if ( $patologia_final<> '') { echo '<b>PATOLOGÍA-CITOLOGÍA</b> <br>'.$patologia_final;} ?> 
      </p>
      <p>
        <?php  if ( $otrosexa_final<> '') { echo '<b>OTROS</b> <br>'.$otrosexa_final;} ?> 
      </p>
      <p>
        <?php  if ( $otros_laboratorios<> '') { echo '<b>OTROS LABORATORIOS</b> <br>'.$otros_laboratorios;} ?> 
      </p>
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            </div>


            <!-- =============== FIN DIV DE LABORATORIO ========================== -->

            <!-- =============== INICIO DIV DE IMAGENOLOGIA ========================== -->
            <div class="tab-pane" id="Examenes_Imagenologia">
     
          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
            Imagenologia
           </h3>
    
                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM imagenologia where  cliente_id = $clienteId order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  $datos1       =$rowMotorizado['datos'];
                  $lab1      =$rowMotorizado['laboratorio'];
                  

                     ?>

                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#cerrado<?php echo $ID?>">
                        Fecha <?php echo $Fecha .'-'.$Hora?>  
                      </a>
                      <a href="imprimirImagenologia.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Test" target="_blank"><i class="fa fa-print"></i> </a>
                      <a href="enviarImagenologia.php?historiaClinica1=<?php echo $ID?>" title="Enviar" target="_blank"><i class="fa fa-send-o"></i> </a>
                    </h4>
                  </div>
                  <div id="cerrado<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
                   



               <hr align="center" size="10" width="100%" color="#000000">
                
               <div align="right" >
                Fecha <?php echo $Fecha .'-'.$Hora?>
               </div>
               
            
              
               
              <div>
             
             <table>
                 <?php echo $datos1?>
                 <?php echo $lab1?>
                 
                   </table> 
               
              </div>
             
 
     

                    </div>
                  </div>
                </div>
               

              
            <?php }  ?>

            </div>
            <!-- =============== FIN DIV DE IMAGENOLOGIA ========================== -->


            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Ginecobstetrica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
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
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                            Historia <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                            <button onclick="window.location.href='GO_Finalizado_Historia_Ginecobstetrica?historiaClinica1=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;" title="Visualizar Consulta"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                            <button onclick="window.location.href='GO_Evolucion_Historia_Ginecobstetrica?historiaClinica=<?php echo $id?>&cliente=<?php echo $clienteId?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file" data-icon="gridicons:print"></i></button>
                            <button onclick="window.location.href='GO_Historial_Evolucion_Historia_Ginecobstetrica?historiaClinica=<?php echo $id?>&cliente=<?php echo $clienteId?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">

                          <!-- Edwin =)  -->
                          <?php if ($InformacionAcudiente) : ?>
                            <p><b>Informacion del Acudiente</b></p>
                            <?= $InformacionAcudiente ?><br>
                          <?php endif; ?>

                          <?php if ($EnfermedadActual) : ?>
                            <p><b>Enfermedad Actual</b></p>
                            <?= $EnfermedadActual ?><br>
                          <?php endif; ?>

                          <?php if ($Checks_Antecedentes) : ?>
                            <p><b>Antecedentes</b></p>
                            <?= $Checks_Antecedentes ?><br>
                          <?php endif; ?>

                          <?php if ($AntecentesGinecobstetricos) : ?>
                            <p><b>Antecedentes Ginecobstetricos</b></p>
                            <?= $AntecentesGinecobstetricos ?><br>
                          <?php endif; ?>

                          <?php if ($AntecedentesFamiliares) : ?>
                            <p><b>Antecedentes Familiares</b></p>
                            <?= $AntecedentesFamiliares ?><br>
                          <?php endif; ?>

                          <?php if ($Checks_Revision) : ?>
                            <p><b>Revision por Sistemas</b></p>
                            <?= $Checks_Revision ?><br>
                          <?php endif; ?>

                          <?php if ($SignosVitales) : ?>
                            <p><b>Signos vitales y medidas antropométricas</b></p>
                            <?= $SignosVitales ?><br>
                          <?php endif; ?>

                          <?php if ($Paraclinicos) : ?>
                            <p><b>Paraclínicos</b></p>
                            <?= $Paraclinicos ?><br>
                          <?php endif; ?>

                          <?php if ($Imagenologia_Examen || $Laboratorio_Examenes) : ?>
                            <p><b>Exámenes</b></p>
                          <?php endif; ?>

                          <?php if ($Imagenologia_Examen) : ?>
                            <p><b>Imagenología</b></p>
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
                            <?= $ExamenFisico ?><br>
                          <?php endif; ?>

                          <?php if ($OrganoSentidos) : ?>
                            <p><b>Organos de los Sentidos</b></p>
                            <?= $OrganoSentidos ?><br>
                          <?php endif; ?>

                          <?php if ($SintomasGenerales) : ?>
                            <p><b>Sintomas Generales</b></p>
                            <?= $SintomasGenerales ?><br>
                          <?php endif; ?>

                          <?php if ($DiagnosticoAcupuntura) : ?>
                            <p><b>Diagnóstico de Acupuntura</b></p>
                            <?= $DiagnosticoAcupuntura ?><br>
                          <?php endif; ?>

                          <?php if ($DiagnosticoConsulta) : ?>
                            <p><b>Diagnóstico</b></p>
                            <?= $DiagnosticoConsulta ?><br>
                          <?php endif; ?>

                          <?php if ($Impresion) : ?>
                            <p><b>Impresion</b></p>
                            <?= $Impresion ?><br>
                          <?php endif; ?>

                          <?php if ($PlanManejo) : ?>
                            <p><b>Plan de manejo</b></p>
                            <?= $PlanManejo ?><br>
                          <?php endif; ?>

                          <?php if ($Incapacidades) : ?>
                            <p><b>Incapacidades</b></p>
                            <?= $Incapacidades ?><br>
                          <?php endif; ?>

                          <?php if ($Insumos) : ?>
                            <p><b>Insumos</b></p>
                            <?= $Insumos ?><br>
                          <?php endif; ?>

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


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Ginecobstetrica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $id = $rowMotorizado['id'];
                    $cliente_id = $rowMotorizado['cliente_id'];

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

                  ?>

                    <?php if ($Imagenologia_Examen || $Laboratorio_Examenes) : ?>

                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Examenes<?php echo $id ?>" aria-expanded="false" aria-controls="Examenes<?php echo $id ?>">
                              Exámenes <?php echo $id; ?>

                              <button onclick="window.location.href='GO_Finalizado_Historia_Ginecobstetrica.php?historiaClinica1=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;" title="Visualizar Consulta"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                            </a>
                          </h4>
                        </div>
                        <div id="Examenes<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                          <div class="panel-body">
                            <p><b>Exámenes</b></p>
                            <?php if ($Imagenologia_Examen) : ?>
                              <p><b>Imagenología</b></p>
                              <?php
                              $Examen_Paciente = explode(",", $Imagenologia_Examen);
                              foreach ($Examen_Paciente as $value) :
                              ?>
                                <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') ?><br>
                              <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if ($Laboratorio_Examenes) : ?>
                              <p><b>Laboratorio</b></p>
                              <?php
                              $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                              foreach ($Laboratorio_Paciente as $value) :
                              ?>
                                <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') ?><br>
                              <?php endforeach; ?>
                            <?php endif; ?>

                          </div>
                        </div>
                      </div>
                  <?php
                    endif;
                  }
                  ?>
                </div>
              </div>
              <!--final accordion--> 


            </div>
            <!-- cierre seccion 2-->



            <!-- inicio seccion 3 -->
            <div role="tabpanel" class="tab-pane fade" id="Section3">


              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Ginecobstetrica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $id = $rowMotorizado['id'];
                    $cliente_id = $rowMotorizado['cliente_id'];

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

                  ?>

                    <?php if ($Incapacidades) : ?>
                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Incapacidad<?php echo $id ?>" aria-expanded="false" aria-controls="Incapacidad<?php echo $id ?>">
                              Incapacidad <?php echo $id; ?>
                              <button onclick="window.location.href='GO_Finalizado_Historia_Ginecobstetrica.php?historiaClinica1=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;" title="Visualizar Consulta"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                            </a>
                          </h4>
                        </div>
                        <div id="Incapacidad<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                          <div class="panel-body">
                            <p><b>Incapacidades</b></p>
                            <?= $Incapacidades ?><br>
                          </div>
                        </div>
                      </div>
                  <?php
                    endif;
                  }
                  ?>
                </div>
              </div>
              <!--final accordion-->  


            </div>
            <!-- cierre seccion 3-->







            <!-- inicio seccion 4 -->
            <div role="tabpanel" class="tab-pane fade" id="Section4">


              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Ginecobstetrica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND Receta_id<>'0'");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $id = $rowMotorizado['id'];
                    $cliente_id = $rowMotorizado['cliente_id'];

                    $receta_id = $rowMotorizado['receta_id'];

                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id; ?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id; ?> 
                          <button onclick="window.location.href='GO_Finalizado_Historia_Ginecobstetrica.php?historiaClinica1=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;" title="Visualizar Consulta"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                        </a>
                        </h4>
                      </div>
                      <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                        <div class="panel-body">
                          <?php

                          $querydeta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");
                          while ($RowRecetario = mysqli_fetch_array($querydeta)) :


                            $id = $RowRecetario['id'];
                            $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                            $Cantidad = $RowRecetario['Cantidad'];
                            $Presentacion = $RowRecetario['Presentacion'];
                            $Via_Administracion = $RowRecetario['Via_Administracion'];
                            $Composicion = $RowRecetario['Composicion'];
                            $Dosis = $RowRecetario['Dosis'];

                            $Indicaciones = $RowRecetario['Indicaciones'];
                            $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                          ?>

                            <div class='col-6'>
                              <div class='col-12'><b>Nombre:</b> <?= $Nombre_Medicamento ?> </div>
                              <div class='col-12'><b>Presentacion:</b> <?= $Presentacion ?></div>
                              <div class='col-12'><b>Via de Administracion:</b> <?= $Via_Administracion ?></div>
                              <div class='col-12'><b>Composicion:</b> <?= $Composicion ?></div>
                              <div class='col-12'><b>Cantidad:</b> <?= $Cantidad ?></div>
                              <div class='col-12'><b>Dosis:</b> <?= $Dosis ?></div>
                              <div class='col-12'><br></div>
                            </div>

                            <div class='col-6'>
                              <div class='col-12'><b>Indicaciones:</b><br> <?= $Indicaciones ?></div>
                              <div class='col-12'><b>Indicaciones Generales:</b><br> <?= $Indicaciones_Generales ?></div>
                              <div class='col-12'><br>
                                <hr style='border-top: 1px solid #000;'><br>
                              </div>
                            </div>

                          <?php endwhile; ?>
                                 
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
            <!-- cierre seccion 4-->



            <!-- inicio seccion 14 -->
            <div role="tabpanel" class="tab-pane fade" id="Section14">


              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php 
               
                  $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_ecografias where  cliente_id = $clienteId AND usuario_id = '$usuarioId' order by ID DESC");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $ID      =$rowMotorizado['ID'];
                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                      $eco             =$rowMotorizado['ecografiaDetalle'];
                      $diagnostico     =$rowMotorizado['diagnostico'];
                      $nombreeco       =$rowMotorizado['nombreEcografia'];
                  

                     ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Ecografias<?php echo $ID ?>" aria-expanded="false" aria-controls="Ecografias<?php echo $ID ?>">
                            Ecografias <?php echo $ID . ' / <b style="color: #444444;">' . $Fecha . '</b>'; ?>

                            <button onclick="window.location.href='GO_Finalizado_Ecografia.php?ecografia=<?php echo $ID; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Ecografias<?php echo $ID; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                        
                 <?php echo $eco ?>
                  <hr>
                  <?php if($diagnostico!=""){echo "Diagnostico: ".$diagnostico;}?>
                   
                      </div>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <!--final accordion-->
            </div>
            <!-- cierre seccion 14-->







           

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