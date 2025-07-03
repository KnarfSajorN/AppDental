<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
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
            $dis                  =$rowMotorizado['dis'];
            $tipodiscapacidad      =$rowMotorizado['tipodiscapacidad'];
            $etnia            =$rowMotorizado['etnia'];
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

        // -----------------------------------------------------------------------

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
        $ocupacion    = $rowMotorizado['ocupacion'];

    }



 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinicaN  where cliente_id = $clienteId");
                
                $nrowl=mysqli_num_rows($queryList);
                while($rowMotorizado=mysqli_fetch_array($queryList))
                {

                  $cliente_id      =$rowMotorizado['cliente_id'];
                  $usuario_id      =$rowMotorizado['usuario_id'];
                  $Fecha           =$rowMotorizado['Fecha'];

                  $Hora            =$rowMotorizado['Hora'];
                  
                  $motivoc         =$rowMotorizado['motivoConsulta'];
                  $organos       =$rowMotorizado['organos'];
                  $antrop        =$rowMotorizado['antrop'];
                  $examenesr        =$rowMotorizado['exaregional'];
                  $diagnostico      =$rowMotorizado['diagnostico'];
                  $personales      =$rowMotorizado['personales'];
                  $familiares    =$rowMotorizado['familiares'];
                 
                  
                        
                }



        $queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");


        $nrowl=mysqli_num_rows($queryconfig);
        while($rowconfig=mysqli_fetch_array($queryconfig))
        {
            $cie10 = $rowconfig['cie10'];
            $pro1  = $rowconfig['pro1'];
            $pro2  = $rowconfig['pro2'];
        }

$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
//echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idReceta    = $row_recordset32['idReceta']; 
     
        
                   }



$queryList=mysqli_query($conn3,"SELECT * FROM  contactos where cliente_id = $clienteId order by id ASC");
 //echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idContacto   = $row_recordset32['idTabla']; 
     
        
                   }

        if ($queryList =='') {
            $idT == 1; }
             else{
            $idT   = ($idContacto +1);}


 





$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
 //echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idReceta    = $row_recordset32['idReceta']; 
     
        
                   }

        if ($queryList =='') {
            $idR == 1; }
             else{
            $idR   = ($idReceta+1);}


 
      

    


?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
                <h1>Consulta médica, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
                <ol class="breadcrumb">
                        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
                        <li><a href="#"> Consulta médica  </a></li>
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

                                                                                               <div class="col-md-10">
                                                                                                <?php echo datosPacientes($clienteId);?>
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


             
 
              </div>
                                                                                </div> </div></div></div>
                                                                                <form action="guardarObstetrica.php" method="POST" name="formularioActualizarcliente">

                                                                                        <div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
                                                                                                                         Motivo Consulta
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="Entrevista" class="panel-collapse collapse">
                                                                                                        <div class="box-body">

                                                                                                                <div class="form-group col-md-12">
                                                                                                                        

                                                                                                                        <div align="right">
                                                                                                                        <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                        </div>


                                                                                                                        <textarea  id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                                                                                                                </div>

                                                                                                                 <div class="col-md-6" align="left"> 

<!--
<div class="col-md-3">
<br> 
<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >
 
 
</div>
                <div id="div-results1"  class="col-md-9" >
             

                </div>
</div>
-->

                                                            </div>
                                                                                                                </div>
                                                                                                </div>
                                                                                        

     
                                                                           <div class="panel box box-success">
                                                                                     <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                               <a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentes">
                                                                                                                      Antecedentes Personales
                                                                                                                </a>
                                                                                                        </h4>
                                                                                          </div>

      
                                                                                    <div id="Antecedentes" class="panel-collapse collapse">
                                                                                                       <div class="box-body">
                                                                                                                


<div class="form-group col-md-12">
        <div align="left">PATALÓGICOS</div>
      <input type="text" class="form-control input-lg" id="patalogicos" name="patalogicos" placeholder="PATALÓGICOS">
    </div>

    <div class="form-group col-md-12">
        <div align="left">QUIRÚRGICOS</div>
      <input type="text" class="form-control input-lg" id="quirurgicos" name="quirurgicos" placeholder="QUIRÚRGICOS">
    </div>

    <div class="form-group col-md-12">
        <div align="left">CLÍNICOS</div>
      <input type="text" class="form-control input-lg" id="clinicos" name="clinicos" placeholder="CLÍNICOS">
    </div>

    <div class="form-group col-md-12">
        <div align="left">ALERGIA</div>
      <input type="text" class="form-control input-lg" id="alergia" name="alergia" placeholder="ALERGIA">
    </div>

    <div class="form-group col-md-12">
        <div align="left">MEDICACIÓN</div>
      <input type="text" class="form-control input-lg" id="medicacion" name="medicacion" placeholder="MEDICACIÓN">
    </div>




           <textarea id="antecedentesP" name="antecedentesP"  class="textarea" placeholder="DIAGNOSTICO" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>


            
           <textarea id="observacionP" name="observacionP"  class="textarea" placeholder="OBSERVACION"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>



                                                                                                                
                                                            </div>
                                                                                                                </div>
                                                                                                </div>
                                                                                         



                                                          

                                                                                        <div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree44">
                                                                                                                         Antecedentes Familiares
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="collapseThree44" class="panel-collapse collapse">
                                                                                                        <div class="box-body">


<div class="form-group col-md-12">

<!--<div class="form-group col-md-3">

                                                                                                                        <h7>1. CARDIOPATIA                                                                      

</h7><input type="checkbox" name="ant6" value=":  X" >
                                                                                                                        
                                                                                                                        </div>

                                        <div class="form-group col-md-3">                                                                                       <h7>2. DIABETES                                                                 


</h7><input type="checkbox" name="ant7" value=":  X"> 
                                                                                                                        </div>

                                                                                                                <div class="form-group col-md-3">       
                                                                                                                                <h7>3. ENF. C. VASCULAR

 </h7><input type="checkbox" name="ant8" value=":  X">
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-3">       
                                                                                                                                <h7>4. HIPERTENSION                                                             

</h7><input type="checkbox" name="ant999"  id="ant999" value=":  X">  </div>



                                                                                                                        
                <div class="form-group col-md-2">
                                                                                                                                5. CANCER                                                                       

                        </h7><input type="checkbox" name="ant10" value=":  X">
                                </div>

<div class="form-group col-md-3">
                                                                                                                                 6. TUBERCULOSIS                                                                                                                                                

                        </h7><input type="checkbox" name="ant11" value=":  X" >
                                </div>

<div class="form-group col-md-3">
                                                                                                                                 7. ENF.MENTAL                                                                                                                                                                                          

                        </h7><input type="checkbox" name="ant12" value=":  X" >
                                </div>

                                                                                                        
                <div class="form-group col-md-2">
                                                                                                                                8. ENF. INFECCIOSA                                                                                                                                      

                        </h7><input type="checkbox" name="ant13" value=":  X" >
                                </div>

                                <div class="form-group col-md-3">
                                                                                                                                9. MALFORMACION                                                                                                                                                                                                                                         

                        </h7><input type="checkbox" name="ant14" value=":  X" >
                                </div>


                                <div class="form-group col-md-2">
                                                                                                                                10. OTRO                                                                                                                                                                                                                                                                                                                                                
                        </h7><input type="checkbox" name="ant15" value=":  X" >
                                </div>-->
</div>










                                                                                                        <div align="right">
                                                                                                                <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                </div>
                                                                                                                <textarea id="antecedentesF" name="antecedentesF"  class="textarea" placeholder="Observaciones" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

        

                                                            </div>
                                                                                                                </div>
                                                                                                </div>

 <div class="panel box box-success">
                                                                                     <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                               <a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentesgn">
                                                                                                                      Antecedentes Gineco-obstétricos
                                                                                                                </a>
                                                                                                        </h4>
                                                                                          </div>

      
                                                                                    <div id="Antecedentesgn" class="panel-collapse collapse">
                                                                                                       <div class="box-body">
                                                                                                                
                  <div class="form-group col-md-4">
                <div align="left">Ciclo mestrual</div>
               
                <select  id="ciclo" name="ciclo" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Regular </option>
                  <option>Irregular</option>
                  <option>No Aplica</option>
                   
                </select>

              </div>

               <div class="form-group col-md-4">
              <div align="left">Numero de dias</div>
                <input type="text" class="form-control input-lg" id="numerodias" name="numerodias">
              </div> 

              <div class="form-group col-md-4">
              <div align="left">FUM</div>
                <input type="date" class="form-control input-lg" id="fum" name="fum" >
              </div> 

              <div class="form-group col-md-4">

                               <h7>Vida Sexual Activa         

                     </h7><input type="checkbox" name="vidasexual" value=":  X" >
                                                                                                                        
                                                   </div>

                <div class="form-group col-md-4">

                               <h7>Planificación Familiar        

                     </h7><input type="checkbox" name="planificacion" value=":  X" >
                                                                                                                        
                                                   </div>


              <div class="form-group col-md-4">
              <div align="left">Método</div>
                <input type="text" class="form-control input-lg" id="metodo" name="metodo" >
              </div> 

              <div class="form-group col-md-4">
              <div align="left">Gestaciones</div>
                <input type="text" class="form-control input-lg" id="gesta" name="gesta" >
              </div> 

              <div class="form-group col-md-4">
              <div align="left">Partos</div>
                <input type="text" class="form-control input-lg" id="parto" name="parto" >
              </div> 

               <div class="form-group col-md-4">
              <div align="left">Cesáreas</div>
                <input type="text" class="form-control input-lg" id="cesarea" name="cesarea" >
              </div> 

              <div class="form-group col-md-4">
              <div align="left">Abortos</div>
                <input type="text" class="form-control input-lg" id="abortos" name="abortos" >
              </div> 

               <div class="form-group col-md-4">
              <div align="left">Hijos con Malformación</div>
                <input type="text" class="form-control input-lg" id="malformacion" name="malformacion" >
              </div> 

               <div class="form-group col-md-4">
              <div align="left">Hijos vivos</div>
                <input type="text" class="form-control input-lg" id="hijosvivos" name="hijosvivos" >
              </div>

              
              <div class="form-group col-md-4">
              <div align="left">Hijos muertos</div>
                <input type="text" class="form-control input-lg" id="hijosmuertos" name="hijosmuertos" >
              </div>

               <div class="form-group col-md-4">
              <div align="left">Embarazos ectópicos</div>
                <input type="text" class="form-control input-lg" id="embarazosecto" name="embarazosecto" >
              </div>


              <div class="form-group col-md-4">
              <div align="left">Edad Menarca</div>
                <input type="text" class="form-control input-lg" id="edadmenarca" name="edadmenarca" >
              </div>

              <div class="form-group col-md-6">
              <div align="left">Edad Menopausia</div>
                <input type="text" class="form-control input-lg" id="edadmeno" name="edadmeno" >
              </div>

              <div class="form-group col-md-6">
              <div align="left">Dmo</div>
                <input type="text" class="form-control input-lg" id="dmo" name="dmo" >
              </div>

               <div class="form-group col-md-4">

                               <h7>Última Citologia        

                     </h7><input type="checkbox" name="ultimacito" value=":  X" >
                                                                                                                        
                                                   </div>

                <div class="form-group col-md-4">
              <div align="left">Última Citologia(Tiempo)</div>
                <input type="text" class="form-control input-lg" id="ultcitotiem" name="ultcitotiem" >
              </div>

               <div class="form-group col-md-4">
              <div align="left">Última Citologia(Resultado)</div>
                <input type="text" class="form-control input-lg" id="ultcitores" name="ultcitores" >
              </div>

              <div class="form-group col-md-4">

                               <h7>Eco Mamario        

                     </h7><input type="checkbox" name="ecomamario" value=":  X" >
                                                                                                                        
                                                   </div>

                <div class="form-group col-md-4">
              <div align="left">Eco Mamario(Tiempo)</div>
                <input type="text" class="form-control input-lg" id="ecomamatie" name="ecomamatie" >
              </div>

               <div class="form-group col-md-4">
              <div align="left">Eco Mamario(Resultado)</div>
                <input type="text" class="form-control input-lg" id="ecomamariores" name="ecomamariores" >
              </div>

              <div class="form-group col-md-4">

                               <h7>Colposcopia        

                     </h7><input type="checkbox" name="colposcopia" value=":  X" >
                                                                                                                        
                                                   </div>

                <div class="form-group col-md-4">
              <div align="left">Colposcopia(Tiempo)</div>
                <input type="text" class="form-control input-lg" id="colpostiem" name="colpostiem" >
              </div>

               <div class="form-group col-md-4">
              <div align="left">Colposcopia(Resultado)</div>
                <input type="text" class="form-control input-lg" id="colposresul" name="colposresul" >
              </div>

              <div class="form-group col-md-4">

                               <h7>Mamografia        

                     </h7><input type="checkbox" name="mamografia" value=":  X" >
                                                                                                                        
                                                   </div>

                <div class="form-group col-md-4">
              <div align="left">Mamografia(Tiempo)</div>
                <input type="text" class="form-control input-lg" id="mamotiemp" name="mamotiemp" >
              </div>

               <div class="form-group col-md-4">
              <div align="left">Mamografia(Resultado)</div>
                <input type="text" class="form-control input-lg" id="mamoresul" name="mamoresul" >
              </div>


              <textarea id="observacionG" name="observacionG"  class="textarea" placeholder="OBSERVACION"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>





              
                                                                 
         

                                                                                                                
                                                            </div>
                                                                                                                </div>
                                                                                                </div>
                                                                                         

<!--<div class="panel box box-success">
                                                                                     <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                               <a data-toggle="collapse" data-parent="#accordion1" href="#inmuni">
                                                                                                                Inmunizaciones   
                                                                                                                </a>
                                                                                                        </h4>
                                                                                          </div>

      
                                                                                    <div id="inmuni" class="panel-collapse collapse">
                                                                                                       <div class="box-body">
                                                                                                                
                 
              <textarea id="vacunasinte" name="vacunasinte"  class="textarea" placeholder="VACUNAS INTERNAS"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>





              
                                                                 
         

                                                                                                                
                                                            </div>
                                                                                                                </div>
                                                                                                </div>-->


<div class="panel box box-success">
                                                                                     <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                               <a data-toggle="collapse" data-parent="#accordion1" href="#historial">
                                                                                                      Historial de Vacunas 
                                                                                                                </a>
                                                                                                        </h4>
                                                                                          </div>

      
                                                                                    <div id="historial" class="panel-collapse collapse">
                                                                                                       <div class="box-body">

        <button type="button" onclick="AgregarVacunas_Inicial();"> Agregar Vacuna </button>
                                                                                                <input type="hidden" id="cantidad_AgregarVacuna" value="0">
                                                                                                <br>
                                                                                               <div class="box-body">

                                                                                                <div id="vacunas_general" class="table-responsive col-md-12" style="overflow: auto;">
                                                                                                  
                                                                                                      <script type="text/javascript">
                                                                                                        function AgregarVacuna()
                                                                                                        {
                                                                                                          var tableBody = document.getElementById('vacunas_general');
                                                                                                          var cantidad = document.getElementById('cantidad_AgregarVacuna').value;
                                                                                                          cantidad++;
                                                                                                          for (var i = 0; i < cantidad; i++) 
                                                                                                          {
                                                                                                            var tbodys = document.querySelectorAll("#vacunas_general > div");
                                                                                                            var trs = tbodys.length;
                                                                                                            console.log(trs);
                                                                                                            console.log(cantidad);
                                                                                                              if ((!document.getElementById("div_vacuna"+i)) && (trs<cantidad))
                                                                                                              {

                                                                                                                var div = document.createElement('div');
                                                                                                                div.setAttribute("id", "div_vacuna"+i);
                                                                                                                
                                                                                                                var Dato='';

                                                                                                                Dato+='<div class="form-group col-md-4">';
                                                                                                                  Dato+='<div align="left">Vacuna</div>';
                                                                                                                  Dato+='<input type="text" class="form-control input-lg"  name="Vacunacion['+i+'][vacuna]" >';
                                                                                                                Dato+='</div>';

                                                                                                                Dato+='<div class="form-group col-md-4">';
                                                                                                                  Dato+='<div align="left">Dosis</div>';
                                                                                                                  Dato+='<input type="text" class="form-control input-lg"  name="Vacunacion['+i+'][dosis]" >';
                                                                                                                Dato+='</div>';


                                                                                                                Dato+='<div class="form-group col-md-4">';
                                                                                                                  Dato+='<div align="left">Fecha</div>';
                                                                                                                  Dato+='<input type="date" class="form-control input-lg"  name="Vacunacion['+i+'][fecha vacuna]" >';
                                                                                                                Dato+='</div>';


                                                                                                                Dato+='<div class="form-group col-md-4">';
                                                                                                                  Dato+='<div align="left">Lote</div>';
                                                                                                                  Dato+='<input type="text" class="form-control input-lg"  name="Vacunacion['+i+'][lote]" >';
                                                                                                                Dato+='</div>';

                                                                                                                Dato+='<div class="form-group col-md-4">';
                                                                                                                  Dato+='<div align="left">Responsable Vacuna</div>';
                                                                                                                  Dato+='<input type="text" class="form-control input-lg"  name="Vacunacion['+i+'][responsable vacuna]" >';
                                                                                                                Dato+='</div>';

                                                                                                                Dato+='<div class="form-group col-md-4">';
                                                                                                                  Dato+='<div align="left">Establecimiento de Salud</div>';

                                                                                                                  Dato+='<select name="Vacunacion['+i+'][establecimiento salud]" class="form-control input-lg select" style="width: 100%;">';
                                                                                                                    Dato+='<option></option>';
                                                                                                                    Dato+='<option>PRIVADO</option>';
                                                                                                                    Dato+='<option>MSP</option>';
                                                                                                                    Dato+='<option>OTRO</option>';
                                                                                                                  Dato+='</select>';

                                                                                                                Dato+='</div>';

                                                                                                                Dato+='<div class="form-group col-md-12">';
                                                                                                                  Dato+='<div align="left"><a href="#"  style="font-size: 20px;"  onclick="EliminarVacuna('+i+');"><i class="fas fa-trash-alt"></i> Eliminar Vacuna </a></div>';
                                                                                                                Dato+='</div>'; 

                                                                                                                div.innerHTML= Dato;
                                                                                                                tableBody.appendChild(div);

                                                                                                              }
                                                                                                          }
                                                                                                        document.getElementById('cantidad_AgregarVacuna').value=cantidad;

                                                                                                        
                                                                                                        }

                                                                                                      </script>

                                                                                                    
                                                                                                    
                                                                                                  

                                                                                                  <script type="text/javascript">
                                                                                                    function EliminarVacuna(valor)
                                                                                                    {
                                                                                                      document.getElementById("div_vacuna"+valor).remove();
                                                                                                      document.getElementById('cantidad_AgregarVacuna').value=(document.getElementById('cantidad_AgregarVacuna').value-1);
                                                                                                    }


                                                                                                    function AgregarVacunas_Inicial()
                                                                                                    {    
                                                                                                      var selects = document.getElementById('cantidad_AgregarVacuna').value;
                                                                                                      AgregarVacuna();
                                                                                                    }
                                                                                                  </script>

                                                                                                
                                                                                              </div>
                                                                                            </div>
                                                                                          </div>


                                                                                                                
                 
              <!--<div class="form-group col-md-4">
              <div align="left">Vacuna</div>
                <input type="text" class="form-control input-lg" id="vacuna" name="vacuna" >
              </div>

              <div class="form-group col-md-4">
              <div align="left">Dosis</div>
                <input type="text" class="form-control input-lg" id="dosis" name="dosis" >
              </div>


              <div class="form-group col-md-4">
              <div align="left">Fecha</div>
                <input type="date" class="form-control input-lg" id="fecha_vacuna" name="fecha_vacuna" >
              </div>


              <div class="form-group col-md-4">
              <div align="left">Lote</div>
                <input type="text" class="form-control input-lg" id="lote" name="lote" >
              </div>

              <div class="form-group col-md-4">
              <div align="left">Responsable Vacuna</div>
                <input type="text" class="form-control input-lg" id="responsable_vacuna" name="responsable_vacuna" >
              </div>


