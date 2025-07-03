<!DOCTYPE html>
<?php
include 'header.php';
include 'menu.php';

$cliente_id = $_GET['clienteId'];

$usuario_id = $_SESSION['ID'];
?>


<style>
        .contenedor {
            position: relative;
        }
        #D1 {
            position: absolute;
            left: 51px;
            top: 213px;
            width: 50px;
            height: 50px;
        }
        #D1:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D2 {
            position: absolute;
            left: 109px;
            top: 128px;
            width: 50px;
            height: 50px;
            
        }
        #D2:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D3 {
            position: absolute;
            left: 172px;
            top: 90px;
            width: 50px;
            height: 50px;
            
        }
        #D3:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D4 {
            position: absolute;
            left: 235px;
            top: 54px;
            width: 50px;
            height: 50px;
            
        }
        #D4:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D5 {
            position: absolute;
            left: 317px;
            top: 53px;
            width: 80px;
            height: 75px;
            
        }
        #D5:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
    </style>


<style>
        #D10 {
            position: absolute;
            left: 360px;
            top: 213px;
            width: 50px;
            height: 50px;
        }
        #D10:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D9 {
            position: absolute;
            left: 303px;
            top: 128px;
            width: 50px;
            height: 50px;
            
        }
        #D9:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D8 {
            position: absolute;
            left: 241px;
            top: 90px;
            width: 50px;
            height: 50px;
            
        }
        #D8:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D7 {
            position: absolute;
            left: 178px;
            top: 54px;
            width: 50px;
            height: 50px;
            
        }
        #D7:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
        #D6 {
            position: absolute;
            left: 66px;
            top: 53px;
            width: 80px;
            height: 75px;
            
        }
        #D6:hover{
            background-color: #1e1e1e33;
            border-radius: 15px;
            border: 4px solid;
        }
    </style>
<style>
    #D1 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D2 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }
    
    #D3 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D4 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D5 > svg {
        left: 5px;
        position: relative;
        height:4em;
        width:4em;
    }

    


    #D10 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D9 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }
    
    #D8 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D7 > svg {
        left: 5px;
        position: relative;
        height:2.5em;
        width:2.5em;
    }

    #D6 > svg {
        left: 5px;
        position: relative;
        height:4em;
        width:4em;
    }

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
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}

@media screen and (min-width: 994px) and (max-width: 1200px) {
  
  #contenedor1 {
    zoom: 0.8;
  }

  #contenedor2 {
    zoom: 0.8;
  }
}

@media screen and (min-width: 768px) and (max-width: 993px) {
  
  #contenedor1 {
    zoom: 0.7;
  }

  #contenedor2 {
    zoom: 0.7;
  }
}

@media screen and (min-width: 319px) and (max-width: 525px) {
  
  #contenedor1 {
    zoom: 0.5;
  }

  #contenedor2 {
    zoom: 0.5;
  }
}

