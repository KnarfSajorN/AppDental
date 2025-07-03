<?php 
   include 'header.php';
   include 'menu.php';

   $idempresa=0;
   $idempresa = $_GET['idempresa'];

   $IDconfig = $_SESSION['ID'];



   $msg = $_GET['msg'];
if ($msg == 1) 
{
$respuesta = ' 
          <div class="callout callout-info">
          <h4>Registrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 2) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código duplicado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 3) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código borrado</h4>
           <p></p>
        </div>';

}
elseif ($msg == 4) 
{
  
  $respuesta = ' 
          <div class="callout callout-danger">
          <h4>Código usado no es posible borrarlo</h4>
           <p></p>
        </div>';

}
elseif ($msg == 5) 
{
  
  $respuesta = ' 
          <div class="callout callout-info">
          <h4>Código actualizado </h4>
           <p></p>
        </div>';

}



 
if(isset($_GET['editar_grupo']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_grupo'])));


  


      $queryList=mysqli_query($conn3,"SELECT * FROM   gruposAtencion  where id = '$codigo' ");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $idE = $rowMotorizado['ID'];
            $nombreE = $rowMotorizado['nombre'];
            $descripcionE = $rowMotorizado['descripcion'];
           
 
        }


}
 

      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración  </a></li>
        <li><a href="#">Lista Grupos de Atención</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Grupos de Atención</h4>
          <br>
 
          <form action="empresa" method="POST">
          <div class="form-row">
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
         

  <?php 
            if ($idE >0 ) 
            {
               echo '<input type="hidden" class="form-control input-lg" name="idE"  id="idE"   value="'.$idE.'"    required>';
            }
            
            ?>
   
 
 
            <div class="form-group col-md-12"> 
            Nombre de la categoria o grupo de atención     
              <input type="text"  class="form-control input-lg" name="nombre"  id="nombre"  value="<?php echo $nombreE?>" required  maxlength="100" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
            <div class="form-group col-md-12"> 
            Descripción(Opcional) 
            
              <input type="text"  class="form-control input-lg" name="descripcion"  id="descripcion"  value="<?php echo $descripcionE?>"  maxlength="300" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onblur="onRutBlur(this);">

             

            </div>

           
            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
            
            <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_grupo"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_grupo"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
          </form>
        </div>
      <br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                   
                    <th class="text-center">   </th>
                    <th class="text-center">   </th>
                </tr>
                </thead>
                <tbody>
                  <?php
                     
                $ID = $_SESSION['ID'];

                $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  gruposAtencion  order by nombre");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['ID'];
                      $nombre= $row_recordset32A['nombre'];
                      $desc= $row_recordset32A['descripcion'];
                

                 
 
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$desc.'</td>
                     
                    
                      <td> 
                      <font color="#04CC05"> <a href="gruposAtencion.php?editar_grupo='.$id.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font></td>
                      <td> 
                      <font color="#04CC05"> <a href="confirmarEliminarGrupo.php?grupo='.$id.'"> <i class="fa fa-trash" title="Eliminar" name="Virtual"></i>  </a></font></td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    
                   <th class="text-center">Nombre</th>
                    <th class="text-center">Descripción</th>
                   
                    <th class="text-center">   </th>
                    <th class="text-center">   </th>


                </tr>
                </tfoot>
              </table>
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
<!-- Funciona para consultar disponibilidad -->

 




<script type="text/javascript">
      function onRutBlur(){
// estas son las variables que enviamos
         var descripcion = $("#descripcion").val();
        var descripcion = $("#descripcion").val();
      
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_verificar_duplicados_ve.php",
            data: {descripcion:descripcion, usuario_id:usuario_id, descripcion:descripcion},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

  </script>