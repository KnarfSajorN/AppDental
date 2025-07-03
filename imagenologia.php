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
												<div class="box-body">
													<div class="row">

														<div class="col-md-5">
															<label><strong>Correo:</strong></label>
															<label> <?php echo $correo_cliente;?>  </label>

															<br>
															<label><strong>Nombre:</strong></label>
															<label><?php echo $nombre_cliente;?> </label>

															<br>
															<label><strong>Celular:</strong></label>
															<label><?php echo $celular;?></label>

															<br>
															<label><strong>Ciudad:</strong></label>
															<label><?php echo $ciudad_cliente;?></label>

															<br>
															<label><strong>Fecha registro:</strong></label>
															<label><?php echo $fechar;?></label>

															<br>
															<label><strong>Cedula o ID:</strong></label>
															<label><?php echo $CODI_CLIENTE;?></label>

															<br>
															<label><strong> Es donante:</strong></label>
															<label><?php echo $esDonante;?></label>

															<br>
															<label><strong>Entidad de salud :</strong></label>
															<label><?php echo $entidadSalud;?></label>
															
															<br>
															<label><strong>  Dirección cliente:</strong></label>
															<label><?php echo $direccion_cliente ;?></label>

															<br>
															<label><strong> Teléfono :</strong></label>
															<label><?php echo $telefono_cliente ;?></label>
															
														</div>

														<div class="col-md-5">
															

															<label><strong> Fecha de nacimiento :</strong></label>
															<label><?php echo $fechaNacimiento;?></label>

															<br>
															<label><strong> Edad :</strong></label>
															<label><?php echo  calculaedad($fechaNacimiento);?></label>

															<br>
															<label><strong>Genero:</strong></label>
															<label><?php echo $genero;?></label>

															<br>
															<label><strong>Profesión :</strong></label>
															<label><?php echo $profesion_cliente ;?></label>

															<br>
															<label><strong>Tipo de sangre :</strong></label>
															<label><?php echo $tiposSangre ;?></label>

															<br>
															<label><strong>Seguro :</strong></label>
															<label><?php echo $seguro;?></label>

															<!--<br>
															<label><strong>Tiene alguna Discapacidad :</strong></label>
															<label><?php echo $dis ;?></label>-->

															<br>
															<label><strong>Discapacidad:</strong></label>
															<label><?php echo $tipodiscapacidad;?></label>

															<br>
															<label><strong>Ocupación :</strong></label>
															<label><?php echo $ocupacion;?></label>


														</div>

														<div class="col-md-2">
                                                            <?php
                                                            // echo strlen($logoF);
                                                            if (strlen($fotoperfil) > 0) {
                                                                echo '<img src="'.$Base.'/pascientes/'.$fotoperfil.'" width="90%" height="20%">';
                                                            }
                                                            else{ echo ''; }
                                                            ?>
														</div>
													</div>

													<div class="row">
														<div class="col-md-12">
															<hr>
														</div>
													</div>

													<div class="col-md-12">
														<div class="col-md-12">
															<label><strong>Toma algún medicamento:</strong></label>
															<label><?php echo $tomaMedicamento ;?></label>
														</div>
														<div class="form-group col-md-2" align="right">
															Alergias a las aines  <?php echo sino($ap1)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Asma <?php echo sino($ap2)?>
														</div>

														<div class="form-group col-md-2" align="right">
															HTA <?php echo sino($ap3)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Diabetes <?php echo sino($ap4)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Hipotiroidismo <?php echo sino($ap5)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Tabaquismo <?php echo sino($ap6)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Licor <?php echo sino($ap7)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Otras Alergias <?php echo sino($ap8)?>
														</div>

														<div class="form-group col-md-2" align="right">
															Cirugías <?php echo sino($ap9)?>
														</div>
													</div>
													<div class="form-group col-md-12" >
														<label><strong>Antecedentes Familiares:</strong></label>
														<label><?php echo $antecedentes;?></label>.
														<br>
														<label><strong>Alergias :</strong></label>
														<label><?php echo $alergias;?></label>
														<br>
														<label><strong>Notas adicionales :</strong></label>
														<label><?php echo $nota;?></label>.
													</div>
												</div>
											</div>
										</div>
									<form action="guardarImagenologia.php" method="POST" name="formularioguardarimagenologia">

									<!--		<div class="panel box box-danger">
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
<div align="left">	CÓDIGO </div>
														
 <input type="text" class="form-control input-lg" id="ORDEN" name="ORDEN">

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
<div align="left">	HISTORIA CLINICA </div>
														
 <input type="text" class="form-control input-lg" id="temperatura" name="HISTORIA">

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
-->

											<div class="panel box box-success">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#estudio">
														Estudio solicitado
														</a>
													</h4>
												</div>
											<div id="estudio" class="panel-collapse collapse">
													<div class="box-body">


<div class="row">
<div class="form-group col-md-2">

															<h7 style="background: #A4A4A4">RX CONVENCIONAL							

</h7 ><input type="checkbox"  name="anteCt1" value=":X" > 
															
															</div>



<div class="form-group col-md-2">

															<h7 style="background: #A4A4A4">TOMOGRAFIA								

</h7 ><input type="checkbox"  name="anteCt2" value=":X" > 
															
															</div><div class="form-group col-md-2">

															<h7 style="background: #A4A4A4">RESONANCIA

