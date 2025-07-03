<?php
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
            $con=conectar();
            
            $conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

            $idOperacion = $_GET['idOperacion'];

            $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $numeroDoc      =$rowMotorizado['numeroDoc'];
              $idCliente      =$rowMotorizado['idCliente'];
              $idEmpresa      =$rowMotorizado['idEmpresa']; 
              $fechaOperacion =$rowMotorizado['fechaOperacion'];
              $fechaVencimiento=$rowMotorizado['fechaVencimiento'];
              $subTotal       =$rowMotorizado['subTotal'];
              $impuesto       =$rowMotorizado['impuesto'];
              $totalNeto      =$rowMotorizado['totalNeto']; 
              $totalBruto     =$rowMotorizado['totalBruto'];
              $cantidadProduc =$rowMotorizado['cantidadProduc'];
              $descuentos     =$rowMotorizado['descuentos'];
              $montoPagado    =$rowMotorizado['montoPagado'];
              $nota    =$rowMotorizado['nota'];
              $tipoPago    =$rowMotorizado['tipoPago'];
            }

           $queryList=mysqli_query($conn3,"SELECT * FROM  config where ID_Usuario = $idEmpresa");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
                $moneda=$rowMotorizado['moneda'];
                $impuestoF=$rowMotorizado['impuestoF'];

                // Nuevos campos

                $nombreF=$rowMotorizado['nombreF'];
                $telefonoF=$rowMotorizado['telefonoF'];
                $direccionF=$rowMotorizado['direccionF'];
                $emailF=$rowMotorizado['emailF'];
                $ciudadPaisF=$rowMotorizado['ciudadPaisF'];
                $licenciaF=$rowMotorizado['licenciaF'];
                $pieF=$rowMotorizado['pieF'];

                 $LogoF               =$rowMotorizado['logoF'];

              if (strlen($LogoF) > 0) 
              {
                $Logo = '<img src="'.$Base.'/logos/'.$LogoF.'" height="10%" width="10%">'; 
              }



// Nuevos campos 


            }
 

            $queryList=mysqli_query($conn3,"SELECT * FROM  usuarios where ID = $idEmpresa");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $empresaNombre      =$rowMotorizado['empresaNombre'];
              $pais               =$rowMotorizado['pais'];

              $ciudad             =$rowMotorizado['ciudad'];
              $direccion          =$rowMotorizado['direccion'];
              $telefono           =$rowMotorizado['telefono'];

              $nit                =$rowMotorizado['nit'];

            }


            $queryList=mysqli_query($conn3,"SELECT * FROM  cliente where cliente_id = $idCliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre_cliente'];
              $ciudad_cliente             =$rowMotorizado['ciudad_cliente'];

              $correo_cliente             =$rowMotorizado['correo_cliente'];
              $direccion_cliente          =$rowMotorizado['direccion_cliente'];
              $telefono_cliente           =$rowMotorizado['telefono_cliente'];
              $CODI_CLIENTE           =$rowMotorizado['CODI_CLIENTE'];

                
            }


$saldo = $totalBruto-$montoPagado;


if ($saldo == 0) 
{
$pagado = '<div align="center"><img src="'.$Base.'/pagado.png" height="10%" width="30%"></div>'; 

}
   ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title> <?php echo $empresaNombre ?>   </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body onload="window.print();">
<div class="wrapper">
  <!-- Main content -->

    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-xs-12">
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
          <br>
        
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ciudad,  <?php echo $fechaOperacion ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->




<table width="100%">
<thead>
  <tr>
    <th colspan="2">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nombre nombre apellido apellidio   </th>
  </tr>
</thead>
</table>

<br>

 <table width="100%">
<tbody>
  <tr  width="100%">
    <td  width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; direccion_cliente</td>
    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CODI_CLIENTE </td>
  </tr>
  <tr>
 <td  width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;tipoPago</td>
    <td width="50%">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;telefono_cliente</td>
  </tr>
</tbody>
</table>





        <!-- /.col 

      <div class="row invoice-info">
       
        
        <div class="col-sm-12">
         
           
                 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?php //echo $nombre_cliente ?> Nombre nombre apellido apellidio  <br>
        </div>

        <div class="col-sm-6 invoice-col">
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  direccion_cliente   <?php //echo $direccion_cliente ?><br>
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; tipoPago    <?php //echo $tipoPago ?><br>
            
             
         
        </div>


        <div class="col-sm-6 invoice-col">
           
           
            <br>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; CODI_CLIENTE <?php //echo $CODI_CLIENTE ?><br>
           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; telefono_cliente<?php //echo $telefono_cliente ?><br>
            
           
        </div>



      </div>
        -->
      <!-- /.row -->

      <!-- Table row -->
      <br>
      <br>
   
          <table class="table table-striped"  >
             
            <tbody>
<?php

                 
                    $resultado=mysql_query("SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

                  echo '     <tr>
                  <td width="5%"> <div align="left">
       
     ##'.$fila[4].' </div>  </td>
                  <td width="50%">DESCIPCION'.$fila[5].' </td>
                  <td width="20%"><div align="center">100'.$fila[6].'  $</div></td>
                  <td width="20%"><div align="left">100'.$fila[9].'  $</div></td>
                 
                </tr>';
 

              $totalCant += $fila[4];
              $totalBase +=  $fila[6];
              $total += $fila[9];

 }

 ?>


            </tbody>
          </table>
         
      <!-- /.row -->


<style type="text/css">
  html {
  min-height: 100%;
  position: relative;
}
body {
  margin: 10;
  margin-bottom: 40px;
}
footer {
 
  position: absolute;
  bottom: 30;
  width: 100%;
  height: 40px;
  
}
</style>



      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirFactura.php?idOperacion='<?php echo $idOperacion?>'" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
 <!--
          <button type="button" class="btn btn-success pull-right"><i class="fa fa-credit-card"></i> Submit Payment
          </button>
          <button type="button" class="btn btn-primary pull-right" style="margin-right: 5px;">
            <i class="fa fa-download"></i> Generate PDF
          </button>
-->

        </div>
      </div>
    </section>
    <!-- /.content -->
     
  </div> 

<footer>
      
        <!-- accepted payments column -->
        <div class="col-xs-6">
         
    
 
         nota nota nota nota nota nota nota nota nota nota nota nota nota <?php echo $nota;?>
          
        </div>
        <!-- /.col -->
        <div class="col-xs-2" align="center">
        </div>
        <div class="col-xs-4" align="center">
          
 

              <?php 
if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $total*$impuestoF2;
$total =  $total1+$total;

 
}?>
      
       
  <table >
 
  <tr>
    <th >1000</th>
  </tr>
 
 
  <tr>
    <td > iva  </td>
  </tr>
  <tr>
    <td >  total </td>
  </tr>
 </table>
       
             
        </div>
        <!-- /.col -->
       
  </footer>     






