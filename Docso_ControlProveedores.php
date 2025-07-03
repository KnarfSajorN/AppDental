
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
   include 'header.php';
   include 'menu.php';?>

<style>
.Titulo_Pagina {
    width: fit-content;
    background-color: #3c8dbc75;
    padding: 20px;
    border-radius: 20px 20px 0px 0px;
    display: table-cell;
}
</style>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Registrar Documento Soporte</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <h4 class="Titulo_Pagina">Registrar Documento Soporte</h4>
      <div>
        <div class="col-xs-12">


          <div class="box">
          <div class="box-header">
            <a href="proveedores" target="_blank">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Proveedor</strong></h4>
              </button>
            </a>
            <hr>
            <a href="Docso_ControlDocumentosSoporte">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                <h4> <strong> <i class="fa fa-dashboard"></i> Control de Documentos Soporte</strong></h4>
              </button>
            </a>
            <br>
            <a href="Docso_Reportes">
              <button class="btn btn-block btn-outline-info rounded-pill shadow m-1">
                <h4> <strong> <i class="fas fa-print"></i> Reporte de Documentos Soporte</strong></h4>
              </button>
            </a>
            <hr>
          </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="Tabla_Rapida_AJAX" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>RUT/RUC</th>
                  <th>Correo</th>
                  <th>Celular</th>
                  <th>Dirección</th>
                  <th>Acciones</th>
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
var titulo_tabla = "Proveedores";
<?php if ($_SESSION['vista'] == 0){?>
query_tabla_ajax="<?php echo "SELECT * FROM  sproveedores where   Activo = 1 AND Datos_Api='1' "; ?>";
<?php }elseif ($_SESSION['vista'] == 1){  ?>
query_tabla_ajax="<?php echo "SELECT * FROM  sproveedores where   Activo = 0 AND Datos_Api='1'  order by id";?>";
<?php }  ?>

columnas=['id','nombre','rut','correo','telefono','direccion'];

columnastablas=[
                { "data": "nombre" },
                { "data": "rut" },
                { "data": "correo"},
                { "data": "telefono" },
                { "data": "direccion" },
                { "data": function ( row, type, set ) {
                        botones="";
                        botones+="<a href='Docso_GenerarDocumento?id="+row.id+"' title='Agregar Documento Soporte' target='_blank'><button type='button' class='btn btn-block btn-outline-info rounded-pill shadow m-1'>Generar Documento Soporte  <i class='fas fa-angle-down float-right mt-2'></i> </button></a>";
                        return botones;
                        }
                } 
                
            ];
</script>

   <?php
    include 'footer.php';

   ?>