<?php 
session_start();
// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa
include '../../menuFlotante.php';
include '../menuFlotante.php';
// $miSistema = explode(",", str_replace('/', ',', $_SERVER['REQUEST_URI']));
// if ($miSistema[1] == 'baseDev'){
//     $miSistema[1] = 'alte';
// }
$miSistema[1] = $_SESSION['ID_principal'];
// para hacer pruebas descomentar las siguientes lineas
// ----------------------------------
    // $link[$miSistema[1]][0] = '8077';
    // $link[$miSistema[1]][1] = '205.209.96.94';
// ----------------------------------
// var_dump($link[$miSistema[1]][0]);
// var_dump($link[$miSistema[1]][1]);
if ($link[$miSistema[1]][0] != null) {
    // si tiene la vaina de WhatsApp
    $tieneWhatsApp = true;
} else {
    // no tiene la vaina de WhatsApp
    $tieneWhatsApp = false;
}
?>