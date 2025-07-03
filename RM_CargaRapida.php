<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");

if ($_POST["Tipo"] == "Carga Medicamentos") 
{
    $conn4 = $conn3;
    
    if (!isset($_POST['searchTerm'])) {
        $fetchData = mysqli_query($conn3, "select id,descripcion FROM medicamentosJose WHERE Activo='1' limit 200");
    } else {
        $search = $_POST['searchTerm'];
        $fetchData = mysqli_query($conn3, "select id,descripcion from medicamentosJose WHERE (descripcion LIKE '%$search%' or descripcion LIKE '%$search%') AND Activo='1' limit 100");
    }

    $data = array();
    while ($row = mysqli_fetch_array($fetchData)) {

        $data[] = array("id" => $row['id'], "text" => ($row['descripcion']));
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}


?>