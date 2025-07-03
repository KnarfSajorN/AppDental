<?php
    include 'header.php';
    include 'menu.php';

    $clienteId = $_GET['clienteId'];
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
 <form action="guardarHistoriaClinica_PsicoSocial.php" method="POST" name="formularioActualizarcliente">
            <div class="col-md-12">
              <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
                <option selected="selected" value="">Seleccione tipo de consulta</option>
                <option>Consulta externa</option>
                <option>Urgencia</option>
                <option>Ambulatorio </option>
                <option>Traslado de paciente</option>
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
                   

                      <div class="panel box box-danger">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#Entrevista">
                             ESCALA DE RIESGO BIO-PSICO-SOCIAL
                            </a>
                          </h4>
                        </div>
                        <div id="Entrevista" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="form-group col-md-12">  I. HISTORIA REPRODUCTIVA </div>

                            <div class="form-group col-md-12"> 
                             <label> Edad </label>
                            <select id="edad" name="edad" class="form-control select2" style="width: 100%;" onChange="resultado();">
                              <option value="" selected> Seleccione</option>
                              <option value="3 // Menor de 14 años " > Menor de 14 años </option>
                              <option value="1 // Entre 14 y 18 años" > Entre 14 y 18 años </option>
                              <option value="3 // Mayor de 35 años" > Mayor de 35 años </option>

                            </select>
                          </div>

                          <div class="form-group col-md-12"> 
                             <label> Paridad </label>
                            <select id="paridad" name="paridad[]" class="form-control select2" style="width: 100%;" multiple="multiple" onChange="resultado();">
                              <!--<option value="" selected> Seleccione</option>-->
                              <option value="3 // Ninguna gestación previa " > Ninguna gestación previa </option>
                              <option value="0 // Entre 1 y 4 partos previos" > Entre 1 y 4 partos previos</option>
                              <option value="2 // 5 o más partos previos" > 5 o más partos previos </option>
                              <option value="3 // Abortos espontáneos (2 o más)" > Abortos espontáneos (2 o más) </option>
                              <option value="3 // Historia de infertilidad / tto" > Historia de infertilidad / tto </option>
                              <option value="3 // Hemorragia postparto" > Hemorragia postparto </option>
                              <option value="3 // Recién nacido con peso > 4 kg" > Recién nacido con peso > 4 kg </option>
                              <option value="2 // Recién nacido con peso < 2,5 kg" > Recién nacido con peso < 2,5 kg </option>
                              <option value="2 // Preeclampsia" > Preeclampsia </option>
                              <option value="3 // Hipertensión arterial" > Hipertensión arterial </option>
                              <option value="1 // Cesárea previa" > Cesárea previa </option>
                              <option value="3 // Cesáreas previas (2 o más)" > Cesáreas previas (2 o más) </option>
                              <option value="3 // Placenta previa" > Placenta previa </option>
                              <option value="2 // Abruptio placentario" > Abruptio placentario </option>
                              <option value="3 // Malformación fetal" > Malformación fetal </option>
                              <option value="2 // Parto pretérmino" > Parto pretérmino </option>
                              <option value="3 // Partos pretérmino (2 o más)" > Partos pretérmino (2 o más) </option>

                            </select>
                          </div>

                          <div class="form-group col-md-12">  II. ANTECEDENTES PERSONALES </div>

                          <div class="form-group col-md-12"> 
                             <label> Antecedentes </label>
                            <select id="antecedentes" name="antecedentes[]" class="form-control select2" style="width: 100%;" multiple="multiple" onChange="resultado();">

                              <!--<option value="" selected> Seleccione</option>-->
                              <option value="1 // Tabaquismo" > Tabaquismo </option>
                              <option value="1 // Alcoholismo" > Alcoholismo </option>
                              <option value="2 // Cirugía ginecológica previa" > Cirugía ginecológica previa </option>
                              <option value="3 // Enfermedad renal" > Enfermedad renal </option>
                              <option value="3 // Diabetes" > Diabetes </option>
                              <option value="3 // Enfermedad cardíaca" > Enfermedad cardíaca </option>
                              <option value="3 // VIH -SIDA" > VIH -SIDA </option>
                              <option value="3 // Epilepsia" > Epilepsia </option>

                            </select>
                          </div>

                          <div class="form-group col-md-12">  III. EMBARAZO ACTUAL </div>

                          <div class="form-group col-md-12"> 
                             <label> Embarazo Actual </label>
                            <select id="embarazo" name="embarazo[]" class="form-control select2" style="width: 100%;" multiple="multiple" onChange="resultado();">

                              <!--<option value="" selected> Seleccione</option>-->
                              <option value="1 // Hemorragia: Edad gestacional < 20 sem" > Hemorragia: Edad gestacional < 20 sem </option>
                              <option value="3 // Hemorragia: Edad gestacional > 20 sem" > Hemorragia: Edad gestacional > 20 sem </option>
                              <option value="1 // Anemia (Hb < 10 mg/dL" > Anemia (Hb < 10 mg/dL </option>
                              <option value="3 // Post-madurez" > Post-madurez</option>
                              <option value="3 // Hipertensión / Preeclampsia" > Hipertensión / Preeclampsia</option>
                              <option value="3 // Ruptura prematura de membranas" > Ruptura prematura de membranas </option>
                              <option value="3 // Polihidramnios" > Polihidramnios </option>
                              <option value="3 // Restricción crecimiento intrauterino" > Restricción crecimiento intrauterino </option>
                              <option value="3 // Embarazo gemelar / múltiple" > Embarazo gemelar / múltiple </option>
                              <option value="2 // Mala presentación" > Mala presentación </option>
                              <option value="3 // Isoinmunización Rh" > Isoinmunización Rh </option>
                              <option value="3 // Infección urinaria recurrente" > Infección urinaria recurrente </option>
                              <option value="2 // Obesidad IMC > 29" > Obesidad IMC > 29 </option>


                            </select>
                          </div>

                          <input type="hidden"  id="nombre_riesgoobstetrico"   value="total_riesgo" >
                          <div id="resultado_obstetrico"  class="col-md-12"></div>

                          <div class="form-group col-md-12">  IV. RIESGO PSICOSOCIAL </div>

                          

                          <div class="form-group col-md-9">

                            <div class="form-group col-md-12">  Tensión emocional:  </div>

                            <div class="form-group col-md-6">
                              Llanto fácil
                              <input value="Si"  type="radio" name="tension1" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension1" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Tensión muscular
                              <input value="Si"  type="radio" name="tension2" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension2" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Imposibilidad para estar quieta
                              <input value="Si"  type="radio" name="tension3" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension3" id="lt" checked onChange="resultado_2();"> NO
                            </div>

                            <div class="form-group col-md-6">
                              Sobresalto
                              <input value="Si"  type="radio" name="tension4" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension4" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Temblor
                              <input value="Si"  type="radio" name="tension5" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension5" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Incapacidad de relajarse
                              <input value="Si"  type="radio" name="tension6" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension6" id="lt" checked onChange="resultado_2();"> NO
                            </div>


                            <div class="form-group col-md-12">  Humor depresivo:  </div>
                            
                            <div class="form-group col-md-6">
                              Insomnio
                              <input value="Si"  type="radio" name="tension7" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension7" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Falta de interés
                              <input value="Si"  type="radio" name="tension8" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension8" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              No disfruta pasatiempos
                              <input value="Si"  type="radio" name="tension9" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension9" id="lt" checked onChange="resultado_2();"> NO
                            </div>

                            <div class="form-group col-md-6">
                              Depresión
                              <input value="Si"  type="radio" name="tension10" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension10" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Variaciones de humor
                              <input value="Si"  type="radio" name="tension11" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension11" id="lt" checked onChange="resultado_2();"> NO

                            </div>


                            <div class="form-group col-md-12">  Síntomas neurovegetativos: </div>
                            
                            <div class="form-group col-md-6">
                              Transpiración excesiva
                              <input value="Si"  type="radio" name="tension12" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension12" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Accesos de rubor / palidez
                              <input value="Si"  type="radio" name="tension13" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension13" id="lt" checked onChange="resultado_2();"> NO

                            </div>

                            <div class="form-group col-md-6">
                              Boca seca
                              <input value="Si"  type="radio" name="tension14" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension14" id="lt" checked onChange="resultado_2();"> NO
                              <br>
                              Cefalea tensional
                              <input value="Si"  type="radio" name="tension15" id="lt" onChange="resultado_2();"> SI
                              <input value="No" type="radio" name="tension15" id="lt" checked onChange="resultado_2();"> NO

                            </div>


                            <input type="hidden"  id="nombre_riesgoobstetrico_2"   value="total_riesgo_2" >
                            <div id="resultado_obstetrico_2"  class="col-md-12"></div>


                          </div>

                          <div class="form-group col-md-3">
                            Está presente si se identifican el menos dos factores (presentes todos los días con intensidad severa)
                          </div>

                          <div class="form-group col-md-4 ">
                            <label> Soporte Familiar</label>
                            Está satisfecha con el apoyo y la ayuda que recibe de su familia y/o pareja?
                          </div>

                          <div class="form-group col-md-6">
                            Tiempo
                              <label class="radio-inline"> <input value="Casi Siempre"  type="radio" name="tiempo_riesgo" id="lt_3" onChange="resultado_3();">Casi Siempre</label>
                              <label class="radio-inline"> <input value="A Veces"  type="radio" name="tiempo_riesgo" id="lt_3" onChange="resultado_3();" checked>A Veces</label>
                              <label class="radio-inline"> <input value="Nunca" type="radio" name="tiempo_riesgo" id="lt_3"  onChange="resultado_3();">Nunca</label>
                              <br>
                            Espacio
                              <label class="radio-inline"> <input value="Casi Siempre"  type="radio" name="espacio_riesgo" id="lt_3" onChange="resultado_3();">Casi Siempre</label>
                              <label class="radio-inline"> <input value="A Veces"  type="radio" name="espacio_riesgo" id="lt_3" onChange="resultado_3();" checked>A Veces</label>
                              <label class="radio-inline"> <input value="Nunca" type="radio" name="espacio_riesgo" id="lt_3"  onChange="resultado_3();">Nunca</label>
                              <br>
                            Dinero
                              <label class="radio-inline"> <input value="Casi Siempre"  type="radio" name="dinero_riesgo" id="lt_3" onChange="resultado_3();">Casi Siempre</label>
                              <label class="radio-inline"> <input value="A Veces"  type="radio" name="dinero_riesgo" id="lt_3" onChange="resultado_3();" checked>A Veces</label>
                              <label class="radio-inline"> <input value="Nunca" type="radio" name="dinero_riesgo" id="lt_3"  onChange="resultado_3();">Nunca</label>
                              <br>

                            
                          </div>

                          <div class="form-group col-md-2 ">
                            <label> Para asignar 1 punto debe expresar que nunca está satisfecha en dos o tres de los indicadores</label>
                            
                          </div>
                          <div class="form-group col-md-12">
                          <input type="hidden"  id="nombre_riesgoobstetrico_3"   value="total_riesgo_3" >
                            <div id="resultado_obstetrico_3"  class="col-md-12"></div>
                          </div>

                          
                          <br>
                          <hr style="border: 1px solid blue;">
                          <br>
                          <div class="form-group col-md-12">
                          <input type="hidden"  id="nombre_riesgoobstetrico_4"   value="total_historia" >
                            <div id="resultado_obstetrico_4"  class="col-md-12"></div>
                          </div>

                          </div>
                        </div>
                      </div>
                    </div>
                  </div>











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

  </section>


<?php include("footer.php")?>
<script src="apiVoz.js"></script>

<script type="text/javascript">
resultado();
resultado_2();
resultado_3();
resultado_total();
 
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



function resultado(){
 
        var select_1 = $("#edad").val();
        var select_2 = $("#paridad").val();
        var select_3 = $("#antecedentes").val();
        var select_4 = $("#embarazo").val();
        var name = $("#nombre_riesgoobstetrico").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Ajax_RiesgoPsicoSocial.php",
            data: {select_1:select_1,select_2:select_2,select_3:select_3,select_4:select_4,name:name},
            success: function(response) {
                $('#resultado_obstetrico').html(response);
                
                 
            }
        });
    };

