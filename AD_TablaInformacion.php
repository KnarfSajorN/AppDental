<?php
include 'header.php';
include 'menu.php'; 
$idPrincipal = $_SESSION['ID_principal'];
?>

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
            <li><a href="#">Auditor Medical</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Auditor Medical <i class="fa-solid fa-user-secret"></i> </h4>

                <div class="box">
                    <div class="box-header">

                        <div class="col-xs-12">
                            Reporte Auditor
                            <form action="AD_ReporteAuditor.php" method="POST" class="row">
                                <div class="col-xs-12 col-md-3">
                                    Desde
                                    <input type="date" class="form-control input-lg" name="desde" required>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    Hasta
                                    <input type="date" class="form-control input-lg" name="hasta" required>
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    Ip
                                    <input type="text" class="form-control input-lg" name="Ip">
                                </div>

                                <div class="col-xs-12 col-md-3">
                                    Acciones
                                    <select class="form-control input-lg" name="Accion">
                                        <option value="Todas">Todas</option>
                                        <option value="2">Ruta</option>
                                        <option value="1">Querys[Inserciones/Actualizaciones]</option>
                                    </select>
                                </div>

                                <div class="col-xs-12 col-md-6" style="padding-top: 9px;">
                                    Usuarios
                                    <select class="form-control input-lg" name="Usuario">
                                        <option value="Todos">Todos</option>
                                        <?php
                                        $queryList = mysqli_query($conn3, "SELECT * FROM usuarios where  ID_principal = '$idPrincipal' and activo =1 ");
                                        while ($row_recordset32A = mysqli_fetch_array($queryList)) {
                                            $ID = $row_recordset32A['ID'];
                                            $NOMBRE_USUARIO = $row_recordset32A['NOMBRE_USUARIO'];
                                            echo "<option value='$ID'>$NOMBRE_USUARIO </option>";
                                        }
                                        ?>
                                    </select>
                                    
                                </div>



                                <div class="col-xs-12 col-md-6">
                                    <br>
                                    <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                            <h4> <strong> Generar </strong> </h4>
                                        </button></center>
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
                                        <th>Usuario </th>
                                        <th>Tipo</th>
                                        <th>Ip</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Url</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th>Usuario </th>
                                        <th>Tipo</th>
                                        <th>Ip</th>
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Url</th>
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
                [4, 'desc'],
                [3, 'desc']
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
                url: "AD_Ajax.php",
                type: "post",
            },
            columns: [{
                    data: 'idUsuario'
                },
                {
                    data: 'tipo'
                },
                {
                    data: 'ip'
                },
                {
                    data: 'Fecha'
                },
                {
                    data: 'Hora'
                },
                {
                    data: 'accion'
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