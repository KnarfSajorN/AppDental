<?php
include '../header.php';
include '../menu.php';
$ID_principal = $_SESSION['ID_principal'];
// function limpiarNombreHistoria($nombre)
// {
//     // Expresión regular para encontrar las palabras "Historia", "historia" y "historias"
//     $patron = '/\b(?:Historia de|Historias de|historia de|historias de|Historia|Historias|historia|historias|)\b/i';

//     // Reemplazar las palabras encontradas por una cadena vacía
//     $nombre_limpiado = preg_replace($patron, '', $nombre);

//     return $nombre_limpiado;
// }

// $idHistoria = ($_GET['iCr'] != '' ? decrypt($_GET['iCr']) : $_GET['idHistoria']);
// $queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
// while ($rowhc = mysqli_fetch_array($queryListhc)) {
//     $Nombre_HistoriaCreador_Limpio = limpiarNombreHistoria($rowhc['nombre']);
// }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Historial del Paciente
        </h1>
        <!-- <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Paciente</a></li>
        

      </ol> -->
    </section>
    <style>
        /* Boton sucess */
        .css-button-sharp--green {
            min-width: 130px;
            height: 40px;
            color: #fff;
            padding: 5px 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            display: inline-block;
            outline: none;
            border: 2px solid #117a8b;
            background: #117a8b;
            border-radius: 30px;
        }

        .css-button-sharp--green:hover {
            background: #fff;
            color: #117a8b
        }
    </style>
    <!-- Main content -->
    <section class="content">
        <div class="">

            <?php

            $clienteId = ($_GET['cI'] != '' ? decrypt($_GET['cI']) : $_GET['clienteId']);
            $idHistoria = ($_GET['iCr'] != '' ? decrypt($_GET['iCr']) : $_GET['idhb']);
            $usuarioId = $_SESSION['ID'];
            $ID_principal = $_SESSION['ID_principal'];
            $cliente_id_modulo = $clienteId; //Evoluciones




            ?>





            <div class="card-body">
                <div class="box box-body">


                    <?php echo datosPacientes($clienteId); ?>


                    <div align="center">


                    </div>

                </div>






                <br>






                <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="tab" role="tabpanel">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation"><a href="#Consultas" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Odontología</a></li>
                                    <li role="presentation"><a href="#Plan" aria-controls="home" role="tab" data-toggle="tab" class=""> <i class='fas fa-book-medical' style='font-size:26px'> </i> Plan de Tratamiento</a></li>
                                    <li role="presentation"><a href="#Procedimientos" aria-controls="home" role="tab" data-toggle="tab" class=""> <i class='fas fa-book-medical' style='font-size:26px'> </i> Procedimientos</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content tabs">


                                    <!-- inicio seccion 1 -->
                                    <div role="tabpanel" class="tab-pane fade in active show" id="Consultas">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                                <?php

                                                $Tabla = 'Historia_ClinicaBo';
                                                $queryConsulta = mysqli_query($conn3, "SELECT * FROM  {$Tabla} where cliente_id = $clienteId order by id asc");
                                                $nrowl = mysqli_num_rows($queryConsulta);
                                                while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {

                                                    $ID = $rowConsulta['id'];
                                                    $fecha = $rowConsulta['fechaRegistro'];
                                                    $activo = $rowConsulta['activo'];
                                                    if ($activo == 0) { 
                                                        continue; 
                                                    }


                                                ?>

                                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button">
                                                                    Fecha <?php echo $fecha ?>
                                                                    <button title="Ver Finalizado" onclick="window.open('PT_FinalizadoHistoria?FAID=<?= base64_encode($ID) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
                                                                    </button>
                                                                    |

                                                                    <button title="Editar Historia" onclick="window.open('PT_Historia_Clinica_Editar?cI=<?= encrypt($clienteId) ?>&id=<?= encrypt($ID) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fas fa-pencil"></i>
                                                                    </button>
                                                                    <!-- <button title="Editar Historia" onclick="window.open('PT_Historia_Clinica?clienteId=<?= $clienteId ?>&FAID=<?= base64_encode($ID) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fas fa-pencil"></i>
                                                                    </button> -->



                                                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Nota de Evolución"><i class="fa fa-file"></i></button>

                                                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Nota de Evolución"><i class="fa fa-eye"></i></button>


                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                        </div>
                                                    </div>


                                                <?php } ?>

                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                                    <!-- cierre seccion 1-->

                                    <!-- inicio seccion 2 -->
                                    <div role="tabpanel" class="tab-pane fade" id="Plan">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                                <?php
                                                $contador = 1;
                                                $queryConsulta = mysqli_query($conn3, "SELECT * FROM  planesTratamiento where idCliente = $clienteId  and ID_principal = $ID_principal order by id asc");
                                                $nrowl = mysqli_num_rows($queryConsulta);
                                                while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {

                                                    $ID = $rowConsulta['id'];
                                                    $fecha = $rowConsulta['fecha'];




                                                ?>

                                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button">
                                                                    No. <?= $contador  ?> |
                                                                    Fecha <?php echo $fecha ?>
                                                                    <button title="Ver Plan de Tratamiento" onclick="window.open('PT_finalizadoPlan?idCliente=<?= $clienteId ?>&FAID=<?= base64_encode($ID) ?>&idP=<?= $ID_principal ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
                                                                    </button>
                                                                    | <?php
                                                                        if ($rowConsulta['abierto'] == 1) { ?>
                                                                        <button title="Editar Plan de Tratamiento" onclick="window.open('PT_NuevoPlanTratamiento?clienteId=<?= $clienteId ?>&FAID=<?= base64_encode($ID) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa fa-pencil"></i>
                                                                        </button>
                                                                    <?php
                                                                        }
                                                                    ?>
                                                                </a>





                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                        </div>
                                                    </div>


                                                <?php
                                                    $contador++;
                                                } ?>

                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                                    <!-- cierre seccion 2-->

                                    <!-- inicio seccion 3 -->
                                    <div role="tabpanel" class="tab-pane fade" id="Procedimientos">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                                <?php
                                                $contador = 1;
                                                $queryConsulta1 = mysqli_query($conn3, "SELECT * FROM  planesProcedimiento where idCliente = $clienteId  and ID_principal = $ID_principal order by id asc");
                                                $nrowl2 = mysqli_num_rows($queryConsulta1);
                                                while ($rowConsulta1 = mysqli_fetch_array($queryConsulta1)) {

                                                    $IDproc = $rowConsulta1['id'];
                                                    $asd = $rowConsulta1['fecha'];




                                                ?>

                                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button">
                                                                    No. <?= $contador  ?> |
                                                                    Fecha 2 <?= $asd ?>
                                                                    <button title="Ver Procedimientos Plan de Tratamiento" onclick="window.open('PT_procedimientosPlan?FAID=<?= base64_encode($IDproc) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa fa-pencil"></i>
                                                                    </button> |
                                                                    <button title="Imprimir Procedimientos Plan de Tratamiento" onclick="window.open('PT_finalizadoProcedimientos?FAID=<?= base64_encode($IDproc) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa fa-eye"></i>
                                                                    </button>

                                                                </a>





                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $IDproc ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                        </div>
                                                    </div>


                                                <?php
                                                    $contador++;
                                                } ?>

                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include '../footer.php';

?>