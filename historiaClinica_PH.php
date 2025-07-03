<?php include 'header.php';
include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
        <li><a href="patientes.php"> Unidades móviles de salud y atención prehospitalaria </a></li>
          
      </ol>
    </section>
  
<br>      
 
     
<section class="content">
  
<div  class="box box-info" align="center">
 
 <div class="card-body">
          <h4 class="card-title"> Unidades móviles de salud y atención prehospitalaria  </h4>
        
          <div align="right"> Fecha <?php echo date("m-d-Y")?>  Hora:<?php echo date("h:m:s")?> </div>
          <br>
           <form action="nuevoPacientePreHospitalario" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
            <div class="form-row">


            <div class="form-group col-md-3">
                 <div align="left">  Fecha de llamada </div>
                <input type="date" class="form-control input-lg" name="fllamada" placeholder="fllamada" required    />
              
              </div>
            <div class="form-group col-md-3">
                 <div align="left"> Hora de llamada</div>
                <input type="time" class="form-control input-lg" name="hllamada" placeholder="hllamada" required    />
              
              </div>
            <div class="form-group col-md-3">
                 <div align="left"> Hora de llegada</div>
                <input type="time" class="form-control input-lg" name="hllegada" placeholder="hllegada" required    />
              
            </div>
            <div class="form-group col-md-3">
                 <div align="left"> Reportado por:</div>
                <input type="text" class="form-control input-lg" name="reportadoPor" placeholder="reportadoPor" required    />
              
            </div>



  <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion1">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                




                <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                       DATOS GENERALES 
                      </a>
                    </h4>
                  </div>


                  <div id="collapseOne" class="panel-collapse collapse">
                    <div class="box-body">
                   

   
                  <div class="form-group col-md-3">
                   TRAUMA 
                    
                  <input value="1" type="checkbox"name="TRAUMA" id="lt" class="minimal"/>  

                  </div>                   
                  <div class="form-group col-md-3">
                   OBSTETRICIA 
                    
                  <input value="1" type="checkbox"name="OBSTETRICIA" id="lt" class="minimal"/>    

                  </div>                   
                  <div class="form-group col-md-3">
                   CLINICA 
                    
                  <input value="1" type="checkbox"name="CLINICA" id="lt" class="minimal"/>   

                  </div>                   
                  <div class="form-group col-md-3">
                   PSIQUIATRIA 
                    
                  <input value="1" type="checkbox"name="PSIQUIATRIA" id="lt" class="minimal"/>  

                  </div>                   







             <div class="form-group col-md-3">
                 <div align="left">CEDULA</div>
                <input type="text" class="form-control input-lg" name="CODI_CLIENTE" placeholder="Cedula" required  pattern="[A-Za-z0-9_-]{1,15}" id="txtRut" />
              <div id="div-results"></div>
              </div>


              <div class="form-group col-md-4">
                <div align="left"> NOMBRE DE LA VICTIMA </div>
                
                <input type="text" class="form-control input-lg" id="nombre_cliente" name="nombre_cliente" placeholder="Nombre"  required>
              </div>

               <div class="form-group col-md-3">
                  <div align="left">  Fecha de nacimiento </div>
                <input type="date" class="form-control input-lg" id="fechaNacimiento" name="fechaNacimiento" placeholder="Edad" required>
              </div>

              <div class="form-group col-md-2">
                  <div align="left">  Edad </div>
              <input type="number" class="form-control input-lg" id="edad" name="edad" placeholder="Edad" required>
                
              </div>



              <div class="form-group col-md-2">
                <div align="left">  Sexo </div>
               
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                  <option>M</option>
                  <option>F</option>
                  <option>Otro</option>
                   
                </select>

              </div>
           
 

              <div class="form-group col-md-2">
              <div align="left"> Hora de despacho </div>
                <input type="time" class="form-control input-lg" id="nacionalidad" name="nacionalidad" >
              </div> 



              <div class="form-group col-md-4">
              <div align="left"> Dirección del evento </div>
                <input type="text" class="form-control input-lg" id="direccionEvento" name="direccionEvento" placeholder="Dirección del evento" >
              </div> 

              <div class="form-group col-md-4">
              <div align="left"> ESCENARIO DEL EVENTO </div>
                <input type="text" class="form-control input-lg" id="direccionEvento" name="direccionEvento" placeholder="ESCENARIO DEL EVENTO" >
              </div> 


              <div class="form-group col-md-4">
              <div align="left">FECHA Y  HORA DEL EVENTO</div>
                <input type="datetime-local" class="form-control input-lg" id="direccionEvento" name="direccionEvento"   >
              </div> 


              <div class="form-group col-md-4">
              <div align="left">FECHA Y  HORA DE LA ATENCION</div>
                <input type="datetime-local" class="form-control input-lg" id="direccionEvento" name="direccionEvento"   >
              </div> 


              <div class="form-group col-md-2">
              <div align="left">VEHICULO IDENTIFICADO</div>
                <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
                  <option>SI</option>
                  <option>NO</option>
                </select>
              </div> 

             <div class="form-group col-md-2">
              <div align="left">NUMERO DE PLACA</div>
                  <input type="text" class="form-control input-lg" id="direccionEvento" name="direccionEvento" placeholder="NUMERO DE PLACA" >

              </div> 


             <div class="form-group col-md-2">
              <div align="left">SOAT</div>
                  
               <input value="1" type="checkbox"name="SOAT" id="lt" class="minimal"/> SI  
                      <input value="2" type="checkbox"name="SOAT" id="lt" class="minimal"/> NO  

              </div> 
             <div class="form-group col-md-2">
              <div align="left">ASEGURADORA</div>
                  <input type="text" class="form-control input-lg" id="ASEGURADORA" name="ASEGURADORA" placeholder="ASEGURADORA" >

              </div> 

             <div class="form-group col-md-2">
              <div align="left">NUMERO POLIZA</div>
                  <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="NUMERO POLIZA" >

              </div> 











 

                    </div>
                  </div>
                </div>






                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne2">
                        INTERROGATORIO
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne2" class="panel-collapse collapse">
                    <div class="box-body">
                   
                    <div align="left"> <font size="1"> ANTECEDENTES DEL EVENTO, SINTOMAS, MEDICAMENTOS QUE RECIBE. CINEMATICA </font>  | 
                       
                   <strong>ALERGIAS </strong>  
                    
                  <input value="1" type="checkbox"name="ALERGIAS" id="lt" class="minimal"/>  

               
                  <strong>ADICCIONES </strong>  
                    
                  <input value="1" type="checkbox"name="ADICCIONES" id="lt" class="minimal"/>   
                       

                      


                    </div>  

                    <textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder=" ANTECEDENTES DEL EVENTO, SINTOMAS, MEDICAMENTOS QUE RECIBE. CINEMATICA " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>





                    </div>
                  </div>
                </div>






                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne3">
                        EXAMEN FÍSICO Y DIAGNÓSTICO
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne3" class="panel-collapse collapse">
                    <div class="box-body">
                   


                  <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>       1. VIA AEREA OBSTRUIDA   <strong> | </strong>       <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>          


