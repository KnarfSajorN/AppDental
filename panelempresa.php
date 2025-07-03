

<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);
// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);
session_start(); // ready to go!


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
$enlace_actual = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];

include 'funciones/seguridad.php';
include 'funciones/funciones.php';
include 'funciones/funcionesUtilidades.php';
include 'config.php';

$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));
$ID = $_SESSION['id'];
$ususario_id = $_SESSION['ID'];
$tipo = $_SESSION['tipo'];

// para el tema de los acentos con mysql
header("Content-Type: text/html;charset=utf-8");
// para el tema de los acentos con mysql
 

auditorMaster($ususario_id, '2', $enlace_actual, '-');




                            $queryList=mysqli_query($conn3,"SELECT * FROM v_clienteE where id=$ID ");
                        
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $nombre_empresa     = $row_recordset32['nombre'];
                                   

                            }

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>  <?php echo $sistema?>  </title>
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
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
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
   
 <!-- <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">   -->
<link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

   <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load.
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">  -->

 <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
 
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.min.css">
  <link rel="stylesheet" href="plugins/fullcalendar/fullcalendar.print.css" media="print">
  <!-- Theme style -->

<!--End of Zendesk Chat Script-->
 

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
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
<body  class="hold-transition skin-blue sidebar-mini" >
 
<div class="wrapper">
  <header class="main-header">

    <!-- Logo -->
    <!--<a href="" class="logo">
       <span class="logo-mini">  <img src="img/logoSolo.png" width="90%" height="90%"></span>
   
     
    <span class="logo-lg">  <img src="logos/logoSolo.png" width="90%" height="90%"> </span>

      
    </a>-->

  

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    
      <div class="navbar-custom-menu">
        
        <ul class="nav navbar-nav">
<li >
             <font color="#3c8dbc"> <h4 align="center"> <b>Bienvenido <?php echo $nombre_empresa?> </b>  </h4></font> 
 </li>

          <li  title="Salir">
            <a href="funciones/salirEmpresa.php">
              <i class="fa fa-close"> Cerrar Sesión</i>
            </a>
          </li>
          
       
          
        </ul>
      </div>

    </nav>
  </header>









<?php 
//include 'header.php';
$ID = $_SESSION['id'];
?>
<body>

  <!-- Content Wrapper. Contains page content -->
 
    <!-- Content Header (Page header) -->
  



<br>
<br>


 
<section class="content">


<div align="center">

 <div class="col-md-12">
              <div class="form-group">
                
                  <form method="GET" action="consultarPacienteEmpresas.php"> 
                
<div class="col-md-12">
<hr size="100" width="100%" color="#0000FF">
</div>

<div class="col-md-9" align="left">
               <b> Seleccione el nombre del paciente que desea consultar </b>
                <select id="clienteId" name="clienteId" class="form-control select2" style="width: 100%;" required="required" onChange="verHistoria();" >
                    <option value="" selected="selected">Seleccione un Paciente</option>
                    <?php
 
                            $queryList=mysqli_query($conn3,"SELECT * FROM cliente where empleador=$ID  order by nombre_cliente");
                            $nrowl=mysqli_num_rows($queryList);
                            while($row_recordset32=mysqli_fetch_array($queryList))
                            {

                                    $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                    $cliente_id      = $row_recordset32['cliente_id'];
                                    $CODI_CLIENTE      = $row_recordset32['CODI_CLIENTE'];
                                    echo "<option value='$cliente_id'> $CODI_CLIENTE - $nombre_cliente</option>";

                            }

                    ?>
 
                </select>

            
</div>
<div class="col-md-3">
<br>
                <button class="btn btn-block btn-primary btn-sm">    <i class="fa fa-glyphicon glyphicon-plus"></i>  Consultar  </button>
</div>

 



</section>


                </form>
 
   
   <hr>

             


</section>
 

 </div> 
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  
<?php include 'footerregistro.php';?>
   

 
 

