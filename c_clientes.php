  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Medicos
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Medicos</a></li>
         

      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
$msg = $_GET['msg'];
   
      ?>

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
 

                 
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>teléfono</th>
                  <th>Saldo</th>
                  <th>Fecha Reg.</th>
                  
                      
                  
                 
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];
                   
                    
                        $queryList=mysqli_query($conn3,"SELECT * FROM  c_cliente ");
                  

                    $nrowl=mysqli_num_rows($queryList);
                    while($rowMotorizado=mysqli_fetch_array($queryList))
                    {
                      $resultadoDias= 0;

                      $IDCliente      =$rowMotorizado['id'];

                      $nombre      =$rowMotorizado['nombre'];

                      $apellido               =$rowMotorizado['apellido'];
                      $usuarios               =$rowMotorizado['usuarios'];
                      $password               =$rowMotorizado['password'];
                      $saldo               =$rowMotorizado['saldo'];
                      $fechaReg               =$rowMotorizado['fechaReg'];
                      $telefono               =$rowMotorizado['telefono'];


                     
 
                  echo '     <tr>
                  
                  <td>'.$nombre.' '.$apellido.' </td>
                  <td>'.$usuarios.' </td>
                  <td>'.$telefono.' </td>
                  <td>'.$saldo.' </td>
                  <td>'.$fechaReg.' </td>
                  ';


                  echo  ' </tr>';

 }


 ?>


                </tbody>
                <tfoot>
                <tr>
                  
   
                   <th>Nombre</th>
                  <th>Correo</th>
                  <th>teléfono</th>
                  <th>Saldo</th>
                  <th>Fecha Reg.</th>
                  
                      
                                    
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