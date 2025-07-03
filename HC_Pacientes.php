
<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Pacientes</a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="box">
      <div class="col-md-12">
        <h4 class="Titulo_Pagina">Pacientes Historia Cardiología</h4>


        <div class="box">
          <div class="box-header row">

            <div class="col-md-12">
                     <a href="nuevoPaciente">
              <button   class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" ><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Pacientes </strong></h4></button>
              </a>
            </div>

            </div>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


            <div class="box-body table-responsive no-padding">
              <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" style="font-size:18px">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cédula</th>
                    <th>Dirección (Casa)</th>
                    <th>Celular (Contacto)</th>
                    <th>Celular (WhatsApp)</th>
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
     <?php if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1) and $_SESSION['sucursal'] != 0) {
        $filtro = (($_SESSION['vista'] == 1) ? "usuario_id = '{$_SESSION['ID']}' AND " : ''); ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE {$filtro} sucursal = '$sucursal' $queryCliente ORDER BY cliente_id"; ?>";
     <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
        $filtro = (($_SESSION['vista'] == 1) ? "AND usuario_id = '{$_SESSION['ID']}'" : ''); ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE 1=1 {$filtro} $queryCliente ORDER BY cliente_id"; ?>";
     <?php } ?>
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
        botones += "<a href='HC_Historia_Cardiologia?clienteId=" + (row.cliente_id) + "' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a>";
        botones += "<a href='HC_Historial_Cardiologia?clienteId=" + (row.cliente_id) + "' title='Ver Historial'><i class='fas fa-book-medical'></i> </a>";
        botones += "<a href='agregarCitas?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
        botones += "<a href='nuevoPaciente?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
        botones += "<a href='anexosPaciente?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Anexar Archivos'><i class='fa fa-folder-open'></i> </a>";
        return botones;
      }
    }
  ];
</script>


<?php
include("footer.php");
?> 
