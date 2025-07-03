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
                                <h4>FICHA MÉDICA OCUPACIONAL RETIRO</h4>
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
                                <span class="text-bold">FECHA DE INICIO DE LABORES</span>
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
                                <?= $resultado['fechaInicioLabores'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">FECHA DE SALIDA</span>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">TIEMPO</span>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">PUESTO DE TRABAJO (CIUO)</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['fechaSalida'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['tiempoMeses'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                <?= $resultado['puestoTrabajo'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">ACTIVIDADES</span>
                            </div>
                            <div class="col-xs-8 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding:5px">
                                <span class="text-bold">FACTORES DE RIESGO</span>
                            </div>
                        </div>
                        <?php $resultado['activRiesgo'] = json_decode($resultado['activRiesgo']);
                        $a = 0;
                        while ($a < count($resultado['activRiesgo'])) { ?>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                                <div class="col-xs-4 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                    <?= $resultado['activRiesgo'][$a][0] ?>
                                </div>
                                <div class="col-xs-8 borderPM flexBox" style="height: 40px;  word-break: break-all; overflow: hidden; padding:5px">
                                    <?= $resultado['activRiesgo'][$a][1] ?>
                                </div>
                            </div>
                        <?php $a++;
                        } ?>
                    </div>
                </div>

                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>

                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>B. ANTECEDENTES PERSONALES</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ANTECEDENTES CLÍNICOS Y QUIRÚRGICOS</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xanteceden297'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">ACCIDENTES DE TRABAJO (DESCRIPCIÓN)</span>
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
                            <?= ($resultado['xfuecalifi713'] == "Si" ? "X" : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 80px;">
                            <span class="text-bold">ESPECIFICAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 120px; justify-content: flex-start; word-break: break-all; overflow: hidden; padding: 5px">
                            <?= $resultado['xencasodes609'] ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">NO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi713'] == "No" ? "X" : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle">
                            <span class="text-bold">FECHA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 127px;">
                            <?= $resultado['xfecha879'] ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci279'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Detallar aquí en caso se presuma de algún accidente de trabajo que no haya sido reportado o calificado:</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdetallara550'] ?>
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
                            <?= ($resultado['xfuecalifi100'] == "Si" ? "X" : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 80px;">
                            <span class="text-bold">ESPECIFICAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 120px; justify-content: flex-start; word-break: break-all; overflow: hidden; padding: 5px">
                            <?= $resultado['xencasodes371'] ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">NO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi100'] == "No" ? "X" : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle">
                            <span class="text-bold">FECHA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 127px;">
                            <?= $resultado['xfecha870'] ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci569'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Detallar aquí en caso de que se presuma de alguna enfermedad relacionada con el trabajo que no haya sido reportada o calificada:</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdetallara288'] ?>
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
                            <h4>C. CONSTANTES VITALES Y ANTROPOMETRÍA</h4>
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
                                <?= $resultado['xpresioacu777'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xtemperatu103'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci681'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xsaturacio994'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci290'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xpesokg949'] ?>
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
                                <?= $resultado['xtallacm490'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xiacutendi783'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xperiacute716'] ?>
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
                            <h4>D. EXAMEN FÍSICO REGIONAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">REGIONES</span>
                            <?php
                            $resultado['x1piel405'] = explode("|", $resultado['x1piel405']);
                            $resultado['x2ojos342'] = explode("|", $resultado['x2ojos342']);
                            $resultado['x3oiacuted800'] = explode("|", $resultado['x3oiacuted800']);
                            $resultado['x4orofarin846'] = explode("|", $resultado['x4orofarin846']);
                            $resultado['x5nariz231'] = explode("|", $resultado['x5nariz231']);
                            $resultado['x6cuello355'] = explode("|", $resultado['x6cuello355']);
                            $resultado['x7toacuter262'] = explode("|", $resultado['x7toacuter262']);
                            $resultado['x8toacuter429'] = explode("|", $resultado['x8toacuter429']);
                            $resultado['x9abdomen659'] = explode("|", $resultado['x9abdomen659']);
                            $resultado['x10columna505'] = explode("|", $resultado['x10columna505']);
                            $resultado['x11pelvis475'] = explode("|", $resultado['x11pelvis475']);
                            $resultado['x12extremi611'] = explode("|", $resultado['x12extremi611']);
                            $resultado['x13neurolo720'] = explode("|", $resultado['x13neurolo720']);
                            $arrayEFR = [
                                count(array_filter($resultado['x1piel405'])),
                                count(array_filter($resultado['x2ojos342'])),
                                count(array_filter($resultado['x3oiacuted800'])),
                                count(array_filter($resultado['x4orofarin846'])),
                                count(array_filter($resultado['x5nariz231'])),
                                count(array_filter($resultado['x6cuello355'])),
                                count(array_filter($resultado['x7toacuter262'])),
                                count(array_filter($resultado['x8toacuter429'])),
                                count(array_filter($resultado['x9abdomen659'])),
                                count(array_filter($resultado['x10columna505'])),
                                count(array_filter($resultado['x11pelvis475'])),
                                count(array_filter($resultado['x12extremi611']))
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
                                while ($i < count($resultado['x1piel405'])) {
                                    if ($resultado['x1piel405'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel405'][$i] != "" ? $resultado['x1piel405'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel405'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x1piel405']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x1piel405'])))) { ?>
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
                                while ($i < count($resultado['x2ojos342'])) {
                                    if ($resultado['x2ojos342'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos342'][$i] != "" ? $resultado['x2ojos342'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos342'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x2ojos342']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x2ojos342'])))) { ?>
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
                                while ($i < count($resultado['x3oiacuted800'])) {
                                    if ($resultado['x3oiacuted800'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted800'][$i] != "" ? $resultado['x3oiacuted800'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted800'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x3oiacuted800']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x3oiacuted800'])))) { ?>
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
                                while ($i < count($resultado['x4orofarin846'])) {
                                    if ($resultado['x4orofarin846'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin846'][$i] != "" ? $resultado['x4orofarin846'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin846'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x4orofarin846']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x4orofarin846'])))) { ?>
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
                                while ($i < count($resultado['x5nariz231'])) {
                                    if ($resultado['x5nariz231'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz231'][$i] != "" ? $resultado['x5nariz231'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz231'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x5nariz231']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x5nariz231'])))) { ?>
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
                                while ($i < count($resultado['x6cuello355'])) {
                                    if ($resultado['x6cuello355'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello355'][$i] != "" ? $resultado['x6cuello355'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello355'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x6cuello355']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x6cuello355'])))) { ?>
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
                                while ($i < count($resultado['x7toacuter262'])) {
                                    if ($resultado['x7toacuter262'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter262'][$i] != "" ? $resultado['x7toacuter262'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter262'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x7toacuter262']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x7toacuter262'])))) { ?>
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
                                while ($i < count($resultado['x8toacuter429'])) {
                                    if ($resultado['x8toacuter429'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter429'][$i] != "" ? $resultado['x8toacuter429'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter429'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x8toacuter429']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x8toacuter429'])))) { ?>
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
                                while ($i < count($resultado['x9abdomen659'])) {
                                    if ($resultado['x9abdomen659'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen659'][$i] != "" ? $resultado['x9abdomen659'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen659'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x9abdomen659']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x9abdomen659'])))) { ?>
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
                                while ($i < count($resultado['x10columna505'])) {
                                    if ($resultado['x10columna505'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna505'][$i] != "" ? $resultado['x10columna505'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna505'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x10columna505']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x10columna505'])))) { ?>
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
                                while ($i < count($resultado['x11pelvis475'])) {
                                    if ($resultado['x11pelvis475'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis475'][$i] != "" ? $resultado['x11pelvis475'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis475'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x11pelvis475']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x11pelvis475'])))) { ?>
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
                                while ($i < count($resultado['x12extremi611'])) {
                                    if ($resultado['x12extremi611'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi611'][$i] != "" ? $resultado['x12extremi611'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi611'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor2 > count(array_filter($resultado['x12extremi611']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor2 - count(array_filter($resultado['x12extremi611'])))) { ?>
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
                                while ($i < count($resultado['x13neurolo720'])) {
                                    if ($resultado['x13neurolo720'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x13neurolo720'][$i] != "" ? $resultado['x13neurolo720'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x13neurolo720'][$i] != "" ? 'X' : '') ?>
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
                                <?= $resultado['xobservaci567'] ?>
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
                            <h4>E. RESULTADOS DE EXÁMENES GENERALES Y ESPECÍFICOS DE ACUERDO AL RIESGO Y PUESTO DE TRABAJO (IMAGEN, LABORATORIO Y OTROS)</h4>
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
                                <?= $resultado['xobservaci983'] ?>
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
                                <h4>F. DIAGNÓSTICO</h4>
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
                        <div class="col-xs-12 borderPM heightTitle" style="border:none; height: 40px">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <h4>G. EVALUACIÓN MÉDICA DE RETIRO</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM heightTitle" style="border:none; height: 40px">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">SE REALIZÓ LA EVALUACIÓN</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['xserealizo853'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">NO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['xserealizo853'] == "No" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM heightTitle" style="border:none; height: 40px">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">DESCRIPCION</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM heightTitle" style="border:none; height: 40px">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci195'] ?>
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
                            <h4>H. RECOMENDACIONES Y/O TRATAMIENTO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xrecomenda793'] ?>
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
                            <span class="text-bold">CERTIFICO QUE LO ANTERIORMENTE EXPRESADO EN RELACIÓN A MI ESTADO DE SALUD ES VERDAD. SE ME HA INFORMADO MI ESTADO ACTUAL DE SALUD Y LAS RECOMENDACIONES PERTINENTES.</span>
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