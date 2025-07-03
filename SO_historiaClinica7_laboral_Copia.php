<?php
include 'header.php';
include 'menu.php';
$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $usuario_id = $rowMotorizado['usuario_id'];
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $celular = $rowMotorizado['celular_cliente'];
  $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
  $correo_cliente = $rowMotorizado['correo_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
  $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
  $tipo_cliente = $rowMotorizado['tipo_cliente'];
  $fechar = $rowMotorizado['fechar'];
  $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
  $activo               = $rowMotorizado['activo'];
  $genero = $rowMotorizado['genero'];
  $direccion_cliente    = $rowMotorizado['direccion_cliente'];
  $telefono_cliente     = $rowMotorizado['telefono_cliente'];
  $edad_cliente         = $rowMotorizado['edad_cliente'];
  $profesion_cliente    = $rowMotorizado['profesion_cliente'];
  $acompananteFamiliar  = $rowMotorizado['acompananteFamiliar'];
  $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
  $antecedentes         = $rowMotorizado['antecedentes'];
  $fotoperfil           = $rowMotorizado['fotoperfil'];
  $tiposSangre          = $rowMotorizado['tiposSangre'];
  $esDonante            = $rowMotorizado['esDonante'];
  $tomaMedicamento      = $rowMotorizado['tomaMedicamento'];

  $fechaNacimiento      = $rowMotorizado['fechaNacimiento'];

  $entidadSalud         = $rowMotorizado['entidadSalud'];
  $seguro               = $rowMotorizado['seguro'];

  $nota                 = $rowMotorizado['nota'];
  $enfermedadesPequeno  = $rowMotorizado['enfermedadesPequeno'];
  $alergias             = $rowMotorizado['alergias'];


  $peso           = $rowMotorizado['peso'];
  $altura           = $rowMotorizado['altura'];
  $imc           = $rowMotorizado['imc'];
  $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];
  // ----------------------------------------------------------------------------------------------------------------------------


  $ap1            = $rowMotorizado['ap1'];
  $ap2            = $rowMotorizado['ap2'];
  $ap3            = $rowMotorizado['ap3'];
  $ap4            = $rowMotorizado['ap4'];
  $ap5            = $rowMotorizado['ap5'];
  $ap6            = $rowMotorizado['ap6'];
  $ap7            = $rowMotorizado['ap7'];
  $ap8            = $rowMotorizado['ap8'];
  $ap9            = $rowMotorizado['ap9'];

  $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
  $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
  $whatsapp       = $rowMotorizado['whatsapp'];
  $tipoUsuario    = $rowMotorizado['tipoUsuario'];
  $estado         = $rowMotorizado['estado'];
  $tiposExamen         = $rowMotorizado['tiposExamen'];
}

if (isset($_GET['edit']) && $_GET['edit'] == 'true') {
  $querySelected = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = '$clienteId' AND proceso = 0");
  $idControl = $querySelected->fetch_object()->id;
  $queryNum = mysqli_num_rows($querySelected);
  if ($queryNum > 0) {
    $querySelect = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = $idControl AND tipo = 1 AND proceso = 1")->fetch_object();
    if (is_numeric($querySelect->idHistoria)) {
      $queryResultInsertHistoria = mysqli_query(
        $conn3,
        "SELECT cliente_id, usuario_id, Fecha,
            Hora, motivoConsulta, rEnfermedadactual, 
            riesgoContent, rAntecedentes, rAntecedentes2, 
            rAntecedentes3, antecedenteContent, rAntecedentesGineco, 
            rRevisionSistemas, Examen, Visiometria, 
            Audiometria, Espirometria, Impresion_Diagnostica, 
            recomendaciones_lista, examenLaboratorio, Optometria, 
            Electrocardiogrma, Psicofisico, Psicometrico, Radiografia,Antecedentes_Clinicos,SO_PlanTratamiento FROM historiaclinica6_labora WHERE ID = $querySelect->idHistoria"
      )->fetch_object();
      $queryResultExamenFisico = mysqli_query($conn3, "SELECT usuario_id, cliente_id, peso, altura, imc, fcard, fechaHora, historia_id FROM examenFisico WHERE historia_id = $querySelect->idHistoria AND nombre_historia='Laboral'")->fetch_object();
      if (!$queryResultInsertHistoria || !$queryResultExamenFisico) {
        echo '<pre>';
        echo '--------------------';
        var_dump($conn3);
        echo '</pre>';
      }
    }
  }
}

