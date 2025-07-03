<?php
date_default_timezone_set('America/Bogota');
//include("conexiones/conexion.php");
include("funciones/funciones.php");
include("funciones/funcionesUtilidades.php");
?>


<?php

$historiaClinica = decrypt($_GET['iC']);



$queryList = mysqli_query($conn3, "SELECT * FROM historiaClinicaEpic where id = $historiaClinica");

if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $cliente_id      = $rowMotorizado['cliente_id'];
    $usuario_id      = $rowMotorizado['usuario_id'];
    $Fecha      = $rowMotorizado['Fecha'];
    $Hora = $rowMotorizado['Hora'];
  }
}



$queryList = mysqli_query($conn3, "SELECT * FROM config where ID_Usuario = $usuario_id");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
    $moneda = $rowMotorizado['moneda'];
    $impuestoF = $rowMotorizado['impuestoF'];
    // Nuevos campos
    $nombreF      = $rowMotorizado['nombreF'];
    $telefonoF    = $rowMotorizado['telefonoF'];
    $direccionF   = $rowMotorizado['direccionF'];
    $emailF       = $rowMotorizado['emailF'];
    $ciudadPaisF  = $rowMotorizado['ciudadPaisF'];
    $licenciaF    = $rowMotorizado['licenciaF'];
    $pieF         = $rowMotorizado['pieF'];
    $header       = $rowMotorizado['header'];

    $LogoF           = $rowMotorizado['logoF'];
    $firma               = $rowMotorizado['firma'];

    if (strlen($LogoF) > 0) {
      $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="100" width="100%">';
    }


    if (strlen($firma) > 0) {
      $firmaImg = '<img src="' . $Base . '/FirmasReg/' . $firma . '" height="150" width="150">';
    }
  }
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $usuario_id");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $empresaNombre      = $rowMotorizado['empresaNombre'];
    $Nombre           = $rowMotorizado['NOMBRE_USUARIO'];
    $pais               = $rowMotorizado['pais'];

    $ciudad             = $rowMotorizado['ciudad'];
    $direccion          = $rowMotorizado['direccion'];
    $telefono           = $rowMotorizado['telefono'];

    $nit                = $rowMotorizado['nit'];
  }
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_id");
if ($queryList) {
  while ($rowMotorizado = mysqli_fetch_array($queryList)) {

    $nombre_cliente             = $rowMotorizado['nombre_cliente'];
    $CODI_CLIENTE               = $rowMotorizado['CODI_CLIENTE'];
    $edad               = $rowMotorizado['edad_cliente'];
    $fechaNacimiento               = $rowMotorizado['fechaNacimiento'];
    $telefono                = $rowMotorizado['celular_cliente'];

    $email = $rowMotorizado['correo_cliente'];
  }
}







?>




<body>
  <div class="wrapper">

    <div class="row">
      <div class="col-md-12">

        <div class="box box-solid">


          <!-- /.box-header -->
          <div class="box-body">




            <?php

            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));




            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$cliente_id");
            //echo  "SELECT * FROM  cliente where cliente_id=$cliente";
            if ($queryList) {
              while ($rowMotorizado = mysqli_fetch_array($queryList)) {


                $email = $rowMotorizado['correo_cliente'];
                $whatsapp = $rowMotorizado['whatsapp'];
              }
            }





            $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha generado un reporte motivo de la consulta con el Dr. ' . $Nombre . '; para ver Historia ingresar por el siguiente link:  ' . $Base . '/imprimir_controlEC.php?iC=' . encrypt($historiaClinica) . '&iCr=' . encrypt($idHistoria);


            $accion = 0;
            Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);


            include 'PlantillaCorreo/funcionesPlantillas.php';

            $para = "$email";

            // título
            $titulo = 'Historia resultado de consulta con el Dr. ' . $Nombre . '';

            // mensaje
            $mensaje = '
                <html>
                <head>
                  <title>Historia de consulta la Empresa' . $nombreF . '</title>
                    <body> 
                    
                               Hola buen dia señor(a) ' . $nombre_cliente . ', Enviamos link para ver Historia. :<br><br>

                
             <div>  Link para ver Historia: ' . $Base . 'imprimir_controlEC.php/' . encrypt($historiaClinica) . '/' . encrypt($idHistoria) . '
              
          </div>
        

 
                          <br></br>
                <p>Atentamente,<br />
                   Dr. ' . $Nombre . ' .</p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

            // Para enviar un correo HTML, debe establecerse la cabecera Content-type
            $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
            $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // Cabeceras adicionales
            $cabeceras .= 'To: sievensoft <noreply@medicalsoftplus.com>' . "\r\n";
            $cabeceras .= 'From:  Historia Medica <noreply@medicalsoftplus.com>' . "\r\n";
            $cabeceras .= 'Cc: noreply@medicalsoftplus.com' . "\r\n";
            $cabeceras .= 'Bcc: noreply@medicalsoftplus.com' . "\r\n";

            // mail($para, $titulo, $mensaje, $cabeceras); 

            $_GET['receptor'] = $para;
            $_GET['asunto'] = "Historia Epicrisis " . funcionMaster($cliente_id, 'cliente_id', 'nombre_cliente', 'cliente');
            $_GET['mensaje'] = $mensajeW;
            include 'plantillaCorreo.php';


            echo "<script language='Javascript'> window.location='epicCrisisPaciente.php'</script>";


            ?>