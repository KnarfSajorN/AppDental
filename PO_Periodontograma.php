<!DOCTYPE html>

<?php
include 'header.php';
include 'menu.php';

$cliente_id = $_GET['clienteId'];

$usuario_id = $_SESSION['ID'];
?>















<style>
	.custom-select-placa {
		height: -webkit-fill-available;
	}

	.custom-select-placa select {
		padding: 10px;
		border: 2px solid #ccc;
		/*border-radius: 5px;*/
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		cursor: pointer;
		height: -webkit-fill-available;
		width: -webkit-fill-available;
		display: table;
		outline: none;
		/* Elimina el resaltado cuando está enfocado */

	}

	.custom-select-placa select::-ms-expand {
		display: none;
		/* Oculta la flecha en Internet Explorer/Edge */
	}

	.opcion-blanco {
		background-color: white;
	}

	.opcion-azul {
		background-color: blue;
		color: white;
	}
</style>

<style>
	.custom-select-sangrado {
		height: -webkit-fill-available;
	}

	.custom-select-sangrado select {
		padding: 10px;
		border: 2px solid #ccc;
		/*border-radius: 5px;*/
		-webkit-appearance: none;
		-moz-appearance: none;
		appearance: none;
		cursor: pointer;
		height: -webkit-fill-available;
		width: -webkit-fill-available;
		display: table;
		outline: none;
		/* Elimina el resaltado cuando está enfocado */

	}

	.custom-select-sangrado select::-ms-expand {
		display: none;
		/* Oculta la flecha en Internet Explorer/Edge */
	}

	.opcion-blanco {
		background-color: white;
	}

	select.opcion-rojo-amarillo {

		background-image: url('Periodontograma/img/sangrado-supuracion.png');
		background-size: cover;
		padding: 5px 10px;
		/* Ajusta según tus necesidades */

	}

	option.opcion-rojo-amarillo {
		background-color: #f2c822;
	}

	.opcion-rojo {
		background-color: #FA5858;
	}

	.borde>div>select {
		height: -webkit-fill-available;
		width: -webkit-fill-available;
	}

	/*
		@media screen and (min-width: 1000px) and (max-width: 1200px) {
			#contenido {
			zoom: 0.8;
			}
		}
		*/
	input[data-formulario="yes2"] {
		width: 19px;
	}

	input[data-formulario="yes"] {
		width: 100% !important;
	}
</style>



<style>
	.Titulo_Pagina {
		width: fit-content;
		background-color: #3c8dbc75;
		padding: 20px;
		border-radius: 20px 20px 0px 0px;
		display: table-cell;
	}
</style>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<ol class="breadcrumb">
			<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
			<li><a href="#"> Periodontograma </a></li>
		</ol>
	</section>

	<!-- Main content -->
	<section class="content">
		<div class="">



			<div class="content">

				<h4 class="Titulo_Pagina">Periodontograma de <?php echo funcionMaster($_GET['clienteId'], 'cliente_id', 'nombre_cliente', 'cliente'); ?></h4>
				<div class="box">
					<div class="box-body">





						<link type="text/css" rel="stylesheet" href="Periodontograma/estilo.css" media="screen">
						<link type="text/css" rel="print stylesheet" href="Periodontograma/estilo.css" media="print">

						<script src="http://code.jquery.com/jquery-1.10.1.min.js"></script>
						<script src="http://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
						<script type="text/javascript" src="http://www.google.com/jsapi" charset="utf-8"></script>

						<script type="text/javascript" src="Periodontograma/odontofinal.js?i=<?php echo time(); ?>"></script>
						<script type="text/javascript">
							//google.load("jquery", "1.10.1");
							google.load('visualization', '1', {
								packages: ['corechart']
							});
						</script>
						<style>
							#lineas-gr,
							#lineas-gr-inf {
								width: 43%;
							}

							.borde {
								height: 41px !important;
							}

							#tabla-1 td,
							#tabla-2 td,
							#tabla-3 td,
							#tabla-4 td,
							#tabla-5 td,
							#tabla-6 td,
							#tabla-7 td,
							#tabla-8 td {
								min-width: 74px !important;
							}

							@media screen and (min-width: 1200px) and (max-width: 1400px) {

								#lineas-gr,
								#lineas-gr-inf {
									width: 60%;
								}
							}

							@media screen and (min-width: 735px) and (max-width: 1200px) {

								#lineas-gr,
								#lineas-gr-inf {
									width: 80%;
								}
							}

							@media screen and (min-width: 375px) and (max-width: 735px) {

								#lineas-gr,
								#lineas-gr-inf {
									width: 170%;
								}
							}
						</style>

						<body>
							<div id="contenido">

								<div style="display:none">
									<img src="Periodontograma/img/cuadrado.png">
									<img src="Periodontograma/img/lleno.png">
									<img src="Periodontograma/img/mediolleno.png">
									<img src="Periodontograma/img/vacio.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-18.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-17.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-16.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-15.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-14.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-13.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-12.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-11.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-18.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-17.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-16.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-15.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-14.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-13.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-12.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-11.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-21.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-22.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-23.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-24.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-25.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-26.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-27.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-28.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-21.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-22.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-23.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-24.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-25.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-26.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-27.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-28.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-18b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-17b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-16b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-15b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-14b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-13b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-12b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-11b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-18b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-17b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-16b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-15b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-14b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-13b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-12b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-11b.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-21b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-22b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-23b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-24b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-25b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-26b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-27b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tornillo-28b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-21b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-22b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-23b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-24b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-25b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-26b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-27b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-arriba-tachados-28b.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-48.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-7.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-46.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-45.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-44.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-43.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-42.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-41.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-48.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-47.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-46.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-45.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-44.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-43.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-42.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-41.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-38.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-37.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-36.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-35.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-34.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-33.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-32.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-31.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-38.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-37.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-36.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-35.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-34.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-33.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-32.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-31.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-48b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-47b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-46b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-45b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-44b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-43b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-42b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-41b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-48b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-47b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-46b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-45b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-44b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-43b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-42b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-41b.png">

									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-38b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-37b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-36b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-35b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-34b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-33b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-32b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tornillo-31b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-38b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-37b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-36b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-35b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-34b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-33b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-32b.png">
									<img src="Periodontograma/Periodontograma_files/periodontograma-dientes-abajo-tachados-31b.png">

								</div>

								<div id="">

									<h3 style="text-align: center;color:red">*Esperar unos segundos para que carguen correctamente los datos, si no cargan los datos refresque la pagina*</h3>
									<table id="separador">
										<tbody>
											<tr>
												<td>SUPERIOR</td>
											</tr>
										</tbody>
									</table>

									<table id="tabla-superior" style="width: 100%;">
										<tbody>
											<tr>
												<td>
													<table id="tabla-1" style="width: 100%;">

														<tbody>
															<tr>
																<td></td>
																<td class="borde">
																	<div id="d18" style="pointer-events: none;">1.8 </div> <input type="checkbox" id="d18_estado" name="d18_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d17" style="pointer-events: none;">1.7</div> <input type="checkbox" id="d17_estado" name="d17_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d16" style="pointer-events: none;">1.6 </div><input type="checkbox" id="d16_estado" name="d16_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d15" style="pointer-events: none;">1.5</div> <input type="checkbox" id="d15_estado" name="d15_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d14" style="pointer-events: none;">1.4</div> <input type="checkbox" id="d14_estado" name="d14_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d13" style="pointer-events: none;">1.3</div> <input type="checkbox" id="d13_estado" name="d13_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d12" style="pointer-events: none;">1.2</div> <input type="checkbox" id="d12_estado" name="d12_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d11" style="pointer-events: none;">1.1</div> <input type="checkbox" id="d11_estado" name="d11_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
															</tr>

															<tr>
																<td class="titulo">Implante</td>
																<td class="borde">
																	<div id="i18"> <select id="Select_i18" name="Implante_i18" data-formulario="yes" onchange="ActualizarDiente(this,'i18')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i17"> <select id="Select_i17" name="Implante_i17" data-formulario="yes" onchange="ActualizarDiente(this,'i17')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i16"> <select id="Select_i16" name="Implante_i16" data-formulario="yes" onchange="ActualizarDiente(this,'i16')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i15"> <select id="Select_i15" name="Implante_i15" data-formulario="yes" onchange="ActualizarDiente(this,'i15')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i14"> <select id="Select_i14" name="Implante_i14" data-formulario="yes" onchange="ActualizarDiente(this,'i14')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i13"> <select id="Select_i13" name="Implante_i13" data-formulario="yes" onchange="ActualizarDiente(this,'i13')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i12"> <select id="Select_i12" name="Implante_i12" data-formulario="yes" onchange="ActualizarDiente(this,'i12')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="i11"> <select id="Select_i11" name="Implante_i11" data-formulario="yes" onchange="ActualizarDiente(this,'i11')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select> </div>
																</td>
															</tr>

															<tr>
																<td class="titulo">Movilidad</td>
																<td class="borde"><input type="text" id="m18" name="m18" data-formulario="yes" value="0" tabindex="1" /></td>
																<td class="borde"><input type="text" id="m17" name="m17" data-formulario="yes" value="0" tabindex="2" /></td>
																<td class="borde"><input type="text" id="m16" name="m16" data-formulario="yes" value="0" tabindex="3" /></td>
																<td class="borde"><input type="text" id="m15" name="m15" data-formulario="yes" value="0" tabindex="4" /></td>
																<td class="borde"><input type="text" id="m14" name="m14" data-formulario="yes" value="0" tabindex="5" /></td>
																<td class="borde"><input type="text" id="m13" name="m13" data-formulario="yes" value="0" tabindex="6" /></td>
																<td class="borde"><input type="text" id="m12" name="m12" data-formulario="yes" value="0" tabindex="7" /></td>
																<td class="borde"><input type="text" id="m11" name="m11" data-formulario="yes" value="0" tabindex="8" /></td>
															</tr>

															<tr>
																<td class="titulo">Pronóstico individual</td>
																<td class="borde"><input type="text" id="pi18" name="pi18" data-formulario="yes" tabindex="17"></td>
																<td class="borde"><input type="text" id="pi17" name="pi17" data-formulario="yes" tabindex="18"></td>
																<td class="borde"><input type="text" id="pi16" name="pi16" data-formulario="yes" tabindex="19"></td>
																<td class="borde"><input type="text" id="pi15" name="pi15" data-formulario="yes" tabindex="20"></td>
																<td class="borde"><input type="text" id="pi14" name="pi14" data-formulario="yes" tabindex="21"></td>
																<td class="borde"><input type="text" id="pi13" name="pi13" data-formulario="yes" tabindex="22"></td>
																<td class="borde"><input type="text" id="pi12" name="pi12" data-formulario="yes" tabindex="23"></td>
																<td class="borde"><input type="text" id="pi11" name="pi11" data-formulario="yes" tabindex="24"></td>
															</tr>

															<tr>
																<td class="titulo">Furca</td>
																<td class="borde">
																	<div id="f18"> <select id="Select_f18" name="Furca_f18" data-formulario="yes" onchange="ActualizarFurca(this,'f18');">
																			<option value="0">0</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="f17"> <select id="Select_f17" name="Furca_f17" data-formulario="yes" onchange="ActualizarFurca(this,'f17');">
																			<option value="0">0</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																		</select> </div>
																</td>
																<td class="borde">
																	<div id="f16"> <select id="Select_f16" name="Furca_f16" data-formulario="yes" onchange="ActualizarFurca(this,'f16');">
																			<option value="0">0</option>
																			<option value="1">1</option>
																			<option value="2">2</option>
																			<option value="3">3</option>
																		</select> </div>
																</td>
																<td class="borde"></td>
																<td class="borde"></td>
																<td class="borde"></td>
																<td class="borde"></td>
																<td class="borde"></td>
															</tr>

															<tr>
																<td class="titulo">Sangrado / Supuración</td>
																<td class="borde">
																	<div id="s18-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup18-a" name="san_sup18-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s18-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup18-b" name="san_sup18-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s18-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup18-c" name="san_sup18-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="s17-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup17-a" name="san_sup17-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s17-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup17-b" name="san_sup17-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s17-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup17-c" name="san_sup17-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>

																<td class="borde">
																	<div id="s16-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup16-a" name="san_sup16-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s16-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup16-b" name="san_sup16-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s16-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup16-c" name="san_sup16-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>

																<td class="borde">
																	<div id="s15-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup15-a" name="san_sup15-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s15-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup15-b" name="san_sup15-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s15-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup15-c" name="san_sup15-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="s14-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup14-a" name="san_sup14-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s14-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup14-b" name="san_sup14-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s14-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup14-c" name="san_sup14-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="s13-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup13-a" name="san_sup13-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s13-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup13-b" name="san_sup13-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s13-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup13-c" name="san_sup13-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="s12-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup12-a" name="san_sup12-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s12-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup12-b" name="san_sup12-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s12-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup12-c" name="san_sup12-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="s11-a">
																		<div class="custom-select-sangrado">
																			<select id="san_sup11-a" name="san_sup11-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s11-b">
																		<div class="custom-select-sangrado">
																			<select id="san_sup11-b" name="san_sup11-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																	<div id="s11-c">
																		<div class="custom-select-sangrado">
																			<select id="san_sup11-c" name="san_sup11-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-rojo"></option>
																				<option value="2" class="opcion-rojo-amarillo"></option>
																			</select>
																		</div>
																	</div>
																</td>
															</tr>

															<tr>
																<td class="titulo">Placa</td>
																<td class="borde">
																	<div id="p18-a">

																		<div class="custom-select-placa">
																			<select id="placa18-a" name="placa18-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>

																	</div>
																	<div id="p18-b">

																		<div class="custom-select-placa">
																			<select id="placa18-b" name="placa18-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>

																	</div>
																	<div id="p18-c">

																		<div class="custom-select-placa">
																			<select id="placa18-c" name="placa18-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>

																	</div>
																</td>
																<td class="borde">
																	<div id="p17-a">
																		<div class="custom-select-placa">
																			<select id="placa17-a" name="placa17-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p17-b">
																		<div class="custom-select-placa">
																			<select id="placa17-b" name="placa17-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p17-c">
																		<div class="custom-select-placa">
																			<select id="placa17-c" name="placa17-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="p16-a">
																		<div class="custom-select-placa">
																			<select id="placa16-a" name="placa16-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p16-b">
																		<div class="custom-select-placa">
																			<select id="placa16-b" name="placa16-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p16-c">
																		<div class="custom-select-placa">
																			<select id="placa16-c" name="placa16-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="p15-a">
																		<div class="custom-select-placa">
																			<select id="placa15-a" name="placa15-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p15-b">
																		<div class="custom-select-placa">
																			<select id="placa15-b" name="placa15-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p15-c">
																		<div class="custom-select-placa">
																			<select id="placa15-c" name="placa15-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="p14-a">
																		<div class="custom-select-placa">
																			<select id="placa14-a" name="placa14-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p14-b">
																		<div class="custom-select-placa">
																			<select id="placa14-b" name="placa14-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p14-c">
																		<div class="custom-select-placa">
																			<select id="placa14-c" name="placa14-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="p13-a">
																		<div class="custom-select-placa">
																			<select id="placa13-a" name="placa13-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p13-b">
																		<div class="custom-select-placa">
																			<select id="placa13-b" name="placa13-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p13-c">
																		<div class="custom-select-placa">
																			<select id="placa13-c" name="placa13-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="p12-a">
																		<div class="custom-select-placa">
																			<select id="placa12-a" name="placa12-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p12-b">
																		<div class="custom-select-placa">
																			<select id="placa12-b" name="placa12-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p12-c">
																		<div class="custom-select-placa">
																			<select id="placa12-c" name="placa12-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
																<td class="borde">
																	<div id="p11-a">
																		<div class="custom-select-placa">
																			<select id="placa11-a" name="placa11-a" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p11-b">
																		<div class="custom-select-placa">
																			<select id="placa11-b" name="placa11-b" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																	<div id="p11-c">
																		<div class="custom-select-placa">
																			<select id="placa11-c" name="placa11-c" data-formulario="yes" onchange="cambiarColor(this);">
																				<option value="0" class="opcion-blanco"></option>
																				<option value="1" class="opcion-azul"></option>
																			</select>
																		</div>
																	</div>
																</td>
															</tr>

															<tr>
																<td class="titulo">Anchura encía</td>
																<td class="borde"><input type="text" id="ae18" name="ae18" data-formulario="yes" value="" tabindex="33"></td>
																<td class="borde"><input type="text" id="ae17" name="ae17" data-formulario="yes" value="" tabindex="34"></td>
																<td class="borde"><input type="text" id="ae16" name="ae16" data-formulario="yes" value="" tabindex="35"></td>
																<td class="borde"><input type="text" id="ae15" name="ae15" data-formulario="yes" value="" tabindex="36"></td>
																<td class="borde"><input type="text" id="ae14" name="ae14" data-formulario="yes" value="" tabindex="37"></td>
																<td class="borde"><input type="text" id="ae13" name="ae13" data-formulario="yes" value="" tabindex="38"></td>
																<td class="borde"><input type="text" id="ae12" name="ae12" data-formulario="yes" value="" tabindex="39"></td>
																<td class="borde"><input type="text" id="ae11" name="ae11" data-formulario="yes" value="" tabindex="40"></td>
															</tr>

															<tr>
																<td class="titulo">Margen gingival</td>
																<td class="borde">
																	<input type="text" id="mg18-a" name="mg18-a" data-formulario="yes2" value="0" tabindex="49" oninput="validarGingival(this)" />
																	<input type="text" id="mg18-b" name="mg18-b" data-formulario="yes2" value="0" tabindex="50" oninput="validarGingival(this)" />
																	<input type="text" id="mg18-c" name="mg18-c" data-formulario="yes2" value="0" tabindex="51" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg17-a" name="mg17-a" data-formulario="yes2" value="0" tabindex="52" oninput="validarGingival(this)" />
																	<input type="text" id="mg17-b" name="mg17-b" data-formulario="yes2" value="0" tabindex="53" oninput="validarGingival(this)" />
																	<input type="text" id="mg17-c" name="mg17-c" data-formulario="yes2" value="0" tabindex="54" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg16-a" name="mg16-a" data-formulario="yes2" value="0" tabindex="55" oninput="validarGingival(this)" />
																	<input type="text" id="mg16-b" name="mg16-b" data-formulario="yes2" value="0" tabindex="56" oninput="validarGingival(this)" />
																	<input type="text" id="mg16-c" name="mg16-c" data-formulario="yes2" value="0" tabindex="57" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg15-a" name="mg15-a" data-formulario="yes2" value="0" tabindex="57" oninput="validarGingival(this)" />
																	<input type="text" id="mg15-b" name="mg15-b" data-formulario="yes2" value="0" tabindex="59" oninput="validarGingival(this)" />
																	<input type="text" id="mg15-c" name="mg15-c" data-formulario="yes2" value="0" tabindex="60" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg14-a" name="mg14-a" data-formulario="yes2" value="0" tabindex="61" oninput="validarGingival(this)" />
																	<input type="text" id="mg14-b" name="mg14-b" data-formulario="yes2" value="0" tabindex="62" oninput="validarGingival(this)" />
																	<input type="text" id="mg14-c" name="mg14-c" data-formulario="yes2" value="0" tabindex="63" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg13-a" name="mg13-a" data-formulario="yes2" value="0" tabindex="64" oninput="validarGingival(this)" />
																	<input type="text" id="mg13-b" name="mg13-b" data-formulario="yes2" value="0" tabindex="65" oninput="validarGingival(this)" />
																	<input type="text" id="mg13-c" name="mg13-c" data-formulario="yes2" value="0" tabindex="66" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg12-a" name="mg12-a" data-formulario="yes2" value="0" tabindex="67" oninput="validarGingival(this)" />
																	<input type="text" id="mg12-b" name="mg12-b" data-formulario="yes2" value="0" tabindex="68" oninput="validarGingival(this)" />
																	<input type="text" id="mg12-c" name="mg12-c" data-formulario="yes2" value="0" tabindex="69" oninput="validarGingival(this)" />
																</td>
																<td class="borde">
																	<input type="text" id="mg11-a" name="mg11-a" data-formulario="yes2" value="0" tabindex="70" oninput="validarGingival(this)" />
																	<input type="text" id="mg11-b" name="mg11-b" data-formulario="yes2" value="0" tabindex="71" oninput="validarGingival(this)" />
																	<input type="text" id="mg11-c" name="mg11-c" data-formulario="yes2" value="0" tabindex="72" oninput="validarGingival(this)" />
																</td>
															</tr>
															<tr>
																<td class="titulo">Profundidad de sondaje</td>
																<td class="borde">
																	<input type="text" id="ps18-a" name="ps18-a" data-formulario="yes2" value="0" tabindex="97" />
																	<input type="text" id="ps18-b" name="ps18-b" data-formulario="yes2" value="0" tabindex="98" />
																	<input type="text" id="ps18-c" name="ps18-c" data-formulario="yes2" value="0" tabindex="99" />
																</td>
																<td class="borde">
																	<input type="text" id="ps17-a" name="ps17-a" data-formulario="yes2" value="0" tabindex="100" />
																	<input type="text" id="ps17-b" name="ps17-b" data-formulario="yes2" value="0" tabindex="101" />
																	<input type="text" id="ps17-c" name="ps17-c" data-formulario="yes2" value="0" tabindex="102" />
																</td>
																<td class="borde">
																	<input type="text" id="ps16-a" name="ps16-a" data-formulario="yes2" value="0" tabindex="103" />
																	<input type="text" id="ps16-b" name="ps16-b" data-formulario="yes2" value="0" tabindex="104" />
																	<input type="text" id="ps16-c" name="ps16-c" data-formulario="yes2" value="0" tabindex="105" />
																</td>
																<td class="borde">
																	<input type="text" id="ps15-a" name="ps15-a" data-formulario="yes2" value="0" tabindex="106" />
																	<input type="text" id="ps15-b" name="ps15-b" data-formulario="yes2" value="0" tabindex="107" />
																	<input type="text" id="ps15-c" name="ps15-c" data-formulario="yes2" value="0" tabindex="108" />
																</td>
																<td class="borde">
																	<input type="text" id="ps14-a" name="ps14-a" data-formulario="yes2" value="0" tabindex="109" />
																	<input type="text" id="ps14-b" name="ps14-b" data-formulario="yes2" value="0" tabindex="110" />
																	<input type="text" id="ps14-c" name="ps14-c" data-formulario="yes2" value="0" tabindex="111" />
																</td>
																<td class="borde">
																	<input type="text" id="ps13-a" name="ps13-a" data-formulario="yes2" value="0" tabindex="112" />
																	<input type="text" id="ps13-b" name="ps13-b" data-formulario="yes2" value="0" tabindex="113" />
																	<input type="text" id="ps13-c" name="ps13-c" data-formulario="yes2" value="0" tabindex="114" />
																</td>
																<td class="borde">
																	<input type="text" id="ps12-a" name="ps12-a" data-formulario="yes2" value="0" tabindex="115" />
																	<input type="text" id="ps12-b" name="ps12-b" data-formulario="yes2" value="0" tabindex="116" />
																	<input type="text" id="ps12-c" name="ps12-c" data-formulario="yes2" value="0" tabindex="117" />
																</td>
																<td class="borde">
																	<input type="text" id="ps11-a" name="ps11-a" data-formulario="yes2" value="0" tabindex="118" />
																	<input type="text" id="ps11-b" name="ps11-b" data-formulario="yes2" value="0" tabindex="119" />
																	<input type="text" id="ps11-c" name="ps11-c" data-formulario="yes2" value="0" tabindex="120" />
																</td>
															</tr>
															<tr>
																<td class="titulo">Vestibular</td>
																<td class="noborde">
																	<div id="lineas-gr"></div>
																	<div id="visualization18a">
																	</div>
																	<div id="diente18-a">
																		<div id="furca18"></div>
																	</div>
																</td>
																<td class="noborde">
																	<div id="visualization17a"></div>
																	<div id="diente17-a">
																		<div id="furca17"></div>
																	</div>
																</td>
																<td class="noborde">
																	<div id="visualization16a"></div>
																	<div id="diente16-a">
																		<div id="furca16"></div>
																	</div>
																</td>
																<td class="noborde">
																	<div id="visualization15a"></div>
																	<div id="diente15-a"></div>
																</td>
																<td class="noborde">
																	<div id="visualization14a"></div>
																	<div id="diente14-a"></div>
																</td>
																<td class="noborde">
																	<div id="visualization13a"></div>
																	<div id="diente13-a"></div>
																</td>
																<td class="noborde">
																	<div id="visualization12a"></div>
																	<div id="diente12-a"></div>
																</td>
																<td class="noborde">
																	<div id="visualization11a"></div>
																	<div id="diente11-a"></div>
																</td>
															</tr>
														</tbody>
													</table>
												</td>
												<td>
													<table id="tabla-2">
														<tbody>
															<tr>
																<td class="borde">
																	<div id="d21" style="pointer-events: none;">2.1</div> <input type="checkbox" id="d21_estado" name="d21_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d22" style="pointer-events: none;">2.2</div> <input type="checkbox" id="d22_estado" name="d22_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d23" style="pointer-events: none;">2.3</div> <input type="checkbox" id="d23_estado" name="d23_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d24" style="pointer-events: none;">2.4</div> <input type="checkbox" id="d24_estado" name="d24_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d25" style="pointer-events: none;">2.5</div> <input type="checkbox" id="d25_estado" name="d25_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d26" style="pointer-events: none;">2.6</div> <input type="checkbox" id="d26_estado" name="d26_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d27" style="pointer-events: none;">2.7</div> <input type="checkbox" id="d27_estado" name="d27_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
																<td class="borde">
																	<div id="d28" style="pointer-events: none;">2.8</div> <input type="checkbox" id="d28_estado" name="d28_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
																</td>
															</tr>
															<tr>
																<td class="borde">
																	<div id="i21"><select id="Select_i21" name="Implante_i21" data-formulario="yes" onchange="ActualizarDiente(this,'i21')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select></div>
																</td>
																<td class="borde">
																	<div id="i22"><select id="Select_i22" name="Implante_i22" data-formulario="yes" onchange="ActualizarDiente(this,'i22')">
																			<option value="0">0</option>
																			<option value="1">1</option>
																		</select></div>
								</div>
								</td>
								<td class="borde">
									<div id="i23"><select id="Select_i23" name="Implante_i23" data-formulario="yes" onchange="ActualizarDiente(this,'i23')">
											<option value="0">0</option>
											<option value="1">1</option>
										</select></div>
							</div>
							</td>
							<td class="borde">
								<div id="i24"><select id="Select_i24" name="Implante_i24" data-formulario="yes" onchange="ActualizarDiente(this,'i24')">
										<option value="0">0</option>
										<option value="1">1</option>
									</select></div>
					</div>
					</td>
					<td class="borde">
						<div id="i25"><select id="Select_i25" name="Implante_i25" data-formulario="yes" onchange="ActualizarDiente(this,'i25')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
				</div>
				</td>
				<td class="borde">
					<div id="i26"><select id="Select_i26" name="Implante_i26" data-formulario="yes" onchange="ActualizarDiente(this,'i26')">
							<option value="0">0</option>
							<option value="1">1</option>
						</select></div>
			</div>
			</td>
			<td class="borde">
				<div id="i27"><select id="Select_i27" name="Implante_i27" data-formulario="yes" onchange="ActualizarDiente(this,'i27')">
						<option value="0">0</option>
						<option value="1">1</option>
					</select></div>
		</div>
		</td>
		<td class="borde">
			<div id="i28"><select id="Select_i28" name="Implante_i28" data-formulario="yes" onchange="ActualizarDiente(this,'i28')">
					<option value="0">0</option>
					<option value="1">1</option>
				</select></div>
</div>
</td>
</tr>

<tr>
	<td class="borde"><input type="text" id="m21" name="m21" data-formulario="yes" value="0" tabindex="9" /></td>
	<td class="borde"><input type="text" id="m22" name="m22" data-formulario="yes" value="0" tabindex="10" /></td>
	<td class="borde"><input type="text" id="m23" name="m23" data-formulario="yes" value="0" tabindex="11" /></td>
	<td class="borde"><input type="text" id="m24" name="m24" data-formulario="yes" value="0" tabindex="12" /></td>
	<td class="borde"><input type="text" id="m25" name="m25" data-formulario="yes" value="0" tabindex="13" /></td>
	<td class="borde"><input type="text" id="m26" name="m26" data-formulario="yes" value="0" tabindex="14" /></td>
	<td class="borde"><input type="text" id="m27" name="m27" data-formulario="yes" value="0" tabindex="15" /></td>
	<td class="borde"><input type="text" id="m28" name="m28" data-formulario="yes" value="0" tabindex="16" /></td>
</tr>

<tr>
	<td class="borde"><input type="text" id="pi21" name="pi21" data-formulario="yes" tabindex="25" /></td>
	<td class="borde"><input type="text" id="pi22" name="pi22" data-formulario="yes" tabindex="26" /></td>
	<td class="borde"><input type="text" id="pi23" name="pi23" data-formulario="yes" tabindex="27" /></td>
	<td class="borde"><input type="text" id="pi24" name="pi24" data-formulario="yes" tabindex="28" /></td>
	<td class="borde"><input type="text" id="pi25" name="pi25" data-formulario="yes" tabindex="29" /></td>
	<td class="borde"><input type="text" id="pi26" name="pi26" data-formulario="yes" tabindex="30" /></td>
	<td class="borde"><input type="text" id="pi27" name="pi27" data-formulario="yes" tabindex="31" /></td>
	<td class="borde"><input type="text" id="pi28" name="pi28" data-formulario="yes" tabindex="32" /></td>
</tr>

<tr>
	<td class="borde"></td>
	<td class="borde"></td>
	<td class="borde"></td>
	<td class="borde"></td>
	<td class="borde"></td>
	<td class="borde">
		<div id="f26"> <select id="Select_f26" name="Furca_f26" data-formulario="yes" onchange="ActualizarFurca(this,'f26');">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select> </div>
	</td>
	<td class="borde">
		<div id="f27"> <select id="Select_f27" name="Furca_f27" data-formulario="yes" onchange="ActualizarFurca(this,'f27');">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select> </div>
	</td>
	<td class="borde">
		<div id="f28"> <select id="Select_f28" name="Furca_f28" data-formulario="yes" onchange="ActualizarFurca(this,'f28');">
				<option value="0">0</option>
				<option value="1">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select> </div>
	</td>
</tr>

<tr>
	<td class="borde">
		<div id="s21-a">
			<div class="custom-select-sangrado">
				<select id="san_sup21-a" name="san_sup21-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s21-b">
			<div class="custom-select-sangrado">
				<select id="san_sup21-b" name="san_sup21-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s21-c">
			<div class="custom-select-sangrado">
				<select id="san_sup21-c" name="san_sup21-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s22-a">
			<div class="custom-select-sangrado">
				<select id="san_sup22-a" name="san_sup22-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s22-b">
			<div class="custom-select-sangrado">
				<select id="san_sup22-b" name="san_sup22-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s22-c">
			<div class="custom-select-sangrado">
				<select id="san_sup22-c" name="san_sup22-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s23-a">
			<div class="custom-select-sangrado">
				<select id="san_sup23-a" name="san_sup23-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s23-b">
			<div class="custom-select-sangrado">
				<select id="san_sup23-b" name="san_sup23-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s23-c">
			<div class="custom-select-sangrado">
				<select id="san_sup23-c" name="san_sup23-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s24-a">
			<div class="custom-select-sangrado">
				<select id="san_sup24-a" name="san_sup24-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s24-b">
			<div class="custom-select-sangrado">
				<select id="san_sup24-b" name="san_sup24-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s24-c">
			<div class="custom-select-sangrado">
				<select id="san_sup24-c" name="san_sup24-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s25-a">
			<div class="custom-select-sangrado">
				<select id="san_sup25-a" name="san_sup25-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s25-b">
			<div class="custom-select-sangrado">
				<select id="san_sup25-b" name="san_sup25-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s25-c">
			<div class="custom-select-sangrado">
				<select id="san_sup25-c" name="san_sup25-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s26-a">
			<div class="custom-select-sangrado">
				<select id="san_sup26-a" name="san_sup26-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s26-b">
			<div class="custom-select-sangrado">
				<select id="san_sup26-b" name="san_sup26-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s26-c">
			<div class="custom-select-sangrado">
				<select id="san_sup26-c" name="san_sup26-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s27-a">
			<div class="custom-select-sangrado">
				<select id="san_sup27-a" name="san_sup27-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s27-b">
			<div class="custom-select-sangrado">
				<select id="san_sup27-b" name="san_sup27-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s27-c">
			<div class="custom-select-sangrado">
				<select id="san_sup27-c" name="san_sup27-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="s28-a">
			<div class="custom-select-sangrado">
				<select id="san_sup28-a" name="san_sup28-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s28-b">
			<div class="custom-select-sangrado">
				<select id="san_sup28-b" name="san_sup28-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
		<div id="s28-c">
			<div class="custom-select-sangrado">
				<select id="san_sup28-c" name="san_sup28-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-rojo"></option>
					<option value="2" class="opcion-rojo-amarillo"></option>
				</select>
			</div>
		</div>
	</td>

</tr>














<tr>
	<td class="borde">
		<div id="p21-a">
			<div class="custom-select-placa">
				<select id="placa21-a" name="placa21-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p21-b">
			<div class="custom-select-placa">
				<select id="placa21-b" name="placa21-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p21-c">
			<div class="custom-select-placa">
				<select id="placa21-c" name="placa21-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>
	<td class="borde">
		<div id="p22-a">
			<div class="custom-select-placa">
				<select id="placa22-a" name="placa22-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p22-b">
			<div class="custom-select-placa">
				<select id="placa22-b" name="placa22-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p22-c">
			<div class="custom-select-placa">
				<select id="placa22-c" name="placa22-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>
	<td class="borde">
		<div id="p23-a">
			<div class="custom-select-placa">
				<select id="placa23-a" name="placa23-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p23-b">
			<div class="custom-select-placa">
				<select id="placa23-b" name="placa23-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p23-c">
			<div class="custom-select-placa">
				<select id="placa23-c" name="placa23-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>
	<td class="borde">
		<div id="p24-a">
			<div class="custom-select-placa">
				<select id="placa24-a" name="placa24-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p24-b">
			<div class="custom-select-placa">
				<select id="placa24-b" name="placa24-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p24-c">
			<div class="custom-select-placa">
				<select id="placa24-c" name="placa24-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>
	<td class="borde">
		<div id="p25-a">
			<div class="custom-select-placa">
				<select id="placa25-a" name="placa25-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p25-b">
			<div class="custom-select-placa">
				<select id="placa25-b" name="placa25-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p25-c">
			<div class="custom-select-placa">
				<select id="placa25-c" name="placa25-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>

	<td class="borde">
		<div id="p26-a">
			<div class="custom-select-placa">
				<select id="placa26-a" name="placa26-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p26-b">
			<div class="custom-select-placa">
				<select id="placa26-b" name="placa26-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p26-c">
			<div class="custom-select-placa">
				<select id="placa26-c" name="placa26-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>
	<td class="borde">
		<div id="p27-a">
			<div class="custom-select-placa">
				<select id="placa27-a" name="placa27-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p27-b">
			<div class="custom-select-placa">
				<select id="placa27-b" name="placa27-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p27-c">
			<div class="custom-select-placa">
				<select id="placa27-c" name="placa27-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>
	<td class="borde">
		<div id="p28-a">
			<div class="custom-select-placa">
				<select id="placa28-a" name="placa28-a" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p28-b">
			<div class="custom-select-placa">
				<select id="placa28-b" name="placa28-b" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
		<div id="p28-c">
			<div class="custom-select-placa">
				<select id="placa28-c" name="placa28-c" data-formulario="yes" onchange="cambiarColor(this);">
					<option value="0" class="opcion-blanco"></option>
					<option value="1" class="opcion-azul"></option>
				</select>
			</div>
		</div>
	</td>

</tr>

<tr>
	<td class="borde"><input type="text" id="ae21" name="ae21" data-formulario="yes" value="" tabindex="41"></td>
	<td class="borde"><input type="text" id="ae22" name="ae22" data-formulario="yes" value="" tabindex="42"></td>
	<td class="borde"><input type="text" id="ae23" name="ae23" data-formulario="yes" value="" tabindex="43"></td>
	<td class="borde"><input type="text" id="ae24" name="ae24" data-formulario="yes" value="" tabindex="44"></td>
	<td class="borde"><input type="text" id="ae25" name="ae25" data-formulario="yes" value="" tabindex="45"></td>
	<td class="borde"><input type="text" id="ae26" name="ae26" data-formulario="yes" value="" tabindex="46"></td>
	<td class="borde"><input type="text" id="ae27" name="ae27" data-formulario="yes" value="" tabindex="47"></td>
	<td class="borde"><input type="text" id="ae28" name="ae28" data-formulario="yes" value="" tabindex="48"></td>
</tr>
<tr>
	<td class="borde">
		<input type="text" id="mg21-a" name="mg21-a" data-formulario="yes2" value="0" tabindex="73">
		<input type="text" id="mg21-b" name="mg21-b" data-formulario="yes2" value="0" tabindex="74">
		<input type="text" id="mg21-c" name="mg21-c" data-formulario="yes2" value="0" tabindex="75">
	</td>
	<td class="borde">
		<input type="text" id="mg22-a" name="mg22-a" data-formulario="yes2" value="0" tabindex="76">
		<input type="text" id="mg22-b" name="mg22-b" data-formulario="yes2" value="0" tabindex="77">
		<input type="text" id="mg22-c" name="mg22-c" data-formulario="yes2" value="0" tabindex="78">
	</td>
	<td class="borde">
		<input type="text" id="mg23-a" name="mg23-a" data-formulario="yes2" value="0" tabindex="79">
		<input type="text" id="mg23-b" name="mg23-b" data-formulario="yes2" value="0" tabindex="80">
		<input type="text" id="mg23-c" name="mg23-c" data-formulario="yes2" value="0" tabindex="81">
	</td>
	<td class="borde">
		<input type="text" id="mg24-a" name="mg24-a" data-formulario="yes2" value="0" tabindex="82">
		<input type="text" id="mg24-b" name="mg24-b" data-formulario="yes2" value="0" tabindex="83">
		<input type="text" id="mg24-c" name="mg24-c" data-formulario="yes2" value="0" tabindex="84">
	</td>
	<td class="borde">
		<input type="text" id="mg25-a" name="mg25-a" data-formulario="yes2" value="0" tabindex="85">
		<input type="text" id="mg25-b" name="mg25-b" data-formulario="yes2" value="0" tabindex="86">
		<input type="text" id="mg25-c" name="mg25-c" data-formulario="yes2" value="0" tabindex="87">
	</td>
	<td class="borde">
		<input type="text" id="mg26-a" name="mg26-a" data-formulario="yes2" value="0" tabindex="88">
		<input type="text" id="mg26-b" name="mg26-b" data-formulario="yes2" value="0" tabindex="89">
		<input type="text" id="mg26-c" name="mg26-c" data-formulario="yes2" value="0" tabindex="90">
	</td>
	<td class="borde">
		<input type="text" id="mg27-a" name="mg27-a" data-formulario="yes2" value="0" tabindex="91">
		<input type="text" id="mg27-b" name="mg27-b" data-formulario="yes2" value="0" tabindex="92">
		<input type="text" id="mg27-c" name="mg27-c" data-formulario="yes2" value="0" tabindex="93">
	</td>
	<td class="borde">
		<input type="text" id="mg28-a" name="mg28-a" data-formulario="yes2" value="0" tabindex="94">
		<input type="text" id="mg28-b" name="mg28-b" data-formulario="yes2" value="0" tabindex="95">
		<input type="text" id="mg28-c" name="mg28-c" data-formulario="yes2" value="0" tabindex="96">
	</td>
</tr>
<tr>
	<td class="borde">
		<input type="text" id="ps21-a" name="ps21-a" data-formulario="yes2" value="0" tabindex="121" />
		<input type="text" id="ps21-b" name="ps21-b" data-formulario="yes2" value="0" tabindex="122" />
		<input type="text" id="ps21-c" name="ps21-c" data-formulario="yes2" value="0" tabindex="123" />
	</td>
	<td class="borde">
		<input type="text" id="ps22-a" name="ps22-a" data-formulario="yes2" value="0" tabindex="124" />
		<input type="text" id="ps22-b" name="ps22-b" data-formulario="yes2" value="0" tabindex="125" />
		<input type="text" id="ps22-c" name="ps22-c" data-formulario="yes2" value="0" tabindex="126" />
	</td>
	<td class="borde">
		<input type="text" id="ps23-a" name="ps23-a" data-formulario="yes2" value="0" tabindex="127" />
		<input type="text" id="ps23-b" name="ps23-b" data-formulario="yes2" value="0" tabindex="128" />
		<input type="text" id="ps23-c" name="ps23-c" data-formulario="yes2" value="0" tabindex="129" />
	</td>
	<td class="borde">
		<input type="text" id="ps24-a" name="ps24-a" data-formulario="yes2" value="0" tabindex="130" />
		<input type="text" id="ps24-b" name="ps24-b" data-formulario="yes2" value="0" tabindex="131" />
		<input type="text" id="ps24-c" name="ps24-c" data-formulario="yes2" value="0" tabindex="132" />
	</td>
	<td class="borde">
		<input type="text" id="ps25-a" name="ps25-a" data-formulario="yes2" value="0" tabindex="133" />
		<input type="text" id="ps25-b" name="ps25-b" data-formulario="yes2" value="0" tabindex="134" />
		<input type="text" id="ps25-c" name="ps25-c" data-formulario="yes2" value="0" tabindex="135" />
	</td>
	<td class="borde">
		<input type="text" id="ps26-a" name="ps26-a" data-formulario="yes2" value="0" tabindex="136" />
		<input type="text" id="ps26-b" name="ps26-b" data-formulario="yes2" value="0" tabindex="137" />
		<input type="text" id="ps26-c" name="ps26-c" data-formulario="yes2" value="0" tabindex="138" />
	</td>
	<td class="borde">
		<input type="text" id="ps27-a" name="ps27-a" data-formulario="yes2" value="0" tabindex="139" />
		<input type="text" id="ps27-b" name="ps27-b" data-formulario="yes2" value="0" tabindex="140" />
		<input type="text" id="ps27-c" name="ps27-c" data-formulario="yes2" value="0" tabindex="141" />
	</td>
	<td class="borde">
		<input type="text" id="ps28-a" name="ps28-a" data-formulario="yes2" value="0" tabindex="142" />
		<input type="text" id="ps28-b" name="ps28-b" data-formulario="yes2" value="0" tabindex="143" />
		<input type="text" id="ps28-c" name="ps28-c" data-formulario="yes2" value="0" tabindex="144" />
	</td>
</tr>
<tr>
	<td class="noborde">
		<div id="lineas-gr"></div>
		<div id="visualization21a"></div>
		<div id="diente21-a"></div>
	</td>
	<td class="noborde">
		</div>
		<div id="visualization22a"></div>
		<div id="diente22-a"></div>
	</td>
	<td class="noborde">
		<div id="visualization23a"></div>
		<div id="diente23-a"></div>
	</td>
	<td class="noborde">
		<div id="visualization24a"></div>
		<div id="diente24-a"></div>
	</td>
	<td class="noborde">
		<div id="visualization25a"></div>
		<div id="diente25-a"></div>
	</td>
	<td class="noborde">
		<div id="visualization26a">
		</div>
		<div id="diente26-a">
			<div id="furca26"></div>
		</div>
	</td>
	<td class="noborde">
		<div id="visualization27a"></div>
		<div id="diente27-a">
			<div id="furca27">
			</div>
		</div>
	</td>
	<td class="noborde">
		<div id="visualization28a"></div>
		<div id="diente28-a">
			<div id="furca28">
			</div>
		</div>
	</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr>
	<td>
		<table id="tabla-3">
			<tbody>
				<tr>
					<td class="titulo">Palatino</td>
					<td class="noborde">
						<div id="lineas-gr-inf"></div>
						<div id="visualization18b"></div>
						<div id="diente18b-a">
							<div id="furca18-a"></div>
							<div id="furca18-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization17b"></div>
						<div id="diente17b-a">
							<div id="furca17-a"></div>
							<div id="furca17-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization16b"></div>
						<div id="diente16b-a">
							<div id="furca16-a"></div>
							<div id="furca16-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization15b"></div>
						<div id="diente15b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization14b"></div>
						<div id="diente14b-a">
							<div id="furca14-a"></div>
							<div id="furca14-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization13b"></div>
						<div id="diente13b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization12b"></div>
						<div id="diente12b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization11b"></div>
						<div id="diente11b-a"></div>
					</td>
				</tr>
				<tr>
					<td class="titulo">Profundidad de sondaje</td>
					<td class="borde">
						<input type="text" id="ps18b-a" name="ps18b-a" data-formulario="yes2" value="0" tabindex="145" />
						<input type="text" id="ps18b-b" name="ps18b-b" data-formulario="yes2" value="0" tabindex="146" />
						<input type="text" id="ps18b-c" name="ps18b-c" data-formulario="yes2" value="0" tabindex="147" />
					</td>
					<td class="borde">
						<input type="text" id="ps17b-a" name="ps17b-a" data-formulario="yes2" value="0" tabindex="148" />
						<input type="text" id="ps17b-b" name="ps17b-b" data-formulario="yes2" value="0" tabindex="149" />
						<input type="text" id="ps17b-c" name="ps17b-c" data-formulario="yes2" value="0" tabindex="150" />
					</td>
					<td class="borde">
						<input type="text" id="ps16b-a" name="ps16b-a" data-formulario="yes2" value="0" tabindex="151" />
						<input type="text" id="ps16b-b" name="ps16b-b" data-formulario="yes2" value="0" tabindex="152" />
						<input type="text" id="ps16b-c" name="ps16b-c" data-formulario="yes2" value="0" tabindex="153" />
					</td>
					<td class="borde">
						<input type="text" id="ps15b-a" name="ps15b-a" data-formulario="yes2" value="0" tabindex="154" />
						<input type="text" id="ps15b-b" name="ps15b-b" data-formulario="yes2" value="0" tabindex="155" />
						<input type="text" id="ps15b-c" name="ps15b-c" data-formulario="yes2" value="0" tabindex="156" />
					</td>
					<td class="borde">
						<input type="text" id="ps14b-a" name="ps14b-a" data-formulario="yes2" value="0" tabindex="157" />
						<input type="text" id="ps14b-b" name="ps14b-b" data-formulario="yes2" value="0" tabindex="158" />
						<input type="text" id="ps14b-c" name="ps14b-c" data-formulario="yes2" value="0" tabindex="159" />
					</td>
					<td class="borde">
						<input type="text" id="ps13b-a" name="ps13b-a" data-formulario="yes2" value="0" tabindex="160" />
						<input type="text" id="ps13b-b" name="ps13b-b" data-formulario="yes2" value="0" tabindex="161" />
						<input type="text" id="ps13b-c" name="ps13b-c" data-formulario="yes2" value="0" tabindex="162" />
					</td>
					<td class="borde">
						<input type="text" id="ps12b-a" name="ps12b-a" data-formulario="yes2" value="0" tabindex="163" />
						<input type="text" id="ps12b-b" name="ps12b-b" data-formulario="yes2" value="0" tabindex="164" />
						<input type="text" id="ps12b-c" name="ps12b-c" data-formulario="yes2" value="0" tabindex="165" />
					</td>
					<td class="borde">
						<input type="text" id="ps11b-a" name="ps11b-a" data-formulario="yes2" value="0" tabindex="166" />
						<input type="text" id="ps11b-b" name="ps11b-b" data-formulario="yes2" value="0" tabindex="167" />
						<input type="text" id="ps11b-c" name="ps11b-c" data-formulario="yes2" value="0" tabindex="168" />
					</td>
				</tr>

				<tr>
					<td class="titulo">Margen gingival</td>
					<td class="borde">
						<input type="text" id="mg18b-a" name="mg18b-a" data-formulario="yes2" value="0" tabindex="193" oninput="validarGingival(this)" />
						<input type="text" id="mg18b-b" name="mg18b-b" data-formulario="yes2" value="0" tabindex="194" oninput="validarGingival(this)" />
						<input type="text" id="mg18b-c" name="mg18b-c" data-formulario="yes2" value="0" tabindex="195" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg17b-a" name="mg17b-a" data-formulario="yes2" value="0" tabindex="196" oninput="validarGingival(this)" />
						<input type="text" id="mg17b-b" name="mg17b-b" data-formulario="yes2" value="0" tabindex="197" oninput="validarGingival(this)" />
						<input type="text" id="mg17b-c" name="mg17b-c" data-formulario="yes2" value="0" tabindex="198" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg16b-a" name="mg16b-a" data-formulario="yes2" value="0" tabindex="199" oninput="validarGingival(this)" />
						<input type="text" id="mg16b-b" name="mg16b-b" data-formulario="yes2" value="0" tabindex="200" oninput="validarGingival(this)" />
						<input type="text" id="mg16b-c" name="mg16b-c" data-formulario="yes2" value="0" tabindex="201" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg15b-a" name="mg15b-a" data-formulario="yes2" value="0" tabindex="202" oninput="validarGingival(this)" />
						<input type="text" id="mg15b-b" name="mg15b-b" data-formulario="yes2" value="0" tabindex="203" oninput="validarGingival(this)" />
						<input type="text" id="mg15b-c" name="mg15b-c" data-formulario="yes2" value="0" tabindex="204" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg14b-a" name="mg14b-a" data-formulario="yes2" value="0" tabindex="205" oninput="validarGingival(this)" />
						<input type="text" id="mg14b-b" name="mg14b-b" data-formulario="yes2" value="0" tabindex="206" oninput="validarGingival(this)" />
						<input type="text" id="mg14b-c" name="mg14b-c" data-formulario="yes2" value="0" tabindex="207" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg13b-a" name="mg13b-a" data-formulario="yes2" value="0" tabindex="208" oninput="validarGingival(this)" />
						<input type="text" id="mg13b-b" name="mg13b-b" data-formulario="yes2" value="0" tabindex="209" oninput="validarGingival(this)" />
						<input type="text" id="mg13b-c" name="mg13b-c" data-formulario="yes2" value="0" tabindex="210" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg12b-a" name="mg12b-a" data-formulario="yes2" value="0" tabindex="211" oninput="validarGingival(this)" />
						<input type="text" id="mg12b-b" name="mg12b-b" data-formulario="yes2" value="0" tabindex="212" oninput="validarGingival(this)" />
						<input type="text" id="mg12b-c" name="mg12b-c" data-formulario="yes2" value="0" tabindex="213" oninput="validarGingival(this)" />
					</td>
					<td class="borde">
						<input type="text" id="mg11b-a" name="mg11b-a" data-formulario="yes2" value="0" tabindex="214" oninput="validarGingival(this)" />
						<input type="text" id="mg11b-b" name="mg11b-b" data-formulario="yes2" value="0" tabindex="215" oninput="validarGingival(this)" />
						<input type="text" id="mg11b-c" name="mg11b-c" data-formulario="yes2" value="0" tabindex="216" oninput="validarGingival(this)" />
					</td>
				</tr>

				<tr>
					<td class="titulo">Placa</td>
					<td class="borde">
						<div id="p18b-a">
							<div class="custom-select-placa">
								<select id="placa18b-a" name="placa18b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p18b-b">
							<div class="custom-select-placa">
								<select id="placa18b-b" name="placa18b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p18b-c">
							<div class="custom-select-placa">
								<select id="placa18b-c" name="placa18b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p17b-a">
							<div class="custom-select-placa">
								<select id="placa17b-a" name="placa17b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p17b-b">
							<div class="custom-select-placa">
								<select id="placa17b-b" name="placa17b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p17b-c">
							<div class="custom-select-placa">
								<select id="placa17b-c" name="placa17b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p16b-a">
							<div class="custom-select-placa">
								<select id="placa16b-a" name="placa16b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p16b-b">
							<div class="custom-select-placa">
								<select id="placa16b-b" name="placa16b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p16b-c">
							<div class="custom-select-placa">
								<select id="placa16b-c" name="placa16b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p15b-a">
							<div class="custom-select-placa">
								<select id="placa15b-a" name="placa15b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p15b-b">
							<div class="custom-select-placa">
								<select id="placa15b-b" name="placa15b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p15b-c">
							<div class="custom-select-placa">
								<select id="placa15b-c" name="placa15b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p14b-a">
							<div class="custom-select-placa">
								<select id="placa14b-a" name="placa14b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p14b-b">
							<div class="custom-select-placa">
								<select id="placa14b-b" name="placa14b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p14b-c">
							<div class="custom-select-placa">
								<select id="placa14b-c" name="placa14b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p13b-a">
							<div class="custom-select-placa">
								<select id="placa13b-a" name="placa13b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p13b-b">
							<div class="custom-select-placa">
								<select id="placa13b-b" name="placa13b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p13b-c">
							<div class="custom-select-placa">
								<select id="placa13b-c" name="placa13b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p12b-a">
							<div class="custom-select-placa">
								<select id="placa12b-a" name="placa12b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p12b-b">
							<div class="custom-select-placa">
								<select id="placa12b-b" name="placa12b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p12b-c">
							<div class="custom-select-placa">
								<select id="placa12b-c" name="placa12b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p11b-a">
							<div class="custom-select-placa">
								<select id="placa11b-a" name="placa11b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p11b-b">
							<div class="custom-select-placa">
								<select id="placa11b-b" name="placa11b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p11b-c">
							<div class="custom-select-placa">
								<select id="placa11b-c" name="placa11b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="titulo">Sangrado / Supuración</td>
					<td class="borde">
						<div id="s18b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup18b-a" name="san_sup18b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s18b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup18b-b" name="san_sup18b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s18b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup18b-c" name="san_sup18b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>



					<td class="borde">
						<div id="s17b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup17b-a" name="san_sup17b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s17b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup17b-b" name="san_sup17b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s17b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup17b-c" name="san_sup17b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s16b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup16b-a" name="san_sup16b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s16b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup16b-b" name="san_sup16b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s16b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup16b-c" name="san_sup16b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s15b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup15b-a" name="san_sup15b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s15b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup15b-b" name="san_sup15b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s15b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup15b-c" name="san_sup15b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s14b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup14b-a" name="san_sup14b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s14b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup14b-b" name="san_sup14b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s14b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup14b-c" name="san_sup14b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s13b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup13b-a" name="san_sup13b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s13b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup13b-b" name="san_sup13b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s13b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup13b-c" name="san_sup13b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s12b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup12b-a" name="san_sup12b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s12b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup12b-b" name="san_sup12b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s12b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup12b-c" name="san_sup12b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s11b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup11b-a" name="san_sup11b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s11b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup11b-b" name="san_sup11b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s11b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup11b-c" name="san_sup11b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

				</tr>

				<tr>
					<td class="titulo">Furca</td>
					<td class="borde">
						<div id="f18b-a"> <select id="Select_f18a" name="Furca_f18a" data-formulario="yes" onchange="ActualizarFurca(this,'f18a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f18b-b"> <select id="Select_f18b" name="Furca_f18b" data-formulario="yes" onchange="ActualizarFurca(this,'f18b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f17b-a"> <select id="Select_f17a" name="Furca_f17a" data-formulario="yes" onchange="ActualizarFurca(this,'f17a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f17b-b"> <select id="Select_f17b" name="Furca_f17b" data-formulario="yes" onchange="ActualizarFurca(this,'f17b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f16b-a"> <select id="Select_f16a" name="Furca_f16a" data-formulario="yes" onchange="ActualizarFurca(this,'f16a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f16b-b"> <select id="Select_f16b" name="Furca_f16b" data-formulario="yes" onchange="ActualizarFurca(this,'f16b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde"></td>
					<td class="borde">
						<div id="f14b-a"> <select id="Select_f14a" name="Furca_f14a" data-formulario="yes" onchange="ActualizarFurca(this,'f14a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f14b-b"> <select id="Select_f14b" name="Furca_f14b" data-formulario="yes" onchange="ActualizarFurca(this,'f14b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
				</tr>

				<tr>
					<td class="titulo">Nota</td>
					<td class="borde"><input type="text" id="n18" name="n18" data-formulario="yes" tabindex="241"></td>
					<td class="borde"><input type="text" id="n17" name="n17" data-formulario="yes" tabindex="242"></td>
					<td class="borde"><input type="text" id="n16" name="n16" data-formulario="yes" tabindex="243"></td>
					<td class="borde"><input type="text" id="n15" name="n15" data-formulario="yes" tabindex="244"></td>
					<td class="borde"><input type="text" id="n14" name="n14" data-formulario="yes" tabindex="245"></td>
					<td class="borde"><input type="text" id="n13" name="n13" data-formulario="yes" tabindex="246"></td>
					<td class="borde"><input type="text" id="n12" name="n12" data-formulario="yes" tabindex="247"></td>
					<td class="borde"><input type="text" id="n11" name="n11" data-formulario="yes" tabindex="248"></td>
				</tr>
			</tbody>
		</table>
	</td>
	<td>
		<table id="tabla-4">
			<tbody>
				<tr>
					<td class="noborde">
						<div id="lineas-gr-inf"></div>
						<div id="visualization21b"></div>
						<div id="diente21b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization22b"></div>
						<div id="diente22b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization23b"></div>
						<div id="diente23b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization24b"></div>
						<div id="diente24b-a">
							<div id="furca24-a"></div>
							<div id="furca24-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization25b"></div>
						<div id="diente25b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization26b"></div>
						<div id="diente26b-a">
							<div id="furca26-a"></div>
							<div id="furca26-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization27b"></div>
						<div id="diente27b-a">
							<div id="furca27-a"></div>
							<div id="furca27-b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization28b"></div>
						<div id="diente28b-a">
							<div id="furca28-a">
							</div>
							<div id="furca28-b"></div>
						</div>
					</td>
				</tr>
				<tr>
					<td class="borde">
						<input type="text" id="ps21b-a" name="ps21b-a" data-formulario="yes2" value="0" tabindex="169" />
						<input type="text" id="ps21b-b" name="ps21b-b" data-formulario="yes2" value="0" tabindex="170" />
						<input type="text" id="ps21b-c" name="ps21b-c" data-formulario="yes2" value="0" tabindex="171" />
					</td>
					<td class="borde">
						<input type="text" id="ps22b-a" name="ps22b-a" data-formulario="yes2" value="0" tabindex="172" />
						<input type="text" id="ps22b-b" name="ps22b-b" data-formulario="yes2" value="0" tabindex="173" />
						<input type="text" id="ps22b-c" name="ps22b-c" data-formulario="yes2" value="0" tabindex="174" />
					</td>
					<td class="borde">
						<input type="text" id="ps23b-a" name="ps23b-a" data-formulario="yes2" value="0" tabindex="175" />
						<input type="text" id="ps23b-b" name="ps23b-b" data-formulario="yes2" value="0" tabindex="176" />
						<input type="text" id="ps23b-c" name="ps23b-c" data-formulario="yes2" value="0" tabindex="177" />
					</td>
					<td class="borde">
						<input type="text" id="ps24b-a" name="ps24b-a" data-formulario="yes2" value="0" tabindex="178" />
						<input type="text" id="ps24b-b" name="ps24b-b" data-formulario="yes2" value="0" tabindex="179" />
						<input type="text" id="ps24b-c" name="ps24b-c" data-formulario="yes2" value="0" tabindex="180" />
					</td>
					<td class="borde">
						<input type="text" id="ps25b-a" name="ps25b-a" data-formulario="yes2" value="0" tabindex="181" />
						<input type="text" id="ps25b-b" name="ps25b-b" data-formulario="yes2" value="0" tabindex="182" />
						<input type="text" id="ps25b-c" name="ps25b-c" data-formulario="yes2" value="0" tabindex="183" />
					</td>
					<td class="borde">
						<input type="text" id="ps26b-a" name="ps26b-a" data-formulario="yes2" value="0" tabindex="184" />
						<input type="text" id="ps26b-b" name="ps26b-b" data-formulario="yes2" value="0" tabindex="185" />
						<input type="text" id="ps26b-c" name="ps26b-c" data-formulario="yes2" value="0" tabindex="186" />
					</td>
					<td class="borde">
						<input type="text" id="ps27b-a" name="ps27b-a" data-formulario="yes2" value="0" tabindex="187" />
						<input type="text" id="ps27b-b" name="ps27b-b" data-formulario="yes2" value="0" tabindex="188" />
						<input type="text" id="ps27b-c" name="ps27b-c" data-formulario="yes2" value="0" tabindex="189" />
					</td>
					<td class="borde">
						<input type="text" id="ps28b-a" name="ps28b-a" data-formulario="yes2" value="0" tabindex="190" />
						<input type="text" id="ps28b-b" name="ps28b-b" data-formulario="yes2" value="0" tabindex="191" />
						<input type="text" id="ps28b-c" name="ps28b-c" data-formulario="yes2" value="0" tabindex="192" />
					</td>
				</tr>

				<tr>
					<td class="borde">
						<input type="text" id="mg21b-a" name="mg21b-a" data-formulario="yes2" value="0" tabindex="217" />
						<input type="text" id="mg21b-b" name="mg21b-b" data-formulario="yes2" value="0" tabindex="218" />
						<input type="text" id="mg21b-c" name="mg21b-c" data-formulario="yes2" value="0" tabindex="219" />
					</td>
					<td class="borde">
						<input type="text" id="mg22b-a" name="mg22b-a" data-formulario="yes2" value="0" tabindex="220" />
						<input type="text" id="mg22b-b" name="mg22b-b" data-formulario="yes2" value="0" tabindex="221" />
						<input type="text" id="mg22b-c" name="mg22b-c" data-formulario="yes2" value="0" tabindex="222" />
					</td>
					<td class="borde">
						<input type="text" id="mg23b-a" name="mg23b-a" data-formulario="yes2" value="0" tabindex="223" />
						<input type="text" id="mg23b-b" name="mg23b-b" data-formulario="yes2" value="0" tabindex="224" />
						<input type="text" id="mg23b-c" name="mg23b-c" data-formulario="yes2" value="0" tabindex="225" />
					</td>
					<td class="borde">
						<input type="text" id="mg24b-a" name="mg24b-a" data-formulario="yes2" value="0" tabindex="226" />
						<input type="text" id="mg24b-b" name="mg24b-b" data-formulario="yes2" value="0" tabindex="227" />
						<input type="text" id="mg24b-c" name="mg24b-c" data-formulario="yes2" value="0" tabindex="228" />
					</td>
					<td class="borde">
						<input type="text" id="mg25b-a" name="mg25b-a" data-formulario="yes2" value="0" tabindex="229" />
						<input type="text" id="mg25b-b" name="mg25b-b" data-formulario="yes2" value="0" tabindex="230" />
						<input type="text" id="mg25b-c" name="mg25b-c" data-formulario="yes2" value="0" tabindex="231" />
					</td>
					<td class="borde">
						<input type="text" id="mg26b-a" name="mg26b-a" data-formulario="yes2" value="0" tabindex="232" />
						<input type="text" id="mg26b-b" name="mg26b-b" data-formulario="yes2" value="0" tabindex="233" />
						<input type="text" id="mg26b-c" name="mg26b-c" data-formulario="yes2" value="0" tabindex="234" />
					</td>
					<td class="borde">
						<input type="text" id="mg27b-a" name="mg27b-a" data-formulario="yes2" value="0" tabindex="235" />
						<input type="text" id="mg27b-b" name="mg27b-b" data-formulario="yes2" value="0" tabindex="236" />
						<input type="text" id="mg27b-c" name="mg27b-c" data-formulario="yes2" value="0" tabindex="237" />
					</td>
					<td class="borde">
						<input type="text" id="mg28b-a" name="mg28b-a" data-formulario="yes2" value="0" tabindex="238" />
						<input type="text" id="mg28b-b" name="mg28b-b" data-formulario="yes2" value="0" tabindex="239" />
						<input type="text" id="mg28b-c" name="mg28b-c" data-formulario="yes2" value="0" tabindex="240" />
					</td>
				</tr>

				<tr>
					<td class="borde">
						<div id="p21b-a">
							<div class="custom-select-placa">
								<select id="placa21b-a" name="placa21b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p21b-b">
							<div class="custom-select-placa">
								<select id="placa21b-b" name="placa21b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p21b-c">
							<div class="custom-select-placa">
								<select id="placa21b-c" name="placa21b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p22b-a">
							<div class="custom-select-placa">
								<select id="placa22b-a" name="placa22b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p22b-b">
							<div class="custom-select-placa">
								<select id="placa22b-b" name="placa22b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p22b-c">
							<div class="custom-select-placa">
								<select id="placa22b-c" name="placa22b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p23b-a">
							<div class="custom-select-placa">
								<select id="placa23b-a" name="placa23b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p23b-b">
							<div class="custom-select-placa">
								<select id="placa23b-b" name="placa23b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p23b-c">
							<div class="custom-select-placa">
								<select id="placa23b-c" name="placa23b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p24b-a">
							<div class="custom-select-placa">
								<select id="placa24b-a" name="placa24b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p24b-b">
							<div class="custom-select-placa">
								<select id="placa24b-b" name="placa24b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p24b-c">
							<div class="custom-select-placa">
								<select id="placa24b-c" name="placa24b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p25b-a">
							<div class="custom-select-placa">
								<select id="placa25b-a" name="placa25b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p25b-b">
							<div class="custom-select-placa">
								<select id="placa25b-b" name="placa25b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p25b-c">
							<div class="custom-select-placa">
								<select id="placa25b-c" name="placa25b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p26b-a">
							<div class="custom-select-placa">
								<select id="placa26b-a" name="placa26b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p26b-b">
							<div class="custom-select-placa">
								<select id="placa26b-b" name="placa26b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p26b-c">
							<div class="custom-select-placa">
								<select id="placa26b-c" name="placa26b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p27b-a">
							<div class="custom-select-placa">
								<select id="placa27b-a" name="placa27b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p27b-b">
							<div class="custom-select-placa">
								<select id="placa27b-b" name="placa27b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p27b-c">
							<div class="custom-select-placa">
								<select id="placa27b-c" name="placa27b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p28b-a">
							<div class="custom-select-placa">
								<select id="placa28b-a" name="placa28b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p28b-b">
							<div class="custom-select-placa">
								<select id="placa28b-b" name="placa28b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p28b-c">
							<div class="custom-select-placa">
								<select id="placa28b-c" name="placa28b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="borde">
						<div id="s21b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup21b-a" name="san_sup21b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s21b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup21b-b" name="san_sup21b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s21b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup21b-c" name="san_sup21b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s22b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup22b-a" name="san_sup22b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s22b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup22b-b" name="san_sup22b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s22b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup22b-c" name="san_sup22b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s23b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup23b-a" name="san_sup23b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s23b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup23b-b" name="san_sup23b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s23b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup23b-c" name="san_sup23b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s24b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup24b-a" name="san_sup24b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s24b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup24b-b" name="san_sup24b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s24b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup24b-c" name="san_sup24b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s25b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup25b-a" name="san_sup25b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s25b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup25b-b" name="san_sup25b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s25b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup25b-c" name="san_sup25b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s26b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup26b-a" name="san_sup26b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s26b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup26b-b" name="san_sup26b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s26b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup26b-c" name="san_sup26b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s27b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup27b-a" name="san_sup27b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s27b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup27b-b" name="san_sup27b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s27b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup27b-c" name="san_sup27b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s28b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup28b-a" name="san_sup28b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s28b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup28b-b" name="san_sup28b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s28b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup28b-c" name="san_sup28b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

				</tr>

				<tr>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde">
						<div id="f24b-a"> <select id="Select_f24a" name="Furca_f24a" data-formulario="yes" onchange="ActualizarFurca(this,'f24a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f24b-b"> <select id="Select_f24b" name="Furca_f24b" data-formulario="yes" onchange="ActualizarFurca(this,'f24b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde"></td>
					<td class="borde">
						<div id="f26b-a"> <select id="Select_f26a" name="Furca_f26a" data-formulario="yes" onchange="ActualizarFurca(this,'f26a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f26b-b"> <select id="Select_f26b" name="Furca_f26b" data-formulario="yes" onchange="ActualizarFurca(this,'f26b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f27b-a"> <select id="Select_f27a" name="Furca_f27a" data-formulario="yes" onchange="ActualizarFurca(this,'f27a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f27b-b"> <select id="Select_f27b" name="Furca_f27b" data-formulario="yes" onchange="ActualizarFurca(this,'f27b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f28b-a"> <select id="Select_f28a" name="Furca_f28a" data-formulario="yes" onchange="ActualizarFurca(this,'f28a');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
						<div id="f28b-b"> <select id="Select_f28b" name="Furca_f28b" data-formulario="yes" onchange="ActualizarFurca(this,'f28b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="n21" name="n21" data-formulario="yes" tabindex="249"></td>
					<td class="borde"><input type="text" id="n22" name="n22" data-formulario="yes" tabindex="250"></td>
					<td class="borde"><input type="text" id="n23" name="n23" data-formulario="yes" tabindex="251"></td>
					<td class="borde"><input type="text" id="n24" name="n24" data-formulario="yes" tabindex="252"></td>
					<td class="borde"><input type="text" id="n25" name="n25" data-formulario="yes" tabindex="253"></td>
					<td class="borde"><input type="text" id="n26" name="n26" data-formulario="yes" tabindex="254"></td>
					<td class="borde"><input type="text" id="n27" name="n27" data-formulario="yes" tabindex="255"></td>
					<td class="borde"><input type="text" id="n28" name="n28" data-formulario="yes" tabindex="256"></td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>

<tr>
	<td colspan="2">
		<table id="separador">
			<tbody>
				<tr>
					<td>INFERIOR</td>
				</tr>
			</tbody>
		</table>
	</td>
</tr>

<tr>
	<td>
		<table id="tabla-5">
			<tbody>
				<tr>
					<td class="titulo">Nota</td>
					<td class="borde"><input type="text" id="n48" name="n48" data-formulario="yes" tabindex="257"></td>
					<td class="borde"><input type="text" id="n47" name="n47" data-formulario="yes" tabindex="258"></td>
					<td class="borde"><input type="text" id="n46" name="n46" data-formulario="yes" tabindex="259"></td>
					<td class="borde"><input type="text" id="n45" name="n45" data-formulario="yes" tabindex="260"></td>
					<td class="borde"><input type="text" id="n44" name="n44" data-formulario="yes" tabindex="261"></td>
					<td class="borde"><input type="text" id="n43" name="n43" data-formulario="yes" tabindex="262"></td>
					<td class="borde"><input type="text" id="n42" name="n42" data-formulario="yes" tabindex="263"></td>
					<td class="borde"><input type="text" id="n41" name="n41" data-formulario="yes" tabindex="264"></td>
				</tr>
				<tr>
					<td class="titulo">Furca</td>
					<td class="borde">
						<div id="f48"> <select id="Select_f48" name="Furca_f48" data-formulario="yes" onchange="ActualizarFurca(this,'f48');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f47"> <select id="Select_f47" name="Furca_f47" data-formulario="yes" onchange="ActualizarFurca(this,'f47');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f46"> <select id="Select_f46" name="Furca_f46" data-formulario="yes" onchange="ActualizarFurca(this,'f46');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
				</tr>

				<tr>
					<td class="titulo">Sangrado / Supuración</td>
					<td class="borde">
						<div id="s48-a">
							<div class="custom-select-sangrado">
								<select id="san_sup48-a" name="san_sup48-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s48-b">
							<div class="custom-select-sangrado">
								<select id="san_sup48-b" name="san_sup48-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s48-c">
							<div class="custom-select-sangrado">
								<select id="san_sup48-c" name="san_sup48-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s47-a">
							<div class="custom-select-sangrado">
								<select id="san_sup47-a" name="san_sup47-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s47-b">
							<div class="custom-select-sangrado">
								<select id="san_sup47-b" name="san_sup47-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s47-c">
							<div class="custom-select-sangrado">
								<select id="san_sup47-c" name="san_sup47-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s46-a">
							<div class="custom-select-sangrado">
								<select id="san_sup46-a" name="san_sup46-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s46-b">
							<div class="custom-select-sangrado">
								<select id="san_sup46-b" name="san_sup46-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s46-c">
							<div class="custom-select-sangrado">
								<select id="san_sup46-c" name="san_sup46-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s45-a">
							<div class="custom-select-sangrado">
								<select id="san_sup45-a" name="san_sup45-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s45-b">
							<div class="custom-select-sangrado">
								<select id="san_sup45-b" name="san_sup45-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s45-c">
							<div class="custom-select-sangrado">
								<select id="san_sup45-c" name="san_sup45-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s44-a">
							<div class="custom-select-sangrado">
								<select id="san_sup44-a" name="san_sup44-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s44-b">
							<div class="custom-select-sangrado">
								<select id="san_sup44-b" name="san_sup44-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s44-c">
							<div class="custom-select-sangrado">
								<select id="san_sup44-c" name="san_sup44-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s43-a">
							<div class="custom-select-sangrado">
								<select id="san_sup43-a" name="san_sup43-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s43-b">
							<div class="custom-select-sangrado">
								<select id="san_sup43-b" name="san_sup43-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s43-c">
							<div class="custom-select-sangrado">
								<select id="san_sup43-c" name="san_sup43-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s42-a">
							<div class="custom-select-sangrado">
								<select id="san_sup42-a" name="san_sup42-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s42-b">
							<div class="custom-select-sangrado">
								<select id="san_sup42-b" name="san_sup42-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s42-c">
							<div class="custom-select-sangrado">
								<select id="san_sup42-c" name="san_sup42-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

					<td class="borde">
						<div id="s41-a">
							<div class="custom-select-sangrado">
								<select id="san_sup41-a" name="san_sup41-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s41-b">
							<div class="custom-select-sangrado">
								<select id="san_sup41-b" name="san_sup41-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s41-c">
							<div class="custom-select-sangrado">
								<select id="san_sup41-c" name="san_sup41-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>


				</tr>

				<tr>
					<td class="titulo">Placa</td>
					<td class="borde">
						<div id="p48-a">
							<div class="custom-select-placa">
								<select id="placa48-a" name="placa48-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p48-b">
							<div class="custom-select-placa">
								<select id="placa48-b" name="placa48-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p48-c">
							<div class="custom-select-placa">
								<select id="placa48-c" name="placa48-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p47-a">
							<div class="custom-select-placa">
								<select id="placa47-a" name="placa47-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p47-b">
							<div class="custom-select-placa">
								<select id="placa47-b" name="placa47-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p47-c">
							<div class="custom-select-placa">
								<select id="placa47-c" name="placa47-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p46-a">
							<div class="custom-select-placa">
								<select id="placa46-a" name="placa46-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p46-b">
							<div class="custom-select-placa">
								<select id="placa46-b" name="placa46-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p46-c">
							<div class="custom-select-placa">
								<select id="placa46-c" name="placa46-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p45-a">
							<div class="custom-select-placa">
								<select id="placa45-a" name="placa45-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p45-b">
							<div class="custom-select-placa">
								<select id="placa45-b" name="placa45-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p45-c">
							<div class="custom-select-placa">
								<select id="placa45-c" name="placa45-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p44-a">
							<div class="custom-select-placa">
								<select id="placa44-a" name="placa44-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p44-b">
							<div class="custom-select-placa">
								<select id="placa44-b" name="placa44-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p44-c">
							<div class="custom-select-placa">
								<select id="placa44-c" name="placa44-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p43-a">
							<div class="custom-select-placa">
								<select id="placa43-a" name="placa43-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p43-b">
							<div class="custom-select-placa">
								<select id="placa43-b" name="placa43-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p43-c">
							<div class="custom-select-placa">
								<select id="placa43-c" name="placa43-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p42-a">
							<div class="custom-select-placa">
								<select id="placa42-a" name="placa42-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p42-b">
							<div class="custom-select-placa">
								<select id="placa42-b" name="placa42-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p42-c">
							<div class="custom-select-placa">
								<select id="placa42-c" name="placa42-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p41-a">
							<div class="custom-select-placa">
								<select id="placa41-a" name="placa41-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p41-b">
							<div class="custom-select-placa">
								<select id="placa41-b" name="placa41-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p41-c">
							<div class="custom-select-placa">
								<select id="placa41-c" name="placa41-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="titulo">Margen gingival</td>
					<td class="borde">
						<input oninput="validarGingival(this)" type="text" id="mg48-a" name="mg48-a" data-formulario="yes2" value="0" onchange="cargar48a();getDefectos();rangoNumeroMargen(&#39;mg48-a&#39;);cargar48a();" tabindex="297">
						<input oninput="validarGingival(this)" type="text" id="mg48-b" name="mg48-b" data-formulario="yes2" value="0" onchange="cargar48a();getDefectos();rangoNumeroMargen(&#39;mg48-b&#39;);cargar48a();" tabindex="298">
						<input oninput="validarGingival(this)" type="text" id="mg48-c" name="mg48-c" data-formulario="yes2" value="0" onchange="cargar48a();getDefectos();rangoNumeroMargen(&#39;mg48-c&#39;);cargar48a();" tabindex="299">
					</td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg47-a" name="mg47-a" data-formulario="yes2" value="0" onchange="cargar47a();getDefectos();rangoNumeroMargen(&#39;mg47-a&#39;);cargar47a();" tabindex="300"><input oninput="validarGingival(this)" type="text" id="mg47-b" name="mg47-b" data-formulario="yes2" value="0" onchange="cargar47a();getDefectos();rangoNumeroMargen(&#39;mg47-b&#39;);cargar47a();" tabindex="301"><input oninput="validarGingival(this)" type="text" id="mg47-c" name="mg47-c" data-formulario="yes2" value="0" onchange="cargar47a();getDefectos();rangoNumeroMargen(&#39;mg47-c&#39;);cargar47a();" tabindex="302"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg46-a" name="mg46-a" data-formulario="yes2" value="0" onchange="cargar46a();getDefectos();rangoNumeroMargen(&#39;mg46-a&#39;);cargar46a();" tabindex="303"><input oninput="validarGingival(this)" type="text" id="mg46-b" name="mg46-b" data-formulario="yes2" value="0" onchange="cargar46a();getDefectos();rangoNumeroMargen(&#39;mg46-b&#39;);cargar46a();" tabindex="304"><input oninput="validarGingival(this)" type="text" id="mg46-c" name="mg46-c" data-formulario="yes2" value="0" onchange="cargar46a();getDefectos();rangoNumeroMargen(&#39;mg46-c&#39;);cargar46a();" tabindex="305"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg45-a" name="mg45-a" data-formulario="yes2" value="0" onchange="cargar45a();getDefectos();rangoNumeroMargen(&#39;mg45-a&#39;);cargar45a();" tabindex="306"><input oninput="validarGingival(this)" type="text" id="mg45-b" name="mg45-b" data-formulario="yes2" value="0" onchange="cargar45a();getDefectos();rangoNumeroMargen(&#39;mg45-b&#39;);cargar45a();" tabindex="307"><input oninput="validarGingival(this)" type="text" id="mg45-c" name="mg45-c" data-formulario="yes2" value="0" onchange="cargar45a();getDefectos();rangoNumeroMargen(&#39;mg45-c&#39;);cargar45a();" tabindex="308"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg44-a" name="mg44-a" data-formulario="yes2" value="0" onchange="cargar44a();getDefectos();rangoNumeroMargen(&#39;mg44-a&#39;);cargar44a();" tabindex="309"><input oninput="validarGingival(this)" type="text" id="mg44-b" name="mg44-b" data-formulario="yes2" value="0" onchange="cargar44a();getDefectos();rangoNumeroMargen(&#39;mg44-b&#39;);cargar44a();" tabindex="310"><input oninput="validarGingival(this)" type="text" id="mg44-c" name="mg44-c" data-formulario="yes2" value="0" onchange="cargar44a();getDefectos();rangoNumeroMargen(&#39;mg44-c&#39;);cargar44a();" tabindex="311"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg43-a" name="mg43-a" data-formulario="yes2" value="0" onchange="cargar43a();getDefectos();rangoNumeroMargen(&#39;mg43-a&#39;);cargar43a();" tabindex="312"><input oninput="validarGingival(this)" type="text" id="mg43-b" name="mg43-b" data-formulario="yes2" value="0" onchange="cargar43a();getDefectos();rangoNumeroMargen(&#39;mg43-b&#39;);cargar43a();" tabindex="313"><input oninput="validarGingival(this)" type="text" id="mg43-c" name="mg43-c" data-formulario="yes2" value="0" onchange="cargar43a();getDefectos();rangoNumeroMargen(&#39;mg43-c&#39;);cargar43a();" tabindex="314"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg42-a" name="mg42-a" data-formulario="yes2" value="0" onchange="cargar42a();getDefectos();rangoNumeroMargen(&#39;mg42-a&#39;);cargar42a();" tabindex="315"><input oninput="validarGingival(this)" type="text" id="mg42-b" name="mg42-b" data-formulario="yes2" value="0" onchange="cargar42a();getDefectos();rangoNumeroMargen(&#39;mg42-b&#39;);cargar42a();" tabindex="316"><input oninput="validarGingival(this)" type="text" id="mg42-c" name="mg42-c" data-formulario="yes2" value="0" onchange="cargar42a();getDefectos();rangoNumeroMargen(&#39;mg42-c&#39;);cargar42a();" tabindex="317"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg41-a" name="mg41-a" data-formulario="yes2" value="0" onchange="cargar41a();getDefectos();rangoNumeroMargen(&#39;mg41-a&#39;);cargar41a();" tabindex="318"><input oninput="validarGingival(this)" type="text" id="mg41-b" name="mg41-b" data-formulario="yes2" value="0" onchange="cargar41a();getDefectos();rangoNumeroMargen(&#39;mg41-b&#39;);cargar41a();" tabindex="319"><input oninput="validarGingival(this)" type="text" id="mg41-c" name="mg41-c" data-formulario="yes2" value="0" onchange="cargar41a();getDefectos();rangoNumeroMargen(&#39;mg41-c&#39;);cargar41a();" tabindex="320"></td>
				</tr>

				<tr>
					<td class="titulo">Profundidad de sondaje</td>
					<td class="borde"><input type="text" id="ps48-a" name="ps48-a" data-formulario="yes2" value="0" onchange="cargar48a();getDefectos();" tabindex="345" style="color: black;"><input type="text" id="ps48-b" name="ps48-b" data-formulario="yes2" value="0" onchange="cargar48a();getDefectos();" tabindex="346" style="color: black;"><input type="text" id="ps48-c" name="ps48-c" data-formulario="yes2" value="0" onchange="cargar48a();getDefectos();" tabindex="347" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps47-a" name="ps47-a" data-formulario="yes2" value="0" onchange="cargar47a();getDefectos();" tabindex="348" style="color: black;"><input type="text" id="ps47-b" name="ps47-b" data-formulario="yes2" value="0" onchange="cargar47a();getDefectos();" tabindex="349" style="color: black;"><input type="text" id="ps47-c" name="ps47-c" data-formulario="yes2" value="0" onchange="cargar47a();getDefectos();" tabindex="350" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps46-a" name="ps46-a" data-formulario="yes2" value="0" onchange="cargar46a();getDefectos();" tabindex="351" style="color: black;"><input type="text" id="ps46-b" name="ps46-b" data-formulario="yes2" value="0" onchange="cargar46a();getDefectos();" tabindex="352" style="color: black;"><input type="text" id="ps46-c" name="ps46-c" data-formulario="yes2" value="0" onchange="cargar46a();getDefectos();" tabindex="353" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps45-a" name="ps45-a" data-formulario="yes2" value="0" onchange="cargar45a();getDefectos();" tabindex="354" style="color: black;"><input type="text" id="ps45-b" name="ps45-b" data-formulario="yes2" value="0" onchange="cargar45a();getDefectos();" tabindex="355" style="color: black;"><input type="text" id="ps45-c" name="ps45-c" data-formulario="yes2" value="0" onchange="cargar45a();getDefectos();" tabindex="356" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps44-a" name="ps44-a" data-formulario="yes2" value="0" onchange="cargar44a();getDefectos();" tabindex="357" style="color: black;"><input type="text" id="ps44-b" name="ps44-b" data-formulario="yes2" value="0" onchange="cargar44a();getDefectos();" tabindex="358" style="color: black;"><input type="text" id="ps44-c" name="ps44-c" data-formulario="yes2" value="0" onchange="cargar44a();getDefectos();" tabindex="359" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps43-a" name="ps43-a" data-formulario="yes2" value="0" onchange="cargar43a();getDefectos();" tabindex="400" style="color: black;"><input type="text" id="ps43-b" name="ps43-b" data-formulario="yes2" value="0" onchange="cargar43a();getDefectos();" tabindex="401" style="color: black;"><input type="text" id="ps43-c" name="ps43-c" data-formulario="yes2" value="0" onchange="cargar43a();getDefectos();" tabindex="402" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps42-a" name="ps42-a" data-formulario="yes2" value="0" onchange="cargar42a();getDefectos();" tabindex="403" style="color: black;"><input type="text" id="ps42-b" name="ps42-b" data-formulario="yes2" value="0" onchange="cargar42a();getDefectos();" tabindex="404" style="color: black;"><input type="text" id="ps42-c" name="ps42-c" data-formulario="yes2" value="0" onchange="cargar42a();getDefectos();" tabindex="405" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps41-a" name="ps41-a" data-formulario="yes2" value="0" onchange="cargar41a();getDefectos();" tabindex="406" style="color: black;"><input type="text" id="ps41-b" name="ps41-b" data-formulario="yes2" value="0" onchange="cargar41a();getDefectos();" tabindex="407" style="color: black;"><input type="text" id="ps41-c" name="ps41-c" data-formulario="yes2" value="0" onchange="cargar41a();getDefectos();" tabindex="408" style="color: black;"></td>
				</tr>

				<tr>
					<td class="titulo" style="color:#565A5D">Lingual</td>
					<td class="noborde">
						<div id="lineas-gr"></div>
						<div id="visualization48a" style="width: 48px; height: 160px;position:absolute;margin:0 0 0 7px;">
							<div dir="ltr" style="position: relative; width: 48px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="48" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_32">
												<rect x="0" y="0" width="48" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="48" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_32)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L24,97.95161290322581L47.5,97.95161290322581L47.5,97.95161290322581L24,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L24,97.95161290322581L47.5,97.95161290322581L47.5,97.95161290322581L24,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="48" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L24,97.95161290322581L47.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L24,97.95161290322581L47.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 58px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente48-a">
							<div id="furca48"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization47a" style="width: 43px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 43px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="43" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_33">
												<rect x="0" y="0" width="43" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="43" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_33)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L21.5,97.95161290322581L42.5,97.95161290322581L42.5,97.95161290322581L21.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L21.5,97.95161290322581L42.5,97.95161290322581L42.5,97.95161290322581L21.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="43" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L21.5,97.95161290322581L42.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L21.5,97.95161290322581L42.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 53px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente47-a">
							<div id="furca47"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization46a" style="width: 44px; height: 160px;position:absolute;margin:0 0 0 12px;">
							<div dir="ltr" style="position: relative; width: 44px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="44" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_34">
												<rect x="0" y="0" width="44" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="44" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_34)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L22,97.95161290322581L43.5,97.95161290322581L43.5,97.95161290322581L22,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L22,97.95161290322581L43.5,97.95161290322581L43.5,97.95161290322581L22,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="44" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L22,97.95161290322581L43.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L22,97.95161290322581L43.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 54px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente46-a">
							<div id="furca46"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization45a" style="width: 23px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 23px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="23" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_35">
												<rect x="0" y="0" width="23" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="23" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_35)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581L22.5,97.95161290322581L11.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581L22.5,97.95161290322581L11.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="23" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 33px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente45-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization44a" style="width: 25px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 25px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="25" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_36">
												<rect x="0" y="0" width="25" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="25" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_36)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581L24.5,97.95161290322581L12.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581L24.5,97.95161290322581L12.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="25" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 35px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente44-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization43a" style="width: 23px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 23px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="23" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_37">
												<rect x="0" y="0" width="23" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="23" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_37)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581L22.5,97.95161290322581L11.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581L22.5,97.95161290322581L11.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="23" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 33px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente43-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization42a" style="width: 17px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 17px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="17" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_38">
												<rect x="0" y="0" width="17" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="17" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_38)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L8.5,97.95161290322581L16.5,97.95161290322581L16.5,97.95161290322581L8.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L8.5,97.95161290322581L16.5,97.95161290322581L16.5,97.95161290322581L8.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="17" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L8.5,97.95161290322581L16.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L8.5,97.95161290322581L16.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 27px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente42-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization41a" style="width: 18px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 18px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="18" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_39">
												<rect x="0" y="0" width="18" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="18" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_39)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L9,97.95161290322581L17.5,97.95161290322581L17.5,97.95161290322581L9,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L9,97.95161290322581L17.5,97.95161290322581L17.5,97.95161290322581L9,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="18" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L9,97.95161290322581L17.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L9,97.95161290322581L17.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 28px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente41-a"></div>
					</td>
				</tr>


			</tbody>
		</table>
	</td>

	<td>
		<table id="tabla-6">

			<form name="grafico6" id="grafico6" action="http://sepa.es/periodontograma/index.html#"></form>

			<tbody>
				<tr>
					<td class="borde"><input type="text" id="n31" name="n31" data-formulario="yes" tabindex="265"></td>
					<td class="borde"><input type="text" id="n32" name="n32" data-formulario="yes" tabindex="266"></td>
					<td class="borde"><input type="text" id="n33" name="n33" data-formulario="yes" tabindex="267"></td>
					<td class="borde"><input type="text" id="n34" name="n34" data-formulario="yes" tabindex="268"></td>
					<td class="borde"><input type="text" id="n35" name="n35" data-formulario="yes" tabindex="269"></td>
					<td class="borde"><input type="text" id="n36" name="n36" data-formulario="yes" tabindex="270"></td>
					<td class="borde"><input type="text" id="n37" name="n37" data-formulario="yes" tabindex="271"></td>
					<td class="borde"><input type="text" id="n38" name="n38" data-formulario="yes" tabindex="272"></td>
				</tr>

				<tr>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde">
						<div id="f36"> <select id="Select_f36" name="Furca_f36" data-formulario="yes" onchange="ActualizarFurca(this,'f36');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f37"> <select id="Select_f37" name="Furca_f37" data-formulario="yes" onchange="ActualizarFurca(this,'f37');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f38"> <select id="Select_f38" name="Furca_f38" data-formulario="yes" onchange="ActualizarFurca(this,'f38');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
				</tr>

				<tr>
					<td class="borde">
						<div id="s31-a">
							<div class="custom-select-sangrado">
								<select id="san_sup31-a" name="san_sup31-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s31-b">
							<div class="custom-select-sangrado">
								<select id="san_sup31-b" name="san_sup31-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s31-c">
							<div class="custom-select-sangrado">
								<select id="san_sup31-c" name="san_sup31-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s32-a">
							<div class="custom-select-sangrado">
								<select id="san_sup32-a" name="san_sup32-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s32-b">
							<div class="custom-select-sangrado">
								<select id="san_sup32-b" name="san_sup32-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s32-c">
							<div class="custom-select-sangrado">
								<select id="san_sup32-c" name="san_sup32-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s33-a">
							<div class="custom-select-sangrado">
								<select id="san_sup33-a" name="san_sup33-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s33-b">
							<div class="custom-select-sangrado">
								<select id="san_sup33-b" name="san_sup33-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s33-c">
							<div class="custom-select-sangrado">
								<select id="san_sup33-c" name="san_sup33-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s34-a">
							<div class="custom-select-sangrado">
								<select id="san_sup34-a" name="san_sup34-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s34-b">
							<div class="custom-select-sangrado">
								<select id="san_sup34-b" name="san_sup34-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s34-c">
							<div class="custom-select-sangrado">
								<select id="san_sup34-c" name="san_sup34-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s35-a">
							<div class="custom-select-sangrado">
								<select id="san_sup35-a" name="san_sup35-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s35-b">
							<div class="custom-select-sangrado">
								<select id="san_sup35-b" name="san_sup35-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s35-c">
							<div class="custom-select-sangrado">
								<select id="san_sup35-c" name="san_sup35-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s36-a">
							<div class="custom-select-sangrado">
								<select id="san_sup36-a" name="san_sup36-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s36-b">
							<div class="custom-select-sangrado">
								<select id="san_sup36-b" name="san_sup36-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s36-c">
							<div class="custom-select-sangrado">
								<select id="san_sup36-c" name="san_sup36-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s37-a">
							<div class="custom-select-sangrado">
								<select id="san_sup37-a" name="san_sup37-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s37-b">
							<div class="custom-select-sangrado">
								<select id="san_sup37-b" name="san_sup37-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s37-c">
							<div class="custom-select-sangrado">
								<select id="san_sup37-c" name="san_sup37-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s38-a">
							<div class="custom-select-sangrado">
								<select id="san_sup38-a" name="san_sup38-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s38-b">
							<div class="custom-select-sangrado">
								<select id="san_sup38-b" name="san_sup38-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s38-c">
							<div class="custom-select-sangrado">
								<select id="san_sup38-c" name="san_sup38-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

				</tr>

				<tr>
					<td class="borde">
						<div id="p31-a">
							<div class="custom-select-placa">
								<select id="placa31-a" name="placa31-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p31-b">
							<div class="custom-select-placa">
								<select id="placa31-b" name="placa31-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p31-c">
							<div class="custom-select-placa">
								<select id="placa31-c" name="placa31-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p32-a">
							<div class="custom-select-placa">
								<select id="placa32-a" name="placa32-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p32-b">
							<div class="custom-select-placa">
								<select id="placa32-b" name="placa32-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p32-c">
							<div class="custom-select-placa">
								<select id="placa32-c" name="placa32-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p33-a">
							<div class="custom-select-placa">
								<select id="placa33-a" name="placa33-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p33-b">
							<div class="custom-select-placa">
								<select id="placa33-b" name="placa33-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p33-c">
							<div class="custom-select-placa">
								<select id="placa33-c" name="placa33-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p34-a">
							<div class="custom-select-placa">
								<select id="placa34-a" name="placa34-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p34-b">
							<div class="custom-select-placa">
								<select id="placa34-b" name="placa34-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p34-c">
							<div class="custom-select-placa">
								<select id="placa34-c" name="placa34-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p35-a">
							<div class="custom-select-placa">
								<select id="placa35-a" name="placa35-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p35-b">
							<div class="custom-select-placa">
								<select id="placa35-b" name="placa35-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p35-c">
							<div class="custom-select-placa">
								<select id="placa35-c" name="placa35-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p36-a">
							<div class="custom-select-placa">
								<select id="placa36-a" name="placa36-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p36-b">
							<div class="custom-select-placa">
								<select id="placa36-b" name="placa36-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p36-c">
							<div class="custom-select-placa">
								<select id="placa36-c" name="placa36-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p37-a">
							<div class="custom-select-placa">
								<select id="placa37-a" name="placa37-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p37-b">
							<div class="custom-select-placa">
								<select id="placa37-b" name="placa37-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p37-c">
							<div class="custom-select-placa">
								<select id="placa37-c" name="placa37-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p38-a">
							<div class="custom-select-placa">
								<select id="placa38-a" name="placa38-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p38-b">
							<div class="custom-select-placa">
								<select id="placa38-b" name="placa38-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p38-c">
							<div class="custom-select-placa">
								<select id="placa38-c" name="placa38-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="mg31-a" name="mg31-a" data-formulario="yes2" value="0" onchange="cargar31a();getDefectos();rangoNumeroMargen(&#39;mg31-a&#39;);cargar31a();" tabindex="321"><input type="text" id="mg31-b" name="mg31-b" data-formulario="yes2" value="0" onchange="cargar31a();getDefectos();rangoNumeroMargen(&#39;mg31-b&#39;);cargar31a();" tabindex="322"><input type="text" id="mg31-c" name="mg31-c" data-formulario="yes2" value="0" onchange="cargar31a();getDefectos();rangoNumeroMargen(&#39;mg31-c&#39;);cargar31a();" tabindex="323"></td>
					<td class="borde"><input type="text" id="mg32-a" name="mg32-a" data-formulario="yes2" value="0" onchange="cargar32a();getDefectos();rangoNumeroMargen(&#39;mg32-a&#39;);cargar32a();" tabindex="324"><input type="text" id="mg32-b" name="mg32-b" data-formulario="yes2" value="0" onchange="cargar32a();getDefectos();rangoNumeroMargen(&#39;mg32-b&#39;);cargar32a();" tabindex="325"><input type="text" id="mg32-c" name="mg32-c" data-formulario="yes2" value="0" onchange="cargar32a();getDefectos();rangoNumeroMargen(&#39;mg32-c&#39;);cargar32a();" tabindex="326"></td>
					<td class="borde"><input type="text" id="mg33-a" name="mg33-a" data-formulario="yes2" value="0" onchange="cargar33a();getDefectos();rangoNumeroMargen(&#39;mg33-a&#39;);cargar33a();" tabindex="327"><input type="text" id="mg33-b" name="mg33-b" data-formulario="yes2" value="0" onchange="cargar33a();getDefectos();rangoNumeroMargen(&#39;mg33-b&#39;);cargar33a();" tabindex="328"><input type="text" id="mg33-c" name="mg33-c" data-formulario="yes2" value="0" onchange="cargar33a();getDefectos();rangoNumeroMargen(&#39;mg33-c&#39;);cargar33a();" tabindex="329"></td>
					<td class="borde"><input type="text" id="mg34-a" name="mg34-a" data-formulario="yes2" value="0" onchange="cargar34a();getDefectos();rangoNumeroMargen(&#39;mg34-a&#39;);cargar34a();" tabindex="330"><input type="text" id="mg34-b" name="mg34-b" data-formulario="yes2" value="0" onchange="cargar34a();getDefectos();rangoNumeroMargen(&#39;mg34-b&#39;);cargar34a();" tabindex="331"><input type="text" id="mg34-c" name="mg34-c" data-formulario="yes2" value="0" onchange="cargar34a();getDefectos();rangoNumeroMargen(&#39;mg34-c&#39;);cargar34a();" tabindex="332"></td>
					<td class="borde"><input type="text" id="mg35-a" name="mg35-a" data-formulario="yes2" value="0" onchange="cargar35a();getDefectos();rangoNumeroMargen(&#39;mg35-a&#39;);cargar35a();" tabindex="333"><input type="text" id="mg35-b" name="mg35-b" data-formulario="yes2" value="0" onchange="cargar35a();getDefectos();rangoNumeroMargen(&#39;mg35-b&#39;);cargar35a();" tabindex="334"><input type="text" id="mg35-c" name="mg35-c" data-formulario="yes2" value="0" onchange="cargar35a();getDefectos();rangoNumeroMargen(&#39;mg35-c&#39;);cargar35a();" tabindex="335"></td>
					<td class="borde"><input type="text" id="mg36-a" name="mg36-a" data-formulario="yes2" value="0" onchange="cargar36a();getDefectos();rangoNumeroMargen(&#39;mg36-a&#39;);cargar36a();" tabindex="336"><input type="text" id="mg36-b" name="mg36-b" data-formulario="yes2" value="0" onchange="cargar36a();getDefectos();rangoNumeroMargen(&#39;mg36-b&#39;);cargar36a();" tabindex="337"><input type="text" id="mg36-c" name="mg36-c" data-formulario="yes2" value="0" onchange="cargar36a();getDefectos();rangoNumeroMargen(&#39;mg36-c&#39;);cargar36a();" tabindex="338"></td>
					<td class="borde"><input type="text" id="mg37-a" name="mg37-a" data-formulario="yes2" value="0" onchange="cargar37a();getDefectos();rangoNumeroMargen(&#39;mg37-a&#39;);cargar37a();" tabindex="339"><input type="text" id="mg37-b" name="mg37-b" data-formulario="yes2" value="0" onchange="cargar37a();getDefectos();rangoNumeroMargen(&#39;mg37-b&#39;);cargar37a();" tabindex="340"><input type="text" id="mg37-c" name="mg37-c" data-formulario="yes2" value="0" onchange="cargar37a();getDefectos();rangoNumeroMargen(&#39;mg37-c&#39;);cargar37a();" tabindex="341"></td>
					<td class="borde"><input type="text" id="mg38-a" name="mg38-a" data-formulario="yes2" value="0" onchange="cargar38a();getDefectos();rangoNumeroMargen(&#39;mg38-a&#39;);cargar38a();" tabindex="342"><input type="text" id="mg38-b" name="mg38-b" data-formulario="yes2" value="0" onchange="cargar38a();getDefectos();rangoNumeroMargen(&#39;mg38-b&#39;);cargar38a();" tabindex="343"><input type="text" id="mg38-c" name="mg38-c" data-formulario="yes2" value="0" onchange="cargar38a();getDefectos();rangoNumeroMargen(&#39;mg38-c&#39;);cargar38a();" tabindex="344"></td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="ps31-a" name="ps31-a" data-formulario="yes2" value="0" onchange="cargar31a();getDefectos();" tabindex="409" style="color: black;"><input type="text" id="ps31-b" name="ps31-b" data-formulario="yes2" value="0" onchange="cargar31a();getDefectos();" tabindex="410" style="color: black;"><input type="text" id="ps31-c" name="ps31-c" data-formulario="yes2" value="0" onchange="cargar31a();getDefectos();" tabindex="411" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps32-a" name="ps32-a" data-formulario="yes2" value="0" onchange="cargar32a();getDefectos();" tabindex="412" style="color: black;"><input type="text" id="ps32-b" name="ps32-b" data-formulario="yes2" value="0" onchange="cargar32a();getDefectos();" tabindex="413" style="color: black;"><input type="text" id="ps32-c" name="ps32-c" data-formulario="yes2" value="0" onchange="cargar32a();getDefectos();" tabindex="414" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps33-a" name="ps33-a" data-formulario="yes2" value="0" onchange="cargar33a();getDefectos();" tabindex="415" style="color: black;"><input type="text" id="ps33-b" name="ps33-b" data-formulario="yes2" value="0" onchange="cargar33a();getDefectos();" tabindex="416" style="color: black;"><input type="text" id="ps33-c" name="ps33-c" data-formulario="yes2" value="0" onchange="cargar33a();getDefectos();" tabindex="417" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps34-a" name="ps34-a" data-formulario="yes2" value="0" onchange="cargar34a();getDefectos();" tabindex="418" style="color: black;"><input type="text" id="ps34-b" name="ps34-b" data-formulario="yes2" value="0" onchange="cargar34a();getDefectos();" tabindex="419" style="color: black;"><input type="text" id="ps34-c" name="ps34-c" data-formulario="yes2" value="0" onchange="cargar34a();getDefectos();" tabindex="420" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps35-a" name="ps35-a" data-formulario="yes2" value="0" onchange="cargar35a();getDefectos();" tabindex="421" style="color: black;"><input type="text" id="ps35-b" name="ps35-b" data-formulario="yes2" value="0" onchange="cargar35a();getDefectos();" tabindex="422" style="color: black;"><input type="text" id="ps35-c" name="ps35-c" data-formulario="yes2" value="0" onchange="cargar35a();getDefectos();" tabindex="423" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps36-a" name="ps36-a" data-formulario="yes2" value="0" onchange="cargar36a();getDefectos();" tabindex="424" style="color: black;"><input type="text" id="ps36-b" name="ps36-b" data-formulario="yes2" value="0" onchange="cargar36a();getDefectos();" tabindex="425" style="color: black;"><input type="text" id="ps36-c" name="ps36-c" data-formulario="yes2" value="0" onchange="cargar36a();getDefectos();" tabindex="426" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps37-a" name="ps37-a" data-formulario="yes2" value="0" onchange="cargar37a();getDefectos();" tabindex="427" style="color: black;"><input type="text" id="ps37-b" name="ps37-b" data-formulario="yes2" value="0" onchange="cargar37a();getDefectos();" tabindex="428" style="color: black;"><input type="text" id="ps37-c" name="ps37-c" data-formulario="yes2" value="0" onchange="cargar37a();getDefectos();" tabindex="429" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps38-a" name="ps38-a" data-formulario="yes2" value="0" onchange="cargar38a();getDefectos();" tabindex="430" style="color: black;"><input type="text" id="ps38-b" name="ps38-b" data-formulario="yes2" value="0" onchange="cargar38a();getDefectos();" tabindex="431" style="color: black;"><input type="text" id="ps38-c" name="ps38-c" data-formulario="yes2" value="0" onchange="cargar38a();getDefectos();" tabindex="432" style="color: black;"></td>
				</tr>



				<tr>
					<td class="noborde">
						<div id="lineas-gr"></div>
						<div id="visualization31a" style="width: 23px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 23px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="23" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_55">
												<rect x="0" y="0" width="23" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="23" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_55)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581L22.5,97.95161290322581L11.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581L22.5,97.95161290322581L11.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="23" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L11.5,97.95161290322581L22.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 33px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente31-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization32a" style="width: 22px; height: 160px;position:absolute;margin:0 0 0 9px;">
							<div dir="ltr" style="position: relative; width: 22px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="22" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_54">
												<rect x="0" y="0" width="22" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="22" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_54)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581L21.5,97.95161290322581L11,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581L21.5,97.95161290322581L11,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="22" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 32px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente32-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization33a" style="width: 25px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 25px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="25" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_53">
												<rect x="0" y="0" width="25" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="25" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_53)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581L24.5,97.95161290322581L12.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581L24.5,97.95161290322581L12.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="25" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 35px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente33-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization34a" style="width: 22px; height: 160px;position:absolute;margin:0 0 0 11px;">
							<div dir="ltr" style="position: relative; width: 22px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="22" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_52">
												<rect x="0" y="0" width="22" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="22" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_52)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581L21.5,97.95161290322581L11,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581L21.5,97.95161290322581L11,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="22" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L11,97.95161290322581L21.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 32px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente34-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization35a" style="width: 25px; height: 160px;position:absolute;margin:0 0 0 10px;">
							<div dir="ltr" style="position: relative; width: 25px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="25" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_51">
												<rect x="0" y="0" width="25" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="25" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_51)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581L24.5,97.95161290322581L12.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581L24.5,97.95161290322581L12.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="25" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L12.5,97.95161290322581L24.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 35px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente35-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization36a" style="width: 50px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 50px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="50" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_50">
												<rect x="0" y="0" width="50" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="50" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_50)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L25,97.95161290322581L49.5,97.95161290322581L49.5,97.95161290322581L25,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L25,97.95161290322581L49.5,97.95161290322581L49.5,97.95161290322581L25,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="50" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L25,97.95161290322581L49.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L25,97.95161290322581L49.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 60px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente36-a">
							<div id="furca36"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization37a" style="width: 47px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 47px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="47" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_49">
												<rect x="0" y="0" width="47" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="47" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_49)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581L46.5,97.95161290322581L23.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581L46.5,97.95161290322581L23.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="47" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 57px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente37-a">
							<div id="furca37"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization38a" style="width: 47px; height: 160px;position:absolute;margin:0 0 0 10px;">
							<div dir="ltr" style="position: relative; width: 47px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="47" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_48">
												<rect x="0" y="0" width="47" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="47" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_48)">
												<g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581L46.5,97.95161290322581L23.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,97.95161290322581L0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581L46.5,97.95161290322581L23.5,97.95161290322581L0.5,97.95161290322581" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="97" width="47" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,97.95161290322581L23.5,97.95161290322581L46.5,97.95161290322581" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 57px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente38-a">
							<div id="furca38"></div>
						</div>
					</td>
				</tr>


			</tbody>
		</table>
	</td>

</tr>

<tr>
	<td>
		<table id="tabla-7">
			<form name="grafico7" id="grafico7" action="http://sepa.es/periodontograma/index.html#"></form>

			<tbody>
				<tr>
					<td class="titulo" style="color:#565A5D">Vestibular</td>
					<td class="noborde">
						<div id="lineas-gr-inf"></div>
						<div id="visualization48b" style="width: 48px; height: 160px;position:absolute;margin:0 0 0 5px;">
							<div dir="ltr" style="position: relative; width: 48px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="48" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_40">
												<rect x="0" y="0" width="48" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="48" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_40)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L24,62.04838709677419L47.5,62.04838709677419L47.5,62.04838709677419L24,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L24,62.04838709677419L47.5,62.04838709677419L47.5,62.04838709677419L24,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="48" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L24,62.04838709677419L47.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L24,62.04838709677419L47.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 58px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente48b-a">
							<div id="furca48b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization47b" style="width: 43px; height: 160px;position:absolute;margin:0 0 0 10px;">
							<div dir="ltr" style="position: relative; width: 43px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="43" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_41">
												<rect x="0" y="0" width="43" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="43" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_41)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L21.5,62.04838709677419L42.5,62.04838709677419L42.5,62.04838709677419L21.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L21.5,62.04838709677419L42.5,62.04838709677419L42.5,62.04838709677419L21.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="43" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L21.5,62.04838709677419L42.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L21.5,62.04838709677419L42.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 53px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente47b-a">
							<div id="furca47b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization46b" style="width: 44px; height: 160px;position:absolute;margin:0 0 0 13px;">
							<div dir="ltr" style="position: relative; width: 44px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="44" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_42">
												<rect x="0" y="0" width="44" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="44" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_42)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L22,62.04838709677419L43.5,62.04838709677419L43.5,62.04838709677419L22,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L22,62.04838709677419L43.5,62.04838709677419L43.5,62.04838709677419L22,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="44" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L22,62.04838709677419L43.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L22,62.04838709677419L43.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 54px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente46b-a">
							<div id="furca46b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization45b" style="width: 23px; height: 160px;position:absolute;margin:0 0 0 13px;">
							<div dir="ltr" style="position: relative; width: 23px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="23" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_43">
												<rect x="0" y="0" width="23" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="23" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_43)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419L22.5,62.04838709677419L11.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419L22.5,62.04838709677419L11.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="23" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 33px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente45b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization44b" style="width: 25px; height: 160px;position:absolute;margin:0 0 0 10px;">
							<div dir="ltr" style="position: relative; width: 25px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="25" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_44">
												<rect x="0" y="0" width="25" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="25" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_44)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419L24.5,62.04838709677419L12.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419L24.5,62.04838709677419L12.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="25" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 35px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente44b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization43b" style="width: 23px; height: 160px;position:absolute;margin:0 0 0 10px;">
							<div dir="ltr" style="position: relative; width: 23px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="23" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_45">
												<rect x="0" y="0" width="23" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="23" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_45)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419L22.5,62.04838709677419L11.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419L22.5,62.04838709677419L11.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="23" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 33px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente43b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization42b" style="width: 17px; height: 160px;position:absolute;margin:0 0 0 11px;">
							<div dir="ltr" style="position: relative; width: 17px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="17" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_46">
												<rect x="0" y="0" width="17" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="17" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_46)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L8.5,62.04838709677419L16.5,62.04838709677419L16.5,62.04838709677419L8.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L8.5,62.04838709677419L16.5,62.04838709677419L16.5,62.04838709677419L8.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="17" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L8.5,62.04838709677419L16.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L8.5,62.04838709677419L16.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 27px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente42b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization41b" style="width: 18x; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 18px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="18" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_47">
												<rect x="0" y="0" width="18" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="18" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_47)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L9,62.04838709677419L17.5,62.04838709677419L17.5,62.04838709677419L9,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L9,62.04838709677419L17.5,62.04838709677419L17.5,62.04838709677419L9,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="18" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L9,62.04838709677419L17.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L9,62.04838709677419L17.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 28px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente41b-a"></div>
					</td>
				</tr>

				<tr>
					<td class="titulo">Profundidad de sondaje</td>
					<td class="borde"><input type="text" id="ps48b-a" name="ps48b-a" data-formulario="yes2" value="0" onchange="cargar48b();getDefectos();" tabindex="433" style="color: black;"><input type="text" id="ps48b-b" name="ps48b-b" data-formulario="yes2" value="0" onchange="cargar48b();getDefectos();" tabindex="434" style="color: black;"><input type="text" id="ps48b-c" name="ps48b-c" data-formulario="yes2" value="0" onchange="cargar48b();getDefectos();" tabindex="435" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps47b-a" name="ps47b-a" data-formulario="yes2" value="0" onchange="cargar47b();getDefectos();" tabindex="436" style="color: black;"><input type="text" id="ps47b-b" name="ps47b-b" data-formulario="yes2" value="0" onchange="cargar47b();getDefectos();" tabindex="437" style="color: black;"><input type="text" id="ps47b-c" name="ps47b-c" data-formulario="yes2" value="0" onchange="cargar47b();getDefectos();" tabindex="438" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps46b-a" name="ps46b-a" data-formulario="yes2" value="0" onchange="cargar46b();getDefectos();" tabindex="439" style="color: black;"><input type="text" id="ps46b-b" name="ps46b-b" data-formulario="yes2" value="0" onchange="cargar46b();getDefectos();" tabindex="440" style="color: black;"><input type="text" id="ps46b-c" name="ps46b-c" data-formulario="yes2" value="0" onchange="cargar46b();getDefectos();" tabindex="441" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps45b-a" name="ps45b-a" data-formulario="yes2" value="0" onchange="cargar45b();getDefectos();" tabindex="442" style="color: black;"><input type="text" id="ps45b-b" name="ps45b-b" data-formulario="yes2" value="0" onchange="cargar45b();getDefectos();" tabindex="443" style="color: black;"><input type="text" id="ps45b-c" name="ps45b-c" data-formulario="yes2" value="0" onchange="cargar45b();getDefectos();" tabindex="444" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps44b-a" name="ps44b-a" data-formulario="yes2" value="0" onchange="cargar44b();getDefectos();" tabindex="445" style="color: black;"><input type="text" id="ps44b-b" name="ps44b-b" data-formulario="yes2" value="0" onchange="cargar44b();getDefectos();" tabindex="446" style="color: black;"><input type="text" id="ps44b-c" name="ps44b-c" data-formulario="yes2" value="0" onchange="cargar44b();getDefectos();" tabindex="447" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps43b-a" name="ps43b-a" data-formulario="yes2" value="0" onchange="cargar43b();getDefectos();" tabindex="448" style="color: black;"><input type="text" id="ps43b-b" name="ps43b-b" data-formulario="yes2" value="0" onchange="cargar43b();getDefectos();" tabindex="449" style="color: black;"><input type="text" id="ps43b-c" name="ps43b-c" data-formulario="yes2" value="0" onchange="cargar43b();getDefectos();" tabindex="450" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps42b-a" name="ps42b-a" data-formulario="yes2" value="0" onchange="cargar42b();getDefectos();" tabindex="451" style="color: black;"><input type="text" id="ps42b-b" name="ps42b-b" data-formulario="yes2" value="0" onchange="cargar42b();getDefectos();" tabindex="452" style="color: black;"><input type="text" id="ps42b-c" name="ps42b-c" data-formulario="yes2" value="0" onchange="cargar42b();getDefectos();" tabindex="453" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps41b-a" name="ps41b-a" data-formulario="yes2" value="0" onchange="cargar41b();getDefectos();" tabindex="454" style="color: black;"><input type="text" id="ps41b-b" name="ps41b-b" data-formulario="yes2" value="0" onchange="cargar41b();getDefectos();" tabindex="455" style="color: black;"><input type="text" id="ps41b-c" name="ps41b-c" data-formulario="yes2" value="0" onchange="cargar41b();getDefectos();" tabindex="456" style="color: black;"></td>
				</tr>

				<tr>
					<td class="titulo">Margen gingival</td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg48b-a" name="mg48b-a" data-formulario="yes2" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen(&#39;mg48b-a&#39;);cargar48b();" tabindex="481"><input oninput="validarGingival(this)" type="text" id="mg48b-b" name="mg48b-b" data-formulario="yes2" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen(&#39;mg48b-b&#39;);cargar48b();" tabindex="482"><input oninput="validarGingival(this)" type="text" id="mg48b-c" name="mg48b-c" data-formulario="yes2" value="0" onchange="cargar48b();getDefectos();rangoNumeroMargen(&#39;mg48b-c&#39;);cargar48b();" tabindex="483"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg47b-a" name="mg47b-a" data-formulario="yes2" value="0" onchange="cargar47b();getDefectos();rangoNumeroMargen(&#39;mg47b-a&#39;);cargar47b();" tabindex="484"><input oninput="validarGingival(this)" type="text" id="mg47b-b" name="mg47b-b" data-formulario="yes2" value="0" onchange="cargar47b();getDefectos();rangoNumeroMargen(&#39;mg47b-b&#39;);cargar47b();" tabindex="485"><input oninput="validarGingival(this)" type="text" id="mg47b-c" name="mg47b-c" data-formulario="yes2" value="0" onchange="cargar47b();getDefectos();rangoNumeroMargen(&#39;mg47b-c&#39;);cargar47b();" tabindex="486"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg46b-a" name="mg46b-a" data-formulario="yes2" value="0" onchange="cargar46b();getDefectos();rangoNumeroMargen(&#39;mg46b-a&#39;);cargar46b();" tabindex="487"><input oninput="validarGingival(this)" type="text" id="mg46b-b" name="mg46b-b" data-formulario="yes2" value="0" onchange="cargar46b();getDefectos();rangoNumeroMargen(&#39;mg46b-b&#39;);cargar46b();" tabindex="488"><input oninput="validarGingival(this)" type="text" id="mg46b-c" name="mg46b-c" data-formulario="yes2" value="0" onchange="cargar46b();getDefectos();rangoNumeroMargen(&#39;mg46b-c&#39;);cargar46b();" tabindex="489"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg45b-a" name="mg45b-a" data-formulario="yes2" value="0" onchange="cargar45b();getDefectos();rangoNumeroMargen(&#39;mg45b-a&#39;);cargar45b();" tabindex="490"><input oninput="validarGingival(this)" type="text" id="mg45b-b" name="mg45b-b" data-formulario="yes2" value="0" onchange="cargar45b();getDefectos();rangoNumeroMargen(&#39;mg45b-b&#39;);cargar45b();" tabindex="491"><input oninput="validarGingival(this)" type="text" id="mg45b-c" name="mg45b-c" data-formulario="yes2" value="0" onchange="cargar45b();getDefectos();rangoNumeroMargen(&#39;mg45b-c&#39;);cargar45b();" tabindex="492"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg44b-a" name="mg44b-a" data-formulario="yes2" value="0" onchange="cargar44b();getDefectos();rangoNumeroMargen(&#39;mg44b-a&#39;);cargar44b();" tabindex="493"><input oninput="validarGingival(this)" type="text" id="mg44b-b" name="mg44b-b" data-formulario="yes2" value="0" onchange="cargar44b();getDefectos();rangoNumeroMargen(&#39;mg44b-b&#39;);cargar44b();" tabindex="494"><input oninput="validarGingival(this)" type="text" id="mg44b-c" name="mg44b-c" data-formulario="yes2" value="0" onchange="cargar44b();getDefectos();rangoNumeroMargen(&#39;mg44b-c&#39;);cargar44b();" tabindex="495"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg43b-a" name="mg43b-a" data-formulario="yes2" value="0" onchange="cargar43b();getDefectos();rangoNumeroMargen(&#39;mg43b-a&#39;);cargar43b();" tabindex="496"><input oninput="validarGingival(this)" type="text" id="mg43b-b" name="mg43b-b" data-formulario="yes2" value="0" onchange="cargar43b();getDefectos();rangoNumeroMargen(&#39;mg43b-b&#39;);cargar43b();" tabindex="497"><input oninput="validarGingival(this)" type="text" id="mg43b-c" name="mg43b-c" data-formulario="yes2" value="0" onchange="cargar43b();getDefectos();rangoNumeroMargen(&#39;mg43b-c&#39;);cargar43b();" tabindex="498"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg42b-a" name="mg42b-a" data-formulario="yes2" value="0" onchange="cargar42b();getDefectos();rangoNumeroMargen(&#39;mg42b-a&#39;);cargar42b();" tabindex="499"><input oninput="validarGingival(this)" type="text" id="mg42b-b" name="mg42b-b" data-formulario="yes2" value="0" onchange="cargar42b();getDefectos();rangoNumeroMargen(&#39;mg42b-b&#39;);cargar42b();" tabindex="500"><input oninput="validarGingival(this)" type="text" id="mg42b-c" name="mg42b-c" data-formulario="yes2" value="0" onchange="cargar42b();getDefectos();rangoNumeroMargen(&#39;mg42b-c&#39;);cargar42b();" tabindex="501"></td>
					<td class="borde"><input oninput="validarGingival(this)" type="text" id="mg41b-a" name="mg41b-a" data-formulario="yes2" value="0" onchange="cargar41b();getDefectos();rangoNumeroMargen(&#39;mg41b-a&#39;);cargar41b();" tabindex="502"><input oninput="validarGingival(this)" type="text" id="mg41b-b" name="mg41b-b" data-formulario="yes2" value="0" onchange="cargar41b();getDefectos();rangoNumeroMargen(&#39;mg41b-b&#39;);cargar41b();" tabindex="503"><input oninput="validarGingival(this)" type="text" id="mg41b-c" name="mg41b-c" data-formulario="yes2" value="0" onchange="cargar41b();getDefectos();rangoNumeroMargen(&#39;mg41b-c&#39;);cargar41b();" tabindex="504"></td>
				</tr>

				<tr>
					<td class="titulo">Anchura encía</td>
					<td class="borde"><input type="text" id="ae48b" name="ae48b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="529"></td>
					<td class="borde"><input type="text" id="ae47b" name="ae47b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="530"></td>
					<td class="borde"><input type="text" id="ae46b" name="ae46b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="531"></td>
					<td class="borde"><input type="text" id="ae45b" name="ae45b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="532"></td>
					<td class="borde"><input type="text" id="ae44b" name="ae44b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="533"></td>
					<td class="borde"><input type="text" id="ae43b" name="ae43b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="534"></td>
					<td class="borde"><input type="text" id="ae42b" name="ae42b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="535"></td>
					<td class="borde"><input type="text" id="ae41b" name="ae41b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="536"></td>

				</tr>

				<tr>
					<td class="titulo">Placa</td>
					<td class="borde">
						<div id="p48b-a">
							<div class="custom-select-placa">
								<select id="placa48b-a" name="placa48b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p48b-b">
							<div class="custom-select-placa">
								<select id="placa48b-b" name="placa48b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p48b-c">
							<div class="custom-select-placa">
								<select id="placa48b-c" name="placa48b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p47b-a">
							<div class="custom-select-placa">
								<select id="placa47b-a" name="placa47b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p47b-b">
							<div class="custom-select-placa">
								<select id="placa47b-b" name="placa47b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p47b-c">
							<div class="custom-select-placa">
								<select id="placa47b-c" name="placa47b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p46b-a">
							<div class="custom-select-placa">
								<select id="placa46b-a" name="placa46b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p46b-b">
							<div class="custom-select-placa">
								<select id="placa46b-b" name="placa46b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p46b-c">
							<div class="custom-select-placa">
								<select id="placa46b-c" name="placa46b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p45b-a">
							<div class="custom-select-placa">
								<select id="placa45b-a" name="placa45b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p45b-b">
							<div class="custom-select-placa">
								<select id="placa45b-b" name="placa45b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p45b-c">
							<div class="custom-select-placa">
								<select id="placa45b-c" name="placa45b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p44b-a">
							<div class="custom-select-placa">
								<select id="placa44b-a" name="placa44b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p44b-b">
							<div class="custom-select-placa">
								<select id="placa44b-b" name="placa44b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p44b-c">
							<div class="custom-select-placa">
								<select id="placa44b-c" name="placa44b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p43b-a">
							<div class="custom-select-placa">
								<select id="placa43b-a" name="placa43b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p43b-b">
							<div class="custom-select-placa">
								<select id="placa43b-b" name="placa43b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p43b-c">
							<div class="custom-select-placa">
								<select id="placa43b-c" name="placa43b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p42b-a">
							<div class="custom-select-placa">
								<select id="placa42b-a" name="placa42b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p42b-b">
							<div class="custom-select-placa">
								<select id="placa42b-b" name="placa42b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p42b-c">
							<div class="custom-select-placa">
								<select id="placa42b-c" name="placa42b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p41b-a">
							<div class="custom-select-placa">
								<select id="placa41b-a" name="placa41b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p41b-b">
							<div class="custom-select-placa">
								<select id="placa41b-b" name="placa41b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p41b-c">
							<div class="custom-select-placa">
								<select id="placa41b-c" name="placa41b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="titulo">Sangrado / Supuración</td>
					<td class="borde">
						<div id="s48b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup48b-a" name="san_sup48b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s48b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup48b-b" name="san_sup48b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s48b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup48b-c" name="san_sup48b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s47b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup47b-a" name="san_sup47b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s47b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup47b-b" name="san_sup47b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s47b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup47b-c" name="san_sup47b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s46b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup46b-a" name="san_sup46b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s46b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup46b-b" name="san_sup46b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s46b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup46b-c" name="san_sup46b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s45b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup45b-a" name="san_sup45b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s45b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup45b-b" name="san_sup45b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s45b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup45b-c" name="san_sup45b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s44b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup44b-a" name="san_sup44b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s44b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup44b-b" name="san_sup44b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s44b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup44b-c" name="san_sup44b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s43b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup43b-a" name="san_sup43b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s43b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup43b-b" name="san_sup43b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s43b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup43b-c" name="san_sup43b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s42b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup42b-a" name="san_sup42b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s42b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup42b-b" name="san_sup42b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s42b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup42b-c" name="san_sup42b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s41b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup41b-a" name="san_sup41b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s41b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup41b-b" name="san_sup41b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s41b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup41b-c" name="san_sup41b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

				</tr>

				<tr>
					<td class="titulo">Furca</td>
					<td class="borde">
						<div id="f48b"> <select id="Select_f48b" name="Furca_f48b" data-formulario="yes" onchange="ActualizarFurca(this,'f48b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f47b"> <select id="Select_f47b" name="Furca_f47b" data-formulario="yes" onchange="ActualizarFurca(this,'f47b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f46b"> <select id="Select_f46b" name="Furca_f46b" data-formulario="yes" onchange="ActualizarFurca(this,'f46b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
				</tr>

				<tr>
					<td class="titulo">Pronóstico individual</td>
					<td class="borde"><input type="text" id="pi48b" name="pi48b" data-formulario="yes" tabindex="545"></td>
					<td class="borde"><input type="text" id="pi47b" name="pi47b" data-formulario="yes" tabindex="546"></td>
					<td class="borde"><input type="text" id="pi46b" name="pi46b" data-formulario="yes" tabindex="547"></td>
					<td class="borde"><input type="text" id="pi45b" name="pi45b" data-formulario="yes" tabindex="548"></td>
					<td class="borde"><input type="text" id="pi44b" name="pi44b" data-formulario="yes" tabindex="549"></td>
					<td class="borde"><input type="text" id="pi43b" name="pi43b" data-formulario="yes" tabindex="550"></td>
					<td class="borde"><input type="text" id="pi42b" name="pi42b" data-formulario="yes" tabindex="551"></td>
					<td class="borde"><input type="text" id="pi41b" name="pi41b" data-formulario="yes" tabindex="552"></td>
				</tr>

				<tr>
					<td class="titulo">Movilidad</td>
					<td class="borde"><input type="text" id="m48b" name="m48b" data-formulario="yes" value="0" tabindex="561" onchange="rangoNumero(&#39;m48b&#39;)"></td>
					<td class="borde"><input type="text" id="m47b" name="m47b" data-formulario="yes" value="0" tabindex="562" onchange="rangoNumero(&#39;m47b&#39;)"></td>
					<td class="borde"><input type="text" id="m46b" name="m46b" data-formulario="yes" value="0" tabindex="563" onchange="rangoNumero(&#39;m46b&#39;)"></td>
					<td class="borde"><input type="text" id="m45b" name="m45b" data-formulario="yes" value="0" tabindex="564" onchange="rangoNumero(&#39;m45b&#39;)"></td>
					<td class="borde"><input type="text" id="m44b" name="m44b" data-formulario="yes" value="0" tabindex="565" onchange="rangoNumero(&#39;m44b&#39;)"></td>
					<td class="borde"><input type="text" id="m43b" name="m43b" data-formulario="yes" value="0" tabindex="566" onchange="rangoNumero(&#39;m43b&#39;)"></td>
					<td class="borde"><input type="text" id="m42b" name="m42b" data-formulario="yes" value="0" tabindex="567" onchange="rangoNumero(&#39;m42b&#39;)"></td>
					<td class="borde"><input type="text" id="m41b" name="m41b" data-formulario="yes" value="0" tabindex="568" onchange="rangoNumero(&#39;m41b&#39;)"></td>
				</tr>

				<tr>
					<td class="titulo">Implante</td>
					<td class="borde">
						<div id="i48b"> <select id="Select_i48" name="Implante_i48" data-formulario="yes" onchange="ActualizarDiente(this,'i48b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i47b"> <select id="Select_i47" name="Implante_i47" data-formulario="yes" onchange="ActualizarDiente(this,'i47b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i46b"> <select id="Select_i46" name="Implante_i46" data-formulario="yes" onchange="ActualizarDiente(this,'i46b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i45b"> <select id="Select_i45" name="Implante_i45" data-formulario="yes" onchange="ActualizarDiente(this,'i45b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i44b"> <select id="Select_i44" name="Implante_i44" data-formulario="yes" onchange="ActualizarDiente(this,'i44b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i43b"> <select id="Select_i43" name="Implante_i43" data-formulario="yes" onchange="ActualizarDiente(this,'i43b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i42b"> <select id="Select_i42" name="Implante_i42" data-formulario="yes" onchange="ActualizarDiente(this,'i42b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
					<td class="borde">
						<div id="i41b"> <select id="Select_i41" name="Implante_i41" data-formulario="yes" onchange="ActualizarDiente(this,'i41b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select> </div>
					</td>
				</tr>

				<tr>
					<td class="titulo"></td>
					<td class="borde">
						<div id="d48b" style="pointer-events: none;">4.8</div> <input type="checkbox" id="d48b_estado" name="d48b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d47b" style="pointer-events: none;">4.7</div> <input type="checkbox" id="d47b_estado" name="d47b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d46b" style="pointer-events: none;">4.6</div> <input type="checkbox" id="d46b_estado" name="d46b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d45b" style="pointer-events: none;">4.5</div> <input type="checkbox" id="d45b_estado" name="d45b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d44b" style="pointer-events: none;">4.4</div> <input type="checkbox" id="d44b_estado" name="d44b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d43b" style="pointer-events: none;">4.3</div> <input type="checkbox" id="d43b_estado" name="d43b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d42b" style="pointer-events: none;">4.2</div> <input type="checkbox" id="d42b_estado" name="d42b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d41b" style="pointer-events: none;">4.1</div> <input type="checkbox" id="d41b_estado" name="d41b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
				</tr>


			</tbody>
		</table>
	</td>
	<td>
		<table id="tabla-8">
			<form name="grafico8" id="grafico8" action="http://sepa.es/periodontograma/index.html#"></form>

			<tbody>
				<tr>
					<td class="noborde">
						<div id="lineas-gr-inf"></div>
						<div id="visualization31b" style="width: 23px; height: 160px;position:absolute;margin:0 0 0 7px;">
							<div dir="ltr" style="position: relative; width: 23px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="23" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_63">
												<rect x="0" y="0" width="23" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="23" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_63)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419L22.5,62.04838709677419L11.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419L22.5,62.04838709677419L11.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="23" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L11.5,62.04838709677419L22.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 33px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente31b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization32b" style="width: 22px; height: 160px;position:absolute;margin:0 0 0 7px;">
							<div dir="ltr" style="position: relative; width: 22px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="22" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_62">
												<rect x="0" y="0" width="22" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="22" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_62)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419L21.5,62.04838709677419L11,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419L21.5,62.04838709677419L11,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="22" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 32px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente32b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization33b" style="width: 25px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 25px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="25" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_61">
												<rect x="0" y="0" width="25" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="25" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_61)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419L24.5,62.04838709677419L12.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419L24.5,62.04838709677419L12.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="25" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 35px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente33b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization34b" style="width: 22px; height: 160px;position:absolute;margin:0 0 0 10px;">
							<div dir="ltr" style="position: relative; width: 22px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="22" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_60">
												<rect x="0" y="0" width="22" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="22" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_60)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419L21.5,62.04838709677419L11,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419L21.5,62.04838709677419L11,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="22" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L11,62.04838709677419L21.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 32px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente34b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization35b" style="width: 25px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 25px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="25" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_59">
												<rect x="0" y="0" width="25" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="25" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_59)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419L24.5,62.04838709677419L12.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419L24.5,62.04838709677419L12.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="25" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L12.5,62.04838709677419L24.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 35px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente35b-a"></div>
					</td>
					<td class="noborde">
						<div id="visualization36b" style="width: 50px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 50px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="50" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_58">
												<rect x="0" y="0" width="50" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="50" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_58)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L25,62.04838709677419L49.5,62.04838709677419L49.5,62.04838709677419L25,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L25,62.04838709677419L49.5,62.04838709677419L49.5,62.04838709677419L25,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="50" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L25,62.04838709677419L49.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L25,62.04838709677419L49.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 60px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente36b-a">
							<div id="furca36b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization37b" style="width: 47px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 47px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="47" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_57">
												<rect x="0" y="0" width="47" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="47" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_57)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419L46.5,62.04838709677419L23.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419L46.5,62.04838709677419L23.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="47" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 57px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente37b-a">
							<div id="furca37b"></div>
						</div>
					</td>
					<td class="noborde">
						<div id="visualization38b" style="width: 47px; height: 160px;position:absolute;margin:0 0 0 8px;">
							<div dir="ltr" style="position: relative; width: 47px; height: 160px;">
								<div style="position: absolute; left: 0px; top: 0px; width: 100%; height: 100%;"><svg width="47" height="160" style="overflow: hidden;">
										<defs id="defs">
											<clippath id="_ABSTRACT_RENDERER_ID_56">
												<rect x="0" y="0" width="47" height="160"></rect>
											</clippath>
										</defs>
										<g>
											<rect x="0" y="0" width="47" height="160" stroke="none" stroke-width="0" fill-opacity="0" fill="#ffffff"></rect>
											<g clip-path="url(#_ABSTRACT_RENDERER_ID_56)">
												<g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419L46.5,62.04838709677419L23.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#3366cc"></path>
													</g>
													<g>
														<path d="M0.5,62.04838709677419L0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419L46.5,62.04838709677419L23.5,62.04838709677419L0.5,62.04838709677419" stroke="none" stroke-width="0" fill-opacity="0.3" fill="#dc3912"></path>
													</g>
												</g>
												<g>
													<rect x="0" y="62" width="47" height="1" stroke="none" stroke-width="0" fill="#333333"></rect>
												</g>
												<g>
													<path d="M0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419" stroke="#3366cc" stroke-width="2" fill-opacity="1" fill="none"></path>
													<path d="M0.5,62.04838709677419L23.5,62.04838709677419L46.5,62.04838709677419" stroke="#dc3912" stroke-width="2" fill-opacity="1" fill="none"></path>
												</g>
											</g>
											<g></g>
										</g>
										<g></g>
									</svg></div>
							</div>
							<div style="display: none; position: absolute; top: 170px; left: 57px; white-space: nowrap; font-family: Arial; font-size: 7px;">...</div>
							<div></div>
						</div>
						<div id="diente38b-a">
							<div id="furca38b"></div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="ps31b-a" name="ps31b-a" data-formulario="yes2" value="0" onchange="cargar31b();getDefectos();" tabindex="457" style="color: black;"><input type="text" id="ps31b-b" name="ps31b-b" data-formulario="yes2" value="0" onchange="cargar31b();getDefectos();" tabindex="458" style="color: black;"><input type="text" id="ps31b-c" name="ps31b-c" data-formulario="yes2" value="0" onchange="cargar31b();getDefectos();" tabindex="459" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps32b-a" name="ps32b-a" data-formulario="yes2" value="0" onchange="cargar32b();getDefectos();" tabindex="460" style="color: black;"><input type="text" id="ps32b-b" name="ps32b-b" data-formulario="yes2" value="0" onchange="cargar32b();getDefectos();" tabindex="461" style="color: black;"><input type="text" id="ps32b-c" name="ps32b-c" data-formulario="yes2" value="0" onchange="cargar32b();getDefectos();" tabindex="462" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps33b-a" name="ps33b-a" data-formulario="yes2" value="0" onchange="cargar33b();getDefectos();" tabindex="463" style="color: black;"><input type="text" id="ps33b-b" name="ps33b-b" data-formulario="yes2" value="0" onchange="cargar33b();getDefectos();" tabindex="464" style="color: black;"><input type="text" id="ps33b-c" name="ps33b-c" data-formulario="yes2" value="0" onchange="cargar33b();getDefectos();" tabindex="465" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps34b-a" name="ps34b-a" data-formulario="yes2" value="0" onchange="cargar34b();getDefectos();" tabindex="466" style="color: black;"><input type="text" id="ps34b-b" name="ps34b-b" data-formulario="yes2" value="0" onchange="cargar34b();getDefectos();" tabindex="467" style="color: black;"><input type="text" id="ps34b-c" name="ps34b-c" data-formulario="yes2" value="0" onchange="cargar34b();getDefectos();" tabindex="468" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps35b-a" name="ps35b-a" data-formulario="yes2" value="0" onchange="cargar35b();getDefectos();" tabindex="469" style="color: black;"><input type="text" id="ps35b-b" name="ps35b-b" data-formulario="yes2" value="0" onchange="cargar35b();getDefectos();" tabindex="470" style="color: black;"><input type="text" id="ps35b-c" name="ps35b-c" data-formulario="yes2" value="0" onchange="cargar35b();getDefectos();" tabindex="471" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps36b-a" name="ps36b-a" data-formulario="yes2" value="0" onchange="cargar36b();getDefectos();" tabindex="472" style="color: black;"><input type="text" id="ps36b-b" name="ps36b-b" data-formulario="yes2" value="0" onchange="cargar36b();getDefectos();" tabindex="473" style="color: black;"><input type="text" id="ps36b-c" name="ps36b-c" data-formulario="yes2" value="0" onchange="cargar36b();getDefectos();" tabindex="474" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps37b-a" name="ps37b-a" data-formulario="yes2" value="0" onchange="cargar37b();getDefectos();" tabindex="475" style="color: black;"><input type="text" id="ps37b-b" name="ps37b-b" data-formulario="yes2" value="0" onchange="cargar37b();getDefectos();" tabindex="476" style="color: black;"><input type="text" id="ps37b-c" name="ps37b-c" data-formulario="yes2" value="0" onchange="cargar37b();getDefectos();" tabindex="477" style="color: black;"></td>
					<td class="borde"><input type="text" id="ps38b-a" name="ps38b-a" data-formulario="yes2" value="0" onchange="cargar38b();getDefectos();" tabindex="478" style="color: black;"><input type="text" id="ps38b-b" name="ps38b-b" data-formulario="yes2" value="0" onchange="cargar38b();getDefectos();" tabindex="479" style="color: black;"><input type="text" id="ps38b-c" name="ps38b-c" data-formulario="yes2" value="0" onchange="cargar38b();getDefectos();" tabindex="480" style="color: black;"></td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="mg31b-a" name="mg31b-a" data-formulario="yes2" value="0" onchange="cargar31b();getDefectos();rangoNumeroMargen(&#39;mg31b-a&#39;);cargar31b();" tabindex="505"><input type="text" id="mg31b-b" name="mg31b-b" data-formulario="yes2" value="0" onchange="cargar31b();getDefectos();rangoNumeroMargen(&#39;mg31b-b&#39;);cargar31b();" tabindex="506"><input type="text" id="mg31b-c" name="mg31b-c" data-formulario="yes2" value="0" onchange="cargar31b();getDefectos();rangoNumeroMargen(&#39;mg31b-c&#39;);cargar31b();" tabindex="507"></td>
					<td class="borde"><input type="text" id="mg32b-a" name="mg32b-a" data-formulario="yes2" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen(&#39;mg32b-a&#39;);cargar32b();" tabindex="508"><input type="text" id="mg32b-b" name="mg32b-b" data-formulario="yes2" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen(&#39;mg32b-b&#39;);cargar32b();" tabindex="509"><input type="text" id="mg32b-c" name="mg32b-c" data-formulario="yes2" value="0" onchange="cargar32b();getDefectos();rangoNumeroMargen(&#39;mg32b-c&#39;);cargar32b();" tabindex="510"></td>
					<td class="borde"><input type="text" id="mg33b-a" name="mg33b-a" data-formulario="yes2" value="0" onchange="cargar33b();getDefectos();rangoNumeroMargen(&#39;mg33b-a&#39;);cargar33b();" tabindex="511"><input type="text" id="mg33b-b" name="mg33b-b" data-formulario="yes2" value="0" onchange="cargar33b();getDefectos();rangoNumeroMargen(&#39;mg33b-b&#39;);cargar33b();" tabindex="512"><input type="text" id="mg33b-c" name="mg33b-c" data-formulario="yes2" value="0" onchange="cargar33b();getDefectos();rangoNumeroMargen(&#39;mg33b-c&#39;);cargar33b();" tabindex="513"></td>
					<td class="borde"><input type="text" id="mg34b-a" name="mg34b-a" data-formulario="yes2" value="0" onchange="cargar34b();getDefectos();rangoNumeroMargen(&#39;mg34b-a&#39;);cargar34b();" tabindex="514"><input type="text" id="mg34b-b" name="mg34b-b" data-formulario="yes2" value="0" onchange="cargar34b();getDefectos();rangoNumeroMargen(&#39;mg34b-b&#39;);cargar34b();" tabindex="515"><input type="text" id="mg34b-c" name="mg34b-c" data-formulario="yes2" value="0" onchange="cargar34b();getDefectos();rangoNumeroMargen(&#39;mg34b-c&#39;);cargar34b();" tabindex="516"></td>
					<td class="borde"><input type="text" id="mg35b-a" name="mg35b-a" data-formulario="yes2" value="0" onchange="cargar35b();getDefectos();rangoNumeroMargen(&#39;mg35b-a&#39;);cargar35b();" tabindex="517"><input type="text" id="mg35b-b" name="mg35b-b" data-formulario="yes2" value="0" onchange="cargar35b();getDefectos();rangoNumeroMargen(&#39;mg35b-b&#39;);cargar35b();" tabindex="518"><input type="text" id="mg35b-c" name="mg35b-c" data-formulario="yes2" value="0" onchange="cargar35b();getDefectos();rangoNumeroMargen(&#39;mg35b-c&#39;);cargar35b();" tabindex="519"></td>
					<td class="borde"><input type="text" id="mg36b-a" name="mg36b-a" data-formulario="yes2" value="0" onchange="cargar36b();getDefectos();rangoNumeroMargen(&#39;mg36b-a&#39;);cargar36b();" tabindex="520"><input type="text" id="mg36b-b" name="mg36b-b" data-formulario="yes2" value="0" onchange="cargar36b();getDefectos();rangoNumeroMargen(&#39;mg36b-b&#39;);cargar36b();" tabindex="521"><input type="text" id="mg36b-c" name="mg36b-c" data-formulario="yes2" value="0" onchange="cargar36b();getDefectos();rangoNumeroMargen(&#39;mg36b-c&#39;);cargar36b();" tabindex="522"></td>
					<td class="borde"><input type="text" id="mg37b-a" name="mg37b-a" data-formulario="yes2" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen(&#39;mg37b-a&#39;);cargar37b();" tabindex="523"><input type="text" id="mg37b-b" name="mg37b-b" data-formulario="yes2" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen(&#39;mg37b-b&#39;);cargar37b();" tabindex="524"><input type="text" id="mg37b-c" name="mg37b-c" data-formulario="yes2" value="0" onchange="cargar37b();getDefectos();rangoNumeroMargen(&#39;mg37b-c&#39;);cargar37b();" tabindex="525"></td>
					<td class="borde"><input type="text" id="mg38b-a" name="mg38b-a" data-formulario="yes2" value="0" onchange="cargar38b();getDefectos();rangoNumeroMargen(&#39;mg38b-a&#39;);cargar38b();" tabindex="526"><input type="text" id="mg38b-b" name="mg38b-b" data-formulario="yes2" value="0" onchange="cargar38b();getDefectos();rangoNumeroMargen(&#39;mg38b-b&#39;);cargar38b();" tabindex="527"><input type="text" id="mg38b-c" name="mg38b-c" data-formulario="yes2" value="0" onchange="cargar38b();getDefectos();rangoNumeroMargen(&#39;mg38b-c&#39;);cargar38b();" tabindex="528"></td>
				</tr>



				<tr>

					<td class="borde"><input type="text" id="ae31b" name="ae31b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="537"></td>
					<td class="borde"><input type="text" id="ae32b" name="ae32b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="538"></td>
					<td class="borde"><input type="text" id="ae33b" name="ae33b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="539"></td>
					<td class="borde"><input type="text" id="ae34b" name="ae34b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="540"></td>
					<td class="borde"><input type="text" id="ae35b" name="ae35b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="541"></td>
					<td class="borde"><input type="text" id="ae36b" name="ae36b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="542"></td>
					<td class="borde"><input type="text" id="ae37b" name="ae37b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="543"></td>
					<td class="borde"><input type="text" id="ae38b" name="ae38b" data-formulario="yes" value="" onchange="anchuraValor()" tabindex="544"></td>

				</tr>

				<tr>
					<td class="borde">
						<div id="p31b-a">
							<div class="custom-select-placa">
								<select id="placa31b-a" name="placa31b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p31b-b">
							<div class="custom-select-placa">
								<select id="placa31b-b" name="placa31b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p31b-c">
							<div class="custom-select-placa">
								<select id="placa31b-c" name="placa31b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p32b-a">
							<div class="custom-select-placa">
								<select id="placa32b-a" name="placa32b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p32b-b">
							<div class="custom-select-placa">
								<select id="placa32b-b" name="placa32b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p32b-c">
							<div class="custom-select-placa">
								<select id="placa32b-c" name="placa32b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p33b-a">
							<div class="custom-select-placa">
								<select id="placa33b-a" name="placa33b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p33b-b">
							<div class="custom-select-placa">
								<select id="placa33b-b" name="placa33b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p33b-c">
							<div class="custom-select-placa">
								<select id="placa33b-c" name="placa33b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p34b-a">
							<div class="custom-select-placa">
								<select id="placa34b-a" name="placa34b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p34b-b">
							<div class="custom-select-placa">
								<select id="placa34b-b" name="placa34b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p34b-c">
							<div class="custom-select-placa">
								<select id="placa34b-c" name="placa34b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p35b-a">
							<div class="custom-select-placa">
								<select id="placa35b-a" name="placa35b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p35b-b">
							<div class="custom-select-placa">
								<select id="placa35b-b" name="placa35b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p35b-c">
							<div class="custom-select-placa">
								<select id="placa35b-c" name="placa35b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p36b-a">
							<div class="custom-select-placa">
								<select id="placa36b-a" name="placa36b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p36b-b">
							<div class="custom-select-placa">
								<select id="placa36b-b" name="placa36b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p36b-c">
							<div class="custom-select-placa">
								<select id="placa36b-c" name="placa36b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p37b-a">
							<div class="custom-select-placa">
								<select id="placa37b-a" name="placa37b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p37b-b">
							<div class="custom-select-placa">
								<select id="placa37b-b" name="placa37b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p37b-c">
							<div class="custom-select-placa">
								<select id="placa37b-c" name="placa37b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="p38b-a">
							<div class="custom-select-placa">
								<select id="placa38b-a" name="placa38b-a" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p38b-b">
							<div class="custom-select-placa">
								<select id="placa38b-b" name="placa38b-b" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
						<div id="p38b-c">
							<div class="custom-select-placa">
								<select id="placa38b-c" name="placa38b-c" data-formulario="yes" onchange="cambiarColor(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-azul"></option>
								</select>
							</div>
						</div>
					</td>
				</tr>

				<tr>
					<td class="borde">
						<div id="s31b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup31b-a" name="san_sup31b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s31b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup31b-b" name="san_sup31b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s31b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup31b-c" name="san_sup31b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s32b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup32b-a" name="san_sup32b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s32b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup32b-b" name="san_sup32b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s32b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup32b-c" name="san_sup32b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s33b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup33b-a" name="san_sup33b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s33b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup33b-b" name="san_sup33b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s33b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup33b-c" name="san_sup33b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s34b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup34b-a" name="san_sup34b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s34b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup34b-b" name="san_sup34b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s34b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup34b-c" name="san_sup34b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s35b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup35b-a" name="san_sup35b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s35b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup35b-b" name="san_sup35b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s35b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup35b-c" name="san_sup35b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s36b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup36b-a" name="san_sup36b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s36b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup36b-b" name="san_sup36b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s36b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup36b-c" name="san_sup36b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s37b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup37b-a" name="san_sup37b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s37b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup37b-b" name="san_sup37b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s37b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup37b-c" name="san_sup37b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>
					<td class="borde">
						<div id="s38b-a">
							<div class="custom-select-sangrado">
								<select id="san_sup38b-a" name="san_sup38b-a" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s38b-b">
							<div class="custom-select-sangrado">
								<select id="san_sup38b-b" name="san_sup38b-b" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
						<div id="s38b-c">
							<div class="custom-select-sangrado">
								<select id="san_sup38b-c" name="san_sup38b-c" data-actual-valor="0" data-formulario="yes" onchange="cambiarColorSangradoSupuracion(this);">
									<option value="0" class="opcion-blanco"></option>
									<option value="1" class="opcion-rojo"></option>
									<option value="2" class="opcion-rojo-amarillo"></option>
								</select>
							</div>
						</div>
					</td>

				</tr>

				<tr>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde"></td>
					<td class="borde">
						<div id="f36b"> <select id="Select_f36b" name="Furca_f36b" data-formulario="yes" onchange="ActualizarFurca(this,'f36b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f37b"> <select id="Select_f37b" name="Furca_f37b" data-formulario="yes" onchange="ActualizarFurca(this,'f37b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="f38b"> <select id="Select_f38b" name="Furca_f38b" data-formulario="yes" onchange="ActualizarFurca(this,'f38b');">
								<option value="0">0</option>
								<option value="1">1</option>
								<option value="2">2</option>
								<option value="3">3</option>
							</select></div>
					</td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="pi31b" name="pi31b" data-formulario="yes" tabindex="553"></td>
					<td class="borde"><input type="text" id="pi32b" name="pi32b" data-formulario="yes" tabindex="554"></td>
					<td class="borde"><input type="text" id="pi33b" name="pi33b" data-formulario="yes" tabindex="555"></td>
					<td class="borde"><input type="text" id="pi34b" name="pi34b" data-formulario="yes" tabindex="556"></td>
					<td class="borde"><input type="text" id="pi35b" name="pi35b" data-formulario="yes" tabindex="557"></td>
					<td class="borde"><input type="text" id="pi36b" name="pi36b" data-formulario="yes" tabindex="558"></td>
					<td class="borde"><input type="text" id="pi37b" name="pi37b" data-formulario="yes" tabindex="559"></td>
					<td class="borde"><input type="text" id="pi38b" name="pi38b" data-formulario="yes" tabindex="560"></td>
				</tr>

				<tr>
					<td class="borde"><input type="text" id="m31b" name="m31b" data-formulario="yes" value="0" tabindex="569" onchange="rangoNumero(&#39;m31b&#39;)"></td>
					<td class="borde"><input type="text" id="m32b" name="m32b" data-formulario="yes" value="0" tabindex="570" onchange="rangoNumero(&#39;m32b&#39;)"></td>
					<td class="borde"><input type="text" id="m33b" name="m33b" data-formulario="yes" value="0" tabindex="571" onchange="rangoNumero(&#39;m33b&#39;)"></td>
					<td class="borde"><input type="text" id="m34b" name="m34b" data-formulario="yes" value="0" tabindex="572" onchange="rangoNumero(&#39;m34b&#39;)"></td>
					<td class="borde"><input type="text" id="m35b" name="m35b" data-formulario="yes" value="0" tabindex="573" onchange="rangoNumero(&#39;m35b&#39;)"></td>
					<td class="borde"><input type="text" id="m36b" name="m36b" data-formulario="yes" value="0" tabindex="574" onchange="rangoNumero(&#39;m36b&#39;)"></td>
					<td class="borde"><input type="text" id="m37b" name="m37b" data-formulario="yes" value="0" tabindex="575" onchange="rangoNumero(&#39;m37b&#39;)"></td>
					<td class="borde"><input type="text" id="m38b" name="m38b" data-formulario="yes" value="0" tabindex="576" onchange="rangoNumero(&#39;m38b&#39;)"></td>
				</tr>

				<tr>
					<td class="borde">
						<div id="i31b"><select id="Select_i31" name="Implante_i31" data-formulario="yes" onchange="ActualizarDiente(this,'i31b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i32b"><select id="Select_i32" name="Implante_i32" data-formulario="yes" onchange="ActualizarDiente(this,'i32b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i33b"><select id="Select_i33" name="Implante_i33" data-formulario="yes" onchange="ActualizarDiente(this,'i33b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i34b"><select id="Select_i34" name="Implante_i34" data-formulario="yes" onchange="ActualizarDiente(this,'i34b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i35b"><select id="Select_i35" name="Implante_i35" data-formulario="yes" onchange="ActualizarDiente(this,'i35b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i36b"><select id="Select_i36" name="Implante_i36" data-formulario="yes" onchange="ActualizarDiente(this,'i36b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i37b"><select id="Select_i37" name="Implante_i37" data-formulario="yes" onchange="ActualizarDiente(this,'i37b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
					<td class="borde">
						<div id="i38b"><select id="Select_i38" name="Implante_i38" data-formulario="yes" onchange="ActualizarDiente(this,'i38b')">
								<option value="0">0</option>
								<option value="1">1</option>
							</select></div>
					</td>
				</tr>

				<tr>
					<td class="borde">
						<div id="d31b" style="pointer-events: none;">3.1</div> <input type="checkbox" id="d31b_estado" name="d31b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d32b" style="pointer-events: none;">3.2</div> <input type="checkbox" id="d32b_estado" name="d32b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d33b" style="pointer-events: none;">3.3</div> <input type="checkbox" id="d33b_estado" name="d33b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d34b" style="pointer-events: none;">3.4</div> <input type="checkbox" id="d34b_estado" name="d34b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d35b" style="pointer-events: none;">3.5</div> <input type="checkbox" id="d35b_estado" name="d35b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d36b" style="pointer-events: none;">3.6</div> <input type="checkbox" id="d36b_estado" name="d36b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d37b" style="pointer-events: none;">3.7</div> <input type="checkbox" id="d37b_estado" name="d37b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
					<td class="borde">
						<div id="d38b" style="pointer-events: none;">3.8</div> <input type="checkbox" id="d38b_estado" name="d38b_estado" data-formulario="yes3" style="z-index: 1" onchange="EjecutarEstado(this);" value="1">
					</td>
				</tr>


			</tbody>
		</table>
	</td>
</tr>

<tr>
	<td colspan="2">
		<div id="tabla-resultados">
			<table>
				<tbody>
					<tr>
						<td>Media de prof. de sondaje= <div id="suma4">0</div> mm</td>
						<td>Media de nivel de inserción= <div id="suma5">0</div>mm</td>
						<td>
							<div id="suma2">0</div>% Placa
						</td>
						<td>
							<div id="suma">0</div>% Sangrado al sondaje
						</td>
					</tr>
				</tbody>
			</table>
		</div>
	</td>
</tr>

</tbody>
</table>
<hr>


</div><!--wrapper-->




</div>
</div>
</div>
</div>
</section>

</div>

<script type="text/javascript">
function getDefectos(){

      var datops18a=document.getElementById('ps18-a').value;
      var datops18b=document.getElementById('ps18-b').value;
      var datops18c=document.getElementById('ps18-c').value;
    
      var datops17a=document.getElementById('ps17-a').value;
      var datops17b=document.getElementById('ps17-b').value;
      var datops17c=document.getElementById('ps17-c').value;
      
      var datops16a=document.getElementById('ps16-a').value;
      var datops16b=document.getElementById('ps16-b').value;
      var datops16c=document.getElementById('ps16-c').value;
      
      var datops15a=document.getElementById('ps15-a').value;
      var datops15b=document.getElementById('ps15-b').value;
      var datops15c=document.getElementById('ps15-c').value;
      
      var datops14a=document.getElementById('ps14-a').value;
      var datops14b=document.getElementById('ps14-b').value;
      var datops14c=document.getElementById('ps14-c').value;
      
      var datops13a=document.getElementById('ps13-a').value;
      var datops13b=document.getElementById('ps13-b').value;
      var datops13c=document.getElementById('ps13-c').value;
      
      var datops12a=document.getElementById('ps12-a').value;
      var datops12b=document.getElementById('ps12-b').value;
      var datops12c=document.getElementById('ps12-c').value;
    
      var datops11a=document.getElementById('ps11-a').value;
      var datops11b=document.getElementById('ps11-b').value;
      var datops11c=document.getElementById('ps11-c').value;

      var total18=parseInt(datops18a)+parseInt(datops18b)+parseInt(datops18c)+
            parseInt(datops17a)+parseInt(datops17b)+parseInt(datops17c)+
            parseInt(datops16a)+parseInt(datops16b)+parseInt(datops16c)+
            parseInt(datops15a)+parseInt(datops15b)+parseInt(datops15c)+
            parseInt(datops14a)+parseInt(datops14b)+parseInt(datops14c)+
            parseInt(datops13a)+parseInt(datops13b)+parseInt(datops13c)+
            parseInt(datops12a)+parseInt(datops12b)+parseInt(datops12c)+
            parseInt(datops11a)+parseInt(datops11b)+parseInt(datops11c);
            
      var datops28a=document.getElementById('ps28-a').value;
      var datops28b=document.getElementById('ps28-b').value;
      var datops28c=document.getElementById('ps28-c').value;
    
      var datops27a=document.getElementById('ps27-a').value;
      var datops27b=document.getElementById('ps27-b').value;
      var datops27c=document.getElementById('ps27-c').value;
      
      var datops26a=document.getElementById('ps26-a').value;
      var datops26b=document.getElementById('ps26-b').value;
      var datops26c=document.getElementById('ps26-c').value;
      
      var datops25a=document.getElementById('ps25-a').value;
      var datops25b=document.getElementById('ps25-b').value;
      var datops25c=document.getElementById('ps25-c').value;
      
      var datops24a=document.getElementById('ps24-a').value;
      var datops24b=document.getElementById('ps24-b').value;
      var datops24c=document.getElementById('ps24-c').value;
      
      var datops23a=document.getElementById('ps23-a').value;
      var datops23b=document.getElementById('ps23-b').value;
      var datops23c=document.getElementById('ps23-c').value;
      
      var datops22a=document.getElementById('ps22-a').value;
      var datops22b=document.getElementById('ps22-b').value;
      var datops22c=document.getElementById('ps22-c').value;
    
      var datops21a=document.getElementById('ps21-a').value;
      var datops21b=document.getElementById('ps21-b').value;
      var datops21c=document.getElementById('ps21-c').value;

      var total28=parseInt(datops28a)+parseInt(datops28b)+parseInt(datops28c)+
            parseInt(datops27a)+parseInt(datops27b)+parseInt(datops27c)+
            parseInt(datops26a)+parseInt(datops26b)+parseInt(datops26c)+
            parseInt(datops25a)+parseInt(datops25b)+parseInt(datops25c)+
            parseInt(datops24a)+parseInt(datops24b)+parseInt(datops24c)+
            parseInt(datops23a)+parseInt(datops23b)+parseInt(datops23c)+
            parseInt(datops22a)+parseInt(datops22b)+parseInt(datops22c)+
            parseInt(datops21a)+parseInt(datops21b)+parseInt(datops21c);      
    
    
      var datops38a=document.getElementById('ps38-a').value;
      var datops38b=document.getElementById('ps38-b').value;
      var datops38c=document.getElementById('ps38-c').value;
    
      var datops37a=document.getElementById('ps37-a').value;
      var datops37b=document.getElementById('ps37-b').value;
      var datops37c=document.getElementById('ps37-c').value;
      
      var datops36a=document.getElementById('ps36-a').value;
      var datops36b=document.getElementById('ps36-b').value;
      var datops36c=document.getElementById('ps36-c').value;
      
      var datops35a=document.getElementById('ps35-a').value;
      var datops35b=document.getElementById('ps35-b').value;
      var datops35c=document.getElementById('ps35-c').value;
      
      var datops34a=document.getElementById('ps34-a').value;
      var datops34b=document.getElementById('ps34-b').value;
      var datops34c=document.getElementById('ps34-c').value;
      
      var datops33a=document.getElementById('ps33-a').value;
      var datops33b=document.getElementById('ps33-b').value;
      var datops33c=document.getElementById('ps33-c').value;
      
      var datops32a=document.getElementById('ps32-a').value;
      var datops32b=document.getElementById('ps32-b').value;
      var datops32c=document.getElementById('ps32-c').value;
    
      var datops31a=document.getElementById('ps31-a').value;
      var datops31b=document.getElementById('ps31-b').value;
      var datops31c=document.getElementById('ps31-c').value;

      var total38=parseInt(datops38a)+parseInt(datops38b)+parseInt(datops38c)+
            parseInt(datops37a)+parseInt(datops37b)+parseInt(datops37c)+
            parseInt(datops36a)+parseInt(datops36b)+parseInt(datops36c)+
            parseInt(datops35a)+parseInt(datops35b)+parseInt(datops35c)+
            parseInt(datops34a)+parseInt(datops34b)+parseInt(datops34c)+
            parseInt(datops33a)+parseInt(datops33b)+parseInt(datops33c)+
            parseInt(datops32a)+parseInt(datops32b)+parseInt(datops32c)+
            parseInt(datops31a)+parseInt(datops31b)+parseInt(datops31c);
            
      var datops48a=document.getElementById('ps48-a').value;
      var datops48b=document.getElementById('ps48-b').value;
      var datops48c=document.getElementById('ps48-c').value;
    
      var datops47a=document.getElementById('ps47-a').value;
      var datops47b=document.getElementById('ps47-b').value;
      var datops47c=document.getElementById('ps47-c').value;
      
      var datops46a=document.getElementById('ps46-a').value;
      var datops46b=document.getElementById('ps46-b').value;
      var datops46c=document.getElementById('ps46-c').value;
      
      var datops45a=document.getElementById('ps45-a').value;
      var datops45b=document.getElementById('ps45-b').value;
      var datops45c=document.getElementById('ps45-c').value;
      
      var datops44a=document.getElementById('ps44-a').value;
      var datops44b=document.getElementById('ps44-b').value;
      var datops44c=document.getElementById('ps44-c').value;
      
      var datops43a=document.getElementById('ps43-a').value;
      var datops43b=document.getElementById('ps43-b').value;
      var datops43c=document.getElementById('ps43-c').value;
      
      var datops42a=document.getElementById('ps42-a').value;
      var datops42b=document.getElementById('ps42-b').value;
      var datops42c=document.getElementById('ps42-c').value;
    
      var datops41a=document.getElementById('ps41-a').value;
      var datops41b=document.getElementById('ps41-b').value;
      var datops41c=document.getElementById('ps41-c').value;

      var total48=parseInt(datops48a)+parseInt(datops48b)+parseInt(datops48c)+
            parseInt(datops47a)+parseInt(datops47b)+parseInt(datops47c)+
            parseInt(datops46a)+parseInt(datops46b)+parseInt(datops46c)+
            parseInt(datops45a)+parseInt(datops45b)+parseInt(datops45c)+
            parseInt(datops44a)+parseInt(datops44b)+parseInt(datops44c)+
            parseInt(datops43a)+parseInt(datops43b)+parseInt(datops43c)+
            parseInt(datops42a)+parseInt(datops42b)+parseInt(datops42c)+
            parseInt(datops41a)+parseInt(datops41b)+parseInt(datops41c);

      var datops18ba=document.getElementById('ps18b-a').value;
      var datops18bb=document.getElementById('ps18b-b').value;
      var datops18bc=document.getElementById('ps18b-c').value;
    
      var datops17ba=document.getElementById('ps17b-a').value;
      var datops17bb=document.getElementById('ps17b-b').value;
      var datops17bc=document.getElementById('ps17b-c').value;
      
      var datops16ba=document.getElementById('ps16b-a').value;
      var datops16bb=document.getElementById('ps16b-b').value;
      var datops16bc=document.getElementById('ps16b-c').value;
      
      var datops15ba=document.getElementById('ps15b-a').value;
      var datops15bb=document.getElementById('ps15b-b').value;
      var datops15bc=document.getElementById('ps15b-c').value;
      
      var datops14ba=document.getElementById('ps14b-a').value;
      var datops14bb=document.getElementById('ps14b-b').value;
      var datops14bc=document.getElementById('ps14b-c').value;
      
      var datops13ba=document.getElementById('ps13b-a').value;
      var datops13bb=document.getElementById('ps13b-b').value;
      var datops13bc=document.getElementById('ps13b-c').value;
      
      var datops12ba=document.getElementById('ps12b-a').value;
      var datops12bb=document.getElementById('ps12b-b').value;
      var datops12bc=document.getElementById('ps12b-c').value;
    
      var datops11ba=document.getElementById('ps11b-a').value;
      var datops11bb=document.getElementById('ps11b-b').value;
      var datops11bc=document.getElementById('ps11b-c').value;

      var total18b=parseInt(datops18ba)+parseInt(datops18bb)+parseInt(datops18bc)+
            parseInt(datops17ba)+parseInt(datops17bb)+parseInt(datops17bc)+
            parseInt(datops16ba)+parseInt(datops16bb)+parseInt(datops16bc)+
            parseInt(datops15ba)+parseInt(datops15bb)+parseInt(datops15bc)+
            parseInt(datops14ba)+parseInt(datops14bb)+parseInt(datops14bc)+
            parseInt(datops13ba)+parseInt(datops13bb)+parseInt(datops13bc)+
            parseInt(datops12ba)+parseInt(datops12bb)+parseInt(datops12bc)+
            parseInt(datops11ba)+parseInt(datops11bb)+parseInt(datops11bc);


      var datops28ba=document.getElementById('ps28b-a').value;
      var datops28bb=document.getElementById('ps28b-b').value;
      var datops28bc=document.getElementById('ps28b-c').value;
    
      var datops27ba=document.getElementById('ps27b-a').value;
      var datops27bb=document.getElementById('ps27b-b').value;
      var datops27bc=document.getElementById('ps27b-c').value;
      
      var datops26ba=document.getElementById('ps26b-a').value;
      var datops26bb=document.getElementById('ps26b-b').value;
      var datops26bc=document.getElementById('ps26b-c').value;
      
      var datops25ba=document.getElementById('ps25b-a').value;
      var datops25bb=document.getElementById('ps25b-b').value;
      var datops25bc=document.getElementById('ps25b-c').value;
      
      var datops24ba=document.getElementById('ps24b-a').value;
      var datops24bb=document.getElementById('ps24b-b').value;
      var datops24bc=document.getElementById('ps24b-c').value;
      
      var datops23ba=document.getElementById('ps23b-a').value;
      var datops23bb=document.getElementById('ps23b-b').value;
      var datops23bc=document.getElementById('ps23b-c').value;
      
      var datops22ba=document.getElementById('ps22b-a').value;
      var datops22bb=document.getElementById('ps22b-b').value;
      var datops22bc=document.getElementById('ps22b-c').value;
    
      var datops21ba=document.getElementById('ps21b-a').value;
      var datops21bb=document.getElementById('ps21b-b').value;
      var datops21bc=document.getElementById('ps21b-c').value;

      var total28b=parseInt(datops28ba)+parseInt(datops28bb)+parseInt(datops28bc)+
            parseInt(datops27ba)+parseInt(datops27bb)+parseInt(datops27bc)+
            parseInt(datops26ba)+parseInt(datops26bb)+parseInt(datops26bc)+
            parseInt(datops25ba)+parseInt(datops25bb)+parseInt(datops25bc)+
            parseInt(datops24ba)+parseInt(datops24bb)+parseInt(datops24bc)+
            parseInt(datops23ba)+parseInt(datops23bb)+parseInt(datops23bc)+
            parseInt(datops22ba)+parseInt(datops22bb)+parseInt(datops22bc)+
            parseInt(datops21ba)+parseInt(datops21bb)+parseInt(datops21bc); 

      var datops38ba=document.getElementById('ps38b-a').value;
      var datops38bb=document.getElementById('ps38b-b').value;
      var datops38bc=document.getElementById('ps38b-c').value;
    
      var datops37ba=document.getElementById('ps37b-a').value;
      var datops37bb=document.getElementById('ps37b-b').value;
      var datops37bc=document.getElementById('ps37b-c').value;
      
      var datops36ba=document.getElementById('ps36b-a').value;
      var datops36bb=document.getElementById('ps36b-b').value;
      var datops36bc=document.getElementById('ps36b-c').value;
      
      var datops35ba=document.getElementById('ps35b-a').value;
      var datops35bb=document.getElementById('ps35b-b').value;
      var datops35bc=document.getElementById('ps35b-c').value;
      
      var datops34ba=document.getElementById('ps34b-a').value;
      var datops34bb=document.getElementById('ps34b-b').value;
      var datops34bc=document.getElementById('ps34b-c').value;
      
      var datops33ba=document.getElementById('ps33b-a').value;
      var datops33bb=document.getElementById('ps33b-b').value;
      var datops33bc=document.getElementById('ps33b-c').value;
      
      var datops32ba=document.getElementById('ps32b-a').value;
      var datops32bb=document.getElementById('ps32b-b').value;
      var datops32bc=document.getElementById('ps32b-c').value;
    
      var datops31ba=document.getElementById('ps31b-a').value;
      var datops31bb=document.getElementById('ps31b-b').value;
      var datops31bc=document.getElementById('ps31b-c').value;

      var total38b=parseInt(datops38ba)+parseInt(datops38bb)+parseInt(datops38bc)+
            parseInt(datops37ba)+parseInt(datops37bb)+parseInt(datops37bc)+
            parseInt(datops36ba)+parseInt(datops36bb)+parseInt(datops36bc)+
            parseInt(datops35ba)+parseInt(datops35bb)+parseInt(datops35bc)+
            parseInt(datops34ba)+parseInt(datops34bb)+parseInt(datops34bc)+
            parseInt(datops33ba)+parseInt(datops33bb)+parseInt(datops33bc)+
            parseInt(datops32ba)+parseInt(datops32bb)+parseInt(datops32bc)+
            parseInt(datops31ba)+parseInt(datops31bb)+parseInt(datops31bc);
      
      var datops48ba=document.getElementById('ps48b-a').value;
      var datops48bb=document.getElementById('ps48b-b').value;
      var datops48bc=document.getElementById('ps48b-c').value;
    
      var datops47ba=document.getElementById('ps47b-a').value;
      var datops47bb=document.getElementById('ps47b-b').value;
      var datops47bc=document.getElementById('ps47b-c').value;
      
      var datops46ba=document.getElementById('ps46b-a').value;
      var datops46bb=document.getElementById('ps46b-b').value;
      var datops46bc=document.getElementById('ps46b-c').value;
      
      var datops45ba=document.getElementById('ps45b-a').value;
      var datops45bb=document.getElementById('ps45b-b').value;
      var datops45bc=document.getElementById('ps45b-c').value;
      
      var datops44ba=document.getElementById('ps44b-a').value;
      var datops44bb=document.getElementById('ps44b-b').value;
      var datops44bc=document.getElementById('ps44b-c').value;
      
      var datops43ba=document.getElementById('ps43b-a').value;
      var datops43bb=document.getElementById('ps43b-b').value;
      var datops43bc=document.getElementById('ps43b-c').value;
      
      var datops42ba=document.getElementById('ps42b-a').value;
      var datops42bb=document.getElementById('ps42b-b').value;
      var datops42bc=document.getElementById('ps42b-c').value;
    
      var datops41ba=document.getElementById('ps41b-a').value;
      var datops41bb=document.getElementById('ps41b-b').value;
      var datops41bc=document.getElementById('ps41b-c').value;

      var total48b=parseInt(datops48ba)+parseInt(datops48bb)+parseInt(datops48bc)+
            parseInt(datops47ba)+parseInt(datops47bb)+parseInt(datops47bc)+
            parseInt(datops46ba)+parseInt(datops46bb)+parseInt(datops46bc)+
            parseInt(datops45ba)+parseInt(datops45bb)+parseInt(datops45bc)+
            parseInt(datops44ba)+parseInt(datops44bb)+parseInt(datops44bc)+
            parseInt(datops43ba)+parseInt(datops43bb)+parseInt(datops43bc)+
            parseInt(datops42ba)+parseInt(datops42bb)+parseInt(datops42bc)+
            parseInt(datops41ba)+parseInt(datops41bb)+parseInt(datops41bc);
            
      var totalps=total18+total28+total38+total48+total18b+total28b+total38b+total48b;
      var mediaps=totalps/(totalDientes*3);
      var redondeado = Math.round(mediaps*Math.pow(10,2))/Math.pow(10,2);
      
      $("#suma4").text(redondeado);
      
      
      var datomg18a=document.getElementById('mg18-a').value;
      var datomg18b=document.getElementById('mg18-b').value;
      var datomg18c=document.getElementById('mg18-c').value;
    
      var datomg17a=document.getElementById('mg17-a').value;
      var datomg17b=document.getElementById('mg17-b').value;
      var datomg17c=document.getElementById('mg17-c').value;
      
      var datomg16a=document.getElementById('mg16-a').value;
      var datomg16b=document.getElementById('mg16-b').value;
      var datomg16c=document.getElementById('mg16-c').value;
      
      var datomg15a=document.getElementById('mg15-a').value;
      var datomg15b=document.getElementById('mg15-b').value;
      var datomg15c=document.getElementById('mg15-c').value;
      
      var datomg14a=document.getElementById('mg14-a').value;
      var datomg14b=document.getElementById('mg14-b').value;
      var datomg14c=document.getElementById('mg14-c').value;
      
      var datomg13a=document.getElementById('mg13-a').value;
      var datomg13b=document.getElementById('mg13-b').value;
      var datomg13c=document.getElementById('mg13-c').value;
      
      var datomg12a=document.getElementById('mg12-a').value;
      var datomg12b=document.getElementById('mg12-b').value;
      var datomg12c=document.getElementById('mg12-c').value;
    
      var datomg11a=document.getElementById('mg11-a').value;
      var datomg11b=document.getElementById('mg11-b').value;
      var datomg11c=document.getElementById('mg11-c').value;

      var total18m=parseInt(datomg18a)+parseInt(datomg18b)+parseInt(datomg18c)+
            parseInt(datomg17a)+parseInt(datomg17b)+parseInt(datomg17c)+
            parseInt(datomg16a)+parseInt(datomg16b)+parseInt(datomg16c)+
            parseInt(datomg15a)+parseInt(datomg15b)+parseInt(datomg15c)+
            parseInt(datomg14a)+parseInt(datomg14b)+parseInt(datomg14c)+
            parseInt(datomg13a)+parseInt(datomg13b)+parseInt(datomg13c)+
            parseInt(datomg12a)+parseInt(datomg12b)+parseInt(datomg12c)+
            parseInt(datomg11a)+parseInt(datomg11b)+parseInt(datomg11c);
            
      var datomg28a=document.getElementById('mg28-a').value;
      var datomg28b=document.getElementById('mg28-b').value;
      var datomg28c=document.getElementById('mg28-c').value;
    
      var datomg27a=document.getElementById('mg27-a').value;
      var datomg27b=document.getElementById('mg27-b').value;
      var datomg27c=document.getElementById('mg27-c').value;
      
      var datomg26a=document.getElementById('mg26-a').value;
      var datomg26b=document.getElementById('mg26-b').value;
      var datomg26c=document.getElementById('mg26-c').value;
      
      var datomg25a=document.getElementById('mg25-a').value;
      var datomg25b=document.getElementById('mg25-b').value;
      var datomg25c=document.getElementById('mg25-c').value;
      
      var datomg24a=document.getElementById('mg24-a').value;
      var datomg24b=document.getElementById('mg24-b').value;
      var datomg24c=document.getElementById('mg24-c').value;
      
      var datomg23a=document.getElementById('mg23-a').value;
      var datomg23b=document.getElementById('mg23-b').value;
      var datomg23c=document.getElementById('mg23-c').value;
      
      var datomg22a=document.getElementById('mg22-a').value;
      var datomg22b=document.getElementById('mg22-b').value;
      var datomg22c=document.getElementById('mg22-c').value;
    
      var datomg21a=document.getElementById('mg21-a').value;
      var datomg21b=document.getElementById('mg21-b').value;
      var datomg21c=document.getElementById('mg21-c').value;

      var total28m=parseInt(datomg28a)+parseInt(datomg28b)+parseInt(datomg28c)+
            parseInt(datomg27a)+parseInt(datomg27b)+parseInt(datomg27c)+
            parseInt(datomg26a)+parseInt(datomg26b)+parseInt(datomg26c)+
            parseInt(datomg25a)+parseInt(datomg25b)+parseInt(datomg25c)+
            parseInt(datomg24a)+parseInt(datomg24b)+parseInt(datomg24c)+
            parseInt(datomg23a)+parseInt(datomg23b)+parseInt(datomg23c)+
            parseInt(datomg22a)+parseInt(datomg22b)+parseInt(datomg22c)+
            parseInt(datomg21a)+parseInt(datomg21b)+parseInt(datomg21c);      
    
    
      var datomg38a=document.getElementById('mg38-a').value;
      var datomg38b=document.getElementById('mg38-b').value;
      var datomg38c=document.getElementById('mg38-c').value;
    
      var datomg37a=document.getElementById('mg37-a').value;
      var datomg37b=document.getElementById('mg37-b').value;
      var datomg37c=document.getElementById('mg37-c').value;
      
      var datomg36a=document.getElementById('mg36-a').value;
      var datomg36b=document.getElementById('mg36-b').value;
      var datomg36c=document.getElementById('mg36-c').value;
      
      var datomg35a=document.getElementById('mg35-a').value;
      var datomg35b=document.getElementById('mg35-b').value;
      var datomg35c=document.getElementById('mg35-c').value;
      
      var datomg34a=document.getElementById('mg34-a').value;
      var datomg34b=document.getElementById('mg34-b').value;
      var datomg34c=document.getElementById('mg34-c').value;
      
      var datomg33a=document.getElementById('mg33-a').value;
      var datomg33b=document.getElementById('mg33-b').value;
      var datomg33c=document.getElementById('mg33-c').value;
      
      var datomg32a=document.getElementById('mg32-a').value;
      var datomg32b=document.getElementById('mg32-b').value;
      var datomg32c=document.getElementById('mg32-c').value;
    
      var datomg31a=document.getElementById('mg31-a').value;
      var datomg31b=document.getElementById('mg31-b').value;
      var datomg31c=document.getElementById('mg31-c').value;

      var total38m=parseInt(datomg38a)+parseInt(datomg38b)+parseInt(datomg38c)+
            parseInt(datomg37a)+parseInt(datomg37b)+parseInt(datomg37c)+
            parseInt(datomg36a)+parseInt(datomg36b)+parseInt(datomg36c)+
            parseInt(datomg35a)+parseInt(datomg35b)+parseInt(datomg35c)+
            parseInt(datomg34a)+parseInt(datomg34b)+parseInt(datomg34c)+
            parseInt(datomg33a)+parseInt(datomg33b)+parseInt(datomg33c)+
            parseInt(datomg32a)+parseInt(datomg32b)+parseInt(datomg32c)+
            parseInt(datomg31a)+parseInt(datomg31b)+parseInt(datomg31c);
            
      var datomg48a=document.getElementById('mg48-a').value;
      var datomg48b=document.getElementById('mg48-b').value;
      var datomg48c=document.getElementById('mg48-c').value;
    
      var datomg47a=document.getElementById('mg47-a').value;
      var datomg47b=document.getElementById('mg47-b').value;
      var datomg47c=document.getElementById('mg47-c').value;
      
      var datomg46a=document.getElementById('mg46-a').value;
      var datomg46b=document.getElementById('mg46-b').value;
      var datomg46c=document.getElementById('mg46-c').value;
      
      var datomg45a=document.getElementById('mg45-a').value;
      var datomg45b=document.getElementById('mg45-b').value;
      var datomg45c=document.getElementById('mg45-c').value;
      
      var datomg44a=document.getElementById('mg44-a').value;
      var datomg44b=document.getElementById('mg44-b').value;
      var datomg44c=document.getElementById('mg44-c').value;
      
      var datomg43a=document.getElementById('mg43-a').value;
      var datomg43b=document.getElementById('mg43-b').value;
      var datomg43c=document.getElementById('mg43-c').value;
      
      var datomg42a=document.getElementById('mg42-a').value;
      var datomg42b=document.getElementById('mg42-b').value;
      var datomg42c=document.getElementById('mg42-c').value;
    
      var datomg41a=document.getElementById('mg41-a').value;
      var datomg41b=document.getElementById('mg41-b').value;
      var datomg41c=document.getElementById('mg41-c').value;

      var total48m=parseInt(datomg48a)+parseInt(datomg48b)+parseInt(datomg48c)+
            parseInt(datomg47a)+parseInt(datomg47b)+parseInt(datomg47c)+
            parseInt(datomg46a)+parseInt(datomg46b)+parseInt(datomg46c)+
            parseInt(datomg45a)+parseInt(datomg45b)+parseInt(datomg45c)+
            parseInt(datomg44a)+parseInt(datomg44b)+parseInt(datomg44c)+
            parseInt(datomg43a)+parseInt(datomg43b)+parseInt(datomg43c)+
            parseInt(datomg42a)+parseInt(datomg42b)+parseInt(datomg42c)+
            parseInt(datomg41a)+parseInt(datomg41b)+parseInt(datomg41c);

      var datomg18ba=document.getElementById('mg18b-a').value;
      var datomg18bb=document.getElementById('mg18b-b').value;
      var datomg18bc=document.getElementById('mg18b-c').value;
    
      var datomg17ba=document.getElementById('mg17b-a').value;
      var datomg17bb=document.getElementById('mg17b-b').value;
      var datomg17bc=document.getElementById('mg17b-c').value;
      
      var datomg16ba=document.getElementById('mg16b-a').value;
      var datomg16bb=document.getElementById('mg16b-b').value;
      var datomg16bc=document.getElementById('mg16b-c').value;
      
      var datomg15ba=document.getElementById('mg15b-a').value;
      var datomg15bb=document.getElementById('mg15b-b').value;
      var datomg15bc=document.getElementById('mg15b-c').value;
      
      var datomg14ba=document.getElementById('mg14b-a').value;
      var datomg14bb=document.getElementById('mg14b-b').value;
      var datomg14bc=document.getElementById('mg14b-c').value;
      
      var datomg13ba=document.getElementById('mg13b-a').value;
      var datomg13bb=document.getElementById('mg13b-b').value;
      var datomg13bc=document.getElementById('mg13b-c').value;
      
      var datomg12ba=document.getElementById('mg12b-a').value;
      var datomg12bb=document.getElementById('mg12b-b').value;
      var datomg12bc=document.getElementById('mg12b-c').value;
    
      var datomg11ba=document.getElementById('mg11b-a').value;
      var datomg11bb=document.getElementById('mg11b-b').value;
      var datomg11bc=document.getElementById('mg11b-c').value;

      var total18bm=parseInt(datomg18ba)+parseInt(datomg18bb)+parseInt(datomg18bc)+
            parseInt(datomg17ba)+parseInt(datomg17bb)+parseInt(datomg17bc)+
            parseInt(datomg16ba)+parseInt(datomg16bb)+parseInt(datomg16bc)+
            parseInt(datomg15ba)+parseInt(datomg15bb)+parseInt(datomg15bc)+
            parseInt(datomg14ba)+parseInt(datomg14bb)+parseInt(datomg14bc)+
            parseInt(datomg13ba)+parseInt(datomg13bb)+parseInt(datomg13bc)+
            parseInt(datomg12ba)+parseInt(datomg12bb)+parseInt(datomg12bc)+
            parseInt(datomg11ba)+parseInt(datomg11bb)+parseInt(datomg11bc);


      var datomg28ba=document.getElementById('mg28b-a').value;
      var datomg28bb=document.getElementById('mg28b-b').value;
      var datomg28bc=document.getElementById('mg28b-c').value;
    
      var datomg27ba=document.getElementById('mg27b-a').value;
      var datomg27bb=document.getElementById('mg27b-b').value;
      var datomg27bc=document.getElementById('mg27b-c').value;
      
      var datomg26ba=document.getElementById('mg26b-a').value;
      var datomg26bb=document.getElementById('mg26b-b').value;
      var datomg26bc=document.getElementById('mg26b-c').value;
      
      var datomg25ba=document.getElementById('mg25b-a').value;
      var datomg25bb=document.getElementById('mg25b-b').value;
      var datomg25bc=document.getElementById('mg25b-c').value;
      
      var datomg24ba=document.getElementById('mg24b-a').value;
      var datomg24bb=document.getElementById('mg24b-b').value;
      var datomg24bc=document.getElementById('mg24b-c').value;
      
      var datomg23ba=document.getElementById('mg23b-a').value;
      var datomg23bb=document.getElementById('mg23b-b').value;
      var datomg23bc=document.getElementById('mg23b-c').value;
      
      var datomg22ba=document.getElementById('mg22b-a').value;
      var datomg22bb=document.getElementById('mg22b-b').value;
      var datomg22bc=document.getElementById('mg22b-c').value;
    
      var datomg21ba=document.getElementById('mg21b-a').value;
      var datomg21bb=document.getElementById('mg21b-b').value;
      var datomg21bc=document.getElementById('mg21b-c').value;

      var total28bm=parseInt(datomg28ba)+parseInt(datomg28bb)+parseInt(datomg28bc)+
            parseInt(datomg27ba)+parseInt(datomg27bb)+parseInt(datomg27bc)+
            parseInt(datomg26ba)+parseInt(datomg26bb)+parseInt(datomg26bc)+
            parseInt(datomg25ba)+parseInt(datomg25bb)+parseInt(datomg25bc)+
            parseInt(datomg24ba)+parseInt(datomg24bb)+parseInt(datomg24bc)+
            parseInt(datomg23ba)+parseInt(datomg23bb)+parseInt(datomg23bc)+
            parseInt(datomg22ba)+parseInt(datomg22bb)+parseInt(datomg22bc)+
            parseInt(datomg21ba)+parseInt(datomg21bb)+parseInt(datomg21bc); 

      var datomg38ba=document.getElementById('mg38b-a').value;
      var datomg38bb=document.getElementById('mg38b-b').value;
      var datomg38bc=document.getElementById('mg38b-c').value;
    
      var datomg37ba=document.getElementById('mg37b-a').value;
      var datomg37bb=document.getElementById('mg37b-b').value;
      var datomg37bc=document.getElementById('mg37b-c').value;
      
      var datomg36ba=document.getElementById('mg36b-a').value;
      var datomg36bb=document.getElementById('mg36b-b').value;
      var datomg36bc=document.getElementById('mg36b-c').value;
      
      var datomg35ba=document.getElementById('mg35b-a').value;
      var datomg35bb=document.getElementById('mg35b-b').value;
      var datomg35bc=document.getElementById('mg35b-c').value;
      
      var datomg34ba=document.getElementById('mg34b-a').value;
      var datomg34bb=document.getElementById('mg34b-b').value;
      var datomg34bc=document.getElementById('mg34b-c').value;
      
      var datomg33ba=document.getElementById('mg33b-a').value;
      var datomg33bb=document.getElementById('mg33b-b').value;
      var datomg33bc=document.getElementById('mg33b-c').value;
      
      var datomg32ba=document.getElementById('mg32b-a').value;
      var datomg32bb=document.getElementById('mg32b-b').value;
      var datomg32bc=document.getElementById('mg32b-c').value;
    
      var datomg31ba=document.getElementById('mg31b-a').value;
      var datomg31bb=document.getElementById('mg31b-b').value;
      var datomg31bc=document.getElementById('mg31b-c').value;

      var total38bm=parseInt(datomg38ba)+parseInt(datomg38bb)+parseInt(datomg38bc)+
            parseInt(datomg37ba)+parseInt(datomg37bb)+parseInt(datomg37bc)+
            parseInt(datomg36ba)+parseInt(datomg36bb)+parseInt(datomg36bc)+
            parseInt(datomg35ba)+parseInt(datomg35bb)+parseInt(datomg35bc)+
            parseInt(datomg34ba)+parseInt(datomg34bb)+parseInt(datomg34bc)+
            parseInt(datomg33ba)+parseInt(datomg33bb)+parseInt(datomg33bc)+
            parseInt(datomg32ba)+parseInt(datomg32bb)+parseInt(datomg32bc)+
            parseInt(datomg31ba)+parseInt(datomg31bb)+parseInt(datomg31bc);
      
      var datomg48ba=document.getElementById('mg48b-a').value;
      var datomg48bb=document.getElementById('mg48b-b').value;
      var datomg48bc=document.getElementById('mg48b-c').value;
    
      var datomg47ba=document.getElementById('mg47b-a').value;
      var datomg47bb=document.getElementById('mg47b-b').value;
      var datomg47bc=document.getElementById('mg47b-c').value;
      
      var datomg46ba=document.getElementById('mg46b-a').value;
      var datomg46bb=document.getElementById('mg46b-b').value;
      var datomg46bc=document.getElementById('mg46b-c').value;
      
      var datomg45ba=document.getElementById('mg45b-a').value;
      var datomg45bb=document.getElementById('mg45b-b').value;
      var datomg45bc=document.getElementById('mg45b-c').value;
      
      var datomg44ba=document.getElementById('mg44b-a').value;
      var datomg44bb=document.getElementById('mg44b-b').value;
      var datomg44bc=document.getElementById('mg44b-c').value;
      
      var datomg43ba=document.getElementById('mg43b-a').value;
      var datomg43bb=document.getElementById('mg43b-b').value;
      var datomg43bc=document.getElementById('mg43b-c').value;
      
      var datomg42ba=document.getElementById('mg42b-a').value;
      var datomg42bb=document.getElementById('mg42b-b').value;
      var datomg42bc=document.getElementById('mg42b-c').value;
    
      var datomg41ba=document.getElementById('mg41b-a').value;
      var datomg41bb=document.getElementById('mg41b-b').value;
      var datomg41bc=document.getElementById('mg41b-c').value;

      var total48bm=parseInt(datomg48ba)+parseInt(datomg48bb)+parseInt(datomg48bc)+
            parseInt(datomg47ba)+parseInt(datomg47bb)+parseInt(datomg47bc)+
            parseInt(datomg46ba)+parseInt(datomg46bb)+parseInt(datomg46bc)+
            parseInt(datomg45ba)+parseInt(datomg45bb)+parseInt(datomg45bc)+
            parseInt(datomg44ba)+parseInt(datomg44bb)+parseInt(datomg44bc)+
            parseInt(datomg43ba)+parseInt(datomg43bb)+parseInt(datomg43bc)+
            parseInt(datomg42ba)+parseInt(datomg42bb)+parseInt(datomg42bc)+
            parseInt(datomg41ba)+parseInt(datomg41bb)+parseInt(datomg41bc);
            
      var totalmg=total18m+total28m+total38m+total48m+total18bm+total28bm+total38bm+total48bm;
      var mediapsmg=(totalps+totalmg)/(totalDientes*3);
      var redondeadopsmg = Math.round(mediapsmg*Math.pow(10,2))/Math.pow(10,2);
      
      $("#suma5").text(redondeadopsmg);
  }
  

//FUNCIONES PARA ANCHURA ENCÍA    

//FUNCIONES PARA SANGRADO

//PLACA
/*
$('#p18-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p18-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p18-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p17-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p17-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p17-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p16-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p16-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p16-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p15-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p15-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p15-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p14-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p14-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p14-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p13-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p13-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p13-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p12-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p12-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p12-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p11-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p11-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p11-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/


/*
$('#s21-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s21-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s21-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s22-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s22-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s22-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s23-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s23-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s23-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s24-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s24-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s24-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s25-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s25-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s25-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s26-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s26-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s26-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s27-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s27-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s27-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s28-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s28-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s28-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/
//PLACA

/*
$('#p21-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p21-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p21-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p22-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p22-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p22-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p23-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p23-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p23-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p24-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p24-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p24-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p25-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p25-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p25-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p26-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p26-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p26-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p27-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p27-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p27-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p28-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p28-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p28-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/

/*
$('#s18b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s18b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s18b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s17b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s17b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s17b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s16b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s16b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s16b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s15b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s15b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s15b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s14b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s14b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s14b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s13b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s13b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s13b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s12b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s12b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s12b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s11b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s11b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s11b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/

//PLACA
/*
$('#p18b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p18b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p18b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p17b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p17b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p17b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p16b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p16b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p16b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p15b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p15b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p15b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p14b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p14b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p14b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p13b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p13b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p13b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p12b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p12b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p12b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p11b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p11b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p11b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/

/*
$('#s21b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s21b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s21b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s22b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s22b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s22b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s23b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s23b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s23b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s24b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s24b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s24b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s25b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s25b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s25b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s26b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s26b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s26b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s27b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s27b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s27b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s28b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s28b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s28b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/
//PLACA
/*
$('#p21b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p21b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p21b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p22b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p22b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p22b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p23b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p23b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p23b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p24b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p24b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p24b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p25b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p25b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p25b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p26b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p26b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p26b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p27b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p27b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p27b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p28b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p28b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p28b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/
//SEGUNDA PARTE

/*
$('#s48-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s48-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s48-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s47-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s47-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s47-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s46-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s46-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s46-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s45-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s45-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s45-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s44-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s44-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s44-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s43-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s43-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s43-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s42-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s42-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s42-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s41-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s41-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s41-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/

//PLACA
/*
$('#p48-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p48-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p48-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p47-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p47-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p47-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p46-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p46-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p46-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p45-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p45-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p45-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p44-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p44-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p44-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p43-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p43-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p43-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p42-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p42-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p42-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p41-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p41-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p41-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/

/*
$('#s31-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s31-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s31-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s32-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s32-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s32-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s33-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s33-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s33-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s34-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s34-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s34-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s35-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s35-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s35-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s36-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s36-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s36-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s37-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s37-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s37-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s38-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s38-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s38-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/
//PLACA
/*
$('#p31-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p31-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p31-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p32-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p32-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p32-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p33-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p33-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p33-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p34-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p34-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p34-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p35-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p35-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p35-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p36-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p36-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p36-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p37-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p37-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p37-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p38-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p38-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p38-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

*/

/*
$('#s48b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s48b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s48b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s47b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s47b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s47b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s46b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s46b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s46b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s45b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s45b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s45b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s44b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s44b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s44b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s43b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s43b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s43b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s42b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s42b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s42b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s41b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s41b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s41b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/

//PLACA
/*
$('#p48b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p48b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p48b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p47b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p47b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p47b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p46b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p46b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p46b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p45b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p45b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p45b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p44b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p44b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p44b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p43b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p43b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p43b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p42b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p42b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p42b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p41b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p41b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p41b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/

/*
$('#s31b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s31b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s31b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);

$('#s32b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
     totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
     totalSangrado--;
     getSangrado();
      }
);
$('#s32b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s32b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
  
$('#s33b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s33b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s33b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);  
$('#s34b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s34b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s34b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s35b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s35b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s35b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s36b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s36b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s36b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s37b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s37b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s37b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s38b-a').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s38b-b').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
$('#s38b-c').toggle(
      function () {
        $(this).css({"background":"#FA5858"});
    totalSangrado++;
     getSangrado();
      },
    function () {
        $(this).css({"background":"url('Periodontograma/img/sangrado-supuracion.png')"});
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalSangrado--;
     getSangrado();
      }
);
*/

//PLACA
/*
$('#p31b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p31b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p31b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);

$('#p32b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p32b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p32b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
  
$('#p33b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p33b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p33b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);  
$('#p34b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p34b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p34b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p35b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p35b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p35b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});    
    totalPlaca--;
    getPlaca();
      }
);
$('#p36b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p36b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p36b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p37b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p37b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p37b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p38b-a').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p38b-b').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
$('#p38b-c').toggle(
      function () {
        $(this).css({"background":"#58ACFA"});
    totalPlaca++;
    getPlaca();
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    totalPlaca--;
    getPlaca();
      }
);
*/
  </script>
  
  
  
  
  <script type="text/javascript">

  //TACHADOS
  $('#d18').toggle(
      function () {
        $('#diente18-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-18.png')");
    $('#diente18-a').css("background-position","0 -2px");
    $('#diente18-a').css("background-repeat","no-repeat");
    $('#m18').css("display","none");
    $('#i18').css("display","none");
    $('#f18').css("display","none");
    $('#s18-a').css("display","none");
    $('#s18-b').css("display","none");
    $('#s18-c').css("display","none");
    $('#p18-a').css("display","none");
    $('#p18-b').css("display","none");
    $('#p18-c').css("display","none");
    $('#mg18-a').css("display","none");
    $('#mg18-b').css("display","none");
    $('#mg18-c').css("display","none");
    $('#ps18-a').css("display","none");
    $('#ps18-b').css("display","none");
    $('#ps18-c').css("display","none");
    /*$('#furca18').css("background","none");*/
    $('#f18desact').css("display","none");
    $('#f18b-adesact').css("display","none");
    $('#f18b-bdesact').css("display","none");

    /*
    $('#mg18-a').val('0');
    $('#mg18-b').val('0');
    $('#mg18-c').val('0');
    $('#ps18-a').val('0');
    $('#ps18-b').val('0');
    $('#ps18-c').val('0');
    */

    $('#diente18b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-18b.png')");
    $('#diente18b-a').css("background-position","0 23px");
    $('#diente18b-a').css("background-repeat","no-repeat");
    $('#m18b').css("display","none");
    $('#i18b').css("display","none");
    $('#f18b-a').css("display","none");
    $('#f18b-b').css("display","none");
    $('#s18b-a').css("display","none");
    $('#s18b-b').css("display","none");
    $('#s18b-c').css("display","none");
    $('#p18b-a').css("display","none");
    $('#p18b-b').css("display","none");
    $('#p18b-c').css("display","none");
    $('#mg18b-a').css("display","none");
    $('#mg18b-b').css("display","none");
    $('#mg18b-c').css("display","none");
    $('#ps18b-a').css("display","none");
    $('#ps18b-b').css("display","none");
    $('#ps18b-c').css("display","none");

    /*
    $('#mg18b-a').val('0');
    $('#mg18b-b').val('0');
    $('#mg18b-c').val('0');
    $('#ps18b-a').val('0');
    $('#ps18b-b').val('0');
    $('#ps18b-c').val('0');
    */
    
    $('#furca18').css("display","none");
    $('#furca18-a').css("display","none");
    $('#furca18-b').css("display","none");
    $('#ae18').css("display","none");
    $('#pi18').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar18a();
    cargar18b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();

      },
      function () {
      $('#diente18-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png')");
    $('#diente18-a').css("background-position","0 -2px");
    $('#diente18-a').css("background-repeat","no-repeat");
    $('#m18').css("display","inline");
    $('#i18').css("display","block");
    $('#f18').css("display","inline");
    $('#s18-a').css("display","inline");
    $('#s18-b').css("display","inline");
    $('#s18-c').css("display","inline");
    $('#p18-a').css("display","inline");
    $('#p18-b').css("display","inline");
    $('#p18-c').css("display","inline");
    $('#mg18-a').css("display","inline");
    $('#mg18-b').css("display","inline");
    $('#mg18-c').css("display","inline");
    $('#ps18-a').css("display","inline");
    $('#ps18-b').css("display","inline");
    $('#ps18-c').css("display","inline");
    
    $('#diente18b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-18b.png')");
    $('#diente18b-a').css("background-position","0 23px");
    $('#diente18b-a').css("background-repeat","no-repeat");
    $('#m18b').css("display","inline");
    $('#i18b').css("display","inline");
    $('#f18b-a').css("display","inline");
    $('#f18b-b').css("display","inline");
    $('#s18b-a').css("display","inline");
    $('#s18b-b').css("display","inline");
    $('#s18b-c').css("display","inline");
    $('#p18b-a').css("display","inline");
    $('#p18b-b').css("display","inline");
    $('#p18b-c').css("display","inline");
    $('#mg18b-a').css("display","inline");
    $('#mg18b-b').css("display","inline");
    $('#mg18b-c').css("display","inline");
    $('#ps18b-a').css("display","inline");
    $('#ps18b-b').css("display","inline");
    $('#ps18b-c').css("display","inline");
    
    $('#furca18').css("display","block");
    $('#f18desact').css("display","block");
    $('#f18b-adesact').css("display","block");
    $('#f18b-bdesact').css("display","block");

    $('#furca18-a').css("display","block");
    $('#furca18-b').css("display","block");
    $('#ae18').css("display","inline");
    $('#pi18').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d17').toggle(
      function () {
        $('#diente17-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-17.png')");
    /*$('#diente17-a').css("background-position","0 -2px");*/
    $('#diente17-a').css("background-repeat","no-repeat");
    $('#m17').css("display","none");
    $('#i17').css("display","none");
    $('#f17').css("display","none");
    $('#s17-a').css("display","none");
    $('#s17-b').css("display","none");
    $('#s17-c').css("display","none");
    $('#p17-a').css("display","none");
    $('#p17-b').css("display","none");
    $('#p17-c').css("display","none");
    $('#mg17-a').css("display","none");
    $('#mg17-b').css("display","none");
    $('#mg17-c').css("display","none");
    $('#ps17-a').css("display","none");
    $('#ps17-b').css("display","none");
    $('#ps17-c').css("display","none");
    /*$('#furca17').css("background","none");*/
    $('#f17desact').css("display","none");
    $('#f17b-adesact').css("display","none");
    $('#f17b-bdesact').css("display","none");

    /*
    $('#mg17-a').val('0');
    $('#mg17-b').val('0');
    $('#mg17-c').val('0');
    $('#ps17-a').val('0');
    $('#ps17-b').val('0');
    $('#ps17-c').val('0');
    */

    $('#diente17b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-17b.png')");
    $('#diente17b-a').css("background-position","0 24px");
    $('#diente17b-a').css("background-repeat","no-repeat");
    $('#m17b').css("display","none");
    $('#i17b').css("display","none");
    $('#f17b-a').css("display","none");
    $('#f17b-b').css("display","none");
    $('#s17b-a').css("display","none");
    $('#s17b-b').css("display","none");
    $('#s17b-c').css("display","none");
    $('#p17b-a').css("display","none");
    $('#p17b-b').css("display","none");
    $('#p17b-c').css("display","none");
    $('#mg17b-a').css("display","none");
    $('#mg17b-b').css("display","none");
    $('#mg17b-c').css("display","none");
    $('#ps17b-a').css("display","none");
    $('#ps17b-b').css("display","none");
    $('#ps17b-c').css("display","none");
    /*
    $('#mg17b-a').val('0');
    $('#mg17b-b').val('0');
    $('#mg17b-c').val('0');
    $('#ps17b-a').val('0');
    $('#ps17b-b').val('0');
    $('#ps17b-c').val('0');
    */
    $('#furca17').css("display","none");
    $('#furca17-a').css("display","none");
    $('#furca17-b').css("display","none");
    $('#ae17').css("display","none");
    $('#pi17').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar17a();
    cargar17b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente17-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png')");
    $('#diente17-a').css("background-position","0 -2px");
    $('#diente17-a').css("background-repeat","no-repeat");
    $('#m17').css("display","inline");
    $('#i17').css("display","block");
    $('#f17').css("display","inline");
    $('#s17-a').css("display","inline");
    $('#s17-b').css("display","inline");
    $('#s17-c').css("display","inline");
    $('#p17-a').css("display","inline");
    $('#p17-b').css("display","inline");
    $('#p17-c').css("display","inline");
    $('#mg17-a').css("display","inline");
    $('#mg17-b').css("display","inline");
    $('#mg17-c').css("display","inline");
    $('#ps17-a').css("display","inline");
    $('#ps17-b').css("display","inline");
    $('#ps17-c').css("display","inline");
    
    $('#diente17b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-17b.png')");
    $('#diente17b-a').css("background-position","0 24px");
    $('#diente17b-a').css("background-repeat","no-repeat");
    $('#m17b').css("display","inline");
    $('#i17b').css("display","block");
    $('#f17b-a').css("display","inline");
    $('#f17b-b').css("display","inline");
    $('#s17b-a').css("display","inline");
    $('#s17b-b').css("display","inline");
    $('#s17b-c').css("display","inline");
    $('#p17b-a').css("display","inline");
    $('#p17b-b').css("display","inline");
    $('#p17b-c').css("display","inline");
    $('#mg17b-a').css("display","inline");
    $('#mg17b-b').css("display","inline");
    $('#mg17b-c').css("display","inline");
    $('#ps17b-a').css("display","inline");
    $('#ps17b-b').css("display","inline");
    $('#ps17b-c').css("display","inline");
    $('#f17desact').css("display","block");
    $('#f17b-adesact').css("display","block");
    $('#f17b-bdesact').css("display","block");

    $('#furca17').css("display","block");
    $('#furca17-a').css("display","block");
    $('#furca17-b').css("display","block");
    $('#ae17').css("display","inline");
    $('#pi17').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d16').toggle(
      function () {
        $('#diente16-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-16.png')");
    $('#diente16-a').css("background-position","0 4px");
    $('#diente16-a').css("background-repeat","no-repeat");
    $('#m16').css("display","none");
    $('#i16').css("display","none");
    $('#f16').css("display","none");
    $('#s16-a').css("display","none");
    $('#s16-b').css("display","none");
    $('#s16-c').css("display","none");
    $('#p16-a').css("display","none");
    $('#p16-b').css("display","none");
    $('#p16-c').css("display","none");
    $('#mg16-a').css("display","none");
    $('#mg16-b').css("display","none");
    $('#mg16-c').css("display","none");
    $('#ps16-a').css("display","none");
    $('#ps16-b').css("display","none");
    $('#ps16-c').css("display","none");
    /*$('#furca16').css("background","none");*/
    $('#f16desact').css("display","none");
    $('#f16b-adesact').css("display","none");
    $('#f16b-bdesact').css("display","none");

    /*
    $('#mg16-a').val('0');
    $('#mg16-b').val('0');
    $('#mg16-c').val('0');
    $('#ps16-a').val('0');
    $('#ps16-b').val('0');
    $('#ps16-c').val('0');
    */

    $('#diente16b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-16b.png')");
    $('#diente16b-a').css("background-position","0 22px");
    $('#diente16b-a').css("background-repeat","no-repeat");
    $('#m16b').css("display","none");
    $('#i16b').css("display","none");
    $('#f16b-a').css("display","none");
    $('#f16b-b').css("display","none");
    $('#s16b-a').css("display","none");
    $('#s16b-b').css("display","none");
    $('#s16b-c').css("display","none");
    $('#p16b-a').css("display","none");
    $('#p16b-b').css("display","none");
    $('#p16b-c').css("display","none");
    $('#mg16b-a').css("display","none");
    $('#mg16b-b').css("display","none");
    $('#mg16b-c').css("display","none");
    $('#ps16b-a').css("display","none");
    $('#ps16b-b').css("display","none");
    $('#ps16b-c').css("display","none");
    /*
    $('#mg16b-a').val('0');
    $('#mg16b-b').val('0');
    $('#mg16b-c').val('0');
    $('#ps16b-a').val('0');
    $('#ps16b-b').val('0');
    $('#ps16b-c').val('0');
    */
    $('#furca16').css("display","none");
    $('#furca16-a').css("display","none");
    $('#furca16-b').css("display","none");
    $('#ae16').css("display","none");
    $('#pi16').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar16a();
    cargar16b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente16-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png')");
    $('#diente16-a').css("background-position","0 4px");
    $('#diente16-a').css("background-repeat","no-repeat");
    $('#m16').css("display","inline");
    $('#i16').css("display","block");
    $('#f16').css("display","inline");
    $('#s16-a').css("display","inline");
    $('#s16-b').css("display","inline");
    $('#s16-c').css("display","inline");
    $('#p16-a').css("display","inline");
    $('#p16-b').css("display","inline");
    $('#p16-c').css("display","inline");
    $('#mg16-a').css("display","inline");
    $('#mg16-b').css("display","inline");
    $('#mg16-c').css("display","inline");
    $('#ps16-a').css("display","inline");
    $('#ps16-b').css("display","inline");
    $('#ps16-c').css("display","inline");
    
    $('#diente16b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-16b.png')");
    $('#diente16b-a').css("background-position","0 22px");
    $('#diente16b-a').css("background-repeat","no-repeat");
    $('#m16b').css("display","inline");
    $('#i16b').css("display","block");
    $('#f16b-a').css("display","inline");
    $('#f16b-b').css("display","inline");
    $('#s16b-a').css("display","inline");
    $('#s16b-b').css("display","inline");
    $('#s16b-c').css("display","inline");
    $('#p16b-a').css("display","inline");
    $('#p16b-b').css("display","inline");
    $('#p16b-c').css("display","inline");
    $('#mg16b-a').css("display","inline");
    $('#mg16b-b').css("display","inline");
    $('#mg16b-c').css("display","inline");
    $('#ps16b-a').css("display","inline");
    $('#ps16b-b').css("display","inline");
    $('#ps16b-c').css("display","inline");

    $('#f16desact').css("display","block");
    $('#f16b-adesact').css("display","block");
    $('#f16b-bdesact').css("display","block");

    $('#furca16').css("display","block");
    $('#furca16-a').css("display","block");
    $('#furca16-b').css("display","block");
    $('#ae16').css("display","inline");
    $('#pi16').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d15').toggle(
      function () {
        $('#diente15-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-15.png')");
    $('#diente15-a').css("background-position","0 5px");
    $('#diente15-a').css("background-repeat","no-repeat");
    $('#m15').css("display","none");
    $('#i15').css("display","none");
    $('#f15').css("display","none");
    $('#s15-a').css("display","none");
    $('#s15-b').css("display","none");
    $('#s15-c').css("display","none");
    $('#p15-a').css("display","none");
    $('#p15-b').css("display","none");
    $('#p15-c').css("display","none");
    $('#mg15-a').css("display","none");
    $('#mg15-b').css("display","none");
    $('#mg15-c').css("display","none");
    $('#ps15-a').css("display","none");
    $('#ps15-b').css("display","none");
    $('#ps15-c').css("display","none");

    /*
    $('#mg15-a').val('0');
    $('#mg15-b').val('0');
    $('#mg15-c').val('0');
    $('#ps15-a').val('0');
    $('#ps15-b').val('0');
    $('#ps15-c').val('0');
    */

    $('#diente15b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-15b.png')");
    $('#diente15b-a').css("background-position","0 17px");
    $('#diente15b-a').css("background-repeat","no-repeat");
    $('#m15b').css("display","none");
    $('#i15b').css("display","none");
    $('#s15b-a').css("display","none");
    $('#s15b-b').css("display","none");
    $('#s15b-c').css("display","none");
    $('#p15b-a').css("display","none");
    $('#p15b-b').css("display","none");
    $('#p15b-c').css("display","none");
    $('#mg15b-a').css("display","none");
    $('#mg15b-b').css("display","none");
    $('#mg15b-c').css("display","none");
    $('#ps15b-a').css("display","none");
    $('#ps15b-b').css("display","none");
    $('#ps15b-c').css("display","none");
    /*
    $('#mg15b-a').val('0');
    $('#mg15b-b').val('0');
    $('#mg15b-c').val('0');
    $('#ps15b-a').val('0');
    $('#ps15b-b').val('0');
    $('#ps15b-c').val('0');
    */
    $('#ae15').css("display","none");
    $('#pi15').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar15a();
    cargar15b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente15-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png')");
    $('#diente15-a').css("background-position","0 5px");
    $('#diente15-a').css("background-repeat","no-repeat");
    $('#m15').css("display","inline");
    $('#i15').css("display","block");
    $('#f15').css("display","inline");
    $('#s15-a').css("display","inline");
    $('#s15-b').css("display","inline");
    $('#s15-c').css("display","inline");
    $('#p15-a').css("display","inline");
    $('#p15-b').css("display","inline");
    $('#p15-c').css("display","inline");
    $('#mg15-a').css("display","inline");
    $('#mg15-b').css("display","inline");
    $('#mg15-c').css("display","inline");
    $('#ps15-a').css("display","inline");
    $('#ps15-b').css("display","inline");
    $('#ps15-c').css("display","inline");
    
    $('#diente15b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-15b.png')");
    $('#diente15b-a').css("background-position","0 17px");
    $('#diente15b-a').css("background-repeat","no-repeat");
    $('#m15b').css("display","inline");
    $('#i15b').css("display","inline");
    $('#f15b').css("display","inline");
    $('#s15b-a').css("display","inline");
    $('#s15b-b').css("display","inline");
    $('#s15b-c').css("display","inline");
    $('#p15b-a').css("display","inline");
    $('#p15b-b').css("display","inline");
    $('#p15b-c').css("display","inline");
    $('#mg15b-a').css("display","inline");
    $('#mg15b-b').css("display","inline");
    $('#mg15b-c').css("display","inline");
    $('#ps15b-a').css("display","inline");
    $('#ps15b-b').css("display","inline");
    $('#ps15b-c').css("display","inline");
    $('#ae15').css("display","inline");
    $('#pi15').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d14').toggle(
      function () {
        $('#diente14-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-14.png')");
    /*$('#diente14-a').css("background-position","0 -2px");*/
    $('#diente14-a').css("background-repeat","no-repeat");
    $('#m14').css("display","none");
    $('#i14').css("display","none");
    $('#f14').css("display","none");
    $('#s14-a').css("display","none");
    $('#s14-b').css("display","none");
    $('#s14-c').css("display","none");
    $('#p14-a').css("display","none");
    $('#p14-b').css("display","none");
    $('#p14-c').css("display","none");
    $('#mg14-a').css("display","none");
    $('#mg14-b').css("display","none");
    $('#mg14-c').css("display","none");
    $('#ps14-a').css("display","none");
    $('#ps14-b').css("display","none");
    $('#ps14-c').css("display","none");

    /*
    $('#mg14-a').val('0');
    $('#mg14-b').val('0');
    $('#mg14-c').val('0');
    $('#ps14-a').val('0');
    $('#ps14-b').val('0');
    $('#ps14-c').val('0');
    */
    
    $('#diente14b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-14b.png')");
    $('#diente14b-a').css("background-position","0 17px");
    $('#diente14b-a').css("background-repeat","no-repeat");
    $('#m14b').css("display","none");
    $('#i14b').css("display","none");
    $('#f14b-a').css("display","none");
    $('#f14b-b').css("display","none");
    $('#s14b-a').css("display","none");
    $('#s14b-b').css("display","none");
    $('#s14b-c').css("display","none");
    $('#p14b-a').css("display","none");
    $('#p14b-b').css("display","none");
    $('#p14b-c').css("display","none");
    $('#mg14b-a').css("display","none");
    $('#mg14b-b').css("display","none");
    $('#mg14b-c').css("display","none");
    $('#ps14b-a').css("display","none");
    $('#ps14b-b').css("display","none");
    $('#ps14b-c').css("display","none");
    /*
    $('#mg14b-a').val('0');
    $('#mg14b-b').val('0');
    $('#mg14b-c').val('0');
    $('#ps14b-a').val('0');
    $('#ps14b-b').val('0');
    $('#ps14b-c').val('0');
    */
    $('#f14b-adesact').css("display","none");
    $('#f14b-bdesact').css("display","none");

    $('#furca14-a').css("display","none");
    $('#furca14-b').css("display","none");
    $('#ae14').css("display","none");
    $('#pi14').css("display","none");
    
    
    totalDientes--;
    getDefectos();
    cargar14a();
    cargar14b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente14-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png')");
    /*$('#diente14-a').css("background-position","0 -2px");*/
    $('#diente14-a').css("background-repeat","no-repeat");
    $('#m14').css("display","inline");
    $('#i14').css("display","block");
    $('#f14').css("display","inline");
    $('#s14-a').css("display","inline");
    $('#s14-b').css("display","inline");
    $('#s14-c').css("display","inline");
    $('#p14-a').css("display","inline");
    $('#p14-b').css("display","inline");
    $('#p14-c').css("display","inline");
    $('#mg14-a').css("display","inline");
    $('#mg14-b').css("display","inline");
    $('#mg14-c').css("display","inline");
    $('#ps14-a').css("display","inline");
    $('#ps14-b').css("display","inline");
    $('#ps14-c').css("display","inline");
    
    $('#diente14b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-14b.png')");
    $('#diente14b-a').css("background-position","0 17px");
    $('#diente14b-a').css("background-repeat","no-repeat");
    $('#m14b').css("display","inline");
    $('#i14b').css("display","inline");
    $('#f14b-a').css("display","inline");
    $('#f14b-b').css("display","inline");
    $('#s14b-a').css("display","inline");
    $('#s14b-b').css("display","inline");
    $('#s14b-c').css("display","inline");
    $('#p14b-a').css("display","inline");
    $('#p14b-b').css("display","inline");
    $('#p14b-c').css("display","inline");
    $('#mg14b-a').css("display","inline");
    $('#mg14b-b').css("display","inline");
    $('#mg14b-c').css("display","inline");
    $('#ps14b-a').css("display","inline");
    $('#ps14b-b').css("display","inline");
    $('#ps14b-c').css("display","inline");

    $('#f14b-adesact').css("display","block");
    $('#f14b-bdesact').css("display","block");

    $('#furca14-a').css("display","block");
    $('#furca14-b').css("display","block");
    $('#ae14').css("display","inline");
    $('#pi14').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d13').toggle(
      function () {
        $('#diente13-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-13.png')");
    $('#diente13-a').css("background-position","top");
    $('#diente13-a').css("background-repeat","no-repeat");
    $('#m13').css("display","none");
    $('#i13').css("display","none");
    $('#f13').css("display","none");
    $('#s13-a').css("display","none");
    $('#s13-b').css("display","none");
    $('#s13-c').css("display","none");
    $('#p13-a').css("display","none");
    $('#p13-b').css("display","none");
    $('#p13-c').css("display","none");
    $('#mg13-a').css("display","none");
    $('#mg13-b').css("display","none");
    $('#mg13-c').css("display","none");
    $('#ps13-a').css("display","none");
    $('#ps13-b').css("display","none");
    $('#ps13-c').css("display","none");
    /*
    $('#mg13-a').val('0');
    $('#mg13-b').val('0');
    $('#mg13-c').val('0');
    $('#ps13-a').val('0');
    $('#ps13-b').val('0');
    $('#ps13-c').val('0');

    */
    $('#diente13b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-13b.png')");
    $('#diente13b-a').css("background-position","0 16px");
    $('#diente13b-a').css("background-repeat","no-repeat");
    $('#m13b').css("display","none");
    $('#i13b').css("display","none");
    $('#f13b').css("display","none");
    $('#s13b-a').css("display","none");
    $('#s13b-b').css("display","none");
    $('#s13b-c').css("display","none");
    $('#p13b-a').css("display","none");
    $('#p13b-b').css("display","none");
    $('#p13b-c').css("display","none");
    $('#mg13b-a').css("display","none");
    $('#mg13b-b').css("display","none");
    $('#mg13b-c').css("display","none");
    $('#ps13b-a').css("display","none");
    $('#ps13b-b').css("display","none");
    $('#ps13b-c').css("display","none");
    /*
    $('#mg13b-a').val('0');
    $('#mg13b-b').val('0');
    $('#mg13b-c').val('0');
    $('#ps13b-a').val('0');
    $('#ps13b-b').val('0');
    $('#ps13b-c').val('0');
    
    */
    $('#ae13').css("display","none");
    $('#pi13').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar13a();
    cargar13b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente13-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png')");
    $('#diente13-a').css("background-position","top");
    $('#diente13-a').css("background-repeat","no-repeat");
    $('#m13').css("display","inline");
    $('#i13').css("display","block");
    $('#f13').css("display","inline");
    $('#s13-a').css("display","inline");
    $('#s13-b').css("display","inline");
    $('#s13-c').css("display","inline");
    $('#p13-a').css("display","inline");
    $('#p13-b').css("display","inline");
    $('#p13-c').css("display","inline");
    $('#mg13-a').css("display","inline");
    $('#mg13-b').css("display","inline");
    $('#mg13-c').css("display","inline");
    $('#ps13-a').css("display","inline");
    $('#ps13-b').css("display","inline");
    $('#ps13-c').css("display","inline");
    
    $('#diente13b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-13b.png')");
    $('#diente13b-a').css("background-position","0 16px");
    $('#diente13b-a').css("background-repeat","no-repeat");
    $('#m13b').css("display","inline");
    $('#i13b').css("display","inline");
    $('#f13b').css("display","inline");
    $('#s13b-a').css("display","inline");
    $('#s13b-b').css("display","inline");
    $('#s13b-c').css("display","inline");
    $('#p13b-a').css("display","inline");
    $('#p13b-b').css("display","inline");
    $('#p13b-c').css("display","inline");
    $('#mg13b-a').css("display","inline");
    $('#mg13b-b').css("display","inline");
    $('#mg13b-c').css("display","inline");
    $('#ps13b-a').css("display","inline");
    $('#ps13b-b').css("display","inline");
    $('#ps13b-c').css("display","inline");
    $('#ae13').css("display","inline");
    $('#pi13').css("display","inline");
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d12').toggle(
      function () {
        $('#diente12-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-12.png')");
    $('#diente12-a').css("background-position","0 6px");
    $('#diente12-a').css("background-repeat","no-repeat");
    $('#m12').css("display","none");
    $('#i12').css("display","none");
    $('#f12').css("display","none");
    $('#s12-a').css("display","none");
    $('#s12-b').css("display","none");
    $('#s12-c').css("display","none");
    $('#p12-a').css("display","none");
    $('#p12-b').css("display","none");
    $('#p12-c').css("display","none");
    $('#mg12-a').css("display","none");
    $('#mg12-b').css("display","none");
    $('#mg12-c').css("display","none");
    $('#ps12-a').css("display","none");
    $('#ps12-b').css("display","none");
    $('#ps12-c').css("display","none");
    /*
    $('#mg12-a').val('0');
    $('#mg12-b').val('0');
    $('#mg12-c').val('0');
    $('#ps12-a').val('0');
    $('#ps12-b').val('0');
    $('#ps12-c').val('0');
    */
    
    $('#diente12b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-12b.png')");
    $('#diente12b-a').css("background-position","0 18px");
    $('#diente12b-a').css("background-repeat","no-repeat");
    $('#m12b').css("display","none");
    $('#i12b').css("display","none");
    $('#f12b').css("display","none");
    $('#s12b-a').css("display","none");
    $('#s12b-b').css("display","none");
    $('#s12b-c').css("display","none");
    $('#p12b-a').css("display","none");
    $('#p12b-b').css("display","none");
    $('#p12b-c').css("display","none");
    $('#mg12b-a').css("display","none");
    $('#mg12b-b').css("display","none");
    $('#mg12b-c').css("display","none");
    $('#ps12b-a').css("display","none");
    $('#ps12b-b').css("display","none");
    $('#ps12b-c').css("display","none");
    /*
    $('#mg12b-a').val('0');
    $('#mg12b-b').val('0');
    $('#mg12b-c').val('0');
    $('#ps12b-a').val('0');
    $('#ps12b-b').val('0');
    $('#ps12b-c').val('0');
    */
    $('#ae12').css("display","none");
    $('#pi12').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar12a();
    cargar12b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente12-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-12.png')");
    $('#diente12-a').css("background-position","0 6px");
    $('#diente12-a').css("background-repeat","no-repeat");
    $('#m12').css("display","inline");
    $('#i12').css("display","block");
    $('#f12').css("display","inline");
    $('#s12-a').css("display","inline");
    $('#s12-b').css("display","inline");
    $('#s12-c').css("display","inline");
    $('#p12-a').css("display","inline");
    $('#p12-b').css("display","inline");
    $('#p12-c').css("display","inline");
    $('#mg12-a').css("display","inline");
    $('#mg12-b').css("display","inline");
    $('#mg12-c').css("display","inline");
    $('#ps12-a').css("display","inline");
    $('#ps12-b').css("display","inline");
    $('#ps12-c').css("display","inline");
    
    $('#diente12b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-12b.png')");
    $('#diente12b-a').css("background-position","0 18px");
    $('#diente12b-a').css("background-repeat","no-repeat");
    $('#m12b').css("display","inline");
    $('#i12b').css("display","inline");
    $('#f12b').css("display","inline");
    $('#s12b-a').css("display","inline");
    $('#s12b-b').css("display","inline");
    $('#s12b-c').css("display","inline");
    $('#p12b-a').css("display","inline");
    $('#p12b-b').css("display","inline");
    $('#p12b-c').css("display","inline");
    $('#mg12b-a').css("display","inline");
    $('#mg12b-b').css("display","inline");
    $('#mg12b-c').css("display","inline");
    $('#ps12b-a').css("display","inline");
    $('#ps12b-b').css("display","inline");
    $('#ps12b-c').css("display","inline");
    $('#ae12').css("display","inline");
    $('#pi12').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  $('#d11').toggle(
      function () {
        $('#diente11-a').css("background","url('Periodontograma/img/tabla1/tachados/periodontograma-dientes-arriba-tachados-11.png')");
    $('#diente11-a').css("background-position","bottom");
    $('#diente11-a').css("background-repeat","no-repeat");
    $('#m11').css("display","none");
    $('#i11').css("display","none");
    $('#f11').css("display","none");
    $('#s11-a').css("display","none");
    $('#s11-b').css("display","none");
    $('#s11-c').css("display","none");
    $('#p11-a').css("display","none");
    $('#p11-b').css("display","none");
    $('#p11-c').css("display","none");
    $('#mg11-a').css("display","none");
    $('#mg11-b').css("display","none");
    $('#mg11-c').css("display","none");
    $('#ps11-a').css("display","none");
    $('#ps11-b').css("display","none");
    $('#ps11-c').css("display","none");
    /*
    $('#mg11-a').val('0');
    $('#mg11-b').val('0');
    $('#mg11-c').val('0');
    $('#ps11-a').val('0');
    $('#ps11-b').val('0');
    $('#ps11-c').val('0');
    */
    
    $('#diente11b-a').css("background","url('Periodontograma/img/tabla3/tachados/periodontograma-dientes-arriba-tachados-11b.png')");
    $('#diente11b-a').css("background-position","0 12px");
    $('#diente11b-a').css("background-repeat","no-repeat");
    $('#m11b').css("display","none");
    $('#i11b').css("display","none");
    $('#f11b').css("display","none");
    $('#s11b-a').css("display","none");
    $('#s11b-b').css("display","none");
    $('#s11b-c').css("display","none");
    $('#p11b-a').css("display","none");
    $('#p11b-b').css("display","none");
    $('#p11b-c').css("display","none");
    $('#mg11b-a').css("display","none");
    $('#mg11b-b').css("display","none");
    $('#mg11b-c').css("display","none");
    $('#ps11b-a').css("display","none");
    $('#ps11b-b').css("display","none");
    $('#ps11b-c').css("display","none");
    /*
    $('#mg11b-a').val('0');
    $('#mg11b-b').val('0');
    $('#mg11b-c').val('0');
    $('#ps11b-a').val('0');
    $('#ps11b-b').val('0');
    $('#ps11b-c').val('0');
    */
    $('#ae11').css("display","none");
    $('#pi11').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar11a();
    cargar11b();
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente11-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-11.png')");
    $('#diente11-a').css("background-position","bottom");
    $('#diente11-a').css("background-repeat","no-repeat");
    $('#m11').css("display","inline");
    $('#i11').css("display","block");
    $('#f11').css("display","inline");
    $('#s11-a').css("display","inline");
    $('#s11-b').css("display","inline");
    $('#s11-c').css("display","inline");
    $('#p11-a').css("display","inline");
    $('#p11-b').css("display","inline");
    $('#p11-c').css("display","inline");
    $('#mg11-a').css("display","inline");
    $('#mg11-b').css("display","inline");
    $('#mg11-c').css("display","inline");
    $('#ps11-a').css("display","inline");
    $('#ps11-b').css("display","inline");
    $('#ps11-c').css("display","inline");
    
    $('#diente11b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-11b.png')");
    $('#diente11b-a').css("background-position","0 12px");
    $('#diente11b-a').css("background-repeat","no-repeat");
    $('#m11b').css("display","inline");
    $('#i11b').css("display","inline");
    $('#f11b').css("display","inline");
    $('#s11b-a').css("display","inline");
    $('#s11b-b').css("display","inline");
    $('#s11b-c').css("display","inline");
    $('#p11b-a').css("display","inline");
    $('#p11b-b').css("display","inline");
    $('#p11b-c').css("display","inline");
    $('#mg11b-a').css("display","inline");
    $('#mg11b-b').css("display","inline");
    $('#mg11b-c').css("display","inline");
    $('#ps11b-a').css("display","inline");
    $('#ps11b-b').css("display","inline");
    $('#ps11b-c').css("display","inline");
    $('#ae11').css("display","inline");
    $('#pi11').css("display","inline");
    
    totalDientes++;
    
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    //cargar2();
    //cargar3();
    //cargar4();
    getSangrado();
    getPlaca();
      }
  );
  
  
  //TACHADOS SEGUNDA PARTE
  $('#d48b').toggle(
      function () {
        $('#diente48b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-48b.png')");
    $('#diente48b-a').css("background-position","0 24px");
    $('#diente48b-a').css("background-repeat","no-repeat");
    $('#m48b').css("display","none");
    $('#i48b').css("display","none");
    $('#f48b').css("display","none");
    $('#s48b-a').css("display","none");
    $('#s48b-b').css("display","none");
    $('#s48b-c').css("display","none");
    $('#p48b-a').css("display","none");
    $('#p48b-b').css("display","none");
    $('#p48b-c').css("display","none");
    $('#mg48b-a').css("display","none");
    $('#mg48b-b').css("display","none");
    $('#mg48b-c').css("display","none");
    $('#ps48b-a').css("display","none");
    $('#ps48b-b').css("display","none");
    $('#ps48b-c').css("display","none");
    /*$('#furca48b').css("background","none");*/
    $('#f48desact').css("display","none");
    $('#f48bdesact').css("display","none");
    /*

    $('#mg48b-a').val('0');
    $('#mg48b-b').val('0');
    $('#mg48b-c').val('0');
    $('#ps48b-a').val('0');
    $('#ps48b-b').val('0');
    $('#ps48b-c').val('0');
    */
    
    $('#diente48-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-48.png')");
    $('#diente48-a').css("background-position","0 -4px");
    $('#diente48-a').css("background-repeat","no-repeat");
    $('#m48').css("display","none");
    $('#i48').css("display","none");
    $('#f48').css("display","none");
    $('#s48-a').css("display","none");
    $('#s48-b').css("display","none");
    $('#s48-c').css("display","none");
    $('#p48-a').css("display","none");
    $('#p48-b').css("display","none");
    $('#p48-c').css("display","none");
    $('#mg48-a').css("display","none");
    $('#mg48-b').css("display","none");
    $('#mg48-c').css("display","none");
    $('#ps48-a').css("display","none");
    $('#ps48-b').css("display","none");
    $('#ps48-c').css("display","none");
    /*
    $('#mg48-a').val('0');
    $('#mg48-b').val('0');
    $('#mg48-c').val('0');
    $('#ps48-a').val('0');
    $('#ps48-b').val('0');
    $('#ps48-c').val('0');
    */
    $('#furca48').css("display","none");
    $('#furca48b').css("display","none");
    $('#ae48b').css("display","none");
    $('#pi48b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar48a();
    cargar48b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
      $('#diente48b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-48b.png')");
    $('#diente48b-a').css("background-position","0 24px");
    $('#diente48b-a').css("background-repeat","no-repeat");
    $('#m48b').css("display","inline");
    $('#i48b').css("display","block");
    $('#f48b').css("display","inline");
    $('#s48b-a').css("display","inline");
    $('#s48b-b').css("display","inline");
    $('#s48b-c').css("display","inline");
    $('#p48b-a').css("display","inline");
    $('#p48b-b').css("display","inline");
    $('#p48b-c').css("display","inline");
    $('#mg48b-a').css("display","inline");
    $('#mg48b-b').css("display","inline");
    $('#mg48b-c').css("display","inline");
    $('#ps48b-a').css("display","inline");
    $('#ps48b-b').css("display","inline");
    $('#ps48b-c').css("display","inline");
    
    $('#diente48-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-48.png')");
    $('#diente48-a').css("background-position","0 -4px");
    $('#diente48-a').css("background-repeat","no-repeat");
    $('#m48').css("display","inline");
    $('#i48').css("display","inline");
    $('#f48').css("display","inline");
    $('#s48-a').css("display","inline");
    $('#s48-b').css("display","inline");
    $('#s48-c').css("display","inline");
    $('#p48-a').css("display","inline");
    $('#p48-b').css("display","inline");
    $('#p48-c').css("display","inline");
    $('#mg48-a').css("display","inline");
    $('#mg48-b').css("display","inline");
    $('#mg48-c').css("display","inline");
    $('#ps48-a').css("display","inline");
    $('#ps48-b').css("display","inline");
    $('#ps48-c').css("display","inline");

    $('#f48desact').css("display","block");
    $('#f48bdesact').css("display","block");

    $('#furca48').css("display","block");
    $('#furca48b').css("display","block");
    $('#ae48b').css("display","inline");
    $('#pi48b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d47b').toggle(
      function () {
        $('#diente47b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-47b.png')");
    $('#diente47b-a').css("background-position","0 22px");
    $('#diente47b-a').css("background-repeat","no-repeat");
    $('#m47b').css("display","none");
    $('#i47b').css("display","none");
    $('#f47b').css("display","none");
    $('#s47b-a').css("display","none");
    $('#s47b-b').css("display","none");
    $('#s47b-c').css("display","none");
    $('#p47b-a').css("display","none");
    $('#p47b-b').css("display","none");
    $('#p47b-c').css("display","none");
    $('#mg47b-a').css("display","none");
    $('#mg47b-b').css("display","none");
    $('#mg47b-c').css("display","none");
    $('#ps47b-a').css("display","none");
    $('#ps47b-b').css("display","none");
    $('#ps47b-c').css("display","none");
    /*$('#furca47b').css("background","none");*/

    $('#f47desact').css("display","none");
    $('#f47bdesact').css("display","none");
    /*

    $('#mg47b-a').val('0');
    $('#mg47b-b').val('0');
    $('#mg47b-c').val('0');
    $('#ps47b-a').val('0');
    $('#ps47b-b').val('0');
    $('#ps47b-c').val('0');
    */
    
    $('#diente47-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-47.png')");
    $('#diente47-a').css("background-position","0 -4px");
    $('#diente47-a').css("background-repeat","no-repeat");
    $('#m47').css("display","none");
    $('#i47').css("display","none");
    $('#f47').css("display","none");
    $('#s47-a').css("display","none");
    $('#s47-b').css("display","none");
    $('#s47-c').css("display","none");
    $('#p47-a').css("display","none");
    $('#p47-b').css("display","none");
    $('#p47-c').css("display","none");
    $('#mg47-a').css("display","none");
    $('#mg47-b').css("display","none");
    $('#mg47-c').css("display","none");
    $('#ps47-a').css("display","none");
    $('#ps47-b').css("display","none");
    $('#ps47-c').css("display","none");
    /*
    $('#mg47-a').val('0');
    $('#mg47-b').val('0');
    $('#mg47-c').val('0');
    $('#ps47-a').val('0');
    $('#ps47-b').val('0');
    $('#ps47-c').val('0');
    */
    $('#furca47').css("display","none");
    $('#furca47b').css("display","none");
    $('#ae47b').css("display","none");
    $('#pi47b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar47a();
    cargar47b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente47b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-47b.png')");
    $('#diente47b-a').css("background-position","0 22px");
    $('#diente47b-a').css("background-repeat","no-repeat");
    $('#m47b').css("display","inline");
    $('#i47b').css("display","block");
    $('#f47b').css("display","inline");
    $('#s47b-a').css("display","inline");
    $('#s47b-b').css("display","inline");
    $('#s47b-c').css("display","inline");
    $('#p47b-a').css("display","inline");
    $('#p47b-b').css("display","inline");
    $('#p47b-c').css("display","inline");
    $('#mg47b-a').css("display","inline");
    $('#mg47b-b').css("display","inline");
    $('#mg47b-c').css("display","inline");
    $('#ps47b-a').css("display","inline");
    $('#ps47b-b').css("display","inline");
    $('#ps47b-c').css("display","inline");
    
    $('#diente47-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-47.png')");
    $('#diente47-a').css("background-position","0 -4px");
    $('#diente47-a').css("background-repeat","no-repeat");
    $('#m47').css("display","inline");
    $('#i47').css("display","block");
    $('#f47').css("display","inline");
    $('#s47-a').css("display","inline");
    $('#s47-b').css("display","inline");
    $('#s47-c').css("display","inline");
    $('#p47-a').css("display","inline");
    $('#p47-b').css("display","inline");
    $('#p47-c').css("display","inline");
    $('#mg47-a').css("display","inline");
    $('#mg47-b').css("display","inline");
    $('#mg47-c').css("display","inline");
    $('#ps47-a').css("display","inline");
    $('#ps47-b').css("display","inline");
    $('#ps47-c').css("display","inline");

    $('#f47desact').css("display","block");
    $('#f47bdesact').css("display","block");

    $('#furca47').css("display","block");
    $('#furca47b').css("display","block");
    $('#ae47b').css("display","inline");
    $('#pi47b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d46b').toggle(
      function () {
        $('#diente46b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-46b.png')");
    $('#diente46b-a').css("background-position","0 23px");
    $('#diente46b-a').css("background-repeat","no-repeat");
    $('#m46b').css("display","none");
    $('#i46b').css("display","none");
    $('#f46b').css("display","none");
    $('#s46b-a').css("display","none");
    $('#s46b-b').css("display","none");
    $('#s46b-c').css("display","none");
    $('#p46b-a').css("display","none");
    $('#p46b-b').css("display","none");
    $('#p46b-c').css("display","none");
    $('#mg46b-a').css("display","none");
    $('#mg46b-b').css("display","none");
    $('#mg46b-c').css("display","none");
    $('#ps46b-a').css("display","none");
    $('#ps46b-b').css("display","none");
    $('#ps46b-c').css("display","none");
    /*$('#furca46b').css("background","none");*/

    $('#f46desact').css("display","none");
    $('#f46bdesact').css("display","none");
    /*

    $('#mg46b-a').val('0');
    $('#mg46b-b').val('0');
    $('#mg46b-c').val('0');
    $('#ps46b-a').val('0');
    $('#ps46b-b').val('0');
    $('#ps46b-c').val('0');
    */
    
    $('#diente46-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-46.png')");
    $('#diente46-a').css("background-position","0 4px");
    $('#diente46-a').css("background-repeat","no-repeat");
    $('#m46').css("display","none");
    $('#i46').css("display","none");
    $('#f46').css("display","none");
    $('#s46-a').css("display","none");
    $('#s46-b').css("display","none");
    $('#s46-c').css("display","none");
    $('#p46-a').css("display","none");
    $('#p46-b').css("display","none");
    $('#p46-c').css("display","none");
    $('#mg46-a').css("display","none");
    $('#mg46-b').css("display","none");
    $('#mg46-c').css("display","none");
    $('#ps46-a').css("display","none");
    $('#ps46-b').css("display","none");
    $('#ps46-c').css("display","none");
    /*
    $('#mg46-a').val('0');
    $('#mg46-b').val('0');
    $('#mg46-c').val('0');
    $('#ps46-a').val('0');
    $('#ps46-b').val('0');
    $('#ps46-c').val('0');
    */
    $('#furca46').css("display","none");
    $('#furca46b').css("display","none");
    $('#ae46b').css("display","none");
    $('#pi46b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar46a();
    cargar46b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente46b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-46b.png')");
    $('#diente46b-a').css("background-position","0 23px");
    $('#diente46b-a').css("background-repeat","no-repeat");
    $('#m46b').css("display","inline");
    $('#i46b').css("display","block");
    $('#f46b').css("display","inline");
    $('#s46b-a').css("display","inline");
    $('#s46b-b').css("display","inline");
    $('#s46b-c').css("display","inline");
    $('#p46b-a').css("display","inline");
    $('#p46b-b').css("display","inline");
    $('#p46b-c').css("display","inline");
    $('#mg46b-a').css("display","inline");
    $('#mg46b-b').css("display","inline");
    $('#mg46b-c').css("display","inline");
    $('#ps46b-a').css("display","inline");
    $('#ps46b-b').css("display","inline");
    $('#ps46b-c').css("display","inline");
    
    $('#diente46-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-46.png')");
    $('#diente46-a').css("background-position","0 4px");
    $('#diente46-a').css("background-repeat","no-repeat");
    $('#m46').css("display","inline");
    $('#i46').css("display","block");
    $('#f46-a').css("display","inline");
    $('#f46-b').css("display","inline");
    $('#s46-a').css("display","inline");
    $('#s46-b').css("display","inline");
    $('#s46-c').css("display","inline");
    $('#p46-a').css("display","inline");
    $('#p46-b').css("display","inline");
    $('#p46-c').css("display","inline");
    $('#mg46-a').css("display","inline");
    $('#mg46-b').css("display","inline");
    $('#mg46-c').css("display","inline");
    $('#ps46-a').css("display","inline");
    $('#ps46-b').css("display","inline");
    $('#ps46-c').css("display","inline");

    $('#f46desact').css("display","block");
    $('#f46bdesact').css("display","block");

    $('#furca46').css("display","block");
    $('#furca46b').css("display","block");
    $('#ae46b').css("display","inline");
    $('#pi46b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d45b').toggle(
      function () {
        $('#diente45b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-45b.png')");
    $('#diente45b-a').css("background-position","0px 20px");
    $('#diente45b-a').css("background-repeat","no-repeat");
    $('#m45b').css("display","none");
    $('#i45b').css("display","none");
    $('#f45b').css("display","none");
    $('#s45b-a').css("display","none");
    $('#s45b-b').css("display","none");
    $('#s45b-c').css("display","none");
    $('#p45b-a').css("display","none");
    $('#p45b-b').css("display","none");
    $('#p45b-c').css("display","none");
    $('#mg45b-a').css("display","none");
    $('#mg45b-b').css("display","none");
    $('#mg45b-c').css("display","none");
    $('#ps45b-a').css("display","none");
    $('#ps45b-b').css("display","none");
    $('#ps45b-c').css("display","none");
    /*
    $('#mg45b-a').val('0');
    $('#mg45b-b').val('0');
    $('#mg45b-c').val('0');
    $('#ps45b-a').val('0');
    $('#ps45b-b').val('0');
    $('#ps45b-c').val('0');
    */
    
    $('#diente45-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-45.png')");
    $('#diente45-a').css("background-position","0 1px");
    $('#diente45-a').css("background-repeat","no-repeat");
    $('#m45').css("display","none");
    $('#i45').css("display","none");
    $('#s45-a').css("display","none");
    $('#s45-b').css("display","none");
    $('#s45-c').css("display","none");
    $('#p45-a').css("display","none");
    $('#p45-b').css("display","none");
    $('#p45-c').css("display","none");
    $('#mg45-a').css("display","none");
    $('#mg45-b').css("display","none");
    $('#mg45-c').css("display","none");
    $('#ps45-a').css("display","none");
    $('#ps45-b').css("display","none");
    $('#ps45-c').css("display","none");
    /*
    $('#mg45-a').val('0');
    $('#mg45-b').val('0');
    $('#mg45-c').val('0');
    $('#ps45-a').val('0');
    $('#ps45-b').val('0');
    $('#ps45-c').val('0');
    */
    $('#ae45b').css("display","none");
    $('#pi45b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar45a();
    cargar45b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente45b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-45b.png')");
    $('#diente45b-a').css("background-position","0 20px");
    $('#diente45b-a').css("background-repeat","no-repeat");
    $('#m45b').css("display","inline");
    $('#i45b').css("display","block");
    $('#f45b').css("display","inline");
    $('#s45b-a').css("display","inline");
    $('#s45b-b').css("display","inline");
    $('#s45b-c').css("display","inline");
    $('#p45b-a').css("display","inline");
    $('#p45b-b').css("display","inline");
    $('#p45b-c').css("display","inline");
    $('#mg45b-a').css("display","inline");
    $('#mg45b-b').css("display","inline");
    $('#mg45b-c').css("display","inline");
    $('#ps45b-a').css("display","inline");
    $('#ps45b-b').css("display","inline");
    $('#ps45b-c').css("display","inline");
    
    $('#diente45-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-45.png')");
    $('#diente45-a').css("background-position","0 1px");
    $('#diente45-a').css("background-repeat","no-repeat");
    $('#m45').css("display","inline");
    $('#i45').css("display","inline");
    $('#f45').css("display","inline");
    $('#s45-a').css("display","inline");
    $('#s45-b').css("display","inline");
    $('#s45-c').css("display","inline");
    $('#p45-a').css("display","inline");
    $('#p45-b').css("display","inline");
    $('#p45-c').css("display","inline");
    $('#mg45-a').css("display","inline");
    $('#mg45-b').css("display","inline");
    $('#mg45-c').css("display","inline");
    $('#ps45-a').css("display","inline");
    $('#ps45-b').css("display","inline");
    $('#ps45-c').css("display","inline");
    $('#ae45b').css("display","inline");
    $('#pi45b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d44b').toggle(
      function () {
        $('#diente44b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-44b.png')");
    $('#diente44b-a').css("background-position","0 13px");
    $('#diente44b-a').css("background-repeat","no-repeat");
    $('#m44b').css("display","none");
    $('#i44b').css("display","none");
    $('#f44b').css("display","none");
    $('#s44b-a').css("display","none");
    $('#s44b-b').css("display","none");
    $('#s44b-c').css("display","none");
    $('#p44b-a').css("display","none");
    $('#p44b-b').css("display","none");
    $('#p44b-c').css("display","none");
    $('#mg44b-a').css("display","none");
    $('#mg44b-b').css("display","none");
    $('#mg44b-c').css("display","none");
    $('#ps44b-a').css("display","none");
    $('#ps44b-b').css("display","none");
    $('#ps44b-c').css("display","none");
    /*
    $('#mg44b-a').val('0');
    $('#mg44b-b').val('0');
    $('#mg44b-c').val('0');
    $('#ps44b-a').val('0');
    $('#ps44b-b').val('0');
    $('#ps44b-c').val('0');
    */
    
    $('#diente44-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-44.png')");
    $('#diente44-a').css("background-position","0 3px");
    $('#diente44-a').css("background-repeat","no-repeat");
    $('#m44').css("display","none");
    $('#i44').css("display","none");
    $('#f44-a').css("display","none");
    $('#f44-b').css("display","none");
    $('#s44-a').css("display","none");
    $('#s44-b').css("display","none");
    $('#s44-c').css("display","none");
    $('#p44-a').css("display","none");
    $('#p44-b').css("display","none");
    $('#p44-c').css("display","none");
    $('#mg44-a').css("display","none");
    $('#mg44-b').css("display","none");
    $('#mg44-c').css("display","none");
    $('#ps44-a').css("display","none");
    $('#ps44-b').css("display","none");
    $('#ps44-c').css("display","none");
    /*
    $('#mg44-a').val('0');
    $('#mg44-b').val('0');
    $('#mg44-c').val('0');
    $('#ps44-a').val('0');
    $('#ps44-b').val('0');
    $('#ps44-c').val('0');
    */
    $('#ae44b').css("display","none");
    $('#pi44b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar44a();
    cargar44b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente44b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-44b.png')");
    $('#diente44b-a').css("background-position","0 13px");
    $('#diente44b-a').css("background-repeat","no-repeat");
    $('#m44b').css("display","inline");
    $('#i44b').css("display","block");
    $('#f44b').css("display","inline");
    $('#s44b-a').css("display","inline");
    $('#s44b-b').css("display","inline");
    $('#s44b-c').css("display","inline");
    $('#p44b-a').css("display","inline");
    $('#p44b-b').css("display","inline");
    $('#p44b-c').css("display","inline");
    $('#mg44b-a').css("display","inline");
    $('#mg44b-b').css("display","inline");
    $('#mg44b-c').css("display","inline");
    $('#ps44b-a').css("display","inline");
    $('#ps44b-b').css("display","inline");
    $('#ps44b-c').css("display","inline");
    
    $('#diente44-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-44.png')");
    $('#diente44-a').css("background-position","0 3px");
    $('#diente44-a').css("background-repeat","no-repeat");
    $('#m44').css("display","inline");
    $('#i44').css("display","inline");
    $('#f44-a').css("display","inline");
    $('#f44-b').css("display","inline");
    $('#s44-a').css("display","inline");
    $('#s44-b').css("display","inline");
    $('#s44-c').css("display","inline");
    $('#p44-a').css("display","inline");
    $('#p44-b').css("display","inline");
    $('#p44-c').css("display","inline");
    $('#mg44-a').css("display","inline");
    $('#mg44-b').css("display","inline");
    $('#mg44-c').css("display","inline");
    $('#ps44-a').css("display","inline");
    $('#ps44-b').css("display","inline");
    $('#ps44-c').css("display","inline");
    $('#ae44b').css("display","inline");
    $('#pi44b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d43b').toggle(
      function () {
        $('#diente43b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-43b.png')");
    $('#diente43b-a').css("background-position","0 12px");
    $('#diente43b-a').css("background-repeat","no-repeat");
    $('#m43b').css("display","none");
    $('#i43b').css("display","none");
    $('#f43b').css("display","none");
    $('#s43b-a').css("display","none");
    $('#s43b-b').css("display","none");
    $('#s43b-c').css("display","none");
    $('#p43b-a').css("display","none");
    $('#p43b-b').css("display","none");
    $('#p43b-c').css("display","none");
    $('#mg43b-a').css("display","none");
    $('#mg43b-b').css("display","none");
    $('#mg43b-c').css("display","none");
    $('#ps43b-a').css("display","none");
    $('#ps43b-b').css("display","none");
    $('#ps43b-c').css("display","none");
    /*
    $('#mg43b-a').val('0');
    $('#mg43b-b').val('0');
    $('#mg43b-c').val('0');
    $('#ps43b-a').val('0');
    $('#ps43b-b').val('0');
    $('#ps43b-c').val('0');
    */
    
    $('#diente43-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-43.png')");
    $('#diente43-a').css("background-position","0 7px");
    $('#diente43-a').css("background-repeat","no-repeat");
    $('#m43').css("display","none");
    $('#i43').css("display","none");
    $('#f43').css("display","none");
    $('#s43-a').css("display","none");
    $('#s43-b').css("display","none");
    $('#s43-c').css("display","none");
    $('#p43-a').css("display","none");
    $('#p43-b').css("display","none");
    $('#p43-c').css("display","none");
    $('#mg43-a').css("display","none");
    $('#mg43-b').css("display","none");
    $('#mg43-c').css("display","none");
    $('#ps43-a').css("display","none");
    $('#ps43-b').css("display","none");
    $('#ps43-c').css("display","none");
    /*
    $('#mg43-a').val('0');
    $('#mg43-b').val('0');
    $('#mg43-c').val('0');
    $('#ps43-a').val('0');
    $('#ps43-b').val('0');
    $('#ps43-c').val('0');
    */
    $('#ae43b').css("display","none");
    $('#pi43b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar43a();
    cargar43b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente43b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-43b.png')");
    $('#diente43b-a').css("background-position","0 12px");
    $('#diente43b-a').css("background-repeat","no-repeat");
    $('#m43b').css("display","inline");
    $('#i43b').css("display","block");
    $('#f43b').css("display","inline");
    $('#s43b-a').css("display","inline");
    $('#s43b-b').css("display","inline");
    $('#s43b-c').css("display","inline");
    $('#p43b-a').css("display","inline");
    $('#p43b-b').css("display","inline");
    $('#p43b-c').css("display","inline");
    $('#mg43b-a').css("display","inline");
    $('#mg43b-b').css("display","inline");
    $('#mg43b-c').css("display","inline");
    $('#ps43b-a').css("display","inline");
    $('#ps43b-b').css("display","inline");
    $('#ps43b-c').css("display","inline");
    
    $('#diente43-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-43.png')");
    $('#diente43-a').css("background-position","0 7px");
    $('#diente43-a').css("background-repeat","no-repeat");
    $('#m43').css("display","inline");
    $('#i43').css("display","inline");
    $('#f43').css("display","inline");
    $('#s43-a').css("display","inline");
    $('#s43-b').css("display","inline");
    $('#s43-c').css("display","inline");
    $('#p43-a').css("display","inline");
    $('#p43-b').css("display","inline");
    $('#p43-c').css("display","inline");
    $('#mg43-a').css("display","inline");
    $('#mg43-b').css("display","inline");
    $('#mg43-c').css("display","inline");
    $('#ps43-a').css("display","inline");
    $('#ps43-b').css("display","inline");
    $('#ps43-c').css("display","inline");
    $('#ae43b').css("display","inline");
    $('#pi43b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d42b').toggle(
      function () {
        $('#diente42b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-42b.png')");
    $('#diente42b-a').css("background-position","0 15px");
    $('#diente42b-a').css("background-repeat","no-repeat");
    $('#m42b').css("display","none");
    $('#i42b').css("display","none");
    $('#f42b').css("display","none");
    $('#s42b-a').css("display","none");
    $('#s42b-b').css("display","none");
    $('#s42b-c').css("display","none");
    $('#p42b-a').css("display","none");
    $('#p42b-b').css("display","none");
    $('#p42b-c').css("display","none");
    $('#mg42b-a').css("display","none");
    $('#mg42b-b').css("display","none");
    $('#mg42b-c').css("display","none");
    $('#ps42b-a').css("display","none");
    $('#ps42b-b').css("display","none");
    $('#ps42b-c').css("display","none");
    /*
    $('#mg42b-a').val('0');
    $('#mg42b-b').val('0');
    $('#mg42b-c').val('0');
    $('#ps42b-a').val('0');
    $('#ps42b-b').val('0');
    $('#ps42b-c').val('0');
    */
    
    $('#diente42-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-42.png')");
    $('#diente42-a').css("background-position","0 3px");
    $('#diente42-a').css("background-repeat","no-repeat");
    $('#m42').css("display","none");
    $('#i42').css("display","none");
    $('#f42').css("display","none");
    $('#s42-a').css("display","none");
    $('#s42-b').css("display","none");
    $('#s42-c').css("display","none");
    $('#p42-a').css("display","none");
    $('#p42-b').css("display","none");
    $('#p42-c').css("display","none");
    $('#mg42-a').css("display","none");
    $('#mg42-b').css("display","none");
    $('#mg42-c').css("display","none");
    $('#ps42-a').css("display","none");
    $('#ps42-b').css("display","none");
    $('#ps42-c').css("display","none");
    /*
    $('#mg42-a').val('0');
    $('#mg42-b').val('0');
    $('#mg42-c').val('0');
    $('#ps42-a').val('0');
    $('#ps42-b').val('0');
    $('#ps42-c').val('0');
    */
    $('#ae42b').css("display","none");
    $('#pi42b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar42a();
    cargar42b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente42b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-42b.png')");
    $('#diente42b-a').css("background-position","0 15px");
    $('#diente42b-a').css("background-repeat","no-repeat");
    $('#m42b').css("display","inline");
    $('#i42b').css("display","block");
    $('#f42b').css("display","inline");
    $('#s42b-a').css("display","inline");
    $('#s42b-b').css("display","inline");
    $('#s42b-c').css("display","inline");
    $('#p42b-a').css("display","inline");
    $('#p42b-b').css("display","inline");
    $('#p42b-c').css("display","inline");
    $('#mg42b-a').css("display","inline");
    $('#mg42b-b').css("display","inline");
    $('#mg42b-c').css("display","inline");
    $('#ps42b-a').css("display","inline");
    $('#ps42b-b').css("display","inline");
    $('#ps42b-c').css("display","inline");
    
    $('#diente42-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-42.png')");
    $('#diente42-a').css("background-position","0 3px");
    $('#diente42-a').css("background-repeat","no-repeat");
    $('#m42').css("display","inline");
    $('#i42').css("display","inline");
    $('#f42').css("display","inline");
    $('#s42-a').css("display","inline");
    $('#s42-b').css("display","inline");
    $('#s42-c').css("display","inline");
    $('#p42-a').css("display","inline");
    $('#p42-b').css("display","inline");
    $('#p42-c').css("display","inline");
    $('#mg42-a').css("display","inline");
    $('#mg42-b').css("display","inline");
    $('#mg42-c').css("display","inline");
    $('#ps42-a').css("display","inline");
    $('#ps42-b').css("display","inline");
    $('#ps42-c').css("display","inline");
    $('#ae42b').css("display","inline");
    $('#pi42b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
  $('#d41b').toggle(
      function () {
        $('#diente41b-a').css("background","url('Periodontograma/img/tabla7/tachados/periodontograma-dientes-abajo-tachados-41b.png')");
    $('#diente41b-a').css("background-position","0 19px");
    $('#diente41b-a').css("background-repeat","no-repeat");
    $('#m41b').css("display","none");
    $('#i41b').css("display","none");
    $('#f41b').css("display","none");
    $('#s41b-a').css("display","none");
    $('#s41b-b').css("display","none");
    $('#s41b-c').css("display","none");
    $('#p41b-a').css("display","none");
    $('#p41b-b').css("display","none");
    $('#p41b-c').css("display","none");
    $('#mg41b-a').css("display","none");
    $('#mg41b-b').css("display","none");
    $('#mg41b-c').css("display","none");
    $('#ps41b-a').css("display","none");
    $('#ps41b-b').css("display","none");
    $('#ps41b-c').css("display","none");
    /*
    $('#mg41b-a').val('0');
    $('#mg41b-b').val('0');
    $('#mg41b-c').val('0');
    $('#ps41b-a').val('0');
    $('#ps41b-b').val('0');
    $('#ps41b-c').val('0');
    */
    
    $('#diente41-a').css("background","url('Periodontograma/img/tabla5/tachados/periodontograma-dientes-abajo-tachados-41.png')");
    $('#diente41-a').css("background-position","0 1px");
    $('#diente41-a').css("background-repeat","no-repeat");
    $('#m41').css("display","none");
    $('#i41').css("display","none");
    $('#f41').css("display","none");
    $('#s41-a').css("display","none");
    $('#s41-b').css("display","none");
    $('#s41-c').css("display","none");
    $('#p41-a').css("display","none");
    $('#p41-b').css("display","none");
    $('#p41-c').css("display","none");
    $('#mg41-a').css("display","none");
    $('#mg41-b').css("display","none");
    $('#mg41-c').css("display","none");
    $('#ps41-a').css("display","none");
    $('#ps41-b').css("display","none");
    $('#ps41-c').css("display","none");
    /*
    $('#mg41-a').val('0');
    $('#mg41-b').val('0');
    $('#mg41-c').val('0');
    $('#ps41-a').val('0');
    $('#ps41-b').val('0');
    $('#ps41-c').val('0');
    */
    $('#ae41b').css("display","none");
    $('#pi41b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar41a();
    cargar41b();
    
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente41b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-41b.png')");
    $('#diente41b-a').css("background-position","0 19px");
    $('#diente41b-a').css("background-repeat","no-repeat");
    $('#m41b').css("display","inline");
    $('#i41b').css("display","block");
    $('#f41b').css("display","inline");
    $('#s41b-a').css("display","inline");
    $('#s41b-b').css("display","inline");
    $('#s41b-c').css("display","inline");
    $('#p41b-a').css("display","inline");
    $('#p41b-b').css("display","inline");
    $('#p41b-c').css("display","inline");
    $('#mg41b-a').css("display","inline");
    $('#mg41b-b').css("display","inline");
    $('#mg41b-c').css("display","inline");
    $('#ps41b-a').css("display","inline");
    $('#ps41b-b').css("display","inline");
    $('#ps41b-c').css("display","inline");
    
    $('#diente41-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-41.png')");
    $('#diente41-a').css("background-position","0 1px");
    $('#diente41-a').css("background-repeat","no-repeat");
    $('#m41').css("display","inline");
    $('#i41').css("display","inline");
    $('#f41').css("display","inline");
    $('#s41-a').css("display","inline");
    $('#s41-b').css("display","inline");
    $('#s41-c').css("display","inline");
    $('#p41-a').css("display","inline");
    $('#p41-b').css("display","inline");
    $('#p41-c').css("display","inline");
    $('#mg41-a').css("display","inline");
    $('#mg41-b').css("display","inline");
    $('#mg41-c').css("display","inline");
    $('#ps41-a').css("display","inline");
    $('#ps41-b').css("display","inline");
    $('#ps41-c').css("display","inline");
    $('#ae41b').css("display","inline");
    $('#pi41b').css("display","inline");
    
    totalDientes++;
    cargar5();
    cargar6();
    cargar7();
    cargar8();
    getSangrado();
    getPlaca();
      }
  );
//IMPLANTES 

/*
  $('#i18').toggle(
      function () {   
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f18').css({"background":"#FFFFFF"});
    $('#diente18-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-18.png')");
    $('#diente18-a').css("background-position","0 -2px");
    $('#diente18-a').css("background-repeat","no-repeat");
    
    $('#diente18b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-18b.png')");
    $('#diente18b-a').css("background-position","0 23px");
    $('#diente18b-a').css("background-repeat","no-repeat");
    
    $('#furca18').css("background","none");
    $('#furca18-a').css("background","none");
    $('#furca18-b').css("background","none");
    $('#f18').css("background","none");
    $('#f18b-a').css("background","none");
    $('#f18b-b').css("background","none");
    
    $("#f18").attr("id","f18desact");
    $("#f18b-a").attr("id","f18b-adesact");
    $("#f18b-b").attr("id","f18b-bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente18-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png')");
    $('#diente18-a').css("background-position","0 -2px");
    $('#diente18-a').css("background-repeat","no-repeat");
    
    $('#diente18b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-18b.png')");
    $('#diente18b-a').css("background-position","0 23px");
    $('#diente18b-a').css("background-repeat","no-repeat");
    
    $('#f18').css("background","#FFFFFF");
    $('#f18b-a').css("background","#FFFFFF");
    $('#f18b-b').css("background","#FFFFFF");
    
    $("#f18desact").attr("id","f18");
    $("#f18b-adesact").attr("id","f18b-a");
    $("#f18b-bdesact").attr("id","f18b-b");
    $('#d18').trigger('click');
      }
  );
  
  $('#i17').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f17').css({"background":"#FFFFFF"});
    $('#diente17-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-17.png')");
    $('#diente17-a').css("background-position","0 -1px");
    $('#diente17-a').css("background-repeat","no-repeat");
    
    $('#diente17b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-17b.png')");
    $('#diente17b-a').css("background-position","0 24px");
    $('#diente17b-a').css("background-repeat","no-repeat");
    
    $('#furca17').css("background","none");
    $('#furca17-a').css("background","none");
    $('#furca17-b').css("background","none");
    $('#f17').css("background","none");
    $('#f17b-a').css("background","none");
    $('#f17b-b').css("background","none");
    
    $("#f17").attr("id","f17desact");
    $("#f17b-a").attr("id","f17b-adesact");
    $("#f17b-b").attr("id","f17b-bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente17-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png')");
    $('#diente17-a').css("background-repeat","no-repeat");
    
    $('#diente17b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-17b.png')");
    $('#diente17b-a').css("background-position","0 24px");
    $('#diente17b-a').css("background-repeat","no-repeat");
    
    $('#f17').css("background","#FFFFFF");
    $('#f17b-a').css("background","#FFFFFF");
    $('#f17b-b').css("background","#FFFFFF");
    
    $("#f17desact").attr("id","f17");
    $("#f17b-adesact").attr("id","f17b-a");
    $("#f17b-bdesact").attr("id","f17b-b");
    
      }
  );
  
    $('#i16').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f16').css({"background":"#FFFFFF"});
    $('#diente16-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-16.png')");
    $('#diente16-a').css("background-position","0 4px");
    $('#diente16-a').css("background-repeat","no-repeat");
    
    $('#diente16b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-16b.png')");
    $('#diente16b-a').css("background-position","0 22px");
    $('#diente16b-a').css("background-repeat","no-repeat");
    
    $('#furca16').css("background","none");
    $('#furca16-a').css("background","none");
    $('#furca16-b').css("background","none");
    $('#f16').css("background","none");
    $('#f16b-a').css("background","none");
    $('#f16b-b').css("background","none");
    
    $("#f16").attr("id","f16desact");
    $("#f16b-a").attr("id","f16b-adesact");
    $("#f16b-b").attr("id","f16b-bdesact");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente16-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png')");
    $('#diente16-a').css("background-position","0 4px");
    $('#diente16-a').css("background-repeat","no-repeat");
    
    $('#diente16b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-16b.png')");
    $('#diente16b-a').css("background-position","0 22px");
    $('#diente16b-a').css("background-repeat","no-repeat");
    
    $('#f16').css("background","#FFFFFF");
    $('#f16b-a').css("background","#FFFFFF");
    $('#f16b-b').css("background","#FFFFFF");
    
    $("#f16desact").attr("id","f16");
    $("#f16b-adesact").attr("id","f16b-a");
    $("#f16b-bdesact").attr("id","f16b-b");
      }
  );
  
    $('#i15').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente15-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-15.png')");
    $('#diente15-a').css("background-position","0 4px");
    $('#diente15-a').css("background-repeat","no-repeat");
    
    $('#diente15b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-15b.png')");
    $('#diente15b-a').css("background-position","0 17px");
    $('#diente15b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente15-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png')");
    $('#diente15-a').css("background-position","0 5px");
    $('#diente15-a').css("background-repeat","no-repeat");
    
    $('#diente15b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-15b.png')");
    $('#diente15b-a').css("background-position","0 17px");
    $('#diente15b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i14').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente14-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-14.png')");
    $('#diente14-a').css("background-repeat","no-repeat");
    
    $('#diente14b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-14b.png')");
    $('#diente14b-a').css("background-position","0 17px");
    $('#diente14b-a').css("background-repeat","no-repeat");
    
    $('#furca14-a').css("background","none");
    $('#furca14-b').css("background","none");
    $('#f14b-a').css("background","none");
    $('#f14b-b').css("background","none");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente14-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png')");
    $('#diente14-a').css("background-repeat","no-repeat");
    
    $('#diente14b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-14b.png')");
    $('#diente14b-a').css("background-position","0 17px");
    $('#diente14b-a').css("background-repeat","no-repeat");
    
    $('#f14b-a').css("background","#FFFFFF");
    $('#f14b-b').css("background","#FFFFFF");
      }
  );

  
    $('#i13').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente13-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-13.png')");
    $('#diente13-a').css("background-position","0 2px");
    $('#diente13-a').css("background-repeat","no-repeat");
    
    $('#diente13b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-13b.png')");
    $('#diente13b-a').css("background-position","0 16px");
    $('#diente13b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente13-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png')");
    $('#diente13-a').css("background-position","0 2px");
    $('#diente13-a').css("background-repeat","no-repeat");
    
    $('#diente13b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-13b.png')");
    $('#diente13b-a').css("background-position","0 16px");
    $('#diente13b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i12').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente12-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-12.png')");
    $('#diente12-a').css("background-position","0 4px");
    $('#diente12-a').css("background-repeat","no-repeat");
    
    $('#diente12b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-12b.png')");
    $('#diente12b-a').css("background-position","0 18px");
    $('#diente12b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente12-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-12.png')");
    $('#diente12-a').css("background-position","0 6px");
    $('#diente12-a').css("background-repeat","no-repeat");
    
    $('#diente12b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-12b.png')");
    $('#diente12b-a').css("background-position","0 18px");
    $('#diente12b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i11').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente11-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-11.png')");
    $('#diente11-a').css("background-position","bottom");
    $('#diente11-a').css("background-repeat","no-repeat");
    
    $('#diente11b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-11b.png')");
    $('#diente11b-a').css("background-position","0 12px");
    $('#diente11b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente11-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-11.png')");
    $('#diente11-a').css("background-position","bottom");
    $('#diente11-a').css("background-repeat","no-repeat");
    
    $('#diente11b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-11b.png')");
    $('#diente11b-a').css("background-position","0 12px");
    $('#diente11b-a').css("background-repeat","no-repeat");
      }
  );

  */

  //FURCA
  /*
  $('#f18').toggle(
    function () {
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
      $('#i18').css({"background":"#FFFFFF"});
      $('#furca18').css("background","url('Periodontograma/img/vacio.png')");
    },
    function () {
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
      $('#furca18').css("background","url('Periodontograma/img/mediolleno.png')");
    },
    function () {
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
      $('#furca18').css("background","url('Periodontograma/img/lleno.png')");
    },
    function () {
      $(this).css({"background":"#FFFFFF"});
      $('#furca18').css("background","none");
    }
  );
    

$('#f17').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i17').css({"background":"#FFFFFF"});
    $('#furca17').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca17').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca17').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca17').css("background","none");
      }
);

$('#f16').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i16').css({"background":"#FFFFFF"});
    $('#furca16').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca16').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca16').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca16').css("background","none");
      }
);
*/

//TABLA 2
//TACHADOS
  
  $('#d21').toggle(
      function () {
        $('#diente21-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-21.png')");
    $('#diente21-a').css("background-position","bottom");
    $('#diente21-a').css("background-repeat","no-repeat");
    $('#m21').css("display","none");
    $('#i21').css("display","none");
    $('#f21').css("display","none");
    $('#s21-a').css("display","none");
    $('#s21-b').css("display","none");
    $('#s21-c').css("display","none");
    $('#p21-a').css("display","none");
    $('#p21-b').css("display","none");
    $('#p21-c').css("display","none");
    $('#mg21-a').css("display","none");
    $('#mg21-b').css("display","none");
    $('#mg21-c').css("display","none");
    $('#ps21-a').css("display","none");
    $('#ps21-b').css("display","none");
    $('#ps21-c').css("display","none");
    $('#mg21-a').val('0');
    $('#mg21-b').val('0');
    $('#mg21-c').val('0');
    $('#ps21-a').val('0');
    $('#ps21-b').val('0');
    $('#ps21-c').val('0');
    
    $('#diente21b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-21b.png')");
    $('#diente21b-a').css("background-position","0 11px");
    $('#diente21b-a').css("background-repeat","no-repeat");
    $('#m21b').css("display","none");
    $('#i21b').css("display","none");
    $('#f21b').css("display","none");
    $('#s21b-a').css("display","none");
    $('#s21b-b').css("display","none");
    $('#s21b-c').css("display","none");
    $('#p21b-a').css("display","none");
    $('#p21b-b').css("display","none");
    $('#p21b-c').css("display","none");
    $('#mg21b-a').css("display","none");
    $('#mg21b-b').css("display","none");
    $('#mg21b-c').css("display","none");
    $('#ps21b-a').css("display","none");
    $('#ps21b-b').css("display","none");
    $('#ps21b-c').css("display","none");
    $('#mg21b-a').val('0');
    $('#mg21b-b').val('0');
    $('#mg21b-c').val('0');
    $('#ps21b-a').val('0');
    $('#ps21b-b').val('0');
    $('#ps21b-c').val('0');
    $('#ae21').css("display","none");
    $('#pi21').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar21a();
    cargar21b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente21-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-21.png')");
    $('#diente21-a').css("background-position","bottom");
    $('#diente21-a').css("background-repeat","no-repeat");
    $('#m21').css("display","inline");
    $('#i21').css("display","block");
    $('#f21').css("display","inline");
    $('#s21-a').css("display","inline");
    $('#s21-b').css("display","inline");
    $('#s21-c').css("display","inline");
    $('#p21-a').css("display","inline");
    $('#p21-b').css("display","inline");
    $('#p21-c').css("display","inline");
    $('#mg21-a').css("display","inline");
    $('#mg21-b').css("display","inline");
    $('#mg21-c').css("display","inline");
    $('#ps21-a').css("display","inline");
    $('#ps21-b').css("display","inline");
    $('#ps21-c').css("display","inline");
    
    $('#diente21b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-21b.png')");
    $('#diente21b-a').css("background-position","0 11px");
    $('#diente21b-a').css("background-repeat","no-repeat");
    $('#m21b').css("display","inline");
    $('#i21b').css("display","inline");
    $('#f21b').css("display","inline");
    $('#s21b-a').css("display","inline");
    $('#s21b-b').css("display","inline");
    $('#s21b-c').css("display","inline");
    $('#p21b-a').css("display","inline");
    $('#p21b-b').css("display","inline");
    $('#p21b-c').css("display","inline");
    $('#mg21b-a').css("display","inline");
    $('#mg21b-b').css("display","inline");
    $('#mg21b-c').css("display","inline");
    $('#ps21b-a').css("display","inline");
    $('#ps21b-b').css("display","inline");
    $('#ps21b-c').css("display","inline");
    $('#ae21').css("display","inline");
    $('#pi21').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  
  $('#d22').toggle(
      function () {
        $('#diente22-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-22.png')");
    $('#diente22-a').css("background-position","0px 6px");
    $('#diente22-a').css("background-repeat","no-repeat");
    $('#m22').css("display","none");
    $('#i22').css("display","none");
    $('#f22').css("display","none");
    $('#s22-a').css("display","none");
    $('#s22-b').css("display","none");
    $('#s22-c').css("display","none");
    $('#p22-a').css("display","none");
    $('#p22-b').css("display","none");
    $('#p22-c').css("display","none");
    $('#mg22-a').css("display","none");
    $('#mg22-b').css("display","none");
    $('#mg22-c').css("display","none");
    $('#ps22-a').css("display","none");
    $('#ps22-b').css("display","none");
    $('#ps22-c').css("display","none");
    $('#mg22-a').val('0');
    $('#mg22-b').val('0');
    $('#mg22-c').val('0');
    $('#ps22-a').val('0');
    $('#ps22-b').val('0');
    $('#ps22-c').val('0');
    
    $('#diente22b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-22b.png')");
    $('#diente22b-a').css("background-position","0px 17px");
    $('#diente22b-a').css("background-repeat","no-repeat");
    $('#m22b').css("display","none");
    $('#i22b').css("display","none");
    $('#f22b').css("display","none");
    $('#s22b-a').css("display","none");
    $('#s22b-b').css("display","none");
    $('#s22b-c').css("display","none");
    $('#p22b-a').css("display","none");
    $('#p22b-b').css("display","none");
    $('#p22b-c').css("display","none");
    $('#mg22b-a').css("display","none");
    $('#mg22b-b').css("display","none");
    $('#mg22b-c').css("display","none");
    $('#ps22b-a').css("display","none");
    $('#ps22b-b').css("display","none");
    $('#ps22b-c').css("display","none");
    $('#mg22b-a').val('0');
    $('#mg22b-b').val('0');
    $('#mg22b-c').val('0');
    $('#ps22b-a').val('0');
    $('#ps22b-b').val('0');
    $('#ps22b-c').val('0');
    $('#ae22').css("display","none");
    $('#pi22').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar22a();
    cargar22b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente22-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-22.png')");
    $('#diente22-a').css("background-position","0px 6px");
    $('#diente22-a').css("background-repeat","no-repeat");
    $('#m22').css("display","inline");
    $('#i22').css("display","block");
    $('#f22').css("display","inline");
    $('#s22-a').css("display","inline");
    $('#s22-b').css("display","inline");
    $('#s22-c').css("display","inline");
    $('#p22-a').css("display","inline");
    $('#p22-b').css("display","inline");
    $('#p22-c').css("display","inline");
    $('#mg22-a').css("display","inline");
    $('#mg22-b').css("display","inline");
    $('#mg22-c').css("display","inline");
    $('#ps22-a').css("display","inline");
    $('#ps22-b').css("display","inline");
    $('#ps22-c').css("display","inline");
    
    $('#diente22b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-22b.png')");
    $('#diente22b-a').css("background-position","0px 17px");
    $('#diente22b-a').css("background-repeat","no-repeat");
    $('#m22b').css("display","inline");
    $('#i22b').css("display","inline");
    $('#f22b').css("display","inline");
    $('#s22b-a').css("display","inline");
    $('#s22b-b').css("display","inline");
    $('#s22b-c').css("display","inline");
    $('#p22b-a').css("display","inline");
    $('#p22b-b').css("display","inline");
    $('#p22b-c').css("display","inline");
    $('#mg22b-a').css("display","inline");
    $('#mg22b-b').css("display","inline");
    $('#mg22b-c').css("display","inline");
    $('#ps22b-a').css("display","inline");
    $('#ps22b-b').css("display","inline");
    $('#ps22b-c').css("display","inline");
    $('#ae22').css("display","inline");
    $('#pi22').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d23').toggle(
      function () {
        $('#diente23-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-23.png')");
    $('#diente23-a').css("background-position","top");
    $('#diente23-a').css("background-repeat","no-repeat");
    $('#m23').css("display","none");
    $('#i23').css("display","none");
    $('#f23').css("display","none");
    $('#s23-a').css("display","none");
    $('#s23-b').css("display","none");
    $('#s23-c').css("display","none");
    $('#p23-a').css("display","none");
    $('#p23-b').css("display","none");
    $('#p23-c').css("display","none");
    $('#mg23-a').css("display","none");
    $('#mg23-b').css("display","none");
    $('#mg23-c').css("display","none");
    $('#ps23-a').css("display","none");
    $('#ps23-b').css("display","none");
    $('#ps23-c').css("display","none");
    $('#mg23-a').val('0');
    $('#mg23-b').val('0');
    $('#mg23-c').val('0');
    $('#ps23-a').val('0');
    $('#ps23-b').val('0');
    $('#ps23-c').val('0');
    
    $('#diente23b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-23b.png')");
    $('#diente23b-a').css("background-position","0 15px");
    $('#diente23b-a').css("background-repeat","no-repeat");
    $('#m23b').css("display","none");
    $('#i23b').css("display","none");
    $('#f23b').css("display","none");
    $('#s23b-a').css("display","none");
    $('#s23b-b').css("display","none");
    $('#s23b-c').css("display","none");
    $('#p23b-a').css("display","none");
    $('#p23b-b').css("display","none");
    $('#p23b-c').css("display","none");
    $('#mg23b-a').css("display","none");
    $('#mg23b-b').css("display","none");
    $('#mg23b-c').css("display","none");
    $('#ps23b-a').css("display","none");
    $('#ps23b-b').css("display","none");
    $('#ps23b-c').css("display","none");
    $('#mg23b-a').val('0');
    $('#mg23b-b').val('0');
    $('#mg23b-c').val('0');
    $('#ps23b-a').val('0');
    $('#ps23b-b').val('0');
    $('#ps23b-c').val('0');
    $('#ae23').css("display","none");
    $('#pi23').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar23a();
    cargar23b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente23-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-23.png')");
    $('#diente23-a').css("background-position","top");
    $('#diente23-a').css("background-repeat","no-repeat");
    $('#m23').css("display","inline");
    $('#i23').css("display","block");
    $('#f23').css("display","inline");
    $('#s23-a').css("display","inline");
    $('#s23-b').css("display","inline");
    $('#s23-c').css("display","inline");
    $('#p23-a').css("display","inline");
    $('#p23-b').css("display","inline");
    $('#p23-c').css("display","inline");
    $('#mg23-a').css("display","inline");
    $('#mg23-b').css("display","inline");
    $('#mg23-c').css("display","inline");
    $('#ps23-a').css("display","inline");
    $('#ps23-b').css("display","inline");
    $('#ps23-c').css("display","inline");
    
    $('#diente23b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-23b.png')");
    $('#diente23b-a').css("background-position","0 15px");
    $('#diente23b-a').css("background-repeat","no-repeat");
    $('#m23b').css("display","inline");
    $('#i23b').css("display","inline");
    $('#f23b').css("display","inline");
    $('#s23b-a').css("display","inline");
    $('#s23b-b').css("display","inline");
    $('#s23b-c').css("display","inline");
    $('#p23b-a').css("display","inline");
    $('#p23b-b').css("display","inline");
    $('#p23b-c').css("display","inline");
    $('#mg23b-a').css("display","inline");
    $('#mg23b-b').css("display","inline");
    $('#mg23b-c').css("display","inline");
    $('#ps23b-a').css("display","inline");
    $('#ps23b-b').css("display","inline");
    $('#ps23b-c').css("display","inline");
    $('#ae23').css("display","inline");
    $('#pi23').css("display","inline");
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d24').toggle(
      function () {
        $('#diente24-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-24.png')");
    /*$('#diente24-a').css("background-position","0");*/
    $('#diente24-a').css("background-repeat","no-repeat");
    $('#m24').css("display","none");
    $('#i24').css("display","none");
    $('#f24').css("display","none");
    $('#s24-a').css("display","none");
    $('#s24-b').css("display","none");
    $('#s24-c').css("display","none");
    $('#p24-a').css("display","none");
    $('#p24-b').css("display","none");
    $('#p24-c').css("display","none");
    $('#mg24-a').css("display","none");
    $('#mg24-b').css("display","none");
    $('#mg24-c').css("display","none");
    $('#ps24-a').css("display","none");
    $('#ps24-b').css("display","none");
    $('#ps24-c').css("display","none");
    $('#mg24-a').val('0');
    $('#mg24-b').val('0');
    $('#mg24-c').val('0');
    $('#ps24-a').val('0');
    $('#ps24-b').val('0');
    $('#ps24-c').val('0');
    
    $('#diente24b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-24b.png')");
    $('#diente24b-a').css("background-position","0 16px");
    $('#diente24b-a').css("background-repeat","no-repeat");
    $('#m24b').css("display","none");
    $('#i24b').css("display","none");
    $('#f24b').css("display","none");
    $('#s24b-a').css("display","none");
    $('#s24b-b').css("display","none");
    $('#s24b-c').css("display","none");
    $('#p24b-a').css("display","none");
    $('#p24b-b').css("display","none");
    $('#p24b-c').css("display","none");
    $('#mg24b-a').css("display","none");
    $('#mg24b-b').css("display","none");
    $('#mg24b-c').css("display","none");
    $('#ps24b-a').css("display","none");
    $('#ps24b-b').css("display","none");    
    $('#ps24b-c').css("display","none");
    $('#mg24b-a').val('0');
    $('#mg24b-b').val('0');
    $('#mg24b-c').val('0');
    $('#ps24b-a').val('0');
    $('#ps24b-b').val('0');
    $('#ps24b-c').val('0');

    $('#f24b-adesact').css("display","none");
    $('#f24b-bdesact').css("display","none");

    $('#furca24-a').css("display","none");
    $('#furca24-b').css("display","none");
    $('#f24b-a').css("display","none");
    $('#f24b-b').css("display","none");
    $('#ae24').css("display","none");
    $('#pi24').css("display","none");
    totalDientes--;
    getDefectos();
    cargar24a();
    cargar24b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente24-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-24.png')");
    $('#diente24-a').css("background-position","0");
    $('#diente24-a').css("background-repeat","no-repeat");
    $('#m24').css("display","inline");
    $('#i24').css("display","block");
    $('#f24').css("display","inline");
    $('#s24-a').css("display","inline");
    $('#s24-b').css("display","inline");
    $('#s24-c').css("display","inline");
    $('#p24-a').css("display","inline");
    $('#p24-b').css("display","inline");
    $('#p24-c').css("display","inline");
    $('#mg24-a').css("display","inline");
    $('#mg24-b').css("display","inline");
    $('#mg24-c').css("display","inline");
    $('#ps24-a').css("display","inline");
    $('#ps24-b').css("display","inline");
    $('#ps24-c').css("display","inline");
    
    $('#diente24b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-24b.png')");
    $('#diente24b-a').css("background-position","0 16px");
    $('#diente24b-a').css("background-repeat","no-repeat");
    $('#m24b').css("display","inline");
    $('#i24b').css("display","inline");
    $('#f24b').css("display","inline");
    $('#s24b-a').css("display","inline");
    $('#s24b-b').css("display","inline");
    $('#s24b-c').css("display","inline");
    $('#p24b-a').css("display","inline");
    $('#p24b-b').css("display","inline");
    $('#p24b-c').css("display","inline");
    $('#mg24b-a').css("display","inline");
    $('#mg24b-b').css("display","inline");
    $('#mg24b-c').css("display","inline");
    $('#ps24b-a').css("display","inline");
    $('#ps24b-b').css("display","inline");
    $('#ps24b-c').css("display","inline");

    $('#f24b-adesact').css("display","block");
    $('#f24b-bdesact').css("display","block");

    $('#furca24-b').css("display","block");
    $('#furca24-a').css("display","block");
    $('#f24b-a').css("display","inline");
    $('#f24b-b').css("display","inline");
    $('#ae24').css("display","inline");
    $('#pi24').css("display","inline");
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d25').toggle(
      function () {
        $('#diente25-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-25.png')");
    $('#diente25-a').css("background-position","0 5px");
    $('#diente25-a').css("background-repeat","no-repeat");
    $('#m25').css("display","none");
    $('#i25').css("display","none");
    $('#f25').css("display","none");
    $('#s25-a').css("display","none");
    $('#s25-b').css("display","none");
    $('#s25-c').css("display","none");
    $('#p25-a').css("display","none");
    $('#p25-b').css("display","none");
    $('#p25-c').css("display","none");
    $('#mg25-a').css("display","none");
    $('#mg25-b').css("display","none");
    $('#mg25-c').css("display","none");
    $('#ps25-a').css("display","none");
    $('#ps25-b').css("display","none");
    $('#ps25-c').css("display","none");
    $('#mg25-a').val('0');
    $('#mg25-b').val('0');
    $('#mg25-c').val('0');
    $('#ps25-a').val('0');
    $('#ps25-b').val('0');
    $('#ps25-c').val('0');
    
    $('#diente25b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-25b.png')");
    $('#diente25b-a').css("background-position","0 16px");
    $('#diente25b-a').css("background-repeat","no-repeat");
    $('#m25b').css("display","none");
    $('#i25b').css("display","none");
    $('#f25b').css("display","none");
    $('#s25b-a').css("display","none");
    $('#s25b-b').css("display","none");
    $('#s25b-c').css("display","none");
    $('#p25b-a').css("display","none");
    $('#p25b-b').css("display","none");
    $('#p25b-c').css("display","none");
    $('#mg25b-a').css("display","none");
    $('#mg25b-b').css("display","none");
    $('#mg25b-c').css("display","none");
    $('#ps25b-a').css("display","none");
    $('#ps25b-b').css("display","none");
    $('#ps25b-c').css("display","none");
    $('#mg25b-a').val('0');
    $('#mg25b-b').val('0');
    $('#mg25b-c').val('0');
    $('#ps25b-a').val('0');
    $('#ps25b-b').val('0');
    $('#ps25b-c').val('0');
    $('#ae25').css("display","none");
    $('#pi25').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar25a();
    cargar25b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente25-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-25.png')");
    $('#diente25-a').css("background-position","0 5px");
    $('#diente25-a').css("background-repeat","no-repeat");
    $('#m25').css("display","inline");
    $('#i25').css("display","block");
    $('#f25').css("display","inline");
    $('#s25-a').css("display","inline");
    $('#s25-b').css("display","inline");
    $('#s25-c').css("display","inline");
    $('#p25-a').css("display","inline");
    $('#p25-b').css("display","inline");
    $('#p25-c').css("display","inline");
    $('#mg25-a').css("display","inline");
    $('#mg25-b').css("display","inline");
    $('#mg25-c').css("display","inline");
    $('#ps25-a').css("display","inline");
    $('#ps25-b').css("display","inline");
    $('#ps25-c').css("display","inline");
    
    $('#diente25b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-25b.png')");
    $('#diente25b-a').css("background-position","0 16px");
    $('#diente25b-a').css("background-repeat","no-repeat");
    $('#m25b').css("display","inline");
    $('#i25b').css("display","inline");
    $('#f25b').css("display","inline");
    $('#s25b-a').css("display","inline");
    $('#s25b-b').css("display","inline");
    $('#s25b-c').css("display","inline");
    $('#p25b-a').css("display","inline");
    $('#p25b-b').css("display","inline");
    $('#p25b-c').css("display","inline");
    $('#mg25b-a').css("display","inline");
    $('#mg25b-b').css("display","inline");
    $('#mg25b-c').css("display","inline");
    $('#ps25b-a').css("display","inline");
    $('#ps25b-b').css("display","inline");
    $('#ps25b-c').css("display","inline");
    $('#ae25').css("display","inline");
    $('#pi25').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d26').toggle(
      function () {
        $('#diente26-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-26.png')");
    $('#diente26-a').css("background-position","0 4px");
    $('#diente26-a').css("background-repeat","no-repeat");
    $('#m26').css("display","none");
    $('#i26').css("display","none");
    $('#f26').css("display","none");
    $('#s26-a').css("display","none");
    $('#s26-b').css("display","none");
    $('#s26-c').css("display","none");
    $('#p26-a').css("display","none");
    $('#p26-b').css("display","none");
    $('#p26-c').css("display","none");
    $('#mg26-a').css("display","none");
    $('#mg26-b').css("display","none");
    $('#mg26-c').css("display","none");
    $('#ps26-a').css("display","none");
    $('#ps26-b').css("display","none");
    $('#ps26-c').css("display","none");
    /*$('#furca26').css("background","none");*/
    $('#f26desact').css("display","none");

    $('#f26b-adesact').css("display","none");
    $('#f26b-bdesact').css("display","none");

    $('#mg26-a').val('0');
    $('#mg26-b').val('0');
    $('#mg26-c').val('0');
    $('#ps26-a').val('0');
    $('#ps26-b').val('0');
    $('#ps26-c').val('0');
    
    $('#diente26b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-26b.png')");
    $('#diente26b-a').css("background-position","0 21px");
    $('#diente26b-a').css("background-repeat","no-repeat");
    $('#m26b').css("display","none");
    $('#i26b').css("display","none");
    $('#f26b').css("display","none");
    $('#s26b-a').css("display","none");
    $('#s26b-b').css("display","none");
    $('#s26b-c').css("display","none");
    $('#p26b-a').css("display","none");
    $('#p26b-b').css("display","none");
    $('#p26b-c').css("display","none");
    $('#mg26b-a').css("display","none");
    $('#mg26b-b').css("display","none");
    $('#mg26b-c').css("display","none");
    $('#ps26b-a').css("display","none");
    $('#ps26b-b').css("display","none");
    $('#ps26b-c').css("display","none");
    $('#furca26b').css("background","none");
    $('#mg26b-a').val('0');
    $('#mg26b-b').val('0');
    $('#mg26b-c').val('0');
    $('#ps26b-a').val('0');
    $('#ps26b-b').val('0');
    $('#ps26b-c').val('0');
    $('#furca26').css("display","none");
    $('#furca26-a').css("display","none");
    $('#furca26-b').css("display","none");
    $('#f26b-a').css("display","none");
    $('#f26b-b').css("display","none");
    $('#ae26').css("display","none");
    $('#pi26').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar26a();
    cargar26b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente26-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-26.png')");
    $('#diente26-a').css("background-position","0 4px");
    $('#diente26-a').css("background-repeat","no-repeat");
    $('#m26').css("display","inline");
    $('#i26').css("display","block");
    $('#f26').css("display","inline");
    $('#s26-a').css("display","inline");
    $('#s26-b').css("display","inline");
    $('#s26-c').css("display","inline");
    $('#p26-a').css("display","inline");
    $('#p26-b').css("display","inline");
    $('#p26-c').css("display","inline");
    $('#mg26-a').css("display","inline");
    $('#mg26-b').css("display","inline");
    $('#mg26-c').css("display","inline");
    $('#ps26-a').css("display","inline");
    $('#ps26-b').css("display","inline");
    $('#ps26-c').css("display","inline");
    
    $('#diente26b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-26b.png')");
    $('#diente26b-a').css("background-position","0 21px");
    $('#diente26b-a').css("background-repeat","no-repeat");
    $('#m26b').css("display","inline");
    $('#i26b').css("display","inline");
    $('#f26b').css("display","inline");
    $('#s26b-a').css("display","inline");
    $('#s26b-b').css("display","inline");
    $('#s26b-c').css("display","inline");
    $('#p26b-a').css("display","inline");
    $('#p26b-b').css("display","inline");
    $('#p26b-c').css("display","inline");
    $('#mg26b-a').css("display","inline");
    $('#mg26b-b').css("display","inline");
    $('#mg26b-c').css("display","inline");
    $('#ps26b-a').css("display","inline");
    $('#ps26b-b').css("display","inline");
    $('#ps26b-c').css("display","inline");

    $('#f26desact').css("display","block");
    $('#f26b-adesact').css("display","block");
    $('#f26b-bdesact').css("display","block");

    $('#furca26').css("display","block");
    $('#furca26-a').css("display","block");
    $('#furca26-b').css("display","block");
    $('#f26b-a').css("display","inline");
    $('#f26b-b').css("display","inline");
    $('#ae26').css("display","inline");
    $('#pi26').css("display","inline");
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );

  $('#d27').toggle(
      function () {
        $('#diente27-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-27.png')");
    $('#diente27-a').css("background-position","0px 0px");
    $('#diente27-a').css("background-repeat","no-repeat");
    $('#m27').css("display","none");
    $('#i27').css("display","none");
    $('#f27').css("display","none");
    $('#s27-a').css("display","none");
    $('#s27-b').css("display","none");
    $('#s27-c').css("display","none");
    $('#p27-a').css("display","none");
    $('#p27-b').css("display","none");
    $('#p27-c').css("display","none");
    $('#mg27-a').css("display","none");
    $('#mg27-b').css("display","none");
    $('#mg27-c').css("display","none");
    $('#ps27-a').css("display","none");
    $('#ps27-b').css("display","none");
    $('#ps27-c').css("display","none");
    /*$('#furca27').css("background","none");*/

    $('#f27desact').css("display","none");
    $('#f27b-adesact').css("display","none");
    $('#f27b-bdesact').css("display","none");

    $('#mg27-a').val('0');
    $('#mg27-b').val('0');
    $('#mg27-c').val('0');
    $('#ps27-a').val('0');
    $('#ps27-b').val('0');
    $('#ps27-c').val('0');
    
    $('#diente27b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-27b.png')");
    $('#diente27b-a').css("background-position","0px 24px");
    $('#diente27b-a').css("background-repeat","no-repeat");
    $('#m27b').css("display","none");
    $('#i27b').css("display","none");
    $('#f27b').css("display","none");
    $('#s27b-a').css("display","none");
    $('#s27b-b').css("display","none");
    $('#s27b-c').css("display","none");
    $('#p27b-a').css("display","none");
    $('#p27b-b').css("display","none");
    $('#p27b-c').css("display","none");
    $('#mg27b-a').css("display","none");
    $('#mg27b-b').css("display","none");
    $('#mg27b-c').css("display","none");
    $('#ps27b-a').css("display","none");
    $('#ps27b-b').css("display","none");
    $('#ps27b-c').css("display","none");
    $('#furca27b').css("background","none");
    $('#mg27b-a').val('0');
    $('#mg27b-b').val('0');
    $('#mg27b-c').val('0');
    $('#ps27b-a').val('0');
    $('#ps27b-b').val('0');
    $('#ps27b-c').val('0');
    $('#furca27').css("display","none");
    $('#furca27-a').css("display","none");
    $('#furca27-b').css("display","none");
    $('#f27b-a').css("display","none");
    $('#f27b-b').css("display","none");
    $('#ae27').css("display","none");
    $('#pi27').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar27a();
    cargar27b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente27-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-27.png')");
    $('#diente27-a').css("background-position","0px 0px");
    $('#diente27-a').css("background-repeat","no-repeat");
    $('#m27').css("display","inline");
    $('#i27').css("display","block");
    $('#f27').css("display","inline");
    $('#s27-a').css("display","inline");
    $('#s27-b').css("display","inline");
    $('#s27-c').css("display","inline");
    $('#p27-a').css("display","inline");
    $('#p27-b').css("display","inline");
    $('#p27-c').css("display","inline");
    $('#mg27-a').css("display","inline");
    $('#mg27-b').css("display","inline");
    $('#mg27-c').css("display","inline");
    $('#ps27-a').css("display","inline");
    $('#ps27-b').css("display","inline");
    $('#ps27-c').css("display","inline");
    
    $('#diente27b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-27b.png')");
    $('#diente27b-a').css("background-position","0px 24px");
    $('#diente27b-a').css("background-repeat","no-repeat");
    $('#m27b').css("display","inline");
    $('#i27b').css("display","inline");
    $('#f27b').css("display","inline");
    $('#s27b-a').css("display","inline");
    $('#s27b-b').css("display","inline");
    $('#s27b-c').css("display","inline");
    $('#p27b-a').css("display","inline");
    $('#p27b-b').css("display","inline");
    $('#p27b-c').css("display","inline");
    $('#mg27b-a').css("display","inline");
    $('#mg27b-b').css("display","inline");
    $('#mg27b-c').css("display","inline");
    $('#ps27b-a').css("display","inline");
    $('#ps27b-b').css("display","inline");
    $('#ps27b-c').css("display","inline");

    $('#f27desact').css("display","block");
    $('#f27b-adesact').css("display","block");
    $('#f27b-bdesact').css("display","block");

    $('#furca27').css("display","block");
    $('#furca27-a').css("display","block");
    $('#furca27-b').css("display","block");
    $('#f27b-a').css("display","inline");
    $('#f27b-b').css("display","inline");
    $('#ae27').css("display","inline");
    $('#pi27').css("display","inline");
    
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d28').toggle(
      function () {
        $('#diente28-a').css("background","url('Periodontograma/img/tabla2/tachados/periodontograma-dientes-arriba-tachados-28.png')");
    $('#diente28-a').css("background-position","0 -2px");
    $('#diente28-a').css("background-repeat","no-repeat");
    $('#m28').css("display","none");
    $('#i28').css("display","none");
    $('#f28').css("display","none");
    $('#s28-a').css("display","none");
    $('#s28-b').css("display","none");
    $('#s28-c').css("display","none");
    $('#p28-a').css("display","none");
    $('#p28-b').css("display","none");
    $('#p28-c').css("display","none");
    $('#mg28-a').css("display","none");
    $('#mg28-b').css("display","none");
    $('#mg28-c').css("display","none");
    $('#ps28-a').css("display","none");
    $('#ps28-b').css("display","none");
    $('#ps28-c').css("display","none");
    /*$('#furca28').css("background","none");*/

    $('#f28desact').css("display","none");
    $('#f28b-adesact').css("display","none");
    $('#f28b-bdesact').css("display","none");

    $('#mg28-a').val('0');
    $('#mg28-b').val('0');
    $('#mg28-c').val('0');
    $('#ps28-a').val('0');
    $('#ps28-b').val('0');
    $('#ps28-c').val('0');
    
    $('#diente28b-a').css("background","url('Periodontograma/img/tabla4/tachados/periodontograma-dientes-arriba-tachados-28b.png')");
    $('#diente28b-a').css("background-position","0 23px");
    $('#diente28b-a').css("background-repeat","no-repeat");
    $('#m28b').css("display","none");
    $('#i28b').css("display","none");
    $('#f28b').css("display","none");
    $('#s28b-a').css("display","none");
    $('#s28b-b').css("display","none");
    $('#s28b-c').css("display","none");
    $('#p28b-a').css("display","none");
    $('#p28b-b').css("display","none");
    $('#p28b-c').css("display","none");
    $('#mg28b-a').css("display","none");
    $('#mg28b-b').css("display","none");
    $('#mg28b-c').css("display","none");
    $('#ps28b-a').css("display","none");
    $('#ps28b-b').css("display","none");
    $('#ps28b-c').css("display","none");
    $('#furca28b').css("background","none");
    $('#mg28b-a').val('0');
    $('#mg28b-b').val('0');
    $('#mg28b-c').val('0');
    $('#ps28b-a').val('0');
    $('#ps28b-b').val('0');
    $('#ps28b-c').val('0');
    $('#furca28').css("display","none");
    $('#furca28-a').css("display","none");
    $('#furca28-b').css("display","none");
    $('#f28b-a').css("display","none");
    $('#f28b-b').css("display","none");
    $('#ae28').css("display","none");
    $('#pi28').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar28a();
    cargar28b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente28-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-28.png')");
    $('#diente28-a').css("background-position","0 -2px");
    $('#diente28-a').css("background-repeat","no-repeat");
    $('#m28').css("display","inline");
    $('#i28').css("display","block");
    $('#f28').css("display","inline");
    $('#s28-a').css("display","inline");
    $('#s28-b').css("display","inline");
    $('#s28-c').css("display","inline");
    $('#p28-a').css("display","inline");
    $('#p28-b').css("display","inline");
    $('#p28-c').css("display","inline");
    $('#mg28-a').css("display","inline");
    $('#mg28-b').css("display","inline");
    $('#mg28-c').css("display","inline");
    $('#ps28-a').css("display","inline");
    $('#ps28-b').css("display","inline");
    $('#ps28-c').css("display","inline");
    
    $('#diente28b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-28b.png')");
    $('#diente28b-a').css("background-position","0 23px");
    $('#diente28b-a').css("background-repeat","no-repeat");
    $('#m28b').css("display","inline");
    $('#i28b').css("display","inline");
    $('#f28b').css("display","inline");
    $('#s28b-a').css("display","inline");
    $('#s28b-b').css("display","inline");
    $('#s28b-c').css("display","inline");
    $('#p28b-a').css("display","inline");
    $('#p28b-b').css("display","inline");
    $('#p28b-c').css("display","inline");
    $('#mg28b-a').css("display","inline");
    $('#mg28b-b').css("display","inline");
    $('#mg28b-c').css("display","inline");
    $('#ps28b-a').css("display","inline");
    $('#ps28b-b').css("display","inline");
    $('#ps28b-c').css("display","inline");

    $('#f28desact').css("display","block");
    $('#f28b-adesact').css("display","block");
    $('#f28b-bdesact').css("display","block");

    $('#furca28').css("display","block");
    $('#furca28-a').css("display","block");
    $('#furca28-b').css("display","block");
    $('#f28b-a').css("display","inline");
    $('#f28b-b').css("display","inline");
    $('#ae28').css("display","inline");
    $('#pi28').css("display","inline");
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
//IMPLANTES 

/*
  $('#i21').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f21').css({"background":"#FFFFFF"});
    $('#diente21-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-21.png')");
    $('#diente21-a').css("background-position","bottom");
    $('#diente21-a').css("background-repeat","no-repeat");
    
    $('#diente21b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-21b.png')");
    $('#diente21b-a').css("background-position","0 11px");
    $('#diente21b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente21-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-21.png')");
    $('#diente21-a').css("background-position","bottom");
    $('#diente21-a').css("background-repeat","no-repeat");
    
    $('#diente21b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-21b.png')");
    $('#diente21b-a').css("background-position","0 11px");
    $('#diente21b-a').css("background-repeat","no-repeat");
      }
  );
*/

/*
  $('#i22').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f22').css({"background":"#FFFFFF"});
    $('#diente22-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-22.png')");
    $('#diente22-a').css("background-position","0px 6px");
    $('#diente22-a').css("background-repeat","no-repeat");
    
    $('#diente22b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-22b.png')");
    $('#diente22b-a').css("background-position","0px 17px");
    $('#diente22b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente22-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-22.png')");
    $('#diente22-a').css("background-position","0px 6px");
    $('#diente22-a').css("background-repeat","no-repeat");
    
    $('#diente22b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-22b.png')");
    $('#diente22b-a').css("background-position","0px 17px");
    $('#diente22b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i23').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f23').css({"background":"#FFFFFF"});
    $('#diente23-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-23.png')");
    $('#diente23-a').css("background-position","top");
    $('#diente23-a').css("background-repeat","no-repeat");
    
    $('#diente23b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-23b.png')");
    $('#diente23b-a').css("background-position","0 15px");
    $('#diente23b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente23-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-23.png')");
    $('#diente23-a').css("background-position","top");
    $('#diente23-a').css("background-repeat","no-repeat");
    
    $('#diente23b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-23b.png')");
    $('#diente23b-a').css("background-position","0 15px");
    $('#diente23b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i24').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente24-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-24.png')");
    $('#diente24-a').css("background-repeat","no-repeat");
    
    $('#diente24b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-24b.png')");
    $('#diente24b-a').css("background-repeat","no-repeat");
    $('#diente24b-a').css("background-position","0 16px");
    
    $('#furca24-a').css("background","none");
    $('#furca24-b').css("background","none");
    $('#f24b-a').css("background","none");
    $('#f24b-b').css("background","none");
    $("#f24b-a").attr("id","f24b-adesact");
    $("#f24b-b").attr("id","f24b-bdesact");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente24-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-24.png')");
    $('#diente24-a').css("background-repeat","no-repeat");
    
    $('#diente24b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-24b.png')");
    $('#diente24b-a').css("background-repeat","no-repeat");
    $('#diente24b-a').css("background-position","0 16px");

    $('#f24b-a').css("background","#FFFFFF");
    $('#f24b-b').css("background","#FFFFFF");
    $("#f24b-adesact").attr("id","f24b-a");
    $("#f24b-bdesact").attr("id","f24b-b");
      }
  );
  
    $('#i25').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente25-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-25.png')");
    $('#diente25-a').css("background-position","0 5px");
    $('#diente25-a').css("background-repeat","no-repeat");
    
    $('#diente25b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-25b.png')");
    $('#diente25b-a').css("background-position","0 16px");
    $('#diente25b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente25-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-25.png')");
    $('#diente25-a').css("background-position","0 5px");
    $('#diente25-a').css("background-repeat","no-repeat");
    
    $('#diente25b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-25b.png')");
    $('#diente25b-a').css("background-position","0 16px");
    $('#diente25b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i26').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente26-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-26.png')");
    $('#diente26-a').css("background-position","0 4px");
    $('#diente26-a').css("background-repeat","no-repeat");
    
    $('#diente26b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-26b.png')");
    $('#diente26b-a').css("background-position","0 21px");
    $('#diente26b-a').css("background-repeat","no-repeat");
    
    $('#furca26-a').css("background","none");
    $('#furca26-b').css("background","none");
    $('#f26b-a').css("background","none");
    $('#f26b-b').css("background","none");
    $('#f26').css("background","none");
    $('#furca26').css("background","none");
    
    $("#f26").attr("id","f26desact");
    $("#f26b-a").attr("id","f26b-adesact");
    $("#f26b-b").attr("id","f26b-bdesact");

      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente26-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-26.png')");
    $('#diente26-a').css("background-position","0 4px");
    $('#diente26-a').css("background-repeat","no-repeat");
    
    $('#diente26b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-26b.png')");
    $('#diente26b-a').css("background-position","0 21px");
    $('#diente26b-a').css("background-repeat","no-repeat");
    
    $('#f26').css("background","#FFFFFF");
    $('#f26b-a').css("background","#FFFFFF");
    $('#f26b-b').css("background","#FFFFFF");
    
    $("#f26desact").attr("id","f26");
    $("#f26b-adesact").attr("id","f26b-a");
    $("#f26b-bdesact").attr("id","f26b-b");
      }
  );
  
    $('#i27').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente27-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-27.png')");
    $('#diente27-a').css("background-repeat","no-repeat");
    
    $('#diente27b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-27b.png')");
    $('#diente27b-a').css("background-repeat","no-repeat");
    $('#diente27b-a').css("background-position","0 24px");
    
    $('#furca27-a').css("background","none");
    $('#furca27-b').css("background","none");
    $('#f27b-a').css("background","none");
    $('#f27b-b').css("background","none");
    $('#f27').css("background","none");
    $('#furca27').css("background","none");
    
    $("#f27").attr("id","f27desact");
    $("#f27b-a").attr("id","f27b-adesact");
    $("#f27b-b").attr("id","f27b-bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente27-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-27.png')");
    $('#diente27-a').css("background-repeat","no-repeat");
    
    $('#diente27b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-27b.png')");
    $('#diente27b-a').css("background-repeat","no-repeat");
    $('#diente27b-a').css("background-position","0 24px");
    
    $('#f27').css("background","#FFFFFF");
    $("#f27desact").attr("id","f27");
    $('#f27b-a').css("background","#FFFFFF");
    $('#f27b-b').css("background","#FFFFFF");
    
    $("#f27desact").attr("id","f27");
    $("#f27b-adesact").attr("id","f27b-a");
    $("#f27b-bdesact").attr("id","f27b-b");
      }
  );
  
    $('#i28').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente28-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-28.png')");
    $('#diente28-a').css("background-position","0 -2px");
    $('#diente28-a').css("background-repeat","no-repeat");
    
    $('#diente28b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-28b.png')");
    $('#diente28b-a').css("background-position","0 23px");
    $('#diente28b-a').css("background-repeat","no-repeat");
    
    $('#furca28-a').css("background","none");
    $('#furca28-b').css("background","none");
    $('#f28b-a').css("background","none");
    $('#f28b-b').css("background","none");
    $('#f28').css("background","none");
    $('#furca28').css("background","none");
    
    $("#f28").attr("id","f28desact");
    $("#f28b-a").attr("id","f28b-adesact");
    $("#f28b-b").attr("id","f28b-bdesact");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente28-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-28.png')");
    $('#diente28-a').css("background-position","0 -2px");
    $('#diente28-a').css("background-repeat","no-repeat");
    
    $('#diente28b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-28b.png')");
    $('#diente28b-a').css("background-position","0 23px");
    $('#diente28b-a').css("background-repeat","no-repeat");
    
    $('#f28').css("background","#FFFFFF");
    $('#f28b-a').css("background","#FFFFFF");
    $('#f28b-b').css("background","#FFFFFF");
    
    $("#f28desact").attr("id","f28");
    $("#f28b-adesact").attr("id","f28b-a");
    $("#f28b-bdesact").attr("id","f28b-b");
      }
  );
*/
//FURCAS TABLA 2
  /*
$('#f26').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i26').css({"background":"#FFFFFF"});
    $('#furca26').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca26').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca26').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca26').css("background","none");
      }
);

$('#f27').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i27').css({"background":"#FFFFFF"});
    $('#furca27').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca27').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca27').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca27').css("background","none");
      }
);

$('#f28').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i28').css({"background":"#FFFFFF"});
    $('#furca28').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca28').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca28').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca28').css("background","none");
      }
);

*/
//FURCAS TABLA 3

/*
$('#f18b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca18-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca18-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca18-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca18-a').css("background","none");
      }
);
$('#f18b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca18-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca18-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca18-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca18-b').css("background","none");
      }
);

$('#f17b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca17-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca17-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca17-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca17-a').css("background","none");
      }
);
$('#f17b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca17-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca17-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca17-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca17-b').css("background","none");
      }
);

$('#f16b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca16-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca16-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca16-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca16-a').css("background","none");
      }
);
$('#f16b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca16-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca16-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca16-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca16-b').css("background","none");
      }
);

$('#f14b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca14-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca14-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca14-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca14-a').css("background","none");
      }
);
$('#f14b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca14-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca14-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca14-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca14-b').css("background","none");
      }
);

*/
//FURCAS TABLA 4

/*
$('#f24b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca24-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca24-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca24-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca24-a').css("background","none");
      }
);
$('#f24b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca24-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca24-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca24-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca24-b').css("background","none");
      }
);

$('#f26b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca26-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca26-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca26-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca26-a').css("background","none");
      }
);
$('#f26b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca26-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca26-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca26-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca26-b').css("background","none");
      }
);

$('#f27b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca27-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca27-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca27-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca27-a').css("background","none");
      }
);
$('#f27b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca27-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca27-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca27-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca27-b').css("background","none");
      }
);

$('#f28b-a').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca28-a').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca28-a').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca28-a').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca28-a').css("background","none");
      }
);
$('#f28b-b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#furca28-b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca28-b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca28-b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca28-b').css("background","none");
      }
);
*/
//FURCAS TABLA 5

/*
$('#f48').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i48').css({"background":"#FFFFFF"});
    $('#furca48').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca48').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca48').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca48').css("background","none");
      }
);

$('#f47').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i47').css({"background":"#FFFFFF"});
    $('#furca47').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca47').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca47').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca47').css("background","none");
      }
);

$('#f46').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i46').css({"background":"#FFFFFF"});
    $('#furca46').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca46').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca46').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca46').css("background","none");
      }
);
*/

//FURCAS TABLA 6

/*
$('#f38').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i38').css({"background":"#FFFFFF"});
    $('#furca38').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca38').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca38').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca38').css("background","none");
      }
);

$('#f37').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i37').css({"background":"#FFFFFF"});
    $('#furca37').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca37').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca37').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca37').css("background","none");
      }
);

$('#f36').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i36').css({"background":"#FFFFFF"});
    $('#furca36').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca36').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca36').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca36').css("background","none");
      }
);
*/  
    //FURCAS TABLA 7
/*
$('#f48b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i48b').css({"background":"#FFFFFF"});
    $('#furca48b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca48b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca48b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca48b').css("background","none");
      }
);

$('#f47b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i47b').css({"background":"#FFFFFF"});
    $('#furca47b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca47b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca47b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca47b').css("background","none");
      }
);

$('#f46b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i46b').css({"background":"#FFFFFF"});
    $('#furca46b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca46b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca46b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca46b').css("background","none");
      }
);
*/  
    //FURCAS TABLA 8
/*
$('#f38b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i38b').css({"background":"#FFFFFF"});
    $('#furca38b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca38b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca38b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca38b').css("background","none");
      }
);

$('#f37b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i37b').css({"background":"#FFFFFF"});
    $('#furca37b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca37b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca37b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca37b').css("background","none");
      }
);

$('#f36b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
    $('#i36b').css({"background":"#FFFFFF"});
    $('#furca36b').css("background","url('Periodontograma/img/vacio.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
    $('#furca36b').css("background","url('Periodontograma/img/mediolleno.png')");
      },
    function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
    $('#furca36b').css("background","url('Periodontograma/img/lleno.png')");
      },
      function () {
        $(this).css({"background":"#FFFFFF"});
    $('#furca36b').css("background","none");
      }
);
  */  
    //IMPLANTES TABLA INFERIOR
  /*  
    $('#i48b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f48').css({"background":"#FFFFFF"});
    $('#diente48-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-48.png')");
    $('#diente48-a').css("background-position","0 -4px");
    $('#diente48-a').css("background-repeat","no-repeat");
    
    $('#diente48b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-48b.png')");
    $('#diente48b-a').css("background-position","0 24px");
    $('#diente48b-a').css("background-repeat","no-repeat");
    
    $('#furca48').css("background","none");
    $('#furca48b').css("background","none");
    $('#f48').css("background","none");
    $('#f48b').css("background","none");
    
    $("#f48").attr("id","f48desact");
    $("#f48b").attr("id","f48bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente48-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-48.png')");
    $('#diente48-a').css("background-position","0 -4px");
    $('#diente48-a').css("background-repeat","no-repeat");
    
    $('#diente48b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-48b.png')");
    $('#diente48b-a').css("background-position","0 24px");
    $('#diente48b-a').css("background-repeat","no-repeat");
    
    $('#f48').css("background","#FFFFFF");
    $('#f48b').css("background","#FFFFFF");
    
    $("#f48desact").attr("id","f48");
    $("#f48bdesact").attr("id","f48b");
      }
  );
  
  $('#i47b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f47').css({"background":"#FFFFFF"});
    $('#diente47-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-47.png')");
    $('#diente47-a').css("background-position","0 4px");
    $('#diente47-a').css("background-repeat","no-repeat");
    
    $('#diente47b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-47b.png')");
    $('#diente47b-a').css("background-position","0 22px");
    $('#diente47b-a').css("background-repeat","no-repeat");
    
    $('#furca47').css("background","none");
    $('#furca47b').css("background","none");
    $('#f47').css("background","none");
    $('#f47b').css("background","none");
    
    $("#f47").attr("id","f47desact");
    $("#f47b").attr("id","f47bdesact");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente47-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-47.png')");
    $('#diente47-a').css("background-position","0 4px");
    $('#diente47-a').css("background-repeat","no-repeat");
    
    $('#diente47b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-47b.png')");
    $('#diente47b-a').css("background-position","0 22px");
    $('#diente47b-a').css("background-repeat","no-repeat");
    
    $('#f47').css("background","#FFFFFF");
    $('#f47b').css("background","#FFFFFF");
    
    $("#f47desact").attr("id","f47");
    $("#f47bdesact").attr("id","f47b");
      }
  );
  
    $('#i46b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f46').css({"background":"#FFFFFF"});
    $('#diente46-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-46.png')");
    $('#diente46-a').css("background-position","0 -1px");
    $('#diente46-a').css("background-repeat","no-repeat");
    
    $('#diente46b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-46b.png')");
    $('#diente46b-a').css("background-position","0 23px");
    $('#diente46b-a').css("background-repeat","no-repeat");
    
    $('#furca46').css("background","none");
    $('#furca46b').css("background","none");
    $('#f46').css("background","none");
    $('#f46b').css("background","none");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente46-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-46.png')");
    $('#diente46-a').css("background-position","0 -1px");
    $('#diente46-a').css("background-repeat","no-repeat");
    
    $('#diente46b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-46b.png')");
    $('#diente46b-a').css("background-position","0 23px");
    $('#diente46b-a').css("background-repeat","no-repeat");
    
    $('#f46').css("background","#FFFFFF");
    $('#f46b').css("background","#FFFFFF");
    
    $("#f46desact").attr("id","f46");
    $("#f46bdesact").attr("id","f46b");
      }
  );
  
    $('#i45b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente45-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-45.png')");
    $('#diente45-a').css("background-position","0 1px");
    $('#diente45-a').css("background-repeat","no-repeat");
    
    $('#diente45b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-45b.png')");
    $('#diente45b-a').css("background-position","0 20px");
    $('#diente45b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente45-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-45.png')");
    $('#diente45-a').css("background-position","0 1px");
    $('#diente45-a').css("background-repeat","no-repeat");
    
    $('#diente45b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-45b.png')");
    $('#diente45b-a').css("background-position","0 20px");
    $('#diente45b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i44b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente44-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-44.png')");
    $('#diente44-a').css("background-position","0 3px");
    $('#diente44-a').css("background-repeat","no-repeat");
    
    $('#diente44b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-44b.png')");
    $('#diente44b-a').css("background-position","0 13px");
    $('#diente44b-a').css("background-repeat","no-repeat");
    
    $('#furca44-a').css("background","none");
    $('#furca44-b').css("background","none");
    $('#f44b-a').css("background","none");
    $('#f44b-b').css("background","none");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente44-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-44.png')");
    $('#diente44-a').css("background-position","0 3px");
    $('#diente44-a').css("background-repeat","no-repeat");
    
    $('#diente44b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-44b.png')");
    $('#diente44b-a').css("background-position","0 13px");
    $('#diente44b-a').css("background-repeat","no-repeat");
    
    $('#f44b-a').css("background","#FFFFFF");
    $('#f44b-b').css("background","#FFFFFF");
      }
  );

  
    $('#i43b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente43-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-43.png')");
    $('#diente43-a').css("background-position","0 7px");
    $('#diente43-a').css("background-repeat","no-repeat");
    
    $('#diente43b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-43b.png')");
    $('#diente43b-a').css("background-position","0 12px");
    $('#diente43b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente43-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-43.png')");
    $('#diente43-a').css("background-position","0 7px");
    $('#diente43-a').css("background-repeat","no-repeat");
    
    $('#diente43b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-43b.png')");
    $('#diente43b-a').css("background-position","0 12x");
    $('#diente43b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i42b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente42-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-42.png')");
    $('#diente42-a').css("background-position","0 3px");
    $('#diente42-a').css("background-repeat","no-repeat");
    
    $('#diente42b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-42b.png')");
    $('#diente42b-a').css("background-position","0 15px");
    $('#diente42b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente42-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-42.png')");
    $('#diente42-a').css("background-position","0 3px");
    $('#diente42-a').css("background-repeat","no-repeat");
    
    $('#diente42b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-42b.png')");
    $('#diente42b-a').css("background-position","0 15px");
    $('#diente42b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i41b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente41-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-41.png')");
    $('#diente41-a').css("background-position","0 1px");
    $('#diente41-a').css("background-repeat","no-repeat");
    
    $('#diente41b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-41b.png')");
    $('#diente41b-a').css("background-position","0 19px");
    $('#diente41b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente41-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-41.png')");
    $('#diente41-a').css("background-position","0 1px");
    $('#diente41-a').css("background-repeat","no-repeat");
    
    $('#diente41b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-41b.png')");
    $('#diente41b-a').css("background-position","0 19px");
    $('#diente41b-a').css("background-repeat","no-repeat");
      }
  );
*/

/*
$('#i31b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f31').css({"background":"#FFFFFF"});
    $('#diente31-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-31.png')");
    $('#diente31-a').css("background-position","0 1px");
    $('#diente31-a').css("background-repeat","no-repeat");
    
    $('#diente31b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-31b.png')");
    $('#diente31b-a').css("background-position","0 19px");
    $('#diente31b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente31-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-31.png')");
    $('#diente31-a').css("background-position","0 1px");
    $('#diente31-a').css("background-repeat","no-repeat");
    
    $('#diente31b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-31b.png')");
    $('#diente31b-a').css("background-position","0 19px");
    $('#diente31b-a').css("background-repeat","no-repeat");
      }
  );
  
  $('#i32b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f32').css({"background":"#FFFFFF"});
    $('#diente32-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-32.png')");
    $('#diente32-a').css("background-position","0 3px");
    $('#diente32-a').css("background-repeat","no-repeat");
    
    $('#diente32b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-32b.png')");
    $('#diente32b-a').css("background-position","0px 15px");
    $('#diente32b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente32-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-32.png')");
    $('#diente32-a').css("background-position","0px 3px");
    $('#diente32-a').css("background-repeat","no-repeat");
    
    $('#diente32b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-32b.png')");
    $('#diente32b-a').css("background-position","0px 15px");
    $('#diente32b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i33b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#f33').css({"background":"#FFFFFF"});
    $('#diente33-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-33.png')");
    $('#diente33-a').css("background-position","0 7px");
    $('#diente33-a').css("background-repeat","no-repeat");
    
    $('#diente33b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-33b.png')");
    $('#diente33b-a').css("background-position","0 12px");
    $('#diente33b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente33-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-33.png')");
    $('#diente33-a').css("background-position","0 7px");
    $('#diente33-a').css("background-repeat","no-repeat");
    
    $('#diente33b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-33b.png')");
    $('#diente33b-a').css("background-position","0 12px");
    $('#diente33b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i34b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente34-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-34.png')");
    $('#diente34-a').css("background-position","0 5px");
    $('#diente34-a').css("background-repeat","no-repeat");
    
    $('#diente34b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-34b.png')");
    $('#diente34b-a').css("background-repeat","no-repeat");
    $('#diente34b-a').css("background-position","0 13px");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente34-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-34.png')");
    $('#diente34-a').css("background-position","0 5px");
    $('#diente34-a').css("background-repeat","no-repeat");
    
    $('#diente34b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-34b.png')");
    $('#diente34b-a').css("background-repeat","no-repeat");
    $('#diente34b-a').css("background-position","0 13px");
      }
  );
  
    $('#i35b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente35-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-35.png')");
    $('#diente35-a').css("background-position","0 1px");
    $('#diente35-a').css("background-repeat","no-repeat");
    
    $('#diente35b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-35b.png')");
    $('#diente35b-a').css("background-position","0 20px");
    $('#diente35b-a').css("background-repeat","no-repeat");
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente35-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-35.png')");
    $('#diente35-a').css("background-position","0 1px");
    $('#diente35-a').css("background-repeat","no-repeat");
    
    $('#diente35b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-35b.png')");
    $('#diente35b-a').css("background-position","0 20px");
    $('#diente35b-a').css("background-repeat","no-repeat");
      }
  );
  
    $('#i36b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente36-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-36.png')");
    $('#diente36-a').css("background-position","top");
    $('#diente36-a').css("background-repeat","no-repeat");
    
    $('#diente36b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-36b.png')");
    $('#diente36b-a').css("background-position","0 23px");
    $('#diente36b-a').css("background-repeat","no-repeat");
    
    $('#furca36').css("background","none");
    $('#furca36b').css("background","none");
    $('#f36').css("background","none");
    $('#f36b').css("background","none");
    
    $("#f36").attr("id","f36desact");
    $("#f36b").attr("id","f36bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente36-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-36.png')");
    $('#diente36-a').css("background-position","top");
    $('#diente36-a').css("background-repeat","no-repeat");
    
    $('#diente36b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-36b.png')");
    $('#diente36b-a').css("background-position","0 23px");
    $('#diente36b-a').css("background-repeat","no-repeat");
    
    $('#f36').css("background","#FFFFFF");
    $('#f36b').css("background","#FFFFFF");
    
    $("#f36desact").attr("id","f36");
    $("#f36bdesact").attr("id","f36b");
      }
  );  
  
    $('#i37b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente37-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-37.png')");
    $('#diente37-a').css("background-repeat","no-repeat");
    $('#diente37-a').css("background-position"," 0px -4px");
    
    $('#diente37b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-37b.png')");
    $('#diente37b-a').css("background-repeat","no-repeat");
    $('#diente37b-a').css("background-position","0 21px");
    
    $('#furca37').css("background","none");
    $('#furca37b').css("background","none");
    $('#f37').css("background","none");
    $('#f37b').css("background","none");
    
    $("#f37").attr("id","f37desact");
    $("#f37b").attr("id","f37bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente37-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-37.png')");
    $('#diente37-a').css("background-repeat","no-repeat");
    $('#diente37-a').css("background-position"," 0px -4px");
    
    $('#diente37b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-37b.png')");
    $('#diente37b-a').css("background-repeat","no-repeat");
    $('#diente37b-a').css("background-position","0 21px");
    
    $('#f37').css("background","#FFFFFF");
    $('#f37b').css("background","#FFFFFF");
    
    $("#f37desact").attr("id","f37");
    $("#f37bdesact").attr("id","f37b");
      }
  );
  

    $('#i38b').toggle(
      function () {
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
    $('#diente38-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-38.png')");
    $('#diente38-a').css("background-position","0 -3px");
    $('#diente38-a').css("background-repeat","no-repeat");
    
    $('#diente38b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-38b.png')");
    $('#diente38b-a').css("background-position","0 24px");
    $('#diente38b-a').css("background-repeat","no-repeat");
    
    $('#furca38').css("background","none");
    $('#furca38b').css("background","none");
    $('#f38').css("background","none");
    $('#f38b').css("background","none");
    
    $("#f38").attr("id","f38desact");
    $("#f38b").attr("id","f38bdesact");
    
      },
      function () {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
    $('#diente38-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-38.png')");
    $('#diente38-a').css("background-position","0 -3px");
    $('#diente38-a').css("background-repeat","no-repeat");
    
    $('#diente38b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-38b.png')");
    $('#diente38b-a').css("background-position","0 24px");
    $('#diente38b-a').css("background-repeat","no-repeat");
    
    $('#f38').css("background","#FFFFFF");
    $('#f38b').css("background","#FFFFFF");
    
    $("#f38desact").attr("id","f38");
    $("#f38bdesact").attr("id","f38b");
      }
  );
  */

  //TACHADOS TABLA 8
  
  $('#d31b').toggle(
      function () {
        $('#diente31b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-31b.png')");
    $('#diente31b-a').css("background-position","0 19px");
    $('#diente31b-a').css("background-repeat","no-repeat");
    $('#m31b').css("display","none");
    $('#i31b').css("display","none");
    $('#f31b').css("display","none");
    $('#s31b-a').css("display","none");
    $('#s31b-b').css("display","none");
    $('#s31b-c').css("display","none");
    $('#p31b-a').css("display","none");
    $('#p31b-b').css("display","none");
    $('#p31b-c').css("display","none");
    $('#mg31b-a').css("display","none");
    $('#mg31b-b').css("display","none");
    $('#mg31b-c').css("display","none");
    $('#ps31b-a').css("display","none");
    $('#ps31b-b').css("display","none");
    $('#ps31b-c').css("display","none");
    /*
    $('#mg31b-a').val('0');
    $('#mg31b-b').val('0');
    $('#mg31b-c').val('0');
    $('#ps31b-a').val('0');
    $('#ps31b-b').val('0');
    $('#ps31b-c').val('0');
    */
    
    $('#diente31-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-31.png')");
    $('#diente31-a').css("background-position","0 1px");
    $('#diente31-a').css("background-repeat","no-repeat");
    $('#m31').css("display","none");
    $('#i31').css("display","none");
    $('#f31').css("display","none");
    $('#s31-a').css("display","none");
    $('#s31-b').css("display","none");
    $('#s31-c').css("display","none");
    $('#p31-a').css("display","none");
    $('#p31-b').css("display","none");
    $('#p31-c').css("display","none");
    $('#mg31-a').css("display","none");
    $('#mg31-b').css("display","none");
    $('#mg31-c').css("display","none");
    $('#ps31-a').css("display","none");
    $('#ps31-b').css("display","none");
    $('#ps31-c').css("display","none");
    /*
    $('#mg31-a').val('0');
    $('#mg31-b').val('0');
    $('#mg31-c').val('0');
    $('#ps31-a').val('0');
    $('#ps31-b').val('0');
    $('#ps31-c').val('0');
    */
    $('#ae31b').css("display","none");
    $('#pi31b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar31a();
    cargar31b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente31b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-31b.png')");
    $('#diente31b-a').css("background-position","0 19px");
    $('#diente31b-a').css("background-repeat","no-repeat");
    $('#m31b').css("display","inline");
    $('#i31b').css("display","block");
    $('#f31b').css("display","inline");
    $('#s31b-a').css("display","inline");
    $('#s31b-b').css("display","inline");
    $('#s31b-c').css("display","inline");
    $('#p31b-a').css("display","inline");
    $('#p31b-b').css("display","inline");
    $('#p31b-c').css("display","inline");
    $('#mg31b-a').css("display","inline");
    $('#mg31b-b').css("display","inline");
    $('#mg31b-c').css("display","inline");
    $('#ps31b-a').css("display","inline");
    $('#ps31b-b').css("display","inline");
    $('#ps31b-c').css("display","inline");
    
    $('#diente31-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-31.png')");
    $('#diente31-a').css("background-position","0 1px");
    $('#diente31-a').css("background-repeat","no-repeat");
    $('#m31').css("display","inline");
    $('#i31').css("display","inline");
    $('#f31').css("display","inline");
    $('#s31-a').css("display","inline");
    $('#s31-b').css("display","inline");
    $('#s31-c').css("display","inline");
    $('#p31-a').css("display","inline");
    $('#p31-b').css("display","inline");
    $('#p31-c').css("display","inline");
    $('#mg31-a').css("display","inline");
    $('#mg31-b').css("display","inline");
    $('#mg31-c').css("display","inline");
    $('#ps31-a').css("display","inline");
    $('#ps31-b').css("display","inline");
    $('#ps31-c').css("display","inline");
    $('#ae31b').css("display","inline");
    $('#pi31b').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  
  $('#d32b').toggle(
      function () {
        $('#diente32b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-32b.png')");
    $('#diente32b-a').css("background-position","0px 15px");
    $('#diente32b-a').css("background-repeat","no-repeat");
    $('#m32b').css("display","none");
    $('#i32b').css("display","none");
    $('#f32b').css("display","none");
    $('#s32b-a').css("display","none");
    $('#s32b-b').css("display","none");
    $('#s32b-c').css("display","none");
    $('#p32b-a').css("display","none");
    $('#p32b-b').css("display","none");
    $('#p32b-c').css("display","none");
    $('#mg32b-a').css("display","none");
    $('#mg32b-b').css("display","none");
    $('#mg32b-c').css("display","none");
    $('#ps32b-a').css("display","none");
    $('#ps32b-b').css("display","none");
    $('#ps32b-c').css("display","none");
    /*
    $('#mg32b-a').val('0');
    $('#mg32b-b').val('0');
    $('#mg32b-c').val('0');
    $('#ps32b-a').val('0');
    $('#ps32b-b').val('0');
    $('#ps32b-c').val('0');
    */
    
    $('#diente32-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-32.png')");
    $('#diente32-a').css("background-position","0px 3px");
    $('#diente32-a').css("background-repeat","no-repeat");
    $('#m32').css("display","none");
    $('#i32').css("display","none");
    $('#f32').css("display","none");
    $('#s32-a').css("display","none");
    $('#s32-b').css("display","none");
    $('#s32-c').css("display","none");
    $('#p32-a').css("display","none");
    $('#p32-b').css("display","none");
    $('#p32-c').css("display","none");
    $('#mg32-a').css("display","none");
    $('#mg32-b').css("display","none");
    $('#mg32-c').css("display","none");
    $('#ps32-a').css("display","none");
    $('#ps32-b').css("display","none");
    $('#ps32-c').css("display","none");
    /*
    $('#mg32-a').val('0');
    $('#mg32-b').val('0');
    $('#mg32-c').val('0');
    $('#ps32-a').val('0');
    $('#ps32-b').val('0');
    $('#ps32-c').val('0');
    */
    $('#ae32b').css("display","none");
    $('#pi32b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar32a();
    cargar32b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente32b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-32b.png')");
    $('#diente32b-a').css("background-position","0px 15px");
    $('#diente32b-a').css("background-repeat","no-repeat");
    $('#m32b').css("display","inline");
    $('#i32b').css("display","block");
    $('#f32b').css("display","inline");
    $('#s32b-a').css("display","inline");
    $('#s32b-b').css("display","inline");
    $('#s32b-c').css("display","inline");
    $('#p32b-a').css("display","inline");
    $('#p32b-b').css("display","inline");
    $('#p32b-c').css("display","inline");
    $('#mg32b-a').css("display","inline");
    $('#mg32b-b').css("display","inline");
    $('#mg32b-c').css("display","inline");
    $('#ps32b-a').css("display","inline");
    $('#ps32b-b').css("display","inline");
    $('#ps32b-c').css("display","inline");
    
    $('#diente32-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-32.png')");
    $('#diente32-a').css("background-position","0px 3px");
    $('#diente32-a').css("background-repeat","no-repeat");
    $('#m32').css("display","inline");
    $('#i32').css("display","inline");
    $('#f32').css("display","inline");
    $('#s32-a').css("display","inline");
    $('#s32-b').css("display","inline");
    $('#s32-c').css("display","inline");
    $('#p32-a').css("display","inline");
    $('#p32-b').css("display","inline");
    $('#p32-c').css("display","inline");
    $('#mg32-a').css("display","inline");
    $('#mg32-b').css("display","inline");
    $('#mg32-c').css("display","inline");
    $('#ps32-a').css("display","inline");
    $('#ps32-b').css("display","inline");
    $('#ps32-c').css("display","inline");
    $('#ae32b').css("display","inline");
    $('#pi32b').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d33b').toggle(
      function () {
        $('#diente33b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-33b.png')");
    $('#diente33b-a').css("background-position","0 12px");
    $('#diente33b-a').css("background-repeat","no-repeat");
    $('#m33b').css("display","none");
    $('#i33b').css("display","none");
    $('#f33b').css("display","none");
    $('#s33b-a').css("display","none");
    $('#s33b-b').css("display","none");
    $('#s33b-c').css("display","none");
    $('#p33b-a').css("display","none");
    $('#p33b-b').css("display","none");
    $('#p33b-c').css("display","none");
    $('#mg33b-a').css("display","none");
    $('#mg33b-b').css("display","none");
    $('#mg33b-c').css("display","none");
    $('#ps33b-a').css("display","none");
    $('#ps33b-b').css("display","none");
    $('#ps33b-c').css("display","none");
    /*
    $('#mg33b-a').val('0');
    $('#mg33b-b').val('0');
    $('#mg33b-c').val('0');
    $('#ps33b-a').val('0');
    $('#ps33b-b').val('0');
    $('#ps33b-c').val('0');
    */
    
    $('#diente33-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-33.png')");
    $('#diente33-a').css("background-position","0 7px");
    $('#diente33-a').css("background-repeat","no-repeat");
    $('#m33').css("display","none");
    $('#i33').css("display","none");
    $('#f33').css("display","none");
    $('#s33-a').css("display","none");
    $('#s33-b').css("display","none");
    $('#s33-c').css("display","none");
    $('#p33-a').css("display","none");
    $('#p33-b').css("display","none");
    $('#p33-c').css("display","none");
    $('#mg33-a').css("display","none");
    $('#mg33-b').css("display","none");
    $('#mg33-c').css("display","none");
    $('#ps33-a').css("display","none");
    $('#ps33-b').css("display","none");
    $('#ps33-c').css("display","none");
    /*
    $('#mg33-a').val('0');
    $('#mg33-b').val('0');
    $('#mg33-c').val('0');
    $('#ps33-a').val('0');
    $('#ps33-b').val('0');
    $('#ps33-c').val('0');
    */
    $('#ae33b').css("display","none");
    $('#pi33b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar33a();
    cargar33b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente33b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-33b.png')");
    $('#diente33b-a').css("background-position","0 12px");
    $('#diente33b-a').css("background-repeat","no-repeat");
    $('#m33b').css("display","inline");
    $('#i33b').css("display","block");
    $('#f33b').css("display","inline");
    $('#s33b-a').css("display","inline");
    $('#s33b-b').css("display","inline");
    $('#s33b-c').css("display","inline");
    $('#p33b-a').css("display","inline");
    $('#p33b-b').css("display","inline");
    $('#p33b-c').css("display","inline");
    $('#mg33b-a').css("display","inline");
    $('#mg33b-b').css("display","inline");
    $('#mg33b-c').css("display","inline");
    $('#ps33b-a').css("display","inline");
    $('#ps33b-b').css("display","inline");
    $('#ps33b-c').css("display","inline");
    
    $('#diente33-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-33.png')");
    $('#diente33-a').css("background-position","0 7px");
    $('#diente33-a').css("background-repeat","no-repeat");
    $('#m33').css("display","inline");
    $('#i33').css("display","inline");
    $('#f33').css("display","inline");
    $('#s33-a').css("display","inline");
    $('#s33-b').css("display","inline");
    $('#s33-c').css("display","inline");
    $('#p33-a').css("display","inline");
    $('#p33-b').css("display","inline");
    $('#p33-c').css("display","inline");
    $('#mg33-a').css("display","inline");
    $('#mg33-b').css("display","inline");
    $('#mg33-c').css("display","inline");
    $('#ps33-a').css("display","inline");
    $('#ps33-b').css("display","inline");
    $('#ps33-c').css("display","inline");
    $('#ae33b').css("display","inline");
    $('#pi33b').css("display","inline");
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d34b').toggle(
      function () {
        $('#diente34b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-34b.png')");
    $('#diente34b-a').css("background-position","0 13px");
    $('#diente34b-a').css("background-repeat","no-repeat");
    $('#m34b').css("display","none");
    $('#i34b').css("display","none");
    $('#f34b').css("display","none");
    $('#s34b-a').css("display","none");
    $('#s34b-b').css("display","none");
    $('#s34b-c').css("display","none");
    $('#p34b-a').css("display","none");
    $('#p34b-b').css("display","none");
    $('#p34b-c').css("display","none");
    $('#mg34b-a').css("display","none");
    $('#mg34b-b').css("display","none");
    $('#mg34b-c').css("display","none");
    $('#ps34b-a').css("display","none");
    $('#ps34b-b').css("display","none");
    $('#ps34b-c').css("display","none");
    /*
    $('#mg34b-a').val('0');
    $('#mg34b-b').val('0');
    $('#mg34b-c').val('0');
    $('#ps34b-a').val('0');
    $('#ps34b-b').val('0');
    $('#ps34b-c').val('0');
    */
    
    $('#diente34-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-34.png')");
    $('#diente34-a').css("background-position","0 5px");
    $('#diente34-a').css("background-repeat","no-repeat");
    $('#m34').css("display","none");
    $('#i34').css("display","none");
    $('#f34').css("display","none");
    $('#s34-a').css("display","none");
    $('#s34-b').css("display","none");
    $('#s34-c').css("display","none");
    $('#p34-a').css("display","none");
    $('#p34-b').css("display","none");
    $('#p34-c').css("display","none");
    $('#mg34-a').css("display","none");
    $('#mg34-b').css("display","none");
    $('#mg34-c').css("display","none");
    $('#ps34-a').css("display","none");
    $('#ps34-b').css("display","none");   
    $('#ps34-c').css("display","none");
    /*
    $('#mg34-a').val('0');
    $('#mg34-b').val('0');
    $('#mg34-c').val('0');
    $('#ps34-a').val('0');
    $('#ps34-b').val('0');
    $('#ps34-c').val('0');
    */
    $('#furca34b-b').css("display","none");
    $('#furca34b-a').css("display","none");
    $('#f34-a').css("display","none");
    $('#f34-b').css("display","none");
    $('#ae34b').css("display","none");
    $('#pi34b').css("display","none");
    totalDientes--;
    getDefectos();
    cargar34a();
    cargar34b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente34b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-34b.png')");
    $('#diente34b-a').css("background-position","0 13px");
    $('#diente34b-a').css("background-repeat","no-repeat");
    $('#m34b').css("display","inline");
    $('#i34b').css("display","block");
    $('#f34b').css("display","inline");
    $('#s34b-a').css("display","inline");
    $('#s34b-b').css("display","inline");
    $('#s34b-c').css("display","inline");
    $('#p34b-a').css("display","inline");
    $('#p34b-b').css("display","inline");
    $('#p34b-c').css("display","inline");
    $('#mg34b-a').css("display","inline");
    $('#mg34b-b').css("display","inline");
    $('#mg34b-c').css("display","inline");
    $('#ps34b-a').css("display","inline");
    $('#ps34b-b').css("display","inline");
    $('#ps34b-c').css("display","inline");
    
    $('#diente34-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-34.png')");
    $('#diente34-a').css("background-position","0 5px");
    $('#diente34-a').css("background-repeat","no-repeat");
    $('#m34').css("display","inline");
    $('#i34').css("display","inline");
    $('#f34').css("display","inline");
    $('#s34-a').css("display","inline");
    $('#s34-b').css("display","inline");
    $('#s34-c').css("display","inline");
    $('#p34-a').css("display","inline");
    $('#p34-b').css("display","inline");
    $('#p34-c').css("display","inline");
    $('#mg34-a').css("display","inline");
    $('#mg34-b').css("display","inline");
    $('#mg34-c').css("display","inline");
    $('#ps34-a').css("display","inline");
    $('#ps34-b').css("display","inline");
    $('#ps34-c').css("display","inline");
    $('#furca34b-b').css("display","inline");
    $('#furca34b-a').css("display","inline");
    $('#f34-a').css("display","inline");
    $('#f34-b').css("display","inline");
    $('#ae34b').css("display","inline");
    $('#pi34b').css("display","inline");
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d35b').toggle(
      function () {
        $('#diente35b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-35b.png')");
    $('#diente35b-a').css("background-position","0 20px");
    $('#diente35b-a').css("background-repeat","no-repeat");
    $('#m35b').css("display","none");
    $('#i35b').css("display","none");
    $('#f35b').css("display","none");
    $('#s35b-a').css("display","none");
    $('#s35b-b').css("display","none");
    $('#s35b-c').css("display","none");
    $('#p35b-a').css("display","none");
    $('#p35b-b').css("display","none");
    $('#p35b-c').css("display","none");
    $('#mg35b-a').css("display","none");
    $('#mg35b-b').css("display","none");
    $('#mg35b-c').css("display","none");
    $('#ps35b-a').css("display","none");
    $('#ps35b-b').css("display","none");
    $('#ps35b-c').css("display","none");
    /*
    $('#mg35b-a').val('0');
    $('#mg35b-b').val('0');
    $('#mg35b-c').val('0');
    $('#ps35b-a').val('0');
    $('#ps35b-b').val('0');
    $('#ps35b-c').val('0');
    */
    
    $('#diente35-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-35.png')");
    $('#diente35-a').css("background-position","0 1px");
    $('#diente35-a').css("background-repeat","no-repeat");
    $('#m35').css("display","none");
    $('#i35').css("display","none");
    $('#f35').css("display","none");
    $('#s35-a').css("display","none");
    $('#s35-b').css("display","none");
    $('#s35-c').css("display","none");
    $('#p35-a').css("display","none");
    $('#p35-b').css("display","none");
    $('#p35-c').css("display","none");
    $('#mg35-a').css("display","none");
    $('#mg35-b').css("display","none");
    $('#mg35-c').css("display","none");
    $('#ps35-a').css("display","none");
    $('#ps35-b').css("display","none");
    $('#ps35-c').css("display","none");
    /*
    $('#mg35-a').val('0');
    $('#mg35-b').val('0');
    $('#mg35-c').val('0');
    $('#ps35-a').val('0');
    $('#ps35-b').val('0');
    $('#ps35-c').val('0');
    */
    $('#ae35b').css("display","none");
    $('#pi35b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar35a();
    cargar35b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente35b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-35b.png')");
    $('#diente35b-a').css("background-position","0 20px");
    $('#diente35b-a').css("background-repeat","no-repeat");
    $('#m35b').css("display","inline");
    $('#i35b').css("display","block");
    $('#f35b').css("display","inline");
    $('#s35b-a').css("display","inline");
    $('#s35b-b').css("display","inline");
    $('#s35b-c').css("display","inline");
    $('#p35b-a').css("display","inline");
    $('#p35b-b').css("display","inline");
    $('#p35b-c').css("display","inline");
    $('#mg35b-a').css("display","inline");
    $('#mg35b-b').css("display","inline");
    $('#mg35b-c').css("display","inline");
    $('#ps35b-a').css("display","inline");
    $('#ps35b-b').css("display","inline");
    $('#ps35b-c').css("display","inline");
    
    $('#diente35-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-35.png')");
    $('#diente35-a').css("background-position","0 1px");
    $('#diente35-a').css("background-repeat","no-repeat");
    $('#m35').css("display","inline");
    $('#i35').css("display","inline");
    $('#f35').css("display","inline");
    $('#s35-a').css("display","inline");
    $('#s35-b').css("display","inline");
    $('#s35-c').css("display","inline");
    $('#p35-a').css("display","inline");
    $('#p35-b').css("display","inline");
    $('#p35-c').css("display","inline");
    $('#mg35-a').css("display","inline");
    $('#mg35-b').css("display","inline");
    $('#mg35-c').css("display","inline");
    $('#ps35-a').css("display","inline");
    $('#ps35-b').css("display","inline");
    $('#ps35-c').css("display","inline");
    $('#ae35b').css("display","inline");
    $('#pi35b').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d36b').toggle(
      function () {
        $('#diente36b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-36b.png')");
    $('#diente36b-a').css("background-position","0 23px");
    $('#diente36b-a').css("background-repeat","no-repeat");
    $('#m36b').css("display","none");
    $('#i36b').css("display","none");
    $('#f36b').css("display","none");
    $('#s36b-a').css("display","none");
    $('#s36b-b').css("display","none");
    $('#s36b-c').css("display","none");
    $('#p36b-a').css("display","none");
    $('#p36b-b').css("display","none");
    $('#p36b-c').css("display","none");
    $('#mg36b-a').css("display","none");
    $('#mg36b-b').css("display","none");
    $('#mg36b-c').css("display","none");
    $('#ps36b-a').css("display","none");
    $('#ps36b-b').css("display","none");
    $('#ps36b-c').css("display","none");
    /*$('#furca36b').css("background","none");*/

    $('#f36desact').css("display","none");
    $('#f36bdesact').css("display","none");
    /*

    $('#mg36b-a').val('0');
    $('#mg36b-b').val('0');
    $('#mg36b-c').val('0');
    $('#ps36b-a').val('0');
    $('#ps36b-b').val('0');
    $('#ps36b-c').val('0');
    */
    
    $('#diente36-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-36.png')");
    $('#diente36-a').css("background-position","top");
    $('#diente36-a').css("background-repeat","no-repeat");
    $('#m36').css("display","none");
    $('#i36').css("display","none");
    $('#f36').css("display","none");
    $('#s36-a').css("display","none");
    $('#s36-b').css("display","none");
    $('#s36-c').css("display","none");
    $('#p36-a').css("display","none");
    $('#p36-b').css("display","none");
    $('#p36-c').css("display","none");
    $('#mg36-a').css("display","none");
    $('#mg36-b').css("display","none");
    $('#mg36-c').css("display","none");
    $('#ps36-a').css("display","none");
    $('#ps36-b').css("display","none");
    $('#ps36-c').css("display","none");
    /*$('#furca36').css("background","none");*/
    /*
    $('#mg36-a').val('0');
    $('#mg36-b').val('0');
    $('#mg36-c').val('0');
    $('#ps36-a').val('0');
    $('#ps36-b').val('0');
    $('#ps36-c').val('0');
    */
    $('#furca36b-b').css("display","none");
    $('#furca36b-a').css("display","none");
    $('#f36-a').css("display","none");
    $('#f36-b').css("display","none");
    $('#furca36').css("display","none");
    $('#furca36b').css("display","none");
    $('#ae36b').css("display","none");
    $('#pi36b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar36a();
    cargar36b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente36b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-36b.png')");
    $('#diente36b-a').css("background-position","0 23px");
    $('#diente36b-a').css("background-repeat","no-repeat");
    $('#m36b').css("display","inline");
    $('#i36b').css("display","block");
    $('#f36b').css("display","inline");
    $('#s36b-a').css("display","inline");
    $('#s36b-b').css("display","inline");
    $('#s36b-c').css("display","inline");
    $('#p36b-a').css("display","inline");
    $('#p36b-b').css("display","inline");
    $('#p36b-c').css("display","inline");
    $('#mg36b-a').css("display","inline");
    $('#mg36b-b').css("display","inline");
    $('#mg36b-c').css("display","inline");
    $('#ps36b-a').css("display","inline");
    $('#ps36b-b').css("display","inline");
    $('#ps36b-c').css("display","inline");
    
    $('#diente36-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-36.png')");
    $('#diente36-a').css("background-position","top");
    $('#diente36-a').css("background-repeat","no-repeat");
    $('#m36').css("display","inline");
    $('#i36').css("display","inline");
    $('#f36').css("display","inline");
    $('#s36-a').css("display","inline");
    $('#s36-b').css("display","inline");
    $('#s36-c').css("display","inline");
    $('#p36-a').css("display","inline");
    $('#p36-b').css("display","inline");
    $('#p36-c').css("display","inline");
    $('#mg36-a').css("display","inline");
    $('#mg36-b').css("display","inline");
    $('#mg36-c').css("display","inline");
    $('#ps36-a').css("display","inline");
    $('#ps36-b').css("display","inline");
    $('#ps36-c').css("display","inline");
    $('#furca36b-b').css("display","inline");
    $('#furca36b-a').css("display","inline");
    $('#f36-a').css("display","inline");
    $('#f36-b').css("display","inline");

    $('#f36desact').css("display","block");
    $('#f36bdesact').css("display","block");

    $('#furca36').css("display","block");
    $('#furca36b').css("display","block");
    $('#ae36b').css("display","inline");
    $('#pi36b').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );

  $('#d37b').toggle(
      function () {
        $('#diente37b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-37b.png')");
    $('#diente37b-a').css("background-position","0px 21px");
    $('#diente37b-a').css("background-repeat","no-repeat");
    $('#m37b').css("display","none");
    $('#i37b').css("display","none");
    $('#f37b').css("display","none");
    $('#s37b-a').css("display","none");
    $('#s37b-b').css("display","none");
    $('#s37b-c').css("display","none");
    $('#p37b-a').css("display","none");
    $('#p37b-b').css("display","none");
    $('#p37b-c').css("display","none");
    $('#mg37b-a').css("display","none");
    $('#mg37b-b').css("display","none");
    $('#mg37b-c').css("display","none");
    $('#ps37b-a').css("display","none");
    $('#ps37b-b').css("display","none");
    $('#ps37b-c').css("display","none");
    /*$('#furca37b').css("background","none");*/

    $('#f37desact').css("display","none");
    $('#f37bdesact').css("display","none");
    /*

    $('#mg37b-a').val('0');
    $('#mg37b-b').val('0');
    $('#mg37b-c').val('0');
    $('#ps37b-a').val('0');
    $('#ps37b-b').val('0');
    $('#ps37b-c').val('0');
    */
    
    $('#diente37-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-37.png')");
    $('#diente37-a').css("background-position","0px -4px");
    $('#diente37-a').css("background-repeat","no-repeat");
    $('#m37').css("display","none");
    $('#i37').css("display","none");
    $('#f37').css("display","none");
    $('#s37-a').css("display","none");
    $('#s37-b').css("display","none");
    $('#s37-c').css("display","none");
    $('#p37-a').css("display","none");
    $('#p37-b').css("display","none");
    $('#p37-c').css("display","none");
    $('#mg37-a').css("display","none");
    $('#mg37-b').css("display","none");
    $('#mg37-c').css("display","none");
    $('#ps37-a').css("display","none");
    $('#ps37-b').css("display","none");
    $('#ps37-c').css("display","none");
    /*$('#furca37').css("background","none");*/
    /*
    $('#mg37-a').val('0');
    $('#mg37-b').val('0');
    $('#mg37-c').val('0');
    $('#ps37-a').val('0');
    $('#ps37-b').val('0');
    $('#ps37-c').val('0');
    */
    $('#furca37b-b').css("display","none");
    $('#furca37b-a').css("display","none");
    $('#f37-a').css("display","none");
    $('#f37-b').css("display","none");
    $('#furca37').css("display","none");
    $('#furca37b').css("display","none");
    $('#ae37b').css("display","none");
    $('#pi37b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar37a();
    cargar37b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente37b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-37b.png')");
    $('#diente37b-a').css("background-position","0px 21px");
    $('#diente37b-a').css("background-repeat","no-repeat");
    $('#m37b').css("display","inline");
    $('#i37b').css("display","block");
    $('#f37b').css("display","inline");
    $('#s37b-a').css("display","inline");
    $('#s37b-b').css("display","inline");
    $('#s37b-c').css("display","inline");
    $('#p37b-a').css("display","inline");
    $('#p37b-b').css("display","inline");
    $('#p37b-c').css("display","inline");
    $('#mg37b-a').css("display","inline");
    $('#mg37b-b').css("display","inline");
    $('#mg37b-c').css("display","inline");
    $('#ps37b-a').css("display","inline");
    $('#ps37b-b').css("display","inline");
    $('#ps37b-c').css("display","inline");
    
    $('#diente37-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-37.png')");
    $('#diente37-a').css("background-position","0px -4px");
    $('#diente37-a').css("background-repeat","no-repeat");
    $('#m37').css("display","inline");
    $('#i37').css("display","inline");
    $('#f37').css("display","inline");
    $('#s37-a').css("display","inline");
    $('#s37-b').css("display","inline");
    $('#s37-c').css("display","inline");
    $('#p37-a').css("display","inline");
    $('#p37-b').css("display","inline");
    $('#p37-c').css("display","inline");
    $('#mg37-a').css("display","inline");
    $('#mg37-b').css("display","inline");
    $('#mg37-c').css("display","inline");
    $('#ps37-a').css("display","inline");
    $('#ps37-b').css("display","inline");
    $('#ps37-c').css("display","inline");
    $('#furca37b-b').css("display","inline");
    $('#furca37b-a').css("display","inline");
    $('#f37-a').css("display","inline");
    $('#f37-b').css("display","inline");

    $('#f37desact').css("display","block");
    $('#f37bdesact').css("display","block");

    $('#furca37').css("display","block");
    $('#furca37b').css("display","block");
    $('#ae37b').css("display","inline");
    $('#pi37b').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );
  $('#d38b').toggle(
      function () {
        $('#diente38b-a').css("background","url('Periodontograma/img/tabla8/tachados/periodontograma-dientes-abajo-tachados-38b.png')");
    $('#diente38b-a').css("background-position","0 24px");
    $('#diente38b-a').css("background-repeat","no-repeat");
    $('#m38b').css("display","none");
    $('#i38b').css("display","none");
    $('#f38b').css("display","none");
    $('#s38b-a').css("display","none");
    $('#s38b-b').css("display","none");
    $('#s38b-c').css("display","none");
    $('#p38b-a').css("display","none");
    $('#p38b-b').css("display","none");
    $('#p38b-c').css("display","none");
    $('#mg38b-a').css("display","none");
    $('#mg38b-b').css("display","none");
    $('#mg38b-c').css("display","none");
    $('#ps38b-a').css("display","none");
    $('#ps38b-b').css("display","none");
    $('#ps38b-c').css("display","none");
    /*$('#furca38b').css("background","none");*/

    $('#f38desact').css("display","none");
    $('#f38bdesact').css("display","none");
    /*

    $('#mg38b-a').val('0');
    $('#mg38b-b').val('0');
    $('#mg38b-c').val('0');
    $('#ps38b-a').val('0');
    $('#ps38b-b').val('0');
    $('#ps38b-c').val('0');
    */
    
    $('#diente38-a').css("background","url('Periodontograma/img/tabla6/tachados/periodontograma-dientes-abajo-tachados-38.png')");
    $('#diente38-a').css("background-position","0 -3px");
    $('#diente38-a').css("background-repeat","no-repeat");
    $('#m38').css("display","none");
    $('#i38').css("display","none");
    $('#f38').css("display","none");
    $('#s38-a').css("display","none");
    $('#s38-b').css("display","none");
    $('#s38-c').css("display","none");
    $('#p38-a').css("display","none");
    $('#p38-b').css("display","none");
    $('#p38-c').css("display","none");
    $('#mg38-a').css("display","none");
    $('#mg38-b').css("display","none");
    $('#mg38-c').css("display","none");
    $('#ps38-a').css("display","none");
    $('#ps38-b').css("display","none");
    $('#ps38-c').css("display","none");
    /*$('#furca38').css("background","none");*/
    /*
    $('#mg38-a').val('0');
    $('#mg38-b').val('0');
    $('#mg38-c').val('0');
    $('#ps38-a').val('0');
    $('#ps38-b').val('0');
    $('#ps38-c').val('0');
    */
    $('#furca38b-b').css("display","none");
    $('#furca38b-a').css("display","none");
    $('#f38-a').css("display","none");
    $('#f38-b').css("display","none");
    $('#furca38').css("display","none");
    $('#furca38b').css("display","none");
    $('#ae38b').css("display","none");
    $('#pi38b').css("display","none");
    
    totalDientes--;
    getDefectos();
    cargar38a();
    cargar38b();
    
    cargar2();
    getSangrado();
    getPlaca();
      },
      function () {
    $('#diente38b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-38b.png')");
    $('#diente38b-a').css("background-position","0 24px");
    $('#diente38b-a').css("background-repeat","no-repeat");
    $('#m38b').css("display","inline");
    $('#i38b').css("display","block");
    $('#f38b').css("display","inline");
    $('#s38b-a').css("display","inline");
    $('#s38b-b').css("display","inline");
    $('#s38b-c').css("display","inline");
    $('#p38b-a').css("display","inline");
    $('#p38b-b').css("display","inline");
    $('#p38b-c').css("display","inline");
    $('#mg38b-a').css("display","inline");
    $('#mg38b-b').css("display","inline");
    $('#mg38b-c').css("display","inline");
    $('#ps38b-a').css("display","inline");
    $('#ps38b-b').css("display","inline");
    $('#ps38b-c').css("display","inline");
    
    $('#diente38-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-38.png')");
    $('#diente38-a').css("background-position","0 -3px");
    $('#diente38-a').css("background-repeat","no-repeat");
    $('#m38').css("display","inline");
    $('#i38').css("display","inline");
    $('#f38').css("display","inline");
    $('#s38-a').css("display","inline");
    $('#s38-b').css("display","inline");
    $('#s38-c').css("display","inline");
    $('#p38-a').css("display","inline");
    $('#p38-b').css("display","inline");
    $('#p38-c').css("display","inline");
    $('#mg38-a').css("display","inline");
    $('#mg38-b').css("display","inline");
    $('#mg38-c').css("display","inline");
    $('#ps38-a').css("display","inline");
    $('#ps38-b').css("display","inline");
    $('#ps38-c').css("display","inline");
    $('#furca38b-b').css("display","inline");
    $('#furca38b-a').css("display","inline");
    $('#f38-a').css("display","inline");
    $('#f38-b').css("display","inline");

    $('#f38desact').css("display","block");
    $('#f38bdesact').css("display","block");

    $('#furca38').css("display","block");
    $('#furca38b').css("display","block");
    $('#ae38b').css("display","inline");
    $('#pi38b').css("display","inline");
    
    totalDientes++;
    cargar2();
    getSangrado();
    getPlaca();
      }
  );  
  
  $(document).ready(function() {
  // Handler for .ready() called.
  //anchuraValor();

  
  CargarDatosPeriodontograma();

    cargar18a();
    cargar17a();
    cargar16a();
    cargar15a();
    cargar14a();
    cargar13a();
    cargar12a();
    cargar11a();
    
    cargar28a();
    cargar27a();
    cargar26a();
    cargar25a();
    cargar24a();
    cargar23a();
    cargar22a();
    cargar21a();
    
    cargar18b();
    cargar17b();
    cargar16b();
    cargar15b();
    cargar14b();
    cargar13b();
    cargar12b();
    cargar11b();
    
    cargar28b();
    cargar27b();
    cargar26b();
    cargar25b();
    cargar24b();
    cargar23b();
    cargar22b();
    cargar21b();
    
    cargar48a();
    cargar47a();
    cargar46a();
    cargar45a();
    cargar44a();
    cargar43a();
    cargar42a();
    cargar41a();
    
    cargar48b();
    cargar47b();
    cargar46b();
    cargar45b();
    cargar44b();
    cargar43b();
    cargar42b();
    cargar41b();
    
    cargar38a();
    cargar37a();
    cargar36a();
    cargar35a();
    cargar34a();
    cargar33a();
    cargar32a();
    cargar31a();
    
    cargar38b();
    cargar37b();
    cargar36b();
    cargar35b();
    cargar34b();
    cargar33b();
    cargar32b();
    cargar31b();
    
    


  });
  
  
  function CargarDatosPeriodontograma() {

var usuario_id = '<?=$_SESSION['ID']?>';
var cliente_id = '<?=$_GET['clienteId']?>';
//console.log(23213);
$.ajax({
  type: "POST",
  url: "PO_Ajax.php",
  data: {
    usuario_id: usuario_id,
    cliente_id: cliente_id,
    Tipo_Consulta: "Cargar Datos Periodoncia"
  },
  success: function(response) {
    
    var datos = JSON.parse(response);

// Recorrer cada campo en los datos recibidos
    for (var campo in datos) {
      if (datos.hasOwnProperty(campo)) {
        // Buscar los elementos por su nombre y asignarles el valor correspondiente
        var elementos = document.getElementsByName(campo);
        for (var i = 0; i < elementos.length; i++) {
          // Asignar el valor al elemento actual en el bucle
          //elementos[i].value = datos[campo];
        
          if (elementos[i].tagName.toLowerCase() == "select") {
                    // Si el elemento es un select, asignar el valor y ejecutar el evento onchange
                    elementos[i].value = datos[campo];
                    elementos[i].dispatchEvent(new Event('change'));
          } else if (elementos[i].type == "checkbox") {
                    // Si el elemento es un checkbox
                    if (datos[campo] == "1") {
                        // Si el valor es 1, establecer el checkbox como marcado
                        elementos[i].checked = true;
            elementos[i].dispatchEvent(new Event('change'));
                    } 
                    // Ejecutar el evento onchange del checkbox
                    
                  }else if (elementos[i].tagName.toLowerCase() == "input" && elementos[i].getAttribute("data-formulario") == "yes2") {
                    // Si el elemento es un input y tiene data-formulario="yes2"
                    elementos[i].value = datos[campo];
                    // Ejecutar el evento onchange del input
                    elementos[i].dispatchEvent(new Event('change'));
                  }else {
            // Si no es un select, solo asignar el valor
            elementos[i].value = datos[campo];
          }

        }
      }
    }

  }
});
}

</script>
</div>



<script>

    //search input with data-formulario="yes"
  $('input[data-formulario="yes"]').on( "change", function() {
    
    var name = $(this).attr('name');
    var value = $(this).val();

    $.ajax({
      type: "POST",
      url: "PO_Ajax.php",
      data: {
        name: name,
        value: value,
        cliente_id: '<?php echo $_GET['clienteId']; ?>',
        usuario_id: '<?php echo $_SESSION['ID']; ?>',
        Tipo_Consulta: "Guardar Datos Periodoncia"
      }
    }).done(function( msg ) {
      
    })
    
  });

  $('select[data-formulario="yes"]').on( "change", function() {
    
    var name = $(this).attr('name');
    var value = $(this).val();

    $.ajax({
      type: "POST",
      url: "PO_Ajax.php",
      data: {
        name: name,
        value: value,
        tipo:"1",
        cliente_id: '<?php echo $_GET['clienteId']; ?>',
        usuario_id: '<?php echo $_SESSION['ID']; ?>',
        Tipo_Consulta: "Guardar Datos Periodoncia"
      }
    }).done(function( msg ) {
      
    })
    
  });

  $('input[data-formulario="yes2"]').on( "change", function() {
    
    var name = $(this).attr('name');
    var value = $(this).val();

    $.ajax({
      type: "POST",
      url: "PO_Ajax.php",
      data: {
        name: name,
        value: value,
        tipo:"1",
        cliente_id: '<?php echo $_GET['clienteId']; ?>',
        usuario_id: '<?php echo $_SESSION['ID']; ?>',
        Tipo_Consulta: "Guardar Datos Periodoncia"
      }
    }).done(function( msg ) {
      
    })
    
  });

  $('input[data-formulario="yes3"]').on( "change", function() {
    
    var name = $(this).attr('name');
    var value = $(this).prop('checked') ? 1 : 0;

    $.ajax({
      type: "POST",
      url: "PO_Ajax.php",
      data: {
        name: name,
        value: value,
        tipo:"1",
        cliente_id: '<?php echo $_GET['clienteId']; ?>',
        usuario_id: '<?php echo $_SESSION['ID']; ?>',
        Tipo_Consulta: "Guardar Datos Periodoncia"
      }
    }).done(function( msg ) {
      
    })
    
  });


  function ActualizarDiente(campo,tipo){
    var name = $(campo).attr('id');
    var valor = $(campo).val();

    //console.log(valor);
    

    switch(tipo){
    

      case "i11":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente11-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-11.png')");
        $('#diente11-a').css("background-position","bottom");
        $('#diente11-a').css("background-repeat","no-repeat");
        
        $('#diente11b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-11b.png')");
        $('#diente11b-a').css("background-position","0 12px");
        $('#diente11b-a').css("background-repeat","no-repeat");

        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente11-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-11.png')");
        $('#diente11-a').css("background-position","bottom");
        $('#diente11-a').css("background-repeat","no-repeat");
        
        $('#diente11b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-11b.png')");
        $('#diente11b-a').css("background-position","0 12px");
        $('#diente11b-a').css("background-repeat","no-repeat");

      }
      break;

      case "i12":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente12-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-12.png')");
        $('#diente12-a').css("background-position","0 6px");
        $('#diente12-a').css("background-repeat","no-repeat");
        
        $('#diente12b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-12b.png')");
        $('#diente12b-a').css("background-position","0 18px");
        $('#diente12b-a').css("background-repeat","no-repeat");
        
        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente12-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-12.png')");
        $('#diente12-a').css("background-position","0 4px");
        $('#diente12-a').css("background-repeat","no-repeat");
        
        $('#diente12b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-12b.png')");
        $('#diente12b-a').css("background-position","0 18px");
        $('#diente12b-a').css("background-repeat","no-repeat");

      }
      break;

      case "i13":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente13-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-13.png')");
        $('#diente13-a').css("background-position","0 2px");
        $('#diente13-a').css("background-repeat","no-repeat");
        
        $('#diente13b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-13b.png')");
        $('#diente13b-a').css("background-position","0 16px");
        $('#diente13b-a').css("background-repeat","no-repeat");

        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente13-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-13.png')");
        $('#diente13-a').css("background-position","0 2px");
        $('#diente13-a').css("background-repeat","no-repeat");
        
        $('#diente13b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-13b.png')");
        $('#diente13b-a').css("background-position","0 16px");
        $('#diente13b-a').css("background-repeat","no-repeat");

      }
      break;

      case "i14":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente14-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-14.png')");
        $('#diente14-a').css("background-repeat","no-repeat");
        
        $('#diente14b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-14b.png')");
        $('#diente14b-a').css("background-position","0 17px");
        $('#diente14b-a').css("background-repeat","no-repeat");
        
        $('#f14b-a').css("background","#FFFFFF");
        $('#f14b-b').css("background","#FFFFFF");

        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente14-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-14.png')");
        $('#diente14-a').css("background-repeat","no-repeat");
        
        $('#diente14b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-14b.png')");
        $('#diente14b-a').css("background-position","0 17px");
        $('#diente14b-a').css("background-repeat","no-repeat");
        
        $('#furca14-a').css("background","none");
        $('#furca14-b').css("background","none");
        $('#f14b-a').css("background","none");
        $('#f14b-b').css("background","none");
      }
      break;

      case "i15":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente15-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-15.png')");
        $('#diente15-a').css("background-position","0 5px");
        $('#diente15-a').css("background-repeat","no-repeat");
        
        $('#diente15b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-15b.png')");
        $('#diente15b-a').css("background-position","0 17px");
        $('#diente15b-a').css("background-repeat","no-repeat");

        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente15-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-15.png')");
        $('#diente15-a').css("background-position","0 4px");
        $('#diente15-a').css("background-repeat","no-repeat");
        
        $('#diente15b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-15b.png')");
        $('#diente15b-a').css("background-position","0 17px");
        $('#diente15b-a').css("background-repeat","no-repeat");

      }
      break;

      case "i16":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente16-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-16.png')");
        $('#diente16-a').css("background-position","0 4px");
        $('#diente16-a').css("background-repeat","no-repeat");
        
        $('#diente16b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-16b.png')");
        $('#diente16b-a').css("background-position","0 22px");
        $('#diente16b-a').css("background-repeat","no-repeat");
        
        $('#f16').css("background","#FFFFFF");
        $('#f16b-a').css("background","#FFFFFF");
        $('#f16b-b').css("background","#FFFFFF");
        
        $("#f16desact").attr("id","f16");
        $("#f16b-adesact").attr("id","f16b-a");
        $("#f16b-bdesact").attr("id","f16b-b");


        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#f16').css({"background":"#FFFFFF"});
        $('#diente16-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-16.png')");
        $('#diente16-a').css("background-position","0 4px");
        $('#diente16-a').css("background-repeat","no-repeat");
        
        $('#diente16b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-16b.png')");
        $('#diente16b-a').css("background-position","0 22px");
        $('#diente16b-a').css("background-repeat","no-repeat");
        
        $('#furca16').css("background","none");
        $('#furca16-a').css("background","none");
        $('#furca16-b').css("background","none");
        $('#f16').css("background","none");
        $('#f16b-a').css("background","none");
        $('#f16b-b').css("background","none");
        
        $("#f16").attr("id","f16desact");
        $("#f16b-a").attr("id","f16b-adesact");
        $("#f16b-b").attr("id","f16b-bdesact");

      }
      break;

      case "i17":
      if (valor == 0) {

        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente17-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-17.png')");
        $('#diente17-a').css("background-repeat","no-repeat");
        
        $('#diente17b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-17b.png')");
        $('#diente17b-a').css("background-position","0 24px");
        $('#diente17b-a').css("background-repeat","no-repeat");
        
        $('#f17').css("background","#FFFFFF");
        $('#f17b-a').css("background","#FFFFFF");
        $('#f17b-b').css("background","#FFFFFF");
        
        $("#f17desact").attr("id","f17");
        $("#f17b-adesact").attr("id","f17b-a");
        $("#f17b-bdesact").attr("id","f17b-b");

        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#f17').css({"background":"#FFFFFF"});
        $('#diente17-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-17.png')");
        $('#diente17-a').css("background-position","0 -1px");
        $('#diente17-a').css("background-repeat","no-repeat");
        
        $('#diente17b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-17b.png')");
        $('#diente17b-a').css("background-position","0 24px");
        $('#diente17b-a').css("background-repeat","no-repeat");
        
        $('#furca17').css("background","none");
        $('#furca17-a').css("background","none");
        $('#furca17-b').css("background","none");
        $('#f17').css("background","none");
        $('#f17b-a').css("background","none");
        $('#f17b-b').css("background","none");
        
        $("#f17").attr("id","f17desact");
        $("#f17b-a").attr("id","f17b-adesact");
        $("#f17b-b").attr("id","f17b-bdesact");

      }
      break;

      case "i18":
      if (valor == 0) {
        $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente18-a').css("background","url('Periodontograma/img/tabla1/periodontograma-dientes-arriba-18.png')");
        $('#diente18-a').css("background-position","0 -2px");
        $('#diente18-a').css("background-repeat","no-repeat");
        
        $('#diente18b-a').css("background","url('Periodontograma/img/tabla3/periodontograma-dientes-arriba-18b.png')");
        $('#diente18b-a').css("background-position","0 23px");
        $('#diente18b-a').css("background-repeat","no-repeat");
        
        $('#f18').css("background","#FFFFFF");
        $('#f18b-a').css("background","#FFFFFF");
        $('#f18b-b').css("background","#FFFFFF");
        
        $("#f18desact").attr("id","f18");
        $("#f18b-adesact").attr("id","f18b-a");
        $("#f18b-bdesact").attr("id","f18b-b");
        //$('#d18').trigger('click');

        
      } else {
        
        $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#f18').css({"background":"#FFFFFF"});
        $('#diente18-a').css("background","url('Periodontograma/img/tabla1/implantes/periodontograma-dientes-arriba-tornillo-18.png')");
        $('#diente18-a').css("background-position","0 -2px");
        $('#diente18-a').css("background-repeat","no-repeat");
        
        $('#diente18b-a').css("background","url('Periodontograma/img/tabla3/implantes/periodontograma-dientes-arriba-tornillo-18b.png')");
        $('#diente18b-a').css("background-position","0 23px");
        $('#diente18b-a').css("background-repeat","no-repeat");
        
        $('#furca18').css("background","none");
        $('#furca18-a').css("background","none");
        $('#furca18-b').css("background","none");
        $('#f18').css("background","none");
        $('#f18b-a').css("background","none");
        $('#f18b-b').css("background","none");
        
        $("#f18").attr("id","f18desact");
        $("#f18b-a").attr("id","f18b-adesact");
        $("#f18b-b").attr("id","f18b-bdesact");

      }
      break;
      
























    case "i21":

      if(valor==0){

        $("#i21").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente21-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-21.png')");
        $('#diente21-a').css("background-position","bottom");
        $('#diente21-a').css("background-repeat","no-repeat");
        
        $('#diente21b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-21b.png')");
        $('#diente21b-a').css("background-position","0 11px");
        $('#diente21b-a').css("background-repeat","no-repeat");
      
      
      }else{

        $("#i21").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#f21').css({"background":"#FFFFFF"});
        $('#diente21-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-21.png')");
        $('#diente21-a').css("background-position","bottom");
        $('#diente21-a').css("background-repeat","no-repeat");
        
        $('#diente21b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-21b.png')");
        $('#diente21b-a').css("background-position","0 11px");
        $('#diente21b-a').css("background-repeat","no-repeat");
      }

    break;
    
    case "i22":
        if (valor == 0) {
            $("#i22").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente22-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-22.png')");
            $('#diente22-a').css("background-position","0px 6px");
            $('#diente22-a').css("background-repeat","no-repeat");
            $('#diente22b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-22b.png')");
            $('#diente22b-a').css("background-position","0 11px");
            $('#diente22b-a').css("background-repeat","no-repeat");
        } else {
            $("#i22").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#f22').css({"background":"#FFFFFF"});
            $('#diente22-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-22.png')");
            $('#diente22-a').css("background-position","0px 6px");
            $('#diente22-a').css("background-repeat","no-repeat");
            $('#diente22b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-22b.png')");
            $('#diente22b-a').css("background-position","0 11px");
            $('#diente22b-a').css("background-repeat","no-repeat");
        }
      break;

    case "i23":
        if (valor == 0) {
            $("#i23").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente23-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-23.png')");
            $('#diente23-a').css("background-position","top");
            $('#diente23-a').css("background-repeat","no-repeat");
            $('#diente23b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-23b.png')");
            $('#diente23b-a').css("background-position","0 15px");
            $('#diente23b-a').css("background-repeat","no-repeat");
        } else {
            $("#i23").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#f23').css({"background":"#FFFFFF"});
            $('#diente23-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-23.png')");
            $('#diente23-a').css("background-position","top");
            $('#diente23-a').css("background-repeat","no-repeat");
            $('#diente23b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-23b.png')");
            $('#diente23b-a').css("background-position","0 15px");
            $('#diente23b-a').css("background-repeat","no-repeat");
        }
      break;

    case "i24":
      if (valor == 0) {
        $("#i24").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente24-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-24.png')");
        $('#diente24-a').css("background-repeat","no-repeat");
        $('#diente24b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-24b.png')");
        $('#diente24b-a').css("background-repeat","no-repeat");
        $('#diente24b-a').css("background-position","0 16px");
        $('#furca24-a').css("background","none");
        $('#furca24-b').css("background","none");
        $('#f24b-a').css("background","none");
        $('#f24b-b').css("background","none");
        $("#f24b-a").attr("id","f24b-adesact");
        $("#f24b-b").attr("id","f24b-bdesact");
      } else {
        $("#i24").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente24-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-24.png')");
        $('#diente24-a').css("background-repeat","no-repeat");
        $('#diente24b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-24b.png')");
        $('#diente24b-a').css("background-repeat","no-repeat");
        $('#diente24b-a').css("background-position","0 16px");
        $('#f24b-a').css("background","#FFFFFF");
        $('#f24b-b').css("background","#FFFFFF");
        $("#f24b-adesact").attr("id","f24b-a");
        $("#f24b-bdesact").attr("id","f24b-b");
      }
      break;
    case "i25":
      if (valor == 0) {

        $("#i25").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente25-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-25.png')");
        $('#diente25-a').css("background-position","0 5px");
        $('#diente25-a').css("background-repeat","no-repeat");
        $('#diente25b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-25b.png')");
        $('#diente25b-a').css("background-position","0 16px");
        $('#diente25b-a').css("background-repeat","no-repeat");

        
      } else {
        
        $("#i25").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente25-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-25.png')");
        $('#diente25-a').css("background-position","0 5px");
        $('#diente25-a').css("background-repeat","no-repeat");
        $('#diente25b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-25b.png')");
        $('#diente25b-a').css("background-position","0 16px");
        $('#diente25b-a').css("background-repeat","no-repeat");

      }
    break;

    case "i26":
      if (valor == 0) {

        $("#i26").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente26-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-26.png')");
        $('#diente26-a').css("background-position","0 4px");
        $('#diente26-a').css("background-repeat","no-repeat");
        $('#diente26b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-26b.png')");
        $('#diente26b-a').css("background-position","0 21px");
        $('#diente26b-a').css("background-repeat","no-repeat");
        $('#f26').css("background","#FFFFFF");
        $('#f26b-a').css("background","#FFFFFF");
        $('#f26b-b').css("background","#FFFFFF");
        $("#f26desact").attr("id","f26");
        $("#f26b-adesact").attr("id","f26b-a");
        $("#f26b-bdesact").attr("id","f26b-b");
        
        
      } else {
        
        $("#i26").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente26-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-26.png')");
        $('#diente26-a').css("background-position","0 4px");
        $('#diente26-a').css("background-repeat","no-repeat");
        $('#diente26b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-26b.png')");
        $('#diente26b-a').css("background-position","0 21px");
        $('#diente26b-a').css("background-repeat","no-repeat");
        $('#furca26-a').css("background","none");
        $('#furca26-b').css("background","none");
        $('#f26b-a').css("background","none");
        $('#f26b-b').css("background","none");
        $('#f26').css("background","none");
        $('#furca26').css("background","none");
        $("#f26").attr("id","f26desact");
        $("#f26b-a").attr("id","f26b-adesact");
        $("#f26b-b").attr("id","f26b-bdesact");

      }
    break;

      case "i27":
      if (valor == 0) {

        $("#i27").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente27-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-27.png')");
        $('#diente27-a').css("background-repeat","no-repeat");
        $('#diente27b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-27b.png')");
        $('#diente27b-a').css("background-repeat","no-repeat");
        $('#diente27b-a').css("background-position","0 24px");
        $('#f27').css("background","#FFFFFF");
        $("#f27desact").attr("id","f27");
        $('#f27b-a').css("background","#FFFFFF");
        $('#f27b-b').css("background","#FFFFFF");
        $("#f27desact").attr("id","f27");
        $("#f27b-adesact").attr("id","f27b-a");
        $("#f27b-bdesact").attr("id","f27b-b");

        
      } else {
        
        $("#i27").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente27-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-27.png')");
        $('#diente27-a').css("background-repeat","no-repeat");
        $('#diente27b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-27b.png')");
        $('#diente27b-a').css("background-repeat","no-repeat");
        $('#diente27b-a').css("background-position","0 24px");
        $('#furca27-a').css("background","none");
        $('#furca27-b').css("background","none");
        $('#f27b-a').css("background","none");
        $('#f27b-b').css("background","none");
        $('#f27').css("background","none");
        $('#furca27').css("background","none");
        $("#f27").attr("id","f27desact");
        $("#f27b-a").attr("id","f27b-adesact");
        $("#f27b-b").attr("id","f27b-bdesact");

      }
    break;

    case "i28":
      if (valor == 0) {

        $("#i28").css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
        $('#diente28-a').css("background","url('Periodontograma/img/tabla2/periodontograma-dientes-arriba-28.png')");
        $('#diente28-a').css("background-position","0 -2px");
        $('#diente28-a').css("background-repeat","no-repeat");
        $('#diente28b-a').css("background","url('Periodontograma/img/tabla4/periodontograma-dientes-arriba-28b.png')");
        $('#diente28b-a').css("background-position","0 23px");
        $('#diente28b-a').css("background-repeat","no-repeat");
        $('#f28').css("background","#FFFFFF");
        $('#f28b-a').css("background","#FFFFFF");
        $('#f28b-b').css("background","#FFFFFF");
        $("#f28desact").attr("id","f28");
        $("#f28b-adesact").attr("id","f28b-a");
        $("#f28b-bdesact").attr("id","f28b-b");

        
      } else {
        
        $("#i28").css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
        $('#diente28-a').css("background","url('Periodontograma/img/tabla2/implantes/periodontograma-dientes-arriba-tornillo-28.png')");
        $('#diente28-a').css("background-position","0 -2px");
        $('#diente28-a').css("background-repeat","no-repeat");
        $('#diente28b-a').css("background","url('Periodontograma/img/tabla4/implantes/periodontograma-dientes-arriba-tornillo-28b.png')");
        $('#diente28b-a').css("background-position","0 23px");
        $('#diente28b-a').css("background-repeat","no-repeat");
        $('#furca28-a').css("background","none");
        $('#furca28-b').css("background","none");
        $('#f28b-a').css("background","none");
        $('#f28b-b').css("background","none");
        $('#f28').css("background","none");
        $('#furca28').css("background","none");
        $("#f28").attr("id","f28desact");
        $("#f28b-a").attr("id","f28b-adesact");
        $("#f28b-b").attr("id","f28b-bdesact");

      }
    break;


















    case "i31b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente31-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-31.png')");
            $('#diente31-a').css("background-position","0 1px");
            $('#diente31-a').css("background-repeat","no-repeat");
            $('#diente31b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-31b.png')");
            $('#diente31b-a').css("background-position","0 19px");
            $('#diente31b-a').css("background-repeat","no-repeat");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#f31').css({"background":"#FFFFFF"});
            $('#diente31-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-31.png')");
            $('#diente31-a').css("background-position","0 1px");
            $('#diente31-a').css("background-repeat","no-repeat");
            $('#diente31b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-31b.png')");
            $('#diente31b-a').css("background-position","0 19px");
            $('#diente31b-a').css("background-repeat","no-repeat");

        }
        break;
      case "i32b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente32-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-32.png')");
            $('#diente32-a').css("background-position","0px 3px");
            $('#diente32-a').css("background-repeat","no-repeat");
            $('#diente32b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-32b.png')");
            $('#diente32b-a').css("background-position","0px 15px");
            $('#diente32b-a').css("background-repeat","no-repeat");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#f32').css({"background":"#FFFFFF"});
            $('#diente32-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-32.png')");
            $('#diente32-a').css("background-position","0 3px");
            $('#diente32-a').css("background-repeat","no-repeat");
            $('#diente32b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-32b.png')");
            $('#diente32b-a').css("background-position","0px 15px");
            $('#diente32b-a').css("background-repeat","no-repeat");

        }
        break;
      case "i33b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente33-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-33.png')");
            $('#diente33-a').css("background-position","0 7px");
            $('#diente33-a').css("background-repeat","no-repeat");
            $('#diente33b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-33b.png')");
            $('#diente33b-a').css("background-position","0 12px");
            $('#diente33b-a').css("background-repeat","no-repeat");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#f33').css({"background":"#FFFFFF"});
            $('#diente33-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-33.png')");
            $('#diente33-a').css("background-position","0 7px");
            $('#diente33-a').css("background-repeat","no-repeat");
            $('#diente33b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-33b.png')");
            $('#diente33b-a').css("background-position","0 12px");
            $('#diente33b-a').css("background-repeat","no-repeat");

        }
        break;

    case "i34b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente34-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-34.png')");
            $('#diente34-a').css("background-position","0 5px");
            $('#diente34-a').css("background-repeat","no-repeat");
            $('#diente34b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-34b.png')");
            $('#diente34b-a').css("background-repeat","no-repeat");
            $('#diente34b-a').css("background-position","0 13px");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#diente34-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-34.png')");
            $('#diente34-a').css("background-position","0 5px");
            $('#diente34-a').css("background-repeat","no-repeat");
            $('#diente34b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-34b.png')");
            $('#diente34b-a').css("background-repeat","no-repeat");
            $('#diente34b-a').css("background-position","0 13px");
      
        }
        break;
      case "i35b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente35-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-35.png')");
            $('#diente35-a').css("background-position","0 1px");
            $('#diente35-a').css("background-repeat","no-repeat");
            $('#diente35b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-35b.png')");
            $('#diente35b-a').css("background-position","0 20px");
            $('#diente35b-a').css("background-repeat","no-repeat");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#diente35-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-35.png')");
            $('#diente35-a').css("background-position","0 1px");
            $('#diente35-a').css("background-repeat","no-repeat");
            $('#diente35b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-35b.png')");
            $('#diente35b-a').css("background-position","0 20px");
            $('#diente35b-a').css("background-repeat","no-repeat");

        }
        break;
      case "i36b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente36-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-36.png')");
            $('#diente36-a').css("background-position","top");
            $('#diente36-a').css("background-repeat","no-repeat");
            $('#diente36b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-36b.png')");
            $('#diente36b-a').css("background-position","0 23px");
            $('#diente36b-a').css("background-repeat","no-repeat");
            $('#f36').css("background","#FFFFFF");
            $('#f36b').css("background","#FFFFFF");
            $("#f36desact").attr("id","f36");
            $("#f36bdesact").attr("id","f36b");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#diente36-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-36.png')");
            $('#diente36-a').css("background-position","top");
            $('#diente36-a').css("background-repeat","no-repeat");
            $('#diente36b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-36b.png')");
            $('#diente36b-a').css("background-position","0 23px");
            $('#diente36b-a').css("background-repeat","no-repeat");
            $('#furca36').css("background","none");
            $('#furca36b').css("background","none");
            $('#f36').css("background","none");
            $('#f36b').css("background","none");
            $("#f36").attr("id","f36desact");
            $("#f36b").attr("id","f36bdesact");

        }
        break;


    case "i37b":
        if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente37-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-37.png')");
            $('#diente37-a').css("background-repeat","no-repeat");
            $('#diente37-a').css("background-position"," 0px -4px");
            $('#diente37b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-37b.png')");
            $('#diente37b-a').css("background-repeat","no-repeat");
            $('#diente37b-a').css("background-position","0 21px");
            $('#f37').css("background","#FFFFFF");
            $('#f37b').css("background","#FFFFFF");
            $("#f37desact").attr("id","f37");
            $("#f37bdesact").attr("id","f37b");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#diente37-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-37.png')");
            $('#diente37-a').css("background-repeat","no-repeat");
            $('#diente37-a').css("background-position"," 0px -4px");
            $('#diente37b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-37b.png')");
            $('#diente37b-a').css("background-repeat","no-repeat");
            $('#diente37b-a').css("background-position","0 21px");
            $('#furca37').css("background","none");
            $('#furca37b').css("background","none");
            $('#f37').css("background","none");
            $('#f37b').css("background","none");
            $("#f37").attr("id","f37desact");
            $("#f37b").attr("id","f37bdesact");

        }
        break;
      case "i38b":
        if (valor == 0) {
      
      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
            $('#diente38-a').css("background","url('Periodontograma/img/tabla6/periodontograma-dientes-abajo-38.png')");
            $('#diente38-a').css("background-position","0 -3px");
            $('#diente38-a').css("background-repeat","no-repeat");
            $('#diente38b-a').css("background","url('Periodontograma/img/tabla8/periodontograma-dientes-abajo-38b.png')");
            $('#diente38b-a').css("background-position","0 24px");
            $('#diente38b-a').css("background-repeat","no-repeat");
            $('#f38').css("background","#FFFFFF");
            $('#f38b').css("background","#FFFFFF");
            $("#f38desact").attr("id","f38");
            $("#f38bdesact").attr("id","f38b");

            
        } else {
            
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
            $('#diente38-a').css("background","url('Periodontograma/img/tabla6/implantes/periodontograma-dientes-abajo-tornillo-38.png')");
            $('#diente38-a').css("background-position","0 -3px");
            $('#diente38-a').css("background-repeat","no-repeat");
            $('#diente38b-a').css("background","url('Periodontograma/img/tabla8/implantes/periodontograma-dientes-abajo-tornillo-38b.png')");
            $('#diente38b-a').css("background-position","0 24px");
            $('#diente38b-a').css("background-repeat","no-repeat");
            $('#furca38').css("background","none");
            $('#furca38b').css("background","none");
            $('#f38').css("background","none");
            $('#f38b').css("background","none");
            $("#f38").attr("id","f38desact");
            $("#f38b").attr("id","f38bdesact");

        }
        break;










    case "i48b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente48-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-48.png')");
      $('#diente48-a').css("background-position","0 -4px");
      $('#diente48-a').css("background-repeat","no-repeat");
      
      $('#diente48b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-48b.png')");
      $('#diente48b-a').css("background-position","0 24px");
      $('#diente48b-a').css("background-repeat","no-repeat");
      
      $('#f48').css("background","#FFFFFF");
      $('#f48b').css("background","#FFFFFF");
      
      $("#f48desact").attr("id","f48");
      $("#f48bdesact").attr("id","f48b");

      
      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#f48').css({"background":"#FFFFFF"});
      $('#diente48-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-48.png')");
      $('#diente48-a').css("background-position","0 -4px");
      $('#diente48-a').css("background-repeat","no-repeat");
      
      $('#diente48b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-48b.png')");
      $('#diente48b-a').css("background-position","0 24px");
      $('#diente48b-a').css("background-repeat","no-repeat");
      
      $('#furca48').css("background","none");
      $('#furca48b').css("background","none");
      $('#f48').css("background","none");
      $('#f48b').css("background","none");
      
      $("#f48").attr("id","f48desact");
      $("#f48b").attr("id","f48bdesact");
      
    }

    break;

    case "i47b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente47-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-47.png')");
      $('#diente47-a').css("background-position","0 4px");
      $('#diente47-a').css("background-repeat","no-repeat");
      
      $('#diente47b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-47b.png')");
      $('#diente47b-a').css("background-position","0 22px");
      $('#diente47b-a').css("background-repeat","no-repeat");
      
      $('#f47').css("background","#FFFFFF");
      $('#f47b').css("background","#FFFFFF");
      
      $("#f47desact").attr("id","f47");
      $("#f47bdesact").attr("id","f47b");

      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#f47').css({"background":"#FFFFFF"});
      $('#diente47-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-47.png')");
      $('#diente47-a').css("background-position","0 4px");
      $('#diente47-a').css("background-repeat","no-repeat");
      
      $('#diente47b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-47b.png')");
      $('#diente47b-a').css("background-position","0 22px");
      $('#diente47b-a').css("background-repeat","no-repeat");
      
      $('#furca47').css("background","none");
      $('#furca47b').css("background","none");
      $('#f47').css("background","none");
      $('#f47b').css("background","none");
      
      $("#f47").attr("id","f47desact");
      $("#f47b").attr("id","f47bdesact");

    }
    
    break;

    case "i46b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente46-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-46.png')");
      $('#diente46-a').css("background-position","0 -1px");
      $('#diente46-a').css("background-repeat","no-repeat");
      
      $('#diente46b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-46b.png')");
      $('#diente46b-a').css("background-position","0 23px");
      $('#diente46b-a').css("background-repeat","no-repeat");
      
      $('#f46').css("background","#FFFFFF");
      $('#f46b').css("background","#FFFFFF");

      
      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#f46').css({"background":"#FFFFFF"});
      $('#diente46-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-46.png')");
      $('#diente46-a').css("background-position","0 -1px");
      $('#diente46-a').css("background-repeat","no-repeat");
      
      $('#diente46b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-46b.png')");
      $('#diente46b-a').css("background-position","0 23px");
      $('#diente46b-a').css("background-repeat","no-repeat");
      
      $('#furca46').css("background","none");
      $('#furca46b').css("background","none");
      $('#f46').css("background","none");
      $('#f46b').css("background","none");

    }
    
    break;


    case "i45b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente45-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-45.png')");
      $('#diente45-a').css("background-position","0 1px");
      $('#diente45-a').css("background-repeat","no-repeat");
      
      $('#diente45b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-45b.png')");
      $('#diente45b-a').css("background-position","0 20px");
      $('#diente45b-a').css("background-repeat","no-repeat");

      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#diente45-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-45.png')");
      $('#diente45-a').css("background-position","0 1px");
      $('#diente45-a').css("background-repeat","no-repeat");
      
      $('#diente45b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-45b.png')");
      $('#diente45b-a').css("background-position","0 20px");
      $('#diente45b-a').css("background-repeat","no-repeat");

    }
    
    break;

    case "i44b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente44-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-44.png')");
      $('#diente44-a').css("background-position","0 3px");
      $('#diente44-a').css("background-repeat","no-repeat");
      
      $('#diente44b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-44b.png')");
      $('#diente44b-a').css("background-position","0 13px");
      $('#diente44b-a').css("background-repeat","no-repeat");
      
      $('#f44b-a').css("background","#FFFFFF");
      $('#f44b-b').css("background","#FFFFFF");

      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#diente44-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-44.png')");
      $('#diente44-a').css("background-position","0 3px");
      $('#diente44-a').css("background-repeat","no-repeat");
      
      $('#diente44b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-44b.png')");
      $('#diente44b-a').css("background-position","0 13px");
      $('#diente44b-a').css("background-repeat","no-repeat");
      
      $('#furca44-a').css("background","none");
      $('#furca44-b').css("background","none");
      $('#f44b-a').css("background","none");
      $('#f44b-b').css("background","none");

    }
    
    break;


    case "i43b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente43-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-43.png')");
      $('#diente43-a').css("background-position","0 7px");
      $('#diente43-a').css("background-repeat","no-repeat");
      
      $('#diente43b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-43b.png')");
      $('#diente43b-a').css("background-position","0 12x");
      $('#diente43b-a').css("background-repeat","no-repeat");

      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#diente43-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-43.png')");
      $('#diente43-a').css("background-position","0 7px");
      $('#diente43-a').css("background-repeat","no-repeat");
      
      $('#diente43b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-43b.png')");
      $('#diente43b-a').css("background-position","0 12px");
      $('#diente43b-a').css("background-repeat","no-repeat");

    }
    
    break;

    case "i42b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente42-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-42.png')");
      $('#diente42-a').css("background-position","0 3px");
      $('#diente42-a').css("background-repeat","no-repeat");
      
      $('#diente42b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-42b.png')");
      $('#diente42b-a').css("background-position","0 15px");
      $('#diente42b-a').css("background-repeat","no-repeat");

      
    } else {

      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#diente42-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-42.png')");
      $('#diente42-a').css("background-position","0 3px");
      $('#diente42-a').css("background-repeat","no-repeat");
      
      $('#diente42b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-42b.png')");
      $('#diente42b-a').css("background-position","0 15px");
      $('#diente42b-a').css("background-repeat","no-repeat");
      
    }
    
    break;



    case "i41b":
    if (valor == 0) {

      $(this).css({"background":"url('Periodontograma/img/periodontograma-oblicuas.png') repeat-x center"});
      $('#diente41-a').css("background","url('Periodontograma/img/tabla5/periodontograma-dientes-abajo-41.png')");
      $('#diente41-a').css("background-position","0 1px");
      $('#diente41-a').css("background-repeat","no-repeat");
      
      $('#diente41b-a').css("background","url('Periodontograma/img/tabla7/periodontograma-dientes-abajo-41b.png')");
      $('#diente41b-a').css("background-position","0 19px");
      $('#diente41b-a').css("background-repeat","no-repeat");

      
    } else {
      
      $(this).css({"background":"#FFFFFF url('Periodontograma/img/cuadrado.png') no-repeat center"});
      $('#diente41-a').css("background","url('Periodontograma/img/tabla5/implantes/periodontograma-dientes-abajo-tornillo-41.png')");
      $('#diente41-a').css("background-position","0 1px");
      $('#diente41-a').css("background-repeat","no-repeat");
      
      $('#diente41b-a').css("background","url('Periodontograma/img/tabla7/implantes/periodontograma-dientes-abajo-tornillo-41b.png')");
      $('#diente41b-a').css("background-position","0 19px");
      $('#diente41b-a').css("background-repeat","no-repeat");

    }
    
    break;





    




    }


    
  }


  function ActualizarFurca(campo, tipo) {
    var name = $(campo).attr('id');
    var valor = $(campo).val();

    console.log(tipo);

    switch (tipo) {
        case "f18":
            if (valor == 1) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
                $('#i18').css({"background":"#FFFFFF"});
                $('#furca18').css("background","url('Periodontograma/img/vacio.png')");
            } else if(valor == 2) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
                $('#furca18').css("background","url('Periodontograma/img/mediolleno.png')");
            } else if(valor == 3) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
                $('#furca18').css("background","url('Periodontograma/img/lleno.png')");
            } else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca18').css("background","none");

      }
            break;

        case "f17":
            if (valor == 1) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
                $('#i17').css({"background":"#FFFFFF"});
                $('#furca17').css("background","url('Periodontograma/img/vacio.png')");
            } else if(valor == 2) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
                $('#furca17').css("background","url('Periodontograma/img/mediolleno.png')");
            } else if(valor == 3) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
                $('#furca17').css("background","url('Periodontograma/img/lleno.png')");
            } else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca17').css("background","none");

      }
            break;

        case "f16":
            if (valor == 1) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
                $('#i16').css({"background":"#FFFFFF"});
                $('#furca16').css("background","url('Periodontograma/img/vacio.png')");
            } else if(valor == 2) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
                $('#furca16').css("background","url('Periodontograma/img/mediolleno.png')");
            } else if(valor == 3) {
                $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
                $('#furca16').css("background","url('Periodontograma/img/lleno.png')");
      } else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca16').css("background","none");

      }
            break;
    
    case "f26":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i26').css({"background":"#FFFFFF"});
        $('#furca26').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca26').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca26').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca26').css("background","none");
      }
      break;

    case "f27":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i27').css({"background":"#FFFFFF"});
        $('#furca27').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca27').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca27').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca27').css("background","none");
      }
      break;

    case "f28":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i28').css({"background":"#FFFFFF"});
        $('#furca28').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca28').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca28').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca28').css("background","none");
      }
      break;











      case "f48":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i48').css({"background":"#FFFFFF"});
        $('#furca48').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca48').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca48').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca48').css("background","none");
      }
      break;

      case "f47":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i47').css({"background":"#FFFFFF"});
        $('#furca47').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca47').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca47').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca47').css("background","none");
      }
      break;

      case "f46":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i46').css({"background":"#FFFFFF"});
        $('#furca46').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca46').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca46').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca46').css("background","none");
      }
      break;


      


      case "f38":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i38').css({"background":"#FFFFFF"});
        $('#furca38').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca38').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca38').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca38').css("background","none");
      }
      break;

      case "f37":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i37').css({"background":"#FFFFFF"});
        $('#furca37').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca37').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca37').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca37').css("background","none");
      }
      break;

      case "f36":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i36').css({"background":"#FFFFFF"});
        $('#furca36').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca36').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca36').css("background","url('Periodontograma/img/lleno.png')"); 
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca36').css("background","none");
      }
      break;




      case "f48b":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i48b').css({"background":"#FFFFFF"});
        $('#furca48b').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca48b').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca48b').css("background","url('Periodontograma/img/lleno.png')");  
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca48b').css("background","none");
      }
      break;

      case "f47b":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i47b').css({"background":"#FFFFFF"});
        $('#furca47b').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca47b').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca47b').css("background","url('Periodontograma/img/lleno.png')");  
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca47b').css("background","none");
      }
      break;

      case "f46b":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i46b').css({"background":"#FFFFFF"});
        $('#furca46b').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca46b').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca46b').css("background","url('Periodontograma/img/lleno.png')");  
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca46b').css("background","none");
      }
      break;


      


      case "f38b":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i38b').css({"background":"#FFFFFF"});
        $('#furca38b').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca38b').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca38b').css("background","url('Periodontograma/img/lleno.png')");  
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca38b').css("background","none");
      }
      break;

      case "f37b":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i37b').css({"background":"#FFFFFF"});
        $('#furca37b').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca37b').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca37b').css("background","url('Periodontograma/img/lleno.png')");  
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca37b').css("background","none");
      }
      break;

      case "f36b":
      if (valor == 1) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
        $('#i36b').css({"background":"#FFFFFF"});
        $('#furca36b').css("background","url('Periodontograma/img/vacio.png')");
      }
      else if (valor == 2) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
        $('#furca36b').css("background","url('Periodontograma/img/mediolleno.png')");
      }
      else if (valor == 3) {
        $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
        $('#furca36b').css("background","url('Periodontograma/img/lleno.png')");  
      }
      else if (valor == 0) {
        $(campo).css({"background":"#FFFFFF"});
        $('#furca36b').css("background","none");
      }
      break;

      case "f18a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca18-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca18-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca18-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca18-a').css("background","none");
        }
      break;
      
      case "f18b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca18-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca18-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca18-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca18-b').css("background","none");
        }
      break;


      case "f17a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca17-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca17-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca17-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca17-a').css("background","none");
        }
      break;
      
      case "f17b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca17-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca17-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca17-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca17-b').css("background","none");
        }
      break;

      case "f16a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca16-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca16-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca16-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca16-a').css("background","none");
        }
      break;

      case "f16b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca16-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca16-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca16-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca16-b').css("background","none");
        }
      break;

      case "f14a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca14-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca14-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca14-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca14-a').css("background","none");
        }
      break;
      
      case "f14b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca14-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca14-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca14-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca14-b').css("background","none");
        }
      break;






      case "f24a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca24-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca24-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca24-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca24-a').css("background","none");
        }
      break;

      case "f24b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca24-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca24-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca24-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca24-b').css("background","none");
        }
      break;

      case "f26a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca26-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca26-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca26-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca26-a').css("background","none");
        }
      break;

      case "f26b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca26-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca26-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca26-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca26-b').css("background","none");
        }
      break;

      case "f27a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca27-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca27-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca27-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca27-a').css("background","none");
        }
      break;

      case "f27b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca27-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca27-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca27-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca27-b').css("background","none");
        }
      break;



      case "f28a":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca28-a').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca28-a').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca28-a').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca28-a').css("background","none");
        }
      break;

      case "f28b":
        if (valor == 1) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/vacio.png') no-repeat center"});
          $('#furca28-b').css("background","url('Periodontograma/img/vacio.png')");
        } else if (valor == 2) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/mediolleno.png') no-repeat center"});
          $('#furca28-b').css("background","url('Periodontograma/img/mediolleno.png')");
        } else if (valor == 3) {
          $(campo).css({"background":"#FFFFFF url('Periodontograma/img/lleno.png') no-repeat center"});
          $('#furca28-b').css("background","url('Periodontograma/img/lleno.png')");
        } else if (valor == 0) {
          $(campo).css({"background":"#FFFFFF"});
          $('#furca28-b').css("background","none");
        }
      break;



      

    

    }
}

</script>

<script>
  function cambiarColor(input) {
    //var selector = document.getElementById("selector");
    var selectedOption = input.options[input.selectedIndex];
    var dataActualValor = input.getAttribute('data-actual-valor');
    var valor;

    if (dataActualValor !== null) {
      valor = parseInt(dataActualValor);
    } else {
      valor = 0;
    }

    console.log(dataActualValor);
    if (selectedOption.value == "0") {
      input.className = "opcion-blanco";

      if (valor == 1) {
      totalPlaca--;
      getPlaca();
      input.setAttribute('data-actual-valor', '0');
      }

    } else if (selectedOption.value == "1") {
      input.className = "opcion-azul";
      if (valor == 0) {
      totalPlaca++;
      getPlaca();
      input.setAttribute('data-actual-valor', '1');
      }
    }
  }

  function cambiarColorSangradoSupuracion(input){
    var selectedOption = input.options[input.selectedIndex];
    var dataActualValor = parseInt(input.getAttribute('data-actual-valor'));

    if (selectedOption.value == "0") {
      input.className = "opcion-blanco";

      if (dataActualValor == 1) {
              totalSangrado--;
        getSangrado();
        input.setAttribute('data-actual-valor', '0');
          }
      
      //////////////////

    } else if (selectedOption.value == "1") {
      input.className = "opcion-rojo";
      
      if (dataActualValor == 0) {
              totalSangrado++;
        getSangrado();
        input.setAttribute('data-actual-valor', '1');
          }

      

    } else if (selectedOption.value == "2") {
      input.className = "opcion-rojo-amarillo";
      
      if (dataActualValor == 0) {
              totalSangrado++;
        getSangrado();
        input.setAttribute('data-actual-valor', '1');
          }
      
    }
  }
</script>
<script> 
  function EjecutarEstado(campo) {
    var id = campo.id.replace('_estado','');
    console.log(id);

    var elemento = document.getElementById(id);
    if (elemento) {
      elemento.click();
    } else {
      console.error("Elemento con ID " + id + " no encontrado");
    }
  }
  document.getElementsByTagName("body")[0].classList.add("sidebar-collapse");
</script>
<?php 
include 'footer.php';
?>
<script>
function validarGingival(input) {
    if (input.value < -9) {
        input.value = -9;
    } else if (input.value > 9) {
        input.value = 9;
    }
}
</script>