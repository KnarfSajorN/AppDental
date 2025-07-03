<?php
// session_start();
// $usuario_id = $_SESSION['ID'];
include '../funciones/conn3.php';


if ($_GET['accion'] == 1) {
    $idM = base64_decode($_POST['idM']);
    
    $queryws_mensajes = mysqli_query($conn3, "SELECT * from ws_mensajesC where id = $idM");
    $fetchws_mensajes = mysqli_fetch_array($queryws_mensajes);

    // titulo, mensaje, filtro, filtroAZ, activo, banner, asunto
    $tituloCorreo = $fetchws_mensajes['titulo'];
    $mensajeCorreo = $fetchws_mensajes['mensaje'];
    $bannerCorreo = $fetchws_mensajes['banner'];
    $asuntoCorreo = $fetchws_mensajes['asunto'];


    $filtroArray = array_filter(explode("||", $fetchws_mensajes['filtroAZ']));
    $filtroAZ = "";
    foreach ($filtroArray as $key => $value) {
        $value = explode("|", $value);
        foreach ($value as $key2 => $value2) {
            $filtroAZ .= "nombre LIKE '{$value2}%'" . ($key2 < (count($value) - 1) ? " OR " : '');
        }
        $filtroAZ .= ($key < (count($filtroArray) - 1) ? " OR " : '');
    }
    $filtroAZ = (!empty($filtroAZ) ? " AND ({$filtroAZ})" : '');
    $filtroArray = explode("||", $fetchws_mensajes['filtro']);
    $filtro = "";
    for ($i = 0; $i < count($filtroArray); $i++) {
        $filtro .= "filtro like '%{$filtroArray[$i]}%' || ";
    }
    $filtro .= substr($filtro, 0, -3);
    // echo "SELECT * from ws_contactos where activo = 1 and enviado = 0 and ($filtro) {$filtroAZ} limit 1";
    $queryws_contactosE = mysqli_query($conn3, "SELECT * from ws_contactos where activo = 1 and enviado = 0 and ($filtro) {$filtroAZ} limit 1");
    $queryws_cE = mysqli_query($conn3, "SELECT * from ws_contactos where activo = 1 and enviado = 0 and ($filtro) {$filtroAZ}");
    $countws_cE = mysqli_num_rows($queryws_cE);

    $fetchws_contactosE = mysqli_fetch_array($queryws_contactosE);
    $countws_contactosE = mysqli_num_rows($queryws_contactosE);

    if ($countws_contactosE > 0) {
        
        if ($fetchws_contactosE['envio_correo'] == 1) {
            // $queryConfigCorreo = "SELECT * from ws_correo where usuario_id = '{$usuario_id}' limit 1";
            // $fetchConfigCorreo = mysqli_fetch_assoc(mysqli_query($conn3, $queryConfigCorreo));

            // //id, usuario_id, setFrom, Username, Password, Host, Port, fecha

            // // enviar el correo yatu sabe
            // // configuración
            // $_GET['mailHost'] = $fetchConfigCorreo['Host'];
            // $_GET['mailUsername'] = $fetchConfigCorreo['Username'];
            // $_GET['mailPassword'] = $fetchConfigCorreo['Password'];
            // $_GET['mailPort'] = $fetchConfigCorreo['Port'];
            // $_GET['mailsetFrom'] = $fetchConfigCorreo['setFrom'];
            // $_GET['mailaddAddress'] = $fetchws_contactosE['correo_cliente'];
            // // configuración - fin
            // // mensaje 
            // $_GET['mailSubject'] = $asuntoCorreo;
            // $_GET['mailTitulo'] = $tituloCorreo;
            // $_GET['mailMensaje'] = $mensajeCorreo;
            // $_GET['mailBanner'] = $bannerCorreo;
            // // mensaje - fin
            
            // include 'masivosCorreoPlantilla.php';
            // // ------------------------------------------
        }

        $countws_cE--;
    }
    mysqli_query($conn3, "UPDATE ws_contactos SET enviado = '$enviado' where id = '{$fetchws_contactosE['id']}'");


    $queryws_contactos = mysqli_query($conn3, "SELECT * from ws_contactos where activo <> 0 and enviado <> 0");
    $countws_contactos = mysqli_num_rows($queryws_contactos);
    foreach ($queryws_contactos as $datws_contactos) { ?>
    <?php $☺ = explode("/", ($datws_contactos['enviado'] == 1 ? "Enviado/text-success" : "No enviado/text-danger")) ?>
        <tr style="display: flex; flex-flow: row;">
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['nombre'] ?></td>
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['numero'] ?></td>
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['filtro'] ?></td>
            <th style="width: calc(100%/4); word-break: break-all; overflow: hidden;" class="<?= $☺[1] ?>"> <?= $☺[0] ?></th>
        </tr>
    <?php } ?>
    <script>
        $("#count1").html("<?= $countws_cE ?>");
        $("#count2").html($("#resSend tr").length);
        // $("#count2").html("<?= $countws_contactosE ?>");
    </script>
    <!--Response-->
<?php
    if (!empty($countws_contactosE)) {
        echo "true";
    } else {
        echo "false";
    }
}
