<?php
date_default_timezone_set('America/Bogota');
include("funciones/conexiones.php");
include("funciones/funciones.php");
//$con=conectar();
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

 

$nit 		= $_POST['nit'];
$tipoVerificacion       = $_POST['tipoVerificacion']; 
$usuario_id 		= $_POST['usuario_id']; 



if ($tipoVerificacion == 1) {

	$queryList=mysqli_query($conn3,"SELECT count(id) as cuantos FROM  	v_clienteE where nit = '$nit' and usuario_id = $usuario_id");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $cuantos      =$rowMotorizado['cuantos'];
	    }
 if ($cuantos > 0) {
  echo ' <font color="red"> NIT ya registrado </font> ';
 }
  

}
	



if ($tipoVerificacion == 2) {

	$queryList=mysqli_query($conn3,"SELECT count(id) as cuantos FROM v_cliente where CODI_CLIENTE = '$nit' and usuario_id = $usuario_id");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $cuantos      =$rowMotorizado['cuantos'];
	    }
 if ($cuantos > 0) {
  echo ' <font color="red"> Cedula o Documento ya registrado </font> ';
 }
  

}
	




?>