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
                <select id="clienteId" name="clienteId"class="form-control select2" style="width: 100%;"  onChange="verificarCliente();" required>
                    <option value="" selected="selected">Seleccione un paciente ...</option>
                    <?php
                    $queryList=mysqli_query($conn3,"SELECT * FROM  cliente");
                    $nrowl=mysqli_num_rows($queryList);
                    while($row_recordset32A=mysqli_fetch_array($queryList))
                    {
                      $cod= $row_recordset32A['cliente_id'];
                      $nombre= $row_recordset32A['nombre_cliente'];

                      echo "<option value='$cod'> $nombre </option>";
                    }
                    ?>
                </select>
              </div>

              <div  class="col-md-12" id="div-resultsCliente"></div>

              <div class="form-group col-md-12">
                <div align="left"><strong>Tiempo de Cita</strong></div>
                <select id="duracion" name="duracion" class="form-control select2"  data-placeholder="Seleccione el tiempo en minutos" style="width: 100%;" required>
                  <option value="<?php echo $duracion?>"> <?php echo categoria($duracion)?>  </option>
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
           <!--<a class="btn btn-block btn-primary btn-sm" href="https://medicalsoftplus.com/baseDev/nuevoPaciente?calendario=1">
             <h4>Registrar Paciente </h4>
           </a>-->


         </div>
         <!-- /.col -->
         <div class="col-md-9">
           <div class="box box-primary">
             <div class="box-body no-padding">
              <!-- THE CALENDAR -->
              <?php if($_SESSION['ID']=='1'):?>
              <div class="container">
                <div align="left">Calendario de:</div>
                <select name="calendario_usuario" id="calendario_usuario" class="form-control select2"  style="width:100%;color:black" onchange="window.location='calendario.php?usuario_id='+this.value">
                  <?php $nombreusuario = funcionMaster($_GET["usuario_id"],'ID','NOMBRE_USUARIO','usuarios');
                        $idusuario = $_GET['usuario_id'];
                  
                  if($_GET['usuario_id']<>"")
                  {

                    echo "<option value='$idusuario' selected>$nombreusuario</option>";
                    echo "<option value=''>Todos</option>";

                  }
                  else
                  {
                    echo "<option value='' selected>Todos</option>";
                    usuariosEspecialistasSelect();
                  }
                  
                  ?>
                </select>
              </div>
              <?php endif;?>

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
<script src='plugins/fullcalendar1/fullcalendar.min.3.10.2.js'></script>
<script src='plugins/fullcalendar1/locale-all.3.10.2.js'></script>
    <!-- Select2 -->
  <script src="plugins/select2/select2.full.min.js"></script>
  <script>
    $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();
    });
  </script>


   
