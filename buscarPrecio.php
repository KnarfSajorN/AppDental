<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $codigoProd 	= $_POST['codigoProd'];
    


//echo "$codigoProd - $cantidad - $usuario_id";
 
 $queryinv=mysqli_query($conn3,"SELECT * FROM  examenes_22 where id = '$codigoProd'  ");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$precio       =$rowinv['precio']; 

}  

	// <input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" onChange="multiplicar();" value="'.$precio.'" required>    
   echo '<input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" onChange="multiplicar();" value="'.$precio.'" required> ';
 
?>