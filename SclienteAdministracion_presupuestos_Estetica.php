
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-4">
    
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Realizar Presupuestos
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Realizar Presupuestos Estética</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="">
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
      ?>

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body table-responsive">
              <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cédula</th>
                  <th>Dirección (Casa)</th>
                  <th>Celular (Contacto)</th>
                  <th>Celular (WhatsApp)</th>
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
query_tabla_ajax="<?php echo "SELECT * FROM  cliente where 1=1 $queryCliente order by cliente_id";?>";
<?php }elseif ($_SESSION['vista'] == 1){  ?>
query_tabla_ajax="<?php echo "SELECT * FROM  cliente where usuario_id = $ID $queryCliente order by cliente_id";?>";
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
                        botones+="<a href='SgenerarPresupuesto.php?clienteId="+row.cliente_id+"' title='Generar Presupuesto'><button type='button' class='btn btn-block btn-outline-primary btn-lg rounded-pill shadow m-1'>Generar Presupuesto</button></a>";
                        botones+="<a href='presupuestoFacial?clienteId="+row.cliente_id+"' title='Generar Presupuesto Facial'><button type='button' class='btn btn-block btn-outline-success btn-lg rounded-pill shadow m-1'>Generar Presupuesto Facial</button></a>";
                        botones+="<a href='presupuestoCorporal.php?clienteId="+row.cliente_id+"' title='Generar Presupuesto Corporal'><button type='button' class='btn btn-block btn-outline-danger btn-lg rounded-pill shadow m-1'>Generar Presupuesto Corporal</button></a>";
                        //botones+="<a href='OD_GenerarPresupuesto.php?clienteId="+row.cliente_id+"' title='Generar Presupuesto Odontograma'><button type='button' class='btn btn-block btn-primary btn-sm' style='background-color: #72a9c9'>Generar Presupuesto Odontograma</button></a>";
                        //botones+="<a href='consultaCliente_documentos.php?clienteId="+row.cliente_id+"' title='Ver historial Consentimientos'><i class='fas fa-book-medical'></i> </a>";
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