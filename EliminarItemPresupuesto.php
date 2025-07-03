<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

    $idOperacion = $_GET['idOperacion'];
    $idsDetalleOper = $_GET['idsDetalleOper'];

mysqli_query($conn3, "DELETE FROM sDetalleOper where id= '$idsDetalleOper' AND idOperacion='$idOperacion' limit 1");

$queryList=mysqli_query($conn3,"SELECT SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) as sumSubTotal  from   sDetalleOper  where idOperacion = '$idOperacion'  order by id");
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $sumBase        =$rowMotorizado['sumBase'];
    $sumCantidad    =$rowMotorizado['sumCantidad'];
    $sumSubTotal    =$rowMotorizado['sumSubTotal'];
}

$usuario=$_SESSION['ID'];
$queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $usuario");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $moneda=$rowMotorizado['moneda'];
    $impuestoF=$rowMotorizado['impuestoF'];
}

/*
$queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
    $descuentos = $rowMotorizado['descuentos'];
}
*/

if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $sumSubTotal*$impuestoF2;
$total =  $total1+$sumSubTotal;
}
else
{
$total =  $sumSubTotal;
}


$total_con_descuento = $sumSubTotal - $descuentos;

$QueryOperacionInv="UPDATE sOperacionInv SET  totalBruto = '$sumSubTotal', totalNeto = '$total' , cantidadProduc = '$sumCantidad' where idOperacion = '$idOperacion'";




 	 mysqli_query($conn3,$QueryOperacionInv); 

    echo "<script language='Javascript'> window.location='Editar_Presupuesto.php?idOperacion=$idOperacion';</script>"; 
 ?>