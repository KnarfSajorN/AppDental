<?php
include 'header.php';
include 'menu.php';

// $clienteId = $_GET['clienteId'];
$clienteId = decrypt($_GET['cI']);
$usuarioId = $_SESSION['ID'];



$queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $cliente_id      = $rowMotorizado['cliente_id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $receta     = $rowMotorizado['receta'];
  }
}
$whatsapp = funcionMaster($cliente_id, 'cliente_id', 'whatsapp', 'cliente');
$nombre_cliente = funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');

if (isset($_POST['Enviar_Firma'])) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where ID = $historiaClinica1");
  // $nrowl = mysqli_num_rows($queryList);
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    // $usuario_id      = $rowMotorizado['usuario_id'];
    // $receta     = $rowMotorizado['receta'];
  }
}
if (isset($_GET['tipo'])) {
  $tipo = $_GET['tipo'];
  $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le envia el siguiente documento registrado en la cita ' . $Base . 'HC_ImprimirGeneral?historiaClinica1=' . $historiaClinica1 . '&tipo=' . $tipo;
  $accion = 0;
  Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

  // echo "<script language='Javascript'> window.location='Finalizado_Historia_Clinica.php?&historiaClinica1=" . $historiaClinica1 . "';</script>";
  echo "<script language='Javascript'> window.location='Pacientes.php';</script>";
}

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
      <li><a href="#">Historial Clinico</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="HC_HistoriaGeneral?cI=<?= encrypt($clienteId); ?>" role="button" target="_blank"> <i class="fa fa-heartbeat"> </i> Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?= encrypt($clienteId); ?>" role="button" target="_blank"><i class="fa fa-folder-open-o"></i> Agregar Exámenes </a>
            <!-- <a class="btn btn-success" href="KPIpacientes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i> KPI del paciente</a> -->

            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <?php
            //include 'estadoFacturaCliente.php';
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
          <!-- <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historia</a></li>
            <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Exámenes</a></li>
            <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades</a></li>
            <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas</a></li>
            <li role="presentation"><a href="#Section5" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-calendar-days' style='font-size:26px'> </i> Citas</a></li>
            <li role="presentation"><a href="#Section6" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-credit-card' style='font-size:26px'> </i> Facturas</a></li>
            <li role="presentation"><a href="#Section7" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-credit-card' style='font-size:26px'> </i> Cuentas por cobrar</a></li>
            <li role="presentation"><a href="#Section8" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fa-solid fa-chart-pie' style='font-size:26px'> </i> Analítica</a></li>
          </ul> -->

          <?php
          $arrayHistorias = [
            ['Historias Clínicas', 'Section1','fas fa-book-medical'],
            ['Exámenes Clínicos', 'Section2','fas fa-vials'],
            ['Exámenes Clínicos a Realizar ', 'Section9','fas fa-vials'],
            ['Incapacidades Clínicas', 'Section3','fas fa-bed'],
            ['Recetas Clínicas', 'Section4','fas fa-prescription-bottle-alt'],
            ['Citas', 'Section5','fa-solid fa-calendar-days'],
            ['Facturas', 'Section6','fa-solid fa-credit-card'],
            ['Cuentas por Cobrar', 'Section7','fa-solid fa-credit-card'],
            ['Analítica', 'Section8','fa-solid fa-chart-pie']            
          ];
          ?>

          <div class="card-header">
              <ul class="nav nav-tabs" role="tablist">
                <?php foreach ($arrayHistorias as $key => $value) : ?>
                  <li role="presentation" class="nav-item "><a class="nav-link" href="#<?= $value[1] ?>" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> <?= $value[0] ?></a></li>
                <?php endforeach ?>
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

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  // $nrowl = mysqli_num_rows($queryList);
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
                            <button onclick="window.open('HC_FinalizadoGeneral?HC=<?php echo encrypt($id); ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Finalizado"><i class="fa-regular fa-rectangle-list" ></i></button>

                            <button onclick="window.open('Evolucion_Historia.php?historiaClinica=<?php echo $id ?>&cliente=<?php echo $cliente_id ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file" data-icon="gridicons:print"></i></button>

<button onclick="window.open('verEvolucion_Historia.php?historiaClinica=<?php echo $id ?>&cliente=<?php echo $cliente_id ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye" data-icon="gridicons:print"></i></button>

