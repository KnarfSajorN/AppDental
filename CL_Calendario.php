<?php
include 'header.php';
include 'menu.php';

ini_set('log_errors', 1);
ini_set('error_log', '/ruta/del/archivo/de/errores.log');
error_reporting(E_ALL);


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}
$IDconfig = $_SESSION['ID'];
$querySucursales = mysqli_query($conn3, "SELECT * FROM  config where (ID_Usuario = '{$_SESSION['ID']}' and ID_Usuario = '{$_SESSION['ID_principal']}')");

// $nrowl = mysqli_num_rows($querySucursales);

while ($rowcalendario = mysqli_fetch_array($querySucursales)) {


    $Sucursales = $rowcalendario['Sucursales'];
}

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
    $queryCliente = " AND c.cliente_id=" . $_SESSION['cI'];
    $queryClienteC = " AND idCliente=" . $_SESSION['cI'];
    
} else {
    $queryCliente = "";
    $queryClienteC = "";
    var_dump($Sucursales);
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
            <div class="col-md-3">
                <!-- <h4 class="Titulo_Pagina">Calendario</h4> -->


                <form action="Guardar_C" method="POST" name="formularioActualizarcliente">
                    <div class="box box-body">
                        <?php
                        if ($_SESSION['sucursal'] != "0" and $_SESSION['sucursal'] != "") {
                            $Nombre_Sucursal = funcionMaster($_SESSION['sucursal'], 'id', 'descripcion', 'sucursales');
                            echo "<div class='form-group col-md-12'> <div align='left' style='font-size:24px;'><b>Agendamiento Sucursal <u>[$Nombre_Sucursal]</u></b></div></div>";
                        } else {
                            echo "<div class='form-group col-md-12'> <div align='left' style='font-size:24px;'><b>Agendamiento General</b></div></div>";
                        }
                        ?>
                        <div class="form-group col-md-12">
                            <div align="left"><strong>Usuario</strong></div>
                            <select id="doctor" name="doctor" class="select2 form-control input-lg" style="width: 100%;"
                                required onchange="CambiarMedico(1)">
                                <option value="" disabled selected>Selecione...</option>
                                <!--<option value="<?= $_SESSION['ID'] ?>" ><?= $_SESSION['NOMBRE_USUARIO'] ?></option>-->
                                <?php
                                usuariosEspecialistasSelect();
                                ?>
                            </select>
                        </div>

                        <div id="div_fecha" class="form-group col-md-12" style="display:none;">
                            <div align="left"><strong>Fecha</strong></div>
                            <input type="date" class="form-control input-lg" name="fecha" id="fecha"
                                min="<?php echo date('Y-m-d') ?>" onChange="verDia(1);" required>
                            <div id="div-results" style="text-align:center;"></div>
                        </div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Pacientes</strong></div>
                            <select id="clienteId" name="clienteId" class="form-control select2" style="width: 100%;"
                                onChange="verificarCliente();" required>
                                <option value="" disabled selected="selected">Seleccione un paciente ...</option>
                                <option value='0'> Paciente no Registrado </option>
                                <?php
                                $queryList = mysqli_query($conn3, "SELECT * from cliente c WHERE (c.usuario_id = '{$_SESSION['ID']}' or c.usuario_id = '{$_SESSION['ID_principal']}') and c.activo = 1 $queryCliente");
                                // $nrowl = mysqli_num_rows($queryList);
                                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                    $cod = $row_recordset32A['cliente_id'];
                                    $nombre = $row_recordset32A['nombre_cliente'];

                                    echo "<option value='$cod'> $nombre </option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="col-md-12" id="div-resultsCliente"></div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Servicio</strong> <a href="CL_MotivosConsulta.php"><i
                                        class="fa fa-cog"></i> </a> </div>
                            <!-- <div align="left"><strong>Motivo de consulta</strong></div> -->
                            <!-- <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required> -->
                            <select name="motivoConsulta" class="form-control select2" style="width: 100%;"
                                onchange="tiempoMotivoConsulta(this.value, 'duracion')" required>
                                <option value="" selected="selected">Seleccione...</option>
                                <?php
                                $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta where (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and Activo = 1");
                                // $nrowl = mysqli_num_rows($queryList);
                                while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                    // $cod = $row_recordset32A['cliente_id'];
                                    $id = $row_recordset32A['id'];
                                    $nombre = $row_recordset32A['descripcion'];

                                    echo "<option value='{$id}'> $nombre </option>";
                                }
                                ?>

                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <div align="left"><strong>Tiempo de Cita</strong></div>
                            <select id="duracion" name="duracion" class="form-control select2"
                                data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
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

                        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                        <input type="hidden" name="sucursal" id="sucursal" value='<?php echo $_SESSION['sucursal'] ?>'>

                        <div align="center">
                            <div id="div-resultsHora"></div>
                        </div>

                        <div class="row" style="padding-top: 20px;">
                            <div class="col-md-6" align="center">
                                <i class="fa fa-video-camera" aria-hidden="true"> <br>Virtual </i>
                            </div>
                            <div class="col-md-6" align="center">
                                <i class="fa fa-user" aria-hidden="true"> <br>Presencial </i>
                            </div>

                            <!-- <div class="col-md-4" align="center">
                                <i class="fa fa-image-portrait" aria-hidden="true"> <br>Registrado </i>
                            </div> -->

                            <!-- <div class="col-md-3 col-sm-12" align="center">
                                <i class="fa fa-circle-check" aria-hidden="true" style="color:green"> Confirmado </i>
                            </div> -->
                        </div>
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-md-4" align="center">
                                <i class="fa fa-ticket-alt" aria-hidden="true"> <br>Reservada </i>
                            </div>
                            <div class="col-md-4" align="center">
                                <i class="fa fa-circle-check" aria-hidden="true"> <br>Confirmada </i>
                            </div>
                            <div class="col-md-4" align="center">
                                <i class="fa fa-check" aria-hidden="true"> <br>Asistida </i>
                            </div>
                        </div>
                        <div class="row" style="padding-top: 20px;">
                            <div class="col-md-6" align="center">
                                <i class="fa fa-clock" aria-hidden="true"> <br>Cita Cancelada </i>
                            </div>
                            <div class="col-md-6" align="center">
                                <i class="fa fa-times" aria-hidden="true"> <br>No pudo Asistir </i>
                            </div>
                        </div>

                    </div>

                </form>

                <div
                    style="background: #ffffff;border-top: 3px solid #d2d6de;margin-bottom: 20px;width: 100%;box-shadow: 0 1px 1px rgba(0,0,0,0.1);margin-top: -25px;padding: 10px;">

                    <div align="left">Duracion del Rango de la Cita:</div>
                    <select name="btn-change-slot-duration" onchange="toggleSlotDuration(this.value)"
                        class="form-control select2" style="width:100%;color:black">
                        <option value="5">5 Minutos</option>
                        <option value="10">10 Minutos</option>
                        <option value="15">15 Minutos</option>
                        <option value="20">20 Minutos</option>
                        <option value="30" selected>30 Minutos</option>
                        <option value="45">45 Minutos</option>
                        <option value="60">60 Minutos</option>
                    </select>
                    <hr>

                    <a class="btn btn-block btn-outline-info rounded-pill shadow" href="controlCitas" target="_blank">
                        <h4> Historial de Reservas </h4>
                    </a>



                    <br>
                    <?php /*if ($_SESSION['ID'] == '1') : ?>
<!-- <div class="col-md-12"> -->
<div align="left">Calendario de:</div>
<select name="calendario_usuario" id="calendario_usuario" class="form-control select2"
style="width:100%;color:black"
onchange="if(this.value!=''){window.location='CL_Calendario.php?usuario_id='+this.value}else{window.location='CL_Calendario.php';}">
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


<!-- </div> -->
<?php endif; */ ?>
                </div>
            </div>

            <!-- /.col -->
            <div class="col-md-9">
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->

                        <div class="container-fluid">
                            <div align="left">Calendario de:</div>
                            <select name="calendario_usuario" id="calendario_usuario" class="form-control select2"
                                style="width:100%;color:black"
                                onchange="if(this.value!=''){window.location='?usuario_id='+this.value}else{window.location=window.location.pathname}">
                                <?php
                                // $nombreusuario = funcionMaster($_GET["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                // $idusuario = $_GET['usuario_id'];

                                // if ($_GET['usuario_id'] <> "") {
                                //     echo "<option value='$idusuario' selected>$nombreusuario</option>";
                                //     echo "<option value=''>Todos</option>";
                                // } else {
                                //     echo "<option value='' selected>Todos</option>";
                                // }
                                # Esteban
                                $get_user = $_GET["usuario_id"] ?? null;
                                echo "<option value='' " . (!$get_user ? "selected" : "") . ">Todos</option>";

                                usuariosEspecialistasSelect($get_user);
                                ?>
                            </select>
                        </div>


                        <div id="calendar"></div>
                        <label style="color:red;    font-size: 1.5rem;">*Las Citas Asignadas a Una Sucursal No se Puede
                            Mover a Otro Usuario*</label>
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
<div class="modal fade" id="createEventModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
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
                        <select id="doctor_modal" name="doctor" class=" form-control input-lg"
                            style="width: 100%;" required onchange="CambiarMedico_modal()">
                            
                            
                            <?php
                            usuariosEspecialistasSelect();
                            ?>
                        </select>
                    </div>

                    <div id="div_fecha_modal" class="form-group col-md-12" style="display:none;">
                        <div align="left"><strong>Fecha</strong></div>
                        <input type="date" class="form-control input-lg" name="fecha" id="fecha_modal"
                            min="<?php echo date('Y-m-d') ?>" onChange="verDia_modal();" required>
                        <div id="div-results_modal"></div>
                    </div>

                    <div class="form-group col-md-12">
                        <div align="left"><strong>Pacientes</strong></div>
                        <select id="clienteId_modal" name="clienteId" class="form-control select2" style="width: 100%;"
                            onChange="verificarCliente_modal();" required>
                            <option value="" selected="selected">Seleccione un paciente ...</option>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * from cliente c WHERE (c.usuario_id = '{$_SESSION['ID']}' or c.usuario_id = '{$_SESSION['ID_principal']}') and c.activo = 1 $queryCliente");
                            // $nrowl = mysqli_num_rows($queryList);
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
                        <div align="left"><strong>Servicio</strong> <a href="CL_MotivosConsulta.php"><i
                                    class="fa fa-cog"></i> </a> </div>
                        <!-- <div align="left"><strong>Motivo de consulta</strong></div> -->
                        <!-- <input type="text" class="form-control input-lg" id="motivoConsulta" name="motivoConsulta" placeholder="Motivo de consulta" required> -->
                        <select name="motivoConsulta" class="form-control select2" style="width: 100%;"
                            onchange="tiempoMotivoConsulta(this.value, 'duracion_modal')" required>
                            <option value="" selected="selected">Seleccione...</option>
                            <?php
                            $queryList = mysqli_query($conn3, "SELECT * FROM  Motivos_Consulta where (usuario_id = 1 or usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");

                            //  $nrowl = mysqli_num_rows($queryList);
                            while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                // $cod = $row_recordset32A['cliente_id'];
                                $id = $row_recordset32A['id'];
                                $nombre = ($row_recordset32A['descripcion']);
                                // $nombre = $nombre;

                                echo "<option value='$id'> $nombre </option>";
                            }
                            ?>

                        </select>
                    </div>

                    <div class="form-group col-md-12">
                        <div align="left"><strong>Tiempo de Cita</strong></div>
                        <select id="duracion_modal" name="duracion" class="form-control select2"
                            data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
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
                    <input type="hidden" name="sucursal" id="sucursal_id_modal"
                        value='<?php echo $_SESSION['sucursal'] ?>'>

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
</div>

