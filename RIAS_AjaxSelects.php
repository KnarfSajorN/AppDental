<?php

include("funciones/conn3.php");


if ($_POST["Tipo"] == "CIE10") 
{
    
    if (!isset($_POST['searchTerm'])) {
        $fetchData = mysqli_query($conn3, "select codigo,descripcion from cie10  order by codigo DESC limit 500");
    } else {
        $search = $_POST['searchTerm'];
        $fetchData = mysqli_query($conn3, "select codigo,descripcion from cie10 where (codigo like '%" . $search . "%' OR descripcion like '%" . $search . "%')  ORDER BY codigo DESC limit 100");
    }


    $data = array();
    $data[] = array("id" => "", "text" => "Seleccione");

    while ($row = mysqli_fetch_array($fetchData)) {

        $data[] = array("id" => $row['codigo'], "text" => $row['codigo'] . ' - ' . utf8_encode($row['descripcion']));
    }


    echo json_encode($data, JSON_UNESCAPED_UNICODE);

}

if ($_POST["Tipo"] == "CUPS") 
{

    if (!isset($_POST['searchTerm'])) {
        $fetchData = mysqli_query($conn3, "select id,Codigo,Nombre from Cups  order by Codigo limit 500");
    } else {
        $search = $_POST['searchTerm'];
        $fetchData = mysqli_query($conn3, "select id,Codigo,Nombre from Cups where (Codigo like '%" . $search . "%' OR Nombre like '%" . $search . "%')  limit 100");
    }
    
    
    $data = array();
    $data[] = array("id" => "", "text" => "Seleccione");
    
    while ($row = mysqli_fetch_array($fetchData)) {
    
        $data[] = array("id" => $row['id'], "text" => $row['Codigo'] . ' - ' . utf8_encode($row['Nombre']));
    }
    
    
    echo json_encode($data, JSON_UNESCAPED_UNICODE);

}
?>