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
              <table id="example1" class="table table-bordered table-striped" style="font-size:18px">
                <thead>
                <tr>
                  <th>Nombre</th>
                  <th>Cedula</th>
                 
                  <th>Entidad de Salud</th>
                  <th>Seguro</th>
                  <th>Celular</th>
                  <th>Correo</th>
                  <th>Telefono</th>

                  <th style="width: 120px">   </th>
               
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
                  }                    
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                    {

                    echo '     <tr>';
                    echo'<td>'.$fila[2].'</td>';

                    echo '<td>'.$fila[6].'</td>
                    <td>'.$fila[20].'</td>
                    
                    <td>'.$fila[21].'</td>
                    <td>'.$fila[3].'</td>
                    <td>'.$fila[5].'</td>
                    <td>'.$fila[13].'</td>
                    <td style="width: 120px;font-size:23px;text-align:center">'; 
                
                    echo '<a href="historia_clinica_general.php?clienteId='.$fila[0].'" title="Agregar Historia" style="padding-right: 10px;"><i class="fas fa-file-medical"></i> </a>';
                    echo '<a href="Historial_Clinico_General.php?clienteId='.$fila[0].'" title="Ver historial" style="padding-right: 10px;"><i class="fas fa-book-medical"></i> </a>';  

                    echo '<a href="agregarCitas.php?clienteId='.$fila[0].'" title="Agregar Cita" style="padding-right: 10px;"><i class="fa fa-calendar"></i> </a>  ';
                    echo '<a href="editarPaciente?clienteId='.$fila[0].'" title="Editar Cliente" style="padding-right: 10px;"><i class="fa fa-pencil"></i> </a> ';
                    echo '<a href="historiaImagenes.php?clienteId='.$fila[0].'" title="Anexar Archivos"><i class="fa fa-folder-open-o"></i> </a>';  
                    
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