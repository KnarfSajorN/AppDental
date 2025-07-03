<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Registrar Compra

        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Registrar Compra</a></li>


        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">
                <?php
                $msg = $_GET['msg'];
                if ($msg == '1') {
                    echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>';
                }

                if ($msg == '2') {
                    echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>';
                }
                ?>

                <div class="box">
                    <div class="box-header">
                        <a href="proveedores" target="_blank">
                            <button class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Proveedor</strong></h4>
                            </button>
                        </a>
                        <br>
                        <!-- <a href="CargarCompraXML" target="_blank">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                <h4> <strong> <i class="fas fa-id-card-alt"></i> Cargar Compra XML</strong></h4>
              </button>
            </a> -->

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>RUT/RUC</th>
                                    <th>Correo</th>
                                    <th>Celular</th>
                                    <th>Dirección</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                        </table>
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
    var titulo_tabla = "Proveedores";
    <?php if ($_SESSION['vista'] == 0) { ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  sproveedores where (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') and Activo = 1"; ?>";
    <?php } elseif ($_SESSION['vista'] == 1) {  ?>
        query_tabla_ajax = "<?php echo "SELECT * FROM  sproveedores where (usuario_id='{$_SESSION['ID']}' or usuario_id='{$_SESSION['ID_principal']}') and Activo = 0 order by id"; ?>";
    <?php }  ?>

    columnas = ['id', 'nombre', 'rut', 'correo', 'telefono', 'direccion'];

    columnastablas = [{
            "data": "nombre"
        },
        {
            "data": "rut"
        },
        {
            "data": "correo"
        },
        {
            "data": "telefono"
        },
        {
            "data": "direccion"
        },
        {
            "data": function(row, type, set) {
                botones = "";
                botones += "<a href='SgenerarOrdenC?id=" + row.id + "' title='Agregar Orden' target='_blank'><button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1'>Generar Compra  <i class='fas fa-angle-down float-right mt-2'></i> </button></a>";
                botones += "<a href='CargarCompraXML?id=" + row.id + "' title='Agregar Orden XML' target='_blank'><button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1'>Generar Compra XML Proveedor <i class='fas fa-angle-down float-right mt-2'></i> </button></a>";
                //botones+="<a href='Historial_Clinico.php?clienteId="+row.cliente_id+"' title='Ver historial'><i class='fas fa-book-medical'></i> </a>";
                //botones+="<a href='agregarCitas.php?clienteId="+row.cliente_id+"' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
                //botones+="<a href='editarPaciente?clienteId="+row.cliente_id+"' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
                //botones+="<a href='historiaImagenes.php?clienteId="+row.cliente_id+"' title='Anexar Archivos'><i class='fa fa-folder-open-o'></i> </a>";
                return botones;
            }
        }

    ];
</script>

<?php
include 'footer.php';

?>