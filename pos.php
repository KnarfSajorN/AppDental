<?php
include 'header.php';
include 'menu.php';


$queryList = mysqli_query($conn3, "SELECT * FROM  config where ID_Usuario = '{$_SESSION['ID']}'");
// $nrowl = mysqli_num_rows($queryList);
if ($queryList) {
    while ($rowMotorizado = mysqli_fetch_array($queryList)) {
        $moneda = $rowMotorizado['moneda'];
        $impuestoF = $rowMotorizado['impuestoF'];
        $Max_Descuento = $rowMotorizado['Max_Descuento'];
    }
}


//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id="0";
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = 0 AND tipo = '1' order by id");
if ($resultado) {
    while ($fila = mysqli_fetch_array($resultado)) {
        $Deposito_id=$fila["Deposito_id"];
    }
}

if($Deposito_id!="0" AND $Deposito_id!=""){
    $DesabilitarDep="readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cliente_pos = decrypt($_GET['cI']);
$Nombre_Cliente="Contado";
$QueryCliente = mysqli_query($conn3, "SELECT * FROM  cliente where cliente_id = $cliente_pos ");
if ($QueryCliente) {
    while ($RowCliente = mysqli_fetch_array($QueryCliente)) {
        $Nombre_Cliente="Cliente: ".$RowCliente["nombre_cliente"];
    }
}






/*
foreach($_SESSION as $key => $value){
    echo "$key => $value <br> ";
}
*/
?>





<style>
  /* para aplicar la misma funcion de un readonly, ya que si hay readonly y required no funcionan los dos */
  input[data-readonly_P] {
    pointer-events: none;
    background-color: #eee;
    opacity: 1;
  }
</style>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-info">
                    <h3 class="card-title">
                        Caja POS - [<?= funcionMaster($_SESSION['POS'],'id','Nombre','PuntoPOS'); ?>]
                    </h3>
                    <div class="card-tools">
                        <ul class="nav nav-pills ml-auto">
                            <li class="nav-item">
                                <a style="border-top-left-radius:50rem; border-bottom-left-radius:50rem;" class="btn btn-lg btn-light active" href="#sales" data-toggle="tab">
                                    Facturar
                                    <i class="fas fa-dollar-sign ml-1"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a style="border-top-right-radius:50rem; border-bottom-right-radius:50rem;" class="btn btn-lg btn-light" href="#clients" data-toggle="tab">
                                    <i class="fas fa-users mr-1"></i>
                                    Pacientes
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <div class="card-body" id="InformacionPOS">
                    <div class="tab-content">

                        <div class="active tab-pane" id="sales">
                            <div class="row">
                                <div class="col-md-6 p-4">
                                    <h4 class="text-success"><?=$Nombre_Cliente;?></h4>
                                    <form action="agregarDetalle_pos.php" method="POST">
                                        <div class="form-row bg-light rounded p-2">

                                            <div class="form-group col-md-12 row">
                                            
                                            <div class="form-group col-md-12">
                                                <label><strong> Depósito</strong></label>
                                                <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?=$DesabilitarDep;?> >
                                                <?php
                                                $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                                if ($queryListDP) {
                                                    while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                                    $idDP = $rowMotorizadoDP['id'];
                                                    $descripcionDP = $rowMotorizadoDP['descripcion'];

                                                    if($Deposito_id!="" AND $Deposito_id == $idDP){
                                                    echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                                    }else{
                                                    echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                                    }
                                                    
                                                }
                                                }
                                                
                                                ?>
                                                </select>
                                                <?php
                                                if($DesabilitarDep!=""){
                                                    echo '<script>document.getElementById("deposito").addEventListener("mousedown", function (e) {
                                                        e.preventDefault(); // Evita que se abra el menú desplegable
                                                        this.blur(); // Quítale el enfoque al elemento
                                                    });</script>';
                                                }
                                                ?>
                                            </div>
                                                <div class="form-group col-md-12">
                                                    <div align="left">
                                                        <label>Producto o Servicio</label>
                                                    </div>

                                                    <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                                        <option value="" selected="selected">Seleccione Producto</option>
                                                        <?php

                                                        $queryList = mysqli_query($conn3, "SELECT si.* FROM sinvetrios si
                                                        JOIN scategoria sca ON si.tipo = sca.id
                                                        WHERE 1=1
                                                        AND si.estado = 1
                                                        AND sca.tipo in (1,2,3,5)");
                                                        if ($queryList) {
                                                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                            $descripcion     = $row_recordset32['descripcion'];
                                                            $ID              = $row_recordset32['ID'];

                                                            echo "<option value='$ID'> $descripcion </option>";
                                                        }
                                                        }
                                                        ?>

                                                    </select>
                                                </div>
                                                <div id="Campo_Adicional_Producto" class="col-md-12">

                                                </div>
                                            </div>
                                                        
                                            <div class="form-group col-md-6">
                                                <div align="left">
                                                    <label> Precio </label>
                                                </div>
                                                <input type="number" step="0.01" class="form-control input-lg" id="2" name="base" placeholder="precio" onchange="multiplicar();" value="" required>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Cantidad</label>
                                                <input type="number" class="form-control input-lg" id="1" name="cantidad" placeholder="cantidad" onChange="multiplicar();" value="1" required>
                                                <div align="left" id="informacion_existencia"></div>
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Descuento</label>
                                                <input type="text" class="form-control input-lg" id="descuento" value="0" name="descuento" placeholder="descuento" pattern="[0-9.%]+" step="any" oninput="onDescuentoInput(this);" onchange="multiplicar();" required>
                                                <input type="hidden" id="Max_Descuento" value="<?=$Max_Descuento;?>">
                                            </div>

                                            <div class="form-group col-md-6">
                                                <label>Subtotal</label>
                                                <input type="number" class="form-control input-lg blur" id="3" name="subTotal" placeholder="subTotal" min="0" step="0.01" data-readonly_P required>
                                            </div>




                                            <div class="form-group col-md-12" align="center">
                                                <br>
                                                <button type="submit" class="btn btn-lg btn-block btn-outline-info rounded-pill" name="GuardarDetalleOrden">
                                                    <i class="fa fa-plus"></i>
                                                    Agregar
                                                </button>
                                            </div>




                                            <div class="form-group col-md-12" align="center">
                                                <label style="color:#3a8bb9;">[si desea el descuento en % deberá colocar al final del numero el símbolo %, si es valor numérico solo colocar números]</label>
                                            </div>


                                            <input type="hidden" name="usuario_id" value="<?php echo $_SESSION['ID'] ?>">
                                            <input type="hidden" name="cliente_id" value="0">
                                            <input type="hidden" name="historia" value="">
                                            <input type="hidden" name="tipo_historia" value="">

                                        </div>


                                    </form>
                                </div>
                                <div class="col-md-6 p-4">
                                    <?php
                                    if($_SESSION['POS']){
                                        $proximaFactura = funcionMaster($_SESSION['POS'], 'id', 'NumeroFactura', 'PuntoPOS') + 1;
                                    }else{
                                        $proximaFactura = funcionMaster($_SESSION['ID'], 'ID', 'numeroFactura', 'usuarios') + 1;
                                    }
                                    
                                    ?>
                                    <h4 class="center text-center text-success">Próxima Factura <?= $proximaFactura ?></h4>
                                    <div class="table-responsive my-4">
                                        <table class="table table-bordered rounded" id="table-factura">
                                            <?php
                                            $theads = [
                                                '#',
                                                'Desc.',
                                                'Precio',
                                                'Cant.',
                                                'Desc.',
                                                'Total',
                                                ''
                                            ];
                                            ?>
                                            <thead>
                                                <tr>
                                                    <?php
                                                    foreach ($theads as $th) {
                                                        echo "<th>{$th}</th>";
                                                    }
                                                    ?>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php

                                                //Seriales Productos Simples Parte 1/2
                                                include 'IN_IncludeSerialesDetallesPHP.php';

                                                $ID = $_SESSION['ID'];

                                                $resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$ID and  id_cliente = 0 AND tipo = '1' order by id");
                                                if($resultado){
                                                while ($fila = mysqli_fetch_array($resultado)) {
                                                    //  '.$fila[2].'                    <a href="" >  <i class="fa fa-pencil-square-o"></i>   </a>  
                                                    $Numero++;
                                                    $ruta = htmlentities($_SERVER['PHP_SELF']);

                                                    $totalbase = $fila['totalbase'];
                                                    $subTotal = $fila['subTotal'];

                                                    $descuentoValor = $fila['Descuento_Numerico'];

                                                    $SinvDep_id = $fila['SinvDep_id'];
                                                    $idProductoT = $fila['idProducto'];
                                                    $MasDetalles = ConsultarMasInformacion_Facturacion_Funcion($idProductoT,$SinvDep_id);
                                                    /////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

                                                    //Seriales Productos Simples Parte 1/2
                                                    $CampoAdicionalSerial = ConsultarDisponbilidadSerialTipoProducto_ProductoSimple($fila['id']);


                                                    echo '     <tr>
                                                        <td  width="5%">' . $Numero.' '.$CampoAdicionalSerial. ' </td>
                                                        <td width="20%">' . $fila['descripcion']." ".$MasDetalles. ' </td>
                                                        <td width="10%"><div align="Right">' . number_format($fila['base'], 2) . '' . $moneda . '</div></td>
                                                        <td width="5%"><div align="Right">' . $fila['cantidad'] . '</div></td>
                                                        <td width="10%"><div align="center">' . number_format($descuentoValor, 2) . '' . $moneda . '</div></td>
                                                        <td width="10%"><div align="Right">' . number_format($fila['subTotal'], 2) . '' . $moneda . '</div></td>';

                                                    echo "<td width='1%'><a href=agregarDetalle_pos.php?clienteId={$clienteId}&tipo_historia{$tipo_historia}=&historiaClinica1={$historiaClinica1}&borrar={$fila['id']}><i class='fa fa-trash' style='color:red'></i> </a></td>";

                                                    echo '</tr>';

                                                    $totalCant += $fila['cantidad'];
                                                    $totalBase +=  $fila['base'];
                                                    $total += $fila['subTotal'];

                                                    $totaldesc += $descuentoValor;
                                                    $ImpuestoDetalles += $fila['Impuesto_Numerico'];
                                                    
                                                    $totalFinal = $total;
                                                }
                                            }

                                                ?>
                                            </tbody>
                                            <thead>
                                                <tr>

                                                    <th> </th>
                                                    <th> <strong>
                                                            <div align="Right"> Totales </div>
                                                        </strong>
                                                    </th>
                                                    <th>
                                                        <div align="Right"><?php echo number_format($totalBase, 2) . ' ' . $moneda; ?> </div>
                                                    </th>
                                                    <th>
                                                        <div align="Right"><?php echo $totalCant ?></div>
                                                    </th>

                                                    <th>
                                                        <div align="center"><?php echo number_format($totaldesc, 2) . ' ' . $moneda; ?> </div>
                                                    </th>
                                                    <th>
                                                        <div align="Right"><?php echo number_format($total, 2) . ' ' . $moneda; ?> </div>
                                                    </th>
                                                    <th> </th>

                                                </tr>

                                                <?php
                                                if ($ImpuestoDetalles > 0) {
                                                    $total = $total + $ImpuestoDetalles;
                                                ?>
                                                    <tr>
                                                        <th colspan="5"> <strong>
                                                                <div align="Right"> Impuesto </div>
                                                            </strong> 
                                                        </th>
                                                        <th>
                                                            <div align="Right"><?php echo $ImpuestoDetalles  . ' ' . $moneda; ?> </div>
                                                        </th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="5"> <strong>
                                                                <div align="Right"> Total con Impuesto </div>
                                                            </strong> 
                                                        </th>
                                                        <th>
                                                            <div align="Right"><?php echo $total . ' ' . $moneda; ?> </div>
                                                        </th>
                                                    </tr>
                                                <?php
                                                } ?>


                                            </thead>
                                        </table>
                                    </div>


                                    <div class="card collapsed-card">
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Cliente</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                <select id="id_cliente" name="id_cliente" class="form-control select2" style="width: 100%;" required="required" onchange="idCliente(this.value);">
                                                    <?php
                                                    echo "<option value='-1'>Contado</option>";
                                                    $queryList = mysqli_query($conn3, "SELECT * FROM cliente WHERE activo = 1 $queryCliente ");
                                                    // $nrowl = mysqli_num_rows($queryList);
                                                    if ($queryList) {
                                                        while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                            $cliente_id     = $row_recordset32['cliente_id'];
                                                            $nombre_cliente      = $row_recordset32['nombre_cliente'];
                                                            $CODI_CLIENTE      = $row_recordset32['CODI_CLIENTE'];
                                                            $whatsapp      = $row_recordset32['whatsapp'];
                                                            echo "<option value='$cliente_id'>Nombre: " . $nombre_cliente . " || Documento: " . $CODI_CLIENTE . " || Teléfono: " . $whatsapp . "</option>";
                                                        }
                                                    }
                                                    
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    

                                    <div class="card collapsed-card">
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Notas</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                <textarea name="nota" id="nota" rows="3" class="form-control" onchange="idNota(this.value);"></textarea>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="card collapsed-card">
                                        <?php
                                        $ID = $_SESSION['ID'];
                                        //tipo 1 -> facturas
                                        //Calcular max del campo monto de pago
                                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID AND idOperacion = 0 AND tipo = '1' AND Activo = 1 ");
                                        $MontoPagadoDetalle = 0;
                                        if ($resultado) {
                                            while ($fila = mysqli_fetch_array($resultado)) {
                                                $MontoPagadoDetalle = $MontoPagadoDetalle + $fila['nota_pago'];
                                            }
                                        }
                                        
                                        $MontoDebe = round($total - $MontoPagadoDetalle, 2);
                                        // echo "El total es: " . $totalMet;
                                        ?>
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Métodos de pago</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                <table class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>#</th>
                                                            <th>
                                                                <div>Método de Pago</div>
                                                            </th>
                                                            <th>
                                                                <div align="Right">Monto</div>
                                                            </th>
                                                            <th><div align="center"><i class='fa fa-trash'></div></i></th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <?php
                                                        $ID = $_SESSION['ID'];
                                                        //tipo 1 -> facturas
                                                        $resultado = mysqli_query($conn3, "SELECT * FROM sDetalleMetodosPagos WHERE id_usuario = $ID  AND idOperacion = 0 AND tipo = '1' AND Activo = 1 ");
                                                        // $check = mysqli_num_rows($resultado);
                                                        $totalMet = 0;

                                                        if ($resultado) {
                                                        while ($fila = mysqli_fetch_array($resultado)) {
                                                            $Numero++;
                                                            $Valor_Pago = $fila['nota_pago'];
                                                            $Nombre_Pago = funcionMaster($fila['metodo_pago'],'id','Nombre','Medios_Pago');

                                                            echo '<tr>
                                                                <td>' . $Numero . '</td>
                                                                <td>' . $Nombre_Pago . '</td>
                                                                <td><div align="Right">' . number_format($Valor_Pago, 2)  . '' . $moneda . '</div></td>';

                                                                echo "<td align='center'><a onclick='EliminarMedioPago({$fila['id']})'><i class='fa fa-trash' style='color:red'></i> </a></td>";
                                                                
                                                            echo'</tr>';


                                                            $totalMet += $fila['nota_pago'];
                                                        }
                                                        }

                                                        // echo "El total es: " . $totalMet;
                                                        ?>
                                                    </tbody>
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th> <strong>
                                                                    <div align="Right"> Total </div>
                                                                </strong>
                                                            </th>
                                                            <th>
                                                                <div align="Right"><?php echo number_format($totalMet, 2) . ' ' . $moneda; ?> </div>
                                                            </th>



                                                        </tr>
                                                        <tr>
                                                            <th></th>
                                                            <th> <strong>
                                                                    <div align="Right">
                                                                        <h3> Cambio</h3>
                                                                    </div>
                                                                </strong>
                                                            </th>
                                                            <th>
                                                                <div align="Right">
                                                                    <h3><?php echo  number_format(round($totalMet - $total, 2), 2)    ?></h3>
                                                                </div>
                                                            </th>
                                                            <th></th>



                                                        </tr>
                                                    </thead>

                                                </table>
                                            </div>
                                            <div class="form-group">
                                                <form action="guardarDetalleMetodo.php" method="POST" name="formularioActualizarcliente" style="width:100%"  >


                                                    <input type="hidden" class="form-control input-lg" id="id_usuario" name="id_usuario" placeholder="id_usuario" value="<?php echo  $id_usuario ?>">
                                                    <select id="metodo_pago" name="metodo_pago" class="form-control input-lg select" style="width: 100%;" required>

                                                        <option value="">Seleccione...</option>
                                                        <!--<option value="Efectivo">Efectivo</option>
                                                        <option value="Crédito">Crédito</option>
                                                        <option value="Cheque">Cheque</option>
                                                        <option value="Transferencia Bancaria">Transferencia Bancaria</option>
                                                        -->

                                                    <?php
                                                    // se pone id!=5 debido a que el pago 5 es uno personalizado de puntos que se usa en la factura general
                                                    $QueryMedioPago = mysqli_query($conn3, "SELECT * FROM Medios_Pago WHERE  Activo = '1' AND id!=5");
                                                    if ($QueryMedioPago) {
                                                        while ($RowMedioPago = mysqli_fetch_array($QueryMedioPago)) {

                                                            $MedioPago_id = $RowMedioPago['id'];
                                                            $Nombre_MedioPago = $RowMedioPago['Nombre'];

                                                            echo "<option value='$MedioPago_id'>$Nombre_MedioPago</option>";

                                                        }
                                                    }
                                                    
                                                    ?>
                                                    </select>

                                                    <label>Monto</label>
                                                    <input type="number" id="nota_pago" name="nota_pago" placeholder="Monto" class="form-control input-lg" step="0.01" max="<?= round($MontoDebe, 2); ?>"><br>
                                                    <button type="submit" class="btn btn-lg btn-block btn-outline-primary rounded-pill">
                                                        <i class="fas fa-coins mr-1"></i>
                                                        Pagar
                                                    </button>

                                                    <input type="hidden" name="id_usuario" value="<?php echo $_SESSION['ID'] ?>">
                                                    <input type="hidden" name="id_cliente" value="">
                                                    <input type="hidden" name="id_historia" value="">
                                                    <input type="hidden" name="tipo_historia" value="">


                                                    <input type="hidden" name="tipo_cliente" valur="1">
                                                    <input type="hidden" name="tipo" value="1">

                                                </form>
                                            </div>


                                        </div>
                                    </div>

                                    <form action="totalizarFacturaPOS.php" method="POST" id="FormularioTotalizarFactura"  enctype="multipart/form-data">
                                        
                                    <div class="card collapsed-card">
                                        <div class="card-header bg-info rounded" data-card-widget="collapse">
                                            <h3 class="card-title">Adjuntar Receta</h3>
                                            <div class="card-tools">
                                                <button type="button" class="btn btn-lg btn-tool" data-card-widget="collapse">
                                                    <i class="fas fa-plus text-white"></i>
                                                </button>
                                            </div>
                                        </div>
                                        <div class="card-body" style="display: none;">
                                            <div class="form-group">
                                                
                                            <label>Documentos</label> <br>
                                            <input type="file" name="Documentos[]" multiple />

                                            </div>
                                        </div>
                                    </div>


                                    
                                        <label> Monto Pendiente </label>

                                        <?php

                                        $pendiente = round($total - $totalMet, 2);
                                        if ($pendiente < 0) {
                                            $pendiente = 0;
                                        }
                                        ?>

                                        <input type="number" name="montoPendiente" placeholder="Monto Pagado" class="form-control input-lg" step="0.01" value="<?= $pendiente; ?>" readonly> <br>

                                        <label> Fecha de vencimiento</label>
                                        <input type="date" name="fechaVencimiento" placeholder="fecha Vencimiento" class="form-control input-lg" value="<?= date('Y-m-d'); ?>" required>
                                        <br>

                                        <button type="submit" class="btn btn-lg btn-block btn-outline-danger rounded-pill">
                                            <i class="fas fa-dollar-sign mr-1"></i>
                                            Totalizar Factura
                                        </button>






                                        <input type="hidden" name="id_usuario" id="id_usuario_totalizar" value="<?php echo $_SESSION['ID'] ?>">
                                        <input type="hidden" name="historia" value="">
                                        <input type="hidden" name="tipo_historia" value="">
                                        <input type="hidden" name="tipo_cliente" valur="1">
                                        <input type="hidden" name="tipo" value="1">
                                        <input type="hidden" name="nota" value="">
                                        <input type="hidden" name="id_cliente" value="">
                                        <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id;?>">
                                        <input type="hidden" name="PuntoPOS_id" id="PuntoPOS_id" value="<?php echo $_SESSION['POS'];?>">
                                    </form>

                                </div>
                            </div>
                        </div>

                        <div class="tab-pane" id="clients">
                            <form id="nuevoClienteForm" class="row">
                                <div class="form-group col-md-6">
                                    <label for="">Nombre Completo</label>
                                    <input type="text" name="datos[nombre_cliente]" class="form-control input-lg" required placeholder="Nombre Completo">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Documento</label>
                                    <input type="number" name="datos[CODI_CLIENTE]" id = "CODI_CLIENTE" class="form-control input-lg" required placeholder="Documento">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Teléfono</label>
                                    <input type="number" name="datos[whatsapp]" class="form-control input-lg" required placeholder="Teléfono">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="">Correo</label>
                                    <input type="mail" name="datos[correo_cliente]" class="form-control input-lg" required placeholder="Correo">
                                </div>

                                <div class="form-group col-md-6">
                                    <label for="">Dirección</label>
                                    <input type="text" name="datos[direccion_cliente]" class="form-control input-lg" required placeholder="Dirección">
                                </div>
                                <div class="form-group col-md-12 center text-center">
                                    <button class="btn btn-lg btn-outline-info rounded-pill btn-lg" type="submit" onclick="$('#nuevoClienteForm').automaticForm({type:1,idUpdate:0,table:'cliente',db:'medicaso_ps_bo1080',reload:'',page:'pos'})">
                                        <i class="fas fa-plus mr-1"></i>
                                        Guardar Cliente
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
                <div class="card-footer">

                </div>
            </div>
        </div>

        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>






