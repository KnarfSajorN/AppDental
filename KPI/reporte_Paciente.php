<?php
include '.././header.php';
include '.././menu.php';

$ID = $_SESSION['ID'];
$desde = $_POST['fechaDesde'];
$hasta = $_POST['fechaHasta'];
$tipo_reporte = $_POST['tipo_reporte'];
$ID_cliente = $_POST['cliente_id'];
$genero = $_POST['reporte_sexo'];
?>
<!-- "1" => "Reservada",
"2" => "Confirmada",
"3" => "Asistida",
"4" => "No pudo Asistir",
"5" => "Cita Cancelada",
"6" => "Pendiente",
"7" => "En Espera" -->

<!-- Reporte ventas tabla -->

<div class="container mt-5">
    <form action="reportePacientes" method="post">
        <div class="form-row">
            <div class="form-group col-md-3">               
                <label for="tipo_reporte">Seleccione el tipo de reporte:</label>
                <select class="form-control select2" name="tipo_reporte" id="tipo_reporte" onchange="mostrarOcultarElementos();">
                    <option value="Cantidad de citas recurrente">Cantidad de citas recurrente</option>
                    <option value="Tiempo de espera en sala de espera">Tiempo de espera en sala de espera</option>
                    <option value="Tiempo de consulta">Tiempo de consulta</option>
                    <option value="Cantidad de consultas por dia">Cantidad de consultas por dia</option>
                    <option value="Cantidad de consultas comparando entre dias">Cantidad de consultas comparando entre dias</option>
                    <option value="Cantidad de pacientes nuevos">Pacientes nuevos</option>
                    <!-- Otras opciones -->
                </select>
            </div>
            <div class="form-group col-md-3" id= "divFechaDesde">
                <label for="fechaDesde" id="fechaDesde">Desde:</label>
                <input type="date" class="form-control" id="fechaDesde" name="fechaDesde">
            </div>
            <div class="form-group col-md-3" id = "divFechaHasta">
                <label for="fechaHasta" , id="fechaHasta">Hasta:</label>
                <input type="date" class="form-control" id="fechaHasta" name="fechaHasta">
            </div>
            <div class="form-group col-md-3" id = "divPaciente">
                <label for="idCliente" id="cliente_id">Seleccione el Paciente:</label>
                <select class="form-control select2" name="cliente_id" , id="cliente_id">
                    <!-- Opciones de clientes generadas desde PHP -->
                    <?php
                    $queryList = mysqli_query($conn3, 'SELECT cliente_id, nombre_cliente FROM cliente ORDER BY nombre_cliente ASC;');
                    // Verifica si la consulta fue exitosa
                    if ($queryList) {
                        while ($fila = mysqli_fetch_assoc($queryList)) {
                            echo '<option value="' . $fila['cliente_id'] . '">' . $fila['nombre_cliente'] . '</option>';
                        }
                        mysqli_free_result($queryList); // Liberar memoria del resultado
                    } else {
                        echo '<option value="">No se encontraron pacientes</option>';
                    }
                    ?>
                </select>
            </div>
           

        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Aceptar" , id="btn_aceptar">
        </div>
    </form>

    <div class="table-responsive mt-5">
        <table id="Tabla_Inteligente" class="table table-bordered table-striped table-hover">
            <thead>
                <tr>
                    <?php
                    $Cabezera["Cantidad de citas recurrente"] = ["FECHA", "HORA", "DURACION", "PACIENTE", "CORREO", "DOCTOR", "MOTIVO CONSULTA"];
                    $Cabezera["Tiempo de espera en sala de espera"] = ["NOMBRE", "TELEFONO", "CORREO", "DIRECCION", "ALERGIA", "TIPO SANGRE"];
                    $Cabezera["Tiempo de consulta"] = ["FECHA", "HORA", "NOMBRE", "TELEFONO", "CORREO", "NACIONALIDAD",  "MOTIVO CONSULTA"];
                    $Cabezera["Cantidad de consultas por dia"] = ["FECHA", "HORA", "DURACION", "PACIENTE", "CORREO", "DOCTOR", "MOTIVO CONSULTA"];

                    foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                        echo "<td>{$value}</td>";
                    }
                    ?>
                </tr>
            </thead>
        </table>
    </div>
    <div class="col-md-6">

        <div class="card card-primary" style="width: 1200px;">
            <div class="card-header">
                <h3 class="card-title">tabla</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-danger" style="width: 1200px;">
            <div class="card-header">
                <h3 class="card-title">Gráfica</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <canvas id="graficoPacientesNuevos" style="min-height: 800px; height: 800px; max-height: 800px; max-width: 100%; display: block; width: 100%;" width="1200" height="800" class="chartjs-render-monitor"></canvas>
                <canvas id="graficoTiempoConsulta" style="min-height: 800px; height: 800px; max-height: 800px; max-width: 100%; display: block; width: 100%;" width="1200" height="800" class="chartjs-render-monitor"></canvas>
            </div>
        </div>

        <div class="div">
            <?php
            $totalCitas = 0;
            $totalNoAsistida = 0;
            $totalCancelada = 0;

            $resultado = mysqli_query($conn3, "SELECT * FROM citas");

            while ($row = mysqli_fetch_assoc($resultado)) {
                if ($row['estado'] != 3) {
                    $totalCitas++;
                }
                // Contar las citas no asistidas si el estado es 4
                if ($row['estado'] == 4) {
                    $totalNoAsistida++;
                }
                // Contar las citas canceladas si el estado es 5
                if ($row['estado'] == 5) {
                    $totalCancelada++;
                }
            }

            $totalDatos = [
                ["Total de citas", $totalCitas],
                ["No asistida", $totalNoAsistida],
                ["Cancelada", $totalCancelada]

            ];

            // Generar la gráfica
            $_GET['n'] = 12;
            $_GET['nombre'] = 'Gráfica de citas por estado';
            $_GET['Tiempo'] = '500';
            $_GET['datos'] = json_encode($totalDatos);
            ?>
            <?php include '../generarGrafica.php' ?>
            <strong class="mb-2">
                <h3>Citas canceladas y no asistidas</h3>
            </strong>
        </div>
    </div>
    <!-- <div class="mt-5 mb-4">
        <canvas id="graficoTiempoConsulta" width="200" height="100 "></canvas>
        <canvas id="graficoTiempoPromedio" width="200" height="100 "></canvas>
        <canvas id="graficoComparacionDias" width="200" height="100 "></canvas>
        <canvas id="graficoCitasRecurrentes" width="200" height="100 "></canvas>
    </div> -->
