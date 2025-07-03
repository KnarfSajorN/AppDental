<?php include 'header.php';
include 'menu.php';
 
$ID = $_GET['ID'];
$usuario_id = $_SESSION['ID'];
 
  $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios WHERE usuario_id = $usuario_id and ID = $ID");
  $nrowl=mysqli_num_rows($queryList);
  while($row_recordset32=mysqli_fetch_array($queryList))
  {
     
        $usuario_id=$row_recordset32['usuario_id'];
        $descripcion=$row_recordset32['descripcion'];
        $referencia=$row_recordset32['referencia'];

        $tipo=$row_recordset32['tipo'];
        $existencia=$row_recordset32['existencia'];
        $minimo=$row_recordset32['minimo'];
        $maximo=$row_recordset32['maximo'];
        $costo=$row_recordset32['costo'];
        $precio=$row_recordset32['precio'];
        $nota=$row_recordset32['nota'];
        $ID=$row_recordset32['ID'];
        
        $Fecha_Vencimiento=$row_recordset32['fecha_vencimiento'];
        $puntos=$row_recordset32['puntos'];


  }







if(isset($_POST['btn-save']))
{ 
             

        $usuario_id=$_POST['usuario_id'];
        $descripcion=$_POST['descripcion'];
        $referencia=$_POST['referencia'];

        $tipo=$_POST['tipo'];
        $existencia=$_POST['existencia'];
        $minimo=$_POST['minimo'];
        $maximo=$_POST['maximo'];
        $costo=$_POST['costo'];
        $precio=$_POST['precio'];
        $nota=$_POST['nota'];
        $ID=$_POST['ID'];
        $fecha_vencimiento=$_POST['fecha_vencimiento'];
        $puntos=$_POST['puntos'];



          $motivoConsulta           =$_POST['motivoConsulta']; 

  mysqli_query($conn3,"UPDATE sinvetrios SET 
    descripcion='$descripcion',
    referencia='$referencia',
    tipo='$tipo',
    existencia='$existencia',
    minimo='$minimo',
    maximo='$maximo', 
    costo= '$costo',
    precio='$precio',
    fecha_vencimiento = '$fecha_vencimiento',
    nota='$nota',
    puntos='$puntos'
      WHERE usuario_id = $usuario_id and ID = $ID");

    echo "<script language='Javascript'> window.location='listaInventario.php?msg=3';</script>"; 

}
 

?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        
         <li  class="active"> Editar inventario </li>
      </ol>
    </section>
  
<br>      
     
<section class="content">
 
<div  class="box box-info" align="center">
<br> 
<br> 
 <div class="card-body">
          <h4 class="card-title">  Editar inventario   </h4>
          <br>
           <form action="editarInventario.php" method="POST" name="editarInventario" enctype="multipart/form-data">
            <div class="form-row">


              <div class="form-group col-md-12">
                <div align="left"> Descripción </div>
                
                <input type="text" class="form-control input-lg" id="descripcion" name="descripcion" placeholder="Descripcion" value="<?php echo $descripcion?>" required>
              </div>

              <div class="form-group col-md-4">
                 <div align="left"> Referencia </div>
                <input type="text" class="form-control input-lg" id="referencia" name="referencia" placeholder="referencia" value="<?php echo $referencia?>" required>
              </div>

              <div class="form-group col-md-4">
                 <div align="left">  Fecha de Vencimiento </div>
                <input type="date" class="form-control input-lg" id="fecha_vencimiento" name="fecha_vencimiento" value="<?php echo $Fecha_Vencimiento?>" required>
              </div>


              <div class="form-group col-md-4">
                 <div align="left"> Tipo </div>
 
                  <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required="required">
                    <option value="" selected="selected">Seleccione </option>
                    <?php
 $contador= 0 ;
                        $queryList=mysqli_query($conn3,"SELECT * FROM scategoria WHERE usuario_id = $usuario_id order by descripcion");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $id      = $row_recordset32['id'];
                                          $descripcion      = $row_recordset32['descripcion'];
                                          $contador++;
if ($id == $tipo) {
 $selec = 'selected="selected"';
}
else {
  $selec = '';
}
                                          echo "<option $selec value='$id'> $descripcion</option>";
                                      }

                    ?>

  


                </select>
<?php 
 if ($contador==0) {
echo '<h6> <font color="red"> No a registrado ningún tipo o categoría <a href="tipoinventarios"> <strong>  registrar </strong></a>  </font></h6>
';	

}
?>


               </div>
<br>
  <div class="form-group col-md-12">
  <hr>	
 </div>

               <div class="form-group col-md-4">
                 <div align="left"> Existencia </div>
                <input type="number" class="form-control input-lg" id="existencia" name="existencia" placeholder="Telefono" value="<?php echo $existencia?>" required>
              </div>
              <div class="form-group col-md-4">
                 <div align="left"> Mínimo </div>
                <input type="number" class="form-control input-lg" id="minimo" name="minimo" value="<?php echo $minimo?>" required>
              </div>
               
				<div class="form-group col-md-4">
				<div align="left"> Máximo </div>
				<input type="number" class="form-control input-lg" id="maximo" name="maximo" value="<?php echo $maximo?>" required>
				</div>
               
				 <div class="form-group col-md-4">
                 <div align="left"> Costo </div>
                <input type="number" class="form-control input-lg" id="costo" name="costo"  value="<?php echo $costo?>"required>
              </div>


              <div class="form-group col-md-4">
                 <div align="left"> Precio </div>
                <input type="number" class="form-control input-lg" id="precio" name="precio" value="<?php echo $precio?>" required>
              </div>


              <div class="form-group col-md-4">
                 <div align="left"> Puntos </div>
                <input type="number" class="form-control input-lg" id="puntos" name="puntos" value="<?php echo $puntos?>" step="any">
              </div>
              
           

            <div class="form-group col-md-12">
                <div align="left"> Notas </div>
                <textarea id="nota" name="nota"  class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"><?php echo $nota?></textarea>
             
              </div>
              
              <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="ID" value="<?php echo $ID?>">
              
              
              
             
              
              
                           
            <div class="form-group col-md-12">
              <center style="widt:100%"><button type="submit" name="btn-save" id="btn-save" class="btn btn-block btn-outline-info rounded-pill shadow" style="widt:100%">Actualizar</button></center>
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