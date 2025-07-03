<?php
include 'header.php';
include 'menu.php';
// clienteId = 129 & idHistoria = 38 & tipo = 0
$clienteId = $_GET['clienteId'];
$cliente = mysqli_query($conn3, "SELECT * FROM cliente WHERE cliente_id = '{$clienteId}'");
if (!empty(mysqli_num_rows($cliente))) {
    $cliente = mysqli_fetch_assoc($cliente);
    $nombre_cliente = $cliente['nombre_cliente'];
    $fechaNacimiento = $cliente['fechaNacimiento'];
}
$nombreHistoria = [
    0 => 'Historia de Ondas de Choque',
    1 => 'Historia de Ondas de Choque Bilateral',
    2 => 'Sesion Aplicada',
    3 => 'Evolucion'
];

$tablas = [
    0 => "HT_OndasChoque",
    1 => "HT_OndasChoqueBilateral",
    2 => "sesionesAplicadas",
    3 => "evolucionesTratamiento"
];
if ($_GET['tipo'] == 2) {
    $tabla = $tablas[$_GET['tipo']];
    if ($_GET['key'] == "update") {
        $sesion = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$_GET['id']}'") or die(mysqli_error($conn3));
        if (!empty(mysqli_num_rows($sesion))) {
            $sesion = mysqli_fetch_assoc($sesion);
        }
    } else {
        $sesiones = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE historia_id = '{$_GET['idHistoriaSesion']}' AND historia_tipo = '{$_GET['tipoHistoria']}' ORDER BY sesion DESC LIMIT 1") or die(mysqli_error($conn3));
        if (!empty(mysqli_num_rows($sesiones))) {
            $sesiones = mysqli_fetch_assoc($sesiones);
            $cotinua = ($sesiones['sesion'] + 1);
        } else {
            $cotinua = 1;
        }
    }
}

if ($_POST['tipo'] >= 0 && $_POST['tipo'] <= 1) {
    $tabla = $tablas[$_GET['tipo']];
    // AUTO CREATE CAMPOS JHOEDNRY
    foreach ([
        "{$tabla}" => [ // tabla => campo => type
            "Imagenologia_Examen_array" => "TEXT NULL DEFAULT NULL",
            "Imagenologia_Examen" => "TEXT NULL DEFAULT NULL",
            "Laboratorio_Examenes_array" => "TEXT NULL DEFAULT NULL",
            "Laboratorio_Examenes" => "TEXT NULL DEFAULT NULL",
            "diagnosticoTratar" => "TEXT NULL DEFAULT NULL",
            "localizacion1" => "TEXT NULL DEFAULT NULL",
            "localizacion2" => "TEXT NULL DEFAULT NULL",
            "intensidad1" => "TEXT NULL DEFAULT NULL",
            "intensidad2" => "TEXT NULL DEFAULT NULL",
            "frecuencia1" => "TEXT NULL DEFAULT NULL",
            "frecuencia2" => "TEXT NULL DEFAULT NULL",
            "nDisparos1" => "TEXT NULL DEFAULT NULL",
            "nDisparos2" => "TEXT NULL DEFAULT NULL",
            "opcion1" => "TEXT NULL DEFAULT NULL",
            "opcion2" => "TEXT NULL DEFAULT NULL",
            "opcion3" => "TEXT NULL DEFAULT NULL",
            "opcion4" => "TEXT NULL DEFAULT NULL",
            "opcion5" => "TEXT NULL DEFAULT NULL",
            "opcion6" => "TEXT NULL DEFAULT NULL",
            "opcion7" => "TEXT NULL DEFAULT NULL",
            "ambitoRealizacion" => "TEXT NULL DEFAULT NULL",
            "finalidad" => "TEXT NULL DEFAULT NULL",
            "personaAtiende" => "TEXT NULL DEFAULT NULL",
            "realizacionActoQuirurgico" => "TEXT NULL DEFAULT NULL",
            "diagnosticosPrincipales" => "TEXT NULL DEFAULT NULL",
            "diagnosticosRelacionados" => "TEXT NULL DEFAULT NULL",
            "complicacion" => "TEXT NULL DEFAULT NULL",
            "incapacidades" => "TEXT NULL DEFAULT NULL",
            "Arreglo_Incapacidades" => "TEXT NULL DEFAULT NULL",
            "idCitas" => "TEXT NULL DEFAULT NULL",
            "citaAgendada" => "TEXT NULL DEFAULT NULL",
            "Intercosnulta" => "TEXT NULL DEFAULT NULL",
            "Formulacion" => "TEXT NULL DEFAULT NULL",
            "Paraclinico" => "TEXT NULL DEFAULT NULL",
            "Estudiosimagen" => "TEXT NULL DEFAULT NULL"
        ],
    ] as $key => $value) {
        foreach ($value as $clave => $type) {
            $campoMigrar = mysqli_query($conn3, "SHOW COLUMNS FROM {$key} WHERE Field = '{$clave}';");
            if (empty(mysqli_num_rows($campoMigrar))) {
                mysqli_query($conn3, "ALTER TABLE {$key} ADD COLUMN {$clave} {$type} COMMENT 'CAMPO CREADO DESDE historiasDinamicas.php'");
            }
        }
    }
}