<script>
$(document).ready(function() {

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

      var calendar = $('#calendar').fullCalendar({
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'Todo',
        month: 'Mes',
        week: 'Semana',
        day: 'Dia'
      },
      slotDuration: '00:15:00',
      minTime: '08:00:00',
      maxTime: '20:15:00',
      locale: 'es-us',
      height: 1080,
      editable: true,
        selectable: true,
      //header and other values
      select: function(start, end, allDay) {
          endtime = $.fullCalendar.formatDate(end,'YYYY-MM-DD');
          starttime = $.fullCalendar.formatDate(start,'YYYY-MM-DD');
          var mywhen = starttime + ' - ' + endtime;
          $('#createEventModal #apptStartTime').val(start);
          $('#createEventModal #apptEndTime').val(end);
          $('#createEventModal #apptAllDay').val(allDay);
          $('#createEventModal #when').text(mywhen);
          $('#createEventModal').modal('show');
       },
       events: [

      <?php

$ID = $_SESSION['ID'];
 

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


                  $queryList=mysqli_query($conn3,"SELECT * FROM  citas  where (estado  = 1 or estado  = 2) and doctor = $ID order by fecha asc ");
                //  $queryList=mysqli_query($conn3,"SELECT * FROM  citas");

                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {
                       
                      $fecha= $row_recordset32['fecha'];
                      $Hora= $row_recordset32['Hora'];
                      $horaF= $row_recordset32['horaF'];
                      $duracion= $row_recordset32['duracion'];
                      $nombre= $row_recordset32['nombre'];
            
                      $motivoConsulta= $row_recordset32['motivoConsulta'];
                      $estadoD= $row_recordset32['estado'];
  
                      $tipo= $row_recordset32['tipo'];
                      $doctor= $row_recordset32['doctor'];

                      $id_procedimiento = $row_recordset32['nombre_proce'];

                      $Color_Medico="";
                      if(funcionMaster($Doctor, 'ID', 'color_citas', 'usuarios')<>"")
                      {
                        $Color_Medico = 'style="background-color:'.funcionMaster($Doctor, 'ID', 'color_citas', 'usuarios').'"';
                      }
                       
                       if ($tipo == 0) {
                         $tipoE = '*';
                       }
                       elseif ($tipo == 1) {
                         $tipoE = '**';
                       }

 

if ($estadoD==0) {
  $Estadob = "#FF6600";
  
}
elseif ($estadoD==1) {
  $Estadob = "orange";
  
}
elseif ($estadoD==2) {
  $Estadob = "green";
  
}
elseif ($estadoD==3) {
  $Estadob = "red";

}


if($doctor=="1")
{
  $Estado = "#B649F7";
}
elseif($doctor=="219")
{
  $Estado = "#7FB3D5";
}
elseif($doctor=="220")
{
  $Estado = "pink";
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





                 

     $Mes =  substr($fecha, 5,2);
if ($Mes<=12 and $Mes>=1 ) 
  {$Mes= $Mes-1;}
elseif ($Mes ==1) {
  $Mes=12;
}

$fecha_cita=$fecha;
$hora_cita=$Hora;
$minutos_cita=$duracion;
if($minutos_cita==""){$minutos_cita="20";}
$mi_fecha_cita= date("{$fecha_cita} {$hora_cita}"); 
$nueva_fecha_cita = strtotime ( "+{$minutos_cita} minute" , strtotime ($mi_fecha_cita) ) ;  
$nueva_fecha_cita = date ( 'Y-m-d H:i:s' , $nueva_fecha_cita); 

      ?>

        {
          title: '<?php echo  ''.$tipoE.' '.$nombre.'-'.$motivoConsulta;?>',
          
          start: '<?php echo $mi_fecha_cita; ?>',

          end: '<?php echo $nueva_fecha_cita; ?>',

          allDay: false,
          backgroundColor: "<?php echo $Estado?>", //Blue
          borderColor: "<?php echo $Estadob ?>" //Blue
          
        },

        {
          title: '1',
         start: new Date(2019, 7,21, 10, 00),
          allDay: false,
          backgroundColor: "#FF0000", //Blue
          borderColor: "<?php echo $Estadob ?>"//Blue
        },
<?php

  }
?>
  ]});

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

  $('#submitButton').on('click', function(e){
    // We don't want this to act as a link so cancel the link action
    e.preventDefault();

    doSubmit();
  });

  function doSubmit(){
    $("#createEventModal").modal('hide');
    console.log($('#apptStartTime').val());
    console.log($('#apptEndTime').val());
    console.log($('#apptAllDay').val());
    alert("form submitted");
        
    $("#calendar").fullCalendar('renderEvent',
        {
            title: $('#patientName').val(),
            start: new Date("2021-10-01 10:00:00"),
            end: new Date("2021-10-01 12:00:00"),
        },
        true);
   }
});
  
</script>
   <!-- Page specific script -->

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

    function verificarCliente()
    {
      // estas son las variables que enviamos
        var identificacion = $("#clienteId").val();
      // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_cliente.php",
            data: {identificacion:identificacion},
            success: function(response) {
                $('#div-resultsCliente').html(response);   
            }
        });
    };

    function CambiarMedico()
    {
      document.getElementById('div_fecha').style.display='block';
      if(document.getElementById('fecha').value!='')
      {
        document.getElementById('fecha').value='';
      }
      var Hora = document.getElementById('Hora');
      if(Hora !== null) 
      {
        document.getElementById('Hora').value='';
      }
    }
  </script>
  
  <script>
  
  $(document).ready(function(){
    $('#duracion').select2({
        tags:true,
        createTag: function (params) {
        // Don't offset to create a tag if there is no @ symbol
        if (params.term.search('^[0-9]+$') == 0) {
            // Return null to disable tag creation
            return {
            id: params.term,
            text: params.term
            }
        }
        else{
            return null;
        }
        }
    });

  });

  </script>



<div class="modal" id="createEventModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="createAppointmentForm" class="form-horizontal">
        <div class="control-group">
            <label class="control-label" for="inputPatient">Patient:</label>
            <div class="controls">
                <input type="text" name="patientName" id="patientName" tyle="margin: 0 auto;" data-provide="typeahead" data-items="4" data-source="[&quot;Value 1&quot;,&quot;Value 2&quot;,&quot;Value 3&quot;]">
                  <input type="hidden" id="apptStartTime"/>
                  <input type="hidden" id="apptEndTime"/>
                  <input type="hidden" id="apptAllDay" />
            </div>
        </div>
        <div class="control-group">
            <label class="control-label" for="when">When:</label>
            <div class="controls controls-row" id="when" style="margin-top:5px;">
            </div>
        </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="submitButton">Save changes</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  