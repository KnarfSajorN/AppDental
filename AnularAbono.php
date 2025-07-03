<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funcionesUtilidades.php");

$idOperacion     = $_GET['idOperacion'];
$idAbono = $_GET['idAbono'];

$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $totalNeto      = $rowMotorizado['totalNeto'];
    $montoPagado      = $rowMotorizado['montoPagado'];
}
mysqli_query($conn3, "UPDATE sOperacionInv SET montoPagado = montoPagado - (SELECT valor_abonado FROM abonoC WHERE id = '$idAbono') WHERE idOperacion = '$idOperacion'");

// echo "UPDATE sOperacionInv SET montoPagado = montoPagado - (SELECT valor_abonado FROM abonoC WHERE id = '$idAbono') WHERE idOperacion = '$idOperacion'";
mysqli_query($conn3, "UPDATE abono set Activo = '0' where id = $idAbono");
// echo "---------------------------------------------------------------";
// echo "update abonoC set Activo = '0' where id = $idAbono";
// echo "update abonoC set Activo = '0' where id = $idAbono";

echo "<script language='Javascript'> window.location='HistorialAbono?idOperacion=".$idOperacion."';</script>"; 

?>