<button onclick="window.open('Finalizado_Historia_Clinica.php?historiaClinica1=<?php echo $id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>

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
                            <?php
                            //reemplazar tildes para evitar inconvenientes con el autoguardado
                            $reemplazos = array(
                              "Diagnostico" => "Diagnóstico",
                            );  
                            $AntecedentesFamiliares = str_replace(array_keys($reemplazos), array_values($reemplazos), $AntecedentesFamiliares);
                            ?>
                            <?= $AntecedentesFamiliares ?><br>
                          <?php endif; ?>

                          <?php if ($Checks_Revision) : ?>
                            <p><b>Revision por Sistemas</b></p>
                            <?= $Checks_Revision ?><br>
                          <?php endif; ?>

                          <?php if ($SignosVitales) : ?>
                            <p><b>Signos vitales y medidas antropométricas</b></p>
                            <?php
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
                            ?>
                            <?= $SignosVitales ?><br>
                          <?php endif; ?>

                          <?php if ($Paraclinicos) : ?>
                            <p><b>Paraclínicos</b></p>
                            <?php
                            $reemplazos = array(
                              "Clasificacion" => "Clasificación",
                              "Paraclinico" => "Paraclínico",
                            );  
                            $Paraclinicos = str_replace(array_keys($reemplazos), array_values($reemplazos), $Paraclinicos);
                            ?>
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
                            <?php
                              $reemplazos = array(
                                "Area" => "Área",
                              );  
                              $Incapacidades = str_replace(array_keys($reemplazos), array_values($reemplazos), $Incapacidades);
                            ?>
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

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  // $nrowl = mysqli_num_rows($queryList);
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
                    $tipo = "examenes";
                    $tipo_encriptado = encrypt($tipo);
                  ?>

                    <?php if ($Imagenologia_Examen || $Laboratorio_Examenes) : ?>

                      

                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Examenes<?php echo $id ?>" aria-expanded="false" aria-controls="Examenes<?php echo $id ?>">
                              Examenes <?php echo $id; ?>
                              <!--<button onclick="window.open('HC_ImprimirGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>-->
                              <button onclick="ImprimirVentanaAparte('HC_ImprimirGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado; ?>')" style="border: hidden;background-color: initial;font-size: 20px;" title="Imprimir Exámenes"><i class="iconify" data-icon="gridicons:print"></i></button>
                              <button onclick="window.open('<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" title="Enviar Exámenes"><i class="fa fa-paper-plane" data-icon="gridicons:print"></i></button>


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

            <!-- inicio seccion 2 -->
            <div role="tabpanel" class="tab-pane fade" id="Section9">


              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  examenesaRealizar where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  // $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {                    
                    $idExamen = $rowMotorizado['id'];
                    $usuario_id = $rowMotorizado['usuario_id'];
                    $cliente_id = $rowMotorizado['cliente_id'];
                    $historia_id = $rowMotorizado['historia_id'];
                    $laboratorio = $rowMotorizado['laboratorio'];
                    $ecografia = $rowMotorizado['ecografia'];
                    $otros = $rowMotorizado['otros'];
                    $fechaHora = $rowMotorizado['fechaHora'];
                    $recetas = $rowMotorizado['recetas'];
                    $tipo = "examenes";
                    $tipo_encriptado = encrypt($tipo);
                  ?>

                    

                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Examenesx<?php echo $id ?>" aria-expanded="false" aria-controls="Examenesx<?php echo $id ?>">
                              Exámenes <?php echo $id; ?>
                              
                              <!--<button onclick="window.open('HC_ImprimirGeneral?HC=<?php echo encrypt('E'.$id); ?>&tipo=<?php echo $tipo_encriptado; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>-->
                              <button onclick="ImprimirVentanaAparte('HC_ImprimirGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado; ?>')" style="border: hidden;background-color: initial;font-size: 20px;" title="Imprimir Exámenes a Realizar"target="_blank"><i class="iconify" data-icon="gridicons:print"></i></button>
                              <button onclick="window.open('<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($idExamen); ?>&tipo=<?php echo $tipo_encriptado; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"target="_blank"><i class="fa fa-paper-plane" data-icon="gridicons:print"></i></button>
                            </a>
                          </h4>
                        </div>
                        <div id="Examenesx<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                          <div class="panel-body">
                            <p><b>Exámenes</b></p>
                            <?php if ($ecografia) : ?>
                              <p><b>Imagenología</b></p>
                              <?php
                              $Examen_Paciente = explode(",", $ecografia);
                              foreach ($Examen_Paciente as $value) :
                              ?>
                                <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') ?><br>
                              <?php endforeach; ?>
                            <?php endif; ?>

                            <?php if ($laboratorio) : ?>
                              <p><b>Laboratorio</b></p>
                              <?php
                              $Laboratorio_Paciente = explode(",", $laboratorio);
                              foreach ($Laboratorio_Paciente as $value) :
                              ?>
                                <?= funcionMaster($value, 'id', 'Nombre', 'examenes_historia') ?><br>
                              <?php endforeach; ?>
                            <?php endif; ?>

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



            <!-- inicio seccion 3 -->
            <div role="tabpanel" class="tab-pane fade" id="Section3">


              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                  // $nrowl = mysqli_num_rows($queryList);
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
                    $tipo1 = "incapacidad";
                    $tipo_encriptado1 = encrypt($tipo1);
                  ?>

                    <?php if ($Incapacidades) : ?>
                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Incapacidad<?php echo $id ?>" aria-expanded="false" aria-controls="Incapacidad<?php echo $id ?>">
                              Incapacidad <?php echo $id; ?>
                              <!-- <button onclick="window.open('HC_ImprimirGeneral?historiaClinica1=<?php echo $id; ?>&tipo=incapacidad', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                              <button onclick="window.open('<?php echo $Base; ?>Finalizado_Historia_Clinica.php?historiaClinica1=<?php echo $id; ?>&tipo=incapacidad', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-paper-plane" data-icon="gridicons:print"></i></button> -->
                              
                              <!--<button onclick="window.open('HC_ImprimirGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado1; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>-->
                              <button onclick="ImprimirVentanaAparte('HC_ImprimirGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado1; ?>')" style="border: hidden;background-color: initial;font-size: 20px;" title="Imprimir Incapacidad"><i class="iconify" data-icon="gridicons:print"></i></button>
                              <button onclick="window.open('<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado1; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" title="Enviar Incapacidad"><i class="fa fa-paper-plane" data-icon="gridicons:print"></i></button>

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

                  $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND Receta_id<>'0'");
                  // $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $id = $rowMotorizado['id'];
                    $cliente_id = $rowMotorizado['cliente_id'];
                    $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
                    $receta_id = $rowMotorizado['receta_id'];
                    $tipo3 = "Historia_Clinica";
                    $tipo_encriptado3 = encrypt($tipo3);

                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id; ?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id; ?>

                          

                            <!-- <button onclick="window.location.href='RM_ImprimirReceta.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button> -->
                            <!-- <button onclick="window.open('RM_ImprimirReceta.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button> -->
                            <button onclick="ImprimirVentanaAparte('RM_ImprimirReceta.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>')" style="border: hidden;background-color: initial;font-size: 20px;" title="Imprimir Receta"target="_blank" ><i class="iconify" data-icon="gridicons:print"></i></button>
                            <!-- <button onclick="window.open('RecetaEnviar.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="bi:send"></i></button> -->
                            <button onclick="window.open('<?php echo $Base; ?>HC_FinalizadoGeneral?HC=<?php echo encrypt($id); ?>&tipo=<?php echo $tipo_encriptado3; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" title="Enviar Receta"><i class="fa fa-paper-plane" data-icon="gridicons:print"></i></button>

                          </a>
                        </h4>
                      </div>
                      <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);" >
                        <div class="panel-body">
                          <?php
                          $recetas = 0;
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

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'>Nombre: {$Nombre_Medicamento} </div>";
                            echo "<div class='col-12'>Presentacion: {$Presentacion} </div>";
                            echo "<div class='col-12'>Via de Administracion: {$Via_Administracion} </div>";
                            echo "<div class='col-12'>Composicion: {$Composicion} </div>";
                            echo "<div class='col-12'>Cantidad: {$Cantidad} </div>";
                            echo "<div class='col-12'>Dosis: {$Dosis}</div>";
                            echo "<div class='col-12'><br></div>";
                            echo "</div>";

                            echo "<div class='col-6'>";
                            echo "<div class='col-12'>Indicaciones:<br> {$Indicaciones} </div>";
                            echo "<div class='col-12'>Indicaciones Generales:<br> {$Indicaciones_Generales}</div>";
                            echo "<div class='col-12'><br><hr style='border-top: 1px solid #000;'><br></div>";
                            echo "</div>";
                            $recetas++;
                          }
                          echo $receta;
                          if ($recetas == 0) {
                            echo '<h1> No posee recetas registradas!! </h1>';
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





























            <!-- ************************************************************************************************************************-->
            <!-- ************************************************************************************************************************-->
            <!-- *************************************************  UPDATE 01062023 LORDON********************************************************-->
            <!-- ************************************************************************************************************************-->
            <!-- ************************************************************************************************************************-->

























            <!-- inicio seccion 5 -->
            <div role="tabpanel" class="tab-pane fade" id="Section5">

              <div class="col-md-12">
                <div class="panel-group">
                  <!-- <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true"> -->
                  <!--CITAS DFFSDSDFSDF--->
                  <?php
                   $clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);
                  $queryListcalendario = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $IDconfig");

                  // $nrowl = mysqli_num_rows($queryListcalendario);

                  if ($queryListcalendario) {
                    while ($rowcalendario = mysqli_fetch_array($queryListcalendario)) {

                      $tiempoConsulta = $rowcalendario['tiempoConsulta'];
                      $cantidadPacientes = $rowcalendario['cantidadPacientes'];

                      $lt = $rowcalendario['lt'];
                      $mt = $rowcalendario['mt'];
                      $et = $rowcalendario['et'];
                      $jt = $rowcalendario['jt'];
                      $vt = $rowcalendario['vt'];
                      $st = $rowcalendario['st'];
                      $dt = $rowcalendario['dt'];

                      $ld = $rowcalendario['ld'];
                      $md = $rowcalendario['md'];
                      $ed = $rowcalendario['ed'];
                      $jd = $rowcalendario['jd'];
                      $vd = $rowcalendario['vd'];
                      $sd = $rowcalendario['sd'];
                      $dd = $rowcalendario['dd'];

                      $lh = $rowcalendario['lh'];
                      $mh = $rowcalendario['mh'];
                      $eh = $rowcalendario['eh'];
                      $jh = $rowcalendario['jh'];
                      $vh = $rowcalendario['vh'];
                      $sh = $rowcalendario['sh'];
                      $dh = $rowcalendario['dh'];

                      $CitasGoogleCalendar = $rowcalendario['CitasGoogleCalendar'];
                      $Sucursales = $rowcalendario['Sucursales'];
                    }
                  }
                  

                  if ($clienteId > 0) {

                    include 'funciones/conn3.php';

                    $queryList = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id=$clienteId");

                    // $nrowl = mysqli_num_rows($queryList);

                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $usuario_id = $rowMotorizado['usuario_id'];
                      $nombre_cliente = $rowMotorizado['nombre_cliente'];
                      $indicativo = $rowMotorizado['indicativo'];
                      $whatsapp = $rowMotorizado['whatsapp'];
                      $whatsapp = substr($whatsapp, strlen($indicativo));
                      $whatsapp = str_replace("/*0*/", "", $whatsapp);
                      $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
                      $correo_cliente = $rowMotorizado['correo_cliente'];
                      $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
                      $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
                      $tipo_cliente = $rowMotorizado['tipo_cliente'];
                      $fechar = $rowMotorizado['fechar'];
                      $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
                      $activo = $rowMotorizado['activo'];
                      $genero = $rowMotorizado['genero'];
                      $direccion_cliente = $rowMotorizado['direccion_cliente'];
                      $telefono_cliente = $rowMotorizado['telefono_cliente'];
                      $edad_cliente = $rowMotorizado['edad_cliente'];
                      $profesion_cliente = $rowMotorizado['profesion_cliente'];
                      $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
                      $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
                      $antecedentes = $rowMotorizado['antecedentes'];
                    }
                    // $_SESSION['NOMBRE_USUARIO']
                  }

                  if (isset($_GET['editar_cita'])) {
                    $editar_cita = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_cita'])));
                    $queryList = mysqli_query($conn3, "SELECT * FROM citas where idCitas = '$editar_cita'");
                    // $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $idCitas = $rowMotorizado['idCitas'];
                      $nombre_cliente = $rowMotorizado['nombre'];
                      $celular_cliente = $rowMotorizado['celular_cliente'];
                      $whatsapp = $rowMotorizado['telefono'];
                      $correo_cliente = $rowMotorizado['correo'];
                      $motivoConsulta = $rowMotorizado['motivoConsulta'];
                      $Hora = $rowMotorizado['Hora'];
                      $fecha = $rowMotorizado['fecha'];
                      $frecuencia = $rowMotorizado['frecuencia'];
                      $cantidad = $rowMotorizado['cantidad'];
                    }
                  }



                  if ($fecha == '') {
                    $fecha = date("Y-m-d");
                  }


                  if ($idCitas = '') {
                    $idCitas = 0;
                  }



                  $msg = $_GET['msg'];

                  #Cierre
                  if ($_GET["msg"] != "") {
                    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
                  }
                  if ($_GET["error"] != "") {
                    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
                  }

                  ?>

                  <!-- Content Wrapper. Contains page content -->
                  <div class="panel panel-default" style="background: #f1f1f1;">
                    <form action="guardarCita.php" method="POST" name="formularioActualizarcliente">
                      <div class="box box-body">
                        <div class="col-md-12"><?php echo $respuesta; ?></div>

                        <div class="form-group col-md-6">
                          <div align="left">
                            <strong>Usuario</strong>
                          </div>
                          <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required" onChange="cargarFecha();">
                            <option value="" selected>Seleccione</option>
                            <?php
                            usuariosEspecialistasSelect();
                            ?>
                          </select>
                        </div>

                        <style type="text/css">
                          #div-fecha {
                            display: none;
                          }

                          #div-Hora {
                            display: none;
                          }
                        </style>

                        <div id="div-fecha" class="form-group col-md-6">
                          <!-- Fecha para verificar disponiblidad   -->
                          <div align="left">
                            <strong>Fecha</strong>
                          </div>
                          <input type="date" class="form-control input-lg" name="fecha" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();" required>

                          <div id="div-results"></div>
                        </div>


                        <div class="form-group col-md-12">
                          <div align="left">
                            <strong>Nombre Paciente</strong>
                          </div>
                          <input type="text" class="form-control input-lg" name="nombre" placeholder="Nombre" value="<?php echo $nombre_cliente ?>" required>
                        </div>

                        <?php if (!isset($_GET['editar_cita'])) : ?>
                          <div class="form-group col-md-6" style="margin-bottom: auto;">
                            <div align="left">
                              <strong>Indicativo</strong>
                            </div>
                            <select id="indicativo" name="indicativo" class="form-control select2" style="width: 100%;" required>
                              <?php
                              //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                              echo selectMaster("", "numero", "numero,nombre", "indicativos");
                              ?>
                            </select>
                          </div>
                        <?php endif; ?>
                        <div class="form-group col-md-6">
                          <div align="left">
                            <strong>Celular</strong>
                          </div>
                          <input type="number" class="form-control input-lg" name="telefono" placeholder="3206547898" value="<?php echo $whatsapp ?>" required>
                          <font color="red" size="2">Para enviar la notificación de whatsapp debe de colocar el código país antes del numero +57</font>
                        </div>
                        <div class="form-group col-md-12">
                          <div align="left">
                            <strong>Correo</strong>
                          </div>
                          <input type="email" class="form-control input-lg" name="correo" placeholder="Correo" value="<?php echo $correo_cliente ?>">
                          <font color="red" size="2">Para enviar la notificación al correo colocar el correo de los contrario no colocarlo </font>
                        </div>
                        <div class="form-group col-md-12">
                          <div align="left"><strong>Servicio</strong></div>
                          <!-- <div align="left"><strong>Motivo de consulta</strong></div> -->
                          <!-- <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required> -->
                          <select name="motivoConsulta" class="form-control select2" style="width: 100%;" onchange="tiempoMotivoConsulta(this.value, 'duracion')" required>

                            <?php if ($motivoConsulta != '') { ?>
                              <option value='<?= $motivoConsulta ?>'> <?= $motivoConsulta ?> </option>
                            <?php } else { ?>
                              <option value="" selected="selected">Seleccione...</option>
                            <?php } ?>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta");
                            // $nrowl = mysqli_num_rows($queryList);
                            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                              // $cod = $row_recordset32A['cliente_id'];
                              $id = $row_recordset32A['id'];
                              $nombre = $row_recordset32A['descripcion'];

                              echo "<option value='$id'> $nombre </option>";
                            }
                            ?>

                          </select>
                        </div>

                        <div class="form-group col-md-12">
                          <div align="left">
                            <strong>Tiempo de Cita</strong>
                          </div>
                          <select id="duracion" name="duracion" class="form-control select2" data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
                            <option value="<?php echo $duracion ?>"> <?php echo categoria($duracion) ?> </option>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>30</option>
                            <option>45</option>
                            <option>60</option>
                            <option>80</option>
                            <option>120</option>
                          </select>
                        </div>


                        <div class="form-group col-md-12">
                          <div align="center">
                            <label>
                              <input type="radio" name="P" value="0" class="flat-red" checked>
                              <i class="fa fa-user"></i> Presencial

                              <input type="radio" name="P" value="2" class="flat-red" checked>
                              <i class="fa fa-user"></i> Domiciliaria

                              <?php if ($clienteId > 0) : ?>
                                <input type="radio" name="P" value="1" class="flat-red" checked>
                                <i class="fa fa-video-camera"></i> Virtual
                            </label>
                          <?php endif ?>
                          <?php if ($clienteId == '') : ?>
                            <br>
                            <i class="fa fa-video-camera"></i>
                            <a href="Pacientes.php">Para agendar citas virtuales debemos de seleccionar el paciente</a>
                          <?php endif ?>
                          </label>
                          </div>
                        </div>

                        <div align="center">
                          <div id="div-resultsHora"></div>
                        </div>

                        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                        <input type="hidden" name="idCitas" id="idCitas" value="<?php echo $_GET['editar_cita'] ?>">
                        <input type="hidden" name="clienteId" value="<?php echo $clienteId; ?>">
                        <input type="hidden" name="sucursal" id="sucursal" value='0'>
                        <input type="hidden" name="ID_H" id="ID_H" value='1'>

                      </div>

                    </form>
                    <div class="box box-body">
                    <div class="table-responsive">
                      <table id="example1" class="table table-bordered table-striped">
                        <thead>
                          <h3 align="Center"><b>Citas Agendadas</b></h3>
                          <tr>

                            <th class="text-center">Doctor</th>
                            <th class="text-center">Fecha-Hora</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Frecuencia</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Servicio</th>
                            <!-- <th class="text-center">Motivo consulta</th> -->
                            <th class="text-center"> Tipo </th>
                            <th class="text-center"> Estado Presencial </th>

                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $doctor = $_SESSION['username'];

                          $queryListA = mysqli_query($conn3, "SELECT * FROM  citas  where  idCliente = '$clienteId'  order by fecha DESC");

                          // $nrowl = mysqli_num_rows($queryListA);
                          while ($row_recordset32A = mysqli_fetch_array($queryListA)) {


                            $idCitas = $row_recordset32A['idCitas'];
                            $doctor = $row_recordset32A['doctor'];
                            $fecha = $row_recordset32A['fecha'];
                            $Hora = $row_recordset32A['Hora'];
                            $nombre = $row_recordset32A['nombre'];
                            $telefono = $row_recordset32A['telefono'];
                            $frecuencia = $row_recordset32A['frecuencia'];
                            $cantidad = $row_recordset32A['cantidad'];
                            $correo = $row_recordset32A['correo'];
                            $estadoPresencia = $row_recordset32A['estadoPresencia'];
                            $motivoConsultaId = $row_recordset32A['motivoConsulta'];
                            $motivoConsulta = (is_numeric($row_recordset32A['motivoConsulta']) ? funcionMaster($row_recordset32A['motivoConsulta'], 'id', 'descripcion', 'Motivos_Consulta') : $row_recordset32A['motivoConsulta']);
                            $tipo = $row_recordset32A['tipo'];
                            $link_googlecalendar = $row_recordset32A['link_googlecalendar'];


                            if ($tipo == 0) {
                              $tipoE = '<font color="blue"> <i class="fa fa-user" title="Presencial" name="Presencial"></i> </font>';
                            } elseif ($tipo == 1) {
                              $tipoE = '<font color="#04CC05"> <i class="fa fa-video-camera" title="Virtual" name="Virtual"></i></font>';
                            } elseif ($tipo == 2) {
                              $tipoE = '<font color="red"> <i class="fa fa-user" title="Domiciliaria" name="Domiciliaria"></i></font>';
                            }
                            echo '      
                                <tr>
                                <td width="20%"> 
                                <font color="#04CC05"> 
                                <a href="agregarCitas?editar_cita=' . $idCitas . '" target="_blank"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a> ';

                            if ($_SESSION['TIPO'] == 99) {
                              echo '
                                <a href="eliminarCitasH.php?idCitas=' . $idCitas . '" target="_blank"> <font color = "red"> <i class="fa fa-trash" title="ELIMINAR" name="ELIMINAR"></i></font>  </a>';
                            }

                            if ($CitasGoogleCalendar == "Si") {

                              if ($link_googlecalendar != "") {
                                echo '
                                <a href="' . $link_googlecalendar . '" target="_blank"> <font color = "green"> <i class="fa fa-calendar" title="Ver Evento en Google Calendar"></i></font>  </a>';

                                echo '
                                <a href="ApiGoogleCalendar.php?cita_id=' . $idCitas . '&ruta=1" target="_blank"> <font color = "green"> <i class="fa fa-refresh" title="Volver a Crear el Evento en Google Calendar"></i></font>  </a>';
                              } else {
                                echo '
                                <a href="ApiGoogleCalendar.php?cita_id=' . $idCitas . '&ruta=1" target="_blank"> <font color = "green"> <i class="fa fa-address-book" title="Agregar Cita en Google Calendar" ></i></font>  </a>';
                              }
                            }
                            echo '</font> ' . funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '</td>
                                <td width="10%" class="text-center"> ' . $fecha . '-' . $Hora . '</td>
                                <td width="10%" class="text-center"> ' . $nombre . '</td>
                                <td width="10%" class="text-center">' . $telefono . '</td>
                                <td width="10%" class="text-center">' . $correo . '</td>
                                <td width="10%" class="text-center">' . $frecuencia . '</td>
                                <td width="10%" class="text-center">' . $cantidad . '</td>
                                <td width="40%" class="text-center">
                                ' . $motivoConsulta . '</td><td width="1%" class="text-center">' . $tipoE . ' </td>';
                          ?>
                            <td style="width: 20%;" class="text-center">
                              <?php
                              $botonesPresencial = [
                                "0" => "No ha Ingresado",
                                "1" => "Ingresado",
                                "2" => "Retirado"
                              ];
                              ?>
                              <div class="dropdown dropup" style="position: relative">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown" title="<?= $botonesPresencial[$estadoPresencia] ?>" id="btn2<?= $idCitas ?>"> <?= $botonesPresencial[$estadoPresencia] ?> </button>
                                <ul class="dropdown-menu" style="top: auto; bottom: 100%; position: absolute;">
                                  <li><a style="cursor: pointer; padding: 10px;" onclick="presenciaDinamico(<?= $idCitas ?>, 0)"> No ha Ingresado</a></li>
                                  <li><a style="cursor: pointer; padding: 10px;" onclick="presenciaDinamico(<?= $idCitas ?>, 1)"> Ingresado</a></li>
                                  <li><a style="cursor: pointer; padding: 10px;" onclick="presenciaDinamico(<?= $idCitas ?>, 2)"> Retirado</a></li>
                                </ul>
                              </div>
                            </td>
                          <?php
                            echo '</tr>';
                            // <a href="masterEditor.php?filtro=' . $idCitas . '&tabla=citas&Columna=idCitas&origen=agregarCitas&campoEditado=' . $motivoConsultaId . '&columnaEditado=motivoConsulta&idUsuario=' . $ID . '"> <font color = "green"> <i class="fa fa-pencil" title="Editar Campo" name="Editar Campo"></i></font>  </a>
                          }

                          //mssql_close($dbhandle);
                          ?>
                          <a href=""></a>
                        </tbody>
                        <tfoot>
                          <tr>
                            <th class="text-center">Doctor</th>
                            <th class="text-center">Fecha-Hora</th>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Teléfono</th>
                            <th class="text-center">Correo</th>
                            <th class="text-center">Frecuencia</th>
                            <th class="text-center">Cantidad</th>
                            <th class="text-center">Servicio</th>
                            <!-- <th class="text-center">Motivo Consulta</th> -->
                            <th class="text-center"> Tipo </th>
                            <th class="text-center"> Estado Presencial </th>
                          </tr>
                        </tfoot>
                      </table>
                    </div>
                    </div>
                  </div>
                  <!-- /.box -->
                  <!--CITAS DFFSDSDFSDF--->
                </div>
              </div>
              <!--final accordion-->  
            </div>
            <!-- cierre seccion 5-->
            <!-- inicio seccion 3 -->
            <div role="tabpanel" class="tab-pane fade" id="Section6">


              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idCliente= '$clienteId' and tipo = 1");
                  // $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $idOperacion      = $rowMotorizado['idOperacion'];
                    $numeroDoc      = $rowMotorizado['numeroDoc'];
                    $idCliente      = $rowMotorizado['idCliente'];
                    $idEmpresa      = $rowMotorizado['idEmpresa'];
                    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
                    $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
                    //$subTotal      =$rowMotorizado['subTotal'];
                    $impuesto      = $rowMotorizado['impuesto'];
                    $totalNeto      = $rowMotorizado['totalNeto'];
                    $totalBruto      = $rowMotorizado['totalBruto'];
                    $cantidadProduc      = $rowMotorizado['cantidadProduc'];
                    $descuentos      = $rowMotorizado['descuentos'];
                    $montoPagado      = $rowMotorizado['montoPagado'];
                    $nota      = $rowMotorizado['nota'];
                    $moneda = funcionmaster($idEmpresa, 'ID_Usuario', 'moneda', 'config');


                  ?>


                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Factura<?php echo $idOperacion ?>" aria-expanded="false" aria-controls="Factura<?php echo $idOperacion ?>">
                            Factura <?php echo $idOperacion; ?>

                            
                            <!--<button onclick="window.open('imprimirFactura.php?idOperacion=<?php echo $idOperacion; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>-->

                            <button onclick="ImprimirVentanaAparte('imprimirFactura.php?idOperacion=<?php echo $idOperacion; ?>')" style="border: hidden;background-color: initial;font-size: 20px;" title="Imprimir Factura"><i class="iconify" data-icon="gridicons:print"></i></button>
                        
                            <button onclick="window.open('<?php echo $Base; ?>enviarFactura.php?idOperacion=<?php echo $idOperacion; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" title="Enviar Factura"><i class="fa fa-paper-plane" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Factura<?php echo $idOperacion ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                        <div class="panel-body">
                          <!--FACTURA-->
                          <div class="col-xs-12">
                            <div class="table-responsive">
                              <table class="table">
                                <thead>
                                  <tr>
                                    <td><strong>#</strong></td>
                                    <td><strong>Descripción</strong></td>
                                    <td>
                                      <div align="Right"><strong>Cantidad</strong></div>
                                    </td>
                                    <td>
                                      <div align="Right"><strong>Precio</strong></div>
                                    </td>
                                    <td>
                                      <div align="Right"><strong>Descuento</strong></div>
                                    </td>
                                    <td>
                                      <div align="Right"><strong>Subtotal</strong></div>
                                    </td>
                                  </tr>

                                </thead>
                                <tbody>
                                  <?php
                                  $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
                                  while ($fila = mysqli_fetch_array($resultado)) {
                                    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                    $Numero++;
                                    $Descuento = $fila['Descuento_Numerico'];

                                    echo '     <tr>
                                  <td  width="5%">' . $Numero . ' </td>
                                  <td width="30%">' . $fila[5] . ' </td>
                                  
                                  <td width="5%"><div align="Right">' . $fila[4] . '</div></td>
                                  <td width="13%"><div align="Right">' . $fila[6] . '' . $moneda . '</div></td>
                                  <td width="13%"><div align="Right">' . $Descuento . '' . $moneda . '</div></td>
                                  <td width="13%"><div align="Right">' . $fila[9] . '' . $moneda . '</div></td>
                                
                                </tr>';

                                    $totalCant += $fila[4];
                                    $totalBase +=  $fila[6];
                                    $total += $fila[9];
                                  }


                                  ?>


                                </tbody>
                              </table>
                            </div>
                          </div>
                          <!-- /.col -->
                          <!-- /.row -->


                          <!-- accepted payments column -->

                          <div class="col-xs-4">
                            <p class="lead"><strong>Comentarios:</strong></p>


                            <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
                              <?php echo $nota; ?>
                            </p>
                          </div>

                          <div class="col-xs-4">
                            <table class="table">
                              <thead>
                                <tr>
                                  <td><strong>#</strong></td>
                                  <td>
                                    <div><strong>Metodo de Pago</strong></div>
                                  </td>
                                  <td>
                                    <div align="Right"><strong>Monto</strong></div>
                                  </td>
                                  <td> </td>
                                </tr>
                              </thead>
                              <tbody>

                                <?php
                                $ID = $_SESSION['ID'];
                                $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = $idOperacion");
                                // $check = mysqli_num_rows($resultado);
                                $totalMet = 0;

                                while ($fila = mysqli_fetch_array($resultado)) {
                                  $contador++;
                                  $ruta = htmlentities($_SERVER['PHP_SELF']);

                                  echo '<tr>
                                  <td>' . $contador . '</td>
                                  <td>' . $fila[5] . '</td>
                                  <td><div align="Right">' . $fila[6] . '' . $moneda . '</div></td>
                                  </tr>';

                                  $totalMet += intval($fila[6]); //$fila[6];
                                  $saldo = $totalNeto - $totalMet;
                                }

                                if ($saldo < 0) {
                                  $saldo = 0;
                                }
                                ?>


                              </tbody>
                            </table>

                          </div>

                          <!-- /.col -->
                          <div class="col-xs-4">
                            <div class="table-responsive">
                              <table class="table">
                                <tr>
                                  <th style="width:50%">Subtotal:</th>
                                  <td> <?php echo $totalBruto . '' . $moneda ?> </td>
                                </tr>

                                <?php
                                if ($impuestoF > 0) {
                                  $impuestoF2 = $impuestoF / 100;
                                  $total1 =  $total * $impuestoF2;
                                  $total =  $total1 + $total;


                                ?>

                                  <tr>
                                    <th style="width:50%">Impuesto:</th>
                                    <td> <?php echo $total1 . '' . $moneda ?> </td>
                                  </tr>

                                <?php
                                } ?>

                                <tr>
                                  <th style="color:green">Descuento:</th>
                                  <td><?php echo $descuentos . '' . $moneda ?></td>
                                </tr>
                                <tr>
                                  <th>Total a Pagar:</th>
                                  <td><?php echo $totalNeto . '' . $moneda ?></td>
                                </tr>

                                <tr>
                                  <th>Pagado:</th>
                                  <td><?php echo $totalMet . '' . $moneda ?></td>
                                </tr>
                                <?php if ($totalMet == 0) { ?>
                                  <tr>
                                    <th style="color:red">Saldo:</th>
                                    <td><?php echo $totalNeto . '' . $moneda ?></td>
                                  </tr>
                                <?php } else { ?>
                                  <tr>
                                    <th style="color:red">Saldo:</th>
                                    <td><?php echo $saldo . '' . $moneda ?></td>
                                  </tr>
                                <?php } ?>
                                <tr>
                                  <th>Total Factura:</th>
                                  <td><?php echo $totalNeto . '' . $moneda ?></td>
                                </tr>
                              </table>
                            </div>
                          </div>
                          <!--FACTURA-->
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
            <!-- cierre seccion 6-->
            <!-- inicio seccion 3 -->
            <div role="tabpanel" class="tab-pane fade" id="Section7">
              <?php

              $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idCliente= '$clienteId' and tipo = 1");
              // $nrowl = mysqli_num_rows($queryList);
              while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $idOperacion      = $rowMotorizado['idOperacion'];
                $numeroDoc      = $rowMotorizado['numeroDoc'];
                $idCliente      = $rowMotorizado['idCliente'];
                $idEmpresa      = $rowMotorizado['idEmpresa'];
                $fechaOperacion      = $rowMotorizado['fechaOperacion'];
                $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
                //$subTotal      =$rowMotorizado['subTotal'];
                $impuesto      = $rowMotorizado['impuesto'];
                $totalNeto      = $rowMotorizado['totalNeto'];
                $totalBruto      = $rowMotorizado['totalBruto'];
                $cantidadProduc      = $rowMotorizado['cantidadProduc'];
                $descuentos      = $rowMotorizado['descuentos'];
                $montoPagado      = $rowMotorizado['montoPagado'];
                $nota      = $rowMotorizado['nota'];
                $saldo = $fila['totalNeto'] - $fila['montoPagado'];

              ?>
                <!--FACTURA-->
                <font calss="text-dark"> <strong>Cuenta Pagado</strong> <i class="fa fa-circle" style="color:#80e68070"></i> </font>||
                <font calss="text-dark"> Cuenta Pendiente <i class="fa fa-circle" style="color:#FC0707"></i> </font>||
                <table class="table">
                  <thead>
                    <tr>
                      <td><strong>Numero</strong></td>
                      <td><strong>Fecha Factura</strong></td>
                      <td>
                        <div align="right"><strong>Total</strong></div>
                      </td>
                      <td>
                        <div align="right"><strong>Monto Pagado</strong></div>
                      </td>
                      <td>
                        <div align="right"><strong>Monto Faltante</strong></div>
                      </td>
                      <td>
                        <div align="right"><strong>Cant.</strong></div>
                      </td>
                      <td colspan="12" style="text-align: center;"><strong>Opciones</strong></td>

                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $ID = $_SESSION['ID'];
                    if ($_GET['cI']) {
                      //se cambia $_GET['clienteId'] por $_GET['cl']
                      $idCliente =  decrypt($_GET['cI']);
                      $resultado = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where tipo = 1 and idCliente = '$idCliente' order by numeroDoc");
                    } else {
                      $resultado = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  tipo = 1 order by numeroDoc");
                    }
                    // $check = mysqli_num_rows($q);
                    if ($resultado) {
                    while ($fila = mysqli_fetch_array($resultado)) {
                      $firma  = $fila['Firma'];
                      $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $fila[2]");
                      // $nrowl = mysqli_num_rows($queryList);
                      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $nombre_cliente             = $rowMotorizado['nombre_cliente'];
                        $CODI_CLIENTE             = $rowMotorizado['CODI_CLIENTE'];

                        $telefono_cliente           = $rowMotorizado['telefono_cliente'];
                      }
                      $saldo = $fila['totalNeto'] - $fila['montoPagado'];
                      $hoy = date("Y-m-d");
                      $vence =  $fila['fechaVencimiento'];
                      $Color = "";
                      if ($saldo == "0") {
                        $Color = 'style="background: linear-gradient(70deg, #00ff2e 4% , transparent 40%);"';
                      } else {
                        $Color = 'style="background: linear-gradient(70deg, #FC0707 4% , transparent 40%);"';
                      }
                      echo '     <tr>
                                        <td ' . $Color . '>' . $fila['numeroDoc'] . ' </td>
                                        <td>' . $fila['fechaOperacion'] . '</td>
                                        <td><div align="right">' . number_format($fila['totalNeto'], 0, ',', '.') . '</div></td>
                                        <td><div align="right">' . $fila['montoPagado'] . '</div></td>
                                        <td><div align="right">' . $saldo . '</div></td>
                                        <td><div align="right">' . $fila['cantidadProduc'] . '</div></td> 
                                        ' ?>
                      <td width='10%'>
                        <!-- <div class='btn-group'>
                          <button type='button' class='btn btn-primary dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='fa fa-bill'></i> Acciones Factura
                          </button>
                          <div class='dropdown-menu'>
                            <a class='dropdown-item' href='preliminarFactura.php?idOperacion=<?php echo  $fila['idOperacion']; ?>' target='_blank'>
                              <button type='button' class='btn btn-primary btn-block'>
                                Preliminar Factura
                              </button>
                            </a>
                            <a class='dropdown-item' href='imprimirFactura.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                              <button type='button' class='btn btn-primary btn-block'>
                                Imprimir Factura
                              </button>
                            </a>
                            <a class='dropdown-item' href='enviarFactura.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                              <button type='button' class='btn btn-primary btn-block'>
                                Enviar Factura
                              </button>
                            </a>
                          </div>
                        </div> -->
                        <div class="btn-group">
                          <button class="btn btn-secondary dropdown-toggle same-size-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-credit-card text-primary" aria-hidden="true"></i>
                            Acciones Factura
                          </button>
                          <div class="dropdown-menu">
                            <a class="dropdown-item" href="preliminarFactura.php?idOperacion=<?php echo $fila['idOperacion']; ?>" target="_blank">
                              <button type="button" class="btn btn-secondary btn-block same-size-button">
                                Preliminar Factura
                              </button>
                            </a>
                            <a class="dropdown-item" href="imprimirFactura.php?idOperacion=<?php echo $fila['idOperacion']; ?>" target="_blank">
                              <button type="button" class="btn btn-secondary btn-block same-size-button">
                                Imprimir Factura
                              </button>
                            </a>
                            <a class="dropdown-item" href="enviarFactura.php?idOperacion=<?php echo $fila['idOperacion']; ?>" target="_blank">
                              <button type="button" class="btn btn-secondary btn-block same-size-button">
                                Enviar Factura
                              </button>
                            </a>
                          </div>
                        </div>
                      </td>
                      <td width='10%'>
                        <!-- <style>
                          .same-size-button {
                            width: 150px;
                            position: absolute;
                          }
                        </style> -->
                        <div class='btn-group'>
                          <?php if ($saldo == 0) { ?>
                            <div class="btn-group">
                              <button class="btn btn-secondary dropdown-toggle same-size-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-credit-card text-success" aria-hidden="true"></i>
                                Factura Pagada
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="HistorialAbonoC.php?idOperacion=<?php echo $fila['idOperacion']; ?>" target="_blank">
                                  <button type="button" class="btn btn-secondary btn-block same-size-button">
                                    Historial
                                  </button>
                                </a>
                              </div>
                            </div>

                          <?php } else { ?>
                            <div class="btn-group">
                              <button class="btn btn-secondary dropdown-toggle same-size-button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-credit-card text-danger" aria-hidden="true"></i>
                                Acciones Pagos
                              </button>
                              <div class="dropdown-menu">
                                <a class="dropdown-item" href="AbonoCuentasC.php?idOperacion=<?php echo $fila['idOperacion']; ?>" target="_blank">
                                  <button type="button" class="btn btn-secondary btn-block same-size-button">
                                    Realizar Pago
                                  </button>
                                </a>
                                <a class="dropdown-item" href="HistorialAbonoC.php?idOperacion=<?php echo $fila['idOperacion']; ?>" target="_blank">
                                  <button type="button" class="btn btn-secondary btn-block same-size-button">
                                    Historial
                                  </button>
                                </a>
                              </div>
                            </div>

                            <!-- 
                            <button type='button' class='btn btn-warning dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              <i class='fa fa-bill'></i> Acciones Pagos
                            </button>

                            <div class='dropdown-menu'>
                              <a class='dropdown-item' href='AbonoCuentasC.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                <button type='button' class='btn btn-warning btn-block'>
                                  Realizar Pago
                                </button>
                              </a>
                              <a class='dropdown-item' href='HistorialAbonoC.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                <button type='button' class='btn btn-warning btn-block'>
                                  Historial
                                </button>
                              </a>
                            </div> -->
                          <?php } ?>
                        </div>
                      </td>
                    <?php
                      echo '
                                     </tr>';
                    }
                    ?>
                  </tbody>
                </table>

                <!--FACTURA-->
              <?php
              }
            }
              ?>

              <!--final accordion-->  

            </div>
            <!-- cierre seccion 8-->
            <!-- cierre seccion 8-->
            <!-- inicio seccion 3 -->
            <div role="tabpanel" class="tab-pane fade" id="Section8">
              <div class="col-md-12">
                <?php
                $queryList = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");
                // $nrowl = mysqli_num_rows($queryList);
                $contadorHistorias = array(); // Array asociativo para almacenar los contadores

                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                  $id = $rowMotorizado['id'];
                  $cliente_id = $rowMotorizado['cliente_id'];

                  // Verificar si el ID de cliente ya existe en el contador de historias
                  if (isset($contadorHistorias[$cliente_id])) {
                    // Si existe, incrementar el contador en 1
                    $contadorHistorias[$cliente_id]++;
                  } else {
                    // Si no existe, inicializar el contador en 1
                    $contadorHistorias[$cliente_id] = 1;
                  }
                }

                // Obtener el contador para el cliente específico ($clienteId)
                if (isset($contadorHistorias[$clienteId])) {
                  $contador = $contadorHistorias[$clienteId];
                } else {
                  $contador = 0;
                }

                // Imprimir el resultado
                // echo "El cliente con ID $clienteId tiene $contador historias.";
                ?>
                <center>
                  <h3>Análisis de las ultimas consultas Realizadas (<?php echo $contador ?>) </h3>
                </center>
              </div>
              <!--inicio accordion-->
              <div class="row">
                <div class="col-md-4" style="text-align: center">
                  <strong>Diagnóstico CIE-11</strong>
                  <!DOCTYPE html>
                  <html>

                  <head>
                    <title>Gráfica Dona</title>
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <style>
                      canvas {
                        max-width: 200px;
                        max-height: 200px;
                      }
                    </style>
                  </head>

                  <body>
                    <div style="display: flex; justify-content: center;">
                      <canvas id="donaChart"></canvas>
                    </div>
                    <script>
                      <?php
                      session_start();
                      $ID = $_SESSION['ID'];
                      // $clienteId = $_GET['clienteId'];
                      $clienteId = decrypt($_GET['cI']);
                      $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");
                      // echo "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId";
                      // Array para almacenar todos los diagnósticos y sus frecuencias
                      $diagnosticos = [];

                      if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                          // Obtener el diagnóstico de la columna fila[27]
                          $diagnostico = $fila[27];
                          $diagnostico_1 = funcionMaster($fila[27], 'cie10', 'descripcion', 'cie10');
                          // Verificar que el diagnóstico no esté vacío
                          if (!empty($diagnostico)) {
                            // Verificar si el diagnóstico ya existe en el array
                            if (isset($diagnosticos[$diagnostico])) {
                              // Si existe, incrementar la frecuencia
                              $diagnosticos[$diagnostico]++;
                            } else {
                              // Si no existe, agregar el diagnóstico al array con frecuencia 1
                              $diagnosticos[$diagnostico] = 1;
                            }
                          }
                        }
                      }
                      

                      // Prepara los datos para la gráfica
                      $labels = array_keys($diagnosticos);
                      $values = array_values($diagnosticos);
                      ?>


                      // Crea la gráfica utilizando Chart.js
                      var ctx = document.getElementById('donaChart').getContext('2d');
                      var donaChart = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: <?php echo json_encode($labels); ?>,
                          datasets: [{
                            data: <?php echo json_encode($values); ?>,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.8)',
                              'rgba(54, 162, 235, 0.8)',
                              'rgba(255, 206, 86, 0.8)',
                              'rgba(75, 192, 192, 0.8)',
                              'rgba(153, 102, 255, 0.8)',
                            ]
                          }]
                        },
                        // options: {
                        //   responsive: false,
                        //   maintainAspectRatio: true,
                        //   tooltips: {
                        //     callbacks: {
                        //       label: function(tooltipItem, data) {
                        //         var dataset = data.datasets[tooltipItem.datasetIndex];
                        //         var total = dataset.data.reduce(function(previousValue, currentValue, currentIndex, array) {
                        //           return previousValue + currentValue;
                        //         });
                        //         var currentValue = dataset.data[tooltipItem.index];
                        //         var percentage = Math.floor(((currentValue / total) * 100) + 0.5);
                        //         return data.labels[tooltipItem.index] + ': ' + currentValue + ' (' + percentage + '%)';
                        //       }
                        //     }
                        //   }
                        // }
                      });
                    </script>
                  </body>

                  </html>

                </div>
                <!---->
                <!--segunda dona-->
                <!--inicio accordion-->
                <div class="col-md-4" style="text-align: center">
                  <strong>Incapacidades</strong>
                  <!DOCTYPE html>
                  <html>

                  <body>
                    <div style="display: flex; justify-content: center;">
                      <canvas id="donaChart1"></canvas>
                    </div>
                    <script>
                      <?php
                      session_start();
                      $ID = $_SESSION['ID'];
                      // $clienteId = $_GET['clienteId'];
                      $clienteId = decrypt($_GET['cI']);
                      $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");

                      // Contador de incapacidades y resumen de ellas
                      $contadorIncapacidades = 0;

                      if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                          // Obtener el valor de la fila 21 (asumiendo que es el campo de incapacidades)
                          $incapacidad = $fila[21];

                          // Verificar si la incapacidad no está vacía
                          if (!empty($incapacidad)) {
                            $contadorIncapacidades++;
                          }
                        }
                      }
                      

                      // Preparar los datos para la gráfica de incapacidades
                      $labelsIncapacidades = ['Incapacidades', 'No Realizadas'];
                      $valuesIncapacidades = [$contadorIncapacidades, $resultado->num_rows - $contadorIncapacidades];
                      ?>

                      // Crea la gráfica utilizando Chart.js
                      var ctx = document.getElementById('donaChart1').getContext('2d');
                      var donaChart1 = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: <?php echo json_encode($labelsIncapacidades); ?>,
                          datasets: [{
                            data: <?php echo json_encode($valuesIncapacidades); ?>,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.8)',
                              'rgba(54, 162, 235, 0.8)',
                              'rgba(255, 206, 86, 0.8)',
                              'rgba(75, 192, 192, 0.8)',
                              'rgba(153, 102, 255, 0.8)',
                            ]
                          }]
                        },

                      });
                    </script>
                  </body>

                  </html>
                </div>
                <!--DONA3-->
                <!--segunda dona-->
                <!--inicio accordion-->
                <div class="col-md-4" style="text-align: center">
                  <strong>Recetas</strong>
                  <!DOCTYPE html>
                  <html>

                  <body>
                    <div style="display: flex; justify-content: center;">
                      <canvas id="donaChart2"></canvas>
                    </div>

                    <script>
                      <?php
                      session_start();
                      $ID = $_SESSION['ID'];
                      // $clienteId = $_GET['clienteId'];
                      $clienteId = decrypt($_GET['cI']);
                      $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");
                      $totalRecetas = funcionMaster($fila['receta_id'], 'receta_id', 'COUNT(*)', 'RM_Recetario');

                      // Contador de recetas y resumen de ellas
                      $contadorRecetas = 0;

                      if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                          // Obtener el valor de la fila correspondiente al campo de recetas (ajusta el número si es necesario)
                          $recetas = $fila['receta_id'];

                          // Verificar si la receta no está vacía
                          if (!empty($recetas)) {
                            $contadorRecetas++;
                          }
                        }
                      }
                      

                      // Preparar los datos para la gráfica de recetas
                      $labelsRecetas = ['Recetas', 'Sin Recetas'];
                      $valuesRecetas = [$contadorRecetas, $resultado->num_rows - $contadorRecetas];
                      ?>


                      // Crea la gráfica utilizando Chart.js
                      var ctx = document.getElementById('donaChart2').getContext('2d');
                      var donaChart1 = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: <?php echo json_encode($labelsRecetas); ?>,
                          datasets: [{
                            data: <?php echo json_encode($valuesRecetas); ?>,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.8)',
                              'rgba(54, 162, 235, 0.8)',
                              'rgba(255, 206, 86, 0.8)',
                              'rgba(75, 192, 192, 0.8)',
                              'rgba(153, 102, 255, 0.8)',
                            ]
                          }]
                        },

                      });
                    </script>
                  </body>

                  </html>
                </div>
                <!--DONA3-->
                <!--DONA4-->
                <!--inicio accordion-->
                <div class="col-md-4" style="text-align: center">
                  <strong>Imagenología</strong>
                  <!DOCTYPE html>
                  <html>



                  <body>
                    <div style="display: flex; justify-content: center;">
                      <canvas id="donaChart3"></canvas>
                    </div>

                    <script>
                      <?php
                      session_start();
                      $ID = $_SESSION['ID'];
                      // $clienteId = $_GET['clienteId'];
                      $clienteId = decrypt($_GET['cI']);
                      $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");

                      // Contador de incapacidades y resumen de ellas
                      $contadorLabImg = 0;

                      if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                          // Obtener el valor de la fila 12 (asumiendo que es el campo de incapacidades)
                          $LabImg = $fila[12];

                          // Verificar si la LabImg no está vacía
                          if (!empty($LabImg)) {
                            $contadorLabImg++;
                          }
                        }
                      }
                      

                      // Preparar los datos para la gráfica de Imagenologia
                      $labelsLabImg = ['Ordenes Pedidas (Imagenologia)', 'Ordenes no pedidas'];
                      $valuesLabImg = [$contadorLabImg, $resultado->num_rows - $contadorLabImg];
                      ?>

                      // Crea la gráfica utilizando Chart.js
                      var ctx = document.getElementById('donaChart3').getContext('2d');
                      var donaChart1 = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: <?php echo json_encode($labelsLabImg); ?>,
                          datasets: [{
                            data: <?php echo json_encode($valuesLabImg); ?>,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.8)',
                              'rgba(54, 162, 235, 0.8)',
                              'rgba(255, 206, 86, 0.8)',
                              'rgba(75, 192, 192, 0.8)',
                              'rgba(153, 102, 255, 0.8)',
                            ]
                          }]
                        },

                      });
                    </script>
                  </body>

                  </html>
                </div>
                <!--DONA4-->
                <!--DONA4-->
                <!--inicio accordion-->
                <div class="col-md-4" style="text-align: center">
                  <strong>Laboratorio</strong>
                  <!DOCTYPE html>
                  <html>

                  <body>
                    <div style="display: flex; justify-content: center;">
                      <canvas id="donaChart4"></canvas>
                    </div>
                    <script>
                      <?php
                      session_start();
                      $ID = $_SESSION['ID'];
                      // $clienteId = $_GET['clienteId'];
                      $clienteId = decrypt($_GET['cI']);
                      $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica WHERE cliente_id = $clienteId");

                      // Contador de incapacidades y resumen de ellas
                      $contadorLab = 0;

                      if ($resultado) {
                        while ($fila = mysqli_fetch_array($resultado)) {
                          // Obtener el valor de la fila 13 (asumiendo que es el campo de incapacidades)
                          $Lab = $fila[13];

                          // Verificar si la Lab no está vacía
                          if (!empty($Lab)) {
                            $contadorLab++;
                          }
                        }
                      }
                      

                      // Preparar los datos para la gráfica de Imagenologia
                      $labelsLab = ['Ordenes Pedidas (Laboratorio)', 'Ordenes no pedidas'];
                      $valuesLab = [$contadorLab, $resultado->num_rows - $contadorLab];
                      ?>

                      // Crea la gráfica utilizando Chart.js
                      var ctx = document.getElementById('donaChart4').getContext('2d');
                      var donaChart1 = new Chart(ctx, {
                        type: 'doughnut',
                        data: {
                          labels: <?php echo json_encode($labelsLab); ?>,
                          datasets: [{
                            data: <?php echo json_encode($valuesLab); ?>,
                            backgroundColor: [
                              'rgba(255, 99, 132, 0.8)',
                              'rgba(54, 162, 235, 0.8)',
                              'rgba(255, 206, 86, 0.8)',
                              'rgba(75, 192, 192, 0.8)',
                              'rgba(153, 102, 255, 0.8)',
                            ]
                          }]
                        },

                      });
                    </script>
                  </body>

                  </html>
                </div>
                <!--DONA4-->
                <!--ROW-->
              </div>
              <!--segunda dona-->
              </tbody>
              </table>
            </div>
          </div>
          <!-- /.col -->
          <!-- /.row -->
          <!-- accepted payments column -->
          <!--FACTURA-->
          <!-- </div>
                      </div> -->
        </div>

      </div>
    </div>
    <!--final accordion-->  


  </div>
  <!-- cierre seccion 7-->














































  <!-- ************************************************************************************************************************-->
  <!-- ************************************************************************************************************************-->
  <!-- *************************************************  UPDATE 01062023 LORDON********************************************************-->
  <!-- ************************************************************************************************************************-->
  <!-- ************************************************************************************************************************-->












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
<!-- Funciona para consultar disponibilidad -->

