
  <!-- Left side column. contains the logo and sidebar -->
   <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
    Reportes de Recetas    
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes  de Recetas</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">


         <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">


        <div class="col-xs-12">
Reporte General de Recetas
<form action="VerReporteRecetas.php" method="POST"> 
  <div class="col-xs-3">


    Desde
     <input type="date" class="form-control input-lg" name="desde" required>
     <?php
$ID = $_SESSION['ID'];
     ?>

     <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>
    
  </div> 
  <div class="col-xs-3">
     Hasta
     <input type="date" class="form-control input-lg" name="hasta" required>
  </div> 

  <div class="col-xs-3">
     <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h4> <strong>  Generar  </strong> </h4> </button></center>
  </div>  
</form> 


        </div>
        </div>
        </div>

<br>
     </div>
        </div>
        </div>  
 
<div align="center"> <h6> <font color="red"> Necesitas un reporte nuevo?, Solicítalo por <a href="<?php echo $Base;?>/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
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