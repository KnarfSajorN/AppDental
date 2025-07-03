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

    }

	$queryconfig=mysqli_query($conn3,"SELECT * FROM  config where ID=$ID");
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
<div class="content-wrapper p-3">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<h1>Consulta Nutrición, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
		<ol class="breadcrumb">
			<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
			<li><a href="#"> Consulta Nutrición</a></li>
		</ol>
	</section>
	<!-- Main content -->
	<section class="content">
		<div class="">
			<div class="col-xs-12">

				<div class="">
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
                                       Datos Personales
                                       </a>
                                     </h4>
                                      </div>
                                 <div id="collapseOne" class="panel-collapse collapse">
                                  <?php echo datosPacientes($clienteId); ?>
                                </div>
                                 </div>
							<form action="HN_Guardar_Nutricion" method="POST" name="formularioActualizarcliente"  enctype="multipart/form-data" id="FormularioHistoriaClinica">
										


											<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
															Entrevista Inicial
														</a>
													</h4>
												</div>
												<div id="Entrevista" class="panel-collapse collapse">
													<div class="box-body row">

														<div class="form-group col-md-12">
															<div align="left"><h4>Motivo Consulta</h4>
															</div></div>
                        <div class="col-md-6">
                            <div class="form-group">
                            <label class="control-label">¿Quién Remite?</label>
                            <input type="text" name="remite" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label class="control-label">Finalidad de la consulta</label><i class="fa-solid fa-gear" style="color:#0990E8" data-toggle="modal" data-target="#exampleModal"></i>
                            <br>
                            <select name="finalidadConsulta" id="finalidadConsulta" class="form-control select2" style="width:100%">
                              <option value=""></option>
                              <!-- SE CARGAN LAS OPCIONES A PARTIR DE LA FUNCION  cargarFinalidadConsulta-->
                            </select>
                        </div>


                  
<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Objetivo de la Consulta</label>


															<textarea  id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Objetivo de la Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
														</div></div>

													
              <div class="form-group col-md-12">
                <div align="left"> <label>Enfermedad Actual</label></div>
            

              <textarea id="enfermedad" name="enfermedad"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

<!--iframe id="inlineFrameExample"
frameBorder="0"
width="100%"
height="300"
src="https://medicalsoftplus.com/co118/test3/speechRecognition.php">
</iframe-->
             <!--

                <textarea id="enfermedadActual" name="enfermedadActual"  class="textarea" placeholder="Enfermedad Actual" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

  <input type="text" name="enfermedadActual"  class="form-control input-lg" id="enfermedadActual"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> -->


                        <!-- Button trigger modal -->
                        <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Launch demo modal
                        </button> -->

                        <!-- MODAL PARA AGREGAR UNA NUIEVA FINALIDAD DE CONSULTA -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Agregar Finalidad de consulta</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <label for="">Finalidad de la consulta</label>
                                <input type="text" id="nFinalidadConsulta" class="form-control">
                                <label for="">Codigo de consulta</label>
                                <input type="text" id="nCodigoConsulta" class="form-control">
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="guardarFinalidadConsulta()">Guardar</button>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- MODAL PARA AGREGAR UNA NUIEVA FINALIDAD DE CONSULTA -->




                        <script>
                          function cargarFinalidadConsulta(tipo) {
                            $.ajax({
                                type: "POST", 
                                url: "Ajax_Finalidad_Consulta.php", 
                                data: {
                                  tipo: tipo
                                },
                                success: function(response) {
                                    $('#finalidadConsulta').html(response);
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    // Manejar los errores de la solicitud
                                    console.error("Error en la solicitud AJAX: " + textStatus, errorThrown);
                                }
                            });
                          }

                          function guardarFinalidadConsulta() {
                            var nFinalidadConsulta = $('#nFinalidadConsulta').val();
                            var nCodigoConsulta = $('#nCodigoConsulta').val(); 
                            $.ajax({
                                type: "POST", 
                                url: "Ajax_Finalidad_Consulta.php", 
                                data: {
                                  tipo: 'Guardar',
                                  nFinalidadConsulta: nFinalidadConsulta,
                                  nCodigoConsulta: nCodigoConsulta
                                },
                                success: function(response) {
                                  cargarFinalidadConsulta('Consultar');
                                },
                                error: function(jqXHR, textStatus, errorThrown) {
                                    // Manejar los errores de la solicitud
                                    console.error("Error en la solicitud AJAX: " + textStatus, errorThrown);
                                }
                            });
                          }

                          setTimeout(() => {
                            cargarFinalidadConsulta('Consultar')
                          }, 1000);
                          


                        </script>



              </div></div></div></div>


                          <!-- =========== PORBLEMAS GASTROINTESTINALES =================== -->

                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#problemasGastrointestinales">
                            Problemas Gastrointestinales
                            </a>
                          </h4>
                        </div>
                        <div id="problemasGastrointestinales" class="panel-collapse collapse">
                          <div class="box-body row">
                            <div class="form-group col-md-12">

                              <!-- <h5>Problemas Gastrointestinales</h5> -->
                              <div class="form-group col-md-12 row">
                                <div class="col-md-6">
                                <label for="">Deglucion</label>
                                <input class="form-control"  type="text" name="ArrayGI[Deglucion]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Diarrea</label>
                                <input class="form-control"  type="text" name="ArrayGI[Diarrea]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Estreñimiento</label>
                                <input class="form-control"  type="text" name="ArrayGI[Estreñimiento]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Flatulencia</label>
                                <input class="form-control"  type="text" name="ArrayGI[Flatulencia]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Masticacion</label>
                                <input class="form-control"  type="text" name="ArrayGI[Masticacion]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Reflujo Gastrointestinal</label>
                                <input class="form-control"  type="text" name="ArrayGI[Reflujo Gastrointestinal]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Vomito</label>
                                <input  class="form-control" type="text" name="ArrayGI[Vomito]" id="">
                                </div>

                                <div class="col-md-6">
                                <label for="">Otros</label>
                                <textarea  class="form-control" name="ArrayGI[Otros]" id=""></textarea>
                                </div>
                            </div>
                          </div>
                        </div>
                      </div>
                        </div>


 												  <!-- ====|=|=|=|=|=== PORBLEMAS GASTROINTESTINALES ==|=|=|=|=|=|=|=========== -->
 <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Sistemas">
                              Revisión por Sistemas
                            </a>
                          </h4>
                        </div>
                        <div id="Sistemas" class="panel-collapse collapse">
                          <div class="box-body row">

														

 
              <div class="form-group col-md-12">
                <div align="left"> <label>Revisión por Sistemas</label></div>
                  <textarea id="notasadicionales" name="notasadicionales"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            
              
              </div></div></div></div>

									<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentes">
															Antecedentes
														</a>
													</h4>
												</div>
												<div id="Antecedentes" class="panel-collapse collapse">
													<div class="box-body row">
														<div class="form-group col-md-12">
                                                            <h5>Antecedentes Personales</h5>
                                                            <textarea name="Antecedentes_personales" class="ejemplo" placeholder="Antecedentes Personales" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                        </div>

                                                        <h5>Antecedentes Familiares</h5>
                                                        <div class="form-group col-md-12 row">
                                                            
                                                            <div class="col-md-6">
                                                            <label for="">Cancer</label>
                                                            <input class="form-control"  type="text" name="ArrayAF[Cancer]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Cardiovasculares</label>
                                                            <input class="form-control"  type="text" name="ArrayAF[Cardiovasculares]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Diabetes</label>
                                                            <input class="form-control"  type="text" name="ArrayAF[Diabetes]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Hipercolesterolemia</label>
                                                            <input class="form-control"  type="text" name="ArrayAF[Hipercolesterolemia]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Hipertension</label>
                                                            <input class="form-control"  type="text" name="ArrayAF[Hipertension]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Hipertrigliceridemia</label>
                                                            <input class="form-control"  type="text" name="ArrayAF[Hipertrigliceridemia]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Obesidad</label>
                                                            <input  class="form-control" type="text" name="ArrayAF[Obesidad]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Otros</label>
                                                            <textarea  class="form-control" name="ArrayAF[Otros]" id=""></textarea>
                                                            </div>
                                                            <!-- <textarea name="Antecedentes_Familiares" class="ejemplo" placeholder="Antecedentes Familiares" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea> -->
                                                        </div>


                                                        
                                                         

                                                        <h5>Antecedentes Nutricionales</h5>
                                                        <div class="form-group col-md-12 row">
                                                            
                                                            <div class="col-md-6">
                                                            <label for="">Actividad Fisica</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Actividad Fisica]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Alimentos que no tolera</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Alimentos que no tolera]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Alimentos que perfiere</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Alimentos que perfiere]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Alimentos que rechaza</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Alimentos que rechaza]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Calidad de apetito</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Calidad de apetito]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Estado dental</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Estado dental]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Lugar habitual de comida</label>
                                                            <input  class="form-control" type="text" name="ArrayAN[Lugar habitual de comida]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Quien prepara los alimentos</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Quien prepara los alimentos]" id="">
                                                            </div>

                                                            <div class="col-md-6">
                                                            <label for="">Suplementos nutricionales</label>
                                                            <input class="form-control"  type="text" name="ArrayAN[Suplementos nutricionales]" id="">
                                                            </div>
                                                            <div class="col-md-6">
                                                            <label for="">Otros</label>
                                                            <textarea  class="form-control" name="ArrayAN[Otros]" id=""></textarea>
                                                            </div>

                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <h5>Antecedentes Ginecológicos</h5>
                                                            <textarea name="Antecedentes_Ginecologicos" class="ejemplo" placeholder="Antecedentes Ginecológicos" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                        </div>


