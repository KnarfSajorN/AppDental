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
	<!-- <div class="wrapper">
		<div class="col-xs-12">
			<div class="box box-solid">
				<div class="row">
					<div class="col-xs-12"> -->
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
													<th id="color-H">FECHA RECIBIDO</th>
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
										<div class="row">	
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="8">1. HEMATOLOGICO</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">HCT</td>
															<td><?php echo$resultado['xhtc342'] ?></td>
															<td id="color-H">HCG</td>
															<td><?php echo$resultado['xhgb866'] ?></td>
															<td id="color-H">VCM</td>
															<td><?php echo$resultado['xvcm919'] ?></td>
															<td id="color-H">RETICULOCITOS</td>
															<td><?php echo$resultado['xreticuloc439'] ?></td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">VELOCIDAD DE SEDIMENTACION</td>
															<td colspan="2"><?php echo$resultado['xvelsedime866'] ?></td>
															<td id="color-H">HCM</td>
															<td><?php echo$resultado['xhcm699'] ?></td>
															<td id="color-H">DREPANOCITOS</td>
															<td><?php echo$resultado['xdrepanoci273'] ?></td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">PLAQUETAS</td>
															<td colspan="2"><?php echo$resultado['xplaquetas431'] ?></td>
															<td id="color-H">CHCM</td>
															<td><?php echo$resultado['xchcm447'] ?></td>
															<td id="color-H" rowspan="2">GRUPO - FACTOR Rh</td>
															<td rowspan="2"><?php echo$resultado['xgruporh877'] ?></td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">LEUCOCITOS</td>
															<td colspan="2"><?php echo$resultado['xleucocito475'] ?></td>
															<td id="color-H">HIPOCROMIA</td>
															<td><?php echo$resultado['xhipocromi926'] ?></td>
														</tr>
														<tr>
															<td id="color-H">METAM</td>
															<td><?php echo$resultado['xmetam408'] ?></td>
															<td id="color-H">BASOF</td>
															<td><?php echo$resultado['xbasof619'] ?></td>
															<td id="color-H">ANISOCITOSIS</td>
															<td><?php echo$resultado['xanisocito404'] ?></td>
															<td id="color-H">COOMBS DIRECTO</td>
															<td><?php echo$resultado['xcoombsdir672'] ?></td>
														</tr>
														<tr>
															<td id="color-H">CAYAD</td>
															<td><?php echo$resultado['xcayad911'] ?></td>
															<td id="color-H">MONOC</td>
															<td><?php echo$resultado['xmonoc456'] ?></td>
															<td id="color-H">POIQUILOCIT</td>
															<td><?php echo$resultado['xpoiquiloc342'] ?></td>
															<td id="color-H">COOMBS INDIR.</td>
															<td><?php echo$resultado['xcoombsind943'] ?></td>
														</tr>
														<tr>
															<td id="color-H">SEGME</td>
															<td><?php echo$resultado['xsegme390'] ?></td>
															<td id="color-H">LINFO</td>
															<td><?php echo$resultado['xlinfo323'] ?></td>
															<td id="color-H">MICROCITOSIS</td>
															<td><?php echo$resultado['xmicrocito609'] ?></td>
															<td id="color-H">T. PROTROMBINA</td>
															<td><?php echo$resultado['xprotombin206'] ?></td>
														</tr>
														<tr>
															<td id="color-H">EOSIN</td>
															<td><?php echo$resultado['xeosin449'] ?></td>
															<td id="color-H">ATIPI</td>
															<td><?php echo$resultado['xatipi962'] ?></td>
															<td id="color-H">POLICROMAT</td>
															<td><?php echo$resultado['xpolicroma228'] ?></td>
															<td id="color-H">T T P</td>
															<td><?php echo$resultado['xttp365'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-6">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="8">3. COPROLOGICO</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">COLOR</td>
															<td><?php echo$resultado['xcolor848'] ?></td>
															<td id="color-H">HEMOGLOBINA</td>
															<td><?php echo$resultado['xhemoglobi442'] ?></td>
															<td id="color-H">ESPORAS</td>
															<td><?php echo$resultado['xesporas201'] ?></td>
															<td id="color-H">FIBRAS</td>
															<td><?php echo$resultado['xfibras630'] ?></td>
														</tr>
														<tr>
															<td id="color-H">CONSIST.</td>
															<td><?php echo$resultado['xconsist575'] ?></td>
															<td id="color-H">GLOBULOS ROJOS</td>
															<td><?php echo$resultado['xglobulosr657'] ?></td>
															<td id="color-H">MICELIOS</td>
															<td><?php echo$resultado['xmicelios216'] ?></td>
															<td id="color-H">ALMIDON</td>
															<td><?php echo$resultado['xalmidon293'] ?></td>
														</tr>
														<tr>
															<td id="color-H">pH</td>
															<td><?php echo$resultado['xph318'] ?></td>
															<td id="color-H">POLIMORFOS</td>
															<td><?php echo$resultado['xpolimorfo388'] ?></td>
															<td id="color-H">MOCO</td>
															<td><?php echo$resultado['xmoco164'] ?></td>
															<td id="color-H">GRASA</td>
															<td><?php echo$resultado['xgrasa602'] ?></td>
														</tr>
														<tr>
															<td id="color-H" colspan="2">PROTOZOARIOS</td>
															<td id="color-H">QUISTE</td>
															<td id="color-H">TROFO</td>
															<td id="color-H" colspan="2">HELMINTOS</td>
															<td id="color-H">HUEVO</td>
															<td id="color-H">LARVA</td>
														</tr>
														<tr>
															<td colspan="2"></td>
															<td></td>
															<td></td>
															<td colspan="2"></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td colspan="2"></td>
															<td></td>
															<td></td>
															<td colspan="2"></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td colspan="2"></td>
															<td></td>
															<td></td>
															<td colspan="2"></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td colspan="2"></td>
															<td></td>
															<td></td>
															<td colspan="2"></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td colspan="8"></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-12"></div>
											<div class="col-xs-8">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color">2. QUIMICA</th>
															<th id="color-H">RESULTADO</th>
															<th id="color-H">UNIDAD DE MEDIDA</th>
															<th id="color-H">VALOR DE REFERENCIA</th>
															<th id="color-H"></th>
															<th id="color-H">RESULTADO</th>
															<th id="color-H">UNIDAD DE MEDIDA</th>
															<th id="color-H">VALOR DE REFERENCIA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">GLUCOSA EN AYUNAS</td>
															<td><?php echo$resultado['x457'] ?></td>
															<td><?php echo$resultado['x263'] ?></td>
															<td><?php echo$resultado['x265'] ?></td>
															<td id="color-H">TRANSAMINASA PIRUVICA</td>
															<td><?php echo$resultado['x581'] ?></td>
															<td><?php echo$resultado['x975'] ?></td>
															<td><?php echo$resultado['x948'] ?></td>
														</tr>
														<tr>
															<td id="color-H">GLUCOSA 2 HORAS</td>
															<td><?php echo$resultado['x883J'] ?></td>
															<td><?php echo$resultado['x459'] ?></td>
															<td><?php echo$resultado['x579'] ?></td>
															<td id="color-H">TRANSAMINASA OXALACETICA</td>
															<td><?php echo$resultado['x406'] ?></td>
															<td><?php echo$resultado['x272'] ?></td>
															<td><?php echo$resultado['x320J'] ?></td>
														</tr>
														<tr>
															<td id="color-H">UREA</td>
															<td><?php echo$resultado['x913'] ?></td>
															<td><?php echo$resultado['x404'] ?></td>
															<td><?php echo$resultado['x880'] ?></td>
															<td id="color-H">FOSFATASA ALCALINA</td>
															<td><?php echo$resultado['x267'] ?></td>
															<td><?php echo$resultado['x709'] ?></td>
															<td><?php echo$resultado['x747J'] ?></td>
														</tr>
														<tr>
															<td id="color-H">CREATININA</td>
															<td><?php echo$resultado['x926'] ?></td>
															<td><?php echo$resultado['x788'] ?></td>
															<td><?php echo$resultado['x306'] ?></td>
															<td id="color-H">COL. TOTAL</td>
															<td><?php echo$resultado['x273J'] ?></td>
															<td><?php echo$resultado['x667'] ?></td>
															<td><?php echo$resultado['x461'] ?></td>
														</tr>
														<tr>
															<td id="color-H">ACIDO URICO</td>
															<td><?php echo$resultado['x287'] ?></td>
															<td><?php echo$resultado['x517'] ?></td>
															<td><?php echo$resultado['x357J'] ?></td>
															<td id="color-H">COL. HDL</td>
															<td><?php echo$resultado['x340'] ?></td>
															<td><?php echo$resultado['x197'] ?></td>
															<td><?php echo$resultado['x983'] ?></td>
														</tr>
														<tr>
															<td id="color-H">BILIRRUBI. TOTAL</td>
															<td><?php echo$resultado['x668'] ?></td>
															<td><?php echo$resultado['x673J'] ?></td>
															<td><?php echo$resultado['x858'] ?></td>
															<td id="color-H">COL. LDL</td>
															<td><?php echo$resultado['x442J'] ?></td>
															<td><?php echo$resultado['x831J'] ?></td>
															<td><?php echo$resultado['x632'] ?></td>
														</tr>
														<tr>
															<td id="color-H">BILIRRUBI. DIRECTA</td>
															<td><?php echo$resultado['x531'] ?></td>
															<td><?php echo$resultado['x829'] ?></td>
															<td><?php echo$resultado['x906J'] ?></td>
															<td id="color-H">TRIGLICERIDOS</td>
															<td><?php echo$resultado['x727'] ?></td>
															<td><?php echo$resultado['x412'] ?></td>
															<td><?php echo$resultado['x905J'] ?></td>
														</tr>
														<tr>
															<td id="color-H">PROTEINA TOTAL</td>
															<td><?php echo$resultado['x808'] ?></td>
															<td><?php echo$resultado['x361'] ?></td>
															<td><?php echo$resultado['x359'] ?></td>
															<td rowspan="3"></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td id="color-H">ALBUMINA</td>
															<td><?php echo$resultado['x778'] ?></td>
															<td><?php echo$resultado['x338'] ?></td>
															<td><?php echo$resultado['x485J'] ?></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td id="color-H">GLOBULINA</td>
															<td><?php echo$resultado['x245'] ?></td>
															<td><?php echo$resultado['x893'] ?></td>
															<td><?php echo$resultado['x492'] ?></td>
															<td></td>
															<td></td>
															<td></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color" colspan="4">4. UROANALISIS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">DENSIDAD</td>
															<td><?php echo$resultado['xdensidad121'] ?></td>
															<td id="color-H">LEUCOCITOS PC</td>
															<td><?php echo$resultado['xleucocito330'] ?></td>
														</tr>
														<tr>
															<td id="color-H">pH</td>
															<td><?php echo$resultado['xph805'] ?></td>
															<td id="color-H">PIOCITOS PC</td>
															<td><?php echo$resultado['xpiocitosp1000'] ?></td>
														</tr>
														<tr>
															<td id="color-H">PROTEINA</td>
															<td><?php echo$resultado['xproteina805'] ?></td>
															<td id="color-H">ERITROCITOS PC</td>
															<td><?php echo$resultado['xeritricit357'] ?></td>
														</tr>
														<tr>
															<td id="color-H">GLUCOSA</td>
															<td><?php echo$resultado['xglucosa230'] ?></td>
															<td id="color-H">CELULAS ALTAS</td>
															<td><?php echo$resultado['xcelulasal357'] ?></td>
														</tr>
														<tr>
															<td id="color-H">CETONA</td>
															<td><?php echo$resultado['xcetona267'] ?></td>
															<td id="color-H">BACTERIAS</td>
															<td><?php echo$resultado['xbacterias195'] ?></td>
														</tr>
														<tr>
															<td id="color-H">HEMOGLOBINA</td>
															<td><?php echo$resultado['xhemoglobi112'] ?></td>
															<td id="color-H">HONGOS</td>
															<td><?php echo$resultado['xhongos808'] ?></td>
														</tr>
														<tr>
															<td id="color-H">BILIRRUBINA</td>
															<td><?php echo$resultado['xbilirrubi791'] ?></td>
															<td id="color-H">MOCO</td>
															<td><?php echo$resultado['xmoco922'] ?></td>
														</tr>
														<tr>
															<td id="color-H">UROBILINOGENO</td>
															<td><?php echo$resultado['xurobilino971'] ?></td>
															<td id="color-H">CRISTALES</td>
															<td><?php echo$resultado['xcristales374'] ?></td>
														</tr>
														<tr>
															<td id="color-H">NITRITO</td>
															<td><?php echo$resultado['xnitrito245'] ?></td>
															<td id="color-H">CILINDROS</td>
															<td><?php echo$resultado['xcilindros535'] ?></td>
														</tr>
														<tr>
															<td colspan="4"></td>
														</tr>
														<tr>
															<td colspan="4"></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-12"></div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color">5. BACTERIOLOGIA</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo$resultado['x5bacterio593'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color">6. VARIOS</th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td><?php echo$resultado['x6varios937'] ?></td>
														</tr>
													</tbody>
												</table>
											</div>
											<div class="col-xs-4">
												<table class="tg table table-bordered">
													<thead>
														<tr>
															<th id="color-H">PROFESIONAL</th>
															<th></th>
															<th></th>
														</tr>
													</thead>
													<tbody>
														<tr>
															<td id="color-H">FIRMA</td>
															<td colspan="2"></td>
														</tr>
														<tr>
															<td id="color-H">TECNOLOGO</td>
															<td></td>
															<td></td>
														</tr>
														<tr>
															<td id="color-H">FIRMA</td>
															<td colspan="2"></td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
										<!-- borde -->



										<div class="col-xs-12">
											<div style="float:left;"><strong>SNS-MSP / HCU-form.010 / 2007</strong></div>
											<div style="float:right;"><strong>LABORATORIO CLINICO - INFORME</strong></div>	
										</div>
									</td>
								</tr>
							</tbody>
						</table>
	<!-- 				</div>
				</div>
			</div>
		</div>
	</div> -->
</body>
</html>