<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");

$con = conectar();


$fechar = date("Y-m-d");
$hora = date("H:i:s");


$fechan = $_POST['fechan'];

$USUARIO            = $_POST['usuarioId'];
$PASS               = $_POST['PASS'];
$whatsapp               = $_POST['whatsapp'];



    

    $queryCliente = "UPDATE sucursales SET  whatsapp= '$whatsapp  '  WHERE id = '$USUARIO'";

    mysql_query($queryCliente, $con) or die(mysql_error());


    //mssql_query("UPDATE config SET  logoF= '$nombrer'  WHERE ID_Usuario =   '$usuarioId'");











echo "<script language='Javascript'> window.location='sucursales';   </script>";
?>