/*

@media screen and (min-width: 768px) and (max-width: 1024px) {
  
  #ContenedorRayado {
    zoom: 0.9;
  }

}

@media screen and (min-width: 768px) and (max-width: 1024px) {
  
  #ContenedorRayado {
    zoom: 0.9;
  }

}

@media screen and (min-width: 600px) and (max-width: 767px) {
  
  #ContenedorRayado {
    zoom: 0.7;
  }

}

@media screen and (min-width: 425px) and (max-width: 599px) {
  
  #ContenedorRayado {
    zoom: 0.5;
  }

}

@media screen and (min-width: 320px) and (max-width: 424px) {
  
  #ContenedorRayado {
    zoom: 0.4;
  }

}
*/
</style>





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Historia Podograma </a></li>
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
                <h4 class="Titulo_Pagina">Historia Podograma</h4>
                <div class="box">
                    <div class="box-body">
                        <div class='col-md-12 row'>


                        

                        <div id="contenedor1" class="contenedor col-md-6">
                            <div id="PieIzquierdo" style="width: 100%;font-size: 50px;position: absolute;left: 65px;">L</div>
                            <img src="PD_Imagenes/Pie Izquierdo.jpg" alt="Imagen">
                            <div id="D1" class="ClickPodologia" data-nombre="Quinto Dedo"></div>
                            <div id="D2" class="ClickPodologia" data-nombre="Cuarto Dedo"></div>
                            <div id="D3" class="ClickPodologia" data-nombre="Tercer Dedo"></div>
                            <div id="D4" class="ClickPodologia" data-nombre="Segundo Dedo"></div>
                            <div id="D5" class="ClickPodologia" data-nombre="Primer Dedo"></div>
                        </div>

                        <div id="contenedor2" class="contenedor col-md-6">
                            <div id="PieDerecho" style="width: 395px;font-size: 50px;position: absolute;text-align: end;">R</div>
                            <img src="PD_Imagenes/Pie Derecho.jpg" alt="Imagen">
                            <div id="D6" class="ClickPodologia" data-nombre="Primer Dedo"></div>
                            <div id="D7" class="ClickPodologia" data-nombre="Segundo Dedo"></div>
                            <div id="D8" class="ClickPodologia" data-nombre="Tercer Dedo"></div>
                            <div id="D9" class="ClickPodologia" data-nombre="Cuarto Dedo"></div>
                            <div id="D10" class="ClickPodologia" data-nombre="Quinto Dedo"></div>
                        </div>

                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <!-- Botón que activa el Formulario Lesiones -->
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" data-toggle="collapse" data-target="#ContenidoFormularioLesiones" aria-expanded="false" aria-controls="ContenidoFormularioLesiones">
                            Agregar Lesiones
                        </button>

                        <!-- Contenido coFormulario Lesiones -->
                        <div class="collapse mt-3" id="ContenidoFormularioLesiones">
                            <div class="card card-body">
                                <form action="#" method="POST" name="formularioEnvioExamen" onsubmit="event.preventDefault();GuardarLesion();">
                            <?php

                                echo '<div class="box-body row" style="font-size: 18px;width:100%" id="ContenedorRayado">';
                                $_GET['n'] = 117;
                                $_GET['img'] = 'PD_Imagenes/PieCompleto.png';
                                $_GET['h'] = '1250';
                                $_GET['w'] = '700';
                                $_GET['timer'] = '5000';
                                $_GET['escribir'] = 'si';
                                include 'RayadoPodologia.php';
                                echo '</div><hr>';

                            ?>
                                <textarea type="text" rows="2" class="form-control" name="Observaciones"  id="Observaciones_Lesion" placeholder="Observaciones"></textarea>
                                <input type="hidden"  id="cliente_id_lesion" value="<?= $cliente_id; ?>">
                                <input type="hidden"  id="usuario_id_lesion" value="<?= $_SESSION['ID']; ?>">
                                
                                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="float: right;">Guardar</button>

                                </form>

                                <script>
                                    function GuardarLesion() {
                                        var Observaciones_Lesion = document.getElementById("Observaciones_Lesion").value;
                                        var Rayado = document.getElementById("img117").value;
                                        var cliente_id_lesion = document.getElementById("cliente_id_lesion").value;
                                        var usuario_id_lesion = document.getElementById("usuario_id_lesion").value;

                                        $.ajax({
                                            type: "POST",
                                            url: "PD_Ajax.php",
                                            data: {
                                                Tipo_Consulta: "Guardar Lesion",
                                                Observaciones_Lesion: Observaciones_Lesion,
                                                Rayado: Rayado,
                                                cliente_id: cliente_id_lesion,
                                                usuario_id: usuario_id_lesion
                                            },
                                            success: function(response) {
                                                var respuesta = JSON.parse(response);
                                                if (respuesta.Respuesta == "ok") {
                                                    swal.fire({
                                                        icon: 'success',
                                                        title: 'Guardado',
                                                        text: 'Guardado Correctamente',
                                                    })
                                                    window.location.reload();
                                                }else{
                                                  swal.fire({
                                                      icon: 'error',
                                                      title: 'Error',
                                                      text: 'Error al Guardar',
                                                  })  
                                                }
                                            
                                            }
                                        })
                                    }
                                </script>
                            </div>
                        </div>

                        <div class="col-md-12">
                            <hr>
                        </div>

                        <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />
                        <!-- Botón que activa el Formulario Lesiones -->
                        <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button" data-toggle="collapse" data-target="#ContenidoHistorialLesiones" aria-expanded="false" aria-controls="ContenidoHistorialLesiones">
                            Historial Lesiones
                        </button>

                        <!-- Contenido coFormulario Lesiones -->
                        <div class="collapse mt-3" id="ContenidoHistorialLesiones">
                            <div class="card card-body">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                <?php
                                $contador=0;
                                if(tablaExiste('PD_Lesion')):
                                $QueryPodologiaLesion = mysqli_query($conn3, "SELECT * FROM  PD_Lesion where cliente_id = '$cliente_id' ");
                                $nrowl = mysqli_num_rows($QueryPodologiaLesion);
                                while ($RowLesion = mysqli_fetch_array($QueryPodologiaLesion)) {
                                    $id = $RowLesion['id'];
                                    $contador++;
                                    $Imagen = $RowLesion['Imagen'];
                                    $Observacion = $RowLesion['Observacion'];

                                ?>

                                    
                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                        <h4 class="panel-title">
                                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Lesion<?php echo $id ?>" aria-expanded="false" aria-controls="Lesion<?php echo $id ?>">
                                            Lesión # <?php echo $contador; ?>
                                            </a>
                                        </h4>
                                        </div>
                                        <div id="Lesion<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                        <div class="panel-body">
                                            <p><b>Imagen</b></p>
                                            <?php 
                                            echo '<img src="'. ($Imagen) .'" width="auto"/><br>';
                                            echo '<b>Observaciones</b><br>'.$Observacion;
                                            ?><br>
                                        </div>
                                        </div>
                                    </div>
                                <?php
                                
                                }
                                
                                endif;
                                ?>
                                </div>
                            </div>
                            <!--final accordion-->  



                            </div>
                        </div>
                        
                        <br>

                        <a href="PD_Impresion?clienteId=<?php echo $_GET['clienteId'] ?>" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" type="button">
                            Imprimir
                            </a>






                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<div class="modal fade" id="ModalDedo" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Estado del Dedo</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="#" method="POST" name="formularioEnvioExamen" onsubmit="event.preventDefault();GuardarDedoInicial();">
                    <div class="row" style="">
                        <div class="col-md-6" style="height:80px;">
                            <label id="Tipo_Diente_Cara" style="top: 36%;left: 33%;position: relative;"><!-- se llena en la funcion --> </label>
                        </div>
                        <div class="col-md-6" style="height:80px;" id="Imagen_Diente">

                        </div>
                        <hr>
                        <div class="col-md-12" id="DatosOdontogramaModal">
                            <h3 id="MensajeEdicionModal" style="text-align: center;font-weight: bold;"></h3>
                            <div class="select-icon" style="margin-top: 40px;">
                                <label for="Dedo_Procedimiento">Patología </label>
                                <select id="Dedo_Procedimiento" class="select2 form-control input-lg icons_select2" style="width: 100%;" required>
                                    <option value="" selected>Selecione...</option>
                                    <?php
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  PD_Procedimiento where Activo = 1");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id_procedimiento = $rowMotorizado['id'];
                                        $Icono = $rowMotorizado['Icono'];
                                        $Color = $rowMotorizado['Color'];
                                        $Nombre = $rowMotorizado['Nombre'];

                                        $SVG = funcionMaster($Icono, 'id', 'SVG', 'PD_Iconos_SVG');
                                        $SVG = str_replace('fill="currentColor"', 'fill="' . $Color . '"', $SVG);
                                        $SVG = str_replace('"', "|", $SVG);
                                        $SVG = str_replace("\r\n", "■", $SVG);
                                        $SVG = str_replace("\n", "°", $SVG);


                                        $ArregloSVG["$id_procedimiento"] = $SVG;


                                        echo "<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre}</option>";

                                        //Esto funcion para el editar procedimientos//
                                        $ArregloSwal = $ArregloSwal."<option value='{$id_procedimiento}' data-icon='{$id_procedimiento}' > {$Nombre} </option>";
                                    }

                                    $ArregloSVGTXT = json_encode($ArregloSVG);
                                    ?>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <hr>
                                <h3 style="text-align: center;font-weight: bold;">Superficie</h3>
                                
                            </div>
                            <div class="row col-md-12" id="check_lados">


                            </div>

                            <hr>

                            <label for="inputdetalle">Detalle</label>
                            <!--<input type="text" class="form-control" id="Dedo_Detalle" />-->
                            <textarea id="Dedo_Detalle" class="form-control" rows="3"></textarea>

                            <hr>


                            <input type="hidden" id="cliente_id" value="<?= $_GET['clienteId']; ?>">
                            <input type="hidden" id="usuario_id" value="<?= $_SESSION['ID']; ?>">
                            <input type="hidden" id="dedo_id">

                            <br>
                        
                        
                            <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%;float: right;" id="Boton_Enviar">Guardar</button>
                            <br>
                        </div>

                        <div class="col-md-12">
                            <hr>
                            <h3 style="text-align: center;font-weight: bold;"> Historial </h3>
                        </div>
                        
                        
                        <div class="col-md-12" id="Historial_Dedo" style="height:300px;overflow-y: auto;">

                        </div>
                        <div class="col-md-12">
                        <hr>
                        </div>
                        <button type="button" class="btn btn-block btn-outline-danger btn-lg rounded-pill shadow" style="width:100%;" data-dismiss="modal">Cerrar</button>
                    </div>

                </form>
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

    var ArregloIconos = JSON.parse(<?php echo json_encode($ArregloSVGTXT); ?>);
    function SelectIconos(Selecticon,parent) {
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
                width:"100%"
            };
            
            if (parent) {
                selectOptions.dropdownParent = parent;
            }

            $(Selecticon[i]).select2(selectOptions);

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
    
