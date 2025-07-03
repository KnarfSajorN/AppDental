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


if ($_POST["Tipo_Consulta"] == "Eliminar Retencion") {

    $valor = $_POST["valor"];

    $queryList = mysqli_query($conn3, "UPDATE DetalleRetenciones SET Activo='0' WHERE id ='{$valor}' limit 1");

}
?>