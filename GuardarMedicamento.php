<?php
include 'header.php';
include 'menu.php';

date_default_timezone_set('America/Bogota');

$nombre_medicamento = $_POST['nombre_medicamento'];
$concentracion_medicamento = $_POST['concentracion_medicamento'];        
$idUsuario = $_POST['idUsuario'];          



$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


mysqli_query($conn3,"INSERT INTO pos (descripcion,concentracion) VALUES 
 ('$nombre_medicamento' ,'$concentracion_medicamento');");



echo "<script language='Javascript'> window.location='AgregarMedicamento.php?msg=1';</script>"; 

?>