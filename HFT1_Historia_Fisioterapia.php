<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];

$ID = $_SESSION['ID'];


$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $usuario_id = $rowMotorizado['usuario_id'];
    $nombre_cliente = $rowMotorizado['nombre_cliente'];
    $celular_cliente = $rowMotorizado['celular_cliente'];
    $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
    $correo_cliente = $rowMotorizado['correo_cliente'];
    $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
    $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
    $tipo_cliente = $rowMotorizado['tipo_cliente'];
    $fechar = $rowMotorizado['fechar'];
    $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
    $activo = $rowMotorizado['activo'];
    $genero = $rowMotorizado['genero'];
    $direccion_cliente = $rowMotorizado['direccion_cliente'];
    $telefono_cliente = $rowMotorizado['telefono_cliente'];
    $edad_cliente = $rowMotorizado['edad_cliente'];
    $profesion_cliente = $rowMotorizado['profesion_cliente'];
    $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
    $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
    $antecedentes     = $rowMotorizado['antecedentes'];
    $fotoperfil       = $rowMotorizado['fotoperfil'];
    $tiposSangre      = $rowMotorizado['tiposSangre'];
    $esDonante        = $rowMotorizado['esDonante'];
    $tomaMedicamento  = $rowMotorizado['tomaMedicamento'];

    $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];

    $entidadSalud     = $rowMotorizado['entidadSalud'];
    $seguro           = $rowMotorizado['seguro'];

    $nota           = $rowMotorizado['nota'];
    $enfermedadesPequeno           = $rowMotorizado['enfermedadesPequeno'];
    $alergias           = $rowMotorizado['alergias'];


    $peso           = $rowMotorizado['peso'];
    $altura           = $rowMotorizado['altura'];
    $imc           = $rowMotorizado['imc'];
    $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];
    // ----------------------------------------------------------------------------------------------------------------------------


    $ap1            = $rowMotorizado['ap1'];
    $ap2            = $rowMotorizado['ap2'];
    $ap3            = $rowMotorizado['ap3'];
    $ap4            = $rowMotorizado['ap4'];
    $ap5            = $rowMotorizado['ap5'];
    $ap6            = $rowMotorizado['ap6'];
    $ap7            = $rowMotorizado['ap7'];
    $ap8            = $rowMotorizado['ap8'];
    $ap9            = $rowMotorizado['ap9'];

    $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
    $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
    $whatsapp       = $rowMotorizado['whatsapp'];
    $tipoUsuario    = $rowMotorizado['tipoUsuario'];
    $estado         = $rowMotorizado['estado'];
}


$queryconfig = mysqli_query($conn3, "SELECT * FROM  config where ID=$ID");
$nrowl = mysqli_num_rows($queryconfig);
while ($rowconfig = mysqli_fetch_array($queryconfig)) {
    $cie10 = $rowconfig['cie10'];
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
}

$fechahoy  = date("Y-m-d");

?>
<style type="text/css">
    input[type=radio]:focus,
    input[type=checkbox]:focus {
        outline: none;
    }
</style>
<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="js/jquery.min-3.2.1.js"></script>
<script src='js/select2.min-4.0.3.js'></script>

<link rel="stylesheet" href="apiVoz.css">

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">



