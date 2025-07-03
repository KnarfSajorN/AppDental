<?php
if (isset($_POST['key'])) {
    include './funciones/funciones.php';
    $clienteId = $_POST['cliente_id'];
    $idHistoria = $_POST['idHistoria'];
    $tipoHistoria = $_POST['tipoHistoria'];

    $tablas = [
        0 => "HT_OndasChoque",
        1 => "HT_OndasChoqueBilateral",
        2 => "sesionesAplicadas",
        3 => "evolucionesTratamiento"
    ];

    $tabla = $tablas[$tipoHistoria];
    $historia = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$idHistoria}'") or die(mysqli_error($conn3));
    if (!empty(mysqli_num_rows($historia))) {
        $historia = mysqli_fetch_assoc($historia);
    }
    if ($_POST['key'] == "enviarFirma") {
        $mensajeW = " Sr(a) *" . funcionMaster($historia['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado un documento por el Doctor " . utf8_encode(funcionMaster($historia['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios')) . ", el presente documento necesita ser firmado, para firmar el documento acceder al siguiente Link: {$Base}FirmasPacientes/FirmarDocumentoDinamico/{$idHistoria}/{$tipoHistoria}";
        $action = 0;
        $Whatsapp = $_POST['numero_whatsapp'];
        Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $historia['cliente_id'], $historia['usuario_id'], $Whatsapp, $action);

        $_GET['receptor'] = $_POST['correo'];
        $_GET['asunto'] = "Envio de Documento ";
        $_GET['mensaje'] = $mensajeW;
        include './plantillaCorreo.php';
    }
    if ($_POST['key'] == "enviarDocumento") {
        $mensajeW = "Sr(a) *" . funcionMaster($historia['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado un documento por el Doctor " . utf8_encode(funcionMaster($historia['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios')) . ", para visualizarla entrar en el siguiente link, Link: {$Base}TCB_Imprimir_Historias?id={$idHistoria}&tipoHistoria={$tipoHistoria}";
        $action = 0;
        $Whatsapp = $_POST['numero_whatsapp'];
        Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $historia['cliente_id'], $historia['usuario_id'], $Whatsapp, $action);

        $_GET['receptor'] = "{$_POST['correo']}";
        $_GET['asunto'] = "Envio de Documento ";
        $_GET['mensaje'] = $mensajeW;
        include './plantillaCorreo.php';
    }
    echo "<script type='text/javascript'>window.location.href='TCB_Historial_Tratamiento?clienteId={$clienteId}'</script>";
    exit();
}
include 'header.php';
include 'menu.php';

$clienteId = $_GET['clienteId'];
$cliente = mysqli_query($conn3, "SELECT * from cliente where cliente_id = '{$clienteId}';");
if (!empty(mysqli_num_rows($cliente))) {
    $cliente = mysqli_fetch_assoc($cliente);
}

$totalSesiones = 0;
$sesionesChoque = 0;
$idHistoria = 0;
$historiaChoque = mysqli_query($conn3, "SELECT id, numeroSesiones FROM HT_OndasChoque WHERE cliente_id = '{$clienteId}' AND activo = 1");
if (!empty(mysqli_num_rows($historiaChoque))) {
    $historiaChoque = mysqli_fetch_assoc($historiaChoque);
    $idHistoria = $historiaChoque['id'];
    $totalSesiones = $historiaChoque['numeroSesiones'];
    $sesion1 = mysqli_query($conn3, "SELECT sesion FROM sesionesAplicadas WHERE historia_id = '{$historiaChoque['id']}' AND historia_tipo = 0 ORDER BY sesion DESC LIMIT 1");
    if (!empty(mysqli_num_rows($sesion1))) {
        $sesion1 = mysqli_fetch_assoc($sesion1);
        $sesionesChoque = $sesion1['sesion'];
    }
}
$totalSesiones2 = 0;
$sesionesBilateral = 0;
$idHistoria2 = 0;
$historiaBilateral = mysqli_query($conn3, "SELECT id, numeroSesiones FROM HT_OndasChoqueBilateral WHERE cliente_id = '{$clienteId}' AND activo = 1");
if (!empty(mysqli_num_rows($historiaBilateral))) {
    $historiaBilateral = mysqli_fetch_assoc($historiaBilateral);
    $idHistoria2 = $historiaBilateral['id'];
    $totalSesiones2 = $historiaBilateral['numeroSesiones'];
    $sesion2 = mysqli_query($conn3, "SELECT sesion FROM sesionesAplicadas WHERE historia_id = '{$historiaBilateral['id']}' AND historia_tipo = 1 ORDER BY sesion DESC LIMIT 1");
    if (!empty(mysqli_num_rows($sesion2))) {
        $sesion2 = mysqli_fetch_assoc($sesion2);
        $sesionesBilateral = $sesion2['sesion'];
    }
}
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Historial del Paciente
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Historial de Onda de Choque y Choque Bilateral</a></li>
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

                        <?php if (!empty($totalSesiones)) : ?>
                            <h4>Historia Ondas Choque Activa - Sesiones: <?= $sesionesChoque ?> de <?= $totalSesiones ?> </h4>
                            <a href="TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=2&idHistoriaSesion=<?= $idHistoria ?>&tipoHistoria=0" class="btn btn-outline-info btn-lg rounded-pill shadow">Añadir Siguiente Sesión</a><br>
                        <?php else : ?>
                            <a href="TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=0"  class="btn btn-outline-info btn-lg rounded-pill shadow">Historia de Ondas de Choque</a><br>
                        <?php endif; ?>

                        <br>

                        <?php if (!empty($totalSesiones2)) : ?>
                            <h4> Historia Ondas Choque Bilateral Activa - Sesiones: <?= $sesionesBilateral ?> de <?= $totalSesiones2 ?> </h4>
                            <a href="TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=2&idHistoriaSesion=<?= $idHistoria2 ?>&tipoHistoria=1"  class="btn btn-outline-info btn-lg rounded-pill shadow">Añadir Siguiente Sesión</a><br>
                        <?php else : ?>
                            <a href="TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=1"  class="btn btn-outline-info btn-lg rounded-pill shadow">Historia de Choque Bilateral</a><br>
                        <?php endif; ?>

                        <br>

                        <?php
                        include 'estadoFacturaPresupuestoCliente.php';
                        
                        $Cliente_id=$clienteId;//esta es la variable que se usa dentro del include
                        include 'IncludeBotonesHistorialHistorias.php';
                        
                        ?>
                        <!-- <br>
                        <br> -->
                        <!-- <a class="btn btn-primary" href="historiaImagenes.php?clienteId=<?php echo $clienteId; ?>" role="button"><i class="fa fa-folder-open-o"></i> Agregar exámenes </a>
                        <a class="btn btn-primary" href="PP_FormularioPlantilla.php?clienteId=<?php echo $clienteId ?>&Plantilla_General_id=1&HC=<?php echo $historiaClinica ?>">Nuevo Consentimiento</a>
                        <a class="btn btn-primary" href="Evolucion_Historia.php?historiaClinica=<?php echo $historiaClinica ?>&idHistoria=<?php echo $idHistoria ?>&cliente=<?php echo $clienteId ?>">Nueva Evolucion</a>
                        <a class="btn btn-primary" href="PP_FormularioPlantilla.php?clienteId=<?php echo $clienteId ?>&Plantilla_General_id=3&HC=<?php echo $historiaClinica ?>">Nuevo registro de atencion Domiciliaria</a>
                        <button data-toggle="modal" data-target="#ModalPagoDeducionesPlanilla" class="btn btn-primary" title="Agregar Deducciones"><i class="iconify" data-icon="wpf:signature"></i> Agregar Deduccion</button> -->

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

                        <li role="presentation" class="nav-item"><a class="nav-link" href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> Historias de Ondas de Choque</a></li>

                        <li role="presentation" class="nav-item"><a class="nav-link" href="#Section2" aria-controls="home" role="tab" data-toggle="tab"> Sesiones de Ondas de Choque</a></li>

                        <li role="presentation" class="nav-item"><a class="nav-link" href="#Section3" aria-controls="home" role="tab" data-toggle="tab"> Evoluciones de Ondas de Choque</a></li>

                        <li role="presentation" class="nav-item"><a class="nav-link" href="#Section4" aria-controls="home" role="tab" data-toggle="tab"> Historias de Ondas de Choque Bilateral</a></li>

                        <li role="presentation" class="nav-item"><a class="nav-link" href="#Section5" aria-controls="home" role="tab" data-toggle="tab"> Sesiones de Ondas de Choque Bilateral</a></li>

                        <li role="presentation" class="nav-item"><a class="nav-link" href="#Section6" aria-controls="home" role="tab" data-toggle="tab"> Evoluciones de Ondas de Choque Bilateral</a></li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs" >

                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <?php
                                    $contador = 0;
                                    $queryConsulta = mysqli_query($conn3, "SELECT * FROM HT_OndasChoque WHERE cliente_id = $clienteId ORDER BY id ASC");
                                    $nrowl = mysqli_num_rows($queryConsulta);
                                    while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {
                                        $ID = $rowConsulta['id'];
                                        $contador++;
                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#historiaChoque<?php echo $ID ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                                        Historia de Ondas de Choque <?= $ID ?>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Finalizado_Historias?id=<?php echo $ID ?>&tipoHistoria=0'" title="Imprimir Consulta" target="_blank"><i class="fa fa-list"></i> </button>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=3&idHistoriaEvolucion=<?php echo $ID ?>&tipoHistoria=0'" title="Nueva Evolucion" target="_blank"><i class="fa fa-plus"></i> </button>
                                                        <?php /*if ($rowConsulta['activo'] == 1) : ?>
                                                            <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" title="Editar Documento" onclick="window.location='TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=0&id=<?php echo $ID ?>&key=update'"><i class="iconify" data-icon="bi:pencil-fill"></i></button>
                                                        <?php endif;*/ ?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div id="historiaChoque<?php echo $ID ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    <!-- <div align="right">
                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                    </div> -->
                                                    <div class="col-xs-12">
                                                        <br>
                                                        <h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>
                                                        <table class="table table-bordered table-striped" style="width:100%;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">N° Sesiones</th>
                                                                    <th class="text-center">Fecha Inicio</th>
                                                                    <th class="text-center">Fecha Finalizado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><?= $rowConsulta['numeroSesiones'] ?></td>
                                                                    <td class="text-center"><?= $rowConsulta['fechaInicio'] ?></td>
                                                                    <td class="text-center"><?= $rowConsulta['fechaFinalizacion'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="diagnosticoTratar">Diagnóstico a Tratar</label> <br>
                                                                    <?= $rowConsulta['diagnosticoTratar'] ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Información de las Ondas</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4>Tratamiento 1</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4>Tratamiento 2</h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="localizacion1">Localización</label><br>
                                                                    <?= $rowConsulta['localizacion1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="localizacion2">Localización</label><br>
                                                                    <?= $rowConsulta['localizacion2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="intensidad1">Intensidad</label><br>
                                                                    <?= $rowConsulta['intensidad1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="intensidad2">Intensidad</label><br>
                                                                    <?= $rowConsulta['intensidad2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="frecuencia1">Frecuencia</label><br>
                                                                    <?= $rowConsulta['frecuencia1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="frecuencia2">Frecuencia</label><br>
                                                                    <?= $rowConsulta['frecuencia2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="nDisparos1">No. Disparos</label><br>
                                                                    <?= $rowConsulta['nDisparos1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="nDisparos2">No. Disparos</label><br>
                                                                    <?= $rowConsulta['nDisparos2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Recomendaciones</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        foreach ([
                                                            "opcion1",
                                                            "opcion2",
                                                            "opcion3",
                                                            "opcion4",
                                                            "opcion5",
                                                            "opcion6",
                                                            "opcion7",
                                                        ] as $key => $value) {
                                                            if (!empty($rowConsulta[$value])) {
                                                        ?>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="<?= $value ?>">- <?= $rowConsulta[$value] ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <h4>Próxima Aplicación</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <?php
                                                                echo "<div class='col-md-12'>";
                                                                ?>
                                                                <label for="doctor_visual">Doctor</label><br>
                                                                <?= funcionMaster(funcionMaster($rowConsulta['idCitas'], 'idCitas', 'doctor', 'citas'), 'ID', 'NOMBRE_USUARIO', 'usuarios') ?>
                                                                <?php
                                                                echo "</div>";
                                                                echo "<div class='col-md-6'>";
                                                                ?>
                                                                <label for="fecha_visual">Fecha</label><br>
                                                                <?= funcionMaster($rowConsulta['idCitas'], 'idCitas', 'fecha', 'citas') ?>
                                                                <?php
                                                                echo "</div>";
                                                                echo "<div class='col-md-6'>";
                                                                ?>
                                                                <label for="hora_visual">Hora</label><br>
                                                                <?= funcionMaster($rowConsulta['idCitas'], 'idCitas', 'Hora', 'citas') ?>
                                                                <?php
                                                                echo "</div>";
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Diagnósticos Médicos</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Diagnósticos Médicos de Procedimientos</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="ambitoRealizacion">Ámbito de Realización</label><br>
                                                                    <?php
                                                                    $rowConsulta['ambitoRealizacion'] = json_decode($rowConsulta['ambitoRealizacion']);
                                                                    foreach ($rowConsulta['ambitoRealizacion'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="finalidad">Finalidad</label><br>
                                                                    <?php
                                                                    $rowConsulta['finalidad'] = json_decode($rowConsulta['finalidad']);
                                                                    foreach ($rowConsulta['finalidad'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="personaAtiende">Persona que Atiende</label><br>
                                                                    <?php
                                                                    $rowConsulta['personaAtiende'] = json_decode($rowConsulta['personaAtiende']);
                                                                    foreach ($rowConsulta['personaAtiende'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="realizacionActoQuirurgico">Realización del Acto Quirúrgico</label><br>
                                                                    <?php
                                                                    $rowConsulta['realizacionActoQuirurgico'] = json_decode($rowConsulta['realizacionActoQuirurgico']);
                                                                    foreach ($rowConsulta['realizacionActoQuirurgico'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="diagnosticosPrincipales">Diagnósticos Principales</label><br>
                                                                    <?= $rowConsulta['diagnosticosPrincipales'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="diagnosticosRelacionados">Diagnósticos Relacionados</label><br>
                                                                    <?= $rowConsulta['diagnosticosRelacionados'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="complicacion">Complicación</label><br>
                                                                    <?= $rowConsulta['complicacion'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Órdenes Médicas</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" colspan="2">Orden de Imagenología </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            $Examen_Paciente = array_filter(explode(",", $rowConsulta['Imagenologia_Examen']));
                                                                            foreach ($Examen_Paciente as $value) {
                                                                                $contador++;
                                                                                if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                                                                    echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                                                                endif;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" colspan="2">Orden de Laboratorio</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            $Laboratorio_Paciente = array_filter(explode(",", $rowConsulta['Laboratorio_Examenes']));
                                                                            foreach ($Laboratorio_Paciente as $value) {
                                                                                $contador++;
                                                                                if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                                                                    echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                                                                endif;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    
                                                                    <?php //$rowConsulta['incapacidades'] ?>

                                                                    <?php if ($rowConsulta['incapacidades']) : ?>
                                                                        <label for="complicacion">Incapacidades</label><br>
                                                                        <?php 
                                                                            $reemplazos = array(
                                                                                "Area" => "Área",
                                                                            );  
                                                                            $Incapacidades = str_replace(array_keys($reemplazos), array_values($reemplazos),$rowConsulta['incapacidades']);


                                                                            echo $Incapacidades;
                                                                        ?><br>
                                                                    <?php endif; ?>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 1-->



                        <!-- inicio seccion 2 -->
                        <div role="tabpanel" class="tab-pane fade in" id="Section2">
                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    //echo "SELECT * FROM sesionesAplicadas WHERE cliente_id = $clienteId AND historia_tipo = 0 ORDER BY id ASC";
                                    $Contador = 0;
                                    $queryConsulta = mysqli_query($conn3, "SELECT * FROM sesionesAplicadas WHERE cliente_id = $clienteId AND historia_tipo = 0 ORDER BY id ASC");
                                    $nrowl = mysqli_num_rows($queryConsulta);
                                    while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {
                                        $ID = $rowConsulta['id'];
                                        if (!empty($rowConsulta['Firma'])) {
                                            $Firma = "<img src='{$rowConsulta['Firma']}' height='100' width='200'>";
                                            $background = "background: rgb(255,255,255);background: -moz-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);background: -webkit-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ffffff',GradientType=1);";
                                        } else {
                                            $Firma = "No Firmado";
                                            $background = "background: rgb(255,255,255); background: -moz-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); background: -webkit-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ffffff',GradientType=1);";
                                        }

                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#sesionesChoque<?php echo $ID ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                                        Sesión de Ondas de Choque, N° Historia <?= $rowConsulta['historia_id'] ?>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Imprimir_Historias?id=<?php echo $ID ?>&tipoHistoria=2'" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </button>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Finalizado_Historias?id=<?php echo $ID ?>&tipoHistoria=2'" title="Finalizado Consulta" target="_blank"><i class="fa fa-list"></i> </button>
                                                        <!--<button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" title="Editar Documento" onclick="window.location='TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=2&id=<?php echo $ID ?>&key=update'"><i class="iconify" data-icon="bi:pencil-fill"></i></button>-->
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div id="sesionesChoque<?php echo $ID ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    <!-- <div align="right">
                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                    </div> -->
                                                    <div class="col-xs-12">
                                                        <br>
                                                        <h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>
                                                        <div class="col-md-12">
                                                            <table class="table table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Fecha</th>
                                                                        <th class="text-center">N° Sesión</th>
                                                                        <th class="text-center">Paciente</th>
                                                                        <th class="text-center">Firma</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center"><?= $rowConsulta['fechaAsistida'] ?></td>
                                                                        <td class="text-center"><?= $rowConsulta['sesion'] ?></td>
                                                                        <td class="text-center"><?= funcionMaster($rowConsulta['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') ?></td>
                                                                        <td class="text-center"><?= $Firma ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 2-->

                        <!-- inicio seccion 3 -->
                        <div role="tabpanel" class="tab-pane fade in" id="Section3">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <?php
                                    $Contador = 0;
                                    $queryConsulta = mysqli_query($conn3, "SELECT * FROM evolucionesTratamiento WHERE cliente_id = $clienteId AND historia_tipo = 0 ORDER BY id ASC");
                                    $nrowl = mysqli_num_rows($queryConsulta);
                                    while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {
                                        $ID = $rowConsulta['id'];
                                        $contador++;
                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#evolucionChoque<?php echo $ID ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                                        Evolución Ondas de Choque <?= $contador ?>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Imprimir_Evoluciones_Tratamientos?id=<?php echo $ID ?>&tipoHistoria=3'" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </button>
                                                        <button  style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;"onclick="window.location.href='TCB_Finalizado_Historias?id=<?php echo $ID ?>&tipoHistoria=3'" title="Imprimir Consulta" target="_blank"><i class="fa fa-list"></i> </button>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div id="evolucionChoque<?php echo $ID ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    <!-- <div align="right">
                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                    </div> -->
                                                    <div class="col-md-12">
                                                        <br>
                                                        <table class="table  table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nota de Evolucion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><?= $rowConsulta['motivoConsulta'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 3-->

                        <!-- inicio seccion 4 -->
                        <div role="tabpanel" class="tab-pane fade in" id="Section4">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php
                                    $contador = 0;
                                    $queryConsulta = mysqli_query($conn3, "SELECT * FROM HT_OndasChoqueBilateral WHERE cliente_id = $clienteId ORDER BY id ASC");
                                    //echo "SELECT * FROM  $Tabla where cliente_id = $clienteId $condicion1 order by id asc";
                                    $nrowl = mysqli_num_rows($queryConsulta);
                                    while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {
                                        $ID = $rowConsulta['id'];
                                        $contador++;
                                    ?>

                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#bilateral<?php echo $ID ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                                        Historia de Ondas de Choque Bilateral <?= $ID ?>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Finalizado_Historias?id=<?php echo $ID ?>&tipoHistoria=1'" title="Imprimir Consulta" target="_blank"><i class="fa fa-list"></i> </button>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=3&idHistoriaEvolucion=<?php echo $ID ?>&tipoHistoria=1'" title="Nueva Evolucion" target="_blank"><i class="fa fa-plus"></i> </button>
                                                        <?php /* if ($rowConsulta['activo'] == 1) : ?>
                                                            <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" title="Editar Documento" onclick="window.location='TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=1&id=<?php echo $ID ?>&key=update'"><i class="iconify" data-icon="bi:pencil-fill"></i></button>
                                                        <?php endif; */ ?>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div id="bilateral<?php echo $ID ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    <!-- <div align="right">
                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                    </div> -->
                                                    <div class="col-md-12">
                                                        <br>
                                                        <h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>
                                                        <table class="table table-responsive table-bordered table-striped" style="display: inline-table;">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">N° Sesiones</th>
                                                                    <th class="text-center">Fecha Inicio</th>
                                                                    <th class="text-center">Fecha Finalizado</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><?= $rowConsulta['numeroSesiones'] ?></td>
                                                                    <td class="text-center"><?= $rowConsulta['fechaInicio'] ?></td>
                                                                    <td class="text-center"><?= $rowConsulta['fechaFinalizacion'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="diagnosticoTratar">Diagnóstico a Tratar</label> <br>
                                                                    <?= $rowConsulta['diagnosticoTratar'] ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Información de las Ondas</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <h4>Tratamiento 1</h4>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <h4>Tratamiento 2</h4>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="localizacion1">Localización</label><br>
                                                                    <?= $rowConsulta['localizacion1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="localizacion2">Localización</label><br>
                                                                    <?= $rowConsulta['localizacion2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="intensidad1">Intensidad</label><br>
                                                                    <?= $rowConsulta['intensidad1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="intensidad2">Intensidad</label><br>
                                                                    <?= $rowConsulta['intensidad2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="frecuencia1">Frecuencia</label><br>
                                                                    <?= $rowConsulta['frecuencia1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="frecuencia2">Frecuencia</label><br>
                                                                    <?= $rowConsulta['frecuencia2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <label for="nDisparos1">No. Disparos</label><br>
                                                                    <?= $rowConsulta['nDisparos1'] ?>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <label for="nDisparos2">No. Disparos</label><br>
                                                                    <?= $rowConsulta['nDisparos2'] ?>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Recomendaciones</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <?php
                                                        foreach ([
                                                            "opcion1",
                                                            "opcion2",
                                                            "opcion3",
                                                            "opcion4",
                                                            "opcion5",
                                                            "opcion6",
                                                            "opcion7",
                                                        ] as $key => $value) {
                                                            if (!empty($rowConsulta[$value])) {
                                                        ?>
                                                                <div class="form-group">
                                                                    <div class="row">
                                                                        <div class="col-md-12">
                                                                            <label for="<?= $value ?>">- <?= $rowConsulta[$value] ?></label>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Próxima Aplicación</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <?php
                                                                echo "<div class='col-md-12'>";
                                                                ?>
                                                                <label for="doctor_visual">Doctor</label><br>
                                                                <?= funcionMaster(funcionMaster($rowConsulta['idCitas'], 'idCitas', 'doctor', 'citas'), 'ID', 'NOMBRE_USUARIO', 'usuarios') ?>
                                                                <?php
                                                                echo "</div>";
                                                                echo "<div class='col-md-6'>";
                                                                ?>
                                                                <label for="fecha_visual">Fecha</label><br>
                                                                <?= funcionMaster($rowConsulta['idCitas'], 'idCitas', 'fecha', 'citas') ?>
                                                                <?php
                                                                echo "</div>";
                                                                echo "<div class='col-md-6'>";
                                                                ?>
                                                                <label for="hora_visual">Hora</label><br>
                                                                <?= funcionMaster($rowConsulta['idCitas'], 'idCitas', 'Hora', 'citas') ?>
                                                                <?php
                                                                echo "</div>";
                                                                ?>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Diagnósticos Médicos</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Diagnósticos Médicos de Procedimientos</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="ambitoRealizacion">Ámbito de Realización</label><br>
                                                                    <?php
                                                                    $rowConsulta['ambitoRealizacion'] = json_decode($rowConsulta['ambitoRealizacion']);
                                                                    foreach ($rowConsulta['ambitoRealizacion'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="finalidad">Finalidad</label><br>
                                                                    <?php
                                                                    $rowConsulta['finalidad'] = json_decode($rowConsulta['finalidad']);
                                                                    foreach ($rowConsulta['finalidad'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="col-md-12">
                                                                                <label>- <?= $value ?></label>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="personaAtiende">Persona que Atiende</label><br>
                                                                    <?php
                                                                    $rowConsulta['personaAtiende'] = json_decode($rowConsulta['personaAtiende']);
                                                                    foreach ($rowConsulta['personaAtiende'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="realizacionActoQuirurgico">Realización del Acto Quirúrgico</label><br>
                                                                    <?php
                                                                    $rowConsulta['realizacionActoQuirurgico'] = json_decode($rowConsulta['realizacionActoQuirurgico']);
                                                                    foreach ($rowConsulta['realizacionActoQuirurgico'] as $key => $value) {
                                                                    ?>
                                                                        <div class="form-group">
                                                                            <div class="row">
                                                                                <div class="col-md-12">
                                                                                    <label>- <?= $value ?></label>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    <?php
                                                                    }
                                                                    ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="diagnosticosPrincipales">Diagnósticos Principales</label><br>
                                                                    <?= $rowConsulta['diagnosticosPrincipales'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="diagnosticosRelacionados">Diagnósticos Relacionados</label><br>
                                                                    <?= $rowConsulta['diagnosticosRelacionados'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="complicacion">Complicación</label><br>
                                                                    <?= $rowConsulta['complicacion'] ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12" style="text-align:center;">
                                                                    <h4>Órdenes Médicas</h4>
                                                                </div>
                                                                <div class="col-md-12">
                                                                    <table class="table">
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" colspan="2">Orden de Imagenología </th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            $Examen_Paciente = array_filter(explode(",", $rowConsulta['Imagenologia_Examen']));
                                                                            foreach ($Examen_Paciente as $value) {
                                                                                $contador++;
                                                                                if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                                                                    echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                                                                endif;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                        <thead>
                                                                            <tr>
                                                                                <th scope="col" colspan="2">Orden de Laboratorio</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <?php
                                                                            $contador = 0;
                                                                            $Laboratorio_Paciente = array_filter(explode(",", $rowConsulta['Laboratorio_Examenes']));
                                                                            foreach ($Laboratorio_Paciente as $value) {
                                                                                $contador++;
                                                                                if (funcionMaster($value, 'id', 'Nombre', 'examenes_historia') <> "") :
                                                                                    echo '<tr><td>' . $contador . '</td><td>' . funcionMaster($value, 'id', 'Nombre', 'examenes_historia') . '</td></tr>';
                                                                                endif;
                                                                            }
                                                                            ?>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <label for="complicacion" style="text-align:center;">Incapacidades</label><br>
                                                                    <?php //$rowConsulta['incapacidades'] ?>
                                                                    <?php if ($rowConsulta['incapacidades']) : ?>
                                                                        <label for="complicacion">Incapacidades</label><br>
                                                                        <?php 
                                                                            $reemplazos = array(
                                                                                "Area" => "Área",
                                                                            );  
                                                                            $Incapacidades = str_replace(array_keys($reemplazos), array_values($reemplazos),$rowConsulta['incapacidades']);


                                                                            echo $Incapacidades;
                                                                        ?><br>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 4-->



                        <!-- inicio seccion 5 -->
                        <div role="tabpanel" class="tab-pane fade in" id="Section5">
                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                                    <?php
                                    $Contador = 0;
                                    $queryConsulta = mysqli_query($conn3, "SELECT * FROM sesionesAplicadas WHERE cliente_id = $clienteId AND historia_tipo = 1 ORDER BY id ASC");
                                    $nrowl = mysqli_num_rows($queryConsulta);
                                    while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {
                                        $ID = $rowConsulta['id'];
                                        if (!empty($rowConsulta['Firma'])) {
                                            $Firma = "<img src='{$rowConsulta['Firma']}' height='100' width='200'>";
                                            $background = "background: rgb(255,255,255);background: -moz-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);background: -webkit-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ffffff',GradientType=1);";
                                        } else {
                                            $Firma = "No Firmado";
                                            $background = "background: rgb(255,255,255); background: -moz-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); background: -webkit-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ffffff',GradientType=1);";
                                        }
                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#sesionesBilateral<?php echo $ID ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                                        Sesión de Ondas de Choque Bilateral, N° Historia <?= $rowConsulta['historia_id'] ?>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Imprimir_Historias?id=<?php echo $ID ?>&tipoHistoria=2'" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </button>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Finalizado_Historias?id=<?php echo $ID ?>&tipoHistoria=2'" title="Finalizado Consulta" target="_blank"><i class="fa fa-list"></i> </button>
                                                        <!--<button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" title="Editar Documento" onclick="window.location='TCB_Historia_Tratamiento?clienteId=<?= $clienteId ?>&tipo=2&id=<?php echo $ID ?>&key=update'"><i class="iconify" data-icon="bi:pencil-fill"></i></button>-->
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div id="sesionesBilateral<?php echo $ID ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    <!-- <div align="right">
                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                    </div> -->
                                                    <div class="col-xs-12">
                                                        <br>
                                                        <h4 class="center text text-center"><?= $nombreHistoria[$tipoHistoria] ?></h4>
                                                        <div class="col-md-12">
                                                            <table class="table  table-bordered table-striped">
                                                                <thead>
                                                                    <tr>
                                                                        <th class="text-center">Fecha</th>
                                                                        <th class="text-center">N° Sesión</th>
                                                                        <th class="text-center">Paciente</th>
                                                                        <th class="text-center">Firma</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="text-center"><?= $rowConsulta['fechaAsistida'] ?></td>
                                                                        <td class="text-center"><?= $rowConsulta['sesion'] ?></td>
                                                                        <td class="text-center"><?= funcionMaster($rowConsulta['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') ?></td>
                                                                        <td class="text-center"><?= $Firma ?></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 5-->

                        <!-- inicio seccion 6 -->
                        <div role="tabpanel" class="tab-pane fade in" id="Section6">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

                                    <?php
                                    $contador = 0;
                                    $queryConsulta = mysqli_query($conn3, "SELECT * FROM evolucionesTratamiento WHERE cliente_id = $clienteId AND historia_tipo = 1 ORDER BY id ASC");
                                    $nrowl = mysqli_num_rows($queryConsulta);
                                    while ($rowConsulta = mysqli_fetch_array($queryConsulta)) {
                                        $ID = $rowConsulta['id'];
                                        $contador++;
                                    ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#evolucionBilateral<?php echo $ID ?>" class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" aria-expanded="false">
                                                         Evolución de Ondas de Choque Bilateral <?= $contador ?>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;" onclick="window.location.href='TCB_Imprimir_Evoluciones_Tratamientos?id=<?php echo $ID ?>&tipoHistoria=3'" title="Imprimir Consulta" target="_blank"><i class="fa fa-print"></i> </button>
                                                        <button style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;"    onclick="window.location.href='TCB_Finalizado_Historias?id=<?php echo $ID ?>&tipoHistoria=3'" title="Imprimir Consulta" target="_blank"><i class="fa fa-list"></i> </button>
                                                    </a>
                                                </h4>
                                            </div>
                                        </div>
                                        <div class="panel box box-primary">
                                            <div id="evolucionBilateral<?php echo $ID ?>" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <hr align="center" size="10" width="100%" color="#000000">
                                                    <!-- <div align="right">
                                                        Fecha <?php echo $Fecha . '-' . $Hora ?>
                                                    </div> -->
                                                    <div class="col-md-12">
                                                        <br>
                                                        <table class="table  table-bordered table-striped">
                                                            <thead>
                                                                <tr>
                                                                    <th class="text-center">Nota de Evolucion</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="text-center"><?= $rowConsulta['motivoConsulta'] ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php }  ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 6-->





                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</section>
</div>

<div class="modal fade" data-backdrop="false" id="modalEnvio" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span aria-hidden="true">×</span>
                    <span class="sr-only">Cerrar</span>
                </button>
                <h4 class="modal-title" id="myModalLabel">Enviar</h4>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form action="TCB_Historial_Tratamiento" method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <label for="inputEmail">Whatsapp</label>
                        <input type="text" class="form-control" name="numero_whatsapp" value="<?php echo funcionMaster($clienteId, 'cliente_id', 'whatsapp', 'cliente') ?>" />
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?php echo  funcionMaster($clienteId, 'cliente_id', 'correo_cliente', 'cliente') ?>" />
                        <input type="hidden" name="cliente_id" id="cliente_id" value="<?= $clienteId ?>">
                        <input type="hidden" name="idHistoria" id="idHistoria_modal">
                        <input type="hidden" name="tipoHistoria" id="tipoHistoria_modal">
                        <input type="hidden" name="key" id="key_modal">
                        <input type="hidden" name="NombreTablaInformacion" id="NombreTablaInformacion">
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary submitBtn" id="Boton_Enviar">Enviar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'footer.php';
?>

<script type="text/javascript">
    const cargaData = (id, tipo, accion) => {
        $("#idHistoria_modal").val('').val(id);
        $("#tipoHistoria_modal").val('').val(tipo);
        $("#key_modal").val('').val(accion);
        $("#modalEnvio").modal("show");
    };
</script>