<?php
session_start();
include '../funciones/funciones.php';
include '../funciones/conn3.php';
// var_dump($_SESSION['linkkey']);
function Whatsapp_sent2($numero, $mensaje)
{
    // include '../../masterFunciones.php';
    $linkkey = $_SESSION['linkkey']; 
    if (!empty($numero)) {
        $data = [
            'phone' => $numero, // Receivers phone
            'body' => $mensaje, // Message
        ];
        // $json = json_encode($data);
        // // Encode data to JSON
        // // URL for request POST /message
        // $url = $linkkey;
        // var_dump($url,$numero,$mensaje);
        // // Make a POST request
        // $options = stream_context_create([
        //     'http' => [
        //         'method'  => 'POST',
        //         'header'  => 'Content-type: application/json',
        //         'content' => $json
        //     ]
        // ]);
        // // Send a request
        // $result = file_get_contents($url, false, $options);
        // $obj = json_decode($result);
        // $mensaje = $obj->{'message'};
        // $enviado =  $obj->{'sent'};
        // $id =  $obj->{'id'};

        // var_dump($result);

        // // return($result);
        $ch = curl_init($linkkey);

        $payload = json_encode($data);

        // attach encoded JSON string to the POST fields
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    
        // set the content type to application/json
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    
        // return response instead of outputting
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    
        // execute the POST request
        $result = curl_exec($ch);
    
    
        // echo "<br>*****************************************<br>";
        // print("<pre>" . print_r($result, true) . "</pre>");
        // echo "<br>*****************************************<br>";
        //close cURL resource
        curl_close($ch);

        return ("1");
    }
    return ("-1");
}

// ------------------------------------------
// función para enviar archivos
// ------------------------------------------
function enviarArchivo($numero, $archivo)
{
    include '../../masterFunciones.php';
    $linkkey = $_SESSION['linkkey'];
    $url = str_replace("send-message", "send-media", $linkkey);
    $nombre = '';
    $ch = curl_init($url);
    $arreglo = array(
        "phone"           => $numero,
        "file"          => $archivo,
        "nombre"          => $nombre,
    );
    var_dump($arreglo);
    $payload = json_encode($arreglo);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type:application/json'));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($ch);
    //close cURL resource
    curl_close($ch);
}


