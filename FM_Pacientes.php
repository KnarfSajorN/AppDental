<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

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
    <div class="">
      <div class="col-md-12">
        <h4 class="Titulo_Pagina">Pacientes Familiograma</h4>
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
        if ($msg == '3') {
          echo '
        <div class="callout callout-info ">
        <h4> Cliente Actualizado!</h4>

        <p>   </p>
      </div>';
        }

        ?>

        <div class="box">
          <div class="box-header">
            <a href="nuevoPaciente">
              
              <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
              </button>
            </a>
            
            <hr>
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
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE {$filtro} sucursal = '$sucursal' ORDER BY cliente_id"; ?>";
     <?php } else if (($_SESSION['vista'] == 0 || $_SESSION['vista'] == 1)) {
        $filtro = (($_SESSION['vista'] == 1) ? "WHERE usuario_id = '{$_SESSION['ID']}'" : ''); ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente {$filtro} ORDER BY cliente_id"; ?>";
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
        botones += "<a href='FM_Familiograma?clienteId=" + (row.cliente_id) + "' title='Agregar Familiograma'><i class='fas fa-file-medical'></i> </a>";
        botones += "<a href='FM_Historial?clienteId=" + (row.cliente_id) + "' title='Historial Familiograma'><i class='fas fa-list'></i> </a>";
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