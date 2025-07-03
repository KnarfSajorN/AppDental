<?php 
   include 'header.php';
   include 'menu.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Paciente
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol>
    </section>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
      
<?php
       
            $clienteId = $_GET['cliente']; 
            $usuarioId = $_SESSION['ID']; 


$historiaClinica=$_GET['historiaClinica']; 
$idHistoria=$_GET['idHistoria']; 

if ( $idHistoria =='') {$idHistoria = 0;}
  





 $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

        $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id=$clienteId");

        $nrowl=mysqli_num_rows($queryList);

        while($rowMotorizado=mysqli_fetch_array($queryList))

        {
 $usuario_id=$rowMotorizado['usuario_id'];
            $nombre_cliente=$rowMotorizado['nombre_cliente'];
            $celular_cliente=$rowMotorizado['celular_cliente'];
            $ciudad_cliente=$rowMotorizado['ciudad_cliente'];
            $correo_cliente=$rowMotorizado['correo_cliente'];
            $CODI_CLIENTE=$rowMotorizado['CODI_CLIENTE'];
            $id_uso_servicio=$rowMotorizado['id_uso_servicio'];
            $tipo_cliente=$rowMotorizado['tipo_cliente'];
            $fechar=$rowMotorizado['fechar'];
            $fecha_actualizado=$rowMotorizado['fecha_actualizado'];
            $activo=$rowMotorizado['activo'];
            $genero=$rowMotorizado['genero'];
            $direccion_cliente=$rowMotorizado['direccion_cliente'];
            $telefono_cliente=$rowMotorizado['telefono_cliente'];
            $edad_cliente=$rowMotorizado['edad_cliente'];
            $profesion_cliente=$rowMotorizado['profesion_cliente'];
            $acompananteFamiliar=$rowMotorizado['acompananteFamiliar'];
            $telefono_acompanante=$rowMotorizado['telefono_acompanante'];
            $antecedentes=$rowMotorizado['antecedentes'];
            $fechaNacimiento=$rowMotorizado['fechaNacimiento'];
            $esDonante=$rowMotorizado['esDonante'];
            $entidadSalud=$rowMotorizado['entidadSalud'];

              


            $peso                     = $rowMotorizado['peso']; 
            $altura                   = $rowMotorizado['altura']; 
            $imc                          = $rowMotorizado['imc']; 
            $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal']; 
            $fotoperfil      = $rowMotorizado['fotoperfil']; 

 $apell_cliente=$rowMotorizado['apell_cliente'];
        $apellido_cliente=$rowMotorizado['apellido_cliente'];
        $celular_cliente=$rowMotorizado['celular_cliente'];
         $nombre_cliente1=$rowMotorizado['nombre_cliente1'];

           }

        ?>





 <div class="card-body">
                  <div class="box-body">
                     

          
           <?php echo datosPacientes($clienteId);?>





<div class="col-md-12">

  <!--<a class="btn btn-primary" href="testCoronavirus.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nuevo Test </a>-->
 
         
                               
     </div>
