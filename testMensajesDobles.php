
<?php
date_default_timezone_set('America/Bogota');
include '../masterFunciones.php';

 


$fecha_actual = date("y-m-d");
$hora_actual = date("H:i");

echo $fecha_actual . ', ' . $hora_actual . '<br>';












function Whatsapp_sent_cliente($linkkey, $numero, $mensaje, $cliente_id, $usuario_id, $whatsapp , $accion)
{
 $enviado  = 0;
 
if ($numero>1) 
{
    
$data = [
    'phone' => $numero, // Receivers phone
    'body' => $mensaje, // Message
];



$json = json_encode($data); 
$url = $linkkey;
$options = stream_context_create(['http' => [
        'method'  => 'POST',
        'header'  => 'Content-type: application/json',
        'content' => $json
    ]
]);








// Send a request
$result = file_get_contents($url, false, $options);








$obj = json_decode($result);
$mensajeW = $obj->{'message'}; 
$enviado =  $obj->{'sent'}; 
$id =  $obj->{'id'}; 

}
 

 if ($enviado == '') {$enviado = 0;}


 if ($cliente_id == '') 
 {
 	$cliente_id = 0;
 }

date_default_timezone_set('America/Bogota');

$w_fechaHora = date("Y-m-d h:m:s");

$host='localhost';
$userdb='sievenso_sistemaPrincipal';
$pass2='5qA?o]t6d-h25qA?o]t6d-h2';
$DB='sievenso_sistema';
  
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL Whatsapp_sent_cliente: '.mysqli_error($conn3));
 
mysqli_query($conn3, "INSERT INTO w_mensajes (mensaje, fechaHora, tipo, cliente_id, usuario_id, idMensaje, numeroCliente, numeroUsuario, estado, accion, enviado, source) VALUES 
	('$mensaje', '$w_fechaHora', '0', '$cliente_id', '$usuario_id', '$id', '$numero', '$whatsapp', '1', '$accion', '$enviado', '$linkkey');");
 
 
}
 







$telefono3 = '573209126751';
$men2 = 'son las ' . date("H:i:s").' Desde linkkeyAlte01';
Whatsapp_sent_cliente($linkkeyAlte01, $telefono3, $men2, $cliente_id, $usuario_id, $telefono3 , $accion);


