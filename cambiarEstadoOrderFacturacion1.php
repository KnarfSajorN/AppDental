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
        <li><a href="patientes.php"> Patientes</a></li>
         <li  class="active"> Reg Patientes</li>
      </ol>
    </section>
 



<br>      
<br>      
<br>      
     
<section class="content">





 
<div  class="box box-info" align="center">
<br> 
<br> 
 
 


         
            <form class="form-horizontal" action="order.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="ID_Order" value="<?php echo $ID_Order?>"> 
                  
                  <div class="col-sm-12"  align="left">
                 
                  <h6> Indicar Estado </h6>  
                      <select class="form-control select2"  name="state"  style="width: 100%;">
                        <option selected="selected">Por favor indicar Estado</option>

                      <?php 
                          $resultado=mysql_query("select * from state");
                      $check=mysql_num_rows($q);
                 

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                    {

                  echo     '<option>'.$fila[1].'</option>';
}
                  ?>

                       
                       
                        </select>
                  </div>
 
                 
              </div>

              

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm" id="update_state_order" name="update_state_order"><h4> Update </h4></button>
                
              </div>
              <!-- /.box-footer -->
            </form>
    

</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>