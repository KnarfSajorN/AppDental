<?php
$pregunta = $_POST['pregunta'];

function sendPromptAI($model, $prompt, $stream = false)
{
    $url = "http://205.209.96.94:11434/api/generate"; // Agregar http://
    $headers = [
        "Content-Type: application/json"
    ];

    $data = [
        "model" => $model,
        "prompt" => $prompt,
        "stream" => $stream
    ];

    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));

    $result = curl_exec($curl);
    curl_close($curl);

    return $result;
}

$model = "llama3.2"; // Modelo válido de Ollama
$prompt = $pregunta;
$stream = false;

$response = sendPromptAI($model, $prompt, $stream);
// var_dump($response);

$response = json_decode($response, true);

if (isset($response['response'])) {
    $response['response'] = str_replace(array("*", "/"), "", $response['response']);

    echo $response['response'];
} else {
    echo "No pudimos obtener una respuesta.";
}