<div class="form-group col-md-4">
                <div align="left">Establecimiento de Salud</div>
               
                <select  id="establecimi_salud" name="establecimi_salud" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>BIODIMED</option>
                  <option>MSP</option>
                  <option>OTRO</option>
                   
                </select>

              </div>--->







              
                                                                 
         

                                                                                                                
                                                            </div>
                                                                                                                </div>
                                                                                                


<div class="panel box box-success">
                                                                                     <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                               <a data-toggle="collapse" data-parent="#accordion1" href="#habitos">
                                                                                                      Hábitos 
                                                                                                                </a>
                                                                                                        </h4>
                                                                                          </div>

      
                                                                                    <div id="habitos" class="panel-collapse collapse">
                                                                                                       <div class="box-body">
                      <h4>Consumo de Alcohol</h4>                                                                                          
                 
              <div class="form-group col-md-4">
                <div align="left">Estado</div>
               
                <select  id="alcohol" name="alcohol" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Activo</option>
                  <option>Inactivo</option>
                </select>

              </div>

              <div class="form-group col-md-4">
                <div align="left">Frecuencia de Consumo</div>
               
                <select  id="frecuencia_con" name="frecuencia_con" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Diario</option>
                  <option>Semanal</option>
                  <option>Quincenal</option>
                  <option>Mensual</option>
                </select>

              </div>


              <div class="form-group col-md-4">
              <div align="left">Tiempo</div>
                <input type="text" class="form-control input-lg" id="tiempo_alcohol" name="tiempo_alcohol" >
              </div>

              <div class="form-group col-md-4">
              <div align="left">Cantidad</div>
                <input type="text" class="form-control input-lg" id="cantidad_alcohol" name="cantidad_alcohol" >
              </div>

              <div class="form-group col-md-8">
              <div align="left">Cantidad descripción</div>
                <input type="text" class="form-control input-lg" id="canti_descr" name="canti_descr" >
              </div>


              <h4>Consumo de Cigarrillo</h4>                                                                                          
                 
              <div class="form-group col-md-4">
                <div align="left">Estado</div>
               
                <select  id="estado_cigarro" name="estado_cigarro" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Activo</option>
                  <option>Inactivo</option>
                </select>

              </div>

              <div class="form-group col-md-4">
                <div align="left">Frecuencia de Consumo</div>
               
                <select  id="frecuencia_cigarro" name="frecuencia_cigarro" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Diario</option>
                  <option>Semanal</option>
                  <option>Quincenal</option>
                  <option>Mensual</option>
                </select>

              </div>


              <div class="form-group col-md-4">
              <div align="left">Tiempo</div>
                <input type="text" class="form-control input-lg" id="tiempo_cigarro" name="tiempo_cigarro" >
              </div>

              <div class="form-group col-md-4">
              <div align="left">Cantidad</div>
                <input type="text" class="form-control input-lg" id="cantidad_cigarro" name="cantidad_cigarro" >
              </div>

              <div class="form-group col-md-8">
              <div align="left">Cantidad descripción</div>
                <input type="text" class="form-control input-lg" id="cantid_result" name="cantid_result" >
              </div>

              <h4>Consumo de sustancias psicotrópicas</h4>                                                                                          
                 
              <div class="form-group col-md-3">
                <div align="left">Estado</div>
               
                <select  id="estado_sustancias" name="estado_sustancias" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Activo</option>
                  <option>Inactivo</option>
                </select>

              </div>

              <div class="form-group col-md-3">
              <div align="left">Sustancia</div>
                <input type="text" class="form-control input-lg" id="sustan" name="sustan" >
              </div>

              <div class="form-group col-md-3">
                <div align="left">Frecuencia de Consumo</div>
               
                <select  id="frecuencia_sustancia" name="frecuencia_sustancia" class="form-control input-lg select" style="width: 100%;">
                  <option></option>
                  <option>Diario</option>
                  <option>Semanal</option>
                  <option>Quincenal</option>
                  <option>Mensual</option>
                </select>

              </div>


              <div class="form-group col-md-3">
              <div align="left">Tiempo</div>
                <input type="text" class="form-control input-lg" id="tiempo_sustancia" name="tiempo_sustancia" >
              </div>

                                                                                                                
                                                            </div>
                                                                                                                </div>
                                                                                                </div>                                                                                 

<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#Diagnostico">
                                                                                                                        Enfermedad o problema Actual
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="Diagnostico" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
<div align="right">
                                                                                                                <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                </div>
                                                                                                
                                                                                                <div class="box-body pad">
                                                                                                        <textarea id="enfermedadActual" name="enfermedadActual" class="textarea" placeholder="Enfermedad" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                                                </div>

                                                                                                
                                      </div></div></div>


        
<!--
<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#examenes">
                                                                                                                        5. Revisión actual de Orgános y Sistemas
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="examenes" class="panel-collapse collapse">
                                                                                                        <div class="box-body">

<div class="form-group col-md-12">

<div class="form-group col-md-3">

                                                                                                                        <h7>1. ÓRGANOS DE LOS SENTIDOS                                                                          

</h7><input type="checkbox"  name="antc6" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                        <div class="form-group col-md-3">                                                                                       <h7>2. RESPIRATORIO                                                                             


</h7><input type="checkbox" name="antc7" value=":  X" > 
                                                                                                                        </div>

                                                                                                                <div class="form-group col-md-3">       
                                                                                                                                <h7>3. CARDIO-VASCULAR

 </h7><input type="checkbox" name="antc8" value=":  X" >
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-3">       
                                                                                                                                <h7>4. DIGESTIVO                                                                        

</h7><input type="checkbox" name="antc9" value=":  X" >  </div>

                                                                                                                        
                <div class="form-group col-md-2">
                                                                                                                                5. GENITAL                                                                      

                        </h7><input type="checkbox" name="antc10" value=":  X" >
                                </div>

<div class="form-group col-md-3">
                                                                                                                                 6. URINARIO                                                                                                                                            

                        </h7><input type="checkbox" name="antc11" value=":  X" >
                                </div>

<div class="form-group col-md-3">
                                                                                                                                 7. MÚSCULO ESQUELÉTICO                                                                                                                                                                                                 

                        </h7><input type="checkbox" name="antc12" value=":  X" >
                                </div>

                                                                                                        
                <div class="form-group col-md-2">
                                                                                                                                8. ENDOCRINO                                                                                                                                    

                        </h7><input type="checkbox" name="antc13" value=":  X" >
                                </div>

                                <div class="form-group col-md-3">
                                                                                                                                9. HEMO LINFÁTICO                                                                                                                                                                                                                                               

                        </h7><input type="checkbox" name="antc14" value=":  X" >
                                </div>


                                <div class="form-group col-md-2">
                                                                                                                                10. NERVIOSO                                                                                                                                                                                                                                                                                                                                                    
                        </h7><input type="checkbox" name="antc15" value=":  X" >

                                </div>
</div>

<div align="right">
<a onclick="procesar5()" id="procesar5"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                </div>
                                                                                                
                                                                                                <div class="box-body pad">
                                                                                                        <textarea id="organos" name="organos" class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                                                </div>
</div>

</div></div>

        -->


        <div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTrece">
                                                                                                                Signos Vitales
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="collapseTrece" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
                                                                                                                
<div class="form-group col-md-3">
                                                                                                                        <div align="left">Fecha medición</div>
                                                                                                                        <input type="date" class="form-control input-lg" id="medicion" name="medicion">
                                                                                                                </div>

                                                        <div class="form-group col-md-3">
                                                                                                                        <div align="left">Temperatura  ºC </div>
                                                                                                                        <input type="text" class="form-control input-lg" id="temperatura" name="temperatura" step="any"  maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-3">
                                                                                                                        <div align="left">Presión Alterial (mmhg)</div>
                                                                                                                        <input type="text" class="form-control input-lg" id="tart1" name="tart1" step="any" placeholder="123 / 123"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                                                                </div>

                                                                                                                        <div class="form-group col-md-3">
                                                                                                                        <div align="left">Pulso</div>
                                                                                                                        <input type="text" class="form-control input-lg" id="Pulso" name="Pulso">
                                                                                                                </div>

<div class="form-group col-md-3">
                                                                                                                        <div align="left">Frecuencia Respiratoria</div>
                                                                                                                        <input type="text" class="form-control input-lg" id="frt" name="frt"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                                                                </div>
                                                                                                                <div class="form-group col-md-3">
                                                                                                                        <div align="left">Peso en KG</div>
                                                                                                                        <input type="number" class="form-control input-lg" id="peso" name="peso" onChange="calcularimc();" step="any">
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-3">
                                                                                                                        <div align="left">Talla (cm)</div>
                                                                                                                        <input type="number" class="form-control input-lg" id="altura" name="altura" onChange="calcularimc();" step="any">
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-3">
                                                                                                                        <div align="left"> Índice de masa corporal </div>
                                                                                                                        <input type="number" class="form-control input-lg" id="imc" name="imc" step="any"> 
                                                                                                                </div>

                                                                                                        
                                                                                                        <!--    

                                                                                                                
                                                                                                                <div class="form-group col-md-3">
                                                                                                                        <div align="left">Frecuencia Cardiaca</div>
                                                                                                                        <input type="text" class="form-control input-lg" id="fcard" name="fcard"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                                                                </div>

                                                                                                                <div class="form-group col-md-3">
                                                                                                                        <div align="left">Saturación de Oxígeno</div>
                                                                                                                        <input type="text" class="form-control input-lg" id="sat" name="sat"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                                                                                                </div>  -->
                                                                                                                </div>
                                                                                                        </div>
                                                                                                </div>
                                                                                          

<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#analisis">
                                                                                                                   Examen Físico Regional
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="analisis" class="panel-collapse collapse">
                                                                                                        <div class="box-body">



    <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam1" class="form-control" value="PIEL/PIEL Y FANERAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam2" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam3" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam4" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam5" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam6" class="form-control" value="PIEL/TATUAJES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam7" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Si</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam8" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam9" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam10" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam11" class="form-control" value="OJOS/CONJUNTIVAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam12" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam13" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam14" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam15" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam16" class="form-control" value="OJOS/MOTILIDAD">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam17" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam18" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam19" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam20" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam21" class="form-control" value="OJOS/PARPADOS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam22" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam23" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam24" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam25" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam26" class="form-control" value="OJOS/PUPILAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam27" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam28" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam29" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam30" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam31" class="form-control" value="OJOS/CORNEA">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam32" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam33" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam34" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam35" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam36" class="form-control" value="OIDOS/C. AUDITIVO EXTERNO">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam37" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam38" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam39" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam40" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam41" class="form-control" value="OIDOS/PABELLON AUURICULAR">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam42" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam43" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam44" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam45" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam46" class="form-control" value="OIDOS/TIMPANOS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam47" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam48" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam49" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam50" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam51" class="form-control" value="NARIZ/MUCOSAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam52" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam53" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam54" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam55" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam56" class="form-control" value="NARIZ/TABIQUE">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam57" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam58" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam59" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam60" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam61" class="form-control" value="NARIZ/CORNETES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam62" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam63" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam64" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam65" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam66" class="form-control" value="NARIZ/SENOS PARANASALES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam67" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam68" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam69" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam70" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam71" class="form-control" value="BOCA/AMIGDALAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam72" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam73" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam74" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam75" class="form-control" >

   </div>
 </div>


<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam76" class="form-control" value="BOCA/DENTADURA">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam77" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam78" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam79" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam80" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam81" class="form-control" value="BOCA/FARINGE">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam82" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam83" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam84" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam85" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam86" class="form-control" value="BOCA/LABIOS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam87" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam88" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam89" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam90" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam91" class="form-control" value="BOCA/LENGUA">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam92" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam93" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam94" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam95" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam96" class="form-control" value="CUELLO/ASPECTO">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam97" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam98" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam99" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam100" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam101" class="form-control" value="CUELLO/TIROIDES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam102" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam103" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam104" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam105" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam106" class="form-control" value="CUELLO/MOVALIDAD">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam107" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam108" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam109" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam110" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam111" class="form-control" value="TORAX/ASPECTO">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam112" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam113" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam114" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam115" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam116" class="form-control" value="TORAX/CORAZON">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam117" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam118" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam119" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam120" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam121" class="form-control" value="TORAX/PULMONES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam122" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam123" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam124" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam125" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam126" class="form-control" value="TORAX/MAMAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam127" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam128" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam129" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam130" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam131" class="form-control" value="TORAX/PARRILLA COSTAL">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam132" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam133" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam134" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam135" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam136" class="form-control" value="ABDOMEN/GENERAL">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam137" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam138" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam139" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam140" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam141" class="form-control" value="ABDOMEN/VISCERAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam142" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam143" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam144" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam145" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam146" class="form-control" value="ABDOMEN/PARED ABDOMINAL">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam147" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam148" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam149" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam150" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam151" class="form-control" value="GENITALES/GENITALES EXTERNOS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam152" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam153" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam154" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam155" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam156" class="form-control" value="GENITALES/PELVIS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam157" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam158" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam159" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam160" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam161" class="form-control" value="EXTREMIDADES/MIEMBROS INFERIORES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam162" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam163" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam164" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam165" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam166" class="form-control" value="EXTREMIDADES/MIEMBROS SUPERIORES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam167" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam168" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam169" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam170" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam171" class="form-control" value="EXTREMIDADES/VARICES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam172" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam173" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam174" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam175" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam176" class="form-control" value="NEUROLOGICO/GENERAL">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam177" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam178" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam179" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam180" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam181" class="form-control" value="NEUROLOGICO/MARCHA">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam182" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam183" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam184" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam185" class="form-control" >

   </div>
 </div>

  <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam186" class="form-control" value="NEUROLOGICO/PARES CRANEALES">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam187" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam188" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam189" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam190" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam191" class="form-control" value="NEUROLOGICO/REFLEJOS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam192" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam193" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam194" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam195" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam196" class="form-control" value="NEUROLOGICO/SENSABILIDAD">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam197" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam198" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam199" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam200" class="form-control" >

   </div>
 </div>

<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam201" class="form-control" value="NEUROLOGICO/FUERZA">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam202" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam203" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam204" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam205" class="form-control" >

   </div>
 </div>


<div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam206" class="form-control" value="COLUMNA VERTEBRAL/CURVATURAS">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam207" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam208" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam209" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam210" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam211" class="form-control" value="COLUMNA VERTEBRAL/DOLOR">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam212" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Si</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam213" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam214" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam215" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam216" class="form-control" value="COLUMNA VERTEBRAL/FLEXION">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam217" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Normal</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam218" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Anormal</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam219" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam220" class="form-control" >

   </div>
 </div>

 <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam221" class="form-control" value="COLUMNA VERTEBRAL/LASEGUE">

   </div>
 </div>


                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam222" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">Si</label>
            </div>
          </div>                      
                     <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam223" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No</label>
            </div>
          </div>

                      <div class="col-sm-2">
            <div class="form-group">
              <input class="form-check-input" name="exam224" type="checkbox"  id="inlineRadio1" value="X">
              <label class="form-check-label" for="inlineRadio1">No aplica</label>
            </div>
          </div>

          <div class="col-md-3">
    <div class="form-group">
     <input type="text" name="exam225" class="form-control" >

   </div>
 </div>




<div align="right">
<a onclick="procesar6()" id="procesar6"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                </div>
                                                                                                
                                                                                                <div class="box-body pad">
                                                                                                        <textarea id="tratamiento" name="regional" class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                                                </div>

