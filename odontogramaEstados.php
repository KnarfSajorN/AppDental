   <?php 
   include 'header.php';
   include 'menu.php';

   $idcie10=0;
   $idcie10 = $_GET['idcie10'];

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




if(isset($_GET['editar_estado']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_estado'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 

  


      $queryList=mysqli_query($conn3,"SELECT * FROM  OdontogramaEstados where id = '$codigo'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $nombre = $rowMotorizado['nombre'];
            $color= $rowMotorizado['color'];
            $idE = $rowMotorizado['id'];
          
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
        <li><a href="#">Odontograma config</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Odontograma config</h4>
          <br>




           <form action="odontogramaEstados.php" method="POST">
            <div class="form-row">
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
          <div class="form-group col-md-8"> 
<!-- Fecha para verificar disponiblidad   -->  
Nombre      


  <?php 
            if ($idE >0 ) {
              
              echo '<input type="text" class="form-control input-lg" name="nombre"  id="nombre"   value="'.$nombre.'"    required>';
            }
            else 
            {
              echo '<input type="text" class="form-control input-lg" name="nombre"  id="nombre"   onChange="validar();"  required>';
            }
            ?>
              




    
    <div id="div-results"></div>

          </div>
    <div class="form-group col-md-4">
    Color
         
           <select id="color"   name="color" class="form-control select2" style="width: 100%;" >

   <option value="<?php echo  $color;?>" select> <?php echo $color?></option> 
                   
                    <?php
                        $queryList=mysqli_query($conn3,"SELECT * FROM colores");

                    
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32A=mysqli_fetch_array($queryList))
                                      {
                                          $cod= $row_recordset32A['codigo'];
                                          $nombre= $row_recordset32A['nombre'];
                     
                                         
                                          echo "<option value='$cod'> $nombre </option>";
                                      }

                    ?>

                
 
                </select>


          </div> 
               
              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              
              <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_odontogramaEstados"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_odontogramaEstados"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
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
                    <th class="text-center">Color </th>
                    <th class="text-center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 

                 $queryListA=mysqli_query($conn3,"SELECT * FROM OdontogramaEstados");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $color= $row_recordset32A['color'];


                      $queryListC=mysqli_query($conn3,"SELECT * FROM colores where codigo ='$color'");
                 

                  $nrowl=mysqli_num_rows($queryListC);

                  while($row_recordset=mysqli_fetch_array($queryListC))

                  {
                     
                      $nombreColor= $row_recordset['nombre'];
                    
                     }
                      
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$nombreColor.'</td>
                     
                      <td>

                      <form method>
                      <font color="#04CC05"> <a href="odontogramaEstados.php?borrar_estado='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-trash" title="Borrar" name="Borrar"></i>  </a></font> |
                      <font color="#04CC05"> <a href="odontogramaEstados.php?editar_estado='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">Nombre</th>
                    <th class="text-center">Color</th>
       
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

<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script type="text/javascript">


      function validar(){
// estas son las variables que enviamos

        var codigo = $("#codigo").val();
        var usuario_id = $("#usuario_id").val();
       

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_cie10_verificar.php",
            data: {codigo:codigo, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

      function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);
                 
            }
        });
    };



 
</script>