<?php
include 'header.php';
include 'menu.php';






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
      <li><a href="#">Paciente</a></li>


    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">

      <?php

      $clienteId = decrypt($_GET['cI']);

      $usuarioId = $_SESSION['ID'];
      $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

      $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");

      $nrowl = mysqli_num_rows($queryList);

      while ($rowMotorizado = mysqli_fetch_array($queryList)) {

        $usuario_id = $rowMotorizado['usuario_id'];
        $nombre_cliente = $rowMotorizado['nombre_cliente'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $ciudad_cliente = $rowMotorizado['ciudad_cliente'];
        $correo_cliente = $rowMotorizado['correo_cliente'];
        $CODI_CLIENTE = $rowMotorizado['CODI_CLIENTE'];
        $id_uso_servicio = $rowMotorizado['id_uso_servicio'];
        $tipo_cliente = $rowMotorizado['tipo_cliente'];
        $fechar = $rowMotorizado['fechar'];
        $fecha_actualizado = $rowMotorizado['fecha_actualizado'];
        $activo = $rowMotorizado['activo'];
        $genero = $rowMotorizado['genero'];
        $direccion_cliente = $rowMotorizado['direccion_cliente'];
        $telefono_cliente = $rowMotorizado['whatsapp'];
        $edad_cliente = $rowMotorizado['edad_cliente'];
        $profesion_cliente = $rowMotorizado['profesion_cliente'];
        $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
        $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
        $antecedentes = $rowMotorizado['antecedentes'];

        $esDonante = $rowMotorizado['esDonante '];
        $codigo_pais = $rowMotorizado['codigo_pais '];
        $tiposSangre = $rowMotorizado['tiposSangre'];
        $peso                     = $rowMotorizado['peso'];
        $altura                   = $rowMotorizado['altura'];
        $imc                          = $rowMotorizado['imc'];
        $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal'];
        $fotoperfil      = $rowMotorizado['fotoperfil'];
      }

      ?>





      <div class="card-body">
        <div class="box-body">



          <div class="col-md-5">

            <label><strong>Correo:</strong></label>
            <label> <?php echo $correo_cliente; ?> </label>


            <br>
            <label><strong>Nombre:</strong></label>
            <label><?php echo $nombre_cliente; ?> </label>


            <br>
            <label><strong>Celular:</strong></label>
            <label><?php echo $celular_cliente; ?></label>

            <!-- <br>
            <label><strong>Ciudad:</strong></label>
            <label><?php echo $ciudad_cliente; ?></label> -->

            <br>
            <label><strong>Fecha registro:</strong></label>
            <label><?php echo $fechar; ?></label>

            <br>
            <label><strong>Cedula o ID:</strong></label>
            <label><?php echo $CODI_CLIENTE; ?></label>

            <br>
            <label><strong> Es donante:</strong></label>
            <label><?php echo $esDonante; ?></label>

            <br>
            <!-- <label><strong>Entidad de salud :</strong></label>
            <label><?php echo $entidadSalud; ?></label> -->



          </div>

          <div class="col-md-5">
            <label><strong> Dirección cliente:</strong></label>
            <label><?php echo $direccion_cliente; ?></label>
            <br>
            <label><strong> Teléfono :</strong></label>
            <label><?php echo $telefono_cliente; ?></label>
            <br>

            <label><strong> Fecha de nacimiento :</strong></label>
            <label><?php echo $fechaNacimiento; ?></label>

            <!-- <br>


            <label><strong> Edad :</strong></label>
            <label><?php calculaedad($fechaNacimiento); ?></label> -->

            <br>

            <label><strong>Genero:</strong></label>
            <label><?php echo $genero; ?></label>

            <br>
            <label><strong>Profesión :</strong></label>
            <label><?php echo $profesion_cliente; ?></label>

            <br>
            <label><strong>Tipo de sangre :</strong></label>
            <label><?php echo $tiposSangre; ?></label>

            <br>

            <!-- <br>
            <label><strong>Seguro :</strong></label>
            <label><?php echo $seguro; ?></label> -->



          </div>

          <div class="col-md-2">

            <?php
            // echo strlen($logoF);
            if (strlen($fotoperfil) > 0) {
              echo '<img src="' . $Base . '/pascientes/' . $fotoperfil . '" width="90%" height="20%">';
            } else {

              echo '';
            }
            ?>

          </div>
          <br>


          <div class="col-md-12">
            <hr>
          </div>
          <div class="col-md-12">
            <div class="col-md-12">

              <label><strong>Toma algún medicamento:</strong></label>
              <label><?php echo $tomaMedicamento; ?></label>
            </div>
            <div class="form-group col-md-2" align="right">
              Alergias a las aines <?php echo sino($ap1) ?>
            </div>

            <div class="form-group col-md-2" align="right">
              Asma <?php echo sino($ap2) ?>

            </div>

            <div class="form-group col-md-2" align="right">
              HTA <?php echo sino($ap3) ?>
            </div>

            <div class="form-group col-md-2" align="right">
              Diabetes <?php echo sino($ap4) ?>

            </div>

            <div class="form-group col-md-2" align="right">
              Hipotiroidismo <?php echo sino($ap5) ?>

            </div>

            <div class="form-group col-md-2" align="right">
              Tabaquismo <?php echo sino($ap6) ?>

            </div>

            <div class="form-group col-md-2" align="right">
              Licor <?php echo sino($ap7) ?>

            </div>

            <div class="form-group col-md-2" align="right">
              Otras Alergias <?php echo sino($ap8) ?>

            </div>

            <div class="form-group col-md-2" align="right">
              Cirugías <?php echo sino($ap9) ?>

            </div>
          </div>


          <div class="form-group col-md-12">




            <label><strong>Antecedentes Familiares:</strong></label>
            <label><?php echo $antecedentes; ?></label>.
            <br>
            <label><strong>Alergias :</strong></label>
            <label><?php echo $alergias; ?></label>

            <br>

            <label><strong>Notas adicionales :</strong></label>
            <label><?php echo $nota; ?></label>.

          </div>





        </div>



        <div align="center">
          <a class="btn btn-primary" href="historiaClinica2_v2.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Tratamiento </a>

          <a class="btn btn-primary" href="historiaClinica5_v2.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Consulta </a>


          <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar exámenes </a>

        </div>
        <br>

        <div class="col-md-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Tratamientos</a></li>
              <li><a href="#Examenes" data-toggle="tab">Registros de exámenes</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
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
                          Consultas Tratamientos
                        </h3>

                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * FROM  e_tratamiento where idCliente = $clienteId and idUsuario = $usuarioId order by ID DESC");

                        $nrowl = mysqli_num_rows($queryList);

                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                          $ID                 = $row_recordset32['id'];
                          $fechaHora                 = $row_recordset32['fechaHora'];
                          $tratamiento                  = $row_recordset32['tratamiento'];
                          $procedimiento        = $row_recordset32['procedimiento'];
                          $planAtencion           = $row_recordset32['planAtencion'];
                          $abono           = $row_recordset32['abono'];

                          $nota           = $row_recordset32['nota'];

                          $descripcion           = $row_recordset32['descripcion'];

                          $peso           = $row_recordset32['peso'];
                          $altura           = $row_recordset32['altura'];
                          $imc           = $row_recordset32['imc'];
                          $composicionCorporal           = $row_recordset32['composicionCorporal'];

                          $operador           = $row_recordset32['operador'];



                        ?>

                          <div class="panel box box-primary">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID ?>">
                                  Fecha <?php echo $fechaHora ?> | <strong> <?php echo e_servicios($tratamiento) ?> |
                                    <a href="finalizadoTratamiento.php?historiaClinica1=<?php echo $ID ?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </a> </strong>
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

                                <?php if ($peso > 0) : ?>
                                  <div>
                                    <strong> Peso: </strong> <?php echo $peso?>
                                    <strong> altura: </strong> <?php echo $altura?>
                                    <strong> IMC: </strong> <?php echo $imc ?>
                                    <strong> Composición Corporal: </strong> <?php echo $composicionCorporal?>
                                  </div>
                                <?php endif ?>


                                <?php if (strlen($procedimiento) > 0) : ?>
                                  <div>
                                    <strong> Procedimiento: </strong> <?php echo $procedimiento ?>
                                  </div>
                                <?php endif ?>


                                <?php if (strlen($planAtencion) > 0) : ?>
                                  <div>
                                    <strong> Plan de Atención: </strong> <?php echo $planAtencion ?>
                                  </div>
                                <?php endif ?>


                                <?php if (strlen($nota) > 0) : ?>
                                  <div>
                                    <strong> Nota: </strong> <?php echo $nota ?>
                                  </div>
                                <?php endif ?>


                                <br>
                                <strong> Operador: <?php echo $operador ?></strong>



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