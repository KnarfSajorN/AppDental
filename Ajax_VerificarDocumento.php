<?php
session_start();
include 'funciones/conn3.php';

$Documento = $_POST['CODI_CLIENTE'];


$cliente_id = $_POST['CODI_CLIENTE']; // Usar el mismo nombre que especificas en data del AJAX
$texto = "Vacio"; // Inicializar la variable texto
$ID_principal = $_SESSION['ID_principal'];

if ($Documento != "") {
    $QueryCliente = mysqli_query($conn3, "SELECT * FROM cliente where CODI_CLIENTE = '{$Documento}' and ID_principal = '$ID_principal' ");

    while ($rowCliente = mysqli_fetch_array($QueryCliente)) {
        $nombre_cliente = $rowCliente['nombre_cliente'];
        $cliente_id_query = $rowCliente['cliente_id'];

        if ($cliente_id != $cliente_id_query) {
            $texto = "Encontrado";
            $mensaje = "El numero de documento {$Documento} Se encuentra registrado con el nombre de {$nombre_cliente}";
        }
    }
}

echo json_encode(array('Encontrado' => $texto == "Encontrado", 'mensaje' => $mensaje));