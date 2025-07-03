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




if ($_POST["Tipo_Consulta"] == "Consultar Grafica 1") {
    
    $cliente_id = $_POST["cliente_id"];
    
    $QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE tipo = 'Peso para Talla' AND genero = 'M' AND A_Desde = 0 AND A_Hasta = 2;");
    $ArregloDatos = [];
    while ($RowLista = mysqli_fetch_array($QueryLista)) {
        $ArregloDatos["+3"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD3"]);
        $ArregloDatos["+2"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD2"]);
        $ArregloDatos["+1"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD1"]);
        $ArregloDatos["0"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD0"]);
        $ArregloDatos["-1"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD1neg"]);
        $ArregloDatos["-2"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD2neg"]);
        $ArregloDatos["-3"][] = array("x" => $RowLista['Length'], "y" => $RowLista["SD3neg"]);
        
    }

    echo "<pre>";
    print_r($ArregloDatos);
    echo "</pre>";

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+3",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["+3"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["+2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["+1"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "0",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["0"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["-1"]
    );
    
    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["-2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-3",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "red",
        "dataPoints"=> $ArregloDatos["-3"]
    );


    echo json_encode($ArregloGraficas,JSON_NUMERIC_CHECK);
}

?>