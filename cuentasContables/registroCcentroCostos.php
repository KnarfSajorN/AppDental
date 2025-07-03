<?php 
session_start(); 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$fecha=date("Y-m-d");
$hora=date("H:i:s");
$usuario_id=$_SESSION['ID'];


$descripcion=$_POST['descripcion'];

$pre=0+$_POST['pre'];
$mov=0+$_POST['mov'];
$act=0+$_POST['act'];

$centroPrincipal_id=$_POST['centroPrincipal_id'];

// cuando si es un sib-centro de costos
if ($centroPrincipal_id>0) {
	$subCentro=1;
	mysqli_query($conn3,"INSERT into CcentroCostos
	(descripcion, fechaReg, horaReg, pre, mov, act, subCentro, centroPrincipal_id)
	values 
	('$descripcion','$fecha','$hora','$pre','$mov','$act','$subCentro','$centroPrincipal_id')");
	
}else{
	mysqli_query($conn3,"INSERT into CcentroCostos
	(descripcion, fechaReg, horaReg, pre, mov, act)
	values 
	('$descripcion','$fecha','$hora','$pre','$mov','$act')");
}

echo "Registro Centro de Costos<br>";



echo '<script>window.location="../ccCentros";alert("Registro Creado")</script>';


 ?>