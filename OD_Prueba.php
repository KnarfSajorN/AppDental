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
@media (max-width: 569px){
    .col-perso {
        width: 50%;
    }
}
@media (max-width: 359px){
    .col-perso {
        width: 100%;
    }
}
/* fin */



/* este estilo va reemplazar a un col-md-2 ya que se usara ese espacio para aumentar el espacio de los recuadros */
@media (max-width: 991px){
    .col-xs-0 {
        display: none;
    }
}
/* fin */

/* este estilo es para mover los recuadros y el diente al lado derecho para que no se monten */
@media(max-width:991px) AND (min-width:425px){
    .des_1{
        left: 10px;
    }
    .des_2{
        left: 20px;
    }
    .des_3{
        left: 30px;
    }
    .des_4{
        left: 40px;
    }
    .des_5{
        left: 50px;
    }
}


@media(min-width:992px){

    .G_2, .G_5, .G_7, .G_10{
    border-right: 1px solid;
    }

    .G_5, .G_6{
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

.arriba{
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


@media(max-width:1895px) AND (min-width:1495px){
    .recuadros{
        zoom: 0.75
    }
}
@media(max-width:1494px) AND (min-width:1200px){
    .recuadros{
        zoom: 0.6;
    }
}

@media(max-width:1494px) AND (min-width:992px){
    .recuadroperso{
        zoom: 0.66;
    }
}

.click_odontograma{
    text-align-last: center;
}

.diente_img > svg{
    position: absolute;
    width: 35px;
    top: 65px;
    left: 28px;
}

.diente_img1 > svg{
    position: absolute;
    width: 35px;
    top: 81px;
    left: 36px;
    zoom: 0.84;
}
.diente_img2 > svg{
    position: absolute;
    width: 35px;
    top: 65px;
    left: 36px;
    zoom: 0.84;
}

.diente_img3 > svg{
    position: absolute;
    width: 35px;
    top: 47px;
    left: 28px;
}
.rotate_icon > svg{
    transform: rotate(180deg);
}

.click_odontograma > svg{
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
     zoom:0.4;

     display: none;
}
 .check_seleccionMultiple input {
	 display: none;
}
 .check_seleccionMultiple input:checked + .box {
	 background-color: #b3ffb7;
}
 .check_seleccionMultiple input:checked + .box:after {
	 top: 0;
}
 .check_seleccionMultiple .box {
	 width: 100%;
	 height: 100%;
	 transition: all 1.1s cubic-bezier(.19,1,.22,1);
	 border: 2px solid black;
	 background-color: white;
	 position: relative;
	 overflow: hidden;
	 cursor: pointer;
	 box-shadow: 5px 5px 5px 5px rgba(0,0,0,0.2);
}
 .check_seleccionMultiple .box:after {
     width: 65%;
     height: 30%;
	 content: '';
	 position: absolute;
	 border-left: 7.5px solid;
	 border-bottom: 7.5px solid;
	 border-color: #40c540;
	 transform: rotate(-45deg) translate3d(0,0,0);
	 transform-origin: center center;
	 transition: all 1.1s cubic-bezier(.19,1,.22,1);
	 left: 0;
	 right: 0;
	 top: 200%;
	 bottom: 5%;
	 margin: auto;
}

</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Odontograma </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="content">
                <div class="col-md-12" style="height: 280px;">
                <?php include 'Modulos_Estilos/DatosPersonales.php';
                    echo Datos_Personales($cliente_id);
                ?>
                </div>

                <h4 class="Titulo_Pagina">Odontograma</h4>
                <div class="box">
                    <div class="box-body">
                        <div class='col-md-12'>
                            <div class="col-md-12">
                            <label for="TipoOdontograma">Tipo</label>
                                <select id="TipoOdontograma"  class="select2 form-control input-lg" style="width: 100%;" onchange="VistaOdontograma(this.value)">
                                    <option value="Mixto" selected>Mixto</option>
                                    <option value="Permanente" >Permanente</option>
                                    <option value="Temporal" >Temporal</option>
                                </select>
                            </div>
                            <div class="col-md-12 row">
                                <div class="col-md-9"></div>
                                <div class="col-md-3">
                                    <button class="btn btn-block btn-primary btn-sm" style="margin-top:5px;margin-bottom:5px;" id="BotonSeleccion_Activar" onclick='ActivarSeleccionMultiple();'>  <i class="fa-solid fa-check"></i>  Activar Selección Multiple </button>
                                    <button class="btn btn-block btn-danger btn-sm" style="margin-top:5px;margin-bottom:5px;display:none;" id="BotonSeleccion_Desactivar" onclick='DesactivarSeleccionMultiple();'>  <i class="fa-solid fa-close"></i>  Desactivar Selección Multiple </button>
                                    <button class="btn btn-block btn-info btn-sm" style="margin-top:5px;margin-bottom:5px;display:none;" id="BotonSeleccion_Procesar" onclick='ProcesarSeleccionMultiple();'>  <i class="fa fa-circle-o-notch fa-spin"></i>  Procesar Selección Multiple </button>
                                </div>
                                <br> <hr>
                            </div>
                        <?php
       
                            $ArregloArriba1[0]=["18","17","16","15","14","13","12","11"];
                            $ArregloArriba2[0]=["Vacio","55","54","53","52","51"];

                            $ArregloArriba1[1]=["21","22","23","24","25","26","27","28"];
                            $ArregloArriba2[1]=["61","62","63","64","65","Vacio"];

                            foreach ($ArregloArriba1 as $key1 => $value1) {
                                $contador=0;
                                foreach ($value1 as $key => $value) {
                                    $contador++;
                                    if($contador=="1"){
                                        $contadorGeneral++;
                                        echo "<div class='col-lg-3 col-md-6 col-xs-12 G_{$contadorGeneral}'>";
                                    }

                                    switch ($value) {
                                        case "18": case "17": case "16": case "15": case "14":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Distal'";
                                            $DataDerecha="data-diente='Mesial'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Oclusal'";
                                            break;
                                        case "13": case "12": case "11":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Distal'";
                                            $DataDerecha="data-diente='Mesial'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Borde Incisal'";
                                            break;



                                        case "21": case "22": case "23":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Mesial'";
                                            $DataDerecha="data-diente='Distal'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Borde Incisal'";
                                            break;
                                        case "24": case "25": case "26": case "27": case "28":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Mesial'";
                                            $DataDerecha="data-diente='Distal'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Oclusal'";
                                            break;
                                    }

                                    echo "<div class='col-md-3 col-xs-3 col-perso'>

                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        <div class='col-md-12 recuadros'> 
                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma'></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>
                                        </div>
                                    </div>";

                                    if($contador=="4"){
                                        echo "</div>";
                                        $contador=0;
                                    }
                                }
                            }

                            foreach ($ArregloArriba2 as $key1 => $value1) {
                                $contador=0;
                                $contadorGeneral++;
                                echo "<div class='col-lg-6 col-md-6 col-xs-12 G_{$contadorGeneral}'>";
                                foreach ($value1 as $key => $value) {
                                    if($value=="Vacio"){
                                        echo "<div class='col-md-2 col-xs-0'><br></div>";
                                    }
                                    else{
                                        
                                        switch ($value) {
                                        case "55": case "54": case "53":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Distal'";
                                            $DataDerecha="data-diente='Mesial'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Oclusal'";
                                            break;
                                        case "52": case "51":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Distal'";
                                            $DataDerecha="data-diente='Mesial'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Borde Incisal'";
                                            break;



                                        case "61": case "62":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Mesial'";
                                            $DataDerecha="data-diente='Distal'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Borde Incisal'";
                                            break;
                                        case "63": case "64": case "65":
                                            $DataArriba="data-diente='Vestibular'";
                                            $DataIzquierda="data-diente='Mesial'";
                                            $DataDerecha="data-diente='Distal'";
                                            $DataAbajo="data-diente='Palatino'";//lingual es para inferior | palatino superior
                                            $DataCentro="data-diente='Oclusal'";
                                            break;
                                        }

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img1 rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        <div class='col-md-12 recuadros recuadroperso' > 
                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>
                                        </div>
                                    </div>";

                                    }
                                    $contador++;
                                }
                                echo "</div>";
                            }


                            /////////////////////////////////? Parte inferior /////////////////////////////////////////////////////////

                            $ArregloAbajo1[0]=["Vacio","85","84","83","82","81"];
                            $ArregloAbajo2[0]=["48","47","46","45","44","43","42","41"];
                            
                            $ArregloAbajo1[1]=["71","72","73","74","75","Vacio"];
                            $ArregloAbajo2[1]=["31","32","33","34","35","36","37","38"];
                            

                            foreach ($ArregloAbajo1 as $key1 => $value1) {
                                $contador=0;
                                $contadorGeneral++;
                                echo "<div class='col-lg-6 col-md-6 col-xs-12 G_{$contadorGeneral}'>";
                                foreach ($value1 as $key => $value) {
                                    if($value=="Vacio"){
                                        echo "<div class='col-md-2 col-xs-0'><br></div>";
                                    }
                                    else{
                                        
                                        switch ($value) {
                                            case "85": case "84": case "83":
                                                $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior
                                                $DataIzquierda="data-diente='Distal'";
                                                $DataDerecha="data-diente='Mesial'";
                                                $DataAbajo="data-diente='Vestibular'";
                                                $DataCentro="data-diente='Oclusal'";
                                                break;
                                            case "82": case "81":
                                                $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior
                                                $DataIzquierda="data-diente='Distal'";
                                                $DataDerecha="data-diente='Mesial'";
                                                $DataAbajo="data-diente='Vestibular'";
                                                $DataCentro="data-diente='Borde Incisal'";
                                                break;
    
    
    
                                            case "71": case "72":
                                                $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior
                                                $DataIzquierda="data-diente='Mesial'";
                                                $DataDerecha="data-diente='Distal'";
                                                $DataAbajo="data-diente='Vestibular'";
                                                $DataCentro="data-diente='Borde Incisal'";
                                                break;
                                            case "73": case "74": case "75":
                                                $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior
                                                $DataIzquierda="data-diente='Mesial'";
                                                $DataDerecha="data-diente='Distal'";
                                                $DataAbajo="data-diente='Vestibular'";
                                                $DataCentro="data-diente='Oclusal'";
                                                break;
                                        }

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> 
                                        
                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img2 diente_img_general' id='ImagenDiente_{$value}' > <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        <div class='col-md-12 recuadros recuadroperso'> 
                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>
                                        </div>
                                    </div>";
                                    
                                    }
                                    $contador++;
                                }
                                echo "</div>";
                            }

                            foreach ($ArregloAbajo2 as $key1 => $value1) {
                                $contador=0;
                                foreach ($value1 as $key => $value) {
                                    $contador++;
                                    if($contador=="1"){
                                        $contadorGeneral++;
                                        echo "<div class='col-lg-3 col-md-6 col-xs-12 G_{$contadorGeneral}'>";
                                    }

                                    switch ($value) {
                                        case "48": case "47": case "46": case "45": case "44":
                                            $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda="data-diente='Distal'";
                                            $DataDerecha="data-diente='Mesial'";
                                            $DataAbajo="data-diente='Vestibular'";
                                            $DataCentro="data-diente='Oclusal'";
                                            break;
                                        case "43": case "42": case "41":
                                            $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda="data-diente='Distal'";
                                            $DataDerecha="data-diente='Mesial'";
                                            $DataAbajo="data-diente='Vestibular'";
                                            $DataCentro="data-diente='Borde Incisal'";
                                            break;



                                        case "31": case "32": case "33":
                                            $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda="data-diente='Mesial'";
                                            $DataDerecha="data-diente='Distal'";
                                            $DataAbajo="data-diente='Vestibular'";
                                            $DataCentro="data-diente='Borde Incisal'";
                                            break;
                                        case "34": case "35": case "36": case "37": case "38":
                                            $DataArriba="data-diente='Lingual'";//lingual es para inferior | palatino superior [posicion dientes] 
                                            $DataIzquierda="data-diente='Mesial'";
                                            $DataDerecha="data-diente='Distal'";
                                            $DataAbajo="data-diente='Vestibular'";
                                            $DataCentro="data-diente='Oclusal'";
                                            break;
                                    }

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> 

                                        <label class='check_seleccionMultiple'><input type='checkbox' class='class_checkselectall' id='checkselectall_$value'/><div class='box'></div></label>

                                        <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img3 diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        <div class='col-md-12 recuadros'> 
                                            <div id='RecuadroSuperior_{$value}' {$DataArriba} class='cuadro arriba click_odontograma'></div>
                                            <div id='RecuadroIzquierdo_{$value}' {$DataIzquierda} class='cuadro izquierdo click_odontograma'></div>
                                            <div id='RecuadroInferior_{$value}' {$DataAbajo} class='cuadro debajo click_odontograma'></div>
                                            <div id='RecuadroDerecha_{$value}' {$DataDerecha} class='cuadro derecha click_odontograma '></div>
                                            <div id='RecuadroCentro_{$value}' {$DataCentro} class='centro click_odontograma'></div>
                                        </div>
                                    </div>";

                                    if($contador=="4"){
                                        echo "</div>";
                                        $contador=0;
                                    }
                                }
                            }
                        ?>
                        </div>


                        <div class="col-md-12">
                            <hr>
                            <a href="OD_Impresion.php?clienteId=<?=$cliente_id;?>&usuarioId=<?=$_SESSION['ID'];?>" target="_blank">
                                <button class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa-solid fa-teeth    "></i>  Imprimir Odontograma </strong></h4></button>
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
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Estado Pieza Dental</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="#" method="POST" name="formularioEnvioExamen" onsubmit="event.preventDefault();GuardarPieza();">
                    <div class="form-group" style="    display: inline-table;width: 100%;">
                        <div class="col-md-6" style="height:80px;">
                            <label id="Tipo_Diente_Cara" style="top: 36%;left: 33%;position: relative;"><!-- se llena en la funcion --> </label>
                        </div>
                        <div class="col-md-6"  style="height:80px;"id="Imagen_Diente">
                            
                        </div>
                        <hr>
                        
                        <div class="select-icon" style="margin-top: 40px;">
                            <label for="Diente_Procedimiento">Estado</label>
                            <select id="Diente_Procedimiento"  class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                <option value="" selected>Selecione...</option>
                                <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Procedimiento where Activo = 1");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        $SVG = funcionMaster($Icono,'id','SVG','OD_Iconos_SVG');
                                        $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);
                                        $SVG = str_replace('"', "|", $SVG);
                                        $SVG = str_replace("\r\n", "■", $SVG);
                                        $SVG = str_replace("\n", "°", $SVG);


                                        $ArregloSVG["$id_procedimiento"]=$SVG;

                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre} </option>";
                                    }

                                    $ArregloSVGTXT= json_encode($ArregloSVG);
                                ?>
                            </select>
                        </div>

                        <label for="inputdetalle">Detalle</label>
                        <input type="text" class="form-control" id="Diente_Detalle" />

                        <input type="hidden" id="cliente_id" value="<?=$_GET['clienteId'];?>">
                        <input type="hidden" id="usuario_id" value="<?=$_SESSION['ID'];?>">
                        <input type="hidden" id="diente_id">
                        <input type="hidden" id="Diente_Posicion">
                        <input type="hidden" id="Diente_NombreCara">
                        <input type="hidden" id="Diente_TodaPieza">
                        
                        <br>

                        <button type="button" class="btn btn-default" style="width:50%;" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary" style="width:50%;float: right;" id="Boton_Enviar">Guardar</button>

                        <h2 style="text-align: center;font-weight: bold;"> Historial </h2>
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
                    <div class="row">
                        <form action="#" method="POST" name="formularioEnvioExamen" onsubmit="event.preventDefault();GuardarPiezaMultiple();">
                            <div class="col-md-12" align="center">
                                <label style="font-size:20px;color:#3c8dbc;">Seleccion Multiple de Piezas</label>
                            </div>
                            
                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Diente_Procedimiento">Estado</label>
                                <select id="Diente_Procedimiento_Multiple"  class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                        $queryList = mysqli_query($conn3, "SELECT * FROM  OD_Procedimiento where Activo = 1");
                                        $nrowl = mysqli_num_rows($queryList);
                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                            $id_procedimiento = $rowMotorizado['id'];
                                            $Icono = $rowMotorizado['Icono'];
                                            $Color = $rowMotorizado['Color'];
                                            $Nombre = $rowMotorizado['Nombre'];

                                            $SVG = funcionMaster($Icono,'id','SVG','OD_Iconos_SVG');
                                            $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);
                                            $SVG = str_replace('"', "|", $SVG);
                                            $SVG = str_replace("\r\n", "■", $SVG);
                                            $SVG = str_replace("\n", "°", $SVG);


                                            $ArregloSVG["$id_procedimiento"]=$SVG;

                                            echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre} </option>";
                                        }

                                        $ArregloSVGTXT= json_encode($ArregloSVG);
                                    ?>
                                </select>
                            </div>

                            <label for="inputdetalle">Detalle</label>
                            <input type="text" class="form-control" id="Diente_Detalle_Multiple" />

                            <input type="hidden" id="diente_multiple">
                            <input type="hidden" id="cliente_id_multiple" value="<?=$_GET['clienteId'];?>">
                            <input type="hidden" id="usuario_id_multiple" value="<?=$_SESSION['ID'];?>">

                            <button type="button" class="btn btn-default" style="width:50%;" data-dismiss="modal">Cerrar</button>
                            <button type="submit" class="btn btn-primary" style="width:50%;float: right;" id="Boton_Enviar">Guardar</button>

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


