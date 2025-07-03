<?php
include 'header.php';
include 'menu.php';
$auxiliar = base64_decode($_GET['auxiliar']);
$fechaSearch = base64_decode($_GET['fechaSearch']);
$caracterSearch = base64_decode($_GET['caracterSearch']);
?>
<link href='plugins/fullcalendar2021/main.css' rel='stylesheet' />
<script src='plugins/fullcalendar2021/main.js'></script>
<script src='plugins/fullcalendar2021/locales-all.js'></script>
<script src='plugins/fullcalendar2021/tooltips.js'></script>
<script src='plugins/fullcalendar2021/popper.js'></script>
<style type="text/css">
  .popper,
  .tooltip {
    position: absolute;
    z-index: 9999;
    background: #3c8dbc;
    color: black;
    width: 150px;
    border-radius: 3px;
    box-shadow: 0 0 2px rgba(0, 0, 0, 0.5);
    padding: 10px;
    text-align: center;
    opacity: 1 !important;
  }

  .style5 .tooltip {
    background: white;
    color: #FFFFFF;
    max-width: 200px;
    width: auto;
    font-size: .8rem;
    padding: .5em 1em;
  }

  .popper .popper__arrow,
  .tooltip .tooltip-arrow {
    width: 0;
    height: 0;
    border-style: solid;
    position: absolute;
    margin: 5px;
  }

  .tooltip .tooltip-arrow,
  .popper .popper__arrow {
    border-color: #FFC107;
  }

  .style5 .tooltip .tooltip-arrow {
    border-color: #1E252B;
  }

  .popper[x-placement^="top"],
  .tooltip[x-placement^="top"] {
    margin-bottom: 5px;
  }

  .popper[x-placement^="top"] .popper__arrow,
  .tooltip[x-placement^="top"] .tooltip-arrow {
    border-width: 5px 5px 0 5px;
    border-left-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    bottom: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
  }

  .popper[x-placement^="bottom"],
  .tooltip[x-placement^="bottom"] {
    margin-top: 5px;
  }

  .tooltip[x-placement^="bottom"] .tooltip-arrow,
  .popper[x-placement^="bottom"] .popper__arrow {
    border-width: 0 5px 5px 5px;
    border-left-color: transparent;
    border-right-color: transparent;
    border-top-color: transparent;
    top: -5px;
    left: calc(50% - 5px);
    margin-top: 0;
    margin-bottom: 0;
  }

  .tooltip[x-placement^="right"],
  .popper[x-placement^="right"] {
    margin-left: 5px;
  }

  .popper[x-placement^="right"] .popper__arrow,
  .tooltip[x-placement^="right"] .tooltip-arrow {
    border-width: 5px 5px 5px 0;
    border-left-color: transparent;
    border-top-color: transparent;
    border-bottom-color: transparent;
    left: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }

  .popper[x-placement^="left"],
  .tooltip[x-placement^="left"] {
    margin-right: 5px;
  }

  .popper[x-placement^="left"] .popper__arrow,
  .tooltip[x-placement^="left"] .tooltip-arrow {
    border-width: 5px 0 5px 5px;
    border-top-color: transparent;
    border-right-color: transparent;
    border-bottom-color: transparent;
    right: -5px;
    top: calc(50% - 5px);
    margin-left: 0;
    margin-right: 0;
  }

  .tooltip-inner {
    background-color: #ecf0f5;
    color: black;
    overflow: auto;
  }

  .btn span.glyphicon {
    opacity: 0;
  }

  .btn.active span.glyphicon {
    opacity: 1;
  }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Calendario
      <small> </small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li class="active">Calendario </li>
    </ol>
    <div class="row">
      <div class="col-md-12" align="center">
        <h4 class="text-bold text-danger">Puede usar los Filtros juntos o individualmente. Por favor selecione TODO para restablercerlos.</h4>
      </div>
      <div class="col-md-4">
        <?php
        $queryRellenaArreglo = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Auxiliares");
        while ($arrayArregloAuxiliar = mysqli_fetch_array($queryRellenaArreglo)) {
          $arregloTipo = $arrayArregloAuxiliar['tipoEstado'];
          $queryComprobarArreglo = mysqli_query($conn3, "SELECT asignado, nombreAuxiliar FROM TS_Tareas WHERE asignado = '{$arregloTipo}' AND estado != 2");
          while ($arrayArregloCompruebas = mysqli_fetch_array($queryComprobarArreglo)) {
            if ($arrayArregloCompruebas['nombreAuxiliar'] != $arrayArregloAuxiliar['nombreAuxiliar'] && $arrayArregloCompruebas['nombreAuxiliar'] != '') {
              $arregloauxiliares["Auxiliar Anterior" . $arrayArregloCompruebas['asignado']] = $arrayArregloCompruebas['nombreAuxiliar'];
            }
          }
          $arregloauxiliares["Auxiliar " . $arrayArregloAuxiliar['tipoEstado']] = $arrayArregloAuxiliar['nombreAuxiliar'];
        }
        ?>
        <select name="selectAuxiliar" id="selectAuxiliar" class="form-control input-lg select2" style="width: 100%;" onchange="window.location = 'calendarioTareas' + (this.value == '' ? '' : '?auxiliar=' + this.value) + ($('#fenchaSearch').val() == '' || this.value == '' ? '' : '&fechaSearch=' + btoa($('#fenchaSearch').val())) + ($('#caracterSearch').val() == '' || this.value == '' ? '' : '&caracterSearch=' + btoa($('#caracterSearch').val()))">
          <option value="" selected disabled>Seleccione...</option>
          <option value="">Todo</option>
          <?php
          foreach ($arregloauxiliares as $key => $value) {
          ?>
            <option value="<?= base64_encode($value) ?>" <?= ($value == $auxiliar ? 'selected' : '') ?>><?= $value ?></option>
          <?php
          }
          ?>
        </select>
      </div>
      <div class="col-md-4">
        <input type="date" class="form-control" name="fenchaSearch" id="fenchaSearch" onchange="window.location = 'calendarioTareas' + (this.value == '' ? '' : '?fechaSearch=' + btoa(this.value)) + ($('#selectAuxiliar').val() == '' || $('#selectAuxiliar').val() == null ? '' : '&auxiliar=' + $('#selectAuxiliar').val()) + ($('#caracterSearch').val() == '' ? '' : '&caracterSearch=' + btoa($('#caracterSearch').val()))" value="<?= $fechaSearch ?>">
      </div>
      <div class="col-md-4">
        <div class="input-group">
          <input type="text" class="form-control" name="caracterSearch" id="caracterSearch" onkeypress="(event.keyCode == 13 ? $('#searchCaracter').click() : '')" placeholder="Palabra Clave (PULSAR ENTER TENDRA EL MISMO EFECTO)" value="<?= $caracterSearch ?>">
          <a href="#" id="searchCaracter" class="btn input-group-addon btn-success" onclick="window.location = 'calendarioTareas' + ($('#caracterSearch').val() == '' ? '' : '?caracterSearch=' + btoa($('#caracterSearch').val())) + ($('#selectAuxiliar').val() == '' || $('#selectAuxiliar').val() == null ? '' : '&auxiliar=' + $('#selectAuxiliar').val()) + ($('#fenchaSearch').val() == '' ? '' : '&fechaSearch=' + btoa($('#fenchaSearch').val()))"><i class="fa fa-search"></i></a>
        </div>
      </div>
    </div>
  </section>
  <section class=" container" align="center" style="margin-top: 15px;">
    <div class="btn-group" data-toggle="buttons">
      <label class="btn disabled text-black text-bold" style="background-color: #00800066;">
        <input type="checkbox" autocomplete="off" checked> OK EJECUTADO
        <!-- <span class="glyphicon glyphicon-ok"></span> -->
      </label>

      <label class="btn disabled text-black text-bold" style="background-color: #ffff00;">
        <input type="checkbox" autocomplete="off"> REVISADO Y PENDIENTE
        <!-- <span class="glyphicon glyphicon-ok"></span> -->
      </label>

      <label class="btn disabled text-black text-bold" style="background-color: #ff0000cc;">
        <input type="checkbox" autocomplete="off"> PENDIENTE POR REALIZAR
        <!-- <span class="glyphicon glyphicon-ok"></span> -->
      </label>
    </div>
  </section>

  <section class="content">
    <div class="box-body">
      <div id="calendar"></div>
    </div>
  </section>
