<?php
session_start();
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");


    $con=conectar();
        

            ///datos del cliente y usuario

        $nombre_cliente     = reem($_POST['nombre_cliente']);
        $CODI_CLIENTE       = $_POST['CODI_CLIENTE'];
        $celular_cliente    = $_POST['celular_cliente'];
        $telefono_cliente   = $_POST['telefono_cliente']; 
        $ciudad_cliente     = reem($_POST['ciudad_cliente']);
        $correo_cliente     = reem($_POST['correo_cliente']);
        $tipo_cliente       = $_POST['tipo_cliente'];
        $genero             = $_POST['genero'];

        // $edad_cliente       = calculaedad($fechaNacimiento);

        $profesion_cliente  = reem($_POST['profesion_cliente']);
        $acompananteFamiliar = reem($_POST['acompananteFamiliar']);
        $telefono_acompanante= $_POST['telefono_acompanante'];

        $motivoConsulta     = reem($_POST['motivoConsulta']);
     

        $antecedentes       = reem($_POST['antecedentes']);
        $direccion_cliente  = reem($_POST['direccion_cliente']);
        $ID                 =$_POST['ID'];
        $NOMBRE_USUARIO                 =$_POST['NOMBRE_USUARIO'];






        $entidadSalud       = reem($_POST['entidadSalud']);
        $seguro             = reem($_POST['seguro']);
        $nota               = reem($_POST['nota']);
        $alergias           = reem($_POST['alergias']);
        $tiposSangre        = reem($_POST['tiposSangre']);
        $esDonante          = reem($_POST['esDonante']);
        $tomaMedicamento    = reem($_POST['tomaMedicamento']);
        $enfermedadesPequeno= reem($_POST['enfermedadesPequeno']);
        

        $fechaNacimiento = $_POST['fechaNacimiento'];


        $ap1 = $_POST['ap1'];
        $ap2 = $_POST['ap2'];
        $ap3 = $_POST['ap3'];
        $ap4 = $_POST['ap4'];
        $ap5 = $_POST['ap5'];
        $ap6 = $_POST['ap6'];
        $ap7 = $_POST['ap7'];
        $ap8 = $_POST['ap8'];
        $ap9 = $_POST['ap9'];

        $cirugiasCuales =  reem($_POST['cirugiasCuales']);
        $cirugiasOtros =  reem($_POST['cirugiasOtros']);
        $whatsapp = $_POST['whatsapp'];
        $tipoUsuario = $_POST['tipoUsuario'];
        $estado = $_POST['estado'];


 




        $peso = $_POST['peso'];
        $altura = $_POST['altura'];
        $imc = $_POST['imc'];
        $ComposicionCorporal = $_POST['ComposicionCorporal'];

  if ($peso == '') {
            $peso = '0';
            $altura = '0';
            $imc = '0';
            $ComposicionCorporal = 'no determinado';
          }


        $activo             = 1;
        $fechar             = date("Y-m-d H:i:s");
  

if ($ap1 == '') {$ap1=0;}        
if ($ap2 == '') {$ap2=0;}        
if ($ap3 == '') {$ap3=0;}        
if ($ap4 == '') {$ap4=0;}        
if ($ap5 == '') {$ap5=0;}        
if ($ap6 == '') {$ap6=0;}        
if ($ap7 == '') {$ap7=0;}        
if ($ap8 == '') {$ap8=0;}        
if ($ap9 == '') {$ap9=0;}        
if ($sucursal == '') {$sucursal=0;}        
        
