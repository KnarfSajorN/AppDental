<?php 
include '../funciones/conn3.php';

// post
$tipoDoc = $_POST['tipoDoc'];
$documento = $_POST['documento'];
$ID_principal = $_POST['ID_principal'];

$query = "SELECT * from cliente where tipo_cliente = '{$tipoDoc}' and CODI_CLIENTE = '{$documento}' and ID_principal = '{$ID_principal}' limit 1";
$result = mysqli_query($conn3, $query);
$row = mysqli_fetch_array($result);

echo json_encode($row);
?>