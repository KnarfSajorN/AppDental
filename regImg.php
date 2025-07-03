<?php include 'header.php';
include 'menu.php';
$ID_patients = $_GET['ID_patients'];
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
<div class="col-sm-4">
  <?php echo '<a href="regPatients.php?ID_patients='.$ID_patients.'">';  ?>  
           <div class="callout callout-danger">
            <h4>step 1</h4>
            <p> PATIENT INFORMATION </p>
          </div>
        </a>
</div>
<div class="col-sm-4">
      <?php echo '<a href="#">';  ?>  
          <div class="callout callout-info">
            <h4>step 2</h4>
            <p> PATIENT'S IMAGES </p>
          </div>
        </a>
</div>
<div class="col-sm-4">
  <?php echo '<a href="order.php?ID_patients='.$ID_patients.'">';  ?>  
           <div class="callout callout-danger">
            <h4>step 3</h4>
            <p> ORDERS </p>
          </div>
      </a>
</div>



         
          <div class="box-body">
                
          <form class="form-horizontal" action="regImg.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">

   



            <input type="hidden" id="clienteId" name="usuario_id" value="<?php echo $usuario_id;?>" >
                <input type="hidden" name="ID_Doctor"  class="form-control input-lg"    value="<?php echo $_SESSION['ID'] ?>">
                <input type="hidden" name="ID_patients"  class="form-control input-lg"    value="<?php echo $ID_patients ?>">
                                                                                          
            <div class="form-row">
 
                <div class="form-group col-md-4">
              <!--  <input type="text" class="form-control" id="Descripcion" name="nameImg" placeholder="Descripcion" required >  -->

                <select class="form-control select2"  name="nameImg"  style="width: 100%;">
                  <option selected="selected">Composite</option>
                  <option>Front View</option>
                  <option>Rx Panoramic</option>
                  <option>Rx Lateral Cephalic</option>
                  <option>CBCT Cone Beam Computed Tomography</option>
                  <option>3D Files Upper STL</option>
                  <option>3D Files Lower STL  </option>
                  <option>CBT Cone Bean Compute Tomography (Dicom)  </option>
                   
                

              <!--     <option disabled="disabled">California (disabled)</option> -->
                  <option>Right View</option>
                  <option>Left View</option>
                  <option>Fron Facial View</option>
                  <option>Right Facial View</option>

                </select>


              </div>


              <div class="form-group col-md-4">
                 
                <input id="imagen" name="imagen" size="30" type="file" required/>
              </div>
              <br>
              
            <div align="center"  class="form-group col-md-4"> 
              <button   type="submit" class="btn btn-block btn-primary" id="registro_Img" name="registro_Img"><h4> Record </h4></button>
            </div>   
             
          </form> 
           <hr size="3" width="100%" color="#0000CC">
          <div align="center"  class="col-md-10" align="rigt">   </div>   
            <div align="center"  class="col-md-2" align="rigt"> 
            <?php echo " <a class='btn btn-block btn-social btn-bitbucket' href='order.php?ID_patients=$ID_patients'?>"?>
              
              
                          Generate Order >
                        </a>


              </a>
            </div>   
             
                 
<?php echo $mensaje_regImg?>
             
                 
              </div>
              <br>

           
    <hr size="3" width="100%" color="#0000CC">
                    <div class="timeline-item">
                      <span>  Registered  </span>

                       
                      <div class="timeline-body">


                        <?php


                         
                        $ID_DOSTOR = $_SESSION['ID'];
                        $resultado=mysql_query("select * from imgPatients where ID_Doctor = '$ID_DOSTOR' and  ID_Patients = '$ID_patients'");
                        $check=mysql_num_rows($q);

                        while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {


                           
                        echo ' <div align="center"  class="form-group col-md-4">
                        <img src=http://tripled.com.co/system/upload/'.$fila[2].'" alt="..." class="margin" width="100%" height="40%"> 
                         <a class="btn btn-block btn-social btn-bitbucket">
                          <i class="fa fa-eye"></i> '.$fila[3].' 
                        </a>
                        <form class="form-horizontal" action="regImg.php" method="POST"   enctype="multipart/form-data">
                        <input type="hidden" value="'.$fila[0].'" name="ID_Img">
                        <input type="hidden" value="'.$ID_patients.'" name="ID_patients">
                        
                        
                        <button   type="submit" class="btn btn-block btn-primary" id="delete_Img" name="delete_Img"><h4> <i class="fa fa-bitbucket"></i> Delete Img </h4></button>
                        </form>
                        </div>'; 
                        }


                        ?>
                       


                       
                      </div>
                    </div>
</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>