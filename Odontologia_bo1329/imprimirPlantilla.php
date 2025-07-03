<?php
date_default_timezone_set('America/Bogota');

require_once "../funciones/funciones.php";
require_once "../funciones/funcionesUtilidades.php";

$idHistoria = decrypt($_GET['id']);

$QueryHistoria = "SELECT * FROM OBT_Historia WHERE id = '$idHistoria' ";
$ResultHistoria = mysqli_query($conn3, $QueryHistoria);
$RowHistoria = mysqli_fetch_assoc($ResultHistoria);

$QueryCliente = "SELECT * FROM cliente WHERE cliente_id = '{$RowHistoria["cliente_id"]}' ";
$ResultCliente = mysqli_query($conn3, $QueryCliente);
$RowCliente = mysqli_fetch_assoc($ResultCliente);

$CODI_CLIENTE = $RowCliente["CODI_CLIENTE"];


$valoresNoValidos = [0, "0", "", null, false];

?>
<!-- Enlace CDN para Font Awesome 6 -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

<table class="border">
    <tr class="border">
        <th class="text-center border" colspan="3">Datos personales</th>
        <th class="text-left border">No.H.C</th>
        <td class="text-left"><?= $idHistoria ?></td>
    </tr>
    <tr>
        <th class="text-center">Apellido Paterno</th>
        <th class="text-center">Apellido Materno</th>
        <th class="text-center">Nombres</th>
        <th class="text-center">Edad</th>
        <th class="text-center">Sexo</th>
    </tr>
    <tr>
        <td class="text-center"><?= $RowCliente["primer_apellido"] ?></td>
        <td class="text-center"><?= $RowCliente["segundo_apellido"] ?></td>
        <td class="text-center"><?= $RowCliente["primer_nombre"] . $RowCliente["segundo_nombre"]  ?></td>
        <td class="text-center"><?= CalculoEdadPaciente($RowCliente["fechaNacimiento"])  ?></td>
        <td class="text-center"><?= $RowCliente["genero"] ?></td>
    </tr>
    <tr>
        <th class="text-center" colspan="2">Lugar y Fecha de Nacimiento</th>
        <th class="text-center">Ocupacion</th>
        <th class="text-center">Direccion</th>
        <th class="text-center">Telefono-Celular</th>
    </tr>
    <tr>
        <td class="text-center" colspan="2"><?= $RowCliente["lugarNacimiento"] ?>, <?= $RowCliente["fechaNacimiento"] ?></td>
        <td class="text-center"><?= $RowCliente["ocupacion"] ?></td>
        <td class="text-center"><?= $RowCliente["direccion"] ?></td>
        <td class="text-center"><?= $RowCliente["telefono"] ?></td>
    </tr>
</table>



