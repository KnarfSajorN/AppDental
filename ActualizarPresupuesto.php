<?php
include("funciones/conn3.php");
include("funciones/funciones.php");

$arreglo = $_POST['Producto'];
$idOperacion = $_POST['idOperacion'];
$descuento = $_POST['descuento'];
$id_usuario = $_POST['id_usuario'];
$nota = $_POST['nota'];

/*
echo $nota;

echo "<br>***************************************** JSON-ARRAY****************************************<br>";
print("<pre>".print_r($arreglo,true)."</pre>");
echo "<br>***************************************** JSON ****************************************<br>";
*/

foreach($arreglo as $campo=>$campogeneral) 
{
	$variablesmodificar='';
	$filtroproducto='';
	$contador='0';
	foreach($campogeneral as $campoproducto=>$valorproducto) 
	{
		//echo $campoproducto." : ".$valorproducto.'<br>';
		if($contador<>"0")
		{
			$variablesmodificar.=",";
		}
		
		if($campoproducto=="id")
		{
			$filtroproducto= " WHERE ".$campoproducto."='".$valorproducto."'";
		}
		else
		{
			$variablesmodificar.= $campoproducto."='".$valorproducto."'";
		}
		
		$contador++;
	}
	$variablesmodificar = substr($variablesmodificar, 0, -1);
	$Query="UPDATE sDetalleOper SET ".$variablesmodificar." ".$filtroproducto;

	//echo $Query;
	mysqli_query($conn3,$Query);
}

$queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $id_usuario");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $moneda=$rowMotorizado['moneda'];
    $impuestoF=$rowMotorizado['impuestoF'];
}

$queryList=mysqli_query($conn3,"SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sDetalleOper  where idOperacion = '$idOperacion'  order by id");
while($rowMotorizado=mysqli_fetch_array($queryList))
{
	$sumBase		=$rowMotorizado['sumBase'];
	$sumCantidad	=$rowMotorizado['sumCantidad'];
	$sumSubTotal	=$rowMotorizado['sumSubTotal'];
}

if ($impuestoF >0) 
{
$impuestoF2 = $impuestoF/100; 
$total1 =  $sumSubTotal*$impuestoF2;
$total =  $total1+$sumSubTotal;
}
else
{
$total =  $sumSubTotal;
}


$QueryOperacionInv="UPDATE sOperacionInv SET totalNeto = '$total', totalBruto = '$sumSubTotal', cantidadProduc = '$sumCantidad' , nota = '$nota' where idOperacion = '$idOperacion'";

//echo $QueryOperacionInv;
mysqli_query($conn3,$QueryOperacionInv);

echo "<script language='Javascript'> window.location='SclienteAdministracion_ControlPresupuesto';</script>"; 
?>