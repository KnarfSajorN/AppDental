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
													<div class="row">

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
															<label><strong>Seguro :</strong></label>
															<label><?php echo $seguro;?></label>
														</div>

														<div class="col-md-2">
                                                            <?php
                                                            // echo strlen($logoF);
                                                            if (strlen($fotoperfil) > 0) {
                                                                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                                                            }
                                                            else{ echo ''; }
                                                            ?>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<hr>
														</div>
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
										<form action="guardarHistoriaClinica.php" method="POST" name="formularioActualizarcliente">








									          <div class="panel box box-danger">

												<div class="box-header with-border">

											<!--		<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
															Entrevista Inicial
														</a>
													</h4>
												</div>
												<div id="Entrevista" class="panel-collapse collapse">
													<div class="box-body">    -->



                                               <div class="form-row">

												<input type="hidden" name="registro" value="1">
												<div class="form-group col-md-12">

													<h4 class="box-title">
													<div align="left">Entrevista Inicial </div>  </h4> 
													
												</div>  </div> 




														<div class="form-group col-md-12">
															<div align="left">Motivo consulta</div>
															<textarea id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
														</div>

													<!--	<div class="form-group col-md-12">
															<div align="left"> Enfermedad actual</div>
															<input type="text" name="enfermedadActual"  class="form-control input-lg" id="enfermedadActual"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div> -->
<!--
													</div>
												</div>
											</div>   -->

										<!--	<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
															Revisión por sistema
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse">
													<div class="box-body">

														<div class="form-group col-md-3" align="right">
															Fiebre
															<input value="1" type="radio" name="rs1" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs1" id="lt" class="flat-red"/> NO
														</div>
														<div class="form-group col-md-3" align="right">
															Tos
															<input value="1" type="radio" name="rs2" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs2" id="lt" class="flat-red"/> NO
														</div>
														<div class="form-group col-md-3" align="right">
															Rinorrea
															<input value="1" type="radio" name="rs3" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs3" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Cefalea
															<input value="1" type="radio" name="rs4" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs4" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Mareo
															<input value="1" type="radio" name="rs5" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs5" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Vomito
															<input value="1" type="radio" name="rs6" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs6" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Diarrea
															<input value="1" type="radio" name="rs7" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs7" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Disuria
															<input value="1" type="radio" name="rs8" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs8" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Dolor de Garganta
															<input value="1" type="radio" name="rs9" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs9" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Dolor Adominal
															<input value="1" type="radio" name="rs10" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs10" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Disnea
															<input value="1" type="radio" name="rs11" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs11" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Otalgia
															<input value="1" type="radio" name="rs12" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs12" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Perdida de Peso
															<input value="1" type="radio" name="rs13" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs13" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Sangre en heces/defecar
															<input value="1" type="radio" name="rs14" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs14" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Hematuria
															<input value="1" type="radio" name="rs15" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs15" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Dolor en las extremidades
															<input value="1" type="radio" name="rs16" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs16" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Parestesias
															<input value="1" type="radio" name="rs17" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs17" id="lt" class="flat-red"/> NO
														</div>

														<div class="form-group col-md-3" align="right">
															Hipoestesias
															<input value="1" type="radio" name="rs18" id="lt" class="flat-red"/> SI
															<input value="2" type="radio" name="rs18" id="lt" class="flat-red"/> NO
														</div>  -->
