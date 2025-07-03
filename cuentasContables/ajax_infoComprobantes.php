<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$numero=$_POST['numero'];

// consultamos en CCompDiarioMov_temp para mostrar en el comprobante

echo'
<table class="table table-bordered table-striped" id="exaple1" style="width: 100%;">

<tbody>
';

$queryList=mysqli_query($conn3,"SELECT * FROM CCompDiarioMov_temp where numero = '$numero' ");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))
{
	$idT=$row_recordset32['id'];
	$numeroT=$row_recordset32['numero'];
	$fechaT=$row_recordset32['fecha'];
	$tipoT=$row_recordset32['tipo'];
	$estadoT=$row_recordset32['estado'];
	$asientoT=$row_recordset32['asiento'];
	$cuentaT=$row_recordset32['cuenta'];
	$id_ccostoT=$row_recordset32['id_ccosto'];
	$descripcionT=$row_recordset32['descripcion'];
	$monto_debeT=$row_recordset32['monto_debe'];
	$monto_haberT=$row_recordset32['monto_haber'];
	$referenciaT=$row_recordset32['referencia'];

	echo'
	<tr>
	<td><input disabled type="text" class="input-lg form-control" value="'.$cuentaT.'"></td>
	<td><input disabled type="text" class="input-lg form-control" value="'.$descripcionT.'"></td>
	<td><input disabled type="text" class="input-lg form-control" value="'.$referenciaT.'"></td>
	<td><input disabled type="text" class="input-lg form-control" value="'.$monto_debeT.'"></td>
	<td><input disabled type="text" class="input-lg form-control" value="'.$monto_haberT.'"></td>
	<td><a class="btn btn-danger text-white"  onclick="removerMovimiento('.$idT.')"><li class="fa fa-close"></li></a></td>
	</tr>
	';
}

echo'
</tbody>
</table>
';



?>



