<?php
include 'header.php';
include 'menu.php';
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Pacientes

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Pacientes para Notas de Enfermeria</a></li>
        </ol>
    </section>

    <!-- //             echo '<td><a href="notaEnfermeria.php?clienteId=' . base64_encode($fila[0]) . '" title="Agregar Cita">' . $fila[2] . ' </a></td>'; -->

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <h2 class="col-md-12 text-center"><b>Notas de Enfermeria</b></h2>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive no-padding">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Cedula</th>
                                        <th>Direccion (Casa)</th>
                                        <th>Celular (Contacto)</th>
                                        <th>Celular (Whatsapp)</th>
                                        <th>Correo</th>
                                        <th>Estado</th>
                                        <th> </th>
                                    </tr>
                                </thead>
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


<script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Pacientes";
    <?php if ($_SESSION['vista'] == 0) { ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  cliente "; ?>";
    <?php } elseif ($_SESSION['vista'] == 1) {  ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID order by cliente_id"; ?>";
    <?php }  ?>

    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'estado'];

    columnastablas = [{
            "data": "nombre_cliente"
        },
        {
            "data": "CODI_CLIENTE"
        },
        {
            "data": "direccion_cliente"
        },
        {
            "data": "telefono_cliente"
        },
        {
            "data": "whatsapp"
        },
        {
            "data": "correo_cliente"
        },
        {
            "data": "estado"
        },
        {
            "data": function(row, type, set) {
                botones = "";
                botones += '<a href="notaEnfermeria.php?clienteId=' + btoa(row.cliente_id) + '" title="Agregar Nota de Enfermeria"><i class="fa fa-sticky-note text-success"></i></a>';
                botones += "<a href='#usuarioModal' data-toggle='modal' data-target='#my-modal' title='Procedimientos' onclick=\"verIngresos({cliente_id: " + row.cliente_id + ", usuario_id: <?= $_SESSION['ID'] ?>})\"><i class='fa fa-user text-danger'></i> </a>";
                return botones;
            }
        }
    ];
</script>

<div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="border-radius: 10px;background: transparent !important;">
            <div class="modal-header" style="margin: 0;padding: 0;border: none;"></div>
            <div class="modal-body" style="margin: 0;">
                <div class="col-md-12">
                    <div class="row">
                        <div class="form-group">
                            <div class="col-md-12" id="div-Ingresos">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer" style="margin: 0;padding: 0;border: none;"></div>
        </div>
    </div>
</div>

<!-- <div id="my-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
<div class="modal-dialog modal-md" role="document">
<div class="modal-content">
  <div class="modal-body" style="border-radius: 10px; padding: 10px">

  </div>
</div>
</div>
</div> -->

<?php
include("footer.php");
if ($_GET['prueba']) {
    include "./tiposIngresos.php";
}
?>