<!--
														<div class="form-group col-md-12">
															<hr>
														</div>

													</div>
												</div>
											</div>

											<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentes">
															Antecedentes
														</a>
													</h4>
												</div>
												<div id="Antecedentes" class="panel-collapse collapse">
													<div class="box-body">
														<h4 class="box-title">Antecedentes Personales</h4>

														<div class="row">
															<div class="form-group col-md-2">
																<label>Alergias: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Alertas de Riesgo: <input type="checkbox" name="ale_rie" value="Alertas de Riesgo" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Cáncer: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Crecimiento y Desarrollo: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Diabetes: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>

														</div>

														<div class="row">
															<div class="form-group col-md-3">
																<label>Enfermedad Renal: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Fármacos: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Genéticos: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Habitos Nocivos: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>ITS: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
														</div>

														<div class="row">
															<div class="form-group col-md-3">
																<label>Habitos Saludables: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>

															<div class="form-group col-md-3">
																<label>Maltrato-Violencia: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Natales - Recien Nacido: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>

															<div class="form-group col-md-3">
																<label>Organos y Sistemas: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
														</div>

														<div class="row">
															<div class="form-group col-md-2">
																<label>Postnatales: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Prenatales: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Salud Mental: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Trastornos Hipertensivos: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Trastornos Tiroideos: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
														</div>

														<div class="row">
															<div class="form-group col-md-3">
																<label>Tuberculosis: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>VIH: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>

															<div class="form-group col-md-2">
																<label>Otros: <input type="checkbox" name="alergias" value="alergias" class="minimal"></label>
															</div>
														</div> -->
													

												</div>

											</div> 

										<div class="panel box box-success">
												<div class="box-header with-border">
										<!--				<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
															Examen Físico
														</a>
													</h4>
												</div>
												<div id="collapseThree" class="panel-collapse collapse">
													<div class="box-body">   -->


                                                <div class="form-row">

												<input type="hidden" name="registro" value="1">
												<div class="form-group col-md-12">

													<h4 class="box-title">
													<div align="left">Examen Físico  </div>  </h4>
													
												</div>  </div> 



													<!--	<div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

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
														</div> -->

														<div class="form-group col-md-3">
															<div align="left">TA (mmhg)</div>
															<input type="text" class="form-control input-lg" id="peso" name="tart1" step="any" placeholder="123 / 123"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div>

														<div class="form-group col-md-3">
															<div align="left">Temperatura  ºC </div>
															<input type="text" class="form-control input-lg" id="altura" name="temperatura" step="any"  maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div>
														<div class="form-group col-md-3">
															<div align="left">FC LPM</div>
															<input type="text" class="form-control input-lg" id="fcard" name="fcard"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div>

														<div class="form-group col-md-3">
															<div align="left">SAT02</div>
															<input type="text" class="form-control input-lg" id="sat" name="sat"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div>







									<!--	Leidy	         <div class="col-md-6">

															<div class="box-group" id="examenFisico1">
																<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
											<!--	leidy	         <div class="panel box box-primary">
																	<div class="box-header with-border">
																		<h4 class="box-title">
																			<a data-toggle="collapse" data-parent="#examenFisico" href="#estadoGeneral">
																				Estado General
																			</a>
																		</h4>
																	</div>
																	<div id="estadoGeneral" class="panel-collapse collapse">
																		<div class="box-body">

																			<div class="form-group col-md-6" align="right">
																				Buen estado general
																				<input value="1" type="radio" name="e11" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e11" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
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

																		</div>
																	</div>
																</div>

																<div class="panel box box-primary">
																	<div class="box-header with-border">
																		<h4 class="box-title">
																			<a data-toggle="collapse" data-parent="#examenFisico" href="#estadoConciencia">
																				Estado Conciencia
																			</a>
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

																			<div class="form-group col-md-6" align="right">
																				Dolor a la exploración
																				<input value="1" type="radio" name="e41" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e41" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Exsudados en CAE
																				<input value="1" type="radio" name="e42" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e42" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
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

																			<div class="form-group col-md-6" align="right">
																				Aftas Bucales
																				<input value="1" type="radio" name="e52" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e52" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Gingivitis
																				<input value="1" type="radio" name="e53" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e53" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Caries
																				<input value="1" type="radio" name="e54" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e54" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-12" align="left">
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

																			<div class="form-group col-md-6" align="right">
																				Adenomegalias
																				<input value="1" type="radio" name="e62" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e62" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Masa Palpable
																				<input value="1" type="radio" name="e63" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e63" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
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

																			<div class="form-group col-md-6" align="right">
																				Pulmones claros y bien ventilados
																				<input value="1" type="radio" name="e71" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e71" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Roncus
																				<input value="1" type="radio" name="e72" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e72" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Silibancias
																				<input value="1" type="radio" name="e73" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e73" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Estertores
																				<input value="1" type="radio" name="e74" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e74" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
																				Crepitantes
																				<input value="1" type="radio" name="e75" id="lt" class="flat-red"/> SI
																				<input value="2" type="radio" name="e75" id="lt" class="flat-red"/> NO
																			</div>

																			<div class="form-group col-md-6" align="right">
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

														</div> -->

											<!--leidy			<div class="col-md-6">

															<div class="box-group" id="examenFisico1">
																<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
											<!--	leidy				<div class="panel box box-success">
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
														</div>  leidy -->

													</div>

												</div>

											</div>         
											<br>

									<!--		<div class="form-group col-md-12">

												<label> Exámenes de las partes del cuerpo </label>
												<textarea id="examenPartesdCuerpo" name="examenPartesdCuerpo" class="textarea" placeholder="Exámenes de las partes del cuerpo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

											</div> -->

											<div class="form-row">

												<input type="hidden" name="registro" value="1">
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
													<input type="text" class="form-control input-lg" id="parentesco" name="parentesco" placeholder="Parentesco Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
												</div>

										<!-- Leidy		<div class="form-group col-md-12">
													<div align="left">Impresiones diagnosticas (Diagnostico general) </div>
												</div>

												<div class="box-body pad">
													<textarea id="diagnostico" name="diagnostico" class="textarea" placeholder="Diagnostico" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
												</div>  -->

												<div class="form-group col-md-12">
													<div align="left">Tratamiento (Plan de atención) </div>
												</div>
												<div class="box-body pad">
													<textarea id="tratamiento" name="tratamiento" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
												</div>

					<!-- Leidy							<div class="form-group col-md-3" align="right">
													Para clínicos
													<br>
													<input value="1" type="radio" name="p1" id="lt" class="flat-red"/> SI
													<input value="2" type="radio" name="p1" id="lt" class="flat-red"/> NO
												</div>

												<div class="form-group col-md-3" align="left">
													<input type="text" class="form-control input-lg" id="p2" name="p2"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
												</div>

												<div class="form-group col-md-3" align="right">
													Remisión
													<br>
													<input value="1" type="radio" name="e137" id="r1" class="flat-red"/> SI
													<input value="2" type="radio" name="e137" id="r1" class="flat-red"/> NO
												</div>

												<div class="form-group col-md-3" align="left">
													<input type="text" class="form-control input-lg" id="r2" name="r2"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
												</div>  -->

												<div class="form-group col-md-12">
													<div align="left">Diagnostico ministerio de Salud </div>
												</div>
										<!--		<div class="box-body pad">
													<textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="Diagnostico ministerio de Salud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
												</div>  -->

												<div class="form-group col-md-12">
													CIE-10
                                                    <?php
                                                    echo $cie10;
                                                    if ($cie10 == 1) {
                                                        ?>

														<select id="cie10" name="cie10" class="form-control select2" style="width: 100%;" >
															<option value="" selected="selected">Seleccione</option>
                                                            <?php
                                                            $usuario_id1 = $_SESSION['ID'].'cie10';
                                                            $queryList=mysqli_query($conn3,"SELECT * FROM $usuario_id1 order by codigo");
                                                            $nrowl=mysqli_num_rows($queryList);
                                                            while($row_recordset32=mysqli_fetch_array($queryList))
                                                            {
                                                                $codigo      = $row_recordset32['codigo'];
                                                                $descripcion      = $row_recordset32['descripcion'];


                                                                echo "<option value='$codigo'>$codigo - $descripcion</option>";
                                                            }

                                                            ?>

														</select>
														<div align="center">
															Para configurar la lista CIE10 <a href="<?php echo $Base?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i>clic aquí Configuración y perfil </strong></a> y luego seleccionamos la pestaña <strong> listas </strong>
															<font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
														</div>

                                                        <?php
                                                    }
                                                    else
                                                    {
                                                        echo ' <div align="center">Lista CIE10 desactivada, para activar debes entrar a configuración <a href="'.$Base.'/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                                    }
                                                    ?>

												</div>


                                                <?php if ($pro1 == 1)
                                                {?>


													<div class="form-group col-md-12">
														Lista
														<select  id="prestaciones" name="prestaciones1[]" class="form-control select2" multiple="multiple" style="width: 100%;" >

                                                            <?php
                                                            $usuario_id = $_SESSION['ID'].'pos';
                                                            $queryList=mysqli_query($conn3,"SELECT * FROM $usuario_id order by codigo");
                                                            $nrowl=mysqli_num_rows($queryList);
                                                            while($row_recordset32=mysqli_fetch_array($queryList))
                                                            {
                                                                $codigo      = $row_recordset32['codigo'];
                                                                $descripcion      = $row_recordset32['descripcion'];
                                                                $pactivo      = $row_recordset32['pactivo'];


                                                                echo "<option value='$codigo'>$codigo | $descripcion | $pactivo</option>";
                                                            }

                                                            ?>
														</select>


														<div align="center">
															Para configurar la lista CUPS  <a href="<?php echo $Base?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
															<font color="red">  Necesitas ayuda, Solicítalo por <a href="<?php echo $Base?>soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
														</div>
													</div>


                                                    <?php
                                                }
                                                else
                                                {
                                                    echo ' <div align="center"> Lista CUPS desactivada, para activar  <a href="'.$Base.'/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i>clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';

                                                }
                                                ?>

                                                <?php if ($pro2 == 1)
                                                {?>


												<div class="form-group col-md-12">
													Lista  2
													<select  id="prestaciones2" name="prestaciones2[]" class="form-control select2" multiple="multiple" style="width: 100%;" >

                                                        <?php
                                                        $usuario_id = $_SESSION['ID'].'cups';
                                                        $queryList2=mysqli_query($conn3,"SELECT * FROM $usuario_id order by codigo");
                                                        $nrowl=mysqli_num_rows($queryList2);
                                                        while($row_recordset322=mysqli_fetch_array($queryList2))
                                                        {
                                                            $codigo      = $row_recordset322['codigo'];
                                                            $descripcion      = $row_recordset322['descripcion'];

                                                            echo "<option value='$codigo'>$codigo | $descripcion</option>";
                                                        }

                                                        ?>

													</select>


													<div align="center">
														Para configurar la lista POS<a href="<?php echo $Base?>config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong>
														<font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6>
													</div>


                                                    <?php
                                                    }
                                                    else
                                                    {
                                                        echo ' <div align="center"> Lista POS desactivada, para activar  <a href="'.$Base.'/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><font color="red">  Necesitas ayuda, Solicítalo por <a href="'.$Base.'/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                                    }
                                                    ?>

													<div class="form-group col-md-12">
														<div align="left">Receta médica </div>
													</div>
													<div class="box-body pad">
														<textarea id="recipe" name="recipe" class="textarea" placeholder="Receta médica" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
													</div>
								<!--					<div class="form-group col-md-12">
														<div align="left">Como tomar</div>
													</div>

													<div class="box-body pad">
														<textarea id="comoTomarlo" name="comoTomarlo" class="textarea" placeholder="Como tomar" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>     -->
													<div class="form-group col-md-12">
														<div align="left">Incapacidades </div>
													</div>
													<div class="box-body pad">
														<textarea id="incapacidades" name="incapacidades" class="textarea" placeholder="Incapacidades" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>

													<div class="form-group col-md-12">
														<div align="left">Notas o comentarios (Campo no impreso solo para control interno)</div>
													</div>
													<div class="box-body pad">
														<textarea id="notas" name="notas" class="textarea" placeholder="Notas o Comentarios" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>
													<hr>

							<!--							<div align="center">
															<label> <strong>  Exámenes a realizar <strong>  </label>
														</div>
													</div>

													<div class="form-group col-md-12">
														<div align="left">Laboratorio </div>
													</div>
													<div class="box-body pad">
														<textarea id="laboratorio" name="laboratorio" class="textarea" placeholder="Laboratorio" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>

													<div class="form-group col-md-12">
														<div align="left">Imagenologia </div>
													</div>
													<div class="box-body pad">
														<textarea id="ecografia" name="ecografia" class="textarea" placeholder="Imagenologia" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>

													<div class="form-group col-md-12">
														<div align="left">Otros</div>
													</div>
													<div class="box-body pad">
														<textarea id="otros" name="otros" class="textarea" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>     -->
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


<script type="text/javascript">


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


</script>