</div>
											</div>  </div>

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#parametros">
															Parámetros Bioquímicos
														</a>
													</h4>
												</div>
												<div id="parametros" class="panel-collapse collapse">
													<div class="box-body row">
<div class="row">

<div class="col-md-6">
														<div class="form-group" align="left">
                                  <label class="control-label" >¿Trae? &nbsp;  Si &nbsp; <input type="radio" value="SI" name="TRAE" class=""> &nbsp; No &nbsp;<input type="radio" name="TRAE" value="NO" class=""></label>
                                </div>


						</div>	



<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Fecha</label>
                          <input type="date" name="fecha1" class="form-control">
                        </div>
                      </div>

                      

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hb</label>
                          <input type="text" name="hb" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Htcto</label>
                          <input type="text" name="Htcto" class="form-control">
                        </div>
                      </div><div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">G. blancos</label>
                          <input type="text" name="blancos" class="form-control">
                        </div>
                      </div>
</div>

<div class="col-md-12" align="center">
                                                  <label><h4><b>Otros Hemogramas</b></h4></b></label>
                                                </div>

<div class="col-md-12">

        <div class="form-group">
                          <label class="control-label">Perfil Lipídico: 
</label>
                          
                        </div>

<div class="row">  

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Col Total: </label>
                          <input type="text" name="Coltotal" class="form-control">
                        </div>
                      </div>


<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">TG: </label>
                          <input type="text" name="TG" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Col LDL</label>
                          <input type="text" name="ColLDL" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Col HDL</label>
                          <input type="text" name="COLHDL" class="form-control">
                        </div>
                      </div>



</div>





        <div class="form-group">
                          <label class="control-label">Glucemia
</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Ayunas:  </label>
                          <input type="text" name="Ayunas" class="form-control">
                        </div>
                      </div>


<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Pre Carga (Curva):  </label>
                          <input type="text" name="curva" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Post:</label>
                          <input type="text" name="Post" class="form-control">
                        </div>
                      </div>

<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">A1C:</label>
                          <input type="text" name="A1C" class="form-control">
                        </div>
                      </div>



</div>


        <div class="form-group">
                          
                          
                        </div>  

<div class="row">  

<div class="col-md-12">
                        <div class="form-group">
                        <label class="control-label">Ácido Úrico

</label>
                          <input type="text" name="ACIDO" class="form-control">
                        </div>
                      </div>


</div>



        <div class="form-group">
                          <label class="control-label">Función Tiroidea

</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">TSH</label>
                          <input type="text" name="TSH" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">T3  </label>
                          <input type="text" name="T3" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">T4</label>
                          <input type="text" name="T4" class="form-control">
                        </div>
                      </div>

</div>


        <div class="form-group">
                          <label class="control-label">Insulina 

</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ayunas</label>
                          <input type="text" name="Ayunasi" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Pre </label>
                          <input type="text" name="pre" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Post</label>
                          <input type="text" name="post1" class="form-control">
                        </div>
                      </div>

</div>

<div class="form-group">
                          <label class="control-label">Perfil Hepático


</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">AST</label>
                          <input type="text" name="AST" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">ALT </label>
                          <input type="text" name="ALT" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">TGO</label>
                          <input type="text" name="TGO" class="form-control">
                        </div>
                      </div>

</div>

<div class="form-group">
                          <label class="control-label">Perfil Vitaminas
</label>
                          
                        </div>  

<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Calcio </label>
                          <input type="text" name="Calcio" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Vit D </label>
                          <input type="text" name="VitD" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Vit B12</label>
                          <input type="text" name="VitB12" class="form-control">
                        </div>
                      </div>

</div>

<div class="form-group">
                          <label class="control-label">Perfil Gestante 
</label>
                          
                        </div>  

<div class="row">  


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Toxop</label>
                          <input type="text" name="Toxop" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">IgG </label>
                          <input type="text" name="IgG" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">IgM</label>
                          <input type="text" name="IgM" class="form-control">
                        </div>
                      </div>

</div>



                    <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Otros </b></label>
                                                  <textarea class="form-control"  name="otros" rows="3" ></textarea>
                                                </div>
                                            </div>
                                      
                    <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Observaciones </b></label>
                                                  <textarea class="form-control"  name="obser" rows="3" ></textarea>
                                                </div>
                                            </div>
                    <!-- <div class="col-md-12">                       
<label for="adjuntar archivo">Adjuntar Archivo:</label>
                <input type='file' name='archivo1' id='archivo1' placeholder="carga tu boucher" > 
 

            </div>-->

              </div></div></div></div>
											
<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#vida">
															Estilo de Vida
														</a>
													</h4>
												</div>
												<div id="vida" class="panel-collapse collapse">
													<div class="box-body row">


<div class="row col-md-12">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Horas de Sueño/Día (Horas)</label>
                          <input type="text" name="hrasS" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Calidad del Sueño</label>
                          <input type="text" name="SUEÑO" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Actividad Física Hr / Semana (Horas)</label>
                          <input type="text" name="actividadF" class="form-control">
                        </div>
                      </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Tipo de Actividad/Ejercicio</label>
                          <input type="text" name="tipoA" class="form-control">
                        </div>
                      </div>


	<div class="col-md-6">

