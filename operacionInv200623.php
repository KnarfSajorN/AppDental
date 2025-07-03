  <?php 
   include 'header.php';
   include 'menu.php';
    $ususario_id = $_SESSION['ID'];
    ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        Salida de inventarios
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Salida de inventarios</a></li>
        

      </ol>
    </section>
 
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
     

     <!-- SELECT2 EXAMPLE -->
      <div class="box box-default">
        <div class="box-header with-border">
          <h3 class="box-title"> </h3>
 
        </div>
        <!-- /.box-header -->
        <div class="box-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">

                <form method="POST" action="SalidadeInventario.php"> 



                 <div class="col-md-11">
<!--
                <label>Cliente o beneficiario </label> <br>
                RUT | Nombre 
                <select id="tercero" name="tercero" class="form-control select2" style="width: 100%;" required="required">
                    <option value="" selected="selected">Seleccione proveedor</option>
                    <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM sclientes WHERE usuario_id = $ususario_id order by nombre");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $rut     = $row_recordset32['rut'];
                                          $nombre  = $row_recordset32['nombre'];
                                          $id      = $row_recordset32['id'];
                                          echo "<option value='$id'>$rut | $nombre  </option>";
                                      }

                    ?>
 
                </select>
                </div>
                  <div class="col-md-1">
                    <br>
                    <br>
                    <font color="#04CC05" size="6"> <a href="<?php echo $Base?>clientes"> <i class="fa fa-plus-circle" title="Agregar nuevo"></i>  </a></font> 
                  </div>
-->

  <div class="col-md-12">
  <hr>  
  </div>





                 <div class="col-md-8">

                <label>Producto</label> <br>
                Referencia | Descripcion | Existencia
                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required">
                    <option value="" selected="selected">Seleccione producto</option>
                    <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios WHERE usuario_id = $ususario_id order by descripcion");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $descripcion     = $row_recordset32['descripcion'];
                                          $existencia      = $row_recordset32['existencia'];
                                          $cliente_id      = $row_recordset32['cliente_id'];
                                          $referencia      = $row_recordset32['referencia'];
                                          $ID              = $row_recordset32['ID'];

                                          
                                          echo "<option value='$ID'>$referencia | $descripcion | $existencia</option>";
                                      }

                    ?>
 
                </select>
</div>
                 <div class="form-group col-md-2">
                  <br>

                 <div align="left">Cantidad</div>
                <input type="number" min="1" value="1" class="form-control input-lg" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="ususario_id" value="<?php echo  $ususario_id?>" required>
              </div>

 <div class="form-group col-md-2">
                  <br>
                  <br>
<a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>
                
              </div>


                <br>

                <div class="form-group col-md-12" id="div-results"></div>
                <br>
                <br>

                 <button class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Totalizar </strong></h4></button>

                </form>
 
   

              </div>
              <!-- /.form-group -->
             
            </div>


            
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
 
  
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>
 
 
<script type="text/javascript">
 
   function agergarItem(){

        // estas son las variables que enviamos

        var codigoProd = $("#codigoProd").val();
        var cantidad = $("#cantidad").val();
        
        
        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_agregarItem.php",
            data: {codigoProd:codigoProd, cantidad:cantidad, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);

        // aqui enviamos el mensaje por medio de un arreglo     
                      

                 
            }
        });
    };


      function eliminarItem()
      {
 
// estas son las variables que enviamos

        var idOper = $("#idOper").val();
     
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "eliminarItem.php",
            data: {idOper:idOper, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);

// aqui enviamos el mensaje por medio de un arreglo     
                      
 
                 
            }
        });
    };

   




    function listaItem(){

        // estas son las variables que enviamos

        var usuario_id = $("#usuario_id").val();

        // aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);

        // aqui enviamos el mensaje por medio de un arreglo     
                      

                 
            }
        });
    };
    window.onload=listaItem;   
 
  
</script>