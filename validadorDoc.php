<?php
include 'funciones/funciones.php';
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
function Desencriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = openssl_decrypt(urldecode($valor), "AES-256-CBC", $Sc);
    return $Texto;
}
$cliente_id = preparePost(Desencriptar($_POST['cliente_id']));
$codCliente = preparePost($_POST['CODI_CLIENTE']);

$array = ['status' => 0];

$acum = 0;
$queryValidar = mysqli_query($conn3, "SELECT * FROM cliente where CODI_CLIENTE = '{$codCliente}'");
while ($row = mysqli_fetch_array($queryValidar)) {
    if ($row['cliente_id'] != $cliente_id) {
        $array['status'] = 1;
    }
    $acum++;
}

$array['status'] = ($acum > 1 ? 2 : ($array['status'] == 1 ? 1 : 0));

header("Content-Type: application/json; charset=UTF-8");
echo json_encode($array);