</div>

        </div>
</div>




<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#impresion">
                                                                                                                        Diagnósticos
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="impresion" class="panel-collapse collapse">
                                                                                                        <div class="box-body">

                 

<div class="row">
                                                                                                                <!--<div class="form-group col-md-4">
                                                                                                                        <div align="left">Diagnóstico</div>
                                                                                                                        
                                                                                                                </div>-->



<div class="form-group col-md-8">
                                                                                                                        <div align="left">CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-4">
                                                                                                                        <div align="left">DEF/PRE</div>
                                                                                                                        
                                                                                                                </div>


</div>


<div class="row">
        <!--<div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico1">
                                                                                                                        
                                                                                                                </div>-->
  


<div class="col-md-8" align="left"> 


<div class="col-md-3">
<br> 
<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >
 
 
</div>
                <div id="div-results1"  class="col-md-9" >
             

                </div>
</div>


<div class="form-group col-md-4">
                                                                                                                
  <select name="pre1" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>

                                                                                                        

<div class="form-group col-md-8">
                                                                                                                        <div align="left">CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-4">
                                                                                                                        <div align="left">DEF/PRE</div>
                                                                                                                        
                                                                                                                </div>


</div>


<div class="row">
        <!--<div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico2">
                                                                                                                        
                                                                                                                </div>-->
  



 <div class="col-md-8" align="left"> 


<div class="col-md-3">
<br> 
<input type="text"  id="clienteId2"  onChange="verlista2();" placeholder="Buscar CIE10" >
 
 
</div>
                <div id="div-results2"  class="col-md-9" >
             

                </div>
</div>



<div class="form-group col-md-4">
                                                                                                                
  <select name="pre2" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>

                                                                                                        


<div class="form-group col-md-8">
                                                                                                                        <div align="left">CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-4">
                                                                                                                        <div align="left">DEF/PRE</div>
                                                                                                                        
                                                                                                                </div>


</div>


<div class="row">
        <!--<div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico3">
                                                                                                                        
                                                                                                                </div>-->
  



 <div class="col-md-8" align="left"> 


<div class="col-md-3">
<br> 
<input type="text"  id="clienteId3"  onChange="verlista3();" placeholder="Buscar CIE10" >
 
 
</div>
                <div id="div-results3"  class="col-md-9" >
             

                </div>
</div>



<div class="form-group col-md-4">
                                                                                                                
  <select name="pre3" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>


                                                                                                        

<div class="form-group col-md-8">
                                                                                                                        <div align="left">CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-4">
                                                                                                                        <div align="left">DEF/PRE</div>
                                                                                                                        
                                                                                                                </div>


</div>


<div class="row">
        <!--<div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico4">
                                                                                                                        
                                                                                                                </div>-->
  



 <div class="col-md-8" align="left"> 


<div class="col-md-3">
<br> 
<input type="text"  id="clienteId4"  onChange="verlista4();" placeholder="Buscar CIE10" >
 
 
</div>
                <div id="div-results4"  class="col-md-9" >
             

                </div>
</div>



<div class="form-group col-md-4">
                                                                                                                
  <select name="pre4" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>



 <div class="form-group col-md-8">
                                                                                                                        <div align="left">CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-4">
                                                                                                                        <div align="left">DEF/PRE</div>
                                                                                                                        
                                                                                                                </div>


</div>


<div class="row">
        <!--<div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico5">
                                                                                                                        
                                                                                                                </div>-->
  



 <div class="col-md-8" align="left"> 


<div class="col-md-3">
<br> 
<input type="text"  id="clienteId5"  onChange="verlista5();" placeholder="Buscar CIE10" >
 
 
</div>
                <div id="div-results5"  class="col-md-9" >
             

                </div>
</div>




<div class="form-group col-md-4">
                                                                                                                
  <select name="pre5" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>


                                                                                                        </div>                                                                              

</div> </div>
                                                                                                </div> 




<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#examenesr">
                                                                                                                        Planes y tratamiento
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="examenesr" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
                                                                                                        
                                                                                                        
                                                                                                        <div class="box-body pad">
                                                                                                                <textarea id="otros" name="otros" class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                                                        </div>  </div>  </div>  </div>



<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#coronavirus">
                                                                                                                         Test de coronavirus
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="coronavirus" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
                                                                                                        


                                                                                                                <div class="form-group col-md-12">
                                                                                                                        
<div class="form-group col-md-12">
                                

                                                                                                                        <div align="left">¿Qué síntomas tienes?</div>                                                                                   
                                                                                                                        <div align="right">
                                                                                                                <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                </div>
                                                                                                
                                                                                                <div class="box-body pad">
                                                                                                        <textarea id="enfermedadActual" name="sintomascorona" class="textarea" placeholder="Síntomas" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                                                </div>
                                                                                                                        
                                                                                                                </div>



 <div class="form-group col-md-12">
<div align="left">      ¿Tienes sensación de falta de aire de inicio brusco (en ausencia
de cualquier otra patología que justifique este síntoma)? </div>
                                                                                    
  <select name="antCO6" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">      ¿Tienes fiebre? (+37.7oC)</div>
                                                                                    
  <select name="antCO7" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>


<div class="form-group col-md-4">
<div align="left">¿Tienes tos seca y persistente?</div>
                                                                                    
  <select name="antCO8" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>


<div class="form-group col-md-4">
<div align="left">¿Has tenido contacto estrecho con algún paciente positivo
confirmado?</div>
                                                                                    
  <select name="antCO9" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>
                  

<div class="form-group col-md-4">
<div align="left">¿Tienes mucosidad en la nariz?</div>
                                                                                    
  <select name="antCO9" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>



<div class="form-group col-md-4">
<div align="left">¿Tienes dolor muscular?</div>
                                                                                    
  <select name="antCO10" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">¿Tienes sintomatología gastrointestinal?</div>
                                                                                    
  <select name="antCO11" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">¿Llevas más de 20 días con estos síntomas?</div>
                                                                                    
  <select name="antCO12" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

      </div>      </div>      </div>      </div></div>