2. ALIENTO ALCOHOLICO  <strong> | </strong>    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>             3. LESION EN CABEZA <strong> | </strong>     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>                4. LESION EN CUELLO   <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>            <strong> | </strong>       5. LESION ENTORAX    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>       <strong> | </strong>          6. LESION EN ABDOMEN   <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>         <strong> | </strong>         7. LESION EN PELVIS     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>    <strong> | </strong>         8. LESION EN COLUMNA      <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>    <strong> | </strong>         9. LESION EN MIEMBROS      




<div class="form-group col-md-12">

                    <textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="EXAMEN FÍSICO Y DIAGNÓSTICO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

</div>


<div class="form-group col-md-4">
<div align="left">DIAGNOSTICOS PRESUNTIVOS</div>
    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="DIAGNOSTICOS PRESUNTIVOS" >

</div> 

<div class="form-group col-md-4">
<div align="left">ESTADO INICIAL</div>
  <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
    <option>Grave</option>
    <option>Moderado</option>
    <option>Leve</option>
  </select>
</div> 

<div class="form-group col-md-4">
<div align="left">ESTADO FINAL</div>
  <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
    <option>Grave</option>
    <option>Moderado</option>
    <option>Leve</option>
  </select>
</div> 



                    </div>
                  </div>
                </div>






                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne4">
                        SIGNOS VITALES
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne4" class="panel-collapse collapse">
                    <div class="box-body">
                   


                     




 <style type="text/css">
