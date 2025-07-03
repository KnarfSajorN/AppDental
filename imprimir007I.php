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
	$provincia = $rowCliente['provincia'];
	$canton = $rowCliente['canton'];
	$parroquia = $rowCliente['parroquia'];
}
}


?>

<!DOCTYPE html>
<html>
<head>
	<title>HCU-form.007</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<style>

	html *
	{
		font-size: 8px !important;
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
		table {
			/*width: 8.5in;
			height: 11in;*/
		}

		html *
		{
			font-size: 8px !important;
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
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="14"><strong>
															7. CUADRO CLINICO DE INTERCONSULTA
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x7cuadrocl408'] ?>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->
											<!-- borde -->
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="14"><strong>
															8. PRUEBAS DIAGNOSTICAS PROPUESTAS
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x8pruebasd631'] ?>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->
											
											<!-- borde -->
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="14"><strong>
															9. DIAGNOSTICOS
														</strong></td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="col-xs-10"><?php echo $resultado['cie2220_1'].' - '.funcionMaster($resultado['cie2220_1'],'codigo','descripcion','cie10') ?></div>
															<div class="col-xs-2"><?php echo $resultado['pre2220_1'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-xs-10"><?php echo $resultado['cie2220_2'].' - '.funcionMaster($resultado['cie2220_2'],'codigo','descripcion','cie10') ?></div>
															<div class="col-xs-2"><?php echo $resultado['pre2220_2'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-xs-10"><?php echo $resultado['cie2220_3'].' - '.funcionMaster($resultado['cie2220_3'],'codigo','descripcion','cie10') ?></div>
															<div class="col-xs-2"><?php echo $resultado['pre2220_3'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-xs-10"><?php echo $resultado['cie2220_4'].' - '.funcionMaster($resultado['cie2220_4'],'codigo','descripcion','cie10') ?></div>
															<div class="col-xs-2"><?php echo $resultado['pre2220_4'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-xs-10"><?php echo $resultado['cie2220_5'].' - '.funcionMaster($resultado['cie2220_5'],'codigo','descripcion','cie10') ?></div>
															<div class="col-xs-2"><?php echo $resultado['pre2220_5'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-xs-10"><?php echo $resultado['cie2220_6'].' - '.funcionMaster($resultado['cie2220_6'],'codigo','descripcion','cie10') ?></div>
															<div class="col-xs-2"><?php echo $resultado['pre2220_6'] ?></div>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->

											<!-- borde -->
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="12"><strong>
															11. PLAN TERAPEUTICO PROPUESTO
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x11planter402'] ?>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->
											<!-- borde -->
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="12"><strong>
															12. PLAN EDUCACIONAL PROPUESTO
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x12planedu447'] ?>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->
											<!-- borde -->
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="12"><strong>
															13. RESUMEN DEL CRITERIO CLINICO
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x13resumen131'] ?>
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
															FECHA
														</td>
														<td>
															<?php echo($resultado['Fecha']) ?> <?php echo($resultado['Hora']) ?>
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



											<div style="float:left;"><strong>SNS-MSP / HCU-form.007 / 2007</strong></div>
											<div style="float:right;"><strong>INTERCONSULTA - INFORME</strong></div>


										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</body>
					</html>