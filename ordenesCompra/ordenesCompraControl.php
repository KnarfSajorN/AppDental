<?php

// verificar tablas creadas
include '../header.php';
include '../menu.php';
$ID = $_SESSION['ID'];

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
                                    <h4>Control de Ordenes de Compra</h4>
                                </div>
                            </div>
                            <div class="card-body row">
                                <div class="form-group col-md-12">
                                    <table class="table table-striped" id="Tabla_Rapida_AJAX">
                                        <?php
                                        $columnasTabla = [
                                            'No.',
                                            'Fecha',
                                            'Usuario',
                                            'Cantidad Productos',
                                            'Total',
                                            'Estado',
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
    titulo_tabla = 'Ordenes de compra';
    query_tabla_ajax = "<?= "SELECT *, estado as activo from ordenesCompraHeader" ?>";
    columnas = ['id', 'fechaRegistro', 'total', 'cantidadRegistros', 'notas', 'usuario_id', 'fecha', 'activo'];
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
                data += `${row.fechaRegistro}`;
                return data;
            }
        },
        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<span class="user${row.id}"></span>`;
                funcionMaster(row.usuario_id, 'ID', 'concat(USUARIO,"|",NOMBRE_USUARIO)', 'usuarios', '.user' + row.id);
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
                data += `${Number(row.total).toLocaleString()}`;
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

        {
            "data": function(row, type, val, meta) {
                data = ``;
                data += `<a href="./ordenesCompraVer?FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Ver Orden">
                    <i class="fa fa-eye"></i>
                    Ver Orden
                </a>`;
                data += `<a href="./ordenesCompraVerHistorial?FAID=${btoa(row.id)}" class="btn btn-outline-secondary rounded-pill btn-block" title="Ver Orden">
                    <i class="fa fa-history"></i>
                    Ver historial
                </a>`;

                // si esta pendiente, se puede modificar
                if (row.activo == 0) {
                    data += `<a href="./ordenesCompraIngreso?FAID=${btoa(row.id)}" class="btn btn-outline-info rounded-pill btn-block" title="Ver Orden">
                    <i class="fa fa-edit"></i>
                    Editar orden
                    </a>`;
                }                

                return data;
            }
        },
    ];
</script>