</script>

<script>

function ModalPiezaDedo(Numero_Dedo,Nombre_Dedo) {

$('#ModalDedo').modal('show');
document.getElementById("dedo_id").value = Numero_Dedo;
document.getElementById("Imagen_Diente").innerHTML = "<label>" + Nombre_Dedo + "</label><!--<img src=''>-->";


var SVG = "<svg width='40' viewBox='0 0 35.6 35.6'><circle class='background' cx='17.8' cy='17.8' r='17.8'></circle><circle class='stroke' cx='17.8' cy='17.8' r='14.37'></circle><polyline class='check' points='11.78 18.12 15.55 22.23 25.17 12.87'></polyline></svg>";

var ArregloChecks = new Array();
ArregloChecks["Izquierdo"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]'  class='checks_modal modal_valor' value='Izquierda'  onclick='CheckUnico()' > " + SVG + "  <br> Izquierda </div>";
ArregloChecks["Derecho"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]'  class='checks_modal modal_valor' value='Derecha'  onclick='CheckUnico()' > " + SVG + "  <br> Derecha </div>";
ArregloChecks["Arriba"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]'  class='checks_modal modal_valor' value='Arriba'  onclick='CheckUnico()' > " + SVG + "  <br> Arriba </div>";
ArregloChecks["Abajo"] = "<div class='col-md-3 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' name='Arreglo[Icono]'  class='checks_modal modal_valor' value='Abajo'  onclick='CheckUnico()' > " + SVG + "  <br> Abajo </div>";
//console.log(ArregloDienteCaras);
var Div="";
for (var key in ArregloChecks) {
    if (ArregloChecks.hasOwnProperty(key)) {
        Div += ArregloChecks[key];
    }
}
Div += "<div class='col-md-12 checkbox-wrapper-31' style='zoom: 0.85;text-align: -webkit-center;padding-top: 20px;'><input type='checkbox' id='check_all' name='Arreglo[Icono]' value='Toda' onchange='CheckAll(this)' class='modal_valor' > " + SVG + " <br> Toda la Uña </div>";
$("#check_lados").html(Div);


}

