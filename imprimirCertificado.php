<?php
date_default_timezone_set('America/Bogota');

include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

if ($_GET['historiaClinica1']) {
  $historiaClinica1 = $_GET['historiaClinica1'];
} else {
  $historiaClinica1 = $_POST['historiaClinica2'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  historiaclinica6_labora where ID = $historiaClinica1");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $motivoConsulta      = $rowMotorizado['motivoConsulta'];
    $cliente_id      = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    $Fecha           = $rowMotorizado['Fecha'];
    $Hora            = $rowMotorizado['Hora'];
    $rDCargo            = $rowMotorizado['rDCargo'];
    $rRevisionSistemas            = explode("&nbsp;|/&nbsp;", $rowMotorizado['rRevisionSistemas']);
    $rFtmii             = $rowMotorizado['rFtmii'];
    $rAntecedentespp            = $rowMotorizado['rAntecedentespp'];
    $rCheckBox            = $rowMotorizado['rCheckBox'];
    $Entidad_Salud      = $rowMotorizado['Entidad_Salud'];
    $rAntecedentes            = explode(" || ", $rowMotorizado['rAntecedentes']);
    $rAntecedentes2            = explode(" || ", $rowMotorizado['rAntecedentes2']);
    $rAntecedentes3            = explode(" || ", $rowMotorizado['rAntecedentes3']);
    $rEnfermedadactual            = explode(" || ", $rowMotorizado['rEnfermedadactual']);
    $rAntecedentesgo            = $rowMotorizado['rAntecedentesgo'];
    $rInformacionGL            = $rowMotorizado['rInformacionGL'];
    $rTratamiento            = $rowMotorizado['rTratamiento'];
    $rHabitos            = $rowMotorizado['rHabitos'];
    $rInmuniza            = $rowMotorizado['rInmuniza'];
    $rValoracion            = $rowMotorizado['rValoracion'];
    $rPruebasC            = $rowMotorizado['rPruebasC'];
    $rAPF               = $rowMotorizado['rAPF'];
    $rempresa           = $rowMotorizado['empresa'];
    $rnit               = $rowMotorizado['nit'];
    $ractividad           = $rowMotorizado['actividad'];
    $eps                = $rowMotorizado['eps'];
    $arl                = $rowMotorizado['arl'];
    $fondo              = $rowMotorizado['fondo'];
    $Apto_Recomendaciones = $rowMotorizado['Apto_Recomendaciones'];
    $Continuar_Labor = $rowMotorizado['Continuar_Labor'];
    $Continuar_Recomendaciones = $rowMotorizado['Continuar_Recomendaciones'];
    $Retiro_Sin_Patologia = $rowMotorizado['Retiro_Sin_Patologia'];
    $Retiro_Con_Patologia = $rowMotorizado['Retiro_Con_Patologia'];
    $tipo    = $rowMotorizado['tipo'];
    $rTheEnd     = $rowMotorizado['rValoracion'];
    $rInformacion     = $rowMotorizado['rInformacion'];
    $rAntecedentesvacunacion     = $rowMotorizado['rAntecedentesvacunacion'];
    $rAntecedentesGineco     = explode(' || ', $rowMotorizado['rAntecedentesGineco']);
    $accidentesLaborales     = $rowMotorizado['accidentesLaborales'];
    $consentimiento     = $rowMotorizado['consentimiento'];
    $revisionsiste     = $rowMotorizado['revisionsiste'];
    $Reusltado_paraclinicos     = $rowMotorizado['Reusltado_paraclinicos'];
    $Impresion_Diagnostica     = explode(" || ", $rowMotorizado['Impresion_Diagnostica']);
    $comentarios_examen     = $rowMotorizado['comentarios_examen'];
    $Examen     = explode(' || ', $rowMotorizado['Examen']);
    // list($antecedenteContent1, $antecedenteContent2, $antecedenteContent3) = explode(' || ', $rowMotorizado['antecedenteContent']);
    $antecedenteContent = explode(' || ', $rowMotorizado['antecedenteContent']);
    $riesgoContent = explode(" || ", $rowMotorizado['riesgoContent']);
    // $riesgoContent = explode(" ,", $riesgoContent);
    $osteomuscular_columna = $rowMotorizado['osteomuscular_columna'];
    $osteomuscular_mcervical = $rowMotorizado['osteomuscular_mcervical'];
    $osteomuscular_mlumbar = $rowMotorizado['osteomuscular_mlumbar'];
    $osteomuscular_marcha = $rowMotorizado['osteomuscular_marcha'];
    $osteomuscular_msuperiores = $rowMotorizado['osteomuscular_msuperiores'];
    $osteomuscular_codos = $rowMotorizado['osteomuscular_codos'];
    $osteomuscular_manos = $rowMotorizado['osteomuscular_manos'];
    $osteomuscular_caderas = $rowMotorizado['osteomuscular_caderas'];
    $osteomuscular_rodilla = $rowMotorizado['osteomuscular_rodilla'];
    $osteomuscular_tobillo = $rowMotorizado['osteomuscular_tobillo'];
    $osteomuscular_osteotendinosos = $rowMotorizado['osteomuscular_osteotendinosos'];
    $osteomuscular_fuerza = $rowMotorizado['osteomuscular_fuerza'];
    $osteomuscular_resultado = $rowMotorizado['osteomuscular_resultado'];
    $f_altura_antecedentes = $rowMotorizado['f_altura_antecedentes'];
    $f_altura_vertigo = $rowMotorizado['f_altura_vertigo'];
    $f_altura_perdida_equilibrio = $rowMotorizado['f_altura_perdida_equilibrio'];
    $f_altura_examen_fisico = $rowMotorizado['f_altura_examen_fisico'];
    $recomendaciones_patologicas = $rowMotorizado['recomendaciones_patologicas'];
    $recomendaciones_lista = explode(" || ", $rowMotorizado['recomendaciones_lista']);
    $Visiometria = $rowMotorizado['Visiometria'];
    $Audiometria = $rowMotorizado['Audiometria'];
    $Espirometria = $rowMotorizado['Espirometria'];
    $Optometria = $rowMotorizado['Optometria'];
    $Electrocardiogrma = $rowMotorizado['Electrocardiogrma'];
    $Psicofisico = $rowMotorizado['Psicofisico'];
    $Psicometrico = $rowMotorizado['Psicometrico'];
    $Radiografia = $rowMotorizado['Radiografia'];
  
    $Antecedentes_Clinicos = $rowMotorizado['Antecedentes_Clinicos'];
    $SO_PlanTratamiento = $rowMotorizado['SO_PlanTratamiento'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  examenFisico where historia_id = $historiaClinica1");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $peso     = $rowMotorizado['peso'];
  $altura    = $rowMotorizado['altura'];
  $imc         = $rowMotorizado['imc'];
  $ComposicionCorporal  = $rowMotorizado['ComposicionCorporal'];

  $eg          = $rowMotorizado['estadoGeneral'];
  $conciencia  = $rowMotorizado['estadoConciencia'];
  $ojos    = $rowMotorizado['ojos'];
  $ostocopia    = $rowMotorizado['otoscopia'];
  $cavidad           = $rowMotorizado['cavidadOral'];
  $cuello         = $rowMotorizado['cuello'];
  $torax   = $rowMotorizado['torax'];
  $corazo   = $rowMotorizado['corazon'];
  $abdomen        = $rowMotorizado['abdomen'];
  $urinario = $rowMotorizado['genitoUrinario'];
  $extremidades  = $rowMotorizado['extremidades'];
  $nervioso     = $rowMotorizado['sistemaNervioso'];
  $piel  = $rowMotorizado['pielAnexos'];
  $vacularPeriferico    = $rowMotorizado['vacularPeriferico '];
  $partes        = $rowMotorizado['examenPartesdCuerpo'];

  $tart         = $rowMotorizado['tart'];
  $tc  = $rowMotorizado['temperatura'];
  $card   = explode(" || ", $rowMotorizado['fcard']);
  $sat  = $rowMotorizado['sat'];

  $vacularPeriferico    = $rowMotorizado['vacularPeriferico'];
  $observacion    = $rowMotorizado['observacion'];
}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  $nombreF      = $rowMotorizado['nombreF'];
  $telefonoF    = $rowMotorizado['telefonoF'];
  $direccionF   = $rowMotorizado['direccionF'];
  $emailF       = $rowMotorizado['emailF'];
  $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
  $licenciaF    = $rowMotorizado['licenciaF'];
  $pieF         = $rowMotorizado['pieF'];
  $header       = $rowMotorizado['header'];

  $LogoF        = $rowMotorizado['logoF'];
  $firma        = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 3.5cm;width: auto;'>";
  }

  if (strlen($firma) > 0) {
    $firmaImg = '<img src="'.$Base.'/FirmasReg/' . $firma . '" height="100" width="100">';
  }
  // Nuevos campos 
}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['NOMBRE_USUARIO'];
    $especialidad     = $rowMotorizado['especialidad'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
    $registro_medico    = $rowMotorizado['registro_medico'];
    $NOMBRE_USUARIO    = $rowMotorizado['NOMBRE_USUARIO'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
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

  if($fotoperfil <> ""){
    $fotoperfil = "pascientes/".$fotoperfil;
  }

  $entidadSalud = funcionMaster($rowMotorizado['entidad_id'],'id','Nombre','Rips_Entidades');
}
}



