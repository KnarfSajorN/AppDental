<script>
  localStorage.setItem('nav', '-');
</script>

<?php
// server should keep session data for AT LEAST 1 hour
//ini_set('session.gc_maxlifetime', 10800);

// each client should remember their session id for EXACTLY 1 hour
//session_set_cookie_params(10800);


function reem_alreves($texto1) 
{

//Rememplazamos caracteres especiales latinos minusculas
$repl = array('á', 'é', 'í', 'ó', 'ú', 'ñ', '\"', '€', 'ü');
$find = array('&aacute;', '&eacute;', '&iacute;', '&oacute;', '&uacute;', '&ntilde;', '&quot;', '&euro;', '&uuml;');
$texto1 = str_replace ($find, $repl, $texto1);


//Rememplazamos caracteres especiales latinos mayusculas
$repl = array('Á', 'É', 'Í', 'Ó', 'Ú', 'Ñ', 'Ü', 'ç', 'Ç');
$find = array('&Aacute;', '&Eacute;', '&Iacute;', '&Oacute;', '&Uacute;', '&Ntilde;', '&Uuml;', '&ccedil;', '&Ccedil;');
$texto1 = str_replace ($find, $repl, $texto1);

return $texto1;

}

ini_set('session.cookie_lifetime', 0);

session_start(); // ready to go!

// Extraeremos el codigo del sistema
$ruta_experimiental = explode("**", str_replace("/", '', preg_replace("/\b[\/]\b/", "*/*", $_SERVER['PHP_SELF'])))[0];

include 'funciones/conn3.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

/////////////////////////////////////////////////////////////////////////////////////////////
function verificarToken($token, $claveSecreta)
{
    // La API en donde verificamos el token
    $url = "https://www.google.com/recaptcha/api/siteverify";
    // Los datos que enviamos a Google
    $datos = [
        "secret" => $claveSecreta,
        "response" => $token,
    ];
    // Crear opciones de la petición HTTP
    $opciones = array(
        "http" => array(
            "header" => "Content-type: application/x-www-form-urlencoded\r\n",
            "method" => "POST",
            "content" => http_build_query($datos), # Agregar el contenido definido antes
        ),
    );
    // Preparar petición
    $contexto = stream_context_create($opciones);
    // Hacerla
    $resultado = file_get_contents($url, false, $contexto);
    // Si hay problemas con la petición (por ejemplo, que no hay internet o algo así)
    // entonces se regresa false. Este NO es un problema con el captcha, sino con la conexión
    // al servidor de Google
    if ($resultado === false) {
        # Error haciendo petición
        return false;
    }
    $resultado1 = json_decode($resultado,true);
    return $resultado1;
}


//Esta es la clave que nos da google
define("CLAVE_SECRETA", "6LfqFQooAAAAALb4Fk4YES0z69qEqjZm-x-t3PZB");
# Comprobamos si enviaron el dato
if (!isset($_POST["g-recaptcha-response"]) || empty($_POST["g-recaptcha-response"])) {
  echo '<script>alert("Debes Completar el Captcha");</script>';
  echo '<script>window.history.go(-1);</script>';
  exit();
}

# Antes de comprobar usuario y contraseña, vemos si resolvieron el captcha
$token = $_POST["g-recaptcha-response"];
$verificado = verificarToken($token, CLAVE_SECRETA);
//echo "<pre>";
//print_r($verificado);
//echo "</pre>";
# Si no ha pasado la prueba
if (!$verificado['success']) {
  echo '<script>alert("Lo Siento, Parece que Eres un Robot");</script>';
  echo '<script>window.history.go(-1);</script>';
  exit();
} 
/////////////////////////////////////////////////////////////////////////////////////////////



$queryList = mysqli_query($conn3, "SELECT count(ID) as existe  FROM usuarios WHERE  USUARIO = '$username' AND PASS='$password' and activo  = 1");
$nrowl = mysqli_num_rows($queryList);
while ($row_recordset32 = mysqli_fetch_array($queryList)) 
{

  $existe      = $row_recordset32['existe'];
}


