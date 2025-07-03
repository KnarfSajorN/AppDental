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
	    $dis     		  =$rowMotorizado['dis'];
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



 $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinicaN  where ID = cliente_id");
                
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


												<?php echo datosPacientes($clienteId);?>
										</div> </div>
										<form action="guardarHistoriaN.php" method="POST" name="formularioActualizarcliente">

											<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
															1. Motivo Consulta
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


                                                            </div>
              													</div>
												</div>
											</div>

											

											
<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Diagnostico">
															2. Enfermedad o problema Actual
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










<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentes">
														3.	Antecedentes Personales
														</a>
													</h4>
												</div>
												<div id="Antecedentes" class="panel-collapse collapse">
													<div class="box-body">
														
										             <div align="right">
														<a onclick="procesar4()" id="procesar4"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
														</div>
														<textarea id="antecedentesP" name="antecedentesP"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>


														
                                                            </div>
              													</div>
												</div>
											</div>

											<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree44">
															4. Antecedentes Familiares
														</a>
													</h4>
												</div>
												<div id="collapseThree44" class="panel-collapse collapse">
													<div class="box-body">


<div class="form-group col-md-12">

<div class="form-group col-md-3">

															<h7>1. CARDIOPATIA									

</h7><input type="checkbox" name="ant6" value=":  X" >
															
															</div>

					<div class="form-group col-md-3">											<h7>2. DIABETES									


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
				</div>
</div>










													<div align="right">
														<a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
														</div>
														<textarea id="antecedentesF" name="antecedentesF"  class="textarea" placeholder="Observaciones" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

	

                                                            </div>
              													</div>
												</div>
											</div>


	
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

					<div class="form-group col-md-3">											<h7>2. RESPIRATORIO										


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
														5.	Constantes Vitales y Antropometría
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
														6.	Examen Físico Regional
														</a>
													</h4>
												</div>
												<div id="analisis" class="panel-collapse collapse">
													<div class="box-body">


<div class="form-group col-md-12">

	<!--

<div class="form-group col-md-3">

															<h7>1. CABEZA									

</h7><input type="checkbox"  name="antecd6" value=":  X" > 
															
															</div>

					<div class="form-group col-md-3">											<h7>2. CUELLO								


</h7><input type="checkbox" name="antecd7" value=":  X" > 
															</div>

														<div class="form-group col-md-3">	
																<h7>3. TORÁX

 </h7><input type="checkbox" name="antecd8" value=":  X" >
														</div>

														<div class="form-group col-md-3">	
																<h7>4. ABDÓMEN								

</h7><input type="checkbox" name="antecd9" value=":  X" >  </div>

															
		<div class="form-group col-md-2">
																5. PELVÍS									

			</h7><input type="checkbox" name="antecd10" value=":  X" >
				</div>

<div class="form-group col-md-3">
																 6. EXTRÉMIDADES																		

			</h7><input type="checkbox" name="antecd11" value=":  X" >
				</div>
-->

<div align="right">
<a onclick="procesar6()" id="procesar6"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
														</div>
												
												<div class="box-body pad">
													<textarea id="tratamiento" name="regional" class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
												</div>
</div>
</div>

	</div>
</div>




<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#impresion">
															7. Análisis
														</a>
													</h4>
												</div>
												<div id="impresion" class="panel-collapse collapse">
													<div class="box-body">

    <!--             

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
                                                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
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
                                                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
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
                                                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
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
													</div>  -->



<div class="box-body pad">
														<textarea id="analisiss" name="analisiss" class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>





</div> </div>
												</div> 





<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#diagnostico">
															8. Diagnóstico
														</a>
													</h4>
												</div>
												<div id="diagnostico" class="panel-collapse collapse">
													<div class="box-body">

               

<div class="row">
														<div class="form-group col-md-4">
															<div align="left">Descripción del Diagnóstico</div>
															
														</div>



<div class="form-group col-md-6">
															<div align="left">CIE 10</div>
															
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
                                                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
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
                                                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
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
                                                echo "<option value='$codigo - $descripcionee'>$codigo - $descripcionee</option>";
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


<div class="box-body pad">
														<textarea id="dia" name="dia" class="textarea" placeholder="Otros Diagnósticos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>






</div> </div>
												</div> 














<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#examenesr">
															9. Planes y tratamiento
														</a>
													</h4>
												</div>
												<div id="examenesr" class="panel-collapse collapse">
													<div class="box-body">
													
													
													<div class="box-body pad">
														<textarea id="otros" name="otros" class="textarea" placeholder="" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>	</div>	</div>	</div>





<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#recetario">
															10. Recetario
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

              </div>
              <div class="row">

 <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Cantidad</label><br>
                                                  <input type="number" name="cantidad" id="cantidad" class="form-control input-lg dosis" placeholder="obligatorio**"  > 
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
                                                  <textarea type="text" class="form-control nota" name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMNETO"> </textarea>
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





													</div></div></div>	</div>	















