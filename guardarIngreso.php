<?php
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
date_default_timezone_set('America/Bogota');
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$prepare = preparePost($_POST, ['contentIdCliente']);
$cliente_id = preparePost($_POST['idCliente']);
$queryInsert = mysqli_query($conn3, "INSERT INTO historialIngreso SET {$prepare}");
if ($queryInsert) {
    echo "<script language='Javascript'> window.location='Historia_Clinica.php?clienteId=$cliente_id';</script>";
} else {
    echo "<script language='Javascript'> window.location='portada';</script>";
}
