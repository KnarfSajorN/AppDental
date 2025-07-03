<?php

// verificar tablas creadas
include '../../whatsappPersonalizadoList.php';
// include './ws_createTables.php';
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

include 'buscarWhatsapp.php';

if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: 205.209.96.94

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



        // si no existe tabla usuarios
        $queryCreate = "CREATE TABLE `chat_usuarios` (
                `id` int(11) NOT NULL AUTO_INCREMENT,
                `fechaRegistro` datetime DEFAULT current_timestamp(),
                `idMedical` text DEFAULT NULL,
                `nombre` text DEFAULT NULL,
                `especialidad` text DEFAULT NULL,
                `estadoDenys` text DEFAULT NULL,
                `lt` text DEFAULT NULL,
                `ld` text DEFAULT NULL,
                `lh` text DEFAULT NULL,
                `mt` text DEFAULT NULL,
                `md` text DEFAULT NULL,
                `mh` text DEFAULT NULL,
                `et` text DEFAULT NULL,
                `ed` text DEFAULT NULL,
                `eh` text DEFAULT NULL,
                `jt` text DEFAULT NULL,
                `jd` text DEFAULT NULL,
                `jh` text DEFAULT NULL,
                `vt` text DEFAULT NULL,
                `vd` text DEFAULT NULL,
                `vh` text DEFAULT NULL,
                `st` text DEFAULT NULL,
                `sd` text DEFAULT NULL,
                `sh` text DEFAULT NULL,
                `dt` text DEFAULT NULL,
                `dd` text DEFAULT NULL,
                `dh` text DEFAULT NULL,
                `hashDenys` text DEFAULT NULL,
                PRIMARY KEY (`id`)
              );
              ";
        mysqli_query($connDenysCliente, $queryCreate);
    }
} else {
    echo '
    <script>
        alert("No tienes WhatsApp personalizado Activo");
        window.location.href="portada";
    </script>
    ';
}

$usuarioId = $_SESSION['ID'];
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$queryList = mysqli_query($conn3, "SELECT * FROM  config where   ID_Usuario=$usuarioId");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $logoF = $rowMotorizado['logoF'];
}

if (strlen($logoF) > 1) {
    $logo = '<img src="' . $Base . '/logos/' . $logoF . '" height="50%" width="50%" class="user-image" alt="User Image">';
} else {
    $logo = '<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">';
}

$QueryUsuarios = mysqli_query($conn3, "SELECT * FROM  usuarios where   ID = $usuarioId");
while ($RowUsuarios = mysqli_fetch_array($QueryUsuarios)) {
    $MENU_NOMBRE_USUARIO = $RowUsuarios['NOMBRE_USUARIO'];
}

?>

