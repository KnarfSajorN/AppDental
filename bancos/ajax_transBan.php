<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$banco=$_POST['banco'];

$queryList=mysqli_query($conn3,"SELECT * from Sbancos where id = $banco;");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
	$idBanco=$rowMotorizado['id'];
	$fechaRegBanco=$rowMotorizado['fechaReg'];
	$nCuentaBanco=$rowMotorizado['nCuenta'];
	$descripcionBanco=$rowMotorizado['descripcion'];
	$tipoBanco=$rowMotorizado['tipo'];
	$descripcionDetalleBanco=$rowMotorizado['descripcionDetalle'];
	$sucursalBanco=$rowMotorizado['sucursal'];
	$contactoBanco=$rowMotorizado['contacto'];
	$direccionBanco=$rowMotorizado['direccion'];
	$monedaBanco=$rowMotorizado['moneda'];
	$telefonoBanco=$rowMotorizado['telefono'];
	$faxBanco=$rowMotorizado['fax'];
	$emailBanco=$rowMotorizado['email'];
}


echo '<table id="example1" class="table table-bordered table-striped">
<thead>
<tr>
<th>#</th>
<th>Fecha</th>
<th>Documento</th>
<th>Tipo</th>
<th>Detalle</th>
<th>Conciliado</th>
<th>Débitos/Cargos</th>
<th>Créditos/Depósitos</th>
<th>Balance</th>
</tr>
</thead>
<tbody>';

$contador=0;
$queryList=mysqli_query($conn3,"SELECT sb.id as idBan, st.id as idTrans, st.fechaTrans, st.Documento, st.tipo, st.Concepto, st.debito, st.credito, st.balance, st.DetalleMovimiento, st.Conciliado
	from Sbancos sb
	right join Stransbanco st on sb.id=st.idBanco
	where sb.id=$banco order by st.id asc;");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
	$contador++;
	$idBan=$rowMotorizado['idBan'];
	$idTrans=$rowMotorizado['idTrans'];
	$fechaTrans=$rowMotorizado['fechaTrans'];
	$Documento=$rowMotorizado['Documento'];
	$tipo=$rowMotorizado['tipo'];
	$Concepto=$rowMotorizado['Concepto'];
	$Concepto = funcionMaster($Concepto,'id','Descripcion','ConceptosBanco');
	$DetalleMovimiento = $rowMotorizado['DetalleMovimiento'];
	$debito=$rowMotorizado['debito'];
	$credito=$rowMotorizado['credito'];
	$balance=$rowMotorizado['balance'];

	$Conciliado = $rowMotorizado['Conciliado'];
	if($Conciliado!="0"){
		$ConciliadoTexto="X";
	}
	else{
		$ConciliadoTexto="";
	}

	// $queryList2=mysqli_query($conn3,"SELECT oh.id,oh.montoDocumento, sum(sc.montoPagado) as montoPagado,sum(sc.montoPagado) as montoPagado
	// 	from opracioninvheader oh 
	// 	right join sCuentasPagar sc on oh.id=sc.idDocumento
	// 	where oh.idTercero=$proveedor and oh.id=$id;");
	// $nrowl2=mysqli_num_rows($queryList2);
	// while($rowMotorizado2=mysqli_fetch_array($queryList2))
	// {

	// 	$idS=$rowMotorizado2['id'];
	// 	$montoDocumentoS=$rowMotorizado2['montoDocumento'];
	// 	$montoPagadoS=$rowMotorizado2['montoPagado'];
	// 	$montoPendienteS=$montoDocumentoS-$montoPagadoS;
	// }

	echo '
	<tr>
	<td>'.$contador.'</td>
	<td>'.$fechaTrans.'</td>
	<td>'.$Documento.'</td>
	<td>'.$tipo.'</td>
	<td>'.$DetalleMovimiento.'</td>
	<td style="text-align:center;">'.$ConciliadoTexto.'</td>
	<td>'.$debito.'</td>
	<td>'.$credito.'</td>
	<td>'.$balance.'</td>
	</tr>';

	
	
	
}
echo '</tbody>
<tfoot>
<tr>
<th>#</th>
<th>Fecha</th>
<th>Documento</th>
<th>Tipo</th>
<th>Detalle</th>
<th>Conciliado</th>
<th>Débitos/Cargos</th>
<th>Créditos/Depósitos</th>
<th>Balance</th>
</tr>
</tfoot>
</table>';


?>