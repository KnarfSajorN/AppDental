<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$numero=$_POST['numero'];

// consultamos en CCompDiarioMov_temp para mostrar en el comprobante

$queryList=mysqli_query($conn3,"SELECT sum(monto_debe) as sum_debe,sum(monto_haber) as sum_haber FROM CCompDiarioMov_temp where numero = '$numero';");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))
{
	$sum_debe=$row_recordset32['sum_debe'];
	$sum_haber=$row_recordset32['sum_haber'];

	$saldo=$sum_debe-$sum_haber;
	$totalizar='
		<script>
		document.getElementById("totalizar").style.display="none";
		</script>
		';

	if ($saldo<>0) {
		$estado='<h3 class="text-danger">NO CUADRA</h3>';
		$totalizar='
		<script>
		document.getElementById("totalizar").style.display="none";
		</script>
		';
	}else if ($sum_debe<>0 && $sum_haber<>0 && $saldo==0) {
		$estado='<h3 class="text-success">CUADRADO</h3>';
		$totalizar='
		<script>
		document.getElementById("totalizar").style.display="block";
		</script>
		';
	}
	
}

echo '
<div class="col-md-12">
<br>
<p><strong>Debe: </strong> '.$sum_debe.'</p>
<p><strong>Haber: </strong> '.$sum_haber.'</p>
<hr>
<p><strong>Saldo: </strong> '.$saldo.'</p>	
</div>
<div class="col-md-12 center text-center">
'.$estado.'
'.$totalizar.'
</div>

<input type="hidden" name="sum_debe" id="sum_debe" value="'.$sum_debe.'">
<input type="hidden" name="sum_haber" id="sum_haber" value="'.$sum_haber.'">
<input type="hidden" name="saldo" id="saldo" value="'.$saldo.'">

';


?>



