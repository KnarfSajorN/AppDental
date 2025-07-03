
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
<form action="guardarResultado.php" method="POST">
          <div class="box">
              <?php
                      $idOpe=$_GET['id'];
          
                    $resultado=mysqli_query($conn3,"SELECT * FROM sdetalleoperexamen as sd, examenes_22 ex where sd.id=$idOpe AND ex.id=sd.idProducto");
                      $valor=mysqli_fetch_assoc($resultado); ?>
           

            <!-- /.box-header -->
            <div class="box-body">
              <h4><?php echo ucfirst($valor['nombre']); ?> de la Orden : #<?php echo $idOpe; ?></h4>

              <div class="row" style="padding-left: 2%;padding-top: 2%;">

                <div class="col-md-4 ">
                  <label class="control-label" >Lista de Detalles</label>
                  <select name="listaDetalle" id="" class="form-control">
                    <?php  
                    $ex=$valor['idProducto'];
                    $resultados=mysqli_query($conn3,"SELECT * FROM detalleExamenes_22  where idExamen=$ex");
                    while ($res=mysqli_fetch_assoc($resultados)) {  ?>

                    <option value="<?php echo $res['id']; ?>"><?php echo $res['densidad']; ?></option>

                  <?php } ?>
                  </select>
                </div>
                <div class="col-md-4 ">
                  <label class="control-label"> Resultado</label>
                  <input type="text" name="resultado" id="" class="form-control">
                </div> 

                <div class="col-md-4 "><br>
                  <button type="submit" style="    margin-top: 1%;" class="btn btn-block btn-primary btn-sm">Guardar</button>
                </div>
    <input type="hidden" name="idExamen" value="<?php echo $ex; ?>">
    <input type="hidden" name="idOrden" value="<?php echo $idOpe; ?>">

                         
</form>


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