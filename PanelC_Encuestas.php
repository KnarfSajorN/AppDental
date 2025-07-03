<?php
include 'header.php';
include 'menu.php'; 

if (isset($_SESSION['cI']) && $_SESSION['cI']<> '') {
    $queryClienteC = " AND idCliente=" . $_SESSION['cI'];
}else{
    $queryClienteC = "";
}

?>


<style type="text/css">
    .table-responsive {
        overflow-x: unset;
    }
</style>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            Panel de Control de Encuestas

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Panel de Control de Encuestas </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">


            <div class="col-xs-12">

                <div class="box">
                    <div class="box">

                        <!-- /.box-header -->
                        <div class="box-body">


                            <div class="col-xs-12">
                                Reporte de Encuestas
                                <form action="ReporteEncuesta" method="POST">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">


                                            <label>Desde</label>
                                            <input type="date" class="form-control input-lg" name="desde" required>
                                            <?php
                                            $ID = $_SESSION['ID'];
                                            ?>

                                            <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>

                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <label>Hasta</label>
                                            <input type="date" class="form-control input-lg" name="hasta" required>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <br>
                                            <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                    <h4> <strong> Generar </strong> </h4>
                                                </button></center>
                                        </div>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive">
                        <!----->
                        <div class="row">
                            <div class="col-md-12" style="text-align: center">
                                <strong>Puntuación</strong>
                                <!DOCTYPE html>
                                <html>

                                <head>
                                    <title>Gráfica Mixed</title>
                                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                                    <style>
                                        canvas {
                                            max-width: 800px;
                                            max-height: 400px;
                                        }
                                    </style>
                                </head>

                                <body>
                                    <div style="display: flex; justify-content: center;">
                                        <canvas id="donaChart"></canvas>
                                    </div>
                                    <script>
                                        <?php
                                        //Se toma de la tabla de citas, el puntaje y se hace un calculo global mostrando el promedio de satisfacción
                                        // Al momento de darle "ASISTIO" al cliente le llegar un mensaje con la encuesta y al llenarla se verá reflejada en este apartado
                                        //by: Emma 20.06.2023
                                        $ID = $_SESSION['ID'];
                                        $clienteId = $_GET['clienteId'];

                                        $fechaActual = new DateTime();
                                        // Obtener el último día del mes actual
                                        $ultimoDiaMes = clone $fechaActual;
                                        $ultimoDiaMes->modify('last day of this month');
                                        // Formatear la fecha como una cadena
                                        $ultimoDiaMesString = $ultimoDiaMes->format('Y-m-d');

                                        /*
                    $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                    FROM citas
                    WHERE c_puntaje > '' AND fecha <= CURDATE()
                    GROUP BY MONTH(fecha)
                    ");
                    */
                                        $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                    FROM citas
                    WHERE c_puntaje > '' AND fecha <= '$ultimoDiaMesString' and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') $queryClienteC
                    GROUP BY MONTH(fecha)
                    ");


                                        // Preparar los datos para la gráfica
                                        $labels = [];
                                        $values = [];

                                        while ($fila = mysqli_fetch_array($resultado)) {
                                            $mes = $fila['mes'];
                                            $cantidad = $fila['cantidad'];
                                            $promedio = $fila['promedio'];

                                            // Verificar que el promedio sea válido
                                            if ($promedio >= 1 && $promedio <= 5) {
                                                $labels[] = obtenerNombreMes($mes); // Agregar el nombre del mes al array de etiquetas
                                                $values[] = $promedio; // Agregar el promedio al array de valores

                                                // Actualizar el promedio global y la cantidad total de pacientes
                                                $totalPuntajes += $promedio * $cantidad;
                                                $cantidadCitas += $cantidad;
                                            }
                                        }
                                        // Calcular el promedio global
                                        if ($cantidadCitas > 0) {
                                            $promedioGlobal = $totalPuntajes / $cantidadCitas;
                                        } else {
                                            $promedioGlobal = 0;
                                        }
                                        // Función para obtener el nombre del mes en base a su número
                                        function obtenerNombreMes($numeroMes)
                                        {
                                            $nombresMeses = [
                                                'Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio',
                                                'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'
                                            ];
                                            return $nombresMeses[$numeroMes - 1];
                                        }
                                        ?>
                                        // Crea la gráfica utilizando Chart.js
                                        var ctx = document.getElementById('donaChart').getContext('2d');
                                        var mixedChart = new Chart(ctx, {
                                            type: 'line', // Cambiar el tipo de gráfico a 'line'
                                            data: {
                                                labels: <?php echo json_encode($labels); ?>,
                                                datasets: [{
                                                    label: 'Nivel de Satisfacción',
                                                    data: <?php echo json_encode($values); ?>,
                                                    backgroundColor: 'rgba(108, 196, 54, 97)',
                                                    borderColor: 'rgba(108, 196, 54, 97)',
                                                    borderWidth: 2,
                                                    pointRadius: 4,
                                                    pointHoverRadius: 6
                                                }]
                                            },
                                            options: {
                                                scales: {
                                                    y: {
                                                        beginAtZero: true,
                                                        max: 5,
                                                        stepSize: 1
                                                    }
                                                },
                                                plugins: {
                                                    legend: {
                                                        display: true,
                                                        labels: {
                                                            usePointStyle: true,
                                                        }
                                                    }
                                                }
                                            }
                                        });
                                    </script>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <p><strong> Promedio Mensual:</strong>
                                                <?php echo number_format($promedio, 1); ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong> Cantidad de Pacientes Encuestados (Mes Actual):</strong>
                                                <?php echo $cantidad; ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong> Promedio Global:</strong>
                                                <?php echo number_format($promedioGlobal, 1); ?></p>
                                        </div>
                                        <div class="col-md-3">
                                            <p><strong> Cantidad de Pacientes Encuestados (Global):</strong>
                                                <?php echo $cantidadCitas; ?></p>
                                        </div>


                                    </div>
                                </body>

                                </html>
                            </div>

                        </div>
                        <!----->
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Fecha y Hora</th>
                                    <th class="text-center">Nombre Paciente</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <!-- <th class="text-center">Motivo de Consulta</th> -->
                                    <th class="text-center">Comentario</th>
                                    <th class="text-center">Puntaje</th>
                                    <!-- <th class="text-center">Motivo Consulta</th> -->
                                    <!-- <th class="text-center">Estado</th>
                    <th class="text-center">Estado Presencial</th>
                    <th class="text-center">Acciones</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $ID = $_SESSION['ID'];

                                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                                $queryList = mysqli_query($conn3, "SELECT * FROM citas where c_puntaje > '' $queryClienteC  and (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') order by fecha asc") or die(mysqli_error($conn3));
                                // $queryList = mysqli_query($conn3, "SELECT * FROM citas order by fecha asc") or die(mysqli_error($conn3));



                                $nrowl = mysqli_num_rows($queryList);

                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                    $contador++;
                                    $idCitas      = $row_recordset32['idCitas'];
                                    $Doctor = $row_recordset32['doctor'];
                                    $fecha = $row_recordset32['fecha'];
                                    $Hora = $row_recordset32['Hora'];
                                    $nombre = $row_recordset32['nombre'];
                                    $telefono = $row_recordset32['telefono'];
                                    $correo = $row_recordset32['correo'];
                                    $motivoConsulta = $row_recordset32['motivoConsulta'];
                                    $activo = $row_recordset32['activo'];
                                    $estado = $row_recordset32['estado'];
                                    $estadoPresencia = $row_recordset32['estadoPresencia'];
                                    $c_comentario = $row_recordset32['c_comentario'];
                                    $c_puntaje = $row_recordset32['c_puntaje'];
                                    $motivo = funcionMaster($motivoConsulta, 'id', 'descripcion', 'Motivos_Consulta');
                                    echo '     
                      <tr>
                      <td style="width: calc(85%/7)" class="text-center">' . $contador . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $fecha . '-' . $Hora . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . funcionMaster($Doctor, 'ID', 'NOMBRE_USUARIO', 'usuarios') . '</td>    
                      <td style="width: calc(85%/7)" class="text-center"> ' . $nombre . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $telefono . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $correo . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $c_comentario . '</td>
                      <td style="width: calc(85%/7)" class="text-center">' . $c_puntaje . '</td>
                      
                      ';
                                ?>

                                <?php
                                }
                                ?>

                                </tr>

                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">Doctor</th>
                                    <th class="text-center">Fecha y Hora</th>
                                    <th class="text-center">Nombre Paciente</th>
                                    <th class="text-center">Teléfono</th>
                                    <th class="text-center">Correo</th>
                                    <th class="text-center">Comentario</th>
                                    <th class="text-center">Puntaje</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- <td width="10%" class="text-center">
    <?php
    if ($estado == '1') {
        // echo '<a href="Confirmarcita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-success btn-sm">Confirmar</button></a>';
    }
    if ($estado == '2') {
        // echo '<a href="asistioCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-primary btn-sm">Asistio</button></a>';
    }
    ?>

  </td>
  <td width="10%" class="text-center">
    <?php
    if ($estado < 3) {
        // echo '<a href="pendienteCita.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-info btn-sm">Pendiente</button></a>';
    }
    ?>

