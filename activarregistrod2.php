<?php
include 'funciones/funciones.php';

$cantidad = 1;
$DBTYPE2 = 'mysqli';
$DBHOST2 = 'localhost';
$DBUSER2 = 'medicaso_rootsis';
$DBPASSWORD2 = '5qA?o]t6d-h25qA?o]t6d-h2';
$DBNAME2 = 'medicaso_sistema';  



$email = $_GET['email'];


    $conn3 = mysqli_connect($DBHOST2,$DBUSER2,$DBPASSWORD2,$DBNAME2)or die ('Ha fallado la conexion MySQL:1 '.mysqli_error($conn3));

    $queryList1=mysqli_query($conn3,"select * from usuarios where USUARIO='$email'");
    $nrowl=mysqli_num_rows($queryList1);  
    while($arrayList1=mysqli_fetch_array($queryList1))
    {
    $ID              =$arrayList1['ID'];
    $email           =$arrayList1['USUARIO'];
    }

if ($email <> '202030') {
 

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
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/dist/css/AdminLTE.min.css">
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="background-color:#fffff">
 <h2 class="form-signin-heading">
        <center>
         <div class="box-header with-border">
              <img src="https://medicalsoftplus.com/baseDev/img/logo.png" height="10%" width="30%">
               
            </div>
        </center>
      </h2>
  <div class="box-header with-border" align="center">
  <div align="center"> <h3> Gracias por tu registro  </h3> </div>
<div align="center"> <h3> Al realizar el pago tu cuenta sera activada  <?php  echo $email?> </h3> </div>

 
<?php 

//name email password confirmPassword

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}
   $url = "http://api.wipmania.com/".$ip;
   $country = file_get_contents($url);
   echo $country;
  ?>
 
 
<div class="col-xs-4 center">

</div>
<div class="col-xs-4 center">
<?php
 $Verificar = 0;
 $Verificar = strlen($email);
 

?>


</div>
<div class="col-xs-4 center">

</div>
 </div>

 


<div class="container">
  <div class="row">


















<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="border-top-style: solid;">


  </div>

  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="border-top-style: solid;">

    <div align="center">
 
 
<?php if ($country <> 'CO'): ?>
   
 <h1>  <img src="https://www.outletbebe.es/media/catalog/product/cache/1/image/350x350/9df78eab33525d08d6e5fb8d27136e95/r/e/regalo.jpg" height="5%" width="8%"> Licencia Para toda la vida
  <img src="https://www.outletbebe.es/media/catalog/product/cache/1/image/350x350/9df78eab33525d08d6e5fb8d27136e95/r/e/regalo.jpg" height="5%" width="8%"> </h1> 
 
<h3> <strong> $ 890.00 USD</strong>   </h3> 
   
<hr style="border-color:blue;">
 


 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="4727BUXRX247J">
 
<input type="image" src="https://sievensoft.com/paypal.png" width="100%" height="20%"border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://sievensoft.com/paypal.png" width="1" height="1">
</form>

 <?php endif ?>

<?php if ($country == 'CO'): ?>
  
 
<h1>  <img src="https://www.outletbebe.es/media/catalog/product/cache/1/image/350x350/9df78eab33525d08d6e5fb8d27136e95/r/e/regalo.jpg" height="5%" width="8%">  Licencia Para toda la vida <img src="https://www.outletbebe.es/media/catalog/product/cache/1/image/350x350/9df78eab33525d08d6e5fb8d27136e95/r/e/regalo.jpg" height="5%" width="8%"> </h1>
<h5>2 usuario + 1 auxiliar</h5>
<h3> <strong> $3.026.000 COP</strong>   </h3>
 
<hr style="border-color:blue;">


 <?php

