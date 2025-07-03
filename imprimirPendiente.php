<?php 
   include 'header.php';
   include 'menu.php';

$idOperacion = $_GET['idOperacion'];
$conn3 = mysqli_connect($host,$userdb,$pass2,$DB)or die ('Ha fallado la conexion MySQL: '.mysqli_error($conn3));

//



            $queryList=mysqli_query($conn3,"SELECT * FROM  soperacioninvexamen where idOperacion = $idOperacion");
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
        Boleta
        <small># 0000<?php echo $numeroDoc ?></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li class="active"> Boleta</li>
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
             <?php echo $direccion_cliente ?><br>
            <?php echo $ciudad_cliente ?><br>
            Telefono: <?php echo $telefono_cliente ?><br>
            Email: <?php echo $correo_cliente ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          <b>Boleta  # 0000<?php echo $numeroDoc ?></b><br>
          <br>
        
          <b>Fecha Boleta:</b><?php echo $fechaOperacion ?><br>
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
              <th align="center">Descripción</th>
              <th>Referencia</th>
              <th>Referencia 2</th>
              <th>Resultado </th>
            </tr>
            </thead>
            <tbody>
            <?php

            $idOpera=$_GET['idOperacion'];

                  $resultado=mysqli_query($conn3,"SELECT * FROM  sdetalleoperexamen where  idOperacion = $idOpera ");
                    while ($oper=mysqli_fetch_assoc($resultado)) {
                      $idCon=$oper['id'];


                  $con2=mysqli_query($conn3,"SELECT * FROM resultado_orden as rn, examenes_22 as ex WHERE rn.id_orden= $idCon AND rn.id_examen=ex.id GROUP BY nombre"); 
                  while ($vak=mysqli_fetch_assoc($con2)) {   ?>

                    <tr>
                      <td  colspan="5" style="font-weight: bold;border-bottom: 3px solid #3c8dbc;padding-left: 2%;color: #3c8dbc;"> <?php echo ucfirst($vak['nombre']) ?></td>
                    </tr>

                     <?php   $con3=mysqli_query($conn3,"SELECT * FROM resultado_orden as rn, examenes_22 as ex, detalleExamenes_22 as dt WHERE rn.id_orden= $idCon AND rn.id_examen=ex.id AND rn.id_detalle=dt.id"); 
                      $contador=1;
                     while ($ult=mysqli_fetch_assoc($con3)) { ?>

                      <tr>
                        <td><?php echo $contador; ?></td>
                        <td><?php echo $ult['densidad']; ?></td>
                        <td><?php echo $ult['valorReferencia1']; ?></td>
                        <td><?php echo $ult['valorReferencia2']; ?></td>
                        <td><?php echo $ult['resultado']; ?></td>
                      </tr>





                      
                    <?php $contador++;  } ?>
                   




                      








               <?php     }  } ?>


            </tbody>
          </table>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

 
         

      <!-- /.row -->

      <!-- this row will not appear when printing -->
      <div class="row no-print">
        <div class="col-xs-12">  
          <a href="imprimirDetalle.php?idOperacion=<?php echo $idOperacion?>" target="_blank" class="btn btn-default"><i class="fa fa-print"></i> Imprimir</a>
         
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