if ($_GET['key'] == "update" && $_GET['tipo'] != 2) {

    $tabla = $tablas[$_GET['tipo']];

    $historia_update = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$_GET['id']}'") or die(mysqli_error($conn3));
    if (!empty(mysqli_num_rows($historia_update))) {
        $historia_update = mysqli_fetch_assoc($historia_update);
        $historia_update['finalidad'] = json_decode($historia_update['finalidad']);
        $historia_update['ambitoRealizacion'] = json_decode($historia_update['ambitoRealizacion']);
        $historia_update['personaAtiende'] = json_decode($historia_update['personaAtiende']);
        $historia_update['realizacionActoQuirurgico'] = json_decode($historia_update['realizacionActoQuirurgico']);
    }
}

if ($_GET['key'] == "update" && $_GET['tipo'] == 2) {

    $tabla = $tablas[$_GET['tipo']];

    $historia_update = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$_GET['id']}'") or die(mysqli_error($conn3));
    if (!empty(mysqli_num_rows($historia_update))) {
        $historia_update = mysqli_fetch_assoc($historia_update);
        $historia_update['finalidad'] = json_decode($historia_update['finalidad']);
        $historia_update['ambitoRealizacion'] = json_decode($historia_update['ambitoRealizacion']);
        $historia_update['personaAtiende'] = json_decode($historia_update['personaAtiende']);
        $historia_update['realizacionActoQuirurgico'] = json_decode($historia_update['realizacionActoQuirurgico']);
    }
}

?>
<link href='https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css' rel='stylesheet' type='text/css'>
<style type="text/css">
    .select2-container--default .select2-selection--multiple .select2-selection__rendered li {
        color: black;
        font-weight: bold;
    }
</style>
<!-- Script -->
<script src="js/jquery.min-3.2.1.js"></script>
<script src='js/select2.min-4.0.3.js'></script>

