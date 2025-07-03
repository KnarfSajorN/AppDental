<?php
date_default_timezone_set('America/Bogota');

include ("funciones/conn3.php");
include ("funciones/funciones.php");


$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
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
  $telefonoF = $rowMotorizado['telefonoF'];
  $direccionF = $rowMotorizado['direccionF'];

  $LogoF = $rowMotorizado['logoF'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="155" width="155">';
  }
}




if ($_POST['submitButton'] == 'generar') {
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
    <style>
      .pull-right {
        margin-right: 20px;
      }
    </style>
  </head>

  <body>
    <!-- Main content -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="<?php echo $Base ?>Reportespacientes" class="btn btn-default"> Regresar</a>
        <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
      </div>
    </div>
    <!-- title row -->
    <div class="row">
      <!--<small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>-->
      <div class="col-xs-12">
        <h2 class="page-header" style="border: unset!important;">
          <?php echo $Logo ?>   <?php echo $empresaNombre ?>
          <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
        </h2>
      </div>
      <!--<div style="display: initial;"><?php echo $Logo ?></div>-->
      <!--<div style="display: inline-flex;font-size: 20px;top: -18px;position: relative;"><?php echo $empresaNombre ?> <br> <?php echo 'Teléfono: ' . $telefonoF ?><br><?php echo 'Dirección: ' . $direccionF ?></div>-->

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

        <?php

        $botonesEstado = [
          "1" => "Reservada",
          "2" => "Confirmada",
          "3" => "Asistida",
          "4" => "No pudo Asistir",
          "5" => "Cita Cancelada",
          "6" => "Pendiente",
          "7" => "En Espera"
        ];

        $Reservada = 0;

        $Confirmada = 0;

        $Asistida = 0;

        $NoPudoAsistir = 0;

        $CitaCancelada = 0;

        $Pendiente = 0;

        $EnEspera = 0;

        if ($tipo == 0) {
          $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = '{$ID}' or usuario_id = '{$_SESSION['ID_principal']}')  AND  (fecha BETWEEN '$desde' and '$hasta') order by fecha asc ");
          //echo "SELECT * FROM  citas  where (usuario_id = '{$ID}' or usuario_id = '{$_SESSION['ID_principal']}')  AND ( fecha BETWEEN '$desde' and '$hasta') order by fecha asc ";
        } elseif ($tipo <> 0) {
          $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = '{$ID}' or usuario_id = '{$_SESSION['ID_principal']}')  AND estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
        }

        while ($fila = mysqli_fetch_array($resultado)) {
          //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>
          $Numero++;


          $estadoD = $fila['estado'];

          switch ($estadoD) {
            case '1':
              $Reservada++;
              break;
            case '2':
              $Confirmada++;
              break;
            case '3':
              $Asistida++;
              break;
            case '4':
              $NoPudoAsistir++;
              break;
            case '5':
              $CitaCancelada++;
              break;
            case '6':
              $Pendiente++;
              break;
            case '7':
              $EnEspera++;
              break;
            default:
          }
        }

        ?>


        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" border="1">
              <thead>
                <tr style="background: #A4A4A4">
                  <th>Estado</th>
                  <th>Cantidad </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Reservada</td>
                  <td><?php echo $Reservada ?></td>
                </tr>
                <tr>
                  <td>Confirmada</td>
                  <td><?php echo $Confirmada ?></td>
                </tr>
                <tr>
                  <td>Asistida</td>
                  <td><?php echo $Asistida ?></td>
                </tr>
                <tr>
                  <td>No pudo Asistir</td>
                  <td><?php echo $NoPudoAsistir ?></td>
                </tr>
                <tr>
                  <td>Cita Cancelada</td>
                  <td><?php echo $CitaCancelada ?></td>
                </tr>
                <tr>
                  <td>Pendiente</td>
                  <td><?php echo $Pendiente ?></td>
                </tr>
                <tr>
                  <td>En Espera</td>
                  <td><?php echo $EnEspera ?></td>
                </tr>

              </tbody>
            </table>




          </div>
          <!-- /.col -->
        </div>

        <div>
          <!-- accepted payments column -->

          <hr>



        </div>


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
} elseif ($_POST['submitButton'] == 'excel') {
  header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
  header('Content-Disposition: attachment; filename=ReporteEstadoCita_' . date("Y-m-d") . '.xls')

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
    <style>
      .pull-right {
        margin-right: 20px;
      }
    </style>
  </head>

  <body>
    <!-- Main content -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="<?php echo $Base ?>Reportespacientes" class="btn btn-default"> Regresar</a>
        <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
      </div>
    </div>
    <!-- title row -->
    <div class="row">
      <!--<small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>-->
      <div class="col-xs-12">
        <h2 class="page-header" style="border: unset!important;">
          <?php echo $Logo ?>   <?php echo $empresaNombre ?>
          <small class="pull-right"> Fecha: <?php echo date("d-m-y") ?></small>
        </h2>
      </div>
      <!--<div style="display: initial;"><?php echo $Logo ?></div>-->
      <!--<div style="display: inline-flex;font-size: 20px;top: -18px;position: relative;"><?php echo $empresaNombre ?> <br> <?php echo 'Teléfono: ' . $telefonoF ?><br><?php echo 'Dirección: ' . $direccionF ?></div>-->

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

        <?php

        $botonesEstado = [
          "1" => "Reservada",
          "2" => "Confirmada",
          "3" => "Asistida",
          "4" => "No pudo Asistir",
          "5" => "Cita Cancelada",
          "6" => "Pendiente",
          "7" => "En Espera"
        ];

        $Reservada = 0;

        $Confirmada = 0;

        $Asistida = 0;

        $NoPudoAsistir = 0;

        $CitaCancelada = 0;

        $Pendiente = 0;

        $EnEspera = 0;

        if ($tipo == 0) {
          $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = '{$ID}' or usuario_id = '{$_SESSION['ID_principal']}')  AND  (fecha BETWEEN '$desde' and '$hasta') order by fecha asc ");
          //echo "SELECT * FROM  citas  where (usuario_id = '{$ID}' or usuario_id = '{$_SESSION['ID_principal']}')  AND ( fecha BETWEEN '$desde' and '$hasta') order by fecha asc ";
        } elseif ($tipo <> 0) {
          $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = '{$ID}' or usuario_id = '{$_SESSION['ID_principal']}')  AND estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
        }

        while ($fila = mysqli_fetch_array($resultado)) {
          //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>
          $Numero++;


          $estadoD = $fila['estado'];

          switch ($estadoD) {
            case '1':
              $Reservada++;
              break;
            case '2':
              $Confirmada++;
              break;
            case '3':
              $Asistida++;
              break;
            case '4':
              $NoPudoAsistir++;
              break;
            case '5':
              $CitaCancelada++;
              break;
            case '6':
              $Pendiente++;
              break;
            case '7':
              $EnEspera++;
              break;
            default:
          }
        }

        ?>


        <!-- Table row -->
        <div class="row">
          <div class="col-xs-12 table-responsive">
            <table class="table table-striped" border="1">
              <thead>
                <tr style="background: #A4A4A4">
                  <th>Estado</th>
                  <th>Cantidad </th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Reservada</td>
                  <td><?php echo $Reservada ?></td>
                </tr>
                <tr>
                  <td>Confirmada</td>
                  <td><?php echo $Confirmada ?></td>
                </tr>
                <tr>
                  <td>Asistida</td>
                  <td><?php echo $Asistida ?></td>
                </tr>
                <tr>
                  <td>No pudo Asistir</td>
                  <td><?php echo $NoPudoAsistir ?></td>
                </tr>
                <tr>
                  <td>Cita Cancelada</td>
                  <td><?php echo $CitaCancelada ?></td>
                </tr>
                <tr>
                  <td>Pendiente</td>
                  <td><?php echo $Pendiente ?></td>
                </tr>
                <tr>
                  <td>En Espera</td>
                  <td><?php echo $EnEspera ?></td>
                </tr>

              </tbody>
            </table>




          </div>
          <!-- /.col -->
        </div>

        <div>
          <!-- accepted payments column -->

          <hr>



        </div>


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