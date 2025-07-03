<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $usuario_id 	= $_POST['usuario_id'];

  

$queryinv=mysqli_query($conn3,"SELECT * FROM sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");
$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{

	$referencia1      =$rowinv['referencia'];
	$descripcion1      =$rowinv['descripcion'];
	 
}



echo '<tr> <th> <input type="hidden"  value="'.$idOper.'" class="form-control input-lg" id="idOper" name="idOper" > <a href="#"  onclick="eliminarItem();"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a>  
'.$referencia1.'  </th> <th>  '.$descripcion1.'  </th> <th> '.$cantidad.' </th><th> '.$costo.' </th><th>  '.$precio.'</th> 
';
$cantidadT = $cantidad+$cantidadT;
$costoT= $costo+$costoT;
$precioT= $precio+$precioT;

}
echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';
	    
   echo '</table></h6>';


?>