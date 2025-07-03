<?php
session_start();
include '../funciones/conn3.php';


if ($_GET['accion'] == 1) {
    $idM = base64_decode($_POST['idM']);
    
    $queryws_mensajes = mysqli_query($conn3, "SELECT * from ws_mensajesC where id = $idM");
    $fetchws_mensajes = mysqli_fetch_array($queryws_mensajes);

    $tituloCorreo = $fetchws_mensajes['titulo'];
    $mensajeCorreo = $fetchws_mensajes['mensaje'];
    $bannerCorreo = $fetchws_mensajes['banner'];
    $asuntoCorreo = $fetchws_mensajes['asunto'];




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
        $filtro .= "filtro_ws like '%{$filtroArray[$i]}%' || ";
    }


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



    $filtro .= substr($filtro, 0, -3);

    if ($filtro != '') {        
        $filtro = 'and ('.$filtro.')';
    }else{
        $filtro = '';
    }    
    
    $queryws_contactosE = mysqli_query($conn3, "SELECT * from cliente where habeasdata = 'Si' and enviado = 0 {$filtro} {$filtroAZ} {$whereFiltro} limit 1");
    $queryws_cE = mysqli_query($conn3, "SELECT * from cliente where habeasdata = 'Si' and enviado = 0 {$filtro} {$filtroAZ} {$whereFiltro}");
    $countws_cE = mysqli_num_rows($queryws_cE);

    $fetchws_contactosE = mysqli_fetch_array($queryws_contactosE);
    $countws_contactosE = mysqli_num_rows($queryws_contactosE);

    if ($countws_contactosE > 0) {
        $enviado = 1;
        
        if ($fetchws_contactosE['habeasdata'] == 'Si') {
            $queryConfigCorreo = "SELECT * from ws_correo where usuario_id = '{$_SESSION['ID_principal']}' limit 1";
            $fetchConfigCorreo = mysqli_fetch_assoc(mysqli_query($conn3, $queryConfigCorreo));

            //id, usuario_id, setFrom, Username, Password, Host, Port, fecha

            // enviar el correo yatu sabe
            // configuración
            $mailHost = $fetchConfigCorreo['Host'];
            $mailUsername = $fetchConfigCorreo['Username'];
            $mailPassword = $fetchConfigCorreo['Password'];
            $mailPort = $fetchConfigCorreo['Port'];
            $mailsetFrom = $fetchConfigCorreo['setFrom'];
            $mailaddAddress = $fetchws_contactosE['correo_cliente'];
            $mailSMTPSecure = $fetchws_contactosE['smtp'];
            // configuración - fin
            // mensaje 
            $mailSubject = $asuntoCorreo;
            $mailTitulo = $tituloCorreo;
            $mailMensaje = $mensajeCorreo;
            $mailMensaje = str_replace("moduloMasivos/ws_archivos/", "https://dev.sievensoft.com/dentalsoft/moduloMasivos/ws_archivos/", $mailMensaje);
            $mailBanner = $bannerCorreo;
            // mensaje - fin

            // var_dump($mailHost,$mailUsername,$mailPassword,$mailPort,$mailsetFrom,$mailaddAddress,$mailSubject,$mailTitulo,$mailMensaje,$mailBanner);
            
            include 'masivosCorreoPlantilla.php';
            // ------------------------------------------
        }
        
        if ($enviado) {
            $countws_cE--;
        }
    }
    mysqli_query($conn3, "UPDATE cliente SET enviado = '$enviado' where cliente_id = '{$fetchws_contactosE['cliente_id']}'");


    $queryws_contactos = mysqli_query($conn3, "SELECT * from cliente where habeasdata = 'Si' and enviado <> 0 {$whereFiltro}");
    $countws_contactos = mysqli_num_rows($queryws_contactos);
    foreach ($queryws_contactos as $datws_contactos) { ?>
        <?php $☺ = explode("/", ($datws_contactos['enviado'] == 1 ? "Enviado/text-success" : "No enviado/text-danger")) ?>
        <tr style="display: flex; flex-flow: row;">
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['nombre_cliente'] ?></td>
            <td style="width: calc(100%/4); word-break: break-all; overflow: hidden;"><?= $datws_contactos['correo_cliente'] ?></td>
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
