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


    .G3{
        
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
        z-index: 1;
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

    @media(max-width:1494px) AND (min-width:1137px) {
        .recuadros {
            zoom: 0.6;
        }
    }

    @media(max-width:1136px) AND (min-width:992px) {
        .recuadros {
            zoom: 0.55;
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
        top: 77px;
        left: 21px;
    }

    .diente_img1>svg {
        position: absolute;
        width: 35px;
        top: 130px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img2>svg {
        position: absolute;
        width: 35px;
        top: 92px;
        left: 27px;
        zoom: 0.84;
    }

    .diente_img3>svg {
        position: absolute;
        width: 35px;
        top: 46px;
        left: 20px;
    }

    .rotate_icon>svg {
        transform: rotate(180deg);
    }

    .click_odontograma>svg {
        top: 3px;
        position: relative;
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

    .separadoinferior {
        bottom: 86px;
        border-bottom-left-radius: 10px;
        border-bottom-right-radius: 10px;
        height: 44px !important;
        background-color: #d7d7d7bf;
        border-top: 0px;
    }

    .separadosuperior {
        top: 14px;
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        height: 44px !important;
        background-color: #d7d7d7bf;
        border-bottom: 0px;
    }

    .separadoinferior>svg {
        top: 15px;
    }

    .separadosuperior>svg {
        top: 2px;
    }

    .G_3,.G_4,.G_6,.G_8,.G_11,.G_12{
        left: 10px;
    }


    #ImagenDiente_51 > img {
        width: 60px;
    }
    #ImagenDiente_52 > img {
        width: 60px;
    }
    #ImagenDiente_53 > img {
        width: 60px;
    }

    #ImagenDiente_54 > img {
        width: 60px;
    }
    #ImagenDiente_55 > img {
        width: 60px;
    }
    /*hasta el 55*/
    
    #ImagenDiente_61 > img {
        width: 60px;
    }
    #ImagenDiente_62 > img {
        width: 60px;
    }
    #ImagenDiente_63 > img {
        width: 60px;
    }

    #ImagenDiente_64 > img {
        width: 60px;
    }
    #ImagenDiente_65 > img {
        width: 60px;
    }

    #ImagenDiente_71 > img {
        width: 60px;
    }
    #ImagenDiente_72 > img {
        width: 60px;
    }
    #ImagenDiente_73 > img {
        width: 60px;
    }

    #ImagenDiente_74 > img {
        width: 60px;
    }
    #ImagenDiente_75 > img {
        width: 60px;
    }

    #ImagenDiente_81 > img{
        width: 60px;
    }
    #ImagenDiente_82 > img{
        width: 60px;
    }
    #ImagenDiente_83 > img{
        width: 60px;
    }

    #ImagenDiente_84 > img{
        width: 60px;
    }
    #ImagenDiente_85 > img{
        width: 60px;
    }


    #Imagen_Diente{
        zoom:1.5;
    }


</style>
<style>

