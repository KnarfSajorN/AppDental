<?php
include 'header.php';
include 'menu.php';

$usuarioId = $_SESSION['ID'];

$clienteId = decrypt($_GET['cI']);
$Plantilla_General_id = decrypt($_GET['pGi']);

$NombreTabla = funcionMaster($Plantilla_General_id, 'id', 'Nombre', 'PP_Plantillas_Principales');
$NombreTablaInformacion = funcionMaster($Plantilla_General_id, 'id', 'Nombre_Tabla_Informacion', 'PP_Plantillas_Principales');

$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$clienteId");
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $whatsapp = $rowMotorizado["whatsapp"];
    $correo_cliente = $rowMotorizado["correo_cliente"];
}

if (isset($_POST["Enviar_Documento"])) {

    $Whatsapp = $_POST["numero_whatsapp"];
    $Correo = $_POST["correo"];

    $cliente_id = $_POST["cliente_id"];
    $id = $_POST["id"];
    $NombreTablaEnviar = $_POST["NombreTablaInformacion"];
    $usuario_id = funcionMaster($id, 'id', 'usuario_id', $NombreTablaEnviar);

    $id_ = encrypt($id);
    $NombreTablaEnviar_ = encrypt($NombreTablaEnviar);

    $mensajeW = " Sr(a) *" . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente') . "* Se le ha registrado un documento por el Doctor " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", para visualizarla entrar en el siguiente link, Link: {$Base}documentosImprimir?pGi={$id_}&p={$NombreTablaEnviar_}";
    $action = 0;
    Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $idCliente, $usuario_id, $Whatsapp, $action);

    /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
    include 'PlantillaCorreo/funcionesPlantillas.php';

    $usuario_id = $usuario_id;
    $titulo = "Documentos";
    $subtitulo = "Documentos Medicos - " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $texto = $mensajeW . ' o puede darle click al boton que dice Documento, Muchas gracias por su tiempo';
    $url = ["{$Base}documentosImprimir?pGi={$id_}&p={$NombreTablaEnviar_}"];
    $botonurl = ["Documento"];

    $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
    ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
    $para = "{$Correo}"; //Correo

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'To: ' . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From: ' . $titulo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

    // Enviarlo

    //$para      = 'pdachg_s816s@tigpe.com';
    //$titulo    = 'El título';
    //$mensaje   = 'Hola';
    //$cabeceras = 'From: noreply@medicalsoftcolombia.com';    

    mail($para, $titulo, $mensaje, $cabeceras);

    //mail($para, $subtitulo, $mensaje, $cabeceras);

    //echo "$para, $subtitulo, $mensaje, $cabeceras";
    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $cliente_id = encrypt($cliente_id);
    $Plantilla_General_id_ = encrypt($Plantilla_General_id);
    echo "<script language='Javascript'> window.location='documentoVerPaciente?cI={$cliente_id}&pGi={$Plantilla_General_id_}'</script>";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

