<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$idOper     = decrypt($_GET['iL']);
$vacuna     = decrypt($_GET['v']);

mysqli_query($conn3, "UPDATE lotes set activo = 0 where ID = '$idOper'");

echo "<script language='Javascript'> window.location='lotesInyeccion?eD=".encrypt($vacuna)."';</script>";

?>