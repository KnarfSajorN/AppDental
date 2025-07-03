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

<!-- Reporte ventas tabla -->

<div class="container mt-5">
    <form action="reporteClientes" method="post">
        <div class="form-row">
            <div class="form-group col-md-3">
                <label for="tipo_reporte">Seleccione el tipo de reporte:</label>
                <select class="form-control select2" name="tipo_reporte" id="tipo_reporte">
                    <option value="Citas por paciente">Citas por paciente</option>
                    <option value="Pacientes por sexo">Cientes por sexo</option>
                    <option value="Pacientes por genero">Clientes por genero</option>
                    <option value="Pacientes por edad">Clientes por edad</option>
                    <option value="Tasa de abandono o fuga de clientes">Tasa de abandono o fuga de clientes</option>
                </select>
                <label for="treporte_sexo">Seleccione el género:</label>
                <select class="form-control select2" name="reporte_sexo" id="reporte_sexo">
                    <option value="M">Hombre</option>
                    <option value="F">Mujer</option>
                    <option value="null">Sin definir</option>
                    <!-- Otras opciones -->
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="fechaDesde">Desde:</label>
                <input type="date" class="form-control" id="fechaDesde" name="fechaDesde">
            </div>
            <div class="form-group col-md-3">
                <label for="fechaHasta">Hasta:</label>
                <input type="date" class="form-control" id="fechaHasta" name="fechaHasta">
            </div>
            <div class="form-group col-md-3">
                <label for="idCliente">Seleccione el Paciente:</label>
                <select class="form-control select2" name="cliente_id">
                    <!-- Opciones de clientes generadas desde PHP -->
                    <?php
                    $queryList = mysqli_query($conn3, "SELECT cliente_id, nombre_cliente FROM cliente where (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') ORDER BY nombre_cliente ASC;");
                    // Verifica si la consulta fue exitosa
                    if ($queryList) {
                        while ($fila = mysqli_fetch_assoc($queryList)) {
                            echo '<option value="' . $fila['cliente_id'] . '">' . $fila['nombre_cliente'] . '</option>';
                        }
                        mysqli_free_result($queryList); // Liberar memoria del resultado
                    } else {
                        echo '<option value="">No se encontraron clientes</option>';
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
                    $Cabezera["Citas por paciente"] = ["FECHA", "HORA", "NOMBRE", "TELEFONO", "CORREO", "REGISTRADO", "MOTIVO CONSULTA"];
                    $Cabezera["Pacientes por sexo"] = ["NOMBRE", "TELEFONO", "CORREO", "DIRECCION", "ALERGIA", "TIPO SANGRE"];
                    $Cabezera["Pacientes por genero"] = ["FECHA", "HORA", "NOMBRE", "TELEFONO", "CORREO", "NACIONALIDAD", "MOTIVO CONSULTA"];
                    $Cabezera["Pacientes por edad"] = ["FECHA", "HORA", "NOMBRE", "TELEFONO", "CORREO", "NACIONALIDAD", "MOTIVO CONSULTA"];

                    foreach ($Cabezera[$tipo_reporte] as $key => $value) {
                        echo "<td>{$value}</td>";
                    }
                    ?>
                </tr>
            </thead>
        </table>

    </div>

    <div class="mt-5 mb-4">
        <canvas id="usuariosActInA" width="200" height="100"></canvas>
        <canvas id="graficoEdades" width="200" height="100"></canvas>
        <div id="grafica" class="<?php echo isset($mostrarGrafica) && $mostrarGrafica ? 'mostrar' : 'ocultar'; ?>">
            <?php include 'generarGrafica.php'; ?>
        </div>
    </div>

</div>

<?php
include '.././footer.php'
    ?>
<script>
    var data_table = []; //datos que recibe la tabla
    var titulo_tabla = "<?php echo $tipo_reporte; ?>";
    var opcion = "<?php echo $tipo_reporte; ?>";
    switch (opcion) {
        case 'Citas por paciente':
            <?php
            $queryList = mysqli_query($conn3, "SELECT citas.* FROM citas, cliente WHERE (citas.doctor = '{$_SESSION['ID']}' or citas.doctor = '{$_SESSION['ID_principal']}') and citas.idCliente = cliente.cliente_id AND cliente.cliente_id = $ID_cliente");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $fechCita = $rowMotorizado['fecha'];
                $hora = $rowMotorizado['Hora'];
                $nombrePaciente = $rowMotorizado['nombre'];
                $telefono = $rowMotorizado['telefono'];
                $correo = $rowMotorizado['correo'];
                $registrado = $rowMotorizado['registrado'];
                $motivoConsulta = $rowMotorizado['motivoConsulta'];


                ?>
                data_table.push(["<?php echo $fechCita; ?>",
                    "<?php echo $hora; ?>",
                    "<?php echo $nombrePaciente; ?>",
                    "<?php echo $telefono; ?>",
                    "<?php echo $correo; ?>",
                    "<?php echo $registrado; ?>",
                    "<?php echo $motivoConsulta; ?>",
                ]);

                <?php
            }
            ?>
            break;
        case 'Pacientes por sexo':
            console.log("<?php echo $genero; ?>");
            <?php
            $queryList = mysqli_query($conn3, "SELECT * from cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') and genero like '%$genero%'");
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                $nombrePaciente = $rowMotorizado['nombre_cliente'];
                $telefono = $rowMotorizado['telefono_cliente'];
                $correo = $rowMotorizado['correo_cliente'];
                $direccion = $rowMotorizado['direccion_cliente'];
                $alergias = $rowMotorizado['alergias'];
                $tipoSangre = $rowMotorizado['tiposSangre'];


                ?>
                data_table.push(["<?php echo $nombrePaciente; ?>",
                    "<?php echo $telefono; ?>",
                    "<?php echo $correo; ?>",
                    "<?php echo $direccion; ?>",
                    "<?php echo $alergias; ?>",
                    "<?php echo $tipoSangre; ?>",
                ]);

                <?php
            }
            ?>
            break;
        case 'Pacientes por genero':
            var mostrarGrafica = <?php echo isset($mostrarGrafica) && $mostrarGrafica ? 'true' : 'false'; ?>;
            var graficaDiv = document.getElementById('grafica');

            if (mostrarGrafica) {
                // Si se debe mostrar la gráfica, cambiar su clase para mostrarla
                graficaDiv.classList.remove('ocultar');
                graficaDiv.classList.add('mostrar');
            }
            <?php
            $arrayDatosA = [];
            $resultado = mysqli_query($conn3, "SELECT * FROM cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");
            $contadorM = 0; // Variable para contar los registros masculinos
            $contadorF = 0; // Variable para contar los registros femeninos

            while ($fila = mysqli_fetch_array($resultado)) {
                $Sexo_P = $fila['11'];

                if ($Sexo_P == 'M') {
                    $contadorM++;
                } else {
                    $contadorF++;
                }
            }
            // Agregar los datos a la gráfica
            array_push($arrayDatosA, ['Masculino', $contadorM]);
            array_push($arrayDatosA, ['Femenino', $contadorF]);
            ?>
            <?php
            $_GET['n'] = 2;
            $_GET['nombre'] = 'Grafica Sexo';
            $_GET['Tiempo'] = '900';
            $_GET['datos'] = json_encode($arrayDatosA);
            $mostrarGrafica = true;
            ?>




            break;
        case 'Pacientes por edad':
            console.log('Pacientes por edad');
            <?php
            $resultado = mysqli_query($conn3, "SELECT fechaNacimiento FROM cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')");

            // Array para almacenar las edades de los pacientes
            $edades = array();
            // Calcular edades y agrupar por rangos
            while ($fila = mysqli_fetch_assoc($resultado)) {
                // Calcular edad a partir de la fecha de nacimiento
                $fecha_nacimiento = new DateTime($fila['fechaNacimiento']);
                $ahora = new DateTime();
                $edad = $ahora->diff($fecha_nacimiento)->y;

                // Agrupar edades por rangos (ejemplo: 0-10, 11-20, etc.)
                // Aquí puedes definir tus propios rangos de edad según tu criterio
                if ($edad <= 10) {
                    $edades['0-10'] = isset($edades['0-10']) ? $edades['0-10'] + 1 : 1;
                } elseif ($edad <= 20) {
                    $edades['11-20'] = isset($edades['11-20']) ? $edades['11-20'] + 1 : 1;
                } elseif ($edad <= 30) {
                    $edades['21-30'] = isset($edades['21-30']) ? $edades['21-30'] + 1 : 1;
                } elseif ($edad <= 40) {
                    $edades['31-40'] = isset($edades['31-40']) ? $edades['31-40'] + 1 : 1;
                }
            }

            // Convertir el array de edades a formato JSON para enviarlo al frontend
            $datos_edades = json_encode($edades);

            ?>
            var dataFromPHP = <?php echo $datos_edades; ?>;
            var ctx = document.getElementById('graficoEdades').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: Object.keys(dataFromPHP), // Usar las claves como etiquetas
                    datasets: [{
                        label: 'Pacientes por edad',
                        data: Object.values(dataFromPHP), // Usar los valores como datos
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.5)',
                            'rgba(54, 162, 235, 0.5)',
                            'rgba(255, 206, 86, 0.5)',
                            'rgba(75, 192, 192, 0.5)'
                        ],
                        borderColor: [
                            'rgba(255, 99, 132, 1)',
                            'rgba(54, 162, 235, 1)',
                            'rgba(255, 206, 86, 1)',
                            'rgba(75, 192, 192, 1)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    // Configuraciones adicionales del gráfico
                }
            });
            break;
        case 'Tasa de abandono o fuga de clientes':
            <?php
            $queryList = mysqli_query($conn3, "SELECT COUNT(CASE WHEN activo = 1 THEN 1 END) AS activos, COUNT(CASE WHEN activo = 0 THEN 1 END) AS inactivos FROM cliente where (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}');");
            if ($queryList) {
                $result = mysqli_fetch_assoc($queryList);
                $activos = $result['activos'];
                $inactivos = $result['inactivos'];
                $total = $activos + $inactivos;
                $porcentajeActivos = ($activos / $total) * 100;
                $porcentajeInactivos = ($inactivos / $total) * 100;
            } else {
                // Manejar el caso en el que la consulta falle
                $activos = 0;
                $inactivos = 0;
                $total = 0;
                $porcentajeActivos = 0;
                $porcentajeInactivos = 0;
            }
            ?>

        default:
            break;
    }
</script>


<script type="text/javascript">
    $(function () {
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


<script>
    $(document).ready(function () {
        $('#tipo_reporte').on('change', function () {
            var seleccion = $(this).val();
            if (seleccion === "Tasa de abandono o fuga de clientes") {
                $('#usuariosActInA').show();
            } else {
                $('#usuariosActInA').hide();
            }
        });

        if ($('#tipo_reporte').val() !== "Tasa de abandono o fuga de clientes") {
            $('#usuariosActInA').hide();
        }
    });
</script>


<script>
    var ctx = document.getElementById('usuariosActInA').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Activos', 'Inactivos'],
            datasets: [{
                label: 'Porcentaje de Clientes',
                data: [<?php echo $porcentajeActivos; ?>, <?php echo $porcentajeInactivos; ?>],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            // Configuraciones opcionales de la gráfica
        }
    });
</script>