   <?php 
   include 'header.php';
   include 'menu.php';

$idOperacion = $_GET['idOperacion'];
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

echo $idOperacion ;



            $queryList=mysqli_query($conn3,"SELECT * FROM  v_sOperacionInv where idOperacion = $idOperacion");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {
              $idOperacion      =$rowMotorizado['idOperacion'];
              $numeroDoc      =$rowMotorizado['numeroDoc'];
              $idCliente      =$rowMotorizado['idCliente'];
              $idEmpresa      =$rowMotorizado['idEmpresa'];
              $fechaOperacion      =$rowMotorizado['fechaOperacion'];
              $fechaVencimiento      =$rowMotorizado['fechaVencimiento'];
              $subTotal      =$rowMotorizado['subTotal'];
              $impuesto      =$rowMotorizado['impuesto'];
              $totalNeto      =$rowMotorizado['totalNeto'];
              $totalBruto      =$rowMotorizado['totalBruto'];
              $cantidadProduc      =$rowMotorizado['cantidadProduc'];
              $descuentos      =$rowMotorizado['descuentos'];
              $montoPagado      =$rowMotorizado['montoPagado'];
              $nota      =$rowMotorizado['nota'];
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
                $Logo = '<img src="https://'.$Base.'/logos/'.$LogoF.'" height="10%" width="10%">'; 
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


            $queryList=mysqli_query($conn3,"SELECT * FROM  v_clienteE where id = $idCliente");
            $nrowl=mysqli_num_rows($queryList);
            while($rowMotorizado=mysqli_fetch_array($queryList))
            {

              $nombre_cliente             =$rowMotorizado['nombre'];
              $ciudad_cliente             =$rowMotorizado['ciudad'];

              $correo_cliente             =$rowMotorizado['correo'];
              $direccion_cliente          =$rowMotorizado['direccion'];
              $telefono_cliente           =$rowMotorizado['telefono'];

              $nit           =$rowMotorizado['nit'];


                
            }


$saldo = $totalBruto-$montoPagado;


if ($saldo == 0) {
$pagado = '<div align="center"><img src="https://'.$Base.'/pagado.png" height="10%" width="30%"></div>'; 

}

   ?>

 
 


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Factura
        <small># 0000<?php echo $numeroDoc ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li class="active"> Factura</li>
      </ol>
    </section>

 
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
            <strong>NIT <?php echo $nit ?> </strong><br>
             <?php echo $direccion_cliente ?><br>
            <?php echo $ciudad_cliente ?><br>
            Telefono: <?php echo $telefono_cliente ?><br>
            Email: <?php echo $correo_cliente ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Factura  VB 1<?php echo $numeroDoc ?></b><br>
          <br>
        
          <b>Fecha Factura:</b><?php echo $fechaOperacion ?><br>
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
              <th>Codigo</th>
              <th>Descripción</th>
              <th><div align="Right">Cantidad</div></th>
              <th><div align="Right">VR/UNIT </div></th>
              <th><div align="Right">VR/TOTAL </div></th>
            </tr>
            </thead>
            <tbody>
<?php
 
                  
                    $resultado=mysql_query("SELECT * FROM  v_sDetalleOper where   id_usuario = $idEmpresa and  id_cliente = $idCliente and idOperacion = $idOperacion order by id");
                    //$resultado=mysql_query("select * from patients where ID_Doctor = '$ID_DOSTOR'");
                    $check=mysql_num_rows($q);

                    while ($fila = mysql_fetch_array($resultado, MYSQL_NUM)) {
                  //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                  $Numero++;

                  echo '     <tr>
                  <td  width="5%">'.$Numero.' </td>
                  <td width="50%">'.$fila[5].' </td>
                  <td width="5%"><div align="Right">'.$fila[4].'</div></td>
                  <td width="20%"><div align="Right">'.$fila[6].' COL $</div></td>
                  <td width="20%"><div align="Right">'.$fila[9].' COL $</div></td>
                 
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
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td> <?php echo $total?> </td>
              </tr>

              <?php 
if ($impuestoF >0) {
$impuestoF2 = $impuestoF/100; 
$total1 =  $total*$impuestoF2;
$total =  $total1+$total;


?>

              <tr>
                <th style="width:50%">Impuesto:</th>
                <td> <?php echo $total1?> </td>
              </tr>

<?php 
}?>
<!--
              <tr>
                <th>Tax (9.3%)</th>
                <td>$10.34</td>
              </tr>
-->
              <tr>
                <th>Pagado:</th>
                <td><?php echo $montoPagado?></td>
              </tr>
               <tr>
                <th>Saldo:</th>
                <td><?php echo $saldo?></td>
              </tr>

              <tr>
                <th>Total $:</th>
                <td><?php echo $totalBruto?></td>
              </tr>
            </table>
          </div>
        </div>
        <!-- /.col -->
      </div>
<div class="col-xs-12" align="center">
<?php echo $pieF?>
</div>
                     

      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="v_imprimirFactura.php?idOperacion=<?php echo $idOperacion?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
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










  <?php include("footer.php")?>