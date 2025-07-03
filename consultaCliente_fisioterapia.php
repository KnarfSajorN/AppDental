<?php
include 'header.php';
include 'menu.php'; ?>

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

      $clienteId = $_GET['clienteId'];
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
        $telefono_cliente = $rowMotorizado['telefono_cliente'];
        $edad_cliente = $rowMotorizado['edad_cliente'];
        $profesion_cliente = $rowMotorizado['profesion_cliente'];
        $acompananteFamiliar = $rowMotorizado['acompananteFamiliar'];
        $telefono_acompanante = $rowMotorizado['telefono_acompanante'];
        $antecedentes = $rowMotorizado['antecedentes'];
        $fechaNacimiento = $rowMotorizado['fechaNacimiento'];
        $esDonante = $rowMotorizado['esDonante'];
        $entidadSalud = $rowMotorizado['entidadSalud'];
        $autorizacion = $rowMotorizado['autorizacion'];



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

            <br>
            <label><strong>Ciudad:</strong></label>
            <label><?php echo $ciudad_cliente; ?></label>

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
            <label><strong>Entidad de salud :</strong></label>
            <label><?php echo $entidadSalud; ?></label>

            <br>
            <label><strong> Numero de Autorizacion :</strong></label>
            <label><?php echo $autorizacion; ?></label>






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

            <br>


            <label><strong> Edad :</strong></label>
            <label><?php echo calculaedad($fechaNacimiento); ?></label>

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

            <br>
            <label><strong>Seguro :</strong></label>
            <label><?php echo $seguro; ?></label>



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




        <div class="form-group col-md-12">




        </div>




        <div align="center">
          <!--<a class="btn btn-primary" href="vercliente.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-eye"></i>  Ver completo</a>-->
          <a class="btn btn-primary" role="button" onclick="Agregar_Fecha_Hora(<?php echo $clienteId; ?>)"> <i class="fa fa-eye"></i> Ver completo</a>
          <!--<a class="btn btn-primary" role="button" onclick="Agregar_Fecha_Hora_2(<?php echo $clienteId; ?>)"> <i class="fa fa-eye"></i> Ver completo Evolucion</a>-->
          <a class="btn btn-primary" href="historiaClinica6_fisioterapia.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva consulta </a>
          <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar exámenes </a>
          <?php

          include 'estadoFacturaPresupuestoCliente.php';

          ?>

        </div>
        <br>

        <div class="col-md-12 col-xs-12">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#Consultas" data-toggle="tab">Consultas</a></li>
              <li><a href="#Examenes" data-toggle="tab">Registros de Archivos Imágenes</a></li>
              <li><a href="#ExamenesEcografias" data-toggle="tab">Registros de Ecografias</a></li>

              <!-- 
              <li><a href="#Documentos" data-toggle="tab">Registros de exámenes</a></li>
                <a class="btn btn-primary" href="historiaExamenes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i>  Agregar exámenes</a>
              -->
            </ul>


            <div class="tab-content">
              <div class="active tab-pane" id="Consultas">








                <div>
                  <div class="box box-solid">

                    <!-- /.box-header -->
                    <div class="box-body">
                      <div class="box-group" id="accordion">
                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->









                        <hr align="center" size="10" width="100%" color="#000000">
                        <h3>
                          Consultas
                        </h3>

                        <?php

                        $queryList = mysqli_query($conn3, "SELECT * FROM  historiaClinica6_fisioterapia  where cliente_id = $clienteId  order by ID DESC");

                        // echo   "SELECT * FROM historiaClinica6_fisioterapia  where cliente_id = $clienteId  order by ID DESC";

                        $nrowl = mysqli_num_rows($queryList);

                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                          $ID                 = $row_recordset32['id'];
                          $Fecha                 = $row_recordset32['Fecha'];
                          $Hora                  = $row_recordset32['Hora'];
                          $anamnesis       = $row_recordset32['anamnesis'];
                          $fisico_postural       = $row_recordset32['fisico_postural'];
                          $evaluacion_dolor       = $row_recordset32['evaluacion_dolor'];
                          $evaluacion_sensibilidad      = $row_recordset32['evaluacion_sensibilidad'];
                          $evaluacion_osteoarticular     = $row_recordset32['evaluacion_osteoarticular'];
                          $evaluacion_neuromuscular    = $row_recordset32['evaluacion_neuromuscular'];
                          //$evaluacion_marcha_equilibrio    = $row_recordset32['evaluacion_marcha_equilibrio'];      
                          //$actividad_motora_funcional    = $row_recordset32['actividad_motora_funcional'];
                          $CIE10    = $row_recordset32['CIE10'];
                          $solicitud_procedimiento    = $row_recordset32['solicitud_procedimiento'];
                          $orden_medica    = $row_recordset32['orden_medica'];
                          //$secuencial_historia =  $row_recordset32['secuencial_historia'];  




                        ?>



                          <div class="panel box box-primary">
                            <div class="box-header with-border">
                              <h4 class="box-title">
                                <a data-toggle="collapse" data-parent="#accordion" href="#<?php echo $ID ?>">
                                  Fecha <?php echo $Fecha . '-' . $Hora; ?> <a href="imprimirFisioterapia.php?historiaClinica1=<?php echo $ID ?>" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> | </a> <a href="imprimirSolicitudProcedimiento.php?historiaClinica1=<?php echo $ID ?>" title="Imprimir Solo Solicitud de Procedimientos" target="_blank"><i class="fa fa-folder-o"></i> | </a> <a href="imprimirOrdenMedica.php?historiaClinica1=<?php echo $ID ?>" title="Imprimir Solo la Orden Medica" target="_blank"><i class="fa fa-folder"></i> </a>| 




                              </h4>
                            </div>
                            <div id="<?php echo $ID ?>" class="panel-collapse collapse">
                              <div class="box-body">




                                <hr align="center" size="10" width="100%" color="#000000">

                                <div align="right">
                                  Fecha <?php echo $Fecha . '-' . $Hora ?>
                                </div>



                                <?php if (strlen($anamnesis) > 0) : ?>
                                  <div>

                                    <label> <?php echo $anamnesis ?></label>

                                  </div>
                                <?php endif ?>



                                <?php if (strlen($fisico_postural) > 0) : ?>
                                  <div>

                                    <label><?php echo $fisico_postural ?></label>
                                  </div>

                                <?php endif ?>


                                <?php if (strlen($evaluacion_dolor) > 0) : ?>
                                  <div>

                                    <label><?php echo $evaluacion_dolor ?></label>
                                  </div>
                                <?php endif ?>


                                <?php if (strlen($evaluacion_sensibilidad) > 0) : ?>
                                  <div>

                                    <label><?php echo $evaluacion_sensibilidad ?></label>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($evaluacion_osteoarticular) > 0) : ?>

                                  <div>

                                    <label><?php echo $evaluacion_osteoarticular ?></label>
                                  </div>


                                <?php endif ?>

                                <?php if (strlen($evaluacion_neuromuscular) > 0) : ?>
                                  <div>

                                    <label><?php echo $evaluacion_neuromuscular ?></label>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($CIE10) > 0) : ?>
                                  <div>

                                    <label><?php echo $CIE10 ?></label>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($solicitud_procedimiento) > 0) : ?>
                                  <div>

                                    <label><?php echo $solicitud_procedimiento ?></label>
                                  </div>
                                <?php endif ?>

                                <?php if (strlen($orden_medica) > 0) : ?>
                                  <div>

                                    <label><?php echo $orden_medica ?></label>
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




              <div class="tab-pane" id="Examenes">
                <hr align="center" size="10" width="100%" color="#000000">
                <h3> Registro de Archivos </h3>

                <table width="100%" border="1">
                  <tr>
                    <th class="tg-c3ow">Resultados</th>
                    <th class="tg-0pky"></th>
                    <th class="tg-0lax"></th>
                    <th class="tg-0lax"></th>
                  </tr>

                  <?php
                  $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId'");
                  $nrowlER = mysqli_num_rows($queryImg);
                  while ($resulImg = mysqli_fetch_array($queryImg)) {
                  ?>
                    <tr>
                      <th>

                        <?php echo $resulImg['codigo']; ?>

                      </th>
                      <th>
                        <?php echo $resulImg['fecha']; ?>


                      </th>
                      <th>

                        <a target="blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                          <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'" download="Archivo">Descargar Archivo
                          </a>
                        </a>

                      </th>
                      <th>
                        <a target="_blank" href="<?php echo $Base; ?>/archivos/<?php echo $resulImg['codigo']; ?>">
                          <a href="<?php echo $Base; ?>/archivos/'<?php echo $resulImg['codigo']; ?>'">Ver Archivo o Imagen <br>
                          </a>
                        </a>

                      </th>
                    </tr>






                  <?php } ?>

                </table>

              </div>












































              <!-- /.col -->
            </div>
          </div>
          <!--cerrar tab-->
        </div>
      
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>
<style type="text/css">
  .zoompopup {
    zoom: 1.5;
  }

  .swal2-container {
    width: 35% !important;
  }

  .swal2-close {
    align-self: auto !important;
  }
