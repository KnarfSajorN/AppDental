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
    $nivel_educacion = $rowMotorizado['nivel_educacion'];
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

                <div class="col-md-12 borderPM" style="border:none;height: 120px">
                    <div class="row borderPM">
                        <div class="col-xs-6 borderPM" style="border:none;" style="height: 120px">
                            <div class="col-xs-6 borderPM flexBox" style="height: calc(120px/2);">
                                <h4>MA-MT-FR01</h4>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="flex-flow: column; height: calc(120px/2);">
                                <span>Rev.: <?= $queryCuenta->cuentaHistoria ?></span>
                                <span>Fecha de elaboración</span>
                                <span><?= Date("d-m-Y", strtotime($resultado['Fecha'])) ?></span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox" style="word-break: break-all; overflow: hidden; height: calc(120px/2);">
                                <h5>EVALUACIÓN MÉDICA PARA TRABAJO EN ALTURAS</h5>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox" style="height: 120px">
                            <?= $Logo ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="padding: 5px;">
                            <h4>EVALUACIÓN MÉDICA PARA TRABAJO EN ALTURAS</h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <span class="text-bold">NOMBRE</span>
                        </div>
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <span class="text-bold">PUESTO</span>
                        </div>
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <span class="text-bold">EMPRESA</span>
                        </div>
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <span class="text-bold">ÁREA</span>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <?= $nombre_cliente ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <?= $resultado['puestoAltura'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <?= $resultado['empresaAltura'] ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox heightTitle" style="padding: 5px;">
                            <?= $resultado['areaAltura'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">TIPO DE EXAMEN</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">INGRESO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= ($resultado['xtipodeexa961'] == "INGRESO" ? $resultado['xtipodeexa961'] : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">PERIÓDICO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= ($resultado['xtipodeexa961'] == "PERIODICO" ? $resultado['xtipodeexa961'] : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">EDAD</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= CalculoEdadPaciente($fechaNacimiento, 'y') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">SEXO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= $genero ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">ESCOLARIDAD</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle heightTitle" style="padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= $nivel_educacion ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 120px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">TRABAJOS ANTERIORES</span>
                        </div>
                        <div class="col-xs-10 borderPM flexBox fontSubTitle" style="border:none; height: 120px; flex-flow: column">
                            <div class="col-xs-12 borderPM" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">CENTRO DE TRABAJO</span>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">TIEMPO</span>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">PUESTO</span>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">DESCRIPCIÓN DE LA TAREA</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= $resultado['xcentrodet570'] ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= $resultado['xtiempo870'] ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= $resultado['xtiempo870'] ?>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= $resultado['xpuesto725'] ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">ACCIDENTES LABORALES Y SECUELAS</span>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">ENFERMEDADES PROFESIONALES Y SECUELAS</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= $resultado['xaccidente192'] ?>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= $resultado['xenfermeda692'] ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">ANTECEDENTES FAMILIARES</span>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">ANTECEDENTES GINECO OBSTÉTRICOS</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 200px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">SI</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">NO</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">DIABETES</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xenfermeda692'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xenfermeda692'] == "Si" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">HIPERTENSIÓN</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xhipertens604'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xhipertens604'] == "Si" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">CARDIACAS</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xcardiacas741'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xcardiacas741'] == "Si" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">ASMA</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xasma997'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xasma997'] == "Si" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">CONVULSIONES</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xconvulsio305'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xconvulsio305'] == "Si" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/7);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">OTROS</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xotros962'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xotros962'] == "Si" ? 'X' : '') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 200px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/5);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">Menarquía</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">F.U.M</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xfum566'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">RITMO</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xritmo741'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/5);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">G</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xg578'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">P</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xp949'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">A</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xa391'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">C</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xc822'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/5);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">M.P.F</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xmpf623'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">F.P.P</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xfpp540'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; flex-flow: column;border:none;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">D.O.C</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xdoc243'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 100%; flex-flow: column;border:none;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">I.V.S.A</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xivsa644'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/5);">
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">FECHA</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xfecha185'] ?>
                                    </div>
                                </div>
                                <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">RESULTADO</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xresultado137'] ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(200px/5);">
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">TRATAMIENTO</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">NO</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= ($resultado['xtratamien112'] == "Si" ? 'X' : '') ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">SI</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= ($resultado['xtratamien112'] == "No" ? 'X' : '') ?>
                                    </div>
                                </div>
                                <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 100%; flex-flow: column;">
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <span class="text-bold">¿CUÁL?</span>
                                    </div>
                                    <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                        <?= $resultado['xencasodes825'] ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">ANTECEDENTES PERSONALES NO PATOLÓGICOS</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= $resultado['xanteceden840'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="border:none; height: 120px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">SI</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">NO</span>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">FUMA</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xfuma344'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xfuma344'] == "No" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">CONSUME ALCOHOL</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xconsumeal309'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xconsumeal309'] == "No" ? 'X' : '') ?>
                                </div>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: calc(120px/4);">
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <span class="text-bold">TOXICOMANÍAS</span>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xtoxicoman699'] == "Si" ? 'X' : '') ?>
                                </div>
                                <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 100%; padding: 5px; word-break: break-all; overflow: hidden;">
                                    <?= ($resultado['xtoxicoman699'] == "No" ? 'X' : '') ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 120px; flex-flow: column;">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">ANTECEDENTES PERSONALES PATOLÓGICOS</span>
                        </div>
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">A. CONVULSIONES (ATAQUES)</span>
                            <?php $resultado['xanteceden377'] = explode("|", $resultado['xanteceden377']); ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("A. CONVULSIONES (ATAQUES)", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">G. DIFICULTAD AL RESPIRAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("G. DIFICULTAD AL RESPIRAR", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">B. REACCIONES NALÉRGICAS QUE NO LE DEJAN RESPIRAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("B. REACCIONES NALÉRGICAS QUE NO LE DEJAN RESPIRAR", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">H. PROBLEMAS DEL CORAZÓN</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("H. PROBLEMAS DEL CORAZÓN", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">C. CLAUSTROFOBIA (MIEDO DE ESTAR EN ESPACIOS CERRADOS)</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("C. CLAUSTROFOBIA (MIEDO DE ESTAR EN ESPACIOS CERRADOS)", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">I. PRESIÓN ALTA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("I. PRESIÓN ALTA", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">D. DIFICULTAD AL OLER (EXCEPTO CUANDO HAN TENIDO UN RESFRIADO)</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("D. DIFICULTAD AL OLER (EXCEPTO CUANDO HAN TENIDO UN RESFRIADO)", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">J. TOMA DE MEDICAMENTOS</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("J. TOMA DE MEDICAMENTOS", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">E. DIFICULTAD PARA DISTINGUIR LOS COLORES</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("E. DIFICULTAD PARA DISTINGUIR LOS COLORES", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">K. TOMA MEDICAMENTOS</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("K. TOMA MEDICAMENTOS", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-7 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">L. PROBLEMAS PULMONARES</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= (array_search("L. PROBLEMAS PULMONARES", $resultado['xanteceden377']) ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">EXPLORACIÓN FÍSICA</span>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 80px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">SIGNOS VITALES</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xsignosvit929'] ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="border:none; height: 80px; flex-flow: column;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">FC</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xfc702'] ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">FR</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xfr902'] ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">TA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xta507'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">ANTROPOMETRÍA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xantropome271'] ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">PESO</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xpeso184'] ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">TALLA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xtalla330'] ?>
                            </div>
                        </div>
                        <div class="col-xs-3 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">IMC</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['ximc660'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">PERÍMETRO DE LA MUÑECA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xperimerod937'] ?>
                            </div>
                        </div>
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">PERÍMETRO DE LA CINTURA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xperimetro692'] ?>
                            </div>
                        </div>
                        <div class="col-xs-4 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">PERÍMETRO DE LA CADERA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xperimetro935'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">CABEZA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xcabeza835'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">CUELLO</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xcuello966'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">TORAX</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xtorax831'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">CARDIO PULMONAR</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xcardiopul214'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">DIGESTIVO</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xdigestivo836'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">SISTEMAS MUSCULOSO ESQUELÉTICO</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xsistemasm340'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">PIEL Y ANEXOS</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xpielyanex995'] ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">GENITOURINARIO</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xgenitouri289'] ?>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">TEST DE ROMBERG</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xtestderom796'] ?>
                            </div>
                        </div>
                        <div class="col-xs-6 borderPM flexBox fontSubTitle" style="height: 80px; flex-flow: column; border:none;">
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">PRUEBA DE LA MARCHA</span>
                            </div>
                            <div class="col-xs-12 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= $resultado['xpruebadel700'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">IDX</span>
                        </div>
                        <div class="col-xs-10 borderPM flexBox fontSubTitle" style="justify-content: flex-start; height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= $resultado['xidx192'] ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">APTO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= ($resultado['xesta299'] == "APTO" ? "X" : '') ?>
                        </div>
                        <div class="col-xs-5 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">APTO CON LIMITACIONES</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= ($resultado['xesta299'] == "APTO CON LIMITACIONES" ? "X" : '') ?>
                        </div>
                        <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <span class="text-bold">NO APTO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <?= ($resultado['xesta299'] == "NO APTO" ? "X" : '') ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="height: 120px; padding: 5px; word-break: break-all; overflow: hidden;">
                            <!-- <img src='<?= $Firma ?>' class="img-fluid" style="width: 100%; height: 100%;"> -->
                            <?= $firmaImg ?>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM fontSubTitle" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;">
                            <div class="col-xs-2 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <span class="text-bold">FECHA</span>
                            </div>
                            <div class="col-xs-10 borderPM flexBox fontSubTitle" style="height: 40px; padding: 5px; word-break: break-all; overflow: hidden;">
                                <?= Date("d-m-Y") ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- viejo -->

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