</div>

<style type="text/css">
  .ok {
    color: black;
    background-color: #00800066;
    border: 1px solid black;
    font-weight: bold;
  }

  .revisar {
    color: black;
    background-color: #ffff00;
    border: 1px solid black;
    font-weight: bold;
  }

  .pendiente {
    color: black;
    background-color: #ff0000cc;
    border: 1px solid black;
    font-weight: bold;
  }

  .ok>.fc-daygrid-event-dot {
    box-shadow: 2px 2px 5px black;
  }

  .revisar>.fc-daygrid-event-dot {
    box-shadow: 2px 2px 5px black;
  }

  .pendiente>.fc-daygrid-event-dot {
    box-shadow: 2px 2px 5px black;
  }

  .ok>.fc-list-event-graphic>.fc-list-event-dot {
    box-shadow: 2px 2px 5px black;
  }

  .revisar>.fc-list-event-graphic>.fc-list-event-dot {
    box-shadow: 2px 2px 5px black;
  }

  .pendiente>.fc-list-event-graphic>.fc-list-event-dot {
    box-shadow: 2px 2px 5px black;
  }
</style>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var initialLocaleCode = 'es';
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      buttonText: {
        today: 'Hoy',
        prev: 'Anterior',
        next: 'Siguiente',
        day: 'Dia',
        month: 'Mes',
        week: 'Semana',
        list: 'Lista'
      },
      themeSystem: 'boostrap',
      // bootstrap
      /*initialDate: '2020-09-12',*/
      locale: initialLocaleCode,
      buttonIcons: false, // show the prev/next text
      /*weekNumbers: true,*/
      navLinks: true, // can click day/week names to navigate views
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events

      eventDidMount: function(info) {
        var tooltip = new Tooltip(info.el, {
          title: info.event.extendedProps.description,
          placement: 'top',
          trigger: 'hover',
          container: 'body'
        });
      },

      events: [
        <?php
        $arregloClass["Ok"] = "ok";
        $arregloClass["Con Dificultades"] = "revisar";
        $arregloClass["No Realizado"] = "pendiente";
        $arreglo["Ok"] = "#00800066";
        $arreglo["Con Dificultades"] = "#ffff00";
        $arreglo["No Realizado"] = "#ff0000cc";
        // $auxiliar = base64_decode($_GET['auxiliar']);
        // $fechaSearch = base64_decode($_GET['fechaSearch']);
        // $caracterSearch = base64_decode($_GET['caracterSearch']);
        $queryList1 = mysqli_query($conn3, "SELECT * FROM TS_Tareas WHERE (usuario_id = '$usuario_id' or ID_principal = '$ID_principal') AND estado != 2 " . (!empty($auxiliar) ? "AND nombreAuxiliar = '{$auxiliar}' " : "") . (!empty($fechaSearch) ? "AND (fechaR = '{$fechaSearch}' OR fecha LIKE '%{$fechaSearch}%') " : "") . (!empty($caracterSearch) ? "AND titulo LIKE '%{$caracterSearch}%'" : ''));
        $nrowl = mysqli_num_rows($queryList1);
        while ($rowMotorizado1 = mysqli_fetch_array($queryList1)) {
          $id_tarea = $rowMotorizado1["id"];
          $comentarios = "";
          $estado = "";
          $queryList2 = mysqli_query($conn3, "SELECT * FROM TS_Tareas_Comentarios where id_tarea = '$id_tarea' ORDER BY id DESC limit 1");
          $nrowl = mysqli_num_rows($queryList2);
          while ($rowMotorizado2 = mysqli_fetch_array($queryList2)) {
            $comentarios = $rowMotorizado2['comentario'] . '\n \n Estado: ' . $rowMotorizado2['estado'] . '';
            $estado = $rowMotorizado2['estado'];
          }
          // setlocale(LC_ALL, "es_ES@euro", "es_ES", "esp");
          // $fecha = strftime("%d de %B de %Y", strtotime($rowMotorizado1['fechaR']));
          $comentarios = trim(preg_replace('/\s+/', ' ', $comentarios));
          $titulo = trim(preg_replace('/\s+/', ' ', $rowMotorizado1['titulo']));
        ?> {
            title: '<?php echo $titulo; ?>',
            start: '<?php echo $rowMotorizado1['fechaR']; ?>',
            color: '<?php echo $arreglo[$estado] ?>',
            textColor: 'black',
            url: '<?php echo $Base ?>calendarioTareasGestion?idtarea=<?php echo encrypt($id_tarea) ?>',
            description: '<?php echo $comentarios; ?>',
            groupId: '<?php echo $id_tarea ?>',
            className: ['<?php echo $arregloClass[$estado] ?>']
          },

        <?php

        } 
        ?>

        /*
        {
          title: 'All Day Event',
          start: '2020-09-01'
        },
        {
          title: 'Long Event',
          start: '2020-09-07',
          end: '2020-09-10'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-09T16:00:00'
        },
        {
          groupId: 999,
          title: 'Repeating Event',
          start: '2020-09-16T16:00:00'
        },
        {
          title: 'Conference',
          start: '2020-09-11',
          end: '2020-09-13'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T10:30:00',
          end: '2020-09-12T12:30:00'
        },
        {
          title: 'Lunch',
          start: '2020-09-12T12:00:00'
        },
        {
          title: 'Meeting',
          start: '2020-09-12T14:30:00'
        },
        {
          title: 'Happy Hour',
          start: '2020-09-12T17:30:00'
        },
        {
          title: 'Dinner',
          start: '2020-09-12T20:00:00'
        },
        {
          title: 'Birthday Party',
          start: '2020-09-13T07:00:00'
        },
        {
          title: 'Click for Google',
          url: 'http://google.com/',
          start: '2020-09-28'
        }
        */
      ],
      // eventColor: '#378006'

      // eventClick: function(info) {
      //     alert('Event: ' + info.event.title);
      //     // change the border color just for fun
      //     info.el.style.borderColor = 'red';
      //   }


    });

    calendar.render();
    // console.log(calendar);
  });
</script>
<style>
  #top {
    background: #eee;
    border-bottom: 1px solid #ddd;
    padding: 0 10px;
    line-height: 40px;
    font-size: 12px;
  }

  #calendar {
    max-width: 1300px;
    margin: 40px auto;
    padding: 0 10px;
  }
</style>
<?php include 'footer.php'; ?>