<script type="text/javascript">
  function verDia() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();
    var doctor = $("#doctor").val();
    var idCitas = $("#idCitas").val();
    var Sucursales = $("#Sucursales").val();
    var sucursal = $("#sucursal").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    console.log(Sucursales);
    console.log(sucursal);
    $.ajax({
      type: "POST",
      url: "disponibilidad.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id,
        doctor: doctor,
        Sucursales: Sucursales,
        sucursal: sucursal,
        idCitas: idCitas
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };

  function verHora() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();
    var doctor = $("#doctor").val();
    var idCitas = $("#idCitas").val();
    var Sucursales = $("#Sucursales").val();
    var sucursal = $("#sucursal").val();
    console.log(Sucursales);
    console.log(sucursal);
    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidadHora.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id,
        doctor: doctor,
        Sucursales: Sucursales,
        sucursal: sucursal,
        idCitas: idCitas
      },
      success: function(response) {
        $('#div-resultsHora').html(response);

      }
    });
  };

                        function ImprimirVentanaAparte(url) {
                          //var url = 'HC_ImprimirGeneral?HC='+id+'&tipo='+tipo_encriptado;
                          var win = window.open(url, '_blank', 'noopener');
                          win.focus();
                        }

  function cargarFecha() {
    var x = document.getElementById('div-fecha');
    x.style.display = 'none';

    if (x.style.display === 'none') {
      x.style.display = 'block';
    }
  }
