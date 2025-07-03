<?php 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'MontoLetras';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `MontoLetras` TEXT NULL DEFAULT '' COMMENT ' monto escrito en letras  *Creado desde Guardar operacion bancaria grabarOperacionBancaria.php*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'FechaDeposito';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `FechaDeposito` DATE NULL DEFAULT '0000-00-00' COMMENT ' fecha solo para depositos  *Creado desde Guardar operacion bancaria grabarOperacionBancaria.php*'");
}
/////////////////////////////////////////////////////////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from Stransbanco WHERE Field = 'tipo_beneficiario';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `Stransbanco` ADD `tipo_beneficiario` TEXT NULL DEFAULT '' COMMENT ' 1-> Cliente | 2->Proveedor *Creado desde Guardar operacion bancaria grabarOperacionBancaria.php*'");
}
$Campo1 = mysqli_query($conn3, "show COLUMNS from StransbancoDetalles WHERE Field = 'tipo_cliente';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `StransbancoDetalles` ADD `tipo_cliente` TEXT NULL DEFAULT '' COMMENT ' 1-> Cliente | 2->Proveedor *Creado desde Guardar operacion bancaria grabarOperacionBancaria.php*'");
}

/////////////////////////////////////////////////////////////////////////////////////////////////////

$date=date("Y-m-d");

// $_POST = DatosIngresarMysqli($_POST);

$idBanco=$_POST['idBanco'];

$queryList=mysqli_query($conn3,"SELECT sb.id as idBan, st.id as idTrans, st.fechaTrans, st.Documento, st.tipo, st.Concepto, st.debito, st.credito, st.balance
	from Sbancos sb
	right join Stransbanco st on sb.id=st.idBanco
	where sb.id=$idBanco order by idTrans desc limit 1;");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
	$balance=$rowMotorizado['balance'];	
}


//////////////////////////////////////? obtener codigo comprobante ///////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT max(id) as ultimo FROM CCompDiario where tipo_comprobante = 8");
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
	$ultimo = $row_recordset32['ultimo'];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT numero FROM CCompDiario where id = $ultimo");
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
	$ComprobanteNumero = $row_recordset32['numero'];
}
$Comprobante_array = explode("-", $ComprobanteNumero);
$valornumerico = (int)$Comprobante_array[1];
$actual = $valornumerico + 1;
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$queryList = mysqli_query($conn3, "SELECT * FROM  Codigos_Movimientos where id = 8 ");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$CodigoMovimiento = $rowMotorizado['codigo'];
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$fechaComprobante = date("Y-m-d");
$numerocomprobante = "$CodigoMovimiento-" . str_pad($actual, 6, "0", STR_PAD_LEFT);

$numerocomprobante_soloparatransferenciaentrebancos = "$CodigoMovimiento-" . str_pad($actual+1, 6, "0", STR_PAD_LEFT);// este campo se usa para el proceso de transferencia entre bancos

////////////////////////////////////////? FIN obtener codigo comprobante ///////////////////////////////////////////////












////////////////////////////////////////////////////? verificacion /////////////////////////////////////////////////////////
$MontoFinalDebe = "0";$MontoFinalHaber = "0";
foreach ($_POST['CuentaContable'] as $key => $value) {
	//acumulativo del campo debe y haber round 2
	$MontoFinalDebe = $MontoFinalDebe + round($_POST['debe'][$key],2);
	$MontoFinalHaber = $MontoFinalHaber + round($_POST['haber'][$key],2);
}
//round 2 monto final debe y haber
$MontoFinalDebe = round($MontoFinalDebe,2);$MontoFinalHaber = round($MontoFinalHaber,2);
if($MontoFinalDebe!=$MontoFinalHaber){
	//terminar la ejecucion y hacer un alert con mensaje de error
	echo "<script>alert('El monto debe y haber deben ser iguales');</script>";
	exit();
}
//las variables $MontoFinalDebe y $MontoFinalHaber se usan abajo en cada tipo de operacion

////////////////////////////////////////////////////? verificacion /////////////////////////////////////////////////////////




$tipoOper=$_POST['tipoOper'];
// cheque CH - nota debito ND - deposito DP - nota credito NC - transferencia TF

