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
	      	<h1>Consulta médica</h1>
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
											                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">'; }
											                else
											                { echo ''; }
											                ?>
              												<input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId?>&ID=<?php echo $ID?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />
              											</div>  
														<br>

              											<div class="col-md-12"><hr></div>
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
											
											<form action="guardar_historiaClinica14_cardiologia.php" method="POST" name="formularioActualizarcliente">

									            <div class="panel box box-success">
									                <div class="box-header with-border">
									                    <h4 class="box-title">
									                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwoo">
									                        Antecedentes Heredo-Familiares
									                      </a>
									                    </h4>
									                </div>
									                <div id="collapseTwoo" class="panel-collapse collapse">
									                	<div class="box-body">
										                    <div class="row">
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Padre:</label>
										                            <input type="text" name="padre" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div> 
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Madre:</label>
										                            <input type="text" name="madre"class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div>  
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Abuelos Paternos:</label>
										                            <input type="text" name="abuelos1" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div>
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Abuelos Maternos:</label>
										                            <input type="text"  name="abuelos2" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div>
										                    </div>
										                    <div class="row">
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Hermanos:</label>
										                            <input type="text" name="hermanos" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div> 

										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Otros:</label>
										                            <input type="text" name="otros" class="form-control" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div> 
										               		</div>
										               	</div>
									           		</div>
									           	</div>

									           	<div class="panel box box-danger">
									                <div class="box-header with-border">
									                    <h4 class="box-title">
									                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTree">
									                        Antecedentes 
									                      </a>
									                    </h4>
									                </div>
									                <div id="collapseTree" class="panel-collapse collapse">
									                    <div class="box-body">
									                    	<div class="row">
										                        <div class="col-md-12">
										                          	<div class="form-group">
											                            <label>Antecedentes Personales No Patológicos</label>
											                            <textarea class="form-control"  name="ant_nopatologicos" rows="3" placeholder="TABAQUISMO:  
																		ALCOHOLISMO:  
																		TOXICOMANÍAS: Niega.
																		EJERCICIO: Sedentario
																		DIETA:  
																		VIVIENDA:  
																		FLORA: Niega. 
																		FAUNA: Niega.
																		ANIMALES DOMÉSTICOS: Niega.
																		HIGIENE: 
																		INMUNIZACIONES:
																		ALERGIAS: Niega.
																		"></textarea>
	                          										</div>
	                        									</div>
	                    									</div>

										                    <div class="row">
										                        <div class="col-md-12">
										                          	<div class="form-group">
											                            <label>Antecedentes Personales Patológicos</label>
											                            <textarea class="form-control" name="ant_paatologicos" rows="3" placeholder="">ENFERMEDADES DE LA INFANCIA: 
																		FRACTURAS:  
																		HOSPITALIZACIONES:  . 
																		QUIRÚRGICOS:  
																		TRANSFUSIONES:
																		PSIQUIATRICAS:.
																		</textarea>
	                          										</div>
	                        									</div>
	                    									</div>
														</div>
                									</div>
            									</div>

            									<div class="panel box box-warning">
                  									<div class="box-header with-border">
                    									<h4 class="box-title">
                      										<a data-toggle="collapse" data-parent="#accordion1" href="#collapsefour"> Examen Físico</a>
                    									</h4>
                  									</div>
                  									<div id="collapsefour" class="panel-collapse collapse">
                    									<div class="box-body">

                    										<div class="row">
                    											<div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>
										                        <div class="col-md-3">
										                          	<div class="form-group">
										                           		<label class="control-label">Peso en KG</label>
										                           		<input type="number"  class="form-control input-lg" id="peso" name="peso" onChange="calcularimc();" step="any">
										                          	</div>
										                        </div> 
										                        <div class="col-md-3">
										                          	<div class="form-group">
										                            	<label class="control-label">Altura en <strong>  Centimetros </strong></label>
										                           		<input type="number"  class="form-control input-lg" id="altura" name="altura" onChange="calcularimc();" step="any">
										                          	</div>
										                        </div>  
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">Índice de masa corporal</label>
										                            <input type="number"  class="form-control input-lg" id="imc" name="imc" step="any">
										                          </div>
										                        </div>
										                        <div class="col-md-3">
										                          	<div class="form-group">
										                            	<label class="control-label">Composición corporal</label>
										                            	<input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
										                          	</div>
										                        </div>
									                    	</div>
									                    	<div class="row">
										                        <div class="col-md-3">
										                          	<div class="form-group">
										                            	<label class="control-label">TART (mmhg)</label>
										                            	<input type="text"  class="form-control input-lg" id="peso" name="tart1" step="any" placeholder="123 / 123"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          	</div>
										                        </div> 
										                        <div class="col-md-3">
										                          	<div class="form-group">
										                            	<label class="control-label">Temperatura  ºC</label>
										                           		<input type="text"  class="form-control input-lg" id="altura" name="temperatura" step="any"  maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          	</div>
										                        </div>  
										                        <div class="col-md-3">
										                          	<div class="form-group">
										                            	<label class="control-label">F Card (LPM)</label>
										                            	<input type="text" class="form-control input-lg" id="fcard" name="fcard"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          	</div>
										                        </div>
										                        <div class="col-md-3">
										                          <div class="form-group">
										                            <label class="control-label">SAT02</label>
										                            <input type="text"  class="form-control input-lg" id="sat" name="sat"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
										                          </div>
										                        </div>
									                    	</div>
									                    	
                    									</div>
                    								</div>
                    							</div>
                    							<div class="box-group" id="examenFisico1">
									                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
									                <div class="panel box box-primary">
									                  	<div class="box-header with-border">
									                    	<h4 class="box-title">
									                      		<a data-toggle="collapse" data-parent="#examenFisico" href="#estadoGeneral">Estado General</a>
									                    	</h4>
									                  	</div>
									                  	<div id="estadoGeneral" class="panel-collapse collapse">
									                    	<div class="box-body">
									                    		<div class="form-group col-md-6" align="right">
												                    Buen estado general
												                    <input value="1" type="radio" name="e11" id="lt" class="flat-red"/> SI  
												                    <input value="2" type="radio" name="e11" id="lt" class="flat-red"/> NO  
												                </div>  

												                <div class="form-group col-md-6" align="left">
												                    Febril al tacto
												                    <input value="1" type="radio" name="e12" id="lt" class="flat-red"/> SI  
												                    <input value="2" type="radio" name="e12" id="lt" class="flat-red"/> NO  
												                </div>  

												                <div class="form-group col-md-6" align="right">
												                    Irritable 
												                    <input value="1" type="radio" name="e13" id="lt" class="flat-red"/> SI  
												                    <input value="2" type="radio" name="e13" id="lt" class="flat-red"/> NO  
												                </div>
												                <div class="form-group col-md-12" align="left">
                    												Anotaciones 
                    												<input type="text" class="form-control input-lg" id="e14" name="e14"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                    											</div> 
                   												
                   												<div class="col-md-6">
														            <div class="panel box box-primary">
													                	<div class="box-header with-border">
													                    	<h4 class="box-title">
													                      		<a data-toggle="collapse" data-parent="#examenFisico" href="#estadoConciencia">Estado Conciencia</a>
													                    	</h4>
													                	</div>
					                  									<div id="estadoConciencia" class="panel-collapse collapse">
					                    									<div class="box-body">

															                    <div class="form-group col-md-6" align="right">
															                    Alerta  
															                      <input value="1" type="radio" name="e21" id="lt" class="flat-red"/> SI  
															                      <input value="2" type="radio" name="e21" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="right">
															                    Somnoliento  
															                      <input value="1" type="radio" name="e22" id="lt" class="flat-red"/> SI  
															                      <input value="2" type="radio" name="e22" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="right">
															                    Inconciente  
															                      <input value="1" type="radio" name="e23" id="lt" class="flat-red"/> SI  
															                      <input value="2" type="radio" name="e23" id="lt" class="flat-red"/> NO  
															                    </div>  

															                   <div class="form-group col-md-12" align="left">
															                    Anotaciones 
															                    <input type="text" class="form-control input-lg" id="e24" name="e24"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
															                     
															                    </div> 

					                    									</div>
					                  									</div>
					                								</div>
					                								<div class="panel box box-primary">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#ojos">
													                        Ojos
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="ojos" class="panel-collapse collapse">
													                    <div class="box-body">
														                    <div class="form-group col-md-6" align="right">
														                      Reacción pupilar N 
														                      <input value="1" type="radio" name="e31" id="lt" class="flat-red"/> SI  
														                      <input value="2" type="radio" name="e31" id="lt" class="flat-red"/> NO  
														                    </div>  

														                    <div class="form-group col-md-6" align="right">
														                      Ojo Rojo
														                      <input value="1" type="radio" name="e32" id="lt" class="flat-red"/> SI  
														                      <input value="2" type="radio" name="e32" id="lt" class="flat-red"/> NO  
														                    </div>  

														                    <div class="form-group col-md-6" align="right">
														                      Dolor ocular 
														                      <input value="1" type="radio" name="e33" id="lt" class="flat-red"/> SI  
														                      <input value="2" type="radio" name="e33" id="lt" class="flat-red"/> NO  
														                    </div> 
														                    <div class="form-group col-md-6" align="right">
														                    	Nistagmo
														                      <input value="1" type="radio" name="e34" id="lt" class="flat-red"/> SI  
														                      <input value="2" type="radio" name="e34" id="lt" class="flat-red"/> NO  
														                    </div> 
														                    <div class="form-group col-md-6" align="right">
														                    	Pterigión
														                      <input value="1" type="radio" name="e35" id="lt" class="flat-red"/> SI  
														                      <input value="2" type="radio" name="e35" id="lt" class="flat-red"/> NO  
														                    </div> 
														                   	<div class="form-group col-md-12" align="left">
														                    	Anotaciones 
														                    	<input type="text" class="form-control input-lg" id="e36" name="e36"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
														                    </div> 
													                    </div>
													                  </div>
													                </div>
													                <div class="panel box box-primary">
														                <div class="box-header with-border">
														                    <h4 class="box-title">
														                      <a data-toggle="collapse" data-parent="#examenFisico" href="#otoscopia">
														                        Otoscopia
														                      </a>
														                    </h4>
														                </div>
														                <div id="otoscopia" class="panel-collapse collapse">
														                    <div class="box-body">

															                    <div class="form-group col-md-6" align="left">
															                    Dolor a la exploración 
															                      <input value="1" type="radio" name="e41" id="lt" class="flat-red"/> SI  
															                      <input value="2" type="radio" name="e41" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="left">
															                    Exsudados en CAE 
															                      <input value="1" type="radio" name="e42" id="lt" class="flat-red"/> SI  
															                      <input value="2" type="radio" name="e42" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="left">
															                    Cambios en timpanos  
															                      <input value="1" type="radio" name="e43" id="lt" class="flat-red"/> SI  
															                      <input value="2" type="radio" name="e43" id="lt" class="flat-red"/> NO  
															                    </div> 

															                   	<div class="form-group col-md-12" align="left">
															                    Anotaciones 
															                    <input type="text" class="form-control input-lg" id="e44" name="e44"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
															                    </div> 
														                    </div>
														                </div>
														            </div>
				                								</div>
				                								<div class="col-md-6">
					                								<div class="panel box box-primary">
														                <div class="box-header with-border">
														                    <h4 class="box-title">
														                      <a data-toggle="collapse" data-parent="#examenFisico" href="#cavidadOral">
														                        Cavidad Oral
														                      </a>
														                    </h4>
														                </div>
														                <div id="cavidadOral" class="panel-collapse collapse">
														                    <div class="box-body">
															                    <div class="form-group col-md-6" align="right">
															                    	Mucosa Oral 
																                    <input value="1" type="radio" name="e51" id="lt" class="flat-red"/> SI  
																                    <input value="2" type="radio" name="e51" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="left">
															                    	Aftas Bucales 
															                      	<input value="1" type="radio" name="e52" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e52" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="right">
															                    	Gingivitis 
															                      	<input value="1" type="radio" name="e53" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e53" id="lt" class="flat-red"/> NO  
															                    </div> 

															                    <div class="form-group col-md-6" align="left">
															                    	Caries 
															                      	<input value="1" type="radio" name="e54" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e54" id="lt" class="flat-red"/> NO  
															                    </div> 

															                    <div class="form-group col-md-12" align="right">
															                    	Faringe
															                    	<input type="text" class="form-control input-lg" id="e55" name="e55"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
															                    </div> 
														                    </div>
														                </div>
														            </div>
														            <div class="panel box box-primary">
													                  	<div class="box-header with-border">
														                    <h4 class="box-title">
														                      <a data-toggle="collapse" data-parent="#examenFisico" href="#cuello">
														                        Cuello
														                      </a>
														                    </h4>
													                  	</div>
														                <div id="cuello" class="panel-collapse collapse">
														                    <div class="box-body">
															                    <div class="form-group col-md-6" align="right">
															                    	Movilidad Normal 
															                      	<input value="1" type="radio" name="e61" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e61" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="left">
															                    	Adenomegalias
															                      	<input value="1" type="radio" name="e62" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e62" id="lt" class="flat-red"/> NO  
															                    </div>  

															                    <div class="form-group col-md-6" align="right">
															                    	Masa Palpable 
															                      	<input value="1" type="radio" name="e63" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e63" id="lt" class="flat-red"/> NO  
															                    </div> 

															                    <div class="form-group col-md-6" align="left">
															                    	Bocio
															                      	<input value="1" type="radio" name="e64" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e64" id="lt" class="flat-red"/> NO  
															                    </div> 
															                    <div class="form-group col-md-6" align="right">
															                    	Aneurisma 
															                      	<input value="1" type="radio" name="e65" id="lt" class="flat-red"/> SI  
															                      	<input value="2" type="radio" name="e65" id="lt" class="flat-red"/> NO  
															                    </div> 

															                   	<div class="form-group col-md-12" align="left">
															                    	Anotaciones 
															                    	<input type="text" class="form-control input-lg" id="e66" name="e66"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
															                    </div> 

														                    </div>
														                </div>
														            </div>
														            <div class="panel box box-primary">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#torax">
													                        Torax
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="torax" class="panel-collapse collapse">
													                    <div class="box-body">
													                      <div class="form-group col-md-6" align="rigth">
													                        Pulmones claros y bien ventilados 
													                        <input value="1" type="radio" name="e71" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e71" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="left">
													                        Roncus
													                        <input value="1" type="radio" name="e72" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e72" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="left">
													                        Silibancias
													                        <input value="1" type="radio" name="e73" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e73" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="rigth">
													                        Estertores
													                        <input value="1" type="radio" name="e74" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e74" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="left">
													                        Crepitantes 
													                        <input value="1" type="radio" name="e75" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e75" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="rigth">
													                        Hipoventilacion 
													                        <input value="1" type="radio" name="e76" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e76" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-12" align="left">
													                        Anotaciones 
													                        <input type="text" class="form-control input-lg" id="e55" name="e77"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
													                      </div> 
													                    </div>
													                  </div>
													                </div>
												                </div>
												                <div class="col-md-6">
																	<div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#corazon">
													                        Corazon
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="corazon" class="panel-collapse collapse">
													                    <div class="box-body">  
													                      <div class="form-group col-md-6" align="right">
													                        Ruidos cardiacos normales 
													                        <input value="1" type="radio" name="e81" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e81" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Soplo
													                        <input value="1" type="radio" name="e82" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e82" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Arritmia 
													                        <input value="1" type="radio" name="e83" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e83" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-12" align="right">
													                        Anotaciones 
													                        <input type="text" class="form-control input-lg" id="e55" name="e77"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
													                      </div> 
													                    </div>
													                  </div>
													                </div>
													                <div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#Abdomen">
													                        Abdomen
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="Abdomen" class="panel-collapse collapse">
													                    <div class="box-body">
													                      <div class="form-group col-md-6" align="right">
													                        Blando
													                        <input value="1" type="radio" name="e91" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e91" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Dolor a la exploración 
													                        <input value="1" type="radio" name="e92" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e92" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Peristalsis aumentada 
													                        <input value="1" type="radio" name="e93" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e93" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Hepatomegalia
													                        <input value="1" type="radio" name="e94" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e94" id="lt" class="flat-red"/> NO  
													                      </div> 
													                      <div class="form-group col-md-6" align="right">
													                        Hernia
													                        <input value="1" type="radio" name="e95" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e95" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Esplenomegalia
													                        <input value="1" type="radio" name="e96" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e96" id="lt" class="flat-red"/> NO  
													                      </div> 
													                      <div class="form-group col-md-12" align="left">
													                        Anotaciones 
													                        <input type="text" class="form-control input-lg" id="e55" name="e97"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
													                      </div> 
													                    </div>
													                  </div>
													                </div>
													                <div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#GenitoUrinario">
													                        Genito Urinario
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="GenitoUrinario" class="panel-collapse collapse">
													                    <div class="box-body">

													                    <div class="form-group col-md-6" align="right">
													                    Dolor suprapúblico
													                      <input value="1" type="radio" name="e101" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e101" id="lt" class="flat-red"/> NO  
													                    </div>  

													                    <div class="form-group col-md-6" align="right">
													                   Masa suprapública
													                      <input value="1" type="radio" name="e102" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e102" id="lt" class="flat-red"/> NO  
													                    </div>  

													                    <div class="form-group col-md-6" align="right">
													                    Peñopercusión dolorosa
													                      <input value="1" type="radio" name="e103" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e103" id="lt" class="flat-red"/> NO  
													                    </div> 

													                    <div class="form-group col-md-12" align="right">
													                    Notas
													                     <input type="text" class="form-control input-lg" id="e55" name="e97"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
													                    </div> 

													                    <div class="form-group col-md-6" align="right">
													                    Ulcera Genital 
													                      <input value="1" type="radio" name="e104" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e104" id="lt" class="flat-red"/> NO  
													                    </div> 

													                    <div class="form-group col-md-6" align="right">
													                    Verrugas genitales
													                      <input value="1" type="radio" name="e105" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e105" id="lt" class="flat-red"/> NO  
													                    </div> 

													                    <div class="form-group col-md-6" align="right">
													                    Flujo vaginal 
													                      <input value="1" type="radio" name="e106" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e106" id="lt" class="flat-red"/> NO  
													                    </div> 
													 
													                    <div class="form-group col-md-6" align="right">
													                    Varicocele 
													                      <input value="1" type="radio" name="e107" id="lt" class="flat-red"/> SI  
													                      <input value="2" type="radio" name="e107" id="lt" class="flat-red"/> NO  
													                    </div> 
													                    </div>
													                  </div>
													                </div>
																</div>
																<div class="col-md-6">
																	<div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#Extremidades">
													                        Extremidades
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="Extremidades" class="panel-collapse collapse">
													                    <div class="box-body">
													                      <div class="form-group col-md-6" align="right">
													                        Movilidad Normal 
													                        <input value="1" type="radio" name="e111" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e111" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Fuerza Normal
													                        <input value="1" type="radio" name="e112" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e112" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Deformidades
													                        <input value="1" type="radio" name="e113" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e113" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Marcha Normal 
													                        <input value="1" type="radio" name="e114" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e114" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Aumento Articular 
													                        <input value="1" type="radio" name="e115" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e115" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Dolor Articular 
													                        <input value="1" type="radio" name="e116" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e116" id="lt" class="flat-red"/> NO  
													                      </div> 
													                      <div class="form-group col-md-12" align="left">
													                        Anotaciones 
													                        <input type="text" class="form-control input-lg" id="e117" name="e97"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
													                      </div> 

													                    </div>
													                  </div>
													                </div>
													                <div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#VacularPeriferico">
													                        Vacular Periférico
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="VacularPeriferico" class="panel-collapse collapse">
													                    <div class="box-body">
													              
													                      <div class="form-group col-md-6" align="right">
													                        Edema 
													                        <input value="1" type="radio" name="e121" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e121" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        LLenado capilar 
													                        <input value="1" type="radio" name="e122" id="lt" class="flat-red"/> Normal  
													                        <input value="2" type="radio" name="e122" id="lt" class="flat-red"/> Lento  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Varices
													                        <input value="1" type="radio" name="e123" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e123" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-12" align="right">
													                        Notas
													                        <input type="text" class="form-control input-lg" id="e1231" name="e97"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
													                      </div> 

													                    </div>
													                  </div>
													                </div>
													                <div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#SistemaNervioso">
													                        Sistema Nervioso
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="SistemaNervioso" class="panel-collapse collapse">
													                    <div class="box-body">
													                  
													                      <div class="form-group col-md-6" align="right">
													                        Alerta 
													                        <input value="1" type="radio" name="e131" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e131" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Lenguaje coherente 
													                        <input value="1" type="radio" name="e132" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e132" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Temblor 
													                        <input value="1" type="radio" name="e133" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e133" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Prueba Dedo - Nariz 
													                        <input value="1" type="radio" name="e134" id="lt" class="flat-red"/> Normal  
													                        <input value="2" type="radio" name="e134" id="lt" class="flat-red"/> Anormal 
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Romberg
													                        <input value="1" type="radio" name="e135" id="lt" class="flat-red"/> Positivo  
													                        <input value="2" type="radio" name="e135" id="lt" class="flat-red"/> Negativo  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Reflejos paterales 
													                        <input value="1" type="radio" name="e136" id="lt" class="flat-red"/> Normal  
													                        <input value="2" type="radio" name="e136" id="lt" class="flat-red"/> Anormal  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Desviacion de comisura labial 
													                        <input value="1" type="radio" name="e137" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e137" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Hemiparesia 
													                        <input value="1" type="radio" name="e138" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e138" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-12" align="left">
													                        Anotaciones 
													                        <input type="text" class="form-control input-lg" id="e117" name="e1381"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">  
													                      </div> 
													                    </div>
													                  </div>
													                </div>
													                <div class="panel box box-success">
													                  <div class="box-header with-border">
													                    <h4 class="box-title">
													                      <a data-toggle="collapse" data-parent="#examenFisico" href="#PielAnexos">
													                        Piel y Anexos
													                      </a>
													                    </h4>
													                  </div>
													                  <div id="PielAnexos" class="panel-collapse collapse">
													                    <div class="box-body">
													                    
													                      <div class="form-group col-md-6" align="right">
													                        Exatema 
													                        <input value="1" type="radio" name="e141" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e141" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Abceso 
													                        <input value="1" type="radio" name="e142" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e142" id="lt" class="flat-red"/> NO  
													                      </div>  

													                      <div class="form-group col-md-6" align="right">
													                        Infección Local
													                        <input value="1" type="radio" name="e143" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e143" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Pioderma 
													                        <input value="1" type="radio" name="e144" id="lt" class="flat-red"/> Si  
													                        <input value="2" type="radio" name="e144" id="lt" class="flat-red"/> No 
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Ronchas 
													                        <input value="1" type="radio" name="e145" id="lt" class="flat-red"/> Si  
													                        <input value="2" type="radio" name="e145" id="lt" class="flat-red"/> No 
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Habones
													                        <input value="1" type="radio" name="e146" id="lt" class="flat-red"/> Si  
													                        <input value="2" type="radio" name="e146" id="lt" class="flat-red"/> No  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Angioedema 
													                        <input value="1" type="radio" name="e147" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e147" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Hipocromia 
													                        <input value="1" type="radio" name="e148" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e148" id="lt" class="flat-red"/> NO  
													                      </div> 

													                      <div class="form-group col-md-6" align="right">
													                        Erupción Herpetica
													                        <input value="1" type="radio" name="e149" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e149" id="lt" class="flat-red"/> NO  
													                      </div> 
													                      <div class="form-group col-md-6" align="right">
													                        Celulitis 
													                        <input value="1" type="radio" name="e1410" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e1410" id="lt" class="flat-red"/> NO  
													                      </div> 
													                      <div class="form-group col-md-6" align="right">
													                        Erisipela
													                        <input value="1" type="radio" name="e1411" id="lt" class="flat-red"/> SI  
													                        <input value="2" type="radio" name="e1411" id="lt" class="flat-red"/> NO  
													                      </div> 
													                      <div class="form-group col-md-12" align="left">
													                        Anotaciones 
													                        <input type="text" class="form-control input-lg" id="e1412" name="e1381"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> 
													                      </div> 

													                    </div>
													                  </div>
													                </div>
																</div>
												            	<br>  

    															<div class="form-group col-md-12">

      																<label> Exámenes de las partes del cuerpo </label>
      																<textarea id="examenPartesdCuerpo" name="examenPartesdCuerpo" class="textarea" placeholder="Exámenes de las partes del cuerpo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

    															</div> 
									                    	</div>
									                    </div>
									                </div>
									            </div>
									           

                    							<div class="row">
							                        <div class="col-md-12">
							                          <div class="form-group">
							                            <label>Padecimiento Actual</label>
							                            <textarea class="form-control" name="procedimiento" rows="3" placeholder=""></textarea>
							                          </div>
							                        </div>
							                    </div>
							                    <div class="row">
							                        <div class="col-md-12">
							                          <div class="form-group">
							                            <label>Interrogatorios por Aparatos y Sistemas</label>
							                            <textarea class="form-control" name="interrogatorios" rows="3" placeholder=""></textarea>
							                          </div>
							                        </div>
							                    </div>
							                    <div class="row">
							                        <div class="col-md-12">
							                          <div class="form-group">
							                            <label>Estado de Salud</label>
							                            <textarea class="form-control" name="estado" rows="3" placeholder=""></textarea>
							                          </div>
							                        </div>
							                    </div>
							                    <div class="row">
							                        <div class="col-md-12">
							                          <div class="form-group">
							                            <label>Pronóstico</label>
							                            <textarea class="form-control" name="pronostico" rows="3" placeholder=""></textarea>
							                          </div>
							                        </div>
							                    </div>
							                    <div class="row">
							                        <div class="col-md-12">
							                          <div class="form-group">
							                            <label>Diagnósticos</label>
							                            <textarea class="form-control" name="diagnostico" rows="3" placeholder=""></textarea>
							                          </div>
							                        </div>
							                    </div>
							                    
							                    <div class="row">
								                    <div class="col-sm-12">
									                  <div align="center"> 
									                    <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
									                  </div>
									                </div>
									 
									                <div class="col-sm-6">
									                  	<div align="left"><label>Fecha </label></div>
									                  	<input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
									                  	<input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
									                  	<div id="div-results"></div>
									                </div>
									                <div class="col-sm-6">
									                	<div align="left"><label>Hora </label></div>
									                 	<input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
									                	<div id="div-resultsHora"></div>
									                </div>
									                  
									                <div class="col-sm-6">
														        <div align="left"><label>Motivo consulta</label></div>
									                  <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
									                </div>

									                <div class="col-sm-6">
										                <label>Especialista </label>
										                <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
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
									                  		<input type="radio" name="P" value="0" class="flat-red" checked>
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
										              <br><br><br>
										             	<div class="col-sm-12">
										                <br><br>
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
      				</div>
      			</div>
      		</div>
    	</section>
    	<!-- /.content -->
  	</div>  
          
          
          
     

<?php include("footer.php")?>

