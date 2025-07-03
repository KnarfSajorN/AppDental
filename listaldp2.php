   <?php 
   include 'header.php';
   include 'menu.php';

   $idcups=0;
   $idcups = $_GET['idcups'];

   $IDconfig = $_SESSION['ID'];
 

   
if ($clienteId>0) {
  
include 'funciones/conn3.php';

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
           

           }


//     $_SESSION['NOMBRE_USUARIO']

}


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




if(isset($_GET['editar_cups']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_cups'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
$cups = $usuario_id.'cups';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM  $cups where codigo = '$codigo'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $idE = $rowMotorizado['id'];
            $codigoE = $rowMotorizado['codigo'];
            $descripcionE = $rowMotorizado['descripcion'];
            $nivelE = $rowMotorizado['nivel'];

            $aclaracionE = $rowMotorizado['aclaracion'];
            
 
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
        <li><a href="#">Lista CUPS</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Lista CUPS</h4>
          <br>




           <form action="lista2" method="POST">
            <div class="form-row">
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
          <div class="form-group col-md-3"> 
<!-- Fecha para verificar disponiblidad   -->  
Código      


  <?php 
            if ($idE >0 ) {
              echo '<input type="text" disabled class="form-control input-lg" name="codigo"  id="codigo"   value="'.$codigoE.'"    required>';
              echo '<input type="hidden" class="form-control input-lg" name="codigo"  id="codigo"   value="'.$codigoE.'"    required>';
            }
            else 
            {
              echo '<input type="text" class="form-control input-lg" name="codigo"  id="codigo"   onChange="validar();"  required>';
            }
            ?>
           
    <div id="div-results"></div>

          </div>
    <div class="form-group col-md-9">
      Descripcion  
          <input type="text"  class="form-control input-lg"  name="descripcion" value="<?php echo $descripcionE?>" id="descripcion" required>
           <div id="div-resultsHora"></div>
    </div> 






       
<div class="form-group col-md-6"> 
nivel      
  <input type="number"  class="form-control input-lg" name="nivel"  id="nivel"  value="<?php echo $nivelE?>"   required> 
</div>
<div class="form-group col-md-6"> 
Aclaración      
  <input type="number"  class="form-control input-lg" name="aclaracion"  id="aclaracion"  value="<?php echo $aclaracionE?>" > 
</div>
 


 


              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              
              <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_cups"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_cups"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
              

          </form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Código</th>
                     
                    <th class="text-center">Descripción  </th>
                    <th class="text-center">Nivel</th>
                    
                    
                    <th class="text-center">   </th>
                    <th class="text-center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
$cups = $ID.'cups';
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  $cups  order by codigo");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $codigo= $row_recordset32A['codigo'];
                      $descripcion= $row_recordset32A['descripcion'];
                      $nivel= $row_recordset32A['nivel'];
         
                      $aclaracion = $row_recordset32A['aclaracion'];

                     

                      
                      echo '      
                      <tr>
                      <td> '.$codigo.'</td>
                     
                      <td> '.$descripcion.'</td>
                      <td> '.$nivel.'</td>
                   
                     
                      

                      <form method>
                      <td> <font color="#04CC05"> <a href="lista2?borrar_cups='.$codigo.'&usuario_id='.$ID.'"> <i class="fa fa-trash" title="Borrar" name="Borrar"></i>  </a></font> </td>
                      <td> <font color="#04CC05"> <a href="lista2?editar_cups='.$codigo.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    
                  <th class="text-center">Código</th>
                     
                    <th class="text-center">Descripción  </th>
                    <th class="text-center">Nivel</th>
                  
                    
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


      function validar(){
// estas son las variables que enviamos

        var codigo = $("#codigo").val();
        var usuario_id = $("#usuario_id").val();
       

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_cups_verificar.php",
            data: {codigo:codigo, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

 

 
</script>