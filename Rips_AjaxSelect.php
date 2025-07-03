<?php
include("funciones/conn3.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include 'funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

//1 -> Actividad Economica
if ($_POST["Tipo_Consulta"] == "1") {
    

    $query = mysqli_query($conn3, "SELECT * FROM EN_ActividadEconomica WHERE Activo = 1");
    while ($row = mysqli_fetch_array($query)) {
        $text .= "<option value='{$row[id]}'>{$row[Nombre]}</option>";
    }
    
    $Arreglo["Datos"] = $text;
     
    echo json_encode($Arreglo);
}



?>