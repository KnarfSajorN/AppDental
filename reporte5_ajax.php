<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");
include("funciones/conn3.php");

$desde = $_POST['desde'] . ' 00:00:00';
$hasta = $_POST['hasta'] . ' 23:59:59';

$tipo = $_POST['tipo'];
$ID = $_POST['ID'];

$data = [['Documento Cliente', 'Nombre Cliente',  'Correo', 'Whastapp', 'Tipo de sangre', 'Donante', 'Toma medicamentos', 'Enfermedades']]; // Inicializar un array para almacenar los datos

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

if ($tipo == 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where usuario_id=$ID and (fecha BETWEEN '$desde' and '$hasta') ");
} elseif ($tipo <> 0) {
    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where  usuario_id=$ID and cliente_id=$tipo and (fecha BETWEEN '$desde' and '$hasta') ");
}

while ($rowhistoria = mysqli_fetch_array($queryList)) {
    $id_historia = $rowhistoria['id'];
    $cliente_id = $rowhistoria['cliente_id'];
    $EnfermedadActual = $rowhistoria['EnfermedadActual'];
    $fecha = $rowhistoria['fecha'];

    $RowCliente = mysqli_query($conn3, "SELECT * FROM  cliente where  cliente_id=$cliente_id  ");
    while ($rowMotorizado = mysqli_fetch_array($RowCliente)) {       
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $correo_cliente = $rowMotorizado['correo_cliente'];
        $whatsapp = $rowMotorizado['whatsapp'];
        $tiposSangre = $rowMotorizado['tiposSangre'];
        $esDonante = $rowMotorizado['esDonante'];
        $tomaMedicamento = $rowMotorizado['tomaMedicamento'];
        $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];

        // Almacenar los datos en el array
        $rowData = [$CODI_CLIENTE, $nombre_cliente, $correo_cliente, $whatsapp, $tiposSangre, $esDonante, $tomaMedicamento, $enfermedadesPequeno];
        $data[] = $rowData;
    }
}

// Devolver los datos en formato JSON

echo json_encode($data);