<div class="form-group">
                         <label class="control-label">Estrés </label>
                           <select  id="alto" name="alto" class="form-control input-lg select" style="width: 100%;">
                           <option value="">Seleccione</option>
                  <option>Alto </option>
                  <option>Moderado </option>
                  <option>Bajo </option>
                 
                </select>
                          
                        </div></div></div>



                        <div class="form-group col-md-12">
                          <label style="width: 100%;text-align: center;">Vicios
                        </label>
                          
                        </div>  
<div class="row">
<div class="form-group col-md-4" align="left">
¿Consume de Alcohol?
<input value="Si" type="radio" name="alcohol" id="lt" class=""/> SI
<input value="No" type="radio" name="alcohol" id="lt" class=""/> NO
									</div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>
                          <input type="text" name="cantidadalcohol" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Frecuencia</label>
                          <select class="form-control" name="frecuencia">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal ">Semanal</option>
                            <option value="Mensual">Mensual</option>
                          </select>
                        </div>
                      </div>

<div class="form-group col-md-4" align="left">
Cigarrillo
<input value="Si" type="radio" name="cigarrillo" id="lt" class=""/> SI
<input value="No" type="radio" name="cigarrillo" id="lt" class=""/> NO
</div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>
                          <input type="text" name="cantidad1" class="form-control">
                        </div>
                      </div>

 
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Frecuencia</label>
                          <select class="form-control" name="frecuencia1">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal ">Semanal</option>
                            <option value="Mensual">Mensual</option>
                          </select>
                        </div>
                      </div></div>

</div></div></div>
											
<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#funcionalidad">
															Funcionalidad Muscular
														</a>
													</h4>
												</div>
												<div id="funcionalidad" class="panel-collapse collapse">
													<div class="box-body row">






<div class="row">  

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fuerza </label>
                          <input type="text" name="Fuerza" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Dinamómetro</label>
                          <input type="text" name="Dinamometro" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Muscular</label>
                          <input type="text" name="masa" class="form-control">
                        </div>
                      </div>



<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Composición Corporal </label>
                          <input type="text" name="compocorporal" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Rendimiento Muscular </label>
                          <input type="text" name="Rendimientomuscular" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Velocidad</label>
                          <input type="text" name="velocidad" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Marcha </label>
                          <input type="text" name="marcha" class="form-control">
                        </div>
                      </div>


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Equilibrio </label>
                          <input type="text" name="equilibrio" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Silla</label>
                          <input type="text" name="silla" class="form-control">
                        </div>
                      </div>

</div>

													</div></div>
												</div>



<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#muscular">
															Anamnesis Gastrointestinal y Alimentaria
														</a>
													</h4>
												</div>
												<div id="muscular" class="panel-collapse collapse">
											<div class="box-body">

       <div class="row">
                              <div class="col-md-4">
                                <div class="form-group" align="left">
                                  <label class="control-label" >Alergias Alimentarias &nbsp;  Si &nbsp; <input type="radio" value="SI" name="alergiasA" class=""> &nbsp; No &nbsp;<input type="radio" name="alergiasA" value="NO" class=""></label>
                                </div>
                              </div>
<div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">¿Cuales?</label>
                          <input type="text" name="cuales1" class="form-control">
                        </div>
                      </div>

</div>
<div class="row">
<div class="col-md-4">
<div class="form-group">
                          <label class="control-label">Síntomas Gastrointestinales</label>
                           <select  id="gastritis" name="gastritis" class="form-control input-lg select" style="width: 100%;">
                           <option value="">Seleccione </option>
                           <option>Gastritís </option>
                  <option>Reflujo </option>
                  <option>Cólon Irritable </option>
                 
                </select>
                          
                        </div> </div> 


<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Varios ¿Cuales?</label>
                          <input type="text" name="varios" class="form-control">
                        </div>
                      </div>



 <div class="col-md-4">
<div class="form-group">
                          <label class="control-label">Hábito Intestinal</label>
                          <select  id="adecuado" name="adecuado" class="form-control input-lg select" style="width: 100%;">
                          <option value="">Seleccione </option>
                  <option value=" Adecuado">Adecuado </option>
                  <option value=" Estreñemiento">Estreñimiento </option>
                  <option value=" Diarrea">Diarrea </option>
                  <option value=" Gastritís"> Gastritís </option>
                  <option value= "Reflujo">Reflujo </option>
                  <option value=" Cólon Irritable">Cólon Irritable </option>
                 
                </select>
                          
                        </div></div></div>


<div class="row">



<div class="col-md-12" align="center">

<img src="https://medicalsoftplus.com/co134//logos/bristol.png"style="max-width:50%;width:auto;height:auto;">


                    </div>
                    <div class="col-md-12" align="left">
                        <div class="form-group">
                          <label class="control-label">Bristol</label>
                          <select class="form-control" name="bristol" >
                  <option value="">Seleccione </option>

                             <option value=" Tipo 1:Trozos duros separados, como nueces o excrementos de oveja, que pasan con dificultad."> Tipo 1: Trozos duros separados, como nueces o excrementos de oveja, que pasan con dificultad.</option>
                            <option value=" Tipo 2:Como una salchicha compuesta de fragmentos."> Tipo 2:Como una salchicha compuesta de fragmentos.</option>
                            <option value=" Tipo 3:Con forma de morcilla con grietas en la superficie."> Tipo 3:Con forma de morcilla con grietas en la superficie.</option>
                            <option value=" Tipo 4:Como una salchicha; o serpiente, lisa y blanda."> Tipo 4:Como una salchicha; o serpiente, lisa y blanda.</option>
                            <option value=" Tipo 5:Trozos de masa pastosa con bordes definidos, que son defecados fácilmente."> Tipo 5:Trozos de masa pastosa con bordes definidos, que son defecados fácilmente.</option>
                            <option value=" Tipo 6:Fragmentos blandos y esponjosos con bordes irregulares y consistencia pastosa."> Tipo 6:Fragmentos blandos y esponjosos con bordes irregulares y consistencia pastosa.	</option>
                            <option value=" Tipo 7:Acuosa, sin pedazos sólidos, totalmente líquida.	"> Tipo 7:Acuosa, sin pedazos sólidos, totalmente líquida.	</option>


                         </select>
                        </div>
                      </div>
                </div> <br><br>
<!--<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group">
                          <textarea name="estreñ" class="form-control"></textarea> 
                        </div>
                      </div></div> -->
                              
<!--
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Bristol</label>
                          <input type="text" name="bristol" class="form-control">
                        </div>
                      </div>
</div>-->

<div class="row" align="center">
                                            
                                                  <label><b> Conducta Alimentaria </b></label>
                                              
                                        </div> <br>
          <div class="row">
                              <div class="col-md-6">
                                <div class="form-group" align="left">
                                  <label class="control-label" >Presenta Atracones o Sobreingestas?		&nbsp;  Si &nbsp; <input type="radio" value=" SI" name="sobreI" class=""> &nbsp; No &nbsp;<input type="radio" name="medicamento1" value="NO" class=""></label>
                                </div>
                              </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Restricciones Alimentarias: </b></label>
                                                  <textarea class="form-control"  name="RESTRICCIONE" rows="2" ></textarea>
                                                </div>
                                            </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Alimentos Que Producen Temor </b></label>
                                                  <textarea class="form-control"  name="alimentos" rows="2" ></textarea>
                                                </div>
                                            </div>
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Intolerancias</b></label>
                                                  <textarea class="form-control"  name="intorelancias" rows="2" ></textarea>
                                                </div>
                                            </div> <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Rechazos </b></label>
                                                  <textarea class="form-control"  name="Rechazos" rows="2" ></textarea>
                                                </div>
                                            </div> <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Preferencias </b></label>
                                                  <textarea class="form-control"  name="Preferencias" rows="2" ></textarea>
                                                </div>
                                            </div> <div class="col-md-12">
                                                <div class="form-group">
                                                  <label><b>Consumo de Suplementos</b></label>
                                                  <textarea class="form-control"  name="Suplementos" rows="2" ></textarea>
                                                </div>
                                            </div>


                          </div>