<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#labo">
															11. Orden de laboratorio
														</a>
													</h4>
												</div>
												<div id="labo" class="panel-collapse collapse">
													<div class="box-body">
		
	
<div class="row"  style="background: #A4A4A4">
<div class="form-group col-md-8" style="border:1">
<div align="left"><b>	1.HEMATOLOGÍA </b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>	2. UROÁNALISIS </b> </div>
</div>
</div>
														
 


<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>BIOMETRIA HEMATICA								

</h7><input type="checkbox"  name="ante1" value=" :  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>SEDIMENTACION									

</h7><input type="checkbox"  name="ante2" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>GRUPO SANGUÍNEO Y
FACTOR RH							

</h7><input type="checkbox"  name="ante3" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>RETICULOCITOS									

</h7><input type="checkbox"  name="ante4" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>HEMATOZOARIO				
</h7><input type="checkbox"  name="ante5" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>HCG-B CUANTITATIVA					

</h7><input type="checkbox"  name="ante6" value=":  X" > 
															
															</div>






												</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>TIEMPO DE

PROTROMBINA (TP)						

</h7><input type="checkbox"  name="ante7" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>T. TROMBOPLASTINA

PARCIAL (TTP)
</h7><input type="checkbox"  name="ante8" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>COOMBS DIRECTO

</h7><input type="checkbox"  name="ante9" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>COOMBS INDIRECTO
</h7><input type="checkbox"  name="ante10" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>HEMOGLOBINA

GLICOSILADA (HBA1C)		
</h7><input type="checkbox"  name="ante11" value=":  X" > 
															
															</div>



												</div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>ELEMENTAL Y MICROSCOPICO

</h7><input type="checkbox"  name="ante12" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>PROTEINURIA 24 HORAS
</h7><input type="checkbox"  name="ante13" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>MICROALBUMINURIA

</h7><input type="checkbox"  name="ante14" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>UROCULTIVO
</h7><input type="checkbox"  name="ante15" value=":  X" > 
															
															</div>

</div>


	
	
<div class="row">
	<div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>1 A MARCADORES TUMORALES </b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>3.COPROLOGICO </b> </div>
</div>
<div class="form-group col-md-4">
<div align="left"></div>
</div>
</div> </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>AFP

</h7><input type="checkbox"  name="ante16" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>CEA
</h7><input type="checkbox"  name="ante17" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>CA 19-9

</h7><input type="checkbox"  name="ante18" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CA 125
</h7><input type="checkbox"  name="ante19" value=":  X" > 
															
															</div>

</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>COPROPARASITORIO SIMPLE

</h7><input type="checkbox"  name="ante20" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>COPROPARASITORIO SIMPLE
</h7><input type="checkbox"  name="ante21" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>SANGRE OCULTA

</h7><input type="checkbox"  name="ante22" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>POLIMORFONUCLEARES
</h7><input type="checkbox"  name="ante23" value=":  X" > 
															
															</div>
<div class="form-group col-md-12">

															<h7>ERRADICACION DE H. PYLORI
(ANTIGENO)
</h7><input type="checkbox"  name="ante24" value=":  X" > 
															
															</div>
</div>


<div class="row">
	<div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>4 QUIMICA SANGUINEA</b> </div> 
</div>  
 <div class="form-group col-md-8">
<div align="left"> </div>
</div>

</div> </div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>GLUCOSA EN AYUNAS

</h7><input type="checkbox"  name="ante25" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>GLUCOSA POST PRANDIAL
</h7><input type="checkbox"  name="ante26" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>BUN (NITROGENO UREICO)

</h7><input type="checkbox"  name="ante27" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CREATININA
</h7><input type="checkbox"  name="ante28" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>BILIRUBINA TOTAL
</h7><input type="checkbox"  name="ante29" value=":  X" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>BILIRUBINA DIRECTA
</h7><input type="checkbox"  name="ante30" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>ACIDO URICO
</h7><input type="checkbox"  name="ante31" value=":  X" > 
															
															</div>

																<div class="form-group col-md-12">

															<h7>PROTEINA TOTAL
</h7><input type="checkbox"  name="ante32" value=":  X" > 
															
															</div>

</div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>ALBUMINA

</h7><input type="checkbox"  name="ante33" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>FERRITINA
</h7><input type="checkbox"  name="ante34" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>NA - K - CL

</h7><input type="checkbox"  name="ante35" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CA IONICO
</h7><input type="checkbox"  name="ante36" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>TRANSAMINASA PIRUVICA
</h7><input type="checkbox"  name="ante37" value=":  X" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>TRANSAMINASA OXALACETICA
(AST)
</h7><input type="checkbox"  name="ante38" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>FOSFATASA ALCALINA
</h7><input type="checkbox"  name="ante39" value=":  X" > 
															
															</div>

																<div class="form-group col-md-12">

															<h7>GAMA GLUTIL TRANSPEPTIDASA
(GGT)
</h7><input type="checkbox"  name="ante40" value=":  X" > 
															
															</div>

</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>COLESTEROL TOTAL

