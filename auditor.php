<?php
include 'funciones/conn3.php';

date_default_timezone_set('America/Bogota');


$ip = $_SERVER['REMOTE_ADDR']; 

$idUsuario= $row['ID'];
$fecha =date("Y-m-d H:i:s");

  		 
            $queryList=mysqli_query($conn3,"INSERT INTO auditor (idUsuario, ip, fecha, tipo) VALUES ('$idUsuario', '$ip', '$fecha', '1');");



?> 