<!-- emojis -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">WhatsApp Chat</a></li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">

        <div class="row">
            <?php if ($_GET['sc'] == null) : ?>
                <?php
                $querySalas = "SELECT id, nombre, especialidad from chat_usuarios where estadoDenys = 1;";
                $resultSalas = mysqli_query($connDenysCliente, $querySalas);
                $salas[] = [
                    'id' => 0,
                    'nombre' => 'General',
                    'especialidad' => 'General',
                ];
                while ($rowSalas = mysqli_fetch_assoc($resultSalas)) {
                    $salas[] = $rowSalas;
                }
                $randomTheme = [
                    "info",
                    "primary",
                    "secondary",
                    "success",
                    "danger",
                    "indigo",
                    "purple",
                    "pink",
                    "lightblue",
                    "teal",
                    "cyan",
                    "gray",
                    "warning",
                    "orange",
                ];
                ?>
                <?php for ($i = 0; $i < count($salas); $i++) : ?>
                    <?php
                    // consulta de mensajes sin leer
                    $queryMensajes = "SELECT count(id) as cuantos from chat where idUsuario = '{$salas[$i]['id']}' and estado = 0 and tipo = 1;";
                    $resultMensajes = mysqli_query($connDenysCliente, $queryMensajes);
                    $rowMensajes = mysqli_fetch_assoc($resultMensajes);

                    $queryChats = "SELECT id from chat where idUsuario = '{$salas[$i]['id']}' group by numeroFrom;";
                    $resultChats = mysqli_query($connDenysCliente, $queryChats);
                    $cuantoChats = mysqli_num_rows($resultChats);

                    ?>
                    <div class="col-lg-6 col-12">
                        <a href="?sc=<?= encrypt($salas[$i]['id']) ?>" class="small-box">
                            <div class="small-box bg-<?= $randomTheme[rand(0, count($randomTheme) - 1)] ?>">
                                <div class="inner">
                                    <h4><?= $salas[$i]['nombre'] ?> - <?= $salas[$i]['especialidad'] ?></h4>
                                    <h3><?= number_format($rowMensajes['cuantos']) ?></h3>
                                    <p>mensajes sin leer</p>
                                    <h3><?= number_format($cuantoChats) ?></h3>
                                    <p>Chats</p>
                                </div>
                                <div class="icon">
                                    <i class="fab fa-whatsapp" style="font-size: 10rem;"></i>
                                </div>
                                <span class="small-box-footer">ir al chat <i class="fas fa-arrow-circle-right"></i></span>
                            </div>
                        </a>
                    </div>
                <?php endfor ?>
            <?php else : ?>
                <?php
                $idUsuario = decrypt($_GET['sc']);
                if ($idUsuario == 0) {
                    $rowUsuario['id'] = 0;
                    $rowUsuario['nombre'] = 'General';
                    $rowUsuario['especialidad'] = 'General';
                } else {
                    $queryUsuario = "SELECT * from chat_usuarios where id = '$idUsuario'";
                    // var_dump($queryUsuario);
                    $resultUsuario = mysqli_query($connDenysCliente, $queryUsuario);
                    $rowUsuario = mysqli_fetch_assoc($resultUsuario);
                }

                ?>
                <div class="container-fluid">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header p-2">
                                    <ul class="nav nav-pills">
                                        <li class="nav-item"><a class="nav-link active" href="#contactos" data-toggle="tab">Contactos</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Chats Abiertos</a></li>
                                    </ul>
                                </div>
                                <div class="card-body p-1">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="contactos">
                                            <table id="Tabla_Rapida_AJAX" class="table table-striped">
                                                <tbody>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="tab-pane" id="timeline">
                                            <ul class="contacts-list" id="chatsList1"></ul>
                                            <ul class="contacts-list" id="chatsList2"></ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-8">
                            <div class="card">
                                <div class="card-header bg-primary p-2">
                                    <h5 class="float-right" id="nombreContacto"></h5>
                                    <h5 class="float-left" id="numeroContacto"></h5>
                                </div>
                                <div class="card-body p-1">
                                    <div id="loader" class="loader" style="display: none;"></div>
                                    <style>
                                        .loader {
                                            position: absolute;
                                            top: 0;
                                            left: 0;
                                            right: 0;
                                            bottom: 0;
                                            margin: auto;
                                            border: 4px solid #f3f3f3;
                                            border-top: 4px solid #3498db;
                                            border-radius: 50%;
                                            width: 40px;
                                            height: 40px;
                                            animation: spin 1s linear infinite;
                                            z-index: 9999999;
                                        }

                                        @keyframes spin {
                                            0% {
                                                transform: rotate(0deg);
                                            }

                                            100% {
                                                transform: rotate(360deg);
                                            }
                                        }
                                    </style>
                                    <input id="numeroMessage" type="hidden" value="0">
                                    <div id="verMensajesAnteriores"></div>
                                    <div class="direct-chat-messages"></div>
                                </div>
                                <div class="card-footer" style="display: none;">
                                    <div class="input-group">
                                        <span class="input-group-append">
                                            <label type="button" class="btn btn-success" onclick="scrollDown();" id="scroll">
                                                <i class="fas fa-angle-down"></i>
                                            </label>
                                        </span>
                                        <span class="input-group-append">
                                            <label type="button" class="btn btn-danger" data-filter-btnf disabled="disabled" title="Finalizar chat" onclick="finalizarChat();">
                                                <i class="fas fa-times"></i>
                                            </label>
                                        </span>
                                        <input type="text" id="messageCuerpo" name="messageCuerpo" placeholder="Escribe un mensaje aquí." class="form-control form-control-border border-width-2">
                                        <span class="input-group-append">
                                            <input type="file" name="messageArchivo" id="messageArchivo" style="display: none" accept="audio/mp3,video/mp4,image/jpeg,image/png,application/pdf,application/msword" onchange="sendMessage()" ;>
                                            <label for="messageArchivo" class="btn btn-light">
                                                <i class="fas fa-paperclip"></i>
                                            </label>
                                        </span>
                                        <span class="input-group-append">
                                            <label type="button" class="btn btn-success" id="enviarMensaje" onclick="sendMessage();">
                                                <i class="fas fa-paper-plane"></i>
                                            </label>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>



            <?php endif ?>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->


