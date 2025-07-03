<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));



$name = $_POST['name']; 
$valor = $_POST['valor'];



  echo '<div class="form-group col-md-6"><label> TOTAL RIESGO PSICOSOCIAL </label>';
  echo '<input  type="text" name="'.$name.'" class="form-control input-lg" value="'.$valor.'" readonly>';
  echo '</div>';

  if($valor < 2)
  {
  	echo '<div class="form-group col-md-6"><label> &nbsp; </label>';
  	echo '<input  type="text" name="Tipo_Riesgo" class="form-control input-lg" value="BAJO RIESGO">';
  	echo '</div>';
  }

   if($valor >= 2)
  {
  	echo '<div class="form-group col-md-6"><label> &nbsp; </label>';
  	echo '<input  type="text" name="Tipo_Riesgo" class="form-control input-lg" value="ALTO RIESGO">';
  	echo '</div>';
  }
  
                    

 
	
 
 ?>