<?php
date_default_timezone_set('America/Bogota');
include("funciones/conn3.php");
include("funciones/funciones.php");
?>


<?php

$historiaClinica1 = $_GET['cliente'];
$idr = $_GET['idr'];
$idOperacion = $_GET['idOperacion'];





$queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idOperacion = $idOperacion");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $idOperacion      = $rowMotorizado['idOperacion'];
  $numeroDoc      = $rowMotorizado['numeroDoc'];
  $idCliente      = $rowMotorizado['idCliente'];
  $idEmpresa      = $rowMotorizado['idEmpresa'];
  $fechaOperacion      = $rowMotorizado['fechaOperacion'];
  $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];
  $subTotal      = $rowMotorizado['subTotal'];
  $impuesto      = $rowMotorizado['impuesto'];
  $totalNeto      = $rowMotorizado['totalNeto'];
  $totalBruto      = $rowMotorizado['totalBruto'];
  $cantidadProduc      = $rowMotorizado['cantidadProduc'];
  $descuentos      = $rowMotorizado['descuentos'];
  $montoPagado      = $rowMotorizado['montoPagado'];
  $nota      = $rowMotorizado['nota'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {
  $moneda = $rowMotorizado['moneda'];
  $impuestoF = $rowMotorizado['impuestoF'];

  // Nuevos campos

  $nombreF = $rowMotorizado['nombreF'];
  $telefonoF = $rowMotorizado['telefonoF'];
  $direccionF = $rowMotorizado['direccionF'];
  $emailF = $rowMotorizado['emailF'];
  $ciudadPaisF = $rowMotorizado['ciudadPaisF'];
  $licenciaF = $rowMotorizado['licenciaF'];
  $pieF = $rowMotorizado['pieF'];

  $LogoF               = $rowMotorizado['logoF'];

  if (strlen($LogoF) > 0) {
    $Logo = '<img src="' . $Base . '/logos/' . $LogoF . '" height="10%" width="10%">';
  }



  // Nuevos campos 
}



$queryList = mysqli_query($conn3, "SELECT * FROM  usuarios where ID = $idEmpresa");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $empresaNombre      = $rowMotorizado['empresaNombre'];
  $pais               = $rowMotorizado['pais'];

  $ciudad             = $rowMotorizado['ciudad'];
  $direccion          = $rowMotorizado['direccion'];
  $telefono           = $rowMotorizado['telefono'];

  $nit                = $rowMotorizado['nit'];
}


$queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $idCliente");
$nrowl = mysqli_num_rows($queryList);
while ($rowMotorizado = mysqli_fetch_array($queryList)) {

  $nombre_cliente             = $rowMotorizado['nombre_cliente'];
  $ciudad_cliente             = $rowMotorizado['ciudad_cliente'];

  $correo_cliente             = $rowMotorizado['correo_cliente'];
  $direccion_cliente          = $rowMotorizado['direccion_cliente'];
  $telefono_cliente           = $rowMotorizado['telefono_cliente'];
  $whatsapp           = $rowMotorizado['whatsapp'];
}


$saldo = $totalBruto - $montoPagado;


if ($saldo == 0) {
  $pagado = '<div align="center"><img src="https://' . $Base . '/pagado.png" height="10%" width="30%"></div>';
}

?>




<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Presupuesto
      <small># 0000<?php echo $numeroDoc ?></small>
    </h1>

  </section>


  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <?php echo $Logo ?> <?php echo $nombreF ?>
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
          <?php echo $direccionF ?> - <?php echo $ciudadPaisF ?><br>
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
        <b>Presupuesto # 0000<?php echo $numeroDoc ?></b><br>
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
              <th>Descripción</th>
              <th>
                <div align="Right">Cantidad</div>
              </th>
              <th>
                <div align="Right">Precio</div>
              </th>
              <th>
                <div align="Right">Subtotal </div>
              </th>
            </tr>
          </thead>
          <tbody>



            <?php
            /*
            $conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));




            $queryList = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id=$historiaClinica1");
            //echo  "SELECT * FROM  cliente where cliente_id=$historiaClinica1";
            $nrowl = mysqli_num_rows($queryList);
            while ($rowMotorizado = mysqli_fetch_array($queryList)) {


              $email = $rowMotorizado['correo_cliente'];
              $whatsapp = $rowMotorizado['whatsapp'];
            }
            */
            echo '........' . $whatsapp;

            $mensajeW = 'Sr(a) *' . $nombre_cliente . '* Se le ha generado un presupuesto de la empresa  *' . $nombreF . '*; para ver presupuesto ingresar por el siguiente link:  '.$Base.'imprimirPresupuesto.php?idOperacion=' . $idOperacion . ' ';
            $accion = 0;
            Whatsapp_sent_cliente($linkkey, $whatsapp, $mensajeW, $cliente_id, $usuario_id, $whatsapp, $accion);




            $para = "$email";

            // título
            $titulo = 'Presupuesto de la Empresa   ' . $nombreF . '';

            // mensaje
            $mensaje = '
                <html>
                <head>
                  <title>Presupuesto de la Empresa' . $nombreF . '</title>
                    <body> 
                    
                               Hola buen dia señor(a) ' . $nombre_cliente . ', Enviamos presupuesto solicitado. :<br><br>

     <div class="row">
        <div class="col-xs-12">
          <h2 class="page-header">
        ' . $Logo . ' ' . $nombreF . '<br></h2>

         <h4> <address>
 
            <strong>' . $licenciaF . '</strong><br>
           ' . $nit . '<br>
             ' . $direccionF . ' - ' . $ciudadPaisF . '<br>
            Teléfono:  ' . $telefonoF . '<br>
            Email:' . $emailF . '
          </address> </h4>
        </div>
        <div class="col-sm-4 invoice-col">
         
            <small class="pull-right">Fecha: ' . $fechaOperacion . '</small>
          </h2>
        </div>
