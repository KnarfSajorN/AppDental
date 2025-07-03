<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
    $usuarioId = $_GET['usuarioId'];
    $ID = $_SESSION['ID'];

	$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

	$queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");
	$nrowl=mysqli_num_rows($queryList);
	while($rowMotorizado=mysqli_fetch_array($queryList))
	{
	    $usuario_id=$rowMotorizado['usuario_id'];
	    $nombre_cliente=$rowMotorizado['nombre_cliente'];
	    $celular_cliente=$rowMotorizado['celular_cliente'];
	    $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
	    $correo_cliente=$rowMotorizado['correo_cliente'];
	    $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
	    $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
	    $tipo_cliente=$rowMotorizado['tipo_cliente'];
	    $fechar=$rowMotorizado['fechar'];
	    $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
	    $activo=$rowMotorizado['activo'];
	    $genero=$rowMotorizado['genero'];
	    $direccion_cliente=$rowMotorizado['direccion_cliente'];
	    $telefono_cliente=$rowMotorizado['telefono_cliente'];
	    $edad_cliente=$rowMotorizado['edad_cliente'];
	    $profesion_cliente=$rowMotorizado['profesion_cliente'];
	    $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
	    $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
	    $antecedentes     =$rowMotorizado['antecedentes'];
	    $fotoperfil       =$rowMotorizado['fotoperfil'];
	    $tiposSangre      =$rowMotorizado['tiposSangre'];
	    $dis     		  =$rowMotorizado['dis'];
	    $tipodiscapacidad      =$rowMotorizado['tipodiscapacidad'];
	    $etnia            =$rowMotorizado['etnia'];
	    $esDonante        =$rowMotorizado['esDonante'];
	    $tomaMedicamento  =$rowMotorizado['tomaMedicamento'];

	    $fechaNacimiento  =$rowMotorizado['fechaNacimiento'];

	    $entidadSalud     =$rowMotorizado['entidadSalud'];
	    $seguro           =$rowMotorizado['seguro'];

	    $nota           =$rowMotorizado['nota'];
	    $enfermedadesPequeno           =$rowMotorizado['enfermedadesPequeno'];
	    $alergias           =$rowMotorizado['alergias'];


	    $peso           =$rowMotorizado['peso'];
	    $altura           =$rowMotorizado['altura'];
	    $imc           =$rowMotorizado['imc'];
	    $ComposicionCorporal           =$rowMotorizado['ComposicionCorporal'];

        // -----------------------------------------------------------------------

        $ap1            = $rowMotorizado['ap1'];
        $ap2            = $rowMotorizado['ap2'];
        $ap3            = $rowMotorizado['ap3'];
        $ap4            = $rowMotorizado['ap4'];
        $ap5            = $rowMotorizado['ap5'];
        $ap6            = $rowMotorizado['ap6'];
        $ap7            = $rowMotorizado['ap7'];
        $ap8            = $rowMotorizado['ap8'];
        $ap9            = $rowMotorizado['ap9'];

        $cirugiasCuales = $rowMotorizado['cirugiasCuales'];
        $cirugiasOtros  = $rowMotorizado['cirugiasOtros'];
        $whatsapp       = $rowMotorizado['whatsapp'];
        $tipoUsuario    = $rowMotorizado['tipoUsuario'];
        $estado         = $rowMotorizado['estado'];
        $ocupacion    = $rowMotorizado['ocupacion'];

    }

	$queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario=$ID");


	$nrowl=mysqli_num_rows($queryconfig);
	while($rowconfig=mysqli_fetch_array($queryconfig))
	{
	    $cie10 = $rowconfig['cie10'];
	    $pro1  = $rowconfig['pro1'];
	    $pro2  = $rowconfig['pro2'];
	}



        

