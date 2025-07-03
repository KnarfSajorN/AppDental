<?php
// server should keep session data for AT LEAST 1 hour
ini_set('session.gc_maxlifetime', 10800);

// each client should remember their session id for EXACTLY 1 hour
session_set_cookie_params(10800);

session_start(); // ready to go!


include 'funciones/conn3.php'; 
 
$username = $_POST['nit']; 

 
$queryList=mysqli_query($conn3,"SELECT count(ID) as existe  FROM v_clienteE WHERE  nit = '$username'  and activa  = 1");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))

{  

  $existe      = $row_recordset32['existe'];



}


if ($existe == 1) 
{
 
$sql = "SELECT * FROM v_clienteE WHERE  nit = '$username' ";
//$result = $conexion->query($sql);
$result = mysqli_query($conn3,$sql);
$row=mysqli_fetch_array($result);
//echo   $result;
//$result2=mysqli_fetch_array($result);
/*if ($result  > 0) {     
 }*/
 //echo 'Verifica';
 //$row = $result->fetch_array(MYSQLI_ASSOC);
$Activo =  $row['activa'];


  
if ($Activo == 1) 
{
    
    $_SESSION['loggedin'] = true;

    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['email_fe'] = $row['email_fe'];
    $_SESSION['direccion'] = $row['direccion'];
    $_SESSION['telefono'] = $row['telefono'];
    $_SESSION['SalaNumero'] = 0;
    $_SESSION['idCitas'] = 0;

    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + 10800;


 //   echo "Bienvenido! " . $_SESSION['username'];
  $BNombre = $_SESSION['nombre'];

    include("auditor.php");



      echo "<script>alert('Bienvenido, $BNombre '); window.location='panelempresa'</script>";
  



}


elseif ($Activo == 0) {
 echo "<script>alert('Cuenta Inactiva para continuar con el servicio comuniquese con Centro Medico Ocupacinal del Valle, si cree que es un error por favor escriba a soporte@sievensoftcolombia.com'); window.location='index.php'</script>";


}


  
}
elseif ($existe == 0) 
{ 
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
  .centrar
  {
    position: absolute;
    /*nos posicionamos en el centro del navegador*/
    top:40%;
    left:50%;
    /*determinamos una anchura*/
    width:400px;
    /*indicamos que el margen izquierdo, es la mitad de la anchura*/
    margin-left:-200px;
    /*determinamos una altura*/
    height:300px;
    /*indicamos que el margen superior, es la mitad de la altura*/
    margin-top:-150px;
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
   
<div  class='centrar'>

  

<div  class="box box-info" align="center">
            <div class="box-header with-border">
              <img src="img/logo.png" height="30%" width="60%">
              <br>
              <h3 class="box-title"> Verificando!  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           

           <br><br>

           <h3>  Nit Incorrecto
           <br><a href='index.php'>Intentar de nuevo
        </a> </h3> 
          </div>

          <div align="center">
  
           <br>  
          Desarrollado por <strong> <a href="sievensoftcolombia.com">SievenSoft</a> </strong>   
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
