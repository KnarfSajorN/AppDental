<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

if ($_POST) {
    $cliente_id         = preparePost($_POST['cliente_id']);
    $usuario_id         = preparePost($_POST['usuario_id']);
    if (isset($_POST['cargarCard'])) {
        $cliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '{$cliente_id}'")->fetch_assoc();
        $estado = mysqli_query($conn3, "SELECT * FROM historialIngreso WHERE cliente_id = '{$cliente_id}' AND estado != 0 ORDER BY id DESC LIMIT 1")->fetch_assoc();
        $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$estado['tipoIngreso']}'")->fetch_assoc();
        list($fecha, $hora) = explode(" ", $estado['created_at']);
?>
        <div class="card" style="position: relative; width: 100%; padding: 10px; flex-flow: column; border: 2px solid <?= empty($origen['color']) ? 'transparent' : $origen['color'] ?>;">
            <?php if (!empty($estado['id'])) : ?>
                <a href="Estado_Historial.php?idCliente=<?= $cliente_id ?>" style="position: absolute; top: 5px; right: 5px; z-index: 1 !important; font-size: 1.3em;" title="Historial" class="text-black"><i class="fa fa-address-book" aria-hidden="true"></i></a>
            <?php endif; ?>
            <div class="row">
                <div class="card-body" style="width: 100%;">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="form-group row">
                                <div class="col-md-2">
                                    <img class="card-img-top img-fluid" align="center" style="width: 100%; height:auto; image-rendering: auto; border-radius: 50%;" src="<?= (empty($cliente['fotoperfil']) ? "./css/Hombre.jfif" : "./pascientes/{$cliente['fotoperfil']}") ?>">
                                </div>
                                <div class="col-md-10">
                                    <h3 class="card-title"><?= $cliente['nombre_cliente'] ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group"></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group">
                                <div class="col-md-12">
                                    <p class="card-text" align="left">Estado:
                                        <?= empty($estado['nombreIngreso']) ? 'Sin estado.' : $estado['nombreIngreso'] ?></p>
                                    <?php if (!empty($estado['descripcion']) || !empty($estado['nombreCampo'])) : ?>
                                        <p class="card-text" align="left">
                                            <?= !empty($estado['nombreCampo']) ? $estado['nombreCampo'] : 'Tipo' ?>:
                                            <?= $estado['descripcion'] ?></p>
                                    <?php endif; ?>
                                    <p class="card-text" align="left">Fecha de Inicio:
                                        <?= empty($fecha) ? 'Sin datos' : $fecha ?></p>
                                    <p class="card-text" align="left">Fecha de Finalización:
                                        <?= empty($estado['fechaFin']) ? (empty($fecha) ? 'Sin datos' : 'En Proceso') : $estado['fechaFin'] ?>
                                    </p>
                                    <?php if (!empty($estado['fechaFin'])) : ?>
                                        <p class="card-text text-danger" align="left">
                                            <?= $estado['estado'] == 2 ? 'Cerrado' : 'En Proceso' ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-secondary" style="margin: 0px;">
                        <div class="card-header">
                            <h4 class="text-center">
                                <?php if ($estado['estado'] == 2 || empty($estado['estado'])) : ?>
                                    <a data-toggle="collapse" href="#collapseIngreso" onclick="funcionDinamica()">Actualizar
                                        Estado</a>
                                <?php else : ?>
                                    <a>Cerrar Estado Para Actualizar</a>
                                <?php endif; ?>
                                <?php if ($estado['estado'] == 1) : ?>
                                    <a href="#estadoRemovido" class="btn btn-sm text-danger" title="Remover Estado" onclick="removerEstado({idEstado: <?= $estado['id'] ?>, usuario_id: <?= $usuario_id ?>, cliente_id: '<?= base64_encode($cliente_id) ?>'})" style="position: absolute; left: 14px; top: 10px;"><i class="fa fa-trash" style="font-size: 1.5em"></i></a>
                                    <a href="#estadoCerrado" class="btn btn-sm text-success" title="Cerrar Estado" onclick="cerrarEstado({idEstado: <?= $estado['id'] ?>, usuario_id: <?= $usuario_id ?>, cliente_id: '<?= base64_encode($cliente_id) ?>'})" style="position: absolute; right: 14px; top: 10px;"><i class="fa fa-check" style="font-size: 1.6em"></i></a>
                                <?php endif; ?>
                            </h4>
                        </div>
                        <div id="collapseIngreso" class="card-collapse collapse">
                            <form action="consultarClienteIngresos.php" method="POST" id="form-ingresos" style="margin: 0px;">
                                <div class="card-body">
                                    <input type="hidden" name="cliente_id" value="<?= base64_encode($cliente_id) ?>">
                                    <input type="hidden" name="usuario_id" value="<?= base64_encode($usuario_id) ?>">
                                    <input type="hidden" name="insert" value="true">
                                    <div class="col-md-12">
                                        <div class="row">

                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="tipoIngreso" align="left">Tipo de Ingreso</label>
                                                    <select class="form-control" id="tipoIngreso" name="tipoIngreso" onchange="verEstado({estadoIngreso: this.value})" style="width: 100%;" required></select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" id="div-campoAdicional"></div>
                                        <!-- <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="fechaInicio">Fecha de Inicio</label>
                                                    <input type="date" name="fechaInicio" id="fechaInicio" class="form-control input-lg" value="<?= Date("Y-m-d") ?>" min="<?= Date("Y-m-d") ?>" required>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="fechaFin">Fecha de Fin</label>
                                                    <input type="date" name="fechaFin" id="fechaFin" class="form-control input-lg" value="<?= Date("Y-m-d") ?>" min="<?= Date("Y-m-d") ?>" required>
                                                </div>
                                            </div>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">Guardar</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    } else if (isset($_POST['cargarEstadoTipo'])) {
        $estadoIngreso = preparePost($_POST['estadoIngreso']);
        $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$estadoIngreso}'")->fetch_assoc();
        if ($origen['campoActivo'] == 1) {
        ?>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="descripcion"><?= $origen['nombreCampo'] ?></label>
                    <input type="text" name="descripcion" id="descripcion" class="form-control input-lg" required>
                </div>
            </div>
<?php
        }
    } else if (isset($_POST['insert'])) {
        $estadoIngreso = preparePost($_POST['tipoIngreso']);
        $origen = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$estadoIngreso}'")->fetch_assoc();
        $_POST['cliente_id'] = base64_decode($_POST['cliente_id']);
        $_POST['usuario_id'] = base64_decode($_POST['usuario_id']);
        $_POST['nombreIngreso'] = $origen['nombreEstado'];
        $_POST['nombreCampo'] = $origen['nombreCampo'];
        $prepare = preparePost($_POST, ['insert']);
        $queryInsert = mysqli_query($conn3, "INSERT INTO historialIngreso SET {$prepare}");
        if ($queryInsert) {
            echo json_encode(['status' => 1, 'cliente_id' => base64_encode($_POST['cliente_id'])]);
        } else {
            echo json_encode(['status' => 0]);
            // echo json_encode(['status' => 0, 'sql' => mysqli_error($conn3)]);
        }
    } else if (isset($_POST['cerrarEstado'])) {
        $idEstado = preparePost($_POST['idEstado']);
        $queryUpdate = mysqli_query($conn3, "UPDATE historialIngreso SET idUsuEstCerrado = '{$usuario_id}', estado = 2, fechaFin = now() WHERE id = '{$idEstado}'");
        if ($queryUpdate) {
            echo json_encode(['status' => 1, 'cliente_id' => $cliente_id]);
        } else {
            echo json_encode(['status' => 0]);
        }
    } else if (isset($_POST['removerEstado'])) {
        $idEstado = preparePost($_POST['idEstado']);
        $queryUpdate = mysqli_query($conn3, "UPDATE historialIngreso SET idUsuEstCerrado = '{$usuario_id}', estado = 0, fechaFin = now() WHERE id = '{$idEstado}'");
        if ($queryUpdate) {
            echo json_encode(['status' => 1, 'cliente_id' => $cliente_id]);
        } else {
            echo json_encode(['status' => 0]);
        }
    }
}
