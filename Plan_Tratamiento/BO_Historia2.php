<?php
include '../header.php';
include '../menu.php';

$cliente_id = $_GET['clienteId'];
$tabla = "Historia_Clinica_Ortodoncia_Bo";
$page = "PT_FinalizadoHistoria";
$idUpdate = base64_decode($_GET['FAID']);
$antecedentesPersonales = [];
$habitos = [];
$deglucion = [];

if (isset($_GET['FAID'])) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  {$tabla} where id=$idUpdate limit 1");
    $rowDatos = null;
    if ($queryList) {
        while ($rowMotorizado = mysqli_fetch_assoc($queryList)) {
            $cliente_id = $rowMotorizado['cliente_id'];
            $rowDatos = $rowMotorizado;
            $antecedentesPersonales = $rowDatos['antecedentes_p'];
            $antecedentesPersonales = explode("|/|", $antecedentesPersonales);
          
            $resalte = $rowDatos['resalte'];
            $resalte = explode(" ", $resalte);
            $angle_molar_derecha = $rowDatos['angle_molar_derecha'];
            $angle_molar_derecha = explode(" ", $angle_molar_derecha);
            $prueba = $angle_molar_derecha;
            $angle_molar_izquierda = $rowDatos['angle_molar_izquierda'];
            $angle_molar_izquierda = explode(" ", $angle_molar_izquierda);
            $angle_canina_derecha = $rowDatos['angle_canina_derecha'];
            $angle_canina_derecha = explode(" ", $angle_canina_derecha);
            $angle_canina_izquierda = $rowDatos['angle_canina_izquierda'];
            $angle_canina_izquierda = explode(" ", $angle_canina_izquierda);
            $entrecruzamiento = $rowDatos['entrecruzamiento'];
            $entrecruzamiento = explode(" ", $entrecruzamiento);
            $linea_m_desviada = $rowDatos['linea_m_desviada'];
            $linea_m_desviada = explode(" ", $linea_m_desviada);
            $curva_spee = $rowDatos['curva_spee'];
            $curva_spee = explode(" ", $curva_spee);
            $ATM = $rowDatos['ATM'];
            $ATM = explode(" ", $ATM);
            $perfil_facial = $rowDatos['perfil_facial'];
            $perfil_facial = explode(" ", $perfil_facial);
            $tercio_facial = $rowDatos['tercio_facial'];
            $tercio_facial = explode(" ", $tercio_facial);
            $relacion_labial = $rowDatos['relacion_labial'];
            $relacion_labial = explode(" ", $relacion_labial);
            $linea_sonrisa = $rowDatos['linea_sonrisa'];
            $linea_sonrisa = explode(" ", $linea_sonrisa);
            $respiracion = $rowDatos['respiracion'];
            $respiracion = explode(" ", $respiracion);
            $deglucion = $rowDatos['deglucion'];
            $deglucion = explode(" ", $deglucion);
            $fonacion = $rowDatos['fonacion'];
            $fonacion = explode(" ", $fonacion);

            $habitos = $rowDatos['habitos'];
            $habitos = explode(" ", $habitos);
            $migracion_segmento = $rowDatos['migracion_segmento'];
            $migracion_segmento = explode("|/|", $migracion_segmento);
            $migracion_linea = $rowDatos['migracion_linea'];
            $migracion_linea = explode("|/|", $migracion_linea);
            $mordida_cruzada_anterior = $rowDatos['mordida_cruzada_anterior'];
            $mordida_cruzada_anterior = explode("|/|", $mordida_cruzada_anterior);
            $mordida_cruzada_posterior = $rowDatos['mordida_cruzada_posterior'];
            $mordida_cruzada_posterior = explode("|/|", $mordida_cruzada_posterior);
            $arcada_mesial = $rowDatos['arcada_mesial'];
            $arcada_mesial = explode("|/|", $arcada_mesial);
            $suma_dent_mesial = $rowDatos['suma_dent_mesial'];
            $suma_dent_mesial = explode("|/|", $suma_dent_mesial);

            $discrepancia = $rowDatos['discrepancia'];
            $discrepancia = explode("|/|", $discrepancia);
            $total_nance = $rowDatos['total_nance'];
            $total_nance_inferior = $rowDatos['total_nance_inferior'];

            $piezas = $rowDatos['piezas_nance'];
            $piezas = explode("|/|", $piezas);

            $piezas_inferior = $rowDatos['piezas_nance_inferior'];
            $piezas_inferior = explode("|/|", $piezas_inferior);
            
           

            $anchoMesiodistal = $rowDatos['ancho_mesiodistal'];
            $anchoMesiodistal = explode("|/|", $anchoMesiodistal);

            $anchoMesiodistal_inferior = $rowDatos['ancho_mesiodistal_inferior'];
            $anchoMesiodistal_inferior = explode("|/|", $anchoMesiodistal_inferior);

            $relacion_mesiodistal = $rowDatos['relacion_msiodistal'];
            $relacion_mesiodistal = explode("|/|", $relacion_mesiodistal);

            $relacion_mesiodistal_inferior = $rowDatos['relacion_msiodistal_inferior'];
            $relacion_mesiodistal_inferior = explode("|/|", $relacion_mesiodistal_inferior);


            $relacion_77 = $rowDatos['relacion_77'];
            $relacion_77 = explode("|/|", $relacion_77);
            $relacion_77_inferior = $rowDatos['relacion_77_inferior'];

            $indice_wala_izq = $rowDatos['wala_izq'];
            $indice_wala_izq = explode("|/|", $indice_wala_izq);

            $indice_wala_der = $rowDatos['wala_der'];
            $indice_wala_der = explode("|/|", $indice_wala_der);
        }
    }
}

