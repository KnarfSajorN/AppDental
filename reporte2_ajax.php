<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['idCLiente'];
$ID = $_POST['id'];
$tipo = $_POST['idCLiente'];
$tipo = $_POST['tipo'];

$response1 = [['# de Factura', 'Paciente', 'Tipo Doc', '# de Documento', 'Correo', 'Dirección', 'Número de Telefono', 'Fecha',  'Cantidad de Productos', 'Método de pago','Sub-total', 'Impuesto', 'Total', 'Monto Pagado']];

if ($tipo == 0) { 
  $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where activo = 1 and fechaOperacion BETWEEN '$desde' and '$hasta' ");
} elseif ($tipo <> 0) {
  $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where activo = 1 and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' ");
}

if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $fechaOperacion      = $rowMotorizado['fechaOperacion'];
    $numeroDoc               = $rowMotorizado['numeroDoc'];
    $subTotal               = $rowMotorizado['subTotal'];
    $impuesto               = $rowMotorizado['impuesto'];
    $totalBruto               = $rowMotorizado['totalBruto'];
    $montoPagado               = $rowMotorizado['montoPagado'];
    $cantidadProduc               = $rowMotorizado['cantidadProduc'];
    $idCliente               = $rowMotorizado['idCliente'];
    $idOperacion               = $rowMotorizado['idOperacion'];
    $vendedor               = $rowMotorizado['vendedor'];
    $pago               = $rowMotorizado['pago'];
    $tipoDoc               = $rowMotorizado['tipo'];
    $voucher               = $rowMotorizado['voucher'];
    $entidadf               = $rowMotorizado['entidadf'];

    $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
    $nrowl = mysqli_num_rows($queryListCli);
    while ($rowCli = mysqli_fetch_array($queryListCli)) {
      $nombre_cliente      = $rowCli['nombre_cliente'];
      $tipo_cliente      = $rowCli['tipo_cliente'];
      $CODI_CLIENTE      = $rowCli['CODI_CLIENTE'];
      $correo_cliente      = $rowCli['correo_cliente'];
      $direccion_cliente      = $rowCli['direccion_cliente'];
      $whatsapp      = $rowCli['whatsapp'];
    }
    $metodo_pago1 = '';
    $metodoPagoString1 = '';
    $queryListCli1 = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos where idOperacion = $idOperacion ");
    while ($rowCli1 = mysqli_fetch_array($queryListCli1)) {
      $metodo_pago1         = $rowCli1['metodo_pago'];
      $metodoPagoString1 .= "{$metodo_pago1},";
    }

    $metodoPagoString = (preg_replace("/,$/", "", $metodoPagoString1));

    $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where id_usuario = $ID and id_cliente = $idCliente and idOperacion = 6 order by id");


    if ($resultado) {
      while ($fila = mysqli_fetch_array($resultado)) {
        //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
        // $Numero++;
        $total += $fila[9];
      }
    }

    $totales += $totalBruto;
    $totales1 += $montoPagado;
    //$response = [['# de Factura', 'Paciente', 'Tipo Doc', '# de Documento', 'Correo','Dirección','Número de Telefono', 'Fecha', 'Tipo', 'Cantidad de Productos', 'Sub-total', 'impuesto', 'Total', 'Monto Pagado']];
    $response1[] = [
      $numeroDoc,
      $nombre_cliente,
      $tipo_cliente,
      $CODI_CLIENTE,
      $correo_cliente,
      $direccion_cliente,
      $whatsapp,
      $fechaOperacion,
      $cantidadProduc,
      $totales,
      $subTotal,
      $impuesto,
      $totalBruto,
      $montoPagado

    ];
  }
}

if ($tipo == 0) {

  $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idEmpresa = $ID and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7)");
  echo "SELECT * FROM  sOperacionInv where idEmpresa = $ID and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7)";
} elseif ($tipo <> 0) {

  $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where idEmpresa = $ID and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7)");
  echo "SELECT * FROM  sOperacionInv  where idEmpresa = $ID and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7)";
}

$response2 = [['# de facutura', 'Paciente', 'Fecha', 'Monto de la factura', 'Monto pagado', 'Saldo pendiente', 'Fecha de pago']];

while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $fechaOperacion      = $rowMotorizado['fechaActualizado'];
  $numeroDoc               = $rowMotorizado['numeroDocumento'];

  $montoBase               = $rowMotorizado['montoBase'];


  $montoPendiente               = $rowMotorizado['montoBase'] - $rowMotorizado['montoPagado'];

  $montoPagado               = $rowMotorizado['montoPagado'];

  $fechaPago               = $rowMotorizado['fechaPago'];

  $idCliente               = $rowMotorizado['idEmpresa'];



  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
  $Numero++;

  $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
  $nrowl = mysqli_num_rows($queryListCli);
  while ($rowCli = mysqli_fetch_array($queryListCli)) {
    $nombre_cliente      = $rowCli['nombre_cliente'];
  }
  $response2[] = [
    $numeroDoc,
    $nombre_cliente,
    $fechaOperacion,
    $montoBase,
    $montoPendiente,
    $montoPagado,
    $fechaPago
  ];
}
$response = array_merge($response1, $response2);

// Asegúrate de que no haya salida anterior a header
if (!headers_sent()) {
    header('Content-Type: application/json');
}

// Imprime la respuesta JSON
echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>

