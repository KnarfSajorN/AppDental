<?php


include '../header.php';
include '../menu.php';

$fecha = date("Y-m-d");

?>
<script src='https://cdn.jsdelivr.net/npm/fullcalendar@6.1.15/index.global.min.js'></script>

<link rel="stylesheet" href="<?= $Base ?>/css/emoji.css">
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <div class="col-md-12 row">

                    <div class="row">


                    </div>
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4> Agendamiento multiple</h4>
                                </div>
                            </div>
                            <form>
                                <div class="card-body row">

                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th style="width: 20%;">Paciente</th>
                                                    <th style="width: 20%;">Doctor</th>
                                                    <th style="width: 15%;">Fecha</th>
                                                    <th style="width: 15%;">Hora</th>
                                                    <th style="width: 20%;">Servicio</th>
                                                    <th style="width: 5%;">Tipo</th>
                                                    <th style="width: 5%;"></th>
                                                </tr>
                                            </thead>
                                            <tbody id="citasList"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="7" class="text-end">
                                                        <button class="btn btn-md rounded-pill btn-outline-info" id="btnSubmit" type="button" onclick="guardarCitas()">
                                                            <i class="fas fa-plus"></i>&nbsp;Guardar
                                                        </button>
                                                    </td>
                                                </tr>
                                            </tfoot>
                                        </table>

                                    </div>

                                    <div id="conventions" class="col-md-12 row my-2"></div>

                                    <hr>

                                    <div id='calendar' class="col-md-12"></div>



                                </div>
                                <div class="card-footer"> </div>
                            </form>
                        </div>

                    </div>
                </div>



            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->

</div>

<?php include '../footer.php'; ?>
<script>
    const baseJs = "<?= $Base ?>";
    const ID_principal = <?= $_SESSION['ID_principal'] ?>;
    const usuario_id = "<?= $_SESSION["ID"] ?>";
    const sucursal = "<?= $_SESSION["sucursal"] ?>";

    let clientesOptions = ``;
    let userOptions = ``;
    let servicesOptions = ``;

</script>

<script type="text/javascript" src="<?= $Base ?>agendaMultiple/Js/gettersAjax.js"></script>
<script type="text/javascript" src="<?= $Base ?>agendaMultiple/Js/functionsTable.js"></script>
<script type="text/javascript" src="<?= $Base ?>agendaMultiple/Js/settersAjax.js"></script>

<script>
    $(document).ready(function() {

        (async function() {

            await getClients();
            await getUsers();
            await getServices();

            const events = await getEvents();

            let calendarEl = document.getElementById('calendar');
            let calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: 'dayGridMonth',
                locale: 'es',
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                events: events,
                eventDidMount: function(info) {
                    info.el.style.backgroundColor = info.event.backgroundColor || info.event.extendedProps.color;
                    info.el.style.color = "#ffffff";
                    let icon = "<i class='fas fa-user-md'></i> "; // 🔹 Ícono de Font Awesome
                    info.el.querySelector('.fc-event-title').innerHTML = icon + info.event.title;
                }
            });

            calendar.render();

            addRow();

        })();

    });
</script>


<style>
    #table {
        overflow-y: scroll;
    }

    /* Estiliza la barra de desplazamiento en general */
    #table::-webkit-scrollbar {
        width: 10px;
        /* Ancho de la barra vertical */
        height: 10px;
        /* Altura de la barra horizontal */
    }

    /* Estiliza el riel de la barra (fondo) */
    #table::-webkit-scrollbar-track {
        background: #f1f1f1;
        border-radius: 5px;
    }

    /* Estiliza el pulgar (la parte que se mueve) */
    #table::-webkit-scrollbar-thumb {
        background: #888;
        border-radius: 5px;
    }

    /* Cambia el color al pasar el mouse */
    #table::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>