<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];
$historiaClinica = $_GET['historiaClinica'];
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
      <li><a href="#">Historial Evolución Control Prenatal</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="GO_Evolucion_HistoriaControlPrenatal.php?historiaClinica=<?php echo $historiaClinica?>&cliente=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva Evolucion de Control Prenatal </a>
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
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Evoluciones Controles Prenatales </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  

                        <?php 

                        $queryList=mysqli_query($conn3,"SELECT * FROM  Evoluciones_Historia_Control_Prenatal where  cliente_id = $clienteId and usuario_id = $usuarioId and id_historiaClinica='$historiaClinica' order by ID DESC");
                        while($rowMotorizado=mysqli_fetch_array($queryList))
                        {

                        $ID      =$rowMotorizado['ID'];
                        $cliente_id      =$rowMotorizado['cliente_id'];
                        $usuario_id      =$rowMotorizado['usuario_id'];
                        $Fecha           =$rowMotorizado['Fecha'];
                        $FechaRegistro           =$rowMotorizado['FechaRegistro'];
                        $Hora            =$rowMotorizado['Hora'];
                        $motivoConsulta  =$rowMotorizado['motivoConsulta'];
                        $semana_emabarazo  =$rowMotorizado['semana_emabarazo'];
                        $presion_arterial  =$rowMotorizado['presion_arterial'];
                        $pulso  =$rowMotorizado['pulso'];
                        $tempratura  =$rowMotorizado['tempratura'];
                        $peso  =$rowMotorizado['peso'];
                        $altura  =$rowMotorizado['altura'];
                        $frecuencia  =$rowMotorizado['frecuencia'];
                        $posicion  =$rowMotorizado['posicion'];
                        $presentacion  =$rowMotorizado['presentacion'];
                        $movimientos  =$rowMotorizado['movimientos'];
                        $edema  =$rowMotorizado['edema']; 

                        ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#EvolucionesControlPrenatal<?php echo $ID?>" aria-expanded="false" aria-controls="EvolucionesControlPrenatal<?php echo $ID?>">
                                    Fecha <?php echo $FechaRegistro; ?>

                                    <button onclick="window.location.href='GO_Evolucion_Finalizado.php?historiaClinica1=<?php echo $ID;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>

                                </a>
                                </h4>
                            </div>
                            <div id="EvolucionesControlPrenatal<?php echo $ID?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                <div class="panel-body">
                                <table>
                                    Fecha: <?php echo $Fecha; ?><br>
                                    Semana Embarazo:<?php echo $semana_emabarazo ?><br>
                                    Presión Arterial:<?php echo $presion_arterial ?><br>
                                    Pulso:<?php echo $pulso ?><br>
                                    Temperatura:<?php echo $tempratura ?><br>
                                    Peso:<?php echo $peso ?><br>
                                    Altura Uterina:<?php echo $altura ?><br>
                                    Frecuencia Cardíaca Fetal:<?php echo $frecuencia ?><br>
                                    Posición:<?php echo $posicion ?><br>
                                    Presentación:<?php echo $presentacion ?><br>
                                    Movimientos Fetales:<?php echo $movimientos ?><br>
                                    Edema:<?php echo $edema ?>
                                </table> 
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