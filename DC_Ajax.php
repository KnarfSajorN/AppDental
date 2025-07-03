<?php
include 'funciones/funciones.php';

$cliente_id = $_POST["cliente_id"];
$link = $_POST["link"];


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Whatsapp = $rowMotorizado["whatsapp"];
    
}

$mensajeW = " Sr(a) *" . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado un archivo DICOM , Para visualizarlo acceder al siguiente Link: {$link}";
$action = 0;
Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $cliente_id, $usuario_id, $Whatsapp, $action);


?>