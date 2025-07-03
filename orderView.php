<?php include 'header.php';
include 'menu.php';
$ID_Order = $_GET['ID_Order'];


$patiente=mysql_query("select * from orders where ID_Order = '$ID_Order'");
                      $dataPatiente=mysql_fetch_array($patiente);
                      $services= $dataPatiente['services'];
                      $treatment= $dataPatiente['treatment'];
                      $arches= $dataPatiente['arches'];
                      $incisorsMidline= $dataPatiente['incisorsMidline'];
                      $incisorsOverbite= $dataPatiente['incisorsOverbite'];
                      $incisorsOverjet= $dataPatiente['incisorsOverjet'];
                      $posteriorSpacing= $dataPatiente['posteriorSpacing'];
                      $posteriorArchWidth= $dataPatiente['posteriorArchWidth'];
                      $posteriorCorssBite= $dataPatiente['posteriorCorssBite'];
                      $alignersPAUpper= $dataPatiente['alignersPAUpper'];
                      $alignersPALower= $dataPatiente['alignersPALower'];
                      $impressions1= $dataPatiente['impressions1'];
                      $impressions2= $dataPatiente['impressions2'];
                      $impressions3= $dataPatiente['impressions3'];
                      $impressions1Nombre= $dataPatiente['impressions1Nombre'];
                      $impressions2Nombre= $dataPatiente['impressions2Nombre'];
                      $impressions3Nombre= $dataPatiente['impressions3Nombre'];
                      $additionalInstructions= $dataPatiente['additionalInstructions'];
                      $bondingDate= $dataPatiente['bondingDate'];
                      $ID_DOSTOR= $dataPatiente['ID_Doctor'];
                      $ID_Patients= $dataPatiente['ID_Patients'];
                      
                      $CrowdingPMaxilar= $dataPatiente['CrowdingPMaxilar'];
                      $CrowdingEMaxilar= $dataPatiente['CrowdingEMaxilar'];
                      $CrowdingPMandibular= $dataPatiente['CrowdingPMandibular'];
                      $CrowdingEMandibular= $dataPatiente['CrowdingEMandibular'];
                      
                      $ClassD1= $dataPatiente['ClassD1'];
                      $ClassD2= $dataPatiente['ClassD2'];
                      $ClassD3= $dataPatiente['ClassD3'];
                      $ClassD4= $dataPatiente['ClassD4'];

                      if ($CrowdingPMaxilar == 'on') {
                        $CrowdingPMaxilaV = 'checked';
                      }
                      else
                      { $CrowdingPMaxilaV = '';}
                      
                      if ($CrowdingEMaxilar == 'on') {
                        $CrowdingEMaxilarV = 'checked';
                      }
                      else
                      { $CrowdingEMaxilarV = '';}
                      
                      if ($CrowdingPMandibular == 'on') {
                        $CrowdingPMandibularV = 'checked';
                      }
                      else
                      { $CrowdingPMandibularV = '';}
                      
                      if ($CrowdingEMandibular == 'on') {
                        $CrowdingEMandibularV = 'checked';
                      }
                      else
                      { $CrowdingEMandibularV = '';}
                      
                      
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
                  <input type="hidden" name="ID_Doctor" value="<?php echo $_SESSION['ID']?>"> 
                  <input type="hidden" name="ID_patients"   value="<?php echo $ID_patients ?>">

                  <div class="col-sm-12"  align="left">
                    <label>Service</label>
                    <input type="text" name="services"  class="form-control input-lg" id="services" placeholder="Service" value="<?php echo $services?>" required>
                  </div>

                  <div class="col-sm-6"  align="left">
                  <label><h3> Service </h3></label>

                  <select class="form-control select2"  name="treatment"  style="width: 100%;">
                  <option selected="selected"><?php echo $treatment?></option>
                  <option>XPress</option>
                  <option> Limited</option>
              <!--     <option disabled="disabled">California (disabled)</option> -->
                  <option>Unlimited</option>
                  <option>Refinement</option>
                  
                </select>
<br> 
                  </div>


                  <div class="col-sm-6" align="left">
                  <label><h3> Arches </h3> </label>

                  <select class="form-control select2"  name="arches"  style="width: 100%;">
                  <option selected="selected"><?php echo $arches?></option>
                  <option>Both Upper/Lower</option>
                  <option> Single Arc-Upper</option>
              <!--     <option disabled="disabled">California (disabled)</option> -->
                  <option>Single Arc-Lower</option>
                  
                </select>
<br> 
                  </div>
<font color="#ffffff">a</font> 
<hr>

                  <div class="col-sm-6" align="left">
                 
                  <label><h3> Incisors </h3> </label>
<hr>
                    <div class="col-sm-4" align="left">
                        <h6> Mideline </h6>
                        <select class="form-control select2"  name="incisorsMidline"  style="width: 100%;">
                        <option selected="selected"><?php echo $incisorsMidline?></option>
                        <option>Maintain</option>
                        <option> Improve</option>
                        <option>Center</option>
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Improve </h6>
                        <select class="form-control select2"  name="incisorsOverbite"  style="width: 100%;">
                        <option selected="selected"><?php echo $incisorsOverbite?></option>
                        <option>Maintain</option>
                        <option> Improve</option>
                      
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Overjet </h6>
                        <select class="form-control select2"  name="incisorsOverjet"  style="width: 100%;">
                        <option selected="selected"><?php echo $incisorsOverjet?></option>
                        <option>Maintain</option>
                        <option> Improve</option>
                        </select>
                    </div>

                  </div>



                  <div class="col-sm-6" align="left">
                 
                  <label><h3> Posterior </h3> </label>
                  <hr>
                    <div class="col-sm-4" align="left">
                        <h6> Spacing </h6>
                        <select class="form-control select2"  name="posteriorSpacing"  style="width: 100%;">
                        <option selected="selected"> <?php echo $posteriorSpacing?> </option>
                        <option>Close All Spaces</option>
                        <option> Leave Space</option>
                       
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Arch Width </h6>
                        <select class="form-control select2"  name="posteriorArchWidth"  style="width: 100%;">
                        <option selected="selected"> <?php echo $posteriorArchWidth?> </option>
                        <option>Maintain</option>
                        <option> Expand</option>
                      
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Posterior Cross-bite </h6>
                        <select class="form-control select2"  name="posteriorCorssBite"  style="width: 100%;">
                        <option selected="selected"><?php echo $posteriorCorssBite?></option>
                        <option>Maintain</option>
                        <option> Correct</option>
                        </select>
                    </div>

                  </div>


