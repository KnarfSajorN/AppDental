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

<?php

$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
require_once '../preventView.php';

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $empresaNombre ?> </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <style>

    </style>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">


    <style>
        @media print {
            .page-header, .page-footer{
                background-color: transparent !important;
            }

            hr {
                display: block;
                border: 1px solid #000;
                margin: 10px 10px;
            }

            *,
            body,
            html,
            table td,
            table th,i, div {
                -webkit-print-color-adjust: exact !important;
                print-color-adjust: exact !important;

            }
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        @page {
            size: A4;
            margin: 40px;
        }


        @media print {

            html,
            body {
                width: 210mm;
                height: 297mm;
            }

            @-moz-document url-prefix() {}

            .col-sm-1,
            .col-sm-2,
            .col-sm-3,
            .col-sm-4,
            .col-sm-5,
            .col-sm-6,
            .col-sm-7,
            .col-sm-8,
            .col-sm-9,
            .col-sm-10,
            .col-sm-11,
            .col-sm-12,
            .col-md-1,
            .col-md-2,
            .col-md-3,
            .col-md-4,
            .col-md-5,
            .col-md-6,
            .col-md-7,
            .col-md-8,
            .col-md-9,
            .col-md-10,
            .col-md-11,
            .col-smdm-12 {
                float: left;
            }

            .col-sm-12,
            .col-md-12 {
                width: 100%;
            }

            .col-sm-11,
            .col-md-11 {
                width: 91.66666667%;
            }

            .col-sm-10,
            .col-md-10 {
                width: 83.33333333%;
            }

            .col-sm-9,
            .col-md-9 {
                width: 75%;
            }

            .col-sm-8,
            .col-md-8 {
                width: 66.66666667%;
            }

            .col-sm-7,
            .col-md-7 {
                width: 58.33333333%;
            }

            .col-sm-6,
            .col-md-6 {
                width: 50%;
            }

            .col-sm-5,
            .col-md-5 {
                width: 41.66666667%;
            }

            .col-sm-4,
            .col-md-4 {
                width: 33.33333333%;
            }

            .col-sm-3,
            .col-md-3 {
                width: 25%;
            }

            .col-sm-2,
            .col-md-2 {
                width: 16.66666667%;
            }

            .col-sm-1,
            .col-md-1 {
                width: 8.33333333%;
            }

            .col-sm-pull-12 {
                right: 100%;
            }

            .col-sm-pull-11 {
                right: 91.66666667%;
            }

            .col-sm-pull-10 {
                right: 83.33333333%;
            }

            .col-sm-pull-9 {
                right: 75%;
            }

            .col-sm-pull-8 {
                right: 66.66666667%;
            }

            .col-sm-pull-7 {
                right: 58.33333333%;
            }

            .col-sm-pull-6 {
                right: 50%;
            }

            .col-sm-pull-5 {
                right: 41.66666667%;
            }

            .col-sm-pull-4 {
                right: 33.33333333%;
            }

            .col-sm-pull-3 {
                right: 25%;
            }

            .col-sm-pull-2 {
                right: 16.66666667%;
            }

            .col-sm-pull-1 {
                right: 8.33333333%;
            }

            .col-sm-pull-0 {
                right: auto;
            }

            .col-sm-Push-12 {
                left: 100%;
            }

            .col-sm-Push-11 {
                left: 91.66666667%;
            }

            .col-sm-Push-10 {
                left: 83.33333333%;
            }

            .col-sm-Push-9 {
                left: 75%;
            }

            .col-sm-Push-8 {
                left: 66.66666667%;
            }

            .col-sm-Push-7 {
                left: 58.33333333%;
            }

            .col-sm-Push-6 {
                left: 50%;
            }

            .col-sm-Push-5 {
                left: 41.66666667%;
            }

            .col-sm-Push-4 {
                left: 33.33333333%;
            }

            .col-sm-Push-3 {
                left: 25%;
            }

            .col-sm-Push-2 {
                left: 16.66666667%;
            }

            .col-sm-Push-1 {
                left: 8.33333333%;
            }

            .col-sm-Push-0 {
                left: auto;
            }

            .col-sm-offset-12 {
                margin-left: 100%;
            }

            .col-sm-offset-11 {
                margin-left: 91.66666667%;
            }

            .col-sm-offset-10 {
                margin-left: 83.33333333%;
            }

            .col-sm-offset-9 {
                margin-left: 75%;
            }

            .col-sm-offset-8 {
                margin-left: 66.66666667%;
            }

            .col-sm-offset-7 {
                margin-left: 58.33333333%;
            }

            .col-sm-offset-6 {
                margin-left: 50%;
            }

            .col-sm-offset-5 {
                margin-left: 41.66666667%;
            }

            .col-sm-offset-4 {
                margin-left: 33.33333333%;
            }

            .col-sm-offset-3 {
                margin-left: 25%;
            }

            .col-sm-offset-2 {
                margin-left: 16.66666667%;
            }

            .col-sm-offset-1 {
                margin-left: 8.33333333%;
            }

            .col-sm-offset-0 {
                margin-left: 0%;
            }

            .visible-xs {
                display: none !important;
            }

            .hidden-xs {
                display: block !important;
            }

            table.hidden-xs {
                display: table;
            }

            tr.hidden-xs {
                display: table-row !important;
            }

            th.hidden-xs,
            td.hidden-xs {
                display: table-cell !important;
            }

            .hidden-xs.hidden-print {
                display: none !important;
            }

            .hidden-sm {
                display: none !important;
            }

            .visible-sm {
                display: block !important;
            }

            table.visible-sm {
                display: table;
            }

            tr.visible-sm {
                display: table-row !important;
            }

            th.visible-sm,
            td.visible-sm {
                display: table-cell !important;
            }

            * {
                print-color-adjust: exact !important;
                color-adjust: exact !important;
                text-rendering: optimizeLegibility !important;
                -webkit-print-color-adjust: exact !important;
                -webkit-color-adjust: exact !important;
                -moz-print-color-adjust: exact !important;
                -moz-color-adjust: exact !important;
            }

            .icon-cariado {
                color: red !important;
            }

            .icon-perdido {
                color: gray !important;
            }

            .icon-obturado {
                color: rgb(23, 89, 163) !important;
            }
        }

        /* esta clase sirve para cuando un div se monta por que los anteriores son mas largos con esto se pone la clase en la tabla de clases y lo corrige */
        .clear-both {
            clear: both;
        }


        @media print {}



        .icon-cariado {
            color: red !important;
        }

        .icon-perdido {
            color: gray !important;
        }

        .icon-obturado {
            color: rgb(23, 89, 163) !important;
        }
    </style>

</head>



<body>

    <div class="page-header row" style="text-align: center;z-index: 1;">
        <div class="col-5" align="left"><?php echo $Logo ?></div>

        <div class="col-7" style="font-size: 15px;text-align: right;"><?php echo nl2br($header) ?></div>

        <button type="button" onClick="window.print()"
            style='background: rgb(250,235,215);background: -moz-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: -webkit-radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);background: radial-gradient(circle, rgba(250,235,215,1) 0%, rgba(60,141,176,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr=" #faebd7",endColorstr="#3c8db0" ,GradientType=1);'>
            IMPRIMIR!
        </button>
    </div>

    <div class="page-footer" style="z-index: 1;">
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
                    <div class="page" style="width:100vw;">
                        <table class="table" style="width: 100%;margin-top: 3px;">
                            <tr>
                                <td width="35%">
                                    <b>Nombre:</b> <?= $RowCliente["nombre_cliente"] ?>
                                </td>
                                <td width="30%">
                                    <b>Documento:</b> <?= $RowCliente["CODI_CLIENTE"] ?>
                                </td>
                            </tr>
                            <tr>
                                <td width="20%">
                                    <b>F.Nacimiento:</b> <?= $RowCliente["fechaNacimiento"] ?>
                                </td>
                                <td width="15%">
                                    <b>Edad:</b> <?php echo CalculoEdadPaciente($RowCliente["fechaNacimiento"]); ?>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <b>Residencia:</b> <?= $RowCliente["direccion_cliente"] ?>
                                </td>
                                <td>
                                    <b>EPS:</b> <?= $RowCliente["entidadSalud"] ?>
                                </td>
                            </tr>
                            <tr style="border-bottom-width: 1px;">
                                <td>
                                    <b>Teléfono:</b> <?= $RowCliente["celular_cliente"] ?>
                                </td>
                                <td>
                                    <b>Género:</b> <?= $RowCliente["genero"] ?>
                                </td>
                            </tr>
                        </table>


                        <!-- <h2 align="center"> <?php echo $nombre ?></h2>
                        <p>Fecha :<?php echo $Fecha ?></p> -->

                        <h5 class="text-center my-2">Análisis Clínico</h5>

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
                                    <p class="text-center"> <i class="fas fa-tooth text-danger icon-cariado"></i> Cariado | <i class="fas fa-tooth text-secondary icon-perdido"></i> Perdido | <i class="fas fa-tooth text-primary icon-obturado"></i> Obturado </p>
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
                                        <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%"><?= $value ?></div>
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
                                        <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%"><?= $value ?></div>
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
                                        <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%"><?= $value ?></div>
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
                                        <div style="text-align:center; color:<?= $color == 'white' ? 'black' : 'white' ?>; border: <?= $color <> 'white' ? '0' : '1px solid grey' ?>; background-color: <?= $color ?>; height:20px; border-radius: 10px; margin: 5px; min-width: <?= 100 / count($segunda_fila) ?>%; width: <?= 100 / count($segunda_fila) ?>%"><?= $value ?></div>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>


                        <h5 class="text-center my-2">Análisis de la Oclusión:</h5>

                        <div class="row">
                            <center>
                                <table class="table table-bordered" style="width: 98%">
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


                        <h5 class="text-center my-2">Análisis facial</h5>
                        <div class="row">
                            <center>
                                <table class="table table-bordered" style="width:98%">
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
                                <table class="table table-bordered" style="width: 98%;">
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

                        <h5 class="text-center my-2 ">Análisis de modelos</h5>
                        <div class="row">
                            <center>
                                <table style="width:98%" class="table table-bordered">
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

                        <h5 class="text-center my-2">Etapas del tratamiento</h5>
                        <div class="row">
                            <center>
                                <table class="table table-bordered" style="width:98%">
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

                        <h5 class="text-center my-2">Analisis de Nance</h5>
                        <div class="row">
                            <center>
                                <table class="table table-bordered" style="width:98%">
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

                        <h5 class="text-center my-2">Diagnostico</h5>
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

                        <h5 class="text-center my-2">Plan de tratamiento</h5>
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






                        <!-- <div class="col-md-6" align="center">
                            <?php
                            echo $firmaImg;

                            ?>
                            <br>_______________________________________<br>
                            <?php echo $nombreF ?><br>
                            <?php echo $especialidad ?><br>
                            <b>* Documento firmado digitalmente *</b>
                        </div> -->
                    </div>



                    <!--cerra el div con clase page-->
                    </div>
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

<script>
    window.print()
</script>



<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<script src="plugins/fastclick/fastclick.js"></script>
<script src="dist/js/app.min.js"></script>
<script src="dist/js/demo.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
<script src="plugins/iCheck/icheck.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>

<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>


</html>