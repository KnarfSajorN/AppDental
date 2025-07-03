<?php
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];
$tabla = "nominaEmpresasProfesiones";
$page = 'nominaEmpresasProfesiones';
// cargar datos
if ($_GET['FAID']) {
    $FAID = base64_decode($_GET['FAID']);
    $queryConfig = "SELECT * from $tabla where id = $FAID limit 1";
    $resultConfig = mysqli_query($conn3, $queryConfig);
    $rowConfig = mysqli_fetch_array($resultConfig);
}
if ($_GET['e']) {
    $idEmpresa = base64_decode($_GET['e']);
    $queryEmpresa = "SELECT * from nominaEmpresas where id = $idEmpresa limit 1";
    $resultEmpresa = mysqli_query($conn3, $queryEmpresa);
    $rowEmpresa = mysqli_fetch_array($resultEmpresa);
}
if (!$_GET['e']) {
    echo "<script>location.href = './nominaSeleccionarEmpresa?p=" . base64_encode($page)."&n=" . base64_encode('Profesiones') . "'</script>";
}
if ($idEmpresa == 0){
    $rowEmpresa['nombre'] = "Todas [Global]";
}
?>

<div class="content-wrapper p-3">
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4><?= ($rowConfig != null ? 'Editar profesión #' . $rowConfig['id'] : 'Registrar nuevo profesión') ?> en <strong><?=$rowEmpresa['nombre']?></strong> </h4>
                                </div>
                                <div class="float-right">
                                    <button onclick="location.href='./nominaEmpresas'" class="btn btn-light rounded-pill">
                                        <i class="fa fa-arrow-left mr-1"></i>
                                        Volver a listado de empresas
                                    </button>
                                </div>
                            </div>
                            <form id="correoForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Código</label>
                                        <input type="text" class="form-control" id="" name="datos[codigo]" value="<?= $rowConfig['codigo'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripción</label>
                                        <input type="text" class="form-control" id="" name="datos[descripcion]" value="<?= $rowConfig['descripcion'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Descripción detallada</label>
                                        <textarea name="datos[descripcionDetallada]" class="form-control" id="" cols="30" rows="5"><?= $rowConfig['descripcionDetallada'] ?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[idEmpresa]" value="<?= $idEmpresa ?>">
                                    <input type="hidden" name="datos[activo]" value="1">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#correoForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'<?= $page ?>?e=<?= base64_encode($idEmpresa) ?>&FAID='});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Listado de profesiones en <strong><?=$rowEmpresa['nombre']?></strong></h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnasTabla = [
                                        'No.',
                                        'Código',
                                        'Descripción',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php for ($i = 0; $i < count($columnasTabla); $i++) : ?>
                                                <th><?= $columnasTabla[$i] ?></th>
                                            <?php endfor ?>
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
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
<script>
    titulo_tabla = 'Profesiones';
    query_tabla_ajax = "<?= "SELECT * from $tabla where idEmpresa = $idEmpresa" ?>";
    columnas = ['id', 'fechaRegistro', 'activo', 'codigo', 'descripcion', 'descripcionDetallada'];
    columnastablas = [{
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.id}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.codigo}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.descripcion}`;
                return data;
            }
        },        
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<a href="./<?= $page ?>?e=<?=base64_encode($idEmpresa)?>&FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Editar">
                    <i class="fa fa-edit"></i>
                    Editar
                    </a>`;
                data += `<button onclick="automaticUpdate(${(row.activo == 1 ? 0 : 1)},'activo','<?= $tabla ?>','${row.id}','<?= $page ?>?e=<?=base64_encode($idEmpresa)?>');" class="btn btn-outline-${(row.activo == 1 ? 'danger' : 'success')} rounded-pill btn-block">
                    <i class="fa ${(row.activo == 1 ? 'fa-times' : 'fa-check')}"></i>
                    ${(row.activo == 1 ? 'Desactivar' : 'Activar')}
                </button>`;
                return data;
            }
        },
    ];
</script>