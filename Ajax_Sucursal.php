<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");

    if (!isset($_POST['searchTerm'])) {
        $fetchData = mysqli_query($conn3, "select * FROM sucursales limit 500");
    } else {
        $search = $_POST['searchTerm'];
        $fetchData = mysqli_query($conn3, "select * from sucursales WHERE (descripcion LIKE '%$search%') limit 100");
    }

    $data = array();
    while ($row = mysqli_fetch_array($fetchData)) {

        $data[] = array("id" => $row['id'], "text" => utf8_encode($row['descripcion']));
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);

?>