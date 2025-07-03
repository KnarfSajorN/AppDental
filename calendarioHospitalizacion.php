<?php
include 'header.php';
include 'menu.php';


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}
$IDconfig = $_SESSION['ID'];
$querySucursales = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $IDconfig");

$nrowl = mysqli_num_rows($querySucursales);

while ($rowcalendario = mysqli_fetch_array($querySucursales)) {


    $Sucursales = $rowcalendario['Sucursales'];
}




?>

<link rel="stylesheet" href="plugins/FullCalendarK/Fullcalendar.min.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li class="active">Calendario </li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
<div style="display:flex; flex-direction:row; justify-content:space-between">
    <h1 align="center" >Calendario de hospitalizacion</h1>
    <div style="display:flex; flex-direction:row;justify-content:space-between;align-items:center;width:20%">
        <div style="background-color:#68B9EB; width:30px;height:30px; border-radius:100%"></div>
        <strong>Finalizado</strong>
        <div style="background-color:#5EEAAC; width:30px;height:30px; border-radius:100%"></div>
        <strong>Activo</strong>
    </div>
</div>

                        <div id="calendar" style="width: 100%;"></div>
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
<!-- <div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                            <option value="<?=$_SESSION['ID']?>" ><?=$_SESSION['NOMBRE_USUARIO']?></option>-->
                            <?php
                            usuariosEspecialistasSelect();
                            ?>
                        <!-- </select>
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
                        <div align="left"><strong>Servicio</strong> <a href="CL_MotivosConsulta.php"><i class="fa fa-cog"></i> </a>  </div> -->
                        <!-- <div align="left"><strong>Motivo de consulta</strong></div> -->
                        <!-- <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required> -->
                        <!-- <select name="motivoConsulta" class="form-control select2" style="width: 100%;" onchange="tiempoMotivoConsulta(this.value, 'duracion_modal')" required>
                            <option value="" selected="selected">Seleccione...</option>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta");
                             $nrowl = mysqli_num_rows($queryList);
                            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                // $cod = $row_recordset32A['cliente_id'];
                                $id = $row_recordset32A['id'];
                                $nombre = $row_recordset32A['descripcion'];
                                $nombre = utf8_encode($nombre);

                                echo "<option value='$id'> $nombre </option>";
                            }
                            ?>

                        </select>
                    </div>

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

                    <div class="form-group col-md-12" align="center">
                        <label>
                            <input type="radio" name="P" value="0" class="flat-red" checked>
                            <i class="fa fa-user"></i> Presencial

                            <input type="radio" name="P" value="1" class="flat-red">
                            <i class="fa fa-video-camera"></i> Virtual
                        </label>
                    </div>

                    <input type="hidden" name="usuario_id" id="usuario_id_modal" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="sucursal" id="sucursal_id_modal" value='<?php echo $_SESSION['sucursal'] ?>'>

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
    <div class="modal-dialog" role="document" style="margin-top: 107px;">
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
</div> -->

<?php include 'footer.php';

$query = mysqli_query($conn3, "SELECT * FROM hoIngresoHospitalizacion");
$eventos = array();

foreach ($query as $key) {
    $eventoH = array();
    $eventoH['id'] = $key['idHospitalizacion'];
    $eventoH['title'] = 'Hospitalizacion';
    $eventoH['start'] = $key['fechaIngreso'];
    $eventoH['end'] = $key['fechaSalida'];

    array_push($eventos,$eventoH );
}

// Convertir a formato JSON y enviar la respuesta
$eventosHospitalizacion =  json_encode($eventos);

?>



<style>
    .fc-nonbusiness {
        background-color: #ffc4c4 !important;
    }

    .fc-content,
    i {
        padding-right: 5px;
    }

    /* .fc-content>.fa-circle-check {
        color: #83ed83;
    } */

    .fc-time-grid-event.fc-v-event.fc-event.fc-start.fc-end.fc-short {
        height: 16px;
    }

    .fc-license-message {
        display: none;
    }

    .fade.in {
    opacity: 1;
    background-color: #47474769;
    }


    .modal {
    background: rgba(0,0,0,0.3);
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
<script src='plugins/FullCalendarK/es.js'></script>
<!-- <script src="dist/js/app.min.js"></script> -->
<!--
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css' rel='stylesheet' media='print' />-->

<!--<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>-->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.js'></script>

</link>
<?php
$array = array();
$queryList = mysqli_query($conn3, "SELECT ID,NOMBRE_USUARIO FROM  usuarios WHERE ACTIVO=1 ");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32A = mysqli_fetch_assoc($queryList)) {
    $Arreglo=[];
    $Arreglo["ID"]=$row_recordset32A["ID"];
    $Arreglo["NOMBRE_USUARIO"]=reem_alreves($row_recordset32A["NOMBRE_USUARIO"]);
    array_push($array, $Arreglo);
}
?>

