
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
    <div class="row">
      <div class="col-xs-12">
        <h4 class="Titulo_Pagina">Pacientes Cirugía Plástica</h4>
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
              <button class="btn btn-block btn-primary btn-sm">
                <h4> <strong> <i class="fas fa-id-card-alt"></i> Registrar Pacientes </strong></h4>
              </button>
            </a>

          </div>
          <!-- /.box-header -->
          <div class="box-body">


            <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Cedula</th>
                    <th>Direccion (Casa)</th>
                    <th>Celular (Contacto)</th>
                    <th>Celular (Whatsapp)</th>
                    <th>Correo</th>
                    <th>Estado</th>
                    <th> </th>
                  </tr>
                  <tbody>
                  <?php

$ID = $_SESSION['ID'];
$sucursal = $_SESSION['sucursal'];

if($sucursal != 0){
  $resultado=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID and sucursal=$sucursal order by cliente_id");
}else{
                     $resultado=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");
}
while ($fila = mysqli_fetch_array($resultado)) {

echo '     <tr>';
echo'<td>' . $fila['nombre_cliente'] . ' </td>';
echo '<td>'.$fila['CODI_CLIENTE'].'</td>
<td>'.$fila['direccion_cliente'].'</td>
<td>'.$fila['telefono_cliente'].'</td>
<td>'.$fila['whatsapp'].'</td>
<td>'.$fila['correo_cliente'].'</td>
<td>'.$fila['estado'].'</td>
<td>';    



echo '<a href="hccp?cI='.encrypt($fila['cliente_id']).'" title="Agregar Consulta"><i class="fa fa-heartbeat"></i> </a>|';  
echo '<a href="hccpVerPaciente?cI='.encrypt($fila['cliente_id']).'" title="Ver Historia"><i class="fa fa-search"></i> </a> |';



echo '<a href="nuevoPaciente?cI='.encrypt($fila['cliente_id']).'" title="Editar Cliente"><i class="fa fa-pencil"></i> </a> |';
echo '<a href="agregarCitas?cI='.encrypt($fila['cliente_id']).'" title="Agregar Cita"><i class="fa fa-calendar"></i> </a>  |';

echo '<a href="anexosPaciente?cI='.encrypt($fila['cliente_id']).'" title="Agregar Examenes"><i class="fa fa-folder-open-o"></i> </a>';  







echo '</td>

</tr>';

}


?>

                  </tbody>
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



<?php
include("footer.php");
?>