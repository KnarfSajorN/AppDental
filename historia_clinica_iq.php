<?php
  include 'header.php';
  include 'menu.php';

  $clienteId = decrypt($_GET['cI']);
  
  $ID = $_SESSION['ID'];
  $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

  $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
  // $nrowl = mysqli_num_rows($queryList);
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
    // ----------------------------------------------------------------------------------------------------------------------------

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

  $queryconfig = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario=$ID");
  // $nrowl = mysqli_num_rows($queryconfig);
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
    <h1>Consulta médica </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Consulta médica <?php echo $cie10;?></a></li>
    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">
      <div class="col-xs-12">
        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">
            <div class="col-md-12">
              <!--
              <select name="tipoConsulta" class="form-control select2" style="width: 100%;">
                <option selected="selected" value="">Seleccione tipo de consulta</option>
                <option>Consulta externa</option>
                <option>Urgencia</option>
                <option>Ambulatorio </option>
              </select>
              -->
              <div class="box box-solid">

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
                     





  <?php echo datosPacientes($clienteId);?>


                    </div>
                  </div>
                </div>





                    <form action="hciqGuardar" method="POST" name="formularioActualizarcliente" id="FormularioHistoriaClinica">

                      <!--  *******************************  QUIRURGICO  **************************** -->

                      <div class="row">
                        <div class="col-md-12">
                          <div class="box box-solid">

                            <!-- /.box-header -->
                            <div class="box-body">
                              <div class="box-group" id="accordion">
                                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->

                                <div class="panel box box-success">
                                  <div class="box-header with-border">
                                    <h4 class="box-title">
                                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5">
                                        Procedimiento Quirúrgico:
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="collapse5" class="panel-collapse collapse">
                                    <div class="box-body row">

                                      <div class="col-md-4">
                                        <label class="control-label" for="inputSuccess">Hora de Inicio:</label>
                                        <div class="form-group has-success">
                                          <input type="time" name="hora_inicio" class="form-control" id="inputSuccess" placeholder="" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <label class="control-label" for="inputSuccess">Hora Finalización:</label>
                                        <div class="form-group has-success">
                                          <input type="time" name="hora_finaliza" class="form-control" id="inputSuccess" placeholder="" required="">
                                        </div>
                                      </div>
                                      <div class="col-md-4">
                                        <label class="control-label" for="inputSuccess">N° Sala</label>
                                        <div class="form-group has-success">
                                          <input type="number" name="n_sala" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label" for="inputSuccess">Cirujano</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="cirujano" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label" for="inputSuccess">Ayudante</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="ayudante" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label" for="inputSuccess">Anestesiólogo</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="anestesiologo" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label" for="inputSuccess">Tipo de Anestesia</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="tipo_anestesia" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label" for="inputSuccess">Instrumentador</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="instrumentista" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-6">
                                        <label class="control-label" for="inputSuccess">Circulante</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="circulante" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <hr style="color: #3c8dbc;border: 1px solid;">
                                      </div>
                                      
                                    
                            
                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Procedimiento(s) Quirúrgico(s)</label>


                                          <!--<div class="form-group col-md-12">
                                       Cups
                                       
                                         <div class="col-md-12"> 





<div class="col-md-3">
<br> 
<input type="text"  id="clienteId4"  onChange="vercups2();" placeholder="Buscar Cups" >

<input type="hidden"  id="name4"   value="select4" >

</div>
                <div id="div-results4"  class="col-md-9">
                </div>
</div>
                                        
                                      </div>-->

                                          <textarea class="form-control" rows="3" name="procedimiento_quirurgico" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>
                                      
                                      <!-- Funcionando CIE10 -->
                                    
                        <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diagnóstico Cie10</label>
                                        </div>
                                      </div>

                                      <!-- Funcionando CIE10 -->
                                      <div class="form-group col-md-12">
                                        CIE-10 (Introduzca una palabra clave para búsqueda rápido del diagnóstico)



 <div class="col-md-12"> 
