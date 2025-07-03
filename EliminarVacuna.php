<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");


   
    $vacuna 	= decrypt($_GET['v']);

 mysqli_query($conn3, "UPDATE vacunas set activo = 0 where id = '$vacuna'"); 

echo "<script language='Javascript'> window.location='vacunacionRegistroV';</script>";

?>