</script>

<script type="text/javascript">
  $(function() {
    $('select[name="indicativo"]').on('change', function(e) {
      $('input[name="monto"]').val($(this).find(":selected").text());
    })
  })

  // seleccione el indicativo correspondiente
  <?php $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
  if ($_GET['cI'] <> "") {
    // se cambia $_GET['clienteId'] por $_GET['cI']
    $indicativo = funcionMaster($clienteId, 'cliente_id', 'indicativo', 'cliente');
  } else {
    $indicativo = funcionMaster($_SESSION['ID'], 'ID', 'Indicativo', 'usuarios');
  }
  ?>
  $(window).on("load", function() {
    $("#indicativo > option[value='<?php echo $indicativo ?>']").attr("selected", true);
    $('#indicativo').select2();
  });
</script>


<script>
  $(document).ready(function() {

    $('#duracion').select2({
      tags: true,
      createTag: function(params) {
        // Don't offset to create a tag if there is no @ symbol
        if (params.term.search('^[0-9]+$') == 0) {
          // Return null to disable tag creation
          return {
            id: params.term,
            text: params.term
          }
        } else {
          return null;
        }
        //console.log(params.term.search('/[0-9]/'));


      }
    });

  });

  const tiempoMotivoConsulta = (id, mascara) => {
    let data = {
      key: "info_motivoConsulta",
      mascara: mascara,
      id: id
    };
    $.ajax({
      url: "./ajax_calendar.php",
      data: data,
      type: "POST",
      dataType: "json",
      success: function(response) {
        console.log(response);
        if (response.status) {
          for (const key in object = response.data[0]) {
            if (Object.hasOwnProperty.call(object, key)) {
              if (key == mascara) {
                $(`#${key}`).val([object[key]]).trigger("change.select2");
                if ($(`#${key}`).val() != object[key]) {
                  $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[key]]).trigger("change.select2");
                }
              }
            }
          }
        }
      }
    });
  };

  <?php if ($motivoConsulta != '') { ?>
    // NO ES NECESARIO YA QUE AL EDITAR AUTOMATICAMENTE SE ANEXA EL TIEMPO DE LA CITA
    // tiempoMotivoConsulta('<?php echo $motivoConsulta ?>', 'motivoConsulta');
  <?php } ?>

  $(document).ready(function() {
    var table = $('#example1').DataTable();
    table.on('draw.dt', function() {
      $('.select2').select2(); // Ejecutar Select2 en cada elemento con la clase "select2"
    });
  });

  const presenciaDinamico = (id, estado) => {
    let data = {
      key: "updateEstadoPresencialCita",
      idCitas: id,
      estadoPresencia: estado
    };
    $.ajax({
      url: "./ajax_calendar.php",
      data: data,
      type: "POST",
      dataType: "json",
      success: function(response) {
        if (response.status) {
          let botonesPresencial = JSON.parse(`<?= json_encode($botonesPresencial) ?>`);
          if (response.status) {
            $(`#btn2${id}`).attr('title', botonesPresencial[estado]).html(botonesPresencial[estado]);
          }
        }
      }
    });
  };
</script>