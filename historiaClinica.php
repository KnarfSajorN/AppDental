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
      $dis          =$rowMotorizado['dis'];
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

$queryList=mysqli_query($conn3,"SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC");
/// echo "SELECT * FROM  operacionRecetario where cliente_id = $clienteId order by id ASC";
                  $nrowl=mysqli_num_rows($queryList);

                  while($row_recordset32=mysqli_fetch_array($queryList))

                  {

                $idReceta    = $row_recordset32['idReceta']; 
     
        
                   }

        if ($queryList =='') {
            $idR == 1; }
             else{
            $idR   = ($idReceta+1);}


 
        ?>


?>
<link rel="stylesheet" href="apiVoz.css">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Consulta médica, Paciente: <?php echo $nombre_cliente.', Edad: '.calculaedad($fechaNacimiento); ?>      </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta médica  </a></li>
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
              <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
                <option selected="selected" value="">Seleccione tipo de consulta</option>
                <option>Consulta externa</option>
                <option>Urgencia</option>
                <option>Ambulatorio </option>
              </select>

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
                    <form action="guardarHistoriaClinica.php" method="POST" name="formularioActualizarcliente">

                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
                              Entrevista Inicial
                            </a>
                          </h4>
                        </div>
                        <div id="Entrevista" class="panel-collapse collapse">
                          <div class="box-body">

                            <div class="form-group col-md-12">
                              <div align="left">Motivo consulta</div>


                              <div align="right">
                              <a onclick="procesar()" id="procesar"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                              </div>


                              <textarea  id="motivoConsulta" name="motivoConsulta"  class="textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                            </div>

                          
              <div class="form-group col-md-12">
                <div align="left"> Enfermedad actual</div>
            


                <div align="right">
                  <a onclick="procesar2()" id="procesar2"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="enfermedadActual" name="enfermedadActual"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>




<!--iframe id="inlineFrameExample"
frameBorder="0"
width="100%"
height="300"
src="https://medicalsoftplus.com/co118/test3/speechRecognition.php">
</iframe-->



 
               <!--

                <textarea id="enfermedadActual" name="enfermedadActual"  class="textarea" placeholder="Enfermedad Actual" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>





  <input type="text" name="enfermedadActual"  class="form-control input-lg" id="enfermedadActual"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"> -->

              </div>
              



                          </div>
                        </div>
                      </div>


                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                              Revisión por sistema
                            </a>
                          </h4>
                        </div>
                        <div id="collapseTwo" class="panel-collapse collapse">
                          <div class="box-body">

                            <div class="form-group col-md-3" align="right">
                              Fiebre
                              <input value="1"  type="radio" name="rs1" id="lt" > SI
                              <input value="2" type="radio" name="rs1" id="lt" > NO
                            </div>
                            <div class="form-group col-md-3" align="right">
                              Tos
                              <input value="1"  type="radio" name="rs2" id="lt" > SI
                              <input value="2" type="radio" name="rs2" id="lt" > NO
                            </div>
                            <div class="form-group col-md-3" align="right">
                              Rinorrea
                              <input value="1"  type="radio" name="rs3" id="lt" > SI
                              <input value="2" type="radio" name="rs3" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Cefalea
                              <input value="1"  type="radio" name="rs4" id="lt" > SI
                              <input value="2" type="radio" name="rs4" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Mareo
                              <input value="1"  type="radio" name="rs5" id="lt" > SI
                              <input value="2" type="radio" name="rs5" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Vomito
                              <input value="1"  type="radio" name="rs6" id="lt" > SI
                              <input value="2" type="radio" name="rs6" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Diarrea
                              <input value="1"  type="radio" name="rs7" id="lt" > SI
                              <input value="2" type="radio" name="rs7" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Disuria
                              <input value="1"  type="radio" name="rs8" id="lt" > SI
                              <input value="2" type="radio" name="rs8" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Dolor de Garganta
                              <input value="1"  type="radio" name="rs9" id="lt" > SI
                              <input value="2" type="radio" name="rs9" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Dolor Adominal
                              <input value="1"  type="radio" name="rs10" id="lt" > SI
                              <input value="2" type="radio" name="rs10" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Disnea
                              <input value="1"  type="radio" name="rs11" id="lt" > SI
                              <input value="2" type="radio" name="rs11" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Otalgia
                              <input value="1"  type="radio" name="rs12" id="lt" > SI
                              <input value="2" type="radio" name="rs12" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Perdida de Peso
                              <input value="1"  type="radio" name="rs13" id="lt" > SI
                              <input value="2" type="radio" name="rs13" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Sangre en heces/defecar
                              <input value="1"  type="radio" name="rs14" id="lt" > SI
                              <input value="2" type="radio" name="rs14" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Hematuria
                              <input value="1"  type="radio" name="rs15" id="lt" > SI
                              <input value="2" type="radio" name="rs15" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Dolor en las extremidades
                              <input value="1"  type="radio" name="rs16" id="lt" > SI
                              <input value="2" type="radio" name="rs16" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Parestesias
                              <input value="1"  type="radio" name="rs17" id="lt" > SI
                              <input value="2" type="radio" name="rs17" id="lt" > NO
                            </div>

                            <div class="form-group col-md-3" align="right">
                              Hipoestesias
                              <input value="1"  type="radio" name="rs18" id="lt" > SI
                              <input value="2" type="radio" name="rs18" id="lt" > NO
                            </div>


<div class="form-group col-md-3" align="right">
                              Cefalea
                              <input value="1"  type="radio" name="rs19" id="lt" > SI
                              <input value="2" type="radio" name="rs19" id="lt" > NO
                            </div>
                            <div class="form-group col-md-3" align="right">
                              Astenia
                              <input value="1"  type="radio" name="rs20" id="lt" > SI
                              <input value="2" type="radio" name="rs20" id="lt" > NO
                            </div>
<div class="form-group col-md-3" align="right">
                              Adinamia
                              <input value="1"  type="radio" name="rs21" id="lt" > SI
                              <input value="2" type="radio" name="rs21" id="lt" > NO
                            </div>

      <div class="form-group col-md-12">
                              <hr>
                            </div>


  <div class="form-group col-md-12">
                <hr>
                </div>  
 
 
