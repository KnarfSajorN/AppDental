<?php
include 'header.php';
include 'menu.php';

date_default_timezone_set('America/Bogota');

$id = $_GET['id'];          

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


mysqli_query($conn3,"DELETE FROM pos WHERE id = $id limit 1");



echo "<script language='Javascript'> window.location='AgregarMedicamento.php?msg=2';</script>"; 

?>