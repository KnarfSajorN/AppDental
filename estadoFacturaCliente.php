<?php

$queryList = mysqli_query($conn3, "SELECT count(idOperacion) as cuantas   FROM  sOperacionInv where idCliente = $clienteId and tipo = 1");
// echo "SELECT count(idOperacion) as cuantas   FROM  sOperacionInv where idCliente = $clienteId and tipo = 1"; 
// echo "SELECT SUM(totalBruto) as totalBruto1, SUM(montoPagado) as montoPagado1  FROM  sOperacionInv where idCliente = $clienteId and tipo = 1";
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $montoPagado = $rowMotorizado['montoPagado1'];
    $totalBruto = $rowMotorizado['totalBruto1'];
    $cuantasP = $rowMotorizado['cuantas'];
}

$Debe = $totalBruto - $montoPagado;
echo '<a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="SclienteAdministracion_cuentasAcobrar?clienteId=' . encrypt($clienteId) . '" role="button"> <i class="fa fa-eye"></i>   Cuenta a cobrar Pendientes ' . $cuantasP . '</a>';

?>