<?php
include 'header.php';
include 'menu.php';
$usuario_id = $_SESSION['ID'];
if ($_POST) {
    if (isset($_POST['insert']) && $_POST['insert'] == true) {
        $prepare = preparePost($_POST, ['update', 'insert', 'btn-submit']);
        $queryInsert = mysqli_query($conn3, "INSERT INTO estadosIngreso SET {$prepare}");
        if ($queryInsert) {
            echo '<script>window.location.href="' . htmlentities($_SERVER['PHP_SELF']) . '";</script>';
        } else {
            echo "<script>alert(`Error al insertar el registro`);window.location.href='" . htmlentities($_SERVER['PHP_SELF']) . "';</script>";
        }
    } else if (isset($_POST['update']) && !empty($_POST['update'])) {
        $_POST['nombreCampo'] = ($_POST['campoActivo'] == 0) ? '' : $_POST['nombreCampo'];
        $prepare = preparePost($_POST, ['update', 'insert', 'btn-submit']);
        $id = preparePost(base64_decode($_POST['update']));
        $queryUpdate = mysqli_query($conn3, "UPDATE estadosIngreso SET {$prepare} WHERE id = '{$id}'");
        if ($queryUpdate) {
            echo '<script>window.location.href="' . htmlentities($_SERVER['PHP_SELF']) . '";</script>';
        } else {
            echo "<script>alert(`Error al actualizar el registro`);window.location.href='" . htmlentities($_SERVER['PHP_SELF']) . "';</script>";
        }
    }
    exit();
}
if (isset($_GET['edit']) && is_numeric($_GET['edit'])) {
    $id = preparePost($_GET['edit']);
    $querySelect = mysqli_query($conn3, "SELECT * FROM estadosIngreso WHERE id = '{$id}'") or die(mysqli_error($conn3));
    $row = mysqli_num_rows($querySelect);
    if ($row > 0) {
        $querySelect = $querySelect->fetch_assoc();
    } else {
        echo "<script>alert(`Error al Solicitar el Estado`);window.location.href='" . htmlentities($_SERVER['PHP_SELF']) . "';</script>";
    }
} else if (isset($_GET['remove']) && is_numeric($_GET['remove'])) {
    $id = preparePost($_GET['remove']);
    $queryUpdate = mysqli_query($conn3, "UPDATE estadosIngreso SET estado = 0 WHERE id = '{$id}'") or die(mysqli_error($conn3));
    if ($queryUpdate) {
        echo '<script>window.location.href="' . htmlentities($_SERVER['PHP_SELF']) . '";</script>';
    } else {
        echo "<script>alert(`Error al Remover el el registro`);window.location.href='" . htmlentities($_SERVER['PHP_SELF']) . "';</script>";
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> Registro Estados de Ingreso </a></li>
        </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="content">
                <h4 class="Titulo_Pagina">Registro Estados de Ingreso</h4>
                <div class="box">
                    <div class="box-body">
                        <form action="<?= htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="nombreEstado">Nombre del Estado</label>
                                        <input type="text" name="nombreEstado" id="nombreEstado"
                                            class="form-control input-lg" value="<?= $querySelect['nombreEstado'] ?>"
                                            required>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="campoActivo">¿ Campo Adicional ?</label>
                                        <select name="campoActivo" id="campoActivo" onchange="mostrarCampo(this.value)"
                                            class="form-control input-lg select2" required>
                                            <option value="0"
                                                <?= $querySelect['campoActivo'] == 0 ? 'selected' : ($querySelect['campoActivo'] == 1 ? '' : 'selected') ?>>
                                                NO</option>
                                            <option value="1" <?= $querySelect['campoActivo'] == 1 ? 'selected' : '' ?>>
                                                SI</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="color">Color</label>
                                        <input type="color" name="color" id="color" class="form-control input-lg"
                                            value="<?= $querySelect['color'] ?>" required>
                                    </div>
                                </div>
                                <div class="row" id="toggleNameCampo" style="display: none;">
                                    <div class="form-group col-md-12">
                                        <label for="nombreCampo">Nombre del Campo</label>
                                        <input type="text" name="nombreCampo" id="nombreCampo"
                                            class="form-control input-lg" value="<?= $querySelect['nombreCampo'] ?>">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="usuario_id" value="<?= $_SESSION['ID']; ?>">
                            <?php if (isset($_GET['edit'])) : ?>
                            <input type="hidden" name="update" value="<?= base64_encode($querySelect['id']) ?>">
                            <?php else : ?>
                            <input type="hidden" name="insert" value="true">
                            <?php endif; ?>
                            <div class="col-sm-12">
                                <center>
                                    <button type="submit" class="btn btn-block btn-outline-info rounded-pill"
                                        name="btn-submit">
                                        <h2> <strong>
                                                <?= (isset($_GET['edit']) && is_numeric($_GET['edit'])) ? ' A c t u a l i z a r ' : ' G u a r d a r ' ?></strong>
                                        </h2>
                                    </button>
                                </center>
                            </div>
                        </form>

                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="col-md-12">
                                        <h2 style="text-align: center;font-weight: bold;"> Estados de Ingreso </h2>
                                        <table id="estadosIngreso" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Nombre del Médico</th>
                                                    <th scope="col">Estado Ingreso</th>
                                                    <th scope="col">Campo Adicional</th>
                                                    <th scope="col">OP</th>
                                                </tr>
                                            </thead>
                                            <tbody></tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
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
include 'dataTablePaginacion.php';
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
?>
<script type="text/javascript">
window.addEventListener('load', () => {
    let tablaOne = tablaDinamica({
        input: "#estadosIngreso", // id del input
        selectFrom: "<?= Encriptar("u.NOMBRE_USUARIO, ei.*") ?>", // SELECT la colausa entre estos dos  FROM
        name: "<?= Encriptar("estadosIngreso AS ei INNER JOIN usuarios AS u ON ei.usuario_id = u.ID") ?>", // Nombre de la tabla o en su defecto si se realiza joins y de mas
        camposValue: "<?= Encriptar(json_encode(['ei.id', 'u.NOMBRE_USUARIO', 'ei.nombreEstado', 'ei.nombreCampo'])) ?>", // Campos que se mostraran en la tabla ATENCION: en caso de usar inner si presentan porblemas al usar el filtrado por columnas, deberan reflejar cada columna con su sufijo, Ejemplo: c.cliente O en caso de no usar mascara ser directos cliente.cliente_id
        clausula: {
            data: "<?= Encriptar("estado = 1 and ei.usuario_id = $usuario_id") ?>", // Clausula de la consulta
            value: [''], // Valores de la clausula
        },
        likeWhere: "<?= Encriptar('ei.id || u.NOMBRE_USUARIO || ei.nombreEstado || ei.nombreCampo') ?>", // campos que se usaran en el buscador (CAMPO LIKE %CAMPO%)
        order: "<?= Encriptar(json_encode(['order by' => '$0'])) ?>", // Orden de la consulta, AQUI SE PUEDE PONER EL ORDER BY, GROUP BY
        btns: btoa(JSON.stringify({ // Botones que se mostraran en la tabla
            btn1: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
                style: "<?= Encriptar("color:$0;") ?>",
                class: "<?= Encriptar("fa fa-circle fa-2x") ?>",
                id: false,
                href: "<?= Encriptar("#") ?>",
                // href: "<?= Encriptar(htmlentities($_SERVER['PHP_SELF']) . "?clienteId=$0") ?>",
                title: "<?= Encriptar("Estado $1") ?>",
                event: false,
                target: false, //blank_
                dataPlacement: false,
                dataToggle: false,
                dataOriginalTitle: false,
                value: "<?= Encriptar("color || nombreEstado") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
            })),
            btn2: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
                style: false,
                class: "<?= Encriptar("fa fa-edit") ?>",
                id: false,
                href: "<?= Encriptar(htmlentities($_SERVER['PHP_SELF']) . "?edit=$0") ?>",
                title: "<?= Encriptar("Editar $1") ?>",
                event: false,
                target: false, //blank_
                dataPlacement: false,
                dataToggle: false,
                dataOriginalTitle: false,
                value: "<?= Encriptar("id || nombreEstado") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
            })),
            btn3: btoa(JSON.stringify({ // Boton 1 PARA CREAR MAS BOTONES ES IMPORTANTE MANTENER LA NUMERACION EJEMPL BTN1, BTN2 ETC
                style: false,
                class: "<?= Encriptar("fa fa-trash text-danger") ?>",
                id: false,
                href: "<?= Encriptar(htmlentities($_SERVER['PHP_SELF']) . "?remove=$0") ?>",
                title: "<?= Encriptar("Remover $1") ?>",
                event: false,
                target: false, //blank_
                dataPlacement: false,
                dataToggle: false,
                dataOriginalTitle: false,
                value: "<?= Encriptar("id || nombreEstado") ?>" // indices del href dividir con || en caso de presentar mas de un indice del boton
            })),
        })),
        carapter: "true", // ACTIVAR O DESACTUVAR UTF8_DECODE
        tbody: true, // ACTIVAR O DESACTIVAR LA ANIMACION DE CARGA
    });
});
</script>
<script type="text/javascript">
function mostrarCampo(value) {
    if (value == "1") {
        $("#toggleNameCampo").show();
    } else {
        $("#toggleNameCampo").hide();
    }
}




window.addEventListener('load', () => {
    <?php if (isset($_GET['edit'])) : ?>
    mostrarCampo(<?= $querySelect['campoActivo'] ?>);
    <?php endif; ?>
});
</script>