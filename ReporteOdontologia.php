
  <!-- Left side column. contains the logo and sidebar -->
  <?php 
   include 'header.php';
   include 'menu.php';
   $ID = $_SESSION['ID'];
  ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       
    Reportes Odontologia         
      </h1>
      <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Reportes citas </a></li>
      </ol> -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="">

 

<br>

   


<div class="box">

    <!-- /.box-header -->
    <div class="box-body">

        <div class="col-xs-12">
            Reporte de Historia Odontología
            <form action="ReporteOdontologiaExcel.php" method="POST" class="row"> 
              <div class="col-xs-12 col-md-4">
                Desde
               <input type="date" class="form-control input-lg" name="desde" required>
               <?php
               $ID = $_SESSION['ID'];
               ?>

               <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>

           </div> 
           <div class="col-xs-12 col-md-4">
                Hasta
               <input type="date" class="form-control input-lg" name="hasta" required>
           </div> 

         <div class="col-xs-12 col-md-4">
            <br>
           <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow"> <h4> <strong>  Generar  </strong> </h4> </button></center>
       </div>  
   </form> 


</div>
<div class="col-xs-12">
            Reporte de Historia Ortodoncia
            <form action="ReporteOrtodonciaExcel.php" method="POST" class="row"> 
              <div class="col-xs-12 col-md-4">
                Desde
               <input type="date" class="form-control input-lg" name="desde" required>
               <?php
               $ID = $_SESSION['ID'];
               ?>

               <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>

           </div> 
           <div class="col-xs-12 col-md-4">
                Hasta
               <input type="date" class="form-control input-lg" name="hasta" required>
           </div> 

         <div class="col-xs-12 col-md-4">
            <br>
           <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow"> <h4> <strong>  Generar  </strong> </h4> </button></center>
       </div>  
   </form> 


</div>
<div class="col-xs-12">
            Reporte de Historia Endodoncia
            <form action="ReporteEndodonciaExcel.php" method="POST" class="row"> 
              <div class="col-xs-12 col-md-4">
                Desde
               <input type="date" class="form-control input-lg" name="desde" required>
               <?php
               $ID = $_SESSION['ID'];
               ?>

               <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>

           </div> 
           <div class="col-xs-12 col-md-4">
                Hasta
               <input type="date" class="form-control input-lg" name="hasta" required>
           </div> 

         <div class="col-xs-12 col-md-4">
            <br>
           <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow"> <h4> <strong>  Generar  </strong> </h4> </button></center>
       </div>  
   </form> 


</div>
<div class="col-xs-12">
            Reporte de Historia Periodoncia
            <form action="ReportePeriodonciaExcel.php" method="POST" class="row"> 
              <div class="col-xs-12 col-md-4">
                Desde
               <input type="date" class="form-control input-lg" name="desde" required>
               <?php
               $ID = $_SESSION['ID'];
               ?>

               <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>" required>

           </div> 
           <div class="col-xs-12 col-md-4">
                Hasta
               <input type="date" class="form-control input-lg" name="hasta" required>
           </div> 

         <div class="col-xs-12 col-md-4">
            <br>
           <center><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow"> <h4> <strong>  Generar  </strong> </h4> </button></center>
       </div>  
   </form> 


</div>
</div>
</div>







<br>



 


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