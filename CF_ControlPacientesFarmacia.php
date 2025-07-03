<?php 
   include 'header.php';
   include 'menu.php';

   $clienteId = decrypt($_GET['cI']); 
   $usuarioId = $_SESSION['ID'];

   ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Control de Pacientes Farmacia
      </h1>
      <ol class="breadcrumb">
        <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio</a></li>
        <li><a href="#">Control de Pacientes Farmacia</a></li>
      </ol>
    </section>

    <link rel="stylesheet" type="text/css" href="css/tab_nav_demo79_1.css" media="screen"/>

    <!-- Main content -->
    <section class="content"> 
      <div class="row">
        <div class="card-body">
          <div class="box">
          <?php echo datosPacientes($clienteId);?>
            <div align="center">
            <br><br>
            </div>
          </div>
        </div>
      </div>
    </section>

    <br>

    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                <div class="tab" role="tabpanel">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs" role="tablist">
                        <li role="presentation" ><a href="#Section1" aria-controls="home" role="tab" data-toggle="tab" class="active"> <i class='fas fa-book-medical' style='font-size:26px'> </i> Inyecciones Aplicadas</a></li>
                        <li role="presentation" ><a href="#Section2" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Adjuntos de Receta</a></li>
                        <li role="presentation" ><a href="#Section3" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Facturas</a></li>
                        <li role="presentation" ><a href="#Section4" aria-controls="home" role="tab" data-toggle="tab" > <i class='fas fa-book-medical' style='font-size:26px'> </i> Cuentas a Cobrar</a></li>
                        <!--<li role="presentation"><a href="#Section2" aria-controls="profile" role="tab" data-toggle="tab"> <i class='fas fa-vials' style='font-size:26px'> </i> Controles</a></li>-->
                    </ul>
                    <!-- Tab panes -->
                    <div class="tab-content tabs">
                        <!-- inicio seccion 1 -->
                        <div role="tabpanel" class="tab-pane fade in active show" id="Section1">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                            <div class="box">
                            <br>
                            <div class="box-body">
                                <table class="table table-bordered" style="font-size: 15px;width:100%">
                                <thead>
                                    <tr>
                                    <th>Inyección</th>
                                    <th>Dosis</th>
                                    <th>Fecha Administración</th>
                                    <th>Fecha Próxima Aplicación</th>
                                    <th>Sitio Anatómico</th>
                                    <th>Observaciones</th>
                                    <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $usuario_id = $_SESSION['ID'];

                                    $queryList = mysqli_query($conn3, "SELECT * FROM grupos_vacunacion");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($Lista = mysqli_fetch_array($queryList)) {
                                    $numero_grupo = $Lista['id'];
                                    $nombre_grupo = $Lista['Nombre'];

                                    $contador = '0';

                                    $queryList1 = mysqli_query($conn3, "SELECT l_v.id as ListaVacuna,v_a.Fecha_Administracion as Fecha_A,v_a.Fecha_Proxima_Aplicacion as Fecha_P,v_a.Sitio_Anatomico as Sitio_A,v_a.Observacion as Observacion, v_a.Dosis_Aplicada as Dosis, v_a.id as id_vacunacion 
                                    FROM vacunas_aplicadas as v_a 
                                    , listado_vacunas as l_v  
                                    WHERE v_a.Id_Lista_Vacuna = l_v.id AND l_v.Id_Grupo='$numero_grupo' AND v_a.Id_Cliente = '$clienteId' and v_a.activo = 1  ORDER BY v_a.id , v_a.Id_Lista_Vacuna, v_a.Dosis_Aplicada");
                                    $nrowl = mysqli_num_rows($queryList1);
                                    while ($Lista1 = mysqli_fetch_array($queryList1)) {
                                        if ($contador == "0") {
                                        echo '<tr><td colspan="7" style="background-color: beige;"><b>' . $nombre_grupo . '</b></td></tr>';
                                        }
                                        $ListaVacuna = $Lista1['ListaVacuna'];
                                        $Nombre_Vacuna = funcionMaster($ListaVacuna, 'id', 'Nombre_Vacuna', 'listado_vacunas');

                                        $Dosis = $Lista1['Dosis'];
                                        $Fecha_A = $Lista1['Fecha_A'];
                                        $Fecha_P = $Lista1['Fecha_P'];

                                        $Sitio_A = $Lista1['Sitio_A'];
                                        $Observacion = $Lista1['Observacion'];

                                        echo '<tr><td>' . $Nombre_Vacuna . ' </td>
                                                <td> Dosis ' . $Dosis . ' </td>
                                                <td>' . $Fecha_A . ' </td>
                                                <td>' . $Fecha_P . ' </td>
                                                <td>' . $Sitio_A . ' </td>
                                                <td>' . $Observacion . ' </td>
                                                ';
                                        
                                        echo '<td>
                                        <a href="ComprobanteInyeccion?iD=' . encrypt($Lista1['id_vacunacion'])  . '" title="Comprobante de Registro"><i class="fa fa-file-o"></i> </a> | 
                                        <a href="certificadoInyeccion?iD=' . encrypt($Lista1['id_vacunacion']) . '" title="Certificado Inyeccion"><i class="fa fa-file-text-o"></i> </a> </td>';

                                        echo '
                                                </tr>';

                                        $contador++;
                                    }
                                    }
                                    ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                    <th>Inyección</th>
                                    <th>Dosis</th>
                                    <th>Fecha Administración</th>
                                    <th>Fecha Próxima Aplicación</th>
                                    <th>Sitio Anatómico</th>
                                    <th>Observaciones</th>
                                    <th></th>
                                    </tr>
                                </tfoot>
                                </table>
                            </div>
                            </div>


                            </div>
                          </div>
                          <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 1-->







                        <div role="tabpanel" class="tab-pane fade " id="Section2">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                    
                                    $queryList=mysqli_query($conn3,"SELECT * FROM  Documentos_Sistema where cliente_id = $clienteId AND tabla = 'sOperacionInv' GROUP BY tabla_id order by id DESC ");
                                    $nrowl=mysqli_num_rows($queryList);
                                    while($rowMotorizado=mysqli_fetch_array($queryList))
                                    {
                                        $ArregloTabla[] = $rowMotorizado['tabla_id'];
                                    }
                                    
                                    foreach ($ArregloTabla as $key => $value) {
                                        # code...
                                        $Links = array();
                                        $queryList=mysqli_query($conn3,"SELECT * FROM  Documentos_Sistema where cliente_id = $clienteId AND tabla = 'sOperacionInv' AND tabla_id = '$value' order by id DESC ");
                                        while($rowMotorizado=mysqli_fetch_array($queryList))
                                        {
                                            $Fecha= $rowMotorizado['Fecha'];
                                            $Links[$rowMotorizado['id']]['Ruta'] = $rowMotorizado['Ruta'].$rowMotorizado['Nombre'];
                                            $Links[$rowMotorizado['id']]['Nombre'] = $rowMotorizado['Nombre_Original'];
                                        }
                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#DocumentosAdjuntos<?php echo $value?>" aria-expanded="false" aria-controls="DocumentosAdjuntos<?php echo $value?>">
                                        Fecha <?php echo $Fecha;?> - # <?=$value;?>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="DocumentosAdjuntos<?php echo $value?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">
                                        <hr align="center" size="10" width="100%" color="#000000">

                                        <table class="table w-100" style="width: 100% !important;">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nombre Archivo</th>
                                            <th scope="col">Fecha</th>
                                            <th scope="col" style="text-align: center;font-size: 25px;"><i class="fa fa-download"
                                                aria-hidden="true"></i></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <?php 
                                        $contador=0;
                                        foreach ($Links as $key => $value) {
                                            $contador++;
                                           echo "<tr>
                                           <td>
                                             {$contador}
                                           </td>
                                           <td>
                                             {$value['Nombre']}
                                           </td>
                                           <td>
                                             {$Fecha}
                                           </td>
                                           <td style='text-align: center;'>
                                             <a target='blank' href='{$Base}{$value['Ruta']}'>
                                               <a href='{$Base}{$value['Ruta']}'
                                                 download='Archivo'>Descargar Archivo
                                               </a>
                                             </a>
                                           </td>
                                           </tr>";
                                        }
                                        ?>
                                         </tbody>
                                        </table>
                                        
  
                                    </div>
                                  </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                          </div>
                          <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 2-->




















                        <div role="tabpanel" class="tab-pane fade " id="Section3">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              

                                <?php 
                                    
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idCliente= '$clienteId' and tipo = 1 ORDER BY idOperacion DESC");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $idOperacion      = $rowMotorizado['idOperacion'];
                                        $numeroDoc      = $rowMotorizado['numeroDoc'];
                                        $idCliente      = $rowMotorizado['idCliente'];
                                        $idEmpresa      = $rowMotorizado['idEmpresa'];
                                        $fechaOperacion      = $rowMotorizado['fechaOperacion'];
                                        $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];

                                        $impuestoBase = $rowMotorizado['impuestoBase'];
                                        $totalNeto      = $rowMotorizado['totalNeto'];
                                        $cantidadProduc      = $rowMotorizado['cantidadProduc'];
                                        $montoPagado      = $rowMotorizado['montoPagado'];
                                        $nota      = $rowMotorizado['nota'];
                                        $moneda = funcionmaster($idEmpresa, 'ID_Usuario', 'moneda', 'config');
                                ?>
                                <div class="panel panel-default" style="background: #f1f1f1;">
                                  <div class="panel-heading" role="tab" id="heading" style="background-color: #bad8e687;">
                                    <h4 class="panel-title">
                                      <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#Factura<?php echo $idOperacion?>" aria-expanded="false" aria-controls="Factura<?php echo $idOperacion?>">
                                        Factura # <?=$idOperacion;?> - Fecha <?php echo $fechaOperacion;?>
                                      </a>
                                    </h4>
                                  </div>
                                  <div id="Factura<?php echo $idOperacion?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading" style="padding-top: 20px;background-color: rgb(238, 238, 238);">
                                    <div class="panel-body">


                                        <hr align="center" size="10" width="100%" color="#000000">
                    
                                        <table class="table">
                                        <thead>
                                        <tr>
                                            <td>#</td>
                                            <td>Descripción</td>
                                            <td><div align="Right">Cantidad</div></td>
                                            <td><div align="Right">Precio</div></td>
                                            <td><div align="Right">Descuento</div></td>
                                            <td><div align="Right">Subtotal</div></td>
                                        </tr>

                                        </thead>
                                        <tbody>
                                        <?php
                                        $ResultadoOperacion = mysqli_query($conn3, "SELECT * FROM  sDetalleOper where   estado = 1 and idOperacion = $idOperacion order by id");
                                        while ($fila = mysqli_fetch_array($ResultadoOperacion)) {

                                            $Numero++;
                                            $Descuento = $fila['Descuento_Numerico'];

                                            echo '     <tr>
                                        <td  width="5%">' . $Numero . ' </td>
                                        <td width="30%">' . $fila['descripcion'] . ' </td>
                                        
                                        <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                                        <td width="13%"><div align="Right">' . $fila['base'] . '' . $moneda . '</div></td>
                                        <td width="13%"><div align="Right">' . $Descuento . '' . $moneda . '</div></td>
                                        <td width="13%"><div align="Right">' . $fila['subTotal'] . '' . $moneda . '</div></td>
                                        
                                        </tr>';

                                        }


                                        ?>


                                        </tbody>
                                        <tfoot>
                                            <?php if($impuestoBase>0):?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><div align="Right"></div></td>
                                                <td><div align="Right"></div></td>
                                                <td><div align="Right">Impuesto</div></td>
                                                <td><div align="Right"><?=$impuestoBase." ".$moneda;?></div></td>
                                            </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td><div align="Right"></div></td>
                                                <td><div align="Right"></div></td>
                                                <td><div align="Right">Total</div></td>
                                                <td><div align="Right"><?=$totalNeto." ".$moneda;?></div></td>
                                            </tr>
                                        </tfoot>
                                    </table>

                                    <div class="col-md-12">
                                        <a href="preliminarFactura?idOperacion=<?php echo $idOperacion ?>" target="_blank" class="btn btn-block btn-outline-info rounded-pill shadow m-1" style="width:100%" ><i class="fa fa-print"></i> Previsualizar Factura</a>
                                    </div>
                                      


                                    </div>
                                  </div>
                                </div>
                                <?php 
                                }
                                ?>
                            </div>
                          </div>
                          <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 3-->









                        <div role="tabpanel" class="tab-pane fade " id="Section4">
                          
                          <!--inicio accordion-->
                          <div class="col-md-12">
                            <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                              


                            <table class="table">
                            <thead>
                                <tr>
                                <td><strong>Numero</strong></td>
                                <td><strong>Fecha Factura</strong></td>
                                <td>
                                    <div align="right"><strong>Total</strong></div>
                                </td>
                                <td>
                                    <div align="right"><strong>Monto Pagado</strong></div>
                                </td>
                                <td>
                                    <div align="right"><strong>Monto Faltante</strong></div>
                                </td>
                                <td>
                                    <div align="right"><strong>Productos</strong></div>
                                </td>
                                <td colspan="12" style="text-align: center;"><strong>Opciones</strong></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    
                                    $queryList = mysqli_query($conn3, "SELECT * FROM  sOperacionInv where idCliente= '$clienteId' and tipo = 1 ORDER BY idOperacion DESC");
                                    $nrowl = mysqli_num_rows($queryList);
                                    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
                                        $idOperacion      = $rowMotorizado['idOperacion'];
                                        $numeroDoc      = $rowMotorizado['numeroDoc'];
                                        $idCliente      = $rowMotorizado['idCliente'];
                                        $idEmpresa      = $rowMotorizado['idEmpresa'];
                                        $fechaOperacion      = $rowMotorizado['fechaOperacion'];
                                        $fechaVencimiento      = $rowMotorizado['fechaVencimiento'];

                                        $impuestoBase = $rowMotorizado['impuestoBase'];
                                        $totalNeto      = $rowMotorizado['totalNeto'];
                                        $cantidadProduc      = $rowMotorizado['cantidadProduc'];
                                        $montoPagado      = $rowMotorizado['montoPagado'];

                                        $Saldo = $totalNeto-$montoPagado;
                                        $Color="";
                                        if($Saldo>0){
                                            $Color="style='background-color:#ff000038;'";
                                        }else{
                                            $Color="style='background-color:#00800033;'";
                                        }
                                        echo '     <tr ' . $Color . '>
                                        <td >' . $numeroDoc . ' </td>
                                        <td>' . $fechaOperacion . '</td>
                                        <td><div align="right">' . number_format($totalNeto, 0, ',', '.') . '</div></td>
                                        <td><div align="right">' . $montoPagado . '</div></td>
                                        <td><div align="right">' . $Saldo . '</div></td>
                                        <td><div align="right">' . $cantidadProduc . '</div></td> 
                                        ';

                                        echo "<td>";
                                        if($Saldo>0){
                                            echo "<div class='btn-group' style='width:100%;'>
                                            <button class='btn btn-secondary dropdown-toggle same-size-button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                              <i class='fa fa-credit-card text-primary' aria-hidden='true'></i>
                                              Acciones
                                            </button>
                                            <div class='dropdown-menu' style=width:100%'>
                                              <a class='dropdown-item' href='preliminarFactura.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                  Preliminar Factura
                                                </button>
                                              </a>
                                              <a class='dropdown-item' href='imprimirFactura.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                  Imprimir Factura
                                                </button>
                                              </a>
                                              <a class='dropdown-item' href='enviarFactura.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                  Enviar Factura
                                                </button>
                                              </a>


                                              <a class='dropdown-item' href='AbonoCuentasC.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                    Realizar Abono
                                                </button>
                                              </a>
                                              <a class='dropdown-item' href='HistorialAbonoC.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                    Historial Abono
                                                </button>
                                              </a>


                                            </div>
                                          </div>";
                                        }else{
                                            echo "<div class='btn-group' style='width:100%;'>
                                            <button class='btn btn-secondary dropdown-toggle same-size-button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                              <i class='fa fa-credit-card text-primary' aria-hidden='true'></i>
                                              Acciones
                                            </button>
                                            <div class='dropdown-menu' style=width:100%'>
                                              <a class='dropdown-item' href='preliminarFactura.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                  Preliminar Factura
                                                </button>
                                              </a>
                                              <a class='dropdown-item' href='imprimirFactura.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                  Imprimir Factura
                                                </button>
                                              </a>
                                              <a class='dropdown-item' href='enviarFactura.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                  Enviar Factura
                                                </button>
                                              </a>

                                              <a class='dropdown-item' href='HistorialAbonoC.php?idOperacion={$idOperacion}' target='_blank'>
                                                <button type='button' class='btn btn-secondary btn-block same-size-button'>
                                                    Historial Abonos
                                                </button>
                                              </a>

                                            </div>
                                          </div>";
                                        }

                                        echo "</td>
                                        </tr>";
                                        

                                ?>

                                <?php 
                                }
                                ?>

                            </tbody>
                            </table>


                            </div>
                          </div>
                          <!--final accordion-->   




                        </div>
                        <!-- cierre seccion 3-->












                        




                            </div>
                        </div>
                    </div>
                </div>
            </div>




      </div>
    </section>
  </div>
           

   <?php
    include 'footer.php';

   ?>