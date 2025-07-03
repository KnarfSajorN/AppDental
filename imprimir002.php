<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$historiaClinica = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);

$queryList = mysqli_query($conn3, "SELECT * from historiaclinicae WHERE id=$historiaClinica");
// // $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		foreach ($rowMotorizado as $key => $val) {
			$resultado[$key] = $val;
		}
	}
}

// ver el array
// echo '<hr>';
// echo $resultado[cliente_id];
// echo '<pre>'; print_r($resultado); echo '</pre>';
// echo '<hr>';
$clienteArray = $resultado['cliente_id'];
$queryCliente = mysqli_query($conn3, "SELECT * from cliente where cliente_id = '$clienteArray' ");
// $nrowl = mysqli_num_rows($queryCliente);
if ($queryCliente) {
	while ($rowCliente = mysqli_fetch_array($queryCliente)) {
		$nombre_cliente = $rowCliente['nombre_cliente'];
		$celular_cliente = $rowCliente['celular_cliente'];
		$ciudad_cliente = $rowCliente['ciudad_cliente'];
		$correo_cliente = $rowCliente['correo_cliente'];
		$CODI_CLIENTE = $rowCliente['CODI_CLIENTE'];
		$tipo_cliente = $rowCliente['tipo_cliente'];
		$activo = $rowCliente['activo'];
		$genero = $rowCliente['genero'];
		$direccion_cliente = $rowCliente['direccion_cliente'];
		$telefono_cliente = $rowCliente['telefono_cliente'];
		$edad_cliente = $rowCliente['edad_cliente'];
		$entidadSalud = $rowCliente['entidadSalud'];
		$seguro = $rowCliente['seguro'];
		$nota = $rowCliente['nota'];
		$fechaNacimiento = $rowCliente['fechaNacimiento'];
		$whatsapp = $rowCliente['whatsapp'];
		$nacionalidad = $rowCliente['nacionalidad'];
		$nombre = $rowCliente['nombre'];
		$apellido = $rowCliente['apellido'];
		$zona = $rowCliente['zona'];
		$asignar = $rowCliente['asignar'];
		$primer_nombre = $rowCliente['primer_nombre'];
		$segundo_nombre = $rowCliente['segundo_nombre'];
		$primer_apellido = $rowCliente['primer_apellido'];
		$segundo_apellido = $rowCliente['segundo_apellido'];
		$genero_asignado = $rowCliente['genero_asignado'];
		$nivel_educacion = $rowCliente['nivel_educacion'];
		$parroquia = $rowCliente['parroquia'];
		$canton = $rowCliente['canton'];
		$provincia = $rowCliente['provincia'];
	}
}

$usuarioArray = $resultado['usuario_id'];
$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = '$usuarioArray' ");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
	$empresaNombre      = $rowMotorizado['empresaNombre'];
	$pais               = $rowMotorizado['pais'];

	$ciudad             = $rowMotorizado['ciudad'];
	$direccion          = $rowMotorizado['direccion'];
	$telefono           = $rowMotorizado['telefono'];
	$especialidad        = $rowMotorizado['especialidad'];
	$nit                = $rowMotorizado['nit'];
	}
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $usuarioArray");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		$moneda = $rowMotorizado['moneda'];
		$impuestoF = $rowMotorizado['impuestoF'];

		// Nuevos campos

		$nombreF      = $rowMotorizado['nombreF'];
		$telefonoF    = $rowMotorizado['telefonoF'];
		$direccionF   = $rowMotorizado['direccionF'];
		$emailF       = $rowMotorizado['emailF'];
		$ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
		$licenciaF    = $rowMotorizado['licenciaF'];
		$pieF         = $rowMotorizado['pieF'];
		$header       = $rowMotorizado['header'];


		$LogoF               = $rowMotorizado['logoF'];
		$firma               = $rowMotorizado['firma'];

		if (strlen($LogoF) > 0) {
			$Logo = "<img src='{$Base}/logos/{$LogoF}' style='height: 80px;width: auto;'>";
		}


		if (strlen($firma) > 0) {
			$firmaImg = "<img src='{$Base}/FirmasReg/{$firma}' height='100' width='330'>";
		}

		}
}

?>

<!DOCTYPE html>
<html>