//////////////////////////////////////////////// Esto es para el modal con los checks//////////////////////////////////////////////////
function CheckUnico() {
    $("#check_all").prop('checked', false);
    var Contador = 0;
    $('.checks_modal').each(function(index) {
        var valor = $(this).is(':checked');
        if ($(this).is(':checked') == true) {
            Contador++;
        }
        if (Contador == 4) {
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
//////////////////////////////////////////////// Esto es para el modal con los checks//////////////////////////////////////////////////



async function GuardarDedoInicial() {
        var checks = document.getElementsByClassName("modal_valor");
        var contador = 0;
        var TodaSuperficie="";

        for (var g of checks) {
                if (g.checked == true && g.value === "Toda") {
                TodaSuperficie = "Si"; // Actualizamos el valor de TodaLaPieza si se encuentra "Toda la Pieza"
                var res = await GuardarDedoFuncion(g.value);
                contador++;
                }
        }
        if (TodaSuperficie == "") {
            for (var g of checks) {
                if (g.checked == true) {
                    var res = await GuardarDedoFuncion(g.value);
                    contador++;
                }
            }
        }
        if (contador == 0) {
            alert("Seleccione Alguna opcion de las superficies");
        }
        $('#ModalDedo').modal('toggle');
    }



function GuardarDedoFuncion(Superficie1) {

    return new Promise((resolve, reject) => {
            var Dedo_Procedimiento = document.getElementById("Dedo_Procedimiento").value;
            var Dedo_Detalle = document.getElementById("Dedo_Detalle").value;
            var dedo_id = document.getElementById("dedo_id").value;

            var Superficie = Superficie1;

            var usuario_id = document.getElementById("usuario_id").value;
            var cliente_id = document.getElementById("cliente_id").value;

            $.ajax({
                type: "POST",
                url: "PD_Ajax.php",
                data: {
                    Tipo_Consulta: "Agregar Dato Podologia",
                    Dedo_Procedimiento: Dedo_Procedimiento,
                    Dedo_Detalle: Dedo_Detalle,
                    dedo_id: dedo_id,
                    Dedo_Superficie: Superficie,
                    cliente_id: cliente_id,
                    usuario_id: usuario_id
                },
                success: function(response) {
                    CargarImagenDedo(document.getElementById("dedo_id").value);
                    resolve(response);
                }
            });

    })

}

function CargarImagenDedo(elemento) {
    var usuario_id = document.getElementById("usuario_id").value;
    var cliente_id = document.getElementById("cliente_id").value;

    $.ajax({
        type: "POST",
        url: "PD_Ajax.php",
        data: {
            Tipo_Consulta: "Cargar Imagen Dedo",
            cliente_id: cliente_id,
            usuario_id: usuario_id,
            dedo_id: elemento
        },
        success: function(response) {

            var div = document.getElementById(elemento);
            if (div !== null) {
                var svg = div.getElementsByTagName("svg")[0];
                if (svg !== undefined) {
                    div.removeChild(svg);
                }
                var respuesta = response.split('|');
                div.innerHTML += respuesta[0];
                div.title = respuesta[1];
            } else {
                console.log("El elemento con ID D" + elemento + " no fue encontrado.");
            }
        }
    });
}

function HistorialDedo(dedo_id) {

var usuario_id = document.getElementById("usuario_id").value;
var cliente_id = document.getElementById("cliente_id").value;

$.ajax({
    type: "POST",
    url: "PD_Ajax.php",
    data: {
        Tipo_Consulta: "Cargar Historial Dedo",
        cliente_id: cliente_id,
        usuario_id: usuario_id,
        dedo_id: dedo_id
    },
    success: function(response) {
        document.getElementById("Historial_Dedo").innerHTML = response;
        //console.log(response);
    }
});

}
</script>
<script>
    function EliminarDetalleDedo(Detalle_id) {

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
                    url: "PD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Eliminar Detalle Dedo",
                        Detalle_id: Detalle_id,

                    }
                }).done(function(response) {
                    if (response != "") {
                        Swal.fire(
                            'Eliminado!',
                        )
                        //console.log(response);
                        var dedo_id = $("#dedo_id").val();
                        HistorialDedo(dedo_id);
                        CargarImagenDedo(dedo_id);
                    } else {
                        Swal.fire(
                            'Error!',
                        )
                    }

                });

            }
        })

    }


    function EditarDetalleOdontograma_Dedo(Detalle_id,lugar) {

        $.ajax({
            type: "POST",
            url: "PD_Ajax.php",
            data: {
                Tipo_Consulta: "Buscar Informacion Detalle Dedo",
                Detalle_id: Detalle_id,

            }
        }).done(function(response) {
            var arreglo = JSON.parse(response);
            // aqui cambia debido a que en este odontograma no hay piezas visibles y se actualiza la funcion para comentar la funcion para cargar la piezasado
            ModalSwalEdicion_Inicial(arreglo,lugar);
        });

    }

    function ModalSwalEdicion_Inicial(response, lugar) {
        var ArregloSwal = "<?= $ArregloSwal; ?>";

        var checkboxes = $('input.checks_modal:checkbox');

        //var CarasDientes = JSON.parse('<?= json_encode($ArregloDatosCadaDiente); ?>');
        var Numero_Dedo = response.Numero_Dedo;
        /*
        let Cara = [];
        Cara.push('Toda');
        Object.values(CarasDientes[NumeroDiente]).forEach(valor => {
            Cara.push(valor);
        });
        */
        var Cara = ["Toda", "Arriba","Izquierda","Abajo","Derecha"];
        var Resultado_Superficie = response.Superficie;
        var Resultado_Procedimiento = response.Procedimiento;
        var Resultado_Detalle = response.Detalle;
        var id_detalle = response.id_detalle;

        Swal.fire({
            title: 'Edicion de Procedimiento',
            html: '<label for="procedimiento_edicion">Procedimiento:</label><br>' +
                '<select id="procedimiento_edicion" class="swal2-select icons_select2_1 select2" >' +
                ArregloSwal +
                '</select>' +
                '<br><br>' +
                '<label for="superficie_edicion">Superficie:</label><br>' +
                '<select id="superficie_edicion"  class="swal2-select select2_1" style="width: 100%;margin:0;"><option value="">Seleccione</option>' +
                Cara.map(e => '<option value="' + e + '">' + e + '</option>').join('') +
                '</select>' +
                '<br><br>' +
                '<label for="detalle_edicion">Detalle:</label><br>' +
                '<input id="detalle_edicion"  type="text" class="form-control" placeholder="Escribe aquí el detalle" style="width:100%;">' +
                '<br><br>' +
                '<input id="numero_dedo_edicion" type="hidden">' +
                '<input id="id_detalle" type="hidden">',
            icon: 'question',
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Descartar',
            focusConfirm: false,
            customClass: {
                popup: 'Swal_Editar_Podologia'
            },
            preConfirm: () => {
                const procedimiento = Swal.getPopup().querySelector('#procedimiento_edicion').value;
                const superficie = Swal.getPopup().querySelector('#superficie_edicion').value;
                const detalle = Swal.getPopup().querySelector('#detalle_edicion').value;
                const id_detalle = Swal.getPopup().querySelector('#id_detalle').value;

                const numero_dedo_edicion = Swal.getPopup().querySelector('#numero_dedo_edicion').value;

                if (!procedimiento || !superficie) {
                    Swal.showValidationMessage(`Completa todos los campos`);
                }
                return {
                    procedimiento: procedimiento,
                    superficie: superficie,
                    detalle: detalle,
                    id_detalle: id_detalle,
                    numero_dedo_edicion: numero_dedo_edicion,
                }
            },
            didOpen: () => {
                
                var Arreglo = ["#procedimiento_edicion"]
                SelectIconos(Arreglo, $('.swal2-container'));

                /* 
                $('.icons_select2_1').select2({
                    width: "100%",
                    templateSelection: optionFormat1,
                    templateResult: optionFormat1,
                    dropdownParent: $('.swal2-container')
                });
                */
                

                $("#procedimiento_edicion").val(Resultado_Procedimiento).trigger('change');
                $("#superficie_edicion").val(Resultado_Superficie).trigger('change');
                $("#detalle_edicion").val(Resultado_Detalle);

                $("#numero_dedo_edicion").val(Numero_Dedo);
                $("#id_detalle").val(id_detalle);
                
                
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "PD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Guardar Edicion Informacion Detalle Dedo",
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

                    HistorialDedo(responsen.NumeroDedo);
                    CargarImagenDedo(responsen.NumeroDedo);
                });

            }
        })


    }