<?php
include 'footer.php';
?>

<script>
    let ArregloSVG = JSON.parse('<?=$ArregloSVGTXT;?>');
    //console.log(ArregloSVG);
  document.getElementsByTagName("body")[0].classList.add("sidebar-collapse");

    function ModalPiezaOdontograma(diente_id, posicion, NombreCara,Toda_Pieza) {

        $('#modalPieza').modal('show');
        document.getElementById("diente_id").value = diente_id;
        document.getElementById("Diente_Posicion").value = posicion;
        document.getElementById("Diente_NombreCara").value = NombreCara;
        if(Toda_Pieza==undefined){
            document.getElementById("Diente_TodaPieza").value = "";
        }else{
            document.getElementById("Diente_TodaPieza").value = Toda_Pieza;
        }
        

        document.getElementById("Tipo_Diente_Cara").innerText = NombreCara;
        document.getElementById("Imagen_Diente").innerHTML = "<label>"+diente_id+"</label><img src='OD_ImagenOdontograma/"+diente_id+".png'>";
        
    }
    function HistorialDiente(diente_id){

        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Historial Diente",
                cliente_id:cliente_id,
                usuario_id:usuario_id,
                diente_id:diente_id
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

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Agregar Dato Odontograma",
                Diente_Procedimiento: Diente_Procedimiento,
                Diente_Detalle: Diente_Detalle,
                diente_id: diente_id,
                Diente_Posicion: Diente_Posicion,
                Diente_NombreCara: Diente_NombreCara,
                Diente_TodaPieza:Diente_TodaPieza,
                cliente_id:cliente_id,
                usuario_id:usuario_id
            },
            success: function(response) {
                if(Diente_TodaPieza!=""){
                    document.getElementById("RecuadroSuperior_"+document.getElementById("diente_id").value).innerHTML=response;
                    document.getElementById("RecuadroIzquierdo_"+document.getElementById("diente_id").value).innerHTML=response;
                    document.getElementById("RecuadroInferior_"+document.getElementById("diente_id").value).innerHTML=response;
                    document.getElementById("RecuadroDerecha_"+document.getElementById("diente_id").value).innerHTML=response;
                    document.getElementById("RecuadroCentro_"+document.getElementById("diente_id").value).innerHTML=response;
                    CargarImagenDiente(document.getElementById("diente_id").value);
                }else{
                    document.getElementById(document.getElementById("Diente_Posicion").value+"_"+document.getElementById("diente_id").value).innerHTML=response;
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
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Pieza",
                cliente_id:cliente_id,
                usuario_id:usuario_id,
                diente_id:elemento
            },
            success: function(response) {
                //console.log(response);
                let arr =  JSON.parse(response); 
                //console.log(arr[0]);
                document.getElementById("RecuadroSuperior_"+elemento).innerHTML = arr[0];
                document.getElementById("RecuadroIzquierdo_"+elemento).innerHTML = arr[1];
                document.getElementById("RecuadroInferior_"+elemento).innerHTML = arr[2];
                document.getElementById("RecuadroDerecha_"+elemento).innerHTML = arr[3];
                document.getElementById("RecuadroCentro_"+elemento).innerHTML = arr[4];
            }
        });
    }

    function CargarImagenDiente(elemento){
        var usuario_id = document.getElementById("usuario_id").value;
        var cliente_id = document.getElementById("cliente_id").value;

        $.ajax({
            type: "POST",
            url: "OD_Ajax.php",
            data: {
                Tipo_Consulta: "Cargar Imagen Diente",
                cliente_id:cliente_id,
                usuario_id:usuario_id,
                diente_id:elemento
            },
            success: function(response) {
                
                var div = document.getElementById("ImagenDiente_"+elemento);
                var svg = div.getElementsByTagName("svg")[0];
                //console.log(div);
                //console.log(svg);
                if(svg!=undefined){
                    //console.log("entrto");
                    div.removeChild(svg);
                }
                
                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_"+elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_"+elemento).title = respuesta[1];
                //document.getElementById("ImagenDiente_"+elemento).innerHTML += response;
                //console.log(response);
            }
        });
    }

    function VistaOdontograma(Valor){
        switch (Valor) {
            case "Mixto":
                $(".G_1").css("display","block");
                $(".G_2").css("display","block");
                $(".G_3").css("display","block");
                $(".G_4").css("display","block");
                $(".G_5").css("display","block");
                $(".G_6").css("display","block");
                $(".G_7").css("display","block");
                $(".G_8").css("display","block");
                $(".G_9").css("display","block");
                $(".G_10").css("display","block");
                $(".G_11").css("display","block");
                $(".G_12").css("display","block");
                break;
            case "Permanente":
                $(".G_1").css("display","block");
                $(".G_2").css("display","block");
                $(".G_3").css("display","block");
                $(".G_4").css("display","block");
                $(".G_5").css("display","none");
                $(".G_6").css("display","none");
                $(".G_7").css("display","none");
                $(".G_8").css("display","none");
                $(".G_9").css("display","block");
                $(".G_10").css("display","block");
                $(".G_11").css("display","block");
                $(".G_12").css("display","block");
                break;
            case "Temporal":
                $(".G_1").css("display","none");
                $(".G_2").css("display","none");
                $(".G_3").css("display","none");
                $(".G_4").css("display","none");
                $(".G_5").css("display","block");
                $(".G_6").css("display","block");
                $(".G_7").css("display","block");
                $(".G_8").css("display","block");
                $(".G_9").css("display","none");
                $(".G_10").css("display","none");
                $(".G_11").css("display","none");
                $(".G_12").css("display","none");
                break;
        }
    }
