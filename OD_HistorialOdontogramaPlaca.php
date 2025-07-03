<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Control de Placas </a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1"
              href="OD_GenerarOdontogramaPlaca?clienteId=<?php echo $clienteId; ?>" role="button"> <i
                class="fa fa-heartbeat"></i> Nuevo Control de Placas </a>

            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id = $clienteId; //esta es la variable que se usa dentro del include
            $FacturacionTipo = "OD_GenerarFactura?clienteId={$Cliente_id}"; //Facturacion Odontologia, con esto cambia la ruta del boton
            include 'IncludeBotonesHistorialHistorias.php';

            ?>

            <br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"
                class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Control de
                Placas </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">



                  <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  odontogramaMasterPlaca where idCliente = $clienteId AND (idUsuario = '{$_SESSION['ID']}' or idUsuario = '{$_SESSION['ID_principal']}') order by id DESC");
                  while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                    $id_placa = $row_recordset32['id'];
                    $Fecha = $row_recordset32['fecha'];
                    $Hora = $row_recordset32['hora'];

                    $superficies = $row_recordset32['superficies'];
                    $dientes_p = $row_recordset32['dientes_p'];

                    $Observaciones = $row_recordset32['Observaciones'];
                    $porcentaje = $row_recordset32['porcentaje'];

                    ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion"
                            href="#HistoriaPlaca<?php echo $id_placa ?>" aria-expanded="false"
                            aria-controls="HistoriaPlaca<?php echo $id_placa ?>">
                            Fecha
                            <?php echo $Fecha . '-' . $Hora . ' ' . ' | Porcentaje: ' . number_format($porcentaje); ?>
                            <button
                              onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($clienteId); ?>&historia_id=<?php echo encrypt($id_placa); ?>&tabla=<?php echo encrypt('odontogramaMasterPlaca'); ?>', '_blank', 'noopener')"
                              style="border: hidden;background-color: initial;font-size: 20px;"><i
                                class="fa fa-file"></i></button>

                            <button
                              onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($clienteId); ?>&historia_id=<?php echo encrypt($id_placa); ?>&tabla=<?php echo encrypt('odontogramaMasterPlaca'); ?>', '_blank', 'noopener')"
                              style="border: hidden;background-color: initial;font-size: 20px;"><i
                                class="fa fa-eye"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="HistoriaPlaca<?php echo $id_placa ?>" class="panel-collapse collapse" role="tabpanel"
                        aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">
                          <?php ?>

                          <hr align="center" size="10" width="100%" color="#000000">

                          <div align="right">
                            Fecha <?php echo $Fecha . '-' . $Hora ?>
                          </div>


                          <div>
                            <hr>
                            <label>Observaciones :</label>
                            <label> <?php echo $Observaciones ?></label>

                          </div>
                          <div>
                            <hr>
                            <label>Total de dientes presentes :</label>
                            <label> <?php echo $dientes_p ?></label>

                          </div>
                          <div>
                            <hr>
                            <label># de superficies con placa :</label>
                            <label> <?php echo $superficies ?></label>

                          </div>

                          <?php
                          ?>
                        </div>
                      </div>
                    </div>
                    <?php
                  }
                  ?>


                </div>
              </div>
              <!--final accordion-->   
            </div>
            <!-- cierre seccion 1-->
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>


<?php
include 'footer.php';
?>

<script>
  $(document).ready(function () {
    var table = $('#TablaOdontograma').DataTable({
      "language": {
        "url": "plugins/DataTablesK2/Es.json"
      },
      searchPanes: {
        viewCount: true,
        cascadePanes: true,
        initCollapsed: false,
        show: true
      },
      dom: 'Plfrtip',
      columnDefs: [{
        searchPanes: {
          show: true
        },
        targets: [0, 4, 5]
      },
      {
        searchPanes: {
          show: false
        },
        targets: [1, 2, 3, 6]
      }
      ]
    });


  });
</script>