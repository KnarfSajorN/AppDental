   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pacientes
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
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
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fas fa-id-card-alt"></i>  Registrar Pacientes </strong></h4></button>
              </a>

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
                  <th>   </th>
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




<script>//version 2 tabla rapida
var titulo_tabla = "Pacientes";
<?php if ($_SESSION['vista'] == 0){?>
query_tabla_ajax="<?php echo "SELECT * FROM  cups"; ?>";
<?php }elseif ($_SESSION['vista'] == 1){  ?>
query_tabla_ajax="<?php echo "SELECT * FROM  cliente where usuario_id = $ID order by cliente_id";?>";
<?php }  ?>

columnas=['codigo'];

columnastablas=[
                { "data": "codigo" },
                { "data": "codigo" },
                { "data": "codigo"},
                { "data": "codigo" },
                { "data": "codigo" },
                { "data": "codigo" },
                { "data": function ( row, type, set ) {
                        botones="";
                        botones+="<a href='Historia_Clinica.php?clienteId="+row.codigo+"' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a>";
                        botones+="<a href='Historial_Clinico.php?clienteId="+row.codigo+"' title='Ver historial'><i class='fas fa-book-medical'></i> </a>";
                        botones+="<a href='agregarCitas.php?clienteId="+row.codigo+"' title='Agregar Cita'><i class='fa fa-calendar'></i> </a>";
                        botones+="<a href='editarPaciente?clienteId="+row.codigo+"' title='Editar Cliente'><i class='fa fa-pencil'></i> </a>";
                        botones+="<a href='historiaImagenes.php?clienteId="+row.codigo+"' title='Anexar Archivos'><i class='fa fa-folder-open-o'></i> </a>";
                        return botones;
                        }
                } 
                
            ];
</script>

<?php
  include 'footer.php';
?>

