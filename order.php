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
      <?php echo '<a href="regImg.php?ID_patients='.$ID_patients.'">';  ?>  
          <div class="callout callout-danger">
            <h4>step 2</h4>
            <p> PATIENT'S IMAGES </p>
          </div>
        </a>
</div>
<div class="col-sm-4">
  <?php echo '<a href="#">';  ?>  
           <div class="callout callout-info">
            <h4>step 3</h4>
            <p> ORDERS </p>
          </div>
      </a>
</div>

 


         
            <form class="form-horizontal" action="order.php" method="POST" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <input type="hidden" name="ID_Doctor" value="<?php echo $_SESSION['ID']?>"> 
                  <input type="hidden" name="ID_patients"   value="<?php echo $ID_patients ?>">

                  <div class="col-sm-12"  align="left">
                    <label>Service</label>
                    <input type="text" name="services"  class="form-control input-lg" id="services" placeholder="Service" required>
                  </div>
                  

                  <div class="col-sm-6"  align="left">
                  <label><h3> Service </h3></label>

                  <select class="form-control select2"  name="treatment"  style="width: 100%;">
                  <option selected="selected">XPress</option>
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
                  <option selected="selected">Both Upper/Lower</option>
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
                        <option selected="selected">Maintain</option>
                        <option> Improve</option>
                        <option>Center</option>
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> overbite </h6>
                        <select class="form-control select2"  name="incisorsOverbite"  style="width: 100%;">
                        <option selected="selected">Maintain</option>
                        <option> Improve</option>
                      
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Overjet </h6>
                        <select class="form-control select2"  name="incisorsOverjet"  style="width: 100%;">
                        <option selected="selected">Maintain</option>
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
                        <option selected="selected">Close All Spaces</option>
                        <option> Leave Space</option>
                       
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Arch Width </h6>
                        <select class="form-control select2"  name="posteriorArchWidth"  style="width: 100%;">
                        <option selected="selected">Maintain</option>
                        <option> Expand</option>
                      
                        </select>
                    </div>
                    <div class="col-sm-4" align="left">
                        <h6> Posterior Cross-bite </h6>
                        <select class="form-control select2"  name="posteriorCorssBite"  style="width: 100%;">
                        <option selected="selected">Maintain</option>
                        <option> Correct</option>
                        </select>
                    </div>

                  </div>


<font color="#ffffff">a</font> 
<hr>

                  <div class="col-sm-6" align="left">
                     <label>Bonding Date</label>
                     <h6>Take into account that the delivery date can not be less than 4 days </h6>
 
                         <input type="date" name="bondingDate"  class="form-control input-lg" id="services"  required>
                      
                      
                 <!-- 
                  <label><h3> Aligners per Arch  campo hidden   >Crowding  y Class Desired
                         </h3> </label>
                  <hr>
                    <div class="col-sm-6" align="left">
                        <h6> Number Of Upper Aigners </h6>

                       <input type="number" name="alignersPAUpper"  class="form-control input-lg" id="alignersPAUpper" >
                    </div>
                     <div class="col-sm-6" align="left">
                        <h6> Number Of Lower Aigners </h6>

                       <input type="number" name="alignersPALower"  class="form-control input-lg" id="alignersPALower" >
                    </div>

                    --> 

                  </div>


                  <div class="col-sm-6" align="left">
                 
                  <label><h3> IPR Instructions * </h3> </label>
                  <hr>
                     
                        <select class="form-control select2"  name="posteriorSpacing"  style="width: 100%;">
                        <option selected="selected">No IPR Required</option>
                        <option> IPR Required (Indicate in the Additional Instructions)</option>
                        <option> Reduce Teeth as Needed in Lab</option>
                       
                        </select>
                    
              
              

                  </div>

<font color="#ffffff">a</font> 
<hr>
                    <div class="col-sm-12"  align="left">
                     <label><h3>Class Desired </h3> </label>
                    <hr>   
                  <div class="col-sm-3"  align="left"> 
                  <h6> Molar Relationship Right </h6>  
                      <select class="form-control select2"  name="ClassD1"  style="width: 100%;">
                        <option selected="selected">Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  <h6> Molar Relationship Left </h6>  
                      <select class="form-control select2"  name="ClassD2"  style="width: 100%;">
                        <option selected="selected">Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  <h6> Canine Relationship Right </h6>  
                      <select class="form-control select2"  name="ClassD3"  style="width: 100%;">
                        <option selected="selected">Class I</option>
                        <option>Class II</option>
                        <option>Class III</option>
                        
                        </select>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  <h6> Canine Relationship Left </h6>  
                      <select class="form-control select2"  name="ClassD4"  style="width: 100%;">
                        <option selected="selected">Class I</option>
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
                            <input type="checkbox" class="minimal" name="CrowdingPMaxilar">
                           Procline Maxillar
                          </label>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingEMaxilar">
                           Procline Mandibular
                          </label>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                  
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingPMandibular">
                           Expand Maxillar
                          </label>
                  </div>
                  <div class="col-sm-3"  align="left"> 
                   
                          <label>
                            <input type="checkbox" class="minimal" name="CrowdingEMandibular">
                           Expand Mandibular
                          </label>
                  </div>
<font color="#ffffff">a</font> 
<hr>


                  <div class="col-sm-12"  align="left">
                      <label>Additional Instructions</label>
                      <input type="text" name="additionalInstructions"  class="form-control input-lg" id="additionalInstructions">
                  </div>

 <font color="#ffffff">a</font> 
<hr>

                </div>

                 
              </div>

              

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_order" name="registro_order"><h4> Record </h4></button>
                
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