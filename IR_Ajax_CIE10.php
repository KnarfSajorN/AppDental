<?php
include("funciones/conn3.php");

if (!isset($_POST['searchTerm'])) {
    $fetchData = mysqli_query($conn3, "select codigo,descripcion from cie10  order by codigo limit 1000");
} else {
    $search = $_POST['searchTerm'];
    $fetchData = mysqli_query($conn3, "select codigo,descripcion from cie10 where (codigo like '%" . $search . "%' OR descripcion like '%" . $search . "%')  limit 100");
}

$data = array();
while ($row = mysqli_fetch_array($fetchData)) {

    $data[] = array("id" => $row['codigo'], "text" => $row['codigo'] . ' - ' . utf8_encode($row['descripcion']));
}

$data[] = array("id" => " ", "text" => "Ninguno");

echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>