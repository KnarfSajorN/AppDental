<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
//$clienteId = decrypt($_GET['cI']);
$usuarioId = $_GET['usuarioId'];
$ID = $_SESSION['ID'];


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) {
  $nombre_cliente = $row_recordset32['nombre_cliente'];
  $fechaNacimiento = $row_recordset32['fechaNacimiento'];

  $acompananteFamiliar = $row_recordset32['acompananteFamiliar'];
  $telefono_acompanante = $row_recordset32['telefono_acompanante'];
  $parentesco_acompanante = $row_recordset32['parentesco_acompanante'];
}

?>

<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>

<!-- Script -->
<script src="js/jquery.min-3.2.1.js"></script>
<script src='js/select2.min-4.0.3.js'></script>

<link rel="stylesheet" href="apiVoz.css">

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>Historia Audiología, Paciente: <?php echo $nombre_cliente . ', Edad: ' . CalculoEdadPaciente($fechaNacimiento); ?> </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#"> Historia Audiología </a></li>
    </ol>
  </section>

  <section class="content">
    <div class="">
      <div class="col-md-12">

        <div class="box">
          <!-- /.box-header -->
          <div class="box-body">

            <div class="col-md-12">


              <div class="box-solid">
                <!-- /.box-header -->

                <form action="HA_Guardar_HistoriaAudiologia.php" method="POST" id="FormularioHistoriaClinica">
                  <div class="box-body">

                    <!-- cambiar el estilo del menu desplegable id=accordion , class=panel panel-default, class=panel-heading class=panel-title-->
                    <div class="box-group" id="accordion1">
                      <!-- lista -->
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
                      <!--cierre de lista-->




                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseDos">
                                Historia Clínica Audiológica
                            </a>
                          </h4>
                        </div>
                        <div id="CollapseDos" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="col-md-12">
                              
                                <?php
                                
                                $Modulos_Dinamicos = ["Antecedentes Personales Audiologicos"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Antecedentes Otologicos"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Caracteristicas Subjetivas Audicion"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Antecedentes Laborales Audiologia"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////
                                
                                $Modulos_Dinamicos = ["Habitos Audiologia"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Antecedentes Extralaborales Audiologia"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Antecedentes Extralaborales Audiologia 2"];
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////


                                ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--cierre de lista-->

                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseTres">
                            Historia de Tinnitus
                            </a>
                          </h4>
                        </div>
                        <div id="CollapseTres" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="col-md-12">
                              
                                <?php

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Funciones", "Anamnesis Tinnitus"];
                                echo "<h4><center><strong> Anamnesis Tinnitus </strong></center></h4><br>";
                                include "Modulos_Historias/HistoriaAudiologia.php";

                                //////////////////////////////////////////////////////////////////


                                ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--cierre de lista-->

                      <!-- lista -->
                      <div class="panel box box-primary">
                        <div class="box-header with-border">
                          <h4 class="box-title">
                            <a data-toggle="collapse" data-parent="#accordion1" href="#CollapseCuatro">
                                Historia Pediatríca
                            </a>
                          </h4>
                        </div>
                        <div id="CollapseCuatro" class="panel-collapse collapse">
                          <div class="box-body">
                            <div class="col-md-12">
                              
                                <?php

                                //////////////////////////////////////////////////////////////////

                                $Modulos_Dinamicos = ["Historia Pediatria"];
                                //echo "<center><strong><b> Historia Pediatrica </b></strong></center> <br>";
                                include "Modulos_Historias/HistoriaAudiologiaPediatrica.php";

                                //////////////////////////////////////////////////////////////////


                                ?>
                            </div>
                          </div>
                        </div>
                      </div>
                      <!--cierre de lista-->



                      <input type="hidden" name="receta" value="<?php echo $idR ?>">
                      <input type="hidden" name="ID" value="<?php echo $_SESSION['ID'] ?>">
                      <input type="hidden" name="clienteId" value="<?php echo $clienteId ?>">
                      <input type="hidden" name="sucursal" value="<?php echo $_SESSION["sucursal"] ?>">
                      <div class="form-group col-md-12">
                        <label>Ya terminé <input type="checkbox" value="" required=""></label>
                        <center><button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" onclick="verificarformulario()">
                            <h2> <strong> G u a r d a r </strong> </h2>
                          </button></center>
                      </div>
                    </div>
                  </div>

                </form>
                <!--cierre vbox body-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>



<?php
include("footer.php");
?>


<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script src="plugins/LottieK/lottie.min.js"></script>
<script>
  // no quitar para evitar problemas de que guarde con este caracter ""
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>
<?php
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = "Historia_Clinica_Audiologica";
include 'AutoGuardado_Historia.php';
?>