<?php
include '../header.php';
include '../menu.php';

$idAtencion = base64_decode($_GET['iA']);
$link = base64_decode($_GET['l']);

// query 
$query = "SELECT * from planes_atencion where id = '{$idAtencion}'";
$result = mysqli_query($conn3, $query);
$row = mysqli_fetch_assoc($result);

$query = "SELECT * from planes_atencion_detalle where idPlan = '{$row['id']}'";
$result = mysqli_query($conn3, $query);
while ($rowD = mysqli_fetch_assoc($result)) {
    $rowDetalle[] = $rowD;
}
?>
<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Detalle de plan de atención: <strong># <?= $row['id'] ?></strong></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php
                                $arrayHeader = [
                                    ['Código de atención', '#' . $row['id']],
                                    ['Fecha de creación', $row['fechaRegistro']],
                                    ['Fecha de vencimiento', $row['fechaVencimiento']],
                                    ['Cita Agendada', ($row['idCita'] == 0 ? 'Ninguna cita previa' : '#' . $row['idCitas'] . ' | ' . funcionMaster($row['idCitas'], 'idCitas', 'concat(fecha," - ",Hora)', 'citas'))],
                                    ['Cliente', funcionMaster($row['idCliente'], 'cliente_id', 'concat(nombre_cliente," <br>",CODI_CLIENTE)', 'cliente')],
                                    ['Estado', ($row['abierto'] == 1 ? 'Abierto' : 'Cerrado')],
                                ];
                                ?>
                                <div class="row">
                                    <?php for ($i = 0; $i < count($arrayHeader); $i++) : ?>
                                        <div class="col-sm-6">
                                            <strong><?= $arrayHeader[$i][0] ?>:</strong>
                                            <p><?= $arrayHeader[$i][1] ?></p>
                                        </div>
                                    <?php endfor ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <ul class="todo-list ui-sortable w-100" data-widget="todo-list">
                                        <?php for ($i = 0; $i < count($rowDetalle); $i++) : ?>
                                            <li class="">
                                                <div class="icheck-primary d-inline ml-2" bis_skin_checked="1">
                                                    <input type="checkbox" value="" name="todo<?= $i ?>" id="todoCheck<?= $i ?>" <?= ($rowDetalle[$i]['estado'] == 1 ? 'checked' : '') ?> <?= ($rowDetalle[$i]['estado'] <> 0 ? 'disabled' : '') ?>>
                                                    <label for="todoCheck<?= $i ?>"></label>
                                                </div>
                                                <span class="text"><?= $rowDetalle[$i]['atencion'] ?></span>
                                                <?php if ($rowDetalle[$i]['estado'] <> 0) : ?>
                                                    <small class="badge badge-danger">
                                                        <i class="far fa-clock"></i>
                                                        <?= ($rowDetalle[$i]['estado'] == 1 ? 'Finalizada | ' : 'Cancelada | ') ?>
                                                        <?= $rowDetalle[$i]['fechaAtencion'] ?>
                                                    </small>
                                                <?php endif; ?>
                                                <div class="col-12 bg-white mt-3 p-3">
                                                    <label for="">Notas:</label>
                                                    <p><?= $rowDetalle[$i]['notas'] ?></p>
                                                    <br>
                                                    <label for="">Especialista:</label>
                                                    <p><?= funcionMaster($rowDetalle[$i]['idUsuario'],'ID','NOMBRE_USUARIO','usuarios') ?></p>
                                                    <br>
                                                    <label for="">Firma:</label>
                                                    <p>
                                                        <img src="<?=$rowDetalle[$i]['img1']?>" style="width:5cm; height:auto;">
                                                    </p>
                                                </div>

                                            </li>
                                        <?php endfor ?>
                                    </ul>
                                </div>
                            </div>
                            <div class="card-footer">

                            </div>

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
<!-- /.content-wrapper -->

<?php
include '../footer.php';
?>