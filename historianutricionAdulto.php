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
															<label><?php echo  calculaedad($fechaNacimiento);?></label>

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
										<form action="guardarnutricionAdulto.php" method="POST" name="formularioActualizarcliente"  enctype="multipart/form-data">
										<label><input type="checkbox" name="cb-terminaste" required> YA TERMINE</label><br


											<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
															Entrevista Inicial
														</a>
													</h4>
												</div>
												<div id="Entrevista" class="panel-collapse collapse">
													<div class="box-body">

														<div class="form-group col-md-12">
															<div align="left"><h4>Motivo consulta</h4>
															</div></div>
<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Quien remite</label>
                          <input type="text" name="remite" class="form-control">
                        </div>
                      </div>


                  
<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Objetivo de la consulta</label>

															<div align="right">
															<a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
															</div>


															<textarea  id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
														</div></div>

													
              <div class="form-group col-md-12">
                <div align="left"> Enfermedad actual</div>
            


                <div align="right">
                  <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="enfermedadActual" name="enfermedadActual"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

<!--iframe id="inlineFrameExample"
frameBorder="0"
width="100%"
height="300"
src="https://medicalsoftplus.com/co118/test3/speechRecognition.php">
</iframe-->
             <!--

                <textarea id="enfermedadActual" name="enfermedadActual"  class="textarea" placeholder="Enfermedad Actual" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

  <input type="text" name="enfermedadActual"  class="form-control input-lg" id="enfermedadActual"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> -->

              </div></div></div>
 												
<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
															Revisión por sistema 
														</a>
													</h4>
												</div>
												<div id="collapseTwo" class="panel-collapse collapse">
													<div class="box-body">

														<!--<div class="form-group col-md-3" align="right">
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
														</div>

														<div class="form-group col-md-12">
															<hr>
														</div>-->

 
<div class="form-group col-md-12">
                <div align="left">Examen Físico </div>


                <div align="right">
                  <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="notasadicionales" name="notasadicionales"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            
                <!--textarea id="notasadicionales" name="notasadicionales"  class="textarea" placeholder="Notas Adicionales " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea-->
             
              </div></div></div>
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
																<label>Alergias: <input type="checkbox" name="ant1" value="alergias" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Alertas de Riesgo: <input type="checkbox" name="ant2" value="Alertas de Riesgo" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Cáncer: <input type="checkbox" name="ant3" value="Cáncer" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Crecimiento y Desarrollo: <input type="checkbox" name="ant4" value="Crecimiento y Desarrollo" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Diabetes: <input type="checkbox" name="ant5" value="Diabetes" class="minimal"></label>
															</div>

														</div>

														<div class="row">
															<div class="form-group col-md-3">
																<label>Enfermedad Renal: <input type="checkbox" name="ant6" value="Enfermedad Renal" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Fármacos: <input type="checkbox" name="ant7" value="Fármacos" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Genéticos: <input type="checkbox" name="ant8" value="Genéticos" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Habitos Nocivos: <input type="checkbox" name="ant9" value="Habitos Nocivos" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>ITS: <input type="checkbox" name="ant10" value="ITS" class="minimal"></label>
															</div>
														</div>

														<div class="row">
															<div class="form-group col-md-3">
																<label>Habitos Saludables: <input type="checkbox" name="ant11" value="Habitos Saludables" class="minimal"></label>
															</div>

															<div class="form-group col-md-3">
																<label>Maltrato-Violencia: <input type="checkbox" name="ant12" value="Maltrato-Violencia" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Natales - Recien Nacido: <input type="checkbox" name="ant13" value="Natales - Recien Nacido" class="minimal"></label>
															</div>

															<div class="form-group col-md-3">
																<label>Organos y Sistemas: <input type="checkbox" name="ant14" value="Organos y Sistemas" class="minimal"></label>
															</div>
														</div>

														<div class="row">
															<div class="form-group col-md-2">
																<label>Postnatales: <input type="checkbox" name="ant15" value="Postnatales" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Prenatales: <input type="checkbox" name="ant16" value="Prenatales" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Salud Mental: <input type="checkbox" name="ant17" value="Salud Mental" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Trastornos Hipertensivos: <input type="checkbox" name="ant18" value="Trastornos Hipertensivos" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Trastornos Tiroideos: <input type="checkbox" name="ant19" value="Trastornos Tiroideos" class="minimal"></label>
															</div>
														</div>

														<div class="row">
															<div class="form-group col-md-3">
																<label>Tuberculosis: <input type="checkbox" name="ant20" value="Tuberculosis" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>VIH: <input type="checkbox" name="ant21" value="VIH" class="minimal"></label>
															</div>

															<div class="form-group col-md-2">
																<label>Otros: <input type="checkbox" name="ant22" value="Otros" class="minimal"></label>
															</div>
														</div>

														
														<div class="box-body pad">


														<div align="right">
														<a onclick="procesar4()" id="procesar4"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
														</div>
														<textarea id="antecedentesP" name="antecedentesP"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>


														<!--textarea id="antecedentesP" name="antecedentesP" class="textarea" placeholder="antecedentes" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea-->

														</div> 

														<h4 class="box-title">Antecedentes Familiares</h4>

														<div class="row">
															<div class="form-group col-md-2">
																<label>Cáncer: <input type="checkbox" name="antf1" value="Cáncer" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Cardiosvasculares: <input type="checkbox" name="antf2" value="Cardiosvasculares" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Diabetes: <input type="checkbox" name="antf3" value="Diabetes" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Habitos Nocivos: <input type="checkbox" name="antf4" value="Habitos Nocivos" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Judiciales: <input type="checkbox" name="antf5" value="Judiciales" class="minimal"></label>
															</div>

														</div>

														<div class="row">
															<div class="form-group col-md-2">
																<label>Madre Adolescente: <input type="checkbox" name="antf6" value="Madre Adolescente" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Nefropatías: <input type="checkbox" name="antf7" value="Nefropatías" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Obesidad: <input type="checkbox" name="antf8" value="Obesidad" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Salud Mental: <input type="checkbox" name="antf9" value="Salud Mental" class="minimal"></label>
															</div>
															<div class="form-group col-md-3">
																<label>Sindrome Del Cuidador: <input type="checkbox" name="antf10" value="Sindrome Del Cuidador" class="minimal"></label>
															</div>

														</div>

														<div class="row">
															<div class="form-group col-md-2">
																<label>Tuberculosis: <input type="checkbox" name="antf11" value="Tuberculosis" class="minimal"></label>
															</div>
															<div class="form-group col-md-4">
																<label>Violencia Intra Familiar: <input type="checkbox" name="antf12" value="Violencia Intra Familiar" class="minimal"></label>
															</div>
															<div class="form-group col-md-2">
																<label>Otros: <input type="checkbox" name="antf13" value="Otros" class="minimal"></label>
															</div>
														</div>











                     





														





														  <div align="right">
                  <a onclick="procesar5()" id="procesar5"><i title='Iniciar Grabación' style='font-size: 18px;    margin-top: 2%;