// echo '<td width="10%" class="text-center"><a href="NoAsistio.php?idCitas=' . $idCitas . '"><button type="button" class="btn btn-block btn-danger btn-sm">No Asistio</button></a> </td> ';
                    </td> -->
<?php
include 'footer.php';

?>
<script type="text/javascript">
    $(document).ready(function() {
        var table = $('#example1').DataTable();
        table.on('draw.dt', function() {
            $('.select2').select2(); // Ejecutar Select2 en cada elemento con la clase "select2"
        });
    });

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
                let botonesEstado = JSON.parse(`<?= json_encode($botonesEstado) ?>`);
                let botones = JSON.parse(`<?= json_encode($botones) ?>`);
                if (response.status) {
                    $(`#btn${id}`).attr('title', botonesEstado[estado]).html(botones[estado]);
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
                let botonesPresencial = JSON.parse(`<?= json_encode($botonesPresencial) ?>`);
                if (response.status) {
                    $(`#btn2${id}`).attr('title', botonesPresencial[estado]).html(botonesPresencial[
                        estado]);
                }
            }
        });
    };
</script>
<script>
    function HistorialNotas(idCitas) {
        // Realizar solicitud AJAX al servidor para obtener los datos
        //obtener el valor de data-idCitas
        var idCitas = idCitas;

        Swal.fire({
            title: 'Historial de Notas',
            //html: '<div class="accordion" id="CitasAccordion"></div>',
            html: '<div class="container" id="contenedor_swal" style="width: 100%;">' +
                '<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">' +
                '<div>' +
                '<div class="s"></div>' +
                '<div class="text-titulo">' +
                '<span class="and">Historial de Notas</span>' +
                '</div>' +
                '<div class="s"></div>' +
                '</div>' +
                '<div id="CitasAccordion"><br></div>' +
                '</div>' +
                '</div>',
            showCloseButton: true,
            showConfirmButton: false,
            width: '40%',
            didOpen: function() {
                var accordion = $('#CitasAccordion');
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
                                            <div class="panel panel-default" id="collapse_` + detalleId +
                                `">
                                                <div class="panel-heading" role="tab" id="headingTwo">
                                                    <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#` +
                                detalleId +
                                `" aria-expanded="false" aria-controls="` + detalleId + `">
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
                                detalleId + `" aria-expanded="false" style="height: 0px;">
                                                    <div class="panel-body" style="text-align: initial;">
                                                        <div class="col-md-12">
                                                            ` + Nota + `
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
<link rel="stylesheet" href="css/AccordionNuevo.css">