if ($existe == 1) {

  $sql = "SELECT * FROM usuarios WHERE  USUARIO = '$username' AND PASS='$password'";
  //$result = $conexion->query($sql);
  $result = mysqli_query($conn3, $sql);
  $row = mysqli_fetch_array($result);
  //echo   $result;
  //$result2=mysqli_fetch_array($result);
  /*if ($result  > 0) {     
 }*/
  //echo 'Verifica';
  //$row = $result->fetch_array(MYSQLI_ASSOC);

  /*
 
  ////////////////////////////////////////////////////////////////? Validacion Auditor////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////? Validacion Auditor////////////////////////////////////////////////////////////////////
  $BNombreUsuario = reem_alreves($row['NOMBRE_USUARIO']);

 $queryList = mysqli_query($conexion, "SELECT * FROM  auditorIpAcceso WHERE EstadoGeneral_AuditorIp = '0' ");
 $NrowAuditor = mysqli_num_rows($queryList);
 $AuditorIp_Mensaje="";         
 if($NrowAuditor==0){
   //echo "<button class='btn btn-danger m-1 btn-lg' onclick='EstadoGeneral_BotonAuditorIp(0)'><i class='fa fa-ban'></i> Desactivar Auditor</button>";

       $Ips = 0;
       $miIP =  $_SERVER['REMOTE_ADDR'];
       $QueryAuditorIps = mysqli_query($conexion, "SELECT *  FROM auditorIpAcceso WHERE  ip = '$miIP' AND tipo = '1' ");
       $NrowIps = mysqli_num_rows($QueryAuditorIps);

       if($NrowIps>0){
         //echo "<script>alert('Bienvenido, $BNombre su ip de acceso autorizada es $miIP'); window.location='portada'</script>";
         $AuditorIp_Mensaje = "Su Ip de Acceso Autorizada es $miIP";
       }else{
         include 'funciones/funciones.php';

         $whatsapp = funcionMaster('1', 'ID_Usuario', 'whatsapp', 'config');

         $mensajeW = "El usuario *$BNombreUsuario* esta tratando de acceder al sistema con la ip $miIP de manera fallida";

         Whatsapp_sent($linkkey, $whatsapp, $mensajeW);

         echo "<script>alert('tu $miIP no esta autorizada debes de registrar tu ip en el portal MiSoportes o contactar a soporte'); window.location='https://ofertasmedicalsoft.com/revista/'</script>";
       }


 }
 
 ////////////////////////////////////////////////////////////////? [FIN] Validacion Auditor////////////////////////////////////////////////////////////////////
 ////////////////////////////////////////////////////////////////? [FIN] Validacion Auditor////////////////////////////////////////////////////////////////////
*/





  $PuntoPOS = $_POST['PuntoPOS'];
  $Activo =  $row['ACTIVO'];


  $NombreUsuario = reem_alreves($row['NOMBRE_USUARIO']);
  // echo $row['ACTIVO'];
  $fechaDemo = $row['fechaDemo'];
  // echo $Activo;
  if ($Activo == 1 || $Activo == 2) {
    
    if ($password == $row['PASS']) {
      $_SESSION['ACTIVO'] = $Activo;
      $_SESSION['loggedin'] = true;
      $_SESSION['username'] = $username;
      $_SESSION['NOMBRE_USUARIO'] = $NombreUsuario;
      $_SESSION['ID'] = $row['ID'];
      $_SESSION['TIPO'] = $row['TIPO'];
      $_SESSION['rol'] = $row['rol'];
      $_SESSION['telefono'] = $row['telefono'];
      $_SESSION['SalaNumero'] = 0;
      $_SESSION['idCitas'] = 0;
      $_SESSION['tema'] = $row['tema'];
      // Siempre y cuando sea valido el inicio de sesion, 
      // crearemos una variable sesion con el 
      // CODIGO del sistema que hemos iniciado sesion
      $_SESSION['sistema'] = $ruta_experimiental;
      $_SESSION['POS'] = $PuntoPOS;

      $_SESSION['tipoLic'] = $row['tipoLic'];



      $_SESSION['vista'] = $row['vista'];
      $_SESSION['sucursal'] = $row['sucursal'];
      $BNombre = $_SESSION['NOMBRE_USUARIO'];

      $_SESSION['start'] = time();
      $_SESSION['expire'] = $_SESSION['start'] + 10800;

      $idUsuario = $_SESSION['ID'];


      /// ============== EN EL CASO DE QUE SE HAYA DEJADO UN PROCEDIMIENTO PENDIENTE SE VA A SETEAR UNA VARIABLE DE SESION CON ESTE PACIENTE ==========================================
      $queryAtencionesPendientes = mysqli_query($conn3, "SELECT * FROM paciente_atencion WHERE usuarioId = '$idUsuario' AND activo = 1 LIMIT 1");
      foreach ($queryAtencionesPendientes as $tablaAtencionesPendientes) {
        $clientePendiente = $tablaAtencionesPendientes['clienteId'];
      }

      $atencionesPendientes = mysqli_num_rows($queryAtencionesPendientes);
      if($atencionesPendientes <> 0){
        $_SESSION['cI'] = $clientePendiente;
      }
      /// ============== EN EL CASO DE QUE SE HAYA DEJADO UN PROCEDIMIENTO PENDIENTE SE VA A SETEAR UNA VARIABLE DE SESION CON ESTE PACIENTE [FIN] ==========================================

      //   echo "Bienvenido! " . $_SESSION['username'];

      if ($row['TIPO'] >= 0) {

        include("auditor.php");

        $querycc = mysqli_query($conn3, "SELECT * FROM c_catalogo WHERE  idUsuario = '$idUsuario'");
        $nrowl = mysqli_num_rows($querycc);
        while ($row_recordsetcc = mysqli_fetch_array($querycc)) {

          $id      = $row_recordsetcc['id'];
          $nombrecc      = $row_recordsetcc['nombre'];
          $direccionWebcc      = $row_recordsetcc['direccionWeb'];
        }

        if (strlen($nombrecc) < 1 and strlen($direccionWebcc) < 1) {
          //echo "<script>alert('Bienvenido $BNombre, a Medicalsoft Estética.'); window.location='portada'</script>";
          echo "<script>alert('Bienvenido,$BNombre $AuditorIp_Mensaje'); window.location='portada'</script>";
        } else {
          echo "<script>alert('Bienvenido,$BNombre $AuditorIp_Mensaje'); window.location='portada'</script>";
        }
      }
    }
  } else if ($Activo == 0) {
    echo "<script>alert('Cuenta Inactiva para continuar con el servicio proceda con el pago, si cree que es un error por favor escriba a soporte@sievensoftcolombia.com'); window.location='activarregistrod.php?email=$username'</script>";
  }
} elseif ($existe == 0) {
  echo "";
  //echo "<br><a href='index.php'>Volver a Intentarlo</a>";
}


