<?php
if (isset($_POST['key'])) {
    include 'funciones/funciones.php';
    header("Content-Type: application/json; charset=UTF-8");
    $cliente_id = preparePost($_POST['cliente_id']);
    if (isset($_POST['key']) && $_POST['key'] == 'addItem') {

        $procedimiento = preparePost($_POST['codigoProd']);
        $valor = preparePost($_POST['valor']);
        $array = [
            'status' => false
        ];

        $SinvDep_id = $_POST['SinvDep_id'];
        if($SinvDep_id==""){$SinvDep_id="0";}
        $Deposito_id = $_POST['dep'];

        

        $producto = mysqli_query($conn3, "SELECT descripcion FROM sinvetrios WHERE ID = '{$procedimiento}'");
        if ($producto) {
            $producto = $producto->fetch_assoc();

            ////////////////////apartado iva
            $iva = funcionMaster($procedimiento, 'ID', 'iva', 'sinvetrios');
            if($iva!="" AND $iva != "0") {
                // Calcular el monto del IVA
                $ivaMonto = round((($valor * $iva) / 100),2);

                // Sumar el monto del IVA al subtotal
                $totalConIva = round($valor + $ivaMonto,2);
            }else{
                $iva=0;
                $ivaMonto=0;
                $totalConIva = $valor;  
            }
            //////////////////////////////////

            $prepare = preparePost([
                'idOperacion' => 0,
                'fechaRegistro' => Date('Y-m-d H:i:s'),
                'idProducto' => $procedimiento,
                'cantidad' => 1,
                'descripcion' => $producto['descripcion'],
                'base' => $valor,
                'impuesto' => 0,
                'totalbase' => $valor,
                'subTotal' => $valor,
                'id_usuario' => $_POST['usuario_id'],
                'id_cliente' => $cliente_id,
                'tipo' => 4,
                'SinvDep_id'=> $SinvDep_id,
                'Deposito_id'=> $Deposito_id,

                'Impuesto_Numerico'=> $ivaMonto,
                'Impuesto_Textual'=> $iva,
                'Total'=> $totalConIva,

            ]);
            $insert = mysqli_query($conn3, "INSERT INTO sDetalleOperPendites SET {$prepare}") or die(mysqli_error($conn3));
            if ($insert) {
                $array['status'] = true;
            }
        }
        echo json_encode($array);
        exit();
    }

    if (isset($_POST['key']) && $_POST['key'] == 'removeItem') {
        $procedimiento = preparePost($_POST['id']);
        $array = [
            'status' => false
        ];
        $producto = mysqli_query($conn3, "UPDATE sDetalleOperPendites set estado = 0 WHERE ID = '{$procedimiento}'");
        if ($producto) {
            $array['status'] = true;
        }
        echo json_encode($array);
        exit();
    }

    if (isset($_POST['key']) && $_POST['key'] == 'cargaData') {
        $array = [
            'status' => true,
            'data' => []
        ];
        $items = mysqli_query($conn3, "SELECT descripcion, subTotal, id,Total FROM sDetalleOperPendites WHERE estado = 1 AND tipo = 4 AND id_cliente = '{$cliente_id}'");
        $nrow = mysqli_num_rows($items);
        if ($nrow > 0) {
            while ($item = $items->fetch_assoc()) {
                $array['data'][] = $item;
            }
        } else {
            $array['data'][0] = [
                "descripcion" => '-- --',
                "subTotal" => 0,
                "id" => 0
            ];
        }
        echo json_encode($array);
        exit();
    }

    if (isset($_POST['key']) && $_POST['key'] == 'cargaPrecio') {
        $array = [
            'status' => true,
            'data' => []
        ];
        $id = preparePost(['ID' => $_POST['id']]);
        $items = mysqli_query($conn3, "SELECT precio FROM sinvetrios WHERE {$id}");
        $nrow = mysqli_num_rows($items);
        if ($nrow > 0) {
            while ($item = $items->fetch_assoc()) {
                $array['data'][] = $item;
            }
        } else {
            $array['data'][0] = [
                "precio" => 0,
            ];
        }
        echo json_encode($array);
        exit();
    }
}
include 'header.php';
include 'menu.php';
$conn3 = mysqli_connect($host, $userdb, $pass2, $DB) or die('Ha fallado la conexion MySQL: ' . mysqli_error($conn3));

