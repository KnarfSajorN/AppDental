<?php

include('funciones/funciones.php');

$ApiKey = "Tqo1lFV06vrOrh505Llmn2IMSL";

//CHILE
//$ApiKey = "mTRrnoRufPU8R6Axj92RS41YJO";


$merchant_id = $_REQUEST['merchantId'];
$referenceCode = $_REQUEST['referenceCode'];
$TX_VALUE = $_REQUEST['TX_VALUE'];
$New_value = number_format($TX_VALUE, 1, '.', '');
$currency = $_REQUEST['currency'];
$transactionState = $_REQUEST['transactionState'];
$firma_cadena = "$ApiKey~$merchant_id~$referenceCode~$New_value~$currency~$transactionState";
$firmacreada = md5($firma_cadena);
$firma = $_REQUEST['signature'];
$reference_pol = $_REQUEST['reference_pol'];
$cus = $_REQUEST['cus'];
$extra1 = $_REQUEST['description'];
$pseBank = $_REQUEST['pseBank'];
$lapPaymentMethod = $_REQUEST['lapPaymentMethod'];
$transactionId = $_REQUEST['transactionId'];
 




$porciones = explode(";", $referenceCode);
$idCuenta = $porciones[0]; // id de ceunta
$correoCuena = $porciones[1]; // correo ceunta
$tipoPlan = $porciones[2]; // tipo de plan
 

$fechaHora = date("Y-m-d h:m:s");



if ($_REQUEST['transactionState'] == 4 ) {
  $estadoTx = "Transacción aprobada";
}

else if ($_REQUEST['transactionState'] == 6 ) {
  echo "<script language='Javascript'> window.location='https://sievensoft.com/comprafallida/';</script>"; 
}

else if ($_REQUEST['transactionState'] == 104 ) {
   echo "<script language='Javascript'> window.location='https://sievensoft.com/comprafallida/';</script>"; 

}

else if ($_REQUEST['transactionState'] == 7 ) {
  $estadoTx = "Transacción pendiente";
}

else {
  $estadoTx=$_REQUEST['mensaje'];
}


