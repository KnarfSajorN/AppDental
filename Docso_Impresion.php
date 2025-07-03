<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['idOperacion'];

$QueryDocumento = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Operacion where idOperacion = $idOperacion");
while ($RowDocumento = mysqli_fetch_array($QueryDocumento)) {

    $usuario_id = $RowDocumento['usuario_id'];
    $proveedor_id = $RowDocumento['proveedor_id'];

    $TotalBruto = $RowDocumento['TotalBruto'];
    $Descuentos = $RowDocumento['Descuentos'];
    $SubTotal = $RowDocumento['SubTotal'];
    $ImpuestoBase = $RowDocumento['ImpuestoBase'];
    $TotalNeto = $RowDocumento['TotalNeto'];
    
    $Nota = $RowDocumento['Nota'];

    $FechaOperacion = $RowDocumento['FechaOperacion'];
    $FechaVencimiento = $RowDocumento['FechaVencimiento'];
    $FechaVenta = $RowDocumento['FechaVenta'];

    $NumeroDocumentoSoporte = $RowDocumento['NumeroDocumentoSoporte'];
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
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" style="height:3cm; width:auto;">';
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


if ($idClienteFac > 0){
  $idCliente_ = $idClienteFac;
}else{
  $idCliente_ = $idCliente;
}

$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$proveedor_id'");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_p = $rowMotorizado['nombre'];
    $rut_p = $rowMotorizado['rut'];
    $correo_p = $rowMotorizado['correo'];

    $direccion_p = $rowMotorizado['direccion'];
    $telefono_p = $rowMotorizado['telefono'];
}


// if ($montoPagado == 0) {
//   $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
// }

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
<body>

  <div class="wrapper">
    <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="">
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
                                    <div class="col-xs-4 invoice-col">
                                        <b>Empresa</b>
                                        <address>
                                            <br>
                                            <b> <?php echo $nombreF ?></b><br>
                                            <b>Licencia: </b> <?php echo $licenciaF ?><br>
                                            <b>Nit: </b><?php echo $nit ?><br>
                                            <b>Dirección: </b><?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
                                            <b>Teléfono: </b><?php echo $telefonoF ?><br>
                                            <b>Email: </b><?php echo $emailF ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-4 invoice-col">
                                        Proveedor
                                        <address>
                                            <br>
                                            <b><?php echo $nombre_p ?> </b><br>
                                            <b>Dirección: </b><?php echo $direccion_p ?><br>
                                            <b>RUT: </b><?php echo $rut_p ?><br>
                                            <b>Teléfono: </b><?php echo $telefono_p ?><br>
                                            <b>Correo: </b><?php echo $correo_p ?>
                                        </address>
                                    </div>
                                    <!-- /.col -->
                                    <div class="col-xs-4 invoice-col">
                                        <b>Documento Soporte # <?php echo $NumeroDocumentoSoporte ?></b><br>
                                        <br>

                                        <b>Fecha Operacion:</b><?php echo $FechaOperacion ?><br>
                                        <b>Fecha Vencimiento:</b> <?php echo $FechaVencimiento ?><br>
                                        <b>Fecha Venta:</b> <?php echo $FechaVenta ?><br>
                                    </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
            <hr>
        </div>
      </div>

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          
        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Descripción</th>

                                    <th>
                                        <div align="Right">Precio</div>
                                    </th>

                                    <th>
                                        <div align="Right">Cantidad</div>
                                    </th>
                                    <th>
                                        <div align="Right">SubTotal</div>
                                    </th>
                                    <th>
                                        <div align="center" style="color: blue;">Impuesto</div>
                                    </th>
                                    <th>
                                        <div align="Right">Total</div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <?php

                                    $ID = $_SESSION['ID'];
                                                                    
                                    $resultado = mysqli_query($conn3, "SELECT * FROM  DocumentoSoporte_Detalles where Estado = 1 and idOperacion = $idOperacion Order by id");
                                    while ($fila = mysqli_fetch_array($resultado)) {
                            
                                        $Numero++;

                                        $deposito = funcionMaster($fila['Deposito_id'],'id','descripcion','dep');
                                        if($deposito != ""){
                                          $deposito = $deposito." | ";
                                        }

                                        echo '     <tr>
                                        <td  width="1%">' . $Numero .' </td>
                                        <td width="30%">' .$deposito . ' ' . $fila['Descripcion'] .' </td>
                                        <td width="10%"><div align="Right">' . $fila['Base'] . '' . $moneda . '</div></td>
                                        <td width="5%"><div align="Right">' . $fila['Cantidad'] . '</div></td>
                                        <td width="10%"><div align="Right">' . $fila['Subtotal'] . '' . $moneda . '</div></td>
                                        <td width="10%"><div align="center">' . $fila['Impuesto_Numerico'] . '' . $moneda . '</div></td>
                                        <td width="10%"><div align="Right">' . $fila['Total'] . '' . $moneda . '</div></td>';

                                        echo '</tr>';
                                    }

                                    ?>
                                </tr>

                            </tbody>
                                <tfoot>
                                    <tr>
                                    <th  colspan="6" ><div align="Right">Precio Base:</div></th>
                                    <td><div align="Right"> <?php echo number_format($TotalBruto,2)  . '' . $moneda ?></div> </td>
                                    </tr>
                                    <tr>
                                    <th  colspan="6" ><div align="Right">Subtotal:</div></th>
                                    <td><div align="Right"> <?php echo number_format($SubTotal,2)  . '' . $moneda ?></div> </td>
                                    </tr>


                                    <?php
                                    if ($ImpuestoBase > 0) {
                                    ?>

                                    <tr>
                                        <th  colspan="6" ><div align="Right">Impuesto:</div></th>
                                        <td> <div align="Right"><?php echo number_format($ImpuestoBase,2) . '' . $moneda ?></div> </td>
                                    </tr>

                                    <?php
                                    } ?>

                                    <tr>
                                    <th colspan="6" ><div align="Right">Total Documento:</div></th>
                                    <td><div align="Right"><?php echo number_format($TotalNeto,2) . '' . $moneda ?></div></td>
                                    </tr>
                                </tfoot>
                            </table>
                            
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">

        <!-- accepted payments column -->


        <!-- /.col -->
      </div>

      <div class="col-xs-12" align="center">
        <?php echo $pieF ?>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">
          <a onclick="window.print()" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>

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