<div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#ordenLabo">
                              Orden de Laboratorio
                            </a>
                          </h4>
                        </div>
                        <div id="ordenLabo" class="panel-collapse collapse">
                          <div class="box-body">
                          <div class="col-sm-12">
                            
                          </div>
                         
                        <div class="form-group col-md-4">
                          <div class="form-group col-md-12">
                            <div align="left">HEMATOLOGÍA</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="hematologia" name="hematologia[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                               

                                <option value="BIOMETRIA HEMATICA"> BIOMETRIA HEMATICA </option>
                                
                                <option value="FÓRMULA LEUCOCITARIA MANUAL"> FÓRMULA LEUCOCITARIA MANUAL </option>
                                
                                <option value="HEMATOCRITO/HEMOGLOBINA"> HEMATOCRITO/HEMOGLOBINA </option>
                                
                                <option value="SEDIMENTACIÓN(VSG)"> SEDIMENTACIÓN(VSG) </option>
                                
                                <option value="RETICULOCITOS"> RETICULOCITOS </option>
                                
                                <option value="HEMATOZOARIO"> HEMATOZOARIO </option>
                                
                                <option value="TRANSFERRINA"> TRANSFERRINA </option>
                                
                                <option value="SATURACIÓN DE TRANSFERENCIA"> SATURACIÓN DE TRANSFERENCIA </option>
                                
                                <option value="COOMBS DIRECTO"> COOMBS DIRECTO </option>
                                
                                <option value="GRUPO SANGUINEO"> GRUPO SANGUINEO </option>

                                <option value="INV. DREPANOCITOS"> INV. DREPANOCITOS </option>

                                <option value="HIERRO SÉRICO"> HIERRO SÉRICO </option>

                                <option value="FERRETINA">FERRETINA </option>

                                <option value="VITAMINA B12"> VITAMINA B12 </option>

                                <option value="ÁCIDO FÓLICO"> ÁCIDO FÓLICO </option>

                                <option value="WESTERGREEN"> WESTERGREEN </option>

                                <option value="CÉLULAS LE"> CÉLULAS LE </option>

                                <option value="COOMBS INDIRECTO"> COOMBS INDIRECTO </option>

                            
                            </select>

                          </div>

                        </div>

                        <div class="form-group col-md-4">
                          <div class="form-group col-md-12">
                            <div align="left">DROGAS DE ABUSO</div>
                          </div>
                          <div class="form-group col-md-12" align="right">

                            <select id="drogasabuso" name="drogasabuso[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                            

                            <option value="COCAINA"> COCAINA </option>
                            
                            <option value="MARIHUANA"> MARIHUANA </option>
                            
                            <option value="PANEL 6 DROGRAS (COC,ANF,MAR,EXT,OPI,BZO)"> PANEL 6 DROGRAS (COC,ANF,MAR,EXT,OPI,BZO)</option>
                            
                            <option value="PANEL 10 DROGAS (ANF, BAR, BZO,COC,MAR,MET,METAN,OPI,FEN,ANTIDEP)"> PANEL 10 DROGAS (ANF, BAR, BZO,COC,MAR,MET,METAN,OPI,FEN,ANTIDEP) </option>
                            
                            <option value="ALCOHOL ETÍLICO EN SALIVA"> ALCOHOL ETÍLICO EN SALIVA </option>
                            
                            <option value="ALCOHOL ETÍLICO EN SANGRE"> ALCOHOL ETÍLICO EN SANGRE </option>
                            

                            </select>


                          </div>
                        </div>

                        <div class="form-group col-md-4">
                          <div class="form-group col-md-12">
                            <div align="left">SEROLOGÍA</div>
                          </div>
                          <div class="form-group col-md-12" align="right">

                            <select id="serologia" name="serologia[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                            
                            <option value="PRC CUANTITATIVO"> PRC CUANTITATIVO </option>
                            
                            <option value="ASTO CUANTITIVO"> ASTO CUANTITIVO </option>
                            
                            <option value="FR(LÁTEX) CUALITATIVO">FR(LÁTEX) CUALITATIVO </option>
                            
                            <option value="FR CUANTITATIVO"> FR CUANTITATIVO </option>
                            
                            <option value="CITRULINA (ANTI CCP)"> CITRULINA (ANTI CCP) </option>
                            
                            <option value="V.D.R.L"> V.D.R.L </option>
                            
                            <option value="AGLUTINACIONES FEBRILES"> AGLUTINACIONES FEBRILES </option>
                            

                            </select>


                          </div>
                        </div>
                        <div class="col-md-12"> </div>
                        <div class="form-group col-md-4">
                          <div class="form-group col-md-12">
                            <div align="left">AUTOINMUNIDAD</div>
                          </div>
                          <div class="form-group col-md-12" align="right">

                            <select id="autoinmunidad" name="autoinmunidad[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                            

                            <option value="ANTI-NUCLEARES ANA"> ANTI-NUCLEARES ANA</option>
                            
                            <option value="ANTI DNA (DOBLE CADENA)"> ANTI DNA (DOBLE CADENA) </option>
                            
                            <option value="ANTI-FOSFOLÍPIDOS-IgG"> ANTI-FOSFOLÍPIDOS-IgG </option>
                            
                            <option value="ANTI-FOSFOLÍPIDOS-IgM"> ANTI-FOSFOLÍPIDOS-IgM </option>
                            
                            <option value="ANTI-CARDIOLIPINA(ACÁ)igG">ANTI-CARDIOLIPINA(ACÁ)igG</option>
                            
                            <option value="ANTI-CARDIOLIPINA(ACÁ)igM"> ANTI-CARDIOLIPINA(ACÁ)igM </option>
                            
                            <option value="ANTI-SCL 70"> ANTI-SCL 70 </option>
                            
                            <option value="ANTI-RO(SSA)"> ANTI-RO(SSA) </option>
                            
                            <option value="ANTI-LA(SSB)"> ANTI-LA(SSB) </option>
                            
                            <option value="ANCAS"> ANCAS </option>
                            
                            <option value="ANCA-P"> ANCA-P </option>

                            <option value="ANCA-C">ANCA-C </option>
                            
                            <option value="ANTI-SM"> ANTI-SM </option>

                            <option value="ANTI-MUSCULOSO LISO(ASMA)"> ANTI-MUSCULOSO LISO(ASMA) </option>
                            
                            <option value="ANTI-MITOCONDRIALES (AMA)"> ANTI-MITOCONDRIALES (AMA) </option>

                            <option value="ANTI-CÉLULAS PARIETALES"> ANTI-CÉLULAS PARIETALES </option>
                            
                            <option value="ANTI-MICROSOMALES(ANTI-TIPO)"> ANTI-MICROSOMALES(ANTI-TIPO) </option>

                            <option value="ANTI-TIROGLOBULINA(ANTI-TG)"> ANTI-TIROGLOBULINA(ANTI-TG) </option>
                            
                            <option value="COMPLEMENTO C3"> COMPLEMENTO C3 </option>

                            <option value="COMPLEMENTO C4"> COMPLEMENTO C4 </option>
                            
                            <option value="ANA BLOT"> ANA BLOT </option>

                            <option value="ANTI LKM-1"> ANTI LKM-1 </option>
                          
                            
                          </select>
                          </div>
                      </div>

                           <div class="form-group col-md-4">
                          <div class="form-group col-md-12">
                            <div align="left">COPROANÁLISIS</div>
                          </div>
                          <div class="form-group col-md-12" align="right">

                            <select id="coproanalisis" name="coproanalisis[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                            <option value="COPROPARASIATRIO SIMPLE"> COPROPARASIATRIO SIMPLE </option>
                            
                            <option value="COPROPARASIATRIO POR CONCENTRACIÓN"> COPROPARASIATRIO POR CONCENTRACIÓN </option>
                            
                            <option value="INV DE POLIMORFONUCLEARES (PMN)"> INV DE POLIMORFONUCLEARES (PMN) </option>
                            
                            <option value="Anticuerpos antinucleares"> Anticuerpos antinucleares </option>
                            
                            <option value="PH EN HECES"> PH EN HECES </option>
                            
                            <option value="INV. DE GRASAS FECALES (SUDÁN III)"> INV. DE GRASAS FECALES (SUDÁN III) </option>
                            
                            <option value="CLINI-TEST">CLINI-TEST</option>
                            
                            <option value="INV. DE OXIUROS"> INV. DE OXIUROS </option>

                            <option value="INV. SANGRE OCULTA"> INV. SANGRE OCULTA </option>
                            
                            <option value="INV. DE ROTAVIRUS">INV. DE ROTAVIRUS</option>
                            
                            <option value="INV. DE ADENOVIRUS"> INV. DE ADENOVIRUS </option>

                            <option value="ANTÍGENO HELICOBACTER PYLORI"> ANTÍGENO HELICOBACTER PYLORI </option>
                            
                            
                          </select>
                          </div>

                        </div>



                        <div class="form-group col-md-4">
                          <div class="form-group col-md-12">
                            <div align="left">COAGULACIÓN</div>
                          </div>
                          <div class="form-group col-md-12" align="right">

                            <select id="coagulacion" name="coagulacion[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                            

                            <option value="T.COAGULACIÓN">T.COAGULACIÓN</option>
                            
                            <option value="PLAQUETAS">PLAQUETAS</option>
                            
                            <option value="FR(LÁTEX) CUALITATIVO"> FR(LÁTEX) CUALITATIVO </option>
                            
                            <option value="TP"> TP </option>
                            
                            <option value="TTP"> TTP </option>

                             <option value="DIMERO D."> DIMERO D. </option>
                            
                            <option value="FACTOR V LEYDEN"> FACTOR V LEYDEN </option>

                             <option value="PROTEÍNAS S"> PROTEÍNAS S </option>
                            
                            <option value="T. HEMORRAGIA Q."> T. HEMORRAGIA Q. </option>

                            <option value="RETRAC. COAGULACIÓN"> RETRAC. COAGULACIÓN </option>

                             <option value="PROTEÍNA C"> PROTEÍNA C </option>
                            
                            <option value="ANTI. TROMBINA III"> ANTI. TROMBINA III </option>

                            <option value="FIBRINÓGENO"> FIBRINÓGENO </option>
                            
                            <option value="ANTI LÚPICO"> ANTI LÚPICO </option>
                            
                            </select>

                          </div>

                      </div>

 

                            <div class="form-group col-md-4">
                            <div class="form-group col-md-12">
                              <div align="left">ENZIMAS</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="enzimas" name="enzimas[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="AST(STGO)"> AST(STGO) </option>
                                
                                <option value="AST(STGP)"> AST(STGP) </option>
                                
                                <option value="FOSFATASA ALCALINA"> FOSFATASA ALCALINA </option>

                                <option value="GAMMA GT"> GAMMA GT</option>
                                
                                <option value="FOSFATASA ÁCIDA TOTAL"> FOSFATASA ÁCIDA TOTAL </option>
                                
                                <option value="FOSFATASA ÁCIDA PROSTÁTICA"> FOSFATASA ÁCIDA PROSTÁTICA </option>

                                <option value="AMILASA"> AMILASA </option>
                                
                                <option value="LIPASA"> LIPASA </option>
                                
                                <option value="CPK"> CPK </option>

                                <option value="CK-MB"> CK-MB </option>
                                
                                <option value="TROPONINA"> TROPONINA </option>
                                
                                <option value="LDH"> LDH </option>

                                <option value="MIOGLOBINA">MIOGLOBINA </option>

                                </select>

                            </div>
                        </div>


                         <div class="form-group col-md-4">
                            <div class="form-group col-md-12">
                              <div align="left">BIOLOGÍA MOLECULAR</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="biologiamolecular" name="biologiamolecular[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="HPV 28 GENOTIPOS"> HPV 28 GENOTIPOS </option>
                                
                                <option value="HPV 14 GENOTIPOS"> HPV 14 GENOTIPOS </option>
                                
                                <option value="HILA B27"> HILA B27 </option>

                                <option value="TUBERCULOSIS (PCR)"> TUBERCULOSIS (PCR)</option>
                                
                                <option value="NEISSERIA GONORRHOEAE (PRC)"> NEISSERIA GONORRHOEAE (PRC) </option>
                                
                                <option value="FOSFATASA ÁCIDA PROSTÁTICA"> FOSFATASA ÁCIDA PROSTÁTICA </option>

                                </select>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-group col-md-12">
                              <div align="left">ELECTROLITOS</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="electro" name="electro[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="SODIO"> SODIO </option>
                                
                                <option value="POTASIO"> POTASIO </option>
                                
                                <option value="CLORO"> CLORO </option>

                                <option value="FÓSFORO"> FÓSFORO</option>
                                
                                <option value="LITIO"> LITIO </option>
                                
                                <option value="CA. TOTAL"> CA. TOTAL </option>

                                <option value="MAGNESIO"> MAGNESIO </option>
                                
                                <option value="PROTEÍNAS S"> PROTEÍNAS S </option>
                                
                                <option value="C.IÓNICO"> C.IÓNICO </option>

                                <option value="GASOMETRÍA ARTERIAL"> GASOMETRÍA ARTERIAL</option>
                                
                                <option value="GASOMETRÍA VENOSA"> GASOMETRÍA VENOSA </option>
                                
                                </select>

                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                              <div align="left">ANTICUERPOS VIRALES E INMUNODIAGNOSTICO</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="anticuerpos" name="anticuerpos[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="INFLUENZA AB+ VIRUS SR">INFLUENZA AB+ VIRUS SR</option>
                                
                                <option value="TORCH-IgG"> TORCH-IgG </option>
                                
                                <option value="TORCH-IgM"> TORCH-IgM </option>

                                <option value="RUBÉOLA-IgG"> RUBÉOLA-IgG</option>
                                
                                <option value="RUBÉOLA-IgG"> RUBÉOLA-IgM </option>
                                
                                <option value="CITOMEGALOVIRUS-IgG"> CITOMEGALOVIRUS-IgG</option>

                                <option value="CITOMEGALOVIRUS-IgM"> CITOMEGALOVIRUS-IgM </option>
                                
                                <option value="MONOCUCLEOSIS MONOTETST"> MONOCUCLEOSIS MONOTETST </option>
                                
                                <option value="EPSTEIN BARR (VCA)-IgG"> EPSTEIN BARR (VCA)-IgG</option>

                                <option value="EPSTEIN BARR (VCA)-IgM"> EPSTEIN BARR (VCA)-IgM</option>
                                
                                <option value="HERPES I-IgG "> HERPES I-IgG</option>

                                <option value=">HERPES I-IgM"> >HERPES I-IgM </option>
                                
                                <option value="HERPES II-IgG"> HERPES II-IgG </option>
                                
                                <option value="HERPES II-IgM"> HERPES II-IgM</option>

                                <option value="CHLAMYDIA TRACHOMATIS-IgG"> CHLAMYDIA TRACHOMATIS-IgG</option>
                                
                                <option value="CHLAMYDIA TRACHOMATIS-IgM"> CHLAMYDIA TRACHOMATIS-IgM</option>

                                <option value="SEROAMEBA"> SEROAMEBA </option>
                                
                                <option value="ANTI CISTICERCO"> ANTI CISTICERCO</option>

                                <option value="H1V1, HIV2 + P24"> H1V1, HIV2 + P24</option>
                                
                                <option value="DENGUE SÉRICO"> DENGUE SÉRICO</option>

                                <option value="CHAGAS SÉRICO">CHAGAS SÉRICO </option>
                                
                                <option value="INV. A. MALARIA "> INV. A. MALARIA </option>

                                <option value="ANTÍGENO CHLAMDYA TRACHOMATIS"> ANTÍGENO CHLAMDYA TRACHOMATIS</option>
                                
                                <option value="INV SÍFILIS IgG-IgM"> INV SÍFILIS IgG-IgM</option>

                                <option value="FTA Abs"> FTA Abs </option>

                                <option value="VARICELA ZOSTER-IgG"> VARICELA ZOSTER-IgG</option>
                                
                                <option value="VARICELA ZOSTER-IgM"> VARICELA ZOSTER-IgM</option>

                                </select>

                            </div>
                        </div>

                         <div class="form-group col-md-3">
                            <div class="form-group col-md-12">
                              <div align="left">BACTERIOLOGIA</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="bacteriologia" name="bacteriologia[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="COPROCULTIVO">COPROCULTIVO</option>
                                
                                <option value="FRESCO"> FRESCO </option>
                                
                                <option value="GRAM"> GRAM </option>

                                <option value="KOH"> KOH</option>
                                
                                <option value="RUBÉOLA-IgG"> RUBÉOLA-IgM </option>
                                
                                <option value="ANTÍGENO DE CHLAMYDIA"> ANTÍGENO DE CHLAMYDIA</option>

                                <option value="CULTIVO DE LOWEINSTEIN"> CULTIVO DE LOWEINSTEIN </option>
                                
                                <option value="INV EOSINOFILOS EN MOCO NASAL"> INV EOSINOFILOS EN MOCO NASAL</option>
                                
                                <option value="INV ZIEL - NIELSEN (BAAR)"> INV ZIEL - NIELSEN (BAAR)</option>

                                </select>

                            </div>
                        </div>

                         <div class="form-group col-md-3">
                            <div class="form-group col-md-12">
                              <div align="left">QUIMICA SANGUINEA</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="quimica" name="quimica[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="GLUCOSA EN AYUNAS">GLUCOSA EN AYUNAS</option>
                                
                                <option value="GLUCOSA POST PRANDIAL 2 HS"> GLUCOSA POST PRANDIAL 2 HS </option>
                                
                                <option value="CURVA DE TOLERANCIA A LA GLUCOCOSA"> CURVA DE TOLERANCIA A LA GLUCOCOSA </option>

                                <option value="TEST DE SULLIVAN">TEST DE SULLIVAN</option>
                                
                                <option value="HEMOGLOBINA GLICOSILADA"> HEMOGLOBINA GLICOSILADA </option>
                                
                                <option value="FRUCTOSAMINA"> FRUCTOSAMINA</option>

                                <option value="PÉPTIDO C"> PÉPTIDO C </option>
                                
                                <option value="ÚREA"> ÚREA</option>
                                
                                <option value="AC ÚRICO"> AC ÚRICO</option>

                                <option value="BUN"> BUN</option>

                                <option value="COLESTEROL"> COLESTEROL</option>

                                <option value="HDL COLESTEROL"> HDL COLESTEROL</option>

                                <option value="LDL COLESTEROL"> LDL COLESTEROL</option>

                                <option value="TRIGLICÉRIDOS"> TRIGLICÉRIDOS</option>

                                <option value="V.L.D.L"> V.L.D.L</option>

                                <option value="APO-LIPOPROTEÍNAS-APO A"> APO-LIPOPROTEÍNAS-APO A</option>

                                <option value="APO-LIPOPROTEÍNAS-APO B"> APO-LIPOPROTEÍNAS-APO B</option>

                                <option value="LÍPIDOS TOTALES"> LÍPIDOS TOTALES</option>

                                <option value="BILIRRUBINAS T-D-I"> BILIRRUBINAS T-D-I</option>

                                <option value="PROTEÍNAS TOTALES"> PROTEÍNAS TOTALES</option>

                                <option value="GLOBULINA"> GLOBULINA</option>

                                <option value="ALBÚMINA"> ALBÚMINA</option>

                                <option value="ÍNDICE AL/GL"> ÍNDICE AL/GL</option>

                                <option value="ELECTROFORESIS DE PROTEÍNAS"> ELECTROFORESIS DE PROTEÍNAS</option>

                                <option value="COLINESTERASA PLASMÁTICA"> COLINESTERASA PLASMÁTICA</option>

                                <option value="COLINESTERASA ERITROCITARIA"> COLINESTERASA ERITROCITARIA</option>

                                <option value="AC. LÁCTICO"> AC. LÁCTICO</option>

                                <option value="ÍNDICE HOMA"> ÍNDICE HOMA</option>

                                </select>

                            </div>
                        </div>


                        <div class="form-group col-md-4">
                            <div class="form-group col-md-12">
                              <div align="left">MARCADORES ONCOLÓGICOS</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="marcadores" name="marcadores[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                

                                <option value="ALFA FETO PROTEÍNA (AFT)">ALFA FETO PROTEÍNA (AFT)</option>
                                
                                <option value="AG. CARCINO EMBRRIONARIO (PSA)">AG. CARCINO EMBRRIONARIO (PSA)</option>
                                
                                <option value="AG PROSTÁTICO ESPECÍFICO (PSA)"> AG PROSTÁTICO ESPECÍFICO (PSA) </option>

                                <option value="PSA LIBRE">PSA LIBRE</option>
                                
                                <option value="CA 125 (OVARIO)"> CA 125 (OVARIO) </option>
                                
                                <option value="CA 15-3 (MAMAS)"> CA 15-3 (MAMAS)</option>

                                <option value="CA 19-9 (PÁNCREAS, GÁSTRICO, E INTEST.)"> CA 19-9 (PÁNCREAS, GÁSTRICO, E INTEST.)</option>
                                
                                <option value="BHCG CUANTITAIVO"> BHCG CUANTITAIVO</option>
                                
                                <option value="CYFRA 21.1"> CYFRA 21.1</option>

                                <option value="HE4"> HE4</option>
                                
                                </select>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-group col-md-12">
                              <div align="left">DROGAS TERAPÉUTICAS</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="drogas" name="drogas[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="CARBAMAZEPINA">CARBAMAZEPINA</option>
                                
                                <option value="AC. VALPROICO">AC. VALPROICO</option>
                                
                                <option value="FENOBARBITAL"> FENOBARBITAL </option>
                                
                                <option value="DIGOXINA"> DIGOXINA </option>
                                
                                <option value="FENITOINA"> FENITOINA</option>

                                <option value="LITIO"> LITIO</option>
                                
                                </select>

                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <div class="form-group col-md-12">
                              <div align="left">PRUEBAS HORMONALES</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="pruebashor" name="pruebashor[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="TSH">TSH</option>
                                
                                <option value="FT3">FT3</option>
                                
                                <option value="FT4"> FT4 </option>

                                <option value="T4">T4</option>
                                
                                <option value="T3">T3</option>
                                
                                <option value="TIROGLOBULINA(TG)"> TIROGLOBULINA(TG)</option>

                                <option value="FSH"> FSH</option>

                                <option value="PROLACTINA">PROLACTINA</option>
                                
                                <option value="PROGESTERONA">PROGESTERONA</option>
                                
                                <option value="17 BETA ESTRADIOL (ESTRÓGENOS)"> 17 BETA ESTRADIOL (ESTRÓGENOS)</option>

                                <option value="TESTOSTERONA TOTAL">TESTOSTERONA TOTAL</option>
                                
                                <option value="CORTISOL-AM">CORTISOL-AM</option>
                                
                                <option value="CORTISOL-PM"> CORTISOL-PM</option>

                                <option value="DHEAS"> DHEAS</option>

                                <option value="PARATOHORMONA(PTH)">PARATOHORMONA(PTH)</option>

                                <option value="HcG BETA CUALITATIVA"> HcG BETA CUALITATIVA</option>

                                <option value="HcG BETA CUANTITATIVA"> HcG BETA CUANTITATIVA</option>

                                <option value="(GH) HORMONA CRECIMIENTO"> (GH) HORMONA CRECIMIENTO</option>

                                <option value="INSULINA"> INSULINA</option>

                                <option value="INSULINA POST PRANDIAL"> INSULINA POST PRANDIAL</option>
                                
                                </select>

                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                              <div align="left">INMUNO DIAGNÓSTICO</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="inmuno" name="inmuno[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="HELI-IgG">HELI-IgG</option>
                                
                                <option value="HELI-IgM">HELI-IgM</option>
                                
                                <option value="HELI-IgA"> HELI-IgA </option>

                                <option value="ANTI HAV IgG">ANTI HAV IgG</option>
                                
                                <option value="ANTI HAV IgM">ANTI HAV IgM</option>
                                
                                <option value="ANTÍGENO AUSTRALIA Hbs- Ag">ANTÍGENO AUSTRALIA Hbs- Ag</option>

                                <option value="ANTI HBs"> ANTI HBs</option>

                                <option value="ANTI HBe">ANTI HBe</option>
                                
                                <option value="ANTI HBC IgM">ANTI HBC IgM</option>
                                
                                <option value="ANTI HBC(ANTI CORE TOTAL)"> ANTI HBC(ANTI CORE TOTAL)</option>

                                <option value="HBeAg">HBeAg</option>
                                
                                <option value="BsAg(ANTÍGENO AUSTRALIA)">BsAg(ANTÍGENO AUSTRALIA)</option>
                                
                                <option value="ANTI HCV (ANTICUERPOS TOTALES)">ANTI HCV (ANTICUERPOS TOTALES)</option>

                                <option value="INMUNOGLOBULINAS-IgG">INMUNOGLOBULINAS-IgG</option>

                                <option value="INMUNOGLOBULINAS-IgA">INMUNOGLOBULINAS-IgA</option>

                                <option value="INMUNOGLOBULINAS-IgM">INMUNOGLOBULINAS-IgM</option>

                                <option value="INMUNOGLOBULINAS-IgE">INMUNOGLOBULINAS-IgE</option>
                                
                                </select>

                            </div>
                        </div>

                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                              <div align="left">ORINA</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="orina" name="orina[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="EMO">EMO</option>
                                
                                <option value="GRAM EN SEDIMIENTO">GRAM EN SEDIMIENTO</option>
                                
                                <option value="GOTA FRESCO"> GOTA FRESCO </option>

                                <option value="CULTIVO Y ANTIBIOGRAMA">CULTIVO Y ANTIBIOGRAMA</option>
                                
                                <option value="SODIO">SODIO</option>
                                
                                <option value="POTASIO">POTASIO</option>

                                <option value="CLORO">CLORO</option>

                                <option value="PROTEINURA ORINA 24H">PROTEINURA ORINA 24H</option>
                                
                                <option value="PROTEINURA ORINA OCASIONAL">PROTEINURA ORINA OCASIONAL</option>
                                
                                <option value="MICROALBUNIMURIA"> MICROALBUNIMURIA</option>

                                <option value="DEPURACIÓN DE CREATININA">DEPURACIÓN DE CREATININA</option>
                                
                                <option value="ELECTROLITOS EN ORINA">ELECTROLITOS EN ORINA</option>
                                
                                </select>

                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                              <div align="left">PATOLOGÍA-CITOLOGÍA</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="patologia" name="patologia[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="PAP TEST (PLACA)">PAP TEST (PLACA)</option>
                                
                                <option value="PAP TEST (CITOLOGÍA LÍQUIDA)">PAP TEST (CITOLOGÍA LÍQUIDA)</option>

                                </select>

                            </div>
                        </div>


                        <div class="form-group col-md-6">
                            <div class="form-group col-md-12">
                              <div align="left">OTROS</div>
                            </div>
                            <div class="form-group col-md-12" align="right">

                                <select id="otrosexa" name="otrosexa[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="ESPERMATOGRAMA">ESPERMATOGRAMA</option>
                                
                                <option value="ANÁLISIS DE CÁLCULO RENAL">ANÁLISIS DE CÁLCULO RENAL</option>

                                </select>

                            </div>
                        </div>


                            

                        <div class="form-group col-md-12">
                            <div align="left">Otros Laboratorios Para Realizar: </div>
                          </div>
                          <div class="box-body pad">
                            <textarea id="otros_laboratorios" name="otros_laboratorios" class="textarea" placeholder="Laboratorio" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div>
                    
                       
                           </div>  </div>  </div>



<!--<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#labo">
                                                                                                                         Orden de laboratorio
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="labo" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
                                                                                                        
                                                                                             
                                                <div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#encabezado">
                                                                                                                        Datos de encabezado
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="encabezado" class="panel-collapse collapse">
                                                                                                        <div class="box-body">

                                                                                                                                                                                                                                
<div class="form-group col-md-4">
<div align="left">      INSTITUCIÓN DEL SISTEMA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="INSTITUCION">

</div>

<div class="form-group col-md-4">
<div align="left">      ORDEN </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="ORDEN" name="ORDEN">

</div>


<div class="form-group col-md-4">
<div align="left">      HISTORIA CLINICA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="HISTORIA">

</div>
<div class="form-group col-md-12">
<div align="left">      LOCALIZACIÓN </div>
        <div class="form-group col-md-4">                                                                                                       
 <input type="text" class="form-control input-lg" id="temperatura" name="PARROQUIA" placeholder="Parroquía">
</div>
 <div class="form-group col-md-4">
 <input type="text" class="form-control input-lg" id="temperatura" name="CANTON" placeholder="Cantón">
</div>
 <div class="form-group col-md-4">
 <input type="text" class="form-control input-lg" id="temperatura" name="PROVINCIA" placeholder="Provincia">
</div>

</div>

<div class="form-group col-md-4">
<div align="left">      SERVICIO SOLICITADO </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="SERVICIO">

</div>

<div class="form-group col-md-4">
<div align="left">      SALA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="SALA">

</div>


<div class="form-group col-md-4">
<div align="left">      CAMA </div>
                                                                                                                
 <input type="text" class="form-control input-lg" id="temperatura" name="CAMA">

</div>

<div class="form-group col-md-4">
                        <div align="left">      PRIORIDAD</div>
                                                                                                                                                
  <select name="PRIORIDAD" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Urgente</option>
                <option>Normal</option>
                <option>Control</option>
                      </select>

