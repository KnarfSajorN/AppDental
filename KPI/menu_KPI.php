<!-- Left side column. contains the logo and sidebar -->
<?php
include '../header.php';
include '../menu.php'
?>

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
<div class="content-wrapper">
  <section class="content">
    <strong>Panel de Encuestas</strong>
    <div class="row justify-content-center p-5">
      <div class="col-md-6 mt-5 " style="text-align: center">

        <!DOCTYPE html>
        <html>
        <h1>termómetro de calidad</h1>
        <div class="chart-wrapper">
          <ul class="chart-y" style="list-style: none;">
            <li>😁</li>
            <li>🙂</li>
            <li>😐</li>
            <li>😡</li>
            <li>🤬</li>
          </ul>
          <ul class="chart-x" style="list-style: none;">
            <li data-year="5">Muy satisfecho</li>
            <li data-year="4">Satisfcho</li>
            <li data-year="3">Se puede mejorar</li>
            <li data-year="2">Insatisfecho</li>
            <li data-year="1">Muy Insatisfecho </li>
          </ul>
        </div>
      </div>
      <div class="col-md-6 mt-5">
        <div style="display: flex; justify-content: center;">
          <canvas id="donaChart"></canvas>
        </div>
        <script>
          <?php
          //Se toma de la tabla de citas, el puntaje y se hace un calculo global mostrando el promedio de satisfacción
          // Al momento de darle "ASISTIO" al cliente le llegar un mensaje con la encuesta y al llenarla se verá reflejada en este apartado
          //by: Emma 20.06.2023
          $fechaActual = new DateTime();
          // Obtener el último día del mes actual
          $ultimoDiaMes = clone $fechaActual;
          $ultimoDiaMes->modify('last day of this month');
          // Formatear la fecha como una cadena
          $ultimoDiaMesString = $ultimoDiaMes->format('Y-m-d');
          //echo "Fecha actual: " . $fechaActual->format('Y-m-d') . "<br>";
          //echo "Último día del mes actual: " . $ultimoDiaMesString;

          $ID = $_SESSION['ID'];
          $clienteId = $_GET['clienteId'];
          /*
                                $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                                FROM citas
                                WHERE c_puntaje > '' AND fecha <= CURDATE() AND estado = 3
                                GROUP BY MONTH(fecha)
                                ");*/
          $resultado = mysqli_query($conn3, "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad, AVG(c_puntaje) AS promedio
                                FROM citas
                                WHERE c_puntaje > '' AND fecha <= '$ultimoDiaMesString'
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
              'Enero',
              'Febrero',
              'Marzo',
              'Abril',
              'Mayo',
              'Junio',
              'Julio',
              'Agosto',
              'Septiembre',
              'Octubre',
              'Noviembre',
              'Diciembre'
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
            <p><strong>PROMEDIO MENSUAL:</strong> <?php echo number_format($promedio, 1); ?></p>
          </div>
          <div class="col-md-3">
            <p><strong>CANTIDAD DE PACIENTES ENCUESTADOS (MES ACTUAL):</strong> <?php echo $cantidad; ?></p>
          </div>
          <div class="col-md-3">
            <p><strong>PROMEDIO GLOBAL:</strong> <?php echo number_format($promedioGlobal, 1); ?></p>
          </div>
          <div class="col-md-3  ">
            <p><strong>CANTIDAD DE PACIENTES ENCUESTADOS (GLOBAL):</strong> <?php echo $cantidadCitas; ?></p>
          </div>
        </div>
      </div>
    </div>
</div>
</section>
</div>
<div class="app-inner-layout__wrapper">
  <div class="app-inner-layout__content">
    <div class="tab-content">
      <div class="container-fluid">
        <div class="mb-3 card">
          <div class="card-header-tab card-header">
            <div class="card-header-title font-size-lg text-capitalize font-weight-bold center text-center" align="center">
              REPORTES
            </div>
          </div>
          <div class="no-gutters row">
            <div class="col-md-12">
              <!-- Content Wrapper. Contains page content -->
              <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                  <div class="">
                    <div class="col-md-12 mt-3 mb-3">

                      <div class="box">
                        <div class="box-header">
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body mt-3">
                          <div class="col-md-11 row ">
                            <div class="text-center">
                              <a class="btn btn-primary rounded-circle p-4 m-4" style="font-size: 24px; border-radius: 50%; width: 200px; height: 200px;" href="<?php echo $Base; ?>reportVentaPorDia">
                                <i class="fa-solid fa-money-bill" style="font-size: 100px;"></i>
                                <p style="font-size: 14px; margin-top: 20px;">Reporte de Ventas por Día</p>
                              </a>
                              <a class="btn btn-primary rounded-circle p-4 m-4" style="font-size: 24px; border-radius: 50%; width: 200px; height: 200px; text-align: center;" href="<?php echo $Base; ?>reporteClientes">
                                <i class="fa-solid fa-person" style="font-size: 100px;"></i>
                                <p style="font-size: 14px; margin-top: 20px;">Reporte de Clientes</p>
                              </a>
                              <a class="btn btn-primary rounded-circle p-4 m-4" style="font-size: 24px; border-radius: 50%; width: 200px; height: 200px; text-align: center;" href="<?php echo $Base; ?>reporteCompras">
                                <i class="fa-solid fa-cart-shopping" style="font-size: 100px;"></i>
                                <p style="font-size: 14px; margin-top: 20px;">Reporte compras</p>
                              </a>
                              <a class="btn btn-primary rounded-circle p-4 m-4" style="font-size: 24px; border-radius: 50%; width: 200px; height: 200px; text-align: center;" href="<?php echo $Base; ?>reporteInventario">
                                <i class="fa-solid fa-hospital" style="font-size: 100px;"></i>
                                <p style="font-size: 14px; margin-top: 20px;">Reporte inventario</p>
                              </a>
                              <a class="btn btn-primary rounded-circle p-4 m-4" style="font-size: 24px; border-radius: 50%; width: 200px; height: 200px; text-align: center;" href="<?php echo $Base; ?>reportePacientes">
                                <i class="fa-solid fa-user-nurse" style="font-size: 100px;"></i>
                                <p style="font-size: 14px; margin-top: 20px;">Reporte de pacientes</p>
                              </a>
                              <a class="btn btn-primary rounded-circle p-4 m-4" style="font-size: 24px; border-radius: 50%; width: 200px; height: 200px; text-align: center;" href="<?php echo $Base; ?>CIE10">
                                <i class="fa-solid fa-user-nurse" style="font-size: 100px;"></i>
                                <p style="font-size: 14px; margin-top: 20px;">CIE10</p>
                              </a>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<?php
include '../footer.php';

?>

<!-- Estilos para el termometro -->

<style>
  .chart-wrapper {
    display: grid;
    justify-content: center;
    grid-column-gap: 4rem;
    grid-template-columns: auto auto auto;
  }

  .chart-wrapper .chart-y {
    display: grid;
    grid-row-gap: 4rem;
  }


  .chart-wrapper .chart-x {
    position: relative;
    width: 50px;
    border-radius: 25px;
    border: 8px black solid;
    background: red;
    overflow: hidden;
  }

  .chart-wrapper .chart-x li::before {
    content: attr(data-year);
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    z-index: 100;
    border-top: 4px solid;
    width: 20px;
    opacity: 0;
    padding-left: 3px;
    color: var(--black);
    font-size: 0.75rem;
    transition: opacity 0.5s ease-out;
  }

  .chart-wrapper .chart-x li:nth-child(1)::before {
    border-color: blue;
  }

  .chart-wrapper .chart-x li:nth-child(2)::before {
    border-color: black;
  }

  .chart-wrapper .chart-x li:nth-child(3)::before {
    border-color: yellow;
  }

  .chart-wrapper .chart-x li:nth-child(4)::before {
    border-color: yellow;
  }

  .chart-wrapper .chart-x li:nth-child(5)::before {
    border-color: yellow;

  }
</style>

<script>
  window.addEventListener("load", () => {
    document.body.classList.add("loaded");
  });
</script>