' class='fa fa-fw fa-microphone'></i></a>
              </div>
              <textarea id="antecedentesF" name="antecedentesF"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
													</div>

											


											<div class="row">
															   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><h4><b>Ginecológicos</h4> </b></label> </div>

                                                 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">FUM</label>
                          <input type="date" name="fechaM" class="form-control">
                        </div>
                      </div>
<div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">Embarazos</label>
                          <input type="text" name="embarazos" class="form-control">
                        </div>
                      </div>

                                                </div>
                                           
														



<div class="row">
															   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><h4><b>Patológicos</h4> </b></label> 
                                              
														  <div align="right">
                  <a onclick="procesar9()" id="procesar9"><i title='Iniciar Grabación' style='font-size: 18px;    margin-top: 2%;
' class='fa fa-fw fa-microphone'></i></a>
              </div>
                                                  <textarea class="form-control"  name="patologicos" rows="3" ></textarea>
                                                </div>
                                            </div>

	   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><h4><b>Quirurgícos</h4> </b></label> 
                                           										  <div align="right">
                  <a onclick="procesar10()" id="procesar10"><i title='Iniciar Grabación' style='font-size: 18px;    margin-top: 2%;
' class='fa fa-fw fa-microphone'></i></a>
              </div>
                        
                                                  <textarea class="form-control"  name="quirurgicos" rows="3" ></textarea>
                                                </div>
                                            </div>

	   <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><h4><b>Medicación </h4> </b></label> 
                                              										  <div align="right">
                  <a onclick="procesar11()" id="procesar11"><i title='Iniciar Grabación' style='font-size: 18px;    margin-top: 2%;
' class='fa fa-fw fa-microphone'></i></a>
              </div>
                     
                                                  <textarea class="form-control"  name="medicacion" rows="3" ></textarea>
                                                </div>
                                            </div>


 </div>

								<!--			<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
															Estatus Prematuro del Infante
														</a>
													</h4>
												</div>un 
												<div id="collapseThree" class="panel-collapse collapse">
													<div class="box-body">
														<div class="col-md-12">
															<label>Es el infante prematuro:</label>
															<input value="Si" type="radio" name="prematuro" class="flat-red"/> Si
															<input value="No" type="radio" name="prematuro" class="flat-red"/> No
														</div>
														
														<div class="form-group col-md-3">
															<div align="left">Edad Gestacional Completa</div>
															<input type="number" class="form-control" name="edadGestacionalCompleta" value="40" onchange="calcularprematuriedad()" onkeyup="calcularprematuriedad()" disabled>
														</div>

														<div class="form-group col-md-4">
															<div align="left">Edad Gestacional al Nacer (semanas completas)</div>
															<input type="number" class="form-control " name="edadGestacional" value="0" onchange="calcularprematuriedad()" onkeyup="calcularprematuriedad()">
														</div>

														<div class="form-group col-md-3">
															<div align="left">Total de Semanas de Prematuridad</div>
															<input type="number" class="form-control " name="SemanasPrematuriedad" value="0" readonly="readonly">
														</div>

														<div class="form-group col-md-3">
															<div align="left">Edad Cronológica</div>
															<input type="number" class="form-control" name="edadCronologica" value="0" onchange="calcularEdadCorregida()" onkeyup="calcularEdadCorregida()">
														</div>

														<div class="form-group col-md-4">
															<div align="left">Semanas de Prematuridad</div>
															<input type="number" class="form-control " name="semPrematuriedad" value="0" onchange="calcularEdadCorregida()" onkeyup="calcularEdadCorregida()">
														</div>

														<div class="form-group col-md-3">
															<div align="left">Edad Corregida Total</div>
															<input type="number" class="form-control " name="edadCorregida" value="0" readonly="readonly">
														</div>
													</div>
												</div>
											</div>    -->
</div>
											</div>  

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#parametros">
															Parametros Bioquímicos
														</a>
													</h4>
												</div>
												<div id="parametros" class="panel-collapse collapse">
													<div class="box-body">
<div class="row">

<div class="col-md-4">
														<div class="form-group" align="left">
                                  <label class="control-label" >¿Trae? &nbsp;  Si &nbsp; <input type="radio" value="SI" name="TRAE" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="TRAE" value="NO" class="flat-red"></label>
                                </div>


						</div>	



<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fecha</label>
                          <input type="date" name="fecha1" class="form-control">
                        </div>
                      </div>

                      

</div>


<div class="row">  
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hb</label>
                          <input type="text" name="hb" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Htcto</label>
                          <input type="text" name="Htcto" class="form-control">
                        </div>
                      </div><div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">G. blancos</label>
                          <input type="text" name="blancos" class="form-control">
                        </div>
                      </div>
</div>

<div class="col-md-12" align="center">
                                                  <label><h4><b>Otros Hemogramas</b></h4></b></label>
                                                </div>

<div class="col-md-12">

        <div class="form-group">
                          <label class="control-label">Perfil lipídico: 
</label>
                          
                        </div>

<div class="row">  

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Col total: </label>
                          <input type="text" name="Coltotal" class="form-control">
                        </div>
                      </div>


<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">TG: </label>
                          <input type="text" name="TG" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Col LDL</label>
                          <input type="text" name="ColLDL" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">COL HDL</label>
                          <input type="text" name="COLHDL" class="form-control">
                        </div>
                      </div>



</div>





        <div class="form-group">
                          <label class="control-label">Glucemia
</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Ayunas:  </label>
                          <input type="text" name="Ayunas" class="form-control">
                        </div>
                      </div>


<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Pre carga (cruva):  </label>
                          <input type="text" name="curva" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Post:</label>
                          <input type="text" name="Post" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">A1C:</label>
                          <input type="text" name="A1C" class="form-control">
                        </div>
                      </div>



</div>


        <div class="form-group">
                          <label class="control-label">Ácido Úrico

</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-12">
                        <div class="form-group">
                          
                          <input type="text" name="ACIDO" class="form-control">
                        </div>
                      </div>


</div>



        <div class="form-group">
                          <label class="control-label">Función tiroidea

</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">TSH</label>
                          <input type="text" name="TSH" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">T3  </label>
                          <input type="text" name="T3" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">T4</label>
                          <input type="text" name="T4" class="form-control">
                        </div>
                      </div>

</div>


        <div class="form-group">
                          <label class="control-label">Insulina 

</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ayunas</label>
                          <input type="text" name="Ayunasi" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pre </label>
                          <input type="text" name="pre" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Post</label>
                          <input type="text" name="post1" class="form-control">
                        </div>
                      </div>

</div>