.tg  {border-collapse:collapse;border-spacing:0;}
.tg td{font-family:Arial, sans-serif;font-size:14px;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg th{font-family:Arial, sans-serif;font-size:14px;font-weight:normal;padding:10px 5px;border-style:solid;border-width:1px;overflow:hidden;word-break:normal;border-color:black;}
.tg .tg-nrw1{font-size:10px;text-align:center;vertical-align:top}
.tg .tg-baqh{text-align:center;vertical-align:top}
.tg .tg-0lax{text-align:left;vertical-align:top}
</style>
<table class="tg" width="100%">
  <tr>
    <th class="tg-0lax"></th>
    <th class="tg-baqh" colspan="4">SIGNOS VITALES</th>
    <th class="tg-baqh" colspan="4">ESCALA DE COMA DE GLASGOW</th>
    <th class="tg-baqh" colspan="2">PUPILAS<br>DERECHA</th>
    <th class="tg-baqh" colspan="2">PUPILAS<br>IZQUIERDA</th>
  </tr>
  <tr>
    <td class="tg-0lax">LUGAR</td>
    <td class="tg-nrw1">PULSO /<br>min</td>
    <td class="tg-nrw1">TEMPER.<br>ºC</td>
    <td class="tg-nrw1">PRESION ARTERIAL<br>mm Hg</td>
    <td class="tg-nrw1">FRECUENCIA <br>RESPIR. / min</td>
    <td class="tg-nrw1">APERTURA <br>OJOS  (4)</td>
    <td class="tg-nrw1">RESPUESTA <br>VERBAL  (5)</td>
    <td class="tg-nrw1">RESPUESTA <br>MOTORA  (6)</td>
    <td class="tg-nrw1">TOTAL <br>GLASGOW  (15)</td>
    <td class="tg-nrw1">REACCION<br>(RN-RL-RR)</td>
    <td class="tg-nrw1">DILATACION<br>(DN-DD-DA)</td>
    <td class="tg-nrw1">REACCION<br>(RN-RL-RR)</td>
    <td class="tg-nrw1">DILATACION<br>(DN-DD-DA)</td>
  </tr>
  <tr>
    <td class="tg-0lax">ESCENA</td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
  </tr>
  <tr>
    <td class="tg-0lax">TRANSPORTE</td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
  </tr>
  <tr>
    <td class="tg-0lax">ENTREGA</td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
    <td class="tg-0lax"> <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" ></td>
  </tr>
   
</table>










                    </div>
                  </div>
                </div>









                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne5">
                        TRAUMA
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne5" class="panel-collapse collapse">
                    <div class="box-body">
                   








<div class="form-group col-md-4">
 VIOLENCIA <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>    

</div>
<div class="form-group col-md-4">
 ACCIDENTE<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>   

</div>
<div class="form-group col-md-4">
  AUTO AGRESION<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>
                       
  
<div class="form-group col-md-6">
<div align="left">ACCIDENTE TRANSITO</div>
  <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
    <option>VICTIMA CONDUCTOR</option>
    <option>VICTIMA PASAJERO </option>
    <option>VICTIMA PEATON</option>
    <option>AUTOMOVIL-CAMIONETA</option>
    <option>AUTOBUS</option>
    <option> VEHICULO PESADO</option>
    <option> MOTO</option>
    <option>BICICLETA </option>
    <option> IMPACTO FRONTAL</option>
    <option> IMPACTO LATERAL</option>
    <option> IMPACTO POSTERIOR</option>
    <option>ATROPELLO DE VEHICULO</option>
    <option>CAIDA DE VEHICULO </option>
    <option>CHOQUE DE VEHICULO </option>
    <option>EXPULSION DE VEHICULO </option>
    <option>VOLCAMIENTO </option>
    <option>BOLSA INFLADA </option>
    <option>CINTURON COLOCADO</option>
    <option>CASCO COLOCADO </option>
    <option>ROPA PROTECTORA </option>
    <option>EN ASIENTO DELANTERO </option>
    <option>EN ASIENTO POSTERIOR </option>
    <option>VICTIMA ATRAPADA </option>
    <option>OTRO VEHICULO </option>
   
  </select>
</div> 

<div class="form-group col-md-6">
<div align="left">OTROS</div>
  <select  id="genero" name="genero" class="form-control input-lg select" style="width: 100%;">
    <option>HERIDA POR ARMA DE FUEGO </option>
    <option> HERIDA POR ARMA CORTANTE</option>
    <option>HERIDA POR ARMA PUNZANTE</option>
    <option>HERIDA POR OTRO OBJETO </option>
    <option>QUEMADURA</option>
    <option>APLASTAMIENTO </option>
    <option>MORDEDURA </option>
    <option>FRACTURA</option>
    <option>CUERPO EXTRAÑO </option>
    <option>CAIDA</option>
    <option>AGRESION SEXUAL</option>
    <option>AGRESION FISICA </option>
    <option>AGRESION INTRAFAMILIAR </option>
    <option>ENVENENAMIENTO </option>
    <option>INTOXICACION</option>
    <option>OTRO </option>
    
  </select>
</div> 








                    </div>
                  </div>
                </div>















                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne6">
                        EMERGENCIA GINECO-OBSTETRICA Y NEONATAL
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne6" class="panel-collapse collapse">
                    <div class="box-body">
                   


                     
<div class="form-group col-md-4">
 PARTO <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>    

</div>
<div class="form-group col-md-4">
 ABORTO<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>   

</div>
<div class="form-group col-md-4">
 SANGRADO<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>





<div class="form-group col-md-3">
FECHA ULTIMA MENSTRUACIÓN     
<input type="date" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" >
</div>
<div class="form-group col-md-3">
SEMANA DE EMBARAZO   
<input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="SEMANA DE EMBARAZO" >
</div>

<div class="form-group col-md-3">
GESTAS   
<input type="text" class="form-control input-lg" id="GESTAS" name="GESTAS" placeholder="GESTAS" >
</div>
<div class="form-group col-md-3">
PARTOS   
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="PARTOS" >
</div>
<div class="form-group col-md-3">
ABORTOS   
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="PARTOS" >
</div>
<div class="form-group col-md-3">
CESÁREAS   
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="PARTOS" >
</div>
<div class="form-group col-md-3">
MEMBRANAS INTEGRAS   
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="MEMBRANAS INTEGRAS" >
</div>
<div class="form-group col-md-3">
MEMBRANAS ROTAS  
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="MEMBRANAS ROTAS " >
</div>

<div class="form-group col-md-3">
TIEMPO DE  RUPTURA 
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="TIEMPO DE  RUPTURA " >
</div>

<div class="form-group col-md-3">
PRESENTACIÓN
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="PRESENTACIÓN" >
</div>
<div class="form-group col-md-3">
DILATACIÓN
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="DILATACIÓN" >
</div>

<div class="form-group col-md-3">
BORRAMIENTO
<input type="text" class="form-control input-lg" id="PARTOS" name="PARTOS" placeholder="BORRAMIENTO" >
</div>

<div class="form-group col-md-3">
PLANO
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="PLANO" >
</div>

<div class="form-group col-md-3">
ALTURA UTERINA
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="ALTURA UTERINA" >
</div>

<div class="form-group col-md-3">
F. CARDIACA FETAL
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="F. CARDIACA FETAL" >
</div>

<div class="form-group col-md-3">
 
</div>




                     
<div class="form-group col-md-3">
 MOVIMIENTO FETAL <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>    

</div>
<div class="form-group col-md-3">
 EXPULSIVO<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>   

</div>
<div class="form-group col-md-3">
 ECLAMPSIA<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>
<div class="form-group col-md-3">
 PRE ECLAMPSIA<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>




<div class="form-group col-md-12">
 CONTRACCIONES UTERINAS
<div class="form-group col-md-12">

  <div class="form-group col-md-3">
  HORA  
  </div>
  <div class="form-group col-md-3">
    <input type="time" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="HORA" >
  </div>
  <div class="form-group col-md-3">
    <input type="time" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="HORA" >
  </div>
  <div class="form-group col-md-3">
    <input type="time" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="HORA" >
  </div>

</div>

<div class="form-group col-md-12">

  <div class="form-group col-md-3">
  NUMERO  
  </div>
  <div class="form-group col-md-3">
    <input type="number" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="NUMERO" >
  </div>
  <div class="form-group col-md-3">
    <input type="number" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="NUMERO" >
  </div>
  <div class="form-group col-md-3">
    <input type="number" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="NUMERO" >
  </div>

</div>
<div class="form-group col-md-12">

  <div class="form-group col-md-3">
  INTENSIDAD  
  </div>
  <div class="form-group col-md-3">
    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="INTENSIDAD" >
  </div>
  <div class="form-group col-md-3">
    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="INTENSIDAD" >
  </div>
  <div class="form-group col-md-3">
    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="INTENSIDAD" >
  </div>

</div>



</div>














<div class="form-group col-md-4">
SEXO R.N.  (H / M)
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="PLANO" >
</div>

<div class="form-group col-md-4">
APGAR  1  MINUTO
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="ALTURA UTERINA" >
</div>

<div class="form-group col-md-4">
APGAR  5  MINUTOS
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="F. CARDIACA FETAL" >
</div>









                    </div>
                  </div>
                </div>





 


                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne7">
                        PARO CARDIO RESPIRATORIO
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne7" class="panel-collapse collapse">
                    <div class="box-body">
                   

                     
<div class="form-group col-md-3">
 PRESENCIADO X PERSONAL SEM <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>    

</div>
<div class="form-group col-md-3">
 PRESENCIADO X ESPECTADOR<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>   

</div>
<div class="form-group col-md-3">
 NO PRESENCIADO<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>
<div class="form-group col-md-3">
 RCP X PERSONAL ENTRENADO<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>
                               


<div class="form-group col-md-3">
RCP  X  LEGO<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>
<div class="form-group col-md-3">
 SE UTILIZA DESFIBRILADOR<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>

</div>


<div class="form-group col-md-3">
DURACION RCP ANTES LLEGADA
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="DURACION RCP ANTES LLEGADA" >
</div>

<div class="form-group col-md-3">
DURACION DEL PARO
<input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="DURACION DEL PARO" >
</div>





                    </div>
                  </div>
                </div>










 


                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne8">
                        LOCALIZACION DEL TRAUMA
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne8" class="panel-collapse collapse">
                    <div class="box-body">
                   
 







<div class="form-group col-md-12">
<div class="form-group col-md-6">


        <div class="form-group col-md-6">
           1 HERIDA PENETRANTE

        </div>
       <div class="form-group col-md-6">       
2 HERIDA NO PENETRANTE
        </div>
       




<div class="form-group col-md-6">
3 ESGUINCE
</div>
<div class="form-group col-md-6">
4 LUXACION
</div>

<div class="form-group col-md-6">
5 FRACTURA CERRADA
</div>
<div class="form-group col-md-6">
6 FRACTURA EXPUESTA
</div>

<div class="form-group col-md-6">
 7 HEMATOMA
</div>
<div class="form-group col-md-6">
 8 AMPUTACION
</div>
<div class="form-group col-md-6">
 9 MORDEDURA
</div>
<div class="form-group col-md-6">
 10 CUERPO EXTRAÑO
</div>
<div class="form-group col-md-6">
 11 QUEMADURA
</div>
<div class="form-group col-md-6">
 12 APLASTAMIENTO
</div>
</div>


 

<div class="form-group col-md-6">
              
<img src="{$Base}/img/diagramaCuerpo.png"  height="50%" width="50%">
             
</div>





</div>





















                    </div>
                  </div>
                </div>













                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne9">
                        PROCEDIMIENTOS
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne9" class="panel-collapse collapse">
                    <div class="box-body">
                   



                    <div class="form-group col-md-6">
                    VENTILACIÓN MANUAL
                    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="VENTILACIÓN MANUAL" >
                    </div>

                    <div class="form-group col-md-6">
                    VENTILACIÓN MECANICA
                    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="VENTILACIÓN MECANICA" >
                    </div>

                    <div class="form-group col-md-6">
                    OXIGENTERAPIA  (VOLUMEN/MIN)
                    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="OXIGENTERAPIA  (VOLUMEN/MIN)" >
                    </div>

                    <div class="form-group col-md-6">
                    FLUIDOTERAPIA (VOLUMEN)
                    <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="FLUIDOTERAPIA (VOLUMEN)" >
                    </div>






                    <div class="form-group col-md-3">
                    MEDICACION<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    PUNCION CRICOTIROIDEA<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    INTUBACIÓN<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    INMOILIZACION  PARCIAL<input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    INMOVILIZACION TOTAL     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                     DESCOMPRE SION TORAX     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    SONDAJE VESICAL     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    SONDAJE NASOGASTRICO     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    EXTRACCION C. EXTRAÑO     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    SUTURA / CURACION     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>
                    <div class="form-group col-md-3">
                    TAPONAMIENTO NASAL     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>

                    <div class="form-group col-md-3">
                    HEMOSTASIA     <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>



                    </div>
                  </div>
                </div>

















                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne10">
                        ENTREGA DEL PACIENTE
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne10" class="panel-collapse collapse">
                    <div class="box-body">
                   





                    <div class="form-group col-md-6">
                    VIVO    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>

                    <div class="form-group col-md-6">
                    MUERTO    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>




                    <div class="form-group col-md-4">
                    HORA LLEGADA  <input type="time" class="form-control input-lg" id="PLANO" name="PLANO"  >
                    </div>
                    <div class="form-group col-md-4">
                    CARGO DE QUIEN ENTREGA  <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="CARGO DE QUIEN ENTREGA" >
                    </div>
                    <div class="form-group col-md-4">
                    RESPONSABLE QUE ENTREGA  <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="CARGO DE QUIEN ENTREGA" >



                    <a href="javascript:finestraSecundaria('{$Base}/firma2/docs/')"> Registrar Firma</a>
                    <script language=javascript>
                    function finestraSecundaria (url){
                    window.open(url, "Registrar Firma", "width=600, height=400")
                    }
                    </script>





                    MANEJO AMBULATORIO    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>


 

                    </div>


                    <div class="form-group col-md-4">
                    HORA ENTREGA  <input type="time" class="form-control input-lg" id="PLANO" name="PLANO"  >
                    </div>
                    <div class="form-group col-md-4">
                    UNIDAD QUE RECIBE  <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder=" UNIDAD QUE RECIBE" >
                    </div>
                    <div class="form-group col-md-4">
                   RESPONSABLE QUE RECIBE <input type="text" class="form-control input-lg" id="PLANO" name="PLANO" placeholder="RESPONSABLE QUE RECIBE" >

                    <a href="javascript:finestraSecundaria('{$Base}/firma2/docs/')"> Registrar Firma</a>
                    <script language=javascript>
                    function finestraSecundaria (url){
                    window.open(url, "Registrar Firma", "width=600, height=400")
                    }
                    </script>

                    INTERNADO   <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>






                    </div>



                     













                    </div>
                  </div>
                </div>
























                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne11">
                        MEDICAMENTOS
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne11" class="panel-collapse collapse">
                    <div class="box-body">
                   










  
                 <div class="col-md-6">

                <label>Producto</label> <br>
                Referencia | Medicamento | Presentación
                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="cargarcosto();">
                    <option value="" selected="selected">Seleccione producto</option>
                    <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios WHERE usuario_id = $ususario_id order by descripcion");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $descripcion     = $row_recordset32['descripcion'];
                                          $existencia      = $row_recordset32['existencia'];
                                          $cliente_id      = $row_recordset32['cliente_id'];
                                          $referencia      = $row_recordset32['referencia'];
                                          $ID              = $row_recordset32['ID'];

                                          
                                          echo "<option value='$ID'>$referencia | $descripcion | $existencia</option>";
                                      }

                    ?>
 
                </select>