<!-- Modal Existencias Depositos-->
<div class="modal fade" id="miModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detalles del Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="tablaProductos" class="table">
          <thead>
            <tr>
              <th>Depósito</th>
              <th>Existencias</th>
              <th>Más Información</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td id="deposito"></td>
              <td id="existencias"></td>
              <td id="masInformacion"></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>


<!-- /.content-wrapper -->
<?php
include 'footer.php';
?>

<?php 
  //Seriales Productos Simples Parte 2/2
  $Tabla_id_Formulario = 'totalizarFactura';
  include 'IN_IncludeSerialesDetallesJS.php'; 

?>

<?php

if (!isset($_SESSION['POS']) || $_SESSION['POS'] == 0) {
    //echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<style>
    .blurCampo {
        filter: blur(5px); /* Ajusta el valor de blur según tus preferencias */
        pointer-events: none;
    }
    </style>

    <script>
            Swal.fire({
                title: "Iniciar Sesión en POS",
                text: "Debe Iniciar Sesión con la Lista POS Para Acceder a Esta Función.",
                icon: "warning",
                confirmButtonText: "Aceptar",
                customClass: {
                    confirmButton: "btn btn-outline-info rounded-pill shadow",
                    cancelButton: "btn btn-outline-danger rounded-pill shadow"
                },
            }).then(function() {
                
            });

            var salesDiv = document.getElementById("sales");
            if (salesDiv) {
                salesDiv.classList.add("blurCampo");
            }

          </script>';
}else{
    //importante para realizar la apertura de la caja
    $UsuarioAperturaCaja=$_SESSION['ID'];
    $POSAperturaCaja=$_SESSION['POS'];
    include 'IncludeAperturaCaja.php';
}