<div class="row" align="center">
                                            
                                                  <label><b> Frecuencia de Consumo </b></label>
                                              
                                        </div> <br>


 <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Bebidas Azucaradas</label>
                          <select class="form-control" name="bebidas">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Productos de Panaderia</label>
                          <select class="form-control" name="panaderia">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Dulces y Postres</label>
                          <select class="form-control" name="dulces">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>

</div>



 <div class="row">
                     

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Comidas Rápidas </label>
                          <select class="form-control" name="comidasR">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fritos </label>
                          <select class="form-control" name="fritos">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Ensaladas</label>
                          <select class="form-control" name="Ensaladas">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
</div>

 <div class="row">
                     

<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Frutas </label>
                          <select class="form-control" name="Frutas">
                            <option value="">Seleccione..</option>
                            
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Granos </label>
                          <select class="form-control" name="Granos">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Embutidos( Jamón, Salchicha)</label>
                          <select class="form-control" name="embutidos">
                            <option value="">Seleccione..</option>
                            <option value="Diario">Diario</option>
                            <option value="Semanal">Semanal</option>
                            <option value="2 veces por semana"> 2 veces por Semana</option>
                            <option value="3 veces por semana"> 3 veces por Semana</option>
                            <option value="4 veces por semana"> 4 veces por Semana</option>
                            <option value="5 veces por semana"> 5 veces por Semana</option>
                            <option value="Quincenal">Quincenal</option>
                             <option value="Mensual">Mensual</option>
                            <option value="Nunca">Nunca</option>
                            <option value="Rera vez">Rara vez</option>
                          </select>
                        </div>
                      </div>
</div>

 <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Sal de Mesa</label>
                          <select class="form-control" name="sal">
                            <option value="">Seleccione..</option>
                            <option value="Algunas comidas">Algunas comidas</option>
                            <option value="Todas las comidas ">Todas las comidas</option>
                            <option value="Ocasional ">Ocasional </option>
                            <option value="Nunca">Nunca </option>
                          </select>
                        </div>
                      </div>
<div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Cantidad de Agua en el Día</label>
                          <input type="text" name="agua" class="form-control">
                        </div>
                      </div>
</div>
</div></div>
												</div>

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#consumoH">
															Consumo Habitual
														</a>
													</h4>
												</div>
												<div id="consumoH" class="panel-collapse collapse">
													<div class="box-body row">

     <!--  <div class="row">
                              
<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">TIEMPO DE COMIDA</label>
                          
                        </div>
                      </div>
                              
<div class="col-md-2"aling="center">
                        <div class="form-group">
                          <label class="control-label">HORA</label>
                          
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">LUGAR</label>
                        
                        </div>
                      </div>
<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">ALIMENTO/PREPARACIÓN</label>
                        
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">CANTIDAD(med casera)</label>
                          
                        </div>
                      </div>
                              
<div class="col-md-1">
                        <div class="form-group">
                          <label class="control-label"># IC </label>
                          
                        </div>
                      </div>

</div>  -->

       <div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h3>Desayuno</h3></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora</label>

                          <input type="time" name="hora1" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>

                          <input type="text" name="lugar1" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Alimento/Preparación</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># Ic</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion1" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad01" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic1" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion11" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad11" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic11" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion12" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad12" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic12" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion13" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad13" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic13" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion14" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad14" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic14" class="form-control">
                        </div>
                      </div>
</div>


     <div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h3>Media Mañana</h3></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora</label>

                          <input type="time" name="hora2" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>

                          <input type="text" name="lugar2" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Alimento/Preparación</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># Ic</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion2" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad2" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic2" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion21" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad21" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic21" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion22" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad22" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic22" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion23" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad23" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic23" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion24" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad24" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic24" class="form-control">
                        </div>
                      </div>
</div>

<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h3>Almuerzo</h3></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora</label>

                          <input type="time" name="hora3" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>

                          <input type="text" name="lugar3" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Alimento/Preparación</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># Ic</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion3" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad3" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic3" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion31" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad31" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic31" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion32" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad32" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic32" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion33" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad33" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic33" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion34" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad34" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic34" class="form-control">
                        </div>
                      </div>
</div>
<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h4>Media Tarde</h4></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora</label>

                          <input type="time" name="hora4" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>

                          <input type="text" name="lugar4" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Alimento/Preparación</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># Ic</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion4" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad4" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic4" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion41" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad41" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic41" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion42" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad42" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic42" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion43" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad43" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic43" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion44" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad44" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic44" class="form-control">
                        </div>
                      </div>
</div>
<div class="row">
                              
<div class="col-md-12">
                        <div class="form-group" align="center">
                         <label class="control-label"><h4>Cena</h4></label>
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora</label>

                          <input type="time" name="hora5" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-8">
                        <div class="form-group">
                          <label class="control-label">Lugar</label>

                          <input type="text" name="lugar5" class="form-control">
                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Alimentación/Preparación</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Cantidad</label>

                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label"># Ic</label>

                        </div>
                      </div>
<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion5" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad5" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic5" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion51" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad51" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic51" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion52" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad52" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic52" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion53" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad53" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic53" class="form-control">
                        </div>
                      </div>

<div class="col-md-4">
                        <div class="form-group">
                           <input type="text" name="preparacion54" class="form-control">
                          
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="cantidad54" class="form-control">
                        </div>
                      </div>
                              
<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic54" class="form-control">
                        </div>
                      </div>
</div>



                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Consumo del Fin de Semana</label>
                          <select class="form-control" name="consumofin">
                            <option value="  ">Seleccione..</option>
                            <option value="Aumenta">Aumenta</option>
                            <option value="Disminuye">Disminuye</option>
                            <option value="Igual ">Come igual</option>
                          </select>
                        </div>
                      </div>

</div></div></div>



<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#antropometria">
															Antropometría Completa
														</a>
													</h4>
												</div>
												<div id="antropometria" class="panel-collapse collapse">
													<div class="box-body row">