</div>

            

              <div class="form-group col-md-2">
                  <br>

              <div align="left">Costo</div>
<div  id="div-results-costo"></div>
                

              </div>
                <div class="form-group col-md-2">
                  <br>

                 <div align="left">Cantidad</div>
                <input type="number" min="1" value="1" class="form-control input-lg" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="ususario_id" value="<?php echo  $ususario_id?>" required>
              </div>


              <div class="form-group col-md-2">
              <br>
              <br>
              <a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>

              </div>










                      





                    </div>
                  </div>
                </div>


























                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne12">
                        INSUMOS MEDICOS
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne12" class="panel-collapse collapse">
                    <div class="box-body">
                   


                     

  
                 <div class="col-md-6">

                <label>Producto</label> <br>
                Referencia | Medicamento | Presentación
                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="cargarcosto();">
                    <option value="" selected="selected">Seleccione producto</option>
                    <?php
 
                        $queryList=mysqli_query($conn3,"SELECT * FROM sinvetrios WHERE usuario_id = $ususario_id order by descripcion");
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $descripcion     = $row_recordset32['descripcion'];
                                          $existencia      = $row_recordset32['existencia'];
                                          $cliente_id      = $row_recordset32['cliente_id'];
                                          $referencia      = $row_recordset32['referencia'];
                                          $ID              = $row_recordset32['ID'];

                                          
                                          echo "<option value='$ID'>$referencia | $descripcion | $existencia</option>";
                                      }

                    ?>
 
                </select>
