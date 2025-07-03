<?php
require_once '../header.php';
require_once '../menu.php';

$clienteId = decrypt($_GET['cI']);

$QueryCliente = "SELECT * FROM cliente where cliente_id=$clienteId";
$ResultCliente = mysqli_query($conn3, $QueryCliente);
$RowCliente = mysqli_fetch_assoc($ResultCliente);
$RowCliente["edad"] = calculaedad($RowCliente["fechaNacimiento"]);

$nombre_cliente = $RowCliente['nombre_cliente'];
$celular_cliente = $RowCliente['celular_cliente'];
$fechaNacimiento = $RowCliente['fechaNacimiento'];

?>
<link rel="stylesheet" href="apiVoz.css">
<script src="plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>Historia de odontología, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?></h1>
        <ol class="breadcrumb"></ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- Formulario principal -->
                <form id="form" action="OBT_Guardar" method="POST" class="box">

                    <!-- Card para Antecedentes -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Análisis Clínico</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
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
                                ?>
                                    <div class="col-md-<?= $col ?> mb-3">
                                        <label for="<?= $name ?>" class="form-label"><?= $label ?></label>
                                        <?php
                                        switch ($tipoElemento) {
                                            case 'input': ?>
                                                <input type="<?= $type ?>" name="<?= $name ?>" id="<?= $name ?>" class="form-control">
                                            <?php
                                                break;
                                            case 'textarea': ?>
                                                <textarea name="<?= $name ?>" id="<?= $name ?>" class="form-control"></textarea>
                                        <?php
                                                break;
                                            default:
                                                break;
                                        }
                                        ?>
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
                                    $cuarta_fila  = $fieldsOdontograma[3]; ?>

                                    <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">
                                        <?php
                                        foreach ($primera_fila as $key => $value) { ?>
                                            <input type="hidden" name="datos_odonto[<?= $value ?>]" value="Ninguno">
                                            <div class="" style="margin-right: 2px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%">
                                                <div class="dropdown">
                                                    <!-- Botón principal del dropdown -->
                                                    <button id="dropdownButton_<?= $value ?>" class="btn btn-md btn-light dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <?= $value ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <!-- Menú del dropdown -->
                                                    <ul class="dropdown-menu p-0"> <!-- p-0 para eliminar el padding -->
                                                        <li class="m-0"> <!-- m-0 para eliminar el margen -->
                                                            <a class="dropdown-item p-0"> <!-- p-0 para eliminar el padding -->
                                                                <button class="btn btn-md btn-block btn-outline-danger rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'danger')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-secondary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'secondary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-primary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'primary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>

                                    <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">
                                        <?php
                                        foreach ($segunda_fila as $key => $value) { ?>
                                            <input type="hidden" name="datos_odonto[<?= $value ?>]" value="Ninguno">
                                            <div class="" style="margin-right: 2px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%">
                                                <div class="dropdown">
                                                    <!-- Botón principal del dropdown -->
                                                    <button id="dropdownButton_<?= $value ?>" class="btn btn-md btn-light dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <?= $value ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <!-- Menú del dropdown -->
                                                    <ul class="dropdown-menu p-0"> <!-- p-0 para eliminar el padding -->
                                                        <li class="m-0"> <!-- m-0 para eliminar el margen -->
                                                            <a class="dropdown-item p-0"> <!-- p-0 para eliminar el padding -->
                                                                <button class="btn btn-md btn-block btn-outline-danger rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'danger')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-secondary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'secondary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-primary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'primary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>


                                    <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">
                                        <?php
                                        foreach ($tercera_fila as $key => $value) { ?>
                                            <input type="hidden" name="datos_odonto[<?= $value ?>]" value="Ninguno">
                                            <div class="" style="margin-right: 2px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%">
                                                <div class="dropdown">
                                                    <!-- Botón principal del dropdown -->
                                                    <button id="dropdownButton_<?= $value ?>" class="btn btn-md btn-light dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <?= $value ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <!-- Menú del dropdown -->
                                                    <ul class="dropdown-menu p-0"> <!-- p-0 para eliminar el padding -->
                                                        <li class="m-0"> <!-- m-0 para eliminar el margen -->
                                                            <a class="dropdown-item p-0"> <!-- p-0 para eliminar el padding -->
                                                                <button class="btn btn-md btn-block btn-outline-danger rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'danger')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-secondary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'secondary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-primary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'primary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>

                                    </div>
                                    <div style="width: 100%; display: flex; justify-content:center; align-items:center; flex-direction: row">

                                        <?php
                                        foreach ($cuarta_fila as $key => $value) { ?>
                                            <input type="hidden" name="datos_odonto[<?= $value ?>]" value="Ninguno">
                                            <div class="" style="margin-right: 2px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%">
                                                <div class="dropdown">
                                                    <!-- Botón principal del dropdown -->
                                                    <button id="dropdownButton_<?= $value ?>" class="btn btn-md btn-light dropdown-toggle" type="button" data-toggle="dropdown">
                                                        <?= $value ?>
                                                        <span class="caret"></span>
                                                    </button>
                                                    <!-- Menú del dropdown -->
                                                    <ul class="dropdown-menu p-0"> <!-- p-0 para eliminar el padding -->
                                                        <li class="m-0"> <!-- m-0 para eliminar el margen -->
                                                            <a class="dropdown-item p-0"> <!-- p-0 para eliminar el padding -->
                                                                <button class="btn btn-md btn-block btn-outline-danger rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'danger')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-secondary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'secondary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                        <li class="m-0">
                                                            <a class="dropdown-item p-0">
                                                                <button class="btn btn-md btn-block btn-outline-primary rounded-0" type="button" onclick="selectOption('<?= $value ?>', 'primary')"><?= $value ?></button>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Análisis de la Oclusión:</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td><?= $label ?></td>
                                                <?php foreach ($values as $index => $value) { ?>
                                                    <td>
                                                        <div class="form-check col-md-12 col-xs-12">
                                                            <input class="form-check-input" <?= $index == 0 ? "checked" : "" ?> type="radio" value="<?= $value ?>" name="<?= $inputName ?>" id="<?= $inputName ?>">
                                                            <label class="form-check-label" for="<?= $inputName ?>"><?= $value ?></label>
                                                        </div>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Análisis facial</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td><?= $label ?></td>
                                                <?php foreach ($values as $index => $value) { ?>
                                                    <td>
                                                        <div class="form-check col-md-12 col-xs-12">
                                                            <input class="form-check-input" <?= $index == 0 ? "checked" : "" ?> type="radio" value="<?= $value ?>" name="<?= $inputName ?>" id="<?= $inputName ?>">
                                                            <label class="form-check-label" for="<?= $inputName ?>"><?= $value ?></label>
                                                        </div>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Análisis Funcional</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td><?= $label ?></td>
                                                <?php foreach ($values as $index => $value) { ?>
                                                    <td>
                                                        <div class="form-check col-md-12 col-xs-12">
                                                            <input class="form-check-input" <?= $index == 0 ? "checked" : "" ?> type="radio" value="<?= $value ?>" name="<?= $inputName ?>" id="<?= $inputName ?>">
                                                            <label class="form-check-label" for="<?= $inputName ?>"><?= $value ?></label>
                                                        </div>
                                                    </td>
                                                <?php } ?>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Análisis de modelos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td><?= htmlspecialchars($label) ?></td>
                                                <td>
                                                    <input type="text" name="<?= $inputName ?>_superior" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="<?= $inputName ?>_inferior" class="form-control">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td> <?= $label ?> </td>
                                                <td> <input type="text" name="<?= $input_name ?>_superior" id="" class="form-control"> </td>
                                                <td> <input type="text" name="<?= $input_name ?>_inferior" id="" class="form-control"> </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td><?= $label ?></td>
                                                <td>
                                                    <input type="text" name="<?= $inputName ?>_superior" id="" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="<?= $inputName ?>_inferior" id="" class="form-control">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>

                                <?php

                                $pieces_group = [[47, 46, 45, 44, 43], [37, 36, 35, 34, 33]];

                                foreach ($pieces_group as $group) {
                                ?>
                                    <table class="table table-bordered" style="margin: 1px; width: <?= (100 / count($pieces_group)) - 1 ?>%;">
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50%;">Pieza</th>
                                                <th class="text-center" style="width: 50%;">Indice Wala</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            foreach ($group as $piece) {
                                            ?>
                                                <tr>
                                                    <td><?= $piece ?></td>
                                                    <td>
                                                        <input type="text" name="ind_wala_<?= $piece ?>" id="ind_wala_<?= $piece ?>" class="form-control">
                                                    </td>
                                                </tr>
                                            <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>

                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Etapas del tratamiento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
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
                                        ?>
                                            <tr>
                                                <td><?= htmlspecialchars($label) ?></td>
                                                <td>
                                                    <input type="text" name="<?= $inputName ?>_superior" class="form-control">
                                                </td>
                                                <td>
                                                    <input type="text" name="<?= $inputName ?>_inferior" class="form-control">
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>



                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->


                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Analisis de Nance</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center" colspan="2">
                                                <p>Ancho mesiodistal 6 anteriores</p>
                                                <div class="col-md-12 row col-xs-12">
                                                    <div class="col-md-9 col-xs-12 row">
                                                        <?php for ($i = 1; $i <= 12; $i++) {  ?>
                                                            <div class="col-md-2 col-xs-2 py-1">
                                                                <input type="text" name="nance_<?= $i ?>" class="form-control">
                                                            </div>
                                                        <?php } ?>

                                                    </div>
                                                    <div class="col-md-3 col-xs-12 py-2">
                                                        <input type="text" class="form-control" name="nance_total">
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
                                                        <label for="max6pac" class="form-label">Max. 6 Pac.</label>
                                                        <input type="text" class="form-control" name="nance_max6pac" id="max6pac" placeholder="Ingrese valor">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="corresp" class="form-label">Corresp.</label>
                                                        <input type="text" class="form-control" name="nance_corresp" id="corresp" placeholder="Ingrese valor">
                                                    </div>
                                                </div>

                                                <!-- Fila 2: Mand. 6 ideal -->
                                                <div class="row mb-12">
                                                    <div class="col-md-12">
                                                        <label for="mand6ideal" class="form-label">Mand. 6 ideal</label>
                                                        <input type="text" class="form-control" name="nance_mand6ideal" placeholder="Ingrese valor">
                                                    </div>
                                                </div>

                                                <!-- Fila 4: Mand. 6 Pac. y Mand. 6 ideal -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="mand6pac" class="form-label">Mand. 6 Pac.</label>
                                                        <input type="text" class="form-control" name="nance_mand6pac" placeholder="Ingrese valor">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="mand6ideal2" class="form-label">Mand. 6 ideal</label>
                                                        <input type="text" class="form-control" name="nance_mand6ideal2" placeholder="Ingrese valor">
                                                    </div>
                                                </div>
                                                <p><b>Exceso inferior</b></p>
                                            </td>
                                            <td class="text-center" style="width:50%">
                                                <p>Relación total < 77,2 %</p>
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label for="mand6pac" class="form-label">Mand. 6 Pac.</label>
                                                                <input type="text" class="form-control" name="nance_mand6pac" placeholder="Ingrese valor">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="corresp" class="form-label">Corresp.</label>
                                                                <input type="text" class="form-control" name="nance_corresp" placeholder="Ingrese valor">
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="col-md-12">
                                                            <label for="max6ideal" class="form-label">Max. 6 ideal</label>
                                                            <input type="text" class="form-control" name="nance_max6ideal" placeholder="Ingrese valor">
                                                        </div>
                                                        <!-- Fila 3: Max. 6 Pac. y Max. 6 ideal -->
                                                        <div class="row mb-3">
                                                            <div class="col-md-6">
                                                                <label for="max6pac" class="form-label">Max. 6 Pac.</label>
                                                                <input type="text" class="form-control" name="nance_max6pac" placeholder="Ingrese valor">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <label for="max6ideal2" class="form-label">Max. 6 ideal</label>
                                                                <input type="text" class="form-control" name="nance_max6ideal2" placeholder="Ingrese valor">
                                                            </div>
                                                        </div>
                                                        <p><b>Exceso superior</b></p>
                                            </td>
                                        </tr>

                                    </tbody>
                                </table>



                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Diagnostico</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">

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
                                ?>
                                    <div class="form-group col-md-6">
                                        <label for=""><?= $label ?></label>
                                        <textarea name="<?= $inputName ?>" id="<?= $inputName ?>" class="form-control"></textarea>
                                    </div>
                                <?php } ?>


                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Plan de tratamiento</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <label for="">Objetivos</label>
                                    <textarea name="objetivos_tratamiento" id="objetivos_tratamiento" class="col-md-12"></textarea>
                                </div>

                                <div class="col-md-12">
                                    <label for="">Plan de tratamiento</label>
                                    <textarea name="plan_tratamiento" id="plan_tratamiento" class="col-md-12"></textarea>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->



                    <!-- Botón de Guardar -->
                    <div class="row">
                        <div class="col-md-12 mb-3" align="left">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="terminado" required>
                                <label class="form-check-label" for="terminado">Ya terminé</label>
                            </div>
                        </div>
                        <input type="hidden" name="data_checks" id="data_checks" value="{}">
                        <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="cliente_id" value="<?= $clienteId ?>">
                        <div class="col-md-12">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%" onclick="submitear()" type="button">Guardar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</div>

<?php
require_once "../footer.php";
require_once '../plantilla.php';
?>

<script src="apiVoz_3.2.js"></script>
<script>
    function submitear() {
        let data_checks = {};
        $("#form input").each(function() {
            const type = $(this).attr("type");
            const name = $(this).attr("name");

            if (!name) {
                console.log("elemento ", $(this), " name ", name);

            }


            if (type == 'checkbox' && name != 'terminado') {
                console.log("type", type);
                console.log("name", name);
                const isChecked = $(this).prop("checked"); // Usar .prop() en lugar de .attr() para obtener el estado de los checkboxes
                data_checks[name] = isChecked ? 'on' : 'off';
            }
        });

        $("#data_checks").val(JSON.stringify(data_checks))

        // console.log("submiteado");
        // console.log(data_checks);

        $("#form").submit();
    }

    function selectOption(value, style) {
        // Obtener el botón principal del dropdown
        const dropdownButton = document.getElementById(`dropdownButton_${value}`);

        // Cambiar el texto del botón
        dropdownButton.innerText = value;

        // Cambiar el estilo del botón según la opción seleccionada
        dropdownButton.className = `btn btn-md dropdown-toggle btn-${style}`;

        let valueHidden = "";
        switch (style) {
            case "danger":
                valueHidden = 'Cariado';
                break;
            case "secondary":
                valueHidden = 'Perdido';
                break;
            case "primary":
                valueHidden = 'Obturado';
                break;
            default:
                valueHidden = 'Ninguno';
                break;
        }

        $(`input[ name="datos_odonto[${value}]" ]`).val(valueHidden);

    }
</script>


<script>
    // Evitar problemas con el carácter "'"
    $(document).on('input', 'input[type="text"], textarea', function() {
        $(this).val($(this).val().replace(/[']/g, ''));
    });
</script>

<script src="plugins/LottieK/lottie.min.js"></script>