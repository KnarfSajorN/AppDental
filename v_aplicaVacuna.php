<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$cuantasVacunas = 0;

$id = $_GET['id'];

$fecha = date("Y-m-d");
$hora = date("h:m:s");


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 

//echo "$codigoProd - $cantidad - $usuario_id";
 
 mysqli_query($conn3,"update v_historiaClinica3 set aplicada = 1, fecha = '$fecha', hora = '$hora' where id = $id");

	    
echo "<script language='Javascript'> window.location='v_finalizadoTratamiento3.php?historiaClinica3=$id';</script>"; 


?>