if (isset($_POST['finalizado'])) {
    $clienteId               = preparePost($_POST['cliente_id']);
    $id_usuario              = preparePost($_POST['usuario_id']);
    $config = mysqli_query($conn3, "SELECT moneda, impuestoF FROM config where ID_Usuario = '{$id_usuario}'") or die(mysqli_error($conn3));
    $nrow = mysqli_num_rows($config);
    if ($nrow > 0) {
        $config = $config->fetch_assoc();
    }
    $usuario = mysqli_query($conn3, "SELECT numeroPresupuesto FROM usuarios where ID = '{$id_usuario}'") or die(mysqli_error($conn3));
    $nrow = mysqli_num_rows($usuario);
    if ($nrow > 0) {
        $usuario = $usuario->fetch_assoc();
    }
    $totales = mysqli_query($conn3, "SELECT SUM(totalbase) as sumTotalbase, SUM(base) as sumBase, SUM(cantidad) as sumCantidad, SUM(subTotal) 
    as sumSubTotal,SUM(Impuesto_Numerico) as sumImpuesto,SUM(Total) as sumTotal  from sDetalleOperPendites where estado = 1 and id_usuario = '{$id_usuario}' and id_cliente = '{$clienteId}' AND tipo = 4 order by id") or die(mysqli_error($conn3));
   
    $nrowl = mysqli_num_rows($totales);
    while ($rowMotorizado = mysqli_fetch_array($totales)) {
        $sumBase        = $rowMotorizado['sumBase'];
        $sumCantidad    = $rowMotorizado['sumCantidad'];
        $sumSubTotal    = $rowMotorizado['sumSubTotal'];
        $sumTotalbase		= $rowMotorizado['sumTotalbase'];

        $sumImpuesto = $rowMotorizado['sumImpuesto'];
		$sumTotal = $rowMotorizado['sumTotal'];
    }
    /*
    $total1="0";//?
    if ($config['impuestoF'] > 0) {
        $impuestoF2 = $config['impuestoF'] / 100;
        $total1 =  $sumSubTotal * $impuestoF2;
        $total =  $total1 + $sumSubTotal;
    } else {
        $total =  $sumSubTotal;
    }
    */
    if($sumImpuesto==""){$sumImpuesto=0;}
	$impuestoF=0;

    $usuario['numeroPresupuesto']++;

    
    $Deposito_id = $_POST['Deposito_id'];
    if($Deposito_id==""){
        $Deposito_id="0";
    }
    /*
    $prepare = preparePost([
        "numeroDoc" => $usuario['numeroPresupuesto'],
        "idCliente" => $clienteId,
        "idEmpresa" => $id_usuario,
        "fechaOperacion" => $_POST['fecha'],
        "fechaVencimiento" => Date("Y-m-d H:i:s"),
        "seriaOperacion" => 0,
        "impuesto" => $config['impuestoF'],
        "impuestoBase" => $total1,
        "totalNeto" => $total,
        "totalBruto" => $sumTotalbase,
        "cantidadProduc" => $sumCantidad,
        "descuentos" => 0,
        "montoPagado" => 0,
        "nota" => '',
        "sucursal" => $_POST['sucursal'],
        "tercioSuperior" => $_POST['tercioSuperior'],
        "tercioMedio" => $_POST['tercioMedio'],
        "tercioInferior" => $_POST['tercioInferior'],
        "cuelloEscote" => $_POST['cuelloEscote'],
        "pie" => $_POST['pie'],
        "objetivos" => $_POST['objetivos'],
        "tipo" => 4,
        "Deposito_id"=> $Deposito_id
    ]);
    */
    $prepare = preparePost([
        "numeroDoc" => $usuario['numeroPresupuesto'],
        "idCliente" => $clienteId,
        "idEmpresa" => $id_usuario,
        "fechaOperacion" => $_POST['fecha'],
        "fechaVencimiento" => Date("Y-m-d H:i:s"),
        "seriaOperacion" => 0,
        "impuesto" => $impuestoF,
        "impuestoBase" => $sumImpuesto,
        "totalNeto" => $sumTotal,
        "totalBruto" => $sumTotalbase,
        "cantidadProduc" => $sumCantidad,
        "descuentos" => 0,
        "montoPagado" => 0,
        "nota" => '',
        "sucursal" => $_POST['sucursal'],
        "tercioSuperior" => $_POST['tercioSuperior'],
        "tercioMedio" => $_POST['tercioMedio'],
        "tercioInferior" => $_POST['tercioInferior'],
        "cuelloEscote" => $_POST['cuelloEscote'],
        "pie" => $_POST['pie'],
        "objetivos" => $_POST['objetivos'],
        "tipo" => 4,
        "Deposito_id"=> $Deposito_id
    ]);
    $insert = mysqli_query($conn3, "INSERT INTO sOperacionInv SET {$prepare}") or die(mysqli_error($conn3));
    // echo "INSERT INTO sOperacionInv SET {$prepare}";

    $idOperacion = mysqli_insert_id($conn3);

    if ($insert) {

        include 'FA_Include_ValidacionExistenciasProductos.php';
        
        $update = mysqli_query($conn3, "UPDATE usuarios SET numeroPresupuesto = '{$usuario['numeroPresupuesto']}' WHERE ID = '{$id_usuario}';") 
        or die(mysqli_error($conn3));
        //$operacionInc = mysqli_query($conn3, "SELECT idOperacion FROM sOperacionInv WHERE numeroDoc = '{$usuario['numeroPresupuesto']}' AND tipo = '4'") or die(mysqli_error($conn3));
        $operacionInc = mysqli_query($conn3, "SELECT idOperacion FROM sOperacionInv WHERE idOperacion = '{$idOperacion}' AND tipo = '4'") or die(mysqli_error($conn3));
        $nrow = mysqli_num_rows($operacionInc);
        if ($nrow > 0) {
            $operacionInc = $operacionInc->fetch_assoc();
        }
        $queryList = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites WHERE estado = 1 AND id_usuario = '{$id_usuario}' AND id_cliente = '{$clienteId}' AND tipo = 4") or die(mysqli_error($conn3));
        $nrowl = mysqli_num_rows($queryList);
        while ($rowMotorizado = mysqli_fetch_array($queryList)) {
            $id                = $rowMotorizado['id'];

            
			$Deposito_id = $rowMotorizado['Deposito_id'];
			$SinvDep_id = $rowMotorizado['SinvDep_id'];
			//aqui llama a la funcion MasDetalles Para traer informacion adicional del producto ya sea el lote o los productos que contiene el producto compuesto
			$Mas_Detalles = mysqli_real_escape_string($conn3,MasDetalles($rowMotorizado['idProducto'], $SinvDep_id));
            
            $Impuesto_Numerico = $rowMotorizado['Impuesto_Numerico'];
            $Impuesto_Textual  = $rowMotorizado['Impuesto_Textual'];
            $Total = $rowMotorizado['Total'];

            $prepare = preparePost([
                "idOperacion" => $operacionInc['idOperacion'],
                "fechaRegistro" => Date("Y-m-d H:i:s"),
                "idProducto" =>  $rowMotorizado['idProducto'],
                "cantidad" => $rowMotorizado['cantidad'],
                "descripcion" => $rowMotorizado['descripcion'],
                "base" => $rowMotorizado['base'],
                "impuesto" => 0,
                "totalbase" => $rowMotorizado['totalbase'],
                "subTotal" => $rowMotorizado['subTotal'],
                "id_usuario" => $id_usuario,
                "id_cliente" => $clienteId,
                "SinvDep_id"=>$SinvDep_id,
                "Deposito_id"=>$Deposito_id,
                "Mas_Detalles"=>$Mas_Detalles,

                "Impuesto_Numerico"=>$Impuesto_Numerico,
                "Impuesto_Textual"=>$Impuesto_Textual,
                "Total"=>$Total,

            ]);
            $insertProd = mysqli_query($conn3, "INSERT INTO sDetalleOper SET {$prepare};") or die(mysqli_error($conn3));
            if ($insertProd) {
                mysqli_query($conn3, "UPDATE sDetalleOperPendites SET estado = 2 WHERE id = '{$id}'") or die(mysqli_error($conn3));
            }
        }
        echo "<script>window.location.href='preliminarPresupuestoFacial?idOperacion={$operacionInc['idOperacion']}'</script>";
    } else {
        echo "<script>window.location.href='presupuestoFacial?clienteId={$clienteId}'</script>";
    }
    exit();
} else {
    $clienteId = preparePost($_GET['clienteId']);
    $cliente = mysqli_query($conn3, "SELECT * FROM cliente where cliente_id = '{$clienteId}'");
    $config = mysqli_query($conn3, "SELECT * FROM config where ID_usuario = '{$_SESSION['ID']}'");
    $nrow = mysqli_num_rows($cliente);
    if ($nrow > 0) {
        $cliente = $cliente->fetch_assoc();
        $config = $config->fetch_assoc();
    }
}


//////////////////////////////////////////////////////////////////////////////////////////////////////////////
$cliente_id = $_GET['clienteId'];
$usuario_id = $_SESSION['ID'];
//esto se usara para el apartado de la lista del deposito y en un campo hidden para totalizar la factura
$Deposito_id="0";
$resultado = mysqli_query($conn3, "SELECT * FROM  sDetalleOperPendites where estado = 1 and  id_usuario =$usuario_id and  id_cliente = $cliente_id AND tipo = '4' order by id");
while ($fila = mysqli_fetch_array($resultado)) {
    $Deposito_id=$fila["Deposito_id"];
}
if($Deposito_id!="0" AND $Deposito_id!=""){
    $DesabilitarDep="readonly";
}
//////////////////////////////////////////////////////////////////////////////////////////////////////////////

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper p-3">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Presupuesto Facial
        </h1>
        <ol class="breadcrumb">
            <li><a href="portada"><i class="fa fa-dashboard"></i> Escritorio </a></li>
            <li><a href="#">Presupuesto Facial</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div>
            <div class="col-xs-12">
                <div class="box">
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="col-md-12">
                            <form action="./presupuestoFacial.php" method="post">
                                <div class="row">

                                        <div class="col-md-4">
                                            <label for="nombrePaciente">Nombre del Paciente</label>
                                            <input type="text" name="nombrePaciente" id="nombrePaciente" class="form-control input-lg" value="<?= $cliente['nombre_cliente'] ?>" readonly>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="fecha">Fecha</label>
                                            <input type="date" name="fecha" id="fecha" class="form-control input-lg" value="<?= Date("Y-m-d"); ?>">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="sucursal">Sucursal</label>
                                            <input type="text" name="sucursal" id="sucursal" class="form-control input-lg" value="<?= funcionMaster($cliente['sucursal'], 'id', 'descripcion', 'sucursales'); ?>">
                                        </div>

                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <style type="text/css">
                                    .areas {
                                        display: flex;
                                        justify-content: flex-end;
                                        align-items: center;
                                        font-size: 1em;
                                        font-weight: bold;
                                        border-bottom: 1px solid #000;
                                        text-transform: uppercase;
                                        cursor: pointer;
                                        z-index: 10000;
                                    }

                                    .areas.active {
                                        background-color: #b6b7b62b;
                                    }

                                    .areas:hover {
                                        background-color: #b6b7b62b;
                                    }

                                    .areas:nth-child(1) {
                                        height: 185px;
                                    }

                                    .areas:nth-child(2) {
                                        height: 30px;
                                    }

                                    .areas:nth-child(3) {
                                        height: 50px;
                                    }

                                    .areas:nth-child(4) {
                                        height: 45px;
                                    }

                                    .areas:nth-child(5) {
                                        height: 45px;
                                        border: none;
                                    }

                                    .textarea-ocultar {
                                        display: none;
                                    }
                                </style>
                                <div class="row">
                                    
                                        <div class="col-md-8">
                                            <div class="col-md-6 tercioSuperiorTextarea">
                                                <label for="tercioSuperior">Tercio Superior</label>
                                                <textarea name="tercioSuperior" id="tercioSuperior" class="form-control input-lg" style="width: 100%; height: 150px;"></textarea>
                                            </div>
                                            <div class="col-md-6 tercioMedioTextarea">
                                                <label for="tercioMedio">Tercio Medio</label>
                                                <textarea name="tercioMedio" id="tercioMedio" class="form-control input-lg" style="width: 100%; height: 150px;"></textarea>
                                            </div>
                                            <div class="col-md-6 tercioInferiorTextarea">
                                                <label for="tercioInferior">Tercio Inferior</label>
                                                <textarea name="tercioInferior" id="tercioInferior" class="form-control input-lg" style="width: 100%; height: 150px;"></textarea>
                                            </div>
                                            <div class="col-md-6 cuelloEscoteTextarea">
                                                <label for="cuelloEscote">Cuello y Escote</label>
                                                <textarea name="cuelloEscote" id="cuelloEscote" class="form-control input-lg" style="width: 100%; height: 150px;"></textarea>
                                            </div>
                                            <div class="col-md-12 pieTextarea">
                                                <label for="pie">Piel</label>
                                                <textarea name="pie" id="pie" class="form-control input-lg" style="width: 100%; height: 150px;"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12" style="margin: 0; padding: 0; position: relative;">
                                                    <div class="col-md-12 areas active" id="tercioSuperiorTextarea">
                                                        <p>Tercio Superior</p>
                                                    </div>
                                                    <div class="col-md-12 areas active" id="tercioMedioTextarea">
                                                        <p>Tercio Medio</p>
                                                    </div>
                                                    <div class="col-md-12 areas active" id="tercioInferiorTextarea">
                                                        <p>Tercio Inferior</p>
                                                    </div>
                                                    <div class="col-md-12 areas active" id="cuelloEscoteTextarea">
                                                        <p>Cuello y Escote</p>
                                                    </div>
                                                    <div class="col-md-12 areas active" id="pieTextarea">
                                                        <p>Piel</p>
                                                    </div>
                                                    <img src="./img/presupuestos/facial.png" alt="" class="img-fluid" style="width: 100%; height: 400px; position: absolute; left: 0; top: 0;">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <hr>
                                                </div>

                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12" style="margin: 0; padding: 0; position: relative;">
                                                    <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
                                                    <input type="hidden" name="cliente_id" id="cliente_id" value="<?= $clienteId ?>">
                                                    <input type="hidden" name="finalizado" id="finalizado" value="true">
                                                    <input type="hidden" name="Deposito_id" id="Deposito_id" value="<?php echo $Deposito_id;?>">
                                                    <input type="submit" value="T E R M I N A R - P R E S U P U E S T O" id="BotonPresupuesto" class="btn btn-block btn-outline-primary rounded-pill shadow m-1" disabled> <!-- se debe activar por la funcion -->
                                                </div>
                                            </div>
                                        </div>
                                    
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <label for="objetivos">Objetivos: </label>
                                            <textarea name="objetivos" id="objetivos" class="form-control input-lg" style="width: 100%; height: 150px;"></textarea>
                                        </div>
                                </div>
                            </form>
                            <div class="row">
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <hr>
                                    </div>
                                </div>
                            </div>
                            <form action="./presupuestoFacial.php" method="post" id="anexarProducto">
                                <div class="row">


                                <div class="form-group col-md-6">
                                    <label><strong> Depósito</strong></label>
                                    <select class="input-lg form-control" name="dep" id="deposito" onchange="ActualizacionDeposito()" <?=$DesabilitarDep;?> required>
                                    <?php
                                    $queryListDP = mysqli_query($conn3, "SELECT * from dep WHERE activo = 1 ORDER BY id ASC");
                                    while ($rowMotorizadoDP = mysqli_fetch_array($queryListDP)) {
                                        $idDP = $rowMotorizadoDP['id'];
                                        $descripcionDP = $rowMotorizadoDP['descripcion'];

                                        if($Deposito_id!="" AND $Deposito_id == $idDP){
                                        echo '<option value="' . $idDP . '" selected>' . $descripcionDP . '</option>';
                                        }else{
                                        echo '<option value="' . $idDP . '">' . $descripcionDP . '</option>';
                                        }
                                                                    
                                    }
                                    ?>
                                    </select>
                                    
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="form-group col-md-12">
                                        <div align="left">
                                            <label>Producto o Servicio</label>
                                        </div>

                                        <select id="codigoProd" name="codigoProd" class="form-control select2" style="width: 100%;" required="required" onChange="CargarPrecioProducto();">
                                            <option value="" selected="selected">Seleccione Producto</option>
                                            <?php

                                            $queryList = mysqli_query($conn3, "SELECT * FROM sinvetrios WHERE estado = 1 order by ID");
                                            while ($row_recordset32 = mysqli_fetch_array($queryList)) {
                                                $descripcion     = $row_recordset32['descripcion'];
                                                $ID              = $row_recordset32['ID'];

                                                $tipo = $row_recordset32['tipo'];
                                                $queryinv = mysqli_query($conn3, "SELECT * FROM  scategoria where id = $tipo LIMIT 1");
                                                while ($rowinv = mysqli_fetch_array($queryinv)) {
                                                    $TipoInventario = $rowinv['tipo'];
                                                }
                                                
                                                if($TipoInventario=="1" OR $TipoInventario=="2" OR $TipoInventario=="3"){
                                                    echo "<option value='$ID'> $descripcion </option>";
                                                }

                                                
                                            }

                                            ?>

                                        </select>
                                    </div>
                                    <div id="Campo_Adicional_Producto" class="col-md-12">

                                    </div>
                                </div>

                                        <!--
                                        <div class="col-md-8">
                                            <label for="procedimientos">Procedimientos: </label>
                                            <select name="procedimientos" id="procedimientos" class="form-control input-lg select2" onchange="cargarPrecio(this)" style="width:100%"></select>
                                        </div>
                                        -->
                                        <div class="col-md-12">
                                            <label for="valor">Precio: </label>
                                            <input type="number" name="valor" id="valor" class="form-control input-lg" step="any" min="0" value="0">
                                            <div align="left" id="informacion_existencia" ></div>
                                        </div>
                                    
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <br>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" name="usuario_id" id="usuario_id" value="<?= $_SESSION['ID'] ?>">
                                            <input type="hidden" name="cliente_id" id="cliente_id" value="<?= $clienteId ?>">
                                            <input type="submit" value="A G R E G A R" class="btn btn-block btn-outline-danger rounded-pill shadow m-1">
                                        </div>
                                </div>
                            </form>
                            <div class="row">
                                    <div class="col-md-12">
                                        <table class="table table-hover" id="paginacionTables">
                                            <thead>
                                                <tr>
                                                    <th>Procedimiento</th>
                                                    <th>Subtotal</th>
                                                    <th>Total</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody id="printPresupuesto">
                                                <!-- <tr>
                                                    <td>@</td>
                                                    <td>@</td>
                                                    <td>@</td>
                                                </tr> -->
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th style="text-align: right;">Total:</th>
                                                    <th>Subtotal</th>
                                                    <th>Total</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </tfoot>
                                        </table>

                                        <input type="hidden" id="contador_productos" value="0">

                                    </div>
                            </div>
                        </div>
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

<?php
include("footer.php");
include("ajaxCreadorSelect.php");
function Encriptar($valor)
{
    $Sc = base64_decode("keyMaster");
    $Texto = urlencode(openssl_encrypt($valor, "AES-256-CBC", $Sc));
    return $Texto;
}
// El primer campo, es el selector; ya sea id, clase o campo todo depdnde de como sea implementado Ejem: #campo .campo input etc
// selectFrom: con este objeto podran manipular los campos pasados en el SELECT * FROM, muy util cuando usan JOIN EJEMP:
// selectFrom: Encriptar("lb_c.id AS id, lb_c.Nombre AS Nombre") = SELECT lb_c.id AS id, lb_c.Nombre AS Nombre FROM
// name: nombre de la tabla al cual se hara la consulta SQL
// value: valor que contendra el option del select Ejem: <option value"dato"></option>. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// value se separara con | en el value del option
// text: texto que aparecera dentro de la etiqueta option Ejem: <option>dato</option. Podra contener mas de un campo, solo seprara de esta forma id || descripcion
// text se separara con • en el texto del option
// likeWhere: condicion a cumplir para el buscador, seran representado como Ejem: descripcion like "%dato%", no esta lkimitado a un solo campo, solo seprara de esta forma codigo || descripcion
// order: este sera el campo que te ayudara a filtrar y se representa en arrays Ejemplo ['group by' => 'empresa', 'order by' => 'cliente_id']
// clausula: este objeto contendra dos objetos, 
// data: se encargara de añadir condiciones a la consulta ejemplo: Encriptar("cliente_id = 1 AND cliente_id = 2") equivalente a AND cleinte_id = 1
// value: contendra valores en array, reemplazables en data: Ejempl: [1, 2, 3]
// ATENCION: data trabaja con una especie de remplazo de valores, ejempl: cliente_id = $0 ,  $0 es el quivalente a la posisicon 0 del array value
// carapter: si tenemos problemas al cargar una data porque los caracteres devueltos rompen el javascript mantenerlo en true de otra forma pueden tenerlo como false
// campoCreador: esta campo sera añadido siempre y cuando tengamos el creador de tags activo ya que se encargara de indicar con cual campo debe verificar si existe o no el mismo para saber si debe crearse, dejar vacio al no usarse
// El ultimo campo nos permitira activar o desactivar el creador de Tags, por defecto esta desactivado ya que no queremos crear/añadir nuevos datos a la tabla desde el select
?>
<script src="apiVoz_3.2.js"></script>
<?php include 'plantilla.php';?>

<script>

function CargarPrecioProducto() {
    var codigoProd = $("#codigoProd").val();
    var deposito = $("#deposito").val();

    ////////////////////////// EVITAR ERRORES ///////////////
    var DivCampoPersonalizado = document.getElementById('Campo_Adicional_Producto');
    DivCampoPersonalizado.innerHTML = "";
    $('#valor').val("");
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

      if(Respuesta.Tipo == "Simple"){
        
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
          ////////////////////
          var Mensaje = "Existencia Disponible: <u><b>"+item.Existencia+"</b></u>";
          document.getElementById('informacion_existencia').innerHTML = Mensaje;
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
        
        alert('el tipo del producto tiene un error con la clasificacion del inventario');
        ActualizacionDeposito();
      }


        $('#valor').val(Respuesta.Precio);

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
$('#valor').val("");
//document.getElementById('1').removeAttribute('max');
$("#codigoProd").val("").trigger('change');

}

</script>
<script>

function evitarAperturaMenuYQuitarEnfoque(e) {
    e.preventDefault(); // Evita que se abra el menú desplegable
    this.blur(); // Quítale el enfoque al elemento
}

<?php

?>
</script>
<script type="text/javascript">
    window.addEventListener("load", function() {
        cargaTabla();
        /*
        Select2Dinamico(
            "#procedimientos", {
                selectFrom: "<?= Encriptar("*") ?>",
                name: "<?= Encriptar("sinvetrios") ?>",
                value: "<?= Encriptar("ID") ?>",
                text: "<?= Encriptar("descripcion || precio") ?>",
                likeWhere: "<?= Encriptar("descripcion") ?>",
                order: "<?= Encriptar(json_encode(['order by' => 'ID'])) ?>",
                clausula: {
                    data: "",
                    value: [''],
                },
                carapter: "false",
                campoCreador: btoa(JSON.stringify({
                    nombreCreador: false,
                    conditionInsert: false,
                    conditionSelect: false,
                })),
            }, false, false
        );
        */
        $(".areas").on('click', function(e) {
            e.preventDefault();
            const id = $(this).attr('id');
            if ($(this).hasClass('active')) {
                $(this).removeClass('active');
                $(`.${id}`).css({
                    'display': 'none'
                });
            } else {
                $(this).addClass('active');
                $(`.${id}`).css({
                    'display': 'block'
                });
            }
        });
        $("#anexarProducto").on('submit', function(e) {
            e.preventDefault();
            let data = new FormData(this);
            data.append('key', 'addItem');
            $.ajax({
                url: 'presupuestoFacial.php',
                type: 'POST',
                data: data,
                contentType: false,
                processData: false,
                success: function(response) {
                    console.log(response);
                    if (response.status) {
                        cargaTabla();

                        // solo para el deposito
                        document.getElementById("deposito").addEventListener("mousedown", evitarAperturaMenuYQuitarEnfoque);
                        $('#Deposito_id').val($("#deposito").val());

                    }
                }
            });
        });
    });

    let unLock = false;
    const printTabla = (data) => {
        if (unLock) {
            tablaObjeto.clear().draw(); // Limpio la tabla ya existente
            tablaObjeto = $("#paginacionTables").dataTable().fnDestroy(); // Destruyo
        } else {
            let tablaObjeto;
        }
        let item = '';
        let acumPrecio = 0;
        var contador = 0;

        //console.log(data);
        data.forEach(element => {
            if(element.id!="0"){
                item = `<tr>
                            <td>${element.descripcion}</td>
                            <td>${element.subTotal}</td>
                            <td>${element.Total}</td>
                            <td>
                                <button class="btn btn-block btn-outline-danger rounded-pill shadow" onclick="removeItem(${element.id})">
                                    <i class="fa fa-trash"></i>
                                </button>
                            </td>
                        </tr>`;
                acumPrecio += parseFloat(element.Total);
                $('#printPresupuesto').append(item);
                contador++;
            }
        });
        if(contador==0){
            console.log(contador);
            document.getElementById("deposito").removeEventListener("mousedown", evitarAperturaMenuYQuitarEnfoque);
        }else{
            document.getElementById("deposito").addEventListener("mousedown", evitarAperturaMenuYQuitarEnfoque);
        }

        $("#contador_productos").val(contador);
        VerificarProductos();

        tablaObjeto = $('#paginacionTables').DataTable({
            filter: true,
            ordering: true,
            deferRender: true,
            scrollY: 1200,
            scrollCollapse: true,
            processing: true,
            lengthMenu: [10, 20, 50, 100, 200, 500],
            responsive: true,
            responsivePriority: 1,
            dom: 'Bfrtip',
            buttons: [{
                extend: 'collection',
                text: '<i class="fa fa-cog" aria-hidden="true"></i>',
                className: 'btn btn-primary',
                buttons: [{
                        extend: 'print',
                        text: 'Imprimir',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'copy',
                        text: 'Copiar',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'excel',
                        text: 'Excel',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pdf',
                        text: 'PDF',
                        title: 'Documento',
                        exportOptions: {
                            columns: ':visible'
                        }
                    },
                    {
                        extend: 'pageLength'
                    },
                    {
                        extend: 'colvis',
                        text: 'Modificar Columnas'
                    }
                ]
            }],
            language: {
                "decimal": "",
                "emptyTable": "No hay información",
                "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                "infoPostFix": "",
                "thousands": ",",
                "lengthMenu": "Mostrar _MENU_ Entradas",
                "loadingRecords": "Cargando...",
                "processing": "Procesando...",
                "search": "Buscar:",
                "zeroRecords": "Sin resultados encontrados",
                "paginate": {
                    "first": "Primero",
                    "last": "Ultimo",
                    "next": "Siguiente",
                    "previous": "Anterior"
                },
                buttons: {
                    pageLength: {
                        _: "Mostrando %d <br> Elementos",
                        '-1': "Ver Todo"
                    }
                }
            },
        });
        $(tablaObjeto.column(2).footer()).html(acumPrecio + ' ' + '<?= $config['moneda'] ?>');
        unLock = true;
    };
    const removeItem = (id) => {
        $.ajax({
            url: 'presupuestoFacial.php',
            type: 'POST',
            data: {
                key: 'removeItem',
                id: id
            },
            dataType: 'JSON',
            success: function(response) {
                if (response.status) {
                    cargaTabla();
                }
            }
        });
    }
    const cargaTabla = () => {
        $.ajax({
            url: 'presupuestoFacial.php',
            type: 'POST',
            data: {
                key: 'cargaData',
                cliente_id: <?= $clienteId ?>
            },
            dataType: 'JSON',
            success: function(response) {
                if (response.status) {
                    printTabla(response.data);
                }
            }
        });
    }
    const cargarPrecio = (el) => {
        $.ajax({
            url: 'presupuestoFacial.php',
            type: 'POST',
            data: {
                key: 'cargaPrecio',
                id: el.value
            },
            dataType: 'JSON',
            success: function(response) {
                console.log(response);
                if (response.status) {
                    $("#valor").val(response.data[0].precio);
                }
            }
        });
    }

    function VerificarProductos(){

        var Cuantos = $("#contador_productos").val();

        if(Cuantos>0){
            document.getElementById('BotonPresupuesto').disabled = false;
        }else{
            document.getElementById('BotonPresupuesto').disabled = true;
        }

    }

    $(document).ready(function() {
        VerificarProductos();
    });
</script>