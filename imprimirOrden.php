<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['idOperacion'];


$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
  //$subTotal      =$rowMotorizado['subTotal'];
  //$impuesto      = $rowMotorizado['impuesto'];
  $impuestoBase = $rowMotorizado['impuestoBase'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $montoPagado      = $rowMotorizado['montoPagado'];
  $nota_factura      = $rowMotorizado['nota'];
  $ID_Empresa      = $rowMotorizado['ID_Empresa'];
}
$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion and tipo = '3'");
// echo "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion and tipo = '1'";
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $id_usuario      = $rowMotorizado['id_usuario'];
  $id_cliente      = $rowMotorizado['id_cliente'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $metodo_pago      = $rowMotorizado['metodo_pago'];
  $nota_pago      = $rowMotorizado['nota_pago'];
  $tipo      = $rowMotorizado['tipo'];;
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
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
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
  }



  // Nuevos campos 
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}


$queryList=mysqli_query($conn3,"SELECT * FROM  sproveedores where id = '$ID_Empresa'");
// echo "SELECT * FROM  sproveedores where id = '$ID_Empresa'";

$nrowl=mysqli_num_rows($queryList);

while($rowMotorizado=mysqli_fetch_array($queryList))

{

    $nombre = $rowMotorizado['nombre'];
    $rut = $rowMotorizado['rut'];
    $correo = $rowMotorizado['correo'];

    $direccion = $rowMotorizado['direccion'];
    $telefono = $rowMotorizado['telefono'];
    $vendedor = $rowMotorizado['vendedor'];
    $nota = $rowMotorizado['nota'];
   $idE = $rowMotorizado['id'];

}


// if ($montoPagado == 0) {
//   $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
// }

?>


<?php
$_GET['validar'] = $rut;
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
<style>
  body {
    -webkit-print-color-adjust: exact !important;
    print-color-adjust: exact !important;
  }
