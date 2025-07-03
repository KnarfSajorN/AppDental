<?php 
   include 'header1.php';
   //include 'menu.php';
   include 'funciones.php';?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--<section class="content-header">
      <h1>
        Paciente
         
      </h1>
      <!-<ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol>
    </section>-->

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
      
<?php
            $clienteId = decrypt($_GET['cI']); 
            //$clienteId = $_GET['clienteId']; 
            $usuarioId = $_SESSION['ID']; 
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
            

          


            $peso                     = $rowMotorizado['peso']; 
            $altura                   = $rowMotorizado['altura']; 
            $imc                          = $rowMotorizado['imc']; 
            $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal']; 
            $fotoperfil      = $rowMotorizado['fotoperfil'];
            $fechaNacimiento  =$rowMotorizado['fechaNacimiento'];
            $enfermedadesPequeno =$rowMotorizado['enfermedadesPequeno'];
            $alergias =$rowMotorizado['alergias'];
            $codigo_ciudad =$rowMotorizado['codigo_ciudad'];
            $codigo_departamento =$rowMotorizado['codigo_departamento'];
            $codigo_pais =$rowMotorizado['codigo_pais'];
           

 

           }

        ?>





 <div class="card-body">
                  <div class="box-body">
              <?php //echo datosPacientes($clienteId);?>
            </div>
 

 <!--<div align="center">
   <a class="btn btn-primary" href="historiaClinica5_v2.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Tratamiento </a>

   <a class="btn btn-primary" href="historiaClinica5.php?clienteId=<?php echo $clienteId;?>" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta </a>


  <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes </a>
                                       
     </div>
