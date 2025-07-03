<?php
include 'header.php';
include 'menu.php';

//$cliente_odonto_id = $_GET['cliente_odonto_id'];
//$pzs = $_GET['pzs'];

//echo $cliente_odonto_id;
//echo $pzs;

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];
$ID = $_SESSION['ID'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $usuario_id = $rowMotorizado['usuario_id'];
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $celular_cliente = $rowMotorizado['celular_cliente'];
  $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
  $correo_cliente = $rowMotorizado['correo_cliente'];
  $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
  $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
  $tipo_cliente = $rowMotorizado['tipo_cliente'];
  $fechar = $rowMotorizado['fechar'];
  $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
  $activo = $rowMotorizado['activo'];
  $genero = $rowMotorizado['genero'];
  $direccion_cliente = $rowMotorizado['direccion_cliente'];
  $telefono_cliente = $rowMotorizado['telefono_cliente'];
  $edad_cliente = $rowMotorizado['edad_cliente'];
  $profesion_cliente = $rowMotorizado['profesion_cliente'];
  $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
  $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
  $antecedentes     = $rowMotorizado['antecedentes'];
  $fotoperfil       = $rowMotorizado['fotoperfil'];
  $tiposSangre      = $rowMotorizado['tiposSangre'];

  $dis          = $rowMotorizado['dis'];
  $tipodiscapacidad      = $rowMotorizado['tipodiscapacidad'];
  $etnia            = $rowMotorizado['etnia'];
  $esDonante        = $rowMotorizado['esDonante'];
  $tomaMedicamento  = $rowMotorizado['tomaMedicamento'];

  $fechaNacimiento  = $rowMotorizado['fechaNacimiento'];

  $entidadSalud     = $rowMotorizado['entidadSalud'];
  $seguro           = $rowMotorizado['seguro'];

  $nota           = $rowMotorizado['nota'];
  $enfermedadesPequeno           = $rowMotorizado['enfermedadesPequeno'];
  $alergias           = $rowMotorizado['alergias'];

  $peso           = $rowMotorizado['peso'];
  $altura           = $rowMotorizado['altura'];
  $imc           = $rowMotorizado['imc'];
  $ComposicionCorporal           = $rowMotorizado['ComposicionCorporal'];

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

$queryconfig = mysqli_query($conn3, "SELECT * FROM  config where ID=$ID");
$nrowl = mysqli_num_rows($queryconfig);
while ($rowconfig = mysqli_fetch_array($queryconfig)) {
  $cie10 = $rowconfig['cie10'];
  $pro1  = $rowconfig['pro1'];
  $pro2  = $rowconfig['pro2'];
}

?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta Psicológica</h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta Psicológica </a></li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">
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
                        <?php echo datosPacientes($clienteId); ?>

                        <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" onclick="javascript:window.open('PS_Historial_Psicologia.php?clienteId=<?php echo $clienteId ?>');" />
                        
                        <?php /*
                          <div class="col-md-5">

                            <label><strong>Correo:</strong></label>
                            <label> <?php echo $correo_cliente; ?> </label>

                            <br>
                            <label><strong>Nombre:</strong></label>
                            <label><?php echo $nombre_cliente; ?> </label>

                            <br>
                            <label><strong>Celular:</strong></label>
                            <label><?php echo $celular_cliente; ?></label>

                            <br>
                            <label><strong>Ciudad:</strong></label>
                            <label><?php echo $ciudad_cliente; ?></label>

                            <br>
                            <label><strong>Fecha registro:</strong></label>
                            <label><?php echo $fechar; ?></label>

                            <br>
                            <label><strong>Cedula o ID:</strong></label>
                            <label><?php echo $CODI_CLIENTE; ?></label>

                            <br>
                            <label><strong> Es donante:</strong></label>
                            <label><?php echo $esDonante; ?></label>

                            <br>
                            <label><strong>Entidad de salud :</strong></label>
                            <label><?php echo $entidadSalud; ?></label>
                            <br>
                            <label><strong> Dirección cliente:</strong></label>
                            <label><?php echo $direccion_cliente; ?></label>


                          </div>

                          <div class="col-md-5">

                            <label><strong> Teléfono :</strong></label>
                            <label><?php echo $telefono_cliente; ?></label>
                            <br>

                            <label><strong> Fecha de nacimiento :</strong></label>
                            <label><?php echo $fechaNacimiento; ?></label>
                            <br>

                            <label><strong> Edad :</strong></label>
                            <label><?php calculaedad($fechaNacimiento); ?></label>

                            <br>

                            <label><strong>Genero:</strong></label>
                            <label><?php echo $genero; ?></label>

                            <br>
                            <label><strong>Profesión :</strong></label>
                            <label><?php echo $profesion_cliente; ?></label>

                            <br>
                            <label><strong>Tipo de sangre :</strong></label>
                            <label><?php echo $tiposSangre; ?></label>

                            <br>
                            <label><strong>Seguro :</strong></label>
                            <label><?php echo $seguro; ?></label>


                            <!--<br>
                              <label><strong>Tiene alguna Discapacidad :</strong></label>
                              <label><?php echo $dis; ?></label>-->

                            <br>
                            <label><strong>Discapacidad:</strong></label>
                            <label><?php echo $tipodiscapacidad; ?></label>

                            <br>
                            <label><strong>Etnía :</strong></label>
                            <label><?php echo $etnia; ?></label>

                          </div>

                          <div class="col-md-2">

                            <?php
                            // echo strlen($logoF);
                            if (strlen($fotoperfil) > 0) {
                              echo '<img src="' . $Base . '/pascientes/' . $fotoperfil . '" width="90%" height="20%">';
                            } else {

                              echo '';
                            }
                            ?>
                            <input type="button" class="btn btn-block btn-primary btn-sm" value="Historial consultas" onclick="javascript:window.open('consultaHistoriaMedica.php?tipo=<?php echo $clienteId ?>&ID=<?php echo $ID ?>','','width=600,height=400,left=50,top=50,toolbar=yes');" />

                          </div>
                          <br>

                          <div class="col-md-12">
                            <hr>
                          </div>
                          <div class="col-md-12">

                            <div class="col-md-12">

                              <label><strong>Toma algún medicamento:</strong></label>
                              <label><?php echo $tomaMedicamento; ?></label>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Alergias a las aines <?php echo sino($ap1) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Asma <?php echo sino($ap2) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              HTA <?php echo sino($ap3) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Diabetes <?php echo sino($ap4) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Hipotiroidismo <?php echo sino($ap5) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Tabaquismo <?php echo sino($ap6) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Licor <?php echo sino($ap7) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Otras Alergias <?php echo sino($ap8) ?>
                            </div>

                            <div class="form-group col-md-2" align="right">
                              Cirugías <?php echo sino($ap9) ?>
                            </div>
                          </div>

                          <div class="form-group col-md-12">
                            <label><strong>Antecedentes Familiares:</strong></label>
                            <label><?php echo $antecedentes; ?></label>.
                            <br>
                            <label><strong>Alergias :</strong></label>
                            <label><?php echo $alergias; ?></label>
                            <br>
                            <label><strong>Notas adicionales :</strong></label>
                            <label><?php echo $nota; ?></label>
                          </div>
                          

                        </div>*/?>
                      </div>
                    </div>

                    <form action="PS_Guardar_Historia_Psicologia" method="POST" name="formularioActualizarcliente" id="FormularioHistoriaClinica">

                      <!--  *******************************  Psiquiatrico   **************************** -->
                      <!-- /.box-header -->
                      <div class="box-body">
                        <div class="box-group" id="accordion1">
                          <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                          <div class="panel box box-success">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">1. <ins>Entrevista Inicial</ins></h3>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTwo" class="panel-collapse collapse">
                              <div class="row">




                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Fecha </label>
                                  <div class="form-group has-success">
                                    <input type="date" name="fechar" class="form-control input-lg" id="inputSuccess" value="<?php echo date("Y-m-d") ?>">
                                  </div>

                                </div>

                                <div class="col-md-6">
                                  <label class="control-label" for="inputSuccess">Motivo de la Consulta</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="motivo_c" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>





                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Forma de Inicio</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="form_ini" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Curso</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="curso" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Síntomas Principales</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="sintoma_pi" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-12">
                                  <label>Relato General</label>
                                  <div class="form-group">
                                    <textarea class="form-control" name="relato_gen" rows="3" placeholder=""></textarea>
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Funciones Biológicas</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="funciones_bio" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Apetito</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="apetito" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Sed</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="sed" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Sueño</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="sueno" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                              </div>

                              <div class="row">
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Orina</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="orina" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Deposiciones</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="deposiciones" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                                <div class="col-md-3">
                                  <label class="control-label" for="inputSuccess">Variación de peso</label>
                                  <div class="form-group has-success">
                                    <input type="text" name="variacion_pe" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="panel box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTree">2. <ins>Historia Familiar</ins>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseTree" class="panel-collapse collapse">
                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="control-label" for="inputSuccess">Padre</label>
                                    <div class="form-group has-success">
                                      <textarea class="form-control" name="padre" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="control-label" for="inputSuccess">Madre</label>
                                    <div class="form-group has-success">
                                      <textarea class="form-control" name="madre" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="control-label" for="inputSuccess">Hermanos</label>
                                    <div class="form-group has-success">
                                      <textarea class="form-control" name="hermanos" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <label class="control-label" for="inputSuccess">Sobrinos</label>
                                    <div class="form-group has-success">
                                      <textarea class="form-control" name="sobrinos" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFour">3. <ins>Historia Personal</ins>
                                </a>
                              </h4>
                            </div>
                            <div id="collapseFour" class="panel-collapse collapse">
                              <div class="box-body">
                                <h4><ins>Antecedentes</ins></h4>
                                <div class="row">

                                  <div class="col-md-12">
                                    <label>a) Prenatales:</label>
                                    <div class="form-group">
                                      <textarea class="form-control" name="prenatal" rows="4" placeholder="• Meses de gestación: 9 meses
                          • Enfermedades intercurrentes: no refiere
                          • Fármacos recibidos: no refiere
                          • Control prenatal: no refiere"></textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <label>b) Natales:</label>
                                    <div class="form-group">
                                      <textarea class="form-control" name="natales" rows="4" placeholder="•  Edad gestacional: 9 meses
                          • Parto: eutósico
                          • Peso y talla: no refiere"></textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <label>c) Postnatales:</label>
                                    <div class="form-group">
                                      <textarea class="form-control" name="postnatales" rows="8" placeholder="• Lactancia y ablactancia: no refiere
                          • Desarrollo psicomotriz: sin alteraciones
                          • Edad de primeros pasos: no refiere
                          • Dentición: adecuada
                          • Primeras palabras: no refiere
                          • Crecimiento: sin alteraciones
                          • Control de esfínteres: adecuado "></textarea>
                                    </div>
                                  </div>

                                  <div class="col-md-12">
                                    <label>d) Actividad Sexual:</label>
                                    <div class="form-group">
                                      <textarea class="form-control" name="actividad_sex" rows="4" placeholder="inicio de actividad sexual a los 18 años, ha tenido dos parejas, refiere uso de métodos anticonceptivos."></textarea>
                                    </div>
                                  </div>
                                </div>

                               

                                <div class="row">
                                  <div class="col-md-12">
                                  <label>e) Antecedentes Personales Patológicos:</label>
                                    <div class="form-group">
                                      <textarea class="form-control" name="ant_pers_pat" rows="10" placeholder="a) Inmunizaciones:  
                          b)  Alergias:  
                          c)  Hábitos nocivos:
                              - Bebidas alcohólicas:
                              - Tabaco:  
                              - Drogas:  
                          d)  Transfusiones Sanguíneas:  
                          e)  Enfermedades de la infancia:  
                          f)  Enfermedades de la adolescencia y adultez:  
                          g)  Hospitalizaciones anteriores:"></textarea>
                                    </div>
                                  </div>
                                </div>


                                <div class="row">
                                  <div class="col-md-12">
                                  <label>f) Antecedentes Personales Generales:</label>
                                    <div class="form-group">
                                      <textarea class="form-control" name="ant_pers_gen" rows="8" placeholder="a) Residencia Física:
                          b)  Comunidad de Residencia: 
                          c)  Pertenencia a Grupos:
                          d)  Miembros del Grupo Doméstico:
                          e)  Hábitos Sociales:
                          f)  Ocupación: 
                          g)  Condición Económica y Seguridad:
                          h)  Actitudes hacia la Situación actual de Vida: "></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseFive">4. <ins>Personalidad</ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapseFive" class="panel-collapse collapse">
                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Inteligencia</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="inteligencia" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Satisfacciones</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="satisfacciones" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Habilidades Especiales</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="hab_espec" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Hábitos y Empleo del Tiempo</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="hab_emp_tie" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Estado de Ánimo Habitual</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="est_ani_hab" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Rasgos Dominantes</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="ras_dom" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Relaciones con Otras Personas</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="rel_otras_p" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Objetivos y Aspiraciones </label>
                                    <div class="form-group has-success">
                                      <input type="text" name="obj_asp" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Ideales</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="ideales" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseSix">5. <ins>Examen General</ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapseSix" class="panel-collapse collapse">
                              <div class="box-body">
                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Porte</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="porte" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Comportamiento</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="comportamiento" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Actitud</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="actitud" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Conciencia</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="conciencia" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                </div>

                                <div class="row">
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Atención</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="atencion" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Orientación</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="orientacion" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                  <div class="col-md-3">
                                    <label class="control-label" for="inputSuccess">Lenguaje</label>
                                    <div class="form-group has-success">
                                      <input type="text" name="lenguaje" class="form-control" id="inputSuccess" placeholder="" maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          <h4></h4>
                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapseSeven">6. <ins>Educación</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapseSeven" class="panel-collapse collapse">
                              <div class="box-body">

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <textarea class="form-control" name="educacion" rows="3" placeholder=""></textarea>
                                  </div>
                                </div>
                              </div>

                              </div>
                            </div>
                          </div>
                          

                          <h4></h4>
                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse7">7. <ins>Trabajo</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse7" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="trabajo" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          
                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse8">8. <ins>Cambio de Residencia</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse8" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="cambio_res" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                                </div>
                            </div>
                          </div>
                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse9">9. <ins>Accidentes y Enfermedades</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse9" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="acc_enf" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>

                          
                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse10">10. <ins>Vida Sexual</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse10" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="vidaSexual" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>

                              </div>
                            </div>
                          </div>

                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse11">11. <ins>Hábitos e Intereses</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse11" class="panel-collapse collapse">
                              <div class="box-body">

                                  <div class="row">
                                    <div class="col-md-12">
                                      <div class="form-group">
                                        <textarea class="form-control" name="hab_int" rows="3" placeholder=""></textarea>
                                      </div>
                                    </div>
                                  </div>


                                  </div>
                            </div>
                          </div>


                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse12">12. <ins>Actitud para con la Familia</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse12" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="act_fam" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>

                                </div>
                            </div>
                          </div>


                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse13">13. <ins>Sueños</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse13" class="panel-collapse collapse">
                              <div class="box-body">


                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="suenos" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>

                                </div>
                            </div>
                          </div>

                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse14">14. <ins>Antecedentes Socioeconómicos</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse14" class="panel-collapse collapse">
                              <div class="box-body">

                              <div class="row">
                                <div class="col-md-12">
                                  <div class="form-group">
                                    <textarea class="form-control" name="ant_socio" rows="3" placeholder=""></textarea>
                                  </div>
                                </div>
                              </div>

                              </div>
                            </div>
                          </div>

                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse15">15. <ins>Evaluación</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse15" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="evaluacion" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>

                                </div>
                            </div>
                          </div>
                          
                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse16">16. <ins>Tratamiento</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse16" class="panel-collapse collapse">
                              <div class="box-body">

                                <div class="row">
                                  <div class="col-md-12">
                                    <div class="form-group">
                                      <textarea class="form-control" name="tratamiento" rows="3" placeholder=""></textarea>
                                    </div>
                                  </div>
                                </div>
                              
                                </div>
                            </div>
                          </div>


                          <div class="box box-info">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion1" href="#collapse17">17. <ins>Evolución</ins></ins>
                                </a>
                              </h4>
                            </div>

                            <div id="collapse17" class="panel-collapse collapse">
                              <div class="box-body">

                          <div class="col-sm-12">
                            <div align="left">

                              <label>Fecha de Evolución</label><br>
                            </div>

                            <div class="form-group has-success">
                              <input type="date" name="fechaevolucion" class="form-control input-lg" id="inputSuccess">
                            </div>


                          </div>

                          <div>

                            <div class="row">
                              <div class="col-md-12">
                                <div class="form-group">
                                  <textarea class="form-control" name="evolucion" rows="3" placeholder=""></textarea>
                                </div>
                              </div>
                            </div>

                          </div>

                          <hr>

                          </div>
                            </div>
                          </div>
                          <!-- <div class="col-sm-12">
                            <div align="center">
                              <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                            </div>
                          </div> -->

                          <!-- <div class="col-sm-6">
                            <div align="left">
                              <label>Fecha </label>
                            </div>
                            <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                            <div id="div-results"></div>
                          </div> -->

                          <!-- <div class="col-sm-6">
                            <div align="left"> 
                              <label>Hora </label>
                            </div>
                            <input  type="time" name="hora" class="form-control input-lg"  placeholder="hora" id="Hora"  onChange="verHora();" >
                            <div id="div-resultsHora"></div>
                          </div> -->

                          <!-- <div class="col-sm-6">
                            <div align="left"> 
                              <label>Motivo consulta</label>
                            </div>
                            <input  type="text" name="motivo" class="form-control input-lg"  placeholder="Motivo Consulta">
                          </div> -->

                          <!-- <div class="col-sm-6">
                            <label>Especialista </label>
                            <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
                              <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                                <?php
                                usuariosAselect($ID);
                                ?>
                            </select>
                          </div> -->
                                        <!--
                          <div class="col-sm-6">
                            <br>
                            <br>
                            <label>
                              <input type="radio" name="P" value="0" class="flat-red">
                              <i class="fa fa-user"></i> Presencial

                              <input type="radio" name="P" value="1" class="flat-red">
                              <i class="fa fa-video-camera"></i> Virtual
                            </label>
                          </div>
                                      -->
                          <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                          <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                          <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                          <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                          <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                          <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                          <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                          <div align="center">
                            <br>
                            <br>
                            <br>
                            <div class="col-sm-12">
                              <br>
                              <br>
                              <center>
                                <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                  <h2> <strong> G u a r d a r </strong> </h2>
                                </button>
                              </center>
                            </div>
                          </div>

                          <input type="hidden" name="tipo_cliente" valur="1">

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



<?php include("footer.php") ?>


<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Historia_Psicologia";
include 'AutoGuardado_Historia.php';
?>