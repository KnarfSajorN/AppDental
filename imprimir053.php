<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$historiaClinica = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);

$queryList = mysqli_query($conn3, "SELECT * from historiaclinicae WHERE id=$historiaClinica");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
	while ($rowMotorizado = mysqli_fetch_array($queryList)) {
		foreach ($rowMotorizado as $key => $val) {
			$resultado[$key] = $val;
		}
	}
}


$queryCliente = mysqli_query($conn3, "SELECT * from cliente where cliente_id=$resultado[cliente_id];");
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
// $nrowl = mysqli_num_rows($queryCliente);



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $resultado[usuario_id];");
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


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $resultado[usuario_id];");
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
	<title>HCU-form.053</title>
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
		<div class="col-md-12">

			<div class="box box-solid">
				<!-- /.box-header -->




				<div class="row">
					<div class="col-md-12">
						<table class="tg table table-bordered" style="table-layout: fixed; width: 100%" class=" ">
							<tbody>
								<tr>
									<td>
										<br>
										<table class="tg table">
											<thead>
												<tr align="center">
													<th style="width: 20%">
														<?php echo($Logo) ?>
													</th>
													<th class="titulo" align="center" style="width: 80%">
														<div align="center"><strong style="font-size: 14px !important; font-weight: bolder;"><?php echo($empresaNombre ) ?></strong></div>
													</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td colspan="2">
														<div align="center"><strong style="font-size: 10px !important;">FORMULARIO DE REFERENCIA, DERIVACIÓN, CONTRAREFERENCIA Y REFERENCIA INVERSA</strong></div>
													</td>
												</tr>
											</tbody>
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
														HOSPITAL
													</td>
													<td>
														<?php echo funcionMaster($resultado['usuario_id'], 'ID', 'especialidad', 'usuarios') ?>
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

										<table class="tg table table-bordered">
											<thead>
												<tr>
													<th colspan="7" id="color">1 Datos institucionales</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Entidad del sistema</td>
													<td>Hist. clinica No</td>
													<td>Establecimiento de Salud</td>
													<td>Tipo</td>
													<td colspan="3">Distrito</td>
												</tr>
												<tr>
													<td><?= $resultado['xentidadde722'] ?></td>
													<td><?= $resultado['xhistoriac320'] ?></td>
													<td><?= $resultado['xestableci906'] ?></td>
													<td><?= $resultado['xtipo759'] ?></td>
													<td colspan="3"><?= $resultado['xdistritoa816'] ?></td>
												</tr>
												<tr>
													<td colspan="4">Refiere o deriva a</td>
													<td colspan="3">Fecha</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td>Entidad del sistema</td>
													<td>Establecimiento de salud</td>
													<td>Servicio</td>
													<td>Especialidad</td>
													<td>Dia</td>
													<td>mes</td>
													<td>año</td>
												</tr>
												<tr>
													<td><?= $resultado['xentidadde791'] ?></td>
													<td><?= $resultado['xestableci622'] ?></td>
													<td><?= $resultado['xservicio669'] ?></td>
													<td><?= $resultado['xespeciali519'] ?></td>
													<td colspan="3"><?= $resultado['xfecha559'] ?></td>
												</tr>
												<tr>
													<td colspan="2">limitada capacidad resolutiva</td>
													<td><?= $resultado['xlimitadac3540'] ?></td>
													<td>saturacion de capacidad insta</td>
													<td colspan="3"><?= $resultado['xsaturacio1710'] ?></td>
												</tr>
												<tr>
													<td colspan="2">ausensia temporal de profesional</td>
													<td><?= $resultado['xausenciat6190'] ?></td>
													<td>otros</td>
													<td colspan="3"><?= $resultado['xotrosespe6410'] ?></td>
												</tr>
												<tr>
													<td colspan="2">falta de profesional (especialidad)</td>
													<td><?= $resultado['xfaltadepr348'] ?></td>
													<td colspan="4"></td>
												</tr>
												<tr>
													<td colspan="7" id="color">3. Resumen del cuadro clinico</td>
												</tr>
												<tr>
													<td colspan="7"><?= $resultado['xresumende432'] ?></td>
												</tr>
												<tr>
													<td colspan="7" id="color">4.- Hallazgos relevantes de exámenes y procedimientos diagnósticos</td>
												</tr>
												<tr>
													<td colspan="7"><?= $resultado['xhallazgos931'] ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->
										<table class="tg table table-bordered">
											<thead id="color">
												<tr>
													<td id="color" colspan="14"><strong>
															5 DIAGNOSTICOS
														</strong></td>
												</tr>
											</thead>
											<tbody class="">
												<tr>
													<td>
														<div class="col-xs-10"><?php echo $resultado['cie3084_1'] . ' - ' . funcionMaster($resultado['cie3084_1'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre3084_1'] ?></div>
													</td>
												</tr>
												<tr>
													<td>
														<div class="col-xs-10"><?php echo $resultado['cie3084_2'] . ' - ' . funcionMaster($resultado['cie3084_2'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre3084_2'] ?></div>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->

										<table class="tg table table-bordered">
											<thead>
												<tr>
													<th colspan="7" id="color">1 Datos institucionales</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td>Entidad del sistema</td>
													<td>Hist. clinica No</td>
													<td>Establecimiento de Salud</td>
													<td>Tipo</td>
													<td>Servicio</td>
													<td colspan="2">Especialidad del servicio</td>
												</tr>
												<tr>
													<td><?= $resultado['xentidadde414'] ?></td>
													<td><?= $resultado['xhistoriac490'] ?></td>
													<td><?= $resultado['xestableci642'] ?></td>
													<td><?= $resultado['xtipo150'] ?></td>
													<td><?= $resultado['xservicio621'] ?></td>
													<td colspan="2"><?= $resultado['xespeciali530'] ?></td>
												</tr>
												<tr>
													<td colspan="4">Contrarefiere o Referencia inversa a :</td>
													<td colspan="3">Fecha</td>
												</tr>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
												</tr>
												<tr>
													<td>Entidad del sistema</td>
													<td>Establecimiento de salud</td>
													<td>Tipo</td>
													<td>Distrito</td>
													<td>Dia</td>
													<td>mes</td>
													<td>año</td>
												</tr>
												<tr>
													<td><?= $resultado['xentidadde473'] ?></td>
													<td><?= $resultado['xestableci488'] ?></td>
													<td><?= $resultado['xtipo204'] ?></td>
													<td><?= $resultado['xdistritoa380'] ?></td>
													<td colspan="3"><?= $resultado['xfecha266'] ?></td>
												</tr>
												<tr>
													<td colspan="7" id="color">2. Resumen del cuadro clinico</td>
												</tr>
												<tr>
													<td colspan="7"><?= $resultado['xresumende823'] ?></td>
												</tr>
												<tr>
													<td colspan="7" id="color">3.- Hallazgos relevantes de exámenes y procedimientos diagnósticos</td>
												</tr>
												<tr>
													<td colspan="7"><?= $resultado['xhallazgos734'] ?></td>
												</tr>
												<tr>
													<td colspan="7" id="color">4.- Tratamiento y procedimientos terapéuticos realizados</td>
												</tr>
												<tr>
													<td colspan="7"><?= $resultado['xtratamien494'] ?></td>
												</tr>
												<tr>
													<td colspan="7" id="color">5.- DIAGNOSTICOS</td>
												</tr>

												<tr>
													<td colspan="7">
														<div class="col-xs-10"><?php echo $resultado['cie3109_1'] . ' - ' . funcionMaster($resultado['cie3109_1'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre3109_1'] ?></div>
													</td>
												</tr>
												<tr>
													<td colspan="7">
														<div class="col-xs-10"><?php echo $resultado['cie3109_2'] . ' - ' . funcionMaster($resultado['cie3109_2'], 'codigo', 'descripcion', 'cie10') ?></div>
														<div class="col-xs-2"><?php echo $resultado['pre3109_2'] ?></div>
													</td>
												</tr>

												<tr>
													<td colspan="7" id="color">6.- Tratamiento recomendado a seguir en Establecimiento de Saud de menos nivel de complejidad</td>
												</tr>
												<tr>
													<td colspan="7"><?= $resultado['xtratamien366'] ?></td>
												</tr>
											</tbody>
										</table>

										<!-- primer borde -->
										<table class="tg table table-bordered">
											<tbody>
												<tr>
													<td id="color-H">
														FECHA
													</td>
													<td>
														<?php echo ($resultado['Fecha']) ?> <?php echo ($resultado['Hora']) ?>
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



										<div style="float:left;"><strong>SNS-MSP / HCU-form.053 / 2007</strong></div>
										<div style="float:right;"><strong>EPICRISIS</strong></div>


									</td>
								</tr>
							</tbody>
						</table>
					</div>
</body>

</html>