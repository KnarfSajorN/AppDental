<?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = $_GET['clienteId'];
   $usuarioId = $_SESSION['ID'];

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
        <li><a href="#">Historial RIAS</a></li>
      </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen"/>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="card-body">
          <div class="box">
          <?php echo datosPacientes($clienteId);?>
            <div align="center">

            <?php

            ?>
            <br><br>
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historia RIAS</a></li>
                        <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Familiograma/Ecomapa</a></li>
                        <!--<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
  <!--inicio accordion-->
  <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                  <?php
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaPrimeraInfancia where cliente_id = '$clienteId'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['fecha'];



                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                            Historia Primera Infancia <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                            <button onclick="window.location.href='RIAS_Finalizado.php?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>




<?php
                
                $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaInfancia where cliente_id = '$clienteId'");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $id = $rowMotorizado['id'];
                    $cliente_id = $rowMotorizado['cliente_id'];
                    $fecha = $rowMotorizado['fecha'];



              ?>
                <div class="panel panel-default" style="background: #f1f1f1;">
                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                    <h4 class="panel-title">
                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                        Historia Infancia <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                        <button onclick="window.location.href='RIAS_Finalizado_Infancia.php?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                      </a>
                    </h4>
                  </div>
                  <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                    <div class="panel-body">

                    </div>
                  </div>
                </div>
              <?php
              }
              ?>






<?php
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaAdolescencia where cliente_id = '$clienteId'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['fecha'];



                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                            Historia Adolescencia <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                            <button onclick="window.location.href='RIAS_Finalizado_Adolescencia.php?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>






<?php
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaJuventud where cliente_id = '$clienteId'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['fecha'];



                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                            Historia Juventud <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                            <button onclick="window.location.href='RIAS_Finalizado_Juventud.php?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>






<?php
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaAdultez where cliente_id = '$clienteId'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['fecha'];



                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                            Historia Adultez <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                            <button onclick="window.location.href='RIAS_Finalizado_Adultez.php?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">

                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>





<?php
                
                    $queryList = mysqli_query($conn3, "SELECT * FROM  RIAS_HistoriaVejez where cliente_id = '$clienteId'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $id = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['fecha'];



                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                            Historia Vejez <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                            <button onclick="window.location.href='RIAS_Finalizado_Vejez.php?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body">

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







                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                          
                        <!--inicio accordion-->
                        <div class="col-md-12">
                          <div class="panel-group row" id="accordion" role="tablist" aria-multiselectable="true">
                          <?php

                          $QueryPaciente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
                          while ($RowPaciente = mysqli_fetch_array($QueryPaciente)) {

                              $Familiograma_Fami_Eco = $RowPaciente['Familiograma_Archivo'];
                              $Ecomapa_Fami_Eco = $RowPaciente['Ecomapa_Archivo'];
                          }

                          ?>
                          <div class="form-group col-md-6" style="text-align: -webkit-center;">
                            <h2 style="text-align: center">Familiograma</h2>
                            <img  class="nocargarimagenpredeterminada"   src="<?=$Familiograma_Fami_Eco;?>" >
                          </div>

                          <div class="form-group col-md-6" style="text-align: -webkit-center;">
                            <h2 style="text-align: center">Ecomapa</h2>
                            <img  class="nocargarimagenpredeterminada"   src="<?=$Ecomapa_Fami_Eco;?>" >
                          </div>


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
