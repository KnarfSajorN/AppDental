<?php
date_default_timezone_set('America/Bogota');
include("funciones/funciones.php");

$historiaClinica = decrypt($_GET['iC']);
$idHistoria = decrypt($_GET['iCr']);
$cliente=decrypt($_GET['cI']);

$queryList=mysqli_query($conn3,"SELECT * from historiaclinicae WHERE id=$historiaClinica");
$nrowl=mysqli_num_rows($queryList);
while($rowMotorizado=mysqli_fetch_array($queryList)){
	foreach ($rowMotorizado as $key => $val){
		$resultado[$key] = $val;            
	}
}

$queryCliente=mysqli_query($conn3,"SELECT * from cliente where cliente_id=$resultado[cliente_id];");
$nrowl=mysqli_num_rows($queryCliente);
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
?>

<!DOCTYPE html>
<html>
<head>
	<title>HCU-form.002</title>
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
											<tr align="center">
												<th class="Logo" align="center"><img src="logos/MSPECUADOR.png" height="80px"></th>
												<th class="titulo" colspan="2" align="center"> 
													<div align="center"><strong style="font-size: 14px !important; font-weight: bolder;">FERNANDO VILLARROEL</div>
												</th>
												<th class="Logo" align="center"><img src="logos/MK.jpeg" height="80px"></th>
											</tr>
										</table>	

										<!-- borde -->
										<table class="tg table table-bordered">
											<thead>
												<tr>
													<th class="text text-center" id="color" rowspan="2"><strong>FECHA<br>(DIA/MES/ANO)</strong></th>
													<th class="text text-center" id="color" rowspan="2"><strong>HORA</strong></th>
													<th class="text text-center" id="color"><strong>EVOLUCION</strong></th>
													<th class="text text-center" id="color"><strong>PRESCRIPCIONES</strong></th>
													<th class="text text-center" id="color"><strong>MEDICAMENTOS</strong></th>
												</tr>
												<tr>
													<th class="text text-center" id="color-H"><strong>FIRMAR AL PIE DE CADA NOTA DE EVOLUCION</strong></th>
													<th class="text text-center" id="color-H"><strong>FIRMAR AL PIE DE CADA CONJUNTO DE PRESCRIPCIONES</strong></th>
													<th class="text text-center" id="color-H"><strong>REGISTRAR ADMINISTRAR</strong></th>
												</tr>
											</thead>
											<tbody>
												<?php 
												$queryList=mysqli_query($conn3,"SELECT * FROM  evolucionesE where cliente_id=$resultado[cliente_id]  and id_historiaClinica='$historiaClinica' ");
												$nrowl=mysqli_num_rows($queryList);
												while($rowMotorizado=mysqli_fetch_array($queryList))
												{
													$cliente_id      =$rowMotorizado['cliente_id'];
													$usuario_id      =$rowMotorizado['usuario_id'];
													$Fecha           =$rowMotorizado['Fecha'];
													$Hora            =$rowMotorizado['Hora'];
													$fechaconsulta   =$rowMotorizado['fechaconsulta'];
													$motivoConsulta  =$rowMotorizado['motivoConsulta'];
													$prescripciones  =$rowMotorizado['prescripciones'];
													$medicamentos  =$rowMotorizado['medicamentos'];

													$notas           =$rowMotorizado['notas'];
													$recipe          =$rowMotorizado['receta'];
													?>
													<tr>
														<td><?php echo $Fecha; ?></td>
														<td><?php echo $Hora; ?></td>
														<td><?php echo $motivoConsulta; ?></td>
														<td><?php echo $prescripciones; ?></td>
														<td><?php echo $medicamentos; ?></td>
													</tr>
													<?php 
												}

												?>
												
											</tbody>
										</table>
										<!-- borde -->



										<div style="float:left;"><strong>SNS-MSP / HCU-form.002 / 2007</strong></div>
										<div style="float:right;"><strong>CONSULTA EXTERNA - EVOLUCION</strong></div>


									</td>
								</tr>
							</tbody>
						</table>
					</div>
				</body>
				</html>