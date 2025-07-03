<?php
include 'funciones/funciones.php';
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $sistema;?>  </title>
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
<link rel="shortcut icon" type="image/x-icon" href="./icono.ico">

  <style>
  .centrar
  {
    position: absolute;
    /*nos posicionamos en el centro del navegador*/
    top:20%;
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
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

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

<br>
<br>
<br>
<br>
<br>

  

<div  class="box box-info" align="center">
            <div class="box-header with-border">
              <img src="img/logo.png" height="20%" width="60%">
              <br>
              <h3 class="box-title">  </h3>
            </div>
            <!-- /.box-header -->
            <!-- form start   <form class="form-horizontal" action="activarregistro.php.php" method="POST" > -->
            <form class="form-horizontal" action="registro.php" method="POST" >
           

              <div class="box-body">
                
                
                  Nombre Completo* 
                  <input class="form-control input-lg" type="text" name="name" placeholder="Nombre Completo*"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                   

 
                Email * 

                   <input type="email" name="email"  class="form-control input-lg"  placeholder="Email *"  maxlength="80" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                Teléfono * 

                   <input type="phone" name="telefono"  min="1000000" class="form-control input-lg"  placeholder="Teléfono *"  maxlength="20" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" required>
                 

 
  <?php
  $ID =0;
  $ID = $_GET['ID'];
  if ($ID<>0) {
  ?> 
<input type="hidden" name="aliado"  class="form-control input-lg" value="<?php echo $ID?>">
  <?php
  }
  else
  {
    echo  '<input type="hidden" name="aliado"  class="form-control input-lg" value="0">';
  }
   
  ?>

  
 
                 
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" class="btn btn-block btn-primary btn-sm" id="registro_usuario_potencial" name="registro_usuario_potencial"><h4> Regístrate </h4></button>
                
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <?php echo $mensaje_registro_usuario?>
          
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
 