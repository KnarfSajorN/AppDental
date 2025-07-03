<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");
$desde = $_POST['desde'] . ' 00:00:00';
$hasta = $_POST['hasta'] . ' 23:59:59';

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];
$data = [['#Documento', 'Nombre', 'Celular']];

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where fechar BETWEEN '$desde' and '$hasta' ");

if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $Puntos = $rowMotorizado['Puntos'];
        $cliente_id = $rowMotorizado['cliente_id'];
        $Referido = funcionMaster($rowMotorizado['Referido'], 'cliente_id', 'nombre_cliente', 'cliente');

        $rowData = [$CODI_CLIENTE, $nombre_cliente, $celular_cliente];
        $data[] = $rowData;
    }
}

echo json_encode($data);
