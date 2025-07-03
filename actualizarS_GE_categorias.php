<?php 
date_default_timezone_set('America/Bogota');;
include("funciones/funciones.php");

$descripcion=$_POST['descripcion'];
$estado=$_POST['estado'];
$idcategoria=$_POST['idcategoria'];
$usuario_id=$_POST['usuario_id'];

echo "Actualizar Centro de Costos<br>";

mysqli_query($conn3,"UPDATE S_GE_categorias set 
	descripcion = '$descripcion',
	estado = '$estado',
	usuario_id = '$usuario_id'
	where id=$idcategoria"); 

echo '<script>window.location="S_GE_categorias";alert("Registro Actualizado")</script>';


?>