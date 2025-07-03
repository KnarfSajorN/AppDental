<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");


/* 

                             $tablaPreset=       '<table class="table">
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
                                      <tbody>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">COMPONENTE SENSORIOMOTOR</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Integracion Sensorial</td>
                                          <td class="tg-0lax" rowspan="3"><br><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%</td>
                                          <td class="tg-0lax">'. $_POST['DC_IntegracionSensorial'].'</td>
                                          <td class="tg-0lax">'. $_POST['EIP_IntegracionSensorial'].'</td>
                                          <td class="tg-0lax">'. $_POST['OBJ_IntegracionSensorial'].'</td>
                                          <td class="tg-0lax">'. $_POST['RES_IntegracionSensorial'].'</td>
                                          <td class="tg-0lax">'. $_POST['P_IntegracionSensorial'].'</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Porcesamiento sensorial: propiocepcion</td>
                                          <td class="tg-0lax">'. $_POST['DC_PorcesamientoSensorial']. '</td>
                                          <td class="tg-0lax">'. $_POST['EIP_PorcesamientoSensorial']. '</td>
                                          <td class="tg-0lax">'. $_POST['OBJ_PorcesamientoSensorial']. '</td>
                                          <td class="tg-0lax">'. $_POST['RES_PorcesamientoSensorial']. '</td>
                                          <td class="tg-0lax">'. $_POST['P_PorcesamientoSensorial']. '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Destrezas perceptuales: esquema corporal, discriminacion derecha e izquierda, figura, fondo, constancia de la forma, grafestecia</td>
                                          <td class="tg-0lax">' . $_POST['DC_DestrezasPerceptuales'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_DestrezasPerceptuales'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_DestrezasPerceptuales'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_DestrezasPerceptuales'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_DestrezasPerceptuales'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">NEUROMUSCULAR</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" rowspan="2">Control postural en todas las posiciones de desarrollo motor reflejos</td>
                                          <td class="tg-0lax">Asume - No asume</td>
                                          <td class="tg-0lax">' . $_POST['DC_ControlPostural'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_ControlPostural'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_ControlPostural'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_ControlPostural'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_ControlPostural'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Integrados - No integrados</td>
                                          <td class="tg-0lax"> ' . $_POST['DC_ControlPostural2'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['EIP_ControlPostural2'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['OBJ_ControlPostural2'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['RES_ControlPostural2'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['P_ControlPostural2'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">MOTOR</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Habilidades motoras gruesas: control cefálico, rolado, sedente, cuadrupedo</td>
                                          <td class="tg-0lax" rowspan="8"><br><br><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%</td>
                                          <td class="tg-0lax"> ' . $_POST['DC_HabilidadesMotoras'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['EIP_HabilidadesMotoras'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['OBJ_HabilidadesMotoras'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['RES_HabilidadesMotoras'] . '</td>
                                          <td class="tg-0lax"> ' . $_POST['P_HabilidadesMotoras'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Bipedo</td>
                                          <td class="tg-0lax">' . $_POST['DC_Bipedo'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_Bipedo'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_Bipedo'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_Bipedo'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_Bipedo'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Habilidades motoras finas: patrones integrales</td>
                                          <td class="tg-0lax">'. $_POST['DC_HabilidadesMotorasFinas'] . '</td>
                                          <td class="tg-0lax">'. $_POST['EIP_HabilidadesMotorasFinas'] . '</td>
                                          <td class="tg-0lax">'. $_POST['OBJ_HabilidadesMotorasFinas'] . '</td>
                                          <td class="tg-0lax">'. $_POST['RES_HabilidadesMotorasFinas'] . '</td>
                                          <td class="tg-0lax">'. $_POST['P_HabilidadesMotorasFinas'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Lateralidad, cruce linea media, ordenes cruzadas</td>
                                          <td class="tg-0lax">' . $_POST['DC_LateralidadCruce'] .'</td>
                                          <td class="tg-0lax">' . $_POST['EIP_LateralidadCruce'] .'</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_LateralidadCruce'] .'</td>
                                          <td class="tg-0lax">' . $_POST['RES_LateralidadCruce'] .'</td>
                                          <td class="tg-0lax">' . $_POST['P_LateralidadCruce'] .'</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Coordinacion Visomotriz</td>
                                          <td class="tg-0lax">' . $_POST['DC_CoordinacionVisomotriz'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_CoordinacionVisomotriz'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_CoordinacionVisomotriz'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_CoordinacionVisomotriz'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_CoordinacionVisomotriz'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Integracion Bilateral</td>
                                          <td class="tg-0lax">' . $_POST['DC_IntegracionBilateral'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_IntegracionBilateral'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_IntegracionBilateral'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_IntegracionBilateral'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_IntegracionBilateral'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Tolerancia al periodo y tiempo de actividad</td>
                                          <td class="tg-0lax">' . $_POST['DC_ToleraciaPT'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_ToleraciaPT'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_ToleraciaPT'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_ToleraciaPT'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_ToleraciaPT'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Praxias</td>
                                          <td class="tg-0lax">' . $_POST['DC_Praxias'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_Praxias'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_Praxias'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_Praxias'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_Praxias'] . '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">COMPONENTE COGNITIVO</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Atencion, concentracion, observacion, memoria, resolucion de problemas analisis y sintesis</td>
                                          <td class="tg-0lax"><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%</td>
                                          <td class="tg-0lax">' . $_POST['DC_ComponenteCognitivo']. '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_ComponenteCognitivo']. '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_ComponenteCognitivo']. '</td>
                                          <td class="tg-0lax">' . $_POST['RES_ComponenteCognitivo']. '</td>
                                          <td class="tg-0lax">' . $_POST['P_ComponenteCognitivo']. '</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax" colspan="7">COMPONENTE PSICOSOCIAL</td>
                                        </tr>
                                        <tr>
                                          <td class="tg-0lax">Manejo de si mismo, roles, manejo del tiempo, autocontrol y conducta</td>
                                          <td class="tg-0lax"><br>No funcional 0-30%<br> Semifuncional 30-60% <br> Funcional 70 - 100%/td>
                                          <td class="tg-0lax">' . $_POST['DC_ComponentePsicosocial'] . '</td>
                                          <td class="tg-0lax">' . $_POST['EIP_ComponentePsicosocial'] . '</td>
                                          <td class="tg-0lax">' . $_POST['OBJ_ComponentePsicosocial'] . '</td>
                                          <td class="tg-0lax">' . $_POST['RES_ComponentePsicosocial'] . '</td>
                                          <td class="tg-0lax">' . $_POST['P_ComponentePsicosocial'] . '</td>
                                        </tr>
                                      </tbody>
                                    </table>';

*/





echo '<pre>';
// var_dump($_POST);
$vacio = 0;
$querySelect = mysqli_query($conn3, "SELECT id, nameCampo, nombre FROM camposRequiredOcupacional WHERE required = 1");
$nrowSelect = mysqli_num_rows($querySelect);
while ($row = mysqli_fetch_assoc($querySelect)) {
  $unLock2 = false;
  $row['nameCampo'] = json_decode($row['nameCampo']);
  foreach ($_POST as $content => $key) {
    if (in_array($content, $row['nameCampo'])) {
      $unLock2 = true;
      if (is_array($key) && count($key) > 0 || strlen($key) > 0) {
        echo "No esta vacio {$row['nombre']}: " . $content . '-' . $key . "<br>";
      } else {
        echo $content . '<br>';
        $vacio++;
      }
      break;
    }
  }
  if ($unLock2 == false) {
    echo "Esta vacio {$row['nombre']}<br>";
    $vacio++;
  }
}
// echo $vacio;
echo '</pre>';
// exit();

