<?php 
include 'funciones/conn3.php';
session_start();
include 'verificarSesion.php';
$tchai = $_POST['tchai'];
$tchai = base64_decode($tchai); 
mysqli_query($conn3, "INSERT INTO SinvDepBorrados select * from SinvDep where id = $tchai limit 1");
mysqli_query($conn3, "DELETE FROM SinvDep where id = $tchai limit 1");
echo json_encode(array('estatus' => true, 'msg' => 'Borrado con éxito'));
?>