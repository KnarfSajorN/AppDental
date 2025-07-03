  <?php
include 'header.php';
include 'menu.php';

?>

<script type="text/javascript">
  function mostrar(id) {
    if (id == "servicio1") {
      $("#servicio1").show();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();
    }

    if (id == "servicio2") {
      $("#servicio1").hide();
      $("#servicio2").show();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();

    }

    if (id == "servicio3") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").show();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").hide();

    }

    if (id == "servicio4") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").show();
      $("#servicio5").hide();
      $("#servicio6").hide();

    }

    if (id == "servicio5") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").show();
      $("#servicio6").hide();

    }

    if (id == "servicio6") {
      $("#servicio1").hide();
      $("#servicio2").hide();
      $("#servicio3").hide();
      $("#servicio4").hide();
      $("#servicio5").hide();
      $("#servicio6").show();

    }
  }
</script>

<?php

$clienteId = $_GET['clienteId'];
$usuarioId = $_GET['usuarioId'];

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $usuario_id = $rowMotorizado['usuario_id'];
  $nombre_cliente = $rowMotorizado['nombre_cliente'];
  $celular = $rowMotorizado['celular_cliente'];
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
  $antecedentes = $rowMotorizado['antecedentes'];
  $fotoperfil = $rowMotorizado['fotoperfil'];
  $tiposSangre = $rowMotorizado['tiposSangre'];
  $esDonante = $rowMotorizado['esDonante'];
  $tomaMedicamento = $rowMotorizado['tomaMedicamento'];

  $fechaNacimiento = $rowMotorizado['fechaNacimiento'];

  $entidadSalud = $rowMotorizado['entidadSalud'];
  $seguro = $rowMotorizado['seguro'];

  $nota = $rowMotorizado['nota'];
  $enfermedadesPequeno = $rowMotorizado['enfermedadesPequeno'];
  $alergias = $rowMotorizado['alergias'];

  $peso = $rowMotorizado['peso'];
  $altura = $rowMotorizado['altura'];
  $imc = $rowMotorizado['imc'];
  $ComposicionCorporal = $rowMotorizado['ComposicionCorporal'];

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
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Procedimiento</h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
      <li><a href="#">Procedimiento</a></li>
    </ol>
  </section>

  <section class="content">
    <div class="">
      <div class="col-md-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="panel box box-primary">
              <div class="box-header with-border">
                <h4 class="box-title">
                  Datos personales
                </h4>
              </div>

              <div class="box-body">

                <div class="col-md-12">

                <?php echo datosPacientes($clienteId); ?>
                
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <hr>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-6">
                    <h4 class="card-title" style="margin-right:10px;">Formatos Psiquiatría:</h4>
                    <div class="form-group">
                      <select id="status" name="status" class="form-control select2" onChange="mostrar(this.value);" style="width: 80%;">
                        <option>Seleccione tipo...</option>
                        <option value="servicio1">Diagnóstico Psiquiatría</option>
                        <option value="servicio2">Historia de Ingreso a Tratamiento Internado</option>
                        <option value="servicio3">Seguimiento y Evolución Psiquiátrica</option>
                        <option value="servicio4">Formulas </option>
                        <option value="servicio5">Orden de Exámenes</option>
                        <option value="servicio6">Epicrisis</option>

                      </select>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4 align="right"> <?php echo date("d-m-Y h:m") ?> </h4>
                  </div>
                </div>


                <div id="servicio1" class="panel box box-secundary element" style="display: none;">
                  <form action="PSQ_Guardar_Controles" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica1">
                    <div class="box-header with-border text-center">
                      <h2 class="box-title">Diagnóstico Psiquiatría</h2>
                    </div>
                    <br>
                    <input type="hidden" name="tipo_trabajo" value="Diagnóstico Psquiatría">



                    <div class="row">

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Escolaridad del Paciente:</label>
                          <input type="text" name="escolaridad" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Etapa:</label>
                          <input type="text" name="etapa" class="form-control">
                        </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-12" align="center">
                        <div class="form-group">
                          <label>
                            <h4><b>Datos del Acompañante:</b></h4></b>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Nombre:</label>
                          <input type="text" name="nombreA" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Número de Identificación:</label>
                          <input type="text" name="cc" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Edad:</label>
                          <input type="text" name="edadA" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Estado Civil:</label>
                          <input type="text" name="estadoC" class="form-control">
                        </div>
                      </div>
                    </div>


                    <div class="row">

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Teléfono:</label>
                          <input type="text" name="telA" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Ocupación:</label>
                          <input type="text" name="ocupacion" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Escolaridad:</label>
                          <input type="text" name="escolaridadA" class="form-control">
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group">
                          <label class="control-label">Dirección:</label>
                          <input type="text" name="direccion" class="form-control">
                        </div>
                      </div>

                    </div>



                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group" align="center">
                          <label>
                            <h4><b>Diagnóstico </b></h4>
                          </label>
                          <textarea class="form-control" name="diagnostico" rows="8"></textarea>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Responsable: </b></label>
                          <textarea class="form-control" name="reponsable" rows="3"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="form-group col-md-12">
                      <hr style="border-color:blue;">
                    </div>
                    <br>
                    <br>


                    <!-- <div class="row">
                      <div class="col-sm-12">
                        <div align="center"> 
                          <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                        </div>
                      </div> -->

                    <!-- <div class="col-sm-6">
                        <div align="left"><label>Fecha </label></div>
                        <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>"   onChange="verDia();">
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
                        <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" >
                          <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                          <?php usuariosAselect($ID); ?>
                        </select>
                      </div> -->
                    <!-- <div class="col-sm-6">
                        <br>
                        <br>
                        <label>
                          <input type="radio" name="P" value="0" class="flat-red" checked>
                          <i class="fa fa-user"></i>  Presencial  
                          <input type="radio" name="P" value="1"  class="flat-red"  >
                          <i class="fa fa-video-camera"></i>   Virtual
                        </label>
                      </div> -->

                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div align="center" class="col-md-12">
                      <br><br><br>
                      <div class="col-md-12">
                        <br><br>
                        <center><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>

                    <input type="hidden" name="tipo_cliente" valur="1">
                </div>
                </form>
              </div>




              <div id="servicio2" class="panel box box-secundary element" style="display: none;">
                <form action="PSQ_Guardar_Controles" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica2">
                  <div class="box-header with-border text-center">
                    <h2 class="box-title">Historía Clínica General de Psiquiatría para Ingreso a Tratamiento Internado</h2>
                  </div>
                  <br>


                  <input type="hidden" name="tipo_trabajo" value="Ingreso a Tratamiento Internado">


                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Escolaridad del Paciente:</label>
                        <input type="text" name="escolar" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Etapa:</label>
                        <input type="text" name="etapa2" class="form-control">
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-md-12" align="center">
                      <div class="form-group">
                        <label>
                          <h4><b>Datos del Acompañante:</b></h4></b>
                        </label>
                      </div>
                    </div>
                  </div>

                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Nombre:</label>
                        <input type="text" name="anombre" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Número de Identificación:</label>
                        <input type="text" name="ide" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Edad:</label>
                        <input type="text" name="Aedad" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Estado Civil:</label>
                        <input type="text" name="ec" class="form-control">
                      </div>
                    </div>
                  </div>


                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Teléfono:</label>
                        <input type="text" name="Atel" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Ocupación:</label>
                        <input type="text" name="ocup" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Escolaridad:</label>
                        <input type="text" name="Aescolar" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Dirección:</label>
                        <input type="text" name="dir" class="form-control">
                      </div>
                    </div>

                  </div>


                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" align="center">
                        <label>
                          <h4><b>Enfermedad Actual</b></h4>
                        </label>
                        <textarea class="form-control" name="enfermedad" rows="8"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group" align="center">
                        <label>
                          <h4><b>Historia de Consumo</b></h4>
                        </label>

                      </div>
                    </div>
                  </div>


                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Sustancia</label>

                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Inicio</label>

                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Hasta</label>

                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Observaciones</label>

                      </div>
                    </div>

                  </div>



                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="sustancia1" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="inicio1" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="hasta1" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="observacion1" class="form-control">
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="sustancia2" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="inicio2" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="hasta2" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="observacion2" class="form-control">
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="sustancia3" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="inicio3" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="hasta3" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="observacion3" class="form-control">
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="sustancia4" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="inicio4" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="hasta4" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="observacion4" class="form-control">
                      </div>
                    </div>

                  </div>
                  <div class="row">

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="sustancia5" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="inicio5" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="hasta5" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="observacion5" class="form-control">
                      </div>
                    </div>

                  </div>



                  <div class="row">
                    <div class="form-group col-md-6">
                      <div class="form-group">
                        <label> Alergias a Medicamentos </label>
                        <textarea class="form-control" name="alergia" rows="3"></textarea>
                      </div>
                    </div>


                    <div class="form-group col-md-6">
                      <div class="form-group">
                        <label> Antecedentes Patológicos</label>
                        <textarea class="form-control" name="patologicos" rows="3"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Antecedentes Terapéuticos</label>
                      <textarea class="form-control" name="terapeuticos" rows="3"></textarea>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Examen Mental</label>
                      <textarea class="form-control" name="mental" rows="8"></textarea>
                    </div>
                  </div>
                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Diagnóstico</label>
                      <textarea class="form-control" name="diagnostico1" rows="8"></textarea>
                    </div>
                  </div>


                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Tratamientos Suministrados con Ocasión de una Posible Falla en la Atención</label>
                      <textarea class="form-control" name="tratamiento" rows="3"></textarea>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Observaciones</label>
                      <textarea class="form-control" name="observ" rows="3"></textarea>
                    </div>
                  </div>


                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Órdenes Médicas</label>
                      <textarea class="form-control" name="orden" rows="3"></textarea>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Anexos</label>
                      <textarea class="form-control" name="anexos" rows="3"></textarea>
                    </div>
                  </div>




                  <div class="form-group col-md-12">
                    <div class="form-group">
                      <label> Profesional Responsable:</label>
                      <textarea class="form-control" name="prof" rows="3"></textarea>
                    </div>
                  </div>





                  <div class="form-group col-md-12">
                    <hr style="border-color:blue;">
                  </div>

                  <br>
                  <br>
                  <br>

                  <div class="row">
                    <!--  <div class="col-sm-12">
                      <div align="center">
                        <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left"><label>Fecha </label></div>
                      <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">
                      <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                      <div id="div-results"></div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left">
                        <label>Hora </label>
                      </div>
                      <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                      <div id="div-resultsHora"></div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left">
                        <label>Motivo consulta</label>
                      </div>
                      <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">
                    </div>
                    <div class="col-sm-6">
                      <label>Especialista </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                        <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                        <?php usuariosAselect($ID); ?>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <br>
                      <br>
                      <label>
                        <input type="radio" name="P" value="0" class="flat-red" checked>
                        <i class="fa fa-user"></i> Presencial
                        <input type="radio" name="P" value="1" class="flat-red">
                        <i class="fa fa-video-camera"></i> Virtual
                      </label>
                    </div> -->

                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div align="center" class="col-md-12">
                      <br><br><br>
                      <div class="col-md-12">
                        <br><br>
                        <center><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>

                    <input type="hidden" name="tipo_cliente" valur="1">
                  </div>
                </form>
              </div>



              <div id="servicio3" class="panel box box-secundary element" style="display: none;">
                <form action="PSQ_Guardar_Controles" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica3">
                  <div class="box-header with-border text-center">
                    <h2 class="box-title">Seguimiento Psiquiatría</h2>
                  </div>
                  <br>



                  <input type="hidden" name="tipo_trabajo" value="Seguimiento Psiquiatría">

                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                  <div class="row">

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Escolaridad del Paciente:</label>
                        <input type="text" name="escuela" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                        <label class="control-label">Etapa:</label>
                        <input type="text" name="etapa3" class="form-control">
                      </div>
                    </div>

                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Diagnóstico de Seguimiento:</label>
                        <textarea class="form-control" id="diagSeguimiento" name="desaSesion" placeholder="" rows="10"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Firma del Profesional Responsable:</label>
                        <textarea class="form-control" id="procedimiento" name="profRespo" placeholder="" rows="3"></textarea>
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-md-12">
                    <hr style="border-color:blue;">
                  </div>
                  <br>
                  <br>

                  <div class="row">
                    <!-- <div class="col-sm-12">
                    <div align="center">
                      <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left"><label>Fecha </label></div>
                    <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <div id="div-results"></div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Hora </label>
                    </div>
                    <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                    <div id="div-resultsHora"></div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Motivo consulta</label>
                    </div>
                    <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">
                  </div>
                  <div class="col-sm-6">
                    <label>Especialista </label>
                    <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                      <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                      <?php usuariosAselect($ID); ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <br>
                    <br>
                    <label>
                      <input type="radio" name="P" value="0" class="flat-red" checked>
                      <i class="fa fa-user"></i> Presencial
                      <input type="radio" name="P" value="1" class="flat-red">
                      <i class="fa fa-video-camera"></i> Virtual
                    </label>
                  </div> -->

                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div align="center" class="col-md-12">
                      <br><br><br>
                      <div class="col-md-12">
                        <br><br>
                        <center><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>

                    <input type="hidden" name="tipo_cliente" valur="1">
                  </div>
                </form>
              </div>


              <div id="servicio4" class="panel box box-secundary element" style="display: none;">
                <form action="PSQ_Guardar_Controles" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica4">
                  <div class="box-header with-border text-center">
                    <h2 class="box-title">Fórmula</h2>
                  </div>
                  <br>



                  <input type="hidden" name="tipo_trabajo" value="Fórmula">

                  <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">




                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="control-label">Cantidad</label>

                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Medicamento</label>

                      </div>
                    </div>


                    <div class="col-md-2">
                      <div class="form-group">
                        <label class="control-label">Vía</label>

                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <label class="control-label">Dosis</label>

                      </div>
                    </div>
                    <div class="col-md-2">
                      <div clas="form-group">
                        <label class="control-label">Hora</label>

                      </div>
                    </div>

                  </div>





                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fcantidad1" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="medicamento1" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fvia1" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="dosis1" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="time" name="hora1" class="form-control">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fcantidad2" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="medicamento2" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fvia2" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="dosis2" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="time" name="hora2" class="form-control">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fcantidad3" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="medicamento3" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fvia3" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="dosis3" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="time" name="hora3" class="form-control">
                      </div>
                    </div>

                  </div>

                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fcantidad4" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="medicamento4" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fvia4" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="dosis4" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="time" name="hora4" class="form-control">
                      </div>
                    </div>

                  </div>


                  <div class="row">

                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fcantidad5" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-3">
                      <div class="form-group">

                        <input type="text" name="medicamento5" class="form-control">
                      </div>
                    </div>


                    <div class="col-md-2">
                      <div class="form-group">

                        <input type="text" name="fvia5" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-3">
                      <div class="form-group">
                        <input type="text" name="dosis5" class="form-control">
                      </div>
                    </div>

                    <div class="col-md-2">
                      <div class="form-group">
                        <input type="time" name="hora5" class="form-control">
                      </div>
                    </div>

                  </div>






                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label" for="inputSuccess">Firma del Profesional Responsable:</label>
                        <textarea class="form-control" id="procedimiento" name="profRespo" placeholder="" rows="3"></textarea>
                      </div>
                    </div>
                  </div>


                  <div class="form-group col-md-12">
                    <hr style="border-color:blue;">
                  </div>
                  <br>
                  <br>

                  <div class="row">
                    <!-- <div class="col-sm-12">
                    <div align="center">
                      <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left"><label>Fecha </label></div>
                    <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <div id="div-results"></div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Hora </label>
                    </div>
                    <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                    <div id="div-resultsHora"></div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Motivo consulta</label>
                    </div>
                    <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">
                  </div>
                  <div class="col-sm-6">
                    <label>Especialista </label>
                    <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                      <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                      <?php usuariosAselect($ID); ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <br>
                    <br>
                    <label>
                      <input type="radio" name="P" value="0" class="flat-red" checked>
                      <i class="fa fa-user"></i> Presencial
                      <input type="radio" name="P" value="1" class="flat-red">
                      <i class="fa fa-video-camera"></i> Virtual
                    </label>
                  </div> -->

                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div align="center" class="col-md-12">
                      <br><br><br>
                      <div class="col-md-12">
                        <br><br>
                        <center><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>

                    <input type="hidden" name="tipo_cliente" valur="1">
                  </div>
                </form>
              </div>


              <div id="servicio5" class="panel box box-secundary element" style="display: none;">
                <form action="PSQ_Guardar_Controles" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica5">
                  <div class="box-header with-border text-center">
                    <h2 class="box-title">Orden de Exámenes</h2>
                  </div>
                  <br>
                  <input type="hidden" name="tipo_trabajo" value="Orden de Exámenes">

                  <div class="col-md-12">
                    <div class="form-group" align="center">
                      <label>
                        <h4><b>Descripción </b></h4>
                      </label>
                      <textarea class="form-control" name="descri" rows="8"></textarea>
                    </div>
                  </div>


                  <div class="">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label><b>Responsable: </b></label>
                        <textarea class="form-control" name="reponsabl" rows="8"></textarea>
                      </div>
                    </div>
                  </div>

                  <div class="form-group col-md-12">
                    <hr style="border-color:blue;">
                  </div>
                  <br>
                  <br>


                  <div class="row">
                    <!-- <div class="col-sm-12">
                    <div align="center">
                      <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                    </div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left"><label>Fecha </label></div>
                    <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                    <div id="div-results"></div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Hora </label>
                    </div>
                    <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                    <div id="div-resultsHora"></div>
                  </div>

                  <div class="col-sm-6">
                    <div align="left">
                      <label>Motivo consulta</label>
                    </div>
                    <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">
                  </div>
                  <div class="col-sm-6">
                    <label>Especialista </label>
                    <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                      <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                      <?php usuariosAselect($ID); ?>
                    </select>
                  </div>
                  <div class="col-sm-6">
                    <br>
                    <br>
                    <label>
                      <input type="radio" name="P" value="0" class="flat-red" checked>
                      <i class="fa fa-user"></i> Presencial
                      <input type="radio" name="P" value="1" class="flat-red">
                      <i class="fa fa-video-camera"></i> Virtual
                    </label>
                  </div> -->

                    <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                    <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                    <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                    <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                    <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                    <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                    <div align="center" class="col-md-12">
                      <br><br><br>
                      <div class="col-md-12">
                        <br><br>
                        <center><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>

                    <input type="hidden" name="tipo_cliente" valur="1">
                  </div>
                </form>
              </div>

              <div id="servicio6" class="panel box box-secundary element" style="display: none;">
                <form action="PSQ_Guardar_Controles" method="POST" enctype="multipart/form-data" id="FormularioHistoriaClinica6">
                  <div class="box-header with-border text-center">
                    <h2 class="box-title">Epicrisis</h2>
                  </div>
                  <br>
                  <input type="hidden" name="tipo_trabajo" value="Epicrisis">

                  <div class="col-md-12">

                    <br>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="control-label">Servicio </label>
                        <input type="text" name="servicio" class="form-control">
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Servicio de Ingreso</label>
                          <input type="text" name="ingreso" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fecha de Ingreso</label>
                          <input type="date" name="fecHAI" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora de Ingreso</label>
                          <input type="time" name="horai" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Servicio de Egreso</label>
                          <input type="text" name="egreso" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Fecha de Egreso</label>
                          <input type="date" name="fechaE" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Hora de Egreso</label>
                          <input type="time" name="horaE" class="form-control">
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-12" align="center">
                        <div class="form-group">
                          <label>
                            <h3><b>Ingreso</b></h3></b>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12" align="center">
                        <div class="form-group">
                          <label>
                            <h4><b>Signos Vitales</b></h4></b>
                          </label>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Peso</label>
                          <input type="text" name="peso" class="form-control">
                        </div>
                      </div>




                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Talla</label>
                          <input type="text" name="talla" class="form-control">
                        </div>
                      </div>

                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">FC</label>
                          <input type="text" name="fc" class="form-control">
                        </div>
                      </div>



                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">FR</label>
                          <input type="text" name="fr" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">TA</label>
                          <input type="text" name="ta" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-4">
                        <div class="form-group">
                          <label class="control-label">Profesional</label>
                          <input type="text" name="profe" class="form-control">
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Motivo de la Consulta </b></label>
                          <textarea class="form-control" name="consultam" rows="3"></textarea>
                        </div>
                      </div>
                    </div>




                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Enfermedad Actual </b></label>
                          <textarea class="form-control" name="enferactual" rows="3"></textarea>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Antecedentes Personales </b></label>
                          <textarea class="form-control" name="antec" rows="3"></textarea>
                        </div>
                      </div>
                    </div>




                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Examen Psicológico</b></label>
                          <textarea class="form-control" name="psico" rows="3"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Diagnóstico </b></label>
                          <textarea class="form-control" name="diagno" rows="3"></textarea>
                        </div>
                      </div>
                    </div>




                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Conducta </b></label>
                          <textarea class="form-control" name="conducta" rows="3"></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-12" align="center">
                        <div class="form-group">
                          <label>
                            <h3><b>Evolución</b></h3></b>
                          </label>
                        </div>
                      </div>
                    </div>





                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Cambios en el Estado del Paciente(Complicaciones, Accidentes o Eventos Adversos)</b></label>
                          <textarea class="form-control" name="cambios" rows="3"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12" align="center">
                        <div class="form-group">
                          <label>
                            <h3><b>Egreso</b></h3></b>
                          </label>
                        </div>
                      </div>
                    </div>


                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Diagnóstico Principal
                            </b></label>
                          <textarea class="form-control" name="diagEgreso" rows="3"></textarea>
                        </div>
                      </div>
                    </div>



                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Otros Diagnósticos
                            </b></label>
                          <textarea class="form-control" name="otroD" rows="3"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Condiciones de la Salida del Paciente
                            </b></label>
                          <textarea class="form-control" name="SALIDAP" rows="3"></textarea>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label><b>Recomendaciones
                            </b></label>
                          <textarea class="form-control" name="recomenda" rows="3"></textarea>
                        </div>
                      </div>
                    </div>





                    <div class="row">
                      <div class="col-md-12" align="center">
                        <div class="form-group">
                          <label>
                            <h3><b>Profesional de Salud</b></h3></b>
                          </label>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Nombre y Apellido</label>
                          <input type="text" name="nomP" class="form-control">
                        </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="control-label">Firma y Número de Registro</label>
                          <input type="text" name="FIRMAp" class="form-control">
                        </div>
                      </div>
                    </div>


                    <div class="form-group col-md-12">
                      <hr style="border-color:blue;">
                    </div>
                    <br>
                    <br>


                    <div class="row">
                      <!-- <div class="col-sm-12">
                      <div align="center">
                        <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                      </div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left"><label>Fecha </label></div>
                      <input type="date" name="fecha" class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>" onChange="verDia();">
                      <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                      <div id="div-results"></div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left">
                        <label>Hora </label>
                      </div>
                      <input type="time" name="hora" class="form-control input-lg" placeholder="hora" id="Hora" onChange="verHora();">
                      <div id="div-resultsHora"></div>
                    </div>

                    <div class="col-sm-6">
                      <div align="left">
                        <label>Motivo consulta</label>
                      </div>
                      <input type="text" name="motivo" class="form-control input-lg" placeholder="Motivo Consulta">
                    </div>
                    <div class="col-sm-6">
                      <label>Especialista </label>
                      <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;">
                        <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
                        <?php usuariosAselect($ID); ?>
                      </select>
                    </div>
                    <div class="col-sm-6">
                      <br>
                      <br>
                      <label>
                        <input type="radio" name="P" value="0" class="flat-red" checked>
                        <i class="fa fa-user"></i> Presencial
                        <input type="radio" name="P" value="1" class="flat-red">
                        <i class="fa fa-video-camera"></i> Virtual
                      </label>
                    </div> -->

                      <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                      <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                      <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
                      <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                      <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                      <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">
                      <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">

                      <div class="col-md-12" align="center">
                        <br><br><br>
                        <div class="col-md-12">
                          <br><br>
                          <center><button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow m-1" style="width:100%">
                              <h2> <strong> G u a r d a r </strong> </h2>
                            </button></center>
                        </div>
                      </div>

                      <input type="hidden" name="tipo_cliente" valur="1">
                    </div>
                </form>
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
$Nombre_Tabla_autoguardado = "Controles_Psiquiatra";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";

$HistoriasClinicasAutoguardado_id='"FormularioHistoriaClinica1", "FormularioHistoriaClinica2", "FormularioHistoriaClinica3", "FormularioHistoriaClinica4", "FormularioHistoriaClinica5", "FormularioHistoriaClinica6"';//importante para las historias multiples, mantener estructura de comillas simples y dobles
include 'AutoGuardados/HistoriaEncryptadaMultiple/AutoGuardado_Historia_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado

?>