<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Consulta Médica

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Consulta Médica </a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="box">
            <div class="col-xs-12">


                <div class="">

                    <!-- /.box-header -->
                    <div class="box-body">
                        <form action="HFT1_Guardar_Fisioterapia" method="POST" id="FormularioHistoriaClinica">

                            <div class="col-md-12">









                                <div class="box-solid">

                                    <!-- /.box-header -->
                                    <div class="box-body">
                                        <div class="box-group" id="accordion1">
                                            <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                            <div class="panel box box-primary">
                                                <div class="box-header with-border">
                                                    <h4 class="box-title">
                                                        <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                                            Datos Personales
                                                        </a>
                                                    </h4>
                                                </div>
                                                <div id="collapseOne" class="panel-collapse collapse">
                                                    <div class="box-body">






                                                        <?php echo datosPacientes($clienteId); ?>



                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                            <div class="form-group col-md-12">
                                                <div align="left">Fecha de Atención</div>

                                                <input type="date" value="<?php echo $fechahoy; ?>" name="fechaconsulta" class="form-control input-lg" id="inputSuccess">
                                            </div><br>


                                        <div class="row">
                                            <div class="col-md-6">
                                                <label>Color del Trazo: </label>
                                                <input type="color" class="form-control input-lg" name="color" id="color" onchange="cambiarColorSignature()">
                                            </div>
                                            <div class="col-md-6">
                                                <label>Herramienta: </label>
                                                <select class="form-control input-lg" name="tool" id="tool" onchange="cambiarColorSignature()">
                                                    <option value="1">1. Lápiz</option>
                                                    <option value="2">2. Spray</option>
                                                </select>
                                            </div>
                                            <div class="col-md-12"><br></div>

                                            <div class="col-md-12 center text-center">
                                                <div style="background-color:#c0c0c0;    text-align: -webkit-center;">
                                                    <canvas id="canvas1" name="canvas1" height="600" width="900"></canvas>
                                                    <input type="file" id="fileUpload1" name="fileUpload1" style="    display: flex;">
                                                </div>
                                                <p class="text text-muted"><br>Para Guardar la Imagen y el Trazado Favor Oprimir "¡Guardar Trazo!" al Terminar </p>
                                                <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="guardarTrazo()">¡Guardar Trazo!</a>
                                                <input type="hidden" name="tarea" id="tarea" required>
                                                <a onclick="clear1()">Limpiar</a>
                                                <br>
                                                <label>Notas</label>
                                                <textarea class="form-control input-lg" rows="5" name="tarea2"></textarea>
                                                <hr>
                                            </div>
                                        </div>





                                            <!-- <div class="form-group col-md-12">
                                                <label align="center">Brazo derecho</label><br>


                                                <div class="form-group col-md-2"> PROFUNDIDAD DEL MASAJE<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> Baja</option>
                                                        <option value="Media"> Media</option>
                                                        <option value="Alta"> Alta</option>
                                                    </select></div>
                                                <div class="form-group col-md-2"> NIVEL DE DOLOR DE MASAJE<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> 1/10</option>
                                                        <option value="Media"> 2/10</option>
                                                        <option value="Alta"> 3/10</option>
                                                        <option value="Baja"> 4/10</option>
                                                        <option value="Media"> 5/10</option>
                                                        <option value="Alta"> 6/10</option>
                                                        <option value="Baja"> 7/10</option>
                                                        <option value="Media"> 8/10</option>
                                                        <option value="Alta"> 9/10</option>
                                                        <option value="Alta"> 10/10</option>
                                                    </select></div>

                                                <div class="form-group col-md-2"> INTENSIDAD DEL PERCUTOR<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> Baja</option>
                                                        <option value="Media"> Media</option>
                                                        <option value="Alta"> Alta</option>
                                                    </select></div>

                                                <div class="form-group col-md-2"> NIVEL DE DOLOR CON PERCUTOR<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> 1/10</option>
                                                        <option value="Media"> 2/10</option>
                                                        <option value="Alta"> 3/10</option>
                                                        <option value="Baja"> 4/10</option>
                                                        <option value="Media"> 5/10</option>
                                                        <option value="Alta"> 6/10</option>
                                                        <option value="Baja"> 7/10</option>
                                                        <option value="Media"> 8/10</option>
                                                        <option value="Alta"> 9/10</option>
                                                        <option value="Alta"> 10/10</option>
                                                    </select></div>

                                                <div class="form-group col-md-2"> HERRAMIENTAS O EQUIPO ADICIONAL
                                                    <input type="text" name="herramientas" class="form-control input-lg " style="width: 100%;">
                                                </div>
                                                <div class="form-group col-md-2"> COMENTARIOS
                                                    <textarea name="motivoConsulta" class="ejemplo" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                </div>

                                            </div>

                                            <div class="form-group col-md-12">
                                                <label align="center">Brazo izquierdo</label><br>


                                                <div class="form-group col-md-2"> PROFUNDIDAD DEL MASAJE<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> Baja</option>
                                                        <option value="Media"> Media</option>
                                                        <option value="Alta"> Alta</option>
                                                    </select></div>
                                                <div class="form-group col-md-2"> NIVEL DE DOLOR DE MASAJE<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> 1/10</option>
                                                        <option value="Media"> 2/10</option>
                                                        <option value="Alta"> 3/10</option>
                                                        <option value="Baja"> 4/10</option>
                                                        <option value="Media"> 5/10</option>
                                                        <option value="Alta"> 6/10</option>
                                                        <option value="Baja"> 7/10</option>
                                                        <option value="Media"> 8/10</option>
                                                        <option value="Alta"> 9/10</option>
                                                        <option value="Alta"> 10/10</option>
                                                    </select></div>

                                                <div class="form-group col-md-2"> INTENSIDAD DEL PERCUTOR<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> Baja</option>
                                                        <option value="Media"> Media</option>
                                                        <option value="Alta"> Alta</option>
                                                    </select></div>

                                                <div class="form-group col-md-2"> NIVEL DE DOLOR CON PERCUTOR<select name="profundidadmasaje" class="form-control input-lg select" style="width: 100%;">

                                                        <option value=""> Seleccione</option>
                                                        <option value="Baja"> 1/10</option>
                                                        <option value="Media"> 2/10</option>
                                                        <option value="Alta"> 3/10</option>
                                                        <option value="Baja"> 4/10</option>
                                                        <option value="Media"> 5/10</option>
                                                        <option value="Alta"> 6/10</option>
                                                        <option value="Baja"> 7/10</option>
                                                        <option value="Media"> 8/10</option>
                                                        <option value="Alta"> 9/10</option>
                                                        <option value="Alta"> 10/10</option>
                                                    </select></div>

                                                <div class="form-group col-md-2"> HERRAMIENTAS O EQUIPO ADICIONAL
                                                    <input type="text" name="herramientas" class="form-control input-lg " style="width: 100%;">
                                                </div>
                                                <div class="form-group col-md-2"> COMENTARIOS
                                                    <textarea name="motivoConsulta" class="ejemplo" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                </div>

                                            </div>-->
                                            <div class="box-body">


                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <table class="table" style="width: 100%">

                                                            <thead style="display: table-caption;">
                                                                <tr >
                                                                    <th width="10%">
                                                                        <label for="extremidades">Extremidades</label>

                                                                        <select id="extremidades" name="extremidades" class="form-control input-lg select">

                                                                            <option value=""> Seleccione</option>
                                                                            <option value="Brazo Derecho"> Brazo Derecho</option>
                                                                            <option value="Brazo Izquierdo"> Brazo Izquierdo</option>
                                                                            <option value="Espalda"> Espalda</option>
                                                                            <option value="Pecho"> Pecho</option>
                                                                            <option value="Pierna Derecha"> Pierna Derecha</option>
                                                                            <option value="Pierna Izquierda"> Pierna Izquierda</option>
                                                                            <option value="Muslo Derecho"> Muslo Derecho</option>
                                                                            <option value="Muslo Izquierdo"> Muslo Izquierdo</option>
                                                                            <option value="Pie Derecho"> Pie Derecho</option>
                                                                            <option value="Pie izquierdo"> Pie Izquierdo</option>
                                                                        </select>
                                                                    </th>
                                                                    <th  width="10%">
                                                                        <label for="profundidadmasaje">Profundidad del Masaje</label>
                                                                        <select name="profundidadmasaje" id="profundidadmasaje" class="form-control input-lg select">

                                                                            <option value=""> Seleccione</option>
                                                                            <option value="Baja"> Baja</option>
                                                                            <option value="Media"> Media</option>
                                                                            <option value="Alta"> Alta</option>
                                                                        </select>
                                                                    </th>
                                                                    <th width="10%">
                                                                        <label for="niveldolormasaje">Nivel Dolor del Masaje</label>
                                                                        <select name="niveldolormasaje" id="niveldolormasaje" class="form-control input-lg select">

                                                                            <option value=""> Seleccione</option>
                                                                            <option value="1/10"> 1/10</option>
                                                                            <option value="2/10"> 2/10</option>
                                                                            <option value="3/10"> 3/10</option>
                                                                            <option value="4/10"> 4/10</option>
                                                                            <option value="5/10"> 5/10</option>
                                                                            <option value="6/10"> 6/10</option>
                                                                            <option value="7/10"> 7/10</option>
                                                                            <option value="8/10"> 8/10</option>
                                                                            <option value="9/10"> 9/10</option>
                                                                            <option value="10/10"> 10/10</option>
                                                                        </select>
                                                                    </th>
                                                                    <th width="10%">
                                                                        <label for="intensidaddolor">Intensidad del Percutor</label>
                                                                        <select name="intensidaddolor" id="intensidaddolor" class="form-control input-lg select">

                                                                            <option value=""> Seleccione</option>
                                                                            <option value="1/30"> 1/30</option>
                                                                            <option value="2/30"> 2/30</option>
                                                                            <option value="3/30"> 3/30</option>
                                                                            <option value="4/30"> 4/30</option>
                                                                            <option value="5/30"> 5/30</option>
                                                                            <option value="6/30"> 6/30</option>
                                                                            <option value="7/30"> 7/30</option>
                                                                            <option value="8/30"> 8/30</option>
                                                                            <option value="9/30"> 9/30</option>
                                                                            <option value="10/30"> 10/30</option>

                                                                            <option value="11/30"> 11/30</option>
                                                                            <option value="12/30"> 12/30</option>
                                                                            <option value="13/30"> 13/30</option>
                                                                            <option value="14/30"> 14/30</option>
                                                                            <option value="15/30"> 15/30</option>
                                                                            <option value="16/30"> 16/30</option>
                                                                            <option value="17/30"> 17/30</option>
                                                                            <option value="18/30"> 18/30</option>
                                                                            <option value="19/30"> 19/30</option>
                                                                            <option value="20/30"> 20/30</option>

                                                                            <option value="21/30"> 21/30</option>
                                                                            <option value="22/30"> 22/30</option>
                                                                            <option value="23/30"> 23/30</option>
                                                                            <option value="24/30"> 24/30</option>
                                                                            <option value="25/30"> 25/30</option>
                                                                            <option value="26/30"> 26/30</option>
                                                                            <option value="27/30"> 27/30</option>
                                                                            <option value="28/30"> 28/30</option>
                                                                            <option value="29/30"> 29/30</option>
                                                                            <option value="30/30"> 30/30</option>
                                                                        </select>
                                                                    </th>
                                                                    <th  width="20%">
                                                                        <label for="nivelpercutor">Nivel Dolor del Percutor</label>

                                                                        <select id="nivelpercutor" name="nivelpercutor" class="form-control input-lg select">

                                                                            <option value=""> Seleccione</option>
                                                                            <option value="1/10"> 1/10</option>
                                                                            <option value="2/10"> 2/10</option>
                                                                            <option value="3/10"> 3/10</option>
                                                                            <option value="4/10"> 4/10</option>
                                                                            <option value="5/10"> 5/10</option>
                                                                            <option value="6/10"> 6/10</option>
                                                                            <option value="7/10"> 7/10</option>
                                                                            <option value="8/10"> 8/10</option>
                                                                            <option value="9/10"> 9/10</option>
                                                                            <option value="10/10"> 10/10</option>
                                                                        </select>
                                                                    </th>
                                                                    <th  width="20%">
                                                                        <label for="herramientas">Herramientas o Equipo Adicional</label>

                                                                        <input type="text" id="herramientas" name="herramientas" placeholder="Herramientas" style="width: 100%; height: 40px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;">
                                                                    </th>

                                                                </tr>

                                                                <tr>
                                                                    <th width="100%" colspan="6">


                                                                        <label for="comentarios">Comentarios Extremidades</label>
                                                                        <textarea name="comentariosextremidades" id="comentariosextremidades" class="ejemplo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                                    </th>
                                                                        </tr>
                                                                        <tr>
                                                                    


                                                                    <th colspan="6"><button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="addservicio()"><i class="fa fa-plus"></i> Agregar Extremidades</button></th>

                                                                </tr>


                                                            </thead>
                                                            <thead>
                                                                <tr>
                                                                    <th>Extremidades</th>
                                                                    <th>Profundidad Masaje</th>
                                                                    <th>Nivel Dolor Masaje</th>
                                                                    <th>Intensidad Percutor</th>
                                                                    <th>Nivel Dolor Percutor</th>
                                                                    <th>Herramientas</th>
                                                                    <th>Comentarios</th>


                                                                </tr>
                                                            </thead>
                                                            <tbody id="codeServicio">
                                                                <tr>
                                                                    <th>Extremidades</th>
                                                                    <th>Profundidad Masaje</th>
                                                                    <th>Nivel Dolor Masaje</th>
                                                                    <th>Intensidad Percutor</th>
                                                                    <th>Nivel Dolor Percutor</th>
                                                                    <th>Herramientas</th>
                                                                    <th>Comentarios</th>

                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <input type="hidden" name="servicioContent" id="servicioContent" value="" >
                                                <!-- este input se cambio a text pero con display none para el autoguardado -->
                                                <script type="text/javascript">
                                                    var servicioCache = [];
                                                    var servicioCompleto = [];

                                                    function addservicio() {
                                                        let extremidades = $("#extremidades").val();
                                                        let profundidadmasaje = $("#profundidadmasaje").val();
                                                        let niveldolormasaje = $("#niveldolormasaje").val();
                                                        let intensidaddolor = $("#intensidaddolor").val();
                                                        let nivelpercutor = $("#nivelpercutor").val();
                                                        let herramientas = $("#herramientas").val();
                                                        let comentarios = $("#comentariosextremidades").val();
                                                        servicioCompleto[servicioCompleto.length] = extremidades + "|" + profundidadmasaje + "|" + niveldolormasaje + "|" + intensidaddolor + "|" + nivelpercutor + "|" + herramientas + "|" + comentarios + "&nbsp;|&nbsp;";

                                                        servicioCache[servicioCache.length] = "<tr>" +
                                                            "<td > " + extremidades + " </td>" +
                                                            "<td > " + profundidadmasaje + " </td>" +
                                                            "<td > " + niveldolormasaje + " </td>" +
                                                            "<td > " + intensidaddolor + " </td>" +
                                                            "<td > " + nivelpercutor + " </td>" +
                                                            "<td > " + herramientas + " </td>" +
                                                            "<td > " + comentarios + " </td>";

                                                        var acum = 0;
                                                        var imprimir = "";
                                                        while (acum < servicioCache.length) {
                                                            imprimir += servicioCache[acum] + "<td > <i class='fa fa-trash' onclick='borrarservicio(" + acum + ")'></i></td>" +
                                                                "</tr>";
                                                            acum++;
                                                        }
                                                        document.getElementById("codeServicio").innerHTML = imprimir;
                                                        $("#servicioContent").val(servicioCompleto);
                                                        console.log($("#servicioContent").val());
                                                        console.log(servicioCache);
                                                        console.log(servicioCompleto);
                                                    }



                                                    function borrarservicio(e) {
                                                        servicioCache.splice(e, 1);
                                                        servicioCompleto.splice(e, 1);
                                                        var acum = 0;
                                                        var imprimir = "";
                                                        while (acum < servicioCache.length) {
                                                            imprimir += servicioCache[acum] + "<td > <i class='fa fa-trash' onclick='borrarservicio(" + acum + ")'></i></td>" +
                                                                "</tr>";
                                                            acum++;
                                                        }
                                                        document.getElementById("codeServicio").innerHTML = imprimir;
                                                        $("#servicioContent").val(servicioCompleto);
                                                        console.log($("#servicioContent").val());
                                                    }

                                                    function cargardatos(datos) {

                                                        
                                                            var lineas = datos.split('&nbsp;|&nbsp;');
                                                            var resultados = [];
                                                            
                                                            for (var i = 0; i < lineas.length; i++) {
                                                                var campos = lineas[i].split('|');
                                                                console.log(campos);
                                                                if(i>0){
                                                                    var extremidades = campos[0].slice(1);
                                                                }else{
                                                                    var extremidades = campos[0];
                                                                }
                                                                
                                                                var profundidadmasaje = campos[1];
                                                                var niveldolormasaje = campos[2];
                                                                var intensidaddolor = campos[3];
                                                                var nivelpercutor = campos[4];
                                                                var herramientas = campos[5];
                                                                var comentarios= campos[6];
                                                                
                                                                if (campos.length > 1) 
                                                                { 

                                                                    servicioCompleto[i] = extremidades + "|" + profundidadmasaje + "|" + niveldolormasaje + "|" + intensidaddolor + "|" + nivelpercutor + "|" + herramientas + "|" + comentarios + "&nbsp;|&nbsp;";
                                                                    
                                                                    servicioCache[i] = "<tr>" +
                                                                    "<td > " + extremidades + " </td>" +
                                                                    "<td > " + profundidadmasaje + " </td>" +
                                                                    "<td > " + niveldolormasaje + " </td>" +
                                                                    "<td > " + intensidaddolor + " </td>" +
                                                                    "<td > " + nivelpercutor + " </td>" +
                                                                    "<td > " + herramientas + " </td>" +
                                                                    "<td > " + comentarios + " </td>";

                                                                    var acum = 0;
                                                                    var imprimir = "";
                                                                    while (acum < servicioCache.length) {
                                                                        imprimir += servicioCache[acum] + "<td > <i class='fa fa-trash' onclick='borrarservicio(" + acum + ")'></i></td>" +
                                                                            "</tr>";
                                                                        acum++;
                                                                    }

                                                                }

                                                            }

                                                            document.getElementById("codeServicio").innerHTML = imprimir;
                                                            $("#servicioContent").val(servicioCompleto);



                                                    }
                                                </script>






                                                <div class="form-group col-md-12">
                                                    <div align="left">Comentarios</div>




                                                    <textarea name="comentariosgeneral" class="ejemplo" placeholder="Comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                </div>

                                                <div class="form-group col-md-12">
                                                    <div align="left"> Indicaciones Clínicas</div>




                                                    <textarea id="indicacionesclinicas" name="indicacionesclinicas" class="ejemplo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>





                                                </div>






                                            </div>
















                                            
                                                <section class="content" style="width: 100%;">
                                                    <div class="">
                                                        <div class="content">
                                                            <h4 class="Titulo_Pagina">Módulo Receta</h4>
                                                            <div class="box">
                                                                <div class="box-body">

                                                                    <?php
                                                                    $cliente_id = $clienteId;
                                                                    $usuario_id = $_SESSION['ID'];
                                                                    include 'RM_Receta.php'
                                                                    ?>

                                                                    <!-- <div class="col-md-12">
                                                                        <center id="Boton_Cerrar_Receta"><button type="button" onclick="CerrarRecetaMedica();" class="btn btn-block btn-primary btn-sm" style="background-color:#3cbc6d">Cerrar Receta Medica</button></center>
                                                                    </div>-->
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </section>
                                            















                                            <?php /*?>
                <div class="panel box box-success">
                                    <div class="box-header with-border">
                                        <h4 class="box-title">
                                            <a data-toggle="collapse" data-parent="#accordion"
                                               href="#collapse9">
                                                IX. Análisis y plan de tratamiento
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapse9" class="panel-collapse collapse">
                                        <div class="box-body">

                                            <div class="form-group col-md-12">
                              


                             <!-- <div align="right">
                              <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                              </div>-->


                              <textarea  id="analisis_tratamiento" name="analisis_tratamiento"  class="textarea" placeholder="Análisis y plan de tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>
                                            <!--<h4>Traslados (Neuromotricidad) </h4>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Dcp</label>
                                                    <br>
                                                    <input name="VIII_dcs_dcp" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_dcp" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_dcp" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>                        
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>4ptos-Rod:</label>
                                                    <br>
                                                    <input name="VIII_4ptos_Rod" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_4ptos_Rod" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_4ptos_Rod" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;" >
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-Dcl:</label>
                                                    <br>
                                                    <input name="VIII_dcp_dcl" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_dcl" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_dcl" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Rod-Marat:</label>
                                                    <br>
                                                    <input name="VIII_rod_marat" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_rod_marat" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_rod_marat" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcs-Sdt:</label>
                                                    <br>
                                                    <input name="VIII_dcs_sdt" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcs_sdt" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcs_sdt" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                              line-height: 18px; border: 1px solid #dddddd;
                                                              padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Marat-Bip:</label>
                                                    <br>
                                                    <input name="VIII_marat_bip" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_marat_bip" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_marat_bip" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Dcp-4ptos:</label>
                                                    <br>
                                                    <input name="VIII_dcp_4ptos" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_dcp_4ptos" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_dcp_4ptos" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Sdt-Bip:</label>
                                                    <br>
                                                    <input name="VIII_sdt_bip" value="Si" type="radio" class="flat-red">
                                                    <span>
                                                        Si
                                                    </span>
                                                    <input name="VIII_sdt_bip" value="No" type="radio" class="flat-red">
                                                    <span>
                                                        No
                                                    </span>
                                                </div>
                                                <div class="form-group">
                                                    <label class="control-label">Descripción</label>
                                                    <div class="form-group has-success">
                                                        <textarea class="textarea" name="VIII_descripcion_sdt_bip" placeholder="Por favor escriba el comentario aquí" style="width: 100%; height: 200px; font-size: 14px;
                                                                          line-height: 18px; border: 1px solid #dddddd;
                                                                          padding: 10px;">
                                                        </textarea>
                                                    </div>
                                                </div>
                                            </div>-->
                                        </div>
                                    </div>
                                </div>
                                <?php */ ?>
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                </div>
                                <!-- /.box -->
                            </div>

                            <!--<div class="col-md-12">
                    <div class="box box-solid">
                        <div class="box-body">
                            <div class="col-sm-12">
                                <div class="text-center">
                                    <label>
                                        <strong>Próxima consulta o cita (Solo si aplica)</strong>
                                    </label>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Fecha </label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="prox_cita_fecha" class="form-control pull-right" value="<?php echo date('Y-m-d'); ?>" id="datepicker">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Hora </label>
                                <div class="input-group clockpicker" data-autoclose="true">
                                    <input type="text" name="prox_cita_hora" class="form-control" value="<?php echo date('H:i'); ?>" >
                                    <span class="input-group-addon">
                                        <span class="fa fa-clock-o"></span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label>Motivo consulta</label>
                                <textarea class="textarea" name="motivo_consulta" placeholder="Por favor escriba el motivo de la consulta aquí" style="width: 100%; height: 200px; font-size: 14px;
                                          line-height: 18px; border: 1px solid #dddddd;
                                          padding: 10px;">
                                </textarea>
                            </div>
                            <div class="col-sm-6">
                                <label>Especialista </label>
                                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                                    <option value="Marcos Perez" selected="selected"></option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    &
                                    <br>
                                    <br>
                                    <input name="prox_cita_asistencia" value="presencial" type="radio" class="flat-red">
                                    <span>
                                        <i class="fa fa-user"></i> Presencial
                                    </span>
                                    <input name="prox_cita_asistencia" value="virtual" type="radio" class="flat-red">
                                    <span>
                                        <i class="fa fa-video-camera"></i> Virtual
                                    </span>
                                </div>
                            </div>-->






                            <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                            <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                            <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                            <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                            <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                            <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                            <input type="hidden" value="<?php echo $genero; ?>" name="genero" id="genero">




                            <div class="col-sm-12">
                                <br>
                                <br>
                                <center>
                                    <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                        <h2>
                                            <strong> G u a r d a r </strong>
                                        </h2>
                                    </button>
                                </center>

                            </div>
                            <input type="hidden" name="tipo_cliente" value="1">
                    </div>
                </div>
            </div>
            &nbsp;
            <br>
            <br>
            </form>















        </div>
