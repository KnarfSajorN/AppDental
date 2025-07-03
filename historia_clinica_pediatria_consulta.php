<?php
include 'header.php';
include 'menu.php';

$clienteId = decrypt($_GET['cI']);
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Pediatría</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="hcp?cI=<?= encrypt($clienteId); ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?= encrypt($clienteId); ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <br><br>
          </div>
        </div>

        <div class="box row">

          <div class="col-md-3">

            <button type='button' class='btn btn-outline-success rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("<?= $clienteId ?>",1,1);'> Gráfica Peso / Edad </button>
          </div>

          <div class="col-md-3">

            <button type='button' class='btn btn-outline-success rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("<?= $clienteId ?>",2,1);'>Gráfica Estatura / Edad </button>
          </div>

          <div class="col-md-3">
            <button type='button' class='btn btn-outline-success rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("<?= $clienteId ?>",3,1);'>Gráfica Perímetro Cefálico </button>
          </div>

          <div class="col-md-3">
            <button type='button' class='btn btn-outline-success rounded-pill' style='width:100%;margin-bottom: 10px;' data-toggle='modal' data-target='#modalGraficas' onclick='CargarGraficas("<?= $clienteId ?>",4,1);'> Gráfica IMC</button>
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
          <div class="card">
            <div class="card-header">
              <!-- Nav tabs -->
              <ul class="nav nav-tabs" role="tablist">
                <li role="presentation" class="nav-item active"><a class="nav-link" href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Pediatría</a></li>
                <li role="presentation" class="nav-item "><a class="nav-link" href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Exámenes de Pediatría</a></li>
                <li role="presentation" class="nav-item "><a class="nav-link" href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades de Pediatría</a></li>
                <li role="presentation" class="nav-item "><a class="nav-link" href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas de Pediatría</a></li>
                <li role="presentation" class="nav-item "><a class="nav-link" href="#Section5" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Exámenes Individuales de Pediatría</a></li>
              </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content tabs">
              <!-- inicio seccion 1 -->
              <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

                <!--inicio accordion-->
                <div class="col-md-12">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                    <?php

                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Pediatria where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
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
                      $Sospecha = $rowMotorizado['Sospecha'];

                    ?>
                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                              Historia <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                              <button onclick="window.location.href='hcpFinalizado?hC=<?=encrypt($id); ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                            </a>
                          </h4>
                        </div>
                        <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                          <div class="panel-body">


                            <?php

                            if (strlen($CIE_10_1) > "1") {
                              echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico principal </b> :' . $CIE_10_1 . ' - ' . funcionMaster($CIE_10_1, 'codigo', 'descripcion', 'cie10') . '</div>';
                            }

                            if (strlen($CIE_10_2) > "1") {
                              echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico relacionado N° 1 </b> :' . $CIE_10_2 . ' - ' . funcionMaster($CIE_10_2, 'codigo', 'descripcion', 'cie10') . '</div>';
                            }

                            if (strlen($CIE_10_3) > "1") {
                              echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico relacionado N° 2 </b> :' . $CIE_10_3 . ' - ' . funcionMaster($CIE_10_3, 'codigo', 'descripcion', 'cie10') . '</div>';
                            }

                            if (strlen($CIE_10_4) > "1") {
                              echo '<div class="col-12\" style="padding-bottom: 10px;\">' . '<b>  Diagnóstico relacionado N° 3 </b> :' . $CIE_10_4 . ' - ' . funcionMaster($CIE_10_4, 'codigo', 'descripcion', 'cie10') . '</div>';
                            }
                            echo 'Sospecha diagnóstico<br>' . $Sospecha . '<br>';
                            echo 'Información del Acudiente<br>' . $InformacionAcudiente . '<br>';
                            echo 'Enfermedad Actual<br>' . $EnfermedadActual . '<br>';
                            echo 'Antecedentes <br>' . $Checks_Antecedentes . '<br>';
                            echo 'Antecedentes Ginecoobstétricos<br>' . $AntecentesGinecobstetricos . '<br>';

                            //reemplazar tildes para evitar inconvenientes con el autoguardado
                            $reemplazos = array(
                              "Diagnostico" => "Diagnóstico",
                            );  
                            $AntecedentesFamiliares = str_replace(array_keys($reemplazos), array_values($reemplazos), $AntecedentesFamiliares);

                            echo 'Antecedentes Familiares<br>' . $AntecedentesFamiliares . '<br>';
                            echo 'Revision por Sistemas<br>' . $Checks_Revision . '<br>';

                            //reemplazar tildes para evitar inconvenientes con el guardar historia que toma el nombre para algunas insercciones
                            $reemplazos = array(
                              "Cefalico" => "Cefálico",
                              "Presion" => "Presión",
                              "Sistolica" => "Sistólica",
                              "Diastolica" => "Diastólica",
                              "Saturacion" => "Saturación",
                              "Tension" => "Tensión",
                              "Oxigeno" => "Oxígeno",
                            );  
                            $SignosVitales = str_replace(array_keys($reemplazos), array_values($reemplazos), $SignosVitales);

                            echo 'Signos vitales y medidas antropométricas<br>' . $SignosVitales . '<br>';
                            
                            //reemplazar tildes para evitar inconvenientes con el autoguardado
                            $reemplazos = array(
                                "Clasificacion" => "Clasificación",
                                "Paraclinico" => "Paraclínico",
                            );  
                            $Paraclinicos = str_replace(array_keys($reemplazos), array_values($reemplazos), $Paraclinicos);
                            echo 'Paraclínicos<br>' . $Paraclinicos . '<br>';
                            echo 'Exámenes<br>';
                            $Examen_Paciente = explode(",", $Imagenologia_Examen);
                            foreach ($Examen_Paciente as $value) {
                              echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                            }
                            echo 'Laboratorios<br>';
                            $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                            foreach ($Laboratorio_Paciente as $value) {
                              echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                            }
                            echo 'Examen Físico<br>' . $ExamenFisico . '<br>';
                            echo 'Órganos de los Sentidos<br>' . $OrganoSentidos . '<br>';
                            echo 'Síntomas Generales<br>' . $SintomasGenerales . '<br>';
                            echo 'Diagnostico de Acupuntura<br>' . $DiagnosticoAcupuntura . '<br>';
                            echo 'Diagnóstico<br>' . $DiagnosticoConsulta . '<br>';
                            echo 'Impresión<br>' . $Impresion . '<br>';
                            echo 'Plan de manejo<br>' . $PlanManejo . '<br>';
                            
                            //reemplazar tildes para evitar inconvenientes con el autoguardado
                            $reemplazos = array(
                              "Area" => "Área",
                            );  
                            $Incapacidades = str_replace(array_keys($reemplazos), array_values($reemplazos), $Incapacidades);
                            echo 'Incapacidades<br>' . $Incapacidades . '<br>';
                            echo 'Insumos<br>' . $Insumos . '<br>';



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

                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Pediatria where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
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
                      $Observaciones_Labora = $rowMotorizado['Observaciones_Labora'];
                      $Observaciones_Imagen = $rowMotorizado['Observaciones_Imagen'];

                    ?>

                      <?php if ($Imagenologia_Examen || $Laboratorio_Examenes) { ?>

                        <div class="panel panel-default" style="background: #f1f1f1;">
                          <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Examenes<?php echo $id ?>" aria-expanded="false" aria-controls="Examenes<?php echo $id ?>">
                                Examenes <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>
                                
                                <button onclick="window.location.href='hcpFinalizado?hC=<?=encrypt($id); ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                              </a>
                            </h4>
                          </div>
                          <div id="Examenes<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                            <div class="panel-body">
                              <?php
                              echo 'Examenes<br>';
                              $Examen_Paciente = explode(",", $Imagenologia_Examen);
                              foreach ($Examen_Paciente as $value) {
                                echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                              }
                              echo 'Laboratorios<br>';
                              $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                              foreach ($Laboratorio_Paciente as $value) {
                                echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia');
                              }


                              echo '<br>Observaciones Laboratorio<br>' . $Observaciones_Labora . '<br>';

                              echo 'Observaciones Imagenología<br>' . $Observaciones_Imagen . '<br>';


                              ?>       
                            </div>
                          </div>
                        </div>
                    <?php
                      }
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

                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Pediatria where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
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

                    ?>

                      <?php if ($Incapacidades) { ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                          <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Incapacidad<?php echo $id ?>" aria-expanded="false" aria-controls="Incapacidad<?php echo $id ?>">
                                Incapacidad <?php echo $id. ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                                <button onclick="window.location.href='hcpFinalizado?hC=<?=encrypt($id); ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                              </a>
                            </h4>
                          </div>
                          <div id="Incapacidad<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                            <div class="panel-body">
                              <?php
                              echo 'Incapacidades<br>' . $Incapacidades . '<br>';
                              ?>       
                            </div>
                          </div>
                        </div>
                    <?php
                      }
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

                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Pediatria where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND Receta_id<>'0'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $id = $rowMotorizado['id'];
                      $cliente_id = $rowMotorizado['cliente_id'];

                      $receta_id = $rowMotorizado['receta_id'];
                      $CIE_10_1 = $rowMotorizado["CIE10_1"];
                      $CIE_10_2 = $rowMotorizado["CIE10_2"];
                      $CIE_10_3 = $rowMotorizado["CIE10_3"];
                      $CIE_10_4 = $rowMotorizado["CIE10_4"];

                    ?>
                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id; ?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id; ?>

                              <button onclick="window.open('RM_ImprimirReceta.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>

                              <button onclick="window.open('RecetaEnviar.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="bi:send"></i></button>
                              <button onclick="window.location.href='RM_EditarReceta.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-solid fa-pencil"></i></button>
                            </a>
                          </h4>
                        </div>
                        <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                          <div class="panel-body">

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

                            $querydeta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");
                            while ($RowRecetario = mysqli_fetch_array($querydeta)) {

                              $id = $RowRecetario['id'];
                              $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                              $Cantidad = $RowRecetario['Cantidad'];
                              $Presentacion = $RowRecetario['Presentacion'];
                              $Via_Administracion = $RowRecetario['Via_Administracion'];
                              $Composicion = $RowRecetario['Composicion'];
                              $Dosis = $RowRecetario['Dosis'];

                              $Indicaciones = $RowRecetario['Indicaciones'];
                              $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];
                              $codigoProd1 = $RowRecetario['codigoProd1'];

                              echo "<div class='col-6'>";
                              echo "<div class='col-12'>Nombre: {$Nombre_Medicamento} {$codigoProd1}</div>";
                              echo "<div class='col-12'>Presentacion: {$Presentacion} </div>";
                              echo "<div class='col-12'>Via de Administracion: {$Via_Administracion} </div>";
                              echo "<div class='col-12'>Horario: {$Indicaciones} </div>";
                              echo "<div class='col-12'>Cantidad: {$Cantidad} </div>";
                              echo "<div class='col-12'>Dosis: {$Dosis}</div>";
                              echo "<div class='col-12'><br></div>";
                              echo "</div>";

                              echo "<div class='col-6'>";
                              echo "<div class='col-12'>Indicaciones Generales:<br> {$Indicaciones_Generales}</div>";
                              echo "<div class='col-12'><br><hr style='border-top: 1px solid #000;'><br></div>";
                              echo "</div>";
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
              <!-- cierre seccion 4-->

              <!-- inicio seccion 5 -->
              <div role="tabpanel" class="tab-pane fade" id="Section5">


                <!--inicio accordion-->
                <div class="col-md-12">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                    <?php
                    $queryList = mysqli_query($conn3, "SELECT * FROM  examenesaRealizar where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND historia_id LIKE 'E%'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $id = $rowMotorizado['id'];
                      $cliente_id = $rowMotorizado['cliente_id'];
                      $historia_id = $rowMotorizado['historia_id'];
                      $Imagenologia_Examen = $rowMotorizado['laboratorio'];
                      $Observaciones_Imagen = $rowMotorizado['Observaciones_Imagen'];
                      $Observaciones_Labora = $rowMotorizado['Observaciones_Labora'];

                    ?>

                      <?php if ($Imagenologia_Examen || $Laboratorio_Examenes) : ?>

                        <div class="panel panel-default" style="background: #f1f1f1;">
                          <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                            <h4 class="panel-title">
                              <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#ExamenesIndi<?php echo $id ?>" aria-expanded="false" aria-controls="ExamenesIndi<?php echo $id ?>">
                                Examenes Individuales <?php echo $id; ?>
                                <button onclick="window.location.href='hcpImprimir?hC=<?= encrypt($historia_id); ?>&tipo=examenes'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                <!-- Imprimir_Historia_Clinica_Pediatria.php?historiaClinica1=E25&tipo=examenes -->
                              </a>
                            </h4>
                          </div>
                          <div id="ExamenesIndi<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">


                            <div class="panel-body">


                              <p><b>Exámenes</b></p>
                              <?php if ($Imagenologia_Examen) : ?>
                                <p><b>Imagenología</b></p>
                                <?php
                                $Examen_Paciente = array_filter(explode(",", $Imagenologia_Examen));
                                foreach ($Examen_Paciente as $value) :
                                ?>
                                  <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . " - " . (empty($Imagenologia_Cups["{$value}_Imageno"]) ? '' : funcionMaster($Imagenologia_Cups["{$value}_Imageno"], 'id', 'Codigo', 'Cups')) . " " . (empty($Imagenologia_Cups["{$value}_Imageno"]) ? '' : utf8_encode(funcionMaster($Imagenologia_Cups["{$value}_Imageno"], 'id', 'Nombre', 'Cups'))) ?> <br>
                                <?php endforeach; ?>
                                <?php

                                echo 'Observaciones Imagenología<br>' . $Observaciones_Imagen . '<br>';

                                ?>
                              <?php endif; ?>

                              <?php if ($Laboratorio_Examenes) : ?>
                                <p><b>Laboratorio</b></p>
                                <?php
                                $Laboratorio_Paciente = array_filter(explode(",", $Laboratorio_Examenes));
                                foreach ($Laboratorio_Paciente as $value) :
                                ?>
                                  <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . " - " . (empty($Laboratorio_Cups["{$value}_Laboratorio"]) ? '' : funcionMaster($Laboratorio_Cups["{$value}_Laboratorio"], 'id', 'Codigo', 'Cups')) . " " . (empty($Laboratorio_Cups["{$value}_Laboratorio"]) ? '' : utf8_encode(funcionMaster($Laboratorio_Cups["{$value}_Laboratorio"], 'id', 'Nombre', 'Cups'))) ?> <br>
                                <?php endforeach; ?>
                                <?php

                                echo 'Observaciones Laboratorio<br>' . $Observaciones_Labora . '<br>';

                                ?>
                              <?php endif; ?>

                              <?php

                              echo 'Observaciones Laboratorio<br>' . $Observaciones_Labora . '<br>';

                              echo 'Observaciones Imagenología<br>' . $Observaciones_Imagen . '<br>';

                              ?>


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
              <!-- cierre seccion 5-->




            </div>
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

<script>
  function CargarGraficas(cliente_id, Tipo, DatosGrafica) {

    var TipoArreglo = {
      "1": "Peso x Edad",
      "2": "Altura x Edad",
      "3": "Perimetro Cefalico",
      "4": "IMC",
    };

    switch (DatosGrafica) {
      case 1:
        var Direccion = "graficasCrecimientoOMS";
        //definir un arreglo
        Botones = new Array();
        Botones["1"] = ["0-2", "2-5", "5-10", "General"];
        Botones["2"] = ["0-2", "2-5", "5-19", "General"];
        Botones["3"] = ["0-2", "2-5", "General"];
        Botones["4"] = ["0-2", "2-5", "5-19", "General"];
        break;
      case 2:
        var Direccion = "graficasCrecimientoCDC";

        Botones = new Array();
        Botones["1"] = ["0-3", "2-20", "General"];
        Botones["2"] = ["0-3", "2-20", "General"];
        Botones["3"] = ["0-3", "General"];
        Botones["4"] = ["2-20", "General"];
        break;
      case 3:
        var Direccion = "graficasCrecimientoSD";
        Botones = new Array();
        Botones["1"] = ["0-3", "2-20", "General"];
        Botones["2"] = ["0-3", "2-20", "General"];
        Botones["3"] = ["0-3", "General"];
        Botones["4"] = ["2-20", "General"];
        break;
    }

    //en el campo Botones_Grafica crear los botones que redireccionan a la grafica con href GraficasCrecimiento_OMS.php?clienteId=cliente_id&Tipo=TipoArreglo&Botones=Botones

    var Botones_Grafica = "";
    for (var i = 0; i < Botones[Tipo].length; i++) {
      //estilo de los botones con class='btn btn-success' y width='100%' y un hr separador 
      Botones_Grafica += "<button type='button' class='btn btn-outline-success rounded-pill' style='width:100%;' onclick='window.open(\"" + Direccion + "?cI=<?=salt()?>" + btoa(cliente_id)  + "&Tipo=" + TipoArreglo[Tipo] + "&Botones=" + Botones[Tipo][i] + "\",\"_blank\")'>" + TipoArreglo[Tipo] + " [" + Botones[Tipo][i] + "]</button><hr>";


    }
    $("#Botones_Grafica").html(Botones_Grafica);
  }
</script>


<div class="modal fade" id="modalGraficas" role="dialog">
  <div class="modal-dialog">
    <div class="modal-content">
      <!-- Modal Header -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">
          <span aria-hidden="true">×</span>
          <span class="sr-only">Cerrar</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Escala Grafica </h4>
      </div>

      <!-- Modal Body -->
      <div class="modal-body" id="Botones_Grafica">

      </div>
    </div>
  </div>
</div>