<?php
include("funciones/funciones.php");

$where = $_POST['where'];
$value = $_POST['value'];
$texto = $_POST['texto'];
$tabla = $_POST['tabla'];
//where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
echo selectMaster($where,$value,$texto,$tabla);

?>