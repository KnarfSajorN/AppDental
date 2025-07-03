<?php
// -------------------------------------------------
// esto es un plan de atención para un paciente
// lo que hace es delimitar un flujo de eventos los cuales sera atendido un paciente en su estadía o eventualidad en el hospital
// cada paso debe registrarse y ser llenado por el especialista especificando el estado del mismo junto con una nota y su firma digitalizada
// el plan de atención puede depender de una cita para dispararse o activarse
// -------------------------------------------------
// el plan de atención también refiere a una serie de pasos o procedimientos que se llevan a cabo al atender un paciente
// ej:
// 1. triaje o atención inicial
// 2. examen físico
// 3. historia clínica general
// 4. examen de laboratorio
// 5. oftalmología
// cada paso debe ser actualizado por el especialista o en dado caso por el secretario al finalizar la sesión del paciente para poder dar cierre a esta "atención"

include './funciones/conn3.php';

$idClientePlan = $_GET['idCliente'];

// consulta al cliente para obtener sus datos
$query = "SELECT * from cliente where cliente_id = '{$idClientePlan}'";
$result = mysqli_query($conn3, $query);
$rowCliente = mysqli_fetch_assoc($result);


// query atenciones
$query = "SELECT * from planes_atencion 
where 1=1
and idCliente = '{$idClientePlan}'
and abierto = 1
order by id desc
limit 1
";
$result = mysqli_query($conn3, $query);
$rowPlan = mysqli_fetch_assoc($result);

if ($rowPlan != null) {
    // query atenciones detalle
    $query = "SELECT * from planes_atencion_detalle where idPlan = '{$rowPlan['id']}'";
    $result = mysqli_query($conn3, $query);
    while ($row = mysqli_fetch_assoc($result)) {
        $rowPlanDetalle[] = $row;
    }
}

?>
<style>
    .fixed-bottom-center {
        position: fixed;
        top: 0.5rem;
        left: 50%;
        transform: translateX(-50%);
        z-index: 9999;
    }
</style>

<!-- Button trigger modal -->
<div class="fixed-bottom-center">
    <button type="button" class="btn btn-primary rounded-pill" data-toggle="modal" data-target="#modelId">
        <i class="fas fa-hand-holding-medical mr-1"></i>
        Plan de atención
    </button>
</div>