</div>

<div class="form-group col-md-4">
<div align="left">      FECHA DE TOMA </div>
                                                                                                                
 <input type="date" class="form-control " id="temperatura" name="FTOMA">

</div>

                                                            </div>
                                                                                                                </div>
                                                                                                </div>
                                                                                        
                                                                                

                                                                                        <div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#labor">
                                                                                                                Laboratorios
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                        <div id="labor" class="panel-collapse collapse">
                                                                                                        <div class="box-body">      
        
<div class="row"  style="background: #A4A4A4">
<div class="form-group col-md-8" style="border:1">
<div align="left"><b>   1.HEMATOLOGÍA </b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>   2. DROGAS DE ABUSO </b> </div>
</div>
</div>
                                                                                                                
 


<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                                                        <h7>BIOMETRIA HEMATICA                                                          

</h7><input type="checkbox"  name="ante1" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>FÓRMULA LEUCOCITARIA MANUAL                                                                      

</h7><input type="checkbox"  name="ante2" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>HEMATOCRITO/HEMOGLOBINA                                                       

</h7><input type="checkbox"  name="ante3" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>SEDIMENTACIÓN(VSG)                                                                      

</h7><input type="checkbox"  name="ante4" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>RETICULOCITOS                               
</h7><input type="checkbox"  name="ante5" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>HEMATOZOARIO                                 

</h7><input type="checkbox"  name="ante6" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

      <h7>TRANSFERRINA                                

</h7><input type="checkbox"  name="ante7" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                  </div>


<div class="form-group col-md-12">

      <h7>SATURACIÓN DE TRANSFERENCIA                               

</h7><input type="checkbox"  name="ante8" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                  </div>

                                                                                                </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                                                        <h7>COOMBOS DIRECTO
                                               

</h7><input type="checkbox"  name="ante9" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>GRUPO SANGUINEO

</h7><input type="checkbox"  name="ante10" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>INV. DREPANOCITOS

</h7><input type="checkbox"  name="ante11" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>HIERRO SÉRICO
</h7><input type="checkbox"  name="ante12" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>FERRETINA
</h7><input type="checkbox"  name="ante13" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

       <h7>VITAMINA B12
</h7><input type="checkbox"  name="ante14" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                 </div>

<div class="form-group col-md-12">

       <h7>ÁCIDO FÓLICO
</h7><input type="checkbox"  name="ante15" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                 </div>


<div class="form-group col-md-12">

       <h7>WESTERGREEN
</h7><input type="checkbox"  name="ante16" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                 </div>


<div class="form-group col-md-12">

       <h7>CÉLULAS LE
</h7><input type="checkbox"  name="ante17" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                 </div>


<div class="form-group col-md-12">

       <h7>COOMBOS INDIRECTO
</h7><input type="checkbox"  name="ante18" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                 </div>

                                                                                                </div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                                                        <h7>COCAINA
</h7><input type="checkbox"  name="ante19" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>MARIHUANA
</h7><input type="checkbox"  name="ante20" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>PANEL 6 DROGRAS (COC,ANF,MAR,EXT,OPI,BZO)

</h7><input type="checkbox"  name="ante21" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>PANEL 10 DROGAS (ANF, BAR, BZO,COC,MAR,MET,METAN,OPI,FEN,ANTIDEP)
</h7><input type="checkbox"  name="ante22" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

         <h7>ALCOHOL ETÍLICO EN SALIVA 
</h7><input type="checkbox"  name="ante23" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

         <h7>ALCOHOL ETÍLICO EN SANGRE
</h7><input type="checkbox"  name="ante24" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                </div>

</div>


        
        
<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>3.SEROLOGÍA</b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>4. AUTOINMUNIDAD </b> </div>
</div>
<div class="form-group col-md-4">
<div align="left"><b>5.COPROANÁLISIS</b></div>
</div>
</div> </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                                                        <h7>PRC CUANTITATIVO

</h7><input type="checkbox"  name="ante25" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>ASTO CUANTITIVO
</h7><input type="checkbox"  name="ante26" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>FR(LÁTEX) CUALITATIVO

</h7><input type="checkbox"  name="ante27" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>FR CUANTITATIVO
</h7><input type="checkbox"  name="ante28" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>CITRULINA (ANTI CCP)
</h7><input type="checkbox"  name="ante29" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>V.D.R.L
</h7><input type="checkbox"  name="ante30" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>AGLUTINACIONES FEBRILES
</h7><input type="checkbox"  name="ante31" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                                                        <h7>ANTI-NUCLEARES ANA 

</h7><input type="checkbox"  name="ante32" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>ANTI DNA (DOBLE CADENA)
</h7><input type="checkbox"  name="ante33" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                   <h7>ANTI-FOSFOLÍPIDOS
                  <input value="IgG"  type="radio" name="ante34" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante34" id="lt" >  IgM


                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>ANTI-COAGULANTE LÚPICO (LA)
</h7><input type="checkbox"  name="ante35" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

                                                                                                                        <h7>ANTI-CARDIOLIPINA(ACÁ)igG
</h7><input type="checkbox"  name="ante36" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>ANTI-CARDIOLIPINA(ACÁ)igM
</h7><input type="checkbox"  name="ante37" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-SCL 70
</h7><input type="checkbox"  name="ante38" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-RO(SSA)
</h7><input type="checkbox"  name="ante39" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

  <h7>ANTI-LA(SSB)
</h7><input type="checkbox"  name="ante40" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANCAS
</h7><input type="checkbox"  name="ante41" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANCA-P
</h7><input type="checkbox"  name="ante42" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANCA-C
</h7><input type="checkbox"  name="ante43" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-SM
</h7><input type="checkbox"  name="ante44" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-MUSCULOSO LISO(ASMA)
</h7><input type="checkbox"  name="ante45" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-MITOCONDRIALES (AMA)
</h7><input type="checkbox"  name="ante46" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-CÉLULAS PARIETALES
</h7><input type="checkbox"  name="ante47" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

  <h7>ANTI-MICROSOMALES(ANTI-TIPO)
</h7><input type="checkbox"  name="ante48" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI-TIROGLOBULINA(ANTI-TG)
</h7><input type="checkbox"  name="ante49" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>COMPLEMENTO C3
</h7><input type="checkbox"  name="ante50" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>COMPLEMENTO C4
</h7><input type="checkbox"  name="ante51" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANA BLOT
</h7><input type="checkbox"  name="ante52" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI LKM-1
</h7><input type="checkbox"  name="ante53" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                             <h7>COPROPARASIATRIO SIMPLE 

</h7><input type="checkbox"  name="ante54" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                        <h7>COPROPARASIATRIO POR CONCENTRACIÓN
</h7><input type="checkbox"  name="ante55" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                        </div>
                                                        <div class="form-group col-md-12">

                                                                          <h7>INV DE POLIMORFONUCLEARES (PMN)
</h7><input type="checkbox"  name="ante56" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
               
                                                                                                                        </div>
<div class="form-group col-md-12">

                                                                                                                        <h7>PH EN HECES 
</h7><input type="checkbox"  name="ante57" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>INV. DE GRASAS FECALES (SUDÁN III)
</h7><input type="checkbox"  name="ante58" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CLINI-TEST 
</h7><input type="checkbox"  name="ante59" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV. DE OXIUROS
</h7><input type="checkbox"  name="ante60" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

  <h7>INV. SANGRE OCULTA
</h7><input type="checkbox"  name="ante61" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV. DE ROTAVIRUS
</h7><input type="checkbox"  name="ante62" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV. DE ADENOVIRUS
</h7><input type="checkbox"  name="ante63" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTÍGENO HELICOBACTER PYLORI
</h7><input type="checkbox"  name="ante64" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
</div>

        
<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>6.COAGULACIÓN</b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>7. ENZIMAS </b> </div>
</div>
<div class="form-group col-md-4">
<div align="left"><b>8.BIOLOGÍA MOLECULAR</b></div>
</div>
</div> </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                  <h7>T.COAGULACIÓN

</h7><input type="checkbox"  name="ante65" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                 <h7>PLAQUETAS
</h7><input type="checkbox"  name="ante66" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                   <h7>FR(LÁTEX) CUALITATIVO

</h7><input type="checkbox"  name="ante67" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                      <h7>TP
</h7><input type="checkbox"  name="ante68" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>TTP
</h7><input type="checkbox"  name="ante69" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>DIMERO D.
</h7><input type="checkbox"  name="ante70" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>FACTOR V LEYDEN 
</h7><input type="checkbox"  name="ante71" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>PROTEÍNAS S
</h7><input type="checkbox"  name="ante72" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>T. HEMORRAGIA Q.
</h7><input type="checkbox"  name="ante73" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>RETRAC. COAGULACIÓN
</h7><input type="checkbox"  name="ante74" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>PROTEÍNA C
</h7><input type="checkbox"  name="ante75" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>ANTI. TROMBINA III
</h7><input type="checkbox"  name="ante76" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>FIBRINÓGENO
</h7><input type="checkbox"  name="ante77" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>ANTI LÚPICO
</h7><input type="checkbox"  name="ante78" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                          <h7>AST(STGO)

</h7><input type="checkbox"  name="ante79" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                        <h7>AST(STGP)
</h7><input type="checkbox"  name="ante80" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                         <h7>FOSFATASA ALCALINA
</h7><input type="checkbox"  name="ante81" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

                                       <h7>GAMMA GT
</h7><input type="checkbox"  name="ante82" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>FOSFATASA ÁCIDA TOTAL
</h7><input type="checkbox"  name="ante83" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>FOSFATASA ÁCIDA PROSTÁTICA
</h7><input type="checkbox"  name="ante84" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>AMILASA
</h7><input type="checkbox"  name="ante85" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

  <h7>LIPASA
</h7><input type="checkbox"  name="ante86" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CPK
</h7><input type="checkbox"  name="ante87" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CK-MB
</h7><input type="checkbox"  name="ante88" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>TROPONINA
</h7><input type="checkbox"  name="ante89" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>LDH
</h7><input type="checkbox"  name="ante90" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>MIOGLOBINA
</h7><input type="checkbox"  name="ante91" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                                                             <h7>HPV 28 GENOTIPOS 

</h7><input type="checkbox"  name="ante92" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                        <h7>HPV 14 GENOTIPOS 
</h7><input type="checkbox"  name="ante93" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                        </div>
                                                        <div class="form-group col-md-12">

                                                                          <h7>HILA B27
</h7><input type="checkbox"  name="ante94" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
               
                                                                                                                        </div>
<div class="form-group col-md-12">

                                                            <h7>TUBERCULOSIS (PCR) 
</h7><input type="checkbox"  name="ante95" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>NEISSERIA GONORRHOEAE (PRC)
</h7><input type="checkbox"  name="ante96" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
</div>

<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>9.ELECTROLITOS</b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>10. ANTICUERPOS VIRALES E INMUNODIAGNOSTICO</b> </div>
</div>
<div class="form-group col-md-4">
<div align="left"><b>11.BACTERIOLOGIA</b></div>
</div>
</div> </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                  <h7>SODIO

</h7><input type="checkbox"  name="ante97" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                 <h7>POTASIO
</h7><input type="checkbox"  name="ante98" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                   <h7>CLORO

</h7><input type="checkbox"  name="ante99" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                      <h7>FÓSFORO 
</h7><input type="checkbox"  name="ante100" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>LITIO
</h7><input type="checkbox"  name="ante101" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>CA. TOTAL
</h7><input type="checkbox"  name="ante102" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>MAGNESIO
</h7><input type="checkbox"  name="ante103" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>PROTEÍNAS S
</h7><input type="checkbox"  name="ante104" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>C.IÓNICO 
</h7><input type="checkbox"  name="ante105" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>GASOMETRÍA ARTERIAL
</h7><input type="checkbox"  name="ante106" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>GASOMETRÍA VENOSA
</h7><input type="checkbox"  name="ante107" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                          <h7>INFLUENZA AB+ VIRUS SR

</h7><input type="checkbox"  name="ante108" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                        <h7>TORCH
<input value="IgG"  type="radio" name="ante109" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante109" id="lt" >  IgM
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                         <h7>TOXOPLASMA
<input value="IgG"  type="radio" name="ante110" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante110" id="lt" >  IgM
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

                                      <h7>RUBÉOLA
<input value="IgG"  type="radio" name="ante111" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante111" id="lt" >  IgM
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>CITOMEGALOVIRUS
<input value="IgG"  type="radio" name="ante112" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante112" id="lt" >  IgM
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>MONOCUCLEOSIS MONOTETST
</h7><input type="checkbox"  name="ante113" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

 <h7>EPSTEIN BARR (VCA)
<input value="IgG"  type="radio" name="ante114" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante114" id="lt" >  IgM
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

 <h7>HERPES I
<input value="IgG"  type="radio" name="ante115" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante115" id="lt" >  IgM
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>HERPES II
<input value="IgG"  type="radio" name="ante116" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante116" id="lt" >  IgM
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CHLAMYDIA TRACHOMATIS 
<input value="IgG"  type="radio" name="ante117" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante117" id="lt" >  IgM
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>SEROAMEBA
</h7><input type="checkbox"  name="ante118" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTI CISTICERCO
</h7><input type="checkbox"  name="ante119" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>H1V1, HIV2 + P24
</h7><input type="checkbox"  name="ante120" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>DENGUE SÉRICO
</h7><input type="checkbox"  name="ante121" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CHAGAS SÉRICO
</h7><input type="checkbox"  name="ante122" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV. A. MALARIA 
</h7><input type="checkbox"  name="ante123" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTÍGENO CHLAMDYA TRACHOMATIS 
</h7><input type="checkbox"  name="ante124" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV SÍFILIS IgG-IgM
</h7><input type="checkbox"  name="ante125" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>FTA Abs 
</h7><input type="checkbox"  name="ante126" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

<h7>VARICELA ZOSTER 
<input value="IgG"  type="radio" name="ante127" id="lt" >  IgG 
                              <input value="IgM" type="radio" name="ante127" id="lt" >  IgM
</div>

</div>

<div class="form-group col-md-4">


                                                                                           <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>CULTIVO DE:</b></label>
                                                  <input type="text" name="ante128" class="form-control"> 
                                                </div>
                                            </div>
                                                                                                                        
                                                                                                                       



<div class="form-group col-md-12">

                                                                                        <h7>COPROCULTIVO
</h7><input type="checkbox"  name="ante129" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                        </div>
                                                        <div class="form-group col-md-12">

                                                                          <div class="form-group">
                                                  <label><b>CULTIVO DE HONGOS:</b></label>
                                                  <input type="text" name="ante130" class="form-control"> 
                                                </div>
                                                                                                                        
               
                                                                                                                        </div>
<div class="form-group col-md-12">

                                                            <h7>FRESCO
</h7><input type="checkbox"  name="ante131" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>GRAM
</h7><input type="checkbox"  name="ante132" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>KOH
</h7><input type="checkbox"  name="ante133" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>ANTÍGENO DE CHLAMYDIA
</h7><input type="checkbox"  name="ante134" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CULTIVO DE LOWEINSTEIN 
</h7><input type="checkbox"  name="ante135" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <div class="form-group">
                                                  <label><b>HEMOCULTIVO No:</b></label>
                                                  <input type="text" name="ante136" class="form-control"> 
                                                </div>
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV EOSINOFILOS EN MOCO NASAL 
</h7><input type="checkbox"  name="ante137" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INV ZIEL - NIELSEN (BAAR)
</h7><input type="checkbox"  name="ante138" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <div class="form-group">
                                                  <label><b>CITOQUÍMICO:</b></label>
                                                  <input type="text" name="ante139" class="form-control"> 
                                                </div>
                                                                                                                        
                                                                                                             </div>
</div>




<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>12 QUIMICA SANGUINEA</b> </div> 
</div>  
 <div class="form-group col-md-8">
<div align="left"> </div>
</div>

</div> </div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                               <h7>GLUCOSA EN AYUNAS

</h7><input type="checkbox"  name="ante140" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                   <h7>GLUCOSA POST PRANDIAL 2 HS
</h7><input type="checkbox"  name="ante141" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                               <h7>CURVA DE TOLERANCIA A LA GLUCOCOSA

</h7><input type="checkbox"  name="ante142" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                          <h7>TEST DE SULLIVAN 
</h7><input type="checkbox"  name="ante143" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                       <h7>HEMOGLOBINA GLICOSILADA
</h7><input type="checkbox"  name="ante144" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                                         <h7>FRUCTOSAMINA
</h7><input type="checkbox"  name="ante145" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                             <h7>PÉPTIDO C
</h7><input type="checkbox"  name="ante146" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                                <div class="form-group col-md-12">

                                    <h7>ÚREA
</h7><input type="checkbox"  name="ante147" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

</div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                            <h7>CREATININA

</h7><input type="checkbox"  name="ante148" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                       <h7>AC ÚRICO
</h7><input type="checkbox"  name="ante149" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                           <h7>BUN

</h7><input type="checkbox"  name="ante150" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                     <h7>COLESTEROL
</h7><input type="checkbox"  name="ante151" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                        <h7>HDL COLESTEROL
</h7><input type="checkbox"  name="ante152" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                                <h7>LDL COLESTEROL
</h7><input type="checkbox"  name="ante153" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

               <h7>TRIGLICÉRIDOS
</h7><input type="checkbox"  name="ante154" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                                <div class="form-group col-md-12">

                                        <h7>V.L.D.L

</h7><input type="checkbox"  name="ante155" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

                          <h7>APO-LIPOPROTEÍNAS 
<input value="APO A"  type="radio" name="ante156" id="lt" >APO A  
                              <input value="APO B" type="radio" name="ante156" id="lt" >APO B
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>LÍPIDOS TOTALES 
</h7><input type="checkbox"  name="ante157" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                             <h7>BILIRRUBINAS T-D-I