?>

<?php

// para tokenAutomaticForm
// function tokenAutomaticForm(texto, usuario, numeros, type, table, idUpdate, reload, page, formulario)
$ttext = base64_encode(base64_encode($_SESSION['ID'] . ' - ' . $_SESSION['NOMBRE_USUARIO'] . ', Necesita un Código de Autenticación Para Facturar Existencias Negativas'));
$tnumeros = base64_encode(base64_encode(funcionMaster($_SESSION['ID'], 'ID_Usuario', 'whatsapp', 'config')));
                          
$tuser = base64_encode(base64_encode($_SESSION['ID']));

?>

<script>
    /*
    function cargarcosto() {
        var codigoProd = $("#codigoProd").val();
        var usuario_id = $("#usuario_id").val();

        $.ajax({
            type: "POST",
            url: "Ajax_PrecioProductoFactura.php",
            data: {
                codigoProd: codigoProd,
                usuario_id: usuario_id
            },
            success: function(response) {
                $('#div-results-costo').html(response);
            }
        });
    };
    */
</script>

<script>
    function multiplicar() {

        var descuentos = $("#descuento").val();
        var maxDescuentoPorcentaje = parseFloat($("#Max_Descuento").val());

        m1 = document.getElementById("1").value;
        m2 = document.getElementById("2").value;
        r = m1 * m2;

        //console.log(descuentos);

        descuentos_final = 0;
        if (descuentos != null) {
            var existe = 0;
            var valor = descuentos.match(/%/g);
            if (valor) {
                existe = valor.length;
            }
            //console.log("existe "+existe+" estado "+valor);

            if (existe > 0) {
                /*
                descuentos = descuentos.replace('%', ' ');

                descuentos = parseFloat(descuentos);

                descuentos = (descuentos / 100);
                descuentos_final = r * descuentos;
                */

                descuentos = descuentos.replace('%', ' ');
                descuentos = parseFloat(descuentos) / 100;

                // Verificar si el descuento supera el máximo permitido
                console.log(descuentos+" "+maxDescuentoPorcentaje);
                if ((descuentos > (maxDescuentoPorcentaje / 100)) && maxDescuentoPorcentaje!="0") {
                    alert("El Descuento Supera el Máximo Permitido. Máximo ["+maxDescuentoPorcentaje+"%] | Actual ["+descuentos+"%]");
                    //$("#descuento").val('0');
                    $("#descuento").val('0');
                    return; // Detener la ejecución
                }

                descuentos_final = r * descuentos;



                

            } else {
                //descuentos_final = descuentos;

                descuentos = parseFloat(descuentos);

                // Convertir el valor numérico en un porcentaje
                var porcentaje = (descuentos / r) * 100;
                console.log(porcentaje);
                // Verificar si el descuento en porcentaje supera el máximo permitido
                if ((porcentaje > maxDescuentoPorcentaje)&& maxDescuentoPorcentaje!="0") {
                    alert("El Descuento Supera el Máximo Permitido. Máximo ["+maxDescuentoPorcentaje+"%] | Actual ["+porcentaje.toFixed(2)+"%]");
                    $("#descuento").val('0');
                    return; // Detener la ejecución
                }

                descuentos_final = (porcentaje / 100) * r;



            }
        }


        r = (r - descuentos_final).toFixed(2);
        //console.log(r);

        document.getElementById("3").value = r;
    }
