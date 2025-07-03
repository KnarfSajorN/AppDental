<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['id'];

$queryList = mysqli_query($conn3, "SELECT * FROM  opracioninvheader where id = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idinvheader      = $rowMotorizado['id'];
  $usuario_id      = $rowMotorizado['usuario_id'];
  $fechaReg      = $rowMotorizado['fechaRegistro'];
  $tipoDoc = $rowMotorizado['tipoDoc'];
  $totalCosto = $rowMotorizado['totalCosto'];

    switch ($tipoDoc){
      case '3':
          $Tipo="Transferencia de Inventario";
          break;
    }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF = $rowMotorizado['nombreF'];
  $telefonoF = $rowMotorizado['telefonoF'];
  $direccionF = $rowMotorizado['direccionF'];
  $emailF = $rowMotorizado['emailF'];
  $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
  $licenciaF = $rowMotorizado['licenciaF'];
  $pieF = $rowMotorizado['pieF'];

  $LogoF               = $rowMotorizado['logoF'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img id="imagenlogo" src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
  }



  // Nuevos campos 


}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
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
  <link rel="stylesheet" href="css/Impresion/bootstrap-print.css" media="print">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>

<body onload="window.print();">
  <div class="wrapper">
    <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="">
        <div class="col-md-12">
          <h2 class="page-header">
            <?php echo $Logo ?> <?php echo $nombreF ?>
            <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-6 invoice-col">
          <h4>Datos de la Empresa</h4>
          <address>
            <strong>Nombre de la Empresa:</strong><?php echo $nombreF ?><br>
            <!-- Licencia: <strong> <?php echo $licenciaF ?></strong><br> -->
            <strong>NIT:</strong> <?php echo $nit ?><br>
            <strong>Dirección:</strong> <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
            <strong> Teléfono:</strong> <?php echo $telefonoF ?><br>
            <strong> Email:</strong> <?php echo $emailF ?>
          </address>
        </div>
        <!-- /.col -->

        <!-- /.col -->
        <div class="col-sm-6 invoice-col">
          <b>Entrada # 0000<?php echo $idinvheader ?></b><br>
          <b>Fecha:</b><?php echo $fechaReg ?><br>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Descripción</th>
                <th>
                  <div align="Right">Cantidad</div>
                </th>
                <th>
                  <div align="Right">Deposito Origen</div>
                <th>
                  <div align="Right">Deposito Destino </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

                //operacioninv (ususario_id, codigoProd, cantidad, tipo, fecha, estado, costo, precio,porcentaje, regalo
              $resultado = mysqli_query($conn3,"SELECT * FROM  operacioninv where   operacioninvheader_id = $idOperacion order by id");
              while ($fila = mysqli_fetch_array($resultado)) {
                //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                $Numero++;
                
                $codigoProd = $fila['codigoProd'];
                $cantidad   = $fila['cantidad'];
                $costo      = $fila['costo'];

                $costo_total = $costo * $cantidad;

                $Descripcion = $fila['Descripcion'];
                $MasDetalles = $fila['Mas_Detalles'];;
                if($MasDetalles!=""){
                  $Descripcion .= $MasDetalles;
                }

                $Deposito_Origen = funcionMaster($fila['Deposito_id_Origen'], 'id', 'descripcion', 'dep');
                $Deposito_Destino = funcionMaster($fila['Deposito_id_Destino'], 'id', 'descripcion', 'dep');

                echo '     <tr>
                  <td  width="10%">' . $Numero . ' </td>
                  <td width="40%">' . $Descripcion . ' </td>
                  <td width="5%"><div align="Right">' . $cantidad . '</div></td>
                  <td width="25%"><div align="Right">' . $Deposito_Origen . '</div></td>
                  <td width="25%"><div align="Right">' . $Deposito_Destino . '</div></td>
                 
                </tr>';
              }

              ?>


            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Tipo:</p>
          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?php echo $Tipo; ?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">


          <div class="table-responsive">

          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class='col-md-12'>

      </div>
      <div class="col-xs-12" align="center">
        <?php echo $pieF ?>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->

    </section>
    <!-- /.content -->
    <div class="clearfix"></div>
  </div>
  
  <style>

    @media print {
      .no-print {
        display: none;
      }
      /* arreglar que no quede el logo alargado */
      #imagenlogo{
        width: 18%;
      }
    }


  </style>
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