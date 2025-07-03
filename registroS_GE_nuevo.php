<?php 
session_start(); 
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$fecha=date("Y-m-d");
$hora=date("H:i:s");



// recibimos el post
$fecha_ = $_POST['fecha'];
$mes_ = $_POST['mes'];
$descripcion_ = $_POST['descripcion'];
$monto_ = $_POST['monto'];
$tipo_ = $_POST['tipo'];
$categoria_ = $_POST['categoria'];
$usuario_id=$_POST['id_usuario'];
$sucursal = $_POST['sucursal'];
if ($sucursal == "") {
	$sucursal = "0";
}
////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
$Campo1 = mysqli_query($conn3, "show COLUMNS from S_GE_nuevo WHERE Field = 'sucursal';");
$nrowCampo1 = mysqli_num_rows($Campo1);
if ($nrowCampo1 == "0") {
	mysqli_query($conn3, "ALTER TABLE `S_GE_nuevo` ADD `sucursal` TEXT NULL DEFAULT '0'  ");
}

mysqli_query($conn3,"INSERT into S_GE_nuevo
    (fecha,mes,descripcion,monto,tipo,categoria,usuario_id,fecha_creacion,hora_creacion,sucursal)	
	values 
	('$fecha_','$mes_','$descripcion_','$monto_','$tipo_','$categoria_','$usuario_id','$fecha','$hora','$sucursal')");


echo '<script>window.location="S_GE_control";alert("Registro Creado")</script>';


 ?>