<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<link href="css/css_historia_clinica.css" rel="stylesheet" type="text/css" media="all">

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1><?= $nombreHistoria[$_GET['tipo']] ?>, Paciente: <?php echo $nombre_cliente . ', Edad: ' . calculaedad($fechaNacimiento); ?> </h1>
        <ol class="breadcrumb">
            <!--<li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> <?php echo $nombre ?>  </a></li>-->
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="">
            <div class="col-md-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="box-solid">
                                <!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion1" style="padding-left: 20px;padding-right: 20px;">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary" style="border-top: 3px solid #78a1f3;">
                                            <div class="box-header with-border">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion1" href="#collapseOne">
                                                        Datos Personales
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse">
                                                <?php echo datosPacientes($clienteId); ?>
                                            </div>
                                        </div>
                                    </div>
                                    <form action="TCB_Guardar_Historias" method="post" id="FormularioHistoriaClinica">
                                        <div class="col-md-12">
                                            <div class="row">
                                                <div class="form-group col-md-12">
                                                    <div class="col-md-12 text-center">
                                                        <h4 class="text-bold">Información para <?= ($_GET['tipo'] == 3 ? 'Evolución' : 'Sesión') ?></h4>
                                                    </div>
                                                </div>
                                                <?php if ($_GET['tipo'] == 3) : ?>
                                                    <div class="form-group col-md-12">
                                                        <div class="col-md-12">
                                                            <label for="motivoConsulta">Nota de Evolución</label>
                                                            <textarea id="motivoConsulta" name="motivoConsulta" class="ReconocimientoVoz0 textarea" placeholder="Motivo Consulta" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                        </div>
                                                    </div>
                                                <?php elseif ($_GET['tipo'] == 2) : ?>
                                                    <div class="form-group col-md-6">
                                                        <div class="col-md-6">
                                                            <label for="sesion">Número de Sesión</label>
                                                            <input type="number" name="sesion" id="sesion" class="form-control input-lg" value="<?= (($_GET['key'] == "update") ? $sesion['sesion'] : $cotinua) ?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <div class="col-md-6">
                                                            <label for="fechaAsistida">Fecha de Inicio</label>
                                                            <input type="date" name="fechaAsistida" id="fechaAsistida" class="form-control input-lg" value="<?= (($_GET['key'] == "update") ? $sesion['fechaAsistida'] : Date("Y-m-d")) ?>" required>
                                                        </div>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="form-group col-md-12 row">
                                                        <div class="col-md-4">
                                                            <label for="numeroSesiones">Número de Sesiones Ordenadas</label>
                                                            <input type="number" name="numeroSesiones" id="numeroSesiones" class="form-control input-lg" value="<?= (($_GET['key'] == "update") ? $historia_update['numeroSesiones'] : ($_GET['tipo'] == 0 ? 4 : 10)) ?>" required>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="fechaInicio">Fecha de Inicio</label>
                                                            <input type="date" name="fechaInicio" id="fechaInicio" class="form-control input-lg" value="<?= (($_GET['key'] == "update") ? $historia_update['fechaInicio'] : Date("Y-m-d")) ?>" required>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <label for="fechaFinalizacion">Fecha Máxima de Finalización</label>
                                                            <input type="date" name="fechaFinalizacion" id="fechaFinalizacion" class="form-control input-lg" value="<?= (($_GET['key'] == "update") ? $historia_update['fechaFinalizacion'] : Date("Y-m-d")) ?>" required>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>
                                                <?php if ($_GET['tipo'] <= 2) : ?>


                                                    <div class="form-group col-md-12 row">
                                                        <div class="col-md-12">
                                                            <div class="box-body">
                                                                <div class="box-group" id="accordion01">
                                                                    <!-- lista -->
                                                                    <div class="panel box box-primary" style="margin-bottom: 5px;">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseinformacionsesion">
                                                                                    Información para Sesión
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseinformacionsesion" class="panel-collapse collapse">







                                                                        <div class="form-group col-md-12 row">
                                                                            <div class="col-md-12">
                                                                                <label for="diagnosticoTratar">Diagnóstico a Tratar</label>
                                                                                <textarea name="diagnosticoTratar" id="diagnosticoTratar" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['diagnosticoTratar'] : '') ?></textarea>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12" style="text-align:center;">
                                                                                <h4>Información de las Ondas</h4>
                                                                                <hr>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4>Tratamiento 1</h4>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <h4>Tratamiento 2</h4>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-6">
                                                                                <label for="diagnosticoTratar">Localización</label>
                                                                                <textarea name="localizacion1" id="localizacion1" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['localizacion1'] : '') ?></textarea>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="diagnosticoTratar">Localización</label>
                                                                                <textarea name="localizacion2" id="localizacion2" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['localizacion2'] : '') ?></textarea>
                                                                            </div>
                                                                        
                                                                        
                                                                            <div class="col-md-6">
                                                                                <label for="intensidad1">Intensidad</label>
                                                                                <textarea name="intensidad1" id="intensidad1" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['intensidad1'] : '') ?></textarea>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="intensidad2">Intensidad</label>
                                                                                <textarea name="intensidad2" id="intensidad2" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['intensidad2'] : '') ?></textarea>
                                                                            </div>
                                                                        
                                                                        
                                                                            <div class="col-md-6">
                                                                                <label for="frecuencia1">Frecuencia</label>
                                                                                <textarea name="frecuencia1" id="frecuencia1" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['frecuencia1'] : '') ?></textarea>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="frecuencia2">Frecuencia</label>
                                                                                <textarea name="frecuencia2" id="frecuencia2" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['frecuencia2'] : '') ?></textarea>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-6">
                                                                                <label for="nDisparos1">No. Disparos</label>
                                                                                <textarea name="nDisparos1" id="nDisparos1" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['nDisparos1'] : '') ?></textarea>
                                                                            </div>
                                                                            <div class="col-md-6">
                                                                                <label for="nDisparos2">No. Disparos</label>
                                                                                <textarea name="nDisparos2" id="nDisparos2" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['nDisparos2'] : '') ?></textarea>
                                                                            </div>
                                                                        
                                                                        
                                                                            <div class="col-md-12">
                                                                                <h4>Recomendaciones</h4>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion1"><input type="checkbox" name="opcion1" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion1']) ? 'checked' : '') : '') ?> id="opcion1" value=' Reposo Relativo'>  Reposo Relativo</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion2"><input type="checkbox" name="opcion2" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion2']) ? 'checked' : '') : '') ?> id="opcion2" value='Color Local por 20 Minutos Cada 2 Horas el Día de Hoy'> Color Local por 20 Minutos Cada 2 Horas el Día de Hoy</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion3"><input type="checkbox" name="opcion3" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion3']) ? 'checked' : '') : '') ?> id="opcion3" value='Se Prepara Proceso de Cicatrización y Mecanotraducción'> Se Prepara Proceso de Cicatrización y Mecanotraducción</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion4"><input type="checkbox" name="opcion4" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion4']) ? 'checked' : '') : '') ?> id="opcion4" value='Dicho Proceso Dura Aproximadamente 3 Meses Desde el Inicio del Tratamiento'> Dicho Proceso Dura Aproximadamente 3 Meses Desde el Inicio del Tratamiento</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion5"><input type="checkbox" name="opcion5" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion5']) ? 'checked' : '') : '') ?> id="opcion5" value='En Este Periodo No se Permite el Uso de Antiinflamatorios, Ni Orales, Ni Tópicos'> En Este Periodo No se Permite el Uso de Antiinflamatorios, Ni Orales, Ni Tópicos</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion6"><input type="checkbox" name="opcion6" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion6']) ? 'checked' : '') : '') ?> id="opcion6" value='Si Hay Dolor Aplicar Solo Calor Local y Tomar Acetaminofén (Dolex) - 2 Tabletas'> Si Hay Dolor Aplicar Solo Calor Local y Tomar Acetaminofén (Dolex) - 2 Tabletas</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <label for="opcion7"><input type="checkbox" name="opcion7" <?= (($_GET['key'] == "update") ? (!empty($historia_update['opcion7']) ? 'checked' : '') : '') ?> id="opcion7" value='Si Hay Dolor Aplicar Solo Frío (Hielo) Local y Tomar Acetaminofén (Dolex) - 2 Tabletas'> Si Hay Dolor Aplicar Solo Frío (Hielo) Local y Tomar Acetaminofén (Dolex) - 2 Tabletas</label>
                                                                            </div>
                                                                        
                                                                            <div class="col-md-12">
                                                                                <h4>Próxima Aplicación</h4>
                                                                            </div>
                                                                        </div>
                                                                        <div class="form-group col-md-12 row">
                                                                            <?php
                                                                            if ($_GET['key'] == "update" && !empty($historia_update['idCitas'])) {
                                                                                $citaAgendadaVisual = mysqli_query($conn3, "SELECT fecha, Hora, doctor FROM citas WHERE idCitas = '{$historia_update['idCitas']}'");
                                                                                if (mysqli_num_rows($citaAgendadaVisual) > 0) {
                                                                                    $citaAgendadaVisual = mysqli_fetch_array($citaAgendadaVisual);
                                                                                }
                                                                                echo "<div class='col-md-12'>";
                                                                            ?>
                                                                                <label for="doctor_visual">Doctor</label>
                                                                                <input type="text" id="doctor_visual" class="form-control input-lg" value='<?= funcionMaster($citaAgendadaVisual['doctor'], 'ID', 'NOMBRE_USUARIO', 'usuarios') ?>' disabled>
                                                                                <?php
                                                                                echo "</div>";
                                                                                echo "<div class='col-md-6'>";
                                                                                ?>
                                                                                <label for="fecha_visual">Fecha</label>
                                                                                <input type="date" id="fecha_visual" class="form-control input-lg" value='<?= $citaAgendadaVisual['fecha'] ?>' disabled>
                                                                                <?php
                                                                                echo "</div>";
                                                                                echo "<div class='col-md-6'>";
                                                                                ?>
                                                                                <label for="hora_visual">Hora</label>
                                                                                <input type="time" id="hora_visual" class="form-control input-lg" value='<?= $citaAgendadaVisual['Hora'] ?>' disabled>
                                                                                <input type="hidden" name="citaAgendada[agendarCita]" value="0">
                                                                            <?php
                                                                                echo "</div>";
                                                                            } else {
                                                                                echo "<div class='col-md-12'>";
                                                                                include "./agendarCitasInclude.php";
                                                                                echo "</div>";
                                                                            }
                                                                            ?>
                                                                        </div>











                                                                        </div>
                                                                         <!-- cierre div panel-collapse-->
                                                                    </div>
                                                                     <!-- cierre div panel-->
                                                                </div>
                                                                <!-- cierre div accoridon01-->
                                                            
                                                            
                                                            
                                                            
                                                            
                                                            </div>
                                                        </div>
                                                    </div>
                                                     <!-- cierre total acordion-->


                                                    

                                                    <div class="form-group col-md-12 row">
                                                        <div class="col-md-12">
                                                            <div class="box-body">
                                                                <div class="box-group" id="accordion2">
                                                                    <!-- lista -->
                                                                    <div class="panel box box-primary">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseEightOne">
                                                                                    Diagnósticos Médicos
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseEightOne" class="panel-collapse collapse">

                                                                            <div class="box-body">
                                                                                <div class="col-md-12">
                                                                                    <div class="row">
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <h4>Diagnósticos Médicos de Procedimientos</h4>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="ambitoRealizacion">Ámbito de Realización</label>
                                                                                                <select name="ambitoRealizacion[]" id="ambitoRealizacion" style="width: 100%;" multiple class="form-control input-lg select2" data-placeholder="Seleccione...">
                                                                                                    <option value="Ambulatorio" <?= (($_GET['key'] == "update") ? (in_array('Ambulatorio', $historia_update['ambitoRealizacion']) ? 'selected' : '') : '') ?>>Ambulatorio</option>
                                                                                                    <option value="Hospitalario" <?= (($_GET['key'] == "update") ? (in_array('Hospitalario', $historia_update['ambitoRealizacion']) ? 'selected' : '') : '') ?>>Hospitalario</option>
                                                                                                    <option value="En Urgencias" <?= (($_GET['key'] == "update") ? (in_array('En Urgencias', $historia_update['ambitoRealizacion']) ? 'selected' : '') : '') ?>>En Urgencias</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="finalidad">Finalidad</label>
                                                                                                <select name="finalidad[]" id="finalidad" style="width: 100%;" multiple class="form-control input-lg select2" data-placeholder="Seleccione...">
                                                                                                    <option value="Terapéutico" <?= (($_GET['key'] == "update") ? (in_array('Terapéutico', $historia_update['finalidad']) ? 'selected' : '') : '') ?>>Terapéutico</option>
                                                                                                    <option value="Protección Especifica" <?= (($_GET['key'] == "update") ? (in_array('Protección Especifica', $historia_update['finalidad']) ? 'selected' : '') : '') ?>>Protección Especifica</option>
                                                                                                    <option value="Detección Temprana de Enfermedad General" <?= (($_GET['key'] == "update") ? (in_array('Detección Temprana de Enfermedad General', $historia_update['finalidad']) ? 'selected' : '') : '') ?>>Detección Temprana de Enfermedad General</option>
                                                                                                    <option value="Detección Temprana de Enfermedad Profesional" <?= (($_GET['key'] == "update") ? (in_array('Detección Temprana de Enfermedad Profesional', $historia_update['finalidad']) ? 'selected' : '') : '') ?>>Detección Temprana de Enfermedad Profesional</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="personaAtiende">Persona que Atiende</label>
                                                                                                <select name="personaAtiende[]" id="personaAtiende" style="width: 100%;" multiple class="form-control input-lg select2" data-placeholder="Seleccione...">
                                                                                                    <option value="Médico(a) Especialista" <?= (($_GET['key'] == "update") ? (in_array('Médico(a) Especialista', $historia_update['personaAtiende']) ? 'selected' : '') : '') ?>>Médico(a) Especialista</option>
                                                                                                    <option value="Médico(a) General" <?= (($_GET['key'] == "update") ? (in_array('Médico(a) General', $historia_update['personaAtiende']) ? 'selected' : '') : '') ?>>Médico(a) General</option>
                                                                                                    <option value="Enfermera(o)" <?= (($_GET['key'] == "update") ? (in_array('Enfermera(o)', $historia_update['personaAtiende']) ? 'selected' : '') : '') ?>>Enfermera(o)</option>
                                                                                                    <option value="Auxiliar de Enfermería" <?= (($_GET['key'] == "update") ? (in_array('Auxiliar de Enfermería', $historia_update['personaAtiende']) ? 'selected' : '') : '') ?>>Auxiliar de Enfermería</option>
                                                                                                    <option value="Otro" <?= (($_GET['key'] == "update") ? (in_array('Otro', $historia_update['personaAtiende']) ? 'selected' : '') : '') ?>>Otro</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="realizacionActoQuirurgico">Realización del Acto Quirúrgico</label>
                                                                                                <select name="realizacionActoQuirurgico[]" id="realizacionActoQuirurgico" style="width: 100%;" multiple class="form-control input-lg select2" data-placeholder="Seleccione...">
                                                                                                    <option value="Único o Unilateral" <?= (($_GET['key'] == "update") ? (in_array('Único o Unilateral', $historia_update['realizacionActoQuirurgico']) ? 'selected' : '') : '') ?>>Único o Unilateral</option>
                                                                                                    <option value="Único o Bilateral, Misma Vía, Diferente Especialidad" <?= (($_GET['key'] == "update") ? (in_array('Único o Bilateral, Misma Vía, Diferente Especialidad', $historia_update['realizacionActoQuirurgico']) ? 'selected' : '') : '') ?>>Único o Bilateral, Misma Vía, Diferente Especialidad</option>
                                                                                                    <option value="Múltiple o Bilateral, Misma Vía, Igual Especialidad" <?= (($_GET['key'] == "update") ? (in_array('Múltiple o Bilateral, Misma Vía, Igual Especialidad', $historia_update['realizacionActoQuirurgico']) ? 'selected' : '') : '') ?>>Múltiple o Bilateral, Misma Vía, Igual Especialidad</option>
                                                                                                    <option value="Múltiple o Bilateral, Diferente Vía, Diferente Especialidad" <?= (($_GET['key'] == "update") ? (in_array('Múltiple o Bilateral, Diferente Vía, Diferente Especialidad', $historia_update['realizacionActoQuirurgico']) ? 'selected' : '') : '') ?>>Múltiple o Bilateral, Diferente Vía, Diferente Especialidad</option>
                                                                                                    <option value="Múltiple o Bilateral, Diferente Vía, Igual Especialidad" <?= (($_GET['key'] == "update") ? (in_array('Múltiple o Bilateral, Diferente Vía, Igual Especialidad', $historia_update['realizacionActoQuirurgico']) ? 'selected' : '') : '') ?>>Múltiple o Bilateral, Diferente Vía, Igual Especialidad</option>
                                                                                                </select>
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="diagnosticosPrincipales">Diagnósticos Principales</label>
                                                                                                <input type="text" name="diagnosticosPrincipales" id="diagnosticosPrincipales" value='<?= (($_GET['key'] == "update") ? $historia_update['diagnosticosPrincipales'] : '') ?>' class="form-control input-lg">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="diagnosticosRelacionados">Diagnósticos Relacionados</label>
                                                                                                <input type="text" name="diagnosticosRelacionados" id="diagnosticosRelacionados" value='<?= (($_GET['key'] == "update") ? $historia_update['diagnosticosRelacionados'] : '') ?>' class="form-control input-lg">
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="form-group col-md-12">
                                                                                            <div class="col-md-12">
                                                                                                <label for="complicacion">Complicación</label>
                                                                                                <input type="text" name="complicacion" id="complicacion" value='<?= (($_GET['key'] == "update") ? $historia_update['complicacion'] : '') ?>' class="form-control input-lg">
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <!--cierre de lista-->
                                                                    <!-- lista -->
                                                                    <div class="panel box box-primary">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseEight">
                                                                                        Órdenes Médicas
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseEight" class="panel-collapse collapse">

                                                                            <div class="box-body">
                                                                                <label>Seleccione Examen de Imagenología</label>
                                                                                <select id="imagenologia_examen" name="Imagenologia_Examen[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                                                                    <?php
                                                                                    $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='1' order by id");
                                                                                    $nrowl = mysqli_num_rows($queryList);
                                                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {

                                                                                        $id      = $row_recordset32['id'];
                                                                                        $Nombre      = $row_recordset32['Nombre'];
                                                                                        echo "<option value='$id' " . (($_GET['key'] == "update" && in_array($id, json_decode($historia_update['Imagenologia_Examen_array']))) ? 'selected' : '') . " >$Nombre</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>

                                                                                <label>Seleccione Examen de Laboratorio</label>
                                                                                <select id="laboratorio_examenes" name="Laboratorio_Examenes[]" class="form-control select2" multiple="multiple" style="width: 100%;">
                                                                                    <?php
                                                                                    $queryList = mysqli_query($conn3, "SELECT * FROM examenes_historia where Tipo='2' order by id");
                                                                                    $nrowl = mysqli_num_rows($queryList);
                                                                                    while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                                                        $id      = $row_recordset32['id'];
                                                                                        $Nombre      = $row_recordset32['Nombre'];
                                                                                        echo "<option value='$id' " . (($_GET['key'] == "update" && in_array($id, json_decode($historia_update['Laboratorio_Examenes_array']))) ? 'selected' : '') . ">$Nombre</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>

                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                    <!--cierre de lista-->

                                                                    <!-- lista -->
                                                                    <div class="panel box box-primary">
                                                                        <div class="box-header with-border">
                                                                            <h4 class="box-title">
                                                                                <a data-toggle="collapse" data-parent="#accordion2" href="#collapseSixteen">
                                                                                    Prescripciones
                                                                                </a>
                                                                            </h4>
                                                                        </div>
                                                                        <div id="collapseSixteen" class="panel-collapse collapse">


                                                                            <div class="col-md-12">
                                                                                <label for="diagnosticoTratar">Interconsultas</label>
                                                                                <textarea name="Intercosnulta" id="Intercosnulta" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['Intercosnulta'] : '') ?></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="diagnosticoTratar">Formulación</label>
                                                                                <textarea name="Formulacion" id="Formulacion" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['Formulacion'] : '') ?></textarea>
                                                                            </div>


                                                                            <div class="col-md-12">
                                                                                <label for="diagnosticoTratar">Paraclínicos</label>
                                                                                <textarea name="Paraclinico" id="Paraclinico" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['Paraclinico'] : '') ?></textarea>
                                                                            </div>

                                                                            <div class="col-md-12">
                                                                                <label for="diagnosticoTratar">Estudios de Imagen</label>
                                                                                <textarea name="Estudiosimagen" id="Estudiosimagen" class="form-control input-lg"><?= (($_GET['key'] == "update") ? $historia_update['Estudiosimagen'] : '') ?></textarea>
                                                                            </div>

                                                                            <br>
                                                                            <!-- esta es la barra del menu-->
                                                                            <div class="tab">
                                                                                <button type="button" class="tablinks" onclick="MenuAntecedentes(event, 'Incapacidades')">Incapacidades</button>
                                                                            </div>
                                                                            <!-- Submodulo Incapacidades -->
                                                                            <div id="Incapacidades" class="tabcontent">
                                                                                <div class="col-md-4">
                                                                                    <br><br>
                                                                                    <button type="button" style="display: initial;" data-target="#modalForm4" data-toggle="modal" title="Agregar Incapacidades" class="btn btn-outline-info btn-lg rounded-pill shadow"><i class="fa fa-plus"> Agregar Incapacidades</i>
                                                                                    </button>
                                                                                </div>
                                                                                <div class="col-md-8">&nbsp;</div>

                                                                                <input type="hidden" id="Arreglo_Incapacidades" name="Arreglo_Incapacidades" value='<?= (($_GET['key'] == "update" && !empty($historia_update['Arreglo_Incapacidades'])) ? $historia_update['Arreglo_Incapacidades'] : '{"0":{"Area_Tratamiento":null}}') ?>'>

                                                                                <div class="table-responsive col-md-12" style="overflow: auto;">
                                                                                    <br><br>
                                                                                    <table id="tabla_incapacidades" class="table table-bordered table-striped" style="width: 100%;">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th style="width:20%">Área de Tratamiento</th>
                                                                                                <th style="width:20%">Recurrencia</th>
                                                                                                <th style="width:20%">Fecha Inicial Incapacidad</th>
                                                                                                <th style="width:20%">Fecha Final Incapacidad</th>
                                                                                                <th style="width:20%">Comentarios</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>

                                                                                        </tbody>
                                                                                        <tfoot>
                                                                                        </tfoot>
                                                                                    </table>
                                                                                </div>
                                                                            </div>
                                                                            <!-- Cierre Submodulo Incapacidades -->
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="form-group">
                                                    <div class="col-md-12">
                                                        <br>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="col-md-12">
                                                        <input type="hidden" name="tipoHistoria" value="<?= $_GET['tipo'] ?>">
                                                        <?php if ($_GET['key'] == "update") : ?>
                                                            <input type="hidden" name="id" value="<?= ($_GET['tipo'] == 2 ? $sesion['id'] : $historia_update['id']) ?>">
                                                            <input type="hidden" name="key" value="update">
                                                            <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%;">Actualizar</button>
                                                        <?php else : ?>
                                                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
                                                            <input type="hidden" name="cliente_id" id="cliente_id" value="<?= $clienteId ?>">
                                                            <?php if (!empty($_GET['idHistoriaSesion'])) : ?>
                                                                <input type="hidden" name="historia_id" value="<?= $_GET['idHistoriaSesion'] ?>">
                                                                <input type="hidden" name="historia_tipo" value="<?= $_GET['tipoHistoria'] ?>">
                                                            <?php endif; ?>
                                                            <?php if (!empty($_GET['idHistoriaEvolucion'])) : ?>
                                                                <input type="hidden" name="historia_id" value="<?= $_GET['idHistoriaEvolucion'] ?>">
                                                                <input type="hidden" name="historia_tipo" value="<?= $_GET['tipoHistoria'] ?>">
                                                            <?php endif; ?>
                                                            <input type="hidden" name="key" value="insert">
                                                            <button type="submit" class="btn btn-block btn-outline-info btn-lg rounded-pill shadow" style="width:100%;">Guardar</button>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- modal incapacidad-->
