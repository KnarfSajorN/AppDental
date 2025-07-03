<?php
// 30 08 2023 - JRodriguez
// conversion de la función "funcionMaster" a javascript para consultas y obtención de datos rápidos

// primero recibimos los datos por post
$filtro = ($_POST['filtro']);
$campoFiltrar = ($_POST['campoFiltrar']);
$campoImprimir = ($_POST['campoImprimir']);
$tabla = ($_POST['tabla']);

$order = "";
$condicion = "$campoFiltrar = '$filtro'";
$return = 0;

include './funciones/conn3.php';
$query = mysqli_query($conn3, "SELECT $campoImprimir FROM $tabla where $condicion " . (!empty($order) ? "order by $order" : "") . " limit 1");
$row = mysqli_fetch_array($query);
if (!empty(mysqli_num_rows($query))) {
    $result = $row[$campoImprimir];
} else {
    if (!empty($return)) {
        $result = "SELECT $campoImprimir FROM $tabla where $condicion " . (!empty($order) ? "order by $order" : "") . " limit 1";
    } else {
        $result = ($arrayConfig["notResult"] ? $arrayConfig["notResult"] : "-");
    }
}

echo $result;