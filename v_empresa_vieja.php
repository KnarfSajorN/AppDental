<?php 
   include 'header.php';
   include 'menu.php';

   $idempresa=0;
   $idempresa = $_GET['idempresa'];

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



 
if(isset($_GET['editar_empresa']))
{

  

$codigo     = mysql_real_escape_string(htmlspecialchars(trim($_GET['editar_empresa'])));

$usuario_id = mysql_real_escape_string(htmlspecialchars(trim($_GET['usuario_id'])));
 
$empresa = $usuario_id.'empresa';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM   v_clienteE where id = '$codigo' and usuario_id = $usuario_id");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
      
            $idE = $rowMotorizado['id'];
            $nombreE = $rowMotorizado['nombre'];
            $nitE = $rowMotorizado['nit'];
            $precioE = $rowMotorizado['precio'];

            $direccionE = $rowMotorizado['direccion'];
            $telefonoE = $rowMotorizado['telefono'];
            $ciudadE = $rowMotorizado['ciudad'];
            $correoE = $rowMotorizado['correo'];
            $responsableE = $rowMotorizado['responsable'];
            $celularResponsableE = $rowMotorizado['celularResponsable'];
 
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
        <li><a href="#">Lista empresa</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
 
          <div class="card-body">
          <h4 class="card-title">Empresa</h4>
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
   
 
 
            <div class="form-group col-md-6"> 
            Nombre      
              <input type="text"  class="form-control input-lg" name="nombre"  id="nombre"  value="<?php echo $nombreE?>" required  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
            <div class="form-group col-md-6"> 
            NIT  
            <input type="hidden" id="tipoVerificacion" value="1" name="tipoVerificacion">    
              <input type="text"  class="form-control input-lg" name="nit"  id="nit"  value="<?php echo $nitE?>" required  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onblur="onRutBlur(this);">

              <div id="div-results"></div> 

            </div>

            <div class="form-group col-md-6"> 
            Precio   
            
                <select  id="precio" name="precio" class="form-control input-lg select" style="width: 100%;" required="required">
                  <option value="<?php echo $precioE?>" selected="selected">Precio <?php echo $precioE?></option>


                  <option value="1">Precio 1</option>
                  <option value="2">Precio 2</option>
                  <option value="3">Precio 3</option>
                  <option value="4">Precio 4</option>
                  <option value="5">Precio 5</option>
                  <option value="6">Precio 6</option>
                  
                </select>

            

            </div>
            <div class="form-group col-md-6"> 
            Dirección      
              <input type="text"  class="form-control input-lg" name="direccion"  id="direccion"  value="<?php echo $direccionE?>" required maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
 

            <div class="form-group col-md-6"> 
            Teléfono      
              <input type="text"  class="form-control input-lg" name="telefono"  id="telefono"  value="<?php echo $telefonoE?>"   maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
            <div class="form-group col-md-6"> 
            Correo      
              <input type="email"  class="form-control input-lg" name="correo"  id="correo"  value="<?php echo $correoE?>"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
 

            <div class="form-group col-md-6"> 
            Responsable      
              <input type="text"  class="form-control input-lg" name="responsable"  id="responsable"  value="<?php echo $responsableE?>"    maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
            <div class="form-group col-md-6"> 
            Celular Responsable      
              <input type="text"  class="form-control input-lg" name="celularResponsable"  id="celularResponsable"  value="<?php echo $celularResponsableE?>"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
            </div>
 
             <div class="form-group col-md-6"> 
            Ciudad      
              <input type="text"  class="form-control input-lg" name="ciudad"  id="ciudad"  value="<?php echo $ciudadE?>"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
            </div>
  
            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
            
            <input  type="hidden" name="id" value="<?php echo $idE?>">
              
            </div>

          <center>
            <?php 
            if ($idE >0 ) {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="actualizar_empresa"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-primary btn-sm" name="registro_empresa"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
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
                    <th class="text-center">NIT</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                    <th class="text-center">PP Fac. #</th>
                    <th class="text-center">PP Fac. $</th>
                    <th class="text-center">   </th>
                </tr>
                </thead>
                <tbody>
                  <?php
                     
                $ID = $_SESSION['ID'];

                $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  v_clienteE  where usuario_id = '$ID' order by nombre");
                 

                  $nrowl=mysqli_num_rows($queryListA);

                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $id= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $nit= $row_recordset32A['nit'];
                      $telefono= $row_recordset32A['telefono'];
                      $correo = $row_recordset32A['correo'];

                  $queryppFac=mysqli_query($conn3,"SELECT count(id) as ppFac, sum(precio) as totalFac FROM  v_historiaClinica3  where  usuario_id = $ID and  clienteE_id = $id and factura_id = 0  and aplicada = 1");
                  $nrowlppFac=mysqli_num_rows($queryppFac);
                  while($row_ppFac=mysqli_fetch_array($queryppFac))
                  { 
                    $ppFac    = $row_ppFac['ppFac'];
                    $totalFac = $row_ppFac['totalFac'];
                  }
 
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$nit.'</td>
                      <td> '.$telefono.'</td>
                      <td> '.$correo.'</td>
                      <td align="right"> '.$ppFac.'</td>
                      <td align="right"> '.number_format($totalFac, 0, ',','.').'</td>
                    
                      <td> 
                      <font color="#04CC05"> <a href="empresa?editar_empresa='.$id.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i>  </a></font>';
                      if ($ppFac > 0) 
                      {
                      echo ' | <font color="red"> <a href="v_guardarDetalleFactura.php?id_cliente='.$id.'&id_usuario='.$ID.'"> <i class="fa fa-money" title="Facturar" name="Facturar"></i>  </a></font>';
                      }
 
                      echo '</td>
                      </tr>';

                  }


 ?>


  
                </tbody>
                <tfoot>
                <tr>
                    
                    <th class="text-center">Nombre</th>
                    <th class="text-center">NIT</th>
                    <th class="text-center">Teléfono</th>
                    <th class="text-center">Correo</th>
                   
                    <th class="text-center">PP Fac. #</th>
                    <th class="text-center">PP Fac. $</th>

                   
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
         var nit = $("#nit").val();
        var tipoVerificacion = $("#tipoVerificacion").val();
      
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "ajax_verificar_duplicados_ve.php",
            data: {nit:nit, usuario_id:usuario_id, tipoVerificacion:tipoVerificacion},
            success: function(response) {
                $('#div-results').html(response);
                 
            }
        });
    };

  </script>