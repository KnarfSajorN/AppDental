<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");

if($_POST["Tipo"]=="Consulta")
{
    $tipoConsulta = $_POST['tipoConsulta'];

    $queryList = mysqli_query($conn3, "SELECT * FROM tipoConsulta where ID_Consulta= '$tipoConsulta' ");
    $nrowl = mysqli_num_rows($queryList);
    while ($row_recordset32A = mysqli_fetch_array($queryList)) {
        $cod = $row_recordset32A['codigo'];
        $nombre = ($row_recordset32A['nombre']);

        echo "<option value='$cod'> $nombre </option>";
    }
}

if ($_POST["Tipo"] == "CIE10") 
{
    if (!isset($_POST['searchTerm']) || $_POST['searchTerm'] == ''|| $_POST['searchTerm'] == NULL) {
        $fetchData = mysqli_query($conn3, "SELECT codigo,descripcion from  cie11 order by codigo limit 100");
        // echo "entro  1";
    } else {
        $search = $_POST['searchTerm'];
        $fetchData = mysqli_query($conn3, "SELECT codigo,descripcion from  cie11 where (codigo like '%" . $search . "%' OR descripcion like '%" . $search . "%') limit 100");
        // echo "entro  2"; 
    }

    $data = array();
    while ($row = mysqli_fetch_array($fetchData)) {

        $data[] = array("id" => $row['codigo'], "text" => $row['codigo'] . ' - ' . ($row['descripcion']));
    }

    $data[] = array("id" => " ", "text" => "Ninguno");
//    var_dump($data);
    
    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

if ($_POST["Tipo"] == "CUP") 
{
    $contrato = $_POST["contrato"];
    // echo "SELECT id,Codigo,Nombre FROM Cups limit 500";

    if (!isset($_POST['searchTerm']) || $_POST['searchTerm'] == '') {
        // echo "1";
        $fetchData = mysqli_query($conn3, "SELECT id,Codigo,Nombre FROM Cups limit 500");
    } else {
        // echo "2";
        $search = $_POST['searchTerm'];
        $fetchData = mysqli_query($conn3, "SELECT id,Codigo,Nombre from Cups WHERE (Nombre LIKE '%$search%' or Codigo LIKE '%$search%') limit 100");
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($fetchData)) {
        // var_dump($row);
        $data[] = array("id" => $row['id'], "text" => $row['Codigo'].' - '.(utf8_encode($row['Nombre'])));
    }

    echo json_encode($data, JSON_UNESCAPED_UNICODE);
}

if ($_POST["Tipo"] == "CodigoCup") {
    $cup_id = $_POST["cup_id"];

    $queryinv = mysqli_query($conn3, "SELECT * FROM  Cups where  id = $cup_id");
    while ($rowinv = mysqli_fetch_array($queryinv)) {
        $Codigo = $rowinv["Codigo"];

        echo $Codigo;
    }
}
