<?php
include '../header.php';
include '../menu.php';


if ($_GET['i']) {
    // editar la vaina
    $idBanco = base64_decode($_GET['i']);
    $queryBanco = "SELECT * from Sbancos where id='$idBanco' limit 1";
    $resultBancos = mysqli_query($conn3, $queryBanco);
    $rowBanco = mysqli_fetch_array($resultBancos);
}

?>
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4><?= ($rowBanco != null ? 'Actualizar' : 'Registrar') ?> Banco</h4>
                                </div>
                            </div>
                            <form action="<?= ($rowBanco == null ? './bancos/registroSbancos.php' : './bancos/actualizarSbancos.php')?>" method="POST">
                                <div class="card-body row">
                                    <div class="col-md-6 mt-3">
                                        <label>Numero de Cuenta <strong class="text-danger">*</strong></label><br>
                                        <input type="text" required placeholder="Numero" name="nCuenta" class="form-control input-lg" value="<?= $rowBanco['nCuenta'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Descripción <strong class="text-danger">*</strong></label><br>
                                        <input type="text" required placeholder="Descripción" name="descripcion" class="form-control input-lg" oninput="VerificarCaracteres(this)" value="<?= $rowBanco['descripcion'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Tipo de Cuenta <strong class="text-danger">*</strong></label><br>
                                        <select class="form-control input-lg" required placeholder="Tipo" name="tipo">
                                            <option disabled>Seleccione un tipo</option>
                                            <option value="Ahorros" <?= ($rowBanco['tipo'] == 'Ahorros' ? 'selected' : '') ?>>Ahorros</option>
                                            <option value="Corriente" <?= ($rowBanco['tipo'] == 'Corriente' ? 'selected' : '') ?>>Corriente</option>
                                            <option value="Otro" <?= ($rowBanco['tipo'] == 'Otro' ? 'selected' : '') ?>>Otro</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Descripción Detallada <strong class="text-danger">*</strong></label><br>
                                        <textarea class="form-control input-lg" required placeholder="Descripcion" name="descripcionDetalle" rows="3">
                                            <?= $rowBanco['descripcionDetalle'] ?>
                                        </textarea>
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Sucursal <strong class="text-danger">*</strong></label><br>
                                        <input type="text" required placeholder="Sucursal" name="sucursal" class="form-control input-lg" value="<?= $rowBanco['sucursal'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Persona Contacto <strong class="text-danger">*</strong></label><br>
                                        <input type="text" required placeholder="Persona" name="contacto" class="form-control input-lg" value="<?= $rowBanco['contacto'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Dirección <strong class="text-danger">*</strong></label><br>
                                        <input type="text" required placeholder="Direccion" name="direccion" class="form-control input-lg" value="<?= $rowBanco['direccion'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Moneda <strong class="text-danger">*</strong></label><br>
                                        <input type="text" required placeholder="Moneda" name="moneda" class="form-control input-lg" value="<?= $rowBanco['moneda'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Teléfono</label><br>
                                        <input type="text" placeholder="Telefono" name="telefono" class="form-control input-lg" value="<?= $rowBanco['telefono'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Fax</label><br>
                                        <input type="text" placeholder="Fax" name="fax" class="form-control input-lg" value="<?= $rowBanco['fax'] ?>">
                                    </div>
                                    <div class="col-md-6 mt-3">
                                        <label>Correo / Email</label><br>
                                        <input type="text" placeholder="Correo" name="email" class="form-control input-lg" value="<?= $rowBanco['email'] ?>">
                                    </div>
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                    <?php if ($rowBanco != null) : ?>
                                        <input type="hidden" name="idBanco" value="<?= $rowBanco['id'] ?>">
                                    <?php endif ?>
                                    <?php if ($rowBanco == null) : ?>
                                        <div class="col-md-6">
                                            <label>Saldo Inicial</label><br>
                                            <input type="text" oninput="<?php echo $soloNumero ?>" name="saldoIncial" class="form-control input-lg" required>
                                        </div>
                                        <div class="col-md-6">
                                            <label>Fecha ultima Conciliación</label><br>
                                            <input type="date" name="fechaUC" class="form-control input-lg" required>
                                        </div>
                                        <div class="col-md-12 mt-3">
                                            <hr>
                                            <div class="form-group">
                                                <label for="cuenta">Cuenta Contable *Banco*</label>
                                                <select class="form-control input-lg select2" name="idCuentaContable" style="width: 100%" required>
                                                    <option value="0" selected>Ninguna</option>
                                                    <?php
                                                    $query = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo= 1");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['descripcion'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <hr>
                                            <div class="form-group">
                                                <label for="cuenta">Cuenta Contable *debe*</label>
                                                <select name="cuenta_debe" id="cuenta_debe" class="form-control input-lg select2" style="width: 100%" required>
                                                    <option value="0" selected>Ninguna</option>
                                                    <?php
                                                    $query = mysqli_query($conn3, "SELECT * FROM CCuentas WHERE activo= 1");
                                                    while ($row = mysqli_fetch_array($query)) {
                                                        echo '<option value="' . $row['id'] . '">' . $row['id'] . " - " . $row['descripcion'] . '</option>';
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                            <hr>
                                            <?php echo verCentroCosto() ?>
                                            <hr>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill">
                                        <i class="fa fa-save"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Lista de bancos</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped w-100" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnas = [
                                        'Id',
                                        'Número cuenta',
                                        'Descripción',
                                        'Tipo cuenta',
                                        'Contacto',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php foreach ($columnas as $columna) : ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <?php foreach ($columnas as $columna) : ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </tfoot>
                                </table>
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
<script>
    function VerificarCaracteres(input) {
        input.value = input.value.replace(/'/g, "");
        input.value = input.value.replace(/"/g, "");
    }
</script>

<script>
    var titulo_tabla = 'Bancos';
    query_tabla_ajax = '<?= "SELECT * from Sbancos" ?>';
    columnas = ['id', 'fechaReg', 'nCuenta', 'descripcion', 'tipo', 'descripcionDetalle', 'sucursal', 'contacto', 'direccion', 'moneda', 'telefono', 'fax', 'email', 'idCuentaContable', 'idCentroCosto', 'idCuentaContableDebe', 'usuario_id'];
    columnastablas = [{
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.id}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.nCuenta}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.descripcion}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.tipo}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.contacto}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `<a href="./bancosRegistro?i=${btoa(row.id)}" class="btn btn-outline-info rounded-pill">
            <i class="fa fa-pencil"></i>
            Editar
            </a>`;
                return botones;
            }
        },
    ];
</script>