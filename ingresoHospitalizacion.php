<?php
  include 'header.php';
  include 'menu.php';

  $clienteId = decrypt($_GET['cI']);
  
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
  $nrowl = mysqli_num_rows($queryconfig);
  while ($rowconfig = mysqli_fetch_array($queryconfig)) {
    $cie10 = $rowconfig['cie10'];
  
    $pro1  = $rowconfig['pro1'];
    $pro2  = $rowconfig['pro2'];
  }


  //VALIDAR SI EL PACIENTE TIENE HOSPITALIZACION ACTIVA 
  $queryHospitalizacionActiva = mysqli_query($conn3, "SELECT * FROM hoIngresoHospitalizacion where cliente_id=$clienteId and hospitalizacionActiva=1");
  $cuantas = mysqli_num_rows($queryHospitalizacionActiva);



?>

<script>
  var validarHospitalizacion = "<?php echo $cuantas ?>";
  if(validarHospitalizacion > 0){

      setTimeout(() => {
        Swal.fire({
          title: '¡Atención!',
          text: 'Este paciente ya tiene una hospitalización activa, cierre la hospitalización anterior e intente nuevamente',
          icon: 'info',
          showConfirmButton: false,
          allowOutsideClick: false
        });
      }, 2000);
  }
</script>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Ingreso a hospitalizacion</h1>
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
              <div class="">

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
                    <form action="guardarHospitalizacion.php" method="POST" name="">
                      <div class="row">
                        <div class="col-md-12">

                        <!-- =================== CAMPOS HOSPITALIZACION ========================================== -->
                        <label> Fecha y hora de ingreso</label>
                                    <div style="display:flex; flex-direction:row; justify-content:space-between">
                                      <input type="date" name="fechaIngreso" style="width:49%" class="form-control">
                                      <input type="time" name="horaIngreso" style="width:49%" class="form-control">
                                    </div>
                                  	
                                  	<label>Motivo por el cual se ingresa a hospitalizacion</label>
                                  	<textarea class="form-control" name="motivoHospitalizacion"></textarea>

                                    <label>Diagnostico</label>
                                    <textarea class="form-control" name="diagnosticoHospitalizacion"></textarea>

                                    <label>Diagnostico CIE-10</label>
                                    <select name="diagnosticoCIE_10" id="diagnosticoCIE-10" class="form-control select2" style="width:100%">
                                      <?php $queryCIE10 = mysqli_query($conn3, "SELECT * FROM cie10_New");
                                      foreach ($queryCIE10 as $tablaCIE10) {
                                         echo "<option>". $tablaCIE10['codigo']." - " . $tablaCIE10['descripcion']."</option>";
                                       } ?>
                                    </select>

                                    <label>Tratamiento</label>
                                    <textarea class="form-control" name="tratamiento"></textarea>

                                    <label>Procedimientos</label>
                                    <textarea class="form-control" name="procedimientos"></textarea>




                                    <label>Habitacion a asignar</label>
                                    <!--<a data-toggle="modal" data-target="#myModal" title="Ver habitaciones disponibles"><i class="fa-solid fa-check"></i></a>-->

                                    <table class="table">
                                      <thead>
                                        <tr>
                                          <th scope="col" style="width:33%">Piso</th>
                                          <th scope="col" style="width:33%">Habitacion</th>
                                          <th scope="col" style="width:33%">Camilla</th>
                                        </tr>
                                      </thead>
                                      <tbody>
                                        <tr>
                                          <td>
                                            <select name="pisoSelect" id="pisoSelect" class="form-control select2" style="width:100%" required>
                                              <option value="">Seleccione</option>
                                              <?php $queryPisos = mysqli_query($conn3, "SELECT * FROM ho_piso");
                                                    foreach ($queryPisos as $tablaPiso) {
                                                      echo "<option value=". $tablaPiso["id"] .">".$tablaPiso["despcripcion"]."</option>";
                                                    }

                                             ?>
                                            </select>
                                            
                                          </td>
                                          <td>
                                            <select name="habitacionSelect" id="habitacionSelect" class="form-control select2" onchange="traerCamillas(this.value)" required style="width:100%"></select>
                                          </td>
                                          <td>
                                            <select name="camillaSelect" style="width:100%" id="camillaSelect" class="form-control select2" onchange="validarCamilla(this.value)" required></select>
                                          </td>
                                        </tr>
                                      </tbody>
                                    </table>
                                    <input type="hidden" name="usuarioId" value="<?php echo $_SESSION['ID']; ?>">
                                  <input type="hidden" name="cliente_id" value="<?php echo $clienteId; ?>">


                                    <script type="text/javascript">
                                      function traerHabitaciones(pisoSeleccionado) {
                                        $.ajax({
                                            type: "POST",
                                            url: "Ajax_Habitaciones_Hospitalizacion.php",
                                            data: {
                                              pisoSeleccionado:pisoSeleccionado, 
                                              tipo:"mostrarHabitaciones"
                                            },
                                            success: function(response) {
                                              $('#habitacionSelect').html(response);
                                              //alert(response)
                                                 
                                            }
                                        });
                                      }


                                      function traerCamillas(habitacionSeleccionada) {
                                        $.ajax({
                                            type: "POST",
                                            url: "Ajax_Habitaciones_Hospitalizacion.php",
                                            data: {
                                              habitacionSeleccionada:habitacionSeleccionada, 
                                              tipo:"mostrarCamillas"
                                            },
                                            success: function(response) {
                                                $('#camillaSelect').html(response);
                                                //alert(response)
                                                 
                                            }
                                        });
                                      }



                                    </script>

                         <!-- =================== CAMPOS HOSPITALIZACION ========================================== -->
                        <hr>

                        <div class="row">

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
//include 'AutoGuardados/HistoriaEncryptadaIQ/AutoGuardado_HistoriaIQ_Encryptado.php';//usar esta si es historia encryptada sin modificar el autoguardado
?>


<script type="text/javascript">
  function verAjaxPisos(pisoSelect) {
      $.ajax({
          type: "POST",
          url: "ajaxPisoDeivyd.php",
          data: {pisoSelect:pisoSelect},
          success: function(response) {
              $('#cargarPisos').html(response);
               
          }
      });
    }
</script>




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