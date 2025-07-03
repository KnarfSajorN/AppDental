
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Cuentas a cobrar
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Control facturas</a></li>
        

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
      ?>

          <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  
                  <th>Cliente</th>
                  <th>Telefono</th>
                 
               
                  <th><div align="right">Total</div></th>
                 
                  <th><div align="right">Saldo</div></th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];
//SELECT SUM(totalBruto) as totalBruto, sum(montoPagado) as montoPagado, idCliente FROM `sOperacionInv`GROUP BY (idCliente)
                //    $resultado=mysql_query("SELECT * FROM  sOperacionInv where idEmpresa =$ID order by numeroDoc");
                  
                    $resultado=mysql_query("SELECT SUM(totalBruto) as totalBruto, sum(montoPagado) as montoPagado, idCliente FROM `sOperacionInv`GROUP BY (idCliente)");
                  
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                    $Id_Cliente= $fila[2];
            

            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
  
            $queryList=mysqli_query($conn3,"SELECT * FROM  v_clienteE where id = $Id_Cliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre'];
              
              $telefono_cliente           =$rowMotorizado['telefono'];

                
            }

$saldo = $fila[0]-$fila[1];
if ($saldo > 0) {
 

                  echo '     <tr>
                  <td>'.$fila[2].'-'.$nombre_cliente.' </td>
                  <td>'.$telefono_cliente.' </td>
                
                  <td><div align="right">'.number_format($fila[0], 0, ',', '.').'</div></td>
                   <td> <div align="right">   '.number_format($saldo, 0, ',', '.').' </div></td>
                  <td>    
                      
                      <a href="v_SclienteAdministracion_cuentasAcobrarCliente.php?idcliente='.$fila[2].'"><i class="fa fa-eye"></i> Ver</a>     
              
                     
                  </td>
           
                </tr>';
}
 
 }


 ?>
 






 <a href=""></a>
                </tbody>
                <tfoot>
                   <tr>
                  
                  <th>Cliente</th>
                  <th>Telefono</th>
                 
               
                  <th><div align="right">Total</div></th>
                 
                  <th><div align="right">Saldo</div></th>
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