if ($tipoOper=="CH") {
	// cheque CH
	$idBanco=$_POST['idBanco'];
	$nCheque=$_POST['nCheque'];
	$monto=$_POST['monto'];
	$beneficiario=$_POST['beneficiario'];
	$cantidadLetraCH=$_POST['cantidadLetraCH'];

	$detalleMovimiento=$_POST['detalleMovimiento'];
	$fechaCheque=$_POST['fechaCheque'];
	$fechaChequeLibera=$_POST['fechaChequeLibera'];

	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance-$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto, tipo_beneficiario)
	values 
	('$idBanco','$date','$nCheque', '$beneficiario', '$cantidadLetraCH', '$tipoOper','$detalleMovimiento','$monto','0','$BalanceActual','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto','1')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	foreach ($_POST['CuentaContable'] as $key => $value) {
		if($key=="0"){
			$Tipo="0";
		}else{
			$Tipo="1";
		}
			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];

			$idCuentaContable = $value;
			$Concepto = $_POST['concepto'][$key];

			mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha, tipo_cliente)
			values 
			('$Stransbanco_id','$idCuentaContable','$Monto_debe','$Monto_haber', '$Concepto', '$Tipo', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));
		
		$CantidadFilas++;
	}
	
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$idBanco} - Cheque | $detalleMovimiento','$MontoFinalDebe','$MontoFinalHaber','$CantidadFilas','','0','$idCentroCosto','8','$usuario_id','$beneficiario','1')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($idBanco,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','0','$monto',' Movimiento de cheque | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	foreach ($_POST['CuentaContable'] as $key => $value) {

		if($key!="0"){
			$idCuentaContable = $value;
			$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];
			$ConceptoDescripcion = mysqli_real_escape_string($conn3,funcionMaster($_POST['concepto'][$key],'id','Descripcion','ConceptosBanco'));

			mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
			(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
			values  
			('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','$Monto_debe','$Monto_haber',' $ConceptoDescripcion ','$ultimoCompDiarios')") or die(mysqli_error($conn3));
			
		}

	}
	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));


}else if ($tipoOper=="ND") {


	//////////////////////////////////////////////////
	$idBanco=$_POST['idBanco'];
	$nNota=$_POST['nNota'];
	$monto=$_POST['monto'];
	$beneficiario=$_POST['beneficiario'];
	$cantidadLetraND=$_POST['cantidadLetraND'];

	$detalleMovimiento=$_POST['detalleMovimiento'];
	$fechaCheque=$_POST['fechaCheque'];
	$fechaChequeLibera=$_POST['fechaChequeLibera'];

	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance-$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");
	/////////////////////////////////////////////////
	
	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto,tipo_beneficiario)
	values 
	('$idBanco','$date','$nNota', '$beneficiario', '$cantidadLetraND', '$tipoOper','$detalleMovimiento','$monto','0','$BalanceActual','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto','1')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	foreach ($_POST['CuentaContable'] as $key => $value) {
		if($key=="0"){
			$Tipo="0";
		}else{
			$Tipo="1";
		}
			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];

			$idCuentaContable = $value;
			$Concepto = $_POST['concepto'][$key];

			mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha, tipo_cliente)
			values 
			('$Stransbanco_id','$idCuentaContable','$Monto_debe','$Monto_haber', '$Concepto', '$Tipo', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));
		
		$CantidadFilas++;
	}
	
	if($beneficiario=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="1";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$idBanco} - Nota Debito | $detalleMovimiento','$MontoFinalDebe','$MontoFinalHaber','$CantidadFilas','','0','$idCentroCosto','8','$usuario_id','$beneficiario','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($idBanco,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','0','$monto',' Movimiento de cheque [N/D] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	foreach ($_POST['CuentaContable'] as $key => $value) {

		if($key!="0"){
			$idCuentaContable = $value;
			$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];
			$ConceptoDescripcion = mysqli_real_escape_string($conn3,funcionMaster($_POST['concepto'][$key],'id','Descripcion','ConceptosBanco'));

			mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
			(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
			values  
			('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','$Monto_debe','$Monto_haber',' $ConceptoDescripcion ','$ultimoCompDiarios')") or die(mysqli_error($conn3));
			
		}

	}
	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));

	




}else if ($tipoOper=="DP") {
	// Deposito DP
	//////////////////////////////////////////////////
	$idBanco=$_POST['idBanco'];
	$nDeposito=$_POST['nDeposito'];
	$monto=$_POST['monto'];
	$beneficiario=$_POST['beneficiario'];
	$cantidadLetraDP=$_POST['cantidadLetraDP'];

	$detalleMovimiento=$_POST['detalleMovimiento'];
	$fechaDeposito=$_POST['fechaDeposito'];

	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance+$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");
	/////////////////////////////////////////////////

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, usuario_id, idCentroCosto, FechaDeposito, tipo_beneficiario)
	values 
	('$idBanco','$date','$nDeposito', '$beneficiario', '$cantidadLetraDP', '$tipoOper','$detalleMovimiento','0','$monto','$BalanceActual', '$usuario_id','$idCentroCosto','$fechaDeposito', '1')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	foreach ($_POST['CuentaContable'] as $key => $value) {
		if($key=="0"){
			$Tipo="0";
		}else{
			$Tipo="1";
		}
			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];

			$idCuentaContable = $value;
			$Concepto = $_POST['concepto'][$key];

			mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha, tipo_cliente)
			values 
			('$Stransbanco_id','$idCuentaContable','$Monto_debe','$Monto_haber', '$Concepto', '$Tipo', '$usuario_id','$beneficiario','$date_time', '1')") or die(mysqli_error($conn3));
		
		$CantidadFilas++;
	}
	
	if($beneficiario=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="1";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$idBanco} - Deposito | $detalleMovimiento','$MontoFinalDebe','$MontoFinalHaber','$CantidadFilas','','0','$idCentroCosto','8','$usuario_id','$beneficiario','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($idBanco,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','$monto','0',' Movimiento de cheque [Deposito] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	foreach ($_POST['CuentaContable'] as $key => $value) {

		if($key!="0"){
			$idCuentaContable = $value;
			$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];
			$ConceptoDescripcion = mysqli_real_escape_string($conn3,funcionMaster($_POST['concepto'][$key],'id','Descripcion','ConceptosBanco'));

			mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
			(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
			values  
			('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','$Monto_debe','$Monto_haber',' $ConceptoDescripcion ','$ultimoCompDiarios')") or die(mysqli_error($conn3));
			
		}

	}
	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));


}else if ($tipoOper=="NC") {
	// nota credito NC

	//////////////////////////////////////////////////
	$idBanco=$_POST['idBanco'];
	$nNota=$_POST['nNota'];
	$monto=$_POST['monto'];
	$beneficiario=$_POST['beneficiario'];
	$cantidadLetraNC=$_POST['cantidadLetraNC'];

	$detalleMovimiento=$_POST['detalleMovimiento'];
	$fechaCheque=$_POST['fechaCheque'];
	$fechaChequeLibera=$_POST['fechaChequeLibera'];

	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance+$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");
	/////////////////////////////////////////////////

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto, tipo_beneficiario)
	values 
	('$idBanco','$date','$nNota', '$beneficiario', '$cantidadLetraNC', '$tipoOper','$detalleMovimiento','0','$monto','$BalanceActual','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto', '1')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	foreach ($_POST['CuentaContable'] as $key => $value) {
		if($key=="0"){
			$Tipo="0";
		}else{
			$Tipo="1";
		}
			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];

			$idCuentaContable = $value;
			$Concepto = $_POST['concepto'][$key];

			mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha, tipo_cliente)
			values 
			('$Stransbanco_id','$idCuentaContable','$Monto_debe','$Monto_haber', '$Concepto', '$Tipo', '$usuario_id','$beneficiario','$date_time', '1')") or die(mysqli_error($conn3));
		
		$CantidadFilas++;
	}
	
	if($beneficiario=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="1";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$idBanco} - Nota Credito | $detalleMovimiento','$MontoFinalDebe','$MontoFinalHaber','$CantidadFilas','','0','$idCentroCosto','8','$usuario_id','$beneficiario','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($idBanco,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','$monto','0',' Movimiento de cheque [N/C] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	foreach ($_POST['CuentaContable'] as $key => $value) {

		if($key!="0"){
			$idCuentaContable = $value;
			$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];
			$ConceptoDescripcion = mysqli_real_escape_string($conn3,funcionMaster($_POST['concepto'][$key],'id','Descripcion','ConceptosBanco'));

			mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
			(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
			values  
			('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','$Monto_debe','$Monto_haber',' $ConceptoDescripcion ','$ultimoCompDiarios')") or die(mysqli_error($conn3));
			
		}

	}
	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));





}else if ($tipoOper=="TFI") {

	//////////////////////////////////////////////////
	$idBanco=$_POST['idBanco'];
	$nDoc=$_POST['nDoc'];
	$monto=$_POST['monto'];
	$beneficiario=$_POST['beneficiario'];
	$cantidadLetraTFI=$_POST['cantidadLetraTFI'];

	$detalleMovimiento=$_POST['detalleMovimiento'];
	$fechaCheque=$_POST['fechaCheque'];
	$fechaChequeLibera=$_POST['fechaChequeLibera'];

	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance+$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");
	/////////////////////////////////////////////////

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto, tipo_beneficiario)
	values 
	('$idBanco','$date','$nDoc', '$beneficiario', '$cantidadLetraTFI', '$tipoOper','$detalleMovimiento','0','$monto','$BalanceActual','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto', '1')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	foreach ($_POST['CuentaContable'] as $key => $value) {
		if($key=="0"){
			$Tipo="0";
		}else{
			$Tipo="1";
		}
			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];

			$idCuentaContable = $value;
			$Concepto = $_POST['concepto'][$key];

			mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha, tipo_cliente)
			values 
			('$Stransbanco_id','$idCuentaContable','$Monto_debe','$Monto_haber', '$Concepto', '$Tipo', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));
		
		$CantidadFilas++;
	}
	
	if($beneficiario=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="1";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$idBanco} - TF Ingreso | $detalleMovimiento','$MontoFinalDebe','$MontoFinalHaber','$CantidadFilas','','0','$idCentroCosto','8','$usuario_id','$beneficiario','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($idBanco,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','$monto','0',' Movimiento de cheque [TF Ingreso] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	foreach ($_POST['CuentaContable'] as $key => $value) {

		if($key!="0"){
			$idCuentaContable = $value;
			$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];
			$ConceptoDescripcion = mysqli_real_escape_string($conn3,funcionMaster($_POST['concepto'][$key],'id','Descripcion','ConceptosBanco'));

			mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
			(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
			values  
			('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','$Monto_debe','$Monto_haber',' $ConceptoDescripcion ','$ultimoCompDiarios')") or die(mysqli_error($conn3));
			
		}

	}
	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));


	/*
	$balance=$balanceActual-$monto;
	
	mysqli_query($conn3,"INSERT INTO Stransbanco 
		(idBanco, fechaTrans, Documento, tipo, Concepto, debito, Balance, beneficiario)
		values 
		('$idBanco','$date','$nDoc','$tipoOper','$detalleMovimiento','$monto','$balance','$beneficiario')");



	$queryList=mysqli_query($conn3,"SELECT sb.id as idBan, st.id as idTrans, st.fechaTrans, st.Documento, st.tipo, st.Concepto, st.debito, st.credito, st.balance
		from Sbancos sb
		right join Stransbanco st on sb.id=st.idBanco
		where sb.id=$beneficiario order by idTrans desc limit 1;");
	$nrowl=mysqli_num_rows($queryList);
	while($rowMotorizado=mysqli_fetch_array($queryList))
	{
		$balanceReceptor=$rowMotorizado['balance'];	
	}
	$balanceReceptor=$balanceActual+$monto;

	mysqli_query($conn3,"INSERT INTO Stransbanco 
		(idBanco, fechaTrans, Documento, tipo, Concepto, credito, Balance)
		values 
		('$beneficiario','$date','$nDoc','$tipoOper','$detalleMovimiento','$monto','$balanceReceptor')");
	*/



}