</script>
<script>
    $(document).ready(function() {

        $(".click_odontograma").click(function(event) {
            //console.log($(this).attr('id'));
            var arreglo_id = $(this).attr('id').split("_");
            var diente_id = arreglo_id[1];
            var Posicion = arreglo_id[0];
            var Nombre_Cara = $(this).attr('data-diente');

            HistorialDiente(diente_id);
            ModalPiezaOdontograma(diente_id,Posicion,Nombre_Cara);
        });

        /*
        $('.icons_select2').select2({
            width: "100%",
            templateSelection: iformat,
            templateResult: iformat,
            allowHtml: true,
            dropdownParent: $( '.select-icon' ),
            multiple: false
        });
        function iformat(icon, badge,) {
            var originalOption = icon.element;
            return $('<span><i class="fa ' + $(originalOption).data('icon') + '" style="color:'+$(originalOption).data('color')+'"></i> ' + icon.text + '</span>');
        }
        */


        // Format options
        var optionFormat = function(item) {
            if ( !item.id ) {
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
            template += "<label style='position: relative;top: -11px;'>"+item.text+"<label>";

            span.innerHTML = template;

            return $(span);
        }

        // Init Select2 --- more info: https://select2.org/
        $('.icons_select2').select2({
            width: "100%",
            templateSelection: optionFormat,
            templateResult: optionFormat
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
    "75"];

    Numero_Diente_Arreglo.forEach(function(elemento, indice, array) {
        CargarImagenPieza(elemento);
        CargarImagenDiente(elemento);
    })

    $(".diente_img_general").click(function(event) {
            //console.log($(this).attr('id'));
            var arreglo_id = $(this).attr('id').split("_");
            var diente_id = arreglo_id[1];
            var Posicion = "Toda La Pieza";
            var Nombre_Cara = "Toda La Pieza";
            var Toda_Pieza = diente_id;

            HistorialDiente(diente_id);
            ModalPiezaOdontograma(diente_id,Posicion,Nombre_Cara,Toda_Pieza);
        });

        
    });

    
</script>

<script>

function ActivarSeleccionMultiple(){
    document.getElementById("BotonSeleccion_Desactivar").style.display="block";
    document.getElementById("BotonSeleccion_Procesar").style.display="block";
    document.getElementById("BotonSeleccion_Activar").style.display="none";

    //.check_seleccionMultiple
    $(".check_seleccionMultiple").css("display", "block");
}

function DesactivarSeleccionMultiple(){
    
    document.getElementById("BotonSeleccion_Desactivar").style.display="none";
    document.getElementById("BotonSeleccion_Procesar").style.display="none";
    document.getElementById("BotonSeleccion_Activar").style.display="block";

    $(".check_seleccionMultiple").css("display", "none");
    $(".class_checkselectall").prop('checked', false);
}

function ProcesarSeleccionMultiple(){
    var Arreglo = []
    $('.class_checkselectall').each(function(index) { 
            var valor =  $(this).is(':checked');
            if($(this).is(':checked')==true){
                var arreglo_id = $(this).attr('id').split("_");
                Arreglo.push(arreglo_id[1]);
            }
    });
    //console.log(Arreglo);
    $("#diente_multiple").val(JSON.stringify(Arreglo));
    $('#ModalSeleccionAll').modal('toggle');
}

function GuardarPiezaMultiple(){

    var Diente_Procedimiento = document.getElementById("Diente_Procedimiento_Multiple").value;
    var Diente_Detalle = document.getElementById("Diente_Detalle_Multiple").value;

    var usuario_id = document.getElementById("usuario_id_multiple").value;
    var cliente_id = document.getElementById("cliente_id_multiple").value;

    var diente_multiple = document.getElementById("diente_multiple").value;

    $.ajax({
        type: "POST",
        url: "OD_Ajax.php",
        data: {
            Tipo_Consulta: "Agregar Dato Multiple Odontograma",
            Diente_Procedimiento: Diente_Procedimiento,
            Diente_Detalle: Diente_Detalle,
            diente_multiple: diente_multiple,
            cliente_id:cliente_id,
            usuario_id:usuario_id
        },
        success: function(response) {
            window.location.reload();
        }
    });

}

</script>
<?php
include 'OD_ModalHistorial.php';
?>