</script>

<script>
    function EliminarMedioPago(id) {
        
        $.ajax({
            type: "POST",
            url: "Ajax_EliminarMedioPago.php",
            data: {
                id:id,
                Tipo_Consulta: "Eliminar Medio Pago"
            },
            success: function(response) {
                //console.log(response);
                window.location.reload();
            }
        });
        
        }
</script>

<script>
    /*
    function ValidarInput(campo) {
        if (!campo.checkValidity()) {
            campo.value = campo.value.slice(0, -1);
        }
        var existe = 0;
        var valor = campo.value.match(/\x2E/g);
        if (valor) {
            existe = valor.length;
        }

        var existe1 = 0;
        var valor = campo.value.match(/%/g);
        if (valor) {
            existe1 = valor.length;
        }

        if (existe > 1 || existe1.length > 1) {
            campo.value = campo.value.slice(0, -1);
        }

        if (campo.value.charAt(campo.value.length - 2) == '%') {
            campo.value = campo.value.slice(0, -1);
        }
        //console.log(existe+" "+existe1);
        //console.log(campo.value);

        //multiplicar();
    }
    */
    function validarDescuento(input) {
  // Patrón regex para validar el descuento
  var patron = /^(\d+(\.\d{0,2})?%?|\.\d{1,2}%)$/;

  if (patron.test(input)) {
    return true; // El descuento es válido
  } else {
    return false; // El descuento no es válido
  }
}

