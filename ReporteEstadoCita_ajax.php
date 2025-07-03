<?php
date_default_timezone_set('America/Bogota');

header('Content-Type: application/vnd.ms-excel; charset=UTF-8');
header('Content-Disposition: attachment; filename=RipsUS.xls');


include("funciones/conn3.php");
include("funciones/funciones.php");

$desde  = $_POST['desde'];
$hasta  = $_POST['hasta'];
$tipo   = $_POST['tipo'];
$ID     = $_POST['ID'];

$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

$botonesEstado = [
    "1" => "Reservada",
    "2" => "Confirmada",
    "3" => "Asistida",
    "4" => "No pudo Asistir",
    "5" => "Cita Cancelada",
    "6" => "Pendiente",
    "7" => "En Espera"
];

$Reservada = 0;
$Confirmada = 0;
$Asistida = 0;
$NoPudoAsistir = 0;
$CitaCancelada = 0;
$Pendiente = 0;
$EnEspera = 0;

if ($tipo == 0) {
    $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where usuario_id = '{$ID}'  AND  (fecha BETWEEN '$desde' and '$hasta') order by fecha asc ");
} elseif ($tipo <> 0) {
    $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where usuario_id = '{$ID}'  AND estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
}

$data = array();

while ($fila = mysqli_fetch_array($resultado)) {
    $estadoD = $fila['estado'];

    switch ($estadoD) {
        case '1':
            $Reservada++;
            break;
        case '2':
            $Confirmada++;
            break;
        case '3':
            $Asistida++;
            break;
        case '4':
            $NoPudoAsistir++;
            break;
        case '5':
            $CitaCancelada++;
            break;
        case '6':
            $Pendiente++;
            break;
        case '7':
            $EnEspera++;
            break;
        default:
    }
}

// Crear el array después del bucle para tener la cantidad correcta
$data[] = array(
    'Estado' => 'Reservada',
    'Cantidad' => $Reservada
);
$data[] = array(
    'Estado' => 'Confirmada',
    'Cantidad' => $Confirmada
);
$data[] = array(
    'Estado' => 'Asistida',
    'Cantidad' => $Asistida
);
$data[] = array(
    'Estado' => 'No pudo Asistir',
    'Cantidad' => $NoPudoAsistir
);
$data[] = array(
    'Estado' => 'Cita Cancelada',
    'Cantidad' => $CitaCancelada
);
$data[] = array(
    'Estado' => 'Pendiente',
    'Cantidad' => $Pendiente
);
$data[] = array(
    'Estado' => 'En Espera',
    'Cantidad' => $EnEspera
);

echo json_encode($data);
