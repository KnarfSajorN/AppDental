<?php
session_start(); 
 

include 'funciones/conn3.php';




 
$queryList=mysqli_query($conn3,"SELECT count(id) as existe  FROM usuariosSegundarios WHERE  email = '$username' AND clave='$password'");
$nrowl=mysqli_num_rows($queryList);
while($row_recordset32=mysqli_fetch_array($queryList))

{

  $existe      = $row_recordset32['existe'];

}



if ($existe == 1) 
{
 
$sql = "SELECT * FROM usuariosSegundarios WHERE  email = '$username' AND clave='$password'";
 
$result = mysqli_query($conn3,$sql);
$row=mysqli_fetch_array($result);
 
$Activo =  $row['ACTIVO'];

 echo $row['ACTIVO'];
   $fechaDemo = $row['fechaDemo'];
 echo $Activo;
if ($Activo == 0) 
{
    if ($password == $row['clave'])  
 { 
    $_SESSION['loggedin'] = true;
    $_SESSION['username'] = $username;
    $_SESSION['nombre'] = $row['nombre'];
    $_SESSION['ID'] = $row['idUsuario'];
    $_SESSION['id'] = $row['id'];
    $_SESSION['rol'] = $row['rol'];
    $_SESSION['TIPO'] = $row['tipo'];
    $BNombre = $_SESSION['nombre'];


    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (5 * 60000);
 //   echo "Bienvenido! " . $_SESSION['username'];

if ($row['tipo'] == 1) 
  {

  include("auditor.php");

  $idUsuario = $_SESSION['idUsuario'];

  
  echo "<script>alert('Bienvenido, $BNombre'); window.location='portada'</script>";
   
  }
 
    //echo "<br><br><a href=panel-control.php>Panel de Control</a>"; 
  } 



}


elseif ($Activo == 1) {
 echo "<script>alert('Cuenta Inactiva escriba a soporte@sievensoftcolombia.com'); window.location='acceso'</script>";


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
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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

           <h3>  Usuario o Clave Incorrecto
           <br><a href='acceso'>Intentar de nuevo
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
