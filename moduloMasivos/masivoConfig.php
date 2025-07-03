<?php

// verificar tablas creadas
include '../../whatsappPersonalizadoList.php';
include './ws_createTables.php';
include '../header.php';
include '../menu.php';
include 'loading.php';
$ID = $_SESSION['ID_principal'];


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
                <h4 class="Titulo_Pagina">
                    Configuración WhatsApp Personalizado y Correo Electrónico
                </h4>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>WhatsApp Personalizado</h4>
                                </div>
                                <div class="float-right <?= $tieneWhatsApp == true ? 'd-none' : 'd-none' ?>">
                                    <button class="btn btn-light rounded-pill" data-toggle="modal" data-target="#modalwhatsapp">
                                        <i class="fas fa-question"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalwhatsapp" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <?php include 'textoConfigWhatsApp.php'; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <?php if ($tieneWhatsApp == true) : ?>
                                    <div class="row">
                                        <div class="center text-center">
                                            <div class="col-md-12">
                                                <i class="fab fa-whatsapp fa-5x text-info mb-3"></i>
                                                <h4>Consulta el estado del servicio desde el siguiente botón.</h4>
                                                <a href="http://<?= $link[$miSistema[1]][1] ?>:<?= $link[$miSistema[1]][0] ?>" target="_blank" class="btn mr-1 btn-success rounded-pill">
                                                    Consultar
                                                </a>
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
                                    <!-- <div class="row">
                                                <div class="btn-group"> -->
                                    <a href="./masivoWASaludo" class="btn mr-1 btn-outline-info rounded-pill btn-block text-left" title="Configurar Saludo">
                                        <i class="fas fa-gear mr-1"></i>
                                        Configurar Saludo (Mensaje de Bienvenida)
                                    </a>
                                    <a href="./masivoWAMensajes" class="btn mr-1 btn-outline-info rounded-pill btn-block text-left" title="Configurar Mensajes">
                                        <i class="fas fa-gear mr-1"></i>
                                        Configurar Mensajes (Bot, preguntas y respuestas)
                                    </a>
                                    <a href="./masivoWAChatConfig" class="btn mr-1 btn-outline-info rounded-pill btn-block text-left" title="Configurar Chat">
                                        <i class="fas fa-gear mr-1"></i>
                                        Configurar usuarios de Chat
                                    </a>
                                    <a href="./masivoWAChatConfigApi" class="btn mr-1 btn-outline-info rounded-pill btn-block text-left" title="Api de consumo">
                                        <i class="fas fa-gear mr-1"></i>
                                        Api de consumo (para desarrolladores)
                                    </a>
                                    <!-- </div>
                                            </div> -->
                                <?php else : ?>
                                    <div class="row">
                                        <?php 
                                        // datos para botón de pago / WhatsApp anual
                                        $inventario = base64_encode(132);
                                        $cliente = mysqli_fetch_assoc(mysqli_query($conn_sistema,"SELECT idBitacora from clienteActivo where codigoPrincipal like '{$sistemaActual[1]}' limit 1 "));
                                        $cliente = base64_encode($cliente['idBitacora']);
                                        $tabla = base64_encode('sinvetrios');
                                        ?>
                                        <a href="https://sievensoft.com/sistema/portalPagos/0&m=<?=$inventario?>&b=<?=$cliente?>&t=<?=$tabla?>" target="_blank" class="btn mr-1 btn-success rounded-pill">
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
                    <div class="col-md-6">
                        <div class="card card-info">
                            <div class="card-header">
                                <div class="float-left">
                                    <h4>Correo Electrónico</h4>
                                </div>
                                <!-- botón a la derecha -->
                                <div class="float-right">
                                    <button class="btn btn-light rounded-pill" data-toggle="modal" data-target="#modalCorreo">
                                        <i class="fas fa-question"></i>
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="modalCorreo" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-body">
                                                    <?php include 'textoConfigCorreo.php'; ?>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary rounded-pill" data-dismiss="modal">Cerrar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form id="correoForm">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="">Nombre con el que se le enviara el correo</label>
                                        <input type="text" class="form-control" id="" placeholder="Ejemplo: Lorem Ipsum" required name="datos[setFrom]" value="<?= $rowConfig['setFrom'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Dirección de correo electrónico</label>
                                        <input type="email" class="form-control" id="" placeholder="Ejemplo: correo@ejemplo.com" required name="datos[Username]" value="<?= $rowConfig['Username'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Contraseña</label>
                                        <input type="password" class="form-control" id="" required name="datos[Password]" value="<?= $rowConfig['Password'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Servidor de correo electrónico</label>
                                        <input type="text" class="form-control" id="" placeholder="Ejemplo: smtp.gmail.com" required name="datos[Host]" value="<?= $rowConfig['Host'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Puerto</label>
                                        <input type="number" class="form-control" id="" required name="datos[Port]" value="<?= $rowConfig['Port'] ?>" autocomplete="new-password">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tipo de Seguridad</label>
                                        <select name="datos[smtp]" class="form-control" id="">
                                            <option value="tls" <?= $rowConfig['smtp'] == 'tls' ? 'selected' : '' ?>>TLS</option>
                                            <option value="ssl" <?= $rowConfig['smtp'] == 'ssl' ? 'selected' : '' ?>>SSL</option>
                                        </select>
                                        <!-- <input type="text" class="form-control" id="" required name="datos[smtp]" value="<?= $rowConfig['smtp'] ?>" autocomplete="new-password"> -->
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <input type="hidden" name="datos[usuario_id]" value="<?= $ID ?>">
                                    <input type="hidden" name="datos[fecha]" value="<?= date('y-m-d H:i:s') ?>">
                                    <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#correoForm').automaticForm({type:<?= ($rowConfig == null ? 1 : 2) ?>, table:'ws_correo',idUpdate:'<?= ($rowConfig == null ? 0 : $rowConfig['id']) ?>',reload:'',page:'masivoConfig'});">
                                        <i class="fa fa-save mr-1"></i>
                                        Guardar
                                    </button>
                                </div>
                            </form>
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