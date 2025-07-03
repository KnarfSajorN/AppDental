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
										<table class="tg table">
											<tr align="center">
												<th class="Logo" align="center"><img src="logos/MSPECUADOR.png" height="80px"></th>
												<th class="titulo" colspan="2" align="center"> 
													<div align="center"><strong style="font-size: 14px !important; font-weight: bolder;">FERNANDO VILLARROEL</div>
													</th>
													<th class="Logo" align="center"><img src="logos/MK.jpeg" height="80px"></th>
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
													<th id="color-H">FECHA INFORME</th>
													<th id="color-H">HORA</th>
													<th id="color-H">SERVICIO</th>
													<th id="color-H">SALA</th>
													<th id="color-H">CAMA</th>
													<th id="color-H">PROFESIONAL SOLICITANTE</th>
													<th id="color-H" colspan="6">PRIORIDAD</th>
													<th id="color-H">FECHA ENTREGA</th>
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
													<th id="color" colspan="13">1. ESTUDIO DE IMAGENOLOGIA REALIZADO</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td id="color-H">R.X CONVENCIONAL</td>
													<td>
														<?php if (strpos($resultado['xestudiore174'], 'CONVENCIONAL') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">TOMOGRAFIA</td>
													<td>
														<?php if (strpos($resultado['xestudiore174'], 'TOMOGRAFIA') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">RESONANCIA</td>
													<td>
														<?php if (strpos($resultado['xestudiore174'], 'RESONANCIA') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">ECOGRAFIA</td>
													<td>
														<?php if (strpos($resultado['xestudiore174'], 'ECOGRAFIA') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">PROCEDIMIENTOS</td>
													<td>
														<?php if (strpos($resultado['xestudiore174'], 'PROCEDIMIENTOS') !== false): ?>
															X
														<?php endif ?>
													</td>
													<td id="color-H">OTROS</td>
													<td colspan="2">
														<?php if (strpos($resultado['xestudiore174'], 'OTRO') !== false): ?>
															X
														<?php endif ?>
													</td>
												</tr>
												<tr>
													<td id="color-H">DESCRIBIR:</td>
													<td colspan="12"><?php echo$resultado['xdescribir532'] ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->

										<!-- borde -->
										<table class="tg table table-bordered">
											<thead>
												<tr>
													<th id="color" colspan="13">2. INFORME DE IMAGENOLOGIA</th>
												</tr>
											</thead>
											<tbody>
												<tr>
													<td><?php echo$resultado['x2informed142'] ?></td>
												</tr>
											</tbody>
										</table>
										<!-- borde -->


										<!-- borde -->
										<div class="row">
											<div class="col-xs-5">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="8">3. DATOS BASICOS DE ECOGRAFIA OBSTETRICA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H" colspan="2">MEDIDA</td>
															<td id="color-H">VALOR</td>
															<td id="color-H">EDAD GEST.</td>
															<td id="color-H" colspan="2">PESO</td>
															<td id="color-H" colspan="2">PLACENTA</td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">DIAMETRO BIPARIETAL</td>
															<td><?php echo$resultado['x556'] ?></td>
															<td><?php echo$resultado['x282'] ?></td>
															<td colspan="2"><?php echo$resultado['x841'] ?></td>
															<td id="color-H">FUNDICA</td>
															<td>
																<?php if (strpos($resultado['xplacenta306'], 'FUNDICA') !== false): ?>
																	X
																<?php endif ?>
															</td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">LONGITUD FEMUR</td>
															<td><?php echo$resultado['x403'] ?></td>
															<td><?php echo$resultado['x802'] ?></td>
															<td colspan="2"><?php echo$resultado['x322'] ?></td>
															<td id="color-H">MARGINAL</td>
															<td>
																<?php if (strpos($resultado['xplacenta306'], 'MARGINAL') !== false): ?>
																	X
																<?php endif ?>
															</td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">PERIMETRO ABDOMINAL</td>
															<td><?php echo$resultado['x690'] ?></td>
															<td><?php echo$resultado['x775'] ?></td>
															<td colspan="2"><?php echo$resultado['x382'] ?></td>
															<td id="color-H">PREVIA</td>
															<td>
																<?php if (strpos($resultado['xplacenta306'], 'PREVIA') !== false): ?>
																	X
																<?php endif ?>
															</td>
														</tr>
														<tr>
															<td id="color-H">MASCULINO</td>
															<td>
																<?php if (strpos($resultado['xtipo885'], 'MASCULINO') !== false): ?>
																	X
																<?php endif ?>
															</td>
															<td id="color-H">FEMENINO</td>
															<td>
																<?php if (strpos($resultado['xtipo885'], 'FEMENINO') !== false): ?>
																	X
																<?php endif ?>
															</td>
															<td id="color-H">MULTIPLE</td>
															<td>
																<?php if (strpos($resultado['xtipo885'], 'MULTIPLE') !== false): ?>
																	X
																<?php endif ?>
															</td>
															<td id="color-H">GRADO DE MADUREZ</td>
															<td><?php echo$resultado['xgmadurez922'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-7">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="8">4. DATOS BASICOS DE ECOGRAFIA GINECOLOGICA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H" colspan="4">UTERO</td>
															<td id="color-H" colspan="4">ANEXOS</td>
														</tr>
														<tr>
															<td id="color-H">ANTEVERSION</td>
															<td><?php echo$resultado['xanteversi8540'] ?></td>
															<td id="color-H">FIBROMA</td>
															<td></td>
															<td id="color-H">HIDROSALPIX</td>
															<td><?php echo$resultado['xhidrosalp154'] ?></td>
															<td id="color-H">QUISTE</td>
															<td><?php echo$resultado['xquiste858'] ?></td>
														</tr>
														<tr>
															<td id="color-H">RETROVERSION</td>
															<td><?php echo$resultado['xretrovers400'] ?></td>
															<td id="color-H">MIOMA</td>
															<td><?php echo$resultado['xmioma144'] ?></td>
															<td id="color-H" colspan="4">CAVIDAD UTERINA</td>
														</tr>
														<tr>
															<td id="color-H">DIU</td>
															<td><?php echo$resultado['xdiu544'] ?></td>
															<td id="color-H">AUSENTE</td>
															<td><?php echo$resultado['xausente311'] ?></td>
															<td id="color-H">VACIA</td>
															<td><?php echo$resultado['xvacia817'] ?></td>
															<td id="color-H">OCUPADA</td>
															<td><?php echo$resultado['xocupada283'] ?></td>
														</tr>
														<tr>
															<td id="color-H">FONDO DE SACO DOUGLAS</td>
															<td colspan="7"></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-12"></div>
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="2">5. DIAGNOSTICOS DE IMAGENOLOGIA</th>
															<th id="color">CIE</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">1</td>
															<td><?php echo funcionMaster($resultado['cie2204_1'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2204_1'] ?></td>
														</tr>
														<tr>
															<td id="color-H">2</td>
															<td><?php echo funcionMaster($resultado['cie2204_2'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2204_2'] ?></td>
														</tr>
														<tr>
															<td id="color-H">3</td>
															<td><?php echo funcionMaster($resultado['cie2204_3'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2204_3'] ?></td>
														</tr>
														<tr>
															<td id="color-H">4</td>
															<td><?php echo funcionMaster($resultado['cie2204_4'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2204_4'] ?></td>
														</tr>
														<tr>
															<td id="color-H">5</td>
															<td><?php echo funcionMaster($resultado['cie2204_5'],'codigo','descripcion','cie10') ?></td>
															<td><?php echo $resultado['cie2204_5'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color">6. RECOMENDACIONES</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo$resultado['x6recomend411'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<table class="tg table table-bordered">
											<tbody>
												<tr>
													<td id="color-H">PLACAS ENVIADAS</td>
													<td><?php echo$resultado['xtotal456'] ?></td>
													<td id="color-H">30X40</td>
													<td><?php echo$resultado['x30x40142'] ?></td>
													<td id="color-H">8X10</td>
													<td><?php echo$resultado['x8x10824'] ?></td>
													<td id="color-H">14X14</td>
													<td><?php echo$resultado['x14x14871'] ?></td>
													<td id="color-H">14X17</td>
													<td><?php echo$resultado['x14x17819'] ?></td>
													<td id="color-H">18X24</td>
													<td><?php echo$resultado['x18x24375'] ?></td>
													<td id="color-H">ODONT</td>
													<td><?php echo$resultado['xodont680'] ?></td>
													<td id="color-H">PALACAS DAÑADAS</td>
													<td><?php echo$resultado['xdantildea891'] ?></td>
													
												</tr>
											</tbody>
										</table>

										<div class="row">
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<tbody>
														<tr>
															<td id="color-H">TECNICO R-X</td>
															<td></td>
														</tr>
														<tr>
															<td id="color-H">FIRMA</td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<tbody>
														<tr>
															<td id="color-H">MD RADIOLOGO</td>
															<td></td>
														</tr>
														<tr>
															<td id="color-H">FIRMA</td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>

										<div class="col-xs-12">
											<div style="float:left;"><strong>SNS-MSP / HCU-form.012 / 2007</strong></div>
											<div style="float:right;"><strong>IMAGENOLOGIA - INFORME</strong></div>	
										</div>
									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</body>
				</html>