</div>

<?php
include '.././footer.php'
?>
<script>
    var data_table = []; //datos que recibe la tabla
    var titulo_tabla = "<?php echo $tipo_reporte; ?>";
    var opcion = "<?php echo $tipo_reporte; ?>";
    switch (opcion) {
        case 'Cantidad de citas recurrente':
            <?php
            // Suponiendo que $fechaInicio y $fechaFin son las fechas del rango seleccionado
            $query = mysqli_query($conn3, "SELECT COUNT(idCitas) as cantidadCitas, fecha FROM cliente AS cl, citas AS ci WHERE ci.idCliente = cl.cliente_id AND cl.cliente_id = $ID_cliente GROUP BY ci.fecha");

            $labels = []; // Almacenar las fechas para las etiquetas del gráfico
            $data = []; // Almacenar las cantidades de citas para cada fecha

            while ($row = mysqli_fetch_assoc($query)) {
                $labels[] = $row['fecha']; // Agregar la fecha como etiqueta
                $data[] = $row['cantidadCitas']; // Agregar la cantidad de citas
            }
            ?>
            var ctx = document.getElementById('graficoCitasRecurrentes').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Cantidad de Citas',
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)', // Color para las barras
                        borderWidth: 1
                    }]
                },
                options: {
                    // Aquí puedes agregar opciones personalizadas para el gráfico, como títulos, etiquetas, etc.
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            break;
        case 'Tiempo de espera en sala de espera':
            <?php
            $SalaEspera = 0;
            $Consulta = 0;
            $TiempoSala = 0;
            $TiempoCita = 0;
            $queryListaH = mysqli_query($conn3, "SELECT * FROM citas where fecha BETWEEN '$desde' AND '$hasta' AND cita_sala_espera=1");
            while ($rowListaH = mysqli_fetch_array($queryListaH)) {

                $horallegada = $rowListaH['horallegada'];
                $horaatencion = $rowListaH['horaatencion'];
                $horafinalizada = $rowListaH['horafinalizada'];


                if ($horallegada != "" and $horaatencion != "") {
                    $to_time = strtotime($horallegada);
                    $from_time = strtotime($horaatencion);
                    $TiempoSala += round(abs($to_time - $from_time) / 60, 2);
                    $SalaEspera++;
                }


                if ($horaatencion != "" and $horafinalizada != "") {
                    $to_time = strtotime($horaatencion);
                    $from_time = strtotime($horafinalizada);
                    $TiempoCita += round(abs($to_time - $from_time) / 60, 2);
                    $Consulta++;
                }
            }
            $promedioTiempoSala = $SalaEspera > 0 ? ($TiempoSala / $SalaEspera) : 0;
            ?>
            var ctx = document.getElementById('graficoTiempoPromedio').getContext('2d');
            var myBarChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ['Tiempo en Sala de Espera'],
                    datasets: [{
                        label: 'Tiempo Promedio en Sala de Espera (min)',
                        data: [<?php echo $promedioTiempoSala ?>],
                        backgroundColor: 'rgba(255, 99, 132, 0.5)', // Color para tiempo en sala de espera
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            break;
        case 'Tiempo de consulta':
            <?php
            $queryList = mysqli_query($conn3, "SELECT CASE WHEN duracion BETWEEN 0 AND 15 THEN '0-15 min' WHEN duracion BETWEEN 16 AND 30 THEN '16-30 min' when duracion between 31 and 60 then '31-60 min' ELSE 'Otro' END AS intervalo_tiempo, COUNT(*) AS cantidad_consultas FROM citas WHERE estado = 3 GROUP BY intervalo_tiempo;");
            $labels = [];
            $data = [];

            while ($fila = mysqli_fetch_assoc($queryList)) {
                $labels[] = $fila['intervalo_tiempo'];
                $data[] = $fila['cantidad_consultas'];
            }
            ?>

            var ctx = document.getElementById('graficoTiempoConsulta').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Cantidad de consultas por intervalo de tiempo',
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: 'rgba(54, 162, 235, 0.5)', // Color de las barras
                        borderColor: 'rgba(54, 162, 235, 1)', // Color del borde de las barras
                        borderWidth: 1
                    }]
                },
                options: {
                    // Aquí puedes agregar opciones personalizadas para el gráfico, como títulos, escalas, etc.
                }
            });


            break;
        case 'Pacientes por genero':
            break;
        case 'Cantidad de consultas por dia':
            <?php
            $queryList = mysqli_query($conn3, "SELECT * FROM citas where estado = 3 and fecha = '$desde' ;");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $fecha = $rowMotorizado['fecha'];
                $hora = $rowMotorizado['Hora'];
                $duracion = $rowMotorizado['duracion'];
                $paciente = $rowMotorizado['nombre'];
                $correo = $rowMotorizado['correo'];
                $doctor = $rowMotorizado['doctor'];
                $motivoConsulta = $rowMotorizado['motivoConsulta'];

            ?>
                data_table.push(["<?php echo $fecha; ?>",
                    "<?php echo $hora; ?>",
                    "<?php echo $duracion; ?>",
                    "<?php echo $paciente; ?>",
                    "<?php echo $correo; ?>",
                    "<?php echo $correo; ?>",
                    "<?php echo $doctor; ?>",
                    "<?php echo $motivoConsulta; ?>",
                ]);

            <?php
            }
            ?>
            break;
        case 'Cantidad de consultas comparando entre dias':
            <?php
            // Suponiendo que $fechaInicio y $fechaFin son las fechas del rango seleccionado
            $query = mysqli_query($conn3, "SELECT fecha, count(idCitas) as cantidadCitas FROM citas WHERE estado = 3 AND fecha BETWEEN '$desde' AND '$hasta' GROUP BY fecha");

            $labels = []; // Almacenar las fechas para las etiquetas del gráfico
            $data = []; // Almacenar las cantidades de citas para cada fecha

            while ($row = mysqli_fetch_assoc($query)) {
                $labels[] = $row['fecha']; // Agregar la fecha como etiqueta
                $data[] = $row['cantidadCitas']; // Agregar la cantidad de citas
            }
            ?>


            var ctx = document.getElementById('graficoComparacionDias').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: <?php echo json_encode($labels); ?>,
                    datasets: [{
                        label: 'Cantidad de Citas',
                        data: <?php echo json_encode($data); ?>,
                        backgroundColor: 'rgba(255, 99, 132, 0.5)', // Color para las barras
                        borderWidth: 1
                    }]
                },
                options: {
                    // Aquí puedes agregar opciones personalizadas para el gráfico, como títulos, etiquetas, etc.
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            break;
        case 'Cantidad de pacientes nuevos':
            <?php
            $query = mysqli_query($conn3, "SELECT DATE(fechar) as fecha, COUNT(*) as cantidad FROM cliente GROUP BY DATE(fechar)");
            $data = array();
            while ($row = $query->fetch_assoc()) {
                $data[$row['fecha']] = $row['cantidad'];
            }
            ?>
            var dataFromPHP = <?php echo json_encode($data); ?>;

            // Convertir el objeto PHP a un array de JavaScript para usarlo con Chart.js
            var labels = Object.keys(dataFromPHP);
            var data = Object.values(dataFromPHP);

            // Crear el gráfico con Chart.js
            var ctx = document.getElementById('graficoPacientesNuevos').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: labels,
                    datasets: [{
                        label: 'Pacientes nuevos por día',
                        data: data,
                        backgroundColor: 'rgba(54, 162, 235, 0.2)',
                        borderColor: 'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
            break;
        default:
            break;
    }
</script>

<script>
//    document.addEventListener('DOMContentLoaded', function() {

        
    // selectorTipoReporte.addEventListener('change', mostrarOcultarElementos);
    // mostrarOcultarElementos();
// });


function mostrarOcultarElementos() {
    var selectorTipoReporte = document.getElementById('tipo_reporte');
    var fecheDesde = document.getElementById('divFechaDesde');
    var fechaHasta = document.getElementById('divFechaHasta');
    var selecPaciente = document.getElementById('divPaciente');
        var ValorSeleccionado = selectorTipoReporte.value;          
        fecheDesde.style.display = ValorSeleccionado === 'Cantidad de consultas comparando entre dias' ? 'block' : 'none';        
        fechaHasta.style.display = ValorSeleccionado === 'Cantidad de consultas comparando entre dias' ? 'block' : 'none';
        selecPaciente.style.display = ValorSeleccionado === 'Cantidad de citas recurrente' ? 'block' : 'none';
        console.log(ValorSeleccionado);
    }
</script>


<script type="text/javascript">
    $(function() {
        // esto va en el footer
        //tabla inteligente
        if (typeof data_table !== 'undefined') {
            var Tabla_Inteligente = $('#Tabla_Inteligente').DataTable({

                data: data_table,
                deferRender: true,
                scrollY: 1200,
                scrollCollapse: true,
                scroller: true,
                processing: true,
                lengthMenu: [10, 20, 50, 100, 200, 500],
                language: {
                    "decimal": "",
                    "emptyTable": "No hay información",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    buttons: {
                        pageLength: {
                            _: "Mostrando %d <br> Elementos",
                            '-1': "Ver Todo"
                        }
                    }
                },

                dom: 'Bfrtip',
                buttons: [{
                    extend: 'collection',
                    text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                    className: 'btn btn-primary1',
                    buttons: [{
                            extend: 'print',
                            text: 'Imprimir',
                            title: titulo_tabla,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'copy',
                            text: 'Copiar',
                            title: titulo_tabla,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'excel',
                            text: 'Excel',
                            title: titulo_tabla,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'csv',
                            text: 'CSV',
                            title: titulo_tabla,
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pdf',
                            text: 'PDF',
                            title: titulo_tabla,
                            orientation: 'landscape',
                            exportOptions: {
                                columns: ':visible'
                            }
                        },
                        {
                            extend: 'pageLength'
                        },
                        {
                            extend: 'colvis',
                            text: 'Modificar Columnas'
                        }
                    ]
                }],

            });
        }
    });
</script>

