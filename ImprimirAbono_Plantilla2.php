<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");

$idOperacion = $_GET['idOperacion'];
$idAbono = $_GET['idAbono'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' ");
// $nrowl=mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];

  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];



  $totalNeto = $rowMotorizado['totalNeto']; //valor total con descuento
  $montoPagado      = $rowMotorizado['montoPagado'];
}

$saldo = $totalNeto - $montoPagado;

$nombre_paciente = funcionMaster($idCliente, 'cliente_id', 'nombre_cliente', 'cliente');


$queryList = mysqli_query($conn3, "SELECT * FROM  abono where  id = '$idAbono' ");

// $nrowl=mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $id = $rowMotorizado['id'];
  $numero_operacion = $rowMotorizado['numero_operacion'];
  $numero_documento = $rowMotorizado['numero_documento'];
  $fecha = $rowMotorizado['fecha'];
  //$hora=$rowMotorizado['hora'];
  $pago = $rowMotorizado['pago'];
  $notas = $rowMotorizado['notas'];
  //$banco=$rowMotorizado['banco'];
  $tarjeta = $rowMotorizado['tarjeta'];
  $cuenta = $rowMotorizado['cuenta'];
  $cliente_id = $rowMotorizado['cliente_id'];
  $valor_abonado = $rowMotorizado['valor_abonado'];
  $fecha_abono = $rowMotorizado['fecha_abono'];

  $valor_nuevo_factura = $rowMotorizado['valor_nuevo_factura'];
  $firmaC = $rowMotorizado['Firma'];
  $Valor_Factura = funcionMaster($idOperacion, 'idOperacion', 'totalNeto', 'sOperacionInv');
  $saldo = $Valor_Factura - $valor_nuevo_factura;
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario =  $idEmpresa");
// $nrowl=mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF      = $rowMotorizado['nombreF'];
  $header       = $rowMotorizado['header'];


  $LogoF               = $rowMotorizado['logoF'];
  $firma               = $rowMotorizado['firma'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . 'logos/' . $LogoF . '" style="width:90%">';
  }


  if (strlen($firma) > 0) {
    $firmaImg = '<img src="' . $Base . 'FirmasReg/' . $firma . '" height="100" width="150">';
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
// $nrowl=mysqli_num_rows($queryList);
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $direccion          = $rowMotorizado['direccion'];
    $especialidad = $rowMotorizado['especialidad'];
  }
}

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
// $nrowl=mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $nombre_cliente     = $rowMotorizado['nombre_cliente'];
  $CODI_CLIENTE       = $rowMotorizado['CODI_CLIENTE'];
  $fechaNacimiento    = $rowMotorizado['fechaNacimiento'];
  $direccion_cliente  = $rowMotorizado['direccion_cliente'];
  $whatsapp_cliente   = $rowMotorizado['whatsapp'];
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

  <!-- FONT OPEN SANS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">

  <style>
    .no-border {
      width: 90%;
      border: 0
    }

    .no-border * {
      border: 0
    }

    .table2 {
      width: 90% !important;
    }

    .table2 td {
      padding: 5px !important;
    }

    .table2 th {
      padding: 5px !important;
    }

    .table2 tr {
      padding: 5px !important;
    }

    
    * {
      font-family: "Open Sans", sans-serif;
      font-optical-sizing: auto;
      font-style: normal;
    }
  </style>

</head>

<body onload="window.print();">
  <div class="col-12 row">
    <center>
      <table class="no-border">
        <thead>
          <tr>
            <td style="width: 30%" class="text-center">
              <?= $Logo ?>
            </td>
            <td style="width: 70%">
              <p style="text-align: end;"><?= $header ?></p>
            </td>
          </tr>
        </thead>
      </table>

      <hr>

      <table class="no-border">
        <thead>
          <tr>
            <td style="width: 50%;padding: 25px !important">
              <p>
                <b>Facturar a: </b> <br>
                <?= $nombre_cliente ?> <br>
                <?= $direccion_cliente != '' ? $direccion_cliente . "<br>" : '' ?>
                <?= $whatsapp_cliente != '' ? $whatsapp_cliente . "<br>" : '' ?>
              </p>
            </td>
            <td style="width: 50%;padding: 25px !important">
              <p>
                <b>Fecha de abono: </b> <br>
                <?= $fecha_abono ?> <br>
              </p>
            </td>
          </tr>
        </thead>
      </table>


      <h3 class="my-2">MONTO A PAGAR: <?= number_format($totalNeto, 2) ?> <?= $moneda ?></h3>

      <table class="table table2">
        <thead>
          <tr>
            <th style="width: 35%;padding: 25px !important">MONTO INCIAL</th>
            <th style="width: 15%;padding: 25px !important"></th>
            <th style="width: 50%;padding: 25px !important">ABONO</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td style="width: 35%;padding: 25px !important"><?= number_format($totalNeto, 2) ?> <?= $moneda ?></td>
            <td style="width: 15%;padding: 25px !important"></td>
            <td style="width: 50%;padding: 25px !important"><?= number_format($montoPagado, 2) ?> <?= $moneda ?></td>
          </tr>
          <tr>
            <td style="width: 50%;padding: 25px !important; padding-left: 0; padding-right: 0 ">
              <p><b>Método de pago:</b> <?= funcionMaster($pago, 'id', 'Nombre', 'Medios_Pago') ?></p>
            </td>
            <td style="padding: 25px !important" colspan="2">
              <h4><b>Total Restante: <?= number_format($saldo, 2) ?> <?= $moneda ?></br></h4>
            </td>
          </tr>
        </tbody>
      </table>


    
      <table class="no-border">
        <thead>
          <tr>
            <td colspan="2" style="padding: 25px !important">
              <p style="font-size: 15px"><b>NOTAS: </b><?= $notas ?></p>
            </td>
          </tr>
          <tr>
            <td style="padding: 25px !important; width: 50%">
              <p style="font-size: 15px; margin-top: 40px; border-top: 1px solid black; text-align:center">Firma del paciente</p>
            </td>
            <td style="padding: 25px !important; width: 50%">
              <p style="font-size: 15px; margin-top: 40px; border-top: 1px solid black; text-align:center"><?=$nombreF?></p>
            </td>
          </tr>
        </thead>
      </table>
    </center>


    <h2 class="text-center">¡MUCHAS <br> GRACIAS!</h2>

  </div>


</body>