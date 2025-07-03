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
}
$ids = "'0'";
if ($_POST['ids']){
    for ($i = 0; $i < count($_POST['ids']); $i++) {
        $ids .= ",'" . $_POST['ids'][$i] . "'";
    }
}
if ($_POST['tipo'] == 1){
    $query = "SELECT
numeroFrom
, count(id) as total
, max(fechaRegistro) as ultimoMensaje
, '' as nombre
from chat 
where 1=1
and estado = 0
and tipo = 1
and idUsuario = '{$_POST['idUsuario']}'
and (numeroFrom is not null and numeroFrom <> '' and numeroFrom not like '%status@broadcast%' and numeroFrom not like '%-%')
and (mensaje is not null and mensaje <> '')
group by numerofrom
order by ultimoMensaje desc
";
}else{
    $query = "SELECT
    numeroFrom
    , 0 as total
    , max(fechaRegistro) as ultimoMensaje
    , '' as nombre
    from chat 
    where 1=1
    and estado = 1
    and tipo = 1
    and idUsuario = '{$_POST['idUsuario']}'
    and numeroFrom not in ({$ids})
    and (numeroFrom is not null and numeroFrom <> '' and numeroFrom not like '%status@broadcast%' and numeroFrom not like '%-%')
    and (mensaje is not null and mensaje <> '')
    group by numerofrom
    order by ultimoMensaje desc    
    ";
}
$result = mysqli_query($connDenysCliente, $query);
while ($row = mysqli_fetch_assoc($result)) {
    $row['nombre'] = funcionMaster($row['numeroFrom'],'whatsapp','nombre_cliente','cliente');
    if ($row['nombre'] == '') {
        $row['nombre'] = $row['numeroFrom'];
    }
    $array[] = $row;
}
echo json_encode($array);