
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ordenes Pendientes.
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Ordenes Pendientes.</a></li>
        

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
                <tr align="center">
                  <th  align="center">Pacientes</th>
                  <th align="center">N° de Doc.</th>
                  <th align="center">Fecha Operación</th>
                  <th align="center">Fecha de Entraga</th>
                  <th align="center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

          
                    $resultado=mysqli_query($conn3,"SELECT * FROM  soperacioninvexamen where tipo = 2");
                    while ($valor=mysqli_fetch_assoc($resultado)) { ?>
                      <tr >
                        <td>    <?php $clind=$valor['idCliente']; 
                            $sss=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $clind");
                            $clienteACT=mysqli_fetch_assoc($sss);
                            echo $clienteACT['nombre_cliente'];





                          ?>
                            </td>
                        <td><?php echo $valor['numeroDoc']; ?></td>
                        <td><?php echo $valor['fechaOperacion']; ?></td>
                        <td><?php echo $valor['fechaVencimiento']; ?></td>
                        <td align="center">
                          <a href="imprimirPendiente.php?idOperacion=<?php echo $valor['idOperacion']; ?>"><button type="button" class="btn btn-primary btn-sm">Imprimir</button></a>
                           
                        </td>
                      </tr>







                    <?php } ?>
                 

                 
 






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