mysqli_query($conn3,"INSERT INTO pagos_payu 
(estadoTx, transactionId, reference_pol, referenceCode,           idCuenta, correoCuena, tipoPlan, TX_VALUE, currency, extra1, lapPaymentMethod, fechaHora) VALUES 
('$estadoTx', '$transactionId', '$reference_pol', '$referenceCode', '$idCuenta', '$correoCuena', '$tipoPlan', '$TX_VALUE', '$currency', '$extra1', '$lapPaymentMethod', '$fechaHora');");

/*
1 Mensual
2 Trimestral
3 Semestral
4 Anual
5 Vitalicia 

*/


if ($tipoPlan == 1) {
  $PlanDes = 'Mensual';
}
elseif ($tipoPlan == 2) {
  $PlanDes = 'Trimestral';
}
elseif ($tipoPlan == 3) {
  $PlanDes = 'Semestral';
}
elseif ($tipoPlan == 4) {
  $PlanDes = 'Anual';
}
elseif ($tipoPlan == 5) {
  $PlanDes = 'Vitalicia';
}



if ($transactionState == 4) {
 $fechaLic = date("Y-m-d");

mysqli_query($conn3,"update usuarios set tipoLic = $tipoPlan, fechaVenceLic = '$fechaLic', ACTIVO = 1 where ID = $idCuenta");




        $para ="$correoCuena";
        // título
       

        // título
        $titulo = 'Su pago a sido recibido y su cuenta a sido activada ';
        // mensaje
        $mensaje = '
        <html>
        <head>
          <title>Su pago a sido recibido y su cuenta a sido activada </title>
            <table width="100%" height="466" border="0">
          <tr>
            <td><table width="100%" height="75" border="0">
              
            </table>
              <table width="100%" height="143" border="0">
                <tr>
                  <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
                    <tr>
                      <td width="5%">&nbsp;</td>
                      <td width="72%" style="color:#FFF;"><h2><strong>Su pago a sido recibido y su cuenta a sido activada con el Plan '.$PlanDes.'</strong></h2></td>
                      <td width="23%">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" height="122" border="0">
                <tr>
                  <td width="10%">&nbsp;</td>
                  <td width="80%"> 
                       <h3 align="center">Su cuenta '.$email.'  a sido activada con el plan   </h3> 
                      

                       <br></br>
        <p>Atentamente,<br />
          medicalsoft </p> 
          
        <br />
         
          

                  <td width="10%">&nbsp;</td>
                </tr>
            </table>
              <table width="100%" border="0">
                <tr>
                  <td height="21" bgcolor="#00A74B">&nbsp;</td>
                </tr>
            </table>
            <table width="100%" height="64" border="0">
                <tr>
                  <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a <a href="https://sievensoft.com/soportemedicalsoft" target="_blank"> sievensoft.com/soportemedicalsoft</a> <br/>
                 </td>
                </tr>
            </table></td>
          </tr>
        </table>
        </head>
        <body>

        </body>
        </html>
        ';
        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Cabeceras adicionales
        $cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'From: Su cuenta a sido activada por 7 días continuos <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
        $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
        // Enviarlo
 mail($email, $titulo, $mensaje, $cabeceras);
 mail('soporte@medicalsoftcolombia.com', $titulo, $mensaje, $cabeceras);
}
if ($transactionState == 7) {
 $fechaLic = date("Y-m-d");
 
//mysqli_query($conn3,"update usuarios set tipoLic = $tipoPlan, fechaVenceLic = '$fechaLic', ACTIVO = 1 where ID = $idCuenta");




        $para ="$correoCuena";
        // título
       

        // título
        $titulo = 'Su pago se encuentra pendiente';
        // mensaje
        $mensaje = '
        <html>
        <head>
          <title>Su pago se encuentra pendiente </title>
            <table width="100%" height="466" border="0">
          <tr>
            <td><table width="100%" height="75" border="0">
              
            </table>
              <table width="100%" height="143" border="0">
                <tr>
                  <td height="139" bgcolor="#00A74B"><table width="100%" height="62" border="0">
                    <tr>
                      <td width="5%">&nbsp;</td>
                      <td style="color:#FFF;"><h2><strong>Su pago se encuentra pendiente para el Plan '.$PlanDes.'</strong></h2></td>
                      <td width="23%">&nbsp;</td>
                    </tr>
                  </table></td>
                </tr>
              </table>
              <table width="100%" height="122" border="0">
                <tr>
                  <td width="10%">&nbsp;</td>
                  <td width="80%"> 
                       <h3 align="center">Su cuenta '.$email.' se encuentra pendiente por activar </h3>  <br>
                      <h2><strong>Una vez realizado el pago por favor enviar comprobante a soporte@medicalsoftcolombia.com o avisar a su asesor </strong></h2> 


                       <br></br>
        <p>Atentamente,<br />
          medicalsoft </p> 
          
        <br />
         
          

                  <td width="10%">&nbsp;</td>
                </tr>
            </table>
              <table width="100%" border="0">
                <tr>
                  <td height="21" bgcolor="#00A74B">&nbsp;</td>
                </tr>
            </table>
            <table width="100%" height="64" border="0">
                <tr>
                  <td height="60">Este correo electrónico no puede recibir respuestas. Para obtener más información, accede a <a href="https://sievensoft.com/soportemedicalsoft" target="_blank"> sievensoft.com/soportemedicalsoft</a> <br/>
                 </td>
                </tr>
            </table></td>
          </tr>
        </table>
        </head>
        <body>

        </body>
        </html>
        ';
        // Para enviar un correo HTML, debe establecerse la cabecera Content-type
        $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
        $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
        // Cabeceras adicionales
        $cabeceras .= 'To: sievensoft <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'From: Su cuenta a sido activada por 7 días continuos <noreply@medicalsoftcolombia.com>' . "\r\n";
        $cabeceras .= 'Cc: noreply@medicalsoftcolombia.com' . "\r\n";
        $cabeceras .= 'Bcc: noreply@medicalsoftcolombia.com' . "\r\n";
        // Enviarlo

 mail($email, $titulo, $mensaje, $cabeceras);

 mail('soporte@medicalsoftcolombia.com', $titulo, $mensaje, $cabeceras);

 }






if (strtoupper($firma) == strtoupper($firmacreada)) {



   
$porciones = explode(";", $referenceCode);
$idCuenta = $porciones[0]; // id de ceunta
$correoCuena = $porciones[1]; // correo ceunta
$tipoPlan = $porciones[2]; // tipo de plan
 
 

?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>MedicalSoft</title>
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

  <link rel="shortcut icon" type="image/x-icon" href="./icono.ico">



  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
<script type="text/javascript">
window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
_.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
$.src="https://v2.zopim.com/?65r3mACnIFh8hYjJwvyl5pg2FZqM7yDU";z.t=+new Date;$.
type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
</script>
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
 
 



  <div align="center" class="box-header with-border"  class="col-sm-12">
              <img src="img/logo.png" height="10%" width="20%">
              <br>
              <h3 class="box-title">  </h3>
            </div>

<br>



  <!-- Content Wrapper. Contains page content -->
  <div class="content">
    <!-- Content Header (Page header) -->
    

 
 <div class="col-sm-6"> 

<div  class="box box-info" align="center">

 


 <h2>Resumen Transacción</h2>
  <table>
  <tr>
  <td>Estado de la transaccion</td>
  <td><?php echo $estadoTx; ?></td>
  </tr>
  <tr>
  <tr>
  <td>ID de la transaccion</td>
  <td><?php echo $transactionId; ?></td>
  </tr>
  <tr>
  <td>Referencia de la venta</td>
  <td><?php echo $reference_pol; ?></td>
  </tr>




  <tr>
  <td>Valor total</td>
  <td><?php echo $TX_VALUE; ?></td>
  </tr>
  <tr>
  <td>Moneda</td>
  <td><?php echo $currency; ?></td>
  </tr>
 
  
  </table>


 
          </div>


          </div>

 <div class="col-sm-6"> 

<div  class="box box-info" align="center">

 
            <div class="box-header with-border">
              <img src="img/logo.png" height="10%" width="40%">
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
                <button type="submit" class="btn btn-block btn-primary btn-sm"><h4>  Acceder </h4></button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>

          
          </div>









          <div align="center">
          
           <br>  
          Desarrollado por <strong> <a  target="_blank" href="https://www.sievensoft.com">SievenSoft</a> </strong> 
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
<?php
}
else
{

 
                echo "<script language='Javascript'> window.location='https://sievensoft.com/comprafallida/';</script>"; 



}
?>

