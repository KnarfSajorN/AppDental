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
              <table id="Tabla_Rapida_MP" class="table table-bordered table-striped" style="font-size:18px">
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


<script>//version 2 tabla dinamica <table id="Tabla_Inteligente">

var data_table = [];//datos que recibe la tabla
var titulo_tabla = "Pacientes";//titulo de la tabla para las impresiones
<?php
include 'funciones/conn3.php';

//query para sacar la informacion
$ID = $_SESSION['ID'];
if ($_SESSION['vista'] == 0) 
{$queryList=mysqli_query($conn3,"SELECT * FROM  cups ");}
elseif ($_SESSION['vista'] == 1) 
{$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");} 
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList))
{
  $boton1='';
  $codigo=$rowMotorizado['codigo'];
  //$descripcion=$rowMotorizado['descripcion'];


  $boton1 .= "<a href='Historia_Clinica.php?clienteId={$codigo}' title='Agregar Historia'><i class='fas fa-file-medical'></i> </a> |";
  $boton1 .= "<a href='Historial_Clinico.php?clienteId={$codigo}' title='Ver historial'><i class='fas fa-book-medical'></i> </a> |";
  $boton1 .= "<a href='agregarCitas.php?clienteId={$codigo}' title='Agregar Cita'><i class='fa fa-calendar'></i> </a> |";
  $boton1 .= "<a href='editarPaciente?clienteId={$codigo}' title='Editar Cliente'><i class='fa fa-pencil'></i> </a> |";
  $boton1 .= "<a href='historiaImagenes.php?clienteId={$codigo}' title='Anexar Archivos'><i class='fa fa-folder-open-o'></i> </a> |";

?>
//accion para guardar la informacion en el arreglo para que en el footer la funcion del datatables tome esta variable y carge la informacion
data_table.push( [ "<?php echo $codigo?>", "<?php echo $codigo?>", "<?php echo $codigo?>", "<?php echo $codigo?>" ,"<?php echo $codigo?>" ,"<?php echo $codigo?>" ,"<?php echo $boton1;?>"] );
<?php
}
?>
</script>
<!--<script src="js/jquery-3.5.1.js"></script>-->




<?php
  include 'footer.php';
?>
