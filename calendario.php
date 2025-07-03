<?php
include 'header.php';
include 'menu.php';
?>



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

        <form action="guardarCita2.php" method="POST" name="formularioActualizarcliente">
          <div class="box box-body">

            <div class="form-group col-md-12">
              <div align="left"><strong>Usuario</strong></div>
              <select id="doctor" name="doctor" class="select2 form-control input-lg" style="width: 100%;" required onchange="CambiarMedico()">
                <option value="" selected>Selecione...</option>
                <?php
                usuariosEspecialistasSelect();
                ?>
              </select>
            </div>

            <div id="div_fecha" class="form-group col-md-12" style="display:none;">
              <div align="left"><strong>Fecha</strong></div>
              <input type="date" class="form-control input-lg" name="fecha" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();" required>
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
          </div>

        </form>

        <font color="#F00000"> Presencial * </font> <br>
        <font color="#000000"> Virtual ** </font> <br>

        <font color="#FF6600"> Por Confirmar <i class="fa fa-circle"></i> </font> <br>
        <font color="#006600"> Confirmado <i class="fa fa-circle"></i> </font> <br>

        <!-- 
<font color="#0000FF"> Asistio     <i class="fa fa-circle"></i>   </font>  <br>
<font color="#FF0000">  No Asistio     <i class="fa fa-circle"></i>   </font>  <br>
-->
        <br><br><br>



      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="box box-primary">
          <div class="box-body no-padding">
            <!-- THE CALENDAR -->
            <?php if ($_SESSION['ID'] == '1') : ?>
              <div class="container-fluid">
                <div align="left">Calendario de:</div>
                <select name="calendario_usuario" id="calendario_usuario" class="form-control select2" style="width:100%;color:black" onchange="window.location='calendario.php?usuario_id='+this.value">
                  <?php $nombreusuario = funcionMaster($_GET["usuario_id"], 'ID', 'NOMBRE_USUARIO', 'usuarios');
                  $idusuario = $_GET['usuario_id'];

                  if ($_GET['usuario_id'] <> "") {

                    echo "<option value='$idusuario' selected>$nombreusuario</option>";
                    echo "<option value=''>Todos</option>";
                  } else {
                    echo "<option value='' selected>Todos</option>";
                    usuariosEspecialistasSelect();
                  }

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
<!-- /.content-wrapper -->
<style type="text/css">
  .fc-time-grid-event .fc-content {
    display: flex;
  }

  .fc-time-grid .fc-bgevent,
  .fc-time-grid .fc-event {
    height: 17px;
  }
</style>
<footer class="main-footer">

  <div class="pull-right hidden-xs">


    <!--             -->
  </div>
  <strong>Copyright &copy; 2018 All rights
    reserved. <strong>Diseñado por <a href="http://medicalsoftcolombia.com">SievenSoft</a></strong>




</footer>

<!-- /.control-sidebar -->
<!-- Add the sidebar's background. This div must be placed
    immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<script>
  $(function() {

    //Initialize Select2 Elements
    $(".select2").select2();
  });
</script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
<!-- Slimscroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- fullCalendar 2.2.5 -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/fullcalendar/fullcalendar.min.js"></script>

<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.css' rel='stylesheet' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.print.css' rel='stylesheet' media='print' />
<link href='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.css' rel='stylesheet' />
<script src='https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js'></script>