<head>
	<title>HCU-form.002</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<style>
	html * {
		font-size: 8px !important;
		font-weight: bold;
		font-family: Arial !important;
	}

	#borderW {
		border: 0px solid white !important;
	}

	.table {
		border: 1px solid #000000 !important;
	}

	.table-bordered>thead>tr>th,
	.table-bordered>tbody>tr>th,
	.table-bordered>tfoot>tr>th,
	.table-bordered>thead>tr>td,
	.table-bordered>tbody>tr>td,
	.table-bordered>tfoot>tr>td {
		border: 1px solid #000000 !important;
	}

	#color {
		background-color: #f0a9c4 !important;
	}

	#color-H {
		background-color: #cae7d4 !important;
	}


	@media print {


		.element::-webkit-scrollbar {
			width: 0 !important
		}

		.element {
			-ms-overflow-style: none;
		}

		.element {
			overflow: -moz-scrollbars-none;
		}

		::-webkit-scrollbar {
			display: none;
		}

		table {
			/*width: 8.5in;
			height: 11in;*/
		}

		html * {
			font-size: 8px !important;
			font-family: Arial !important;
		}

		body {
			-webkit-print-color-adjust: exact;
		}

		.table {
			border: 1px solid #000000 !important;
		}

		.table-bordered>thead>tr>th,
		.table-bordered>tbody>tr>th,
		.table-bordered>tfoot>tr>th,
		.table-bordered>thead>tr>td,
		.table-bordered>tbody>tr>td,
		.table-bordered>tfoot>tr>td {
			border: 1px solid #000000 !important;
		}

		#color-azul {
			background-color: lightblue !important;
		}

		/*table { page-break-inside:auto; }
		td    { border:1px solid lightgray; }
		tr    { page-break-inside:auto; }*/
	}
</style>

