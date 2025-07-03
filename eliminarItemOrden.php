<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $idOper 	= $_POST['idOper'];
 
    $usuario_id 	= $_POST['usuario_id'];

 

 mysqli_query($conn3, "delete from operacioninv where ususario_id = '$usuario_id' and id = $idOper;");

 
 
echo '<h6><table border="1" style="undefined;table-layout: fixed; width: 100%">
<tr> <th>  Referencia  </th> <th>  Descripción   </th> <th> Costo </th> <th> Cantidad </th><th> Costo Total</th><th> Precio </th><th> Impuesto </th>';

$queryList=mysqli_query($conn3,"SELECT * FROM  operacioninv where ususario_id = '$usuario_id'  and estado = 0");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
$idOper      =$rowMotorizado['id'];
$codigoProd      =$rowMotorizado['codigoProd'];
$cuantos      =$rowMotorizado['cuantos'];
$cantidad      =$rowMotorizado['cantidad'];
$costo      =$rowMotorizado['costo'];
$precio      =$rowMotorizado['precio'];


$queryinv=mysqli_query($conn3,"SELECT * FROM  sinvetrios where usuario_id = '$usuario_id'  and ID = $codigoProd");
$nrowl=mysqli_num_rows($queryinv);
while($rowinv=mysqli_fetch_array($queryinv))
{
$referencia1      =$rowinv['referencia'];
$descripcion1      =$rowinv['descripcion'];
 

}
$costo_total = $costo*$cantidad;

/*
echo '<tr> <th> <input type="hidden"  value="'.$idOper.'" class="form-control input-lg" id="idOper" name="idOper" > <a href="#"  onclick="eliminarItem();"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a>  
'.$referencia1.'  </th> <th>  '.$descripcion1.'  </th> <th> '.$cantidad.' </th><th> '.$costo.' </th><th>  '.$precio.'</th> 
';
$cantidadT = $cantidad+$cantidadT;
$costoT= $costo+$costoT;
$precioT= $precio+$precioT;

}
echo '<tr> <th>   </th> <th> Totales </th> <th> '.$cantidadT.' </th><th> '.$costoT.' </th><th>  '.$precioT.' </th>';
	    
   echo '</table></h6>';
*/

echo '<tr> <th> <input type="hidden"  value="'.$idOper.'" class="form-control input-lg" id="idOper" name="idOper" > <a href="#"  onclick="eliminarItem();"> <font size="5"> <strong>  <i class="fa fa-trash"></i>   </strong>  </font> </a>  
	'.$referencia1.'  </th> <th>  '.$descripcion1.'  </th> <th> '.$costo.' </th><th> '.$cantidad.' </th><th> '.$costo_total.' </th><th>  '.$precio.'</th><th>  '.$porcentaje.'</th>  
	';

	$cantidadT = $cantidad+$cantidadT;
	$costoT= $costo+$costoT;
	$precioT= $precio+$precioT;
	$porcentajeT= $porcentaje+$porcentajeT;
	$costoTotalFinal=$costoTotalFinal+$costo_total;

}
echo '<tr> <th>   </th> <th> Totales </th> <th> '.$costoT.' </th> <th> '.$cantidadT.' </th> <th> '.$costoTotalFinal.' </th> <th>  '.$precioT.' </th><th>  '.$porcentajeT.' </th>';
	    
   echo '</table></h6>';

echo "<div class='col-md-12'>
		<input type='hidden' name='Proveedor[Total]' id='total_proveedor' value='{$costoTotalFinal}'  placeholder='Monto Pagado' >
		<div class='col-md-4'> 
			<label>
				Numero de plazos
			</label>
			<select name='Proveedor[Plazos]' id='plazos' placeholder='Plazos' class='form-control input-lg'  onchange='Calcular_Pago_Plazo()'>
			<option value='1' selected>1</option>
			<option value='2'>2</option>
			<option value='3'>3</option>
			<option value='4'>4</option>
			<option value='5'>5</option>
			<option value='6'>6</option>
			<option value='7'>7</option>
			<option value='8'>8</option>
			<option value='9'>9</option>
			<option value='10'>10</option>
			<option value='11'>11</option>
			<option value='12'>12</option>
			</select>
		</div>
		<div class='col-md-4'> 
			<label>
				Valor a pagar por plazo
			</label>
			<input type='number' name='Proveedor[Pago_Plazo]' id='pago_plazos' value='{$costoTotalFinal}' placeholder='Plazo' class='form-control input-lg'  readonly>
		</div>
		<div class='col-md-4'> 
			<label>
				Se paga primer plazo?
			</label>
			<select name='Proveedor[Primer_Plazo]' class='form-control input-lg' >
			<option value='Si' selected>Si</option>
			<option value='No'>No</option>
			</select>
		</div>
</div>";


?>