// Función para manejar el evento oninput
function onDescuentoInput(inputElement) {
  var valor = inputElement.value;
  var nuevoValor = "";

  for (var i = 0; i < valor.length; i++) {
    var caracter = valor[i];

    if (validarDescuento(nuevoValor + caracter)) {
      nuevoValor += caracter;
    }
  }

  inputElement.value = nuevoValor;
}

</script>

<script>
    function idCliente(val) {
        document.querySelectorAll('[name="id_cliente"]').forEach(element => {
            element.value = val;
        })
        window.location.href = "pos?cI=<?= salt() ?>" + btoa(val);
    }
    $(document).ready(function() {
        let idCliente = '<?= decrypt($_GET['cI']) ?>';
        if (idCliente != null && idCliente != '') {
            document.querySelectorAll('[name="id_cliente"]').forEach(element => {
                element.value = idCliente;

                // Comprueba si el elemento es un select y ejecuta select() si lo es
                if (element.tagName === 'SELECT') {
                    $(element).select2();
                }

            })
        }

    })
</script>
<script>
    function idNota(val) {
        document.querySelectorAll('[name="nota"]').forEach(element => {
            element.value = val;
        })
    }
    $(document).ready(function() {
        idNota(document.getElementById('nota').value);
    })
</script>



<script>

