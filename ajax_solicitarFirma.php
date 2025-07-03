<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
include '../masterFunciones.php';






/*
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $codigoProd 	= $_POST['codigoProd'];
    $usuario_id 	= $_POST['usuario_id'];


//echo "$codigoProd - $cantidad - $usuario_id";
 
 $queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$tipo         =$rowinv['tipo'];
$costo        =$rowinv['costo'];
$precio       =$rowinv['precio']; 
$existencia   =$rowinv['existencia']; 

}
*/
	    
   echo 'Enviado';
 
?>