function resultado_2(){
        var valor=0;
        var languages = document.querySelectorAll('#lt');
        for (var lang of languages) {
          if(lang.checked && lang.value=="Si")
          {
            valor += 1;
          }
          
        }

        var name = $("#nombre_riesgoobstetrico_2").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Ajax_RiesgoPsicoSocial_2.php",
            data: {valor:valor,name:name},
            success: function(response) {
                $('#resultado_obstetrico_2').html(response);
                resultado_total();
                 
            }
        });
    };

function resultado_3(){
        var valor=0;
        var languages = document.querySelectorAll('#lt_3');
        for (var lang of languages) {
          if(lang.checked && lang.value=="Nunca")
          {
            valor += 1;
          }
          
        }

        var name = $("#nombre_riesgoobstetrico_3").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Ajax_RiesgoPsicoSocial_3.php",
            data: {valor:valor,name:name},
            success: function(response) {
                $('#resultado_obstetrico_3').html(response);
                resultado_total();
                 
            }
        });
    };

function resultado_total(){
        var valor=0;
        var languages = document.querySelectorAll('#totalidad');
        for (var lang of languages) 
        {
            valor += parseInt(lang.value);
        }


        var name = $("#nombre_riesgoobstetrico_4").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "Ajax_RiesgoPsicoSocial_4.php",
            data: {valor:valor,name:name},
            success: function(response) {
                $('#resultado_obstetrico_4').html(response);
                 
            }
        });
    };




</script>
 