<script>
    $(document).ready(function() {
        let data = JSON.parse('<?= utf8_decode(json_encode($array)) ?>');
        let date = [];

        data.forEach(function(element) {

            date.push({
                id: element.ID,
                title: element.NOMBRE_USUARIO,
            })
        });

        // $('#datepicker').datepicker({

        //     showOn: "both",
        //     buttonImage: "http://jqueryui.com/resources/demos/datepicker/images/calendar.gif",
        //     buttonImageOnly: true,
        //     buttonText: " ",
        //     dateFormat: "yy-mm-dd",
        //     onSelect: function(dateText, inst) {
        //         $('#calendar').fullCalendar('gotoDate', dateText);
        //     },

        // });

        var calendar = $('#calendar').fullCalendar({
            lang: 'es',
            height: 800,
            defaultView: 'month',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            buttonText: {
                today: 'Dia Actual',
                month: 'Mes',
                week: 'Semana',
                day: 'Dia'
            },
            //slotDuration: '01:00:00',
            slotDuration: '00:30:00',
            // slotEventOverlap: false,
            // slotLabelInterval: '00:30:00',
            // scrollTime: '06:00:00',
            //editable: false,
            //selectable: true,
            //kk
            editable: false,
            eventDurationEditable: false,
            selectable: true,
            //kk final

            // resources: date,
            aspectRatio: 1.2,
            eventTextColor: '#000000',
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
            events: 'ajaxEventosHospitalizacion.php',
            eventClick: function(event) {
                abrirModalHospitalizacion(event);
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

    function abrirModalHospitalizacion(event) {
var idHospitalizacion = event.id;
//console.log(idHospitalizacion);


        $.ajax({
    url: 'Ajax_Datos_Hospitalizacion.php',
    type: 'POST',
    data: {
        idHospitalizacion:idHospitalizacion
    },
    success: function(response) {
    //var datosJson = JSON.parse(response);
var datosJson = JSON.parse(response);
    //console.log(datosJson);
    var contenidoHTML = `<h6>` + datosJson.nombre_cliente + `</h6>
  <p>
    <b>Estado actual:</b> ${datosJson.hospitalizacionActiva == 1 ? 'Activo' : 'Finalizado'}<br>
    <b>Motivo de hospitalización:</b> ${datosJson.motivoHospitalizacion}<br>
    <b>Fecha y hora de ingreso:</b> ${datosJson.fechaIngreso}   ${datosJson.fechaIngreso}<br>
    <b>Fecha y hora de salida:</b> ${datosJson.fechaSalida}   ${datosJson.horaSalida}<br>
  </p>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Piso</th>
        <th scope="col">Habitacion</th>
        <th scope="col">Camilla</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>${datosJson.nombre_piso}</td>
        <td>${datosJson.nombre_hab}</td>
        <td>${datosJson.nombre_Cam}</td>
      </tr>
    </tbody>
  </table>`;

    $('#contenidomodalHospitalizacion').html(contenidoHTML);
    $('#modalHospitalizacion').modal('show');

document.getElementById('botonMasDetallesH').onclick = ()=>{
    window.location.href = 'historialHospitalizacion.php?idH=' + idHospitalizacion;
}

      //console.log('Éxito:', response);
      // Manejar la respuesta del servidor
    },
    error: function(error) {
      console.error('Error:', error);
      // Manejar el error
    }
  });
}



</script>




<style>
    .colormodal {
        background-color: #3390FF;
        color: white;
    }
</style>
<br><!-- Modal -->

<!-- ============= MODAL DE HOSPITALIZACVION ======================= -->
<!-- Modal -->

<div id="modalHospitalizacion" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Datos de hospitalizacion</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <div class="modal-body" id="contenidomodalHospitalizacion">
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-info" id="botonMasDetallesH"><i class="fa-solid fa-magnifying-glass"></i>Ver mas detalles de hospitalizacion</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>

  </div>
</div>

<!-- ============= MODAL DE HOSPITALIZACVION ======================= -->
<?php
include "./modalServicios.php";
// include "footer.php";
include("./ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select

?>

<script type="text/javascript">
    window.addEventListener('load', () => {
        Select2Dinamico(
            "select[name='motivoConsulta']", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("Motivos_Consulta") ?>",
                value: "<?= Encriptar("id") ?>",
                text: "<?= Encriptar("descripcion") ?>",
                likeWhere: "<?= Encriptar("descripcion") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'id'])) ?>",
                clausula: {
                    data: "<?= Encriptar("Activo = 1") ?>",
                    value: [''],
                },
                carapter: "true",
                regAdicional: btoa(JSON.stringify({
                    position: "top", // bottom
                    data: [{
                        id: "nuevo",
                        text: "Crear Nuevo Servicio"
                    }]
                })),
            }, false, false
        );
    });

    $(document).on('click', '.prueba', function() {

        var id = $(this).attr('data-id');
        var id1 = "<?php echo $ID ?>";
        console.log(id);
        document.getElementById("cita_id").value = id;

        // $("#consulta").attr('href', 'Historia_Clinica.php?clienteId=' + id);
        // $("#receta").attr('href', 'RM_ModuloReceta.php?clienteId=' + id);
        // $("#examenl").attr('href', 'modal2.php?clienteId=' + id);
        // $("#examenr").attr('href', 'modal1.php?clienteId=' + id);
        // $("#nota").attr('href', 'NotaProcedimiento.php?usuarioId=' + id1 + '&clienteId=' + id);

        // // aquí es cuando tienes que mirar la documentación de tu framework
        // $('#miModal').showModal(); // o similar

    });

    const tiempoMotivoConsulta = (id, mascara) => {
        if (id == "nuevo") {
            $("#servicios-modal").modal("show");
        } else {
            let data = {
                key: "info_motivoConsulta",
                mascara: mascara,
                id: id
            };
            $.ajax({
                url: "./ajax_calendar.php",
                data: data,
                type: "POST",
                dataType: "json",
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        for (const key in object = response.data[0]) {
                            if (Object.hasOwnProperty.call(object, key)) {
                                if (key == mascara) {
                                    $(`#${key}`).val([object[key]]).trigger("change.select2");
                                    if ($(`#${key}`).val() != object[key]) {
                                        $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[key]]).trigger("change.select2");
                                    }
                                }
                            }
                        }
                    }
                }
            });
        }
    };

    const estadoDinamico = (id, estado) => {
        let data = {
            key: "updateEstadoCita",
            idCitas: id,
            estado: estado
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    if (estado == 3) {
                        let clienteId = btoa(id); // Cambio de base64_encode a btoa

                        $.ajax({
                            url: "ajax_enviarwhatsapp.php",
                            data: data,
                            type: "POST",
                            dataType: "json",
                            success: function(response) {
                                console.log(clienteId); // Agregado console.log
                            }
                        });

                    }
                    location.reload();
                }
            }
        });

    };
    const presenciaDinamico = (id, estado) => {
        let data = {
            key: "updateEstadoPresencialCita",
            idCitas: id,
            estadoPresencia: estado
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    // console.log(response);
                    // if (estado == 3 || estado == 4 || estado == 5) {
                    location.reload();
                    // }
                }
            }
        });
    };

    const validaCliente = (documento) => {
        let data = {
            key: "verificaCliente",
            CODI_CLIENTE: documento
        };
        $.ajax({
            url: "./ajax_calendar.php",
            data: data,
            type: "POST",
            dataType: "json",
            success: function(response) {
                if (response.status) {
                    let campos = ["CODI_CLIENTE", "nombre", "correo", "telefono", "correo", "telefono"];
                    campos.forEach(element => {
                        $(`input[name='${element}']`).val('');
                    });
                    $(".box-info-content").html("<span class='text-danger'>Paciente ya se encuentra Registrado</p>");
                    setTimeout(function() {
                        $(".box-info-content").html("");
                    }, 3000); // 3000 milisegundos = 3 segundos
                }
            }
        });
    };

    const toggleSlotDuration = (minute) => {
        $('#calendar').fullCalendar('option', 'slotDuration', `00:${minute}:00`);
    };
