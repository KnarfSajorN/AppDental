<?php
include 'header.php';
include 'menu.php';

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






  // -------------------------------------

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

$queryconfig = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario=$ID");


$nrowl = mysqli_num_rows($queryconfig);
while ($rowconfig = mysqli_fetch_array($queryconfig)) {
  $cie10 = $rowconfig['cie10'];
  $pro1  = $rowconfig['pro1'];
  $pro2  = $rowconfig['pro2'];
}

$queryList = mysqli_query($conn3, "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
$nrowl = mysqli_num_rows($queryList);

while ($row_recordset32 = mysqli_fetch_array($queryList)) {

  $idReceta    = $row_recordset32['idReceta'];
}

if ($queryList == '') {
  $idR == 1;
} else {
  $idR   = ($idReceta + 1);
}



?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta Médica, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?> </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta Médica </a></li>
    </ol>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-md-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">

              <div class=" box-solid">

                <!-- /.box-header -->
                <div class="box-body">
                  <div class="box-group" id="accordion1">
                    <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                    <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
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

                    <form action="HO_Guardar_Historia_Otorrino" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data" id="FormularioHistoriaClinica">

                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
                              Nariz
                            </a>
                          </h4>
                        </div>
                        <div id="Entrevista" class="panel-collapse collapse">
                          <div class="box-body row">

                            <div class="form-group col-md-12">
                              <div align="left">Motivo de Consulta</div>
                              <textarea id="motivoConsulta" name="motivoConsulta_nariz" class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Obstrucción Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="obstruccion" name="obstruccion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="FND"> FND </option>
                                  <option value="FNI "> FNI </option>
                                  <option value="Ambas">Ambas</option>
                                  <option value="Alterna ">Alterna</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Obstrucción Más Intensa</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="obstruccion_intensa" name="obstruccion_intensa[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Derecha "> Derecha </option>
                                  <option value="Izquierda "> Izquierda </option>
                                  <option value="Ambas">Ambas</option>
                                </select>
                              </div>
                            </div>




                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Estornudos</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="estornudos" name="estornudos[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Frecuentes ">Frecuentes </option>
                                  <option value="Intermitentes">Intermitentes</option>
                                  <option value="Raros">Raros</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Secreción Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="secreccion_nasal" name="secreccion_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Derecha">Derecha</option>
                                  <option value="Izquierda">Izquierda</option>
                                  <option value="Ambas">Ambas</option>
                                  <option value="Cristalina">Cristalina</option>
                                  <option value="Mucosa">Mucosa</option>
                                  <option value="Purulenta">Purulenta</option>
                                  <option value="Con Sangre ">Con Sangre </option>
                                  <option value="Secreción Retronasal">Secreción Retronasal</option>
                                  <option value="Tos">Tos</option>
                                </select>
                              </div>
                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Prurito</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="prurito" name="prurito[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Nasal">Nasal</option>
                                    <option value="Ocular">Ocular</option>
                                    <option value="Carraspeo">Carraspeo</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Epistaxis</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="epistaxis" name="epistaxis[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Anterior">Anterior</option>
                                    <option value="Posterior">Posterior</option>
                                    <option value="FND">FND</option>
                                    <option value="FNI">FNI</option>
                                    <option value="Leve">Leve</option>
                                    <option value="Moderada">Moderada</option>
                                    <option value="Grave">Grave</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Olfato</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="olfato" name="olfato[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Hiposmia">Hiposmia</option>
                                    <option value="Anosmia">Anosmia</option>
                                    <option value="Parosmia">Parosmia</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Cefalea</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="cefalea" name="cefalea[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                <option value="Hemicránea">Hemicránea</option>
                                <option value="Holocraneal">Holocraneal</option>
                                <option value="Fronto-Facial">Fronto-Facial</option>

                                </select>

                              </div>

                            </div>
                            
                            <div class="form-group col-md-12" align="center">
                                <h4 class="box-title">
                                <center>Inspección</center>
                                </h4>
                            </div>

                            <div class="form-group col-md-6" align="center">
                                Simetría Facial <br><br>
                              <input value="1" type="radio" name="sime" id="lt"> Si
                              <input value="2" type="radio" name="sime" id="lt"> No
                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Pirámide Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="piramide_nasal" name="piramide_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Recta">Recta</option>
                                    <option value="Laterorrinia Derecha">Laterorrinia Derecha</option>
                                    <option value="Izquierda">Izquierda</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Dorso Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="dorso_nasal" name="dorso_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Cifosis Ósea">Cifosis Ósea</option>
                                    <option value="Cartilaginosa">Cartilaginosa</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Punta Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="punta_nasal" name="punta_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Globulosa">Globulosa</option>
                                    <option value="Bien Definida">Bien Definida</option>
                                    <option value="Cuadrada">Cuadrada</option>
                                    <option value="Buena Proyección">Buena Proyección</option>
                                    <option value="Hiper-Proyectada">Hiper-Proyectada</option>
                                    <option value="Hipo-Proyectada">Hipo-Proyectada</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Ángulo Naso-Labial</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="angulo_naso" name="angulo_naso[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Recto">Recto</option>
                                    <option value="Abierto">Abierto</option>
                                    <option value="Cerrado">Cerrado</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Ángulo Fronto – Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="angulo_fronto" name="angulo_fronto[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Adecuado">Adecuado</option>
                                    <option value="Cerrado">Cerrado</option>
                                    <option value="Piel Normal">Piel Normal</option>
                                    <option value="Piel Fina">Piel Fina</option>
                                    <option value="Piel Gruesa">Piel Gruesa</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Columela</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="columella" name="columella[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Colgante">Colgante</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                                <div class="form-group col-md-12">
                                    <div align="left">Relación Columela – Punta</div>
                                </div>
                                <div class="form-group col-md-12" align="right">
                                    <input type="text" class="form-control input-lg" id="relacion_columela" name="relacion_columela">
                                </div>
                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Puntos Paranasales Dolorosos</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="puntos_paranasales" name="puntos_paranasales[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Ciliares">Ciliares</option>
                                    <option value="Maxilares">Maxilares</option>
                                    <option value="Etmoidales">Etmoidales</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Base Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="base_nasal" name="base_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Simétrica">Simétrica</option>
                                    <option value="Asimétrica">Asimétrica</option>
                                    <option value="Narinas Redondeadas">Narinas Redondeadas</option>
                                    <option value="Narinas Piriformes">Narinas Piriformes</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-12" align="center">
                                <h4 class="box-title">
                                <center>Rinoscopia Anterior</center>
                                </h4>
                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Séptum Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="septum_nasal" name="septum_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Recto">Recto</option>
                                    <option value="Desviado">Desviado</option>
                                    <option value="Deflexión en *C*">Deflexión en *C*</option>
                                    <option value="Sinuoso">Sinuoso</option>
                                    <option value="FND">FND</option>
                                    <option value="FNI">FNI</option>
                                    <option value="Septo-Caudal">Septo-Caudal</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Mucosa Nasal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="mucosa_nasal" name="mucosa_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Rosada">Rosada</option>
                                    <option value="Pálida">Pálida</option>
                                    <option value="Rojo-Violácea">Rojo-Violácea</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Cornetes Nasales</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="cornetes_nasal" name="cornetes_nasal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Hipertrofia Derecha">Hipertrofia Derecha</option>
                                    <option value="Hipertrofia Izquierda">Hipertrofia Izquierda</option>
                                    <option value="Atrofia">Atrofia</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Cornete Medio Bulloso</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="cornete_bulloso" name="cornete_bulloso[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Derecho">Derecho</option>
                                    <option value="Izquierdo">Izquierdo</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Observaciones</div>
                              <textarea id="Observaciones_nariz" name="Observaciones_nariz" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>





                          </div>
                        </div>
                      </div>

















                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                              Desórdenes de Sueño
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="box-body row">

                            <div class="form-group col-md-12">
                              <div align="left">Motivo de Consulta</div>
                              <textarea id="motivoconsulta_desorden" name="motivoconsulta_desorden" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-6" align="center">
                              Apneas de Sueño <br><br>
                              <input value="1" type="radio" name="sueno" id="lt"> Si
                              <input value="2" type="radio" name="sueno" id="lt"> No
                            </div>
                            <div class="form-group col-md-6" align="center">
                              Respiración Oral <br><br>
                              <input value="1" type="radio" name="respi" id="lt"> Si
                              <input value="2" type="radio" name="respi" id="lt"> No
                            </div>
                            <div class="form-group col-md-6" align="center">
                              Ronca en la Noche <br><br>
                              <input value="1" type="radio" name="ronca" id="lt"> Si
                              <input value="2" type="radio" name="ronca" id="lt"> No
                            </div>

                            <div class="form-group col-md-6" align="center">
                              Se Mueve Mucho al Dormir <br><br>
                              <input value="1" type="radio" name="mueve" id="lt"> Si
                              <input value="2" type="radio" name="mueve" id="lt"> No
                            </div>


                            <div class="form-group col-md-4">
                              <div align="left">Peso en Kg</div>
                              <input type="number" class="form-control input-lg" id="peso" name="peso" onChange="calcularimc();" step="any">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">Talla en <strong> Centímetros </strong></div>
                              <input type="number" class="form-control input-lg" id="altura" name="altura" onChange="calcularimc();" step="any">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">IMC</div>
                              <input type="number" class="form-control input-lg" id="imc" name="imc" step="any">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Posición para Dormir</div>
                              <input type="text" class="form-control input-lg" id="posicion" name="posicion">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">C. Cuello</div>
                              <input type="text" class="form-control input-lg" id="cuello" name="cuello">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">C. Abdominal</div>
                              <input type="text" class="form-control input-lg" id="abdominal" name="abdominal">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Epworth</div>
                              <input type="text" class="form-control input-lg" id="epwort" name="epwort">
                            </div>


                            <div class="form-group col-md-6">
                              <div align="left">Stop-Bang</div>
                              <input type="text" class="form-control input-lg" id="stopbang" name="stopbang">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Interrogatorio</div>
                              <input type="text" class="form-control input-lg" id="interrogatorio" name="interrogatorio">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Movilidad</div>
                              <input type="text" class="form-control input-lg" id="movilidad" name="movilidad">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Insomnio</div>
                              <input type="text" class="form-control input-lg" id="insomio" name="insomio">
                            </div>

                            <div class="form-group col-md-12" align="center">
                              Apneas Vividas <br><br>
                              <input value="1" type="radio" name="apneas" id="lt"> Si
                              <input value="2" type="radio" name="apneas" id="lt"> No
                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Antecedentes</div>
                              <textarea id="antecedentes" name="antecedentes" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title">
                                <center>Examen Físico</center>
                                </h4>
                            </div>


                            <div class="form-group col-md-12">
                              <div class="form-group col-md-12">
                                <div align="left">Pang Rotemberg</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="pang_rotemberg" name="pang_rotemberg[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Imita Ronquido">Imita Ronquido</option>
                                    <option value="No Imita Ronquido">No Imita Ronquido</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title">
                                <center>Nariz</center>
                                </h4>
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Desviación Septal</div>
                              <input type="text" class="form-control input-lg" id="desviacion" name="desviacion">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Colapso Valvular</div>
                              <input type="text" class="form-control input-lg" id="colapso_valvular" name="colapso_valvular">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Izquierdo</div>
                              <input type="text" class="form-control input-lg" id="Izq" name="Izq">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Derecho</div>
                              <input type="text" class="form-control input-lg" id="Der" name="Der">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Izquierdo</div>
                              <input type="text" class="form-control input-lg" id="Izqui" name="Izqui">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Derecho</div>
                              <input type="text" class="form-control input-lg" id="Dere" name="Dere">
                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title">
                                <center>Lengua</center>
                                </h4>
                            </div>

                            <div class="form-group col-md-12">
                              <div align="left">Friedman Tongue Position (F.T.P.) </div>
                              <input type="text" class="form-control input-lg" id="friedman" name="friedman">
                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title">
                                <center>Paladar</center>
                                </h4>
                            </div>

                            <div class="form-group col-md-12">
                              <div align="left">Mallampati Modificado</div>
                              <input type="text" class="form-control input-lg" id="malampati_paladar" name="malampati_paladar">
                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title">
                                <center>Amígdalas</center>
                                </h4>
                            </div>

                            <div class="form-group col-md-12">
                              <div align="left">Hipertrofia Grado</div>
                              <input type="text" class="form-control input-lg" id="hiper" name="hiper">
                            </div>

                            <div class="form-group col-md-12">
                                <h4 class="box-title">
                                <center>Boca y Orofaringe</center>
                                </h4>
                            </div>


                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Lengua</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="lengua" name="lengua[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Normal">Normal</option>
                                    <option value="Macroglosia">Macroglosia</option>
                                </select>

                              </div>

                            </div>
                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Paladar Óseo</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="paladar_oseo" name="paladar_oseo[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Normal">Normal</option>
                                    <option value="Ojival">Ojival</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Paladar Blando</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="palador_blando" name="palador_blando[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Normal">Normal</option>
                                    <option value="Ojival">Ojival</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Úvula</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="uvula" name="uvula[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                    <option value="Normal/ Bífida">Normal/ Bífida</option>
                                    <option value="Ojival">Ojival</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-4">
                              <div align="left">Base</div>
                              <input type="text" class="form-control input-lg" id="base" name="base">
                            </div>


                            <div class="form-group col-md-4">
                              <div align="left">Largo</div>
                              <input type="text" class="form-control input-lg" id="largo" name="largo">
                            </div>


                            <div class="form-group col-md-4">
                              <div align="left">Distancia Intermolar</div>
                              <input type="text" class="form-control input-lg" id="distancia" name="distancia">
                            </div>


                            <div class="form-group col-md-4">
                              <div align="left">Distancia Punto</div>
                              <input type="text" class="form-control input-lg" id="distancia_punto" name="distancia_punto">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">Palato-Faríngeo (PASS)</div>
                              <input type="text" class="form-control input-lg" id="palato_faringeo" name="palato_faringeo">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">Gap Interpalto Faríngeo</div>
                              <input type="text" class="form-control input-lg" id="gap_inter" name="gap_inter">
                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Perfil Cara</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_cara" name="perfil_cara[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Ortognata">Ortognata</option>
                                  <option value="Prognata">Prognata</option>
                                  <option value="Retrognata">Retrognata</option>
                                </select>

                              </div>

                            </div>
                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Clasificación (Angle)</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="clasificacion" name="clasificacion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Tipo 1">Tipo 1</option>
                                  <option value="Tipo 2">Tipo 2</option>
                                  <option value="Tipo 3">Tipo 3</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Articulación Temporo-Mandibular</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="articulacion_temporo" name="articulacion_temporo[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Clic de Apertura Izquierda">Clic de Apertura Izquierda</option>
                                  <option value="Derecha">Derecha</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Apertura Bucal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="apertura_bucal" name="apertura_bucal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="> 35 mm">> 35 mm</option>
                                </select>

                              </div>

                            </div>





                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Nasoendoscopia</div>
                              </div>
                              <div class="form-group col-md-12">
                                <input type="text" class="form-control input-lg" id="nasoendoscopia" name="nasoendoscopia">
                              </div>
                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Lugar de Obstrucción</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="lugar_obstrccion" name="lugar_obstrccion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Sentado">Sentado</option>
                                  <option value="Decúbito">Decúbito</option>
                                  <option value="Lateral Derecho">Lateral Derecho</option>
                                  <option value="Lateral Izquierdo">Lateral Izquierdo</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-6">
                              <div align="left">Tipo de Cierre al Roncar</div>
                              <input type="text" class="form-control input-lg" id="tipo_cierre" name="tipo_cierre">
                            </div>


                            <div class="form-group col-md-6">
                              <div align="left">Tipo Cierre %</div>
                              <input type="text" class="form-control input-lg" id="tipo_cierre_por" name="tipo_cierre_por">
                            </div>


                            <div class="form-group col-md-6">
                              <div align="left">Rinofaringe</div>
                              <input type="text" class="form-control input-lg" id="rinofaringe" name="rinofaringe">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">%</div>
                              <input type="text" class="form-control input-lg" id="rinofaringe_por" name="rinofaringe_por">
                            </div>


                            <div class="form-group col-md-6">
                              <div align="left">Orofaringe</div>
                              <input type="text" class="form-control input-lg" id="orofaringe" name="orofaringe">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">%</div>
                              <input type="text" class="form-control input-lg" id="orofaringe_por" name="orofaringe_por">
                            </div>


                            <div class="form-group col-md-6">
                              <div align="left">Base de Lengua</div>
                              <input type="text" class="form-control input-lg" id="base_lengua" name="base_lengua">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">%</div>
                              <input type="text" class="form-control input-lg" id="base_lengua_por" name="base_lengua_por">
                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Epiglotis %</div>
                              <input type="text" class="form-control input-lg" id="epiglotis_por" name="epiglotis_por">
                            </div>




                            <div class="form-group col-md-12">
                              <h4 class="box-title">
                                <center>Maniobra: Mejora Apertura</center>
                              </h4>
                            </div>


                            <div class="form-group col-md-6" align="center">
                              Protrusión Lingual <br><br>
                              <input value="1" type="radio" name="protru" id="lt"> Si
                              <input value="2" type="radio" name="protru" id="lt"> No
                            </div>


                            <div class="form-group col-md-6" align="center">
                              Protrusión Mandibular <br><br>
                              <input value="1" type="radio" name="protru_mani" id="lt"> Si
                              <input value="2" type="radio" name="protru_mani" id="lt"> No
                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Amígdalas Linguales: (L.T.H. Friedman)</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="amigdalas_linguales" name="amigdalas_linguales[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Grado 0">Grado 0</option>
                                  <option value="Grado 1">Grado 1</option>
                                  <option value="Grado 2">Grado 2</option>
                                  <option value="Grado 3">Grado 3</option>
                                  <option value="Grado 4">Grado 4</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Epiglotis %</div>
                              </div>
                              <div class="form-group col-md-12">
                                <input type="text" class="form-control input-lg" id="epiglotis" name="epiglotis">
                              </div>
                            </div>

                            <div class="form-group col-md-12">
                              <h4 class="box-title">
                                <center>Pronóstico: Escala de Friedman</center>
                              </h4>
                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Estadio o Fase</div>
                              <input type="text" class="form-control input-lg" id="Estadio" name="Estadio">
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Estadio o Fase</label>

                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">Mallampati Modificado</label>

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <label class="control-label">Amígdalas</label>

                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <label class="control-label">IMC</label>

                              </div>
                            </div>

                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="esta" class="form-control">

                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="malampati" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="amigdalas" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="text" name="IMC" class="form-control">

                              </div>
                            </div>

                            <!--<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic1" class="form-control">
                        </div>
                      </div>-->

                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="esta1" class="form-control">

                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="malampati1" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="amigdalas1" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="text" name="IMC1" class="form-control">

                              </div>
                            </div>

                            <!--<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic11" class="form-control">
                        </div>
                      </div>-->
                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="esta2" class="form-control">

                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="malampati2" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="amigdalas2" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="text" name="IMC2" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="esta3" class="form-control">

                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="malampati3" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="amigdalas3" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="text" name="IMC3" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="esta4" class="form-control">

                              </div>
                            </div>

                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="malampati4" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                <input type="text" name="amigdalas4" class="form-control">
                              </div>
                            </div>

                            <div class="col-md-2">
                              <div class="form-group">
                                <input type="text" name="IMC4" class="form-control">

                              </div>
                            </div>






                            <div class="col-md-8">
                              <div class="form-group">
                                <label class="control-label">Estudio de Sueño</label>

                              </div>
                            </div>
                            <div class="col-md-4">
                              <div class="form-group">
                                <label class="control-label">Fecha</label>

                              </div>
                            </div>

                            <div class="col-md-8">
                              <div class="form-group">
                                <input type="text" name="estudio_sueño" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="date" name="fecha_sueño" class="form-control">
                              </div>
                            </div>

                            <!--<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic1" class="form-control">
                        </div>
                      </div>-->

                            <div class="col-md-8">
                              <div class="form-group">
                                <input type="text" name="estudio_sueño1" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="date" name="fecha_sueño1" class="form-control">
                              </div>
                            </div>

                            <!--<div class="col-md-4">
                        <div class="form-group">
                         <input type="text" name="ic11" class="form-control">
                        </div>
                      </div>-->
                            <div class="col-md-8">
                              <div class="form-group">
                                <input type="text" name="estudio_sueño2" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="date" name="fecha_sueño2" class="form-control">
                              </div>
                            </div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <input type="text" name="estudio_sueño3" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="date" name="fecha_sueño3" class="form-control">
                              </div>
                            </div>

                            <div class="form-group col-md-12">
                              <h4 class="box-title">Adaptación</h4>
                            </div>

                            <div class="col-md-8">
                              <div class="form-group">
                                <input type="text" name="adaptacion_des" class="form-control">

                              </div>
                            </div>


                            <div class="col-md-4">
                              <div class="form-group">
                                <input type="text" name="adaptacion_desorde" class="form-control">
                              </div>
                            </div>

                            <div class="form-group col-md-12">
                              <h4 class="box-title">Hipótesis Diagnóstica</h4>
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Ronquido Simple</div>
                              <input type="text" class="form-control input-lg" id="ronquido" name="ronquido">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Baja Probabilidad [SAHOS]</div>
                              <input type="text" class="form-control input-lg" id="baja_probabilidad" name="baja_probabilidad">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Alta Probabilidad [SAHOS]</div>
                              <input type="text" class="form-control input-lg" id="alta_probabilidad" name="alta_probabilidad">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Otra Patología</div>
                              <input type="text" class="form-control input-lg" id="otra_patologia" name="otra_patologia">
                            </div>

                            <div class="form-group col-md-12">
                              <h4 class="box-title">Resultado de Estudios</h4>
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">AHI</div>
                              <input type="text" class="form-control input-lg" id="ahi" name="ahi">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">IR</div>
                              <input type="text" class="form-control input-lg" id="ir" name="ir">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">IDO</div>
                              <input type="text" class="form-control input-lg" id="ido" name="ido">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Saturación</div>
                              <input type="text" class="form-control input-lg" id="saturacion" name="saturacion">
                            </div>

                            <div class="form-group col-md-6">
                              <div align="left">Ronquidos</div>
                              <input type="text" class="form-control input-lg" id="ronquitos" name="ronquitos">
                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Comentarios</div>
                              <textarea id="comentarios_desordenes" name="comentarios_desordenes" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>



                          </div>
                        </div>
                      </div>




















                      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentes">
                              Oído
                            </a>
                          </h4>
                        </div>
                        <div id="Antecedentes" class="panel-collapse collapse">
                          <div class="box-body row">


                            <div class="form-group col-md-12">
                              <div align="left">Motivo de Consulta</div>
                              <textarea id="motivoConsulta_oido" name="motivoConsulta_oido" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                Tipo
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_oido" name="perfil_oido[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Oído Derecho">Oído Derecho</option>
                                  <option value="Oído Izquierdo">Oído Izquierdo</option>
                                  <option value="Ambos">Ambos</option>
                                  <option value="Otalgia">Otalgia</option>
                                  <option value="Pabellón">Pabellón</option>
                                  <option value="Retroauricular">Retroauricular</option>
                                  <option value="Hipoacusia">Hipoacusia</option>
                                  <option value="Tinnitus">Tinnitus</option>
                                  <option value="Sensación de Líquido">Sensación de Líquido</option>
                                  <option value="Picor">Picor</option>
                                  <option value="Usa Hisopo">Usa Hisopo</option>
                                  <option value="Otros Objetos">Otros Objetos</option>
                                  <option value="Secreción">Secreción</option>
                                  <option value="Cristalina">Cristalina</option>
                                  <option value="Purulenta">Purulenta</option>
                                  <option value="Fétida">Fétida</option>
                                  <option value="Sangre">Sangre</option>
                                  <option value="Trauma de Oído">Trauma de Oído</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Trauma de Oído</div>
                              </div>
                              <div class="form-group col-md-12">
                                <input type="text" class="form-control input-lg" id="trauma_oido" name="trauma_oido">
                              </div>
                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Otoscopía</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="otoscopia" name="otoscopia[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Conducto Normal">Conducto Normal</option>
                                  <option value="Estrecho">Estrecho</option>
                                  <option value="Amplio">Amplio</option>
                                  <option value="Cerumen Normal">Cerumen Normal</option>
                                  <option value="Tapón de Cera">Tapón de Cera</option>
                                  <option value="Cuerpo Extraño">Cuerpo Extraño</option>
                                  <option value="Cond. Descamado">Cond. Descamado</option>
                                  <option value="Edematoso">Edematoso</option>
                                  <option value="Erosiones">Erosiones</option>
                                  <option value="Granuloma">Granuloma</option>
                                  <option value="Sangre">Sangre</option>
                                  <option value="Secreción">Secreción</option>
                                  <option value="Hongos">Hongos</option>
                                  <option value="M. T. Normal">M. T. Normal</option>
                                  <option value="M.T. Retraída">M.T. Retraída</option>
                                  <option value="M.T. Abombada">M.T. Abombada</option>
                                  <option value="Atelectasia">Atelectasia</option>
                                  <option value="P. Flácida">P. Flácida</option>
                                  <option value="P. Tensa">P. Tensa</option>
                                  <option value="Total">Total</option>
                                  <option value="Niveles Hidro-Aéreos">Niveles Hidro-Aéreos</option>
                                  <option value="Congestión Martillo">Congestión Martillo</option>
                                  <option value="Congestión Total">Congestión Total</option>
                                  <option value="C. Márgenes">C. Márgenes</option>
                                  <option value="C. Conducto">C. Conducto</option>
                                  <option value="Perforación Tímpano">Perforación Tímpano</option>
                                  <option value="Central">Central</option>
                                  <option value="Marginal">Marginal</option>
                                  <option value="Puntiforme">Puntiforme</option>
                                  <option value="< 5 mm">< 5 mm</option>
                                  <option value="> 5 mm">> 5 mm</option>
                                  <option value="Ant">Ant</option>
                                  <option value="Post">Post</option>
                                  <option value="Múltiple">Múltiple</option>
                                  <option value="Subtotal">Subtotal</option>
                                  <option value="Total">Total</option>

                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Microscopía</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="microscopia" name="microscopia[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Caja Tímpano Húmeda">Caja Tímpano Húmeda</option>
                                  <option value="Seca">Seca</option>
                                  <option value="Edema de Mucosa">Edema de Mucosa</option>
                                  <option value="Colesteatoma">Colesteatoma</option>
                                  <option value="Granuloma">Granuloma</option>
                                  <option value="Neotímpano">Neotímpano</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Audiometría</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="audiometria" name="audiometria[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Hip. Leve">Hip. Leve</option>
                                  <option value="Hip. Moderada">Hip. Moderada</option>
                                  <option value="Hip. Grave">Hip. Grave</option>
                                  <option value="Restos Auditivos">Restos Auditivos</option>
                                  <option value="Cofosis">Cofosis</option>
                                  <option value="Conducción">Conducción</option>
                                  <option value="Sensorial">Sensorial</option>
                                  <option value="Mixta">Mixta</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Timpanograma</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="timpanograma" name="timpanograma[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Tipo A">Tipo A</option>
                                  <option value="A1">A1</option>
                                  <option value="Tipo B">Tipo B</option>
                                  <option value="Tipo C">Tipo C</option>
                                  <option value="Función Trompa de Eustaquio Si Funciona">Función Trompa de Eustaquio Si Funciona</option>
                                  <option value="No Funciona">No Funciona</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4" align="center">
                              Reflejo Estapedial Ipsi <br><br>
                              <input value="1" type="radio" name="reflejo" id="lt"> Si
                              <input value="2" type="radio" name="reflejo" id="lt"> No
                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Audiometría Vocal</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="audiometria_vocal" name="audiometria_vocal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Comprensión 100% Prolongada">Comprensión 100% Prolongada</option>
                                  <option value="Comprensión < 100">Comprensión &lt; 100</option>
                                  <option value="Reclutamiento">Reclutamiento</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">PETC</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="petc" name="petc[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Acortada">Acortada</option>
                                  <option value="Prolongada">Prolongada</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Seguimiento Onda V</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="seguimiento_onda" name="seguimiento_onda[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="H. Leve">H. Leve</option>
                                  <option value="Moderada">Moderada</option>
                                  <option value="Grave">Grave</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Otoemisiones Acústicas</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="otoemisiones" name="otoemisiones[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Responde">Responde</option>
                                  <option value="No Responde">No Responde</option>
                                  <option value="Nistagmus Espontáneo">Nistagmus Espontáneo</option>
                                  <option value="Derecha">Derecha</option>
                                  <option value="Izquierda">Izquierda</option>
                                  <option value="Vertical">Vertical</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Índice Nariz</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="indice_nariz" name="indice_nariz[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Anormal">Anormal</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4" align="center">
                              Seguimiento de Mano <br><br>
                              <input value="1" type="radio" name="seguimiento" id="lt"> Si
                              <input value="2" type="radio" name="seguimiento" id="lt"> No
                            </div>



                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Pierna</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_pierna" name="perfil_pierna[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="No Puede">No Puede</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-4">
                              <div class="form-group col-md-12">
                                <div align="left">Romberg</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_romberg" name="perfil_romberg[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Inestable">Inestable</option>
                                  <option value="No Puede">No Puede</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Romberg Sensible</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="romberg_sensible" name="romberg_sensible[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Inestable">Inestable</option>
                                  <option value="No Puede">No Puede</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Marcha</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="marcha" name="marcha[]" class="form-control select2" multiple="multiple" style="width: 100%;">

                                <option value="Normal">Normal</option>
                                <option value="Gira a la Derecha">Gira a la Derecha</option>
                                <option value="Gira a la Izquierda">Gira a la Izquierda</option>
                                <option value="No Puede">No Puede</option>

                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-12">
                              <h4 class="box-title">
                                <center>Giro Brusco Cabeza</center>
                              </h4>
                            </div>


                            <div class="form-group col-md-6" align="center">
                              Nistagmus Derecho <br><br>
                              <input value="1" type="radio" name="der_nistagnus" id="lt"> Si
                              <input value="2" type="radio" name="der_nistagnus" id="lt"> No
                            </div>

                            <div class="form-group col-md-6" align="center">
                              Nistagmus Izquierdo <br><br>
                              <input value="1" type="radio" name="izq_nistagnus" id="lt"> Si
                              <input value="2" type="radio" name="izq_nistagnus" id="lt"> No
                            </div>

                            <div class="form-group col-md-12">
                            <center><h4 class="box-title">Maniobras de Provocación</h4></center>
                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Barbacoa</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="barracoa" name="barracoa[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Si">Si</option>
                                  <option value="No">No</option>
                                  <option value="Derecho">Derecho</option>
                                  <option value="Izquierdo">Izquierdo</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Nistagmus Provocación</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="nistagus_provocacion" name="nistagus_provocacion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Derecho">Derecho</option>
                                  <option value="Izquierdo">Izquierdo</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Notas</div>
                              <textarea id="Notas_oidos" name="Notas_oidos" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>




                          </div>

                        </div>

                      </div>
































                      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree44">
                              Faringe
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree44" class="panel-collapse collapse">
                          <div class="box-body row">


                            <div class="form-group col-md-12">
                              <div align="left">Motivo de Consulta</div>
                              <textarea id="motivoConsulta_Faringe" name="motivoConsulta_Faringe" class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>

                            <div class="form-group col-md-3" align="center">
                              Dolor <br><br>
                              <input value="1" type="radio" name="rs1" id="lt"> Si
                              <input value="2" type="radio" name="rs1" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                              Sens C. Extraño <br><br>
                              <input value="1" type="radio" name="rs2" id="lt"> Si
                              <input value="2" type="radio" name="rs2" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                              Odinofagia <br><br>
                              <input value="1" type="radio" name="rs3" id="lt"> Si
                              <input value="2" type="radio" name="rs3" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                              Disfagia <br><br>
                              <input value="1" type="radio" name="rs4" id="lt"> Si
                              <input value="2" type="radio" name="rs4" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Carraspeo <br><br>
                              <input value="1" type="radio" name="rs5" id="lt"> Si
                              <input value="2" type="radio" name="rs5" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Flema <br><br>
                              <input value="1" type="radio" name="rs6" id="lt"> Si
                              <input value="2" type="radio" name="rs6" id="lt"> No
                            </div>


                            <div class="form-group col-md-3" align="center">
                            Fiebre <br><br>
                              <input value="1" type="radio" name="rs7" id="lt"> Si
                              <input value="2" type="radio" name="rs7" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Astenia <br><br>
                              <input value="1" type="radio" name="rs8" id="lt"> Si
                              <input value="2" type="radio" name="rs8" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Anorexia <br><br>
                              <input value="1" type="radio" name="rs9" id="lt"> Si
                              <input value="2" type="radio" name="rs9" id="lt"> No
                            </div>


                            <div class="form-group col-md-3" align="center">
                            Mialgias <br><br>
                              <input value="1" type="radio" name="rs10" id="lt"> Si
                              <input value="2" type="radio" name="rs10" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Artralgias <br><br>
                              <input value="1" type="radio" name="rs11" id="lt"> Si
                              <input value="2" type="radio" name="rs11" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Disnea <br><br>
                              <input value="1" type="radio" name="rs12" id="lt"> Si
                              <input value="2" type="radio" name="rs12" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Disfonía <br><br>
                              <input value="1" type="radio" name="rs13" id="lt"> Si
                              <input value="2" type="radio" name="rs13" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Rinolalia <br><br>
                              <input value="1" type="radio" name="rs14" id="lt"> Si
                              <input value="2" type="radio" name="rs14" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Cefalea <br><br>
                              <input value="1" type="radio" name="rs15" id="lt"> Si
                              <input value="2" type="radio" name="rs15" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Decaimiento <br><br>
                              <input value="1" type="radio" name="rs16" id="lt"> Si
                              <input value="2" type="radio" name="rs16" id="lt"> No
                            </div>

                            <div class="form-group col-md-12">
                              <h4 class="box-title">
                                <center>Examen Físico</center>
                              </h4>
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Aftas <br><br>
                              <input value="1" type="radio" name="rs17" id="lt"> Si
                              <input value="2" type="radio" name="rs17" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                            Les. Herpéticas <br><br>
                              <input value="1" type="radio" name="rs18" id="lt"> Si
                              <input value="2" type="radio" name="rs18" id="lt"> No
                            </div>


                            <div class="form-group col-md-3" align="center">
                             Hiperemia    <br><br>
                              <input value="1" type="radio" name="rs19" id="lt"> Si
                              <input value="2" type="radio" name="rs19" id="lt"> No
                            </div>

                            <div class="form-group col-md-3" align="center">
                              Les. Necróticas <br><br>
                              <input value="1" type="radio" name="rs20" id="lt"> Si
                              <input value="2" type="radio" name="rs20" id="lt"> No
                            </div>

                            <div class="form-group col-md-12">
                              <h4 class="box-title">
                                <center>Pilares Anteriores-Folículos Linf</center>
                              </h4>
                            </div>

                            <div class="form-group col-md-6" align="center">
                              Violáceos <br><br>
                              <input value="1" type="radio" name="rs21" id="lt"> Si
                              <input value="2" type="radio" name="rs21" id="lt"> No
                            </div>

                            <div class="form-group col-md-6" align="center">
                              Lesiones Papilomatosas <br><br>
                              <input value="1" type="radio" name="lesiones" id="lt"> Si
                              <input value="2" type="radio" name="lesiones" id="lt"> No
                            </div>


                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Sangrado</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_sangrado" name="perfil_sangrado[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Retronasal">Retronasal</option>
                                  <option value="Hipofaringe">Hipofaringe</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6">
                              <div class="form-group col-md-12">
                                <div align="left">Úvula</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_uvula" name="perfil_uvula[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Elongada">Elongada</option>
                                  <option value="Facies Adenoidea">Facies Adenoidea</option>
                                  <option value="Respiración Bucal">Respiración Bucal</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-12">
                              <div class="form-group col-md-12">
                                <div align="left">Amígdalas</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_amigdalas" name="perfil_amigdalas[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Grado 1">Grado 1</option>
                                  <option value="Grado 2">Grado 2</option>
                                  <option value="Grado 3">Grado 3</option>
                                  <option value="Grado 4">Grado 4</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-6" align="center">
                              Tumoración Exofítica <br><br>
                              <input value="1" type="radio" name="tumaracion" id="lt"> Si
                              <input value="2" type="radio" name="tumaracion" id="lt"> No
                            </div>

                            <div class="form-group col-md-6" align="center">
                              Ulcerada <br><br>
                              <input value="1" type="radio" name="ulcera" id="lt"> Si
                              <input value="2" type="radio" name="ulcera" id="lt"> No
                            </div>
                  
                            <div class="form-group col-md-12">
                              <h4 class="box-title">
                                <center>Naso-Faringo-Laringoscopia</center>
                              </h4>
                            </div>


                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Rinofaringe</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_rinofaringe" name="perfil_rinofaringe[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Adenoide">Adenoide</option>
                                  <option value="Tumor">Tumor</option>
                                  <option value="Rodete Tubárico Normal">Rodete Tubárico Normal</option>
                                  <option value="Edema">Edema</option>
                                  <option value="D">D</option>
                                  <option value="I">I</option>
                                </select>

                              </div>

                            </div>
                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Orofaringe</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_orofaringe" name="perfil_orofaringe[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Hipertrofia Amígdala">Hipertrofia Amígdala</option>
                                  <option value="Folículos Linfoides Hiperplásicos">Folículos Linfoides Hiperplásicos</option>
                                  <option value="Mucosidad">Mucosidad</option>
                                </select>

                              </div>

                            </div>

                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Hipofaringe</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_hipofaringe" name="perfil_hipofaringe[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Hipertrofia Am. Lingual">Hipertrofia Am. Lingual</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-3">
                              <div class="form-group col-md-12">
                                <div align="left">Epiglotis</div>
                              </div>
                              <div class="form-group col-md-12" align="right">
                                <select id="perfil_epiglotis" name="perfil_epiglotis[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                  <option value="Normal">Normal</option>
                                  <option value="Larga">Larga</option>
                                  <option value="Omega">Omega</option>
                                  <option value="Colapsa">Colapsa</option>
                                </select>

                              </div>

                            </div>


                            <div class="form-group col-md-12">
                              <div align="left">Notas</div>
                              <textarea id="notas_faringe" name="notas_faringe" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                            </div>




                          </div>
                        </div>

                      </div>
                      <div class="panel box box-success">
                    <div class="box-header with-border">
                      <h4 class="box-title">
                        <a data-toggle="collapse" data-parent="#accordion1" href="#Diagnostico">
                          Laringe
                        </a>
                      </h4>
                    </div>
                    <div id="Diagnostico" class="panel-collapse collapse">
                      <div class="box-body row">



                        <div class="form-group col-md-12">
                          <div align="left">Motivo de Consulta</div>
                          <textarea id="motivoConsulta_Laringe" name="motivoConsulta_Laringe" class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>


                        <div class="form-group col-md-12">
                          <div class="form-group col-md-12">
                            Tipo
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_laringe" name="perfil_laringe[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                <option value="Disfonía">Disfonía</option>
                                <option value="Dolor al Hablar">Dolor al Hablar</option>
                                <option value="Fatiga de la Voz">Fatiga de la Voz</option>
                                <option value="Voz Espástica">Voz Espástica</option>
                                <option value="Voz Bitonal">Voz Bitonal</option>
                                <option value="Tos">Tos</option>
                                <option value="Hemoptisis">Hemoptisis</option>
                                <option value="Espasmos Laríngeos">Espasmos Laríngeos</option>
                                <option value="Sensación Cuerpo Extraño">Sensación Cuerpo Extraño</option>
                                <option value="Flemas y Carraspeo Frecuente">Flemas y Carraspeo Frecuente</option>
                                <option value="Sequedad">Sequedad</option>
                                <option value="Estridor">Estridor</option>
                            </select>

                          </div>

                        </div>

                        <div class="form-group col-md-12">
                          <h4 class="box-title">
                            <center>Laringoscopia Indirecta</center>
                          </h4>
                        </div>


                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Congestión</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_congestion" name="perfil_congestion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Hipofaringe">Hipofaringe</option>
                              <option value="Epiglotis">Epiglotis</option>
                              <option value="Aritenoides">Aritenoides</option>
                              <option value="Interaritenoideos">Interaritenoideos</option>
                              <option value="B. Ventriculares">B. Ventriculares</option>
                              <option value="P. Vocales">P. Vocales</option>
                            </select>

                          </div>

                        </div>

                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Edema de Pliegues Vocales</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_edema" name="perfil_edema[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Pl. Vocal Derecho">Pl. Vocal Derecho</option>
                              <option value="Pl. Vocal Izquierdo">Pl. Vocal Izquierdo</option>
                            </select>

                          </div>

                        </div>

                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Lesiones Submucosas</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_lesiones" name="perfil_lesiones[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Pólipo">Pólipo</option>
                              <option value="Nódulos">Nódulos</option>
                              <option value="Sulcus Vocalis">Sulcus Vocalis</option>
                              <option value="Granuloma">Granuloma</option>
                              <option value="Quiste Mucoso">Quiste Mucoso</option>
                              <option value="Otros">Otros</option>
                            </select>

                          </div>

                        </div>

                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Lesiones Mucosas</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_lesionesmuco" name="perfil_lesionesmuco[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Papilomas">Papilomas</option>
                              <option value="Leucoplasia">Leucoplasia</option>
                            </select>

                          </div>

                        </div>


                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Cáncer</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_cancer" name="perfil_cancer[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="In-Situ">In-Situ</option>
                              <option value="Glotis Derecho">Glotis Derecho</option>
                              <option value="Glotis Izquierdo">Glotis Izquierdo</option>
                              <option value="Comisura">Comisura</option>
                              <option value="Supra-Glotis">Supra-Glotis</option>
                              <option value="Sub-Glotis">Sub-Glotis</option>
                              <option value="Total">Total</option>
                            </select>

                          </div>

                        </div>


                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Parálisis</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_paralisis" name="perfil_paralisis[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="C.V. Derecho">C.V. Derecho</option>
                              <option value="C.V. Izquierdo">C.V. Izquierdo</option>
                              <option value="Ambas">Ambas</option>
                              <option value="Aducción">Aducción</option>
                              <option value="Abducción">Abducción</option>
                              <option value="Disarmonía Vocal">Disarmonía Vocal</option>
                            </select>

                          </div>

                        </div>


                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Cierre de Pliegues Vocales</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_cierrepli" name="perfil_cierrepli[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Normal">Normal</option>
                              <option value="Irregular">Irregular</option>
                              <option value="Paréntesis">Paréntesis</option>
                              <option value="Incompleto Ant">Incompleto Ant</option>
                              <option value="Incompleto Post">Incompleto Post</option>
                              <option value="Reloj de Arena">Reloj de Arena</option>
                              <option value="Total">Total</option>
                            </select>

                          </div>

                        </div>


                        <div class="form-group col-md-3">
                          <div class="form-group col-md-12">
                            <div align="left">Subglotis</div>
                          </div>
                          <div class="form-group col-md-12" align="right">
                            <select id="perfil_subglotis" name="perfil_subglotis[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Edema">Edema</option>
                              <option value="Neoplasia">Neoplasia</option>
                              <option value="Estenosis">Estenosis</option>
                            </select>

                          </div>

                        </div>


                        <div class="form-group col-md-12">
                          <div align="left">Notas</div>
                        </div>
                        <div class="form-group col-md-12">
                          <textarea id="notas_laringe" name="notas_laringe" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>










                      </div>
                    </div>


                  </div>
                



                <div class="panel box box-danger">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#examenesr">
                        Glándulas Salivales
                      </a>
                    </h4>
                  </div>
                  <div id="examenesr" class="panel-collapse collapse">
                    <div class="box-body row">


                      <div class="form-group col-md-12">
                        <div align="left">Motivo de Consulta</div>
                      </div>
                      <div class="form-group col-md-12">
                        <textarea id="motivoconsulta_glandulas" name="motivoconsulta_glandulas" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>

                      <div class="form-group col-md-12">
                        <div class="form-group col-md-12">
                        Tipo
                        </div>
                        <div class="form-group col-md-12" align="right">
                          <select id="perfil_glandula" name="perfil_glandula[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                            <option value="Derecha">Derecha</option>
                            <option value="Izquierda">Izquierda</option>
                            <option value="Ambas">Ambas</option>
                            <option value="Parótida">Parótida</option>
                            <option value="Submaxilar">Submaxilar</option>
                            <option value="Sublingual">Sublingual</option>
                            <option value="Agrandamiento">Agrandamiento</option>
                            <option value="Bultos">Bultos</option>
                            <option value="Duro">Duro</option>
                            <option value="Irregular">Irregular</option>
                            <option value="Redondeado">Redondeado</option>
                            <option value="Móvil">Móvil</option>
                            <option value="Doloroso">Doloroso</option>
                            <option value="Sequedad Bucal">Sequedad Bucal</option>
                            <option value="Eliminación Calcificaciones">Eliminación Calcificaciones</option>
                            <option value="Eliminación de Cálculos">Eliminación de Cálculos</option>
                            <option value="Inflamación de Stenon">Inflamación de Stenon</option>
                            <option value="Wharton">Wharton</option>
                            <option value="Bartholin">Bartholin</option>
                          </select>

                        </div>

                      </div>

                      <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                          <div align="left">Sialo-Tomografía</div>
                        </div>
                        <div class="form-group col-md-12" align="right">
                          <select id="perfil_sialo" name="perfil_sialo[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                              <option value="Cálculo Radiopaco Único">Cálculo Radiopaco Único</option>
                              <option value="Cálculos Múltiples">Cálculos Múltiples</option>
                              <option value="Cálculos Intra-Glandular">Cálculos Intra-Glandular</option>
                              <option value="Cálculo Radiolúcido">Cálculo Radiolúcido</option>
                              <option value="Aumento de Tamaño">Aumento de Tamaño</option>
                              <option value="Nódulo Simple">Nódulo Simple</option>
                              <option value="Multinodular">Multinodular</option>
                            </select>

                        </div>

                      </div>

                      <div class="form-group col-md-6">
                        <div class="form-group col-md-12">
                          <div align="left">Ecografía</div>
                        </div>
                        <div class="form-group col-md-12" align="right">
                          <select id="perfil_ecografia" name="perfil_ecografia[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                            <option value="Tumoración Quística">Tumoración Quística</option>
                            <option value="Tumoración Sólida">Tumoración Sólida</option>
                            <option value="Resonancia Magnética de Glándula Salival">Resonancia Magnética de Glándula Salival</option>
                          </select>

                        </div>

                      </div>


                      <div class="form-group col-md-12">
                        <div align="left">Notas</div>
                      </div>
                      <div class="form-group col-md-12">
                        <textarea id="notas_glandulas" name="notas_glandulas" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                      </div>

                    
                  </div>
                </div>
              </div>




              <div class="panel box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#examenes">
                      Vía Lagrimal
                    </a>
                  </h4>
                </div>
                <div id="examenes" class="panel-collapse collapse">
                  <div class="box-body row">


                    <div class="form-group col-md-12">
                      <div align="left">Motivo de Consulta</div>
                    </div>
                    <div class="form-group col-md-12">
                      <textarea id="motivoconsulta_lagrimal" name="motivoconsulta_lagrimal" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-12">
                      Tipo
                      </div>
                      <div class="form-group col-md-12" align="right">
                        <select id="perfil_lagrimal" name="perfil_lagrimal[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                          <option value="Derecha">Derecha</option>
                          <option value="Izquierda">Izquierda</option>
                          <option value="Bilateral">Bilateral</option>
                        </select>

                      </div>

                    </div>


                    <div class="form-group col-md-6">
                      <div class="form-group col-md-12">
                        <div align="left">Secreción</div>
                      </div>
                      <div class="form-group col-md-12" align="right">
                        <select id="perfil_secresion" name="perfil_secresion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                          <option value="Mucosa">Mucosa</option>
                          <option value="Purulenta">Purulenta</option>
                        </select>

                      </div>

                    </div>

                    <div class="form-group col-md-6">
                      <div class="form-group col-md-12">
                        <div align="left">Obstrucción</div>
                      </div>
                      <div class="form-group col-md-12" align="right">
                        <select id="perfil_obstruccion" name="perfil_obstruccion[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                          <option value="Total">Total</option>
                          <option value="Parcial">Parcial</option>
                        </select>

                      </div>

                    </div>

                    <div class="form-group col-md-12">
                      <div align="left">Notas</div>
                    </div>
                    <div class="form-group col-md-12">
                      <textarea id="notas_lagrimal" name="notas_lagrimal" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>


                  </div>
                </div>
              </div>



















              <div class="panel box box-success">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#tratamientoplan">
                      Cuello
                    </a>
                  </h4>
                </div>
                <div id="tratamientoplan" class="panel-collapse collapse">
                  <div class="box-body">

                    <div class="form-group col-md-12">
                      <div align="left">Motivo de Consulta</div>
                    </div>
                    <div class="form-group col-md-12">
                      <textarea id="motivoconsulta_cuello" name="motivoconsulta_cuello" class="textarea" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>


                    <div class="form-group col-md-12">
                      <div class="form-group col-md-12">
                        Tipo
                      </div>
                      <div class="form-group col-md-12" align="right">
                        <select id="perfil_cuello" name="perfil_cuello[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                          <option value="Adenopatía Dolorosa">Adenopatía Dolorosa</option>
                          <option value="Adenopatía Única">Adenopatía Única</option>
                          <option value="Múltiple">Múltiple</option>
                          <option value="Cadena Cervical Anterior">Cadena Cervical Anterior</option>
                          <option value="Posterior">Posterior</option>
                          <option value="Otras Regiones">Otras Regiones</option>
                          <option value="Nódulos Tiroideos">Nódulos Tiroideos</option>
                          <option value="Bocio">Bocio</option>
                          <option value="Miositis">Miositis</option>
                          <option value="Arteritis">Arteritis</option>
                          <option value="Dolor Cervical Posterior">Dolor Cervical Posterior</option>
                          <option value="Contractura Muscular">Contractura Muscular</option>
                          <option value="Dolor de Nuca">Dolor de Nuca</option>
                          <option value="Cefaleas Posteriores">Cefaleas Posteriores</option>
                          <option value="Mareo">Mareo</option>
                        </select>

                      </div>

                    </div>


                    <div class="form-group col-md-12">
                      <div align="left">Notas</div>
                    </div>
                    <div class="box-body pad">
                      <textarea id="notas_cuello" name="notas_cuello" class="textarea" placeholder="Notas" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                    </div>



                  </div>
                </div>
              </div>










              <div class="panel box box-danger">
                <div class="box-header with-border">
                  <h4 class="box-title">
                    <a data-toggle="collapse" data-parent="#accordion1" href="#incapacidad">
                      Esquemas
                    </a>
                  </h4>
                </div>
                <div id="incapacidad" class="panel-collapse collapse">
                  <div class="box-body">

                    <br>

                    <div class="form-row">
                      
                      <div class="col-md-12">
                        <h4 class="text-center">Cargar Archivos</h4>

                        <div class="form-group">
                          <div class="form-group col-md-12">
                            <label> Nombre del Archivo </label>
                          <input type="text" class="form-control" id="Descripcion" name="descripcion" placeholder="Nombre">
                          </div>

                          <label class="col-sm-2 control-label">Archivos</label>
                          <div class="col-sm-8">
                            <input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="">
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </div>
                  </div>

                  <br>
















                  






              <div class="form-group col-md-12">
                <label>Ya terminé <input type="checkbox" value="" required=""></label>
              </div>

              <hr>



              <!--
                          <div class="col-sm-12">
                            <div align="center">
                              <label> <strong> Próxima consulta o cita (Solo si aplica)</strong>  </label>
                            </div>
                          </div>

                          <div class="col-sm-6">
                            <div align="left">
                              <label>Fecha </label>
                            </div>
                            <input type="date" name="fecha"  class="form-control input-lg" id="fecha" min="<?php echo date('Y-m-d') ?>"   onChange="verDia();">
                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
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
                            <option value="<?php echo $_SESSION['username'] ?>" selected="selected"><?php echo $_SESSION['username'] ?> </option>
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

                              <input type="radio" name="P" value="1"   class="flat-red"  >
                              <i class="fa fa-video-camera"></i>   Virtual
                            </label>
                          </div> -->

              <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
              <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
              <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">
              <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
              <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
              <input type="hidden" name="receta" value="<?php echo $idR ?>">
              <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">





              <div align="center">
                <br>
                <div class="col-sm-12">
                  <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                      <h2> <strong> G u a r d a r </strong> </h2>
                    </button></center>

                </div>
              </div>

              <input type="hidden" name="tipo_cliente" valur="1">
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


<?php include("footer.php") ?>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<script type="text/javascript">
  function calculardosis() {
    m1 = document.getElementById("frecuencia").value;
    m2 = document.getElementById("administracion").value;
    m3 = document.getElementById("dias").value;

    if (m2 == "Horas") {


      r = 24 / m1;



      document.getElementById("dosisdia").value = r;


    }

    if (m2 == "Minutos") {


      r = 1440 / m1;



      document.getElementById("dosisdia").value = r;


    }

    if (m2 == "Dias") {


      r = 1 / m1;



      document.getElementById("dosisdia").value = r;


    }


    if (m2 == "Semana") {

      a = 7 * m1;
      r = 1 / a;


      document.getElementById("dosisdia").value = r;


    }

    if (m2 == "Mes") {

      a = 30 * m1;
      r = 1 / a;


      document.getElementById("dosisdia").value = r;


    }

    if (m2 == "Ano") {

      a = 365 * m1;
      r = 1 / a;


      document.getElementById("dosisdia").value = r;


    }


    if (m2 == "Unica") {



      r = "&uacutenica Dosis";


      document.getElementById("dosisdia").value = r;


    }

    rt = r * m3;
    document.getElementById("total").value = rt;


  }










  function agergarItem() {
    // estas son las variables que enviamos
    var codigoProd = $("#codigoProd").val();

    var dosis = $("#dosis").val();
    var posologia = $("#posologia").val();
    var frecuencia = $("#frecuencia").val();
    var administracion = $("#administracion").val();
    var dosisdia = $("#dosisdia").val();
    var dias = $("#dias").val();
    var via = $("#via").val();
    var total = $("#total").val();
    var nota = $("#nota").val();
    var usuario_id = $("#id_usuario").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();
    var codigoProd1 = $("#codigoProd1").val();
    var nota2 = $("#nota2").val();
    var cantidad = $("#cantidad").val();
    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "ajax_agregarItemrecetario.php",
      data: {
        codigoProd: codigoProd,
        dosis: dosis,
        posologia: posologia,
        frecuencia: frecuencia,
        administracion: administracion,
        dosisdia: dosisdia,
        dias: dias,
        via: via,
        total: total,
        nota: nota,
        usuario_id: usuario_id,
        idcliente: idcliente,
        idReceta: idReceta,
        codigoProd1: codigoProd1,
        nota2: nota2,
        cantidad: cantidad
      },
      success: function(response) {

        $('#dosis').val('');
        $('#posologia').val('');
        $('#frecuencia').val('');
        $('#administracion').val('');
        $('#dosisdia').val('');
        $('#dias').val('');
        $('#via').val('');
        $('#total').val('');
        $('#nota').val('');
        $('#cantidad').val('');

        $('#codigoProd').val('');
        $('#codigoProd1').val('');
        $('#nota').val('');

        $('#div-results').html(response);

        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });

  };



  /* document.getElementById("detalleRecetario").reset(); */

  function eliminarItem1() {
    // estas son las variables que enviamos
    var idOper = $("#idOper1").val();
    var usuario_id = $("#usuario_id").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "eliminarItemRecetario.php",
      data: {
        idOper: idOper,
        usuario_id: usuario_id,
        idcliente: idcliente,
        idReceta: idReceta
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function eliminarItem3() {
    // estas son las variables que enviamos
    var idOper = $("#idOper3").val();
    var usuario_id = $("#usuario_id").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "eliminarItemRecetario.php",
      data: {
        idOper: idOper,
        usuario_id: usuario_id,
        idcliente: idcliente,
        idReceta: idReceta
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function eliminarItem4() {
    // estas son las variables que enviamos
    var idOper = $("#idOper4").val();
    var usuario_id = $("#usuario_id").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "eliminarItemRecetario.php",
      data: {
        idOper: idOper,
        usuario_id: usuario_id,
        idcliente: idcliente,
        idReceta: idReceta
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };


  function eliminarItem5() {
    // estas son las variables que enviamos
    var idOper = $("#idOper5").val();
    var usuario_id = $("#usuario_id").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "eliminarItemRecetario.php",
      data: {
        idOper: idOper,
        usuario_id: usuario_id,
        idcliente: idcliente,
        idReceta: idReceta
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };



  function eliminarItem6() {
    // estas son las variables que enviamos
    var idOper = $("#idOper6").val();
    var usuario_id = $("#usuario_id").val();
    var idcliente = $("#idcliente").val();
    var idReceta = $("#idReceta").val();

    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "eliminarItemRecetario.php",
      data: {
        idOper: idOper,
        usuario_id: usuario_id,
        idcliente: idcliente,
        idReceta: idReceta
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
      }
    });
  };

  function listaItem() {
    // estas son las variables que enviamos
    var usuario_id = $("#usuario_id").val();
    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "listaItem.php",
      data: {
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     

      }
    });
  };
  window.onload = listaItem;


  function listaItem() {
    // estas son las variables que enviamos
    var usuario_id = $("#usuario_id").val();
    // aqui enviamos el mensaje por medio de un arreglo     
    $.ajax({
      type: "POST",
      url: "listaItem.php",
      data: {
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo     

      }
    });
  };
  window.onload = listaItem;





  function verPos() {

    var clientepos = $("#clientepos").val();
    var codigoProd = $("#codigoProd").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "Poslista.php",
      data: {
        clientepos: clientepos,
        codigoProd: codigoProd
      },
      success: function(response) {
        $('#div-resultsM').html(response);

      }
    });
  };



  function consultas() {

    var tipoConsulta = $("#tipoConsulta").val();

    $.ajax({
      type: "POST",
      url: "Tipoconsultas.php",
      data: {
        tipoConsulta: tipoConsulta
      },
      success: function(response) {
        $('#div-resultsConsultas').html(response);

      }
    });
  };









  function verDia() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "disponibilidad.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-results').html(response);

      }
    });
  };

  function verHora() {
    // estas son las variables que enviamos

    var fecha = $("#fecha").val();
    var Hora = $("#Hora").val();
    var usuario_id = $("#usuario_id").val();

    // aqui enviamos el mensaje por medio de un arreglo

    $.ajax({
      type: "POST",
      url: "disponibilidadHora.php",
      data: {
        fecha: fecha,
        Hora: Hora,
        usuario_id: usuario_id
      },
      success: function(response) {
        $('#div-resultsHora').html(response);

      }
    });
  };

  function calcularimc() {



    m1 = document.getElementById("peso").value;
    m2 = document.getElementById("altura").value;

    r = m1 / ((m2 / 100) * (m2 / 100));



    document.getElementById("imc").value = r.toFixed(2);


    if (r.toFixed(2) < 16)

      ComposicionCorporal = 'Infrapeso: Delgadez Severa';
    else if (r.toFixed(2) > 16 & r.toFixed(2) < 16.99)

      ComposicionCorporal = 'Infrapeso: Delgadez moderada';
    else if (r.toFixed(2) > 17 & r.toFixed(2) < 18.49)

      ComposicionCorporal = 'Infrapeso: Delgadez aceptable';
    else if (r.toFixed(2) > 18.50 & r.toFixed(2) < 24.99)

      ComposicionCorporal = 'Peso Normal';

    else if (r.toFixed(2) > 25.00 & r.toFixed(2) < 29.99)

      ComposicionCorporal = 'Sobrepeso';

    else if (r.toFixed(2) > 30.00 & r.toFixed(2) < 34.99)

      ComposicionCorporal = 'Obeso: Tipo I';

    else if (r.toFixed(2) > 35.00 & r.toFixed(2) < 40)

      ComposicionCorporal = 'Obeso: Tipo II';

    else if (r.toFixed(2) > 40.00)

      ComposicionCorporal = 'Obeso: Tipo III';




    document.getElementById("ComposicionCorporal").value = ComposicionCorporal;
  }

  function calcularprematuriedad() {
    try {
      var a = parseInt(document.formularioActualizarcliente.edadGestacionalCompleta.value);
      var b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
      document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
    } catch (e) {}
  }

  function calcularEdadCorregida() {
    try {
      var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
      var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
      document.formularioActualizarcliente.edadCorregida.value = b - a;
    } catch (e) {}
  }


  function verlista() {

    var clienteId = $("#clienteId").val();
    var name = $("#name1").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results1').html(response);

      }
    });
  };




  function verlista2() {

    var clienteId = $("#clienteId2").val();
    var name = $("#name2").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results2').html(response);

      }
    });
  };


  function verlista3() {

    var clienteId = $("#clienteId3").val();
    var name = $("#name3").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results3').html(response);

      }
    });
  };


  function verlista4() {

    var clienteId = $("#clienteId4").val();
    var name = $("#name4").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results4').html(response);

      }
    });
  };


  function verlista5() {

    var clienteId = $("#clienteId5").val();
    var name = $("#name5").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "cie10lista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results5').html(response);

      }
    });
  };



  function verlista_Cup() {

    var clienteId = $("#clienteId_Cup").val();
    var name = $("#name1_Cup").val();



    // aqui enviamos el mensaje por medio de un arreglo     

    $.ajax({
      type: "POST",
      url: "cuplista.php",
      data: {
        clienteId: clienteId,
        name: name
      },
      success: function(response) {
        $('#div-results1_Cup').html(response);

      }
    });
  };
</script>
<script src="plugins/LottieK/lottie.min.js"></script>

<?php
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Historia_Clinica_Otorrino";
include 'AutoGuardado_Historia.php';
?>