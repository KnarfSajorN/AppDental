<?php 
include '../funciones/conn3.php';
include '../funciones/funciones.php';

$pisoDesc = $_POST['pisoDesc'];
$numeroDeCamillas = $_POST['numeroDeCamillas'];
$tipoCamilla = $_POST['tipoCamilla'];
$idPiso = $_POST['idPiso'];
$fechaActual = date("Y-m-d");


$nombreAutomaticoCamilla = $maximaHabitacion . "-".$i;
mysqli_query($conn3, "INSERT INTO ho_camilla(descripcion,idHabitacion) VALUES('$nombreAutomaticoCamilla', '$maximaHabitacion')");



//echo "INSERT INTO ho_habitaciones(descripcion,fechaCreacion,disponible,numeroCamillas,pisoId) VALUES('$pisoDesc', '$fechaActual', '0', '$numeroDeCamillas','$pisoId')";


 ?>