if (isset($_POST["Enviar_Firma"])) {

    function Encriptar($valor)
    {
        $Sc = base64_decode("Medical");
        $Texto = (openssl_encrypt($valor, "AES-256-CBC", $Sc));
        return base64_encode($Texto);
    }

    function Desencriptar($valor)
    {
        $Sc = base64_decode("Medical");
        $Texto = openssl_decrypt(($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }

    $id = $_POST["id"]; //id de la tabla
    $NombreTablaEnviar = $_POST["NombreTablaInformacion"]; // nombre de la tabla
    $NombreTablaEnviar_ = encrypt($NombreTablaEnviar);
    $id_ = encrypt($id);

    $Whatsapp = $_POST["numero_whatsapp"];
    $Correo = $_POST["correo"];
    $cliente_id = $_POST["cliente_id"];
    $usuario_id = funcionMaster($id, 'id', 'usuario_id', $NombreTablaEnviar); //nombre del usuario en la tabla de la plantilla

    $tabla = Encriptar("$NombreTablaEnviar"); //nombre de la tabla
    $idtabla = Encriptar("id"); // nombre del id de la tabla (llave primaria)

    $mensajeW = " Sr(a) *" . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente') . "*, se le ha registrado un documento por el Doctor " . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ", el presente documento necesita ser firmado, para firmar el documento acceder al siguiente Link: {$Base}FirmasPacientes/FirmarDocumento/{$tabla}/{$idtabla}/{$id}, para visualizar el documento acceder en el siguiente Link: {$Base}documentosImprimir?pGi={$id_}&p={$NombreTablaEnviar_}";
    $action = 0;
    Whatsapp_sent_cliente($linkkey, $Whatsapp, $mensajeW, $cliente_id, $usuario_id, $Whatsapp, $action);

    /////////////////////////////////Correo electronico [Llenar]/////////////////////////////////
    include 'PlantillaCorreo/funcionesPlantillas.php';

    $usuario_id = $usuario_id;
    $titulo = "Documentos";
    $subtitulo = "Documentos Medicos - " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
    $texto = $mensajeW . ' o puede darle click al boton "Firmar" para realizar la firma, o al botón "Documento" para visualizar el documento que fue generado, Muchas gracias por su tiempo';
    ;
    $url = ["{$Base}FirmasPacientes/FirmarDocumento/{$tabla}/{$idtabla}/{$id}", "{$Base}documentosImprimir?pGi={$id_}&p={$NombreTablaEnviar_}"];
    $botonurl = ["Firmar", "Documento"];

    $mensaje = PlantillaBasicaMedica($usuario_id, $titulo, $subtitulo, $texto, $url, $botonurl);
    ////////////////////////////////////Correo electronico [Datos Adicionales]/////////////////////////////////
    $para = "{$Correo}"; //Correo

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    // Cabeceras adicionales
    $cabeceras .= 'To: ' . funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios') . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From: ' . $titulo . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

    // Enviarlo
    mail($para, $subtitulo, $mensaje, $cabeceras);


    $ruta = htmlentities($_SERVER['PHP_SELF']);
    $clienteId = encrypt($clienteId);
    $Plantilla_General_id = encrypt($Plantilla_General_id);
    echo "<script language='Javascript'> window.location='documentoVerPaciente?cI={$clienteId}&pGi={$Plantilla_General_id}'</script>";
}

if (isset($_POST["Boton_Firmar_Ahora"])) {

    function Encriptar($valor)
    {
        $Sc = base64_decode("Medical");
        $Texto = (openssl_encrypt($valor, "AES-256-CBC", $Sc));
        return base64_encode($Texto);
    }

    function Desencriptar($valor)
    {
        $Sc = base64_decode("Medical");
        $Texto = openssl_decrypt(($valor), "AES-256-CBC", $Sc);
        return $Texto;
    }

    $id = $_POST["id"]; //id de la tabla
    $NombreTablaEnviar = $_POST["NombreTablaInformacion"]; // nombre de la tabla


    $tabla = Encriptar("$NombreTablaEnviar"); //nombre de la tabla
    $idtabla = Encriptar("id"); // nombre del id de la tabla (llave primaria)

    echo "<script language='Javascript'> window.location='{$Base}FirmasPacientes/FirmarDocumento/{$tabla}/{$idtabla}/{$id}'</script>";

    //echo "<script language='javascript'>window.open('{$Base}FirmasPacientes/FirmarDocumento/{$tabla}/{$idtabla}/{$id}');</script>";
/*
$clienteId = encrypt($clienteId);
    $Plantilla_General_id = encrypt($Plantilla_General_id);
echo "<script language='Javascript'> window.location='documentoVerPaciente?cI={$clienteId}&pGi={$Plantilla_General_id}'</script>";
*/
}


?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header">
        <h1>
            Paciente

        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
            <li><a href="#">Historial Clinico</a></li>
        </ol>
    </section> -->

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen" />

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="card-body">
                <div class="box">
                    <?php echo datosPacientes($clienteId); ?>
                    <div align="center">
                        <!-- <a class="btn btn-primary" href="Historia_Clinica.php?clienteId=<?php echo $clienteId; ?>" role="button"> <i class="fa fa-heartbeat"></i> Nueva consulta </a> -->
                        <a class="btn btn-outline-info btn-lg rounded-pill shadow"
                            href="anexosPaciente?cI=<?= encrypt($clienteId); ?>" role="button"><i
                                class="fa fa-folder-open-o"></i> Agregar Exámenes </a>
                        <?php
                        include 'estadoFacturaPresupuestoCliente.php';
                        ?>
                        <br><br>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="box-body">
        <div>
            <div class="col-md-12">

                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">

                        <li role="presentation" class="active"><a href="#Section1" aria-controls="home" role="tab"
                                data-toggle="tab" style="color:black"> <i class='fas fa-book-medical'
                                    style='font-size:26px:'> </i> <?php echo $NombreTabla; ?></a></li>

                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs" style="display:flow-root;">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="active" id="Section1">

                            <!--inicio accordion-->
                            <div class="col-md-12">
                                <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">


                                    <?php

                                    $queryList = mysqli_query($conn3, "SELECT * FROM  {$NombreTablaInformacion} where cliente_id = '$clienteId' AND (usuario_id='$usuarioId' or usuario_id='{$_SESSION['ID_principal']}') AND Activo = 1");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $Contador++;

                                        $id = $rowMotorizado['id'];
                                        $cliente_id = $rowMotorizado['cliente_id'];
                                        $usuario_id = $rowMotorizado['usuario_id'];
                                        $Fecha_Registro = $rowMotorizado['Fecha_Registro'];

                                        $Titulo = $rowMotorizado['Titulo'];
                                        $Plantilla = $rowMotorizado['Plantilla'];
                                        $Firma = $rowMotorizado['Firma'];
                                        $Firma_Informacion = $rowMotorizado['Firma_Informacion'];

                                        if (strlen($Firma) > 1) {
                                            $background = "background: rgb(255,255,255);background: -moz-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);background: -webkit-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(146,223,118,1) 42%, rgba(159,237,131,1) 50%, rgba(146,223,118,1) 58%, rgba(255,255,255,1) 100%);filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ffffff',GradientType=1);";
                                        } else {
                                            $background = "background: rgb(255,255,255); background: -moz-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); background: -webkit-linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); background: linear-gradient(165deg, rgba(255,255,255,1) 0%, rgba(223,118,118,1) 42%, rgba(237,131,131,1) 50%, rgba(223,118,118,1) 58%, rgba(255,255,255,1) 100%); filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#ffffff',endColorstr='#ffffff',GradientType=1);";
                                        }

                                        ?>
                                        <div class="panel panel-default" style="background: #f1f1f1;">
                                            <div class="panel-heading" role="tab" id="heading"
                                                style="background-color: #bad8e687;">
                                                <h4 class="panel-title">
                                                    <a class="collapsed" role="button" data-toggle="collapse"
                                                        data-parent="#accordion"
                                                        href="#Plantilla_Documento_<?php echo $id ?>" aria-expanded="false"
                                                        aria-controls="Plantilla_Documento_<?php echo $id ?>"
                                                        style="width:100%">
                                                        Documento #
                                                        <?php echo $Contador . ' / <b style="color: #444444;">' . $Fecha_Registro . $NombreTabla . '</b>'; ?>

                                                        <!--necesita plugin iconofy para ver los iconos-->
                                                        <button type="button"
                                                            onclick="window.location.href='documentosImprimir?pGi=<?= encrypt($id); ?>&p=<?= encrypt($NombreTablaInformacion); ?>'; Document.getElementById('Plantilla_Documento_<?php echo $id ?>').classname = 'panel-collapse collapse';"
                                                            style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;"
                                                            title="Imprimir Documento"><i class="iconify"
                                                                data-icon="gridicons:print"></i></button>

                                                        <button data-toggle="modal" data-target="#modalEnvio"
                                                            onclick="setTimeout(function(){ document.getElementById('Plantilla_Documento_<?php echo $id; ?>').className='panel-collapse collapse'; }, 500);EnviarMensaje('<?php echo $cliente_id; ?>','<?php echo $id; ?>','<?php echo $NombreTablaInformacion; ?>','Enviar_Documento');"
                                                            style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;"
                                                            title="Enviar Documento [Whatsapp/Correo Electronico]"><i
                                                                class="iconify" data-icon="ri:whatsapp-fill"
                                                                style="position: relative;right: -2px;"></i><i
                                                                class="iconify" data-icon="fluent:mail-alert-16-filled"
                                                                style="position: relative;left: -0.5px;"></i></button>

                                                        <button data-toggle="modal" data-target="#modalEnvio"
                                                            onclick="setTimeout(function(){ document.getElementById('Plantilla_Documento_<?php echo $id; ?>').className='panel-collapse collapse'; }, 500); EnviarMensaje('<?php echo $cliente_id; ?>','<?php echo $id; ?>','<?php echo $NombreTablaInformacion; ?>','Enviar_Firma');"
                                                            style="border: hidden;font-size: 20px;z-index:10;<?php echo $background . ";"; ?>border-radius: 20px;"
                                                            title="Enviar Firma al Paciente [Whatsapp/Correo Electronico]"><i
                                                                class="iconify" data-icon="wpf:signature"></i></button>

                                                        <button
                                                            style="border: hidden;font-size: 20px;z-index:10;background-color: #b9ccd5;border-radius: 20px;"
                                                            title="Editar Documento"
                                                            onclick=" window.location='documentoEditar?i=<?= encrypt($id) . '&tB=' . urlencode(openssl_encrypt($NombreTablaInformacion, 'AES-256-CBC', base64_decode('Medical'))); ?>'"><i
                                                                class="iconify" data-icon="bi:pencil-fill"></i></button>

                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="Plantilla_Documento_<?php echo $id ?>" class="panel-collapse collapse"
                                                role="tabpanel" aria-labelledby="heading"
                                                style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                                <div class="panel-body">
                                                    <?php
                                                    echo "<hr style='border-top: 1px solid #004e89;'> <h4 align='center'>{$Titulo}</h4><br>";
                                                    echo "<div style='padding-right: 20px;padding-left: 20px;'>{$Plantilla}</div><br><hr style=border-top: 1px solid #004e89;'>";
                                                    echo "<div class='row'>";
                                                    if (strlen($Firma) > 1) {

                                                        echo "<div class='col-xs-6' align='center'>
                                                            <img src='$Firma' height='100' width='200'>
                                                            <br><u><b>*Paciente*</b></u>
                                                            <br>$Firma_Informacion
                                                            <br><u><b>*Documento Firmado Digitalmente*</b></u>
                                                            </div>";
                                                    }
                                                    $firmaE = funcionMaster($usuario_id, 'ID_Usuario', 'firma', 'config');
                                                    $Datos = funcionMaster($usuario_id, 'ID', 'NOMBRE_USUARIO', 'usuarios');
                                                    if (strlen($firmaE) > 1) {

                                                        echo "<div class='col-xs-6' align='center'>
                                                            <img src='{$Base}/FirmasReg/{$firmaE}' height='100' width='200'>
                                                            <br><u><b>*Medico*</b></u>
                                                            <br>$Datos
                                                            <br><u><b>*Documento Firmado Digitalmente*</b></u>
                                                            </div>";
                                                    }
                                                    echo "</div>";
                                                    ?>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                </div>
                            </div>
                            <!--final accordion-->
                        </div>
                        <!-- cierre seccion 1-->







                    </div>
                </div>
            </div>
        </div>
    </div>


</div>
</section>
</div>


<div class="modal fade" id="modalEnvio" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <p class="statusMsg"></p>
                <h5 class="modal-title" id="myModalLabel">Enviar Documento</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <!-- Modal Body -->
            <div class="modal-body">
                <p class="statusMsg"></p>
                <form
                    action="documentoVerPaciente?cI=<?= encrypt($clienteId) ?>&pGi=<?= encrypt($Plantilla_General_id) ?>"
                    method="POST" name="formularioEnvioExamen">
                    <div class="form-group">
                        <label for="inputEmail">Whatsapp</label>
                        <input type="number" class="form-control" name="numero_whatsapp"
                            value="<?php echo $whatsapp ?>" />
                        <label for="inputEmail">Correo</label>
                        <input type="text" class="form-control" name="correo" value="<?php echo $correo_cliente ?>" />
                        <input type="hidden" name="cliente_id" id="cliente_id">
                        <input type="hidden" name="id" id="id">
                        <input type="hidden" name="NombreTablaInformacion" id="NombreTablaInformacion">
                    </div>

                    <button type="button" class="btn btn-outline-danger btn-lg rounded-pill shadow"
                        data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-outline-info btn-lg rounded-pill shadow submitBtn"
                        id="Boton_Enviar">Enviar</button>

                    <div id="Div_Boton_Firmar_Ahora" style="float:right;"></div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    function EnviarMensaje(cliente_id, id, NombreTablaInformacion, boton) {
        document.getElementById("cliente_id").value = cliente_id;
        document.getElementById("id").value = id;
        document.getElementById("NombreTablaInformacion").value = NombreTablaInformacion;
        if (boton == "Enviar_Documento") {
            document.getElementById("Boton_Enviar").name = boton;
            document.getElementById("Boton_Enviar").innerHTML = "Enviar Documento";
            document.getElementById("myModalLabel").innerHTML = "Enviar Documento";
            document.getElementById("Div_Boton_Firmar_Ahora").innerHTML = "";
        } else if (boton == "Enviar_Firma") {
            document.getElementById("Boton_Enviar").name = boton;
            document.getElementById("Boton_Enviar").innerHTML = "Enviar Firma";
            document.getElementById("myModalLabel").innerHTML = "Enviar Firma";

            document.getElementById("Div_Boton_Firmar_Ahora").innerHTML = "<button type='submit' class='btn btn-outline-info btn-lg rounded-pill shadow submitBtn' Name='Boton_Firmar_Ahora' style='background: darkcyan;color:white'>Firmar Ahora</button>";;

        }

    }
</script>

<?php
include 'footer.php';

?>