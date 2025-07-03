<?php

include("conexiones/conn3.php");
include("funciones/funciones.php");

$idAbono                 = $_GET['idAbono'];    

$idOperacion = $_GET['idOperacion'];

$queryList=mysqli_query($conn3,"SELECT * FROM  abono where  id = '$idAbono' ");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{            
  $valor_abonado=$rowMotorizado['valor_abonado'];
}


$monto_pagado_factura = funcionMaster($idOperacion,'idOperacion','montoPagado','sOperacionInv');
$montoFinal=$monto_pagado_factura-$valor_abonado;



$query = "update abono set activo = 0 where id ='$idAbono' ";
mysqli_query($conn3, $query);             

mysqli_query($conn3,"UPDATE sOperacionInv SET montoPagado='$montoFinal' WHERE idOperacion='$idOperacion' limit 1");

//mysqli_query($conn3,"UPDATE sCuentasCobrar SET montoPendiente='$montoPendienteFinal' WHERE idDocumento='$idOperacion' limit 1");

echo "<script language='Javascript'> window.location='HistorialAbono.php?idOperacion=$idOperacion';</script>"; 

?>