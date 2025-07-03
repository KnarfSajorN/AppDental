<?php
date_default_timezone_set('America/Bogota');

include ("funciones/funciones.php");
include ("funciones/conn3.php");

// si no hay post regresar a portada
if (!isset($_POST) || count($_POST) == 0) {
  echo '<script>location.href = "' . $Base . 'portada";</script>';
}



$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['tipo'];
$ID = $_POST['ID'];
$usuario_id = $ID;


$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;


$queryList = mysqli_query($conn3, "SELECT * FROM config where (ID_Usuario = $ID or ID_Usuario = '{$_SESSION['ID_principal']}')");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre = $rowMotorizado['nombreF'];
    $telefonoF = $rowMotorizado['telefonoF'];
    $direccionF = $rowMotorizado['direccionF'];

    $LogoF = $rowMotorizado['logoF'];

    if (strlen($LogoF) > 0) {
      $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
    }
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
  </head>

  <body>
    <!-- Main content -->
    <div class="row no-print">
      <div class="col-xs-12">
        <a href="<?php echo $Base ?>Reportescitas" class="btn btn-default"> Regresar</a>
        <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
          Imprimir</a>
      </div>
    </div>
    <!-- title row -->
    <?php
    /*
        <div>
           <small class="pull-right"> Fecha: <?php echo date("d-m-y")?></small>
      <div class="col-xs-12">
          <h2 class="page-header">
              <TABLE>
                  <TR>
                      <TD>
                          <div align="center"><?php echo $Logo?></div>
                      </TD>
                      <TD> <?php echo $empresaNombre?> <br>
                          <?php echo  'Teléfono: '.$telefonoF?><br><?php echo 'Dirección: '.$direccionF?></TD>
                  </TR>

              </TABLE>





          </h2>
      </div>

      <div class="col-xs-12">

          <?php echo 'Desde: '.$desde .'<br> Hasta:'.$hasta?>
          <?php
                if ($tipo <> 0) {
                 echo '<br>Estado: '.$Tipo;
                }
                elseif ($tipo == 0) {
                 echo '<br>Estado: Todos';
                }
                 ?>


      </div>


      <!-- /.col -->
      </div>
      <!-- info row -->*/ ?>
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <div style="display: initial;"><?php echo $Logo ?></div>
          <div style="display: inline-flex;font-size: 20px;top: -18px;position: relative;">
            <?php echo $empresaNombre ?> <br>
            <?php echo 'Teléfono: ' . $telefonoF ?><br><?php echo 'Dirección: ' . $direccionF ?>
          </div>
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
              <th>#</th>
              <th> Doctor </th>
              <th> Fecha - Hora </th>
              <th> Paciente </th>
              <th> Telefono </th>
              <th> Correo </th>
              <th width="20%"> Motivo </th>
              <th> Estado </th>



            </tr>
          </thead>
          <tbody>
            <?php

            if ($tipo == 0) {
              $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = $usuario_id or usuario_id = '{$_SESSION['ID_principal']}') and fecha BETWEEN '$desde' and '$hasta' order by fecha asc ");
            } elseif ($tipo <> 0) {
              $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = $usuario_id or usuario_id = '{$_SESSION['ID_principal']}') and estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
            }



            while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
              //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>
              $Numero++;


              $estadoD = $fila[8];

              if ($estadoD == 0) {
                $Estado = '<font color="#FF0000"> <strong> En espera de actualización </strong></font>';
                $EstadoN3++;
              } elseif ($estadoD == 1) {
                $Estado = '<font color="#FF6600"> <strong>  Por Confirmar</strong> </font>';
                $EstadoN0++;
              } elseif ($estadoD == 2) {
                $Estado = '<font color="#006600"><strong> Confirmado </strong></font>';
                $EstadoN1++;
              } elseif ($estadoD == 3) {
                $Estado = '<font color="#0000FF"> <strong>Asistió </strong></font>';
                $EstadoN2++;
              } elseif ($estadoD == 4) {
                $Estado = '<font color="#FF0000"> <strong>No Asistió </strong></font>';
                $EstadoN3++;
              } elseif ($estadoD == 99) {
                $Estado = '<font color="#FF0000"> <strong>No autorizada </strong></font>';
                $EstadoN3++;
              }
              $botonesEstado = [
                "1" => "Reservada",
                "2" => "Confirmada",
                "3" => "Asistida",
                "4" => "No pudo Asistir",
                "5" => "Cita Cancelada",
                "6" => "Pendiente",
                "7" => "En Espera"
              ];
              $botones = [
                "1" => "<i class='fa fa-circle' style='color: rgb(119, 208, 250)'></i>",
                "2" => "<i class='fa fa-circle' style='color: rgb(236, 190, 81)'></i>",
                "3" => "<i class='fa fa-circle' style='color: rgb(250, 181, 251);'></i>",
                "4" => "<i class='fa fa-circle' style='color: rgb(251, 193, 179);'></i>",
                "5" => "<i class='fa fa-circle' style='color: rgb(40 40 40)'></i>",
                "6" => "<i class='fa fa-circle' style='color: rgb(253, 137, 145)'></i>",
                "7" => "<i class='fa fa-circle' style='color: rgb(182, 237, 128)'></i>"
              ];

              $Motivos_Consulta = funcionMaster($fila[7], 'id', 'descripcion', 'Motivos_Consulta');

              echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="20%">' . funcionMaster($fila[1], 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' </td>
                  <td width="10%">' . $fila[2] . '-' . $fila[3] . ' </td>
                  <td width="20%">' . $fila[4] . '  </td>
                  <td width="10%">' . $fila[5] . '  </td>
                  <td width="20%">' . $fila[6] . ' </td>
                  <td width="20%">' . $Motivos_Consulta . ' </td>
                  <td width="10%">' . $botonesEstado[$estadoD] . " - " . $botones[$estadoD] . ' </td>
                 
                </tr>';
            }

            ?>


          </tbody>
        </table>

        <div>
          <!-- accepted payments column -->

          <hr>

          <div class="col-xs-12">
            <h3> Resumen </h3>
          </div>


          <div class="col-xs-3">
            <strong> Por Confirmar : <?php echo $EstadoN0 ?> </strong>
          </div>
          <div class="col-xs-3">
            <strong> Confirmado: <?php echo $EstadoN1 ?></strong>
          </div>
          <div class="col-xs-3">
            <strong> Asistio :<?php echo $EstadoN2 ?></strong>
          </div>
          <div class="col-xs-3">
            <strong> No Asistio: <?php echo $EstadoN3 ?></strong>
          </div>

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
  header('Content-Disposition: attachment; filename=ReporteAgenda' . date("Y-m-d") . '.xls');
  ?><!DOCTYPE html>
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
        <a href="<?php echo $Base ?>Reportescitas" class="btn btn-default"> Regresar</a>
        <a href='javascript:window.print(); void 0;' class="btn btn-default"><i class="fa fa-print"></i>
          Imprimir</a>
      </div>
    </div>
    <!-- title row -->
    <?php
    /*
        <div>
           <small class="pull-right"> Fecha: <?php echo date("d-m-y")?></small>
      <div class="col-xs-12">
          <h2 class="page-header">
              <TABLE>
                  <TR>
                      <TD>
                          <div align="center"><?php echo $Logo?></div>
                      </TD>
                      <TD> <?php echo $empresaNombre?> <br>
                          <?php echo  'Teléfono: '.$telefonoF?><br><?php echo 'Dirección: '.$direccionF?></TD>
                  </TR>

              </TABLE>





          </h2>
      </div>

      <div class="col-xs-12">

          <?php echo 'Desde: '.$desde .'<br> Hasta:'.$hasta?>
          <?php
                if ($tipo <> 0) {
                 echo '<br>Estado: '.$Tipo;
                }
                elseif ($tipo == 0) {
                 echo '<br>Estado: Todos';
                }
                 ?>


      </div>


      <!-- /.col -->
      </div>
      <!-- info row -->*/ ?>
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <div style="display: initial;"><?php echo $Logo ?></div>
          <div style="display: inline-flex;font-size: 20px;top: -18px;position: relative;">
            <?php echo $empresaNombre ?> <br>
            <?php echo 'Teléfono: ' . $telefonoF ?><br><?php echo 'Dirección: ' . $direccionF ?>
          </div>
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
              <th>#</th>
              <th> Doctor </th>
              <th> Fecha - Hora </th>
              <th> Paciente </th>
              <th> Telefono </th>
              <th> Correo </th>
              <th width="20%"> Motivo </th>
              <th> Estado </th>



            </tr>
          </thead>
          <tbody>
            <?php

            if ($tipo == 0) {
              $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = $usuario_id or usuario_id = '{$_SESSION['ID_principal']}') and fecha BETWEEN '$desde' and '$hasta' order by fecha asc ");
            } elseif ($tipo <> 0) {
              $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where (usuario_id = $usuario_id or usuario_id = '{$_SESSION['ID_principal']}') and estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
            }



            while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
              //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>
              $Numero++;


              $estadoD = $fila[8];

              if ($estadoD == 0) {
                $Estado = '<font color="#FF0000"> <strong> En espera de actualización </strong></font>';
                $EstadoN3++;
              } elseif ($estadoD == 1) {
                $Estado = '<font color="#FF6600"> <strong>  Por Confirmar</strong> </font>';
                $EstadoN0++;
              } elseif ($estadoD == 2) {
                $Estado = '<font color="#006600"><strong> Confirmado </strong></font>';
                $EstadoN1++;
              } elseif ($estadoD == 3) {
                $Estado = '<font color="#0000FF"> <strong>Asistió </strong></font>';
                $EstadoN2++;
              } elseif ($estadoD == 4) {
                $Estado = '<font color="#FF0000"> <strong>No Asistió </strong></font>';
                $EstadoN3++;
              } elseif ($estadoD == 99) {
                $Estado = '<font color="#FF0000"> <strong>No autorizada </strong></font>';
                $EstadoN3++;
              }
              $botonesEstado = [
                "1" => "Reservada",
                "2" => "Confirmada",
                "3" => "Asistida",
                "4" => "No pudo Asistir",
                "5" => "Cita Cancelada",
                "6" => "Pendiente",
                "7" => "En Espera"
              ];
              $botones = [
                "1" => "<i class='fa fa-circle' style='color: rgb(119, 208, 250)'></i>",
                "2" => "<i class='fa fa-circle' style='color: rgb(236, 190, 81)'></i>",
                "3" => "<i class='fa fa-circle' style='color: rgb(250, 181, 251);'></i>",
                "4" => "<i class='fa fa-circle' style='color: rgb(251, 193, 179);'></i>",
                "5" => "<i class='fa fa-circle' style='color: rgb(40 40 40)'></i>",
                "6" => "<i class='fa fa-circle' style='color: rgb(253, 137, 145)'></i>",
                "7" => "<i class='fa fa-circle' style='color: rgb(182, 237, 128)'></i>"
              ];

              $Motivos_Consulta = funcionMaster($fila[7], 'id', 'descripcion', 'Motivos_Consulta');

              echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="20%">' . funcionMaster($fila[1], 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' </td>
                  <td width="10%">' . $fila[2] . '-' . $fila[3] . ' </td>
                  <td width="20%">' . $fila[4] . '  </td>
                  <td width="10%">' . $fila[5] . '  </td>
                  <td width="20%">' . $fila[6] . ' </td>
                  <td width="20%">' . $Motivos_Consulta . ' </td>
                  <td width="10%">' . $botonesEstado[$estadoD] . " - " . $botones[$estadoD] . ' </td>
                 
                </tr>';
            }

            ?>


          </tbody>
        </table>

        <div>
          <!-- accepted payments column -->

          <hr>

          <div class="col-xs-12">
            <h3> Resumen </h3>
          </div>


          <div class="col-xs-3">
            <strong> Por Confirmar : <?php echo $EstadoN0 ?> </strong>
          </div>
          <div class="col-xs-3">
            <strong> Confirmado: <?php echo $EstadoN1 ?></strong>
          </div>
          <div class="col-xs-3">
            <strong> Asistio :<?php echo $EstadoN2 ?></strong>
          </div>
          <div class="col-xs-3">
            <strong> No Asistio: <?php echo $EstadoN3 ?></strong>
          </div>

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
  </div>
<?
}
?>