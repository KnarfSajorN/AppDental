<?php 
   include 'header.php';
   include 'menu.php';

   $idservicios=0;
   $idservicios = $_GET['idservicios'];

   $IDconfig = $_SESSION['ID'];
 

   
if ($clienteId>0) 
{
/*
$host='localhost';
$userdb='medicaso_rootBase';
$pass2='5qA?o]t6d-h25qA?o]t6d-h2';
$DB='medicaso_ms_ec448';
 
 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
*/
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



 
if(isset($_GET['editar_servicios']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_servicios'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
$servicios = $usuario_id.'servicios';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM   v_servicios  where id = '$codigo' and usuario_id = $usuario_id");

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
        <li><a href="#">Lista servicios</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Lista servicios</h4>
          <br>




           <form action="servicios" method="POST">
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
   
 
 
            <div class="form-group col-md-5"> 
            Nombre      
              <input type="text"  class="form-control input-lg" name="nombre"  id="nombre"  value="<?php echo $nombreE?>" required> 
            </div>
             <div class="form-group col-md-2"> 
            Siglas      
              <input type="text"  class="form-control input-lg" name="siglas"  id="siglas"  value="<?php echo $siglasE?>" required> 
            </div>
            <div class="form-group col-md-5"> 
            Descripción      
              <input type="text"  class="form-control input-lg" name="descripcion"  id="descripcion"  value="<?php echo $descripcionE?>" required> 
            </div>
            
            <div class="form-group col-md-3"> 
            Periodo   <font color="red">  (En días mínimo 1) </font>   
              <input type="number" min="1" class="form-control input-lg" name="periodo"  id="periodo"  value="<?php echo $periodoE?>" required> 
            </div>

            <div class="form-group col-md-3"> 
            Cuantas  <font color="red">  (Cuanta veces se aplica mínimo 1) </font>    
              <input type="number" min="1"  class="form-control input-lg" name="cuantas"  id="cuantas"  value="<?php echo $cuantasE?>" > 
            </div>
 


            <div class="form-group col-md-3"> 
            Edad Mínima <font color="red"> (En años, mínimo 1) </font>    
              <input type="number" min="1"  class="form-control input-lg" name="edadMinima"  id="edadMinima"  value="<?php echo $edadMinimaE?>" required> 
            </div>
 

            <div class="form-group col-md-3"> 
            Edad Máximo <font color="red"> (En años)</font>     
              <input type="number" min="1"  class="form-control input-lg" name="edadMaximo"  id="edadMaximo"  value="<?php echo $edadMaximoE?>"   > 
            </div>
            
            
            <div class="form-group col-md-2"> 
              Precio 1     
              <input type="text" min="0"   class="form-control input-lg" name="p1"  id="p1"  value="<?php echo $p1E?>"   > 
            </div>
            <div class="form-group col-md-2"> 
              Precio 2     
              <input type="text" min="0"   class="form-control input-lg" name="p2"  id="p2"  value="<?php echo $p2E?>"   > 
            </div>
            <div class="form-group col-md-2"> 
              Precio 3     
              <input type="text" min="0"   class="form-control input-lg" name="p3"  id="p3"  value="<?php echo $p3E?>"   > 
            </div>
            <div class="form-group col-md-2"> 
              Precio 4     
              <input type="text" min="0"   class="form-control input-lg" name="p4"  id="p4"  value="<?php echo $p4E?>"   > 
            </div>
            <div class="form-group col-md-2"> 
              Precio 5     
              <input type="text" min="0"   class="form-control input-lg" name="p5"  id="p5"  value="<?php echo $p5E?>"   > 
            </div>
            <div class="form-group col-md-2"> 
              Precio 6     
              <input type="text" min="0"   class="form-control input-lg" name="p6"  id="p6"  value="<?php echo $p6E?>"   > 
            </div>
            
 

 
            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
            
            <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_v_servicios"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_v_servicios"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
            }
            ?>
              

          </form>


        </div>


<br>
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>

            
                    <th>Nombre</th>
                    <th>Periodo</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Cuantas</th>
                    <th>Precio 1</th>
                    <th>Precio 2</th>
                    <th>Precio 3</th>
                    <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php
                     
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  v_servicios  where usuario_id = '$ID' order by nombre");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre = $row_recordset32A['nombre'];
                      $periodo= $row_recordset32A['periodo'];
                      $edadMinima = $row_recordset32A['edadMinima'];
                      $edadMaximo = $row_recordset32A['edadMaximo'];
                      $cuantas = $row_recordset32A['cuantas'];
                      $p1 = $row_recordset32A['p1'];
                      $p2 = $row_recordset32A['p2'];
                      $p3 = $row_recordset32A['p3'];
 


                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$periodo.'</td>
                      <td> '.$edadMinima.'</td>
                      <td> '.$edadMaximo.'</td>
                      <td> '.$cuantas.'</td>
                      <td> '.$p1.'</td>
                      <td> '.$p2.'</td>
                      <td> '.$p3.'</td>
                    
                      <td> <font color="#04CC05"> <a href="serviciosVacunar?editar_servicios='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>
                      </td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    <th>Nombre</th>
                    <th>Periodo</th>
                    <th>Desde</th>
                    <th>Hasta</th>
                    <th>Cuantas</th>
                    <th>Precio 1</th>
                    <th>Precio 2</th>
                    <th>Precio 3</th>
                    <th>   </th>

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

 