</div>
<!-- /.box-body -->
</div>
<!-- /.box -->
</div>
<!-- /.col -->
</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>





<?php include("footer.php") ?>
<script src="<?php echo $Base ?>firma/js/signature_pad.umd.js"></script>
<script src="<?php echo $Base ?>firma/js/app.js"></script>
<script type="text/javascript">
    function cambiarColorSignature() {
        var get = document.getElementById('color').value;
        var get1 = document.getElementById('tool').value;

        if (get1 == '1') {
            signaturePad1.dotSize = 1;
        } else {
            signaturePad1.dotSize = 10;
        }

        var
            r = parseInt(get.slice(1, 3), 16),
            g = parseInt(get.slice(3, 5), 16),
            b = parseInt(get.slice(5, 7), 16);

        if (get1 == '1') {
            var color = "rgb(" + r + ", " + g + ", " + b + ")";
        } else {
            var color = "rgba(" + r + ", " + g + ", " + b + ",0.5)";
        }

        signaturePad1.penColor = color;
    }
</script>


<script type="text/javascript">
    var genero = $("#genero").val();
    var image;
    var image1 = 'ImagenesHistoria/hombre3.jpeg';
    var image2 = 'ImagenesHistoria/mujer3.jpeg';
    if (genero == 'M') {
        image = image1;
    } else {
        image = image2;
    }

    window.signaturePad1 = new SignaturePad($('#canvas1').get(0), {});

    const EL = (sel) => document.querySelector(sel);
    const canvasContext = EL("#canvas1").getContext("2d");

    var imagenHeight = document.getElementById('canvas1').clientHeight;
    console.log(imagenHeight);
    var imagenWidth = document.getElementById('canvas1').clientWidth;
    console.log(imagenWidth);
    var imagenTag = document.getElementById('fileUpload1');

    var canvasTag = document.getElementById('canvas1');

    imagenTag.setAttribute('width', imagenWidth);
    imagenTag.setAttribute('height', imagenHeight);
    canvasTag.setAttribute('width', imagenWidth);
    canvasTag.setAttribute('height', imagenHeight);




    function guardarTrazo() {
        var dataURL = signaturePad1.toDataURL();
        document.getElementById("tarea").value = dataURL;
    }

    function clearFileInput(ctrl) {
        try {
            ctrl.value = null;
        } catch (ex) {}
        if (ctrl.value) {
            ctrl.parentNode.replaceChild(ctrl.cloneNode(true), ctrl);
        }
    }

    function clear1() {

        window.signaturePad1.clear();
        clearFileInput(document.getElementById("fileUpload1"));

        base_image = new Image();

        base_image.src = image;



        base_image.onload = function() {
            canvasContext.clearRect(base_image, 0, 0, 99999999999, 99999999999);
            canvasContext.drawImage(base_image, 0, 0, imagenWidth, imagenHeight);
        }


    }



    console.log("ready!");
    clear1();






    function readImage1() {
        if (!this.files || !this.files[0]) return;

        const FR = new FileReader();
        FR.addEventListener("load", (evt) => {
            const img = new Image();
            img.addEventListener("load", () => {
                var imagenW = img.width;
                var imagenH = img.height;
                // ajustamos la altura del canva segun la imagen
                var ratio = imagenW / imagenH;
                if (ratio > 1) {
                    imagenWidth2 = imagenWidth;
                    //imagenHeight = imagenHeight/ratio;  
                } else {
                    imagenWidth2 = imagenWidth * ratio;
                    //imagenHeight = imagenHeight;
                }
                canvasContext.clearRect(img, 0, 0, 99999999999, 99999999999);
                canvasContext.drawImage(img, 0, 0, imagenWidth2, imagenHeight);
                canvasContext.clearRect(0, 0, canvasContext.width, canvasContext.height);
                canvasContext.beginPath(); //ADD THIS LINE!<<<<<<<<<<<<<
                canvasContext.moveTo(0, 0);
                canvasContext.lineTo(event.clientX, event.clientY);
                canvasContext.stroke();

            });
            img.src = evt.target.result;
        });
        FR.readAsDataURL(this.files[0]);
    }

    EL("#fileUpload1").addEventListener("change", readImage1);
