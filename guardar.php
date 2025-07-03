<?php
session_start();
include 'funciones/conn3.php';
 
$idCitas = $_SESSION['idCitas'];
$ID = $_SESSION['ID'];
$idCliente = $_SESSION['idCliente'];

if (count($_FILES) <= 0 || empty($_FILES["video"])) 
{ 
    exit("No hay archivos");
}

# De dónde viene el vídeo y en dónde lo ponemos
$rutaVideoSubido = $_FILES["video"]["tmp_name"];
$nuevoNombre = uniqid() . ".webm"; 
$rutaDeGuardado = __DIR__ . "/videos/" . $nuevoNombre;
// Mover el archivo subido a la ruta de guardado
move_uploaded_file($_FILES["video"]["tmp_name"], $rutaDeGuardado);
// Imprimir el nombre para que la petición lo lea
$fecha = date("Y-m-d");
$hora  = date("G:i:s");

mysqli_query($conn3,"INSERT INTO videos (nombre, fecha, hora, idUsuario, idCliente, idCitas) VALUES ('$nuevoNombre', '$fecha', '$hora', '1', '0', '$idCitas');");

// mysqli_query($conn3,"update citas set videoPaciente = '$nuevoNombre' where idCitas = '$idCitas'");


echo $nuevoNombre;