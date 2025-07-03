<?php

include("funciones/conn3.php");

$id = $_POST['id'];
$queryList = mysqli_query($conn3, "select id,Codigo,Nombre from Cups  where id = $id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $NombreCodigo = $rowMotorizado["Nombre"]." - ".$rowMotorizado["Codigo"];
}

echo utf8_encode($NombreCodigo);
?>