
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
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Patients</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          

          <div class="box">


            <!--
            <div class="box-header">
              <a href="regPatients.php">
              <button   class="btn btn-block btn-primary btn-sm"><h4> <i class="fa fa-glyphicon glyphicon-plus"></i>  Reg Patients </h4></button>
              </a>

            </div>
             /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID Number</th>
                  <th>Status</th>
                  <th>Patient</th>
                  <th>Bonding Date  </th>
                  <th>  </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                  
                  //     ?ID_patients=8
                     
                    $resultado=mysql_query("select * from orders where state <> 'Billing'");
                    $check=mysql_num_rows($q);
                 

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                    {
                      //  '.$fila[2].'





                      $patiente=mysql_query("select * from patients where ID_patients = '$fila[2]'");
                      $dataPatiente=mysql_fetch_array($patiente);
                      $firtName= $dataPatiente['firtName'];
                      $lastName= $dataPatiente['lastName'];

                      if ($fila[15] == '0') 
                      {
                        $Estarus = 'Send';
                      }
                      elseif ($fila[15] <> '0')
                      {
                        $Estarus = $fila[15];
                      }





                      echo '     <tr>
                      <td>'.$fila[0].'</td>
                      <td>'.$Estarus.'</td>
                      <td>'.$firtName.', '.$lastName.'</td>
                      <td>'.$fila[3].'</td>
                      <td>  
                      <a title="Subir Archivo 3D" href="regImg3D.php?ID_Order='.$fila[0].'""> <i class="fa fa-cube"></i> </a> | 
                      <a title="Ver Orden" href="orderView.php?ID_Order='.$fila[0].'""> <i class="fa fa-eye"></i> </a>  | 
                      <a title="Cambir Estado" href="cambiarEstadoOrder.php?ID_Order='.$fila[0].'""> <i class="fa fa-exchange"></i> </a>   |  
                       <a title="Informe Final" href="informeFinal.php?ID_Order='.$fila[0].'""> <i class="fa fa-external-link"></i> </a>   |  
                      </td>

                      </tr>';

                    }


 ?>


 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                  <th>Name</th>
                  <th>Patient ID</th>
                  <th>Phone Number</th>
                  <th>Email</th>
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