</div>

            

              <div class="form-group col-md-2">
                  <br>

              <div align="left">Costo</div>
<div  id="div-results-costo"></div>
                

              </div>
                <div class="form-group col-md-2">
                  <br>

                 <div align="left">Cantidad</div>
                <input type="number" min="1" value="1" class="form-control input-lg" id="cantidad" name="cantidad" placeholder="Cantidad" required>
                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="ususario_id" value="<?php echo  $ususario_id?>" required>
              </div>


              <div class="form-group col-md-2">
              <br>
              <br>
              <a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>

              </div>







                    </div>
                  </div>
                </div>






























                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne13">
                        CUSTODIA DE PERTENENCIAS (describir)
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne13" class="panel-collapse collapse">
                    <div class="box-body">
                   


                    <div class="form-group col-md-12">

                    <textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="CUSTODIA DE PERTENENCIAS (describir)" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

</div>


<div class="form-group col-md-6">
<div align="left">NOMBRE DEL QUE RECIBE</div>
    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="NOMBRE DEL QUE RECIBE" >


<a href="javascript:finestraSecundaria('{$Base}/firma2/docs/')"> Registrar Firma</a>
<script language=javascript>
function finestraSecundaria (url){
window.open(url, "Registrar Firma", "width=600, height=400")
}
</script>



