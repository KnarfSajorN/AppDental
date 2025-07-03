
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
                  $ID_DOSTOR = $_SESSION['ID'];

                  //     ?ID_patients=8
                    $ID_patients = $_GET['ID_patients'];
                    if ($ID_patients > 0) 
                    {
                      $resultado=mysql_query("select * from orders where ID_Doctor = '$ID_DOSTOR' and ID_Patients = '$ID_patients'");
                      $check=mysql_num_rows($q);
                    }
                    else
                    {
                      $resultado=mysql_query("select * from orders where ID_Doctor = '$ID_DOSTOR'");
                      $check=mysql_num_rows($q);
                    }

                    
                    

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                    {
                      //  '.$fila[2].'

                    $ID_Order = $fila[0]; 
                    
                    $resultado3d=mysql_query("select * from imgPatients where nameImg = '3d' and ID_Order = $ID_Order");
                    $check=mysql_num_rows($q);
                    while ($fila3d = mysql_fetch_array($resultado3d, MYSQL_NUM)) 
                      {
                        if ($fila3d[0] > 1) 
                        {
                          $img3D = ' <a title="Ver Imagen STL " href="visorSTL/index.php?imgNumber='.$fila3d[2].'" target="_blank"> <img src="img/3d.png" width="10%" height="30%" >  </a> ';
                        }
                        else
                        {
                          $img3D = '';
                        }
                      }
                      

                      $resultadoInfor=mysql_query("select * from imgPatients where nameImg = '3d' and ID_Order = $ID_Order");
                      $check=mysql_num_rows($q);
                      while ($filaInfor = mysql_fetch_array($resultadoInfor, MYSQL_NUM)) 
                      {
                        if ($filaInfor[0] > 1) 
                        {
                          $Infor = ' <a title="Informe Final" href="informeFinalCliente.php?ID_Order='.$fila[0].'""> <i class="fa fa-external-link"></i> </a>   |  ';
                        }
                        else
                        {
                          $Infor = '';
                        }
                      }






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
                      <a title="Editar Orden" href="orderEditar.php?ID_Order='.$fila[0].'""> <i class="fa fa-pencil-square-o"></i> </a>  | 
                      <a title="Ver Orden" href="orderView.php?ID_Order='.$fila[0].'""> <i class="fa fa-eye"></i> </a>  | 
                      '.$img3D.'
                      '.$Infor.'
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