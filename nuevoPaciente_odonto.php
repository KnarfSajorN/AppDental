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
          <h4 class="card-title">  Historia Clínica Odontologica    </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           <form action="guardarPaciente_odonto.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">

             <div class="form-group col-md-3">
                 <div align="left">   Numero de Cedula o ID</div>
                <input type="text" class="form-control input-lg" name="CODI_CLIENTE_odonto" placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" />
              <div id="div-results"></div>
              </div>


              <div class="form-group col-md-5">
                <div align="left">  Nombre del paciente </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente_odonto" name="nombre_cliente" placeholder="Nombre"  required>
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
                <input type="text" class="form-control input-lg" id="telefono_cliente" name="telefono_cliente_odonto" placeholder="Telefono" >
              </div>
              <div class="form-group col-md-4">
                 <div align="left">  Numero de Celular    </div>
                <input type="number" class="form-control input-lg" id="celular_cliente" name="celular_cliente_odonto" placeholder="Celular" >
              </div>
               <div class="form-group col-md-4">
                 <div align="left"><font color="green"> <strong>Numero de Celular notificaciones Whatsapp (Código País y luego el numero)</strong>  </font> </div>
                <input type="number" class="form-control input-lg" id="Whatsapp" name="whatsapp" placeholder="############" >
              </div>

              <div class="form-group col-md-8">
                 <div align="left">  Email </div>
                <input type="email" class="form-control input-lg" id="correo_cliente" name="correo_cliente_odonto" placeholder="Correo">
              </div>
              
              <div class="form-group col-md-4">
                <div align="left">  Ciudad </div>
                <input type="text" class="form-control input-lg" id="ciudad_cliente" name="ciudad_cliente_odonto" placeholder="Ciudad" >
              </div>

              <div class="form-group col-md-4">
                 <div align="left">  Profesión  </div>
                <input type="text" class="form-control input-lg" id="profesion_cliente" name="profesion_cliente_odonto" placeholder="Profesion">
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
             



<div class="col-md-12">
          <div class="box box-solid">
            
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                         
                        Antecedentes

                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                     



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
              <input type="text" class="form-control input-lg" id="tomaMedicamento" name="tomaMedicamento1" placeholder="toma Medicamento">
            </div>
    
           
             <div class="form-group col-md-12">
              <div align="left"> Antecedentes</div>
            </div>
         
            <div class="box-body pad">
              <textarea id="antecedentes" name="antecedentes"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
            </div>



            <div class="form-group col-md-12">
                <div align="left">Antecedentes Familiares</div>
              <input type="text" class="form-control input-lg" id="enfermedadesPequeno" name="enfermedadesPequeno" placeholder="Antecedentes Familiares">
              
       
             
            </div>




  
              <div class="form-group col-md-12">
                <div align="left"> Motivo Consulta</div>
              </div>
            
            <div class="box-body pad">
              
                <textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
             
            </div>
           

          


                    </div>
                  </div>
                </div>
                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                        Registro inicial Odontograma
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
      


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/18.png' >   18 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d18" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n18" name="n18" placeholder="Notas para 18"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/17.png' >   17 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d17" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n17" name="n17" placeholder="Notas para 17"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/16.png' >   16 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d16" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n16" name="n16" placeholder="Notas para 16"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/15.png' >    15 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d15" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n15" name="n15" placeholder="Notas para 15"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/14.png' >    14 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d14" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n14" name="n14" placeholder="Notas para 14"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/13.png' >    13 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d13" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n13" name="n13" placeholder="Notas para 13"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/12.png' >    12 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d12" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n12" name="n12" placeholder="Notas para 12"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/11.png' >    11 </div>
                      <div class="form-group col-md-4">
                      <select  id="d11" name="d11" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n11" name="n11" placeholder="Notas para 11"></div>
                    </div>
 

<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>
 
                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/28.png' >28 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d28" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n28" name="n28" placeholder="Notas para 28"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/27.png' >27 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d27" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n27" name="n27" placeholder="Notas para 27"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/26.png' >26 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d26" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n26" name="n26" placeholder="Notas para 26"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/25.png' > 25 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d25" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n25" name="n25" placeholder="Notas para 25"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/24.png' > 24 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d24" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n24" name="n24" placeholder="Notas para 24"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/23.png' > 23 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d23" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n23" name="n23" placeholder="Notas para 23"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/22.png' > 22 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d22" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n22" name="n22" placeholder="Notas para 22"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/21.png' > 21 </div>
                      <div class="form-group col-md-4">
                      <select  id="d21" name="d21" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n21" name="n21" placeholder="Notas para 21"></div>
                    </div>

                   

                  




<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/55.png' > 55 </div>
                      <div class="form-group col-md-4">
                      <select  id="d51" name="d55" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n55" name="n55" placeholder="Notas para 55"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/54.png' > 54 </div>
                      <div class="form-group col-md-4">
                      <select  id="d51" name="d54" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n54" name="n54" placeholder="Notas para 54"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/53.png' > 53 </div>
                      <div class="form-group col-md-4">
                      <select  id="d51" name="d53" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n53" name="n53" placeholder="Notas para 53"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/52.png' > 52 </div>
                      <div class="form-group col-md-4">
                      <select  id="d51" name="d52" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n52" name="n52" placeholder="Notas para 52"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/51.png' > 51 </div>
                      <div class="form-group col-md-4">
                      <select  id="d51" name="d51" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n51" name="n51" placeholder="Notas para 51"></div>
                    </div>

                   

 














