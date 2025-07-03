<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");
$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$tipo = $_POST['idCLiente'];
$ID = $_POST['id'];
$tipo = $_POST['idCLiente'];

$response = [['numeroDoc', 'Nombre cliente', 'fecha Operacion', 'Total Neto', 'Monto Pagado', 'Monto Pendiente', 'Método de pago']];

if ($tipo == 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idEmpresa = $ID and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7) ");    
   
} elseif ($tipo <> 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where idEmpresa = $ID and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (1, 7)");
   
}
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {       

        $idOperacion = $rowMotorizado['idOperacion'];
        $fechaOperacion = $rowMotorizado['fechaOperacion'];
        $numeroDoc = $rowMotorizado['numeroDoc'];
        $totalNeto = $rowMotorizado['totalNeto'];
        $montoPagado = $rowMotorizado['montoPagado'];
        $montoPendiente = $totalNeto - $montoPagado;
        $idCliente = $rowMotorizado['idCliente'];

        $MetodosPago = "";
        $QueryMetodosPago = mysqli_query($conn3, "SELECT * FROM  sDetalleMetodosPagos where idOperacion = $idOperacion");
        while ($rowMetodosPago = mysqli_fetch_array($QueryMetodosPago)) {
            $MetodosPago .= $rowMetodosPago['metodo_pago'];
        }
        if ($MetodosPago == "") {
            $MetodosPago = "Ninguno";
        }

        $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
        if ($queryListCli) {
            while ($rowCli = mysqli_fetch_array($queryListCli)) {
                $nombre_cliente = $rowCli['nombre_cliente'];
            }
        }
        $response[] = [
            $numeroDoc,
            $nombre_cliente,
            $fechaOperacion,
            $totalNeto,
            $montoPendiente,
            $montoPagado,
            $MetodosPago
        ];
    }
   
}
var_dump($response);
if (!headers_sent()) {
    header('Content-Type: application/json');
}

// Imprime la respuesta JSON
echo json_encode($response, JSON_UNESCAPED_UNICODE);
?>