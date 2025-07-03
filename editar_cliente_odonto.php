<?php 
include 'header.php';
include 'menu.php';
$clienteId=$_GET['clienteId'];


        $editar=mysqli_query($conn3,"SELECT * FROM cliente_odonto where cliente_odonto_id= $clienteId");
                $resultado=mysqli_fetch_assoc($editar);

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
          <h4 class="card-title">  Editar Cliente Odontologico    </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           <form action="EdiarPaciente_odonto.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">

             <div class="form-group col-md-3">
                 <div align="left">   Numero de Cedula o ID</div>
                <input type="text" class="form-control input-lg" name="CODI_CLIENTE_odonto" placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" value="<?php echo $resultado['CODI_cliente_odonto']; ?>" id="txtRut" />
              <div id="div-results"></div>
              </div>


              <div class="form-group col-md-5">
                <div align="left">  Nombre del paciente </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente_odonto" name="nombre_cliente" placeholder="Nombre"  required value="<?php echo $resultado['nombre_cliente_odonto']; ?>" >
              </div>

               <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento </div>
                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" required value="<?php echo $resultado['fechaNacimiento']; ?>">
              </div>

              <div class="form-group col-md-1">
                  <div align="left">  Edad </div>
                <div align="left">   </div>
                
              </div>



              <div class="form-group col-md-2">
                <div align="left">  Sexo </div>
               
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                  <option>M</option>
                  <option>F</option>
                  <option>Otro</option>
                   
                </select>

              </div>
              



              <div class="form-group col-md-4">
              <div align="left">  Nacionalidad </div>
                <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad" value="Colombiano" placeholder="nacionalidad" value="<?php echo $resultado['nacionalidad']; ?>" >
              </div> 

              <div class="form-group col-md-6">
              <div align="left">  Dirección </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" value="<?php echo $resultado['direccion_cliente_odonto']; ?>">
              </div> 






              <div class="form-group col-md-6">
                <div align="left">  Estado civil </div>
               
                <select  id="estado" name="estado" class="form-control input-lg select" style="width: 100%;">
                <option value="<?php echo $resultado['estado']; ?>"><?php echo $resultado['estado']; ?></option>


                <?php if ($resultado['estado']=="Casado(a)") { ?>
                  <option>Soltero(a)</option>
                  <option>Viudo(a)</option>
                  <option>Menor de edad</option>
                  <option>Separado(a)</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                <?php } ?>
                <?php if ($resultado['estado']=="Soltero(a)") { ?>
                  <option>Casado(a)</option>
                  <option>Viudo(a)</option>
                  <option>Menor de edad</option>
                  <option>Separado(a)</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                <?php } ?>
                <?php if ($resultado['estado']=="Viudo(a)") { ?>
                  <option>Casado(a)</option>
                  <option>Soltero(a)</option>
                  <option>Menor de edad</option>
                  <option>Separado(a)</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                <?php } ?>
                <?php if ($resultado['estado']=="Menor de edad") { ?>
                  <option>Casado(a)</option>
                  <option>Soltero(a)</option>
                  <option>Viudo(a)</option>
                  <option>Separado(a)</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                <?php } ?>
                <?php if ($resultado['estado']=="Separado(a)") { ?>
                  <option>Casado(a)</option>
                  <option>Soltero(a)</option>
                  <option>Viudo(a)</option>
                  <option>Menor de edad</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                <?php } ?>
                <?php if ($resultado['estado']=="Union Libre") { ?>
                  <option>Casado(a)</option>
                  <option>Soltero(a)</option>
                  <option>Viudo(a)</option>
                  <option>Menor de edad</option>
                  <option>Separado(a)</option>
                  <option>Otro(a)</option>
                <?php } ?>
                <?php if ($resultado['estado']=="Otro(a)") { ?>
                  <option>Casado(a)</option>
                  <option>Soltero(a)</option>
                  <option>Viudo(a)</option>
                  <option>Menor de edad</option>
                  <option>Separado(a)</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                <?php } ?>
                   
                </select>

              </div>
              




              <div class="form-group col-md-6">
                <div align="left">Tipo de usuario  </div>
               
                <select  id="tipoUsuario" name="tipoUsuario" class="form-control input-lg select" style="width: 100%;">

                  <option value="<?php echo $resultado['tipoUsuario']; ?> "><?php echo $resultado['tipoUsuario']; ?> </option>
                <?php if ($resultado['tipoUsuario']=="Subsidiado") { ?>
                  <option>Contributivo </option>
                  <option>Particular </option>
                  <option>Otro </option>
                <?php } ?>
                <?php if ($resultado['tipoUsuario']=="Contributivo") { ?>
                  <option>Subsidiado </option>
                  <option>Particular </option>
                  <option>Otro </option>
                <?php } ?>
                <?php if ($resultado['tipoUsuario']=="Particular") { ?>
                  <option>Subsidiado </option>
                  <option>Contributivo </option>
                  <option>Otro </option>
                <?php } ?>
                <?php if ($resultado['tipoUsuario']=="Otro") { ?>
                  <option>Subsidiado </option>
                  <option>Contributivo </option>
                  <option>Particular </option>
                <?php } ?>
                
                  
                </select>

              </div>
              








               <div class="form-group col-md-4">
                 <div align="left">  Numero de Teléfono</div>
                <input type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente_odonto" placeholder="Telefono" value="<?php echo $resultado['telefono_cliente_odonto']; ?>">
              </div>
              <div class="form-group col-md-4">
                 <div align="left">  Numero de Celular    </div>
                <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente_odonto" placeholder="Celular"  value="<?php echo $resultado[' celular_cliente_odonto']; ?>" >
              </div>
               <div class="form-group col-md-4">
                 <div align="left"><font color="green"> <strong>Numero de Celular notificaciones Whatsapp</strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="+57##########" value="<?php echo $resultado['whatsapp']; ?>" >
              </div>

              <div class="form-group col-md-8">
                 <div align="left">  Email </div>
                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente_odonto" placeholder="Correo" value="<?php echo $resultado['correo_cliente_odonto']; ?>">
              </div>
              
              <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente_odonto" placeholder="Ciudad"  value="<?php echo $resultado['ciudad_cliente_odonto']; ?>">
              </div>

              <div class="form-group col-md-4">
                 <div align="left">  Profesión  </div>
                <input type="text" class="form-control input-lg" id="profesion_cliente" name="profesion_cliente_odonto" placeholder="Profesion" value="<?php echo $resultado['profesion_cliente_odonto']; ?>">
              </div>
              
 
               <div class="form-group col-md-4">
                  <div align="left">  Tipo de Sangre </div>
                <input type="text" class="form-control input-lg" id="tiposSangre" name="tiposSangre" placeholder="tipo de Sangre" value="<?php echo $resultado['tiposSangre']; ?>">
              </div>




              <div class="form-group col-md-6">
                 <div align="left">Entidad de Salud </div>
                 <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud" value="<?php echo $resultado['entidadSalud']; ?>">
              </div>
              <div class="form-group col-md-6">
                 <div align="left">Seguro </div>
                <input type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro" value="<?php echo $resultado['seguro']; ?>">
              </div>





              <div class="form-group col-md-4">
                <div align="left">Acompañante Familiar </div>
                <input type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  value="<?php echo $resultado['acompananteFamiliar']; ?>"> 
              </div>
              <div class="form-group col-md-4">
                <div align="left">Teléfono Acompañante</div>
                <input type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $resultado['telefono_acompanante']; ?>"> 
              </div>


               <div class="form-group col-md-4">
                <div align="left">Parentesco</div>
                <input type="text" class="form-control input-lg" id="parentesco_acompanante" name="parentesco_acompanante" placeholder="Parentesco Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" value="<?php echo $resultado['parentesco_acompanante']; ?>"> 
              </div>
             




           
         


          <input type="hidden" name="clienteId" value="<?php echo $_GET['clienteId']; ?>">
              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']?>">

              <center><button type="submit" class="btn btn-block btn-primary btn-sm">Editar</button></center>
            
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



