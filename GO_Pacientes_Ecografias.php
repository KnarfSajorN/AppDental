<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
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
      <div class="col-xs-12">
        <h4 class="Titulo_Pagina">Pacientes Ecografías Gineco-Obstetrica</h4>
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
            <a href="CrearPaciente.php">
              <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
              </button>
            </a>

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
  <?php if ($_SESSION['vista'] == 0) { ?>
    query_tabla_ajax = "<?php echo "SELECT * FROM  cliente WHERE 1=1 $queryCliente "; ?>";
  <?php } elseif ($_SESSION['vista'] == 1) {  ?>
    query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID $queryCliente order by cliente_id"; ?>";
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
        botones += "<a href='GO_Controles_Ecografia.php?clienteId=" + row.cliente_id + "' title='Agregar Ecografias'><i class='fa fa-child'></i> </a>";
        botones += "<a href='HC_SignosV?cI=<?=salt()?>" + btoa(row.cliente_id) + "' title='Agregar Signos Vitales y Antropometria'><i class='fas fa-user-nurse' style='color:#29951ccf;'></i> </a>";
        botones += "<a href='GO_Historial_Clinico_Ginecobstetrica.php?clienteId=" + row.cliente_id + "' title='Ver historial'><i class='fas fa-book-medical'></i> </a>";
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