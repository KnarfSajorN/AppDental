<?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Consultas
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Consultas</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 
          <div class="box">
           
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

                    $resultado=mysql_query("SELECT * FROM  cliente where usuario_id =$ID order by cliente_id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  

                  echo '     <tr>
                  <td>'.$fila[2].' </td>
                  <td>'.$fila[6].'</td>
                  <td>'.$fila[3].'</td>
                  <td>'.$fila[5].'</td>
                  <td>'.$fila[13].'</td>
                  <td>'.$fila[19].'</td>
                  <td>'.$fila[20].'</td>
                  <td>    
                      
                      
                     <a href="historiaClinica1.php?clienteId='.$fila[0].'">
              <button   class="btn btn-block btn-primary btn-sm">  <strong>   <i class="fa fa-plus"></i>Agregar Consulta </strong> </button>
              </a>
                  </td>
           
                </tr>';

 }


 ?>
 






 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                   <th>Nombre</th>
                  <th>Cedula</th>
                  <th>Celular</th>
                  <th>Email</th>
                  <th>Telefono Fijo</th>
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