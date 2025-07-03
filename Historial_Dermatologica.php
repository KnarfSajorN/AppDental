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
        <li><a href="#">Historial Clinico Dermatologico</a></li>
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
            <a class="btn btn-primary" href="Historia_Dermatologica.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>
            <!-- <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a> -->
            <?php
            // include 'estadoFacturaPresupuestoCliente.php';
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
                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historia</a></li>
                        <!-- <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Examenes</a></li>
                        <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades</a></li>
                        <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas</a></li> -->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Dermatologica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' and activo='1' ");
                                $nrowl=mysqli_num_rows($queryList);
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                  $id = $rowMotorizado['id'];
                                  $cliente_id = $rowMotorizado['cliente_id'];
                                  $fecha = $rowMotorizado['fecha'];


                                  $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
                                  $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
                                  $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
                                  $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
                                  $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
                                  $AntecedentesPer = $rowMotorizado['AntecedentesPer'];
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
                                  $CIE_10_1 = $rowMotorizado["CIE10_1"];
                                  $CIE_10_2 = $rowMotorizado["CIE10_2"];
                                  $CIE_10_3 = $rowMotorizado["CIE10_3"];
                                  $CIE_10_4 = $rowMotorizado["CIE10_4"];

                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id?>" aria-expanded="false" aria-controls="Historia<?php echo $id?>">
                                        Historia <?php echo $id.' / <b style="color: #444444;">'.$fecha.'</b>';?>

                                        <button onclick="window.location.href='Finalizado_Historia_Dermatologica.php?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                        <!--<button  onclick="confirmation(<?php echo $id;?>)" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-trash-o"></i></button>-->
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Historia<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php
                                    echo 'Informacion del Acudiente<br>'.$InformacionAcudiente.'<br>';
                                    echo 'Antecedentes Personales<br>'.$AntecedentesPer.'<br>';
                                    echo 'Antecedentes Familiares<br>'.$AntecedentesFamiliares.'<br>';
                                    echo 'Antecedentes Ginecobstetricos<br>'.$AntecentesGinecobstetricos.'<br>';
                                    
                                    echo 'Enfermedad Actual<br>'.$EnfermedadActual.'<br>';
                                    // echo 'Antecedentes <br>'.$Checks_Antecedentes.'<br>';
                                    // echo 'Antecedentes Ginecobstetricos<br>'.$AntecentesGinecobstetricos.'<br>';
                                    // echo 'Antecedentes Familiares<br>'.$AntecedentesFamiliares.'<br>';
                                    // echo 'Revision por Sistemas<br>'.$Checks_Revision.'<br>';
                                    // echo 'Signos vitales y medidas antropométricas<br>'.$SignosVitales.'<br>';
                                    // echo 'Paraclínicos<br>'.$Paraclinicos.'<br>';
                                    // echo 'Examenes<br>';
                                    // $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                    // foreach ($Examen_Paciente as $value) {
                                    //   echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                    // }
                                    // echo 'Laboratorios<br>';
                                    // $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                    // foreach ($Laboratorio_Paciente as $value) {
                                    //   echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                    // }
                                    echo 'Examen Físico<br>'.$ExamenFisico.'<br>';
                                    // echo 'Organos de los Sentidos<br>'.$OrganoSentidos.'<br>';
                                    // echo 'Sintomas Generales<br>'.$SintomasGenerales.'<br>';
                                    // echo 'Diagnostico de Acupuntura<br>'.$DiagnosticoAcupuntura.'<br>';
                                    // echo 'Diagnóstico<br>'.$DiagnosticoConsulta.'<br>';
                                    echo 'Impresion<br>'.$Impresion.'<br>';
                                    echo 'Plan de manejo<br>'.$PlanManejo.'<br>';
                                    // echo 'Incapacidades<br>'.$Incapacidades.'<br>';
                                    // echo 'Insumos<br>'.$Insumos.'<br>';

                                    if (strlen($CIE_10_1) > "1") {
    echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico principal </b> :' . $CIE_10_1 .' - '.funcionMaster($CIE_10_1,'codigo','descripcion','cie10'). '</div>';
}

if (strlen($CIE_10_2) > "1") {
    echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico relacionado N° 1 </b> :' . $CIE_10_2 .' - '.funcionMaster($CIE_10_2,'codigo','descripcion','cie10'). '</div>';
}

if (strlen($CIE_10_3) > "1") {
    echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico relacionado N° 2 </b> :' . $CIE_10_3 .' - '.funcionMaster($CIE_10_3,'codigo','descripcion','cie10'). '</div>';
}

if (strlen($CIE_10_4) > "1") {
    echo '<div class="col-12\" style="padding-bottom: 10px;\">'.'<b>  Diagnóstico relacionado N° 3 </b> :' . $CIE_10_4 .' - '.funcionMaster($CIE_10_4,'codigo','descripcion','cie10'). '</div>';
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



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">
                            

                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Dermatologica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' and activo='1' ");
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
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Examenes<?php echo $id?>" aria-expanded="false" aria-controls="Examenes<?php echo $id?>">
                                        Examenes <?php echo $id;?>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Examenes<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php
                                    echo 'Examenes<br>';
                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                    foreach ($Examen_Paciente as $value) {
                                      echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                    }
                                    echo 'Laboratorios<br>';
                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                    foreach ($Laboratorio_Paciente as $value) {
                                      echo funcionMaster($value,'id','Nombre','examenes_historia');
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
                        <!-- cierre seccion 2-->



                        <!-- inicio seccion 3 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                          

                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Dermatologica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' and activo='1'");
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
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Dermatologica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND Receta_id<>'0'");
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



    <script type="text/javascript">
     function confirmation(valor) 
     {
      if(confirm("Seguro Desea Eliminar esta Historia? UNA VEZ ELIMINADO EL REGISTRO NO SE PODRÁ RECUPERAR"))
      {
       return window.location="EliminarConsulta.php?historia=1&cliente=<?php echo $clienteId;?>&Id="+valor;
      }
     else
     {
       return false;
     }
   }
 </script>

        















      </div>
    </section>
  </div>
           

   <?php
    include 'footer.php';

   ?>