<div class="modal fade" id="modalForm4" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="exampleModalLabel">Crear Incapacidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>

                <div class="form-group">
                    <label>Área de Tratamiento</label>
                    <input type="text" class="form-control incapacidad_modal" onkeypress="return (event.charCode != 34 && event.charCode != 39)" value="" data-title="Area Tratamiento" />
                    <label>Recurrencia</label>
                    <select class="form-control input-lg incapacidad_modal" data-title="Recurrencia">
                        <option> </option>
                        <option>Única</option>
                        <option>Recurrente</option>
                    </select>
                    <label>Fecha Inicial Incapacidad</label>
                    <input type="date" id="fechaInicial_modal_incapacidad" class="form-control input-lg incapacidad_modal" data-title="Fecha Inicial Incapacidad">

                    <label>Duración en Días</label>
                    <input type="number" id="duracion_modal_incapacidad" class="form-control input-lg" id="duracion" placeholder="Ingrese la Duración en Días">
                    <h5 style="color:red;font-size: 11px;">*Importante* el campo superior [Duración en días] solo será visual para ayudar a calcular la fecha final, por lo que no aparecerá en la impresión de la consulta.</h5>

                    <label>Fecha Final Incapacidad</label>
                    <input type="date" id="fechaFinal_modal_incapacidad" class="form-control input-lg incapacidad_modal" data-title="Fecha Final Incapacidad">

                    <script>
                        const fechaInicialInput = document.getElementById("fechaInicial_modal_incapacidad");
                        const duracionInput = document.getElementById("duracion_modal_incapacidad");
                        const fechaFinalInput = document.getElementById("fechaFinal_modal_incapacidad");

                        fechaInicialInput.addEventListener("input", updateFechaFinal);
                        duracionInput.addEventListener("input", updateFechaFinal);

                        function updateFechaFinal() {
                        const fechaInicial = new Date(fechaInicialInput.value);
                        const duracion = parseInt(duracionInput.value);

                        if (!isNaN(fechaInicial) && !isNaN(duracion)) {
                            const fechaFinal = new Date(fechaInicial);
                            fechaFinal.setDate(fechaFinal.getDate() + duracion);
                            fechaFinalInput.value = fechaFinal.toISOString().substr(0, 10);
                        }
                        }
                    </script>

                    <label>Comentarios</label>
                    <textarea class="incapacidad_modal" style="width: 100%; height: 100px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;margin: 0px;margin-top: 15px;" placeholder="Observaciones" data-title="Comentarios"></textarea>
                    <br><br>

                    <input type="hidden" name="id_configincapacidad" id="id_configincapacidad">
                </div>

                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <a href="#" onclick="$.when(GuardarIncapacidad()).then(tabla_incapacidades());" class="btn btn-default"> <i class="fa fa-glyphicon glyphicon-plus"></i> <strong> Actualizar </strong></a>


            </div>
        </div>
    </div>
