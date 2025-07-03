<?php 
date_default_timezone_set('America/Bogota');
include("conexiones/conexion.php");
include("funciones/conexiones.php");
include("funciones/funciones.php");
            $con=conectar();
            
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
 


  <!-- Content Wrapper. Contains page content -->
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
          <!--b>Boleta  # 0000<?php echo $numeroDoc ?></b><br-->
          <br>
        
          <b>Fecha :</b><?php echo $fechaOperacion ?><br>
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


    </section>
    <!-- /.content -->
  </div>






