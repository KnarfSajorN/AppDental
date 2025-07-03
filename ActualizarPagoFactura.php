<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funcionesUtilidades.php");

$idOperacion     = $_GET['idOperacion'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $totalNeto      = $rowMotorizado['totalNeto'];
    $montoPagado      = $rowMotorizado['montoPagado'];
}

mysqli_query($conn3, "update sOperacionInv set montoPagado = '$totalNeto' where idOperacion = $idOperacion");
mysqli_query($conn3, "update sCuentasCobrar set montoPendiente = '0', montoPagado='$totalNeto' where idDocumento = $idOperacion");

echo "<script language='Javascript'> window.location='SclienteAdministracion_cuentasAcobrar.php';</script>"; 

?>