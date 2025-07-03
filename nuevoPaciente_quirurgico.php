<?php include 'header.php';
include 'menu.php';?>

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
          <h4 class="card-title">  Historia Clínica    </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           <form action="guardarCliente.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
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
                <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad" value="Colombiano" placeholder="nacionalidad" >
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
                 <div align="left"><font color="green"> <strong>Numero de Celular notificaciones Whatsapp</strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="+57##########" >
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




              <div class="form-group col-md-4">
                <div align="left">Acompañante Familiar </div>
                <input type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
              </div>
              <div class="form-group col-md-4">
                <div align="left">Teléfono Acompañante</div>
                <input type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
              </div>


               <div class="form-group col-md-4">
                <div align="left">Parentesco</div>
                <input type="text" class="form-control input-lg" id="parentesco_acompanante" name="parentesco_acompanante" placeholder="Parentesco Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
              </div>
             






 <div class="form-group col-md-12">
  <hr>
  <h4>  Antecedentes Personales </h4> 
  </div>

    <div class="form-group col-md-12">
        <div align="left">Medicamento que toma</div>
        <input type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="Medicamento que toma">
    </div>
    <div class="form-group col-md-3" align="right">
      Alergias a los aines 
      <input value="1" type="radio" name="ap1" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap1" id="lt" class="flat-red"/> NO  
    </div>  
     
    <div class="form-group col-md-3" align="right">
      Asma
      <input value="1" type="radio" name="ap2" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap2" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-3" align="right">
      HTA
      <input value="1" type="radio" name="ap3" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap3" id="lt" class="flat-red"/> NO  
    </div> 

    <div class="form-group col-md-3" align="right">
      Diabetes
      <input value="1" type="radio" name="ap4" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap4" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-3" align="right">
      Hipotiroidismo
      <input value="1" type="radio" name="ap5" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap5" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-3" align="right">
      Tabaquismo
      <input value="1" type="radio" name="ap6" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap6" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-3" align="right">
      Licor
      <input value="1" type="radio" name="ap7" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap7" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-3" align="right">
      Alergias
      <input value="1" type="radio" name="ap8" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap8" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-3" align="right">
      Cirugías
      <input value="1" type="radio" name="ap9" id="lt" class="flat-red"/> SI  
      <input value="2" type="radio" name="ap9" id="lt" class="flat-red"/> NO  
    </div>

    <div class="form-group col-md-9" align="right">
      <input type="text" class="form-control input-lg" id="cirugiasCuales" name="cirugiasCuales" placeholder="Cuales Cirugías" maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
    </div>


 
 
 
  <div class="form-group col-md-12">
                <div align="left">Alergias cuales</div>
     <input type="text" class="form-control input-lg" id="alergias" name="alergias" placeholder="Alergias cuales">
    
            </div>


            <div class="form-group col-md-12">
              <div align="left">Medicamento que toma</div>
              <input type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="toma Medicamento">
            </div>
    
           
           


            <div class="form-group col-md-12">
                <div align="left">Antecedentes Familiares</div>
              <input type="text" class="form-control input-lg" id="enfermedadesPequeno" name="enfermedadesPequeno" placeholder="Antecedentes Familiares">
              
       
             
            </div>




  <!--
              <div class="form-group col-md-12">
                <div align="left"> Motivo Consulta</div>
              </div>
             /.box-header 
            <div class="box-body pad">
              
                <textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>
           

            <div class="form-group col-md-12">
              <div align="left"> Antecedentes</div>
            </div>
            /.box-header 
            <div class="box-body pad">
              <textarea id="antecedentes" name="antecedentes"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
           -->

            <div class="form-group col-md-12">
              <div align="left"> Notas Adicionales </div>
        

              <textarea id="nota" name="nota"  class="textarea" placeholder="Notas Adicionales" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
           
            <div class="form-group col-md-12">
              <div align="left">Foto del paciente</div>
            </div>

             
              <input type="hidden" class="form-control input-lg" value="fotoperfil">
              <input type="file" class="form-control input-lg"  name="imagen">

              </div>


           
         



              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              <input type="hidden" name="sucursal" value="<?php echo $_SESSION['sucursal']?>">

              <center><button type="submit" class="btn btn-block btn-primary btn-sm">Guardar</button></center>
            
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



