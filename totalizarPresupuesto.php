<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
session_start();

$ID_principal = $_SESSION{'ID_principal'};
$id_usuario  			= $_POST['id_usuario'];
$montoPagado  			= $_POST['montoPagado'];
$nota  			        = $_POST['nota'];
$fechaVencimiento 		= $_POST['fechaVencimiento'];
$clienteId   			= $_POST['id_cliente'];
$ID_Empresa   			= $_POST['ID_Empresa'];
$id   			= $_POST['id'];

$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$fechaRegistro             = date("Y-m-d H:i:s");
$tipo                      = $_POST['tipo'];


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

$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico) 
	as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal  from   sDetalleOperPendites where id_usuario =$id_usuario and id_cliente = $clienteId and estado = 1 AND tipo=2 order by id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$sumTotalbase		= $rowMotorizado['sumTotalbase'];
	$sumCantidad	= $rowMotorizado['sumCantidad'];
	$sumSubTotal	= $rowMotorizado['sumSubTotal'];
	$sumDescuento = $rowMotorizado['sumDescuento'];


	$sumImpuesto = $rowMotorizado['sumImpuesto'];
	$sumTotal = $rowMotorizado['sumTotal'];
}
if($sumImpuesto==""){$sumImpuesto=0;}
$impuestoF=0;


if($sumCantidad==""){
	echo "<script type='text/javascript'>alert('Debe Agregar Minimo 1 Detalle');history.back();</script>";
	exit();
}


/*
$total1="0";
if ($impuestoF > 0) {
	$impuestoF2 = $impuestoF / 100;
	$total1 =  $sumSubTotal * $impuestoF2;
	$total =  $total1 + $sumSubTotal;
} else {


	$total =  $sumSubTotal;
}
*/
$numeroPresupuesto++;


$Deposito_id = $_POST['Deposito_id'];
if($Deposito_id==""){
	$Deposito_id="0";
}

// echo 'Generando la facrura Nº' . $numeroPresupuesto;
mysqli_query($conn3, "INSERT INTO sOperacionInv 
	(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, totalNeto, 
	 totalBruto, cantidadProduc, descuentos, montoPagado, nota, tipo,Deposito_id,ID_principal) 
	VALUES                     
	('$numeroPresupuesto', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto','$sumTotal',
	'$sumTotalbase', '$sumCantidad', '$sumDescuento', '0' , '$nota', '$tipo','$Deposito_id','$ID_principal');") or die(mysqli_error($conn3));


$idOperacion = mysqli_insert_id($conn3);

mysqli_query($conn3, "UPDATE usuarios set numeroPresupuesto = $numeroPresupuesto where ID = $id_usuario;");

include 'FA_Include_ValidacionExistenciasProductos.php';

$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where id_usuario =$id_usuario and  id_cliente = $clienteId AND tipo=2 AND estado = 1 order by id ASC");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$id		        = $rowMotorizado['id'];
	$cantidad		= $rowMotorizado['cantidad'];
	$descripcion	= $rowMotorizado['descripcion'];
	$base			= $rowMotorizado['base'];
	$totalbase		= $rowMotorizado['totalbase'];
	$subTotal		= $rowMotorizado['subTotal'];
	$id_usuario		= $rowMotorizado['id_usuario'];
	$idProducto = $rowMotorizado['idProducto'];
	$ID_Empresa = $rowMotorizado['ID_Empresa'];
	$estado = $rowMotorizado['estado'];

	$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
	// $cantidad_producto = $cantidad_producto - $cantidad;


	$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
	$Descuento_Textual  = $rowMotorizado['Descuento_Textual'];

	$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
	$Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
	$Total = $rowMotorizado['Total'];
	
	$Deposito_id = $rowMotorizado['Deposito_id'];
	$SinvDep_id = $rowMotorizado['SinvDep_id'];
	//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
	$Mas_Detalles = mysqli_real_escape_string($conn3,MasDetalles($idProducto, $SinvDep_id));
	

		mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto, totalbase, subTotal, id_usuario,
				id_cliente,Descuento_Numerico,Descuento_Textual,SinvDep_id,Deposito_id,Mas_Detalles,Impuesto_Numerico,Impuesto_Textual,Total) 
                        VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', '$totalbase', '$subTotal', '$id_usuario', 
						'$clienteId','$Descuento_Numerico','$Descuento_Textual','$SinvDep_id','$Deposito_id','$Mas_Detalles','$Impuesto_Numerico','$Impuesto_Textual','$Total');");

	//mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
	mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");
}


echo "<script language='Javascript'> window.location='preliminarPresupuesto.php?idOperacion=$idOperacion';</script>";