.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Odontograma Pediátrico </a></li>
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

                <h4 class="Titulo_Pagina">Odontograma Pediátrico</h4>
                <div class="box">
                    <div class="box-body">
                        <div class='col-md-12 row'>
                            
                            <div class="col-md-12">
                                <label for="TipoOdontograma">Tipo</label>   
                                <select id="TipoOdontograma" class="select2 form-control input-lg" style="width: 100%;" onchange="VistaOdontograma(this.value)">

                                    <option value="Temporal" selected>Temporal</option>
                                    <option value="Permanente">Permanente</option>
                                    
                                </select>
                            </div>

                            
                            <div class="col-md-12 row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">

                                    <button class="btn btn-block btn-outline-info  rounded-pill shadow" style="margin-top:5px;margin-bottom:5px;" id="BotonSeleccion_Activar" onclick='ActivarSeleccionMultiple();'> <i class="fa-solid fa-check"></i> Activar Selección Multiple </button>
                                    <button class="btn btn-block btn-outline-danger  rounded-pill shadow" style="margin-top:5px;margin-bottom:5px;display:none;" id="BotonSeleccion_Desactivar" onclick='DesactivarSeleccionMultiple();'> <i class="fa-solid fa-close"></i> Desactivar Selección Multiple </button>
                                    <button class="btn btn-block btn-outline-success  rounded-pill shadow" style="margin-top:5px;margin-bottom:5px;display:none;" id="BotonSeleccion_Procesar" onclick='ProcesarSeleccionMultiple();'> <i class="fa fa-circle-o-notch fa-spin"></i> Procesar Selección Multiple </button>
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
                                        <div class='col-md-12 recuadros'>
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'></div>

                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma'></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' ></div>
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
                                        <div class='col-md-12 recuadros recuadroperso' >
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'></div>

                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' ></div>
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
                                        <div class='col-md-12 recuadros recuadroperso'>
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'></div>

                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' ></div>
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

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> 
                                    
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img3 diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        <div class='col-md-12 recuadros'>
                                            <div id='RecuadroSeparadoSuperior_{$value}' {$DataSeparadoSuperior} class='cuadro separado separadosuperior click_odontograma'></div>

                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>

                                            <div id='RecuadroSeparadoInferior_{$value}' {$DataSeparadoInferior} class='cuadro separado separadoinferior click_odontograma' ></div>
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

                        
                        <!-- Botón para abrir el modal impresiones -->
                        <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#ModalImpresionOdontgrama">
                        Impresiones Odontograma Pediátrico
                        </button>

                        <!-- HTML para el modal -->
                        <div class="modal fade" id="ModalImpresionOdontgrama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel"> Impresiones Odontograma Pediátrico</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div style="display: inline-table;width:100%">
                                    <hr>
                                    <a href="ODP_Impresion?Tipo=1&clienteId=<?= $cliente_id; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Temporal </strong></h4>
                                        </button>
                                    </a>
                                    <hr>
                                    <a href="ODP_Impresion?Tipo=2&clienteId=<?= $cliente_id; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Permanente </strong></h4>
                                        </button>
                                    </a>
                                    <hr>
                                    <a href="ODP_Impresion?Tipo=3&clienteId=<?= $cliente_id; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Completo </strong></h4>
                                        </button>
                                    </a>
                                    <hr>
                                    </div>
                                </div>
                                </div>
                            </div>
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
                <form action="#" method="POST" name="formularioEnvioExamen" onsubmit="event.preventDefault();GuardarPieza();">
                    <div class="row" style="">
                        <div class="col-md-6" style="height:80px;">
                            <label id="Tipo_Diente_Cara" style="top: 36%;left: 33%;position: relative;"><!-- se llena en la funcion --> </label>
                        </div>
                        <div class="col-md-6" style="height:80px;" id="Imagen_Diente">

                        </div>
                        <hr>
                        <div class="col-md-12" id="DatosOdontogramaModal">
                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Procedimiento</label>
                                <select id="Diente_Procedimiento" class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  ODP_Procedimiento where Activo = 1 and ID_principal = '{$_SESSION['ID_principal']}'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        $SVG = funcionMaster($Icono, 'id', 'SVG', 'ODP_Iconos_SVG');
                                        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
                                        $SVG = str_replace('"', "|", $SVG);
                                        $SVG = str_replace("\r\n", "■", $SVG);
                                        $SVG = str_replace("\n", "°", $SVG);


                                        $ArregloSVG["$id_procedimiento"] = $SVG;

                                        //inventario id
                                        /*
                                        $inventario_id = $rowMotorizado['inventario_id'];
                                        $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
                                        if($Nombre_Inventario != ""){
                                            $Nombre_Inventario = " / [ " . $Nombre_Inventario." ]";
                                        }
                                        */
                                        //inventario id

                                        
                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";

                                        //Esto funcion para el editar procedimientos//
                                        $ArregloSwal = $ArregloSwal . "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
                                    }

                                    $ArregloSVGTXT = json_encode($ArregloSVG);
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="col-md-12" >
                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle" />
                        </div>

                        <div class="col-md-12" style="margin-top: 10px;">
                            <label>CIE11</label>
                            <select id="cie_10"  class="form-control select2" style="width: 100%;">
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

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <input type="hidden" id="cliente_id" value="<?= $_GET['clienteId']; ?>">
                        <input type="hidden" id="usuario_id" value="<?= $_SESSION['ID']; ?>">
                        <input type="hidden" id="diente_id">
                        <input type="hidden" id="Diente_Posicion">
                        <input type="hidden" id="Diente_NombreCara">
                        <input type="hidden" id="Diente_TodaPieza">

                        <br>

                        <button type="button" class="btn btn-block btn-outline-danger rounded-pill btn-lg" style="width:50%;height: fit-content;" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-lg" style="width: 50%;float: right;height: fit-content;margin: 0;" id="Boton_Enviar">Guardar</button>
                        
                        <div class="col-md-12">
                            <hr>
                        </div>

                        <h2 style="text-align: center;font-weight: bold;width:100%;"> Historial </h2>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <div class="col-md-12" id="Historial_Diente" style="height:300px;overflow-y: auto;">

                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>



