    <?php
$queryList = mysqli_query($conn3, "SELECT * FROM historiaclinica6_labora where cliente_id = {$idCliente} order by ID DESC");
$nrowl = mysqli_num_rows($queryList);
$contadorHistoria = 1;
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
    $ID                 = $row_recordset32['ID'];
    $Fecha                 = $row_recordset32['Fecha'];
    $Hora                  = $row_recordset32['Hora'];
    $motivoConsulta      = $row_recordset32['motivoConsulta'];
    $cliente_id      = $row_recordset32['cliente_id'];
    $usuario_id      = $row_recordset32['usuario_id'];
    $Fecha           = $row_recordset32['Fecha'];
    $Hora            = $row_recordset32['Hora'];
    $rDCargo            = $row_recordset32['rDCargo'];
    $rRevisionSistemas            = explode("&nbsp;|/&nbsp;", $row_recordset32['rRevisionSistemas']);
    $rFtmii             = $row_recordset32['rFtmii'];
    $rAntecedentespp            = $row_recordset32['rAntecedentespp'];
    $rCheckBox            = $row_recordset32['rCheckBox'];
    $Entidad_Salud      = $row_recordset32['Entidad_Salud'];
    $rAntecedentes            = explode(" || ", $row_recordset32['rAntecedentes']);
    $rAntecedentes2            = explode(" || ", $row_recordset32['rAntecedentes2']);
    $rAntecedentes3            = explode(" || ", $row_recordset32['rAntecedentes3']);
    $rEnfermedadactual            = explode(" || ", $row_recordset32['rEnfermedadactual']);
    $rAntecedentesgo            = $row_recordset32['rAntecedentesgo'];
    $rInformacionGL            = $row_recordset32['rInformacionGL'];
    $rTratamiento            = $row_recordset32['rTratamiento'];
    $rHabitos            = $row_recordset32['rHabitos'];
    $rInmuniza            = $row_recordset32['rInmuniza'];
    $rValoracion            = $row_recordset32['rValoracion'];
    $rPruebasC            = $row_recordset32['rPruebasC'];
    $rAPF               = $row_recordset32['rAPF'];
    $rempresa           = $row_recordset32['empresa'];
    $rnit               = $row_recordset32['nit'];
    $ractividad           = $row_recordset32['actividad'];
    $eps                = $row_recordset32['eps'];
    $arl                = $row_recordset32['arl'];
    $fondo              = $row_recordset32['fondo'];
    $Apto_Recomendaciones = $row_recordset32['Apto_Recomendaciones'];
    $Continuar_Labor = $row_recordset32['Continuar_Labor'];
    $Continuar_Recomendaciones = $row_recordset32['Continuar_Recomendaciones'];
    $Retiro_Sin_Patologia = $row_recordset32['Retiro_Sin_Patologia'];
    $Retiro_Con_Patologia = $row_recordset32['Retiro_Con_Patologia'];
    $tipo    = $row_recordset32['tipo'];
    $rTheEnd     = $row_recordset32['rValoracion'];
    $rInformacion     = $row_recordset32['rInformacion'];
    $rAntecedentesvacunacion     = $row_recordset32['rAntecedentesvacunacion'];
    $rAntecedentesGineco     = explode(' || ', $row_recordset32['rAntecedentesGineco']);
    $accidentesLaborales     = $row_recordset32['accidentesLaborales'];
    $consentimiento     = $row_recordset32['consentimiento'];
    $revisionsiste     = $row_recordset32['revisionsiste'];
    $Reusltado_paraclinicos     = $row_recordset32['Reusltado_paraclinicos'];
    $Impresion_Diagnostica     = explode(" || ", $row_recordset32['Impresion_Diagnostica']);
    $comentarios_examen     = $row_recordset32['comentarios_examen'];
    $Examen     = explode(' || ', $row_recordset32['Examen']);
    $antecedenteContent = explode(' || ', $row_recordset32['antecedenteContent']);
    $riesgoContent = explode(" || ", $row_recordset32['riesgoContent']);
    $osteomuscular_columna = $row_recordset32['osteomuscular_columna'];
    $osteomuscular_mcervical = $row_recordset32['osteomuscular_mcervical'];
    $osteomuscular_mlumbar = $row_recordset32['osteomuscular_mlumbar'];
    $osteomuscular_marcha = $row_recordset32['osteomuscular_marcha'];
    $osteomuscular_msuperiores = $row_recordset32['osteomuscular_msuperiores'];
    $osteomuscular_codos = $row_recordset32['osteomuscular_codos'];
    $osteomuscular_manos = $row_recordset32['osteomuscular_manos'];
    $osteomuscular_caderas = $row_recordset32['osteomuscular_caderas'];
    $osteomuscular_rodilla = $row_recordset32['osteomuscular_rodilla'];
    $osteomuscular_tobillo = $row_recordset32['osteomuscular_tobillo'];
    $osteomuscular_osteotendinosos = $row_recordset32['osteomuscular_osteotendinosos'];
    $osteomuscular_fuerza = $row_recordset32['osteomuscular_fuerza'];
    $osteomuscular_resultado = $row_recordset32['osteomuscular_resultado'];
    $f_altura_antecedentes = $row_recordset32['f_altura_antecedentes'];
    $f_altura_vertigo = $row_recordset32['f_altura_vertigo'];
    $f_altura_perdida_equilibrio = $row_recordset32['f_altura_perdida_equilibrio'];
    $f_altura_examen_fisico = $row_recordset32['f_altura_examen_fisico'];
    $recomendaciones_patologicas = $row_recordset32['recomendaciones_patologicas'];
    $recomendaciones_lista = explode(" || ", $row_recordset32['recomendaciones_lista']);
    $Visiometria = $row_recordset32['Visiometria'];
    $Audiometria = $row_recordset32['Audiometria'];
    $Espirometria = $row_recordset32['Espirometria'];
    $Optometria = $row_recordset32['Optometria'];
    $Electrocardiogrma = $row_recordset32['Electrocardiogrma'];
    $Psicofisico = $row_recordset32['Psicofisico'];
    $Psicometrico = $row_recordset32['Psicometrico'];
    $Radiografia = $row_recordset32['Radiografia'];

    $queryListEF = mysqli_query($conn3, "SELECT * FROM  examenFisico where cliente_id = {$cliente_id} and usuario_id = {$_SESSION['ID']} and historia_id = '{$ID}'");
    $nrowlEF = mysqli_num_rows($queryListEF);
    while ($row_recordsetEF = mysqli_fetch_array($queryListEF)) {
        $peso     = $row_recordsetEF['peso'];
        $altura    = $row_recordsetEF['altura'];
        $imc         = $row_recordsetEF['imc'];
        $ComposicionCorporal  = $row_recordsetEF['ComposicionCorporal'];
        $eg          = $row_recordsetEF['estadoGeneral'];
        $conciencia  = $row_recordsetEF['estadoConciencia'];
        $ojos    = $row_recordsetEF['ojos'];
        $ostocopia    = $row_recordsetEF['otoscopia'];
        $cavidad           = $row_recordsetEF['cavidadOral'];
        $cuello         = $row_recordsetEF['cuello'];
        $torax   = $row_recordsetEF['torax'];
        $corazo   = $row_recordsetEF['corazon'];
        $abdomen        = $row_recordsetEF['abdomen'];
        $urinario = $row_recordsetEF['genitoUrinario'];
        $extremidades  = $row_recordsetEF['extremidades'];
        $nervioso     = $row_recordsetEF['sistemaNervioso'];
        $piel  = $row_recordsetEF['pielAnexos'];
        $vacularPeriferico    = $row_recordsetEF['vacularPeriferico '];
        $partes        = $row_recordsetEF['examenPartesdCuerpo'];
        $tart         = $row_recordsetEF['tart'];
        $tc  = $row_recordsetEF['temperatura'];
        $card   = explode(" || ", $row_recordsetEF['fcard']);
        $sat  = $row_recordsetEF['sat'];
        $vacularPeriferico    = $row_recordsetEF['vacularPeriferico'];
        $observacion    = $row_recordsetEF['observacion'];
    }


