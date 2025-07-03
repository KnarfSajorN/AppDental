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
            <!-- /.box-header -->
            <div class="box-body">


              <div class="box-body table-responsive no-padding">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>
                 
                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Telefono</th>

                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];

if ($_SESSION['vista'] == 0) 
{
                   $resultado=mysql_query("SELECT * FROM  cliente order by cliente_id"); 
}
elseif ($_SESSION['vista'] == 1) 
{
                    $resultado=mysql_query("SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");
                      # code...
                    }                    
                   // $resultado=mysql_query("SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  

                  echo '     <tr>';
                  
                  echo'<td><a href="Historia_RiesgoPsicoSocial.php?clienteId='.$fila[0].'" title="Agregar Historia">'.$fila[2].' </a></td>';
                  
                
                  




                  echo '<td>'.$fila[6].'</td>
                  <td>'.$fila[20].'</td>
                  
                  <td>'.$fila[21].'</td>
                  <td>'.$fila[3].'</td>
                  <td>'.$fila[5].'</td>
                  <td>'.$fila[13].'</td>
                  <td>';    
                    
                  echo'<td><a href="Historia_RiesgoPsicoSocial.php?clienteId='.$fila[0].'" title="Agregar Historia"><i class="fa fa-child"></i> </a>|';
                  echo '<a href="consultaCliente_Historia_RiesgoPsicoSocial.php?clienteId='.$fila[0].'" title="Ver Historia Clinica"><i class="fa fa-search"></i> </a> |';





                  echo '</td>
           
                </tr>';

 }


 ?>


 
                </tbody>
                <tfoot>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>
                 
                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Telefono</th>
                  <th>   </th>
                </tr>
                </tfoot>
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
    include 'footer.php';

   ?>