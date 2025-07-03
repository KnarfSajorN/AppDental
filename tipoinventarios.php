<?php include 'header.php';
include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
         <li  class="active"> Registro de inventario </li>
      </ol>
    </section>
  
<br>      
     
<section class="content">
 
<div  class="box box-info" align="center">
<br> 
<br> 
 <div class="card-body">
          <h4 class="card-title">  Registro de tipos de inventarios   </h4>
          <br>
           <form action="tipoinventariosG.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">


              <div class="form-group col-md-12">
                <div align="left"> Descripción </div>
                
                <input type="text" class="form-control input-lg" id="descripcion" name="descripcion" placeholder="Descripcion"  required>
              </div>
 
<br>
  <div class="form-group col-md-12">
  <hr>	
 </div>
  
            <div class="form-group col-md-12">
                <div align="left">Notas</div>
                <textarea id="nota" name="nota"  class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
            <!-- /.box-header -->

 
              
              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
              
              
              
             
              
              
                           
            <div class="form-group col-md-12">
              <center style="width:100%"><button type="submit" class="btn btn-block btn-outline-info rounded-pill shadow m-1" style="width:100%">Guardar</button></center>
            </div>
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
          </form>
        </div>
     


     <input type="hidden" name="ID_Doctor"  class="form-control input-lg input-lg"    value="<?php echo $_SESSION['ID'] ?>">


</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>