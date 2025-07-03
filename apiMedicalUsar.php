<?php

//API URL
$url = 'https://medicalsoftplus.com/apiMedical.php';

//create a new cURL resource
$ch = curl_init($url);

// "token" => "PGNvNTcxPg==", // ej: <co571> en base64
// "pass" => "b78032dee51ab701c5aa9314734b8c7f", md5 de co571

//setup request to send json via POST
// registro cliente
// $arreglo = array(
//     "token"             => "PGNvNTcxPg==",
//     "pass"              => "b78032dee51ab701c5aa9314734b8c7f",
//     "tipo"              => "1",
//     "nombre"            => "Nombre del Cliente",
//     "documento"         => "0000000000",
//     "tipoDoc"           => "CC",
//     "fechaNacimiento"   => "0000-00-00",
//     "telefono"          => "573000000000",
//     "correo"            => "ejemplo@ejemplo.com"
// );

// registro citas
// $arreglo = array(
//     "token"             => "XXXXXXXXXXX",
//     "pass"              => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
//     "tipo"              => "2",
//     "documentoCliente"  => "0000000000",
//     "fechaCita"         => "0000-00-00",
//     "horaCita"          => "00:00:00",
//     "nombreCliente"     => "Nombre del Cliente",
//     "telefonoCliente"   => "573000000000",
//     "correoCliente"     => "ejemplo@ejemplo.com",
//     "motivoConsulta"    => "Motivo de la Consulta",
//     "tipoConsulta"      => "1"
// );

// registro facturas
// $arreglo = array(
//     "token"             => "XXXXXXXXXXX",
//     "pass"              => "XXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXXX",
//     "tipo"              => "3",
//     "documentoCliente" => "0000000000",
//     "fechaOper" => "0000-00-00",
//     "fechaVenc" => "0000-00-00",
//     "descripcion" => "Consulta General con el Doctor XXXXXX",
//     "totalBruto" => "50000.00",
//     "impuestos" => "6000.00",
//     "descuentos" => "1000.00",
//     "totalNeto" => "55000.00",    
//     "montoPagado" => "55000.00"
// );

// enviar ws
$arreglo = array(
    "token"             => "PGNvNTcxPg==",
    "pass"              => "b78032dee51ab701c5aa9314734b8c7f",
    "tipo"              => "4",
    // campos para whatsapp
    "telefono"         => "573194615775",
    "mensaje"          => "Hola, estoy interesado en una consulta de la clinica",
);

// enviar correo
// $arreglo = array(
//     "token"             => "PGNvNTcxPg==",
//     "pass"              => "b78032dee51ab701c5aa9314734b8c7f",
//     "tipo"              => "5",
//     // campos para correo
//     "correo"           => "blancojhoendry@gmail.com",
//     "asunto"           => "Consulta de la clinica",
//     "mensajeCorreo"    => "Hola, estoy interesado en una consulta de la clinica"
// );




echo "<br>*****************************************<br>";
print("<pre>" . print_r($arreglo, true) . "</pre>");
echo "<br>*****************************************<br>";

$payload = json_encode($arreglo);

//attach encoded JSON string to the POST fields
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);

//set the content type to application/json
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));

//return response instead of outputting
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//execute the POST request
$result = curl_exec($ch);

echo "<br>*****************************************<br>";
print("<pre>" . print_r($result, true) . "</pre>");
echo "<br>*****************************************<br>";

//close cURL resource
curl_close($ch);

?>
<script>
    window.close();
</script>
