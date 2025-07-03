<?php
include 'funciones/conn3.php';
$mensaje = $_POST['mensaje'];
$tipo = $_POST['tipo'];
$idUsuario = $_POST['idUsuario'];
$idChat = $_POST['idChat'];
$nombre = $_POST['nombre'];
$timestamp = date("Y-m-d H:i:s");

//$q = "INSERT INTO mensajes values (NULL,'$mensaje','$timestamp','1','$tipo','$idUsuario', '$idChat', '$nombre')";

mysqli_query($conn3,"INSERT INTO mensajes values (NULL,'$mensaje','$timestamp','1','$tipo','$idUsuario', '$idChat', '$nombre')");
//echo "INSERT INTO mensajes values (NULL,'$mensaje','$timestamp','1','$tipo',$idUsuario, $idUsuario)";
echo '<font color"blue">Enviado</font>';

//$res = mysql_query($q) or die (mysql_error());
//header("Location: form.php");
?>   