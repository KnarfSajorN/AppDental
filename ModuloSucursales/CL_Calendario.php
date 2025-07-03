<?php
include 'header.php';
include 'menu.php';
?>

<link rel="stylesheet" href="plugins/FullCalendarK/Fullcalendar.min.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li class="active">Calendario </li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-3">
                <h4 class="Titulo_Pagina">Calendario</h4>

                <form action="CL_GuardarCita.php" method="POST" name="formularioActualizarcliente">
                    <div class="box box-body">


                        <div class="form-group col-md-12">
                            <div align="left"><strong>Usuario</strong></div>
                            <select id="doctor" name="doctor" class="select2 form-control input-lg" style="width: 100%;" required onchange="CambiarMedico(1)">
                                <option value="" selected>Selecione...</option>
                                <?php
                                usuariosEspecialistasSelect();
                                ?>
                            </select>
                        </div>

                        <div id="div_fecha" class="form-group col-md-12" style="display:none;">
                            <div align="left"><strong>Fecha</strong></div>
                            <input type="date" class="form-control input-lg" name="fecha" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia(1);" required>
                            <div id="div-results"></div>
                        </div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Pacientes</strong></div>
                            <select id="clienteId" name="clienteId" class="form-control select2" style="width: 100%;" onChange="verificarCliente();" required>
                                <option value="" selected="selected">Seleccione un paciente ...</option>
                                <?php
                                $queryList = mysqli_query($conn3, "SELECT * FROM  cliente WHERE sucursal = '{$sucursal}' order by cliente_id");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                    $cod = $row_recordset32A['cliente_id'];
                                    $nombre = $row_recordset32A['nombre_cliente'];

                                    echo "<option value='$cod'> $nombre </option>";
                                }
                                ?>
                                <option value='0'> Paciente no Registrado </option>
                            </select>
                        </div>

                        <div class="col-md-12" id="div-resultsCliente"></div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Tiempo de Cita</strong></div>
                            <select id="duracion" name="duracion" class="form-control select2" data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
                                <option value="<?php echo $duracion ?>"> <?php echo categoria($duracion) ?> </option>
                                <option>5</option>
                                <option>10</option>
                                <option>15</option>
                                <option>20</option>
                                <option>30</option>
                                <option>45</option>
                                <option>60</option>
                                <option>80</option>
                                <option>120</option>
                            </select>
                        </div>
                        
                        <div class="form-group col-md-12">
                            <div align="left">
                            <strong>Servicios</strong>
                            </div>
                            <select id="servicios" name="servicios" class="form-control select2" style="width: 100%;" required>
                            <option value="" selected>Seleccione</option>
                            <?php
                            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                            echo selectMaster("where usuario_id = {$ID} AND sucursal='{$sucursal}'", "ID", "referencia,descripcion", "sinvetrios");
                            ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Notas</strong></div>
                            <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="....." >
                        </div>

                        <div class="form-group col-md-12" align="center">
                            <label>
                                <input type="radio" name="P" value="0" class="flat-red" checked>
                                <i class="fa fa-user"></i> Presencial

                                <input type="radio" name="P" value="1" class="flat-red">
                                <i class="fa fa-video-camera"></i> Virtual
                            </label>
                        </div>

                        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="sucursal" id="sucursal" value='<?= $_SESSION["sucursal"]; ?>'>
                        

                        <div align="center">
                            <div id="div-resultsHora"></div>
                        </div>

                        <div class="row" style="padding-top: 20px;">
                            <div class="col-md-3 col-sm-12" align="center">
                                <i class="fa fa-video-camera" aria-hidden="true"> Virtual </i>
                            </div>
                            <div class="col-md-3 col-sm-12" align="center">
                                <i class="fa fa-user" aria-hidden="true"> Presencial </i>
                            </div>

                            <div class="col-md-3 col-sm-12" align="center">
                                <i class="fa fa-image-portrait" aria-hidden="true"> Registrado </i>
                            </div>

                            <div class="col-md-3 col-sm-12" align="center">
                                <i class="fa fa-circle-check" aria-hidden="true" style="color:green"> Confirmado </i>
                            </div>
                        </div>

                        <div class="row" style="padding-top: 20px;">
                            <div class="col-md-4 col-sm-12" align="center">
                                <i class="fa fa-circle" aria-hidden="true" style="color:#3c8dbc"> Citado </i>
                            </div>
                            <div class="col-md-4 col-sm-12" align="center">
                                <i class="fa fa-circle" aria-hidden="true" style="color:green"> Confirmado </i>
                            </div>

                            <div class="col-md-4 col-sm-12" align="center">
                                <i class="fa fa-circle" aria-hidden="true" style="color:red"> Cancelado </i>
                            </div>
                        </div>

                    </div>

                </form>



                <br><br><br>
                <a class="btn btn-block btn-primary btn-sm" href="https://medicalsoftplus.com/pe732/nuevoPaciente?calendario=1">
                    <h4>Registrar Paciente </h4>
                </a>

            </div>

            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <?php if ($_SESSION['ID'] == '1') : ?>
                            <div class="container-fluid">
                                <div align="left">Calendario de:</div>
                                <select name="calendario_usuario" id="calendario_usuario" class="form-control select2" style="width:100%;color:black" onchange="if(this.value!=''){window.location='CL_Calendario.php?usuario_id='+this.value}else{window.location='CL_Calendario.php';}">
                                    <?php $nombreusuario = funcionMaster($_GET["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                    $idusuario = $_GET['usuario_id'];

                                    if ($_GET['usuario_id'] <> "") {

                                        echo "<option value='$idusuario' selected>$nombreusuario</option>";
                                        echo "<option value=''>Todos</option>";
                                    } else {
                                        echo "<option value='' selected>Todos</option>";
                                    }
                                    usuariosEspecialistasSelect();
                                    ?>
                                </select>
                            </div>
                        <?php endif; ?>

                        <div id="calendar"></div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /. box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>

<!-- Modal -->
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agendamiento de Cita</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="CL_GuardarCita.php" method="POST" class="form-horizontal">

                    <input type="hidden" id="FechaInicio" />
                    <input type="hidden" id="FechaFinal" />
                    <input type="hidden" id="HoraInicio" />
                    <input type="hidden" id="HoraFinal" />


                    <div class="form-group col-md-12">
                        <div align="left"><strong>Usuario</strong></div>
                        <select id="doctor_modal" name="doctor" class="select2 form-control input-lg" style="width: 100%;" required onchange="CambiarMedico_modal()">
                            <option value="" selected>Selecione...</option>
                            <?php
                            usuariosEspecialistasSelect();
                            ?>
                        </select>
                    </div>

                    <div id="div_fecha_modal" class="form-group col-md-12" style="display:none;">
                        <div align="left"><strong>Fecha</strong></div>
                        <input type="date" class="form-control input-lg" name="fecha" id="fecha_modal" min="<?php echo date('Y-m-d') ?>" onChange="verDia_modal();" required>
                        <div id="div-results_modal"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <div align="left"><strong>Pacientes</strong></div>
                        <select id="clienteId_modal" name="clienteId" class="form-control select2" style="width: 100%;" onChange="verificarCliente_modal();" required>
                            <option value="" selected="selected">Seleccione un paciente ...</option>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente AND sucursal='{$sucursal}'");
                            $nrowl = mysqli_num_rows($queryList);
                            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                $cod = $row_recordset32A['cliente_id'];
                                $nombre = $row_recordset32A['nombre_cliente'];

                                echo "<option value='$cod'> $nombre </option>";
                            }
                            ?>
                            <option value='0'> Paciente no Registrado </option>
                        </select>
                    </div>

                    <div class="col-md-12" id="div-resultsCliente_modal"></div>

                    <div class="form-group col-md-12">
                        <div align="left"><strong>Tiempo de Cita</strong></div>
                        <select id="duracion_modal" name="duracion" class="form-control select2" data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
                            <option value="<?php echo $duracion ?>"> <?php echo categoria($duracion) ?> </option>
                            <option>5</option>
                            <option>10</option>
                            <option>15</option>
                            <option>20</option>
                            <option>30</option>
                            <option>45</option>
                            <option>60</option>
                            <option>80</option>
                            <option>120</option>
                        </select>
                    </div>

                        <div class="form-group col-md-12">
                            <div align="left">
                            <strong>Servicios</strong>
                            </div>
                            <select id="servicios" name="servicios" class="form-control select2" style="width: 100%;" required>
                            <option value="" selected>Seleccione</option>
                            <?php
                            //where / value del option (si se quiere mas de un valor separarlo por ,) / texto del option (si se quiere mas de un valor separarlo por ,)/ tabla
                            echo selectMaster("where usuario_id = {$ID} AND sucursal='{$sucursal}'", "ID", "referencia,descripcion", "sinvetrios");
                            ?>
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Notas</strong></div>
                            <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder=".....">
                        </div>

                    <div class="form-group col-md-12" align="center">
                        <label>
                            <input type="radio" name="P" value="0" class="flat-red" checked>
                            <i class="fa fa-user"></i> Presencial

                            <input type="radio" name="P" value="1" class="flat-red">
                            <i class="fa fa-video-camera"></i> Virtual
                        </label>
                    </div>

                    <input type="hidden" name="usuario_id" id="usuario_id_modal" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="sucursal" id="sucursal" value='<?= $_SESSION["sucursal"]; ?>'>

                    <div align="center">
                        <div id="div-resultsHora_modal"></div>
                    </div>

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body">
                    <div id="descripcionEvento">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
                </div>
            </form>
        </div>
    </div>
</div>


<style>
    .fc-nonbusiness {
        background-color: #ffc4c4 !important;
    }

    .fc-content,
    i {
        padding-right: 5px;
    }

    .fc-content>.fa-circle-check {
        color: #83ed83;
    }
</style>
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<script src="plugins/select2/select2.full.min.js"></script>
<script>
    $(function() {
        //Initialize Select2 Elements
        $(".select2").select2();
    });
</script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<script src="plugins/FullCalendarK/Moment.min.js"></script>
<script src='plugins/FullCalendarK/Fullcalendar.min.js'></script>
<script src='plugins/FullCalendarK/Locale_es-us.js'></script>

</link>


<script>
    $(document).ready(function() {
        var calendar = $('#calendar').fullCalendar({
            lang: 'es',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,basicWeek,agendaDay'
            },
            buttonText: {
                today: 'Dia Actual',
                month: 'Mes',
                week: 'Semana',
                day: 'Dia'
            },
            slotDuration: '00:15:00',
            
            editable: false,
            selectable: true,
            businessHours: [
                <?php

                if ($_GET['usuario_id'] <> "") {
                    $usuario_id = $_GET['usuario_id'];
                    
                    $sucursal = funcionMaster($usuario_id, "ID", "sucursal", "usuarios");

                    if($sucursal=="0"){
                        $query = "SELECT * FROM  config where ID_Usuario = '{$usuario_id}'";
                    }
                    else{
                        $query = "SELECT * FROM  Horario_Sistema where usuario_id=$usuario_id AND sucursal_id=$sucursal limit 1";
                    }
                    
                    function min_horario($hora1, $hora2) {
                        if ($hora1 < $hora2) {
                            return $hora1;
                        } else {
                            return $hora2;
                        }
                    }

                    function max_horario($hora1, $hora2) {
                        if ($hora1 > $hora2) {
                            return $hora1;
                        } else {
                            return $hora2;
                        }
                    }

                    $queryList = mysqli_query($conn3, $query);
                    //$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '{$usuario_id}' ");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $HorasLaborales[1][1] = $rowMotorizado['ld'];
                        $HorasLaborales[2][1] = $rowMotorizado['md'];
                        $HorasLaborales[3][1] = $rowMotorizado['ed'];
                        $HorasLaborales[4][1] = $rowMotorizado['jd'];
                        $HorasLaborales[5][1] = $rowMotorizado['vd'];
                        $HorasLaborales[6][1] = $rowMotorizado['sd'];
                        $HorasLaborales[7][1] = $rowMotorizado['dd'];

                        $HorasLaborales[1][2] = $rowMotorizado['lh'];
                        $HorasLaborales[2][2] = $rowMotorizado['mh'];
                        $HorasLaborales[3][2] = $rowMotorizado['eh'];
                        $HorasLaborales[4][2] = $rowMotorizado['jh'];
                        $HorasLaborales[5][2] = $rowMotorizado['vh'];
                        $HorasLaborales[6][2] = $rowMotorizado['sh'];
                        $HorasLaborales[7][2] = $rowMotorizado['dh'];

                        $HorasLaborales[1][3] = $rowMotorizado['ldp'];
                        $HorasLaborales[2][3] = $rowMotorizado['mdp'];
                        $HorasLaborales[3][3] = $rowMotorizado['edp'];
                        $HorasLaborales[4][3] = $rowMotorizado['jdp'];
                        $HorasLaborales[5][3] = $rowMotorizado['vdp'];
                        $HorasLaborales[6][3] = $rowMotorizado['sdp'];
                        $HorasLaborales[7][3] = $rowMotorizado['ddp'];

                        $HorasLaborales[1][4] = $rowMotorizado['lhp'];
                        $HorasLaborales[2][4] = $rowMotorizado['mhp'];
                        $HorasLaborales[3][4] = $rowMotorizado['ehp'];
                        $HorasLaborales[4][4] = $rowMotorizado['jhp'];
                        $HorasLaborales[5][4] = $rowMotorizado['vhp'];
                        $HorasLaborales[6][4] = $rowMotorizado['shp'];
                        $HorasLaborales[7][4] = $rowMotorizado['dhp'];

                        $HorasLaborales[1][5] = $rowMotorizado['lt'];
                        $HorasLaborales[2][5] = $rowMotorizado['tp'];
                        $HorasLaborales[3][5] = $rowMotorizado['et'];
                        $HorasLaborales[4][5] = $rowMotorizado['jt'];
                        $HorasLaborales[5][5] = $rowMotorizado['vt'];
                        $HorasLaborales[6][5] = $rowMotorizado['st'];
                        $HorasLaborales[7][5] = $rowMotorizado['dt'];

                        $horaminimaTotal="24";
                        $horamaximaTotal="0";

                        foreach ($HorasLaborales as $key => $value) {
                            //dividir la cadena cuando esta el caracter :
                            $hora1 = explode(":", $value[1]);
                            $hora2 = explode(":", $value[2]);
                            $hora3 = explode(":", $value[3]);
                            $hora4 = explode(":", $value[4]);

                             //funcion para hallar la minima y maxima de los minutos
                             

                            //funcion para hallar la hora minima y maxima
                            $horaminima = min_horario($hora1[0], $hora3[0]);  
                            $horamaxima = max_horario($hora2[0], $hora4[0]);

                           

                            $horaminimaTotal = min_horario($horaminimaTotal, $horaminima);
                            $horamaximaTotal = max_horario($horamaximaTotal, $horamaxima);
                            ?>//<?= $horaminimaTotal ?><?php

                            
                            if ($value[5] == "0") {
                ?>

                                {
                                    dow: [<?php echo $key; ?>], // Bucle Dias
                                    start: '00:00:00',
                                    end: '00:00:00'
                                },

                            <?php
                            } else {
                            ?>

                                {
                                    dow: [<?php echo $key; ?>], // Bucle Dias
                                    start: '<?php echo $value[1]; ?>',
                                    end: '<?php echo $value[2]; ?>'
                                },
                                {
                                    dow: [<?php echo $key; ?>], // Bucle Dias
                                    start: '<?php echo $value[3]; ?>',
                                    end: '<?php echo $value[4]; ?>'
                                },

                <?php
                            }
                        }
                    }
                } else {
                    $usuario_id = $_SESSION["ID"];
                }
                ?>

            ],
            minTime:"<?= $horaminimaTotal;?>:00:00", // hora minima
            maxTime:"<?= $horamaximaTotal;?>:00:00", // hora maxima
            events: [
                <?php

                date_default_timezone_set("America/Bogota");

                $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and doctor = $usuario_id order by fecha asc ");
                $nrowl = mysqli_num_rows($queryList);
                while ($RowCitas = mysqli_fetch_array($queryList)) {
                    $idCitas = $RowCitas['idCitas'];
                    $usuario_id_asignado = $RowCitas["usuario_id"];
                    $idCliente = $RowCitas["idCliente"];

                    $Nombre = $RowCitas["nombre"];
                    $MotivoConsulta = $RowCitas["motivoConsulta"];
                    // filtrar comillas simples y dobles para evitar errores
                    $MotivoConsulta = str_replace("'", "", $MotivoConsulta);

                    $Fecha = $RowCitas["fecha"];
                    $Hora = $RowCitas["Hora"];
                    $Duracion = $RowCitas["duracion"];

                    $mi_fecha_cita = date("{$Fecha} {$Hora}");
                    $nueva_fecha_cita = strtotime("+{$Duracion} minute", strtotime($mi_fecha_cita));
                    $nueva_fecha_cita = date('Y-m-d H:i:s', $nueva_fecha_cita);

                    $TipoCita = $RowCitas["tipo"];
                    $Estado = $RowCitas["estado"];


                    if ($TipoCita == 0) {
                        $icono = "fa-user";
                    } elseif ($TipoCita == 1) {
                        $icono = "fa-video-camera";
                    }
                    else{
                        $icono = "fa-exclamation-circle";
                    }

                    if ($Estado == 1) {
                        $icono1 = "fa-image-portrait";
                        $color="#3c8dbc";
                    } elseif ($Estado == 2) {
                        $icono1 = "fa-circle-check";
                        $color="green";
                    } elseif ($Estado == 3) {
                        $icono1 = "fa-user-check";
                        $color="blue";
                    } elseif ($Estado == 4) {
                        $icono1 = "fa-user-xmark";
                        $color="blue";
                    }
                    elseif ($Estado == 0) {
                        $icono1 = "fa-user-xmark";
                        $color="red";
                    }
                    else{
                        $icono = "fa-exclamation-circle";
                    }

                    $servicios = $RowCitas["servicios"];
                    //usar la funcion funcionMaster para obtener el nombre del servicio con la variable servicio traer el nombre
                    $servicio_Nombre = funcionMaster($servicios,'ID','descripcion','sinvetrios');

                    
                    $usuario_nombre = funcionMaster($usuario_id_asignado, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                    if ($idCliente <> "0") {
                        $texto = "<div class='form-group col-md-3'> <a href='Historial_Clinico.php?clienteId={$idCliente}'target='blank' class='btn btn-block btn-primary btn-sm'> Ver Historial </a> </div>";
                        $texto .= "<div class='form-group col-md-3'> <a href='agregarCitas?editar_cita='{$idCitas}' target='blank' class='btn btn-block btn-primary btn-sm'> Editar </a> </div>";
                        $texto .= "<div class='form-group col-md-3'> <a href='SclienteAdministracion_ControlPresupuesto?clienteId={$idCliente}' target='blank' class='btn btn-block btn-primary btn-sm'> Ver Presupuesto </a> </div>";
                        $texto .= "<div class='form-group col-md-3'> <a href='Historia_Clinica.php?clienteId={$idCliente}'target='blank' class='btn btn-block btn-primary btn-sm'> Agregar Historia </a> </div>";
                        $texto .= "<br><br> <label> Paciente: </label> {$Nombre}<br> <label> Fecha y Hora de la cita: </label> {$Fecha} {$Hora} <br> <label> Duracion: </label> {$Duracion} Minutos <br> <label> Cita Asignada por: </label> {$usuario_nombre} <br> <label> Notas: </label> {$MotivoConsulta} <br> <label> Servicios: </label> {$servicio_Nombre} <br>";
                    } else {
                        $texto = "<div class='form-group col-md-12'> <a href='#' target='blank' class='btn btn-block btn-primary btn-sm'> Crear Paciente en el Sistema </a> </div>";
                        $texto .= "<br><br> <label> Paciente: </label> {$Nombre}<br> <label> Fecha y Hora de la cita: </label> {$Fecha} {$Hora} <br> <label> Duracion: </label> {$Duracion} Minutos <br> <label> Cita Asignada por: </label> {$usuario_nombre} <br> <label>Notas: </label> {$MotivoConsulta} <br> <label> Servicios: </label> {$servicio_Nombre} <br>";
                    }
                    $texto .= "{$Duracion} - {$nueva_fecha_cita}";

                    if ($Estado == '1') {
                        $texto .= "<br><a href='CL_Acciones.php?idCitas={$idCitas}&Tipo=Confirmar'><button type='button' class='btn btn-block btn-success btn-sm'>Confirmar</button></a>";
                    }
                    if ($Estado == '2') {
                        $texto .= "<br><a href='CL_Acciones.php?idCitas={$idCitas}&Tipo=Asistio'><button type='button' class='btn btn-block btn-primary btn-sm'>Asistió</button></a>";
                    }
                    if ($Estado == '3') {
                        $texto .= "<br><button type='button' class='btn btn-block btn-primary btn-sm'>Asistida</button></a>";
                    }
                    if ($Estado == '4') {
                        $texto .= "<br><button type='button' class='btn btn-block btn-warning btn-sm'>No Asistida</button></a> ";
                    }

                ?> {
                        title: '<?php echo $Nombre . ' - ' . $MotivoConsulta; ?>', // a property!
                        start: '<?php echo $mi_fecha_cita; ?>', // a property!
                        end: '<?php echo $nueva_fecha_cita ?>',
                        icon: '<?php echo $icono ?>',
                        icon1: '<?php echo $icono1 ?>',
                        color: '<?php echo $color ?>',
                        descripcion: "<?php echo $texto; ?>"
                    },
                <?php
                }
                ?>
            ],
            eventRender: function(event, element, view) {
                var i = document.createElement('i');
                // Add all your other classes here that are common, for demo just 'fa'
                i.className = 'fa'; /*'ace-icon fa yellow bigger-250 '*/
                i.classList.add(event.icon);
                // If you want it inline with title
                element.find('div.fc-content').prepend(i);
                // If you want it on a line before
                // element.prepend(i);
                // Or the next line after title
                //element.append(i)

                var i1 = document.createElement('i');
                i1.className = 'fa';
                i1.classList.add(event.icon1);
                element.find('div.fc-content').prepend(i1);

            },
            eventClick: function(calEvent, jsEvent, view) {
                $('#tituloEvento').html(calEvent.title);
                $('#descripcionEvento').html(calEvent.descripcion);
                $('#exampleModal').modal();
            },
            //header and other values
            select: function(start, end, allDay) {
                FechaInicio = $.fullCalendar.formatDate(start, 'YYYY-MM-DD');
                FechaFinal = $.fullCalendar.formatDate(end, 'YYYY-MM-DD');

                HoraInicio = $.fullCalendar.formatDate(start, 'HH:mm');
                HoraFinal = $.fullCalendar.formatDate(end, 'HH:mm');

                /* Limpiar Datos Viejos */

                $('#createEventModal #doctor_modal').val('');
                $('#createEventModal #doctor_modal').select2();
                $('#createEventModal #fecha_modal').val('');
                $('#createEventModal #div-results_modal').text('');
                $('#createEventModal #div-resultsHora_modal').text('');

                /* Nuevos Datos */

                $('#createEventModal #FechaInicio').val(FechaInicio);
                $('#createEventModal #Fechafinal').val(FechaFinal);
                $('#createEventModal #HoraInicio').val(HoraInicio);
                $('#createEventModal #HoraFinal').val(HoraFinal);
                $('#createEventModal').modal('show');


                var b = moment(FechaInicio + 'T' + HoraInicio); //now
                var a = moment(FechaFinal + 'T' + HoraFinal);

                var resultInMinutes = a.diff(b, 'minutes');

                $.fn.modal.Constructor.prototype.enforceFocus = function() {};

                $('#duracion_modal').append(`<option value="${resultInMinutes}">${resultInMinutes}</option>`);
                $('#duracion_modal').select2({
                    tags: true,
                    createTag: function(params) {
                        // Don't offset to create a tag if there is no @ symbol
                        if (params.term.search('^[0-9]+$') == 0) {
                            // Return null to disable tag creation
                            return {
                                id: params.term,
                                text: params.term
                            }
                        } else {
                            return null;
                        }
                    }
                });
                $('#duracion_modal').val((resultInMinutes));
                $('#duracion_modal').trigger('change');


            }
        });

        /*
        $('#submitButton').on('click', function(e) {
            // We don't want this to act as a link so cancel the link action
            e.preventDefault();

            doSubmit();
        });

        function doSubmit() {
            $("#createEventModal").modal('hide');
            console.log($('#apptStartTime').val());
            console.log($('#apptEndTime').val());
            console.log($('#apptAllDay').val());
            alert("form submitted");

            $("#calendar").fullCalendar('renderEvent', {
                    title: $('#patientName').val(),
                    start: new Date($('#apptStartTime').val()),
                    end: new Date($('#apptEndTime').val()),
                    allDay: ($('#apptAllDay').val() == "true"),
                },
                true);
        }
        */
    
    });