</script>





<script type="text/javascript">
    window.onload = () => {


        const llenarSelectConDispositivosDisponibles = () => {

            navigator
                .mediaDevices
                .enumerateDevices()
                .then(function(dispositivos) {
                    const dispositivosDeVideo = [];
                    dispositivos.forEach(function(dispositivo) {
                        const tipo = dispositivo.kind;
                        if (tipo === "videoinput") {
                            dispositivosDeVideo.push(dispositivo);
                        }
                    });

                    // Vemos si encontramos algún dispositivo, y en caso de que si, entonces llamamos a la función
                    if (dispositivosDeVideo.length > 0) {
                        // Llenar el select
                        dispositivosDeVideo.forEach(dispositivo => {
                            const option = document.createElement('option');
                            option.value = dispositivo.deviceId;
                            option.text = dispositivo.label;
                            listaDeDispositivos.appendChild(option);
                            console.log("$listaDeDispositivos => ", listaDeDispositivos)
                        });
                    }
                });
        }

        llenarSelectConDispositivosDisponibles();

    };

    //procedimiento para el icono/boton que se llama subir foto de perfil/ soluciona la toma de fotos en telefono
    //ya que este iinput reemplazara al otro modulo de camara ya que no funciona correctamente en telefonos
    //este no tiene la misma funcionalidad en pc.
    document.getElementById("file-input").onchange = function(e) {

        document.getElementById('visualizar').style.display = "block";

        document.getElementById('theCanvas').style.display = "none";
        document.getElementById('theVideo').style.display = "none";
        document.getElementById('foto').value = "";
        // Creamos el objeto de la clase FileReader
        let reader = new FileReader();
        // Leemos el archivo subido y se lo pasamos a nuestro fileReader
        reader.readAsDataURL(e.target.files[0]);
        // Le decimos que cuando este listo ejecute el código interno
        reader.onload = function() {
            let visualizar = document.getElementById('visualizar'),
                image = document.createElement('img');
            image.src = reader.result;
            visualizar.innerHTML = '';
            visualizar.append(image);
        };
    }
    document.getElementById("modulo_foto").onmouseover = function(e) {
        if (document.getElementById('foto_mostrada').value != "Mostrada") {
            $("#myModal").modal();
            document.getElementById('foto_mostrada').value = "Mostrada";
        }

    }

    function Camara(valor) {

        document.getElementById('visualizar').style.display = "none";
        document.getElementById('file-input').value = "";

        if (document.getElementById('theVideo').style.display == "none") {
            document.getElementById('theVideo').style.display = "block";
        }

        var videoWidth = 800;
        var videoHeight = 800;
        var videoTag = document.getElementById('theVideo');
        var canvasTag = document.getElementById('theCanvas');
        var btnCapture = document.getElementById("btnCapture");
        var btnRemove = document.getElementById("btnRemove");
        var btnDownloadImage = document.getElementById("btnDownloadImage");
        videoTag.setAttribute('width', videoWidth);
        videoTag.setAttribute('height', videoHeight);
        canvasTag.setAttribute('width', videoWidth);
        canvasTag.setAttribute('height', videoHeight);

        navigator.mediaDevices.getUserMedia({
            audio: false,
            video: {
                width: videoWidth,
                height: videoHeight,
                deviceId: valor
            }
        }).then(stream => {
            videoTag.srcObject = stream;
        }).catch(e => {
            document.getElementById('errorTxt').innerHTML = 'ERROR: ' + e.toString();
        });

        var canvasContext = canvasTag.getContext('2d');
        btnCapture.addEventListener("click", () => {

            if (document.getElementById('visualizar').style.display == "block") {
                document.getElementById('visualizar').style.display = "none";
                document.getElementById('file-input').value = "";
            }

            canvasContext.drawImage(videoTag, 0, 0, videoWidth, videoHeight);
            document.getElementById('foto').value = canvasTag.toDataURL();
            document.getElementById('theCanvas').style.display = "block";
            document.getElementById('theVideo').style.display = "none";
            //captura(canvasTag.toDataURL());
        });
        /*
        btnDownloadImage.addEventListener("click", () => {
            var link = document.createElement('a');
            link.download = 'capturedImage.png';
            link.href = canvasTag.toDataURL();
            link.click();
        });
        */
        btnRemove.addEventListener("click", () => {

            if (document.getElementById('visualizar').style.display == "block") {
                document.getElementById('visualizar').style.display = "none";
                document.getElementById('file-input').value = "";
            }

            document.getElementById('theCanvas').style.display = "none";
            document.getElementById('theVideo').style.display = "block";
            document.getElementById('foto').value = "";
        });
    }
