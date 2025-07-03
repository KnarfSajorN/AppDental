<?php 
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$descripcion=$_POST['descripcion'];
$pre=0+$_POST['pre'];
$mov=0+$_POST['mov'];
$act=0+$_POST['act'];
$estado=$_POST['estado'];
$idcentro=$_POST['idcentro'];

echo "Actualizar Centro de Costos<br>";

mysqli_query($conn3,"UPDATE CcentroCostos set 
	descripcion = '$descripcion',
	pre = '$pre',
	mov = '$mov',
	act = '$act',
	estado = '$estado'
	where id=$idcentro"); 

echo '<script>window.location="../ccCentros";alert("Registro Actualizado")</script>';


?>