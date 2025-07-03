<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
//include("funciones/conexiones.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
include 'funciones/conn3.php';

$historiaClinica1 = $_GET['historiaClinica1'];



$queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica6_fisioterapia where ID = $historiaClinica1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $ID                 = $rowMotorizado['id'];
    $Fecha                 = $rowMotorizado['Fecha'];
    $Hora                  = $rowMotorizado['Hora'];
    $entrevista                  = $rowMotorizado['entrevista'];
    $analisis                 = $rowMotorizado['analisis'];
    $anamnesis       = $rowMotorizado['anamnesis'];
    $fisico_postural       = $rowMotorizado['fisico_postural'];
    $evaluacion_dolor       = $rowMotorizado['evaluacion_dolor'];
    $evaluacion_sensibilidad      = $rowMotorizado['evaluacion_sensibilidad'];
    $evaluacion_osteoarticular     = $rowMotorizado['evaluacion_osteoarticular'];
    $evaluacion_neuromuscular    = $rowMotorizado['evaluacion_neuromuscular'];
    //$evaluacion_marcha_equilibrio    = $rowMotorizado['evaluacion_marcha_equilibrio'];      
    // $actividad_motora_funcional    = $rowMotorizado['actividad_motora_funcional'];
    $CIE10    = $rowMotorizado['CIE10'];
    $solicitud_procedimiento    = $rowMotorizado['solicitud_procedimiento'];
    $orden_medica    = $rowMotorizado['orden_medica'];
    $usuario_id   = $rowMotorizado['usuario_id'];
    $cliente_id   = $rowMotorizado['cliente_id'];
    $secuencial_historia = $rowMotorizado['secuencial_historia'];
}

$cies = explode('<td width="40%" style="border: 1px solid #000000">', $CIE10);