<div class="row">
 <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Tipo de Seguimiento</label>
                          <select class="form-control" name="TipoSeguimiento">
                            <option value="">Seleccione..</option>
                            <option value="Primera vez">Primera vez </option>
                            <option value="Control Uno">Control  1</option>
                            <option value="Control Dos">Control  2</option>
                            <option value="Control Tres">Control  3</option>
                            <option value="Control Cuatro">Control  4</option>
                            <option value="Control Cinco">Control  5</option>
                          </select>
                        </div>
                      </div> 

                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Peso, Historia del Peso y Talla</b></h4></b></label>
                                                </div>
                                            </div>
                                       
                <input type="hidden" class="form-control input-lg" name="edadMeses" value="<?php echo calculaedadMeses($fechanacimiento)?>"   step="any">
													<input type="hidden" class="form-control input-lg" name="edadanos" value="<?php echo calculaedadAnos($fechanacimiento)?>"   step="any">    
                              


  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Actual(kg):</label>
                          <input type="text" name="PesoActual" id="PesoActual" class="form-control input-lg" onChange="calcularimc();"    onChange="calcularpesograso();" onChange="calcularpesomagro();" onChange="calcularIAKS();" onChange="calcularmasapiel();" step="any"> 
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Usual (kg):</label>
                          <input type="text" name="PesoUsual"  id="PesoUsual"  class="form-control">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Peso Mínimo:</label>
                          <input type="text" name="PesoMinimo" id="PesoMinimo" class="form-control">
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Máximo:</label>
                          <input type="text" name="PesoMaximo"id="PesoMaximo" class="form-control">
                        </div>
                      </div>
                    <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Talla(cm):</label>
                          <input type="text" name="Talla"   id="Talla"  class="form-control input-lg" onChange="calcularimc();calcularPesoIdeal();" onChange="calcularestructura();" onChange="calcularIAKS();" onChange="calcularmasapiel();" onChange="calcularadiposa();"  onChange="calcularmuscular();" step="any"> 
                        </div>
                      </div>


 

<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Observaciones Para Historia del Peso y Talla:</label>
                          <input type="text" name="Observaciones" class="form-control">
                        </div>
                      </div>



              
                                    





                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Perímetros (Cm)</b></h4></b></label>
                                                </div>
                                            </div>
                                        

  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cuello:</label>
                          <input type="text" name="Cuello" id="Cuello" class="form-control">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Pecho/Tórax:</label>
                          <input type="text"  class="form-control input-lg"name="Pecho"  name="pecho" onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Brazo Relajado:</label>
                          <input type="text"   class="form-control input-lg"name="brazoR" id="brazoR"  onChange="calcularmuscular();"step="any"> 
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Brazo Contraído:</label>
                          <input type="text" name="BrazoC" id="BrazoC"   onChange="calcularmuscular();" class="form-control">
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Antebrazo:</label>
                          <input type="text"  class="form-control input-lg"name="Antebrazo" id="Antebrazo"   onChange="calcularmuscular();" step="any"> 
                        </div>
                      </div>



<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Muñeca:</label>
                          <input type="text" name="Muneca" id="Muneca" class="form-control input-lg" onChange="calcularestructura();" step="any">
                        </div>
                      </div>



  <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cintura:</label>
                          <input type="text" name="Cintura" id="Cintura"class="form-control input-lg" onChange="calcularRelacion();" step="any">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Abdómen:</label>
                          <input type="text" name="Abdomen"  id="Abdomen" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Cadera</label>
                          <input type="text" name="Cadera" id="Cadera" class="form-control input-lg" onChange="calcularRelacion();" step="any">
                        </div>
                      </div>

 <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Muslo:</label>
                          <input type="text" name="Muslo" id="Muslo"  class="form-control input-lg"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>
                    <div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Pantorrilla:</label>
                          <input type="text" name="Pantorrilla" id="Pantorrilla"  onChange="calcularmuscular();" class="form-control input-lg"  step="any"> 
                        </div>
                      </div>



<div class="col-md-2">
                        <div class="form-group">
                          <label class="control-label">Observaciones Para Perímetros (Cm):</label>
                          <input type="text" name="Observaciones1" class="form-control">
                        </div>
                      </div>



      
                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Pliegues Cutáneos (mm)</b></h4></b></label>
                                                </div>
                                            </div>
                                       


  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Bíceps:</label>
                          <input type="text" name="Biceps"  id="Biceps"class="form-control input-lg"  onChange="calcularpliegues();" step="any"> 
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Tríceps:</label>
                          <input type="text" name="riceps" id="riceps" class="form-control input-lg"  onChange="calcularpliegues();"   onChange="calculargrasa();" onChange="calcularadiposa();"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>


 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Subescapular</label>
                          <input type="text" name="Subescapular" id="Subescapular"class="form-control input-lg"  onChange="calcularpliegues();"   onChange="calculargrasa();" onChange="calcularadiposa();"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>

              <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Cresta Ilíaca:</label>
                          <input type="text" name="Cresta" id="Cresta" class="form-control input-lg"  onChange="calcularpliegues();" step="any">
                        </div>
                      </div>
                                       


  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Supraespinal:</label>
                          <input type="text" name="Supraespinal" id="Supraespinal" class="form-control input-lg"  onChange="calcularpliegues();"  onChange="calculargrasa();" onChange="calcularadiposa();"  onChange="calcularmuscular();" step="any">  
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Abdominal:</label>
                          <input type="text" name="Abdominal"  id="Abdominal" class="form-control input-lg"  onChange="calcularpliegues();"   onChange="calculargrasa();" onChange="calcularadiposa();"  step="any"> 
                          

                          <input type="hidden" name="genero"  id="genero" value="<?php echo $genero?>" class="form-control input-lg"   onChange="calculargrasa();" onChange="calcularmasapiel();"  step="any"> 
                        </div>
                      </div>


 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Muslo:</label>
                          <input type="text" name="Muslo1" id="Muslo1" class="form-control input-lg"  onChange="calcularpliegues();"  onChange="calculargrasa();"  onChange="calcularadiposa();"  onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>
<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Pierna Media:</label>
                          <input type="text" name="Pierna"id="Pierna" class="form-control input-lg"  onChange="calcularpliegues();"  onChange="calculargrasa();" onChange="calcularadiposa();"   onChange="calcularmuscular();"  step="any"> 
                        </div>
                      </div>
              
                               



<div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Observaciones Para Pliegues Cutáneos (mm):</label>
                          <input type="text" name="Observaciones2" class="form-control">
                        </div>
                      </div>
                                        </div>

                         <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Fuerza Muscular</b></h4></b></label>
                                                </div>
                                            </div>


  <div class="col-md-12">
                        <div class="form-group">
                          <label class="control-label">Dinamómetro:</label>
                          <input type="text" name="Dinanometro"  id="Dinanometro" class="form-control">
                        </div>
                      </div>




                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b>Resultados</b></h4></b></label>
                                                </div>
                                            </div>
                                    


  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">IMC: **</label>
                          <input type="text" name="IMC" id="IMC" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Estructura:**</label>
                          <input type="text" name="Estructura" id="Estructura" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Saludable:**</label>
                          <input type="text" name="Peso" id="Peso" class="form-control input-lg" step="any" oninput=""> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Relación Cintura/Cadera:**</label>
                          <input type="text" name="Relacion" id="Relacion" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-12">
															<div align="left">Composición corporal</div>
															<input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
														</div>


                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b> % Grasas(YUHASZ)</b></h4></b></label>
                                                </div>
                                            </div>
                                        


 	<div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Grasa:**</label>
                          <input type="text" name="grasapor" id="grasapor"  class="form-control input-lg"  onChange="calcularpesograso();"   onChange="calcularpesomagro();" onChange="calcularIAKS();"  step="any">
                        </div>
                      </div>

  <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Suma Pliegues**:</label>
                          <input type="text" name="Pliegues" id="Pliegues"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Graso:**</label>
                          <input type="text" name="Graso"  id="Graso" class="form-control input-lg"   step="any"> 
                        </div>
                      </div>
 <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Peso Magro**:</label>
                          <input type="text" name="Magro" id="Magro" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">IAKS**:</label>
                          <input type="text" name="IAKS" id="IAKS" class="form-control input-lg" step="any"> 
                        </div>
                      </div>