</div>


<?php include("footer.php") ?>

<script type="text/javascript">
    function MenuAntecedentes(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace(" active", "");
        }
        document.getElementById(cityName).style.display = "block";
        evt.currentTarget.className += " active";
    }
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////
    // llenar incapacidades//
    ////////////////////////////////////////////////////////////
    ////////////////////////////////////////////////////////////

    function GuardarIncapacidad() {

        var multi = $('.incapacidad_modal');
        var contador = "0";
        var arreglo = {};
        var puntos = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
        for (index in puntos) {
            arreglo[contador] = {};
            arreglo[contador]["Area Tratamiento"] = puntos[index]["Area Tratamiento"];
            arreglo[contador]["Recurrencia"] = puntos[index].Recurrencia;
            arreglo[contador]["Fecha Inicial Incapacidad"] = puntos[index]["Fecha Inicial Incapacidad"];
            arreglo[contador]["Fecha Final Incapacidad"] = puntos[index]["Fecha Final Incapacidad"];
            arreglo[contador]["Comentarios"] = puntos[index].Comentarios;
            contador++;
        }

        arreglo[contador] = {};
        $.each(multi, function(index, item) {

            arreglo[contador][$(item).data('title')] = $(item).val();
        });

        document.getElementById("Arreglo_Incapacidades").value = JSON.stringify(arreglo);


        $('#modalForm4').modal('hide');
    }

    function tabla_incapacidades(unLock = true) {

        var data = JSON.parse(document.getElementById("Arreglo_Incapacidades").value);
        var arreglo = [];
        var contador = "0";
        for (index in data) {
            var arreglotemporal = {};

            arreglotemporal["Area Tratamiento"] = data[index]["Area Tratamiento"];
            arreglotemporal["Recurrencia"] = data[index].Recurrencia;
            arreglotemporal["Fecha Inicial Incapacidad"] = data[index]["Fecha Inicial Incapacidad"];
            arreglotemporal["Fecha Final Incapacidad"] = data[index]["Fecha Final Incapacidad"];
            arreglotemporal["Comentarios"] = data[index].Comentarios;

            arreglo = arreglo.concat(arreglotemporal);
            contador++;
        }

        let pos = 1;

        let arreglo_final = arreglo.splice(pos, contador); // para que seleccione los arreglos despues del primer lugar ya que corresponde al input hidden

        if (unLock) {
            $("#tabla_incapacidades").dataTable().fnDestroy();
        }

        $('#tabla_incapacidades').DataTable({
            data: arreglo_final,
            columns: [{
                    data: "Area Tratamiento"
                },
                {
                    data: "Recurrencia"
                },
                {
                    data: "Fecha Inicial Incapacidad"
                },
                {
                    data: "Fecha Final Incapacidad"
                },
                {
                    data: "Comentarios"
                },
            ]
        });
    }

    tabla_incapacidades(false);
