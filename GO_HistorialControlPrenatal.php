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
      <li><a href="#">Historial Control Prenatal</a></li>
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
            <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1" href="GO_HistoriaControlPrenatal.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nuevo Control Prenatal </a>

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
            <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Controles Prenatales </a></li>
          </ul>
          <!-- Tab panes -->
          <div class="tab-content tabs">
            <!-- inicio seccion 1 -->
            <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

              <!--inicio accordion-->
              <div class="col-md-12">
                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                  

                        <?php 

                        $queryList=mysqli_query($conn3,"SELECT * FROM  Historia_Control_Prenatal where cliente_id = '$clienteId' AND usuario_id='$usuarioId' ORDER BY id DESC");
                        $nrowl=mysqli_num_rows($queryList);
                        while($rowMotorizado=mysqli_fetch_array($queryList))
                        {
                        $id_control_prenatal = $rowMotorizado['id'];
                        $cliente_id = $rowMotorizado['cliente_id'];
                        $fecha = $rowMotorizado['Fecha'];


                        $sdg = $rowMotorizado['sdg'];
                        $peso = $rowMotorizado['peso'];
                        $ta = $rowMotorizado['ta'];
                        $fu = $rowMotorizado['fu'];
                        $labx = $rowMotorizado['labx'];
                        $dx = $rowMotorizado['dx'];
                        $tratamiento = $rowMotorizado['tratamiento'];
                        $ultima_mestruaccion = $rowMotorizado['ultima_mestruaccion'];
                        $probable = $rowMotorizado['probable'];
                        $dudas = $rowMotorizado['dudas'];
                        $tratamiento = $rowMotorizado['tratamiento'];
                        $vacunas = $rowMotorizado['vacunas'];
                        $internacion = $rowMotorizado['internacion'];
                        $mes_embarazo = $rowMotorizado['mes_embarazo'];
                        $dias = $rowMotorizado['dias'];
                        $gesta = $rowMotorizado['gesta'];
                        $abortos = $rowMotorizado['abortos'];
                        $parto = $rowMotorizado['parto'];
                        $ninguno = $rowMotorizado['ninguno'];
                        $vaginales = $rowMotorizado['vaginales'];
                        $cesarea = $rowMotorizado['cesarea'];
                        $hijosvivos = $rowMotorizado['hijosvivos'];
                        $hijosmuertos = $rowMotorizado['hijosmuertos'];
                        $viven = $rowMotorizado['viven'];
                        $mueren = $rowMotorizado['mueren'];
                        $mueren_semana = $rowMotorizado['mueren_semana'];
                        $recien_nacido = $rowMotorizado['recien_nacido'];
                        $fecha_terminacion = $rowMotorizado['fecha_terminacion'];
                        $pa = $rowMotorizado['pa'];
                        $edema = $rowMotorizado['edema'];
                        $varices = $rowMotorizado['varices'];
                        $presentacion = $rowMotorizado['presentacion'];
                        $tonos = $rowMotorizado['tonos'];
                        $au = $rowMotorizado['au'];
                        $cefalea = $rowMotorizado['cefalea'];
                        $semanas = $rowMotorizado['semanas'];
                        $medico = $rowMotorizado['medico'];
                        $hemoglobina = $rowMotorizado['hemoglobina'];
                        $tipaje = $rowMotorizado['tipaje'];
                        $rh = $rowMotorizado['rh'];
                        $orina = $rowMotorizado['orina'];
                        $vdrl = $rowMotorizado['vdrl'];
                        $glicemia = $rowMotorizado['glicemia'];
                        $alfafeto = $rowMotorizado['alfafeto'];
                        $citomega = $rowMotorizado['citomega'];
                        $usg = $rowMotorizado['usg'];
                        $combs = $rowMotorizado['combs'];
                        $miscelanos = $rowMotorizado['miscelanos'];
                        $pap = $rowMotorizado['pap'];
                        $toxoplasma = $rowMotorizado['toxoplasma'];
                        $rubela = $rowMotorizado['rubela'];
                        $observaciones = $rowMotorizado['observaciones'];
                        $antecedentesPers = $rowMotorizado['antecedentesPers'];
                        $antecedentesPersG = $rowMotorizado['antecedentesPersG'];   

                        ?>
                        <div class="panel panel-default" style="background: #f1f1f1;">
                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                <h4 class="panel-title">
                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#HistoriaControlPrenatal<?php echo $id_control_prenatal?>" aria-expanded="false" aria-controls="HistoriaControlPrenatal<?php echo $id_control_prenatal?>">
                                    Fecha <?php echo $fecha; ?>

                                    <button onclick="window.location.href='GO_FinalizadoControlPrenatal.php?historiaClinica1=<?php echo $id_control_prenatal;?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa-regular fa-rectangle-list"></i></button>

                                    <button onclick="window.location.href='GO_Evolucion_HistoriaControlPrenatal.php?historiaClinica=<?php echo $id_control_prenatal?>&cliente=<?php echo $clienteId?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-file" data-icon="gridicons:print"></i></button>
                                    <button onclick="window.location.href='GO_Evolucion_HistorialControlPrenatal.php?historiaClinica=<?php echo $id_control_prenatal?>&clienteId=<?php echo $clienteId?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fa fa-eye" data-icon="gridicons:print"></i></button>

                                </a>
                                </h4>
                            </div>
                            <div id="HistoriaControlPrenatal<?php echo $id_control_prenatal?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                <div class="panel-body">
                                <?php 

                                    echo 'Antecedentes Familiares<br>'.$antecedentesPers.'<br>';
                                    echo 'Antecedentes Personales Obstetricos<br>'.$antecedentesPersG.'<br>';
                                    echo 'Ultima Menstruación<br>'.$ultima_mestruaccion.'<br>';
                                    echo 'Probable Parto<br>'.$probable.'<br>';
                                    echo 'Dudas<br>'.$dudas.'<br>';
                                    echo 'Vacuna Antetica<br>'.$vacunas.'<br>';
                                    echo 'Internacion Embarazo<br>'.$internacion.'<br>';
                                    echo 'Mes embarazo<br>'.$mes_embarazo.'<br>';
                                    echo 'Días<br>'.$dias.'<br>';
                                    echo 'Gestaciones<br>'.$gesta.'<br>';
                                    echo 'Abortos<br>'.$abortos.'<br>';
                                    echo 'Partos<br>'.$parto.'<br>';
                                    echo 'Ninguno o mas de 3 Partos<br>'.$ninguno.'<br>';
                                    echo 'Vaginales<br>'.$vaginales.'<br>';
                                    echo 'Cesáreas<br>'.$cesarea.'<br>';
                                    echo 'Nac. vivos<br>'.$hijosvivos.'<br>';
                                    echo 'Nac. muertos<br>'.$hijosmuertos.'<br>';
                                    echo 'Viven<br>'.$viven.'<br>';
                                    echo 'Mueren<br>'.$mueren.'<br>';
                                    echo 'Mueren Después 1ra semana<br>'.$mueren_semana.'<br>';
                                    echo 'Algun Recien Nacido en peso menos de 2500 g<br>'.$recien_nacido.'<br>';
                                    echo 'Fecha Terminacion anterior embarazo<br>'.$fecha_terminacion.'<br>';
                                    echo 'P.A<br>'.$pa.'<br>';
                                    echo 'Peso<br>'.$peso.'<br>';
                                    echo 'Edema<br>'.$edema.'<br>';
                                    echo 'Varices<br>'.$varices.'<br>';
                                    echo 'Presentación<br>'.$presentacion.'<br>';
                                    echo 'Tonos Fetales<br>'.$tonos.'<br>';
                                    echo 'Au<br>'.$au.'<br>';
                                    echo 'Cefalea<br>'.$cefalea.'<br>';
                                    echo 'Semanas<br>'.$semanas.'<br>';
                                    echo 'Medico<br>'.$medico.'<br>';
                                    echo 'Hemoglobina<br>'.$hemoglobina.'<br>';
                                    echo 'Tipaje<br>'.$tipaje.'<br>';
                                    echo 'Rh<br>'.$rh.'<br>';
                                    echo 'Orina<br>'.$orina.'<br>';
                                    echo 'Vdrl<br>'.$vdrl.'<br>';
                                    echo 'Glicemia<br>'.$glicemia.'<br>';
                                    echo 'Alfafeto proteina<br>'.$alfafeto.'<br>';
                                    echo 'Citomegalovirus<br>'.$citomega.'<br>';
                                    echo 'U.S.G<br>'.$usg.'<br>';
                                    echo 'Combs R.B.N.S<br>'.$combs.'<br>';
                                    echo 'Miscelaneos<br>'.$miscelanos.'<br>';
                                    echo 'Pap<br>'.$pap.'<br>';
                                    echo 'Tóxoplasmosis<br>'.$toxoplasma.'<br>';
                                    echo 'Rubela<br>'.$rubela.'<br>';
                                    echo 'Observaciones<br>'.$observaciones.'<br>';

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