<div class="form-group col-md-6">
															<div align="left">Interpretación de Grasa </div>
															<input type="text" class="form-control input-lg" id="interpretacion" name="interpretacion">
														</div>



														


                                            <div class="col-md-12" align="center">
                                                <div class="form-group">
                                                  <label><h4><b> Análisis de Composición Corporal</b></h4></b></label>
                                                </div>
                                            </div>
                                      

 	<div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Piel**:</label>
                          <input type="text" name="masap" id="masap"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>

  <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Masa Adiposa**:</label>
                          <input type="text" name="masaA" id="masaA"  class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Peso Muscular**:</label>
                          <input type="text" name="pesom"  id="pesom" class="form-control input-lg" step="any"> 
                        </div>
                      </div>
 



														<!--</div></div></div></div>-->
                            </div></div></div>

                      <div class="panel box box-primary">
											  <div class="box-header with-border">
												  <h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#conceptoplan">
															Concepto y Plan
														</a>
													</h4>
												</div>
												<div id="conceptoplan" class="panel-collapse collapse">
													<div class="box-body">


                            <div class="row">

                              <div class="col-md-12">
                                <div class="form-group">
                                  <label><b>Diagnóstico Nutricional</b></label>
                                  <textarea class="form-control"  name="diaganosticoN" rows="2" ></textarea>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                  <label><b>Objetivo (Paciente + ND)</b></label>
                                  <textarea class="form-control"  name="objetivoP1" rows="2" ></textarea>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                        	        <label><b>¿Qué Está Dispuesto a Cambiar?</b></label>
                                  <textarea class="form-control"  name="objetivoP" rows="2" ></textarea>
                                </div>
                              </div>

                              <div class="col-md-12">
                                <div class="form-group">
                                  <label><b>Concepto y Plan </b></label>
                                  <textarea class="form-control"  name="PLAN" rows="2" ></textarea>
                                </div>
                              </div>

                            </div>
                          </div>
                        </div>
                      </div>


<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#notasformu">
															Notas y Formulaciones
														</a>
													</h4>
												</div>
												<div id="notasformu" class="panel-collapse collapse">
													<div class="box-body row">


<div class="form-group col-md-12">
                                                            <label>Incapacidades</label>
                                                            <textarea name="incapacidades" class="ejemplo" placeholder="Incapacidades" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                        </div>


                                                        

                                                         <div class="form-group col-md-12">
                                                            <label>Receta médica</label>
                                                            <textarea name="recipe" class="ejemplo" placeholder="Receta médica" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                        </div>

                                                        <div class="form-group col-md-12">
                                                            <label>Notas</label>
                                                            <textarea name="notas" class="ejemplo" placeholder="Notas" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;max-width: 100%;"></textarea>
                                                        </div>

                  <div class="form-group col-md-12">

												<label> Exámenes de las Partes del Cuerpo </label>
												<textarea id="examenPartesdCuerpo" name="examenPartesdCuerpo" class="textarea" placeholder="Exámenes de las partes del cuerpo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

											</div>


		<div class="form-group col-md-12">
											     <label>Impresiones Diagnósticas (Diagnóstico General) </label>
												

												
              <textarea id="diagnostico" name="diagnostico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>

          </div>


          <div class="form-group col-md-12">
		<div align="left"> <label>Tratamiento (Plan de Atención) </label></div>
		<textarea id="tratamiento" name="tratamiento" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
		</div>







					</div></div></div>
          <!--</div></div></div></div>-->

<div class="panel box box-primary">
											<div class="box-header with-border">
												<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#notasformuE">
															Exámenes a Realizar
														</a>
													</h4>
												</div>
												<div id="notasformuE" class="panel-collapse collapse">
													<div class="box-body row">

													<div class="form-group col-md-12">
														<div align="left"><label>Laboratorio </label></div>
													
														<textarea id="laboratorio" name="laboratorio" class="textarea" placeholder="Laboratorio" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>

													<div class="form-group col-md-12">
														<div align="left"><label>Imagenología</label> </div>
													
														<textarea id="ecografia" name="ecografia" class="textarea" placeholder="Imagenología" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>

													<div class="form-group col-md-12">
														<div align="left"><label>Otros</label></div>
													
														<textarea id="otros_examenesRealizar" name="otros_examenesRealizar" class="textarea" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
													</div>


					</div></div></div>






					
											


											
																
											<br>



													<label><input type="checkbox" name="cb-terminaste" required> Ya terminé </label><br>

													<input  type="hidden" name="email" value="<?php echo $correo_cliente;?>">
													<input  type="hidden" name="nombre"  value="<?php echo $nombre_cliente;?>">
													<input  type="hidden" name="telefono"  value="<?php echo $telefono_cliente ;?>">
													<input  type="hidden" name="ID"  value="<?php echo $_SESSION['ID']?>">
													<input  type="hidden" name="clienteId"  value="<?php echo $clienteId?>">
													<input  type="hidden" name="NOMBRE_USUARIO"  value="<?php echo $_SESSION['NOMBRE_USUARIO']?>">

													<div align="center">
														<br>
														<br>
														<br>
														<div class="col-sm-12">
                  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                      <h2> <strong> G u a r d a r </strong> </h2>
                    </button></center>

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

   
 
     function calcularRelacion()

    {

        m1 = document.getElementById("Cintura").value;
        m2 = document.getElementById("Cadera").value;

        cc = m1/m2;

        document.getElementById("Relacion").value = cc.toFixed(3);

    }


 

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

 <script src="apiVoz.js"></script>

<script type="text/javascript"> 


/*
 * Simple program to demo speech recognition
 *
 * Based on https://www.google.com/intl/en/chrome/demos/speech.html
 *
 * Must run on a remote server, and access via https not http.
 * Works on only Chrome
 */

/*
 * Choose your language


 */