<div class="form-group col-md-12">
                <div align="left">Notas Adicionales </div>


                <div align="right">
                  <a onclick="procesar3()" id="procesar3"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                </div>
              <textarea id="notasadicionales" name="notasadicionales"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
            
                <!--textarea id="notasadicionales" name="notasadicionales"  class="textarea" placeholder="Notas Adicionales " style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea-->
             
              </div>
              





                          </div>
                        </div>
                      </div>

                      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Antecedentes">
                              Antecedentes
                            </a>
                          </h4>
                        </div>
                        <div id="Antecedentes" class="panel-collapse collapse">
                          <div class="box-body">
                            <h4 class="box-title">Antecedentes Personales</h4>

                            <div class="row">
                              <div class="form-group col-md-2">
                                <label>Alergias: <input type="checkbox" name="ant1" value="alergias" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Alertas de Riesgo: <input type="checkbox" name="ant2" value="Alertas de Riesgo" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Cáncer: <input type="checkbox" name="ant3" value="Cáncer" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Crecimiento y Desarrollo: <input type="checkbox" name="ant4" value="Crecimiento y Desarrollo" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Diabetes: <input type="checkbox" name="ant5" value="Diabetes" ></label>
                              </div>

                            </div>

                            <div class="row">
                              <div class="form-group col-md-3">
                                <label>Enfermedad Renal: <input type="checkbox" name="ant6" value="Enfermedad Renal" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Fármacos: <input type="checkbox" name="ant7" value="Fármacos" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Genéticos: <input type="checkbox" name="ant8" value="Genéticos" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Habitos Nocivos: <input type="checkbox" name="ant9" value="Habitos Nocivos" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>ITS: <input type="checkbox" name="ant10" value="ITS" ></label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-md-3">
                                <label>Habitos Saludables: <input type="checkbox" name="ant11" value="Habitos Saludables" ></label>
                              </div>

                              <div class="form-group col-md-3">
                                <label>Maltrato-Violencia: <input type="checkbox" name="ant12" value="Maltrato-Violencia" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Natales - Recien Nacido: <input type="checkbox" name="ant13" value="Natales - Recien Nacido" ></label>
                              </div>

                              <div class="form-group col-md-3">
                                <label>Organos y Sistemas: <input type="checkbox" name="ant14" value="Organos y Sistemas" ></label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-md-2">
                                <label>Postnatales: <input type="checkbox" name="ant15" value="Postnatales" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Prenatales: <input type="checkbox" name="ant16" value="Prenatales" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Salud Mental: <input type="checkbox" name="ant17" value="Salud Mental" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Trastornos Hipertensivos: <input type="checkbox" name="ant18" value="Trastornos Hipertensivos" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Trastornos Tiroideos: <input type="checkbox" name="ant19" value="Trastornos Tiroideos" ></label>
                              </div>
                            </div>

                            <div class="row">
                              <div class="form-group col-md-3">
                                <label>Tuberculosis: <input type="checkbox" name="ant20" value="Tuberculosis" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>VIH: <input type="checkbox" name="ant21" value="VIH" ></label>
                              </div>

                              <div class="form-group col-md-2">
                                <label>Otros: <input type="checkbox" name="ant22" value="Otros" ></label>
                              </div>
                            </div>

                            
                            <div class="box-body pad">


                            <div align="right">
                            <a onclick="procesar4()" id="procesar4"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
                            </div>
                            <textarea id="antecedentesP" name="antecedentesP"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>


                            <!--textarea id="antecedentesP" name="antecedentesP" class="textarea" placeholder="antecedentes" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea-->

                            </div> 

                            <h4 class="box-title">Antecedentes Familiares</h4>

                            <div class="row">
                              <div class="form-group col-md-2">
                                <label>Cáncer: <input type="checkbox" name="antf1" value="Cáncer" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Cardiosvasculares: <input type="checkbox" name="antf2" value="Cardiosvasculares" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Diabetes: <input type="checkbox" name="antf3" value="Diabetes" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Habitos Nocivos: <input type="checkbox" name="antf4" value="Habitos Nocivos" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Judiciales: <input type="checkbox" name="antf5" value="Judiciales" ></label>
                              </div>

                            </div>

                            <div class="row">
                              <div class="form-group col-md-2">
                                <label>Madre Adolescente: <input type="checkbox" name="antf6" value="Madre Adolescente" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Nefropatías: <input type="checkbox" name="antf7" value="Nefropatías" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Obesidad: <input type="checkbox" name="antf8" value="Obesidad" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Salud Mental: <input type="checkbox" name="antf9" value="Salud Mental" ></label>
                              </div>
                              <div class="form-group col-md-3">
                                <label>Sindrome Del Cuidador: <input type="checkbox" name="antf10" value="Sindrome Del Cuidador" ></label>
                              </div>

                            </div>

                            <div class="row">
                              <div class="form-group col-md-2">
                                <label>Tuberculosis: <input type="checkbox" name="antf11" value="Tuberculosis" ></label>
                              </div>
                              <div class="form-group col-md-4">
                                <label>Violencia Intra Familiar: <input type="checkbox" name="antf12" value="Violencia Intra Familiar" ></label>
                              </div>
                              <div class="form-group col-md-2">
                                <label>Otros: <input type="checkbox" name="antf13" value="Otros" ></label>
                              </div>
                            </div>

                              <div align="right">
                  <a onclick="procesar5()" id="procesar5"><i title='Iniciar Grabación' style='font-size: 18px;    margin-top: 2%;
