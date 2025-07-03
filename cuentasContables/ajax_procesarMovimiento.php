<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$fecha=date("Y-m-d");

$numero=$_POST['numero'];
$fecha=$_POST['fecha'];
$descripcion=$_POST['descripcion'];
$cuenta=$_POST['cuenta'];
$descripcionM=$_POST['descripcionM'];
$referencia=$_POST['referencia'];
$debe=0+$_POST['debe'];
$haber=0+$_POST['haber'];

// insert en CCompDiarioMov_temp

$idT=0+$_POST['idT'];


if ($idT>0) {
	mysqli_query($conn3,"DELETE from CCompDiarioMov_temp  where id = '$idT'");
}else{
	mysqli_query($conn3,"INSERT INTO CCompDiarioMov_temp  
	(numero, fecha, tipo, estado, asiento, cuenta, id_ccosto, descripcion, monto_debe, monto_haber, referencia, idComprobante)
	values  
	('$numero','$fecha',0,0,0,'$cuenta',0,'$descripcionM','$debe','$haber','$referencia',0)");
}



echo'<p class="text-info">Ingresado!</p>';

?>
