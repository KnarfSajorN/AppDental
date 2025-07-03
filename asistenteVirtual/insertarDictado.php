<?php
include '../funciones/conn3.php';

// recibir post
$mensaje = $_POST['mensaje'];
$usuario = $_POST['usuario'];

// formatear mensaje para que no de problemas al insertar en la base de datos
$mensaje = mysqli_real_escape_string($conn3, $mensaje);

// query
if ($mensaje != '' && $usuario != '') {
    $query = "INSERT INTO asistenteAuditor (idUsuario, mensaje) VALUES ('$usuario', '$mensaje')";
    $result = mysqli_query($conn3, $query);
}
