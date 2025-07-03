<?php
include 'header.php';
include 'menu.php';
$Plantilla_General_id = decrypt($_GET['pGi']);
$NombreTabla = funcionMaster($Plantilla_General_id, 'id', 'Nombre', 'PP_Plantillas_Principales');

if (isset($_SESSION['cI']) && $_SESSION['cI'] <> '') {
    $queryCliente = " AND cliente_id=" . $_SESSION['cI'];
} else {
    $queryCliente = "";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes Plantilla / Documento [<?php echo $NombreTabla ?>]</a></li>
      </ol>
    </section> -->
    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">
                <h4 class="Titulo_Pagina">Pacientes Plantilla / Documento [<?php echo $NombreTabla ?>]</h4>


                <div class="box">
                    <div class="box-header">
                        <a href="nuevoPaciente">
                            <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
                            </button>
                        </a>

                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">


                        <div class="box-body table-responsive no-padding">
                            <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped"
                                style="font-size:18px">
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
    var titulo_tabla = "Pacientes";
    
    query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE 1=1 AND (ID_principal = '{$_SESSION['ID']}' or ID_principal = '{$_SESSION['ID_principal']}') $queryCliente ORDER BY cliente_id"; ?>";

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
                botones += "<a href='documentosFormulario?cI=<?= salt() ?>" + btoa(row.cliente_id) + "&pGi=<?= encrypt($Plantilla_General_id); ?>' title='Agregar <?php echo $NombreTabla; ?>'><i class='fas fa-file-medical'></i> </a>";
                botones += "<a href='documentoVerPaciente?cI=<?= salt() ?>" + btoa(row.cliente_id) + "&pGi=<?= encrypt($Plantilla_General_id); ?>' title='Ver historial'><i class='fas fa-book-medical'></i> </a> | ";
                botones += "<a href='agregarCitas?cI=<?= salt() ?>" + btoa(row.cliente_id) + "' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
                botones += "<a href='nuevoPaciente?cI=<?= salt() ?>" + btoa(row.cliente_id) + "' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
                botones += "<a href='anexosPaciente?cI=<?= salt() ?>" + btoa(row.cliente_id) + "' title='Anexar Archivos'><i class='fa fa-folder-open'></i> </a>";
                return botones;
            }
        }

    ];
</script>


<?php
include 'footer.php';
?>