</h7><input type="checkbox"  name="ante158" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                           <h7>PROTEÍNAS TOTALES
</h7><input type="checkbox"  name="ante159" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                              <h7>GLOBULINA 
</h7><input type="checkbox"  name="ante160" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                             <h7>ALBÚMINA 

</h7><input type="checkbox"  name="ante161" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                              <h7>ÍNDICE AL/GL
</h7><input type="checkbox"  name="ante162" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                                <div class="form-group col-md-12">

         <h7>ELECTROFORESIS DE PROTEÍNAS 
</h7><input type="checkbox"  name="ante163" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                              <h7>COLINESTERASA PLASMÁTICA 

</h7><input type="checkbox"  name="ante164" value=" <font color=red> <B> X</B></font>" > 
                              
                              </div>

<div class="form-group col-md-12">

                              <h7>COLINESTERASA ERITROCITARIA 

</h7><input type="checkbox"  name="ante165" value=" <font color=red> <B> X</B></font>" > 
                              
                              </div>

<div class="form-group col-md-12">

                              <h7>AC. LÁCTICO 

</h7><input type="checkbox"  name="ante166" value=" <font color=red> <B> X</B></font>" > 
                              
                              </div>

<div class="form-group col-md-12">

                              <h7>ÍNDICE HOMA

</h7><input type="checkbox"  name="ante167" value=" <font color=red> <B> X</B></font>" > 
                              
                              </div>

</div>

<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>13.MARCADORES ONCOLÓGICOS</b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>14. DROGAS TERAPÉUTICAS</b> </div>
</div>
<div class="form-group col-md-4">
<div align="left"><b>15.PRUEBAS HORMONALES</b></div>
</div>
</div> </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                  <h7>ALFA FETO PROTEÍNA (AFT)

</h7><input type="checkbox"  name="ante168" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                 <h7>AG. CARCINO EMBRRIONARIO (PSA)
</h7><input type="checkbox"  name="ante169" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                   <h7>AG PROSTÁTICO ESPECÍFICO (PSA)

</h7><input type="checkbox"  name="ante170" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                      <h7>PSA LIBRE
</h7><input type="checkbox"  name="ante171" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>CA 125 (OVARIO)
</h7><input type="checkbox"  name="ante172" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>CA 15-3 (MAMAS)
</h7><input type="checkbox"  name="ante173" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>CA 19-9 (PÁNCREAS, GÁSTRICO, E INTEST.)
</h7><input type="checkbox"  name="ante174" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>BHCG CUANTITAIVO 
</h7><input type="checkbox"  name="ante175" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

    <h7>CYFRA 21.1  
</h7><input type="checkbox"  name="ante176" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
<div class="form-group col-md-12">

    <h7>HE4
</h7><input type="checkbox"  name="ante177" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

                                                          <h7>CARBAMAZEPINA

</h7><input type="checkbox"  name="ante178" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        
<div class="form-group col-md-12">

  <h7>AC. VALPROICO 
</h7><input type="checkbox"  name="ante179" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>FENOBARBITAL
</h7><input type="checkbox"  name="ante180" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>DIGOXINA
</h7><input type="checkbox"  name="ante181" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>FENITOINA
</h7><input type="checkbox"  name="ante182" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>LITIO
</h7><input type="checkbox"  name="ante183" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
</div>

<div class="form-group col-md-4">
                                                                                                                             

<div class="form-group col-md-12">

                                                                                        <h7>TSH
</h7><input type="checkbox"  name="ante184" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                        </div>
                                                        
<div class="form-group col-md-12">

                                                            <h7>FT3
</h7><input type="checkbox"  name="ante185" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

  <h7>FT4
</h7><input type="checkbox"  name="ante186" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>T4
</h7><input type="checkbox"  name="ante187" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>T3
</h7><input type="checkbox"  name="ante188" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>TIROGLOBULINA(TG)
</h7><input type="checkbox"  name="ante189" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>LH
</h7><input type="checkbox"  name="ante190" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>FSH
</h7><input type="checkbox"  name="ante191" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

  <h7>PROLACTINA
</h7><input type="checkbox"  name="ante192" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>PROGESTERONA
</h7><input type="checkbox"  name="ante193" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>17 BETA ESTRADIOL (ESTRÓGENOS)
</h7><input type="checkbox"  name="ante194" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>TESTOSTERONA TOTAL
</h7><input type="checkbox"  name="ante195" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>CORTISOL 
<input value="AM"  type="radio" name="ante196" id="lt" >AM 
                              <input value="PM" type="radio" name="ante196" id="lt" >PM
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>DHEAS
</h7><input type="checkbox"  name="ante197" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
<div class="form-group col-md-12">

  <h7>ACTH
</h7><input type="checkbox"  name="ante198" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>PARATOHORMONA(PTH)
</h7><input type="checkbox"  name="ante199" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>HcG BETA CUALITATIVA 
</h7><input type="checkbox"  name="ante200" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>HcG BETA CUANTITATIVA
</h7><input type="checkbox"  name="ante201" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>(GH) HORMONA CRECIMIENTO
</h7><input type="checkbox"  name="ante202" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INSULINA
</h7><input type="checkbox"  name="ante203" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>

<div class="form-group col-md-12">

  <h7>INSULINA POST PRANDIAL
</h7><input type="checkbox"  name="ante204" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                             </div>
</div>


<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-6">
<div align="left"><b>16 INMUNO DIAGNÓSTICO</b> </div> 
</div>  
 <div class="form-group col-md-6">
<div align="left"><b>17 ORINA </b></div>
</div>

</div> </div>


<div class="form-group col-md-6">
<div class="form-group col-md-12">

                                                             <h7>HELI
<input value="IgG"  type="radio" name="ante205" id="lt" >IgG  
<input value="IgM" type="radio" name="ante205" id="lt" >IgM
<input value="IgA" type="radio" name="ante205" id="lt" >IgA
                                                                                                                        
                                                     </div>


<div class="form-group col-md-12">

                                                      <h7>ANTI HAV IgG
</h7><input type="checkbox"  name="ante206" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                            </div>
                                                               <div class="form-group col-md-12">

                                                               <h7>ANTI HAV IgM

</h7><input type="checkbox"  name="ante207" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                               <h7>ANTÍGENO AUSTRALIA Hbs- Ag
</h7><input type="checkbox"  name="ante208" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                 <h7>ANTI HBs 
</h7><input type="checkbox"  name="ante209" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                    <div class="form-group col-md-12">

                                                 <h7>ANTI HBe
</h7><input type="checkbox"  name="ante210" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                             <h7>ANTI HBC IgM
</h7><input type="checkbox"  name="ante211" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>




<div class="form-group col-md-12">

                                         <h7>ANTI HBC(ANTI CORE TOTAL)
</h7><input type="checkbox"  name="ante212" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                       <h7>HBeAg

</h7><input type="checkbox"  name="ante213" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                        <h7>HBsAg(ANTÍGENO AUSTRALIA)
</h7><input type="checkbox"  name="ante214" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                  <h7>ANTI HCV (ANTICUERPOS TOTALES)

</h7><input type="checkbox"  name="ante215" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                  <h7>INMUNOGLOBULINAS
<input value="IgG"  type="radio" name="ante216" id="lt" >IgG  
<input value="IgA" type="radio" name="ante216" id="lt" >IgA
<input value="IgM" type="radio" name="ante216" id="lt" >IgM
<input value="IgE" type="radio" name="ante216" id="lt" >IgE
                                                                                                                        
                                                                                                                        </div>
</div>



<div class="form-group col-md-6">
<div class="form-group col-md-12">

                                                                                   <h7>EMO

</h7><input type="checkbox"  name="ante217" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                         <h7>GRAM EN SEDIMIENTO
</h7><input type="checkbox"  name="ante218" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                   <h7>GOTA FRESCO

</h7><input type="checkbox"  name="ante219" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                            <div class="form-group col-md-12">

                                                    <h7> CULTIVO Y ANTIBIOGRAMA

</h7><input type="checkbox"  name="ante220" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="form-group col-md-12">

                                                    <h7> SODIO

</h7><input type="checkbox"  name="ante221" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="form-group col-md-12">

                                                    <h7>POTASIO

</h7><input type="checkbox"  name="ante222" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="form-group col-md-12">

                                                    <h7> CLORO

</h7><input type="checkbox"  name="ante223" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="form-group col-md-12">

                                                    <h7> PROTEINURA ORINA 24H

</h7><input type="checkbox"  name="ante224" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="form-group col-md-12">

                                                    <h7> PROTEINURA ORINA OCASIONAL

</h7><input type="checkbox"  name="ante225" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                    <h7> MICROALBUNIMURIA

</h7><input type="checkbox"  name="ante226" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                    <h7> DEPURACIÓN DE CREATININA 

</h7><input type="checkbox"  name="ante227" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-12">
                                                <div class="form-group">
                                                  <label> BARR EN ORINA:</label>
                                                  <input type="text" name="ante228" class="form-control" value="No___Muestras"> 
                                                </div>
                                            </div>

<div class="form-group col-md-12">

                                                    <h7> ELECTROLITOS EN ORINA

</h7><input type="checkbox"  name="ante229" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


                                                                                                                       <div class="form-group col-md-12">

                                                                                                                        <h7>PCR, VSG, RA TES ACIDO URICO BIOMETRIA
</h7><input type="checkbox"  name="ante64" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div> 
</div>



<div class="row">
        <div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-6">
<div align="left"><b>18 PATOLOGÍA-CITOLOGÍA</b> </div> 
</div>  
 <div class="form-group col-md-6">
<div align="left"><b>19 OTROS </b></div>
</div>

</div> </div>


<div class="form-group col-md-6">



<div class="form-group col-md-12">

                                                      <h7>PAP TEST (PLACA)
</h7><input type="checkbox"  name="ante230" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                            </div>
                                                               <div class="form-group col-md-12">

                                                               <h7>PAP TEST (CITOLOGÍA LÍQUIDA)

</h7><input type="checkbox"  name="ante231" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                       
<div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b> BIOPSIA DE:</b></label>
                                                  <input type="text" name="ante232" class="form-control"> 
                                                </div>
                                            </div>



</div>



<div class="form-group col-md-6">
<div class="form-group col-md-12">

                                                                                   <h7>ESPERMATOGRAMA

</h7><input type="checkbox"  name="ante233" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                         <h7>ANÁLISIS DE CÁLCULO RENAL
</h7><input type="checkbox"  name="ante234" value=" <font color=red> <B> X</B></font>" > 
                                                                                                                        
                                                                                                                        
</div>






</div>

<textarea id="detallar" name="detallar" placeholder="Observaciones"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>


</div>    </div></div>-->



<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#imagen">
                                                                                                                         Imagenologia
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="imagen" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
                                                                                                        


<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#estudio">
                                                                                                                Estudio solicitado
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                        <div id="estudio" class="panel-collapse collapse">
                                                                                                        <div class="box-body">


<div class="row">
<div class="form-group col-md-2">

                                                                                                                        <h7 style="background: #A4A4A4">RX CONVENCIONAL                                                 

</h7 ><input type="checkbox"  name="anteCt1" value=":X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-2">

                                                                                                                        <h7 style="background: #A4A4A4">TOMOGRAFIA                                                              

</h7 ><input type="checkbox"  name="anteCt2" value=":X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-2">

                                                                                                                        <h7 style="background: #A4A4A4">RESONANCIA

</h7 ><input type="checkbox"  name="anteCt3" value=":X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-2">

                                                                                                                        <h7 style="background: #A4A4A4">ECOGRAFÍA                                                                       

</h7 ><input type="checkbox"  name="anteCt4" value=":X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-2">

                                                                                                                        <h7 style="background: #A4A4A4">PROCEDIMIENTO                           
</h7 ><input type="checkbox"  name="anteCt5" value=":X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-2">

                                                                                                                        <h7 style="background: #A4A4A4">OTROS                           

</h7 ><input type="checkbox"  name="anteCt6" value=":X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                </div>

<div class="form-group col-md-12">
                <div align="left" style="background: #A4A4A4" > DESCRIPCION</div>
            


                <div align="right">
                  <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="enfermedadActual" name="estudio"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea> </div>



<div class="form-group col-md-6">


                                                                                                                        <h7 style="background: #A4A4A4">PUEDE MOVILIZARSE

</h7 ><input type="checkbox"  name="anteCt7" value=":X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-6">

                                                                                                                        <h7 style="background: #A4A4A4">PUEDE RETIRARSE VENDAS, APOSITOS O YESOS
PARCIAL (TTP)
</h7 ><input type="checkbox"  name="anteCt8" value=":X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-6">

                                                                                                                        <h7 style="background: #A4A4A4">EL MEDICO ESTARA PRESENTE EN EL EXAMEN

</h7 ><input type="checkbox"  name="anteCt9" value=":X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-6">

                                                                                                                        <h7 style="background: #A4A4A4">TOMA DE RADIOLOGIA EN LA CAMA
</h7 ><input type="checkbox"  name="anteCt10" value=":X" > 
                                                                                                                        
                                                                                                                        </div>
        
                                                                                                                        </div>


                                                                                                </div>

                                                                                                </div>

<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#motivo">
                                                                                                                        Motivo solicitud
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="motivo" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
<b>REGISTRAR LAS RAZONES PARA SOLICITAR ACLARACION DE DIAGNOSTICO</b>



                                                                                                                <div class="form-group col-md-12">
                                                                                                                        


                                                                                                                        <div align="right">
                                                                                                                        <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                                                                                                                        </div>


                                                                                                                        <textarea  id="motivoConsulta" name="motivosolicitud"  class="textarea" placeholder="Motivo solicitud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                                                                                                                </div>

                                                                                                </div>

                                                                                                </div> </div>

<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#resumen">
                                                                                                                Resumen clínico
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="resumen" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
<div class="form-group col-md-12">
               


                <div align="right">
                  <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="notasadicionales" name="resumenclinico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            
               
             
              </div>
               </div> </div> </div>


<!--

<div class="panel box box-danger">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#DIAGNOSTICO">
                                                                                                                Diagnóstico
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="DIAGNOSTICO" class="panel-collapse collapse">
                                                                                                        <div class="box-body">


<div class="row">
                                                                                                                <div class="form-group col-md-4">
                                                                                                                        <div align="left">Diagnóstico</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-6">
                                                                                                                        <div align="left">CIE</div>
                                                                                                                        
                                                                                                                </div>



<div class="form-group col-md-2">
                                                                                                                        <div align="left">DEF/PRE</div>
                                                                                                                        
                                                                                                                </div>


</div>


<div class="row">
        <div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico1">
                                                                                                                        
                                                                                                                </div>




<div class="form-group col-md-6">
                                       
                                        <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10D1" class="form-control select2"  style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          

                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>






<div class="form-group col-md-2">
                                                                                                                
  <select name="pre1" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>

                                                                                                        </div>


<div class="row">
        <div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control" name="diagnostico2">
                                                                                                                        
                                                                                                                </div>




<div class="form-group col-md-6">
                                       
                                        <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10D2" class="form-control select2"  style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          

                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>


<div class="form-group col-md-2">
                                                                                                                
  <select name="pre2" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>

                                                                                                        </div>



<div class="row">
        <div class="form-group col-md-4">
                                                                                                                        
                                                                                                                        <input type="text" class="form-control " name="diagnostico3">
                                                                                                                        
                                                                                                                </div>




<div class="form-group col-md-6">
                                       
                                        <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10D3" class="form-control select2"  style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          

                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>



<div class="form-group col-md-2">
                                                                                                                
  <select name="pre3" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>
                                                                                                        </div>





                                                                                        
</div></div>



</div>


</div></div>    



-->
</div> </div> </div>















<!--<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#Epidemiologia">
                                                                                                                        12. Epidemiologia
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="Epidemiologia" class="panel-collapse collapse">
                                                                                                        <div class="box-body">


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Signos y síntomas</label><br>
                                                </div>
                                                </div>




 <div class="col-md-5">
                                                <div class="form-group">
                                                  <label>Fecha de inicio de cuadro clínico</label><br>
                                                  <input type="date" name="epi1" id="epi1" class="form-control input-lg"> 
                                                </div>
                                                </div>


<div class="col-md-5">
                                                <div class="form-group">
                                                  <label>Fecha de inicio de sintoma /signo relevante</label><br>
                                                  <input type="date" name="epi2" id="epi2" class="form-control input-lg"> 
                                                </div>
                                                </div>
<div class="col-md-2">
                                                <div class="form-group">
                                                  <label># Días</label><br>
                                                  <input type="text" name="epi3" id="" class="form-control input-lg"> 
                                                </div>
                                                </div>

<div class="form-group col-md-3">
<div class="form-group col-md-12">

                                                                                                                        <h7>Adenopatías

</h7><input type="checkbox"  name="epi4" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Alt. neurológicas periféricas
</h7><input type="checkbox"  name="epi5" value=":  X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>Alt. neurológicas  central

</h7><input type="checkbox"  name="epi6" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Anorexia
</h7><input type="checkbox"  name="epi7" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>Apnea

</h7><input type="checkbox"  name="epi8" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Artralgia

</h7><input type="checkbox"  name="epi9" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Ascitis
</h7><input type="checkbox"  name="epi10" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="form-group col-md-12">

                                                                                                                        <h7>Cefalea
</h7><input type="checkbox"  name="epi11" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>Otros signos y síntomas:
</h7><input type="checkbox"  name="epi12" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>








<div class="form-group col-md-3">
<div class="form-group col-md-12">

                                                                                                                        <h7>Cianosis

</h7><input type="checkbox"  name="epi13" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Convulsiones
</h7><input type="checkbox"  name="epi14" value=":  X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>Deshidratación