</script>

<script type="text/javascript">
    const EL = (sel) => document.querySelector(sel);
    const canvasContext = EL("#canvas1").getContext("2d");

    var imagenHeight = document.getElementById('canvas1').clientHeight;
    console.log(imagenHeight);
    var imagenWidth = document.getElementById('canvas1').clientWidth;
    console.log(imagenWidth);
    var imagenTag = document.getElementById('fileUpload1');

    var canvasTag = document.getElementById('canvas1');

    imagenTag.setAttribute('width', imagenWidth);
    imagenTag.setAttribute('height', imagenHeight);
    canvasTag.setAttribute('width', imagenWidth);
    canvasTag.setAttribute('height', imagenHeight);



    function readImage1() {
        if (!this.files || !this.files[0]) return;

        const FR = new FileReader();
        FR.addEventListener("load", (evt) => {
            const img = new Image();
            img.addEventListener("load", () => {
                var imagenW = img.width;
                var imagenH = img.height;
                // ajustamos la altura del canva segun la imagen
                //document.getElementById("canvas2").style.height = imagenH ;
                var ratio = imagenW / imagenH;
                if (ratio > 1) {
                    imagenWidth2 = imagenWidth;
                    //imagenHeight = imagenHeight/ratio;  
                } else {
                    imagenWidth2 = imagenWidth * ratio;
                    //imagenHeight = imagenHeight;
                }
                canvasContext.clearRect(img, 0, 0, 99999999999, 99999999999);
                canvasContext.drawImage(img, 0, 0, imagenWidth2, imagenHeight);
                canvasContext.clearRect(0, 0, canvasContext.width, canvasContext.height);
                canvasContext.beginPath(); //ADD THIS LINE!<<<<<<<<<<<<<
                canvasContext.moveTo(0, 0);
                canvasContext.lineTo(event.clientX, event.clientY);
                canvasContext.stroke();

            });
            img.src = evt.target.result;
        });
        FR.readAsDataURL(this.files[0]);
    }
    EL("#fileUpload1").addEventListener("change", readImage1);
