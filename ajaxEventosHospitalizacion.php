<?php
session_start();
include 'funciones/conn3.php';

if (isset($_SESSION['cI']) && $_SESSION['cI']<> '') {
    $queryClienteC = " AND cliente_id=" . $_SESSION['cI'];
}else{
    $queryClienteC = "";
}

$query = mysqli_query($conn3, "SELECT * FROM hoIngresoHospitalizacion $queryClienteC");
$eventos = array();

foreach ($query as $key) {
$hospitalizacionActiva = $key['hospitalizacionActiva'];
$cliente_id = $key['cliente_id'];

if ($hospitalizacionActiva == 0) {
     $colorEstado = '#68B9EB';
    $textEstado = 'Finalizado';
    $icono = 'fa-solid fa-check';
}else{
    $colorEstado = '#5EEAAC';
    $textEstado = 'Activo';
    $icono = 'fa-solid fa-clock';
}

////CONSULTAR CLIENTE
$queryCliente = mysqli_query($conn3, "SELECT nombre_cliente FROM cliente WHERE cliente_id = '$cliente_id'");
foreach ($queryCliente as $TC) {
    $nombre_cliente = $TC['nombre_cliente'];
}


if ($key['fechaSalida'] == "") {
    $fechaSalida = date("Y-m-d");
}else{
    $fechaSalida = $key['fechaSalida'];
}


    $eventoH = array();
    $eventoH['id'] = $key['idHospitalizacion'];
    $eventoH['title'] = $nombre_cliente . " - " . $textEstado;
    $eventoH['start'] = $key['fechaIngreso'];
    $eventoH['end'] = $fechaSalida;
    $eventoH['color'] = $colorEstado;
    $eventoH['icon'] = $icono;
    $eventoH['icon1'] = $icono;

    array_push($eventos,$eventoH );
}

// Convertir a formato JSON y enviar la respuesta
echo json_encode($eventos);


?>