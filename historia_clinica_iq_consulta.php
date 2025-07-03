<?php 
   include 'header.php';
   include 'menu.php';

   //$clienteId = $_GET['clienteId'];
   $clienteId = decrypt($_GET['cI']);
   $cliente_id_modulo = $clienteId;//Evoluciones
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
        <li><a href="#">Informe Quirúrgico</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="hciq?cI=<?= encrypt($clienteId); ?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
            <!--<a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>-->
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
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Informes Quirúrgicos </a></li>
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

                                $queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica_Quirurgica where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC");
                                while ($nrowl = mysqli_fetch_assoc($queryList)) {


                                  $ID = $nrowl['ID'];
                                  $Fecha = $nrowl['Fecha'];
                                  $hora_inicio = $nrowl['hora_inicio'];
                                  $hora_finaliza = $nrowl['hora_finaliza'];
                                  $n_sala = $nrowl['n_sala'];
                                  $cirujano = $nrowl['cirujano'];
                                  $ayudante = $nrowl['ayudante'];
                                  $anestesiologo = $nrowl['anestesiologo'];
                                  $tipo_anestesia = $nrowl['tipo_anestesia'];
                                  $instrumentador = $nrowl['instrumentador'];
                                  $circulante = $nrowl['circulante'];
                                  $prodecimiento_quirurgico = $nrowl['prodecimiento_quirurgico'];
                                  $hallazgo_quirurgicos = $nrowl['hallazgo_quirurgicos'];
                                  $descripcion_quirurgica = $nrowl['descripcion_quirurgica'];
                                  $sangrado = $nrowl['sangrado'];
                                  $complicaciones = $nrowl['complicaciones'];
                                  $observaciones = $nrowl['observaciones'];
                                  $patologia = $nrowl['patologia'];
                                  $tejido = $nrowl['tejido']; 

                                  $TablaHistoria="historiaClinica_Quirurgica";
                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $ID?>" aria-expanded="false" aria-controls="Historia<?php echo $ID?>">
                                        Historia <?php echo $ID.' / <b style="color: #444444;"> Fecha: '.$Fecha . '-' . $Hora.' </b>';?>

                                        <button onclick="window.location.href='hciqFinalizado?iC=<?= encrypt($ID) ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" ></i></button>

                                        <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file"></i></button>

                                        <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye"></i></button>

                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Historia<?php echo $ID?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>


                                    <hr align="center" size="10" width="100%" color="#000000">

                                    <div align="right">
                                      Fecha <?php echo $Fecha . '-' . $Hora ?>
                                    </div>



                                    <?php if (strlen($hora_inicio) > 0) : ?>
                                      <div>
                                        <label>Hora Inicio :</label>
                                        <label> <?php echo $hora_inicio ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($hora_finaliza) > 0) : ?>
                                      <div>
                                        <label>Hora Finalización :</label>
                                        <label> <?php echo $hora_finaliza ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($n_sala) > 0) : ?>
                                      <div>
                                        <label>N° Sala :</label>
                                        <label> <?php echo $n_sala ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($cirujano) > 0) : ?>
                                      <div>
                                        <label>Cirujano :</label>
                                        <label> <?php echo $cirujano ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($ayudante) > 0) : ?>
                                      <div>
                                        <label>Ayudante :</label>
                                        <label> <?php echo $ayudante ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($anestesiologo) > 0) : ?>
                                      <div>
                                        <label>Anestesiólogo :</label>
                                        <label> <?php echo $anestesiologo ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($tipo_anestesia) > 0) : ?>
                                      <div>
                                        <label>Tipo de Anestesia :</label>
                                        <label> <?php echo $tipo_anestesia ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($instrumentador) > 0) : ?>
                                      <div>
                                        <label>Instrumentador :</label>
                                        <label> <?php echo $instrumentador ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($circulante) > 0) : ?>
                                      <div>
                                        <label>Circulante :</label>
                                        <label> <?php echo $circulante ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($prodecimiento_quirurgico) > 0) : ?>
                                      <div>
                                        <label>Procedimiento(s) Quirúrgico(s) :</label>
                                        <label> <?php echo $prodecimiento_quirurgico ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($hallazgo_quirurgicos) > 0) : ?>
                                      <div>
                                        <label>Hallazgos Intraoperatorios :</label>
                                        <label> <?php echo $hallazgo_quirurgicos ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($descripcion_quirurgica) > 0) : ?>
                                      <div>
                                        <label>Descripción Quirúrgica :</label>
                                        <label> <?php echo $descripcion_quirurgica ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($sangrado) > 0) : ?>
                                      <div>
                                        <label>Sangrado estimado :</label>
                                        <label> <?php echo $sangrado ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($complicaciones) > 0) : ?>
                                      <div>
                                        <label>Complicaciones :</label>
                                        <label> <?php echo $complicaciones ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($observaciones) > 0) : ?>
                                      <div>
                                        <label>Observaciones :</label>
                                        <label> <?php echo $observaciones ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($patologia) > 0) : ?>
                                      <div>
                                        <label>Patología :</label>
                                        <label> <?php echo $patologia ?></label>

                                      </div>
                                    <?php endif ?>
                                    <?php if (strlen($tejido) > 0) : ?>
                                      <div>
                                        <label>Tejido :</label>
                                        <label> <?php echo $tejido ?></label>

                                      </div>
                                    <?php endif ?>
                                    <hr>
                                    <div align="center"> Diagnósticos Iniciales CIE-10 </div>



                                    <?php
                                    $cie1 = mysqli_query($conn3, "SELECT * FROM  historiaClinica9_Quirurgico_Cie10 as hq, cie10 as ci where hq.cliente_id = $clienteId and hq.historiaClinica9_id= $ID and hq.usuario_id = $usuarioId and hq.codigo=ci.codigo order by hq.ID_Cie10 DESC");
                                    while ($whi = mysqli_fetch_assoc($cie1)) { ?>

                                      <div>
                                        <label>Código :</label>
                                        <label><?php echo $whi['codigo']; ?></label>

                                      </div>
                                      <div>
                                        <label>Descripción :</label>
                                        <label><?php echo $whi['descripcion']; ?></label>

                                      </div>

                                    <?php  }  



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
                                        <button onclick="window.location.href='PS_Finalizado_Controles_Psicologia.php?historiaClinica1=<?php echo $id?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
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