/*
        $chekUsuario = "SELECT * from envioEmbarcador where correo = '$correoCliente'";
        $resultChekusuario = mysql_query ($chekUsuario, $con) or die ( mysql_error());
     
        $usuarioExiste = mysql_num_rows($resultChekusuario);
         echo "3  ";
        if($usuarioExiste>0){
          echo "4  ";
            echo "<script language='Javascript'> window.location='agregarClientes.php?msg=1';
                </script>"; 
        }
        else{
 */           
        

                //insetamos el usuario





                    $queryUsuario = "INSERT INTO cliente 
                    (usuario_id, nombre_cliente, celular_cliente, ciudad_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, direccion_cliente, telefono_cliente, edad_cliente, profesion_cliente, acompananteFamiliar, telefono_acompanante, antecedentes, entidadSalud, seguro, nota, alergias, tiposSangre, esDonante, tomaMedicamento, enfermedadesPequeno, motivoConsulta, fechaNacimiento, peso , altura , imc , ComposicionCorporal, ap1, ap2, ap3, ap4, ap5, ap6, ap7, ap8, ap9, cirugiasCuales, cirugiasOtros, whatsapp, tipoUsuario, estado, sucursal) VALUES
                    ('$ID','$nombre_cliente','$celular_cliente','$ciudad_cliente','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$direccion_cliente','$telefono_cliente','$edad_cliente','$profesion_cliente','$acompananteFamiliar','$telefono_acompanante','$antecedentes', '$entidadSalud', '$seguro', '$nota', '$alergias', '$tiposSangre', '$esDonante', '$tomaMedicamento', '$enfermedadesPequeno', '$motivoConsulta', '$fechaNacimiento', '$peso' , '$altura' , '$imc' , '$ComposicionCorporal', '$ap1', '$ap2', '$ap3', '$ap4', '$ap5', '$ap6', '$ap7', '$ap8', '$ap9', '$cirugiasCuales', '$cirugiasOtros', '$whatsapp', '$tipoUsuario', '$estado', '$sucursal')";
              
           
 
$mensaje = 'Sr(a) *'.$nombre_cliente.'* usted a quedado registrado en notificaciones para su mejor tratamiento médico con Dr(a) *'.$NOMBRE_USUARIO.'* en MedicalSoft. Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO. Atte DR ALBUJA CENTROS MEDICOS de MedicalSoft';
Whatsapp_sent($celular_cliente, $mensaje);


if ( strlen($correo_cliente)>1 ) 
        {
   
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
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

                // Para enviar un correo HTML, debe establecerse la cabecera Content-type
                $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
                $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Cabeceras adicionales
                $cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'From:  Bienvenido a MedicalSoft con el Dr(a).'.$NOMBRE_USUARIO.'  <noreply@medicalsoftcolombia.com>' . "\r\n";
                $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
                $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";

                // Enviarlo
                mail($para, $titulo, $mensaje, $cabeceras);

        }
    





 
                    $q=mysql_query("select MAX(cliente_id) as cliente_id from cliente",$con);
                    $data=mysql_fetch_array($q);
                    $clienteId = $data['cliente_id'];
                    
                    $clienteId++;

                    echo $clienteId;
                      
                    mysql_query($queryUsuario,$con) or die(mysql_error());

                    echo 'cargamos la imagen';
                    $nombre = $_FILES['imagen']['name'].rand(1, 500);
                    $nombrer = strtolower(rand(1, 500).$nombre);
                    $cd=$_FILES['imagen']['tmp_name'];
                    $ruta = "pascientes/" . $_FILES['imagen']['name'];
                    $destino = "pascientes/".$nombrer;
                    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"],"pascientes/" . $clienteId.'.png');
                  //  $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

                    if (!empty($resultado))
                    {

                     /*       @mysqli_query($conexion,"INSERT INTO fotos VALUES ('". $nombre."','" . $destino . "')"); 
                            echo "el archivo ha sido movido exitosamente";
                    */
                    $nombrer = $clienteId.'.png';
                    $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombrer'  WHERE cliente_id = '$clienteId'";
                    mysql_query($queryCliente,$con) or die(mysql_error());



                    }
 
     echo "<script language='Javascript'> window.location='historiaClinica_ecografias.php?clienteId=$clienteId';</script>"; 
   
               


?>