?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Orden laboratorio, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
		<ol class="breadcrumb">
			<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
			<li><a href="#"> Laboratorio </a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="row">
			<div class="col-xs-12">

				<div class="box">
					<!-- /.box-header -->
					<div class="box-body">

						<div class="col-md-12">
							

							<div class="box box-solid">

								<!-- /.box-header -->
								<div class="box-body">
									<div class="box-group" id="accordion1">
										<!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
										<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
													<a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
														Datos personales
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse">
												<?php echo datosPacientes($clienteId);?>
											</div>
										</div>
									<form action="guardarOrdenesLaboratorio.php" method="POST" name="formularioguardarOrdenesLaboratorio">

								<!--			<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
															Datos de encabezado
														</a>
													</h4>
												</div>
												<div id="Entrevista" class="panel-collapse collapse">
													<div class="box-body">

																												
<div class="form-group col-md-4">
<div align="left">	INSTITUCIÓN DEL SISTEMA </div>
														
 <input type="text" class="form-control input-lg" id="temperatura" name="INSTITUCION">

</div>

<div class="form-group col-md-4">
<div align="left">	ORDEN </div>
														
 <input type="text" class="form-control input-lg" id="ORDEN" name="ORDEN">

</div>


<div class="form-group col-md-4">
<div align="left">	HISTORIA CLINICA </div>
														
 <input type="text" class="form-control input-lg" id="temperatura" name="HISTORIA">

</div>
<div class="form-group col-md-12">
<div align="left">	LOCALIZACIÓN </div>
	<div class="form-group col-md-4">													
 <input type="text" class="form-control input-lg" id="temperatura" name="PARROQUIA" placeholder="Parroquía">
</div>
 <div class="form-group col-md-4">
 <input type="text" class="form-control input-lg" id="temperatura" name="CANTON" placeholder="Cantón">
</div>
 <div class="form-group col-md-4">
 <input type="text" class="form-control input-lg" id="temperatura" name="PROVINCIA" placeholder="Provincia">
</div>

</div>

<div class="form-group col-md-4">
<div align="left">	SERVICIO SOLICITADO </div>
														
 <input type="text" class="form-control input-lg" id="temperatura" name="SERVICIO">

</div>

<div class="form-group col-md-4">
<div align="left">	SALA </div>
														
 <input type="text" class="form-control input-lg" id="temperatura" name="SALA">

</div>


<div class="form-group col-md-4">
<div align="left">	CAMA </div>
														
 <input type="text" class="form-control input-lg" id="temperatura" name="CAMA">

</div>

<div class="form-group col-md-4">
			<div align="left">	PRIORIDAD</div>
																		
  <select name="PRIORIDAD" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Urgente</option>
                <option>Normal</option>
                <option>Control</option>
                      </select>

</div>

<div class="form-group col-md-4">
<div align="left">	FECHA DE TOMA </div>
														
 <input type="date" class="form-control " id="temperatura" name="FTOMA">

</div>

                                                            </div>
              													</div>
												</div>
											</div>

											

											<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#labo">
														Laboratorios
														</a>
													</h4>
												</div>
											<div id="labo" class="panel-collapse collapse">
													<div class="box-body">  -->
	
<div class="row"  style="background: #A4A4A4">
<div class="form-group col-md-8" style="border:1">
<div align="left"><b>	1.HEMATOLOGÍA </b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>	2. UROÁNALISIS </b> </div>
</div>
</div>
														
 


<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>BIOMETRIA HEMATICA								

</h7><input type="checkbox"  name="ante1" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>SEDIMENTACION									

</h7><input type="checkbox"  name="ante2" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>GRUPO SANGUÍNEO Y
FACTOR RH							

</h7><input type="checkbox"  name="ante3" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>RETICULOCITOS									

</h7><input type="checkbox"  name="ante4" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>HEMATOZOARIO				
</h7><input type="checkbox"  name="ante5" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>HCG-B CUANTITATIVA					

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>






												</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>TIEMPO DE

PROTROMBINA (TP)						

</h7><input type="checkbox"  name="ante7" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>T. TROMBOPLASTINA

PARCIAL (TTP)
</h7><input type="checkbox"  name="ante8" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>COOMBS DIRECTO

</h7><input type="checkbox"  name="ante9" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>COOMBS INDIRECTO
</h7><input type="checkbox"  name="ante10" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>HEMOGLOBINA