<div class="modal fade bd-example-modal-lg" id="ModalSeleccionAll" role="dialog" aria-labelledby="ModalSeleccionAll" aria-hidden="true">
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
                        <form action="#" method="POST" name="formularioEnvioExamen" onsubmit="event.preventDefault();GuardarPiezaMultiple();">
                            <div class="col-md-12" align="center">
                                <label style="font-size:20px;color:#3c8dbc;">Seleccion Multiple de Piezas</label>
                            </div>

                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Procedimiento</label>
                                <select id="Diente_Procedimiento_Multiple" class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  ODP_Procedimiento where Activo = 1 and ID_principal = '{$_SESSION['ID_principal']}'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        /*
                                        $inventario_id = $rowMotorizado['inventario_id'];
                                        $Nombre_Inventario = funcionMaster($inventario_id, 'ID', 'descripcion', 'sinvetrios');
                                        if($Nombre_Inventario != ""){
                                            $Nombre_Inventario = " / [ " . $Nombre_Inventario." ]";
                                        }
                                        */
                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}{$Nombre_Inventario} </option>";
                                    }

                                    ?>
                                </select>
                            </div>

                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle_Multiple" />
                            <br>


                            <div class="" style="margin-top: 10px;">
                                <label>CIE11</label>
                                <select id="cie_10_Multiple"  class="form-control select2" style="width: 100%;">
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


                            <input type="hidden" id="diente_multiple">
                            <input type="hidden" id="cliente_id_multiple" value="<?= $_GET['clienteId']; ?>">
                            <input type="hidden" id="usuario_id_multiple" value="<?= $_SESSION['ID']; ?>">

                            <button type="button" class="btn btn-outline-danger rounded-pill btn-lg" style="width:50%;height: fit-content;" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-outline-info rounded-pill btn-lg" style="width: 50%;float: right;height: fit-content;margin: 0;" id="Boton_Enviar">Guardar</button>

                        </form>

                    </div>
                </div>
            </div>
            <div class="modal-footer" style="text-align: center;">
                <!--<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>-->
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

    function HistorialDiente(diente_id) {

        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Historial Diente",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: diente_id
            },
            success: function(response) {
                document.getElementById("Historial_Diente").innerHTML = response;
                //console.log(response);
            }
        });

    }

    function GuardarPieza() {

        var Diente_Procedimiento = document.getElementById("Diente_Procedimiento").value;
        var Diente_Detalle = document.getElementById("Diente_Detalle").value;

        var diente_id = document.getElementById("diente_id").value;
        var Diente_Posicion = document.getElementById("Diente_Posicion").value;
        var Diente_NombreCara = document.getElementById("Diente_NombreCara").value;
        var Diente_TodaPieza = document.getElementById("Diente_TodaPieza").value;

        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        //var Presupuesto_Tratamiento = document.getElementById("Presupuesto_Tratamiento").value;
        //var inventario_id = document.getElementById("inventario_id").value;
        var cie_10 = document.getElementById("cie_10").value;

        $.ajax({
            type: "POST",
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Agregar Dato Odontograma",
                Diente_Procedimiento: Diente_Procedimiento,
                Diente_Detalle: Diente_Detalle,
                diente_id: diente_id,
                Diente_Posicion: Diente_Posicion,
                Diente_NombreCara: Diente_NombreCara,
                Diente_TodaPieza: Diente_TodaPieza,
                //Presupuesto_Tratamiento: Presupuesto_Tratamiento,
                //inventario_id:inventario_id,
                cie_10: cie_10,
                cliente_id: cliente_id,
                usuario_id: usuario_id
            },
            success: function(response) {
                if (Diente_TodaPieza != "") {
                    document.getElementById("RecuadroSuperior_" + document.getElementById("diente_id").value).innerHTML = response;
                    document.getElementById("RecuadroIzquierdo_" + document.getElementById("diente_id").value).innerHTML = response;
                    document.getElementById("RecuadroInferior_" + document.getElementById("diente_id").value).innerHTML = response;
                    document.getElementById("RecuadroDerecha_" + document.getElementById("diente_id").value).innerHTML = response;
                    document.getElementById("RecuadroCentro_" + document.getElementById("diente_id").value).innerHTML = response;

                    document.getElementById("RecuadroSeparadoSuperior_" + document.getElementById("diente_id").value).innerHTML = response;
                    document.getElementById("RecuadroSeparadoInferior_" + document.getElementById("diente_id").value).innerHTML = response;
                    CargarImagenDiente(document.getElementById("diente_id").value);
                } else {
                    document.getElementById(document.getElementById("Diente_Posicion").value + "_" + document.getElementById("diente_id").value).innerHTML = response;
                    CargarImagenDiente(document.getElementById("diente_id").value);
                }

                $('#modalPieza').modal('toggle');

            }
        });

    }


    function CargarImagenPieza(elemento) {
        //console.log(elemento)
        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Pieza",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: elemento
            },
            success: function(response) {
                //console.log(response);
                let arr = JSON.parse(response);
                //console.log(arr);
                document.getElementById("RecuadroSuperior_" + elemento).innerHTML = arr[0];
                document.getElementById("RecuadroIzquierdo_" + elemento).innerHTML = arr[1];
                document.getElementById("RecuadroInferior_" + elemento).innerHTML = arr[2];
                document.getElementById("RecuadroDerecha_" + elemento).innerHTML = arr[3];
                document.getElementById("RecuadroCentro_" + elemento).innerHTML = arr[4];

                document.getElementById("RecuadroSeparadoSuperior_" + elemento).innerHTML = arr[5];
                document.getElementById("RecuadroSeparadoInferior_" + elemento).innerHTML = arr[6];
            }
        });
    }

    function CargarImagenDiente(elemento) {
        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Diente",
                cliente_id: cliente_id,
                usuario_id: usuario_id,
                diente_id: elemento
            },
            success: function(response) {
                //console.log(response);


                var div = document.getElementById("ImagenDiente_" + elemento);
                var svg = div.getElementsByTagName("svg")[0];
                //console.log(div);
                //console.log(svg);
                if (svg != undefined) {
                    //console.log("entrto");
                    div.removeChild(svg);
                }

                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_" + elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_" + elemento).title = respuesta[1];
                //document.getElementById("ImagenDiente_"+elemento).innerHTML += response;
                //console.log(response);
            }
        });
    }

    function VistaOdontograma(Valor) {
        switch (Valor) {
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

            $(Selecticon[i]).select2(selectOptions);

        }
    }