// -----------------------------------------------------
//             automaticForm
//------------------------------------------------------


$ID_principal = $_SESSION['ID_principal'];
$usuario_id = $_SESSION['ID'];

$queryCliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = $cliente_id");
while ($row = mysqli_fetch_assoc($queryCliente)) {
    $primer_nombre = $row['primer_nombre'];
    $segundo_nombre = $row['segundo_nombre'];
    $primer_apellido = $row['primer_apellido'];
    $segundo_apellido = $row['segundo_apellido'];
    $nombre_cliente = $row['nombre_cliente'];
    $genero = $row['genero'];
    $peso = $row['peso'];
    $fechaNacimiento = $row['fechaNacimiento'];
    $ocupacion = $row['ocupacion'];
    $direccion = $row['direccion_cliente'];
    $telefono    = $row['telefono_cliente'];
    $whatsapp = $row['whatsapp'];
    $antecedentesFamiliares = $row['enfermedadesPequeno'];
    $antecedentesPersonales = $row['enfermedadesGrande'];
    $ap1 = $row['ap1'];
    $ap2 = $row['ap2'];
    $ap3 = $row['ap3'];
    $ap4 = $row['ap4'];
    $ap5 = $row['ap5'];
    $ap6 = $row['ap6'];
    $ap7 = $row['ap7'];
    $ap8 = $row['ap8'];
    $ap9 = $row['ap9'];
    $arregloAntecedentes = [
        'Alergia a AINES'  => $ap1,
        'Asma' => $ap2,
        'HTA' => $ap3,
        'Diabetes' => $ap4,
        'Hipotiroidismo' => $ap5,
        'Tabaquismo' => $ap6,
        'Licor' => $ap7,
        'Alergias' => $ap8,
        'Cirugías' => $ap9
    ];
    $arregloFinal = '';
    foreach ($arregloAntecedentes as $key => $value) {
        if ($value == '1') {
            $arregloFinal .=  ($arregloFinal ? ', ' : '')  . $key;
        }
    }
}


?>


