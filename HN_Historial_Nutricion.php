<?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = $_GET['clienteId']; 
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
        <li><a href="#">Historial Nutrición</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="HN_Historia_Nutricion?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>
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
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Nutrición</a></li>
                        <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Exámenes a Realizar de Nutrición</a></li>
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
                                    
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  nutricionAdulto where cliente_id = $clienteId AND usuario_id = '$usuarioId' order by id DESC ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($rowMotorizado=mysqli_fetch_array($queryList))
                                    {
                                    $id = $rowMotorizado['ID'];

                                    
              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora            =$rowMotorizado['Hora'];
              $motivoConsulta  =$rowMotorizado['motivoConsulta'];
              $diagnostico     =$rowMotorizado['diagnostico'];
              $tratamiento     =$rowMotorizado['tratamiento'];
              $notas           =$rowMotorizado['notas'];
              $recipe          =$rowMotorizado['recipe'];
              $remite          =$rowMotorizado['remite'];
              $comoTomarlo     =$rowMotorizado['comoTomarlo'];
              $incapacidades   =$rowMotorizado['incapacidades'];
              $rSistema         =$rowMotorizado['rSistema'];
              $enfermedadActual  =$rowMotorizado['enfermedad'];
              $antecedentesPers  =$rowMotorizado['antecedentesPers'];
              $antecedentesFami =$rowMotorizado['antecedentesFami'];
              $nutricion =$rowMotorizado['antenutricion'];
              $PARAMETROS=$rowMotorizado['parametros'];
              $estilo = $rowMotorizado['estiloVida'];
              $funcionalidadMuscular= $rowMotorizado['funcionalidadMuscular'];
              $anamnesis= $rowMotorizado['anamnesis'];
              $consumoH= $rowMotorizado['consumoH'];
              $antropometria= $rowMotorizado['antropometria'];
              $archivo= $rowMotorizado['archivo'];
              $examenPartesdCuerpo= $rowMotorizado['examenPartesdCuerpo'];
              $laboratorio= $rowMotorizado['laboratorio'];
              $ecografia= $rowMotorizado['ecografia'];
              $otros= $rowMotorizado['otros'];
              $Antecedentes_personales= $rowMotorizado['Antecedentes_personales'];
              $Antecedentes_Familiares= $rowMotorizado['Antecedentes_Familiares'];
              $Antecedentes_Ginecologicos= $rowMotorizado['Antecedentes_Ginecologicos'];
              $notasadicionales= $rowMotorizado['notasadicionales'];

              $TablaHistoria="nutricionAdulto";
                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaOtorrino<?php echo $id?>" aria-expanded="false" aria-controls="HistoriaOtorrino<?php echo $id?>">
                                        Fecha <?php echo $Fecha?>

                                        <button onclick="window.location.href='HN_Finalizado_Historias?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($id); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" title="Agregar Evolución" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file"></i></button>

                                        <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($id); ?>&tabla=<?php echo encrypt($TablaHistoria); ?>', '_blank', 'noopener')" title="Ver Historial de Evolución" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye"></i></button>

                                      </a>
                                    </h4>
                                  </div>
                                  <div id="HistoriaOtorrino<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                        <hr align="center" size="10" width="100%" color="#000000">
                    
                                        <div align="right" >
                                        Fecha <?php echo $Fecha?>
                                        </div>


                                        <p>
  <?php  if ($remite <> '') {$remite1 = '¿Quién Remite?: '.$remite.'';} ?>
  <?php  echo $remite1  ?>

</p>

<p>

  <?php  if ($motivoConsulta <> '') {$motivoConsulta1 = 'Motivo Consulta: '.$motivoConsulta.'';} ?>
  <?php  echo $motivoConsulta1  ?>

</p>

<p>

   <?php  if ($enfermedadActual<> '') {$enfermedadActual1 = 'Enfermedad Actual: '.$enfermedadActual.'' ;} ?>
  <?php  echo $enfermedadActual1  ?>

</p>
  


  <p>  <?php  if ($notasadicionales<> '') {$notasadicionales1 = 'Revisión por Sistema:'.$notasadicionales;} ?>
  <?php  echo  $notasadicionales1?>

 </p>

    <p>
    <?php  if ( $Antecedentes_personales<> '') { $Antecedentes_personales1 = 'Antecedentes Personales:'. $Antecedentes_personales;} ?>
    <?php  echo  $Antecedentes_personales1?>
  </p>

  <p>

     <?php  if ( $Antecedentes_Familiares<> '') { $Antecedentes_Familiares1 = 'Antecedentes Familiares:'. $Antecedentes_Familiares;} ?>
     <?php  echo  $Antecedentes_Familiares1?>

   </p>

   <p>


     <?php  if ( $Antecedentes_Ginecologicos<> '') { $Antecedentes_Ginecologicos1 = 'Antecedentes Ginecológicos: '. $Antecedentes_Ginecologicos;} ?>
    <?php  echo  $Antecedentes_Ginecologicos1?>

  </p>
 
<br>
<Table> <tr> <td><h5><b>Parámetros Bioquímicos</b></h5> </td> </tr>
  
<tr> <td>   <?php  echo  $PARAMETROS ?> </td> </tr> <br>
 </table>


<br>
   
<h5><b>Estilo de Vida</b></h5> 
  
  <?php  echo  $estilo?>
<br>


<h5><b>Funcionalidad Muscular</b></h5> 
  
  <?php  echo $funcionalidadMuscular?>
<br>

<h5><b>Anamnesis</b></h5> 
  
  <?php  echo $anamnesis?>
<br>
<Table> <tr> <td><h5><b>  Consumo Habitual</b></h5> </td> </tr>
  
 <tr> <td> <?php  echo $consumoH?> </td> </tr>
   </table>
<br>

<h5 align="center"><b>Antropometría Completa</b></h5> 
  
  <?php  echo $antropometria?>
<br>

<p>  <?php  if ($incapacidades<> '') {$incapacidades1 = 'Incapacidades:'.$incapacidades;} ?>
  <?php  echo  $incapacidades1?>
  
</p>

<p>  <?php  if ($recipe<> '') {$recipe1 = 'Receta médica:'.$recipe;} ?>
  <?php  echo  $recipe1?>
  
</p>

<p>  <?php  if ($notas<> '') {$notas1 = 'Notas:'.$notas;} ?>
  <?php  echo  $notas1?>
  
</p>

<p>  <?php  if ($examenPartesdCuerpo<> '') {$examenPartesdCuerpo1 = 'Exámenes de las Partes del Cuerpo:'.$examenPartesdCuerpo;} ?>
  <?php  echo  $examenPartesdCuerpo1?>
  
</p>


<p>     <?php  if ($diagnostico<> '') {$diagnostico1 = 'Impresiones Diagnósticas (Diagnóstico General): '.$diagnostico ;} ?>
  <?php  echo  $diagnostico1?>

  </p>
 
<p>  <?php  if ($tratamiento<> '') {$tratamiento1 = 'Tratamiento (Plan de Atención):'.$tratamiento;} ?>
  <?php  echo  $tratamiento1?>
  
</p>

<p>  <?php  if ($laboratorio<> '') {$laboratorio1 = 'Laboratorio:'.$laboratorio;} ?>
  <?php  echo  $laboratorio1?>
  
</p>


<p>  <?php  if ($ecografia<> '') {$ecografia1 = 'Imagenología:'.$ecografia;} ?>
  <?php  echo  $ecografia1?>
  
</p>


<p>  <?php  if ($otros<> '') {$otros1 = 'Otros:'.$otros;} ?>
  <?php  echo  $otros1?>
  
</p>


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
                                    
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  nutricionAdulto where cliente_id = $clienteId AND usuario_id = '$usuarioId' order by id DESC ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($rowMotorizado=mysqli_fetch_array($queryList))
                                    {
                                    $id = $rowMotorizado['ID'];

                                    
              $cliente_id      =$rowMotorizado['cliente_id'];
              $usuario_id      =$rowMotorizado['usuario_id'];
              $Fecha           =$rowMotorizado['Fecha'];

              $Hora            =$rowMotorizado['Hora'];
              $motivoConsulta  =$rowMotorizado['motivoConsulta'];
              $diagnostico     =$rowMotorizado['diagnostico'];
              $tratamiento     =$rowMotorizado['tratamiento'];
              $notas           =$rowMotorizado['notas'];
              $recipe          =$rowMotorizado['recipe'];
              $remite          =$rowMotorizado['remite'];
              $comoTomarlo     =$rowMotorizado['comoTomarlo'];
              $incapacidades   =$rowMotorizado['incapacidades'];
              $rSistema         =$rowMotorizado['rSistema'];
              $enfermedadActual  =$rowMotorizado['enfermedad'];
              $antecedentesPers  =$rowMotorizado['antecedentesPers'];
              $antecedentesFami =$rowMotorizado['antecedentesFami'];
              $nutricion =$rowMotorizado['antenutricion'];
              $PARAMETROS=$rowMotorizado['parametros'];
              $estilo = $rowMotorizado['estiloVida'];
              $funcionalidadMuscular= $rowMotorizado['funcionalidadMuscular'];
              $anamnesis= $rowMotorizado['anamnesis'];
              $consumoH= $rowMotorizado['consumoH'];
              $antropometria= $rowMotorizado['antropometria'];
              $archivo= $rowMotorizado['archivo'];
              $examenPartesdCuerpo= $rowMotorizado['examenPartesdCuerpo'];
              $laboratorio= $rowMotorizado['laboratorio'];
              $ecografia= $rowMotorizado['ecografia'];
              $otros= $rowMotorizado['otros'];
              $Antecedentes_personales= $rowMotorizado['Antecedentes_personales'];
              $Antecedentes_Familiares= $rowMotorizado['Antecedentes_Familiares'];
              $Antecedentes_Ginecologicos= $rowMotorizado['Antecedentes_Ginecologicos'];
              $notasadicionales= $rowMotorizado['notasadicionales'];

                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaOtorrino1<?php echo $id?>" aria-expanded="false" aria-controls="HistoriaOtorrino1<?php echo $id?>">
                                         Exámenes a Realizar #<?=$id;?>

                                        <button onclick="window.location.href='HN_Finalizado_Historias?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list" style="top: 2px;position: relative;"></i></button>

                                        
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="HistoriaOtorrino1<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php ?>

                                        <hr align="center" size="10" width="100%" color="#000000">
                    
                                        <div align="right" >
                                        Fecha <?php echo $Fecha?>
                                        </div>

<p>  <?php  if ($laboratorio<> '') {$laboratorio1 = 'Laboratorio:'.$laboratorio;} ?>
  <?php  echo  $laboratorio1?>
  
</p>


<p>  <?php  if ($ecografia<> '') {$ecografia1 = 'Imagenología:'.$ecografia;} ?>
  <?php  echo  $ecografia1?>
  
</p>


<p>  <?php  if ($otros<> '') {$otros1 = 'Otros:'.$otros;} ?>
  <?php  echo  $otros1?>
  
</p>


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

   