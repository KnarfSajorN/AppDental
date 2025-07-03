<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

// cargar datos de la orden
if ($_GET['FAID']) {
    $idOrden = base64_decode($_GET['FAID']);
    $queryOrden = "SELECT * from ordenesCompraHeader where id = $idOrden limit 1";
    $resultOrden = mysqli_query($conn3, $queryOrden);
    $rowOrden = mysqli_fetch_array($resultOrden);
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
                                <h4>Orden de Compra <?= ($rowOrden != null ? '#' . $rowOrden['id'] : '') ?> </h4>
                            </div>
                            <div class="card-body row">
                                <div class="form-group col-md-12 row bg-light rounded">
                                    <div class="col-md-6">
                                        <label for="">Fecha de Creación:</label>
                                        <p><?= $rowOrden['fecha'] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Usuario:</label>
                                        <p><?= funcionMaster($rowOrden['usuario_id'],'ID','concat(USUARIO," | ",NOMBRE_USUARIO)', 'usuarios') ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Cantidad de registros:</label>
                                        <p><?= $rowOrden['cantidadRegistros'] ?></p>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Subtotal grabado:</label>
                                        <p><?= number_format($rowOrden['total']) ?></p>
                                    </div>              
                                </div>

                                <div class="form-group col-md-12">
                                    <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                        <?php
                                        $columnasTabla = [
                                            'Deposito',
                                            'Proveedor',
                                            'Inventario',
                                            'Costo',
                                            'Cantidad',
                                            'Subtotal',
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
                                <div class="form-group col-md-6">
                                    <label for="">Total</label>
                                    <input type="text" class="form-control" value="<?= number_format(funcionMaster('1', '1 and estado = 1 and nOrden = ' . $idOrden . ' ', 'sum(costo*cantidad)', 'ordenesCompraPendiente')) ?>" readonly>
                                    <input type="hidden" name="datos[total]" value="<?= funcionMaster('1', '1 and estado = 1 and nOrden = ' . $idOrden . ' ', 'sum(costo*cantidad)', 'ordenesCompraPendiente') ?>">
                                    <input type="hidden" name="datos[cantidadRegistros]" value="<?= funcionMaster('1', '1 and estado = 1 and nOrden = ' . $idOrden . ' ', 'count(id)', 'ordenesCompraPendiente') ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="">Observaciones o notas</label>
                                    <textarea class="form-control" readonly name="datos[notas]" id="notas" cols="30" rows="5"><?= $rowOrden['notas'] ?></textarea>
                                </div>
                            </div>
                            <div class="card-footer">
                                <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                <input type="hidden" name="datos[estado]" value="0">
                                <button type="submit" class="btn btn-outline-danger rounded-pill" onclick="$('#ordenCompraForm').automaticForm({type:<?= $rowOrden != null ? 2 : 1 ?>, table:'ordenesCompraHeader',idUpdate:'<?= $rowOrden != null ? $rowOrden['id'] : 0 ?>',reload:'',page:'./ordenesCompra/procesarOrdenPendiente.php<?= ($rowOrden != null ? '?FAID=' . base64_encode($idOrden) . '&sK=1' : '') ?>'});">
                                    <i class="fas fa-share mr-1"></i>
                                    Enviar Orden de compra a Revision !
                                </button>
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
    titulo_tabla = 'Orden de compra';
    query_tabla_ajax = "<?= "SELECT * from ordenesCompraPendiente where usuario_id = " . $_SESSION['ID'] . " and estado = 1 and nOrden = " . $idOrden . " "?>";
    columnas = ['#','id', 'fechaRegistro', 'dep', 'tercero', 'codigoProd', 'costo', 'cantidad', 'usuario_id', 'fecha', 'estado', 'nOrden'];
    var cont = "0"
    columnastablas = [
        {
            "data": function(row, type, val, meta) {
                data1 = ``;
                if(meta.row==0){
                cont++;
                }
                data1 = cont;
                console.log(meta);
                console.log(cont);
                return data1;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="dep${row.id}"></span>`;
                funcionMaster(row.dep, 'id', 'descripcion', 'dep', '.dep' + row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="provee${row.id}"></span>`;
                funcionMaster(row.tercero, 'id', 'concat(rut," | ",nombre)', 'sproveedores', '.provee' + row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="prod${row.id}"></span>`;
                funcionMaster(row.codigoProd, 'ID', 'descripcion', 'sinvetrios', '.prod' + row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="">${Number(row.costo).toLocaleString()}</span>`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="">${Number(row.cantidad).toLocaleString()}</span>`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                subtotal = row.cantidad * row.costo;
                data += `<span class="">${Number(subtotal).toLocaleString()}</span>`;
                return data;
            }
        },
    ];
</script>

<script>
    function cargarCosto(idSinvetrios) {
        funcionMaster(idSinvetrios, 'ID', 'costo', 'sinvetrios', '#costo');
    };
</script>