</script>

<script>
    function calculardosis() {
        m1 = document.getElementById("frecuencia").value;
        m2 = document.getElementById("administracion").value;
        m3 = document.getElementById("dias").value;

        if (m2 == "Horas") {


            r = 24 / m1;



            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Minutos") {


            r = 1440 / m1;



            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Dias") {


            r = 1 / m1;



            document.getElementById("dosisdia").value = r;


        }


        if (m2 == "Semana") {

            a = 7 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Mes") {

            a = 30 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }

        if (m2 == "Ano") {

            a = 365 * m1;
            r = 1 / a;


            document.getElementById("dosisdia").value = r;


        }


        if (m2 == "Unica") {



            r = "&uacutenica Dosis";


            document.getElementById("dosisdia").value = r;


        }

        rt = r * m3;
        document.getElementById("total").value = rt;


    }




    function agergarItem() {
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

        var dosis = $("#dosis").val();
        var posologia = $("#posologia").val();
        var frecuencia = $("#frecuencia").val();
        var administracion = $("#administracion").val();
        var dosisdia = $("#dosisdia").val();
        var dias = $("#dias").val();
        var via = $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val();
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota2 = $("#nota2").val();
        var cantidad = $("#cantidad").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {
                codigoProd: codigoProd,
                dosis: dosis,
                posologia: posologia,
                frecuencia: frecuencia,
                administracion: administracion,
                dosisdia: dosisdia,
                dias: dias,
                via: via,
                total: total,
                nota: nota,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta,
                codigoProd1: codigoProd1,
                nota2: nota2,
                cantidad: cantidad
            },
            success: function(response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#dosisdia').val('');
                $('#dias').val('');
                $('#via').val('');
                $('#total').val('');
                $('#nota').val('');
                $('#cantidad').val('');

                $('#codigoProd').val('');
                $('#codigoProd1').val('');
                $('#nota').val('');
                $('#nota2').val('');

                $('#div-results').html(response);

                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };

    function eliminarItem1() {
        // estas son las variables que enviamos
        var idOper = $("#idOper1").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

    function eliminarItem2() {
        // estas son las variables que enviamos
        var idOper = $("#idOper2").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

    function eliminarItem3() {
        // estas son las variables que enviamos
        var idOper = $("#idOper3").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

    function eliminarItem4() {
        // estas son las variables que enviamos
        var idOper = $("#idOper4").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };


    function eliminarItem5() {
        // estas son las variables que enviamos
        var idOper = $("#idOper5").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };



    function eliminarItem6() {
        // estas son las variables que enviamos
        var idOper = $("#idOper6").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {
                idOper: idOper,
                usuario_id: usuario_id,
                idcliente: idcliente,
                idReceta: idReceta
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

    function listaItem() {
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results').html(response);
                // aqui enviamos el mensaje por medio de un arreglo     

            }
        });
    };

    function verlista() {

        var clienteId = $("#clienteId").val();
        var name = $("#name1").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista1.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results1').html(response);

            }
        });
    };


    function verlista2() {

        var clienteId = $("#clienteId2").val();
        var name = $("#name2").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista1.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results2').html(response);

            }
        });
    };



    function verlista3() {

        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista1.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results3').html(response);

            }
        });
    };



    function verlista4() {

        var clienteId = $("#clienteId4").val();
        var name = $("#name4").val();



        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista1.php",
            data: {
                clienteId: clienteId,
                name: name
            },
            success: function(response) {
                $('#div-results4').html(response);

            }
        });
    };
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/['|]/g, ''));
  });
</script>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php 
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];

$Nombre_Tabla_autoguardado = "Historia_Clinica_Fisioterapia_1";//nombre de la tabla de la base de datos de la historia
$FiltroPersonalizado_AutoGuardado="Fisioterapia_1";//este se usa para filtrar dentro del autoguardado

include 'AutoGuardados/Fisioterapia_1/AutoGuardado_Historia_Fisioterapia.php';//usar esta si es necesario modificar el codigo del autoguardado
//include 'AutoGuardado_Historia.php';//usar esta si no tienen que modificar el archivo y la ruta no tiene el get codificado

?>