GLICOSILADA (HBA1C)		
</h7><input type="checkbox"  name="ante11" value="SI" > 
															
															</div>



												</div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>ELEMENTAL Y MICROSCOPICO

</h7><input type="checkbox"  name="ante12" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>PROTEINURIA 24 HORAS
</h7><input type="checkbox"  name="ante13" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>MICROALBUMINURIA

</h7><input type="checkbox"  name="ante14" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>UROCULTIVO
</h7><input type="checkbox"  name="ante15" value="SI" > 
															
															</div>

</div>


	
<div class="row">
	<div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>1 A MARCADORES TUMORALES </b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>3.COPROLOGICO </b> </div>
</div>
<div class="form-group col-md-4">
<div align="left"></div>
</div>
</div> </div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>AFP

</h7><input type="checkbox"  name="ante16" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>CEA
</h7><input type="checkbox"  name="ante17" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>CA 19-9

</h7><input type="checkbox"  name="ante18" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CA 125
</h7><input type="checkbox"  name="ante19" value="SI" > 
															
															</div>

</div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>COPROPARASITORIO SIMPLE

</h7><input type="checkbox"  name="ante20" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>COPROPARASITORIO SIMPLE
</h7><input type="checkbox"  name="ante21" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>SANGRE OCULTA

</h7><input type="checkbox"  name="ante22" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>POLIMORFONUCLEARES
</h7><input type="checkbox"  name="ante23" value="SI" > 
															
															</div>
<div class="form-group col-md-12">

															<h7>ERRADICACION DE H. PYLORI
(ANTIGENO)
</h7><input type="checkbox"  name="ante24" value="SI" > 
															
															</div>
</div>


<div class="row">
	<div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>4 QUIMICA SANGUINEA</b> </div> 
</div>  
 <div class="form-group col-md-8">
<div align="left"> </div>
</div>

</div> </div>

<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>GLUCOSA EN AYUNAS

</h7><input type="checkbox"  name="ante25" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>GLUCOSA POST PRANDIAL
</h7><input type="checkbox"  name="ante26" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>BUN (NITROGENO UREICO)

</h7><input type="checkbox"  name="ante27" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CREATININA
</h7><input type="checkbox"  name="ante28" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>BILIRUBINA TOTAL
</h7><input type="checkbox"  name="ante29" value="SI" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>BILIRUBINA DIRECTA
</h7><input type="checkbox"  name="ante30" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>ACIDO URICO
</h7><input type="checkbox"  name="ante31" value="SI" > 
															
															</div>

																<div class="form-group col-md-12">

															<h7>PROTEINA TOTAL
</h7><input type="checkbox"  name="ante32" value="SI" > 
															
															</div>

</div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>ALBUMINA

</h7><input type="checkbox"  name="ante33" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>FERRITINA
</h7><input type="checkbox"  name="ante34" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>NA - K - CL

</h7><input type="checkbox"  name="ante35" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>CA IONICO
</h7><input type="checkbox"  name="ante36" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>TRANSAMINASA PIRUVICA
</h7><input type="checkbox"  name="ante37" value="SI" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>TRANSAMINASA OXALACETICA
(AST)
</h7><input type="checkbox"  name="ante38" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>FOSFATASA ALCALINA
</h7><input type="checkbox"  name="ante39" value="SI" > 
															
															</div>

																<div class="form-group col-md-12">

															<h7>GAMA GLUTIL TRANSPEPTIDASA
(GGT)
</h7><input type="checkbox"  name="ante40" value="SI" > 
															
															</div>

</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>COLESTEROL TOTAL

</h7><input type="checkbox"  name="ante41" value="SI" > 
															
															</div>



<div class="form-group col-md-12">

															<h7>COLESTEROL HDL
</h7><input type="checkbox"  name="ante42" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>COLESTEROL LDL

</h7><input type="checkbox"  name="ante43" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>TRIGLICERIDOS
</h7><input type="checkbox"  name="ante44" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>AMILASA
</h7><input type="checkbox"  name="ante45" value="SI" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>LIPASA

