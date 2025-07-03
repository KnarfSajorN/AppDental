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
        $firmaImg = '<img src="https://medicalsoftplus.com/Baseocupacional_Ecuador/FirmasReg/' . $firma . '" height="100" width="150">';
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
                                <h4>FICHA MEDICA OCUPACIONAL PERIODICA</h4>
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
                                <?= $resultado['xmotivodec630'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
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
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">INCIDENTES</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Describir los principales incidentes suscitados</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xncidentes727'] ?>
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
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px; justify-content: flex-start;">
                            <?= ($resultado['xfuecalifi6831'] == "Si" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 80px;">
                            <span class="text-bold">ESPECIFICAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 120px;">
                            <?= $resultado['xencasodes500'] ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">NO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['xfuecalifi6831'] == "No" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle">
                            <span class="text-bold">FECHA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 127px;">
                            <?= $resultado['fechaAT'] ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xobservaci905'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="saltopagina"></div> -->
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
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px; justify-content: flex-start;">
                            <?= ($resultado['fueCalificado'] == "Si" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 80px;">
                            <span class="text-bold">ESPECIFICAR</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 120px;">
                            <?= $resultado['encasoSi'] ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <span class="text-bold">NO</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 25px;">
                            <?= ($resultado['fueCalificado'] == "No" ? 'X' : '') ?>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle">
                            <span class="text-bold">FECHA</span>
                        </div>
                        <div class="col-xs-1 borderPM flexBox heightTitle" style="width: 127px;">
                            <?= $resultado['fechaEP'] ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['descripcionEP'] ?>
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
                            <h4>D. ANTECEDENTES FAMILIARES (DETALLAR EL PARENTESCO)</h4>
                            <?php $resultado['x738'] = explode("|", $resultado['x738']); ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">1. ENFERMEDAD CARDIO-VASCULAR</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("1. ENFERMEDAD CARDIO-VASCULAR", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">2. ENFERMEDAD METABÓLICA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("2. ENFERMEDAD METABOLICA", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">3. ENFERMEDAD NEUROLÓGICA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("3 ENFERMEDAD NEUROLOGICA", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">4. ENFERMEDAD ONCOLÓGICA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("4. ENFERMEDAD ONCOLOGICA", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">5. ENFERMEDAD INFECCIOSA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("5. ENFERMEDAD INFECCIOSA", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">6. ENFERMEDAD HEREDITARIA / CONGÉNITA</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("6. ENFERMEDAD HEREDITARIA / CONGENITA", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">7. DISCAPACIDADES</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("7. DISCAPACIDADES", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">8. OTROS</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= (array_search("8. OTROS", $resultado['x738']) == false ? '' : 'X') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdescripci349'] ?>
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
                            <h4>E. FACTORES DE RIESGOS DEL PUESTO DE TRABAJO</h4>
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
                <div class="col-md-12 heighSeparar borderPM" style="border:none;">
                    <br>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>F. ENFERMEDAD ACTUAL</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdescripci974'] ?>
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
                            <h4>G. REVISIÓN DE ÓRGANOS Y SISTEMAS</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">1. PIEL - ANEXOS</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x1pielanex956'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">2. ÓRGANOS DE LOS SENTIDOS</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x2oacuterg121'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">3. RESPIRATORIO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x3respirat953'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">4. CARDIO-VASCULAR</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x4cardiova904'] == "Si" ? "X" : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">5. DIGESTIVO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x5digestiv718'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">6. GENITO - URINARIO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x6genitour787'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">7. MÚSCULO ESQUELÉTICO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x7muacutes878'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">8. ENDOCRINO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x8endocrin519'] == "Si" ? "X" : '') ?>
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; height: 60px;">
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">9. HEMO LINFÁTICO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x9hemolinf954'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <span class="text-bold">10. NERVIOSO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= ($resultado['x10nervios307'] == "Si" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-6 borderPM flexBox" style="justify-content: flex-start; height: 60px; word-break: break-all; overflow: hidden; padding: 5px">
                            </div>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">Observaciones</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xdescripci480'] ?>
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
                            <h4>H. CONSTANTES VITALES Y ANTROPOMETRÍA</h4>
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
                                <?= $resultado['xpresioacu836'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xtemperatu356'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci967'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xsaturacio168'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xfrecuenci715'] ?>
                            </div>
                            <div class="col-xs-2 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xpesokg486'] ?>
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
                                <?= $resultado['xtallacm698'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xiacutendi721'] ?>
                            </div>
                            <div class="col-xs-4 borderPM flexBox" style="justify-content: flex-start; height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xperiacute906'] ?>
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
                            <h4>I. EXAMEN FÍSICO REGIONAL</h4>
                            <?php
                            $resultado['x1piel918'] = explode("|", $resultado['x1piel918']);
                            $resultado['x2ojos980'] = explode("|", $resultado['x2ojos980']);
                            $resultado['x3oiacuted545'] = explode("|", $resultado['x3oiacuted545']);
                            $resultado['x4orofarin548'] = explode("|", $resultado['x4orofarin548']);
                            $resultado['x5nariz590'] = explode("|", $resultado['x5nariz590']);
                            $resultado['x6cuello778'] = explode("|", $resultado['x6cuello778']);
                            $resultado['x7toacuter868'] = explode("|", $resultado['x7toacuter868']);
                            $resultado['x8toacuter524'] = explode("|", $resultado['x8toacuter524']);
                            $resultado['x9abdomen975'] = explode("|", $resultado['x9abdomen975']);
                            $resultado['x10columna338'] = explode("|", $resultado['x10columna338']);
                            $resultado['x11pelvis588'] = explode("|", $resultado['x11pelvis588']);
                            $resultado['x12extremi669'] = explode("|", $resultado['x12extremi669']);
                            $resultado['x13neurolo259'] = explode("|", $resultado['x13neurolo259']);
                            $arrayEFR = [
                                count(array_filter($resultado['x1piel918'])),
                                count(array_filter($resultado['x2ojos980'])),
                                count(array_filter($resultado['x3oiacuted545'])),
                                count(array_filter($resultado['x4orofarin548'])),
                                count(array_filter($resultado['x5nariz590'])),
                                count(array_filter($resultado['x6cuello778'])),
                                count(array_filter($resultado['x7toacuter868'])),
                                count(array_filter($resultado['x8toacuter524'])),
                                count(array_filter($resultado['x9abdomen975'])),
                                count(array_filter($resultado['x10columna338'])),
                                count(array_filter($resultado['x11pelvis588'])),
                                count(array_filter($resultado['x12extremi669']))
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
                            ?>
                        </div>
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span class="text-bold">REGIONES</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 47px;">
                            <div class="col-xs-2 borderPM flexBox" style="border: none; flex-flow:column">
                                <div class="col-xs-12 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                    <span class="text-bold">1. Piel</span>
                                </div>
                                <?php $i = 0;
                                while ($i < count($resultado['x1piel918'])) {
                                    if ($resultado['x1piel918'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel918'][$i] != "" ? $resultado['x1piel918'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x1piel918'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x1piel918']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x1piel918'])))) { ?>
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
                                while ($i < count($resultado['x2ojos980'])) {
                                    if ($resultado['x2ojos980'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos980'][$i] != "" ? $resultado['x2ojos980'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x2ojos980'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x2ojos980']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x2ojos980'])))) { ?>
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
                                while ($i < count($resultado['x3oiacuted545'])) {
                                    if ($resultado['x3oiacuted545'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted545'][$i] != "" ? $resultado['x3oiacuted545'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x3oiacuted545'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x3oiacuted545']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x3oiacuted545'])))) { ?>
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
                                while ($i < count($resultado['x4orofarin548'])) {
                                    if ($resultado['x4orofarin548'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin548'][$i] != "" ? $resultado['x4orofarin548'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x4orofarin548'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x4orofarin548']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x4orofarin548'])))) { ?>
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
                                while ($i < count($resultado['x5nariz590'])) {
                                    if ($resultado['x5nariz590'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz590'][$i] != "" ? $resultado['x5nariz590'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x5nariz590'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x5nariz590']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x5nariz590'])))) { ?>
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
                                while ($i < count($resultado['x6cuello778'])) {
                                    if ($resultado['x6cuello778'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello778'][$i] != "" ? $resultado['x6cuello778'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x6cuello778'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x6cuello778']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x6cuello778'])))) { ?>
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
                                while ($i < count($resultado['x7toacuter868'])) {
                                    if ($resultado['x7toacuter868'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter868'][$i] != "" ? $resultado['x7toacuter868'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x7toacuter868'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x7toacuter868']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x7toacuter868'])))) { ?>
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
                                while ($i < count($resultado['x8toacuter524'])) {
                                    if ($resultado['x8toacuter524'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter524'][$i] != "" ? $resultado['x8toacuter524'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x8toacuter524'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x8toacuter524']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x8toacuter524'])))) { ?>
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
                                while ($i < count($resultado['x9abdomen975'])) {
                                    if ($resultado['x9abdomen975'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen975'][$i] != "" ? $resultado['x9abdomen975'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x9abdomen975'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x9abdomen975']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x9abdomen975'])))) { ?>
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
                                while ($i < count($resultado['x10columna338'])) {
                                    if ($resultado['x10columna338'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna338'][$i] != "" ? $resultado['x10columna338'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x10columna338'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x10columna338']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x10columna338'])))) { ?>
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
                                while ($i < count($resultado['x11pelvis588'])) {
                                    if ($resultado['x11pelvis588'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis588'][$i] != "" ? $resultado['x11pelvis588'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x11pelvis588'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x11pelvis588']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x11pelvis588'])))) { ?>
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
                                while ($i < count($resultado['x12extremi669'])) {
                                    if ($resultado['x12extremi669'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi669'][$i] != "" ? $resultado['x12extremi669'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x12extremi669'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x12extremi669']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x12extremi669'])))) { ?>
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
                                while ($i < count($resultado['x13neurolo259'])) {
                                    if ($resultado['x13neurolo259'][$i] != "") : ?>
                                        <div class="col-xs-12 borderPM flexBox" style="border: none;min-height: 47px;">
                                            <div class="col-xs-10 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x13neurolo259'][$i] != "" ? $resultado['x13neurolo259'][$i] : '') ?>
                                            </div>
                                            <div class="col-xs-2 borderPM flexBox" style="min-height: 47px; word-break: break-all; overflow: hidden; padding: 5px">
                                                <?= ($resultado['x13neurolo259'][$i] != "" ? 'X' : '') ?>
                                            </div>
                                        </div>
                                    <?php endif;
                                    $i++;
                                }
                                if ($posicionMayor1 > count(array_filter($resultado['x13neurolo259']))) : ?>
                                    <?php $i = 0;
                                    while ($i < ($posicionMayor1 - count(array_filter($resultado['x13neurolo259'])))) { ?>
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
                                <?= $resultado['xdescribir788'] ?>
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
                            <h4>J. RESULTADOS DE EXÁMENES GENERALES Y ESPECÍFICOS DE ACUERDO AL RIESGO Y PUESTO DE TRABAJO (IMAGEN, LABORATORIO Y OTROS)</h4>
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
                                <?= $resultado['obsebPediodica'] ?>
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
                                <h4>K. DIAGNÓSTICO </h4>
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
                            <h4>L. APTITUD MÉDICA PARA EL TRABAJO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none;height: 40px;">
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme756'] == "APTO" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO EN OBSERVACIÓN</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme756'] == "APTO EN OBSERVACIÓN" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-3 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">APTO CON LIMITACIONES</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme756'] == "APTO CON LIMITACIONES" ? "X" : '') ?>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <span class="text-bold">NO APTO</span>
                            </div>
                            <div class="col-xs-1 borderPM flexBox" style="height: 40px">
                                <?= ($resultado['xaptitudme756'] == "NO APTO" ? "X" : '') ?>
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
                                <?= $resultado['xobservaci424'] ?>
                            </div>
                        </div>
                    </div>
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <span>Limitación</span>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xlimitacio566'] ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 borderPM" style="border:none;">
                    <div class="row borderPM" style="border:none;">
                        <div class="col-xs-12 borderPM flexBox heightTitle" style="justify-content: flex-start; padding: 5px;">
                            <h4>M. RECOMENDACIONES Y/O TRATAMIENTO</h4>
                        </div>
                        <div class="col-xs-12 borderPM flexBox fontSubTitle" style="border:none; min-height: 40px;">
                            <div class="col-xs-12 borderPM flexBox" style="justify-content: flex-start; min-height: 40px; word-break: break-all; overflow: hidden; padding: 5px">
                                <?= $resultado['xrecomenda199'] ?>
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