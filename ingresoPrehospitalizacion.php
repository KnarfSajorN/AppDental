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

  <style>
      textarea {
          height: 1px;
        }
  </style>

  <!-- Main content -->
  <section class="content">
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


                <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion1" href="#collapseTwo">
                        Ingreso a prehospitalizacion 
                      </a>
                    </h4>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse">
                    <div class="box-body">
                      <form action="guardarPrehospitalizacion.php" method="POST">
                        
                      <div class="row">
                        <div class="col-sm-6">
                        <h5>Hora de Ingreso</h5>
                        <input type="time" name="horaRegistro" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <h6>¿Desea enviar al paciente a hospitalizacion al finalizar la consulta?</h6>
                            <select class="form-control select2" style="width:100%" onchange="validarHospitalizacion(this.value)" required>
                              <option value="">Seleccione</option>
                              <option value="Si">Si</option>
                              <option value="No">No</option>
                            </select>
                        </div>
                      </div>
                      

                      <div class="col-sm-12">
                        <h6>Motivo</h6>
                        <textarea class="form-control" name="motivoPrehospitalizacion"></textarea>
                      </div>

                          <h6>Antecedentes médicos relevantes</h6>
                          <textarea class="form-control" name="antecedentesRelevantes" style="height:150px"></textarea>

                          <h6>Medicamentos actuales</h6>
                          <textarea class="form-control" name="medicamentosActuales" style="height:150px"></textarea>

                          <h6>Historial de procedimientos médicos o cirugías previas</h6>
                          <textarea class="form-control" name="procedimientosPrevios" style="height:150px"></textarea>

                          <h6>Resultados de exámenes médicos recientes</h6>
                          <textarea class="form-control" name="examenesRecientes" style="height:150px"></textarea>
                          
                          <h6>Atenciones Brindadas</h6>                                  	
                          <textarea class="form-control" name="otrasAtenciones" style="height:150px"></textarea>

                          <input type="hidden" id="validarPostHosp" name="validarPostHosp">
                          <input type="hidden" id="usuario_id" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                          <input type="hidden" id="cliente_id" name="cliente_id" value="<?php echo $clienteId ?>">


                    </div>
                  </div>
                  <div class="col-sm-12">
                                <br>
                                <br>
                                <label>Ya terminé<input type="checkbox" class="form-control" style="width:15px" required></label>
                                <center> <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                    <h2> <strong> G u a r d a r </strong> </h2>
                                  </button></center>
                              </div>


                      </form>  
                </div>

                        <hr>

                        <div class="row">

                      

                        </div>






                        

                  </div>
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

<script type="text/javascript">
    function validarHospitalizacion(rta) {
      if (rta == "Si") {
        Swal.fire({
          title: '¿Estás seguro de enviar a este paciente a hospitalizacion al finalizar?',
          icon: 'question',
          showCancelButton: true,
          confirmButtonText: 'Sí',
          cancelButtonText: 'No',
        }).then((result) => {
          if (result.isConfirmed) {
            // El usuario hizo clic en "Sí", realiza la acción correspondiente.
            Swal.fire('Confirmado', 'Al finalizar esta consulta será redirigido al panel de hospitalizacion', 'success');
            document.getElementById('validarPostHosp').value = "Si";
          } else if (result.dismiss === Swal.DismissReason.cancel) {
            // El usuario hizo clic en "No" o cerró el modal.
            Swal.fire('Cancelado', 'Al finalizar será enviado al modulo de nimpresion', 'info');
            document.getElementById('validarPostHosp').value = "No";
          }
        });
      }else{
        document.getElementById('validarPostHosp').value = "No";
      }
    }
  </script>