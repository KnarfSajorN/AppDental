<?php
include 'header.php';
include 'menu.php';

$usuario_id = $_SESSION['ID'];

$cliente_id = $_GET['clienteId'];
$cliente_id_modulo = $cliente_id;//Evoluciones
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Audiología </a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($cliente_id); ?>
          <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="HA_HistoriaAudiologia.php?clienteId=<?= ($cliente_id); ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?= encrypt($cliente_id); ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar Exámenes </a>

            <?php
            $clienteId=$cliente_id;
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            ?>
            <br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Consultas </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  

                        <?php 

                        $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Audiologica where cliente_id = $cliente_id AND usuario_id = $usuario_id");
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                            $audiologia_id = $rowMotorizado['id'];
                            $fecha = $rowMotorizado['fecha'];
                            $cliente_id = $rowMotorizado['cliente_id'];
                            $usuario_id = $rowMotorizado['usuario_id'];
                        
                            $Antecedentes_Personales_Audiologicos = $rowMotorizado['Antecedentes_Personales_Audiologicos'];
                            $Antecedentes_Otologicos = $rowMotorizado['Antecedentes_Otologicos'];
                            $Caracteristicas_Subjetivas_Audicion = $rowMotorizado['Caracteristicas_Subjetivas_Audicion'];
                            $Antecedentes_Laborales_Audiologia = $rowMotorizado['Antecedentes_Laborales_Audiologia'];
                            $Habitos_Audiologia = $rowMotorizado['Habitos_Audiologia'];
                            $Antecedentes_Extralaborales_Audiologia = $rowMotorizado['Antecedentes_Extralaborales_Audiologia'];
                            $Antecedentes_Extralaborales_Audiologia_2 = $rowMotorizado['Antecedentes_Extralaborales_Audiologia_2'];
                        
                            $AnamnesisTinnitus = $rowMotorizado['AnamnesisTinnitus'];
                        
                            $AntecedentesPediatricos = $rowMotorizado['AntecedentesPediatricos'];
                            $AntecedentesOtologicosPediatria = $rowMotorizado['AntecedentesOtologicosPediatria'];
                            $AntecedentesOtologicosPediatria_1 = $rowMotorizado['AntecedentesOtologicosPediatria_1'];
                            $CaracteristicasSubjetivasAudicionPediatria = $rowMotorizado['CaracteristicasSubjetivasAudicionPediatria'];
                            $HabitosPediatria = $rowMotorizado['HabitosPediatria'];
                            $UsoProtesisPediatria = $rowMotorizado['UsoProtesisPediatria'];
                            $OtoscopiaPediatria = $rowMotorizado['OtoscopiaPediatria'];

                            $TablaHistoria="Historia_Clinica_Audiologica";
                        ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaAudiologia<?php echo $audiologia_id?>" aria-expanded="false" aria-controls="HistoriaAudiologia<?php echo $audiologia_id?>">
                                    Fecha <?php echo $fecha; ?>
                                    <button onclick="window.open('HA_Finalizado_HistoriaAudiologica.php?historiaClinica1=<?php echo ($audiologia_id); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Finalizado"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($audiologia_id); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" title="Agregar Evolución" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file"></i></button>

                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($audiologia_id); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" title="Ver Historial de Evolución" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye"></i></button>

                                </a>
                                </h4>
                            </div>
                            <div id="HistoriaAudiologia<?php echo $audiologia_id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                <div class="panel-body">

                                <?php
                        
                                if (strlen($Antecedentes_Personales_Audiologicos) > "0") {
                                    echo '<br> <h4><b>Datos Historia Clínica Audiología</b></h4><br><br>';
                                }
                                if (strpos($Antecedentes_Personales_Audiologicos, "style='display:none;'") == false) {
                                    echo  str_replace("class='tg'",'class="table"',$Antecedentes_Personales_Audiologicos);
                                } ?>

                                <div class="col-md-12" align="center">
                                    <?php if (strpos($Antecedentes_Otologicos, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$Antecedentes_Otologicos);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="center">
                                    <?php if (strpos($Caracteristicas_Subjetivas_Audicion, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$Caracteristicas_Subjetivas_Audicion);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="center">
                                    <?php if (strpos($Antecedentes_Laborales_Audiologia, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$Antecedentes_Laborales_Audiologia);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="center">
                                    <?php if (strpos($Habitos_Audiologia, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$Habitos_Audiologia);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="center">
                                    <?php if (strpos($Antecedentes_Extralaborales_Audiologia, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$Antecedentes_Extralaborales_Audiologia);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="center">
                                    <?php if (strpos($Antecedentes_Extralaborales_Audiologia_2, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$Antecedentes_Extralaborales_Audiologia_2);
                                            } 
                                    ?>
                                </div>





                                <div class="col-md-12" align="left">
                                    <?php if (strpos($AnamnesisTinnitus, "style='display:none;'") == false and strlen($AnamnesisTinnitus) > "105") {
                                                echo "<br> <h4><b> Anamnesis Tinnitus </b></h4><br><br>" . str_replace("class='tg'",'class="table"',$AnamnesisTinnitus);
                                            } 
                                    ?>
                                </div>





                                <div class="col-md-12" align="left">
                                    <?php
                                        if (strlen($AntecedentesPediatricos) > "0") {
                                            echo '<br> <h4><b> Historia Pediátrica </b></h4><br>';
                                        }
                                        if (strpos($AntecedentesPediatricos, "style='display:none;'") == false) {
                                                echo  str_replace("class='tg'",'class="table"',$AntecedentesPediatricos);
                                        } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="left">
                                    <?php if (strpos($AntecedentesOtologicosPediatria, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$AntecedentesOtologicosPediatria);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="left">
                                    <?php if (strpos($AntecedentesOtologicosPediatria_1, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$AntecedentesOtologicosPediatria_1);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="left">
                                    <?php if (strpos($CaracteristicasSubjetivasAudicionPediatria, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$CaracteristicasSubjetivasAudicionPediatria);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="left">
                                    <?php if (strpos($HabitosPediatria, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$HabitosPediatria);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="left">
                                    <?php if (strpos($UsoProtesisPediatria, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$UsoProtesisPediatria);
                                            } 
                                    ?>
                                </div>
                                <div class="col-md-12" align="left">
                                    <?php if (strpos($OtoscopiaPediatria, "style='display:none;'") == false) {
                                                echo str_replace("class='tg'",'class="table"',$OtoscopiaPediatria);
                                            } 
                                    ?>
                                </div>


                                <?php
                                ?>       
                                </div>
                            </div>
                        </div>
                        <?php 
                        }
                        ?>


                </div>
              </div>
              <!--final accordion-->   
            </div>
            <!-- cierre seccion 1-->









          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>
</div>


<?php
include 'footer.php';
?>



