<?php
include ("funciones/funciones.php");
include ("funciones/conn3.php");
session_start();
$desde = $_POST['desde'] . ' 00:00:00';
$hasta = $_POST['hasta'] . ' 23:59:59';

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

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
                    <?php echo $Logo ?>     <?php echo $empresaNombre ?>
                    <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>

            <div class="col-xs-12">

                <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
                <?php
                if ($tipo <> 0) {
                    echo '<br>Estado: ' . $Tipo;
                } elseif ($tipo == 0) {
                    echo '<br>Estado: Todos';
                }
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
                            <th>Documento Cliente</th>
                            <th>Nombre Cliente</th>
                            <th>Correo </th>
                            <th>Whatsapp </th>
                            <th>Motivo de consulta </th>
                            <th>Diagnostico</th>
                            <th>Toma medicamentos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                        $table= 'historia_1_historiadeodontologia94374718321';
                        if ($tipo == 0) {
                            $queryList = mysqli_query($conn3, "SELECT * FROM  $table where (usuario_id=$ID or usuario_id='{$_SESSION['ID_principal']}') and (fecha BETWEEN '$desde' and '$hasta') ");
                        } elseif ($tipo <> 0) {
                            $queryList = mysqli_query($conn3, "SELECT * FROM  $table where  (usuario_id=$ID or usuario_id='{$_SESSION['ID_principal']}') and cliente_id=$tipo and (fecha BETWEEN '$desde' and '$hasta') ");
                        }

                        while ($rowhistoria = mysqli_fetch_array($queryList)) {
                            $id_historia = $rowhistoria['id'];
                            $cliente_id = $rowhistoria['cliente_id'];
                            $EnfermedadActual = $rowhistoria['EnfermedadActual'];
                            $fecha = $rowhistoria['fecha'];
                            $motivodeConsulta = $rowhistoria['x88458376519'];
                            $diagnostico = $rowhistoria['x83238713857'];

                            $RowCliente = mysqli_query($conn3, "SELECT * FROM  cliente where  cliente_id=$cliente_id  ");
                            while ($rowMotorizado = mysqli_fetch_array($RowCliente)) {
                                $cliente_id = $rowMotorizado['CODI_CLIENTE'];
                                $nombre_cliente = $rowMotorizado['nombre_cliente'];
                                $correo_cliente = $rowMotorizado['correo_cliente'];
                                $whatsapp = $rowMotorizado['whatsapp'];
                                $tiposSangre = $rowMotorizado['tiposSangre'];
                                $esDonante = $rowMotorizado['esDonante'];
                                $tomaMedicamento = $rowMotorizado['tomaMedicamento'];
                                $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];


                                echo "<tr>
          <td>$cliente_id</td>
          <td>$nombre_cliente</td>
          <td>$correo_cliente </td>       
          <td>$whatsapp </td>
          <td>$motivodeConsulta </td>
          <td>$diagnostico </td>
          <td>$tomaMedicamento </td>       
      </tr>";

                            }


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
    header('Content-Disposition: attachment; filename=ReportePacienHC' . date("Y-m-d") . '.xls');
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
                    <?php echo $Logo ?>     <?php echo $empresaNombre ?>
                    <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
                </h2>
            </div>

            <div class="col-xs-12">

                <?php echo 'Desde: ' . $desde . '<br> Hasta:' . $hasta ?>
                <?php
                if ($tipo <> 0) {
                    echo '<br>Estado: ' . $Tipo;
                } elseif ($tipo == 0) {
                    echo '<br>Estado: Todos';
                }
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
                            <th>Documento Cliente</th>
                            <th>Nombre Cliente</th>
                            <th>Correo </th>
                            <th>Whatsapp </th>
                            <th>Tipos sangre </th>
                            <th>Donante</th>
                            <th>Toma medicamentos</th>
                            <th>Modulo Enfermedad Actual </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                        if ($tipo == 0) {
                            $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where (usuario_id=$ID or usuario_id='{$_SESSION['ID_principal']}') and (fecha BETWEEN '$desde' and '$hasta') ");
                        } elseif ($tipo <> 0) {
                            $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where  (usuario_id=$ID or usuario_id='{$_SESSION['ID_principal']}') and cliente_id=$tipo and (fecha BETWEEN '$desde' and '$hasta') ");
                        }

                        while ($rowhistoria = mysqli_fetch_array($queryList)) {
                            $id_historia = $rowhistoria['id'];
                            $cliente_id = $rowhistoria['cliente_id'];
                            $EnfermedadActual = $rowhistoria['EnfermedadActual'];
                            $fecha = $rowhistoria['fecha'];

                            $RowCliente = mysqli_query($conn3, "SELECT * FROM  cliente where  cliente_id=$cliente_id  ");
                            while ($rowMotorizado = mysqli_fetch_array($RowCliente)) {
                                $cliente_id = $rowMotorizado['CODI_CLIENTE'];
                                $nombre_cliente = $rowMotorizado['nombre_cliente'];
                                $correo_cliente = $rowMotorizado['correo_cliente'];
                                $whatsapp = $rowMotorizado['whatsapp'];
                                $tiposSangre = $rowMotorizado['tiposSangre'];
                                $esDonante = $rowMotorizado['esDonante'];
                                $tomaMedicamento = $rowMotorizado['tomaMedicamento'];
                                $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];


                                echo "<tr>
          <td>$cliente_id</td>
          <td>$nombre_cliente</td>
          <td>$correo_cliente </td>       
          <td>$whatsapp </td>
          <td>$tiposSangre </td>
          <td>$esDonante </td>
          <td>$tomaMedicamento </td>
          <td>$EnfermedadActual </td>          
      </tr>";

                            }


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
}
?>