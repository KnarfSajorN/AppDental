<?php
date_default_timezone_set('America/Bogota');
include("../funciones/funciones.php");

$date=date("Y-m-d");
$banco=$_POST['banco'];

///INICIALIZAR VARIABLES 
$debitoDif = 0;
$creditoDif = 0;
///INICIALIZAR VARIABLES 

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


$queryList=mysqli_query($conn3,"SELECT sb.id as idBan, st.id as idTrans, st.fechaTrans, st.Documento, st.tipo, st.Concepto, st.debito, st.credito, st.balance
	from Sbancos sb
	right join Stransbanco st on sb.id=st.idBanco
	where sb.id=$banco order by sb.id asc;");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{

	$idBan=$rowMotorizado['idBan'];
	$idTrans=$rowMotorizado['idTrans'];
	$fechaTrans=$rowMotorizado['fechaTrans'];
	$Documento=$rowMotorizado['Documento'];
	$tipo=$rowMotorizado['tipo'];
	$Concepto=$rowMotorizado['Concepto'];
	$debito=$rowMotorizado['debito'];
	$credito=$rowMotorizado['credito'];
	$balance=$rowMotorizado['balance'];

	$queryList2=mysqli_query($conn3,"SELECT balance from Stransbanco where idBanco=$banco order by id desc limit 1;");
	$nrowl2=mysqli_num_rows($queryList2);
	while($rowMotorizado2=mysqli_fetch_array($queryList2))
	{
		$saldoLib=$rowMotorizado['balance'];
	}

	$debitoDif+= intval($debito);
	$creditoDif+= intval($credito);
	$saldoDis= intval($creditoDif)-intval($debitoDif);	
}


echo '
<p><strong>Fecha Actual-</strong> '.$date.'</p>
<p><strong>Saldo en Libros </strong> '.$saldoLib.'</p>
<p><strong>Débitos Diferido (-) </strong> '.$debitoDif.'</p>
<p><strong>Créditos Diferido (+) </strong> '.$creditoDif.'</p>
<hr>
<p><strong>Saldo Disponible </strong> '.$saldoDis.'</p>
';





?>