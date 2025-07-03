   <?php 
   include 'header.php';
   include 'menu.php';

  $idOperacion = $_GET['idOperacion'];

   $queryList=mysqli_query($conn3,"SELECT * FROM  sOperacionInv where  idOperacion = '$idOperacion' ");
   $nrowl=mysqli_num_rows($queryList);
   while($rowMotorizado=mysqli_fetch_array($queryList))
   {
    $idOperacion      =$rowMotorizado['idOperacion'];
    $numeroDoc      =$rowMotorizado['numeroDoc'];
    $idCliente      =$rowMotorizado['idCliente'];
    $totalNeto=$rowMotorizado['totalNeto'];//valor total
    $montoPagado      =$rowMotorizado['montoPagado'];
   }

   $saldo = $totalNeto-$montoPagado;

   $nombre_paciente = funcionMaster($idCliente,'cliente_id','nombre_cliente','cliente');

   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Historial de Abono del Paciente <?php echo $nombre_paciente?>
         
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Pacientes</a></li>
      </ol>
    </section>



    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <?php
     $msg = $_GET['msg'];
    if ($msg=='1') 
        {
          echo '  <div class="callout callout-info ">
            <h4> Cliente ya Registrado!</h4>

            <p>   </p>
          </div>'; 
        }

        if ($msg=='2') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Registrado!</h4>

            <p>   </p>
          </div>'; 
        }
        if ($msg=='3') 
        {
          echo '
            <div class="callout callout-info ">
            <h4> Cliente Actualizado!</h4>

            <p>   </p>
          </div>'; 


 
        }
      ?>
          <style type="text/css">
            /* width */
            ::-webkit-scrollbar {
              width: 10px;
            }

            /* Track */
            ::-webkit-scrollbar-track {
              background: #f1f1f1;
            }

            /* Handle */
            ::-webkit-scrollbar-thumb {
              background: #888;
            }

            /* Handle on hover */
            ::-webkit-scrollbar-thumb:hover {
              background: #555;
            }
            #example1_wrapper .row
            {
               margin-right: 0px; 
               margin-left: 0px;
            }
          </style>
          <div class="box">
            <form action="abonoregistrar.php" method="POST" name="formularioActualizarcliente">
            <div class="box-header" align="center">
              <h2>Abono del Presupuesto #<?php echo $numeroDoc?></h2>
            </div>
            <!-- /.box-header -->
            <div class="container-fluid" style="padding: 20px;">
              
              <div class="table-responsive" style="overflow: auto;">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>id</th>
                  <th>Numero Operacion / Presupuesto</th>
                  <th>Fecha</th>
                  <th>Hora</th>
                  <th>Metodo</th>
                  <th><div align="right">Valor Abonado</div></th>
                  <!--<th><div align="right">Monto Pagado Anterior</div></th>
                  <th><div align="right">Monto Pagado Nuevo</div></th> antiguo modulo-->
                  <th><div align="right">Saldo</div></th>
                  <th><div align="right">Total Factura</div></th>
                  <th><div align="right">Firmado</div></th>
                  <th>Imprimir   </th>
                  <th>   </th>
               
                </tr>
                </thead>
                <tbody>
                  <?php

                  $saldo = funcionMaster($idOperacion,'idOperacion','totalNeto','sOperacionInv');

                  $queryList=mysqli_query($conn3,"SELECT * FROM  abono where  numero_operacion = '$idOperacion' and activo= 1");
                  $nrowl=mysqli_num_rows($queryList);
                  while($rowMotorizado=mysqli_fetch_array($queryList))
                  {
                    $id=$rowMotorizado['id'];
                    $numero_operacion=$rowMotorizado['numero_operacion'];
                    $numero_documento=$rowMotorizado['numero_documento'];
                    $fecha=$rowMotorizado['fecha'];
                    $hora=$rowMotorizado['hora'];
                    $pago=$rowMotorizado['pago'];
                    $cliente_id=$rowMotorizado['cliente_id'];
                    $valor_abonado=$rowMotorizado['valor_abonado'];
                    $valor_anterior_factura =$rowMotorizado['valor_anterior_factura'];

                    $valor_nuevo_factura=$rowMotorizado['valor_nuevo_factura'];
                    $firma=$rowMotorizado['Firma'];
                    
                    
                    $EstadoAbono="";
                    if(strlen($firma)>1)
                    {
                      $EstadoAbono = "<p style='color:green;'>Firmado</p>";
                    }
                    else
                    {
                      $EstadoAbono = "<p style='color:red;'>No Firmado</p>";
                    }
                    
                    $Valor_Factura = funcionMaster($idOperacion,'idOperacion','totalNeto','sOperacionInv');
                    
                    //$saldo = $Valor_Factura-$valor_nuevo_factura; antiguo modulo
                      $saldo = $saldo-$valor_abonado;
                    
                    $Color="";
                    if(strlen($firma)>1){$Color = 'style="background-color:#80e680"';}else{$Color = 'style="background-color:#f38c8cb5"';}
                    

                    echo '     <tr '.$Color.'>
                    <td>'.$id.' </td>
                    <td> Operacion # '.$numero_operacion.'/ Presupuesto #'.$numero_documento.' </td>
                    <td>'.$fecha.'</td>
                    <td>'.$hora.'</td>
                    <td>'.$pago.'</td>
                    <td><div align="right">'.number_format($valor_abonado, 2, ',', '.').'</div></td>
                    <!--<td><div align="right">'.number_format($valor_anterior_factura, 2, ',', '.').'</div></td>
                    <td> <div align="right">  '.number_format($valor_nuevo_factura, 2, ',', '.').' </div></td> antiguo modulo-->
                    <td> <div align="right">  '.number_format($saldo, 2, ',', '.').' </div></td>
                    <td> <div align="right">  '.number_format($Valor_Factura, 2, ',', '.').' </div></td>
                    <td> <div align="center">  '.$EstadoAbono.' </div></td>
                   <td> <a href="ImprimirAbono.php?idOperacion='.$numero_operacion.'&idAbono='.$id.'"><i class="iconify" data-icon="ph:newspaper-clipping-bold" style="font-size:25px;position:relative;top:5px;"></i> Imprimir comprobante</a> </td>
                   <td> <a href="EliminarAbono.php?idOperacion='.$numero_operacion.'&idAbono='.$id.'"><i class="iconify" data-icon="ant-design:delete-twotone" style="font-size:25px;position:relative;top:5px;"></i> Eliminar abono</a> </td>
                    ';
                    if(strlen($firma)>1)
                      {
                        echo '<td> <a href=""><i class="fa fa-check"></i> Confimación Firmada </a> </td>
                        </tr>';
                      }
                    else
                      {           
                        echo '<td> <a href="EnviarAbono.php?idOperacion='.$numero_operacion.'&idAbono='.$id.'"><i class="iconify" data-icon="bx:bx-mail-send" style="font-size:25px;position:relative;top:5px;"></i> Enviar Confirmacion del Abono</a> </td>
                        </tr>';
                      }

                    echo "</tr>";
                      
                    }
 ?>
 
                <a href=""></a>
                </tbody>
              </table>
            </div>

            </div>
            </form>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
   <?php
    include 'footer.php';

   ?>