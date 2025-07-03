<?php include 'header.php';
include 'menu.php';
 
if(isset($_POST['btn-save']))
{ 




     $usuario_id=$_POST['usuario_id'];
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
         
          $carne=$_POST['carne'];
          $whatsapp=$_POST['whatsapp'];
           
          $tiposSangre=$_POST['tiposSangre']; 
          $empresa=$_POST['empresa']; 
          $barrio=$_POST['barrio']; 
  
  $fecha = date("Y-m-d");

 
  mysqli_query($conn3,"INSERT INTO v_cliente (usuario_id, nombre_cliente, celular_cliente, ciudad_cliente, correo_cliente, genero, direccion_cliente, telefono_cliente, fechaNacimiento, lugarNacimiento, entidadSalud, seguro, CODI_CLIENTE, tiposSangre, empresa, carne, whatsapp ,barrio) VALUES ('$usuario_id', '$nombre_cliente', '$celular_cliente', '$ciudad_cliente', '$correo_cliente', '$genero',
    '$direccion_cliente', '$telefono_cliente', '$fechaNacimiento', '$lugarNacimiento', '$entidadSalud', '$seguro', '$CODI_CLIENTE', '$tiposSangre', '$empresa', '$carne', '$whatsapp', '$barrio');");
       
 echo "<script language='Javascript'> window.location='pacientesVacunar?msg=2';</script>"; 

}






?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="patientes.php"> Paciente</a></li>
         <li  class="active"> Reg paciente</li>
      </ol>
    </section>
  
<br>      
 
     
<section class="content">
  
<div  class="box box-info" align="center">
 
 <div class="card-body">
          <h4 class="card-title"> Nuevo paciente  </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           <form action="nuevoPacienteVacunar" method="POST"  enctype="multipart/form-data">
            <div class="form-row">

             <div class="form-group col-md-3">
                 <div align="left">   Numero de Cedula o ID</div>


 

                  <input type="hidden" id="tipoVerificacion" value="2" name="tipoVerificacion">    

                <input type="text" class="form-control input-lg" name="CODI_CLIENTE"  placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" id="nit" value="<?php echo $CODI_CLIENTE?>"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" onblur="onRutBlur(this);">
              
              <div id="div-results"></div>
              </div>


              <div class="form-group col-md-4">
                <div align="left">  Nombre del paciente </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre" value="<?php echo $nombre_cliente?>"  required maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>

               <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento </div>
                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento"  value="<?php echo $fechaNacimiento?>" required>
              </div>

              

 

              <div class="form-group col-md-2">
                <div align="left">  Sexo </div>
               
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                 
                  <option> <?php echo $CODI_CLIENTE?></option>
                  <option>M</option>
                  <option>F</option>
                  <option>Otro</option>
                   
                </select>

              </div>
              

 

              <div class="form-group col-md-3">
              <div align="left">  Dirección </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" value="<?php echo $direccion_cliente?>" placeholder="Direccion"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div> 


              <div class="form-group col-md-3">
              <div align="left">  Lugar de Nacimiento </div>
                <input type="text" class="form-control input-lg" id="lugarNacimiento" name="lugarNacimiento" value="<?php echo $lugarNacimiento?>" placeholder="Lugar de Nacimiento" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div> 
              

              <div class="form-group col-md-3">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" value="<?php echo $ciudad_cliente?>" placeholder="Ciudad" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
  


           <div class="form-group col-md-3">
                <div align="left">  Barrio </div>
                <input type="text" class="form-control input-lg" id="barrio" name="barrio" value="<?php echo $barrio?>" placeholder="Barrio" maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
  


              <div class="form-group col-md-4">
                 <div align="left">  Numero de Celular    </div>
                <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente" value="<?php echo $celular_cliente?>" placeholder="Celular" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
              
              <div class="form-group col-md-4">
                 <div align="left"><font color="green"> <strong>Numero de Celular para notificaciones Whatsapp</strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" value="<?php echo $Whatsapp?>" placeholder="+57##########" maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
              
              <div class="form-group col-md-4">
                 <div align="left">  Carne </div>
                <input type="text" class="form-control input-lg" id="carne" name="carne" value="<?php echo $carne?>" placeholder="carne"maxlength="30" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
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



              <div class="form-group col-md-3">
                 <div align="left">  Email </div>
                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" value="<?php echo $correo_cliente?>" placeholder="Correo" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>
              
     

 
               <div class="form-group col-md-2">
                  <div align="left">  Tipo de Sangre </div>


                  <select  id="tiposSangre" name="tiposSangre" class="form-control input-lg select" style="width: 100%;">

                    <option> <?php echo $CODI_CLIENTE?></option>
                    <option>O-</option>
                    <option>O+</option>
                    <option>A-</option>
                    <option>A+</option>
                    <option>B-</option>
                    <option>B+</option>
                    <option>AB-</option>
                    <option>AB+</option>
                    <option>Otro</option>

                  </select>



                  <!--
                <input type="text" class="form-control input-lg" id="tiposSangre" name="tiposSangre" value="<?php echo $tiposSangre?>" placeholder="tipo de Sangre">
                -->
              </div>



               
                <input type="hidden" class="form-control input-lg" id="fn" name="fn" placeholder="fn" value="1">
             

               
              














              <div class="form-group col-md-3">
                 <div align="left">Entidad de Salud </div>
                 <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud" value="<?php echo $entidadSalud?>" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
              </div>




              <div class="form-group col-md-6">
                <input type="hidden" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro" value="seguro">
              </div>
 





              </div>


           
         



              <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']?>">

              <center>
                <button type="submit" name="btn-save" id="btn-save" class="btn btn-block btn-primary btn-sm">Guardar</button>
              </center>
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
            
          </form>
        </div>
     


     <input type="hidden" name="ID_Doctor"  class="form-control input-lg input-lg"    value="<?php echo $_SESSION['ID'] ?>">


</div>
 



</section>

<?php echo $mensaje_registro_patients;?>
   
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  

<?php include 'footer.php'?>





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