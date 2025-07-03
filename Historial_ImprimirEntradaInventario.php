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
  $totalPrecio = $rowMotorizado['totalPrecio'];

    switch ($tipoDoc){
      case '2':
          $Tipo = "Entrada de Inventario";
          break;
    }

    $idTercero = $rowMotorizado['idTercero'];
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

$queryT = mysqli_query($conn3, "SELECT * FROM sproveedores WHERE id = $idTercero");
  $nrowlT = mysqli_num_rows($queryT);
  while ($row_T = mysqli_fetch_array($queryT)) {
      $rut_proveedor     = $row_T['rut'];
      $nombre_proveedor     = $row_T['nombre'];
      //$id              = $row_recordset32['id'];
      $correo_proveedor     = $row_T['correo'];
      $telefono_proveedor     = $row_T['telefono'];
      $direccion_proveedor     = $row_T['direccion'];

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
        <h4>Datos del Proveedor</h4>
        <address>
            <strong>Nombre del Proveedor:</strong><?php echo $nombre_proveedor ?><br>
            <strong>RUT:</strong> <?php echo $rut_proveedor ?><br>
            <strong>Dirección:</strong> <?php echo $direccion_proveedor ?><br>
            <strong> Teléfono:</strong> <?php echo $telefono_proveedor ?><br>
            <strong> Email:</strong> <?php echo $correo_proveedor ?>
          </address>
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
                  <div align="Right">Precio</div>
                </th>
                <th>
                  <div align="Right">Cantidad</div>
                </th>
                <th>
                  <div align="Right">Subtotal </div>
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
                $precio      = $fila['precio'];

                $precio_total = $precio * $cantidad;

                $Descripcion = $fila['Descripcion'];
                $MasDetalles = $fila['Mas_Detalles'];;
                if($MasDetalles!=""){
                  $Descripcion .= $MasDetalles;
                }

                echo '     <tr>
                  <td  width="10%">' . $Numero . ' </td>
                  <td width="40%">' . $Descripcion . ' </td>
                  <td width="10%"><div align="Right">' . $precio . '' . $moneda . '</div></td>
                  <td width="15%"><div align="Right">' . $cantidad . '</div></td>
                  <td width="15%"><div align="Right">' . $precio_total . '' . $moneda . '</div></td>
                 
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
            <table class="table">
              <tr>
                <th>Total Precio:</th>
                <td><?php echo $totalPrecio . '' . $moneda ?></td>
              </tr>
            </table>
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