</h7><input type="checkbox"  name="epi15" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Diarrea
</h7><input type="checkbox"  name="epi16" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>Dificultad respiratoria

</h7><input type="checkbox"  name="epi17" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Dolor abdominal

</h7><input type="checkbox"  name="epi18" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Dolor garganta
</h7><input type="checkbox"  name="epi19" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="form-group col-md-12">

                                                                                                                        <h7>Erupción
</h7><input type="checkbox"  name="epi20" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


</div>



<div class="form-group col-md-3">
<div class="form-group col-md-12">

                                                                                                                        <h7>Escalofríos

</h7><input type="checkbox"  name="epi21" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Espasmo muscular
</h7><input type="checkbox"  name="epi22" value=":  X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>Estridor respiratorio

</h7><input type="checkbox"  name="epi23" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Fiebre
</h7><input type="checkbox"  name="epi24" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>Fiebre

</h7><input type="checkbox"  name="epi25" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Mialgias

</h7><input type="checkbox"  name="epi26" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Nausea/vómitos
</h7><input type="checkbox"  name="epi27" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Parálisis
</h7><input type="checkbox"  name="epi28" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


</div>



<div class="form-group col-md-3">
<div class="form-group col-md-12">

                                                                                                                        <h7>Prurito

</h7><input type="checkbox"  name="epi29" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Rigidez muscular
</h7><input type="checkbox"  name="epi30" value=":  X" > 
                                                                                                                        
                                                                                                                        </div><div class="form-group col-md-12">

                                                                                                                        <h7>Sangrados

</h7><input type="checkbox"  name="epi31" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Fiebre
</h7><input type="checkbox"  name="epi32" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="form-group col-md-12">

                                                                                                                        <h7>Tos

</h7><input type="checkbox"  name="epi33" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Trismus

</h7><input type="checkbox"  name="epi34" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
                                                                                                                        <div class="form-group col-md-12">

                                                                                                                        <h7>Visión borrosa
</h7><input type="checkbox"  name="epi35" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


</div>


<div class="col-md-12">
                                        <div class="form-group">
                                          <label>Caracterizar el/los signos/síntomas más relevantes:</label><br>
                                           <input type="text" name="epi36" id="" class="form-control input-lg dosis"  > 
                                           </div>
                                           </div>


<div class="col-md-12">
                                        <div class="form-group">
                                          <label>Alergias a farmacos:</label><br>
                                           <input type="text" name="epi37" id="" class="form-control input-lg dosis"  > 
                                           </div>
                                           </div>


<div class="col-md-12">
                                        <div class="form-group">
                                          <label>Enfermedades crónicas:</label><br>
                                           <input type="text" name="epi38" id="" class="form-control input-lg dosis"  > 
                                            </div>
                                           </div>


<div class="col-md-12">
                                        <div class="form-group">
                                          <label>Refiere:</label><br>
                                           <input type="text" name="epi39" id="" class="form-control input-lg dosis"  > 
                                            </div>
                                           </div>



<div class="form-group col-md-3">

                                                                                                                        <h7>Resibió tratamiento
</h7><input type="checkbox"  name="epi40" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="form-group col-md-9">

                                                                                                                        </div>

<div class="col-md-12">
                                        <div class="form-group">
                                          <label>Especifique:</label><br>
                                           <input type="text" name="epi41" id="" class="form-control input-lg dosis"  > 
                                            </div>
                                           </div>




<div class="row">
<div class="form-group col-md-4">
<div class="form-group col-md-12">


                                                                                                                        <h7> <b>EVOLUCIÓN: <b>

                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                                                                                        <h7>Mejoró
</h7><input type="checkbox"  name="epi42" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                                                                                        <h7>Iguales condiciones
</h7><input type="checkbox"  name="epi43" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Empeoró
</h7><input type="checkbox"  name="epi44" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


</div>


<div class="form-group col-md-4">
<div class="form-group col-md-12">


                                                                                                                        <h7> <b>LUGAR DONDE RECIBIÓ TRATAMIENTO:<b>

                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                                                                                        <h7>Domicilio
</h7><input type="checkbox"  name="epi44" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                                                                                        <h7>Farmacia
</h7><input type="checkbox"  name="epi45" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>


<div class="form-group col-md-4">

        <div class="form-group col-md-12">

                                                                                                                        

                                                                                                                        
                                                                                                                        </div>


<div class="form-group col-md-12">

                                                                                                                        <h7>Unidades de Salud del MSP
</h7><input type="checkbox"  name="epi46" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                                                                                        <h7>Otras Unidades de sector Público
</h7><input type="checkbox"  name="epi47" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="form-group col-md-12">

                                                                                                                        <h7>Unidades de Salud Privadas
</h7><input type="checkbox"  name="epi48" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>


</div>



<div class="row">
<div class="col-md-3">

                                                                                                                        <h7>Hospitalizado
</h7><input type="checkbox"  name="epi49" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Fecha hosptalizado</label><br>
                                                  <input type="date" name="epi50" id="" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Servicio</label><br>
                                                  <input type="text" name="epi51" id="" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Nombre Hospital</label><br>
                                                  <input type="text" name="epi52" id="" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

</div>



<div class="row">

<div class="col-md-3">

                                                                                                                        <h7>Ingreso a UCI
</h7><input type="checkbox"  name="epi53" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Condicion egreso:</label><br>
                                                  
                                                </div>
                                                </div>

<div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Vivo</label>
</h7><input type="checkbox"  name="epi54" value=":  X" > 
                                                  
                                                </div>
                                                </div>

<div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Muerto</label>
</h7><input type="checkbox"  name="epi55" value=":  X" > 
                                                  
                                                </div>  </div>
       

   <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Fecha fallecimiento</label>
</h7><input type="checkbox"  name="epi56" value=":  X" > 
                                                  
                                                </div>
                                                </div>                                           

</div>



<div class="row">
        
<div class="col-md-4">

                                                                                                                        <h7>Antecedentes vacunal
</h7><input type="checkbox"  name="epi57" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="col-md-4">
                                                <div class="form-group">
                                                  <label>Desconoce</label>
</h7><input type="checkbox"  name="epi58" value=":  X" > 
                                                  
                                                </div>
                                                </div>

<div class="col-md-4">  </div>
 
</div>






        
<div class="col-md-3">
        <div class="col-md-12">

                                                                                                                        <h7>BCG
</h7><input type="checkbox"  name="epi59" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-12">

                                                                                                                        <h7>FA
</h7><input type="checkbox"  name="epi60" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-12">

                                                                                                                        <h7>HB
</h7><input type="checkbox"  name="epi61" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="col-md-12">

                                                                                                                        <h7>DT
</h7><input type="checkbox"  name="epi62" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>



<div class="col-md-3">
        <div class="col-md-12">

                                                                                                                        <h7>Rota
</h7><input type="checkbox"  name="epi63" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-12">

                                                                                                                        <h7>DPT
</h7><input type="checkbox"  name="epi64" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-12">

                                                                                                                        <h7>OPV
</h7><input type="checkbox"  name="epi65" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="col-md-12">

                                                                                                                        <h7>dT
</h7><input type="checkbox"  name="epi66" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>




<div class="col-md-3">
        <div class="col-md-12">

                                                                                                                        <h7>Penta
</h7><input type="checkbox"  name="epi67" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-12">

                                                                                                                        <h7>SRP
</h7><input type="checkbox"  name="epi68" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-12">

                                                                                                                        <h7>Influenza
</h7><input type="checkbox"  name="epi69" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="col-md-12">

                                                                                                                        <h7>Varicela
</h7><input type="checkbox"  name="epi70" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>


<div class="col-md-3">
        <div class="col-md-12">

                                                                                                                        <h7>Neumococo Conjugado
</h7><input type="checkbox"  name="epi71" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-12">

                                                                                                                        <h7>Neumococo Polisacarido
</h7><input type="checkbox"  name="epi72" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-12">

                                                                                                                        <h7>SR
</h7><input type="checkbox"  name="epi73" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

 <div class="col-md-12">

                                                                                                                        <h7>Otras
</h7><input type="checkbox"  name="epi74" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

</div>



                                                <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Fecha de última dosis</label><br>
                                                  <input type="date" name="epi75" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



 <div class="col-md-2">
                                                <div class="form-group">
                                                  <label># de dosis recibida</label><br>
                                                  <input type="text" name="epi75" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

<div class="col-md-3">

                                                                                                                        <h7>Tarjeta vacunación
</h7><input type="checkbox"  name="epi76" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-3">

                                                                                                                        <h7>Registro servicio salud
</h7><input type="checkbox"  name="epi77" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">

                                                                                                                        <h7>Verbal
</h7><input type="checkbox"  name="epi78" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>





 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Antecedentes de contacto con:</label><br>
                                                  
                                                </div>
                                                </div>




<div class="col-md-2">

                                                                                                                        <h7>Animal
</h7><input type="checkbox"  name="epi79" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">

                                                                                                                        <h7>Gente sintomatica
</h7><input type="checkbox"  name="epi80" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-2">

                                                                                                                        <h7>Alimentos
</h7><input type="checkbox"  name="epi81" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="col-md-2">

                                                                                                                        <h7>Aguas/suelos
</h7><input type="checkbox"  name="epi82" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="col-md-2">

                                                                                                                        <h7>Basurales
</h7><input type="checkbox"  name="epi83" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="col-md-2">

                                                                                                                        <h7>Ninguno
</h7><input type="checkbox"  name="epi84" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">

                                                                                                                        <h7>Metanol
</h7><input type="checkbox"  name="epi85" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">

                                                                                                                        <h7>Metales pesados
</h7><input type="checkbox"  name="epi86" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-2">

                                                                                                                        <h7>Solventes
</h7><input type="checkbox"  name="epi87" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="col-md-2">

                                                                                                                        <h7>Plaglicidas
</h7><input type="checkbox"  name="epi89" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                
                                                                                                                <div class="col-md-4">
                                                <div class="form-group">
                                                  <label>Otros</label>
                                                  <input type="text" name="epi90" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>




        <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Lugar geográfico</label>
                                                  <input type="text" name="epi91" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


        <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Forma de contacto</label>
                                                  <input type="text" name="epi92" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

        <div class="col-md-4">
                                                <div class="form-group">
                                                  <label>Origen/tipo/nombre del objeto de contacto</label>
                                                  <input type="text" name="epi93" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



        <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Fecha de contacto</label>
                                                  <input type="date" name="epi94" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>





 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>En caso contacto con agua/alimentos, verifique su procedencia:</label><br>
                                                 </div>
                                                </div>


<div class="col-md-2">

                                                                                                                        <h7>Casa
</h7><input type="checkbox"  name="epi95" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">

                                                                                                                        <h7>Restaurante
</h7><input type="checkbox"  name="epi96" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-2">

                                                                                                                        <h7>Calle
</h7><input type="checkbox"  name="epi97" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="col-md-2">

                                                                                                                        <h7>Reunion social
</h7><input type="checkbox"  name="epi98" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                
                                                                                                                <div class="col-md-4">
                                                <div class="form-group">
                                                  <label>Otro</label>
                                                  <input type="text" name="epi99" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>






 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Tipo de exposición:</label><br>
                                                 </div>
                                                </div>


<div class="col-md-2">

                                                                                                                        <h7>Ocupacional
</h7><input type="checkbox"  name="epi100" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-2">

                                                                                                                        <h7>Intencional suicida
</h7><input type="checkbox"  name="epi101" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-2">

                                                                                                                        <h7>Reacción adversa
</h7><input type="checkbox"  name="epi102" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                        <div class="col-md-2">

                                                                                                                        <h7>Accidental
</h7><input type="checkbox"  name="epi103" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

                                                                                                                

                                                                                                                <div class="col-md-2">

                                                                                                                        <h7>Intencional homicida
</h7><input type="checkbox"  name="epi103a" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="col-md-2">

                                                                                                                        <h7>Desconocida
</h7><input type="checkbox"  name="epi104" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




                                                                                                                <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Otro</label>
                                                  <input type="text" name="epi105" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



<div class="col-md-4">

                                                                                                                        <h7>Antecedentes de transfusión sanguínea
</h7><input type="checkbox"  name="epi106" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="col-md-2">

                                                                                                                        <h7>Embarazada
</h7><input type="checkbox"  name="epi107" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-6">

                                                                                                                        <h7>Semanas de gestación
</h7><input type="text" name="epi108" id="dosis" class="form-control input-lg dosis" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-3">

                                                                                                                        <h7>Antecedentes de viajes , visita
</h7><input type="checkbox"  name="epi109" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>





                                                                                                                <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Lugar</label>
                                                  <input type="text" name="epi110" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



                                                                                                                <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Fecha de estadia desde:</label>
                                                  <input type="date" name="epi111" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



                                                <div class="col-md-3">
                                                <div class="form-group">
                                                  <label> Hasta:</label>
                                                  <input type="date" name="epi112" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label> Caracterizar los factores de riesgo identificados:</label>
                                                    <textarea type="text" class="form-control nota" name="epi113"  id=""> </textarea>
                                                </div>
                                                </div>


 <div class="col-md-12" align="center">
                                                
                                                  <label> Información de contactos periodo de incubación y transmisibilidad:</label>
                                                  
</div>

 <div class="form-row">
      

<div class="form-group col-md-3">
<div align="left">  

  <label>Nombre</label> </div>

              
                
                  <input type="text" name="nombrea" id="nombrea" class="form-control input-lg"> 
 
               

              </div>
              
 <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Edad</label><br>
                                                  <input type="text" name="edada" id="edada" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


                                            <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Sexo</label><br>
                                                  <input type="text" name="sexoa" id="sexoa" class="form-control input-lg sexo"  > 
                                                </div>
                                                </div> 

                                                <div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Relación con el caso</label>
                                                  <input type="text" name="casoa" id="casoa" class="form-control input-lg caso"  > 
                                                 
                                                </div>
                                                </div>


<div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Dirección</label>
                                                  <input type="text" name="direccciona" id="direccciona" class="form-control input-lg direccion"  > 
                                                  
                                                </div>
                                                </div>


<div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Enfermo</label>
                                                  <select class="form-control enfermo" name="enferno" id="enferno" >
                                                     <option value=" "> </option>
                                                     <option value="SI">SÍ </option>
                                                     <option value=" NO">NO </option>
                                                 </select>

                                                                                                </div>
                                                </div>

<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Fecha de Inicio de sintómas</label>
                                                  <input type="date" name="dsintomas" id="dsintomas" class="form-control input-lg "> 
                                                  
                                                </div>
                                                </div>

<div class="col-md-7">
                                                <div class="form-group">
                                                  <label>Observaciones:</label>
                                                  <input type="text" name="observaciona" id="observaciona" class="form-control input-lg "  > 
                                                  
                                                </div>
                                                </div>





</div>

<input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
              <input type="hidden" name="idT" id="idT"  value="<?php echo $idT?>">
             <div class="form-group col-md-12">
                  <br>

<a href="#"  onclick="agergarItem1();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Agregar más contactos </strong>  </font> </a>


<br>
</div>

 <div class="form-group col-md-12" id="div-resultas"></div>




<br>


<script type="text/javascript">
                $(document).ready(function() 
                {
                        $('#limpiar').click(function() {
                                $('.dosis').val('');
                                $('.posologia').val('');
                                $('.frecuencia').val('');
                                $('.administracion').val('');
                                $('.dosisdia').val('');
                                $('.dias').val('');
                                $('.via').val('');
                                $('.total').val('');
                                $('.nota').val('');
                                 
                        });
                });
    </script>

<br>






<div class="col-md-4">

                                                                                                                        <h7>Se tomó muestra de laboratorio?
</h7><input type="checkbox"  name="epi114" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="col-md-4">

                                                                                                                        <h7>tomadas antes de dar tratamiento?
</h7><input type="checkbox"  name="epi115" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="col-md-4" align="center">
                                                <div class="form-group">
                                                  <label> Tipo de muestra:</label>
                                                  <input type="text"  name="epi116" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label> Resultado de laboratorio:</label>
                                                  <input type="text"  name="epi117" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label> Diagnóstico definitivo:</label>
                                                   <input type="text"  name="epi118" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


<div class="col-md-12">

                                                                                                                        <h7>Confirmado por:

                                                                                                                        </div>

<div class="col-md-2">

                                                                                                                        <h7>Laboratorio
</h7><input type="checkbox"  name="epi119" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
<div class="col-md-2">

                                                                                                                        <h7>Clínica
</h7><input type="checkbox"  name="epi120" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>
<div class="col-md-2">

                                                                                                                        <h7>Nexo
</h7><input type="checkbox"  name="epi121" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>


<div class="col-md-3">

                                                                                                                        <h7>Es caso aislado
</h7><input type="checkbox"  name="epi122" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-3">

                                                                                                                        <h7>Es parte de brote o epidemia
</h7><input type="checkbox"  name="epi123" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="col-md-12">
        <br>

                                                                                                                        <h7>Actividades generales:
<br>
                                                                                                                        </div>



<div class="col-md-4">
        
<br>
                                                                                                                        <h7>Visita domiciliaria
</h7><input type="checkbox"  name="epi124" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="col-md-4">
        


                                                <div class="form-group">
                                                   <label> Fecha:</label>
                                                  <input type="date" name="epi125" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

<div class="col-md-4">
                                                <div class="form-group">
                                                  <label> Observaciones:</label>
                                                  <input type="text"  name="epi126" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



<div class="col-md-4">

                                                                                                                        <h7>Búsqueda activa de casos
</h7><input type="checkbox"  name="epi127" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-4">
        


                                                <div class="form-group">
                                                  <label> Fecha:</label>
                                                  <input type="date" name="epi128" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>
<div class="col-md-4">
                                                <div class="form-group">
                                                  <label> # casos encontrados:</label>
                                                  <input type="text"  name="epi129" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>



