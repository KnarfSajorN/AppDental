<?php
// var_dump('test');
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// obtener el código del sistema
$sistemaActual = $_SERVER['REQUEST_URI'];
$sistemaActual = str_replace('/', ',', $sistemaActual);
// $sistemaActual = substr($sistemaActual, 1);

$sistemaActual = explode(",", $sistemaActual);

// var_dump($sistemaActual);
// array(2) { [0]=> string(0) "" [1]=> string(7) "portada" }

// para los sistemas normalmente 
// $sistemaActual[0] == código del sistema ej co224
// a los cron / alertas de citas / recordatorios le sabe a culo el sistema por ende usamos
// en el cron enviamos un argumento // variable // get por asi decirlo, la recibimos y validamos
/*
parse_str($argv[1], $argumento);
$argumento['s']; // ej bo875
*/
if (PHP_SAPI === 'cli' && isset($argv[1])) {
    parse_str($argv[1], $argumento);
    $s = $argumento['s'] ?? null;
}

// solo para alte y baseDev
// var_dump($sistemaActual[0]);
$sistemaActual[0] = $_SESSION['ID_principal'];
// aquí armamos la variable con cada sistema para cambiar el linkkey
// comentar cuando se caiga alte por emergencia
include 'whatsappPersonalizadoList.php';


$sistema = $sistemaActual[0];

// seva lida
if(isset($argumento['s'])){
    if (!is_null($argumento['s'])) {
        $sistemaActual[0] = $argumento['s'];
    }
}
// var_dump($link[$sistemaActual[0]][0]);
// actualizar la variable linkkey por la del cliente o se deja el genérico
// (!is_null($link[$sistemaActual[0]][0])  ? $linkkey = 'http://' . $link[$sistemaActual[0]][1] . (strpos($link[$sistemaActual[0]][1], 'loclx') !== false ? '' : ':' . $link[$sistemaActual[0]][0]) . '/send-message/' . base64_encode($link[$sistemaActual[0]][2]) : $linkkey);
// var_dump($linkkey);

// 11 02 2025
// JRodriguez
// primero buscar por id de sesion y luego si no encuentra entonces buacar por ID_principal
if (isset($link[$_SESSION['ID']][0], $link[$_SESSION['ID']][1], $link[$_SESSION['ID']][2])) {

if (!is_null($link[$_SESSION['ID']][0])) {
    $hostW = $link[$_SESSION['ID']][1];
    $portW = $link[$_SESSION['ID']][0];
    $messageW = base64_encode($link[$_SESSION['ID']][2]);

    $linkkey = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW) . '/send-message/' . $messageW;
    $linkScan = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW);
} elseif (!is_null($link[$_SESSION['ID_principal']][0])) {
    $hostW = $link[$_SESSION['ID_principal']][1];
    $portW = $link[$_SESSION['ID_principal']][0];
    $messageW = base64_encode($link[$_SESSION['ID_principal']][2]);

    $linkkey = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW) . '/send-message/' . $messageW;
    $linkScan = 'http://' . $hostW . (strpos($hostW, 'loclx') !== false ? '' : ':' . $portW);
}
}
$_SESSION['linkkey'] = $linkkey;

// if ($sistemaActual[1] == 'portada') {
?>