<script src='https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js'></script>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar-scheduler@1.10.1/dist/scheduler.min.js'></script>
<!-- Page specific script -->
<!--
<script>
$(function () {

/* initialize the external events
  -----------------------------------------------------------------*/
function ini_events(ele) {
  ele.each(function () {

    // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
    // it doesn't need to have a start or end
    var eventObject = {
      title: $.trim($(this).text()) // use the element's text as the event title
    };

    // store the Event Object in the DOM element so we can get to it later
    $(this).data('eventObject', eventObject);

    // make the event draggable using jQuery UI
    $(this).draggable({
      zIndex: 1070,
      revert: true, // will cause the event to go back to its
      revertDuration: 0  //  original position after the drag
    });

  });
}

ini_events($('#external-events div.external-event'));

/* initialize the calendar
  -----------------------------------------------------------------*/
//Date for the calendar events (dummy data)
var date = new Date();
var d = date.getDate(),
    m = date.getMonth(),
    y = date.getFullYear();
$('#calendar').fullCalendar({
  header: {
    left: 'prev,next today',
    center: 'Titulo',
    right: 'month,agendaWeek,agendaDay'
  },
  buttonText: {
    today: 'Todo',
    month: 'Mes',
    week: 'Semana',
    day: 'Dia'
  },
  //Random default events
  events: [

  <?php

  $ID = $_SESSION['ID'];


  $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


  $queryList = mysqli_query($conn3, "SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and usuario_id = $ID order by fecha asc ");
  //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

  $nrowl = mysqli_num_rows($queryList);

  while ($row_recordset32 = mysqli_fetch_array($queryList)) {

    $fecha = $row_recordset32['fecha'];
    $Hora = $row_recordset32['Hora'];
    $nombre = $row_recordset32['nombre'];

    $motivoConsulta = $row_recordset32['motivoConsulta'];
    $estadoD = $row_recordset32['estado'];

    $tipo = $row_recordset32['tipo'];

    if ($tipo == 0) {
      $tipoE = '*';
    } elseif ($tipo == 1) {
      $tipoE = '**';
    }



    if ($estadoD == 0) {
      $Estado = "#FF6600";
    } elseif ($estadoD == 1) {
      $Estado = "#FF6600";
    } elseif ($estadoD == 2) {
      $Estado = "#006600";
    } elseif ($estadoD == 3) {
      $Estado = "#FF0000";
    }


    /*          echo '     
                  
                  A|'.substr($fecha, 0,4).' </td>
                  M|'.substr($fecha, 5,2).' </td>
                    D|'.substr($fecha, 8,2).' </td>
                  H|'.substr($Hora, 0,2).'</td>
                  M|'.substr($Hora, 3,2).'</td>
                  D|'.$nombre.'</td>
                D2'.$motivoConsulta.'<br>';
              }  
*/







    $Mes =  substr($fecha, 5, 2);
    if ($Mes <= 12 and $Mes >= 1) {
      $Mes = $Mes - 1;
    } elseif ($Me == 1) {
      $Mes = 12;
    }
  ?>

    {
      title: '<?php echo  '' . $tipoE . ' ' . $nombre . '-' . $motivoConsulta ?>',
      start: new Date(<?php echo substr($fecha, 0, 4) ?>, <?php echo $Mes ?>, <?php echo substr($fecha, 8, 2) ?>, <?php echo substr($Hora, 0, 2) ?>, <?php echo substr($Hora, 3, 2) ?>),
      // start: new Date(2018, 9, 28,10, 00),
      allDay: false,
      backgroundColor: "<?php echo $Estado ?>", //Blue
      borderColor: "#0073b7" //Blue
    },

    {
      title: '1',
      start: new Date(2019, 7,21, 10, 00),
      allDay: false,
      backgroundColor: "#FF0000", //Blue
      borderColor: "#FF0000" //Blue
    },
<?php

  }
?>

    {
      title: 'asdadasdasdasd',
      start: new Date(2019, 07,21, 10, 00),
      allDay: false,
      backgroundColor: "#FF0000", //Blue
      borderColor: "#FF0000" //Blue
    },

  ],
  editable: false, // Funcion para editar 
  droppable: false, // this allows things to be dropped onto the calendar !!!
  drop: function (date, allDay) { // this function is called when something is dropped

    // retrieve the dropped element's stored Event Object
    var originalEventObject = $(this).data('eventObject');

    // we need to copy it, so that multiple events don't have a reference to the same object
    var copiedEventObject = $.extend({}, originalEventObject);

    // assign it the date that was reported
    copiedEventObject.start = date;
    copiedEventObject.allDay = allDay;
    copiedEventObject.backgroundColor = $(this).css("background-color");
    copiedEventObject.borderColor = $(this).css("border-color");

    // render the event on the calendar
    // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
    $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

    // is the "remove after drop" checkbox checked?
    if ($('#drop-remove').is(':checked')) {
      // if so, remove the element from the "Draggable Events" list
      $(this).remove();
    }

  }
});

/* ADDING EVENTS */
var currColor = "#3c8dbc"; //Red by default
//Color chooser button
var colorChooser = $("#color-chooser-btn");
$("#color-chooser > li > a").click(function (e) {
  e.preventDefault();
  //Save color
  currColor = $(this).css("color");
  //Add color effect to button
  $('#add-new-event').css({"background-color": currColor, "border-color": currColor});
});
$("#add-new-event").click(function (e) {
  e.preventDefault();
  //Get value and make sure it is not null
  var val = $("#new-event").val();
  if (val.length == 0) {
    return;
  }

  //Create events
  var event = $("<div />");
  event.css({"background-color": currColor, "border-color": currColor, "color": "#fff"}).addClass("external-event");
  event.html(val);
  $('#external-events').prepend(event);

  //Add draggable funtionality
  ini_events(event);

  //Remove event from text input
  $("#new-event").val("");
});
});
</script>
-->