</h7><input type="checkbox"  name="ante46" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>LACTATO DESHIDROGENSA (LDH)
</h7><input type="checkbox"  name="ante47" value="SI" > 
															
															</div>

																<div class="form-group col-md-12">

															<h7>CITOMEGALOVIRUS IGM
(GGT)
</h7><input type="checkbox"  name="ante48" value="SI" > 
															
															</div>

</div>


<div class="row">
	<div class="form-group col-md-12" style="background: #A4A4A4">
<div class="form-group col-md-4">
<div align="left"><b>5 SEROLOGÍA</b> </div> 
</div>  
 <div class="form-group col-md-4">
<div align="left"><b>6 BACTERIOLOGÍA </b></div>
</div>

<div class="form-group col-md-4">
<div align="left"><b>7 OTROS </b></div>
</div>

</div> </div>
<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>VDRL

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>HIV
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>PCR SEMICUANTITATIVO

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>PSA TOTAL / LIBRE
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>ANTICUERPOS
ANTINUCLEARES (ANA)
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>

															<div class="form-group col-md-12">

															<h7>AC. ANTIPEROXIDASA

(ANTI-TPO)

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>HAV IGM
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>
</div>




<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>GRAM

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>ZIEHL
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>KOH

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>FRESCO
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>CULTIVO - ANTIBIOGRAMA
ANTINUCLEARES (ANA)
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>

</div>



<div class="form-group col-md-4">
<div class="form-group col-md-12">

															<h7>TSH

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>


<div class="form-group col-md-12">

															<h7>FT4
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div><div class="form-group col-md-12">

															<h7>CORONAVIRUS

</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>
															<div class="form-group col-md-12">

															<h7>PCR, VSG, RA TES ACIDO URICO BIOMETRIA
</h7><input type="checkbox"  name="ante6" value="SI" > 
															
															</div>
</div>




											




													<hr>
													<div class="col-sm-12">
														<div align="center">
															<label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
														</div>
													</div>

													<div class="col-sm-6">
														<div align="left">
															<label>Fecha </label>
														</div>
														<input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d')?>"   onChange="verDia();">
														<input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID']?>">
														<div id="div-results"></div>
													</div>

													<div class="col-sm-6">
														<div align="left">
															<label>Hora </label>
														</div>
														<input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
														<div id="div-resultsHora"></div>
													</div>

													<div class="col-sm-6">
														<div align="left">
															<label>Motivo consulta</label>
														</div>
														<input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
													</div>

													<div class="col-sm-6">
														<label>Especialista </label>
														<select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" ="">
														<option value="<?php echo $_SESSION['username']?>" selected="selected"><?php echo $_SESSION['username']?> </option>
                                                        <?php
                                                        usuariosAselect($ID);

                                                        ?>
														</select>

													</div>

													<div class="col-sm-6">

														<br>
														<br>
														<label>
															<input type="radio" name="P" value="0" class="flat-red" >
															<i class="fa fa-user"></i>  Presencial

															<input type="radio" name="P" value="1"  class="flat-red"  >
															<i class="fa fa-video-camera"></i>   Virtual
														</label>
													</div>

													<input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
													<input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
													<input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
													<input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
													<input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
													<input  type="hidden" name="receta"  value="<?php echo $idR?>">
													<input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">

													<div align="center">
														<br>
														<br>
														<br>
														<div class="col-sm-12">
															<br>
															<br>
															<center><button type="submit" class="btn btn-block btn-primary btn-sm"> <h2> <strong>  G u a r d a r  </strong> </h2> </button></center>

														</div>
													</div>

													<input type="hidden"  name="tipo_cliente"   valur="1">
												</div>

											</div>

										</form>

									</div>

								</div>

							</div>

						</div>

					</div>

				</div>

			</div>

		</div>

	</section>

</div>


<?php include("footer.php")?>
<script src="apiVoz.js"></script>

