   <?php
    include 'header.php';
    include 'menu.php'; ?>

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
                 <button class="btn btn-block btn-primary btn-sm">
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
                       <th>Cedula</th>
                       <th>Direccion (Casa)</th>
                       <th>Celular (Contacto)</th>
                       <th>Celular (Whatsapp)</th>
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


   <script>
     //version 2 tabla rapida id="Tabla_Rapida_AJAX"
     var titulo_tabla = "Pacientes";
     <?php if ($_SESSION['vista'] == 0) { ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente "; ?>";
     <?php } elseif ($_SESSION['vista'] == 1) {  ?>
       query_tabla_ajax = "<?php echo "SELECT * FROM  cliente where usuario_id = $ID order by cliente_id"; ?>";
     <?php }  ?>

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
         "data": function(row, type, set) {
           botones = "";
           botones += "<a href='GraficasCrecimiento_OMS.php?clienteId=" + row.cliente_id + "&Tipo=Peso x Edad' title='Grafica Peso / Edad'><i class='fa fa-line-chart' style='color:#7699fd;'></i> </a>";
           botones += "<a href='GraficasCrecimiento_OMS.php?clienteId=" + row.cliente_id + "&Tipo=Altura x Edad' title='Grafica Estatura / Edad'><i class='fa fa-line-chart' style='color:#ba60c5;'></i> </a>";
           botones += "<a href='GraficasCrecimiento_OMS.php?clienteId=" + row.cliente_id + "&Tipo=Perimetro Cefalico' title='Grafica Circunferencia'><i class='fa fa-line-chart' style='color:#edde27;'></i> </a>";
           botones += "<a href='GraficasCrecimiento_OMS.php?clienteId=" + row.cliente_id + "&Tipo=IMC' title='Grafica IMC'><i class='fa fa-line-chart' style='color:#6a27ed;'></i> </a>";
           return botones;
         }
       }

     ];
   </script>


   <?php
    include 'footer.php';
    ?>