<!-- <script src="javascript/systemMsg.js"></script> -->
<?php
include '../footer.php';

?>

<script>
    //version 2 tabla rapida id="Tabla_Rapida_AJAX"
    var titulo_tabla = "Contactos";
    query_tabla_ajax = "<?= "SELECT * from cliente where ID_principal = '{$_SESSION['ID_principal']}'"; ?>";
    const filtros = <?= json_encode($rowFiltros) ?>;
    const indicativos = <?= json_encode($rowIndicativos) ?>;

    // // console.log(query_tabla_ajax);
    // columnas = ['id', 'nombre', 'correo_cliente', 'numero', 'filtro', 'indicativo', 'blacklist', 'activo', 'enviado', 'cliente_id', 'envio_correo'];
    columnas = ['cliente_id', 'nombre_cliente', 'CODI_CLIENTE', 'direccion_cliente', 'telefono_cliente', 'whatsapp', 'correo_cliente', 'estado', 'filtro_ws', 'habeasdata', 'indicativo', 'celular_cliente'];

    columnastablas = [{
        "data": function(row, type, set) {
            datos = ``;
            datos += `
                <a href="#" onclick="togglePanel(); $('#loader').show(); validarNumero('${row.whatsapp}'); cargarMensajes('${row.whatsapp}','<?= $idUsuario ?>','${row.nombre_cliente}', 'prepend');  refrescarMensajes()" data-id="${row.cliente_id}">
                            <img class="contacts-list-img" src="https://app.dentalsoftplus.com/isologoDental.png" alt="User Avatar">
                            <div class="contacts-list-info">
                                <span class="contacts-list-name text-dark">
                                    ${row.nombre_cliente}
                                </span>
                                <span class="contacts-list-msg text-dark">${row.whatsapp}</span>
                            </div>
                        </a>
                `;
            return datos;
        }
    }, ];
</script>

<!-- <script type="text/javascript" src="moduloMasivos/systemChat.js"></script> -->
<!-- <script>
    const searchInput = document.getElementById('searchInput');

    searchInput.addEventListener('keyup', function(event) {
        const listItems = document.querySelectorAll('#list li');
        const searchTerm = event.target.value.toLowerCase();

        // en esta verga vamos a recorrer los elementos li y si tal entonces tal
        listItems.forEach(function(listItem) {
            const name = listItem.querySelector('.contacts-list-name').textContent.toLowerCase();
            const number = listItem.querySelector('.contacts-list-msg').textContent.toLowerCase();
            if (name.includes(searchTerm) || number.includes(searchTerm)) {
                // // console.log('si');
                listItem.style.display = '';
            } else {
                // // console.log('no');
                listItem.style.display = 'none';
            }
        });
    });
</script> -->