<div class="form-group">
                          <label class="control-label">Perfil hepático


</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">AST</label>
                          <input type="text" name="AST" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALT </label>
                          <input type="text" name="ALT" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">TGO</label>
                          <input type="text" name="TGO" class="form-control">
                        </div>
                      </div>

</div>

<div class="form-group">
                          <label class="control-label">Perfil vitaminas
</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Calcio </label>
                          <input type="text" name="Calcio " class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Vit D </label>
                          <input type="text" name="VitD" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Vit B12</label>
                          <input type="text" name="VitB12" class="form-control">
                        </div>
                      </div>

</div>

<div class="form-group">
                          <label class="control-label">Perfil gestante 
</label>
                          
                        </div>  

<div class="row">  


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Toxop</label>
                          <input type="text" name="Toxop" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">IgG </label>
                          <input type="text" name="IgG" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">IgM</label>
                          <input type="text" name="IgM" class="form-control">
                        </div>
                      </div>

</div>



                    <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Otros </b></label>
                                                  <textarea class="form-control"  name="otros" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      
                    <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Observaciones </b></label>
                                                  <textarea class="form-control"  name="obser" rows="3" ></textarea>
                                                </div>
                                            </div>
                     <div class="col-md-12">                       
<label for="adjuntar archivo">Adjuntar archivo:</label>
                <input type='file' name='archivo1' id='archivo1' placeholder="carga tu boucher" > 
 

            </div>

              </div></div></div>
											
<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#vida">
															Estilo de vida
														</a>
													</h4>
												</div>
												<div id="vida" class="panel-collapse collapse">
													<div class="box-body">


<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Horas de Sueño/Día (horas)</label>
                          <input type="text" name="hrasS" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Calidad del sueño</label>
                          <input type="text" name="SUEÑO" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Actividad Física Hr / Semana (horas)</label>
                          <input type="text" name="actividadF" class="form-control">
                        </div>
                      </div></div>
<div class="row">
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Tipo de Actividad/Ejercicio</label>
                          <input type="text" name="tipoA" class="form-control">
                        </div>
                      </div>


	<div class="col-md-6">

<div class="form-group">
                         <label class="control-label">Estrés </label>
                           <select  id="alto" name="alto" class="form-control input-lg select" style="width: 100%;">
                  <option>Alto </option>
                  <option>Moderado </option>
                  <option>Bajo </option>
                 
                </select>
                          
                        </div></div></div>



<!--<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Alto</label>
                          <input type="text" name="alto" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Moderado</label>
                          <input type="text" name="moderado" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Bajo</label>
                          <input type="text" name="bajo" class="form-control">
                        </div>
                      </div>-->


<div class="form-group">
                          <label class="control-label">Vicios

</label>
                          
                        </div>  
<div class="row">
<div class="form-group col-md-4" align="left">
¿Consume de Alcohol?
<input value="1" type="radio" name="alcohol" id="lt" class="flat-red"/> SI
<input value="2" type="radio" name="alcohol" id="lt" class="flat-red"/> NO
									</div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>
                          <input type="text" name="cantidadalcohol" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Frecuencia</label>
                          <select class="form-control" name="frecuencia">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal ">Semanal</option>
                            <option value="Mensual">Mensual</option>
                          </select>
                        </div>
                      </div></div>

<div class="row">
<div class="form-group col-md-4" align="left">
Cigarrillo
<input value="1" type="radio" name="cigarrillo" id="lt" class="flat-red"/> SI
<input value="2" type="radio" name="cigarrillo" id="lt" class="flat-red"/> NO
</div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>
                          <input type="text" name="cantidad1" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Frecuencia</label>
                          <select class="form-control" name="frecuencia1">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal ">Semanal</option>
                            <option value="Mensual">Mensual</option>
                          </select>
                        </div>
                      </div></div>

</div></div></div>
											
<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#funcionalidad">
															Funcionalidad Muscular
														</a>
													</h4>
												</div>
												<div id="funcionalidad" class="panel-collapse collapse">
													<div class="box-body">






<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fuerza </label>
                          <input type="text" name="Fuerza" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Dinamometro</label>
                          <input type="text" name="Dinamometro" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Muscular</label>
                          <input type="text" name="masa" class="form-control">
                        </div>
                      </div>

</div>

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Composición Corporal </label>
                          <input type="text" name="compocorporal" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Rendimiento muscular </label>
                          <input type="text" name="Rendimientomuscular " class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Velocidad</label>
                          <input type="text" name="velocidad" class="form-control">
                        </div>
                      </div>

</div>
<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Marcha </label>
                          <input type="text" name="marcha" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Equiibrio </label>
                          <input type="text" name="equilibrio " class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Silla</label>
                          <input type="text" name="silla" class="form-control">
                        </div>
                      </div>

</div>

													</div></div>
												</div>



<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#muscular">
															Anamnesis Gastrointestinal Y Alimentaria
														</a>
													</h4>
												</div>
												<div id="muscular" class="panel-collapse collapse">
											<div class="box-body">

       <div class="row">
                              <div class="col-md-4">
                                <div class="form-group" align="left">
                                  <label class="control-label" >Alergias Alimentarias &nbsp;  Si &nbsp; <input type="radio" value="SI" name="alergiasA" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="alergiasA" value="NO" class="flat-red"></label>
                                </div>
                              </div>
<div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">¿Cuales?</label>
                          <input type="text" name="cuales1" class="form-control">
                        </div>
                      </div>

</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
                          <label class="control-label">Síntomas Gastrointestinal</label>
                           <select  id="gastritis" name="gastritis" class="form-control input-lg select" style="width: 100%;">
                  <option>Gastritís </option>
                  <option>Reflujo </option>
                  <option>Cólon Irritable </option>
                 
                </select>
                          
                        </div> </div> 


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Varios ¿Cuales?</label>
                          <input type="text" name="varios" class="form-control">
                        </div>
                      </div>



 <div class="col-md-4">
<div class="form-group">
                          <label class="control-label">Hábito Intestinal</label>
                          <select  id="adecuado" name="adecuado" class="form-control input-lg select" style="width: 100%;">
                  <option value=" Adecuado">Adecuado </option>
                  <option value=" Estreñemiento">Estreñimiento </option>
                  <option value=" Diarrea">Diarrea </option>
                  <option value=" Gastritís"> Gastritís </option>
                  <option value= "Reflujo">Reflujo </option>
                  <option value=" Cólon Irritable">Cólon Irritable </option>
                 
                </select>
                          
                        </div></div></div>


<div class="row">



<div class="col-md-12" align="center">

