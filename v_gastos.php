<?php 
   include 'header.php';
   include 'menu.php';

   $idgastos=0;
   $idgastos = $_GET['idgastos'];

   $IDconfig = $_SESSION['ID'];
   
   
if ($clienteId>0) 
{
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



 
if(isset($_GET['editar_gastos']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_gastos'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
$gastos = $usuario_id.'gastos';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM   v_gastos  where id = '$codigo' and usuario_id = $usuario_id");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $idE = $rowMotorizado['id'];
            $nombreE = $rowMotorizado['nombre'];
            $siglasE = $rowMotorizado['siglas'];
            $descripcionE = $rowMotorizado['descripcion'];
            $periodoE = $rowMotorizado['periodo'];

            $p1E = $rowMotorizado['p1'];
            $p2E = $rowMotorizado['p2'];
            $p3E = $rowMotorizado['p3'];
            $p4E = $rowMotorizado['p4'];
            $p5E = $rowMotorizado['p5'];
            $p6E = $rowMotorizado['p6'];
            
            $edadMinimaE = $rowMotorizado['edadMinima'];
            $edadMaximoE = $rowMotorizado['edadMaximo'];
            $cuantasE = $rowMotorizado['cuantas'];
            
 
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
        <li><a href="#">Lista gastos</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Lista gastos</h4>
          <br>




           <form action="registrosGastos" method="POST">
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
   
 
 
            <div class="form-group col-md-6"> 
            Descripción       
              <input type="text"  class="form-control input-lg" name="descripcion"  id="descripcion"  value="<?php echo $nombreE?>" required> 
            </div>
            
            <div class="form-group col-md-3"> 
            Fecha       
              <input type="date"  class="form-control input-lg"  name="fecha"  id="fecha"  value="<?php echo date("Y-m-d")?>" required> 
            </div>
           
            <div class="form-group col-md-3"> 
              Monto     
              <input type="number" min="1"   class="form-control input-lg" name="valor"  id="valor"  value="<?php echo $p1E?>"   > 
            </div>
              


            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
            
            <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_v_gastos"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_v_gastos"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
              

          </form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
 
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                    
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  v_gastos  where usuario_id = '$ID' order by fecha");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      
                      $fecha = $row_recordset32A['fecha'];
                      $descripcion= $row_recordset32A['descripcion'];
                      $valor = $row_recordset32A['valor'];
                      

                      echo '      
                      <tr>
                      <td> '.$fecha.'</td>
                      <td> '.$descripcion.'</td>
                      <td> '.$valor.'</td>
                       
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                     <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Monto</th>

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

 