$arregloParaClinicos = [
  'Visiometria' => false, // 2
  'Audiometria' => false, // 3
  'Espirometria' => false, // 4
  'Optometria' => false, // 5
  "Electrocardiogrma" => false, // 6
  "Psicofisico" => false, // 7
  "Psicometrico" => false, // 8
  "Radiografia" => false // 9
];
// Tipos de Paraclinicos Permitidos en esta historia.
$querySelected2 = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = '$clienteId' AND proceso = 0");
$idControl2 = $querySelected2->fetch_object()->id;
$querySelect2 = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = $idControl2 AND tipo != 1 AND estado = 1");
while ($arrayRow = mysqli_fetch_object($querySelect2)) {
  if ($arrayRow->tipo == 2) {
    $arregloParaClinicos['Visiometria'] = true;
  } else if ($arrayRow->tipo == 3) {
    $arregloParaClinicos['Audiometria'] = true;
  } else if ($arrayRow->tipo == 4) {
    $arregloParaClinicos['Espirometria'] = true;
  } else if ($arrayRow->tipo == 5) {
    $arregloParaClinicos['Optometria'] = true;
  } else if ($arrayRow->tipo == 6) {
    $arregloParaClinicos['Electrocardiogrma'] = true;
  } else if ($arrayRow->tipo == 7) {
    $arregloParaClinicos['Psicofisico'] = true;
  } else if ($arrayRow->tipo == 8) {
    $arregloParaClinicos['Psicometrico'] = true;
  } else if ($arrayRow->tipo == 9) {
    $arregloParaClinicos['Radiografia'] = true;
  }
}
?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <style type="text/css">
    .dlk-radio input[type="radio"],
    .dlk-radio input[type="checkbox"] {
      margin-left: -99999px;
      display: none;
    }

    .dlk-radio input[type="radio"]+.fa,
    .dlk-radio input[type="checkbox"]+.fa {
      opacity: 0.15
    }

    .dlk-radio input[type="radio"]:checked+.fa,
    .dlk-radio input[type="checkbox"]:checked+.fa {
      opacity: 1
    }



    .collapse.in {
    display: block;
}

  </style>
  <section class="content-header">
    <h1>
      Procedimiento

    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#">Procedimiento</a></li>

    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">


        <div class="box">

          <!-- /.box-header -->
          <div class="box-body">
            <br>

            <!-- FIN PERSONALIZADO -->
            <form class="form-horizontal" action="guardarOcupacionalCopia.php" method="POST" enctype="multipart/form-data">

            <div class="box-body">

              <!-- Accordion -->
              <div class="box-group" id="accordion1">

                <!-- lista -->
                <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseClientes">
                        Datos Personales
                      </a>
                    </h4>
                  </div>
                  <div id="CollapseClientes" class="panel-collapse collapse">
                    <?php echo datosPacientes($clienteId); ?>
                  </div>
                </div>
                <!--cierre de lista-->




                <!-- lista -->
                <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseFactoresRiesgo">
                        Factores de Riesgo
                      </a>
                    </h4>
                  </div>
                  <div id="CollapseFactoresRiesgo" class="panel-collapse collapse">
                    


                  <div class="container-fluid row">
                    <div class="col-md-6">
                      <label for="motivoConsulta">Motivo de Consulta</label>
                      <input type="text" name="motivoConsulta" id="motivoConsulta" value="<?= (empty($queryResultInsertHistoria->motivoConsulta) ? 'Examen Medico Ocupacional' : $queryResultInsertHistoria->motivoConsulta) ?>" class="form-control input-lg">
                    </div>
                    <div class="col-md-6">
                      <label for="enfermedadActual">Enfermedad Actual</label><br>
                      <select name="enfermedadActual[]" id="enfermedadActual" class="form-control input-lg select2" style="width:100%;" multiple>
                        <?php
                        
                        $rEnfermedadactual = explode(' || ', ($queryResultInsertHistoria->rEnfermedadactual != "" ? $queryResultInsertHistoria->rEnfermedadactual : $tiposExamen));
                        $select = ['', '', '', '', '', ''];
                        foreach ($rEnfermedadactual as $key => $value) {
                          switch ($value) {
                            case 'Ingreso':
                              $select[0] = 'selected';
                              break;
                            case 'Periodico':
                              $select[1] = 'selected';
                              break;
                            case 'Egreso':
                              $select[2] = 'selected';
                              break;
                            case 'Post Incapacidad':
                              $select[3] = 'selected';
                              break;
                            case 'Reubicacion':
                              $select[4] = 'selected';
                              break;
                            case 'Revisión de Recomendaciones':
                              $select[5] = 'selected';
                              break;
                            default:
                              # code...
                              break;
                          }
                        }
                        ?>
                        <option <?= $select[0] ?>>Ingreso</option>
                        <option <?= $select[1] ?>>Periodico</option>
                        <option <?= $select[2] ?>>Egreso</option>
                        <option <?= $select[3] ?>>Post Incapacidad</option>
                        <option <?= $select[4] ?>>Reubicacion</option>
                        <option <?= $select[5] ?>>Revisión de Recomendaciones</option>
                        <!-- <option <?= ($select[0] != "selected" ? (in_array("Ingreso", $tiposExamen) ? 'selected' : '') : $select[0]) ?>>Ingreso</option>
                        <option <?= ($select[1] != "selected" ? (in_array("Periodico", $tiposExamen) ? 'selected' : '') : $select[1]) ?>>Periodico</option>
                        <option <?= ($select[2] != "selected" ? (in_array("Egreso", $tiposExamen) ? 'selected' : '') : $select[2]) ?>>Egreso</option>
                        <option <?= ($select[3] != "selected" ? (in_array("Post Incapacidad", $tiposExamen) ? 'selected' : '') : $select[3]) ?>>Post Incapacidad</option>
                        <option <?= ($select[4] != "selected" ? (in_array("Reubicacion", $tiposExamen) ? 'selected' : '') : $select[4]) ?>>Reubicacion</option>
                        <option <?= ($select[5] != "selected" ? (in_array("Revisión de Recomendaciones", $tiposExamen) ? 'selected' : '') : $select[5]) ?>>Revisión de Recomendaciones</option> -->
                      </select>
                    </div>
                  </div>



                  <!-- <div class="col-md-12">
                    <label for="objetivosHistoria">Objetivos</label>
                    <input type="text" name="objetivosHistoria" id="objetivosHistoria" value="<?= (empty($queryResultInsertHistoria->motivoConsulta) ? 'Examen Medico Ocupacional' : $queryResultInsertHistoria->motivoConsulta) ?>" class="form-control input-lg">
                  </div> -->



                  <hr style="border:1px solid #423cbc;">
                  <h4 class="h4-form" style="text-align:center;">Factores de Riesgo</h4>


                  <?php
                          $riesgoContent = explode(' || ',  $queryResultInsertHistoria->riesgoContent);
                          // var_dump($riesgoContent);
                          $position = 0;
                          $selectRiesgo = [
                            0 => ['', '', '', '', '', '', ''],
                            1 => ['', '', '', '', '', '', ''],
                            2 => ['', '', '', '', ''],
                            3 => ['', '', '', '', ''],
                            4 => ['', '', '', '', '', '', ''],
                            5 => ['', '', '', '', '', '', ''],
                            6 => ['', '', '', '', '', '', '', '', '', '', '']
                          ];
                          foreach ($riesgoContent as $key => $value) {
                            switch ($position) {
                              case 0:
                                $fisicos = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($fisicos as $key => $value) {
                                  switch ($value) {
                                    case 'iluminacioni':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'radiacion':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'ruido':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'altatemperatura':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'bajatemperatura':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    case 'vibraciones':
                                      $selectRiesgo[$position][5] = 'checked';
                                      break;
                                    case 'humedad':
                                      $selectRiesgo[$position][6] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              case 1:
                                $quimicos = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($quimicos as $key => $value) {
                                  switch ($value) {
                                    case 'gases':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'humos':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'vapores':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'polvos':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'liquidos':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    case 'solidos':
                                      $selectRiesgo[$position][5] = 'checked';
                                      break;
                                    case 'neblinaRocio':
                                      $selectRiesgo[$position][6] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              case 2:
                                $ergoNomicos = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($ergoNomicos as $key => $value) {
                                  switch ($value) {
                                    case 'manejomanualcargas':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'movimientorepetitivos':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'videoTerminal':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'dPTrabajo':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'herramientas':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              case 3:
                                $biologicos = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($biologicos as $key => $value) {
                                  switch ($value) {
                                    case 'virus':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'bacterias':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'hongos':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'fluidosTejidos':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'humanos':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              case 4:
                                $psicoLaborales = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($psicoLaborales as $key => $value) {
                                  switch ($value) {
                                    case 'contenidoTarea':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'equipoTrabajo':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'manejoPublico':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'gestionAdministrativa':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'orgTiempoTrab':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    case 'monotoniaRutina':
                                      $selectRiesgo[$position][5] = 'checked';
                                      break;
                                    case 'sobrecargaHoraExtras':
                                      $selectRiesgo[$position][6] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              case 5:
                                $seguridad = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($seguridad as $key => $value) {
                                  switch ($value) {
                                    case 'mecanicos':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'electricos':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'espaciosConf':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'ordenPublico':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'actEsporadica':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    case 'alturas':
                                      $selectRiesgo[$position][5] = 'checked';
                                      break;
                                    case 'transitoVehicular':
                                      $selectRiesgo[$position][6] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              case 6:
                                $elemProteccionPersonal = explode('&nbsp;|/&nbsp;',  $riesgoContent[$position]);
                                foreach ($elemProteccionPersonal as $key => $value) {
                                  switch ($value) {
                                    case 'casco':
                                      $selectRiesgo[$position][0] = 'checked';
                                      break;
                                    case 'monogafas':
                                      $selectRiesgo[$position][1] = 'checked';
                                      break;
                                    case 'proteccionAuditiva':
                                      $selectRiesgo[$position][2] = 'checked';
                                      break;
                                    case 'cofia':
                                      $selectRiesgo[$position][3] = 'checked';
                                      break;
                                    case 'tapabocas':
                                      $selectRiesgo[$position][4] = 'checked';
                                      break;
                                    case 'arnes':
                                      $selectRiesgo[$position][5] = 'checked';
                                      break;
                                    case 'botas':
                                      $selectRiesgo[$position][6] = 'checked';
                                      break;
                                    case 'guantes':
                                      $selectRiesgo[$position][7] = 'checked';
                                      break;
                                    case 'overol':
                                      $selectRiesgo[$position][8] = 'checked';
                                      break;
                                    case 'peto':
                                      $selectRiesgo[$position][9] = 'checked';
                                      break;
                                    case 'respirador':
                                      $selectRiesgo[$position][10] = 'checked';
                                      break;
                                    default:
                                      # code...
                                      break;
                                  }
                                }
                                break;
                              default:
                                # code...
                                break;
                            }
                            $position++;
                          }
                          ?>


                          <div class="col-md-12 row">






                          <div class="col-md-12 row">
                                <div class="col-md-4 row" style="margin:0px; padding:0px;">
                                  <div class="col-md-12">
                                    <span class="text-bold">Físicos</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Iluminación Insuficiente</span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="iluminacioni" value="iluminacioni" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Radiación </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="radiacion" value="radiacion" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Ruido </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="ruido" value="ruido" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Alta Temperatura </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="atemperatura" value="altatemperatura" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Baja Temperatura </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="btemperatura" value="bajatemperatura" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Vibraciones </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="vibraciones" value="vibraciones" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][5] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Humedad </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="humedad" value="humedad" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[0][6] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                                <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <div class="col-md-12 row">
                                    <span class="text-bold">Químicos</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Gases </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="gases" value="gases" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Humos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="humos" value="humos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Vapores </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="vapores" value="vapores" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Polvos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="polvos" value="polvos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Líquidos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="liquidos" value="liquidos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Sólidos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="solidos" value="solidos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][5] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Neblina - Rocío </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="neblinaRocio" value="neblinaRocio" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[1][6] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                                <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <div class="col-md-12 row">
                                    <span class="text-bold">Ergonómicos</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Manejo Manual de Cargas </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="mmdc" value="manejomanualcargas" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[2][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Movimientos Repetitivos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="movire" value="movimientorepetitivos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[2][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Video Terminal </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="videoTerminal" value="videoTerminal" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[2][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Diseño Puesto de Trabajo </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="dPTrabajo" value="dPTrabajo" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[2][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Herramientas</span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="herramientas" value="herramientas" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[2][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12 row">
                                <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <div class="col-md-12">
                                    <span class="text-bold">Biológicos</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Virus </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="virus" value="virus" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[3][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Bacterias </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="bacterias" value="bacterias" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[3][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Hongos </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="hongos" value="hongos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[3][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Fluidos o Tejidos </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="fluidosTejidos" value="fluidosTejidos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[3][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Humanos </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="humanos" value="humanos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[3][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                                <div class="col-md-4 " style="margin:0px; padding:0px;">
                                  <div class="col-md-12">
                                    <span class="text-bold">Psico-Laborales</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Contenido de Tarea </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="contenidoTarea" value="contenidoTarea" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Equipo de Trabajo </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="equipoTrabajo" value="equipoTrabajo" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Manejo Público </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="manejoPublico" value="manejoPublico" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Gestión Administrativa </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="gestionAdministrativa" value="gestionAdministrativa" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Org. Tiempo de Trabajo </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="orgTiempoTrab" value="orgTiempoTrab" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Monotonía/Rutina </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="monotoniaRutina" value="monotoniaRutina" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][5] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Sobrecarga/Horas Extras </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="sobrecargaHoraExtras" value="sobrecargaHoraExtras" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[4][6] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                                <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <div class="col-md-12">
                                    <span class="text-bold">Seguridad</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Mecánicos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="mecanicos" value="mecanicos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Eléctricos </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="electricos" value="electricos" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Los. Espacios Conf </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="espaciosConf" value="espaciosConf" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Orden Público </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="ordenPublico" value="ordenPublico" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Act. Esporádica </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="actEsporadica" value="actEsporadica" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Alturas </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="alturas" value="alturas" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][5] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-md-8">
                                      <span class="text-bold">Tránsito Vehicular </span>
                                    </div>
                                    <div class="col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="transitoVehicular" value="transitoVehicular" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[5][6] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="col-md-4" style="margin:0px; padding:0px;">
                                  <div class="col-md-12">
                                    <span class="text-bold">Elementos de Protección Personal</span>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Casco </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="casco" value="casco" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][0] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Monogafas </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="monogafas" value="monogafas" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][1] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Protección Auditiva </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="proteccionAuditiva" value="proteccionAuditiva" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][2] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Cofia </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="cofia" value="cofia" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][3] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Tapabocas </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="tapabocas" value="tapabocas" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][4] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Arnés </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="arnes" value="arnes" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][5] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Botas </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="botas" value="botas" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][6] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Guantes </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="guantes" value="guantes" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][7] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Overol </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="overol" value="overol" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][8] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Peto </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="peto" value="peto" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][9] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12 row" style="padding:0px;">
                                    <div class="col-12 col-md-8">
                                      <span class="text-bold">Respirador </span>
                                    </div>
                                    <div class="col-12 col-md-4" style="display:flex;justify-content: center;align-items: center;">
                                      <div class="form-group">
                                        <input type="checkbox" name="respirador" value="respirador" class="check_salud_ocupacional pull-right chechComprobar" onclick="checkCount()" <?= $selectRiesgo[6][10] ?> id="customCheck1">
                                      </div>
                                    </div>
                                  </div>
                                  <div class="col-md-12">
                                    <hr>
                                  </div>
                                </div>
                              </div>
                            </div>

                            <div class="row">
                              <input type="hidden" name="countCheked" id="countCheked" value="0">
                              <div class="col-md-12">
                                <label for="otroFactorRiego">Otros Factores de Riego</label>
                                <textarea placeholder="" name="otroFactorRiego" id="otroFactorRiego" style="border-radius: 5px; width:100%; height: 121px;" class="form-control input-lg" rows="1"><?= $riesgoContent[count($riesgoContent) - 1] ?></textarea>
                              </div>
                            </div>





                          </div>


                  </div>
                </div>
                <!--cierre de lista-->





                <!-- lista -->
                <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseLaborales">
                        Antecedentes Laborales
                      </a>
                    </h4>
                  </div>
                  <div id="CollapseLaborales" class="panel-collapse collapse">
                    

                                <div class="box-body">
                                  <?php
                                  $rAntecedentes = explode(' || ',  $queryResultInsertHistoria->rAntecedentes);
                                  ?>
                                  <div class="row">
                                    <div class="col-md-6">
                                      <label for="empresa">Empresa</label>
                                      <input type="text" name="empresa" id="empresa" value="<?= $rAntecedentes[0] ?>" class="form-control input-lg">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="tiempoA">Tiempo (A)</label>
                                      <input type="text" name="tiempoA" id="tiempoA" value="<?= $rAntecedentes[1] ?>" class="form-control input-lg">
                                    </div>
                                    <div class="col-md-6">
                                      <label for="tiempoM">Tiempo (M)</label>
                                      <input type="text" name="tiempoM" id="tiempoM" value="<?= $rAntecedentes[2] ?>" class="form-control input-lg">
                                    </div>
                                    <?php
                                    $rAntecedentes2 = explode(' || ',  $queryResultInsertHistoria->rAntecedentes2);
                                    ?>
                                    <div class="col-md-3" style="display:flex; align-items: center; padding-top: 30px;">
                                      <label for="" style="margin-right: 10px;">Accidentes de Trabajo </label>
                                      <div class="dlk-radio btn-group">
                                        <label class="btn btn-default btn-sm">
                                          <input name="accidentesTrabajo" class="form-control" type="radio" onclick="$('#collapseAT').addClass('in')" <?= $rAntecedentes2[0] == 1 ? 'checked="true"' : '' ?> value="1">
                                          <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">SI</span>
                                        </label>
                                        <label class="btn btn-default btn-sm">
                                          <input name="accidentesTrabajo" class="form-control" type="radio" value="0" onclick="$('#collapseAT').removeClass('in')" <?= $rAntecedentes2[0] == 1 ? '' : 'checked="true"' ?> defaultchecked="checked">
                                          <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">NO</span>
                                        </label>
                                      </div>
                                    </div>
                                    <?php
                                    $rAntecedentes3 = explode(' || ',  $queryResultInsertHistoria->rAntecedentes3);
                                    ?>
                                    <div class="col-md-3" style="display:flex; align-items: center; padding-top: 30px;">
                                      <label for="" style="margin-right: 10px;">Enfermedad Profesional </label>
                                      <div class="dlk-radio btn-group">
                                        <label class="btn btn-default btn-sm">
                                          <input name="enfermedadProfesional" class="form-control" type="radio" onclick="$('#collapseEP').addClass('in')" <?= $rAntecedentes3[0] == 1 ? 'checked="true"' : '' ?> value="1">
                                          <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">SI</span>
                                        </label>
                                        <label class="btn btn-default btn-sm">
                                          <input name="enfermedadProfesional" class="form-control" type="radio" onclick="$('#collapseEP').removeClass('in')" <?= $rAntecedentes3[0] == 1 ? '' : 'checked="true"' ?> value="0" defaultchecked="checked">
                                          <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">NO</span>
                                        </label>
                                      </div>
                                    </div>


                                    <div class="col-md-12">
                                      <br>
                                      <div class="panel box box-default">
                                        <div id="collapseAT" class="panel-collapse collapse <?= ($rAntecedentes2[0] == 1 ? 'in' : '') ?>">
                                          <div class="box-body">
                                            <div class="row">

                                              <div class="col-md-6">
                                                <label for="cualAcidente">Cual Accidente</label>
                                                <input type="text" name="cualAcidente" id="cualAcidente" value="<?= $rAntecedentes2[1]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-6">
                                                <label for="cualEmpresa">Cual Empresa </label>
                                                <input type="text" name="cualEmpresa" id="cualEmpresa" value="<?= $rAntecedentes2[2]; ?>" class="form-control input-lg">
                                              </div>
                                              <div class="col-md-6">
                                                <label for="fechaAccidente">Fecha del Accidente</label>
                                                <input type="date" name="fechaAccidente" id="fechaAccidente" value="<?= $rAntecedentes2[3]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-6">
                                                <label for="arp">ARP</label>
                                                <input type="text" name="arp" id="arp" value="<?= $rAntecedentes2[4]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-6">
                                                <label for="lesionAccidente">Lesión del Accidente</label>
                                                <input type="text" name="lesionAccidente" id="lesionAccidente" value="<?= $rAntecedentes2[5]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-6">
                                                <label for="secuelaAccidente">Secuela del Accidente</label>
                                                <input type="text" name="secuelaAccidente" id="secuelaAccidente" value="<?= $rAntecedentes2[6]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-6">
                                                <label for="diasIncapacidad">Días incapacidad</label>
                                                <input type="number" name="diasIncapacidad" id="diasIncapacidad" value="<?= $rAntecedentes2[7]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-3" style="display:flex; align-items: center; padding-top: 30px;">
                                                <label for="" style="margin-right: 10px;">Limitaciones </label>
                                                <div class="dlk-radio btn-group">
                                                  <label class="btn btn-default btn-sm">
                                                    <input name="limitacion" class="form-control" type="radio" <?= $rAntecedentes2[8] == 1 ? 'checked="true"' : '' ?> value="1">
                                                    <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">SI</span>
                                                  </label>
                                                  <label class="btn btn-default btn-sm">
                                                    <input name="limitacion" class="form-control" type="radio" <?= $rAntecedentes2[8] == 1 ? '' : 'checked="true"' ?> value="0" defaultchecked="checked">
                                                    <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">NO</span>
                                                  </label>
                                                </div>
                                              </div>

                                              <div class="col-md-3" style="display:flex; align-items: center; padding-top: 30px;">
                                                <label for="" style="margin-right: 10px;">Reubicación </label>
                                                <div class="dlk-radio btn-group">
                                                  <label class="btn btn-default btn-sm">
                                                    <input name="reubicacion" class="form-control" type="radio" <?= $rAntecedentes2[9] == 1 ? 'checked="true"' : '' ?> value="1">
                                                    <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">SI</span>
                                                  </label>
                                                  <label class="btn btn-default btn-sm">
                                                    <input name="reubicacion" class="form-control" type="radio" <?= $rAntecedentes2[9] == 1 ? '' : 'checked="true"' ?> value="0" defaultchecked="checked">
                                                    <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">NO</span>
                                                  </label>
                                                </div>
                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="col-md-12">
                                      <br>
                                      <div class="panel box box-default">
                                        <div id="collapseEP" class="panel-collapse collapse <?= ($rAntecedentes3[0] == 1 ? 'in' : '') ?>">
                                          <div class="box-body">
                                            <div class="row">

                                              <div class="col-md-6">
                                                <label for="diagnosticoEP">Diagnostico </label>
                                                <input type="text" name="diagnosticoEP" id="diagnosticoEP" value="<?= $rAntecedentes3[1]; ?>" class="form-control input-lg">
                                              </div>

                                              <div class="col-md-6">
                                                <label for="presuntivaConfirmadaEP">Presuntiva/Confirmada </label>
                                                <input type="text" name="presuntivaConfirmadaEP" id="presuntivaConfirmadaEP" value="<?= $rAntecedentes3[2]; ?>" class="form-control input-lg">
                                              </div>

                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                    


                                  </div>  
                              




                  </div>
                </div>
                </div>
                <!--cierre de lista-->



                

                

                <!-- lista -->
                <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                <div class="box-header with-border">
                                  <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseAntecedentes">
                                      Antecedentes
                                    </a>
                                  </h4>
                                </div>
                                <div id="CollapseAntecedentes" class="panel-collapse collapse">
                                  <div class="box-body">
                                    <?php
                                    list($antecedenteContent1, $antecedenteContent2, $antecedenteContent3) = explode(' || ',  $queryResultInsertHistoria->antecedenteContent);
                                    
                                    $antecedenteContent1 = explode("&nbsp;|/&nbsp;", $antecedenteContent1);
                                    $antecedenteContent2 = explode("&nbsp;|/&nbsp;", $antecedenteContent2);
                                    $antecedenteContent3 = explode("&nbsp;|/&nbsp;", $antecedenteContent3);
                                    // var_dump($antecedenteContent1);
                                    ?>
                                    <div class="row">
                                      <div class="col-md-12">
                                        <h4 class="text-bold" align="center"> Personales </h4>
                                      </div>
                                      <div class="col-md-6">
                                        <label for="infancia">Infancia</label>
                                        <input type="text" name="infancia" id="infancia" value="<?= $antecedenteContent1[0] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="patologicos">Patológicos</label>
                                        <input type="text" name="patologicos" id="patologicos" value="<?= $antecedenteContent1[1] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="inmunologicos">Inmunológicos</label>
                                        <input type="text" name="inmunologicos" id="inmunologicos" value="<?= $antecedenteContent1[2] ?>" class="form-control input-lg">
                                      </div>

                                      <div class="col-md-6">
                                        <label for="traumaticos">Traumáticos</label>
                                        <input type="text" name="traumaticos" id="traumaticos" value="<?= $antecedenteContent1[3] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="hospitalarios">Hospitalarios</label>
                                        <input type="text" name="hospitalarios" id="hospitalarios" value="<?= $antecedenteContent1[4] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="quirurgicos">Quirúrgicos</label>
                                        <input type="text" name="quirurgicos" id="quirurgicos" value="<?= $antecedenteContent1[5] ?>" class="form-control input-lg">
                                      </div>

                                      <div class="col-md-6">
                                        <label for="txicoAlergicos">Tóxico/Alérgicos</label>
                                        <input type="text" name="txicoAlergicos" id="txicoAlergicos" value="<?= $antecedenteContent1[6] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="ets">ETS</label>
                                        <input type="text" name="ets" id="ets" value="<?= $antecedenteContent1[7] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="psiquiatricos">Psiquiátricos</label>
                                        <input type="text" name="psiquiatricos" id="psiquiatricos" value="<?= $antecedenteContent1[8] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-6">
                                        <label for="farmacologicos">Farmacológicos</label>
                                        <input type="text" name="farmacologicos" id="farmacologicos" value="<?= $antecedenteContent1[9] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-12">
                                        <br>
                                        <h4 class="text-bold" align="center"> Hábitos Saludables </h4>
                                      </div>
                                      <div class="col-md-4">
                                        <label for="tabaquismo">Tabaquismo</label>
                                        <input type="text" name="tabaquismo" id="tabaquismo" value="<?= $antecedenteContent2[0] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-4">
                                        <label for="alcoholismo">Alcoholismo</label>
                                        <input type="text" name="alcoholismo" id="alcoholismo" value="<?= $antecedenteContent2[1] ?>" class="form-control input-lg">
                                      </div>
                                      <div class="col-md-4">
                                        <label for="deporteActividadFisica">Deporte/Actividad Física</label>
                                        <input type="text" name="deporteActividadFisica" id="deporteActividadFisica" value="<?= $antecedenteContent2[2] ?>" class="form-control input-lg">
                                      </div>

                                      <div class="col-md-12">
                                          <br>
                                          <h4 class="text-bold" align="center"> Familiares </h4>
                                        </div>
                                      <div class="col-md-12">
                                          <textarea name="familiares" id="familiares" class="form-control input-lg" style="width: 100%"><?= $antecedenteContent3[0] ?></textarea>
                                        </div>
                                    </div>
                                    <!-- ================================== SECTION ANTECEDENTES CLINICOS ================================================ -->
                                    <div class="col-md-12">
                                    <br>
                                    <h4 class="text-bold" align="center"> Clinicos </h4>
                                    </div>
                                    <div class="col-md-12">
                                    <textarea name="aClinicos" id="aClinicos" class="form-control input-lg" style="width: 100%"><?php echo $queryResultInsertHistoria->Antecedentes_Clinicos ?></textarea>
                                    </div>
                                    <!-- ================================== SECTION ANTECEDENTES CLINICOS ================================================ -->
                                    
                                    <div class="row">
                                      <input type="hidden" name="genero" value="<?= $genero ?>">
                                      <?php
                                      list($rAntecedentesGineco1, $rAntecedentesGineco2, $rAntecedentesGineco3) = explode(' || ',  $queryResultInsertHistoria->rAntecedentesGineco);
                                      $rAntecedentesGineco1 = explode("&nbsp;|/&nbsp;", $rAntecedentesGineco1);
                                      $rAntecedentesGineco2 = explode("&nbsp;|/&nbsp;", $rAntecedentesGineco2);
                                      $rAntecedentesGineco3 = explode("&nbsp;|/&nbsp;", $rAntecedentesGineco3);
                                      // var_dump($rAntecedentesGineco1);
                                      if ($genero == "F") :
                                      ?>
                                        <div class="col-md-12">
                                          <br>
                                          <h4 class="text-bold" align="center"> Gineco-Obstétricos </h4>
                                        </div>
                                        <div class="col-md-6">
                                          <label for="menarquia">Menarquia</label>
                                          <input type="number" name="menarquia" id="menarquia" value="<?= $rAntecedentesGineco1[0] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-6">
                                          <label for="ciclosMestruales">Ciclos Menstruales</label>
                                          <select name="ciclosMestruales" id="ciclosMestruales" class="form-control input-lg">
                                            <option value="" selected disabled>Selecciona el Ciclo</option>
                                            <option <?= ($rAntecedentesGineco1[1] == "Regulares" ? 'selected' : '') ?>>Regulares</option>
                                            <option <?= ($rAntecedentesGineco1[1] == "Irregulares" ? 'selected' : '') ?>>Irregulares</option>
                                          </select>
                                        </div>
                                        <div class="col-md-12">
                                          <br>
                                          <h5 class="text-bold" align="center"> Fórmula Obstétrica </h5>
                                        </div>
                                        <div class="col-md-3">
                                          <label for="gGestaciones">G - Gestaciones</label>
                                          <input type="number" name="gGestaciones" id="gGestaciones" value="<?= $rAntecedentesGineco2[0] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-3">
                                          <label for="pPariedad">P - Paridad</label>
                                          <input type="number" name="pPariedad" id="pPariedad" value="<?= $rAntecedentesGineco2[1] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-3">
                                          <label for="aAbortos">A - Abortos</label>
                                          <input type="number" name="aAbortos" id="aAbortos" value="<?= $rAntecedentesGineco2[2] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-3">
                                          <label for="oObitos">O - Óbitos</label>
                                          <input type="number" name="oObitos" id="oObitos" value="<?= $rAntecedentesGineco2[3] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-4">
                                          <label for="mMortinatos">M - Mortinatos</label>
                                          <input type="number" name="mMortinatos" id="mMortinatos" value="<?= $rAntecedentesGineco2[4] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-4">
                                          <label for="cCesareas">C - Cesáreas</label>
                                          <input type="number" name="cCesareas" id="cCesareas" value="<?= $rAntecedentesGineco2[5] ?>" class="form-control input-lg">
                                        </div>
                                        <div class="col-md-4">
                                          <label for="eEctopicos">E - Ectópicos</label>
                                          <input type="number" name="eEctopicos" id="eEctopicos" value="<?= $rAntecedentesGineco2[6] ?>" class="form-control input-lg">
                                        </div>

                                        <div class="col-md-12">
                                          <br>
                                          <h4 class="text-bold" align="center"> Gineco-Obstétricos </h4>
                                          <br>
                                        </div>

                                        <div class="col-md-4">
                                          <label for="FUR">FUR </label>
                                          <input type="date" name="FUR" id="FUR" value="<?= $rAntecedentesGineco3[0] ?>" class="form-control input-lg">
                                        </div>

                                        <div class="col-md-4">
                                          <label for="FUP">FUP <input type="checkbox" name="noAplicaFUP" id="noAplicaFUP" onclick="($(this).is(':checked') ? $('#FUP').attr('disabled', true) : $('#FUP').attr('disabled', false))"> No aplica</label>
                                          <input type="date" name="FUP" id="FUP" value="<?= $rAntecedentesGineco3[1] ?>" class="form-control input-lg">
                                        </div>

                                        <div class="col-md-4">
                                          <label for="FPP">FPP <input type="checkbox" name="noAplicaFPP" id="noAplicaFPP" onclick="($(this).is(':checked') ? $('#FPP').attr('disabled', true) : $('#FPP').attr('disabled', false))"> No aplica</label>
                                          <input type="date" name="FPP" id="FPP" value="<?= $rAntecedentesGineco3[2] ?>" class="form-control input-lg">
                                        </div>

                                        <div class="col-md-4" style="padding: 0">
                                            <label for="ultimaCitologia">Última Citología (Mes)</label>
                                            <input type="number" name="ultimaCitologiaM" id="ultimaCitologiaM" value="<?= $rAntecedentesGineco3[3] ?>" class="form-control input-lg">
                                          </div>

                                        
                                          
                                          <div class="col-md-4" style="padding: 0">
                                            <label for="ultimaCitologia">(Año)</label>
                                            <input type="number" name="ultimaCitologiaA" id="ultimaCitologiaA" value="<?= $rAntecedentesGineco3[4] ?>" class="form-control input-lg">
                                          </div>
                                        

                                        <div class="col-md-4">
                                          <label for="resultadoCitologia">Resultado de la Citología</label>
                                          <select name="resultadoCitologia" id="resultadoCitologia" class="form-control input-lg">
                                            <option value="" selected disabled>Seleccione Resultado</option>
                                            <option <?= ($rAntecedentesGineco3[5] == "Normal" ? 'selected' : '') ?>>Normal</option>
                                            <option <?= ($rAntecedentesGineco3[5] == "Anormal" ? 'selected' : '') ?>>Anormal</option>
                                            <option <?= ($rAntecedentesGineco3[5] == "Inflamatorio" ? 'selected' : '') ?>>Inflamatorio</option>
                                            <option <?= ($rAntecedentesGineco3[5] == "No Aplica" ? 'selected' : '') ?>>No Aplica</option>
                                          </select>
                                        </div>

                                        <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                          <label for="" style="margin-right: 10px;">Planificación </label>
                                          <div class="dlk-radio btn-group">
                                            <label class="btn btn-default btn-sm">
                                              <input name="planificacion" class="form-control" type="radio" <?= ($rAntecedentesGineco3[6] == "1" ? 'checked="true"' : '') ?> value="1">
                                              <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                            </label>
                                            <label class="btn btn-default btn-sm">
                                              <input name="planificacion" class="form-control" type="radio" <?= ($rAntecedentesGineco3[6] ? ($rAntecedentesGineco3[6] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                              <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                            </label>
                                          </div>
                                        </div>

                                        <div class="col-md-8">
                                          <!-- <label for="coclosMestruales">Ciclos menstruales</label> -->
                                          <label for="planUsaAnticonceptivo">¿Usa Algun Anticonceptivo?</label>
                                          <select name="planUsaAnticonceptivo" id="planUsaAnticonceptivo" class="form-control input-lg">
                                            <option value="" selected disabled>Selecciona el Ciclo</option>
                                            <option <?= ($rAntecedentesGineco3[7] == "Hormonales" ? 'selected' : '') ?> value="Hormonales">Hormonales</option>
                                            <option <?= ($rAntecedentesGineco3[7] == "Barrera" ? 'selected' : '') ?> value="Barrera">Barrera</option>
                                            <option <?= ($rAntecedentesGineco3[7] == "DIU" ? 'selected' : '') ?> value="DIU">DIU</option>
                                            <option <?= ($rAntecedentesGineco3[7] == "Quirurgico" ? 'selected' : '') ?> value="Quirurgico">Quirúrgico</option>
                                          </select>
                                        </div>
                                      <?php endif; ?>
                                      <div class="col-md-12">
                                        <?php
                                        $rRevisionSistemas = explode('&nbsp;|/&nbsp;',  $queryResultInsertHistoria->rRevisionSistemas);
                                        ?>
                                        <br>
                                        <h4 class="text-bold" align="center"> Revisión por Sistemas </h4>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Neurológico </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="numerologico" class="form-control" type="radio" <?= ($rRevisionSistemas[0] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">SI</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="numerologico" class="form-control" type="radio" <?= ($rRevisionSistemas[0] ? ($rRevisionSistemas[0] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">NO</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Sistema Visual </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="sistemaVisual" class="form-control" type="radio" <?= ($rRevisionSistemas[1] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">SI</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="sistemaVisual" class="form-control" type="radio" <?= ($rRevisionSistemas[1] ? ($rRevisionSistemas[1] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">NO</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Audición </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="audicion" class="form-control" type="radio" <?= ($rRevisionSistemas[2] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="audicion" class="form-control" type="radio" <?= ($rRevisionSistemas[2] ? ($rRevisionSistemas[2] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Otorrinolaringológico </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="otglogico" class="form-control" type="radio" <?= ($rRevisionSistemas[3] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="otglogico" class="form-control" type="radio" <?= ($rRevisionSistemas[3] ? ($rRevisionSistemas[3] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Cardio Pulmonar </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="cardioPulmonar" class="form-control" type="radio" <?= ($rRevisionSistemas[4] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="cardioPulmonar" class="form-control" type="radio" <?= ($rRevisionSistemas[4] ? ($rRevisionSistemas[4] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Gastro Intestinal</label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="gastroInstetinal" class="form-control" type="radio" <?= ($rRevisionSistemas[5] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="gastroInstetinal" class="form-control" type="radio" <?= ($rRevisionSistemas[5] ? ($rRevisionSistemas[5] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Genito Urinario</label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="genitoUrinario" class="form-control" type="radio" <?= ($rRevisionSistemas[6] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="genitoUrinario" class="form-control" type="radio" <?= ($rRevisionSistemas[6] ? ($rRevisionSistemas[6] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Osteomuscular</label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="osteomuscular" class="form-control" type="radio" <?= ($rRevisionSistemas[7] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="osteomuscular" class="form-control" type="radio" <?= ($rRevisionSistemas[7] ? ($rRevisionSistemas[7] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Piel y Faneras</label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="pielFaneras" class="form-control" type="radio" <?= ($rRevisionSistemas[8] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="pielFaneras" class="form-control" type="radio" <?= ($rRevisionSistemas[8] ? ($rRevisionSistemas[8] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Endocrino </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="endocrino" class="form-control" type="radio" <?= ($rRevisionSistemas[9] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="endocrino" class="form-control" type="radio" <?= ($rRevisionSistemas[9] ? ($rRevisionSistemas[9] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Psicológico </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="psicologico" class="form-control" type="radio" <?= ($rRevisionSistemas[10] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="psicologico" class="form-control" type="radio" <?= ($rRevisionSistemas[10] ? ($rRevisionSistemas[10] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-4" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Vascular </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="vascular" class="form-control" type="radio" <?= ($rRevisionSistemas[11] == "1" ? 'checked="true"' : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="vascular" class="form-control" type="radio" <?= ($rRevisionSistemas[11] ? ($rRevisionSistemas[11] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <br>
                                        <label for="otraIformacionAntecedentes">Otra Información</label>
                                        <textarea name="otraIformacionAntecedentes" id="otraIformacionAntecedentes" class="form-control input-lg" style="width: 100%; height: 120px"><?= $rRevisionSistemas[12] ?></textarea>
                                      </div>
                                    </div>

                                  </div>
                                </div>
                              </div>
                              <!--cierre de lista-->


                            












                              <!-- inicio lista -->
                              <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                <div class="box-header with-border">
                                  <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree44">
                                      Examen Físico
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseThree44" class="panel-collapse collapse">
                                  <div class="box-body row">
                                    <?php
                                    $peso = $queryResultExamenFisico->peso;
                                    $altura = $queryResultExamenFisico->altura;
                                    $imc = $queryResultExamenFisico->imc;
                                    $fcard = explode(' || ',  $queryResultExamenFisico->fcard);

                                    ?>
                                    <div class="form-group col-md-3">
                                      <div align="left">Peso en KG</div>
                                      <input type="number" class="form-control input-lg" id="peso" value="<?= $peso ?>" name="peso" onChange="calcularimc();" step="any">
                                    </div>

                                    <div class="form-group col-md-3">
                                      <div align="left">Talla </div>
                                      <input type="number" class="form-control input-lg" id="altura" value="<?= $altura ?>" name="altura" onChange="calcularimc();" step="any">
                                    </div>

                                    <div class="form-group col-md-3">
                                      <div align="left"> Índice de Masa Corporal </div>
                                      <input type="number" class="form-control input-lg" id="imc" value="<?= $imc ?>" name="imc" step="any">
                                    </div>

                                    <div class="form-group col-md-3">
                                      <div align="left">Lateralidad </div>
                                      <select name="lateralidad" id="lateralidad" class="form-control input-lg">
                                        <option value="" selected disabled>Seleccione..</option>
                                        <option <?= ($fcard[0] == "Diestro" ? 'selected' : '') ?>>Diestro</option>
                                        <option <?= ($fcard[0] == "Siniestro" ? 'selected' : '') ?>>Siniestro</option>
                                        <option <?= ($fcard[0] == "Ambidextro" ? 'selected' : '') ?>>Ambidextro</option>
                                      </select>
                                    </div>

                                    <div class="form-group col-md-4">
                                      <div align="left">Tension Arterial mm/Hg </div>
                                      <input type="text" class="form-control input-lg" id="tension" name="tension" value="<?= $fcard[1] ?>" step="any" placeholder="" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>

                                    <div class="form-group col-md-4">
                                      <div align="left">Fc Minuto </div>
                                      <input type="text" class="form-control input-lg" id="fc_minuto" name="fc_minuto" value="<?= $fcard[2] ?>">
                                    </div>

                                    <div class="form-group col-md-4">
                                      <div align="left">Fr Minuto </div>
                                      <input type="text" class="form-control input-lg" id="fr_minuto" name="fr_minuto" step="any" value="<?= $fcard[3 ] ?>" placeholder="" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>

                                    <div class="col-md-12">
                                      <div class="form-group" align="center">
                                        <label class="control-label">
                                          <h3>Examen</h3>
                                        </label>
                                      </div>
                                    </div>

                                    <?php
                                    list(
                                      $cabezaC,
                                      $nariz,
                                      $bocaG,
                                      $oidos,
                                      $agudezaVisual,
                                      $ojos,
                                      $torax,
                                      $sistemaVPL,
                                      $abdomenRInguinal,
                                      $extremidadesS,
                                      $extremidadesI,
                                      $columnaVertebral,
                                      $neurologicoRO,
                                      $pielFanerasExa,
                                      $observaciones
                                    ) = explode(' || ',  $queryResultInsertHistoria->Examen);
                                    $cabezaC = explode('&nbsp;|/&nbsp;',  $cabezaC);
                                    $nariz = explode('&nbsp;|/&nbsp;',  $nariz);
                                    $bocaG = explode('&nbsp;|/&nbsp;',  $bocaG);
                                    $oidos = explode('&nbsp;|/&nbsp;',  $oidos);
                                    $agudezaVisual = explode('&nbsp;|/&nbsp;',  $agudezaVisual);
                                    $ojos = explode('&nbsp;|/&nbsp;',  $ojos);
                                    $torax = explode('&nbsp;|/&nbsp;',  $torax);
                                    $sistemaVPL = explode('&nbsp;|/&nbsp;',  $sistemaVPL);
                                    $abdomenRInguinal = explode('&nbsp;|/&nbsp;',  $abdomenRInguinal);
                                    $extremidadesS = explode('&nbsp;|/&nbsp;',  $extremidadesS);
                                    $extremidadesI = explode('&nbsp;|/&nbsp;',  $extremidadesI);
                                    $columnaVertebral = explode('&nbsp;|/&nbsp;',  $columnaVertebral);
                                    $neurologicoRO = explode('&nbsp;|/&nbsp;',  $neurologicoRO);
                                    $pielFanerasExa = explode('&nbsp;|/&nbsp;',  $pielFanerasExa);
                                    $observaciones = explode('&nbsp;|/&nbsp;',  $observaciones);
                                    ?>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <label class="control-label">Órgano</label>
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <label class="control-label">Estado Normal</label>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <label class="control-label">Hallazgo/Observaciones </label>

                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="cabezaCuello" class="form-control" value="<?= ($cabezaC[0] ? $cabezaC[0] : 'Cabeza y Cuello') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="cabezaCuelloEstado" id="cabezaCuelloEstado" class="form-control">
                                          <option <?= ($cabezaC[1] ? ($cabezaC[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($cabezaC[1] ? ($cabezaC[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="cabezaCuelloObservacion" class="form-control" value="<?= ($cabezaC[2] ? $cabezaC[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="nariz" class="form-control" value="<?= ($nariz[0] ? $nariz[0] : 'Nariz') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="narizEstado" id="narizEstado" class="form-control">
                                          <option <?= ($nariz[1] ? ($nariz[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($nariz[1] ? ($nariz[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="narizObservacion" class="form-control" value="<?= ($nariz[2] ? $nariz[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="bocaGarganta" class="form-control" value="<?= ($bocaG[0] ? $bocaG[0] : 'Boca y Garganta') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="bocaGargantaEstado" id="bocaGargantaEstado" class="form-control">
                                          <option <?= ($bocaG[1] ? ($bocaG[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($bocaG[1] ? ($bocaG[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="bocaGargantaObservacion" class="form-control" value="<?= ($bocaG[2] ? $bocaG[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="oidos" class="form-control" value="<?= ($oidos[0] ? $oidos[0] : 'Oídos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="oidosEstado" id="oidosEstado" class="form-control">
                                          <option <?= ($oidos[1] ? ($oidos[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($oidos[1] ? ($oidos[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="oidosObservacion" class="form-control" value="<?= ($oidos[2] ? $oidos[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="agudezaVisual" class="form-control" value="<?= ($agudezaVisual[0] ? $agudezaVisual[0] : 'Agudeza Visual') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="agudezaVisualEstado" id="agudezaVisualEstado" class="form-control">
                                          <option <?= ($agudezaVisual[1] ? ($agudezaVisual[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($agudezaVisual[1] ? ($agudezaVisual[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="agudezaVisualObservacion" class="form-control" value="<?= ($agudezaVisual[2] ? $agudezaVisual[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="ojos" class="form-control" value="<?= ($ojos[0] ? $ojos[0] : 'Ojos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="ojosEstado" id="ojosEstado" class="form-control">
                                          <option <?= ($ojos[1] ? ($ojos[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($ojos[1] ? ($ojos[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="ojosObservacion" class="form-control" value="<?= ($ojos[2] ? $ojos[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="torax" class="form-control" value="<?= ($torax[0] ? $torax[0] : 'Tórax') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="toraxEstado" id="toraxEstado" class="form-control">
                                          <option <?= ($torax[1] ? ($torax[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($torax[1] ? ($torax[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="toraxObsercacion" class="form-control" value="<?= ($torax[2] ? $torax[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="sistemaVPL" class="form-control" value="<?= ($sistemaVPL[0] ? $sistemaVPL[0] : 'Sistema Vascular Periférico y Linfático') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="sistemaVPLEstado" id="sistemaVPLEstado" class="form-control">
                                          <option <?= ($sistemaVPL[1] ? ($sistemaVPL[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($sistemaVPL[1] ? ($sistemaVPL[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="sistemaVPLObservacion" class="form-control" value="<?= ($sistemaVPL[2] ? $sistemaVPL[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="abdomenRInguinal" class="form-control" value="<?= ($abdomenRInguinal[0] ? $abdomenRInguinal[0] : 'Abdomen y Región Inguinal') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="abdomenRInguinalEstado" id="abdomenRInguinalEstado" class="form-control">
                                          <option <?= ($abdomenRInguinal[1] ? ($abdomenRInguinal[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($abdomenRInguinal[1] ? ($abdomenRInguinal[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="abdomenRInguinalEstadoObservacion" class="form-control" value="<?= ($abdomenRInguinal[2] ? $abdomenRInguinal[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="extremidadesS" class="form-control" value="<?= ($extremidadesS[0] ? $extremidadesS[0] : 'Extremidades Superiores') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="extremidadesSEstado" id="extremidadesSEstado" class="form-control">
                                          <option <?= ($extremidadesS[1] ? ($extremidadesS[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($extremidadesS[1] ? ($extremidadesS[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="extremidadesSObservacion" class="form-control" value="<?= ($extremidadesS[2] ? $extremidadesS[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="extremidadesI" class="form-control" value="<?= ($extremidadesI[0] ? $extremidadesI[0] : 'Extremidades Inferiores') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="extremidadesIEstado" id="extremidadesIEstado" class="form-control">
                                          <option <?= ($extremidadesI[1] ? ($extremidadesI[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($extremidadesI[1] ? ($extremidadesI[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="extremidadesIObservacion" class="form-control" value="<?= ($extremidadesI[2] ? $extremidadesI[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="columnaVertebral" class="form-control" value="<?= ($columnaVertebral[0] ? $columnaVertebral[0] : 'Columna Vertebral') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="columnaVertebralEstado" id="columnaVertebralEstado" class="form-control">
                                          <option <?= ($columnaVertebral[1] ? ($columnaVertebral[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($columnaVertebral[1] ? ($columnaVertebral[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>


                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="columnaVertebralObservacion" class="form-control" value="<?= ($columnaVertebral[2] ? $columnaVertebral[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="neurologicoRO" class="form-control" value="<?= ($neurologicoRO[0] ? $neurologicoRO[0] : 'Neurologico y Reflejos Osteotendinosos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="neurologicoROEstado" id="neurologicoROEstado" class="form-control">
                                          <option <?= ($neurologicoRO[1] ? ($neurologicoRO[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($neurologicoRO[1] ? ($neurologicoRO[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="neurologicoROObservacion" class="form-control" value="<?= ($neurologicoRO[2] ? $neurologicoRO[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="pielFanerasExa" class="form-control" value="<?= ($pielFanerasExa[0] ? $pielFanerasExa[0] : 'Piel y Faneras') ?>">
                                      </div>
                                    </div>
                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="pielFanerasExaEstado" id="pielFanerasExaEstado" class="form-control">
                                          <option <?= ($pielFanerasExa[1] ? ($pielFanerasExa[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($pielFanerasExa[1] ? ($pielFanerasExa[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>
                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="pielFanerasExaObservaciones" class="form-control" value="<?= ($pielFanerasExa[2] ? $pielFanerasExa[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-3">
                                      <div class="form-group">
                                        <input type="text" name="observaciones" class="form-control" value="<?= ($observaciones[0] ? $observaciones[0] : 'Observaciones') ?>">
                                      </div>
                                    </div>

                                    <div class="col-md-2">
                                      <div class="form-group">
                                        <select name="observacionesEstado" id="observacionesEstado" class="form-control">
                                          <option <?= ($observaciones[1] ? ($observaciones[1] == 'Normal' ? 'selected' : '') : 'selected') ?>>Normal</option>
                                          <option <?= ($observaciones[1] ? ($observaciones[1] == 'Anormal' ? 'selected' : '') : '') ?>>Anormal</option>
                                        </select>
                                      </div>
                                    </div>

                                    <div class="col-md-7">
                                      <div class="form-group">
                                        <input type="text" name="observacionesO" class="form-control" value="<?= ($observaciones[2] ? $observaciones[2] : 'Sin Hallazgos') ?>">
                                      </div>
                                    </div>

                                  </div>
                                </div>

                              </div>
                              <!-- cierre lista-->





                              <!-- inicio de lista -->
                              <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                <div class="box-header with-border">
                                  <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_osteomuscular">
                                      Resultados Para-Clínicos
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapse_osteomuscular" class="panel-collapse collapse">
                                  <?php
                                  $Visiometria = $queryResultInsertHistoria->Visiometria;
                                  $Audiometria = $queryResultInsertHistoria->Audiometria;
                                  $Espirometria = $queryResultInsertHistoria->Espirometria;
                                  $Optometria = $queryResultInsertHistoria->Optometria;
                                  $Electrocardiogrma = $queryResultInsertHistoria->Electrocardiogrma;
                                  $Psicofisico = $queryResultInsertHistoria->Psicofisico;
                                  $Psicometrico = $queryResultInsertHistoria->Psicometrico;
                                  $Radiografia = $queryResultInsertHistoria->Radiografia;
                                  ?>
                                  <div class="box-body">
                                    <?php if ($arregloParaClinicos['Visiometria'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Visiometría
                                        <textarea placeholder="" name="visiometria" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Visiometria ? $Visiometria : 'Dentro de Limites Normales') ?></textarea>
                                      </div>
                                    <?php endif; ?>

                                    <?php if ($arregloParaClinicos['Audiometria'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Audiometría
                                        <textarea placeholder="" name="audiometria" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Audiometria ? $Audiometria : 'Dentro de Limites Normales') ?></textarea>
                                      </div>
                                    <?php endif; ?>

                                    <?php if ($arregloParaClinicos['Espirometria'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Espirometría
                                        <textarea placeholder="" name="espirometria" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Espirometria ? $Espirometria : 'FVC:  (%), FEV1:  (%), FEV1/FVC:  (%), PEF:  ; Dentro de Limites Normales') ?></textarea>
                                      </div>
                                    <?php endif; ?>

                                    <?php if ($arregloParaClinicos['Optometria'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Optometría
                                        <textarea placeholder="" name="optometria" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Optometria ? $Optometria : '') ?></textarea>
                                      </div>
                                    <?php endif; ?>
                                    <?php if ($arregloParaClinicos['Electrocardiogrma'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Electrocardiograma
                                        <textarea placeholder="" name="electrocardiogrma" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Electrocardiogrma ? $Electrocardiogrma : '') ?></textarea>
                                      </div>
                                    <?php endif; ?>
                                    <?php if ($arregloParaClinicos['Psicofisico'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Psicofísico
                                        <textarea placeholder="" name="psicofisico" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Psicofisico ? $Psicofisico : '') ?></textarea>
                                      </div>
                                    <?php endif; ?>
                                    <?php if ($arregloParaClinicos['Psicometrico'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Psicométrico
                                        <textarea placeholder="" name="psicometrico" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Psicometrico ? $Psicometrico : '') ?></textarea>
                                      </div>
                                    <?php endif; ?>
                                    <?php if ($arregloParaClinicos['Radiografia'] === true) : ?>
                                      <div class="form-group col-md-12">
                                        Radiografía
                                        <textarea placeholder="" name="radiografia" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= ($Radiografia ? $Radiografia : '') ?></textarea>
                                      </div>
                                    <?php endif; ?>
                                  </div>
                                </div>
                              </div>
                              <!-- cierre de lista -->

                              






                              <?php
                              $queryOrden = mysqli_query($conn3, "SELECT a.id AS id, lb.nombreExamen AS nombreExamen, a.resultado AS resultado, a.idExamen AS idExamen, a.idOrden AS idOrden, o.idDoctor AS idDoctor, o.idCliente AS idCliente, o.cargado AS cargado, a.created_at AS fechaEAsinado, lb.created_at AS fechaOrden FROM examanesAsignados AS a JOIN examenesLB AS lb ON a.idExamen = lb.id JOIN generarOrden AS o ON a.idOrden = o.id WHERE o.idCliente = {$clienteId} AND (o.idHistoria = '{$querySelect->idHistoria}' OR o.cargado = 0) ORDER BY a.id;");
                              $numTotalOrden = mysqli_num_rows($queryOrden);
                              if ($numTotalOrden > 0) : ?>
                              <!-- inicio de lista -->
                                <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapse_LabOrden">
                                        Resultados Laboratorio
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapse_LabOrden" class="panel-collapse collapse">
                                    <div class="box-body">
                                      <?php
                                      while ($rowArray = mysqli_fetch_array($queryOrden)) { ?>
                                        <div class="form-group col-md-12">
                                          <?= $rowArray['nombreExamen'] ?>
                                          <textarea placeholder="" name="examenLab[<?= $rowArray['nombreExamen'] ?>]" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="2"><?= $rowArray['resultado'] ?></textarea>
                                        </div>
                                      <?php } ?>
                                    </div>
                                  </div>
                                </div>
                                <!-- cierre de lista -->
                                <br>
                              <?php endif; ?>








                              <!-- inicio de lista -->
                              <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                <div class="box-header with-border">
                                  <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseNinth">
                                      Diagnósticos
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseNinth" class="panel-collapse collapse">
                                  <?php
                                  $Impresion_Diagnostica = explode(" || ", $queryResultInsertHistoria->Impresion_Diagnostica);
                                  ?>
                                  <div class="box-body">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <label for="impresionDiagnostica">Impresión Diagnóstica</label>
                                        <input type="text" name="impresionDiagnostica" value="<?= $Impresion_Diagnostica[0] ?>" id="impresionDiagnostica" class="form-control input-lg">
                                      </div>

                                      <div class="col-md-6">
                                        <label for="recomendacionesLaborales">Recomendaciones Laborales</label>
                                        <input type="text" name="recomendacionesLaborales" value="<?= $Impresion_Diagnostica[1] ?>" id="recomendacionesLaborales" class="form-control input-lg">
                                      </div>

                                      <div class="col-md-6" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Remisión a EPS</label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="remisionEPS" class="form-control" type="radio" <?= ($Impresion_Diagnostica[2] ? ($Impresion_Diagnostica[2] == "1" ? 'checked="true"' : '') : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Si</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="remisionEPS" class="form-control" type="radio" <?= ($Impresion_Diagnostica[2] ? ($Impresion_Diagnostica[2] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> value="0" defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-6" style="display:flex; align-items: center; padding-top: 30px;">
                                        <label for="" style="margin-right: 10px;">Finalidad de la Consulta </label>
                                        <div class="dlk-radio btn-group">
                                          <label class="btn btn-default btn-sm">
                                            <input name="finalidadConsulta" class="form-control" type="radio" <?= ($Impresion_Diagnostica[3] ? ($Impresion_Diagnostica[3] == "1" ? 'checked="true"' : '') : '') ?> value="1">
                                            <i class="fa fa-check glyphicon glyphicon-ok text-success"></i> <span class="text-success">Aplica</span>
                                          </label>
                                          <label class="btn btn-default btn-sm">
                                            <input name="finalidadConsulta" class="form-control" type="radio" value="0" <?= ($Impresion_Diagnostica[3] ? ($Impresion_Diagnostica[3] == "0" ? 'checked="true"' : '') : 'checked="true"') ?> defaultchecked="checked">
                                            <i class="fa fa-times glyphicon glyphicon-remove text-danger"></i> <span class="text-danger">No Aplica</span>
                                          </label>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <br>
                                        <label for="causaExterna">Causa externa</label>
                                        <textarea name="causaExterna" id="causaExterna" class="form-control input-lg" style="width: 100%;"><?= ($Impresion_Diagnostica[4] == "" ? 'Otra' : ($Impresion_Diagnostica[4])); ?></textarea>
                                        <br>
                                      </div>

                                      <div class="col-md-12">
                                        <?php
                                        $recomendaciones_lista = explode(" || ", $queryResultInsertHistoria->recomendaciones_lista);
                                        $recomendaciones_lista[0] = explode(" - ", $recomendaciones_lista[0]);
                                        $recomendaciones_lista[1] = explode(" - ", $recomendaciones_lista[1]);
                                        $recomendaciones_lista[2] = explode(" - ", $recomendaciones_lista[2]);
                                        ?>
                                        <div class="col-md-4">
                                          <label>Diagnóstico Relacionado 1 </label>
                                          <br>
                                          <input type="text" id="clienteId" name="cieCod1" onChange="verlista();" value="<?= ($recomendaciones_lista[0][0] ? ($recomendaciones_lista[0][0]) : '') ?>" class="form-control input-lg" placeholder="Buscar CIE10">
                                          <input type="hidden" id="name1" value="name1">
                                          <br>
                                        </div>
                                        <div id="div-results1" class="col-md-8"></div>
                                        <br>
                                      </div>
                                      <br><br>
                                      <div class="col-md-12">
                                        <div class="col-md-4">
                                          <label>Diagnóstico Relacionado 2 </label>
                                          <br>
                                          <input type="text" id="clienteId2" name="cieCod2" onChange="verlista(2);" value="<?= ($recomendaciones_lista[1][0] ? ($recomendaciones_lista[1][0]) : '') ?>" class="form-control input-lg" placeholder="Buscar CIE10">
                                          <input type="hidden" id="name12" value="name12">
                                          <br>
                                        </div>
                                        <div id="div-results12" class="col-md-8"></div>
                                        <br>
                                      </div>
                                      <br><br>
                                      <div class="col-md-12">
                                        <div class="col-md-4">
                                          <label>Diagnóstico Relacionado 3 </label>
                                          <br>
                                          <input type="text" id="clienteId3" name="cieCod3" onChange="verlista(3);" value="<?= ($recomendaciones_lista[2][0] ? ($recomendaciones_lista[2][0]) : '') ?>" class="form-control input-lg" placeholder="Buscar CIE10">
                                          <input type="hidden" id="name13" value="name13">
                                          <br>
                                        </div>
                                        <div id="div-results13" class="col-md-8"></div>
                                        <br>
                                      </div>
                                      <br><br>

                                      <div class="form-group col-md-12">
                                        <label>Tipo de Diagnóstico</label>
                                        <textarea placeholder="" name="tipoDiagnostico" style="border-radius: 5px; width:100%; height: 121px;" class="form-control" rows="1"><?= ($recomendaciones_lista[3] ? $recomendaciones_lista[3] : 'IMPRESIÓN DIAGNÓSTICA') ?></textarea>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                                      </div>
                                <!-- cierre de lista -->

                              <!-- ======================================================================================================== -->
                                <!-- inicio de lista -->
                            <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                <div class="box-header with-border">
                                  <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseObjetivosTerapiaOcupacional">
                                      Objetivos Terapia Ocupacional
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapseObjetivosTerapiaOcupacional" class="panel-collapse collapse">
                                  <div class="box-body">
                                    <div class="row">
                                    <style type="text/css">
                                      .tg  {border-collapse:collapse;border-spacing:0;}
                                      .tg td{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                                        overflow:hidden;padding:10px 5px;word-break:normal;}
                                      .tg th{border-color:black;border-style:solid;border-width:1px;font-family:Arial, sans-serif;font-size:14px;
                                        font-weight:normal;overflow:hidden;padding:10px 5px;word-break:normal;}
                                      .tg .tg-0lax{text-align:left;vertical-align:top}
                                      </style>
                                      <table class="table">
                                      <thead>
                                        <tr>
                                          <th class="tg-0lax">OBJETIVO</th>
                                          <th class="tg-0lax">RANGO DE CALIFICACION</th>
                                          <th class="tg-0lax">DESCRIPCION DEL RANGO</th>
                                          <th class="tg-0lax">ESTADO INICIAL DEL PACIENTE</th>
                                          <th class="tg-0lax">OBJETIVO</th>
                                          <th class="tg-0lax">RESULTADO</th>
                                          <th class="tg-0lax">%DE CUMPLIMIENTO</th>
                                        </tr>
                                      </thead>

                                      <!-- ============== CONVENCIONES =========================
                                        DC = DESCRIPCION DEL RANGO
                                        EIP = ESTADO INICAL DEL PACIENTE
                                        OBJ = OBJETIVO
                                        RES = RESULTADO
                                        P = PORCENTAJE DE COMPLIMIENTO
                                       ============== CONVENCIONES ========================= -->
                                        <?php 
                                           $idOcupacional = $querySelect->idHistoria;
                                           include 'includeDatosObjetivosTerapiaOcupacional.php';
                                        ?>


                                      <tbody>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">COMPONENTE SENSORIOMOTOR</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Integracion Sensorial</td>
                                          <td class="tg-0lax" rowspan="3"><br><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_IntegracionSensorial" value="<?php echo $DC_IntegracionSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_IntegracionSensorial" value="<?php echo $EIP_IntegracionSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_IntegracionSensorial" value="<?php echo $OBJ_IntegracionSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_IntegracionSensorial" value="<?php echo $RES_IntegracionSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_IntegracionSensorial" value="<?php echo $P_IntegracionSensorial ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Porcesamiento sensorial: propiocepcion</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_PorcesamientoSensorial" value="<?php echo $DC_PorcesamientoSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_PorcesamientoSensorial" value="<?php echo $EIP_PorcesamientoSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_PorcesamientoSensorial" value="<?php echo $OBJ_PorcesamientoSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_PorcesamientoSensorial" value="<?php echo $RES_PorcesamientoSensorial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_PorcesamientoSensorial" value="<?php echo $P_PorcesamientoSensorial ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Destrezas perceptuales: esquema corporal, discriminacion derecha e izquierda, figura, fondo, constancia de la forma, grafestecia</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_DestrezasPerceptuales" value="<?php echo $DC_DestrezasPerceptuales ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_DestrezasPerceptuales" value="<?php echo $EIP_DestrezasPerceptuales ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_DestrezasPerceptuales" value="<?php echo $OBJ_DestrezasPerceptuales ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_DestrezasPerceptuales" value="<?php echo $RES_DestrezasPerceptuales ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_DestrezasPerceptuales" value="<?php echo $P_DestrezasPerceptuales ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">NEUROMUSCULAR</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" rowspan="2">Control postural en todas las posiciones de desarrollo motor reflejos</td>
                                          <td class="tg-0lax">Asume - No asume</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_ControlPostural" value="<?php echo $DC_ControlPostural ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_ControlPostural" value="<?php echo $EIP_ControlPostural ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_ControlPostural" value="<?php echo $OBJ_ControlPostural ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_ControlPostural" value="<?php echo $RES_ControlPostural ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_ControlPostural" value="<?php echo $P_ControlPostural ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Integrados - No integrados</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_ControlPostural2" value="<?php echo $DC_ControlPostural2 ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_ControlPostural2" value="<?php echo $EIP_ControlPostural2 ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_ControlPostural2" value="<?php echo $OBJ_ControlPostural2 ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_ControlPostural2" value="<?php echo $RES_ControlPostural2 ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_ControlPostural2" value="<?php echo $P_ControlPostural2 ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">MOTOR</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Habilidades motoras gruesas: control cefálico, rolado, sedente, cuadrupedo</td>
                                          <td class="tg-0lax" rowspan="8"><br><br><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_HabilidadesMotoras" value="<?php echo $DC_HabilidadesMotoras ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_HabilidadesMotoras" value="<?php echo $EIP_HabilidadesMotoras ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_HabilidadesMotoras" value="<?php echo $OBJ_HabilidadesMotoras ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_HabilidadesMotoras" value="<?php echo $RES_HabilidadesMotoras ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_HabilidadesMotoras" value="<?php echo $P_HabilidadesMotoras ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Bipedo</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_Bipedo" value="<?php echo $DC_Bipedo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_Bipedo" value="<?php echo $EIP_Bipedo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_Bipedo" value="<?php echo $OBJ_Bipedo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_Bipedo" value="<?php echo $RES_Bipedo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_Bipedo" value="<?php echo $P_Bipedo ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Habilidades motoras finas: patrones integrales</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_HabilidadesMotorasFinas" value="<?php echo $DC_HabilidadesMotorasFinas ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_HabilidadesMotorasFinas" value="<?php echo $EIP_HabilidadesMotorasFinas ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_HabilidadesMotorasFinas" value="<?php echo $OBJ_HabilidadesMotorasFinas ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_HabilidadesMotorasFinas" value="<?php echo $RES_HabilidadesMotorasFinas ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_HabilidadesMotorasFinas" value="<?php echo $P_HabilidadesMotorasFinas ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Lateralidad, cruce linea media, ordenes cruzadas</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_LateralidadCruce" value="<?php echo $DC_LateralidadCruce ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_LateralidadCruce" value="<?php echo $EIP_LateralidadCruce ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_LateralidadCruce" value="<?php echo $OBJ_LateralidadCruce ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_LateralidadCruce" value="<?php echo $RES_LateralidadCruce ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_LateralidadCruce" value="<?php echo $P_LateralidadCruce ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Coordinacion Visomotriz</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_CoordinacionVisomotriz" value="<?php echo $DC_CoordinacionVisomotriz ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_CoordinacionVisomotriz" value="<?php echo $EIP_CoordinacionVisomotriz ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_CoordinacionVisomotriz" value="<?php echo $OBJ_CoordinacionVisomotriz ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_CoordinacionVisomotriz" value="<?php echo $RES_CoordinacionVisomotriz ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_CoordinacionVisomotriz" value="<?php echo $P_CoordinacionVisomotriz ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Integracion Bilateral</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_IntegracionBilateral" value="<?php echo $DC_IntegracionBilateral ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_IntegracionBilateral" value="<?php echo $EIP_IntegracionBilateral ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_IntegracionBilateral" value="<?php echo $OBJ_IntegracionBilateral ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_IntegracionBilateral" value="<?php echo $RES_IntegracionBilateral ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_IntegracionBilateral" value="<?php echo $P_IntegracionBilateral ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Tolerancia al periodo y tiempo de actividad</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_ToleraciaPT" value="<?php echo $DC_ToleraciaPT ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_ToleraciaPT" value="<?php echo $EIP_ToleraciaPT ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_ToleraciaPT" value="<?php echo $OBJ_ToleraciaPT ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_ToleraciaPT" value="<?php echo $RES_ToleraciaPT ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_ToleraciaPT" value="<?php echo $P_ToleraciaPT ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Praxias</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_Praxias" value="<?php echo $DC_Praxias ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_Praxias" value="<?php echo $EIP_Praxias ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_Praxias" value="<?php echo $OBJ_Praxias ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_Praxias" value="<?php echo $RES_Praxias ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_Praxias" value="<?php echo $P_Praxias ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">COMPONENTE COGNITIVO</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Atencion, concentracion, observacion, memoria, resolucion de problemas analisis y sintesis</td>
                                          <td class="tg-0lax"><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%</td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_ComponenteCognitivo" value="<?php echo $DC_ComponenteCognitivo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_ComponenteCognitivo" value="<?php echo $EIP_ComponenteCognitivo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_ComponenteCognitivo" value="<?php echo $OBJ_ComponenteCognitivo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_ComponenteCognitivo" value="<?php echo $RES_ComponenteCognitivo ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_ComponenteCognitivo" value="<?php echo $P_ComponenteCognitivo ?>"></td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">COMPONENTE PSICOSOCIAL</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Manejo de si mismo, roles, manejo del tiempo, autocontrol y conducta</td>
                                          <td class="tg-0lax"><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%/td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="DC_ComponentePsicosocial" value="<?php echo $DC_ComponentePsicosocial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="EIP_ComponentePsicosocial" value="<?php echo $EIP_ComponentePsicosocial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="OBJ_ComponentePsicosocial" value="<?php echo $OBJ_ComponentePsicosocial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="RES_ComponentePsicosocial" value="<?php echo $RES_ComponentePsicosocial ?>"></td>
                                          <td class="tg-0lax"><input type="text" class="form-control" name="P_ComponentePsicosocial" value="<?php echo $P_ComponentePsicosocial ?>"></td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    </div>
                                  </div>
                                </div>
                              </div>
                                <!-- cierre de lista -->
                                <!-- ======================================================================================================== -->







                                <!-- ======================================================================================================== -->
                                <!-- inicio de lista -->
                            <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                <div class="box-header with-border">
                                  <h4 class="box-title">
                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapsePlanTratamiento">
                                      Plan de tratamiento
                                    </a>
                                  </h4>
                                </div>
                                <div id="collapsePlanTratamiento" class="panel-collapse collapse">
                                  <div class="box-body">
                                    <div class="row">
                                      <label>Plan de tratamiento</label>
                                      <textarea name="SO_PlanTratamiento" id="SO_PlanTratamiento" value="<?php echo $queryResultInsertHistoria->SO_PlanTratamiento ?>" class="form-control"></textarea>
                                    </div>
                                  </div>
                                </div>
                                      </div>
                                <!-- cierre de lista -->
                                <!-- ======================================================================================================== -->



                                <div class="form-group col-md-12">
                                  <label>Ya Terminé <input type="checkbox" value="" required=""></label>
                                </div>



                                <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
                                <input type="hidden" name="email" value="<?= $correo_cliente; ?>">
                                <input type="hidden" name="nombre" value="<?= $nombre_cliente; ?>">
                                <input type="hidden" name="telefono" value="<?= $telefono_cliente; ?>">
                                <input type="hidden" name="ID" value="<?= $_SESSION['ID'] ?>">
                                <input type="hidden" name="clienteId" value="<?= $clienteId ?>">
                                <input type="hidden" name="operador" value="<?= $_SESSION['username'] ?>">



                                <div align="center">

                                  <div class="col-sm-12">

                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h2> <strong> G u a r d a r </strong> </h2>
                                      </button></center>

                                  </div>
                                </div>
                                <input type="hidden" name="tipo_cliente" valur="1">



              </div>
              <!-- Accordion -->

            </div>
            <!-- box body fin-->

                              

                                
            </form>
          </div>
        </div>
        <!-- /.row -->
  </section>
  <!-- /.content -->
</div>

<?php include("footer.php") ?>
<?php include "./modalOpciones.php"; ?>
<script type="text/javascript">
  function checkCount() {
    let check = document.querySelectorAll(".chechComprobar");
    let acumulador = 0;
    check.forEach(element => {
      if ($(element).is(':checked')) {
        acumulador++;
      }
    });
    $("#countCheked").val(acumulador);
  }
  // window.addEventListener('load', () => {
  //   var arrayIndice = [
  //     "input[type='text']",
  //     "input[type='number']",
  //     "input[type='checkbox']",
  //     "select",
  //   ];
  //   var acum = 0;
  //   do {
  //     var prueba = document.querySelectorAll(arrayIndice[acum]);
  //     var i = 0;
  //     while (i < prueba.length) {
  //       $(prueba[i]).before("<i class='fa fa-trash "+$(prueba[i]).attr('name')+"'></i>");
  //       var coordenadas = $("."+$(prueba[i]).attr('name')).position();
  //       console.log("Y: " + coordenadas.top + " X: " + coordenadas.left);
  //       $("."+$(prueba[i]).attr('name')).css({
  //         'display':'block',
  //         'color':'red',
  //         'position':'absolute',
  //         'left':coordenadas.left+"px",
  //         'top':coordenadas.top+"px"
  //       });
  //       i++;
  //     }
  //     acum++;
  //   } while (acum < arrayIndice.length);

  //   console.log($("#countCheked").val());
  //   checkCount();
  //   console.log($("#countCheked").val());
  // });

  function verDia() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidad.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id
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

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidadHora.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-resultsHora').html(response);

      }
    });
  };


  function calcularimc() {
    m1 = document.getElementById("peso").value;
    m2 = document.getElementById("altura").value;

    r1 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc").value = r1.toFixed(2);

    if (r1.toFixed(2) < 16)
      ComposicionCorporal = 'Infrapeso: Delgadez Severa';
    else if (r1.toFixed(2) > 16 & r1.toFixed(2) < 16.99)
      ComposicionCorporal = 'Infrapeso: Delgadez moderada';
    else if (r1.toFixed(2) > 17 & r1.toFixed(2) < 18.49)
      ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
    else if (r1.toFixed(2) > 18.50 & r1.toFixed(2) < 24.99)
      ComposicionCorporal = 'Peso Normal';

    else if (r1.toFixed(2) > 25.00 & r1.toFixed(2) < 29.99)
      ComposicionCorporal = 'Sobrepeso';

    else if (r1.toFixed(2) > 30.00 & r1.toFixed(2) < 34.99)
      ComposicionCorporal = 'Obeso: Tipo I';

    else if (r1.toFixed(2) > 35.00 & r1.toFixed(2) < 40)
      ComposicionCorporal = 'Obeso: Tipo II';

    else if (r1.toFixed(2) > 40.00)
      ComposicionCorporal = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal").value = ComposicionCorporal;

  }

  function calcularimc1() {
    m1 = document.getElementById("peso1").value;
    m2 = document.getElementById("altura1").value;

    r1 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc1").value = r1.toFixed(2);

    if (r1.toFixed(2) < 16)
      ComposicionCorporal1 = 'Infrapeso: Delgadez Severa';
    else if (r1.toFixed(2) > 16 & r1.toFixed(2) < 16.99)
      ComposicionCorporal1 = 'Infrapeso: Delgadez moderada';
    else if (r1.toFixed(2) > 17 & r1.toFixed(2) < 18.49)
      ComposicionCorporal1 = 'Infrapeso: Delgadez aceptable';
    else if (r1.toFixed(2) > 18.50 & r1.toFixed(2) < 24.99)
      ComposicionCorporal1 = 'Peso Normal';

    else if (r1.toFixed(2) > 25.00 & r1.toFixed(2) < 29.99)
      ComposicionCorporal1 = 'Sobrepeso';

    else if (r1.toFixed(2) > 30.00 & r1.toFixed(2) < 34.99)
      ComposicionCorporal1 = 'Obeso: Tipo I';

    else if (r1.toFixed(2) > 35.00 & r1.toFixed(2) < 40)
      ComposicionCorporal1 = 'Obeso: Tipo II';

    else if (r1.toFixed(2) > 40.00)
      ComposicionCorporal1 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal1").value = ComposicionCorporal1;

  }

  function calcularimc2() {
    m1 = document.getElementById("peso2").value;
    m2 = document.getElementById("altura2").value;

    r2 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc2").value = r2.toFixed(2);

    if (r2.toFixed(2) < 16)
      ComposicionCorporal2 = 'Infrapeso: Delgadez Severa';
    else if (r2.toFixed(2) > 16 & r2.toFixed(2) < 16.99)
      ComposicionCorporal2 = 'Infrapeso: Delgadez moderada';
    else if (r2.toFixed(2) > 17 & r2.toFixed(2) < 18.49)
      ComposicionCorporal2 = 'Infrapeso: Delgadez aceptable';
    else if (r2.toFixed(2) > 18.50 & r2.toFixed(2) < 24.99)
      ComposicionCorporal2 = 'Peso Normal';

    else if (r2.toFixed(2) > 25.00 & r2.toFixed(2) < 29.99)
      ComposicionCorporal2 = 'Sobrepeso';

    else if (r2.toFixed(2) > 30.00 & r2.toFixed(2) < 34.99)
      ComposicionCorporal2 = 'Obeso: Tipo I';

    else if (r2.toFixed(2) > 35.00 & r2.toFixed(2) < 40)
      ComposicionCorporal2 = 'Obeso: Tipo II';

    else if (r2.toFixed(2) > 40.00)
      ComposicionCorporal2 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal2").value = ComposicionCorporal2;

  }


  function calcularimc3() {
    m1 = document.getElementById("peso3").value;
    m2 = document.getElementById("altura3").value;

    r3 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc3").value = r3.toFixed(2);

    if (r3.toFixed(2) < 16)
      ComposicionCorporal3 = 'Infrapeso: Delgadez Severa';
    else if (r3.toFixed(2) > 16 & r3.toFixed(2) < 16.99)
      ComposicionCorporal3 = 'Infrapeso: Delgadez moderada';
    else if (r3.toFixed(2) > 17 & r3.toFixed(2) < 18.49)
      ComposicionCorporal3 = 'Infrapeso: Delgadez aceptable';
    else if (r3.toFixed(2) > 18.50 & r3.toFixed(2) < 24.99)
      ComposicionCorporal3 = 'Peso Normal';

    else if (r3.toFixed(2) > 25.00 & r3.toFixed(2) < 29.99)
      ComposicionCorporal3 = 'Sobrepeso';

    else if (r3.toFixed(2) > 30.00 & r3.toFixed(2) < 34.99)
      ComposicionCorporal3 = 'Obeso: Tipo I';

    else if (r3.toFixed(2) > 35.00 & r3.toFixed(2) < 40)
      ComposicionCorporal3 = 'Obeso: Tipo II';

    else if (r3.toFixed(2) > 40.00)
      ComposicionCorporal3 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal3").value = ComposicionCorporal3;

  }


  function calcularimc4() {
    m1 = document.getElementById("peso4").value;
    m2 = document.getElementById("altura4").value;

    r4 = m1 / ((m2 / 100) * (m2 / 100));

    document.getElementById("imc4").value = r4.toFixed(2);

    if (r4.toFixed(2) < 16)
      ComposicionCorporal4 = 'Infrapeso: Delgadez Severa';
    else if (r4.toFixed(2) > 16 & r4.toFixed(2) < 16.99)
      ComposicionCorporal4 = 'Infrapeso: Delgadez moderada';
    else if (r4.toFixed(2) > 17 & r4.toFixed(2) < 18.49)
      ComposicionCorporal4 = 'Infrapeso: Delgadez aceptable';
    else if (r4.toFixed(2) > 18.50 & r4.toFixed(2) < 24.99)
      ComposicionCorporal4 = 'Peso Normal';

    else if (r4.toFixed(2) > 25.00 & r4.toFixed(2) < 29.99)
      ComposicionCorporal4 = 'Sobrepeso';

    else if (r4.toFixed(2) > 30.00 & r4.toFixed(2) < 34.99)
      ComposicionCorporal4 = 'Obeso: Tipo I';

    else if (r4.toFixed(2) > 35.00 & r4.toFixed(2) < 40)
      ComposicionCorporal4 = 'Obeso: Tipo II';

    else if (r4.toFixed(2) > 40.00)
      ComposicionCorporal4 = 'Obeso: Tipo III';

    document.getElementById("ComposicionCorporal4").value = ComposicionCorporal4;

  }

  function verlista(e = '') {
    var clienteId = $("#clienteId" + (e == '' ? '' : e)).val();
    var name = $("#name1" + (e == '' ? '' : e)).val();
    // console.log(name);
    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results1' + (e == '' ? '' : e)).html(response);
      }
    });
  };

  <?php if ($recomendaciones_lista[0][0]) : ?>
    verlista();
  <?php endif; ?>
  <?php if ($recomendaciones_lista[1][0]) : ?>
    verlista(2);
  <?php endif; ?>
  <?php if ($recomendaciones_lista[2][0]) : ?>
    verlista(3);
  <?php endif; ?>

  function verlista2() {

    var clienteId = $("#clienteId2").val();
    var name = $("#name2").val();



    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results2').html(response);

      }
    });
  };


  function verlista3() {

    var clienteId = $("#clienteId3").val();
    var name = $("#name3").val();



    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results3').html(response);

      }
    });
  };


  function verlista4() {

    var clienteId = $("#clienteId4").val();
    var name = $("#name4").val();



    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results4').html(response);

      }
    });
  };


  function verlista5() {

    var clienteId = $("#clienteId5").val();
    var name = $("#name5").val();



    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results5').html(response);

      }
    });
  };

  function verlista6() {

    var clienteId = $("#clienteId6").val();
    var name = $("#name6").val();



    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results6').html(response);

      }
    });
  };

  function verlista7() {

    var clienteId = $("#clienteId7").val();
    var name = $("#name7").val();



    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results7').html(response);

      }
    });
  };
</script>

<script>
  function Tipo_Documento(value) {
    var padre = document.getElementById("otro_documento");


    if (value == "Otro") {

      //aquí agregamos el componente de tipo input
      var x = document.createElement("INPUT");
      //aquí indicamos que es un input de tipo text
      x.setAttribute("type", "text");
      x.setAttribute("id", "Cargar_Documento");
      x.setAttribute("maxLength", "50");
      x.setAttribute("class", "form-control input-lg");
      x.setAttribute("onChange", "Agregar_Documento(this.value)");
      x.setAttribute("placeholder", "Ingrese otra opcion");

      padre.appendChild(x);

      var y = document.getElementById("remiconsult").options;

      y.remove(13);
    } else {

    }

  }

  function Agregar_Documento(value) {
    var padre = document.getElementById("otro_documento");

    var y = document.getElementById("remiconsult").options;

    var x = document.createElement("OPTION");
    x.setAttribute("value", value);
    var t = document.createTextNode(value);
    x.setAttribute("selected", "selected");
    x.appendChild(t);
    document.getElementById("remiconsult").appendChild(x);



  }

  function formato_alturas(value) {
    if (value == "Aplica") {
      document.getElementById("formato_alturas").style.display = "block";
    } else {
      document.getElementById("formato_alturas").style.display = "none";
    }
  }
</script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  //se quita el caracter - por que como crearon la historia al continuar la historia/editar esta quedo guardada con separaciones de - por lo que para evitar errores se quita el - 
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>