<!-- <script>
    const searchInput2 = document.getElementById('searchInput2');

    searchInput2.addEventListener('keyup', function(event) {
        const listItems2 = document.querySelectorAll('#chatsList1 li, #chatsList2 li');
        const searchTerm2 = event.target.value.toLowerCase();

        // en esta verga vamos a recorrer los elementos li y si tal entonces tal
        listItems2.forEach(function(listItem2) {
            const name2 = listItem2.querySelector('.contacts-list-name').textContent.toLowerCase();
            const number2 = listItem2.querySelector('.contacts-list-msg').textContent.toLowerCase();
            if (name2.includes(searchTerm2) || number2.includes(searchTerm2)) {
                // // console.log('si');
                listItem2.style.display = '';
            } else {
                // // console.log('no');
                listItem2.style.display = 'none';
            }
        });
    });
</script> -->


<script>
    $(document).ready(function() {
        $('[data-widget="chat-pane-toggle"]').click();
        cargarChats();

        setInterval(() => {
            cargarChats();
        }, 10000);
    });

    function cargarChats() {
        // console.log('cargar chats');
        // se leen todos los div data-id y se guardan en una variable para usarla como filtro
        let divs = document.querySelectorAll('[data-chat-id]');
        let ids = [];
        for ($i = 0; $i < divs.length; $i++) {
            // se obtiene el id de cada div
            ids[$i] = divs[$i].getAttribute('data-chat-id').substring(2);
        }

        $.ajax({
            type: "POST",
            url: "./moduloMasivos/ajax_cargarChats.php",
            data: {
                idUsuario: <?= $rowUsuario['id'] ?>,
                ids: ids,
                tipo: 1,
                id: '<?= $idUsuario ?>'
            },
            success: function(data) {
                $('#chatsList1').html('');
                data = JSON.parse(data);
                if (data != '' && data != null && data != undefined && data != 'null') {
                    for ($i = 0; $i < data.length; $i++) {
                        // armamos el html
                        $('#chatsList1').append(`<li>
                        <a data-chat-id="ch${data[$i]['numeroFrom']}" href="#" onclick="togglePanel(); $('#loader').show(); validarNumero('${data[$i]['numeroFrom']}'); cargarMensajes('${data[$i]['numeroFrom']}','<?= $idUsuario ?>', '${data[$i]['nombre']}', 'prepend');  refrescarMensajes();" >
                            <img class="contacts-list-img" src="https://app.dentalsoftplus.com/isologoDental.png" alt="User Avatar">
                            <div class="contacts-list-info">
                                <span class="contacts-list-name text-dark">
                                    ${data[$i]['nombre']}
                                    <span ` + (data[$i]['total'] > 0 ? '' : 'style="display:none;"') + ` class="badge badge-danger right rounded-pill">${data[$i]['total']}</span>
                                </span>
                                <span class="contacts-list-msg text-dark">${data[$i]['numeroFrom']} <span class="float-right right">${data[$i]['ultimoMensaje']}</span></span>
                            </div>
                        </a>
                    </li>`);
                    }
                }
            }
        })

        $.ajax({
            type: "POST",
            url: "./moduloMasivos/ajax_cargarChats.php",
            data: {
                idUsuario: <?= $rowUsuario['id'] ?>,
                ids: ids,
                tipo: 2
            },
            success: function(data) {
                //  $('#chatsList1').html('');
                data = JSON.parse(data);
                if (data != '' && data != null && data != undefined && data != 'null') {
                    for ($i = 0; $i < data.length; $i++) {
                        // armamos el html
                        $('#chatsList2').append(`<li>
                        <a data-chat-id="ch${data[$i]['numeroFrom']}" href="#" onclick="togglePanel(); $('#loader').show(); validarNumero('${data[$i]['numeroFrom']}'); cargarMensajes('${data[$i]['numeroFrom']}','<?= $idUsuario ?>', '${data[$i]['nombre']}', 'prepend');  refrescarMensajes();">
                            <img class="contacts-list-img" src="https://app.dentalsoftplus.com/isologoDental.png" alt="User Avatar">
                            <div class="contacts-list-info">
                                <span class="contacts-list-name text-dark">
                                    ${data[$i]['nombre']}
                                    <span ` + (data[$i]['total'] > 0 ? '' : 'style="display:none;"') + ` class="badge badge-danger right rounded-pill">${data[$i]['total']}</span>
                                </span>
                                <span class="contacts-list-msg text-dark">${data[$i]['numeroFrom']} <span class="float-right right">${data[$i]['ultimoMensaje']}</span></span>
                            </div>
                        </a>
                    </li>`);
                    }
                }
            }
        })
    }
