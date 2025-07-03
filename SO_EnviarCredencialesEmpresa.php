<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
$idEmpresa = $_GET['key'];
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
$querySelectEmpresa = mysqli_query($conn3, "SELECT * FROM empresasAfiliadas WHERE id = $idEmpresa AND estado = 1 LIMIT 1");
$numRow = mysqli_num_rows($querySelectEmpresa);
if ($numRow > 0) {
    $objeto = $querySelectEmpresa->fetch_object();

    if ($objeto->clave != "") {
        $claveNueva = $objeto->clave;
    } else {
        $claveNueva = Encriptar((empty($objeto->NIT) ? base64_encode(rand(100, 1000)) : $objeto->NIT));
        $queryUpdate = mysqli_query($conn3, "UPDATE empresasAfiliadas SET clave = '{$claveNueva}' WHERE id = $idEmpresa");
    }


    $usuario_id = $_GET['usuario_id'];

    $para = "{$objeto->correoContactoEmpresa}";
    // título
    $titulo = 'Credenciales';
    // mensaje
    $mensaje .= '
    <html>
    <head>
    <title>
    Datos para Ingreso en Plataforma.</title>
        <table width="100%" height="466" border="0">
    <tr>
        <td><table width="100%" height="75" border="0">
        
        </table>
        <table width="100%" height="143" border="0">
            <tr>
                <td height="139" bgcolor="#00A74B">
                    <table width="100%" height="62" border="0">
                        <tr>
                            <td width="5%">&nbsp;</td>
                            <td width="72%" style="color:#FFF;">
                            <h2><strong>
                            Un placer Saludarle, ' . $objeto->nombreEmpresa . '
                            </strong></h2>
                            </td>
                            <td width="23%">&nbsp;</td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>
        <table width="100%" height="122" border="0">
            <tr>
            <td width="10%">&nbsp;</td>
            <td width="80%"><p>Estimada Empresa:</p>
                <p>Credenciales para ingresar a la plataforma de Visualizacion de Certificados Segun Empleados.<br />
                ';
    $mensaje .=  "<h1 align='center'></h1>";
    $mensaje .=  "<h1>Usuario: {$objeto->correoContactoEmpresa}</h1>";
    $mensaje .=  "<h1>Contraseña: {$claveNueva}</h1>";
    $mensaje .=  '<br></br>';
    $mensaje .=  "<h1>Link de Plataforma: http://medicalsoftplus.com/baseDev/verHistorias?i={$usuario_id}</h1>";
    $mensaje .=  "<h1>La contraseña puede ser modificada.</h1>";
    $mensaje .=  '<br></br>
            
            <td width="10%">&nbsp;</td>
            </tr>
        </table>
        <table width="100%" border="0">
            <tr>
            <td height="21" bgcolor="#00A74B">&nbsp;</td>
            </tr>
        </table>
        <table width="100%" height="64" border="0">
            <tr>
            <td height="60">Este correo electronico no puede recibir respuestas.<br />
            </td>
            </tr>
        </table>

        </td>
    </tr>
    </table>
    </head>
    <body>

    </body>
    </html>
';
    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Cabeceras adicionales
    $cabeceras .= 'To: MedicalSoft <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From: Credenciales - ' . $objeto->nombreEmpresa . ' <noreply@medicalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
    // Enviarlo

    $texto =  "<p>Estimada Empresa:</p>";
    $texto =  "<p>Credenciales para ingresar a la plataforma de Visualización de Certificados Según Empleados.</p>";
    $texto .= "<h1>Usuario: <br>{$objeto->correoContactoEmpresa}</h1>";
    $texto .= "<h1>Contraseña: <br>{$claveNueva}</h1>";
    $texto .= "<h1>Link de Plataforma:<br> http://medicalsoftplus.com/baseDev/verHistorias?i={$usuario_id}</h1>";
    $texto .= "<h1>La contraseña puede ser modificada.</h1>";
    // ------------------------------------------
    // enviar correo
    // se arma el correo de bienvenida
    $_GET['receptor'] = $para;
    $_GET['asunto'] = "Documentos {$objeto->nombreEmpresa} ";
    $_GET['mensaje'] = $texto;
    include 'plantillaCorreo.php';
    // ------------------------------------------
    echo "<script language='Javascript'> window.location='SO_EmpresasAfiliadas';</script>";
    // if (mail($para, $titulo, $mensaje, $cabeceras)) {
    //     echo "<script language='Javascript'> window.location='empresasAfiliadas.php';</script>";
    // }
}
