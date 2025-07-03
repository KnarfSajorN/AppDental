<?php include 'header.php';
include 'menu.php';?>

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
  <?php echo '<a href="#">';  ?>  
           <div class="callout callout-info">
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
  <?php echo '<a href="order.php?ID_patients='.$ID_patients.'">';  ?>  
           <div class="callout callout-danger">
            <h4>step 3</h4>
            <p> ORDERS </p>
          </div>
      </a>
</div>



         
            <form class="form-horizontal" action="regPatients.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                   
                  <div class="col-sm-6">
                    <input type="text" name="firtName"  class="form-control input-lg" id="firtNamte" placeholder="Firt Name" required>
                  </div>
                  <div class="col-sm-6">
                     <input type="text" name="lastName" class="form-control input-lg" id="lastName" placeholder="Last Name" required>
                  </div>


                </div>
                <div class="form-group">
                   
                  <div class="col-sm-6">
                    <input type="date" name="bithDate"  class="form-control input-lg" id="bithDate" placeholder="Birth Date*" required>
                  </div>
                  <div class="col-sm-6">
                     <input type="text" name="officeDoctor" class="form-control input-lg" id="officeDoctor" placeholder="Offices Doctor" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                  </div>


                </div>
                <div class="form-group">
                   
                  <div class="col-sm-6">
                    <input type="text" name="referenceNumber"  class="form-control input-lg" id="referenceNumber" placeholder="Reference Number">
                  </div>
                  <div class="col-sm-6">
                     <input type="email" name="email"  class="form-control input-lg"   placeholder="Email">
                  </div>


                </div>
                <div class="form-group">
                   
                  <div class="col-sm-6">
                    <input type="text" name="phoneNumber"  class="form-control input-lg" id="phoneNumber" placeholder="phone number">
                  </div>
                  <div class="col-sm-6">


                    <label>
                      <input type="radio" name="sex" class="flat-red" checked> Male
                    </label>

                    <label>
                      <input type="radio" name="sex" class="flat-red"> Female
                    </label>
                
                      
                  </div>


                </div>

                 
              </div>

              <input type="hidden" name="ID_Doctor"  class="form-control input-lg"    value="<?php echo $_SESSION['ID'] ?>">

              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_patients" name="registro_patients"><h4> Record </h4></button>
                
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