<div class="col-md-4">

                                                                                                                        <h7>Seguimiento de contactos
</h7><input type="checkbox"  name="epi130" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-4">
        


                                                <div class="form-group">
                                                  <label> Fecha:</label>
                                                  <input type="date" name="epi131" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


<div class="col-md-4">
                                                <div class="form-group">
                                                  <label> Fecha ultimo seguimiento:</label>
                                                  <input type="date"  name="epi132" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>





<div class="col-md-12">
        <br>

                                                                                                                        <h7>Actividades específicas:
<br>
                                                                                                                        </div>



<div class="col-md-4">
        <br>

                                                                                                                        <h7>Vacunación de bloqueo
</h7><input type="checkbox"  name="epi133" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>




<div class="col-md-4">
        <br>


                                                <div class="form-group">
                                                  
                                                  <input type="date" name="epi134" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

<div class="col-md-4">
                                                <div class="form-group">
                                                
                                                <textarea type="text" class="form-control nota" name="epi135"  id="" placeholder="Observaciones"> Observaciones</textarea>
                                                </div>
                                                </div>



<div class="col-md-4">

                                                                                                                        <h7>Profilaxis a los contactos
</h7><input type="checkbox"  name="epi136" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>

<div class="col-md-4">
        


                                                <div class="form-group">
                                                  
                                                  <input type="date" name="epi137" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>

<div class="col-md-4">
 <div class="form-group">
                                                                                                                        <h7>
                                                                                                                                <input type="text" name="epi138" id="dosis" class="form-control input-lg dosis"  > 
</h7>
                                                                                                                        </div>
                                                                                                                        
                                                                                                                        </div>




<div class="col-md-4">

                                                                                                                        <h7>Monitoreo rápido de cobertura
</h7><input type="checkbox"  name="epi139" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-4">
        


                                                <div class="form-group">
                                                  
                                                  <input type="date" name="epi140" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


<div class="col-md-4">
                                                <div class="form-group">
                                                  
                                                  <input type="text"  name="epi140" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>





<div class="col-md-4">

                                                                                                                        <h7>Tratamiento de criadero de
vectores
</h7><input type="checkbox"  name="epi141" value=":  X" > 
                                                                                                                        
                                                                                                                        </div>



<div class="col-md-4">
        


                                                <div class="form-group">
                                                  
                                                  <input type="date" name="epi142" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div>


<div class="col-md-4">
                                                <div class="form-group">
                                              
                                                  <input type="text"  name="epi143" class="form-control input-lg dosis" placeholder="% de vacunados que se encontró" > 
                                                </div>
                                                </div>


<div class="col-md-12">
                                                <div class="form-group">
                                                  <label> Describa otras actividades de control realizadas:</label>
                                                <textarea type="text" class="form-control nota" name="epi144"  id=""> </textarea>
                                                </div>
                                                </div>



</div> </div> </div>-->





<div class="panel box box-success">
                                                                                                <div class="box-header with-border">
                                                                                                        <h4 class="box-title">
                                                                                                                <a data-toggle="collapse" data-parent="#accordion1" href="#recetario">
                                                                                                                        Recetario
                                                                                                                </a>
                                                                                                        </h4>
                                                                                                </div>
                                                                                                <div id="recetario" class="panel-collapse collapse">
                                                                                                        <div class="box-body">
                <!--

          <form action="detalleRecetario.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
        
         <form id="detalleRecetario2" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
                -->                                                                                             


        <div class="form-row">
      
<!--
<div class="form-group col-md-12">
<div align="left">  

  <label>Medicamento e indicaciones</label> </div>

              
                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="usuario_id" value="<?php echo  $usuario_id?>">
                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione Medicamento</option>
                    <?php
                        $queryList=mysqli_query($conn3,"SELECT * FROM  pos");

                    
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $descripcion     = $row_recordset32['descripcion'];
                                          $concentracion    = $row_recordset32['concentracion'];
                                         
                                         $formafarmaceutica  = $row_recordset32['formafarmaceutica'];
                                         $codigo  = $row_recordset32['codigo'];
                                          $ID              = $row_recordset32['id'];
                                         
                                          echo "<option value=' $codigo | $descripcion | $formafarmaceutica' > $descripcion | $concentracion | $formafarmaceutica </option>";
                                      }

                    ?>

                  <input type="text" name="codigoProd1" id="codigoProd1" class="form-control input-lg"> 
 
                </select>

              </div>  -->



<div class="col-md-12" align="left"> 

Seleccione Medicamento

<div class="col-md-3">
<br> 
<input type="text"  id="clientepos"  onChange="verPos();" placeholder="Buscar Medicamento" >

 
</div>
                <div id="div-results10"  class="col-md-9">
                </div>


                 <input type="text" name="codigoProd1" id="codigoProd1" class="form-control input-lg" placeholder="Añadir a la receta medicamento que no está en la lista"> 
</div>




              <div class="row">

 <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Cantidad</label><br>
                                                  <input type="number" name="cantidad" id="cantidad" class="form-control dosis" placeholder="obligatorio**"  > 
                                                </div>
                                                </div>


                                           <!--     <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Dosis</label><br>
                                                  <input type="number" name="dosis" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> -->

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Presentación</label>
                                                  <select class="form-control posologia" name="posologia" id="posologia" >
                                                     <option value=" "> </option>
                       <!--     <option value="Miligramos">Miligramos </option
                            <option value="Milimetros">Milimetros</option>
                            <option value="Microgramos">Microgramos</option>
                            <option value="Gramos">Gramos</option>
                            <option value="Milimetros">CC</option>
                            <option value="Unidad">Unidad</option>
                            <option value="Sobre">Sobre</option>
                            <option value="Frasco">Frasco</option>
                            <option value="Onza">Onza</option> -->
                            <option value="Tabletas">Tabletas</option>
                            <option value="Ampollas">Ampollas</option>
                            <option value="Capsulas">Cápsulas</option>
                             <option value="Comprimidos">Comprimidos</option>
                            <option value="Crema">Crema</option>
                            <option value="Jarabe">Jarabe</option>
                            <option value="Ovulos">Ovulos</option>
                            <option value="Sobre">Sobre</option>
                            <option value="Tubo">Tubo</option>
                            <option value="Gotas">Gotas</option>
                            <option value="Loción crema">Loción crema</option>
                            <option value="Loción crema">Loción crema</option>
                            <option value="Aceite">Aceite</option>
                            <option value="Supositorio">Supositorio</option>
                            <option value="Frasco">Frasco</option>
                            
                            
                          </select>
                                                </div>  
                                             </div> </div>
                                            <!--      <div class="form-group">
                                                   <label>Frecuencia  dosis(cada)</label>
                                                  <input type="number" name="frecuencia" id="frecuencia" class="form-control input-lg frecuencia" onChange="calculardosis();"  step="any"> 
                                                </div>
                                                </div>

                              <div class="col-md-3">
                                                <div class="form-group">
                                                   <label>Tiempo </label>
                                                  <select class="form-control" name="administracion" id="administracion" class="form-control input-lg administracion" onChange="calculardosis();" step="any"> 
                                                     <option value=" ">Selecione ...</option>
                            <option value="Minutos">Minutos</option>
                            <option value="Horas">Horas  </option>
                            <option value="Dias">Dias</option>
                            <option value="Semana">Semana</option>
                            <option value="Unica">&uacutenica vez</option>
                            <option value="Mes">Mes</option>
                            <option value="Ano">Año</option>
                            
                          </select>
                                                </div>
                                                </div>


                                                <div class="col-md-4">
                                                <div class="form-group">
                                                  <label>Dosis por d&iacutea</label><br>
                                                  <input type="text" class="form-control input-lg dosisdia" id="dosisdia" name="dosisdia"step="any">
                                                </div>
                                                </div>
              

<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Por cuantos d&iacuteas</label><br>
                                                  <input type="text" class="form-control input-lg dias"  id="dias" name="dias" onChange="calculardosis();"  step="any">
                                                </div>
                                                </div>




                                            <div class="col-md-5">
                                                <div class="form-group">
                                                  <label>V&iacutea de administraci&oacuten </label>
                                                  <select class="form-control via" name="via" id="via" >
                                                     <option value=" ">Selecione....</option>
                            <option value="Oral">Oral </option>
                            <option value="Intra venosa">Intra venosa</option>
                            <option value="Rectal">Rectal</option>
                             <option value="Vaginal">Vaginal</option>
                             <option value="inhalada">inhalada</option>
                             <option value="T&oacutepica">T&oacutepica</option>
                             <option value="Oft&aacutelmica">Oft&aacutelmica</option>
                             <option value="Otica">Otica</option>
                             <option value="Intrad&eacutermico">Intrad&eacutermico</option>
                             <option value="Subd&eacutermico">Subd&eacutermico</option>
                             <option value="Intramuscular">Intramuscular</option>
                          </select>
                                                </div>
                                            </div> 






                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Cantidad dosis total</label><br>
                                                  <input type="text" class="form-control input-lg total" id="total" name="total" step="any">
                                                </div>
                                              </div> -->
<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Indicaciones</label><br>
                                                  <textarea type="text" class="form-control nota" name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMENTO"> </textarea>
                                                </div>
                                                </div>
                                            
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Indicaciones generales de la Recetas</label><br>
                                                  <textarea type="text" class="form-control nota" name="nota2"  id="nota2" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL. "> </textarea>
                                                </div>
                                                </div>
               
 
              <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
              <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idR?>">
              <input type="hidden" name="contact" id="contact" value="<?php echo $idT?>">
              
            <input type="hidden" name="nomedicamento" value="<?php echo $descripcion?>">

           
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
 
            
             <div class="form-group col-md-2">
                  <br>
                   
<a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>

   
<!--
<a href="#"  onclick="limpiar();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Limpiar </strong>  </font> </a>
    <input type="button" onclick="limpiarFormulario()" value="Limpiar formulario">
-->
               
              </div>
<script type="text/javascript">
                $(document).ready(function() 
                {
                        $('#limpiar').click(function() {
                                $('.dosis').val('');
                                $('.posologia').val('');
                                $('.frecuencia').val('');
                                $('.administracion').val('');
                                $('.dosisdia').val('');
                                $('.dias').val('');
                                $('.via').val('');
                                $('.total').val('');
                                $('.nota').val('');
                                $('.nota2').val('');
                                 
                        });
                });
    </script>

            <br>

                <div class="form-group col-md-12" id="div-results"></div>
                <br>
                <br>


                <!--
          </form>
                -->





                                                                                                        </div></div></div>      



                                                                                                </div> 
 







                                                                                                                </div>  </div>  </div>




<div class="form-group col-md-12">
                                <label>Ya terminé <input type="checkbox"  value="" required="" ></label>
                              </div>




                                                                                                        <hr>
                                                                                                        <!-- <div class="col-sm-12">
                                                                                                                <div align="center">
                                                                                                                        <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                                                                                                                </div>
                                                                                                        </div> -->

                                                                                                        <!-- <div class="col-sm-6">
                                                                                                                <div align="left">
                                                                                                                        <label>Fecha </label>
                                                                                                                </div>
                                                                                                                <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
                                                                                                                <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
                                                                                                                <div id="div-results"></div>
                                                                                                        </div> -->

                                                                                                        <!-- <div class="col-sm-6">
                                                                                                                <div align="left">
                                                                                                                        <label>Hora </label>
                                                                                                                </div>
                                                                                                                <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
                                                                                                                <div id="div-resultsHora"></div>
                                                                                                        </div> -->

                                                                                                        <!-- <div class="col-sm-6">
                                                                                                                <div align="left">
                                                                                                                        <label>Motivo consulta</label>
                                                                                                                </div>
                                                                                                                <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                                                                                                        </div> -->

                                                                                                        <!-- <div class="col-sm-6">
                                                                                                                <label>Especialista </label>
                                                                                                                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" ="">
                                                                                                                <option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                                                        <?php
                                                        usuariosAselect($ID);

                                                        ?>
                                                                                                                </select>

                                                                                                        </div> -->

                                                                                                        <!-- <div class="col-sm-6">

                                                                                                                <br>
                                                                                                                <br>
                                                                                                                <label>
                                                                                                                        <input type="radio" name="P" value="0" class="flat-red" >
                                                                                                                        <i class="fa fa-user"></i>  Presencial

                                                                                                                        <input type="radio" name="P" value="1"  class="flat-red"  >
                                                                                                                        <i class="fa fa-video-camera"></i>   Virtual
                                                                                                                </label>
                                                                                                        </div> -->

                                                                                                        <input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
                                                                                                        <input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
                                                                                                        <input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
                                                                                                        <input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
                                                                                                        <input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
                                                                                                        <input  type="hidden" name="receta"  value="<?php echo $idR?>">
                                                                                                        <input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">
                                                                                                        <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">

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

                                                                                        </div>

                                                                                </form>

                                                                        </div>

                                                                </div>

                                                        </div>

                                                </div>

                                        </div>

                                </div>

                        </div>

                </div>

        </section>

</div>


<?php include("footer.php")?>
<script src="apiVoz.js"></script>

<script type="text/javascript">





     
function calculardosis(){
  m1 = document.getElementById("frecuencia").value;
  m2 = document.getElementById("administracion").value;
  m3 = document.getElementById("dias").value;

if (m2=="Horas") 
{
 

r= 24/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

if (m2=="Minutos") 
{
 

r= 1440/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Dias") 
{
 

r= 1/m1;  

      

  document.getElementById("dosisdia").value = r;


 }


if (m2=="Semana") 
{
 
a= 7*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Mes") 
{
 
a= 30*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Ano") 
{
 
a= 365*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }
 

  if (m2=="Unica") 
{
 


r= "&uacutenica Dosis";
      

  document.getElementById("dosisdia").value = r;


 }

 rt=r*m3;
document.getElementById("total").value = rt;

 
   }
       
 
    
    function agergarItem(){
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

 var dosis = $("#dosis").val();
 var posologia = $("#posologia").val();
 var frecuencia = $("#frecuencia").val();
 var administracion= $("#administracion").val();
 var dosisdia= $("#dosisdia").val();
 var dias= $("#dias").val();
 var via= $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val(); 
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();
        var codigoProd1 = $("#codigoProd1").val();
        var nota2 = $("#nota2").val();
        var cantidad = $("#cantidad").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2, cantidad:cantidad},
            success: function(response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#dosisdia').val('');
                $('#dias').val('');
                $('#via').val('');
                $('#total').val('');
                $('#nota').val('');
                $('#cantidad').val('');
                
               $('#codigoProd').val('');
               $('#codigoProd1').val('');
                $('#nota2').val('');

                $('#div-results').html(response);
             
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };










function agergarItem1(){
        // estas son las variables que enviamos
        var nombrea = $("#nombrea").val();

var edada = $("#edada").val();
 var sexoa = $("#sexoa").val();
 var casoa = $("#casoa").val();
 var direccciona= $("#direccciona").val();
var enferno= $("#enferno").val();
 var dsintomas= $("#dsintomas").val();
 var observaciona= $("#observaciona").val(); 
  var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idT= $("#idT").val();
        
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemContactos.php",
            data: {nombrea:nombrea, edada:edada, sexoa:sexoa, casoa:casoa, direccciona:direccciona, enferno:enferno,dsintomas:dsintomas, observaciona:observaciona,usuario_id:usuario_id, idcliente:idcliente, idT:idT},
            success: function(response) {

                $('#nombrea').val('');
             $('#edada').val('');
                 $('#sexoa').val('');
               $('#casoa').val('');
                $('#direccciona').val('');
                $('#enferno').val('');
                $('#dsintomas').val('');
                $('#observaciona').val('');
                $('#div-resultas').html(response);
             
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });

    };



















 
     /* document.getElementById("detalleRecetario").reset(); */

         

function eliminarItem1()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper1").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

      function eliminarItem3()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper3").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

       function eliminarItem4()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper4").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

        
       function eliminarItem5()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper5").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

         
        
       function eliminarItem6()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper6").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };           

    function listaItem(){
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
                      
            }
        });
    };
    window.onload=listaItem;   
 






    function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);

            }
        });
    };

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

        function calcularprematuriedad(){
                try {
                        var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
                        var     b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
                        document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
                } catch (e) {
                }
        }
        function calcularEdadCorregida(){
                try {
                        var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
                        var     b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
                        document.formularioActualizarcliente.edadCorregida.value = b - a;
                } catch (e) {
                }
        }



  function verlista(){
 
        var clienteId = $("#clienteId").val();
        var name1 = $("#name1").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name1},
            success: function(response) {
                $('#div-results1').html(response);
                 
            }
        });
    };

      
function verlista2(){
 
        var clienteId = $("#clienteId2").val();
        var name2 = $("#name2").val();
      // este es el codigo cierto ?
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista2.php",
            data: {clienteId:clienteId, name2:name2},
            success: function(response) {
                $('#div-results2').html(response);
                 
            }
        });
    };









    function verlista3(){
 
        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista3.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results3').html(response);
                 
            }
        });
    };

    function verlista4(){
 
        var clienteId = $("#clienteId4").val();
        var name4 = $("#name4").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista4.php",
            data: {clienteId:clienteId, name4:name4},
            success: function(response) {
                $('#div-results4').html(response);
                 
            }
        });
    };

    function verlista5(){
 
        var clienteId = $("#clienteId5").val();
        var name5 = $("#name5").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista5.php",
            data: {clienteId:clienteId, name5:name5},
            success: function(response) {
                $('#div-results5').html(response);
                 
            }
        });
    };



 function verPos(){
 
        var clientepos = $("#clientepos").val();
        var codigoProd = $("#codigoProd").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Poslista.php",
            data: {clientepos:clientepos, codigoProd:codigoProd},
            success: function(response) {
                $('#div-results10').html(response);
                 
            }
        });
    };


</script>
 

