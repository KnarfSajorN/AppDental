<?php
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$usuarioId = $_SESSION['ID'];

$idHistoria = decrypt($_GET['iCr']);
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
            <li><a href="#">Historial Ortodoncia</a></li>
        </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); $Cliente_id = $clienteId; ?>
                    
                    <div align="center">
                        <a class="col-md-3 btn btn-outline-info rounded-pill shadow m-1"
                            href="Historia_Ortodoncia?clienteId=<?php echo $clienteId; ?>" role="button"> <i
                                class="fa fa-heartbeat"></i> Nueva Consulta Ortodoncia </a>
                        <?php
                            $clienteId = $_GET['clienteId'];
                            $idHistoria = 51;
                            $usuarioId = $_SESSION['ID'];
                            $cliente_id_modulo = $clienteId;
                            echo '<a class="col-md-3 btn btn-outline-info rounded-pill shadow m-1" href="cHistoria?cI=' . encrypt($clienteId) . '&iCr=' . encrypt($idHistoria) . '" title="Agregar Consulta para ' . $nombreH . '" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta Odontología </a>';
                        ?>
                        <?php
                            $clienteId = $_GET['clienteId'];
                            $idHistoria = 52;
                            $usuarioId = $_SESSION['ID'];
                            $cliente_id_modulo = $clienteId;
                            echo '<a class="col-md-3 btn btn-outline-info rounded-pill shadow m-1" href="cHistoria?cI=' . encrypt($clienteId) . '&iCr=' . encrypt($idHistoria) . '" title="Agregar Consulta para ' . $nombreH . '" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta Periodoncia </a>';
                        ?>
                        <?php
                            $clienteId = $_GET['clienteId'];
                            $idHistoria = 54;
                            $usuarioId = $_SESSION['ID'];
                            $cliente_id_modulo = $clienteId;
                            echo '<a class="col-md-3 btn btn-outline-info rounded-pill shadow m-1" href="cHistoria?cI=' . encrypt($clienteId) . '&iCr=' . encrypt($idHistoria) . '" title="Agregar Consulta para ' . $nombreH . '" role="button"> <i class="fa fa-heartbeat"></i>  Nueva Consulta Endodoncia </a>';
                        ?>
                        <a class="col-md-3 btn btn-outline-info rounded-pill shadow m-1"
                            href="anexosPaciente?clienteId=<?php echo $clienteId; ?>" role="button"><i
                                class="fa fa-folder-open-o"></i> Agregar Exámenes </a>
                        

                        
                        <?php
                        $claseAdicionalPresupuesto = "col-md-3 btn btn-outline-info rounded-pill shadow m-1"; // Clase específica para esta vista
                        include 'estadoFacturaPresupuestoCliente.php';

                        $Cliente_id = $clienteId;
                        $FacturacionTipo = "OD_GenerarFactura?clienteId={$Cliente_id}";

                        // Clase adicional para los botones en esta vista
                        $claseAdicional = "col-md-3 btn btn-outline-info rounded-pill shadow m-1";

                        include 'IncludeBotonesHistorialHistorias.php';
                        ?>


                       

                        <a class="col-md-3 btn btn-outline-info rounded-pill shadow m-1" href="OD_Odontograma?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Actualizar Odontograma </a>
                        <a href="OD_Impresion?clienteId=<?=$clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                            <button class="col-md-3 btn btn-outline-info rounded-pill shadow m-1 ">
                                <strong> <i class="fa-solid fa-teeth"></i> Imprimir Odontograma </strong>
                            </button>
                        </a>

                         <!-- Botón para abrir el modal impresiones -->
                        <button type="button" class="col-md-3 btn btn-outline-info rounded-pill shadow m-1" data-toggle="modal" data-target="#ModalImpresionOdontgrama">
                                    Impr. Odontograma Pediátrico
                        </button>

                                    <!-- HTML para el modal -->
                                    <div class="modal fade" id="ModalImpresionOdontgrama" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel"> Impresiones Odontograma Pediátrico</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div style="display: inline-table;width:100%">
                                                <hr>
                                                <a href="ODP_Impresion?Tipo=1&clienteId=<?= $clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                                    <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                    <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Temporal </strong></h4>
                                                    </button>
                                                </a>
                                                <hr>
                                                <a href="ODP_Impresion?Tipo=2&clienteId=<?= $clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                                    <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                    <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Permanentes </strong></h4>
                                                    </button>
                                                </a>
                                                <hr>
                                                <a href="ODP_Impresion?Tipo=3&clienteId=<?= $clienteId; ?>&usuarioId=<?= $_SESSION['ID']; ?>" target="_blank">
                                                    <button class="btn btn-block btn-outline-info btn-lg rounded-pill shadow">
                                                    <h4><strong><i class="fa-solid fa-teeth"></i> Imprimir Odontograma Completo </strong></h4>
                                                    </button>
                                                </a>
                                                <hr>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </div>

                        <br><br>
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

                    <style>
                        #custom-tabs-container .nav-tabs {
                            font-family: inherit;
                            margin: 0 0 10px 0;
                            border: none;
                            display: grid;
                            grid-template-columns: repeat(3, 1fr); /* 3 columnas iguales */
                            gap: 15px 5px;
                            width: 100%; /* Asegura que la cuadrícula ocupe todo el ancho disponible */
                            max-width: 1800px; /* Opcional: define un ancho máximo para la cuadrícula */
                        }

                        #custom-tabs-container .nav-tabs li a {
                            color: #fff;
                            background: linear-gradient(to top right, #007bff6e 49%, #87b3e2 50%);
                            font-size: 15px;
                            font-weight: 800;
                            letter-spacing: 1px;
                            text-transform: uppercase;
                            padding: 10px 20px;
                            margin-right: 5px;
                            border: none;
                            border-radius: 0;
                            box-shadow: 0 0 10px -5px rgba(0, 0, 0, 0.5);
                            overflow: hidden;
                            z-index: 1;
                            position: relative;
                            transition: all 0.3s ease 0s;
                            margin-bottom: 5px;
                            text-align: center; /* Centra el texto dentro de cada tab */
                        }

                        #custom-tabs-container .nav-tabs li:last-child a {
                            margin-right: 0;
                        }

                        #custom-tabs-container .nav-tabs li a:hover,
                        #custom-tabs-container .nav-tabs li.active a {
                            color: #fff;
                            border-color: transparent;
                            border: none;
                        }

                        #custom-tabs-container .nav-tabs li a:before {
                            content: "";
                            background: linear-gradient(to right, #2F80ED, #56CCF2);
                            width: 100%;
                            height: 100%;
                            transform: scaleX(0);
                            transform-origin: 0 50% 0;
                            position: absolute;
                            top: 0;
                            left: 0;
                            z-index: -1;
                            transition: all 0.5s ease-out 0s;
                        }

                        #custom-tabs-container .nav-tabs li.active a:before,
                        #custom-tabs-container .nav-tabs li a:hover:before {
                            transform: scaleX(1);
                            transition-timing-function: cubic-bezier(0.52, 1.64, 0.37, 0.66);
                        }
                    </style>

                    <div id="custom-tabs-container">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"
                                    class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de Ortodoncia</a></li>
                            <li role="presentation"><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Historial del Odontograma</a></li>
                            <li role="presentation"><a href="#Section3" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Historial Odontología</a></li>
                            <li role="presentation"><a href="#Section4" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Historial Periodoncia</a></li>
                            <li role="presentation"><a href="#Section5" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Historial Endodoncia</a></li>
                            <li role="presentation"><a href="#Section6" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Historial Odontograma Pediatr.</a></li>
                            <li role="presentation"><a href="#Section7" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Historial Odontopediatría</a></li>
                            <li role="presentation"><a href="#Examenes" aria-controls="home" role="tab" data-toggle="tab"> <i
                                        class='fas fa-book-medical' style='font-size:26px'> </i> Examenes</a></li>
                        </ul>
                    </div>
                    
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Ortodoncia where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];
                                        $fecha = $rowMotorizado['fecha'];


                                        $InformacionAcudiente = $rowMotorizado['InformacionAcudiente'];
                                        $EnfermedadActual = $rowMotorizado['EnfermedadActual'];
                                        $Checks_Antecedentes = $rowMotorizado['Checks_Antecedentes'];
                                        $AntecentesGinecobstetricos = $rowMotorizado['AntecentesGinecobstetricos'];
                                        $AntecedentesFamiliares = $rowMotorizado['AntecedentesFamiliares'];
                                        $Checks_Revision = $rowMotorizado['Checks_Revision'];
                                        $SignosVitales = $rowMotorizado['SignosVitales'];
                                        $Paraclinicos = $rowMotorizado['Paraclinicos'];
                                        $Imagenologia_Examen = $rowMotorizado['Imagenologia_Examen'];
                                        $Laboratorio_Examenes = $rowMotorizado['Laboratorio_Examenes'];
                                        $ExamenFisico = $rowMotorizado['ExamenFisico'];
                                        $OrganoSentidos = $rowMotorizado['OrganoSentidos'];
                                        $SintomasGenerales = $rowMotorizado['SintomasGenerales'];
                                        $DiagnosticoAcupuntura = $rowMotorizado['DiagnosticoAcupuntura'];
                                        $DiagnosticoConsulta = $rowMotorizado['DiagnosticoConsulta'];
                                        $Impresion = $rowMotorizado['Impresion'];
                                        $PlanManejo = $rowMotorizado['PlanManejo'];
                                        $Incapacidades = $rowMotorizado['Incapacidades'];
                                        $Insumos = $rowMotorizado['Insumos'];
                                        $RecetaId = $rowMotorizado['RecetaId'];
                                        $AP1 = $rowMotorizado['AP1'];
                                        $SI1 = $rowMotorizado['AP1'];
                                        $BL1 = $rowMotorizado['BL1'];
                                        $SP1 = $rowMotorizado['SP1'];
                                        $BLM1 = $rowMotorizado['BLM1'];
                                        $IDis1 = $rowMotorizado['IDis1'];
                                        $ICD1 = $rowMotorizado['ICD1'];
                                        $BLM2 = $rowMotorizado['BLM2'];
                                        $SI2 = $rowMotorizado['SI2'];
                                        $PO1 = $rowMotorizado['PO1'];
                                        $LM = $rowMotorizado['LM'];
                                        $LM1 = $rowMotorizado['LM1'];
                                        $img1 = $rowMotorizado['img1'];
                                        $AP2 = $rowMotorizado['AP2'];

                                        ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading"
                                                style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#Historia<?php echo $id ?>"
                                                        aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                                                        Historia
                                                        <?php echo $id . ' / <b style="color: #444444;">' . $fecha . '</b>'; ?>

                                                        <button
                                                            onclick="window.location.href='Finalizado_Historia_Ortodoncia.php?historiaClinica1=<?php echo $id; ?>'"
                                                            style="border: hidden;background-color: initial;font-size: 20px;"><i
                                                                class="fa-regular fa-rectangle-list"></i></button>

                                                        <button
                                                            onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id); ?>&historia_id=<?php echo encrypt($id); ?>&tabla=<?php echo encrypt('Historia_Ortodoncia'); ?>', '_blank', 'noopener')"
                                                            style="border: hidden;background-color: initial;font-size: 20px;"><i
                                                                class="fa fa-file"></i></button>

                                                        <button
                                                            onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id); ?>&historia_id=<?php echo encrypt($id); ?>&tabla=<?php echo encrypt('Historia_Ortodoncia'); ?>', '_blank', 'noopener')"
                                                            style="border: hidden;background-color: initial;font-size: 20px;"><i
                                                                class="fa fa-eye"></i></button>

                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Historia<?php echo $id ?>" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading"
                                                style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo ' 1.Diagnóstico Articular<br>' . $InformacionAcudiente . '<br>';
                                                    echo 'Musculatura Craneocervical<br>' . $EnfermedadActual . '<br>';
                                                    echo 'ATM <br>' . $Checks_Antecedentes . '<br>';
                                                    // echo 'Antecedentes Ginecobstetricos<br>'.$AntecentesGinecobstetricos.'<br>';
                                                    // echo 'Antecedentes Familiares<br>'.$AntecedentesFamiliares.'<br>';
                                                    echo '2. Diagnostico Respiratorio<br>' . $Checks_Revision . '<br>';
                                                    // echo 'Signos vitales y medidas antropométricas<br>'.$SignosVitales.'<br>';
                                                    // echo 'Paraclínicos<br>'.$Paraclinicos.'<br>';
                                                    // echo 'Examenes<br>';
                                                    // $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                                    // foreach ($Examen_Paciente as $value) {
                                                    //   echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                                    // }
                                                    // echo 'Laboratorios<br>';
                                                    // $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                                    // foreach ($Laboratorio_Paciente as $value) {
                                                    //   echo funcionMaster($value,'id','Nombre','examenes_historia').'<br>';
                                                    // }
                                                    echo '3. Diagnostico Maxilofacial<br>' . $SintomasGenerales . '<br>';
                                                    echo 'Elementos I, IV <br>';
                                                    echo 'Discrepancia Central ' . $AP1 . '<br>';
                                                    echo 'SI ' . $SI1 . '<br>';
                                                    echo 'BL ' . $BL1 . '<br>';
                                                    echo 'SP ' . $SP1 . '<br>';
                                                    echo 'BL (Maxilar) ' . $BLM1 . '<br>';
                                                    echo 'I ' . $IDis1 . '<br>';
                                                    echo 'ICD ' . $ICD1 . '<br>';
                                                    echo 'Examen Físico<br>' . $ExamenFisico . '<br>';
                                                    echo 'Organos de los Sentidos<br>' . $OrganoSentidos . '<br>';
                                                    echo 'Elementos II<br>';
                                                    echo 'AP ' . $AP2 . '<br>';
                                                    echo 'Elementos III<br>';
                                                    echo 'BL ' . $BLM2 . '<br>';
                                                    echo 'Elementos IV<br>';
                                                    echo 'SI ' . $SI2 . '<br>';
                                                    echo 'Elementos V<br>';
                                                    echo 'PO ' . $PO1 . '<br>';
                                                    echo 'Derecho<br>';
                                                    echo 'LM ' . $LM . '<br>';
                                                    echo 'Izquierdo<br>';
                                                    echo 'LM1 ' . $LM1 . '<br>';
                                                    echo 'Subsección Altura Facial<br>' . $Impresion . '<br>';
                                                    echo 'Subsección Simetría<br>' . $DiagnosticoConsulta . '<br>';
                                                    // echo 'Diagnostico de Acupuntura<br>'.$DiagnosticoAcupuntura.'<br>';
                                                    echo 'Subsección Mandíbula<br>' . $PlanManejo . '<br>';
                                                    echo 'Diagnóstico y Plan de tratamiento<br>' . $OrganoSentidos . '<br>';
                                                    echo '4. Compromisos<br>' . $ExamenFisico . '<br>';
                                                    echo 'Tiempo de Tratamiento<br>' . $DiagnosticoAcupuntura . '<br>';
                                                    // echo 'Incapacidades<br>'.$Incapacidades.'<br>';
                                                    // echo 'Insumos<br>'.$Insumos.'<br>';
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



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section2">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php

                                    echo "<table id='TablaOdontograma' class='table table-bordered table-striped' style='text-align-last: center;'>
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Usuario</th>
                                            <th>Icono</th>
                                            <th>Diente</th>
                                            <th>Procedimiento</th>
                                            <th>Detalles</th>
                                            <th>Estado/Firma</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                            
                                    $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM OD_OdontogramaMasterDetalle WHERE cliente_id = '$clienteId' AND (usuario_id = '{$_SESSION['ID']}' or usuario_id = '{$_SESSION['ID_principal']}') ORDER BY id DESC");
                                    while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {

                                    $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Icono','OD_Procedimiento'),'id','SVG','OD_Iconos_SVG');
                                    $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Color','OD_Procedimiento');
                                    $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);

                                    $EstadoFirma = funcionMaster($RowOdontogramaMaster["id"], 'detalle_id', 'id', 'OD_FirmaDetalle');
                                    $Estado_Procedimiento = $RowOdontogramaMaster["Estado_Procedimiento"];
                                    $Estado_Procedimiento_Detalle = $RowOdontogramaMaster["Estado_Procedimiento_Detalle"];

                                    if ($EstadoFirma != "") {
                                    $EstadoFirma = "<label style='color:green;'>Firmado</label>";
                                    
                                } else {
                                    $EstadoFirma = "<label style='color:red;'>Sin Firma</label>";
                                }

                                    echo "<tr>
                                        <td width='10%'>
                                            ".$RowOdontogramaMaster["Fecha"]."
                                        </td>
                                        <td width='10%'>
                                            ".$RowOdontogramaMaster["Hora"]."
                                        </td>
                                        <td width='15%'>
                                        ".funcionMaster($RowOdontogramaMaster["usuario_id"],'ID','NOMBRE_USUARIO','usuarios')."
                                        </td>
                                        <td  width='20%'style='text-align: -webkit-center;'>
                                            <div style='width:40px'>
                                            ".$SVG." 
                                            </div>
                                            <br>
                                            Cara: ".$RowOdontogramaMaster["NombreCara"]."
                                        </td>
                                        <td width='10%'>
                                            ".$RowOdontogramaMaster["Numero_Diente"]."
                                        </td>
                                        <td width='10%'>
                                            ".funcionMaster($RowOdontogramaMaster["Procedimiento"],"id","Nombre","OD_Procedimiento")."
                                        </td>
                                        <td width='45%'>
                                            ".$RowOdontogramaMaster["Detalle"]."
                                        </td>
                                        <td >
                                            Firma: ".$EstadoFirma."
                                            <hr>
                                            Estado: ".$Estado_Procedimiento." <br>
                                            ".$Estado_Procedimiento_Detalle."
                                        </td>
                                    </tr>";
                                    }

                                    echo "</tbody>
                                    </table>";


                                ?>

                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 2-->



                        <!-- inicio seccion EXamen -->
                        <div role="tabpanel" class="tab-pane fade" id="Examenes">

                                        <!--inicio accordion-->
                                        <div class="col-md-12">
                                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">





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
                                                            <li class="tab-content tab-content-first">
                                                                <h1>Registro de Exámenes</h1>

                                                                <table class="table table-responsive" style="display:inline-table!important;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Nombre Archivo</th>
                                                                            <th scope="col">Carpeta</th>
                                                                            <th scope="col">Fecha</th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-download" aria-hidden="true"></i>
                                                                            </th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-picture-o" aria-hidden="true"></i>
                                                                            </th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                                            </th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $queryImg = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 ");
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
                                                                                        <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>" download="Archivo">Descargar
                                                                                            Archivo
                                                                                        </a>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <a target="_blank" href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">
                                                                                        <a href="<?php echo $Base; ?>archivos/<?php echo $resulImg['codigo']; ?>">Ver
                                                                                            Archivo o Imagen <br>
                                                                                        </a>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <a target="_blank" href="<?php echo $Base; ?>enviarArchivo.php?cliente=<?php echo $clienteId; ?>&id=<?php echo $Producto; ?>">
                                                                                        Enviar Archivo <br>
                                                                                    </a>
                                                                                </td>
                                                                                <td style="text-align: center;">
                                                                                    <a href="<?php echo $Base; ?>historiaImagenes_eliminar.php?cI=<?= encrypt($clienteId); ?>&iI=<?= encrypt($Producto); ?>">
                                                                                        Eliminar Archivo <br>
                                                                                    </a>
                                                                                </td>

                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>

                                                            </li><!-- cierre del primer modulo archivos -->

                                                            <li class="tab-content tab-content-2 typography">
                                                                <h1 class="txt_rsp">Registro de Carpetas</h1>



                                                                <table class="table table-responsive" style="display:inline-table!important;">
                                                                    <thead>
                                                                        <tr>
                                                                            <th scope="col">#</th>
                                                                            <th scope="col">Carpeta</th>
                                                                            <th scope="col">Fecha</th>
                                                                            <th scope="col" style="text-align: center;font-size: 25px;">
                                                                                <i class="fa fa-paper-plane-o" aria-hidden="true"></i>
                                                                            </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>

                                                                        <?php
                                                                        $queryarchivo = mysqli_query($conn3, "SELECT * FROM archivos  where cliente_id = '$clienteId' and estado = 1 group by descripcion");

                                                                        $nrowlER = mysqli_num_rows($queryarchivo);
                                                                        while ($resularchivo = mysqli_fetch_array($queryarchivo)) {
                                                                            $descripcion = $resularchivo['descripcion'];

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
                                                <!-- cerra class=page -->




                                            </div>
                                        </div>
                                        <!--final accordion-->
                                    </div>
                        <!-- cierre seccion Examen-->




                        <!-- inicio seccion 3 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section3">
                            <!--inicio accordion-->                                                           
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php

                                $clienteId = $_GET['clienteId'];
                                $idHistoria = 51;
                                $usuarioId = $_SESSION['ID'];
                                $cliente_id_modulo = $clienteId; //Evoluciones


                                $queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
                                $nrowl = mysqli_num_rows($queryListhc);
                                while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                    $Tabla = $rowhc['name'];
                                    $nombre = $rowhc['nombre'];
                                }


                                ?>

                                <?php
                                                
                                $queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                    $grafica_audiometria1 = $rowMotorizado['grafica_audiometria'];
                                }

                                $grafica_audiometria = json_decode($grafica_audiometria1, true);
                                $queryConsulta = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc");
                                // ECHO   "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc";
                                $nrowl = mysqli_num_rows($queryConsulta);
                                while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {

                                    $ID = $rowConsulta['id'];
                                    $Fecha = $rowConsulta['Fecha'];
                                    $hora = $rowConsulta['Hora'];
                                    $D1 = $rowConsulta['D1'];
                                    $D2 = $rowConsulta['D2'];
                                    $D3 = $rowConsulta['D3'];
                                    $D4 = $rowConsulta['D4'];
                                    $D5 = $rowConsulta['D5'];
                                    $NOTA1 = $rowConsulta['nota1'];
                                    $NOTA2 = $rowConsulta['nota2'];
                                    $NOTA3 = $rowConsulta['nota3'];
                                    $NOTA4 = $rowConsulta['nota4'];
                                    $NOTA5 = $rowConsulta['nota5'];



                                ?>


                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?= $ID ?>a" aria-expanded="false" aria-controls="Historia<?= $ID ?>a">
                                                                    Fecha <?php echo $Fecha ?>
                                                                    <button title="Ver Finalizado" onclick="window.open('cFinalizado?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
                                                                    </button>
                                                                    |
                                                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Nota de Evolución"><i class="fa fa-file"></i></button>

                                                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Nota de Evolución"><i class="fa fa-eye"></i></button>
                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                            <div class="panel-body">




                                                                <hr align="center" size="10" width="100%" color="#000000">

                                                                <div align="right">
                                                                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                                </div>



                                                                <?php

                                                                if ($idHistoria == "34") {
                                                                    echo "Para visualizar la historia, ingresar en el primer icono y darle al botón imprimir evaluación audiológica";
                                                                }
                                                                $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $idHistoria and estado = 1 order by convert(orden, signed) asc");
                                                                $nrowl = mysqli_num_rows($queryDetalle);
                                                                while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                                                                    $idCampo = $rowDetalle['id'];
                                                                    $div_class = $rowDetalle['div_class'];
                                                                    $div_align = $rowDetalle['div_align'];
                                                                    $div_nombre_campo = $rowDetalle['div_nombre_campo'];
                                                                    $input_type = $rowDetalle['input_type'];
                                                                    $input_calss = $rowDetalle['input_calss'];
                                                                    $input_name = $rowDetalle['input_name'];
                                                                    $input_placeholder = $rowDetalle['input_placeholder'];
                                                                    $input_id = $rowDetalle['input_id'];
                                                                    $input_required = $rowDetalle['input_required'];
                                                                    $input_pattern = $rowDetalle['input_pattern'];
                                                                    $input_onChange = $rowDetalle['input_onChange'];
                                                                    $select_table = $rowDetalle['select_table'];
                                                                    $style = $rowDetalle['style'];
                                                                    $tipoCampo = $rowDetalle['tipoCampo'];
                                                                    $input_maxlength = $rowDetalle['input_maxlength'];
                                                                    $input_oninput = $rowDetalle['input_oninput'];
                                                                    $div_nombre_valor = $rowDetalle['div_nombre_valor'];
                                                                    $input_value = $rowDetalle['input_value'];

                                                                    if ($idHistoria == "34") {
                                                                        $tipoCampo = "Ninguno";
                                                                    }

                                                                    if ($tipoCampo == 'text') {
                                                                        $valor = 0;


                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }

                                                                    if ($tipoCampo == 'number') {
                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }
                                                                        if (strlen($valor) > 0) {
                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . ' <p>';
                                                                        }
                                                                    }

                                                                    if ($tipoCampo == 'textarea') {
                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {
                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'select_si_no') {

                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'select') {


                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {



                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'selectmultiple') {

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        $data = explode("|", $valor);
                                                                        $view = '';
                                                                        foreach ($data as $k => $v)
                                                                            if ($v != '') {
                                                                                $view .= ' ' . $v . ', ';
                                                                            }

                                                                        echo '<p>' . $div_nombre_campo . ' ' . trim($view, ', ') . '<p>';
                                                                    }






                                                                    if ($tipoCampo == 'separador') {
                                                                        $div = 'separador' . rand(1, 999);


                                                                        echo '<p align= "center"> <strong> ' . $div_nombre_campo . '</strong><p>';
                                                                    }


                                                                    if ($idCampo == '2630') {
                                                                        echo

                                                                        '<h5 align="center"> <b>Diagnóstico </b></h5> <BR>
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>Diagnóstico  Cie10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>Observaciones</b></h5> </td>
            </tr>  
            </table>  ';
                                                                        if ($D1 <> '') {
                                                                            $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D1 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA1 . '</b></h5> </td>
            </tr> ';
                                                                        }

                                                                        if ($D2 <> '') {
                                                                            $ID2 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D2 . '</b></h5>  </td>
             

<td  colspan="6">
               <b> <h5>' . $NOTA2 . '</b></h5> </td>
            </tr> ';
                                                                        }

                                                                        if ($D3 <> '') {
                                                                            $ID3 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D3 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA3 . '</b></h5> </td>
            </tr> ';
                                                                        }



                                                                        $FINTABLA = '</TABLE>';



                                                                        echo $ID1;
                                                                        echo $ID2;
                                                                        echo $ID3;

                                                                        echo $FINTABLA;
                                                                    }






                                                                    if ($tipoCampo == 'date') {

                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {



                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'file') {


                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            $file = explode("|", $valor);
                                                                            $view = '';
                                                                            foreach ($file as $data) {
                                                                                if ($data != '') {
                                                                                    $view .= '<img src="' . $data . '" height="100">';
                                                                                }
                                                                            }

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $view . '<p>';
                                                                        }
                                                                        echo '<div><input  type="hidden" name="grafica" id="grafica" value="' . $grafica_audiometria1 . '"></div>';
                                                                    }
                                                                }

                                                                //$editar = "<div align='right'><a  href='cHistoria?clienteId=$clienteId&idHistoria=$idHistoria&id=$ID'><i title='Borrar Campo' style='font-size: 18px;' class='fa fa-pencil'> </i></a></div>";

                                                                //echo $editar;
                                                                ?>




                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                    <!--inicio accordion-->
                                    </div>
                        </div>
                        <!-- cierre seccion 3-->


                        <!-- inicio seccion 4 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section4">
                            <!--inicio accordion-->                                                           
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php

                                $clienteId = $_GET['clienteId'];
                                $idHistoria = 52;
                                $usuarioId = $_SESSION['ID'];
                                $cliente_id_modulo = $clienteId; //Evoluciones


                                $queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
                                $nrowl = mysqli_num_rows($queryListhc);
                                while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                    $Tabla = $rowhc['name'];
                                    $nombre = $rowhc['nombre'];
                                }


                                ?>

                                <?php
                                                
                                $queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                    $grafica_audiometria1 = $rowMotorizado['grafica_audiometria'];
                                }

                                $grafica_audiometria = json_decode($grafica_audiometria1, true);
                                $queryConsulta = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc");
                                // ECHO   "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc";
                                $nrowl = mysqli_num_rows($queryConsulta);
                                while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {

                                    $ID = $rowConsulta['id'];
                                    $Fecha = $rowConsulta['Fecha'];
                                    $hora = $rowConsulta['Hora'];
                                    $D1 = $rowConsulta['D1'];
                                    $D2 = $rowConsulta['D2'];
                                    $D3 = $rowConsulta['D3'];
                                    $D4 = $rowConsulta['D4'];
                                    $D5 = $rowConsulta['D5'];
                                    $NOTA1 = $rowConsulta['nota1'];
                                    $NOTA2 = $rowConsulta['nota2'];
                                    $NOTA3 = $rowConsulta['nota3'];
                                    $NOTA4 = $rowConsulta['nota4'];
                                    $NOTA5 = $rowConsulta['nota5'];



                                ?>


                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?= $ID ?>a" aria-expanded="false" aria-controls="Historia<?= $ID ?>a">
                                                                    Fecha <?php echo $Fecha ?>
                                                                    <button title="Ver Finalizado" onclick="window.open('cFinalizado?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
                                                                    </button>
                                                                    |
                                                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Nota de Evolución"><i class="fa fa-file"></i></button>

                                                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Nota de Evolución"><i class="fa fa-eye"></i></button>
                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                            <div class="panel-body">




                                                                <hr align="center" size="10" width="100%" color="#000000">

                                                                <div align="right">
                                                                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                                </div>



                                                                <?php

                                                                if ($idHistoria == "34") {
                                                                    echo "Para visualizar la historia, ingresar en el primer icono y darle al botón imprimir evaluación audiológica";
                                                                }
                                                                $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $idHistoria and estado = 1 order by convert(orden, signed) asc");
                                                                $nrowl = mysqli_num_rows($queryDetalle);
                                                                while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                                                                    $idCampo = $rowDetalle['id'];
                                                                    $div_class = $rowDetalle['div_class'];
                                                                    $div_align = $rowDetalle['div_align'];
                                                                    $div_nombre_campo = $rowDetalle['div_nombre_campo'];
                                                                    $input_type = $rowDetalle['input_type'];
                                                                    $input_calss = $rowDetalle['input_calss'];
                                                                    $input_name = $rowDetalle['input_name'];
                                                                    $input_placeholder = $rowDetalle['input_placeholder'];
                                                                    $input_id = $rowDetalle['input_id'];
                                                                    $input_required = $rowDetalle['input_required'];
                                                                    $input_pattern = $rowDetalle['input_pattern'];
                                                                    $input_onChange = $rowDetalle['input_onChange'];
                                                                    $select_table = $rowDetalle['select_table'];
                                                                    $style = $rowDetalle['style'];
                                                                    $tipoCampo = $rowDetalle['tipoCampo'];
                                                                    $input_maxlength = $rowDetalle['input_maxlength'];
                                                                    $input_oninput = $rowDetalle['input_oninput'];
                                                                    $div_nombre_valor = $rowDetalle['div_nombre_valor'];
                                                                    $input_value = $rowDetalle['input_value'];

                                                                    if ($idHistoria == "34") {
                                                                        $tipoCampo = "Ninguno";
                                                                    }

                                                                    if ($tipoCampo == 'text') {
                                                                        $valor = 0;


                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }

                                                                    if ($tipoCampo == 'number') {
                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }
                                                                        if (strlen($valor) > 0) {
                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . ' <p>';
                                                                        }
                                                                    }

                                                                    if ($tipoCampo == 'textarea') {
                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {
                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'select_si_no') {

                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'select') {


                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {



                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'selectmultiple') {

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        $data = explode("|", $valor);
                                                                        $view = '';
                                                                        foreach ($data as $k => $v)
                                                                            if ($v != '') {
                                                                                $view .= ' ' . $v . ', ';
                                                                            }

                                                                        echo '<p>' . $div_nombre_campo . ' ' . trim($view, ', ') . '<p>';
                                                                    }






                                                                    if ($tipoCampo == 'separador') {
                                                                        $div = 'separador' . rand(1, 999);


                                                                        echo '<p align= "center"> <strong> ' . $div_nombre_campo . '</strong><p>';
                                                                    }


                                                                    if ($idCampo == '2630') {
                                                                        echo

                                                                        '<h5 align="center"> <b>Diagnóstico </b></h5> <BR>
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>Diagnóstico  Cie10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>Observaciones</b></h5> </td>
            </tr>  
            </table>  ';
                                                                        if ($D1 <> '') {
                                                                            $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D1 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA1 . '</b></h5> </td>
            </tr> ';
                                                                        }

                                                                        if ($D2 <> '') {
                                                                            $ID2 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D2 . '</b></h5>  </td>
             

<td  colspan="6">
               <b> <h5>' . $NOTA2 . '</b></h5> </td>
            </tr> ';
                                                                        }

                                                                        if ($D3 <> '') {
                                                                            $ID3 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D3 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA3 . '</b></h5> </td>
            </tr> ';
                                                                        }



                                                                        $FINTABLA = '</TABLE>';



                                                                        echo $ID1;
                                                                        echo $ID2;
                                                                        echo $ID3;

                                                                        echo $FINTABLA;
                                                                    }






                                                                    if ($tipoCampo == 'date') {

                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {



                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'file') {


                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            $file = explode("|", $valor);
                                                                            $view = '';
                                                                            foreach ($file as $data) {
                                                                                if ($data != '') {
                                                                                    $view .= '<img src="' . $data . '" height="100">';
                                                                                }
                                                                            }

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $view . '<p>';
                                                                        }
                                                                        echo '<div><input  type="hidden" name="grafica" id="grafica" value="' . $grafica_audiometria1 . '"></div>';
                                                                    }
                                                                }

                                                                //$editar = "<div align='right'><a  href='cHistoria?clienteId=$clienteId&idHistoria=$idHistoria&id=$ID'><i title='Borrar Campo' style='font-size: 18px;' class='fa fa-pencil'> </i></a></div>";

                                                                //echo $editar;
                                                                ?>




                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                    <!--inicio accordion-->
                                    </div>
                        </div>
                        <!-- cierre seccion 4-->



                        <!-- inicio seccion 5 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section5">
                            <!--inicio accordion-->                                                           
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php

                                $clienteId = $_GET['clienteId'];
                                $idHistoria = 54;
                                $usuarioId = $_SESSION['ID'];
                                $cliente_id_modulo = $clienteId; //Evoluciones


                                $queryListhc = mysqli_query($conn3, "SELECT * from configTablas where id = $idHistoria ");
                                $nrowl = mysqli_num_rows($queryListhc);
                                while ($rowhc = mysqli_fetch_array($queryListhc)) {
                                    $Tabla = $rowhc['name'];
                                    $nombre = $rowhc['nombre'];
                                }


                                ?>

                                <?php
                                                
                                $queryList = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId");
                                $nrowl = mysqli_num_rows($queryList);
                                while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                    $grafica_audiometria1 = $rowMotorizado['grafica_audiometria'];
                                }

                                $grafica_audiometria = json_decode($grafica_audiometria1, true);
                                $queryConsulta = mysqli_query($conn3, "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc");
                                // ECHO   "SELECT * FROM  $Tabla where cliente_id = $clienteId order by id asc";
                                $nrowl = mysqli_num_rows($queryConsulta);
                                while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {

                                    $ID = $rowConsulta['id'];
                                    $Fecha = $rowConsulta['Fecha'];
                                    $hora = $rowConsulta['Hora'];
                                    $D1 = $rowConsulta['D1'];
                                    $D2 = $rowConsulta['D2'];
                                    $D3 = $rowConsulta['D3'];
                                    $D4 = $rowConsulta['D4'];
                                    $D5 = $rowConsulta['D5'];
                                    $NOTA1 = $rowConsulta['nota1'];
                                    $NOTA2 = $rowConsulta['nota2'];
                                    $NOTA3 = $rowConsulta['nota3'];
                                    $NOTA4 = $rowConsulta['nota4'];
                                    $NOTA5 = $rowConsulta['nota5'];



                                ?>


                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                                        <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                            <h4 class="panel-title">
                                                                <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?= $ID ?>a" aria-expanded="false" aria-controls="Historia<?= $ID ?>a">
                                                                    Fecha <?php echo $Fecha ?>
                                                                    <button title="Ver Finalizado" onclick="window.open('cFinalizado?iC=<?= encrypt($ID) ?>&iCr=<?= encrypt($idHistoria) ?>&cI=<?= encrypt($clienteId) ?>', '_blank')" style="border: hidden;background-color: initial;font-size: 20px;" t><i class="fa-regular fa-rectangle-list"></i>
                                                                    </button>
                                                                    |
                                                                    <button onclick="window.open('EV_EvolucionHistorias.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Nota de Evolución"><i class="fa fa-file"></i></button>

                                                                    <button onclick="window.open('EV_EvolucionHistorial.php?cliente_id=<?php echo encrypt($cliente_id_modulo); ?>&historia_id=<?php echo encrypt($ID); ?>&tabla=<?php echo encrypt($Tabla); ?>', '_blank', 'noopener')" style="border: hidden;background-color: initial;font-size: 20px;" title="Ver Nota de Evolución"><i class="fa fa-eye"></i></button>
                                                                </a>

                                                            </h4>
                                                        </div>
                                                        <div id="Historia<?= $ID ?>a" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                            <div class="panel-body">




                                                                <hr align="center" size="10" width="100%" color="#000000">

                                                                <div align="right">
                                                                    Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                                </div>



                                                                <?php

                                                                if ($idHistoria == "34") {
                                                                    echo "Para visualizar la historia, ingresar en el primer icono y darle al botón imprimir evaluación audiológica";
                                                                }
                                                                $queryDetalle = mysqli_query($conn3, "SELECT * FROM  configTablaDetalle where idTabla = $idHistoria and estado = 1 order by convert(orden, signed) asc");
                                                                $nrowl = mysqli_num_rows($queryDetalle);
                                                                while ($rowDetalle = mysqli_fetch_array($queryDetalle)) {

                                                                    $idCampo = $rowDetalle['id'];
                                                                    $div_class = $rowDetalle['div_class'];
                                                                    $div_align = $rowDetalle['div_align'];
                                                                    $div_nombre_campo = $rowDetalle['div_nombre_campo'];
                                                                    $input_type = $rowDetalle['input_type'];
                                                                    $input_calss = $rowDetalle['input_calss'];
                                                                    $input_name = $rowDetalle['input_name'];
                                                                    $input_placeholder = $rowDetalle['input_placeholder'];
                                                                    $input_id = $rowDetalle['input_id'];
                                                                    $input_required = $rowDetalle['input_required'];
                                                                    $input_pattern = $rowDetalle['input_pattern'];
                                                                    $input_onChange = $rowDetalle['input_onChange'];
                                                                    $select_table = $rowDetalle['select_table'];
                                                                    $style = $rowDetalle['style'];
                                                                    $tipoCampo = $rowDetalle['tipoCampo'];
                                                                    $input_maxlength = $rowDetalle['input_maxlength'];
                                                                    $input_oninput = $rowDetalle['input_oninput'];
                                                                    $div_nombre_valor = $rowDetalle['div_nombre_valor'];
                                                                    $input_value = $rowDetalle['input_value'];

                                                                    if ($idHistoria == "34") {
                                                                        $tipoCampo = "Ninguno";
                                                                    }

                                                                    if ($tipoCampo == 'text') {
                                                                        $valor = 0;


                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }

                                                                    if ($tipoCampo == 'number') {
                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }
                                                                        if (strlen($valor) > 0) {
                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . ' <p>';
                                                                        }
                                                                    }

                                                                    if ($tipoCampo == 'textarea') {
                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {
                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'select_si_no') {

                                                                        $valor = 0;
                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'select') {


                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {



                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'selectmultiple') {

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        $data = explode("|", $valor);
                                                                        $view = '';
                                                                        foreach ($data as $k => $v)
                                                                            if ($v != '') {
                                                                                $view .= ' ' . $v . ', ';
                                                                            }

                                                                        echo '<p>' . $div_nombre_campo . ' ' . trim($view, ', ') . '<p>';
                                                                    }






                                                                    if ($tipoCampo == 'separador') {
                                                                        $div = 'separador' . rand(1, 999);


                                                                        echo '<p align= "center"> <strong> ' . $div_nombre_campo . '</strong><p>';
                                                                    }


                                                                    if ($idCampo == '2630') {
                                                                        echo

                                                                        '<h5 align="center"> <b>Diagnóstico </b></h5> <BR>
                          



 <table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">

 <tr>
           <td colspan="5">  
             <b> <h5>Diagnóstico  Cie10</b></h5>  </td>

<td  colspan="6">
               <b> <h5>Observaciones</b></h5> </td>
            </tr>  
            </table>  ';
                                                                        if ($D1 <> '') {
                                                                            $ID1 = '<table class="tg" border=1 style="undefined;table-layout: fixed; width: 100%">
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D1 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA1 . '</b></h5> </td>
            </tr> ';
                                                                        }

                                                                        if ($D2 <> '') {
                                                                            $ID2 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D2 . '</b></h5>  </td>
             

<td  colspan="6">
               <b> <h5>' . $NOTA2 . '</b></h5> </td>
            </tr> ';
                                                                        }

                                                                        if ($D3 <> '') {
                                                                            $ID3 = '
 <tr>
           <td colspan="5">  
             <b> <h5>' . $D3 . '</b></h5>  </td>

<td  colspan="6">
               <b> <h5>' . $NOTA3 . '</b></h5> </td>
            </tr> ';
                                                                        }



                                                                        $FINTABLA = '</TABLE>';



                                                                        echo $ID1;
                                                                        echo $ID2;
                                                                        echo $ID3;

                                                                        echo $FINTABLA;
                                                                    }






                                                                    if ($tipoCampo == 'date') {

                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {



                                                                            echo '<p>' . $div_nombre_campo . ' ' . $valor . '<p>';
                                                                        }
                                                                    }






                                                                    if ($tipoCampo == 'file') {


                                                                        $valor = 0;

                                                                        $queryList = mysqli_query($conn3, "SELECT $input_name FROM  $Tabla where id = $ID");
                                                                        $nrowl = mysqli_num_rows($queryList);
                                                                        while ($rowMotorizado = mysqli_fetch_array($queryList)) {

                                                                            $valor = $rowMotorizado[$input_name];
                                                                        }

                                                                        if (strlen($valor) > 0) {

                                                                            $file = explode("|", $valor);
                                                                            $view = '';
                                                                            foreach ($file as $data) {
                                                                                if ($data != '') {
                                                                                    $view .= '<img src="' . $data . '" height="100">';
                                                                                }
                                                                            }

                                                                            echo '<p>' . $div_nombre_campo . ' ' . $view . '<p>';
                                                                        }
                                                                        echo '<div><input  type="hidden" name="grafica" id="grafica" value="' . $grafica_audiometria1 . '"></div>';
                                                                    }
                                                                }

                                                                //$editar = "<div align='right'><a  href='cHistoria?clienteId=$clienteId&idHistoria=$idHistoria&id=$ID'><i title='Borrar Campo' style='font-size: 18px;' class='fa fa-pencil'> </i></a></div>";

                                                                //echo $editar;
                                                                ?>




                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                    <!--inicio accordion-->
                                    </div>
                        </div>
                        <!-- cierre seccion 5-->

                        <!-- inicio seccion 6 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section6">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                <?php

                                    echo "<table id='TablaOdontograma' class='table table-bordered table-striped' style='text-align-last: center;'>
                                    <thead>
                                        <tr>
                                            <th>Fecha</th>
                                            <th>Hora</th>
                                            <th>Usuario</th>
                                            <th>Icono</th>
                                            <th>Diente</th>
                                            <th>Procedimiento</th>
                                            <th>Detalles</th>
                                        </tr>
                                    </thead>
                                    <tbody>";
                                            
                                    $QueryOdontogramaMaster = mysqli_query($conn3, "SELECT * FROM ODP_OdontogramaMasterDetalle WHERE cliente_id = '$clienteId' AND usuario_id = '$usuarioId' AND Activo = 1 ORDER BY id DESC");
                                    while ($RowOdontogramaMaster= mysqli_fetch_array($QueryOdontogramaMaster)) {

                                    $SVG = funcionMaster(funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Icono','ODP_Procedimiento'),'id','SVG','ODP_Iconos_SVG');
                                    $Color = funcionMaster($RowOdontogramaMaster["Procedimiento"],'id','Color','ODP_Procedimiento');
                                    $SVG = str_replace('fill="currentColor"', 'fill="'.$Color.'"', $SVG);

                                    echo "<tr>
                                        <td width='10%'>
                                            ".$RowOdontogramaMaster["Fecha"]."
                                        </td>
                                        <td width='10%'>
                                            ".$RowOdontogramaMaster["Hora"]."
                                        </td>
                                        <td width='15%'>
                                        ".funcionMaster($RowOdontogramaMaster["usuario_id"],'ID','NOMBRE_USUARIO','usuarios')."
                                        </td>
                                        <td  width='20%'style='text-align: -webkit-center;'>
                                            <div style='width:40px'>
                                            ".$SVG." 
                                            </div>
                                            <br>
                                            Cara: ".$RowOdontogramaMaster["NombreCara"]."
                                        </td>
                                        <td width='10%'>
                                            ".$RowOdontogramaMaster["Numero_Diente"]."
                                        </td>
                                        <td width='10%'>
                                            ".funcionMaster($RowOdontogramaMaster["Procedimiento"],"id","Nombre","ODP_Procedimiento")."
                                        </td>
                                        <td width='45%'>
                                            ".$RowOdontogramaMaster["Detalle"]."
                                        </td>
                                    </tr>";
                                    }

                                    echo "</tbody>
                                    </table>";


                                ?>

                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 6-->


                        <!-- inicio seccion 7 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section7">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                <?php

                                    function LeerArreglo($arreglo) {
                                        $Texto="";
                                        foreach ($arreglo as $clave => $valor) {
                                            //echo "<b>$clave</b>:<br>";
                                            if (is_array($valor)) {
                                                foreach ($valor as $subclave => $subvalor) {
                                                    $Texto .= "<p class='EspaciadoP'>";
                                                    $Texto .= "<k style='font-weight: normal;'>$subclave:</k> ";
                                                    if (is_array($subvalor)) {
                                                        foreach ($subvalor as $indice => $item) {
                                                            $Texto .= "$item";
                                                            if ($indice < count($subvalor) - 1) {
                                                                $Texto .= ", ";
                                                            }
                                                        }
                                                    } else {
                                                        $Texto .= "$subvalor";
                                                    }
                                                    $Texto .= "</p>";
                                                }
                                            } else {
                                                $Texto .= "Dato Error";
                                            }
                                            //echo "<br>";
                                        }

                                        return $Texto;
                                    }

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Odontopediatria where cliente_id = '$clienteId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];



                                ?>
                                    <div class="panel panel-default" style="background: #f1f1f1;">
                                    <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                        <h4 class="panel-title">
                                        <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Historia<?php echo $id ?>" aria-expanded="false" aria-controls="Historia<?php echo $id ?>">
                                            Historia  <?php echo $id . ' / <b style="color: #444444;"></b>'; ?>

                                            <button onclick="window.location.href='ODP_Finalizado?id=<?php echo $id; ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="iconify" data-icon="gridicons:print"></i></button>
                                        </a>
                                        </h4>
                                    </div>
                                    <div id="Historia<?php echo $id ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                        <div class="panel-body">

                                            <?php
                                            
                                             /////////////////////////////////////////////////////////////////// InformacionGeneral /////////////////////////////////////////////////
                                                $InformacionGeneral_General = $rowMotorizado['InformacionGeneral_General'];

                                                $InformacionGeneral_General_Final = LeerArreglo(json_decode($InformacionGeneral_General,true));

                                                
                                                if (!empty($InformacionGeneral_General_Final)) {
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> 1. Información General</h2><br></div>";
                                                    echo "<div class='form-group col-md-12'>".$InformacionGeneral_General_Final."</div>";
                                                }
                                                
                                                //////////////////////////////////////////////////////////////////? InformacionGeneral /////////////////////////////////////////////////             



                                                /////////////////////////////////////////////////////////////////// Interrogatorio por aparatos y sistemas /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["Interrogatorio_Gestacion","Interrogatorio_Parto","Interrogatorio_EtapaNeonatal","Interrogatorio_InfanciaAdolescencia"]; con la eestructura de arriba



                                                //Tabla Formulario
                                                $TablaInterrogatorio_Final = $rowMotorizado['TablaInterrogatorio'];


                                                $Interrogatorio_Gestacion = $rowMotorizado['Interrogatorio_Gestacion'];
                                                $Interrogatorio_Parto = $rowMotorizado['Interrogatorio_Parto'];
                                                $Interrogatorio_EtapaNeonatal = $rowMotorizado['Interrogatorio_EtapaNeonatal'];
                                                $Interrogatorio_InfanciaAdolescencia = $rowMotorizado['Interrogatorio_InfanciaAdolescencia'];


                                                $Interrogatorio_Gestacion_Final = LeerArreglo(json_decode($Interrogatorio_Gestacion,true));
                                                $Interrogatorio_Parto_Final = LeerArreglo(json_decode($Interrogatorio_Parto,true));
                                                $Interrogatorio_EtapaNeonatal_Final = LeerArreglo(json_decode($Interrogatorio_EtapaNeonatal,true));
                                                $Interrogatorio_InfanciaAdolescencia_Final = LeerArreglo(json_decode($Interrogatorio_InfanciaAdolescencia,true));


                                                if (!empty($Interrogatorio_Gestacion_Final) || !empty($Interrogatorio_Parto_Final) || !empty($Interrogatorio_EtapaNeonatal_Final) || !empty($Interrogatorio_InfanciaAdolescencia_Final) || !empty($TablaInterrogatorio_Final)) {
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> 2. Interrogatorio por Aparatos y Sistemas</h2><br></div>";

                                                    if(!empty($Interrogatorio_Gestacion_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Gestación</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$Interrogatorio_Gestacion_Final."</div>";
                                                    }

                                                    if(!empty($Interrogatorio_Parto_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Parto</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$Interrogatorio_Parto_Final."</div>";
                                                    }

                                                    if(!empty($Interrogatorio_EtapaNeonatal_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Etapa Neonatal</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$Interrogatorio_EtapaNeonatal_Final."</div>";
                                                    }

                                                    if(($TablaInterrogatorio_Final)!="[]" && ($TablaInterrogatorio_Final)!=""){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Infancia y Adolescencia</h3><br></div>";
                                                        
                                                        $JsonInterrogatorio_Final = json_decode($TablaInterrogatorio_Final,true);
                                                        
                                                        $CamposTabla = array(
                                                            "Reflujo",
                                                            "Padecimientos renales",
                                                            "Cianosis al esfuerzo",
                                                            "Fiebre reumática",
                                                            "Hemorragias espontáneas",
                                                            "Diabetes",
                                                            "Trastornos del lenguaje",
                                                            "Epilepsia",
                                                            "Parotiditis",
                                                            "Difteria",
                                                            "Hepatitis",
                                                            "VIH",
                                                            "Fiebres eruptivas",
                                                            "Exantema súbito",
                                                            "Escarlatina",
                                                            "Varicela",
                                                            "Sarampión",
                                                            "Rubéola",
                                                            "Mononucleosis infecciosa"
                                                        );
                                
                                                        echo"<table class='table table-bordered' id='Tabla1Odontopediatria_$id'>
                                                        <thead>
                                                            <tr>
                                                                <th>Presenta o ha presentado:</th>
                                                                <th>Si</th>
                                                                <th>No</th>
                                                                <th>Edad</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>";
                                
                                
                                                        foreach ($CamposTabla as $campo):
                                                            echo"<tr>
                                                                <td>$campo</td>
                                                                <td><input type='radio' name='TablaInterrogatorio[$campo][Tipo]' value='Si' ".($JsonInterrogatorio_Final[$campo]['Tipo'] == 'Si' ? 'checked' : '')."></td>
                                                                <td><input type='radio' name='TablaInterrogatorio[$campo][Tipo]' value='No' ".($JsonInterrogatorio_Final[$campo]['Tipo'] == 'No' ? 'checked' : '')."></td>
                                                                <td><input type='text' name='TablaInterrogatorio[$campo][Edad]' disabled class='form-control'value='".($JsonInterrogatorio_Final[$campo]['Edad'])."' ></td>
                                                            </tr>";
                                                            //poner campo otros
                                                        endforeach;
                                                        echo "<tr>
                                                                <td>Otros</td>
                                                                <td colspan='3'><input type='text' name='TablaInterrogatorio[Otros]' disabled class='form-control' value='".($JsonInterrogatorio_Final["Otros"]["Otros"])."'></td>
                                                            </tr>";
                                                        echo "</tbody>
                                                        </table>";

                                                        echo "<script>
                                                        var container = document.getElementById('Tabla1Odontopediatria_$id');
                                                        var checkboxes = container.getElementsByTagName('input');
                                
                                                        for (var i = 0; i < checkboxes.length; i++) {
                                                            checkboxes[i].addEventListener('click', function(event) {
                                                                event.preventDefault();
                                                                event.stopPropagation();
                                                                return false;
                                                            });
                                                        }
                                                        </script>";
                                                        
                                                    }

                                                    if(!empty($Interrogatorio_InfanciaAdolescencia_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Infancia y Adolescencia</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$Interrogatorio_InfanciaAdolescencia_Final."</div>";
                                                    }

                                                }
                                                
                                                
                                                //////////////////////////////////////////////////////////////////? Interrogatorio por aparatos y sistemas ///////////////////////////////////////////////// 







                                                /////////////////////////////////////////////////////////////////// Heredofamiliares /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["Heredofamiliares_General"]; con la eestructura de arriba

                                                $Heredofamiliares_General = $rowMotorizado['Heredofamiliares_General'];

                                                $Heredofamiliares_General_Final = LeerArreglo(json_decode($Heredofamiliares_General,true));


                                                if (!empty($Heredofamiliares_General_Final)) {
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>3. Antecedentes Heredofamiliares</h2><br></div>";
                                                    echo "<div class='form-group col-md-12'> ".$Heredofamiliares_General_Final."</div>";
                                                }
                                                
                                                
                                                //////////////////////////////////////////////////////////////////? Heredofamiliares ///////////////////////////////////////////////// 


                                                





                                                
                                                /////////////////////////////////////////////////////////////////// Personales /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["AntecedentesPersonales_Alimentacion","AntecedentesPersonales_Higiene"]; con la eestructura de arriba


                                                $AntecedentesPersonales_Alimentacion = $rowMotorizado['AntecedentesPersonales_Alimentacion'];
                                                $AntecedentesPersonales_Higiene = $rowMotorizado['AntecedentesPersonales_Higiene'];


                                                $AntecedentesPersonales_Alimentacion_Final = LeerArreglo(json_decode($AntecedentesPersonales_Alimentacion,true));
                                                $AntecedentesPersonales_Higiene_Final = LeerArreglo(json_decode($AntecedentesPersonales_Higiene,true));


                                                if (!empty($AntecedentesPersonales_Alimentacion_Final) || !empty($AntecedentesPersonales_Higiene_Final)) {
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>4. Antecedentes Personales</h2><br></div>";
                                                    if(!empty($AntecedentesPersonales_Alimentacion_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Alimentación</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$AntecedentesPersonales_Alimentacion_Final."</div>";
                                                    }
                                                    if(!empty($AntecedentesPersonales_Higiene_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Higiene</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$AntecedentesPersonales_Higiene_Final."</div>";
                                                    }
                                                }
                                                
                                                //////////////////////////////////////////////////////////////////? Personales ///////////////////////////////////////////////// 











                                                
                                                /////////////////////////////////////////////////////////////////// InspeccionCyB /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["InspeccionCyB_General","InspeccionCyB_ExploracionCB","InspeccionCyB_TejidosBlandos","InspeccionCyB_Traumatismos"]; con la eestructura de arriba


                                                $InspeccionCyB_General = $rowMotorizado['InspeccionCyB_General'];
                                                $InspeccionCyB_ExploracionCB = $rowMotorizado['InspeccionCyB_ExploracionCB'];
                                                $InspeccionCyB_TejidosBlandos = $rowMotorizado['InspeccionCyB_TejidosBlandos'];
                                                $InspeccionCyB_Traumatismos = $rowMotorizado['InspeccionCyB_Traumatismos'];


                                                $InspeccionCyB_General_Final = LeerArreglo(json_decode($InspeccionCyB_General,true));
                                                $InspeccionCyB_ExploracionCB_Final = LeerArreglo(json_decode($InspeccionCyB_ExploracionCB,true));
                                                $InspeccionCyB_TejidosBlandos_Final = LeerArreglo(json_decode($InspeccionCyB_TejidosBlandos,true));
                                                $InspeccionCyB_Traumatismos_Final = LeerArreglo(json_decode($InspeccionCyB_Traumatismos,true));

                                                if(!empty($InspeccionCyB_General_Final) || !empty($InspeccionCyB_ExploracionCB_Final) || !empty($InspeccionCyB_TejidosBlandos_Final) || !empty($InspeccionCyB_Traumatismos_Final)){
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>5. Inspección  Corporal y Bucal </h2><br></div>";
                                                    if(!empty($InspeccionCyB_General_Final)){  
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>General</h3><br></div>"; 
                                                        echo "<div class='form-group col-md-12'> ".$InspeccionCyB_General_Final."</div>";
                                                    }
                                                    if(!empty($InspeccionCyB_ExploracionCB_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Exploración de Cabeza y Cuello</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$InspeccionCyB_ExploracionCB_Final."</div>";
                                                    }
                                                    if(!empty($InspeccionCyB_TejidosBlandos_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Exploración Bucal de Tejidos Blandos</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$InspeccionCyB_TejidosBlandos_Final."</div>";
                                                    }
                                                    if(!empty($InspeccionCyB_Traumatismos_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Traumatismos</h3><br></div>";
                                                        echo "<div class='form-group col-md-12'> ".$InspeccionCyB_Traumatismos_Final."</div>";
                                                    }
                                                }
                                                
                                                //////////////////////////////////////////////////////////////////? InspeccionCyB ///////////////////////////////////////////////// 
















                                                /////////////////////////////////////////////////////////////////// Oclusion y alineamiento /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["OclusionAlineacion_General","OclusionAlineacion_HabitosNocivos"]; con la eestructura de arriba

                                                $OclusionAlineacion_General = $rowMotorizado['OclusionAlineacion_General'];
                                                $OclusionAlineacion_HabitosNocivos = $rowMotorizado['OclusionAlineacion_HabitosNocivos'];

                                                $OclusionAlineacion_General_Final = LeerArreglo(json_decode($OclusionAlineacion_General,true));
                                                $OclusionAlineacion_HabitosNocivos_Final = LeerArreglo(json_decode($OclusionAlineacion_HabitosNocivos,true));

                                                if(!empty($OclusionAlineacion_General_Final) || !empty($OclusionAlineacion_HabitosNocivos_Final)){
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>6. Oclusión y Alineamiento </h2><br></div>";
                                                    if(!empty($OclusionAlineacion_General_Final)){  
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>General</h3><br></div>"; 
                                                        echo "<div class='form-group col-md-12' > ".$OclusionAlineacion_General_Final."</div>";
                                                    }
                                                    if(!empty($OclusionAlineacion_HabitosNocivos_Final)){
                                                        echo "<div class='col-md-12'><br><h3 style='text-align-last: center;'>Habitos Nocivos</h3><br></div>";
                                                        echo "<div class='form-group col-md-12' > ".$OclusionAlineacion_HabitosNocivos_Final."</div>";
                                                    }
                                                }
                                                
                                                //////////////////////////////////////////////////////////////////? Oclusion y alineamiento ///////////////////////////////////////////////// 

                                                






                                                /////////////////////////////////////////////////////////////////// Conducta y Actitud /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["ConductaActitud_General"]; con la eestructura de arriba

                                                $ConductaActitud_General = $rowMotorizado['ConductaActitud_General'];

                                                $ConductaActitud_General_Final = LeerArreglo(json_decode($ConductaActitud_General,true));

                                                if(!empty($ConductaActitud_General_Final)){
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>7. Conducta y Actitud </h2><br></div>";
                                                    if(!empty($ConductaActitud_General_Final)){  
                                                        echo "<div class='form-group col-md-12'> ".$ConductaActitud_General_Final."</div>";
                                                    }
                                                }

                                                //////////////////////////////////////////////////////////////////? Conducta y Actitud ///////////////////////////////////////////////// 













                                                /////////////////////////////////////////////////////////////////// Examen dental  /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["ExamenDental_General"]; con la eestructura de arriba

                                                $ExamenDental_General = $rowMotorizado['ExamenDental_General'];

                                                $ExamenDental_General_Final = LeerArreglo(json_decode($ExamenDental_General,true));

                                                if(!empty($ExamenDental_General_Final)){
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>8. Examen Dental </h2><br></div>";
                                                    if(!empty($ExamenDental_General_Final)){  
                                                        echo "<div class='form-group col-md-12'> ".$ExamenDental_General_Final."</div>";
                                                    }
                                                }

                                                //////////////////////////////////////////////////////////////////? Examen dental  ///////////////////////////////////////////////// 












                                                /////////////////////////////////////////////////////////////////// Riesgo Caries  /////////////////////////////////////////////////

                                                $TablaRiesgoCaries_Final = $rowMotorizado['TablaRiesgoCaries'];

                                                if(!empty($TablaRiesgoCaries_Final)){
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'> 9. Riesgo a Caries </h2><br></div>";
                                                    
                                                    $JsonTablaRiesgoCaries_Final = json_decode($TablaRiesgoCaries_Final,true);

                                                    echo "<table class='table table-bordered' id='Tabla2Odontopediatria_$id'>
                                                                            <thead>
                                                                                <tr>
                                                                                    <th style='width: 30%;'>Criterio</th>
                                                                                    <th style='width: 30%;'>Riesgo</th>
                                                                                    <th style='width: 5%;'>Si</th>
                                                                                    <th style='width: 5%;'>No</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>";

                                                                    $CamposTabla = array(
                                                                        "Cepillado dental con pasta fluorurada (número de veces al día)"=>"Menos de dos veces al día",
                                                                        "Placa bacteriana ( % de superficies dentarias pigmentadas)"=>"índice de O'Leary > 20%",
                                                                        "Frecuencia de ingestión de azúcares o de carbohidratos refinados (Nota: en niños pequeños, tomar en cuenta sus prácticas de alimentación, tales como dieta nocturna o amamantamiento y lactancia artificial prolongados)"=>"Más de dos veces al día",
                                                                        "Lesiones cariosas"=>"Presentes y activas",
                                                                        "Fosetas y fisuras profundas"=>"Presentes",
                                                                        "Enfermedad gingival o periodontal"=>"Presentes",
                                                                        "Alteraciones del esmalte (opacidades, hipoplasia, defectos, fluorosis)"=>"Presentes",
                                                                        "Aparatología ortodóncica o mantenedores de espacio"=>"Utiliza",
                                                                        "Obturaciones defectuosas"=>"Presentes",
                                                                        "Caries en padres o hermanos"=>"Presentes"
                                                                    );

                                                                    foreach ($CamposTabla as $campo => $camporiesgo):
                                                                        echo "<tr>
                                                                                <td>$campo</td>
                                                                                <td>$camporiesgo</td>
                                                                                <td><input type='radio' name='TablaRiesgoCaries[$campo][Tipo]' value='Si' ".($JsonTablaRiesgoCaries_Final[$campo]['Tipo'] == 'Si' ? 'checked' : '')." ></td>
                                                                                <td><input type='radio' name='TablaRiesgoCaries[$campo][Tipo]' value='No' ".($JsonTablaRiesgoCaries_Final[$campo]['Tipo'] == 'No' ? 'checked' : '')." ></td>
                                                                            </tr>";
                                                                    endforeach;

                                                                    echo "</tbody>
                                                                        </table>";

                                                                        echo "<script>
                                                                        var container = document.getElementById('Tabla2Odontopediatria_$id');
                                                                        var checkboxes = container.getElementsByTagName('input');
                                                
                                                                        for (var i = 0; i < checkboxes.length; i++) {
                                                                            checkboxes[i].addEventListener('click', function(event) {
                                                                                event.preventDefault();
                                                                                event.stopPropagation();
                                                                                return false;
                                                                            });
                                                                        }
                                                                        </script>";


                                                }
                                                /////////////////////////////////////////////////////////////////// Riesgo Caries  /////////////////////////////////////////////////


                                                /////////////////////////////////////////////////////////////////// Diagnostico  /////////////////////////////////////////////////

                                                //ponerme estos campos $ArregloCamposAdicionales=["Diagnostico_General"]; con la eestructura de arriba

                                                $Diagnostico_General = $rowMotorizado['Diagnostico_General'];

                                                $Diagnostico_General_Final = LeerArreglo(json_decode($Diagnostico_General,true));

                                                if(!empty($Diagnostico_General_Final)){
                                                    echo "<div class='col-md-12'><br><h2 style='text-align-last: center;'>10. Diagnóstico </h2><br></div>";
                                                    if(!empty($Diagnostico_General_Final)){  
                                                        echo "<div class='form-group col-md-12'> ".$Diagnostico_General_Final."</div>";
                                                    }
                                                }

                                                /////////////////////////////////////////////////////////////////// Diagnostico  /////////////////////////////////////////////////



                                            
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
                        <!-- cierre seccion 7-->




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