<div class="content-wrapper p-3">
    <section class="content">
        <div class="col-xs-12">
            <div class="row">
                <div class="col-md-12">
                    <form action="" id="Historia_Ortodoncia_Bo" method="POST">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <label for="">Historia de Ortodoncia</label>
                                </div>

                            </div>
                            <div class="card-body">
                                <div id="accordion" bis_skin_checked="1">
                                    <div class="card card-info" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Datos Personales</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-minus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: block;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12 row">
                                                            <div class="form-group col-md-9">
                                                                 
                                                                <label for="">Nombre y Apellido</label>
                                                                <input type="text" class="form-control input-lg" id="" name="" readonly value="<?= $nombre_cliente ?>">
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="">Fecha de Nacimiento </label>
                                                                <input type="date" class="form-control input-lg" id="" name="" value="<?= $fechaNacimiento ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-9">
                                                                <label for="">Direccion</label>
                                                                <input type="text" class="form-control input-lg" id="" name="" value="<?= $direccion ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-3">
                                                                <label for="">Fecha </label>
                                                                <input type="date" class="form-control input-lg" id="" name="datos[fechaOperacion]" value="<?= ($rowMotorizado ? $rowMotorizado['fechaOperacion'] : date('Y-m-d')) ?>" required>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Telefono</label>
                                                                <input type="text" class="form-control input-lg" id="" name="" value="<?= $whatsapp ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Teléfono Referencia</label>
                                                                <input type="text" class="form-control input-lg" id="nombres" name="" value="<?= $telefono ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Genero</label>
                                                                <input type="text" class="form-control input-lg" id="nombres" name="" readonly value="<?= $genero ?>" readonly>
                                                            </div>
                                                            <div class="form-group col-md-6">
                                                                <label for="">Edad</label>
                                                                <input type="text" class="form-control input-lg" id="nombres" name="" readonly value="<?= CalculoEdadPaciente($fechaNacimiento) ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 row">



                                                        </div>
                                                        <div class="col-md-12">


                                                            <div class="col-md-12">
                                                                <label for="">Antecedentes Familiares:</label>
                                                                <input type="text" class="form-control input-lg" id="nombres" name="" value="<?= $antecedentesFamiliares ?>" readonly>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">Antecedentes Personales:</label>
                                                                <input type="text" class="form-control input-lg" id="nombres" name="" value="<?= $arregloFinal ?>" readonly>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <label for="">Motivo de Consulta: </label>
                                                                <input type="text" class="form-control input-lg" id="nombres" name="datos[motivo_consulta]"  value="<?= $rowDatos['motivo_consulta'] ?>">
                                                            </div>
                                                            <h3 class="text-center">Análisis Clínico</h3>
                                                            <div class="col-md-12 row">
                                                                <div class="col-md-8">
                                                                    <label for="">Desarrollo General:</label>
                                                                    <input type="text" class="form-control input-lg" id="nombres" name="datos[desarrollo_general]" value=" <?= $rowDatos['desarrollo_general'] ?>">
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="">Peso</label>
                                                                    <input type="text" class="form-control input-lg" id="nombres" name="" value="<?= $peso ?>" readonly>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <label for="">Talla</label>
                                                                    <input type="text" class="form-control input-lg" id="nombres" name="datos[talla]" value=" <?=  $rowDatos['talla'] ?>">
                                                                </div>
                                                                <div class="col-md-8">
                                                                    <label for="">Desarrollo Intelectual:</label>
                                                                    <input type="text" class="form-control input-lg" id="nombres" name="datos[desarrollo_intelectual]" value=" <?= $rowDatos['desarrollo_intelectual'] ?>">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Grado:</label>
                                                                    <input type="text" class="form-control input-lg" id="nombres" name="datos[grado]" value="<?= $rowDatos['grado']?>">
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <label for="">Estado Periodontal:</label>
                                                                    <input type="text" class="form-control input-lg" id="nombres" name="datos[estado_periodontal]" value=" <?= $rowDatos['estado_periodontal']?>">
                                                                </div>
                                                            </div>
                                                            <div class="col-md-12">
                                                                <div class="col-md-12">
                                                                    <label for="">Dentición Actual:</label>

                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Analisis de la Oclusión</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="col-md-12 row">
                                                    <div class="col-md-6 ">
                                                        <div class="col-md-6 ">
                                                            Clase de Angle molar derecha: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_molar_derecha1" name="datos[angle_molar_derecha]" <?= (isset($angle_molar_derecha) && in_array("Clase1", $angle_molar_derecha)) ? "checked" : "" ?> value="Clase1">
                                                                    <label for="angle_molar_derecha1">Clase 1
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_molar_derecha2" name="datos[angle_molar_derecha]" value="Clase2" <?= (isset($angle_molar_derecha) && in_array("Clase2", $angle_molar_derecha)) ? "checked" : "" ?>>
                                                                    <label for="angle_molar_derecha2">Clase 2
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_molar_derecha3" name="datos[angle_molar_derecha]" value="Clase3" <?= (isset($angle_molar_derecha) && in_array("Clase3", $angle_molar_derecha)) ? "checked" : "" ?>>
                                                                    <label for="angle_molar_derecha3">Clase 3
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-6 ">
                                                            Clase de Angle molar izquierda <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_molar_izquierda1" name="datos[angle_molar_izquierda]" <?= (isset($angle_molar_izquierda) && in_array("Clase1", $angle_molar_izquierda)) ? "checked" : "" ?> value="Clase1">
                                                                    <label for="angle_molar_izquierda1">Clase 1
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_molar_izquierda2" name="datos[angle_molar_izquierda]" value="Clase2" <?= (isset($angle_molar_izquierda) && in_array("Clase2", $angle_molar_izquierda)) ? "checked" : "" ?>>
                                                                    <label for="angle_molar_izquierda2">Clase 2
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_molar_izquierda3" name="datos[angle_molar_izquierda]" value="Clase3" <?= (isset($angle_molar_izquierda) && in_array("Clase3", $angle_molar_izquierda)) ? "checked" : "" ?>>
                                                                    <label for="angle_molar_izquierda3">Clase 3
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="col-md-12 ">
                                                            Clase de Angle canina derecha: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_canina_derecha1" name="datos[angle_canina_derecha]" <?= (isset($angle_canina_derecha) && in_array("Clase1", $angle_canina_derecha)) ? "checked" : "" ?> value="Clase1">
                                                                    <label for="angle_canina_derecha1">Clase 1
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_canina_derecha2" name="datos[angle_canina_derecha]" value="Clase2" <?= (isset($angle_canina_derecha) && in_array("Clase2", $angle_canina_derecha)) ? "checked" : "" ?>>
                                                                    <label for="angle_canina_derecha2">Clase 2
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_canina_derecha3" name="datos[angle_canina_derecha]" value="Clase3" <?= (isset($angle_canina_derecha) && in_array("Clase3", $angle_canina_derecha)) ? "checked" : "" ?>>
                                                                    <label for="angle_canina_derecha3">Clase 3
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            Clase de Angle canina izquierda <br>
                                                            <div class="form-group">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_canina_izquierda1" name="datos[angle_canina_izquierda]" <?= (isset($angle_canina_izquierda) && in_array("Clase1", $angle_canina_izquierda)) ? "checked" : "" ?> value="Clase1">
                                                                    <label for="angle_canina_izquierda1">Clase 1
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_canina_izquierda2" name="datos[angle_canina_izquierda]" value="Clase2" <?= (isset($angle_canina_izquierda) && in_array("Clase2", $angle_canina_izquierda)) ? "checked" : "" ?>>
                                                                    <label for="angle_canina_izquierda2">Clase 2
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="angle_canina_izquierda3" name="datos[angle_canina_izquierda]" value="Clase3" <?= (isset($angle_canina_izquierda) && in_array("Clase3", $angle_canina_izquierda)) ? "checked" : "" ?>>
                                                                    <label for="angle_canina_izquierda3">Clase 3
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="col-md-12">

                                                            Resalte:<br>
                                                            <div class="form-group">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="resalte1" name="datos[resalte]" <?= (isset($resalte) && in_array("Aumentado", $resalte)) ? "checked" : "" ?> value="Aumentado">
                                                                    <label for="resalte1">Aumentado
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="resalte2" name="datos[resalte]" value="Normal" <?= (isset($resalte) && in_array("Normal", $resalte)) ? "checked" : "" ?>>
                                                                    <label for="resalte2">Normal
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="resalte3" name="datos[resalte]" value="Negativo" <?= (isset($resalte) && in_array("Negativo", $resalte)) ? "checked" : "" ?>>
                                                                    <label for="resalte3">Negativo
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">

                                                            Entrecruzamiento:<br>
                                                            <div class="form-group">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="entrecruzamiento1" name="datos[entrecruzamiento]" <?= (isset($resalte) && in_array("Aumentado", $entrecruzamiento)) ? "checked" : "" ?> value="Aumentado">
                                                                    <label for="entrecruzamiento1">Aumentado
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="entrecruzamiento2" name="datos[entrecruzamiento]" value="Normal" <?= (isset($entrecruzamiento) && in_array("Normal", $entrecruzamiento)) ? "checked" : "" ?>>
                                                                    <label for="entrecruzamiento2">Normal
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="entrecruzamiento3" name="datos[entrecruzamiento]" value="Negativo" <?= (isset($entrecruzamiento) && in_array("Negativo", $entrecruzamiento)) ? "checked" : "" ?>>
                                                                    <label for="entrecruzamiento3">Negativo
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">

                                                            Linea Media Desviada:<br>
                                                            <div class="form-group">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="Superior" name="datos[linea_m_desviada]" <?= (isset($entrecruzamiento) && in_array("Superior", $linea_m_desviada)) ? "checked" : "" ?> value="Superior">
                                                                    <label for="Superior">Click
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="Inferior" name="datos[linea_m_desviada]" value="Normal" <?= (isset($linea_m_desviada) && in_array("Normal", $linea_m_desviada)) ? "checked" : "" ?>>
                                                                    <label for="Inferior">Inferior
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="Normal" name="datos[linea_m_desviada]" value="Negativo" <?= (isset($linea_m_desviada) && in_array("Negativo", $linea_m_desviada)) ? "checked" : "" ?>>
                                                                    <label for="Normal">Normal
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 ">
                                                        <div class="col-md-12">

                                                            Curva de Spee:<br>
                                                            <div class="form-group">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="curva_spee1" name="datos[curva_spee]" <?= (isset($curva_spee) && in_array("Aumentado", $curva_spee)) ? "checked" : "" ?> value="Aumentado">
                                                                    <label for="curva_spee1">Aumentado
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="curva_spee2" name="datos[curva_spee]" value="Normal" <?= (isset($curva_spee) && in_array("Normal", $curva_spee)) ? "checked" : "" ?>>
                                                                    <label for="curva_spee2">Normal
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="curva_spee3" name="datos[curva_spee]" value="Negativo" <?= (isset($curva_spee) && in_array("Negativo", $curva_spee)) ? "checked" : "" ?>>
                                                                    <label for="curva_spee3">Negativo
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">

                                                            ATM:<br>
                                                            <div class="form-group">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="ATM1" name="datos[ATM]" <?= (isset($ATM) && in_array("Click", $ATM)) ? "checked" : "" ?> value="Click">
                                                                    <label for="ATM1">Click
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="ATM2" name="datos[ATM]" value="Chasquido" <?= (isset($ATM) && in_array("Chasquido", $ATM)) ? "checked" : "" ?>>
                                                                    <label for="ATM2">Chasquido
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="ATM3" name="datos[ATM]" value="Dolor" <?= (isset($ATM) && in_array("Dolor", $ATM)) ? "checked" : "" ?>>
                                                                    <label for="ATM3">Dolor
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Análisis Facial</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6 ">
                                                            Perfil Facial: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="perfil_facial" name="datos[perfil_facial]" <?= (isset($perfil_facial) && in_array("Convexo", $perfil_facial)) ? "checked" : "" ?> value="Convexo">
                                                                    <label for="perfil_facial">Convexo
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="perfil_facial2" name="datos[perfil_facial]" value="Recto" <?= (isset($perfil_facial) && in_array("Recto", $perfil_facial)) ? "checked" : "" ?>>
                                                                    <label for="perfil_facial2">Recto
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="perfil_facial3" name="datos[perfil_facial]" value="Concavo" <?= (isset($perfil_facial) && in_array("Concavo", $perfil_facial)) ? "checked" : "" ?>>
                                                                    <label for="perfil_facial3">Concavo
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            Terfcio Facial Inf. <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="tercio_facial" name="datos[tercio_facial]" <?= (isset($tercio_facial) && in_array("Disminuido", $tercio_facial)) ? "checked" : "" ?> value="Disminuido">
                                                                    <label for="tercio_facial">Disminuido
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="tercio_facial2" name="datos[tercio_facial]" value="Recto" <?= (isset($tercio_facial) && in_array("Recto", $tercio_facial)) ? "checked" : "" ?>>
                                                                    <label for="tercio_facial2">Recto
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="tercio_facial3" name="datos[tercio_facial]" value="Concavo" <?= (isset($tercio_facial) && in_array("Concavo", $tercio_facial)) ? "checked" : "" ?>>
                                                                    <label for="tercio_facial3">Concavo
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6 ">
                                                            Relación labial: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="relacion_labial" name="datos[relacion_labial]" <?= (isset($relacion_labial) && in_array("Separados", $relacion_labial)) ? "checked" : "" ?> value="Separados">
                                                                    <label for="relacion_labial">Separados
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="relacion_labial2" name="datos[relacion_labial]" value="Recto" <?= (isset($relacion_labial) && in_array("Recto", $relacion_labial)) ? "checked" : "" ?>>
                                                                    <label for="relacion_labial2">Normal
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            Línea de la sonrisa: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="linea_sonrisa" name="datos[linea_sonrisa]" <?= (isset($linea_sonrisa) && in_array("Plano", $linea_sonrisa)) ? "checked" : "" ?> value="Plano">
                                                                    <label for="linea_sonrisa">Plano
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="linea_sonrisa2" name="datos[linea_sonrisa]" value="Paralelo" <?= (isset($linea_sonrisa) && in_array("Paralelo", $linea_sonrisa)) ? "checked" : "" ?>>
                                                                    <label for="linea_sonrisa2">Paralelo
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="linea_sonrisa3" name="datos[linea_sonrisa]" value="Inverso" <?= (isset($linea_sonrisa) && in_array("Inverso", $linea_sonrisa)) ? "checked" : "" ?>>
                                                                    <label for="linea_sonrisa3">Inverso
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Análisis Funcional</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-6 ">
                                                            Respiración: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="respiracion" name="datos[respiracion]" <?= (isset($respiracion) && in_array("Bucal", $respiracion)) ? "checked" : "" ?> value="Bucal">
                                                                    <label for="respiracion">Bucal
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="respiracion2" name="datos[respiracion]" value="Nasal" <?= (isset($respiracion) && in_array("Nasal", $respiracion)) ? "checked" : "" ?>>
                                                                    <label for="respiracion2">Nasal
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="respiracion3" name="datos[respiracion]" value="Buconasal" <?= (isset($respiracion) && in_array("Buconasal", $respiracion)) ? "checked" : "" ?>>
                                                                    <label for="respiracion3">Buconasal
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            Deglución <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="deglucion" name="datos[deglucion]" <?= (isset($deglucion) && in_array("Atipica", $deglucion)) ? "checked" : "" ?> value="Atipica">
                                                                    <label for="deglucion">Atípica
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="deglucion2" name="datos[deglucion]" value="Normal" <?= (isset($deglucion) && in_array("Normal", $deglucion)) ? "checked" : "" ?>>
                                                                    <label for="deglucion2">Normal
                                                                    </label>
                                                                </div>


                                                            </div>
                                                        </div>

                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="col-md-6 ">
                                                            Fonación: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="fonacion" name="datos[fonacion]" <?= (isset($fonacion) && in_array("Dificultosa", $fonacion)) ? "checked" : "" ?> value="Dificultosa">
                                                                    <label for="fonacion">Dificultosa
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="fonacion2" name="datos[fonacion]" value="Normal" <?= (isset($fonacion) && in_array("Normal", $fonacion)) ? "checked" : "" ?>>
                                                                    <label for="fonacion2">Normal
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12 ">
                                                            Hábitos: <br>
                                                            <div class="form-group clearfix">
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="habitos" name="datos[habitos]" <?= (isset($habitos) && in_array("Succion_digital", $habitos)) ? "checked" : "" ?> value="Succion_digital">
                                                                    <label for="habitos">Succion Digital
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="habitos2" name="datos[habitos]" value="Succion_labial" <?= (isset($habitos) && in_array("Succion_labial", $habitos)) ? "checked" : "" ?>>
                                                                    <label for="habitos2">Succion Labial
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary d-inline">
                                                                    <input type="radio" id="habitos3" name="datos[habitos]" value="Otros" <?= (isset($habitos) && in_array("Otros", $habitos)) ? "checked" : "" ?>>
                                                                    <label for="habitos3">Otros
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Analisis de Modelos</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="row col-md-12">
                                                    <div class="col-md-12 row">
                                                        <div class="col-md-4">
                                                            <br>
                                                            <label for=" " class='mt-2'>Migraciones x segmento en mm.</label><br>
                                                            <label for=" " class='mt-2'>Migración de línea media en mm.</label><br>
                                                            <label for=" " class='mt-2'>Mordida cruzada anterior</label><br>
                                                            <label for=" " class='mt-2'>Mordida cruzada posterior </label><br>
                                                            <label for=" " class='mt-2'>Rotaciones de molares superiores</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Superior</label><br>
                                                            <input type="text" name="datos[migracion_segmento][]" value="<?= $migracion_segmento[0] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[migracion_linea][]" value="<?= $migracion_linea[0] ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[mordida_cruzada_anterior][]" value="<?= $mordida_cruzada_anterior[0] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[mordida_cruzada_posterior][]" value="<?= $mordida_cruzada_posterior[0] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[rotaciones_molares_superiores]" value="<?= $rowDatos['rotaciones_molares_superiores'] ?>" class="form-control mt-1">

                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="">Inferior</label><br>
                                                            <input type="text" name="datos[migracion_segmento][]" value="<?= $migracion_segmento[1] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[migracion_linea][]" value="<?= $migracion_linea[1] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[mordida_cruzada_anterior][]" value="<?= $mordida_cruzada_anterior[1] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[mordida_cruzada_posterior][]" value="<?= $mordida_cruzada_posterior[1] ?>" class="form-control mt-1">

                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Analisis de Nance</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="row col-md-12">
                                                    <div class="col-md-12 row mb-2">
                                                        <div class="col-md-4">

                                                            <label for=" " class='mt-1'>Denticion Permanente</label><br>
                                                            <label for=" " class='mt-2'>Tamaño de la arcada por mesial de 6</label><br>
                                                            <label for=" " class='mt-2'>Suma Dent. por mesial de 6 </label><br>
                                                            <label for=" " class='mt-2'>Discrepancia</label>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class='mt-1'>Superior</label><br>
                                                            <input type="text" name="datos[arcada_mesial][]" value="<?= $arcada_mesial[0] ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[suma_dent_mesial][]" value="<?= $suma_dent_mesial[0] ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[discrepancia][]" value="<?= $discrepancia[0] ?>" class="form-control mt-1 ">


                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class='mt-1'>Inferior</label><br>
                                                            <input type="text" name="datos[arcada_mesial][]" value="<?= $arcada_mesial[1] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[suma_dent_mesial][]" value="<?= $suma_dent_mesial[1] ?>" class="form-control mt-1">
                                                            <input type="text" name="datos[discrepancia][]" value="<?= $discrepancia[1] ?>" class="form-control mt-1 ">


                                                        </div>

                                                    </div>
                                                    <hr>
                                                    <div class="col-md-12 row mt-3">
                                                        <div class="col-md-4 ">

                                                            <label for=" " class='mt-1'>Pieza</label><br>
                                                            <label for="2Pm" class='mt-2'>2Pm</label><br>
                                                            <label for="1Pm" class='mt-2'>1Pm</label><br>
                                                            <label for="Cn" class='mt-2'>Cn</label><br>
                                                            <label for="IL" class='mt-2'>IL</label><br>
                                                            <label for="IC" class='mt-2'>IC</label><br>
                                                            <label for="IC" class='mt-3'>IC</label><br>
                                                            <label for="IL" class='mt-2'>IL</label><br>
                                                            <label for="Cn" class='mt-3'>Cn</label><br>
                                                            <label for="1Pm" class='mt-2'>1Pm</label><br>
                                                            <label for="2Pm" class='mt-2'>2Pm</label><br>
                                                            <label for="2Pm" class='mt-3'>Total</label><br>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class='mt-1'>Superior</label><br>
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[0] == null ? " " : $piezas[0]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[1] == null ? " " : $piezas[1]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[2] == null ? " " : $piezas[2]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[3] == null ? " " : $piezas[3]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[4] == null ? " " : $piezas[4]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[5] == null ? " " : $piezas[5]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[6] == null ? " " : $piezas[6]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[7] == null ? " " : $piezas[7]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[8] == null ? " " : $piezas[8]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance][]" value="<?= ($piezas[9] == null ? " " : $piezas[9]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[total_nance]" value="<?= $total_nance ?>" class="form-control mt-1 ">


                                                        </div>
                                                        <div class="col-md-4">
                                                            <label for="" class='mt-1'>Inferior</label><br>
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[0] == null ? " " : $piezas_inferior[0]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[1] == null ? " " : $piezas_inferior[1]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[2] == null ? " " : $piezas_inferior[2]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[3] == null ? " " : $piezas_inferior[3]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[4] == null ? " " : $piezas_inferior[4]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[5] == null ? " " : $piezas_inferior[5]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[6] == null ? " " : $piezas_inferior[6]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[7] == null ? " " : $piezas_inferior[7]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[8] == null ? " " : $piezas_inferior[8]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[piezas_nance_inferior][]" value="<?= ($piezas_inferior[9] == null ? " " : $piezas_inferior[9]) ?>" class="form-control mt-1 ">
                                                            <input type="text" name="datos[total_nance_inferior]" value="<?= $total_nance_inferior ?>" class="form-control mt-1 ">


                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Indice de Bolton</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">

                                                <div class="col-md-12">
                                                    <div class="container">
                                                        <h4>Ancho mesiodistal 6 anteriores</h4>
                                                        <div class="table-responsive">
                                                            <table class="table table-bordered">
                                                                <tr>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[0] <> '' ? $anchoMesiodistal[0] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[1] <> '' ? $anchoMesiodistal[1] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[2] <> '' ? $anchoMesiodistal[2] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[3] <> '' ? $anchoMesiodistal[3] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[4] <> '' ? $anchoMesiodistal[4] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[5] <> '' ? $anchoMesiodistal[5] : ' ') ?>" class="form-control"></td>
                                                                    <td>=</td>
                                                                    <td><input type="text" class="form-control" name="datos[ancho_mesiodistal][]" value="<?= ($anchoMesiodistal[6] <> '' ? $anchoMesiodistal[6] : ' ') ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[0] <> '' ? $anchoMesiodistal_inferior[0] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[1] <> '' ? $anchoMesiodistal_inferior[1] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[2] <> '' ? $anchoMesiodistal_inferior[2] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[3] <> '' ? $anchoMesiodistal_inferior[3] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[4] <> '' ? $anchoMesiodistal_inferior[4] : ' ') ?>" class="form-control"></td>
                                                                    <td><input type="text" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[5] <> '' ? $anchoMesiodistal_inferior[5] : ' ') ?>" class="form-control"></td>
                                                                    <td>=</td>
                                                                    <td><input type="text" class="form-control" name="datos[ancho_mesiodistal_inferior][]" value="<?= ($anchoMesiodistal_inferior[6] <> '' ? $anchoMesiodistal_inferior[6] : ' ') ?>"></td>
                                                                </tr>
                                                            </table>
                                                        </div>
                                                        <div>
                                                            <table class="table table-responsive table-bordered">
                                                                <tr>
                                                                    <td colspan="6" style="text-align: center">
                                                                        Der.
                                                                    </td>
                                                                    <td colspan="6" style="text-align: center">
                                                                        Izq.
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4">Relacion total</th>
                                                                    <td>Suma 6 Mand. mm</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_msiodistal][]" value="<?= ($relacion_mesiodistal[0] <> '' ? $relacion_mesiodistal[0] : ' ')  ?>"></td>
                                                                    <td style="text-align: center"> =</td>
                                                                    <td>x 100</td>
                                                                    <td style="text-align: center"> =</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_msiodistal][]" value="<?= ($relacion_mesiodistal[1] <> '' ? $relacion_mesiodistal[1] : ' ') ?>"></td>
                                                                    <td>%</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_msiodistal][]" value="<?= ($relacion_mesiodistal[2] <> '' ? $relacion_mesiodistal[2] : ' ') ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <th colspan="4"></th>
                                                                    <td>Suma 6 Max mm</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_msiodistal_inferior][]" value="<?= ($relacion_mesiodistal_inferior[0] <> '' ? $relacion_mesiodistal_inferior[0] : ' ')  ?>"></td>
                                                                    <td style="text-align: center"> =</td>
                                                                    <td>x 100</td>
                                                                    <td style="text-align: center"> =</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_msiodistal_inferior][]" value="<?= ($relacion_mesiodistal_inferior[1] <> '' ? $relacion_mesiodistal_inferior[1] : ' ') ?>"></td>
                                                                    <td>%</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_msiodistal_inferior][]" value="<?= ($relacion_mesiodistal_inferior[2] <> '' ? $relacion_mesiodistal_inferior[2] : ' ') ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td colspan="6" style="text-align: center">
                                                                        Relacion > 77,2%
                                                                    </td>
                                                                    <td colspan="6" style="text-align: center;border-left: 1px solid">
                                                                        Relacion < 77,2%
                                                                            </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>Max. 6 Pac</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[0] <> '' ? $relacion_77[0] : ' ') ?>"></td>
                                                                    <td>corresp.</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[1] <> '' ? $relacion_77[1] : ' ') ?>"></td>
                                                                    <td>Mand. 6 ideal </td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[2] <> '' ? $relacion_77[2] : ' ') ?>"></td>
                                                                    <td style="border-left: 1px solid">and. 6 Pac</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[3] <> '' ? $relacion_77[3] : ' ') ?>"></td>
                                                                    <td>corresp.</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[4] <> '' ? $relacion_77[4] : ' ') ?>"></td>
                                                                    <td>Max. 6 ideal </td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[5] <> '' ? $relacion_77[5] : ' ') ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td></td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[6] <> '' ? $relacion_77[6] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">-</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[7] <> '' ? $relacion_77[7] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">=</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[8] <> '' ? $relacion_77[8] : ' ') ?>"></td>
                                                                    <td style="border-left: 1px solid"><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[9] <> '' ? $relacion_77[9] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">-</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value=" <?= ($relacion_77[10] <> '' ? $relacion_77[10] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">=</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value=" <?= ($relacion_77[11] <> '' ? $relacion_77[11] : ' ') ?>"></td>
                                                                    <td> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> </td>
                                                                    <td>Mand. 6 Pac. </td>
                                                                    <td></td>
                                                                    <td style="text-align:center;">Mand. 6 ideal </td>
                                                                    <td style="text-align:center;"></td>
                                                                    <td></td>
                                                                    <td style="border-left: 1px solid">Max. 6 Pac</td>
                                                                    <td style="text-align:center;"></td>
                                                                    <td> Max. 6 ideal </td>
                                                                    <td style="text-align:center;"> </td>
                                                                    <td> </td>
                                                                    <td> </td>
                                                                </tr>
                                                                <tr>
                                                                    <td> </td>
                                                                    <td> </td>
                                                                    <td></td>
                                                                    <td style="text-align:center;"> </td>
                                                                    <td style="text-align:right;">Exceso inferior</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[12] <> '' ? $relacion_77[12] : ' ') ?>"></td>
                                                                    <td style="border-left: 1px solid"></td>
                                                                    <td style="text-align:center;"></td>
                                                                    <td> </td>
                                                                    <td> </td>
                                                                    <td style="text-align:right;"> Exceso Superior</td>
                                                                    <td><input type="text" class="form-control" name="datos[relacion_77][]" value="<?= ($relacion_77[13] <> '' ? $relacion_77[13] : ' ') ?>"></td>
                                                                </tr>


                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Indice de wala ridge</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="col-md-12 row">
                                                    <div class="col-md-12 " style="width:100%">

                                                        <table class="table table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th style="text-align:center;">Pieza</th>
                                                                    <th style="text-align:center;">Indice Wala</th>
                                                                    <th style="text-align:center;">Pieza</th>
                                                                    <th style="text-align:center;">Indice Wala</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td style="text-align:center;">37</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_izq][]" value="<?= ($indice_wala_izq[0] <> '' ? $indice_wala_izq[0] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">47</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_der][]" value="<?= ($indice_wala_der[0] <> '' ? $indice_wala_der[0] : ' ') ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:center;">36</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_izq][]" value="<?= ($indice_wala_izq[1] <> '' ? $indice_wala_izq[1] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">46</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_der][]" value="<?= ($indice_wala_der[0] <> '' ? $indice_wala_der[0] : ' ') ?>"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="text-align:center;">35</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_izq][]" value="<?= ($indice_wala_izq[2] <> '' ? $indice_wala_izq[2] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">45</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_der][]" value="<?= ($indice_wala_der[0] <> '' ? $indice_wala_der[0] : ' ') ?>"></td>
                                                                </tr>

                                                                <tr>
                                                                    <td style="text-align:center;">34</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_izq][]" value="<?= ($indice_wala_izq[3] <> '' ? $indice_wala_izq[3] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">44</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_der][]" value="<?= ($indice_wala_der[0] <> '' ? $indice_wala_der[0] : ' ') ?>"></td>
                                                                </tr>
                                                                <tr>
                                                                    <td style="text-align:center;">33</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_izq][]" value="<?= ($indice_wala_izq[4] <> '' ? $indice_wala_izq[4] : ' ') ?>"></td>
                                                                    <td style="text-align:center;">43</td>
                                                                    <td><input type="text" class="form-control" name="datos[wala_der][]" value="<?= ($indice_wala_der[0] <> '' ? $indice_wala_der[0] : ' ') ?>"></td>
                                                                </tr>


                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Diagnostico</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div>
                                                            <center>
                                                                <label for="">Bipotipo</label>
                                                            </center>
                                                        </div>

                                                        <textarea name="datos[diagnostico]" class="form-control" id="" cols="80" rows="10"><?= !empty($rowDatos['diagnostico']) ? $rowDatos['diagnostico'] : '' ?></textarea>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <center>
                                                                <label for="">Clase Dentaria</label>
                                                            </center>
                                                        </div>

                                                        <textarea name="datos[clase_dentaria]" class="form-control" id="" cols="80" rows="10"><?= !empty($rowDatos['clase_dentaria']) ? $rowDatos['clase_dentaria'] : '' ?></textarea>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <center>
                                                                <label for="">Clase Esqueletal</label>
                                                            </center>
                                                        </div>

                                                        <textarea name="datos[clase_esqueletal]" class="form-control" id="" cols="80" rows="10"> <?= !empty($rowDatos['clase_esqueletal']) ? $rowDatos['clase_esqueletal'] : '' ?></textarea>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <center>
                                                                <label for="">Discrep. Cefalometrica</label>
                                                            </center>
                                                        </div>

                                                        <textarea name="datos[discrepancia_cefalometrica]" class="form-control" id="" cols="80" rows="10"><?= !empty($rowDatos['discrepancia_cefalometrica']) ? $rowDatos['discrepancia_cefalometrica'] : '' ?></textarea>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <center>
                                                                <label for="">Discrep. Dentaria</label>
                                                            </center>
                                                        </div>

                                                        <textarea name="datos[discrepancia_dentaria]" class="form-control" id="" cols="80" rows="10"><?= !empty($rowDatos['discrepancia_dentaria']) ? $rowDatos['discrepancia_dentaria'] : '' ?></textarea>

                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <center>
                                                                <label for="">Otros</label>
                                                            </center>
                                                        </div>

                                                        <textarea name="datos[diagnostico_otros]" class="form-control" id="" cols="80" rows="10"><?= !empty($rowDatos['diagnostico_otros']) ? $rowDatos['diagnostico_otros'] : '' ?></textarea>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card card-info collapsed-card" bis_skin_checked="1">
                                        <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                            <h3 class="card-title" style="color: white">Plan de Tratamiento</h3>
                                            <div class="card-tools" bis_skin_checked="1">
                                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus" style="color: white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" bis_skin_checked="1" style="display: none;">
                                            <div class="row" bis_skin_checked="1">
                                                <div class="col-md-12 row">
                                                    <div class="col-md-6">
                                                        <center>
                                                            <label for="">Objetivos de Tratamiento</label>

                                                        </center>
                                                        <textarea name="datos[objetivos_tratamiento]" class="form-control" id="" rows="10"><?= !empty($rowDatos['objetivos_tratamiento']) ? $rowDatos['objetivos_tratamiento'] : '' ?></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <center>
                                                            <label for="">Plan de Tratamiento</label>
                                                        </center>
                                                        <textarea name="datos[plan_tratamiento]" class="form-control" id="" rows="10"><?= !empty($rowDatos['plan_tratamiento']) ? $rowDatos['plan_tratamiento'] : '' ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Este es de prueba -->
                                    <!--
                                     <div class="card card-info collapsed-card" bis_skin_checked="1">
                                                <div class="card-header" bis_skin_checked="1" style="background:<?= $color ?>" data-card-widget="collapse">
                                                    <h3 class="card-title" style="color: white">Análisis Funcional</h3>
                                                    <div class="card-tools" bis_skin_checked="1">
                                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                            <i class="fas fa-minus" style="color: white"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="card-body" bis_skin_checked="1" style="display: none;">
                                                    <div class="row" bis_skin_checked="1">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                             </div>
                                                                            -->
                                </div>

                            </div>
                            <input type="hidden" name="datos[cliente_id]" value="<?= $cliente_id ?>">
                            <input type="hidden" name="datos[usuario_id]" value="<?= $usuario_id ?>">
                            <input type="hidden" name="datos[ID_principal]" value="<?= $ID_principal ?>">
                            <div class="card-footer">
                                <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#Historia_Ortodoncia_Bo').automaticForm({type:<?= ($rowDatos == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowDatos == null ? 0 : $rowDatos['id']) ?>',reload:'',page:'<?= $page ?>'});">
                                    <i class="fa fa-save mr-1"></i>
                                    Guardar
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </section>

</div>



<?php
include '../footer.php';
?>