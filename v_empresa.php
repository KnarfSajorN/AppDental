<?php 
   include 'header.php';
   include 'menu.php';

   $idempresa=0;
   $idempresa = $_POST['idempresa'];

   $IDconfig = $_SESSION['ID'];
 
if ($clienteId>0) 
{
        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        // $nrowl=mysqli_num_rows($queryList);

        if ($queryList) {
          while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 
            $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
           

           }
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

  

$codigo     = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['editar_empresa'])));

$usuario_id = mysqli_real_escape_string($conn3, htmlspecialchars(trim($_GET['usuario_id'])));
 
$empresa = $usuario_id.'empresa';
  


      $queryList=mysqli_query($conn3,"SELECT * FROM   v_clienteE where id = '$codigo'");


        if ($queryList) {
            while($rowMotorizado=mysqli_fetch_array($queryList))

          {
        
              $idE = $rowMotorizado['id'];
              $nombreE = $rowMotorizado['nombre'];
              $nitE = $rowMotorizado['nit'];
              $precioE = $rowMotorizado['precio'];

              $direccionE = $rowMotorizado['direccion'];
              $telefonoE = $rowMotorizado['telefono'];
              $ciudadE = $rowMotorizado['ciudad'];
              $correoE = $rowMotorizado['email_fe'];
              $responsableE = $rowMotorizado['responsable'];
              $celularResponsableE = $rowMotorizado['celularResponsable'];
              $departamento = $rowMotorizado['departamento'];
              $municipio = $rowMotorizado['municipio'];
              $regimen = $rowMotorizado['regimen'];
              $fac_identificacion = $rowMotorizado['fac_identificacion'];
                $fac_tipodeempresa = $rowMotorizado['fac_tipodeempresa'];
                $fac_tipodepersona = $rowMotorizado['fac_tipodepersona'];
                $apl2 = $rowMotorizado['apl2'];
                $apl1 = $rowMotorizado['apl1'];
                $comentarios = $rowMotorizado['comentarios'];
                $dv = $rowMotorizado['dv'];
                $nom1 = $rowMotorizado['nom1'];
                $nom2 = $rowMotorizado['nom2'];
                $obligacionfiscal = $rowMotorizado['obligacionfiscal'];
                $razonsocial = $rowMotorizado['razonsocial'];
                $tributoreceptor = $rowMotorizado['tributoreceptor'];
                $identificacion = $rowMotorizado['identificacion'];
  
          }
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
 // eltallerdelmarmol@hotmail.com           
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

            <input type="text"  class="form-control input-lg" id="precio" name="precio" value=" <?php echo $precioE?>" required  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
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
              <input type="email"  class="form-control input-lg" id="email_fe" name="email_fe"  value="<?php echo $correoE?>"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
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
           Departamento    
             

         <select  id="departamento" name="departamento" class="form-control input-lg select" style="width: 100%;" required>
         
                 
                <option value="" selected="selected">Seleccione</option>
                 <?php    echo '<option selected="selected">'.$departamento.'</option>'; ?>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM departamentos");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                 $descripcionc      = $row_recordset32['nombre'];
                                                $codigo      = $row_recordset32['ID'];
                                                echo "<option value='$descripcionc'> $descripcionc</option>";
                                              }
                                              }
                                              
                                              ?>
                                          </select>


 
              </div>
 
             <div class="form-group col-md-6"> 
            Ciudad      
             
         <select  id="ciudad" name="ciudad" class="form-control input-lg select" style="width: 100%;" required> 
                 
                <option value="" selected="selected">Seleccione</option>
                 <?php    echo '<option selected="selected">'.$ciudadE.'</option>'; ?>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM ciudades_fe");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                  $descripcionc      = $row_recordset32['ciudad'];
                                                  $codigo      = $row_recordset32['ID'];
                                                  echo "<option value='$descripcionc'> $descripcionc</option>";
                                                }
                                              }
                                              
                                              ?>
                                          </select>


 
              </div>


 <div class="form-group col-md-6"> 
           Municipio    
              


         <select  id="municipio" name="municipio" class="form-control input-lg select" style="width: 100%;" required>
                 
                <option value="" selected="selected">Seleccione</option>
                 <?php    echo '<option selected="selected">'.$municipio.'</option>'; ?>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM municipiosE");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                  $descripcionc      = $row_recordset32['municipio'];
                                                  $codigo      = $row_recordset32['ID'];
                                                  echo "<option value='$descripcionc'> $descripcionc</option>";
                                                }
                                              }
                                              
                                              ?>
                                          </select>


 
              </div>


           

<div class="form-group col-md-6">
    <div align="left">nom1</div>
  <input type="text" class="form-control input-lg" id="nom1" name="nom1"   value="<?php echo $nom1?>"  placeholder="nom1 "></div>
  <div class="form-group col-md-6">
    <div align="left">nom2</div>
  <input type="text" class="form-control input-lg" id="nom2" name="nom2"   value="<?php echo $nom2?>"   placeholder="nom2 "></div>
  <div class="form-group col-md-6">
    <div align="left">Apellido 2</div>
  <input type="text" class="form-control input-lg" id="apl2" name="apl2"  value="<?php echo $apl2?>"  placeholder="Apellido 2">
