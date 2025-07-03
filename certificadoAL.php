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
$queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = {$resultado['usuario_id']}");
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

        .fontSubTitle {
            font-size: 12px;
        }

        .separadorHeight {
            height: 10px;
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
                                <h4>CERTIFICADO DE APTITUD LABORAL</h4>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox" style="height: 84px">
                            <?= $Logo ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>A. DATOS DEL ESTABLECIMIENTO - EMPRESA Y USUARIO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">INSTITUCIÓN DEL SISTEMA O NOMBRE DE LA EMPRESA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">RUC</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">CIIU</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">ESTABLECIMIENTO DE SALUD</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NÚMERO DE HISTORIA CLÍNICA</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NÚMERO DE ARCHIVO</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px">
                                <?= $resultado['intSNE'] ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= $resultado['RUC'] ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= $resultado['CIU'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <?= $resultado['ES'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <?= $idHistoria ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <?= $resultado['NA'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">PRIMER APELLIDO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">SEGUNDO APELLIDO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">PRIMER NOMBRE</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">SEGUNDO NOMBRE</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">SEXO</span>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">CARGO / OCUPACIÓN</span>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-4 borderPM flexBox" style="height: 40px">
                                <?= $primer_apellido ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <?= $segundo_apellido ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <?= $primer_nombre ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <?= $segundo_nombre ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= $genero ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <?= $ocupacion ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM separadorHeight" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>B. DATOS GENERALES</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">FECHA DE EMISIÓN</span>
                                <?php list($y, $m, $d) = explode('-', $resultado['xfechadeem749']); ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= $y ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= $m ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= $d ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="height: 40px"></div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">EVALUACIÓN</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">INGRESO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xevaluacio688'] == "INGRESO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">PERIÓDICO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xevaluacio688'] == "PERIÓDICO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">REINTEGRO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xevaluacio688'] == "REINTEGRO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">SALIDA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xevaluacio688'] == "SALIDA" ? "X" : '') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM separadorHeight" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>C. APTITUD MÉDICA LABORAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Después de la valoración médica ocupacional se certifica que la persona en mención, es calificada como:</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xdespueacu967'] == "APTO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO EN OBSERVACION</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xdespueacu967'] == "APTO EN OBSERVACION" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO CON LIMITACIONES</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xdespueacu967'] == "APTO CON LIMITACIONES" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NO APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xdespueacu967'] == "NO APTO" ? "X" : '') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>DETALLE DE OBSERVACIONES</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdetallede754'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM separadorHeight" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>D. EVALUACIÓN MÉDICA DE RETIRO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-6 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">El usuario se realizó la evaluación médica de retiro</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xelusuario280'] == "SI" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xelusuario280'] == "NO" ? "X" : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">Condición del diagnóstico</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">Presuntiva</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xcondicioa619'] == "Presuntiva" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">Definitiva</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xcondicioa619'] == "Definitiva" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">No aplica</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xcondicioa619'] == "No aplica" ? "X" : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-5 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">La condición de salud esta relacionada con el trabajo </span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">SI</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xlacondici971'] == "SI" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xlacondici971'] == "NO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">No aplica</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xlacondici971'] == "No aplica" ? "X" : '') ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM separadorHeight" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>E. RECOMENDACIONES</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xrecomenda272'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM fontSubTitle" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; padding:5px; min-height: 60px">
                            <span class="text-bold">Con este documento certifico que el trabajador se ha sometido a la evaluación médica requerida para (el ingreso /la ejecución/ el reintegro y retiro) al puesto laboral y se ha informado sobre los riesgos relacionados con el trabajo emitiendo recomendaciones relacionadas con su estado de salud.</span>
                        </div>
                        <div class="col-xs-12 flexBox" style="justify-content: flex-start; padding:5px; margin:0; min-height: 40px">
                            <span class="text-bold">La presente certificación se expide con base en la historia ocupacional del usuario (a), la cual tiene carácter de confidencial.</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>F. DATOS DEL PROFESIONAL DE SALUD</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 30px;">
                            <div class="col-xs-3 borderPM flexBox" style="min-height: 30px;padding:5px">
                                <span class="text-bold">NOMBRE Y APELLIDO</span>
                            </div>
                            <div class="col-xs-5 borderPM flexBox" style="min-height: 30px; justify-content: flex-start; padding:5px">
                                <?= funcionMaster($resultado['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="min-height: 30px; padding: 5px">
                                <span class="text-bold">CÓDIGO</span>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="min-height: 30px; justify-content: flex-start; padding:5px">
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
                                <span class="text-bold">G. FIRMA DEL USUARIO</span>
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