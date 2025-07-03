<?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
 
Publicar Congreso      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li> 
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
      
<?php 
       
        $usuarioId = $_SESSION['ID']; 
        $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


        $queryList=mysqli_query($conn3,"SELECT * FROM  c_catalogo where idUsuario=$usuarioId");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $ID             =$rowMotorizado['idUsuario'];


            $nombre         =$rowMotorizado['nombre'];
            $descripcion    =$rowMotorizado['descripcion'];
            $valorconsulta  =$rowMotorizado['valorconsulta'];
            $profesion      =$rowMotorizado['profesion'];
            $categoria      =$rowMotorizado['categoria'];
            $pais           =$rowMotorizado['pais'];
            $activo         =$rowMotorizado['activo'];
            $foto           =$rowMotorizado['foto'];



          
        $direccionWeb           =$rowMotorizado['direccionWeb'];
        $titulo           =$rowMotorizado['titulo'];
        $proySer           =$rowMotorizado['proySer'];
        $direccion           =$rowMotorizado['direccion'];
        $whatsapp           =$rowMotorizado['whatsapp'];
        $f           =$rowMotorizado['f'];
        $t           =$rowMotorizado['t'];
        $i           =$rowMotorizado['i'];
        $l           =$rowMotorizado['l'];
        $y           =$rowMotorizado['y'];
        $telefonos           =$rowMotorizado['telefonos'];
        $anosExperiencia           =$rowMotorizado['anosExperiencia'];




        }



                $queryList2=mysqli_query($conn3,"SELECT * FROM  usuarios where ID=$usuarioId");
        $nrowl=mysqli_num_rows($queryList2);
        while($rowMotorizado2=mysqli_fetch_array($queryList2))
        {
            $USUARIO             =$rowMotorizado2['USUARIO'];

 
        }



if ($activo == 0) {
  $activo = 'INACTIVO';
}
elseif ($activo == 1) {
 $activo = 'ACTIVO';
}
        


        ?>






 <div class="card-body">
           <div class="form-row">
          <h4 class="card-title">    </h4>
          <h6 class="card-subtitle mb-2 text-muted"></h6>
                                                                                          
            
              <div class="col-md-6">

                    <?php if ($_GET['mensaje'] == 1): ?>
                  <h1> Congreso enviado </h1>
                <?php endif ?>



              </div>

              <div class="col-md-6">
              </div>

               
            </div>
 
               <div class="col-md-12">
         
            
            

 

<br>
<br>
 

<div class="tab-pane" id="Consultas5" >
   
      <form action="c_congresos_enviar.php" method="POST" enctype="multipart/form-data">
 



      <input type="hidden" class="form-control input-lg" name="nombre" value="<?php echo $nombre?>">
      <input type="hidden" class="form-control input-lg" name="ID" value="<?php echo $ID?>">
      <input type="hidden" class="form-control input-lg" name="email" value="<?php echo $USUARIO?>">
     <label> Titulo</label>
      <input type="text" class="form-control input-lg" name="titulo" >
    
          <div class="form-row">


<label> 


Congreso

 </label>




 <textarea  id="editor1" name="contenido" rows="110" cols="180"></textarea>




 



          <button type="submit" class="btn btn-block btn-primary btn-sm" ><h4> Enviar </h4></button>

          </div>

      </form>

</div>
            
 

 
              <!-- /.tab-pane -->
                      
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
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


      function disponibilidad(){
// estas son las variables que enviamos

        var direccionWeb = $("#direccionWeb").val();
        
// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "c_ajax_disponibilidad.php",
            data: {direccionWeb:direccionWeb},
            success: function(response) {
                $('#div-disponibilidad').html(response);
                 
            }
        });
    };


 



</script>