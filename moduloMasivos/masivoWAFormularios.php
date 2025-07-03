<?php

// verificar tablas creadas
include '../../whatsappPersonalizadoList.php';
// include './ws_createTables.php';
include '../header.php';
include '../menu.php';
// include 'loading.php';
$ID = $_SESSION['ID'];


// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa

include 'buscarWhatsapp.php';

if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: 205.209.96.94
    // var_dump($denysPuerto, $denysServer);
    // conexion a denysbot
    // $connDenys = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_sistema', '3306');
    // conexion denys nueva 16 10 2023
    $connDenys = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", "denysbot_sistema");

    $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
    $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
    $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
    // si hay resultados armamos la conexión al cliente
    if (mysqli_num_rows($resultConsultaDenys) > 0) {
        // $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
        $connDenysCliente = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", 'denysbot_' . $rowConsultaDenys['id']);
    }
} else {
    echo '
    <script>
        alert("No tienes WhatsApp personalizado Activo");
        window.location.href="portada";
    </script>
    ';
}


?>

<!-- jquery cdn -->
<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<!-- emojis -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.css">
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">WhatsApp Mensajes Automáticos</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <nav class="nav nav-pills nav-fill">
                            <a class="nav-item nav-link" href="./masivoWASaludo">Saludo</a>
                            <a class="nav-item nav-link" href="./masivoWAMensajes">Mensajes</a>
                            <a class="nav-item nav-link" href="./masivoWAChatConfig">Usuarios de chat</a>
                            <a class="nav-item nav-link active" href="./masivoWAFormularios">Formularios</a>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Formularios de Bots</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Formulario</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT chat.*,header.nombre from chat_menu chat
                                left join chat_menu_header header on chat.nodeIdHeader = header.id
                                where 1=1
                                and chat.estado = 1
                                and chat.nodeName = 'formulario'
                                and (chat.nodeForm is not null and chat.nodeForm <> '')
                                ";
                                $result = mysqli_query($connDenysCliente, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                <tr>
                                    <td>
                                        <p>Bot: <strong><?= $row['nodeIdHeader']; ?> <?= $row['nombre']; ?></strong> | Nombre: <strong><?= $row['nodeForm']; ?></strong> </p>
                                    </td>
                                    <td>
                                        <a href="./masivoWAFormulariosReporte?iM=<?= base64_encode($row['id']) ?>" class="btn btn-outline-info rounded-pill btn-block">
                                            <i class="fas fa-print"></i>
                                            Ver Registros
                                        </a>
                                    </td>
                                </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- <script src="javascript/systemMsg.js"></script> -->
<?php
include '../footer.php';

?>