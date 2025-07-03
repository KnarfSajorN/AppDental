<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

   
    $vacuna 	= decrypt($_GET['v']);
    $eliminar	= decrypt($_GET['eD']);
    $grupo	= $_GET['grupo'];
 

if ($vacuna <> '') {
mysqli_query($conn3, "UPDATE listado_vacunas set activo = 0 where id = '$vacuna'"); 
echo "<script language='Javascript'> window.location='vacunacionGrupos?eD=$grupo';</script>";
}


if ($eliminar <> '') {
mysqli_query($conn3, "UPDATE grupos_vacunacion set activo = 0 where id = '$eliminar'");
echo "<script language='Javascript'> window.location='vacunacionRegistroVAG';</script>";
}
