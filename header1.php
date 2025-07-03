<script type="text/javascript">
  document.addEventListener("DOMContentLoaded", function() {
    // Invocamos cada 5 segundos ;)
    const milisegundos = 5 * 1000;
    setInterval(function() {
      // No esperamos la respuesta de la petición porque no nos importa
      fetch("refrescar.php").then((response) => {
          return response.text();
        })
        .then((myContent) => {
          //alert(myContent);
          console.log(myContent);
        });

    }, milisegundos);
  });
</script>



<?php
ini_set('session.cookie_lifetime', 0);
session_start();

/*
// Definir máximo tiempo de poder estar inactivo (en horas)
define( 'MAX_SESSION_TIME', 3600 * 6 ); // 12 hora   

if ( isset( $_SESSION[ 'last_activity' ] ) && 
     ( time() - $_SESSION[ 'last_activity' ] ) > MAX_SESSION_TIME ) {

    session_unset();

    if ( ini_get( 'session.use_cookies' ) ) {

        $params = session_get_cookie_params();
        setcookie( session_name(), '',
                   time() - MAX_SESSION_TIME,
                   $params[ 'path' ],
                   $params[ 'domain' ],
                   $params[ 'secure' ],
                   $params[ 'httponly' ] );
    }

    @session_destroy();     

    // Redireccionar
    echo "<script>alert('Sesión caducada Debe iniciar sesión nuevamente (el nuevo cierre de sesion)'); window.location='index.php'</script>";
    //header( 'Location: /index' );
}

$_SESSION[ 'last_activity' ] = time();
*/


// server should keep session data for AT LEAST 1 hour
//ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
//session_set_cookie_params(10800);
// ready to go!


/*
$hora = time();
if (!isset($_SESSION['inicio']) && !isset($_SESSION['expira'])) {
  $_SESSION['inicio'] = $hora;
  $_SESSION['expira'] = $hora + (180*10800);
}
$hace = $hora - $_SESSION['inicio'];
//echo "<p>Inició sesión hace ". floor($hace / 60) .  " minutos y " . ($hace % 60) . " segundos</p>";
if ($hora > $_SESSION['expira']) {
  $hace = $hora - $_SESSION['expira'];
  // echo "<p>Su sesión finalizó hace ". floor($hace / 60) .     " minutos y " . ($hace % 60) . " segundos</p>";
} else {
  $hace = $_SESSION['expira'] - $hora;
  // echo "<p>Su sesión finaliza en ". floor($hace / 60) .    " minutos y " . ($hace % 60) . " segundos</p>";
}

*/
$enlace_actual = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

include 'funciones/seguridad.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';

$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
$ID = $_SESSION['ID'];
$ususario_id = $_SESSION['ID'];
$tipo = $_SESSION['tipo'];

// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql


auditorMaster($ususario_id, '2', $enlace_actual, '-');


?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $sistema ?> </title>
  <!-- Tell the browser to be responsive to screen width -->

  <!-- para el tema de los acentos con mysql -->

  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />

  <!-- para el tema de los acentos con mysql -->


  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="plugins/FontAwesomeK Free 6.0/css/all.css">
  <script src="js/kit.fontawesome.js" crossorigin="anonymous"></script>
  <!--<link rel="stylesheet" href="css/font-awesome.css">
  -->

  <!-- con esto pruebo que iconos hacen falta-->
  <!--<script src="plugins/FontAwesomeK Free 6.0/js/all.js"></script>-->


  <!-- Iconify-->
  <script src="js/iconify.min.js"></script>

  <script src="plugins/SweetAlert2K/Sweetalert2.11.1.5.js"></script>
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE2.min.css">
  <!-- daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap datepicker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="plugins/iCheck/all.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="plugins/colorpicker/bootstrap-colorpicker.min.css">
  <!-- Bootstrap time Picker -->
  <link rel="stylesheet" href="plugins/timepicker/bootstrap-timepicker.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="plugins/select2/select2.min.css">
  <!-- Theme style -->

  <link rel="stylesheet" href="plugins/morris/morris.css">

  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <!-- Theme style -->

  <!--End of Zendesk Chat Script-->


  <!-- better icons -->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <!-- 
  <script type="text/javascript">
    window.$zopim || (function(d, s) {
      var z = $zopim = function(c) {
          z._.push(c)
        },
        $ = z.s =
        d.createElement(s),
        e = d.getElementsByTagName(s)[0];
      z.set = function(o) {
        z.set.
        _.push(o)
      };
      z._ = [];
      z.set._ = [];
      $.async = !0;
      $.setAttribute("charset", "utf-8");
      $.src = "https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";
      z.t = +new Date;
      $.
      type = "text/javascript";
      e.parentNode.insertBefore($, e)
    })(document, "script");
  </script>
  -->

</head>



          </ul>
        </div>

      </nav>
    </header>