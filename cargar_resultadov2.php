
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Cargar Resultados.
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Cargar Resultados.</a></li>
        

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
                  <th  align="center">N°</th>
                  <th  align="center">Examen</th>
                  <th align="center">Fecha Registro</th>
                  <th align="center">Cantidad</th>
                  <th align="center">Total</th>
                  <th align="center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                      $idOpe=$_GET['id'];
          
                    $resultado=mysqli_query($conn3,"
                      SELECT ex.nombre as nombre, ex.id as idExamen, s.id as idOpera , s.fechaRegistro as fecha, s.cantidad as cantidad, s.subTotal as total, s.idProducto as idProducto FROM sdetalleoperexamen s, examenes_22 as ex where s.idOperacion = $idOpe AND ex.id=s.idProducto");
                    while ($valor=mysqli_fetch_assoc($resultado)) { ?>
                      <tr >
                        <td><?php echo $valor['idOpera']; ?></td>
                        <td><?php echo $valor['nombre']; ?></td>
                        <td><?php echo $valor['fecha']; ?></td>
                        <td><?php echo $valor['cantidad']; ?></td>
                        <td><?php echo $valor['total']; ?></td>
                        <td align="center">
                          <a href="CargandoResultado.php?id=<?php echo $valor['idOpera']; ?>"><button type="button" class="btn btn-primary btn-sm">Cargar Resultado</button></a> 
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