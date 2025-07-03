
<?php
include 'header.php';
include 'menu.php';

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

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Caja Menor Histórico </a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Caja Menor Histórico </h4>
                <div class="box">
                    <div class="box-body">




                    <div class="box">
                        <!-- /.box-header -->
                        <div class="box-body">

                          <hr>
                          <table id="example1" class="table table-bordered table-striped">
                            <thead>
                              <tr>
                                <th>Periodo</th>
                                <th>Descripción</th>
                                <th>Saldo</th>
                                <th>Detalle</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php
                              $idUsuario = $_SESSION['ID'];
                              $sql = "SELECT * FROM cajaMenor where idUsuario = '$idUsuario'";
                              $result = mysqli_query($conn3, $sql);
                              while ($row = mysqli_fetch_array($result)) {
                                $idCaja = $row['id'];
                              ?>
                                <tr>
                                  <td><?php echo date('Y-m-d', strtotime($row['fechaInicio'])) . " - " . date('Y-m-d', strtotime($row['fechaFin'])); ?></td>
                                  <td><?php echo $row['motivo']; ?></td>
                                  <td><?php echo number_format($row['saldo'],2, ',', '.'); ?></td>
                                  <!-- abrimos modal para ver el detalle de la caja menor -->
                                  <td>
                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" data-toggle="modal" data-target="#modal<?= $row['id'] ?>">
                                      Ver Detalle
                                    </button>
                                    <form action="ReporteGeneral" method="POST">
                                      <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow mt-2">
                                        Generar Reporte
                                      </button>
                                      <input type="hidden" class="form-control input-lg" name="tipo_reporte" value="Reporte de Caja menor Detalles" required>
                                      <input type="hidden" class="form-control input-lg" name="caja" value="<?= $row['id'] ?>" required>
                                    </form>
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal<?= $row['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                      <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                          <div class="modal-header">
                                            <h5 class="modal-title">Caja Menor #<?= $row['id'] ?> <br> Periodo: <?php echo date('Y-m-d', strtotime($row['fechaInicio'])) . " - " . date('Y-m-d', strtotime($row['fechaFin'])); ?></h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                              <span aria-hidden="true">&times;</span>
                                            </button>
                                          </div>
                                          <div class="modal-body">
                                            <table id="" class="table table-bordered table-striped">
                                              <thead>
                                                <tr>
                                                  <th>Fecha</th>
                                                  <th>Documento</th>
                                                  <th>Descripción</th>
                                                  <th>Monto</th>
                                                  <th>Tipo</th>
                                                  <th>Saldo</th>
                                                </tr>
                                              </thead>
                                              <tbody>
                                                <?php
                                                $sql2 = "SELECT * FROM cajaMenorDetalle WHERE idCajaMenor = $idCaja Order by id ASC";
                                                $result2 = mysqli_query($conn3, $sql2);
                                                while ($row2 = mysqli_fetch_array($result2)) {
                                                ?>
                                                  <tr>
                                                    <td><?= $row2['fecha'] ?></td>
                                                    <td><?= $row2['documento'] ?></td>
                                                    <td><?= $row2['descripcion'] ?></td>
                                                    <td><?= number_format($row2['monto'],2, ',', '.') ?></td>
                                                    <td><?= $row2['tipo'] ?></td>
                                                    <td><?= number_format($row2['saldo'],2, ',', '.') ?></td>
                                                  </tr>
                                                <?php
                                                }
                                                ?>
                                              </tbody>
                                            </table>
                                          </div>
                                          <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                          </div>
                                        </div>
                                      </div>
                                    </div>

                                  </td>
                                </tr>
                              <?php
                              }
                              ?>
                            </tbody>
                          </table>

                        </div>



                      </div>
                      <!-- /.box-body -->
                    </div>




                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>