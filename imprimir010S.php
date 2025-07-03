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
	$parroquia = $rowCliente['parroquia'];
	$canton = $rowCliente['canton'];
	$provincia = $rowCliente['provincia'];
	$primer_nombre = $rowCliente['primer_nombre'];
	$segundo_nombre = $rowCliente['segundo_nombre'];
	$primer_apellido = $rowCliente['primer_apellido'];
	$segundo_apellido = $rowCliente['segundo_apellido'];
	$genero_asignado = $rowCliente['genero_asignado'];
	$nivel_educacion = $rowCliente['nivel_educacion'];
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
	<title>HCU-form.010</title>
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
										<table class="tg table table-bordered">
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
													<td><?php echo$resultado['xfechasoli631'] ?></td>
													<td><?php echo$resultado['xhora668'] ?></td>
													<td><?php echo$resultado['xservicio316'] ?></td>
													<td><?php echo$resultado['xsala447'] ?></td>
													<td><?php echo$resultado['xcama709'] ?></td>
													<td><?php echo$resultado['xprofesion386'] ?></td>
													<td id="color-H">URGENTE</td>
													<td>
														<?php if ($resultado['xprioridad447']=='URGENTE'): ?>
														x
														<?php endif ?>
													</td>
													<td id="color-H">NORMAL</td>
													<td>
														<?php if ($resultado['xprioridad447']=='NORMAL'): ?>
														x
														<?php endif ?>
													</td>
													<td id="color-H">CONTROL</td>
													<td>
														<?php if ($resultado['xprioridad447']=='CONTROL'): ?>
														x
														<?php endif ?>
													</td>
													<td><?php echo$resultado['xfechatoma740'] ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->

										<!-- borde -->
										<div class="row">	
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="4">1. HEMATOLOGIA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">BIOMETRIA HEMATICA</td>
															<td><?php echo$resultado['xbiometria751'] ?></td>
															<td id="color-H">INDICES HEMATICOS</td>
															<td><?php echo$resultado['xindiceshe666'] ?></td>
														</tr>
														<tr>
															<td id="color-H">PLAQUETAS</td>
															<td><?php echo$resultado['xplaquetas320'] ?></td>
															<td id="color-H">T. PROTOMBINA</td>
															<td><?php echo$resultado['xtprotromb180'] ?></td>
														</tr>
														<tr>
															<td id="color-H">GRUPO / Rh</td>
															<td><?php echo$resultado['xgruporh560'] ?></td>
															<td id="color-H">TIEMPO T. PARCIAL</td>
															<td><?php echo$resultado['xtiempotpa408'] ?></td>
														</tr>
														<tr>
															<td id="color-H">RETICULOCITOS</td>
															<td><?php echo$resultado['xreticuloc900'] ?></td>
															<td id="color-H">DREPANOCITOS</td>
															<td><?php echo$resultado['xdrepanoci542'] ?></td>
														</tr>
														<tr>
															<td id="color-H">HEMATOZOARIO</td>
															<td><?php echo$resultado['xhematozoa332'] ?></td>
															<td id="color-H">COOMBS DIRECTO</td>
															<td><?php echo$resultado['xcoombsdir374'] ?></td>
														</tr>
														<tr>
															<td id="color-H">CELULA L.E.</td>
															<td><?php echo$resultado['xcelulale896'] ?></td>
															<td id="color-H">COOMBS INDIRECTO</td>
															<td><?php echo$resultado['xcoombsind575'] ?></td>
														</tr>
														<tr>
															<td>.</td>
															<td></td>
															<td>.</td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="4">2. QUIMICA SANGUINEA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">GLUCOSA EN AYUNAS</td>
															<td><?php echo$resultado['xglucosaen601'] ?></td>
															<td id="color-H">TRANSAMINADA PIRUVICA</td>
															<td><?php echo$resultado['xtransamin687'] ?></td>
														</tr>
														<tr>
															<td id="color-H">GLUCOSA 2 HORAS</td>
															<td><?php echo$resultado['xglucosa2h479'] ?></td>
															<td id="color-H">TRANSAMINADA OXALACETICA</td>
															<td><?php echo$resultado['xtransamin946'] ?></td>
														</tr>
														<tr>
															<td id="color-H">UREA</td>
															<td><?php echo$resultado['xurea313'] ?></td>
															<td id="color-H">FOSFATASA ALCALINA</td>
															<td><?php echo$resultado['xfosfatasa126'] ?></td>
														</tr>
														<tr>
															<td id="color-H">CREATININA</td>
															<td><?php echo$resultado['xcreatinin757'] ?></td>
															<td id="color-H">COLESTEROL TOTAL</td>
															<td><?php echo$resultado['xcolestero375'] ?></td>
														</tr>
														<tr>
															<td id="color-H">ACIDO URICO</td>
															<td><?php echo$resultado['xacidouric821'] ?></td>
															<td id="color-H">COLESTEROL HDL</td>
															<td><?php echo$resultado['xcolestero623'] ?></td>
														</tr>
														<tr>
															<td id="color-H">BILIRRUBINAS</td>
															<td><?php echo$resultado['xbilirrubi556'] ?></td>
															<td id="color-H">COLESTEROL LDL</td>
															<td><?php echo$resultado['xcolestero735'] ?></td>
														</tr>
														<tr>
															<td id="color-H">PROTEINAS</td>
															<td><?php echo$resultado['xproteinas142'] ?></td>
															<td id="color-H">TRIGLICERIDOS</td>
															<td><?php echo$resultado['xtriglicer313'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="2">3. COPROLOGICO</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">COPROPARASITARIO</td>
															<td><?php echo$resultado['xcopropara942'] ?></td>
														</tr>
														<tr>
															<td id="color-H">SANGRE OCULTA</td>
															<td><?php echo$resultado['xsangreocu370'] ?></td>
														</tr>
														<tr>
															<td id="color-H">INV. POLIMORFO NUCLEARES</td>
															<td><?php echo$resultado['xinvpolimo640'] ?></td>
														</tr>
														<tr>
															<td id="color-H">ROTAVIRUS</td>
															<td><?php echo$resultado['xrotavirus235'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!-- borde -->

										<!-- borde -->
										<div class="row">
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="4">4. UROANALISIS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">ELEMENTAL Y MICROSCOPICO</td>
															<td><?php echo$resultado['xelemental840'] ?></td>
															<td id="color-H">PRUEBA DE EMBARAZO</td>
															<td><?php echo$resultado['xpruebadee580'] ?></td>
														</tr>
														<tr>
															<td id="color-H">GOTA FRESCA</td>
															<td><?php echo$resultado['xgotafresc262'] ?></td>
															<td id="color-H">CULTIVO-ANTIBIOGRAMA</td>
															<td><?php echo$resultado['xcultivoan158'] ?></td>
														</tr>
														<tr>
															<td id="color-H">GRAM</td>
															<td rowspan="3"><?php echo$resultado['xgram678'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="4">5. BACTERIOLOGIA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">GRAM</td>
															<td><?php echo$resultado['xgram268'] ?></td>
															<td id="color-H">FRESCO</td>
															<td><?php echo$resultado['xfresco476'] ?></td>
														</tr>
														<tr>
															<td id="color-H">ZIEHL</td>
															<td><?php echo$resultado['xziehl638'] ?></td>
															<td id="color-H">CULTIVO-ANTIBIOGRAMA</td>
															<td><?php echo$resultado['xcultivoan621'] ?></td>
														</tr>
														<tr>
															<td id="color-H">HONGOS</td>
															<td><?php echo$resultado['xhongos335'] ?></td>
															<td id="color-H">MUESTRA DE</td>
															<td><?php echo$resultado['xmuestra663'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="2">6. OTROS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo$resultado['xotros232'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!-- borde -->

										<div class="col-xs-12">
											<div style="float:left;"><strong>SNS-MSP / HCU-form.010 / 2007</strong></div>
											<div style="float:right;"><strong>LABORATORIO CLINICO - SOLICITUD</strong></div>	
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</body>
				</html>