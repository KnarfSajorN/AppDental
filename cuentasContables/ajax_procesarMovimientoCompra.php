<?php
session_start();
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$fecha=date("Y-m-d");
$ID=$_SESSION['ID'];

$monto=$_POST['monto'];
$tipoPago=$_POST['tipoPago'];
$banco=$_POST['banco'];
$detalle=$_POST['detalle'];
$idOperaheader=$_POST['idOperaheader'];
$idOperaheader_=$_POST['idOperaheader_'];
$idT=$_POST['idT'];

// numeración de los distintos documentos - FC 000001 Factura de Compra

// CODIGOS Y COMO SE MUEVEN
// 1 activO debe
// 5 gastos debe
// 6 costos de ventas debe
// 7 costos de produccion debe
// 9 cuentas de orden acreedoras debe

// 2 pasivo haber
// 3 patrimonio haber
// 4 ingreso haber
// 8 cuentas de orden deudoras haber

$queryList=mysqli_query($conn3,"SELECT * from STipoPago where id='$tipoPago';");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{	
	$descripcion=$rowMotorizado['descripcion'];
	$idCuentaContable=$rowMotorizado['idCuentaContable'];
	$idCentroCosto=$rowMotorizado['idCentroCosto'];
	$idCuentaContable_=substr($idCuentaContable,0,1);
}

if ($idT>0) {
	mysqli_query($conn3,"DELETE from CCompDiarioMov  where id = '$idT'");
	mysqli_query($conn3,"DELETE from CCompDiarioMov_Operacion  where asientos = '$idT'");
	
}


if ($idCuentaContable_==1 or $idCuentaContable_==5 or $idCuentaContable_==6 or $idCuentaContable_==7 or $idCuentaContable_==9) {
	// aumenta por el debe
	mysqli_query($conn3,"INSERT INTO CCompDiarioMov
		(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
		values  
		('$idOperaheader_','$fecha',0,0,0,'$idCuentaContable','$idCentroCosto','$descripcion','$monto','0','$detalle',0)");

	$queryListO=mysqli_query($conn3,"SELECT max(id) as lastId from CCompDiarioMov");
	$nrowlO=mysqli_num_rows($queryListO);
	while($rowMotorizadoO=mysqli_fetch_array($queryListO))
	{
		$lastId=$rowMotorizadoO['lastId'];
	}
	mysqli_query($conn3,"INSERT INTO CCompDiarioMov_Operacion (idUsuario,idOperacion,asientos,tipo) values ('$ID','$idOperaheader','$lastId','compra')");

	
}else if ($idCuentaContable_==4 or $idCuentaContable_==3 or $idCuentaContable_==4 or $idCuentaContable_==8) {
	// aumenta por el debe
	mysqli_query($conn3,"INSERT INTO CCompDiarioMov
		(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
		values  
		('$idOperaheader_','$fecha',0,0,0,'$idCuentaContable','$idCentroCosto','$descripcion','0','$monto','$detalle',0)");

	$queryListO=mysqli_query($conn3,"SELECT max(id) as lastId from CCompDiarioMov");
	$nrowlO=mysqli_num_rows($queryListO);
	while($rowMotorizadoO=mysqli_fetch_array($queryListO))
	{
		$lastId=$rowMotorizadoO['lastId'];
	}
	mysqli_query($conn3,"INSERT INTO CCompDiarioMov_Operacion (idUsuario,idOperacion,asientos,tipo) values ('$ID','$idOperaheader','$lastId','compra')");

	
}


// insert en CCompDiarioMov_temp


echo'<p class="text-info">Ingresado!</p>';

?>