else if ($tipoOper=="TFE") {

	//////////////////////////////////////////////////
	$idBanco=$_POST['idBanco'];
	$nDoc=$_POST['nDoc'];
	$monto=$_POST['monto'];
	$proveedor=$_POST['proveedor'];
	$cantidadLetraTFI=$_POST['cantidadLetraTFI'];

	$detalleMovimiento=$_POST['detalleMovimiento'];
	$fechaCheque=$_POST['fechaCheque'];
	$fechaChequeLibera=$_POST['fechaChequeLibera'];

	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance-$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");
	/////////////////////////////////////////////////

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto, tipo_beneficiario)
	values 
	('$idBanco','$date','$nDoc', '$proveedor', '$cantidadLetraTFI', '$tipoOper','$detalleMovimiento','$monto','0','$BalanceActual','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto','2')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	foreach ($_POST['CuentaContable'] as $key => $value) {
		if($key=="0"){
			$Tipo="0";
		}else{
			$Tipo="1";
		}
			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];

			$idCuentaContable = $value;
			$Concepto = $_POST['concepto'][$key];

			mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha,tipo_cliente)
			values 
			('$Stransbanco_id','$idCuentaContable','$Monto_debe','$Monto_haber', '$Concepto', '$Tipo', '$usuario_id','$proveedor','$date_time','2')") or die(mysqli_error($conn3));
		
		$CantidadFilas++;
	}
	
	if($proveedor=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="2";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$idBanco} - TF Egreso | $detalleMovimiento','$MontoFinalDebe','$MontoFinalHaber','$CantidadFilas','','0','$idCentroCosto','8','$usuario_id','$proveedor','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($idBanco,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','0','$monto',' Movimiento de cheque [TF Egreso] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	foreach ($_POST['CuentaContable'] as $key => $value) {

		if($key!="0"){
			$idCuentaContable = $value;
			$NombreCuenta = funcionMaster($idCuentaContable,'id','descripcion','CCuentas');

			$Monto_debe = $_POST['debe'][$key];
			$Monto_haber = $_POST['haber'][$key];
			$ConceptoDescripcion = mysqli_real_escape_string($conn3,funcionMaster($_POST['concepto'][$key],'id','Descripcion','ConceptosBanco'));

			mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
			(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
			values  
			('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContable',0,'$NombreCuenta','$Monto_debe','$Monto_haber',' $ConceptoDescripcion ','$ultimoCompDiarios')") or die(mysqli_error($conn3));
			
		}

	}
	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));

}



