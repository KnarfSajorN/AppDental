<?php
include '.././header.php';
include '.././menu.php';
$IdPaciente = $_POST['cliente_id'];
?>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    </section>
    <h5>Reportes de CIE-10</h5>
    <section class="content">
        <div class="row">
            <div class="col-md-4 col-md-offset-8">
                <?php
                $arrayDatosE = [];
                $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica ");
                $conteoDiagnosticos = []; // Array asociativo para contar los diagnósticos por código

                while ($fila = mysqli_fetch_array($resultado)) {
                    for ($i = 27; $i <= 30; $i++) {
                        $codigo = $fila[$i];

                        if (!empty($codigo)) {
                            if (!isset($conteoDiagnosticos[$codigo])) {
                                $conteoDiagnosticos[$codigo] = 1;
                            } else {
                                $conteoDiagnosticos[$codigo]++;
                            }
                        }
                    }
                }
                $totalDiagnosticos = array_sum($conteoDiagnosticos);   // echo "Total de diagnósticos: " . $totalDiagnosticos . "<br>";
                foreach ($conteoDiagnosticos as $codigo => $conteo) {
                    array_push($arrayDatosE, [$codigo, $conteo]);
                }
                ?>
                <?php
                $_GET['n'] = 6;
                $_GET['nombre'] = 'Grafica CIE-10';
                $_GET['Tiempo'] = '1000';
                $_GET['datos'] = json_encode($arrayDatosE);
                ?>
                <?php include '../generarGrafica.php' ?>
                <strong>
                    <h3>Reporte de CIE-10</h3>
                </strong>
            </div>
            <div class="row">

            </div>
            <div class="col-md-4">
                <?php
                $arrayDatosEdadesDiagnosticos = []; // Almacenará los datos de edades y diagnósticos

                $resultado = mysqli_query($conn3, "SELECT fechaNacimiento, CIE10_1, CIE10_2, CIE10_3, CIE10_4 FROM Historia_Clinica hc INNER JOIN cliente c ON hc.cliente_id = c.cliente_id");

                $conteoEdadesDiagnosticos = [];

                while ($fila = mysqli_fetch_array($resultado)) {
                    $fechaNacimiento = new DateTime($fila['fechaNacimiento']);
                    $hoy = new DateTime();
                    $edad = $hoy->diff($fechaNacimiento)->y;

                    // Definir los rangos de edad
                    $grupoEdad = floor($edad / 10) * 10 . '-' . (floor($edad / 10) * 10 + 9);

                    // Obtener los diagnósticos
                    $diagnosticos = array($fila['CIE10_1'], $fila['CIE10_2'], $fila['CIE10_3'], $fila['CIE10_4']);

                    // Contar los diagnósticos en cada grupo de edad
                    foreach ($diagnosticos as $diagnostico) {
                        if (!empty($diagnostico)) {
                            if (!isset($conteoEdadesDiagnosticos[$grupoEdad][$diagnostico])) {
                                $conteoEdadesDiagnosticos[$grupoEdad][$diagnostico] = 1;
                            } else {
                                $conteoEdadesDiagnosticos[$grupoEdad][$diagnostico]++;
                            }
                        }
                    }
                }

                // Convertir los datos a un formato compatible con el gráfico
                $datosEdadesDiagnosticos = [];

                foreach ($conteoEdadesDiagnosticos as $grupoEdad => $diagnosticos) {
                    $datosPorEdad = [
                        'grupoEdad' => $grupoEdad,
                        'diagnosticos' => $diagnosticos
                    ];
                    $datosEdadesDiagnosticos[] = $datosPorEdad;
                }

                $datosReformateados = [];
                foreach ($datosEdadesDiagnosticos as $datos) {
                    $grupoEdad = $datos['grupoEdad'];
                    $diagnosticos = $datos['diagnosticos'];

                    foreach ($diagnosticos as $diagnostico => $cantidad) {
                        $datosReformateados[] = [$diagnostico, $cantidad];
                    }
                }

                $_GET['n'] = '1';
                $_GET['nombre'] = 'Grafica edades';
                $_GET['Tiempo'] = '1000';
                $_GET['datos'] = json_encode($datosReformateados);
                include '../generarGrafica.php';
                ?>
                <strong>
                    <h3>Reporte de CIE-10 por edad</h3>
                </strong>
            </div>
            <div class="col-md-4">
                <?php
                $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica as hi, cliente as cl WHERE hi.cliente_id = cl.cliente_id");
                $totalHombres = 0;
                $totalMujeres = 0;

                while ($row = mysqli_fetch_assoc($resultado)) {
                    if ($row['genero'] == 'F')
                        $totalMujeres++;
                    if ($row['genero'] == 'M')
                        $totalHombres++;
                }

                $totalDatosGenero = [
                    ["Hombres", $totalHombres],
                    ["Mujeres", $totalMujeres],

                ];

                $_GET['n'] = 11;
                $_GET['nombre'] = 'Grafica por genero';
                $_GET['Tiempo'] = '500';
                $_GET['datos'] = json_encode($totalDatosGenero);
                include '../generarGrafica.php';

                ?>

                <strong>
                    <h3>Reporte de CIE-10 por genero </h3>
                </strong>
            </div>
            <div class="col-md-4">
                <?php
                $arrayPaciente = []; // Inicializar el array para el conteo por género
                $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica as hi, cliente as cl WHERE hi.cliente_id = cl.cliente_id AND cl.cliente_id = '$IdPaciente'");
                $conteoDiagnosticos = []; // Array asociativo para contar los diagnósticos por código

                while ($fila = mysqli_fetch_array($resultado)) {
                    for ($i = 27; $i <= 30; $i++) {
                        $codigo = $fila[$i];

                        if (!empty($codigo)) {
                            if (!isset($conteoDiagnosticos[$codigo])) {
                                $conteoDiagnosticos[$codigo] = 1;
                            } else {
                                $conteoDiagnosticos[$codigo]++;
                            }
                        }
                    }
                }
                $totalDiagnosticos = array_sum($conteoDiagnosticos);

                foreach ($conteoDiagnosticos as $codigo => $conteo) {
                    array_push($arrayPaciente, [$codigo, $conteo]);
                }

                $_GET['n'] = 9;
                $_GET['nombre'] = 'Grafica CIE-10 para paciente';
                $_GET['Tiempo'] = '1000';
                $_GET['datos'] = json_encode($arrayPaciente);
                include '../generarGrafica.php';

                ?>
                <form method="post">
                    <label for="idCliente">Seleccione el Paciente:</label>
                    <select class="form-control select2" name="cliente_id" id="cliente_id">
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
                            echo '<option value="">No se encontraron clientes</option>';
                        }
                        ?>
                    </select>
                    <input class="btn btn-primary mb-1" type="submit" value="Generar Reporte Paciente">
                </form>

                <strong>
                    <h3>Reporte de CIE-10 por paciente</h3>
                </strong>
            </div>
            <div class="col-md-4 ">
                <?php
                $arrayDatosTop10 = [];
                $resultado = mysqli_query($conn3, "SELECT * FROM Historia_Clinica ");
                $conteoDiagnosticos = []; // Array asociativo para contar los diagnósticos por código

                while ($fila = mysqli_fetch_array($resultado)) {
                    for ($i = 27; $i <= 30; $i++) {
                        $codigo = $fila[$i];

                        if (!empty($codigo)) {
                            if (!isset($conteoDiagnosticos[$codigo])) {
                                $conteoDiagnosticos[$codigo] = 1;
                            } else {
                                $conteoDiagnosticos[$codigo]++;
                            }
                        }
                    }
                }
                $totalDiagnosticos = array_sum($conteoDiagnosticos);

                // Obtener solo los primeros 10 valores del array
                $conteoDiagnosticos = array_slice($conteoDiagnosticos, 0, 10, true);

                foreach ($conteoDiagnosticos as $codigo => $conteo) {
                    array_push($arrayDatosTop10, [$codigo, $conteo]);
                }
                ?>
                <?php
                $_GET['n'] = 10;
                $_GET['nombre'] = 'Grafica CIE-10';
                $_GET['Tiempo'] = '1000';
                $_GET['datos'] = json_encode($arrayDatosTop10);
                ?>
                <?php include '../generarGrafica.php' ?>
                <strong>
                    <h3>Reporte de CIE-10 TOP 10</h3>
                </strong>
            </div>
        </div>

</div>
<!-- /.row -->
</section>
<!-- /.content -->
</div>

<script>
    function generarGraficaParaPaciente() {
        var IdPaciente = document.getElementById("cliente_id").value;

        // Realizar la petición AJAX para obtener los datos de la gráfica
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Actualizar la sección de la página donde se muestra la gráfica
                document.getElementById("graficaCIE10").innerHTML = this.responseText;
            }
        };

        // Hacer la solicitud al archivo CIE10.php para generar la gráfica
        xhttp.open("GET", "CIE10?IdPaciente=" + IdPaciente, true);
        xhttp.send();
    }

    // Llamar a la función para generar la gráfica cuando se cargue la página (opcional)
    window.onload = function() {
        generarGraficaParaPaciente();
    };
</script>

<?php
include '../footer.php';
?>