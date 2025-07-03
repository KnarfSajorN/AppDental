<?php
include "funciones/conn3.php";

foreach ($_POST["InformacionRips"] as $key => $value) {
    $Campos .= $key . ',';
    $Valores .= "'{$value}',";
}
$Campos = trim($Campos, ',');
$Valores = trim($Valores, ',');

$usuario_id = $_POST['RIP']["usuario_id"];
$cliente_id = $_POST['RIP']["cliente_id"];
$Historia_Nombre = $_POST['RIP']["Historia_Nombre"];
$historia_id = $_POST['RIP']["historia_id"];

$queryList = mysqli_query($conn3, "INSERT INTO Rips_Informacion (usuario_id,cliente_id,Nombre_Historia,historia_id,{$Campos}) VALUES ('$usuario_id','$cliente_id','$Historia_Nombre','$historia_id', {$Valores});");


?>