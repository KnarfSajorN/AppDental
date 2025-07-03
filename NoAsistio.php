<?php
include 'funciones/conn3.php';

$idCitas = $_GET['idCitas'];

mysqli_query($conn3, "UPDATE citas SET estado = '4' WHERE idCitas = $idCitas limit 1");

//echo "<script language='Javascript'> window.location='controlCitas';</script>";
echo "<script language='Javascript'> history.back();location.reload();</script>";
?>