</script>
<script>
    
    $(document).ready(function() {

        var selectores = ['#Diente_Procedimiento', '#Presupuesto_Tratamiento', '#Diente_Procedimiento_Multiple', '#Presupuesto_Tratamiento_Multiple', '#tratamiento_edicion'];
        SelectIconos(selectores);



        $(".click_odontograma").click(function(event) {
            //console.log($(this).attr('id'));
            var arreglo_id = $(this).attr('id').split("_");
            var diente_id = arreglo_id[1];
            var Posicion = arreglo_id[0];
            var Nombre_Cara = $(this).attr('data-diente');

            HistorialDiente(diente_id);
            ModalPiezaOdontograma(diente_id, Posicion, Nombre_Cara);
        });

        //let Numero_Diente_Arreglo = ["55","54","53","52","51","61","62","63","64","65","85","84","83","82","81","71","72","73","74","75"];
        
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
        

        Numero_Diente_Arreglo.forEach(function(elemento, indice, array) {
            CargarImagenPieza(elemento);
            CargarImagenDiente(elemento);
        })

        $(".diente_img_general").click(function(event) {
            //console.log($(this).attr('id'));
            var arreglo_id = $(this).attr('id').split("_");
            var diente_id = arreglo_id[1];
            var Posicion = "Toda la Pieza";
            var Nombre_Cara = "Toda la Pieza";
            var Toda_Pieza = diente_id;

            HistorialDiente(diente_id);
            ModalPiezaOdontograma(diente_id, Posicion, Nombre_Cara, Toda_Pieza);
        });

        VistaOdontograma("Temporal"); 
    });
    