' class='fa fa-fw fa-microphone'></i></a>
              </div>
              <textarea id="antecedentesF" name="antecedentesF"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                          </div>

                        </div>

                      </div>

                <!--      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree">
                              Estatus Prematuro del Infante
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="col-md-12">
                              <label>Es el infante prematuro:</label>
                              <input value="1" type="radio" name="prematuro" > Si
                              <input value="2" type="radio" name="prematuro" > No
                            </div>
                            
                            <div class="form-group col-md-3">
                              <div align="left">Edad Gestacional Completa</div>
                              <input type="number" class="form-control" name="edadGestacionalCompleta" value="40" onchange="calcularprematuriedad()" onkeyup="calcularprematuriedad()" disabled>
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">Edad Gestacional al Nacer (semanas completas)</div>
                              <input type="number" class="form-control " name="edadGestacional" value="0" onchange="calcularprematuriedad()" onkeyup="calcularprematuriedad()">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Total de Semanas de Prematuridad</div>
                              <input type="number" class="form-control " name="SemanasPrematuriedad" value="0" readonly="readonly">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Edad Cronológica</div>
                              <input type="number" class="form-control" name="edadCronologica" value="0" onchange="calcularEdadCorregida()" onkeyup="calcularEdadCorregida()">
                            </div>

                            <div class="form-group col-md-4">
                              <div align="left">Semanas de Prematuridad</div>
                              <input type="number" class="form-control " name="semPrematuriedad" value="0" onchange="calcularEdadCorregida()" onkeyup="calcularEdadCorregida()">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Edad Corregida Total</div>
                              <input type="number" class="form-control " name="edadCorregida" value="0" readonly="readonly">
                            </div>
                          </div>
                        </div>
                      </div>    -->

                      <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#collapseThree44">
                              Examen Físico
                            </a>
                          </h4>
                        </div>
                        <div id="collapseThree44" class="panel-collapse collapse">
                          <div class="box-body">

                            <div class="col-md-12"> <font size="1"> Calculo de IMC   </font></div>

                            <div class="form-group col-md-3">
                              <div align="left">Peso en KG</div>
                              <input type="number" class="form-control input-lg" id="peso" name="peso" onChange="calcularimc();" step="any">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Altura en <strong>  Centimetros </strong></div>
                              <input type="number" class="form-control input-lg" id="altura" name="altura" onChange="calcularimc();" step="any">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left"> Índice de masa corporal </div>
                              <input type="number" class="form-control input-lg" id="imc" name="imc" step="any"> 
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Composición corporal</div>
                              <input type="text" class="form-control input-lg" id="ComposicionCorporal" name="ComposicionCorporal">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">TA (mmhg)</div>
                              <input type="text" class="form-control input-lg" id="tart1" name="tart1" step="any" placeholder="123 / 123"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">Temperatura  ºC </div>
                              <input type="text" class="form-control input-lg" id="temperatura" name="temperatura" step="any"  maxlength="5" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>
                            <div class="form-group col-md-3">
                              <div align="left">FC LPM</div>
                              <input type="text" class="form-control input-lg" id="fcard" name="fcard"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="form-group col-md-3">
                              <div align="left">SAT02</div>
                              <input type="text" class="form-control input-lg" id="sat" name="sat"  maxlength="12" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                            </div>

                            <div class="col-md-6">

                              <div class="box-group" id="examenFisico1">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#estadoGeneral">
                                        Estado General
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="estadoGeneral" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Buen estado general
                                        <input value="1"  type="radio" name="e11" id="lt" > SI
                                        <input value="2" type="radio" name="e11" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Febril al tacto
                                        <input value="1"  type="radio" name="e12" id="lt" > SI
                                        <input value="2" type="radio" name="e12" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Irritable
                                        <input value="1"  type="radio" name="e13" id="lt" > SI
                                        <input value="2" type="radio" name="e13" id="lt" > NO
                                      </div>


                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e14" name="e14"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#estadoConciencia">
                                        Estado Conciencia
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="estadoConciencia" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Alerta
                                        <input value="1"  type="radio" name="e21" id="lt" > SI
                                        <input value="2" type="radio" name="e21" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Somnoliento
                                        <input value="1"  type="radio" name="e22" id="lt" > SI
                                        <input value="2" type="radio" name="e22" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Inconciente
                                        <input value="1"  type="radio" name="e23" id="lt" > SI
                                        <input value="2" type="radio" name="e23" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e24" name="e24"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#ojos">
                                        Ojos
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="ojos" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Reacción pupilar N
                                        <input value="1"  type="radio" name="e31" id="lt" > SI
                                        <input value="2" type="radio" name="e31" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Ojo Rojo
                                        <input value="1"  type="radio" name="e32" id="lt" > SI
                                        <input value="2" type="radio" name="e32" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Dolor ocular
                                        <input value="1"  type="radio" name="e33" id="lt" > SI
                                        <input value="2" type="radio" name="e33" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Nistagmo
                                        <input value="1"  type="radio" name="e34" id="lt" > SI
                                        <input value="2" type="radio" name="e34" id="lt" > NO
                                      </div>
                                      <div class="form-group col-md-6" align="right">
                                        Pterigión
                                        <input value="1"  type="radio" name="e35" id="lt" > SI
                                        <input value="2" type="radio" name="e35" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e36" name="e36"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#otoscopia">
                                        Otoscopia
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="otoscopia" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Dolor a la exploración
                                        <input value="1"  type="radio" name="e41" id="lt" > SI
                                        <input value="2" type="radio" name="e41" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Exsudados en CAE
                                        <input value="1"  type="radio" name="e42" id="lt" > SI
                                        <input value="2" type="radio" name="e42" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Cambios en timpanos
                                        <input value="1"  type="radio" name="e43" id="lt" > SI
                                        <input value="2" type="radio" name="e43" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e44" name="e44"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#cavidadOral">
                                        Cavidad Oral
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="cavidadOral" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Mucosa Oral
                                        <input value="1"  type="radio" name="e51" id="lt" > SI
                                        <input value="2" type="radio" name="e51" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Aftas Bucales
                                        <input value="1"  type="radio" name="e52" id="lt" > SI
                                        <input value="2" type="radio" name="e52" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Gingivitis
                                        <input value="1"  type="radio" name="e53" id="lt" > SI
                                        <input value="2" type="radio" name="e53" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Caries
                                        <input value="1"  type="radio" name="e54" id="lt" > SI
                                        <input value="2" type="radio" name="e54" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Faringe
                                        <input type="text" class="form-control input-lg" id="e55" name="e55"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#cuello">
                                        Cuello
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="cuello" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Movilidad Normal
                                        <input value="1"  type="radio" name="e61" id="lt" > SI
                                        <input value="2" type="radio" name="e61" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Adenomegalias
                                        <input value="1"  type="radio" name="e62" id="lt" > SI
                                        <input value="2" type="radio" name="e62" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Masa Palpable
                                        <input value="1"  type="radio" name="e63" id="lt" > SI
                                        <input value="2" type="radio" name="e63" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Bocio
                                        <input value="1"  type="radio" name="e64" id="lt" > SI
                                        <input value="2" type="radio" name="e64" id="lt" > NO
                                      </div>
                                      <div class="form-group col-md-6" align="right">
                                        Aneurisma
                                        <input value="1"  type="radio" name="e65" id="lt" > SI
                                        <input value="2" type="radio" name="e65" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e66" name="e66"  maxlength="40" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#torax">
                                        Torax
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="torax" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Pulmones claros y bien ventilados
                                        <input value="1"  type="radio" name="e71" id="lt" > SI
                                        <input value="2" type="radio" name="e71" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Roncus
                                        <input value="1"  type="radio" name="e72" id="lt" > SI
                                        <input value="2" type="radio" name="e72" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Silibancias
                                        <input value="1"  type="radio" name="e73" id="lt" > SI
                                        <input value="2" type="radio" name="e73" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Estertores
                                        <input value="1"  type="radio" name="e74" id="lt" > SI
                                        <input value="2" type="radio" name="e74" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Crepitantes
                                        <input value="1"  type="radio" name="e75" id="lt" > SI
                                        <input value="2" type="radio" name="e75" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Hipoventilacion
                                        <input value="1"  type="radio" name="e76" id="lt" > SI
                                        <input value="2" type="radio" name="e76" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e55" name="e77"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                              </div>

                            </div>

                            <div class="col-md-6">

                              <div class="box-group" id="examenFisico1">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#corazon">
                                        Corazon
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="corazon" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Ruidos cardiacos normales
                                        <input value="1"  type="radio" name="e81" id="lt" > SI
                                        <input value="2" type="radio" name="e81" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Soplo
                                        <input value="1"  type="radio" name="e82" id="lt" > SI
                                        <input value="2" type="radio" name="e82" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Arritmia
                                        <input value="1"  type="radio" name="e83" id="lt" > SI
                                        <input value="2" type="radio" name="e83" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="right">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e84" name="e84"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">

                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#Abdomen">
                                        Abdomen
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Abdomen" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Blando
                                        <input value="1"  type="radio" name="e91" id="lt" > SI
                                        <input value="2" type="radio" name="e91" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Dolor a la exploración
                                        <input value="1"  type="radio" name="e92" id="lt" > SI
                                        <input value="2" type="radio" name="e92" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Peristalsis aumentada
                                        <input value="1"  type="radio" name="e93" id="lt" > SI
                                        <input value="2" type="radio" name="e93" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Hepatomegalia
                                        <input value="1"  type="radio" name="e94" id="lt" > SI
                                        <input value="2" type="radio" name="e94" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Hernia
                                        <input value="1"  type="radio" name="e95" id="lt" > SI
                                        <input value="2" type="radio" name="e95" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Esplenomegalia
                                        <input value="1"  type="radio" name="e96" id="lt" > SI
                                        <input value="2" type="radio" name="e96" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e97" name="e97"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#GenitoUrinario">
                                        Genito Urinario
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="GenitoUrinario" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Dolor suprapúblico
                                        <input value="1"  type="radio" name="e101" id="lt" > SI
                                        <input value="2" type="radio" name="e101" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Masa suprapública
                                        <input value="1"  type="radio" name="e102" id="lt" > SI
                                        <input value="2" type="radio" name="e102" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Peñopercusión dolorosa
                                        <input value="1"  type="radio" name="e103" id="lt" > SI
                                        <input value="2" type="radio" name="e103" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="right">
                                        Notas
                                        <input type="text" class="form-control input-lg" id="e1031" name="e1301"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Ulcera Genital
                                        <input value="1"  type="radio" name="e104" id="lt" > SI
                                        <input value="2" type="radio" name="e104" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Verrugas genitales
                                        <input value="1"  type="radio" name="e105" id="lt" > SI
                                        <input value="2" type="radio" name="e105" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Flujo vaginal
                                        <input value="1"  type="radio" name="e106" id="lt" > SI
                                        <input value="2" type="radio" name="e106" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Varicocele
                                        <input value="1"  type="radio" name="e107" id="lt" > SI
                                        <input value="2" type="radio" name="e107" id="lt" > NO
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#Extremidades">
                                        Extremidades
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Extremidades" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Movilidad Normal
                                        <input value="1"  type="radio" name="e111" id="lt" > SI
                                        <input value="2" type="radio" name="e111" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Fuerza Normal
                                        <input value="1"  type="radio" name="e112" id="lt" > SI
                                        <input value="2" type="radio" name="e112" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Deformidades
                                        <input value="1"  type="radio" name="e113" id="lt" > SI
                                        <input value="2" type="radio" name="e113" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Marcha Normal
                                        <input value="1"  type="radio" name="e114" id="lt" > SI
                                        <input value="2" type="radio" name="e114" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Aumento Articular
                                        <input value="1"  type="radio" name="e115" id="lt" > SI
                                        <input value="2" type="radio" name="e115" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Dolor Articular
                                        <input value="1"  type="radio" name="e116" id="lt" > SI
                                        <input value="2" type="radio" name="e116" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e117" name="e117"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#VacularPeriferico">
                                        Vacular Periférico
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="VacularPeriferico" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-6" align="right">
                                        Edema
                                        <input value="1"  type="radio" name="e121" id="lt" > SI
                                        <input value="2" type="radio" name="e121" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        LLenado capilar
                                        <input value="1"  type="radio" name="e122" id="lt" > Normal
                                        <input value="2" type="radio" name="e122" id="lt" > Lento
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Varices
                                        <input value="1"  type="radio" name="e123" id="lt" > SI
                                        <input value="2" type="radio" name="e123" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="right">
                                        Notas
                                        <input type="text" class="form-control input-lg" id="e1231" name="e97"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#SistemaNervioso">
                                        Sistema Nervioso
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="SistemaNervioso" class="panel-collapse collapse">
                                    <div class="box-body">
                                      <div class="form-group col-md-6" align="right">
                                        Alerta
                                        <input value="1"  type="radio" name="e131" id="lt" > SI
                                        <input value="2" type="radio" name="e131" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Lenguaje coherente
                                        <input value="1"  type="radio" name="e132" id="lt" > SI
                                        <input value="2" type="radio" name="e132" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Temblor
                                        <input value="1"  type="radio" name="e133" id="lt" > SI
                                        <input value="2" type="radio" name="e133" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Prueba Dedo - Nariz
                                        <input value="1"  type="radio" name="e134" id="lt" > Normal
                                        <input value="2" type="radio" name="e134" id="lt" > Anormal
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Romberg
                                        <input value="1"  type="radio" name="e135" id="lt" > Positivo
                                        <input value="2" type="radio" name="e135" id="lt" > Negativo
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Reflejos paterales
                                        <input value="1"  type="radio" name="e136" id="lt" > Normal
                                        <input value="2" type="radio" name="e136" id="lt" > Anormal
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Desviacion de comisura labial
                                        <input value="1"  type="radio" name="e137" id="lt" > SI
                                        <input value="2" type="radio" name="e137" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Hemiparesia
                                        <input value="1"  type="radio" name="e138" id="lt" > SI
                                        <input value="2" type="radio" name="e138" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <input type="text" class="form-control input-lg" id="e117" name="e1381"  maxlength="120" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                                      </div>

                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#PielAnexos">
                                        Piel y Anexos
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="PielAnexos" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <!--<div class="form-group col-md-6" align="right">
                                        Exatema
                                        <input value="1"  type="radio" name="e141" id="lt" > SI
                                        <input value="2" type="radio" name="e141" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Abceso
                                        <input value="1"  type="radio" name="e142" id="lt" > SI
                                        <input value="2" type="radio" name="e142" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Infección Local
                                        <input value="1"  type="radio" name="e143" id="lt" > SI
                                        <input value="2" type="radio" name="e143" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Pioderma
                                        <input value="1"  type="radio" name="e144" id="lt" > Si
                                        <input value="2" type="radio" name="e144" id="lt" > No
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Ronchas
                                        <input value="1"  type="radio" name="e145" id="lt" > Si
                                        <input value="2" type="radio" name="e145" id="lt" > No
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Habones
                                        <input value="1"  type="radio" name="e146" id="lt" > Si
                                        <input value="2" type="radio" name="e146" id="lt" > No
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Angioedema
                                        <input value="1"  type="radio" name="e147" id="lt" > SI
                                        <input value="2" type="radio" name="e147" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Hipocromia
                                        <input value="1"  type="radio" name="e148" id="lt" > SI
                                        <input value="2" type="radio" name="e148" id="lt" > NO
                                      </div>

                                      <div class="form-group col-md-6" align="right">
                                        Erupción Herpetica
                                        <input value="1"  type="radio" name="e149" id="lt" > SI
                                        <input value="2" type="radio" name="e149" id="lt" > NO
                                      </div>
                                      <div class="form-group col-md-6" align="right">
                                        Celulitis
                                        <input value="1"  type="radio" name="e1410" id="lt" > SI
                                        <input value="2" type="radio" name="e1410" id="lt" > NO
                                      </div>
                                      <div class="form-group col-md-6" align="right">
                                        Erisipela
                                        <input value="1"  type="radio" name="e1411" id="lt" > SI
                                        <input value="2" type="radio" name="e1411" id="lt" > NO
                                      </div>-->
                                      <div class="form-group col-md-12" align="left">
                                        Anotaciones
                                        <textarea id="e1412" name="e1412"  maxlength="70" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"></textarea>
                                      </div>

                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>

                          </div>

                        </div>

                      <br>




