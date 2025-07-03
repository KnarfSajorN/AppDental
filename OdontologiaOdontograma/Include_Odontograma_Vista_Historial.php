<?php
// $cliente_id = decrypt($_GET['cI']);

$usuario_id = $_SESSION['ID'];

$QueryOdontograma = "SELECT * FROM OD_OdontogramaMaster_Fin WHERE historia_bo_id= '{$ID}' "; 
$ResultOdontograma = mysqli_query($conn3, $QueryOdontograma) or die("Error al consultar odontograma => " . (mysqli_error($conn3)));
$RowOdontograma = mysqli_fetch_array($ResultOdontograma);


?>
<!-- Content Wrapper. Contains page content -->
<!-- Content Header (Page header) -->

<!-- Main content -->
<section class="content">
    <div class="">
        <div class="content">
            <div class="box-body">
                <div class='col-md-12 row'>
                    <?php

                    $ArregloArriba1[0] = ["18", "17", "16", "15", "14", "13", "12", "11"];
                    $ArregloArriba2[0] = ["Vacio", "55", "54", "53", "52", "51"];

                    $ArregloArriba1[1] = ["21", "22", "23", "24", "25", "26", "27", "28"];
                    $ArregloArriba2[1] = ["61", "62", "63", "64", "65", "Vacio"];

                    foreach ($ArregloArriba1 as $key1 => $value1) {
                        $contador = 0;
                        foreach ($value1 as $key => $value) {
                            $contador++;
                            if ($contador == "1") {
                                $contadorGeneral++;
                                echo "<div class='col-lg-3 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                            }

                            

                            switch ($value) {
                                case "18":
                                case "17":
                                case "16":
                                case "15":
                                case "14":
                                    $DataArriba = "data-diente='Vestibular'";
                                    $DataIzquierda = "data-diente='Distal'";
                                    $DataDerecha = "data-diente='Mesial'";
                                    $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                    $DataCentro = "data-diente='Oclusal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                    $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                    break;
                                case "13":
                                case "12":
                                case "11":
                                    $DataArriba = "data-diente='Vestibular'";
                                    $DataIzquierda = "data-diente='Distal'";
                                    $DataDerecha = "data-diente='Mesial'";
                                    $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                    $DataCentro = "data-diente='Borde Incisal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                    $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                    break;
                                case "21":
                                case "22":
                                case "23":
                                    $DataArriba = "data-diente='Vestibular'";
                                    $DataIzquierda = "data-diente='Mesial'";
                                    $DataDerecha = "data-diente='Distal'";
                                    $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                    $DataCentro = "data-diente='Borde Incisal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                    $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                    break;
                                case "24":
                                case "25":
                                case "26":
                                case "27":
                                case "28":
                                    $DataArriba = "data-diente='Vestibular'";
                                    $DataIzquierda = "data-diente='Mesial'";
                                    $DataDerecha = "data-diente='Distal'";
                                    $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                    $DataCentro = "data-diente='Oclusal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                    $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                    break;
                            }

                            $diente_id = $_POST["diente_id"];

                            

                            //Esto funcion para el editar procedimientos//
                            $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                            $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                            $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                            $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                            $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                            $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                            $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);

                            $ArregloD = json_decode($RowOdontograma["d$value"], true);
                            $ArregloR = json_decode($RowOdontograma["r$value"], true);

                            $SVG_RecuadroSuperior = funcionMaster(funcionMaster($ArregloD[0], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroSuperior = funcionMaster($ArregloD[0], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSuperior}'", $SVG_RecuadroSuperior);

                            $SVG_RecuadroIzquierdo = funcionMaster(funcionMaster($ArregloD[1], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroIzquierdo = funcionMaster($ArregloD[1], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroIzquierdo = str_replace('fill="currentColor"', "fill='{$Color_RecuadroIzquierdo}'", $SVG_RecuadroIzquierdo);

                            $SVG_RecuadroInferior = funcionMaster(funcionMaster($ArregloD[2], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroInferior = funcionMaster($ArregloD[2], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroInferior}'", $SVG_RecuadroInferior);

                            $SVG_RecuadroDerecha = funcionMaster(funcionMaster($ArregloD[3], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroDerecha = funcionMaster($ArregloD[3], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroDerecha = str_replace('fill="currentColor"', "fill='{$Color_RecuadroDerecha}'", $SVG_RecuadroDerecha);

                            $SVG_RecuadroCentro = funcionMaster(funcionMaster($ArregloD[4], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroCentro = funcionMaster($ArregloD[4], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroCentro = str_replace('fill="currentColor"', "fill='{$Color_RecuadroCentro}'", $SVG_RecuadroCentro);

                            $SVG_RecuadroSeparadoSuperior = funcionMaster(funcionMaster($ArregloD[5], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroSeparadoSuperior = funcionMaster($ArregloD[5], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroSeparadoSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoSuperior}'", $SVG_RecuadroSeparadoSuperior);

                            $SVG_RecuadroSeparadoInferior = funcionMaster(funcionMaster($ArregloD[6], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroSeparadoInferior = funcionMaster($ArregloD[6], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroSeparadoInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoInferior}'", $SVG_RecuadroSeparadoInferior);

                            echo "<div class='col-md-3 col-xs-3 col-perso'> 
                                        <label style='left: 15px;position:relative;padding-bottom: 0px;'>{$value}</label>
                                        <div style='width:60px;height: 60px;text-align-last: center;' class='diente_img rotate_icon diente_img_general' id='ImagenDiente_{$ID}_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative; width:20px'> </div>
                                        
                                        <div class='col-md-12 recuadros'>
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'>{$SVG_RecuadroSeparadoSuperior}</div>

                                            <div id='RecuadroSuperior_{$ID}_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'>{$SVG_RecuadroSuperior}</div>
                                            <div id='RecuadroIzquierdo_{$ID}_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'>{$SVG_RecuadroIzquierdo}</div>
                                            <div id='RecuadroInferior_{$ID}_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'>{$SVG_RecuadroInferior}</div>
                                            <div id='RecuadroDerecha_{$ID}_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma'>{$SVG_RecuadroDerecha}</div>
                                            <div id='RecuadroCentro_{$ID}_{$value}' {$DataCentro} class='centro click_odontograma'>{$SVG_RecuadroCentro}</div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' >{$SVG_RecuadroSeparadoInferior}</div>
                                        </div>
                                    </div>";

                            if ($contador == "4") {
                                echo "</div>";
                                $contador = 0;
                            }
                        }
                    }

                    foreach ($ArregloArriba2 as $key1 => $value1) {
                        $contador = 0;
                        $contadorGeneral++;
                        echo "<div class='col-lg-6 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                        foreach ($value1 as $key => $value) {
                            if ($value == "Vacio") {
                                echo "<div class='col-md-2 col-xs-0'></div>";
                            } else {

                                switch ($value) {
                                    case "55":
                                    case "54":
                                    case "53":
                                        $DataArriba = "data-diente='Vestibular'";
                                        $DataIzquierda = "data-diente='Distal'";
                                        $DataDerecha = "data-diente='Mesial'";
                                        $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                        $DataCentro = "data-diente='Oclusal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                        $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                        break;
                                    case "52":
                                    case "51":
                                        $DataArriba = "data-diente='Vestibular'";
                                        $DataIzquierda = "data-diente='Distal'";
                                        $DataDerecha = "data-diente='Mesial'";
                                        $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                        $DataCentro = "data-diente='Borde Incisal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                        $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                        break;
                                    case "61":
                                    case "62":
                                        $DataArriba = "data-diente='Vestibular'";
                                        $DataIzquierda = "data-diente='Mesial'";
                                        $DataDerecha = "data-diente='Distal'";
                                        $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                        $DataCentro = "data-diente='Borde Incisal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                        $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                        break;
                                    case "63":
                                    case "64":
                                    case "65":
                                        $DataArriba = "data-diente='Vestibular'";
                                        $DataIzquierda = "data-diente='Mesial'";
                                        $DataDerecha = "data-diente='Distal'";
                                        $DataAbajo = "data-diente='Palatino'"; //lingual es para inferior | palatino superior
                                        $DataCentro = "data-diente='Oclusal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Vestibular'";
                                        $DataSeparadoInferior = "data-diente='Cuello Palatino'";
                                        break;
                                }

                                //Esto funcion para el editar procedimientos//
                                $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);


                                $ArregloD = json_decode($RowOdontograma["d$value"], true);
                                $ArregloR = json_decode($RowOdontograma["r$value"], true);
    
                                $SVG_RecuadroSuperior = funcionMaster(funcionMaster($ArregloD[0], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroSuperior = funcionMaster($ArregloD[0], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSuperior}'", $SVG_RecuadroSuperior);

                                $SVG_RecuadroIzquierdo = funcionMaster(funcionMaster($ArregloD[1], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroIzquierdo = funcionMaster($ArregloD[1], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroIzquierdo = str_replace('fill="currentColor"', "fill='{$Color_RecuadroIzquierdo}'", $SVG_RecuadroIzquierdo);

                                $SVG_RecuadroInferior = funcionMaster(funcionMaster($ArregloD[2], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroInferior = funcionMaster($ArregloD[2], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroInferior}'", $SVG_RecuadroInferior);

                                $SVG_RecuadroDerecha = funcionMaster(funcionMaster($ArregloD[3], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroDerecha = funcionMaster($ArregloD[3], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroDerecha = str_replace('fill="currentColor"', "fill='{$Color_RecuadroDerecha}'", $SVG_RecuadroDerecha);

                                $SVG_RecuadroCentro = funcionMaster(funcionMaster($ArregloD[4], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroCentro = funcionMaster($ArregloD[4], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroCentro = str_replace('fill="currentColor"', "fill='{$Color_RecuadroCentro}'", $SVG_RecuadroCentro);

                                $SVG_RecuadroSeparadoSuperior = funcionMaster(funcionMaster($ArregloD[5], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroSeparadoSuperior = funcionMaster($ArregloD[5], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroSeparadoSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoSuperior}'", $SVG_RecuadroSeparadoSuperior);

                                $SVG_RecuadroSeparadoInferior = funcionMaster(funcionMaster($ArregloD[6], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroSeparadoInferior = funcionMaster($ArregloD[6], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroSeparadoInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoInferior}'", $SVG_RecuadroSeparadoInferior);

                                echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        
                                        
                                        <label style='left: 15px;position:relative;padding-bottom: 0px;'>{$value}</label>
                                        <div style='width:60px;height: 60px;text-align-last: center;' class='diente_img1 rotate_icon diente_img_general' id='ImagenDiente_{$ID}_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative; width:20px'> </div>
                                            
                                        <div class='col-md-12 recuadros recuadroperso' >
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'>{$SVG_RecuadroSeparadoSuperior}</div>

                                            <div id='RecuadroSuperior_{$ID}_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'>{$SVG_RecuadroSuperior}</div>
                                            <div id='RecuadroIzquierdo_{$ID}_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'>{$SVG_RecuadroIzquierdo}</div>
                                            <div id='RecuadroInferior_{$ID}_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'>{$SVG_RecuadroInferior}</div>
                                            <div id='RecuadroDerecha_{$ID}_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '>{$SVG_RecuadroDerecha}</div>
                                            <div id='RecuadroCentro_{$ID}_{$value}' {$DataCentro} class='centro click_odontograma'>{$SVG_RecuadroCentro}</div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' >{$SVG_RecuadroSeparadoInferior}</div>
                                        </div>
                                    </div>";
                            }
                            $contador++;
                        }
                        echo "</div>";
                    }


                    /////////////////////////////////? Parte inferior /////////////////////////////////////////////////////////

                    $ArregloAbajo1[0] = ["Vacio", "85", "84", "83", "82", "81"];
                    $ArregloAbajo2[0] = ["48", "47", "46", "45", "44", "43", "42", "41"];

                    $ArregloAbajo1[1] = ["71", "72", "73", "74", "75", "Vacio"];
                    $ArregloAbajo2[1] = ["31", "32", "33", "34", "35", "36", "37", "38"];


                    foreach ($ArregloAbajo1 as $key1 => $value1) {
                        $contador = 0;
                        $contadorGeneral++;
                        echo "<div class='col-lg-6 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                        foreach ($value1 as $key => $value) {
                            if ($value == "Vacio") {
                                echo "<div class='col-md-2 col-xs-0'></div>";
                            } else {

                                switch ($value) {
                                    case "85":
                                    case "84":
                                    case "83":
                                        $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                        $DataIzquierda = "data-diente='Distal'";
                                        $DataDerecha = "data-diente='Mesial'";
                                        $DataAbajo = "data-diente='Vestibular'";
                                        $DataCentro = "data-diente='Oclusal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                        $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                        break;
                                    case "82":
                                    case "81":
                                        $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                        $DataIzquierda = "data-diente='Distal'";
                                        $DataDerecha = "data-diente='Mesial'";
                                        $DataAbajo = "data-diente='Vestibular'";
                                        $DataCentro = "data-diente='Borde Incisal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                        $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                        break;
                                    case "71":
                                    case "72":
                                        $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                        $DataIzquierda = "data-diente='Mesial'";
                                        $DataDerecha = "data-diente='Distal'";
                                        $DataAbajo = "data-diente='Vestibular'";
                                        $DataCentro = "data-diente='Borde Incisal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                        $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                        break;
                                    case "73":
                                    case "74":
                                    case "75":
                                        $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior
                                        $DataIzquierda = "data-diente='Mesial'";
                                        $DataDerecha = "data-diente='Distal'";
                                        $DataAbajo = "data-diente='Vestibular'";
                                        $DataCentro = "data-diente='Oclusal'";

                                        $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                        $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                        break;
                                }

                                //Esto funcion para el editar procedimientos//
                                $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);

                                $ArregloD = json_decode($RowOdontograma["d$value"], true);
                                $ArregloR = json_decode($RowOdontograma["r$value"], true);
    
                                $SVG_RecuadroSuperior = funcionMaster(funcionMaster($ArregloD[0], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroSuperior = funcionMaster($ArregloD[0], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSuperior}'", $SVG_RecuadroSuperior);

                                $SVG_RecuadroIzquierdo = funcionMaster(funcionMaster($ArregloD[1], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroIzquierdo = funcionMaster($ArregloD[1], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroIzquierdo = str_replace('fill="currentColor"', "fill='{$Color_RecuadroIzquierdo}'", $SVG_RecuadroIzquierdo);

                                $SVG_RecuadroInferior = funcionMaster(funcionMaster($ArregloD[2], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroInferior = funcionMaster($ArregloD[2], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroInferior}'", $SVG_RecuadroInferior);

                                $SVG_RecuadroDerecha = funcionMaster(funcionMaster($ArregloD[3], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroDerecha = funcionMaster($ArregloD[3], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroDerecha = str_replace('fill="currentColor"', "fill='{$Color_RecuadroDerecha}'", $SVG_RecuadroDerecha);

                                $SVG_RecuadroCentro = funcionMaster(funcionMaster($ArregloD[4], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroCentro = funcionMaster($ArregloD[4], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroCentro = str_replace('fill="currentColor"', "fill='{$Color_RecuadroCentro}'", $SVG_RecuadroCentro);

                                $SVG_RecuadroSeparadoSuperior = funcionMaster(funcionMaster($ArregloD[5], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroSeparadoSuperior = funcionMaster($ArregloD[5], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroSeparadoSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoSuperior}'", $SVG_RecuadroSeparadoSuperior);

                                $SVG_RecuadroSeparadoInferior = funcionMaster(funcionMaster($ArregloD[6], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                                $Color_RecuadroSeparadoInferior = funcionMaster($ArregloD[6], 'id', 'Color', 'OD_Procedimiento');
                                $SVG_RecuadroSeparadoInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoInferior}'", $SVG_RecuadroSeparadoInferior);

                                echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        

                                        <label style='left: 15px;position:relative;padding-bottom: 0px;'>{$value}</label>
                                        <div style='width:60px;height: 60px;text-align-last: center;' class='diente_img2 diente_img_general' id='ImagenDiente_{$ID}_{$value}' > <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;width:20px'> </div>
                                            
                                        <div class='col-md-12 recuadros recuadroperso'>
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'>{$SVG_RecuadroSeparadoSuperior}</div>

                                            <div id='RecuadroSuperior_{$ID}_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'>{$SVG_RecuadroSuperior}</div>
                                            <div id='RecuadroIzquierdo_{$ID}_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'>{$SVG_RecuadroIzquierdo}</div>
                                            <div id='RecuadroInferior_{$ID}_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'>{$SVG_RecuadroInferior}</div>
                                            <div id='RecuadroDerecha_{$ID}_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '>{$SVG_RecuadroDerecha}</div>
                                            <div id='RecuadroCentro_{$ID}_{$value}' {$DataCentro} class='centro click_odontograma'>{$SVG_RecuadroCentro}</div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' >{$SVG_RecuadroSeparadoInferior}</div>
                                        </div>
                                    </div>";
                            }
                            $contador++;
                        }
                        echo "</div>";
                    }

                    foreach ($ArregloAbajo2 as $key1 => $value1) {
                        $contador = 0;
                        foreach ($value1 as $key => $value) {
                            $contador++;
                            if ($contador == "1") {
                                $contadorGeneral++;
                                echo "<div class='col-lg-3 col-md-6 col-xs-12 G_{$contadorGeneral} row'>";
                            }

                            switch ($value) {
                                case "48":
                                case "47":
                                case "46":
                                case "45":
                                case "44":
                                    $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                    $DataIzquierda = "data-diente='Distal'";
                                    $DataDerecha = "data-diente='Mesial'";
                                    $DataAbajo = "data-diente='Vestibular'";
                                    $DataCentro = "data-diente='Oclusal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                    $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                    break;
                                case "43":
                                case "42":
                                case "41":
                                    $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                    $DataIzquierda = "data-diente='Distal'";
                                    $DataDerecha = "data-diente='Mesial'";
                                    $DataAbajo = "data-diente='Vestibular'";
                                    $DataCentro = "data-diente='Borde Incisal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                    $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                    break;
                                case "31":
                                case "32":
                                case "33":
                                    $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                    $DataIzquierda = "data-diente='Mesial'";
                                    $DataDerecha = "data-diente='Distal'";
                                    $DataAbajo = "data-diente='Vestibular'";
                                    $DataCentro = "data-diente='Borde Incisal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                    $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                    break;
                                case "34":
                                case "35":
                                case "36":
                                case "37":
                                case "38":
                                    $DataArriba = "data-diente='Lingual'"; //lingual es para inferior | palatino superior [posicion dientes] 
                                    $DataIzquierda = "data-diente='Mesial'";
                                    $DataDerecha = "data-diente='Distal'";
                                    $DataAbajo = "data-diente='Vestibular'";
                                    $DataCentro = "data-diente='Oclusal'";

                                    $DataSeparadoSuperior = "data-diente='Cuello Lingual'";
                                    $DataSeparadoInferior = "data-diente='Cuello Vestibular'";
                                    break;
                            }

                            //Esto funcion para el editar procedimientos//
                            $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                            $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                            $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                            $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                            $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                            $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                            $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);

                            $ArregloD = json_decode($RowOdontograma["d$value"], true);
                            $ArregloR = json_decode($RowOdontograma["r$value"], true);

                            $SVG_RecuadroSuperior = funcionMaster(funcionMaster($ArregloD[0], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroSuperior = funcionMaster($ArregloD[0], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSuperior}'", $SVG_RecuadroSuperior);

                            $SVG_RecuadroIzquierdo = funcionMaster(funcionMaster($ArregloD[1], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroIzquierdo = funcionMaster($ArregloD[1], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroIzquierdo = str_replace('fill="currentColor"', "fill='{$Color_RecuadroIzquierdo}'", $SVG_RecuadroIzquierdo);

                            $SVG_RecuadroInferior = funcionMaster(funcionMaster($ArregloD[2], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroInferior = funcionMaster($ArregloD[2], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroInferior}'", $SVG_RecuadroInferior);

                            $SVG_RecuadroDerecha = funcionMaster(funcionMaster($ArregloD[3], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroDerecha = funcionMaster($ArregloD[3], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroDerecha = str_replace('fill="currentColor"', "fill='{$Color_RecuadroDerecha}'", $SVG_RecuadroDerecha);

                            $SVG_RecuadroCentro = funcionMaster(funcionMaster($ArregloD[4], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroCentro = funcionMaster($ArregloD[4], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroCentro = str_replace('fill="currentColor"', "fill='{$Color_RecuadroCentro}'", $SVG_RecuadroCentro);

                            $SVG_RecuadroSeparadoSuperior = funcionMaster(funcionMaster($ArregloD[5], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroSeparadoSuperior = funcionMaster($ArregloD[5], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroSeparadoSuperior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoSuperior}'", $SVG_RecuadroSeparadoSuperior);

                            $SVG_RecuadroSeparadoInferior = funcionMaster(funcionMaster($ArregloD[6], 'id', 'Icono', 'OD_Procedimiento'), 'id', 'SVG', 'OD_Iconos_SVG');
                            $Color_RecuadroSeparadoInferior = funcionMaster($ArregloD[6], 'id', 'Color', 'OD_Procedimiento');
                            $SVG_RecuadroSeparadoInferior = str_replace('fill="currentColor"', "fill='{$Color_RecuadroSeparadoInferior}'", $SVG_RecuadroSeparadoInferior);

                            echo "<div class='col-md-3 col-xs-3 col-perso'> 
                                    
                                        

                                        <label style='left: 15px;position:relative;padding-bottom: 0px;'>{$value}</label>
                                        <div style='width:60px;height: 60px;text-align-last: center;' class='diente_img3 diente_img_general' id='ImagenDiente_{$ID}_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;width:20px'> </div>
                                        
                                        <div class='col-md-12 recuadros'>
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'>{$SVG_RecuadroSuperior}</div>

                                            <div id='RecuadroSuperior_{$ID}_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'>{$SVG_RecuadroIzquierdo}</div>
                                            <div id='RecuadroIzquierdo_{$ID}_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'>{$SVG_RecuadroInferior}</div>
                                            <div id='RecuadroInferior_{$ID}_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'>{$SVG_RecuadroDerecha}</div>
                                            <div id='RecuadroDerecha_{$ID}_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '>{$SVG_RecuadroCentro}</div>
                                            <div id='RecuadroCentro_{$ID}_{$value}' {$DataCentro} class='centro click_odontograma'>{$SVG_RecuadroSeparadoSuperior}</div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' >{$SVG_RecuadroSeparadoInferior}</div>
                                        </div>
                                    </div>";

                            if ($contador == "4") {
                                echo "</div>";
                                $contador = 0;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- /.content -->

<!-- /ICONOS  -->
<?php 
$queryList = mysqli_query($conn3, "SELECT * FROM OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $id_procedimiento = $rowMotorizado['id'];
    $Icono = $rowMotorizado['Icono'];
    $Color = $rowMotorizado['Color'];
    $Nombre = $rowMotorizado['Nombre'];

    $SVG = funcionMaster($Icono, 'id', 'SVG', 'OD_Iconos_SVG');
    $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
    $SVG = str_replace('"', "|", $SVG);
    $SVG = str_replace("\r\n", "■", $SVG);
    $SVG = str_replace("\n", "°", $SVG);


    $ArregloSVG["$id_procedimiento"] = $SVG;

    //inventario id
    $inventario_id = $rowMotorizado['inventario_id'];
    $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
    if ($Nombre_Inventario != "") {
        $Nombre_Inventario = " / [ " . $Nombre_Inventario . " ]";
    }
    //inventario id


    // echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";

    //Esto funcion para el editar procedimientos//
    $ArregloSwal = $ArregloSwal . "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
}

$ArregloSVGTXT = json_encode($ArregloSVG);

?>

<!-- /ICONOS  -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<script>
    var ArregloIconos = JSON.parse(<?php echo json_encode($ArregloSVGTXT); ?>);

    var ArregloSVG = JSON.parse('<?= $ArregloSVGTXT; ?>');
    //console.log(ArregloSVG);
    document.getElementsByTagName("body")[0].classList.add("sidebar-collapse");

    function ModalPiezaOdontograma(diente_id, posicion, NombreCara, Toda_Pieza) {

        $('#modalPieza').modal('show');
        document.getElementById("diente_id").value = diente_id;
        document.getElementById("Diente_Posicion").value = posicion;
        document.getElementById("Diente_NombreCara").value = NombreCara;
        if (Toda_Pieza == undefined) {
            document.getElementById("Diente_TodaPieza").value = "";
        } else {
            document.getElementById("Diente_TodaPieza").value = Toda_Pieza;
        }


        document.getElementById("Tipo_Diente_Cara").innerText = NombreCara;
        document.getElementById("Imagen_Diente").innerHTML = "<label>" + diente_id + "</label><img src='OD_ImagenOdontograma/" + diente_id + ".png'>";

    }


    function CargarImagenPieza(elemento) {
        //console.log(elemento)
        // var usuario_id = document.getElementById("usuario_id").value;
        // var cliente_id = document.getElementById("cliente_id").value;
        var usuario_id = "<?=$usuario_id?>";
        var cliente_id = "<?=$RowHistoria["cliente_id"]?>";

        $.ajax({
            type: "POST",
            url: "<?= $Base ?>OdontologiaOdontograma/OD_Ajax_Bolivia.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Pieza Historia",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                historia_bo_id: "<?=$ID?>",
                diente_id: elemento
            },
            success: function(response) {

                console.log("CargarImagenPieza " + "<?=$ID?>" +" response => " , response);
                

                try {
                    let arr = JSON.parse(response);
                    if (arr.length > 0) {
                        document.getElementById("RecuadroSuperior_<?=$ID?>_" + elemento).innerHTML = arr[0];
                        document.getElementById("RecuadroIzquierdo_<?=$ID?>_" + elemento).innerHTML = arr[1];
                        document.getElementById("RecuadroInferior_<?=$ID?>_" + elemento).innerHTML = arr[2];
                        document.getElementById("RecuadroDerecha_<?=$ID?>_" + elemento).innerHTML = arr[3];
                        document.getElementById("RecuadroCentro_<?=$ID?>_" + elemento).innerHTML = arr[4];
        
                        document.getElementById("RecuadroSeparadoSuperior_<?=$ID?>_" + elemento).innerHTML = arr[5];
                        document.getElementById("RecuadroSeparadoInferior_<?=$ID?>_" + elemento).innerHTML = arr[6];
                        
                    }

                    //console.log(arr);
                    
                } catch (error) {
                    console.error( "Error  => " , error);
                }
                
            }
        });
    }

    function CargarImagenDiente(elemento) {
        // var usuario_id = document.getElementById("usuario_id").value;
        // var cliente_id = document.getElementById("cliente_id").value;
        var usuario_id = "<?=$usuario_id?>";
        var cliente_id = "<?=$RowHistoria["cliente_id"]?>";

        $.ajax({
            type: "POST",
            url: "<?= $Base ?>OdontologiaOdontograma/OD_Ajax_Bolivia.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Diente Historia",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                historia_bo_id: "<?=$ID?>",
                diente_id: elemento
            },
            success: function(response) {
                console.log(response);
                console.log("CargarImagenDiente " + "<?=$ID?>" +"response => " , response);

                var div = document.getElementById("ImagenDiente_<?=$ID?>_" + elemento);
                var svg = div.getElementsByTagName("svg")[0];
                //console.log(div);
                //console.log(svg);
                if (svg != undefined) {
                    //console.log("entrto");
                    div.removeChild(svg);
                }

                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_<?=$ID?>_" + elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_<?=$ID?>_" + elemento).title = respuesta[1];
                //document.getElementById("ImagenDiente_"+elemento).innerHTML += response;
                //console.log(response);
            }
        });
    }

    function VistaOdontograma(Valor) {
        switch (Valor) {
            case "Mixto":
                $(".G_1").css("display", "flex");
                $(".G_2").css("display", "flex");
                $(".G_3").css("display", "flex");
                $(".G_4").css("display", "flex");
                $(".G_5").css("display", "flex");
                $(".G_6").css("display", "flex");
                $(".G_7").css("display", "flex");
                $(".G_8").css("display", "flex");
                $(".G_9").css("display", "flex");
                $(".G_10").css("display", "flex");
                $(".G_11").css("display", "flex");
                $(".G_12").css("display", "flex");
                break;
            case "Permanente":
                $(".G_1").css("display", "flex");
                $(".G_2").css("display", "flex");
                $(".G_3").css("display", "flex");
                $(".G_4").css("display", "flex");
                $(".G_5").css("display", "none");
                $(".G_6").css("display", "none");
                $(".G_7").css("display", "none");
                $(".G_8").css("display", "none");
                $(".G_9").css("display", "flex");
                $(".G_10").css("display", "flex");
                $(".G_11").css("display", "flex");
                $(".G_12").css("display", "flex");
                break;
            case "Temporal":
                $(".G_1").css("display", "none");
                $(".G_2").css("display", "none");
                $(".G_3").css("display", "none");
                $(".G_4").css("display", "none");
                $(".G_5").css("display", "flex");
                $(".G_6").css("display", "flex");
                $(".G_7").css("display", "flex");
                $(".G_8").css("display", "flex");
                $(".G_9").css("display", "none");
                $(".G_10").css("display", "none");
                $(".G_11").css("display", "none");
                $(".G_12").css("display", "none");
                break;
        }
    }
</script>
<script>
    var ArregloIconos = JSON.parse(<?php echo json_encode($ArregloSVGTXT); ?>);

    function SelectIconos(Selecticon, parent) {
        // console.log("Selecticon" , Selecticon);
        // console.log("parent" , parent);
        

        for (var i = 0; i < Selecticon.length; i++) {
            var selectOptions = {
                templateResult: function(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var icono = ArregloIconos[option.id] || ''; // obtener el SVG correspondiente al identificador
                    var svg = icono.replaceAll('|', '"');
                    svg = svg.replaceAll('■', '\r\n');
                    svg = svg.replaceAll('°', '\n');
                    var $option = $('<span style="height: 100%;display: flex;"><i class="icon">' + svg + '</i> ' + option.text + '</span>');
                    return $option;
                },
                templateSelection: function(option) {
                    if (!option.id) {
                        return option.text;
                    }
                    var icono = ArregloIconos[option.id] || ''; // obtener el SVG correspondiente al identificador
                    var svg = icono.replaceAll('|', '"');
                    svg = svg.replaceAll('■', '\r\n');
                    svg = svg.replaceAll('°', '\n');
                    var $option = $('<span style="height: 100%;display: flex;"><i class="icon">' + svg + '</i> ' + option.text + '</span>');
                    return $option;
                },
                width: "100%"
            };

            if (parent) {
                selectOptions.dropdownParent = parent;
            }

            // $(Selecticon[i]).select2(selectOptions);

        }
    }
</script>
