<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$historiaClinica = $_GET['historiaClinica1'];


$queryList = mysqli_query($conn3, "SELECT * FROM  conceptolaboral where id = $historiaClinica");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    $Fecha      = $rowMotorizado['Fecha'];
    list($y, $m, $d) = explode("-", $Fecha);
    $Hora = $rowMotorizado['Hora'];
    $firma = $rowMotorizado['firma'];
    // Tipo Examen
    $xtipodeexa690 = explode("|", $rowMotorizado['xtipodeexa690']);
    $xaptitudoc588 = explode("|", $rowMotorizado['xaptitudoc588']);
    $xaptitudoc267 = explode("|", $rowMotorizado['xaptitudoc267']);
    $xaptitudoc161 = explode("|", $rowMotorizado['xaptitudoc161']);
    $xinformaci281 = explode("|", $rowMotorizado['xinformaci281']);
    $xexaacutem307 = explode("|", $rowMotorizado['xexaacutem307']);
    $complementos = [];
    $n = 0;
    foreach ($xexaacutem307 as $key => $value) {
        if ($value != "") {
            $complementos[$n] = $value;
            $n++;
        }
    }
    $xrecomenda954 = explode("|", $rowMotorizado['xrecomenda954']);
    $xelpresent728 = $rowMotorizado['xelpresent728'];
    $xincluiren405 = $rowMotorizado['xincluiren405'];
    $xtipodepro824 = explode("|", $rowMotorizado['xtipodepro824']);
    $recomendacion_particular = $rowMotorizado['recomendacion_particular'];
    $recomendacion_general = $rowMotorizado['recomendacion_general'];
    $consentimiento = $rowMotorizado['consentimiento'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];

    $nombreF      = $rowMotorizado['nombreF'];
    $telefonoF    = $rowMotorizado['telefonoF'];
    $direccionF   = $rowMotorizado['direccionF'];
    $emailF       = $rowMotorizado['emailF'];
    $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
    $licenciaF    = $rowMotorizado['licenciaF'];
    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $LogoF        = $rowMotorizado['logoF'];
    $firma        = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="'.$Base.'logos/' . $LogoF . '" class="img-fluid" height="90px" width="90px" >';
    }


    if (strlen($firma) > 0) {
        $firmaImg = '<img src="'.$Base.'FirmasReg/' . $firma . '" style="height:70px; width:150px">';
    }

    // Nuevos campos 

}

$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $pais               = $rowMotorizado['pais'];
    $ciudadMedico             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];
    $especialidad        = $rowMotorizado['especialidad'];
    $nit                = $rowMotorizado['nit'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
    $celular_cliente            = $rowMotorizado['celular_cliente'];
    $primer_apellido            = $rowMotorizado['primer_apellido'];
    $segundo_apellido            = $rowMotorizado['segundo_apellido'];
    $primer_nombre            = $rowMotorizado['primer_nombre'];
    $segundo_nombre            = $rowMotorizado['segundo_nombre'];
    $seguro                     = $rowMotorizado['seguro'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $profesion_cliente          = $rowMotorizado['profesion_cliente'];
    $genero = $rowMotorizado['genero'];
    $fotoperfil          = $rowMotorizado['fotoperfil'];
    $discapacidad = $rowMotorizado['tipodiscapacidad'];
    $expedicionDocumento = $rowMotorizado['expedicionDocumento'];
    $idEmpresa = $rowMotorizado['idEmpresa'];
    $cargoR = $rowMotorizado['ocupacion'];
    $ciudad = funcionMaster($rowMotorizado['codigo_ciudad'], 'id', 'Nombre_Tildes', 'Ciudades');
    $departamento = funcionMaster($rowMotorizado['codigo_departamento'], 'codigo', 'nombre', 'departamentos');
    $nombreEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'nombreEmpresa', 'empresasAfiliadas');
    $nitEmpresa = funcionMaster($rowMotorizado['idEmpresa'], 'id', 'NIT', 'empresasAfiliadas');

    if($fotoperfil <> ""){
        $fotoperfil = "pascientes/".$fotoperfil;
    }

}
$queryList = mysqli_query($conn3, "SELECT * FROM firmas where historia_id = $historiaClinica and cliente_id = $cliente_id and historia_nombre ='conceptolaboral'");