var langs =
[['English',         ['en-US', 'United States']],
 ['Español',         ['es-AR', 'Argentina'],
                     ['es-BO', 'Bolivia'],
                     ['es-CL', 'Chile'],
                     ['es-CO', 'Colombia'],
                     ['es-CR', 'Costa Rica'],
                     ['es-EC', 'Ecuador'],
                     ['es-SV', 'El Salvador'],
                     ['es-ES', 'España'],
                     ['es-US', 'Estados Unidos'],
                     ['es-GT', 'Guatemala'],
                     ['es-HN', 'Honduras'],
                     ['es-MX', 'México'],
                     ['es-NI', 'Nicaragua'],
                     ['es-PA', 'Panamá'],
                     ['es-PY', 'Paraguay'],
                     ['es-PE', 'Perú'],
                     ['es-PR', 'Puerto Rico'],
                     ['es-DO', 'República Dominicana'],
                     ['es-UY', 'Uruguay'],
                     ['es-VE', 'Venezuela']],
 ['Euskara',         ['eu-ES']],
 ['Filipino',        ['fil-PH']],
 ['Français',        ['fr-FR']],
 ['Basa Jawa',       ['jv-ID']],
 ['Galego',          ['gl-ES']],
 ['ગુજરાતી',           ['gu-IN']],
 ['Hrvatski',        ['hr-HR']],
 ['IsiZulu',         ['zu-ZA']],
 ['Íslenska',        ['is-IS']],
 ['Italiano',        ['it-IT', 'Italia'],
                     ['it-CH', 'Svizzera']],
 ['ಕನ್ನಡ',             ['kn-IN']],
 ['ភាសាខ្មែរ',          ['km-KH']],
 ['Latviešu',        ['lv-LV']],
 ['Lietuvių',        ['lt-LT']],
 ['മലയാളം',          ['ml-IN']],
 ['मराठी',             ['mr-IN']],
 ['Magyar',          ['hu-HU']],
 ['ລາວ',              ['lo-LA']],
 ['Nederlands',      ['nl-NL']],
 ['नेपाली भाषा',        ['ne-NP']],
 ['Norsk bokmål',    ['nb-NO']],
 ['Polski',          ['pl-PL']],
 ['Português',       ['pt-BR', 'Brasil'],
                     ['pt-PT', 'Portugal']],
 ['Română',          ['ro-RO']],
 ['සිංහල',          ['si-LK']],
 ['Slovenščina',     ['sl-SI']],
 ['Basa Sunda',      ['su-ID']],
 ['Slovenčina',      ['sk-SK']],
 ['Suomi',           ['fi-FI']],
 ['Svenska',         ['sv-SE']],
 ['Kiswahili',       ['sw-TZ', 'Tanzania'],
                     ['sw-KE', 'Kenya']],
 ['ქართული',       ['ka-GE']],
 ['Հայերեն',          ['hy-AM']],
 ['தமிழ்',            ['ta-IN', 'இந்தியா'],
                     ['ta-SG', 'சிங்கப்பூர்'],
                     ['ta-LK', 'இலங்கை'],
                     ['ta-MY', 'மலேசியா']],
 ['తెలుగు',           ['te-IN']],
 ['Tiếng Việt',      ['vi-VN']],
 ['Türkçe',          ['tr-TR']],
 ['اُردُو',            ['ur-PK', 'پاکستان'],
                     ['ur-IN', 'بھارت']],
 ['Ελληνικά',         ['el-GR']],
 ['български',         ['bg-BG']],
 ['Pусский',          ['ru-RU']],
 ['Српски',           ['sr-RS']],
 ['Українська',        ['uk-UA']],
 ['한국어',            ['ko-KR']],
 ['中文',             ['cmn-Hans-CN', '普通话 (中国大陆)'],
                     ['cmn-Hans-HK', '普通话 (香港)'],
                     ['cmn-Hant-TW', '中文 (台灣)'],
                     ['yue-Hant-HK', '粵語 (香港)']],
 ['日本語',           ['ja-JP']],
 ['हिन्दी',             ['hi-IN']],
 ['ภาษาไทย',         ['th-TH']]];

for (var i = 0; i < langs.length; i++) {
  select_language.options[i] = new Option(langs[i][0], i);
}
select_language.selectedIndex = 1;
updateCountry();
select_dialect.selectedIndex = 3;
showInfo('info_start');

function updateCountry() {
  for (var i = select_dialect.options.length - 1; i >= 0; i--) {
    select_dialect.remove(i);
  }
  var list = langs[select_language.selectedIndex];
  for (var i = 1; i < list.length; i++) {
    select_dialect.options.add(new Option(list[i][1], list[i][0]));
  }
  select_dialect.style.visibility = list[1].length == 1 ? 'hidden' : 'visible';
}

/*
 * Set up recognizer
 */
var final_transcript = '';
var recognizing = false;
var ignore_onend;
var start_timestamp;
if (!('webkitSpeechRecognition' in window)) { 
  upgrade(); 
} else {
  start_button.style.display = 'inline-block';
  var recognition = new webkitSpeechRecognition(); 
  recognition.continuous = true; 
  recognition.interimResults = true; 

  recognition.onstart = function() { 
    recognizing = true; 
    showInfo('info_speak_now'); 
  };

  // Things that can go wrong
  recognition.onerror = function(event) { 
    if (event.error == 'no-speech') { 
      showInfo('info_no_speech'); 
      ignore_onend = true;
    }
    if (event.error == 'audio-capture') {
      showInfo('info_no_microphone');
      ignore_onend = true;
    }
    if (event.error == 'not-allowed') {
      if (event.timeStamp - start_timestamp < 100) {
        showInfo('info_blocked');
      } else {
        showInfo('info_denied');
      }
      ignore_onend = true;
    }
  };

  recognition.onend = function() { 
    recognizing = false;
    if (ignore_onend) {
      return;
    }
    if (!final_transcript) {
      showInfo('info_start');
      return;
    }
    showInfo('');
    if (window.getSelection) {
      window.getSelection().removeAllRanges();
      var range = document.createRange();
      range.selectNode(document.getElementById('final_span'));
      window.getSelection().addRange(range);
    }

    // Display or otherwise utilize result
    doit (final_transcript); 
  };

  recognition.onresult = function(event) { 
    var interim_transcript = '';
    if (typeof(event.results) == 'undefined') {
      recognition.onend = null;
      recognition.stop();
      upgrade();
      return;
    }

    // event.results is an array of the recognized strings
    for (var i = event.resultIndex; i < event.results.length; ++i) { 
      if (event.results[i].isFinal) { 
        final_transcript += event.results[i][0].transcript; 
      } else { 
        interim_transcript += event.results[i][0].transcript; 
      }
    }

    final_span.innerHTML = linebreak(final_transcript); 
    interim_span.innerHTML = linebreak(interim_transcript);
  };
}

// User message about browser
function upgrade() {
  start_button.style.visibility = 'hidden';
  showInfo('info_upgrade');
}

// Convert line breaks to HTML
var two_line = /\n\n/g;
var one_line = /\n/g;
function linebreak(s) {
  return s.replace(two_line, '<p></p>').replace(one_line, '<br>');
}

function startButton(event) {
  // Stop
  if (recognizing) {
    recognition.stop();
  }

  // Start
  else {
    final_transcript = '';
    recognition.lang = select_dialect.value;
    recognition.start();
    ignore_onend = false;
    final_span.innerHTML = '';
    interim_span.innerHTML = '';
    showInfo('info_allow');
    start_timestamp = event.timeStamp;
  }
}

// Display selected message, hide others
function showInfo(s) {
  if (s) {
    for (var child = info.firstChild; child; child = child.nextSibling) {
      if (child.style) {
        child.style.display = child.id == s ? 'inline' : 'none';
      }
    }
    info.style.visibility = 'visible';
  } else {
    info.style.visibility = 'hidden';
  }
}

/*
 ***************************************************************************
 * Voice drawing program, just an example of usage of above code
 ***************************************************************************
 */

// "Roy G Biv" colors only
var colors = ["red", "orange", "yellow", "green", "blue", "indigo", "violet"] 

// Limited set of shapes
var shapes = ["square", "rectangle", "circle", "ellipse"]

