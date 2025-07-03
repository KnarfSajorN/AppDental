<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
$valor =0;
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $codigoProd 	= $_POST['codigoProd'];
    $cantidad 		= $_POST['cantidad'];
    $usuario_id 	= $_POST['usuario_id'];
    $valor 	= $_POST['valor'];


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

if ($valor == 0) {
	$valor = $costo;
}

 mysqli_query($conn3, "INSERT INTO operacioninv (ususario_id, codigoProd, cantidad, tipo, fecha, estado, costo, precio) 
                    VALUES ('$usuario_id', '$codigoProd','$cantidad', '$tipo', current_timestamp(), '0', '$valor', '$precio');");

mysqli_query($conn3,"update sinvetrios set costo = '$valor' where usuario_id = '$usuario_id'  and ID = $codigoProd");

//echo "INSERT INTO operacioninv (ususario_id, codigoProd, cantidad, tipo, fecha, estado, costo, precio)  VALUES ('$usuario_id', '$codigoProd','$cantidad', '$tipo', current_timestamp(), '0', '$costo', '$precio');";

 
echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Referencia  </th> <th>  Descripción   </th> <th> Cantidad </th><th> Costo </th><th> Precio </th>';

$queryList=mysqli_query($conn3,"SELECT * FROM  operacioninv where ususario_id = '$usuario_id'  and estado = 0");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
	$idOper     =$rowMotorizado['id'];
	$codigoProd =$rowMotorizado['codigoProd'];
	$cuantos    =$rowMotorizado['cuantos'];
	$cantidad   =$rowMotorizado['cantidad'];
	$costo      =$rowMotorizado['costo'];
	$precio     =$rowMotorizado['precio'];


		$queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");
		$nrowl=mysqli_num_rows($queryinv);
		while($rowinv=mysqli_fetch_array($queryinv))
		{
			$referencia1      =$rowinv['referencia'];
			$descripcion1     =$rowinv['descripcion'];
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