?>

    <div class="panel panel-default">
        <div class="panel-heading" role="tab" id="heading<?= $contadorHistoria ?>">
            <h4 class="panel-title">
                <a class="collapse-controle collapsed text-black text-bold" data-toggle="collapse" data-parent="#accordion" href="#collapse<?= $contadorHistoria ?>" aria-expanded="false" aria-controls="collapse<?= $contadorHistoria ?>">
                    <?= $contadorHistoria ?> - Historia del <?= $Fecha ?> | <?= $Hora ?>
                    <span class="text-black" title="Imprimir Historia" onclick="window.open('certificadolaboral/<?= $ID ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-print"></i></span>
                    <span class="text-black" title="Enviar Historia" onclick="window.location.href ='SO_EnviarGeneral.php?historiaClinicaocupacional=<?= $ID ?>&modo=historiaOcupacional'" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-send"></i></span>
                    <!-- <span class="text-black" title="Imprimir Incapacidad" onclick="window.open('imprimirDiscapacidad.php?historiaClinica1=<?= $ID ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-crutch"></i></span>
                            <span class="text-black" title="Imprimir Inter-Consulta" onclick="window.open('imprimirInterconsulta.php?historiaClinica1=<?= $ID ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-notes-medical"></i></span>
                            <span class="text-black" title="Imprimir Examenes" onclick="window.open('imprimirExamenes.php?historiaClinica1=<?= $ID ?>&modoExamanes=todo')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-hand-holding-medical"></i></span>
                            <span class="text-black" title="Imprimir Recetas" onclick="window.open('imprimirRecetaH.php?idr=<?= $receta ?>&cliente=<?= $cliente_id ?>')" style="z-index: 100; cursor:pointer;margin-left: 10px;"><i class="fa fa-prescription-bottle"></i></span> -->
                    <span class="expand-icon-wrap"><i class="fa expand-icon"></i></span>
                </a>
            </h4>
        </div>
        <div id="collapse<?= $contadorHistoria ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $contadorHistoria ?>" aria-expanded="false">
            <div class="panel-body">
                <div class="panel-body-icon"><i class="fa fa-book"></i></div>
                <div align="right">
                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                </div>

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
                                        <h5><span style="font-weight: bold;">Días incapacidad:<br></span>
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
                                        <h5><span style="font-weight: bold;">Tóxico/alérgicos:<br></span>
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
                                        <h5><span style="font-weight: bold;">Piel y faneras:<br></span>
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
                                        <h5><span style="font-weight: bold;">Tensión arterial mm/Hg:<br></span>
                                            <?php
                                            echo $card[1];
                                            ?>
                                        </h5>
                                    </div>
                                <?php endif; ?>
                                <?php if (strlen($card[2]) > 0) : ?>
                                    <div class="col-md-4">
                                        <h5><span style="font-weight: bold;">Fc minuto:<br></span>
                                            <?php
                                            echo $card[2];
                                            ?>
                                        </h5>
                                    </div>
                                <?php endif; ?>
                                <?php if (strlen($card[3]) > 0) : ?>
                                    <div class="col-md-4">
                                        <h5><span style="font-weight: bold;">Fr minuto:<br></span>
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

                    <?php $queryOrdenExamen = mysqli_query($conn3, "SELECT lb.nombreExamen AS nombreExamen, a.resultado AS resultado FROM generarOrden AS o JOIN examanesAsignados AS a ON o.id = a.idOrden JOIN examenesLB AS lb ON a.idExamen = lb.id WHERE o.idCliente = {$cliente_id} AND o.idHistoria = {$ID} AND o.cargado = 1 order by a.id;");
                    $numTotal = mysqli_num_rows($queryOrdenExamen);
                    if ($numTotal > 0) : ?>
                        <div class="col-md-12 text-center">
                            <h5><span style="font-weight: bold;">Resultados Exámenes de Laboratorio</h4></span>
                        </div>
                        <div class="col-md-12">
                            <div class="row">
                                <?php while ($arrayOrden = mysqli_fetch_array($queryOrdenExamen)) { ?>
                                    <div class="col-md-4">
                                        <h5><span style="font-weight: bold;"><?= $arrayOrden['nombreExamen'] ?>:<br></span>
                                            <?= $arrayOrden['resultado'] ?>
                                        </h5>
                                    </div>
                                <?php } ?>
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

                </div>


            </div>
        </div>
    </div>
<?php
    $contadorHistoria++;
}
?>