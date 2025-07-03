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
        Historial del Paciente
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Historial Fisioterapia Gráfica</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="HFT1_Historia_Fisioterapia?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="anexosPaciente?cI=<?php echo encrypt($clienteId);?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar Exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php';
            
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Fisioterapia Gráfica</a></li>
                        <li role="presentation" ><a href="#Section4" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Recetas de Fisioterapia Gráfica</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                    
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Clinica_Fisioterapia_1 where cliente_id = $clienteId AND usuario_id = '$usuarioId' order by id DESC ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($rowMotorizado=mysqli_fetch_array($queryList))
                                    {
                                    $id = $rowMotorizado['id'];

                                    $cliente_id      =$rowMotorizado['cliente_id'];
                                    $usuario_id      =$rowMotorizado['usuario_id'];
                                    $Fecha           =$rowMotorizado['Fecha'];

                                    $imagen = $rowMotorizado['imagen'];
                                    $nota = $rowMotorizado['nota'];
                                    $servicioContent = $rowMotorizado['servicioContent'];
                                    $indicacionesclinicas = $rowMotorizado['indicacionesclinicas'];
                                    $comentariosgeneral = $rowMotorizado['comentariosgeneral'];


                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaFisioterapia1<?php echo $id?>" aria-expanded="false" aria-controls="HistoriaFisioterapia1<?php echo $id?>">
                                        Fecha <?php echo $Fecha .'  ';?>

                                        <button onclick="window.location.href='HFT1_Finalizado_Historia_Fisioterapia?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="HistoriaFisioterapia1<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                    <hr style="border-top: 1px solid black;opacity: 1;">
                        
                                        <?php if (strlen($imagen) > 1) : ?>
                                            <div>
                                                <?php echo "<div class='col-md-12' align='center'>
                                                                                <img src='ImagenesFisioterapia/$imagen' height='100' width='200'>
                                                                                
                                                                                
                                                                                
                                                                                </div>"; ?>    
                                            </div>
                                        <?php endif ?>
                                        <?php if (strlen($nota) > 0) : ?>
                                            <div>
                    
                                                <label> <b>Nota Imagen:</b> <br> <?php echo $nota ?></label>
                    
                                            </div>
                                        <?php endif ?>

                                        <?php if (strlen($servicioContent) > 0) : ?>
                                            <div>
                                                <table class="table">
                                                    <thead>
                                                                                <tr>
                                                                                    <th>Extremidades</th>
                                                                                    <th>Profundidad Masaje</th>
                                                                                    <th>Nivel Dolor Masaje</th>
                                                                                    <th>Intensidad Percutor</th>
                                                                                    <th>Nivel Dolor Percutor</th>
                                                                                    <th>Herramientas</th>
                                                                                    <th>Comentarios</th>


                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                <?php
                                                $partes = explode("&nbsp;|&nbsp;", $servicioContent);
                                                foreach ($partes as $key => $value) {
                                                    $partes1 = explode("|", $value);
                                                    echo "<tr>";
                                                    foreach ($partes1 as $key1 => $value1) {
                                                        echo "<td>$value1</td>";
                                                    }
                                                    echo "</tr>";
                                                }
                                                ?>
                                                </tbody>
                                            </table>
                                            </div>
                                        <?php endif ?>

                                        <?php if (strlen($comentariosgeneral) > 0) : ?>
                                            <div>
                                                <label><b>Comentarios</b></label><br>
                                                <label><?php echo $comentariosgeneral ?></label>
                    
                                            </div>
                                        <?php endif ?>

                                        <?php if (strlen($indicacionesclinicas) > 0) : ?>
                                            <div>
                                                <label><b>Indicaciones Clínicas</b></label><br>
                                                <label><?php echo $indicacionesclinicas ?></label>
                    
                                            </div>
                                        <?php endif ?>

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



                        <!-- inicio seccion 4 -->
            <div role="tabpanel" class="tab-pane fade" id="Section4">


<!--inicio accordion-->
<div class="col-md-12">
  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


    <?php

    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica_Fisioterapia_1 where cliente_id = '$clienteId' AND Receta_id<>'0'");
    $nrowl = mysqli_num_rows($queryList);
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
      $id = $rowMotorizado['id'];
      $cliente_id = $rowMotorizado['cliente_id'];

      $Fecha_Registro = $rowMotorizado['Fecha_Registro'];
      $receta_id = $rowMotorizado['receta_id'];
      $tipo3 = "Historia_Clinica_Fisioterapia_1";
      $tipo_encriptado3 = encrypt($tipo3);

    ?>
      <div class="panel panel-default" style="background: #f1f1f1;">
        <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
          <h4 class="panel-title">
            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id; ?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id; ?>
              <!-- <button onclick="window.open('RecetaEnviar.php?receta_id=<?php echo $receta_id; ?>&cliente_id=<?php echo $cliente_id; ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="bi:send"></i></button> -->
              <button onclick="window.open('<?php echo $Base; ?>HFT1_Finalizado_Historia_Fisioterapia?historiaClinica1=<?php echo $id;?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-list" data-icon="gridicons:print"></i></button>

            </a>
          </h4>
        </div>
        <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
          <div class="panel-body">
            <?php
            $recetas = 0;
            $querydeta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");
            while ($RowRecetario = mysqli_fetch_array($querydeta)) {

              $id = $RowRecetario['id'];
              $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
              $Cantidad = $RowRecetario['Cantidad'];
              $Presentacion = $RowRecetario['Presentacion'];
              $Via_Administracion = $RowRecetario['Via_Administracion'];
              $Composicion = $RowRecetario['Composicion'];
              $Dosis = $RowRecetario['Dosis'];

              $Indicaciones = $RowRecetario['Indicaciones'];
              $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

              echo "<div class='col-6'>";
              echo "<div class='col-12'>Nombre: {$Nombre_Medicamento} </div>";
              echo "<div class='col-12'>Presentacion: {$Presentacion} </div>";
              echo "<div class='col-12'>Via de Administracion: {$Via_Administracion} </div>";
              echo "<div class='col-12'>Composicion: {$Composicion} </div>";
              echo "<div class='col-12'>Cantidad: {$Cantidad} </div>";
              echo "<div class='col-12'>Dosis: {$Dosis}</div>";
              echo "<div class='col-12'><br></div>";
              echo "</div>";

              echo "<div class='col-6'>";
              echo "<div class='col-12'>Indicaciones:<br> {$Indicaciones} </div>";
              echo "<div class='col-12'>Indicaciones Generales:<br> {$Indicaciones_Generales}</div>";
              echo "<div class='col-12'><br><hr style='border-top: 1px solid #000;'><br></div>";
              echo "</div>";
              $recetas++;
            }
            echo $receta;
            if ($recetas == 0) {
              echo '<h1> No posee recetas registradas!! </h1>';
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
<!-- cierre seccion 4-->



                        




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