<!--




<div class="col-md-3">
<br> 
<input type="text"  id="clienteId"  onChange="verlista();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name1"   value="select1" >

</div>
                <div id="div-results1"  class="col-md-9">
                </div>
-->

<select id="select1_cie10" name="select1" class="form-control" style="width: 100%;" onClick="Buscar_CIE10('select1_cie10')">
                                       <option value="" selected="selected">Seleccione</option>

</select>

</div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diagnóstico Pre-Quirúrgico</label>
                                          <textarea class="form-control" name="DiagnosticoPrequirurgico" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <!-- Funcionando CIE10 -->
                                     <div class="col-md-12"> 




<!--
<div class="col-md-3">
<br> 
<input type="text"  id="clienteId2"  onChange="verlista2();" placeholder="Buscar CIE10" >

<input type="hidden"  id="name2"   value="select2" >

</div>
                <div id="div-results2"  class="col-md-9">
                </div>-->

                <select id="select2_cie10" name="select2" class="form-control" style="width: 100%;" onClick="Buscar_CIE10('select2_cie10')">
                                       <option value="" selected="selected">Seleccione</option>

</select>

</div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Diagnóstico Post-Quirúrgico</label>
                                          <textarea class="form-control" name="DiagnosticoPostquirurgico" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Hallazgos Intraoperatorios</label>
                                          <textarea class="form-control" name="hallazgo" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Descripción Quirúrgica</label>
                                             <div class="form-group col-md-12">
                                       



                                      <!-- <div class="col-md-12"> 





<div class="col-md-3">
<br> 
<input type="text"  id="clienteId3"  onChange="vercups();" placeholder="Buscar Cups" >

<input type="hidden"  id="name3"   value="select3" >

</div>
                <div id="div-results3"  class="col-md-9">
                </div>
</div>-->
                                       <!--
                                          <select id="cups1" name="cups1[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                            <option value="" selected="selected">Seleccione</option>
                                            <?php
                                              //$usuario_id1 = $ID.'cie10';
                                              $queryList = mysqli_query($conn3, "SELECT * FROM cups order by codigo");
                                              // $nrowl = mysqli_num_rows($queryList);

                                              if ($queryList) {
                                                while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                $codigo      = $row_recordset32['codigo'];
                                                $descripcionee      = $row_recordset32['descripcion'];
                                                echo "<option value='$codigo'>$codigo - $descripcionee</option>";
                                                }
                                              }
                                              
                                              ?>
                                          </select>-->
                                        
                                          <textarea class="form-control" name="descripcion_quirurgica" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Sangrado estimado</label>
                                          <textarea class="form-control" name="sangrado" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Complicaciones</label>
                                          <textarea class="form-control" name="complicaciones" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Recuento de Material</label>
                                          <textarea class="form-control" name="recuentoMaterial" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Plan de Manejo Final</label>
                                          <textarea class="form-control" name="planManejoFinal" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-12">
                                        <div class="form-group has-#00a65a">
                                          <label>Observaciones</label>
                                          <textarea class="form-control" name="observaciones" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                      </div>

                                      <div class="col-md-4">
                                        <div class="form-group">
                                          <div class="checkbox">
                                            Patología:
                                            <label>
                                              <input type="checkbox" value="si" name="patologia" class="">
                                              Si
                                            </label>
                                            <label>
                                              <input type="checkbox" value="no" name="patologia" class="">
                                              No
                                            </label>
                                          </div>
                                        </div>
                                      </div>
                                      <div class="col-md-8">
                                        <label class="control-label" for="inputSuccess">Tejido</label>
                                        <div class="form-group has-success">
                                          <input type="text" name="tejido" class="form-control" id="inputSuccess" placeholder="">
                                        </div>
                                      </div>
                                      <div class="col-md-12">
                                        <!--
                                        <div class="form-group has-#00a65a">
                                          <label>Firma Cirujano</label>
                                          <textarea class="form-control" rows="3" placeholder="Enter ..." style="border:1px solid #00a65a"></textarea>
                                        </div>
                                        -->
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <!-- /.box-body -->
                          </div>
                          <!-- /.box -->
                        </div>
                        <hr>

                        <div class="row">

                        <div class="col-sm-12">
                          <div align="center">
                            <label> <strong> Próxima consulta o cita (Solo si aplica)</strong> </label>
                          </div>
                        </div>
                        <div class="col-sm-6">
                          <div align="left">
                            <label>Fecha </label>
                          </div>
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
                          <select id="doctor" name="doctor" class="form-control select2" style="width: 100%;" required="required">
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
                            <input type="radio" name="P" value="0" class="flat-red">
                            <i class="fa fa-user"></i> Presencial

                            <input type="radio" name="P" value="1" class="flat-red">
                            <i class="fa fa-video-camera"></i> Virtual
                          </label>
                        </div>

                        </div>



                        <input type="hidden" name="email" value="<?php echo $correo_cliente; ?>">
                        <input type="hidden" name="nombre" value="<?php echo $nombre_cliente; ?>">
                        <input type="hidden" name="telefono" value="<?php echo $telefono_cliente; ?>">


                        <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">

                        <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">

                        <input type="hidden" name="NOMBRE_USUARIO" value="<?php echo $_SESSION['NOMBRE_USUARIO'] ?>">



                        <div align="center">
                          <br>
                          <br>
                          <br>
                          <div class="col-sm-12">
                            <br>
                            <br>
                            <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                <h2> <strong> G u a r d a r </strong> </h2>
                              </button></center>

                          </div>
                        </div>

                        <input type="hidden" name="tipo_cliente" valur="1">
                      </div>

                    </form>

                  </div>
                </div>
                <!-- /.box-body -->
              </div>
              <!-- /.box -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
  </section>
  <!-- /.content -->
