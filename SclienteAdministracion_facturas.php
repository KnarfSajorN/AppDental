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
            Registrar Facturas
        </h1>
        <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Registrar Facturas</a></li>
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

                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped">
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
<script>//version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "clientes";

    // <?php if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0 and $_SESSION['sucursal'] != '') {
    //     $filtro = (($_SESSION['vista'] == 1) ? "(usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') AND " : "(usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') AND "); ?>
    //     query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE {$filtro} sucursal = '$sucursal' $queryCliente ORDER BY cliente_id"; ?>";
    //     console.log(query_tabla_ajax);
    // <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
    //     $filtro = (($_SESSION['vista'] == 1) ? "AND (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}')" : ""); ?>
    //         query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE 1=1 {$filtro} $queryCliente ORDER BY cliente_id"; ?>";
    //         console.log(query_tabla_ajax);
    // <?php } 
    // ?>
    query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') $queryCliente ORDER BY cliente_id"; ?>"
    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente'];

    columnastablas = [
        { "data": "nombre_cliente" },
        { "data": "CODI_CLIENTE" },
        { "data": "direccion_cliente" },
        { "data": "telefono_cliente" },
        { "data": "whatsapp" },
        { "data": "correo_cliente" },
        {
            "data": function (row, type, set) {
                botones = "";
                botones += "<a href='SgenerarFactura?clienteId=" + row.cliente_id + "' title='Agregar Historia'><button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1'>Generar Factura</button></a>";
                //botones+="<a href='OD_GenerarFactura.php?clienteId="+row.cliente_id+"' title='Generar Factura Odontograma'><button type='button' class='btn btn-block btn-primary btn-sm' style='background-color: #72a9c9'>Generar Factura Odontograma</button></a>";
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