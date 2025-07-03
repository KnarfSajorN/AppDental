<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$numero=$_POST['numero'];

// consultamos en CCompDiarioMov_temp para mostrar en el comprobante

echo'
<table class="table table-bordered table-striped" id="exaple1" style="width: 100%;">

<tbody>
';

$queryList=mysqli_query($conn3,"SELECT * FROM CCompDiarioMov where numero = '$numero' ");
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
// monto tipo banco detalle
	$idCuentaContable_=substr($cuentaT,0,1);

	$totaldebe=$totaldebe+$monto_debeT;
	$totalhaber=$totalhaber+$monto_haberT;
	$total=$totaldebe+$totalhaber;

	echo'
	<tr>
	<td><input disabled type="text" class="input-lg form-control" value="'.$monto_debeT.'"></td>
	<td><input disabled type="text" class="input-lg form-control" value="'.$descripcionT.'"></td>
	<td><input disabled type="text" class="input-lg form-control" value="'.$referenciaT.'"></td>
	<td><a class="btn btn-danger text-white"  onclick="removerMovimientoCompra('.$idT.')"><li class="fa fa-close"></li></a></td>
	</tr>
	';
}



echo'
</tbody>
</table>
';

echo'<input disabled type="hidden" class="input-lg form-control" name="total" id="total" value="'.$total.'">';

?>



