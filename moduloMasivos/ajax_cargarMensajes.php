<?php
include '../funciones/conn3.php';
include '../funciones/funciones.php';
// cargar todos los contactos de la tabla ws_contactos

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
}

$quienesNo = '0';
if ($_POST['quienesNo']){
    for ($i = 0; $i < count($_POST['quienesNo']); $i++) {
        $quienesNo .= ',' . $_POST['quienesNo'][$i] ;
    }
}
// 09 10 2023
$tipo = $_POST['tipo']; // append or prepend
$max = $_POST['max']; // id mas grande para la consulta

$query = "SELECT
id, mensaje, fechaRegistro, numeroTo, numeroFrom, tipo, estado, idUsuario, '' as nombre, media
from chat 
where 1=1
and id not in ({$quienesNo})
and 
(numeroTo = '{$_POST['numero']}' or numeroFrom = '{$_POST['numero']}')
and idUsuario in (0,'{$_POST['idUsuario']}')
".($tipo == 'prepend' ? ($max == '0' ? "" : " and id < '$max' ") : " and id > '$max' ")."
".($tipo == 'prepend' ? " order by id desc limit 10 " : " order by id asc limit 10 ")."

";
// var_dump($query);
$result = mysqli_query($connDenysCliente, $query);
while ($row = mysqli_fetch_assoc($result)) {
    mysqli_query($connDenysCliente, "UPDATE chat SET estado = 1 WHERE id = '{$row['id']}'");
    $row['nombre'] = funcionMaster($row['numeroFrom'],'concat(indicativo,numero)','nombre','ws_contactos');
    if ($row['nombre'] == '') {
        $row['nombre'] = $row['numeroFrom'];
    }
    $array[] = $row;
}


echo json_encode($array);