$ciefinal1 = explode('</td>', $cies[6]);
$ciefinal2 = explode('</td>', $cies[8]);
$ciefinal3 = explode('</td>', $cies[10]);
$ciefinal4 = explode('</td>', $cies[12]);


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
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

    if (strlen($LogoF) > 0) 
              {
                 $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="100" width="100%">';
              }
              

              if (strlen($firma) > 0)  
              {
                $firmaImg = '<img src="'.$Base.'/FirmasReg/'.$firma.'" height="150" width="150">'; 
              }


            }





    // Nuevos campos 


}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['NOMBRE_USUARIO'];
    $especialidad     = $rowMotorizado['especialidad'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
    $registro_medico    = $rowMotorizado['registro_medico'];
    $NOMBRE_USUARIO    = $rowMotorizado['NOMBRE_USUARIO'];
    $identificacion              = $rowMotorizado['identificacion'];
    $codigo                = $rowMotorizado['codigo'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
    $fechaNacimiento            = $rowMotorizado['fechaNacimiento'];
    $celular_cliente            = $rowMotorizado['celular_cliente'];
    $seguro                     = $rowMotorizado['seguro'];
    $genero                     = $rowMotorizado['genero'];
    $entidadSalud               = $rowMotorizado['entidadSalud'];
    $direccion_cliente          = $rowMotorizado['direccion_cliente'];
    $etnia = $rowMotorizado['etnia'];
    $discapacidad = $rowMotorizado['tipodiscapacidad'];
}
$cie1 = mysqli_query($conn3, "SELECT * FROM historiaClinica9_Quirurgico_Cie10 as hc, cie10 as cie10 WHERE hc.usuario_id=$usuario_id and hc.historiaClinica9_id='$historiaClinica1' AND cie10.codigo=hc.codigo and hc.cliente_id=$cliente_id ");



?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?php echo $empresaNombre ?> </title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
    <!--<link rel="stylesheet" href="style.css">
   <!--<link rel="stylesheet" type="text/css" href="https://medicalsoftplus.com/co131/estilopiepagina.css">-->

    <!--<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
 estilos css-->
    <!--<link rel="stylesheet" href="https://sievensoftcolombia.com/css/bootstrap.css">
 estilos css-->
    <!--<link href="https://sievensoftcolombia.com/css/bootstrap.min.css" rel="stylesheet">
<script src="https://sievensoftcolombia.com/js/jquery-3.2.1.slim.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/popper.min.js" ></script>
<script src="https://sievensoftcolombia.com/js/bootstrap.js"></script>
<link href="https://sievensoftcolombia.com/font/icon.css"  rel="stylesheet">-->


</head>

<body onload="window.print();">
    <div class="wrapper">
        <div class="col-md-12">

            <div class="box box-solid">
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="row">
                    </div>
                </div>
                <div class="page-header" style="text-align: center">

                    <div class="row">

                        <div class="col-md-12">

                            <table class="tg" style="undefined;table-layout: fixed; width: 100%">
                                <colgroup>
                                    <col style="width:  100%">
                                    <col style="width:  100%">
                                    <col style="width:  100%">
                                    <col style="width:  100%">
                                </colgroup>

                                <tr>
                                    <th class="Logo" rowspan="4" align="center"><?php echo $Logo ?> </th>
                                    <th class="titulo" colspan="4" rowspan="4">
                                        <div align="center"><?php echo $header  ?></div>
                                        <div align="center"> Fecha de Atencion : <?php echo $Fecha . ' ' . $Hora ?></div>
                                        <!--<h9 align="center"> <?php echo  $empresaNombre ?> <?php echo   $direccion ?>  </h9></th>-->
                                </tr>

                                <tr>
                                </tr>
                                <tr>
                                </tr>
                                <tr>
                                </tr>
                            </table>
                            <br>
                            <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
                                <tr>
                                    <td width="30%" class="nombrePaciente">Nombre del paciente: <?php echo $nombre_cliente ?></td>
                                    <td width="20%" class="documento">Documento: <?php echo $CODI_CLIENTE ?></td>
                                    <td width="30%" class="f.nacimiento">F.Nacimiento: <?php echo  $fechaNacimiento ?></td>
                                    <td width="20%" class="edad">Edad: <?php echo  calculaedad($fechaNacimiento) ?></td>
                                </tr>

                                <tr>
                                    <td class="residencia">Residencia: <?php echo $direccion_cliente  ?></td>
                                    <td class="seguro">EPS:<?php echo $entidadSalud  ?></td>
                                    <td class="telefono">Telefono: <?php echo $celular_cliente ?></td>
                                    <td class="genero">Genero: <?php echo $genero ?></td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <strong> CIE-10 </strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td colspan="4">
                                        <?php echo ' ' . $ciefinal1[0]; ?> <br>
                                        <?php echo ' ' . $ciefinal2[0]; ?> <br>
                                        <?php if ($ciefinal3[0] != '') {
                                            echo ' ' . $ciefinal3[0];
                                        } ?> <br>
                                        <?php echo ' ' . $ciefinal4[0]; ?> <br>
                                    </td>
                                </tr>
                            </table>
                            <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">


                            </table>
                        </div>
                    </div>
                </div>






                <div>


                    <table width="100%">

                        <?php if (strlen($entrevista) > 0) : ?>
                            <div>

                                <label> <?php echo $entrevista ?> </label>

                            </div>
                        <?php endif ?>

                    </table>

                    <table width="100%">

                        <?php if (strlen($anamnesis) > 0) : ?>
                            <div>

                                <label> <?php echo $anamnesis ?> </label>

                            </div>
                        <?php endif ?>

                    </table>
                    <table width="100%">
                        <?php if (strlen($fisico_postural) > 0) : ?>
                            <div>

                                <label><?php echo $fisico_postural ?></label>
                            </div>

                        <?php endif ?>
                    </table>

                    <table width="100%">
                        <?php if (strlen($evaluacion_dolor) > 0) : ?>
                            <div>

                                <label><?php echo $evaluacion_dolor ?></label>
                            </div>
                        <?php endif ?>

                    </table>

                    <table width="100%">
                        <?php if (strlen($evaluacion_sensibilidad) > 0) : ?>
                            <div>

                                <label><?php echo $evaluacion_sensibilidad ?></label>
                            </div>
                        <?php endif ?>

                    </table>

                    <table width="100%">
                        <?php if (strlen($evaluacion_osteoarticular) > 0) : ?>

                            <div>

                                <label><?php echo $evaluacion_osteoarticular ?></label>
                            </div>

                    </table>
                <?php endif ?>

                <table width="100%">

                    <?php if (strlen($evaluacion_neuromuscular) > 0) : ?>
                        <div>

                            <label><?php echo $evaluacion_neuromuscular ?></label>
                        </div>
                    <?php endif ?>

                </table>

                <table width="100%">

                    <?php if (strlen($CIE10) > 0) : ?>
                        <div>

                            <label><?php echo $CIE10 ?></label>
                        </div>
                    <?php endif ?>
                </table>
                <table width="100%">

                    <?php if (strlen($solicitud_procedimiento) > 0) : ?>
                        <div>

                            <label> <?php echo $solicitud_procedimiento ?> </label>

                        </div>
                    <?php endif ?>
                </table>
                <table width="100%">

                    <?php if (strlen($orden_medica) > 0) : ?>
                        <div>

                            <label> <?php echo $orden_medica ?> </label>

                        </div>
                    <?php endif ?>
                </table>


                <table width="100%">
                    <div>
                        <?php if (strlen($actividad_motora_funcional) > 0) : ?>
                            <label><?php echo $actividad_motora_funcional ?></label>
                    </div>
                <?php endif ?>
                </table>

                <table width="100%">

                    <?php if (strlen($analisis) > 0) : ?>
                        <div>

                            <label> <?php echo $analisis ?> </label>

                        </div>
                    <?php endif ?>

                </table>









                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->

            <div class="col-xs-6" align="center">
                <?php echo $Fecha ?>
            </div>

            <div class="col-xs-6" align="center">
                <?php echo $ciudadPaisF ?>
            </div>



            <div class="col-xs-6" align="center">
                <?php
                // echo  $firmaImg;

                ?>
            </div>

            <div class="col-xs-6" align="center">
                <?php
                echo  $firmaImg;

                ?>
                <br>_______________________________________<br>
                <?php echo $NOMBRE_USUARIO ?><br>
                <?php echo $especialidad ?><br>
                <?php echo $nit ?><br>
                <?php echo $registro_medico ?><br>
                <?php echo $identificacion ?><br>
                <?php echo $codigo ?><br>
                <b>* Documento firmado digitalmente *</b>
                <br>
                <br>
                <br>
            </div>

        </div>


    </div>



    </div>
    </div>
    </div>
    </div>

    </div>


    <!-- /.row -->

    <!-- this row will not appear when printing -->
    <div class="row no-print">
        <div class="col-xs-12">
            <a href="imprimirRecipe.php?historiaClinica1=<?php echo $historiaClinica1 ?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
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