<body>
	<div class="wrapper">
		<div class="col-xs-12">

			<div class="box box-solid">
				<!-- /.box-header -->




				<div class="row">
					<div class="col-xs-12">
						<table class="tg table table-bordered" style="table-layout: fixed; width: 100%" class=" ">
							<tbody>
								<tr>
									<td>
										<br>
										<table class="tg table ">
											<tr align="center">
												<th class="Logo" align="center"><?php echo($Logo) ?></th>
												<th class="titulo" colspan="2" align="center"> 
													<div align="center"><strong style="font-size: 14px !important; font-weight: bolder;"><?php echo($empresaNombre ) ?></div>
													</th>
													<th class="Logo" align="center"><?php echo($Logo ) ?></th>
												</tr>
											</table>
										<!-- borde -->
										<table class="tg table table-bordered" style="margin-bottom: 0;">
											<thead class="text-center">
												<tr>
													<th id="color-H"><strong>
															INSTITUCION DEL SISTEMA
														</strong></th>
													<th id="color-H"><strong>
															UNIDAD OPERATIVA
														</strong></th>
													<!-- <th id="color-H" ><strong>
														CODIGO
													</strong></th> -->
													<th id="color-H" colspan="3"><strong>
															LOCALIZACION
														</strong></th>
													<th id="color-H"><strong>
															N HISTORIA CLINICA
														</strong> </th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>
														HOSPITAL MILENIAL KIDS
													</td>
													<td>
														<?php echo ($resultado['usuario_id']) ? funcionMaster($resultado['usuario_id'], 'ID', 'especialidad', 'usuarios') : ''; ?>
													</td>
													<td>
														<?php echo ($parroquia) ?>
													</td>
													<td>
														<?php echo ($canton) ?>
													</td>
													<td>
														<?php echo ($provincia) ?>
													</td>
													<td>
														<?php echo ($historiaClinica) ?>
													</td>
												</tr>
											</tbody>
										</table>
										<table class="tg table table-bordered">
											<tbody>
												<tr>
													<th id="color-H">APELLIDO PATERNO</th>
													<th id="color-H">APELLIDO MATERNO</th>
													<th id="color-H">NOMBRES</th>
													<th id="color-H">NACIONALIDAD</th>
													<th id="color-H">N. CEDULA DE CIUDADANIA</th>
												</tr>
												<tr>
													<td><?php echo $primer_apellido ?></td>
													<td><?php echo $segundo_apellido ?></td>
													<td><?php echo $primer_nombre . ' ' . $segundo_nombre ?></td>
													<td><?php echo $nacionalidad ?></td>
													<td><?php echo $CODI_CLIENTE ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															1 MOTIVO DE CONSULTA
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php echo $resultado['x1motivode377'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															2 ANTECEDENTES PERSONALES
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<!-- <label>MENARQUIA -EDAD-  </label><br>
															<?php echo $xmenarquia921 ?><br>
															<label>MENOPAUSIA -EDAD- </label><br>
															<?php echo $xmenopausi602 ?><br>
															<label>CICLOS </label><br>
															<?php echo $xciclos215 ?><br>
															<label>VIDA SEXUAL ACTIVA </label><br>
															<?php echo $xvidasexua434 ?><br>
															<label>GESTA </label><br>
															<?php echo $xgesta998 ?><br>
															<label>PARTOS </label><br>
															<?php echo $xpartos436 ?><br>
															<label>ABORTOS </label><br>
															<?php echo $xabortos429 ?><br>
															<label>CESAREAS </label><br>
															<?php echo $xcesareas927 ?><br>
															<label>HIJOS VIVOS </label><br>
															<?php echo $xhijosvivo140 ?><br>
															<label>FUM </label><br>
															<?php echo $xfum482 ?><br>
															<label>FUP </label><br>
															<?php echo $xfup683 ?><br>
															<label>FUC </label><br>
															<?php echo $xfuc420 ?><br>
															<label>BIOPSIA </label><br>
															<?php echo $xbiopsia406 ?><br>
															<label>METODO DE P. FAMILIAR </label><br>
															<?php echo $xmetododep759 ?><br>
															<label>TERAPIA HORMONAL </label><br>
															<?php echo $xterapiaho375 ?><br>
															<label>COLPOSCOPIA </label><br>
															<?php echo $xcolposcop265 ?><br>
															<label>MAMOGRAFIA </label><br>
															<?php echo $xmamografi618 ?><br> -->

														<?php echo $resultado['x603'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															3 ANTECEDENTES FAMILIARES
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php echo $resultado['x202'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															4 ENFERMEDAD O PROBLEMA ACTUAL
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php echo $resultado['x4enfermed375'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															5 REVISION ACTUAL DE ORGANOS Y SISTEMAS
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php echo $resultado['x596'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															6 SIGNOS VITALES
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php
														$queryListS = mysqli_query($conn3, "SELECT * FROM SignosVitalesYAntropometria where cliente_id= '$clienteArray' ");
														while ($rowMotorizadoS = mysqli_fetch_array($queryListS)) {
															$Peso = $rowMotorizadoS['Peso_Corporal'];
															$Altura = $rowMotorizadoS['Altura'];
															$IMC = $rowMotorizadoS['IMC'];
															$Perimetro_Cefalico = $rowMotorizadoS['Perimetro_Cefalico'];
															$Frecuencia_Respiratoria = $rowMotorizadoS['Frecuencia_Respiratoria'];
															$Frecuencia_Cardiaca = $rowMotorizadoS['Frecuencia_Cardiaca'];
															$Presion_Arterial_Diastolica = $rowMotorizadoS['Presion_Arterial_Diastolica'];
															$Presion_Arterial_Sistolica = $rowMotorizadoS['Presion_Arterial_Sistolica'];
															$Temperatura_Corporal = $rowMotorizadoS['Temperatura_Corporal'];
															$Saturacion_Oxigeno = $rowMotorizadoS['Saturacion_Oxigeno'];
															$Porcentaje_Grasa_Corporal = $rowMotorizadoS['Porcentaje_Grasa_Corporal'];
															$Circunferencia_Cintura = $rowMotorizadoS['Circunferencia_Cintura'];
															$Circunferencia_Abdominal = $rowMotorizadoS['Circunferencia_Abdominal'];
															$Tension_Arterial_Media = $rowMotorizadoS['Tension_Arterial_Media'];
														}
														?>
														<div class="box-body">

															<div class="col-xs-4">
																<label>Peso Corporal [Kg]</label>
																<?php echo $Peso; ?>

															</div>
															<div class="col-xs-4">
																<label>Altura [cm]</label>
																<?php echo $Altura; ?>
															</div>
															<div class="col-xs-4">
																<label>IMC</label>
																<?php echo $IMC; ?>
															</div>
															<script>
																function IMC() {
																	m1 = document.getElementById("KG_peso").value;
																	m2 = document.getElementById("CM_altura").value;

																	r = m1 / ((m2 / 100) * (m2 / 100));
																	document.getElementById("IMC_Paciente").value = r.toFixed(2);
																}
															</script>

															<div class="col-xs-4">
																<label>Perimetro Cefalico</label>
																<?php echo $Perimetro_Cefalico; ?>
															</div>
															<div class="col-xs-4">
																<label>Frecuencia Respiratoria</label>
																<?php echo $Frecuencia_Respiratoria; ?>

															</div>
															<div class="col-xs-4">
																<label>Frecuencia Cardiaca</label>
																<?php echo $Frecuencia_Cardiaca; ?>

															</div>
															<div class="col-xs-4">
																<label>Presion Arterial Diastolica [mmHg]</label>
																<?php echo $Presion_Arterial_Diastolica; ?>

															</div>

															<div class="col-xs-4">
																<label>Presion Arterial Sistolica [mmHg]</label>
																<?php echo $Presion_Arterial_Sistolica; ?>

															</div>
															<div class="col-xs-4">
																<label>Temperatura Corporal [C°]</label>
																<?php echo $Temperatura_Corporal; ?>

															</div>
															<div class="col-xs-4">
																<label>Saturacion Oxigeno [%]</label>
																<?php echo $Saturacion_Oxigeno; ?>

															</div>

															<div class="col-xs-4">
																<label>Porcentaje de Grasa Corporal [%]</label>
																<?php echo $Porcentaje_Grasa_Corporal; ?>

															</div>
															<div class="col-xs-4">
																<label>Circunferencia Abdominal [cm]</label>
																<?php echo $Circunferencia_Abdominal; ?>

															</div>
															<div class="col-xs-4">
																<label>Circunferencia de Cintura [cm]</label>
																<?php echo $Circunferencia_Cintura; ?>

															</div>

															<div class="col-xs-4">
																<label>Tension Arterial Media</label>
																<?php echo $Tension_Arterial_Media; ?>

															</div>


														</div>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															7 EXAMEN FISICO
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php echo $resultado['x239'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															8 DIAGNOSTICOS
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<div class="col-xs-10"><?php echo $resultado['cie1052_1'] . ' - ' . funcionMaster($resultado['cie1052_1'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre1052_1'] ?></div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="col-xs-10"><?php echo $resultado['cie1052_2'] . ' - ' . funcionMaster($resultado['cie1052_2'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre1052_2'] ?></div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="col-xs-10"><?php echo $resultado['cie1052_3'] . ' - ' . funcionMaster($resultado['cie1052_3'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre1052_3'] ?></div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="col-xs-10"><?php echo $resultado['cie1052_4'] . ' - ' . funcionMaster($resultado['cie1052_4'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre1052_4'] ?></div>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															9 PLANES
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<?php echo $resultado['x9planes788'] ?>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->

										<!-- primer borde -->
										<table class="tg table table-bordered">
											<tbody>
												<tr>
													<td id="color-H">
														FECHA PARA CONTROL
													</td>
													<td>
														<?php echo ($resultado['Fecha']) ?>
													</td>
													<td id="color-H">
														HORA FIN
													</td>
													<td>
														<?php echo ($resultado['Hora']) ?>
													</td>
													<td id="color-H">
														MEDICO
													</td>
													<td>
														<?php echo ($Nombre) ?>
													</td>
													<td id="color-H">
														FIRMA
													</td>
													<td id="borderW">
														<div id="borderW"><?php echo ($firmaImg) ?></div>
													</td>
												</tr>
											</tbody>



										</table>
										<!-- primer borde -->



										<div style="float:left;"><strong>SNS-MSP / HCU-form.002 / 2007</strong></div>
										<div style="float:right;"><strong>CONSULTA EXTERNA - ANAMNESIS Y EF</strong></div>


									</td>
								</tr>
							</tbody>
						</table>
					</div>
</body>

</html>