<div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Diagnostico">
                              Diagnostico ministerio de Salud
                            </a>
                          </h4>
                        </div>
                        <div id="Diagnostico" class="panel-collapse collapse">
                          <div class="box-body">


                        
                        <div class="box-body pad">
                          <textarea id="tratamiento" name="diagnosticoMsalud" class="textarea" placeholder="Diagnostico ministerio de Salud" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                        </div>

                        <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diagnóstico Cie10</label>
                                        </div>
                                      </div>

                                      <!-- Funcionando CIE10 -->
                                      <div class="form-group col-md-12">
                                        CIE-10 (Introduzca una palabra clave para busqueda rápido del diagnóstico)


<!-- cie_10 #1-->
 <div class="col-md-12"> 

<div class="col-md-4">
<label>Código del Diagnóstico principal </label>
<br> 
<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name1"   value="select1" >

</div>
                <div id="div-results1"  class="col-md-8">
                </div>
</div>

<!-- cie_10 #2-->
<div class="col-md-12"> 
  <div class="col-md-4">
    <label>Código del Diagnóstico relacionado N° 1</label>
    <br> 
    <input type="text"  id="clienteId2"  onChange="verlista2();" placeholder="Buscar CIE10" >
    <input type="hidden"  id="name2"   value="select2" >
  </div>
  <div id="div-results2"  class="col-md-8"></div><!-- resultado cie-10-->
</div>

<!-- cie_10 #3-->
<div class="col-md-12"> 
  <div class="col-md-4">
    <label>Código del Diagnóstico relacionado N° 2</label>
    <br> 
    <input type="text"  id="clienteId3"  onChange="verlista3();" placeholder="Buscar CIE10" >
    <input type="hidden"  id="name3"   value="select3" >
  </div>
  <div id="div-results3"  class="col-md-8"></div><!-- resultado cie-10-->
</div>

<!-- cie_10 #4-->
<div class="col-md-12"> 
  <div class="col-md-4">
    <label>Código del Diagnóstico relacionado N° 3</label>
    <br> 
    <input type="text"  id="clienteId4"  onChange="verlista4();" placeholder="Buscar CIE10" >
    <input type="hidden"  id="name4"   value="select4" >
  </div>
  <div id="div-results4"  class="col-md-8"></div><!-- resultado cie-10-->
</div>

<div class="form-group col-md-12" align="left">
  <label>Tipo de diagnóstico principal</label>
  <select id="tipo_diagnostico_principal" name="tipo_diagnostico_principal" class="form-control select2" style="width: 100%;">
    <option value="" selected> Seleccione</option>
    <option value="1" > Impresión Diagnóstica </option>
    <option value="2" > Confirmado nuevo </option>
    <option value="3" > Confirmado repetido </option>

  </select>

