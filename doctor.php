
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Doctor
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Doctor</a></li>
        

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
                  <th>Usuario</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Status</th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                   
                    $resultado=mysql_query("select * from usuarios where TIPO = 0");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  
                  if ($fila[10] == 1) 
                  {
                     $status = '<a href="doctor.php?update_estadoD_D='.$fila[0].'"><button type="button" class="btn btn-info"> <i class="fa fa-check"></i></button></a>';
                  }
                  elseif ($fila[10] == 0) 
                  {
                      $status = '<a href="doctor.php?update_estadoD_A='.$fila[0].'"><button type="button" class="btn btn-danger"> <i class="fa fa-ban"></i></button></a>';
                  }
                  echo '     <tr>
                  <td>'.$fila[1].' </td>
                  <td>'.$fila[6].'</td>
                  <td>'.$fila[11].'</td>
                  <td>'.$fila[12].'</td>
                  <td>'.$status.'</td>
                  <td>    
                      
                      <a href="orders.php?ID_patients='.$fila[0].'"> <i class="fa fa-list"></i> </a> 
                  </td>
           
                </tr>';

 }


 ?>


 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                  <th>Usuario</th>
                  <th>Name</th>
                  <th>City</th>
                  <th>Country</th>
                  <th>Status</th>
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