<img src="https://medicalsoftplus.com/co134//logos/bristol.png"style="max-width:50%;width:auto;height:auto;">


                    </div>
                    <div class="col-md-12" align="left">
                        <div class="form-group">
                          <label class="control-label">Bristol</label>
                          <select class="form-control" name="bristol" >
                  <option value="  ">Seleccione </option>

                             <option value=" Tipo 1:Trozos duros separados, como nueces o excrementos de oveja, que pasan con dificultad."> Tipo 1: Trozos duros separados, como nueces o excrementos de oveja, que pasan con dificultad.</option>
                            <option value=" Tipo 2:Como una salchicha compuesta de fragmentos."> Tipo 2:Como una salchicha compuesta de fragmentos.</option>
                            <option value=" Tipo 3:Con forma de morcilla con grietas en la superficie."> Tipo 3:Con forma de morcilla con grietas en la superficie.</option>
                            <option value=" Tipo 4:Como una salchicha; o serpiente, lisa y blanda."> Tipo 4:Como una salchicha; o serpiente, lisa y blanda.</option>
                            <option value=" Tipo 5:Trozos de masa pastosa con bordes definidos, que son defecados fácilmente."> Tipo 5:Trozos de masa pastosa con bordes definidos, que son defecados fácilmente.</option>
                            <option value=" Tipo 6:Fragmentos blandos y esponjosos con bordes irregulares y consistencia pastosa."> Tipo 6:Fragmentos blandos y esponjosos con bordes irregulares y consistencia pastosa.	</option>
                            <option value=" Tipo 7:Acuosa, sin pedazos sólidos, totalmente líquida.	"> Tipo 7:Acuosa, sin pedazos sólidos, totalmente líquida.	</option>


                         </select>
                        </div>
                      </div>
                </div> <br><br>
<!--<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group">
                          <textarea name="estreñ" class="form-control"></textarea> 
                        </div>
                      </div></div> -->
                              
<!--
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Bristol</label>
                          <input type="text" name="bristol" class="form-control">
                        </div>
                      </div>
</div>-->

<div class="row" align="center">
                                            
                                                  <label><b> Conducta alimentaria </b></label>
                                              
                                        </div> <br>
          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" align="left">
                                  <label class="control-label" >presenta atracones o sobreingestas?		&nbsp;  Si &nbsp; <input type="radio" value=" SI" name="sobreI" class="flat-red"> &nbsp; No &nbsp;<input type="radio" name="medicamento1" value="NO" class="flat-red"></label>
                                </div>
                              </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Restricciones alimentarias: </b></label>
                                                  <textarea class="form-control"  name="RESTRICCIONE" rows="2" ></textarea>
                                                </div>
                                            </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Alimentos que producen temor </b></label>
                                                  <textarea class="form-control"  name="alimentos" rows="2" ></textarea>
                                                </div>
                                            </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Intolerancias</b></label>
                                                  <textarea class="form-control"  name="intorelancias" rows="2" ></textarea>
                                                </div>
                                            </div> <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Rechazos </b></label>
                                                  <textarea class="form-control"  name="Rechazos" rows="2" ></textarea>
                                                </div>
                                            </div> <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Preferencias </b></label>
                                                  <textarea class="form-control"  name="Preferencias" rows="2" ></textarea>
                                                </div>
                                            </div> <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Consumo de Suplementos</b></label>
                                                  <textarea class="form-control"  name="Suplementos" rows="2" ></textarea>
                                                </div>
                                            </div>


                          </div>

<div class="row" align="center">
                                            
                                                  <label><b> Frecuencia de Consumo </b></label>
                                              
                                        </div> <br>


 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Bebidas Azucaradas</label>
                          <select class="form-control" name="bebidas">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Productos de panaderia</label>
                          <select class="form-control" name="panaderia">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Dulces y Postres</label>
                          <select class="form-control" name="dulces">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>

</div>



 <div class="row">
                     

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Comidas Rápidas </label>
                          <select class="form-control" name="comidasR">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fritos </label>
                          <select class="form-control" name="fritos">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ensaladas</label>
                          <select class="form-control" name="Ensaladas">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
</div>

 <div class="row">
                     

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Frutas </label>
                          <select class="form-control" name="Frutas">
                            <option value="  ">Seleccione..</option>
                            
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Granos </label>
                          <select class="form-control" name="Granos">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Embutidos( jamón, slachicha)</label>
                          <select class="form-control" name="embutidos">
                            <option value="  ">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
</div>

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Sal de mesa</label>
                          <select class="form-control" name="sal">
                            <option value="  ">Seleccione..</option>
                            <option value="Algunas comidas">Algunas comidas</option>
                            <option value="Todas las comidas ">Todas las comidas</option>
                            <option value="Ocasional ">Ocasional </option>
                            <option value="NUNCA  ">NUNCA  </option>
                          </select>
                        </div>
                      </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Cantidad de Agua en el día</label>
                          <input type="text" name="agua" class="form-control">
                        </div>
                      </div>
</div>
</div></div>
												</div>

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#consumoH">
															Consumo Habitual
														</a>
													</h4>
												</div>
												<div id="consumoH" class="panel-collapse collapse">
													<div class="box-body">

     <!--  <div class="row">
                              
<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">TIEMPO DE COMIDA</label>
                          
                        </div>
                      </div>
                              
<div class="col-md-2"aling="center">
                        <div class="form-group">
                          <label class="control-label">HORA</label>
                          
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>
                        
                        </div>
                      </div>
<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO/PREPARACIÓN</label>
                        
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD(med casera)</label>
                          
                        </div>
                      </div>
                              
<div class="col-md-1">
                        <div class="form-group">
                          <label class="control-label"># IC </label>
                          
                        </div>
                      </div>

</div>  -->

       <div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h3>DESAYUNO</h3></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">HORA</label>

                          <input type="time" name="hora1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>

                          <input type="text" name="lugar1" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO /PREPARACIÓN</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># IC</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion1" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad1" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic1" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion11" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad11" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic11" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion12" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad12" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic12" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion13" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad13" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic13" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion14" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad14" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic14" class="form-control">
                        </div>
                      </div>
</div>


     <div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h3>MEDIA MAÑANA</h3></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">HORA</label>

                          <input type="time" name="hora2" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>

                          <input type="text" name="lugar2" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO /PREPARACIÓN</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># IC</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion2" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad2" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic2" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion21" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad21" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic21" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion22" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad22" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic22" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion23" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad23" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic23" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion24" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad24" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic24" class="form-control">
                        </div>
                      </div>
</div>

<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h3>ALMUERZO</h3></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">HORA</label>

                          <input type="time" name="hora3" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>

                          <input type="text" name="lugar3" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO /PREPARACIÓN</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># IC</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion3" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad3" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic3" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion31" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad31" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic31" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion32" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad32" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic32" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion33" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad33" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic33" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion34" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad34" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic34" class="form-control">
                        </div>
                      </div>