<br>

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <!--<li class="active"><a href="#Consultas" data-toggle="tab">Evoluciones</a></li>-->
             

               
              <!--<li><a href="#Recetas" data-toggle="tab">Recetas</a></li>-->
                <!--<a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>
            <div class="tab-content">
          <div class="active tab-pane" id="Consultas">
          
          
           





           <div class="col-md-12">
          <div class="box box-solid">
             
            <!-- /.box-header -->
            <div class="box-body">
              <div class="box-group" id="accordion">
                <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                








          <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Evoluciones
           </h3>
           
           <!--inicio accordion-->
           <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

           <?php

                  $queryList=mysqli_query($conn3,"SELECT * FROM  evoluciones where  cliente_id = $clienteId and usuario_id = $usuarioId and id_historiaClinica='$historiaClinica' and activo='1' AND Realizado_Desde='Historia_Clinica_Ginecobstetrica' order by ID DESC");
                                  
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {

                    $ID      =$rowMotorizado['ID'];
                    $cliente_id      =$rowMotorizado['cliente_id'];
                    $usuario_id      =$rowMotorizado['usuario_id'];
                    $Fecha           =$rowMotorizado['Fecha'];

                    $Hora            =$rowMotorizado['Hora'];
                    $motivoConsulta  =$rowMotorizado['motivoConsulta'];
                    $receta_id  =$rowMotorizado['receta_id'];

                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $ID ?>" aria-expanded="false" aria-controls="Historia<?php echo $ID ?>" style="    padding: 20px;width: 100%;display: block;">
                            Fecha  <?php echo "" . ' <b style="color: #444444;">' . $Fecha . '</b>/  # '.$ID; ?>

                            <button onclick="window.location.href='GO_Finalizado_Evolucion_Ginecobstetrica?historiaClinica1=<?php echo $ID; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                          </a>
                        </h4>
                      </div>
                      <div id="Historia<?php echo $ID ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                        <div class="panel-body" style="padding: 20px;">
                        <label> Nota Evolución </label> <br>
                        <?php echo $motivoConsulta?>
                        <hr>
                        <?php

                          $querydeta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");
                          while ($RowRecetario = mysqli_fetch_array($querydeta)) :


                            $id = $RowRecetario['id'];
                            $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                            $Cantidad = $RowRecetario['Cantidad'];
                            $Presentacion = $RowRecetario['Presentacion'];
                            $Via_Administracion = $RowRecetario['Via_Administracion'];
                            $Composicion = $RowRecetario['Composicion'];
                            $Dosis = $RowRecetario['Dosis'];

                            $Indicaciones = $RowRecetario['Indicaciones'];
                            $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                          ?>
                            <label> Receta: </label>
                            <div class='col-6'>
                              <div class='col-12'><b>Nombre:</b> <?= $Nombre_Medicamento ?> </div>
                              <div class='col-12'><b>Presentacion:</b> <?= $Presentacion ?></div>
                              <div class='col-12'><b>Via de Administracion:</b> <?= $Via_Administracion ?></div>
                              <div class='col-12'><b>Composicion:</b> <?= $Composicion ?></div>
                              <div class='col-12'><b>Cantidad:</b> <?= $Cantidad ?></div>
                              <div class='col-12'><b>Dosis:</b> <?= $Dosis ?></div>
                              <div class='col-12'><br></div>
                            </div>

                            <div class='col-6'>
                              <div class='col-12'><b>Indicaciones:</b><br> <?= $Indicaciones ?></div>
                              <div class='col-12'><b>Indicaciones Generales:</b><br> <?= $Indicaciones_Generales ?></div>
                              <div class='col-12'><br>
                                <hr style='border-top: 1px solid #000;'><br>
                              </div>
                            </div>

                          <?php endwhile; ?>
                          
                                 
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>

                  


              </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        
                </div>
                </div>








      </div>
              <!-- /.tab-pane -->
              
 
      
  <div class="tab-pane" id="Examenes">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>
           Registro de Examenes        </h3>  
 
                  <?php 

                  $queryList=mysqli_query($conn3,"SELECT * FROM historiaImagen where cliente_id= $clienteId GROUP by Fecha");

          

                  while($row_recordset32=mysqli_fetch_assoc($queryList))

                  {             
                      $ID                         = $row_recordset32['IM_id'];    
                      $Fecha                         = $row_recordset32['Fecha'];    ?>





              <div class="panel box box-primary">
                  <div class="box-header with-border">
                    <h4 class="box-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID?>">
                        Fecha / Hora <?php echo $Fecha; ?> <a href="finalizado.php?historiaClinica1=<?php echo $ID?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                      </a>
                    </h4>
                  </div>



                  <div id="<?php echo $ID?>" class="panel-collapse collapse">
                    <div class="box-body">
<div class="row">
                      <?php //echo $Fecha;

                            $ListaImg=mysqli_query($conn3,"SELECT * FROM historiaImagen where Fecha= '$Fecha'");?>
                          


                          <?php  while ($resulImg=mysqli_fetch_assoc($ListaImg)) {  ?>
                           

                             <a target="blank" href="https://medicalsoftplus.com/ec189/galeriaImg/<?php echo $resulImg['nombre_img']; ?>">
                                  <div class="form-group col-md-3" style="padding: 3px 10px 3px 10px;">
                                   <img style="box-shadow: 0px 0px 15px -4px rgb(60, 141, 188);border: 1px solid #3c8dbc; border-radius: 5px;" width="250" height="150" src="galeriaImg/<?php echo $resulImg['nombre_img']; ?>" alt=""  >
                                  </div>
                              </a>  


                            <?php } ?>
        </div>
                    </div>
                  </div>
              </div>















           
    <?php  } ?>

       
  </div>

              
            







    <div class="tab-pane" id="Recetas">
      <hr align="center" size="10" width="100%" color="#000000">
           <h3>Recetas</h3>  
            <?php

                  $queryList = mysqli_query($conn3, "SELECT * FROM  evoluciones where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND Receta_id<>'0'");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $id = $rowMotorizado['id'];
                    $cliente_id = $rowMotorizado['cliente_id'];

                    $receta_id = $rowMotorizado['receta_id'];

                  ?>
                    <div class="panel panel-default" style="background: #f1f1f1;">
                      <div class="panel-heading" role="tab" id="headingOne" style="background-color: #bad8e687;">
                        <h4 class="panel-title">
                          <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Receta<?php echo $id; ?>" aria-expanded="true" aria-controls="collapseOne"> Receta <?php echo $id; ?> </a>
                        </h4>
                      </div>
                      <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne" style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                        <div class="panel-body">
                          <?php

                          $querydeta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");
                          while ($RowRecetario = mysqli_fetch_array($querydeta)) :


                            $id = $RowRecetario['id'];
                            $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                            $Cantidad = $RowRecetario['Cantidad'];
                            $Presentacion = $RowRecetario['Presentacion'];
                            $Via_Administracion = $RowRecetario['Via_Administracion'];
                            $Composicion = $RowRecetario['Composicion'];
                            $Dosis = $RowRecetario['Dosis'];

                            $Indicaciones = $RowRecetario['Indicaciones'];
                            $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                          ?>

                            <div class='col-6'>
                              <div class='col-12'><b>Nombre:</b> <?= $Nombre_Medicamento ?> </div>
                              <div class='col-12'><b>Presentacion:</b> <?= $Presentacion ?></div>
                              <div class='col-12'><b>Via de Administracion:</b> <?= $Via_Administracion ?></div>
                              <div class='col-12'><b>Composicion:</b> <?= $Composicion ?></div>
                              <div class='col-12'><b>Cantidad:</b> <?= $Cantidad ?></div>
                              <div class='col-12'><b>Dosis:</b> <?= $Dosis ?></div>
                              <div class='col-12'><br></div>
                            </div>

                            <div class='col-6'>
                              <div class='col-12'><b>Indicaciones:</b><br> <?= $Indicaciones ?></div>
                              <div class='col-12'><b>Indicaciones Generales:</b><br> <?= $Indicaciones_Generales ?></div>
                              <div class='col-12'><br>
                                <hr style='border-top: 1px solid #000;'><br>
                              </div>
                            </div>

                          <?php endwhile; ?>
                                 
                        </div>
                      </div>
                    </div>
                  <?php
                  }
                  ?>
  
              </div>
              </div>
            
              



              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>


        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>