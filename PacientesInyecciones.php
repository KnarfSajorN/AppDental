 <!-- Left side column. contains the logo and sidebar -->
 <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        
        Generar Inyecciones
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Generar Inyecciones</a></li>
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
              <button   class="btn btn-block btn-outline-info mb-2 rounded-pill "><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Registrar Pacientes </strong></h4></button>
              </a>

            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped" width="100%">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cédula</th>    
                  <th>Personal que Administra</th>
                  <th>Celular</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                  $ID = $_SESSION['ID'];


                  if ($_SESSION['vista'] == 0) 
                  {
                   $resultado=mysqli_query($conn3,"SELECT * FROM  cliente WHERE 1=1 $queryCliente order by cliente_id"); 
                 }
                 elseif ($_SESSION['vista'] == 1) 
                 {    


                  $resultado=mysqli_query($conn3,"SELECT * FROM  cliente where usuario_id =$ID $queryCliente order by cliente_id"); }
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");

                  if ($resultado) {
                    while ($fila = mysqli_fetch_array($resultado)) {
                      echo '<tr>';                
                      echo'<td><a href="AplicarInyeccion?cI='.encrypt($fila['cliente_id']).'" title="Aplicar Inyección">'.$fila['nombre_cliente'].' </a></td>';
                      echo '<td>'.$fila['CODI_CLIENTE'].'</td>    
                      <td>'.funcionMaster($fila[20],'ID','nombre','usuariosInterconsulta').'</td>
                      <td>'.$fila['whatsapp'].'</td>
                      <td>';
                      echo '<a href="AplicarInyeccion?cI='.encrypt($fila['cliente_id']).'" title="Aplicar Inyección"><i class="fa fa-eyedropper"></i> </a>';  
                      echo '</td>
                      </tr>';

                    }
                  }
                  
                  ?>
                </tbody>
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