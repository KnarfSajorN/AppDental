<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
session_start();
$id_principal = $_SESSION['ID_principal'];
$id_sesion = $_SESSION['ID'];
$id_usuario  			= $_POST['id_usuario'];
$montoPagado  			= $_POST['montoPagado'];
$nota  			        = $_POST['nota'];
$fechaVencimiento 		= $_POST['fechaVencimiento'];
$clienteId   			= $_POST['id_cliente'];
$ID_Empresa   			= $_POST['ID_Empresa'];
$tipo   			= $_POST['tipo'];

$historia  = $_POST['historia'];
$tipo_historia = $_POST['tipo_historia'];
$fechaRegistro             = date("Y-m-d H:i:s");


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $id_usuario");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$moneda = $rowMotorizado['moneda'];
	$impuestoF = $rowMotorizado['impuestoF'];
}





$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $id_usuario");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$numeroFactura			= $rowMotorizado['numeroFactura'];
	$numeroOrden			= $rowMotorizado['numeroOrden'];
}




if ($clienteId > 0) {


	$Deposito_id = $_POST['Deposito_id'];
	if($Deposito_id==""){
		$Deposito_id="0";
	}

	include 'FA_Include_ValidacionExistenciasProductos.php';
	$ArregloExistencias = CalcularExistenciasDescontar($id_usuario,$clienteId,$Deposito_id,'7');// aqui enviar el id del cliente para que funcione correctamente la funcion, ya que en pos se envia en 0 para tenerlo encuenta
	//echo "<pre>";
	//print_r($ArregloExistencias);
	//echo "</pre>";
	//exit();
	


	$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico)
