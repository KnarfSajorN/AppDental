<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>

      Reportes de Video Consultas
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Reportes de Video Consultas </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">


      <div class="card">

        <!-- /.card-header -->
        <div class="card-body">




          <div class="col-xs-12">

            <b> Reportes de Video Consultas</b>
            <form action="VerVideoconsultas.php" method="POST">


              <?php if ($_SESSION['TIPO'] == '99') { ?>


                <div class="col-xs-4">

                  Desde:
                  <input type="date" class="form-control input-lg" name="desde" required value="<?=date('Y-m-01')?>">
                  <?php
                  $ID = $_SESSION['ID'];
                  $clienteId = $_GET['clienteId'];



                  ?>

                  <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
                  <input type="hidden" class="form-control input-lg" name="clienteId" value="<?php echo $clienteId ?>" required>

                </div>


                <div class="col-xs-4">


                  Hasta:
                  <input type="date" class="form-control input-lg" name="hasta" required value="<?=date('Y-m-d')?>">

                </div>

                <div class="col-md-12 pt-3">
                  <button type="submit" class="btn btn-block btn-outline-info rounded-pill btn-lg">
                    <i class="fa fa-file-video-o"></i>
                    Generar 
                  </button>
                </div> <?php } ?>

              <!--

<?php if ($_SESSION['TIPO'] >= '1') { ?>


 <div class="row table-responsive">
<div class="col-xs-12">
 REPORTE GENERAL
</div>
</div>
 <div class="row table-responsive">
  <div class="col-xs-4">

 Desde:
     <input type="date" class="form-control input-lg" name="desde" required>
     <?php
      $ID = $_SESSION['ID'];
      $clienteId = $_GET['clienteId'];



      ?>

     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
     <input type="hidden" class="form-control input-lg" name="clienteId" value="<?php echo $clienteId ?>" required>
     
  </div> 


 <div class="col-xs-4">


 Hasta:
<input type="date" class="form-control input-lg" name="hasta" required>
    
  </div>  
  
  <div class="col-xs-3">
    <br>
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div> 
</div>
 <div class="row table-responsive">
<div class="col-xs-12">
 REPORTE POR ESPECIALISTA
</div>
</div>

 <div class="row table-responsive">


  <div class="col-xs-3">

 Desde:
     <input type="date" class="form-control input-lg" name="desde" required>
     <?php
      $ID = $_SESSION['ID'];
      $clienteId = $_GET['clienteId'];



      ?>

     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID ?>" required>
     <input type="hidden" class="form-control input-lg" name="clienteId" value="<?php echo $clienteId ?>" required>
     
  </div> 


 <div class="col-xs-3">


 Hasta:
<input type="date" class="form-control input-lg" name="hasta" required>
    
  </div>  


 <div class="form-group col-md-3">
 <br>
 Especialista:
 <br>
<select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required" >
                    <option value="" selected></option> 
                    <?php
                    usuariosEspecialistasSelect();

                    ?>
                </select>


              </div>


  
  <div class="col-xs-3"> <br>
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  -->

          </div>


        <?php } ?>









        </form>

        </div>




        <div align="center">
          <h6>
            <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base; ?>/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a> </font>
          </h6>
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