</style>
<script src="plugins/sweetalert2/sweetalert2.js"></script>
<script type="text/javascript">
  function Agregar_Fecha_Hora(clienteid) {

    const {
      value: text
    } = Swal.fire({
      customClass: 'zoompopup',
      toast: true,
      showCloseButton: true,
      icon: 'question',
      title: 'Rango de fechas para la impresion',
      html: '<label>Desde</label><br>' +
        '<input id="swal-input1" class="swal2-input input-lg" style="max-width: 100%;width: 95%;" type="date"><br>' +
        '<label>Hasta</label><br>' +
        '<input id="swal-input2" class="swal2-input input-lg" style="max-width: 100%;width: 95%;" type="date">',
      focusConfirm: false,
      preConfirm: () => {
        var contador = "0";
        var mensaje = "";
        if (document.getElementById('swal-input1').value == "") {
          mensaje += 'Falta asignar una fecha (Desde) <br>';
        } else {
          contador++;
        }

        if (document.getElementById('swal-input2').value == "") {
          mensaje += 'Falta asignar una fecha (Hasta) <br>';
        } else {
          contador++;
        }

        if (contador == "2") {
          window.location = 'vercliente_fisioterapia.php?clienteId=' + clienteid + '&desde=' + document.getElementById('swal-input1').value + '&hasta=' + document.getElementById('swal-input2').value;
        } else {
          Swal.showValidationMessage(mensaje);
        }
      }
    })

  }



  function Agregar_Fecha_Hora_1(cedula, clienteid, historia) {

    const {
      value: text
    } = Swal.fire({
      customClass: 'zoompopup',
      toast: true,
      showCloseButton: true,
      icon: 'question',
      title: 'Rango de fechas para la impresion',
      html: '<label>Desde</label><br>' +
        '<input id="swal-input1" class="swal2-input input-lg" style="max-width: 100%;width: 95%;" type="date"><br>' +
        '<label>Hasta</label><br>' +
        '<input id="swal-input2" class="swal2-input input-lg" style="max-width: 100%;width: 95%;" type="date">',
      focusConfirm: false,
      preConfirm: () => {
        var contador = "0";
        var mensaje = "";
        if (document.getElementById('swal-input1').value == "") {
          mensaje += 'Falta asignar una fecha (Desde) <br>';
        } else {
          contador++;
        }

        if (document.getElementById('swal-input2').value == "") {
          mensaje += 'Falta asignar una fecha (Hasta) <br>';
        } else {
          contador++;
        }

        if (contador == "2") {
          window.location = 'vercliente_externo.php?clienteId=' + clienteid + '&desde=' + document.getElementById('swal-input1').value + '&hasta=' + document.getElementById('swal-input2').value + '&historia=' + historia + '&cedula=' + cedula;
        } else {
          Swal.showValidationMessage(mensaje);
        }
      }
    })

  }

  function Agregar_Fecha_Hora_2(clienteid) {

    const {
      value: text
    } = Swal.fire({
      customClass: 'zoompopup',
      toast: true,
      showCloseButton: true,
      icon: 'question',
      title: 'Rango de fechas para la impresion',
      html: '<label>Desde</label><br>' +
        '<input id="swal-input1" class="swal2-input input-lg" style="max-width: 100%;width: 95%;" type="date"><br>' +
        '<label>Hasta</label><br>' +
        '<input id="swal-input2" class="swal2-input input-lg" style="max-width: 100%;width: 95%;" type="date">',
      focusConfirm: false,
      preConfirm: () => {
        var contador = "0";
        var mensaje = "";
        if (document.getElementById('swal-input1').value == "") {
          mensaje += 'Falta asignar una fecha (Desde) <br>';
        } else {
          contador++;
        }

        if (document.getElementById('swal-input2').value == "") {
          mensaje += 'Falta asignar una fecha (Hasta) <br>';
        } else {
          contador++;
        }

        if (contador == "2") {
          window.location = 'vercliente_evolucion.php?clienteId=' + clienteid + '&desde=' + document.getElementById('swal-input1').value + '&hasta=' + document.getElementById('swal-input2').value;
        } else {
          Swal.showValidationMessage(mensaje);
        }
      }
    })

  }
</script>