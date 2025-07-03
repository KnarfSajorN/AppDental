<?php
date_default_timezone_set('America/Bogota');


include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$historiaClinica = $_GET['historiaClinica'];
$idHistoria = $_GET['idHistoria'];

$queryListhc = mysqli_query($conn3, "SELECT * from configTablasOC where id = $idHistoria ");
$nrowl = mysqli_num_rows($queryListhc);
while ($rowhc = mysqli_fetch_array($queryListhc)) {
    $Tabla = $rowhc['name'];
    $nombre = $rowhc['nombre'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    foreach ($rowMotorizado as $key => $val) {
        $resultado[$key] = $val;
    }
}
$queryCuenta = mysqli_query($conn3, "SELECT count(*) AS cuentaHistoria FROM  $Tabla where cliente_id = {$resultado['cliente_id']} AND id <= $historiaClinica")->fetch_object();
// ver el array
// echo '<pre>';
// var_dump($resultado);
// echo '</pre>';

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = {$resultado['usuario_id']}");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    // Nuevos campos

    $nombreF      = $rowMotorizado['nombreF'];
    $telefonoF    = $rowMotorizado['telefonoF'];
    $direccionF   = $rowMotorizado['direccionF'];
    $emailF       = $rowMotorizado['emailF'];
    $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
    $licenciaF    = $rowMotorizado['licenciaF'];
    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];


    $LogoF               = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="https://medicalsoftplus.com/Baseocupacional_Ecuador/logos/' . $LogoF . '" style="width:100%;height:100%;">';
    }


    if (strlen($firma) > 0) {
        $firmaImg = '<img src="https://medicalsoftplus.com/Baseocupacional_Ecuador/FirmasReg/' . $firma . '" class="img-fluid" style="width: 100%; height: 100%;">';
    }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = {$resultado['usuario_id']}");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $IDDoctor      = $rowMotorizado['ID'];
    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];
    $especialidad        = $rowMotorizado['especialidad'];
    $nit                = $rowMotorizado['nit'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = {$resultado['cliente_id']}");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $primer_apellido             = $rowMotorizado['primer_apellido'];
    $segundo_apellido             = $rowMotorizado['segundo_apellido'];
    $primer_nombre             = $rowMotorizado['primer_nombre'];
    $segundo_nombre             = $rowMotorizado['segundo_nombre'];
    $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
    $celular_cliente            = $rowMotorizado['celular_cliente'];
    $seguro                     = $rowMotorizado['seguro'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $genero = $rowMotorizado['genero'];
    $discapacidad = $rowMotorizado['tipodiscapacidad'];
    $ocupacion = $rowMotorizado['ocupacion'];
}
$queryList = mysqli_query($conn3, "SELECT * FROM firmas where historia_id = $historiaClinica and cliente_id = {$resultado['cliente_id']} and historia_nombre = $idHistoria");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Firma           = $rowMotorizado['firma'];
}

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> <?php echo $empresaNombre ?> </title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

    <style>
        @page {
            size: A4;
            margin: 15px;
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
        }

        .flexBox {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .borderPM {
            margin: 0;
            padding: 0;
            border: 1px solid #000;
        }

        .heightTitle {
            height: 30px;
        }

        .heighSeparar {
            height: 15px;
        }

        .fontSubTitle {
            font-size: 12px;
        }

        .saltopagina {
            display: block;
            page-break-before: always;
        }
    </style>

</head>

<!-- <body onload="window.print();"> -->

<body>
    <div class="container-fluid">
        <div class="col-md-12">
            <div class="box box-solid">

                <div class="col-md-12 borderPM" style="border:none;height: 84px">
                    <div class="row borderPM">
                        <div class="col-xs-6 borderPM" style="border:none;" style="height: 84px">
                            <div class="col-xs-6 borderPM flexBox" style="height: 42px;">
                                <h4>MA-MT-FR01</h4>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="flex-flow: column; height: 42px;">
                                <span>Rev.: <?= $queryCuenta->cuentaHistoria ?></span>
                                <span><?= Date("d-m-Y", strtotime($resultado['Fecha'])) ?></span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox" style="height: 42px;">
                                <h4>FICHA MEDICA OCUPACIONAL REINTEGRO</h4>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox" style="height: 84px">
                            <?= $Logo ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>A. DATOS DEL ESTABLECIMIENTO - EMPRESA Y USUARIO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">INSTITUCIÓN DEL SISTEMA O NOMBRE DE LA EMPRESA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">RUC</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">CIIU</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">ESTABLECIMIENTO DE SALUD</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">NÚMERO DE HISTORIA CLÍNICA</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">NÚMERO DE ARCHIVO</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['intSNE'] ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['RUC'] ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['CIU'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['ES'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $idHistoria ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['NA'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">PRIMER APELLIDO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">SEGUNDO APELLIDO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">PRIMER NOMBRE</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">SEGUNDO NOMBRE</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">SEXO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">EDAD (AÑOS)</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $primer_apellido ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $segundo_apellido ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $primer_nombre ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $segundo_nombre ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $genero ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= CalculoEdadPaciente($fechaNacimiento, 'y') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">PUESTO DE TRABAJO (CIUO)</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">FECHA DEL ÚLTIMO DÍA LABORAL</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">FECHA DE REINGRESO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">TOTAL (DÍAS)</span>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">CAUSA DE SALIDA</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['puestoTrabajo'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['fechaUDL'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['fechaReintegro'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['diasTotal'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['causaSalida'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>B. MOTIVO DE CONSULTA / CONDICIÓN DE REINTEGRO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xmotivodec643'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>C. ENFERMEDAD ACTUAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xenfermeda758'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>D. CONSTANTES VITALES Y ANTROPOMETRÍA </h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">PRESIÓN ARTERIAL (mmHg)</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">TEMPERATURA (°C)</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">FRECUENCIA CARDIACA (Lat/min)</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">SATURACIÓN DE OXÍGENO (O2%)</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">FRECUENCIA RESPIRATORIA (fr/min)</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">PESO (Kg)</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xpresioacu507'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xtemperatu543'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci662'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xsaturacio789'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci201'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xpesokg144'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">TALLA (cm)</span>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">ÍNDICE DE MASA CORPORAL (Kg/m2)</span>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">PERÍMETRO ABDOMINAL (cm)</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xtallacm545'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xiacutendi303'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xperiacute896'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>E. EXAMEN FÍSICO REGIONAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">REGIONES</span>
                            <?php
                            $resultado['x1piel327'] = explode("|", $resultado['x1piel327']);
                            $resultado['x2ojos875'] = explode("|", $resultado['x2ojos875']);
                            $resultado['x3oiacuted865'] = explode("|", $resultado['x3oiacuted865']);
                            $resultado['x4orofarin338'] = explode("|", $resultado['x4orofarin338']);
                            $resultado['x5nariz588'] = explode("|", $resultado['x5nariz588']);
                            $resultado['x6cuello370'] = explode("|", $resultado['x6cuello370']);
                            $resultado['x7toacuter724'] = explode("|", $resultado['x7toacuter724']);
                            $resultado['x8toacuter320'] = explode("|", $resultado['x8toacuter320']);
                            $resultado['x9abdomen267'] = explode("|", $resultado['x9abdomen267']);
                            $resultado['x10columna844'] = explode("|", $resultado['x10columna844']);
                            $resultado['x11pelvis441'] = explode("|", $resultado['x11pelvis441']);
                            $resultado['x12extremi861'] = explode("|", $resultado['x12extremi861']);
                            $resultado['x13neurolo995'] = explode("|", $resultado['x13neurolo995']);
                            $arrayEFR = [
                                count(array_filter($resultado['x1piel327'])),
                                count(array_filter($resultado['x2ojos875'])),
                                count(array_filter($resultado['x3oiacuted865'])),
                                count(array_filter($resultado['x4orofarin338'])),
                                count(array_filter($resultado['x5nariz588'])),
                                count(array_filter($resultado['x6cuello370'])),
                                count(array_filter($resultado['x7toacuter724'])),
                                count(array_filter($resultado['x8toacuter320'])),
                                count(array_filter($resultado['x9abdomen267'])),
                                count(array_filter($resultado['x10columna844'])),
                                count(array_filter($resultado['x11pelvis441'])),
                                count(array_filter($resultado['x12extremi861']))
                            ];
                            $posicionMayor1 = 0;
                            for ($i = 0; $i < 6; $i++) {
                                if ($arrayEFR[$i] > $posicionMayor1) {
                                    $posicionMayor1 = $arrayEFR[$i];
                                }
                            }
                            $posicionMayor2 = 0;
                            for ($i = 6; $i < 8; $i++) {
                                if ($arrayEFR[$i] > $posicionMayor2) {
                                    $posicionMayor2 = $arrayEFR[$i];
                                }
                            }
                            // var_dump($resultado['x1piel327']);
                            // echo $posicionMayor1;
                            // echo $posicionMayor2;
                            ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 47px;">
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">1. Piel</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x1piel327'])) {
                                    if ($resultado['x1piel327'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel327'][$i] != "" ? $resultado['x1piel327'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel327'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x1piel327']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x1piel327'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">2. Ojos</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x2ojos875'])) {
                                    if ($resultado['x2ojos875'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos875'][$i] != "" ? $resultado['x2ojos875'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos875'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x2ojos875']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x2ojos875'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">3. Oído</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x3oiacuted865'])) {
                                    if ($resultado['x3oiacuted865'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted865'][$i] != "" ? $resultado['x3oiacuted865'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted865'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x3oiacuted865']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x3oiacuted865'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">4. Oro faringe</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x4orofarin338'])) {
                                    if ($resultado['x4orofarin338'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin338'][$i] != "" ? $resultado['x4orofarin338'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin338'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x4orofarin338']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x4orofarin338'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">5. Nariz</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x5nariz588'])) {
                                    if ($resultado['x5nariz588'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz588'][$i] != "" ? $resultado['x5nariz588'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz588'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x5nariz588']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x5nariz588'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">6. Cuello</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x6cuello370'])) {
                                    if ($resultado['x6cuello370'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello370'][$i] != "" ? $resultado['x6cuello370'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello370'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x6cuello370']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x6cuello370'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 47px;">
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">7. Tórax</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x7toacuter724'])) {
                                    if ($resultado['x7toacuter724'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter724'][$i] != "" ? $resultado['x7toacuter724'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter724'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x7toacuter724']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x7toacuter724'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">8. Tórax</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x8toacuter320'])) {
                                    if ($resultado['x8toacuter320'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter320'][$i] != "" ? $resultado['x8toacuter320'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter320'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x8toacuter320']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x8toacuter320'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">9. Abdomen</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x9abdomen267'])) {
                                    if ($resultado['x9abdomen267'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen267'][$i] != "" ? $resultado['x9abdomen267'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen267'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x9abdomen267']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x9abdomen267'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">10. Columna</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x10columna844'])) {
                                    if ($resultado['x10columna844'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna844'][$i] != "" ? $resultado['x10columna844'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna844'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x10columna844']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x10columna844'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">11. Pelvis</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x11pelvis441'])) {
                                    if ($resultado['x11pelvis441'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis441'][$i] != "" ? $resultado['x11pelvis441'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis441'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x11pelvis441']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x11pelvis441'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">12. Extremidades</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x12extremi861'])) {
                                    if ($resultado['x12extremi861'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi861'][$i] != "" ? $resultado['x12extremi861'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi861'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x12extremi861']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x12extremi861'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 47px;">
                            <div class="col-xs-12 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">13. Neurológico</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x12extremi861'])) {
                                    if ($resultado['x12extremi861'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi861'][$i] != "" ? $resultado['x12extremi861'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi861'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                <?php endif;
                                    $i++;
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci302']; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; word-break: break-all; overflow: hidden; padding: 5px; min-height: 40px;">
                            <h4>F. RESULTADOS DE EXÁMENES (IMAGEN, LABORATORIO Y OTROS)</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">EXAMEN</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">FECHA</span>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">RESULTADO</span>
                            </div>
                            <?php
                            list($laboratorio, $imagenologia, $otros) = explode(" |||| ", $resultado['examenes']);
                            $laboratorio = explode(" ||| ", $laboratorio);
                            $imagenologia = explode(" ||| ", $imagenologia);
                            $otros = explode(" ||| ", $otros);
                            ?>
                        </div>
                        <?php $a = 0;
                        while ($a < count($laboratorio)) {
                            $laboratorio[$a] = explode(" || ", $laboratorio[$a]);
                            $laboratorioName = explode(": ", $laboratorio[$a][0])[0];
                            $laboratorio[$a][0] = array_filter(explode(",", explode(": ", $laboratorio[$a][0])[1]));
                            $laboratorio[$a][1] = explode(": ", $laboratorio[$a][1]);
                            $laboratorio[$a][2] = explode(": ", $laboratorio[$a][2]);
                        ?>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                                <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?php
                                    echo $laboratorioName . " ";
                                    foreach ($laboratorio[$a][0] as $key => $value) {
                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . ($key < (count($laboratorio[$a][0]) - 1) ? ', ' : '');
                                    }
                                    ?>
                                </div>
                                <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $laboratorio[$a][1][1] ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $laboratorio[$a][2][1] ?>
                                </div>
                            </div>
                        <?php $a++;
                        } ?>
                        <?php $a = 0;
                        while ($a < count($imagenologia)) {
                            $imagenologia[$a] = explode(" || ", $imagenologia[$a]);
                            $imagenologiaName = explode(": ", $imagenologia[$a][0])[0];
                            $imagenologia[$a][0] = array_filter(explode(",", explode(": ", $imagenologia[$a][0])[1]));
                            $imagenologia[$a][1] = explode(": ", $imagenologia[$a][1]);
                            $imagenologia[$a][2] = explode(": ", $imagenologia[$a][2]);
                        ?>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                                <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?php
                                    echo $imagenologiaName . " ";
                                    foreach ($imagenologia[$a][0] as $key => $value) {
                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . ($key < (count($imagenologia[$a][0]) - 1) ? ', ' : '');
                                    }
                                    ?>
                                </div>
                                <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $imagenologia[$a][1][1] ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $imagenologia[$a][2][1] ?>
                                </div>
                            </div>
                        <?php $a++;
                        } ?>
                        <?php $a = 0;
                        while ($a < count($otros)) {
                            $otros[$a] = explode(" || ", $otros[$a]);
                            list($nameOtro, $valorOtro) = explode(": ", $otros[$a][0]);
                            $otros[$a][1] = explode(": ", $otros[$a][1]);
                            $otros[$a][2] = explode(": ", $otros[$a][2]);
                        ?>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                                <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?php
                                    echo ($a + 1) . ". Otro " . $valorOtro;
                                    ?>
                                </div>
                                <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $otros[$a][1][1] ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $otros[$a][2][1] ?>
                                </div>
                            </div>
                        <?php $a++;
                        } ?>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci145']; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none; height: 40px; ">
                    <div class="row borderPM" style="border:none; height: 40px; ">
                        <div class="col-xs-12 borderPM heightTitle" style="border:none;">
                            <div class="col-xs-3 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <h4>G. DIAGNÓSTICO</h4>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">PRE = PRESUNTIVO DEF = DEFINITIVO </span>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">CIE</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">PRE</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">DEF</span>
                            </div>
                            <?php $resultado['cie10s'] = json_decode($resultado['cie10s']); ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <?php $a = 0;
                    while ($a < count($resultado['cie10s'])) { ?>
                        <div class="row borderPM" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM heightTitle" style="border:none;">
                                <div class="col-xs-6 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $resultado['cie10s'][$a][1]; ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= $resultado['cie10s'][$a][0]; ?>
                                </div>
                                <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= ($resultado['cie10s'][$a][2] == "PRE" ? 'X' : ''); ?>
                                </div>
                                <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?= ($resultado['cie10s'][$a][2] == "DEF" ? 'X' : ''); ?>
                                </div>
                            </div>
                        </div>
                    <?php $a++;
                    } ?>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>H. APTITUD MÉDICA PARA EL TRABAJO </h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme922'] == "APTO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO EN OBSERVACIÓN</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme922'] == "APTO EN OBSERVACION" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO CON LIMITACIONES</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme922'] == "APTO CON LIMITACIONES" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NO APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme922'] == "NO APTO" ? "X" : '') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span>Observación </span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci147'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span>Limitación</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xlimitacio771'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span>Reubicación</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xlimitacio771'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>I. RECOMENDACIONES Y/O TRATAMIENTO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xrecomenda490'] ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle fontSubTitle" style="border:none; justify-content: flex-start;word-break: break-all; padding: 5px;">
                            <span class="text-bold">CERTIFICO QUE LO ANTERIORMENTE EXPRESADO EN RELACIÓN A MI ESTADO DE SALUD ES VERDAD. SE ME HA INFORMADO LAS MEDIDAS PREVENTIVAS A TOMAR PARA DISMINUIR O MITIGAR LOS RIESGOS RELACIONADOS CON MI ACTIVIDAD LABORAL.</span>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>J. DATOS DEL PROFESIONAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-1 borderPM flexBox" style="min-height: 40px">
                                <span class="text-bold">FECHA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="min-height: 40px">
                                <?= Date("d-m-Y") ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="min-height: 40px">
                                <span class="text-bold">HORA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="min-height: 40px">
                                <?= Date("h:i:s") ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="min-height: 40px">
                                <span class="text-bold">NOMBRE Y APELLIDO</span>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="min-height: 40px">
                                <?= funcionMaster($resultado['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="min-height: 40px">
                                <span class="text-bold">CÓDIGO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="min-height: 40px">
<?= $IDDoctor ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 100px;">
                            <div class="col-xs-6 borderPM flexBox" style="height: 100px">
                                <?= $firmaImg ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="height: 100px">
                                <img src='<?= $Firma ?>' class="img-fluid" style="width: 100%; height: 100%;">
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 30px;">
                            <div class="col-xs-6 borderPM flexBox" style="height: 30px; padding: 5px;">
                                <span class="text-bold">FIRMA Y SELLO</span>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="height: 30px; padding: 5px;">
                                <span class="text-bold">O. FIRMA DEL USUARIO</span>
                            </div>
                        </div>
                    </div>
                </div>


                <div align="center">
                    <!-- <div class="col-xs-6">

                        <strong>Firma del Paciente (o persona autorizada para firmar para el Paciente):</strong> <br>
                        <div class="col-xs-12">
                            <?php if (strlen($Firma) > 10) {
                                echo "<img src='$Firma' height='100' width='200'>";
                            }
                            ?> <br>
                            Nombre: <?php echo $nombre_cliente; ?> <br>
                            C.C. <?php echo $CODI_CLIENTE; ?>

                        </div>

                    </div> -->

                    <!--<div class="col-xs-6" align="center">-->
                    <!-- <div align="center">
                        <?php
                        echo  $firmaImg;

                        ?>
                        <br>_______________________________________<br>
                        <?php echo $nombreF ?><br>
                        <?php echo $especialidad ?><br>
                        <b>* Documento firmado digitalmente *</b>
                    </div> -->




                    <!--<div class="col-xs-12" align="center">-->
                    <!-- <div align="center">
                        <footer style="width:100%; margin-left: 0px;">


                            <div class="copyright" style="background-color: #0d47a1;">
                                <div class="container-fluid" style="background-color: #0d47a1; color: #bbdefb;">
                                    <p> <?php echo $pieF ?></p>

                                </div>
                            </div>
                        </footer>
                    </div> -->
                    <!-- /.row -->

                    <!-- this row will not appear when printing -->
                    <div class="row no-print">
                        <div class="col-xs-12">
                            <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1 ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>



                        </div>
                    </div>
                    </section>
                    <!-- /.content -->
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>


    <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
    <!-- Bootstrap 3.3.6 -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="plugins/fastclick/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/app.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Select2 -->
    <script src="plugins/select2/select2.full.min.js"></script>
    <!-- InputMask -->
    <script src="plugins/input-mask/jquery.inputmask.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
    <script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
    <!-- date-range-picker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
    <script src="plugins/daterangepicker/daterangepicker.js"></script>
    <!-- bootstrap datepicker -->
    <script src="plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- bootstrap color picker -->
    <script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
    <!-- bootstrap time picker -->
    <script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
    <!-- iCheck 1.0.1 -->
    <script src="plugins/iCheck/icheck.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="plugins/morris/morris.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
</body>

</html>