<font color="#ffffff">a</font> 
<hr>

                  <div class="col-sm-6" align="left">
                     <label>Bonding Date</label>
                     <h6>Take into account that the delivery date can not be less than 4 days </h6>
 
                         <input type="date" name="bondingDate"  class="form-control input-lg" id="services" value="<?php echo $bondingDate?>"  required>
       

                  </div>



                  <div class="col-sm-6" align="left">
                 
                  <label><h3> IPR Instructions * </h3> </label>
                  <hr>
                     
                        <select class="form-control select2"  name="posteriorSpacing"  style="width: 100%;">
                        <option selected="selected"><?php echo $posteriorSpacing?></option>
                        <option>No IPR Required</option>
                        <option> IPR Required (Indicate in the diagram)</option>
                        <option> Reduce Teeth as Needed in Lab</option>
                       
                        </select>
                    
              
              

                  </div>


<font color="#ffffff">a</font> 
<hr>


   
<font color="#ffffff">a</font> 
<hr>
                    <div class="col-sm-12"  align="left">
                     <label><h3>Class Desired </h3> </label>
                    <hr>   
                  <div class="col-sm-3"  align="left"> 
                  <h6> Molar Relationship Right </h6>  
                      <select class="form-control select2"  name="ClassD1"  style="width: 100%;">
                        <option selected="selected"><?php echo $ClassD1?></option>
                        <option>Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  <h6> Molar Relationship Left </h6>  
                      <select class="form-control select2"  name="ClassD2"  style="width: 100%;">
                        <option selected="selected"><?php echo $ClassD2?></option>
                        <option>Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  <h6> Canine Relationship Right </h6>  
                      <select class="form-control select2"  name="ClassD3"  style="width: 100%;">
                        <option selected="selected"><?php echo $ClassD3?></option>
                        <option>Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  <h6> Canine Relationship Left </h6>  
                      <select class="form-control select2"  name="ClassD4"  style="width: 100%;">
                       <option selected="selected"><?php echo $ClassD4?></option>
                        <option>Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
<font color="#ffffff">a</font> 
<hr>
                    <div class="col-sm-12"  align="left">
                     <label><h3>Crowding </h3> </label>
                    <hr>   
                  <div class="col-sm-3"  align="left"> 
                  
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingPMaxilar" <?php echo $CrowdingPMaxilarV?>>
                           Procline Maxillar   
                          </label>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingEMaxilar" <?php echo $CrowdingEMaxilarV?>>
                           Procline Mandibular   
                          </label>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingPMandibular" <?php echo $CrowdingPMandibularV?>>
                           Expand Maxillar     
                          </label>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                   
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingEMandibular" <?php echo $CrowdingEMandibularV?>>
                           Expand Mandibular  
                          </label>
                  </div>
 
 <font color="#ffffff">a</font> 
<hr>


                  <div class="col-sm-12"  align="left">
                      <label>Additional Instructions</label>
                      <input type="text" name="additionalInstructions"  class="form-control input-lg" id="additionalInstructions" value="<?php echo $additionalInstructions?>">
                  </div>

 <font color="#ffffff">a</font> 
<hr>
    <label>View Img STL</label>
  <?php 
                  $resultado=mysql_query("select * from imgPatients where nameImg = '3d' and ID_Order = $ID_Order");
                  $check=mysql_num_rows($q);
                 

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) 
                    {

                    echo      '<h3><a href="visorSTL/index.php?imgNumber='.$fila[2].'" target="_blank"><i class="fa fa-cube"></i>'.$fila[2].'<br></a></h3>';
                    }
                  ?>
 <font color="#ffffff">a</font> 
<hr>
 <div class="timeline-item">
                       
                       
                      <div class="timeline-body">


                        <?php
 
                         
                        
                        $resultado=mysql_query("select * from imgPatients where ID_Doctor = '$ID_DOSTOR' and  ID_Patients = '$ID_Patients'");
                        $check=mysql_num_rows($q);

                        while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {


                           
                        echo ' <div align="center"  class="form-group col-md-4">
                        <img src=http://tripled.com.co/system/upload/'.$fila[2].'" alt="..." class="margin" width="100%" height="40%"> 
                         <a href="visorIMG/index.php?ID_Order='.$ID_Order.'" target="_blank" class="btn btn-block btn-social btn-bitbucket">
                          <i class="fa fa-eye"></i> '.$fila[3].' 
                        </a>
                        <form class="form-horizontal" action="regImg.php" method="POST"   enctype="multipart/form-data">
                        <input type="hidden" value="'.$fila[0].'" name="ID_Img">
                        <input type="hidden" value="'.$ID_patients.'" name="ID_patients">
                        
                         
                        </form>
                        </div>'; 
                        }


                        ?>
                       


                       
                      </div>
                    </div>
                </div>

                 
              </div>

              

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm" id="update_order" name="update_order"><h4> Update </h4></button>
                
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