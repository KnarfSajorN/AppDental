<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
?>

 
<?php

$idOperacion = $_GET['idOperacion'];
$usuario_id = $_SESSION['ID'];



$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
  $subTotal      = $rowMotorizado['subTotal'];
  $impuesto      = $rowMotorizado['impuesto'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $montoPagado      = $rowMotorizado['montoPagado'];
  $nota      = $rowMotorizado['nota'];
  $ID_Empresa      = $rowMotorizado['ID_Empresa'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  sproveedores where id = '$ID_Empresa'");
// echo "SELECT * FROM  sproveedores where id = '$ID_Empresa'";

$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $nombre = $rowMotorizado['nombre'];
  $rut = $rowMotorizado['rut'];
  $correo = $rowMotorizado['correo'];

  $direccion = $rowMotorizado['direccion'];
  $telefono = $rowMotorizado['telefono'];
  $vendedor = $rowMotorizado['vendedor'];
  $nota = $rowMotorizado['nota'];
  $idE = $rowMotorizado['id'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  abono where  numero_operacion = '$idOperacion' AND id='$idAbono' ");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $id = $rowMotorizado['id'];
  $numero_operacion = $rowMotorizado['numero_operacion'];
  $fecha = $rowMotorizado['fecha'];
  $hora = $rowMotorizado['hora'];
  $valor_abonado = $rowMotorizado['valor_abonado'];
}

$Moneda = funcionMaster($_SESSION['ID_principal'], 'ID_Usuario', 'moneda', 'config');

?>

<?php

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

// echo '........' . $whatsapp;
$whatsapp = $telefono;
$idCliente = $ID_Empresa;

$mensajeW = ' Sr(a) *' . $nombre . '* Se ha generado una Orden de Compra por el valor de : *' . $totalNeto . '* *' . $Moneda . '* por favor ver factura  en el siguiente link: '.$Base.'imprimirOrden.php?idOperacion=' . $idOperacion . ' ';
$accion = 0;
Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $idCliente, $usuario_id, $whatsapp, $accion);


echo "<script language='Javascript'> window.location='preliminarOrden.php?idOperacion=$idOperacion';</script>";


?> 