</script>
<!--para que funcione el motivo de consulta al agendar la cita -->
<script>
    const tiempoMotivoConsulta = (id, mascara) => {
    let data = {
      key: "info_motivoConsulta",
      mascara: mascara,
      id: id
    };
    $.ajax({
      url: "./ajax_calendar.php",
      data: data,
      type: "POST",
      dataType: "json",
      success: function(response) {
        console.log(response);
        if (response.status) {
          for (const key in object = response.data[0]) {
            if (Object.hasOwnProperty.call(object, key)) {
              if (key == mascara) {
                $(`#${key}`).val([object[key]]).trigger("change.select2");
                if ($(`#${key}`).val() != object[key]) {
                  $(`#${key}`).append(`<option>${object[key]}</option>`).val([object[key]]).trigger("change.select2");
                }
              }
            }
          }
        }
      }
    });
  };
  </script>
  <script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>
<script>
  // no quitar para evitar problemas de que guarde con este caracter " ' "
  $(document).on('input', 'input[type="text"], textarea', function() {
    $(this).val($(this).val().replace(/[']/g, ''));
  });
</script>

<script src="plugins/LottieK/lottie.min.js"></script>
<?php 
$usuariod_id_autoguardado = $_SESSION["ID"];
$cliente_id_autoguardado = $_GET['clienteId'];
$Nombre_Tabla_autoguardado = $tablas[$_GET['tipo']];//nombre de la tabla de la base de datos de la historia

//include 'AutoGuardados/OndasChoque/AutoGuardado_Historia_OndasChoque.php';//ruta donde se encuentra el autoguardado, si tiene que modificar el autoguardado crear un nuevo y aqui actualizar la ruta si no tiene que modificar y cumple con el comentario de abajo usar el de abajo
include 'AutoGuardado_Historia.php';//usar esta si no tienen que modificar el archivo y la ruta no tiene el get codificado

?>