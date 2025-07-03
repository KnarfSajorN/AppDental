<?php
include 'header.php';
include 'menu.php';

$usuario_id = $_SESSION['ID'];
$cliente_id = decrypt($_GET['cliente_id']);
$historia_id = decrypt($_GET['historia_id']);
$tabla = decrypt($_GET['tabla']);

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
      <li><a href="#">Evoluciones </a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($cliente_id); ?>
          <div align="center">
            <br>
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
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Evoluciones </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  

                        <?php 

                        $queryList = mysqli_query($conn3, "SELECT * FROM  Evoluciones_Generales where  cliente_id = $cliente_id and usuario_id = $usuario_id and id_historiaClinica='$historia_id' and tabla='$tabla' AND Activo='1' order by id DESC");
                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                        $evoluciones_id      = $rowMotorizado['id'];
                        $cliente_id      = $rowMotorizado['cliente_id'];
                        $usuario_id      = $rowMotorizado['usuario_id'];
                        $Fecha           = $rowMotorizado['Fecha'];
                        $Hora            = $rowMotorizado['Hora'];
                        $motivoConsulta  = $rowMotorizado['motivoConsulta'];
                        $evolucion_id_anterior  = $rowMotorizado['evolucion_id_anterior'];
                        if (is_numeric($evolucion_id_anterior)) {
                          continue;
                        }

                        $QueryImagesEvolutions  = "SELECT ruta FROM image_evolutions WHERE evolucion_id = '$evoluciones_id'";
                        $ResultImagesEvolutions = mysqli_query($conn3, $QueryImagesEvolutions);


                        ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Evoluciones<?php echo $evoluciones_id?>" aria-expanded="false" aria-controls="Evoluciones<?php echo $evoluciones_id?>">
                                    Fecha <?php echo $Fecha." - ".$Hora; ?>
                                    <button onclick="window.open('EV_ImprimirEvolucion.php?id=<?php echo encrypt($evoluciones_id); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                    <button onclick="window.open('EV_EditarEvolucion.php?id=<?php echo encrypt($evoluciones_id); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fas fa-marker"></i></button>
                                </a>
                                </h4>
                            </div>
                            <div id="Evoluciones<?php echo $evoluciones_id?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                <div class="panel-body">
                                <?php ?>

                                <hr align="center" size="10" width="100%" color="#000000">

                                  <div align="right">
                                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                                  </div>

                                  <table class="table">
                                    <tbody>
                                      <tr>
                                        <th class="text-center"> <h6>Nota de Evolución</h6> </td>
                                      </tr>
                                      <tr>
                                        <td>  <?= $motivoConsulta ?></td>
                                      </tr>

                                    </tbody>
                                  </table>


                                  <?php
                                        if ($ResultImagesEvolutions) {
                                          if (mysqli_num_rows($ResultImagesEvolutions) > 0) { ?>
                                            <h6 class="text-center">Imagenes</h6>
                                            <div id="list-images" class="my-3">
                                                <?php 
                                                foreach ($ResultImagesEvolutions as $Row) {
                                                  $path =  $Row['ruta'];?>
                                                  <div class="preview-item">
                                                    <img src="<?=$path?>" alt="">
                                                  </div>
                                                <?php }
                                                ?>
                                            </div>
                                          <?php }
                                        }
                                      ?> 
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



<style>
    #list-images {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
        margin-top: 10px;
    }

    .preview-item {
        position: relative;
        display: inline-block;
    }

    .preview-item img {
        width: 250px;
        height: 250px;
        object-fit: cover;
        border-radius: 5px;
        border: 1px solid #ddd;
    }

</style>