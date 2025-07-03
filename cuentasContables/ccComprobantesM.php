<?php
include '../header.php';
include '../menu.php';
?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
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
                                    <h4>Comprobantes</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped w-100" id="Tabla_Rapida_AJAX">
                                    <?php 
                                    $columnas = [
                                        'Id',
                                        'Número',
                                        'Fecha',
                                        'Descripción',
                                        'Movimientos',
                                        '',
                                    ];
                                    ?>
                                    <thead>
                                        <tr>
                                            <?php foreach($columnas as $columna): ?>
                                                <th><?= $columna ?></th>
                                            <?php endforeach; ?>
                                        </tr>
                                    </thead>
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
    var titulo_tabla = 'Bancos';
    query_tabla_ajax = '<?= "SELECT * from CCompDiario" ?>';
    columnas = ['id', 'numero', 'fecha', 'tipo', 'estado', 'descripcion', 'monto_debe', 'monto_haber', 'cant_movimientos', 'detallada', 'idCuentaContable', 'idCentroCosto', 'tipo_comprobante', 'usuario_id', 'tercero_id', 'tipo_tercero', 'Hora'];
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
                botones += `${row.numero}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
                botones = ``;
                botones += `${row.fecha}`;
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
                botones += `${row.cant_movimientos}`;
                return botones;
            }
        },
        {
            "data": function(row, type, set) {
            botones = ``;
            botones += `<a href="./ccImprimirComprobante?Comprobante_id=${row.id}" target="_blank" class="btn btn-outline-success rounded-pill btn-block">
            <i class="fa fa-print"></i>
            Ver / Imprimir
            </a>`;
            botones += `<a href="./ccComprobantesEditarC?comprobante_id=${row.id}" class="btn btn-outline-primary rounded-pill btn-block">
            <i class="fa fa-edit"></i>
            editar
            </a>`;
            botones += `<a href="./ccComprobantesEditarT?comprobante_id=${row.id}" class="btn btn-outline-primary rounded-pill btn-block">
            <i class="fa fa-edit"></i>
            Editar tercero /<br> Descripción General
            </a>`;            
                return botones;
            }
        },
    ];
</script>