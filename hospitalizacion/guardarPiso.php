<?php 
include '../funciones/conn3.php';

$pisoDesc = $_POST['pisoDesc'];
$fechaActual = date("Y-m-d");

foreach ($_POST['ho_piso'] as $postPisos) {
	$descripcion = $postPisos['descripcion'];
	$caracteristicas = $postPisos['caracteristicas'];
	mysqli_query($conn3, "INSERT INTO ho_piso(despcripcion,fechacreacion,caracteristicas) VALUES('$descripcion','$fechaActual','$caracteristicas')");
}


echo "<script>history.back()</script>";


 ?>