</script>

<script>
    function validarNumero(numero){   
        // console.log('numero' + numero);     
        // http request sin ajax
        $.ajax({
            type: "GET",
            url: "./moduloMasivos/validarNumero.php",
            data: {
                numero: btoa(numero)
            },
            success: function(responseNumero) {
                // console.log(responseNumero);
                responseNumero = JSON.parse(responseNumero);
                if(responseNumero.status == false){
                    Swal.fire({
                        icon: 'error',
                        title: 'Número incorrecto',
                        text: 'El número al que se quiere enviar el mensaje no es valido o no se le puede enviar mensajes.',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload();
                        }else{
                            window.location.reload();
                        }
                    })
                    
                }
            }
        })
        
    }
</script>

<script>
    function cargarMensajes(numero, idUsuario, nombre, tipo) { 
        $('.card-footer').show();
        $('#nombreContacto').html(nombre);
        $('#numeroContacto').html(numero);
        $('#verMensajesAnteriores').html(`
        <div class="center text-center">
            <a href="#" onclick="$('#loader').show(); cargarMensajes('${numero}','<?= $idUsuario ?>', '${nombre}', 'prepend');">
                <i class="fas fa-sync-alt"></i>
                Cargar Mensajes Anteriores
            </a>
        </div>
        `);
        // console.log('cargar mensajes' + tipo);
        // se leen todos los div data-id y se guardan en una variable para usarla como filtro
        let divs = document.querySelectorAll('[data-idM]');
        let ids = [];
        for ($i = 0; $i < divs.length; $i++) {
            // se obtiene el id de cada div
            ids[$i] = divs[$i].getAttribute('data-idM');
        }
        // cual es el id mas alto
        let max = 0;
        for ($i = 0; $i < ids.length; $i++) {
            if (ids[$i] > max) {
                max = ids[$i];
            }
        }

        // // console.log(ids);
        document.getElementById('numeroMessage').value = numero;
        $.ajax({
            type: "POST",
            url: "./moduloMasivos/ajax_cargarMensajes.php",
            data: {
                numero: numero,
                idUsuario: idUsuario,
                quienesNo: ids,
                max: max,
                tipo: tipo
            },
            success: function(data) {
                $("#loader").hide();

                // // console.log(data); 
                data = JSON.parse(data);

                if (data != '' && data != null && data != undefined && data != 'null') {
                    for ($i = 0; $i < data.length; $i++) {
                        // validar si viene multimedia y se carga
                        let archivo = '';
                        // let ruta = 'https://<?= $denysServer ?>/denysbot/Denysbot 2.0/';
                        let ruta = 'https://videos.sievensoft.com/denysbot/Denysbot 2.0/';

                        if (data[$i]['media'] == '1') {
                            let archivoOri = data[$i]['mensaje'].substring(1, data[$i]['mensaje'].length);
                            // la extension del archivo
                            let extension = archivoOri.split('.').pop();
                            // segun la extension se cargan los archivos
                            if (extension == 'jpg' || extension == 'png' || extension == 'jpeg') {
                                // se crea una etiqueta img
                                archivo = `<img class="rounded " style="max-width:12rem;" src="${ruta}/${archivoOri}">`;
                            }else if (extension == 'mp4') {
                                archivo = `<video class="rounded " style="max-width:12rem;" src="${ruta}/${archivoOri}" controls></video>`;
                            }else if (extension == 'mp3' || extension == 'mpga' || extension == 'ogg' || extension == 'oga') {
                                archivo = `<audio class="rounded" src="${ruta}/${archivoOri}" controls></audio>`;
                            }else {
                                archivo = `Archivo Adjunto`;
                            }
                            archivo += `<br> <a href="${ruta}/${archivoOri}" target="_blank" download>Ver / Descargar</a>`;
                            // archivo += `Mensaje multimedia, consulta tu teléfono para visualizar`;
                            data[$i]['mensaje'] = archivo;
                        }

                        if (tipo == 'prepend') {
                            // armamos el html
                            if (data[$i]['tipo'] == 1) {
                                $('.direct-chat-messages').prepend(`<div class="direct-chat-msg" data-idM="${data[$i]['id']}">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">${data[$i]['nombre']}</span>
                                    <span class="direct-chat-timestamp float-right">${data[$i]['fechaRegistro']}</span>
                                </div>

                                <img class="direct-chat-img" src="https://app.dentalsoftplus.com/isologoDental.png" alt="message user image">

                                <div class="direct-chat-text">
                                    ${data[$i]['mensaje']}
                                </div>

                            </div>`);
                            } else {
                                $('.direct-chat-messages').prepend(`<div class="direct-chat-msg right" data-idM="${data[$i]['id']}">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right"><?= $MENU_NOMBRE_USUARIO ?></span>
                                    <span class="direct-chat-timestamp float-left">${data[$i]['fechaRegistro']}</span>
                                </div>

                                <img class="direct-chat-img" src="<?= $Base . '/logos/' . $logoF ?>" alt="message user image">

                                <div class="direct-chat-text bg-light text-right" style="border-color:#000 !important; border-left-color:#000 !important">
                                    ${data[$i]['mensaje']}
                                </div>
                            </div>`);
                            }

                        } else {
                            // armamos el html
                            if (data[$i]['tipo'] == 1) {
                                $('.direct-chat-messages').append(`<div class="direct-chat-msg" data-idM="${data[$i]['id']}">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">${data[$i]['nombre']}</span>
                                    <span class="direct-chat-timestamp float-right">${data[$i]['fechaRegistro']}</span>
                                </div>

                                <img class="direct-chat-img" src="https://app.dentalsoftplus.com/isologoDental.png" alt="message user image">

                                <div class="direct-chat-text">
                                    ${data[$i]['mensaje']}
                                </div>

                            </div>`);
                            } else {
                                $('.direct-chat-messages').append(`<div class="direct-chat-msg right" data-idM="${data[$i]['id']}">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right"><?= $MENU_NOMBRE_USUARIO ?></span>
                                    <span class="direct-chat-timestamp float-left">${data[$i]['fechaRegistro']}</span>
                                </div>

                                <img class="direct-chat-img" src="<?= $Base . '/logos/' . $logoF ?>" alt="message user image">

                                <div class="direct-chat-text bg-light text-right" style="border-color:#000 !important; border-left-color:#000 !important">
                                    ${data[$i]['mensaje']}
                                </div>
                            </div>`);
                            }
                        }



                    }

                }
            }
        })

    }
