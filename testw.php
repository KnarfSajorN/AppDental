<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funciones.php");



echo $linkkey;
$cliente_id = 1;
$usuario_id = 1;

$telefono = '573209126751';
$whatsapp = '573209126751';
$accion   = 'Accion';
$mensajeW = 'Prueba de mensaje ';

$accion = 0;



$data = [
    'phone' => $whatsapp, // Receivers phone
    'body' => $mensajeW, // Message
];



$json = json_encode($data); 
// Encode data to JSON
// URL for request POST /message
$url = $linkkey;
// Make a POST request
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);
// Send a request
$result = file_get_contents($url, false, $options);

$obj = json_decode($result);
$mensaje = $obj->{'message'}; 
$enviado =  $obj->{'sent'}; 
$id =  $obj->{'id'}; 






//Whatsapp_sent_cliente($linkkey, $telefono, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);

?>