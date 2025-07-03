<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$email 		= $_POST['email']; 


	$queryList=mysqli_query($conn3,"SELECT count(ID) as cuantos FROM  usuarios where USUARIO = '$email'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $cuantos      =$rowMotorizado['cuantos'];
	    }
 if ($cuantos > 0) {
  echo ' <font color="red"> Usuario ya registrado </font> ';
 }
  




?>