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

              $Firma = $rowMotorizado['Firma'];
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
              $telefono_cliente           =$rowMotorizado['whatsapp'];

                
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
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseVeterinaria_memoria/bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://medicalsoftplus.com/baseVeterinaria_memoria/dist/css/AdminLTE.min.css">

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
          <h2 class="page-header">
          <?php echo $Logo ?>   <?php echo $nombreF ?>
            <small class="pull-right">Fecha: <?php echo date("d-m-y") ?></small>
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
         Empresa
          <address>
 

            <strong> <?php echo $nombreF ?></strong><br>
            <strong> <?php echo $licenciaF ?></strong><br>
            <?php echo $nit ?><br>
            <?php echo $direccionF ?> - <?php echo $ciudadPaisF?><br>
            Teléfono: <?php echo $telefonoF ?><br>
            Email: <?php echo $emailF ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
           Cliente
          <address>

 


            <strong><?php echo $nombre_cliente ?> </strong><br>
             <?php echo $direccion_cliente ?><br>
            <?php echo $ciudad_cliente ?><br>
            Telefono: <?php echo $telefono_cliente ?><br>
            Email: <?php echo $correo_cliente ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Presupuesto  # 0000<?php echo $idOperacion ?></b><br>
          <br>
        
          <b>Fecha Presupuesto:</b><?php echo $fechaOperacion ?><br>
          <b>Fecha Vencimiento:</b> <?php echo $fechaVencimiento ?><br>

          <?php echo $pagado ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Descripcion</th>
              <th><div align="Right">Cantidad</div></th>
              <th><div align="Right">Precio</div></th>
              <th><div align="Right">Subtotal </div></th>
            </tr>
            </thead>
            <tbody>
<?php

                 
                    $resultado=mysql_query("SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

                  echo '     <tr>
                  <td  width="5%">'.$Numero.' </td>
                  <td width="50%">'.$fila[5].' </td>
                  <td width="5%"><div align="Right">'.$fila[4].'</div></td>
                  <td width="20%"><div align="Right">'.$fila[6].''.$moneda.'</div></td>
                  <td width="20%"><div align="Right">'.$fila[9].''.$moneda.'</div></td>
                 
                </tr>';

              $totalCant += $fila[4];
              $totalBase +=  $fila[6];
              $total += $fila[9];

 }

 ?>


            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-6">
          <p class="lead">Comentarios:</p>
         

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          <?php echo $nota;?>
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-6">
          

          <div class="table-responsive">
            <table class="table">
             

              <?php 
if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $total*$impuestoF2;
$total =  $total1+$total;


?>

              <tr>
                <th style="width:50%">Impuesto:</th>
                <td> <?php echo $total1.''.$moneda?> </td>
              </tr>

<?php 
}?>
 
              

              <tr>
                <th>Total Presupuestodo:</th>
                <td><?php echo $totalBruto.''.$moneda?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
      <div class='col-md-12'>
        <?php
          if (strlen($Firma) > 1) {

            echo "<div class='col-6' align='center'>
                    <img src='$Firma' height='100' width='200'>
                    <br>_______________________________
                    <br><u><b>*Paciente*</b></u>
                    <br><u><b>*Documento Firmado Digitalmente*</b></u>
                </div>";
        }
        ?>
      </div>
      <div class="col-xs-12" align="center">
      <?php echo $pieF?>
      </div>
      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirPresupuesto.php?idOperacion='<?php echo $idOperacion?>'" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
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
    <div class="clearfix"></div>
  </div>
  
<script src="plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Select2 -->
<script src="plugins/select2/select2.full.min.js"></script>
<!-- InputMask -->
<script src="plugins/input-mask/jquery.inputmask.js"></script>
<script src="plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
<script src="plugins/input-mask/jquery.inputmask.extensions.js"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap datepicker -->
<script src="plugins/datepicker/bootstrap-datepicker.js"></script>
<!-- bootstrap color picker -->
<script src="plugins/colorpicker/bootstrap-colorpicker.min.js"></script>
<!-- bootstrap time picker -->
<script src="plugins/timepicker/bootstrap-timepicker.min.js"></script>
 
<!-- iCheck 1.0.1 -->
<script src="plugins/iCheck/icheck.min.js"></script>
 
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="plugins/morris/morris.min.js"></script>
 
<script src="https://cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
   </body>
   </html>      
  






