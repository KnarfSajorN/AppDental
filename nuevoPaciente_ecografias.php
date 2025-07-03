<?php include 'header.php';
include 'menu.php';
 
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
          <h4 class="card-title"> Apertura de historia (Registro de paciente)   </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           <form action="guardarPaciente_ecografias.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">

             <div class="form-group col-md-3">
                 <div align="left">   Numero de Cedula o ID</div>
                <input type="text" class="form-control input-lg" name="CODI_CLIENTE" placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" />
              <div id="div-results"></div>
              </div>


              <div class="form-group col-md-5">
                <div align="left">  Nombre del paciente </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre"  required>
              </div>

               <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento </div>
                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" required>
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
                <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad"  placeholder="nacionalidad" >
              </div> 

              <div class="form-group col-md-6">
              <div align="left">  Dirección </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" >
              </div> 






              <div class="form-group col-md-6">
                <div align="left">  Estado civil </div>
               
                <select  id="estado" name="estado" class="form-control input-lg select" style="width: 100%;">
                  <option>Casado(a)</option>
                  <option>Soltero(a)</option>
                  <option>Viudo(a)</option>
                  <option>Menor de edad</option>
                  <option>Separado(a)</option>
                  <option>Union Libre</option>
                  <option>Otro(a)</option>
                   
                </select>

              </div>
              




              <div class="form-group col-md-6">
                <div align="left">Tipo de usuario  </div>
               
                <select  id="tipoUsuario" name="tipoUsuario" class="form-control input-lg select" style="width: 100%;">
                  <option>Subsidiado </option>
                  <option>Contributivo </option>
                  <option>Particular </option>
                  <option>Otro </option>
                  
                </select>

              </div>
              








               <div class="form-group col-md-4">
                 <div align="left">  Numero de Teléfono</div>
                <input type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono" >
              </div>
              <div class="form-group col-md-4">
                 <div align="left">  Numero de Celular    </div>
                <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente" placeholder="Celular" >
              </div>
               <div class="form-group col-md-4">
                 <div align="left"><font color="green"> <strong>Numero de Celular notificaciones Whatsapp (Código País y luego el numero)</strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="############" >
              </div>

              <div class="form-group col-md-8">
                 <div align="left">  Email </div>
                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo">
              </div>
              
              <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" >
              </div>

              <div class="form-group col-md-4">
                 <div align="left">  Profesión  </div>
                <input type="text" class="form-control input-lg" id="profesion_cliente" name="profesion_cliente" placeholder="Profesion">
              </div>
              


              <div class="form-group col-md-4">
                <div align="left">Es Donante </div>
               
                <select  id="esDonante" name="esDonante" class="form-control input-lg select" style="width: 100%;">
                  <option>Si</option>
                  <option>No</option>
                   
                </select>

              </div>
               <div class="form-group col-md-4">
                  <div align="left">  Tipo de Sangre </div>
                <input type="text" class="form-control input-lg" id="tiposSangre" name="tiposSangre" placeholder="tipo de Sangre">
              </div>




              <div class="form-group col-md-6">
                 <div align="left">Entidad de Salud </div>
                 <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud">
              </div>
              <div class="form-group col-md-6">
                 <div align="left">Seguro </div>
                <input type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro">
              </div>

       
         



              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']?>">

              <center><button type="submit" id="guardarCliente" name="guardarCliente" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
            
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



