<!-- Left side column. contains the logo and sidebar -->
<?php
include 'header.php';
include 'menu.php'; ?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper p-3">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Control de Facturas de Entidades
    </h1>
    <ol class="breadcrumb">
      <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
      <li><a href="#">Control de Facturas de Entidades</a></li>


    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div>
      <div class="col-xs-12">

        <div class="box">

          <!-- /.box-header -->
          <div class="box-body">
            <font calss="text-dark"> Pagado <i class="fa fa-circle" style="color:#80e68070"></i> </font>||
            <font calss="text-dark"> Pendiente <i class="fa fa-circle" style="color:#ff000024"></i> </font>||
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Número</th>
                  <th>Entidad</th>
                  <th>Convenio</th>
                  <th>Fecha Registro</th>
                  <th>Fecha Vencimiento</th>
                  <th>
                    <div align="right">Total</div>
                  </th>
                  <th>
                    <div align="right">Cant.</div>
                  </th>
                  <th>
                    <div align="right" style="color: red">Saldo</div>
                  </th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php

                $ID = $_SESSION['ID'];
                $idOperacion = $_GET['idOperacion'];
                
                $resultado = mysqli_query($conn3,"SELECT * FROM  sOperacionInv where  tipo = 10 order by numeroDoc");
                while ($fila = mysqli_fetch_array($resultado)) {
                  
                  $convenio_id = $fila['convenio_id'];
 
                  $queryList = mysqli_query($conn3, "SELECT * FROM  Rips_Convenio where id = $convenio_id");
                  $nrowl = mysqli_num_rows($queryList);
                  while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                    $NombreConvenio = $rowMotorizado['Nombre'];
                    $entidad_id = $rowMotorizado['entidad_id'];
                    $NombreEntidad = funcionMaster($entidad_id, 'id', 'Nombre', 'Rips_Entidades');
                  }

                  ////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////
                  $idOperacionPrincipal = $fila['idOperacion'];
                  $ValorProductoDevuelto = 0;
                  $MontoDevolucion=0;
                  $ResultDevolucion = mysqli_query($conn3,"SELECT * FROM  sOperacionInvDevolucion where idOperacion_principal = $idOperacionPrincipal");
                  while ($RowDevolucion = mysqli_fetch_array($ResultDevolucion)) {
                      $ValorProductoDevuelto = round($ValorProductoDevuelto+$RowDevolucion['totalNeto'],2);
                      $MontoDevolucion = round($MontoDevolucion+$RowDevolucion['MontoDevolucion'],2);
                  }

                  $Mensaje_ValorProductoDevuelto="";
                  $Mensaje_MontoDevolucion="";
                  if($ValorProductoDevuelto!="0"){
                      $Mensaje_ValorProductoDevuelto = ' Productos Devueltos: '.$ValorProductoDevuelto;
                  }
                  if($MontoDevolucion!="0"){
                      $Mensaje_MontoDevolucion = ' Monto Devueltos: '.$MontoDevolucion;
                  }
                  
                  $saldo = ($fila['totalNeto'] - $fila['montoPagado']);
                  $saldodevolucion = ($ValorProductoDevuelto - $MontoDevolucion);
                  $saldo = round($saldo-$saldodevolucion,2);
                  ////////////////////////////////////////////////////////devoluciones////////////////////////////////////////////////////////////////

                  //$saldo = $fila[12] - $fila[14];
                  $Color = "";
                  if ($saldo == "0") {
                    $Color = 'style="background-color:#80e68070"';
                  } else {
                    $Color = 'style="background-color:#ff000024"';
                  }
                  echo '     <tr>
                  <td ' . $Color . '>' . $fila['numeroDoc'] . ' </td>
                  <td ' . $Color . '>' . $NombreEntidad . ' </td>
                  <td ' . $Color . '>' . $NombreConvenio . ' </td>
                  <td ' . $Color . '>' . $fila['fechaOperacion'] . '</td>
                  <td ' . $Color . '>' . $fila['fechaVencimiento'] . '</td>
                  <td ' . $Color . '><div align="right">' . number_format($fila['totalNeto'], 2) .'<br>'.$Mensaje_ValorProductoDevuelto.'<br>'.$Mensaje_MontoDevolucion. '</div></td>
                  <td ' . $Color . '><div align="right">' . $fila['cantidadProduc'] . '</div></td>
                  <td ' . $Color . '> <div align="right">  ' . number_format($saldo, 2) .' </div></td>
                    
                                        ' ?>
                  <td width='10%' <?php echo $Color ?>>
                    
                            <a class='dropdown-item' href='EN_PreliminarEntidadFactura?idOperacion=<?php echo  $fila[0]; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-info rounded-pill  btn-block'>
                                Preliminar Factura Entidad
                            </button>
                            </a>
                            <a class='dropdown-item' href='EN_ImprimirEntidadFactura?idOperacion=<?php echo $fila[0]; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                Imprimir Factura Entidad
                            </button>
                            </a>

                            <a class='dropdown-item' href='EN_GenerarDevolucion.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                Realizar Devolución Factura 
                            </button>
                            </a>

                            <a class='dropdown-item' href='EN_ControlDevoluciones?OperacionPrincipal=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                            <button type='button' class='btn btn-block btn-outline-secondary rounded-pill  btn-block'>
                                Historial de Devoluciones de Facturas
                            </button>
                            </a>

                  

                                            <div class='btn-group mt-1 w-100'>
                                                <?php if ($saldo <= 0) { ?>
                                                    <button type='button' class='btn btn-block btn-outline-success rounded-pill  dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        <i class='fa fa-bill'></i> Factura Pagada
                                                    </button>
                                                    <div class='dropdown-menu'>
                                                        <!-- <a class='dropdown-item' href='AbonoCuentasC.php?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block' disabled>
                                                                Factura Pagada
                                                            </button>
                                                        </a> -->
                                                        <a class='dropdown-item' href='HistorialAbonoC?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                                Historial de Pagos
                                                            </button>
                                                        </a>
                                                    </div>
                                                <?php } else { ?>

                                                    <button type='button' class='btn btn-block btn-warning rounded-pill dropdown-toggle' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                        <i class='fa fa-bill'></i> Acciones Pagos
                                                    </button>

                                                    <div class='dropdown-menu'>
                                                        <a class='dropdown-item' href='AbonoCuentasC?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-success rounded-pill  btn-block'>
                                                                Realizar Pago
                                                            </button>
                                                        </a>
                                                        <a class='dropdown-item' href='HistorialAbonoC?idOperacion=<?php echo $fila['idOperacion']; ?>' target='_blank'>
                                                            <button type='button' class='btn btn-block btn-outline-danger rounded-pill  btn-block'>
                                                                Historial de Pagos
                                                            </button>
                                                        </a>
                                                    </div>
                                                <?php } ?>
                                            </div>

                    </td>

                <?php
                  echo '
                  </tr>';
                }
                ?>
                <a href=""></a>
              </tbody>
              <tfoot>
              <tr>
                  <th>Número</th>
                  <th>Entidad</th>
                  <th>Convenio</th>
                  <th>Fecha Registro</th>
                  <th>Fecha Vencimiento</th>
                  <th>
                    <div align="right">Total</div>
                  </th>
                  <th>
                    <div align="right">Cant.</div>
                  </th>
                  <th>
                    <div align="right" style="color: red">Saldo</div>
                  </th>
                  <th></th>
                </tr>
              </tfoot>
            </table>
          </div>
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
<style>
    .clasedropmenu{
        left: -190px!important;
    }
</style>