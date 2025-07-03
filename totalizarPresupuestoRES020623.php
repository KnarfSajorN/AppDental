<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");


echo '-----------------1----------------';



$con = conectar();

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));




$id_usuario  			= $_POST['id_usuario'];
$montoPagado  			= $_POST['montoPagado'];
$nota  			        = $_POST['nota'];
$fechaVencimiento 		= $_POST['fechaVencimiento'];
$clienteId   			= $_POST['id_cliente'];
$fechaRegistro             = date("Y-m-d H:i:s");
$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
	$sucursal = "0";
}
////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from sOperacionInv WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sOperacionInv` ADD `sucursal` TEXT NULL DEFAULT '0' ");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from sDetalleOper WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `sDetalleOper` ADD `sucursal` TEXT NULL DEFAULT '0' ");
}

$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $id_usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$moneda = $rowMotorizado['moneda'];
	$impuestoF = $rowMotorizado['impuestoF'];
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $id_usuario");

$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$numeroPresupuesto			= $rowMotorizado['numeroPresupuesto'];
}



$queryList = mysqli_query($conn3, "SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sDetalleOperPendites  where   id_usuario =$id_usuario and  id_cliente = $clienteId order by id");

$nrowl = mysqli_num_rows($queryList);

while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$sumBase		= $rowMotorizado['sumBase'];
	$sumCantidad	= $rowMotorizado['sumCantidad'];
	$sumSubTotal	= $rowMotorizado['sumSubTotal'];
}

if ($impuestoF > 0) {
	$impuestoF2 = $impuestoF / 100;
	$total1 =  $sumSubTotal * $impuestoF2;
	$total =  $total1 + $sumSubTotal;
} else {
	$total =  $sumSubTotal;
}


$numeroPresupuesto++;

echo 'Generando la facrura Nº' . $numeroPresupuesto;

mysqli_query($conn3, "INSERT INTO sOperacionInv 
(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, totalNeto,    totalBruto, cantidadProduc, descuentos, montoPagado, nota, tipo,sucursal) 
VALUES                     
('$numeroPresupuesto', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '0','$total','$sumSubTotal', '$sumCantidad', '0', '0' , '$nota', '2', '$sucursal');");

echo '<br>actualizamos numero<br>';


mysqli_query($conn3, "update usuarios set numeroPresupuesto = $numeroPresupuesto where ID = $id_usuario;");



echo 'Tomamos el ID y el numerod ef actura<br>';




$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where numeroDoc=$numeroPresupuesto and tipo = '2'");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$idOperacion			= $rowMotorizado['idOperacion'];
}
//echo "<br><br><br><br> >>>>> SELECT * FROM  sOperacionInv where numeroDoc=$numeroPresupuesto and idEmpresa = $id_usuario <<<< <br><br><br>";
//echo $idOperacion;

//echo '<br>agregamos lo pendiente en oper -- '.$clienteId .'<br>';


$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where   id_usuario =$id_usuario and  id_cliente = $clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$id		        = $rowMotorizado['id'];
	$cantidad		= $rowMotorizado['cantidad'];
	$descripcion	= $rowMotorizado['descripcion'];
	$base			= $rowMotorizado['base'];
	$totalbase		= $rowMotorizado['totalbase'];
	$subTotal		= $rowMotorizado['subTotal'];


	mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente,sucursal) 
                        VALUES ('$idOperacion','$fechaRegistro', '0','$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$id_usuario', '$clienteId','$sucursal');");

	echo "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario, id_cliente) 
                        VALUES ('$idOperacion','$fechaRegistro', '0','$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$id_usuario', '$clienteId');";


	mysqli_query($conn3, "delete from sDetalleOperPendites where id = $id");
}

echo '<br><br><br><br><br>  <br><br><br><br><br> ----->>>>>' . $idOperacion;

echo "<script language='Javascript'> window.location='preliminarPresupuesto.php?idOperacion=$idOperacion';</script>";
