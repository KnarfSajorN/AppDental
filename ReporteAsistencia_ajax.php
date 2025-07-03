<?php
include "funciones/conn3.php";
include "funciones/funciones.php";

$desde = $_POST['desdeAS'];
$hasta = $_POST['hastaAS'];
$ID = $_POST['ID'];
$desde  = $_POST['desde'];
$hasta  = $_POST['hasta'];
$tipo   = $_POST['tipo'];
$ID     = $_POST['ID'];

$usuario_id = $ID;


$EstadoN0 = 0;
$EstadoN1 = 0;
$EstadoN2 = 0;
$EstadoN3 = 0;

$response = array();

if ($tipo == 0) {
    $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where usuario_id = $usuario_id and fecha BETWEEN '$desde' and '$hasta' order by fecha asc ");
} elseif ($tipo <> 0) {
    $resultado = mysqli_query($conn3, "SELECT * FROM  citas  where usuario_id = $usuario_id and estado = $tipo and (fecha BETWEEN '$desde' and '$hasta' ) order by fecha asc ");
}

while ($fila = mysqli_fetch_array($resultado, MYSQLI_NUM)) {
    $Numero++;

    $estadoD = $fila[8];
    $botonesEstado = [
        "1" => "Reservada",
        "2" => "Confirmada",
        "3" => "Asistida",
        "4" => "No pudo Asistir",
        "5" => "Cita Cancelada",
        "6" => "Pendiente",
        "7" => "En Espera"
    ];

    $Motivos_Consulta = funcionMaster($fila[7], 'id', 'descripcion', 'Motivos_Consulta');

    $response[] = array(
        "Numero" => $Numero,
        "Doctor" =>  funcionMaster($fila[1], 'ID', 'NOMBRE_USUARIO', 'usuarios'),
        "Fecha_Hora" => $fila[2] . '-' . $fila[3],
        "Paciente" => $fila[4],
        "Telefono" => $fila[5],
        "Correo" => $fila[6],
        "Motivo" => $Motivos_Consulta,
        "Estado" => $botonesEstado[$estadoD] . " - " . $botones[$estadoD]
    );

    // Actualizar contadores de estado
    if ($estadoD == 0) {
        $EstadoN0++;
    } elseif ($estadoD == 1) {
        $EstadoN1++;
    } elseif ($estadoD == 2) {
        $EstadoN2++;
    } elseif ($estadoD == 3) {
        $EstadoN3++;
    }
}

// Puedes agregar el resumen también si es necesario
// $response["Resumen"] = array(
//     "Por_Confirmar" => $EstadoN0,
//     "Confirmado" => $EstadoN1,
//     "Asistio" => $EstadoN2,
//     "No_Asistio" => $EstadoN3
// );

// Devolvemos la respuesta en formato JSON
header('Content-Type: application/json');

// Función para convertir entidades HTML a UTF-8
function convertirEntidades($item) {
    return is_string($item) ? html_entity_decode($item, ENT_QUOTES, 'UTF-8') : $item;
}

// Aplicar la conversión de entidades a todo el array
$response = array_map_recursive('convertirEntidades', $response);

// Codificar el array como JSON y mostrarlo
echo json_encode($response);

// Función para aplicar la conversión de entidades a un array de forma recursiva
function array_map_recursive($callback, $array) {
    return array_map(
        function ($item) use ($callback) {
            return is_array($item) ? array_map_recursive($callback, $item) : call_user_func($callback, $item);
        },
        $array
    );
}

