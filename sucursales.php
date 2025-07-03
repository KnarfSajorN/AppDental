   <?php 
   include 'header.php';
   include 'menu.php';

   $idsucursales=0;
   $idsucursales = $_GET['idsucursales'];

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




if(isset($_GET['editar_sucursales']))
{

  

$id     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_sucursales'])));

 


        // $queryList=mysqli_query($conn3,"SELECT * FROM sucursales where id = '$id' and idUsuario = $IDconfig");
        $queryList=mysqli_query($conn3,"SELECT * FROM sucursales where id = '$id' and ID_principal='{$_SESSION['ID_principal']}'");
        $nrowl=mysqli_num_rows($queryList);
        while($rowMotorizado=mysqli_fetch_array($queryList))
        {
            $descripcionE = $rowMotorizado['descripcion'];
            $idE = $rowMotorizado['id'];
        }


}


      ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
    
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="config"><i class="fa fa-gears"></i> Perfil / Configuración  </a></li>
        <li><a href="#">Lista sucursales</a></li>
        

      </ol>
    </section> -->

    <!-- Main content -->
    <section class="content">
      <div class="">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Lista sucursales</h4>
          <br>




           <form action="sucursales" method="POST">
            <div class="form-row">
            <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
          
 

  <?php 
            if ($idE >0 ) {
              
              echo '<input type="hidden" class="form-control input-lg" name="codigo"  id="codigo"   value="'.$codigoE.'"    required>';
            }
            
            ?>
              




    
    
          </div>
    <div class="form-group col-md-12">
      Descripción 
          <input type="text"  class="form-control input-lg"  name="descripcion" value="<?php echo $descripcionE?>" id="descripcion" required>
           <div id="div-resultsHora"></div>
          </div> 
               
              <input type="hidden" name="idUsuario" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="ID_principal" value="<?=$_SESSION['ID_principal']?>">
              
              <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="actualizar_sucursales"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="registro_sucursales"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
              

          </form>
<br>
<br>


        </div>

            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                     
                    <th class="text-center">Descripción </th>
                    <th class="text-center">   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  sucursales where 1=1 and ID_principal='{$_SESSION['ID_principal']}' order by descripcion");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                     
                      $descripcion= $row_recordset32A['descripcion'];
                     
                      
                      echo '      
                      <tr>
                      
                      <td> '.$descripcion.'</td>
                     
                      <td>

                      
                      <font color="#04CC05"> <a href="sucursales?editar_sucursales='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';

                  }
?>


  
                </tbody>
                <tfoot>
                <tr>
                     
                    <th class="text-center">Descripción </th>
       
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