</script>

<script>
    function AgregarNotas(idCitas) {

        // Se crea el SweetAlert2 con el campo HTML y el textarea
        Swal.fire({
            title: 'Notas',
            icon: 'info',
            html: `
      <div>
        <p>Notas:</p>
        <textarea id="Notas_Cita" style="width: 100%;height: 100px"></textarea>
      </div>
    `,
            width: '80%',
            showCancelButton: true,
            confirmButtonText: 'Guardar',
            cancelButtonText: 'Cancelar',
            preConfirm: () => {
                const Notas_Cita = Swal.getPopup().querySelector('#Notas_Cita').value;

                if (!Notas_Cita) {
                    Swal.showValidationMessage(`Debes diligenciar la nota`);
                }
                return {
                    Notas_Cita: Notas_Cita,
                    idCitas: idCitas, //esto es el valor que trae la funcion
                    usuario_id: '<?= $_SESSION["ID"]; ?>'
                }
            },

        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    type: "POST",
                    url: "CL_Ajax_Calendario.php",
                    data: {
                        Tipo_Consulta: "Agregar Notas Adicionales",
                        Resultados: result.value,
                    }
                }).success(function(response) {
                    var Respuesta = JSON.parse(response);
                    if (Respuesta.Estado == true) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Correcto',
                            html: '<p style="font-size:18px;">' + Respuesta.Mensaje + '</p>',
                            width: '30%',
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            html: '<p style="font-size:18px;">' + Respuesta.Mensaje + '</p>',
                            width: '30%',
                        });
                    }

                });

            }
        });
    }

    function HistorialNotas(idCitas) {
        // Realizar solicitud AJAX al servidor para obtener los datos
        //obtener el valor de data-idCitas
        var idCitas = idCitas;

        Swal.fire({
            title: 'Historial de Notas',
            //html: '<div class="accordion" id="CitasAccordion"></div>',
            html: '<div class="container" id="contenedor_swal"style="width: 100%;">' +
                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">' +
                '<div>' +
                '<div class="s"></div>' +
                '<div class="text-titulo">' +
                '<span class="and">Historial de Notas</span>' +
                '</div>' +
                '<div class="s"></div>' +
                '</div><br>' +
                //'<div class="panel-group" id="accordion_search_bar_container">' +
                //'<input type="search" id="accordion_search_bar" placeholder="Buscar" />' +
                //'</div>' +
                '</div>' +
                '</div>',
            showCloseButton: true,
            showConfirmButton: false,
            width: '80%',
            didOpen: function() {
                var accordion = $('#accordion');
                $.ajax({
                    url: 'CL_Ajax_Calendario.php',
                    type: 'POST',
                    data: {
                        Tipo_Consulta: "Historial Notas Adicionales",
                        idCitas: idCitas,
                    },
                    success: function(data) {
                        var data = JSON.parse(data);
                        var contador = 0;
                        $.each(data, function(i, cita) {
                            var fecha = cita.Fecha;
                            var hora = cita.Hora;
                            var Nota = cita.Nota;
                            Nota = Nota.replace(/\n/g, "<br>");
                            var detalleId = 'detalle' + i;
                            html = `
                                            <div class="panel panel-default" id="collapse_` + detalleId + `">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"  href="#` + detalleId + `"  aria-expanded="true" aria-controls="` + detalleId + `">
                                                        <div class="row">
                                                        <i id="icono-panel" class="fa-regular fa-note-sticky fa-rotate-180" style='float:left;'></i>
                                                        <label id="label-panel"> Fecha: ` + fecha + ` Hora: ` + hora + `</label>
                                                        <i id="icono-panel" class="fa fa-chevron-down" style='float:right;'></i>
                                                        </div>
                                                    </a>
                                                    </h4>
                                                </div>
                                                <div id="` + detalleId + `" class="panel-collapse collapse" role="tabpanel" aria-labelledby="` + detalleId + `" aria-expanded="true" style="height: 0px;">
                                                    <div class="panel-body" style="text-align: initial;">
                                                        <div class="col-md-12">
                                                        <h3 style="width:100%;text-align: center;;">Notas</h3>
                                                        <hr>
                                                            ` + Nota + `
                                                        <br><br>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>`;
                            accordion.append(html);
                            contador++;
                        });

                        if (contador == 0) {
                            $('#contenedor_swal').html('<label>No se encontraron notas</label>');
                        }

                    },
                    error: function(xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    }
</script>
<script>
    (function() {
        var searchTerm, panelContainerId;
        // Create a new contains that is case insensitive
        $.expr[':'].containsCaseInsensitive = function(n, i, m) {
            return jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };

        $('#accordion_search_bar').on('change keyup paste click', function() {
            searchTerm = $(this).val();
            $('#accordion > .panel').each(function() {
                panelContainerId = '#' + $(this).attr('id');
                $(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                $(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show();
            });
        });
    }());
</script>

<!-- <link rel="stylesheet" href="css/AccordionNuevo.css"> -->
<link rel="stylesheet" href="css/AccordionNuevo.css?v=<?=rand(1,10000);?>">

<style>
    .rotar-texto {
      writing-mode: vertical-rl;
      text-orientation: upright;
    }
  </style>
  
<script>
$(document).ready(function() {
      $(".fc-resource-cell").each(function() {
        if ($(this).width() < 57) {
          $(this).addClass("rotar-texto");
        }
      });
    });
</script>