</div>
  
  <div class="form-group col-md-6">
    <div align="left">Apellido 1</div>
  <input type="text" class="form-control input-lg" id="apl1" name="apl1"  value="<?php echo $apl1?>"  placeholder="Apellido 2">
</div>
  <div class="form-group col-md-6">
    <div align="left">comentarios</div>
  <input type="text" class="form-control input-lg" id="comentarios" name="comentarios"  value="<?php echo $comentarios?>"  placeholder="comentarios "></div>
  <div class="form-group col-md-6">
    <div align="left">dv</div>
  <input type="int" class="form-control input-lg" id="dv" name="dv" placeholder="dv"  value="<?php echo $dv?>" ></div>
  <div class="form-group col-md-6">
    <div align="left">identificacion</div>
  <input type="int" class="form-control input-lg" id="identificacion" name="identificacion" placeholder="Id"  value="<?php echo $identificacion?>" ></div>
 
  
  <div class="form-group col-md-6">
    <div align="left">obligacionfiscal</div>
  <input type="text" class="form-control input-lg" id="obligacionfiscal" name="obligacionfiscal" placeholder="obligacionfiscal"  value="<?php echo $obligacionfiscal?>" ></div>
  <div class="form-group col-md-6">
    <div align="left">razonsocial</div>
  <input required type="text" class="form-control input-lg" id="razonsocial" name="razonsocial" placeholder="razonsocial"  value="<?php echo $razonsocial?>" ></div>
  <div class="form-group col-md-6">
    <div align="left">tributoreceptor</div>
  <input type="text" class="form-control input-lg" id="tributoreceptor" name="tributoreceptor" placeholder="tributoreceptor"  value="<?php echo $tributoreceptor?>" ></div>
 





<div class="form-group col-md-6">
                <div align="left">  Identificador fiscal </div>

                <!--
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" required>
                -->

         <select  required id="fac_identificacion" name="fac_identificacion" class="form-control input-lg select" style="width: 100%;" >
                 
                <option value="" selected="selected">Seleccione</option>
                <?php    echo '<option selected="selected">'.$fac_identificacion.'</option>'; ?>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM identificador_fiscal");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                               
                                                $descripcionc      = $row_recordset32['descripcion'];
                                                $codigo      = $row_recordset32['ID'];
                                                echo "<option value='$codigo'> $descripcionc</option>";
                                              }
                                              }
                                              
                                              ?>
                                          </select>


 
              </div>

<div class="form-group col-md-6">
                <div align="left"> Tipo de Empresa </div>

                <!--
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" required>
                -->

         <select required id="fac_tipodeempresa " name="fac_tipodeempresa" class="form-control input-lg select" style="width: 100%;" >
                 
                <option value="" selected="selected">Seleccione</option>
                  <?php    echo '<option selected="selected">'.$fac_tipodeempresa.'</option>'; ?>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM  fac_tipodeempresa  ");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                  $descripcionc      = $row_recordset32['descripcion'];
                                                  $codigo      = $row_recordset32['codigo'];
                                                  echo "<option value='$codigo'> $descripcionc</option>";
                                                }
                                              }
                                              
                                              ?>
                                          </select>

              </div>

<div class="form-group col-md-6">
                <div align="left"> Tipo persona</div>

                <!--
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" required>
                -->

         <select required id="fac_tipodepersona" name="fac_tipodepersona" class="form-control input-lg select" style="width: 100%;">
                 
                <option value="" selected="selected">Seleccione</option>
                 <?php    echo '<option selected="selected">'.$fac_tipodepersona.'</option>'; ?>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM fac_tipodepersona");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                 $descripcionc      = $row_recordset32['descripcion'];
                                                $codigo      = $row_recordset32['ab'];
                                                echo "<option value='$codigo'> $descripcionc</option>";
                                              }
                                              }
                                              
                                              ?>
                                          </select>


 
              </div>




