<?php

// verificar tablas creadas
include '../../whatsappPersonalizadoList.php';
include './ws_createTables.php';
include '../header.php';
include '../menu.php';
include 'loading.php';
$ID = $_SESSION['ID'];


// consulta ta tabla de correos para ver si esta configurado
$queryConfig = "SELECT * from ws_correo where usuario_id = '{$ID}';";
// var_dump($queryConfig);
$resultConfig = mysqli_query($conn3, $queryConfig);
$rowConfig = mysqli_fetch_assoc($resultConfig);
// var_dump($rowConfig);

// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa

include 'buscarWhatsapp.php';

?>

<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Contactos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="copyPaste"></div>
        <div class="">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>WhatsApp Personalizado: Api de consumo</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($tieneWhatsApp == true) : ?>
                                    <div class="row">
                                        <div class="center text-center">
                                            <div class="col-md-12">
                                                <p class="text-muted">Esta sección esta orientada a facilitar el uso del servicio de WhatsApp personalizado en aplicaciones de terceros o desarrollos externos a <strong>Dentalsoft+</strong></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php else : ?>
                                    <div class="row">
                                        <div class="center text-center">
                                            <div class="col-md-12">
                                                <i class="fas fa-exclamation-triangle fa-5x text-info mb-3"></i>
                                                <h4>Actualmente no cuenta con el servicio de WhatsApp personalizado y no se puede configurar.</h4>
                                                <h6 class="text-muted">Si desea activar el servicio por favor comuníquese con nuestro equipo de soporte para obtener más información.</h6>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="card-footer">
                                <?php if ($tieneWhatsApp == true) : ?>
                                    <label>Point de envío:</label>
                                    <p>https://ponkis.com/Api/Medical/</p>
                                    <label>Token:</label>
                                    <p><?= base64_encode('<' . $link[$miSistema[1]][2] . '>') ?></p>
                                    <label>Password:</label>
                                    <p><?= md5($link[$miSistema[1]][2]) ?></p>
                                    <label>Ejemplo de objeto:</label>
                                    <p>A continuación puede ver un <strong>Json</strong> para envío de mensajes,
                                        Importante el numero de teléfono a enviar debe estar formateado de la siguiente manera: <span class="text-danger">CÓDIGO_PAÍS</span><span class="text-info">NÚMERO_TELEFÓNICO</span></p>
                                    <code>
                                        {
                                        "token": "valor_del_token",
                                        "pass": "valor_del_password",
                                        "tipo": "4",
                                        "telefono": "570000000000",
                                        "mensaje": "Mensaje a enviar"
                                        }
                                    </code>
                                    <label for="">Ejemplo de código para envío de mensajes en PHP</label>
                                    <textarea class="CodeMirror">
$url = 'https://ponkis.com/Api/Medical/';
$ch = curl_init($url);
$arreglo = array(
    "token" => "valor_del_token",
    "pass" => "valor_del_password",
    "tipo" => "4",
    "telefono" => "570000000000",
    "mensaje" => "Mensaje a enviar",
);
$payload = json_encode($arreglo);
curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
print("<pre>" . print_r($result, true) . "</pre>");
curl_close($ch);     
                                    </textarea>
                                <?php else : ?>
                                    <div class="row">
                                        <?php
                                        // datos para botón de pago / WhatsApp anual
                                        $inventario = base64_encode(132);
                                        $cliente = mysqli_fetch_assoc(mysqli_query($conn_sistema, "SELECT idBitacora from clienteActivo where codigoPrincipal like '{$link[$miSistema[1]][2]}' limit 1 "));
                                        $cliente = base64_encode($cliente['idBitacora']);
                                        $tabla = base64_encode('sinvetrios');
                                        ?>
                                        <a href="https://sievensoft.com/sistema/portalPagos/0&m=<?= $inventario ?>&b=<?= $cliente ?>&t=<?= $tabla ?>" target="_blank" class="btn mr-1 btn-success rounded-pill">
                                            <i class="fas fa-shopping-cart mr-1"></i>
                                            Adquirir Servicio
                                        </a>
                                        <a href="https://wa.me/17865917681?text=<?= urlencode('Quiero saber más sobre el WhatsApp personalizado') ?>" target="_blank" class="btn mr-1 btn-secondary rounded-pill">
                                            <i class="fab fa-whatsapp mr-1"></i>
                                            Quiero saber más
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php
include '../footer.php';
?>