mysqli_close($conn3);




?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Verificar Usuario</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <style>
    .centrar {
      position: absolute;
      /*nos posicionamos en el centro del navegador*/
      top: 40%;
      left: 50%;
      /*determinamos una anchura*/
      width: 400px;
      /*indicamos que el margen izquierdo, es la mitad de la anchura*/
      margin-left: -200px;
      /*determinamos una altura*/
      height: 300px;
      /*indicamos que el margen superior, es la mitad de la altura*/
      margin-top: -150px;
    }
  </style>


  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min. js"></script>
  <![endif]-->
</head>

<body style="background-color:#E6E6FA">




  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->

    <div class='centrar'>



      <div class="box box-info" align="center">
        <div class="box-header with-border">
          <img src="img/logo.png" style="width:auto; height:5rem;">
          <br>
          <h3 class="box-title"> Verificando! </h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->


        <br><br>

        <h3> Usuario o Clave Incorrecto
          <br><a href='index.php'>Intentar de nuevo
          </a>
        </h3>
      </div>

      <div align="center">

        <br>
        Desarrollado por <strong> <a href="https://sevenglobalcompany.com/" target="_blank">Seven Global Company</a> </strong>
      </div>

    </div>





    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>

  </div>
  <!-- ./wrapper -->

  <!-- jQuery 2.2.3 -->
  <script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
  <!-- Bootstrap 3.3.6 -->
  <script src="bootstrap/js/bootstrap.min.js"></script>
  <!-- FastClick -->
  <script src="plugins/fastclick/fastclick.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/app.min.js"></script>
  <!-- Sparkline -->
  <script src="plugins/sparkline/jquery.sparkline.min.js"></script>
  <!-- jvectormap -->
  <script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
  <script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
  <!-- SlimScroll 1.3.0 -->
  <script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
  <!-- ChartJS 1.0.1 -->
  <script src="plugins/chartjs/Chart.min.js"></script>
  <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
  <script src="dist/js/pages/dashboard2.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="dist/js/demo.js"></script>
</body>

</html>