<?php 
   include 'header.php';
   include 'menu.php';

    $clienteId = decrypt($_GET['cI']); 
    $usuarioId = decrypt($_GET['uI']); 

 $ID = $_SESSION['ID'];


$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));


                  $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $usuario_id=$rowMotorizado['usuario_id'];
                    $nombre_cliente=$rowMotorizado['nombre_cliente'];
                    $celular_cliente=$rowMotorizado['celular_cliente'];
                    $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
                    $correo_cliente=$rowMotorizado['correo_cliente'];
                    $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
                    $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
                    $tipo_cliente=$rowMotorizado['tipo_cliente'];
                    $fechar=$rowMotorizado['fechar'];
                    $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
                    $activo=$rowMotorizado['activo'];
                    $genero=$rowMotorizado['genero'];
                    $direccion_cliente=$rowMotorizado['direccion_cliente'];
                    $telefono_cliente=$rowMotorizado['telefono_cliente'];
                    $edad_cliente=$rowMotorizado['edad_cliente'];
                    $profesion_cliente=$rowMotorizado['profesion_cliente'];
                    $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
                    $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
                    $antecedentes     =$rowMotorizado['antecedentes'];   
                    $fotoperfil       =$rowMotorizado['fotoperfil']; 
                    $tiposSangre      =$rowMotorizado['tiposSangre']; 
                    $esDonante        =$rowMotorizado['esDonante']; 
                    $tomaMedicamento  =$rowMotorizado['tomaMedicamento']; 
                    
                    $fechaNacimiento  =$rowMotorizado['fechaNacimiento']; 
                 
                    $entidadSalud     =$rowMotorizado['entidadSalud']; 
                    $seguro           =$rowMotorizado['seguro']; 
                    
                    $nota           =$rowMotorizado['nota']; 
                    $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno']; 
                    $alergias           =$rowMotorizado['alergias']; 

 
          $peso           =$rowMotorizado['peso']; 
          $altura           =$rowMotorizado['altura']; 
          $imc           =$rowMotorizado['imc']; 
          $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal']; 
// ----------------------------------------------------------------------------------------------------------------------------
       

        $ap1            = $rowMotorizado['ap1'];
        $ap2            = $rowMotorizado['ap2'];
        $ap3            = $rowMotorizado['ap3'];
        $ap4            = $rowMotorizado['ap4'];
        $ap5            = $rowMotorizado['ap5'];
        $ap6            = $rowMotorizado['ap6'];
        $ap7            = $rowMotorizado['ap7'];
        $ap8            = $rowMotorizado['ap8'];
        $ap9            = $rowMotorizado['ap9'];

        $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
        $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
        $whatsapp       = $rowMotorizado['whatsapp'];
        $tipoUsuario    = $rowMotorizado['tipoUsuario'];
        $estado         = $rowMotorizado['estado'];
        
        }


                  $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID=$ID");
                  $nrowl=mysqli_num_rows($queryconfig);
                  while($rowconfig=mysqli_fetch_array($queryconfig))
                  {
                    $cie10 = $rowconfig['cie10'];
                    $pro1  = $rowconfig['pro1'];
                    $pro2  = $rowconfig['pro2'];
                  }



      ?>
     

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       Consulta médica 
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#"> Consulta médica </a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
 

          <div class="box">
         
            <!-- /.box-header -->
            <div class="box-body">


  <div class="col-md-12">




        <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
          <option selected="selected" value="">Seleccione tipo de consulta</option>
          <option>Consulta externa</option>
          <option>Urgencia</option>
          <option>Ambulatorio </option>
        </select>





          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion1">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                        Datos personales 
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                     

         
              <div class="col-md-5">
                
              <label><strong>Correo:</strong></label>
                <label> <?php echo $correo_cliente;?>  </label>
              

              <br>
                <label><strong>Nombre:</strong></label>
                 <label><?php echo $nombre_cliente;?> </label>
              

               <br>
                <label><strong>Celular:</strong></label>
                <label><?php echo $celular;?></label>
            
                <br> 
                <label><strong>Ciudad:</strong></label>
                <label><?php echo $ciudad_cliente;?></label>
             
                <br>
                <label><strong>Fecha registro:</strong></label>
                <label><?php echo $fechar;?></label>
                
               <br>
                <label><strong>Cedula o ID:</strong></label>
                <label><?php echo $CODI_CLIENTE;?></label>
               
               <br>
                <label><strong> Es donante:</strong></label>
                <label><?php echo $esDonante;?></label>
               
               <br>
                <label><strong>Entidad de salud :</strong></label>
                <label><?php echo $entidadSalud;?></label>
               
              

            </div>
       
               <div class="col-md-5">
                <label><strong>  Dirección cliente:</strong></label>
                <label><?php echo $direccion_cliente ;?></label>
             <br>
                <label><strong> Teléfono :</strong></label>
                <label><?php echo $telefono_cliente ;?></label>
                <br>
                
                <label><strong> Fecha de nacimiento :</strong></label>
                <label><?php echo $fechaNacimiento;?></label>
                
                   <br>


                <label><strong> Edad :</strong></label>
                <label><?php calculaedad($fechaNacimiento);?></label>
                
                 <br>

                  <label><strong>Genero:</strong></label>
                  <label><?php echo $genero;?></label>

               <br>
                  <label><strong>Profesión :</strong></label>
                  <label><?php echo $profesion_cliente ;?></label>

                <br>
                  <label><strong>Tipo de sangre :</strong></label>
                  <label><?php echo $tiposSangre ;?></label>   

                <br>

               <br>
                <label><strong>Seguro :</strong></label>
                <label><?php echo $seguro;?></label>
               
                 

              </div>

              <div class="col-md-2">

                <?php
                // echo strlen($logoF);
                if (strlen($fotoperfil) > 0) { 
                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                }
                else
                {

                echo '';
                }
                ?>
              <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" 
              onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
 
              </div>  