<div class="form-group col-md-6">
                <div align="left"> Regimen</div>

                <!--
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" required>
                -->

         <select required id="regimen" name="regimen" class="form-control input-lg select" style="width: 100%;">
                 
                <option value="" selected="selected">Seleccione</option>
                 <?php    echo '<option selected="selected">'.$regimen.'</option>'; ?>

                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM regimen");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                 $descripcionc      = $row_recordset32['descripcion'];
                                                $codigo      = $row_recordset32['ID'];
                                                echo "<option value='$codigo'> $descripcionc</option>";
                                              }
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
              echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="actualizar_empresa"> <h4> <strong> Actualizar   </strong> </h4> </button></center>';
            }
            else 
            {
              echo '<button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" name="registro_empresa"> <h4> <strong>  Guardar  </strong> </h4> </button></center>';
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
                    <th class="text-center">   </th>
                    <th class="text-center">   </th>
        
                </tr>
                </thead>
                <tbody>
                  <?php
                     
                $ID = $_SESSION['ID'];

                $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
 
 
                 $queryListA=mysqli_query($conn3,"SELECT * FROM  v_clienteE   order by nombre");
                 
                 if ($queryListA) {
                  while($row_recordset32A=mysqli_fetch_array($queryListA))

                  {
                      $idEm= $row_recordset32A['id'];
                      $nombre= $row_recordset32A['nombre'];
                      $nit= $row_recordset32A['nit'];
                      $telefono= $row_recordset32A['telefono'];
                      $correo = $row_recordset32A['email_fe'];
                      $activa = $row_recordset32A['activa'];

                      if ($activa == 0){$nombre= '<font color="#FF0000">'.$nombre.' (INACTIVA)</font>';
                      $nit='<font color="#FF0000">'.$nit.' </font>';
                      $telefono= '<font color="#FF0000">'.$telefono.' </font>';
                      $correo= '<font color="#FF0000">'.$correo.' </font>';

                       }
                      if ($activa > 0){$nombre=$nombre; 
$nit=$nit; 
$telefono=$telefono;
$correo=$correo;
                      }

                  $queryppFac=mysqli_query($conn3,"SELECT count(id) as ppFac, sum(precio) as totalFac FROM  v_historiaClinica3  where  usuario_id = $ID and  clienteE_id = $id and factura_id = 0  and aplicada = 1");
                  if ($queryppFac) {
                    
                  
                  while($row_ppFac=mysqli_fetch_array($queryppFac))
                  { 
                    $ppFac    = $row_ppFac['ppFac'];
                    $totalFac = $row_ppFac['totalFac'];
                  }
                }
 
                      echo '      
                      <tr>
                      <td> '.$nombre.'</td>
                      <td> '.$nit.'</td>
                      <td> '.$telefono.'</td>
                      <td> '.$correo.'</td>
                      <td align="right"> '.$ppFac.'</td>
                      <td align="right"> '.number_format($totalFac, 0, ',','.').'</td>';
                    
           if ($activa > 0){ echo '<td> 
                      <font color="#04CC05"> <a href="empresa?editar_empresa='.$idEm.'&usuario_id='.$ID.'"> <i class="fa fa-pencil" title="Editar" name="Virtual"></i> Editar Info </a></font></td>' ;} 
                      if ($activa == 0){ echo '<td>  </td>';} 


if ($activa > 0){ echo '
 <td>  <font color="#04CC05"> <a href="convenios.php?empresa='.$idEm.'"> <i class=""fa fa-plus" title="Agregar Convenio" name="Virtual"></i> Agregar y ver convenios</a></font></td> ';} 
                      if ($activa == 0){ echo '<td>  </td>' ;} 


/*if ($activa > 0){ echo '
 <td> 
                      <font color="#04CC05"> <a href="examenes2.php?empresa='.$idEm.'"> <i class=""fa fa-plus" title="Agregar Examenes" name="Virtual"></i> Agregar y ver Examenes</a></font></td> ' ;} 
                        if ($activa == 0){ echo '<td>  </td>' ;}*/


 if ($activa > 0){ echo '<td> <font color="#04CC05"> <a href="inactivarEmpresa.php?empresa='.$idEm.'&tipo=0"> <i class="" title="Inactivar Empresa" name="Virtual"></i> Inactivar Empresa</a></font></td>';}
if ($activa == 0){ echo '<td><font color="#FF0000"><a href="inactivarEmpresa.php?empresa='.$idEm.'&tipo=1"> <i class="" title="Activar Empresa" name="Virtual"></i> <font color="#FF0000">Activar Empresa</a></font></td>';}'




                      ';


                      if ($ppFac > 0) 
                      {
                      echo ' | <font color="red"> <a href="v_guardarDetalleFactura.php?id_cliente='.$id.'&id_usuario='.$ID.'"> <i class="fa fa-money" title="Facturar" name="Facturar"></i>  </a></font>';
                      }
 
                      echo '</td>
                      </tr>';

                  }}


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


<form action="guardarConvenio.php" method="POST">

   <?php   $idempresax = $_GET['empresaa'];
    $idempresaxx = $_POST['empresaa']; ?>
   <div class="modal fade" id="Regis" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Registrar convenio  <?php echo $idempresax; ?> <?php echo $idempresaxy; ?></h4>  
        
        </div>
        <div class="modal-body">

          <h5>Convenios  </h5>
       
                
              
 <select  name="convenio" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione convenio</option>

                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM convenio");
                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                 $descripcionc      = $row_recordset32['nombre'];
                                                 $idConvenio     = $row_recordset32['ID'];
                                              
                                                echo "<option value='$descripcionc'> $descripcionc</option>";
                                              }
                                              }
                                              
                                              ?>
 
                </select>  



 <input type="hidden" name="idConvenio" value="<?php echo $idConvenio; ?>">

          <input type="hidden" name="empresa" value="<?php echo $idEm; ?>">
          <input type="hidden" name="usuario" value="<?php echo $ID; ?>">
         

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" value="Guardar Convenio" name="guardarEmpresa">
        </div>
      </div>
    </div>
  </div>

</form>








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