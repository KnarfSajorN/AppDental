<?php
date_default_timezone_set('America/Bogota');

include("funciones/conn3.php");


    $codigoProd 	= $_POST['codigoProd'];
    $usuario_id 	= $_POST['usuario_id'];
 
$queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where  ID = $codigoProd");
while($rowinv=mysqli_fetch_array($queryinv))
{

$tipo         =$rowinv['tipo'];
$costo        =$rowinv['costo'];
$precio       =$rowinv['precio']; 
//$porcentaje      = $rowinv['porcentaje']; 

}  

echo '<input type="number" class="form-control input-lg" id="2" name="base" placeholder="precio" step="any"  onChange="multiplicar();" value="'.$precio.'" required> ';
   
?>
