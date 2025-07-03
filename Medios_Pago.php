<?php
include 'header.php';
include 'menu.php';
$ID = $_SESSION['ID'];
$IDP = $_SESSION['ID_principal'];
$tabla = "Medios_Pago";
$page = 'Medios_Pago';

// cargar datos
if ($_GET['FAID']) {
    $FAID = base64_decode($_GET['FAID']);
    $queryConfig = "SELECT * from $tabla where id = $FAID limit 1";
    $resultConfig = mysqli_query($conn3, $queryConfig);
    $rowConfig = mysqli_fetch_array($resultConfig);
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
                                    <h4><?= ($rowConfig != null ? 'Editar Metodo de Pago #' . $rowConfig['id'] : 'Registrar Metodo de Pago ') ?> </h4>
                                </div>
                            </div>
                            <form id="correoForm">
                                <div class="card-body row">
                                    <div class="form-group col-md-12">
                                        <label for="">Nombre </label>
                                        <input type="text" class="form-control" id="" name="datos[Nombre]" value="<?= $rowConfig['Nombre'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Agregar QR de Pago</label>
                                        <input type="file" class="form-control" id="" name="archivos[imagenQr|metodosdepagos/]">
                                        <?php if ($rowConfig != null && $rowConfig['imagenQr'] != '') { ?>
                                            <img src="<?= $Base ?>uploads/<?= $IDP?>/metodosdepagos/<?= $rowConfig['imagenQr'] ?>" alt="" style="width:5cm; height:auto;">
                                        <?php } ?>
                                        </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[Activo]" value="1">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[ID_principal]" value="<?= $IDP ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#correoForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'<?= $tabla ?>',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>' , reload: '', page: '<?= $page ?>?FAID='});">
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
                                    <h4>Lista de metodos de Pago</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                    <?php
                                    $columnasTabla = [
                                        'Nombre',
                                        'imagenQr',
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
<?php include 'footer.php'; ?>

<script>
    titulo_tabla = 'Metodos de Pago';
    query_tabla_ajax = `<?= "SELECT * from $tabla where ID_principal = $IDP" ?>`;
    columnas = ['id', 'usuario_id', 'Nombre', 'Creacion_Dinamica' , 'Activo' , 'idCuentaContable', 'ID_principal', 'imagenQr'];
    columnastablas = [{
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.Nombre}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<img src="<?= $Base ?>uploads/<?= $IDP?>/metodosdepagos/${row.imagenQr}" alt="" style="width:auto; height:2cm;">`;
                return data;
            }
        },       
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<a href="./<?= $page ?>?FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Editar">
                    <i class="fa fa-edit"></i>
                    Editar
                    </a>`;
                data += `<button onclick="automaticUpdate(${(row.Activo == 1 ? 0 : 1)},'activo','<?= $tabla ?>','${row.id}','<?= $page ?>');" class="btn btn-outline-${(row.Activo == 1 ? 'danger' : 'success')} rounded-pill btn-block">
                    <i class="fa ${(row.Activo == 1 ? 'fa-times' : 'fa-check')}"></i>
                    ${(row.Activo == 1 ? 'Desactivar' : 'Activar')}
                </button>`;
                return data;
            }
        },
    ];
</script>