<script>
  $(function() {

    /* initialize the external events
    -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function() {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        };

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject);

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex: 1070,
          revert: true, // will cause the event to go back to its
          revertDuration: 0 //  original position after the drag
        });

      });
    }

    ini_events($('#external-events div.external-event'));

    /* initialize the calendar
    -----------------------------------------------------------------basicDay OR agendaDay*/
    //Date for the calendar events (dummy data)
    var date = new Date();
    var d = date.getDate(),
      m = date.getMonth(),
      y = date.getFullYear();
    $('#calendar').fullCalendar({
      slotDuration: '00:15:00',
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
      //Random default events
      events: [

        <?php

        $ID = $_SESSION['ID'];


        $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));


        // $queryList=mysqli_query($conn3,"SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and usuario_id = $ID order by fecha asc ");
        $queryList = mysqli_query($conn3, "SELECT * FROM  citas");

        $nrowl = mysqli_num_rows($queryList);

        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
          $idCitas = $row_recordset32['idCitas'];
          $idCliente = $row_recordset32['idCliente'];
          $fecha = $row_recordset32['fecha'];
          $Hora = $row_recordset32['Hora'];
          $nombre = $row_recordset32['nombre'];
          $medico = $row_recordset32['medico'];


          $motivoConsulta = $row_recordset32['motivoConsulta'];
          $sugerencias = $row_recordset32['sugerencias'];
          $notas = $row_recordset32['notas'];
          $estadoD = $row_recordset32['estado'];

          $tipo = $row_recordset32['tipo'];

          $cubiculo = $row_recordset32['cubiculo'];

          $doctor = $row_recordset32['doctor'];
          $usuario = $row_recordset32['usuario_id'];










          $queryListu = mysqli_query($conn3, "SELECT * FROM  usuarios where ID=$usuario");
          //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

          $nrowlu = mysqli_num_rows($queryListu);

          while ($row_recordset = mysqli_fetch_array($queryListu)) {

            $NUSU = $row_recordset['NOMBRE_USUARIO'];
          }


          $queryListM = mysqli_query($conn3, "SELECT * FROM  usuarios where ID=$doctor");
          //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

          $nrowlM = mysqli_num_rows($queryListM);

          while ($row_recordsetM = mysqli_fetch_array($queryListM)) {

            $sucursal = $row_recordsetM['NOMBRE_USUARIO'];
          }


          $queryListM = mysqli_query($conn3, "SELECT * FROM  medicos where ID=$medico");
          //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

          $nrowlM = mysqli_num_rows($queryListM);

          while ($row_recordsetM = mysqli_fetch_array($queryListM)) {

            $NMEDICO = $row_recordsetM['nombre'];
            $especilidad = $row_recordsetM['especialidad'];
          }

          if ($especilidad == 'OdontologÃ­a') {
            $historia = 47;
          }
          if ($especilidad == 'Ortodoncia') {
            $historia = 48;
          }
          if ($especilidad == 'Endodoncia') {
            $historia = 50;
          }
          if ($especilidad == 'Implantologia') {
            $historia = 47;
          }
          if ($especilidad == 'Cirugia bucal') {
            $historia = 47;
          }
          if ($especilidad == 'Periodoncia') {
            $historia = 49;
          }
          if ($especilidad == 'Ortopedia') {
            $historia = 47;
          }
          if ($especilidad == 'Rehabilitaciòn Oral') {
            $historia = 47;
          }
          if ($especilidad == 'Odontopediatria') {
            $historia = 47;
          }
          if ($especilidad == 'Armonisacion orofacial') {
            $historia = 47;
          }







          if ($tipo == 0) {
            $tipoE = '*';
          } elseif ($tipo == 1) {
            $tipoE = '**';
          }



          if ($estadoD == 0) {
            $Estado = "#FF6600";
          } elseif ($estadoD == 1) {
            $Estado = "#FF6600";
          } elseif ($estadoD == 2) {
            $Estado = "#006600";
          } elseif ($estadoD == 3) {
            $Estado = "#0099ff";
          } elseif ($estadoD == 4) {
            $Estado = "#FF0000";
          }



          /*          echo '     
                  
                  A|'.substr($fecha, 0,4).' </td>
                  M|'.substr($fecha, 5,2).' </td>
                    D|'.substr($fecha, 8,2).' </td>
                  H|'.substr($Hora, 0,2).'</td>
                  M|'.substr($Hora, 3,2).'</td>
                  D|'.$nombre.'</td>
                D2'.$motivoConsulta.'<br>';
              }  
*/







          $Mes =  substr($fecha, 5, 2);
          if ($Mes <= 12 and $Mes >= 1) {
            $Mes = $Mes - 1;
          } elseif ($Mes == 1) {
            $Mes = 12;
          }
        ?>

          {
            title: '<?php echo  '' . $tipoE . ' ' . $nombre . '-' . $motivoConsulta . ' ' . $idCliente ?>',
            start: new Date(<?php echo substr($fecha, 0, 4) ?>, <?php echo $Mes ?>, <?php echo substr($fecha, 8, 2) ?>, <?php echo substr($Hora, 0, 2) ?>, <?php echo substr($Hora, 3, 2) ?>),
            // start: new Date(2018, 9, 28,10, 00),
            resourceIds: ['<?php echo $cubiculo; ?>'],

            descripcion: '<div class="form-group col-md-4"> <a href="Historial_Clinico.php?clienteId=<?php echo $idCliente ?>&idHistoria=<?php echo $historia ?> "target="blank" class="btn btn-block btn-primary btn-sm"> Ver Historial </a> </div><div class="form-group col-md-4"> <a href="SclienteAdministracion_ControlPresupuesto?clienteId=<?php echo $idCliente ?>" target="blank" class="btn btn-block btn-primary btn-sm"> Ver Presupuesto </a> </div><div class="form-group col-md-4"> <a href="Historia_Clinica.php?clienteId=<?php echo $idCliente ?>"target="blank" class="btn btn-block btn-primary btn-sm"> Agregar Historia</a> </div><br><br><?php echo 'Fecha y Hora de la cita:' . $fecha . '-' . $Hora . '<br> Sucursal:' . $sucursal . '<br> Cubículo:' . $cubiculo . '<br>  Paciente:' . $nombre . '<br> Motivo de consulta:' . $motivoConsulta . '<br> Tratamiento:' . $sugerencias . ' <br> Notas:' . $notas . '<br>Profesional:' . $NMEDICO . '<br>Persona que agendó:' . $NUSU ?> <br><br><br> <div class="form-group col-md-12">   <input type="text" class="form-control input-lg" name="sugerencia" placeholder="Tratamiento" value=""> </div> <br><br> <div class="form-group col-md-12">   <input type="text" class="form-control input-lg" name="notas" placeholder="Notas"  value=""> <br><br> <?php
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  if ($estadoD == '1') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '<a href="Confirmarcita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-success btn-sm">Confirmar</button></a>';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  if ($estadoD == '2') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '<a href="asistioCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-primary btn-sm">Asistió</button></a>';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  if ($estadoD == '3') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '<button type="button" class="btn btn-block btn-primary btn-sm">Asistida</button></a>';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  if ($estadoD == '4') {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    echo '<button type="button" class="btn btn-block btn-warning btn-sm">No Asistida</button></a> ';
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  }



                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  ?>
            <?php

            if ($estadoD == '3' or $estadoD == '4') {
              echo ' ';
            } else {
              echo '<a href="eliminarCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-danger btn-sm">No Asistio</button></a> <input  type="hidden" name="idCitas"  value="' . $idCitas . '">';
            }

            ?> ',
            allDay: false,
            backgroundColor: "<?php echo $Estado ?>", //Blue
            borderColor: "#0073b7" //Blue
          },

          {
            title: '1',
            start: new Date(2019, 7, 21, 10, 00),
            allDay: false,
            backgroundColor: "#FF0000", //Blue
            borderColor: "#FF0000" //Blue
          },
        <?php

        }
        ?>

        {
          title: 'asdadasdasdasd',
          start: new Date(2019, 07, 21, 10, 00),
          allDay: false,
          backgroundColor: "#FF0000", //Blue
          borderColor: "#FF0000" //Blue
        },

      ],
      /*
      resources: [
        { id: '1', title: 'Cubiculo 1' },
        { id: '2', title: 'Cubiculo 2' },
        { id: '3', title: 'Cubiculo 3' },
        { id: '4', title: 'Cubiculo 4' },
        { id: '5', title: 'Cubiculo 5' },
        { id: '6', title: 'Cubiculo 6' },
        { id: '7', title: 'Cubiculo 7' },
        { id: '8', title: 'Cubiculo 8' },

      ],
      */

      eventClick: function(calEvent, jsEvent, view) {
        $('#tituloEvento').html(calEvent.title);
        $('#descripcionEvento').html(calEvent.descripcion);
        $('#exampleModal').modal();
      },



      editable: false, // Funcion para editar 
      droppable: false, // this allows things to be dropped onto the calendar !!!
      drop: function(date, allDay) { // this function is called when something is dropped

        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject');

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject);

        // assign it the date that was reported
        copiedEventObject.start = date;
        copiedEventObject.allDay = allDay;
        copiedEventObject.backgroundColor = $(this).css("background-color");
        copiedEventObject.borderColor = $(this).css("border-color");

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true);

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove();
        }

      }



    });

    /* ADDING EVENTS */
    var currColor = "#3c8dbc"; //Red by default
    //Color chooser button
    var colorChooser = $("#color-chooser-btn");
    $("#color-chooser > li > a").click(function(e) {
      e.preventDefault();
      //Save color
      currColor = $(this).css("color");
      //Add color effect to button
      $('#add-new-event').css({
        "background-color": currColor,
        "border-color": currColor
      });
    });
    $("#add-new-event").click(function(e) {
      e.preventDefault();
      //Get value and make sure it is not null
      var val = $("#new-event").val();
      if (val.length == 0) {
        return;
      }

      //Create events
      var event = $("<div />");
      event.css({
        "background-color": currColor,
        "border-color": currColor,
        "color": "#fff"
      }).addClass("external-event");
      event.html(val);
      $('#external-events').prepend(event);

      //Add draggable funtionality
      ini_events(event);

      //Remove event from text input
      $("#new-event").val("");
    });
  });
</script>



<script type="text/javascript">
  function verDia() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();
    var doctor = $("#doctor").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidad.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id,
        doctor: doctor
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };

  function verHora() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();
    var doctor = $("#doctor").val();

    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "disponibilidadHora.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id,
        doctor: doctor
      },
      success: function(response) {
        $('#div-resultsHora').html(response);

      }
    });
  };

  function verificarCliente() {
    // estas son las variables que enviamos

    var identificacion = $("#clienteId").val();


    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "ajax_cliente.php",
      data: {
        identificacion: identificacion
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
</script>

<script>
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
        console.log(params.term.search('/[0-9]/'));


      }
    });

  });
</script>


<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="tituloEvento"> </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="Guardar_agenda.php" method="POST" name="formularioActualizarcliente">
        <div class="modal-body">

          <div id="descripcionEvento"></div>
        </div>
        <div class="modal-footer">
          <center><button type="submit" class="btn btn-block btn-primary btn-sm">
              <h5> <strong> G u a r d a r </strong> </h5>
            </button></center>
          <!--  <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>-->
        </div>
      </form>
    </div>
  </div>
</div>



</body>

</html>