function CargarPrecioProducto() {
    var codigoProd = $("#codigoProd").val();
    var deposito = $("#deposito").val();

    ////////////////////////// EVITAR ERRORES ///////////////
    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    DivCampoPersonalizado.innerHTML = "";
    $('#2').val("");
    $('#1').val("1");
    $('#descuento').val("0");
    document.getElementById('informacion_existencia').innerHTML = "";
    /////////////////////////////////////////////////////////


    if(codigoProd != ""){
    $.ajax({
      type: "POST",
      url: "FA_Ajax_CargarPrecioYLista.php",
      data: {
        codigoProd: codigoProd,
        deposito: deposito,
        Tipo_Consulta: "Cargar Precio"
      },
      success: function(response) {




        var Respuesta = JSON.parse(response);
        //console.log (Respuesta);

        //modal de existencias
        var BotonExistencias = `<button type="button" data-toggle="modal" data-target="#miModal" style="border: none;border-radius: 20px;" onclick="ConsultarExistencias(`+codigoProd+`);"><i class="fa fa-search"></i></button>`;

        // codigo para el apartado de lotes
        if(Respuesta.Lista == true && Respuesta.Tipo == "Lotes"){

        var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
        // Crea el elemento select
        var selectElement = document.createElement('select');
        selectElement.className = "form-control input-lg";
        selectElement.setAttribute('required', 'required');
        selectElement.setAttribute('name', 'SinvDep_id');
        selectElement.setAttribute('width', '100%');

        var optionElement = document.createElement('option');
        optionElement.value = '';
        optionElement.textContent = 'Seleccione';
        selectElement.appendChild(optionElement);

        // Crea el elemento label
        var labelElement = document.createElement('label');
        labelElement.textContent = 'Lotes';

        DivCampoPersonalizado.appendChild(labelElement);
        DivCampoPersonalizado.appendChild(document.createElement('br'));

        var Options = Respuesta.Detalles;
        //console.log(Options);
        // Recorre el JSON y agrega opciones al select
        Object.keys(Options).forEach(function(key) {
          var item = Options[key];
          var optionElement = document.createElement('option');
          optionElement.value = item.id;
          optionElement.textContent = item.Nombre+` [${item.Existencia}] [${item.Vencimiento}] `;
          optionElement.dataset.existencias = item.Existencia;
          
          if (parseInt(item.Existencia) <= 0) {
            //optionElement.disabled = true;
            optionElement.style.backgroundColor = '#ff00004d';
          }
          // Obtiene la fecha de hoy
            var fechaHoy = new Date();
            var fechaSeleccionada = new Date(item.Vencimiento);
            // Compara las fechas
            if (fechaSeleccionada <= fechaHoy) {
                optionElement.disabled = true;
            }

          selectElement.appendChild(optionElement);
        });

        // Agrega la función onchange al select
        selectElement.onchange = function() {
          var selectedOption = this.options[this.selectedIndex];
          var existencias = selectedOption.dataset.existencias;

          //////////////////////////////////////////////////////////////////////////
          var Mensaje = "Existencia Disponible: <u><b>"+existencias+"</b></u>";
          
          //info de las existencias informacion_existencia
          document.getElementById('informacion_existencia').innerHTML = Mensaje+BotonExistencias;
          ///////////////////////////////////////////////////////////////////////////
          // Establecer el valor máximo para el elemento con id=1 que es el campo cantidad
          //var elemento1 = document.getElementById('1');
          // elemento1.max = existencias;
        };

        DivCampoPersonalizado.appendChild(selectElement);

      }
      //codigo para el apartado de producto simple
      else if(Respuesta.Tipo == "Simple"){
        
        var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
        var Options = Respuesta.Detalles;
        //console.log(Options);

        // Crea el elemento input hidden
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id');
        
        Object.keys(Options).forEach(function(key) {
          var item = Options[key];
          input.value = item.id;

          //var elemento1 = document.getElementById('1');
          //elemento1.max = item.Existencia;

          ////////////////////
          var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          document.getElementById('informacion_existencia').innerHTML = Mensaje+BotonExistencias;
          //////////////////////

        });
        DivCampoPersonalizado.appendChild(input);
        
      }
      //codigo para el apartado del producto compuesto
      else if(Respuesta.Tipo == "Compuesto"){
        
        var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
        var Options = Respuesta.Detalles;
        //console.log(Options);
        // Crea el elemento input hidden
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id');

        var labelElement = document.createElement('label');
        
        Object.keys(Options).forEach(function(key) {
          var item = Options[key];
          input.value = "0";

          //var elemento1 = document.getElementById('1');
          //elemento1.max = item.Existencia;
          labelElement.textContent = item.Nombre;

          ////////////////////
          var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          document.getElementById('informacion_existencia').innerHTML = Mensaje;
          //////////////////////

        });
        
        DivCampoPersonalizado.appendChild(input);
        DivCampoPersonalizado.appendChild(labelElement);
      }
      else if(Respuesta.Tipo == "Servicio"){
        
        var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
        var Options = Respuesta.Detalles;
        //console.log(Options);

        // Crea el elemento input hidden
        var input = document.createElement('input');
        input.setAttribute('type', 'hidden');
        input.setAttribute('name', 'SinvDep_id');
        
        input.value = "0";
        ////////////////////
        var Mensaje = "<u><b>Servicio</b></u>";
        document.getElementById('informacion_existencia').innerHTML = Mensaje;
        //////////////////////

        DivCampoPersonalizado.appendChild(input);

      }
      // si no tiene un tipo de clasificacion nos indicara este error
      else if(Respuesta.Tipo == "Error"){
        
        alert('el tipo del producto tiene un error con la clasificacion del inventario o no existe el registro para el deposito elegido');
        ActualizacionDeposito();
      }


        $('#2').val(Respuesta.Precio);
        multiplicar();
      }
    });
  }
  else{
    $("#codigoProd").val("").trigger('change');
  }

}