</div>




                                  <!--     <?php

                                        if ($cie10 == 1) {
                                          ?>
                                          <select id="cie10" name="cie10postquirurgico[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                           
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cie10 order by codigo limit 1000");
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
                                      </div> -->




                                      </div>  </div>


                                     </div></div>

                                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#examenesr">
                              Exámenes a realizar
                            </a>
                          </h4>
                        </div>
                        <div id="examenesr" class="panel-collapse collapse">
                          <div class="box-body">
                          <div class="col-sm-12">
                            
                          </div>

                          <div class="form-group col-md-12">
                            <div align="left">Laboratorio </div>
                          </div>
                          <div class="box-body pad">
                            <textarea id="laboratorio" name="laboratorio" class="textarea" placeholder="Laboratorio" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div>

                          <div class="form-group col-md-12">
                            <div align="left">Imagenologia </div>
                          </div>
                          <div class="box-body pad">
                            <textarea id="ecografia" name="ecografia" class="textarea" placeholder="Imagenologia" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div>

                          <div class="form-group col-md-12">
                            <div align="left">Otros</div>
                          </div>
                          <div class="box-body pad">
                            <textarea id="otros" name="otros" class="textarea" placeholder="Otros" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div>  </div>  </div>  </div>


  

<div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#examenes">
                              Exámenes de las partes del cuerpo
                            </a>
                          </h4>
                        </div>
                        <div id="examenes" class="panel-collapse collapse">
                          <div class="box-body">


                      <div class="form-group col-md-12">  
                        <textarea id="examenPartesdCuerpo" name="examenPartesdCuerpo" class="textarea" placeholder="Exámenes de las partes del cuerpo" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                      </div>


                      </div></div></div>

                <!--      <div class="form-row">

                        <input type="hidden" name="registro" value="1" >
                        <div class="form-group col-md-4">
                          <div align="left">Acompañante Familiar </div>
                          <input type="text" class="form-control input-lg" id="acompananteFamiliar" name="acompananteFamiliar" placeholder="Acompanante Familiar"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                        <div class="form-group col-md-4">
                          <div align="left">Teléfono Acompañante</div>
                          <input type="text" class="form-control input-lg" id="telefono_acompanante" name="telefono_acompanante" placeholder="Telefono Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>

                        <div class="form-group col-md-4">
                          <div align="left">Parentesco</div>
                          <input type="text" class="form-control input-lg" id="parentesco" name="parentesco" placeholder="Parentesco Acompanante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>



                        <div class="form-group col-md-4">
                          <div align="left">Representante </div>
                          <input type="text" class="form-control input-lg" id="Representante" name="Representante" placeholder="Representante"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>
                        <div class="form-group col-md-4">
                          <div align="left">Teléfono Representante</div>
                          <input type="text" class="form-control input-lg" id="telefono_Representante" name="telefono_Representante" placeholder="Telefono Representante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>

                        <div class="form-group col-md-4">
                          <div align="left">Parentesco Representante</div>
                          <input type="text" class="form-control input-lg" id="parentescoRepresentante" name="parentescoRepresentante" placeholder="Parentesco Representante"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>


-->  

<!--<div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#analisis">
                              Análisis
                            </a>
                          </h4>
                        </div>
                        <div id="analisis" class="panel-collapse collapse">
                          <div class="box-body">



                 <div align="right">
                  <a onclick="procesar7()" id="procesar7"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
              </div>
              <textarea id="diagnostico" name="analisis"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                        </div> </div></div>-->





<!--<div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#impresion">
                              Impresiones diagnosticas (Diagnostico general)
                            </a>
                          </h4>
                        </div>
                        <div id="impresion" class="panel-collapse collapse">
                          <div class="box-body">

                 <div align="right">
                  <a onclick="procesar9()" id="procesar9"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>
              </div>
              <textarea id="diagnostico" name="diagnostico"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                        </div> </div></div>-->


















<div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#tratamientoplan">
                              Tratamiento (Plan de atención) y Remisón
                            </a>
                          </h4>
                        </div>
                        <div id="tratamientoplan" class="panel-collapse collapse">
                          <div class="box-body">

                        <div class="form-group col-md-12">
                          <div align="left">Tratamiento (Plan de atención)</div>
                        </div>
                        <div class="box-body pad">
                          <textarea id="tratamiento" name="tratamiento" class="textarea" placeholder="Tratamiento" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                        </div> 


                        <div class="form-group col-md-3" align="right">
                          Para clínicos
                          <br>
                          <input value="1"  type="radio" name="p1" id="lt" > SI
                          <input value="2" type="radio" name="p1" id="lt" > NO
                        </div>

                        <div class="form-group col-md-9" align="left">
                          <input type="text" class="form-control input-lg" id="p2" name="p2"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>

                        <div class="form-group col-md-3" align="right">
                          Remisión
                          <br>
                          <input value="1"  type="radio" name="r1" id="r1" > SI
                          <input value="2" type="radio" name="r1" id="r1" > NO
                        </div>

                        <div class="form-group col-md-9" align="left">
                          <input type="text" class="form-control input-lg" id="r2" name="r2"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);">
                        </div>  </div></div></div>



                      <!--    <div class="form-group col-md-12">
                            <div align="left">Receta médica </div>
                          </div>
                          <div class="box-body pad">
                            <textarea id="recipe" name="recipe" class="textarea" placeholder="Receta médica" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                          </div>
                          <div class="form-group col-md-12">
                            <div align="left">Como tomar</div>
                          </div>

                          <div class="box-body pad">
                            <textarea id="comoTomarlo" name="comoTomarlo" class="textarea" placeholder="Como tomar" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div> -->






          <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#incapacidad">
                              Incapacidades
                            </a>
                          </h4>
                        </div>
                        <div id="incapacidad" class="panel-collapse collapse">
                          <div class="box-body">

                                          <div class="form-group col-md-12">
                            <div align="left">Nota de Incapacidad </div>
                          </div>
                          <div class="box-body pad">
                            <textarea id="incapacidades" name="incapacidades" class="textarea" placeholder="Incapacidades" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                          </div> </div></div></div>



<div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#notas">
                              Notas o comentarios
                            </a>
                          </h4>
                        </div>
                        <div id="notas" class="panel-collapse collapse">
                          <div class="box-body">

                          <div class="form-group col-md-12">
                            <div align="left"> (Campo no impreso solo para control interno)</div>
                          </div>
                          <div class="box-body pad">
                            
               <div align="right">
                  <!--<a onclick="procesar7()" id="procesar7"><i title='Iniciar Grabación' style='font-size: 18px;' class='fa fa-fw fa-microphone'></i></a>-->
              </div>

              <textarea id="notas" name="notas"  class="textarea"  style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" ></textarea>
                          </div> </div></div> </div>
                        




                          <div class="panel box box-success">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#recetario">
                              Recetario
                            </a>
                          </h4>
                        </div>
                        <div id="recetario" class="panel-collapse collapse">
                          <div class="box-body">
    <!--

          <form action="detalleRecetario.php" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
        
         <form id="detalleRecetario2" method="POST" name="formularioActualizarcliente" enctype="multipart/form-data">
    -->                       


        <div class="form-row">
      
<!--
<div class="form-group col-md-12">
<div align="left">  

  <label>Medicamento e indicaciones</label> </div>

              
                <input type="hidden" class="form-control input-lg" id="usuario_id" name="usuario_id" placeholder="usuario_id" value="<?php echo  $usuario_id?>">
                <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" >
                    <option value="" selected="selected">Seleccione Medicamento</option>
                    <?php
                        $queryList=mysqli_query($conn3,"SELECT * FROM  pos");

                    
                                      $nrowl=mysqli_num_rows($queryList);
                                      while($row_recordset32=mysqli_fetch_array($queryList))
                                      {
                                          $descripcion     = $row_recordset32['descripcion'];
                                          $concentracion    = $row_recordset32['concentracion'];
                                         
                                         $formafarmaceutica  = $row_recordset32['formafarmaceutica'];
                                         $codigo  = $row_recordset32['codigo'];
                                          $ID              = $row_recordset32['id'];
                                         
                                          echo "<option value=' $codigo | $descripcion | $formafarmaceutica' > $descripcion | $concentracion | $formafarmaceutica </option>";
                                      }

                    ?>

                  <input type="text" name="codigoProd1" id="codigoProd1" class="form-control input-lg"> 
 
                </select>

              </div>  -->


              <div class="col-md-12" align="left"> 

Seleccione Medicamento

<div class="col-md-3">
<br> 
<input type="text"  id="clientepos"  onChange="verPos();" placeholder="Buscar Medicamento" >

 
</div>
                <div id="div-resultsM"  class="col-md-9">
                </div>

                
                 <input type="text" name="codigoProd1" id="codigoProd1" class="form-control input-lg"> 