$queryList = mysqli_query($conn3, "SELECT * FROM v_clienteE where id= $entidadSalud");


// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
  while ($row_recordset32A = mysqli_fetch_array($queryList)) {

    $nombre = $row_recordset32A['nombre'];
  }
}




?>


<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="../css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="../css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="../css/Impresion/bootstrap-print.css" media="print">
    <style>

@media print and (color) {
   * {
      -webkit-print-color-adjust: exact;
      print-color-adjust: exact;
   }

   .page-header{
    background-color:white;
   }

   .page-footer{
    background-color:white;
   }
}

    </style>
</head>

<body>

    <div class="page-header row" style="text-align: center">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()" style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer">
        <?php echo nl2br($pieF); ?>
    </div>

    <table>

        <thead>
            <tr>
                <td>
                    <!--place holder for the fixed-position header-->
                    <div class="page-header-space"></div>
                </td>
            </tr>
        </thead>

        <tbody>
            <tr>
                <td>
                    <!--*** CONTENT GOES HERE ***-->
                    <div class="page" style="width:100vw; page-break-after:initial; page-break-before: always;" >   
                    <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre del:</b> <?php echo $nombre_cliente ?> 
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?php echo $CODI_CLIENTE ?>
                                </td>

                                <td width="30%" rowspan="4" style="text-align-last: center;">
                                  <img src="<?=$Base;?><?= ($fotoperfil != '' ? $fotoperfil : 'ImagenesHistoria/SaludOcupacional.jpg') ?>" style="width:200px;">
                                </td>

                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?php echo  $fechaNacimiento ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo  CalculoEdadPaciente($fechaNacimiento); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?php echo $direccion_cliente  ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?php echo $entidadSalud  ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?php echo $celular_cliente ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?php echo $genero ?>
                                </td>
                            </tr>
                        </table>

                        <hr style="border-top: 1px solid black;opacity: 1;">
                        <h3 style="    text-align-last: center;"> Historia Clínica Ocupacional </h3>
                        <hr style="border-top: 1px solid black;opacity: 1;">




      <div class="row">
        <div class="col-md-6">
          <?php if (strlen($motivoConsulta) > 0) : ?>
            <h5><span style="font-weight: bold;">Motivo Consulta:</span><br> <?= $motivoConsulta ?> </h5>
          <?php endif; ?>
        </div>
        <div class="col-md-6">
          <?php if (count($rEnfermedadactual) > 0 && $rEnfermedadactual[0] != "") : ?>
            <h5><span style="font-weight: bold;">Enfermedad Actual:</span><br>
              <?php
              foreach ($rEnfermedadactual as $key => $value) {
                echo $value . ($key < (count($rEnfermedadactual) - 1) && $rEnfermedadactual[$key + 1] != "" ? ', ' : '');
              }
              ?>
            </h5>
          <?php endif; ?>
        </div>
        <?php
        foreach ($riesgoContent as $key => $value) {
          $riesgoContent[$key] = explode("&nbsp;|/&nbsp;", $riesgoContent[$key]);
          foreach ($riesgoContent[$key] as $key2 => $value2) {
            if ($value2 == "") {
              array_splice($riesgoContent[$key], $key2, 1);
            }
          }
        }
        // var_dump($riesgoContent);
        ?>

        <?php if ($riesgoContent[0][0] != "" || $riesgoContent[1][0] != "" || $riesgoContent[2][0] != "" || $riesgoContent[3][0] != "" || $riesgoContent[4][0] != "" || $riesgoContent[5][0] != "" || $riesgoContent[6][0] != "" || $riesgoContent[7][0] != "") : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Factores de Riesgo</h4></span>
          </div>
        <?php endif; ?>

        <?php if ($riesgoContent[0][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Físicos:<br></span>
              <?php
              // $riesgoContent
              foreach ($riesgoContent[0] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'iluminacioni':
                      $ValueFinal = 'Iluminación Insuficiente';
                      break;
                    case 'radiacion':
                      $ValueFinal = 'Radiación';
                      break;
                    case 'ruido':
                      $ValueFinal = 'Ruido';
                      break;
                    case 'altatemperatura':
                      $ValueFinal = 'Alta Temperatura';
                      break;
                    case 'bajatemperatura':
                      $ValueFinal = 'Baja Temperatura';
                      break;
                    case 'vibraciones':
                      $ValueFinal = 'Vibraciones';
                      break;
                    case 'humedad':
                      $ValueFinal = 'Humedad';
                      break;
                    default:
                    $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[0]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <?php if ($riesgoContent[1][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Químicos:<br></span>
              <?php
              foreach ($riesgoContent[1] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'gases':
                      $ValueFinal = 'Gases';
                      break;
                    case 'humos':
                      $ValueFinal = 'Humos';
                      break;
                    case 'vapores':
                      $ValueFinal = 'Vapores';
                      break;
                    case 'polvos':
                      $ValueFinal = 'Polvos';
                      break;
                    case 'liquidos':
                      $ValueFinal = 'Líquidos';
                      break;
                    case 'solidos':
                      $ValueFinal = 'Sólidos';
                      break;
                    case 'neblinaRocio':
                      $ValueFinal = 'Neblina - Rocío';
                      break;
                    default:
                    $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[1]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <?php if ($riesgoContent[2][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Ergonómicos:<br></span>
              <?php
              foreach ($riesgoContent[2] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'manejomanualcargas':
                      $ValueFinal = 'Manejo Manual de Cargas';
                      break;
                    case 'movimientorepetitivos':
                      $ValueFinal = 'Movimientos Repetitivos';
                      break;
                    case 'videoTerminal':
                      $ValueFinal = 'Video Terminal';
                      break;
                    case 'dPTrabajo':
                      $ValueFinal = 'Diseño Puesto de Trabajo';
                      break;
                    case 'herramientas':
                      $ValueFinal = 'Herramientas';
                      break;
                    default:
                    $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[2]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <!-- SEPARADOR -->

        <?php if ($riesgoContent[3][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Biológicos:<br></span>
              <?php
              // $riesgoContent
              foreach ($riesgoContent[3] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'virus':
                      $ValueFinal = 'Virus';
                      break;
                    case 'bacterias':
                      $ValueFinal = 'Bacterias';
                      break;
                    case 'hongos':
                      $ValueFinal = 'Hongos';
                      break;
                    case 'fluidosTejidos':
                      $ValueFinal = 'Fluidos o Tejidos';
                      break;
                    case 'humanos':
                      $ValueFinal = 'Humanos';
                      break;
                    default:
                        $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[3]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <?php if ($riesgoContent[4][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Psico-Laborales:<br></span>
              <?php
              foreach ($riesgoContent[4] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'contenidoTarea':
                      $ValueFinal = 'Contenido de Tarea';
                      break;
                    case 'equipoTrabajo':
                      $ValueFinal = 'Equipo de Trabajo';
                      break;
                    case 'manejoPublico':
                      $ValueFinal = 'Manejo Público';
                      break;
                    case 'gestionAdministrativa':
                      $ValueFinal = 'Gestión Administrativa';
                      break;
                    case 'orgTiempoTrab':
                      $ValueFinal = 'Org. Tiempo de Trabajo';
                      break;
                    case 'monotoniaRutina':
                      $ValueFinal = 'Monotonía/Rutina';
                      break;
                    case 'sobrecargaHoraExtras':
                      $ValueFinal = 'Sobrecarga/Horas Extras';
                      break;
                    default:
                        $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[4]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <?php if ($riesgoContent[5][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Seguridad:<br></span>
              <?php
              foreach ($riesgoContent[5] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'mecanicos':
                      $ValueFinal = 'Mecánicos';
                      break;
                    case 'electricos':
                      $ValueFinal = 'Eléctricos';
                      break;
                    case 'espaciosConf':
                      $ValueFinal = 'Los. Espacios Conf';
                      break;
                    case 'ordenPublico':
                      $ValueFinal = 'Orden Público';
                      break;
                    case 'actEsporadica':
                      $ValueFinal = 'Act. Esporádica';
                      break;
                    case 'alturas':
                      $ValueFinal = 'Alturas';
                      break;
                    case 'transitoVehicular':
                      $ValueFinal = 'Tránsito Vehicular';
                      break;
                    default:
                        $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[5]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <!-- SEPARADOR -->

        <?php if ($riesgoContent[6][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Elementos de Protección Personal:<br></span>
              <?php
              foreach ($riesgoContent[6] as $key => $value) {
                if ($value != "") {

                  switch ($value) {
                    case 'casco':
                      $ValueFinal = 'Casco';
                      break;
                    case 'monogafas':
                      $ValueFinal = 'Monogafas';
                      break;
                    case 'proteccionAuditiva':
                      $ValueFinal = 'Protección Auditiva';
                      break;
                    case 'cofia':
                      $ValueFinal = 'Cofia';
                      break;
                    case 'tapabocas':
                      $ValueFinal = 'Tapabocas';
                      break;
                    case 'arnes':
                      $ValueFinal = 'Arnés';
                      break;
                    case 'botas':
                      $ValueFinal = 'Botas';
                      break;
                    case 'guantes':
                      $ValueFinal = 'Guantes';
                      break;
                    case 'overol':
                      $ValueFinal = 'Overol';
                      break;
                    case 'peto':
                      $ValueFinal = 'Peto';
                      break;
                    case 'respirador':
                      $ValueFinal = 'Respirador';
                      break;
                    default:
                        $ValueFinal = $value;
                      break;
                  }

                  echo $ValueFinal . ($key < (count($riesgoContent[6]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <?php if ($riesgoContent[7][0] != "") : ?>
          <div class="col-md-12">
            <h5><span style="font-weight: bold;">Otros Factores de Riesgo:<br></span>
              <?php
              foreach ($riesgoContent[7] as $key => $value) {
                if ($value != "") {
                  echo $value . ($key < (count($riesgoContent[7]) - 1) ? ', ' : '');
                }
              }
              ?>
            </h5>
          </div>
        <?php endif; ?>

        <!-- SEPARADOR SECCION -->

        <?php if (count($riesgoContent[0]) > 0) : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Antecedentes Laborales</h4></span>
          </div>
        <?php endif; ?>

        <?php if ($rAntecedentes[0] != "" || $rAntecedentes[1] != "" || $rAntecedentes[2] != "") : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($rAntecedentes[0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Empresa:<br></span>
                    <?php
                    echo $rAntecedentes[0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes[1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Tiempo (A):<br></span>
                    <?php
                    echo $rAntecedentes[1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>

              <?php if ($Antecedentes_Clinicos != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Antecedentes Clinicos<br></span>
                    <?php
                    echo $Antecedentes_Clinicos;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>

              
              <?php if ($rAntecedentes[2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Tiempo (M):<br></span>
                    <?php
                    echo $rAntecedentes[2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- SEPARADOR -->

        <div class="col-md-12">
          <h5><span style="font-weight: bold;">Accidentes de Trabajo:<br></span>
            <?php
            echo ($rAntecedentes2[0] == 1 ? 'Si' : 'No');
            ?>
          </h5>
        </div>

        <?php if ($rAntecedentes2[0] == 1) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($rAntecedentes2[1] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Cuál Accidente:<br></span>
                    <?php
                    echo $rAntecedentes2[1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes2[2] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Cuál Empresa:<br></span>
                    <?php
                    echo $rAntecedentes2[2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes2[3] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Fecha del Accidente:<br></span>
                    <?php
                    echo $rAntecedentes2[3];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <!-- separador -->
              <?php if ($rAntecedentes2[4] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">ARP:<br></span>
                    <?php
                    echo $rAntecedentes2[4];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes2[5] != "") : ?>
                <div class="col-md-12">
                  <h5><span style="font-weight: bold;">Lesión del Accidente:<br></span>
                    <?php
                    echo $rAntecedentes2[5];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes2[6] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Secuela del Accidente:<br></span>
                    <?php
                    echo $rAntecedentes2[6];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>

              <!-- separador -->
              <?php if ($rAntecedentes2[7] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Días Incapacidad:<br></span>
                    <?php
                    echo $rAntecedentes2[7];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes2[8] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Limitaciones:<br></span>
                    <?php
                    echo ($rAntecedentes2[8] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes2[9] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Reubicación:<br></span>
                    <?php
                    echo ($rAntecedentes2[9] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- SEPARADOR -->

        <div class="col-md-12">
          <h5><span style="font-weight: bold;">Enfermedad Profesional:<br></span>
            <?php
            echo ($rAntecedentes3[0] == 1 ? 'Si' : 'No');
            ?>
          </h5>
        </div>

        <?php if ($rAntecedentes3[0] == 1) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($rAntecedentes3[1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Diagnóstico:<br></span>
                    <?php
                    echo $rAntecedentes3[1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentes3[2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Presuntiva/Confirmada:<br></span>
                    <?php
                    echo $rAntecedentes3[2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <!-- SEPARADOR CAMBIO -->
        <?php
        foreach ($antecedenteContent as $key => $value) {
          $antecedenteContent[$key] = explode("&nbsp;|/&nbsp;", $antecedenteContent[$key]);
          foreach ($antecedenteContent[$key] as $key2 => $value2) {
            if ($value2 == "") {
              array_splice($antecedenteContent[$key], $key2, 1);
            }
          }
        }
        ?>
        <!-- $antecedenteContent1, $antecedenteContent2, $antecedenteContent3 -->
        <?php if ($antecedenteContent[0][0] != "" || $antecedenteContent[1][0] != "" || $antecedenteContent[2][0] != "") : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Antecedentes Laborales</h4></span>
          </div>
        <?php endif; ?>

        <?php if (count($antecedenteContent[0]) > 0) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($antecedenteContent[0][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Infancia:<br></span>
                    <?php
                    echo $antecedenteContent[0][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Patológicos:<br></span>
                    <?php
                    echo $antecedenteContent[0][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Inmunológicos:<br></span>
                    <?php
                    echo $antecedenteContent[0][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][3] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Traumáticos:<br></span>
                    <?php
                    echo $antecedenteContent[0][3];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][4] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Hospitalarios:<br></span>
                    <?php
                    echo $antecedenteContent[0][4];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][5] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Quirúrgicos:<br></span>
                    <?php
                    echo $antecedenteContent[0][5];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][6] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Tóxico/Alérgicos:<br></span>
                    <?php
                    echo $antecedenteContent[0][6];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][7] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">ETS:<br></span>
                    <?php
                    echo $antecedenteContent[0][7];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][8] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Psiquiátricos:<br></span>
                    <?php
                    echo $antecedenteContent[0][8];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[0][9] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Farmacológicos:<br></span>
                    <?php
                    echo $antecedenteContent[0][9];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>

              <?php if ($antecedenteContent[1][0] != "" || $antecedenteContent[1][1] != "" || $antecedenteContent[1][2] != "") : ?>
                <div class="col-md-12 text-center">
                  <h5><span style="font-weight: bold;">Hábitos Saludables</h4></span>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[1][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Tabaquismo:<br></span>
                    <?php
                    echo $antecedenteContent[1][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[1][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Alcoholismo:<br></span>
                    <?php
                    echo $antecedenteContent[1][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($antecedenteContent[1][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Deporte/Actividad Física:<br></span>
                    <?php
                    echo $antecedenteContent[1][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>

              <?php if ($antecedenteContent[2][0] != "") : ?>
                <div class="col-md-12 text-center">
                  <h5><span style="font-weight: bold;">Familiares</h4></span>
                </div>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"></span>
                    <?php
                    echo $antecedenteContent[2][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php
        foreach ($rAntecedentesGineco as $key => $value) {
          $rAntecedentesGineco[$key] = explode("&nbsp;|/&nbsp;", $rAntecedentesGineco[$key]);
        }
        ?>
        <!-- SEPARADOR CAMBIO -->
        <?php if ($rAntecedentesGineco[0][0] != "" || $rAntecedentesGineco[1][0] != "" || $rAntecedentesGineco[2][0] != "") : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Gineco-Obstétricos</h4></span>
          </div>
        <?php endif; ?>
        <?php if (count($rAntecedentesGineco[0]) > 0) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($rAntecedentesGineco[0][0] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Menarquia<br></span>
                    <?php
                    echo $rAntecedentesGineco[0][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[0][1] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Ciclos Menstruales<br></span>
                    <?php
                    echo $rAntecedentesGineco[0][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][0] != "" || $rAntecedentesGineco[1][1] != "" || $rAntecedentesGineco[1][2] != "" || $rAntecedentesGineco[1][3] != "" || $rAntecedentesGineco[1][4] != "" || $rAntecedentesGineco[1][5] != "" || $rAntecedentesGineco[1][6] != "" || $rAntecedentesGineco[2][0] != "" || $rAntecedentesGineco[2][1] != "" || $rAntecedentesGineco[2][2] != "" || $rAntecedentesGineco[2][3] != "" || $rAntecedentesGineco[2][4] != "" || $rAntecedentesGineco[2][5] != "" || $rAntecedentesGineco[2][6] != "" || $rAntecedentesGineco[2][7] != "") : ?>
                <div class="col-md-12 text-center">
                  <h5><span style="font-weight: bold;">Fórmula Obstétrica</h4></span>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][0] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">G - Gestaciones:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][1] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">P - Paridad:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][2] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">A - Abortos:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][3] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">O - Óbitos:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][3];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][4] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">M - Mortinatos:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][4];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][5] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">C - Cesáreas:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][5];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[1][6] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">E - Ectópicos:<br></span>
                    <?php
                    echo $rAntecedentesGineco[1][6];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">FUR:<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">FUP:<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">FPP:<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][3] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Última Citología (Mes):<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][3];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][4] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">(Año):<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][4];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][5] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Resultado de la Citología:<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][5];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][6] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Planificación:<br></span>
                    <?php
                    echo ($rAntecedentesGineco[2][6] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rAntecedentesGineco[2][7] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">¿Usa Algún Anticonceptivo?:<br></span>
                    <?php
                    echo $rAntecedentesGineco[2][7];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (count($rRevisionSistemas) > 0) : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Revisión por Sistemas</h4></span>
          </div>
        <?php endif; ?>
        <?php if (count($rRevisionSistemas) > 0) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($rRevisionSistemas[0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Neurológico:<br></span>
                    <?php
                    echo ($rRevisionSistemas[0] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Sistema Visual:<br></span>
                    <?php
                    echo ($rRevisionSistemas[1] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Audición:<br></span>
                    <?php
                    echo ($rRevisionSistemas[2] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[3] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Otorrinolaringológico:<br></span>
                    <?php
                    echo ($rRevisionSistemas[3] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[4] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Cardio Pulmonar:<br></span>
                    <?php
                    echo ($rRevisionSistemas[4] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[5] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Gastro Intestinal:<br></span>
                    <?php
                    echo ($rRevisionSistemas[5] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[6] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Genito Urinario:<br></span>
                    <?php
                    echo ($rRevisionSistemas[6] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[7] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Osteomuscular:<br></span>
                    <?php
                    echo ($rRevisionSistemas[7] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[8] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Piel y Faneras:<br></span>
                    <?php
                    echo ($rRevisionSistemas[8] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[9] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Endocrino:<br></span>
                    <?php
                    echo ($rRevisionSistemas[9] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[10] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Psicológico:<br></span>
                    <?php
                    echo ($rRevisionSistemas[10] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[11] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Vascular:<br></span>
                    <?php
                    echo ($rRevisionSistemas[11] == 1 ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($rRevisionSistemas[12] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Otra Información:<br></span>
                    <?php
                    echo $rRevisionSistemas[12];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if (strlen($peso) > 0 || strlen($altura) > 0 || strlen($imc) > 0) : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Examen Físico</h4></span>
          </div>
        <?php endif; ?>
        <?php if (strlen($peso) > 0) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if (strlen($peso) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Peso:<br></span>
                    <?php
                    echo $peso;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (strlen($altura) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Altura:<br></span>
                    <?php
                    echo $altura;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (strlen($imc) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">IMC:<br></span>
                    <?php
                    echo $imc;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (strlen($card[0]) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Lateralidad:<br></span>
                    <?php
                    echo $card[0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (strlen($card[1]) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Tensión Arterial mm/Hg:<br></span>
                    <?php
                    echo $card[1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (strlen($card[2]) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Fc Minuto:<br></span>
                    <?php
                    echo $card[2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if (strlen($card[3]) > 0) : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Fr Minuto:<br></span>
                    <?php
                    echo $card[3];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>
        <?php
        foreach ($Examen as $key => $value) {
          $Examen[$key] = explode("&nbsp;|/&nbsp;", $Examen[$key]);
        }
        ?>
        <?php if (count($Examen) > 0) : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Examen</h4></span>
          </div>
        <?php endif; ?>
        <?php if (count($Examen) > 0) : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($Examen[0][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Órgano:<br></span>
                    <?php
                    echo $Examen[0][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[0][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Estado Normal:<br></span>
                    <?php
                    echo $Examen[0][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[0][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Hallazgo/Observaciones:<br></span>
                    <?php
                    echo $Examen[0][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[1][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[1][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[1][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[1][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[1][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[1][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[2][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[2][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[2][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[2][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[2][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[2][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[3][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[3][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[3][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[3][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[3][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[3][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[4][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[4][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[4][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[4][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[4][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[4][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[5][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[5][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[5][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[5][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[5][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[5][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[6][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[6][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[6][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[6][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[6][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[6][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[7][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[7][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[7][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[7][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[7][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[7][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[8][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[8][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[8][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[8][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[8][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[8][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[9][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[9][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[9][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[9][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[9][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[9][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[10][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[10][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[10][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[10][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[10][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[10][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[11][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[11][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[11][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[11][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[11][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[11][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[12][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[12][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[12][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[12][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[12][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[12][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[13][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[13][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[13][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[13][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[13][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[13][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
            <div class="row">
              <?php if ($Examen[14][0] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[14][0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[14][1] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[14][1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Examen[14][2] != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><br></span>
                    <?php
                    echo $Examen[14][2];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php $queryOrdenExamen = mysqli_query($conn3, "SELECT lb.nombreExamen AS nombreExamen, a.resultado AS resultado FROM generarOrden AS o JOIN examanesAsignados AS a ON o.id = a.idOrden JOIN examenesLB AS lb ON a.idExamen = lb.id WHERE o.idCliente = {$cliente_id} AND o.idHistoria = {$historiaClinica1} AND o.cargado = 1 order by a.id;");
          $numTotal = mysqli_num_rows($queryOrdenExamen);
          if ($numTotal > 0) : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Resultados Exámenes de Laboratorio</h4></span>
          </div>
          <div class="col-md-12">
            <div class="row">
              <?php 
                if ($queryOrdenExamen) {
                while($arrayOrden = mysqli_fetch_array($queryOrdenExamen)) { ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;"><?= $arrayOrden['nombreExamen'] ?>:<br></span>
                  <?= $arrayOrden['resultado'] ?>
                  </h5>
                </div>
              <?php } }?>
            </div>
          </div>
        <?php endif; ?>


        


        <?php if ($Visiometria != "" || $Audiometria != "" || $Espirometria != "" || $Optometria != "" || $Electrocardiogrma != "" || $Psicofisico != "" || $Psicometrico != "" || $Radiografia != "") : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Resultados Para-Clínicos</h4></span>
          </div>
        <?php endif; ?>

        <?php if ($Visiometria != "" || $Audiometria != "" || $Espirometria != "" || $Optometria != "" || $Electrocardiogrma != "" || $Psicofisico != "" || $Psicometrico != "" || $Radiografia != "") : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($Visiometria != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Visiometría:<br></span>
                    <?php
                    echo $Visiometria;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Audiometria != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Audiometría:<br></span>
                    <?php
                    echo $Audiometria;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Espirometria != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Espirometría:<br></span>
                    <?php
                    echo $Espirometria;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Optometria != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Optometría:<br></span>
                    <?php
                    echo $Optometria;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Electrocardiogrma != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Electrocardiograma:<br></span>
                    <?php
                    echo $Electrocardiogrma;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Psicofisico != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Psicofísico:<br></span>
                    <?php
                    echo $Psicofisico;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Psicometrico != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Psicométrico:<br></span>
                    <?php
                    echo $Psicometrico;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Radiografia != "") : ?>
                <div class="col-md-4">
                  <h5><span style="font-weight: bold;">Radiografía:<br></span>
                    <?php
                    echo $Radiografia;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
            </div>
          </div>
        <?php endif; ?>

        <?php if ($Impresion_Diagnostica[0] != "" || $Impresion_Diagnostica[1] != "" || $Impresion_Diagnostica[2] != "" || $Impresion_Diagnostica[3] != "" || $Impresion_Diagnostica[4] != "") : ?>
          <div class="col-md-12 text-center">
            <h5><span style="font-weight: bold;">Diagnósticos</h4></span>
          </div>
        <?php endif; ?>

        <?php if ($Impresion_Diagnostica[0] != "" || $Impresion_Diagnostica[1] != "" || $Impresion_Diagnostica[2] != "" || $Impresion_Diagnostica[3] != "" || $Impresion_Diagnostica[4] != "") : ?>
          <div class="col-md-12">
            <div class="row">
              <?php if ($Impresion_Diagnostica[0] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Impresión Diagnóstica:<br></span>
                    <?php
                    echo $Impresion_Diagnostica[0];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Impresion_Diagnostica[1] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Recomendaciones Laborales:<br></span>
                    <?php
                    echo $Impresion_Diagnostica[1];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Impresion_Diagnostica[2] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Remisión a EPS:<br></span>
                    <?php
                    echo ($Impresion_Diagnostica[2] == "1" ? 'Si' : 'No');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Impresion_Diagnostica[3] != "") : ?>
                <div class="col-md-3">
                  <h5><span style="font-weight: bold;">Finalidad de la Consulta:<br></span>
                    <?php
                    echo ($Impresion_Diagnostica[3] == "1" ? 'Aplica' : 'No Aplica');
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php if ($Impresion_Diagnostica[4] != "") : ?>
                <div class="col-md-12">
                  <h5><span style="font-weight: bold;">Causa Externa:<br></span>
                    <?php
                    echo $Impresion_Diagnostica[4];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>
              <?php
              foreach ($recomendaciones_lista as $key => $value) {
                if ($key != 3) {
              ?>
                  <div class="col-md-12">
                    <h5><span style="font-weight: bold;">Diagnóstico Relacionado <?= ($key + 1) ?>:<br></span>
                      <?php
                      echo $recomendaciones_lista[$key];
                      ?>
                    </h5>
                  </div>
              <?php
                }
              }
              ?>
              <?php if ($recomendaciones_lista[3] != "") : ?>
                <div class="col-md-12">
                  <h5><span style="font-weight: bold;">Tipo de Diagnóstico:<br></span>
                    <?php
                    echo $recomendaciones_lista[3];
                    ?>
                  </h5>
                </div>
              <?php endif; ?>


              
            </div>
          </div>
        <?php endif; ?>

        <?php if ($SO_PlanTratamiento != "") : ?>
                <div class="col-md-12">
                  <h5><span style="font-weight: bold;">Plan de Tratamiento:<br></span>
                    <?php
                    echo $SO_PlanTratamiento;
                    ?>
                  </h5>
                </div>
              <?php endif; ?>

      



      <div class="col-md-6" align="center">


        <div align="center">




          <?php




          $queryList = mysqli_query($conn3, "SELECT firma FROM  firmas where historia_id = $historiaClinica1 and historia_nombre = '6'");
          // $nrowl = mysqli_num_rows($queryList);
          if ($queryList) {
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
              $firma1 = $rowMotorizado['firma'];
            }
          }
          

          if (strlen($firma) > 10) {
            echo "<img src='$firma1'>";
          } else {

            echo 'Documento No FIRMADO';
          }



          ?>



          <font size="2"><strong>Firma del paciente </strong></font>




        </div>

      </div>



      <div class="col-md-6" align="center">
        <?php
        echo  $firmaImg;

        ?>
        <br>_______________________________________<br>
        <?php echo $empresaNombre ?><br>
        <?php echo $especialidad ?>L<br>
        <b>* Documento firmado digitalmente *</b>
        <br>
        <br>
        <br>
      </div>

      </div>
      <!-- /.col -->

      </div> 
                    <!-- cierre del page-->
                </td>
            </tr>
        </tbody>

        <tfoot>
            <tr>
                <td>
                    <!--place holder for the fixed-position footer-->
                    <div class="page-footer-space"></div>
                </td>
            </tr>
        </tfoot>

    </table>

</body>

</html>

<script type="text/javascript">
    printHTML();

    function printHTML() {
        if (window.print) {
            window.print();
        }
    }
</script>