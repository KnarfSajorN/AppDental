<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$cliente_id = $_GET['clienteId'];

$usuario_id = $_SESSION['ID'];
?>

<style type="text/css">
    .centro:hover {
        border: 1px solid rgba(117, 198, 243, 0.4);
        /*background-color: rgba(117, 198, 243, 0.4);*/
        cursor: pointer;
    }

    .derecha:hover {
        border: 1px solid rgba(117, 198, 243, 0.4);
        /*background-color: rgba(117, 198, 243, 0.4);*/
        cursor: pointer;
    }

    .debajo:hover {
        border: 1px solid rgba(117, 198, 243, 0.4);
        /*background-color: rgba(117, 198, 243, 0.4);*/
        cursor: pointer;
    }

    .izquierdo:hover {
        border: 1px solid rgba(117, 198, 243, 0.4);
        /*background-color: rgba(117, 198, 243, 0.4);*/
        cursor: pointer;
    }

    .arriba:hover {
        border: 1px solid rgba(117, 198, 243, 0.4);
        /*background-color: rgba(117, 198, 243, 0.4);*/
        cursor: pointer;
    }

    /* este estilo es para que cuando es menor a esa resolucion haga como si fuera col-6*/
    @media (max-width: 569px) {
        .col-perso {
            width: 50%;
        }
    }

    @media (max-width: 359px) {
        .col-perso {
            width: 100%;
        }
    }

    /* fin */



    /* este estilo va reemplazar a un col-md-2 ya que se usara ese espacio para aumentar el espacio de los recuadros */
    @media (max-width: 991px) {
        .col-xs-0 {
            display: none;
        }
    }

    /* fin */

    /* este estilo es para mover los recuadros y el diente al lado derecho para que no se monten */
    @media(max-width:991px) AND (min-width:425px) {
        .des_1 {
            left: 10px;
        }

        .des_2 {
            left: 20px;
        }

        .des_3 {
            left: 30px;
        }

        .des_4 {
            left: 40px;
        }

        .des_5 {
            left: 50px;
        }
    }


    @media(min-width:992px) {

        .G_2,
        .G_5,
        .G_7,
        .G_10 {
            border-right: 1px solid;
        }

        .G_5,
        .G_6 {
            border-bottom: 1px solid;
        }
    }


    /*//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////*/

    .cuadro {
        background-color: #FFFFFF;
        border: 1px solid #7F7F7F;
        position: relative;
        width: 35px;
        height: 35px;
    }

    .cuadro:hover {
        background: rgba(117, 198, 243, 0.4);
        cursor: pointer;
    }

    .arriba {
        -webkit-border-radius: 80px 80px 0px 15px;
        -moz-border-radius: 80px 80px 0px 15px;
        border-radius: 80px 80px 0px 15px;
    }

    .izquierdo {
        top: -1px !important;
        left: -33px !important;
        -webkit-border-radius: 80px 0px 0px 80px;
        -moz-border-radius: 80px 0px 0px 80px;
        border-radius: 80px 0px 0px 80px;
    }

    .debajo {
        top: -2px !important;
        -webkit-border-radius: 0px 0px 80px 80px;
        -moz-border-radius: 0px 0px 80px 80px;
        border-radius: 0px 0px 80px 80px;
    }

    .derecha {
        top: -71px !important;
        left: 34px !important;
        -webkit-border-radius: 0px 80px 80px 0px;
        -moz-border-radius: 0px 80px 80px 0px;
        border-radius: 0px 80px 80px 0px;
    }

    .centro {
        background: #F3F3F3;
        border: 1px solid #7F7F7F;
        top: -106px;
        width: 35px;
        height: 35px;
        position: relative;
    }

    /* este estilo es para que haga un zoom mas peque;o y no se monte los recuadros en esas resoluciones */


    @media(max-width:1895px) AND (min-width:1495px) {
        .recuadros {
            zoom: 0.75
        }
    }

    @media(max-width:1494px) AND (min-width:1200px) {
        .recuadros {
            zoom: 0.6;
        }
    }

    @media(max-width:1494px) AND (min-width:992px) {
        .recuadroperso {
            zoom: 0.66;
        }
    }

    .click_odontograma {
        text-align-last: center;
    }

    .diente_img>svg {
        position: absolute;
        width: 35px;
        top: 69px;
        left: 21px;
    }

    .diente_img1>svg {
        position: absolute;
        width: 35px;
        top: 81px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img2>svg {
        position: absolute;
        width: 35px;
        top: 79px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img3>svg {
        position: absolute;
        width: 35px;
        top: 52px;
        left: 20px;
    }

    .rotate_icon>svg {
        transform: rotate(180deg);
    }
</style>

<style>
    .checkbox-wrapper-31:hover .check {
        stroke-dashoffset: 0;
    }

    .checkbox-wrapper-31 {
        /*position: relative;
    display: inline-block;
    width: 40px;
    height: 40px;*/
    }

    .checkbox-wrapper-31 .background {
        fill: #ccc;
        transition: ease all 0.6s;
        -webkit-transition: ease all 0.6s;
    }

    .checkbox-wrapper-31 .stroke {
        fill: none;
        stroke: #fff;
        stroke-miterlimit: 10;
        stroke-width: 2px;
        stroke-dashoffset: 100;
        stroke-dasharray: 100;
        transition: ease all 0.6s;
        -webkit-transition: ease all 0.6s;
    }

    .checkbox-wrapper-31 .check {
        fill: none;
        stroke: #fff;
        stroke-linecap: round;
        stroke-linejoin: round;
        stroke-width: 2px;
        stroke-dashoffset: 22;
        stroke-dasharray: 22;
        transition: ease all 0.6s;
        -webkit-transition: ease all 0.6s;
    }

    .checkbox-wrapper-31 input[type=checkbox] {
        position: absolute;
        width: 100%;
        height: 100%;
        left: 0;
        top: 0;
        margin: 0;
        opacity: 0;
        -appearance: none;
        -webkit-appearance: none;
    }

    .checkbox-wrapper-31 input[type=checkbox]:hover {
        cursor: pointer;
    }

    .checkbox-wrapper-31 input[type=checkbox]:checked+svg .background {
        fill: #6cbe45;
    }

    .checkbox-wrapper-31 input[type=checkbox]:checked+svg .stroke {
        stroke-dashoffset: 0;
    }

    .checkbox-wrapper-31 input[type=checkbox]:checked+svg .check {
        stroke-dashoffset: 0;
    }
</style>


<style>
    .check_seleccionMultiple {
        width: 60px;
        height: 60px;
        position: absolute;
        top: 0;
        left: 125px;
        margin: auto;
        zoom: 0.4;

        display: none;
    }

    .check_seleccionMultiple input {
        display: none;
    }

    .check_seleccionMultiple input:checked+.box {
        background-color: #b3ffb7;
    }

    .check_seleccionMultiple input:checked+.box:after {
        top: 0;
    }

    .check_seleccionMultiple .box {
        width: 100%;
        height: 100%;
        transition: all 1.1s cubic-bezier(.19, 1, .22, 1);
        border: 2px solid black;
        background-color: white;
        position: relative;
        overflow: hidden;
        cursor: pointer;
        box-shadow: 5px 5px 5px 5px rgba(0, 0, 0, 0.2);
    }

    .check_seleccionMultiple .box:after {
        width: 65%;
        height: 30%;
        content: '';
        position: absolute;
        border-left: 7.5px solid;
        border-bottom: 7.5px solid;
        border-color: #40c540;
        transform: rotate(-45deg) translate3d(0, 0, 0);
        transform-origin: center center;
        transition: all 1.1s cubic-bezier(.19, 1, .22, 1);
        left: 0;
        right: 0;
        top: 200%;
        bottom: 5%;
        margin: auto;
    }
</style>

















<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Odontograma Inicial</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">



            <div class="content">
                <div class="col-md-12" style="height: 280px;">
                    <?php include 'Modulos_Estilos/DatosPersonales.php';
                    echo Datos_Personales($cliente_id);
                    ?>
                </div>
                <h4 class="Titulo_Pagina">Odontograma</h4>
                <div class="box">
                    <div class="box-body">
                        <div class='col-md-12 row'>
                            <div class="col-md-12">
                                <label for="TipoOdontograma">Tipo</label>
                                <select id="TipoOdontograma" class="select2 form-control input-lg" style="width: 100%;"
                                    onchange="VistaOdontograma(this.value)">
                                    <option value="Mixto" selected>Mixto</option>
                                    <option value="Permanente">Permanente</option>
                                    <option value="Temporal">Temporal</option>
                                </select>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <button class="btn btn-block btn-outline-info  rounded-pill shadow"
                                        style="margin-top:5px;margin-bottom:5px;" id="BotonSeleccion_Activar"
                                        onclick='ActivarSeleccionMultiple();'> <i class="fa-solid fa-check"></i> Activar
                                        Selección Multiple </button>
                                    <button class="btn btn-block btn-outline-danger  rounded-pill shadow"
                                        style="margin-top:5px;margin-bottom:5px;display:none;"
                                        id="BotonSeleccion_Desactivar" onclick='DesactivarSeleccionMultiple();'> <i
                                            class="fa-solid fa-close"></i> Desactivar Selección Multiple </button>
                                            
                                    <button class="btn btn-block btn-outline-success  rounded-pill shadow"
                                        style="margin-top:5px;margin-bottom:5px;display:none;"
                                        id="BotonSeleccion_Procesar" onclick='ProcesarSeleccionMultiple();'> <i
                                            class="fa fa-circle-o-notch fa-spin"></i> Procesar Selección Multiple
                                    </button>

                                    <button class="btn btn-block btn-outline-success  rounded-pill shadow" style="margin-top:5px;margin-bottom:5px;display:none;" id="BotonSeleccionar_Todas" onclick='SeleccionarTodas();'> <i class="fa-solid fa-check"></i> Seleccionar Todas </button>
                                </div>
                                <br>
                                <hr>
                            </div>
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

                                    //Esto funcion para el editar procedimientos//
                                    $ArregloDatosCadaDiente[$value]["RecuadroSuperior"] = str_replace(array("data-diente='", "'"), "", $DataArriba);
                                    $ArregloDatosCadaDiente[$value]["RecuadroIzquierdo"] = str_replace(array("data-diente='", "'"), "", $DataIzquierda);
                                    $ArregloDatosCadaDiente[$value]["RecuadroInferior"] = str_replace(array("data-diente='", "'"), "", $DataAbajo);
                                    $ArregloDatosCadaDiente[$value]["RecuadroDerecha"] = str_replace(array("data-diente='", "'"), "", $DataDerecha);
                                    $ArregloDatosCadaDiente[$value]["RecuadroCentro"] = str_replace(array("data-diente='", "'"), "", $DataCentro);

                                    $ArregloDatosCadaDiente[$value]["RecuadroSeparadoSuperior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoSuperior);
                                    $ArregloDatosCadaDiente[$value]["RecuadroSeparadoInferior"] = str_replace(array("data-diente='", "'"), "", $DataSeparadoInferior);

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> 

                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        
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
                                        echo "<div class='col-md-2 col-xs-0'><br></div>";
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

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img1 rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        
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
                                        echo "<div class='col-md-2 col-xs-0'><br></div>";
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

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img2 diente_img_general' id='ImagenDiente_{$value}' > <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        
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

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> 
                                    
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>    
                                    
                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img3 diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        
                                    </div>";

                                    if ($contador == "4") {
                                        echo "</div>";
                                        $contador = 0;
                                    }
                                }
                            }
                            ?>
                        </div>


                        <div style="display: inline-table;width:100%">
                            <hr>
                            <a href="OD_Impresion?clienteId=<?= $cliente_id; ?>&usuarioId=<?= $_SESSION['ID']; ?>"
                                target="_blank">
                                <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                    <h4> <strong> <i class="fa-solid fa-teeth    "></i> Imprimir Odontograma </strong>
                                    </h4>
                                </button>
                            </a>
                            <hr>
                            <a href="OD_Odontograma?clienteId=<?= $cliente_id; ?>">
                                <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                    <h4> <strong> <i class="fa-solid fa-teeth"></i> Ingresar a Odontograma </strong>
                                    </h4>
                                </button>
                            </a>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<div class="modal fade" id="modalPieza" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Estado de la pieza</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="#" method="POST" name="formularioEnvioExamen"
                    onsubmit="event.preventDefault();GuardarPiezaInicial();">
                    <div class="row" style="">
                        <div class="col-md-6" style="height:80px;">
                            <label id="Tipo_Diente_Cara"
                                style="top: 36%;left: 33%;position: relative;"><!-- se llena en la funcion --> </label>
                        </div>
                        <div class="col-md-6" style="height:80px;" id="Imagen_Diente">

                        </div>
                        <hr>
                        <div class="col-md-12" id="DatosOdontogramaModal">
                            <h3 id="MensajeEdicionModal" style="text-align: center;font-weight: bold;"></h3>
                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Procedimiento / [Servicio/Inventario]</label>
                                <select id="Diente_Procedimiento" class="select2 form-control input-lg icons_select2"
                                    style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
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


                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";

                                        //Esto funcion para el editar procedimientos//
                                        $ArregloSwal = $ArregloSwal . "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
                                    }

                                    $ArregloSVGTXT = json_encode($ArregloSVG);
                                    ?>
                                </select>
                            </div>

                            <div class="row col-md-12" id="check_caras">


                            </div>

                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle" />




                            <!--
                            <div class="" style="margin-top: 40px;">
                                <label>Adjuntar Tratamiento Para Presupuestar?</label>
                                <select id="inventario_id" class="form-control select2" style="width: 100%;">
                                    <option value='0'>Seleccione</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sinvetrios ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                        $tipo = $rowMotorizado["tipo"];
                                        $OdontogramaAplica = funcionMaster($tipo, 'id', 'GrupoOdontograma', 'scategoria');

                                        if ($OdontogramaAplica == "1") {
                                            $NombreTipo = funcionMaster($tipo, 'id', 'descripcion', 'scategoria');
                                            echo "<option value='$rowMotorizado[ID]'> [$NombreTipo] - $rowMotorizado[descripcion] </option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                                -->

                            <div class="" style="margin-top: 10px;">
                                <label>CIE11</label>
                                <select id="cie_10" class="form-control select2" style="width: 100%;">
                                    <option value='0'>Sin Codigo</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Cie10 ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        echo "<option value='$rowMotorizado[Codigo]'> $rowMotorizado[Codigo] - $rowMotorizado[Nombre] </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <hr>


                            <input type="hidden" id="cliente_id" value="<?= $_GET['clienteId']; ?>">
                            <input type="hidden" id="usuario_id" value="<?= $_SESSION['ID']; ?>">
                            <input type="hidden" id="diente_id">
                            <!--<input type="hidden" id="Diente_Posicion">
                            <input type="hidden" id="Diente_NombreCara">
                            <input type="hidden" id="Diente_TodaPieza">-->

                            <br>


                            <button type="submit" class="btn btn-primary" style="width:100%;float: right;"
                                id="Boton_Enviar">Guardar</button>
                            <br>
                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>

                        <h2 style="text-align: center;font-weight: bold;"> Historial </h2>
                        <div class="col-md-12" id="Historial_Diente" style="height:300px;overflow-y: auto;">

                        </div>
                        <div class="col-md-12">
                            <hr>
                        </div>
                        <button type="button" class="btn btn-default" style="width:100%;"
                            data-dismiss="modal">Cerrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>






<div class="modal fade bd-example-modal-lg" id="ModalSeleccionAll" role="dialog" aria-labelledby="ModalSeleccionAll"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Seleccion Multiple de Piezas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="">
                        <form action="#" method="POST" name="formularioEnvioExamen"
                            onsubmit="event.preventDefault();GuardarPiezaMultiple();">
                            <div class="col-md-12" align="center">
                                <label style="font-size:20px;color:#3c8dbc;">Seleccion Multiple de Piezas</label>
                            </div>

                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Procedimiento / [Servicio/Inventario]</label>
                                <select id="Diente_Procedimiento_Multiple"
                                    class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Procedimiento where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and Activo = 1");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        //inventario id
                                        $inventario_id = $rowMotorizado['inventario_id'];
                                        $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
                                        if ($Nombre_Inventario != "") {
                                            $Nombre_Inventario = " / [ " . $Nombre_Inventario . " ]";
                                        }
                                        //inventario id

                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle_Multiple" />
                            <br>


                            <div class="" style="margin-top: 10px;">
                                <label>CIE10</label>
                                <select id="cie_10_Multiple" class="form-control select2" style="width: 100%;">
                                    <option value='0'>Sin Codigo</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Cie10 ");
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        echo "<option value='$rowMotorizado[Codigo]'> $rowMotorizado[Codigo] - $rowMotorizado[Nombre] </option>";

                                        $ArregloSwalCIE10 = $ArregloSwalCIE10 . "<option value='$rowMotorizado[Codigo]'> $rowMotorizado[Codigo] - $rowMotorizado[Nombre] </option>";
                                    }
                                    ?>
                                </select>
                            </div>

                            <hr>
                            <input type="hidden" id="diente_multiple">
                            <input type="hidden" id="cliente_id_multiple" value="<?= $_GET['clienteId']; ?>">
                            <input type="hidden" id="usuario_id_multiple" value="<?= $_SESSION['ID']; ?>">

                            <button type="button" class="btn btn-default" style="width:50%;"
                                data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" style="width:50%;float: right;"
                                id="Boton_Enviar">Guardar</button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<!-- //////////////////////////////////////////////////? Enviar Firma por Whatsapp y Correo ///////////////////////////////////////////////// -->