</div>

 
<div class="col-md-6">

                                                  <div class="form-group">
                                                  <label>Cantidad</label><br>
                                                  <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="obligatorio**"  > 
                                                </div>
                                                </div>


                                           <!--     <div class="col-md-2">
                                                <div class="form-group">
                                                  <label>Dosis</label><br>
                                                  <input type="number" name="dosis" id="dosis" class="form-control input-lg dosis"  > 
                                                </div>
                                                </div> -->

                                                <div class="col-md-6">
                                                <div class="form-group">
                                                  <label>Presentación</label>
                                                  <select class="form-control posologia" name="posologia" id="posologia" >
                                                     <option value=" "> </option>
                       <!--     <option value="Miligramos">Miligramos </option
                            <option value="Milimetros">Milimetros</option>
                            <option value="Microgramos">Microgramos</option>
                            <option value="Gramos">Gramos</option>
                            <option value="Milimetros">CC</option>
                            <option value="Unidad">Unidad</option>
                            <option value="Sobre">Sobre</option>
                            <option value="Frasco">Frasco</option>
                            <option value="Onza">Onza</option> -->
                            <option value="Tabletas">Tabletas</option>
                            <option value="Ampollas">Ampollas</option>
                            <option value="Capsulas">Cápsulas</option>
                             <option value="Comprimidos">Comprimidos</option>
                            <option value="Crema">Crema</option>
                            <option value="Jarabe">Jarabe</option>
                            <option value="Ovulos">Ovulos</option>
                            <option value="Sobre">Sobre</option>
                            <option value="Tubo">Tubo</option>
                            <option value="Geles y jaleas- Espuma">Geles y jaleas- Espuma</option>
                            <option value="Loción">Loción</option>
                            <option value="Jabones y champú">Jabones y champú</option>
                            <option value="Unguento">Unguento</option>
                            <option value="Otras soluciones">Otras soluciones</option>
                            <option value="Ampolla">Ampolla</option>
                            <option value="Anillo">Anillo</option>
                            <option value="Aplicador">Aplicador</option>
                            <option value="Atomizador(spray)">Atomizador(spray)</option>
                            <option value="Barra">Barra</option>
                            <option value="Bolo">Bolo</option>
                            <option value="Bolsa">Bolsa</option>
                            <option value="Caja">Caja</option>
                            <option value="Cartón">Cartón</option>
                            <option value="Cartucho">Cartucho</option>
                            <option value="Cilindro">Cilindro</option>
                            <option value="Contenedor">Contenedor</option>
                            <option value="Disco">Disco</option>
                            <option value="Esponja">Esponja</option>
                            <option value="Estuche">Estuche</option>
                            <option value="Frasco">Frasco</option>
                            <option value="Generador">Generador</option>
                            <option value="Gotas">Gotas</option>
                            <option value="Implante">Implante</option>
                            <option value="Inhalador">Inhalador</option>
                            <option value="Jarra">Jarra</option>
                            <option value="Jeringa">Jeringa</option>
                            <option value="Kit">Kit</option>
                            <option value="Lata">Lata</option>
                            <option value="Litro">Litro</option>
                            <option value="Parche">Parche</option>
                            <option value="Pluma">Pluma</option>
                            <option value="Supositorio">Supositorio</option>
                            <option value="Tampón">Tampón</option>
                            <option value="Tanque">Tanque</option>
                            <option value="Tira">Tira</option>
                            <option value="Unidades">Unidades</option>
                            <option value="Vial">Vial</option>

                            
                            
                          </select>
                                                </div>  
                                             </div> </div>
                                             <div class="col-md-3">
                                             <div class="form-group">
                                                   <label>Frecuencia de administración</label>
                                                  <input type="text" name="frecuencia" id="frecuencia" class="form-control"> 
                                                </div>
                                                </div>

                                                 <div class="col-md-3">
                                             <div class="form-group">
                                                   <label>Dosis</label>
                                                  <input type="text" name="dosis" id="dosis" class="form-control"> 
                                                </div>
                                                </div>

                                                 <div class="col-md-3">
                                             <div class="form-group">
                                                   <label>Duración Prescripción</label>
                                                  <input type="text" name="duracion" id="duracion" class="form-control"> 
                                                </div>
                                                </div>

                                                <div class="col-md-3">
                                             <div class="form-group">
                                                   <label>Método de administración</label>
                                                  <input type="text" name="metodo" id="metodo" class="form-control" > 
                                                </div>
                                                </div>

                                            <!--      <div class="form-group">
                                                   <label>Frecuencia  dosis(cada)</label>
                                                  <input type="number" name="frecuencia" id="frecuencia" class="form-control input-lg frecuencia" onChange="calculardosis();"  step="any"> 
                                                </div>
                                                </div>

                              <div class="col-md-3">
                                                <div class="form-group">
                                                   <label>Tiempo </label>
                                                  <select class="form-control" name="administracion" id="administracion" class="form-control input-lg administracion" onChange="calculardosis();" step="any"> 
                                                     <option value=" ">Selecione ...</option>
                            <option value="Minutos">Minutos</option>
                            <option value="Horas">Horas  </option>
                            <option value="Dias">Dias</option>
                            <option value="Semana">Semana</option>
                            <option value="Unica">&uacutenica vez</option>
                            <option value="Mes">Mes</option>
                            <option value="Ano">Año</option>
                            
                          </select>
                                                </div>
                                                </div>


                                                <div class="col-md-4">
                                                <div class="form-group">
                                                  <label>Dosis por d&iacutea</label><br>
                                                  <input type="text" class="form-control input-lg dosisdia" id="dosisdia" name="dosisdia"step="any">
                                                </div>
                                                </div>
              

<div class="col-md-3">
                                                <div class="form-group">
                                                  <label>Por cuantos d&iacuteas</label><br>
                                                  <input type="text" class="form-control input-lg dias"  id="dias" name="dias" onChange="calculardosis();"  step="any">
                                                </div>
                                                </div>




                                            <div class="col-md-5">
                                                <div class="form-group">
                                                  <label>V&iacutea de administraci&oacuten </label>
                                                  <select class="form-control via" name="via" id="via" >
                                                     <option value=" ">Selecione....</option>
                            <option value="Oral">Oral </option>
                            <option value="Intra venosa">Intra venosa</option>
                            <option value="Rectal">Rectal</option>
                             <option value="Vaginal">Vaginal</option>
                             <option value="inhalada">inhalada</option>
                             <option value="T&oacutepica">T&oacutepica</option>
                             <option value="Oft&aacutelmica">Oft&aacutelmica</option>
                             <option value="Otica">Otica</option>
                             <option value="Intrad&eacutermico">Intrad&eacutermico</option>
                             <option value="Subd&eacutermico">Subd&eacutermico</option>
                             <option value="Intramuscular">Intramuscular</option>
                          </select>
                                                </div>
                                            </div> 






                                            <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Cantidad dosis total</label><br>
                                                  <input type="text" class="form-control input-lg total" id="total" name="total" step="any">
                                                </div>
                                              </div> -->


<div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Indicaciones de administración</label><br>
                                                  <textarea type="text" class="form-control nota" name="nota"  id="nota" placeholder="INDICACIONES ESPECIFICAS DEL MEDICAMNETO"> </textarea>
                                                </div>
                                                </div>
                                            
 <div class="col-md-12">
                                                <div class="form-group">
                                                  <label>Observaciones</label><br>
                                                  <textarea type="text" class="form-control nota" name="nota2"  id="nota2" placeholder="INDICACIONES GENERALES DE LA RECETA , LLENAR AL FINAL. "> </textarea>
                                                </div>
                                                </div>
               
                                            
 
               
 
              <input type="hidden" name="id_usuario" id="id_usuario"  value="<?php echo $_SESSION['ID']?>">
              <input type="hidden" name="idcliente" id="idcliente"  value="<?php echo $clienteId?>">
              <input type="hidden" name="idReceta" id="idReceta" value="<?php echo $idR?>">
              
            <input type="hidden" name="nomedicamento" value="<?php echo $descripcion?>">

           
            
            <input type="hidden"  name="tipo_cliente"   valur="1">
 
            
             <div class="form-group col-md-2">
                  <br>
                   
<a href="#"  onclick="agergarItem();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Agregar </strong>  </font> </a>

   
<!--
<a href="#"  onclick="limpiar();"> <font size="5">  <i class="fa fa-glyphicon glyphicon-plus"></i> <strong>    Limpiar </strong>  </font> </a>
    <input type="button" onclick="limpiarFormulario()" value="Limpiar formulario">
-->
               
              </div>
