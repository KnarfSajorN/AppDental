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
        <li><a href="#">Ecomapa</a></li>
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
              <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="EC_Ecomapa?clienteId=<?= ($clienteId); ?>" role="button"><i class="fas fa-file-medical"></i> Agregar Ecomapa </a>
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias Ecomapa</a></li>
                        <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Ecomapa Actual</a></li>
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
                                
                                    $QueryFamiliograma = mysqli_query($conn3, "SELECT * FROM  Historia_Ecomapa where cliente_id = '$clienteId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($RowFamiliograma = mysqli_fetch_array($QueryFamiliograma)) {
                                        $id = $RowFamiliograma['id'];
                                        $cliente_id = $RowFamiliograma['cliente_id'];
                                        $fecha = $RowFamiliograma['fecha'];

                                        $Ecomapa_Archivo = $RowFamiliograma['Ecomapa_Archivo'];

                                ?>
                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                    <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                                            Ecomapa <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                                            <button onclick="window.location.href='EC_Finalizado?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                        </a>
                                        </h4>
                                    </div>
                                    <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                        <div class="panel-body">

                                            <?php
                                                    
                                                    
                                                if(!empty($Ecomapa_Archivo)){
                                                    echo "<div class='form-group col-md-12' align='center' ><br><br><img src='$Ecomapa_Archivo' width='500px'></div>";
                            
                                                    
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







                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                          
                        <!--inicio accordion-->
                        <div class="col-md-12">
                          <div class="panel-group row" id="accordion" role="tablist" aria-multiselectable="true">
                          <?php

                          $QueryPaciente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $clienteId");
                          while ($RowPaciente = mysqli_fetch_array($QueryPaciente)) {

                              $Ecomapa_Fami_Eco = $RowPaciente['Ecomapa_Archivo'];
                              
                          }

                          ?>
                          <div class="form-group col-md-12" style="text-align: -webkit-center;">
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