$registro              = $_POST['registro'];
$ID                    = $_POST['ID'];
$clienteId             = $_POST['clienteId'];
$usuario_id            = $_POST['usuario_id'];
$Afechar               = date("Y-m-d H:i:s");
$motivo                = reem($_POST['motivo']);
$diagnostico           = reem($_POST['diagnostico']);
$NOMBRE_USUARIO        = reem($_POST['NOMBRE_USUARIO']);
$fecha                 = date("Y-m-d");
$hora                  = date("H:i:s");

// Filtro de Orden de Laboratorio
$queryOrdenCargada = mysqli_query($conn3, "SELECT 
  a.id AS id, a.idExamen AS idExamen, 
  lb.nombreExamen AS nombreExamen, 
  o.idDoctor AS idDoctor, o.idCliente AS idCliente, 
  o.cargado AS cargadoOrden, a.cargado AS cargadoExamen, a.created_at AS fechaEAsinado, 
  lb.created_at AS fechaOrden FROM 
  examanesAsignados AS a JOIN examenesLB AS lb 
  ON a.idExamen = lb.id JOIN generarOrden AS o 
  ON a.idOrden = o.id WHERE o.idCliente = {$clienteId} AND o.cargado = 0 
  order by a.id");
  // AND a.cargado = 0
$numRowOrden = mysqli_num_rows($queryOrdenCargada);
if ($numRowOrden > 0) {
  foreach ($_POST['examenLab'] as $key => $value) {
    echo $vacio;
    $key = mysql_real_escape_string(htmlspecialchars(trim($key)));
    $queryOrdenId = mysqli_query($conn3, "SELECT a.id AS idUpdate FROM 
    examanesAsignados AS a JOIN examenesLB AS lb 
    ON a.idExamen = lb.id JOIN generarOrden AS o 
    ON a.idOrden = o.id WHERE o.idCliente = {$clienteId} AND o.cargado = 0 AND lb.nombreExamen = '{$key}'
    order by a.id")->fetch_object();
    if ($value != "") {
      $value = mysql_real_escape_string(htmlspecialchars(trim($value)));
      $queryExamenUpdate = mysqli_query($conn3, "UPDATE examanesAsignados SET resultado = '{$value}', cargado = 1 WHERE id = {$queryOrdenId->idUpdate}");
      if ($queryOrdenId) {
        $numRowOrden--;
      } else {
        var_dump(mysqli_error_list($conn3));
      }
    }
  }
}

echo $vacio = strval(($vacio + $numRowOrden));
// NEW
'<br>';
$motivoConsulta   = reem($_POST['motivoConsulta']);
'<br>';
$rEnfermedadactual = $_POST['enfermedadActual'];
'<br>';
foreach ($rEnfermedadactual as $key => $value) {
  $rEnfermedadactual2 .= $rEnfermedadactual[$key] . ' || ';
}

$rEnfermedadactual = $rEnfermedadactual2;
// Factores de Riesgo
// fisicos
$iluminacioni = $_POST['iluminacioni'];
$radiacion = $_POST['radiacion'];
$ruido = $_POST['ruido'];
$atemperatura = $_POST['atemperatura'];
$btemperatura = $_POST['btemperatura'];
$vibraciones = $_POST['vibraciones'];
$humedad = $_POST['humedad'];

$fisicos = $iluminacioni . '&nbsp;|/&nbsp;' . $radiacion . '&nbsp;|/&nbsp;' . $ruido . '&nbsp;|/&nbsp;' . $atemperatura . '&nbsp;|/&nbsp;' . $btemperatura . '&nbsp;|/&nbsp;' . $vibraciones . '&nbsp;|/&nbsp;' . $humedad;

// Quimicos
$gases = $_POST['gases'];
$humos = $_POST['humos'];
$vapores = $_POST['vapores'];
$polvos = $_POST['polvos'];
$liquidos = $_POST['liquidos'];
$solidos = $_POST['solidos'];
$neblinaRocio = $_POST['neblinaRocio'];

$quimicos = $gases . '&nbsp;|/&nbsp;' . $humos . '&nbsp;|/&nbsp;' . $vapores . '&nbsp;|/&nbsp;' . $polvos . '&nbsp;|/&nbsp;' . $liquidos . '&nbsp;|/&nbsp;' . $solidos . '&nbsp;|/&nbsp;' . $neblinaRocio;

// Ergonomicos
$mmdc = $_POST['mmdc'];
$movire = $_POST['movire'];
$videoTerminal = $_POST['videoTerminal'];
$dPTrabajo = $_POST['dPTrabajo'];
$herramientas = $_POST['herramientas'];

$ergonomicos = $mmdc . '&nbsp;|/&nbsp;' . $movire . '&nbsp;|/&nbsp;' . $videoTerminal . '&nbsp;|/&nbsp;' . $dPTrabajo . '&nbsp;|/&nbsp;' . $herramientas;

// Bilogicos
$virus = $_POST['virus'];
$bacterias = $_POST['bacterias'];
$hongos = $_POST['hongos'];
$fluidosTejidos = $_POST['fluidosTejidos'];
$humanos = $_POST['humanos'];

$biologicos = $virus . '&nbsp;|/&nbsp;' . $bacterias . '&nbsp;|/&nbsp;' . $hongos . '&nbsp;|/&nbsp;' . $fluidosTejidos . '&nbsp;|/&nbsp;' . $humanos;

// Psico-Laborales
$contenidoTarea = $_POST['contenidoTarea'];
$equipoTrabajo = $_POST['equipoTrabajo'];
$manejoPublico = $_POST['manejoPublico'];
$gestionAdministrativa = $_POST['gestionAdministrativa'];
$orgTiempoTrab = $_POST['orgTiempoTrab'];
$monotoniaRutina = $_POST['monotoniaRutina'];
$sobrecargaHoraExtras = $_POST['sobrecargaHoraExtras'];

$psicoLaboralres = $contenidoTarea . '&nbsp;|/&nbsp;' . $equipoTrabajo . '&nbsp;|/&nbsp;' . $manejoPublico . '&nbsp;|/&nbsp;' . $gestionAdministrativa . '&nbsp;|/&nbsp;' . $orgTiempoTrab . '&nbsp;|/&nbsp;' . $monotoniaRutina . '&nbsp;|/&nbsp;' . $sobrecargaHoraExtras;

// Seguridad
$mecanicos = $_POST['mecanicos'];
$electricos = $_POST['electricos'];
$espaciosConf = $_POST['espaciosConf'];
$ordenPublico = $_POST['ordenPublico'];
$actEsporadica = $_POST['actEsporadica'];
$alturas = $_POST['alturas'];
$transitoVehicular = $_POST['transitoVehicular'];

$seguridad = $mecanicos . '&nbsp;|/&nbsp;' . $electricos . '&nbsp;|/&nbsp;' . $espaciosConf . '&nbsp;|/&nbsp;' . $ordenPublico . '&nbsp;|/&nbsp;' . $actEsporadica . '&nbsp;|/&nbsp;' . $alturas . '&nbsp;|/&nbsp;' . $transitoVehicular;

// elementos de Proteccion Personal
$casco = $_POST['casco'];
$monogafas = $_POST['monogafas'];
$proteccionAuditiva = $_POST['proteccionAuditiva'];
$cofia = $_POST['cofia'];
$tapabocas = $_POST['tapabocas'];
$arnes = $_POST['arnes'];
$botas = $_POST['botas'];
$guantes = $_POST['guantes'];
$overol = $_POST['overol'];
$peto = $_POST['peto'];
$respirador = $_POST['respirador'];
$otroFactorRiego = $_POST['otroFactorRiego'];

$elementosPP = $casco . '&nbsp;|/&nbsp;' . $monogafas . '&nbsp;|/&nbsp;' . $proteccionAuditiva . '&nbsp;|/&nbsp;' . $cofia . '&nbsp;|/&nbsp;' . $tapabocas . '&nbsp;|/&nbsp;' . $arnes . '&nbsp;|/&nbsp;' . $botas . '&nbsp;|/&nbsp;' . $guantes . '&nbsp;|/&nbsp;' . $overol . '&nbsp;|/&nbsp;' . $peto . '&nbsp;|/&nbsp;' . $respirador;

$riesgoContent = $fisicos . ' || ' . $quimicos . ' || ' . $ergonomicos . ' || ' . $biologicos . ' || ' . $psicoLaboralres . ' || ' . $seguridad . ' || ' . $elementosPP . ' || ' . $otroFactorRiego;

// Antecedenctes Laborales
$empresa = $_POST['empresa'];
$tiempoA = $_POST['tiempoA'];
$tiempoM = $_POST['tiempoM'];

$rAntecedentes = $empresa . ' || ' . $tiempoA . ' || ' . $tiempoM;

// Si Accidentes de Trabjo
$accidentesTrabajo = $_POST['accidentesTrabajo']; // 1 si 0 no
$cualAcidente = $_POST['cualAcidente'];
$cualEmpresa = $_POST['cualEmpresa'];
$fechaAccidente = $_POST['fechaAccidente'];
$arp = $_POST['arp'];
$lesionAccidente = $_POST['lesionAccidente'];
$secuelaAccidente = $_POST['secuelaAccidente'];
$diasIncapacidad = $_POST['diasIncapacidad'];
$limitacion = $_POST['limitacion'];
$reubicacion = $_POST['reubicacion'];

$rAntecedentes2 = $accidentesTrabajo . ' || ' . $cualAcidente . ' || ' . $cualEmpresa . ' || ' . $fechaAccidente . ' || ' . $arp . ' || ' . $lesionAccidente . ' || ' . $secuelaAccidente . ' || ' . $diasIncapacidad . ' || ' . $limitacion . ' || ' . $reubicacion;

// Si Enfermedad profesional
$enfermedadProfesional = $_POST['enfermedadProfesional']; // 1 si 0 no
$diagnosticoEP = $_POST['diagnosticoEP'];
$presuntivaConfirmadaEP = $_POST['presuntivaConfirmadaEP'];

$rAntecedentes3 = $enfermedadProfesional . ' || ' . $diagnosticoEP . ' || ' . $presuntivaConfirmadaEP;

// Antecedentes
// Personales
$infancia = $_POST['infancia'];
$patologicos = $_POST['patologicos'];
$inmunologicos = $_POST['inmunologicos'];
$traumaticos = $_POST['traumaticos'];
$hospitalarios = $_POST['hospitalarios'];
$quirurgicos = $_POST['quirurgicos'];
$txicoAlergicos = $_POST['txicoAlergicos'];
$ets = $_POST['ets'];
$psiquiatricos = $_POST['psiquiatricos'];
$farmacologicos = $_POST['farmacologicos'];

$personales = $infancia . '&nbsp;|/&nbsp;' . $patologicos . '&nbsp;|/&nbsp;' . $inmunologicos . '&nbsp;|/&nbsp;' . $traumaticos . '&nbsp;|/&nbsp;' . $hospitalarios . '&nbsp;|/&nbsp;' . $quirurgicos . '&nbsp;|/&nbsp;' . $txicoAlergicos . '&nbsp;|/&nbsp;' . $ets . '&nbsp;|/&nbsp;' . $psiquiatricos . '&nbsp;|/&nbsp;' . $farmacologicos;

// Habitos Saludables
$tabaquismo = $_POST['tabaquismo'];
$alcoholismo = $_POST['alcoholismo'];
$deporteActividadFisica = $_POST['deporteActividadFisica'];

$habitoSaludable = $tabaquismo . '&nbsp;|/&nbsp;' . $alcoholismo . '&nbsp;|/&nbsp;' . $deporteActividadFisica;

//  Familiares
$familiares = $_POST['familiares'];

//----------------------------- F --------------
// Gineco-Obstetricos
$menarquia = $_POST['menarquia'];
$ciclosMestruales = $_POST['ciclosMestruales'];
// Formula Obstetrica
$gGestaciones = $_POST['gGestaciones'];
$pPariedad = $_POST['pPariedad'];
$aAbortos = $_POST['aAbortos'];
$oObitos = $_POST['oObitos'];
$mMortinatos = $_POST['mMortinatos'];
$cCesareas = $_POST['cCesareas'];
$eEctopicos = $_POST['eEctopicos'];

// Gineco Obstetrico
$FUR = $_POST['FUR'];
$FUP = $_POST['FUP'];
$FPP = $_POST['FPP'];
$ultimaCitologiaM = $_POST['ultimaCitologiaM'];
$ultimaCitologiaA = $_POST['ultimaCitologiaA'];
$resultadoCitologia = $_POST['resultadoCitologia'];
$planificacion = $_POST['planificacion']; // 1 Si o 0 No
$planUsaAnticonceptivo = $_POST['planUsaAnticonceptivo'];

$rAntecedentesGineco = $menarquia . '&nbsp;|/&nbsp;' . $ciclosMestruales . ' || ' . $gGestaciones . '&nbsp;|/&nbsp;' . $pPariedad . '&nbsp;|/&nbsp;' . $aAbortos . '&nbsp;|/&nbsp;' . $oObitos . '&nbsp;|/&nbsp;' . $mMortinatos . '&nbsp;|/&nbsp;' . $cCesareas . '&nbsp;|/&nbsp;' . $eEctopicos . ' || ' . $FUR . '&nbsp;|/&nbsp;' . $FUP . '&nbsp;|/&nbsp;' . $FPP . '&nbsp;|/&nbsp;' . $ultimaCitologiaM . '&nbsp;|/&nbsp;' . $ultimaCitologiaA . '&nbsp;|/&nbsp;' . $resultadoCitologia . '&nbsp;|/&nbsp;' . $planificacion . '&nbsp;|/&nbsp;' . $planUsaAnticonceptivo;

//----------------------------- F --------------

$antecedenteContent = $personales . ' || ' . $habitoSaludable . ' || ' . $familiares;

// Revision por Sistemas
$numerologico = $_POST['numerologico']; // 1 Si o 0 No
$sistemaVisual = $_POST['sistemaVisual']; // 1 Si o 0 No
$audicion = $_POST['audicion']; // 1 Si o 0 No
$otglogico = $_POST['otglogico']; // 1 Si o 0 No
$cardioPulmonar = $_POST['cardioPulmonar']; // 1 Si o 0 No
$gastroInstetinal = $_POST['gastroInstetinal']; // 1 Si o 0 No
$genitoUrinario = $_POST['genitoUrinario']; // 1 Si o 0 No
$osteomuscular = $_POST['osteomuscular']; // 1 Si o 0 No
$pielFaneras = $_POST['pielFaneras']; // 1 Si o 0 No
$endocrino = $_POST['endocrino']; // 1 Si o 0 No
$psicologico = $_POST['psicologico']; // 1 Si o 0 No
$vascular = $_POST['vascular']; // 1 Si o 0 No
$otraIformacionAntecedentes = $_POST['otraIformacionAntecedentes'];

$rRevisionSistemas = $numerologico . '&nbsp;|/&nbsp;' . $sistemaVisual . '&nbsp;|/&nbsp;' . $audicion . '&nbsp;|/&nbsp;' . $otglogico . '&nbsp;|/&nbsp;' . $cardioPulmonar . '&nbsp;|/&nbsp;' . $gastroInstetinal . '&nbsp;|/&nbsp;' . $genitoUrinario . '&nbsp;|/&nbsp;' . $osteomuscular . '&nbsp;|/&nbsp;' . $pielFaneras . '&nbsp;|/&nbsp;' . $endocrino . '&nbsp;|/&nbsp;' . $psicologico . '&nbsp;|/&nbsp;' . $vascular . '&nbsp;|/&nbsp;' . $otraIformacionAntecedentes;


// Examen fisico
$peso = $_POST['peso'];
$altura = $_POST['altura'];
$imc = $_POST['imc'];
$lateralidad = $_POST['lateralidad'];
$tension = $_POST['tension'];
$fc_minuto = $_POST['fc_minuto'];
$fr_minuto = $_POST['fr_minuto'];

$fcard = $lateralidad . ' || ' . $tension . ' || ' . $fc_minuto . ' || ' . $fr_minuto;


// Examen
$cabezaCuello = $_POST['cabezaCuello'];
$cabezaCuelloEstado = $_POST['cabezaCuelloEstado'];
$cabezaCuelloObservacion = $_POST['cabezaCuelloObservacion'];

$cabezaC = $cabezaCuello . '&nbsp;|/&nbsp;' . $cabezaCuelloEstado . '&nbsp;|/&nbsp;' . $cabezaCuelloObservacion;

$nariz = $_POST['nariz'];
$narizEstado = $_POST['narizEstado'];
$narizObservacion = $_POST['narizObservacion'];

$nariz = $nariz . '&nbsp;|/&nbsp;' . $narizEstado . '&nbsp;|/&nbsp;' . $narizObservacion;

$bocaGarganta = $_POST['bocaGarganta'];
$bocaGargantaEstado = $_POST['bocaGargantaEstado'];
$bocaGargantaObservacion = $_POST['bocaGargantaObservacion'];

$bocaG = $bocaGarganta . '&nbsp;|/&nbsp;' . $bocaGargantaEstado . '&nbsp;|/&nbsp;' . $bocaGargantaObservacion;

$oidos = $_POST['oidos'];
$oidosEstado = $_POST['oidosEstado'];
$oidosObservacion = $_POST['oidosObservacion'];

$oidos = $oidos . '&nbsp;|/&nbsp;' . $oidosEstado . '&nbsp;|/&nbsp;' . $oidosObservacion;

$agudezaVisual = $_POST['agudezaVisual'];
$agudezaVisualEstado = $_POST['agudezaVisualEstado'];
$agudezaVisualObservacion = $_POST['agudezaVisualObservacion'];

$agudezaVisual = $agudezaVisual . '&nbsp;|/&nbsp;' . $agudezaVisualEstado . '&nbsp;|/&nbsp;' . $agudezaVisualObservacion;

$ojos = $_POST['ojos'];
$ojosEstado = $_POST['ojosEstado'];
$ojosObservacion = $_POST['ojosObservacion'];

$ojos = $ojos . '&nbsp;|/&nbsp;' . $ojosEstado . '&nbsp;|/&nbsp;' . $ojosObservacion;

$torax = $_POST['torax'];
$toraxEstado = $_POST['toraxEstado'];
$toraxObsercacion = $_POST['toraxObsercacion'];

$torax = $torax . '&nbsp;|/&nbsp;' . $toraxEstado . '&nbsp;|/&nbsp;' . $toraxObsercacion;

$sistemaVPL = $_POST['sistemaVPL'];
$sistemaVPLEstado = $_POST['sistemaVPLEstado'];
$sistemaVPLObservacion = $_POST['sistemaVPLObservacion'];

$sistemaVPL = $sistemaVPL . '&nbsp;|/&nbsp;' . $sistemaVPLEstado . '&nbsp;|/&nbsp;' . $sistemaVPLObservacion;

$abdomenRInguinal = $_POST['abdomenRInguinal'];
$abdomenRInguinalEstado = $_POST['abdomenRInguinalEstado'];
$abdomenRInguinalEstadoObservacion = $_POST['abdomenRInguinalEstadoObservacion'];

$abdomenRInguinal = $abdomenRInguinal . '&nbsp;|/&nbsp;' . $abdomenRInguinalEstado . '&nbsp;|/&nbsp;' . $abdomenRInguinalEstadoObservacion;

$extremidadesS = $_POST['extremidadesS'];
$extremidadesSEstado = $_POST['extremidadesSEstado'];
$extremidadesSObservacion = $_POST['extremidadesSObservacion'];

$extremidadesS = $extremidadesS . '&nbsp;|/&nbsp;' . $extremidadesSEstado . '&nbsp;|/&nbsp;' . $extremidadesSObservacion;

$extremidadesI = $_POST['extremidadesI'];
$extremidadesIEstado = $_POST['extremidadesIEstado'];
$extremidadesIObservacion = $_POST['extremidadesIObservacion'];

$extremidadesI = $extremidadesI . '&nbsp;|/&nbsp;' . $extremidadesIEstado . '&nbsp;|/&nbsp;' . $extremidadesIObservacion;

$columnaVertebral = $_POST['columnaVertebral'];
$columnaVertebralEstado = $_POST['columnaVertebralEstado'];
$columnaVertebralObservacion = $_POST['columnaVertebralObservacion'];

$columnaVertebral = $columnaVertebral . '&nbsp;|/&nbsp;' . $columnaVertebralEstado . '&nbsp;|/&nbsp;' . $columnaVertebralObservacion;

$neurologicoRO = $_POST['neurologicoRO'];
$neurologicoROEstado = $_POST['neurologicoROEstado'];
$neurologicoROObservacion = $_POST['neurologicoROObservacion'];

$neurologicoRO = $neurologicoRO . '&nbsp;|/&nbsp;' . $neurologicoROEstado . '&nbsp;|/&nbsp;' . $neurologicoROObservacion;

$pielFanerasExa = $_POST['pielFanerasExa'];
$pielFanerasExaEstado = $_POST['pielFanerasExaEstado'];
$pielFanerasExaObservaciones = $_POST['pielFanerasExaObservaciones'];

$pielFanerasExa = $pielFanerasExa . '&nbsp;|/&nbsp;' . $pielFanerasExaEstado . '&nbsp;|/&nbsp;' . $pielFanerasExaObservaciones;

$observaciones = $_POST['observaciones'];
$observacionesEstado = $_POST['observacionesEstado'];
$observacionesO = $_POST['observacionesO'];

$observaciones = $observaciones . '&nbsp;|/&nbsp;' . $observacionesEstado . '&nbsp;|/&nbsp;' . $observacionesO;

$Examen = $cabezaC . ' || ' . $nariz . ' || ' . $bocaG . ' || ' . $oidos . ' || ' . $agudezaVisual . ' || ' . $ojos . ' || ' . $torax . ' || ' . $sistemaVPL . ' || ' . $abdomenRInguinal . ' || ' . $extremidadesS . ' || ' . $extremidadesI . ' || ' . $columnaVertebral . ' || ' . $neurologicoRO . ' || ' . $pielFanerasExa . ' || ' . $observaciones;

// Resultados Para-Clinicos
$Visiometria = $_POST['visiometria'];
$Audiometria = $_POST['audiometria'];
$Espirometria = $_POST['espirometria'];
$examenLaboratorio = $_POST['laboratotrio'];
$Optometria = $_POST['optometria']; // Optometria
$Electrocardiogrma = $_POST['electrocardiogrma']; // Electrocardiogrma
$Psicofisico = $_POST['psicofisico']; // Psicofisico
$Psicometrico = $_POST['psicometrico']; // Psicometrico
$Radiografia = $_POST['radiografia']; // Radiografia

// Diagnosticos
$impresionDiagnostica = $_POST['impresionDiagnostica'];
$recomendacionesLaborales = $_POST['recomendacionesLaborales'];
$remisionEPS = $_POST['remisionEPS']; // 1 Si o 0 No
$finalidadConsulta = $_POST['finalidadConsulta']; // Aplica o No Aplica
$causaExterna = $_POST['causaExterna'];

$Impresion_Diagnostica = $impresionDiagnostica . ' || ' . $recomendacionesLaborales . ' || ' . $remisionEPS . ' || ' . $finalidadConsulta . ' || ' . $causaExterna;

// Cie 11 or 10 
$name1 = ($_POST['cieCod1'] == "" ? '' : $_POST['name1']);
$name12 = ($_POST['cieCod2'] == "" ? '' : $_POST['name12']);
$name13 = ($_POST['cieCod3'] == "" ? '' : $_POST['name13']);
$tipoDiagnostico = $_POST['tipoDiagnostico'];

$recomendaciones_lista = $name1 . ' || ' . $name12 . ' || ' . $name13 . ' || ' . $tipoDiagnostico;

$SO_PlanTratamiento = $_POST['SO_PlanTratamiento'];

$aClinicos = $_POST['aClinicos'];

// FIN NEW

// echo "INSERT INTO historiaclinica6_labora SET cliente_id = $clienteId, usuario_id = $usuario_id, Fecha = '$fecha',
// Hora = '$hora', motivoConsulta = '$motivoConsulta', rEnfermedadactual = '$rEnfermedadactual', 
// riesgoContent = '$riesgoContent', rAntecedentes = '$rAntecedentes', rAntecedentes2 = '$rAntecedentes2', 
// rAntecedentes3 = '$rAntecedentes3', antecedenteContent = '$antecedenteContent', rAntecedentesGineco = '$rAntecedentesGineco', 
// echo echo rRevisionSistemas = '$rRevisionSistemas', Examen = '$Examen', Visiometria = '$Visiometria', 
// Audiometria = '$Audiometria', Espirometria = '$Espirometria', Impresion_Diagnostica = '$Impresion_Diagnostica', 
// recomendaciones_lista = '$recomendaciones_lista', examenLaboratorio = '$examenLaboratorio'";

// mysqli_query($conn3,"INSERT INTO historiaclinica6_labora (cliente_id, usuario_id, Fecha, Hora, rHml, rAntecedentes, rAntecedentes2, rAntecedentes3, rDCargo, rCheckBox, rFtmii, rInformacionGL, rAntecedentespp, rAntecedentesgo, rHabitos, rInmuniza, rAPF, rRevisionSistemas, rEnfermedadactual, rPruebasC, rValoracion, rTratamiento, rRecomendaciones, rTheEnd, tipo, empresa, nit, actividad, eps, arl, fondo,Empresa_Nombre,Personas_Cargo,Cargo,Entidad_Salud,Examen,Visiometria,Espirometria,Audiometria,Psicologico,Impresion_Diagnostica,Apto_Recomendaciones,Continuar_Labor,Continuar_Recomendaciones,Retiro_Sin_Patologia,Retiro_Con_Patologia,remision_a,Examenes_Complementarios,Recomendaciones_Especiales,Recomendaciones_Generales,osteomuscular_columna,osteomuscular_mcervical,osteomuscular_mlumbar,osteomuscular_marcha,osteomuscular_msuperiores,osteomuscular_codos,osteomuscular_manos,osteomuscular_caderas,osteomuscular_rodilla,osteomuscular_tobillo,osteomuscular_osteotendinosos,osteomuscular_fuerza,osteomuscular_resultado,f_altura_antecedentes,f_altura_vertigo,f_altura_perdida_equilibrio,f_altura_examen_fisico,recomendaciones_patologicas,recomendaciones_lista, nitEmpresa, rInformacion, rAntecedentesvacunacion, rAntecedentesGineco, antecedenteContent, riesgoContent, accidentesLaborales, consentimiento, revisionsiste, Reusltado_paraclinicos, comentarios_examen) 
//     VALUES ('$clienteId', '$usuario_id', '$fecha', '$hora', '$rHml', '$rAntecedentes', '$rAntecedentes2', '$rAntecedentes3', '$rDCargo', '$rCheckbox', '$rFtmii', '$rInformacionGL', '$rAntecedentespp', '$rAntecedentesgo', '$rHabitos', '$rInmuniza', '$rAPF', '$rRevisionSistemas', '$rEnfermedadactual', '$rPruebasC', '$rValoracion', '$rTratamiento', '$rRecomendaciones', '$rTheEnd', '$tipo',  '$empresa', '$snit', '$sactividad', '$seps', '$sarl', '$sfondo','$Empresa_Nombre','$Personas_Cargo','$Cargo','$Entidad_Salud','$Examen','$Visiometria','$Espirometria','$Audiometria','$Psicologico','$Impresion_Diagnostica','$Apto_Recomendaciones','$Continuar_Labor','$Continuar_Recomendaciones','$Retiro_Sin_Patologia','$Retiro_Con_Patologia','$remision_a','$Examenes_Complementarios','$Recomendaciones_Especiales','$Recomendaciones_Generales','$ex_os_columna','$ex_os_mcervical','$ex_os_mlumbar','$ex_os_marcha','$ex_os_msuperiores','$ex_os_codos','$ex_os_manos','$ex_os_caderas','$ex_os_rodilla','$ex_os_tobillo','$ex_os_osteotendinosos','$ex_os_fuerza','$resultado_osteomuscular','$formato_altura_antecedentes','$formato_altura_vertigo','$formato_altura_perdida_equilibrio','$formato_altura_fisico','$recomendaciones_patologicas','$recomendaciones_lista_total', '$nitEmpresa', '$rInformacion', '$rAntecedentesvacunacion', '$rAntecedentesGineco', '$antecedenteContent', '$riesgoContent', '$accidentesLaborales', '$consentimiento', '$revisionsiste', '$Reusltado_paraclinicos', '$comentarios_examen')");

// -------------------------------------------------------

$querySelected = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = '$clienteId' AND proceso = 0");
$queryNum = mysqli_num_rows($querySelected);
function masterMaxId($max, $as, $tabla, $cliente)
{
  include 'config.php';
  $queryListhc = mysqli_query($conn3, "SELECT MAX($max) as $as from $tabla WHERE cliente_id = {$cliente}");
  $nrowl = mysqli_num_rows($queryListhc);
  while ($rowhc = mysqli_fetch_array($queryListhc)) {
    $historiaClinica1 = $rowhc[$as];
  }
  if (!$queryListhc) {
    echo '<pre>';
    echo '--------------------';
    return var_dump(mysqli_error_list($conn3));
    echo '</pre>';
  } else {
    return $historiaClinica1;
  }
}

$posicionParaclinicos = [
  2 => "visiometria",
  3 => "audiometria",
  4 => "espirometria",
  5 => "optometria",
  6 => "electrocardiogrma",
  7 => "psicofisico",
  8 => "psicometrico",
  9 => "radiografia"
];
if ($queryNum > 0) {
  echo '<br>';
  $idControl = $querySelected->fetch_object()->id;
  $a = 3;
  $unLock = 0;
  $pase = 3;
  do {
    $querySelect = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = $idControl AND estado = 1");
    $queryNum2 = mysqli_num_rows($querySelect);
    echo '<br>';
    // echo $a;
    while ($arrayObject = mysqli_fetch_object($querySelect)) {
      // echo $arrayObject->tipo;
      echo '<br>';
      if (!is_numeric($arrayObject->idHistoria) && $arrayObject->tipo == 1 && $pase == 3) {
        // Tipos de Paraclinicos Permitidos en esta historia.
        echo 'Insertar Historia';
        $queryResultInsertHistoria = mysqli_query(
          $conn3,
          "INSERT INTO historiaclinica6_labora SET cliente_id = $clienteId, usuario_id = $usuario_id, Fecha = '$fecha',
            Hora = '$hora', motivoConsulta = '$motivoConsulta', rEnfermedadactual = '$rEnfermedadactual', 
            riesgoContent = '$riesgoContent', rAntecedentes = '$rAntecedentes', rAntecedentes2 = '$rAntecedentes2', 
            rAntecedentes3 = '$rAntecedentes3', antecedenteContent = '$antecedenteContent', rAntecedentesGineco = '$rAntecedentesGineco', 
            rRevisionSistemas = '$rRevisionSistemas', Examen = '$Examen', Visiometria = '$Visiometria', 
            Audiometria = '$Audiometria', Espirometria = '$Espirometria', Impresion_Diagnostica = '$Impresion_Diagnostica', 
            recomendaciones_lista = '$recomendaciones_lista', examenLaboratorio = '$examenLaboratorio', Optometria = '{$Optometria}', 
            Electrocardiogrma = '{$Electrocardiogrma}', Psicofisico = '{$Psicofisico}', Psicometrico = '{$Psicometrico}', Radiografia = '{$Radiografia}', SO_PlanTratamiento='$SO_PlanTratamiento', Antecedentes_Clinicos='$aClinicos'"
        );
        echo '<br>';
        echo '---------Proceso 1 Insert Historia-----------';
        if (!$queryResultInsertHistoria) {
          echo '<pre>';
          var_dump(mysqli_error_list($conn3));
          echo '</pre>';
        }
        $historiaClinica1 = masterMaxId('ID', 'historiaclinica6_labora', 'historiaclinica6_labora', $clienteId);


        //////////////////////// GUARDAR LA TABLA DE OBJETIVOS (PARA NO ALAR4GAR MAS EL CODIGO)///////////////////////////////////////
        include 'includeGuardarObjetivosTerapiaOcupacional.php';
        //////////////////////// GUARDAR LA TABLA DE OBJETIVOS (PARA NO ALAR4GAR MAS EL CODIGO)////////////////////////////////////



        $querySelected2 = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = '$clienteId' AND proceso = 0");
        $idControl2 = $querySelected2->fetch_object()->id;
        $querySelect2 = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = $idControl2 AND tipo != 1 AND (proceso = 1 OR proceso = 0) AND estado = 1");
        $queryNumParaClinicos = mysqli_num_rows($querySelect2);
        if ($queryNumParaClinicos > 0) {
          echo 'Insertar Paraclinicos';
          echo '<br>';
          echo '---------Proceso 1.1 Finalizar Para Clinicos-----------';
          while ($arrayRow = mysqli_fetch_object($querySelect2)) {
            echo '<br>';
            echo $idHistoriControl = $arrayRow->id;
            // Visiometria
            // Audiometria
            // Espirometria
            // Optometria
            // Electrocardiogrma
            // Psicofisico
            // Psicometrico
            // Radiografia
            foreach ($posicionParaclinicos as $key => $value) {
              if ($arrayRow->tipo == $key && $_POST[$value] != '') {
                $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
              } else if ($arrayRow->tipo == $key && $_POST[$value] == '') {
                $vacio++;
              }
            }
            // if ($arrayRow->tipo == 2 && $_POST['visiometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 3 && $_POST['audiometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 4 && $_POST['espirometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 5 && $_POST['optometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 6 && $_POST['electrocardiogrma'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 7 && $_POST['psicofisico'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 8 && $_POST['psicometrico'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // } else if ($arrayRow->tipo == 9 && $_POST['radiografia'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE id = $idHistoriControl");
            // }
          }
        }
        if (!$querySelect2) {
          echo '<pre>';
          var_dump(mysqli_error_list($conn3));
          echo '</pre>';
        }

        $Campo1 = mysqli_query($conn3, "show COLUMNS from examenFisico WHERE Field = 'nombre_historia';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `examenFisico` ADD `nombre_historia` TEXT NULL  COMMENT 'para identificar de que historia se esta haciendo uso *Creado desde modulo de guardar historia clinica laboral*'");
        }

        $queryResultExamenFisico = mysqli_query($conn3, "INSERT INTO examenFisico (usuario_id, cliente_id, peso, altura, imc, fcard, fechaHora, historia_id, nombre_historia) VALUES ('$ID', '$clienteId', '$peso', '$altura', '$imc', '$fcard', '$Afechar', '$historiaClinica1','Laboral');");
        echo '<br>';
        echo '---------Proceso 1 Insert Examen Fisico-----------';
        if (!$queryResultExamenFisico) {
          echo '<pre>';
          var_dump(mysqli_error_list($conn3));
          echo '</pre>';
        }
      } else if (is_numeric($arrayObject->idHistoria) && $arrayObject->tipo == 1 && $pase == 3) {
        $querySelected2 = mysqli_query($conn3, "SELECT * FROM salaControl WHERE idCliente = '$clienteId' AND proceso = 0");
        $idControl2 = $querySelected2->fetch_object()->id;
        $querySelect2 = mysqli_query($conn3, "SELECT * FROM historicoControl WHERE idControl = $idControl2 AND tipo != 1 AND estado = 1");
        if ($querySelect2) {
          echo 'Insertar Paraclinicos';
          echo '<br>';
          echo '---------Proceso 1.1 Finalizar Para Clinicos-----------';
          while ($arrayRow = mysqli_fetch_object($querySelect2)) {
            $idHistoriControl = $arrayRow->id;
            foreach ($posicionParaclinicos as $key => $value) {
              if ($arrayRow->tipo == $key && $_POST[$value] == '') {
                $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
                $vacio++;
              } else if ($arrayRow->tipo == $key && $_POST[$value] != '') {
                $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
              }
            }
            // if ($arrayRow->tipo == 2 && $_POST['visiometria'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 2 && $_POST['visiometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 3 && $_POST['audiometria'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 3 && $_POST['audiometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 4 && $_POST['espirometria'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 4 && $_POST['espirometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 5 && $_POST['optometria'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 5 && $_POST['optometria'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 6 && $_POST['electrocardiogrma'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 6 && $_POST['electrocardiogrma'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 7 && $_POST['psicofisico'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 7 && $_POST['psicofisico'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 8 && $_POST['psicometrico'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 8 && $_POST['psicometrico'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 9 && $_POST['radiografia'] == '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 0 WHERE id = {$idHistoriControl}");
            // } else if ($arrayRow->tipo == 9 && $_POST['radiografia'] != '') {
            //   $queryUpdateParaclinicos = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = {$arrayObject->idHistoria}, proceso = 2 WHERE id = {$idHistoriControl}");
            // }
          }
        }
        echo 'Actualizar Historia';
        $queryResultInsertHistoria = mysqli_query(
          $conn3,
          "UPDATE historiaclinica6_labora SET cliente_id = $clienteId, usuario_id = $usuario_id, Fecha = '$fecha',
            Hora = '$hora', motivoConsulta = '$motivoConsulta', rEnfermedadactual = '$rEnfermedadactual', 
            riesgoContent = '$riesgoContent', rAntecedentes = '$rAntecedentes', rAntecedentes2 = '$rAntecedentes2', 
            rAntecedentes3 = '$rAntecedentes3', antecedenteContent = '$antecedenteContent', rAntecedentesGineco = '$rAntecedentesGineco', 
            rRevisionSistemas = '$rRevisionSistemas', Examen = '$Examen', Visiometria = '$Visiometria', 
            Audiometria = '$Audiometria', Espirometria = '$Espirometria', Impresion_Diagnostica = '$Impresion_Diagnostica', 
            recomendaciones_lista = '$recomendaciones_lista', examenLaboratorio = '$examenLaboratorio', Optometria = '{$Optometria}', 
            Electrocardiogrma = '{$Electrocardiogrma}', Psicofisico = '{$Psicofisico}', Psicometrico = '{$Psicometrico}', 
            Radiografia = '{$Radiografia}', SO_PlanTratamiento='$SO_PlanTratamiento', Antecedentes_Clinicos='$aClinicos' WHERE ID = {$arrayObject->idHistoria}"
        );

        ////////////    ACTUALIZAR TABLA DE OBJETIVOS ////////////////
        include 'includeActualizarObjetivosTerapiaOcupacional.php';
        ////////////    ACTUALIZAR TABLA DE OBJETIVOS ////////////////

        echo '<br>';
        echo '---------Proceso 1 Update-----------';
        if (!$queryResultInsertHistoria) {
          echo '<pre>';
          var_dump(mysqli_error_list($conn3));
          echo '</pre>';
        }
        // $historiaClinica1 = masterMaxId('ID', 'historiaclinica6_labora', 'historiaclinica6_labora');

        $Campo1 = mysqli_query($conn3, "show COLUMNS from examenFisico WHERE Field = 'nombre_historia';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `examenFisico` ADD `nombre_historia` TEXT NULL  COMMENT 'para identificar de que historia se esta haciendo uso *Creado desde modulo de guardar historia clinica laboral*'");
        }

        $queryResultExamenFisico = mysqli_query($conn3, "UPDATE examenFisico SET usuario_id = '$ID', cliente_id = '$clienteId', peso = '$peso', altura = '$altura', imc = '$imc', fcard = '$fcard', fechaHora = '$Afechar', nombre_historia='Laboral' WHERE historia_id = {$arrayObject->idHistoria};");
        if (!$queryResultExamenFisico) {
          echo '<pre>';
          var_dump(mysqli_error_list($conn3));
          echo '</pre>';
        }
      } else if ($arrayObject->tipo == 1 && $pase == 2) {
        echo 'Actualizar Historico';
        $historiaClinica1 = masterMaxId('ID', 'historiaclinica6_labora', 'historiaclinica6_labora', $clienteId);
        if ($vacio == 0) {
          $queryUpdateSalaControl = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 2 WHERE tipo = 1 AND idControl = $idControl");
          echo '<br>';
          echo '---------Proceso 2 Update historicoControl proceso = 2-----------';
          if (!$queryUpdateSalaControl) {
            echo '<pre>';
            var_dump(mysqli_error_list($conn3));
            echo '</pre>';
          }
        } else {
          $queryUpdateSalaControl = mysqli_query($conn3, "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 1 WHERE tipo = 1 AND idControl = $idControl");
          // echo "UPDATE historicoControl SET idHistoria = $historiaClinica1, proceso = 1 WHERE tipo = 2 AND idControl = $idControl";
          echo '<br>';
          echo '---------Proceso 2 Update historicoControl proceso = 1-----------';
          if (!$queryUpdateSalaControl) {
            echo '<pre>';
            var_dump(mysqli_error_list($conn3));
            echo '</pre>';
          }
        }
        $a--;
      } else if ($arrayObject->proceso == 2 && $pase == 1) {
        echo 'Comprobar Proceso Historico';
        $unLock++;
      }
    }
    if ($unLock < $queryNum2 && $pase == 1) {
      $a = 0;
    } else if ($unLock == $queryNum2 && $pase == 1) {
      $a = 0;
      echo '<br>';
      echo '---------Proceso 4 Update salaControl proceso = 1-----------';
      $queryUpdateSalaControls = mysqli_query($conn3, "UPDATE salaControl SET proceso = 1 WHERE idCliente = $clienteId AND proceso = 0");
    } else if ($pase == 3) {
      $pase = 2;
    } else if ($pase == 2) {
      $pase = 1;
    }
  } while ($a >= 1);
  if ($numRowOrden == 0) {
    $historiaID = masterMaxId('ID', 'historiaclinica6_labora', 'historiaclinica6_labora', $clienteId);
    $queryExamenUpdate = mysqli_query($conn3, "UPDATE generarOrden SET cargado = 1, idHistoria = {$historiaID} WHERE idCliente = {$clienteId} AND cargado = 0");
  }
}
var_dump(mysqli_error_list($conn3));
// ------------------------------------------------
// echo "INSERT INTO examenFisico (usuario_id, cliente_id, peso, altura, imc, ComposicionCorporal, estadoGeneral, estadoConciencia, ojos, otoscopia, cavidadOral, cuello, torax, corazon, abdomen, genitoUrinario, extremidades, vacularPeriferico, sistemaNervioso, pielAnexos, examenPartesdCuerpo, tart, temperatura, fcard, sat, fechaHora, historia_id, observacion) VALUES ('$idexamenFisico', '$ID', '$clienteId', '$peso', '$altura', '$imc', '$ComposicionCorporal', '$estadoGeneral', '$estadoConciencia', '$ojos', '$otoscopia', '$cavidadOral', '$cuello', '$torax', '$corazon', '$abdomen', '$genitoUrinario', '$extremidades', '$vacularPeriferico', '$sistemaNervioso', '$pielAnexos', '$examenPartesdCuerpo', '$examenFisico', '$temp', '$fcard', '$sat', '$Afechar', '$historiaClinica1', '$examenObservacion')";
if ($queryResultInsertHistoria) {

  // $queryFisico = mysqli_query($conn3, "SELECT MAX(id) as idexamenFisico from examenFisico");
  // $nrowl = mysqli_num_rows($queryFisico);
  // while ($rowFisi = mysqli_fetch_array($queryFisico)) {
  //   $idexamenFisico = $rowFisi['idexamenFisico'];
  // }

  //   $mensaje = ' Resultado de la consulta  con el Dr(a) *' . $NOMBRE_USUARIO . '*, *Procedimiento* ' . $procedimiento . ' *Tratamiento* ' . $tratamiento . '. ***Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte ALTE-MedicalSoft';
  //   // Whatsapp_sent($celular_cliente, $mensaje);

  //   $para = "$email";

  //   // título
  //   $título = ' Resultado de la consulta';

  //   // mensaje
  //   $mensaje = ' 
  // <html>
  // <head>
  //   <title>Resultado de la consulta</title>
  //     <table width="100%" height="466" border="0">
  //   <tr>
  //     <td><table width="100%" height="75" border="0">

  //     </table>
  //       <table width="100%" height="143" border="0">
  //         <tr>
  //           <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
  //             <tr>
  //               <td width="5%">&nbsp;</td>
  //               <td width="72%" style="color:#FFF;"><h1><strong>Resultado de la consulta </strong></h1></td>
  //               <td width="23%">&nbsp;</td>
  //             </tr>
  //           </table></td>
  //         </tr>
  //       </table>
  //       <table width="100%" height="122" border="0">
  // <tr>
  // <td width="10%">&nbsp;</td>
  // <td width="80%"><p>procedimiento</p>
  // <br />

  // <h3>  ' . $motivoConsulta . '  </h3> 

  // <br> 

  // </td>
  // <br />

  // <td width="10%">&nbsp;</td>
  // </tr>

  // <tr>
  // <td width="10%">&nbsp;</td>
  // <td width="80%"><p>tratamiento</p>
  // <br />

  // <h3>  ' . $tratamiento . '  </h3> 

  // <br> 

  // </td>
  // <br />






  // <td width="10%">&nbsp;</td>
  // </tr>
  // </table>

  // <p>Atentamente,<br />
  // ' . $NOMBRE_USUARIO . '</p> 

  //                       <table width="100%" border="0">
  //                         <tr>
  //                           <td height="21" bgcolor="#00A74B">&nbsp;</td>
  //                         </tr>
  //                       </table>
  //                       <table width="100%" height="64" border="0">
  //                         <tr>
  //                           <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a ' . $NOMBRE_USUARIO . '<br />
  //                          </td>
  //                         </tr>
  //                     </table></td>
  //                   </tr>
  //                 </table>
  //                 </head>
  //                 <body>

  //                 </body>
  //                 </html>
  //                 ';

  //   // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  //   $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
  //   $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  //   // Cabeceras adicionales
  //   $cabeceras .= 'To: ' . $NOMBRE_USUARIO . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
  //   $cabeceras .= 'From: Resultado de la consulta <noreply@medicalsoftcolombia.com>' . "\r\n";
  //   $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
  //   $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

  //   // Enviarlo
  //   // mail($para, $título, $mensaje, $cabeceras);


  //   $verficar = date("Y-m-d");


  //   if ($Afecha > $verficar) {

  //     echo '<br> CALENDARIO  1 1' . $verficar . ' <br>';

  //     $mensaje = ' Sr(a) *' . $nombre . '* usted a agendado un cita médica con Dr(a) *' . $doctor . '* el dia *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte ALTE-MedicalSoft';
  //     // Whatsapp_sent($telefono, $mensaje);


  //     $mensaje2 = ' Dr(a) *' . $doctor . '*  se a agendado  una cita con la paciente *' . $nombre . '*,  *' . $fecha . '* a las *' . $Hora . '* en *' . $sucursal . '*. Motivo: *' . $motivoConsulta . '* Atte ALTE MedicalSoft';
  //     // Whatsapp_sent($whatsapp, $mensaje2);

  //     // mysqli_query($conn3, "INSERT INTO citas (doctor, fecha, Hora, nombre, telefono, correo, motivoConsulta, estado, registrado, usuario_id , tipo) 
  //     //               VALUES ('$doctor', '$Afecha', '$Ahora', '$nombre', '$telefono', '$email', '$motivo', '1', '$Afechar', '$ID', '0')");


  //     $para = "$email";

  //     // título
  //     $título = ' Cita Agendada';

  //     // mensaje
  //     $mensaje = ' 
  //                 <html>
  //                 <head>
  //                   <title>Cita Agendada</title>
  //                     <table width="100%" height="466" border="0">
  //                   <tr>
  //                     <td><table width="100%" height="75" border="0">

  //                     </table>
  //                       <table width="100%" height="143" border="0">
  //                         <tr>
  //                           <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
  //                             <tr>
  //                               <td width="5%">&nbsp;</td>
  //                               <td width="72%" style="color:#FFF;"><h1><strong>Cita Agendada</strong></h1></td>
  //                               <td width="23%">&nbsp;</td>
  //                             </tr>
  //                           </table></td>
  //                         </tr>
  //                       </table>
  //                       <table width="100%" height="122" border="0">
  // <tr>
  // <td width="10%">&nbsp;</td>
  // <td width="80%"><p>Cita Agendada por el doctor(a) ' . $NOMBRE_USUARIO . '</p>
  // <br />

  // <h3>  Se a  agendado un cita para ustes el dia <strong>  ' . $Afecha . ' </strong> a las  <strong>   ' . $Ahora . '  </strong>  , Motivo:  <strong>  ' . $motivo . ' </strong>   </h3> 

  // <br> 

  // </td>
  // <br />



  // <td width="10%">&nbsp;</td>
  // </tr>

  // </table>

  // <p>Atentamente,<br />
  // ' . $NOMBRE_USUARIO . '</p> 

  //       <table width="100%" border="0">
  //         <tr>
  //           <td height="21" bgcolor="#00A74B">&nbsp;</td>
  //         </tr>
  //       </table>
  //       <table width="100%" height="64" border="0">
  //         <tr>
  //           <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, Contactart a ' . $NOMBRE_USUARIO . '<br />
  //          </td>
  //         </tr>
  //     </table></td>
  //   </tr>
  // </table>
  // </head>
  // <body>

  // </body>
  // </html>
  // ';

  //     // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  //     $cabeceras  = ' MIME-Version: 1.0' . "\r\n";
  //     $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  //     // Cabeceras adicionales
  //     $cabeceras .= 'To: ' . $NOMBRE_USUARIO . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
  //     $cabeceras .= 'From: Resultado de su Cita <noreply@medicalsoftcolombia.com>' . "\r\n";
  //     $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
  //     $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

  //     // Enviarlo
  //     mail($para, $título, $mensaje, $cabeceras);
  //   }
  if ($vacio > 0) {
    echo "<script language='Javascript'> window.location='SO_SalaControl?idCliente=$clienteId';</script>";
  } else {
    echo $vacio;
    echo "--Afiliar Concepto--<br><pre>";
    $historiaClinica1 = masterMaxId('ID', 'historiaclinica6_labora', 'historiaclinica6_labora', $clienteId);
    $afiliarConcepto = mysqli_query($conn3, "INSERT INTO conceptolaboral SET cliente_id = '{$clienteId}', usuario_id = '{$usuario_id}', idHistoria = '{$historiaClinica1}', Fecha = now(), Hora = now()") or die(var_dump(mysqli_error_list($conn3)));
    if ($afiliarConcepto) {
      $conceptoLaboral = masterMaxId('id', 'conceptolaboral', 'conceptolaboral', $clienteId . " AND idHistoria = {$historiaClinica1}");
      $updateHistoria = mysqli_query($conn3, "UPDATE historiaclinica6_labora SET certificado = '{$conceptoLaboral}' WHERE id = {$historiaClinica1}") or die(var_dump(mysqli_error_list($conn3)));
      if ($updateHistoria) {
        echo "<script language='Javascript'> window.location='SO_HistoriaConceptoLaboral?clienteId={$clienteId}&id={$conceptoLaboral}';</script>";
      }
    }
    echo "</pre>";
  }
}