<!-- Modal -->
<div class="modal fade" id="modelId" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    Plan de atención para:
                    <strong><?= $rowCliente['nombre_cliente'] ?></strong>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">

                    <div class="col-12">
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Atención Actual</h3>
                            </div>
                            <div class="card-body">
                                <?php if ($rowPlan == null) : ?>
                                    <!-- nuevo -->
                                    <div class="center text-center">
                                        <i class="fas fa-exclamation fa-5x text-primary"></i>
                                        <p>No hay atenciones activas</p>
                                        <hr>
                                        <h4>Nueva atención</h3>
                                            <form id="nuevaAtencion">
                                                <div class="row m-0 p-0">
                                                    <div class="col-md-12 form-group">
                                                        <label for="">Cita</label>
                                                        <select class="form-control" name="datos[idCita]" id="idCita">
                                                            <?php
                                                            $query = "SELECT * from citas 
                                                        where 1=1
                                                        and idCliente = '{$idClientePlan}'
                                                        and fecha = now()
                                                        ";
                                                            $result = mysqli_query($conn3, $query);
                                                            while ($row = mysqli_fetch_assoc($result)) {
                                                                echo '<option value="' . $row['idCitas'] . '">' . $row['fecha'] . ' - ' . $row['Hora'] . '</option>';
                                                            }
                                                            ?>
                                                            <option value="0">Ninguna cita previa</option>
                                                        </select>
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <label for="">Fecha de vencimiento</label>
                                                        <input type="date" name="datos[fechaVencimiento]" id="fechaVencimiento" class="form-control" value="<?= date('Y-m-d') ?>">
                                                    </div>
                                                    <div class="col-md-12 form-group" id="cajaAtenciones">
                                                        <label for="">Atenciones</label>
                                                        <button type="button" class="btn btn-primary btn-sm" onclick="nuevaAtencion()">
                                                            <i class="fas fa-plus"></i>
                                                        </button>
                                                        <input type="text" name="datos[atenciones][]" id="atenciones" class="form-control" placeholder="Ej: Triaje / Examen Físico / Consulta General / etc">
                                                    </div>
                                                    <div class="col-md-12 form-group">
                                                        <input type="hidden" name="datos[idCliente]" value="<?= $idClientePlan ?>">
                                                        <input type="hidden" name="datos[abierto]" value="1">
                                                        <input type="hidden" name="datos[urlOrigen]" value="<?= $_SERVER['REQUEST_URI'] ?>">
                                                        <button type="submit" class="btn btn-primary btn-block rounded-pill" onclick="$('#nuevaAtencion').automaticForm({type:1,idUpdate:0,table:'planes_atencion',reload:'',page:'./planAtencion/procesarAtenciones.php',post:1,keepData:1})">
                                                            <i class="fas fa-save"></i>
                                                            Guardar
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                    </div>
                                    <!-- nuevo -->
                                <?php elseif ($rowPlan['abierto'] == 1 && $rowPlan['fechaVencimiento'] < date('Y-m-d')) : ?>
                                    <!-- vencido -->
                                    <div class="center text-center">
                                        <i class="fas fa-exclamation fa-5x text-danger mb-3"></i>
                                        <p>La ultima atención ha expirado</p>
                                        <h3 class="text-danger">Fecha: <?= $rowPlan['fechaVencimiento'] ?></h3>
                                        <p>Se ha cerrado la atención</p>
                                        <button class="btn btn-primary btn-block rounded-pill" onclick="automaticUpdate(0, 'abierto', 'planes_atencion', '<?= $rowPlan['id'] ?>', '')">
                                            <i class="fas fa-plus"></i>
                                            Nueva atención
                                        </button>
                                    </div>
                                    <!-- vencido -->
                                <?php else : ?>
                                    <!-- actual -->
                                    <ul class="todo-list ui-sortable" data-widget="todo-list">
                                        <?php for ($i = 0; $i < count($rowPlanDetalle); $i++) : ?>
                                            <li class="">
                                                <div class="icheck-primary d-inline ml-2" bis_skin_checked="1">
                                                    <input type="checkbox" value="" name="todo<?= $i ?>" id="todoCheck<?= $i ?>" <?= ($rowPlanDetalle[$i]['estado'] == 1 ? 'checked' : '') ?> <?= ($rowPlanDetalle[$i]['estado'] <> 0 ? 'disabled' : '') ?> onclick="location.href = 'actualizarEstadoPlan?iA=<?= base64_encode($rowPlanDetalle[$i]['id']) ?>&l=<?= base64_encode($_SERVER['SERVER_NAME'] . $_SERVER['REQUEST_URI']) ?>';">
                                                    <label for="todoCheck<?= $i ?>"></label>
                                                </div>
                                                <span class="text"><?= $rowPlanDetalle[$i]['atencion'] ?></span>
                                                <?php if ($rowPlanDetalle[$i]['estado'] <> 0) : ?>
                                                    <small class="badge badge-danger">
                                                        <i class="far fa-clock"></i>
                                                        <?= ($rowPlanDetalle[$i]['estado'] == 1 ? 'Finalizada | ' : 'Cancelada | ') ?>
                                                        <?= $rowPlanDetalle[$i]['fechaAtencion'] ?>
                                                    </small>
                                                <?php else : ?>
                                                    <div class="tools" bis_skin_checked="1">
                                                        <i class="fas fa-close" title="Cancelar Atencion" onclick="automaticUpdate(2, 'estado', 'planes_atencion_detalle', '<?= $rowPlanDetalle[$i]['id'] ?>', ''); automaticUpdate('<?=date('Y-m-d H:i:s')?>', 'fechaAtencion', 'planes_atencion_detalle', '<?= $rowPlanDetalle[$i]['id'] ?>', ''); automaticUpdate('<?=$_SESSION['ID']?>', 'idUsuario', 'planes_atencion_detalle', '<?= $rowPlanDetalle[$i]['id'] ?>', '');"></i>
                                                    </div>
                                                <?php endif; ?>
                                            </li>
                                        <?php endfor ?>
                                    </ul>
                                    <!-- actual -->
                                    <?php $detallesPendientes = funcionMaster($rowPlan['id'],'estado = 0 and idPlan','count(id)','planes_atencion_detalle'); ?>
                                    <?php if ($detallesPendientes == 0) : ?>
                                        <button class="btn btn-primary btn-block rounded-pill mt-3" onclick="automaticUpdate(0, 'abierto', 'planes_atencion', '<?= $rowPlan['id'] ?>', '')">
                                            <i class="fas fa-circle"></i>
                                            Finalizar atención
                                        </button>
                                    <?php endif ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        <div class="card card-primary collapsed-card">
                            <div class="card-header">
                                <h3 class="card-title">Histórico del paciente</h3>
                                <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body" style="display: none;">
                                <table class="table table-striped w-100">
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Atenciones</th>
                                            <th>Estado</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $query = "SELECT * from planes_atencion where idCliente = '{$idClientePlan}' order by id desc";
                                        $result = mysqli_query($conn3, $query);
                                        $rowPlanes = [];
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $rowPlanes[] = $row;
                                        }
                                        ?>
                                        <?php foreach ($rowPlanes as $key => $value) : ?>
                                            <tr>
                                                <td><?=$value['fechaRegistro']?></td>
                                                <td><?=str_replace('|/|', ', ', $value['atenciones'])?></td>
                                                <td><?=($value['abierto'] == 1 ? 'Abierto' : 'Cerrado')?></td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="./verPlanAtencion?iA=<?= base64_encode($value['id']) ?>" target="_blank">
                                                        <i class="fas fa-eye"></i>
                                                        Ver
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill" data-dismiss="modal">
                    <i class="fas fa-times"></i>
                    Cerrar
                </button>
            </div>
        </div>
    </div>
</div>



<script>
    function nuevaAtencion() {
        $('#cajaAtenciones').append(`
        <div class="input-group mt-2 mb-2">
            <input type="text" class="form-control" placeholder="Ej: Triaje / Examen Físico / Consulta General / etc" name="datos[atenciones][]">
            <div class="input-group-append" onclick="this.parentElement.remove()">
                <span class="input-group-text"><i class="fas fa-close text-danger"></i></span>
            </div>
        </div>
        `);
    }
</script>