</script>
<style>
.Swal_Editar_Podologia {
    height: 55em;
    width: 55em;
    font-size: 0.85em!important;
}
</style>


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
        '<input id="detalle_podologia_id" type="hidden" value="' + detalle_id + '">',
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
        const detalle_podologia_id = Swal.getPopup().querySelector('#detalle_podologia_id').value;

        if (!Estado_Modal_Procedimiento) {
            Swal.showValidationMessage(`Completa alguno de los dos campos`);
        }
        return {
            Estado_Modal_Procedimiento: Estado_Modal_Procedimiento,
            Detalle_Modal_Procedimiento: Detalle_Modal_Procedimiento,
            detalle_podologia_id: detalle_podologia_id
        }
    },
}).then((result) => {
    if (result.isConfirmed) {
        $.ajax({
            type: "POST",
            url: "PD_Ajax.php",
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
            HistorialDedo(responsen.NumeroDiente);
        });

    }
})

}
</script>
<!-- //////////////////////////////////////////////////? [FIN] Estado del procedimiento modal ///////////////////////////////////////////////// -->

<!-- //////////////////////////////////////////////////? Enviar Firma por Whatsapp y Correo ///////////////////////////////////////////////// -->
<style>
.Swal_Enviar_Firma {
    height: 45em;
    width: 45em;
    font-size: 0.85em!important;
}
</style>

