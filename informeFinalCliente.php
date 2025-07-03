<?php include 'header.php';
include 'menu.php';
$ID_Order = $_GET['ID_Order'];

 
                      
?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"> final report</a></li>
         
      </ol>
    </section>
 



<br>      
<br>      
<br>      
     
<section class="content">

<h3> Order Number: <?php echo $ID_Order; ?></h3> 
 



 
<div  class="box box-info">
<br> 
<br> 

<?php 

                $resultado=mysql_query("select * from informeFinal where ID_Order = $ID_Order");
                    $check=mysql_num_rows($q);
                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                      {
                          echo $fila[2];

                          echo '<h3>  <a href="http://tripled.com.co/system/upload/'.$fila[3].'">   Download Doc </a> <?php echo $ID_Order; ?></h3> ';

                          } ?> 




  
 
   

</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>