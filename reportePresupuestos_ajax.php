<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$desde = $_POST['desde'];
$hasta = $_POST['hasta'];
$ID = $_POST['ID'];
$idCliente = $_POST['idCliente'];

$resultados = [['# de Factura', 'Cliente', 'Fecha', 'Cantidad de productos', 'Total Bruto', 'Impuesto', 'Descuentos', 'Total Neto', 'Monto Pagado', 'Abono', 'Monto Pendiente']];


$tipo = $_POST['idCliente'];
if ($tipo == 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idEmpresa = $ID and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (2,4,5,6) ");
} elseif ($tipo <> 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv  where idEmpresa = $ID and idCliente = $tipo and fechaOperacion BETWEEN '$desde' and '$hasta' and tipo IN (2,4,5,6) ");
}

if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $fechaOperacion = $rowMotorizado['fechaOperacion'];
        $numeroDoc = $rowMotorizado['numeroDoc'];
        $subTotal = $rowMotorizado['subTotal'];
        $impuesto = $rowMotorizado['impuesto'];
        $totalBruto = $rowMotorizado['totalBruto'];
        $descuentos = $rowMotorizado['descuentos'];
        $totalNeto = $rowMotorizado['totalNeto'];
        $montoPagado = $rowMotorizado['montoPagado'];
        $cantidadProduc = $rowMotorizado['cantidadProduc'];
        $idCliente = $rowMotorizado['idCliente'];
        $idOperacion = $rowMotorizado['idOperacion'];
        $montoPendiente = $totalNeto - $montoPagado;
        $abono = funcionMaster($idOperacion, 'numero_operacion', 'valor_abonado', 'abono');

        $Numero++;

        $queryListCli = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");

        while ($rowCli = mysqli_fetch_array($queryListCli)) {
            $nombre_cliente = $rowCli['nombre_cliente'];
        }

        $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where   id_usuario = $ID and  id_cliente = $idCliente and idOperacion = 6 order by id");

        while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
            $Numero++;
            $total += $fila[9];
        }

        // Agregar la información al array
        $resultados[] = [
            $numeroDoc,
            $nombre_cliente,
            $fechaOperacion,
            $cantidadProduc,
            $totalBruto,
            $impuesto,
            $descuentos,
            $totalNeto,
            $montoPagado,
            $abono,
            $montoPendiente

        ];
    }
}

// Imprimir el JSON
header('Content-Type: application/json');
echo json_encode($resultados); //$jsonResultados;