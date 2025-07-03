<?php 
echo "<script language='Javascript'> window.location='CrearPaciente.php';</script>"; 
include 'header.php';
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
<br>      
<br>      
     
<section class="content">
  
<div  class="box box-info" align="center">
<br> 
<br> 
 <div class="card-body">
          <h4 class="card-title">  Historia Clínica    </h4>
          <br>
           <form action="guardarCliente.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">


              <div class="form-group col-md-6">
                <div align="left">  Nombre del paciente </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre"  required>
              </div>

              <div class="form-group col-md-6">
                 <div align="left">  Email </div>
                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente" placeholder="Correo">
              </div>


              <div class="form-group col-md-3">
                 <div align="left">   Numero de Cedula o ID</div>
                <input type="text" class="form-control input-lg" name="CODI_CLIENTE" placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" />
              <div id="div-results"></div>
              </div>
               <div class="form-group col-md-4">
                 <div align="left">  Numero de Teléfono</div>
                <input type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente" placeholder="Telefono" >
              </div>
              <div class="form-group col-md-5">
                 <div align="left"><font color="green"> <strong>Numero de Celular notificaciones Whatsapp +57########## </strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente" placeholder="Celular" >
              </div>
              





              
             
             <div class="form-group col-md-8">
              <div align="left">  Dirección </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Direccion" required>
              </div> 
              <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente" placeholder="Ciudad" >
              </div>
    
              <div class="form-group col-md-3">
                <div align="left">  Genero </div>
               
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                  <option>M</option>
                  <option>F</option>
                   
                </select>

              </div>
               <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento --</div>
                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" required>
              </div>
-
              <div class="form-group col-md-2">
                <div align="left">   </div>
                
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
              <div class="form-group col-md-4">
                <div align="left">Toma algún Medicamento </div>
               
                <input type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento" placeholder="toma Medicamento">
              </div>
              

              
              
              <div class="form-group col-md-6">
                <div align="left">Acompañante Familiar </div>
                <input type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar" >
              </div>
              <div class="form-group col-md-6">
                <div align="left">Teléfono Acompañante</div>
                <input type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante">
              </div>
              


              <div class="form-group col-md-6">
                 <div align="left">Entidad de Salud </div>
                 <input type="text" class="form-control input-lg" id="entidadSalud" name="entidadSalud" placeholder="Entidad de Salud">
              </div>
              <div class="form-group col-md-6">
                 <div align="left">Seguro </div>
                <input type="text" class="form-control input-lg" id="seguro" name="seguro" placeholder="seguro">
              </div>
              



<div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

              <div class="form-group col-md-3">
                <div align="left">Peso en KG</div>
                <input type="number" class="form-control input-lg" id="peso" name="peso" onChange="calcularimc();" step="any">
              </div>


              <div class="form-group col-md-3">
                 <div align="left">Altura en <strong>  Centimetros </strong></div>
                <input type="number" class="form-control input-lg" id="altura" name="altura" onChange="calcularimc();" step="any">
              </div>
              <div class="form-group col-md-3">
                <div align="left"> Índice de masa corporal </div>
                <input type="number" class="form-control input-lg" id="imc" name="imc" step="any">
              </div>


              <div class="form-group col-md-3">
                <div align="left">Composición corporal</div>
                <input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
              </div>
            


            <div class="form-group col-md-12">
                <div align="left">Alergias</div>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="alergias" name="alergias"  class="textarea" placeholder="Alergias" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>


            <div class="form-group col-md-12">
                <div align="left">Enfermedades de pequeño</div>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="enfermedadesPequeno" name="enfermedadesPequeno"  class="textarea" placeholder="Alergias" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>





              <div class="form-group col-md-12">
                <div align="left"> Motivo Consulta</div>
              </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              
                <textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>
           

            <div class="form-group col-md-12">
              <div align="left"> Antecedentes</div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea id="antecedentes" name="antecedentes"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
           

            <div class="form-group col-md-12">
              <div align="left"> Notas Adicionales </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body pad">
              <textarea id="nota" name="nota"  class="textarea" placeholder="Notas Adicionales" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>
           
            <div class="form-group col-md-12">
              <div align="left">Foto </div>
            </div>

             
              <input type="hidden" class="form-control input-lg" value="fotoperfil">
              <input type="file" class="form-control input-lg"  name="imagen">

              </div>
              
          
              
              
              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              
              
               
              
                           
            
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






 <script>
function calcularimc()
{

 

  m1 = document.getElementById("peso").value;
  m2 = document.getElementById("altura").value;

  r = m1/((m2/100)*(m2/100));
 
 

  document.getElementById("imc").value = r.toFixed(2);
 

  if (r.toFixed(2) < 16) 
  
      ComposicionCorporal = 'Infrapeso: Delgadez Severa';
  else if
    (r.toFixed(2) > 16 &  r.toFixed(2) < 16.99) 
  
      ComposicionCorporal = 'Infrapeso: Delgadez moderada';
  else if 
    (r.toFixed(2) > 17 & r.toFixed(2) < 18.49) 
  
      ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
  else if 
    (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99) 
  
      ComposicionCorporal = 'Peso Normal';
  
  else if 
    (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99) 
  
      ComposicionCorporal = 'Sobrepeso';
  
  else if 
    (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99) 
  
      ComposicionCorporal = 'Obeso: Tipo I';
  
  else if 
    (r.toFixed(2) > 35.00 & r.toFixed(2) < 40) 
  
      ComposicionCorporal = 'Obeso: Tipo II';
  
  else if 
    (r.toFixed(2) > 40.00) 
  
      ComposicionCorporal = 'Obeso: Tipo III';
  
 


document.getElementById("ComposicionCorporal").value = ComposicionCorporal; 
}

 
</script>