</script>

<!-- scripts para el menu normal de agendamiento -->
<script type="text/javascript">
    function verDia() {

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var sucursal = $("#sucursal").val();    

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                sucursal: sucursal,
                Tipo: "Disponibilidad"
            },
            success: function(response) {
                $('#div-results').html(response);
            }
        });
    };

    function verHora() {

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var sucursal = $("#sucursal").val();  

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                sucursal: sucursal,
                Tipo: "Disponibilidad_Hora"
            },
            success: function(response) {
                $('#div-resultsHora').html(response);
            }
        });
    };

    function verificarCliente() {

        var identificacion = $("#clienteId").val();
        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                identificacion: identificacion,
                Tipo: "Verificar_Cliente"
            },
            success: function(response) {
                $('#div-resultsCliente').html(response);
            }
        });
    };

    function CambiarMedico() {
        document.getElementById('div_fecha').style.display = 'block';
        if (document.getElementById('fecha').value != '') {
            document.getElementById('fecha').value = '';
        }
        var Hora = document.getElementById('Hora');
        if (Hora !== null) {
            document.getElementById('Hora').value = '';
        }

    }

    $(document).ready(function() {

        $('#duracion').select2({
            tags: true,
            createTag: function(params) {
                // Don't offset to create a tag if there is no @ symbol
                if (params.term.search('^[0-9]+$') == 0) {
                    // Return null to disable tag creation
                    return {
                        id: params.term,
                        text: params.term
                    }
                } else {
                    return null;
                }
            }
        });

    });