<br>


              <div class="col-md-12">
<hr>  
</div>
              <div class="col-md-12">
              <div class="col-md-12">

                <label><strong>Toma algún medicamento:</strong></label>
                <label><?php echo $tomaMedicamento ;?></label>   
</div>
    <div class="form-group col-md-2" align="right">
      Alergias a las aines  <?php echo sino($ap1)?>
    </div>  
     
    <div class="form-group col-md-2" align="right">
      Asma <?php echo sino($ap2)?>
      
    </div>

    <div class="form-group col-md-2" align="right">
      HTA <?php echo sino($ap3)?>
     </div> 

    <div class="form-group col-md-2" align="right">
      Diabetes <?php echo sino($ap4)?>

    </div>
 
    <div class="form-group col-md-2" align="right">
      Hipotiroidismo <?php echo sino($ap5)?>
    
    </div>

    <div class="form-group col-md-2" align="right">
      Tabaquismo <?php echo sino($ap6)?>
  
    </div>

    <div class="form-group col-md-2" align="right">
      Licor <?php echo sino($ap7)?>
  
    </div>

    <div class="form-group col-md-2" align="right">
      Otras Alergias <?php echo sino($ap8)?>
 
    </div>

    <div class="form-group col-md-2" align="right">
      Cirugías <?php echo sino($ap9)?>
  
    </div>
    </div>


    <div class="form-group col-md-12" >
 
                <label><strong>Antecedentes Familiares:</strong></label>
                <label><?php echo $antecedentes;?></label>.
              <br>
                <label><strong>Alergias :</strong></label>
                <label><?php echo $alergias;?></label>

                <br>
               
                <label><strong>Notas adicionales :</strong></label>
                <label><?php echo $nota;?></label>.

              </div>
            
 



                    </div>
                  </div>
                </div>

 <form action="guardarhistoriaClinica9quirurgico.php" method="POST" name="formularioActualizarcliente">




































<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->  
<!--  *******************************  QUIRURGICO  **************************** -->   







