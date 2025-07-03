<?php
include 'funciones/geodata.php';

include 'header.php';
include 'menu.php';


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}
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
                                $queryList = mysqli_query($conn3, "SELECT * FROM  cliente");
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
                            <div align="left"><strong>Motivo de consulta</strong></div>
                            <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required>
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

                    </div>

                </form>



                <br><br><br>
                <!--<a class="btn btn-block btn-primary btn-sm" href="https://medicalsoftplus.com/baseDev/nuevoPaciente?calendario=1">
                    <h4>Registrar Paciente </h4>
                </a>-->

            </div>

            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary" style="margin-top: 20px !important;">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <?php if ($_SESSION['ID'] == '1') : ?>
                            <div class="container-fluid">
                                <div align="left">Calendario de:</div>
                                <select name="calendario_usuario" id="calendario_usuario" class="form-control select2" style="width:100%;color:black" onchange="if(this.value!=''){window.location='CL_Calendario_v2.php?usuario_id='+this.value}else{window.location='CL_Calendario_v2.php';}">
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
                            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente");
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
                        <div align="left"><strong>Motivo de consulta</strong></div>
                        <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required>
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
<script src='plugins/FullCalendarK/Fullcalendar_v2.min.js'></script>
<script src='plugins/FullCalendarK/Locale_es-us.js'></script>
<script src="dist/js/app.min.js"></script>

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

                    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '{$usuario_id}' ");
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

                        foreach ($HorasLaborales as $key => $value) {
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
            events: [
                <?php
                $usuario_id = ($_GET['usuario_id'] ? $_GET['usuario_id'] : "" );
                $querycitas = mysqli_query($conn3, "SELECT *, count(*) as totalCitaPorDia FROM citas where 1 = 1 ".(!empty($usuario_id) ? "and doctor = '$usuario_id'" : "")." group by concat(doctor, fecha) order by concat(fecha, Hora) asc");
                foreach ($querycitas as $datcitas): 

                    $start_fecha = funcionMaster("{$datcitas['fecha']}", "doctor = '{$datcitas['doctor']}' and fecha", "fecha", "citas", [ "returnConsult" => false, "notResult" => "", "order" => "concat(fecha, Hora) asc" ]);
                    $start_hora = funcionMaster("{$datcitas['fecha']}", "doctor = '{$datcitas['doctor']}' and fecha", "Hora", "citas", [ "returnConsult" => false, "notResult" => "", "order" => "concat(fecha, Hora) asc" ]);
                    $end_fecha = funcionMaster("{$datcitas['fecha']}", "doctor = '{$datcitas['doctor']}' and fecha", "fecha", "citas", [ "returnConsult" => false, "notResult" => "", "order" => "concat(fecha, Hora) desc" ]);
                    $end_hora = funcionMaster("{$datcitas['fecha']}", "doctor = '{$datcitas['doctor']}' and fecha", "Hora", "citas", [ "returnConsult" => false, "notResult" => "", "order" => "concat(fecha, Hora) desc" ]);

                    $descripcion = "";
                    $linea = "";
                    for ($i=0; $i < 91; $i++) { 
                        $linea .= "-";
                    }
                    $linea = "<b style='color: #566573'>$linea</b>";
                    for ($i=1; $i <= 4 ; $i++) {
                        $count_estado = funcionMaster("{$datcitas['fecha']}", "doctor = '{$datcitas['doctor']}' and estado = '$i' and fecha", "count(*)", "citas", [ "returnConsult" => false, "notResult" => "Sin resultados" ]);
                        $icon = [
                            1 => [
                                "icon" => "fa-image-portrait",
                                "text" => "Registradas $count_estado"
                            ],
                            2 => [
                                "icon" => "fa-circle-check",
                                "text" => "Confirmadas $count_estado"
                            ],
                            3 => [
                                "icon" => "fa-user-check",
                                "text" => "Asistio $count_estado"
                            ],
                            4 => [
                                "icon" => "fa-user-xmark",
                                "text" => "No Asistio $count_estado"
                            ]
                        ];
                        $query = mysqli_query($conn3, "SELECT * from citas where fecha = '{$datcitas['fecha']}' and doctor = '{$datcitas['doctor']}' and estado = '$i' order by Hora desc");


                        $descripcion .= "<div class='panel box box-primary' style='margin: 0'>";
                            $descripcion .= "<div class='box-header with-border'>";
                                $descripcion .= "<h4 class='box-title'>";
                                    $descripcion .= "<a data-toggle='collapse' data-parent='#accordion1' href='#collapseC$i' aria-expanded='false' class='collapsed'>";
                                        $descripcion .= "<label><i class='fa {$icon[$i]['icon']}'></i> </label> {$icon[$i]['text']}<br>";
                                    $descripcion .= "</a>";
                                $descripcion .= "</h4>";
                            $descripcion .= "</div>";
                            $descripcion .= "<div id='collapseC$i' class='panel-collapse collapse' aria-expanded='false' style='height: 0px;'>";
                                $descripcion .= "<div class='box-body' style='font-size: 18px'>";
                                    $descripcion .= "<div class='row'>";
                                        $descripcion .= "<div class='col-md-12'>";
                                        if (!empty(mysqli_num_rows($query))) {
                                            foreach ($query as $fetch) {
                                                $descripcion .= "<label>Nombre del paciente: </label> ".funcionMaster($fetch['idCliente'], "cliente_id", "nombre_cliente", "cliente", [ "notResult" => $fetch['nombre'] ])."<br>";
                                                $descripcion .= (!empty($fetch['motivoConsulta']) ? "<label>Motivo de consulta: </label> {$fetch['motivoConsulta']}<br>" : "");
                                                $descripcion .= (!empty($fetch['correo']) ? "<label>Mail: </label> {$fetch['correo']}<br>" : "");
                                                $descripcion .= (!empty($fetch['telefono']) ? "<label>Telefono: </label> {$fetch['telefono']}<br>" : "");
                                                $descripcion .= (!empty($fetch['Hora']) ? "<label>Hora: </label> ".cambiarFormatoFecha($fetch['Hora'], "g:i:s A")."<br>" : "");
                                                $descripcion .= "$linea<br>";
                                            }
                                        } else {
                                            $descripcion .= "Sin registros";
                                        }
                                        $descripcion .= "</div>";
                                    $descripcion .= "</div>";
                                $descripcion .= "</div>";
                            $descripcion .= "</div>";
                        $descripcion .= "</div>";
                    }
                    ?>
                    // si algo, por los botones que tenía antes, me dio pereza revisar validaciones y vainas raras de medical, pero pueden agregar libremente los botones
                    {
                        title: `<?= funcionMaster($datcitas['doctor'], "ID", "NOMBRE_USUARIO", "usuarios", ["notResult" => "Error de usuario"]) ?>`,
                        start: `<?= date("$start_fecha $start_hora") ?>`, // esto lo dejo solo pa que aparesca ordenado
                        end: `<?= date("$end_fecha $end_hora") ?>`, // esto lo dejo solo pa que aparesca ordenado
                        icon: `<?= "fa-user" ?>`,
                        // icon1: `<?= "fa-user" ?>`,
                        descripcion: `<?= $descripcion ?><h2>Total de citas: <label><?= $datcitas['totalCitaPorDia'] ?></label></h2>`
                    },
                <?php endforeach ?>
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
                $('#tituloEvento').html(`<h2><b>${calEvent.title}</b></h2>`);
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

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
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

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
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

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
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