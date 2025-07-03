<?php
session_start();
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");


    $con=conectar();
        
    // datos del cliente y usuario

        $nombre_cliente     = reem($_POST['nombre_cliente']);
        $CODI_CLIENTE       = $_POST['CODI_CLIENTE'];
        $celular_cliente    = $_POST['celular_cliente'];
        $telefono_cliente   = $_POST['telefono_cliente']; 
        $ciudad_cliente     = reem($_POST['ciudad_cliente']);
        $correo_cliente     = reem($_POST['correo_cliente']);
         
        $genero             = $_POST['genero'];
        $lugarNacimiento= reem($_POST['lugarNacimiento']);
        $tiposSangre        = reem($_POST['tiposSangre']);
        $fn        = reem($_POST['fn']);
        $carne        = reem($_POST['carne']);
        $empresa        = reem($_POST['empresa']);

        $profesion_cliente  = reem($_POST['profesion_cliente']);
        $acompananteFamiliar = reem($_POST['acompananteFamiliar']);
        $telefono_acompanante= $_POST['telefono_acompanante'];

        $motivoConsulta     = reem($_POST['motivoConsulta']);
     

        $antecedentes       = reem($_POST['antecedentes']);
        $direccion_cliente  = reem($_POST['direccion_cliente']);
        $usuario_id                 =$_POST['usuario_id'];
        $NOMBRE_USUARIO                 =$_POST['NOMBRE_USUARIO'];
 
        $entidadSalud       = reem($_POST['entidadSalud']);
        $seguro             = reem($_POST['seguro']);
        
        $esDonante          = reem($_POST['esDonante']);
        $tomaMedicamento    = reem($_POST['tomaMedicamento']);
       

         
        $fechaNacimiento = $_POST['fechaNacimiento'];
  
        $whatsapp = $_POST['whatsapp'];
       
        $fecha             = date("Y-m-d");
  
                    $queryUsuario = "INSERT INTO v_cliente (usuario_id, nombre_cliente, celular_cliente, ciudad_cliente, correo_cliente, genero, direccion_cliente, telefono_cliente, fechaNacimiento, lugarNacimiento, entidadSalud, seguro, CODI_CLIENTE, tiposSangre, fn, empresa, carne, whatsapp) VALUES ('$usuario_id', '$nombre_cliente', '$celular_cliente', '$ciudad_cliente', '$correo_cliente', '$genero', '$direccion_cliente', '$telefono_cliente', '$fechaNacimiento', '$lugarNacimiento', '$entidadSalud', '$seguro', '$CODI_CLIENTE', '$tiposSangre', '$fn', '$empresa', '$carne', '$whatsapp');";
              
           
 
$mensaje = 'Sr(a) *'.$nombre_cliente.'* usted a quedado registrado en notificaciones para su mejor tratamiento médico con *'.$NOMBRE_USUARIO.'* en MedicalSoft. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS de MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);


if ( strlen($correo_cliente)>1 ) {
   
                $para ="$correo_cliente";

                // título
                $titulo = 'Bienvenido a MedicalSoft con el Dr(a).'.$NOMBRE_USUARIO;

                // mensaje
                $mensaje = '
                <html>
                <head>
                  <title>Bienvenido a MedicalSoft con el Dr(a).'.$NOMBRE_USUARIO.'</title>
                    <body> 
                    
                               Hola buen dia '.$nombre_cliente.' usted a quedado registrado en notificaciones para su mejor tratamiento médico con Dr(a) '.$NOMBRE_USUARIO.' en MedicalSoft.  
                              
                               <br></br>
                <p>Atentamente,<br />
                  ALTE-MedicalSoft</p> 
                  
                <br />
                 
                  
 
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

                // Cabeceras adicionales
                $cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From:  Bienvenido a MedicalSoft con'.$NOMBRE_USUARIO.'  <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras);

}
    
 
        $q=mysql_query("select MAX(ID) as cliente_id from v_cliente",$con);
        $data=mysql_fetch_array($q);
        $clienteId = $data['cliente_id'];
        
        $clienteId++;

        echo $clienteId;
        echo $clienteId;
 
                    mysql_query($queryUsuario,$con) or die(mysql_error());
 
                    echo "<script language='Javascript'> window.location='v_historiaClinica3.php?clienteId=$clienteId';</script>"; 
   
                                                                   
                

?>