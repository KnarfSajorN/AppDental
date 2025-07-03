 <?php 
   include 'header.php';
   include 'menu.php';


 
$cliente_id = $_GET['clienteId'];
$usuario_id = $_SESSION['ID'];


 
  $queryList=mysqli_query($conn3,"SELECT * FROM v_cliente WHERE usuario_id = $usuario_id and id = $cliente_id");
  $nrowl=mysqli_num_rows($queryList);
  while($row_recordset32=mysqli_fetch_array($queryList))
  {
     
          $id=$row_recordset32['id'];
          $nombre_cliente=$row_recordset32['nombre_cliente'];
          $celular_cliente=$row_recordset32['celular_cliente'];
          $ciudad_cliente=$row_recordset32['ciudad_cliente'];
          $correo_cliente=$row_recordset32['correo_cliente'];
          $CODI_CLIENTE=$row_recordset32['CODI_CLIENTE'];
          $fechaNacimiento=$row_recordset32['fechaNacimiento'];
          $lugarNacimiento=$row_recordset32['lugarNacimiento'];
          $entidadSalud=$row_recordset32['entidadSalud'];
          $seguro=$row_recordset32['seguro'];
          $genero=$row_recordset32['genero'];
          $direccion_cliente=$row_recordset32['direccion_cliente'];
          $telefono_cliente=$row_recordset32['telefono_cliente'];
         
          $carne=$row_recordset32['carne'];
          $whatsapp=$row_recordset32['whatsapp'];
           
          $tiposSangre=$row_recordset32['tiposSangre']; 
          $fn=$row_recordset32['fn']; 

}










if(isset($_POST['btn-save']))
{ 

    $id=$_POST['id'];
   $nombre_cliente=$_POST['nombre_cliente'];
          $celular_cliente=$_POST['celular_cliente'];
          $ciudad_cliente=$_POST['ciudad_cliente'];
          $correo_cliente=$_POST['correo_cliente'];
          $CODI_CLIENTE=$_POST['CODI_CLIENTE'];
          $fechaNacimiento=$_POST['fechaNacimiento'];
          $lugarNacimiento=$_POST['lugarNacimiento'];
          $entidadSalud=$_POST['entidadSalud'];
          $seguro=$_POST['seguro'];
          $genero=$_POST['genero'];
          $direccion_cliente=$_POST['direccion_cliente'];
          $telefono_cliente=$_POST['telefono_cliente'];
         
          $carne=$row_recordset32['carne'];
          $whatsapp=$row_recordset32['whatsapp'];
           
          $tiposSangre=$row_recordset32['tiposSangre']; 
          $fn=$row_recordset32['fn']; 
  
 
  mysqli_query($conn3,"UPDATE v_cliente SET 
    nombre_cliente='$nombre_cliente',
    celular_cliente='$celular_cliente',
    ciudad_cliente='$ciudad_cliente',
    correo_cliente='$correo_cliente',
    CODI_CLIENTE='$CODI_CLIENTE',
    lugarNacimiento='$lugarNacimiento', 
    genero= '$genero',
    direccion_cliente='$direccion_cliente',
    telefono_cliente='$telefono_cliente',
    entidadSalud='$entidadSalud', 
     tiposSangre = '$tiposSangre',
    seguro= '$seguro' ,
    carne= '$carne' ,
    whatsapp= '$whatsapp' ,
    fn= '$fn' ,

    fechaNacimiento = '$fechaNacimiento'
      WHERE id = $id");
       
 echo "<script language='Javascript'> window.location='pacientesVacunar?msg=3';</script>"; 

}

 
   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pacientes
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes</a></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>'; 


 
        }
      ?>

          <div class="box">
            
            <!-- /.box-header -->
            <div class="box-body">
             <form action="v_editarPaciente.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">

             <div class="form-group col-md-3">
                 <div align="left">   Numero de Cedula o ID</div>
                <input type="text" class="form-control input-lg" name="CODI_CLIENTE" placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" value="<?php echo $CODI_CLIENTE?>" />
              <div id="div-results"></div>
              </div>


              <div class="form-group col-md-4">
                <div align="left">  Nombre del paciente </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" value="<?php echo $nombre_cliente?>"  required>
              </div>

               <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento </div>
                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento"  value="<?php echo $fechaNacimiento?>" required>
              </div>

              

 

              <div class="form-group col-md-2">
                <div align="left">  Sexo  </div>
               
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                 
                  <option> <?php echo $genero?></option>
                  <option>M</option>
                  <option>F</option>
                  <option>Otro</option>
                   
                </select>

              </div>
              

 

              <div class="form-group col-md-3">
              <div align="left">  Dirección </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" value="<?php echo $direccion_cliente?>" placeholder="Direccion" >
              </div> 


              <div class="form-group col-md-3">
              <div align="left">  Lugar de Nacimiento </div>
                <input type="text" class="form-control input-lg" id="lugarNacimiento" name="lugarNacimiento" value="<?php echo $lugarNacimiento?>" placeholder="Lugar de Nacimiento" >
              </div> 




 



 
              <div class="form-group col-md-3">
                 <div align="left">  Numero de Celular    </div>
                <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente" value="<?php echo $celular_cliente?>" placeholder="Celular" >
              </div>
              
              <div class="form-group col-md-3">
                 <div align="left"><font color="green"> <strong>Numero de Celular para notificaciones Whatsapp</strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" value="<?php echo $Whatsapp?>" placeholder="+57##########" >
              </div>
              
              <div class="form-group col-md-4">
                 <div align="left">  Carne </div>
                <input type="text" class="form-control input-lg" id="carne" name="carne" value="<?php echo $carne?>" placeholder="carne">
              </div>


              <div class="form-group col-md-4">
                <div align="left">  Empresa </div>
               
                <select  id="empresa" name="empresa" class="form-control input-lg select" style="width: 100%;">
                  
                  <option value="<?php echo $CODI_CLIENTE?>"> <?php echo v_empresa($empresa)?></option>
                  <option value="0">Seleccione empresa</option>
                  <option value="0">Ninguna</option>
                  <?php v_empresaselect($_SESSION['ID'])?>
                </select>

              </div>



              <div class="form-group col-md-4">
                 <div align="left">  Email </div>
                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" value="<?php echo $correo_cliente?>" placeholder="Correo">
              </div>
              
              <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" value="<?php echo $ciudad_cliente?>" placeholder="Ciudad" >
              </div>
  

 
               <div class="form-group col-md-2">
                  <div align="left">  Tipo de Sangre </div>
                <input type="text" class="form-control input-lg" id="tiposSangre" name="tiposSangre" value="<?php echo $tiposSangre?>" placeholder="tipo de Sangre">
              </div>



               <div class="form-group col-md-2">
                  <div align="left"> fn  </div>
                <input type="text" class="form-control input-lg" id="fn" name="fn" placeholder="fn" value="<?php echo $fn?>">
              </div>


               
              














              <div class="form-group col-md-6">
                 <div align="left">Entidad de Salud </div>
                 <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud" value="<?php echo $entidadSalud?>">
              </div>
              <div class="form-group col-md-6">
                 <div align="left">Seguro </div>
                <input type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro" value="<?php echo $seguro?>">
              </div>
 





              </div>


           
         



              <input type="hidden" name="id" value="<?php echo $id?>">
              <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']?>">

            <center><button type="submit" name="btn-save" id="btn-save" class="btn btn-block btn-primary btn-sm">Actualizar</button></center>
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
          </form>
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