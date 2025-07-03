<?php
date_default_timezone_set('America/Bogota');
 
include("funciones/funciones.php");
 
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

$valortotal=0;
 
$select_1 = explode("//",$_POST['select_1']);
$puntaje_edad = $select_1[0];
$valortotal= $valortotal + $puntaje_edad;

$select_2 = $_POST['select_2']; 
foreach ($select_2 as $v) 
{
$paridad_arreglo = explode("//",$v);
$paridad_numero = $paridad_arreglo[0];
$valortotal = $valortotal + $paridad_numero;
}

$select_3 = $_POST['select_3'];
foreach ($select_3 as $b) 
{
$antecedentes_arreglo = explode("//",$b);
$antecedentes_numero = $antecedentes_arreglo[0];
$valortotal = $valortotal + $antecedentes_numero;
} 

$select_4 = $_POST['select_4'];
foreach ($select_4 as $n) 
{
$embarazo_arreglo = explode("//",$n);
$embarazo_numero = $embarazo_arreglo[0];
$valortotal = $valortotal + $embarazo_numero;
} 

$name = $_POST['name']; 

 

  echo '<div class="form-group col-md-6"><label> TOTAL RIESGO OBSTÉTRICO </label>';
  echo '<input  type="text" name="'.$name.'"  class="form-control input-lg" value="'.$valortotal.'" readonly>';
  echo '</div>';

  if($valortotal < 3)
  {
  	echo '<div class="form-group col-md-6"><label> &nbsp; </label>';
  	echo '<input  type="text" name="Tipo_Riesgo" class="form-control input-lg" value="BAJO RIESGO">';
  	echo '</div>';
  }

   if($valortotal >= 3)
  {
  	echo '<div class="form-group col-md-6"><label> &nbsp; </label>';
  	echo '<input  type="text" name="Tipo_Riesgo" class="form-control input-lg" value="ALTO RIESGO">';
  	echo '</div>';
  }
  
                    

 
	
 
 ?>