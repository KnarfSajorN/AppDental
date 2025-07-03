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
		}
	}
}

// ver el array
// echo '<hr>';
// echo $resultado[cliente_id];
// echo '<pre>'; print_r($resultado); echo '</pre>';
// echo '<hr>';

$queryCliente=mysqli_query($conn3,"SELECT * from cliente where cliente_id=$resultado[cliente_id];");
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

											<!-- primer borde -->
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<td id="color" colspan="14"><strong>
															1. MOTIVO Y DESTINO DE SOLICITUD
														</strong></td>
													</tr>
												</thead>
												<tbody class="text-center">
													<tr>
														<td colspan="3" class="col-md-1" id="color-H">
															ESTABLECIMIENTO DE DESTINO
														</td>
														<td colspan="3" class="col-md-1">
															<?php echo $resultado['xestableci945'] ?>
														</td>
														<td colspan="" class="col-md-1" id="color-H">
															SERVICIO CONSULADO
														</td>
														<td colspan="" class="col-md-2">
															<?php echo $resultado['xservicioc588'] ?>
														</td>
														<td colspan="" class="col-md-1" id="color-H">
															SERVICIO QUE SOLICITA
														</td>
														<td colspan="" class="col-md-2">
															<?php echo $resultado['xservicioq468'] ?>
														</td>
														<td colspan="" class="col-md-1" id="color-H">
															SALA
														</td>
														<td colspan="" class="col-md-1">
															<?php echo $resultado['xsala279'] ?>
														</td>
														<td colspan="" class="col-md-1" id="color-H">
															CAMA
														</td>
														<td colspan="" class="col-md-1">
															<?php echo $resultado['xcama496'] ?>
														</td>
													</tr>
													<tr>
														<td colspan="2" id="color-H">
															NORMAL
														</td>
														<td colspan="1">
															<?php if ($resultado['xnormal144']=='Si') { echo "X";} ?>
														</td>
														<td colspan="2" id="color-H">
															URGENTE
														</td>
														<td colspan="1">
															<?php if ($resultado['xurgente190']=='Si') { echo "X";} ?>
														</td>
														<td colspan="1" id="color-H">
															MEDICO INTERCONSULADO
														</td>
														<td colspan="7">
															<?php echo $resultado['xmedicoint164'] ?>
														</td>
													</tr>
												</tbody>
											</table>
											<!-- primer borde -->


											<!-- borde -->
											<table class="tg table table-bordered">
												<thead id="color" >
													<tr>
														<td id="color" colspan="14"><strong>
															2. CUADRO CLINICO ACTUAL
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x2cuadrocl783'] ?>
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
															3. RESULTADOS DE LAS PRUEBAS DIAGNOSTICAS
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x3resultad764'] ?>
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
															4. DIAGNOSTICOS
														</strong></td>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td>
															<div class="col-md-10"><?php echo $resultado['cie1793_1'].' - '.funcionMaster($resultado['cie1793_1'],'codigo','descripcion','cie10') ?></div>
															<div class="col-md-2"><?php echo $resultado['pre1793_1'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-md-10"><?php echo $resultado['cie1793_2'].' - '.funcionMaster($resultado['cie1793_2'],'codigo','descripcion','cie10') ?></div>
															<div class="col-md-2"><?php echo $resultado['pre1793_2'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-md-10"><?php echo $resultado['cie1793_3'].' - '.funcionMaster($resultado['cie1793_3'],'codigo','descripcion','cie10') ?></div>
															<div class="col-md-2"><?php echo $resultado['pre1793_3'] ?></div>
														</td>
													</tr>
													<tr>
														<td>
															<div class="col-md-10"><?php echo $resultado['cie1793_4'].' - '.funcionMaster($resultado['cie1793_4'],'codigo','descripcion','cie10') ?></div>
															<div class="col-md-2"><?php echo $resultado['pre1793_4'] ?></div>
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
															5. PLAN TERAPEUTICO REALIZADO
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x5plantera495'] ?>
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
															6 PLAN EDUCACIONAL REALIZADO
														</strong></td>
													</tr>
												</thead>
												<tbody class="">
													<tr>
														<td>
															<?php echo $resultado['x6planeduc466'] ?>
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
											<div style="float:right;"><strong>INTERCONSULTA - SOLICITUD</strong></div>


										</td>
									</tr>
								</tbody>
							</table>
						</div>
					</body>
					</html>