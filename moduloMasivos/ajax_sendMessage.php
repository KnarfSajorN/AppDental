<?php
// controlador para enviar mensajes desde el panel de chat en medical
// include '../../masterFunciones.php';
include '../funciones/conn3.php';
include '../funciones/funciones.php';

// saber si tiene WhatsApp personalizado
// aquí hacemos una trampa

include 'buscarWhatsapp.php';

if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: 205.209.96.94

    // conexion a denysbot
    // $connDenys = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_sistema', '3306');
    $connDenys = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", "denysbot_sistema");

    $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
    $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
    $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
    // si hay resultados armamos la conexión al cliente
    if (mysqli_num_rows($resultConsultaDenys) > 0) {
        // $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
        $connDenysCliente = mysqli_connect("205.209.96.94:3306", "denysbot", "BNe4nxQZDwHK8vi", 'denysbot_' . $rowConsultaDenys['id']);
    }

    $nameDenys = $rowConsultaDenys['name_denys'];
}


// recibimos el post
$tipo = $_POST['tipo'];
$numero = $_POST['numero'];
$mensaje = $_POST['mensaje'];
$archivo = $_FILES['archivo'];


// ------------------------------------------
// función para enviar mensaje
// ------------------------------------------
function enviarMensaje($host, $sistema, $phone, $body)
{
    if ($host <> "" && $sistema <> "" && $phone <> "" && $body <> "") {

        $url = "http://{$host}/send-message/" . base64_encode($sistema);
        var_dump($url);

        $ch = curl_init($url);
        $arreglo = array(
            "phone"           => $phone,
            "body"          => $body,
        );
        $payload = json_encode($arreglo);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        //close cURL resource
        curl_close($ch);
    }
}

// ------------------------------------------
// función para enviar archivos
// recibe: el host en url, el sistema para validación, el numero de teléfono a enviar, url del archivo, y nombre para captions (solo aplica a documentos)
// ------------------------------------------
function enviarArchivo($host, $sistema, $phone, $file, $nombre)
{
    if ($host <> "" && $sistema <> "" && $phone <> "" && $file <> "") {
        $url = "http://{$host}/send-media/" . base64_encode($sistema);

        $ch = curl_init($url);
        $arreglo = array(
            "phone"           => $phone,
            "file"          => $file,
            "nombre"          => $nombre,
        );
        $payload = json_encode($arreglo);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        //close cURL resource
        curl_close($ch);
    }
}




if ($tipo == 1) {
    // enviar mensaje
    if ($numero != '' && $mensaje != '') {
        enviarMensaje($denysServer . ':' . $denysPuerto, $nameDenys, $numero, $mensaje);
    }
}

if ($tipo == 2) {
    var_dump($_FILES);
    // enviar archivo
    if ($numero != '' && $_FILES != '') {

        // si hay archivo entonces lo subimos a una carpeta temporal
        foreach ($_FILES as $key => $value) {
            $contador++;
        }
        // subimos los archivos
        for ($i = 0; $i < $contador; $i++) {
            $archivo = strtolower(rand(1, 1000) . str_replace(' ', '_', $_FILES['archivo']['name']));
            // crear la carpeta temp si no existe
            if (!file_exists("temp")) {
                mkdir("temp");
            }
            $resultado = @move_uploaded_file($_FILES["archivo"]["tmp_name"], "temp/" . $archivo);
            if ($resultado) {
                // aja si todo esta bien, pasamos la url de donde esta alojado a un archivo via get para que se descargue alla en medical
                // ALERTA DE MARAÑA
                $urlFinal = $Base . '/moduloMasivos/temp/' . $archivo;
                var_dump($urlFinal);
                // enviamos esta url codificada por get para que se descargue alla en medical via curl
                enviarArchivo($denysServer . ':' . $denysPuerto, $nameDenys, $numero, $urlFinal, '');

                // $curl = curl_init();
                // curl_setopt($curl, CURLOPT_URL, "https://medicalsoft plus.com/soportes/recibir.php?u=" . $urlFinal . "&n=" . base64_encode($archivo));
                // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
                // $output = curl_exec($curl);
                // curl_close($curl);

                // eliminar el archivo temporal
                unlink("temp/" . $archivo);
            } else {
                // nada papi que vas a hacer
            }
        }
    }
}
