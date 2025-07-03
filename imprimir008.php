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
// echo $resultado[grafica008];
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
	<title>HCU-form.008</title>
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
		<div class="col-sm-12">

			<div class="box box-solid">
				<!-- /.box-header -->




				<div class="row">
					<div class="col-sm-12">
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

											<!-- borde --> 
											<table class="tg table table-bordered" style="margin-bottom: 0;">
												<thead>
													<tr>
														<th id="color" colspan="100%">
															1. REGISTRO DE ADMISION
														</th>
													</tr>
												</thead>
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
											<table class="tg table table-bordered" style="margin-bottom:0">
												<thead>
													<tr>
														<th id="color-H">DIRECCION DE RESIDENCIA HABITUAL</th>
														<th id="color-H">CANTON</th>
														<th id="color-H">PROVINCIA</th>
														<th id="color-H">N. TELEFONO</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="tg-0lax"><?php echo $direccion_cliente ?></td>
														<td class="tg-0lax"><?php echo $ciudad_cliente ?></td>
														<td class="tg-0lax"><?php echo $pais ?></td>
														<td class="tg-0lax"><?php echo $telefono_cliente ?></td>
													</tr>
												</tbody>
											</table>
											<table class="tg table table-bordered" style="margin-bottom:0;">
												<thead>
													<tr>
														<th id="color-H" rowspan="2">FECHA DE ATENCION</th>
														<th id="color-H" rowspan="2">HORA</th>
														<th id="color-H" rowspan="2">EDAD</th>
														<th id="color-H" colspan="2">SEXO</th>
														<th id="color-H" colspan="5">ESTADO CIVIL</th>
														<th id="color-H" colspan="5">INSTRUCCION</th>
														<th id="color-H" rowspan="2">OCUPACION</th>
														<th id="color-H" colspan="4">N. SEURO DE SALUD</th>
													</tr>
													<tr>
														<th id="color-H" colspan="2"></th>
														<!-- <th id="color-H"></th> -->
														<th id="color-H">SOL</th>
														<th id="color-H">CAS</th>
														<th id="color-H">DIV</th>
														<th id="color-H">VIU</th>
														<th id="color-H">UL</th>
														<th id="color-H">SIN</th>
														<th id="color-H">BASI</th>
														<th id="color-H">BACH</th>
														<th id="color-H">SUPE</th>
														<th id="color-H">ESPE</th>
														<th id="color-H">IESS</th>
														<th></th>
														<th id="color-H">OTRO</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td><?php echo $resultado['Fecha'] ?></td>
														<td><?php echo $resultado['Hora'] ?></td>
														<td><?php echo $fechaNacimiento ?></td>
														<td colspan="2"><?php echo $genero ?></td>
														<!-- <td></td> -->
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td></td>
														<td colspan="4"></td>
													</tr>
												</tbody>
											</table>
											<table class="tg table table-bordered" style="margin-bottom:0">
												<thead>
													<tr>
														<th id="color-H">NOMBRE DE LA PERSONA PARA NOTIFICACION</th>
														<th id="color-H">PARENTESCO O AFINIDAD</th>
														<th id="color-H">DIRECCION</th>
														<th id="color-H">N. TELEFONO</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="tg-0lax"><?php echo $resultado['xinstituci317'] ?></td>
														<td class="tg-0lax"></td>
														<td class="tg-0lax"></td>
														<td class="tg-0lax"></td>
													</tr>
												</tbody>
											</table>
											<table class="tg table table-bordered" style="margin-bottom:0">
												<thead>
													<tr>
														<th id="color-H">NOMBRE DEL ACOMPAÑANTE</th>
														<th id="color-H">N. CEDULA DE IDENTIDAD</th>
														<th id="color-H">DIRECCION</th>
														<th id="color-H">N. TELEFONO</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td class="tg-0lax"></td>
														<td class="tg-0lax"></td>
														<td class="tg-0lax"></td>
														<td class="tg-0lax"></td>
													</tr>
												</tbody>
											</table>
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color-H" colspan="6">FORMA DE LLEGADA</th>
														<th id="color-H">FUENTE DE INFORMACION</th>
														<th id="color-H">INSTITUCION O PERSONA QUE ENTREGA AL PACIENTE</th>
														<th id="color-H">N. TELEFONO</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H">AMBULATORIO</td>
														<td><?php if ($resultado['xformadell651']=='AMBULATORIO'): ?>
														<strong>X</strong>
														<?php endif ?></td>
														<td id="color-H">SILLA DE RUEDAS</td>
														<td><?php if ($resultado['xformadell651']=='SILLA DE RUEDAS'): ?>
														<strong>X</strong>
														<?php endif ?></td>
														<td id="color-H">CAMILLA</td>
														<td><?php if ($resultado['xformadell651']=='CAMILLA'): ?>
														<strong>X</strong>
														<?php endif ?></td>
														<td><?php echo $resultado['xfuentedei607'] ?></td>
														<td><?php echo $resultado['xinstituci317'] ?></td>
														<td><?php echo $resultado['xntelefono882'] ?></td>
													</tr>
												</tbody>
											</table>
											<!-- borde --> 

											<!-- borde --> 
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="15">2. INICIO DE ATENCION</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H">HORA</td>
														<td><?php echo $resultado['xhora953'] ?></td>
														<td id="color-H">VIA AEREA LIBRE</td>
														<td><?php if ($resultado['xviaaerea640']=='LIBRE'): ?>
														x
														<?php endif ?></td>
														<td id="color-H">VIA AEREA OBSTRUIDA</td>
														<td><?php if ($resultado['xviaaerea640']=='LIBRE'): ?>
														
														<?php endif ?></td>
														<td id="color-H">GRUPO - Rh</td>
														<td><?php echo $resultado['xgruporh595'] ?></td>
														<td id="color-H">CONDICIONES DE LLEGADA</td>
														<?php if ($resultado['xcondicion821']=='ESTABLE'): ?>
															<td id="color-H">ESTABLE</td>
															<td>x</td>
															<td id="color-H">INESTABLE</td>
															<td></td>
															<td id="color-H">OTRO</td>
															<td></td>
														<?php else: ?>
															<td id="color-H">ESTABLE</td>
															<td></td>
															<td id="color-H">INESTABLE</td>
															<td>x</td>
															<td id="color-H">OTRO</td>
															<td></td>
														<?php endif ?>

													</tr>
													<tr>
														<td id="color-H">MOTIVO DE LLEGADA</td>
														<td colspan="14"><?php echo $resultado['xmotivodel754'] ?></td>
													</tr>
												</tbody>
											</table>
											<!-- borde --> 

											<!-- borde -->
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="16">3. ACCIDENTE, VIOLENCIA, INTOXICACION</th>
														<th id="color-H">NO APLICA</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H" colspan="3">LUGAR DE EVENTO</td>
														<td id="color-H" colspan="4">DIRECCION DEL EVENTO</td>
														<td id="color-H" colspan="3">FECHA</td>
														<td id="color-H" colspan="3">HORA</td>
														<td id="color-H" colspan="5">VEHICULO O CAMA</td>
													</tr>
													<tr>
														<td colspan="3"><?php echo $resultado['xlugardele234'] ?></td>
														<td colspan="4"><?php echo $resultado['xdireccion995'] ?></td>
														<td colspan="3"><?php echo $resultado['xfecha706'] ?></td>
														<td colspan="3"><?php echo $resultado['xhora255'] ?></td>
														<td colspan="5"><?php echo $resultado['xvehiculoc821'] ?></td>
													</tr>
													<tr>
														<td id="color-H" colspan="9">TIPO DE EVENTO</td>
														<td id="color-H" colspan="9">AUTORIDAD COMPETENTE</td>
													</tr>
													<tr>
														<td id="color-H">ACCIDENTE</td>
														<td>
															<?php if ($resultado['xtipodeeve117']=='ACCIDENTE'): ?>
																x
															<?php endif ?>
														</td>
														<td id="color-H">ENVENENAMIENTO</td>
														<td>
															<?php if ($resultado['xtipodeeve117']=='ENVENENAMIENTO'): ?>
																x
															<?php endif ?>
														</td>
														<td id="color-H">VIOLENCIA</td>
														<td>
															<?php if ($resultado['xtipodeeve117']=='VIOLENCIA'): ?>
																x
															<?php endif ?>
														</td>
														<td id="color-H">OTRO</td>
														<td colspan="2">
															<?php if ($resultado['xtipodeeve117']=='OTRO'): ?>
																x
															<?php endif ?>
														</td>

														<td colspan="5"></td>
														<td id="color-H">HORA DENUNCIA</td>
														<td><?php echo$resultado['xhora255'] ?></td>
														<td id="color-H">CUSTODIA POLICIAL</td>
														<td><?php echo$resultado['xcustodiap236'] ?></td>
													</tr>
													<tr>
														<td id="color-H">OBSERVACIONES</td>
														<td colspan="17"><?php echo$resultado['xobservaci305'] ?></td>
													</tr>
													<tr>
														<td id="color-H" colspan="10">INTOXICACION</td>
														<td id="color-H" colspan="8">VIOLENCIA</td>
													</tr>
													<tr>
														<td id="color-H">ALIENTO ETILICO</td>
														<td><?php echo$resultado['xalientoel616'] ?></td>
														<td id="color-H">VALOR ALCOCHECK</td>
														<td><?php echo$resultado['xvaloralco868'] ?></td>
														<td id="color-H">HORA EXAMEN</td>
														<td><?php echo$resultado['xhoraexame593'] ?></td>
														<td id="color-H">DE HACE ALCOHOLEMIA</td>
														<td><?php echo$resultado['xsehacealc876'] ?></td>
														<td id="color-H">OTRAS SUSTANCIAS</td>
														<td><?php echo$resultado['xotrassust7560'] ?></td>
														<td id="color-H">SOSPECHA</td>
														<td>
															<?php if ($resultado['xviolencia882']=='SOSPECHA'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">ABUSO FISICO</td>
														<td>
															<?php if ($resultado['xviolencia882']=='ABUSO FISICO'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">ABUSO PSICOLOGICO</td>
														<td>
															<?php if ($resultado['xviolencia882']=='ABUSO PSICOLOGICO'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">ABUSO SEXUAL</td>
														<td>
															<?php if ($resultado['xviolencia882']=='ABUSO SEXUAL'): ?>
																X
															<?php endif ?>
														</td>
													</tr>
													<tr>
														<td id="color-H">OBSERVACIONES</td>
														<td colspan="17"><?php echo$resultado['xobservaci651'] ?></td>
													</tr>
													<tr>
														<td id="color-H" colspan="8">QUEMADURA</td>
														<td id="color-H" colspan="5">PICADURA</td>
														<td id="color-H" colspan="5">MORDEDURA</td>
													</tr>
													<tr>
														<td id="color-H">GRADO I</td>
														<td>
															<?php if ($resultado['xquemadura181']=='GRADO I'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">GRADO II</td>
														<td>
															<?php if ($resultado['xquemadura181']=='GRADO II'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">GRADO III</td>
														<td>
															<?php if ($resultado['xquemadura181']=='GRADO III'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">PORCETAJE SUPERFICIE</td>
														<td><?php echo$resultado['xporcentaj789'] ?></td>
														<td colspan="5"><?php echo$resultado['xpicadura546'] ?></td>
														<td colspan="5"><?php echo$resultado['xmordedura114'] ?></td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->

											<!-- borde -->
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="14">4. ANTECEDENTES PERSONALES Y FAMILIARES RELEVANTES</th>
														<th id="color-H">NO APLICA</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H">1. ALERGICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'ALERGICO') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">2. CLINICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'CLINICO') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">3. GINECOLOGICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'GINECO') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">4. TRAUMATOLOGICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'TRAUMA') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">5. PEDIATRICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'PEDIA') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">6. QUIRURGICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'QUIRU') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">7. FARMATOLOGICOS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'FARMAC') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">8 OTROS</td>
														<td>
															<?php if (strpos($resultado['xanteceden169'], 'OTRO') !== FALSE): ?>
																X
															<?php endif ?>
														</td>
													</tr>
													<tr>
														<td colspan="16"></td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->										

											<!-- borde -->
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="14">5. ENFERMEDAD ACTUAL Y REVISION DE SISTEMAS</th>
														<th id="color-H">NO APLICA</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td colspan="16"><?php echo$resultado['x745'] ?></td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->	

											<!-- borde -->	
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="2">6. CARACTERISCITAS DEL DOLOR </th>
														<th id="color-H" colspan="3">EVOLUCION</th>
														<th id="color-H" colspan="3">TIPO</th>
														<th id="color-H" colspan="5">MODIFICACIONES</th>
														<th id="color-H" colspan="4">ALIVIA CON</th>
														<th id="color-H">NO APLICA</th>
														<th></th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H">REGION ANATOMICA</td>
														<td id="color-H">PUNTO DOLOROSO</td>

														<td id="color-H" class="vrt-header">AGUDO</td>
														<td id="color-H" class="vrt-header">SUB AGUDO</td>
														<td id="color-H" class="vrt-header">CRONICO</td>

														<td id="color-H" class="vrt-header">EPISODICO</td>
														<td id="color-H" class="vrt-header">CONTINUO</td>
														<td id="color-H" class="vrt-header">COLICO</td>

														<td id="color-H" class="vrt-header">POSICION</td>
														<td id="color-H" class="vrt-header">INGESTA</td>
														<td id="color-H" class="vrt-header">ESFUERZO</td>
														<td id="color-H" class="vrt-header">DIGITO PRESION</td>
														<td id="color-H" class="vrt-header">SE IRRADIA</td>

														<td id="color-H" class="vrt-header">ANTIESPASMODICO</td>
														<td id="color-H" class="vrt-header">OPIACEO</td>
														<td id="color-H" class="vrt-header">A I N E</td>
														<td id="color-H" class="vrt-header">NO ALIVIA</td>

														<td id="color-H" colspan="2">INTENSIDAD<br>LEVE<br>MODERADO O <br>GRAVE</td>
													</tr>
													<tr>
														<td><?php echo$resultado['x882'] ?></td>
														<td><?php echo$resultado['x882'] ?></td>

														<td>
															<?php if ($resultado['x766']=='AGUDO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x766']=='SUB AGUDO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x766']=='CRONICO'): ?>
																X
															<?php endif ?>
														</td>

														<td>
															<?php if ($resultado['x860']=='EPISODICO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x860']=='CONTINUO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x860']=='COLICO'): ?>
																X
															<?php endif ?>
														</td>

														<td>
															<?php if ($resultado['x283']=='POSICION'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x283']=='INGESTA'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x283']=='ESFUERZO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x283']=='DIGITO PRESION'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x283']=='SE IRRADIA'): ?>
																X
															<?php endif ?>
														</td>

														<td>
															<?php if ($resultado['x384']=='ANTIESPASMODICO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x384']=='OPIACEO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x384']=='A I N E'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x384']=='NO ALIVIA'): ?>
																X
															<?php endif ?>
														</td>
														<td colspan="2"><?php echo$resultado['x285'] ?></td>
													</tr>

													<tr>
														<td><?php echo$resultado['x762J'] ?></td>
														<td><?php echo$resultado['x762J'] ?></td>

														<td>
															<?php if ($resultado['x553']=='AGUDO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x553']=='SUB AGUDO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x553']=='CRONICO'): ?>
																X
															<?php endif ?>
														</td>

														<td>
															<?php if ($resultado['x341']=='EPISODICO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x341']=='CONTINUO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x341']=='COLICO'): ?>
																X
															<?php endif ?>
														</td>

														<td>
															<?php if ($resultado['x692']=='POSICION'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x692']=='INGESTA'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x692']=='ESFUERZO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x692']=='DIGITO PRESION'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x692']=='SE IRRADIA'): ?>
																X
															<?php endif ?>
														</td>

														<td>
															<?php if ($resultado['x335']=='ANTIESPASMODICO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x335']=='OPIACEO'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x335']=='A I N E'): ?>
																X
															<?php endif ?>
														</td>
														<td>
															<?php if ($resultado['x335']=='NO ALIVIA'): ?>
																X
															<?php endif ?>
														</td>
														<td colspan="2"><?php echo$resultado['x526'] ?></td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->	

											<!-- borde -->	
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="16">7. SIGNOS VITALES, MEDICIONES Y VALOES</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H">PRESION ARTERIAL</td>
														<td><?php echo$resultado['xpresionar775'] ?></td>
														<td id="color-H">FREC. CARDIACA</td>
														<td><?php echo$resultado['xfrecuenci716'] ?></td>
														<td id="color-H">FREC. RESPIRATORIA</td>
														<td><?php echo$resultado['xfrecuenci671'] ?></td>
														<td id="color-H">TEMP. BUCAL</td>
														<td><?php echo$resultado['xtemperatu178'] ?></td>
														<td id="color-H">TEMP. AXILAR</td>
														<td><?php echo$resultado['xtemperatu730'] ?></td>
														<td id="color-H">PRESO</td>
														<td><?php echo$resultado['xpeso398'] ?></td>
														<td id="color-H">TALLA</td>
														<td><?php echo$resultado['xtalla232'] ?></td>
														<td id="color-H">PERIMET. CEFALICO</td>
														<td><?php echo$resultado['xperimetce453'] ?></td>
													</tr>
													<tr>
														<td id="color-H">GLASGOW INICIAL</td>
														<td id="color-H">OCULAR</td>
														<td>
															<?php if ($resultado['xgladowini886']=='OCULAR'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">VERBAL</td>
														<td>
															<?php if ($resultado['xgladowini886']=='VERBAL'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">MOTORA</td>
														<td>
															<?php if ($resultado['xgladowini886']=='MOTORA'): ?>
																X
															<?php endif ?>
														</td>
														<td id="color-H">REAC. PUPILAR DER</td>
														<td><?php echo$resultado['xreaccionp449'] ?></td>
														<td id="color-H">REAC. PUPILAR IZQ</td>
														<td><?php echo$resultado['xreaccionp967'] ?></td>
														<td id="color-H">T. LLENADO CAPILAR</td>
														<td><?php echo$resultado['xtllenadoc361'] ?></td>
														<td colspan="3"></td>
													</tr>
												</tbody>
											</table>
											<!-- borde -->	

											<!-- borde -->
											<table class="tg table table-bordered">
												<thead>
													<tr>
														<th id="color" colspan="15">8. EXAMEN FISICO</th>
													</tr>
												</thead>
												<tbody>
													<tr>
														<td id="color-H"></td>
														<td id="color-H">CP</td>
														<td id="color-H">SP</td>
														<td id="color-H"></td>
														<td id="color-H">CP</td>
														<td id="color-H">SP</td>
														<td id="color-H"></td>
														<td id="color-H">CP</td>
														<td id="color-H">SP</td>
														<td id="color-H"></td>
														<td id="color-H">CP</td>
														<td id="color-H">SP</td>
														<td id="color-H"></td>
														<td id="color-H">CP</td>
														<td id="color-H">SP</td>
													</tr>
													<tr>
														<td id="color-H">1R PIEL Y FANERAS</td>
														<?php if ($resultado['x1rpielyfa989']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														
														<td id="color-H">6R BOCA</td>
														<?php if ($resultado['x5rnariz500']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">11R ABDOMEN</td>
														<?php if ($resultado['x11rabdome671']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">1S ORGANO DE LOS SENTIDOS</td>
														<?php if ($resultado['x1sorganos389']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">6S URINARIO</td>
														<?php if ($resultado['x6surinari190']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
													</tr>
													<tr>
														<td id="color-H">2R CABEZA</td>
														<?php if ($resultado['x2rcabeza992']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">7R ORO FARINGE</td>
														<?php if ($resultado['x7rorofari380']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">12R COLUMNA VERTEBRAL</td>
														<?php if ($resultado['x12rcolumn577']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">2S RESPIRATORIO</td>
														<?php if ($resultado['x2srespira652']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">7S MUSCULO ESQUELETICO</td>
														<?php if ($resultado['x7smusculo705']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
													</tr>
													<tr>
														<td id="color-H">3R OJOS</td>
														<?php if ($resultado['x3rojos907']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">8R CUELLO</td>
														<?php if ($resultado['x8rcuello126']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">13R INGLE-PERINE</td>
														<?php if ($resultado['x13ringlep343']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">3S CARDIO VASCULAR</td>
														<?php if ($resultado['x3scardiov407']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">8S ENDOCRINO</td>
														<?php if ($resultado['x8sendocri302']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
													</tr>
													<tr>
														<td id="color-H">4R OIDOS</td>
														<?php if ($resultado['x4roidos507']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">9R AXILAS - MAMAS</td>
														<?php if ($resultado['x9raxilasm338']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">14R MIEMBROS SUPERIOES</td>
														<?php if ($resultado['x14rmiembr757']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">4S DIGESTIVO</td>
														<?php if ($resultado['x4sdigesti853']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">9S HEMO LINFATICO</td>
														<?php if ($resultado['x9shemolin684']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
													</tr>
													<tr>
														<td id="color-H">5R NARIZ</td>
														<?php if ($resultado['x5rnariz500']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">10R TORAX</td>
														<?php if ($resultado['x10rtorax851']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">15R MIEMBROS INFERIORES</td>
														<?php if ($resultado['x15rmiembr953']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">5S GENITAL</td>
														<?php if ($resultado['x5sgenital640']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
														<td id="color-H">10S NEUROLOGICO</td>
														<?php if ($resultado['x10sneurol472']=='CP'): ?>
															<td>X</td>
															<td></td>
														<?php else: ?>
															<td></td>
															<td>X</td>
														<?php endif ?>
													</tr>
													<tr>
														<!-- borde -->

														<!-- borde -->
														<table class="tg table table-bordered">
															<thead>
																<tr>
																	<th id="color" colspan="2">9. DIAGRAMA TOPOGRAFICO</th>
																	<th id="color-H">NO APLICA</th>
																	<th></th>
																	<th id="color" colspan="6">10. EMBARAZO - PARTO</th>
																	<th id="color-H">NO APLICA</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<?php if ($resultado['rayado_img1']<>''): ?>
																		<td colspan="2" rowspan="16"><img src="<?php echo $resultado['rayado_img1'] ?>" class="img img-responsive" width="100%"></td>
																	<?php else: ?>
																		<td colspan="2" rowspan="16"><img src="img/ec-formato-008.png" class="img img-responsive" width="100%"></td>	
																	<?php endif ?>

																	<td id="color-H">1 HERIDA PENETRANTE</td>
																	<td>
																		<?php if ($resultado['xheridapen908']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">GESTAS</td>
																	<td><?php echo$resultado['xgestas815'] ?></td>
																	<td id="color-H">PARTOS</td>
																	<td><?php echo$resultado['xpartos260'] ?></td>
																	<td id="color-H">ABORTOS</td>
																	<td><?php echo$resultado['xabortos111'] ?></td>
																	<td id="color-H">CESAREAS</td>
																	<td><?php echo$resultado['xcesareas701'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">2 HERIDA NO PENETRANTE</td>
																	<td>
																		<?php if ($resultado['xheridanop435']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">FECHA ULTIMA MENSTRUACION</td>
																	<td><?php echo$resultado['xfechaulti685'] ?></td>
																	<td id="color-H">SEMANAS GESTACION</td>
																	<td><?php echo$resultado['xsemanasg346'] ?></td>
																	<td id="color-H" colspan="3">MOVIMIENTO FETAL</td>
																	<td><?php echo$resultado['xmovimient547'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">3 FRACTURA EXPUESTA</td>
																	<td>
																		<?php if ($resultado['xfracturae276']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">FRECUENCIA C. FETAL</td>
																	<td><?php echo$resultado['xfrecuenci828'] ?></td>
																	<td id="color-H">MEMBRANAS ROTAS</td>
																	<td><?php echo$resultado['xmembranas483'] ?></td>
																	<td id="color-H">TIEMPO</td>
																	<td colspan="3"><?php echo$resultado['xtiempo191'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">4 FRACTURA CERRADA</td>
																	<td>
																		<?php if ($resultado['xfracturac367']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">ALTURA UTERINA</td>
																	<td colspan="3"><?php echo$resultado['xalturaute864'] ?></td>
																	<td id="color-H">PRESENTACION</td>
																	<td colspan="3"><?php echo$resultado['xpresentac560'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">5 AMPUTACION</td>
																	<td>
																		<?php if ($resultado['xamputacio395']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">DILATACION</td>
																	<td><?php echo$resultado['xdilatacio203'] ?></td>
																	<td id="color-H">BORRAMIENTO</td>
																	<td><?php echo$resultado['xborramien308'] ?></td>
																	<td id="color-H">PLANO</td>
																	<td colspan="3"><?php echo$resultado['xplano176'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">6 HEMORRAGIA</td>
																	<td>
																		<?php if ($resultado['xhemorragi100']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">PELVIS UTIL</td>
																	<td><?php echo$resultado['xpelvisuti662'] ?></td>
																	<td id="color-H">SANGRADO VAGINAL</td>
																	<td><?php echo$resultado['xsangradov837'] ?></td>
																	<td id="color-H">CONTRACCIONES</td>
																	<td colspan="3"><?php echo$resultado['xcontracci874'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">7 MORDEDURA</td>
																	<td>
																		<?php if ($resultado['xmordedura639']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td colspan="8" rowspan="1"></td>
																</tr>
																<tr>
																	<td id="color-H">8 PICADURA</td>
																	<td>
																		<?php if ($resultado['xpicadura484']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																</tr>
																<tr>
																	<td id="color-H">9 EXCORIACION</td>
																	<td>
																		<?php if ($resultado['xexcoriaci528']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																</tr>
																<tr>
																	<td id="color-H">10 DEFORMIDAD O MASA</td>
																	<td>
																		<?php if ($resultado['xdeformida349']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color" colspan="6">11. ANALISIS DE PROBLEMAS</td>
																	<td id="color-H">NO APLICA</td>
																	<td></td>
																</tr>
																<tr>
																	<td id="color-H">11 HEMATOMA</td>
																	<td>
																		<?php if ($resultado['xhematoma380']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td colspan="8" rowspan="1"><?php echo$resultado['x11analisi696'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">12 QUEMADURA G-I</td>
																	<td>
																		<?php if ($resultado['xquemadura111']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																</tr>
																<tr>
																	<td id="color-H">13 QUEMADURA G-II</td>
																	<td>
																		<?php if ($resultado['xquemadura139']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																</tr>
																<tr>
																	<td id="color-H">14 QUEMADURA G-III</td>
																	<td>
																		<?php if ($resultado['xquemadura258']=='Si'): ?>
																			X
																		<?php endif ?>
																	</td>
																</tr>
																<tr>
																	<td id="color-H">15</td>
																	<td></td>
																</tr>
																<tr>
																	<td id="color-H">16</td>
																	<td></td>
																</tr>
															</tbody>
														</table>
														<!-- borde -->

														<!-- borde -->
														<table class="tg table table-bordered">
															<thead>
																<tr>
																	<th id="color" colspan="14">12. PLAN DIAGNOSTICO</th>
																	<th id="color-H">NO APLICA</th>
																	<th></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td id="color-H">1. BIOMETRIA</td>
																	<td><?php echo$resultado['xbiometria385'] ?></td>
																	<td id="color-H">3. QUIMICA SANGUINEA</td>
																	<td><?php echo$resultado['xquimicasa960'] ?></td>
																	<td id="color-H">5. GASOMETRIA</td>
																	<td><?php echo$resultado['xgasometri127'] ?></td>
																	<td id="color-H">7. ENDOSCOPIA</td>
																	<td><?php echo$resultado['xendoscopi407'] ?></td>
																	<td id="color-H">9. R-X ABDOMEN</td>
																	<td><?php echo$resultado['xrxabdomen407'] ?></td>
																	<td id="color-H">11. TOMOGRAFIA</td>
																	<td><?php echo$resultado['xtomografi735'] ?></td>
																	<td id="color-H">13. ECOGRAFIA OELVICA</td>
																	<td><?php echo$resultado['xecografia410'] ?></td>
																	<td id="color-H">15. INTERCONSULTA</td>
																	<td><?php echo$resultado['xintercons330'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">2. UROANALISIS</td>
																	<td><?php echo$resultado['xuroanalis527'] ?></td>
																	<td id="color-H">4. ELECTROLITOS</td>
																	<td><?php echo$resultado['xelectroli721'] ?></td>
																	<td id="color-H">6. ELECTRO CARDIOGRAMA</td>
																	<td><?php echo$resultado['xelectroca189'] ?></td>
																	<td id="color-H">8. R-X TORAX</td>
																	<td><?php echo$resultado['xrxtorax689'] ?></td>
																	<td id="color-H">10. R-X OSEA</td>
																	<td><?php echo$resultado['xrxosea623'] ?></td>
																	<td id="color-H">12. RESONANCIA</td>
																	<td><?php echo$resultado['xresonanci208'] ?></td>
																	<td id="color-H">14. ECOGRAFIA ABDOMEN</td>
																	<td><?php echo$resultado['xecografia856'] ?></td>
																	<td id="color-H">16. OTROS</td>
																	<td><?php echo$resultado['xotros210'] ?></td>
																</tr>
																<tr>
																	<td colspan="16"></td>
																</tr>
															</tbody>
														</table>
														<!-- borde -->

														<!-- borde -->
														<table class="tg table table-bordered">
															<thead>
																<tr>
																	<th id="color" colspan="2">13. DIAGNOSTICO PRESUNTIVOS</th>
																	<th id="color">CIE</th>
																	<th id="color" colspan="2">14. DIAGNOSTICO DEFINITIVO</th>
																	<th id="color">CIE</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td id="color-H">1</td>
																	<td><?php echo funcionMaster($resultado['cie2011_1'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2011_1'] ?></td>
																	<td id="color-H">1</td>
																	<td><?php echo funcionMaster($resultado['cie2021_1'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2021_1'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">2</td>
																	<td><?php echo funcionMaster($resultado['cie2011_2'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2011_2'] ?></td>
																	<td id="color-H">2</td>
																	<td><?php echo funcionMaster($resultado['cie2021_2'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2021_2'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">3</td>
																	<td><?php echo funcionMaster($resultado['cie2011_3'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2011_3'] ?></td>
																	<td id="color-H">3</td>
																	<td><?php echo funcionMaster($resultado['cie2021_3'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2021_3'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">4</td>
																	<td><?php echo funcionMaster($resultado['cie2011_4'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2011_4'] ?></td>
																	<td id="color-H">4</td>
																	<td><?php echo funcionMaster($resultado['cie2021_4'],'codigo','descripcion','cie10') ?></td>
																	<td><?php echo $resultado['cie2021_4'] ?></td>
																</tr>
															</tbody>
														</table>
														<!-- borde -->

														<!-- borde -->
														<table class="tg table table-bordered">
															<thead>
																<tr>
																	<th id="color" colspan="14">15. PLAN DE TRATAMIENTO</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td id="color-H"></td>
																	<td id="color-H">MEDICAMENTO GENERICO</td>
																	<td id="color-H">VIA</td>
																	<td id="color-H">DOSIS</td>
																	<td id="color-H">POSOLOGIA</td>
																	<td id="color-H">DIAS</td>
																	<td id="color-H">1. INDICACIONES GENERALES</td>
																	<td>
																		<?php if (strpos($resultado['xplandetra827'], 'INDICACIONES') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">2. PROCEDIMIENTOS</td>
																	<td>
																		<?php if (strpos($resultado['xplandetra827'], 'PROCEDIMIENTOS') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">3. CONSENTIMIENTO INFORMADO</td>
																	<td>
																		<?php if (strpos($resultado['xplandetra827'], 'CONSENTIMIENTO') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">4. OTROS</td>
																	<td>
																		<?php if (strpos($resultado['xplandetra827'], 'OTRO') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																</tr>
																<tr>
																	<td id="color-H">1</td>
																	<td><?php echo$resultado['x398'] ?></td>
																	<td><?php echo$resultado['x448'] ?></td>
																	<td><?php echo$resultado['x692J'] ?></td>
																	<td><?php echo$resultado['x150'] ?></td>
																	<td><?php echo$resultado['x225'] ?></td>
																	<td colspan="8" rowspan="4"><?php echo$resultado['x710'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">2</td>
																	<td><?php echo$resultado['x561'] ?></td>
																	<td><?php echo$resultado['x519'] ?></td>
																	<td><?php echo$resultado['x671J'] ?></td>
																	<td><?php echo$resultado['x899'] ?></td>
																	<td><?php echo$resultado['x300'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">3</td>
																	<td><?php echo$resultado['x545'] ?></td>
																	<td><?php echo$resultado['x377'] ?></td>
																	<td><?php echo$resultado['x137'] ?></td>
																	<td><?php echo$resultado['x119'] ?></td>
																	<td><?php echo$resultado['x676'] ?></td>
																</tr>
															</tbody>
														</table>
														<!-- borde -->

														<!-- borde -->
														<table class="tg table table-bordered table-fixed">
															<thead>
																<tr>
																	<th id="color" colspan="18">16. SALIDA</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td id="color-H">DOMICILIO</td>
																	<td>
																		<?php if (strpos($resultado['xsalida229'], 'DOMICILIO') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>																	
																	<td id="color-H">CON. EXTERNA</td>
																	<td>
																		<?php if (strpos($resultado['xsalida229'], 'EXTERNA') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">OBS.</td>
																	<td>
																		<?php if (strpos($resultado['xsalida229'], 'OBSERVACION') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">INTERNACION</td>
																	<td>
																		<?php if (strpos($resultado['xsalida229'], 'INTERNACION') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">REFERENCIA</td>
																	<td>
																		<?php if (strpos($resultado['xsalida229'], 'REFERENCIA') !== FALSE): ?>
																			X
																		<?php endif ?>
																	</td>
																	<td id="color-H">VIVO</td>
																	<td>
																		<?php if (strpos($resultado['xvivo488'], 'VIVO') !== FALSE): ?>
																			X
																		<?php endif ?>																	
																	</td>
																	<td id="color-H">ESTABLE</td>
																	<td>
																		<?php if (strpos($resultado['xestable294'], 'ESTABLE') !== FALSE): ?>
																			X
																		<?php endif ?>																	
																	</td>																	
																	<td id="color-H">INESTABLE</td>
																	<td>
																		<?php if (strpos($resultado['xestable294'], 'INESTABLE') !== FALSE): ?>
																			X
																		<?php endif ?>																	
																	</td>
																	<td id="color-H">D. DE INCAPACIDAD</td>
																	<td><?php echo$resultado['xdiasdeinc460'] ?></td>
																</tr>
																<tr>
																	<td id="color-H">SERVICIO</td>
																	<td colspan="4"><?php echo$resultado['xservicio507'] ?></td>
																	<td id="color-H">ESTABLECIMIENTO</td>
																	<td colspan="4"><?php echo$resultado['xestableci193'] ?></td>
																	<td id="color-H">MUERTO EN EMERGENCIA</td>
																	<td>
																		<?php if (strpos($resultado['xvivo488'], 'MUERTO') !== FALSE): ?>
																			X
																		<?php endif ?>																	
																	</td>
																	<td id="color-H">CAUSA</td>
																	<td colspan="5"><?php echo$resultado['xcausa328'] ?></td>
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



														<div style="float:left;"><strong>SNS-MSP / HCU-form.008 / 2007</strong></div>
														<div style="float:right;"><strong>EMERGENCIA</strong></div>


													</td>
												</tr>
											</tbody>
										</table>
									</div>
								</body>
								</html>