<?php
session_start();
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funcionesUtilidades.php");
include("funciones/funciones.php");

        
        $CODI_CLIENTE       = trim($_POST['CODI_CLIENTE'], " ");
        $celular_cliente    = $_POST['celular_cliente'];
        $telefono_cliente   = $_POST['telefono_cliente']; 
        $ciudad_cliente     = reem($_POST['ciudad_cliente']);
        $correo_cliente     = reem($_POST['correo_cliente']);
        $tipo_cliente       = $_POST['tipo'];
        $genero             = $_POST['genero'];
        $ocupacion            = $_POST['ocupacion'];
        $nacionalidad            = $_POST['nacionalidad'];
        $asignar           = $_POST['asignar'];

        // $edad_cliente       = calculaedad($fechaNacimiento);

        $profesion_cliente  = reem($_POST['profesion_cliente']);

        $acompananteFamiliar     = reem($_POST['acompananteFamiliar']);
        $telefono_acompanante    = $_POST['telefono_acompanante'];
        $parentesco_acompanante  = reem($_POST['parentesco_acompanante']);

        $motivoConsulta     = reem($_POST['motivoConsulta']);
     

        $antecedentes       = reem($_POST['antecedentes']);
        $direccion_cliente  = reem($_POST['direccion_cliente']);
        $ID                 =$_POST['ID'];
        $NOMBRE_USUARIO                 =$_POST['NOMBRE_USUARIO'];

        $primer_nombre=$_POST['primer_nombre'];
        $segundo_nombre=$_POST['segundo_nombre'];
        $primer_apellido=$_POST['primer_apellido'];
        $segundo_apellido=$_POST['segundo_apellido'];

        $NOMBRE =$primer_nombre.' '.$segundo_nombre;
        $apellido =$primer_apellido.' '.$segundo_apellido;
        $nombre_cliente = $NOMBRE.' '.$apellido;

        $genero_asignado = $_POST['genero_asignado'];

        $departamento               =$_POST['departamento'];
        $zona              =$_POST['zona'];
        



        $Codigo_Pais = $_POST['pais'];
        $Codigo_Departamento = $_POST['departamento'];
        $Codigo_Ciudad = $_POST['ciudad'];


        ////////////////////////////// CREACION DE TABLAS ///////////////////////////////////////////////////
        
        $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = 'Usuario_Web';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `cliente` ADD `Usuario_Web` VARCHAR(100) NULL DEFAULT '' COMMENT 'Usuario para ingresar a la plataforma WEB *Creado desde modulo de Registro Paciente*'");
        }
        $Campo1 = mysqli_query($conn3, "show COLUMNS from cliente WHERE Field = 'Clave_Web';");
        $nrowCampo1 = mysqli_num_rows($Campo1);
        if ($nrowCampo1 == "0") {
            mysqli_query($conn3, "ALTER TABLE `cliente` ADD `Clave_Web` VARCHAR(100) NULL DEFAULT '0' COMMENT 'Clave para ingresar a la plataforma WEB *Creado desde modulo de Registro Paciente*'");
        }
        
        ///////////////////////////////////////////////////////////////////////////////////////////////////
    /*
        $queryList=mysqli_query($conn3,"SELECT * FROM departamentos where codigo='$departamento'");


        $nrowl=mysqli_num_rows($queryList);
        while($row_recordset32A=mysqli_fetch_array($queryList))
        {

          $nombredpto= $row_recordset32A['nombre'];    
        }


      $queryList=mysqli_query($conn3,"SELECT * FROM municipios where codigo='$ciudad_cliente'");


      $nrowl=mysqli_num_rows($queryList);
      while($row_recordset32A=mysqli_fetch_array($queryList))
      {

          $nombreMun= $row_recordset32A['nombre'];
      }


        $municipio_manual = reem($_POST['municipio_manual']);
        $departamento_manual = reem($_POST['departamento_manual']);

        if($nombredpto=="")
        {
            $nombredpto=$departamento_manual;
        }
        if($nombreMun=="")
        {
            $nombreMun=$municipio_manual;
        }
    */

        $entidadSalud       = reem($_POST['entidadSalud']);
        $queryList=mysqli_query($conn3,"SELECT * FROM administradora where codigo='$entidadSalud'");


        $nrowl=mysqli_num_rows($queryList);
        while($row_recordset32A=mysqli_fetch_array($queryList))
        {

          $nombreEntidad= $row_recordset32A['nombre'];




         }


        
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
        $indicativo = $_POST['indicativo'];

        $whatsapp = $whatsapp;

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
  

