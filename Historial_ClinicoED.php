<?php
include 'header.php';
include 'menu.php';

$clienteId = decrypt($_GET['cI']);
$cliente_id_modulo = $clienteId;//Evoluciones
$usuarioId = $_SESSION['ID'];
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente

    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Historial Clinico</a></li>
    </ol> -->
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">
            <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" href="hced?cI=<?= encrypt($clienteId); ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva consulta de escalas </a>
            <br><br>
          </div>
        </div>
      </div>
    </div>
  </section>

  <br>

  <div class="box-body">
    <div class="">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">

          <?php
          $arrayHistorias = [
            ['Historias de Fototipo', 'Historia_ClinicaED_fototipo'],
            ['Historias de Dermatis', 'Historia_ClinicaED_dermatitis'],
            ['Historias de Calidad', 'Historia_ClinicaED_calidad'],
            ['Historias de Hirsutismo', 'Historia_ClinicaED_hirsutismo'],
            ['Historias de Psoriasis', 'Historia_ClinicaED_psoriasis'],
            ['Historias de Melasma', 'Historia_ClinicaED_melasma'],
            ['Historias de Cicatrices', 'Historia_ClinicaED_cicatrices'],
            ['Historias de Alopecia', 'Historia_ClinicaED_alopecia'],
            ['Historias de Net', 'Historia_ClinicaED_net'],
            ['Historias de Hidradentis', 'Historia_ClinicaED_hidradentis']
          ];

          ?>

          <div class="card">

          <!-- Nav tabs -->
          <div class="card-header">
            <ul class="nav nav-tabs" role="tablist">
              <?php foreach ($arrayHistorias as $key => $value) : ?>
                <li role="presentation" class="nav-item "><a class="nav-link" href="#<?= $value[1] ?>" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> <?= $value[0] ?></a></li>
              <?php endforeach ?>
            </ul>
          </div>
          <!-- Tab panes -->
          <div class="tab-content tabs card-body">
            <!-- inicio seccion 1 -->
            <?php foreach ($arrayHistorias as $key => $value) : ?>
              <div role="tabpanel" class="tab-pane fade in  " id="<?= $value[1] ?>">

                <!--inicio accordion-->
                <div class="col-md-12">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                    <?php
                    $tabla = $value[1];
                    $queryList = mysqli_query($conn3, "
                                SELECT * FROM  $tabla where cliente_id = '$clienteId'
                                ");
                    $nrowl = mysqli_num_rows($queryList);
                    // charset utf8 $conn3
                    //$conn3->set_charset("utf8");
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                      $resultadotexto=array();
                      //$resultadotexto="";
                      foreach ($rowMotorizado as $key => $val) {
                        $resultado[$key] = $val;

                        // si $key tiene mas de 4 didigitos de largo
                          
                          if (strlen($key) > 4) {
                            $resultadotexto[$key] = $val;
                            $contador = $contador + 1;
                          }

                      }


                    ?>
                      <div class="panel panel-default" style="background: #f1f1f1;">
                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                          <h4 class="panel-title">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?= $tabla.$resultado['id'] ?>" aria-expanded="false" aria-controls="Historia<?= $tabla.$resultado['id'] ?>">
                              Historia <?= $resultado['id'] . ' / <b style="color: #444444;">' . $resultado['fecha'] . '</b>'; ?>
                              <button onclick="window.open('hcedImprimir?iC=<?= encrypt($resultado['id']) ?>&tB=<?= base64_encode($tabla) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                            
                              <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($resultado['id']); ?>&tabla=<?php echo encrypt($tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file"></i></button>

                              <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($resultado['id']); ?>&tabla=<?php echo encrypt($tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye"></i></button>
                          
                          </a>
                          </h4>
                        </div>
                        <div id="Historia<?php echo $tabla.$resultado['id']?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                          <div class="panel-body">
                              <?php
                              
                              
                              foreach ($resultadotexto as $key => $value) {

                                if (substr($key, -6) == "nombre") {
                                    echo "<h5>$value</h5>";
                                } else {
                                    // numero de historia
                                    if (substr($key, 0, 2) == "id") {
                                        // numero de historia
                                        echo "<h6>N de historia:  " . $value . "</h6><br>";
                                    } else if (substr($key, 0, 5) == "fecha") {
                                        // fecha de registro
                                        echo "<h6>Fecha: " . $value . "</h6><br>";
                                    } else if (substr($key, 0, 10) == 'usuario_id' || substr($key, 0, 10) == 'cliente_id') {
                                        // no imprimir esto
                                    } else {
                                        // lo demas de contenido
                                        echo "<p>$value</p>";
                                    }
                                }
                              }
                              
                              
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

            <?php endforeach ?>
          </div>
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