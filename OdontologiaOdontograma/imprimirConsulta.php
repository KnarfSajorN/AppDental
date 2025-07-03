<?php
date_default_timezone_set('America/Bogota');

require_once "../funciones/funciones.php";
require_once "../funciones/funcionesUtilidades.php";

$idHistoria = decrypt($_GET['id']);

$QueryHistoria = "SELECT * FROM OBO_Historia WHERE id = '$idHistoria' ";
$ResultHistoria = mysqli_query($conn3, $QueryHistoria);
$RowHistoria = mysqli_fetch_assoc($ResultHistoria);

$QueryCliente = "SELECT * FROM cliente WHERE cliente_id = '{$RowHistoria["cliente_id"]}' ";
$ResultCliente = mysqli_query($conn3, $QueryCliente);
$RowCliente = mysqli_fetch_assoc($ResultCliente);

$CODI_CLIENTE = $RowCliente["CODI_CLIENTE"];

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
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">


    <style>

    </style>
    <link rel="stylesheet" href="css/Impresion/estructura_impresion.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap_5.1.1.min.css">
    <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">
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

                        <hr style="border-top: 1px solid black;opacity: 1;"> 
                        
                        <?php 
                        $ID = $RowHistoria["id"];
                        require './Include_Odontograma_Vista_Historial.php'; 
                        ?>



                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <td class="tg-0pky" style="width:20%">
                                        <p>Fecha: <?= $RowHistoria["fecha_registro"] ?></p>
                                    </td>
                                    <td class="tg-0pky" style="width:80%">
                                        <p>Subjetivo: <?= $RowHistoria["subjetivo"] ?></p>
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="tg-0pky">
                                        <!-- <p>Hora: <?= $RowHistoria[""] ?></p> -->
                                    </td>
                                    <td class="tg-0pky" rowspan="2">
                                        <p>Objetivo: <?= $RowHistoria["objetivo"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky">
                                        <p>Edad: <?= $RowHistoria["edad"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky">
                                        <p>P.A: <?= $RowHistoria["pa"] ?></p>
                                    </td>
                                    <td class="tg-0pky" rowspan="2">
                                        <p>Analisis: <?= $RowHistoria["analisis"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky">
                                        <p>F.C<?= $RowHistoria["fc"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky">
                                        <p>F.R<?= $RowHistoria["FR"] ?></p>
                                    </td>
                                    <td class="tg-0pky" rowspan="4">
                                        <p>Plan de acción: <?= $RowHistoria["plan_accion"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky">
                                        <p>Temp: <?= $RowHistoria["temp"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="tg-0pky">
                                        <p>Peso: <?= $RowHistoria["peso"] . "kg" ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <tbody>
                                <tr>
                                    <td colspan="2">
                                        <p>Interconsulta: <?= $RowHistoria["interconsulta"] ?></p>
                                    </td>
                                    <td colspan="2">
                                        <p>Motivo: <?= $RowHistoria["motivo_1"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15%">
                                        <p>Referencia: <?= $RowHistoria["referencia"] ?></p>
                                    </td>
                                    <td style="width: 55%">
                                        <p>Motivo: <?= $RowHistoria["motivo_2"] ?></p>
                                    </td>
                                    <td style="width: 15%">
                                        <p>Fecha: <?= $RowHistoria["fecha_1"] ?></p>
                                    </td>
                                    <td style="width: 15%">
                                        <p>Hora: <?= $RowHistoria["hora_1"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width: 15%">
                                        <p>Contrareferencia: <?= $RowHistoria["contrareferencia"] ?></p>
                                    </td>
                                    <td style="width: 55%">
                                        <p>Motivo: <?= $RowHistoria["motivo_3"] ?></p>
                                    </td>
                                    <td style="width: 15%">
                                        <p>Fecha: <?= $RowHistoria["fecha_2"] ?></p>
                                    </td>
                                    <td style="width: 15%">
                                        <p>Hora: <?= $RowHistoria["hora_2"] ?></p>
                                    </td>
                                </tr>
                            </tbody>
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

<style>
    @media print {
        hr {
            display: block;
            border: 1px solid #000;
            /* Línea horizontal de 2px de grosor y color negro */
            margin: 10px 10px;
            /* Espaciado antes y después de la línea horizontal */
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
    }

    /* esta clase sirve para cuando un div se monta por que los anteriores son mas largos con esto se pone la clase en la tabla de clases y lo corrige */
    .clear-both {
        clear: both;
    }
</style>


<style type="text/css">
    /* este estilo es para que cuando es menor a esa resolucion haga como si fuera col-6*/
    @media (max-width: 569px) {
        .col-perso {
            width: 50%;
        }
    }

    @media (max-width: 359px) {
        .col-perso {
            width: 100%;
        }
    }

    /* fin */



    /* este estilo va reemplazar a un col-md-2 ya que se usara ese espacio para aumentar el espacio de los recuadros */
    @media (max-width: 991px) {
        .col-xs-0 {
            display: none;
        }
    }

    /* fin */

    /* este estilo es para mover los recuadros y el diente al lado derecho para que no se monten */
    @media(max-width:991px) AND (min-width:425px) {
        .des_1 {
            left: 10px;
        }

        .des_2 {
            left: 20px;
        }

        .des_3 {
            left: 30px;
        }

        .des_4 {
            left: 40px;
        }

        .des_5 {
            left: 50px;
        }
    }


    @media(min-width:992px) {

        /* .G_2,
        .G_5,
        .G_7,
        .G_10 {
            border-right: 1px solid;
        }

        .G_5,
        .G_6 {
            border-bottom: 1px solid;
        } */
    }


    .G3 {}

    /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

    .cuadro {
        background-color: #FFFFFF;
        border: 1px solid #7F7F7F;
        position: relative;
        width: 35px;
        height: 35px;
    }

    /* .cuadro:hover {
        background: rgba(117, 198, 243, 0.4);
        cursor: pointer;
    } */

    .arriba {
        -webkit-border-radius: 80px 80px 0px 15px;
        -moz-border-radius: 80px 80px 0px 15px;
        border-radius: 80px 80px 0px 15px;
    }

    .izquierdo {
        top: -1px !important;
        left: -33px !important;
        -webkit-border-radius: 80px 0px 0px 80px;
        -moz-border-radius: 80px 0px 0px 80px;
        border-radius: 80px 0px 0px 80px;
    }

    .debajo {
        top: -2px !important;
        -webkit-border-radius: 0px 0px 80px 80px;
        -moz-border-radius: 0px 0px 80px 80px;
        border-radius: 0px 0px 80px 80px;
        z-index: 1;
    }

    .derecha {
        top: -71px !important;
        left: 34px !important;
        -webkit-border-radius: 0px 80px 80px 0px;
        -moz-border-radius: 0px 80px 80px 0px;
        border-radius: 0px 80px 80px 0px;
    }

    .centro {
        background: #F3F3F3;
        border: 1px solid #7F7F7F;
        top: -106px;
        width: 35px;
        height: 35px;
        position: relative;
    }

    /* este estilo es para que haga un zoom mas peque;o y no se monte los recuadros en esas resoluciones */


    @media(max-width:1895px) AND (min-width:1495px) {
        .recuadros {
            zoom: 0.75
        }
    }

    @media(max-width:1494px) AND (min-width:1137px) {
        .recuadros {
            zoom: 0.6;
        }
    }

    @media(max-width:1136px) AND (min-width:992px) {
        .recuadros {
            zoom: 0.55;
        }
    }


    @media(max-width:1494px) AND (min-width:992px) {
        .recuadroperso {
            zoom: 0.66;
        }
    }

    .click_odontograma {
        text-align-last: center;
    }

    .diente_img>svg {
        position: absolute;
        width: 35px;
        top: 69px;
        left: 21px;
    }

    .diente_img1>svg {
        position: absolute;
        width: 35px;
        top: 81px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img2>svg {
        position: absolute;
        width: 35px;
        top: 79px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img3>svg {
        position: absolute;
        width: 35px;
        top: 52px;
        left: 20px;
    }

    /* .rotate_icon>svg {
        transform: rotate(180deg);
    } */

    .click_odontograma>svg {
        top: 3px;
        position: relative;
    }
</style>

<style>

    .separadoinferior {
        bottom: 86px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        height: 44px !important;
        background-color: #d7d7d7bf;
        border-top: 0px;
    }

    .separadosuperior {
        top: 14px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 44px !important;
        background-color: #d7d7d7bf;
        border-bottom: 0px;
    }

    .separadoinferior>svg {
        top: 15px;
    }

    .separadosuperior>svg {
        top: 2px;
    }

    .G_3,
    .G_4,
    .G_6,
    .G_8,
    .G_11,
    .G_12 {
        left: 10px;
    }
</style>