as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal from   sDetalleOperPendites  where estado = 1 and id_usuario =$id_sesion and  id_cliente = $clienteId AND tipo = 7 order by id");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$sumTotalbase		= $rowMotorizado['sumTotalbase'];
		$sumCantidad	= $rowMotorizado['sumCantidad'];
		$sumSubTotal	= $rowMotorizado['sumSubTotal'];
		$sumDescuento = $rowMotorizado['sumDescuento'];

		$sumImpuesto = $rowMotorizado['sumImpuesto'];
		$sumTotal = $rowMotorizado['sumTotal'];
	}

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
	if($sumImpuesto==""){$sumImpuesto=0;}
	$impuestoF=0;
	

	$numeroFactura++;

	echo 'Generando la Factura Nº' . $numeroFactura;

	mysqli_query($conn3, "INSERT INTO sOperacionInv 
	(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, 
	totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota ,id_historia , tipo_historia,tipo,Deposito_id, ID_principal) 
	VALUES                     
	('$numeroFactura', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto',
	'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','7','$Deposito_id','$id_principal');") or die(mysqli_error($conn3));

	$idOperacion = mysqli_insert_id($conn3);

	mysqli_query($conn3, "UPDATE usuarios set numeroFactura = $numeroFactura where ID = $id_usuario;");

	

	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$id_sesion and  id_cliente = $clienteId AND tipo = 7");
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

		$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
		$cantidad_producto = $cantidad_producto - $cantidad;


		$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
		$Descuento_Textual  = $rowMotorizado['Descuento_Textual'];

        //odontograma
        $detalle_presupuesto_odontograma = $rowMotorizado['detalle_presupuesto_odontograma'];
        $Mas_Detalles_Odontograma = $rowMotorizado['Mas_Detalles_Odontograma'];
        //odontograma

		$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
		$Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
		$Total = $rowMotorizado['Total'];



		$Deposito_id = $rowMotorizado['Deposito_id'];
		$SinvDep_id = $rowMotorizado['SinvDep_id'];
		//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
		$Mas_Detalles = mysqli_real_escape_string($conn3,MasDetalles($idProducto, $SinvDep_id));


		mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
	 totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,detalle_presupuesto_odontograma,Mas_Detalles_Odontograma,SinvDep_id,Deposito_id,Mas_Detalles,Impuesto_Numerico,Impuesto_Textual,Total) 
                        VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
						'$totalbase', '$subTotal', '$id_usuario', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$detalle_presupuesto_odontograma','$Mas_Detalles_Odontograma','$SinvDep_id','$Deposito_id','$Mas_Detalles','$Impuesto_Numerico','$Impuesto_Textual','$Total');");


		//mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
		mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");

		mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Estado='2' WHERE id = '{$detalle_presupuesto_odontograma}' limit 1;");

	}


	//?
	//aqui es el arreglo que trae la funcion CalcularExistenciasDescontar en la cual traera los id de los SinvDep y la cantidad a descontar
	foreach ($ArregloExistencias['Detalles'] as $key => $value) {
		$SinvDep_id = $key;
		$Descontar = $value['Descontar'];
				
		$Query_SinvDep = mysqli_query($conn3, "SELECT * FROM  SinvDep where id = $SinvDep_id");
		while ($RowSinvDep = mysqli_fetch_array($Query_SinvDep)) {
			$existencia = $RowSinvDep['existencia'];
		}
		$NewExistencia = $existencia - $Descontar;
		mysqli_query($conn3, "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = '$SinvDep_id'");
		//echo "UPDATE SinvDep set existencia = '$NewExistencia'  WHERE id = $SinvDep_id <br>";
	} 
	///?









				$MontoPagadoDetalles = "0";
				$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$id_sesion and  id_cliente = $clienteId AND idOperacion = '0' AND tipo = '7' ");
				$nrowl = mysqli_num_rows($queryList);
				while ($rowMotorizado = mysqli_fetch_array($queryList)) {
					$id		        = $rowMotorizado['id'];
					$tipo 		        = $rowMotorizado['tipo'];
					$ID_Empresa 		        = $rowMotorizado['ID_Empresa'];
					$nota_pago 		        = $rowMotorizado['nota_pago'];

					mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET idOperacion = '$idOperacion' WHERE idOperacion = 0 AND id_usuario =$id_usuario and  id_cliente = $clienteId AND tipo = '7'");
					$MontoPagadoDetalles = $MontoPagadoDetalles + $nota_pago;
					
				}

				$MontoPagadoDetalles = round($MontoPagadoDetalles,2);
				mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado = '$MontoPagadoDetalles' WHERE idOperacion = '$idOperacion'");

}
//echo $idOperacion;
elseif ($clienteId == 0) {


	$queryList = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal, SUM(Descuento_Numerico)
as sumDescuento,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal from   sDetalleOperPendites  where estado = 1 and  id_usuario =$id_sesion and  ID_Empresa = $ID_Empresa AND tipo = 7 order by id");
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$sumTotalbase		= $rowMotorizado['sumTotalbase'];
		$sumCantidad	= $rowMotorizado['sumCantidad'];
		$sumSubTotal	= $rowMotorizado['sumSubTotal'];
		$sumDescuento = $rowMotorizado['sumDescuento'];

		$sumImpuesto = $rowMotorizado['sumImpuesto'];
		$sumTotal = $rowMotorizado['sumTotal'];
	}

	/*
	if ($impuestoF > 0) {
		$impuestoF2 = $impuestoF / 100;
		$total1 =  $sumSubTotal * $impuestoF2;
		$total =  $total1 + $sumSubTotal;
	} else {


		$total =  $sumSubTotal;
	}
	*/
	if($sumImpuesto==""){$sumImpuesto=0;}
	$impuestoF=0;

	$numeroOrden++;

	// echo 'Generando la Factura Nº' . $numeroOrden;

	mysqli_query($conn3, "INSERT INTO sOperacionInv 
	(numeroDoc, idCliente, idEmpresa, fechaOperacion, fechaVencimiento, docOrigen, seriaOperacion, impuesto, impuestoBase, 
	totalBruto, totalNeto, cantidadProduc, descuentos, montoPagado, nota ,id_historia , tipo_historia,ID_Empresa,tipo, ID_principal;) 
	VALUES                     
	('$numeroOrden', '$clienteId', '$id_usuario', '$fechaRegistro', '$fechaVencimiento', '0', NULL,'$impuestoF', '$sumImpuesto',
	'$sumTotalbase', '$sumTotal', '$sumCantidad', '$sumDescuento', '$montoPagado' , '$nota' ,'$historia', '$tipo_historia','$ID_Empresa','7','$id_principal');") or die(mysqli_error($conn3));

	$idOperacion = mysqli_insert_id($conn3);

	mysqli_query($conn3, "UPDATE usuarios set numeroOrden = $numeroOrden where ID = $id_usuario;");


	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and id_usuario =$id_sesion and ID_Empresa = $ID_Empresa AND tipo = 7");
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

		$cantidad_producto = funcionMaster($idProducto, 'ID', 'existencia', 'sinvetrios');
		$cantidad_producto = $cantidad_producto + $cantidad;


		$Descuento_Numerico = $rowMotorizado['Descuento_Numerico'];
		$Descuento_Textual  = $rowMotorizado['Descuento_Textual'];

		$Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
		$Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
		$Total = $rowMotorizado['Total'];

        //odontograma
        $detalle_presupuesto_odontograma = $rowMotorizado['detalle_presupuesto_odontograma'];
        $Mas_Detalles_Odontograma = $rowMotorizado['Mas_Detalles_Odontograma'];
        //odontograma


		mysqli_query($conn3, "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
	 totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,ID_Empresa,detalle_presupuesto_odontograma,Mas_Detalles_Odontograma,Impuesto_Numerico,Impuesto_Textual,Total) 
                        VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
						'$totalbase', '$subTotal', '$id_usuario', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$ID_Empresa','$detalle_presupuesto_odontograma','$Mas_Detalles_Odontograma','$Impuesto_Numerico','$Impuesto_Textual','$Total');");
	// 	echo "INSERT INTO sDetalleOper (idOperacion, fechaRegistro, idProducto, cantidad, descripcion, base, impuesto,
	// totalbase, subTotal, id_usuario, id_cliente,Descuento_Numerico,Descuento_Textual,ID_Empresa) 
	// 				   VALUES ('$idOperacion','$fechaRegistro', '$idProducto','$cantidad','$descripcion','$base','0', 
	// 				   '$totalbase', '$subTotal', '$id_usuario', '$clienteId','$Descuento_Numerico','$Descuento_Textual','$ID_Empresa');";

		mysqli_query($conn3, "UPDATE sinvetrios SET existencia='$cantidad_producto' WHERE ID='$idProducto'");
		mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 2 where id = $id");

		mysqli_query($conn3, "UPDATE OD_Procedimientos_Presupuestar SET Estado='2' WHERE id = '{$detalle_presupuesto_odontograma}' limit 1;");
		
	}

	$queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where id_usuario =$id_usuario and  ID_Empresa = $ID_Empresa");
	$nrowl = mysqli_num_rows($queryList);
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$id		        = $rowMotorizado['id'];
		$tipo 		        = $rowMotorizado['tipo'];
		$ID_Empresa 		        = $rowMotorizado['ID_Empresa'];

		if ($tipo == 3) {
			mysqli_query($conn3, "UPDATE sDetalleMetodosPagos SET idOperacion = '$idOperacion' WHERE idOperacion = 0");
		} else {
			echo "Hubo un Error";
		}
	}
}

if ($clienteId != 0) {
	echo "<script language='Javascript'> window.location='OD_PreliminarFactura?idOperacion=$idOperacion';</script>";
} 