if ($_GET['accion'] == 1) {
    $idM = base64_decode($_POST['idM']);
    $queryws_mensajes = mysqli_query($conn3, "SELECT * from ws_mensajes where id = $idM");
    $fetchws_mensajes = mysqli_fetch_array($queryws_mensajes);
    // $mensaje = "{$fetchws_mensajes['titulo']}" . "\n" . "{$fetchws_mensajes['mensaje']}";
    $mensaje = "{$fetchws_mensajes['mensaje']}";
    $idArchivo = $fetchws_mensajes['idArchivo'];
    $filtroArray = array_filter(explode("||", $fetchws_mensajes['filtroAZ']));
    $filtroAZ = "";
    foreach ($filtroArray as $key => $value) {
        $value = explode("|", $value);
        foreach ($value as $key2 => $value2) {
            $filtroAZ .= "nombre_cliente LIKE '{$value2}%'" . ($key2 < (count($value) - 1) ? " OR " : '');
        }
        $filtroAZ .= ($key < (count($filtroArray) - 1) ? " OR " : '');
    }
    $filtroAZ = (!empty($filtroAZ) ? " AND ({$filtroAZ})" : '');
    $filtroArray = explode("||", $fetchws_mensajes['filtro']);
    $filtro = "";
    for ($i = 0; $i < count($filtroArray); $i++) {
        if ($filtroArray[$i] <> '' ){
            $filtro .= "filtro_ws like '%{$filtroArray[$i]}%' OR ";
        }        
    }
    // and (filtro_ws like '%%' || )and (filtro_ws like '%%' |

    // 17 10 2023
    // filtros predefinidos
    $filtros = [
        ['Rango de edades'],
        ['Genero'],
        ['País'],
        ['Fecha de ultima consulta'],
        ['Cantidad de citas'],
        ['Cantidad de citas desde una fecha'],
        ['Estado civil'],
        ['Tipo de sangre'],
        ['Es donante?'],
        ['Entidad de salud'],
    ];
    for ($i = 0; $i < count($filtros); $i++) {
        if ($fetchws_mensajes['filtroPre_'.$i] == '1') {
            switch ($i) {
                case 0:
                    // rango de edades
                    $fechaDesde = date('Y-m-d', strtotime('-' . explode('||',$fetchws_mensajes['filtroR_'.$i])[0] . ' years'));
                    $fechaHasta = date('Y-m-d', strtotime('-' . explode('||',$fetchws_mensajes['filtroR_'.$i])[1] . ' years'));
                    $whereFiltro .= " and (fechaNacimiento >= '{$fechaDesde}' and fechaNacimiento <= '{$fechaHasta}') ";
                break;

                case 1:
                    // genero
                    $whereFiltro .= " and (genero = '{$fetchws_mensajes['filtroR_'.$i]}') ";
                break;

                case 2:
                    // país
                    $whereFiltro .= " and (codigo_pais = '{$fetchws_mensajes['filtroR_'.$i]}') ";
                break;

                case 3:
                    // fecha de ultima consulta
                    $whereFiltro .= " and ((select substr(fecha,1,10) from Historia_Clinica hc where hc.cliente_id = cliente_id order by hc.id desc limit 1) >= '{$fetchws_mensajes['filtroR_'.$i]}') ";
                break;

                case 4:
                    // cantidad de citas
                    $whereFiltro .= " and ((select count(idCitas) from citas where idCliente = cliente_id) >= '{$fetchws_mensajes['filtroR_'.$i]}') ";
                break;

                case 5:
                    // Cantidad de citas desde una fecha
                    $whereFiltro .= " and ((select count(idCitas) from citas where idCliente = cliente_id and fecha >= '".explode('||',$fetchws_mensajes['filtroR_'.$i])[1]."') >= '".explode('||',$fetchws_mensajes['filtroR_'.$i])[0]."') ";
                break;

                case 6:
                    // Estado civil
                    $whereFiltro .= " and (estado = '{$fetchws_mensajes['filtroR_'.$i]}') ";                    
                break;

                case 7:
                    // Tipo de sangre
                    $whereFiltro .= " and (tiposSangre = '{$fetchws_mensajes['filtroR_'.$i]}') ";                    
                break;

                case 8:
                    // Es donante?
                    $whereFiltro .= " and (esDonante = '{$fetchws_mensajes['filtroR_'.$i]}') ";                    
                break;

                case 9:
                    // Entidad de salud
                    $whereFiltro .= " and (entidad_id = '{$fetchws_mensajes['filtroR_'.$i]}') ";                    
                break;
            }            
        }
    }



    $filtro .=  substr($filtro, 0, -3);

    if ($filtro != '') {        
        $filtro = 'and ('.$filtro.')';
    }else{
        $filtro = '';
    }    
    
    // echo "SELECT * from ws_contactos where activo = 1 and enviado = 0 {$filtro} {$filtroAZ} limit 1";
    $queryws_contactosE = mysqli_query($conn3, "SELECT * from cliente where ID_principal = '{$_SESSION['ID_principal']}' and habeasdata = 'Si' and enviado = 0 {$filtro} {$filtroAZ} {$whereFiltro} limit 1");
    // var_dump("SELECT * from cliente where habeasdata = 'Si' and enviado = 0 {$filtro} {$filtroAZ} limit 1");
    $queryws_cE = mysqli_query($conn3, "SELECT * from cliente where ID_principal = '{$_SESSION['ID_principal']}' and habeasdata = 'Si' and enviado = 0 {$filtro} {$filtroAZ} {$whereFiltro}");
    // var_dump("SELECT * from cliente where habeasdata = 'Si' and enviado = 0 {$filtro} {$filtroAZ} {$whereFiltro}");
    $countws_cE = mysqli_num_rows($queryws_cE);

    $fetchws_contactosE = mysqli_fetch_array($queryws_contactosE);
    $countws_contactosE = mysqli_num_rows($queryws_contactosE);

    if ($countws_contactosE > 0) {

        // test jose
        // $fetchws_contactosE['whatsapp'] = '573194615775';

        $enviado = Whatsapp_sent2($fetchws_contactosE['whatsapp'] , $mensaje);
        if ($idArchivo > 0) {
            $queyrAlias = "SELECT alias from ws_archivos where id = {$idArchivo}";
            $fetchAlias = mysqli_query($conn3, $queyrAlias);
            $rowAlias = mysqli_fetch_array($fetchAlias);

            $archivoUrl = "https://app.dentalsoftplus.com/r/" . $rowAlias['alias'];
            // echo $archivoUrl;
            // Whatsapp_sent2($fetchws_contactosE['indicativo'] . $fetchws_contactosE['numero'], $archivoUrl);
            enviarArchivo($fetchws_contactosE['whatsapp'] , $archivoUrl);
            // var_dump($fetchws_contactosE['whatsapp'] , $archivoUrl);
        }

        // if ($fetchws_contactosE['envio_correo'] == 1) {
        //     // PLANTILLA CORREO ADAPTADO POR JOSE
        //     // ------------------------------------------
        //     // enviar correo
        //     // se arma el correo de bienvenida
        //     $_GET['receptor'] = $fetchws_contactosE['correo_cliente'];
        //     $_GET['asunto'] = "Sr(a) {$fetchws_contactosE['nombre']} ";
        //     $_GET['mensaje'] = $mensaje;
        //     include 'ws_plantillaCorreo.php';
        //     // ------------------------------------------
        // }

        if ($enviado) {
            $countws_cE--;
        }
    }
    mysqli_query($conn3, "UPDATE cliente SET enviado = '$enviado' where cliente_id = '{$fetchws_contactosE['cliente_id']}'");


    $queryws_contactos = mysqli_query($conn3, "SELECT * from cliente where ID_principal = '{$_SESSION['ID_principal']}' and habeasdata = 'Si' and enviado <> 0 {$whereFiltro} ");
    $countws_contactos = mysqli_num_rows($queryws_contactos);
    foreach ($queryws_contactos as $datws_contactos) { ?>
        <?php $☺ = explode("/", ($datws_contactos['enviado'] == 1 ? "Enviado/text-success" : "No enviado/text-danger")) ?>
        <tr style="display: flex; flex-flow: row;">
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['nombre_cliente'] ?></td>
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['whatsapp'] ?></td>
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['filtro_ws'] ?></td>
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
