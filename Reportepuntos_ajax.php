<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$desde = $_POST['desde'] . ' 00:00:00';
$hasta = $_POST['hasta'] . ' 23:59:59';

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

$response = [
    ['Paciente id', 'Nombre', 'Celular', 'Puntos'] // Cabeceras
];
$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where fechar BETWEEN '$desde' and '$hasta' ");
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $CODI_CLIENTE             = $rowMotorizado['CODI_CLIENTE'];
        $nombre_cliente         = $rowMotorizado['nombre_cliente'];
        $celular_cliente        = $rowMotorizado['celular_cliente'];
        $Puntos                 = $rowMotorizado['Puntos'];
        $cliente_id             = $rowMotorizado['cliente_id'];

        $resultado = mysqli_query($conn3, "SELECT * FROM sOperacionInv WHERE idCliente = $cliente_id");
        while ($fila2 = mysqli_fetch_array($resultado)) {
            $puntosCanjeados = $fila2['puntosCanjeados'];
        }

        $TotalPuntosP = $Puntos + $puntosCanjeados;

        $response[] = [
            $CODI_CLIENTE,
            $nombre_cliente,
            $celular_cliente,
            $TotalPuntosP
        ];
    }
}


// Devolvemos la respuesta en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