</div>
<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h4>MEDIA TARDE</h4></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">HORA</label>

                          <input type="time" name="hora4" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>

                          <input type="text" name="lugar4" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO /PREPARACIÓN</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># IC</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion4" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad4" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic4" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion41" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad41" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic41" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion42" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad42" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic42" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion43" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad43" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic43" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion44" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad44" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic44" class="form-control">
                        </div>
                      </div>
</div>
<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h4>CENA</h4></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">HORA</label>

                          <input type="time" name="hora5" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>

                          <input type="text" name="lugar5" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO /PREPARACIÓN</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># IC</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion5" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad5" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic5" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion51" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad51" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic51" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion52" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad52" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic52" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion53" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad53" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic53" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion54" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad54" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic54" class="form-control">
                        </div>
                      </div>
</div>




 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Consumo del fin de semana</label>
                          <select class="form-control" name="consumofin">
                            <option value="  ">Seleccione..</option>
                            <option value="Aumenta">Aumenta</option>
                            <option value="Disminuye">Disminuye</option>
                            <option value="Igual ">Come igual</option>
                          </select>
                        </div>
                      </div>

<!--<div class="col-md-6">
                        <div class="form-group">
                        	<label class="control-label">Que esta dispuesto a cambiar?</label>
                          <input type="text" name="cambiar" class="form-control">
                        </div>
                      </div>-->


</div></div></div></div>

<!--<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#conceptoplan">
															Concepto y Plan
														</a>
													</h4>
												</div>
												<div id="conceptoplan" class="panel-collapse collapse">
													<div class="box-body">


       
<div class="row">
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>DIANÓSTICO NUTRICIONAL</b></label>
                                                  <textarea class="form-control"  name="diaganosticoN" rows="2" ></textarea>
                                                </div>
                                            </div>

 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>OBJETIVO (Paciente + ND)</b></label>
                                                  <textarea class="form-control"  name="objetivoP" rows="2" ></textarea>
                                                </div>
                                            </div>
  <div class="col-md-12">
                        <div class="form-group">
                        	<label><b>QUÉ ESTÁ DISPUESTA A CAMBIAR</b></label>
                                                  <textarea class="form-control"  name="objetivoP" rows="2" ></textarea>
                        </div>
                      </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>CONCEPTO Y PLAN </b></label>
                                                  <textarea class="form-control"  name="PLAN" rows="2" ></textarea>
                                                </div>
                                            </div>
</div></div></div></div>-->

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#antropometria">
															Antropometría Completa
														</a>
													</h4>
												</div>
												<div id="antropometria" class="panel-collapse collapse">
													<div class="box-body">
<div class="row">
 <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tipo de Seguimiento</label>
                          <select class="form-control" name="TipoA">
                            <option value="  ">Seleccione..</option>
                            <option value="Primera vez">Primera vez </option>
                            <option value="Control Uno">Control  1</option>
                            <option value="Control Dos">Control  2</option>
                            <option value="Control Tres">Control  3</option>
                            <option value="Control Cuatro">Control  4</option>
                            <option value="Control Cinco">Control  5</option>
                          </select>
                        </div>
                      </div></div>  

                      <div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Peso, Historia del Peso y Talla</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 
                <input type="hidden" class="form-control input-lg" name="edadMeses" value="<?php echo calculaedadMeses($fechanacimiento)?>"   step="any">
													<input type="hidden" class="form-control input-lg" name="edadanos" value="<?php echo calculaedadAnos($fechanacimiento)?>"   step="any">    
                              

 <div class="row">

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Actual(kg):</label>
                          <input type="text" name="PesoActual" id="PesoActual" class="form-control input-lg" onChange="calcularimc();"    onChange="calcularpesograso();" onChange="calcularpesomagro();" onChange="calcularIAKS();" onChange="calcularmasapiel();" step="any"> 
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Usual (kg):</label>
                          <input type="text" name="PesoUsual"  id="PesoUsual"  class="form-control">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Minimo:</label>
                          <input type="text" name="PesoMinimo" id="PesoMinimo" class="form-control">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Maximo:</label>
                          <input type="text" name="PesoMaximo"id="PesoMaximo" class="form-control">
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Talla(cm):</label>
                          <input type="text" name="Talla"   id="Talla"  class="form-control input-lg" onChange="calcularimc();" onChange="calcularestructura();" onChange="calcularIAKS();" onChange="calcularmasapiel();" onChange="calcularadiposa();"  onChange="calcularmuscular();" step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-2">
															<div align="left">perímetro cefalico</div>
															<input type="text" class="form-control input-lg" id="sat" name="perimetrocefalico"  value="0" maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
														</div>
 

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Observaciones:</label>
                          <input type="text" name="Observaciones" class="form-control">
                        </div>
                      </div>



              
                                        </div>




<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Perímetros (Cm)</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cuello:</label>
                          <input type="text" name="Cuello" id="Cuello" class="form-control">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Pecho/Tórax:</label>
                          <input type="text"  class="form-control input-lg"name="Pecho"  name="pecho" onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Brazo Relajado:</label>
                          <input type="text"   class="form-control input-lg"name="brazoR" id="brazoR"  onChange="calcularmuscular();"step="any"> 
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Brazo Contraído:</label>
                          <input type="text" name="BrazoC" id="BrazoC"   onChange="calcularmuscular();" class="form-control">
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Antebrazo:</label>
                          <input type="text"  class="form-control input-lg"name="Antebrazo" id="Antebrazo"   onChange="calcularmuscular();" step="any"> 
                        </div>
                      </div>



<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Muñeca:</label>
                          <input type="text" name="Muneca" id="Muneca" class="form-control input-lg" onChange="calcularestructura();" step="any">
                        </div>
                      </div>



              
                                        </div>



<div class="row">

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cintura:</label>
                          <input type="text" name="Cintura" id="Cintura"class="form-control input-lg" onChange="calcularRelacion();" step="any">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Abdómen:</label>
                          <input type="text" name="Abdomen"  id="Abdomen" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cadera</label>
                          <input type="text" name="Cadera" id="Cadera" class="form-control input-lg" onChange="calcularRelacion();" step="any">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Muslo:</label>
                          <input type="text" name="Muslo" id="Muslo"  class="form-control input-lg"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Pantorrilla:</label>
                          <input type="text" name="Pantorrilla" id="Pantorrilla"  onChange="calcularmuscular();" class="form-control input-lg"  step="any"> 
                        </div>
                      </div>



<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Observaciones:</label>
                          <input type="text" name="Observaciones1" class="form-control">
                        </div>
                      </div>



              
                                        </div>