$sucursal1 = $_POST['sucursal_cliente'];
$pais = $_POST['pais'];

$nivel_educacion = $_POST['nivel_educacion'];
$prepagada = $_POST['prepagada'];  


$habeasdata=$_POST['habeasdata'];
$whatsapp = $indicativo.$whatsapp;
if($habeasdata<>"Si")
{
  $whatsapp=$whatsapp."/*0*/";
  $habeasdata="No";
}

$entidad_id = $_POST['entidad'];
if ($entidad_id == '') {
  $entidad_id = '0';
}
$convenio_id = $_POST['convenio'];
if ($convenio_id == '') {
  $convenio_id = '0';
}
                //insetamos el usuario





                    $queryUsuario = "INSERT INTO cliente 
                    (usuario_id, nombre_cliente, celular_cliente, ciudad_cliente, correo_cliente, CODI_CLIENTE, tipo_cliente, fechar, activo, genero, direccion_cliente, telefono_cliente, edad_cliente, profesion_cliente, acompananteFamiliar, telefono_acompanante,parentesco_acompanante, antecedentes, entidadSalud, seguro, nota, alergias, tiposSangre, esDonante, tomaMedicamento, enfermedadesPequeno, motivoConsulta, fechaNacimiento, peso , altura , imc , ComposicionCorporal, ap1, ap2, ap3, ap4, ap5, ap6, ap7, ap8, ap9, cirugiasCuales, cirugiasOtros, whatsapp, tipoUsuario, estado, sucursal,ocupacion,nacionalidad,cod_entidad, nombre,apellido,zona, asignar,primer_nombre,segundo_nombre,primer_apellido,segundo_apellido,genero_asignado,nivel_educacion,prepagada,indicativo,codigo_pais,codigo_departamento,codigo_ciudad,habeasdata,entidad_id,convenio_id) VALUES
                    ('$ID','$nombre_cliente','$celular_cliente','$nombreMun','$correo_cliente','$CODI_CLIENTE','$tipo_cliente','$fechar','$activo','$genero','$direccion_cliente','$telefono_cliente','$edad_cliente','$profesion_cliente','$acompananteFamiliar','$telefono_acompanante','$parentesco_acompanante','$antecedentes', '$nombreEntidad', '$seguro', '$nota', '$alergias', '$tiposSangre', '$esDonante', '$tomaMedicamento', '$enfermedadesPequeno', '$motivoConsulta', '$fechaNacimiento', '$peso' , '$altura' , '$imc' , '$ComposicionCorporal', '$ap1', '$ap2', '$ap3', '$ap4', '$ap5', '$ap6', '$ap7', '$ap8', '$ap9', '$cirugiasCuales', '$cirugiasOtros', '$whatsapp', '$tipoUsuario', '$estado', '$sucursal1','$ocupacion','$nacionalidad','$entidadSalud', '$NOMBRE','$apellido','$zona', '$asignar','$primer_nombre','$segundo_nombre','$primer_apellido','$segundo_apellido','$genero_asignado','$nivel_educacion','$prepagada','$indicativo','$Codigo_Pais','$Codigo_Departamento','$Codigo_Ciudad','$habeasdata','$entidad_id','$convenio_id')";
          




mysqli_query($conn3,$queryUsuario) or die(mysqli_error($conn3));

$idcliente = mysqli_insert_id($conn3);

$Usuario_Web = $primer_nombre . substr($CODI_CLIENTE, 0, 5).'_'.$idcliente;
$Clave_Web = $CODI_CLIENTE.$idcliente;

mysqli_query($conn3, "UPDATE cliente SET  Usuario_Web= '$Usuario_Web', Clave_Web='$Clave_Web'  WHERE cliente_id = '$idcliente'");






$q=mysqli_query($conn3,"select MAX(cliente_id) as cliente_id from cliente");
$data=mysqli_fetch_array($q);
$clienteId = $data['cliente_id'];






 
$mensaje = 'Sr(a) *'.$nombre_cliente.'* usted a quedado registrado en notificaciones para su mejor tratamiento médico con Dr(a) *'.$NOMBRE_USUARIO.'* en MedicalSoft. 

