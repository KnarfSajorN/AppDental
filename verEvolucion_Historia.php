<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Paciente

    </h1>
    <!-- <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Paciente</a></li>


    </ol> -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="">

      <?php
      $usuarioId = $_SESSION['ID'];

      $clienteId = $_GET['cliente'];
      $historiaClinica = $_GET['historiaClinica'];

      if ($idHistoria == '') {
        $idHistoria = 0;
      }






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




        $peso                     = $rowMotorizado['peso'];
        $altura                   = $rowMotorizado['altura'];
        $imc                          = $rowMotorizado['imc'];
        $ComposicionCorporal      = $rowMotorizado['ComposicionCorporal'];
        $fotoperfil      = $rowMotorizado['fotoperfil'];

        $apell_cliente = $rowMotorizado['apell_cliente'];
        $apellido_cliente = $rowMotorizado['apellido_cliente'];
        $celular_cliente = $rowMotorizado['celular_cliente'];
        $nombre_cliente1 = $rowMotorizado['nombre_cliente1'];
      }

      ?>


<link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />


      <div class="card-body">
        <div class="box-body">



          <?php echo datosPacientes($clienteId); ?>





          <div class="col-md-12">

            <!--<a class="btn btn-primary" href="testCoronavirus.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i>  Nuevo Test </a>-->



          </div>
          <br>


  <div class="box-body">
    <div class="row">
      <div class="col-md-12">
        <div class="tab" role="tabpanel">
          <!-- Nav tabs -->
          <ul class="nav nav-tabs" role="tablist">
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Evoluciones </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  <hr align="center" size="10" width="100%" color="#000000">
                  <h3>
                    Evoluciones
                  </h3>


                  <?php

                          $queryList = mysqli_query($conn3, "SELECT * FROM  evoluciones where  cliente_id = $clienteId and usuario_id = $usuarioId and id_historiaClinica='$historiaClinica' order by ID DESC");

                          $nrowl = mysqli_num_rows($queryList);
                          while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                            $ID      = $rowMotorizado['ID'];
                            $cliente_id      = $rowMotorizado['cliente_id'];
                            $usuario_id      = $rowMotorizado['usuario_id'];
                            $Fecha           = $rowMotorizado['Fecha'];

                            $Hora            = $rowMotorizado['Hora'];
                            $motivoConsulta  = $rowMotorizado['motivoConsulta'];

                            ?>

                            <div class="panel panel-default" style="background: #f1f1f1;">
                              <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                  <h4 class="panel-title">
                                  <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Evoluciones<?php echo $ID?>" aria-expanded="false" aria-controls="Evoluciones<?php echo $ID?>">
                                      Fecha <?php echo $Fecha." - ".$Hora; ?>
                                      <button onclick="window.open('finalizadoEvolucion?iC=<?php echo encrypt($ID); ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                  </a>
                                  </h4>
                              </div>
                              <div id="Evoluciones<?php echo $ID?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                  <div class="panel-body">

                                  <hr align='center' size='10' width='100%' color='#000000'>

                                  <div align="right">
                                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                                  </div>

                                  <table>

                                    <?php echo "Nota de Evolución: <br> ".$motivoConsulta ?>


                                  </table>

                                  <?php if (strlen($laboratorio) > 0 or strlen($laboratorio) > 0 or strlen($laboratorio) > 0) : ?>
                                    <hr>
                                    <div align="center"> Exámenes a Realizar </div>


                                  <?php endif ?>


                                  <?php
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

        </div>
        <!-- cierre tab-->
      </div>
    <!-- cierre col-md-12-->
  </div>
  <!-- cierre row-->
</div>
 <!-- cierre box-body-->

  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include 'footer.php';

?>