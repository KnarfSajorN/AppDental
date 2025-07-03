<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$historiaClinica = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);

$queryList=mysqli_query($conn3,"SELECT * from historiaclinicae WHERE id=$historiaClinica");
// $nrowl=mysqli_num_rows($queryList);
if ($queryList) {
	while($rowMotorizado=mysqli_fetch_array($queryList)){
		foreach ($rowMotorizado as $key => $val){
			$resultado[$key] = $val;
			if ($resultado[$key]=='Si') {
				$resultado[$key] = 'X';
			}
		}
	}
}

// ver el array
// echo '<hr>';
// echo $resultado[cliente_id];
// echo '<pre>'; print_r($resultado); echo '</pre>';
// echo '<hr>';

$queryCliente=mysqli_query($conn3,"SELECT * from cliente where cliente_id = $resultado[cliente_id]  ;");
// $nrowl=mysqli_num_rows($queryCliente);
if ($queryCliente) {
	while($rowCliente=mysqli_fetch_array($queryCliente))
{
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
	<title>HCU-form.012</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<style>
	.vrt-header {
		writing-mode: vertical-lr;
		white-space: pre;
	}

	html *
	{
		font-size: 7px !important;
		font-weight: bold;
		font-family: Arial !important;
	}
	#borderW{
		border: 0px solid white !important;
	}

	.table {
		border: 1px solid #000000 !important;
	}
	.table-bordered > thead > tr > th,
	.table-bordered > tbody > tr > th,
	.table-bordered > tfoot > tr > th,
	.table-bordered > thead > tr > td,
	.table-bordered > tbody > tr > td,
	.table-bordered > tfoot > tr > td {
		border: 1px solid #000000 !important;
	}
	#color{
		background-color: #f0a9c4 !important;
	}
	#color-H{
		background-color: #cae7d4 !important;
	}


	@media print{




		.element::-webkit-scrollbar { width: 0 !important }
		.element { -ms-overflow-style: none; }
		.element { overflow: -moz-scrollbars-none; }
		::-webkit-scrollbar {
			display: none;
		}
		/*table {
			width: 8.5in;
			height: 11in;
		}*/

		html *
		{
			font-size: 7px !important;
			font-family: Arial !important;
		}
		body {-webkit-print-color-adjust: exact;}

		.table {
			border: 1px solid #000000 !important;
		}
		.table-bordered > thead > tr > th,
		.table-bordered > tbody > tr > th,
		.table-bordered > tfoot > tr > th,
		.table-bordered > thead > tr > td,
		.table-bordered > tbody > tr > td,
		.table-bordered > tfoot > tr > td {
			border: 1px solid #000000 !important;
		}
		#color-azul{
			background-color: lightblue !important;			
		}

		table { page-break-after: auto; page-break-before: auto; }
		.vrt-header {
			writing-mode: vertical-lr;
			white-space: pre;
		}
	}
	
</style>