<div class="row">
        <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
         



















                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
                       Razón(es) primaria (as) para buscar consulta quiropráctica
                      </a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="box-body">
                      <div class="col-md-4">
                         

              <div class="form-group col-md-6">
              <div align="left">  Razón primaria (malestar principal) </div>
                <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad"  placeholder=" Razón primaria (malestar principal)" >
              </div> 

              <div class="form-group col-md-6">
              <div align="left">  Razón secundaria   </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="Razón secundaria" >
              </div> 


                         

 




                      </div>
                     </div>
                  </div>
                </div>






                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
                       Malestar principal
                      </a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="box-body">
                     
                         

              <div class="form-group col-md-6">
              <div align="left">  Localización del malestar  </div>
                <input type="text" class="form-control input-lg" id="nacionalidad" name="nacionalidad"  placeholder=" Localización del malestar " >
              </div> 

              <div class="form-group col-md-6">
              <div align="left">¿Cómo y cuándo comienza el malestar?    </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="¿Cómo y cuándo comienza el malestar? " >
              </div> 


                <div class="col-md-6">
                      <label> Seleccionar la calidad del dolor/queja  </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="Devil" selected="selected">Devil </option>
                      <option value="Doloroso" >Doloroso  </option>
                      <option value="Punsante">Punsante </option>
                      <option value="Disparado" >Disparado </option>
                      <option value="Quemante" >Quemante </option>
                      <option value="Palpitante" >Palpitante </option>
                      <option value="Profundo" >Profundo </option>
                      <option value="Molesto" >Molesto </option>
                       
                        
                      </select>

                    </div>          


              <div class="form-group col-md-6">
              <div align="left">La queja/dolor se irradia o viaja a otra área de su cuerpo?, ¿Cúal área?     </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="¿Cómo y cuándo comienza el malestar? " >
              </div> 

 

              <div class="form-group col-md-6">
              <div align="left">¿Tiene algún entumesimiento en su cuerpo?, ¿Donde?   </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="¿Cómo y cuándo comienza el malestar? " >
              </div> 

 
                  <div class="col-md-6">
                      <label> Grado de la intensidad/severidad del dolor, de 0 (ninguna queja/dolor) hasta 10 (El peor dolor/queja imaginable) </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="1" selected="selected"> 1</option>
                      <option value="2" >2  </option>
                      <option value="3">3 </option>
                      <option value="4" >4 </option>
                      <option value="5" >5 </option>
                      <option value="6" >6 </option>
                      <option value="7" >7 </option>
                      <option value="8" >8 </option>
                      <option value="8" >8 </option>
                      <option value="9" >9 </option>
                      <option value="10" >10 </option>
                       
                        
                      </select>

                  </div>



              <div class="form-group col-md-6">
              <div align="left">¿Con que frecuencia siente el dolor?, ¿Cuánto duró la última vez que ocurrió?    </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="¿Con que frecuencia siente el dolor?, ¿Cuánto duró la última vez que ocurrió?" >
              </div> 

 

              <div class="form-group col-md-6">
              <div align="left">¿Algo agrava el malestar?  </div>
                <input type="text" class="form-control input-lg" id="direccion_cliente" name="direccion_cliente" placeholder="¿Algo agrava el malestar?" >
              </div> 






                     
                     </div>
                  </div>
                </div>













                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3">
                      Intervenciones previas
                      </a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="box-body">
                     
                         

<div class="form-group col-md-12">
<div align="left"> Intervenciones previas, tratamientos, medicaciones, cirugías u otros cuidados que usted haya buscado para su malestar
</div>
 <textarea id="nota" name="nota"  class="textarea"   style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
