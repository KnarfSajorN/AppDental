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

if ($rowOrden['estado'] == 0) {
    $rowOrden['estado_'] = '<p class="text-info">PENDIENTE</p>';
} else if ($rowOrden['estado'] == 1) {
    $rowOrden['estado_'] = '<p class="text-info">APROBADO</p>';
} else if ($rowOrden['estado'] == 2) {
    $rowOrden['estado_'] = '<p class="text-success">PROCESADA</p>';
} else if ($rowOrden['estado'] == 3) {
    $rowOrden['estado_'] = '<p class="text-danger">RECHAZADA</p>';
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
                                <h4>Orden de Compra <?= ($rowOrden != null ? '#' . $rowOrden['id'] : '') ?> | Historial de cambios </h4>
                            </div>
                            <div class="card-body row">
                                <div class="form-group col-md-12 row bg-light rounded">
                                    <div class="col-md-12">
                                        <h2>Información actual de la orden:</h2>
                                    </div>
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
                                    <div class="col-md-6">
                                        <label for="">Estado actual:</label>
                                        <?= $rowOrden['estado_'] ?>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="">Notas:</label>
                                        <p><?= $rowOrden['notas'] ?></p>
                                    </div>
                                </div>
                                <div class="form-group col-md-12">
                                    <div class="col-md-12">
                                        <h2>Historial de cambios:</h2>
                                    </div>
                                    <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                        <?php
                                        $columnasTabla = [
                                            'Fecha de cambio',
                                            'Total grabado',
                                            'Cantidad de registros',
                                            'Notas',
                                            'Usuario',
                                            'Fecha de registro',
                                            'Estado',
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
    titulo_tabla = 'Orden de compra';
    query_tabla_ajax = "<?= "SELECT *, estado as activo from ordenesCompraHeaderAuditor where idOrden = " . $idOrden . " "?>";
    columnas = ['id', 'fechaRegistro', 'total', 'cantidadRegistros', 'notas', 'usuario_id', 'fecha', 'estado', 'idOrden', 'activo'];
    columnastablas = [
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.fechaRegistro}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.total}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.cantidadRegistros}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.notas}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="us${row.id}"></span>`;
                funcionMaster(row.usuario_id, 'ID', 'nombre_usuario', 'usuarios', '.us' + row.id);
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `${row.fecha}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                if (row.activo == 0) {
                    row.activo_ = '<p class="text-info">PENDIENTE</p>';
                } else if (row.activo == 1) {
                    row.activo_ = '<p class="text-info">APROBADO</p>';
                } else if (row.activo == 2) {
                    row.activo_ = '<p class="text-success">PROCESADA</p>';
                } else if (row.activo == 3) {
                    row.activo_ = '<p class="text-danger">RECHAZADA</p>';
                }
                data += `${row.activo_}`;
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