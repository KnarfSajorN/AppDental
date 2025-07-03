<?php 
include 'header.php';
include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div align="left" class="content-wrapper">
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
 <div align="left" class="card-body">
          <h4 class="card-title"> Apertura de historia    </h4>
          <br>


















            <form role="form" action="registrar.php"  method="POST">
             


                <div align="left" class="form-group siguiente">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" class="form-control" placeholder="Ejem. Luis Ordoñez">
                </div>  
               
            <div align="left" class="row siguiente">
                <div align="left" class="col-xs-3">
                    <label>Fecha de Nacimiento:</label>
                     <div align="left" class="input-group date">
                      <div align="left" class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input type="date" class="form-control pull-right" name="fecha" id="datepicker">
                </div>
                </div>  
              
                <div align="left" class="col-xs-3">
                    <label>Tipo Sanguíneo:</label>
                      <select class="form-control" name="tipo_sanguinio">
                          <option value="null">Seleccionar</option>
                          <option value="Rh Positiva">Rh Positiva</option>
                          <option value="Rh Negativa">Rh Negativa</option>
                      </select>
                </div>  
                <div align="left" class="col-xs-3">
                    <label>Estado Civil:</label>
                       <select class="form-control" name="estado_civil">
                        <option value="null">Seleccionar</option>
                        <option value="soltero">Soltero(a)</option>
                        <option value="casada">Casado(a)</option>
                      </select>
                </div>
                  <div align="left" class="col-xs-3">
                    <label>Edad:</label>
                    
                </div>
            
            </div>

            <div align="left" class="row siguiente">
              <div align="left" class="col-xs-4">
                    <label>Ocupación:</label>
                    <input type="text" name="ocupacion" class="form-control" placeholder="Ejem. Plomero">
                </div>
                <div align="left" class="col-xs-4">
                    <label>Religión:</label>
                    <input type="text" class="form-control" name="religion" placeholder="Ejem. Cristiana">
                </div>
                <div align="left" class="col-xs-4">
                    <label>Origen:</label>
                    <input type="text" name="origen" class="form-control" >
                </div>

            </div>

                <div align="left" class="form-group siguiente">
                    <label>Dirección:</label>
                    <input type="text" class="form-control" name="direccion" placeholder="Ejem. Cale 123 # 12-12">
                </div> 
            
            <div align="left" class="row siguiente">
              <div align="left" class="col-xs-6">
                    <label>Teléfono:</label>
                    <input type="text" class="form-control" name="telefono" placeholder="Ejem. +57 314 387 47 02">
                </div>
                <div align="left" class="col-xs-6">
                    <label>E-mail:</label>
                    <input type="text" class="form-control" name="email" placeholder="Ejem. medicalsoft@gmail.com">
                </div>
             

            </div>

            <div align="left" class="row siguiente">
              <div align="left" class="col-xs-4">
                    <label align="right">Peso:</label>
                   
                    <input type="text" class="form-control" name="peso" >
                </div>
                <div align="left" class="col-xs-4">
                    <label>Estatura</label>
                    <input type="text" class="form-control" name="estatura" >
                </div> 
                <div align="left" class="col-xs-4">
                    <label>Alergias</label>
                    <input type="text" class="form-control" name="alergia" >
                </div>
             

            </div>
            <div class="col-xs-12" >
              <h3 class="box-title negrita">Antecedentes Familiares</h3>
      
                 ¿Existe en su familia alguna de las siguientes enfermedades?: 


               </div>  
              <div align="left" class="col-xs-3">
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"class="minimal"   name="enf1">
                        Cardiovasculares
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="enf2">
                        Pulmonares
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="enf2">
                        Renales
                      </label>
                    </div>

                 
              </div>



              <div align="left" class="col-xs-3">
                    

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="enf4">
                        Gastrointestinales
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="enf5">
                        Hematologica
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="enf6">
                        Endocrinas
                      </label>
                    </div>
              </div>



                <div align="left" class="col-xs-3 ">

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"name="enf7" >
                        Sistema oseo
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"name="enf8" >
                        Neorologicas
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"name="enf9" >
                        Cancer
                      </label>
                    </div>
                     


                </div>
                <div align="left" class="col-xs-3 ">

                  
                   
                    
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"name="enf10" >
                        Tuberculosis
                      </label>
                    </div>                    
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"name="enf11" >
                        Diabetes
                      </label>
                    </div>                    
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal"name="enf12" >
                        Hipertensión
                      </label>
                    </div>


                </div>






            </div>




          <div align="left" class="box-header with-border siguiente">
              <h3 class="box-title negrita">Antecedentes Personales</h3>
          </div>
          <div align="left" class="col-xs-4  siguiente">
                <div align="left" class="checkbox">
                    <label>
                      <input type="checkbox" class="minimal" name="vis1">
                      Alcohol
                    </label>
                </div> 

          </div>  
          <div align="left" class="col-xs-3  siguiente">
                <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="vis2">
                        Tabaco
                      </label>
                </div> 

          </div>  
          <div align="left" class="col-xs-4  siguiente">
                <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="vis3">
                        Drogas
                      </label>
                  </div> 

          </div><br><br>


           <div class="col-xs-6" align="left" class="form-group siguiente">
                    <label class="siguiente">Fármacos que Utiliza habitualmente:</label>
                    <input type="text" class="form-control" name="farmaco" >
            </div> 
            <div class="col-xs-6" align="left" class="form-group siguiente">
                    <label>¿Realiza alguna actividad física?:</label>
                    <input type="text" class="form-control" name="actividad" >
            </div> 

            <h3>  Describa Brevemente su Alimentación </h3>
            <div align="left" class="row">
                <div align="left" class="form-group siguiente col-md-4">
                        <label>Desayuno</label>
                        <input type="text" class="form-control" name="comid1" >
                </div> 
                <div align="left" class="form-group siguiente col-md-4">
                        <label>Comida</label>
                        <input type="text" class="form-control" name="comid2" >
                </div> 
                <div align="left" class="form-group siguiente col-md-4">
                        <label>Cena</label>
                        <input type="text" class="form-control" name="comid3" >
                </div> 

            </div>
           <div align="left" class="box-header with-border siguiente">
              <h3 class="box-title negrita">Antecedentes Gineco-obstétricos</h3>
          </div>
          <div align="left" class="col-xs-6 ">
                 <div align="left" class="form-group siguiente">
                        <label>Edad de la primera Menstruación:</label>
                        <input type="text" class="form-control" name="mestruacion" >
                </div> 
               <div align="left" class="radio siguientes">
                    <label>¿Es regular?</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  class="minimal" name="regular" value="si"   id="optionsRadios2" >Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="regular"  value="no"  id="optionsRadios33" >No
                  
                    </label>
                </div>
                <div align="left" class="radio siguiente">
                    <label>¿Hay Mucho Dolor?</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  name="dolor" value="si" id="optionsRadios2" >Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="dolor" value="no" id="optionsRadios2" >No
                  
                    </label>
                </div>
                  <div align="left" class="form-group siguiente">
                    <label>Último Papanicolaou</label>
                    <input type="text" class="form-control" name="ultimop" >
            </div> 
              <div align="left" class="form-group siguiente">
                    <label>Enfermedades de Transmisión Sexual</label>
                    <input type="text" class="form-control" name="enf_tras" >
            </div> 



          </div>
          <div align="left" class="col-xs-5 ">
            <div align="left" class="row">
                <div align="left" class="col-xs-8 ">

                    <div align="left" class="form-group siguiente">
                        <label>Numero de Hijos:</label>
                        <input type="text" class="form-control" name="hijos" >
                   </div> 
                </div>  
                <div align="left" class="col-xs-4 ">

                    <div align="left" class="form-group siguiente">
                        <label>Abortos:</label>
                        <input type="text" class="form-control" name="abortos">
                   </div> 
                </div>  
              
            </div>
              <div align="left" class="form-group siguiente">
                        <label>Partos:</label>
                        <input type="text" class="form-control"  name="partos"  >
              </div> 
              <div align="left" class="form-group siguiente">
                        <label>Cesáreas:</label>
                        <input type="text" class="form-control" name="cesareas"  >
              </div> 
                  <div align="left" class="form-group siguiente">
                        <label>Mastografía/ US mamario:</label>
                        <input type="text" class="form-control" name="mastografia"  >
              </div> 
                  <div align="left" class="form-group siguiente">
                        <label>Método de control natal:</label>
                        <input type="text" class="form-control"  name="control_natal" >
              </div> 


          </div>

           <div align="left" class="box-header with-border siguiente">
              <h3 class="box-title negrita">Antecedentes Patológicos</h3>
          </div>
          <div align="left" class="row">
            <div align="left" class="col-md-4 siguiente">
                <div align="left" class="radio siguiente">
                    <label>Rubeola</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  name="rubeola" id="optionsRadios2" value="si">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="rubeola" id="optionsRadios2" value="no">No
                  
                    </label>
                </div>
                <div align="left" class="radio siguiente">
                    <label>Varicela</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  name="varicela" id="optionsRadios2" value="si">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="varicela" id="optionsRadios2" value="no">No
                  
                    </label>
                </div>
            </div> 
            <div align="left" class="col-md-4 siguiente">
                <div align="left" class="radio siguiente">
                    <label>Sarampión</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  name="sarampion" id="optionsRadios2" value="si">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="sarampion" id="optionsRadios2" value="no">No
                  
                    </label>
                </div>
                <div align="left" class="radio siguiente">
                    <label>Tuberculosis</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  name="tuberculosis" id="optionsRadios2" value="si">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="tuberculosis" id="optionsRadios2" value="no">No
                  
                    </label>
                </div>
            </div>
             <div align="left" class="col-md-4 siguiente">
                <div align="left" class="radio siguiente">
                    <label>Paperas</label>

                    <label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input type="radio" class="minimal"  name="paperas" id="optionsRadios2" value="si">Si&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <input   type="radio" class="minimal"  name="paperas" id="optionsRadios2" value="no">No
                  
                    </label>
                </div>
              
            </div>
        </div>

        <div align="left" class="row">
            <div align="left" class="col-xs-12 ">
                  <div align="left" class="form-group siguiente">
                        <label>¿Ha sido intervenido quirúrgicamente?</label>
                        <input type="text" class="form-control" name="intervenciones" >
                   </div> 
              </div>   
              <div align="left" class="col-xs-12 ">
                  <div align="left" class="form-group siguiente">
                        <label>¿Ha sido Hospitalizado? Especifique causa y año:</label>
                        <input type="text" class="form-control" name="hospitalizaciones" >
                   </div> 
              </div>    



            <div align="left" class="row siguiente">
                <p  >¿Padece usted alguna de las siguientes enfermedades?:</p>
              <div align="left" class="col-xs-5 ">
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf1" >
                        Cardiovasculares
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf2" >
                        Pulmonares
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf3" >
                        Renales
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf4" >
                        Gastrointestinales
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf5" >
                        Hematologicas
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf6" >
                        Endocrinas
                      </label>
                    </div>


  
              </div>
                <div align="left" class="col-xs-5 ">

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf7" >
                        Sistema oseo
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf8" >
                        Neorologicas
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf9" >
                        Mentales
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf10" >
                        Tuberculosis
                      </label>
                    </div>                    
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf11" >
                        Diabetes
                      </label>
                    </div>   <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="penf12" >
                        Reumatologia
                      </label>
                    </div>                    
                 


                </div> 
            </div>
     
              <div align="left" class="col-xs-12 ">
                  <div align="left" class="form-group siguiente">
                        <label>¿Ha realizado algún tratamiento para el control de peso? ¿cuál?</label>
                        <input type="text" class="form-control" name="contro_peso">
                   </div> 
              </div>   
              <div align="left" class="col-xs-12 ">
                  <div align="left" class="form-group siguiente">
                        <label>En los últimos 6 meses ¿ha ganado o perdido peso? ¿Cuánto?</label>
                        <input type="text" class="form-control" name="perdido_peso" >
                   </div> 
              </div> 
              <div align="left" class="row siguiente">
                 Marque con una cruz si padece alguno de los siguientes síntomas: 

              <div align="left" class="col-xs-5 ">
                    
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint1">
                        Mucho apetito
                      </label>
                    </div>
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint2">
                        Poco apetito
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint3">
                        Sed
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint4">
                        Sudoración
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint5">
                        Cansancio
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint6">
                        Dolores de cabeza
                      </label>
                    </div>  

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint7">
                        Problemas de visión
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint8">
                        Problemas auditivos
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint9">
                        Perdida de fuerza
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint10">
                        Dolores articulares
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint11">
                        Enfermedades en piel
                      </label>
                    </div>


  
              </div>
                <div align="left" class="col-xs-5 ">

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint12">
                       Vomito (espontaneo)
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint13">
                        Vomito (inducido)
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint14">
                        Tos
                      </label>
                    </div>

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint15">
                        Palpitaciones
                      </label>
                    </div>  

                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint16">
                        Edema de extremidades
                      </label>
                    </div>   
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint17">
                        Dificultad para orinar
                      </label>
                    </div>   
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint18">
                        Estreñimiento
                      </label>
                    </div>   
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint19">
                        Gastritis o colitis
                      </label>
                    </div>   
                    <div align="left" class="checkbox">
                      <label>
                        <input type="checkbox" class="minimal" name="sint20">
                        Dificultad para respirar
                      </label>
                    </div> 
                </div> 
            </div>