<script type="text/javascript">
    $(document).ready(function() 
    {
      $('#limpiar').click(function() {
        $('.dosis').val('');
        $('.posologia').val('');
        $('.frecuencia').val('');
        $('.administracion').val('');
        $('.duracion').val('');
        $('.metodo').val('');
        $('.dosisdia').val('');
        $('.dias').val('');
        $('.via').val('');
        $('.total').val('');
        $('.nota').val('');
        $('.nota2').val('');
         
      });
    });
    </script>

            <br>

                <div class="form-group col-md-12" id="div-results"></div>
                <br>
                <br>


                <!--
          </form>
                -->





                          </div></div></div>  



                     
 
                        <div class="panel box box-primary">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#info_rips">
                                        Informacion Para RIPS 
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="info_rips" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-12" align="left">
                                        <label>Número de Autorización</label><br>
                                        <input type="number" name="numero_autorizacion" id="numero_autorizacion" class="form-control" placeholder="Numero de Autorizacion" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                    

                                      <div class="form-group col-md-6" align="left">
                                        <label>Finalidad de la consulta</label>
                                        <select id="finalidad_consulta" name="finalidad_consulta" class="form-control select2" style="width: 100%;">
                                          <option value="" selected> Seleccione</option>
                                          <option value="Atención del parto(Atención del embarazo y del postparto" > Atención del parto(Atención del embarazo y del postparto)</option>
                                          <option value="Atención Recién Nacido" > Atención Recién Nacido </option>
                                          <option value="Atención Planificación familiar" > Atención Planificación familiar</option>
                                          <option value="Detección alteraciones de crecimiento y desarrollo en menor de 10 años" >  Detección alteraciones de crecimiento y desarrollo en menor de 10 años</option>
                                          <option value="Detección de alteración del desarrollo joven" > Detección de alteración del desarrollo joven</option>
                                          <option value=" Detección de alteraciones del embarazo" > Detección de alteraciones del embarazo</option>
                                          <option value="Detección de alteraciones del adulto" > Detección de alteraciones del adulto</option>
                                          <option value="Detección de alteraciones de agudeza visual" > Detección de alteraciones de agudeza visual</option>
                                          <option value="Detección de Enfermedad Profesional" > Detección de Enfermedad Profesional</option>
                                          <option value=" No aplica" > No aplica</option>
                                        </select>

                                      </div>

                                      <div class="form-group col-md-6" align="left">
                                        <label>Causa externa</label>
                                        <select id="causa_externa" name="causa_externa" class="form-control select2" style="width: 100%;">
                                          <option value="" selected> Seleccione</option>
                                          <option value="Accidente de trabajo(Atención del embarazo y el Postparto)" > Accidente de trabajo(Atención del embarazo y el Postparto)</option>
                                          <option value="Accidente de tránsito" > Accidente de tránsito</option>
                                          <option value="Accidente rábico" > Accidente rábico</option>
                                          <option value="Accidente ofídico" > Accidente ofídico</option>
                                          <option value="Otro tipo de accidente" > Otro tipo de accidente</option>
                                          <option value="Evento catatrósfico" > Evento catatrósfico</option>
                                          <option value="Lesión por agresión" > Lesión por agresión</option>
                                          <option value="Lesión auto infligida" > Lesión auto infligida</option>
                                          <option value="Sospecha de maltrato físico" > Sospecha de maltrato físico</option>
                                          <option value="Sospecha de abuso sexual" > Sospecha de abuso sexual</option>
                                          <option value="Sospecha de violencia sexual" > Sospecha de violencia sexual</option>
                                          <option value="Sospecha de maltrato emocional" > Sospecha de maltrato emocional</option>
                                          <option value="Enfermedad general" > Enfermedad general</option>
                                          <option value="Enfermedad profesional" > Enfermedad profesional</option>
                                          <option value=" Otra" > Otra</option>
                                        </select>
                                      </div>

                                    

                                       <div class="form-group col-md-12" align="left">
                                        <label>Número del Contrato</label><br>
                                        <input type="number" name="numero_contrato" id="numero_contrato" class="form-control" placeholder="Numero del Contrato" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group">
                                        <label>Plan de Beneficios</label><br>
                                        <textarea type="text" class="form-control nota" name="plan_beneficios"  id="plan_beneficios" placeholder="Plan de Beneficios"> </textarea>
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Número de la Póliza</label><br>
                                        <input type="number" name="numero_poliza" id="numero_poliza" class="form-control" maxlength="15" placeholder="Numero de la poliza" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor total del pago compartido COPAGO</label><br>
                                        <input type="number" name="valor_total_copago" id="valor_total_copago" class="form-control"  placeholder="valor de pago compartido COPAGO" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor de la comisión</label><br>
                                        <input type="number" name="valor_comision" id="valor_comision" class="form-control"  maxlength="15" placeholder="Valor de la Comision" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor total de Descuentos</label><br>
                                        <input type="number" name="valor_total_descuento" id="valor_total_descuento" class="form-control"  placeholder="Valor total de Descuentos" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor Neto a Pagar por la entidad Contratante</label><br>
                                        <input type="number" name="valor_entidad_contratante" id="valor_entidad_contratante" class="form-control" placeholder="Valor Neto Entidad Contratante" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

  <div class="form-group col-md-12" align="left">
                                        <label>Valor de la Consulta</label><br>
                                        <input type="number" name="valor_consulta" id="valor_consulta" class="form-control" placeholder="Numero de Autorizacion" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>


                                    </div>
                                  </div>
                                </div>

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#Procedimientos">
                                        Procedimientos Quirurgícos
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Procedimientos" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-12" align="left">
                                        <label>Ambito de realizacion del procedimiento</label>
                                        <select id="ambito_procedimiento" name="ambito_procedimiento" class="form-control select2" style="width: 100%;">
                                          <option value="" selected> Seleccione</option>
                                          <option value="Ambulatorio" > Ambulatorio </option>
                                          <option value="Hospitalario" > Hospitalario </option>
                                          <option value="En urgencias" > En urgencias </option>
                                        </select>
                                      </div>

                                        <div class="form-group col-md-12" align="left">
                                        <label>Codigo del procedimiento CUPS (Introduzca una palabra clave para la busqueda)</label><br>
                                          <div class="col-md-12"> 
                                            <div class="col-md-3">
                                              <br> 
                                              <input type="text"  id="clienteId_Cup" class="form-control input-lg" onChange="verlista_Cup();" placeholder="Buscar CUPS" >
                                              <input type="hidden"  id="name1_Cup"   value="select1_Cup" >
                                            </div>
                                            <br> 
                                            <div id="div-results1_Cup"  class="col-md-9"></div><!-- aqui sale el recuadro del CUP-->
                                          </div>       
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Finalidad del procedimiento</label>
                                        <select id="finalidad_procedimiento" name="finalidad_procedimiento" class="form-control select2" style="width: 100%;">
                                          <option value="" selected> Seleccione</option>
                                          <option value="Diagnóstico" > Diagnóstico </option>
                                          <option value="Terapeútico" > Terapeútico </option>
                                          <option value="Protección específica" > Protección específica </option>
                                          <option value="Detección temprana en enfermedad general" > Detección temprana en enfermedad general </option>
                                          <option value="Detección temprana en enfermedad profesional" > Detección temprana en enfermedad profesional </option>
                                          <option value="Promover la salud integral en los niños, niñas, adolescentes y jóvenes" > Promover la salud integral en los niños, niñas, adolescentes y jóvenes. </option>
                                          <option value="Promover la salud sexual y reproductiva" > Promover la salud sexual y reproductiva. </option>
                                          <option value="Promover la salud en la tercera edad" > Promover la salud en la tercera edad. </option>
                                          <option value="Promover la convivencia pacífica con énfasis en el ámbito intrafamiliar" > Promover la convivencia pacífica con énfasis en el ámbito intrafamiliar. </option>
                                          <option value="Desestimular la exposición al tabaco, al alcohol y a las sustancias psicoactivas" > Desestimular la exposición al tabaco, al alcohol y a las sustancias psicoactivas </option>
                                          <option value="Promover las condiciones sanitarias del ambiente intradomiciliario" > Promover las condiciones sanitarias del ambiente intradomiciliario. </option>
                                          <option value="Incrementar el conocimiento de los afiliados en los derechos y deberes" > Incrementar el conocimiento de los afiliados en los derechos y deberes. </option>
                                          <option value="Promover la Lactancia materna" > Promover la Lactancia materna. </option>
                                          <option value="Promoción de la salud enfermedades crónicas" > Promoción de la salud enfermedades crónicas. </option>
                                          <option value="Control o seguimiento de crónicas" > Control o seguimiento de crónicas. </option>
                                          <option value="Promoción de hábitos alimentarios" > Promoción de hábitos alimentarios </option>
                                          <option value="Detección de Alteraciones en la Gestante" > Detección de Alteraciones en la Gestante </option>
                                        </select>
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Personal que atiende</label>
                                        <select id="personal_atiende" name="personal_atiende" class="form-control select2" style="width: 100%;">
                                          <option value="" selected> Seleccione</option>
                                          <option value="Médico especialista" > Médico especialista </option>
                                          <option value="Médico General" > Médico General </option>
                                          <option value="Enfermera" > Enfermera </option>
                                          <option value="Auxiliar de enfermera" > Auxiliar de enfermera </option>
                                          <option value="Otro" > Otro </option>
                                        </select>
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Forma de realización del acto quirúrgico</label>
                                        <select id="realizacion_quirurgico" name="realizacion_quirurgico" class="form-control select2" style="width: 100%;">
                                          <option value="" selected> Seleccione</option>
                                          <option value="Forma de realización del acto quirúrgico" > Forma de realización del acto quirúrgico </option>
                                          <option value="Multiple o bilateral, misma vía diferente especialidad" > Multiple o bilateral, misma vía diferente especialidad </option>
                                          <option value="Múltiple o bilateral, misma vía igual especialidad" > Múltiple o bilateral, misma vía igual especialidad </option>
                                          <option value="Múltiple o bilateral, diferente vía, diferente especialidad" > Múltiple o bilateral, diferente vía, diferente especialidad </option>
                                          <option value="Múltiple o bilateral, diferente vía. Igual especialidad" > Múltiple o bilateral, diferente vía. Igual especialidad </option>
                                        </select>
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>CIE-10</label>
                                        <div class="col-md-12"> 
                                          <div class="col-md-4">
                                            <label>Código del Diagnóstico de la Complicacion</label>
                                            <br> 
                                            <input type="text"  id="clienteId5"  onChange="verlista5();" placeholder="Buscar CIE10" >
                                            <input type="hidden"  id="name5"   value="select5" >
                                          </div>
                                          <div id="div-results5"  class="col-md-8"></div><!-- resultado cie-10-->
                                        </div>

                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor del Procedimiento</label><br>
                                        <input type="number" name="valor_procedimiento" id="valor_procedimiento" class="form-control" placeholder="Valor del Procedimiento" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                    </div>
                                  </div>
                                </div>