function doit (string) { 
  /*
   * Example of something you could do with the recognized text
   */

  string = string.toLowerCase()

  // Search for a color, else we choose black
  var color = colors.filter ( 
    function (c) { 
      return string.match (new RegExp ("\\b" + c + "\\b")) 
    }) [0] 

  // Search for a shape, else we don't draw
  var shape = shapes.filter ( 
    function (s) { 
      return string.match (new RegExp ("\\b" + s + "\\b")) 
    }) [0] 

  // If found a shape, draw it
  if (shape) { 
    var canvas = document.getElementById ("MyCanvas");
    var gc = canvas.getContext ("2d")
    gc.fillStyle = color? color: "black" 
    
    // Generate some random coordinates
    var x = 50 + Math.floor (400 * Math.random ())
    var y = 50 + Math.floor (400 * Math.random ())
    var w = 20 + Math.floor (100 * Math.random ())
    var h = 20 + Math.floor (100 * Math.random ())

    if (shape=="square") { 
      gc.fillRect (x, y, w, w) 
    }
    else if (shape=="rectangle") { 
      gc.fillRect (x, y, w, h) 
    }
    else if (shape=="circle") { 
      gc.beginPath(); 
      gc.arc (x, y, w/2, 0, Math.PI * 2); 
      gc.fill(); 
    }
    else if (shape=="ellipse") { 
      gc.beginPath(); 
      gc.ellipse (x, y, w/2, h/2, 0, 0, Math.PI * 2); 
      gc.fill(); 
    }
  }

  // For testing, display the understood message (2 words)
  console.log ("Color = " + color + ", Shape = " + shape)
}

   
 function calcularimc()
    {



        m1 = document.getElementById("PesoActual").value;
        m2 = document.getElementById("Talla").value;

        r = m1/((m2/100)*(m2/100));


        document.getElementById("IMC").value = r.toFixed(2);


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

    
 function calcularestructura()
    {


        m1 = document.getElementById("Talla").value;
        m2 = document.getElementById("Muneca").value;

        cc = m1/m2;

        document.getElementById("Estructura").value = cc.toFixed(2);


    }

    

    function calcularPesoIdeal() {
  // Convertir la altura a metros si está en centímetros
  var altura = document.getElementById("Talla").value;
 altura = altura/100;
  var minimo = (altura*altura)*20;
  var maximo = (altura*altura)*25;

  document.getElementById("Peso").value = " "+minimo.toFixed(2)+"KG - "+maximo.toFixed(2)+"KG";
  
  }





     function calcularRelacion()
    {


        m1 = document.getElementById("Cintura").value;
        m2 = document.getElementById("Cadera").value;

        cc = m1/m2;

        document.getElementById("Relacion").value = cc.toFixed(2);


    }
/*
function calculargrasa()
    {

        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        genero = document.getElementById("genero").value;

if (genero==M)

             ge= ((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))* 0,1051)+2,58;

        document.getElementById("grasapor").value = ge.toFixed(2);


  if (ge.toFixed(2) <= 10)

            interpretacion = 'Muy bueno';
        else if
        (ge.toFixed(2) >= 11 &  ge.toFixed(2) <= 14)

            interpretacion = 'Bueno';
        else if
        (ge.toFixed(2) >= 15 & ge.toFixed(2) <=20)

            interpretacion = 'Aceptable';
        else if
        (ge.toFixed(2) >= 21 & ge.toFixed(2) <= 27)

            interpretacion = 'Sobrepeso';

        else if
        (ge.toFixed(2) > 27)

            interpretacion = 'Obesidad';

        document.getElementById("interpretacion").value = interpretacion;



 else if

          ge= ((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))*0,1548)+3,58;
	   
         document.getElementById("grasapor").value = ge.toFixed(2);


 if (ge.toFixed(2) <= 15)

            interpretacion1 = 'Muy bueno';
        else if
        (ge.toFixed(2) >= 16 &  ge.toFixed(2) <= 20)

            interpretacion1 = 'Bueno';
        else if
        (ge.toFixed(2) >= 21 & ge.toFixed(2) <=26)

            interpretacion1 = 'Aceptable';
        else if
        (ge.toFixed(2) >= 27 & ge.toFixed(2) <= 33)

            interpretacion1 = 'Sobrepeso';

        else if
        (ge.toFixed(2) > 34)

            interpretacion1 = 'Obesidad';

        document.getElementById("interpretacion").value = interpretacion1;


    }
*/

function calcularpliegues()
    {


        m1 = document.getElementById("Biceps").value;
        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m4 = document.getElementById("Cresta").value;
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;

        p = parseFloat(m1)+parseFloat(m2)+parseFloat(m3)+parseFloat(m4)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8);

text= p;  
    
   document.getElementById("Pliegues").innerHTML = text;  


      document.getElementById("Pliegues").value = p.toFixed(2);


    }



    function calcularpesograso()
    {


        m1 = document.getElementById("grasapor").value;
        m2 = document.getElementById("PesoActual").value;

        pg= (m1*m2)/100;

        document.getElementById("Graso").value = pg.toFixed(2);


    }



    function calcularpesomagro()
    {

 p1 = document.getElementById("grasapor").value;
        p2 = document.getElementById("PesoActual").value;

        pm= (p1*p2)/100;

        /*pma= p2-pm; */

        document.getElementById("Magro").value = pm.toFixed(2);


    }


function calcularIAKS()
    {


        p1 = document.getElementById("grasapor").value;
        p2 = document.getElementById("PesoActual").value;
        pg= (p1*p2)/100;

        m1 = document.getElementById("PesoActual").value;
        //m2 = document.getElementById("Graso").value;
        m3 = document.getElementById("Talla").value;

        iaks= ((m1-pg)+1000000)/(m3*m3*m3);

        document.getElementById("IAKS").value = iaks.toFixed(2);


    }

/*
function calcularmasapiel()
    {

       m1 = document.getElementById("PesoActual").value;
        m2 = document.getElementById("Talla").value;

genero=document.getElementById("genero").value;

if (genero==M)


             mp= ((68,308* (m1^0,425)*(m2^0,725))/10000)*2,07*1,05;

        document.getElementById("masap").value = mp.toFixed(2);

 else if

          mp= ((73,704* (m1^0,425)*(m2^0,725))/10000)*1,96*1,05;

        document.getElementById("masap").value = mp.toFixed(2);


    } */


 function calcularadiposa()
    {

 
          m2 = document.getElementById("riceps").value;
       m3 = document.getElementById("Subescapular").value;
      
        m5 = document.getElementById("Supraespinal").value;
        m6 = document.getElementById("Abdominal").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        m9 = document.getElementById("Talla").value;

        
ma= parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8);
// ma = (((((parseFloat(m2)+parseFloat(m3)+parseFloat(m5)+parseFloat(m6)+ parseFloat(m7)+parseFloat(m8))*(170,18/m9)-116,41)/34,79)*5,85)+25,6)/((170,18/m9)^3);

 text= ma;  
    
   document.getElementById("masaA").innerHTML = text;  


        document.getElementById("masaA").value = ma.toFixed(2);


    }




function calcularmuscular()
    {

        m2 = document.getElementById("riceps").value;
        m3 = document.getElementById("Subescapular").value;
        m7 = document.getElementById("Muslo1").value;
        m8 = document.getElementById("Pierna").value;
        m9 = document.getElementById("Talla").value;
        m10= document.getElementById("brazoR").value;
        m11= document.getElementById("Antebrazo").value;
        m12= document.getElementById("pecho").value;
        m13= document.getElementById("Muslo").value;
        m14= document.getElementById("Pantorrilla").value;
        
       

pm = ((((((m10-(3,1416*m2/10))+m11+(m12-(3,1416*m3/10))+(m7-(3,1416*m13/10))+(m14-(3,1416*m8/10)))*(170,18/m9)-207,21)/13,74)*5,4)+24,5)/((170,18/m9)^3);

        document.getElementById("pesom").value = pm.toFixed(2);


    }



     </script>


     <script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script src="plugins/LottieK/lottie.min.js"></script>
<?php 
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "nutricionAdulto";//nombre de la tabla de la base de datos de la historia
include 'AutoGuardado_Historia.php';// solo usarlo si la ruta de los get de la tabla no estan codificados y la ruta solo maneja el get clienteId sino es asi, manejar un autoguardado personalizado que estan en la carpeta AutoGuardados
?>