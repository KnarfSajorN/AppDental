<?php 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$date=date("Y-m-d");

$nCuenta=$_POST['nCuenta'];
$descripcion=$_POST['descripcion'];
$tipo=$_POST['tipo'];
$descripcionDetalle=$_POST['descripcionDetalle'];
$sucursal=$_POST['sucursal'];
$contacto=$_POST['contacto'];
$direccion=$_POST['direccion'];
$moneda=$_POST['moneda'];
$telefono=$_POST['telefono'];
$fax=$_POST['fax'];
$email=$_POST['email'];
$idBanco=$_POST['idBanco'];


// cuenta contable y centro
/*
if ($_POST['idCentroCosto']<>0) {
	$idCentroCosto =$_POST['idCentroCosto'];
	mysqli_query($conn3,"UPDATE Sbancos set idCentroCosto = '$idCentroCosto' where id=$idBanco");
}else{
	$idCentroCosto=0;
}

if ($_POST['idCuentaContable']<>0) {
	$idCuentaContable =$_POST['idCuentaContable'];
	mysqli_query($conn3,"UPDATE Sbancos set idCuentaContable = '$idCuentaContable' where id=$idBanco");
}else{
	$idCuentaContable=0;
}
*/
// cuenta contable y centro

echo "Actualizar Banco<br>";

// echo "UPDATE Sbancos set 
// 	nCuenta = '$nCuenta',
// 	descripcion = '$descripcion',
// 	tipo = '$tipo',
// 	descripcionDetalle = '$descripcionDetalle',
// 	sucursal = '$sucursal',
// 	contacto = '$contacto',
// 	direccion = '$direccion',
// 	moneda = '$moneda',
// 	telefono = '$telefono',
// 	fax = '$fax',
// 	email = '$email' where id=$idBanco";


mysqli_query($conn3,"UPDATE Sbancos set 
	nCuenta = '$nCuenta',
	descripcion = '$descripcion',
	tipo = '$tipo',
	descripcionDetalle = '$descripcionDetalle',
	sucursal = '$sucursal',
	contacto = '$contacto',
	direccion = '$direccion',
	moneda = '$moneda',
	telefono = '$telefono',
	fax = '$fax',
	fax = '$fax',
	email = '$email' where id=$idBanco"); 

echo '<script>window.location.href="../bancosRegistro";alert("Registro Actualizado")</script>';


 ?>