<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



$name = $_POST['name']; 
$valor = $_POST['valor'];
$vdiv = intval($valor/3);

if($valor > 2)
{
  $valor=1*$vdiv;
}
elseif($valor <	3)
{
  $valor=0;
} 


  echo '<div class="form-group col-md-6"><label> SUB TOTAL </label> ';
  echo '<input  type="text" name="'.$name.'" id="totalidad" class="form-control input-lg" value="'.$valor.'" readonly>';
  echo '</div>';

  echo '<div class="form-group col-md-6"><label> &nbsp; </label>';
  echo 'Para asignar 1 punto deben estar presentes dos o tres síntomas de ansiedad';
  echo '</div>';

  
                    

 
	
 
 ?>