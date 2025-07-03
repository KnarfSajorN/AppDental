<?php
include 'header.php';
include 'menu.php';

$idHistoria = $_GET['id'];
$tipoHistoria = $_GET['tipoHistoria'];
$tablas = [
    0 => "HT_OndasChoque",
    1 => "HT_OndasChoqueBilateral",
    2 => "sesionesAplicadas",
    3 => "evolucionesTratamiento"
];



if ($tipoHistoria == 2) {
    $tabla = $tablas[$tipoHistoria];
    $sesion = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$idHistoria}'") or die(mysqli_error($conn3));
    if (!empty(mysqli_num_rows($sesion))) {
        $sesion = mysqli_fetch_assoc($sesion);
    }
    $tablaHistoria = $tablas[$sesion['historia_tipo']];
    $historia = mysqli_query($conn3, "SELECT * FROM {$tablaHistoria} WHERE id = '{$sesion['historia_id']}'") or die(mysqli_error($conn3));
} else {
    $tabla = $tablas[$tipoHistoria];
    $historia = mysqli_query($conn3, "SELECT * FROM {$tabla} WHERE id = '{$idHistoria}'") or die(mysqli_error($conn3));
}

if (!empty(mysqli_num_rows($historia))) {
    $historia = mysqli_fetch_assoc($historia);
}

