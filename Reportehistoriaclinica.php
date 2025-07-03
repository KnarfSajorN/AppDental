<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");
session_start();


$tipo = $_POST['tipo'];
$ID = $_POST['ID'];
$idCliente = $tipo;
$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;
//////////////////////////////////////////////////////////////////////////////////////////
//                                  HISTORIAS                                           //
//////////////////////////////////////////////////////////////////////////////////////////





$queryList = mysqli_query($conn3, "SELECT * FROM config where (ID_Usuario = $ID or ID_Usuario = '{$_SESSION['ID_principal']}')");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['nombreF'];
    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
        $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }
}


if ($_POST['buttonSubmit'] == 'generar') {
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    </head>

    <body>
        <!-- Main content -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?php echo $Base; ?>Reportespacientes" class="btn btn-default"> Regresar</a>
                <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
                    Imprimir</a>
            </div>
        </div>
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php echo $Logo ?> <?php echo $empresaNombre ?>
                    <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>

            <div class="col-xs-12">

                <?php
                $queryListc = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$tipo");
                $nrowl = mysqli_num_rows($queryListc);
                while ($rowc = mysqli_fetch_array($queryListc)) {
                    $nombre_cliente = $rowc['nombre_cliente'];
                    $CODI_CLIENTE = $rowc['CODI_CLIENTE'];
                }



                echo '<br>Paciente: ' . $nombre_cliente;

                ?>


            </div>


            <!-- /.col -->
        </div>
        <!-- info row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped" border="1">
                    <thead>
                        <tr style="background: #A4A4A4;">
                            <th colspan="6" style="text-align: center;width: 100%">Historia Odontologia</th>
                        </tr>

                        <thead>
                            <thead>
                                <tr style="background: #A4A4A4">
                                    <th>Fecha / Hora</th>
                                    <th>Doctor</th>
                                    <th>Motivo consulta </th>
                                    <th>Diagnostico Premiliar</th>
                                    <th>Diagnostico</th>
                                    <th>Tratamiento Sugerido</th>
                                </tr>
                            </thead>
                        <tbody>
                            <?php
                            // $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                            // $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where (usuario_id=$ID and '{$_SESSION['ID_principal']}') and cliente_id = $tipo");
                            // $nrowl = mysqli_num_rows($queryList);
                            // while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            //     $cliente_id = $rowMotorizado['cliente_id'];
                            //     $Fecha = $rowMotorizado['fecha'];
                            //     $motivoConsulta = $rowMotorizado['EnfermedadActual'];
                            //     $diagnostico1 = funcionMaster($rowMotorizado['CIE10_1'], 'codigo', 'descripcion', 'cie10');
                            //     $diagnostico2 = funcionMaster($rowMotorizado['CIE10_2'], 'codigo', 'descripcion', 'cie10');
                            //     $diagnostico3 = funcionMaster($rowMotorizado['CIE10_3'], 'codigo', 'descripcion', 'cie10');
                            //     $diagnostico4 = funcionMaster($rowMotorizado['CIE10_4'], 'codigo', 'descripcion', 'cie10');
                            //     $cie101 = $rowMotorizado['CIE10_1'];
                            //     $cie102 = $rowMotorizado['CIE10_2'];
                            //     $cie103 = $rowMotorizado['CIE10_3'];
                            //     $cie104 = $rowMotorizado['CIE10_4'];
                            //     //unir los 4 diagnosticos separados con ,
                            //     $diagnostico = $diagnostico1 . ', ' . $diagnostico2 . ', ' . $diagnostico3 . ', ' . $diagnostico4;
                            //     //trim ,
                            //     $diagnosticos = trim($diagnostico, ', ');

                            //     $cie10 = $cie101 . ', ' . $cie102 . ', ' . $cie103 . ', ' . $cie104;
                            //     $cie10 = trim($cie10, ', ');
                            $queryHistoriaOndodoncia = ("SELECT * FROM historia_1_historiadeodontologia94374718321 where (usuario_id= $ID and '{$_SESSION['ID_principal']}') and cliente_id = $idCliente");
                            $queryHOresult = mysqli_query($conn3, $queryHistoriaOndodoncia);
                            while ($rowMotorizado = mysqli_fetch_assoc($queryHOresult)) {
                                $fecha = $rowMotorizado['Fecha'];
                                $motivoConsulta = $rowMotorizado['x88458376519'];
                                $diagnostico = $rowMotorizado['x83238713857'];
                                $diagnosticoPreliminar = $rowMotorizado['x99586119354'];
                                $tratamientoRecomendado = $rowMotorizado['x25623118433'];
                                $doctor = $rowMotorizado['usuario_id'];
                                $doctor = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                




                                echo "<tr>
         
       
         <td>$fecha</td>
        <td>$doctor</td>
        <td>$motivoConsulta </td>
        <td>$diagnosticoPreliminar </td>
        <td>$diagnostico </td>
        <td>$tratamientoRecomendado </td>
        
    </tr>";
                            }

                            ?>
                            <thead>
                                <tr style="background: #A4A4A4;">
                                    <th colspan="6" style="text-align: center;width: 100%">Historia Periodoncia</th>
                                </tr>

                                <thead>
                                    <tr style="background: #A4A4A4">
                                        <th>Fecha / Hora</th>
                                        <th>Doctor</th>
                                        <th>Diagnostico Periodoncial </th>
                                        <th>Diagnostico Endodoncial</th>
                                        <th>Pronostico General</th>
                                        <th>Fase de Mantenimiento</th>
                                    </tr>
                                    <?php
                                    $queryHistoriaOndodoncia = ("SELECT * FROM historia_1_historiadeperiodoncia66280610178 where (usuario_id= $ID and '{$_SESSION['ID_principal']}') and cliente_id = $idCliente");
                                    $queryHOresult = mysqli_query($conn3, $queryHistoriaOndodoncia);
                                    while ($rowMotorizado = mysqli_fetch_assoc($queryHOresult)) {
                                        $fecha = $rowMotorizado['Fecha'];
                                        $diagnosticoPeriodncial = $rowMotorizado['x67825498974'];
                                        $diagnosticoEdodoncio = $rowMotorizado['x9541429376'];
                                        $PronosticoGeneral = $rowMotorizado['x96674125098'];
                                        $fasedeManteminiento = $rowMotorizado['x46198994132'];
                                        $doctor = $rowMotorizado['usuario_id'];
                                $doctor = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');




    echo "<tr>
        
        
        <td>$fecha</td>
        <td>$doctor</td>
        <td>$diagnosticoPeriodncial </td>
        <td>$diagnosticoEdodoncio </td>
        <td>$PronosticoGeneral </td>
        <td>$fasedeManteminiento </td>
        
    </tr>";
                                    }
                                    ?>
                            <thead>
                                <tr style="background: #A4A4A4;">
                                    <th colspan="6" style="text-align: center;width: 100%">Historia Ondodoncia</th>
                                </tr>

                                <thead>
                                    <tr style="background: #A4A4A4">
                                        <th>Fecha / Hora</th>
                                        <th>Doctor</th>
                                        <th>Examen Clinico </th>
                                        <th>Examen Radiografico</th>
                                        <th>Diagnostico Definitivo</th>
                                        <th>Fase de Mantenimiento</th>
                                    </tr>
                                    <?php
                                    $queryHistoriaOndodoncia = ("SELECT * FROM historia_1_historiadeendodoncia87480223521 where (usuario_id= $ID and '{$_SESSION['ID_principal']}') and cliente_id = $idCliente");
                                    $queryHOresult = mysqli_query($conn3, $queryHistoriaOndodoncia);
                                    while ($rowMotorizado = mysqli_fetch_assoc($queryHOresult)) {
                                        $examenClinico = $rowMotorizado['x35242259426'];
                                        $examenRadiografico = $rowMotorizado['x4096240514'];
                                        $fecha = $rowMotorizado['Fecha'];
                                        $diagnosticoPeriodncial = $rowMotorizado['x67825498974'];
                                        $diagnosticoEdodoncio = $rowMotorizado['x9541429376'];
                                        $diagnosticoDefinitivo = $rowMotorizado['x32876609438'];
                                        $pronostico = $rowMotorizado['x41787033598'];
                                        $doctor = $rowMotorizado['usuario_id'];
                                        $doctor = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');




    echo "<tr>
        
        
        <td>$fecha</td>
        <td>$doctor</td>
        <td>$examenClinico </td>
        <td>Carama pulpar: $examenRadiografico </td>
        <td>$diagnosticoDefinitivo </td>
        <td>$pronostico </td>
        
    </tr>";
                                    }

?>



                        </tbody>
                </table>




            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->


        <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>

    </html>
<?
} elseif ($_POST['buttonSubmit'] == 'excel') {
    header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
    header('Content-Disposition: attachment; filename=ReporteHistoria' . date("Y-m-d") . '.xls');
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

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    </head>

    <body>
        <!-- Main content -->
        <div class="row no-print">
            <div class="col-xs-12">
                <a href="<?php echo $Base; ?>Reportespacientes" class="btn btn-default"> Regresar</a>
                <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
                    Imprimir</a>
            </div>
        </div>
        <!-- title row -->
        <div class="row">
            <div class="col-xs-12">
                <h2 class="page-header">
                    <?php echo $Logo ?> <?php echo $empresaNombre ?>
                    <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>

            <div class="col-xs-12">

                <?php
                $queryListc = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$tipo");
                $nrowl = mysqli_num_rows($queryListc);
                while ($rowc = mysqli_fetch_array($queryListc)) {
                    $nombre_cliente = $rowc['nombre_cliente'];
                    $CODI_CLIENTE = $rowc['CODI_CLIENTE'];
                }



                echo '<br>Paciente: ' . $nombre_cliente;

                ?>


            </div>


            <!-- /.col -->
        </div>
        <!-- info row -->

        <!-- Table row -->
        <div class="row">
            <div class="col-xs-12 table-responsive">
                <table class="table table-striped" border="1">
                    <thead>
                        <tr style="background: #A4A4A4">
                            <th>Fecha / Hora</th>
                            <th>Motivo consulta </th>
                            <th>Diagnostico Premiliar</th>
                            <th>Diagnostico</th>
                            <th>Tratamiento Sugerido</th>


                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $queryHistoriaOndodoncia = ("SELECT * FROM historia_1_historiadeodontologia94374718321 where (usuario_id= $ID and '{$_SESSION['ID_principal']}') and cliente_id = $idCliente");
                        $queryHOresult = mysqli_query($conn3, $queryHistoriaOndodoncia);
                        while ($rowMotorizado = mysqli_fetch_assoc($queryHOresult)) {
                            $fecha = $rowMotorizado['Fecha'];
                            $motivoConsulta = $rowMotorizado['x88458376519'];
                            $diagnostico = $rowMotorizado['x83238713857'];
                            $diagnosticoPreliminar = $rowMotorizado['x99586119354'];
                            $tratamientoRecomendado = $rowMotorizado['x25623118433'];
                            $doctor = $rowMotorizado['usuario_id'];
                            $doctor = funcionMaster($doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                            // $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                            // $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where (usuario_id=$ID and '{$_SESSION['ID_principal']}') and cliente_id = $tipo");
                            // $nrowl = mysqli_num_rows($queryList);
                            // while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            //     $cliente_id = $rowMotorizado['cliente_id'];
                            //     $Fecha = $rowMotorizado['fecha'];
                            //     $motivoConsulta = $rowMotorizado['EnfermedadActual'];
                            //     $diagnostico1 = funcionMaster($rowMotorizado['CIE10_1'], 'codigo', 'descripcion', 'cie10');
                            //     $diagnostico2 = funcionMaster($rowMotorizado['CIE10_2'], 'codigo', 'descripcion', 'cie10');
                            //     $diagnostico3 = funcionMaster($rowMotorizado['CIE10_3'], 'codigo', 'descripcion', 'cie10');
                            //     $diagnostico4 = funcionMaster($rowMotorizado['CIE10_4'], 'codigo', 'descripcion', 'cie10');
                            //     $cie101 = $rowMotorizado['CIE10_1'];
                            //     $cie102 = $rowMotorizado['CIE10_2'];
                            //     $cie103 = $rowMotorizado['CIE10_3'];
                            //     $cie104 = $rowMotorizado['CIE10_4'];
                            //     //unir los 4 diagnosticos separados con ,
                            //     $diagnostico = $diagnostico1 . ', ' . $diagnostico2 . ', ' . $diagnostico3 . ', ' . $diagnostico4;
                            //     //trim ,
                            //     $diagnosticos = trim($diagnostico, ', ');

                            //     $cie10 = $cie101 . ', ' . $cie102 . ', ' . $cie103 . ', ' . $cie104;
                            //     $cie10 = trim($cie10, ', ');



                            echo "<tr>
         
       
       <td>$fecha</td>
        <td>$motivoConsulta </td>
        <td>$diagnosticoPreliminar </td>
        <td>$diagnostico </td>
        <td>$tratamientoRecomendado </td>
        
        
    </tr>";
                        }

                        ?>
                    </tbody>
                </table>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->


        <!-- /.row -->

        <!-- this row will not appear when printing -->


        <!-- /.content -->
        </div>
        <!-- ./wrapper -->
    </body>

    </html>

<? }
