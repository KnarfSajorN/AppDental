<h4 class="text-center my-2">Análisis Clínico</h4>

<div class="row">
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

        <div class="col-<?= $col ?> mb-3">
            <p><b><?= $label ?>:</b> <?= $valor ?></p>
        </div>


    <?php } ?>

    <div class="col-md-12 row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <p class="text-center"> <i class="fas fa-tooth text-danger"></i> Cariado | <i class="fas fa-tooth text-secondary"></i> Perdido | <i class="fas fa-tooth text-primary"></i> Obturado </p>
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

        <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">
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
                <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= (100 / count($segunda_fila)) - 1 ?>%; width: <?= (100 / count($segunda_fila)) - 1 ?>%"><?= $value ?></div>
            <?php } ?>

        </div>

        <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">
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
                <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= (100 / count($segunda_fila)) - 1 ?>%; width: <?= (100 / count($segunda_fila)) - 1 ?>%"><?= $value ?></div>
            <?php } ?>
        </div>


        <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">
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
                <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= (100 / count($segunda_fila)) - 1 ?>%; width: <?= (100 / count($segunda_fila)) - 1 ?>%"><?= $value ?></div>
            <?php } ?>

        </div>
        <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">

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
                <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= (100 / count($segunda_fila)) - 1 ?>%; width: <?= (100 / count($segunda_fila)) - 1 ?>%"><?= $value ?></div>
            <?php } ?>
        </div>
    </div>
</div>


<h4 class="text-center my-2">Análisis de la Oclusión:</h4>

<div class="row">
    <center>
        <table class="table table-bordered" style="width: 100%">
            <thead>
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


<h4 class="text-center my-2">Análisis facial</h4>
<div class="row">
    <center>
        <table class="table table-bordered" style="width:100%">
            <thead>
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

<h4 class="my-2 text-center">Análisis Funcional</h4>
<div class="row">
    <center>
        <table class="table table-bordered" style="width: 100%;">
            <thead>
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
                    "Deglución" => ["deglucion", ["Atípica", "Normal"]],
                    "Fonación" => ["fonacion ", ["Dificultosa", "Normal"]],
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

<h4 class="text-center my-2 ">Análisis de modelos</h4>
<div class="row">
    <center>
        <table style="width:100%" class="table table-bordered">
            <thead>
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

        <table style="width:100%" class="table table-bordered">
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

        <table style="width:100%" class="table table-bordered">
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

<h4 class="text-center my-2">Etapas del tratamiento</h4>
<div class="row">
    <center>
        <table class="table table-bordered" style="width:100%">
            <thead>
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

<h4 class="text-center my-2">Analisis de Nance</h4>
<div class="row">
    <center>
        <table class="table table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th class="text-center" colspan="2">
                        <p>Ancho mesiodistal 6 anteriores</p>
                        <div class="col-md-12 row col-xs-12">
                            <div class="col-md-9 col-xs-12 row">
                                <?php for ($i = 1; $i <= 12; $i++) {
                                    $valor = $RowHistoria["nance_" . $i];

                                ?>
                                    <div class="col-md-2 col-xs-2 py-1">
                                        <p><?= $valor ?></p>
                                    </div>
                                <?php } ?>

                            </div>
                            <div class="col-md-3 col-xs-12 py-2">
                                <p><?= $RowHistoria["nance_total"] ?></p>
                            </div>
                        </div>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="" colspan="2">
                        <p><b>Relación total</b> <br>Suma 6 Mand. mm = x 100 = % <br>Suma 6 Max.mm</p>
                    </td>
                </tr>
                <tr>
                    <td class="text-center" style="width:50%">
                        <p>Relación total > 77,2 %</p>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p for="max6pac" class="form-label"><b>Max. 6 Pac.: </b><?= $RowHistoria["nance_max6pac"] ?></p>
                            </div>
                            <div class="col-md-6">
                                <p for="corresp" class="form-label"><b>Corresp.: </b><?= $RowHistoria["nance_corresp"] ?></p>
                            </div>
                        </div>

                        <!-- Fila 2: Mand. 6 ideal -->
                        <div class="row mb-12">
                            <div class="col-md-12">
                                <p for="mand6ideal" class="form-label"><b>Mand. 6 ideal: </b><?= $RowHistoria["nance_mand6ideal"] ?></p>
                            </div>
                        </div>

                        <!-- Fila 4: Mand. 6 Pac. y Mand. 6 ideal -->
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <p for="mand6pac" class="form-label"><b>Mand. 6 Pac.: </b><?= $RowHistoria["nance_mand6pac"] ?></p>
                            </div>
                            <div class="col-md-6">
                                <p for="mand6ideal2" class="form-label"><b>Mand. 6 ideal: </b><?= $RowHistoria["nance_mand6ideal2"] ?></p>
                            </div>
                        </div>
                        <p><b>Exceso inferior</b></p>
                    </td>
                    <td class="text-center" style="width:50%">
                        <p>Relación total < 77,2 %</p>
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p for="mand6pac" class="form-label"><b>Mand. 6 Pac.: </b><?= $RowHistoria["nance_mand6pac"] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p for="corresp" class="form-label"><b>Corresp.: </b><?= $RowHistoria["nance_corresp"] ?></p>
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <p for="max6ideal" class="form-label"><b>Max. 6 ideal: </b><?= $RowHistoria["nance_max6ideal"] ?></p>
                                </div>
                                <!-- Fila 3: Max. 6 Pac. y Max. 6 ideal -->
                                <div class="row mb-3">
                                    <div class="col-md-6">
                                        <p for="max6pac" class="form-label"><b>Max. 6 Pac.: </b><?= $RowHistoria["nance_max6pac"] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <p for="max6ideal2" class="form-label"><b>Max. 6 ideal: </b><?= $RowHistoria["nance_max6ideal2"] ?></p>
                                    </div>
                                </div>
                                <p><b>Exceso superior</b></p>
                    </td>
                </tr>

            </tbody>
        </table>
    </center>
</div>>

<h4 class="text-center my-2">Diagnostico</h4>
<div class="row">
    <center>
        <table class="table table-bordered">
            <thead>
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

<h4 class="text-center my-2">Plan de tratamiento</h4>
<table class="table table-bordered">
    <thead>
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