</h7 ><input type="checkbox"  name="anteCt3" value=":X" > 
															
															</div><div class="form-group col-md-2">

															<h7 style="background: #A4A4A4">ECOGRAFÍA									

</h7 ><input type="checkbox"  name="anteCt4" value=":X" > 
															
															</div><div class="form-group col-md-2">

															<h7 style="background: #A4A4A4">PROCEDIMIENTO				
</h7 ><input type="checkbox"  name="anteCt5" value=":X" > 
															
															</div><div class="form-group col-md-2">

															<h7 style="background: #A4A4A4">OTROS				

</h7 ><input type="checkbox"  name="anteCt6" value=":X" > 
															
															</div>

												</div>

<div class="form-group col-md-12">
                <div align="left" style="background: #A4A4A4" > DESCRIPCION</div>
            


                <div align="right">
                  <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="enfermedadActual" name="estudio"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea> </div>



<div class="form-group col-md-6">


															<h7 style="background: #A4A4A4">PUEDE MOVILIZARSE

</h7 ><input type="checkbox"  name="anteCt7" value=":X" > 
															
															</div>



<div class="form-group col-md-6">

															<h7 style="background: #A4A4A4">PUEDE RETIRARSE VENDAS, APOSITOS O YESOS
PARCIAL (TTP)
</h7 ><input type="checkbox"  name="anteCt8" value=":X" > 
															
															</div><div class="form-group col-md-6">

															<h7 style="background: #A4A4A4">EL MEDICO ESTARA PRESENTE EN EL EXAMEN

</h7 ><input type="checkbox"  name="anteCt9" value=":X" > 
															
															</div><div class="form-group col-md-6">

															<h7 style="background: #A4A4A4">TOMA DE RADIOLOGIA EN LA CAMA
</h7 ><input type="checkbox"  name="anteCt10" value=":X" > 
															
															</div>
	
															</div>


												</div>

												</div>

<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#motivo">
															Motivo solicitud
														</a>
													</h4>
												</div>
												<div id="motivo" class="panel-collapse collapse">
													<div class="box-body">
<b>REGISTRAR LAS RAZONES PARA SOLICITAR ACLARACION DE DIAGNOSTICO</b>



														<div class="form-group col-md-12">
															


															<div align="right">
															<a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
															</div>


															<textarea  id="motivoConsulta" name="motivosolicitud"  class="textarea" placeholder="Motivo solicitud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
														</div>

												</div>

												</div> </div>

<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#resumen">
														Resumen clínico
														</a>
													</h4>
												</div>
												<div id="resumen" class="panel-collapse collapse">
													<div class="box-body">
<div class="form-group col-md-12">
               


                <div align="right">
                  <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="notasadicionales" name="resumenclinico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            
               
             
              </div>
               </div> </div> </div>




<div class="panel box box-danger">
												<div class="box-header with-border">
													<h4 class="box-title">
														<a data-toggle="collapse" data-parent="#accordion1" href="#DIAGNOSTICO">
														Diagnóstico
														</a>
													</h4>
												</div>
												<div id="DIAGNOSTICO" class="panel-collapse collapse">
													<div class="box-body">


<div class="row">
														<div class="form-group col-md-4">
															<div align="left">Diagnóstico</div>
															
														</div>



<div class="form-group col-md-6">
															<div align="left">CIE</div>
															
														</div>



<div class="form-group col-md-2">
															<div align="left">DEF/PRE</div>
															
														</div>


</div>


<div class="row">
	<div class="form-group col-md-4">
															
															<input type="text" class="form-control" name="diagnostico1">
															
														</div>




<div class="form-group col-md-6">
                                       
                                        <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10D1" class="form-control select2"  style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          

                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>






<div class="form-group col-md-2">
														
  <select name="pre1" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>

													</div>


<div class="row">
	<div class="form-group col-md-4">
															
															<input type="text" class="form-control" name="diagnostico2">
															
														</div>




<div class="form-group col-md-6">
                                       
                                        <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10D2" class="form-control select2"  style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          

                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>


<div class="form-group col-md-2">
														
  <select name="pre2" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>

													</div>



<div class="row">
	<div class="form-group col-md-4">
															
															<input type="text" class="form-control " name="diagnostico3">
															
														</div>




<div class="form-group col-md-6">
                                       
                                        <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10D3" class="form-control select2"  style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo");
                                              $nrowl = mysqli_num_rows($queryList);
                                              while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                              }
                                              ?>
                                          </select>
                                          

                                        <?php
                                        } else {
                                          echo ' <div align="center"> Lista CIE10 desactivada, para activar debes entrar a configuración <a href="' . $Base . '/config" target="_blank"> <strong> <i class="fa fa fa-gears"></i> clic aquí Configuración y perfil </strong></a>  y luego seleccionamos la pestaña  <strong> listas </strong><br> <font color="red">  Necesitas ayuda, Solicítalo por <a href="' . $Base . '/soporte" target="_blank"> <strong> <i class="fa fa fa-support"></i> soporte </strong></a>  </font></h6></div>';
                                        }
                                        ?>
                                      </div>



<div class="form-group col-md-2">
														
  <select name="pre3" class="form-control input-lg select2" style="width: 100%;" > 
                <option selected="selected" value="">Seleccione...</option>
                <option>Presuntivo</option>
                <option>Definitivo</option>
               
                
              </select>

</div>
													</div>
















</div></div>  

											




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
 

