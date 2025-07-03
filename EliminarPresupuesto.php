<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$idOperacion     = $_GET['idOperacion'];

mysqli_query($conn3, "UPDATE sOperacionInv set activo = 0 where idOperacion = '$idOperacion' limit 1");

echo "UPDATE sOperacionInv set activo = 0 where idOperacion = '$idOperacion' limit 1";

echo "<script language='Javascript'> window.location='SclienteAdministracion_ControlPresupuesto?msg=2';</script>";