</script>




<!-- scripts para el modal de agendamiento -->
<script>
    function verDia_modal() {

        var fecha = $("#fecha_modal").val();
        var Hora = $("#Hora_modal").val();
        var usuario_id = $("#usuario_id_modal").val();
        var doctor = $("#doctor_modal").val();

        var HoraInicio = $("#HoraInicio").val();
        var HoraFinal = $("#HoraFinal").val();
        var sucursal = $("#sucursal").val();

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                HoraInicio: HoraInicio,
                HoraFinal: HoraFinal,
                sucursal: sucursal,
                Tipo: "Disponibilidad_Modal"
            },
            success: function(response) {
                $('#div-results_modal').html(response);
                verHora_modal();
            }
        });
    };

    function verHora_modal() {

        var fecha = $("#fecha_modal").val();
        var Hora = $("#Hora_modal").val();
        var usuario_id = $("#usuario_id_modal").val();
        var doctor = $("#doctor_modal").val();
        var sucursal = $("#sucursal").val();  

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                sucursal: sucursal,
                Tipo: "Disponibilidad_Hora_Modal"
            },
            success: function(response) {
                $('#div-resultsHora_modal').html(response);
            }
        });
    };

    function verificarCliente_modal() {

        var identificacion = $("#clienteId_modal").val();
        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                identificacion: identificacion,
                Tipo: "Verificar_Cliente"
            },
            success: function(response) {
                $('#div-resultsCliente_modal').html(response);
            }
        });
    };

    function CambiarMedico_modal() {
        document.getElementById('div_fecha_modal').style.display = 'block';
        document.getElementById('fecha_modal').value = document.getElementById('FechaInicio').value;

        var Hora = document.getElementById('Hora_modal');
        if (Hora !== null) {
            document.getElementById('Hora_modal').value = '';
        }

        verDia_modal();

    }
</script>