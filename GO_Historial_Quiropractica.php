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
      <li><a href="#">Historial Quiropráctica</a></li>
    </ol>
  </section>

  <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="card-body">
        <div class="box">
          <?php echo datosPacientes($clienteId); ?>
          <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="GO_Quiropractica.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Quiropráctica</a>

            <?php
            include 'estadoFacturaPresupuestoCliente.php';

            $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
            include 'IncludeBotonesHistorialHistorias.php'; 
            ?>
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
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias Quiroprácticas</a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  

                        <?php 

                        $queryList=mysqli_query($conn3,"SELECT * FROM Historia_Quiropractica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' ORDER BY id DESC");
                        $nrowl=mysqli_num_rows($queryList);
                        while($rowMotorizado=mysqli_fetch_array($queryList))
                        {
                        $id_control = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['Fecha'];


        $razon_primaria                = $rowMotorizado['razon_primaria'];
        $razon_secundaria                   = $rowMotorizado['razon_secundaria'];
        $localizacion                  = $rowMotorizado['localizacion'];
        $malestar                    = $rowMotorizado['malestar'];
        $calidad                    = $rowMotorizado['calidad'];
        $area                    = $rowMotorizado['area'];
        $entumecimiento                    = $rowMotorizado['entumecimiento'];
        $intensidad                    = $rowMotorizado['intensidad'];
        $frecuencia                    = $rowMotorizado['frecuencia'];
        $agrada_malestar                    = $rowMotorizado['agrada_malestar'];
        $nota                    = $rowMotorizado['nota'];
        $intensidad_dolor                    = $rowMotorizado['intensidad_dolor'];
        $sueno                    = $rowMotorizado['sueno'];
        $cuidados                    = $rowMotorizado['cuidados'];
        $desplazamiento                    = $rowMotorizado['desplazamiento'];
        $trabajo                    = $rowMotorizado['trabajo'];
        $recreacion                    = $rowMotorizado['recreacion'];
        $frecuencia_dolor                   = $rowMotorizado['frecuencia_dolor'];
        $levantamiento                    = $rowMotorizado['levantamiento'];
        $caminata                    = $rowMotorizado['caminata'];
        $actitud                    = $rowMotorizado['actitud'];
        $total                   = $rowMotorizado['total'];
        $indice                    = $rowMotorizado['indice'];   

                        ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaQuiropractica<?php echo $id_control?>" aria-expanded="false" aria-controls="HistoriaQuiropractica<?php echo $id_control?>">
                                    Fecha <?php echo $fecha; ?>

                                    <button onclick="window.location.href='GO_FinalizadoQuiropractica.php?historiaClinica1=<?php echo $id_control;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list"></i></button>

                                </a>
                                </h4>
                            </div>
                            <div id="HistoriaQuiropractica<?php echo $id_control?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                <div class="panel-body">
                                

                                <?php if ($razon_primaria) : ?>
                                <p><b>Razón(es) Primaria (as) Para Buscar Consulta Quiropráctica</b></p>
                                <?= $razon_primaria ?><br>
                                <?php endif; ?>

                                <?php if ($razon_secundaria) : ?>
                                <p><b>Razón Secundaria</b></p>
                                <?= $razon_secundaria ?><br>
                                <?php endif; ?> 

                                <?php if ($localizacion) : ?>
                                <p><b>Localización del Malestar</b></p>
                                <?= $localizacion ?><br>
                                <?php endif; ?> 

                                <?php if ($malestar) : ?>
                                <p><b>¿Cómo y Cuándo Comienza el Malestar?</b></p>
                                <?= $malestar ?><br>
                                <?php endif; ?> 

                                <?php if ($calidad) : ?>
                                <p><b>Calidad del Dolor/Queja</b></p>
                                <?= $calidad ?><br>
                                <?php endif; ?> 

                                <?php if ($area) : ?>
                                <p><b>La Queja/Dolor se Irradia o Viaja a Otra Area de su Cuerpo?, ¿Cúal Área?</b></p>
                                <?= $area ?><br>
                                <?php endif; ?> 

                                <?php if ($entumecimiento) : ?>
                                <p><b>¿Tiene Algún Entumecimiento en su Cuerpo?, ¿Donde?</b></p>
                                <?= $entumecimiento ?><br>
                                <?php endif; ?> 

                                <?php if ($intensidad) : ?>
                                <p><b>Grado de la Intensidad/Severidad del Dolor, de 0 (Ninguna Queja/Dolor) Hasta 10 (El Peor Dolor/Queja Imaginable)</b></p>
                                <?= $intensidad ?><br>
                                <?php endif; ?> 

                                <?php if ($frecuencia) : ?>
                                <p><b>¿Con que Frecuencia Siente el Dolor?, ¿Cuánto Duró la Última vez que Ocurrió?</b></p>
                                <?= $frecuencia?><br>
                                <?php endif; ?> 

                                <?php if ($agrada_malestar) : ?>
                                <p><b>¿Algo Agrava el Malestar?</b></p>
                                <?= $agrada_malestar ?><br>
                                <?php endif; ?> 

                                <?php if ($nota) : ?>
                                <p><b>Intervenciones previas, Tratamientos, Medicaciones, Cirugías u Otros Xuidados que Usted Haya Buscado Para su Malestar</b></p>
                                <?= $nota?><br>
                                <?php endif; ?> 

                                <?php if ($intensidad_dolor) : ?>
                                <p><b>Intensidad de Dolor</b></p>
                                <?= $intensidad_dolor ?><br>
                                <?php endif; ?> 

                                <?php if ($sueno) : ?>
                                <p><b>Sueño</b></p>
                                <?= $sueno ?><br>
                                <?php endif; ?> 

                                <?php if ($cuidados) : ?>
                                <p><b>Cuidados Personales (Baños, Vestimenta, etc.)</b></p>
                                <?= $cuidados ?><br>
                                <?php endif; ?> 

                                <?php if ($desplazamiento) : ?>
                                <p><b>Desplazamiento (Conducción, etc.)</b></p>
                                <?= $desplazamiento ?><br>
                                <?php endif; ?> 

                                <?php if ($trabajo) : ?>
                                <p><b>Trabajo</b></p>
                                <?= $trabajo ?><br>
                                <?php endif; ?>

                                <?php if ($recreacion) : ?>
                                <p><b>Recreación</b></p>
                                <?= $recreacion ?><br>
                                <?php endif; ?> 

                                <?php if ($frecuencia_dolor) : ?>
                                <p><b>Frecuencia del Dolor</b></p>
                                <?= $frecuencia_dolor ?><br>
                                <?php endif; ?> 

                                <?php if ($levantamiento) : ?>
                                <p><b>Levantamiento</b></p>
                                <?= $levantamiento ?><br>
                                <?php endif; ?> 

                                <?php if ($caminata) : ?>
                                <p><b>Caminata</b></p>
                                <?= $caminata ?><br>
                                <?php endif; ?> 

                                <?php if ($actitud) : ?>
                                <p><b>Actitud de Pie</b></p>
                                <?= $actitud ?><br>
                                <?php endif; ?> 

                                <?php if ($total) : ?>
                                <p><b>Total</b></p>
                                <?= $total?><br>
                                <?php endif; ?> 

                                <?php if ($indice) : ?>
                                <p><b>Índice de evaluación funcional</b></p>
                                <?= $indice?><br>
                                <?php endif; ?> 
                                      
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

<script>
$(document).ready(function() {
  var table = $('#TablaOdontograma').DataTable({
    "language": {
            "url": "plugins/DataTablesK2/Es.json"
      },
    searchPanes: {
        viewCount: true,
        cascadePanes: true,
        initCollapsed: false,
        show:true
      },
    dom: 'Plfrtip',
    columnDefs: [{
                searchPanes: {
                    show: true
                },
                targets: [0,4,5]
            },
            {
                searchPanes: {
                    show: false
                },
                targets: [1,2,3,6]
            }
        ]
  });


});
</script>