if (isset($_GET['key'])) {
    if ($_GET['key'] == "enviarFirma") {
        $mensajeW = " Sr(a) *" . funcionMaster($historia['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado un documento por el Doctor " . utf8_encode(funcionMaster($historia['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios')) . ", el presente documento necesita ser firmado, para firmar el documento acceder al siguiente Link: {$Base}FirmasPacientes/FirmarDocumentoDinamico/{$_GET['id']}/{$_GET['tipoHistoria']}";
        $action = 0;
        $Whatsapp = funcionMaster($historia['cliente_id'], 'cliente_id', 'whatsapp', 'cliente');
        Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $historia['cliente_id'], $historia['usuario_id'], $Whatsapp, $action);
    }
    if ($_GET['key'] == "enviarDocumento") {
        $mensajeW = " Sr(a) *" . funcionMaster($historia['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado un documento por el Doctor " . utf8_encode(funcionMaster($historia['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios')) . ", para visualizarla entrar en el siguiente link, Link: {$Base}TCB_Imprimir_Historias?id={$_GET['id']}&tipoHistoria={$_GET['tipoHistoria']}";
        $action = 0;
        $Whatsapp = funcionMaster($historia['cliente_id'], 'cliente_id', 'whatsapp', 'cliente');
        Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $historia['cliente_id'], $historia['usuario_id'], $Whatsapp, $action);
    }
    if ($_GET['key'] == "enviarEvolucion") {
        $mensajeW = " Sr(a) *" . funcionMaster($historia['cliente_id'], 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado una evolución por el Doctor " . utf8_encode(funcionMaster($historia['usuario_id'], 'ID', 'NOMBRE_USUARIO', 'usuarios')) . ", para visualizarla entrar en el siguiente link, Link: {$Base}TCB_Imprimir_Evoluciones_Tratamientos?id={$_GET['id']}&tipoHistoria={$_GET['tipoHistoria']}";
        $action = 0;
        $Whatsapp = funcionMaster($historia['cliente_id'], 'cliente_id', 'whatsapp', 'cliente');
        Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $historia['cliente_id'], $historia['usuario_id'], $Whatsapp, $action);
    }
    echo "<script type='text/javascript'>window.location.href='TCB_Finalizado_Historias?id={$_GET['id']}&tipoHistoria={$_GET['tipoHistoria']}'</script>";
}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <!--
    <section class="content-header">
        <h1>
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#"> </a></li>
        </ol>
    </section>-->

    <br><br>
    <section class="content">
        <div class="box">
            <div class="box-body">
        <div align="center">
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>TCB_Pacientes">
                <i class="fa fa-heartbeat"></i> Nueva Consulta
            </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>agregarCitas">
                <i class="fa fa-calendar-check-o"></i> Agregar Cita
            </a>
            <a class="btn btn-outline-info btn-lg rounded-pill shadow" href="<?php echo $Base; ?>SclienteAdministracion_facturas">
                <i class="fa fa-plus"></i> Facturas
            </a>
        </div>
        <hr>
        <div align="center">
            <?php if ($tipoHistoria == 3) : ?>
                <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>TCB_Imprimir_Evoluciones_Tratamientos?id=<?= $_GET['id'] ?>&tipoHistoria=<?= $_GET['tipoHistoria'] ?>">
                    <i class="fa fa-print"></i> Imprimir Evolución
                </a>

                <?php 
        $botonesImprimir = [
          ['Evolución', base64_encode($Base.'TCB_Imprimir_Historias_plantilla.php?id='.encrypt($_GET['id']).'&tipoHistoria='. $_GET['tipoHistoria'].'')],       
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

            <?php else : ?>
                <!--
                <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>TCB_Imprimir_Historias.php?id=<?= ($tipoHistoria == 2 ? $sesion['historia_id'] : $_GET['id']) ?>&tipoHistoria=<?= ($tipoHistoria == 2 ? $sesion['historia_tipo'] : $_GET['tipoHistoria']) ?>">
                    <i class="fa fa-print"></i> Imprimir Consulta
                </a>
                -->

                <a class="btn btn-outline-info btn-lg rounded-pill shadow" target="_blank" href="<?php echo $Base; ?>TCB_Imprimir_Historias?id=<?= $_GET['id']; ?>&tipoHistoria=<?=$_GET['tipoHistoria'];?>">
                    <i class="fa fa-print"></i> Imprimir Consulta
                </a>

                 <?php 
        $botonesImprimir = [
          ['Consulta', base64_encode($Base.'TCB_Imprimir_Historias_plantilla.php?id='.encrypt($_GET['id']).'&tipoHistoria='. $_GET['tipoHistoria'].'')],       
        ];
        $_GET['botones'] = base64_encode(json_encode($botonesImprimir));
        include './creadorImpresiones/seleccionarMetodoImpresion.php';
      ?>

            <?php endif; ?>
            <hr>
            <?php if ($tipoHistoria == 0 || $tipoHistoria == 1) : ?>
                <div align="center">
                    <a class="btn btn-outline-info btn-lg rounded-pill shadow"  href="<?php echo $Base; ?>TCB_Finalizado_Historias?id=<?= $_GET['id'] ?>&tipoHistoria=<?= $_GET['tipoHistoria'] ?>&key=enviarDocumento">
                        <i class="fa fa-send-o"></i> Enviar Consulta
                    </a>
                </div>
                <div align="center">
                    <hr>
                </div>
            <?php endif;?>
            <?php if ($tipoHistoria == 2) : ?>
                <div align="center">
                    <a class="btn btn-outline-info btn-lg rounded-pill shadow"  href="<?php echo $Base; ?>TCB_Finalizado_Historias?id=<?= $_GET['id'] ?>&tipoHistoria=<?= $_GET['tipoHistoria'] ?>&key=enviarDocumento">
                        <i class="fa fa-send-o"></i> Enviar Consulta
                    </a>
                </div>
                <div align="center">
                    <hr>
                </div>
                <div align="center">
                    <?php
                    $queryList = mysqli_query($conn3, "SELECT Firma FROM {$tabla} WHERE id = '{$idHistoria}'");
                    $nrowl = mysqli_num_rows($queryList);
                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                        $firma = $rowMotorizado['Firma'];
                    }
                    if (strlen($firma) > 10) {
                        echo "<img src='$firma'>";
                    } else {
                    ?>
                        <a class="btn btn-block btn-outline-info btn-lg rounded-pill shadow"  href="<?php echo $Base; ?>TCB_Finalizado_Historias?id=<?= $_GET['id'] ?>&tipoHistoria=<?= $_GET['tipoHistoria'] ?>&key=enviarFirma">
                            <i class="fa fa-pencil-square-o"></i> Solicitar Firma
                        </a>
                    <?php
                    }
                    ?>
                </div>
            <?php endif; ?>

            <hr>
            <?php if ($tipoHistoria == 3) : ?>
                <div align="center">
                    <a class="btn btn-outline-info btn-lg rounded-pill shadow"  href="<?php echo $Base; ?>TCB_Finalizado_Historias?id=<?= $_GET['id'] ?>&tipoHistoria=<?= $_GET['tipoHistoria'] ?>&key=enviarEvolucion">
                        <i class="fa fa-send-o"></i> Enviar Evolución
                    </a>
                </div>
            <?php endif; ?>

            </div>
            </div>

        </div>
    </section>
</div>
<?php include("footer.php") ?>