</div> 
 
<div class="form-group col-md-6">
<div align="left">NOMBRE DEL QUE RECIBE</div>
    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="NOMBRE DEL QUE RECIBE" >



    <a href="javascript:finestraSecundaria('{$Base}/firma2/docs/')"> Registrar Firma</a>
<script language=javascript>
function finestraSecundaria (url){
window.open(url, "Registrar Firma", "width=600, height=400")
}
</script>





</div> 






                    </div>
                  </div>
                </div>































                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne14">
                        DESCARGO DE RESPONSABILIDAD DEL PACIENTE
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne14" class="panel-collapse collapse">
                    <div class="box-body">
                   



                    <div class="form-group col-md-3">
                    <div align="left">REHUSA TRATAMIENTO</div>
                    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div> 

                    <div class="form-group col-md-3">
                    <div align="left">REHUSA TRASLADO</div>
                    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>

                    <div class="form-group col-md-6">
                    <div align="left">NOMBRE</div>
                    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="NOMBRE" >

                    </div> 
                    <div class="form-group col-md-3">
                    <div align="left">HORA</div>
                    <input type="TIME" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA">

                    </div> 

                    <div class="form-group col-md-9">
                    <div align="left">CAUSA</div>
                    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="CAUSA" >

                    </div> 

