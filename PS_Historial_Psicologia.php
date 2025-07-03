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
        <li><a href="#">Historial Psicología</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="PS_Historia_Psicologia?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Psicología</a></li>
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles de Psicología</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 

                                $queryList=mysqli_query($conn3,"SELECT * FROM  HistoriaClinica12 where cliente_id = $clienteId AND usuario_id='$usuarioId' order by id DESC");
                                while($row_recordset32=mysqli_fetch_array($queryList))
              
                                {
                                    $id                 = $row_recordset32['ID'];                
                                    $fecha                 = $row_recordset32['Fecha'];                
                                    $Hora                  = $row_recordset32['Hora'];
            
                                    $entrevistaInicial        = $row_recordset32['entrevistaInicial'];
                                     $historiaPersonal           = $row_recordset32['historiaPersonal']; 
              
              
                                    $historiaFamiliar           = $row_recordset32['historiaFamiliar'];      
                                    $Personalidad           = $row_recordset32['Personalidad']; 
              
                                    $examenMental           = $row_recordset32['examenMental'];      
                                    $educacion           = $row_recordset32['educacion'];      
                                    $Trabajo           = $row_recordset32['Trabajo'];      
                                    $cambioResidencia           = $row_recordset32['cambioResidencia'];      
                                    $accidentesEnfermedades           = $row_recordset32['accidentesEnfermedades'];      
                                    $vidaSexual           = $row_recordset32['vidaSexual'];      
                                    $habitosIntereses           = $row_recordset32['habitosIntereses'];      
                                    $actitudConFamilia           = $row_recordset32['actitudConFamilia'];      
                                    $suenos           = $row_recordset32['suenos'];      
                                    $AntecedentesSocioeconomicos           = $row_recordset32['AntecedentesSocioeconomicos'];      
                                    $evaluacion           = $row_recordset32['evaluacion'];      
                                    $tratamiento           = $row_recordset32['tratamiento'];      
                                    $evolucion           = $row_recordset32['evolucion'];     

                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id?>" aria-expanded="false" aria-controls="Historia<?php echo $id?>">
                                        Historia <?php echo $id.' / <b style="color: #444444;">'.$fecha.' </b>';?>

                                        <button onclick="window.location.href='PS_Finalizado_Psicologia?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Historia<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>


                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    
                                    <div align="right" >
                                    Fecha <?php echo $fecha;?>
                                    </div>




                                    <?php if (strlen($entrevistaInicial)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Entrevista Inicial:</label>
                                    <label>  <?php echo $entrevistaInicial?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($historiaPersonal)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Historia Personal:</label>
                                    <label>  <?php echo $historiaPersonal?></label>
                                    </div>
                                    <?php endif ?>




                                    <?php if (strlen($historiaFamiliar)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Historia Familiar:</label>
                                    <label>  <?php echo $historiaFamiliar?></label>
                                    </div>
                                    <?php endif ?>



                                    <?php if (strlen($Personalidad)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Personalidad:</label>
                                    <label>  <?php echo $Personalidad?></label>
                                    </div>
                                    <?php endif ?>



                                    <?php if (strlen($examenMental)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Examen Mental:</label>
                                    <label>  <?php echo $examenMental?></label>
                                    </div>
                                    <?php endif ?>



                                    <?php if (strlen($educacion)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Educacion:</label>
                                    <label>  <?php echo $educacion?></label>
                                    </div>
                                    <?php endif ?>

                                    <?php if (strlen($Trabajo)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Trabajo:</label>
                                    <label>  <?php echo $Trabajo?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($cambioResidencia)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Cambio Residencia:</label>
                                    <label>  <?php echo $cambioResidencia?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($accidentesEnfermedades)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Accidentes Enfermedades:</label>
                                    <label>  <?php echo $accidentesEnfermedades?></label>
                                    </div>
                                    <?php endif ?>




                                    <?php if (strlen($vidaSexual)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Vida Sexual:</label>
                                    <label>  <?php echo $vidaSexual?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($habitosIntereses)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Habitos Intereses:</label>
                                    <label>  <?php echo $habitosIntereses?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($actitudConFamilia)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Actitud Con Familia:</label>
                                    <label>  <?php echo $actitudConFamilia?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($suenos)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Sueños:</label>
                                    <label>  <?php echo $suenos?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($AntecedentesSocioeconomicos)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Antecedentes Socioeconomicos:</label>
                                    <label>  <?php echo $AntecedentesSocioeconomicos?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($evaluacion)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Evaluacion:</label>
                                    <label>  <?php echo $evaluacion?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($tratamiento)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Tratamiento:</label>
                                    <label>  <?php echo $tratamiento?></label>
                                    </div>
                                    <?php endif ?>


                                    <?php if (strlen($evolucion)>0): ?>
                                    <div>
                                    <hr>
                                    <label>Evolucion:</label>
                                    <label>  <?php echo $evolucion?></label>
                                    </div>
                                    <?php endif


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



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            

                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                              
                                $queryList=mysqli_query($conn3,"SELECT * FROM  historiaClinica_controlesPsicologia where cliente_id = $clienteId AND usuario_id='$usuarioId' order by id DESC");
                                while($row_recordset32=mysqli_fetch_array($queryList))
                                {
                                    $id                 = $row_recordset32['id'];                
                                    $Fecha                 = $row_recordset32['Fecha'];                
                                    $Hora                  = $row_recordset32['Hora'];                
              
                                    $Detalle           = $row_recordset32['Detalle']; 
                                    $control           = $row_recordset32['control'];   

                                ?>
                              <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Controles<?php echo $id?>" aria-expanded="false" aria-controls="Controles<?php echo $id?>">
                                        Controles <?php echo $id;?>
                                        <button onclick="window.location.href='PS_Finalizado_Controles_Psicologia?historiaClinica1=<?php echo $id?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Controles<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>
                                    

                                    <hr align="center" size="10" width="100%" color="#000000">
                
                                    <div align="right" >
                                      Fecha <?php echo $Fecha .'-'.$Hora?>
                                    </div>
                                      
                                    <?php if (strlen($control)>0): ?>
                                    <div>
                                    <label>Control :</label>
                                    <label>  <?php echo $control?></label>
                                    
                                    </div>
                                    <?php endif ?>

                                  
                                    <?php if (strlen($Detalle)>0): ?>
                                    <div>
                                    <label>Detalle:</label>
                                    <label>  <?php echo $Detalle?></label>
                                    
                                    </div>
                                    <?php endif



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
                        <!-- cierre seccion 2-->



                        <!-- inicio seccion 3 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                          

                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                                $nrowl=mysqli_num_rows($queryList);
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                  $id = $rowMotorizado['id'];
                                  $cliente_id = $rowMotorizado['cliente_id'];

                                  $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
                                  $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
                                  $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
                                  $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
                                  $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
                                  $Checks_Revision = $rowMotorizado['Checks_Revision'];
                                  $SignosVitales = $rowMotorizado['SignosVitales'];
                                  $Paraclinicos = $rowMotorizado['Paraclinicos'];
                                  $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                  $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                  $ExamenFisico = $rowMotorizado['ExamenFisico'];
                                  $OrganoSentidos = $rowMotorizado['OrganoSentidos'];
                                  $SintomasGenerales = $rowMotorizado['SintomasGenerales'];
                                  $DiagnosticoAcupuntura = $rowMotorizado['DiagnosticoAcupuntura'];
                                  $DiagnosticoConsulta = $rowMotorizado['DiagnosticoConsulta'];
                                  $Impresion = $rowMotorizado['Impresion'];
                                  $PlanManejo = $rowMotorizado['PlanManejo'];
                                  $Incapacidades = $rowMotorizado['Incapacidades'];
                                  $Insumos = $rowMotorizado['Insumos'];
                                  $RecetaId = $rowMotorizado['RecetaId'];

                                ?>
                              <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Incapacidad<?php echo $id?>" aria-expanded="false" aria-controls="Incapacidad<?php echo $id?>">
                                        Incapacidad <?php echo $id;?>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Incapacidad<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php
                                    echo 'Incapacidades<br>'.$Incapacidades.'<br>';
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
                        <!-- cierre seccion 3-->







                        <!-- inicio seccion 4 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section4">


                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND Receta_id<>'0'");
                                $nrowl=mysqli_num_rows($queryList);
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                  $id = $rowMotorizado['id'];
                                  $cliente_id = $rowMotorizado['cliente_id'];

                                  $receta_id = $rowMotorizado['receta_id'];

                                ?>
                              <div class="panel panel-default" style="background: #f1f1f1;">
                                <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id;?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id;?> </a>
                                  </h4>
                                </div>
                                <div id="Receta<?php echo $id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                  <div class="panel-body">
                                       <?php

                                       $querydeta=mysqli_query($conn3,"SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");    
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