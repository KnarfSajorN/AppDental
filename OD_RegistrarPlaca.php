<?php
  include 'header.php';
  //include "menu.php";

 $cliente_Id = $_POST['clienteId'];

 $ID = $_POST['ID'];




$superficie_placa = $_POST["resultado"];  

$dientes_removidos = $_POST["resultado2"];

$observaciones = $_POST["Observaciones"];
$porcenaje = $_POST["porcenaje"];

$idPlaca = $_POST["idPlaca"];

$fecha = date("Y-m-d");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


 

$query_insert = mysqli_query($conn3,"INSERT INTO odontogramaMasterIndiceCalculo (id_cliente,superficie_x_placa,dientes_ausentes,observaciones,fecha,usuario) 
       VALUES('$cliente_Id','$superficie_placa','$dientes_removidos','$observaciones','$fecha','$ID')");

$query_insert = mysqli_query($conn3,"UPDATE odontogramaMasterPlaca SET dientes_p = '$dientes_removidos', superficies = '$superficie_placa' ,Observaciones = '$observaciones', porcentaje = '$porcenaje' WHERE id = $idPlaca");
 

 echo "<script language='Javascript'> window.location='OD_HistorialOdontogramaPlaca?clienteId=$cliente_Id';</script>";
  
  
  

?>