<a href="javascript:finestraSecundaria('{$Base}/firma2/docs/')"> Registrar Firma</a>
<script language=javascript>
function finestraSecundaria (url){
window.open(url, "Registrar Firma", "width=600, height=400")
}
</script>

                    </div>
                  </div>
                </div>






































                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne15">
                        DESCARGO DE RESPONSABILIDAD DEL SERVICIO
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne15" class="panel-collapse collapse">
                    <div class="box-body">
                   


                   

                    <div class="form-group col-md-3">
                    <div align="left">REHUSA RECEPCIÓN</div>
                    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div> 

                    <div class="form-group col-md-3">
                    <div align="left">REHUSA TRASLADO</div>
                    <input value="1" type="checkbox"name="VIAAEREAOBSTRUIDA" id="lt" class="minimal"/>
                    </div>

                    <div class="form-group col-md-6">
                    <div align="left">NOMBRE</div>
                    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="NOMBRE" >

                    </div> 
                    <div class="form-group col-md-3">
                    <div align="left">HORA</div>
                    <input type="TIME" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA">

                    </div> 

                    <div class="form-group col-md-9">
                    <div align="left">CAUSA</div>
                    <input type="text" class="form-control input-lg" id="ASEGURADORA" name="NPOLIZA" placeholder="CAUSA" >

                    </div> 


<a href="javascript:finestraSecundaria('{$Base}/firma2/docs/')"> Registrar Firma</a>
<script language=javascript>
function finestraSecundaria (url){
window.open(url, "Registrar Firma", "width=600, height=400")
}
</script>


<!--
 <a data-toggle="modal" data-target="#condiciones" href="#"> Registrar Firma </a>
-->
 




                    </div>
                  </div>
                </div>







 





                 <div class="panel box box-primary">
                 
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne16">
                        OBSERVACIONES
                      </a>
                    </h4>
                  </div>
                  <div id="collapseOne16" class="panel-collapse collapse">
                    <div class="box-body">
                   


                   <textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="OBSERVACIONES" style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>





                    </div>
                  </div>
                </div>
































 </div>
 </div>
 </div>
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




<!-- Modal -->
<div class="modal fade" id="condiciones" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">

    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Registro de Firma</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
   




<?php
include '/firma2/docs/index.php'
?>





</div>







      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
         
      </div>
    </div>
  </div>
</div>