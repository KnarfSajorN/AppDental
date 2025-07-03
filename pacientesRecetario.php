 <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        Generar Receta
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
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Pacientes </strong></h4></button>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped" width="100%">
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
<?php if ($_SESSION['vista'] == 0){?>
query_tabla_ajax="<?php echo "SELECT * FROM  cliente "; ?>";
<?php }elseif ($_SESSION['vista'] == 1){  ?>
query_tabla_ajax="<?php echo "SELECT * FROM  cliente where usuario_id = $ID order by cliente_id";?>";
<?php }  ?>

columnas=['cliente_id','nombre_cliente','CODI_CLIENTE','direccion_cliente','telefono_cliente','whatsapp','correo_cliente'];

columnastablas=[
                { "data": "nombre_cliente" },
                { "data": "CODI_CLIENTE" },
                { "data": "direccion_cliente"},
                { "data": "telefono_cliente" },
                { "data": "whatsapp" },
                { "data": "correo_cliente" },
                { "data": function ( row, type, set ) {
                        botones="";
                        botones+="<a href='consultaCliente_Recetario.php?clienteId="+row.cliente_id+"' title='Agregar Receta'><i class='fas fa-file-medical'></i> </a>";
                        botones+="<a href='consultaCliente_Recetario.php?clienteId="+row.cliente_id+"' title='Ver historial Recetario'><i class='fas fa-book-medical'></i> </a>";
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