<?php
$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $Paciente_Nombre = $rowMotorizado['nombre_cliente'];
    $Paciente_Correo = $rowMotorizado['correo_cliente'];
    $Paciente_Whatsapp = $rowMotorizado['whatsapp'];
}
?>
<!-- //////////////////////////////////////////////////? [FIN] Enviar Firma por Whatsapp y Correo ///////////////////////////////////////////////// -->

<?php
include 'footer.php';
?>

<script>
    let ArregloSVG = JSON.parse('<?= $ArregloSVGTXT; ?>');
    document.getElementsByTagName("body")[0].classList.add("sidebar-collapse");

    function ModalPiezaOdontograma(diente_id, posicion, NombreCara, Toda_Pieza) {

        $('#modalPieza').modal('show');
        document.getElementById("diente_id").value = diente_id;
        /*
        //se quitan estos datos
        document.getElementById("Diente_Posicion").value = posicion;
        document.getElementById("Diente_NombreCara").value = NombreCara;
        if(Toda_Pieza==undefined){
            document.getElementById("Diente_TodaPieza").value = "";
        }else{
            document.getElementById("Diente_TodaPieza").value = Toda_Pieza;
        }
        */

        document.getElementById("Tipo_Diente_Cara").innerText = NombreCara;
        document.getElementById("Imagen_Diente").innerHTML = "<label>" + diente_id + "</label><img src='OD_ImagenOdontograma/" + diente_id + ".png'>";


        var SVG = "<svg width='40' viewBox='0 0 35.6 35.6'><circle class='background' cx='17.8' cy='17.8' r='17.8'></circle><circle class='stroke' cx='17.8' cy='17.8' r='14.37'></circle><polyline class='check' points='11.78 18.12 15.55 22.23 25.17 12.87'></polyline></svg>";

        var ArregloChecks = new Array();
        ArregloChecks["Vestibular"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Vestibular'  onclick='CheckUnico()' > " + SVG + "  <br> Vestibular</div>"; // Todos los dientes

        ArregloChecks["Palatino"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Palatino'  onclick='CheckUnico()' > " + SVG + "  <br> Palatino</div>"; //Solo los diente superiores
        ArregloChecks["Lingual"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Lingual'  onclick='CheckUnico()' > " + SVG + " <br> Lingual</div>"; // solo los dientes inferiores

        ArregloChecks["Mesial"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Mesial'  onclick='CheckUnico()' > " + SVG + "   <br> Mesial</div>"; // Todos los dientes
        ArregloChecks["Distal"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Distal'  onclick='CheckUnico()' > " + SVG + "  <br> Distal</div>"; // Todos los dientes

        ArregloChecks["Oclusal"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Oclusal'  onclick='CheckUnico()' > " + SVG + "   <br> Oclusal</div>"; // Algunos Dientes
        ArregloChecks["Borde Incisal"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Borde Incisal'  onclick='CheckUnico()' > " + SVG + "   <br> Borde Incisal</div>"; // Algunos Dientes

        ArregloChecks["Cuello Vestibular"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Cuello Vestibular'  onclick='CheckUnico()' > " + SVG + "   <br> Cuello Vestibular</div>"; // Todos los dientes
        ArregloChecks["Cuello Palatino"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Cuello Palatino'  onclick='CheckUnico()' > " + SVG + "   <br> Cuello Palatino</div>"; // Algunos Dientes
        ArregloChecks["Cuello Lingual"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]' |@| class='checks_modal modal_valor' value='Cuello Lingual'  onclick='CheckUnico()' > " + SVG + "   <br> Cuello Lingual</div>"; // Algunos Dientes

        let PosicionArreglo = {};
        PosicionArreglo["Cuello Vestibular"] = "0";
        PosicionArreglo["Vestibular"] = "1";
        PosicionArreglo["Cuello Palatino"] = "2";
        PosicionArreglo["Palatino"] = "3";
        PosicionArreglo["Cuello Lingual"] = "4";
        PosicionArreglo["Lingual"] = "5";
        PosicionArreglo["Mesial"] = "6";
        PosicionArreglo["Distal"] = "7";
        PosicionArreglo["Oclusal"] = "8";
        PosicionArreglo["Borde Incisal"] = "9";

        let ArregloPosicionCarasDientes = JSON.parse('<?= json_encode($ArregloDatosCadaDiente); ?>');
        let ArregloDienteCaras = {};

        for (var key in ArregloPosicionCarasDientes) {
            if (ArregloPosicionCarasDientes.hasOwnProperty(key)) {
                var diente = ArregloPosicionCarasDientes[key];
                //console.log('Diente #' + key + ':');
                if (key == diente_id) {
                    for (var propiedad in diente) {
                        if (diente.hasOwnProperty(propiedad)) {
                            //console.log(propiedad + ': ' + diente[propiedad]);
                            var InputCheck = ArregloChecks[diente[propiedad]].replace('|@|', "data-cara='" + propiedad + "'");
                            ArregloDienteCaras[PosicionArreglo[diente[propiedad]]] = InputCheck;
                        }
                    }
                }

            }
        }

        //console.log(ArregloDienteCaras);
        var Div = "";
        for (var key in ArregloDienteCaras) {
            if (ArregloDienteCaras.hasOwnProperty(key)) {
                Div += ArregloDienteCaras[key];
            }
        }
        Div += "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' id='check_all' name='Arreglo[Icono]' value='Toda la Pieza' onchange='CheckAll(this)' class='modal_valor' data-cara='Toda la Pieza' > " + SVG + " <br> Toda la pieza </div>";
        $("#check_caras").html(Div);


    }


    function CheckUnico() {
        $("#check_all").prop('checked', false);
        var Contador = 0;
        $('.checks_modal').each(function (index) {
            var valor = $(this).is(':checked');
            if ($(this).is(':checked') == true) {
                Contador++;
            }
            if (Contador == 7) {
                $("#check_all").prop('checked', true);
            }
        });
    }


    function CheckAll(valor) {
        if (valor.checked) {
            $(".checks_modal").prop('checked', true);
        } else {
            $(".checks_modal").prop('checked', false);
        }
    }

    function HistorialDiente(diente_id) {

        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Historial Diente",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: diente_id
            },
            success: function (response) {
                document.getElementById("Historial_Diente").innerHTML = response;
                //console.log(response);
            }
        });

    }

    async function GuardarPiezaInicial() {
        var checks = document.getElementsByClassName("modal_valor");
        var contador = 0;
        var TodaLaPieza = "";

        for (var g of checks) {
            if (g.checked == true && g.value === "Toda la Pieza") {
                TodaLaPieza = "Si"; // Actualizamos el valor de TodaLaPieza si se encuentra "Toda la Pieza"
                var Nombre_Cara = g.getAttribute("data-cara");
                var res = await GuardarPiezaModificado(g.value, Nombre_Cara);
                contador++;
            }
        }
        if (TodaLaPieza == "") {
            for (var g of checks) {
                if (g.checked == true) {

                    var Nombre_Cara = $(g).attr('data-cara');
                    console.log(Nombre_Cara);
                    //console.log("2 segundos");
                    var res = await GuardarPiezaModificado(g.value, Nombre_Cara);
                    //console.log(res);
                    contador++;
                }
            }
        }
        if (contador == 0) {
            alert("Seleccione Alguna opcion de las caras del diente");
        }
        $('#modalPieza').modal('toggle');
    }


    function GuardarPiezaModificado(NombreCara, Posicion) {
        return new Promise((resolve, reject) => {
            var Nombre_Cara = $(this).attr('data-diente');
            var Diente_Procedimiento = document.getElementById("Diente_Procedimiento").value;
            var Diente_Detalle = document.getElementById("Diente_Detalle").value;
            var diente_id = document.getElementById("diente_id").value;

            var TodaPieza = "";
            if (Posicion == "Toda la Pieza") {
                TodaPieza = diente_id;
            }
            var Diente_Posicion = Posicion;
            var Diente_NombreCara = NombreCara;
            var Diente_TodaPieza = TodaPieza;

            var usuario_id = document.getElementById("usuario_id").value;
            var cliente_id = document.getElementById("cliente_id").value;

            //var Presupuesto_Tratamiento = document.getElementById("Presupuesto_Tratamiento").value;

            //var inventario_id = document.getElementById("inventario_id").value;
            var cie_10 = document.getElementById("cie_10").value;

            $.ajax({
                type: "POST",
                url: "OD_Ajax.php",
                data: {
                    Tipo_Consulta: "Agregar Dato Odontograma Inicial",
                    Diente_Procedimiento: Diente_Procedimiento,
                    Diente_Detalle: Diente_Detalle,
                    diente_id: diente_id,
                    Diente_Posicion: Diente_Posicion,
                    Diente_NombreCara: Diente_NombreCara,
                    Diente_TodaPieza: Diente_TodaPieza,
                    //Presupuesto_Tratamiento:Presupuesto_Tratamiento,
                    //inventario_id:inventario_id,
                    cie_10: cie_10,
                    cliente_id: cliente_id,
                    usuario_id: usuario_id
                },
                success: function (response) {
                    CargarImagenDiente(document.getElementById("diente_id").value);
                    resolve(response);
                }
            });

        })
    }


    function CargarImagenDiente(elemento) {
        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Diente",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: elemento
            },
            success: function (response) {

                var div = document.getElementById("ImagenDiente_" + elemento);
                var svg = div.getElementsByTagName("svg")[0];
                if (svg != undefined) {
                    div.removeChild(svg);
                }
                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_" + elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_" + elemento).title = respuesta[1];
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
        for (var i = 0; i < Selecticon.length; i++) {
            var selectOptions = {
                templateResult: function (option) {
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
                templateSelection: function (option) {
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

            $(Selecticon[i]).select2(selectOptions);

        }
    }
</script>
<script>
    $(document).ready(function () {

        var selectores = ['#Diente_Procedimiento', '#Presupuesto_Tratamiento', '#Diente_Procedimiento_Multiple', '#Presupuesto_Tratamiento_Multiple', '#tratamiento_edicion'];
        SelectIconos(selectores);

        $(".click_odontograma").click(function (event) {
            //console.log($(this).attr('id'));
            var arreglo_id = $(this).attr('id').split("_");
            var diente_id = arreglo_id[1];
            var Posicion = arreglo_id[0];
            var Nombre_Cara = $(this).attr('data-diente');

            HistorialDiente(diente_id);
            ModalPiezaOdontograma(diente_id, Posicion, Nombre_Cara);
        });

        let Numero_Diente_Arreglo = ["18",
            "17",
            "16",
            "15",
            "14",
            "13",
            "12",
            "11",
            "21",
            "22",
            "23",
            "24",
            "25",
            "26",
            "27",
            "28",
            "55",
            "54",
            "53",
            "52",
            "51",
            "61",
            "62",
            "63",
            "64",
            "65",
            "48",
            "47",
            "46",
            "45",
            "44",
            "43",
            "42",
            "41",
            "31",
            "32",
            "33",
            "34",
            "35",
            "36",
            "37",
            "38",
            "85",
            "84",
            "83",
            "82",
            "81",
            "71",
            "72",
            "73",
            "74",
            "75"
        ];

        Numero_Diente_Arreglo.forEach(function (elemento, indice, array) {
            //CargarImagenPieza(elemento);
            CargarImagenDiente(elemento);
        })

        $(".diente_img_general").click(function (event) {
            //console.log($(this).attr('id'));
            var arreglo_id = $(this).attr('id').split("_");
            var diente_id = arreglo_id[1];
            var Posicion = "Toda la Pieza";
            var Nombre_Cara = "Toda la Pieza";
            var Toda_Pieza = diente_id;

            HistorialDiente(diente_id);
            ModalPiezaOdontograma(diente_id, Posicion, Nombre_Cara, Toda_Pieza);
        });


    });
</script>

<script>
    function ActivarSeleccionMultiple() {
        document.getElementById("BotonSeleccion_Desactivar").style.display = "block";
        document.getElementById("BotonSeleccion_Procesar").style.display = "block";
        document.getElementById("BotonSeleccionar_Todas").style.display = "block";
        document.getElementById("BotonSeleccion_Activar").style.display = "none";

        //.check_seleccionMultiple
        $(".check_seleccionMultiple").css("display", "block");
    }

    function DesactivarSeleccionMultiple() {

document.getElementById("BotonSeleccion_Desactivar").style.display = "none";
document.getElementById("BotonSeleccion_Procesar").style.display = "none";
document.getElementById("BotonSeleccionar_Todas").style.display = "none";
document.getElementById("BotonSeleccion_Activar").style.display = "block";

$(".check_seleccionMultiple").css("display", "none");
$(".class_checkselectall").prop('checked', false);
}

    function ProcesarSeleccionMultiple() {
        var Arreglo = []
        $('.class_checkselectall').each(function (index) {
            var valor = $(this).is(':checked');
            if ($(this).is(':checked') == true) {
                var arreglo_id = $(this).attr('id').split("_");
                Arreglo.push(arreglo_id[1]);
            }
        });
        //console.log(Arreglo);
        $("#diente_multiple").val(JSON.stringify(Arreglo));
        $('#ModalSeleccionAll').modal('toggle');
    }

    function SeleccionarTodas() {
       var elementosConClaseTodas = document.querySelectorAll('.class_checkselectall');

            elementosConClaseTodas.forEach(elemento => {
                if (elemento.type === 'checkbox' && !elemento.checked) {
                    elemento.checked = true;
                }
                else if (elemento.type === 'checkbox') {
                    elemento.checked = false;
                }
            });
    }

    function GuardarPiezaMultiple() {

        var Diente_Procedimiento = document.getElementById("Diente_Procedimiento_Multiple").value;
        var Diente_Detalle = document.getElementById("Diente_Detalle_Multiple").value;

        var usuario_id = document.getElementById("usuario_id_multiple").value;
        var cliente_id = document.getElementById("cliente_id_multiple").value;

        var diente_multiple = document.getElementById("diente_multiple").value;

        //var Presupuesto_Tratamiento = document.getElementById("Presupuesto_Tratamiento_Multiple").value;
        //var inventario_id = document.getElementById("inventario_id_Multiple").value;
        var cie_10 = document.getElementById("cie_10_Multiple").value;

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Agregar Dato Multiple Odontograma",
                Diente_Procedimiento: Diente_Procedimiento,
                Diente_Detalle: Diente_Detalle,
                diente_multiple: diente_multiple,
                //Presupuesto_Tratamiento:Presupuesto_Tratamiento,
                //inventario_id:inventario_id,
                cie_10: cie_10,
                cliente_id: cliente_id,
                usuario_id: usuario_id
            },
            success: function (response) {
                window.location.reload();
            }
        });

    }
</script>
<script>
    function EliminarDetalleOdontograma_Diente(DetalleOdontograma_id) {

        Swal.fire({
            title: 'Esta seguro que desea eliminar el procedimiento realizado?',
            showDenyButton: false,
            showCancelButton: true,
            confirmButtonText: 'Eliminar',
            //denyButtonText: `No Eliminar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "OD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Eliminar Detalle Odontograma",
                        DetalleOdontograma_id: DetalleOdontograma_id,

                    }
                }).done(function (response) {
                    if (response != "") {
                        Swal.fire(
                            'Eliminado!',
                        )
                        //console.log(response);
                        var diente_modal = $("#diente_id").val();
                        HistorialDiente(diente_modal);
                        CargarImagenDiente(diente_modal);
                    } else {
                        Swal.fire(
                            'Error!',
                        )
                    }

                });

            }
        })

    }
</script>

<!-- //////////////////////////////////////////////////? Funciones/Estilos Para Editar Procedimiento ///////////////////////////////////////////////// -->

<script>
    function EditarDetalleOdontograma_Diente(DetalleOdontograma_id, lugar) {

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Buscar Informacion Detalle Odontograma",
                DetalleOdontograma_id: DetalleOdontograma_id,

            }
        }).done(function (response) {
            var arreglo = JSON.parse(response);
            // aqui cambia debido a que en este odontograma no hay piezas visibles y se actualiza la funcion para comentar la funcion para cargar la piezasado
            ModalSwalEdicion_Inicial(arreglo, lugar);
        });

    }

    function PosicionCara(input) {
        /*
        var checkboxes = $('input.checks_modal:checkbox[value="' + input.value + '"]');
        // Recorre todos los checkboxes encontrados
        checkboxes.each(function() {
        // Obtiene el valor del atributo "data-cara" del checkbox actual
        var valorCara = $(this).data('cara');
        console.log('El checkbox con valor "' + input.value + '" tiene el atributo "data-cara" con valor "' + valorCara + '".');
        });
        */
        if (input.value != "Toda la Pieza") {
            var CarasDientes = JSON.parse('<?= json_encode($ArregloDatosCadaDiente); ?>');
            Object.entries(CarasDientes[$("#numero_diente_edicion").val()]).forEach(([key, value]) => {
                //console.log(key, value);
                if (input.value == value) {
                    $("#posicion_edicion").val(key)
                }
            });
        } else {
            $("#posicion_edicion").val("Toda la Pieza")
        }


    }
    var optionFormat1 = function (item) {
        if (!item.id) {
            return item.text;
        }

        var span = document.createElement('span');
        var icon_id = item.element.getAttribute('data-icon');

        var svg = ArregloSVG[icon_id];
        svg = svg.replaceAll('|', '"');
        svg = svg.replaceAll('■', '\r\n');
        svg = svg.replaceAll('°', '\n');
        var template = '';

        template += svg;
        template += "<label style='position: relative;top: 2px;left: 3px;margin-left: 3px;'>" + item.text + "<label>";

        span.innerHTML = template;

        return $(span);
    }

    function ModalSwalEdicion_Inicial(response, lugar) {
        var ArregloSwal = "<?= $ArregloSwal; ?>";
        var ArregloSwalTratamiento = "<?= $ArregloSwalTratamiento; ?>";
        var ArregloSwalCIE10 = "<?= $ArregloSwalCIE10; ?>";

        var checkboxes = $('input.checks_modal:checkbox');

        var CarasDientes = JSON.parse('<?= json_encode($ArregloDatosCadaDiente); ?>');
        var NumeroDiente = response.NumeroDiente;
        let Cara = [];
        Cara.push('Toda la Pieza');
        Object.values(CarasDientes[NumeroDiente]).forEach(valor => {
            Cara.push(valor);
        });
        //var Cara = ["Toda la Pieza", "Vestibular","Distal","Palatino","Mesial","Oclusal"];

        var Resultado_Procedimiento = response.Procedimiento;
        var Resultado_Cara = response.NombreCara;
        var Resultado_Detalle = response.Detalle;
        var id_detalle = response.id_detalle;
        var Posicion = response.Posicion;

        //var inventario_id = response.inventario_id;
        var cie_10 = response.cie_10;
        Swal.fire({
            title: 'Edicion de Procedimiento',
            html: '<label for="estado_edicion">Motivo Consulta:</label><br>' +
                '<select id="estado_edicion" class="swal2-select icons_select2_1 select2" >' +
                ArregloSwal +
                '</select>' +
                '<br><br>' +
                '<label for="cara_edicion">Cara:</label><br>' +
                '<select id="cara_edicion"  class="swal2-select select2_1" style="width: 82%;" onchange="PosicionCara(this)"><option value="">Seleccione</option>' +
                Cara.map(e => '<option value="' + e + '">' + e + '</option>').join('') +
                '</select>' +
                '<br><br>' +
                '<label for="detalle_edicion">Detalle:</label><br>' +
                '<input id="detalle_edicion"  type="text" class="form-control" placeholder="Escribe aquí el detalle" style="width:100%;">' +
                '<br><br>' +
                //'<label for="tratamiento_edicion">Adjuntar Tratamiento Para Presupuestar?</label><br>' +
                //'<select id="tratamiento_edicion" class="swal2-select select2 select2_1" ><option value="0">Ninguno</option>' +
                //ArregloSwalTratamiento +
                //'</select>' +
                //'<br><br>' +
                '<label for="CIE10_edicion">CIE10</label><br>' +
                '<select id="CIE10_edicion" class="swal2-select select2 select2_1" ><option value="0">Ninguno</option>' +
                ArregloSwalCIE10 +
                '</select>' +
                '<br><br>' +
                '<input id="posicion_edicion" type="hidden">' +
                '<input id="numero_diente_edicion" type="hidden">' +
                '<input id="id_detalle" type="hidden">',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Descartar',
            focusConfirm: false,
            customClass: {
                popup: 'Swal_Editar_Odontograma'
            },
            preConfirm: () => {
                const estado = Swal.getPopup().querySelector('#estado_edicion').value;
                const cara = Swal.getPopup().querySelector('#cara_edicion').value;
                const detalle = Swal.getPopup().querySelector('#detalle_edicion').value;
                const id_detalle = Swal.getPopup().querySelector('#id_detalle').value;

                const posicion_edicion = Swal.getPopup().querySelector('#posicion_edicion').value;
                const numero_diente_edicion = Swal.getPopup().querySelector('#numero_diente_edicion').value;
                //const tratamiento_edicion = Swal.getPopup().querySelector('#tratamiento_edicion').value;
                const CIE10_edicion = Swal.getPopup().querySelector('#CIE10_edicion').value;

                if (!estado || !cara) {
                    Swal.showValidationMessage(`Completa todos los campos`);
                }
                return {
                    estado: estado,
                    cara: cara,
                    detalle: detalle,
                    id_detalle: id_detalle,
                    posicion_edicion: posicion_edicion,
                    numero_diente_edicion: numero_diente_edicion,
                    //tratamiento_edicion: tratamiento_edicion,
                    CIE10_edicion: CIE10_edicion
                }
            },
            didOpen: () => {
                var Arreglo = ["#tratamiento_edicion"]
                SelectIconos(Arreglo, $('.swal2-container'));

                $('.icons_select2_1').select2({
                    width: "100%",
                    templateSelection: optionFormat1,
                    templateResult: optionFormat1,
                    dropdownParent: $('.swal2-container')
                });

                $('.select2_1').select2({
                    width: "100%",
                    dropdownParent: $('.swal2-container')
                });
                //Procedimiento_Tratamiento_id
                $("#estado_edicion").val(Resultado_Procedimiento).trigger('change');
                $("#detalle_edicion").val(Resultado_Detalle);
                //$("#tratamiento_edicion").val(inventario_id).trigger('change');
                $("#CIE10_edicion").val(cie_10).trigger('change');

                $("#id_detalle").val(id_detalle);
                $("#numero_diente_edicion").val(NumeroDiente);
                $("#posicion_edicion").val(Posicion);
                $("#cara_edicion").val(Resultado_Cara).trigger('change');
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "OD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Guardar Edicion Informacion Detalle Odontograma",
                        Resultados: result.value,
                    }
                }).done(function (response) {
                    var responsen = JSON.parse(response);
                    if (response != "") {
                        Swal.fire(
                            responsen.Estado,
                        )
                    } else {
                        Swal.fire(
                            'Error!',
                        )
                    }

                    HistorialDiente(responsen.NumeroDiente);
                    CargarImagenDiente(responsen.NumeroDiente);
                    //CargarImagenPieza(responsen.NumeroDiente);

                    //significa que la edicion se realizo desde modal de historial de odontograma
                    if (lugar == "1") {
                        CargarHistorial(); // esta funcion esta en OD_ModalHistorial.php
                    }
                });

            }
        })


    }