</script>


<script>
    function sendMessage() {
        // desactivar mouse y teclado
        event.preventDefault();
        $('.card-footer').hide();
        $('#loader').show();
        
        // archivos puede estar vacio
        let archivo = $('#messageArchivo')[0].files;
        let mensaje = $('#messageCuerpo').val();
        let numero = $('#numeroMessage').val();
        let nombre = $('#nombreContacto').innerHTML;
        // // console.log(archivo);

        // que mensaje y numero no estén vacíos
        if (mensaje != '' && numero != '') {
            let formData = new FormData();
            formData.append('tipo', 1);
            formData.append('numero', numero);
            formData.append('mensaje', mensaje);
            // // console.log(formData);
            // enviar el mensaje
            $.ajax({
                type: "POST",
                url: "./moduloMasivos/ajax_sendMessage.php",
                dataType: 'html',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function(data) {
                    // paso 
                    setTimeout(() => {
                        cargarMensajes(numero, <?= $idUsuario ?>, nombre, 'append');
                        $('.card-footer').show();
                        $('#loader').hide();
                    }, 1000);
                }
            });
        }

        if (numero != '' && archivo.length > 0) {
            let formData = new FormData();
            formData.append('tipo', 2);
            formData.append('numero', numero);
            formData.append('archivo', archivo[0]);
            // enviar el mensaje
            $.ajax({
                type: "POST",
                url: "./moduloMasivos/ajax_sendMessage.php",
                dataType: 'html',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                success: function() {
                    // paso 
                    setTimeout(() => {
                        cargarMensajes(numero, <?= $idUsuario ?>, nombre, 'append');
                        $('.card-footer').show();
                        $('#loader').hide();
                    }, 1000);
                }
            });
        }

        // blanqueamos los campos
        $('#messageCuerpo').val('');
        // blanquer el file
        $('#messageArchivo')[0].value = '';
        




    }
