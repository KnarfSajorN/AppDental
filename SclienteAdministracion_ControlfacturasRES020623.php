
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Registros de Facturas
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Registros de facturas</a></li>
        

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
                  <th>Numero</th>
                  <th>Cliente</th>
                  <th>Fecha Factura</th>
                  <th>Fecha vencimiento</th>
                  <th><div align="right">Total</div></th>
                  <!--<th><div align="right">Cant.</div></th> -->
                  <th><div align="right">Saldo</div></th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                    $ID = $_SESSION['ID'];

                    $resultado=mysql_query("SELECT * FROM  sOperacionInv where idEmpresa =$ID and tipo = 1 order by numeroDoc");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                         $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $fila[2]");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              
              $telefono_cliente           =$rowMotorizado['telefono_cliente'];

                
            }
$saldo = $fila[12]-$fila[14];

   



                  echo '     <tr>
                  <td>'.$fila[1].' </td>
                  <td>'.$nombre_cliente.' </td>
                  <td>'.$fila[4].'</td>
                  <td>'.$fila[5].'</td>
                  <td><div align="right">'.number_format($fila[12], 0, ',', '.').'</div></td>
                 <!-- <td><div align="right">'.$fila[13].'</div></td> -->
                  <td> <div align="right">  '.$saldo.'  </div></td>
                  <td>    
                      
                      <a href="imprimirFactura.php?idOperacion='.$fila[0].'" target="_blank"><i class="fa fa-plus"></i> Imprimir Factura</a>    | 
                      <a href="ticketPrint.php?idOperacion='.$fila[0].'" target="_blank"><i class="fa fa-file"></i> Imprimir Ticket</a>    | 
                      <a href="preliminarFactura.php?idOperacion='.$fila[0].'" target="_blank"><i class="fa fa-eye"></i> Ver Factura</a>  |
                      <a href="enviarFactura.php?idOperacion='.$fila[0].'" target="_blank"><i class="fa fa-send"></i> Enviar Factura</a> 
                  </td>
           
                </tr>';

 }


 ?>
 






 <a href=""></a>
                </tbody>
                <tfoot>
                <tr>
                  <th>Numero</th>
                  <th>Cliente</th>
                  <th>Fecha Factura</th>
                  <th>Fecha vencimiento</th>
                  <th><div align="right">Total</div></th>
                  <th><div align="right">Cant.</div></th>
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