</style>
<body >

  <div class="wrapper">
    <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
            <?php echo $Logo ?> <?php echo $nombreF ?>
            <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          <h4>Datos de la Empresa</h4>
          <address>
            <strong>Nombre de la Empresa: </strong><?php echo $nombreF ?><br>
            <!-- Licencia: <strong> <?php echo $licenciaF ?></strong><br> -->
            <strong>NIT:</strong> <?php echo $nit ?><br>
            <strong>Dirección:</strong> <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
            <strong>Teléfono:</strong> <?php echo $telefonoF ?><br>
            <strong>Email:</strong> <?php echo $emailF ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
        <h4>Datos del Proveedor</h4>
        <address>

          <strong>Nombre: </strong> <?php echo $nombre ?><br>
          <strong>RUT:</strong> <?php echo $rut ?> <br>
          <strong>Dirección:</strong> <?php echo $direccion ?><br>
          <strong>Teléfono:</strong> <?php echo $telefono ?><br>
          <strong>Email: </strong> <?php echo $correo ?>
        </address>
      </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Factura # 0000<?php echo $idOperacion ?></b><br>
          <b>Fecha Factura:</b><?php echo $fechaOperacion ?><br>
          <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>

          <?php echo $pagado ?>
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
                <!-- <th>Referencia</th> -->

                <th>
                  <div align="Right">Cantidad</div>
                </th>
                <th>
                  <div align="Right">Precio</div>
                </th>
                <th>
                  <div align="Right">Descuento</div>
                </th>
                <th>
                  <div align="Right">Subtotal </div>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php

              $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where estado = 1 and id_usuario = $idEmpresa and idOperacion = $idOperacion order by id");
              while ($fila = mysqli_fetch_array($resultado)) {
                $Numero++;
              $Descuento = $fila['Descuento_Numerico'];

              $Descripcion = $fila['descripcion'];
              if($fila["Mas_Detalles"]!=""){
                $Descripcion.= ' '.$fila["Mas_Detalles"].'';
              }

              echo '     <tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td width="30%">' . $Descripcion . ' </td>
                  
                  <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($Descuento,2)  . '' . $moneda . '</div></td>
                  <td width="13%"><div align="Right">' . number_format($fila['subTotal'],2)  . '' . $moneda . '</div></td>
                 
                </tr>';

              $totalCant += $fila['cantidad'];
              $totalBase +=  $fila['base'];
              $total += $fila['subTotal'];
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

        <div class="col-xs-4">
          <p class="lead">Comentarios:</p>


          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
            <?php echo $nota_factura; ?>
          </p>
        </div>

        <div class="col-xs-4">
          <table class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>
                  <div>Método de Pago</div>
                </th>
                <th>
                  <div align="Right">Monto</div>
                </th>
                <th> </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php
                $ID = $_SESSION['ID'];
                $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE idOperacion = $idOperacion");
                $check = mysqli_num_rows($resultado);
                $totalMet = 0;

                while ($fila = mysqli_fetch_array($resultado)) {
                  $contador++;
                  $ruta = htmlentities($_SERVER['PHP_SELF']);

                  echo '<tr>
                      <td>' . $contador . '</td>
                      <td>' . $fila[5] . '</td>
                      <td><div align="Right">' . number_format($fila[6],2) . '' . $moneda . '</div></td>
                  </tr>';

                  $totalMet += $fila[6];
                  $saldo = $totalNeto - $totalMet;
                }



                // echo "El total es: " . $totalMet;
                ?>

              </tr>
            </tbody>
            <!-- <thead>
      <tr>
        <th></th>
        <th> <strong>
            <div align="Right"> Total </div>
          </strong>
        </th>
        <th>
          <div align="Right"><?php echo $totalMet . ' ' . $moneda; ?> </div>
        </th>



      </tr>

    </thead> -->

          </table>

        </div>

        <!-- /.col -->
        <div class="col-xs-4">


          <div class="table-responsive">
            <table class="table">
            <tr>
              <th style="width:50%">Precio Base:</th>
              <td> <?php echo number_format($totalBruto,2)  . '' . $moneda ?> </td>
            </tr>
            <tr>
              <th style="color:green">Descuento:</th>
              <td><?php echo number_format($descuentos,2) . '' . $moneda ?></td>
            </tr>
            <tr>
              <th style="width:50%">Subtotal:</th>
              <td> <?php echo number_format($totalBruto-$descuentos,2)  . '' . $moneda ?> </td>
            </tr>
            <tr>
              <th style="width:50%">IVA:</th>
              <td> <?php echo number_format( $impuestoBase/($totalBruto-$descuentos) * 100,2)  . '' . '%' ?> </td>
            </tr>
            


            <?php
            if ($impuestoBase > 0) {
              //$impuestoF2 = $impuestoF / 100;
              //$total1 =  $total * $impuestoF2;
              $total1 =  $impuestoBase;
              $total =  $total1 + $total;


            ?>

              <tr>
                <th style="width:50%">Impuesto:</th>
                <td> <?php echo number_format($total1,2) . '' . $moneda ?> </td>
              </tr>

            <?php
            } ?>
              <tr>
                <th>Total a Pagar:</th>
                <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
              </tr>

              <tr>
                <th>Pagado:</th>
                <td><?php echo number_format($totalMet,2) . '' . $moneda ?></td>
              </tr>
              <?php if ($totalMet == 0) { ?>
              <tr>
                <th style="color:red">Saldo:</th>
                <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
              </tr>
            <?php } else { ?>
              <tr>
                <th style="color:red">Saldo:</th>
                <td><?php echo number_format($saldo,2) . '' . $moneda ?></td>
              </tr>
            <?php } ?>

              <tr>
                <th>Total Factura:</th>
                <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
              </tr>
            </table>
          </div>
        </div>

        <!-- /.col -->
      </div>

      <div class="col-xs-12" align="center">
        <?php echo $pieF ?>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a onclick="window.print();" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>

          <!--
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
-->

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
</body>

</html>

<style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>