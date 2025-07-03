<?php
date_default_timezone_set('America/Bogota');
include("header.php");

$idCitas = $_GET['idCitas'];

mysqli_query($conn3, "UPDATE citas SET estado = 3  WHERE idCitas = $idCitas limit 1");

$tipo = $_GET['tipo'];
if ($tipo == 1) {
	echo "<script language='Javascript'> window.location='videoConsultas?msg=1';</script>";
} else {
	echo "<script language='Javascript'> window.location='CL_Calendario.php';</script>";
}