</div> 
 






                     
                     </div>
                  </div>
                </div>












  




                <div class="panel box box-success">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                      Evaluación funcional 
                      </a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="box-body">

                    <div class="col-md-4">
                      <label> Intensidad de dolor </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Ningun dolor" selected="selected">0-Ningun dolor </option>
                      <option value="1-Dolor ligero" >1-Dolor ligero </option>
                      <option value="2- Dolor moderado" >2- Dolor moderado </option>
                      <option value="3-Dolor severo" >3-Dolor severo </option>
                      <option value="4-El peor dolor posible" >4-El peor dolor posible </option>
                        
                      </select>

                    </div>
                     
                    <div class="col-md-4">
                      <label> Sueño </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Sueño perfecto" selected="selected"> 0-Sueño perfecto </option>
                      <option value="1-Disturbios ligeros"> 1-Disturbios ligeros </option>
                      <option value="2-Disturbio moderado"> 2-Disturbio moderado </option>
                      <option value="3-Gran disturbio">3-Gran disturbio  </option>
                      <option value="4-Sueño totalmente disturbado"> 4-Sueño totalmente disturbado </option>
                   
                      
                        
                      </select>

                    </div>
                     

                      
                    <div class="col-md-4">
                      <label>  Cuidados personales (baños, vestimenta, etc.)  </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value=" 0-Ningún dolor, ninguna restricción" selected="selected">  0-Ningún dolor, ninguna restricción  </option>
                      <option value="1-Dolor ligero ninguna restricción"> 1- Dolor ligero ninguna restricción</option>
                      <option value="2-Dolor moderado en grandres recorridos"> 2-Dolor moderado en grandres recorridos </option>
                      <option value="3- Dolor moderado en rrecorridos cortos">3- Dolor moderado en rrecorridos cortos  </option>
                      <option value="4-Dolor severo en recorridos cortos">4-Dolor severo en recorridos cortos </option>
                      
                        
                      </select>

                    </div>
                     

                    
                      
                    <div class="col-md-4">
                      <label>  Desplazamiento (Conducción, etc.)  </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Ningún dolor en grandes rrecorridos" selected="selected">0-Ningún dolor en grandes rrecorridos </option>
                      <option value=" 1-Dolor ligero en grandes rrecorridos"> 1-Dolor ligero en grandes rrecorridos </option>
                      <option value=" 2-Dolor moderado en grandres recorridos"> 2-Dolor moderado en grandres recorridos </option>
                      <option value=" 3- Dolor moderado en rrecorridos cortos">  3- Dolor moderado en rrecorridos cortos </option>
                      <option value=" 4-Dolor severo en recorridos cortos"> 4-Dolor severo en recorridos cortos  </option>
                       
                        
                      </select>

                    </div>
                     

                    

                    
                      
                    <div class="col-md-4">
                      <label> Trabajo </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Usual + Extra" selected="selected">0-Usual + Extra  </option>
                      <option value="1-Usual , Ningún Extra  ">  1-Usual , Ningún Extra  </option>
                       <option value="2-50% del usual">2-50% del usual  </option>
                      <option value="3-25% del usual"> 3-25% del usual </option>
                      <option value="4- No puede trabajar"> 4- No puede trabajar </option>
                     
                        
                      </select>

                    </div>
                     

                    



                    
                      
                    <div class="col-md-4">
                      <label>  Recreación </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0- Todas las actividades   " selected="selected">0- Todas las actividades     </option>
                      <option value="1-Muchas actividades"> 1-Muchas actividades </option>
                       <option value="2-Algunas actividades">2-Algunas actividades  </option>
                      <option value="3-Pocas actividades"> 3-Pocas actividades </option>
                      <option value="4-Ninguna actividad">4-Ninguna actividad  </option>
                      
                      </select>

                    </div>
                     

                    




                    
                      
                    <div class="col-md-4">
                      <label>  Frecuencia del dolor </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Ningún dolor" selected="selected"> 0-Ningún dolor </option>
                      <option value="1-Ocasional (25%)"> 1-Ocasional (25%) </option>
                       <option value="2-Intermitente (50%)">2-Intermitente (50%)  </option>
                      <option value="3-Frecuente (75%)">  3-Frecuente (75%)</option>
                      <option value="4-Constante (100%)">4-Constante (100%)  </option>
                      
                        
                      </select>

                    </div>
                     

                    


                     
                      
                    <div class="col-md-4">
                      <label> Levantamiento</label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value=" 0- Ningún dolor con gran peso" selected="selected"> 0- Ningún dolor con gran peso </option>
                      <option value=" 1-Dolor incrementado con gran peso"> 1-Dolor incrementado con gran peso </option>
                       <option value="2-Dolor incrementado con peso moderado"> 2-Dolor incrementado con peso moderado </option>
                      <option value=" 3- Dolor incrementado con peso ligero">  3- Dolor incrementado con peso ligero  </option>
                      <option value="  4- Dolor incrementado con cualquier peso">  4- Dolor incrementado con cualquier peso </option>
                      
                      </select>

                    </div>
                     

                    




                    
                      
                    <div class="col-md-4">
                      <label> Caminata</label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value=" 0-Ningún dolor con cualquier distancia" selected="selected"> 0-Ningún dolor con cualquier distancia  </option>
                      <option value=" 1-Incrementa el dolor después de una milla"> 1-Incrementa el dolor después de una milla </option>
                       <option value=" 2- Incrementa el dolor después de media milla"> 2- Incrementa el dolor después de media milla </option>
                      <option value="3-Dolor incrementado después de 1/4 de milla">3-Dolor incrementado después de 1/4 de milla  </option>
                      <option value=" 4- Dolor incrementado en cualquier distancia">  4- Dolor incrementado en cualquier distancia  </option>
                      
                      </select>

                    </div>
                     
 
 


                    
                      
                    <div class="col-md-4">
                      <label> Actitud de pie</label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                      <option value="0-Ningún dolor en cualquier momento" selected="selected">0-Ningún dolor en cualquier momento  </option>
                      <option value="1-Dolor incrementado después de unas horas">1-Dolor incrementado después de unas horas  </option>
                       <option value="2-Dolor incrementado después de una hora">2-Dolor incrementado después de una hora  </option>
                      <option value="3-Dolor incrementado después de 1/2 hora"> 3-Dolor incrementado después de 1/2 hora </option>
                      <option value="4-Inmediato incremento del dolor">  4-Inmediato incremento del dolor</option>
                      
                        
                      </select>

                    </div>
                     


                    <div class="col-md-4">
                      <!--  Total   (/4, X10) = Índice de evaluación funcional  % -->
                      <label> Total   
                        <input type="text" class="form-control input-lg" name="CODI_CLIENTE"   required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" /></label>
                      
                    </div>
                   
                    <div class="col-md-4">
                      <!--  Total   (/4, X10) = Índice de evaluación funcional  % -->
                      
                      <label> Índice de evaluación funcional    
                        <input type="text" class="form-control input-lg" name="CODI_CLIENTE"   required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" /></label>
                    </div>
                     

                    


   




                    </div>
                  </div>
                </div>





               








               



















              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>




























































