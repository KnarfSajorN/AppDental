<?php 
date_default_timezone_set('America/Bogota');;
include("funciones/funciones.php");

$descripcion=$_POST['descripcion'];
$estado=$_POST['estado'];
$idcategoria=$_POST['idcategoria'];

echo "Actualizar Centro de Costos<br>";

mysqli_query($conn3,"UPDATE cajaMenorCategorias set 
	descripcion = '$descripcion',
	estado = '$estado'
	where id=$idcategoria"); 

echo '<script>window.location="Caja_Menor_Categorias";alert("Registro Actualizado")</script>';


?>