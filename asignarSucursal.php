<?php 

include 'header.php'



?>


  <!-- Left side column. contains the logo and sidebar -->

<?php include 'menu.php'?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
      </ol>
    </section>




<?php




$sucursal = $_POST['sucursal'];


 
$_SESSION['sucursal'] = $sucursal;

echo  	"<script language='Javascript'> window.location='portada'; </script>";



?>




    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php include 'footer.php';?>
   

 
 


 

 