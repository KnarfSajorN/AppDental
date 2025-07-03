<?php
 
include("funciones/funciones.php");
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


$cuantos = 0;

$direccionWeb 		= $_POST['direccionWeb'];

	$queryList=mysqli_query($conn3,"SELECT count(id) as cuantos FROM  c_catalogo where direccionWeb = '$direccionWeb'");
	    $nrowl=mysqli_num_rows($queryList);
	    while($rowMotorizado=mysqli_fetch_array($queryList))
	    {
		  $cuantos      =$rowMotorizado['cuantos'];
	    }


if ($cuantos > 0) 
{
	 	echo ' <font color="red"> NO DISPONIBLE </font>';	 
 
}
elseif ($cuantos == 0) {
 
 echo ' <font color="blue"> Nombre disponible </font>';	 
}
 

 ?>