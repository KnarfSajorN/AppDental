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

if ($_POST) {
    $action = $_POST['action'];
    if ($action == 'actualizarEstado') {
        $id = $_POST['id'];
        $estado = $_POST['estado'];

        if ($estado == 1) {
            // se va a activar este bot, entonces el resto se desactivan
            $query = "UPDATE chat_menu_header SET estado = '0' WHERE id != '{$id}'";
            $result = mysqli_query($connDenysCliente, $query);

            $query = "UPDATE chat_menu_header SET estado = '{$estado}' WHERE id = '{$id}'";
            $result = mysqli_query($connDenysCliente, $query);
            if ($result) {
                echo '
                <script>
                    alert("Actualizado Correctamente");
                    window.location.href="masivoWAMensajes";
                </script>
                ';
            }
        } else {
            // se va a desactivar este bot, entonces se valida que al menos uno este activo, sino no continua
            $query = "SELECT * from chat_menu_header WHERE estado = '1' and id != '{$id}'";
            $result = mysqli_query($connDenysCliente, $query);
            if (mysqli_num_rows($result) == 0) {
                echo '
                <script>
                    alert("No puedes desactivar todos los Bots");
                    window.location.href="masivoWAMensajes";
                </script>
                ';
            }
        }
    }
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
                            <a class="nav-item nav-link active" href="./masivoWAMensajes">Mensajes</a>
                            <a class="nav-item nav-link" href="./masivoWAChatConfig">Usuarios de chat</a>
                            <a class="nav-item nav-link" href="./masivoWAFormularios">Formularios</a>
                        </nav>
                    </div>
                </div>
            </div>


            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Palabras clave</h3>
                    </div>
                    <form id="palabrasClaveForm">
                        <?php
                        $queryConfig = "SELECT * from config limit 1";
                        $resultConfig = mysqli_query($connDenysCliente, $queryConfig);
                        $rowConfig = mysqli_fetch_array($resultConfig);
                        if ($rowConfig) {
                            $type = 2;
                            $idUpdate = $rowConfig['id'];
                        } else {
                            $type = 1;
                            $idUpdate = '';
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="palabraInicio">Menu Principal</label>
                                <input type="text" class="form-control" id="palabraInicio" name="datos[palabraInicio]" placeholder="Menu Principal" value="<?= $rowConfig['palabraInicio'] ?>" onchange="match(this);">
                                <small>Palabra para Regresar al menu de opciones</small>
                                <small class="text-danger pl-3">Ej: Inicio</small>
                            </div>
                            <div class="form-group">
                                <label for="palabrasClave">Palabras clave</label>
                                <input type="text" class="form-control" id="palabrasClave" name="datos[palabrasClave]" placeholder="Palabras clave" value="<?= $rowConfig['palabrasClave'] ?>">
                                <p>Define palabras que el cliente puede usar para activar el sistema de bot</p>
                                <small>Cada palabra o frase debe ir separada por ;</small>
                                <small class="text-danger pl-3">Ej: Hola;Buenos Días</small>
                            </div>
                        </div>
                        <div class="card-footer">
                            <input type="hidden" name="datos[idDenys]" value="<?= $rowConsultaDenys['id'] ?>">
                            <input type="hidden" name="datos[usuarioId]" value="<?= $rowConsultaDenys['id'] ?>">
                            <button type="submit" class="btn btn-outline-info rounded-pill" onclick="$('#palabrasClaveForm').automaticForm({type:<?= $type ?>,idUpdate:'<?= $idUpdate ?>',table:'config',reload:'',page:'masivoWAMensajes',dbHost:'205.209.96.94:3306',dbUser:'denysbot',dbPass:'BNe4nxQZDwHK8vi',db:'denysbot_<?= $rowConsultaDenys['id'] ?>'});">
                                <i class="fa fa-save mr-1"></i>
                                Guardar</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-md-12">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Bots del sistema</h3>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Fecha</th>
                                    <th>Nombre</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * from chat_menu_header";
                                $result = mysqli_query($connDenysCliente, $query);
                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                    <tr>
                                        <td><?= $row['id'] ?></td>
                                        <td><?= $row['fecha'] ?></td>
                                        <td>
                                            <form id="chat_menu_header_<?= $row['id'] ?>">
                                                <div class="input-group mb-3">
                                                    <input type="text" class="form-control" name="datos[nombre]" value="<?= $row['nombre'] ?>">
                                                    <div class="input-group-append">
                                                        <button class="input-group-text" type="submit" onclick="$('#chat_menu_header_<?= $row['id'] ?>').automaticForm({type:2,idUpdate:'<?= $row['id'] ?>',table:'chat_menu_header',reload:'',page:'masivoWAMensajes',dbHost:'205.209.96.94:3306',dbUser:'denysbot',dbPass:'BNe4nxQZDwHK8vi',db:'denysbot_<?= $rowConsultaDenys['id'] ?>'});">
                                                            <i class="fas fa-check"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                        </td>
                                        <td class="center text-center">
                                            <p class="text-<?= ($row['estado'] == 1 ? 'info' : 'danger') ?>"><?= ($row['estado'] == 1 ? 'Activo' : 'Inactivo') ?></p>

                                            <a target="_blank" href="./denysbot?iB=<?= base64_encode($row['id']) ?>" class="btn btn-outline-info rounded-pill btn-block" title="Editar">
                                                <i class="fas fa-pencil"></i>
                                            </a>

                                            <form method="post">
                                                <button type="submit" class="btn btn-outline-<?= ($row['estado'] == 1 ? 'danger' : 'success') ?> rounded-pill btn-block mt-2" tittle="<?= ($row['estado'] == 1 ? 'Desactivar' : 'Activar') ?>">
                                                    <input type="hidden" name="id" value="<?= $row['id'] ?>">
                                                    <input type="hidden" name="estado" value="<?= ($row['estado'] == 1 ? 0 : 1) ?>">
                                                    <input type="hidden" name="action" value="actualizarEstado">
                                                    <i class="fas fa-<?= ($row['estado'] == 1 ? 'times' : 'check') ?>"></i>
                                                </button>
                                            </form>

                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-outline-info rounded-pill" href="./denysbot" target="_blank">
                            <i class="fas fa-plus"></i>
                            Nuevo Bot
                        </a>
                    </div>
                </div>
            </div>


        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/emojionearea/3.4.2/emojionearea.min.js"></script>
<script>
    function match(usuario) {
        usuario.value = usuario.value.replace(" ", "");
        // if (usuario.value[0] !== "#") {
        //     usuario.value = "#" + usuario.value
        // }
        botones(usuario);
    }

    function botones(usuario) {
        // ajax para botones y saludo
        $.ajax({
            url: "ajax_consultarHash.php",
            type: "POST",
            data: {
                palabra: usuario.value
            },
            success: function(data) {
                if (data) {
                    if (data == true) {
                        window.alert("Hashtag ya utilizado");
                        usuario.value = "";
                    }
                }
            }
        })
    }

    function quienFue(tipo) {
        if (tipo == 1) {
            // quitar atributo readonly en id hashtag
            document.getElementById("elhashtag").style.display = "block";
            document.getElementById("eltitulo").style.display = "block";
            document.getElementById("elmensaje").style.display = "none";
        } else if (tipo == 2) {
            // se oculta div de titulo
            document.getElementById("elhashtag").style.display = "none";
            document.getElementById("eltitulo").style.display = "none";
            document.getElementById("elmensaje").style.display = "block";

        }
    }

    let message, activarMenu;
    message = "Hola";

    let palabras = ['#Principal', 'Hola', 'Buenos días', 'Buenas tardes'];
    for (let i = 0; i < palabras.length; i++) {
        if (palabras[i] == message) {
            activarMenu = message;
        }
    }
    console.log(activarMenu);
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#texti").emojioneArea();
    });
</script>
<!-- <script src="javascript/systemMsg.js"></script> -->
<?php
include '../footer.php';

?>