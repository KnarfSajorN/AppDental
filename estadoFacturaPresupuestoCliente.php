<style>
	/* Boton sucess */
.css-button-sharp--greenn {
    min-width: 130px;
    height: 40px;
    color: #fff;
    padding: 5px 10px;
    font-weight: bold;
    cursor: pointer;
    transition: all 0.3s ease;
    position: relative;
    display: inline-block;
    outline: none;
    border: 2px solid #117a8b;
    background: #117a8b;
	border-radius: 30px;
}

.css-button-sharp--greenn:hover {
    background: #fff;
    color: #117a8b
}
</style>






<?php
// Clase adicional opcional
$claseAdicionalPresupuesto = isset($claseAdicionalPresupuesto) ? $claseAdicionalPresupuesto : 'btn btn-outline-info btn-lg rounded-pill shadow m-1';

// Consulta para presupuestos pendientes
$queryList = mysqli_query($conn3, "SELECT count(idOperacion) as cuantas FROM sOperacionInv WHERE idCliente = $clienteId AND idEmpresa = '{$_SESSION['ID']}' AND tipo IN (2, 4, 5, 6)");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $cuantasP = $rowMotorizado['cuantas'];
    }
}

// Consulta para cuentas por cobrar
$queryList = mysqli_query($conn3, "SELECT SUM(totalNeto) as Neto, SUM(montoPagado) as montoPagado1 FROM sOperacionInv WHERE idCliente = $clienteId AND idEmpresa = '{$_SESSION['ID']}' AND tipo IN (1, 7)");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $montoPagado = $rowMotorizado['montoPagado1'];
        $totalNeto = $rowMotorizado['Neto'];
    }
}

// Mostrar botón de presupuestos pendientes
if ($cuantasP > 0) {
    echo '<a class="' . $claseAdicionalPresupuesto . '" href="SclienteAdministracion_ControlPresupuesto?clienteId=' . encrypt($clienteId) . '" role="button"> <i class="fa fa-eye"></i> ' . $cuantasP . ' Presupuestos Pendientes</a>';
}

// Mostrar botón de cuentas por cobrar
if ($totalNeto > $montoPagado) {
    $Debe = $totalNeto - $montoPagado;
    echo '<a class="' . $claseAdicionalPresupuesto . '" href="SclienteAdministracion_cuentasAcobrar?clienteId=' . encrypt($clienteId) . '" role="button"> <i class="fa fa-eye"></i> Cuenta a Cobrar ' . number_format($Debe) . '</a>';
}
?>