Su acceso al portal de MedicalSoft es : '.$Base.'/web/Plataforma/

USuario: '.$Usuario_Web.'
Clave:  '.$Clave_Web.'

Si no desea recibir notificaciones puede darle de baja en cualquier momento respondiendo con la palabra NO

Atte ALTE 
de MedicalSoft';

Whatsapp_sent_cliente($linkkey, $whatsapp, $mensaje, $cliente_id, $usuario_id, $whatsapp, $accion)






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
    
























if($_FILES['imagen']['name']<>"")
{
  define('UPLOAD_DIR', 'pascientes/');
  $img = $_FILES['imagen']['tmp_name'];
  $name = $_FILES['imagen']['name'];
  $name = str_replace(' ', '', $name);
  $name = str_replace('__', '_', $name);
  if ($img <> "") {
    $fechahora = date("Y-m-d_H-i-s");
    $nombre_foto = "{$clienteId}__{$fechahora}__{$name}";
    $success = move_uploaded_file($_FILES['imagen']['tmp_name'], UPLOAD_DIR . $nombre_foto);
    if (!empty($success)) {
      $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombre_foto'  WHERE cliente_id = '$clienteId'";
      mysqli_query($conn3, $queryCliente) or die(mysql_error());
    }
  }
  
  /*
    function fileExtension($s) {
        $n = strrpos($s,".");
        return ($n===false) ? "" : substr($s,$n+1);
    }

    $nombrer = $nombre_cliente.'_'.$clienteId.'.'.fileExtension($_FILES['imagen']['name']);
    $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"],"pascientes/".$nombrer);
  //  $resultado = @move_uploaded_file($_FILES["imagen"]["tmp_name"], $ruta);

    if (!empty($resultado))
    {
    $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombrer'  WHERE cliente_id = '$clienteId'";
    mysqli_query($conn3,$queryCliente) or die(mysql_error());
    echo "UPDATE cliente SET  fotoperfil= '$nombrer'  WHERE cliente_id = '$clienteId'";
    }
  */
}
else
{

  define('UPLOAD_DIR', 'pascientes/');  
  $img = $_POST['foto'];
  if($img<>"")
  {
    $img = str_replace('data:image/png;base64,', '', $img);  
    $img = str_replace(' ', '+', $img);  
    $data = base64_decode($img);
    //$file = UPLOAD_DIR.uniqid().'.png';  //nombre del archivo
    //$file = $nombre_cliente.rand(1,9999).'.png';
    $fechahora = date("Y-m-d_H-i-s");
    $name = str_replace(' ', '', $nombre_cliente);
    $nombre_foto = "{$clienteId}__{$fechahora}__{$name}.png";
    $success = file_put_contents(UPLOAD_DIR.$nombre_foto, $data);
    if (!empty($success))
    {
      $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombre_foto'  WHERE cliente_id = '$clienteId'";
      mysqli_query($conn3,$queryCliente) or die(mysql_error());
    }
    //print $success ? $file : 'Unable to save the file.'; 
  }
}



/*
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
    $nombrer = $clienteId.'.png';
    $queryCliente = "UPDATE cliente SET  fotoperfil= '$nombrer'  WHERE cliente_id = '$clienteId'";
    mysqli_query($conn3,$queryCliente) or die(mysql_error());
}
*/

                if($_POST['calendario']=="1")
                {
                    echo "<script language='Javascript'> window.location='calendarioagenda';</script>"; 
                }
                if ($_SESSION['rol'] <> 2)
                 {
                    //echo "<script language='Javascript'> window.location='registroPcientes.php?clienteId=$clienteId';</script>"; 
                    echo "<script language='Javascript'> window.location='Pacientes.php?clienteId=$clienteId';</script>"; 
                 }
                elseif ($_SESSION['rol'] == 2)
                 {
                    //echo "<script language='Javascript'> window.location='registroPcientes.php?clienteId=$clienteId';</script>"; 
                    echo "<script language='Javascript'> window.location='Pacientes.php?clienteId=$clienteId';</script>"; 
                 }
                                                                       
                echo "<script language='Javascript'> window.location='Pacientes.php';</script>"; 

?>