<hr>  
 
                <div class="col-sm-12">
                  <div align="center"> 
 

                    <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                  </div>
                   
                </div>




                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Fecha </label>
                  </div>
                  <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                  <div id="div-results"></div>
                </div>


                <div class="col-sm-6">
                  <div align="left"> 
                    <label>Hora </label>
                  </div>
                 <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
           <div id="div-resultsHora"></div>

                </div>
                  
                <div class="col-sm-6">

                   <div align="left"> 
                    <label>Motivo consulta</label>
                  </div>
                  <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
 
                </div>
                 


<div class="col-sm-6">
 <label>Especialista </label>
                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                    <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                    <?php
                      usuariosAselect($ID);

                    ?>
                </select>

  </div>

<div class="col-sm-6">
                 
                <br>
                <br>
               <label>
                  <input type="radio" name="P" value="0" class="flat-red" >
                 <i class="fa fa-user"></i>  Presencial  
                
                  <input type="radio" name="P" value="1"  class="flat-red"  >
                 <i class="fa fa-video-camera"></i>   Virtual
                </label>
              </div>



                    <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                    <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                    <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">

                    
                    <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                    
                    <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                    
                    <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
              
            

            <div align="center"> 
                       <br>
            <br>
            <br>
             <div class="col-sm-12">
                <br>
            <br>
            <center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>
            
            </div>
            </div>
             
                 



           
            <input type="hidden"  name="tipo_cliente"   valur="1">
           </div>   
            
      		</form>


 


     
    </div>
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
          
          
          
     

<?php include("footer.php")?>


<script type="text/javascript">

 
</script>