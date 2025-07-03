<?php 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$Campo1 = mysqli_query($conn3, "show COLUMNS from CCompDiario WHERE Field = 'usuario_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `CCompDiario` ADD `usuario_id` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Totalizar Comprobante*'");
}
//////////////////////////////////////////////////////////////////////////////////////////////

$Campo1 = mysqli_query($conn3, "show COLUMNS from CCompDiario WHERE Field = 'tercero_id';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `CCompDiario` ADD `tercero_id` TEXT NULL DEFAULT '0' COMMENT ' *Creado desde Totalizar Comprobante*'");
}

$Campo1 = mysqli_query($conn3, "show COLUMNS from CCompDiario WHERE Field = 'tipo_tercero';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `CCompDiario` ADD `tipo_tercero` TEXT NULL DEFAULT '0' COMMENT ' 1-> cliente medical | 2-> proveedor *Creado desde Totalizar Comprobante*'");
}

/////////////////////////////////////////////////////////////////////////////////////////////////
$date=date("Y-m-d");


$numero=$_POST['numero'];
$fecha=$_POST['fecha'];
$descripcion=$_POST['descripcion'];
$detalle=''.$_POST['detalle'];
$usuario_id = $_POST['usuario_id'];

// cuenta contable y centro
if ($_POST['idCentroCosto']<>'') {
	$idCentroCosto =$_POST['idCentroCosto'];
}else{
	$idCentroCosto=0;
}

if ($_POST['idCuentaContable']<>'') {
	$idCuentaContable =$_POST['idCuentaContable'];
}else{
	$idCuentaContable=0;
}
// cuenta contable y centro


echo "<br>------------------------------- Registro Asiento contable - Maestro y Movimientos";


$queryList=mysqli_query($conn3,"SELECT count(id) as cuantos, sum(monto_debe) as sum_debe,sum(monto_haber) as sum_haber FROM CCompDiarioMov_temp where numero = '$numero';");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))
{	
	$cuantos=0+$row_recordset32['cuantos'];
	$sum_debe=0+$row_recordset32['sum_debe'];
	$sum_haber=0+$row_recordset32['sum_haber'];
	$saldo=$sum_debe-$sum_haber;
}

// numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada
// CCompDiario

$TipoTercero = $_POST['TipoTercero'];
$Tercero = $_POST['Tercero'];
// insertamos en el maestro
mysqli_query($conn3,"INSERT INTO CCompDiario 
	(numero, fecha, tipo, estado, descripcion, monto_debe, monto_haber, cant_movimientos, detallada, idCuentaContable, idCentroCosto,usuario_id,tercero_id,tipo_tercero)
	values 
	('$numero','$fecha',0,0,'$descripcion','$sum_debe','$sum_haber','$cuantos','$detalle','$idCuentaContable','$idCentroCosto','$usuario_id','$Tercero','$TipoTercero')");

/*
$queryList=mysqli_query($conn3,"SELECT max(id) as ultimo FROM CCompDiario;");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))
{	
	$ultimo=$row_recordset32['ultimo']+1;
}
*/
$ultimo = mysqli_insert_id($conn3);

// volcamos los registros temporales a la tabla real

//mysqli_query($conn3,"INSERT into CCompDiarioMov (select * from CCompDiarioMov_temp where numero='$numero');") or die(mysqli_error($conn3));

$queryList=mysqli_query($conn3,"SELECT *FROM CCompDiarioMov_temp where numero = '$numero';");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))
{	

	$fecha=$row_recordset32['fecha'];
	$cuenta=$row_recordset32['cuenta'];
	$descripcion=$row_recordset32['descripcion'];
	$monto_debe=$row_recordset32['monto_debe'];
	$monto_haber=$row_recordset32['monto_haber'];
	$referencia=$row_recordset32['referencia'];

	mysqli_query($conn3,"INSERT INTO CCompDiarioMov 
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numero','$fecha',0,0,0,'$cuenta',0,'$descripcion','$monto_debe','$monto_haber','$referencia','$ultimo')") or die(mysqli_error($conn3));
	
}


// le colocamos el id referente al comprobante
//mysqli_query($conn3,"UPDATE CCompDiarioMov set idComprobante='$ultimo' where numero='$numero' and idComprobante=0;");

// borrar los registros temporales
mysqli_query($conn3,"DELETE from CCompDiarioMov_temp where numero='$numero';");



echo '<script>window.location="../ccComprobantesM";alert("Asiento Contable Creado")</script>';
?>