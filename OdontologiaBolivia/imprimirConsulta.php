<?php
date_default_timezone_set('America/Bogota');

require_once "../funciones/funciones.php";
require_once "../funciones/funcionesUtilidades.php";

$idHistoria = decrypt($_GET['id']);

$QueryHistoria = "SELECT * FROM OB_Historia WHERE id = '$idHistoria' ";
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

                        <!-- <hr style="border-top: 1px solid black;opacity: 1;"> -->

                        <h2 align="center"> <?php echo $nombre ?></h2>
                        <p>Fecha :<?php echo $Fecha ?></p>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center">Antecedentes</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th colspan="4">Antecedentes patológicos familiares</th>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <p><?= $RowHistoria["antecedentes_patologicos_familiares"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="4">Antecedentes patológicos personales</th>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Anemia: </b> <?= $RowHistoria["Anemia"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Cardiopatías: </b> <?= $RowHistoria["Cardiopatias"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Enf. Gastricas: </b> <?= $RowHistoria["Enf_Gastricas"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Hepatitis: </b> <?= $RowHistoria["Hepatitis"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Tuberculosis: </b> <?= $RowHistoria["Tuberculosis"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Asma: </b> <?= $RowHistoria["Asma"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Diabetes: </b> <?= $RowHistoria["Diabetes"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Epilepsia: </b> <?= $RowHistoria["Epilepsia"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Hipertensión: </b> <?= $RowHistoria["Hipertension"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>VIH: </b> <?= $RowHistoria["VIH"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Ninguno: </b> <?= $RowHistoria["Ninguno"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Otro: </b> <?= $RowHistoria["otro_antecedente"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Alergias: </b> <?= $RowHistoria["alergias"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Embarazo: </b> <?= $RowHistoria["embarazo"] ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><b>Tuvo hemorragia después de una extracción dental:</b> <?= $RowHistoria["hemorragia_despues"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td colspan="2">
                                        <p><b>Especifique: </b> <?= $RowHistoria["hemorragia_especificar"] ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Examen Extra Oral</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><b>ATM: </b> <?= $RowHistoria["ATM"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Labios: </b> <?= $RowHistoria["labios"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Ganglios linfáticos: </b> <?= $RowHistoria["ganglios_linfaticos"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Lengua: </b> <?= $RowHistoria["lengua"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Respirador: </b> <?= $RowHistoria["respirador"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Paladar: </b> <?= $RowHistoria["paladar"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Otros: </b> <?= $RowHistoria["examen_extraoral_otros"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Piso de la boca: </b> <?= $RowHistoria["piso_boca"] ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Antecedentes bucodentales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><b>Mucosa Yugal: </b> <?= $RowHistoria["mucosa_yugal"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Fecha de ultima visita al odontólogo: </b> <?= $RowHistoria["ultima_visita_odontolog"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Encías: </b> <?= $RowHistoria["encias"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p><b>Habitos</b> <br> <b>Fuma</b><?= $RowHistoria["habito_fuma"] == 'on' ? 'Si' : 'No' ?> <b>Bebe</b><?= $RowHistoria["habito_bebe"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td>
                                        <p><b>Utiliza protesis dental: </b> <?= $RowHistoria["usa_protesis_dental"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="3" class="text-center">Antecedentes de higiene oral</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><b>Utiliza cepillo dental: </b> <?= $RowHistoria["usa_cepillo"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Utiliza hilo dental: </b> <?= $RowHistoria["usa_hilo"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Utiliza enguaje bucal: </b> <?= $RowHistoria["usa_enguaje"] ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <p><b>Frecuencia del cepillado dental</b> <?= $RowHistoria["frecuencia_cepillado"] ?></p>
                                    </td>
                                    <td>
                                        <p><b>Durante el cepillado le sangran las encías: </b> <?= $RowHistoria["sangrado_cepillado"] == 'on' ? 'Si' : 'No' ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <p><b>Higiene bucal: </b> <?= $RowHistoria["higiene_bucal"] ?></p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <thclass="text-center">Observaciones</thclass=>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p><?= $RowHistoria["observaciones"] ?></p>
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