$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Firma           = $rowMotorizado['firma'];
}

?>


<?php
$_GET['validar'] = $CODI_CLIENTE;
$_GET['mensaje'] = "Ingrese su Cédula para Visualizar el Contenido de la Impresión";
include 'preventView.php';
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
    <link rel="stylesheet" href="https://medicalsoftcolombia.com/70/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <style type="text/css">
        @page {
            /* size: A4; */
            margin: 1mm;
        }

        @media print {

            html,
            body {
                -webkit-print-color-adjust: exact !important;
            }

            @-moz-document url-prefix() {}

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

            /* TABLA */
            .table>caption+thead>tr:first-child>td,
            .table>caption+thead>tr:first-child>th,
            .table>colgroup+thead>tr:first-child>td,
            .table>colgroup+thead>tr:first-child>th,
            .table>thead:first-child>tr:first-child>td,
            .table>thead:first-child>tr:first-child>th {
                margin: 0;
                padding: 0;
                border: 1px solid black;
            }

            .table-bordered>tbody>tr>td,
            .table-bordered>tbody>tr>th,
            .table-bordered>tfoot>tr>td,
            .table-bordered>tfoot>tr>th,
            .table-bordered>thead>tr>td,
            .table-bordered>thead>tr>th {
                margin: 0;
                padding: 0;
                border: 1px solid black;
            }
        }

        * {
            -webkit-print-color-adjust: exact !important;
        }

        .invoice .header {
            height: 100px;
            /* border: 2px solid black; */
            display: flex;
            align-items: center;
        }

        .invoice .header .row {
            display: flex;
            align-items: center;
        }

        /* TABLA */
        .table>caption+thead>tr:first-child>td,
        .table>caption+thead>tr:first-child>th,
        .table>colgroup+thead>tr:first-child>td,
        .table>colgroup+thead>tr:first-child>th,
        .table>thead:first-child>tr:first-child>td,
        .table>thead:first-child>tr:first-child>th {
            margin: 0;
            padding: 0;
            border: 1px solid black;
        }

        .table-bordered>tbody>tr>td,
        .table-bordered>tbody>tr>th,
        .table-bordered>tfoot>tr>td,
        .table-bordered>tfoot>tr>th,
        .table-bordered>thead>tr>td,
        .table-bordered>thead>tr>th {
            margin: 0;
            padding: 0;
            border: 1px solid black;
        }

        .bordeCaja {
            padding: 0;
            border: 1px solid black;
        }

        .bordeCaja p {
            padding: 0;
            margin: 0;
            display: flex;
            align-items: center;
        }

        .bordeCaja img {
            width: 100%;
            height: 130px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bordeCaja .flex {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .bordeCaja .padding {
            padding: 0 0 0 5px;
        }

        .sizeFont {
            font-size: 12px;
        }

        .padingBox.center {
            padding: 5px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <!-- Main content -->
        <section class="invoice">
            <div class="col-md-12 header">
                <div class="row">
                    <div class="col-xs-3">
                        <?php echo $Logo ?>
                    </div>
                    <div class="col-xs-2">
                        <h5 style="font-size: 1em; text-align:center;">Empresa</h5>
                    </div>
                    <div class="col-xs-3">
                        <h5 style="font-size: 1em; text-align:center;">Concepto Laboral</h5>
                    </div>
                    <div class="col-xs-4">
                        <p style="font-size: .6em; text-align:center;"><?php echo $header  ?></p>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-xs-3 bordeCaja">
                        <p class="padding">Fecha ▼</p>
                    </div>
                    <div class="col-xs-3 bordeCaja">
                        <p class="padding">Tipo de Examen ►</p>
                    </div>
                    <div class="col-xs-6 bordeCaja" style="height: 22px;">
                        <p class="padding">
                            <?php
                            foreach ($xtipodeexa690 as $key => $value) {
                                if ($value != "") {
                                    echo $value . ($key < (count($xtipodeexa690) - 1) ? ', ' : '');
                                }
                            }
                            ?>
                        </p>
                    </div>
                </div>
                <!-- Unida -->
                <div class="row">
                    <div class="col-xs-1 bordeCaja">
                        <p class="padding">Día</p>
                    </div>
                    <div class="col-xs-1 bordeCaja">
                        <p class="padding">Mes</p>
                    </div>
                    <div class="col-xs-1 bordeCaja">
                        <p class="padding">Año</p>
                    </div>
                    <div class="col-xs-4 bordeCaja">
                        <p class="flex">Ciudad ▼</p>
                    </div>
                    <div class="col-xs-5 bordeCaja">
                        <p class="flex">Departamento ▼</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px;">
                        <p class="padding"> <?= $d ?> </p>
                    </div>
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px;">
                        <p class="padding"> <?= $m ?> </p>
                    </div>
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px;">
                        <p class="padding"> <?= $y ?> </p>
                    </div>
                    <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                        <p class="flex"> <?= $ciudad ?> </p>
                    </div>
                    <div class="col-xs-5 bordeCaja" style="min-height: 22px;">
                        <p class="flex"> <?= $departamento ?></p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-9">
                        <div class="row">
                            <div class="col-xs-3 bordeCaja">
                                <p class="flex">1er Apellido ▼</p>
                            </div>
                            <div class="col-xs-3 bordeCaja">
                                <p class="flex">2do Apellido ▼</p>
                            </div>
                            <div class="col-xs-3 bordeCaja">
                                <p class="flex">1er Nombre ▼</p>
                            </div>
                            <div class="col-xs-3 bordeCaja">
                                <p class="flex">2do Nombre ▼</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $primer_apellido ?> </p>
                            </div>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $segundo_apellido ?> </p>
                            </div>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $primer_nombre ?> </p>
                            </div>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $segundo_nombre ?> </p>
                            </div>
                        </div>
                        <!-- SEPARADOR -->
                        <div class="row">
                            <div class="col-xs-2 bordeCaja">
                                <p class="flex">Tipo D.I. ▼</p>
                            </div>
                            <div class="col-xs-3 bordeCaja">
                                <p class="flex">No. Documento ▼</p>
                            </div>
                            <div class="col-xs-3 bordeCaja">
                                <p class="flex">Expedido en ▼</p>
                            </div>
                            <div class="col-xs-2 bordeCaja">
                                <p class="flex">Genero ▼</p>
                            </div>
                            <div class="col-xs-2 bordeCaja">
                                <p class="flex">Edad ▼</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-2 bordeCaja" style="min-height: 22px;">
                                <p class="flex"><?= $tipo_cliente ?></p>
                            </div>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $CODI_CLIENTE ?> </p>
                            </div>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $expedicionDocumento ?> </p>
                            </div>
                            <div class="col-xs-2 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $genero ?> </p>
                            </div>
                            <div class="col-xs-2 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?php echo (Funcion_Edad_Paciente($fechaNacimiento)['Años']); ?> </p>
                            </div>
                        </div>
                        <!-- SEPARADOR -->
                        <div class="row">
                        <div class="col-xs-4 bordeCaja">
                                <p class="flex">Ocupación ▼</p>
                            </div>
                            <div class="col-xs-4 bordeCaja">
                                <p class="flex">Empresa ▼</p>
                            </div>
                            <div class="col-xs-4 bordeCaja">
                                <p class="flex">N.I.T. ▼</p>
                            </div>
                        </div>
                        <div class="row">
                        <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $cargoR ?></p>
                            </div>
                            <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= ($idEmpresa == 0 ? 'Particular' : $nombreEmpresa) ?> </p>
                            </div>
                            <div class="col-xs-4 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> <?= $nitEmpresa ?> </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-3 imgFluid bordeCaja">
                        <img src="<?=$Base;?><?= ($fotoperfil != '' ? $fotoperfil : 'ImagenesHistoria/SaludOcupacional.jpg') ?>" alt="">
                    </div>
                </div>
                <!-- Unida -->
                <div class="row">
                    <div class="col-xs-12 bordeCaja">
                        <p class="padding">Información del Concepto Laboral ▼</p>
                    </div>
                    <?php
                    $contador = 2;
                    $xinformaci281 = array_filter($xinformaci281);
                    foreach ($xinformaci281 as $key => $value) {
                        ($contador == 0 ? $contador = 2 : '');
                    ?>
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= $value ?> </p>
                        </div>
                        <?php
                        $contador--;
                    }
                    if ($contador > 0) {
                        while ($contador > 0) {
                        ?>
                            <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> </p>
                            </div>
                    <?php
                            $contador--;
                        }
                    }
                    ?>
                    <div class="col-xs-12 bordeCaja">
                        <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">Recomendaciones Particulares: <?= $recomendacion_particular ?></p>
                    </div>
                    <!-- <div class="col-xs-12 bordeCaja">
                        <p class="flex">APTITUD OCUPACIONAL __________: ▼</p>
                    </div>  -->
                    <!-- SEPARADOR -->
                    <?php
                    $arrayConcepto = [
                        "Ingreso" => "Aptitud Ocupacional de Ingreso ▼",
                        "Periodico" => "Aptitud Ocupacional Periódico ▼",
                        "Egreso" => "Aptitud Ocupacional de Retiro ▼"
                    ];
                    foreach ($arrayConcepto as $key => $value) {
                        if (in_array($key, $xtipodeexa690)) {
                    ?>
                            <div class="col-xs-12 bordeCaja">
                                <p class="padding"><?= $value ?></p>
                            </div>
                            <?php
                            foreach (($key == "Ingreso" ? array_filter($xaptitudoc588) : ($key == "Periodico" ? array_filter($xaptitudoc267) : ($key == "Egreso" ? array_filter($xaptitudoc161) : null))) as $key => $value) {
                                ($contador == 0 ? $contador = 3 : '');
                            ?>
                                <div class="col-xs-12 bordeCaja" style="min-height: 22px;">
                                    <p class="flex"> <?= $value ?> </p>
                                </div>
                            <?php
                            }
                            ?>
                    <?php
                        }
                    }
                    ?>

                    <!-- SEPARADOR -->
                    <div class="col-xs-12 bordeCaja">
                        <p class="padding">Exámenes Complementarios ▼</p>
                    </div>
                    <?php
                    $contador = 4;
                    foreach (array_filter($complementos) as $key => $value) {
                        ($contador == 0 ? $contador = 4 : '');
                    ?>
                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= $value ?> </p>
                        </div>
                        <?php
                        $contador--;
                    }
                    if ($contador > 0) {
                        while ($contador > 0) {
                        ?>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> </p>
                            </div>
                    <?php
                            $contador--;
                        }
                    }
                    ?>
                    <div class="col-xs-12 bordeCaja">
                        <p class="padding">Recomendaciones ▼</p>
                    </div>
                    <?php
                    $contador = 4;
                    foreach (array_filter($xrecomenda954) as $key => $value) {
                        ($contador == 0 ? $contador = 4 : '');
                    ?>
                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= $value ?> </p>
                        </div>
                        <?php
                        $contador--;
                    }
                    if ($contador > 0) {
                        while ($contador > 0) {
                        ?>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> </p>
                            </div>
                    <?php
                            $contador--;
                        }
                    }
                    ?>
                    <!-- separador -->
                    <div class="col-xs-10 bordeCaja sizeFont" style="min-height: 22px;">
                        <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">El Presente Concepto de Aptitud Laboral se Expide Según el Profesiograma o Perfil del Cargo Conocido por la IPS ►</p>
                    </div>
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex">Si</p>
                        </div>
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= (preg_match("/si/i", $xelpresent728) ? 'X' : '') ?> </p>
                        </div>
                    </div>
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex">No</p>
                        </div>
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= (preg_match("/no/i", $xelpresent728) ? 'X' : '') ?> </p>
                        </div>
                    </div>
                    <!-- separador -->
                    <div class="col-xs-10 bordeCaja sizeFont" style="min-height: 22px;">
                        <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">Incluir en Programa de Vigilancia Epidemiológica ►</p>
                    </div>
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex">Si</p>
                        </div>
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= (preg_match("/si/i", $xincluiren405) ? 'X' : '') ?> </p>
                        </div>
                    </div>
                    <div class="col-xs-1 bordeCaja" style="min-height: 22px; border:none !important;">
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex">No</p>
                        </div>
                        <div class="col-xs-6 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= (preg_match("/no/i", $xincluiren405) ? 'X' : '') ?> </p>
                        </div>
                    </div>
                    <!-- separador -->
                    <div class="col-xs-10 bordeCaja sizeFont" style="min-height: 22px;">
                        <p class="flex" style="justify-content: flex-end; padding: 0 5px 0 0;">Tipo de Programa de Vigilancia Epidemiológica a Incluir ▼</p>
                    </div>
                    <div class="col-xs-2 bordeCaja" style="min-height: 22px;"></div>
                    <?php
                    $contador = 4;
                    foreach (array_filter($xtipodepro824) as $key => $value) {
                        ($contador == 0 ? $contador = 4 : '');
                    ?>
                        <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                            <p class="flex"> <?= $value ?> </p>
                        </div>
                        <?php
                        $contador--;
                    }
                    if ($contador > 0) {
                        while ($contador > 0) {
                        ?>
                            <div class="col-xs-3 bordeCaja" style="min-height: 22px;">
                                <p class="flex"> </p>
                            </div>
                    <?php
                            $contador--;
                        }
                    }
                    ?>
                    <!-- separador -->
                    <div class="col-xs-12 bordeCaja sizeFont" style="min-height: 22px;">
                        <p class="padding">Recomendaciones Generales ▼</p>
                    </div>
                    <div class="col-xs-12 bordeCaja sizeFont" style="min-height: 22px;">
                        <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">
                            <?= $recomendacion_general ?>
                        </p>
                    </div>
                    <!-- SEPARADOR -->
                    <div class="col-xs-12 bordeCaja sizeFont">
                        <p class="padding">Consentimiento Informado del Aspirante o Trabajador ▼</p>
                    </div>
                    <div class="col-xs-12 bordeCaja sizeFont" style="min-height: 22px;">
                        <p style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;">
                            <?= $consentimiento ?>
                        </p>
                    </div>
                    <!-- SEPARADOR -->
                    <div class="col-xs-12 bordeCaja">
                        <p class="padding">Firmas ▼</p>
                    </div>
                    <div class="col-xs-6 bordeCaja sizeFont">
                        <p class="padding">Médico Ocupacional ▼</p>
                    </div>
                    <div class="col-xs-6 bordeCaja sizeFont">
                        <p class="padding">Aspirante a Trabajador ▼</p>
                    </div>
                    <div class="col-xs-6 bordeCaja sizeFont" style="min-height: 174.84px; padding: 5px;">
                        <?php
                        echo  $firmaImg;
                        ?>
                        _______________________________________<br>
                        <?php echo $empresaNombre ?><br>
                        <?php echo $especialidad ?><br>
                        <?php echo $nit ?>L<br>
                        Registro Médico<br>
                    </div>
                    <div class="col-xs-6 bordeCaja sizeFont" style="min-height: 174.84px; padding: 5px;">
                        <?php if (strlen($Firma) > 10) {
                            echo "<img src='$Firma'  style='height:70px; width:150px'>";
                        }
                        ?>
                        _______________________________________<br>
                        Nombre: <?php echo $nombre_cliente; ?> <br>
                        C.C. <?php echo $CODI_CLIENTE; ?>
                    </div>
                    <!-- SEPARADOR -->
                    <div class="col-xs-12 bordeCaja" style="border:none !important;">
                        <p style="text-align: justify; text-justify: inter-word;"> La Presente Certificación se Expide con Base en la Historia Clínica Ocupacional del Trabajador, la Cual Tiene un Carácter Confidencial, y Amparada con Base al Consentimiento Informado y con Destino a la Hoja de Vida del Trabajador. </p>
                    </div>
                    <div class="col-xs-12 bordeCaja sizeFont" align="center" style="border:none !important; margin-top:15px">
                        <p class="flex" style="padding: 0 5px 0 5px; text-align: justify; text-justify: inter-word;"><?= $pieF ?></p>
                    </div>
                </div>
            </div>
        </section>
        <!-- /.content -->
        <div class="clearfix"></div>
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
    <script type="text/javascript">
        window.addEventListener('load', function() {
            window.print();
        });
    </script>
</body>

</html>