</script>

<script>
    function togglePanel() {
        $('[data-widget="chat-pane-toggle"]').click();
        $('.direct-chat-messages').html('');
    }
</script>

<script>
    function refrescarMensajes() {
        // console.log('refrescar');
        // cada 100 segundos recargar los mensajes 
        setInterval(() => {
            let numero = $('#numeroMessage').val();
            let nombre = $('#nombreContacto').html();
            let idUsuario = '<?= $idUsuario ?>';
            // // console.log(numero, idUsuario);
            if (numero != '' && idUsuario != '') {
                cargarMensajes(numero, idUsuario, nombre, 'append');
            }
        }, 8000);
    }
</script>

<script>
    $(document).ready(function() {
        $('#messageCuerpo').keypress(function(event) {
            if (event.keyCode === 13) {
                sendMessage();
            }
        });
    })
</script>

<script>
    function finalizarChat() {
        // sweet alert
        Swal.fire({
            title: '¿Estás seguro que desea finalizar el chat?',
            text: "¡la sesión con el cliente sera cerrada!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, finalizar el chat!'
        }).then((result) => {
            if (result.isConfirmed) {
                let formData = new FormData();
                formData.append('tipo', 1);
                formData.append('numero', $('#numeroMessage').val());
                formData.append('mensaje', 'Sala de chat finalizada');
                // enviar el mensaje
                $.ajax({
                    type: "POST",
                    url: "./moduloMasivos/ajax_sendMessage.php",
                    dataType: 'html',
                    data: formData,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function(data) {
                        // blanqueamos el chat por otro ajax
                        $.ajax({
                            type: "POST",
                            url: "./moduloMasivos/ajax_blanquearChat.php",
                            data: {
                                numero: $('#numeroMessage').val(),
                                idUsuario: '<?= $idUsuario ?>'
                            },
                            success: function(data) {
                                // paso 
                                window.location.reload();
                            }
                        })
                    }
                });
            }
        })

    }
</script>

<script>
    function scrollDown() {
        // Desplazarse hacia abajo en el elemento con el id "cardBody"
        var cardBody = $('[class="direct-chat-messages"]');
        cardBody.animate({
            scrollTop: cardBody.prop("scrollHeight")
        }, 1000);
    }
</script>

<script>
    // async function validarEnlace(enlace) {
    //     try {
    //         const response = await fetch(enlace);
    //         if (response.ok) {
    //             window.open(enlace, '_blank');
    //         } else {
    //             alert('El enlace está roto o el archivo ya no existe.');
    //         }
    //     } catch (error) {
    //         alert('Para ver el archivo por favor debe marcar el enlace como seguro para poder verlo.');
    //         window.open(enlace, '_blank');
    //     }
    // }
</script>