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
            <li><a href="#">Historial Ortodoncia</a></li>
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
                        <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1"
                            href="Historia_Ortodoncia?clienteId=<?php echo $clienteId; ?>" role="button"> <i
                                class="fa fa-heartbeat"></i> Nueva Consulta </a>
                        <a class="btn btn-outline-info btn-lg rounded-pill shadow m-1"
                            href="anexosPaciente?clienteId=<?php echo $clienteId; ?>" role="button"><i
                                class="fa fa-folder-open-o"></i> Agregar Exámenes </a>
                        <?php
                        include 'estadoFacturaPresupuestoCliente.php';

                        $Cliente_id = $clienteId; //esta es la variable que se usa dentro del include
                        $FacturacionTipo = "OD_GenerarFactura?clienteId={$Cliente_id}"; //Facturacion Odontologia, con esto cambia la ruta del boton
                        include 'IncludeBotonesHistorialHistorias.php';

                        ?>
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
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation"><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab"
                                class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Historias de
                                Ortodoncia</a></li>
                        <!-- <li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Examenes</a></li>
                        <li role="presentation"><a href="#Section3" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-bed' style='font-size:26px'> </i> Incapacidades</a></li>
                        <li role="presentation"><a href="#Section4" aria-controls="messages" role="tab" data-toggle="tab"> <i class='fas fa-prescription-bottle-alt' style='font-size:26px'> </i> Recetas</a></li> -->
                    </ul>
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

                                        ///OMITE ESTA ITERACION SI EL REGISTRO NO ESTA ACTIVO
                                        $activo = $rowMotorizado['activo'];
                                        if ($activo == 0) {
                                            continue;
                                        }
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

                                                        <button onclick="window.location.href='Historia_Ortodoncia_Editar?id=<?php echo encrypt($id); ?>'" style="border: hidden;background-color: initial;font-size: 20px;"><i class="fas fa-marker"></i></button>

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

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];

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

                                        ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading"
                                                style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#Examenes<?php echo $id ?>"
                                                        aria-expanded="false" aria-controls="Examenes<?php echo $id ?>">
                                                        Examenes <?php echo $id; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Examenes<?php echo $id ?>" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading"
                                                style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo 'Examenes<br>';
                                                    $Examen_Paciente = explode(",", $Imagenologia_Examen);
                                                    foreach ($Examen_Paciente as $value) {
                                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '<br>';
                                                    }
                                                    echo 'Laboratorios<br>';
                                                    $Laboratorio_Paciente = explode(",", $Laboratorio_Examenes);
                                                    foreach ($Laboratorio_Paciente as $value) {
                                                        echo funcionMaster($value, 'id', 'Nombre', 'examenes_historia');
                                                    }
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
                        <!-- cierre seccion 2-->



                        <!-- inicio seccion 3 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section3">


                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];

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

                                        ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading"
                                                style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#Incapacidad<?php echo $id ?>"
                                                        aria-expanded="false" aria-controls="Incapacidad<?php echo $id ?>">
                                                        Incapacidad <?php echo $id; ?>
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Incapacidad<?php echo $id ?>" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading"
                                                style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo 'Incapacidades<br>' . $Incapacidades . '<br>';
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
                        <!-- cierre seccion 3-->







                        <!-- inicio seccion 4 -->
                        <div role="tabpanel" class="tab-pane fade" id="Section4">


                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  Historia_Clinica where cliente_id = '$clienteId' AND usuario_id='$usuarioId' AND Receta_id<>'0'");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];

                                        $receta_id = $rowMotorizado['receta_id'];

                                        ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="headingOne"
                                                style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion" href="#Receta<?php echo $id; ?>"
                                                        aria-expanded="true" aria-controls="collapseOne"> Receta
                                                        <?php echo $id; ?> </a>
                                                </h4>
                                            </div>
                                            <div id="Receta<?php echo $id; ?>" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="headingOne"
                                                style="padding-top: 20px;    background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php

                                                    $querydeta = mysqli_query($conn3, "SELECT * FROM  RM_Recetario  where  cliente_id = $cliente_id  and receta_id=$receta_id");
                                                    while ($RowRecetario = mysqli_fetch_array($querydeta)) {

                                                        $id = $RowRecetario['id'];
                                                        $Nombre_Medicamento = $RowRecetario['Nombre_Medicamento'];
                                                        $Cantidad = $RowRecetario['Cantidad'];
                                                        $Presentacion = $RowRecetario['Presentacion'];
                                                        $Via_Administracion = $RowRecetario['Via_Administracion'];
                                                        $Composicion = $RowRecetario['Composicion'];
                                                        $Dosis = $RowRecetario['Dosis'];

                                                        $Indicaciones = $RowRecetario['Indicaciones'];
                                                        $Indicaciones_Generales = $RowRecetario['Indicaciones_Generales'];

                                                        echo "<div class='col-6'>";
                                                        echo "<div class='col-12'>Nombre: {$Nombre_Medicamento} </div>";
                                                        echo "<div class='col-12'>Presentacion: {$Presentacion} </div>";
                                                        echo "<div class='col-12'>Via de Administracion: {$Via_Administracion} </div>";
                                                        echo "<div class='col-12'>Composicion: {$Composicion} </div>";
                                                        echo "<div class='col-12'>Cantidad: {$Cantidad} </div>";
                                                        echo "<div class='col-12'>Dosis: {$Dosis}</div>";
                                                        echo "<div class='col-12'><br></div>";
                                                        echo "</div>";

                                                        echo "<div class='col-6'>";
                                                        echo "<div class='col-12'>Indicaciones:<br> {$Indicaciones} </div>";
                                                        echo "<div class='col-12'>Indicaciones Generales:<br> {$Indicaciones_Generales}</div>";
                                                        echo "<div class='col-12'><br><hr style='border-top: 1px solid #000;'><br></div>";
                                                        echo "</div>";
                                                    }
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
                        <!-- cierre seccion 4-->




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