<body>
	<div class="wrapper">
		<div class="col-xs-12">

			<div class="box box-solid">
				<!-- /.box-header -->




				<div class="row">
					<div class="col-xs-12">
						<table class="tg table table-bordered" style="table-layout: fixed; width: 100%;">
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
													<th id="color-H" ><strong>
														INSTITUCION DEL SISTEMA
													</strong></th>
													<th id="color-H" ><strong>
														UNIDAD OPERATIVA
													</strong></th>
													<!-- <th id="color-H" ><strong>
														CODIGO
													</strong></th> -->
													<th id="color-H"  colspan="3"><strong>
														LOCALIZACION
													</strong></th>
													<th id="color-H" ><strong>
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
													<?php echo funcionMaster($resultado['usuario_id'],'ID','especialidad','usuarios') ?>
													</td>
													<td>
													<?php echo($parroquia) ?>
													</td>
													<td>
													<?php echo($canton) ?>															
													</td>
													<td>
													<?php echo($provincia) ?>
													</td>
													<td>
														<?php echo($historiaClinica) ?>
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
														<td><?php echo $primer_nombre.' '.$segundo_nombre ?></td>
														<td><?php echo $nacionalidad ?></td>
														<td><?php echo $CODI_CLIENTE ?></td>
													</tr>
												</tbody>
										</table>
										<!-- borde -->

											<!-- borde -->
										<!-- <table class="tg table table-bordered">
											<thead>
												<tr>
													<th id="color-H">FECHA SOLICITUD</th>
													<th id="color-H">HORA</th>
													<th id="color-H">SERVICIO</th>
													<th id="color-H">SALA</th>
													<th id="color-H">CAMA</th>
													<th id="color-H">PROFESIONAL SOLICITANTE</th>
													<th id="color-H" colspan="6">PRIORIDAD</th>
													<th id="color-H">FECHA TOMA</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td></td>
													<td id="color-H">URGENTE</td>
													<td></td>
													<td id="color-H">NORMAL</td>
													<td></td>
													<td id="color-H">CONTROL</td>
													<td></td>
													<td></td>
												</tr>
											</tbody>
										</table> -->
										<!-- borde -->

										<!-- borde -->
										<table class="tg table table-bordered">
											<thead>
												<tr>
													<th id="color" colspan="13">1. ESTUDIO SOLICITADO</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td id="color-H">R.X CONVENCIONAL</td>
													<td>
														<?php if (strpos($resultado['xestudioso790'], 'CONVENCIONAL') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">TOMOGRAFIA</td>
													<td>
														<?php if (strpos($resultado['xestudioso790'], 'TOMOGRAFIA') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">RESONANCIA</td>
													<td>
														<?php if (strpos($resultado['xestudioso790'], 'RESONANCIA') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">ECOGRAFIA</td>
													<td>
														<?php if (strpos($resultado['xestudioso790'], 'ECOGRAFIA') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">PROCEDIMIENTOS</td>
													<td>
														<?php if (strpos($resultado['xestudioso790'], 'PROCEDIMIENTOS') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">OTROS</td>
													<td colspan="2">
														<?php if (strpos($resultado['xestudioso790'], 'OTRO') !== false): ?>
															X
														<?php endif ?>
													</td>
												</tr>
												<tr>
													<td id="color-H">DESCRIBIR:</td>
													<td colspan="12"><?php echo$resultado['xdescribir536'] ?></td>
												</tr>
												<tr>
													<td colspan="13">.</td>
												</tr>
												<tr>
													<td id="color-H" colspan="2">PUEDE MOVILIZARSE</td>
													<td><?php echo$resultado['xpuedemovi458'] ?></td>
													<td id="color-H" colspan="2">PUEDE RETIRARSE VENDAS, APOSITOS O YESOS</td>
													<td><?php echo$resultado['xpuedereti640'] ?></td>
													<td id="color-H" colspan="3">EL MEDICO ESTARA PRESENTE EN EL EXAMEN</td>
													<td><?php echo$resultado['xelmedicoe498'] ?></td>
													<td id="color-H" colspan="2">TOMA DE RADIOGRAFIA EN LA CAMA</td>
													<td><?php echo$resultado['xtomaderad241'] ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->

										<!-- borde -->
										<table class="tg table table-bordered">
											<thead>
												<tr>
													<th id="color" colspan="13">2. MOTIVO DE LA SOLICITUD</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo$resultado['x485'] ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->


										<!-- borde -->
										<div class="row">
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="5">3. DIAGNOSTICOS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H"></td>
															<td id="color-H">CIE= CLASIFICACION INTERNACIONAL DE ENFERMEDADES PRE: PRESUNTIVO DEF: DEFINITIVO</td>
															<td id="color-H">CIE</td>
															<td id="color-H">PRE / DEF</td>
														</tr>
														<tr>
															<td id="color-H">1</td>
															<td><?php echo funcionMaster($resultado['cie2139_1'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2139_1'] ?></td>
															<td><?php echo $resultado['pre2139_1'] ?></td>
														</tr>
														<tr>
															<td id="color-H">2</td>
															<td><?php echo funcionMaster($resultado['cie2139_2'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2139_2'] ?></td>
															<td><?php echo $resultado['pre2139_2'] ?></td>
														</tr>
														<tr>
															<td id="color-H">3</td>
															<td><?php echo funcionMaster($resultado['cie2139_3'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2139_3'] ?></td>
															<td><?php echo $resultado['pre2139_3'] ?></td>
														</tr>
														<tr>
															<td id="color-H">4</td>
															<td><?php echo funcionMaster($resultado['cie2139_4'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2139_4'] ?></td>
															<td><?php echo $resultado['pre2139_4'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="8">4. RESUMEN CLINICO</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo$resultado['x4resumenc704'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<!-- primer borde -->
										<table class="tg table table-bordered">
											<tbody>
												<tr>
													<td id="color-H">
														
													</td>
													<td>
														
													</td>
													<td id="color-H">
														MEDICO
													</td>
													<td>
														<?php echo($Nombre) ?>
													</td>
													<td id="color-H">
														FIRMA
													</td>
													<td id="borderW">
														<div id="borderW"><?php echo($firmaImg) ?></div>
													</td>
												</tr>
											</tbody>
										</table>
										<!-- primer borde -->



										<div class="col-xs-12">
											<div style="float:left;"><strong>SNS-MSP / HCU-form.012 / 2007</strong></div>
											<div style="float:right;"><strong>IMAGENOLOGIA - SOLICITUD</strong></div>	
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</body>
				</html>