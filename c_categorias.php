   <?php 

   include 'header.php';
   include 'menu.php';
   include 'funciones/conn3.php';

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




if(isset($_GET['editar_cie10']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_cie10'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
$cie10 = $usuario_id.'cie10';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM  $cie10 where codigo = '$codigo'");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $codigoE = $rowMotorizado['codigo'];
            $descripcionE = $rowMotorizado['descripcion'];
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
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Categorias </h4>
          <br>




           <form action="cie10" method="POST">
            <div class="form-row">
 <div class="col-md-12">
<?php echo $respuesta;?>
  </div>
 
      

 <div class="form-group col-md-12">
      Descripción 
          <input type="text"  class="form-control input-lg"  name="descripcion" id="descripcion" required>
         
          </div> 
               
              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              
              
            </div>

          <center>
    <button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_categoria"> <h4> <strong>  Guardar  </strong> </h4> </button></center>
              

          </form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

                    <th class="text-center">Código</th>
                    <th class="text-center">Descripción </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  c_categoria  order by id");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $descripcion= $row_recordset32A['descripcion'];
                   
                     
                      
                      echo '      
                      <tr>
                      <td> '.$id.'</td>
                      <td> '.$descripcion.'</td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    <th class="text-center">Código</th>
                    <th class="text-center">Descripción </th>
       
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

 