<div class="row">
    <table>
        <thead>
            <tr>
                <th colspan="2">Análisis Clínico</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $fields = [
                //?Label = [elementType, inputName, col, typeInput]
                "Desarrollo general" => ["input", "desarrollo_general", "6", "text"],
                "Peso" => ["input", "peso", "3", "number"],
                "Talla" => ["input", "talla", "3", "number"],
                "Desarrollo Intelectual" => ["input", "desarrollo_intelectual", "9", "text"],
                "Grado" => ["input", "grado", "3", "text"],
                "Estado periodontal" => ["textarea", "estado_periodontal", "12", ""],
            ];
        
            foreach ($fields as $label => $dataInput) {
                $tipoElemento = $dataInput[0];
                $name         = $dataInput[1];
                $col          = $dataInput[2];
                $type         = $dataInput[3];
                $valor        = $RowHistoria[$name];
        
            ?>
                <tr>
                    <th style="width:30%; text-align:start"><?= $label ?></th>
                    <td style="width:70%; text-align:start"><?= $valor ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>




    <div class="col-md-12 row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p class="text-center"> <i class="fas fa-tooth text-danger icon-cariado" style="color:red"></i> Cariado | <i style="color:gray" class="fas fa-tooth text-secondary icon-perdido"></i> Perdido | <i class="fas fa-tooth text-primary icon-obturado" style="color:blue"></i> Obturado </p>
        </div>
        <div class="col-md-4"></div>
    </div>



    <div class="d-flex flex-column col-md-12">
        <?php

        $fieldsOdontograma = [
            [55, 54, 53, 52, 51, 61, 62, 63, 64, 65],
            [18, 17, 16, 15, 14, 13, 12, 11, 21, 22, 23, 24, 25, 26, 27, 28],
            [48, 47, 46, 45, 44, 43, 42, 41, 31, 32, 33, 34, 35, 36, 37, 38],
            [85, 84, 83, 82, 81, 71, 72, 73, 74, 75]
        ];

        $primera_fila = $fieldsOdontograma[0];
        $segunda_fila = $fieldsOdontograma[1];
        $tercera_fila = $fieldsOdontograma[2];
        $cuarta_fila  = $fieldsOdontograma[3];

        $datos_odonto = json_decode($RowHistoria["datos_odonto"], true);
        // var_dump($datos_odonto);

        ?>

        <!-- <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row"> -->
        <table>
            <tbody>
                <tr>

                    <?php
                    foreach ($primera_fila as $key => $value) {
                        $valorGuardado = $datos_odonto[$value];
                        $color = "white";
                        switch ($valorGuardado) {
                            case 'Cariado':
                                $color = "red";
                                break;
                            case 'Perdido':
                                $color = "grey";
                                break;
                            case 'Obturado':
                                $color = "blue";
                                break;
                            default:
                                break;
                        }
                        

                    ?>
                        <td style="text-align:center;background-color:<?= $color ?>;color:<?= $color == 'white' ? 'black' : 'white' ?>;"><?= $value ?></td>
                        <td style='color:white; text-align:center'>5</td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>


        <!-- </div> -->
        <table>
            <tbody>
                <tr>
                    <?php
                    foreach ($segunda_fila as $key => $value) {
                        $color = "white";
                        $valorGuardado = $datos_odonto[$value];
                        switch ($valorGuardado) {
                            case 'Cariado':
                                $color = "red";
                                break;
                            case 'Perdido':
                                $color = "grey";
                                break;
                            case 'Obturado':
                                $color = "blue";
                                break;
                            default:
                                break;
                        }
                    ?>
                        <td style="text-align:center;background-color:<?= $color ?>;color:<?= $color == 'white' ? 'black' : 'white' ?>;"><?= $value ?></td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>


        <table>
            <tbody>
                <tr>
                    <?php
                    foreach ($tercera_fila as $key => $value) {
                        $color = "white";
                        $valorGuardado = $datos_odonto[$value];
                        switch ($valorGuardado) {
                            case 'Cariado':
                                $color = "red";
                                break;
                            case 'Perdido':
                                $color = "grey";
                                break;
                            case 'Obturado':
                                $color = "blue";
                                break;
                            default:
                                break;
                        }
                    ?>
                        <td style="text-align:center;background-color:<?= $color ?>;color:<?= $color == 'white' ? 'black' : 'white' ?>;"><?= $value ?></td>
                    <?php } ?>
                </tr>

            </tbody>
        </table>

        <table>
            <tbody>
                <tr>

                    <?php
                    foreach ($cuarta_fila as $key => $value) {
                        $color = "white";
                        $valorGuardado = $datos_odonto[$value];
                        switch ($valorGuardado) {
                            case 'Cariado':
                                $color = "red";
                                break;
                            case 'Perdido':
                                $color = "grey";
                                break;
                            case 'Obturado':
                                $color = "blue";
                                break;
                            default:
                                break;
                        }

                    ?>
                        <td style="text-align:center;background-color:<?= $color ?>;color:<?= $color == 'white' ? 'black' : 'white' ?>;"><?= $value ?></td>
                        <td style='color:white; text-align:center'>5</td>
                    <?php } ?>
                </tr>
            </tbody>
        </table>

    </div>
</div>


<div class="row">
    <center>
        <table class="table table-bordered" style="width: 98%">
            <thead>
                <tr>
                    <th class="text-center" colspan="4">Análisis de la Oclusión:</th>
                </tr>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th colspan="3" class="text-center">Evaluacion</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $fields = [
                    //?Label = [inputName, [values] ]
                    "Clase de Angle molar derecha" => ["clase_angle_molar_derecha", ["Clase I", "Clase II", "Clase III"]],
                    "Clase de Angle molar izquierda" => ["clase_angle_molar_izquierda", ["Clase I", "Clase II", "Clase III"]],
                    "Clase de Angle canina derecha" => ["clase_angle_canina_derecha", ["Clase I", "Clase II", "Clase III"]],
                    "Clase de Angle canina izquierda" => ["clase_angle_canina_izquierda", ["Clase I", "Clase II", "Clase III"]],
                    "Resalte" => ["Resalte", ["Aumentado", "Normal", "Negativo"]],
                    "Entrecruzamiento" => ["entrecruzamiento", ["Aumentado", "Normal", "Negativo"]],
                    "Curva de Spee" => ["curva_spee", ["Aumentado", "Normal", "Negativo"]],
                    "ATM" => ["atm", ["Click", "Chasquido", "Dolor"]],
                    "Línea media desviada" => ["línea_media_desviada", ["Superior", "Inferior", "Normal"]],
                ];

                foreach ($fields as $label => $data) {
                    $inputName = $data[0];
                    $values    = $data[1];
                    $valor     = $RowHistoria[$inputName];

                ?>
                    <tr>
                        <td>
                            <p><?= $label ?></p>
                        </td>
                        <?php foreach ($values as $index => $value) { ?>
                            <td>
                                <div class="form-check col-md-12 col-xs-12">
                                    <p> | <?= $value == $valor ? 'X' : '&nbsp;&nbsp;' ?> | <?= $value ?></p>
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</div>


<div class="row">
    <center>
        <table class="table table-bordered" style="width:98%">
            <thead>
                <tr>
                    <th colspan="4" class="text-center">Análisis facial</th>
                </tr>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th colspan="3" class="text-center">Evaluacion</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $fields = [
                    //?Label = [inputName, [values] ]				

                    "Perfil Facial" => ["perfil_facial", ["Convexo", "Recto", "Cóncavo"]],
                    "Tercio Facial Inf." => ["tercio_facial_inf", ["Disminuido", "Normal", "Aumentado"]],
                    "Relación labial " => ["relacion_labial ", ["Separados", "Normal"]],
                    "Línea de la sonrisa" => ["linea_sonrisa", ["Plano", "Paralelo", "Inverso"]],
                ];

                foreach ($fields as $label => $data) {
                    $inputName = $data[0];
                    $values    = $data[1];
                    $valor     = $RowHistoria[$inputName];

                ?>
                    <tr>
                        <td>
                            <p><?= $label ?></p>
                        </td>
                        <?php foreach ($values as $index => $value) { ?>
                            <td>
                                <div class="form-check col-md-12 col-xs-12">
                                    <p> | <?= $value == $valor ? 'X' : '&nbsp;&nbsp;' ?> | <?= $value ?></p>
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</div>

<div class="row">
    <center>
        <table class="table table-bordered" style="width: 98%;">
            <thead>
                <tr>
                    <th colspan="4" class="text-center">Análisis Funcional</th>
                </tr>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th colspan="3" class="text-center">Evaluacion</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $fields = [
                    //?Label = [inputName, [values] ]				

                    "Respiración" => ["respiracion", ["Bucal", "Nasal", "Buconasal"]],
                    "Deglución" => ["deglucion", ["Atípica", "Normal", ""]],
                    "Fonación" => ["fonacion ", ["Dificultosa", "Normal", ""]],
                    "Hábitos" => ["hábitos", ["Succión digital", "Succión labial", "Otros"]],
                ];

                foreach ($fields as $label => $data) {
                    $inputName = $data[0];
                    $values    = $data[1];
                    $valor     = $RowHistoria[$inputName];
                ?>
                    <tr>
                        <td>
                            <p><?= $label ?></p>
                        </td>
                        <?php foreach ($values as $index => $value) { ?>
                            <td>
                                <div class="form-check col-md-12 col-xs-12">
                                    <p> | <?= $value == $valor ? 'X' : '&nbsp;&nbsp;' ?> | <?= $value ?></p>
                                </div>
                            </td>
                        <?php } ?>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</div>

<div class="row">
    <center>
        <table style="width:98%" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">Análisis de modelos</th>
                </tr>
                <tr>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Superior</th>
                    <th class="text-center">Inferior</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fields = [
                    "Migraciones x segmento en mm" => "migraciones_segmento_mm",
                    "Migración de línea media en mm" => "migracion_linea_media_mm", // Eliminé la "í" para evitar problemas
                    "Mordida cruzada anterior" => "mordida_cruzada_anterior",
                    "Mordida cruzada posterior" => "mordida_cruzada_posterior", // Eliminé el espacio al final
                    "Rotaciones de molares superiores" => "rotaciones_molares_superiores",
                ];

                foreach ($fields as $label => $inputName) {
                    $valorSuperior = $RowHistoria[$inputName . "_superior"];
                    $valorInferior = $RowHistoria[$inputName . "_inferior"];
                ?>
                    <tr>
                        <td>
                            <p><?= htmlspecialchars($label) ?></p>
                        </td>
                        <td>
                            <p><?= $valorSuperior ?></p>
                        </td>
                        <td>
                            <p><?= $valorInferior ?></p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <table style="width:98%" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Superior</th>
                    <th class="text-center">Inferior</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $fields = [
                    //?Label = inputName				

                    "Dentición Permanente" => "denticion_permanente",
                    "Tamaño de la arcada por mesial de 6" => "tamano_arcada_mesial_6",
                    "Suma Dent. por mesial de 6" => "suma_mesial_6",
                    "Discrepancia" => "discrepancia"
                ];

                foreach ($fields as $label => $input_name) {
                    $valorSuperior = $RowHistoria[$inputName . "_superior"];
                    $valorInferior = $RowHistoria[$inputName . "_inferior"];
                ?>
                    <tr>
                        <td> <?= $label ?> </td>
                        <td>
                            <p><?= $valorSuperior ?></p>
                        </td>
                        <td>
                            <p><?= $valorInferior ?></p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <table style="width:98%" class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Superior</th>
                    <th class="text-center">Inferior</th>
                </tr>
            </thead>
            <tbody>

                <?php

                $fields = [
                    //?Label = inputName				                                            
                    "2Pm" => "2_pm",
                    "1Pm" => "1_pm",
                    "Cn" => "cn",
                    "IL" => "il",
                    "IC" => "ic"
                ];

                foreach ($fields as $label => $inputName) {
                    $valorSuperior = $RowHistoria[$inputName . "_superior"];
                    $valorInferior = $RowHistoria[$inputName . "_inferior"];
                ?>
                    <tr>
                        <td><?= $label ?></td>
                        <td>
                            <p><?= $valorSuperior ?></p>
                        </td>
                        <td>
                            <p><?= $valorInferior ?></p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>


        <div style="display: flex; justify-content: center; align-items: center; flex-direction: row">
            <?php

            $pieces_group = [[47, 46, 45, 44, 43], [37, 36, 35, 34, 33]];

            foreach ($pieces_group as $group) {
            ?>
                <table class="table table-bordered" style="margin: 10px; width: <?= (100 / count($pieces_group)) - 4 ?>%;">
                    <thead>
                        <tr>
                            <th class="text-center" style="width: 50%;">Pieza</th>
                            <th class="text-center" style="width: 50%;">Indice Wala</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        foreach ($group as $piece) {
                            $valor = $RowHistoria["ind_wala_" . $piece];
                        ?>
                            <tr>
                                <td>
                                    <p><?= $piece ?></p>
                                </td>
                                <td>
                                    <p><?= $valor ?></p>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            <?php } ?>
        </div>
    </center>

</div>


<div class="row">
    <center>
        <table class="table table-bordered" style="width:98%">
            <thead>
                <tr>
                    <th class="text-center" colspan="3">Etapas del tratamiento</th>
                </tr>
                <tr>
                    <th class="text-center">Descripción</th>
                    <th class="text-center">Superior</th>
                    <th class="text-center">Inferior</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $fields = [
                    "Extracciones" => "extracciones",
                    "Anclaje" => "anclaje",
                    "Alineado y nivelado" => "alineado_nivelado",
                    "Primer fase" => "primer_fase",
                    "Mecanica" => "mecanica",
                    "Segunda fase" => "segunda_fase",
                    "Estabilización " => "estabilización",
                    "Tercera fase  " => "tercera fase",
                    "Contencion" => "contencion",
                    "Otros" => "otros",

                ];

                foreach ($fields as $label => $inputName) {
                    $label     = trim($label);
                    $inputName = trim($inputName);
                    $valorSuperior = $RowHistoria[$inputName . "_superior"];
                    $valorInferior = $RowHistoria[$inputName . "_inferior"];
                ?>
                    <tr>
                        <td>
                            <p><?= htmlspecialchars($label) ?></p>
                        </td>
                        <td>
                            <p><?= $valorSuperior ?></p>
                        </td>
                        <td>
                            <p><?= $valorInferior ?></p>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>
</div>

<div class="row">
    <center>
    <table class="table table-bordered" style="width:98%">
    <thead>
        <tr>
            <th colspan="2">Análisis de Nance</th>
        </tr>
        <tr>
            <th class="text-center" colspan="2">
                <p>Ancho mesiodistal 6 anteriores</p>
                <table class="col-md-12 col-xs-12">
                    <tr>
                        <td class="col-md-9 col-xs-12">
                            <table class="row">
                                <?php for ($i = 1; $i <= 12; $i++) {
                                    $valor = $RowHistoria["nance_" . $i];
                                ?>
                                    <td class="col-md-2 col-xs-2 py-1">
                                        <p><?= $valor ?></p>
                                    </td>
                                <?php } ?>
                            </table>
                        </td>
                        <td class="col-md-3 col-xs-12 py-2">
                            <p><?= $RowHistoria["nance_total"] ?></p>
                        </td>
                    </tr>
                </table>
            </th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td colspan="2">
                <p style="text-align:center"><b>Relación total</b> <br>Suma 6 Mand. mm = x 100 = % <br>Suma 6 Max.mm</p>
            </td>
        </tr>
        <tr>
            <td class="text-center" style="width:50%">
                <p>Relación total > 77,2 %</p>
                <table class="w-100">
                    <tr class="mb-3">
                        <td class="col-md-6">
                            <p for="max6pac" class="form-label"><b>Max. 6 Pac.: </b><?= $RowHistoria["nance_max6pac"] ?></p>
                        </td>
                        <td class="col-md-6">
                            <p for="corresp" class="form-label"><b>Corresp.: </b><?= $RowHistoria["nance_corresp"] ?></p>
                        </td>
                    </tr>
                    <tr class="mb-12">
                        <td class="col-md-12" colspan="2">
                            <p for="mand6ideal" class="form-label" style="text-align:center"><b>Mand. 6 ideal: </b><?= $RowHistoria["nance_mand6ideal"] ?></p>
                        </td>
                    </tr>
                    <tr class="mb-3">
                        <td class="col-md-6">
                            <p for="mand6pac" class="form-label"><b>Mand. 6 Pac.: </b><?= $RowHistoria["nance_mand6pac"] ?></p>
                        </td>
                        <td class="col-md-6">
                            <p for="mand6ideal2" class="form-label"><b>Mand. 6 ideal: </b><?= $RowHistoria["nance_mand6ideal2"] ?></p>
                        </td>
                    </tr>
                </table>
                <p><b>Exceso inferior</b></p>
            </td>
            <td class="text-center" style="width:50%">
                <p>Relación total < 77,2 %</p>
                <table class="w-100">
                    <tr class="mb-3">
                        <td class="col-md-6">
                            <p for="mand6pac" class="form-label"><b>Mand. 6 Pac.: </b><?= $RowHistoria["nance_mand6pac"] ?></p>
                        </td>
                        <td class="col-md-6">
                            <p for="corresp" class="form-label"><b>Corresp.: </b><?= $RowHistoria["nance_corresp"] ?></p>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-md-12" colspan="2">
                            <p for="max6ideal" class="form-label" style="text-align:center"><b>Max. 6 ideal: </b><?= $RowHistoria["nance_max6ideal"] ?></p>
                        </td>
                    </tr>
                    <tr class="mb-3">
                        <td class="col-md-6">
                            <p for="max6pac" class="form-label"><b>Max. 6 Pac.: </b><?= $RowHistoria["nance_max6pac"] ?></p>
                        </td>
                        <td class="col-md-6">
                            <p for="max6ideal2" class="form-label"><b>Max. 6 ideal: </b><?= $RowHistoria["nance_max6ideal2"] ?></p>
                        </td>
                    </tr>
                </table>
                <p><b>Exceso superior</b></p>
            </td>
        </tr>
    </tbody>
</table>
    </center>
</div>

<div class="row">
    <center>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center" colspan="2">Diagnostico</th>
                </tr>
                <tr>
                    <th class="text-center">Descripcion</th>
                    <th class="text-center">Detalle</th>
                </tr>
            </thead>
            <tbody>
                <?php

                $fields = [
                    //?Label = inputName				
                    "Biotipo" => "biotipo",
                    "Clase Dentaria" => "clase_dentaria",
                    "Clase Esqueletal" => "clase_esqueletal",
                    "Otros" => "otros",
                    "Perfil del paciente" => "perfil_paciente",
                    "Motivo principal de consulta" => "motivo_principal_consulta",
                ];

                foreach ($fields as $label => $inputName) {
                    $valor = $RowHistoria[$inputName];
                ?>
                    <tr>
                        <td class="text-center"><?= $label ?></td>
                        <td class="text-center"><?= $valor ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </center>




</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th class="text-center">Plan de tratamiento</th>
        </tr>
        <tr>
            <th class="text-center">Objetivos</th>
        </tr>
        <tr>
            <td><?= $RowHistoria["objetivos_tratamiento"] ?></td>
        </tr>
        <tr>
            <th class="text-center">Plan de tratamiento</th>
        </tr>
        <tr>
            <td><?= $RowHistoria["plan_tratamiento"] ?></td>
        </tr>
    </thead>
</table>


<style>
    table {
        border-collapse: collapse;
        border: 1px solid black !important;
        width: 98% !important;
        margin-bottom: 5px !important;
        margin-top: 5px !important;
        padding: 0 !important;
    }

    table tr {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    table th {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    table td {
        border-bottom: 1px solid black !important;
        border-right: 1px solid black !important;
        padding: 0 !important;
        padding-left: 5px !important;
        padding-right: 5px !important;
        margin: 0 !important;
    }

    p {
        margin: 0;
    }

    .text-center {
        text-align: center !important;
    }

    .text-left {
        text-align: left !important;
    }
</style>