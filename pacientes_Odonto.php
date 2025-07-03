
  <!-- Left side column. contains the logo and sidebar -->
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
              <a href="nuevoPaciente_odonto.php">
              <button   class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Pacientes </strong></h4></button>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Teléfono Fijo</th>
                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];

                     $resultado=mysqli_query($conn3,"SELECT * FROM  cliente_odonto ");
                 

                    while ($check=mysqli_fetch_assoc($resultado))   { ?>
                         
                  <tr>
                    <td><?php echo $check['nombre_cliente_odonto'];?></td>
                    <td><?php echo $check['CODI_cliente_odonto'];?></td>
                    <td><?php echo $check['celular_cliente_odonto'];?></td>
                    <td><?php echo $check['correo_cliente_odonto'];?></td>
                    <td><?php echo $check['telefono_cliente_odonto'];?></td>
                    <td><?php echo $check['entidadSalud'];?></td>
                    <td><?php echo $check['seguro'];?></td>
                    <td>    
                    

               
                 
                  <?php echo '<a href="consultaCliente_odonto.php?clienteId='.$check['cliente_odonto_id'].'" title="Agregar Consulta"><i class="fa fa-heartbeat"></i> </a> | ';
                 
                  echo '<a href="editar_cliente_odonto.php?clienteId='.$check['cliente_odonto_id'].'" title="Editar Cliente"><i class="fa fa-edit"></i> </a> | ';
               
 
                  echo '<a href="hisorialcliente_odonto.php?clienteId='.$check['cliente_odonto_id'].'" title="Ver Historia"><i class="fa fa-search"></i> </a> | ';
                 
                  echo '<a href="agregarCitas.php?clienteId='.$check['cliente_odonto_id'].'" title="Agregar Cita"><i class="fa fa-calendar"></i> </a>  ';
                  ?>
                   

 
</td>
                  </tr>
                 

                  <?php     } ?>             
                   </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Teléfono Fijo</th>
                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th>   </th>
                </tr>
                </tfoot>
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
   <?php
    include 'footer.php';

   ?>