<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Pliegues Cútaneos (mm)</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div>

 <div class="row">

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Biceps:</label>
                          <input type="text" name="Biceps"  id="Biceps"class="form-control input-lg"  onChange="calcularpliegues();" step="any"> 
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Triceps:</label>
                          <input type="text" name="riceps" id="riceps" class="form-control input-lg"  onChange="calcularpliegues();"   onChange="calculargrasa();" onChange="calcularadiposa();"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>


 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Subescapular</label>
                          <input type="text" name="Subescapular" id="Subescapular"class="form-control input-lg"  onChange="calcularpliegues();"   onChange="calculargrasa();" onChange="calcularadiposa();"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>

              <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cresta Iliaca:</label>
                          <input type="text" name="Cresta" id="Cresta" class="form-control input-lg"  onChange="calcularpliegues();" step="any">
                        </div>
                      </div>
                                        </div>


<div class="row">

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Supraespinal:</label>
                          <input type="text" name="Supraespinal" id="Supraespinal" class="form-control input-lg"  onChange="calcularpliegues();"  onChange="calculargrasa();" onChange="calcularadiposa();"  onChange="calcularmuscular();" step="any">  
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Abdominal:</label>
                          <input type="text" name="Abdominal"  id="Abdominal" class="form-control input-lg"  onChange="calcularpliegues();"   onChange="calculargrasa();" onChange="calcularadiposa();"  step="any"> 
                          

                          <input type="hidden" name="genero"  id="genero" value="<?php echo $genero?>" class="form-control input-lg"   onChange="calculargrasa();" onChange="calcularmasapiel();"  step="any"> 
                        </div>
                      </div>


 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Muslo:</label>
                          <input type="text" name="Muslo1" id="Muslo1" class="form-control input-lg"  onChange="calcularpliegues();"  onChange="calculargrasa();"  onChange="calcularadiposa();"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>
<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Pierna Media:</label>
                          <input type="text" name="Pierna"id="Pierna" class="form-control input-lg"  onChange="calcularpliegues();"  onChange="calculargrasa();" onChange="calcularadiposa();"   onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>
              
                                        </div>



 <div class="row"><div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Observaciones:</label>
                          <input type="text" name="Observaciones2" class="form-control">
                        </div>
                      </div>
                                        </div>



<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Fuerza Muscular</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">

  <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Dinanómetro:</label>
                          <input type="text" name="Dinanometro"  id="Dinanometro" class="form-control">
                        </div>
                      </div>


</div>


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Resultados</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">IMC: **</label>
                          <input type="text" name="IMC" id="IMC" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Estructura:**</label>
                          <input type="text" name="Estructura" id="Estructura" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Saludable:**</label>
                          <input type="text" name="Peso" id="Peso" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Relación Cintura/Cadera:**</label>
                          <input type="text" name="Relacion" id="Relacion" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-6">
															<div align="left">Composición corporal</div>
															<input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
														</div>

</div>


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b> % Grasas(YUHASZ)</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">
 	<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Grasa:**</label>
                          <input type="text" name="grasapor" id="grasapor"  class="form-control input-lg"  onChange="calcularpesograso();"   onChange="calcularpesomagro();" onChange="calcularIAKS();"  step="any">
                        </div>
                      </div>

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Suma Pliegues**:</label>
                          <input type="text" name="Pliegues" id="Pliegues"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Graso:**</label>
                          <input type="text" name="Graso"  id="Graso" class="form-control input-lg"   step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Magro**:</label>
                          <input type="text" name="Magro" id="Magro" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">IAKS**:</label>
                          <input type="text" name="IAKS" id="IAKS" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-6">
															<div align="left">Interpretación de Grasa </div>
															<input type="text" class="form-control input-lg" id="interpretacion" name="interpretacion">
														</div>
</div>


														


<div class="row">
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b> Analis de Composición Corporal</b></h4></b></label>
                                                </div>
                                            </div>
                                        </div> 

 <div class="row">
 	<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Piel**:</label>
                          <input type="text" name="masap" id="masap"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>

  <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Adiposa**:</label>
                          <input type="text" name="masaA" id="masaA"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Peso Muscular**:</label>
                          <input type="text" name="pesom"  id="pesom" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 
</div>


														</div></div>

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#conceptoplan">
															Concepto y Plan
														</a>
													</h4>
												</div>
												<div id="conceptoplan" class="panel-collapse collapse">
													<div class="box-body">


       
<div class="row">
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>DIANÓSTICO NUTRICIONAL</b></label>
                                                  <textarea class="form-control"  name="diaganosticoN" rows="2" ></textarea>
                                                </div>
                                            </div>

 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>OBJETIVO (Paciente + ND)</b></label>
                                                  <textarea class="form-control"  name="objetivoP" rows="2" ></textarea>
                                                </div>
                                            </div>
  <div class="col-md-12">
                        <div class="form-group">
                        	<label><b>QUÉ ESTÁ DISPUESTA A CAMBIAR</b></label>
                                                  <textarea class="form-control"  name="objetivoP" rows="2" ></textarea>
                        </div>
                      </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>CONCEPTO Y PLAN </b></label>
                                                  <textarea class="form-control"  name="PLAN" rows="2" ></textarea>
                                                </div>
                                            </div>
</div></div></div></div>


<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#notasformu">
															Notas y Formulaciones
														</a>
													</h4>
												</div>
												<div id="notasformu" class="panel-collapse collapse">
													<div class="box-body">


       
<div class="row">

<div class="form-group col-md-12">
													<div align="left">1. Incapacidades </div>
													</div>
													<div class="box-body pad">
														<textarea id="incapacidades" name="incapacidades" class="textarea" placeholder="Incapacidades" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>

													<div class="form-group col-md-12">
														<div align="left">2. Receta médica </div>
													</div>
													<div class="box-body pad">
														<textarea id="recipe" name="recipe" class="textarea" placeholder="Receta médica" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
													</div>
														<div class="form-group col-md-12">
														<div align="left">3. Notas </div>
													</div>
													<div class="box-body pad">
														
               <div align="right">
                  <a onclick="procesar8()" id="procesar8"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
              </div>

              <textarea id="notas" name="notas"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
													</div>
					</div></div></div></div>
											


											
																
											<br>

											<div class="form-group col-md-12">

												<label> Exámenes de las partes del cuerpo </label>
												<textarea id="examenPartesdCuerpo" name="examenPartesdCuerpo" class="textarea" placeholder="Exámenes de las partes del cuerpo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

											</div>

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



												<div class="form-group col-md-4">
													<div align="left">Representante </div>
													<input type="text" class="form-control input-lg" id="Representante" name="Representante" placeholder="Representante"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
												</div>
												<div class="form-group col-md-4">
													<div align="left">Teléfono Representante</div>
													<input type="text" class="form-control input-lg" id="telefono_Representante" name="telefono_Representante" placeholder="Telefono Representante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
												</div>

												<div class="form-group col-md-4">
													<div align="left">Parentesco Representante</div>
													<input type="text" class="form-control input-lg" id="parentescoRepresentante" name="parentescoRepresentante" placeholder="Parentesco Representante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
												</div>





												<div class="form-group col-md-12">
													<div align="left">Impresiones diagnosticas (Diagnostico general) </div>
												</div>

												<div class="box-body pad">
													         <div class="box-body pad">

                 <div align="right">
                  <a onclick="procesar7()" id="procesar7"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
              </div>
              <textarea id="diagnostico" name="diagnostico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
												</div>

												<div class="form-group col-md-12">
													<div align="left">Tratamiento (Plan de atención) </div>
												</div>
												<div class="box-body pad">
													<textarea id="tratamiento" name="tratamiento" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
												</div>

												<div class="form-group col-md-3" align="right">
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
												</div>

												<div class="form-group col-md-12">
													<div align="left">Diagnostico ministerio de Salud </div>
												</div>
												<div class="box-body pad">
													<textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="Diagnostico ministerio de Salud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
												</div>

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
													Lista  POS
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

													
													<!--<div class="form-group col-md-12">
														<!--<div align="left">Como tomar</div>
													</div>

													<div class="box-body pad">
														<textarea id="comoTomarlo" name="comoTomarlo" class="textarea" placeholder="Como tomar" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>-->
													

												
													<hr>

													<div class="col-sm-12">
														<div align="center">
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
<script src="apiVoz.js"></script>

