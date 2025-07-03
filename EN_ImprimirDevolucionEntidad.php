<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInvDevolucion where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  //$subTotal      =$rowMotorizado['subTotal'];
  $impuesto      = $rowMotorizado['impuesto'];
  $impuestoBase = $rowMotorizado['impuestoBase'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $nota      = $rowMotorizado['nota'];

  $MontoDevolucion = $rowMotorizado['MontoDevolucion'];

  $convenio_id = $rowMotorizado['convenio_id'];
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
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" style="height:3cm; width:auto;">';
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio where id=$convenio_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $Nombre = $rowMotorizado['Nombre'];
  $Codigo = $rowMotorizado['Codigo'];

  $entidad_id = $rowMotorizado['entidad_id'];

  $NombreEntidad = funcionMaster($entidad_id, 'id', 'Nombre', 'Rips_Entidades');

}

// if ($montoPagado == 0) {
//   $pagado = '<div align="center"><img src="' . $Base . '/pagado.png" height="10%" width="30%"></div>';
// }

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
        <div class="col-md-4 invoice-col">
        <h4>Datos de la Entidad</h4>
        <address>

          <strong>Nombre: </strong> <?php echo $NombreEntidad ?><br>
          <strong>Convenio:</strong> <?php echo $Nombre ?> <br>
          <strong>Codigo Convenio:</strong> <?php echo $Codigo ?><br>
      </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Devolución # 0000<?php echo $idOperacion ?></b><br>
          <b>Fecha Devolución:</b><?php echo $fechaOperacion ?><br>

          <?php echo $pagado ?>
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

                $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperDevolucion where estado = 1 AND idOperacion = $idOperacion order by id");
                while ($fila = mysqli_fetch_array($resultado)) {

                $Numero++;
                $Descuento = $fila['Descuento_Numerico'];
                $Descripcion = $fila['descripcion'];
                //Apartado de paquetes
                if($fila["PaqueteProcedimiento_id"]!="0" && $fila["PaqueteProcedimiento_id"]!=""){
                    $Paquete_id = funcionMaster($fila["PaqueteProcedimiento_id"],'id','paquete_id','ES_Paquete_Procedimientos');$PaqueteNombre = funcionMaster($Paquete_id,'id','Nombre','ES_Paquete');
                    $Descripcion.= ' ['.$PaqueteNombre.']';
                }

                if($fila["Mas_Detalles"]!=""){
                    $Descripcion.= ' '.$fila["Mas_Detalles"].'';
                }
                echo '     <tr>
                    <td  width="5%">' . $Numero . ' </td>
                    <td width="30%">' .$Descripcion. ' </td>
                    
                    <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                    <td width="13%"><div align="Right">' . number_format($fila['base'],2) . '' . $moneda . '</div></td>
                    <td width="13%"><div align="Right">' . number_format($Descuento,2) . '' . $moneda . '</div></td>
                    <td width="13%"><div align="Right">' . number_format($fila['subTotal'],2) . '' . $moneda . '</div></td>
                    
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
            <?php echo $nota; ?>
          </p>
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

              <?php
              if ($impuestoBase > 0) {
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
                <th>Total Devolución:</th>
                <td><?php echo number_format($totalNeto,2) . '' . $moneda ?></td>
              </tr>

              <tr><th>&nbsp;</th><th></th><tr>
            <tr>
              <th style="width:50%">Monto Devolucion[Pago]:</th>
              <td> <?php echo number_format($MontoDevolucion,2)  . '' . $moneda ?> </td>
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

</body>

</html>

<style>
    @media print {
      .no-print {
        display: none;
      }
    }
  </style>

