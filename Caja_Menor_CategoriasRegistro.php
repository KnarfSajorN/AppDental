<?php 
session_start(); 
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$fecha=date("Y-m-d");
$hora=date("H:i:s");
$usuario_id=$_SESSION['ID'];


$descripcion=$_POST['descripcion'];

$categoriaPrincipal_id=$_POST['categoriaPrincipal_id'];

// cuando si es un sib-centro de costos
if ($categoriaPrincipal_id>0) {
	$subCentro=1;
	mysqli_query($conn3,"INSERT into cajaMenorCategorias
	(descripcion, fechaReg, horaReg, estado, subCategoria, categoriaPrincipal_id)
	values 
	('$descripcion', '$fecha', '$hora', '1', '$subCentro', '$categoriaPrincipal_id')");
	
}else{
	mysqli_query($conn3,"INSERT into cajaMenorCategorias
	(descripcion, fechaReg, horaReg, estado)
	values 
	('$descripcion', '$fecha', '$hora', '1')");
}

echo "Registro Centro de Costos<br>";



echo '<script>window.location="Caja_Menor_Categorias";alert("Registro Creado")</script>';


 ?>