<script type="text/javascript">

   
 
     function calcularRelacion()

    {

        m1 = document.getElementById("Cintura").value;
        m2 = document.getElementById("Cadera").value;

        cc = m1/m2;

        document.getElementById("Relacion").value = cc.toFixed(3);

    }


 

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

 <script src="apiVoz.js"></script>

<script type="text/javascript"> 


/*
 * Simple program to demo speech recognition
 *
 * Based on https://www.google.com/intl/en/chrome/demos/speech.html
 *
 * Must run on a remote server, and access via https not http.
 * Works on only Chrome
 */

/*
 * Choose your language


 */
var langs =
[['English',         ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Filipino',        ['fil-PH']],
 ['Français',        ['fr-FR']],
 ['Basa Jawa',       ['jv-ID']],
 ['Galego',          ['gl-ES']],
 ['ગુજરાતી',           ['gu-IN']],
 ['Hrvatski',        ['hr-HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['ಕನ್ನಡ',             ['kn-IN']],
 ['ភាសាខ្មែរ',          ['km-KH']],
 ['Latviešu',        ['lv-LV']],
 ['Lietuvių',        ['lt-LT']],
 ['മലയാളം',          ['ml-IN']],
 ['मराठी',             ['mr-IN']],
 ['Magyar',          ['hu-HU']],
 ['ລາວ',              ['lo-LA']],
 ['Nederlands',      ['nl-NL']],
 ['नेपाली भाषा',        ['ne-NP']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['සිංහල',          ['si-LK']],
 ['Slovenščina',     ['sl-SI']],
 ['Basa Sunda',      ['su-ID']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Kiswahili',       ['sw-TZ', 'Tanzania'],
                     ['sw-KE', 'Kenya']],
 ['ქართული',       ['ka-GE']],
 ['Հայերեն',          ['hy-AM']],
 ['தமிழ்',            ['ta-IN', 'இந்தியா'],
                     ['ta-SG', 'சிங்கப்பூர்'],
                     ['ta-LK', 'இலங்கை'],
                     ['ta-MY', 'மலேசியா']],
 ['తెలుగు',           ['te-IN']],
 ['Tiếng Việt',      ['vi-VN']],
 ['Türkçe',          ['tr-TR']],
 ['اُردُو',            ['ur-PK', 'پاکستان'],
                     ['ur-IN', 'بھارت']],
 ['Ελληνικά',         ['el-GR']],
 ['български',         ['bg-BG']],
 ['Pусский',          ['ru-RU']],
 ['Српски',           ['sr-RS']],
 ['Українська',        ['uk-UA']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['हिन्दी',             ['hi-IN']],
 ['ภาษาไทย',         ['th-TH']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 1;
updateCountry();
select_dialect.selectedIndex = 3;
showInfo('info_start');

function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

/*
 * Set up recognizer
 */
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) { 
  upgrade(); 
} else {
  start_button.style.display = 'inline-block';
  var recognition = new webkitSpeechRecognition(); 
  recognition.continuous = true; 
  recognition.interimResults = true; 

  recognition.onstart = function() { 
    recognizing = true; 
    showInfo('info_speak_now'); 
  };

  // Things that can go wrong
  recognition.onerror = function(event) { 
    if (event.error == 'no-speech') { 
      showInfo('info_no_speech'); 
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      showInfo('info_no_microphone');
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
        showInfo('info_blocked');
      } else {
        showInfo('info_denied');
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() { 
    recognizing = false;
    if (ignore_onend) {
      return;
    }
    if (!final_transcript) {
      showInfo('info_start');
      return;
    }
    showInfo('');
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }

    // Display or otherwise utilize result
    doit (final_transcript); 
  };

  recognition.onresult = function(event) { 
    var interim_transcript = '';
    if (typeof(event.results) == 'undefined') {
      recognition.onend = null;
      recognition.stop();
      upgrade();
      return;
    }

    // event.results is an array of the recognized strings
    for (var i = event.resultIndex; i < event.results.length; ++i) { 
      if (event.results[i].isFinal) { 
        final_transcript += event.results[i][0].transcript; 
      } else { 
        interim_transcript += event.results[i][0].transcript; 
      }
    }

    final_span.innerHTML = linebreak(final_transcript); 
    interim_span.innerHTML = linebreak(interim_transcript);
  };
}

// User message about browser
function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}

// Convert line breaks to HTML
var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

function startButton(event) {
  // Stop
  if (recognizing) {
    recognition.stop();
  }

  // Start
  else {
    final_transcript = '';
    recognition.lang = select_dialect.value;
    recognition.start();
    ignore_onend = false;
    final_span.innerHTML = '';
    interim_span.innerHTML = '';
    showInfo('info_allow');
    start_timestamp = event.timeStamp;
  }
}

// Display selected message, hide others
function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}

/*
 ***************************************************************************
 * Voice drawing program, just an example of usage of above code
 ***************************************************************************
 */

// "Roy G Biv" colors only
var colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"] 

// Limited set of shapes
var shapes = ["square", "rectangle", "circle", "ellipse"]

function doit (string) { 
  /*
   * Example of something you could do with the recognized text
   */

  string = string.toLowerCase()

  // Search for a color, else we choose black
  var color = colors.filter ( 
    function (c) { 
      return string.match (new RegExp ("\\b" + c + "\\b")) 
    }) [0] 

  // Search for a shape, else we don't draw
  var shape = shapes.filter ( 
    function (s) { 
      return string.match (new RegExp ("\\b" + s + "\\b")) 
    }) [0] 

  // If found a shape, draw it
  if (shape) { 
    var canvas = document.getElementById ("MyCanvas");
    var gc = canvas.getContext ("2d")
    gc.fillStyle = color? color: "black" 
    
    // Generate some random coordinates
    var x = 50 + Math.floor (400 * Math.random ())
    var y = 50 + Math.floor (400 * Math.random ())
    var w = 20 + Math.floor (100 * Math.random ())
    var h = 20 + Math.floor (100 * Math.random ())

    if (shape=="square") { 
      gc.fillRect (x, y, w, w) 
    }
    else if (shape=="rectangle") { 
      gc.fillRect (x, y, w, h) 
    }
    else if (shape=="circle") { 
      gc.beginPath(); 
      gc.arc (x, y, w/2, 0, Math.PI * 2); 
      gc.fill(); 
    }
    else if (shape=="ellipse") { 
      gc.beginPath(); 
      gc.ellipse (x, y, w/2, h/2, 0, 0, Math.PI * 2); 
      gc.fill(); 
    }
  }

  // For testing, display the understood message (2 words)
  console.log ("Color = " + color + ", Shape = " + shape)
}

   
 function calcularimc()
    {



        m1 = document.getElementById("PesoActual").value;
        m2 = document.getElementById("Talla").value;

        r = m1/((m2/100)*(m2/100));


        document.getElementById("IMC").value = r.toFixed(2);


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

    
 function calcularestructura()
    {


        m1 = document.getElementById("Talla").value;
        m2 = document.getElementById("Muneca").value;

        cc = m1/m2;

        document.getElementById("Estructura").value = cc.toFixed(2);


    }


     function calcularRelacion()
    {


        m1 = document.getElementById("Cintura").value;
        m2 = document.getElementById("Cadera").value;

        cc = m1/m2;

        document.getElementById("Relacion").value = cc.toFixed(2);


    }
/*
function calculargrasa()
    {

        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        genero = document.getElementById("genero").value;

if (genero==M)

             ge= ((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))* 0,1051)+2,58;

        document.getElementById("grasapor").value = ge.toFixed(2);


  if (ge.toFixed(2) <= 10)

            interpretacion = 'Muy bueno';
        else if
        (ge.toFixed(2) >= 11 &  ge.toFixed(2) <= 14)

            interpretacion = 'Bueno';
        else if
        (ge.toFixed(2) >= 15 & ge.toFixed(2) <=20)

            interpretacion = 'Aceptable';
        else if
        (ge.toFixed(2) >= 21 & ge.toFixed(2) <= 27)

            interpretacion = 'Sobrepeso';

        else if
        (ge.toFixed(2) > 27)

            interpretacion = 'Obesidad';

        document.getElementById("interpretacion").value = interpretacion;



 else if

          ge= ((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))*0,1548)+3,58;
	   
         document.getElementById("grasapor").value = ge.toFixed(2);


 if (ge.toFixed(2) <= 15)

            interpretacion1 = 'Muy bueno';
        else if
        (ge.toFixed(2) >= 16 &  ge.toFixed(2) <= 20)

            interpretacion1 = 'Bueno';
        else if
        (ge.toFixed(2) >= 21 & ge.toFixed(2) <=26)

            interpretacion1 = 'Aceptable';
        else if
        (ge.toFixed(2) >= 27 & ge.toFixed(2) <= 33)

            interpretacion1 = 'Sobrepeso';

        else if
        (ge.toFixed(2) > 34)

            interpretacion1 = 'Obesidad';

        document.getElementById("interpretacion").value = interpretacion1;


    }
*/

function calcularpliegues()
    {


        m1 = document.getElementById("Biceps").value;
        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m4 = document.getElementById("Cresta").value;
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;

        p = parseFloat(m1)+parseFloat(m2)+parseFloat(m3)+parseFloat(m4)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8);

text= p;  
    
   document.getElementById("Pliegues").innerHTML = text;  


      document.getElementById("Pliegues").value = p.toFixed(2);


    }



    function calcularpesograso()
    {


        m1 = document.getElementById("grasapor").value;
        m2 = document.getElementById("PesoActual").value;

        pg= (m1*m2)/100;

        document.getElementById("Graso").value = pg.toFixed(2);


    }



    function calcularpesomagro()
    {

 p1 = document.getElementById("grasapor").value;
        p2 = document.getElementById("PesoActual").value;

        pm= (p1*p2)/100;

        /*pma= p2-pm; */

        document.getElementById("Magro").value = pm.toFixed(2);


    }


function calcularIAKS()
    {


        p1 = document.getElementById("grasapor").value;
        p2 = document.getElementById("PesoActual").value;
        pg= (p1*p2)/100;

        m1 = document.getElementById("PesoActual").value;
        //m2 = document.getElementById("Graso").value;
        m3 = document.getElementById("Talla").value;

        iaks= ((m1-pg)+1000000)/(m3*m3*m3);

        document.getElementById("IAKS").value = iaks.toFixed(2);


    }

/*
function calcularmasapiel()
    {

       m1 = document.getElementById("PesoActual").value;
        m2 = document.getElementById("Talla").value;

genero=document.getElementById("genero").value;

if (genero==M)


             mp= ((68,308* (m1^0,425)*(m2^0,725))/10000)*2,07*1,05;

        document.getElementById("masap").value = mp.toFixed(2);

 else if

          mp= ((73,704* (m1^0,425)*(m2^0,725))/10000)*1,96*1,05;

        document.getElementById("masap").value = mp.toFixed(2);


    } */


 function calcularadiposa()
    {

 
          m2 = document.getElementById("riceps").value;
       m3 = document.getElementById("Subescapular").value;
      
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        m9 = document.getElementById("Talla").value;

        
ma= parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8);
// ma = (((((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))*(170,18/m9)-116,41)/34,79)*5,85)+25,6)/((170,18/m9)^3);

 text= ma;  
    
   document.getElementById("masaA").innerHTML = text;  


        document.getElementById("masaA").value = ma.toFixed(2);


    }




function calcularmuscular()
    {

        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        m9 = document.getElementById("Talla").value;
        m10= document.getElementById("brazoR").value;
        m11= document.getElementById("Antebrazo").value;
        m12= document.getElementById("pecho").value;
        m13= document.getElementById("Muslo").value;
        m14= document.getElementById("Pantorrilla").value;
        
       

pm = ((((((m10-(3,1416*m2/10))+m11+(m12-(3,1416*m3/10))+(m7-(3,1416*m13/10))+(m14-(3,1416*m8/10)))*(170,18/m9)-207,21)/13,74)*5,4)+24,5)/((170,18/m9)^3);

        document.getElementById("pesom").value = pm.toFixed(2);


    }



 




     </script>