<br>->

               <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
           <li class="active"><a href="#Consultas" data-toggle="tab">Tratamientos</a></li>-->
              <!--<li><a href="#Consultas2" data-toggle="tab">Consultas</a></li>
              <li><a href="#Examenes" data-toggle="tab">Registros de exámenes</a></li>-->

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId;?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
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
                          Consulta Clinica
                        </h3>

                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * FROM  e_tratamiento1 where idCliente = $clienteId and idUsuario = $usuarioId order by ID DESC");

                        $nrowl = mysqli_num_rows($queryList);

                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                          $ID                 = $row_recordset32['id'];
                          $fechaHora                 = $row_recordset32['fechaHora'];   
                          $NSesiones                 = $row_recordset32['NSesiones']; 
                          $SesionesD                = $row_recordset32['sesionesD']; 
                          //$Tratamiento = funcionMaster($row_recordset32['codigoProd'],'id','descripcion','sDetalleOper');
                          $Tratamiento = $row_recordset32['TratamientoD'];
                          $quedan = $NSesiones - $SesionesD;  



                        ?>

                          <div class="panel box box-primary">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID ?>">
                                  Fecha <?php echo $fechaHora ?> | <strong> <?php echo ($Tratamiento) ?> 
                                  </strong>
                                </a>
                              </h4>
                            </div>
                            <div id="<?php echo $ID ?>" class="panel-collapse collapse">
                              <div class="box-body">

                                <hr align="center" size="10" width="100%" color="#000000">

                                

                                

                           


                                <?php if (strlen($Tratamiento) > 0) : ?>
                                  <div>
                                    <strong> Tratamiento: </strong> <?php echo $Tratamiento?>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($SesionesD) > 0) : ?>
                                  <div>
                                    <strong> Sesiones: </strong> <?php echo $SesionesD?>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($NSesiones) > 0) : ?>
                                  <div>
                                    <strong> Número de Sesiones: </strong> <?php echo $NSesiones ?>
                                  </div>
                                <?php endif ?>

                                 <?php if (strlen($quedan) > 0) : ?>
                                  <div>
                                    <strong> Cuantas Sesiones le hacen falta: </strong> <?php echo $quedan ?>
                                  </div>
                                <?php endif ?>





                              </div>
                            </div>
                          </div>


















                        <?php }  ?>



                      </div>
                    </div>
                    <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
                </div>









              </div>
              <!-- /.tab-pane -->



























              <!-- <div class="active tab-pane" id="Consultas2">
                <div class="col-md-12">
                  <div class="box box-solid"> -->

                    <!-- /.box-header -->
                    <!-- <div class="box-body">
                      <div class="box-group" id="accordion">

                        <hr align="center" size="10" width="100%" color="#000000">
                        <h3>
                          Consultas Antienvejecimiento
                        </h3> -->

                        <!-- <?php
                          echo "SELECT * FROM  historiaClinica5 where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC";
                        $queryList3 = mysqli_query($conn3, "SELECT * FROM  historiaClinica5 where cliente_id = $clienteId and usuario_id = $usuarioId order by ID DESC");

                        $nrowl = mysqli_num_rows($queryList3);

                        while ($row_recordset323 = mysqli_fetch_array($queryList3)) {
                          $ID                 = $row_recordset323['ID'];
                          $Fecha                 = $row_recordset323['Fecha'];
                          $Hora                 = $row_recordset323['Hora'];
                          $planAtencion           = $row_recordset323['planAtencion'];
                          $tratamiento                  = $row_recordset323['tratamiento'];
                          $procedimiento        = $row_recordset323['procedimiento'];
                          $planAtencion           = $row_recordset323['planAtencion'];
                          $abono           = $row_recordset323['abono'];

                          $nota           = $row_recordset323['notas'];

                          $envejecimiento           = $row_recordset323['envejecimiento'];
                          $cirugia           = $row_recordset323['cirugia'];
                          $tratamientoResumen           = $row_recordset323['tratamientoResumen'];

                          $peso             = $row_recordset323['peso'];
                          $altura           = $row_recordset323['altura'];
                          $imc              = $row_recordset323['imc'];
                          $composicionCorporal           = $row_recordset323['composicionCorporal'];

                          $operador           = $row_recordset323['operador'];
                          $diagnostico5           = $row_recordset323['diagnostico5'];

                          $cirugia      = $row_recordset323['cirugia'];
                          $antecedentespf     = $row_recordset323['antecedentespf'];
                          $antecedentes     = $row_recordset323['antecedentes'];








                          $rSistema   = $row_recordset323['rSistema'];
                          $motivoConsulta = $row_recordset323['motivoConsulta'];
                          $usuario_id = $row_recordset323['usuario_id'];
                          $cliente_id = $row_recordset323['cliente_id'];
                          $cie = $row_recordset323['CIE10'];

                          $imagen = $row_recordset323['imagen'];
                          $notaImagen = $row_recordset323['notaImagen'];
                          $antP = $row_recordset323['antP'];
                          $antF = $row_recordset323['antF'];
                          $img11 = $row_recordset323['img11'];
                          $img12 = $row_recordset323['img12'];
                          $img13 = $row_recordset323['img13'];


                        ?>

                          <div class="panel box box-primary">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID ?>">
                                  Fecha <?php echo $Fecha . ' - ' . $Hora ?> | <strong> <?php echo $envejecimiento . ' ' . $cirugia ?>
                                    <a href="finalizadAntienvejecimiento.php?historiaClinica1=<?php echo $ID ?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a>
                                  </strong>
                                </a>
                              </h4>
                            </div>
                            <div id="<?php echo $ID ?>" class="panel-collapse collapse">
                              <div class="box-body">

                                <hr align="center" size="10" width="100%" color="#000000">

                                <div>
                                  <label>tratamiento <?php echo e_servicios($tratamiento) ?></label>
                                  <?php echo $descripcion ?>
                                </div>

                                <?php if ($abono > 0) : ?>
                                  <div>
                                    <strong> Abono </strong> <?php echo $abono ?>
                                  </div>
                                <?php endif ?>
                                <?php if ($imagen <> '') : ?>
                                  <div class="col-xs-12 center text-center">
                                    <h2><strong>Grafico</strong></h2>
                                    <img src="<?php echo $imagen ?>" style="width: 70%; height: auto;">
                                    <br>
                                    <strong> Notas Grafico: </strong>
                                    <p> <?php echo $notaImagen ?> </p>
                                    <hr>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($cie) > 0) : ?>

                                  <strong> Diagnóstico CIE10: </strong>
                                  <p> <?php echo $cie ?> </p>

                                <?php endif ?>

                                <?php if (strlen($envejecimiento) > 0) : ?>

                                  <strong> Tratamiento: </strong>
                                  <p> <?php echo $envejecimiento ?> </p>

                                <?php endif ?>


                                <?php if (strlen($motivoConsulta) > 0) : ?>

                                  <strong> Motivo consulta: </strong>
                                  <p> <?php echo $motivoConsulta ?> </p>

                                <?php endif ?>


                                <?php if (strlen($antecedentes) > 0) : ?>

                                  <strong>Antecedentes: </strong>
                                  <p> <?php echo $antecedentes ?> </p>

                                <?php endif ?>


                                <?php if (strlen($antecedentespf) > 0) : ?>

                                  <p> <?php echo $antecedentespf ?> </p>

                                <?php endif ?>

                                <?php if (strlen($tratamiento) > 0) : ?>

                                  <strong> $tratamiento </strong>
                                  <p> <?php echo  $tratamiento ?></p>

                                <?php endif ?>


                                <?php if (strlen($ComposicionCorpora) > 0) : ?>

                                  <strong> Composicion Corporal: </strong>
                                  <p> Peso: <?php echo $peso ?> Altura: <?php echo $altura ?> , <?php echo $ComposicionCorpora ?></p>

                                <?php endif ?>

                                <?php if (strlen($rSistema) > 0) : ?>

                                  <strong> Revisión por Sistema: </strong>
                                  <p><?php echo $rSistema ?> </p>

                                <?php endif ?>


                                <?php if ($peso > 0) : ?>
                                  <div>
                                    <strong> Peso: </strong> <?php echo e_servicios($peso) ?>
                                    <strong> altura: </strong> <?php echo e_servicios($altura) ?>
                                    <strong> IMC: </strong> <?php echo e_servicios($imc) ?>
                                    <strong> Composición Corporal: </strong> <?php echo e_servicios($composicionCorporal) ?>
                                  </div>
                                <?php endif ?>


                                <?php if (strlen($procedimiento) > 0) : ?>

                                  <strong> Procedimiento </strong>
                                  <p> <?php echo $procedimiento ?></p>

                                <?php endif ?>

                                <?php if (strlen($cirugia) > 0) : ?>

                                  <strong> cirugia </strong>
                                  <p> <?php echo  $cirugia ?></p>

                                <?php endif ?>
                                <?php if (strlen($diagnostico5) > 0) : ?>

                                  <strong> Diagnostico </strong>
                                  <p> <?php echo  $diagnostico5 ?></p>

                                <?php endif ?>

                                <?php if (strlen($planAtencion) > 0) : ?>

                                  <strong> Plan de Atención: </strong>
                                  <p> <?php echo $planAtencion ?> </p>

                                <?php endif ?>

                                <?php if (strlen($nota) > 0) : ?>

                                  <strong> Nota: </strong>
                                  <p><?php echo $nota ?> </p>

                                <?php endif ?>

                                <?php if ($img11 <> '') : ?>
                                  <div class="col-xs-4">
                                    <h3><strong><label>Antes:</label></strong></h3>
                                    <img src="historiaClinica5/<?php echo $img11 ?>" style="width: 100%; height: auto;">
                                  </div>
                                <?php endif ?>

                                <?php if ($img11 <> '') : ?>
                                  <div class="col-xs-4">
                                    <h3><strong><label>Durante:</label></strong></h3>
                                    <img src="historiaClinica5/<?php echo $img12 ?>" style="width: 100%; height: auto;">
                                  </div>
                                <?php endif ?>

                                <?php if ($img11 <> '') : ?>
                                  <div class="col-xs-4">
                                    <h3><strong><label>Despues:</label></strong></h3>
                                    <img src="historiaClinica5/<?php echo $img13 ?>" style="width: 100%; height: auto;">
                                  </div>
                                <?php endif ?>



                              </div>
                            </div>
                          </div>


                        <?php }  ?>



                      </div>
                    </div> -->
                    <!-- /.box-body -->
                  <!-- </div> -->
                  <!-- /.box -->
                <!-- </div> -->









              <!-- </div> -->
              <!-- /.tab-pane -->









              <div class="tab-pane" id="Examenes">
                <hr align="center" size="10" width="100%" color="#000000">
                <link type="text/css" rel="stylesheet" href="css/tabs.css" />

                <div class="page" style="background-color: aliceblue;padding: 20px;">
                  <!--<h1>Pure CSS Tabs</h1>  -->
                  <!-- tabs -->
                  <div class="pcss3t pcss3t-effect-scale pcss3t-theme-1">
                    <input type="radio" name="pcss3t" checked id="tab1" class="tab-content-first">
                    <label for="tab1"><i class="icon-bolt"></i>Archivos</label>

                    <input type="radio" name="pcss3t" id="tab2" class="tab-content-2">
                    <label for="tab2"><i class="icon-picture"></i>Carpetas</label>

                    <ul>
                      <li class="tab-content tab-content-first typography">
                        <h1 class="txt_rsp">Registro de Archivos</h1>

                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Nombre Archivo</th>
                              <th scope="col">Carpeta</th>
                              <th scope="col">Fecha</th>
                              <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download" aria-hidden="true"></i></th>
                              <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-picture-o" aria-hidden="true"></i></th>
                              <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId'");
                            $nrowlER = mysqli_num_rows($queryImg);
                            while ($resulImg = mysqli_fetch_array($queryImg)) {
                              $contador++;
                              $Producto = $resulImg['id'];

                            ?>
                              <tr>
                                <td>
                                  <?php echo $contador ?>
                                </td>
                                <td>
                                  <?php echo $resulImg['NombreVisual']; ?>
                                </td>
                                <td>
                                  <?php echo $resulImg['descripcion']; ?>
                                </td>
                                <td>
                                  <?php echo $resulImg['fecha']; ?>
                                </td>
                                <td style="text-align: center;">
                                  <a target="blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                    <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar Archivo
                                    </a>
                                  </a>
                                </td>
                                <td style="text-align: center;">
                                  <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                    <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver Archivo o Imagen <br>
                                    </a>
                                  </a>
                                </td>
                                <td style="text-align: center;">
                                  <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                    Enviar Archivo <br>
                                  </a>
                                </td>

                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>

                      </li><!-- cierre del primer modulo archivos -->

                      <li class="tab-content tab-content-2 typography">
                        <h1 class="txt_rsp">Registro de Carpetas</h1>



                        <table class="table table-responsive">
                          <thead>
                            <tr>
                              <th scope="col">#</th>
                              <th scope="col">Carpeta</th>
                              <th scope="col">Fecha</th>
                              <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-paper-plane-o" aria-hidden="true"></i></th>
                            </tr>
                          </thead>
                          <tbody>

                            <?php
                            $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' group by descripcion");

                            $nrowlER = mysqli_num_rows($queryarchivo);
                            while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                              $descripcion             = $resularchivo['descripcion'];

                            ?>





                              <tr>
                                <td>
                                  <?php echo $contador ?>
                                </td>
                                <td>
                                  <?php echo $descripcion; ?>
                                </td>
                                <td>
                                  <?php echo $resularchivo['fecha']; ?>
                                </td>
                                <!--   <th>
      
       <a target="blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                            <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'"download="Archivo">Descargar Archivo    
</a>  
                              </a>  

    </th>
    <th>
        <a target="_blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                                <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'" >Ver Archivo o Imagen     <br>
</a>  
                              </a> 

                            </th> -->
                                <td style="text-align: center;">
                                  <a target="_blank" href="<?php echo $Base; ?>enviarArchivoPaquete.php?cliente=<?php echo $clienteId; ?>&descripcion=<?php echo $descripcion; ?>">
                                    Enviar Archivos <br>
                                  </a>
                                </td>
                              </tr>

                            <?php } ?>
                          </tbody>
                        </table>



                      </li>


                    </ul>
                  </div>
                  <!--/ tabs -->







                </div>








              </div>



              <div class="tab-pane" id="Documentos">
                <hr align="center" size="10" width="100%" color="#000000">
                <h3>
                  Registros de exámenes </h3>

                <?php

                $queryList = mysqli_query($conn3, "SELECT * FROM  historiaImagen where cliente_id = $clienteId order by IM_id DESC");

                $nrowl = mysqli_num_rows($queryList);

                while ($row_recordset32 = mysqli_fetch_array($queryList)) {


                  $cliente_id                    = $row_recordset32['clienteid'];
                  $usuario_id                    = $row_recordset32['usuario_id'];
                  $usuario_id                    = $row_recordset32['usuario_id'];
                  $CODI_CLIENTE                  = $row_recordset32['CODI_CLIENTE'];
                  $Fecha                         = $row_recordset32['Fecha'];
                  $nombre_img                    = $row_recordset32['nombre_img'];

                  $Descripcion                    = $row_recordset32['Descripcion'];



                ?>





                <?php  } ?>








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