</script>


<script>
    function ActivarSeleccionMultiple() {
        document.getElementById("BotonSeleccion_Desactivar").style.display = "block";
        document.getElementById("BotonSeleccion_Procesar").style.display = "block";
        document.getElementById("BotonSeleccion_Activar").style.display = "none";

        //.check_seleccionMultiple
        $(".check_seleccionMultiple").css("display", "block");
    }

    function DesactivarSeleccionMultiple() {

        document.getElementById("BotonSeleccion_Desactivar").style.display = "none";
        document.getElementById("BotonSeleccion_Procesar").style.display = "none";
        document.getElementById("BotonSeleccion_Activar").style.display = "block";

        $(".check_seleccionMultiple").css("display", "none");
        $(".class_checkselectall").prop('checked', false);
    }

    function ProcesarSeleccionMultiple() {
        var Arreglo = []
        $('.class_checkselectall').each(function(index) {
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
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Agregar Dato Multiple Odontograma",
                Diente_Procedimiento: Diente_Procedimiento,
                Diente_Detalle: Diente_Detalle,
                diente_multiple: diente_multiple,
                //Presupuesto_Tratamiento: Presupuesto_Tratamiento,
                //inventario_id:inventario_id,
                cie_10: cie_10,
                cliente_id: cliente_id,
                usuario_id: usuario_id
            },
            success: function(response) {
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
                    url: "ODP_Ajax.php",
                    data: {
                        Tipo_Consulta: "Eliminar Detalle Odontograma",
                        DetalleOdontograma_id: DetalleOdontograma_id,

                    }
                }).done(function(Respuesta) {
                    var response = JSON.parse(Respuesta);
                    if (response.Numero_Diente != "") {
                        Swal.fire(
                            'Eliminado!',
                        )
                        var diente_modal = $("#diente_id").val();
                        HistorialDiente(diente_modal);
                        CargarImagenDiente(diente_modal);
                        CargarImagenPieza(diente_modal);
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
            url: "ODP_Ajax.php",
            data: {
                Tipo_Consulta: "Buscar Informacion Detalle Odontograma",
                DetalleOdontograma_id: DetalleOdontograma_id,

            }
        }).done(function(response) {
            var arreglo = JSON.parse(response);
            ModalSwalEdicion(arreglo, lugar);
        });

    }

    function PosicionCara(input) {
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
    var optionFormat1 = function(item) {
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

    function ModalSwalEdicion(response, lugar) {
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
                    CIE10_edicion:CIE10_edicion
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
                    url: "ODP_Ajax.php",
                    data: {
                        Tipo_Consulta: "Guardar Edicion Informacion Detalle Odontograma",
                        Resultados: result.value,
                    }
                }).done(function(response) {
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
                    CargarImagenPieza(responsen.NumeroDiente);

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
        height: 65em;
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

    .Swal_Actualizar_Procedimiento {
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
                    url: "ODP_Ajax.php",
                    data: {
                        Tipo_Consulta: "Enviar Firmar Cliente",
                        Resultados: result.value,
                    }
                }).done(function(response) {
                    //console.log(response);
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
            didOpen: function() {
                var accordion = $('#Div_Firma');
                $.ajax({
                    url: 'ODP_Ajax.php',
                    type: 'POST',
                    data: {
                        Tipo_Consulta: "Buscar Firma",
                        Detalle_id: Detalle_id,
                    },
                    success: function(data) {
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
                    error: function(xhr, status, error) {
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
                    url: "ODP_Ajax.php",
                    data: {
                        Tipo_Consulta: "Actualizar Estado Procedimiento",
                        Resultados: result.value,
                    }
                }).done(function(response) {
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

require_once "./ODP_RequireModalEvolucion.php";
//$LugarOdontograma = "Odontograma Completo";
//include 'OD_ModalHistorial.php';
?>