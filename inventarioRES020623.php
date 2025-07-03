<?php include 'header.php';
include 'menu.php';?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
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
        <h4 class="card-title">  Registro de inventario   </h4>
        <br>
        <form action="inventarioG.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
          <div class="form-row">


            <div class="form-group col-md-12">
              <div align="left"> Descripción </div>
              
              <input type="text" class="form-control input-lg" id="descripcion" name="descripcion" placeholder="Descripcion"  required>
            </div>

            <div class="form-group col-md-4">
             <div align="left">  Referencia </div>
             <!-- <input type="text" class="form-control input-lg" id="referencia" name="referencia" placeholder="referencia" required> -->
             <div class="input-group">
              <span class="input-group-addon "><li class="fa fa-barcode"></li></span>
              <input type="text" class="form-control input-lg" placeholder="Codigo de barras" id="referencia" name="referencia" onmouseover="this.focus();"  >
            </div>
          </div>

          <div class="form-group col-md-4">
           <div align="left">  Fecha de Vencimiento </div>
           <input type="date" class="form-control input-lg" id="fecha_vencimiento" name="fecha_vencimiento" required>
         </div>

         <div class="form-group col-md-4">
           <div align="left">  Tipo</div>

           <select id="tipo" name="tipo" class="form-control select2" style="width: 100%;" required="required">
            <option value="" selected="selected">Seleccione </option>
            <?php
            $contador= 0 ;
            $queryList=mysqli_query($conn3,"SELECT * FROM scategoria WHERE usuario_id = $ID order by descripcion");
            $nrowl=mysqli_num_rows($queryList);
            while($row_recordset32=mysqli_fetch_array($queryList))
            {
              $id      = $row_recordset32['id'];
              $descripcion      = $row_recordset32['descripcion'];
              $contador++;

              echo "<option value='$id'> $descripcion</option>";
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
            <div class="form-group col-md-4">
              <div align="left"> Sucursal</div>

              <select id="sucursal" name="sucursal" class="form-control select2" style="width: 100%;" required="required">
                
                <?php
                $sucursal1 = $_SESSION['sucursal'];
                if($sucursal1 == 0){
                  echo '<option value="" selected="selected">Seleccione </option>';
                  echo '<option value="0">Ninguna </option>';
                }else{
                  echo "<option value='$sucursal1' selected='selected'> ".funcionMaster($sucursal1,'id','descripcion','sucursales')."</option>";
                  echo "<option value='0'> Todas</option>";
                }
                
                $queryList = mysqli_query($conn3, "SELECT * FROM sucursales  order by descripcion");
                $nrowl = mysqli_num_rows($queryList);
                while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                  $ids      = $row_recordset32['id'];
                  $descripcions      = $row_recordset32['descripcion'];
                

                  echo "<option value='$ids'> $descripcions</option>";
                  
                }

                ?>
              </select>
              <?php
              if ($_SESSION['sucursal'] == 0) {
                echo '<h6> <font color="red"> Para registrar el producto puede seleccionar una sucursal </font></h6>
            ';
              }
              ?>
            </div>
            <br>
        <div class="form-group col-md-12">
          <hr>	
        </div>

        <div class="form-group col-md-4">
         <div align="left">Existencia</div>
         <input type="number" class="form-control input-lg" id="existencia" name="existencia" value="0" >
       </div>
       <div class="form-group col-md-4">
        <div align="left"> Minimo</div>
        <input type="number" class="form-control input-lg" id="minimo" name="minimo" value="0">
      </div>

      <div class="form-group col-md-4">
        <div align="left"> Maximo</div>
        <input type="number" class="form-control input-lg" id="maximo" name="maximo" value="0" >
      </div>

      <div class="form-group col-md-6">
       <div align="left">  Costo </div>
       <input type="number" class="form-control input-lg" id="costo" name="costo"  step="0.01" value="0">
     </div>


     <div class="form-group col-md-6">
       <div align="left">   Precio </div>
       <input type="number" class="form-control input-lg" id="precio" name="precio"  step="0.01" value="0">
     </div>



     <div class="form-group col-md-12">
      <div align="left">Notas</div>
    </div>
    <!-- /.box-header -->
    <div class="box-body pad">

      <textarea id="nota" name="nota"  class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

    </div>


    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">








    <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>

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
<!-- <script type="text/javascript">
  console.log('alo');
    document.getElementById('referencia').onblur = function (event) { 
        var blurEl = this; 
        setTimeout(function() {
            blurEl.focus()
        }, 10);
    };
</script> -->