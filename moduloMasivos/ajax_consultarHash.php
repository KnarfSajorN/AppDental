<?php
session_start();
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

if ($tieneWhatsApp == true) {
    // se consulta 
    $denysPuerto = $link[$miSistema[1]][0]; // puerto de denysbot ej: 8080
    $denysServer = $link[$miSistema[1]][1]; // ip servidor ej: 205.209.96.94

    // conexion a denysbot
    $connDenys = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_sistema', '3306');

    $queryConsultaDenys = "SELECT * from denysbot_sistema.usuarios where id_denys = '{$denysPuerto}' limit 1";
    $resultConsultaDenys = mysqli_query($connDenys, $queryConsultaDenys);
    $rowConsultaDenys = mysqli_fetch_assoc($resultConsultaDenys);
    // si hay resultados armamos la conexión al cliente
    if (mysqli_num_rows($resultConsultaDenys) > 0) {
        $connDenysCliente = mysqli_connect('localhost', 'denysbot', 'Nuebaklbdni', 'denysbot_' . $rowConsultaDenys['id'], '3306');
    }
}

// post
$palabra = $_POST['palabra'];
// var_dump($palabra);

// query para consultar
$queryConfig = "SELECT * from config limit 1";
$resultConfig = mysqli_query($connDenysCliente, $queryConfig);
$rowConfig = mysqli_fetch_array($resultConfig);

// si la palabra tiene #, es la palabra de inicio entonces se la quitamos y leemos
if (strpos($palabra, '#') === 0) {
    // $palabra = substr($palabra, 1);
    $palabra = explode(' ', $palabra);
} else {
    // de lo contratio es una cadena de string palabra||palabra||palabra
    $palabra = explode('||', $palabra);
}
// var_dump($palabra);

$palabraDB = array();
array_push($palabraDB, $rowConfig['palabraInicio']);
array_push($palabraDB, $rowConfig['palabraChat']);

$queryMenu = "SELECT hashtag from chat_menu";
$resultMenu = mysqli_query($connDenysCliente, $queryMenu);
while ($rowMenu = mysqli_fetch_array($resultMenu)) {
    array_push($palabraDB, $rowMenu['hashtag']);
}

// var_dump($palabraDB);


// verificar $palabra existe en $palabraDB
$existe = false;
for ($i = 0; $i < count($palabra); $i++) {
    for ($j = 0; $j < count($palabraDB); $j++) {
        if (strtolower($palabra[$i]) == strtolower($palabraDB[$j])) {
            $existe = true;
        }
    }
}

echo $existe;