<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/65.png' > 65 </div>
                      <div class="form-group col-md-4">
                      <select  id="d61" name="d65" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n65" name="n65" placeholder="Notas para 65"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/64.png' > 64 </div>
                      <div class="form-group col-md-4">
                      <select  id="d61" name="d64" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n64" name="n64" placeholder="Notas para 64"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/63.png' > 63 </div>
                      <div class="form-group col-md-4">
                      <select  id="d61" name="d63" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n63" name="n63" placeholder="Notas para 63"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/62.png' > 62 </div>
                      <div class="form-group col-md-4">
                      <select  id="d61" name="d62" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n62" name="n62" placeholder="Notas para 62"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/61.png' > 61 </div>
                      <div class="form-group col-md-4">
                      <select  id="d61" name="d61" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n61" name="n61" placeholder="Notas para 61"></div>
                    </div>

                   

 














<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/85.png' > 85 </div>
                      <div class="form-group col-md-4">
                      <select  id="d81" name="d85" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n85" name="n85" placeholder="Notas para 85"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/84.png' > 84 </div>
                      <div class="form-group col-md-4">
                      <select  id="d81" name="d84" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n84" name="n84" placeholder="Notas para 84"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/83.png' > 83 </div>
                      <div class="form-group col-md-4">
                      <select  id="d81" name="d83" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n83" name="n83" placeholder="Notas para 83"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/82.png' > 82 </div>
                      <div class="form-group col-md-4">
                      <select  id="d81" name="d82" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n82" name="n82" placeholder="Notas para 82"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/81.png' > 81 </div>
                      <div class="form-group col-md-4">
                      <select  id="d81" name="d81" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n81" name="n81" placeholder="Notas para 81"></div>
                    </div>

                   

 











<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/75.png' > 75 </div>
                      <div class="form-group col-md-4">
                      <select  id="d71" name="d75" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n75" name="n75" placeholder="Notas para 75"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/74.png' > 74 </div>
                      <div class="form-group col-md-4">
                      <select  id="d71" name="d74" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n74" name="n74" placeholder="Notas para 74"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/73.png' > 73 </div>
                      <div class="form-group col-md-4">
                      <select  id="d71" name="d73" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n73" name="n73" placeholder="Notas para 73"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/72.png' > 72 </div>
                      <div class="form-group col-md-4">
                      <select  id="d71" name="d72" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n72" name="n72" placeholder="Notas para 72"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/71.png' > 71 </div>
                      <div class="form-group col-md-4">
                      <select  id="d71" name="d71" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n71" name="n71" placeholder="Notas para 71"></div>
                    </div>

                   

 













<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>
 
                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/48.png' >48 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d48" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n48" name="n48" placeholder="Notas para 48"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/47.png' >47 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d47" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n47" name="n47" placeholder="Notas para 47"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/46.png' >46 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d46" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n46" name="n46" placeholder="Notas para 46"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/45.png' > 45 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d45" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n45" name="n45" placeholder="Notas para 45"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/44.png' > 44 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d44" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n44" name="n44" placeholder="Notas para 44"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/43.png' > 43 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d43" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n43" name="n43" placeholder="Notas para 43"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/42.png' > 42 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d42" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n42" name="n42" placeholder="Notas para 42"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/41.png' > 41 </div>
                      <div class="form-group col-md-4">
                      <select  id="d41" name="d41" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n41" name="n41" placeholder="Notas para 41"></div>
                    </div>

                   



<div class="form-group col-md-12"> <hr style=" height: 1px;  background-color: red;"> </div>
 
                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/38.png' >38 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d38" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n38" name="n38" placeholder="Notas para 38"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/37.png' >37 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d37" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n37" name="n37" placeholder="Notas para 37"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/36.png' >36 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d36" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n36" name="n36" placeholder="Notas para 36"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/35.png' >35 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d35" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n35" name="n35" placeholder="Notas para 35"></div>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/34.png' >34 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d34" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n34" name="n34" placeholder="Notas para 34"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/33.png' >33 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d33" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n33" name="n33" placeholder="Notas para 33"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/32.png' >32 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d32" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n32" name="n32" placeholder="Notas para 32"></div>
                    </div>

                   


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-4"><img src='oG0/31.png' >31 </div>
                      <div class="form-group col-md-4">
                      <select  id="d31" name="d31" class="form-control input-lg select" style="width: 100%;"> <option value="0">Seleccione</option> <?php echo serviciosOdontoSelect()?></select>
                      </div>
                      <div class="form-group col-md-4"><input type="text" class="form-control input-lg" id="n31" name="n31" placeholder="Notas para 31"></div>
                    </div>

                   

                  








                    </div>





                    </div>
                  </div>
                </div>







<!--
                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                        Collapsible Group Success
                      </a>
                    </h4>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse">
                    <div class="box-body">
                      Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3
                      wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum
                      eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla
                      assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred
                      nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer
                      farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus
                      labore sustainable VHS.
                    </div>
                  </div>
                </div>


 -->





              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
       

















         

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



