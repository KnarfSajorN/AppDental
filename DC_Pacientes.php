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
                   <h4 class="Titulo_Pagina">Pacientes Archivos Dicom</h4>

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
               "data": function(row, type, set) {
                   botones = "";
                   botones += "<a href='DC_SubirArchivos?clienteId=" + row.cliente_id + "' title='Agregar Archivos Dicom'><i class='fas fa-file-medical'></i> </a>";
                   return botones;
               }
           }

       ];
   </script>


   <?php
    include 'footer.php';
    ?>
   