<script>

function EnviarAFirmarCliente(detalle_id){

    Swal.fire({
            title: 'Enviar Detalle a Firmar - <?=$Paciente_Nombre;?>',
            html: '<label for="whatsapp_enviar">Whatsapp:</label><br>' +
                '<input id="whatsapp_enviar"  type="number" class="form-control" placeholder="Escribe aquí el numero Whatsapp a enviar el detalle a firmar" style="width:100%;" value="<?=$Paciente_Whatsapp;?>">' +
                '<label for="correo_enviar">Correo:</label><br>' +
                '<input id="correo_enviar"  type="email" class="form-control" placeholder="Escribe aquí el email a enviar el detalle a firmar" style="width:100%;" value="<?=$Paciente_Correo;?>">' +
                '<input id="detalle_podologia_id" type="hidden" value="'+detalle_id+'">'+
                '<input id="cliente_id" type="hidden" value="<?=$cliente_id;?>">',
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
                const detalle_podologia_id = Swal.getPopup().querySelector('#detalle_podologia_id').value;
                const cliente_id = Swal.getPopup().querySelector('#cliente_id').value;

                if (!whatsapp_enviar && !correo_enviar) {
                    Swal.showValidationMessage(`Completa alguno de los dos campos`);
                }
                return {
                    whatsapp_enviar: whatsapp_enviar,
                    correo_enviar: correo_enviar,
                    detalle_podologia_id: detalle_podologia_id,
                    cliente_id: cliente_id
                }
            },
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "POST",
                    url: "PD_Ajax.php",
                    data: {
                        Tipo_Consulta: "Enviar Firmar Cliente",
                        Resultados: result.value,
                    }
                }).done(function(response) {
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

function VerFirmaCliente(detalle_id){

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
                    url: 'PD_Ajax.php',
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

<script>
    $(document).ready(function() {

        $(".ClickPodologia").click(function(event) {

            var Numero_Dedo = $(this).attr('id');
            var Nombre_Dedo = $(this).attr('data-nombre');

            HistorialDedo(Numero_Dedo);
            ModalPiezaDedo(Numero_Dedo,Nombre_Dedo);
        });

        let Numero_Dedos = ["D1",
            "D2",
            "D3",
            "D4",
            "D5",
            "D6",
            "D7",
            "D8",
            "D9",
            "D10",
        ];

        Numero_Dedos.forEach(function(elemento, indice, array) {
            //CargarImagenPieza(elemento);
            CargarImagenDedo(elemento);
        })


        var selectores = ['#Dedo_Procedimiento'];
        SelectIconos(selectores);

        /*
        var imagenTagTelf = document.getElementById('fileUpload1117');

        var imagenHeightTelf = document.getElementById('canvas1117');

        var imagenWidthTelf = "250";

        var imagenHeightTelf1 = "250";

        imagenHeightTelf.setAttribute('width', imagenWidthTelf);
        imagenHeightTelf.setAttribute('height', imagenHeightTelf1);
        imagenTagTelf.setAttribute('width', imagenWidthTelf);
        imagenTagTelf.setAttribute('height', imagenHeightTelf1);
        */


        /*
        var imagenWidth117 = 250;
        var imagenHeight117 = 250;

        window.signaturePad1117.clear();
                clearFileInput117(document.getElementById("fileUpload1117"));
                base_image117 = new Image();
                base_image117.src = document.getElementById("img117").value;
                base_image117.onload = function() {
                    canvasContext117.clearRect(base_image117, 0, 0, 99999999999, 99999999999);
                    canvasContext117.drawImage(base_image117, 0, 0, imagenWidth117, imagenHeight117);
                }
                */
        /*     
                var heigthjava = "250";
        var widthjava = "800";
        document.getElementById('canvas1117').setAttribute('width', heigthjava);
        document.getElementById('canvas1117').setAttribute('height', widthjava);
        
        document.getElementById('fileUpload1117').setAttribute('width', heigthjava);
        document.getElementById('fileUpload1117').setAttribute('height', widthjava);
        
        // URL de la imagen
        const imageUrl = 'PD_Imagenes/PieCompleto.png';

        // Función para obtener la base64 de la imagen desde la URL
        function obtenerBase64DesdeUrl(url) {
            fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.onloadend = () => resolve(reader.result);
                        reader.onerror = reject;
                        reader.readAsDataURL(blob);
                    });
                })
                .then(base64data => {
                    var canvas = document.getElementById("canvas1117");
                    var ctx = canvas.getContext("2d");

                    var tempImage = new Image();
                    tempImage.src = base64data;
                    tempImage.onload = function() {
                        // Dibujar la imagen de fondo
                        ctx.drawImage(tempImage, 0, 0, 250, 800);

                        // Dibujar los trazos del objeto signaturePad1117 en el lienzo
                        var data = signaturePad1117.toData();
                        for (var i = 0; i < data.length; i++) {
                            var trazo = data[i];
                            ctx.beginPath();
                            ctx.lineWidth = trazo.width || 2; // Establece el ancho de línea (puede usar un valor predeterminado)
                            ctx.moveTo(trazo.points[0].x, trazo.points[0].y);
                            for (var j = 1; j < trazo.points.length; j++) {
                                ctx.lineTo(trazo.points[j].x, trazo.points[j].y);
                            }
                            ctx.stroke();
                        }
                    };
                })
                .catch(error => {
                    console.error('Error:', error.message);
                });
        }

        obtenerBase64DesdeUrl(imageUrl);
        */

                
        function verificarTamanioPantalla() {
    if (window.innerWidth <= 425) {
        
        var heigthjava = "310";
        var widthjava = "900";
        document.getElementById('canvas1117').setAttribute('width', heigthjava);
        document.getElementById('canvas1117').setAttribute('height', widthjava);
        
        document.getElementById('fileUpload1117').setAttribute('width', heigthjava);
        document.getElementById('fileUpload1117').setAttribute('height', widthjava);
        
        // URL de la imagen
        const imageUrl = 'PD_Imagenes/PieCompleto.png';

        // Función para obtener la base64 de la imagen desde la URL
        function obtenerBase64DesdeUrl(url) {
            fetch(url)
                .then(response => response.blob())
                .then(blob => {
                    return new Promise((resolve, reject) => {
                        const reader = new FileReader();
                        reader.onloadend = () => resolve(reader.result);
                        reader.onerror = reject;
                        reader.readAsDataURL(blob);
                    });
                })
                .then(base64data => {
                    var canvas = document.getElementById("canvas1117");
                    var ctx = canvas.getContext("2d");

                    var tempImage = new Image();
                    tempImage.src = base64data;
                    tempImage.onload = function() {
                        // Dibujar la imagen de fondo
                        ctx.drawImage(tempImage, 0, 0, 310, 900);

                        // Dibujar los trazos del objeto signaturePad1117 en el lienzo
                        var data = signaturePad1117.toData();
                        for (var i = 0; i < data.length; i++) {
                            var trazo = data[i];
                            ctx.beginPath();
                            ctx.lineWidth = trazo.width || 2; // Establece el ancho de línea (puede usar un valor predeterminado)
                            ctx.moveTo(trazo.points[0].x, trazo.points[0].y);
                            for (var j = 1; j < trazo.points.length; j++) {
                                ctx.lineTo(trazo.points[j].x, trazo.points[j].y);
                            }
                            ctx.stroke();
                        }
                    };
                })
                .catch(error => {
                    console.error('Error:', error.message);
                });
        }

        obtenerBase64DesdeUrl(imageUrl);

        imagenHeight117 = "310";
        imagenWidth117 = "900";

        var imagenTag = document.getElementById('fileUpload1117');

        imagenTag.setAttribute('width', imagenWidth117);
        imagenTag.setAttribute('height', imagenHeight117);

        /*
        var cavas = document.getElementById('canvas1117');

        cavas.setAttribute('height', imagenWidth117);
        cavas.setAttribute('width', imagenHeight117);
        */

        
        function clearmovil() {
            var canvas = document.getElementById("canvas1117");
            var ctx = canvas.getContext("2d");

            // Limpia el lienzo
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            
            // Carga la imagen base
            var base_image117 = new Image();
            base_image117.onload = function() {
                // Dibuja la imagen base
                ctx.drawImage(base_image117, 0, 0, 310, 900);
            };
            base_image117.src = 'PD_Imagenes/PieCompleto.png';
            console.log("movil");
        }

       // Reemplaza el evento onclick por clearmovil
$("#rayadolimpiar_117").click(function() {
    clearmovil();
});

// Oculta el elemento con id "rayadodeshacer_1117"
$("#rayadodeshacer_117").hide();

    }
    
}

// Ejecuta la función al cargar la página
verificarTamanioPantalla();

// Escucha los cambios de tamaño de la pantalla
window.addEventListener('resize', verificarTamanioPantalla);
                




    });
</script>
<script src="apiVoz_3.2.js"></script>