else if ($tipoOper=="TFB") {

	//////////////////////////////////////////////////
	$nDoc=$_POST['nDoc'];
	$monto=$_POST['monto'];
	$beneficiario=$_POST['beneficiario'];
	$cantidadLetraTFB=$_POST['cantidadLetraTFB'];
	$fechaCheque=$_POST['fechaCheque'];
	$fechaChequeLibera=$_POST['fechaChequeLibera'];

	///////////////////////////////////////////////
	
	$BancoActual_id=$_POST['BancoActual_id'];
	$CuentaContableBanco = funcionMaster($BancoActual_id,'id','idCuentaContable','Sbancos');
	$CuentaContableBanco_debe = $_POST['CuentaContableBanco_debe'];
	$detalleMovimientoBancoDebito=$_POST['detalleMovimientoBancoDebito'];

	//////////////////////////////////////////////////

	$BancoTransferir_id=$_POST['BancoTransferir_id'];
	$CuentaContableBancoTransferir = funcionMaster($BancoTransferir_id,'id','idCuentaContable','Sbancos');
	$CuentaContableBancoTransferir_haber = $_POST['CuentaContableBancoTransferir_haber'];
	$detalleMovimientoBancoCredito=$_POST['detalleMovimientoBancoCredito'];

	///////////////////////////////////////////////////
	$usuario_id = $_POST['usuario_id'];

	$BalanceActual = round($balance-$monto,2);
	$idCentroCosto = $_POST['idCentroCosto'];

	$date_time=date("Y-m-d H:i:s");
	/////////////////////////////////////////////////








	//////////////////////////////////////////////////////////////////////////////* Primer Movimiento /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto, tipo_beneficiario)
	values 
	('$BancoActual_id','$date','$nDoc', '$beneficiario', '$cantidadLetraTFB', '$tipoOper','$detalleMovimientoBancoDebito','$monto','0','$BalanceActual','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto','1')") or die(mysqli_error($conn3));
	$Stransbanco_id = mysqli_insert_id($conn3);

	mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
		(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha,tipo_cliente)
		values 
		('$Stransbanco_id','$CuentaContableBanco','0','$monto', '0', '0', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));

	mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha,tipo_cliente)
			values 
			('$Stransbanco_id','$CuentaContableBanco_debe','$monto','0', '0', '1', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));

	if($beneficiario=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="1";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante','$fechaComprobante',0,0,'Movimiento Banco #{$BancoActual_id} - TF Banco - Debito | $detalleMovimientoBancoDebito','$monto','$monto','2','','0','$idCentroCosto','8','$usuario_id','$beneficiario','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($BancoActual_id,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	$NombreCuentaDebe = funcionMaster($CuentaContableBanco_debe,'id','descripcion','CCuentas');
	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','0','$monto',' Movimiento de cheque [TF Banco] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante','$fechaComprobante',0,0,0,'$CuentaContableBanco_debe',0,'$NombreCuentaDebe','$monto','0',' Movimiento de cheque [TF Banco] ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id'") or die(mysqli_error($conn3));

	//////////////////////////////////////////////////////////////////////////////* [FIN] Primer Movimiento /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////



	$queryList=mysqli_query($conn3,"SELECT * FROM Stransbanco WHERE idBanco=$BancoTransferir_id ORDER BY id DESC LIMIT 1;");
	while($rowMotorizado=mysqli_fetch_array($queryList))
	{
		$BalanceBancoTransferir=$rowMotorizado['Balance'];	
	}
	$BalanceActualBancoTransferir= $BalanceBancoTransferir + $monto;
	//$BalanceBancoTransferir = funcionMaster($BancoTransferir_id,'id','','Sbancos');
	//////////////////////////////////////////////////////////////////////////////* Segundo Movimiento /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	mysqli_query($conn3,"INSERT INTO Stransbanco 
	(idBanco, fechaTrans, Documento, id_beneficiario, MontoLetras, tipo, DetalleMovimiento, debito, credito, Balance, fechaCheque, fechaChequeLibera, usuario_id, idCentroCosto, tipo_beneficiario)
	values 
	('$BancoTransferir_id','$date','$nDoc', '$beneficiario', '$cantidadLetraTFB', '$tipoOper','$detalleMovimientoBancoCredito','0','$monto','$BalanceActualBancoTransferir','$fechaCheque','$fechaChequeLibera', '$usuario_id','$idCentroCosto','1')") or die(mysqli_error($conn3));
	$Stransbanco_id1 = mysqli_insert_id($conn3);

	mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
		(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha,tipo_cliente)
		values 
		('$Stransbanco_id1','$CuentaContableBancoTransferir','$monto','0', '0', '0', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));

	mysqli_query($conn3,"INSERT INTO StransbancoDetalles 
			(Stransbanco_id,idCuentaContable, debe, haber, concepto, tipo, usuario_id, cliente_id, fecha,tipo_cliente)
			values 
			('$Stransbanco_id1','$CuentaContableBancoTransferir_haber','0','$monto', '0', '1', '$usuario_id','$beneficiario','$date_time','1')") or die(mysqli_error($conn3));

	if($beneficiario=="0"){
		$tipoTercero="0";
	}else{
		$tipoTercero="1";
	}
	//Cuenta General
	mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,tipo_comprobante,usuario_id, tercero_id, tipo_tercero)
	values 
	('$numerocomprobante_soloparatransferenciaentrebancos','$fechaComprobante',0,0,'Movimiento Banco #{$BancoTransferir_id} - TF Banco - Credito | $detalleMovimientoBancoCredito','$monto','$monto','2','','0','$idCentroCosto','8','$usuario_id','$beneficiario','$tipoTercero')") or die(mysqli_error($conn3));

	$ultimoCompDiarios = mysqli_insert_id($conn3);

	//////////////////////////////////?CuentaMovimientos

	$idCuentaContableBanco = funcionMaster($BancoTransferir_id,'id','idCuentaContable','Sbancos');
	$NombreCuentaBanco = funcionMaster($idCuentaContableBanco,'id','descripcion','CCuentas');

	$NombreCuentaHaber = funcionMaster($CuentaContableBancoTransferir_haber,'id','descripcion','CCuentas');

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante_soloparatransferenciaentrebancos','$fechaComprobante',0,0,0,'$idCuentaContableBanco',0,'$NombreCuentaBanco','$monto','0',' Movimiento de cheque [TF Banco] | Cuenta Banco ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numerocomprobante_soloparatransferenciaentrebancos','$fechaComprobante',0,0,0,'$CuentaContableBancoTransferir_haber',0,'$NombreCuentaHaber','0','$monto',' Movimiento de cheque [TF Banco] ','$ultimoCompDiarios')") or die(mysqli_error($conn3));

	mysqli_query($conn3,"UPDATE Stransbanco set Movimiento_id = '$ultimoCompDiarios' WHERE id = '$Stransbanco_id1'") or die(mysqli_error($conn3));

	//////////////////////////////////////////////////////////////////////////////* [FIN] Segundo Movimiento /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

}


echo "Registro operacion Banco<br>";


echo '<script>window.location="../bancosTransferencias";alert("Registro Creado")</script>';
?>