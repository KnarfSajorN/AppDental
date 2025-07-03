 <?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    
    <section class="content-header">
      <h1>
        Busca paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Busca paciente</a></li>
        

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
                
                  <form method="GET" action="Historia_Clinica.php"> 
                

                <label>Pacientes</label>
                <select id="clienteId" name="clienteId" class="form-control select2" style="width: 100%;" required="required" onChange="verHistoria();" >
                    <option value="" selected="selected">Seleccione un Paciente</option>
                    <?php
 
                            $queryList=mysqli_query($conn3,"SELECT * FROM cliente WHERE usuario_id = $ID order by nombre_cliente");
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                    $cliente_id      = $row_recordset32['cliente_id'];
                                    $CODI_CLIENTE      = $row_recordset32['CODI_CLIENTE'];
                                    echo "<option value='$cliente_id'> $CODI_CLIENTE - $nombre_cliente</option>";

                            }

                    ?>
 
                </select>
                <br>
                <div id="div-results"></div>
                <br>
                <br>

                <button class="btn btn-block btn-primary btn-sm"><h4> <strong>   <i class="fa fa-glyphicon glyphicon-plus"></i>  Agregar consulta </strong></h4></button>

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


      function verHistoria(){
// estas son las variables que enviamos

        var clienteId = $("#clienteId").val();
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "consultarCliente.php",
            data: {clienteId:clienteId},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      


$(document).ready(function() {

 //   $('#btn1').on('click', function(){

  




    $('#btn2').on('click', function(){
        $.ajax({
            type: "POST",
            url: "adios.php",
            success: function(response) {
                $('#div-results').html(response);
            }
        });
    });




});
</script>