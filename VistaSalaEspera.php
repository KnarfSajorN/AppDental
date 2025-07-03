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
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!
*/

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

// include 'funciones/seguridad.php';
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
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE_VC.min.css">
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

  <link rel="stylesheet" href="plugins/datatables_27082021/dataTables.bootstrap.css">

  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">

  <!--End of Zendesk Chat Script-->


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
  <!-- <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script> -->
  <!--Start of Zendesk Chat Script-->
  <!-- <script type="text/javascript">
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
  </script> -->
  <!--End of Zendesk Chat Script-->






  <!-- 
<script type="text/javascript">
    (function () {
        var options = {
            whatsapp: "+17863295472", // WhatsApp number
            call_to_action: "Soporte", // Call to action
            position: "left", // Position may be 'right' or 'left'
        };
        var proto = document.location.protocol, host = "whatshelp.io", url = proto + "//static." + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
    })();
</script>
-->







</head>

<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper" style="overflow-y: hidden;">
    <header class="main-header">

      <!-- Logo -->
      <a href="portada.php" class="logo">
        <span class="logo-mini"> <img src="img/logoSolo.png" width="100%" height="90%"></span>

        <!-- mini logo for sidebar mini 50x50 pixels 
        <span class="logo-mini"><b>D</b></span>-->
        <span class="logo-lg"> <img src="img/logoletras.png" width="100%" height="90%"> </span>
        <!-- logo for regular state and mobile devices
        <span class="logo-lg"><b>Triple</b>D</span> -->
      </a>

      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <!-- <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a> -->



        <!-- Navbar Right Menu -->
        <!-- <div class="navbar-custom-menu">

          <ul class="nav navbar-nav">





            <li class="dropdown notifications-menu">
              <a class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-calendar"></i>
                <span class="label label-warning">
                  <div id="cantEspera"></div>
                </span>
                <ul class="dropdown-menu">
              
                  <li class="user-header">
                    <strong>
                      <font color="#FFFFFF">Pacientes en Espera</font>
                    </strong>
                  </li>

           
                  <li class="user-body">
                    <div class="col-md-12">
                      <div class="col-md-6 text-center"><strong> Nombre </strong></div>
                      <div class="col-md-6 text-center"><strong> Hora llegada </strong></div>
                      <div id="cantEspera2"></div>
                    </div>


                    <a href="controlEspera" class="btn btn-default btn-flat">Ver detalle</a>

                  </li>
               
                  <li class="user-footer">
                  </li>
                </ul>
              </a>

            </li>
            <li title="Soporte">
              <a href="soporte">
                <i class="fa fa-support"></i>
              </a>
            </li>

            <li title="Perfil">
              <a href="config">
                <i class="fa fa-gears"></i>
              </a>
            </li>




            <li title="Salir">
              <a href="funciones/salir.php">
                <i class="fa fa-close"></i>
              </a>
            </li>

         
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php
                $usuarioId = $_SESSION['ID'];
                $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));
                $queryList = mysqli_query($conn3, "SELECT * FROM  config where   ID_Usuario=$usuarioId");
                $nrowl = mysqli_num_rows($queryList);
                while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                  $logoF = $rowMotorizado['logoF'];
                }

                if (strlen($logoF) > 1) {
                  echo '<img src="' . $Base . '/logos/' . $logoF . '" height="10px" width="10px" class="user-image" alt="User Image">';
                } else {
                  echo '<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">';
                }


                ?>


                <span class="hidden-xs"> <?php echo $_SESSION['username']; ?> </span>
              </a>
              <ul class="dropdown-menu">
        
                <li class="user-header">
                  <?php
                  if (strlen($logoF) > 1) {
                    echo '<img src="' . $Base . '/logos/' . $logoF . '" height="50%" width="50%" class="user-image" alt="User Image">';
                  } else {
                    echo '<img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">';
                  }

                  ///            parte de la licencia
                  //$_SESSION['ID'] .'-'. 

                  $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

                  $querylicencia = mysqli_query($conn3, "SELECT * FROM  usuarios where ID=$usuarioId");
                  $nrowl = mysqli_num_rows($querylicencia);
                  while ($rowlicencia = mysqli_fetch_array($querylicencia)) {
                    $licencial     = $rowlicencia['ID'];
                    $paisaccesol     = $rowlicencia['paisacceso'];
                    $tipoLicl        = $rowlicencia['tipoLic'];
                    $aliadol         = $rowlicencia['aliado'];
                    $fec_ingresol    = $rowlicencia['fec_ingreso'];
                  }


                  $fec_ingresol = str_replace('-', '', $fec_ingresol);


                  $linc = rand(1000000000, 9999999999) . $licencial . rand(1000000000, 9999999999);

                  // 0-Demo;1-Mensual;2-Trimestral;3Semestral;4Anual;5Especial 
                  switch ($tipoLicl) {
                    case '0':
                      $periodo = 'DEMO';
                      break;
                    case '1':
                      $periodo = 'Mensual';
                      break;
                    case '2':
                      $periodo = 'Trimestral';
                      break;
                    case '3':
                      $periodo = 'Semestre';
                      break;
                    case '4':
                      $periodo = 'Anual';
                      break;
                    case '5':
                      $periodo = 'Lic Vitalicia';
                      break;

                    default:
                      $periodo = '';
                      break;
                  }
                  ?>

                  <p>
                    <?php echo $_SESSION['NOMBRE_USUARIO']; ?>
                    <small><?php echo $_SESSION['username']; ?></small>
                  </p>

                  <a target="_blank" href="licencias/lic.php?licencia=<?php echo $linc ?>&li=<?php echo $usuarioId ?>">
                    <font size="2" color="#FFFFFF"> Licencia:
                      <?php echo $paisaccesol . $tipoLicl . $aliadol . substr($fec_ingresol, 0, 8) . $licencial ?> </font>
                  </a>
                  <strong>
                    <font color="#FFFFFF"> <? echo  $periodo; ?> </font>
                  </strong>
                </li>

     
                <li class="user-body">

                  <div class="row">

                    <div class="col-xs-6 text-center">
                 
                    </div>
                    <div class="col-xs-6 text-center">
                 
                    </div>
                  </div>


                </li>
        
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="soporte" class="btn btn-default btn-flat">Soporte</a>
                  </div>

                  <?php if ($_SESSION['TIPO'] == 0) : ?>
                    <div class="pull-left">
                      <a href="config" class="btn btn-default btn-flat">Perfil</a>
                    </div>
                  <?php endif ?>


                  <div class="pull-right">
                    <a href="funciones/salir.php" class="btn btn-default btn-flat">Cerrar Sesion</a>
                  </div>

                </li>
              </ul>
            </li>
          

          </ul>
        </div> -->

      </nav>
    </header>