$referencia1 = $ID.';'.$email.';2;'.rand(1,50);

 ?>
 
 <form method="post" id="formulariopayu" action="https://gateway.payulatam.com/ppp-web-gateway/">
  <input name="merchantId"    type="hidden"  value="589297"   > 
  <input name="description"   type="hidden"  value="Licencia Para toda la vida <?=$referencia1 ?>"  >
  <input name="referenceCode" type="hidden"  value="<?=$referencia1?>" >
  <input name="amount"        type="hidden"  value="3026000"   >
  <input name="tax"           type="hidden"  value="0"  >
  <input name="taxReturnBase" type="hidden"  value="0" >
  <input name="currency"      type="hidden"  value="COP" >
  <input name="signature"     type="hidden"  value="<?=md5('Tqo1lFV06vrOrh505Llmn2IMSL~589297~'.$referencia1.'~3026000~COP')?>"/>
  <input name="buyerEmail"    type="hidden"  value="<?=$email?>" >
  <input name="buyerFullName" type="hidden"  value="<?=$_SESSION['nombreusuario']?>" />
  <input name="responseUrl"    type="hidden"  value="https://medicalsoftcolombia.com/baseDev/recibirpago.php" >

  <input type="image" src="https://sievensoft.com/payulatam.png" height="15%" width="80%" border="0" name="submit"  >
<img alt="" border="0" src="https://sievensoft.com/payulatam.png" width="1" height="1">

  
</form>

 <br>
 

 <?php endif ?>
<hr style="border-color:blue;">
 
    </div>
    </div>


 

  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="border-top-style: solid;">

  
    </div>









</div>


    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center"> </div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
<br>
<br>


  

 
 </div>



<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center"> </div> 
<br>
<br>
<div class="col-xs-12" align="center"> <h4> <br><br><br> Soporte: soporte@sievensoft.com  </h4>  <p class="text-muted">MedicalSoft</p>
        <p class="text-muted"> <strong>SievenSoft</strong></p></div> 
 





  <footer class="footer">

    
  </footer>
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
 
<?php
}
elseif ($email == '202030') {
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
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseDev/dist/css/AdminLTE.min.css">
<!--Start of Zendesk Chat Script-->
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
<!--End of Zendesk Chat Script-->

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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body style="background-color:#fffff">
 <h2 class="form-signin-heading">
        <center>
         <div class="box-header with-border">
              <img src="https://medicalsoftplus.com/baseDev/img/logo.png" height="10%" width="30%">
               
            </div>
        </center>
      </h2>
  <div class="box-header with-border" align="center">
  <div align="center"> <h3> Gracias por tu registro  </h3> </div>
<div align="center"> <h3> Al realizar el pago tu cuenta sera activada  <?php  echo $email?> </h3> </div>

 
<?php 

//name email password confirmPassword

if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
   $ip = $_SERVER['HTTP_CLIENT_IP'];}
elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
   $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
   $ip = $_SERVER['REMOTE_ADDR'];
}
   $url = "http://api.wipmania.com/".$ip;
   $country = file_get_contents($url);
   //echo $country;
  ?>
 
 
<div class="col-xs-4 center">

</div>
<div class="col-xs-4 center">
<?php
 $Verificar = 0;
 $Verificar = strlen($email);
 

?>


</div>
<div class="col-xs-4 center">

</div>
 </div>

 


<div class="container">
  <div class="row">


















<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="border-top-style: solid;">

 
 




  </div>

  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="border-top-style: solid;">

<div align="center">

 <img src="https://sievensoft.com/img/promo.png" height="5%" width="100%">

<h1> LICENCIA TODA LA VIDA </h1>
<h3> <strong> $ 99.00 USD</strong>   </h3>
<h6> <strong>Nunca más pagas nada</strong>   </h6>

 

<?php
$referencia1 = $ID.'/'.$email.'/4/'.rand(1,50);
?>

<hr style="border-color:blue;">
 
 <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="FZTB78VX5STDS">
<input type="image" src="https://sievensoft.com/paypal.png" width="100%" height="20%"border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://sievensoft.com/paypal.png" width="1" height="1">
</form>



 

 

<hr style="border-color:blue;">
 
    </div>



    



    </div>




 





  <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center" style="border-top-style: solid;">

    






    </div>









</div>


    </div>
  </div>
</div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center"> </div>
<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center">
<br>
<br>


  

 
 </div>



<div class="col-xs-12 col-sm-4 col-md-4 col-lg-4 text-center"> </div> 
<br>
<br>
<div class="col-xs-12" align="center"> <h4> <br><br><br> Soporte: soporte@sievensoft.com  </h4>  <p class="text-muted">MedicalSoft</p>
        <p class="text-muted"> <strong>SievenSoft</strong></p></div> 
 





  <footer class="footer">

    
  </footer>
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
 

  <?php
}
?>