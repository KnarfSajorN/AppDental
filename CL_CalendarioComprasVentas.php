<?php
include 'header.php';
include 'menu.php';


if ($_GET["msg"] != "") {
    include "plugins/SweetAlert2K/AlertaCorrectaOperacion.php";
}
if ($_GET["error"] != "") {
    include "plugins/SweetAlert2K/AlertaErrorOperacion.php";
}

$usuario_id = $_SESSION['ID'];

?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

<link rel="stylesheet" href="plugins/FullCalendarK/Fullcalendar.min.css" />

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li class="active">Calendario Factura de Ventas/Compra</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <!-- /.col -->
            <div class="col-md-12">
                <h4 class="Titulo_Pagina">Calendario Factura de Ventas/Compra </h4>
                <div class="box box-primary">
                    <div class="box-body no-padding">
                        <!-- THE CALENDAR -->
                        <?php //if ($_SESSION['ID'] == '1') : 
                        ?>


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


<style>
    body{
        --light: hsl(0, 0%, 100%);
        --background: linear-gradient(to right bottom, hsl(236, 50%, 50%), hsl(195, 50%, 50%));
    }
    .modal-header{
        border-bottom: 1px solid #000000;
    }
    .modal-footer{
        border-top: 1px solid #000000;
    }
    .modal-content{
        padding: 3rem 2rem;
    border-radius: .8rem;
    position: relative;
    }

    .ColorGroundAzul{
        background: linear-gradient(to right bottom, hsl(227.6deg 59.69% 63.27%), hsl(195deg 65.98% 62.04%));
        box-shadow: 0.4rem 0.4rem 2.4rem 0.2rem hsla(236, 50%, 50%, 0.3);
        color:black;
    }

    .ColorGroundAmarillo{
        background: linear-gradient(to right bottom, hsl(48.15deg 100% 77.03%), hsl(62.45deg 37.71% 38.08%));
        box-shadow: 0.4rem 0.4rem 2.4rem 0.2rem hsl(60.2deg 51.73% 60.2% / 30%);
        color:black;
    }

</style>
<div class="modal fade" id="exampleModal" role="dialog" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="top: 140px;">
        <div class="modal-content" id="modalfacturascontenido">
            <div class="modal-header">
                <h5 class="modal-title" id="tituloEvento"> </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                <div class="modal-body ">
                    <div id="descripcionEvento" class="col-md-12 row">

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-block btn-secondary rounded-pill shadow m-1" data-dismiss="modal">Salir</button>
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
    background: rgba(0,0,0,0.3);
    }

</style>

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


</link>


<script>
    function MostrarCalendario() {



        var calendar = $('#calendar').fullCalendar({
            lang: 'es',
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,basicWeek'
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
            eventSources: [{
                url: 'CL_AjaxComprasVentas.php',
                method: 'POST',
                data: {
                    usuario_id: '<?=$_SESSION['ID'];?>',
                    Tipo: 'Eventos_Calendario'
                },
                failure: function() {
                    alert('there was an error while fetching events!');
                },
            }],
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

                //console.log('322132121');

                $('#tituloEvento').html(calEvent.title);
                $('#descripcionEvento').html(calEvent.descripcion);
                $('#modalfacturascontenido').removeClass();
                $('#modalfacturascontenido').addClass("modal-content");
                $('#modalfacturascontenido').addClass(calEvent.backgroundColorModal);
                $('#exampleModal').modal();
                
            },
            //header and other values

        });


    }
    $(document).ready(function() {
        MostrarCalendario();
    });
</script>

<!-- scripts para el menu normal de agendamiento -->