<!--

 <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#examenFisico" href="#Facturacion">
                                        Facturacion
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Facturacion" class="panel-collapse collapse">
                                    <div class="box-body">

                                      <div class="form-group col-md-12" align="left">
                                        <label>Número del Contrato</label><br>
                                        <input type="number" name="numero_contrato" id="numero_contrato" class="form-control" placeholder="Numero del Contrato" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group">
                                        <label>Plan de Beneficios</label><br>
                                        <textarea type="text" class="form-control nota" name="plan_beneficios"  id="plan_beneficios" placeholder="Plan de Beneficios"> </textarea>
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Número de la Póliza</label><br>
                                        <input type="number" name="numero_poliza" id="numero_poliza" class="form-control" maxlength="15" placeholder="Numero de la poliza" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor total del pago compartido COPAGO</label><br>
                                        <input type="number" name="valor_total_copago" id="valor_total_copago" class="form-control"  placeholder="valor de pago compartido COPAGO" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor de la comisión</label><br>
                                        <input type="number" name="valor_comision" id="valor_comision" class="form-control"  maxlength="15" placeholder="Valor de la Comision" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor total de Descuentos</label><br>
                                        <input type="number" name="valor_total_descuento" id="valor_total_descuento" class="form-control"  placeholder="Valor total de Descuentos" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      <div class="form-group col-md-12" align="left">
                                        <label>Valor Neto a Pagar por la entidad Contratante</label><br>
                                        <input type="number" name="valor_entidad_contratante" id="valor_entidad_contratante" class="form-control" placeholder="Valor Neto Entidad Contratante" maxlength="15" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" > 
                                      </div>

                                      </div></div></div> -->








<div class="form-group col-md-12">
                                <label>Ya terminé <input type="checkbox"  value="" required="" ></label>
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

                              <input type="radio" name="P" value="1"   class="flat-red"  >
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
 var duracion= $("#duracion").val();
 var metodo= $("#metodo").val();
 var dosisdia= $("#dosisdia").val();
 var dias= $("#dias").val();
 var via= $("#via").val();
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
            data: {codigoProd:codigoProd, dosis:dosis, posologia:posologia, frecuencia:frecuencia,duracion:duracion,metodo:metodo, administracion:administracion, dosisdia:dosisdia, dias:dias, via:via, total:total, nota:nota, usuario_id:usuario_id, idcliente:idcliente,idReceta:idReceta,codigoProd1:codigoProd1,nota2:nota2,cantidad:cantidad},
            success: function(response) {

                $('#dosis').val('');
                $('#posologia').val('');
                $('#frecuencia').val('');
                $('#administracion').val('');
                $('#duracion').val('');
                $('#metodo').val('');
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

function eliminarItem1()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper1").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

      function eliminarItem3()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper3").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

       function eliminarItem4()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper4").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

        
       function eliminarItem5()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper5").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
            success: function(response) {
                $('#div-results').html(response);
        // aqui enviamos el mensaje por medio de un arreglo               
            }
        });
    };

         
        
       function eliminarItem6()
      {
// estas son las variables que enviamos
        var idOper = $("#idOper6").val();
        var usuario_id = $("#usuario_id").val();
        var idcliente = $("#idcliente").val();
         var idReceta = $("#idReceta").val();

// aqui enviamos el mensaje por medio de un arreglo     
        $.ajax({
            type: "POST",
            url: "eliminarItemRecetario.php",
            data: {idOper:idOper, usuario_id:usuario_id,idcliente:idcliente, idReceta:idReceta},
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
 


 

 function verPos(){
 
        var clientepos = $("#clientepos").val();
        var codigoProd = $("#codigoProd").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Poslista.php",
            data: {clientepos:clientepos, codigoProd:codigoProd},
            success: function(response) {
                $('#div-resultsM').html(response);
                 
            }
        });
    };












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
      var b = parseInt(document.formularioActualizarcliente.edadGestacional.value);
      document.formularioActualizarcliente.SemanasPrematuriedad.value = a - b;
    } catch (e) {
      }
  }
  function calcularEdadCorregida(){
    try {
      var a = parseInt(document.formularioActualizarcliente.edadCronologica.value);
      var b = parseInt(document.formularioActualizarcliente.semPrematuriedad.value);
      document.formularioActualizarcliente.edadCorregida.value = b - a;
    } catch (e) {
      }
  }


function verlista(){
 
        var clienteId = $("#clienteId").val();
        var name = $("#name1").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results1').html(response);
                 
            }
        });
    };

      


function verlista2(){
 
        var clienteId = $("#clienteId2").val();
        var name = $("#name2").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results2').html(response);
                 
            }
        });
    };


function verlista3(){
 
        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results3').html(response);
                 
            }
        });
    };


function verlista4(){
 
        var clienteId = $("#clienteId4").val();
        var name = $("#name4").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results4').html(response);
                 
            }
        });
    };


function verlista5(){
 
        var clienteId = $("#clienteId5").val();
        var name = $("#name5").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cie10lista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results5').html(response);
                 
            }
        });
    };


      
function verlista_Cup(){
 
        var clienteId = $("#clienteId_Cup").val();
        var name = $("#name1_Cup").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cuplista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results1_Cup').html(response);
                 
            }
        });
    };






</script>
 