</h7><input type="checkbox"  name="ante41" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>COLESTEROL HDL
</h7><input type="checkbox"  name="ante42" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>COLESTEROL LDL

</h7><input type="checkbox"  name="ante43" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>TRIGLICERIDOS
</h7><input type="checkbox"  name="ante44" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>AMILASA
</h7><input type="checkbox"  name="ante45" value=":  X" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>LIPASA

</h7><input type="checkbox"  name="ante46" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>LACTATO DESHIDROGENSA (LDH)
</h7><input type="checkbox"  name="ante47" value=":  X" > 
															
															</div>

																<div class="form-group col-md-12">

															<h7>CITOMEGALOVIRUS IGM
(GGT)
</h7><input type="checkbox"  name="ante48" value=":  X" > 
															
															</div>

</div>


<div class="row">
	<div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>5 SEROLOGÍA</b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>6 BACTERIOLOGÍA </b></div>
</div>

<div class="form-group col-md-4">
<div align="left"><b>7 OTROS </b></div>
</div>

</div> </div>


<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>VDRL

</h7><input type="checkbox"  name="ante49" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>HIV
</h7><input type="checkbox"  name="ante50" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>PCR SEMICUANTITATIVO

</h7><input type="checkbox"  name="ante51" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>PSA TOTAL / LIBRE
</h7><input type="checkbox"  name="ante52" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>ANTICUERPOS
ANTINUCLEARES (ANA)
</h7><input type="checkbox"  name="ante53" value=":  X" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>AC. ANTIPEROXIDASA

(ANTI-TPO)

</h7><input type="checkbox"  name="ante54" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>HAV IGM
</h7><input type="checkbox"  name="ante55" value=":  X" > 
															
															</div>




<div class="form-group col-md-12">

															<h7>LATEX
</h7><input type="checkbox"  name="LATEX" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>FACTOR REUMATODEO
</h7><input type="checkbox"  name="FACTOR" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>SEDIMENTACIÓN
</h7><input type="checkbox"  name="SEDI" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>PCR
</h7><input type="checkbox"  name="PCR" value=":  X" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>ANTI CCP
</h7><input type="checkbox"  name="CCP" value=":  X" > 
															
															</div>

<div class="form-group col-md-12">

															<h7>ANA
</h7><input type="checkbox"  name="ANA" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>ANTI DNA
</h7><input type="checkbox"  name="ANTI" value=":  X" > 
															
															</div>

</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>GRAM

</h7><input type="checkbox"  name="ante56" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>ZIEHL
</h7><input type="checkbox"  name="ante57" value=":  X" > 
															
															</div><div class="form-group col-md-12">

															<h7>KOH

</h7><input type="checkbox"  name="ante58" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>FRESCO
</h7><input type="checkbox"  name="ante59" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>CULTIVO - ANTIBIOGRAMA
ANTINUCLEARES (ANA)
</h7><input type="checkbox"  name="ante60" value=":  X" > 
															
															</div>

</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>TSH

</h7><input type="checkbox"  name="ante61" value=":  X" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>FT4
</h7><input type="checkbox"  name="ante62" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CORONAVIRUS PRUEBA RAPIDA

</h7><input type="checkbox"  name="ante63" value=":  X" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7> PRUEBA PCR

</h7><input type="checkbox"  name="ante65" value=":  X" > 
															
															</div>


															<div class="form-group col-md-12">

															<h7>PCR, VSG, RA TES ACIDO URICO BIOMETRIA
</h7><input type="checkbox"  name="ante64" value=":  X" > 
															
															</div>
</div>


</div></div>	</div>



<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#imagen">
															12. Imagenologia
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











<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#coronavirus">
															13. Test de coronavirus
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
                                                                                    
  <select name="antCO10" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>



<div class="form-group col-md-4">
<div align="left">¿Tienes dolor muscular?</div>
                                                                                    
  <select name="antCO11" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">¿Tienes sintomatología gastrointestinal?</div>
                                                                                    
  <select name="antCO12" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

</div>

<div class="form-group col-md-4">
<div align="left">¿Llevas más de 20 días con estos síntomas?</div>
                                                                                    
  <select name="antCO13" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>SI</option>
                <option>NO</option>
               
                
              </select>

      </div>      </div>      </div>      </div></div>













												</div> 
 







														</div>	</div>	</div>









													<hr>
											<!--		<div class="col-sm-12">
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
														<select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" ="">
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
													</div> -->

													<input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
													<input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
													<input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
													<input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
													<input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
													<input  type="hidden" name="receta"  value="<?php echo $idR?>">
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


 
     /* document.getElementById("detalleRecetario").reset(); */

         

<?php

for ($i = 1; $i <= 10; $i++) {
 ?>

      function eliminarItem<?php echo $i?>()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper<?php echo $i?>").val();
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



<?
}


?>             

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
			var	b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
			document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
		} catch (e) {
  		}
	}
	function calcularEdadCorregida(){
		try {
			var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
			var	b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
			document.formularioActualizarcliente.edadCorregida.value = b - a;
		} catch (e) {
  		}
	}
</script>
 

