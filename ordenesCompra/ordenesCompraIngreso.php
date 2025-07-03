<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

// cargar datos de la orden
if ($_GET['FAID']){
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
                                <div class="float-left">
                                    <h4>Generar Orden de Compra</h4>
                                </div>
                            </div>
                            <form id="ordenCompraDetalleForm">
                                <div class="card-body row">
                                    <div class="form-group col-md-6">
                                        <label for="">Deposito o almacén</label>
                                        <select name="datos[dep]" id="dep" class="form-control select2" required>
                                            <?php
                                            $queryDep = "SELECT * from dep where activo = 1";
                                            $resultDep = mysqli_query($conn3, $queryDep);
                                            while ($rowDep = mysqli_fetch_array($resultDep)) {
                                                echo "<option value='" . $rowDep['id'] . "'>" . $rowDep['descripcion'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Proveedor</label>
                                        <select name="datos[tercero]" id="tercero" class="form-control select2" required>
                                            <?php
                                            $queryProvee = "SELECT * from sproveedores where Activo = 1";
                                            $resultProvee = mysqli_query($conn3, $queryProvee);
                                            while ($rowProvee = mysqli_fetch_array($resultProvee)) {
                                                echo "<option value='" . $rowProvee['id'] . "'>" . $rowProvee['rut'] . " | " . $rowProvee['nombre'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="">Inventario</label>
                                        <select name="datos[codigoProd]" id="codigoProd" class="form-control select2" onchange="cargarCosto(this.value);">
                                            <option disabled selected>Seleccione</option>
                                            <?php
                                            $queryInventario = "SELECT si.* from sinvetrios si
                                            join scategoria sca on si.tipo = sca.id
                                            where 1=1
                                            and si.estado = 1
                                            and sca.tipo in (1,2,5)";
                                            $resultInventario = mysqli_query($conn3, $queryInventario);
                                            while ($rowInventario = mysqli_fetch_array($resultInventario)) {
                                                echo "<option value='" . $rowInventario['ID'] . "'>" . $rowInventario['referencia'] . " | " . $rowInventario['descripcion'] . "</option>";
                                            }
                                            ?>
                                        </select>
                                        <div class="bg-light my-3 p-3 rounded" id="datosInventario"></div>
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Costo</label>
                                        <input type="number" name="datos[costo]" id="costo" class="form-control" step="0.01" value="0" min="0">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label for="">Cantidad</label>
                                        <input type="number" name="datos[cantidad]" id="cantidad" class="form-control" step="0.01" value="1" min="1">
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <input type="hidden" name="datos[estado]" value="<?= ($rowOrden != null ? 1 : 0) ?>">
                                    <input type="hidden" name="datos[nOrden]" value="<?= ($rowOrden != null ? $idOrden : 0) ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#ordenCompraDetalleForm').automaticForm({type:1, table:'ordenesCompraPendiente',idUpdate:'0',reload:'',page:'ordenesCompraIngreso<?=($rowOrden != null ? '?FAID='.base64_encode($idOrden) : '')?>'});">
                                        <i class="fa fa-save mr-1"></i>
                                        agregar
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
                                    <h4>Orden Actual <?=($rowOrden != null ? ' / #'. $rowOrden['id']. ' / '.$rowOrden['fecha'] : '')?> </h4>
                                </div>
                            </div>
                            <form id="ordenCompraForm">
                                <div class="card-body row">
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
                                    <div class="form-group col-md-6">
                                        <label for="">Total</label>
                                        <?php if ($rowOrden != null) : ?>
                                            <input type="text" class="form-control" value="<?= number_format(funcionMaster('1','1 and estado = 1 and nOrden = '.$idOrden.' ','sum(costo*cantidad)','ordenesCompraPendiente')) ?>" readonly>
                                            <input type="hidden" name="datos[total]" value="<?= funcionMaster('1','1 and estado = 1 and nOrden = '.$idOrden.' ','sum(costo*cantidad)','ordenesCompraPendiente') ?>">
                                            <input type="hidden" name="datos[cantidadRegistros]" value="<?= funcionMaster('1','1 and estado = 1 and nOrden = '.$idOrden.' ','count(id)','ordenesCompraPendiente') ?>">
                                        <?php else: ?>
                                            <input type="text" class="form-control" value="<?= number_format(funcionMaster('1','1 and estado = 0 and usuario_id = "'.$_SESSION['ID'].'" and nOrden = 0 ','sum(costo*cantidad)','ordenesCompraPendiente')) ?>" readonly>
                                            <input type="hidden" name="datos[total]" value="<?= funcionMaster('1','1 and estado = 0 and usuario_id = "'.$_SESSION['ID'].'" and nOrden = 0 ','sum(costo*cantidad)','ordenesCompraPendiente') ?>">
                                            <input type="hidden" name="datos[cantidadRegistros]" value="<?= funcionMaster('1','1 and estado = 0 and usuario_id = "'.$_SESSION['ID'].'" and nOrden = 0 ','count(id)','ordenesCompraPendiente') ?>">
                                        <?php endif ?>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label for="">Observaciones o notas</label>
                                        <textarea class="form-control" name="datos[notas]" id="notas" cols="30" rows="5"><?=$rowOrden['notas']?></textarea>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <input type="hidden" name="datos[estado]" value="0">
                                    <button type="submit" class="btn btn-outline-danger rounded-pill" onclick="$('#ordenCompraForm').automaticForm({type:<?=$rowOrden != null ? 2 : 1 ?>, table:'ordenesCompraHeader',idUpdate:'<?=$rowOrden != null ? $rowOrden['id'] : 0 ?>',reload:'',page:'./ordenesCompra/procesarOrdenPendiente.php<?=($rowOrden != null ? '?FAID='.base64_encode($idOrden).'&sK=1' : '')?>'});">
                                        <i class="fas fa-share mr-1"></i>
                                        Enviar Orden de compra a Revision !
                                    </button>
                                </div>
                            </form>
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
    query_tabla_ajax = "<?= ($rowOrden != null ? "SELECT * from ordenesCompraPendiente where usuario_id = " . $_SESSION['ID'] . " and estado = 1 and nOrden = ".$idOrden." " : "SELECT * from ordenesCompraPendiente where usuario_id = " . $_SESSION['ID'] . " and estado = 0 and nOrden = 0 " )  ?>";
    columnas = ['id', 'fechaRegistro', 'dep', 'tercero', 'codigoProd', 'costo', 'cantidad', 'usuario_id', 'fecha', 'estado', 'nOrden'];
    columnastablas = [{
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="dep${row.id}"></span>`;
                funcionMaster(row.dep,'id','descripcion','dep','.dep'+row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="provee${row.id}"></span>`;
                funcionMaster(row.tercero,'id','concat(rut,"|",nombre)','sproveedores','.provee'+row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="prod${row.id}"></span>`;
                funcionMaster(row.codigoProd,'ID','descripcion','sinvetrios','.prod'+row.id);
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
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<button type="button" class="btn btn-outline-danger rounded-pill" onclick="automaticUpdate(99,'estado','ordenesCompraPendiente','${row.id}','ordenesCompraIngreso${(row.nOrden != 0 ? "?FAID="+btoa(row.nOrden) : "")}')">
                    <i class="fa fa-close"></i>
                </button>`;
                return data;
            }
        },
    ];
</script>

<script>
    function cargarCosto(idSinvetrios) {
        console.log(idSinvetrios);
        funcionMaster(idSinvetrios, 'ID', 'costo', 'sinvetrios', '#costo');
        $('#datosInventario').empty();
        // aja vamos a cargar los datos de:
        // - cantidad sugerida
        // - mínimos / máximos
        // - cantidad actual
        
        let nS = document.createElement('div');
        nS.setAttribute('id', 'nS');
        funcionMaster(idSinvetrios, 'ID', 'concat("Inventario: ",descripcion)', 'sinvetrios', '#nS');

        let nS2 = document.createElement('div');
        nS2.setAttribute('id', 'nS2');
        funcionMaster(idSinvetrios, 'ID', 'concat("Mínimo: ",minimo)', 'sinvetrios', '#nS2');

        let nS3 = document.createElement('div');
        nS3.setAttribute('id', 'nS3');
        funcionMaster(idSinvetrios, 'ID', 'concat("Máximo: ",maximo)', 'sinvetrios', '#nS3');

        let nS4 = document.createElement('div');
        nS4.setAttribute('id', 'nS4');
        funcionMaster(idSinvetrios, 'idSinvetrios', 'concat("Existencia: ",sum(existencia))', 'SinvDep', '#nS4');

        let nS5 = document.createElement('div');
        nS5.setAttribute('id', 'nS5');
        funcionMaster(idSinvetrios, 'idSinvetrios', 'concat("Sugerencia de Compra (en base a las existencias globales): ", if ((select maximo from sinvetrios where id = '+idSinvetrios+') - sum(existencia) < 0, 0, (select maximo from sinvetrios where id = '+idSinvetrios+') - sum(existencia)))', 'SinvDep', '#nS5');

        document.getElementById('datosInventario').appendChild(nS);
        document.getElementById('datosInventario').appendChild(nS2);
        document.getElementById('datosInventario').appendChild(nS3);
        document.getElementById('datosInventario').appendChild(nS4);
        document.getElementById('datosInventario').appendChild(nS5);
    };
</script>