function ActualizacionDeposito(){

var divPersonalizado = document.getElementById('Campo_Adicional_Producto');
divPersonalizado.innerHTML = "";
$('#2').val("");
$('#1').val("1");
$('#descuento').val("0");
$('#3').val("");
//document.getElementById('1').removeAttribute('max');
$("#codigoProd").val("").trigger('change');

}
//////////////////////////////////////
//////////////////////////////////////Validar Existencias //////////////////////////////////////
// si no necesitan validar las existencias comentar este codigo
document.getElementById('FormularioTotalizarFactura').addEventListener('submit', function(event) {
  event.preventDefault(); // Detiene el envío predeterminado del formulario
  
  var usuario_id = $("#id_usuario_totalizar").val();
  var cliente_id = "0";// solo aplica asi  para el pos
  var deposito = $("#Deposito_id").val();
  var tipo ="1";//1-> Factura General | revisar el campo tipo de soperacioninv
  $.ajax({
      type: "POST",
      url: "FA_Ajax_VerificarCantidadesAFacturar.php",
      data: {
        usuario_id: usuario_id,
        cliente_id: cliente_id,
        deposito:deposito,
        tipo:tipo,
        Tipo_Consulta: "Verificar Existencia"
      },
      success: function(response) {
        //console.log(response);
        var Respuesta = JSON.parse(response);
        var Detalles = Respuesta.Detalles;
        if(Respuesta.Enviar==false){
          
            

            if(Respuesta.FiltroExistenciasNegativas=="No Facturar"){
                var Mensaje = "";
                var MensajeEstatico = "";
                Object.keys(Detalles).forEach(function(key) {
                    var item = Detalles[key];
                    if(item.Estado==false){
                    Mensaje += item.Nombre+": ";
                    Mensaje += "\r\nExistencias: "+item.Existencia+"\r\n";
                    Mensaje += "Existencias a descontar en la factura actual: "+item.Descontar+" .\r\n";
                    MensajeEstatico += item.Motivo;

                    
                    }
                });

                Mensaje = Mensaje+" "+MensajeEstatico;

                alert(Mensaje);


            }else if(Respuesta.FiltroExistenciasNegativas=="Facturar"){
                document.getElementById('FormularioTotalizarFactura').submit();
            }else if(Respuesta.FiltroExistenciasNegativas=="Token"){
                //tokenMaster('<?= $ttext ?>', '<?= $tuser ?>', '<?= $tnumeros ?>');

                tokenMaster('<?= $ttext ?>', '<?= $tuser ?>', '<?= $tnumeros ?>').then((isTokenConfirmed) => {
                    if (isTokenConfirmed) {
                        //console.log('paso');
                        document.getElementById('FormularioTotalizarFactura').submit();
                    } else {
                        //console.log('no paso');
                        //document.getElementById('FormularioTotalizarFactura').submit();
                    }
                });

                //$('#FormularioTotalizarFactura').automaticForm({type: 1,table: 'sOperacionInv', token: 'si', tokenText: '<?= $ttext ?> ', tokenUser: '<?= $tuser ?>', tokenNumbers: '<?= $tnumeros ?>', reload:'', page: 'totalizarFacturaPOS.php', post: true});
            }


          
        }
        else{
          //alert("Existencia Disponible");
          document.getElementById('FormularioTotalizarFactura').submit();
        }
      }
    });
  
});
//////////////////////////////////////Validar Existencias //////////////////////////////////////
</script>
<script>
function ConsultarExistencias(value){

    var productoId = value;

        $.ajax({
          type: 'POST',
          url: 'FA_Ajax_CargarExistencias.php', // Reemplaza con la URL de tu script PHP que maneja la solicitud AJAX
          data: {
            id: productoId,
            Tipo_Consulta: "Consultar Existencias"
        },
          success: function(data) {
            var productos = JSON.parse(data);

             // Limpia la tabla antes de agregar nuevos datos
             $('#tablaProductos tbody').empty();

            // Recorre los productos y agrega cada uno a la tabla
            for (var key in productos) {
                if (productos.hasOwnProperty(key)) {
                    var producto = productos[key];
                    $('#tablaProductos tbody').append(
                    '<tr>' +
                        '<td>' + producto.Deposito + '</td>' +
                        '<td>' + producto.Existencia + '</td>' +
                        '<td>' + producto.Mas_Informacion + '</td>' +
                    '</tr>'
                    );
                }
            }


          },
          error: function() {
            alert('Hubo un error al obtener los datos del producto.');
          }
        });

}
$("#CODI_CLIENTE").on('change', function() {
    VerificarDocumento(this.value);
});
function VerificarDocumento(valor) {
    var CODI_CLIENTE = valor;
    $.ajax({
        type: "POST",
        url: "Ajax_VerificarDocumento.php",
        data: {
            CODI_CLIENTE: CODI_CLIENTE,
        },
        dataType: "json", // Especifica que esperas una respuesta en formato JSON
        success: function(response) {
            if (response.Encontrado) {
                // Mostrar un mensaje de éxito
                Swal.fire({
                    title: "Éxito",
                    text: response.mensaje,
                    icon: "success",
                }).then(() => {
                    // Recargar la página actual después de hacer clic en "OK"
                    location.reload();
                });
            }
        }
    });
};

</script>