<style>
    .fabito-container {
        position: fixed !important;
        bottom: 90px !important;
        right: 25px !important;
        z-index: 999 !important;
        cursor: pointer !important;
    }

    .fabito-icon-holder {
        width: 60px;
        height: 60px;
        border-radius: 100%;
        background: #337ab7;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
    }

    /* on mobile */
    @media screen and (max-width: 600px) {
        .fabito-container {
            position: fixed !important;
            bottom: 75px !important;
            right: 14px !important;
            z-index: 999 !important;
            cursor: pointer !important;
        }

        .fabito-icon-holder {
            width: 54px !important;
            height: 54px !important;
            border-radius: 100%;
            background: #337ab7;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        }
    }

    .fabito-icon-holder:hover {
        opacity: 0.8;
    }

    .fabito-icon-holder i {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        font-size: 25px;
        color: #ffffff;
    }

    .fabito {
        width: 60px;
        height: 60px;
    }

    .fabito-options {
        list-style-type: none;
        margin: 0;
        position: absolute;
        bottom: 70px;
        right: 0;
        opacity: 0;
        transition: all 0.3s ease;
        transform: scale(0);
        transform-origin: 85% bottom;
    }

    .fabito:hover+.fabito-options,
    .fabito-options:hover {
        opacity: 1;
        transform: scale(1);
    }

    .fabito-options li {
        display: flex;
        justify-content: flex-end;
        padding: 5px;
    }

    .fabito-label {
        padding: 2px 5px;
        align-self: center;
        user-select: none;
        white-space: nowrap;
        border-radius: 3px;
        font-size: 16px;
        background: #666666;
        color: #ffffff;
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.2);
        margin-right: 10px;
    }

    img.btn-whatsapp {
        display: block !important;
        position: fixed;
        z-index: 9999999;
        bottom: 159px;
        right: 20px;
        cursor: pointer;
        border-radius: 100px !important;
    }

    img.btn-whatsapp:hover {
        border-radius: 100px !important;
        -webkit-box-shadow: 0px 0px 15px 0px rgba(7, 94, 84, 1);
        -moz-box-shadow: 0px 0px 15px 0px rgba(7, 94, 84, 1);
        box-shadow: 0px 0px 15px 0px rgba(7, 94, 84, 1);
        transition-duration: 1s;
    }
</style>

<div class="fabito-container">
    <div class="fabito fabito-icon-holder bg-primary ball">
        <i class="far fa-question-circle"></i>
    </div>
    <ul class="fabito-options">
        <?php
        // botones = TITULO / ENLACE / ICON                                                                                          O
        $botones = [
            // ['Bot de WhatsApp', 'https://denysbot.com/', 'fa fa-whatsapp'],
            ['Soporte via Whatsapp', 'https://wa.me/+34631942913?text=Hola!%20Estoy%20interesado%20en%20tu%20servicio', 'fa fa-whatsapp bg-success rounded-pill', ''],
            ['Ver estado del servicio "QR"', '' . $linkScan . '', 'fa fa-qrcode', ''],
        ];

        // para las guias de video
        include 'funciones/conn3.php';
        $queryVideo = "SELECT * from videoguias 
            where 1=1
            and pantalla like '{$sistemaActual[1]}'
            ";
        $resultVideo = mysqli_query($conn3, $queryVideo);
        if ($resultVideo) {
            while ($row = mysqli_fetch_assoc($resultVideo)) {
                $row['nombre'] = utf8_encode($row['nombre']);
                $botones[] = ['Ver guía de video: ' . $row['nombre'], '', 'fa fa-video', 'type="button" data-toggle="modal" data-target="#offcanvasTop' . $row['id'] . '"'];
                $rowVideos[] = $row;
            }
        }

      

        
        for ($i = 0; $i < count($botones); $i++) {
            if ($i == 0 && (!is_null($link[$_SESSION['ID_principal']][0]) || !is_null($link[$_SESSION['ID']][0]))) {
        ?>
                <li>
                    <span class="fabito-label"><?= $botones[$i][0] ?></span>
                    <a href="<?= $botones[$i][1] ?>" target="_blank" <?= $botones[$i][3] ?>>
                        <div class="fabito-icon-holder">
                            <i class="<?= $botones[$i][2] ?>"></i>
                        </div>
                    </a>
                </li>
            <?php
            } else if ($i > 0) {
            ?>
                <li>
                    <span class="fabito-label"><?= $botones[$i][0] ?></span>
                    <a href="<?= $botones[$i][1] ?>" target="_blank" <?= $botones[$i][3] ?>>
                        <div class="fabito-icon-holder">
                            <i class="<?= $botones[$i][2] ?>"></i>
                        </div>
                    </a>
                </li>
        <?php
            }
        }
    
        ?>
    </ul>
</div>


<?php if (isset($rowVideos)) { ?>
<?php foreach ($rowVideos as $video) { ?>
    <div class="modal fade" id="offcanvasTop<?= $video['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="offcanvasTopLabel" aria-hidden="true">
        <div class="modal-dialog modal-top modal-xl" role="document" style="min-width: 100% !important; margin: 0 !important;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="offcanvasTopLabel"><?= $video['nombre'] ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <iframe style="width:100%; height: 400px;" src="https://www.youtube.com/embed/Wh9AezNPCtw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe> -->
                    <iframe style="width:100%; height: 400px;" src="<?= $video['video'] ?>" title="<?= $video['nombre'] ?>" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php } ?>
<?php
// }
?>