<?php
include("../../funciones/conn3.php");

function funcionMaster($filtro, $campoFiltrar, $campoImprimir, $tabla)
{
    include '../../funciones/conn3.php';
    $query = mysqli_query($conn3, "SELECT * FROM $tabla where $campoFiltrar = '$filtro'");
    $nrowl = mysqli_num_rows($query);
    while ($row = mysqli_fetch_array($query)) {

        $text = $row[$campoImprimir];
    }
    return  $text;
}

function Calcular_Meses_Grafica_Rias($fecha){
    $fecha_nac = new DateTime(date('Y/m/d',strtotime($fecha))); // Creo un objeto DateTime de la fecha ingresada
    $fecha_hoy =  new DateTime(date('Y/m/d',time())); // Creo un objeto DateTime de la fecha de hoy
    $edad = date_diff($fecha_hoy,$fecha_nac); // La funcion ayuda a calcular la diferencia, esto seria un objeto
    return ($edad->format('%y')*12)+$edad->format('%m');
    }

if ($_POST["Tipo_Consulta"] == "Consultar Grafica Altura x Edad") {
    
    $cliente_id = $_POST["cliente_id"];

    $G = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');
    $Genero["F"] = "Femenino";
    $Genero["M"] = "Masculino";

    if($G=="M"){
        $Genero = $Genero["M"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#2c9cdb";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(54, 162, 235, 0.2)";
    
    }elseif ($G=="F") {    
        $Genero = $Genero["F"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#ec7893";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(255, 99, 132, 0.2)";
    }

    
    $QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE Tipo = 'Altura x Edad' AND Genero = '$Genero' ");
    $ArregloDatos = [];
    while ($RowLista = mysqli_fetch_array($QueryLista)) {
        $ArregloDatos["+3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3"]));
        $ArregloDatos["+2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2"]));
        $ArregloDatos["+1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1"]));
        $ArregloDatos["0"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD0"]));
        $ArregloDatos["-1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1neg"]));
        $ArregloDatos["-2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2neg"]));
        $ArregloDatos["-3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3neg"]));
        
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "black",
        "dataPoints"=> $ArregloDatos["+2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "black",
        "dataPoints"=> $ArregloDatos["+1"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "0",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#009900",
        "dataPoints"=> $ArregloDatos["0"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["-1"]
    );
    
    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#990000",
        "dataPoints"=> $ArregloDatos["-2"]
    );


    $QueryLista1 = mysqli_query($conn3, "SELECT * from Grafica_Crecimiento where cliente_id='{$cliente_id}' ORDER BY fecha ASC");
    while ($RowLista1 = mysqli_fetch_array($QueryLista1)) {
        if ($RowLista1['Edad'] <= 240) {
            $ArregloPaciente[$RowLista1['Edad']] = array("x" => floatval($RowLista1['Edad']), "y" => floatval($RowLista1["Altura"]));
        }
    }

    $fechaNacimiento= funcionMaster($cliente_id,'cliente_id','fechaNacimiento','cliente');          
    $EdadValorTemporal = Calcular_Meses_Grafica_Rias($fechaNacimiento);


    krsort($ArregloPaciente);

    foreach ($ArregloPaciente as $key => $value) {
        $ArregloDatos["Paciente"][] = array("x" => floatval($value["x"]), "y" => floatval($value["y"]));
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "Paciente",
        "showInLegend"=> true,
        "color"=> "blue",
        "dataPoints"=> $ArregloDatos["Paciente"]
    );

    if($EdadValorTemporal>=72){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [5 - 19 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 228;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 12;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 190;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 90;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 5; 
        

    }
    else if($EdadValorTemporal>60 AND $EdadValorTemporal<72){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 6 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 72;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 125;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 70;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 5; 
        

    }
    else if($EdadValorTemporal>24 AND $EdadValorTemporal<60){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 5 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 125;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 70;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 5; 
        

    }else{
        
        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [0 - 2 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 0;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 100;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 40;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 5; 
        

    }
    

    $ArregloParametrosGraficas['Data'] = $ArregloGraficas;

    echo json_encode($ArregloParametrosGraficas);
}




if ($_POST["Tipo_Consulta"] == "Consultar Grafica Altura x Peso") {
    
    $cliente_id = $_POST["cliente_id"];

    $G = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');
    $Genero["F"] = "Femenino";
    $Genero["M"] = "Masculino";

    if($G=="M"){
        $Genero = $Genero["M"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#2c9cdb";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(54, 162, 235, 0.2)";
    
    }elseif ($G=="F") {    
        $Genero = $Genero["F"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#ec7893";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(255, 99, 132, 0.2)";
    }



    $fechaNacimiento= funcionMaster($cliente_id,'cliente_id','fechaNacimiento','cliente');          
    $EdadValorTemporal = Calcular_Meses_Grafica_Rias($fechaNacimiento);

    if($EdadValorTemporal>24){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 5 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 120;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 65;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 5;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 32;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 4;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 
        
        $Tipo_TallaPeso = "2";
    }else{
        

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [0 - 2 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 110;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 45;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 5;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 26;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 1;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 

        $Tipo_TallaPeso = "1";
    }



        
        

    


    
    $QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE Tipo = 'Altura x Peso' AND Genero = '$Genero' AND Tipo_TallaPeso = '$Tipo_TallaPeso' ");
    $ArregloDatos = [];
    while ($RowLista = mysqli_fetch_array($QueryLista)) {
        $ArregloDatos["+3"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD3"]));
        $ArregloDatos["+2"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD2"]));
        $ArregloDatos["+1"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD1"]));
        $ArregloDatos["0"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD0"]));
        $ArregloDatos["-1"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD1neg"]));
        $ArregloDatos["-2"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD2neg"]));
        $ArregloDatos["-3"][] = array("x" => floatval($RowLista['Altura']), "y" => floatval($RowLista["SD3neg"]));
        
    }

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
        "color"=> "#990000",
        "dataPoints"=> $ArregloDatos["+2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["+1"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "0",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#009900",
        "dataPoints"=> $ArregloDatos["0"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["-1"]
    );
    
    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#990000",
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

    $QueryLista1 = mysqli_query($conn3, "SELECT * from Grafica_Crecimiento where cliente_id='{$cliente_id}' ORDER BY fecha ASC");
    while ($RowLista1 = mysqli_fetch_array($QueryLista1)) {
        if ($RowLista1['Edad'] <= 240) {
            $ArregloPaciente[$RowLista1['Altura']] = array("x" => floatval($RowLista1['Altura']), "y" => floatval($RowLista1["Peso"]));
        }
    }


    krsort($ArregloPaciente);
    
    foreach ($ArregloPaciente as $key => $value) {
        $ArregloDatos["Paciente"][] = array("x" => floatval($value["x"]), "y" => floatval($value["y"]));
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "Paciente",
        "showInLegend"=> true,
        "color"=> "blue",
        "dataPoints"=> $ArregloDatos["Paciente"]
    );
    

    $ArregloParametrosGraficas['Data'] = $ArregloGraficas;

    echo json_encode($ArregloParametrosGraficas);
}


if ($_POST["Tipo_Consulta"] == "Consultar Grafica Perimetro Cefalico") {
    
    $cliente_id = $_POST["cliente_id"];

    $G = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');
    $Genero["F"] = "Femenino";
    $Genero["M"] = "Masculino";

    if($G=="M"){
        $Genero = $Genero["M"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#2c9cdb";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(54, 162, 235, 0.2)";
    
    }elseif ($G=="F") {    
        $Genero = $Genero["F"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#ec7893";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(255, 99, 132, 0.2)";
    }

    
    
    $QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE Tipo = 'Perimetro Cefalico' AND Genero = '$Genero' ");
    $ArregloDatos = [];
    while ($RowLista = mysqli_fetch_array($QueryLista)) {
        $ArregloDatos["+3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3"]));
        $ArregloDatos["+2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2"]));
        $ArregloDatos["+1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1"]));
        $ArregloDatos["0"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD0"]));
        $ArregloDatos["-1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1neg"]));
        $ArregloDatos["-2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2neg"]));
        $ArregloDatos["-3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3neg"]));
        
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#990000",
        "dataPoints"=> $ArregloDatos["+2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["+1"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "0",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#009900",
        "dataPoints"=> $ArregloDatos["0"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["-1"]
    );
    
    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#990000",
        "dataPoints"=> $ArregloDatos["-2"]
    );


    $QueryLista1 = mysqli_query($conn3, "SELECT * from Grafica_Crecimiento where cliente_id='{$cliente_id}' ORDER BY fecha ASC");
    while ($RowLista1 = mysqli_fetch_array($QueryLista1)) {
        if ($RowLista1['Edad'] <= 240) {
            $ArregloPaciente[$RowLista1['Edad']] = array("x" => floatval($RowLista1['Edad']), "y" => floatval($RowLista1["Perimetro_Cefalico"]));
        }
    }

    $fechaNacimiento= funcionMaster($cliente_id,'cliente_id','fechaNacimiento','cliente');          
    $EdadValorTemporal = Calcular_Meses_Grafica_Rias($fechaNacimiento);

    krsort($ArregloPaciente);

    foreach ($ArregloPaciente as $key => $value) {
        $ArregloDatos["Paciente"][] = array("x" => floatval($value["x"]), "y" => floatval($value["y"]));
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "Paciente",
        "showInLegend"=> true,
        "color"=> "blue",
        "dataPoints"=> $ArregloDatos["Paciente"]
    );



        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [0 - 5 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 0;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 56;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 30;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 2; 
        

    
    

    $ArregloParametrosGraficas['Data'] = $ArregloGraficas;

    echo json_encode($ArregloParametrosGraficas);
}




if ($_POST["Tipo_Consulta"] == "Consultar Grafica IMC") {
    
    $cliente_id = $_POST["cliente_id"];

    $G = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');
    $Genero["F"] = "Femenino";
    $Genero["M"] = "Masculino";

    if($G=="M"){
        $Genero = $Genero["M"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#2c9cdb";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(54, 162, 235, 0.2)";
    
    }elseif ($G=="F") {    
        $Genero = $Genero["F"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#ec7893";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(255, 99, 132, 0.2)";
    }

    
    
    $QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE Tipo = 'IMC' AND Genero = '$Genero' ");
    $ArregloDatos = [];
    while ($RowLista = mysqli_fetch_array($QueryLista)) {
        $ArregloDatos["+3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3"]));
        $ArregloDatos["+2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2"]));
        $ArregloDatos["+1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1"]));
        $ArregloDatos["0"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD0"]));
        $ArregloDatos["-1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1neg"]));
        $ArregloDatos["-2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2neg"]));
        $ArregloDatos["-3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3neg"]));
        
    }

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
        "color"=> "#990000",
        "dataPoints"=> $ArregloDatos["+2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["+1"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "0",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#009900",
        "dataPoints"=> $ArregloDatos["0"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "black",
        "dataPoints"=> $ArregloDatos["-1"]
    );
    
    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "black",
        "dataPoints"=> $ArregloDatos["-2"]
    );


    $QueryLista1 = mysqli_query($conn3, "SELECT * from Grafica_Crecimiento where cliente_id='{$cliente_id}' ORDER BY fecha ASC");
    while ($RowLista1 = mysqli_fetch_array($QueryLista1)) {
        if ($RowLista1['Edad'] <= 240) {
            $ArregloPaciente[$RowLista1['Edad']] = array("x" => floatval($RowLista1['Edad']), "y" => floatval($RowLista1["IMC"]));
        }
    }

    $fechaNacimiento= funcionMaster($cliente_id,'cliente_id','fechaNacimiento','cliente');          
    $EdadValorTemporal = Calcular_Meses_Grafica_Rias($fechaNacimiento);


    krsort($ArregloPaciente);

    foreach ($ArregloPaciente as $key => $value) {
        $ArregloDatos["Paciente"][] = array("x" => floatval($value["x"]), "y" => floatval($value["y"]));
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "Paciente",
        "showInLegend"=> true,
        "color"=> "blue",
        "dataPoints"=> $ArregloDatos["Paciente"]
    );



    if($EdadValorTemporal>=72){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [5 - 19 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 228;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 12;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 37;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 10;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 2; 
        

    }
    else if($EdadValorTemporal>60 AND $EdadValorTemporal<72){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 6 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 72;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 22;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 11;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 
        

    }
    else if($EdadValorTemporal>24 AND $EdadValorTemporal<60){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 5 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 23;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 11;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 

    }else{
        

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [0 - 2 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 0;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 24;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 8;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 
    }


    $ArregloParametrosGraficas['Data'] = $ArregloGraficas;

    echo json_encode($ArregloParametrosGraficas);
}



if ($_POST["Tipo_Consulta"] == "Consultar Grafica Peso x Edad") {
    
    $cliente_id = $_POST["cliente_id"];

    $G = funcionMaster($cliente_id, 'cliente_id', 'genero', 'cliente');
    $Genero["F"] = "Femenino";
    $Genero["M"] = "Masculino";

    if($G=="M"){
        $Genero = $Genero["M"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#2c9cdb";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(54, 162, 235, 0.2)";
    
    }elseif ($G=="F") {    
        $Genero = $Genero["F"];
        $ArregloParametrosGraficas['Config']['colorLine'] = "#ec7893";
        $ArregloParametrosGraficas['Config']['colorFill'] = "rgba(255, 99, 132, 0.2)";
    }

   
    
    $QueryLista = mysqli_query($conn3, "SELECT * FROM Tabla_Crecimiento_Puntuacion_Z WHERE Tipo = 'Peso x Edad' AND Genero = '$Genero' ");
    $ArregloDatos = [];
    while ($RowLista = mysqli_fetch_array($QueryLista)) {
        $ArregloDatos["+3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3"]));
        $ArregloDatos["+2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2"]));
        $ArregloDatos["+1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1"]));
        $ArregloDatos["0"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD0"]));
        $ArregloDatos["-1"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD1neg"]));
        $ArregloDatos["-2"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD2neg"]));
        $ArregloDatos["-3"][] = array("x" => floatval($RowLista['Meses']), "y" => floatval($RowLista["SD3neg"]));
        
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "black",
        "dataPoints"=> $ArregloDatos["+2"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "+1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "black",
        "dataPoints"=> $ArregloDatos["+1"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "0",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#009900",
        "dataPoints"=> $ArregloDatos["0"]
    );

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-1",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#807000",
        "dataPoints"=> $ArregloDatos["-1"]
    );
    
    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "-2",
        "markerType"=> 0,
        "showInLegend"=> true,
        "color"=> "#990000",
        "dataPoints"=> $ArregloDatos["-2"]
    );


    $QueryLista1 = mysqli_query($conn3, "SELECT * from Grafica_Crecimiento where cliente_id='{$cliente_id}' ORDER BY fecha ASC");
    while ($RowLista1 = mysqli_fetch_array($QueryLista1)) {
        if ($RowLista1['Edad'] <= 240) {
            $ArregloPaciente[$RowLista1['Edad']] = array("x" => floatval($RowLista1['Edad']), "y" => floatval($RowLista1["Peso"]));
        }
    }

    $fechaNacimiento= funcionMaster($cliente_id,'cliente_id','fechaNacimiento','cliente');          
    $EdadValorTemporal = Calcular_Meses_Grafica_Rias($fechaNacimiento);


    krsort($ArregloPaciente);

    foreach ($ArregloPaciente as $key => $value) {
        $ArregloDatos["Paciente"][] = array("x" => floatval($value["x"]), "y" => floatval($value["y"]));
    }

    $ArregloGraficas[]=array(
        "type"=> "spline",
        "name"=> "Paciente",
        "showInLegend"=> true,
        "color"=> "blue",
        "dataPoints"=> $ArregloDatos["Paciente"]
    );

    

    if($EdadValorTemporal>=72){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [5 - 10 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 120;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 3;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 60;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 10;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 5; 
        

    }
    else if($EdadValorTemporal>60 AND $EdadValorTemporal<72){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 6 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 72;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 30;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 6;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 
        

    }
    else if($EdadValorTemporal>24 AND $EdadValorTemporal<60){

        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [2 - 5 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 60;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 30;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 6;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 
        

    }else{
        
        $ArregloParametrosGraficas['Config']['Tipo'] = "Puntuacion Z [0 - 2 Años]";

        $ArregloParametrosGraficas['Config']['max_grafica_x'] = 24;
        $ArregloParametrosGraficas['Config']['min_grafica_x'] = 0;
        $ArregloParametrosGraficas['Config']['intervalo_x'] = 2;

        $ArregloParametrosGraficas['Config']['max_grafica_y'] = 17;
        $ArregloParametrosGraficas['Config']['min_grafica_y'] = 0;
        $ArregloParametrosGraficas['Config']['intervalo_y'] = 1; 
        

    }
    

    $ArregloParametrosGraficas['Data'] = $ArregloGraficas;

    echo json_encode($ArregloParametrosGraficas);
}

?>