<div class="col-sm-4 invoice-col">
         
          <b>Fecha Presupuesto:</b>' . $fechaOperacion . '<br>
          <b>Fecha Vencimiento:</b> ' . $fechaVencimiento . '<br> 
         ' . $pagado . '

        </div>
        
        <!-- /.col -->
      </div>



      
 <h1>
        Presupuesto
        <small># 0000' . $numeroDoc . '</small>
      </h1>



      <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
            <tr>
              <th>#</th>
              <th>Descripción</th>
              <th><div align="Right">Cantidad</div></th>
              <th><div align="Right">Precio</div></th>
              <th><div align="Right">Subtotal </div></th>
            </tr>
            </thead>
            <tbody>
';
            $querydeta = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");


            $nrowl = mysqli_num_rows($querydeta);
            while ($rowDetalle = mysqli_fetch_array($querydeta)) {



              $des      = $rowDetalle['descripcion'];

              $can                 = $rowDetalle['cantidad'];


              $base               = $rowDetalle['base'];
              $sub                = $rowDetalle['subTotal'];

              //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
              $Numero++;

              $mensaje .=     '<tr>
                  <td  width="5%">' . $Numero . ' </td>
                  <td  width="45%">' . $des . '</td>
                   <td width="20%">' . $can . ' </td>
                      <td width="10%"><div align="Right">' . $base . 'Pesos </td>
                  <td width="20%"><div align="Right">' . $sub . 'Pesos </td>
                   
</tr>
              



';

              $totalCant += $can;
              $totalBase += $base;
              $total += $sub;
            }

            ?>


          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>




    <?php
    $mensaje .= '     



<div class="row">
        <!-- accepted payments column -->
        <div class="col-xs-12">
          <p class="lead">Comentarios:</p>
         

          <p class="text-muted well well-sm no-shadow" style="margin-top: 10px;">
          ' . $nota . '
          </p>
        </div>
        <!-- /.col -->
        <div class="col-xs-12">
          

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:70%">Subtotal:</th>
                <td>' . $total . 'Pesos</td>
              </tr>'; ?>

    <?php
    if ($impuestoF > 0) {
      $impuestoF2 = $impuestoF / 100;
      $total1 =  $total * $impuestoF2;
      $total =  $total1 + $total;


    ?>
      <tr>
        <th style="width:50%">Impuesto:</th>
        <td> <?php echo $total1 ?> </td>
      </tr>

    <?php
    } ?>

    <?php
    $mensaje .= '  

                <tr>
                <th style="width:70%">Total Presupuesto:</th>
                <td>' . $totalBruto . ' Pesos</td>
              </tr>
              <tr>
                <td></td>
                <td>Link para ver presupuesto: ' . $Base . 'imprimirPresupuesto?idOperacion=' . $idOperacion . '</td>
              </tr>
            </table>
          </div>
        </div>   

 
                          <br></br>
                <p>Atentamente,<br />
                  ALTE-Dentalsoft</p> 
                  
                <br/>
                 
                  
 
                <body>

                </body>
                </html>
                ';

    // Para enviar un correo HTML, debe establecerse la cabecera Content-type
    $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
    $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    // Cabeceras adicionales
    $cabeceras .= 'To: Dentalsoft <noreply@dentalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'From:  Presupuesto de la empresa' . $nombreF . '  <noreply@dentalsoftcolombia.com>' . "\r\n";
    $cabeceras .= 'Cc: noreply@dentalsoftcolombia.com' . "\r\n";
    $cabeceras .= 'Bcc: noreply@dentalsoftcolombia.com' . "\r\n";

    // Enviarlo
    mail($para, $titulo, $mensaje, $cabeceras);


    echo "<script language='Javascript'> window.location='preliminarPresupuesto.php?idOperacion=$idOperacion';</script>";

    ?>