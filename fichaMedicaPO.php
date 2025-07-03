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
        $firmaImg = '<img src="https://medicalsoftplus.com/Baseocupacional_Ecuador/FirmasReg/' . $firma . '" class="img-fluid" style="width: 50%; height: 50%;">';
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
    $tiposSangre = $rowMotorizado['tiposSangre'];
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
                                <h4>FICHA MÉDICA PRE - OCUPACIONAL</h4>
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
                                <span class="text-bold">RELIGIÓN</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">GRUPO SANGUÍNEO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">LATERALIDAD</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">ORIENTACIÓN SEXUAL</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">IDENTIDAD GÉNERO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">DISCAPACIDAD</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['religion'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $tiposSangre ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['lateralidad'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['orientacionSexual'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['identidadGenero'] ?>
                            </div>
                            <div class="col-xs-2 borderPM" style="border:none; height: 40px">
                                <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                    <?= ($resultado['discapacidad'] != "" ? $resultado['discapacidad'] : 'No') ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox" style="height: 40px">
                                    <?= $resultado['tipoDiscapacidad'] ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox" style="height: 40px">
                                    <?= $resultado['porcentajeDiscapacidad'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">FECHA DE INGRESO AL TRABAJO</span>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">PUESTO DE TRABAJO (CIUO)</span>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">ÁREA DE TRABAJO</span>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">ACTIVIDADES RELEVANTES AL PUESTO DE TRABAJO A OCUPAR</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['fechaIngresoTrabajo'] ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['puestoTrabajo'] ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['areaTrabajo'] ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['actividadRPTO'] ?>
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
                            <h4>B. MOTIVO DE CONSULTA</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xmotivodec200'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>C. ANTECEDENTES PERSONALES</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ANTECEDENTES CLÍNICOS Y QUIRÚRGICOS</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xanteceden540'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ANTECEDENTES GINECO OBSTÉTRICOS</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">MENARQUÍA</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">CICLOS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">FECHA DE ULTIMA MENSTRUACIÓN</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">GESTAS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">PARTOS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">CESÁREAS</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xmenarquia198'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xciclos732'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xfechadeul804'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xgestas501'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['partos'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xcesareas108'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">ABORTOS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height: 40px;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: calc(40px/2); padding: 5px;">
                                <span class="text-bold">HIJOS </span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(40px/2);">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">VIVOS</span>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">MUERTOS</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: calc(40px/2); padding: 5px;">
                                <span class="text-bold">VIDA SEXUAL ACTIVA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(40px/2);">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">SI</span>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">NO</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: calc(40px/2); padding: 5px;">
                                <span class="text-bold">MÉTODO DE PLANIFICACIÓN FAMILIAR</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(40px/2);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">SI</span>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">NO</span>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">TIPO</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xabortos321'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height: 40px;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= $resultado['xhijosvivo673'] ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= $resultado['xhijosmuer404'] ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= ($resultado['xvidasexua818'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= ($resultado['xvidasexua818'] == "No" ? 'X' : '') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= ($resultado['xmeacuteto294'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= ($resultado['xmeacuteto294'] == "No" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <?= $resultado['xtipo649'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">EXÁMENES REALIZADOS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <span class="text-bold">NO</span>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">TIEMPO</span>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">RESULTADO</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xexamenesr796'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x531'] == "Si" ? 'X' : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x531'] == "No" ? 'X' : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xtiempoant315'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xresultado470'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x2examenes917'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x600'] == "Si" ? 'X' : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x600'] == "No" ? 'X' : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x2tiempoan796'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x2resultad132'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x3examenes952'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x202'] == "Si" ? 'X' : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x202'] == "No" ? 'X' : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x3tiempoan280'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x3resultad325'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x4examenes256'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x134'] == "Si" ? 'X' : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x134'] == "No" ? 'X' : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x4tiempoan395'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x4tiempoan900'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ANTECEDENTES REPRODUCTIVOS MASCULINOS</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">EXÁMENES REALIZADOS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <span class="text-bold">NO</span>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">TIEMPO</span>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <span class="text-bold">RESULTADO</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xexamenesr888'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x393'] == "Si" ? 'X' : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x393'] == "No" ? 'X' : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xtiempoano869'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['xresultado761'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x2examenes969'] ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x866'] == "Si" ? 'X' : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                <?= ($resultado['x866'] == "No" ? 'X' : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x2tiempoan360'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px;">
                            <?= $resultado['x2resultad847'] ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: calc(40px/2); padding: 5px;">
                                <span class="text-bold">MÉTODO DE PLANIFICACIÓN FAMILIAR</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(40px/2);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">SI</span>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">NO</span>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">TIPO</span>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height: 40px;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: calc(40px/2); padding: 5px;">
                                <span class="text-bold">HIJOS </span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(40px/2);">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">VIVOS</span>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    <span class="text-bold">MUERTOS</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    x
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">

                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    SADADASD
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height: 40px;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    5
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    0
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 40px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    x
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">

                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    SADADASD
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height: 40px;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    5
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px;">
                                    0
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox" style="height: 40px">
                            <span class="text-bold">HÁBITOS TÓXICOS</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">CONSUMOS NOCIVOS</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                <span class="text-bold">NO</span>
                            </div>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">TIEMPO DE CONSUMO (meses)</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">CANTIDAD</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">EX CONSUMIDOR</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">TIEMPO DE ABSTINENCIA (meses)</span>
                        </div>
                    </div>
                    <?php
                    $resultado['habitosToxicos'] = json_decode($resultado['habitosToxicos']);
                    $a = 0;
                    while ($a < count($resultado['habitosToxicos'])) { ?>
                        <div class="row borderPM" style="border:none;">
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['habitosToxicos'][$a][0] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= ($resultado['habitosToxicos'][$a][1] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= ($resultado['habitosToxicos'][$a][1] == "No" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['habitosToxicos'][$a][2] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['habitosToxicos'][$a][3] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['habitosToxicos'][$a][4] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['habitosToxicos'][$a][5] ?>
                            </div>
                        </div>
                    <?php $a++;
                    } ?>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox" style="height: 40px">
                            <span class="text-bold">ESTILO DE VIDA</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">ESTILO</span>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                <span class="text-bold">NO</span>
                            </div>
                        </div>
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">¿CUÁL?</span>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold"> TIEMPO / CANTIDAD</span>
                        </div>
                    </div>
                    <?php
                    $resultado['estiloVida'] = json_decode($resultado['estiloVida']);
                    $a = 0;
                    while ($a < count($resultado['estiloVida'])) { ?>
                        <div class="row borderPM" style="border:none;">
                            <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['estiloVida'][$a][0] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= ($resultado['estiloVida'][$a][1] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= ($resultado['estiloVida'][$a][1] == "No" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['estiloVida'][$a][2] ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px;">
                                <?= $resultado['estiloVida'][$a][3] ?>
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
                            <h4>D. ANTECEDENTES DE TRABAJO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ANTECEDENTES DE EMPLEOS ANTERIORES</span>
                        </div>
                        <?php
                        $resultado['anteTrabajo'] = json_decode($resultado['anteTrabajo']);
                        $a = 0;
                        while ($a < count($resultado['anteTrabajo'])) { ?>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <span class="text-bold">EMPRESA</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <span class="text-bold">PUESTO DE TRABAJO</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <span class="text-bold">ACTIVIDADES QUE DESEMPEÑABA</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= $resultado['anteTrabajo'][$a][0] ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= $resultado['anteTrabajo'][$a][1] ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= $resultado['anteTrabajo'][$a][2] ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 93px;">
                                <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 93px; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <span class="text-bold">TIEMPO DE TRABAJO (meses)</span>
                                </div>
                                <div class="col-xs-7 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height:93px;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: calc(100%/2); padding: 5px;">
                                        <span class="text-bold">MÉTODO DE PLANIFICACIÓN FAMILIAR</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(100%/2);">
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <span class="text-bold">FÍSICO</span>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <span class="text-bold">MECÁNICO</span>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <span class="text-bold">QUÍMICO</span>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <span class="text-bold">BIOLÓGICO</span>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <span class="text-bold">ERGONÓMICO</span>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <span class="text-bold">PSICOSOCIAL</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 93px; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <span class="text-bold">OBSERVACIONES</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                                <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= $resultado['anteTrabajo'][$a][3] ?>
                                </div>
                                <div class="col-xs-7 borderPM flexBox fontSubTitle" style="border:none; flex-flow: column; height:60px;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height:60px;">
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <?= ($resultado['anteTrabajo'][$a][4] == "FISICO" ? 'X' : '') ?>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <?= ($resultado['anteTrabajo'][$a][4] == "MECANICO" ? 'X' : '') ?>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <?= ($resultado['anteTrabajo'][$a][4] == "QUIMICO" ? 'X' : '') ?>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <?= ($resultado['anteTrabajo'][$a][4] == "BIOLOGICO" ? 'X' : '') ?>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <?= ($resultado['anteTrabajo'][$a][4] == "ERGONOMICO" ? 'X' : '') ?>
                                        </div>
                                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 100%; word-break: break-all; overflow: hidden; padding: 5px;">
                                            <?= ($resultado['anteTrabajo'][$a][4] == "PSICOSOCIAL" ? 'X' : '') ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px;">
                                    <?= $resultado['anteTrabajo'][$a][5] ?>
                                </div>
                            </div>
                        <?php $a++;
                        } ?>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; word-break: break-all; overflow: hidden; padding: 5px;">
                            <span class="text-bold">ACCIDENTES DE TRABAJO (DESCRIPCIÓN)</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox heightTitle" style="justify-content: flex-start; word-break: break-all; overflow: hidden; padding:5px">
                            <span class="text-bold">FUE CALIFICADO POR EL INSTITUTO DE SEGURIDAD SOCIAL CORRESPONDIENTE</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">SI</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi327'] == "Si" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 80px;">
                            <span class="text-bold">ESPECIFICAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 120px;">
                            <?= $resultado['xencasodes861'] ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">NO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi327'] == "No" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle">
                            <span class="text-bold">FECHA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 127px;">
                            <?= $resultado['xfecha222'] ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci467'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ENFERMEDADES PROFESIONALES </span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox heightTitle" style="justify-content: flex-start; padding:5px">
                            <span class="text-bold">FUE CALIFICADO POR EL INSTITUTO DE SEGURIDAD SOCIAL CORRESPONDIENTE</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">SI</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi759'] == "Si" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 80px;">
                            <span class="text-bold">ESPECIFICAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 120px;">
                            <?= $resultado['xencasodes968'] ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">NO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi759'] == "No" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle">
                            <span class="text-bold">FECHA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 127px;">
                            <?= $resultado['xfecha239'] ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci489'] ?>
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
                            <h4>E. ANTECEDENTES FAMILIARES (DETALLAR EL PARENTESCO) </h4>
                            <?php $resultado['xanteceden437'] = explode("|", $resultado['xanteceden437']);?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">1. ENFERMEDAD CARDIO-VASCULAR</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("1. ENFERMEDAD CARDIO-VASCULAR", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">2. ENFERMEDAD METABÓLICA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("2. ENFERMEDAD METABOLICA", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">3 ENFERMEDAD NEUROLÓGICA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("3 ENFERMEDAD NEUROLOGICA", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">4. ENFERMEDAD ONCOLÓGICA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("4. ENFERMEDAD ONCOLOGICA", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">5. ENFERMEDAD INFECCIOSA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("5. ENFERMEDAD INFECCIOSA", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">6. ENFERMEDAD HEREDITARIA / CONGÉNITA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("6. ENFERMEDAD HEREDITARIA / CONGENITA", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">7. DISCAPACIDADES</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("7. DISCAPACIDADES", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">8. OTROS</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("8. OTROS", $resultado['xanteceden437']) == false ? '' : 'X') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci781'] ?>
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
                            <h4>F. FACTORES DE RIESGOS DEL PUESTO DE TRABAJO ACTUAL</h4>
                            <?php $resultado['riesgos'] = explode(" ||| ", $resultado['riesgos']); ?>
                        </div>
                        <?php $a = 0;
                        while ($a < count($resultado['riesgos'])) {
                            $datosRiesgos = explode(" || ", $resultado['riesgos'][$a]);

                            $datosRiesgos[3] = explode(" | ", $datosRiesgos[3]);
                            $riegoSeparar = explode(": ", $datosRiesgos[3][0]);
                            $riesgo1  = explode(",", $riegoSeparar[1]);
                            $otros1  = explode(": ", $datosRiesgos[3][1]);
                            // var_dump($datosRiesgos[3]);
                            // ----
                            $datosRiesgos[4] = explode(" | ", $datosRiesgos[4]);
                            $riegoSeparar = explode(": ", $datosRiesgos[4][0]);
                            $riesgo2 = explode(",", $riegoSeparar[1]);
                            $otros2 = explode(",", $datosRiesgos[4][1]);
                            // ----
                            $datosRiesgos[5] = explode(" | ", $datosRiesgos[5]);
                            $riegoSeparar = explode(": ", $datosRiesgos[5][0]);
                            $riesgo3 = explode(",", $riegoSeparar[1]);
                            $otros3 = explode(",", $datosRiesgos[5][1]);
                            // ----
                            $datosRiesgos[6] = explode(" | ", $datosRiesgos[6]);
                            $riegoSeparar = explode(": ", $datosRiesgos[6][0]);
                            $riesgo4 = explode(",", $riegoSeparar[1]);
                            $otros4 = explode(",", $datosRiesgos[6][1]);
                            // ----
                            $datosRiesgos[7] = explode(" | ", $datosRiesgos[7]);
                            $riegoSeparar = explode(": ", $datosRiesgos[7][0]);
                            $riesgo5 = explode(",", $riegoSeparar[1]);
                            $otros5 = explode(",", $datosRiesgos[7][1]);
                            // ----
                            $datosRiesgos[8] = explode(" | ", $datosRiesgos[8]);
                            $riegoSeparar = explode(": ", $datosRiesgos[8][0]);
                            $riesgo6 = explode(",", $riegoSeparar[1]);
                            $otros6 = explode(",", $datosRiesgos[8][1]);
                            // ----
                            $compruebaCantRiesgo = [
                                (count($riesgo1) + ($otros1[1] != "" ? 1 : 0)),
                                (count($riesgo2) + ($otros2[1] != "" ? 1 : 0)),
                                (count($riesgo3) + ($otros3[1] != "" ? 1 : 0)),
                                (count($riesgo4) + ($otros4[1] != "" ? 1 : 0)),
                                (count($riesgo5) + ($otros5[1] != "" ? 1 : 0)),
                                (count($riesgo6) + ($otros6[1] != "" ? 1 : 0))
                            ];
                            $limite = 0;
                            for ($i = 0; $i < 4; $i++) {
                                if ($compruebaCantRiesgo[$i] > $limite) {
                                    $limite = $compruebaCantRiesgo[$i];
                                }
                            }
                            $limite2 = 0;
                            for ($i = 4; $i < 7; $i++) {
                                if ($compruebaCantRiesgo[$i] > $limite2) {
                                    $limite2 = $compruebaCantRiesgo[$i];
                                }
                            }
                            // var_dump($datosRiesgos);
                        ?>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 50px;">
                                <div class="col-xs-5 borderPM flexBox" style="justify-content: flex-start; height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">PUESTO DE TRABAJO / ÁREA</span>
                                </div>
                                <div class="col-xs-5 borderPM flexBox" style="justify-content: flex-start; height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">ACTIVIDADES</span>
                                </div>
                                <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">TIEMPO DE TRABAJO (MESES)</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 50px;">
                                <div class="col-xs-5 borderPM flexBox" style="border: none">
                                    <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <?= ($a + 1) ?>
                                    </div>
                                    <div class="col-xs-11 borderPM flexBox" style="justify-content: flex-start; min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <?php $datosRiesgos[0] = explode(": ", $datosRiesgos[0]);
                                        echo $datosRiesgos[0][(count($datosRiesgos[0]) - 1)] ?>
                                    </div>
                                </div>
                                <div class="col-xs-5 borderPM flexBox" style="justify-content: flex-start; min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?php $datosRiesgos[1] = explode(": ", $datosRiesgos[1]);
                                    echo $datosRiesgos[1][(count($datosRiesgos[1]) - 1)] ?>
                                </div>
                                <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <?php $datosRiesgos[2] = explode(": ", $datosRiesgos[2]);
                                    echo $datosRiesgos[2][(count($datosRiesgos[2]) - 1)] ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 50px;">
                                <div class="col-xs-3 borderPM flexBox" style="border: none; flex-flow:column">
                                    <div class="col-xs-12 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <span class="text-bold">FÍSICO</span>
                                    </div>
                                    <?php $b = 0;
                                    while ($b < count($riesgo1)) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $riesgo1[$b] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php $b++;
                                    }
                                    if ($otros1[1] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $otros1[1] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                    if ($limite > count($riesgo1)) : ?>
                                        <?php $b = 0;
                                        while ($b < ($limite - (count($riesgo1) + ($otros1[1] != "" ? 1 : 0)))) { ?>
                                            <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                                <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                                <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            </div>
                                    <?php $b++;
                                        }
                                    endif; ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox" style="border: none; flex-flow:column">
                                    <div class="col-xs-12 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <span class="text-bold">MECÁNICO</span>
                                    </div>
                                    <?php $b = 0;
                                    while ($b < count($riesgo2)) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $riesgo2[$b] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php $b++;
                                    }
                                    if ($otros2[1] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $otros2[1] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                    if ($limite > count($riesgo2)) : ?>
                                        <?php $b = 0;
                                        while ($b < ($limite -  (count($riesgo2) + ($otros2[1] != "" ? 1 : 0)))) { ?>
                                            <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                                <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                                <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            </div>
                                    <?php $b++;
                                        }
                                    endif; ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox" style="border: none; flex-flow:column">
                                    <div class="col-xs-12 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <span class="text-bold">QUÍMICO</span>
                                    </div>
                                    <?php $b = 0;
                                    while ($b < count($riesgo3)) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $riesgo3[$b] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php $b++;
                                    }
                                    if ($otros3[1] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $otros3[1] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                    if ($limite > count($riesgo3)) : ?>
                                        <?php $b = 0;
                                        while ($b < ($limite - (count($riesgo3) + ($otros3[1] != "" ? 1 : 0)))) { ?>
                                            <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                                <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                                <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            </div>
                                    <?php $b++;
                                        }
                                    endif; ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox" style="border: none; flex-flow:column">
                                    <div class="col-xs-12 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <span class="text-bold">BIOLÓGICO</span>
                                    </div>
                                    <?php $b = 0;
                                    while ($b < count($riesgo4)) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $riesgo4[$b] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php $b++;
                                    }
                                    if ($otros4[1] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $otros4[1] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                    if ($limite > count($riesgo4)) : ?>
                                        <?php $b = 0;
                                        while ($b < ($limite - (count($riesgo4) + ($otros4[1] != "" ? 1 : 0)))) { ?>
                                            <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                                <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                                <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            </div>
                                    <?php $b++;
                                        }
                                    endif; ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 50px;">
                                <div class="col-xs-6 borderPM flexBox" style="border: none; flex-flow:column">
                                    <div class="col-xs-12 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <span class="text-bold">ERGONÓMICO</span>
                                    </div>
                                    <?php $b = 0;
                                    while ($b < count($riesgo5)) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $riesgo5[$b] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php $b++;
                                    }
                                    if ($otros5[1] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $otros5[1] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                    if ($limite2 > count($riesgo5)) : ?>
                                        <?php $b = 0;
                                        while ($b < ($limite2 - (count($riesgo5) + ($otros5[1] != "" ? 1 : 0)))) { ?>
                                            <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                                <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                                <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            </div>
                                    <?php $b++;
                                        }
                                    endif; ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox" style="border: none; flex-flow:column">
                                    <div class="col-xs-12 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <span class="text-bold">PSICOSOCIAL</span>
                                    </div>
                                    <?php $b = 0;
                                    while ($b < count($riesgo6)) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $riesgo6[$b] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php $b++;
                                    }
                                    if ($otros6[1] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= $otros6[1] ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                                X
                                            </div>
                                        </div>
                                    <?php
                                    endif;
                                    if ($limite2 > count($riesgo6)) : ?>
                                        <?php $b = 0;
                                        while ($b < ($limite2 - (count($riesgo6) + ($otros6[1] != "" ? 1 : 0)))) { ?>
                                            <div class="col-xs-12 borderPM flexBox" style="min-height: 50px;">
                                                <div class="col-xs-10 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                                <div class="col-xs-2 borderPM flexBox" style="min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            </div>
                                    <?php $b++;
                                        }
                                    endif; ?>
                                </div>
                            </div>
                            <div class="row borderPM" style="border:none;">
                                <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                                    <span class="text-bold">Medidas preventivas</span>
                                </div>
                                <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 50px;">
                                    <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 50px; word-break: break-all; overflow: hidden; padding: 5px">
                                        <?php $datosRiesgos[9] = explode(": ", $datosRiesgos[9]);
                                        echo $datosRiesgos[9][(count($datosRiesgos[9]) - 1)] ?>
                                    </div>
                                </div>
                            </div>
                        <?php $a++;
                        } ?>
                    </div>
                </div>
                <!-- <div class="col-md-12 borderPM" style="border:none;">

                </div> -->
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>G. ACTIVIDADES EXTRA LABORALES</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">CARDIOVASCULAR </span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xcardiovas222'] ?>
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
                            <h4>H. ENFERMEDAD ACTUAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Descripción</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdescripci643'] ?>
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
                            <h4>I. REVISIÓN ACTUAL DE ÓRGANOS Y SISTEMAS</h4>
                            <?php $resultado['xrevisioac833'] = explode("|", $resultado['xrevisioac833']); ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">1. PIEL - ANEXOS</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("1. PIEL - ANEXOS", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">2. ÓRGANOS DE LOS SENTIDOS</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("2. ÓRGANOS DE LOS SENTIDOS", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">3. RESPIRATORIO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("3. RESPIRATORIO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">4. CARDIO-VASCULAR</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("4. CARDIO-VASCULAR", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">5. DIGESTIVO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("5. DIGESTIVO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">6. GENITO - URINARIO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("6. GENITO - URINARIO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">7. MÚSCULO ESQUELÉTICO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("7. MÚSCULO ESQUELETICO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">8. ENDOCRINO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("8. ENDOCRINO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">9. HEMO LINFÁTICO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("9. HEMO LINFATICO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">10. NERVIOSO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("10. NERVIOSO", $resultado['xrevisioac833']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdescripci509'] ?>
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
                            <h4>J. CONSTANTES VITALES Y ANTROPOMETRÍA</h4>
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
                                <?= $resultado['xpresioacu615'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xtemperatu626'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci511'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xsaturacio833'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci971'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xpesokg570'] ?>
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
                                <?= $resultado['xtallacm155'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xiacutendi929'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xperiacute701'] ?>
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
                            <h4>K. EXAMEN FÍSICO REGIONAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">REGIONES</span>
                            <?php
                            $resultado['x1piel385'] = explode("|", $resultado['x1piel385']);
                            $resultado['x2ojos421'] = explode("|", $resultado['x2ojos421']);
                            $resultado['x3oiacuted710'] = explode("|", $resultado['x3oiacuted710']);
                            $resultado['x4orofarin488'] = explode("|", $resultado['x4orofarin488']);
                            $resultado['x5nariz476'] = explode("|", $resultado['x5nariz476']);
                            $resultado['x6cuello585'] = explode("|", $resultado['x6cuello585']);
                            $resultado['x7toacuter669'] = explode("|", $resultado['x7toacuter669']);
                            $resultado['x8toacuter402'] = explode("|", $resultado['x8toacuter402']);
                            $resultado['x9abdomen289'] = explode("|", $resultado['x9abdomen289']);
                            $resultado['x10columna234'] = explode("|", $resultado['x10columna234']);
                            $resultado['x11pelvis103'] = explode("|", $resultado['x11pelvis103']);
                            $resultado['x12extremi340'] = explode("|", $resultado['x12extremi340']);
                            $resultado['x13neurolo763'] = explode("|", $resultado['x13neurolo763']);
                            $arrayEFR = [
                                count(array_filter($resultado['x1piel385'])),
                                count(array_filter($resultado['x2ojos421'])),
                                count(array_filter($resultado['x3oiacuted710'])),
                                count(array_filter($resultado['x4orofarin488'])),
                                count(array_filter($resultado['x5nariz476'])),
                                count(array_filter($resultado['x6cuello585'])),
                                count(array_filter($resultado['x7toacuter669'])),
                                count(array_filter($resultado['x8toacuter402'])),
                                count(array_filter($resultado['x9abdomen289'])),
                                count(array_filter($resultado['x10columna234'])),
                                count(array_filter($resultado['x11pelvis103'])),
                                count(array_filter($resultado['x12extremi340']))
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
                                while ($i < count($resultado['x1piel385'])) {
                                    if ($resultado['x1piel385'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel385'][$i] != "" ? $resultado['x1piel385'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel385'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x1piel385']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x1piel385'])))) { ?>
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
                                while ($i < count($resultado['x2ojos421'])) {
                                    if ($resultado['x2ojos421'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos421'][$i] != "" ? $resultado['x2ojos421'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos421'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x2ojos421']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x2ojos421'])))) { ?>
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
                                while ($i < count($resultado['x3oiacuted710'])) {
                                    if ($resultado['x3oiacuted710'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted710'][$i] != "" ? $resultado['x3oiacuted710'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted710'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x3oiacuted710']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x3oiacuted710'])))) { ?>
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
                                while ($i < count($resultado['x4orofarin488'])) {
                                    if ($resultado['x4orofarin488'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin488'][$i] != "" ? $resultado['x4orofarin488'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin488'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x4orofarin488']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x4orofarin488'])))) { ?>
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
                                while ($i < count($resultado['x5nariz476'])) {
                                    if ($resultado['x5nariz476'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz476'][$i] != "" ? $resultado['x5nariz476'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz476'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x5nariz476']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x5nariz476'])))) { ?>
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
                                while ($i < count($resultado['x6cuello585'])) {
                                    if ($resultado['x6cuello585'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello585'][$i] != "" ? $resultado['x6cuello585'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello585'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x6cuello585']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x6cuello585'])))) { ?>
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
                                while ($i < count($resultado['x7toacuter669'])) {
                                    if ($resultado['x7toacuter669'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter669'][$i] != "" ? $resultado['x7toacuter669'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter669'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x7toacuter669']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x7toacuter669'])))) { ?>
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
                                while ($i < count($resultado['x8toacuter402'])) {
                                    if ($resultado['x8toacuter402'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter402'][$i] != "" ? $resultado['x8toacuter402'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter402'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x8toacuter402']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x8toacuter402'])))) { ?>
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
                                while ($i < count($resultado['x9abdomen289'])) {
                                    if ($resultado['x9abdomen289'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen289'][$i] != "" ? $resultado['x9abdomen289'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen289'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x9abdomen289']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x9abdomen289'])))) { ?>
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
                                while ($i < count($resultado['x10columna234'])) {
                                    if ($resultado['x10columna234'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna234'][$i] != "" ? $resultado['x10columna234'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna234'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x10columna234']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x10columna234'])))) { ?>
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
                                while ($i < count($resultado['x11pelvis103'])) {
                                    if ($resultado['x11pelvis103'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis103'][$i] != "" ? $resultado['x11pelvis103'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis103'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x11pelvis103']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x11pelvis103'])))) { ?>
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
                                while ($i < count($resultado['x12extremi340'])) {
                                    if ($resultado['x12extremi340'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi340'][$i] != "" ? $resultado['x12extremi340'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi340'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x12extremi340']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x12extremi340'])))) { ?>
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
                                while ($i < count($resultado['x13neurolo763'])) {
                                    if ($resultado['x13neurolo763'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x13neurolo763'][$i] != "" ? $resultado['x13neurolo763'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x13neurolo763'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x13neurolo763']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x13neurolo763'])))) { ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px"></div>
                                        </div>
                                <?php $i++;
                                    }
                                endif; ?>
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
                                <?= $resultado['xobservaci195'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; word-break: break-all; overflow: hidden; padding: 5px; min-height: 40px;">
                            <h4>L. RESULTADOS DE EXÁMENES GENERALES Y ESPECÍFICOS DE ACUERDO AL RIESGO Y PUESTO DE TRABAJO (IMAGEN, LABORATORIO Y OTROS)</h4>
                            <?php
                            list($laboratorio, $imagenologia, $otros) = explode(" |||| ", $resultado['examenes']);
                            $laboratorio = explode(" ||| ", $laboratorio);
                            $imagenologia = explode(" ||| ", $imagenologia);
                            $otros = explode(" ||| ", $otros);
                            ?>
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
                                <?= $resultado['xobservaci278'] ?>
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
                                <h4>M. DIAGNÓSTICO</h4>
                                <?php $resultado['cie10s'] = json_decode($resultado['cie10s']); ?>
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
                            <h4>N. APTITUD MÉDICA PARA EL TRABAJO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme383'] == "APTO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO EN OBSERVACIÓN</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme383'] == "APTO EN OBSERVACIÓN" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO CON LIMITACIONES</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme383'] == "APTO CON LIMITACIONES" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NO APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme383'] == "NO APTO" ? "X" : '') ?>
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
                                <?= $resultado['xobservaci615'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span>Limitación</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xlimitacio507'] ?>
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
                            <h4>O. RECOMENDACIONES Y/O TRATAMIENTO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xrecomenda108'] ?>
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
                            <h4>N. DATOS DEL PROFESIONAL</h4>
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