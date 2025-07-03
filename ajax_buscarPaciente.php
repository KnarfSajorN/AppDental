<?php 
include 'funciones/conn3.php';

// post
$tipoDoc = $_POST['tipoDoc'];
$documento = $_POST['documento'];

$query = "SELECT * from cliente where tipo_cliente = '{$tipoDoc}' and CODI_CLIENTE = '{$documento}' limit 1";
$result = mysqli_query($conn3, $query);
$row = mysqli_fetch_array($result);

echo json_encode($row);
?>