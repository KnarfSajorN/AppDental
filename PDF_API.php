<?php

$Ruta = $_POST["Ruta"];
$Base = "https://medicalsoftplus.com/ec593/";
$url = "https://api.sejda.com/v2/html-pdf";
//$apiKey = "api_A55BE6B1BD6F463E9C317F9A2186955E";

$nombre_fichero = $Ruta;

if (file_exists("PDFS/" . $Ruta . ".pdf")) {
    $Ruta1 = $Ruta;
    $Ruta = urlencode($Ruta);
    echo "El PDF $nombre_fichero existe<br>";
    echo "<a href='PDFS/{$Ruta}.pdf' download='Descargar'> Descargar PDF </a>";
    echo "<label>Si no Funciona el link de arriba descargar el pdf desde el link de abajo *al momento que le aparezca el menu de impresion seleccionar la opcion Guardar como PDF*</label>";
    echo "<a href='{$Ruta1}'>Descargar PDF [Opcional] </a>";
} else {

    $content = json_encode(array('url' => $Base . $Ruta, 'usePrintMedia' => 'true',  'pageSize' => '210x270mm', 'delay' => '5'));
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        "Content-type: application/json",
        "Authorization: Token: " . $apiKey
    ));

    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $content);

    $response = curl_exec($curl);

    $status = curl_getinfo($curl, CURLINFO_HTTP_CODE);


    if ($status == 200) {
        $fp = fopen("PDFS/" . $Ruta . ".pdf", "w");
        fwrite($fp, $response);
        fclose($fp);
        $Ruta1 = $Ruta;
        $Ruta = urlencode($Ruta);
        echo "El PDF $nombre_fichero fue creado <br>";
        echo "<a href='PDFS/{$Ruta}.pdf' download='Descargar'>Descargar PDF </a><br>";
        echo "<label>Si no Funciona el link de arriba descargar el pdf desde el link de abajo *al momento que le aparezca el menu de impresion seleccionar la opcion Guardar como PDF*</label>";
        echo "<a href='{$Ruta1}'>Descargar PDF [Opcional] </a>";
    } else {
        //print("Error: failed with status $status, response $response, curl_error " . curl_error($curl) . ", curl_errno " . curl_errno($curl));
    }
}
