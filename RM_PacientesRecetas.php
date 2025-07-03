<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php';

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
    $queryCliente = " AND cliente_id=" . $_SESSION['cI'];
} else {
    $queryCliente = "";
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Generar Receta
        </h1>
    </section>



    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">

                <div class="box">
                    <div class="box-header">
                        <a href="nuevoPaciente">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fa fa-glyphicon glyphicon-plus"></i> Registrar Pacientes
                                    </strong></h4>
                            </button>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body table-responsive mt-3">
                        <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" width="100%">
                            <thead>
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cédula</th>
                                    <th>Dirección (Casa)</th>
                                    <th>Celular (Contacto)</th>
                                    <th>Celular (WhatsApp)</th>
                                    <th>Correo</th>
                                    <th> </th>
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
    var titulo_tabla = "Pacientes";
    
    <?php if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0) {
        $filtro = (($_SESSION['vista'] == 1) ? "(usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') AND " : ''); ?>
            query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}')  $queryCliente  and sucursal = '{$_SESSION['sucursal']}' ORDER BY cliente_id"; ?>";            <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
        $filtro = (($_SESSION['vista'] == 1) ? " AND (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}')" : ''); ?>
            query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE  (usuario_id = '{$_SESSION['ID']}' OR usuario_id = '{$_SESSION['ID_principal']}') $queryCliente ORDER BY cliente_id"; ?>";
    <?php } ?>

    console.log(query_tabla_ajax);

    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente'];

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
        "data": function (row, type, set) {
            botones = "";
            botones += "<a href='Receta?clienteId=" + row.cliente_id + "' title='Agregar Receta'><i class='fas fa-file-medical'></i> </a>";
            botones += "<a href='HistorialReceta?clienteId=" + row.cliente_id + "' title='Ver historial Recetario'><i class='fas fa-book-medical'></i> </a>";
            //botones+="<a href='agregarCitas.php?clienteId="+row.cliente_id+"' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
            //botones+="<a href='CrearPaciente.php?clienteId="+row.cliente_id+"' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
            //botones+="<a href='historiaImagenes.php?clienteId="+row.cliente_id+"' title='Anexar Archivos'><i class='fa fa-folder-open-o'></i> </a>";
            return botones;
        }
    }

    ];
</script>


<?php
include 'footer.php';

?>