</script>
<style>
    .Swal_Editar_Odontograma {
        height: 55em;
        width: 55em;
        font-size: 0.85em !important;
    }
</style>

<!-- //////////////////////////////////////////////////? [FIN] Funciones/Estilos Para Editar Procedimiento ///////////////////////////////////////////////// -->


<!-- //////////////////////////////////////////////////? Enviar Firma por Whatsapp y Correo ///////////////////////////////////////////////// -->
<style>
    .Swal_Enviar_Firma {
        height: 45em;
        width: 45em;
        font-size: 0.85em !important;
    }
</style>

<script>

    function EnviarAFirmarCliente(detalle_id) {

        Swal.fire({
            title: 'Enviar Detalle a Firmar - <?= $Paciente_Nombre; ?>',
            html: '<label for="whatsapp_enviar">Whatsapp:</label><br>' +
                '<input id="whatsapp_enviar"  type="number" class="form-control" placeholder="Escribe aquí el numero Whatsapp a enviar el detalle a firmar" style="width:100%;" value="<?= $Paciente_Whatsapp; ?>">' +
                '<label for="correo_enviar">Correo:</label><br>' +
                '<input id="correo_enviar"  type="email" class="form-control" placeholder="Escribe aquí el email a enviar el detalle a firmar" style="width:100%;" value="<?= $Paciente_Correo; ?>">' +
                '<input id="detalle_odontograma_id" type="hidden" value="' + detalle_id + '">' +
                '<input id="cliente_id" type="hidden" value="<?= $cliente_id; ?>">',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Enviar Mensaje',
            cancelButtonText: 'Descartar',
            focusConfirm: false,
            customClass: {
                popup: 'Swal_Enviar_Firma'
            },
            preConfirm: () => {
                const whatsapp_enviar = Swal.getPopup().querySelector('#whatsapp_enviar').value;
                const correo_enviar = Swal.getPopup().querySelector('#correo_enviar').value;
                const detalle_odontograma_id = Swal.getPopup().querySelector('#detalle_odontograma_id').value;
                const cliente_id = Swal.getPopup().querySelector('#cliente_id').value;

                if (!whatsapp_enviar && !correo_enviar) {
                    Swal.showValidationMessage(`Completa alguno de los dos campos`);
                }
                return {
                    whatsapp_enviar: whatsapp_enviar,
                    correo_enviar: correo_enviar,
                    detalle_odontograma_id: detalle_odontograma_id,
                    cliente_id: cliente_id
                }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "OD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Enviar Firmar Cliente",
                        Resultados: result.value,
                    }
                }).done(function (response) {
                    console.log(response);
                    var responsen = JSON.parse(response);
                    if (response != "") {
                        Swal.fire(
                            responsen.Estado,
                        )
                    } else {
                        Swal.fire(
                            'Error!',
                        )
                    }
                });

            }
        })

    }

    function VerFirmaCliente(detalle_id) {

        var Detalle_id = detalle_id;

        Swal.fire({
            title: 'Firma',
            //html: '<div class="accordion" id="CitasAccordion"></div>',
            html: '<div class="container" id="Div_Firma" style="width:100%;"><div>',
            showCloseButton: true,
            showConfirmButton: false,
            width: '40%',
            didOpen: function () {
                var accordion = $('#Div_Firma');
                $.ajax({
                    url: 'OD_Ajax.php',
                    type: 'POST',
                    data: {
                        Tipo_Consulta: "Buscar Firma",
                        Detalle_id: Detalle_id,
                    },
                    success: function (data) {
                        var data = JSON.parse(data);

                        html = `<div class="row">
                                        <div class="col-md-12">
                                            <img src="${data.Firma}">
                                        </div>
                                        <div class="col-md-12">
                                            <br><label><u>Fecha y Hora</u> : ${data.Fecha} - ${data.Hora}</label> <hr>
                                            <label><u>Nombres y Apellidos</u> : ${data.Firma_Nombre}</label> <br>
                                            <label><u>Numero Documento</u> : ${data.Firma_Documento}</label> <br>
                                        </div>
                                    </div>`;
                        accordion.append(html);

                    },
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });


    }
</script>

<!-- //////////////////////////////////////////////////? [FIN] Enviar Firma por Whatsapp y Correo | Ver Firma ///////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////? Estado del procedimiento modal ///////////////////////////////////////////////// -->
<script>
    function EditarEstadoProcedimiento(detalle_id) {

        Swal.fire({
            title: 'Editar Estado Procedimiento',
            html: '<label for="Estado_Modal_Procedimiento">Estado</label><br>' +
                '<select id="Estado_Modal_Procedimiento" class="form-control" style="width:100%;"><option value="Registrado">Registrado</option><option value="Realizado">Realizado</option><option value="No Realizado">No Realizado</option>' +
                '</select>' +
                '<label for="Detalle_Modal_Procedimiento">Detalle:</label><br>' +
                '<input id="Detalle_Modal_Procedimiento"  type="text" class="form-control" placeholder="Escribe aquí el detalle" style="width:100%;">' +
                '<input id="detalle_odontograma_id" type="hidden" value="' + detalle_id + '">',
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Actualizar Procedimiento',
            cancelButtonText: 'Descartar',
            focusConfirm: false,
            customClass: {
                popup: 'Swal_Actualizar_Procedimiento'
            },
            preConfirm: () => {
                const Estado_Modal_Procedimiento = Swal.getPopup().querySelector('#Estado_Modal_Procedimiento').value;
                const Detalle_Modal_Procedimiento = Swal.getPopup().querySelector('#Detalle_Modal_Procedimiento').value;
                const detalle_odontograma_id = Swal.getPopup().querySelector('#detalle_odontograma_id').value;

                if (!Estado_Modal_Procedimiento) {
                    Swal.showValidationMessage(`Completa alguno de los dos campos`);
                }
                return {
                    Estado_Modal_Procedimiento: Estado_Modal_Procedimiento,
                    Detalle_Modal_Procedimiento: Detalle_Modal_Procedimiento,
                    detalle_odontograma_id: detalle_odontograma_id
                }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "OD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Actualizar Estado Procedimiento",
                        Resultados: result.value,
                    }
                }).done(function (response) {
                    //console.log(response);
                    var responsen = JSON.parse(response);
                    Swal.fire(
                        responsen.Estado,
                    );
                    HistorialDiente(responsen.NumeroDiente);
                });

            }
        })

    }
</script>
<!-- //////////////////////////////////////////////////? [FIN] Estado del procedimiento modal ///////////////////////////////////////////////// -->

<?php
require_once 'OD_RequireModalEvolucion.php';
include 'OD_ModalHistorial.php';
?>