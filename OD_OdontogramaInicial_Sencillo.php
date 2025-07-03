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
                            <div class="col-md-12">
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

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        
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

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img1 rotate_icon diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        
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

                                        echo "<div class='col-md-2 col-xs-2 col-perso des_{$contador}'> <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img2 diente_img_general' id='ImagenDiente_{$value}' > <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>    
                                        
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

                                    echo "<div class='col-md-3 col-xs-3 col-perso'> <label style='left: 15px;position:relative;padding-bottom: 10px;'>{$value}</label>
                                        <div style='width:60px;height: 80px;text-align-last: center;' class='diente_img3 diente_img_general' id='ImagenDiente_{$value}'> <img src='OD_ImagenOdontograma/{$value}.png' style='position: relative;'> </div>
                                        <br>
                                        
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
                    CargarImagenDiente(document.getElementById("diente_id").value);
                }
                
                $('#modalPieza').modal('toggle');

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
                if(svg!=undefined){
                    div.removeChild(svg);
                }
                var respuesta = response.split('|');
                document.getElementById("ImagenDiente_"+elemento).innerHTML += respuesta[0];
                document.getElementById("ImagenDiente_"+elemento).title = respuesta[1];
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
        //CargarImagenPieza(elemento);
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

<?php
include 'OD_ModalHistorial.php';
?>
