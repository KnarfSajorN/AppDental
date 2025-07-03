<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$cuantasVacunas = 0;
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $vacuna 	= $_POST['vacuna'];
    $usuario_id 	= $_POST['usuario_id'];
    $clienteId 	= $_POST['clienteId'];


//echo "$codigoProd - $cantidad - $usuario_id";
 
 $queryinv=mysqli_query($conn3,"SELECT * FROM  v_servicios where usuario_id = '$usuario_id'  and id = $vacuna");

$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

$nombre       = $rowinv['nombre'];
$descripcion  = $rowinv['descripcion'];
$periodo      = $rowinv['periodo']; 
$edadMinima   = $rowinv['edadMinima']; 
$edadMaximo   = $rowinv['edadMaximo']; 
$cuantas      = $rowinv['cuantas']; 
$siglas       = $rowinv['siglas']; 

}

	    
   

echo ' <table border="1"   style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Nombre  </th><th>Descripción </th><th>Edad Mínima </th>
<th>Edad Máximo </th> </tr>';
echo '<tr> <th>'.$siglas.'  '.$nombre .'  </th><th>'.$descripcion .' </th>
<th>'.$edadMinima .' </th> 
<th>'.$edadMaximo .' </th> 
</tr>';
echo '</table> ';

echo '<br> <strong> <font color="red"> Esta vacuna debe ser aplicada '.$cuantas.' veces,  cada '.$periodo.' días </font> </strong>';


?>