<script type="text/javascript">





     
function calculardosis(){
  m1 = document.getElementById("frecuencia").value;
  m2 = document.getElementById("administracion").value;
  m3 = document.getElementById("dias").value;

if (m2=="Horas") 
{
 

r= 24/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

if (m2=="Minutos") 
{
 

r= 1440/m1;  

      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Dias") 
{
 

r= 1/m1;  

      

  document.getElementById("dosisdia").value = r;


 }


if (m2=="Semana") 
{
 
a= 7*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Mes") 
{
 
a= 30*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }

 if (m2=="Ano") 
{
 
a= 365*m1;
r= 1/a; 
      

  document.getElementById("dosisdia").value = r;


 }
 

  if (m2=="Unica") 
{
 


r= "&uacutenica Dosis";
      

  document.getElementById("dosisdia").value = r;


 }

 rt=r*m3;
document.getElementById("total").value = rt;

 
   }
       
 
    function agergarItem(){
        // estas son las variables que enviamos
        var codigoProd = $("#codigoProd").val();

 var dosis = $("#dosis").val();
 var posologia = $("#posologia").val();
 var frecuencia = $("#frecuencia").val();
 var administracion= $("#administracion").val();
 var dosisdia= $("#dosisdia").val();
 var dias= $("#dias").val();
 var via= $("#via").val();
        var total = $("#total").val();
        var nota = $("#nota").val(); 
        var usuario_id = $("#id_usuario").val();
        var idcliente = $("#idcliente").val();
        var idReceta = $("#idReceta").val();

        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "ajax_agregarItemrecetario.php",
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };


             

            $ID_Usuario  =  $_SESSION['ID'];
      function eliminarItem()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente },
            success: function(response) {
                $('#div-results').html(response);
// aqui enviamos el mensaje por medio de un arreglo                
            }
        });
    };

    function listaItem(){
        // estas son las variables que enviamos
        var usuario_id = $("#usuario_id").val();
        // aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "listaItem.php",
            data: {usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     
                      
            }
        });
    };
    window.onload=listaItem;   
 


















    function verDia(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidad.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-results').html(response);

            }
        });
    };

    function verHora(){
// estas son las variables que enviamos

        var fecha = $("#fecha").val();
        var Hora = $("#Hora").val();
        var usuario_id = $("#usuario_id").val();

// aqui enviamos el mensaje por medio de un arreglo

        $.ajax({
            type: "POST",
            url: "disponibilidadHora.php",
            data: {fecha:fecha, Hora:Hora, usuario_id:usuario_id},
            success: function(response) {
                $('#div-resultsHora').html(response);

            }
        });
    };

    function calcularimc()
    {



        m1 = document.getElementById("peso").value;
        m2 = document.getElementById("altura").value;

        r = m1/((m2/100)*(m2/100));



        document.getElementById("imc").value = r.toFixed(2);


        if (r.toFixed(2) < 16)

            ComposicionCorporal = 'Infrapeso: Delgadez Severa';
        else if
        (r.toFixed(2) > 16 &  r.toFixed(2) < 16.99)

            ComposicionCorporal = 'Infrapeso: Delgadez moderada';
        else if
        (r.toFixed(2) > 17 & r.toFixed(2) < 18.49)

            ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
        else if
        (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)

            ComposicionCorporal = 'Peso Normal';

        else if
        (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)

            ComposicionCorporal = 'Sobrepeso';

        else if
        (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99)

            ComposicionCorporal = 'Obeso: Tipo I';

        else if
        (r.toFixed(2) > 35.00 & r.toFixed(2) < 40)

            ComposicionCorporal = 'Obeso: Tipo II';

        else if
        (r.toFixed(2) > 40.00)

            ComposicionCorporal = 'Obeso: Tipo III';




        document.getElementById("ComposicionCorporal").value = ComposicionCorporal;
    }

	function calcularprematuriedad(){
		try {
			var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
			var	b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
			document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
		} catch (e) {
  		}
	}
	function calcularEdadCorregida(){
		try {
			var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
			var	b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
			document.formularioActualizarcliente.edadCorregida.value = b - a;
		} catch (e) {
  		}
	}
</script>
 