</div>
            <h4 class=" negrita">Exploración Física (Uso exclusivo de la clínica)</h4>


         
      

        <div align="left" class="row siguiente">


        <div align="left" class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">T/A:</font>
                </font>
              </th>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">FC:</font>
                </font>
              </th>

              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">FR:</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">T:</font>
                </font>
              </th>
              
            </tr>
            </thead>
            <tbody>
            
            <tr>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf1" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf2" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf3" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf4"></font>
                </font>
              </td>
          
            </tr>
        
            </tbody>


          </table>
        </div>
        <div align="left" class="col-xs-12 table-responsive">
          <table class="table table-striped">

               <thead>
            <tr>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Peso</font>
                </font>
              </th>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Talla</font>
                </font>
              </th>

              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">% Grasa</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Tórax</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Abdomen</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">PU</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Cadera</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Índice C/C</font>
                </font>
              </th>
              
            </tr>
            </thead>
            <tbody>
            
            <tr>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf5" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf6" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf7"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf8"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf9"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf10"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf11"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf12" ></font>
                </font>
              </td>
          
            </tr>
        
            </tbody>
          </table>
        </div>
        <div align="left" class="col-xs-12 table-responsive">
          <table class="table table-striped">

               <thead>
            <tr>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">%Agua</font>
                </font>
              </th>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Musculo</font>
                </font>
              </th>

              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">IMC</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Peso Ideal</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Peso Usual</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">CB</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">CCF</font>
                </font>
              </th>  
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">BMR</font>
                </font>
              </th>
              
            </tr>
            </thead>
            <tbody>
            
            <tr >
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf13"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf14"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf15"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf16" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf17"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf18"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control"  name="expf19"></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf20" ></font>
                </font>
              </td>
          
            </tr>
        
            </tbody>
          </table>
        </div>
          <div align="left" class="col-xs-12 table-responsive">
          <table class="table table-striped">

               <thead>
            <tr>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">GV</font>
                </font>
              </th>
              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">Phy</font>
                </font>
              </th>

              <th>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;">ósea</font>
                </font>
              </th>  
              
            </tr>
            </thead>
            <tbody>
            
            <tr>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf21" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf22" ></font>
                </font>
              </td>
              <td>
                <font style="vertical-align: inherit;">
                  <font style="vertical-align: inherit;"><input type="text" class="form-control" name="expf23" ></font>
                </font>
              </td>
             
          
            </tr>
        
            </tbody>
          </table>
        </div>













        <!-- /.col -->
      </div>

         





    <div align="left" class="col-xs-6 ">
                  <div align="left" class="form-group siguiente">
                        <label>Línea de tiempo de actividad y alimentación</label>
                        <input type="text" class="form-control" name="lineaact" >
                   </div> 
              </div> 
              <div align="left" class="col-xs-6 ">
                  <div align="left" class="form-group siguiente">
                        <label>Gustos y disgustos:</label>
                        <input type="text" class="form-control" name="gustus" >
                   </div> 
              </div> 



          <input type="submit" name="Registrar" class="btn btn-block btn-info" value="Registrar">





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
  

