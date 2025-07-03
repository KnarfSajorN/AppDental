<?php
include 'header.php';
include 'menu.php'; ?>

<style>
    .Titulo_Pagina {
        width: fit-content;
        background-color: #3c8dbc75;
        padding: 20px;
        border-radius: 20px 20px 0px 0px;
        display: table-cell;
    }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Auditor Mensajes WhatsApp Medical</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Auditor Mensajes WhatsApp Medical <i class="fa-solid fa-user-secret"></i> </h4>

                <div class="box">
                    <div class="box-header">

                        <div class="col-xs-12">
                            Reporte Auditor
                            <form action="ADW_ReporteAuditor.php" method="POST" class="row">
                                <div class="col-xs-12 col-md-3">
                                    Desde
                                    <input type="date" class="form-control input-lg" name="desde" required>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    Hasta
                                    <input type="date" class="form-control input-lg" name="hasta" required>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    Numero Cliente
                                    <input type="text" class="form-control input-lg" name="NumeroCliente">
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    Tipo
                                    <select class="form-control input-lg" name="Accion">
                                        <option value="Todas">Todas</option>
                                        <option value="0">Envió</option>
                                        <option value="1">Respuesta</option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-md-12">
                                    <br>
                                    <center>
                                        <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button>
                                    </center>
                                </div>
                            </form>


                        </div>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">

                        <div class="box-body table-responsive no-padding">
                            <table id="Tabla_Auditoria" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 20%;">Mensaje</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Numero Cliente</th>
                                        <th>Nombre Destinatario</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th style="width: 20%;">Mensaje</th>
                                        <th>Tipo</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Numero Cliente</th>
                                        <th>Nombre Destinatario</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->



<?php
include 'footer.php';
?>



<script>
    $(document).ready(function() {
        var titulo_tabla = "Auditor";
        var dataTableAuditoria = "";
        dataTableAuditoria = $('#Tabla_Auditoria').DataTable({

            deferRender: true,
            responsive: true,
            processing: true,
            paging: true,
            autoWidth: false,
            responsivePriority: 1,
            lengthMenu: [10, 20, 50, 100, 200, 500],
            order: [
                [3, 'desc'],
                [4, 'desc']
            ],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                buttons: {
                    pageLength: {
                        _: "Mostrando %d <br> Elementos",
                        '-1': "Ver Todo"
                    }
                }
            },

            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                className: 'btn Config',
                buttons: [{
                        extend: 'print',
                        text: 'Imprimir',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: titulo_tabla,
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pageLength'
                    },
                    {
                        extend: 'colvis',
                        text: 'Modificar Columnas'
                    }
                ]
            }],
            "ajax": {
                url: "ADW_Ajax.php",
                type: "post",
            },
            columnDefs: [{
                targets: 1,
                width: '20%'
            }, {
                targets: 0,
                width: '5%'
            }, {
                targets: 2,
                width: '5%'
            }, ],
            columns: [{
                    data: 'id'
                },
                {
                    data: 'mensaje'
                },
                {
                    data: 'tipo'
                },
                {
                    data: 'Fecha'
                },
                {
                    data: 'Hora'
                },
                {
                    data: 'numeroCliente'
                },
                {
                    data: 'Nombre_Destinatario'
                }
            ]

        });


        // Habilitar la funcionalidad de filtro por columnas en la parte inferior
        $('#Tabla_Auditoria tfoot th').each(function() {
            var title = $(this).text();
            //$(this).html('<input type="text" class="" placeholder="' + title + '" />');

            $(this).html('<div class="input col-md-12 webflow-style-input"><input type="text" class="input__field" id="' + title + '"><span class="input__label"><label for="' + title + '">' + title + '</label></span></div>');

        });

        dataTableAuditoria.columns().every(function() {
            var that = this;

            $('input', this.footer()).on('keyup change', function() {
                if (that.search() !== this.value) {
                    that
                        .search(this.value)
                        .draw();
                }
            });
        });

        // Función para recargar los datos del DataTable
        function recargarTabla() {
            dataTableAuditoria.ajax.reload(null, false); // Recarga los datos sin cambiar la página
        }

        // Ejecutar la función cada 5 segundos
        setInterval(recargarTabla, 5000); // 5000 milisegundos = 5 segundos


    });
</script>
<link rel="stylesheet" href="css/CamposInput.css">