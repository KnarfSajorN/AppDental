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
        <li><a href="#">Historial Clinico</a></li>
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
            <a class="btn btn-primary" href="Historia_Clinica.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva consulta </a>
            <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>
            <?php
            include 'estadoFacturaPresupuestoCliente.php';
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
                        <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Examenes</a></li>
                        <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades</a></li>
                        <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas</a></li>
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active" id="Section1">
                          
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
                                  $fecha = $rowMotorizado['fecha'];


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
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id?>" aria-expanded="false" aria-controls="Historia<?php echo $id?>">
                                        Historia <?php echo $id.' / <b style="color: #444444;">'.$fecha.'</b>';?>

                                        <button onclick="window.location.href='Finalizado_Historia_Clinica_General.php?historiaClinica1=<?php echo $id;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Historia<?php echo $id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                    <?php
                                    echo 'Informacion del Acudiente<br>'.$InformacionAcudiente.'<br>';
                                    echo 'Enfermedad Actual<br>'.$EnfermedadActual.'<br>';
                                    echo 'Antecedentes <br>'.$Checks_Antecedentes.'<br>';
                                    echo 'Antecedentes Ginecobstetricos<br>'.$AntecentesGinecobstetricos.'<br>';
                                    echo 'Antecedentes Familiares<br>'.$AntecedentesFamiliares.'<br>';
                                    echo 'Revision por Sistemas<br>'.$Checks_Revision.'<br>';
                                    echo 'Signos vitales y medidas antropométricas<br>'.$SignosVitales.'<br>';
                                    echo 'Paraclínicos<br>'.$Paraclinicos.'<br>';
                                    echo 'Examenes<br>';
                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                    foreach ($Examen_Paciente as $value) {
                                      echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                    }
                                    echo 'Laboratorios<br>';
                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                    foreach ($Laboratorio_Paciente as $value) {
                                      echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                    }
                                    echo 'Examen Físico<br>'.$ExamenFisico.'<br>';
                                    echo 'Organos de los Sentidos<br>'.$OrganoSentidos.'<br>';
                                    echo 'Sintomas Generales<br>'.$SintomasGenerales.'<br>';
                                    echo 'Diagnostico de Acupuntura<br>'.$DiagnosticoAcupuntura.'<br>';
                                    echo 'Diagnóstico<br>'.$DiagnosticoConsulta.'<br>';
                                    echo 'Impresion<br>'.$Impresion.'<br>';
                                    echo 'Plan de manejo<br>'.$PlanManejo.'<br>';
                                    echo 'Incapacidades<br>'.$Incapacidades.'<br>';
                                    echo 'Insumos<br>'.$Insumos.'<br>';
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
                                
                                $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND RecetaId<>'0'");
                                $nrowl=mysqli_num_rows($queryList);
                                while($rowMotorizado=mysqli_fetch_array($queryList))
                                {
                                  $id = $rowMotorizado['id'];
                                  $cliente_id = $rowMotorizado['cliente_id'];

                                  $RecetaId = $rowMotorizado['RecetaId'];

                                ?>
                              <div class="panel panel-default" style="background: #f1f1f1;">
                                <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                                  <h4 class="panel-title">
                                    <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id;?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id;?> </a>
                                  </h4>
                                </div>
                                <div id="Receta<?php echo $id;?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                  <div class="panel-body">
                                    
                                      <table id="example1" class="table table-bordered table-striped">
                                       <thead>
                                         <tr>
                                           <th><h6 align="center">MEDICAMENTO</h6></th>
                                           <th><h6 align="center">FRECUENCIA DE ADMINISTRACIÓN</h6></th>  
                                           <th><h6 align="center">DOSIS</h6></th>
                                           <th><h6 align="center">DURACIÓN DE PRESCRIPCIÓN</h6></th>
                                           <th><h6 align="center">METODO DE ADMINISTRACIÓN</h6></th>
                                           <th><h6 align="center">CANTIDAD TOTAL DE DESPACHO</h6></th>
                                           <th><h6 align="center">INDICACIONES DE ADMINISTRACIÓN</h6></th>
                                           <th><h6 align="center">OBSERVACIONES</h6></th>  
                                         </tr>
                                       </thead>
                                       <?php
                                       $querydeta=mysqli_query($conn3,"SELECT * FROM  operacionRecetario  where  cliente_id = $cliente_id  and idReceta=$RecetaId");    
                                       $nrowl=mysqli_num_rows($querydeta);
                                       while($rowDetalle=mysqli_fetch_array($querydeta))
                                       {
                                         $Producto = funcionMaster($rowDetalle['codigoProd'],'id','descripcion','pos');
                                         $posologia                =$rowDetalle['posologia'];
                                         $cantidad          =$rowDetalle['cantidad'];
                                         $duracion          =$rowDetalle['duracion'];
                                         $metodo          =$rowDetalle['metodo'];
                                         $nota            =$rowDetalle['nota'];
                                         $nota2         =$rowDetalle['nota2'];
                                         $administracion_posologia  =$rowDetalle['administracion_posologia'];
                                         $duracion_tratamiento         =$rowDetalle['duracion_tratamiento'];

                                         $dosis                 =$rowDetalle['dosis'];
                                         
                                         $frecuencia                 =$rowDetalle['frecuencia'];
                                         $administracion              =$rowDetalle['administracion'];
                                         $dosisdia           =$rowDetalle['dosisdia'];
                                         $via   =$rowDetalle['via'];
                                         $id_usuario              =$rowDetalle['id_usuario'];
                                         $id_cliente              =$rowDetalle['idcliente']; 
                                         $total             =$rowDetalle['total']; 
                                         $dias             =$rowDetalle['dias']; 
                                         
                                         $producto1          =$rowDetalle['producto1']; 

                                         $numero++;
                                         ?>
                                         <tbody>
                                           <tr>
                                            <td><h6> <?php echo $Producto.' - '.$producto1?></h6> </td>
                                            <td> <h6><?php echo $frecuencia?> </h6></td>
                                            <td> <h6><?php echo $dosis?></h6> </td>
                                            <td> <h6><?php echo $duracion?></h6> </td>
                                            <td> <h6><?php echo $metodo?></h6> </td>
                                            <td> <h6><?php echo $cantidad.$posologia?></h6> </td>
                                            <td> <h6><?php echo $nota?></h6> </td>
                                            <td> <h6><?php echo $nota2?></h6></td> 
                                          </tr>
                                        </tbody>
                                        <?php
                                      }
                                      ?>
                                    </table>
                                           
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