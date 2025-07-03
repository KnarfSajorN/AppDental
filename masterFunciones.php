<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// <meta name="robots" content="noindex">
// <meta name="googlebot" content="noindex">
//  medicalsoftplus
//   include '.. /../masterFunciones.php';

if (!isset($_SESSION['linkkey']) || $_SESSION['linkkey'] == ''){
    // real
    // $linkkey = 'http://205.209.100.222:8000/send-message/bWVkaWNhc28='; // bWVkaWNhc28= == medicaso
    $linkkey = 'http://205.209.96.94:8000/send-message/'.base64_encode('base'); // YWx0ZQ== == alte

    // emergencia
    // $linkkey = 'https://498e-186-29-200-128.ngrok-free.app/send-message/YWx0ZQ=='; // YWx0ZQ== == alte
}else{
    $linkkey = $_SESSION['linkkey'];
}




// menu soporte
$antiPiratas = 'oinwfme@$#Ñ#%284@$#@ñ';
// menu soporte fin



// ----------------------------------
// bloqueo vencidos
// ----------------------------------
// include 'blockPeriodicos.php';
// ----------------------------------



// ----------------------------------
// mensaje emergencia
// ----------------------------------
// include 'mensajeGeneral.php';
// ----------------------------------



// ----------------------------------
// 27 12 2022 - Jose
// menu flotante para opciones de requerimientos y control de horas / whatsapp
// ----------------------------------
// var_dump('test');
// include 'menuFlotante.php';
// ----------------------------------

// ----------------------------------
// 09 01 2023 - Jose
// firma de contratos para los clientes antiguos a las nuevas políticas
// ----------------------------------
//include 'nuevoContrato.php';
// ----------------------------------

// ----------------------------------
// 10 07 2023 - Jose
// pago mensual mantenimiento - seguridad
// ----------------------------------
// include 'mensajePagoMensual.php';
// ----------------------------------
