<?php

$user_agent = $_SERVER['HTTP_USER_AGENT'];

 

function getBrowser($user_agent){

 

if(strpos($user_agent, 'MSIE') !== FALSE)

   return 'Internet explorer';

 elseif(strpos($user_agent, 'Edge') !== FALSE) //Microsoft Edge

   return 'Microsoft Edge';

 elseif(strpos($user_agent, 'Trident') !== FALSE) //IE 11

    return 'Internet explorer';

 elseif(strpos($user_agent, 'Opera Mini') !== FALSE)

   return "Opera Mini";

 elseif(strpos($user_agent, 'Opera') || strpos($user_agent, 'OPR') !== FALSE)

   return "Opera";

 elseif(strpos($user_agent, 'Firefox') !== FALSE)

   return 'Mozilla Firefox';

 elseif(strpos($user_agent, 'Chrome') !== FALSE)

   return 'Google Chrome';

 elseif(strpos($user_agent, 'Safari') !== FALSE)

   return "Safari";

 else

   return 'No hemos podido detectar su navegador';

 

 

}

 

 

$navegador = getBrowser($user_agent);

if ($navegador <> "Google Chrome") {

echo "<div align='center'>"; 

echo "El navegador con el que estas visitando esta web es: ".$navegador;

echo "<br>";

echo "Para un correcto Funcionamiento te recomedamos Utilizar Google Chrome ";

echo "  <a href='https://www.google.es/chrome/browser/desktop/'>Descargar Aqui</a>";

echo "</div>"; 

}



?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>TripleD Sys</title>
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
    top:30%;
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
              <img src="img/logo.png" height="60%" width="40%">
              <br>
              <h3 class="box-title">  </h3>
            </div> 
            <!-- /.box-header -->
            <!-- form start -->
            <form class="form-horizontal" action="verificarUsuario.php" method="POST">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3"  class="col-sm-2 control-label">Email</label>

                  <div class="col-sm-12">
                    <input type="email" name="username"  class="form-control" id="inputEmail3" placeholder="Email">
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputPassword3"  class="col-sm-2 control-label">Password</label>

                  <div class="col-sm-12">
                    <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
                  </div>
                </div>
                 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm"><h4>  Sign in </h4></button>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

          <div align="center">
          <h4 class="box-title"> <a href="recover.php">  Forgot Password </a>   </h4>  
 
          <h4 class="box-title"> <a href="signup.php">  Need An Customer Account ? </a>   </h4> 
           <br>  
          Desarrollado por <strong> <a href="sievensoft.com">SievenSoft</a> </strong> Version 1.0   
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