</div>





<?php include("footer.php") ?>


<script type="text/javascript">

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

 function vercups(){
 
        var clienteId = $("#clienteId3").val();
        var name = $("#name3").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cupslista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results3').html(response);
                 
            }
        });
    };
     function vercups2(){
 
        var clienteId = $("#clienteId4").val();
        var name = $("#name4").val();
      
   

// aqui enviamos el mensaje por medio de un arreglo     

        $.ajax({
            type: "POST",
            url: "cupslista.php",
            data: {clienteId:clienteId, name:name},
            success: function(response) {
                $('#div-results4').html(response);
                 
            }
        });
    };

</script>

<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php   
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = decrypt($_GET['cI']);
$Nombre_Tabla_autoguardado = "historiaClinica_Quirurgica";//nombre de la tabla de la base de datos de la historia

$RutaFinal_Encryptado = $_SERVER['SCRIPT_URI']."?cl={$cliente_id_autoguardado}";

$MasSelectsCie10 = ',"select2_cie10","select1_cie10"'; //Este solo funciona en HistoriaEncryptada/AutoGuardado_Historia_Encryptado.php, manejar la misma estructura separados por , y encerrado en comillas dobles para evitar problemas
$funcionesaplicarcie10 = 'Buscar_CIE10_IQ';
include 'AutoGuardados/HistoriaEncryptadaIQ/AutoGuardado_HistoriaIQ_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado
?>

<script>
    function Buscar_CIE10(id) {
        $("#"+id).select2({
            allowClear: true,
            ajax: {
                url: "Ajax_cie10.php",
                type: "post",
                dataType: 'json',
                delay: 250,
                data: function(params) {
                    return {
                        searchTerm: params.term, // search term
                        Tipo: "CIE10"
                    };
                },
                processResults: function(response) {
                    return {
                        results: response
                    };
                },
                cache: true
            }
        });
    };

    $(document).ready(function() {
        Buscar_CIE10('select2_cie10');
        Buscar_CIE10('select1_cie10');
    });
</script>