<?php include 'footer.php'; ?>


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
        background: rgba(0, 0, 0, 0.3);
    }
</style>
<!-- <script src="plugins/jQuery/jquery-2.2.3.min.js"></script> -->
<script src="plugins/select2/select2.full.min.js"></script>
<script>
    $(function () {
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
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css' rel='stylesheet' media='print' />

<!--<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>-->
<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.js'></script>

</link>
<?php
$array = array();
$queryList = mysqli_query($conn3, "SELECT ID,NOMBRE_USUARIO FROM  usuarios WHERE (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') and ACTIVO=1 ");
// $nrowl = mysqli_num_rows($queryList);
while ($row_recordset32A = mysqli_fetch_assoc($queryList)) {
    $Arreglo = array();
    $Arreglo["ID"] = $row_recordset32A["ID"];
    $Arreglo["NOMBRE_USUARIO"] = reem_alreves($row_recordset32A["NOMBRE_USUARIO"]);
    array_push($array, $Arreglo);
}
?>

<script>
    $(document).ready(function () {
        let data = JSON.parse('<?= utf8_decode(json_encode($array)) ?>');
        let date = [];

        data.forEach(function (element) {

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
            height: 1200,
            defaultView: 'agendaDay',
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
            selectLongPressDelay: 500,
            // slotEventOverlap: false,
            // slotLabelInterval: '00:30:00',
            // scrollTime: '06:00:00',
            //editable: false,
            //selectable: true,
            //kk
            
            editable: true,
            eventDurationEditable: false,
            eventDrop: function (event, delta, revertFunc) {

                //console.log(event.resourceId);
                //console.log(event);
                //console.log(delta);
                //console.log(revertFunc);
                //console.log(event.oldResource);
                //console.log(event.oldResourceId);
                //console.log("El evento " + event.title + " se ha movido a la fecha " + event.start.format());
                //console.log("El evento " + event.title + " (id: " + event.id + ") se ha movido a la fecha " + event.start.format());
                //revertFunc();
                var usuario_modificar_cita = event.resourceId;

                Swal.fire({
                    title: '¿Estás seguro?',
                    text: 'Si Acepta, Se movera la cita a la fecha ' + event.start.format()
                        .replace('T', ' '),
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Aceptar',
                    cancelButtonText: 'Cancelar'
                }).then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            type: "POST",
                            url: "CL_Ajax_Calendario.php",
                            data: {
                                FechaHoraInicio: event.start.format(),
                                idCita: event.id,
                                usuario_id: '<?= $_SESSION["ID"]; ?>',
                                usuario_modificar_cita: usuario_modificar_cita,
                                Tipo_Consulta: "Mover Cita"
                            },
                            success: function (response) {
                                //console.log(response);
                                var Respuesta = JSON.parse(response);
                                var Mensaje = Respuesta.Mensaje;

                                var FechaHora = event.start.format();
                                FechaHora = FechaHora.replace("T", " ");

                                if (Respuesta.Estado == true) {
                                    // event.start.format() a esta fecha quitarle la T

                                    $.ajax({
                                        type: "POST",
                                        url: "CL_Ajax_Calendario.php",
                                        data: {
                                            idCita: event.id,
                                            Tipo_Consulta: "Envio Whatsapp"
                                        },
                                        success: function (response) {

                                        }
                                    });

                                    if (Respuesta.GoogleCalendar == true) {

                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Correcto',
                                            html: '<p style="font-size:18px;">' +
                                                'La cita se ha movido a la fecha <b>' +
                                                FechaHora + '</b>.' +
                                                Mensaje +
                                                ', Ademas se actualizara la cita en google calendar en unos segundos,<label style="color:red"> No cierre la pestaña del navegador</label></p>',
                                            width: '30%',
                                        });

                                        //window.location = "ApiGoogleCalendar.php?cita_id="+event.id+"&ruta=2";

                                        setTimeout(function () {
                                            // Redireccionar a una ubicación específica después de 2 segundos
                                            window.location =
                                                "ApiGoogleCalendar.php?cita_id=" +
                                                event.id + "&ruta=2";
                                        }, 2000);


                                    } else {
                                        Swal.fire({
                                            icon: 'success',
                                            title: 'Correcto',
                                            html: '<p style="font-size:18px;">' +
                                                'La cita se ha movido a la fecha <b>' +
                                                FechaHora + '</b>.' +
                                                Mensaje + '</p>',
                                            width: '30%',
                                        });
                                    }

                                } else if (Respuesta.Estado == false) {
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        html: '<p style="font-size:18px;">' +
                                            Mensaje + '</p>',
                                        width: '30%',
                                    });
                                    revertFunc();
                                } else if (Respuesta.Estado == "Warning") {
                                    Swal.fire({

                                        icon: 'warning',
                                        title: 'Advertencia',
                                        html: '<p style="font-size:18px;">' +
                                            Mensaje + '</p>',
                                        width: '30%',
                                    });

                                }
                            }
                        });
                    } else {
                        revertFunc();
                        
                    }
                });
            },
            selectable: true,
            //kk final

            resources: date,
            aspectRatio: 1.2,
            eventTextColor: '#000000',
            businessHours: [
                <?php

                if ($_GET['usuario_id'] <> "") {
                    $usuario_id = $_GET['usuario_id'];

                    $queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '{$usuario_id}' ");
                    // $nrowl = mysqli_num_rows($queryList);
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

                date_default_timezone_set("America/Bogota");
                if (empty($_GET['usuario_id']) || !isset($_GET['usuario_id'])) {
                    $filtro = "and (doctor = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}')";
                } else {
                    $filtro = "and doctor = $usuario_id";
                }
                // (estado  = 1 or estado  = 2 or estado = 3 or estado = 4 )
                $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where estado != '5' $filtro $queryClienteC order by fecha asc ");
                // $nrowl = mysqli_num_rows($queryList);
                while ($RowCitas = mysqli_fetch_array($queryList)) {
                    $idCitas = $RowCitas['idCitas'];
                    $usuario_id_asignado = $RowCitas["usuario_id"];
                    $idCliente = $RowCitas["idCliente"];
                    $doctor = $RowCitas["doctor"];
                    $Nombre = reem_alreves($RowCitas["nombre"]);
                    $estadoPresencia = $RowCitas["estadoPresencia"];
                    $MotivoConsulta = (is_numeric($RowCitas["motivoConsulta"]) ? funcionMaster($RowCitas["motivoConsulta"], 'id', 'descripcion', 'Motivos_Consulta') : $RowCitas["motivoConsulta"]);

                    $Fecha = $RowCitas["fecha"];
                    $Hora = $RowCitas["Hora"];
                    $Duracion = $RowCitas["duracion"];

                    $mi_fecha_cita = date("{$Fecha} {$Hora}");
                    $nueva_fecha_cita = strtotime("+{$Duracion} minute", strtotime($mi_fecha_cita));
                    $nueva_fecha_cita = date('Y-m-d H:i:s', $nueva_fecha_cita);

                    $TipoCita = $RowCitas["tipo"];
                    $Estado = $RowCitas["estado"];


                    if ($TipoCita == 0 || $TipoCita == 2) {
                        $icono = "fa-user";
                    } elseif ($TipoCita == 1) {
                        $icono = "fa-video-camera";
                    }

                    $estadoNom = "";

                    if ($Estado == 1) {
                        // $icono1 = "fa-image-portrait";
                        $icono1 = "none";
                    } elseif ($Estado == 2) {
                        // $icono1 = "fa-circle-check";
                        $icono1 = "none";
                    } elseif ($Estado == 3) {
                        // $icono1 = "fa-user-check";
                        $icono1 = "none";
                    } elseif ($Estado == 4) {
                        // $icono1 = "fa-user-xmark";
                        $icono1 = "none";
                    }

                    if ($Estado == 1) {
                        $iconEstado = "fa-ticket-alt";
                        $estadoNom = "Reservada";
                        $EstadoD = '#80d1f4';
                    } elseif ($Estado == 2) {
                        $iconEstado = "fa-circle-check";
                        $estadoNom = "Confirmada";
                        $EstadoD = "#ebff82";
                    } elseif ($Estado == 3) {
                        $iconEstado = "fa-check";
                        $estadoNom = "Asistida";
                        $EstadoD = "rgb(250, 181, 251)";
                    } elseif ($Estado == 4) {
                        $iconEstado = "fa-times";
                        $estadoNom = "No Puede Asistir";
                        $EstadoD = "rgb(251, 193, 179)";
                    } elseif ($Estado == 5) {
                        $iconEstado = "fa-times";
                        $estadoNom = "Cita Cancelada";
                        $EstadoD = "rgb(40 40 40 / 70%)";
                    } elseif ($Estado == 6) {
                        $iconEstado = "fa-clock";
                        $estadoNom = "Pendiente";
                        $EstadoD = "rgb(253, 137, 145)";
                    } elseif ($Estado == 7) {
                        $iconEstado = "fa-clock";
                        $estadoNom = "En espera";
                        $EstadoD = "rgb(182, 237, 128)";
                    }

                    $colorMotivo = (is_numeric($RowCitas["motivoConsulta"]) ?
                        funcionMaster($RowCitas["motivoConsulta"], 'id', 'Color', 'Motivos_Consulta') : $EstadoD);

                    $Prueba = "#FFFFFF";

                    $SucursalNombre = funcionMaster($RowCitas["sucursal"], "id", "descripcion", "sucursales");
                    if ($SucursalNombre == "") {
                        $SucursalNombre = "Ninguna/General.";
                    }

                    $usuario_nombre = funcionMaster($usuario_id_asignado, 'ID', 'NOMBRE_USUARIO', 'usuarios');

                    if ($MotivoConsulta == '') {
                        $MotivoConsulta = funcionMaster($RowCitas["odprocedimiento_id"], 'id', 'Nombre', 'OD_Procedimiento');
                        if ($MotivoConsulta == '') {
                            $MotivoConsulta = funcionMaster($RowCitas["sinvetrios_id"], 'ID', 'descripcion', 'sinvetrios');
                        }
                    }


                    if ($idCliente <> "0") {
                        $texto = "<div class='row'>";
                        //$texto .= "<div class='form-group col-md-4'> <a href='Historial_Clinico.php?clienteId={$idCliente}'target='blank' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'> Ver Historial </a> </div>";

                        //$texto .= "<div class='form-group col-md-4'> <a href='SclienteAdministracion_ControlPresupuesto?clienteId={$idCliente}' target='blank' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'> Ver Presupuesto </a> </div>";
                        //$texto .= "<div class='form-group col-md-4'> <a href='Historia_Clinica.php?clienteId={$idCliente}'target='blank' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'> Agregar Historia </a> </div>";
                        // $texto .= "<div class='form-group col-md-4'> <a href='#modalVarios' data-toggle='modal' data-target='#modalVarios' data-id={$idCitas} class=' btn-block btn btn-info btn-sm prueba'> Cambiar Doctor</a> </div>";
                        $texto .= "</div>";
                        $texto .= "<br><br> <label> Paciente: </label> {$Nombre}<br> <label> Fecha y Hora de la cita: </label> {$Fecha} {$Hora} <br> <label> Duracion: </label> {$Duracion} Minutos <br> <label> Cita Asignada por: </label> {$usuario_nombre} <br> <label> Motivo de Consulta: </label> {$MotivoConsulta} <br> <label> Sucursal: </label> {$SucursalNombre} <br>";
                    } else {
                        $texto = "<div class='form-group col-md-12'> <!--<a href='#' target='blank' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'> Crear Paciente en el Sistema </a>--></div>";
                        $texto .= "<br><br> <label> Paciente: </label> {$Nombre}<br> <label> Fecha y Hora de la cita: </label> {$Fecha} {$Hora} <br> <label> Duracion: </label> {$Duracion} Minutos <br> <label> Cita Asignada por: </label> {$usuario_nombre} <br> <label> Motivo de Consulta: </label> {$MotivoConsulta} <br> <label> Sucursal: </label> {$SucursalNombre} <br>";
                    }
                    //$texto .= "<br> <b>Duracion/Fecha de la cita:- {$nueva_fecha_cita}";

                    $botones = [
                        "1" => "<i class='fa fa-circle' style='padding: 0; color: rgb(119, 208, 250)'></i>",
                        "2" => "<i class='fa fa-circle' style='padding: 0; color: rgb(236, 190, 81)'></i>",
                        "3" => "<i class='fa fa-circle' style='padding: 0; color: rgb(250, 181, 251);'></i>",
                        "4" => "<i class='fa fa-circle' style='padding: 0; color: rgb(251, 193, 179);'></i>",
                        "5" => "<i class='fa fa-circle' style='padding: 0; color: rgb(40 40 40)'></i>",
                        "6" => "<i class='fa fa-circle' style='padding: 0; color: rgb(253, 137, 145)'></i>",
                        "7" => "<i class='fa fa-circle' style='padding: 0; color: rgb(182, 237, 128)'></i>"
                    ];
                    $botonesEstado = [
                        "1" => "Reservada",
                        "2" => "Confirmada",
                        "3" => "Asistida",
                        "4" => "No pudo Asistir",
                        "5" => "Cita Cancelada",
                        "6" => "Pendiente",
                        "7" => "En Espera"
                    ];
                    $bordeEstado = [
                        "1" => "style='border: 1px solid rgb(119, 208, 250)'",
                        "2" => "style='border: 1px solid rgb(236, 190, 81)'",
                        "3" => "style='border: 1px solid rgb(250, 181, 251)'",
                        "4" => "style='border: 1px solid rgb(251, 193, 179)'",
                        "5" => "style='border: 1px solid rgb(40 40 40)'",
                        "6" => "style='border: 1px solid rgb(253, 137, 145)'",
                        "7" => "style='border: 1px solid rgb(182, 237, 128)'"
                    ];
                    $btnGroup = '';
                    foreach ($botones as $key => $value) {
                        $btnGroup .= "<button type='button' style='border-radius: 0.5rem!important;' class='btn  shadow " . ($key == $Estado ? "btn-info" : 'btn-outline-info') . "' onclick='estadoDinamico({$idCitas}, {$key})' " . ($key == $Estado ? "{$bordeEstado[$Estado]}" : '') . " title='{$botonesEstado[$key]}'> {$value} " . ($key == $Estado ? "{$botonesEstado[$Estado]}" : '') . "</button>";
                    }
                    $texto .= "<br><br><div class='col-me-12' style='display: flex; justify-content: space-between; align-items: center;'>{$btnGroup}</div>";
                    $botonesPresencial = [
                        "0" => "No ha Ingresado",
                        "1" => "Ingresado",
                        "2" => "Retirado"
                    ];
                    $btnGroup = '';
                    foreach ($botonesPresencial as $key => $value) {
                        $btnGroup .= "<button type='button' class='btn  shadow " . ($key == $estadoPresencia ? "btn-info" : 'btn-outline-info') . "' style='width:33%;border-radius: 0.5rem!important;' onclick='presenciaDinamico({$idCitas}, {$key})' title='{$value}'> {$value} </button>";
                    }
                    $texto .= "<br><br><div class='col-me-12' style='display: flex; justify-content: space-around; align-items: center;'>{$btnGroup}</div>";
                    // if ($Estado > 6 || $Estado < 3) {
                    //     $texto .= "<br><div class='col-me-12'><label for='estadoToggle'>Cambiar Estado</label><select name='estadoToggle' id='estadoToggle' class='form-control input-lg select2' style='width: 100%' onchange='estadoDinamico({$idCitas}, this.value)'><option value='1' " . ($Estado == 1 ? 'selected' : '') . ">Reservada</option><option value='2' " . ($Estado == 2 ? 'selected' : '') . ">Confirmada</option><option value='3' " . ($Estado == 3 ? 'selected' : '') . ">Asistida</option><option value='4' " . ($Estado == 4 ? 'selected' : '') . ">No pudo Asistir</option><option value='5' " . ($Estado == 5 ? 'selected' : '') . ">Cita Cancelada</option><option value='6' " . ($Estado == 6 ? 'selected' : '') . ">Pendiente</option><option value='7' " . ($Estado == 7 ? 'selected' : '') . ">En Espera</option></select></div>";
                    // }
                    // $texto .= "<br><div class='col-me-12'><label for='estadoToggle'>Estado Presencial del Paciente</label><select name='estadoTogglePresencial' id='estadoTogglePresencial' class='form-control input-lg select2' style='width: 100%' onchange='presenciaDinamico({$idCitas}, this.value)'><option value='0' " . ($estadoPresencia == 0 ? 'selected' : '') . ">El Paciente aun no Asiste</option><option value='1' " . ($estadoPresencia == 1 ? 'selected' : '') . ">El paciente se encuentra Presente</option><option value='2' " . ($estadoPresencia == 2 ? 'selected' : '') . ">El Paciente se ha Retirado</option></select></div>";
                    // if ($Estado == '1') {
                    //     $texto .= "<br><a href='CL_Acciones.php?idCitas={$idCitas}&Tipo=Confirmar'><button type='button' class='btn btn-block btn-success btn-sm'>Confirmar</button></a>";
                    //     $texto .= "<br><a href='agregarCitas.php?editar_cita={$idCitas}'><button type='button' class='btn btn-block btn-warning btn-sm'>Editar Cita</button></a>";
                    //     // $texto .= "<br><a href='CancelarCita.php?idCitas={$idCitas}'><button type='button' class='btn btn-block btn-danger btn-sm'>Cancelar Cita</button></a>";
                    // }
                    // if ($Estado == '2') {
                    //     $texto .= "<br><a href='CL_Acciones.php?idCitas={$idCitas}&Tipo=Asistio'><button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'>Asistió</button></a>";
                    //     $texto .= "<br><a href='agregarCitas.php?editar_cita={$idCitas}'><button type='button' class='btn btn-block btn-warning btn-sm'>Editar Cita</button></a>";
                    //     // $texto .= "<br><a href='CancelarCita.php?idCitas={$idCitas}'><button type='button' class='btn btn-block btn-danger btn-sm'>Cancelar Cita</button></a>";
                    // }
                    // if ($Estado == '3') {
                    //     $texto .= "<br><button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'>Asistida</button></a>";
                    // }
                    // if ($Estado == '4') {
                    //     $texto .= "<br><button type='button' class='btn btn-block btn-warning btn-sm'>No Asistida</button></a> ";
                    //     // <i class='fa fa-cicle' style='color:{$EstadoD}'></i>
                    //     // . " Estado: {$estadoNom}"
                    // }

                    $texto .= "<hr> <button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow' onclick='AgregarNotas($idCitas)'>Agregar Notas</button>";

                    $texto .= "<br> <button type='button' class='btn btn-block btn-outline-info btn-lg rounded-pill shadow'  onclick='HistorialNotas($idCitas)'>Historial Notas</button>";
                    ?> {
                        id: '<?= $idCitas; ?>',
                        title: '<?php echo $Nombre . ' - ' . $MotivoConsulta; ?>', // a property!
                        start: '<?php echo $mi_fecha_cita; ?>', // a property!
                        end: '<?php echo $nueva_fecha_cita ?>',
                        icon: '<?php echo $icono ?>',
                        icon1: '<?php echo $icono1 ?>',
                        icon2: {
                            icon: '<?= $iconEstado ?>',
                            color: '<?= $EstadoD ?>',
                            estado: '<?= $estadoNom ?>'
                        },
                        resourceId: '<?php echo $doctor; ?>',
                        descripcion: "<?php echo $texto; ?>",
                        // className: ['<?php echo $EstadoD; ?>', '<?php echo $Prueba; ?>']
                        color: "<?= $colorMotivo ?>"
                        // color: "<?php echo $EstadoD; ?>"
                    },
                    <?php
                }
                ?>
            ],
            eventRender: function (event, element, view) {
                var i2 = document.createElement('i');
                i2.className = 'fa';
                i2.classList.add(event.icon2.icon);
                i2.style.color = "black !important";
                // i2.style.border = event.icon2.color;
                // ingresar texto a i2
                i2.innerHTML = ` ${event.icon2.estado}`;
                element.find('div.fc-content').prepend(i2);

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
            eventClick: function (calEvent, jsEvent, view) {
                $('#tituloEvento').html(calEvent.title);
                $('#descripcionEvento').html(calEvent.descripcion);
                $('#exampleModal').modal();
            },
            dayClick: function (date, jsEvent, view, resource) {
                // console.log(resource.id);
                let selectDoctor = document.getElementById('doctor_modal');
                for (let i = 0; i < selectDoctor.options.length; i++) {
                    if (selectDoctor.options[i].value == resource.id) {
                        selectDoctor.selectedIndex = i;
                        break;
                    }
                }
            },
            //header and other values
            select: function (start, end, allDay, element) {
                // console.log(element);
                FechaInicio = $.fullCalendar.formatDate(start, 'YYYY-MM-DD');
                FechaFinal = $.fullCalendar.formatDate(end, 'YYYY-MM-DD');

                HoraInicio = $.fullCalendar.formatDate(start, 'HH:mm');
                HoraFinal = $.fullCalendar.formatDate(end, 'HH:mm');

                /* Limpiar Datos Viejos */
                // console.log(date);
                // $('#createEventModal #doctor_modal').val();
                // $('#createEventModal #doctor_modal').select2('');
                $('#createEventModal #fecha_modal').val('');
                $('#createEventModal #div-results_modal').text('');
                $('#createEventModal #div-resultsHora_modal').text('');

                /* Nuevos Datos */
            
                $('#createEventModal #FechaInicio').val(FechaInicio);
                $('#createEventModal #Fechafinal').val(FechaFinal);
                $('#createEventModal #HoraInicio').val(HoraInicio);
                $('#createEventModal #HoraFinal').val(HoraFinal);
                $('#createEventModal').modal('show');

                CambiarMedico_modal();


                var b = moment(FechaInicio + 'T' + HoraInicio); //now
                var a = moment(FechaFinal + 'T' + HoraFinal);

                var resultInMinutes = a.diff(b, 'minutes');

                $.fn.modal.Constructor.prototype.enforceFocus = function () { };
              
                $('#duracion_modal').append(
                    `<option value="${resultInMinutes}">${resultInMinutes}</option>`);
                $('#duracion_modal').select2({
                    tags: true,
                    createTag: function (params) {
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

        $('.fc-title').css('font-size', '(12px + 1vw)');
        $('.fc-resource-cell').css('font-size', '(12px + 1vw)');
        // $('.fc-widget-header').css('width','100px');
        // $('.fc table').css('layout', 'auto');

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
<style>
        .fc-resource-cell {
            width: 100% !important;            /* Asegura que ocupe el 100% de la celda */
            white-space: nowrap !important;    /* Evita que el texto se divida en varias líneas */
            overflow: hidden !important;       /* Oculta el desbordamiento del texto */
            text-overflow: ellipsis !important;/* Añade "..." si el texto es muy largo */
            font-size: 14px !important;        /* Ajusta el tamaño de la fuente según tus necesidades */
            text-align: center !important;     /* Centra el texto en la celda */
        }
    </style>
<!-- scripts para el menu normal de agendamiento -->
<script type="text/javascript">
    function verDia() {

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var sucursal = $("#sucursal").val();
        var sucursal = $("#sucursal").val();

        if (sucursal === "") {
            sucursal = 0;
        }

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
            success: function (response) {
                $('#div-results').html(response);
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Manejar el error aquí
                console.log("Error en la petición AJAX:", textStatus, errorThrown);
            }

        });
        $('#div-resultsHora').html("");

    };

    function verHora() {

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();
        var doctor = $("#doctor").val();
        var sucursal = $("#sucursal").val();


        if (sucursal === "") {
            sucursal = 0;
        }

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
            success: function (response) {
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
            success: function (response) {
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

    $(document).ready(function () {

        $('#duracion').select2({
            tags: true,
            createTag: function (params) {
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

        let fecha = $("#fecha_modal").val();
        let Hora = $("#Hora_modal").val();
        let usuario_id = $("#usuario_id_modal").val();
        let doctor = $("#doctor_modal").val();

        let HoraInicio = $("#HoraInicio").val();
        let HoraFinal = $("#HoraFinal").val();
        let sucursal = $("#sucursal").val();
        console.log(HoraInicio,HoraFinal);

        if (sucursal === "") {
            sucursal = 0;
        }

        $.ajax({
            type: "POST",
            url: "CL_Ajax.php",
            data: {
                fecha: fecha,
                Hora: Hora,
                usuario_id: usuario_id,
                doctor: doctor,
                sucursal: sucursal,
                HoraInicio: HoraInicio,
                HoraFinal: HoraFinal,
                Tipo: "Disponibilidad_Modal"
            },
            success: function (response) {
                $('#div-results_modal').html(response);
                verHora_modal();
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Manejar el error aquí
                console.log("Error en la petición AJAX:", textStatus, errorThrown);
            }
        });
    };

    function verHora_modal() {

        var fecha = $("#fecha_modal").val();
        var Hora = $("#Hora_modal").val();
        var usuario_id = $("#usuario_id_modal").val();
        var doctor = $("#doctor_modal").val();
        var sucursal = $("#sucursal").val();

        if (sucursal === "") {
            sucursal = 0;
        }

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
            success: function (response) {
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
            success: function (response) {
                $('#div-resultsCliente_modal').html(response);
            }
        });
    };

    function CambiarMedico_modal() {
        console.log("Estoy dentro de la funcion");
        document.getElementById('div_fecha_modal').style.display = 'block';
        document.getElementById('fecha_modal').value = document.getElementById('FechaInicio').value;

        var Hora = document.getElementById('Hora_modal');
        if (Hora !== null) {
            document.getElementById('Hora_modal').value = '';
        }

        verDia_modal();

    }
</script>
<style>
    .colormodal {
        background-color: #3390FF;
        color: white;
    }
</style>
<br><!-- Modal -->
<div class="container">
    <!-- Modal -->
    <div class="modal fade modalB" id="modalVarios" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header colormodal">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" align="center"><strong>Cambiar Medico</strong></h4>
                </div>
                <form action="Cambiar_Medico.php" method="POST">
                    <input type="hidden" id="cita_id" name="cita_id">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">


                                <div class="form-group col-md-12">
                                    <div align="left"><strong>Usuario</strong></div>
                                    <select id="medico" name="medico" class="select2 form-control input-lg"
                                        style="width: 100%;" required>
                                        <option value="" selected>Selecione...</option>
                                        <?php
                                        usuariosEspecialistasSelect();
                                        ?>
                                    </select>
                                </div>

                            </div>
                        </div>



                    </div>
                    <div class="modal-footer">

                        <button type="button" class="btn btn-block btn-outline-info  rounded-pill shadow"
                            data-dismiss="modal">Close</button>
                        <button class="btn btn-block btn-outline-info rounded-pill shadow" type="submit" name="submit"
                            value="Submit">Aceptar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<?php
include "./modalServicios.php";
// include "footer.php";
include ("./ajaxCreadorSelect.php");
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
    // window.addEventListener('load', () => {
    //     Select2Dinamico(
    //         "select[name='motivoConsulta']", {
    //             selectFrom: "<?= Encriptar("*") ?>",
    //             name: "<?= Encriptar("Motivos_Consulta") ?>",
    //             value: "<?= Encriptar("id") ?>",
    //             text: "<?= Encriptar("descripcion") ?>",
    //             likeWhere: "<?= Encriptar("descripcion") ?>",
    //             order: "<?= Encriptar(json_encode(['order by' => 'id'])) ?>",
    //             clausula: {
    //                 data: "<?= Encriptar("Activo = 1") ?>",
    //                 value: [''],
    //             },
    //             carapter: "true",
    //             regAdicional: btoa(JSON.stringify({
    //                 position: "top", // bottom
    //                 data: [{
    //                     id: "nuevo",
    //                     text: "Crear Nuevo Servicio"
    //                 }]
    //             })),
    //         }, false, false
    //     );
    // });

    $(document).on('click', '.prueba', function () {
        console.log($(this).data('resource-id'));

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
                success: function (response) {
                    console.log(response);
                    if (response.status) {
                        for (const key in object = response.data[0]) {
                            if (Object.hasOwnProperty.call(object, key)) {
                                if (key == mascara) {
                                    $(`#${key}`).val([object[key]]).trigger("change.select2");
                                    if ($(`#${key}`).val() != object[key]) {
                                        $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[
                                            key]]).trigger("change.select2");
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
            success: function (response) {
                if (response.status) {
                    if (estado == 3) {
                        let clienteId = btoa(id); // Cambio de base64_encode a btoa

                        $.ajax({
                            url: "ajax_enviarwhatsapp.php",
                            data: data,
                            type: "POST",
                            dataType: "json",
                            success: function (response) {
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
            success: function (response) {
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
            success: function (response) {
                if (response.status) {
                    let campos = ["CODI_CLIENTE", "nombre", "correo", "telefono", "correo", "telefono"];
                    campos.forEach(element => {
                        $(`input[name='${element}']`).val('');
                    });
                    $(".box-info-content").html(
                        "<span class='text-danger'>Paciente ya se encuentra Registrado</p>");
                    setTimeout(function () {
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
                }).success(function (response) {
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
            didOpen: function () {
                var accordion = $('#accordion');
                $.ajax({
                    url: 'CL_Ajax_Calendario.php',
                    type: 'POST',
                    data: {
                        Tipo_Consulta: "Historial Notas Adicionales",
                        idCitas: idCitas,
                    },
                    success: function (data) {
                        var data = JSON.parse(data);
                        var contador = 0;
                        $.each(data, function (i, cita) {
                            var fecha = cita.Fecha;
                            var hora = cita.Hora;
                            var Nota = cita.Nota;
                            Nota = Nota.replace(/\n/g, "<br>");
                            var detalleId = 'detalle' + i;
                            html = `
                                            <div class="panel panel-default" id="collapse_` + detalleId +
                                `">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"  href="#` +
                                detalleId +
                                `"  aria-expanded="true" aria-controls="` + detalleId + `">
                                                        <div class="row">
                                                        <i id="icono-panel" class="fa-regular fa-note-sticky fa-rotate-180" style='float:left;'></i>
                                                        <label id="label-panel"> Fecha: ` + fecha + ` Hora: ` + hora + `</label>
                                                        <i id="icono-panel" class="fa fa-chevron-down" style='float:right;'></i>
                                                        </div>
                                                    </a>
                                                    </h4>
                                                </div>
                                                <div id="` + detalleId +
                                `" class="panel-collapse collapse" role="tabpanel" aria-labelledby="` +
                                detalleId + `" aria-expanded="true" style="height: 0px;">
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
                    error: function (xhr, status, error) {
                        console.error(xhr.responseText);
                    }
                });
            }
        });
    }
</script>
<script>
    (function () {
        var searchTerm, panelContainerId;
        // Create a new contains that is case insensitive
        $.expr[':'].containsCaseInsensitive = function (n, i, m) {
            return jQuery(n).text().toUpperCase().indexOf(m[3].toUpperCase()) >= 0;
        };

        $('#accordion_search_bar').on('change keyup paste click', function () {
            searchTerm = $(this).val();
            $('#accordion > .panel').each(function () {
                panelContainerId = '#' + $(this).attr('id');
                $(panelContainerId + ':not(:containsCaseInsensitive(' + searchTerm + '))').hide();
                $(panelContainerId + ':containsCaseInsensitive(' + searchTerm + ')').show();
            });
        });
    }());
</script>

<!-- <link rel="stylesheet" href="css/AccordionNuevo.css"> -->
<link rel="stylesheet" href="css/AccordionNuevo.css?v=<?= rand(1, 10000); ?>">

<style>
    .rotar-texto {
        writing-mode: vertical-rl;
        text-orientation: upright;
    }

</style>

<script>
    $(document).ready(function () {
        $(".fc-resource-cell").each(function () {
            if ($(this).width() < 57) {
                $(this).addClass("rotar-texto");
            }
        });
    });
</script>